
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
                <select name="id_kary" id="id_kary" class="form-control select2 input-sm" style="width: 100%;">
    				<option value="0">--- Choose ---</option>
                    <?php foreach($kary as $row){?>
					<option value="<?php echo $row->id;?>" <?php if($contentData){
						if($row->id==$contentData['nik_kary']){ echo 'selected'; }
					}?>><?php echo $row->nama_kary;?></option>
					<?php } ?>
    			</select>
                <?php echo form_error('nik_kary', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Tgl Pinjam</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="tgl_pinjam" 
                    placeholder="Tanggal Pinjam" 
					style="text-align:right"
                    value="<?php echo (empty($contentData['tgl_pinjam']))? set_value('tgl_pinjam') : tgl_indo($contentData['tgl_pinjam']); ?>"
                    <?php echo (empty($contentData['tgl_pinjam']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('tgl_pinjam', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Frequensi</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="frequensi" 
                    placeholder="Frequensi" 
					style="text-align:right"
                    value="<?php echo (empty($contentData['frequensi']))? set_value('frequensi') : number_format($contentData['frequensi']); ?>"
                    <?php echo (empty($contentData['frequensi']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('frequensi', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Nilai Pinjam</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="nilai_pinjam" 
                    placeholder="Nilai Pinjam" 
					style="text-align:right"
                    value="<?php echo (empty($contentData['nilai_pinjam']))? set_value('nilai_pinjam') : number_format($contentData['nilai_pinjam']); ?>"
                    <?php echo (empty($contentData['nilai_pinjam']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('nilai_pinjam', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Keterangan</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="keterangan_pinjam" 
                    placeholder="Keterangan" 
					style="text-align:right"
                    value="<?php echo (empty($contentData['keterangan_pinjam']))? set_value('keterangan_pinjam') : $contentData['keterangan_pinjam']; ?>"
                    <?php echo (empty($contentData['keterangan_pinjam']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('keterangan_pinjam', '<label class="text-red">', '</label>'); ?>
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

