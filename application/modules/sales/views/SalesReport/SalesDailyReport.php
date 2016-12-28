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
                      <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
                      <div class="col-sm-6">
							<select class="form-control select2 input-sm" id="sale_type" name="sale_type">
								<?php 
								if(!empty($inputGet['sale_type'])) { echo "<option value='".$inputGet['sale_type']."' selected>".$inputGet['sale_type']."</option>"; }
								?>
								<option value="0">ALL</option>
								<option value="RETAIL">RETAIL</option>
								<option value="GROSIR" >GROSIR</option>
							</select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
                      <div class="col-sm-6">    
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <a 
                            target="_BLANK"
                            href="<?php echo base_url($uri) ?>/<?php echo $linkPDF ?>?start=<?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?>&end=<?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?>&sale_type=<?php echo (!empty($inputGet['sale_type']))? $inputGet['sale_type'] : 0?>" 
                            class="btn btn-success">
                            Cetak PDF
                        </a>
                        <a 
                            target="_BLANK"
                            href="<?php echo base_url($uri) ?>/<?php echo $linkExcel ?>?start=<?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?>&end=<?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?>&sale_type=<?php echo (!empty($inputGet['sale_type']))? $inputGet['sale_type'] : 0?>" 
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
    <h4 class="text-center"><?php echo $moduleTitle; ?></h4>
	<table id="datatables" class="table table-bordered table-hover">
		<thead>
			<tr class="info">
				<th width="2%">No.</th>
				<th width="10%"> Sales No</th>
				<th width="15%"> Date</th>
				<th width=""> Type</th>
				<th width=""> Total</th>
			</tr>
		</thead>
        <tbody>
            <?php if(!empty($listSales)):?>
                <?php 
                    $totalSale = 0;
                ?>
                <?php $no=1; foreach($listSales as $row): ?>
                    <?php 
                        $totalSale = $totalSale+$row['sale_total'];
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $row['sale_no'];?></td>
                        <td><?php echo tgl_indo($row['sale_tgl']);?></td>
                        <td><?php echo $row['sale_type'];?></td>
                        <td class="text-right"><?php echo number_format($row['sale_total']);?></td>
                    </tr>                
                <?php $no++; endforeach; ?>
                <tr class="info footReport">
                    <td colspan="4" style="text-align: center;"><b>Total</b></td>
                    <td class="text-right"><b><?php echo number_format($totalSale);?></b></td>
                </tr>
            <?php endif;?>
        </tbody>
	</table>
</section>

