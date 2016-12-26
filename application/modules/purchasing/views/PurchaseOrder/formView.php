
<?php $this->load->view('templates/message_handler') ?>

<section class="content">
    <?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
    <div class="col-sm-6">
        <div class="form-group">
    		<label class="col-sm-4 control-label">Kode</label>
    		<div class="col-sm-8">
                <h5><?php echo (empty($contentData['po_no']))? set_value('nameCode') : $contentData['po_no']; ?></h5>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Nama Perusahaan *</label>
    		<div class="col-sm-8">
                <select name="nameVendors" id="nameVendors" class="form-control select2" style="width: 100%;" disabled="true">
    				<option value=""></option>
                    <?php $nameVendors = set_value('nameVendors'); if(!empty($nameVendors) || $nameVendors != ''): ?>
                        <?php foreach($vendorsData as $rowVend): ?>
                        <option value="<?php echo $rowVend['vend_kd']?>" <?php echo ($nameVendors == $rowVend['vend_kd'])?'selected':''?> ><?php echo $rowVend['vend_name']?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php foreach($vendorsData as $rowVend): ?>
                        <option value="<?php echo $rowVend['vend_kd']?>" <?php echo (@$contentData['kd_vendor_supplier'] == $rowVend['vend_kd'])?'selected':''?> ><?php echo $rowVend['vend_name']?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
    			</select>
                <?php echo form_error('nameVendors', '<label class="text-red">', '</label>'); ?>                
    		</div>
    	</div>
        <div class="form-group">
    		<label class="col-sm-4 control-label input-sm">Alamat</label>
            <div class="col-sm-8">
                <textarea 
                    class="form-control" 
                    rows="3" 
                    name="addressVendors"
                    id="addressVendors" 
                    placeholder="Alamat"
                    disabled="true"
                ><?php echo (empty($vendorDataRow['vend_alamat']))? set_value('addressVendors') : $vendorDataRow['vend_alamat'] ; ?></textarea>
    		</div>
    	</div>
        <div class="form-group">
    		<label class="col-sm-4 control-label">Tanggal Transaksi</label>
            <div class="col-sm-8">
                <input 
                    disabled="true"
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="tgltrxPO" 
                    id="tgltrxPO" 
                <?php if(empty($contentData['po_tgl']) || $contentData['po_tgl'] == ''): ?>
                        <?php  $tgltrxPO = set_value('tgltrxPO'); if(empty($tgltrxPO) || $tgltrxPO == ''): ?>
                            value="<?php echo replaceIsWeekend(date('d-m-Y'));?>"
                        <?php else: ?>
                            value="<?php echo set_value('tgltrxPO');?>"
                        <?php endif; ?>
                <?php else: ?>
                    value="<?php echo tgl_indo($contentData['po_tgl']);?>"
                <?php endif; ?> 
                    required="true"/>
                <?php echo form_error('tgltrxPO', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="col-sm-3 control-label input-sm">&nbsp; </label>
    		<div class="col-sm-9">
                &nbsp;
    		</div>
    	</div>
         <div class="form-group">
            <label class="col-sm-4 control-label">No. Tlp </label>
    		<div class="col-sm-8">
                <input 
                    disabled="true"
                    class="form-control input-sm"
                    type="text" 
                    name="phoneVendors" 
                    id="phoneVendors"
                    placeholder="No. Tlp" 
                    value="<?php echo (empty($vendorDataRow['vend_tlp']))? set_value('phoneVendors') : $vendorDataRow['vend_tlp']; ?>" 
                    required="true"/>
                <?php echo form_error('phoneVendors', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Nama Penanggung Jawab *</label>
    		<div class="col-sm-8">
                <input 
                    class="form-control input-sm"
                    disabled="true"
                    type="text" 
                    name="picVendors" 
                    id="picVendors"
                    placeholder="Nama Penanggung Jawab" 
                    value="<?php echo (empty($vendorDataRow['vend_pic']))? set_value('picVendors') : $vendorDataRow['vend_pic']; ?>" 
                    required="true"/>
                <?php echo form_error('picVendors', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
        <div class="form-group">
    		<label class="col-sm-4 control-label">Tanggal Penagihan</label>
            <div class="col-sm-8">
                <input 
                    class="form-control input-sm datepicker"
                    disabled="true"
                    type="text" 
                    name="tglPenagihanPO" 
                    id="tglPenagihanPO" 
                    <?php if(empty($contentData['po_tgl']) || $contentData['po_tgl'] == ''): ?>
                            <?php  $tglPenagihanPO = set_value('tglPenagihanPO'); if(empty($tglPenagihanPO) || $tglPenagihanPO == ''): ?>
                                value="<?php echo net14(date('d-m-Y'));?>"
                            <?php else: ?>
                                value="<?php echo set_value('tglPenagihanPO');?>"
                            <?php endif; ?>
                    <?php else: ?>
                        value="<?php echo tgl_indo($contentData['po_tgl_tagihan']);?>"
                    <?php endif; ?>  
                    required="true"/>
                <?php echo form_error('tglPenagihanPO', '<label class="text-red">', '</label>'); ?>
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
                        <th style="width:120px">Harga Satuan</th>
                        <th style="width:120px">Jumlah</th>
			        </tr>
                </thead>
               	<tbody class="my-data-barang">
                <?php 
                    $index = set_value('index');
                    $TotPajak = 0;
                    $subTotPO = 0;
                    $TotPO = 0;                
                ?>
    
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
                            <?php foreach($barangData as $row): ?>
                                <b><?php echo ($dtlProduk == $row['brg_kd'])?$row['brg_nama']:''?></b>
                            <?php endforeach; ?>
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
                                <span class="numeric"><?php echo $dltHarga; ?></span>
                            </div>
                        </td>
                        <td>
                            <div style="text-align: right;">
                                <span class="numeric"><?php echo $dltTotal; ?></span>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                   <?php endif; ?>
                
                </tbody>
            </table>
          </div>
      </div>
    </div>
    <div class="col-sm-6 col-sm-offset-6">
         <div class="form-group" style="margin-bottom: 0;">
            <h4 class="col-sm-6 text-right" style="margin-top: 10px;">Sub Total</h4>
    		<div class="col-sm-6 text-right">
                <input 
                    type="hidden" 
                    name="subTotalInput" 
                    class="subTotalInput" 
                    value="<?php echo (empty($subTotPO))? set_value('subTotalInput') : $subTotPO; ?>"/>
                <h4 class="subTotal"><?php echo '<b> ' . ((!empty($subTotPO))? number_format($subTotPO):0) . '</b>' ; ?></h4>
    		</div>
    	</div>
    </div>
    <div class="col-sm-6 col-sm-offset-6">
         <div class="form-group" style="margin-bottom: 0;">
            <h5 class="col-sm-6 text-right" style="margin-top: 10px;">PPn</h5>
    		<div class="col-sm-6 text-right">
                <input 
                    type="hidden" 
                    name="ppnPOInput" 
                    class="ppnPOInput" 
                    value="<?php echo (empty($TotPajak))? set_value('ppnPOInput') : $TotPajak; ?>"/>
                <h4 class="ppnPO"><?php echo '<b> ' . ((!empty($TotPajak))? number_format($TotPajak):0) . '</b>' ; ?></h4>
    		</div>
    	</div>
    </div>
    <div class="col-sm-6 col-sm-offset-6">
         <div class="form-group" style="margin-bottom: 0;">
            <h4 class="col-sm-6 text-right" style="margin-top: 10px;">Total</h4>
    		<div class="col-sm-6 text-right">
                <input 
                    type="hidden" 
                    name="totalPOInput"
                    class="totalPOInput" 
                    value="<?php echo (empty($TotPO))? set_value('totalPOInput') : $TotPO; ?>"/>
                <h4 class="totalPO"><?php echo '<b>' . ((!empty($TotPO))? number_format($TotPO):0) . '</b>'; ?></h4>
    		</div>
    	</div>
    </div>
    
    <div class="col-sm-6 col-sm-offset-6">
         <div class="form-group" style="margin-bottom: 0;">
            <h4 class="col-sm-6 text-right" style="margin-top: 10px;">Sudah Diterima</h4>
    		<div class="col-sm-6 text-right">
                <h4 class="totalPO"><?php echo '<b>' . number_format($contentData['po_bayar']) . '</b>'; ?></h4>
    		</div>
    	</div>
    </div>
    
    <?php $sisaTagihan = $contentData['po_total']-$contentData['po_bayar']; ?>
    <div class="col-sm-6 col-sm-offset-6">
         <div class="form-group" style="margin-bottom: 0;">
            <h4 class="col-sm-6 text-right" style="margin-top: 10px;"><b>Sisa Tagihan</b></h4>
    		<div class="col-sm-6 text-right">
                <h4 class="totalPO"><?php echo '<b>' . number_format($sisaTagihan) . '</b>'; ?></h4>
    		</div>
    	</div>
    </div>
    
    <div class="col-sm-12">
        <div class="row">
            
            <br />
            <div class="col-sm-6">
            
            <?php if(!empty($contentDataPay)): ?>
                <div class="box box-primary direct-chat direct-chat-primary collapsed-box" style="border-radius:0!important;">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        Daftar Pembayaran &nbsp;         
                        <span data-toggle="tooltip" title="<?php echo count($contentDataPay);?> Data Pembayaran" class="badge bg-light-blue"><?php echo count($contentDataPay);?></span>
                      </h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="info">
                                    <th style="width:100px">Tanggal</th>
                                    <th style="width:130px">No. Pembayaran</th>
                                    <th style="width:100px">Jumlah</th>
                		        </tr>
                            </thead>
                           	<tbody class="my-data-barang">
                                    <?php foreach($contentDataPay AS $rowPay):?>
                                        <tr>
                                            <td><?php echo tgl_indo($rowPay['tgl_bayar'])?></td>
                                            <td>Pembayaran : #<?php echo $rowPay['pembayaran_no']?><br />Pembelian : #<?php echo $rowPay['po_no']?></td>
                                            <td style="text-align: right;"><span class="numeric"><?php echo $rowPay['pembayaran_total']?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
        
                      
                    </div>
                
                </div>
                
                <?php endif;?>
            </div>
            
            <div class="col-sm-6">
                <?php if(!empty($contentDataDetail)): ?>
                <div class="box box-primary direct-chat direct-chat-primary collapsed-box" style="border-radius:0!important;">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        Daftar Penerimaan Barang &nbsp;                
                      </h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="info">
                                    <th style="width:130px">Barang</th>
                                    <th style="width:70px">Jml Beli</th>
                                    <th style="width:70px">Jml Terima</th>
                                    <th style="width:70px">Sisa</th>
                		        </tr>
                            </thead>
                           	<tbody class="my-data-barang">
                                 <?php foreach($contentDataDetail AS $rowDetail2):?>
                                        <tr>
                                            <td>        
                                                <?php foreach($barangData as $row): ?>
                                                    <?php echo ($rowDetail2['kd_barang'] == $row['brg_kd'])?$row['brg_nama']:''?>
                                                <?php endforeach; ?>
                                            </td>
                                            <td style="text-align: center;">        
                                                <?php echo $rowDetail2['jml_barang'];?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php                                                    
                                                    $penerimaan = $this->db->select_sum('jml_in')->where('deleted_by', NULL)->where('po_no', $contentData['po_no'])->where('barang_kd',$rowDetail2['kd_barang'])->get('i_t_inbound')->row();
                                                    echo $penerimaan->jml_in;
                                                ?>
                                            </td>  
                                            <td style="text-align: center;">        
                                                <?php $sisaPending = $rowDetail2['jml_barang'] - 0;?>
                                                <?php echo $sisaPending; ?>
                                            </td>    
                                        </tr>
                                <?php endforeach; ?>  
                            </tbody>
                        </table>
        
                      
                    </div>
                
                </div>   
                <?php endif;?>
            </div>
            
            
        </div>
        
    </div>
    
    <div class="col-sm-12">
        <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-6">
    			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Kembali</a>
    		</div>
    	</div>
    </div>
    <?php echo form_close(); ?>
</section>

<section class="content">

</section>

<script>
    $(document).ready(function() {
        
        //$('#tgltrxPO').datepicker({
//                showButtonPanel: true,
//                format: 'dd-mm-yyyy',
//                daysOfWeekDisabled: [0, 6]
//        }).datepicker("setDate", new Date());
//        
        $( "#nameVendors" ).change(function() {
            var nameVendors = $(this).val();
            if (nameVendors != '') {
                $.getJSON('<?php echo base_url('purchasing/data_vendors/detail');?>/' + nameVendors, function (data) {
                    if (data == '003') { alert('Data Not Found!'); } 
                    else { 
                        $("#addressVendors").val(data.alamat);
                        $("#phoneVendors").val(data.phone);
                        $("#picVendors").val(data.pic);                   
                    }
                }); 
            } else {
                $("#addressVendors").val('');
                $("#phoneVendors").val('');
                $("#picVendors").val('');
            }
        });
        
        $('.data-barang .add-box').click(function(){
            var n = $('.box-number-data-barang').length + 1;
            var box_html = $('<tr class="text-data-barang">' +
                                '<td><select name="dtlProduk[]" id="dtlProduk-' + n + '" class="form-control select2 dtlProduk" style="width: 100%;"><option value=""></option></select></td>' +
                                '<td><input type="text" name="dltKuantitas[]" id="dltKuantitas-' + n + '" class="form-control col-sm-12 numeric dltKuantitas" style="text-align: right;"/></td>' +
                                '<td>' +
                                    '<input type="text" name="dtlNmSatuan[]" id="dtlNmSatuan-' + n + '" class="form-control col-sm-12" readonly="true"/>' +
                                    '<input type="hidden" name="dtlIdSatuan[]" id="dtlIdSatuan-' + n + '"/>' +
                                '</td>' +
                                '<td><input type="text" name="dltHarga[]" id="dltHarga-' + n + '" class="form-control col-sm-12 numeric dltHarga" style="text-align: right;"/></td>' +
                                '<td><input type="text" name="dltTotal[]" id="dltTotal-' + n + '" class="form-control col-sm-12 numeric dltTotal" style="text-align: right;"/></td>' +
                                '<td style="text-align: center;width: 10px;">' +
                                    '<input type="checkbox" name="dtlPajak[]" id="dtlPajak-' + n + '" class="dtlPajak" value="1"/>' +
                                    '<input type="hidden" name="dtlPajakCheck[]" id="dtlPajakCheck-' + n + '"/>'+
                                    '<input type="hidden" name="dtlJmlPajak[]" class="dtlJmlPajak" id="dtlJmlPajak-' + n + '"/>' +
                                '</td>' + 
                                '<td style="text-align: center;width: 10px;"><input type="hidden" name="index[]" id="index-' + n + '" value="' + n + '"/><span style="display:none;" class="box-number-data-barang">' + n + 
                                '</span><a class="remove-box btn btn-danger"><i class="fa fa-remove"></i></a></td>' +  
                                '</tr>');
                                                                                                                                                                         
            box_html.hide();
            $('.my-data-barang tr.text-data-barang:last').after(box_html);
            $('#dtlProduk-' + n + '').populate();
            $(".select2").select2();
            $( ".numeric" ).number( true , 0);
            $( ".dtlProduk" ).change(function() {
                var dtlProdukVal = $(this).val();
                var dtlProdukID = $(this).attr('id');
                var splitVal = dtlProdukID.split('-');
                var indexRow = splitVal[1];
                $.getJSON('<?php echo base_url('purchasing/data_satuan/detail');?>/' + dtlProdukVal, function (data) {
                    if (data == '003') { alert('Data Not Found!'); } 
                    else { 
                        $("#dtlIdSatuan-" + indexRow ).val(data.id);
                        $("#dtlNmSatuan-" + indexRow ).val(data.nama);                   
                    }
                });
            });
            calculate();
            hitungPajak();
            box_html.fadeIn('slow');
        });
                                                                            
        $('.my-data-barang').on('click', '.remove-box', function(){
            $(this).parent().parent().css( 'background-color', '#FF6C6C' );
                $(this).parent().fadeOut("slow", function() {
                    $(this).parent().remove();
                    recalculate();
                    $('.box-number-data-barang').each(function(index){
                        $(this).text( index + 1 );
                    });
                });
            return true;
        });
        
        $( ".dtlProduk" ).change(function() {
            var dtlProdukVal = $(this).val();
            var dtlProdukID = $(this).attr('id');
            var splitVal = dtlProdukID.split('-');
            var indexRow = splitVal[1];
            $.getJSON('<?php echo base_url('purchasing/data_satuan/detail');?>/' + dtlProdukVal, function (data) {
                if (data == '003') { alert('Data Not Found!'); } 
                else { 
                    $("#dtlIdSatuan-" + indexRow ).val(data.id);
                    $("#dtlNmSatuan-" + indexRow ).val(data.nama);                   
                }
            });
        });
        
        /* Menghitung Total Tiap Barang */
        calculate();
        /* Menghitung Pajak Tiap Barang */
        hitungPajak();
             
    });
    
    function calculate(){
        $('.my-data-barang').on('keyup', '.dltKuantitas', function(){
            $('.box-number-data-barang').each(function(index){
                var index = index + 1; 
                var pajak = 0;
                var dltKuantitas = 0;
                var dltHarga = 0;
                if ($('#dltKuantitas-' + index).val() != "") { dltKuantitas  = parseInt($('#dltKuantitas-' + index).val()); }
                if ($('#dltHarga-' + index).val() != "") { dltHarga  = parseInt($('#dltHarga-' + index).val()); }
                if ($('input#dtlPajak-' + index).is(':checked')) {
                    var pajak = 10;    
                }
                var total = dltKuantitas * dltHarga;
                var jmlPajak = total*pajak/100;
                if(total == 0){
                    $('#dltTotal-' + index).val(0);
                }else{
                    $('#dltTotal-' + index).val(total);
                }
                $('#dtlJmlPajak-' + index).val(jmlPajak);
                recalculate();
            });
        });
        
        $('.my-data-barang').on('keyup', '.dltHarga', function(){
            $('.box-number-data-barang').each(function(index){
                var index = index + 1; 
                var pajak = 0;
                var dltKuantitas = 0;
                var dltHarga = 0;
                if ($('#dltKuantitas-' + index).val() != "") { dltKuantitas  = parseInt($('#dltKuantitas-' + index).val()); }
                if ($('#dltHarga-' + index).val() != "") { dltHarga  = parseInt($('#dltHarga-' + index).val()); }
                if ($('input#dtlPajak-' + index).is(':checked')) {
                    var pajak = 10;    
                }
                var total = dltKuantitas * dltHarga;
                var jmlPajak = total*pajak/100;
                if(total == 0){
                    $('#dltTotal-' + index).val(0);
                }else{
                    $('#dltTotal-' + index).val(total);
                }
                $('#dtlJmlPajak-' + index).val(jmlPajak);
                recalculate();
            });
        });   
    }
    
    function hitungPajak(){
        $(".dtlPajak").change(function(){
            $('.box-number-data-barang').each(function(index){
                var index = index + 1; 
                var dltKuantitas = 0; 
                var dltHarga = 0;
                var pajak = 0;
                var ischeck = 0;
                if ($('#dltKuantitas-' + index).val() != "") { dltKuantitas  = parseInt($('#dltKuantitas-' + index).val()); }
                if ($('#dltHarga-' + index).val() != "") { dltHarga  = parseInt($('#dltHarga-' + index).val()); }
                if ($('input#dtlPajak-' + index).is(':checked')) {
                    var pajak = 10;    
                    var ischeck = 1;    
                }
                var total = dltKuantitas * dltHarga;
                var jmlPajak = total*pajak/100;
                if(total == 0){
                    $('#dltTotal-' + index).val(0);
                }else{
                    $('#dltTotal-' + index).val(total);
                }
                $('#dtlJmlPajak-' + index).val(jmlPajak);
                $('#dtlPajakCheck-' + index).val(ischeck)
                recalculate();
            });
        }); 
    }
    
    function recalculate(){
        var sum = 0;
        var sumPajak = 0;
        $(".dltTotal").each(function(){
            var result = $(this).val();
            sum += parseInt(result);
        });
        $(".dtlJmlPajak").each(function(){
            var resultPajak = $(this).val();
            sumPajak += parseInt(resultPajak);
        });
        
        var totalbayar = sum + sumPajak;
        $('.ppnPO').number(sumPajak).css('font-weight', 'bold');
        $('.subTotal').number(sum).css('font-weight', 'bold');
        $('.totalPO').number(totalbayar).css('font-weight', 'bold');
        $('.ppnPOInput').val(sumPajak);
        $('.subTotalInput').val(sum);
        $('.totalPOInput').val(totalbayar);
        
    }
    
    

    

    $.fn.populate = function() {
      $(this)
        <?php foreach($barangData as $row): ?>
            .append('<option value="<?php echo $row['brg_kd']?>"><?php echo $row['brg_nama']?></option>')
        <?php endforeach; ?>
    }
    
    
    
</script>

