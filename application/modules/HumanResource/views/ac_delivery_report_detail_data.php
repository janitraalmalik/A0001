<section class="content-header">
	<h1>Original A/C Delivery Report <small><i class="fa fa-fw fa-angle-double-right"></i> View Detail Data</small></h1>
</section>

<?php echo form_open('', array('class' => 'form-horizontal')); ?>
<div class="title-form-block"><span class="text-title-box">Aircraft Data</span></div>
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Operator</label>
	<div class="col-sm-6">
		<span><?php echo $rc->operator; ?></span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Aircraft Status</label>
	<div class="col-sm-6">
		<?php echo $rc->aircraft_registry; ?>
	</div>
</div>		
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Model</label>
	<div class="col-sm-6">
		<?php echo $rc->model; ?>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">MSN</label>
	<div class="col-sm-6">
		<?php echo $rc->msn; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Original (Export)  C of A Date</label>
	<div class="col-sm-6">
		<?php echo $rc->original_export_date; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Last  Export C of A Date</label>
	<div class="col-sm-6">
		<?php echo $rc->last_export_date; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Actual Delivery Date</label>
	<div class="col-sm-6">
		<?php echo $rc->act_delivery_date; ?>
	</div>
</div>		
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Acceptence</label>
	<div class="col-sm-6">
		<?php echo $rc->acceptence; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Previous Registry</label>
	<div class="col-sm-6">
		<?php echo $rc->previous_registry; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Lessor</label>
	<div class="col-sm-6">
		<?php echo $rc->lessor; ?>
	</div>
</div>		
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Owner</label>
	<div class="col-sm-6">
		<?php echo $rc->owner; ?>
	</div>
</div>		
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Owner Address</label>
	<div class="col-sm-6">
		<?php echo $rc->owner_address; ?>
	</div>
</div>	
<div class="title-form-block"><span class="text-title-box">Engine 1 Data</span></div>
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Engine 1 Manufacture</label>
	<div class="col-sm-6">
		<?php echo $rc->engine1_mnf; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Date of Engine 1 Manufacturing</label>
	<div class="col-sm-6">
		<?php echo $rc->date_engine1_mnf; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">PN Engine 1</label>
	<div class="col-sm-6">
		<?php echo $rc->pn_engine1; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">SN Engine 1</label>
	<div class="col-sm-6">
		<?php echo $rc->sn_engine1; ?>
	</div>
</div>	
<div class="title-form-block"><span class="text-title-box">Engine 2 Data</span></div>
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Engine 2 Manufacture</label>
	<div class="col-sm-6">
		<?php echo $rc->engine2_mnf; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Date of Engine 1 Manufacturing</label>
	<div class="col-sm-6">
		<?php echo $rc->date_engine2_mnf; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">PN Engine 2</label>
	<div class="col-sm-6">
		<?php echo $rc->pn_engine2; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">SN Engine 2</label>
	<div class="col-sm-6">
		<?php echo $rc->sn_engine2; ?>
	</div>
</div>
<?php if($rc->aircraft_registry == 'PK-GSG' || $rc->aircraft_registry == 'PK-GSH') :?>
<div class="title-form-block"><span class="text-title-box">Engine 3 Data</span></div>
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Engine 3 Manufacture</label>
	<div class="col-sm-6">
		<?php echo $rc->engine3_mnf; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Date of Engine 3 Manufacturing</label>
	<div class="col-sm-6">
		<?php echo $rc->date_engine3_mnf; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">PN Engine 3</label>
	<div class="col-sm-6">
		<?php echo $rc->pn_engine3; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">SN Engine 3</label>
	<div class="col-sm-6">
		<?php echo $rc->sn_engine3; ?>
	</div>
</div>		
<div class="title-form-block"><span class="text-title-box">Engine 4 Data</span></div>
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Engine 4 Manufacture</label>
	<div class="col-sm-6">
		<?php echo $rc->engine4_mnf; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Date of Engine 4 Manufacturing</label>
	<div class="col-sm-6">
		<?php echo $rc->date_engine4_mnf; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">PN Engine 4</label>
	<div class="col-sm-6">
		<?php echo $rc->pn_engine4; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">SN Engine 4</label>
	<div class="col-sm-6">
		<?php echo $rc->sn_engine4; ?>
	</div>
</div>
<?php endif; ?>
<div class="title-form-block"><span class="text-title-box">Apu Data</span></div>
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Apu Manufacturer</label>
	<div class="col-sm-6">
		<?php echo $rc->apu_mnf; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Date of Apu Manufacturing</label>
	<div class="col-sm-6">
		<?php echo $rc->date_apu_mnf; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Apu Model</label>
	<div class="col-sm-6">
		<?php echo $rc->apu_model; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">PN Apu</label>
	<div class="col-sm-6">
		<?php echo $rc->pn_apu; ?>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">SN Apu</label>
	<div class="col-sm-6">
		<?php echo $rc->sn_apu; ?>
	</div>
</div>	
<div class="title-form-block"><span class="text-title-box">Nose Landing Gear Data</span></div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">NLG Manufacturer</label>
	<div class="col-sm-6">
		<?php echo $rc->nlg_mnf; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Date of NLG Manufacturing</label>
	<div class="col-sm-6">
		<?php echo $rc->date_nlg_mnf; ?>
	</div>
</div>		
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">PN NLG</label>
	<div class="col-sm-6">
		<?php echo $rc->pn_nlg; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">SN NLG</label>
	<div class="col-sm-6">
		<?php echo $rc->sn_nlg; ?>
	</div>
</div>	
<div class="title-form-block"><span class="text-title-box">Main Landing Gear LH Data</span></div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">MLG LH Manufacturer</label>
	<div class="col-sm-6">
		<?php echo $rc->mlg_lg_mnf; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Date of MLG LH Manufacturing</label>
	<div class="col-sm-6">
		<?php echo $rc->date_mlg_lg_mnf; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">PN MLG LH</label>
	<div class="col-sm-6">
		<?php echo $rc->pn_mlg_lh; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">SN MLG LH</label>
	<div class="col-sm-6">
		<?php echo $rc->sn_mlg_lh; ?>
	</div>
</div>
<div class="title-form-block"><span class="text-title-box">Main Landing Gear RH Data</span></div>
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">MLG RH Manufacturer</label>
	<div class="col-sm-6">
		<?php echo $rc->mlg_rh_mnf; ?>
	</div>
</div>		
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">Date of MLG RH Manufacturing</label>
	<div class="col-sm-6">
		<?php echo $rc->date_mlg_rh_mnf; ?>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">PN MLG RH</label>
	<div class="col-sm-6">
		<?php echo $rc->pn_mlg_rh; ?>
	</div>
</div>	
<div class="form-group">
	<label class="col-sm-3 control-label input-sm">SN MLG RH</label>
	<div class="col-sm-6">
		<?php echo $rc->sn_mlg_rh; ?>
	</div>
</div>	
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-6">
		<a class="btn btn-flat btn-primary color-palette btn-sm" href="<?php echo $pdf; ?>"><span class="fa fa-download"></span> &nbsp;Download PDF </a>
		<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Back</a>
	</div>
</div>
<?php echo form_close(); ?>