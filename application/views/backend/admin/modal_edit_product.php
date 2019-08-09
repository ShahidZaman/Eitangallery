

<?php $edit_data = $this->db->get_where('products', array('product_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo ('Edit Books');?>
                </div>
            </div>
            
            <br><br>
  <div class="panel-body">
                
                <?php echo form_open(base_url() . 'admin/product_edit/'.$param2 , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                       
        
                   

        <div class="form-group">
                    
                        
<div class="col-sm-12">
                              
                               <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Select Pdf File ');?></label>
              <div class="form-group">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new " style="width: 100px; height: 100%;" data-trigger="fileinput">
                                     <p><?php echo $row['book_name'] ;?></p>
                                  </div>
                                  <div class="fileinput-preview fileinput-exists " style="max-width: 200px; max-height: 150px"></div>
                                  <div>
                                      <span class="btn btn-white btn-file">
                                          <span class="fileinput-new">Select Pdf File</span>
                                          <span class="fileinput-exists">Change</span>
                                          <input type="file" name="userfile" >
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
                           <input type="text" name="product_name" class="form-control" required="required" value="<?php echo $row['book_name'] ;?>">
                        </div>
                    </div>


                 
                              
                               <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Select Book Image');?></label>
              <div class="form-group">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new " style="width: 100px; height: 100%;" data-trigger="fileinput">
                                     <img src="<?php echo $row['book_image']; ?>" alt="...">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists " style="max-width: 200px; max-height: 150px"></div>
                                  <div>
                                      <span class="btn btn-white btn-file">
                                          <span class="fileinput-new">Select Image File</span>
                                          <span class="fileinput-exists">Change</span>
                                          <input type="file" name="imagefile">
                                      </span>
                                      <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                              </div>
                          </div>
               </div>                   
                          

              




<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Description');?></label>
                        <div class="col-sm-5"><textarea name="product_description" class="form-control" ><?php echo $row['book_description'] ;?>
                        </textarea></div>
                    </div>










                     <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Select Book Category');?></label>
                            <div class="col-sm-5">
                            
                                <select class="form-control" name="maincat_id" required=""
                              >
                  <?php $categories = $this->db->get('maincategory')->result_array();
                                 foreach ($categories as $row2):?>
                                    <option value="<?php echo $row2['maincat_id']; ?>" <?php if ($row2['maincat_id'] == $row['maincat_id']) {
                                       echo "selected";
                                    } ?>><?php echo $row2['name']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div> 

     

              
                   
            
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo ('Update Book');?></button>
                        </div>
                    </div>
    
                    
                    
                    <br>
                <?php echo form_close();?>
            </div>
      </div>

        </div>
    </div>
</div>


<?php
endforeach;
?>


