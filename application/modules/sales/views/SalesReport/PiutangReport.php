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
                      <label for="inputEmail3" class="col-sm-3 control-label">As Off</label>
                      <div class="col-sm-3">
                           <input type="text" name="start" class="form-control input-sm datepicker" placeholder="Start" value="<?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?>"/>
                      </div>
                      
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Type</label>
                      <div class="col-sm-6">
                        <select name="sale_type" class="form-control select2 input-sm" style="width: 100%;">
							<option value="GROSIR">GROSIR</option>
						</select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;</label>
                      <div class="col-sm-6">    
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <a 
                            target="_BLANK"
                            href="<?php echo base_url($uri) ?>/<?php echo $linkPDF ?>?start=<?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?>&sale_type=<?php echo (!empty($inputGet['sale_type']))? $inputGet['sale_type'] : 0?>" 
                            class="btn btn-success">
                            Cetak PDF
                        </a>
                        <a 
                            target="_BLANK"
                            href="<?php echo base_url($uri) ?>/<?php echo $linkExcel;?>?start=<?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?>&sale_type=<?php echo (!empty($inputGet['sale_type']))? $inputGet['sale_type'] : 0?>" 
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
    <h4 class="text-center">As Off : <?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?> </h4>
    <h4 class="text-center"><?php echo $moduleTitle; ?></h4>
	<table id="datatables" class="table table-bordered table-hover">
		<thead>
			<tr class="info">
				<th width="2%">No.</th>
				<th width="10%"> Customer Name</th>
				<th width=""> Type</th>
				<th width=""> Date</th>
				<th width=""> HP</th>
				<th width=""> Total AR</th>
				<th width=""> Payment</th>
				<th width=""> %</th>
				<th width=""> 0-30 days</th>				
				<th width=""> 31-60 days</th>	
				<th width=""> 61- 90 days</th>	
				<th width=""> > 90 days</th>	
				<th width=""> Total Outstanding</th>	
			</tr>
		</thead>
        <tbody>
            
			<?php if(!empty($listSales)):?>
                <?php $no=1; 
					
					$totalSale='';
					$totalPay='';
					$total30day='';
					$total60day='';
					$total90day='';
					$totalm90day='';
					$totaloutstanding='';
					
					foreach($listSales as $row):
					
						$totalSale = $totalSale+$row['sale_total'];
						$totalPay  = $totalPay+$row['total_bayar'];
						$total30day  = $total30day+$row['30days'];
						$total60day  = $total60day+$row['60days'];
						$total90day  = $total90day+$row['90days'];
						$totalm90day  = $totalm90day+$row['>90days'];
						$totaloutstanding = $totaloutstanding+$row['outstanding'];
				?>
                    
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $row['cust_nama'];?></td>
                        <td><?php echo $row['sale_type'];?></td>
                        <td><?php echo tgl_indo($row['sale_tgl']);?></td>
						<td><?php echo $row['cust_hp'];?></td>					
                        <td class="text-right"><?php echo number_format($row['sale_total']);?></td>
                        <td class="text-right"><?php echo number_format($row['total_bayar']);?></td>
                        <td class="text-right"><?php echo ($row['persentase']);?></td>
						<td class="text-right"><?php echo number_format($row['30days']);?></td>
						<td class="text-right"><?php echo number_format($row['60days']);?></td>
						<td class="text-right"><?php echo number_format($row['90days']);?></td>
						<td class="text-right"><?php echo number_format($row['>90days']);?></td>
						<td class="text-right"><?php echo number_format($row['outstanding']);?></td>
                    </tr>                
                <?php $no++; endforeach; ?>
				<tr class="info footReport">
                    <td colspan="5" style="text-align: center;"><b>Total</b></td>
                    <td class="text-right"><b><?php echo number_format($totalSale);?></b></td>
					<td class="text-right"><b><?php echo number_format($totalPay);?></b></td>
					<td class="text-right"><b></b></td>
					<td class="text-right"><b><?php echo number_format($total30day);?></b></td>
					<td class="text-right"><b><?php echo number_format($total60day);?></b></td>
					<td class="text-right"><b><?php echo number_format($total90day);?></b></td>
					<td class="text-right"><b><?php echo number_format($totalm90day);?></b></td>
					<td class="text-right"><b><?php echo number_format($totaloutstanding);?></b></td>
                </tr>
                <?php endif;?>
            
        </tbody>
	</table>
</section>
