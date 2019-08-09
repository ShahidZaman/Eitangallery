
<?php $edit_data = $this->db->get_where('resturant', array('subadmin_id' => $this->session->userdata['login_user_id']) )->result_array();
foreach ( $edit_data as $row):
?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo ('Edit Resturant Profile');?>
                </div>
            </div>
            
            <br><br>
  <div class="panel-body">
                
                <?php echo form_open(base_url() . 'admin/profile_edit/'.$row['resturant_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                       
        
                   

        <div class="form-group">
                    
                        
<div class="col-sm-12">
                              
                               <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Feature image ');?></label>
              <div class="form-group">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 100px; height: 100%;" data-trigger="fileinput">
                                      <img src="<?php 
                                      if(isset($row['resturant_image']))
                                      { echo $row['resturant_image'];}
                                     


                                      ?>" alt="...">
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
                          </div>

                    </div>



<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Name ');?></label>
                        <div class="col-sm-5">
                           <input type="text" name="resturant_name" class="form-control" required="required" value="<?php echo $row['resturant_name'] ;?>">
                        </div>
                    </div>



<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Description');?></label>
                        <div class="col-sm-5">
                        <textarea name="resturant_description" class="form-control" ><?php echo $row['resturant_description'] ;?>
                        </textarea></div>
                    </div>







<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Resturant Timing ');?></label>
                        <div class="col-sm-5">
                           <input type="text" name="resturant_timings" class="form-control" required="required" value="<?php echo $row['resturant_timings'] ;?>">
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


