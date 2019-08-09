<?php 
    $gallery_list =  $this->db->select('*')->from('type')->get()->result_array();
?>


<div class="top_bar">
    YourPicture.co.il
</div>
<nav class="navbar navbar-default cstm_navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <div class="div_nvlp_two"><a href="<?php echo base_url().'about'; ?>"><img class="img-responsive envelop2" src="<?php echo base_url().'siteassets/'; ?>images/21.png"></a></div>
     <?php 
     if(!empty($slug_name)){?>
       <a href="https://www.instagram.com/eitanshasha/" target="blank"><img class="img-responsive logo_einsta" src="<?php echo base_url().'siteassets/'; ?>images/eitan-logo.png"></a>
      <p class="gallery-title"><?= $slug_name->type_name ?></p>  
     <?php }else{?>
       
      
      <a href="https://www.instagram.com/eitanshasha/" target="blank"><img class="img-responsive logo_two" src="<?php echo base_url().'siteassets/'; ?>images/17.png"></a>
    <?php } ?>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right" style="margin-right: 5%;">
        <li><a href="<?php echo base_url(); ?>">home</a></li>
        <li><a href="<?php echo base_url().'about'; ?>">about</a></li>
        <!--<li><a href="<?php echo base_url().'gallery'; ?>">gallery</a></li>-->


        <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">gallery<span class="caret"></span></a>
    <div class="dropdown-menu home_header_menu">
        <?php
        if(!empty($gallery_list)){
            foreach($gallery_list as $gl){?>
                 <a class="dropdown-item" href="<?php echo base_url().'gallery/'.$gl['type_id']; ?>"><?php echo $gl['type_name'];?></a>
            <?php } } ?>
        
    </div>
    </li>
        <li><a href="<?php echo base_url().'store'; ?>">store</a></li>
        <li><a href="<?php echo base_url().'site/sreach'; ?>">search</a></li>
        <li><a href="<?php echo base_url().'subscribe'; ?>"><button class="btn sub_btn">subscribe</button></a></li>
        <li><a href="<?php echo base_url().'site/cart'; ?>"><button class="btn" style="padding: 0px 5px; background-color: #eece6c;"><img style="width:34px;" class="img-responsive" src="<?php echo base_url().'siteassets/'; ?>images/cart.png" ></button></a></li>     
      </ul>
    </div>
  </div>
</nav>