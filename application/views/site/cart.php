<title>Eitan Gallery</title>
<?php include 'include/header.php'; ?>
<?php include 'include/top_links.php'; ?>

<div style="background-color: #eece6c; padding: 4% 0;">

<div class="container">
  <p class="mailing_title">Shoping Cart</p>
  <br>
  
	</div>
	</div>
<div class="container">

 <!--          
  <table class="table table-condensed">
    <thead>
      <tr>
      <th>Image</th>
        <th>Product Name</th>
        <th>Size</th>
        <th>Matrial Type</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
		-->
      <?php
      $storeDetaildata=array();
$order_detail=$this->db->where('order.order_status',0)->where('order.guest_id',$this->session->userdata('guest_id'))->get('order')->row_array();
$storeDetail=  $this->db->where('order.order_status',0)
   ->where('order.guest_id',$this->session->userdata('guest_id'))
   ->get('order')
   ->row_array();
  if(!empty($storeDetail)){
       $this->db->where('order_product.order_id',$storeDetail['order_id']);
      $this->db->where('order_product.guest_id',$this->session->userdata('guest_id'));
      $this->db->where('order_product.type','store');
      $this->db->from('order_product');
      $this->db->join('property', 'property.property_id = order_product.product_id');
      $storeDetaildata= $this->db->get()->result_array();
     
  }else{

  }
  
$total_price=0;
$total_local_price=0;

      $total=0;
      $this->db->where('order.order_status',0)->where('order.guest_id',$this->session->userdata('guest_id'))
      ->select('order.order_id,order.guest_id,order_product.product_id,order_product.package_size,order_product.weight,order_product.shipping_price_il,order_product.shipping_price_int,order_product.price,materials.materials_price,materials.materials_name,order_product.order_product_id,size.size_price,size.size_name,property.expenses_price,property.property_name,property.property_name,image_url,');
      $this->db->from('order');
        $this->db->join('order_product', 'order.order_id = order_product.order_id');
        $this->db->join('property', 'property.property_id = order_product.product_id');
        $this->db->join('size', 'size.size_id = order_product.size_id');
        $this->db->join('materials', 'materials.materials_id = order_product.material_id');
        $result = $this->db->get()->result_array();
    /*  
foreach($result as $re){
?>
      
      <tr>
        <td><img src="<?php echo $re['image_url']; ?>" class="img-thumbnail" alt="Cinque Terre" style="max-height: 100px;max-width:100px;"></td>
        <td><?php echo $re['property_name']; ?></td>
        <td><?php echo $re['size_name']; ?></td>
        <td><?php echo $re['materials_name']; ?></td>
        <td><?php echo $re['price'];
        $total=$total+$re['price'];
        
        ?></td>
        <td>
        
			<a href="#" class="delete_cart" data-id="<?php echo $re['order_product_id']; ?>">Delete</a>
        </td>
      </tr>
<?php } ?>
      <?php ?>
      <tr>
     
      <td colspan="4"></td>
      <td><b>Total Price</b></td>
      <td><b><?php echo $total; ?> </b></td>
      </tr>
    </tbody>
  </table>
	<hr>
	<a  class="btn success" href="<?php echo base_url().'site/checkout' ?>">CheckOut</a>


 
</div>

  </div>
</div>
*/?>
<div class="container">
	<div class="row">
		
			<div class="table-responsive">
                <div class="table-responsive custom_datatable">						
					<table class="table table-bordered table-cart-style" style="" >
                        <tbody>		
							<tr>
                                <td rowspan="2" colspan="2"><p style="margin:8px 0 0 63px;"><b>Product Details</b></p></td>
                                <td>Order NO</td>
								<td colspan="2"><?php echo $order_detail['order_id']; ?></td>
                            </tr>									
                            <tr>
                                <td>Date/Time</td>  
								<td colspan="2"><?php echo $order_detail['order_date']; ?></td>  											
                          
