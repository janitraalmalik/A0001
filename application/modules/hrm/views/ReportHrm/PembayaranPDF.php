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
	<h4 align="center">Laporan Pembayaran</h4>
	<table id="datatables" class="table table-bordered table-hover" cellspacing=0>
		<thead>
			<tr>
				<th width="2%">No.</th>
				<th width=""> Kode Karyawan</th>
				<th width=""> Nama Karyawan</th>
				<th width=""> Tanggal Pembayaran</th>
				<th width=""> Nilai Bayar</th>
				<th width=""> Cicilan Ke</th>
				<th width=""> Keterangan</th>
				
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach($data as $row){?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row->nik_kary;?></td>
				<td><?php echo $row->nama_kary;?></td>
				
				<td><?php echo tgl_indo($row->tgl_bayar);?></td>
				<td>Rp&nbsp;<?php echo number_format($row->nilai_bayar);?></td>
				<td><?php echo $row->ke;?></td>
				<td><?php echo $row->keterangan_bayar;?></td>
			</tr>
			<?php $no++; } ?>
		</tbody>
	</table>
</section>