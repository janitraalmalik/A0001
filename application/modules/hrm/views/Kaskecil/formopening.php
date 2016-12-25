
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
                    placeholder="Claim Date" 
                    value="<?php echo (empty($contentData['claim_date']))? set_value('claim_date') : $contentData['claim_date']; ?>"
                    <?php echo (empty($contentData['claim_date']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('claim_date', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>   
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Type *</label>
    		<div class="col-sm-3">
                <select name="Type" class="form-control select2 input-sm" style="width: 100%;">
                    <?php /*$parent = (empty($contentData['pettycash_id']))? set_value('Type') : $contentData['cat_barang_id']; echo selectCat(0,1,$parent);*/
					if(!empty($contentData['pettycash_id'])) { echo "<option value='".$contentData['Type']." selected'>".$contentData['Type']."</option>"; }
					?>
					<option value="OPENING" selected>OPENING</option>
					
    			</select>
                <?php echo form_error('Type', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div> 
		<div class="form-group">
            <label class="col-sm-2 control-label input-sm">No Cheque *</label>
    		<div class="col-sm-3">
				<input 
                    class="form-control input-sm"
                    type="text" 
                    name="sub_claim_no" 
                    placeholder="No Cheque" 
                    value="<?php echo (empty($contentData['sub_claim_no']))? set_value('sub_claim_no') : $contentData['sub_claim_no']; ?>"
                    <?php echo (empty($contentData['sub_claim_no']))? '' : 'readonly="true"'; ?>" 
                    required="true"/>
                <?php echo form_error('sub_claim_no', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Periode *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="period_s" 
                    placeholder="Periode Start" 
                    value="<?php echo (empty($contentData['period_s']))? set_value('period_s') : $contentData['period_s']; ?>"
                    <?php echo (empty($contentData['period_s']))? '' : 'readonly="true"'; ?>" 
                    required="true"
					style="float:left;"/>
                <?php echo form_error('period_s', '<label class="text-red">', '</label>'); ?>
				
				
			</div>	
			<label class="col-sm-1 control-label input-sm" style="float:left;width:10%;">to</label>
			<div class="col-sm-3">
			
				<input 
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="period_e" 
                    placeholder="Periode End" 
                    value="<?php echo (empty($contentData['period_e']))? set_value('period_e') : $contentData['period_e']; ?>"
                    <?php echo (empty($contentData['period_e']))? '' : 'readonly="true"'; ?>" 
                    required="true"
					style="float:left;"/>
                <?php echo form_error('period_e', '<label class="text-red">', '</label>'); ?>				
				
    		</div>
    	</div> 
		<div class="form-group">
            <label class="col-sm-2 control-label input-sm">Amount *</label>
    		<div class="col-sm-3">
				<input 
                    class="form-control input-sm money"
                    type="text" 
                    name="credit" 
					style="text-align:right"
                    placeholder="Amount" 
                    value="<?php echo (empty($contentData['credit']))? set_value('credit') : $contentData['credit']; ?>"
                    <?php echo (empty($contentData['credit']))? '' : 'readonly="true"'; ?>" 
                    required="true"
					style="float:left;"/>
                <?php echo form_error('credit', '<label class="text-red">', '</label>'); ?>			
    		</div>
			<label class="col-sm-1 control-label input-sm" style="float:left;width:10%;">Sisa Saldo</label>
			<div class="col-sm-3">
			
				<input 
                    class="form-control input-sm money"
                    type="text" 
                    name="saldo" 
					style="text-align:right"
                    placeholder="Sisa Saldo" 
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
                    placeholder="Description" 
                    value="<?php echo (empty($contentData['petty_desc']))? set_value('petty_desc') : $contentData['petty_desc']; ?>"
                    <?php echo (empty($contentData['petty_desc']))? '' : 'readonly="true"'; ?>" 
                    required="true"
					style="float:left;width:604px;"/>
                <?php echo form_error('petty_desc', '<label class="text-red">', '</label>'); ?>	
    		</div>
    	</div>
		<div class="form-group">
            <label class="col-sm-2 control-label input-sm">Request</label>
    		<div class="col-sm-3">
				<input 
                    class="form-control input-sm"
                    type="text" 
                    name="" 
                    placeholder="Request" 
                    value="<?php echo (empty($contentData['petty_desc']))? set_value('petty_desc') : $contentData['petty_desc']; ?>"
                    <?php echo (empty($contentData['petty_desc']))? '' : 'readonly="true"'; ?>" 
                    required="true"
					style="float:left;"/>
                <?php echo form_error('petty_desc', '<label class="text-red">', '</label>'); ?>	
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


