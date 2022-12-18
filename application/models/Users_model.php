<?php
class Users_model extends CI_Model 
{
	
    public function insert_to_db_cdi($param)
     {
      
        $res=$this->db->insert('film',$param);
         return $res;
      
    }
    public function insert_to_db_cdi2($param)
     {
      
        $res=$this->db->insert('projection',$param);
         return $res;
      
    }
    public function getData(){
      $query=$this->db->get('film',10)->result_array();
      return $query ;
   }
   public function getAllData(){
    $query=$this->db->get('film',30)->result_array();
    return $query ;
 }
 public function getCinemaData(){
  $query=$this->db->get('cinema')->result_array();
  return $query ;
}
public function reservation($param){
  
  $query=$this->db->insert('reservation',$param);
  return $query;
}

public function update_nbr_place($param2,$fk_projection_id){
  $query=$this->db->where('projection_id',$fk_projection_id);
  $this->db->update('projection',$param2);
 
  return $query->affected_rows();
}
  
   
}