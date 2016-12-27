<?php echo jquery_select2(); ?>

<script type="text/javascript">
$().ready(function(){
    $('body').addClass('sidebar-collapse');
	$('[name=id_menu_induk]').select2({width : '75%'});
});
</script>

<!--section class="content-header">
	<h1>Management Menu <small><i class="fa fa-fw fa-angle-double-right"></i> <?php echo $ttl; ?></small></h1>
</section-->

<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
	<span>
		Apabila field ID Menu tidak diisi (dikosongkan), maka Nama Menu akan menjadi Menu Utama (Menu Induk) <br />
		Apabila field ID Menu diisi, maka Nama Menu akan menjadi Anak Menu berdasarkan Nama Menu yang dipilih 
	</span>
</div>

<?php echo form_open($action, array('class' => 'form-horizontal row-form')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Nama</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="text" name="nama" placeholder="Nama" value="<?php echo $rc->nama; ?>" required />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">URI</label>
		<div class="col-sm-4">
		  <input class="form-control input-sm" type="text" name="uri" placeholder="URI" value="<?php echo $rc->uri; ?>" required />
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">ID Menu</label>
		<div class="col-sm-4">
			<select name="id_menu_induk">
				<option value="0">--- Kosongkan ---</option>
				<?php echo modules::run('setting/menu_management/options_menu_management', $rc->id_menu_induk); ?>
			</select>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label input-sm">Aktif</label>
		<div class="col-sm-4">
			<?php if ($rc->aktif == 'Y' || $rc->aktif == '') { ?>
				<label>
					<input type="radio" name="aktif" value="Y" checked> Y
				</label>
				<label>
					<input type="radio" name="aktif" value="N"> N
				</label>
			<?php } else { ?>
				<label>
					<input type="radio" name="aktif" value="Y"> Y
				</label>
				<label>
					<input type="radio" name="aktif" value="N" checked> N
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