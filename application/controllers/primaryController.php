<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class primaryController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cancermodel','cancermodel');
		$this->load->helper('url');
	}
	
	public function getPrimaryData(){
		$name = $this->input->post('searchby');
		$keyword = $this->input->post('search');
		if( strcmp ( $name , 'gene' ) == 0 )
		{
			$this->getGeneData($keyword);
			//redirect('/primaryController/getCancerData/'.$keyword);
		}else
		{
			$this->getCancerData($keyword);
		}
	}

	public function getCancerData($keyword)
	{
		$keyword = urldecode($keyword);
		$cancerNames = array('BrCa' => 'Breast Cancer','LunCa' => 'Lung Cancer','LivCa' => 'Liver Cancer');
		$result = $this->cancermodel->getCancerDetails($keyword);
		$dataset = null;
		foreach ( $result as $item ) {
			$per = floatval($item ['PERCENTILE']);
			$per1 = number_format ( $per, 2 , '.','' );
			$dataset [] = array (
					"<a class='link' title='Significant Genes' href='".base_url()."index.php/primaryController/getCancerData/" . $cancerNames [$item ['CANCER_CODE']] ."'  target='_blank'>".$cancerNames [$item ['CANCER_CODE']] ."</a>",
					"<a class='link' title='Similar Genes' href='".base_url()."index.php/similarGene/getSimilarGenes/" . $item ['CANCER_CODE'] . "/".$item ['GENE_ID']."'  target='_blank'>".$item ['GENE_ID']."</a>",
					"" . $per1 . "",
					"" . $item ['SPINNER_SCORE'] . "",
					"<a class='link' title='Sample Details' href='".base_url()."index.php/sampleIds/getSampleId/" . $item ['CANCER_CODE'] . "/".$item ['GENE_ID']."' target='_blank'>Sample Details</a>"
			);
		}
		if(isset($dataset))
		{
			$dataset = json_encode ( $dataset, JSON_UNESCAPED_SLASHES);
		}else {
			$dataset = null;
			$dataset = json_encode ( $dataset, JSON_UNESCAPED_SLASHES);
		}
		
		$data ['dataset'] = $dataset;
		$data ['heading'] = "Significant Genes";
		$this->load->view ( 'templates/header' );
		$this->load->view ( "geneData", $data );
		$this->load->view ( 'templates/footer' );
	}
	
	public function getGeneData($keyword)
	{
		$cancerNames = array('BrCa' => 'Breast Cancer','LunCa' => 'Lung Cancer','LivCa' => 'Liver Cancer');
		$result = $this->cancermodel->getGeneDetails ( $keyword );
		foreach ( $result as $item ) {
			$per = floatval($item ['PERCENTILE']);
			$per1 = number_format ( $per, 2 , '.','' );
			$dataset [] = array (
					"<a class='link' title='Significant Genes' href='".base_url()."index.php/primaryController/getCancerData/" . $cancerNames [$item ['CANCER_CODE']]."' target='_blank'>".$cancerNames [$item ['CANCER_CODE']] ."</a>",
					"<a class='' title='Similar Genes' href='" . base_url() . "index.php/similarGene/getSimilarGenes/" . $item ['CANCER_CODE'] . "/".$item ['GENE_ID']."' target='_blank'>".$item ['GENE_ID']."</a>",
					"" . $per1 . "",
					"" . $item ['SPINNER_SCORE'] . "",
					"<a class='' title='Sample Details' href='" . base_url() . "index.php/sampleIds/getSampleId/" . $item ['CANCER_CODE'] . "/".$item ['GENE_ID']."'  target='_blank'>Sample Details</a>"
			);
		}
		if(isset($dataset))
		{
			$dataset = json_encode ( $dataset, JSON_UNESCAPED_SLASHES);
		}else {
			$dataset = null;
			$dataset = json_encode ( $dataset, JSON_UNESCAPED_SLASHES);
		}
		
		$data ['dataset'] = $dataset;
		$data ['heading'] = "Gene Significance In Cancers";
		$this->load->view ( 'templates/header' );
		$this->load->view ( "geneData", $data );
		$this->load->view ( 'templates/footer' );
	}
	
}