<?php header('X-Frame-Options: DENY'); ?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in | Administrator Website</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/bootstrap/dist/css/bootstrap.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/font-awesome/css/font-awesome.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/Ionicons/css/ionicons.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/AdminLTE.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/iCheck/square/blue.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.css')?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/particles-js/css/style.css')?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition login-page" style="position: absolute" id="particles-js">
    <div class="container">
        <div class="login-box text" style="margin-top: 104px; box-shadow: 0px 0px 37px -15px rgba(89,89,89,1);">
          <h3 style="margin-bottom: 0px">
            <a href="#" style="color: #000">
            <b>Lupa Password</b>
            </a>
          </h3>
          <small>Isi email di bawah</small>
          <br/>
          <br/>
          <br/>
          <form action="#" id="form" >
              <div class="form-group has-feedback">
                <label style="color: #000">Email</label>
                <input type="text" name="email" value="" placeholder="Email" class="form-control"  />
                <small class="alert1"><b>Type : </b> Email</small> &nbsp; &nbsp; <br/><small class="alert2"></small>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <a href="javascript:void(0)" onclick="save()" class="btn btn-primary btn-block btn-flat" style="margin-top: 7px"><h5 style="margin: 0px"><i class="fa fa-paper-plane-o"></i> &nbsp; Kirim</h5></a>
                </div>
                <div class="col-xs-12">
                  <a href="<?php echo base_url()?>auth/login" class="btn btn-primary btn-block btn-flat" style="margin-top: 7px"><h5 style="margin: 0px"><i class="fa fa-sign-in"></i> &nbsp; Sign In</h5></a>
                </div>
              </div>
          </form> 
        </div>
    </div>
  </body>
<script src="<?php echo base_url('assets/admin/components/jquery/dist/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.min.js')?>"></script>
<script src='https://cldup.com/S6Ptkwu_qA.js'></script>
<script  src="<?php echo base_url('assets/admin/components/particles-js/js/index.js')?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

function save(){
    $('#btnSave').text('saving...'); 
    $('#btnSave').attr('disabled',true); 
    var url;
        url = "<?php echo site_url('mod_users/forgot_password')?>";
    $(".alert1").html('<b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi </b>');
    $(".alert2").html('<b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi </b>');
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data){
            if (data.status !== true) {
                $(".alert1").show().html(data.error.email);
                $(".alert2").show().html(data.error.tidakditemukan);
            }else {
                swal({
                  title: 'Berhasil Reset Password',
                  text : 'Klik Tombol OK Untuk Kembali!',
                  type : 'success',
                  confirmButtonText : 'Ok',
                }, function(){
                    window.location.href='<?php echo base_url()?>auth/forgot_password';
                }, 1000); 
            }
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error adding / update data');
            $('#btnSave').text('save'); 
            $('#btnSave').attr('disabled',false); 
        }
    });
}
</script>
</html>