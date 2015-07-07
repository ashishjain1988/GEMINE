<div class="jumbotron" id="main">
	<div class="container" style="margin-top: 10px;">
		<h2><?php echo $heading;?></h2>
		<div style="width: 40%;">
			<ul class="list-group">
				<li class="list-group-item"><span class="badge"><?php echo $cancerName;?></span>Cancer
					Name</li>
				<li class="list-group-item"><span class="badge"><?php echo $sampleId;?></span>Sample
					Id</li>
				<li class="list-group-item"><span class="badge"><?php echo $geneName;?></span>Gene</li>
				<li class="list-group-item"><span class="badge"><?php echo $zscore;?></span>Z-Score</li>
				<!-- <li class="list-group-item"><span class="badge"><?php /* echo $dys; */?></span>Dysregulation</li> -->
				<li class="list-group-item"><span class="badge"><?php echo $cds;?></span>Gene
					CDS Length</li>
			</ul>
		</div>
	</div>
</div>