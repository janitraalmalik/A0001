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
	<h2 class="text-center" style="margin: 0!important;"><b><?php echo $this->_roleName ?></b></h2>
    <h4 class="text-center" style="margin: 0!important;">Periode : <?php echo (!empty($inputGet['start']))? $inputGet['start'] : date('d-m-Y')?> - <?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?></h4>
    <h4 class="text-center" style="margin: 0!important;"><?php echo $moduleTitle; ?></h4>
    <h4 class="text-center" style="margin-top: 0!important;"><?php if($inputGet['sale_type']!="0"){echo $inputGet['sale_type'];}else{echo 'RETAIL & GROSIR';} ?></h4>
	<table id="datatables" class="gridtable" style="font-size: 12px;" width=520>
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
            <?php if(isset($listSales)):?>
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
</div>

</body>
</html>