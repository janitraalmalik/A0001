<script type="text/javascript">
$().ready(function(){	 

	$('#datatables').dataTable({
		"searching"			: false,
		"processing" 		: true, //Feature control the processing indicator.
		"serverSide" 		: true, //Feature control DataTables' server-side processing mode.
		"order" 	 		: [], //Initial no order.
        

		// Load data for the table's content from an Ajax source
		"ajax": {
			"url"	: "<?php echo site_url('/masterData/aircraftReg/get_data'); ?>",
			"type"	: "POST"
		},

		//Set column definition initialisation properties.
		"columnDefs" : [
			{ "targets"	: [ 0 ], "orderable"	: false }, 
            { "targets"	: [ 1 ], "orderable"	: true  }, 
            { "targets"	: [ 2 ], "orderable"	: true  }, 
            { "targets"	: [ 3 ], "orderable"	: true  },
            { "targets"	: [ 4 ], "orderable"	: false } 
		],
	});
});
</script>

<section class="content-header">
	<h1><?php echo $heading; ?> </h1>
</section>

<section class="content">
    <div class="actions">
    	<a href="<?php echo $add; ?>" class="btn btn-flat bg-light-blue color-palette btn-sm"><span class="fa fa-plus"></span>&nbsp;&nbsp;Add New</a>
    </div>
	<table id="datatables" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th width="2%">No</th>
				<th width="">Name</th>
				<th width="">Type</th>
				<th width="">Manufacture</th>
				<th style="width:125px;"></th>
			</tr>
		</thead>
	</table>
</section>
