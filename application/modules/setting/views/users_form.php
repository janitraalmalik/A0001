

<script type="text/javascript">
$().ready(function(){
	
});
</script>

<?php $this->load->view('templates/message_handler') ?>

<?php echo form_open_multipart($action, array('class' => 'form-horizontal row-form', 'data-toggle' => 'validator')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Username</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="text" name="username" id="inputName" placeholder="Username" value="<?php echo (empty($users->username))? set_value('username'):$users->username; ?>" />
		  <?php echo form_error('username', '<label class="text-red">', '</label>'); ?>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Full Name</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="text" name="name_users" id="inputName" placeholder="Name" value="<?php echo (empty($users->name_users))? set_value('name_users'):$users->name_users; ?>" />
          <?php echo form_error('name_users', '<div class="text-red">', '</div><br/>'); ?>
		</div>
	</div>
	<?php if($this->uri->segment(3) == 'add' || $this->uri->segment(3) == 'insert'):?>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Password</label>
			<div class="col-sm-4">
			  <input class="form-control input-sm" type="password" name="password" data-minlength="6" id="inputPassword" placeholder="" value="" required />
              <?php echo form_error('password', '<label class="text-red">', '</label>'); ?>
			</div>
		</div>
        <div class="form-group">
			<label class="col-sm-2 control-label input-sm">Re-Password</label>
			<div class="col-sm-4">
			  <input class="form-control input-sm" type="password" name="repassword" data-minlength="6" id="inputPassword" placeholder="" value="" required />
			</div>
		</div>
	<?php endif; ?>
    
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
        <label class="col-sm-2 control-label input-sm">Jenis Usaha </label>
		<div class="col-sm-4">
            <?php if($this->uri->segment(3) != 'edit') { ?>
            <select name="jnsUsaha[]" class="form-control select2" multiple="multiple" data-placeholder="Jenis Usaha" style="width: 100%;">
              <?php foreach($jnsUsaha->result() as $row):?>               
                    <option value="<?php echo $row->id?>" <?php echo @(in_array($row->id, set_value('jnsUsaha[]'), true))? 'selected' : '';?>><?php echo $row->nama?></option>
              <?php endforeach; ?>
            </select>
            <?php } else { ?>
            <select name="jnsUsaha[]" class="form-control select2" multiple="multiple" data-placeholder="Jenis Usaha" style="width: 100%;">
              <?php foreach($jnsUsaha->result() as $row):?>               
                    <option value="<?php echo $row->id?>" <?php echo @(in_array($row->id, $users_jns_usaha, true))? 'selected' : '';?>><?php echo $row->nama?></option>
              <?php endforeach; ?>
            </select>
            <?php } ?>
            <?php echo form_error('jnsUsaha', '<div class="text-red">', '</div><br/>'); ?>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Group Users</label>
		<div class="col-sm-4">
            <select name="id_users_group_fk" class="form-control select2 input-sm" style="width: 100%;">
				<option value="0">--- Choose Group User ---</option>
                <?php foreach($usersGroup->result() as $row):?>               
                    <option value="<?php echo $row->id_users_group?>" <?php echo @($row->id_users_group == $users->id_users_group_fk)? 'selected' : '';?>><?php echo $row->name_group?></option>
                <?php endforeach; ?>
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