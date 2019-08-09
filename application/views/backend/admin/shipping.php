
<?php $edit_data = $this->db->get_where('shipping', array('shipping_id' => 1) )->result_array();

foreach ( $edit_data as $row):
?>

<?php echo form_open(base_url() . 'admin/add_shipping/' , array('class' => 'form-horizontal  validate', 'enctype' => 'multipart/form-data'));?>
    
	<div class="form-group">
		<label for="field-1" class="col-sm-3 control-label"><?php echo (' Shipping Price(Local):');?></label>
		<div class="col-sm-5">
		   <input type="text" name="shipping_local" class="form-control" required="required" value="<?php echo $row['shipping_local']; ?>">
		</div>
	</div>
	<br>	<br>
	<div class="form-group">
		<label for="field-1" class="col-sm-3 control-label"><?php echo (' Shipping Price(International):');?></label>
		<div class="col-sm-5">
		   <input type="text" name="shipping_internation" class="form-control" required="required" value="<?php echo $row['shipping_internation']; ?>">
		</div>
	</div>
	<br>	<br>
	<div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo ('Update');?></button>
                        </div>
                    </div>
                    <br>
                <?php echo form_close();?>
				<?php
endforeach;
?>
