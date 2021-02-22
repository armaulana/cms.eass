<?php /* Smarty version Smarty-3.1.21-dev, created on 2020-10-31 09:42:30
         compiled from "D:\xampp\htdocs\aapp-web\application\views\2_back\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13094239375f9caa2a88dce3-83716613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4c008076eb3fd2e64070553dd726d55e723800c' => 
    array (
      0 => 'D:\\xampp\\htdocs\\aapp-web\\application\\views\\2_back\\template.tpl',
      1 => 1604112147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13094239375f9caa2a88dce3-83716613',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5f9cc0f983fe01_59490097',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9cc0f983fe01_59490097')) {function content_5f9cc0f983fe01_59490097($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>administrator</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- jQuery 3 --> 
      <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/jquery/dist/jquery.min.js');?>
"><?php echo '</script'; ?>
>
      <!-- JQuery UI -->
      <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/jquery/dist/jquery-ui.min.js');?>
"><?php echo '</script'; ?>
>
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/bootstrap/dist/css/bootstrap.min.css');?>
">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/font-awesome/css/font-awesome.min.css');?>
">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/Ionicons/css/ionicons.min.css');?>
">
      <!-- Select2 -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/select2/dist/css/select2.css');?>
">
      <!-- DataTables -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>
">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/adminLTE.min.css');?>
">
      <!-- assets/adminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/skins/_all-skins.min.css');?>
">
      <!-- jvectormap -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/jvectormap/jquery-jvectormap.css');?>
">
      <!-- Date Picker -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>
">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/bootstrap-daterangepicker/daterangepicker.css');?>
">
      <!-- bootstrap time picker -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/timepicker/bootstrap-timepicker.min.css');?>
">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>
">
      <!-- chosen -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/chosen/chosen.css');?>
">
      <!-- Izitoast  -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/izitoast/css/iziToast.min.css');?>
">
      <!-- highcharts -->
      <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/highcharts/jquery-3.1.1.min.js');?>
"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/highcharts/highcharts.js');?>
"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/highcharts/modules/data.js');?>
"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/highcharts/modules/series-label.js');?>
"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/highcharts/modules/exporting.js');?>
"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/highcharts/modules/export-data.js');?>
"><?php echo '</script'; ?>
>
      <!-- Google Font -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body class="sidebar-mini wysihtml5-supported skin-red-light" >
  <div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" ><b >Adm </b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" > <i class="fa fa-laptop"></i> <b style="font-size: 18px">CMS.CI3</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" >
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu" style="background-color: #c62828">
            <a href="<?php echo base_url();?>
" target="_BLANK" class="dropdown-toggle" >
              <i class="fa fa-external-link"></i> 
            </a>
          </li>

          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Login in at : 

            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/admin/man-user.png');?>
" class="user-image" alt="User Image">
              <span class="hidden-xs">User Online</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style=" background-color: #dd4b39; ">
                <img src="<?php echo base_url('assets/admin/man-user.png');?>
" class="img-circle" alt="User Image">
                <p>
                  User Online - Member
                  <small>Member 2018</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href='<?php echo base_url("auth/logout/");?>
'><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('assets/admin/man-user.png');?>
" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>User Online</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- /.main menu -->

          <!-- /.end menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper" style="background-color: #f6f6f6">
    <!-- Main content -->
        main
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="https://noname.com">Noname </a>.</strong> All rights
    reserved.
  </footer>
<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
</div>
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/izitoast/js/iziToast.min.js');?>
"><?php echo '</script'; ?>
>
    <!-- Bootstrap 3.3.7 -->
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/bootstrap/dist/js/bootstrap.min.js');?>
"><?php echo '</script'; ?>
>
    <!-- Select2 -->
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/select2/dist/js/select2.full.js');?>
"><?php echo '</script'; ?>
>
    <!-- Chained -->
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/chained/jquery.chained.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
      $("#kota").chained("#provinsi"); // hubungkan kota dengan provinsi
      $("#kecamatan").chained("#kota"); // hubungkan kecamatan dengan kota
    <?php echo '</script'; ?>
>
    <!-- DataTables -->
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/datatables.net/js/jquery.dataTables.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>
"><?php echo '</script'; ?>
>
    <!-- Morris.js charts -->
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/raphael/raphael.min.js');?>
"><?php echo '</script'; ?>
>
    <!-- jvectormap -->
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/jvectormap/jquery-jvectormap-1.2.2.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/jvectormap/jquery-jvectormap-world-mill-en.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/bootstrap-daterangepicker/daterangepicker.js');?>
"><?php echo '</script'; ?>
>
    <!-- datepicker -->
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>
"><?php echo '</script'; ?>
>
    <!-- Timepicker -->
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/timepicker/bootstrap-timepicker.min.js');?>
"><?php echo '</script'; ?>
>
    <!-- Bootstrap WYSIHTML5 -->
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>
"><?php echo '</script'; ?>
>
    <!-- assets/adminLTE App -->
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/dist/js/adminlte.min.js');?>
"><?php echo '</script'; ?>
>
    <!-- assets/adminLTE dashboard demo (This is only for demo purposes) -->
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/dist/js/pages/dashboard.js');?>
"><?php echo '</script'; ?>
>
    <!-- Chosen -->
    <?php echo '<script'; ?>
 src="<?php echo base_url('assets/admin/components/chosen/chosen.jquery.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
      $(function () {
        //-- Select2 
        $('.select2').select2()
        //-- Date picker
        $('#datepicker').datepicker({
          format: 'dd-mm-yyyy',
          autoclose: true
        })
        $('#datepicker2a').datepicker({
          format: 'dd-mm-yyyy',
          autoclose: true
        })
        //-- Datepicker2
        $('#datepicker2').datepicker({
          format: 'dd-mm-yyyy',
          container: '#modal_form',
          autoclose: true
        })
        //-- Datepicker3
        $('#datepicker3').datepicker({
          format: 'dd-mm-yyyy',
          container: '#modal_form',
          autoclose: true
        })
        //-- Datepicker4
        $('#datepicker4').datepicker({
          format: 'dd-mm-yyyy',
          container: '#modal_form',
          autoclose: true
        })
        //-- Datepicker5
        $('#datepicker5').datepicker({
          format: 'dd-mm-yyyy',
          container: '#modal_form',
          autoclose: true
        })
        //-- Datepicker6
        $('#datepicker6').datepicker({
          format: 'dd-mm-yyyy',
          container: '#modal_form',
          autoclose: true
        })
        //-- Datepicker7
        $('#datepicker7').datepicker({
          format: 'dd-mm-yyyy',
          container: '#modal_form',
          autoclose: true
        })
        //-- Year
        $('#yearpicker').datepicker({
          format: 'yyyy',
          viewMode: "years", 
          minViewMode: "years"
        })
        // -- Timepicker
        $('.timepicker').timepicker({
          showInputs: false
        })
      })
    <?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
