<?php 
    $module = $this->uri->segment(1);
    $submodule = $this->uri->segment(2); 
    $uri = $module . '/' . $submodule; 
?>
<style>
    .footReport{   border-top: 2px solid #6b6b6b!important;
        border-bottom: 2px solid #6b6b6b!important;}
</style>
<section class="content-header">
    <form  class="form-horizontal" role="form" action=""  method="get">
        <div class="row">
            <div class="col-md-8">
                <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>
                      <div class="col-sm-3">
                           <input type="text" name="start" class="form-control input-sm datepicker" placeholder="Start" value="<?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?>"/>
                      </div>
                      <div class="col-sm-3">
                            <input type="text" name="end" class="form-control input-sm datepicker" placeholder="End" value="<?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?>"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Supplier</label>
                      <div class="col-sm-6">
                            <select class="form-control select2 input-sm" id="supplier" name="supplier">
                                <option value="0">All</option>
                            </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
                      <div class="col-sm-6">    
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <a 
                            href="<?php echo base_url($uri) ?>/purchase_listPDF?start=<?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?>&end=<?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?>&supplier=<?php echo $inputGet['supplier']?>" 
                            class="btn btn-success">
                            Cetak PDF
                        </a>
                        <a 
                            href="<?php echo base_url($uri) ?>/purchase_listExcel?start=<?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?>&end=<?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?>&supplier=<?php echo $inputGet['supplier']?>" 
                            class="btn btn-success">
                            Export Excel
                        </a>
                      </div>
                    </div>
                </div>
            </div>
        
        </div>
        
    </form>
</section>
<section class="content">
    <h3 class="text-center"><b><?php echo $this->_roleName ?></b></h3>
    <h4 class="text-center">Periode : <?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?> - <?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?></h4>
    <h4 class="text-center">Laporan Pembelian</h4>
	<table id="datatables" class="table table-bordered table-hover">
		<thead>
			<tr class="info">
				<th width="2%">No.</th>
				<th width="10%"> Tanggal</th>
				<th width="15%"> No. Transaksi</th>
				<th width=""> Supplier</th>
				<th width=""> Status</th>
				<th width=""> Jumlah Tagihan</th>
				<th width=""> Jumlah Bayar</th>
				<th width=""> Sisa Tagihan</th>
			</tr>
		</thead>
        <tbody>
            <?php if(isset($listPurchasing)):?>
                <?php 
                    $totalPO = 0;
                    $totalBayar = 0;
                    $totalSisaBayar = 0;
                ?>
                <?php $no=1; foreach($listPurchasing as $row): ?>
                    <?php 
                        $totalPO = $totalPO+$row['po_total'];
                        $totalBayar = $totalBayar+$row['po_bayar'];
                        $totalSisaBayar = $totalPO-$totalBayar;
                        $sisabayar = $row['po_total']-$row['po_bayar'];
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo tgl_indo($row['po_tgl']);?></td>
                        <td><?php echo '#' .$row['po_no'];?></td>
                        <td><?php echo getNameVendor($row['kd_vendor_supplier'],$this->_roleCode);?></td>
                        <td><?php echo getStatusPO($row['status_po_id'],$this->_roleCode);?></td>
                        <td class="text-right"><?php echo number_format($row['po_total']);?></td>
                        <td class="text-right"><?php echo number_format($row['po_bayar']);?></td>
                        <td class="text-right"><?php echo number_format($sisabayar);?></td>
                    </tr>                
                <?php $no++; endforeach; ?>
                <tr class="info footReport">
                    <td colspan="5" style="text-align: center;"><b>Total</b></td>
                    <td class="text-right"><b><?php echo number_format($totalPO);?></b></td>
                    <td class="text-right"><b><?php echo number_format($totalBayar);?></b></td>
                    <td class="text-right"><b><?php echo number_format($totalSisaBayar);?></b></td>
                </tr>
            <?php endif;?>
        </tbody>
	</table>
</section>
