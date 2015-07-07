<?php
class geneDetailsData extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('expressionModel','expressionModel');
	}
	
	public function expressionDetails($sampleId,$cancerName,$geneName){
		$data['heading'] = 'Gene Expression Details';
		$cancerNames = array('BrCa' => 'Breast Cancer','LunCa' => 'Lung Cancer','LivCa' => 'Liver Cancer');
		$data['cancerName'] = $cancerNames[$cancerName];
		$data['sampleId'] = $sampleId;
		$data['geneName'] = $geneName;
		$data['dys']= 'NA';
		$data['zscore']= 'NA';
		$data['cds']= 'NA';
		$result = $this->expressionModel->getExpressionDetails($sampleId,$cancerName,$geneName);
		foreach ($result as $item) {
			/* $data['dys']= (strcmp ( $item['DYSREGULATION'] , '' ) == 0 ?'NA':$item['DYSREGULATION']); */
			if(strcmp ( $item['Z_SCORE'] , '' ) == 0 )
			{
				$data['zscore'] = 'NA';
			}else
			{
				$per = floatval($item['Z_SCORE']);
				$per1 = number_format ( $per, 2 , '.','' );
				$data['zscore'] = $per1;
			}
			//$data['zscore']= (strcmp ( $item['Z_SCORE'] , '' ) == 0 ?'NA':$item['Z_SCORE']);
			$data['cds']= (strcmp ( $item['GENE_CDS_LENGTH'] , '' ) == 0 ?'NA':$item['GENE_CDS_LENGTH']);
		}
		$this->load->view ( 'templates/header' );
		$this->load->view ( "ExpressionData",$data);
		$this->load->view ( 'templates/footer' );
	}
	
	public function mutationDetails($sampleId,$cancerName,$geneName){
		
		$cancerNames = array('BrCa' => 'Breast Cancer','LunCa' => 'Lung Cancer','LivCa' => 'Liver Cancer');
		$result = $this->expressionModel->getMutationDetails($sampleId,$cancerName,$geneName);
		foreach ( $result as $item ) {
			$pubmed =  $item ['PUBMED_PMID']  === null ?'NA':"<a class='link' title='PubMed Page' href='http://www.ncbi.nlm.nih.gov/pubmed/".$item ['PUBMED_PMID']."'  target='_blank'>".$item ['PUBMED_PMID']."</a>";
			$dataset [] = array (
					"" . $item ['MUTATION_ID'] ."",
					"" . $item ['MUTATION_DESCRIPTION'] . "",
					"" . $item ['SNP'] . "",
					"" . $item ['MUTATION_SOMATIC_STATUS'] . "",
					"" . $item ['MUTATION_STRAND'] . "",
					"" . $pubmed. ""
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
		$data ['heading'] = "Mutation Details of ".$geneName." in ".$cancerNames[$cancerName]." Sample ".$sampleId;
		$this->load->view ( 'templates/header' );
		$this->load->view ( "mutationData", $data );
		$this->load->view ( 'templates/footer' );
	}
}