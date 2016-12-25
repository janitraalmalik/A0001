
<?php $this->load->view('templates/message_handler') ?>

<section class="content">
    <?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
    <div class="col-sm-6">
        <div class="form-group">
    		<label class="col-sm-4 control-label">Sales No.</label>
    		<div class="col-sm-8">
                <h5><?php echo (empty($contentData['sale_no']))? set_value('nameCode') : $contentData['sale_no']; ?></h5>
    		</div>
    	</div>
        <div class="form-group">
    		<label class="col-sm-4 control-label">Tanggal Transaksi</label>
            <div class="col-sm-8">
                <input 
                    disabled="true"
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="tgltrxPOS" 
                    id="tgltrxPOS" 
                <?php if(empty($contentData['sale_tgl']) || $contentData['sale_tgl'] == ''): ?>
                        <?php  $tgltrxPOS = set_value('tgltrxPOS'); if(empty($tgltrxPOS) || $tgltrxPOS == ''): ?>
                            value="<?php echo replaceIsWeekend(date('d-m-Y'));?>"
                        <?php else: ?>
                            value="<?php echo set_value('tgltrxPOS');?>"
                        <?php endif; ?>
                <?php else: ?>
                    value="<?php echo tgl_indo($contentData['sale_tgl']);?>"
                <?php endif; ?> 
                    required="true"/>
                <?php echo form_error('tgltrxPOS', '<label class="text-red">', '</label>'); ?>
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
                    $subTotPOS = 0;
                    $TotPOS = 0;                
                ?>
    
                <?php if(!empty($contentDataDetail)): ?>
                    <?php foreach($contentDataDetail AS $rowDetail):?>
                        <?php
                            $value = $rowDetail['index'];
                            $dtlID = $rowDetail['id'];
                            $dtlProduk = $rowDetail['brg_kd'];
                            $dltKuantitas = str_replace(',', '', $rowDetail['qty']);
                            $dtlIdSatuan = $rowDetail['satuan_kd'];
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
                            $subTotPOS = $subTotPOS + $dltTotal;
                            $TotPOS = $subTotPOS + $TotPajak;
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
                    value="<?php echo (empty($subTotPOS))? set_value('subTotalInput') : $subTotPOS; ?>"/>
                <h4 class="subTotal"><?php echo '<b> ' . ((!empty($subTotPOS))? number_format($subTotPOS):0) . '</b>' ; ?></h4>
    		</div>
    	</div>
    </div>
    <div class="col-sm-6 col-sm-offset-6">
         <div class="form-group" style="margin-bottom: 0;">
            <h5 class="col-sm-6 text-right" style="margin-top: 10px;">PPn</h5>
    		<div class="col-sm-6 text-right">
                <input 
                    type="hidden" 
                    name="ppnPOSInput" 
                    class="ppnPOSInput" 
                    value="<?php echo (empty($TotPajak))? set_value('ppnPOSInput') : $TotPajak; ?>"/>
                <h4 class="ppnPOS"><?php echo '<b> ' . ((!empty($TotPajak))? number_format($TotPajak):0) . '</b>' ; ?></h4>
    		</div>
    	</div>
    </div>
    <div class="col-sm-6 col-sm-offset-6">
         <div class="form-group" style="margin-bottom: 0;">
            <h4 class="col-sm-6 text-right" style="margin-top: 10px;">Total</h4>
    		<div class="col-sm-6 text-right">
                <input 
                    type="hidden" 
                    name="totalPOSInput"
                    class="totalPOSInput" 
                    value="<?php echo (empty($TotPOS))? set_value('totalPOSInput') : $TotPOS; ?>"/>
                <h4 class="totalPOS"><?php echo '<b>' . ((!empty($TotPOS))? number_format($TotPOS):0) . '</b>'; ?></h4>
    		</div>
    	</div>
    </div>
    
    <div class="col-sm-6 col-sm-offset-6">
         <div class="form-group" style="margin-bottom: 0;">
            <h4 class="col-sm-6 text-right" style="margin-top: 10px;">Bayar</h4>
    		<div class="col-sm-6 text-right">
                <h4 class="totalPOS"><?php echo '<b>' . number_format($contentData['sale_bayar']) . '</b>'; ?></h4>
    		</div>
    	</div>
    </div>
    
    <?php $sisaBayar = $contentData['sale_total']-$contentData['sale_bayar']; ?>
    <div class="col-sm-6 col-sm-offset-6">
         <div class="form-group" style="margin-bottom: 0;">
            <h4 class="col-sm-6 text-right" style="margin-top: 10px;"><b>Kembali</b></h4>
    		<div class="col-sm-6 text-right">
                <h4 class="totalPOS"><?php echo '<b>' . number_format($sisaBayar) . '</b>'; ?></h4>
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
        $('.ppnPOS').number(sumPajak).css('font-weight', 'bold');
        $('.subTotal').number(sum).css('font-weight', 'bold');
        $('.totalPOS').number(totalbayar).css('font-weight', 'bold');
        $('.ppnPOSInput').val(sumPajak);
        $('.subTotalInput').val(sum);
        $('.totalPOSInput').val(totalbayar);
        
    }
    
    

    

    $.fn.populate = function() {
      $(this)
        <?php foreach($barangData as $row): ?>
            .append('<option value="<?php echo $row['brg_kd']?>"><?php echo $row['brg_nama']?></option>')
        <?php endforeach; ?>
    }
    
    
    
</script>

