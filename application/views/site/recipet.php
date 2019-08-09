<title>Eitan Gallery</title>
<?php include 'include/header.php'; ?>
<?php include 'include/top_links.php'; ?>

<div style="background-color: #eece6c; padding: 4% 0;">

<div class="container">
  <p class="mailing_title">Order Receipt</p>
  <br>
</div>
</div>



  <!--formdat-->
  <div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong><?php echo $address['fullname']; ?></strong>
                        <br>
                        <?php echo $address['address'] ;?>
                        <br>
						<?php echo $address['city'] ;?>
                        <br>
                        <abbr title="Phone">P:</abbr> (213) 484-6829
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: <?php echo $order_detail['order_date'];?></em>
                    </p>
                    <p>
                        <em>Order N0 #: EithenOrder<?php echo $order_detail['order_id'];?> </em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                         
						<th class="text-center">#</th>                        
        <th class="text-center">Product Name</th>
        <th class="text-center">Size</th>
        <th class="text-center">Matrial Type</th>
      
                        </tr>
                    </thead>
                    <tbody>
					<?php
	 $total=0;
     $i=0;
     $shipping_local=0;
     $shipping_int=0;
foreach($result as $re){
	$total_price=0;
?>
						<tr>
						<td><?php echo ++$i; ?></td>
               <!--             <td class="col-md-9"><em>Baked Rodopa Sheep Feta</em></h4></td>
                            <td class="col-md-1" style="text-align: center"> 2 </td>
                            <td class="col-md-1 text-center">$13</td>
                            <td class="col-md-1 text-center">$26</td>
							-->
	
        <td><?php echo $re['property_name']; ?></td>
        <td><?php echo $re['size_name']; ?></td>
        <td><?php echo $re['materials_name']; ?></td>
        <?php 
        
		  $total_price=  $re['price'] +$re['expenses_price'];
        $total=$total+$total_price;
        $shipping_local=$shipping_local+$re['shipping_price_il'];
       $shipping_int=$shipping_int+$re['shipping_price_int'];
       
       ?>
		
		
<?php } ?>
	                    </tr>
                   <?php
foreach($result2 as $re){
	$total_price=0;
?>
<?php echo '<tr>
						<td>'. ++$i.'</td>
              
        <td>'.$re['property_name'].'</td>
        <td></td>
        <td></td>';
        ?>
        <?php 
        
		  $total_price=  $re['price'] +$re['expenses_price'];
        $total=$total+$total_price;
        $shipping_local=$shipping_local+$re['shipping_price_il'];
       $shipping_int=$shipping_int+$re['shipping_price_int'];
       
       ?>
		
		
<?php } ?>
                       
                        <tr>
                            <td>   </td>
                            <td>   </td>
							
							
                            <td class="text-right"><h4><strong> </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong><?php if($address['country']=="IL"){
								//	$s=$this->db->select('shipping_local')->get('shipping')->row_array();
								//	echo $shipping_local;
									$total=	$shipping_local+$total;

							}else{
								//$s=$this->db->select('shipping_internation')->get('shipping')->row_array();
								//echo $shipping_int;
								$total=$shipping_int+$total;
							} ?></strong></h4></td>
                        </tr>
						<tr>
							<td></td>
						<td></td>
						<td class="text-right"><h4><strong>Net Charges: </strong></h4></td>
						<td class="text-center text-danger"><h4><strong><?php echo $total; ?>  $</stronge>
						</tr>
                    </tbody>
                </table>
                <a href="<?php echo base_url(); ?>">
				<button type="button" class="btn btn-success btn-lg btn-block">
                    CLick Here For More Shoping   <span class="glyphicon glyphicon-chevron-right"></span>
                </button></a>
            </div>
        </div>
    </div>
	</div>
  <?php include 'include/footer.php'; ?>
<?php include 'include/bottom_links.php'; ?>

</body>
</html>
