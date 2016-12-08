
<?php $this->load->view('templates/message_handler') ?>
<script>
$(document).ready(function(){
	$('.money').keyup(function(){
		$(this).val(addCommas($(this).val()));
	});
	$('#id_kary').change(function(){
		$.getJSON('<?php echo base_url();?>hrm/penggajian/get_gaji/'+$(this).val(),function(data){
			$('#nilai_gaji').val(addCommas(data.gaji_kary));
			$('#naik_gaji_kary').val(addCommas(data.naik_gaji_kary));
			$('#nilai_tunjangan').val(addCommas(data.tunjangan_kary));
			$('#nilai_pph').val(addCommas(data.pph_kary));
		});
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
    		<label class="col-sm-2 control-label input-sm">Gaji Karyawan</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="nilai_gaji" 
                    id="nilai_gaji" 
                    placeholder="Gaji Karyawan" 
					style="text-align:right"
					readonly
                    value="<?php echo (empty($contentData['nilai_gaji']))? set_value('nilai_gaji') : number_format($contentData['nilai_gaji']); ?>"
                    <?php echo (empty($contentData['nilai_gaji']))? '' : 'readonly'; ?>" 
                    required="true"/>
                <?php echo form_error('nilai_gaji', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>  
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Tunjangan Karyawan</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="nilai_tunjangan" 
                    id="nilai_tunjangan" 
                    placeholder="Tunjangan Karyawan" 
					style="text-align:right"
					readonly
                    value="<?php echo (empty($contentData['nilai_tunjangan']))? set_value('nilai_tunjangan') : number_format($contentData['nilai_tunjangan']); ?>"
                    <?php echo (empty($contentData['nilai_tunjangan']))? '' : 'readonly'; ?>" 
                    required="true"/>
                <?php echo form_error('nilai_tunjangan', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>   
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Pph</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="nilai_pph" 
                    id="nilai_pph" 
                    placeholder="Pph" 
					style="text-align:right"
					readonly
                    value="<?php echo (empty($contentData['nilai_pph']))? set_value('nilai_pph') : number_format($contentData['nilai_pph']); ?>"
                    <?php echo (empty($contentData['nilai_pph']))? '' : 'readonly'; ?>" 
                    required="true"/>
                <?php echo form_error('nilai_pph', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Tgl Gaji</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="tgl_gaji" 
                    placeholder="Tanggal Gaji" 
					style="text-align:right"
                    value="<?php echo (empty($contentData['tgl_gaji']))? set_value('tgl_gaji') : tgl_indo($contentData['tgl_gaji']); ?>"
                    <?php echo (empty($contentData['tgl_gaji']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('tgl_gaji', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Lembur</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="nilai_lembur" 
                    placeholder="Lembur" 
					style="text-align:right"
                    value="<?php echo (empty($contentData['nilai_lembur']))? set_value('nilai_lembur') : number_format($contentData['nilai_lembur']); ?>"
                    <?php echo (empty($contentData['nilai_lembur']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('nilai_lembur', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Keterangan</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="keterangan_gaji" 
                    placeholder="Keterangan" 
					style="text-align:right"
                    value="<?php echo (empty($contentData['keterangan_gaji']))? set_value('keterangan_gaji') : $contentData['keterangan_gaji']; ?>"
                    <?php echo (empty($contentData['keterangan_gaji']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('keterangan_gaji', '<label class="text-red">', '</label>'); ?>
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

