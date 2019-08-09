

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>




<div class="row">
    <div class="col-md-12">
        <div  data-collapsed="0">
            
            <br><br>
            <div class="panel-body">
                
                <?php echo form_open(base_url() . 'admin/add_newproperty/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
    
                 
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
            $q= $this->db->where('cat_type','gallery')->get('maincategory')->result_array();
            foreach($q as $l){
            ?>
            <option value="<?php echo $l['maincat_id']; ?>"><?php echo $l['name'] ;?></option>
            <?php } ?>
            </select>
            </div>
          </div>
 <br>           
     <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo ('Gallery Type ');?></label>
            <div class="col-sm-8">
            <select name="gallery_type" class="form-control" >
            <?php
            $qa= $this->db->get('type')->result_array();
            foreach($qa as $la){
            ?>
            <option value="<?php echo $la['type_id']; ?>"><?php echo $la['type_name'] ;?></option>
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
          <br><br>
          
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
							<label for="field-1" class="col-sm-3 control-label"><?php echo ('Select Images');?></label>
<div class="col-sm-5">
<div class="field" align="left">
<input type="file" id="files" name="upload_file[]" class="btn btn-default" multiple />
  
</div>
 
</div>

<br><br/>
<div class="col-xs-12 col-md-12">
 <div class="row">
  <div id="image_preview" ></div>
  

 </div>
</div>
    </div>     
										<div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Price Of Expenses ');?></label>
                        <div class="col-sm-5">
                           <input type="number" name="expenses_price" class="form-control" value ="0"  required="required">
                        </div>
                        <br>    <br>
                    </div>
                     <br>    <br>
                                   <div class="form-group">
							<label for="field-1" class="col-sm-3 control-label"><?php echo ('Select Sizes');?></label>
<div class="col-sm-5">
<?php    
$sizecheck=$this->db->select('size_name,size_id')->order_by('size_name','asc')->get('size')->result_array();
foreach($sizecheck as $sc){
    ?>
<input type="checkbox"  name="sizecheck[]" value="<?php echo $sc['size_id'] ;?>"  checked /><?php echo $sc['size_name'] ;?>
  
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
<div class="col-sm-4">
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
<tr class="<?php echo "size_matrix". $la['size_id']; ?>">
<td><?php echo ($la['size_name']);?></td>



<input type="hidden" name="<?php echo $i.'size_id'.$j ;?>" class="form-control" value ="<?php echo $la['size_id'] ;?>"  >
<td>  <input type="text" name="<?php echo $i.'size_price'.$j  ;?>" style="background: aliceblue;"  class="form-control" value ="0"  required="required">
<label>Shipping Price (IL)</label>
<input type="text" name="<?php echo $i.'shipping_price_il'.$j  ;?>" style="background: antiquewhite;" class="form-control" value ="0"  required="required">
<label>Shipping Price (Other)</label>
<input type="text" name="<?php echo $i.'shipping_price'.$j  ;?>" style="background: beige;" class="form-control" value ="0"  required="required">
<label>Weight</label>
<input type="text" name="<?php echo $i.'weight'.$j  ;?>" class="form-control" style="background: ivory;" value ="0"  required="required">
<label>Package size</label>
<input type="text" name="<?php echo $i.'package_size'.$j  ;?>" style="background: mediumseagreen;" class="form-control bg-success" value ="0"  required="required">
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

