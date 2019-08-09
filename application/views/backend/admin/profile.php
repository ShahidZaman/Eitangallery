

             <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_edit_profile/');" 
            	class="btn btn-primary pull-right">
                <i class="entypo-pencil"></i>
            	<?php echo ('Edit Profile');?>
             </a>  
                <br><br>





<?php $edit_data = $this->db->get_where('resturant', array('subadmin_id' => $this->session->userdata['login_user_id']) )->result_array();
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
                    
          <div class="row">           
<div class="col-sm-12">
                              
            <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Feature Image ');?></label>
            <div class="col-sm-12">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 100%; height: 100%;" data-trigger="fileinput">
                                      <img src="<?php


if(isset($row['resturant_image'])){ echo $row['resturant_image'] ;}
                                      ?>" alt="...">
                                  </div>
                                  
                              </div>
            </div>
          </div>                  
                          </div>

                    </div>



<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Name ');?></label>
                        <div class="col-sm-12">
                                <?php 

if(isset($row['resturant_name'])){ echo $row['resturant_name'] ;}


                                ?>  
                        </div>
                    </div>



<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Description ');?></label>
                        <div class="col-sm-12">
                                   <?php 

if(isset($row['resturant_description'])){ echo $row['resturant_description'] ;}


                                ?> 
                        </div>
                    </div>


        

<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Resturant Timing ');?></label>
                        <div class="col-sm-12">
                               
   <?php 

if(isset($row['resturant_timings'])){ echo $row['resturant_timings'] ;}


                                ?> 

                        </div>
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
