
<?php $this->load->view('templates/message_handler') ?>

<section class="content">
    <?php echo form_open(@$action, array('class' => 'form-horizontal row-form')); ?>
   	    <div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Kode *</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm"
                    type="text" 
                    name="codeInbound" 
                    placeholder="Code" 
                    value="<?php echo (empty($contentData['brg_kd']))? set_value('codeBarang') : $contentData['brg_kd']; ?>"
                    <?php echo (empty($contentData['brg_kd']))? '' : 'readonly="true"'; ?>" 
                    required="true"
                    disabled="true"/>
                <?php echo form_error('codeBarang', '<label class="text-red">', '</label>'); ?>
    		</div>
    	</div>
        <div class="form-group">
            <label class="col-sm-2 control-label input-sm">Tanggal Transaksi *</label>
            <div class="col-sm-3">
                <input 
                    class="form-control input-sm datepicker"
                    type="date" 
                    name="tgltrxInbound" 
                    id="tgltrxInbound" 
                    value="<?= date("d-m-Y"); ?>"
                    required="true"/>
                <?php echo form_error('tgltrxPO', '<label class="text-red">', '</label>'); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label input-sm">Barang *</label>
            <div class="col-sm-3">
                <select name="barang_kd" class="form-control select2 input-sm" style="width: 100%;">
                    <option value="0"><center>--- Pilih ---</center></option>
                    <?php foreach($contentData AS $row):?>
                        
                            <option value='<?=@$row->brg_kd; ?>'><?php echo $row->brg_kd . ' - ' . $row->brg_nama ?> </option>
                        
                        
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

         <div class="form-group">
            <label class="col-sm-2 control-label input-sm">Qty *</label>
    		<div class="col-sm-3">
               <input 
                    class="form-control input-sm"
                    type="text" 
                    name="qty" 
                    id="qty"
                    placeholder="Jumlah Barang" 
                    required="true"/>
                
    		</div>
    	</div>
    	<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-6">
                <input type="hidden" name="id" value="<?php echo (empty($contentData['id']))? '' : $contentData['id']; ?>"/>
    			<button type="submit" class="btn btn-flat btn-primary color-palette btn-sm"><span class="fa fa-save"></span> &nbsp;Simpan </button>
    			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Kembali</a>
    		</div>
    	</div>
    <?php echo form_close(); ?>
</section>

