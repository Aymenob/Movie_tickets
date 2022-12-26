<?php
class Cinema_model extends CI_Model 
{
	
     function insert_to_db_cdi($param)
     {
      
        $res=$this->db->insert('film',$param);
         return $res;
      
    }
     function insert_to_db_cdi2($param)
     {
      
        $res=$this->db->insert('projection',$param);
         return $res;
      
    }
     function getData(){
      $query=$this->db->get('film',10)->result_array();
      return $query ;
   }
    function getAllData(){
    $query=$this->db->get('film',30)->result_array();
    return $query ;
 }
  function getCinemaData(){
  $query=$this->db->get('cinema')->result_array();
  return $query ;
}
 function reservation($param){
  
  $query=$this->db->insert('reservation',$param);
  return $query;
}

 function update_nbr_place($param2,$fk_projection_id){
  
  $query=$this->db->where('projection_id',$fk_projection_id);
  $this->db->update('projection',$param2);
 
  return $query->affected_rows();
}
  function c_availability($id){
    $this->db->select('fk_cinema_id,cinema_image,nom_cinema,adresse');
    $this->db->from('projection');
    $this->db->join('cinema','projection.fk_cinema_id=cinema.cinema_id');
    $this->db->where('fk_film_id',$id);
    $this->db->group_by('fk_cinema_id');
    $query=$this->db->get();
  return     $query->result_array();
  ;
  }
   
  function t_availability($date,$cinema_id,$movie_id){
    $this->db->select('*');
 $this->db->from('projection');
 $this->db->join('cinema','projection.fk_cinema_id=cinema.cinema_id');
 $this->db->join('film','projection.fk_film_id=film.film_id');
 $this->db->where('fk_film_id',$movie_id);
 $this->db->where('fk_cinema_id',$cinema_id);
 $this->db->where('date',str_replace('%20'," ",$date));

  $query=$this->db->get();
 return $query->result_object();
  }
  function m_availability($cinema_id,$film_id){
    $this->db->select('date,place_disponible');
	$this->db->from('projection');
	$this->db->where('fk_film_id',$film_id);
	$this->db->where('fk_cinema_id',$cinema_id);
	$this->db->join('film','projection.fk_film_id=film.film_id');
	$query=$this->db->get();
   return $query->result_array();
  }
}