
<?php $this->load->view('templates/message_handler') ?>

<section class="content">
    <?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
    	<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Name *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="nameCatBarang" 
                    placeholder="Nama" 
                    value="<?php echo (empty($contentData['cat_brg_nama']))? set_value('nameCatBarang') : $contentData['cat_brg_nama']; ?>" 
                    required="true"/>
                <?php echo form_error('nameCatBarang', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
        <div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Description</label>
            <div class="col-sm-3">
                <textarea 
                    class="form-control" 
                    rows="3" 
                    name="descCatBarang" 
                    placeholder="Description"
                ><?php echo (empty($contentData['cat_brg_desc']))? set_value('descCatBarang') : $contentData['cat_brg_desc'] ; ?></textarea>
    		</div>
    	</div>
         <div class="form-group">
            <label class="col-sm-2 control-label input-sm">Parent </label>
    		<div class="col-sm-3">
                <select name="parentCatBarang" class="form-control select2 input-sm" style="width: 100%;">
    				<option value="0">--- Choose ---</option>
                    <?php $parent = (empty($contentData['cat_brg_parent']))? set_value('parentCatBarang') : $contentData['cat_brg_parent']; echo selectCat(0,1,$parent); ?>
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

<!--div class="callout callout-info">
	<span>Untuk penulisan format tanggal pada MS. Excel harus menggunakan format tanggal bahasa Indonesia, contoh : 99/99/9999</span>
</div-->

