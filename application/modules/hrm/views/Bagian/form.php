
<?php $this->load->view('templates/message_handler') ?>

<section class="content">
    <?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
   	    <div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Divisi Name *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="nm_bagian" 
                    placeholder="Divisi Name" 
                    value="<?php echo (empty($contentData['nm_bagian']))? set_value('nm_bagian') : $contentData['nm_bagian']; ?>"
                    <?php echo (empty($contentData['nm_bagian']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('nm_bagian', '<label class="text-red">', '</label>'); ?>
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

