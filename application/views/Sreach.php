<title>Eitan Gallery</title>
<?php include 'include/header.php'; ?>
<?php include 'include/top_links.php'; ?>


<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px; font-weight: 600; color: #000;">Sreach</h1>
    
    <br>
    <div class="" style="background:transparent;">
       </div>
    </div>
  </div>

<!-- Second section start -->

<div class="container">
  <br><br>
    <div class="col-sm-6">
        <div class="">
       

        </div>
    </div>

    
</div>

<div class="container">
  <br><br>
  <?php foreach($mydata as $my){ ?>
  <div class="col-sm-3">
    <a href="<?php echo base_url().'site/slider/'.$my['property_id'] ;?>"><img class="img-responsive" src="<?php echo $my['image_url']; ?>"></a>
    <br>
  </div>
  <?php } ?> 
</div>










<?php include 'include/footer.php'; ?>
<?php include 'include/bottom_links.php'; ?>

</body>
</html>