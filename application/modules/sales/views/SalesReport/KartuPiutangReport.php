<?php $this->load->view('templates/message_handler') ?>
<script>
$(document).ready(function(){
	$('.submit').click(function(){
		if($('#jns_lap').val()==0){
			alert('Harap PIlih Jenis Tanggal Absen !');
		}else if($('#jns_lap').val()==1){
			if($('#start_from').val()!='' && $('#end_from').val()!=''){
				if($(this).attr('dataRow')=='print_pdf'){
					$('#dataForm').submit();
				}else{
					$('#dataForm').submit();
				}
			}else{
				alert('Semua Tanggal Harus Diisi !');
			}
		}else{
				if($(this).attr('dataRow')=='print_pdf'){
					$('#dataForm').submit();
				}else{
					$('#dataForm').submit();
				}
		}
	});
});
</script>
<section class="content">
    <form method="post" target="_blank" action="<?php echo base_url();?>sales/SalesReport/kartupiutang_PDF" id="dataForm" class="form-horizontal row-form">
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Customer</label>
    		<div class="col-sm-3">
							<select class="form-control select2 input-sm" id="cust_id" name="cust_id">
                                <option value="">-Choose Customer-</option>
                                <?php foreach($contentDataCustomer as $rowCust): ?>
                                    <option value="<?php echo $rowCust['cust_id'];?>" <?php echo ($rowCust['cust_id']==(!empty($inputGet['cust_id']))? $inputGet['cust_id'] : '') ? 'selected':'';?>><?php echo $rowCust['cust_nama'];?></option>
                                <?php endforeach; ?>
                            </select>
				
    		</div>
    	</div> 
		<div class="form-group date">
    		<label class="col-sm-2 control-label input-sm">As Off</label>
                      <div class="col-sm-3">
                           <input type="text" name="end" class="form-control input-sm datepicker" placeholder="end" value="<?php echo (!empty($inputGet['end']))? $inputGet['end'] : date('d-m-Y')?>" required />
                      </div>
    	</div> 
		 
	
    	<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-6">
    			<button type="button" class="btn btn-flat btn-primary color-palette btn-sm submit" dataRow="kartupiutang_PDF"><span class="fa fa-save"></span> &nbsp;Print PDF </button>
    			<!--button type="button" class="btn btn-flat btn-success color-palette btn-sm submit" dataRow="print_excel"><span class="fa fa-save"></span> &nbsp;Print Excel </button>
    			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Back</a-->
    		</div>
    	</div>
    <?php echo form_close(); ?>
</section>



