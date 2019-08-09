




<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo ('Add New Product');?>
                </div>
            </div>
            
            <br><br>
  <div class="panel-body">
                
                <?php echo form_open(base_url() . 'admin/product_add/'.$param2 , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                       
        
                   

        <div class="form-group">
                    
                        
<div class="col-sm-12">
                              
                               <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Select Pdf File');?></label>
              <div class="form-group">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new " style="width: 100px; height: 100%;" data-trigger="fileinput">
                                     <img src="http://via.placeholder.com/150x70" alt="...">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists " style="max-width: 200px; max-height: 150px"></div>
                                  <div>
                                      <span class="btn btn-white btn-file">
                                          <span class="fileinput-new">Select Pdf File</span>
                                          <span class="fileinput-exists">Change</span>
                                          <input type="file" name="userfile">
                                      </span>
                                      <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                              </div>
                          </div>
               </div>                   
                          </div>

                    </div>



<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Book Name ');?></label>
                        <div class="col-sm-5">
                           <input type="text" name="product_name" class="form-control" required="required" >
                        </div>
                    </div>
                      <div class="form-group">
                    
                        
<div class="col-sm-12">
                              
                               <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Feature image ');?></label>
              <div class="form-group">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new " style="width: 100px; height: 100%;" data-trigger="fileinput">
                                      <img src="http://via.placeholder.com/150x150" alt="...">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists " style="max-width: 200px; max-height: 150px"></div>
                                  <div>
                                      <span class="btn btn-white btn-file">
                                          <span class="fileinput-new">Select Pdf File</span>
                                          <span class="fileinput-exists">Change</span>
                                          <input type="file" name="imagefile">
                                      </span>
                                      <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                              </div>
                          </div>
               </div>                   
                          </div>

                    </div>
<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Book Description');?></label>
                        <div class="col-sm-5">
                        <textarea name="product_description" class="form-control"></textarea></div>
                    </div>



                     <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Select Category');?></label>
                            <div class="col-sm-5">
                            
                                <select class="form-control" name="maincat_id" required="">

                                <?php 


  

        $categories = $this->db->get('maincategory')->result_array();
           foreach ($categories as $row):?>
           
              <option value="<?php echo $row['maincat_id']; ?>" ><?php echo $row['name']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div> 

     

              
                   
            
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo ('Add Book');?></button>
                        </div>
                    </div>
    
                    
                    
                    <br>
                <?php echo form_close();?>
            </div>


        </div>
    </div>
</div>


