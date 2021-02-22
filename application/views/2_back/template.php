<?php 
header('X-Frame-Options: DENY'); 
if($_SERVER['HTTPS']!="on") {
        $redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        header("Location:$redirect"); 
} 
?>
<!DOCTYPE html>
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
      <script src="<?php echo base_url('assets/admin/components/jquery/dist/jquery.min.js')?>"></script>
      <!-- JQuery UI -->
      <script src="<?php echo base_url('assets/admin/components/jquery/dist/jquery-ui.min.js')?>"></script>
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/bootstrap/dist/css/bootstrap.min.css')?>">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/font-awesome/css/font-awesome.min.css')?>">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/Ionicons/css/ionicons.min.css')?>">
      <!-- Select2 -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/select2/dist/css/select2.css')?>">
      <!-- DataTables -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/adminLTE.min.css')?>">
      <!-- assets/adminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/skins/_all-skins.min.css')?>">
      <!-- jvectormap -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/jvectormap/jquery-jvectormap.css')?>">
      <!-- Date Picker -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/bootstrap-daterangepicker/daterangepicker.css')?>">
      <!-- bootstrap time picker -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/timepicker/bootstrap-timepicker.min.css') ?>">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">
      <!-- chosen -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/chosen/chosen.css')?>">
      <!-- Izitoast  -->
      <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/izitoast/css/iziToast.min.css');?>">
      <!-- highcharts 
      <script src="<?php echo base_url('assets/admin/components/highcharts/jquery-3.1.1.min.js')?>"></script>-->
      <script src="<?php echo base_url('assets/admin/components/highcharts/highcharts.js')?>"></script>
      <script src="<?php echo base_url('assets/admin/components/highcharts/modules/data.js')?>"></script>
      <script src="<?php echo base_url('assets/admin/components/highcharts/modules/series-label.js')?>"></script>
      <script src="<?php echo base_url('assets/admin/components/highcharts/modules/exporting.js')?>"></script>
      <script src="<?php echo base_url('assets/admin/components/highcharts/modules/export-data.js')?>"></script>
      <!-- Google Font -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body class="sidebar-mini wysihtml5-supported skin-purple-light" >
  <div class="wrapper">
  <header class="main-header">
    <a href="index2.html" class="logo">
      <span class="logo-mini" ><b>CMS</b></span>
      <span class="logo-lg" > <i class="fa fa-laptop"></i> <b style="font-size: 18px">CMS.CI3</b></span>
    </a>
    <nav class="navbar navbar-static-top" >
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu" style="background-color: #4e4b8c">
            <a href="<?php echo base_url()?>" target="_BLANK" class="dropdown-toggle" >
              <i class="fa fa-external-link"></i> 
            </a>
          </li>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Login in at : 
              <?php 
                    $datestring = "%d-%M-%Y";
                    $tanggal= mdate($datestring, $last_login[0]->last_login);
                    print_r($tanggal); 
              ?>
            </a>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/admin/man-user.png')?>" class="user-image" alt="User Image">
              <?php $username = $this->db->where('id', $this->session->userdata('user_id'))->get('users')->row();?>
              <span class="hidden-xs"><?php echo $username->username;?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header" style=" background-color: #605ca8; ">
                <img src="<?php echo base_url('assets/admin/man-user.png')?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $username->username;?>
                  <small>Member</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href='<?php echo base_url('auth/logout/') ?>'><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('assets/admin/man-user.png')?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $username->username; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <?php $this->load->view('2_back/menu-admin.php'); ?>
    </section>
  </aside>
  <div class="content-wrapper" style="background-color: #f6f6f6">
    <!-- Main content -->
        <?php echo $content;?>
    <!-- /.content -->
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="https://noname.com">Noname </a>.</strong> All rights
    reserved.
  </footer>
</div>
    <script src="<?php echo base_url('assets/admin/components/izitoast/js/iziToast.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/admin/components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url('assets/admin/components/select2/dist/js/select2.full.js')?>"></script>
    <!-- Chained -->
    <script src="<?php echo base_url('assets/admin/components/chained/jquery.chained.min.js') ?>"></script>
    <script>
      $("#kota").chained("#provinsi"); // hubungkan kota dengan provinsi
      $("#kecamatan").chained("#kota"); // hubungkan kecamatan dengan kota
    </script>
    <!-- DataTables -->
    <script src="<?php echo base_url('assets/admin/components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo base_url('assets/admin/components/raphael/raphael.min.js')?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url('assets/admin/components/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/components/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('assets/admin/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
    <!-- Timepicker -->
    <script src="<?php echo base_url('assets/admin/components/timepicker/bootstrap-timepicker.min.js') ?>"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url('assets/admin/components/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
    <!-- assets/adminLTE App -->
    <script src="<?php echo base_url('assets/admin/dist/js/adminlte.min.js')?>"></script>
    <!-- assets/adminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url('assets/admin/dist/js/pages/dashboard.js')?>"></script>
    <!-- Chosen -->
    <script src="<?php echo base_url('assets/admin/components/chosen/chosen.jquery.js')?>"></script>
    <script>
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
    </script>
</body>
</html>