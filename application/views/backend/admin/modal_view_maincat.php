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
        
                
    
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Title ');?></label>
            <div class="col-sm-12">
             <?php echo $row['name'] ;?> 
            </div>
          </div>
         
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Feature Image ');?></label>
            <div class="col-sm-12">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 100%; height: 100%;" data-trigger="fileinput">
                                      <img src="<?php echo $row['image_url'] ;?>" alt="...">
                                  </div>
                                  
                              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Description ');?></label>
            <div class="col-sm-12">
              <?php echo $row['description'] ;?>
            </div>
          </div>

                 
                    
          <br>
                
            </div>
        </div>
    </div>
</div>



<?php
endforeach;
?>