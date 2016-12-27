
<?php $this->load->view('templates/message_handler') ?>
<script>
$(document).ready(function() {
    var pressed = false; 
    var chars = []; 
    $(window).keypress(function(e) {
        if (e.which >= 48 && e.which <= 57) {
            chars.push(String.fromCharCode(e.which));
        }
        console.log(e.which + ":" + chars.join("|"));
        if (pressed == false) {
            setTimeout(function(){
                if (chars.length >= 10) {
                    var barcode = chars.join("");
                    console.log("Barcode Scanned: " + barcode);
                    // assign value to some input (or do whatever you want)
                    alert( 'Your Product Code Is : ' + barcode);
                    
                }
                chars = [];
                pressed = false;
            },500);
        }
        pressed = true;
    });
    
    $("#barcode").keypress(function(e){
        if ( e.which === 13 ) {
            console.log("Prevent form submit.");
            e.preventDefault();
        }
    });
    
});


</script>

<section class="content">
    <?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
        <div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Kode *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm" 
                    type="text" 
                    id="barcode"
                    name="codeSatuan" 
                    placeholder="Kode" 
                    value="<?php echo (empty($contentData['satuan_kd']))? set_value('codeSatuan') : $contentData['satuan_kd']; ?>" 
                    <?php echo (empty($contentData['satuan_kd']))? '' : 'readonly="true"'; ?>" 
                    required="true" autofocus="true" />
                <?php echo form_error('codeSatuan', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Nama *</label>
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
    		<label class="col-sm-2 control-label input-sm">Keterangan</label>
            <div class="col-sm-3">
                <textarea 
                    class="form-control" 
                    rows="3" 
                    name="descSatuan" 
                    placeholder="Keterangan"
                ><?php echo (empty($contentData['satuan_desc']))? set_value('descSatuan') : $contentData['satuan_desc'] ; ?></textarea>
    		</div>
    	</div>
    	<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-6">
                <input type="hidden" name="id" value="<?php echo (isset($contentData->id))? $contentData->id : ''; ?>"/>
    			<button type="submit" class="btn btn-flat btn-primary color-palette btn-sm"><span class="fa fa-save"></span> &nbsp;Simpan </button>
    			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Kembali</a>
    		</div>
    	</div>
        
        
    <?php echo form_close(); ?>
</section>

<!--div class="callout callout-info">
	<span>Untuk penulisan format tanggal pada MS. Excel harus menggunakan format tanggal bahasa Indonesia, contoh : 99/99/9999</span>
</div-->

