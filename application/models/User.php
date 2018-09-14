<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");
 
class User extends CI_Model{

	public function __construct() {
	  parent::__construct();	
		$CI = &get_instance();
		$this->db = $CI->load->database('default', TRUE);

	}
	
	public function insertar(){

		$pass = "no_admin";
		$pass = hash('sha256', $pass);

		$this->db->query("insert into user (username,password) values ('no_admin','$pass')");

	}

	public function login($user,$pass){

			$password = hash('sha256', $pass);
			$user = $this->db->query("select * from user where username = '$user' and password = '$password'")->row();

			return $user;

	}

}