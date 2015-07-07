<?php
class similargenesmodel extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}
	
	public function getSimilarGenes($cancerName,$geneName){
		$query = $this->db->query("select * from cancer_gene_similarity where cancer_code = '".$cancerName."' and (gene_id_1 = '".$geneName."' or gene_id_2 = '".$geneName."') order by similarity_rank");
		return $query->result_array();
	}
	
}