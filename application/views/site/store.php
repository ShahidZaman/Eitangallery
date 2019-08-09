<title>Eitan Gallery</title>
<?php include 'include/header.php'; ?>
<?php include 'include/top_links.php'; ?>


<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px; font-weight: 600; color: #000;">Store</h1>
      <br>
    <form action ="<?php echo base_url().'site/sreachStore'; ?>" method="Get">  
    <div class="banner_search_div" style ="width: 50vw;">
        <input class="form-control" type="text" name="sreach" required name="" placeholder="SEARCH " placeholder="SEARCH BY KEYWORD">
       
        
        <button class="btn"><img class="" src="<?php echo base_url().'siteassets/'; ?>images/search.png"></button>
    </div>
    </form> 
  </div>
</div>
<!-- Second section start -->
<div class="container">
  <br><br>
    <div class="col-sm-6">
        <div class="portfolio_search">
        <select class="form-control" id="cat_id">
       
       <option value="" selected>All Category</option>
       <?php
         $q= $this->db->where('cat_type','store')->get('maincategory')->result_array();
         foreach($q as $l){
         ?>
         <option value="<?php echo $l['maincat_id']; ?>"><?php echo $l['name'] ;?></option>
         <?php } ?>
      
     </select>

     <select class="form-control" id="subcat_id">
          
          <option value="" selected>All SubCategory</option>
           
          </select>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="portfolio_search_right">
        <select class="form-control" id="sort_by">
          <option value="desc" selected>SORT BY</option>
          <option value="asc">Asscending</option>
          <option value="desc">Descending</option>
         
        </select>
        </div>
    </div>

</div>
<div class="container" id="product_detail">
<?php foreach($mydata as $my){ ?>



 
    <div class="col-sm-2">
    <div class="product_div" style="margin-top: 20px;">

      <img class="img-responsive" style="max-height: 300px;" src="<?php
     if (strpos($my['image_url'], 'https://www.dropbox.com') !== false) {
        
        if(strpos($my['image_url'],'?dl=0')!== false){
         $img=explode("?",$my['image_url']);
      //   print_r($img);
echo $img[0].'?raw=1';   
        }else{
            echo $my['image_url'].'?raw=1';
        }
         
}else{
    echo $my['image_url'];
}
      ?>">
    
    <div class="product_div_txt">
      <p><?php echo $my['property_name']; ?></p>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <p>  <?php echo ($my['product_price']+$my['shiping_in']); ?> $</p>
    </div>
      <p class="buy_now"><a href="<?php echo base_url().'site/detail_product/'.$my['property_id'] ;?>">View Detail</a></p>
    </div>
    <button style="float: right;" class="btn buy_btn" id="buy_now">BUY NOW</button>
    <br>
      </div>
   

     
<?php } ?>
<!--
<div class="container" style="text-align: center;">
  <div class="pagination">
  <a href="#">&laquo;</a>
  <a href="#">1</a>
  <a href="#" class="active">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">5</a>
  <a href="#">&raquo;</a>
  </div>
</div>
-->
</div>







<?php include 'include/footer.php'; ?>
<?php include 'include/bottom_links.php'; ?>


<script type="text/javascript">
	$(document).ready(function() {
 $('#cat_id').on('change', function(){
  
  myfunction(); 
  

});

$('#cat_id').on('change', function(){
  
loadproduct();

});

 $('#subcat_id').on('change', function(){
  loadproduct();   

});

$('#sort_by').on('change', function(){
  loadproduct();  

});
function myfunction(){
  var cat_id=$('#cat_id').val();

var dataString = 'cat_id='+ cat_id;
$.ajax({
type: "POST",
url: "<?php echo base_url().'admin/getSubcat' ?>",
data: dataString,
cache: false,
success: function(result){
//alert(result);
console.log(result);
$("#subcat_id").html(result);
loadproduct();
}
});

}

function loadproduct(){
  var dataString = 'cat_id='+ $('#cat_id').val() + '&subcat_id='+$('#subcat_id').val()+'&order_by='+$('#sort_by').val();
  console.log(dataString);
$.ajax({
type: "POST",
url: "<?php echo base_url().'admin/getProductsStore' ?>",
data: dataString,
cache: false,
success: function(result){
//alert(result);
console.log(result);
$("#product_detail").empty();
$("#product_detail").html(result);

}
});
}


  });


</script>

<script type="text/javascript">
  $( document ).ready(function() {
var price = <?php echo $my['product_price']; ?>;
$('#buy_now').on('click', function(){
addtocheckout();
});


function addtocheckout(){
 
var fd = new FormData();    
fd.append( 'product_id', <?php echo $my['property_id']; ?> );
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