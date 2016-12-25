
<?php $this->load->view('templates/message_handler') ?>
<script>
$(document).ready(function(){
	$('.date').hide();
	$('.money').keyup(function(){
		$(this).val(addCommas($(this).val()));
	});
	$('#jns_lap').change(function(){
		if($(this).val()==1){
			$('.date').show();
		}else{
			$('.date').hide();
		}
	});
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
    <form method="post" target="_blank" action="<?php echo base_url();?>hrm/ReportAbsensi/print_pdf" id="dataForm" class="form-horizontal row-form">
		<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Jenis Tanggal Absen</label>
    		<div class="col-sm-3">
                <select name="jns_lap" id="jns_lap" class="form-control select2 input-sm" style="width: 100%;">
    				<option value="1">Pilihan Tanggal</option>
    				<option value="2">All / Semua Tanggal</option>
    			</select>
				
    		</div>
    	</div> 
		<div class="form-group date">
    		<label class="col-sm-2 control-label input-sm">Dari Tanggal</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="start_from" 
                    id="start_from" 
                    placeholder="Dari Tanggal" 
					style="text-align:right" 
                    required="true"/>
    		</div>
    	</div> 
		<div class="form-group date">
    		<label class="col-sm-2 control-label input-sm">Sampai Dengan Tanggal</label>
    		<div class="col-sm-3">
                <input 
                    class="form-control input-sm datepicker"
                    type="text" 
                    name="end_from" 
                    id="end_from" 
                    placeholder="Sampai Dengan Tanggal" 
					style="text-align:right" 
                    required="true"/>
    		</div>
    	</div> 
	
    	<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-6">
                <input type="hidden" name="id" value="<?php echo (empty($contentData['id']))? '' : $contentData['id']; ?>"/>
    			<button type="button" class="btn btn-flat btn-primary color-palette btn-sm submit" dataRow="print_pdf"><span class="fa fa-save"></span> &nbsp;Print PDF </button>
    			<!--button type="button" class="btn btn-flat btn-success color-palette btn-sm submit" dataRow="print_excel"><span class="fa fa-save"></span> &nbsp;Print Excel </button>
    			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Back</a-->
    		</div>
    	</div>
    <?php echo form_close(); ?>
</section>

