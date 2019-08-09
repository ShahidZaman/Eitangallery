




<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo ('Add New Material');?>
                </div>
            </div>
            
            <br><br>
            <div class="panel-body">
                
                <?php echo form_open(base_url() . 'admin/material_add/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Title ');?></label>
                        <div class="col-sm-5">
                           <input type="text" name="materials_name" class="form-control" required="required">
                        </div>
                    </div>
                   
                    
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Description ');?></label>
            <div class="col-sm-8">
              <textarea  class="form-control" name="materials_des" required="required" placeholder="Description"> </textarea>
            </div>
          </div>
 <br>
                    
                   

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo ('Save ');?></button>
                        </div>
                    </div>
                    <br>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>




