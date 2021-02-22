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
                <div class="box box-widget widget-user-2" style="margin-bottom: 0px">
                  <div class="widget-user-header ">
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo  base_url()?>assets/admin/list.png" alt="User Avatar">
                     </div>
                     <h3 class="widget-user-username">Form Data</h3>
                     <h5 class="widget-user-desc">Informations</h5>
                  </div>
                </div>
                <div class="col-sm-12" style="padding-top: 20px; padding-right: 0px; padding-left: 0px">
                        <div class="form-body">
                            <form action="#" id="form" class="form-horizontal">
                                <input type="hidden" name="lib_id" value="<?php echo $get_data->lib_id ; ?>" />
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Provinsi</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="id_provinsi_fk" id="provinsi">
                                                <option value="">-- Pilih Provinsi --</option>
                                                <?php foreach ($provinsi as $key) { ?>
                                                            <option  <?php if($key->id_provinsi == $provinsi_selected ){ echo "selected=''";}else{ echo "";} ?> value="<?php echo $key->id_provinsi; ?>"><?php echo $key->nama_provinsi; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small><b id="altFormInput1"></b> <b>Type : Select</b></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Kota</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="id_kota_fk" id="kota">
                                                <option value="">-- Pilih Kota --</option>
                                                <?php foreach ($kota as $kot) { ?>
                                                    <!--di sini kita tambahkan class berisi id provinsi-->
                                                    <option class="<?php echo $kot->id_provinsi_fk ?>" <?php if($kot->id_kota == $kota_selected ){ echo "selected=''";}else{ echo "";} ?> value="<?php echo $kot->id_kota ?>"><?php echo $kot->nama_kota ?></option>
                                                <?php } ?>
                                            </select>
                                            <small><b id="altFormInput2"></b> <b>Type : Select </b></small>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Nomor </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="nomor" value="<?php echo substr($get_data->id_kecamatan, 4, 4); ?>" id="colFormInput3">
                                            <small><b id="altFormInput3"></b> <b>Type : Number </b></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Nama Kota </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="nama_kecamatan" value="<?php echo $get_data->nama_kecamatan; ?>" placeholder="Nama Kota ... " id="altFormInput4">
                                            <small><b id="altFormInput4"></b> <b>Type : Text</b></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Status </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="status" id="colFormInput5">
                                                <option value="">-- Pilih Status --</option>
                                                <?php $vl = array('1' => 'Aktif', '0' => 'Tidak'); ?>
                                                <?php foreach ($vl as $key => $value) { ?>
                                                            <option <?php if($key == $get_data->status ){ echo "selected=''";}else{ echo "";} ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small><b id="altFormInput5"></b> <b>Type : Select </b></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                        <hr style="border: 1px solid #fff ">
                                        <div class="modal-footer" style="border-top-color: #fff">
                                            <a class="btn btn-primary btn-flat" href="javascript:void(0)" onclick="kembali()"><i class="fa fa-chevron-left"></i> &nbsp; Kembali </a>
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
    </section>
<script src="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.min.js')?>"></script>
<script src="<?php echo base_url('assets/admin/components/tinymce/tinymce.min.js');?>"></script>
<script type="text/javascript">
var table, save_method;

function kembali(){
    window.location.href='<?php echo base_url()?>mod_kecamatan';
}

function save(){
    var url = "<?php echo site_url('mod_kecamatan/ajax_update')?>";
    var formData = new FormData($('#form')[0]);
    $('#provinsi').show().css('border-color', '#d2d6de');
    $('#altFormInput1').hide().html('<small><b style="color: #008d4c"><i class="fa fa-check"></i> Terisi </b></small>');
    $('#kota').show().css('border-color', '#d2d6de');
    $('#altFormInput2').hide().html('<small><b style="color: #008d4c"><i class="fa fa-check"></i> Terisi </b></small>');
    $('#colFormInput3').show().css('border-color', '#d2d6de');
    $('#altFormInput3').hide().html('<small><b style="color: #008d4c"><i class="fa fa-check"></i> Terisi </b></small>');
    $('#colFormInput4').show().css('border-color', '#d2d6de');
    $('#altFormInput4').hide().html('<small><b style="color: #008d4c"><i class="fa fa-check"></i> Terisi </b></small>');
    $('#colFormInput5').show().css('border-color', '#d2d6de');
    $('#altFormInput5').hide().html('<small><b style="color: #008d4c"><i class="fa fa-check"></i> Terisi </b></small>');
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data){
            if(data.status != true) {
                $('#provinsi').show().css('border-color', data.error.colFormInput1);
                $('#altFormInput1').show().html(data.error.altFormInput1);
                $('#kota').show().css('border-color', data.error.colFormInput2);
                $('#altFormInput2').show().html(data.error.altFormInput2);
                $('#colFormInput3').show().css('border-color', data.error.colFormInput3);
                $('#altFormInput3').show().html(data.error.altFormInput3);
                $('#colFormInput4').show().css('border-color', data.error.colFormInput4);
                $('#altFormInput4').show().html(data.error.altFormInput4);
                $('#colFormInput5').show().css('border-color', data.error.colFormInput5);
                $('#altFormInput5').show().html(data.error.altFormInput5);
            }else{
                swal({
                  title: 'Save Data Berhasil!',
                  text : 'Klik tombol ok untuk kembali !',
                  type : 'success',
                  confirmButtonText : 'Ok',
                }, function(){
                        window.location.href='<?php echo base_url()?>mod_kecamatan';
                }, 1000);
            }
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error adding / update data');
        }
    });
}
</script>