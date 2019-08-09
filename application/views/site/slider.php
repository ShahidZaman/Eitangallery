<title>Eitan Gallery</title>
<?php include 'include/header.php'; ?>
<?php include 'include/top_links.php'; ?>

<?php 
$expense_price=0;
$this->db->select('*')
->where('property.property_id',$property_id)	
     ->from('property')
     ->join('maincategory', 'property.cat_id = maincategory.maincat_id');
$q = $this->db->get()->row_array();
//$size =$this->db->order_by('size_name','asc')->get('size')->result_array();
$this->db->select('size.*');
$this->db->order_by('size_name','asc');
$this->db->where('avaible_size.product_id',$property_id);
$this->db->from('size');
$this->db->join('avaible_size', 'avaible_size.size_id = size.size_id');
$size = $this->db->get()->result_array();;
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
        <img src="<?php echo base_url().'assets/'; ?>images/92.png" style="position: absolute; z-index: 1000; right: 0; cursor: pointer;" id="fancyLaunch">  
        <div class="active item" data-slide-number="0">
        <a href="<?php
     if (strpos($q['image_url'], 'https://www.dropbox.com') !== false) {
        
        if(strpos($q['image_url'],'?dl=0')!== false){
         $img=explode("?",$q['image_url']);
      //   print_r($img);
echo $img[0].'?raw=1';   
        }else{
            echo $q['image_url'].'?raw=1';
        }
         
}else{
    echo $q['image_url'];
}
      ?>" class="fancybox" rel="ligthbox0">    
        <img src="  <?php
     if (strpos($q['image_url'], 'https://www.dropbox.com') !== false) {
        
        if(strpos($q['image_url'],'?dl=0')!== false){
         $img=explode("?",$q['image_url']);
      //   print_r($img);
echo $img[0].'?raw=1';   
        }else{
            echo $q['image_url'].'?raw=1';
        }
         
}else{
    echo $q['image_url'];
}
      ?>" class="img-responsive slider_img"></a>
            
          </div>

