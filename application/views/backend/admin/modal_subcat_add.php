




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
                
                <?php echo form_open(base_url() . 'admin/subcategory_add/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo (' Category Title ');?></label>
                        <div class="col-sm-5">
                           <input type="text" name="name" class="form-control" required="required">
                        </div>
                    </div>
         
 <br>
 <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Main Category ');?></label>
            <div class="col-sm-8">
            <select name="cat_id" class="form-control">
            <?php
            $q= $this->db->get('maincategory')->result_array();
            foreach($q as $l){
            ?>
            <option value="<?php echo $l['maincat_id']; ?>"><?php echo $l['name'] ;?></option>
            <?php } ?>
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




