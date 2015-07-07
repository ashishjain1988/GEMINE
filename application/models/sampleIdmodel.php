<?php
class sampleIdmodel extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getSampleId($geneName,$cancerName){
		$query = $this->db->query("select distinct(sample_id) from sample_gene_mutation_mapping where gene_id ='".$geneName."' and cancer_code ='".$cancerName."'");
		return $query->result_array();
	}
	
	public function getSampleDetails($sampleId,$cancerName){
		$query = $this->db->query("select * from sample where sample_id =".$sampleId." and cancer_code ='".$cancerName."'");
		return $query->result_array();
	}
}
