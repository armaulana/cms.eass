    <link href="<?php echo base_url()?>themes/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Content Header (Page header) -->
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="border-top: 3px solid #605ca8">
            <hr/ style="margin-top: 0px; margin-bottom: 0px">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-sm-12" style="padding-top: 20px; padding-right: 0px; padding-left: 0px">
                        <div class="form-body">
                            <div class="row">
                                <form action="#" id="form" class="form-horizontal">
                                <div class="col-sm-12">
                                    <div class="box-body box-profile" style="padding-top: 25px">
                                          <img class="profile-user-img img-responsive img-circle" src="http://localhost/master-cms/themes/man-user.png" alt="User profile picture">
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
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">User Name</label>
                                            <div class="col-md-9">
                                                <input type="text" name="user_name" placeholder="User Name ..." class="form-control" id="redcolor">
                                                <small style="color: #666;"><b id="alert"></b> <b>Max len :</b> 250 , <b>Type : </b> Alfabet </small>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Password</label>
                                            <div class="col-md-9">
                                                <input name="password" placeholder="Password ..." class="form-control" type="password" id="redcolor2">
                                                <small style="color: #666"><b id="alert2"></b> <b>Max len :</b> 250 , <b>Type : </b> Password </small>
                                            </div>
                                        </div>
                                        <div class="form-group" id="poliklinik">
                                            <label class="control-label col-md-3">Email </label>
                                            <div class="col-md-9">
                                                <input type="text" name="email" class="form-control" placeholder="Email ... ">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Active</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="active">
                                                <?php $wn = array('1' => 'Aktif', '2' => 'TIdak'); ?>
                                                <?php foreach($wn as $key=> $x_value){ ?>
                                                        <option value="<?php echo $key; ?>" ><?php echo $x_value; ?></option>
                                                <?php } ?> 
                                                </select>
                                                <small style="color: #666">Max len :</b> 250 , <b>Type : </b> Choose </small>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">First Name</label>
                                            <div class="col-md-9">
                                                <input name="first_name" placeholder="First Name ..." class="form-control" type="text" id="nama">
                                                <small style="color: #666"><b>Max len :</b> 250 , <b>Type : </b> Alfabet </small>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Last Name</label>
                                            <div class="col-md-9">
                                                <input name="last_name" placeholder="Last Name ..." class="form-control" type="text" id="nama">
                                                <small style="color: #666"><b>Max len :</b> 250 , <b>Type : </b> Alfabet </small>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6"> 
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Phone </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="phone" placeholder="Phone ... ">
                                                <small style="color: #666"><b>Max len :</b> 100 , <b>Type : </b> Number </small>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Jenis Kelamin </label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="jenis_kelamin">
                                                <?php $wn = array('1' => 'Laki-laki', '2' => 'Perempuan'); ?>
                                                <?php foreach($wn as $key=> $x_value){ ?>
                                                        <option value="<?php echo $key; ?>" ><?php echo $x_value; ?></option>
                                                <?php } ?> 
                                                </select>
                                                <small style="color: #666"><b>Max len :</b> 100 , <b>Type : </b> Choose </small>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Alamat </label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" name="alamat" placeholder="Alamat ... "></textarea>
                                                <small style="color: #666"><b>Max len :</b> 250 , <b>Type : </b> Alfabeth </small>
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

<script src="<?php echo base_url()?>themes/plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>themes/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content',
        height: 300,
        theme: 'modern',
        plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
</script>

<script type="text/javascript">
var save_method;
$('#alert').hide();
$('#alert2').hide();
$('#alert3').hide();
$('#alert4').hide();

// Reset Input
function reset(){
    $('#form')[0].reset();
}

function kembali(){
    window.location.href='<?php echo base_url()?>mod_users/';
}

// Input dokter
function save(){
    $('#btnSave').text('saving...'); 
    $('#btnSave').attr('disabled',true); 
    
    var url;
    url = "<?php echo site_url('mod_users/ajax_add')?>";

    tinyMCE.triggerSave();
    // ajax adding data to database
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data){
            if(data.status) {
                swal({
                      title: 'Save Data Berhasil!',
                      text : 'Klik tombol kembali ke halaman pedaftaran !',
                      type : 'success',
                      confirmButtonText : 'Ok',
                    }, function(){
                            window.location.href='<?php echo base_url()?>mod_users';
                }, 1000); 
            }else{
                alert('Error adding / update data');
                //swal({
                //  title: 'Save Data Berhasil!',
                //  text : 'Klik tombol kembali ke halaman pedaftaran !',
                //  type : 'success',
                //  confirmButtonText : 'Ok',
                //}, function(){
                //        //window.location.href='<?php echo base_url()?>mod_pendaftaran_pasien';
                //}, 1000); 
            }
            $('#btnSave').text('save'); 
            $('#btnSave').attr('disabled',false);
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error adding / update data');
            $('#btnSave').text('save'); 
            $('#btnSave').attr('disabled',false); 
        }
    });
}
</script>