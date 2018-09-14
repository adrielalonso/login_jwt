<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Login extends REST_Controller {

	public function __construct() {
	  parent::__construct();	
		$CI = &get_instance();
		$this->db = $CI->load->database('default', TRUE);
		$this->load->model('User');

	}



/*	public function insertar(){

		$this->User->insertar();		

	}*/

	public function index_post(){
		
		$user = $_POST['user'];
		$password = $_POST['password'];

		$user = $this->User->login($user,$password);		
		
		 if($user) {
            
            $tokenData = array();
            $tokenData['id'] = $user->id;
            
            $response['token'] = Authorization::generateToken($tokenData);
            $response['message'] = "Token Generado con éxito.";
            $this->set_response($response, REST_Controller::HTTP_OK);
            return;
        }

        $response = [
            'status' => REST_Controller::HTTP_UNAUTHORIZED,
            'message' => 'Error. Verifique los datos ingresados.',
        ];

        $this->set_response($response, REST_Controller::HTTP_UNAUTHORIZED);
        
    }
	
}
	

