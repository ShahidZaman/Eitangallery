<?php 
 $gallery_list =  $this->db->select('*')->from('type')->get()->result_array();
  //print_r($gallery_list);
?>

<div id="main">
  <!-- <button class="openbtn" onclick="openNav()">☰</button> --> 
    <ul class="home_header">
    <li><a href="<?php echo base_url(); ?>">home</a></li>
    <li><a href="<?php echo base_url().'about'; ?>">about</a></li>


    <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">gallery<span class="caret"></span></a>
    <div class="dropdown-menu home_header_menu">
        <?php
        if(!empty($gallery_list)){
            foreach($gallery_list as $gl){ ?>
                 <a class="dropdown-item" href="<?php echo base_url().'gallery/'.$gl['type_id']; ?>"><?php echo $gl['type_name'];?></a>
            <?php } } ?>
        

   <!-- <a class="dropdown-item" href="<?php echo base_url().'gallery'; ?>">eitan gallery</a>
    <a class="dropdown-item" href="<?php echo base_url().'gallery'; ?>">smith gallery</a>
    <a class="dropdown-item" href="<?php echo base_url().'gallery'; ?>">shan gallery</a>
    <a class="dropdown-item" href="<?php echo base_url().'gallery'; ?>">methew gallery</a>-->
    </div>
    </li>

    <li><a href="<?php echo base_url().'store'; ?>">store</a></li>
    <li><a href="<?php echo base_url().'subscribe'; ?>" class="home_menu_subscribe">subscribe</a></li>
    </ul>
</div>   