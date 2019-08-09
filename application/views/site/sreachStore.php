<title>Eitan Gallery</title>
<?php include 'include/header.php'; ?>
<?php include 'include/top_links.php'; ?>

<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px; font-weight: 600; color: #000;">Search</h1>
    <br>
    <form action ="<?php echo base_url().'site/sreachStore'; ?>" method="Get">  
    <div class="banner_search_div" style ="width: 50vw;">
        <input class="form-control" type="text" name="sreach" required name="" value="<?php echo $keyword; ?>" placeholder="SEARCH " placeholder="SEARCH BY KEYWORD">
       
        
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
       

        </div>
    </div>

    <div class="col-sm-6">
        <div class="portfolio_search_right">
      
        </div>
    </div>

</div>

<div class="container">
  <br><br>
  <?php foreach($mydata as $my){ 

  ?>
    <?php if ( $my['type']=="Store" ) { ?>
      <div class="col-sm-3">
    <a href="<?php echo base_url().'site/detail_product/'.$my['property_id'] ;?>">
    <img class="img-responsive"
    style="
    -webkit-box-shadow: 0px 0px 5px 2px rgba(230, 230, 230, 0.98);
    -moz-box-shadow: 0px 0px 10px 2px rgba(204,204,204,1);
    box-shadow: 0px 0px 6px 2px rgba(0,0,0,0.08);
    border: 4px solid #d6d6d6;
    background-color: white;
    max-height: 300px;
    
  
"
     src="<?php echo $my['image_url']; ?>">
     
     <div class="str_img_div">
      <p style="font-weight: 600; margin-bottom: 0px;"><?php echo $my['property_name']; ?></p>
      <p style="font-weight: 600; font-size: 12px; color: gray; margin-bottom: 0px;">Category :<?php echo $my['name']; ?></p>
      <p style="font-weight: 600; font-size: 11px; margin-bottom: 0px;">Sub Category :
      <?php 
      $q=$this->db->select('name')->where('subcategory_id',$my['subcat_id'])->get('subcategory')->row_array(); 
      echo $q['name'];
      ?>
      
      </p>
    </div>
    </a>
    <br>  
  </div>
  
  <?php } ?>

  <?php } ?> 
</div>










<?php include 'include/footer.php'; ?>
<?php include 'include/bottom_links.php'; ?>

</body>
</html>