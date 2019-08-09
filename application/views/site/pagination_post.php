<?php 
$x="";




foreach($l as $my){
        ?>
<?php 
        $x.='<div class="col-sm-3 mohsin">
  <a href="<?php echo base_url()."site/slider/".$my["property_id"] ;?>">
    <div>
        <img class="img-responsive"  style="
    -webkit-box-shadow: 0px 0px 5px 2px rgba(230, 230, 230, 0.98);
    -moz-box-shadow: 0px 0px 10px 2px rgba(204,204,204,1);
    box-shadow: 0px 0px 6px 2px rgba(0,0,0,0.08);
    border: 4px solid #d6d6d6;
    background-color: white;
    max-height: 300px;
    margin-bottom: 20px;
" src="<?php
     if (strpos($my["image_url"], "https://www.dropbox.com") !== false) {
        
        if(strpos($my["image_url"],"?dl=0")!== false){
         $img=explode("?",$my["image_url"]);
      //   print_r($img);
echo $img[0]."?raw=1";   
        }else{
            echo $my["image_url"]."?raw=1";
        }
         
}else{
    echo $my["image_url"];
}
      ?>">
    </div>
   </a>
   </div>';
   
  ?>
   
  <?php }
  
  echo  $x;
  ?>
