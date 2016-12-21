
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
    		<label class="col-sm-2 control-label input-sm">Date *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="claim_date" 
                    placeholder="Tgl. Trans." 
                    value="<?php echo (empty($contentData['claim_date']))? set_value('claim_date') : tgl_indo($contentData['claim_date']); ?>"
                    <?php echo (empty($contentData['claim_date']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('claim_date', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
            <label class="col-sm-2 control-label input-sm">Type *</label>
    		<div class="col-sm-3">
                <select name="Type" class="form-control select2 input-sm" style="width: 100%;">
					<option value="REIMBURSH">REIMBURSH</option>
    			</select>
    		</div>
    	</div>
		<div class="form-group">
            <label class="col-sm-2 control-label input-sm">Divisi *</label>
    		<div class="col-sm-3">
                <select name="bagian_kary" class="form-control select2 input-sm" style="width: 100%;">
    				<option value="0">--- Choose ---</option>
                    <?php foreach($divisi as $row){?>
					<option value="<?php echo $row->id;?>" <?php if($contentData){
						if($row->id==$contentData['bagian_kary']){ echo 'selected'; }
					}?>><?php echo $row->nm_bagian;?></option>
					<?php } ?>
    			</select>
    		</div>
    	</div>
		<div class="form-group">
            <label class="col-sm-2 control-label input-sm">Kelompok Biaya *</label>
    		<div class="col-sm-3">
                <select name="acc_name" class="form-control select2 input-sm" style="width: 100%;">
					<option value="0">--- Choose ---</option>
					<option value="Biaya Operasional">Biaya Operasional</option>
    			</select>
    		</div>
    	</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Amount *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm money"
                    type="text" 
                    name="debet" 
					style="text-align:right"
                    placeholder="Amount debet" 
                    value="<?php echo (empty($contentData['debet']))? set_value('debet') : $contentData['debet']; ?>"
                    <?php echo (empty($contentData['debet']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('debet', '<label class="text-red">', '</label>'); ?>

			</div>
			
			<label class="col-sm-2 control-label input-sm" style="float:left;width:10%;">Sisa Saldo</label>
			<div class="col-sm-3">
			
				<input 
                    class="form-control input-sm money"
                    type="text" 
                    name="saldo" 
                    placeholder="Sisa Saldo" 
					style="text-align:right"
                    value="<?php echo (empty($contentData['saldo']))? set_value('saldo') : $contentData['saldo']; ?>"
                    <?php echo (empty($contentData['saldo']))? '' : 'readonly="true"'; ?>" 
					style="float:left;"/>
                <?php echo form_error('saldo', '<label class="text-red">', '</label>'); ?>				
				
    		</div>
			
			
    	</div> 
   	    <div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Description *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="petty_desc" 
                    placeholder="Deskripsi" 
                    value="<?php echo (empty($contentData['petty_desc']))? set_value('petty_desc') : $contentData['petty_desc']; ?>"
                    <?php echo (empty($contentData['petty_desc']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('petty_desc', '<label class="text-red">', '</label>'); ?>
				
    		</div>
    	</div>  
   	    <div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Request *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="request" 
                    placeholder="Request" 
                    value="" 
                    required="true"/>				
    		</div>
    	</div>  
    	<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-6">
                <input type="hidden" name="id" value="<?php echo (empty($contentData['pettycash_id']))? '' : $contentData['pettycash_id']; ?>"/>
    			<button type="submit" class="btn btn-flat btn-primary color-palette btn-sm"><span class="fa fa-save"></span> &nbsp;Save </button>
    			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Back</a>
    		</div>
    	</div>
    <?php echo form_close(); ?>
</section>

