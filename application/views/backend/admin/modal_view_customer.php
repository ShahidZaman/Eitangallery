

<?php $edit_data = $this->db->get_where('users', array('user_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    Customer detail
                </div>
            </div>
            
            <div class="panel-body">
              
        <div class="form-group">
                    




<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Name ');?></label>
                        <div class="col-sm-12">
                                <?= $row['user_name']  ?>   
                        </div>
                    </div>



<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Email ');?></label>
                        <div class="col-sm-12">
                                <?php echo $row['user_email'] ;?>
                        </div>
                    </div>


          


<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Location ');?></label>
                        <div class="col-sm-12">
                                <?php 

$location=str_replace('%20', ' ', $param3);
                                echo $location ;?>
                        </div>
                    </div>

                            
                      
<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Phone ');?></label>
                        <div class="col-sm-12">
                                <?php echo $row['user_phone'] ;?>
                        </div>
                    </div>

                              
                             
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
