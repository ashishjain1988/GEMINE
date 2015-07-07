<?php
class sampleIds extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sampleIdmodel','sampleIdmodel');
		$this->load->helper('url');
	}
	
	public function getSampleId($cancerName,$geneName){
		/* $name = $this->input->post('searchby');
		$keyword = $this->input->post('search'); */
		$data['heading'] = 'Sample Information';
		$data['geneName'] = $geneName;
		$data['cancerName'] = $cancerName;
		$cancerNames = array('BrCa' => 'Breast Cancer','LunCa' => 'Lung Cancer','LivCa' => 'Liver Cancer');
		$result = $this->sampleIdmodel->getSampleId($geneName,$cancerName);
		foreach ($result as $item) {
			$sampleId = $item['SAMPLE_ID'];
			$dataset[] = array("".$cancerNames[$cancerName]."",
					"".$geneName."",
					"<a class='' title='Sample Information' href='".base_url()."index.php/sampleIds/sampleDetails/".$sampleId."/".$cancerName."'>".$sampleId."</a>",
					"<a class='' title='Expression Details' href='".base_url()."index.php/geneDetailsData/expressionDetails/".$sampleId."/".$cancerName."/".$geneName."' >Expression Details</a>",
					"<a class='' title='Mutation Details' href='".base_url()."index.php/geneDetailsData/mutationDetails/".$sampleId."/".$cancerName."/".$geneName."' >Mutation Details</a>"
			);
		}
		if(isset($dataset))
		{
			$dataset = json_encode ( $dataset, JSON_UNESCAPED_SLASHES);
		}else {
			$dataset = null;
			$dataset = json_encode($dataset,JSON_UNESCAPED_SLASHES);
		}
		
		$data['dataset'] = $dataset;
		$this->load->view ( 'templates/header' );
		$this->load->view ( "sampleIdList",$data);
		$this->load->view ( 'templates/footer' );
	}
	
	public function sampleDetails($sampleId,$cancerName){
		$data['heading'] = 'Sample Details';
		$cancerNames = array('BrCa' => 'Breast Cancer','LunCa' => 'Lung Cancer','LivCa' => 'Liver Cancer');
		$data['cancerName'] = $cancerNames[$cancerName];
		$data['sampleId'] = $sampleId;
		/* $data['sampleSource']= 'NA';
		$data['age']= 'NA';
		$data['primarySite']= 'NA'; */
		$result = $this->sampleIdmodel->getSampleDetails($sampleId,$cancerName);
		foreach ($result as $item) {
			$data['sampleSource']= (strcmp ( $item['SAMPLE_SOURCE'] , '' ) == 0 ?'NA':$item['SAMPLE_SOURCE']);
			$data['age']= (strcmp ( $item['AGE'] , '' ) == 0 ?'NA':$item['AGE']);
			$data['primarySite']= (strcmp ( $item['PRIMARY_SITE'] , '' ) == 0 ?'NA':$item['PRIMARY_SITE']);
		}
		$this->load->view ( 'templates/header' );
		$this->load->view ( "sampleDetails",$data);
		$this->load->view ( 'templates/footer' );
	}
	
	
	
	
	
	public function getSampleIdForExpression($cancerName,$geneName){

		$cancerNames = array('BrCa' => 'Breast Cancer','LunCa' => 'Lung Cancer','LivCa' => 'Liver Cancer');
		$result = $this->sampleIdmodel->getSampleId($geneName,$cancerName);
		
	foreach ($result as $item) {
			$sampleId = $item['SAMPLE_ID'];
			$dataset[] = array('cancer' => "".$cancerNames[$cancerName]."",
					'gene' => "".$geneName."",
					'sample' => "<a class='' href='".base_url()."index.php/sampleDetails/".$sampleId."/".$cancerName."' target='_blank'>".$sampleId."</a>.",
					'expresion' => "<a class='' href='".base_url()."index.php/getExpression/".$sampleId."/".$cancerName."/".$geneName."' target='_blank'>Expression Details</a>.",
					'mutation' => "<a class='' href='".base_url()."index.php/getMutation/".$sampleId."/".$cancerName."/".$geneName."' target='_blank'>Mutation Details</a>."
			);
		}
		$dataset = json_encode($dataset,JSON_UNESCAPED_SLASHES);
		$data['dataset'] = $dataset;
		$this -> output -> set_header("Pragma: no-cache");
        $this -> output -> set_header("Cache-Control: no-store, no-cache");
        $this -> output -> set_content_type('application/json') -> set_output($data);
	}
}