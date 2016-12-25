<section class="content">
    <style>
h4{
	font-family:Helvetica
}
table{
	font-family:Helvetica;font-size:9pt;width:100%
}	

td{
	padding:5px !important;border:1px solid lightgray !important;text-align:center;font-size:8pt
}
th{
	border:1px solid lightgray !important;background-color:#f0f0f0 !important;text-align:center
}
</style>
	<h4 align="center">Laporan Kas Kecil</h4>
	<table id="datatables" class="table table-bordered table-hover" cellspacing=0>
		<thead>
			<tr>
				<th width="2%">No.</th>
				<th width=""> Tanggal Claim</th>
				<th width=""> Type</th>
				<th width=""> Claim No</th>
				<th width=""> Nama Akun</th>
				<th width=""> Periode Dari</th>
				<th width=""> Periode SAmpai</th>
				<th width=""> Debit</th>
				<th width=""> Kredit</th>
				<th width=""> Keterangan</th>
				
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach($data as $row){?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row->claim_date;?></td>
				<td><?php echo $row->Type;?></td>
				<td><?php echo $row->claim_no;?></td>
				<td><?php echo $row->acc_name;?></td>
				<td><?php echo $row->period_s;?></td>
				<td><?php echo $row->period_e;?></td>
				<td><?php echo $row->period_e;?></td>
				<td><?php echo number_format($grid->debet,0);;?></td>
				<td><?php echo number_format($grid->credit,0);;?></td>
				<td><?php echo $row->petty_desc;?></td>
			</tr>
			<?php $no++; } ?>
		</tbody>
	</table>
</section>