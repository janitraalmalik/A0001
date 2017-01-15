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
    <h4 class="text-center" style="margin-top: 0!important;"><?php echo $moduleTitle; ?></h4>
	<table id="datatables" class="gridtable" style="font-size: 12px;">
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
</div>

</body>
</html>