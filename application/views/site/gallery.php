<title>Eitan Gallery</title>
<?php include 'include/header.php'; ?>
<?php include 'include/top_links.php'; ?>
<style>
.str_img_div {
    background-color: #eee;
    padding: 5px;
    overflow: auto;
  }
</style>

<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px; font-weight: 600; color: #000;">Gallery</h1>
    <br>
    <form action ="<?php echo base_url().'site/sreach'; ?>" method="Get">  
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
     <?php 
  /*  echo "hurrr";
    echo $gallery_id = $this->session->userdata('gallery_id');
        echo "hey bane";
               $gq = $this->db->select('maincategory.maincat_id, maincategory.name, property.gallery_type, property.cat_id')->
               from('maincategory, property')
        ->join('property','maincategory.maincat_id=property.cat_id')->where('property.gallery_type', $gallery_id )->get()->result_array();
          print_r($gq);
       
        $str = $this->db->last_query();

   

    echo "<pre>";

    print_r($str);
    echo "</pre>";*/
       ?>
    <div class="col-sm-6">
        <div class="portfolio_search">
            <input type="hidden" id="hdnSession" data-value="<?php echo $this->session->userdata('gallery_id');?>" />
        <select class="form-control" id="cat_id">
    
       <option value="" selected>All Category</option>
       <?php
       
         $q= $this->db->get('maincategory')->result_array();
         foreach($q as $l){
         ?>
         <option value="<?php echo $l['maincat_id']; ?>"><?php echo $l['name'] ;?>      </option>
         <?php } ?>
      
     </select>

     <select class="form-control" id="subcat_id">
          
          <option value="" selected>All SubCategory</option>
            <?php
              $q= $this->db->get('subcategory')->result_array();
              foreach($q as $l){ ?>
              <option value="<?php echo $l['subcategory_id']; ?>"><?php echo $l['name'] ;?></option>
              <?php } ?>
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
<br><br>
<div class="container" id="product_detail" style="display: flex; flex-flow: wrap;">
  <br><br>
  <?php foreach($mydata as $my){ ?>
  <div class="col-sm-3">
    <a href="<?php echo base_url().'site/slider/'.$my['property_id'] ;?>">
    <img class="img-responsive"
    style="
    -webkit-box-shadow: 0px 0px 5px 2px rgba(230, 230, 230, 0.98);
    -moz-box-shadow: 0px 0px 10px 2px rgba(204,204,204,1);
    box-shadow: 0px 0px 6px 2px rgba(0,0,0,0.08);
    border: 4px solid #d6d6d6;
    background-color: white;
    max-height: 300px;
    
  
"
     src="
     
     <?php
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
      ?>
     
     ">
     
     <div class="str_img_div">
      <p style="font-weight: 600; margin-bottom: 0px;"><?php echo $my['property_name']; ?></p>
      <p style="font-weight: 600; font-size: 12px; color: gray; margin-bottom: 0px;">Category :<?php echo $my['name']; ?></p>
      <p style="font-weight: 600; font-size: 11px; margin-bottom: 0px;">Sub Category :
      <?php 
      $q=$this->db->select('name')->where('subcategory_id',$my['subcat_id'])->get('subcategory')->row_array(); 
      echo $q['name'];
      ?>
       
      </p>
    <button style="float: right;" class="btn buy_btn" id="buy_now">BUY NOW</button> 
    </div>
    </a>
    
    <br>  
  </div>
  
  <?php } ?> 
</div>
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




<?php include 'subscription_model.php'; ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




<?php include 'include/footer.php'; ?>
<?php // include 'include/bottom_links.php'; ?>
<script type="text/javascript">
	$(document).ready(function() {
	   
	      // $('#subscribeModal').modal('show');
	         <?php if($this->session->userdata('notification_alert')=="show"){ 
	             
	              $this->session->set_userdata('notification_alert',"no");
	             ?>
	         $('.subscribeModal-lg').modal('show');
	         <?php } ?>
	       
	         
	         $('#sub_btn').on('click', function(){
  if($("#username").val()!="" && $("#email").val() !="" ){
    addtosubscribe();
  }else{
    $("#msg").css("color", "red");
                          $("#msg").text("Please Fill All Fields.");
  }

});


function addtosubscribe(){
 
  var fd = new FormData();    

fd.append( 'user_name', $("#username").val() );
fd.append( 'email', $("#email").val() );



$.ajax({
                type:"POST",    
                url: "<?php echo base_url().'site/addtoSubscibe' ?>",
                data:fd,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success:function(data){
                    console.log( data);
                    var obj=JSON.parse(data);
                    if(obj.sucess==1){
                        if(obj.status==0){
                          $("#msg").css("color", "red");
                          $("#msg").text(obj.msg);
                        }
                        if(obj.status==1){
                          $("#msg").css("color", "green");
                          $("#msg").text(obj.msg);
                          setTimeout(function() {
   $('.subscribeModal-lg').modal('hide');
}, 1000); 
                         
                      }
                   
                   
                    }else{
                      toastr.warning('Error! Something Wonge Please try Later.');
                    }
                    }
            });




}
 $('#cat_id').on('change', function(){
  myfunction();   

});

 $('#subcat_id').on('change', function(){
  loadproduct();   

});

$('#sort_by').on('change', function(){
  myfunction();   

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
//console.log(result);
$("#subcat_id").html(result);
loadproduct();
}
});

}

function loadproduct(){
    var sessionValue= $("#hdnSession").data('value');
  var dataString = 'cat_id='+ $('#cat_id').val() + '&subcat_id='+$('#subcat_id').val()+'&gallery_id='+ sessionValue +'&order_by='+$('#sort_by').val();
  //console.log(dataString);
  //alert(dataString);
$.ajax({
type: "POST",
url: "<?php echo base_url().'admin/getProductsGallery' ?>",
data: dataString,
cache: false,
success: function(result){
//alert(result);
//console.log(result);
$("#product_detail").empty();
$("#product_detail").html(result);

}
});
}


  });


</script>

</body>
</html>