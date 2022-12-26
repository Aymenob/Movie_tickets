<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Client_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	function index()
	{
	 echo "here";
    }

function register_page()
	{
		try{
		$this->load->view('login_pages/Register_page');
	}catch(Exception $e){ 

		echo 'Caught exception: ',  $e->getMessage(), "\n";
	  }
	}
	function login_page()
	{
		try{
		$this->load->view('login_pages/Login_page');
	}catch(Exception $e){ 

		echo 'Caught exception: ',  $e->getMessage(), "\n";
	  }
	}
	
	function forgotP_page()
	{
		try{
		$this->load->view('login_pages/ForgotP_page');
	}catch(Exception $e){ 

		echo 'Caught exception: ',  $e->getMessage(), "\n";
	  }
	}
	function success_page()
	{
		try{
		$this->load->view('login_pages/Success_page');
	}catch(Exception $e){ 

		echo 'Caught exception: ',  $e->getMessage(), "\n";
	  }
	}

    function sign_in(){
		try {
			
			$config = array(
		  array(
				  'field' => 'identifiant',
				  'label' => 'identifiant',
				  'rules' => 'required|alpha',
				  'errors' => array(
					  'required' => 'vous devez fournir un utilisateur!',
					  'alpha'=> 'l\'utilisateur ne contient pas de chiffre!',
			  ),
		  ),
		  array(
				  'field' => 'email',
				  'label' => 'email',
				  'rules' => 'required|valid_email|is_unique[client.email]',
				  'errors' => array(
						  'required' => 'vous devez fournir un Email!',
						  'is_unique' => 'Cette adresse e-mail est déjà enregistrée',
						  'valid_email'=>'Email invalid !'
						  
				  ),
		  ),
		  array(
				  'field' => 'mot_de_passe',
				  'label' => 'mot_de_passe',
				  'rules' => 'required|exact_length[6]|numeric',
				  'errors' => array(
						  'required' => 'vous devez fournir un Mot de passe!',
						  'exact_length'=>'Mot de passe trop long ou trop court',
  
						  
				  ),
			  ),array(
				  'field' => 'mot_de_passe2',
				  'label' => 'mot_de_passe2',
				  'rules' => 'required|matches[mot_de_passe]',
				  'errors' => array(
						  'required' => 'vous devez confirmer le Mot de passe!',
						  'matches'=>'pas le même mot de passe',
  
						  
				  ),
			  )	
		  
		  );
			  $this->form_validation->set_rules($config);
			  if ($this->form_validation->run() == FALSE )
			  {
				$error_array = $this->form_validation->error_array();
				$return["type"] ="error";
				$return["msg"] = implode('<br>',$error_array);	
				
			  }
			  else {
			  $param=$_POST;
			  $password=$param["mot_de_passe"];
			  $param["mot_de_passe"]= sha1($password);
			  unset($param["mot_de_passe2"]);
		  
			   $this->Client_model->cilent_signing($param);
				$this->session->set_userdata($param);
				$this->session->set_userdata('login','true');
				$return["type"] ="success";
				$return["msg"] = "mis à jour avec succès";
			  }
			  echo json_encode($return);
		  } 
		  catch (Exception $e) {
  
			  echo 'Caught exception: ',  $e->getMessage(), "\n";
			  }}
	 function signOut(){
  
		  try {
  
			   $this->session->sess_destroy();
	  
			 } 
			  catch (Exception $e) {
  
			   echo 'Caught exception: ',  $e->getMessage(), "\n";
			}

	} 

// login with email and password
function logIn(){
	
	try {
		$config = array(
			
			array(
					'field' => 'email',
					'label' => 'email',
					'rules' => 'required',
					'errors' => array(
							'required' => 'vous devez fournir un Email!',
							
					),
			),
			array(
					'field' => 'mot_de_passe',
					'label' => 'mot_de_passe',
					'rules' => 'required|exact_length[6]',
					'errors' => array(
							'required' => 'vous devez fournir un Mot de passe!',
							'exact_length'=>'Numéro de téléphone invalide',
	
							
					),
				),	
			);
			$this->form_validation->set_rules($config);

//check user credentials
		$param=$_POST;
		$password=$param["mot_de_passe"];
		$param["mot_de_passe"]= sha1($password);
		
$uresult = $this->Client_model->get_user($param);
	
	if(count($uresult)>0)
{

	$this->session->set_userdata('login','true');
	$this->session->set_userdata($uresult[0]);
	$return["type"] ="success";
	$return["msg"] = "Vous vous êtes connecté avec succès";
	
}
else if(count($uresult)==0){
	$return["type"] ="error";
	$return["msg"] = "veuillez vérifier votre email et votre mot de passe";
}
else if  ($this->form_validation->run() === FALSE)
{    
	$error_array = $this->form_validation->error_array();
	
	$return["type"] ="error";
	$return["msg"] = implode('<br>',$error_array);

}
  echo json_encode($return);
} 
	catch (Exception $e) {

	echo 'Caught exception: ',  $e->getMessage(), "\n";
}}

 function signedOut(){
		
		try {
		$this->load->view('Home');
		
	    } catch (Exception $e) {

		echo 'Caught exception: ',  $e->getMessage(), "\n";
	    }}
function logOut(){

		try {
	
		 $this->session->sess_destroy();
		
		 } catch (Exception $e) {
	
		 echo 'Caught exception: ',  $e->getMessage(), "\n";
		}}	

}