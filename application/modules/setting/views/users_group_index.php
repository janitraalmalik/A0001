<script type="text/javascript">
$(document).ready(function(){
    $('body').addClass('sidebar-collapse');	  
	$('#datatables').dataTable({
		"scrollY"			: "342px",
        "scrollCollapse"	: true,
	});
});
</script>

<div class="actions">
	<a href="<?php echo $add; ?>" class="btn btn-flat bg-light-blue color-palette btn-sm"><span class="fa fa-plus"></span>&nbsp;&nbsp;Add Data</a>
</div>

<div class="block-table table-sorting clearfix"><!-- block-fluid table-sorting clearfix -->
	<table cellpadding="0" cellspacing="0" class="table table-bordered table-striped datatable_general">
		<thead>
			<tr>
				<th width="10%">No.</th>
				<th width="80%">Group User</th>
				<th width="10%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1;
				foreach($grid->result() as $record) :
			?>
					<tr>
						<td align="center"><?php echo $no; ?></td>
						<td><?php echo $record->name_group; ?></td>
						<td align="center">
							<a href="<?php echo site_url('/setting/users_group/edit/'.$record->id_users_group); ?>" title="Edit Data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						</td>
					</tr>
			<?php 
					$no++;
				endforeach;
			?>
		</tbody>
	</table>
</div>