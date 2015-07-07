<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		$this->load->view ( 'templates/header' );
		/*
		 * $data = array("name" => $p1);
		 * $data['profile'] = $profile;
		*/
		/* $this->load->view('one',$data); */
		$this->load->view ( "one" );
		$this->load->view ( 'templates/footer' );
	}
	
	public function one(/* $p1 */){
			// echo "This is one";
			/*
		 * $this->load->model('hello_model','model');
		 * $profile = $this->model->getProfile("Ashish");
		 */
			// sprint_r($profile);
		$this->load->view ( 'templates/header' );
		/*
		 * $data = array("name" => $p1);
		 * $data['profile'] = $profile;
		 */
		/* $this->load->view('one',$data); */
		$this->load->view ( "one" );
		$this->load->view ( 'templates/footer' );
	}
	
}