<title>Eitan Gallery</title>
<?php include 'include/top_links.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  
<div class="top_bar">
    YourPicture.co.il
</div>

<!-- first div start -->

<div class="col-sm-6 first_div" style="padding: 0px;">

    <div class="envelop_div">
        <a href="<?php echo base_url().'about'; ?>"><img class="img-responsive" src="<?php echo base_url().'siteassets/'; ?>images/2.png"></a>
    </div>
    <div class="logo_div">
        <a href="https://www.instagram.com/eitanshasha/" target="blank">
        <img class="img-responsive" src="<?php echo base_url().'siteassets/'; ?>images/1.png">  
        </a>
    </div>

    <div class="welcm_div">
        <p class="welcm_title">welcome to</p>
        <p class="head_title">eitan's Gallery</p>
        <p class="title_two">Breathe Deeply and Capture the Moment</p>
        <p class="welcm_descrp">We have set ourselves the goal of making quality photos accessible to those who love potography. <br>
        For those who want a slightly different atmosphere in the living or working environment. <br>
        You can contact us on any subject, request or idea. <br>
        Wishing you great pleasure</p>

        <div class="row"><div style="float: right;">
            <span class="get_btn_top"></span>
            <br>
            <a href="<?php echo base_url().'subscribe' ?>"> <button class="btn get_btn">get started</button></a>
            <br>
            <span class="get_btn_bottom"></span>
        </div></div>
        <br>
        <form action ="<?php echo base_url().'site/sreach'; ?>" method="Get">  
        <div class="search_main_div" style="display: flex;">
 
            <div class="srch_input"><input class="form-control" type="text" name="sreach" required name="" placeholder="SEARCH "></div>
            <div><button class="btn search_btn" type="submit"><img class="" src="<?php echo base_url().'siteassets/'; ?>images/search.png"></button></div>
        

        </div>
        </form>
    </div>

    <img id="first_background_img" class="img-responsive" src="<?php echo base_url().'siteassets/'; ?>images/19.png">
</div>

<!-- second div start -->

<div class="col-sm-6 second_div" style="padding: 0px;">
<img class="img-responsive front_img" src="<?php echo base_url().'siteassets/'; ?>images/43.png">
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="<?php echo base_url(); ?>">HOME</a>
  <a href="<?php echo base_url().'about'; ?>">ABOUT</a>
  <a href="<?php echo base_url().'gallery'; ?>">GALLERY</a>
  <a href="<?php echo base_url().'store'; ?>">STORE</a>
  <a href="<?php echo base_url().'subscribe'; ?>">SUBSCRIBE</a>
</div>


<?php include 'include/eitan_menu.php'; ?>  
    <img class="img-responsive" src="<?php echo base_url().'siteassets/'; ?>images/20.png">
</div>

<div class="container second_container_mobile">
    <div class="col-sm-6">
        <div class="portfolio_search">
       
        <select class="form-control" id="cat_id">
       
          <option value="" selected>All Category</option>
          <?php
            $q= $this->db->where('cat_type','gallery')->get('maincategory')->result_array();
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

<!-- third container start -->

<div class="container" style="margin-top: 20px;">
    
    <div class="col-sm-12" id="product_detail">
<?php  // include('pagination_post.php'); ?>
    </div>
<div id='pagination' class="container" style="text-align: center;"></div>	
</div>


<div class="fourth_div">
    <div class="container">
        <p class="art_glry_heading">Artists Gallery</p>
     <?php 
        $this->db->limit(4)->select('*');
$this->db->from('artist_gallery');
$this->db->join('property', 'artist_gallery.property_id = property.property_id');
$query = $this->db->get()->result_array();
//print_r($query);
  foreach($query as $q){
  ?>
  <a href="<?php echo base_url().'site/slider/'.$q['property_id'] ;?>">
        <div class="col-sm-3" style="padding: 5px;">
           <div class="bottom_img">
               <img class="img-responsive" src="<?php echo $q['image_url'];?>">
            
               <div class="col-xs-12">
              
               <p class="p_one"><?php echo $q['property_name'];?> </p>
               <p class="p_two" style="    margin-bottom: 0px;">Category :
      <?php 

      $sub=$this->db->select('name')->where('maincat_id',$q['cat_id'])->get('maincategory')->row_array(); 
      echo $sub['name'];
      ?>
      
      </p>
               <p class="p_two" style="    margin-bottom: 5px;">SubCategory :
      <?php 

      $sub = $this->db->select('name')->where('subcategory_id',$q['subcat_id'])->get('subcategory')->row_array(); 
      echo $sub['name'];
      ?>
      
      </p>

                            </div>
           </div> 
        </div>
       </a>
  <?php } ?>

    </div>
</div>




<?php include 'include/footer.php'; ?>
<?php include 'include/bottom_links.php'; ?>
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "0px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>




<script type="text/javascript">
	$(document).ready(function() {
	    
	    var pageNum=0;
	    loadproduct(pageNum);
	    
 $('#cat_id').on('change', function(){
  myfunction();   

});

 $('#subcat_id').on('change', function(){
  loadproduct(pageNum);   

});

$('#sort_by').on('change', function(){
  myfunction();   

});

  $('#pagination').on('click','a',function(e){
       e.preventDefault();
       
       var pageno = $(this).attr('data-ci-pagination-page');
       loadproduct(pageno);
     });	
	


$( "#demp_id " ).on( "click", function() {
 alert();
 
 // console.log( $( this ).text() );
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
//console.log(result);
$("#subcat_id").html(result);
loadproduct(pageNum);
}
});

}

function arrangedata(data){
    var empRow="";
    var photusrl="<?php echo base_url().'site/slider/';?>";
    for(var i=0; i<data.length; i++){
    //$("#product_detail").append(data[i]);
    var end_image="";
    var final_image=data[i].image_url;
    
     if (final_image.indexOf("https://www.dropbox.com") == -1) {
    

        end_image=final_image;    
     }else{
         
        $lol=final_image.split("?");
        end_image=$lol['0']+"?raw=1";
         
     }
    var id=data[i].property_id;
    
     empRow = '<div class="col-sm-3 mohsin">';
    empRow += ' <a href="'+photusrl+id+'"';
    
    empRow +='>';
    
			empRow += '<div><img class="img-responsive"  style="-webkit-box-shadow: 0px 0px 5px 2px rgba(230, 230, 230, 0.98);-moz-box-shadow: 0px 0px 10px 2px rgba(204,204,204,1);box-shadow: 0px 0px 6px 2px rgba(0,0,0,0.08);border: 4px solid #d6d6d6;background-color: white;max-height: 300px;margin-bottom: 20px;"';
            empRow+='src="'+end_image+'"/></div></a></div>';    
    
//console.log(data[i]);
     $("#product_detail").append(empRow);
    }
    
}


function loadproduct(pageNum){
  var dataString = 'cat_id='+ $('#cat_id').val() + '&subcat_id='+$('#subcat_id').val()+'&order_by='+$('#sort_by').val();
$.ajax({
type: "POST",
url: "<?php echo base_url().'admin/getProducts/' ?>"+pageNum,
data: dataString,
cache: false,
success: function(result){
//alert(result);
//console.log(result);
var obj=JSON.parse(result);

$("#product_detail").empty();
arrangedata(obj.output)
//console.log(obj.pagination);
$("#pagination").empty();
$('#pagination').html(obj.pagination);



}
});
}



  });


</script>
</body>
</html>