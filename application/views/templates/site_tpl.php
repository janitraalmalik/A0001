<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BST Sytem | <?php echo @$moduleTitle?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <!-- jQuery 2.2.0 -->
<script src="<?php echo base_url(); ?>/assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url(); ?>/assets/js/bootstrap.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>/assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>/assets/plugins/fastclick/fastclick.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>assets/plugins/select2/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/assets/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>/assets/js/demo.js"></script>

<script type="text/javascript">
$().ready(function(){
    
    $(".select2").select2();
    
    $('.datatable_general').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    
});
    document.onreadystatechange = function () {
      var state = document.readyState
      if (state == 'interactive') {
            $('.overlay').show();
      } else if (state == 'complete') {
          setTimeout(function(){
            $('.overlay').hide();
          },1000);
      }
    }
</script>
  
</head>
<body class="sidebar-mini skin-blue-light fixed">
<div class="wrapper">

  <!-- Content HEADER -->
  <?php echo $this->load->view($header); ?>
  
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><?php echo strtoupper(@$moduleTitle); ?> NAVIGATION</li>
        
        <?php if($this->uri->segment(1) == 'purchasing'): ?>
        <!--li>
          <a href="pages/widgets.html">
            <i class="fa fa-square"></i> <span>Widgets</span>
            <small class="label pull-right bg-green">new</small>
          </a>
        </li-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-square"></i> <span>Purchase Order</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Create PO</a></li>
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> List PO</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-square"></i> <span>Master Data</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('purchasing/data_vendor');?>"><i class="fa fa-circle-o"></i> Data Vendor / Supplier</a></li>
            <li><a href="<?php echo base_url('purchasing/data_barang');?>"><i class="fa fa-circle-o"></i> Data Items</a></li>
            <li><a href="<?php echo base_url('purchasing/data_catbarang');?>"><i class="fa fa-circle-o"></i> Data Item Category</a></li>
            <li><a href="<?php echo base_url('purchasing/data_satuan');?>"><i class="fa fa-circle-o"></i> Data Satuan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-square"></i> <span>Report</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> List Purchase Order</a></li>
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Outstanding</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        <?php endif;?>
        
        <?php if($this->uri->segment(1) == 'hrm'): ?>
        <!--li>
          <a href="pages/widgets.html">
            <i class="fa fa-square"></i> <span>Widgets</span>
            <small class="label pull-right bg-green">new</small>
          </a>
        </li-->
		<li class="treeview">
          <a href="#">
            <i class="fa fa-square"></i> <span>Master Data</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('purchasing/data_vendor');?>"><i class="fa fa-circle-o"></i> Data Karyawam</a></li>
            <li><a href="<?php echo base_url('purchasing/data_barang');?>"><i class="fa fa-circle-o"></i> Data Divisi</a></li>
            <li><a href="<?php echo base_url('purchasing/data_satuan');?>"><i class="fa fa-circle-o"></i> Data Gaji</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-square"></i> <span>Human Resource</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Absensi</a></li>
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Penggajian</a></li>
			<li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Pinjaman</a></li>
			<li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Pembayaran</a></li>
			<li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Kas Kecil</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-square"></i> <span>Report</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Report Absensi</a></li>
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Report Pinjaman</a></li>
			<li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Report Pembayaran</a></li>
			<li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Report Kas Kecil</a></li>
			
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        <?php endif;?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo @$moduleTitle; ?>
        <small><?php echo @$moduleSubTitle; ?></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
            
            
      <div class="row">
        
        <!-- Left col -->
        <section class="col-lg-12">
        
            <div class="box box-primary">
            <div class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div>
            
            <div class="box-body pad table-responsive">
                <div class="col-md-12 content-display">
                    <?php echo $this->load->view($content); ?>
            	</div>
            </div>
            <!-- /.box -->
            </div>    

        </section>
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <!--div class="pull-right hidden-xs">
      <b>Version</b> 2.3.2
    </div-->
    <strong>Copyright &copy; 2016.</strong>
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>
