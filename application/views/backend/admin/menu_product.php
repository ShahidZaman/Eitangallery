<?php
    $system_name        =   $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
    $system_title       =   $this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
    $text_align         =   $this->db->get_where('settings' , array('type'=>'text_align'))->row()->description;
    $account_type       =   $this->session->userdata('login_type');
   

   
    
          $skin_colour = $this->db->get_where('admin',array(
          'admin_id' => $this->session->userdata('admin_id')
        ) )->row()->theme;
          




    $active_sms_service =   $this->db->get_where('settings' , array('type'=>'active_sms_service'))->row()->description;
    ?>
<!DOCTYPE html>
<html lang="en" dir="<?php if ($text_align == 'right-to-left') echo 'rtl';?>">
<head>
    
    <title><?php echo $page_title;?> | <?php echo $system_title;?></title>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Ekattor School Manager Pro - Creativeitem" />
    <meta name="author" content="Creativeitem" />
    
    

    <?php include 'includes_top.php';?>
    
</head>
<body class="page-body <?php if ($skin_colour != '') echo 'skin-' . $skin_colour;?>" >
    <div class="page-container <?php if ($text_align == 'right-to-left') echo 'right-sidebar';?>" >
        <?php include 'navigation.php';?>   
        <div class="main-content">
        
            <?php include 'header.php';?>

           <h3 style="">
            <i class="entypo-right-circled"></i> 
                <?php echo $page_title;?>
           </h3>



       <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_menu_product_add/<?= $menu_id?>');" 
                class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
                <?php echo ('Add');?>
             </a>






 
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                        
                          <th><div><?php echo ('#');?></div></th>
                           <th><div><?php echo ('image');?></div></th>
                            <th><div><?php echo (' Name');?></div></th>
                            <th><div><?php echo ('Description');?></div></th>
                           
                            <th><div><?php echo ('Price');?></div></th>
                            <th><div><?php echo ('Category');?></div></th>
                            <th><div><?php echo ('Product addon');?></div></th>

                             <th><div><?php echo get_phrase('Action');?></div></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                               $i=0;
                                foreach($orders->result()  as $row):?>
                   
                        
                        <tr>
                            <td><?php echo ++$i;?></td>
                            <td><img src="<?php echo $row->image_url;?>" style="height: 100px;width: 100px;" /></td>
                            <td><?php echo $row->product_name;?></td>
 <td><?php echo $row->product_description;?></td>


                         <td><?php echo $row->product_price;?></td>

                         <td><?php $c=$this->db->get_where('maincategory', array('maincat_id'=>
                          $row->maincat_id ))->row_array();
                         if (count($c)!=0) {

                          echo $c['name']; 
                         }
                         ?></td>
                        




                     <td>
                                <div class="btn-group">
                                    
                                    <ul >
                                        
                                        <!-- teacher EDITING LINK -->
                                       
                 <li>
               <a href=<?php echo base_url()."admin/addon/".$row->product_id; ?>
                >
                                                <i class="entypo-plus-circled"></i>
                                                    <?php echo 'Add';?>
                                                </a>
                                        </li>
                                       


                                    </ul>
                                </div>
                                
                            </td>








                                <td>
                                <div class="btn-group">
                                    
                                    <ul >
                                        
                                        <!-- teacher EDITING LINK -->
                                       
                                        <li>
                                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_view_product/<?php echo $row->product_id;?>');">
                                                <i class="entypo-pencil"></i>
                                                    <?php echo 'View';?>
                                                </a>
                                        </li>
                                       



                                        <li>
                                        	<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_edit_menu_product/<?php echo $row->product_id;?>');">
                                            	<i class="entypo-pencil"></i>
													<?php echo 'Edit';?>
                                               	</a>
                                        </li>
                                       
                                        
                                        <!-- teacher DELETION LINK -->
                                          				<li>
                                     				   	<a href="#" onclick="nconfirm_modal('<?php echo base_url();?>index.php/admin/delete_menu_product/<?php echo $row->product_id;?>');">
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

<?php include 'footer.php';?>

        </div>
        <?php //include 'chat.php';?>
            
    </div>
    <?php include 'modal.php';?>
    <?php include 'includes_bottom.php';?>
    
</body>
</html>