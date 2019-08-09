<div class="sidebar-menu">
    <header class="logo-env" >

        <!-- logo -->
        <div class="logo" style="">
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>uploads/logo.png"  style="max-height:80px; width:100%"/>
            </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation">

                <i class="entypo-menu"></i>
            </a>
        </div>

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>

    <div style=""></div>    
    <ul id="main-menu" class="">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

        <li class="<?php if ($page_name == 'maincategory') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/maincategory">
                <i class="entypo-docs"></i>
                <span><?php echo ('Category'); ?></span>
            </a>
        </li>
        <li class="<?php if ($page_name == 'subcategory') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/subcategory">
                <i class="entypo-docs"></i>
                <span><?php echo ('Sub Category'); ?></span>
            </a>
        </li>
        <li class="<?php if ($page_name == 'size') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/size">
                <i class="entypo-docs"></i>
                <span><?php echo ('Size'); ?></span>
            </a>
        </li>
        <li class="<?php if ($page_name == 'material') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/material">
                <i class="entypo-docs"></i>
                <span><?php echo ('Material'); ?></span>
            </a>
        </li>
        <li class="<?php if ($page_name == 'type') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/type">
                <i class="entypo-docs"></i>
                <span><?php echo ('Add New Gallery'); ?></span>
            </a>
        </li>

        <li class="<?php if ($page_name == 'addproperty') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/addproperty">
                <i class="entypo-docs"></i>
                <span><?php echo ('Add Picture'); ?></span>
            </a>
        </li>
        <li class="<?php if ($page_name == 'viewproperty') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/viewproperty">
                <i class="entypo-docs"></i>
                <span><?php echo ('View Picture'); ?></span>
            </a>
        </li>
        <!--
        <li class="<?php if ($page_name == 'artist') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/artist">
                <i class="entypo-docs"></i>
                <span><?php echo ('Artist Gallary'); ?></span>
            </a>
        </li>
        -->
        <li class="<?php if ($page_name == 'artist') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/store">
                <i class="entypo-docs"></i>
                <span><?php echo ('Store'); ?></span>
            </a>
        </li>
                <li class="<?php if ($page_name == 'subscription') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/subscription">
                <i class="entypo-docs"></i>
                <span><?php echo ('Subscription'); ?></span>
            </a>
        </li>
	

       


      

                <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/system_settings">
                        <span><i class="entypo-lifebuoy"></i> <?php echo ('Theme Settings'); ?></span>
                    </a>
   

        </li>

<!--end new-->

        <!-- ACCOUNT -->
        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/manage_profile">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('account'); ?></span>
            </a>
        </li>

    </ul>

</div>
