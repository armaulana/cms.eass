<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
      
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="<?php echo base_url('themes/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo base_url('themes/bower_components/font-awesome/css/font-awesome.min.css')?>">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url('themes/bower_components/Ionicons/css/ionicons.min.css')?>">
      <!-- Select2 -->
      <link rel="stylesheet" href="<?php echo base_url('themes/bower_components/select2/dist/css/select2.css')?>">
      <!-- DataTables -->
      <link rel="stylesheet" href="<?php echo base_url('themes/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url('themes/dist/css/AdminLTE.min.css')?>">
      <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url('themes/dist/css/skins/_all-skins.min.css')?>">
      <!-- Morris chart -->
      <link rel="stylesheet" href="<?php echo base_url('themes/bower_components/morris.js/morris.css')?>">
      <!-- jvectormap -->
      <link rel="stylesheet" href="<?php echo base_url('themes/bower_components/jvectormap/jquery-jvectormap.css')?>">
      <!-- Date Picker -->
      <link rel="stylesheet" href="<?php echo base_url('themes/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php echo base_url('themes/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="<?php echo base_url('themes/bower_components/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">
      <!-- jQuery 3 -->
      <script src="<?php echo base_url('themes/bower_components/jquery/dist/jquery.min.js')?>"></script>
      <!-- Google Font -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
</head>
<body class="sidebar-mini wysihtml5-supported skin-purple-light" id="particles-js" style="background-color: #f6f6f6; font-family: 'Source Sans Pro', sans-serif;">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" ><b >INV </b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" ><i class="fa fa-suitcase"> </i> <b style="font-size: 18px"> Kampung Budaya</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Login in at : <?php 

                    $datestring = "%d-%M-%Y";
                    $tanggal= mdate($datestring, $last_login[0]->last_login);
                    print_r($tanggal); ?>
            </a>
          </li>
          <li class="dropdown messages-menu">
            <a href="<?php echo base_url()?>" target="_BLANK" class="dropdown-toggle" data-toggle="dropdown" style="background: #605ca8">
              <i class="fa fa-external-link"></i> 
            </a>
            <ul class="dropdown-menu" style="width: 50px">
              <li>
                <ul class="menu">
                  <li><!-- start message -->
                  <a href='<?php echo base_url(); ?>' target="_BLANK">
                      <h4 style="margin: 0 0 0 21px">
                          <i class="fa fa-external-link-square"></i> &nbsp; Preview 
                      </h4>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-gears"></i> 
            </a>
            <ul class="dropdown-menu" style="width: 50px">
              <li>
                <ul class="menu">
                  <li><!-- start message -->
                  <a href='<?php $user_id = $this->session->userdata('user_id'); echo base_url('auth/edit_user/'.$user_id.'') ?>'>
                      <h4 style="margin: 0 0 0 21px">
                          <i class="fa fa-user fa-fw"></i> &nbsp; Edit Profile
                      </h4>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('themes/man-user.png')?>" class="user-image" alt="User Image">
              <span class="hidden-xs">User Online</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('themes/man-user.png')?>" class="img-circle" alt="User Image">
                <p>
                  User Online - Member
                  <small>Member 2018</small>
                </p>
              </li>
              <!-- Menu Footer-->
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
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('themes/man-user.png')?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>User Online</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- /.main menu -->
          <?php $this->load->view('menu-admin.php'); ?>
          <!-- /.end menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="border-top: 4px solid #605ca8">
            <hr/ style="margin-top: 0px; margin-bottom: 0px">
            <!-- /.box-header -->
            <div class="box-body">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2" style="margin-bottom: 0px">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url();?>themes/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?php echo $title2; ?></h3>
                     <h5 class="widget-user-desc">List Input <?php echo $title; ?></h5>
                  </div>
                </div>
                <div class="col-sm-12" style="padding-top: 20px; padding-right: 0px; padding-left: 0px">
                    <div class="">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                      <h3 class="modal-title"></h3>
                      <div id="infoMessage"><?php echo $message;?></div>
                      <form action="<?php echo base_url()?>auth/edit_user/1" method="post" accept-charset="utf-8" class="form-horizontal">
                          <input type="hidden" value="<?php //echo $get_data->id; ?>" name="id"/> 
                          <div class="form-body">
                              <div class="form-group">
                                  <label class="control-label col-md-3">First Name</label>
                                  <div class="col-md-9">
                                      <input name="first_name" value="<?php print_r($first_name['value']); ?>" placeholder="Nomor Registrasi ..." class="form-control" type="text" required="">
                                      <small style="color: #666"><b>Max len :</b> 255 , <b>Type : </b> Alfabeth </small>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-md-3">Last Name</label>
                                  <div class="col-md-9">
                                      <input name="last_name" value="<?php print_r($last_name['value']); ?>" placeholder="Nomor Registrasi ..." class="form-control" type="text" required="">
                                      <small style="color: #666"><b>Max len :</b> 255 , <b>Type : </b> Alfabeth </small>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-md-3">Company Name</label>
                                  <div class="col-md-9">
                                      <input name="company" value="<?php print_r($company['value']); ?>" placeholder="Nomor Registrasi ..." class="form-control" type="text" required="">
                                      <small style="color: #666"><b>Max len :</b> 255 , <b>Type : </b> Alfabeth </small>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-md-3">Phone</label>
                                  <div class="col-md-9">
                                      <input name="phone" value="<?php print_r($phone['value']); ?>" placeholder="Nomor Registrasi ..." class="form-control" type="text" required="">
                                      <small style="color: #666"><b>Max len :</b> 255 , <b>Type : </b> Number </small>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-md-3">Password</label>
                                  <div class="col-md-9">
                                      <input name="password" value="" placeholder="Password ..." class="form-control" type="password" >
                                      <small style="color: #666"><b>Max len :</b> 255 , <b>Type : </b> Number </small>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-md-3">Comfirm Password</label>
                                  <div class="col-md-9">
                                      <input name="password_confirm" value="" placeholder="Comfirm Password ..." class="form-control" type="password" >
                                      <small style="color: #666"><b>Max len :</b> 255 , <b>Type : </b> Number </small>
                                  </div>
                              </div>
                              <!--
                              <div class="form-group">
                                  <label class="control-label col-md-3">&nbsp;</label>
                                  <div class="col-md-9">
                                  <?php if ($this->ion_auth->is_admin()): ?>
                                      <b><?php echo lang('edit_user_groups_heading');?></b>
                                      <?php foreach ($groups as $group):?>
                                          <label class="checkbox">
                                          <?php
                                              $gID=$group['id'];
                                              $checked = null;
                                              $item = null;
                                              foreach($currentGroups as $grp) {
                                                  if ($gID == $grp->id) {
                                                      $checked= ' checked="checked"';
                                                  break;
                                                  }
                                              }
                                          ?>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                                          <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                          </label>
                                      <?php endforeach?>
                                  <?php endif ?>
                                  </div>
                              </div>
                              -->
                              <?php echo form_hidden('id', $user->id);?>
                              <?php echo form_hidden($csrf); ?>
                              <div class="modal-footer">
                                    <a href="<?php echo base_url();?>auth/edit_user/<?php echo $this->session->userdata('user_id'); ?>" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-refresh"></i> </a>
                                    <a href="<?php echo base_url();?>mod_dashboard/" class="btn btn-primary btn-flat"><i class="fa fa-chevron-left"></i> Kembali</a>
                                    <button type="submit" name="submit" class="btn btn-flat btn-primary"><i class="fa fa-save"></i> &nbsp; Save</button>
                              </div>
                          </div>
                      </form>
              </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>

        <!-- /.end content -->
    </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="https://kreasimedia.net">Maryy Tekhnology</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
</div>
    <!-- Chained -->
    <script src="<?php echo base_url('themes/bower_components/chained/jquery-1.10.2.min.js') ?>"></script>
    <script src="<?php echo base_url('themes/bower_components/chained/jquery.chained.min.js') ?>"></script>
    <script>
            $("#kota").chained("#provinsi"); // disini kita hubungkan kota dengan provinsi
            $("#kecamatan").chained("#kota"); // disini kita hubungkan kecamatan dengan kota
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('themes/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url('themes/bower_components/select2/dist/js/select2.full.js')?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url('themes/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('themes/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo base_url('themes/bower_components/raphael/raphael.min.js')?>"></script>
    <script src="<?php echo base_url('themes/bower_components/morris.js/morris.min.js')?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url('themes/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url('themes/bower_components/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
    <script src="<?php echo base_url('themes/bower_components/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url('themes/bower_components/jquery-knob/dist/jquery.knob.min.js')?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('themes/bower_components/moment/min/moment.min.js')?>"></script>
    <script src="<?php echo base_url('themes/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('themes/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url('themes/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url('themes/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('themes/bower_components/fastclick/lib/fastclick.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('themes/dist/js/adminlte.min.js')?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url('themes/dist/js/pages/dashboard.js')?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('themes/dist/js/demo.js')?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      })
      //$.widget.bridge('uibutton', $.ui.button);
    </script>
</body>
</html>