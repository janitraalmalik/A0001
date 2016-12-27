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
                           <input required="true" type="text" name="start" class="form-control input-sm datepicker" placeholder="Start" value="<?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?>"/>
                      </div>
                      <div class="col-sm-3">
                            <input required="true"  type="text" name="end" class="form-control input-sm datepicker" placeholder="End" value="<?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
                      <div class="col-sm-6">    
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <a 
                            href="<?php echo base_url($uri) ?>/<?php echo $linkPDF ?>?start=<?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?>&end=<?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?>" 
                            class="btn btn-success"
                            target="_blank">
                            Cetak PDF
                        </a>
                        <a 
                            href="<?php echo base_url($uri) ?>/<?php echo $linkExcel ?>?start=<?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?>&end=<?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?>" 
                            class="btn btn-success"
                            target="_blank">
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
    <h4 class="text-center"><?php echo $moduleTitle; ?></h4>
	<table id="datatables" class="table table-bordered table-hover">
		<thead>
			<tr class="info">
				<th width="2%">No.</th>
				<th width="10%"> Tanggal</th>
				<th width=""> No Inbound</th>
				<th width="15%"> No. PO</th>
				<th width=""> No Reff Vendor</th>
				<th width=""> Nama Barang</th>
				<th width=""> Jumlah Qty PO</th>
				<th width=""> Jumlah Barang Masuk</th>
				<th width=""> Refund</th>
				<th width=""> Sisa</th>
			</tr>
		</thead>
        <tbody>
            <?php if(!empty($listPurchasing)):?>
                <?php 
                    $QtyPO = 0;
                    $brgIn = 0;
                    $refunds = 0;
                    $totalSisa = 0;
                ?>
                <?php $no=1; foreach($listPurchasing as $row): ?>
                    <?php 
                        $QtyPO = $QtyPO+$row['jml_brg_po'];
                        $brgIn = $brgIn+$row['jml_in'];
                        $refunds = $refunds+$row['refund'];
                        $totalSisa = $totalSisa+$row['sisa'];
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo tgl_indo($row['date_in']);?></td>
                        <td><?php echo $row['id_inbound'];?></td>
                        <td><?php echo '#' .$row['po_no'];?></td>
                        <td><?php echo $row['no_ref_vendor'];?></td>
                        <td><?php echo $row['brg_nama'];?></td>
                        <td class="text-right"><?php echo number_format($row['jml_brg_po']);?></td>
                        <td class="text-right"><?php echo number_format($row['jml_in']);?></td>
                        <td class="text-right"><?php echo number_format($row['refund']);?></td>
                        <td class="text-right"><?php echo number_format($row['sisa']);?></td>
                    </tr>                
                <?php $no++; endforeach; ?>
                <!--tr class="info footReport">
                    <td colspan="5" style="text-align: center;"><b>Total</b></td>
                    <td class="text-right"><b><?php echo number_format($QtyPO);?></b></td>
                    <td class="text-right"><b><?php echo number_format($brgIn);?></b></td>
                    <td class="text-right"><b><?php echo number_format($refunds);?></b></td>
                    <td class="text-right"><b><?php echo number_format($totalSisa);?></b></td>
                </tr-->
            <?php endif;?>
        </tbody>
	</table>
</section>
