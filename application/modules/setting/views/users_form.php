<?php echo jquery_select2(); ?>

<script type="text/javascript">
$().ready(function(){
	$('[name=id_users_group_fk]').select2({width : '75%'});
});
</script>

<!--section class="content-header">
	<h1>Management User <small><i class="fa fa-fw fa-angle-double-right"></i> <?php echo $ttl; ?></small></h1>
</section-->

<?php echo form_open_multipart($action, array('class' => 'form-horizontal row-form', 'data-toggle' => 'validator')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Username</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="text" name="username" id="inputName" placeholder="Username" value="<?php echo $users->username; ?>" required />
		</div>
	</div>
	<?php if($this->uri->segment(3) == 'add'):?>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Password</label>
			<div class="col-sm-4">
			  <input class="form-control input-sm" type="password" name="password" data-minlength="6" id="inputPassword" placeholder="" value="" required />
			</div>
		</div>
	<?php endif; ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Name</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="text" name="name_users" id="inputName" placeholder="Name" value="<?php echo $users->name_users; ?>" required />
		</div>
	</div>
	<?php if($this->uri->segment(3) == 'edit') { ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Photo</label>
		<div class="col-sm-3">
			<div class="image">
				<?php $users->photo != '' ? $img_photo = $users->photo : $img_photo = "photo_default.jpg"; ?>
				<img src="<?php echo base_url('assets/photo_users/thumbnails/'.$img_photo); ?>" class="img-responsive img-thumbnail" alt="Responsive image" />
			</div>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Change Photo</label>
		<div class="col-sm-3">
			<input class="form-control input-sm" type="file" name="userfile" />
		</div>
	</div>
	<?php } else { ?>
	<div class="form-group">
		<label class="col-sm-2 control-label input-sm">Photo</label>
		<div class="col-sm-3">
			<input class="form-control input-sm" type="file" name="userfile" />
		</div>
	</div>
	<?php } ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Group Users</label>
		<div class="col-sm-4">
			<select name="id_users_group_fk" required>
				<option value="0">--- choose Group users ---</option>
				<?php echo modules::run('setting/users_group/options_users_group', $users->id_users_group_fk); ?>
			</select>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Blockage</label>
		<div class="col-sm-4">
			<?php if ($users->blockage == 'Y' || $users->blockage == '') { ?>
				<label>
					<input type="radio" name="blockage" value="Y" checked> Y
					<input type="radio" name="blockage" value="N"> N
				</label>
			<?php } else { ?>
				<label>
					<input type="radio" name="blockage" value="Y"> Y
					<input type="radio" name="blockage" value="N" checked> N
				</label>
			<?php } ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-6">
			<button type="submit" class="btn btn-flat btn-primary color-palette btn-sm"><span class="fa fa-save"></span> &nbsp;Save </button>
			<button type="reset" class="btn btn-flat btn-danger color-palette btn-sm"><span class="fa fa-circle-o-notch"></span> &nbsp;Reset </button>
			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Back</a>
		</div>
	</div>
<?php echo form_close(); ?>