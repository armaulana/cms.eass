    <link href="<?php echo base_url()?>assets/admin/components/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title;?>
        <small>Informations</small>
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
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-md-3">
                  <!-- Profile Image -->
                  <div class="box box-primary" style="border-top: 3px solid #605ca8">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('uploads/profile_aplikasi/')?><?php echo $get_data->photo; ?>" style="object-fit: cover; width: 100px; height: 100px">
                      <h3 class="profile-username text-center"><?php echo $get_data->nama; ?></h3>
                      <p class="text-muted text-center"><?php echo $get_data->visi_misi; ?></p>
                      <hr/>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <strong><i class="fa fa-building margin-r-5"></i> Alamat</strong>
                        <p class="text-muted">
                          <?php echo $get_data->alamat; ?>
                        </p>
                        <hr>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                        <p class="text-muted">
                          <?php foreach ($this->db->get('bucket_ref_provinsi')->result() as $key) { 
                                    if($key->id_provinsi == $get_data->provinsi){ echo strtolower($key->nama_provinsi);}else{ }
                           } ?>, 
                          <?php foreach ($this->db->get('bucket_ref_kota')->result() as $key) {
                                    if($key->id_kota == $get_data->kota){ echo strtolower($key->nama_kota); }else{}
                          } ?>, 
                          <?php foreach ($this->db->get('bucket_ref_kecamatan')->result() as $key) {
                                    if($key->id_kecamatan == $get_data->kecamatan){ echo strtolower($key->nama_kecamatan); }else{ }
                          } ?></p>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                  <form action="#" id="form" class="form-horizontal">
                    <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                        <li><a href="#upload" data-toggle="tab">Upload</a></li>
                      </ul>
                      <div class="tab-content">
                        <div class="active tab-pane" id="profile">
                            <input type="hidden" name="id" value="<?php echo $get_data->id; ?>">
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Nama </label>
                              <div class="col-sm-10">
                                <input type="text" name="nama" value="<?php echo $get_data->nama; ?>" class="form-control" id="inputName" placeholder="Name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail" class="col-sm-2 control-label">Visi dan Misi</label>
                              <div class="col-sm-10">
                                <textarea name="visi_misi" class="form-control" placeholder="Visi dan Misi ... "><?php echo $get_data->visi_misi; ?></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail" class="col-sm-2 control-label">Alamat</label>
                              <div class="col-sm-10">
                                <textarea name="alamat" class="form-control" placeholder="Alamat ... "><?php echo $get_data->alamat; ?></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Provinsi</label>
                              <div class="col-sm-10">
                                <select class="form-control select2" name="provinsi">
                                  <option value="">-- Pilih Provinsi --</option>
                                  <?php foreach ($provinsi as $key) { ?>
                                            <option <?php if($key->id_provinsi == $get_data->provinsi){ echo 'selected=""';}else{ echo ""; } ?> value="<?php echo $key->id_provinsi; ?>"><?php echo strtolower($key->nama_provinsi); ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Kota</label>
                              <div class="col-sm-10">
                                <select class="form-control select2" name="kota">
                                  <option value="">-- Pilih Kota --</option>
                                  <?php foreach ($kota as $key) { ?>
                                            <option <?php if($key->id_kota == $get_data->kota ){ echo 'selected=""';}else{ echo ""; } ?>  value="<?php echo $key->id_kota; ?>"><?php echo strtolower($key->nama_kota); ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Kecamatan</label>
                              <div class="col-sm-10">
                                <select class="form-control select2" name="kecamatan">
                                  <option value="">-- Pilih Kecamatan --</option>
                                  <?php foreach ($kecamatan as $key) { ?>
                                            <option <?php if($key->id_kecamatan == $get_data->kecamatan ){ echo 'selected=""';}else{ echo ""; } ?> value="<?php echo $key->id_kecamatan; ?>"><?php echo strtolower($key->nama_kecamatan); ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">No Telepon</label>
                              <div class="col-sm-10">
                                <input type="text" name="no_telepon" value="<?php echo $get_data->no_telepon; ?>" class="form-control" id="inputName" placeholder="Nomor Telepon ...">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputExperience" class="col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                <input type="text" name="email" value="<?php echo $get_data->email; ?>" class="form-control" placeholder="Email ...">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputExperience" class="col-sm-2 control-label">Fax</label>
                              <div class="col-sm-10">
                                <input type="text" name="fax" value="<?php echo $get_data->fax; ?>" class="form-control" placeholder="Fax ...">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <a class="btn btn-primary btn-flat" href="javascript:void(0)" title="View" onclick="save() "><i class="fa fa-sign-in fa-fw"></i> Save</a>
                              </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="upload">
                          <ul class="mailbox-attachments clearfix">
                            <li>
                              <span class="mailbox-attachment-icon has-img"><img src="<?php echo base_url('uploads/profile_aplikasi/')?><?php echo $get_data->photo; ?>" alt="Attachment"></span>

                              <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> <?php echo $get_data->photo; ?></a>
                                    <span class="mailbox-attachment-size">
                                      2.67 MB
                                      <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                    </span>
                              </div>
                            </li>
                          </ul>
                            <div class="btn btn-default btn-file" >
                                <i class="fa fa-paperclip"></i> Upload Foto
                                <input name="photo" type="file" class="text-muted text-center" alt="">
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                      </div>
                    </div>
                  </form>
                  <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

            </section>
            <!-- /.content -->
            </div>
          </div>
        </div>
      </div>
    </section>

<script src="<?php echo base_url()?>assets/admin/components/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/components/tinymce/tinymce.min.js"></script>
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

// Reset Input
function reset(){
}

function add_posting(){
    save_method = 'add';
    $('#form')[0].reset(); 
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty(); 
    $('.modal-title').text('Form');
    $('#photo-preview').hide(); 
    $('#label-photo').text('Upload Photo'); 
}

function save(){
    $('#btnSave').text('saving...'); 
    $('#btnSave').attr('disabled',true); 
    
    var url;
    url = "<?php echo site_url('mod_sett_prof_aplikasi/ajax_add')?>";

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
            if(data.hasil) {
                swal({
                      title: 'Save Data Berhasil!',
                      text : 'Klik tombol ok untuk kembali !',
                      type : 'success',
                      confirmButtonText : 'Ok',
                    }, function(){
                            window.location.href='<?php echo base_url()?>mod_sett_prof_aplikasi';
                }, 1000); 
            }else{
                alert('Error adding / update data');
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