<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->database();
		$this->load->model('Users_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{ 	
		try{
		$list["sales"]=$this->Users_model->getCinemaData();
	    $list["list"]=$this->Users_model->getAllData();
		
		$this->load->view('Main_page',$list);
	}catch(Exception $e){ 

		echo 'Caught exception: ',  $e->getMessage(), "\n";
	  }
	}
	public function register_page()
	{
		try{
		$this->load->view('Register_page');
	}catch(Exception $e){ 

		echo 'Caught exception: ',  $e->getMessage(), "\n";
	  }
	}
	public function login_page()
	{
		try{
		$this->load->view('Login_page');
	}catch(Exception $e){ 

		echo 'Caught exception: ',  $e->getMessage(), "\n";
	  }
	}
	
	public function forgotP_page()
	{
		try{
		$this->load->view('ForgotP_page');
	}catch(Exception $e){ 

		echo 'Caught exception: ',  $e->getMessage(), "\n";
	  }
	}
	public function success_page()
	{
		try{
		$this->load->view('Success_page');
	}catch(Exception $e){ 

		echo 'Caught exception: ',  $e->getMessage(), "\n";
	  }
	}
//..............Home page :
	public function cinema_page($id)
	{
		try{
 $this->db->select('projection_id,film_id,fk_cinema_id,date,prix,titre,category,description,année,image');
 $this->db->from('projection');
 $this->db->join('film','projection.fk_film_id=film.film_id');
 $this->db->where('fk_cinema_id',$id);
 $query = $this->db->get();

 var_dump($query->result_array());exit;
 $this->load->view('cinema');
}catch(Exception $e){ 

	echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
}
//.............. Cinemas Available (page2):

 public function cinema_availability($id)
 {
	try{
 $this->db->select('fk_cinema_id,cinema_image,nom_cinema,adresse');
 $this->db->from('projection');
 $this->db->join('cinema','projection.fk_cinema_id=cinema.cinema_id');
 $this->db->where('fk_film_id',$id);
 $this->db->group_by('fk_cinema_id');
  $query=$this->db->get();
  $list["cinemas"]= $query->result_array();
  $list['id']=$id;
  //var_dump($cinemas);exit;
 $this->load->view('cinema',$list);
}catch(Exception $e){ 

	echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
	}
//.............. inserting reservation data into modal with jQuery :

	public function tickets_availability($date,$cinema_id,$movie_id)
 { 
	try{
 $this->db->select('*');
 $this->db->from('projection');
 $this->db->join('cinema','projection.fk_cinema_id=cinema.cinema_id');
 $this->db->join('film','projection.fk_film_id=film.film_id');
 $this->db->where('fk_film_id',$movie_id);
 $this->db->where('fk_cinema_id',$cinema_id);
 $this->db->where('date',str_replace('%20'," ",$date));

  $query=$this->db->get();
  $list= $query->result_object();
  
  echo json_encode($list);
}catch(Exception $e){ 

	echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
	}
//.............. Reservation Phase :

	public function tickets_purchase($fk_projection_id,$nbr_ticket,$place_dispo){
		try{
		$fk_client_id=1;
		$param=array(
			"fk_projection_id"=>$fk_projection_id,
			"nbr_ticket"=>$nbr_ticket,
			"fk_client_id"=>$fk_client_id,
		  );
		$result=$this->Users_model->reservation($param);
		if ($result) {
			$param2=array(
				
				"place_disponible"=>$place_dispo,
			  );
			$result2=$this->Users_model->update_nbr_place($param2,$fk_projection_id);
			if ($result2){

				$return["type"] ="success";
				$return["msg"] ="mis a jour avec success";
            }
			else {
				$return["type"] ="error";
                $return["msg"] ="fail to update"  ;}
		}
		echo json_encode($return);
	}catch(Exception $e){ 

		echo 'Caught exception: ',  $e->getMessage(), "\n";
	  }

	}
//..............List of movies available in that cinema:

	public function movies_availability($cinema_id,$film_id)
	{
		try{
	$this->db->select('date,place_disponible');
	$this->db->from('projection');
	$this->db->where('fk_film_id',$film_id);
	$this->db->where('fk_cinema_id',$cinema_id);
	$this->db->join('film','projection.fk_film_id=film.film_id');
	$query=$this->db->get();
	$result["films"]=$query->result_array();
	$this->load->view('cinema_movies',$result);
}catch(Exception $e){ 

	echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
	   }
// Api fetch of movies Datas	   
		function getMovies(){
			try{
			$curl = curl_init();
				
			curl_setopt_array($curl, [
				CURLOPT_URL => "https://imdb-top-100-movies.p.rapidapi.com/",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"X-RapidAPI-Host: imdb-top-100-movies.p.rapidapi.com",
					"X-RapidAPI-Key: 23d68eb218msh25afd641c27bf52p193e79jsn276e67bf9f88"
				],
			]);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
			$result= curl_exec($curl);
			$err = curl_error($curl);
			
			curl_close($curl);
			
			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				$response = json_decode($result,true);
			}
			
			if(!empty($response)){
				foreach($response as $movie){
					$param = array(
						'titre' => $movie['title'],
						'category' => implode(',',$movie['genre']),
						'description'=>$movie['description'],
						'année'=>$movie['year'],
						'image'=>$movie['image'],
					);
					//$this->Users_model->insert_to_db_cdi($param);
					
				}
			}
		}catch(Exception $e){ 

            echo 'Caught exception: ',  $e->getMessage(), "\n";
		  }
		}
		
// Random affectation of Projection table 	
		public function getData(){
			try{
	      $list["list"]=$this->Users_model->getData();
		
		  $this->load->view("api.php",$list);
		}catch(Exception $e){ 

            echo 'Caught exception: ',  $e->getMessage(), "\n";
		  }
		}
		public function randomProjection(){
			try{
			$this->load->helper('users');
		
            
			$times = create_time_range('10:00', '21:30', '105 mins','H:i:s');
		
            $dates=create_date_range("17","24",1);
          
			foreach($dates as $date){
				foreach($times as $Time){
					
						  $Horaire[]= $date." ".$Time;
				   }
		}
			$cinema=$this->Users_model->getCinemaData();
			$film=$this->Users_model->getAllData();
			shuffle($film);
			 
				foreach($Horaire as $Time){//7
				    foreach($cinema as $place){//5
						$Film= $film[array_rand($film)]['film_id'];
						$param = array(
							'film_id' =>  $Film,
							'cinema_id'=>intval($place['cinema_id']),
							'date'=>$Time,
							'place_disponible'=>intval($place['place_dispo']),
							'prix'=>rand(25,30),
						);
						//$this->Users_model->insert_to_db_cdi2($param);
   				           var_dump($param);
						
						}	  
			}
			
		
}catch(Exception $e){ 

	echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
		}
}