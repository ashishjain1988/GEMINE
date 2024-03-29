<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function template($template_name, $vars = array(), $return = FALSE)
	{
		if($return):
		$content  = $this->view('templates/header', $vars, $return);
		$content .= $this->view($template_name, $vars, $return);
		$content .= $this->view('templates/footer', $vars, $return);
	
		return $content;
		else:
		$this->view('templates/header', $vars);
		$this->view($template_name, $vars);
		$this->view('templates/footer', $vars);
		endif;
	}
}