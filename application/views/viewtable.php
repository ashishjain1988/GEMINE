<div class="jumbotron" id="main">
     <div class="container">
            
        <h2><?php echo $searchby ?></h2>
        <h2><?php print_r($dataset); ?></h2>
       <div id="demo"></div>
		<table id="gene_table" cellpadding="0" cellspacing="0" border="0" class="">
    	<thead>
    	<tr>Cancer Name</tr>
    	<tr>Gene Significance</tr>
    	<tr>SPINNER Score</tr>
    	</thead>
    	<tbody>
    		<?php foreach($dataset as $row)
					{   //Creates a loop to loop through results
                		print "<tr><td>" . $row->CANCER_CODE . "</td>";
                		print "<td>" . $row->SPINNER_SCORE . "</td></tr>";
                		print "<td>". $row->SPINNER_SCORE ."</td></tr>";
                	}
               ?>
    	</tbody>
		</table>
    </div>
</div>
<script type="text/javascript">

var dataSet = [
               ['Trident','Internet Explorer 4.0','Win 95+'],
               ['Trident','Internet Explorer 5.0','Win 95+'],
               ['Trident','Internet Explorer 5.5','Win 95+']
               ];
	 
	$(document).ready(function() {
		$('#demo').html( '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"></table>' );
		var dataSet =  <?php   echo($dataset); ?>;
	    $("#gene_table").dataTable( {
	    	"data":dataSet,
	    	"bProcessing": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ": 20,
            "oLanguage": {
                "sProcessing": "<img src='assets/images/ajax-loader_dark.gif'>"
            },
		});
	});
    /* $(document).ready(function () {
    	$('#gene_table').dataTable( {
            processing: true,
            "data":dataSet,
            "columns": [
            			{ "title": "Cancer Name" },
            			{ "title": "Gene Significance" },
            			{ "title": "SPINNER Score" }
            		]
        }); */

        
    	/*
        $('#gene_table').dataTable({
            "data":dataSet,
            "columns": [
            			{ "title": "Cancer Name" },
            			{ "title": "Gene Significance" },
            			{ "title": "SPINNER Score" }
            		]
            	});
            /*"bProcessing": true,
            "bServerSide": false,
            //"sAjaxSource": 'index.php/form_controller/datatable',
            //"bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ": 20,
            /*"oLanguage": {
                "sProcessing": "<img src='assets/images/ajax-loader_dark.gif'>"
            },
            "fnInitComplete": function () {
                //oTable.fnAdjustColumnSizing();
            },
            'fnServerData': function (sSource, aoData, fnCallback) {
                $.ajax
                ({
                    'dataType': 'json',
                    'type': 'POST',
                    'url': sSource,
                    'data': aoData,
                    'success': fnCallback
                });
            }*/
    //$('#gene_table').dataTable();
    
    
</script>