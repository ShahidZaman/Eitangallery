




<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo ('Add New category');?>
                </div>
            </div>
            
            <br><br>
            <div class="panel-body">
                
                <?php echo form_open(base_url() . 'admin/maincat_add/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo (' Category Title ');?></label>
                        <div class="col-sm-5">
                           <input type="text" name="name" class="form-control" required="required">
                        </div>
                    </div>
    
 <br>
 <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Category  Type');?></label>
            <div class="col-sm-8">
            <select name="cat_type" class="form-control">
            
            <option value="gallery">Gallery</option>
            <option value="store">Store</option>
            
            </select>
            </div>
          </div>
 <br>          
                   

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo ('Save Category');?></button>
                        </div>
                    </div>
                    <br>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>




