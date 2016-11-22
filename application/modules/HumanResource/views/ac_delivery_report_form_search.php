<?php echo jquery_select2(); ?>
<?php echo jquery_datepicker(); ?>
<?php echo jquery_ui(); ?>

<script type="text/javascript">
$().ready(function(){
	$('[name=aircraft_registry], [name=model]').select2({width : '40%'});
	
	$('[name=original_start_date], [name=original_end_date], [name=acceptance_start_date], [name=acceptance_end_date]').datepicker({ 
		format: 'yyyy-mm-dd', 
		autoclose: true, 
		todayHighlight: true 
	});
	
	$("#pn_engine").autocomplete({   
		minLength:0,
		delay:0,
		source: '<?php echo site_url('/aircraft_status/ac_delivery_report/ajax_group_engine'); ?>',   
		select:function(event, ui){
			//$('#nama').val(ui.item.nama);
			//$('#ibukota').val(ui.item.ibukota);
			//$('#ket').val(ui.item.keterangan);
		}
	});
	
});
</script>

<section class="content-header">
	<h1>Original AC Delivery Report <small><i class="fa fa-fw fa-angle-double-right"></i> Search</small></h1>
</section>

<?php echo form_open($act, array('class' => 'form-horizontal row-form')); ?>
	<span id="selction-ajax"></span>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">AC Registry</label>
		<div class="col-sm-4">
			<select name="aircraft_registry">
				<option value="0">--- AC Registry ---</option>
				<?php echo modules::run('aircraft_status/ac_delivery_report/options_ac_registry'); ?>
			</select>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Model</label>
		<div class="col-sm-4">
			<select name="model">
				<option value="0">--- Model ---</option>
				<?php echo modules::run('aircraft_status/ac_delivery_report/options_model'); ?>
			</select>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">MSN</label>
		<div class="col-sm-2">
		  <input class="form-control input-sm" type="text" name="msn" placeholder="MSN" value="" />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Original (Export) C Of A Date</label>
		<div class="col-xs-2">
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</div>
				<input type="text" name="original_start_date" class="form-control input-sm pull-right" placeholder="Start Date" value="" />
			</div>
		</div>
		<div class="col-xs-2">
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</div>
				<input type="text" name="original_end_date" class="form-control input-sm pull-right" placeholder="End Date" value="" />
			</div>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Acceptance Date</label>
		<div class="col-xs-2">
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</div>
				<input type="text" name="acceptance_start_date" class="form-control input-sm pull-right" placeholder="Start Date" value="" />
			</div>
		</div>
		<div class="col-xs-2">
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</div>
				<input type="text" name="acceptance_end_date" class="form-control input-sm pull-right" placeholder="End Date" value="" />
			</div>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Lessor</label>
		<div class="col-sm-2">
		  <input class="form-control input-sm" type="text" name="lessor" placeholder="Lessor" value="" />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">PN Engine</label>
		<div class="col-sm-2">
		  <input class="form-control input-sm autocomplete" id="pn_engine" type="text" name="pn_engine" placeholder="PN Engine" value="" />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">SN Engine</label>
		<div class="col-sm-2">
		  <input class="form-control input-sm" type="text" name="sn_engine" placeholder="SN Engine" value="" />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">PN Apu</label>
		<div class="col-sm-2">
		  <input class="form-control input-sm" type="text" name="pn_apu" placeholder="PN Apu" value="" />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">SN Apu</label>
		<div class="col-sm-2">
		  <input class="form-control input-sm" type="text" name="sn_apu" placeholder="SN Apu" value="" />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">PN NLG</label>
		<div class="col-sm-2">
		  <input class="form-control input-sm" type="text" name="pn_nlg" placeholder="PN NLG" value="" />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">SN NLG</label>
		<div class="col-sm-2">
		  <input class="form-control input-sm" type="text" name="sn_nlg" placeholder="SN NLG" value="" />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">PN MLG</label>
		<div class="col-sm-2">
		  <input class="form-control input-sm" type="text" name="pn_mlg" placeholder="PN MLG" value="" />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">SN MLG</label>
		<div class="col-sm-2">
		  <input class="form-control input-sm" type="text" name="sn_mlg" placeholder="SN MLG" value="" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-6">
			<button type="submit" class="btn btn-flat btn-primary color-palette btn-sm"><span class="fa fa-search"></span> &nbsp;Find </button>
			<a href="<?php echo $add; ?>" class="btn btn-flat bg-light-blue color-palette btn-sm"><span class="fa fa-plus"></span>&nbsp;&nbsp;Add New</a>
			<button type="reset" class="btn btn-flat btn-danger color-palette btn-sm"><span class="fa fa-circle-o-notch"></span> &nbsp;Reset </button>
		</div>
	</div>
<?php echo form_close(); ?>