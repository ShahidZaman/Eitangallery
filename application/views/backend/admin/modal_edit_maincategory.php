

<?php $edit_data = $this->db->get_where('maincategory', array('maincat_id' => $param2) )->result_array();

foreach ( $edit_data as $row):
?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    
                </div>
            </div>
            
            <div class="panel-body">
                
                <?php echo form_open(base_url() . 'admin/maincate_edit/'.$param2 , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                       <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('  Title ');?></label>
                        <div class="col-sm-5">
                           <input type="text" name="name" class="form-control" required="required" value="<?php echo $row['name'] ;?>">
                        </div>
                    </div>

        
                    <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Category  Type');?></label>
            <div class="col-sm-8">
            <select name="cat_type" class="form-control">
            
            <option value="gallery" <?php  if($row['cat_type']=="gallery"){echo 'selected';}?>>Gallery</option>
            <option value="store" <?php  if($row['cat_type']=="store"){echo 'selected';}?>>Store</option>
            
            </select>
            </div>
          </div>
 <br>          

        <div class="form-group">
                    
                        

                              
                          


               
                   
            
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

