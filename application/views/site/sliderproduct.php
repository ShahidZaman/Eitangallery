<title>Eitan Gallery</title>
<?php include 'include/header.php'; ?>
<?php include 'include/top_links.php'; ?>

<?php 
$q=$this->db->where('property_id',$property_id)->get('property')->row_array(); 


$slider=$this->db->where('property_id',$property_id)->get('upload')->result_array();
$j=0;
if(!empty($q)){  ?>

<div style="background-color: #eee; padding: 5% 0;">

<div class="container">
  <div class="col-sm-8">
    <div class="" id="carousel-bounding-box">
      <div class="carousel slide" id="myCarousel">
        
        <!-- Carousel items -->
        <div class="carousel-inner">
          
          <div class="active item" data-slide-number="0">
            <img src="<?php echo $q['image_url'];?>" class="img-responsive slider_img" >
            
          </div>

<?php
$i=1; 
foreach($slider as $slide ){
   ?>

          <div class="item" data-slide-number="<?php echo $i++; ?>">
            <img src="<?php echo $slide['upload_path'] ?>" class="img-responsive slider_img" style="height: 50%;">
            
          </div>
       <?php } ?>


        </div>
      </div>
    </div>
    <br>
    <p style="font-size: 18px; margin-bottom: 0px;">Related Images</p>
    <div class="clearfix"></div>
    <div class="row">
      <div id="slider-thumbs">
        <!-- Bottom switcher of slider -->
        <ul class="hide-bullets">
          
          <li class="col-sm-3 active col-xs-3">
            <a  id="carousel-selector-0"  data-target="#myCarousel" data-slide-to="0">
              <img style="max-height: 100px;" src="<?php echo $q['image_url'];?>" class="img-responsive slider_img">
              
            </a>
          </li>
          <?php
$i=1; 
foreach($slider as $slide ){
   ?>
          <li class="col-sm-3 col-xs-3">
            <a id="carousel-selector-1" data-target="#myCarousel" data-slide-to="<?php echo $i++; ?>">
              <img style="max-height: 100px;" src="<?php echo $slide['upload_path'] ?>" class="img-responsive slider_img">
              
            </a>
          </li>
          <?php } ?>
        </ul>
        
      </div>
    </div>
    <br>
    <p style="font-weight: 600;"><b>For any other request regarding the store, please contact us by e-mail. We are offering free shipping. All Include in the final price.<br>ניתן ליצור איתנו קשר על מנת לתאם איסוף עצמי וליהנות מהנחה על מחירי המוצרים. קיים מחיר אחר לרכישות ומשלוח בישראל, נא לשים לב
</b></p>
  </div>
  <div class="col-sm-4">
    <p style="font-size: 36px;"><?php echo $q['property_name']; ?></p>
<!--   
    <p style="color: gray;">Atmosphere</p>
-->
<br>
    <label>Category</label>
    <?php $l=$this->db->select('name')->where('maincat_id',$q['cat_id'])->get('maincategory')->row_array();
                            echo $l['name'];
                            ?>
    <br>
    <label>SubCategory</label>
    <?php 
   $l= $this->db->where('subcategory_id',$q['subcat_id'])->get('subcategory')->row_array();
  
   echo $l['name'];
     
 
 ?>
    <br>

    <p><?php echo $q['property_description'] ;?></p>
  
        <br>
        <span><b>מחיר בישראל : </b>  </span><p style="font-size: 16px;
font-weight: 800;
display: inline;"id="f_price_local">
            $
            <?php echo $q['product_price']+$q['shiping_il']; ?> 
</p>
        <br>
    <p style="font-size: 16px;
font-weight: 800;
display: inline;"id="f_price"><?php echo $q['product_price']+$q['shiping_in']; ?> $</p>
<span><b>Price For International : </b>  </span>
    <br>
    <br>
    
    
    <input type="hidden" id="local_shipping" value="<?php echo $q['shiping_il']; ?>"/>
<input type="hidden" id="nonlocal_shipping" value="<?php echo $q['shiping_in']; ?>"/>
    <button class="btn buy_btn" id="buy_now">BUY NOW</button>
    <a href="<?php echo base_url().'site/cart'; ?>"><button class="btn" style="padding: 0px 5px; background-color: #eece6c; float: right;"><img style="width:34px;" class="img-responsive" src="<?php echo base_url().'siteassets/'; ?>images/cart.png" ></button></a>
<br>


      <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>The item will be shipped by airmail directly to the customer’s address in 
			a fine packaging that completely protects the item.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- modal end -->

  </div>
</div>
</div>

<?php } ?>


<?php include 'include/footer.php'; ?>
<?php include 'include/bottom_links.php'; ?>
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>-->
<script type="text/javascript">
  $( document ).ready(function() {
  
var price=<?php echo $q['product_price']; ?>;

  
$('#buy_now').on('click', function(){
addtocheckout();
});


function addtocheckout(){
 
  var fd = new FormData();    
fd.append( 'product_id', <?php echo  $property_id ;?> );
fd.append( 'size_id', '' );
fd.append( 'material_id', '' );
fd.append( 'type', 'store' );
fd.append( 'price', price);
fd.append( 'shipping_price_il', $( "#local_shipping" ).val() );
fd.append( 'shipping_price_int', $( "#nonlocal_shipping" ).val());
fd.append( 'weight', '' );
fd.append( 'package_size', '');
        

$.ajax({
                type:"POST",    
                url: "<?php echo base_url().'site/addtoCart' ?>",
                data:fd,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success:function(data){
                    console.log( data);
                    var obj=JSON.parse(data);
                    if(obj.sucees==1){
                      toastr.success('Sucess! Your selected product hass been in added iny our cart. ');
                    }else{
                      toastr.warning('Error! Something Wonge Please try Later.');
                    }
                    }
            });




}


});
</script>

</body>
</html>