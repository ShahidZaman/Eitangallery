<?php
date_default_timezone_set('Asia/Karachi');
//$myDate = date('Y-m-d');


$data=$this->db->get('subscibe')->result_array();;


?>


                <br><br>
<a class="btn btn-info" style="float:right" href="http://ebmacshost.com/eitan/admin/genrate_pdf_subscribe">Genrate Pdf</a>
<br><br>
<a class="btn btn-info" style="float:right" href="http://ebmacshost.com/eitan/admin/genrate_email_pdf_subscribe">Genrate Email Pdf</a>
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                        
  <th ><div><?php echo ('#');?></div></th>
                            <th ><div><?php echo ('Name');?></div></th>
                            <th ><div><?php echo ('Email');?></div></th>
                            <th ><div><?php echo ('Action');?></div></th> 
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                               $i=0;
                               //var_dump($categories);
                                foreach($data as $row):?>
                        
                        <tr>
                        
                            
                            <td><?php echo ++$i;?></td>
                             <td><?php echo $row['user_name'];?></td>
                               <td><?php echo $row['email'];?></td>
                                                          <td>	<a href="#"  onclick="confirm_modal('<?php echo base_url();?>admin/delete_subsciption/<?php echo $row['subscibe_id']; ?>');">
                                            			<i class="entypo-trash"></i>
															<?php echo 'Delete';?>
                                               	</a></td>

                          


   
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>




























