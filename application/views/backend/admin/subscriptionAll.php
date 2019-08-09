<?php
date_default_timezone_set('Asia/Karachi');
//$myDate = date('Y-m-d');


$data=$this->db->get('subscibe')->result_array();;


?>


            
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                        
  <th ><div><?php echo ('#');?></div></th>
                            <th ><div><?php echo ('Name');?></div></th>
                            <th ><div><?php echo ('Email');?></div></th>
             
                            
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
            

   
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>




























