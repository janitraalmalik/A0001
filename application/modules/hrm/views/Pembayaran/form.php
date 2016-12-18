
<?php $this->load->view('templates/message_handler') ?>
<script>
$(document).ready(function(){
	$('.money').keyup(function(){
		$(this).val(addCommas($(this).val()));
	});
	$('#id_kary').change(function(){
		$.post('<?php echo base_url();?>hrm/pembayaran/get_pinjam/'+$('#id_kary').val(),function(data){
			$('#id_pinjam').html(data);
		});
	});
	$('#id_pinjam').change(function(){
		var id_pjm = $(this).val().split('-');
		$.getJSON('<?php echo base_url();?>hrm/pembayaran/get_bayar/'+id_pjm[0],function(data){
			if(data==null){
				ke = 0 ;
			}else{
				ke = data.ke;
			}
			$('#bayar_ke').val(parseInt(ke)+1);
			$('#nilai_bayar').val(addCommas(String(id_pjm[1]/id_pjm[2])));
			$('#dari').html(id_pjm[2]);
			$('#cicilan').val(id_pjm[2]);
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
    		<label class="col-sm-2 control-label input-sm">Pinjaman</label>
    		<div class="col-sm-3">
                <select name="id_pinjam" id="id_pinjam" class="form-control select2 input-sm" style="width: 100%;">
    				<option value="0">--- Choose ---</option>
                    <?php foreach($pinjam as $row){?>
					<option value="<?php echo $row->id;?>" <?php if($contentData){
						if($row->id==$contentData['id']){ echo 'selected'; }
					}?>><?php echo $row->nilai_pinjam."-".$row->keterangan_pinjam;?></option>
					<?php } ?>
    			</select>
                <?php echo form_error('nik_kary', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Pembayaran Ke</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="bayar_ke" 
                    id="bayar_ke" 
                    placeholder="Pembayaran Ke" 
					readonly
					style="text-align:right"
                    value="<?php echo (empty($contentData['ke']))? set_value('ke') : number_format($contentData['ke']); ?>"
                    <?php echo (empty($contentData['ke']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('ke', '<label class="text-red">', '</label>'); ?>
				Dari <span id="dari">...</span>&nbsp;x cicilan
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Nilai Bayar</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="nilai_bayar" 
                    id="nilai_bayar" 
                    placeholder="Nilai Bayar" 
					readonly
					style="text-align:right"
                    value="<?php echo (empty($contentData['nilai_bayar']))? set_value('nilai_bayar') : number_format($contentData['nilai_bayar']); ?>"
                    <?php echo (empty($contentData['nilai_bayar']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('nilai_bayar', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Tgl bayar</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="tgl_bayar" 
                    placeholder="Tanggal Bayar" 
					style="text-align:right;"
                    value="<?php echo (empty($contentData['tgl_bayar']))? set_value('tgl_bayar') : tgl_indo($contentData['tgl_bayar']); ?>"
                    <?php echo (empty($contentData['tgl_bayar']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('tgl_bayar', '<label class="text-red">', '</label>'); ?>
				
				<input type="hidden" name="cicilan" id="cicilan">
    		</div>
    	</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Keterangan Bayar</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="keterangan_bayar" 
                    placeholder="Keterangan" 
					style="text-align:right"
                    value="<?php echo (empty($contentData['keterangan_bayar']))? set_value('keterangan_bayar') : $contentData['keterangan_bayar']; ?>"
                    <?php echo (empty($contentData['keterangan_bayar']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('keterangan_bayar', '<label class="text-red">', '</label>'); ?>
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

