<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cinema_controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Client_model');
		$this->load->model('Cinema_model');
		$this->load->library('session');
	}
	 function index()
	{ 	
		try{
			//print_r($this->session->userdata());    ;exit;
		$list["session"]= $this->session->userdata();
		$list["sales"]=$this->Cinema_model->getCinemaData();
	    $list["list"]=$this->Cinema_model->getAllData();
		$this->load->view('cinema_pages/Main_page',$list);
	}catch(Exception $e){ 

		echo 'Caught exception: ',  $e->getMessage(), "\n";
	  }
	}
	
//..............Home page :
function cinema_page($id)
	{
		try{
			
 $this->db->select('projection_id,film_id,fk_cinema_id,date,prix,titre,category,description,année,image');
 $this->db->from('projection');
 $this->db->join('film','projection.fk_film_id=film.film_id');
 $this->db->where('fk_cinema_id',$id);
 $query = $this->db->get();

 $list["session"]= $this->session->userdata();
 $this->load->view('cinema_pages/cinema',$list);
}catch(Exception $e){ 

	echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
}
//.............. Cinemas Available (page2):

 function cinema_availability($id)
 {
	try{

  $result=$this->Cinema_model->c_availability($id);
  $list["cinemas"]= $result;
  $list['id']=$id;
  //var_dump($cinemas);exit;
 $this->load->view('cinema_pages/cinema',$list);
}catch(Exception $e){ 

	echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
	}
//.............. inserting reservation data into modal with jQuery :

	function tickets_availability($date,$cinema_id,$movie_id)
 { 
	try{
 
  $list= $this->Cinema_model->t_availability($date,$cinema_id,$movie_id);
  
  echo json_encode($list);
}catch(Exception $e){ 

	echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
	}
//.............. Reservation Phase :

	function tickets_purchase($fk_projection_id,$nbr_ticket,$place_dispo){
		try{
			date_default_timezone_set('Africa/Tunis');
           $date = date('Y-m-d h:i:s', time());
		   $paramSess=$this->session->userdata('email');
		    
		
		   $uresult = $this->Client_model->get_user2($paramSess);
		
		$fk_client_id=$this->session->userdata("client_id");
		$param=array(
			"fk_projection_id"=>$fk_projection_id,
			"nbr_ticket"=>$nbr_ticket,
			"fk_client_id"=>intval($uresult['client_id']),
			"date_de_reservation"=>date('Y-m-d h:i:s', time()),
		  );
		$result=$this->Cinema_model->reservation($param);
		if ($result) {
			$param2=array(
				
				"place_disponible"=>$place_dispo,
			  );
			$result2=$this->Cinema_model->update_nbr_place($param2,$fk_projection_id);
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

	function movies_availability($cinema_id,$film_id)
	{
		try{
	$result=$this->Cinema_model->m_availability($cinema_id,$film_id);
	$list["films"]=$result;
	$this->load->view('cinema_pages/cinema_movies',$list);
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
					//$this->Cinema_model->insert_to_db_cdi($param);
					
				}
			}
		}catch(Exception $e){ 

            echo 'Caught exception: ',  $e->getMessage(), "\n";
		  }
		}
		
// Random affectation of Projection table 	
		function getData(){
			try{
	      $list["list"]=$this->Cinema_model->getData();
		
		  $this->load->view("cinema_pages/api.php",$list);
		}catch(Exception $e){ 

            echo 'Caught exception: ',  $e->getMessage(), "\n";
		  }
		}
		function randomProjection(){
			try{
			$this->load->helper('Cinema');
		
            
			$times = create_time_range('10:00', '21:30', '105 mins','H:i:s');
		
            $dates=create_date_range("17","24",1);
          
			foreach($dates as $date){
				foreach($times as $Time){
					
						  $Horaire[]= $date." ".$Time;
				   }
		}
			$cinema=$this->Cinema_model->getCinemaData();
			$film=$this->Cinema_model->getAllData();
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
						//$this->Cinema_model->insert_to_db_cdi2($param);
   				           var_dump($param);
						
						}	  
			}
			
		
}catch(Exception $e){ 

	echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
		}
}