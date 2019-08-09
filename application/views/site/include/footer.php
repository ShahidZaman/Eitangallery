
<div class="footer">
<!-- fifth div start -->

<div class="container">
    <div class="gallery-einsta-logo">
          <?php 
     if(!empty($slug_name)){?>
       <a href="https://www.instagram.com/eitanshasha/" target="blank"><img class="img-responsive logo_einsta logo-bottom_einsta " src="<?php echo base_url().'siteassets/'; ?>images/eitan-logo.png"></a>
      <p class="gallery-title"><?= $slug_name->type_name ?></p>  
     <?php }else{?>
     
        <a target="blank" href="https://www.instagram.com/eitanshasha/">
        <img class="img-responsive botm_logo" src="<?php echo base_url().'siteassets/'; ?>images/17.png">
</a>
    <?php } ?>
    </div>
    <div>
        <ul class="bottom_menu">
            <li><a href="<?php echo base_url().'gallery'; ?>">Artist Gallery</a></li>
            <li><a href="<?php echo base_url().'faq'; ?>">Buyer FAQs</a></li>
            <li><a href="<?php echo base_url().'about'; ?>">About Us</a></li>
        </ul>
        <a href="<?php echo base_url().'about' ?>">
        <img class="img-responsive " src="<?php echo base_url().'siteassets/'; ?>images/18.png" style="margin: 2% auto;"></a>
    </div>
</div>
<div style="background-color: #eece6c; text-align: center; height: 60px; line-height: 60px;">
    Copyright ©  2019 . All rights reserved.
</div>

</div><!--footer ends -->
        
        
   