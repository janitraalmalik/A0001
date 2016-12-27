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
    .text-right{
        text-align:right;
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
    <h4 class="text-center" style="margin: 0!important;"><?php echo $moduleTitle; ?></h4>
    <h4 class="text-center" style="margin: 0!important;">As off : <?php echo (!empty($_GET['start']))? $_GET['start'] : date('d-m-Y')?></h4>

	<table id="datatables" class="gridtable" style="font-size: 11px;" width=800>
		<thead>
			<tr class="info">
				<th width="2%">No.</th>
				<th width="7%"> Customer Name</th>
				<th width="5%"> Type</th>
				<th width="5%"> Date</th>
				<th width="5%"> HP</th>
				<th width="5%"> Total AR</th>
				<th width="5%"> Payment</th>
				<th width="5%"> %</th>
				<th width="5%"> 0-30 days</th>				
				<th width="5%"> 31-60 days</th>	
				<th width="5%"> 61- 90 days</th>	
				<th width="5%"> > 90 days</th>	
				<th width="5%"> Total Outstanding</th>
			</tr>
		</thead>
        <tbody>
            <?php if(isset($listPiutang)):?>
                <?php $no=1; 
				
					$totalSale='';
					$totalPay='';
					$total30day='';
					$total60day='';
					$total90day='';
					$totalm90day='';
					$totaloutstanding='';
					
					foreach($listPiutang as $row):
					
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
</div>

</body>
</html>