
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>

<script type="text/javascript">
  
  $(document).ready(function(){
  readimage();

  $('#cat_id').on('change', function(){
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
console.log(result);
$("#subcat_id").html(result);
}
});

}
$( "input[type='checkbox']" ).change(function() {
  // Check input( $( this ).val() ) for validity here

   $("input:checkbox:not(:checked)").each(function () {
            var seclted_checkbox=$(this).val();
            var newsizemetrics="size_matrix"+seclted_checkbox;
            $('.'+newsizemetrics).hide();
      
       
   });
   $("input:checkbox:checked").each(function () {
            var seclted_checkbox=$(this).val();
            var newsizemetrics="size_matrix"+seclted_checkbox;
            $('.'+newsizemetrics).show();
      
       
   });

});

 if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
















function readimage (){

var postid=<?php echo $postid?>;

   url = "<?php echo base_url().'admin/readImage'?>/"+postid;
   console.log(url);
 $.ajax({
            url : url ,
            type: "POST",
            
            success: function(data)
            {
                //if success reload ajax table
                $('#image_preview').empty();
                $('#image_preview').append(data);

                   $('.solTitle a').click(function(e) {
        e.preventDefault();
 
         var divId =$(this).attr('id');
         
       
          url = "<?php echo base_url().'admin/ajax_delete'?>/"+divId;
   console.log(url);
 $.ajax({
            url : url ,
            type: "POST",
            
            success: function(data)
            {
                //if success reload ajax table
           readimage();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });


});

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });


}




    $('.solTitle a').click(function(e) {
        e.preventDefault();
      
         var divId =$(this).attr('id');
 

   url = "<?php echo base_url().'index.php?users/ajax_delete'?>/"+divId;
   console.log(url);
 $.ajax({
            url : url ,
            type: "POST",
            
            success: function(data)
            {
                //if success reload ajax table
                $('#image_preview').empty();
                $('#image_preview').append(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });








      
    });
 });
</script>
<style type="text/css">
  
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
<?php include "header.php"; ?>
<style type="text/css">
    @import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
body{margin-top:20px;
margin-left: 5px;}
.fa-fw {width: 4em;}

</style>


<div class="row">


    
<a class="btn btn-info" style="float:right" href="<?php echo base_url().'admin/genrate_pdf/'. $postid;?>" >Genrate PDF</a> 




    
        	<?php
$property=$this->db->get_where('property', array(
                'property_id' =>$postid
            ))->result_array();
    foreach($property as $row):?>


<!--   ///main sale     -->
<form action="<?php echo base_url().'admin/updateuploaddata/'.$row['property_id']; ?>" method="post" enctype="multipart/form-data">
    
    <input type="submit" class="btn btn-primary" name='submit_image' value="Update data"/>
    </br></br>
  <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Title');?></label>
                        
            <div class="col-sm-8">
              <input type="text" class="form-control" name="property_name" data-validate="required" data-message-required="<?php echo ('value_required');?>" value = "<?php echo $row['property_name']; ?>" autofocus>
            
            </div>
          </div>
<br>
<br>

  <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Description');?></label>
            <div class="col-sm-8">
              <textarea class="form-control" name="property_description" data-validate="required" 
              data-message-required="<?php echo ('value_required');?>" ><?php echo $row['property_description']; ?></textarea>
            </div>
          </div>  
          <br>
<br>  <br>  
<br>           
     <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Gallery Type ');?></label>
            <div class="col-sm-8">
            <select name="gallery_type" class="form-control" >
            <?php
            $qa= $this->db->get('type')->result_array();
            foreach($qa as $la){
            ?>
            <option value="<?php echo $la['type_id']; ?>"  
            
            <?php if($row['gallery_type']==$la['type_id'])
            {
              echo 'selected';
            }
            ?>
            ><?php echo $la['type_name'] ;?></option>
            <?php } ?>
            </select>
            </div>
          </div>
<br>       <br>       
<div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Main Category ');?></label>
            <div class="col-sm-8">
            <select name="cat_id" class="form-control" id="cat_id">
            <?php
            $q= $this->db->where('cat_type','gallery')->get('maincategory')->result_array();
            foreach($q as $l){
            ?>
            <option value="<?php echo $l['maincat_id']; ?>" 

            <?php if($row['cat_id']==$l['maincat_id'])
            {
              echo 'selected';
            }
            ?> ><?php echo $l['name'] ;?></option>
            <?php } ?>
            </select>
            </div>
          </div>
 <br>       <br>        
 <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Sub Category ');?></label>
            <div class="col-sm-5">
            <select name="subcat_id" id="subcat_id" required class="form-control">
           <?php
           $quer= $this->db->where('cat_id',$row['cat_id'])->get('subcategory')->result_array();
           foreach($quer as $qu){
           ?>
            <option value="<?php echo $qu['subcategory_id']; ?>"  
            
            <?php if($qu['subcategory_id']==$row['subcat_id']){echo 'selected';}
            
            ?>
            ><?php echo $qu['name']; ?></option>
           <?php } ?>
            </select>
            </div>
          </div>
 <br>            
 
 
 
 
 
                    <br><br>
<div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo ('Select  File');?></label>
                                  <div class="form-group">
                                                  <div class="fileinput fileinput-new" data-provides="fileinput">
                                                      <div class="fileinput-new " style="width: 100px; height: 100%;" data-trigger="fileinput">
                                                         <img src="<?php 
                                                             $check=0;
                             if (strpos($row['image_url'], 'https://www.dropbox.com') !== false) {
        
        if(strpos($row['image_url'],'?dl=0')!== false){
         $img=explode("?",$row['image_url']);
      //   print_r($img);
echo $img[0].'?raw=1';   
 ///echo $check=1;
        }else{
            echo $row['image_url'].'?raw=1';
    //    echo $check=1;
            
        }
         
}else{
//    echo $check=0;
    echo $row['image_url'];
}
?>
                                                         
                                                         
                                                         
                                                         " alt="..." style="
    width: 200px;
    height: 200px;
">
                                                      </div>
                                                      <div class="fileinput-preview fileinput-exists " style="max-width: 200px; max-height: 150px"></div>
                                                      <div>
                                                          <span class="btn btn-white btn-file">
                                                              <span class="fileinput-new">Select Image </span>
                                                              <span class="fileinput-exists">Change</span>
                                                              <input type="file" name="userfile">
                                                          </span>
                                                          <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                      </div>
                                                  </div>
                                              </div>
                                   </div>                   
                                             
                       

<br>


 <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('upload Type');?></label>
            <div class="col-sm-8">
          <Select id="upload_type"  name="upload_type" class="form-control">
         
          <option value="1" <?php if( $check==0){ echo "selected" ;} ?>>UPLoad Image</option>
          <option value="2" <?php if( $check==1){ echo "selected" ;} ?>>Upload Link</option>
          
          </select>
          </div>
          </div>
          <br>
										<br><br>
										<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Price Of Expenses ');?></label>
                        <div class="col-sm-5">
                           <input type="number" name="expenses_price" class="form-control" value ="<?php echo $row['expenses_price']; ?>"  required="required">
                        </div>
                    </div>
										
<br><br>





<br><br>
  <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Select Images');?></label>
<div class="col-sm-5">
<div class="field" align="left">
<input type="file" id="files" name="upload_file[]" class="btn btn-default" multiple />
</div>

 
</div>

<br><br/>
<div class="col-xs-12 col-md-12">
 <div class="row">
  <div id="image_preview" >
     




  </div>
  

 </div>
</div>

<!--new edit-->

<?php
$my_sizes=array();
$edit_size=$this->db->select('size_id')->get_where('avaible_size', array(
                'product_id' =>$postid
            ))->result_array();
            $flag=0;
            foreach($edit_size as $es){
                $my_sizes[$flag]=    $es['size_id']  ;
            $flag++;    
            }
      

?>


    <div class="form-group">
							<label for="field-1" class="col-sm-3 control-label"><?php echo ('Select Sizes');?></label>
<div class="col-sm-6">
<?php    
$sizecheck=$this->db->select('size_name,size_id')->order_by('size_name','asc')->get('size')->result_array();
foreach($sizecheck as $sc){
    ?>
<input type="checkbox"  name="sizecheck[]" value="<?php echo $sc['size_id'] ;?>"  <?php if(in_array($sc['size_id'],$my_sizes)){ echo 'checked';} ?> /><?php echo $sc['size_name'] ;?>
  
<?php }?>
 
</div>
</div>
<br><br/>        
                    <br>    <br>



<h4>Price Section For Materials  And Sizes </h4>
   <hr>
   <div class="container">
<?php 
      $q=$this->db->get('materials')->result_array();
      ?>
      <input type="hidden" name="material_count" class="form-control" value ="<?php echo count($q);  ?>"  required="required">
      <?php
      $i=0;
      foreach($q as $l){
       
?>
<div class="col-sm-3">
<h4 style="text-align:center"><b><?php echo ($l['materials_name']);?><b></h4>
<input type="hidden" name="material_id<?php echo $i ;?>" class="form-control" value ="<?php echo $l['materials_id'] ;?>"  required="required">
									<!--
                  	<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ($l['materials_name']);?></label>
                        <div class="col-sm-5">
     
                           <input type="text" name="material_price<?php echo $l['materials_id'] ;?>" class="form-control" value ="0"  required="required">
                           <input type="hidden" name="material_id<?php echo $i ;?>" class="form-control" value ="<?php echo $l['materials_id'] ;?>"  required="required">
                         </div>
                    </div>
-->




      
     
   <hr>
   <table class="table table-striped">
    <thead>
      <tr>
      <th><?php echo ('size');?></th>
        <th>Price</th>
      
      </tr>
      </thead>
    <tbody>
<?php 
      $qa=$this->db->order_by('size_name','asc')->get('size')->result_array();
      ?>
      <input type="hidden" name="size_count" class="form-control" value ="<?php echo count($qa);  ?>"  required="required">
     <?php 
      $j=0;
      foreach($qa as $la){
        
?>
  

						<!--
            				<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ($l['size_name']);?></label>
                        <div class="col-sm-5">
                           <input type="text" name="size_price<?php echo $l['size_id'] ;?>" class="form-control" value ="0"  required="required">
                           <input type="hidden" name="size_id<?php echo $i ;?>" class="form-control" value ="<?php echo $l['size_id'] ;?>"  required="required">
                        </div>
                    </div>
          -->
<tr class="<?php echo "size_matrix". $la['size_id']; ?>" 
<?php if(in_array($la['size_id'],$my_sizes)){ 
echo 'style=""';
}else{
echo 'style ="display: none" ';
}
?>  >
<td><?php echo ($la['size_name']);?></td>



<input type="hidden" name="<?php echo $i.'size_id'.$j ;?>" class="form-control" value ="<?php echo $la['size_id'] ;?>"  >
<td>
<?php
 $myPrice=0;
 $shippinglocal=0;
 $shippingint=0;
 $weight=0;
 $package_size=0;
$n=$this->db->select('price,shipping_price_il,shipping_price,weight,package_size')->where('size_id',$la['size_id'])->where('material_id',$l['materials_id'])->where('product_id',$postid)->get('material_size_price')->row_array();
if(!empty($n)){
  $myPrice=$n['price'];
  $shippinglocal=$n['shipping_price_il'];
  $shippingint=$n['shipping_price'];
  $weight=$n['weight'];
  $package_size=$n['package_size'];

}else{
  $myPrice=0;
  $shippinglocal=0;
  $shippingint=0;
  $weight=0;
 $package_size=0;
}
?>  
<input type="text" name="<?php echo $i.'size_price'.$j  ;?>" style="background: aliceblue;" class="form-control" value ="<?php echo $myPrice; ?>"  required="required">
<label>Shipping Price (IL)</label>
<input type="text" name="<?php echo $i.'shipping_price_il'.$j  ;?>" style="background: antiquewhite;" class="form-control" value ="<?php echo $shippinglocal; ?>"  required="required">
<label>Shipping Price (Other)</label>
<input type="text" name="<?php echo $i.'shipping_price'.$j  ;?>" style="background: beige;" class="form-control" value ="<?php echo $shippingint; ?>"  required="required">
<label>Weight</label>
<input type="text" name="<?php echo $i.'weight'.$j  ;?>" class="form-control" style="background: ivory;" value ="<?php echo $weight; ?>"  required="required">
<label>Package size</label>
<input type="text" name="<?php echo $i.'package_size'.$j  ;?>" style="background: mediumseagreen;" class="form-control bg-success" value ="<?php echo $package_size; ?>"  required="required">

</td>

</tr>

        

     
   



      <?php
    $j++;
    } ?>
      </tbody>
  </table>
  </div>
      <?php
    $i++;
    } ?>
   
   </div>











<div class="form-group">
  <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('
');?></label>
</div>
<div class="col-sm-5">
 

  <input type="submit" class="btn btn-primary btn-lg btn-block" name='submit_image' value="Update data"/>
 </form>
 
  <?php endforeach;?>  
</div>
</div>


<script>
function fuckyou (){
alert(i);
  return false;
}


function preview_image() 
{
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<div class='col-xs-2 col-md-2'><a href=''><img height='200px' width='200px' class= 'img-thumbnail'  src='"+URL.createObjectURL(event.target.files[i])+"'> delete</a> </div>");
 }
}





</script>




















</div>


        </div>
        <div class="col-md-1">

        </div>
    </div>
</div>
</div>
