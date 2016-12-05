
<?php $this->load->view('templates/message_handler') ?>


<section class="content">
    <?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
    <div class="col-sm-6">
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Nama Perusahaan *</label>
    		<div class="col-sm-8">
                <select id="nameVendors" class="form-control select2" style="width: 100%;" disabled >
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
                <input type="hidden" name="nameVendors" value="<?php echo $contentData['kd_vendor_supplier'];?>"/>
                <?php echo form_error('nameVendors', '<label class="text-red">', '</label>'); ?>                
    		</div>
    	</div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
    		<label class="col-sm-4 control-label">Tanggal Penagihan</label>
            <div class="col-sm-8">
                <input 
                    class="form-control datepicker"
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
          <div class="col-sm-12 data-po" style="margin-bottom: 50px;">     
            <br />
            <br />
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="info">
                        <th style="width:100px">No. Transaksi</th>
                        <th style="width:80px">Tgl Transaksi</th>
                        <th style="width:80px">Tgl Jatuh Tempo</th>
                        <th style="width:100px">Total</th>
                        <th style="width:100px">Sisa Tagihan</th>
                        <th style="width:100px">Jumlah</th>
			        </tr>
                </thead>
               	<tbody class="my-data-po">
                   <?php $TotPO = 0; if(!empty($contentDataDetail)): ?>
                        <?php foreach($contentDataDetail AS $row):?>
                            <?php
                                $idPO = $row['id'];
                                $noPO = $row['po_no'];
                                $tglPO = $row['po_tgl'];
                                $tglTagihanPO = $row['po_tgl_tagihan'];
                                $totalTagihanPO = $row['po_total'];
                                $payOrder = $row['po_bayar'];
                                $sisaBayar = $totalTagihanPO-$payOrder;
                                $sumTot = 0;
                                $jmlBayarZ = set_value("jmlBayar[]");
                                if(!empty($jmlBayarZ)){
                                    foreach($jmlBayarZ AS $key => $val){
                                        $sumTot = $sumTot + str_replace(',', '', $val);
                                    }
                                    $TotPO = $sumTot;
                                }else{
                                    $TotPO = $TotPO + $sisaBayar;    
                                }
                                
                                
                            ?>
                            <tr class="text-data-po warning">
                                <td>
                                    <?php echo $noPO;?>
                                    <input 
                                        type="hidden" 
                                        name="noPO[]" 
                                        id="noPO-1" 
                                        class="noPO"
                                        value="<?php echo $noPO?>" 
                                    />
                                    <input 
                                        type="hidden" 
                                        name="idPO[]" 
                                        id="idPO-1" 
                                        class="idPO"
                                        value="<?php echo $idPO?>" 
                                    />
                                </td> 
                                <td>
                                    <?php echo tgl_indo($tglPO);?>
                                </td>  
                                <td>
                                    <?php echo tgl_indo($tglTagihanPO);?>                               
                                </td>  
                                <td style="text-align: right;">
                                    <?php echo number_format($totalTagihanPO);?>
                                    <input 
                                        type="hidden" 
                                        name="jmlTagihan[]" 
                                        id="jmlTagihan-1" 
                                        class="jmlTagihan"
                                        value="<?php echo $totalTagihanPO?>" 
                                    />
                                </td>
                                <td style="text-align: right;">
                                    <input 
                                        type="hidden" 
                                        name="jmlSisaTagihan[]" 
                                        id="jmlSisaTagihan-1" 
                                        class="jmlSisaTagihan"
                                        value="<?php echo $sisaBayar?>" 
                                    />
                                    <?php echo number_format($sisaBayar);?>
                                </td>
                                <td style="text-align: center;">
                                    <input 
                                        type="text" 
                                        name="jmlBayar[]" 
                                        id="jmlBayar-1" 
                                        class="form-control col-sm-12 numeric jmlBayar"
                                        value="<?php echo (!empty($sisaBayar))? $sisaBayar : set_value("jmlBayar[0]"); ?>"
                                        style="text-align: right;" 
                                    />
                                    <input type="hidden" name="index[]" id="index-1" value="1"/>
                                    <span style="display:none;" class="box-number-data-po">1</span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    
                    <?php endif;?>
                    <?php
                        if(!empty($contentListPO)): ?>
                        <?php $index = 2; foreach($contentListPO AS $rowPO):?>
                            <?php
                                $idPO = $rowPO['id'];
                                $noPO = $rowPO['po_no'];
                                $tglPO = $rowPO['po_tgl'];
                                $tglTagihanPO = $rowPO['po_tgl_tagihan'];
                                $totalTagihanPO = $rowPO['po_total'];
                                $payOrder = $rowPO['po_bayar'];
                                $sisaBayar = $totalTagihanPO-$payOrder;
                                $indexZ = $index-1;
                            ?>
                            <tr class="text-data-po">
                                <td>
                                    <?php echo $noPO;?>
                                    <input 
                                        type="hidden" 
                                        name="noPO[]" 
                                        id="noPO-1" 
                                        class="noPO"
                                        value="<?php echo $noPO?>" 
                                    />
                                    <input 
                                        type="hidden" 
                                        name="idPO[]" 
                                        id="idPO-1" 
                                        class="idPO"
                                        value="<?php echo $idPO?>" 
                                    />
                                </td> 
                                <td>
                                    <?php echo tgl_indo($tglPO);?>
                                </td>  
                                <td>
                                    <?php echo tgl_indo($tglTagihanPO);?>                               
                                </td>  
                                <td style="text-align: right;">
                                    <input 
                                        type="hidden" 
                                        name="jmlTagihan[]" 
                                        id="jmlTagihan-<?php echo $index?>" 
                                        class="jmlTagihan"
                                        value="<?php echo $totalTagihanPO?>" 
                                    />
                                    <?php echo number_format($totalTagihanPO);?>
                                </td>
                                <td style="text-align: right;">
                                    <input 
                                        type="hidden" 
                                        name="jmlSisaTagihan[]" 
                                        id="jmlSisaTagihan-<?php echo $index?>" 
                                        class="jmlSisaTagihan"
                                        value="<?php echo $sisaBayar?>" 
                                    />
                                    <?php echo number_format($sisaBayar);?>
                                </td>
                                <td style="text-align: center;">
                                    <input 
                                        type="text" 
                                        name="jmlBayar[]" 
                                        id="jmlBayar-<?php echo $index?>" 
                                        class="form-control col-sm-12 numeric jmlBayar"
                                        value="<?php echo (!empty(set_value("jmlBayar[".$indexZ."]")))? set_value("jmlBayar[".$indexZ."]") : 0; ?>"
                                        style="text-align: right;" 
                                    />
                                    <input type="hidden" name="index[]" id="index-<?php echo $index?>" value="<?php echo $index?>"/>
                                    <span style="display:none;" class="box-number-data-po"><?php echo $index?></span>
                                </td>
                            </tr>
                        <?php $index++; endforeach; ?>
                    
                    <?php endif;?>
              		
                </tbody>
            </table>
            <br />
            <br />
          </div>
      </div>
    </div>
    <div class="col-sm-6 col-sm-offset-6">
         <div class="form-group">
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
    
    <div class="col-sm-12">
        <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-6">
                <input type="hidden" name="id" value="<?php echo (empty($contentData['id']))? '' : $contentData['id']; ?>"/>
    			<button type="submit" class="btn btn-flat btn-primary color-palette btn-sm"><span class="fa fa-save"></span> &nbsp;Bayar </button>
    			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Kembali</a>
    		</div>
    	</div>
    </div>
    <?php echo form_close(); ?>
</section>

<script>
    $(document).ready(function() { 
        /* Menghitung Total Tiap Barang */
        calculate();
             
    });
    
    function calculate(){
        $('.my-data-po').on('keyup', '.jmlBayar', function(){
            $('.box-number-data-po').each(function(index){
                var sum = 0;
                $(".jmlBayar").each(function(){
                    var result = $(this).val();
                    sum += parseInt(result);
                });
                
                var index = index + 1; 
                var jmlBayar = 0;
                var jmlSisaTagihan = 0
                if ($('#jmlBayar-' + index).val() != "") { jmlBayar  = parseInt($('#jmlBayar-' + index).val()); }
                if ($('#jmlSisaTagihan-' + index).val() != "") { jmlSisaTagihan  = parseInt($('#jmlSisaTagihan-' + index).val()); }
                
                if(jmlBayar > jmlSisaTagihan){
                    alert('Jumlah Pembayaran Lebih Besar Dari Pada Tagihan');
                    $('#jmlBayar-' + index).val(jmlSisaTagihan)
                }
                
                var total = sum;
                $('.totalPO').number(total).css('font-weight', 'bold');
                $('.totalPOInput').val(total);
              
            });
        });
       
    }
</script>

