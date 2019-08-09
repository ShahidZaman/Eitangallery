




<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                  Order Detail
                    
                </div>
            </div>
            
            <div class="panel-body">
              
        <div class="form-group">

          <h3>Products</h3>
                    
<?php $edit_data = $this->db->get_where('order_product', array('order_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>

    <?php


if(isset( $row['product_id'] )){
   $product = $this->db->get_where('products', array('product_id' =>$row['product_id']) )->row_array();
?> 

                  <div class="row">
                    
    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Name ');?></label>
                        <div class="col-sm-12 ">
                                <?php echo $product['product_name'] ;?>
  
                        </div>
                    </div>



<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Price ');?></label>
                        <div class="col-sm-12">
                                <?php echo $row['price'] ;?>
                        </div>
                    </div>




<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('quantity ');?></label>
                        <div class="col-sm-12">
                                <?php echo $row['quantity'] ;?>
                        </div>
                    </div>
<br>



                  </div>

<?php }?>
                    
  <?php
endforeach;
?>


<h3>Addon</h3>
<?php $edit_data = $this->db->get_where('order_product', array('order_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>




  
                                <?php


if(isset( $row['addon_id'] )){
   $addon = $this->db->get_where('addon', array('product_id' =>$row['addon_id']) )->row_array();
 


                                 ?>

                                 <div class="row">


<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Name ');?></label>
                        <div class="col-sm-12">
     <?php echo $addon['addon_name'];  ?>
                        </div>
                    </div>



<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Price ');?></label>
                        <div class="col-sm-12">
                                  <?php echo $row['price'];  ?>
                        </div>
                    </div>


<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('quantity ');?></label>
                        <div class="col-sm-12">
                                <?php echo $row['quantity'] ;?>
                        </div>
                    </div>

                    
                    <br>
</div>
          


 
<?php } ?>


<?php
endforeach;
?>

              </div>                      
              <br>
              

<?php $bill=$this->db->get_where('orders', array('order_id' => $param2) )->row_array(); ?>


<h3>Grand total : $<?= $bill['bill']?> </h3>

            </div>
        </div>
    </div>
</div>


