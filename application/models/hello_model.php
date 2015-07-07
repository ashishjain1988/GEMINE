<?php

class Hello_Model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}
	public function getProfile($name){
		$query = $this->db->query("select * from cancer");
		return array("fullName" => $name, "age" =>26,"cancer"=> $query->result());
	}
}