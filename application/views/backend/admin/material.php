<?php
date_default_timezone_set('Asia/Karachi');
//$myDate = date('Y-m-d');


$data=$this->db->query("SELECT * FROM `materials`")->result_array();;


?>

<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_materials_add/');" 
                class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
                <?php echo ('Add New Material');?>
             </a>  
                <br><br>

                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                        

                            <th ><div><?php echo ('Name');?></div></th>
						
                          
                              <th><div><?php echo ('Discription'); ?></div></th>
                            
                            <th><div><?php echo get_phrase('Action'); ?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                               $i=0;
                               //var_dump($categories);
                                foreach($data as $row):?>
                        
                        <tr>
                        
                            
                            
                             <td><?php echo $row['materials_name'];?></td>
						
                             <td><?php echo $row['materials_des'];?></td>



   <td>
                                
                                <div class="btn-group">
                                    
                                    <ul >
                                        
                                        <!-- teacher EDITING LINK -->
                                        
                                        <li>
                                        	<a href="#" onclick="showAjaxModal('<?php echo base_url();?>/modal/popup/modal_edit_material/<?php echo $row['materials_id'];?>');">
                                            	<i class="entypo-pencil"></i>
													<?php echo 'Edit';?>
                                               	</a>
                                        				</li>
                                       
                                         				<li>
                                     				   	<a href="#"  onclick="confirm_modal('<?php echo base_url();?>admin/delete_material/<?php echo $row['materials_id']; ?>');">
                                            			<i class="entypo-trash"></i>
															<?php echo 'Delete';?>
                                               	</a>
                                     				</li>

                                    </ul>
                                </div>
                                
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable({
			"sPaginationType": "bootstrap",
			"sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
			"oTableTools": {
				"aButtons": [
					
					{
						"sExtends": "xls",
						"mColumns": [1,2]
					},
					{
						"sExtends": "pdf",
						"mColumns": [1,2]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(0, false);
							datatable.fnSetColumnVis(3, false);
							
							this.fnPrint( true, oConfig );
							
							window.print();
							
							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(0, true);
									  datatable.fnSetColumnVis(3, true);
								  }
							});
						},
						
					},
				]
			},
			
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script>


























