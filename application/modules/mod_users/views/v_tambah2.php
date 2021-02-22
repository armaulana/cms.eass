<link href="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.css')?>" rel="stylesheet" />
<section class="content-header">
  <h1>
    <?php echo $title;?>
    <small>Datas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?php echo $title; ?></li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="border-top: 3px solid #605ca8">
            <hr/ style="margin-top: 0px; margin-bottom: 0px">
            <div class="box-body">
                <div class="col-sm-12" style="padding-top: 20px; padding-right: 0px; padding-left: 0px">
                        <div class="form-body">
                            <div class="row">
                                <form action="#" id="form" class="form-horizontal">
                                    <div class="col-sm-12">
                                        <div class="box-body box-profile" style="padding-top: 25px">
                                            <img class="profile-user-img img-responsive img-circle" src="<?php echo  base_url()?>assets/admin/man-user.png" alt="User profile picture">
                                            <h3 class="profile-username text-center">Nina Mcintire</h3>
                                            <p class="text-muted text-center">Software Engineer</p>
                                            <div style="margin-right: 45%; margin-left: 44%">
                                                <div class="btn btn-default btn-file" >
                                                    <i class="fa fa-paperclip"></i> Upload Foto
                                                    <input name="photo" type="file" class="text-muted text-center" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <hr />
                                        <br/>
                                    </div>
                                    <input type="hidden" name="id"/>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">User Level</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="user_level" id="color">
                                                        <option value="">-- Pilih --</option>
                                                        <?php foreach($users_level as $key){ ?>
                                                                    <option  value="<?php echo $key->id;?>"><?php echo $key->name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <small style="color: #666;"><b id="alert"></b> <b>Type : </b> Selected </small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="first_name">User Name</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="user_name" class="form-control" id="color1" placeholder="User Name"/>
                                                    <small style="color: #666;"><b id="alert1"></b> <b>Type : </b> Alfabet </small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="email" class="form-control" id="color6" placeholder="Email"/>
                                                    <small style="color: #666;"><b id="alert6"></b> <b id="alertemail"> </b> <b>Type : </b> Selected </small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" name="password" class="form-control" id="color8" placeholder="Password"/>
                                                    <small style="color: #666;"><b id="alert8"></b> <b>Type : </b> Password </small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Password Confirm</label>
                                                <div class="col-md-6">
                                                    <input type="password" name="password_confirm" class="form-control" id="color9" placeholder="Password Confirm"/>
                                                    <small style="color: #666;"><b id="alert9"></b> <b>Type : </b> Password </small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Active</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="active" id="color15">
                                                        <?php $wn = array('1' => 'Aktif', '0' => 'TIdak'); ?>
                                                        <?php foreach($wn as $key=> $x_value){ ?>
                                                                <option value="<?php echo $key; ?>" ><?php echo $x_value; ?></option>
                                                        <?php } ?> 
                                                        </select>
                                                        <small style="color: #666"><b id="alert15"></b> <b>Type : </b> Choose </small>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-12">
                                            <hr style="border: 1px solid #aaa ">
                                            <div class="modal-footer" style="border-top-color: #fff">
                                                <a class="btn btn-primary btn-flat" href="javascript:void(0)" title="View" onclick="kembali() "><i class="fa fa-chevron-left"></i> Kembali</a>
                                                <a class="btn btn-primary btn-flat" href="javascript:void(0)" title="View" onclick="save() "><i class="fa fa-sign-in fa-fw"></i> Save</a>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
          </div>
        </div>
      </div>
</section>
<script src="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/components/tinymce/tinymce.min.js');?>"></script>
<script type="text/javascript">
    function reset(){
        $('#form')[0].reset();
    }

    function kembali(){
        window.location.href='<?php echo base_url()?>mod_users/';
    }

    function save(){
        var url;
            url = "<?php echo site_url('mod_users/ajax_add')?>";
        $("#alert").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi </b></small>');
        $("#color").css('border-color', '#d2d6de');
        $("#alert1").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b><small>');
        $("#color1").css('border-color', '#d2d6de');
        $("#alert2").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b><small>');
        $("#color2").css('border-color', '#d2d6de');
        $("#alert3").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b><small><br/>');
        $("#color3").css('border-color', '#d2d6de');
        $("#alert4").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b><small>');
        $("#color4").css('border-color', '#d2d6de');
        $("#alert5").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b></small><br/>');
        $("#color5").css('border-color', '#d2d6de');
        $("#alert6").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b></small>');
        $("#color6").css('border-color', '#d2d6de');
        $("#alertemail").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Belum di gunakan</b></small><br/>');
        $("#coloremail").css('border-color', '#d2d6de');
        $("#alert7").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b></small>');
        $("#color7").css('border-color', '#d2d6de');
        $("#alert8").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b></small>');
        $("#color8").css('border-color', '#d2d6de');
        $("#alert9").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b></small>');
        $("#color9").css('border-color', '#d2d6de');
        $("#alert10").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b></small>');
        $("#color10").css('border-color', '#d2d6de');
        $("#alert11").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b></small>');
        $("#color11").css('border-color', '#d2d6de');
        $("#alert12").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b></small>');
        $("#color12").css('border-color', '#d2d6de');
        $("#alert13").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b></small>');
        $("#color13").css('border-color', '#d2d6de');
        $("#alert14").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b></small>');
        $("#color14").css('border-color', '#d2d6de');
        $("#alert15").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b></small>');
        $("#color15").css('border-color', '#d2d6de');
        $("#alert16").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b></small>');
        $("#color16").css('border-color', '#d2d6de');
        $("#alert17").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi</b></small>');
        $("#color17").css('border-color', '#d2d6de');
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
                    $("#alert").show().html(data.error.user_level);
                    $("#color").show().css('border-color', data.error.color); 
                    $("#alert1").show().html(data.error.user_name);
                    $("#color1").show().css('border-color', data.error.color1); 
                    $("#alert2").show().html(data.error.first_name);
                    $("#color2").show().css('border-color', data.error.color2); 
                    $("#alert3").show().html(data.error.last_name);
                    $("#color3").show().css('border-color', data.error.color3); 
                    $("#alert4").show().html(data.error.jenis_kelamin);
                    $("#color4").show().css('border-color', data.error.color4); 
                    $("#alert5").show().html(data.error.company);
                    $("#color5").show().css('border-color', data.error.color5); 
                    $("#alert6").show().html(data.error.email);
                    $("#color6").show().css('border-color', data.error.color6); 
                    $("#alertemail").show().html(data.error.tidakditemukan);
                    $("#coloremail").show().css('border-color', data.error.tidakditemukan); 
                    $("#alert7").show().html(data.error.phone);
                    $("#color7").show().css('border-color', data.error.color7); 
                    $("#alert8").show().html(data.error.password);
                    $("#color8").show().css('border-color', data.error.color8); 
                    $("#alert9").show().html(data.error.password_confirm);
                    $("#color9").show().css('border-color', data.error.color9);
                    $("#alert10").show().html(data.error.alamat);
                    $("#color10").show().css('border-color', data.error.color10); 
                    $("#alert11").show().html(data.error.prov);
                    $("#color11").show().css('border-color', data.error.color11); 
                    $("#alert12").show().html(data.error.kota);
                    $("#color12").show().css('border-color', data.error.color12); 
                    $("#alert13").show().html(data.error.kec);
                    $("#color13").show().css('border-color', data.error.color13); 
                    $("#alert14").show().html(data.error.kode_pos);
                    $("#color14").show().css('border-color', data.error.color14); 
                    $("#alert15").show().html(data.error.status);
                    $("#color15").show().css('border-color', data.error.color15); 
                }else {
                    swal({
                      title: 'Berhasil',
                      text : 'Klik Tombol OK Untuk Kembali!',
                      type : 'success',
                      confirmButtonText : 'Ok',
                    }, function(){
                            window.location.href='<?php echo base_url()?>mod_users/create_user';
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