<?php foreach($result as $re){ ?>

							<tr>
								<td colspan="2">Product Name: <?php echo $re['property_name']; ?> </td>
								<td colspan="1">	<a href="#" class="delete_cart" data-id="<?php echo $re['order_product_id']; ?>">Delete</a></td>
								<td colspan="2"></td>
							</tr>
              <!--
							<tr>
								<td colspan="3">Size: <?php echo $re['size_name']; ?></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
							</tr>
	
  						<tr>
								<td colspan="3">Material: <?php echo $re['materials_name']; ?></td>
								<td colspan="1"></td>
								<td colspan="1"> </td>
							</tr>
      -->
              <tr>
								<td colspan="3">Price(<?php echo $re['materials_name']; ?><?php echo $re['size_name']; ?>) , Package Size:<?php echo $re['package_size'] ?> cm diameter tube, Weight :<?php echo $re['weight']; ?> )</td>
								<td colspan="1"> <p style="float: left;"> מחיר בישראל:</p>  <span style = "float:right; "> <?php echo ($re['price']+$re['expenses_price']+$re['shipping_price_il']).' $';
								$total_local_price=$total_local_price+$re['price']+$re['expenses_price']+$re['shipping_price_il']
								?></span></td>
								
								<td colspan="1">Price for International : <?php echo ($re['price']+$re['expenses_price']+$re['shipping_price_int']).' $'; 
                
                $total_price=$total_price+$re['price']+$re['expenses_price']+$re['shipping_price_int'];
                
                ?></td>
							</tr>
					<!--
          		<tr>
								<td colspan="3">Expenses Price:</td>
								<td colspan="1">Price:</td>
								<td colspan="1"><?php echo $re['expenses_price'].' $'; 
								//	$total_price=$total_price+$re['expenses_price'];
								?></td>
							</tr>
						-->
              <?php
              //$total_price=$total_price+$re['expenses_price'];
								?>
<?php } ?>
<?php  foreach($storeDetaildata as $sd){ ?>

<tr>
								<td colspan="2">Product Name: <?php echo $sd['property_name']; ?> </td>
								<td colspan="1">	<a href="#" class="delete_cart" data-id="<?php echo $sd['order_product_id']; ?>">Delete</a></td>
								<td colspan="1" dir="ltr"><p style="float: left;"> מחיר בישראל:</p> <?php echo ($sd['price']+$sd['shipping_price_il']) .' $'; 
									$total_local_price=$total_local_price+$sd['price']+$sd['shipping_price_il'];
								?></td>
								<td colspan="1">Price for International:<?php echo ($sd['price']+$sd['shipping_price_int']) .' $'; 
									$total_price=$total_price+$sd['price']+$sd['shipping_price_int'];
								?></td>
							</tr>
<?php } ?>
<tr>
							<td colspan="5">	<hr style=" height: 1px;
  color: red;
  background-color: green;
  border: none;"> </td>
						
							</tr>
							<tr>
								<td colspan="3"> Total Price</td>
								<td colspan="1"><p style="float: left;"> מחיר בישראל:</p>  <span style = "float:right; "> <?php echo $total_local_price.' $'; ?></p></td>
						
								<td colspan="1">Price for International:<?php echo $total_price.' $'; ?></td>
					
							</tr>
							<tr>
								<td colspan="5"> <a  class="btn btn-success btn-lg" style="float: right;
    margin-top: 10px;
    margin-bottom: 10px;" href="<?php echo base_url().'site/checkout' ?>">Check Out</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div> 
		</div>
	</div>


<?php include 'include/footer.php'; ?>
<?php include 'include/bottom_links.php'; ?>

<script type="text/javascript">
$(document).on('click','.delete_cart',function(e){

var cart_id=$(this).data("id");
var fd = new FormData();    
fd.append( 'cart_id', cart_id );
$.ajax({
type:"POST",    
url: "<?php echo base_url().'site/removetoCart' ?>",
data:fd,
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,
success:function(data){
console.log( data);
$("tbody").empty();
$("tbody").html(data);
}
});


});

	</script>
</body>
</html>
