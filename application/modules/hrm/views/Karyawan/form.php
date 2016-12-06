
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
    		<label class="col-sm-2 control-label input-sm">No KTP *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="no_ktp" 
                    placeholder="KTP" 
                    value="<?php echo (empty($contentData['ktp_kary']))? set_value('ktp_kary') : $contentData['ktp_kary']; ?>"
                    <?php echo (empty($contentData['ktp_kary']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('nama_kary', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 		
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Tgl Lahir *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="tgl_lahir_kary" 
                    placeholder="Tgl Lahir" 
                    value="<?php echo (empty($contentData['tgl_lahir_kary']))? set_value('tgl_lahir_kary') : $contentData['tgl_lahir_kary']; ?>"
                    <?php echo (empty($contentData['tgl_lahir_kary']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('tgl_lahir_kary', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>   
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Alamat *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="alamat_kary" 
                    placeholder="Alamat" 
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
                    <?php foreach($divisi as $row){?>
					<option value="<?php echo $row->id;?>" <?php if($contentData){
						if($row->id==$contentData['bagian_kary']){ echo 'selected'; }
					}?>><?php echo $row->nm_bagian;?></option>
					<?php } ?>
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
                    <?php foreach($agama as $row){?>
					<option value="<?php echo $row->id;?>" <?php if($contentData){
						if($row->id==$contentData['agama_kary']){ echo 'selected'; }
					}?>
					><?php echo $row->nm_agama;?></option>
					<?php } ?>
    			</select>
    		</div>
    	</div>
		<div class="form-group">
            <label class="col-sm-2 control-label input-sm">Jenis Kelamin *</label>
    		<div class="col-sm-3">
                <select name="sex_kary" class="form-control select2 input-sm" style="width: 100%;">
    				<option value="0">--- Choose ---</option>
                    <?php foreach($sex as $row){?>
					<option value="<?php echo $row->id;?>" <?php if($contentData){
						if($row->id==$contentData['sex_kary']){ echo 'selected'; }
					}?>><?php echo $row->nm_sex;?></option>
					<?php } ?>
    			</select>
    		</div>
    	</div>
		<div class="form-group">
            <label class="col-sm-2 control-label input-sm">Status Karyawan *</label>
    		<div class="col-sm-3">
                <select name="status_kerja" class="form-control select2 input-sm" style="width: 100%;">
    				<option value="0" <?php if($contentData){
						if($row->id==0){ echo 'selected'; }
					}?>>--- Choose ---</option>
    				<option value="1" <?php if($contentData){
						if($row->id==1){ echo 'selected'; }
					}?>>Kontrak</option>
    				<option value="2" <?php if($contentData){
						if($row->id==2){ echo 'selected'; }
					}?>>Freelance</option>
    				<option value="3" <?php if($contentData){
						if($row->id==3){ echo 'selected'; }
					}?>>Karyawan Tetap</option>
    			</select>
    		</div>
    	</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Tgl Masuk </label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="tgl_masuk" 
                    placeholder="Tgl Masuk" 
                    value="<?php echo (empty($contentData['tgl_masuk_kary']))? set_value('tgl_masuk') : $contentData['tgl_masuk_kary']; ?>"
                    <?php echo (empty($contentData['tgl_masuk_kary']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('tgl_masuk_kary', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Tgl Keluar </label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="tgl_keluar" 
                    placeholder="Tgl Keluar" 
                    value="<?php echo (empty($contentData['tgl_akhir_kary']))? set_value('tgl_keluar') : $contentData['tgl_akhir_kary']; ?>"
                    <?php echo (empty($contentData['tgl_akhir_kary']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('tgl_akhir_kary', '<label class="text-red">', '</label>'); ?>
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

