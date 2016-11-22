<?php echo jquery_select2(); ?>

<script type="text/javascript">
$().ready(function(){
	$('.select').select2();
    
});
</script>

<section class="content-header">
	<h1><?php echo $heading; ?> <small><?php echo $ttl;?></small></h1>
</section>

<section class="content">
    <?php echo form_open($act, array('class' => 'form-horizontal row-form')); ?>
    	<div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Manufacture</label>
    		<div class="col-sm-3">
                <select class="form-control select" id="manuf" name="manufacture">
                    <option value=""></option>
                    <?php foreach($data_manf as $row): ?>
                        <option value="<?php echo $row['id'];?>" <?php if($row['id'] == @$data_row['id_aircraft_manufacture_fk']){echo 'selected';}  ?> ><?php echo $row['name_manf'];?></option>
                    <?php endforeach; ?>
                </select>
    		</div>
    	</div>
        <div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Name</label>
    		<div class="col-sm-3">
                <input class="form-control input-sm" type="text" name="name" placeholder="Nama" value="<?php echo (isset($data_row['name_aircraft']))? $data_row['name_aircraft'] : ''; ?>" required="true"/>
    		</div>
    	</div>
        <div class="form-group">
    		<label class="col-sm-2 control-label input-sm">Description</label>
            <div class="col-sm-3">
                <textarea class="form-control" rows="3" name="desc" placeholder="Description"><?php echo (isset($data_row['desc_aircraft']))? $data_row['desc_aircraft'] : ''; ?></textarea>
    		</div>
    	</div>
    	<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-6">
                <input type="hidden" name="id" value="<?php echo (isset($data_row->id))? $data_row->id : ''; ?>"/>
    			<button type="submit" class="btn btn-flat btn-primary color-palette btn-sm"><span class="fa fa-save"></span> &nbsp;Save </button>
    			<a class="btn btn-flat bg-olive color-palette btn-sm" href="<?php echo $back; ?>"><span class="fa  fa-arrow-left"></span>&nbsp;&nbsp;Back</a>
    		</div>
    	</div>
    <?php echo form_close(); ?>
</section>

<!--div class="callout callout-info">
	<span>Untuk penulisan format tanggal pada MS. Excel harus menggunakan format tanggal bahasa Indonesia, contoh : 99/99/9999</span>
</div-->

