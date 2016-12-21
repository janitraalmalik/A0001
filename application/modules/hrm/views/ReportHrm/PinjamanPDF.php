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
	<h4 align="center">Laporan Pinjaman</h4>
	<table id="datatables" class="table table-bordered table-hover" cellspacing=0>
		<thead>
			<tr>
				<th width="2%">No.</th>
				<th width=""> Kode Karyawan</th>
				<th width=""> Nama Karyawan</th>
				<th width=""> Tanggal Pinjaman</th>
				<th width=""> Nilai Pinjaman</th>
				<th width=""> Jumlah Cicilan</th>
				<th width=""> Keterangan</th>
				<th width=""> Status Pinjaman</th>
				
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach($data as $row){?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row->nik_kary;?></td>
				<td><?php echo $row->nama_kary;?></td>
				
				<td><?php echo tgl_indo($row->tgl_pinjam);?></td>
				<td>Rp&nbsp;<?php echo number_format($row->nilai_pinjam);?></td>
				<td><?php echo $row->frequensi;?> x</td>
				<td><?php echo $row->keterangan_pinjam;?></td>
				<td><?php if($row->status==0){ echo 'Belum Lunas'; }else{ echo 'Lunas'; };?></td>
			</tr>
			<?php $no++; } ?>
		</tbody>
	</table>
</section>