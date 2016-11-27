
<?php $this->load->view('templates/message_handler') ?>

<section class="content">
    <?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
        <div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Code *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm" 
                    type="text" 
                    name="codeSatuan" 
                    placeholder="Code" 
                    value="<?php echo (empty($contentData['satuan_kd']))? set_value('codeSatuan') : $contentData['satuan_kd']; ?>" 
                    <?php echo (empty($contentData['satuan_kd']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('codeSatuan', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Name *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="nameSatuan" 
                    placeholder="Nama" 
                    value="<?php echo (empty($contentData['satuan_name']))? set_value('nameSatuan') : $contentData['satuan_name']; ?>" 
                    required="true"/>
                <?php echo form_error('nameSatuan', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
        <div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Description</label>
            <div class="col-sm-3">
                <textarea 
                    class="form-control" 
                    rows="3" 
                    name="descSatuan" 
                    placeholder="Description"
                ><?php echo (empty($contentData['satuan_desc']))? set_value('descSatuan') : $contentData['satuan_desc'] ; ?></textarea>
    		</div>
    	</div>
    	<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-6">
                <input type="hidden" name="id" value="<?php echo (isset($contentData->id))? $contentData->id : ''; ?>"/>
    			<button type="submit" class="btn btn-flat btn-primary color-palette btn-sm"><span class="fa fa-save"></span> &nbsp;Save </button>
    			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Back</a>
    		</div>
    	</div>
    <?php echo form_close(); ?>
</section>

<!--div class="callout callout-info">
	<span>Untuk penulisan format tanggal pada MS. Excel harus menggunakan format tanggal bahasa Indonesia, contoh : 99/99/9999</span>
</div-->

