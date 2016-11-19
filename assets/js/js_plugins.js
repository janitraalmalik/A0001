$(document).ready(function(){	  

	$("#menu-tree").treeview({
		collapsed: true,
		animated: "medium",
		control:"#sidetreecontrol",
		persist: "location"
	});
 
	($('#datatables').dataTable({
		"oLanguage": {
			"sLengthMenu": "Show _MENU_ entries",
			"sSearch": "search: ", 
			"sZeroRecords": "No matching records found",
			"sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
			"sInfoEmpty": "Showing 0 to 0 of 0 entries",
			"sInfoFiltered": "(di filter dari _MAX_ total data)",
			"oPaginate": {
				"sFirst": "<<",
				"sLast": ">>", 
				"sPrevious": "<", 
				"sNext": ">"
			}
		},
	"sPaginationType":"full_numbers"
	});

});