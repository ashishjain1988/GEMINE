<script type="text/javascript">
var dataSet = <?php echo $dataset;?>;
$(document).ready(function() {
    $('#demo').html( '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"></table>' );
 
    $('#example').dataTable( {
        "data": dataSet,
        "columns": [
            { "title": "Cancer Name" },
            { "title": "Similar Gene" },
            { "title": "Expression Correlation Value" },
            { "title": "Percentile" } ,
            { "title": "Spinner Score" }                         
        ]
    } );   
});
</script>
		<div class="jumbotron" id="main">
            <div class="container" style="margin-top:10px;">
   				<h2><?php echo $heading;?></h2>
                <span id="demo"></span>
            </div>
            </div>
