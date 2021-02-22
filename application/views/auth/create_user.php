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
  <title>Registration Page</title>
  <link rel="shortcut icon" href="../assets/favicon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/Ionicons/css/ionicons.min.css')?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/select2/dist/css/select2.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/AdminLTE.min.css')?>">
  <!-- Allert Sweet -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.css')?>"/>
  <!-- Particles js -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/particles-js/css/style.css')?>">
   <!-- chosen -->
   <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/chosen/chosen.css')?>">
</head>
<body class="hold-transition login-page" style="position: absolute; " id="particles-js">
    <img id="loading-image" src="" style="  display: none; position: fixed; z-index: 1999; left: 50%; right: 50%; top: 50%; bottom: 50%"/>
    <div class="container">
        <div class="login-box text" style="margin-top: 225px; width: 40%; box-shadow: 0px 0px 37px -15px rgba(89,89,89,1);">
          <h3 style="margin-bottom: 0px">
            <a href="#" style="color: #000">
            <b>Registrasi</b>
            </a>
          </h3>
          <small>Isi dengan lengkap form di bawah</small>
          <br/>
          <br/>
          <br/>
          <form id="form-post" action="#" class="@form-horizontal">
            <div class="form-group has-feedback">
              <label>Nama</label>
              <input  type="text" 
                      name="nama" 
                      class="form-control" 
                      placeholder="Nama Pengguna" 
                      id="colFormInput1" 
                      autocomplete="off">
              <b id="altFormInput1"></b>
            </div>
            <div class="form-group has-feedback">
              <label>Email</label>
              <input  type="text" 
                      name="email" 
                      class="form-control" 
                      placeholder="Email" 
                      id="colFormInput2" 
                      autocomplete="off"> 
              <b id="altFormInput2"></b> 
              <b id="altFormInput21"></b>
              <small>Contoh : email@mail.com <br/> 
                Nb : Gunakan email yang aktif untuk mempermudah kami mengirimkan email verifikasi
              </small> 
            </div>
            <div class="form-group has-feedback">
              <label>Password</label>
              <input  type="password" 
                      name="password" 
                      class="form-control" 
                      placeholder="Password" 
                      id="colFormInput3" 
                      autocomplete="off">
              <b id="altFormInput3"></b>
            </div>
            <div class="form-group has-feedback">
                  <label>Ketik Ulang Password</label>
                  <input  type="password" 
                          name="password_confirm" 
                          class="form-control" 
                          placeholder="Ketik Ulang password" 
                          id="colFormInput4" 
                          autocomplete="off">
                  <b id="altFormInput4"></b>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-xs-12">
                <a href="<?php echo base_url()?>auth/create" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> &nbsp; Reset</a>
                <a href="javascript:void(0)" onclick="save()" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane-o"></i> &nbsp; Kirim</a>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <br/>
          <b><a href="<?php echo base_url()?>auth/login" class="text-center" style="color: #000">Saya Sudah Memiliki Akun</a></b>
          <hr style="border: 1px solid #fff; border-style: dashed">
        </div>
      </div>
    <div id="infoMessage"><?php echo $message;?></div>
<!-- Google Captcha -->
<script src="https://www.google.com/recaptcha/api.js"></script>
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/admin/components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/admin/components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/admin/components/select2/dist/js/select2.full.js')?>"></script>
<!-- Sweet Alert -->
<script src="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.min.js')?>"></script>
<!-- Partikel JS -->
<script src='https://cldup.com/S6Ptkwu_qA.js'></script>
<script  src="<?php echo base_url('assets/admin/components/particles-js/js/index.js')?>"></script>
<!-- Chosen -->
<script src="<?php echo base_url('assets/admin/components/chosen/chosen.jquery.js')?>"></script>
<script>
    function save(){
        $('#btnSave').text('saving...'); 
        $('#btnSave').attr('disabled',true); 
        var url;
            url = "<?php echo site_url('mod_users/registrasi')?>";
        $("#colFormInput1").css('border-color', '#d2d6de');
        $("#altFormInput1").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b><small>');
        $("#colFormInput2").css('border-color', '#d2d6de');
        $("#altFormInput2").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b><small>');
        $("#altFormInput21").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b><small>');
        $("#colFormInput3").css('border-color', '#d2d6de');
        $("#altFormInput3").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b><small>');
        $("#colFormInput4").css('border-color', '#d2d6de');
        $("#altFormInput4").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b><small>');
        var formData = new FormData($('#form-post')[0]);
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function() {
              $("#loading-image").show();
            },
            success: function(data){
                if (data.status !== true) {
                    $("#loading-image").hide();
                    window.pauseAll = true;
                    $("#colFormInput1").show().css('border-color', data.error.colFormInput1); 
                    $("#altFormInput1").show().html(data.error.altFormInput1);
                    $("#colFormInput2").show().css('border-color', data.error.colFormInput2); 
                    $("#altFormInput2").show().html(data.error.altFormInput2);
                    $("#altFormInput21").show().html(data.error.altFormInput21);
                    $("#colFormInput3").show().css('border-color', data.error.colFormInput3); 
                    $("#altFormInput3").show().html(data.error.altFormInput3);
                    $("#colFormInput4").show().css('border-color', data.error.colFormInput4); 
                    $("#altFormInput4").show().html(data.error.altFormInput4);
                }else if(data.status == 'emailfailed'){
                  swal({
                      title: 'Email Sudah di Gunakan',
                      text : 'Klik Tombol OK Untuk Kembali!',
                      type : 'warning',
                      confirmButtonText : 'Ok',
                  }, function(){
                          window.location.href='<?php echo base_url()?>auth/create';
                          $("#loading-image").hide();
                  }, 1000); 
                }else {
                    swal({
                      title: 'Berhasil Membuat Akun',
                      text : 'Klik Tombol OK Untuk Kembali!',
                      type : 'success',
                      confirmButtonText : 'Ok',
                    }, function(){
                            window.location.href='<?php echo base_url()?>auth/create';
                            $("#loading-image").hide();
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
</body>
</html>
