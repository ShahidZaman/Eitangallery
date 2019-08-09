
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>

<div class="container" style="text-align:center">

        	<?php
$property=$this->db->get_where('property', array(
                'property_id' =>$postid
            ))->result_array();
    foreach($property as $row):?>


<!--   ///main sale     -->
<div class="container">
  <h2><?php echo ('Title');?></h2>
  <p><b><?php echo $row['property_name']; ?></b></p>            
  <table class="table">
    <thead>
      <tr>
        <th><b>Description</b></th>
        <th><b>Main Category</b></th>
        <th><b>Sub Category</b></th>
        <th><b>Price Of Expenses</b></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-align:left;margin-top:5px;"><?php echo $row['property_description']; ?></td>
        <?php 
               $q= $this->db->get('maincategory')->result_array();
               foreach($q as $l){
                if($row['cat_id']==$l['maincat_id'])
                {?>
                      <td style="text-align:left;margin-top:15px;"><?php  echo $l['name']; ?></td>
                      <?php
                 
                }
            }
              
            ?>
      <?php 
           $quer= $this->db->where('cat_id',$row['cat_id'])->get('subcategory')->result_array();
               foreach($quer as $qu){
                if($qu['subcategory_id']==$row['subcat_id'])
                {?>
                    <td  style="text-align:left;margin-top:15px;"><?php echo $qu['name']; ?></td>
                    <?php
                  
                }
            }
              
            
            ?>
            
            <td style="text-align:left;margin-top:15px;"><?php echo $row['expenses_price']; ?></td>
        
      </tr>
  
    </tbody>
  </table>
</div>



        <div class="form-group">
         <img src="<?php echo $row['image_url']; ?>" alt="..." style="
    width: auto;
    height: auto;">
 </div>


<!--new edit-->

<h4>Price Section For Materials  And Sizes </h4>
   
   <div class="container-fluid">
<?php 
      $q=$this->db->get('materials')->result_array();
      ?>
      <input type="hidden" name="material_count" class="form-control" value ="<?php echo count($q);  ?>"  required="required">
      <?php
      $i=0;
      foreach($q as $l){
       
?>
<div class="col-sm-4">
<h4 style="text-align:center"><b><?php echo ($l['materials_name']);?><b></h4>

   <hr>
   <table class="table ">
    <thead>
      <tr>
      <th style="    width: 30%;"><?php echo ('size');?></th>
        <th style="    width: 70%;">Price</th>
      
      </tr>
      </thead>
    <tbody>
<?php 
      $qa=$this->db->get('size')->result_array();
      ?>
   
     <?php 
      $j=0;
      foreach($qa as $la){
        
?>
  
<tr>
<td style="    width: 30%;">
<label><?php echo ($la['size_name']);?></label>

</td>

<td style="    width: 60%;">
<?php
 $myPrice=0;
 $shippinglocal=0;
 $shippingint=0;
$n=$this->db->select('price,shipping_price_il,shipping_price')->where('size_id',$la['size_id'])->where('material_id',$l['materials_id'])->where('product_id',$postid)->get('material_size_price')->row_array();
if(!empty($n)){
  $myPrice=$n['price'];
  $shippinglocal=$n['shipping_price_il'];
  $shippingint=$n['shipping_price'];
}else{
  $myPrice=0;
  $shippinglocal=0;
  $shippingint=0;
}
?>  
<label style="text-align:center"><?php echo "PRICE:".$myPrice.","; ?></label>

<label style="text-align:center">Shipping Price (IL) :</label>
<label style="text-align:center"><?php echo $shippinglocal .','; ?></label>

<label>Shipping Price (Other):</label>
<label><?php echo $shippingint; ?></label>
</td>

</tr>

      <?php
    $j++;
    } ?>
      </tbody>
  </table>
  </div>
      <?php
    $i++;
    } ?>
   
   </div>


  <?php endforeach;?>  
</div>
</div>


</div>

        </div>
        <div class="col-md-1">

        </div>
    </div>
</div>
</div>
