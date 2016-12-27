<script type="text/javascript">
$(document).ready(function(){
 	
    $('body').addClass('sidebar-collapse');
	$('.parent').change(function(){
		var id = $(this).attr('id');
		$('.child-'+id).prop('checked', $(this).prop('checked'));		
	});
	
});
</script>

<!--section class="content-header">
	<h1>Management Menu <small><i class="fa fa-fw fa-angle-double-right"></i> <?php echo $ttl; ?></small></h1>
</section-->

<?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Group Name</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="text" name="name_group" placeholder="Group Name" value="<?php echo $users_group->name_group; ?>" required />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-6">
			<button type="submit" class="btn btn-flat btn-primary color-palette btn-sm"><span class="fa fa-save"></span> &nbsp;Save </button>
			<button type="reset" class="btn btn-flat btn-danger color-palette btn-sm"><span class="fa fa-circle-o-notch"></span> &nbsp;Reset </button>
			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Back</a>
		</div>
	</div>
	<?php $a = 0;?>
	<?php if($menu->num_rows() > 0) :?>
	<table>	
		<?php foreach($menu->result() as $indeks => $p) :?>			
		<tr>
			<td width="50"></td>
			<td width="50"></td>
			<td width="50"></td>
			<td width="50"></td>			
			<td>
				<label>
					<input type="checkbox" class="parent" id="<?php echo $p->id_menu;?>" name="id_menu[<?php echo $a++;?>]" value="<?php echo $p->id_menu;?>" <?php if($p->id_menu_akses!=NULL){echo 'checked';} ?> />
					<?php echo $p->nama;?>
				</label>
			</td>
		</tr>
			<?php if($submenu->num_rows() > 0) :?>
				<?php foreach ($submenu->result() as $key => $q) :?>
					<?php if($q->id_menu_induk == $p->id_menu) :?>
						<tr>
							<td colspan="4"></td>
							<td></td>
							<td>
								<label>
									<input type="checkbox" class="child-<?php echo $p->id_menu;?>" name="id_menu[<?php echo $a++;?>]" value="<?php echo $q->id_menu;?>" <?php if($q->id_menu_akses!=NULL){echo 'checked';} ?> />
									<?php echo $q->nama;?>
								</label>
							</td>
						</tr>
					<?php endif;?>
				<?php endforeach;?>
			<?php endif;?>		
		<?php endforeach;?>
	</table>
	<?php endif;?>
<?php echo form_close(); ?>