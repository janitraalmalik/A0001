<style>
.title-form-block {
	background-color: #f5f5f5;
	border: 1px solid #ececec;
	display: block;
	padding: 10px;
	margin-bottom:5px;
	position: relative;
}

.title-form-block span.text-title-box {
	margin:0;
	font-size:12px;
	color: #2679b5;
}
</style>
<table>
	<tr><td colspan="3" class="title-form-block" style="margin:5px 10px;">Aircraft Data</td></tr>
	<tr>
		<td width="27%">Operator</td>
		<td width="3%">:</td>
		<td width="70%"><?php echo $rc->operator; ?></td>
	</tr>
	<tr>
		<td>Aircraft Status</td>
		<td>:</td>
		<td><?php echo $rc->aircraft_registry; ?></td>
	</tr>
	<tr>
		<td>Model</td>
		<td>:</td>
		<td><?php echo $rc->model; ?></td>
	</tr>
	<tr>
		<td>MSN</td>
		<td>:</td>
		<td><?php echo $rc->msn; ?></td>
	</tr>
	<tr>
		<td>Original (Export)  C of A Date</td>
		<td>:</td>
		<td><?php echo $rc->original_export_date; ?></td>
	</tr>
	<tr>
		<td>Last  Export C of A Date</td>
		<td>:</td>
		<td><?php echo $rc->last_export_date; ?></td>
	</tr>
	<tr>
		<td>Actual Delivery Date</td>
		<td>:</td>
		<td><?php echo $rc->act_delivery_date; ?></td>
	</tr>
	<tr>
		<td>Acceptence</td>
		<td>:</td>
		<td><?php echo $rc->acceptence; ?></td>
	</tr>
	<tr>
		<td>Previous Registry</td>
		<td>:</td>
		<td><?php echo $rc->previous_registry; ?></td>
	</tr>
	<tr>
		<td>Lessor</td>
		<td>:</td>
		<td><?php echo $rc->lessor; ?></td>
	</tr>
	<tr>
		<td>Owner</td>
		<td>:</td>
		<td><?php echo $rc->owner; ?></td>
	</tr>
	<tr>
		<td>Owner Address</td>
		<td>:</td>
		<td><?php echo $rc->owner_address; ?></td>
	</tr>
	<tr>
		<td>Owner Address</td>
		<td>:</td>
		<td><?php echo $rc->owner_address; ?></td>
	</tr>
	<tr><td colspan="3" class="title-form-block" style="margin:5px 10px;">Engine 1 Data</td></tr>
	<tr>
		<td>Engine 1 Manufacture</td>
		<td>:</td>
		<td><?php echo $rc->engine1_mnf; ?></td>
	</tr>
	<tr>
		<td>Date of Engine 1 Manufacturing</td>
		<td>:</td>
		<td><?php echo $rc->date_engine1_mnf; ?></td>
	</tr>
	<tr>
		<td>PN Engine 1</td>
		<td>:</td>
		<td><?php echo $rc->pn_engine1; ?></td>
	</tr>
	<tr>
		<td>SN Engine 1</td>
		<td>:</td>
		<td><?php echo $rc->sn_engine1; ?></td>
	</tr>
	<tr><td colspan="3" class="title-form-block" style="margin:5px 10px;">Engine 2 Data</td></tr>
	<tr>
		<td>Engine 2 Manufacture</td>
		<td>:</td>
		<td><?php echo $rc->engine2_mnf; ?></td>
	</tr>	
	<tr>
		<td>Date of Engine 1 Manufacturing</td>
		<td>:</td>
		<td><?php echo $rc->date_engine2_mnf; ?></td>
	</tr>	
	<tr>
		<td>PN Engine 2</td>
		<td>:</td>
		<td><?php echo $rc->pn_engine2; ?></td>
	</tr>
	<tr>
		<td>SN Engine 2</td>
		<td>:</td>
		<td><?php echo $rc->sn_engine2; ?></td>
	</tr>
	<?php if($rc->aircraft_registry == 'PK-GSG' || $rc->aircraft_registry == 'PK-GSH') :?>
	<tr><td colspan="3" class="title-form-block" style="margin:5px 10px;">Engine 3 Data</td></tr>
	<tr>
		<td>Engine 3 Manufacture</td>
		<td>:</td>
		<td><?php echo $rc->engine3_mnf; ?></td>
	</tr>
	<tr>
		<td>Date of Engine 3 Manufacturing</td>
		<td>:</td>
		<td><?php echo $rc->date_engine3_mnf; ?></td>
	</tr>
	<tr>
		<td>PN Engine 3</td>
		<td>:</td>
		<td><?php echo $rc->pn_engine3; ?></td>
	</tr>
	<tr>
		<td>SN Engine 3</td>
		<td>:</td>
		<td><?php echo $rc->sn_engine3; ?></td>
	</tr>
	<tr><td colspan="3" class="title-form-block" style="margin:5px 10px;">Engine 4 Data</td></tr>
	<tr>
		<td>Engine 4 Manufacture</td>
		<td>:</td>
		<td><?php echo $rc->engine4_mnf; ?></td>
	</tr>
	<tr>
		<td>Date of Engine 4 Manufacturing</td>
		<td>:</td>
		<td><?php echo $rc->date_engine4_mnf; ?></td>
	</tr>
	<tr>
		<td>PN Engine 4</td>
		<td>:</td>
		<td><?php echo $rc->pn_engine4; ?></td>
	</tr>
	<tr>
		<td>SN Engine 4</td>
		<td>:</td>
		<td><?php echo $rc->sn_engine4; ?></td>
	</tr>
	<?php endif; ?>
	<tr><td colspan="3" class="title-form-block" style="margin:5px 10px;">Apu Data</td></tr>
	<tr>
		<td>Apu Manufacturer</td>
		<td>:</td>
		<td><?php echo $rc->apu_mnf; ?></td>
	</tr>	
	<tr>
		<td>Date of Apu Manufacturing</td>
		<td>:</td>
		<td><?php echo $rc->date_apu_mnf; ?></td>
	</tr>	
	<tr>
		<td>Apu Model</td>
		<td>:</td>
		<td><?php echo $rc->apu_model; ?></td>
	</tr>
	<tr>
		<td>PN Apu</td>
		<td>:</td>
		<td><?php echo $rc->pn_apu; ?></td>
	</tr>
	<tr>
		<td>SN Apu</td>
		<td>:</td>
		<td><?php echo $rc->sn_apu; ?></td>
	</tr>
	<tr><td colspan="3" class="title-form-block" style="margin:5px 10px;">Nose Landing Gear Data</td></tr>
	<tr>
		<td>NLG Manufacturer</td>
		<td>:</td>
		<td><?php echo $rc->nlg_mnf; ?></td>
	</tr>
	<tr>
		<td>Date of NLG Manufacturing</td>
		<td>:</td>
		<td><?php echo $rc->date_nlg_mnf; ?></td>
	</tr>
	<tr>
		<td>PN NLG</td>
		<td>:</td>
		<td><?php echo $rc->pn_nlg; ?></td>
	</tr>
	<tr>
		<td>SN NLG</td>
		<td>:</td>
		<td><?php echo $rc->sn_nlg; ?></td>
	</tr>
	<tr><td colspan="3" class="title-form-block" style="margin:5px 10px;">Nose Landing Gear Data</td></tr>
	<tr>
		<td>MLG LH Manufacturer</td>
		<td>:</td>
		<td><?php echo $rc->mlg_lg_mnf; ?></td>
	</tr>
	<tr>
		<td>Date of MLG LH Manufacturing</td>
		<td>:</td>
		<td><?php echo $rc->date_mlg_lg_mnf; ?></td>
	</tr>
	<tr>
		<td>PN MLG LH</td>
		<td>:</td>
		<td><?php echo $rc->pn_mlg_lh; ?></td>
	</tr>
	<tr>
		<td>SN MLG LH</td>
		<td>:</td>
		<td><?php echo $rc->sn_mlg_lh; ?></td>
	</tr>
	<tr><td colspan="3" class="title-form-block" style="margin:5px 10px;">Main Landing Gear RH Data</td></tr>
	<tr>
		<td>MLG RH Manufacturer</td>
		<td>:</td>
		<td><?php echo $rc->mlg_rh_mnf; ?></td>
	</tr>
	<tr>
		<td>Date of MLG RH Manufacturing</td>
		<td>:</td>
		<td><?php echo $rc->date_mlg_rh_mnf; ?></td>
	</tr>
	<tr>
		<td>PN MLG RH</td>
		<td>:</td>
		<td><?php echo $rc->pn_mlg_rh; ?></td>
	</tr>
	<tr>
		<td>SN MLG RH</td>
		<td>:</td>
		<td><?php echo $rc->sn_mlg_rh; ?></td>
	</tr>
</table>