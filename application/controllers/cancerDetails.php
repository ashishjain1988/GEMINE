<?php
class cancerDetails extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cancermodel','cancermodel');
	}
	
	public function getCancerDetails($cancerName){
		$data['heading'] = 'Cancer Details';
		$cancerNames = array('BrCa' => 'Breast Cancer','LunCa' => 'Lung Cancer','LivCa' => 'Liver Cancer');
		
		$result = $this->cancermodel->getCancer($cancerName);
		foreach ( $result as $item ) {
			$dataset [] = array (
					"" . $item ['PRIMARY_HISTOLOGY'] ."",
					"" . $item ['HISTOLOGY_SUBTYPE'] . ""
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
		$data ['heading'] = "Cancer Details of ".$cancerNames[$cancerName];
		$this->load->view ( 'templates/header' );
		$this->load->view ( "cancerdetails", $data );
		$this->load->view ( 'templates/footer' );
	}
	
}