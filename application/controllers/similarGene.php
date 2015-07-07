<?php
class similarGene extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('similargenesmodel','similargenesmodel');
		$this->load->model('cancermodel','cancermodel');
	}
	
	public function getSimilarGenes($cancerName,$geneName){
		$data['heading'] = 'Similar Genes of '.$geneName;
		$cancerNames = array('BrCa' => 'Breast Cancer','LunCa' => 'Lung Cancer','LivCa' => 'Liver Cancer');
		$result = $this->similargenesmodel->getSimilarGenes($cancerName,$geneName);
		foreach ( $result as $item ) {
			$gene = strcmp ( $item ['GENE_ID_1'] , $geneName ) == 0 ?$item ['GENE_ID_2']:$item ['GENE_ID_1'];
			$result1 = $this->cancermodel->getGeneInCancer($cancerName,$gene);
			$cor = floatval($item ['CORRELATION_VALUE']);
			$cor1 = number_format ( $cor, 4 , '.','' );
			
			foreach($result1 as $item1)
			{
				$per = floatval($item1 ['PERCENTILE']);
				$per1 = number_format ( $per, 2 , '.','' );
				$dataset [] = array (
						"" . $cancerNames[$item ['CANCER_CODE']] . "",
						"" . $gene . "",
						"" . $cor1 . "",
						"" . $per1 . "",
						"" . $item1 ['SPINNER_SCORE'] . "" 
				);
				break;
			}
		}
		if(isset($dataset))
		{
			$dataset = json_encode ( $dataset, JSON_UNESCAPED_SLASHES);
		}else {
			$dataset = null;
			$dataset = json_encode ( $dataset, JSON_UNESCAPED_SLASHES);
		}
		$data ['dataset'] = $dataset;
		$data ['heading'] = "Similar Genes for ".$geneName;
		$this->load->view ( 'templates/header' );
		$this->load->view ( "similarGene", $data );
		$this->load->view ( 'templates/footer' );
	}	
}