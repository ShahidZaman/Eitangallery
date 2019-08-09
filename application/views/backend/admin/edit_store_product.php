
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
  
  $(document).ready(function(){


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


    
   




    
        	<?php
$property=$this->db->get_where('property', array(
                'property_id' =>$postid
            ))->result_array();
    foreach($property as $row):?>


<!--   ///main sale     -->
<form action="<?php echo base_url().'admin/updatestoreuploaddata/'.$row['property_id']; ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Title');?></label>
                        
            <div class="col-sm-5">
              <input type="text" class="form-control" name="property_name" data-validate="required" data-message-required="<?php echo ('value_required');?>" value="<?php echo $row['property_name']; ?>" autofocus>
            </div>
          </div>
<br>
<br>

  <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Description');?></label>
            <div class="col-sm-5">
              <textarea class="form-control" name="property_description" data-validate="required" 
              data-message-required="<?php echo ('value_required');?>" ><?php echo $row['property_description']; ?></textarea>
            </div>
          </div>  
          <br>
<br>  <br>  

<div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Main Category ');?></label>
            <div class="col-sm-5">
            <select name="cat_id" class="form-control" id="cat_id">
            <?php
            $q= $this->db->where('cat_type','store')->get('maincategory')->result_array();
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
                                                         <img src="<?php echo $row['image_url']; ?>" alt="..." style="
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


										<br><br>
										<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Price  ');?></label>
                        <div class="col-sm-5">
                           <input type="number" name="product_price" class="form-control" value ="<?php echo $row['product_price']; ?>"  required="required">
                        </div>
                    </div>
										
<br>
<br><br>

                                
<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Shipping Price (IL) ');?></label>
                        <div class="col-sm-5">
                        <input type="text" name="<?php echo 'shiping_il'  ;?>" class="form-control" value ="<?php echo $row['shiping_il']; ?>"  required="required">
                        </div>
                    </div>
                    <br> <br>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Shipping Price (Other)');?></label>
                        <div class="col-sm-5">
                        <input type="text" name="<?php echo 'shiping_in'  ;?>" class="form-control" value ="<?php echo $row['shiping_in']; ?>"  required="required">
                        </div>
                    </div>




                    <br> <br>
<div class="form-group">
  <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('
');?></label>
</div>
<div class="col-sm-5">
 

  <input type="submit" class="btn btn-primary btn-lg btn-block" name='submit_image' value="Upload data"/>
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
