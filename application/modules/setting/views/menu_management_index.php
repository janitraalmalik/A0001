<script type="text/javascript">
$().ready(function(){
    $('body').addClass('sidebar-collapse');	  
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
			"url"	: "<?php echo site_url('setting/menu_management/ajax_get_menu'); ?>",
			"type"	: "POST"
		},

		//Set column definition initialisation properties.
		"columnDefs" : [
			{ 
				"targets"	: [ 0 ], //first column / numbering column
				"orderable"	: false, //set not orderable
			},
		],
	});
});
</script>


<div class="actions">
	<a href="<?php echo $add; ?>" class="btn btn-flat bg-light-blue color-palette btn-sm"><span class="fa fa-plus"></span>&nbsp;&nbsp;Add New</a>
</div>

<div class="block-table table-sorting clearfix"><!-- block-fluid table-sorting clearfix -->
	<table cellpadding="0" cellspacing="0" class="table table-bordered table-striped tabel" id="datatables">
		<thead>
			<tr>
				<th width="7%">No</th>
				<th width="25%">Name Menu</th>
				<th width="40%">URL</th>
				<th width="13%">ID parent menu</th>
				<th width="8%">Active</th>
				<th width="7%">Action</th>
			</tr>
		</thead>
	</table>
</div>