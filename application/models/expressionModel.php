<?php
class expressionModel extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}
	public function getExpressionDetails($sampleId,$cancerName,$geneName){
		$query = $this->db->query("select * from gene_expression where gene_id = '".$geneName."' and cancer_code='".$cancerName."' and sample_id =".$sampleId);
		return $query->result_array();
	}
	
	public function getMutationDetails($sampleId,$cancerName,$geneName){
		$query = $this->db->query("select * from mutation where mutation_id in (select mutation_id from sample_gene_mutation_mapping where gene_id ='".$geneName."' and cancer_code ='".$cancerName."' and sample_id = ".$sampleId.")");
		return $query->result_array();
	}
	
}
