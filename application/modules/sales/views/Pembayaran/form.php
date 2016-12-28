
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
	$('#sale_no').change(function(){
		$.getJSON('<?php echo base_url();?>sales/pembayaran_pos/get_beli/'+$(this).val(),function(data){
			$('#nilai_beli').val(addCommas(data.sale_total));
			$('#terima_byr').val(addCommas(data.sale_bayar));
			$('#sale_no').val(data.sale_no);
			$('#hutang').val(addCommas(String(data.sale_total-data.sale_bayar)));
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
    		<label class="col-sm-2 control-label input-sm">Sale No *</label>
    		<div class="col-sm-3">
                <select name="sale_no" id="sale_no" class="form-control select2 input-sm" style="width: 100%;">
    				<option value="0">--- Choose ---</option>
                    <?php foreach($sale as $row){?>
					<option value="<?php echo $row->sale_no;?>" <?php if($contentData){
						if($row->sale_no==$contentData['sale_no']){ echo 'selected'; }
					}?>><?php echo $row->sale_no;?></option>
					<?php } ?>
    			</select>
                <?php echo form_error('sale_no', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Nilai Pembelian</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="nilai_beli" 
                    id="nilai_beli" 
					readonly
                    placeholder="Nilai Beli" 
					style="text-align:right"
                    value="<?php echo (empty($contentData['sale_total']))? set_value('sale_total') : number_format($contentData['sale_total']); ?>"
                    <?php echo (empty($contentData['sale_total']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('sale_total', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Pembayaran Diterima</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="terima_byr" 
                    id="terima_byr" 
                    placeholder="Pembayarn Diterima" 
					readonly
					style="text-align:right"
                    value="<?php echo (empty($contentData['sale_bayar']))? set_value('sale_bayar') : number_format($contentData['sale_bayar']); ?>"
                    <?php echo (empty($contentData['sale_bayar']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('sale_bayar', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Hutang</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="hutang" 
                    id="hutang" 
                    placeholder="Hutang"
					readonly
					style="text-align:right"
                   value="<?php echo (empty($contentData['sale_bayar']))? set_value('sale_bayar') : number_format($contentData['sale_bayar']); ?>"
                    <?php echo (empty($contentData['sale_bayar']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('sale_bayar', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Tgl bayar</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="tgl_bayar" 
                    id="tgl_bayar" 
                    placeholder="Tgl Bayar" 
					style="text-align:right;"
                    value="<?php echo (empty($contentData['']))? set_value('tgl_bayar') : tgl_indo($contentData['tgl_bayar']); ?>"
                    <?php echo (empty($contentData['tgl_bayar']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('tgl_bayar', '<label class="text-red">', '</label>'); ?>
				
				<input type="hidden" name="cicilan" id="cicilan">
    		</div>
    	</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Nilai bayar</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="nilai_bayar" 
                    id="nilai_bayar" 
                    placeholder="Nilai Bayar" 
					style="text-align:right;"
                    value="<?php echo (empty($contentData['']))? set_value('sale_bayar') : tgl_indo($contentData['sale_bayar']); ?>"
                    <?php echo (empty($contentData['sale_bayar']))? '' : ''; ?>" 
                    required="true"/>
                <?php echo form_error('sale_bayar', '<label class="text-red">', '</label>'); ?>
				
				<input type="hidden" name="cicilan" id="cicilan">
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