<?php
$i=1; 
foreach($slider as $slide ){
   ?>

          <div class="item" data-slide-number="<?php echo $i++; ?>">
            <a href="<?php
     if (strpos($slide['upload_path'], 'https://www.dropbox.com') !== false) {
        
        if(strpos($slide['upload_path'],'?dl=0')!== false){
         $img=explode("?",$slide['upload_path']);
      //   print_r($img);
echo $img[0].'?raw=1';   
        }else{
            echo $slide['upload_path'].'?raw=1';
        }
         
}else{
    echo $slide['upload_path'];
}
      ?>" class="fancybox" rel="ligthbox<?php echo $i-1;?>" > <img src="<?php echo $slide['upload_path'] ?>" class="img-responsive slider_img"></a>
            
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
              <img style="max-height: 100px;" src="  <?php
     if (strpos($q['image_url'], 'https://www.dropbox.com') !== false) {
        
        if(strpos($q['image_url'],'?dl=0')!== false){
         $img=explode("?",$q['image_url']);
      //   print_r($img);
echo $img[0].'?raw=1';   
        }else{
            echo $q['image_url'].'?raw=1';
        }
         
}else{
    echo $q['image_url'];
}
      ?>" class="img-responsive slider_img">
              
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

    <p><b>Description:</b><?php 
    $expense_price= $q['expenses_price']; 
    
    echo $q['property_description']; ?></p>
    <p style="text-align:justify">
<b>For any other request regarding the picture: size, material type, delivery method or collection, please contact us by e-mail. We are offering free shipping. All Include in the final price.<br> 
ניתן ליצור איתנו קשר על מנת לתאם איסוף עצמי וליהנות מהנחה על מחיר התמונה. קיים מחיר אחר לרכישות ומשלוח בישראל, נא לשים לב
</b>

</p>
  </div>
  <div class="col-sm-4">
    <p style="font-size: 36px;"><?php echo $q['property_name']; ?></p>
    <label>Category :<?php echo $q['name']; ?></label>
    <br>
    <label>SubCategory :
      <?php 

      $sub=$this->db->select('name')->where('subcategory_id',$q['subcat_id'])->get('subcategory')->row_array(); 
      echo $sub['name'];
      ?>
      
      </label>
<!--   
    <p style="color: gray;">Atmosphere</p>
-->
<br>

<b>
<p  style="display: none;" id="package_size"></p>
</b>

<b>
<p style= "display: none;"  id="weight"></p>
</b>


    <label>Sizes</label>
    <select class="form-control" id="size_type" style="border-radius: 25px;">
   <?php 
   foreach($size as $size){
   ?>
      <option value="<?php echo $size['size_id']; ?>" selected  ><?php echo $size['size_name']; ?></option>
     
      
  <?php } ?>
    </select>

    <br>
    <label>Types of materials for Printing</label>
    <?php 
    $q =$this->db->get('materials')->result_array();
     
 
 ?>
    <select id="kstm_select" class="form-control" style="border-radius: 25px;">
<?php 
foreach($q as $l){?>
      <option value="<?php echo  $l['materials_id']; ?>" ><?php echo  $l['materials_name']; ?></option>
<?php } ?>
    </select>
   <?php 

foreach($q as $l){?>
    <div id="<?php echo $l['materials_id']."materail"; ?>"  class="content_class" data-id=" <?php echo $l['materials_des']; ?>" style="display: none">
    <p class="kstm_text" >                                                                    
    <?php echo $l['materials_des']; ?>
    </p>
    </div>
<?php } ?>


<input type="hidden" id="local_shipping" value=""/>
<input type="hidden" id="nonlocal_shipping" value=""/>
<div  class="content_class" >
    <p class="selected_text">                                                                    
  
    </p>
    </div>
    <br>
        <span><b>מחיר בישראל : </b>  </span><p style="font-size: 16px;
font-weight: 800;
display: inline;"id="f_price_local">0 $</p>
        <br>
    <p style="font-size: 16px;
font-weight: 800;
display: inline;"id="f_price">0 $</p>
<span><b>Price For International : </b>  </span>
    <br>
    <br>
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
var expense_price=<?php echo $expense_price ?>;

    var size_string=$( "#size_type" ).val();
    //console.log(size_string);
    
    getprice();
 
 function  getprice(){
  
  var fd = new FormData();    
fd.append( 'product_id', <?php echo  $property_id ;?> );
fd.append( 'size_id', $( "#size_type" ).val() );
fd.append( 'material_id', $( "#kstm_select" ).val() );

$.ajax({
                type:"POST",    
                url: "<?php echo base_url().'site/getPrice' ?>",
                data:fd,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success:function(data){
                    console.log( data);
                    var obj=JSON.parse(data);
                    if(obj.sucees==1){
                      price=obj.price;

                      $("#weight").text(obj.weight);
                      $("#package_size").text(obj.package_size); 
                     $("#local_shipping").val(obj.shipping_price_il);
                     $("#nonlocal_shipping").val(obj.shipping_price);
                     var final_price=parseFloat(price)+parseFloat(expense_price)+parseFloat(obj.shipping_price);
                       var final_price_local=parseFloat(price)+parseFloat(expense_price)+parseFloat(obj.shipping_price_il);
                           $("#f_price_local").text("$ "+final_price_local  );
                     
                      $("#f_price").text(final_price + " $");
                      
                      
                    }else{
                      price=0;
                      $("#f_price").text("$");
                    }
                    }
            });


 }
 
 
 
   //console.log(size_price);
    var str = $( "#kstm_select" ).val();
   console.log(str);
   var x= $("#"+str+"materail").attr("data_price");
console.log(x);
var price=0;

      $(".selected_text").empty();
      $(".selected_text").text($("#"+str+"materail").attr("data-id"));

  $("#kstm_select").change(function() {
    var str = $( "#kstm_select" ).val();
   var x= $("#"+str+"materail").attr("data-id");
 
      $(".selected_text").empty();
      $(".selected_text").text(x);
      getprice();

  });
  $('#size_type').on('change', function(){

    getprice();


});
$('#buy_now').on('click', function(){
addtocheckout();
});


function addtocheckout(){
 
  var fd = new FormData();    
fd.append( 'product_id', <?php echo  $property_id ;?> );
fd.append( 'size_id', $( "#size_type" ).val() );
fd.append( 'material_id', $( "#kstm_select" ).val() );
fd.append( 'price', price);
fd.append( 'type', 'gallery' );
fd.append( 'shipping_price_il', $( "#local_shipping" ).val() );
fd.append( 'shipping_price_int', $( "#nonlocal_shipping" ).val());
fd.append( 'weight', $("#weight").text() );
fd.append( 'package_size', $("#package_size").text());
               


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

<script type="text/javascript">
  jQuery(document).ready(function($) {
    var fancyGallery = $(".carousel-inner").find("a");
    fancyGallery.attr("rel","gallery").fancybox({
        type: "image"
    });
    $('#fancyLaunch').on('click', function() {
        fancyGallery.eq(0).click(); 
    });
});
</script>

</body>
</html>