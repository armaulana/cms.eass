
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Verifikasi Email</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>themes/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>themes/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>themes/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>themes/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>themes/bower_components/iCheck/square/blue.css">
  <!-- Particles js -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="<?php echo base_url('themes/bower_components/particles-js/css/style.css')?>">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="position: absolute" id="particles-js">
  <div class="container">
    <div class="login-box text" style="margin-top: 104px">
        <h3 style="margin-bottom: 0px">
          <a href="#" style="color: #fff">
            <b>Verifikasi</b>
          </a>
        </h3>
        <small>Sistem Informasi</small>
        <br/>
        <br/>
        <br/>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Gagal Verifikasi ! </h4>
            Silahkan klik tombol di bawah untuk melanjutkan 
        </div>
        <a href="<?php echo base_url()?>/auth/login" class="btn btn-primary btn-flat" style="width: 100%"><i class="fa fa-sign-out"></i> Halaman Login </a>
        <br/>
        <hr style="border: 1px solid #fff; border-style: dashed">
        <center><small>© 2019 Hak Cipta Terpelihara <b>Kreasimedia</b></small></center>
    </div>
  </div>
</body>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>themes/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>themes/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>themes/bower_components/iCheck/icheck.min.js"></script>
<!-- Partikel Js-->
<script src='https://cldup.com/S6Ptkwu_qA.js'></script>
<script  src="<?php echo base_url('themes/bower_components/particles-js/js/index.js')?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>