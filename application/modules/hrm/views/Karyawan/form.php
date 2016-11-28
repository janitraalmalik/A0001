
<?php $this->load->view('templates/message_handler') ?>

<section class="content">
    <?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
   	    <div class="form-group">
    		<label class="col-sm-2 control-label input-sm">NIK *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="nik_kary" 
                    placeholder="NIK" 
                    value="<?php echo (empty($contentData['nik_kary']))? set_value('nik_kary') : $contentData['nik_kary']; ?>"
                    <?php echo (empty($contentData['nik_kary']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('nik_kary', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>  
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Nama Karyawan *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="nama_kary" 
                    placeholder="Name" 
                    value="<?php echo (empty($contentData['nama_kary']))? set_value('nama_kary') : $contentData['nama_kary']; ?>"
                    <?php echo (empty($contentData['nama_kary']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('nama_kary', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>   
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Alamat *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="alamat_kary" 
                    placeholder="Name" 
                    value="<?php echo (empty($contentData['alamat_kary']))? set_value('alamat_kary') : $contentData['alamat_kary']; ?>"
                    <?php echo (empty($contentData['alamat_kary']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('alamat_kary', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
            <label class="col-sm-2 control-label input-sm">Divisi *</label>
    		<div class="col-sm-3">
                <select name="bagian_kary" class="form-control select2 input-sm" style="width: 100%;">
    				<option value="0">--- Choose ---</option>
                    <?php $parent = (empty($contentData['id']))? set_value('bagian_kary') : $contentData['cat_barang_id']; echo selectCat(0,1,$parent); ?>
    			</select>
    		</div>
    	</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Telp *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="telp_kary" 
                    placeholder="Name" 
                    value="<?php echo (empty($contentData['telp_kary']))? set_value('telp_kary') : $contentData['telp_kary']; ?>"
                    <?php echo (empty($contentData['telp_kary']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('telp_kary', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
            <label class="col-sm-2 control-label input-sm">Agama *</label>
    		<div class="col-sm-3">
                <select name="agama_kary" class="form-control select2 input-sm" style="width: 100%;">
    				<option value="0">--- Choose ---</option>
                    <?php $parent = (empty($contentData['id']))? set_value('agama_kary') : $contentData['cat_barang_id']; echo selectCat(0,1,$parent); ?>
    			</select>
    		</div>
    	</div>
		<div class="form-group">
            <label class="col-sm-2 control-label input-sm">Jenis Kelamin *</label>
    		<div class="col-sm-3">
                <select name="sex_kary" class="form-control select2 input-sm" style="width: 100%;">
    				<option value="0">--- Choose ---</option>
                    <?php $parent = (empty($contentData['id']))? set_value('sex_kary') : $contentData['cat_barang_id']; echo selectCat(0,1,$parent); ?>
    			</select>
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

