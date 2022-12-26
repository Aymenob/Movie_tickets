<?php
class Client_model extends CI_Model 
{
    function cilent_signing($param){
  
        $query=$this->db->insert('client',$param);
        return $query;
      }
      function get_user($user){
        $this->db->from('client');
        $this->db->where($user);
        $data= $this->db->get()->result_array();
        return $data;
      }
      function get_user2($param){
        $this->db->select('client_id');
        $this->db->from('client');
       $this->db->where('email',$param);
      // $builder->select('client_id');
        $query=$this->db->get();
        return $query->row_array(); 
      }
      
}