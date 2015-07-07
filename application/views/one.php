<div class="jumbotron" id="main">
            <div class="container" style="margin-top:10px; margin-left: auto;  margin-right: auto;">
                
                 <?php /* echo "this is", $profile['fullName'],  $profile['age'];
                	print "<table> <th><td>Cancer Name</td><td>Cancer Code</td></th>";
					foreach($profile['cancer'] as $row)
					{   //Creates a loop to loop through results
                		print "<tr><td>" . $row->CANCER_NAME . "</td>";
                		print "<td>" . $row->CANCER_CODE . "</td></tr>";
                		  //$row['index'] the index here is a field name
                	}
                	print "</table>"; */
                ?> 
         	<div style="margin-top:10px;">
         		<div id="form_input" style="float:right;width:25%"  class="form-group ">
                    <?php 
                    echo form_open('primaryController/getPrimaryData');
                    $options = array(
                    		'cancer'  => 'Cancer',
                    		'gene'    => 'Gene',
                    );
                    
                    $searchby = array('cancer', 'gene');
                    echo form_label('Search By :', 'searchby');
                    echo form_dropdown('searchby', $options, 'gene','class="form-control width"');
                    ?>
                    <br/>
                     <?php 
                    echo form_label('Keyword :', 'search');
                    $data= array(
                    		'name' => 'search',
                    		'placeholder' => 'Please Enter Keyword',
                    		'class' => 'form-control width'
                    );
                    echo form_input($data);
                    ?>
                    
                     <br/>
                    <div id="form_button">
                     <?php 
                    $data = array(
                    		'type' => 'submit',
                    		'value'=> 'Submit',
                    		'class'=> 'btn btn-default'
                    );
                    echo form_submit($data); ?>
                    </div>
                    <div style="margin-top:20px;";>
                    <img alt="" src="<?php echo base_url(); ?>assets/images/cancer.jpg" style="width:100%;height:100%">
                    </div>
                     
                    </div>
                    
                     <div style="float:left;width:70%">
                     <div>
                     <img alt="" src="<?php echo base_url(); ?>assets/images/UI.png" style="width:100%;height:100%">
                     </div>
                    </div> 
                    
                    </div>
                </div>
            </div>
