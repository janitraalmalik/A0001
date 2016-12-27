
<?php $this->load->view('templates/message_handler') ?>

<section class="content">
    <?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
   	    <div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Cust. ID *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="cust_id" 
                    placeholder="Customer Id" 
					disabled="true"
                    value="<?php echo (empty($contentData['cust_id']))? set_value('cust_id') : $contentData['cust_id']; ?>"
                    <?php echo (empty($contentData['cust_id']))? '' : 'readonly="true"'; ?>" />
                <?php echo form_error('cust_id', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>  
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Nama Customer *</label>
    		<div class="col-sm-4">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="cust_nama" 
                    placeholder="Name" 
                    value="<?php echo (empty($contentData['cust_nama']))? set_value('cust_nama') : $contentData['cust_nama']; ?>"
                    <?php echo (empty($contentData['cust_nama']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('cust_nama', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>  
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Telp *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="cust_hp" 
                    placeholder="Telp" 
                    value="<?php echo (empty($contentData['cust_hp']))? set_value('cust_hp') : $contentData['cust_hp']; ?>"
                    <?php echo (empty($contentData['cust_hp']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('cust_hp', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Alamat</label>
            <div class="col-sm-4">
                <textarea 
                    class="form-control" 
                    rows="3" 
                    name="cust_alamat"
                    id="cust_alamat" 
                    placeholder="Alamat"
                ><?php echo (empty($contentData['cust_alamat']))? set_value('cust_alamat') : $contentData['cust_alamat'] ; ?>
				</textarea>
    		</div>
    	</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Status *</label>
    		<div class="col-sm-3">
                <select name="cust_status" class="form-control select2 input-sm" style="width: 100%;">
                    <?php /*$parent = (empty($contentData['pettycash_id']))? set_value('Type') : $contentData['cat_barang_id']; echo selectCat(0,1,$parent);*/
					if(!empty($contentData['cust_status'])) { echo "<option value='".$contentData['cust_status']." selected'>".$contentData['cust_status']."</option>"; }
					?>
					<option value="AKTIF">AKTIF</option>
					<option value="TIDAK AKTIF" >TIDAK AKTIF</option>
    			</select>
                <?php echo form_error('cust_status', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
    	<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-6">
                <input type="hidden" name="id" value="<?php echo (empty($contentData['id']))? '' : $contentData['id']; ?>"/>
    			<button type="submit" class="btn btn-flat btn-primary color-palette btn-sm"><span class="fa fa-save"></span> &nbsp;Save </button>
    			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Back</a>
    		</div>
    	</div>
    <?php echo form_close(); ?>
</section>

