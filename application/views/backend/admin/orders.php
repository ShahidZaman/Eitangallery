

          
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                        
                          <th><div><?php echo ('#');?></div></th>
                           <th><div><?php echo ('Note');?></div></th>

                           <th><div><?php echo ('Bill');?></div></th>
                           <th><div><?php echo ('Date');?></div></th>
                            <th><div><?php echo ('Customer detail');?></div></th>
                            <th><div><?php echo ('Order detail');?></div></th>
                            <th><div><?php echo ('Status');?></div></th>
                        
                             <th><div><?php echo ('Action');?></div></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                               $i=0;
                                foreach($orders->result()  as $row):?>
    
                        
                        <tr>
                            <td><?php echo ++$i;?></td>
                            <td><?php echo $row->note;?></td>
                            <td><?php echo $row->bill;?></td>
                            <td><?php echo $row->date;?></td>
<td>
    


        <a href="#" class="btn btn-info btn-sm btn-icon icon-left"  onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_view_customer/<?php echo $row->user_id;?>/<?php echo $row->location;?>');">
                    <i class="entypo-eye"></i>
                    View
                </a>
</td>

<td>
    
     
        <a href="#" class="btn btn-info btn-sm btn-icon icon-left"  onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_view_order/<?php echo $row->order_id;?>');">
                    <i class="entypo-eye"></i>
                    View
                </a>
</td>
                         
<td>
    <?php if($row->status=='pending'){
      echo'  <a href="#" class="btn btn-danger btn-sm ">
                   
                   '.$row->status.'
                </a>';
    } else if($row->status=='complete'){
      echo'  <a href="#" class="btn btn-success btn-sm ">
            
                   '.$row->status.'
                   
                </a>';
    }

 else{
      echo'  <a href="#" class="btn btn-info btn-sm ">
            
                   '.$row->status.'
                   
                </a>';
    }

    ?>
</td>



    

<td>
            <a href="#" class="btn btn-danger btn-sm btn-icon icon-left"  onclick="nconfirm_modal('<?php echo base_url();?>index.php/admin/delete_order/<?php echo $row->order_id;?>');">
                    <i class="entypo-cancel"></i>
                    Delete
                </a>
                <br>
                 <?php if($row->status=='pending'){?>

                            <a href="#" class="btn btn-danger btn-sm btn-icon icon-left"  onclick="nconfirm_modal('<?php echo base_url();?>index.php/admin/cancel_order/<?php echo $row->order_id;?>');">
                    <i class="entypo-cancel"></i>
                    Cancel
                </a>
                <?php }?>
                <br>

         


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

