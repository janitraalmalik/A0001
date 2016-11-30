
<?php $this->load->view('templates/message_handler') ?>

<section class="content">
    <?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
    <div class="col-sm-6">
        <div class="form-group">
    		<label class="col-sm-3 control-label input-sm">Kode</label>
    		<div class="col-sm-9">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="codeVendors" 
                    placeholder="" 
                    value="<?php echo (empty($contentData['vend_kd']))? set_value('nameCode') : $contentData['vend_kd']; ?>" 
                    readonly="true"/>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-3 control-label input-sm">Nama Perusahaan *</label>
    		<div class="col-sm-9">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="nameVendors" 
                    placeholder="Nama Perusahaan" 
                    value="<?php echo (empty($contentData['vend_name']))? set_value('nameVendors') : $contentData['vend_name']; ?>" 
                    required="true"/>
                <?php echo form_error('nameVendors', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
        <div class="form-group">
    		<label class="col-sm-3 control-label input-sm">Alamat</label>
            <div class="col-sm-9">
                <textarea 
                    class="form-control" 
                    rows="3" 
                    name="addressVendors" 
                    placeholder="Alamat"
                ><?php echo (empty($contentData['vend_alamat']))? set_value('addressVendors') : $contentData['vend_alamat'] ; ?></textarea>
    		</div>
    	</div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="col-sm-3 control-label input-sm">&nbsp; </label>
    		<div class="col-sm-9">
                &nbsp;
    		</div>
    	</div>
         <div class="form-group">
            <label class="col-sm-3 control-label input-sm">No. Tlp </label>
    		<div class="col-sm-9">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="phoneVendors" 
                    placeholder="No. Tlp" 
                    value="<?php echo (empty($contentData['vend_name']))? set_value('phoneVendors') : $contentData['vend_name']; ?>" 
                    required="true"/>
                <?php echo form_error('phoneVendors', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
        <div class="form-group">
            <label class="col-sm-3 control-label input-sm">Nama Penanggung Jawab *</label>
    		<div class="col-sm-9">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="picVendors" 
                    placeholder="Nama Penanggung Jawab" 
                    value="<?php echo (empty($contentData['vend_pic']))? set_value('picVendors') : $contentData['vend_pic']; ?>" 
                    required="true"/>
                <?php echo form_error('picVendors', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-6">
                <input type="hidden" name="id" value="<?php echo (empty($contentData['id']))? '' : $contentData['id']; ?>"/>
    			<button type="submit" class="btn btn-flat btn-primary color-palette btn-sm"><span class="fa fa-save"></span> &nbsp;Simpan </button>
    			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Kembali</a>
    		</div>
    	</div>
    </div>
    <?php echo form_close(); ?>
</section>

<!--div class="callout callout-info">
	<span>Untuk penulisan format tanggal pada MS. Excel harus menggunakan format tanggal bahasa Indonesia, contoh : 99/99/9999</span>
</div-->

