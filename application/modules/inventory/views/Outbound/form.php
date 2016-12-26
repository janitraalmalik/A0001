
<?php 
//var_dump($getPO);exit();
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
                    type="date" 
                    name="tgltrxPO" 
                    id="tgltrxPO"
                    value="<?= date("d-m-Y"); ?>"  
					required="true"/>
                <?php echo form_error('tgltrxPO', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
    	<!--div class="form-group">
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
    	</div-->
    	<div class="form-group">
    		<label class="col-sm-3 control-label input-sm">No Trx Sales *</label>
    		<div class="col-sm-9">
                <select name="poNo" id="noPO" class="form-control select2" style="width: 100%;" >
						<option value=""></option>
                        <?php
							
                         foreach($getSales as $rowSales){ ?>
                        <option value="<?=$rowSales->sale_no; ?>"><?=$rowSales->sale_no; ?>||<?=$rowSales->cust_nama; ?></option>
                        <?php } ?>
                </select>
    		</div>
    	</div>
       
    </div>
    <div class="col-sm-12">
        <div class="row" style="margin-left: -50px;">
          <div class="col-sm-12 data-barang" style="margin-bottom: 50px;">     
            <br />
            <br />
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="info">
                        <th align="center">Produk</th>
                        <th align="center">Kuantitas</th>
                        <th align="center">Satuan</th>
                        <th align="center">Jumlah In</th>
                        <th align="center">Refund</th>
                        <th align="center">Sisa</th>
                        <!--th style="width:120px">Refund</th>
                        <th style="width:120px">Sisa</th-->
                        <!--th style="">&nbsp;</th-->
			        </tr>
                </thead>
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
               $.getJSON('<?php echo base_url('inventory/Data_outbound/showSalesitem');?>/' + po, function (data) {
                 // alert(data.kd_satuan);
				 $('.inbound').remove();
					var tr;
					for (var i = 0; i < data.length; i++) {
						var a = 
						tr = $('<tr class="inbound">');
						tr.append("<td><input type='text' name='brg_nama[]' id='brg_nama" + i + "' readonly='true' value='" +data[i].brg_kd +"'>" + data[i].brg_kd + "</td>");
						tr.append("<td><input type='hidden' name='jml_barang[]' class='jml_barang" + i + "' id='jml_barang" + i + "' readonly='true' value='" +data[i].qty +"' class='form-control numeric jml_barang' align='center'>" + data[i].qty + "</td>");
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
									alert("Tidak Boleh Lebih besar dari Jumlah Barang yang di Beli");
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

                               
                               var qtys = JmlIna - refua;

                               var sisaSa = a - (JmlIna - refua);    

                               //alert(refua);
                               //alert(sisaa);

                                //var xx = $('#sisa'+ index).val();

                              //  alert(sisaa+refua);
                                $('#jml_in'+ index).val(qtys);
                               
                               //var uh = parseInt($('#jml_in'+ index).val(qtys));  



                              // var sis = a - uh;

                               //    alert(qtys);

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

