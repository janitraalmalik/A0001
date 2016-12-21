<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $moduleTitle; ?></title>
    
		<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 0;
        padding :0;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}
    /*
	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
    */

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
    .text-center{
        text-align:center;
    }
	#container {
		margin: 10px;
	}
	
    table.gridtable {
    	font-family: verdana,arial,sans-serif;
    	font-size:11px;
    	color:#333333;
    	border-width: 1px;
    	border-color: #666666;
    	border-collapse: collapse;
    }
    table.gridtable th {
    	border-width: 1px;
    	padding: 5px;
    	border-style: solid;
    	border-color: #666666;
    	background-color: #dedede;
    }
    table.gridtable td {
    	border-width: 1px;
    	padding: 5px;
    	border-style: solid;
    	border-color: #666666;
    	background-color: #ffffff;
    }
	</style>
</head>
<body>

<div id="container">
    <h1 class="text-left" style="margin: 0 0 0 5px!important;"><?php echo $moduleTitle; ?></h1>
    
	<h3 class="text-left" style="margin: 0 0 0 5px!important;">Bidang Usaha : <?php echo $this->_roleName ?></h3>
    <br /><br />
    <table id="datatables" class="" style="width:50%;font-size: 12px;">
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style="width: 45%;">No PO</td>
                        <td style="width: 2%;">:</td>
                        <td><?php echo $contentData['po_no']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 45%;">Tanggal Transaksi</td>
                        <td style="width: 2%;">:</td>
                        <td><?php echo tgl_indo($contentData['po_tgl']);?></td>
                    </tr>
                    <tr>
                        <td style="width: 45%;">Tanggal Penagihan</td>
                        <td style="width: 2%;">:</td>
                        <td><?php echo tgl_indo($contentData['po_tgl_tagihan']);?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
    <table id="datatables" class="" style="width:100%;font-size: 12px;">
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td colspan="3"><h3 style="margin: 0!important;">Vendor</h3></td>
                    </tr>
                    <tr>
                        <td style="width: 45%;">Kode Vendor</td>
                        <td style="width: 2%;">:</td>
                        <td><?php echo $contentData['kd_vendor_supplier'];?></td>
                    </tr>
                    <tr>
                        <td style="width: 45%;">Nama Perusahaan</td>
                        <td style="width: 2%;">:</td>
                        <td><?php echo $vendorDataRow['vend_name'] ;?></td>
                    </tr>
                    <tr>
                        <td style="width: 45%;">Alamat</td>
                        <td style="width: 2%;">:</td>
                        <td><?php echo $vendorDataRow['vend_alamat'] ;?></td>
                    </tr>
                </table>
            </td>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="width: 45%;">No. Tlp </td>
                        <td style="width: 2%;">:</td>
                        <td><?php echo $vendorDataRow['vend_tlp'];?></td>
                    </tr>
                    <tr>
                        <td style="width: 45%;">Nama Penanggung Jawab</td>
                        <td style="width: 2%;">:</td>
                        <td><?php echo $vendorDataRow['vend_pic'];?></td>
                    </tr>
                    <tr>
                        <td style="width: 45%;">&nbsp;</td>
                        <td style="width: 5%;">&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br />
    <table id="datatables" class="gridtable" style="font-size: 12px;width:100%;">
		<thead>
			<tr class="info">
				<th width="2%">No.</th>
				<th width="40%"> Nama Barang</th>
				<th width="10%"> Kuantitas</th>
				<th width="10%"> Satuan</th>
				<th width="15%"> Harga</th>
				<th width="15%"> Jumlah</th>
			</tr>
		</thead>
        <tbody>
           <?php if(!empty($contentDataDetail)): ?>
                <?php
                    $TotPajak = 0;
                    $subTotPO = 0;
                    $TotPO = 0;                
                ?>
    
                <?php $no= 1; foreach($contentDataDetail AS $rowDetail):?>
                    <?php
                        $value = $rowDetail['index'];
                        $dtlID = $rowDetail['id'];
                        $dtlProduk = $rowDetail['kd_barang'];
                        $contentBarangRow = $this->Barang_model->find($dtlProduk,'brg_kd');
                        $dltKuantitas = str_replace(',', '', $rowDetail['jml_barang']);
                        $dtlIdSatuan = $rowDetail['kd_satuan'];
                        $contentSatuanRow = $this->Satuan_model->find($dtlIdSatuan,'id');
                        $dtlNmSatuan = $contentSatuanRow['satuan_name'];
                        $dltHarga = str_replace(',', '', $rowDetail['harga_satuan']);
                        $dltTotal = $dltKuantitas*$dltHarga;
                        $dtlPajakCheck = $rowDetail['ppn'];
                        $dtlPajakDesc = '';
                        $dtlJmlPajak = 0;
                        if($dtlPajakCheck == 1){
                            $dtlPajakDesc = 'checked';
                            $dtlJmlPajak = $dltTotal*10/100;
                        }
                        
                        $TotPajak = $TotPajak + $dtlJmlPajak;
                        $subTotPO = $subTotPO + $dltTotal;
                        $TotPO = $subTotPO + $TotPajak;
                    ?>
                    <tr class="info">
                        <td>        
                            <?php echo $no; ?>
                        </td>
        				<td>    
                            <span><?php echo $contentBarangRow['brg_nama'];?></span>
                        </td> 
                        <td>
                            <div style="text-align: right;">
                                <span><?php echo $dltKuantitas;?></span>
                            </div>
                        </td>  
                        <td>
                            <div style="text-align: center;">
                                <span><?php echo $dtlNmSatuan; ?></span>
                            </div>                              
                        </td>  
                        <td>
                            <div style="text-align: right;">
                                <span class="numeric"><?php echo number_format($dltHarga); ?></span>
                            </div>
                        </td>
                        <td>
                            <div style="text-align: right;">
                                <span class="numeric"><?php echo number_format($dltTotal); ?></span>
                            </div>
                        </td>
        			</tr>
                <?php $no++; endforeach; ?>                
                <?php $max = 12-$no;  for($i=1;$i<=$max;$i++): ?>
                    <tr class="info">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
        			</tr>
                <?php endfor; ?>
                    <tr class="info">
                        <td rowspan="3" colspan="4">&nbsp;</td>
                        <td style="text-align: center;font-weight: bold;">        
                            Sub Total
                        </td>
                        <td>
                            <div style="text-align: right;">
                                <span class="numeric"><b><?php echo number_format($subTotPO); ?></b></span>
                            </div>
                        </td>
        			</tr>
                    <tr class="info">
                        <td style="text-align: center;font-weight: bold;">        
                            Ppn
                        </td>
                        <td>
                            <div style="text-align: right;">
                                <span class="numeric"><b><?php echo number_format($TotPajak); ?></b></span>
                            </div>
                        </td>
        			</tr>
                    <tr class="info">
                        <td style="text-align: center;font-weight:bold">        
                            Total
                        </td>
                        <td>
                            <div style="text-align: right;">
                                <span class="numeric"><b><?php echo number_format($TotPO); ?></b></span>
                            </div>
                        </td>
        			</tr>
               <?php endif; ?>
        </tbody>
	</table>
    <br />
    <table style="width: 100%;">
        <tr>
            <td>
                <div style="width: 250px;height: 180px;float: right;">
                    <div style="margin: 0 0 0 120px;"> , <?php echo date('d-m-Y');?></div>
                    <div style="text-decoration: underline; margin:120px 0 0 60px;">Tandatangan & Nama</div>
                </div>
            </td>
        </tr>
    </table>
    
</div>

</body>
</html>

