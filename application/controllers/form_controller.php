<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class form_controller extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('cancermodel','cancermodel');
		$this->load->library('Datatables');
		$this->load->library('table');
	}
	
	public function data_submitted() {
		$name = $this->input->post('searchby');
		$keyword = $this->input->post('search');
		$cancerNames = array('BrCa' => 'Breast Cancer','LunCa' => 'Lung Cancer','LivCa' => 'Liver Cancer');
		/* if( strcmp ( $name , 'gene' ) == 0 )
		{ */
			$data = array('searchby' => 'Cancer Priority Table','name' => $name,'keyword' =>$keyword);
			$result = $this->cancermodel->getGeneDetails($keyword);
			//$tmpl = array ( 'table_open'  => '<table id="gene_table" border="1" cellpadding="2" cellspacing="1" class="mytable">' );
			//$this->table->set_template($tmpl);
			//$this->table->set_heading('Cancer Name','Gene Significance','SPINNER Rank');
			//print_r($dataset);
			foreach ($result as $item) {
				$dataset[] = array("".$item['CANCER_CODE']."",
						"".$item['PERCENTILE']."",
						"".$item['SPINNER_SCORE'].""
				);
			}
			$dataset = json_encode($dataset, JSON_UNESCAPED_SLASHES);
			$data['dataset'] = $dataset;
			$this->load->view('templates/header');
			$this->load->view("viewtable",$data);
			$this->load->view('templates/footer');
	}
		/* } else
		{
			/* $data = array('searchby' => 'Gene Priority Table',);
			$result = $this->cancermodel->getCancerDetails($keyword);
			/* $tmpl = array ( 'table_open'  => '<table id="big_table" border="1" cellpadding="2" cellspacing="1" class="mytable">' );
			$this->table->set_template($tmpl);
			$this->table->set_heading('Gene Name','Gene Significance','SPINNER Rank'); */
			/* $dataset = array();
			foreach ($result as $item) {
				$dataset[] = array("".$item['PAG_ID']."",
						"".$item['TAX_ID']."",
						"".$item['ENTREZ_GENE_ID']."",
						"".$item['PAG_ID'].""
				);
			}
			$this->load->view('templates/header');
			$this->load->view("viewtable",$data);
			$this->load->view('templates/footer') 
			
			
		} */
	
	
	/* function function dataTable($keyword,$name)
	{

		//$name = $this->input->post('searchby');
		//$keyword = $this->input->post('search');
		$cancerNames = array('BrCa' => 'Breast Cancer','LunCa' => 'Lung Cancer','LivCa' => 'Liver Cancer');
		if( strcmp ( $name , 'gene' ) == 0 )
		{
			$data = array('searchby' => 'Cancer Priority Table');
			$result = $this->cancermodel->getGeneDetails($keyword);
			//$tmpl = array ( 'table_open'  => '<table id="gene_table" border="1" cellpadding="2" cellspacing="1" class="mytable">' );
			//$this->table->set_template($tmpl);
			//$this->table->set_heading('Cancer Name','Gene Significance','SPINNER Rank');
		}
		print_r($dataset);
		//$dataset = json_encode($dataset, JSON_UNESCAPED_SLASHES);
		//$data['dataset'] = $dataset;
		
		
		$json = $this -> datatable -> datatableJson($result);
		$this -> output -> set_header("Pragma: no-cache");
		$this -> output -> set_header("Cache-Control: no-store, no-cache");
		$this -> output -> set_content_type('application/json') -> set_output(json_encode($json));
		
	} */
	
	function objectToArray( $data )
	{
		if ( is_object( $data ) )
			$d = get_object_vars( $data );
	}
}