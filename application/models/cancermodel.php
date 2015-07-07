<?php
class cancermodel extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getGeneDetails($geneName){
		$query = $this->db->query("select * from cancer_gene_priority where gene_id like '".$geneName."%' order by percentile desc");
		return $query->result_array();
	}
	public function getCancerDetails($cancerName){
		$query = $this->db->query("select * from cancer_gene_priority where cancer_code in (select cancer_code from cancer where cancer_name like '".$cancerName."%') order by percentile desc");
		return $query->result_array();
	}
	
	public function getCancer($cancerName){
		$query = $this->db->query("select * from cancer_ontology_details where ontology_id in (select ontology_id from can_ontology_map where cancer_code = '".$cancerName."')");
		return $query->result_array();
	}
	
	public function getGeneInCancer($cancerName,$geneName){
		$query = $this->db->query("select * from cancer_gene_priority where gene_id = '".$geneName."' and cancer_code = '".$cancerName."' ");
		return $query->result_array();
	}
}
