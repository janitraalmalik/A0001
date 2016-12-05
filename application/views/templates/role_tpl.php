<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Jenis Usaha</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/AdminLTE.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css'); ?>">
    

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    	<script type="text/javascript" src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.2.0.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url()?>assets/plugins/select2/select2.full.min.js"></script>
        <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>/assets/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>/assets/js/demo.js"></script>
	<script type="text/javascript">
	  $().ready(function(){
		
        $(".select2").select2();
	  });
	</script>
    <style>
        .login-box {
            margin: 10px auto!important;
        }
    </style>
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		
		<div class="login-logo">
			<a href="#"><b><?php echo $moduleTitle ?></b></a>
		</div> <!-- /.login-logo -->
	  
		<div class="login-box-body">
			<p class="login-box-msg">Pilih Jenis Usaha</p>

			<?php echo form_open('/dashboard/roles',array('class' => 'form-horizontal row-form')); ?>
				<div class="form-group has-feedback">
                    <select name="roleJenisUsaha" class="form-control select2 input-sm">
        				<option value="">--- Choose ---</option>
                        <?php foreach($contentData as $val): ?>
                            <option value="<?php echo $val['roleId']?>"> <?php echo $val['roleCd'] . ' - ' . $val['roleName'];?> </option>
                        <?php endforeach; ?>
        			</select>
                    <?php echo form_error('roleJenisUsaha', '<label class="text-red">', '</label>'); ?>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<!--<label>
								<input type="checkbox"> Remember Me
							</label>-->
						</div>
					</div>
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Pilih</button>
					</div>
				</div>
			<?php echo form_close(); ?>

		
		</div><!-- /.login-box-body -->
	</div><!-- /.login-box -->


</body>
</html>