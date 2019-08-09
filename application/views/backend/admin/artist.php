<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
.check
{
    opacity:0.5;
	color:#996;
	
}

</style>

<div class="">
	
		<form action="<?php echo base_url().'admin/save_artist_collection' ?>" method="post">
		<div class="form-group">	
        <?php 
        $x=$this->db->get('property')->result_array(); 
        foreach($x as $y){
			$flag=false;
			
			?>
        
        <div class="col-md-3">
        <label class="btn btn-primary" style="margin-bottom: 30px; padding: 10px;">


        <img src="<?php echo $y['image_url'];  ?>" 
        
		<?php 
		$sattus_result=$this->db->where('property_id',$y['property_id'])->get('artist_gallery')->result_array();
		if(count($sattus_result)>0){
			$flag=true;
		}else{
			$flag=false;
		}
		?>
		class="img-thumbnail img-check <?php if($flag==true){ echo 'check' ;} ?> ">
        <input type="checkbox" name="check_item[]" id="item4" value="<?php echo $y['property_id']; ?>" <?php if($flag==true){ echo 'checked' ;} ?> class="hidden" autocomplete="off"></label>
        
		</div>
        <?php } ?>
        
        <div class="col-md-12">
		<input type="submit" value="Save" class="btn btn-success">
		</div>
		</form>
		</div>
	    </div>
</div>

</body>
</html>
<script>
$(document).ready(function(e){
    		$(".img-check").click(function(){
				$(this).toggleClass("check");
			});
	});
</script>