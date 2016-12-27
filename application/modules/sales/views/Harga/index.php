<?php 
    $module = $this->uri->segment(1);
    $submodule = $this->uri->segment(2); 
    $uri = $module . '/' . $submodule; 
?>
<script type="text/javascript">
function sync(id,grosir,retail){
		$('#h_grosir').val(grosir);
		$('#h_retail').val(retail);
		$('#id').val(id);
	}
$(document).ready(function(){	 
	$('.number').number( true , 0);
	$('#submit').click(function(){
		$.post('<?php echo base_url();?>sales/Data_harga/update_harga',$('#formData').serialize(),function(){
			document.location.href='<?php echo base_url();?>sales/data_harga';
		});
	});
	$('#datatables').dataTable({
		"paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "scrollCollapse"	: true,
		"processing" 		: true, //Feature control the processing indicator.
		"serverSide" 		: true, //Feature control DataTables' server-side processing mode.
		"order" 	 		: [], //Initial no order.

		// Load data for the table's content from an Ajax source
		"ajax": {
			"url"	: "<?php echo site_url('/'.$uri.'/get_data'); ?>",
			"type"	: "POST"
		},

		//Set column definition initialisation properties.
		"columnDefs" : [
			{ 
				"targets"	: [ 0 ], //first column / numbering column
				"orderable"	: false, //set not orderable
			}
		]
	});
	  
});
</script>

<section class="content">
    <div class="actions">
    	<!--a href="<?php echo $add; ?>" class="btn btn-flat bg-light-blue color-palette btn-sm"><span class="fa fa-plus"></span>&nbsp;&nbsp;Add New</a-->
    </div>
    
	<table id="datatables" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th width="2%" align=center>No.</th>
				<th width="" align=center> Kode Barang</th>
				<th width="" align=center> Nama Barang</th>
				<th width="" align=center> Harga Grosir</th>
				<th width="" align=center> Harga Retail</th>
				<th width="" align=center></th>
				
			</tr>
		</thead>
	</table>
</section>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close exit" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Harga</h4>
            </div>
                <div class="modal-body" style="">   
        
        <form id="formData" method="post" style="font-size:9pt !important" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-4">Harga Grosir</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control input-sm col-md-2 form-input number" id="h_grosir" name="h_grosir" placeholder="Harga Grosir">
                    <br><br>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-4">Harga Retail</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control input-sm col-md-2 form-input number" id="h_retail" name="h_retail" placeholder="Harga Retail">
                    <input type="hidden" class="form-control input-sm col-md-2 form-input" id="id" name="id">
                    <br><br>
                  </div>
                </div>
            </form>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default exit" data-dismiss="modal">Exit</button>
                    <input type="submit" class="btn btn-primary" value="Save"  data-dismiss="modal" id="submit"/>
                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->