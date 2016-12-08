
<?php $this->load->view('templates/message_handler') ?>
<script>
$(document).ready(function(){
	$('.money').keyup(function(){
		$(this).val(addCommas($(this).val()));
	});
});
function addCommas(str) {
	str = str.replace(/,/g,'');
	str = parseInt(str);
	if(isNaN(str)){
		str = 0;
	}
    var parts = (str + "").split("."),
        main = parts[0],
        len = main.length,
        output = "",
        i = len - 1;

    while(i >= 0) {
        output = main.charAt(i) + output;
        if ((len - i) % 3 === 0 && i > 0) {
            output = "," + output;
        }
        --i;
    }
    // put decimal part back
    if (parts.length > 1) {
        output += "." + parts[1];
    }
    return output;
}
</script>
<section class="content">
    <?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Nama Karyawan *</label>
    		<div class="col-sm-3">
                <select name="id_kary" class="form-control select2 input-sm" style="width: 100%;">
    				<option value="0">--- Choose ---</option>
                    <?php foreach($kary as $row){?>
					<option value="<?php echo $row->id;?>" <?php if($contentData){
						if($row->id==$contentData['id_kary']){ echo 'selected'; }
					}?>><?php echo $row->nama_kary;?></option>
					<?php } ?>
    			</select>
                <?php echo form_error('id_kary', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>  
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Gaji</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="gaji" 
					style="text-align:right"
                    placeholder="Gaji" 
                    value="<?php echo (empty($contentData['gaji_kary']))? set_value('gaji') : angka($contentData['gaji_kary']); ?>"
                    <?php echo (empty($contentData['gaji_kary']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('nama_kary', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 		
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Naik Gaji Karyawan</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="naik_gaji_kary" 
                    placeholder="Naik Gaji Karyawan" 
					style="text-align:right"
                    value="<?php echo (empty($contentData['naik_gaji_kary']))? set_value('naik_gaji_kary') : angka($contentData['naik_gaji_kary']); ?>"
                    <?php echo (empty($contentData['naik_gaji_kary']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('naik_gaji_kary', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>   
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Tunjangan Karyawan</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="tunjangan_kary" 
                    placeholder="Tunjangan Karyawan" 
					style="text-align:right"
                    value="<?php echo (empty($contentData['tunjangan_kary']))? set_value('tunjangan_kary') : angka($contentData['tunjangan_kary']); ?>"
                    <?php echo (empty($contentData['tunjangan_kary']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('tunjangan_kary', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>   
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Pph</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="pph_kary" 
                    placeholder="Pph" 
					style="text-align:right"
                    value="<?php echo (empty($contentData['pph_kary']))? set_value('pph_kary') : angka($contentData['pph_kary']); ?>"
                    <?php echo (empty($contentData['pph_kary']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('pph_kary', '<label class="text-red">', '</label>'); ?>
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

