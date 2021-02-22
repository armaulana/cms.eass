<?php 
header('X-Frame-Options: DENY'); 
if($_SERVER['HTTPS']!="on") {
        $redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        header("Location:$redirect"); 
} 
?>
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Log in | Administrator</title>
  <link rel="shortcut icon" href="../assets/favicon.png">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/bootstrap/dist/css/bootstrap.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/font-awesome/css/font-awesome.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/Ionicons/css/ionicons.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/AdminLTE.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/iCheck/square/blue.css');?>">
  <!-- Particles js -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/particles-js/css/style.css')?>">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition login-page" style="position: absolute" id="particles-js">
    <div class="container">
      <div class="login-box text" style="margin-top: 104px; box-shadow: 0px 0px 37px -15px rgba(89,89,89,1);">
        <h3 style="margin-bottom: 0px">
          <a href="#" style="color: #000">
            <b>Selamat Datang</b>
          </a>
        </h3>
        <small>Untuk memulai, gunakan Email dan Password</small>
        <br/>
        <br/>
        <form action="<?php echo base_url(); ?>/auth/login" method="post" accept-charset="utf-8">
          <div class="form-group has-feedback">
            <label><b>Email</b></label>
            <input type="text" name="username" value="" placeholder="Email" class="form-control" autocomplete="off" />
            <small>Contoh : email@mail.com </small>
            <span class="glyphicon glyphicon-user form-control-feedback" style="color: #2f0152;"></span>
          </div>
          <div class="form-group has-feedback">
            <label><b>Password</b></label>
            <input type="password" name="password" value="" placeholder="Password" class="form-control" autocomplete="off" />
            <span class="glyphicon glyphicon-lock form-control-feedback" style="color: #2f0152;"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat" style="margin-top: 7px"><h5 style="margin: 0px"><b><i class="fa fa-sign-in"></i> &nbsp; Sign In</b></h5></button>
            </div>
            <br/>
            <br/>
            <div class="col-xs-12">
              <a href="<?php echo base_url();?>auth/create" class="btn btn-primary btn-block btn-flat" style="margin-top: 7px"><h5 style="margin: 0px"><b><i class="fa fa-edit"></i> &nbsp; Registrasi</b></h5></a>
            </div>
          </div>
          <br/>
        </form> 
        <a href="<?php echo base_url()?>auth/forgot_password" style="text-align: right; color: #000">Forgot Password ?</a> 
        <hr style="border: 1px solid #fff; border-style: dashed">
      </div>
    </div>
  </body>
<script src="<?php echo base_url('assets/admin/components/jquery/dist/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<script  src="<?php echo base_url('assets/admin/components/particles-js/js/index.js')?>"></script>
</html>