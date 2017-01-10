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
    	<a href="<?php echo $add; ?>" class="btn btn-flat bg-light-blue color-palette btn-sm"><span class="fa fa-plus"></span>&nbsp;&nbsp;Add New</a>
    </div>
    
	<table id="datatables" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th width="2%">No.</th>
				<th width=""> Code</th>
				<th width=""> Name</th>
				<th width=""> Jml Qty</th>
				<th style="width:125px;"></th>
			</tr>
		</thead>
	</table>
</section>
