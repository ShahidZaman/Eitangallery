

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>




<div class="row">
    <div class="col-md-12">
        <div  data-collapsed="0">
            
            <br><br>
            <div class="panel-body">
                
                <?php echo form_open(base_url() . 'admin/add_product_store/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
    
                 
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Title ');?></label>
                        <div class="col-sm-5">
                           <input type="text" name="property_name" class="form-control" required="required">
                        </div>
                    </div>
                 
                    <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Main Category ');?></label>
            <div class="col-sm-8">
            <select name="cat_id" class="form-control" id="cat_id">
            <?php
            $q= $this->db->where('cat_type','store')->get('maincategory')->result_array();
            foreach($q as $l){
            ?>
            <option value="<?php echo $l['maincat_id']; ?>"><?php echo $l['name'] ;?></option>
            <?php } ?>
            </select>
            </div>
          </div>
 <br>             
 <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Sub Category ');?></label>
            <div class="col-sm-8">
            <select name="subcat_id" id="subcat_id" required class="form-control">
           
            <option value=""></option>
            
            </select>
            </div>
          </div>
 <br>            

          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Description ');?></label>
            <div class="col-sm-8">
              <textarea  class="form-control" name="property_description" required="required" placeholder="Description"> </textarea>
            </div>
          </div>
 <br>
 
 <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Product Price ');?></label>
                        <div class="col-sm-5">
                           <input type="text" name="product_price" class="form-control" required="required">
                        </div>
                    </div>
 <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('upload Type');?></label>
            <div class="col-sm-8">
          <Select id="upload_type"  name="upload_type" class="form-control">
          <option value="1">UPLoad Image</option>
          <option value="2">Upload Link</option>
          
          </select>
          </div>
          </div>
          <br>
          <div class="form-group" id="link_div" style="display:none">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Link ');?></label>
                        <div class="col-sm-8">
                           <input type="text" name="property_link_image" class="form-control" id="link_field">
                        </div>
                    </div>
   <br>


                                                  
                            <div class="form-group" id="image_div">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo ('');?></label>
                                  <div class="form-group">
                                                  <div class="fileinput fileinput-new" data-provides="fileinput">
                                                      <div class="fileinput-new " style="width: 100px; height: 100%;" data-trigger="fileinput">
                                                         <img src="http://via.placeholder.com/150x150" alt="...">
                                                      </div>
                                                      <div class="fileinput-preview fileinput-exists " style="max-width: 200px; max-height: 150px"></div>
                                                      <div>
                                                          <span class="btn btn-white btn-file">
                                                              <span class="fileinput-new">Select  A Image to upload </span>
                                                              <span class="fileinput-exists">Change</span>
                                                              <input type="file" name="userfile" id="userfile" required>
                                                          </span>
                                                          <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                      </div>
                                                  </div>
                                              </div>
                                   </div>                   
                                           

                                
<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Shipping Price (IL) ');?></label>
                        <div class="col-sm-5">
                        <input type="text" name="<?php echo 'shiping_il'  ;?>" class="form-control" value ="0"  required="required">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Shipping Price (Other)');?></label>
                        <div class="col-sm-5">
                        <input type="text" name="<?php echo 'shiping_in'  ;?>" class="form-control" value ="0"  required="required">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info btn-block"><?php echo ('Save ');?></button>
                        </div>
                    </div>
                    <br>    
                                             
                                             
                                              </div>
                    
                                        </div>
                 
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>


<script>


function preview_image() 
{
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<div class='col-xs-2 col-md-2'><img height='200px' width='200px' class= 'img-thumbnail'  src='"+URL.createObjectURL(event.target.files[i])+"'><button > delete</button> </div>");
 }
}
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

</style>
<script type="text/javascript">
	$(document).ready(function() {
    myfunction();   
    $('#cat_id').on('change', function(){
  myfunction();   

});


$('#upload_type').on('change', function(){
  if($('#upload_type').val()==1){
    $('#link_div').hide();
    $('#image_div').show();
    $("#userfile").prop('required',true);
    $("#link_field").prop('required',false);

  }else{
    $('#link_div').show();
    $('#image_div').hide();
    $("#userfile").prop('required',false);
    $("#link_field").prop('required',true);
  }

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
          
        
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }




});



</script>

