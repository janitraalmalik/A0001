<script type="text/javascript">
$(document).ready(function(){
    $('body').addClass('sidebar-collapse');	  
});
</script>
<?php 
    $module = $this->uri->segment(1);
    $submodule = $this->uri->segment(2); 
    $uri = $module . '/' . $submodule; 
?>
<style>
    .footReport{   border-top: 2px solid #6b6b6b!important;
        border-bottom: 2px solid #6b6b6b!important;}
    .text-right{
        text-align: right;
    }
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
                      <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
                      <div class="col-sm-6">    
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <a 
                            target="_BLANK"
                            href="<?php echo base_url($uri) ?>/<?php echo $linkPDF ?>?start=<?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?>&end=<?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?>&supplier=<?php echo (!empty($inputGet['supplier']))? $inputGet['supplier'] : 0?>" 
                            class="btn btn-success">
                            Cetak PDF
                        </a>
                        <a 
                            target="_BLANK"
                            href="<?php echo base_url($uri) ?>/<?php echo $linkExcel ?>?start=<?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?>&end=<?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?>&supplier=<?php echo (!empty($inputGet['supplier']))? $inputGet['supplier'] : 0?>" 
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
				<th width="25%"> Uraian</th>
				<th width=""> S/D <?php echo date('d-M-Y', strtotime( '-1 month' , strtotime ( date('d-m-Y') ) ))?></th>
				<th width=""> % </th>
				<th width=""> S/D <?php echo date('d-M-Y')?></th>
                <th width=""> % </th>
				<th width=""> <?php echo date('M-Y')?></th>
                <th width=""> % </th>
			</tr>
		</thead>
            <tr>
                <td><b>PENDAPATAN USAHA</b> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td>PENJUALAN & PENDAPATAN </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
            </tr>
            <tr>
                <td>POTONGAN DAN RETUR PENJUALAN </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
            </tr>
            <tr>
                <td><b>TOTAL PENDAPATAN USAHA</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
            </tr>
            <tr>
                <td><b>BEBAN POKOK PENJUALAN</b></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td>BEBAN POKOK PENJUALAN  </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
            </tr>
            <tr>
                <td><b>TOTAL BEBAN POKOK PENJUALAN</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
            </tr>
            <tr>
                <td><b>LABA KOTOR</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>                
            </tr>
            <tr>
                <td><b>PENGELUARAN OPERASIONAL</b> </td>
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td>BEBAN PEMASARAN </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
            </tr>
            <tr>
                <td>BEBAN ADMINISTRASI DAN UMUM </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
            </tr>
            <tr>
                <td><b>TOTAL PENGELUARAN OPERASIONAL</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
            </tr>
            <tr>
                <td><b>LABA USAHA</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
            </tr>
            <tr>
                <td><b>PENGHASILAN (BEBAN) LAIN-LAIN</b> </td>
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td>PENGHASILAN LAIN-LAIN </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
            </tr>
            <tr>
                <td>BEBAN LAIN-LAIN </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
            </tr>
            <tr>
                <td><b>TOTAL PENGHASILAN (BEBAN) LAIN-LAIN</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
            </tr>
            <tr>
                <td><b>LABA SEBELUM BEBAN PAJAK</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
            </tr>
            <tr>
                <td><b>BEBAN (PENGHASILAN) PAJAK</b> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td>BEBAN PAJAK TANGGUHAN </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
            </tr>
            <tr>
                <td>PAJAK PENGHASILAN SAAT INI (NON FINAL) </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
            </tr>
            <tr>
                <td>PAJAK PENGHASILAN FINAL SAAT INI </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
                <td class="text-right">0 </td>
            </tr>
            <tr>
                <td><b>TOTAL BEBAN (PENGHASILAN) PAJAK</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
            </tr>
            <tr>
                <td><b>LABA PERIODE BERJALAN</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
                <td class="text-right"><b>0</b> </td>
            </tr>
        <tbody>
        </tbody>
	</table>
</section>
