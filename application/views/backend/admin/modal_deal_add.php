




<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo ('Add New Deal');?>
                </div>
            </div>
            
            <br><br>
            <div class="panel-body">
                
                <?php echo form_open(base_url() . 'admin/deal_add/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
    
               

<br>

          
<div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Feature image ');?></label>
              <div class="form-group">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                      <img src="http://via.placeholder.com/150x150" alt="...">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                  <div>
                                      <span class="btn btn-white btn-file">
                                          <span class="fileinput-new">Select image</span>
                                          <span class="fileinput-exists">Change</span>
                                          <input type="file" name="userfile" accept="image/*">
                                      </span>
                                      <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                              </div>
                          </div>
               </div>                   
          
               <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Title ');?></label>
                        <div class="col-sm-5">
                           <input type="text" name="deal_title" class="form-control" required="required">
                        </div>
                    </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Description ');?></label>
            <div class="col-sm-5">
              <textarea  name="deal_description" required="required" placeholder="Description"> </textarea>
            </div>
          </div>
 <br>
                    
                       <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo (' Price ');?></label>
                        <div class="col-sm-5">
                           <input type="text" name="deal_price" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo ('Save');?></button>
                        </div>
                    </div>
                    <br>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>



