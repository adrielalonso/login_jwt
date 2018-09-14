
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct() {
	  parent::__construct();	
		$CI = &get_instance();
		$this->db = $CI->load->database('default', TRUE);
		$this->load->model('User');

	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

/*	public function insertar(){

		$this->User->insertar();		

	}*/
}
