
<?php 
$this->load->view('templates/message_handler') ?>

<section class="content">
    <?php echo form_open($action, array('class' => 'cek form-horizontal row-form')); ?>
    <div class="col-sm-6">
        <div class="form-group">
    		<label class="col-sm-3 control-label input-sm">Kode</label>
    		<div class="col-sm-9">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="codeVendors" 
                    placeholder="" 
                    value="<?php echo (empty($contentData['po_no']))? set_value('nameCode') : $contentData['po_no']; ?>" 
                    readonly="true"/>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-3 control-label input-sm">Tanggal Transaksi *</label>
            <div class="col-sm-9">
                <input 
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="tgltrxPO" 
                    id="tgltrxPO" 
                    readonly="true" 
					required="true"/>
                <?php echo form_error('tgltrxPO', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-3 control-label input-sm">No Reff Vendor *</label>
            <div class="col-sm-9">
                <input 
                    class="form-control input-sm "
                    type="text" 
                    name="noReff" 
                    id="noReff" 
					required="true"/>
                <?php echo form_error('tgltrxPO', '<label class="text-red">', '</label>'); ?>
    		</div><label class="col-sm-5 control-label input-sm"><font size="1.5" color="red">* Jika Tidak ada di isi angka 0</font> </label>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-3 control-label input-sm">PO No *</label>
    		<div class="col-sm-9">
                <select name="poNo" id="noPO" class="form-control select2" style="width: 100%;" required="true">
						<option value=""></option>
                        <?php
							
                         foreach($getPO as $rowPO){ ?>
                        <option value="<?=$rowPO->po_no; ?>"><?=$rowPO->po_no; ?>||<?=$rowPO->po_desc; ?></option>
                        <?php } ?>
                </select>
    		</div>
    	</div>
       
    </div>
    <div class="col-sm-12">
        <div class="row" style="width: 1080px;margin-left: -50px;">
          <div class="col-sm-12 data-barang" style="margin-bottom: 50px;">     
            <br />
            <br />
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="info">
                        <th style="width:250px">Produk</th>
                        <th style="width:70px">Kuantitas</th>
                        <th style="width:80px">Satuan</th>
                        <th style="width:120px">Jumlah In</th>
                        <th style="width:120px">Refund</th>
                        <th style="width:120px">Sisa</th>
                        <!--th style="">&nbsp;</th-->
			        </tr>
                </thead>
               	<tbody class="my-data-barang">
				<?php 
                    $index = set_value('index');
                    $TotPajak = 0;
                    $subTotPO = 0;
                    $TotPO = 0;                
                ?>
                    <?php if(!empty($indexS) && count($index) > 0): ?>
                    <?php 
                        
                        $indexS  = set_value('index');
                        $dtlProdukS  = set_value('dtlProduk');
                        $dltKuantitasS  = set_value('dltKuantitas');
                        $dtlNmSatuanS  = set_value('dtlNmSatuan');
                        $dtlIdSatuanS  = set_value('dtlIdSatuan');
                        $dltHargaS  = set_value('dltHarga');
                        $dltTotalS  = set_value('dltTotal');
                        $dtlJmlPajakS  = set_value('dtlJmlPajak');
                        $dtlPajakCheckS  = set_value('dtlPajakCheck');
                        
                    //print_r($dltTotalS);
                    
                    $no = 1;
                    foreach($indexS as $key => $value):
                        $dtlProduk = $dtlProdukS[$key];
                        $dltKuantitas = str_replace(',', '', $dltKuantitasS[$key]);
                        $dtlNmSatuan = $dtlNmSatuanS[$key];
                        $dtlIdSatuan = $dtlIdSatuanS[$key];
                        $dltHarga = str_replace(',', '', $dltHargaS[$key]);
                        $dltTotal = str_replace(',', '', $dltTotalS[$key]);
                        $dtlPajakCheck = $dtlPajakCheckS[$key];
                        $dtlJmlPajak = str_replace(',', '', $dtlJmlPajakS[$key]);
                        $dtlPajakDesc = '';
                        if($dtlPajakCheck == 1){
                            $dtlPajakDesc = 'checked';
                        }
                        
                        $TotPajak = $TotPajak + $dtlJmlPajak;
                        $subTotPO = $subTotPO + $dltTotal;
                        $TotPO = $subTotPO + $TotPajak;
                    ?>
                    <tr class="text-data-barang">
                        <td>
                            <select name="dtlProduk[]" id="dtlProduk-<?php echo $value;?>" class="form-control select2 dtlProduk" style="width: 100%;">
                				<option value=""></option>
                                <?php foreach($barangData as $row): ?>
                                <option value="<?php echo $row['brg_kd']?>" <?php echo ($dtlProduk == $row['brg_kd'])?'selected':''?> ><?php echo $row['brg_nama']?></option>
                                <?php endforeach; ?>
                			</select> 
                        </td> 
                        <td>
                            <input type="text" name="dltKuantitas[]" id="dltKuantitas-<?php echo $value;?>" class="form-control col-sm-12 numeric dltKuantitas" style="text-align: right;"  value="<?php echo $dltKuantitas;?>"/>
                        </td>  
                        <td>
                            <input type="text" name="dtlNmSatuan[]" id="dtlNmSatuan-<?php echo $value;?>" class="form-control col-sm-12" value="<?php echo $dtlNmSatuan; ?>" readonly="true"/>
                            <input type="hidden" name="dtlIdSatuan[]" id="dtlIdSatuan-<?php echo $value;?>" value="<?php echo $dtlIdSatuan?>"/>                               
                        </td>  
                        <td>
                            <input type="text" name="dltHarga[]" id="dltHarga-<?php echo $value;?>" class="form-control col-sm-12 numeric dltHarga" style="text-align: right;" value="<?php echo $dltHarga; ?>"/>
                        </td>
                        <td>
                            <input type="text" name="dltTotal[]" id="dltTotal-<?php echo $value;?>" class="form-control col-sm-12 numeric dltTotal" style="text-align: right;" value="<?php echo $dltTotal; ?>"/>
                        </td>
                        <td style="text-align: center; width: 10px;">
                            <input type="checkbox" name="dtlPajak[]" id="dtlPajak-<?php echo $value;?>" class="dtlPajak" <?php echo $dtlPajakDesc;?> />
                            <input type="hidden" name="dtlPajakCheck[]" id="dtlPajakCheck-<?php echo $value;?>" value="<?php echo $dtlPajakCheck;?>"/>
                            <input type="hidden" name="dtlJmlPajak[]" class="dtlJmlPajak" id="dtlJmlPajak-<?php echo $value;?>" value="<?php echo $dtlJmlPajak;?>"/>
                        </td>
                        <?php if($value == 1): ?>
                        <td style="text-align: center; width: 10px;">
                            <input type="hidden" name="index[]" id="index-<?php echo $value;?>" value="<?php echo $value;?>"/>
                            <span style="display:none;" class="box-number-data-barang">1</span>
                            <a class="btn btn-info" style="margin: 0!important;"><i class="fa fa-check"></i></a>
                        </td>
                        <?php else: ?>
                        <td style="text-align: center; width: 10px;">
                            <input type="hidden" name="index[]" id="index-1" value="<?php echo $value;?>"/>
                            <span style="display:none;" class="box-number-data-barang">1</span>
                            <a class="remove-box btn btn-danger"><i class="fa fa-remove"></i></a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <?php if(!empty($contentDataDetail)): ?>
                            <?php foreach($contentDataDetail AS $rowDetail):?>
                                <?php
                                    $value = $rowDetail['index'];
                                    $dtlID = $rowDetail['id'];
                                    $dtlProduk = $rowDetail['kd_barang'];
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
                                <tr class="text-data-barang">
                                <td>
                                    <select name="dtlProduk[]" id="dtlProduk-<?php echo $value;?>" class="form-control select2 dtlProduk" style="width: 100%;">
                        				<option value=""></option>
                                        <?php foreach($barangData as $row): ?>
                                        <option value="<?php echo $row['brg_kd']?>" <?php echo ($dtlProduk == $row['brg_kd'])?'selected':''?> ><?php echo $row['brg_nama']?></option>
                                        <?php endforeach; ?>
                        			</select> 
                                </td> 
                                <td>
                                    <input type="text" name="dltKuantitas[]" id="dltKuantitas-<?php echo $value;?>" class="form-control col-sm-12 numeric dltKuantitas" style="text-align: right;"  value="<?php echo $dltKuantitas;?>"/>
                                </td>  
                                <td>
                                    <input type="text" name="dtlNmSatuan[]" id="dtlNmSatuan-<?php echo $value;?>" class="form-control col-sm-12" value="<?php echo $dtlNmSatuan; ?>" readonly="true"/>
                                    <input type="hidden" name="dtlIdSatuan[]" id="dtlIdSatuan-<?php echo $value;?>" value="<?php echo $dtlIdSatuan?>"/>                               
                                </td>  
                                <td>
                                    <input type="text" name="dltHarga[]" id="dltHarga-<?php echo $value;?>" class="form-control col-sm-12 numeric dltHarga" style="text-align: right;" value="<?php echo $dltHarga; ?>"/>
                                </td>
                                <td>
                                    <input type="text" name="dltTotal[]" id="dltTotal-<?php echo $value;?>" class="form-control col-sm-12 numeric dltTotal" style="text-align: right;" value="<?php echo $dltTotal; ?>"/>
                                </td>
                                <td style="text-align: center; width: 10px;">
                                    <input type="checkbox" name="dtlPajak[]" id="dtlPajak-<?php echo $value;?>" class="dtlPajak" <?php echo $dtlPajakDesc;?> />
                                    <input type="hidden" name="dtlPajakCheck[]" id="dtlPajakCheck-<?php echo $value;?>" value="<?php echo $dtlPajakCheck;?>"/>
                                    <input type="hidden" name="dtlJmlPajak[]" class="dtlJmlPajak" id="dtlJmlPajak-<?php echo $value;?>" value="<?php echo $dtlJmlPajak;?>"/>
                                    <input type="hidden" name="dltID[]" id="index-<?php echo $value;?>" value="<?php echo $dtlID;?>"/>
                                </td>
                                <?php if($value == 1): ?>
                                <td style="text-align: center; width: 10px;">
                                    <input type="hidden" name="index[]" id="index-<?php echo $value;?>" value="<?php echo $value;?>"/>
                                    <span style="display:none;" class="box-number-data-barang">1</span>
                                    <a class="btn btn-info" style="margin: 0!important;"><i class="fa fa-check"></i></a>
                                </td>
                                <?php else: ?>
                                <td style="text-align: center; width: 10px;">
                                    <input type="hidden" name="index[]" id="index-<?php echo $value;?>" value="<?php echo $value;?>"/>
                                    <span style="display:none;" class="box-number-data-barang">1</span>
                                    <a class="remove-box btn btn-danger"><i class="fa fa-remove"></i></a>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        <?php else:?>
                          
                        <?php endif;?>
              		
                    <?php endif; ?>
                </tbody>
            </table>
            <!--a class="btn btn-info pull-right add-box" class=""><i class="fa fa-plus"></i> Tambah Data</a-->
            <br />
            <br />
          </div>
      </div>
    </div>
   
   <div id="div1"></div>
    
    <div class="col-sm-12">
        <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-6">
                <input type="hidden" name="id" value="<?php echo (empty($contentData['id']))? '' : $contentData['id']; ?>"/>
    			<button type="submit" class="btn btn-flat btn-primary color-palette btn-sm"><span class="fa fa-save"></span> &nbsp;Simpan </button>
    			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Kembali</a>
    		</div>
    	</div>
    </div>
    <?php echo form_close(); ?>
</section>

<script>
    $(document).ready(function() {



    //alert("");
		$('#noReff').keyup(function(){
						//alert($(this).val());
		});
					
		
    
    
        $('#noPO').change(function() {
			//alert('tes');
			
            var po = $(this).val();
               $.getJSON('<?php echo base_url('inventory/Data_inbound/showPOitem');?>/' + po, function (data) {
                 // alert(data.kd_satuan);
				 $('.inbound').remove();
					var tr;
					for (var i = 0; i < data.length; i++) {
						var a = 
						tr = $('<tr class="inbound">');
						tr.append("<td><input type='hidden' name='brg_nama[]' id='brg_nama" + i + "' readonly='true' value='" +data[i].kd_barang +"'>" + data[i].brg_nama + "</td>");
						tr.append("<td><input type='hidden' name='jml_barang[]' class='jml_barang" + i + "' id='jml_barang" + i + "' readonly='true' value='" +data[i].saldo_barang +"' class='form-control numeric jml_barang'>" + data[i].saldo_barang + "</td>");
						tr.append("<td><input type='hidden' name='satuan_name[]' readonly='true' value='" +data[i].satuan_name +"'>" + data[i].satuan_name + "</td>");
						tr.append("<td><input type='text' name='jml_in[]' id='jml_in" + i + "' value='0' style='text-align:right' class='form-control numeric jml_in' required='true'></td>");
						tr.append("<td><input type='text' name='refund[]' id='refund" + i + "' value='0' style='text-align:right' class='form-control numeric refund' required='true'></td>");
                        tr.append("<td><input type='text' name='sisa[]' id='sisa" + i + "' value='" +data[i].saldo_barang +"' style='text-align:right' class='form-control numeric sisa' required='true'></td>");
						tr.append("</tr>");
						$('table').append(tr);
						$( ".numeric" ).number( true , 0);
					
					  $('#jml_in'+ i).on('keyup', function(){
						//alert("tes");
						
							$('.jml_in').each(function(index){
								var index = index; 
								//alert(index);
                                var JmlIn = parseInt($(this).val());
                                var refu = parseInt($('#refund'+ index).val());
								var sis = parseInt($('#sisa'+ index).val());
								var a = parseInt($('#jml_barang' + index).val());

                                sisaS = a - JmlIn;    

                                $('#sisa'+ index).val(sisaS);

								//alert(a);
								if (JmlIn > a){
									alert("Tidak Boleh Lebih besar dari Jumlah Barang yang di PO");
                                    $(this).val(0);
                                    $('#refund'+ index).val(0);
                                    $('#sisa'+ index).val(0);
                                }
								
								});
						
						});

                      $('#refund'+ i).on('keyup', function(){
                        //alert("tes");
                        
                            $('.refund').each(function(index){
                                var index = index; 
                                //alert(index);
                                var JmlIna = parseInt($('#jml_in'+ index).val());
                                var refua = parseInt($(this).val());
                                var sisaa = parseInt($('#sisa'+ index).val());
                                var a = parseInt($('#jml_barang' + index).val());

                               var sisaSa = a -(JmlIna + refua);    

                               //alert(refua);
                               //alert(sisaa);

                                //var xx = $('#sisa'+ index).val();

                              //  alert(sisaa+refua);
                                $('#sisa'+ index).val(sisaSa);

                                /*if (JmlIn > a){
                                    alert("Refund Tidak Boleh Lebih besar dari Jumlah Barang yang di PO");
                                    $(this).val(0);
                                    $('#refund'+ index).val(0);
                                    $('#sisa'+ index).val(0);
                                }
                                */
                                });
                        
                        });
					
//					$('#jml_barang'+ i).val(); 
					//alert(h);
					/*
					$('#jml_in'+ i).keyup(function(){
								var JmlIn = parseInt($(this).val());
								var a = parseInt($('.jml_barang'+ i).val());
								alert(JmlIn);
						
						});
					*/
					}
               });
               
			$("#jml_in").on('keypress', function(){
			 alert('asdasd');
				$('.brg_nama').each(function(index){
					var index = index + 1; 
					alert(index);
				});
			}); 
        
              
        });
        
        
        
      
    });
    
    
</script>

