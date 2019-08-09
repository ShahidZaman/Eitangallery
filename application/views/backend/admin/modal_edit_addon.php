

<?php $edit_data = $this->db->get_where('addon', array('addon_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo ('Edit Addon');?>
                </div>
            </div>
            
            <br><br>
  <div class="panel-body">
                
                <?php echo form_open(base_url() . 'admin/addon_edit/'.$param2 , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                       
        
                   





<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Name ');?></label>
                        <div class="col-sm-5">
                           <input type="text" name="addon_name" class="form-control" required="required" value="<?php echo $row['addon_name'] ;?>">
                        </div>
                    </div>






<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Price ');?></label>
                        <div class="col-sm-5">
                           <input type="text" name="addon_price" class="form-control" required="required" value="<?php echo $row['addon_price'] ;?>">
                        </div>
                    </div>

 
                   
            
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo ('Update');?></button>
                        </div>
                    </div>
    
                    
                    
                    <br>
                <?php echo form_close();?>
            </div>


        </div>
    </div>
</div>


<?php
endforeach;
?>


