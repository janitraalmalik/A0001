<?php
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=" . $fileName . ".xls");
        
?>
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

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

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
	
	img{float:left;padding-right:10px;}
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
    	padding: 8px;
    	border-style: solid;
    	border-color: #666666;
    	background-color: #dedede;
    }
    table.gridtable td {
    	border-width: 1px;
    	padding: 8px;
    	border-style: solid;
    	border-color: #666666;
    	background-color: #ffffff;
    }
	</style>
</head>
<body>

<div id="container">
	<h2 class="text-center" style="margin: 0!important;"><b><?php echo $this->_roleName ?></b></h2>
    <h4 class="text-center" style="margin: 0!important;">Periode : <?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?> - <?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?></h4>
    <h4 class="text-center" style="margin-top: 0!important;"><?php echo $moduleTitle; ?></h4>
	<table id="datatables" class="gridtable" style="font-size: 12px;">
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
</div>

</body>
</html>
