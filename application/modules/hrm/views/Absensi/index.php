<?php 
    $module = $this->uri->segment(1);
    $submodule = $this->uri->segment(2); 
    $uri = $module . '/' . $submodule; 
?>
<script type="text/javascript">
$(document).ready(function(){	  
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
    	<a href="<?php echo base_url();?>assets/lib/template_absen.xls" class="btn btn-flat bg-light-blue color-palette btn-sm"><span class="fa fa-cloud-download"></span>&nbsp;&nbsp;Download Template Absen</a>
    	<a href="#myModal" data-toggle="modal" class="btn btn-flat bg-green color-palette btn-sm"><span class="fa fa-cloud-upload"></span>&nbsp;&nbsp;Upload Data Absen</a>
		<button type="button" 
                            class="btn btn-flat btn-danger color-palette btn-sm" id="rowDelete"
                            title="Delete Data">Delete</button>
    </div>
    
	<table id="datatables" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th style='width:1%'>#</th>
				<th width="2%">No.</th>
				<th width=""> Kode Karyawan</th>
				<th width=""> Nama Karyawan</th>
				<th width=""> Tanggal</th>
				<th width=""> Jam Masuk</th>
				<th width=""> Jam Keluar</th>
				<th width=""> Total Jam Kerja</th>
				
			</tr>
		</thead>
	</table>
</section>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close exit" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload Data Absensi</h4>
            </div>
                <div class="modal-body" style="">   
				<br>
				<form id="formData" method="post" enctype="multipart/form-data" style="font-size:9pt !important" action="<?php echo base_url();?>hrm/absensi/upload_absen">
					<div class="form-group" style="margin-top:-10px">
                      <label for="exampleInputEmail1">File Data Absensi (*.xls)</label>
                      <input type="file" class="" id="absen" name="absen" style="padding:8px;border:1px solid lightgray;width:100%">
                    </div>
				
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default exit" data-dismiss="modal">Exit</button>
                    <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-cloud-upload"></i> Upload</button>
                </div>
				</form>	
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->