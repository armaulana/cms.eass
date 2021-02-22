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
                        <div class="row">
                            <form action="#" id="form" class="form-horizontal">
                            <input type="hidden" name="id"/>
                            <div class="col-md-12"> 
                                <div class="form-group">
                                    <label class="control-label col-md-2">Provinsi </label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="id_provinsi_fk" id="colFormInput1">
                                            <option value="">-- Pilih Provinsi --</option>
                                            <?php foreach ($provinsi as $key) { ?>
                                                    <option value="<?php echo $key->id_provinsi; ?>"><?php echo $key->nama_provinsi; ?></option>
                                            <?php } ?>
                                        </select>
                                        <small style="color: #666"><b id="altFormInput1"></b> <b>Max len :</b> 100 , <b>Type : </b> Alphabet </small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Nomor</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nomor" placeholder="Nomor Kota... " id="colFormInput2">
                                        <small style="color: #666"><b id="altFormInput2"></b><b>Max len :</b> 100 , <b>Type : </b> Number </small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Nama Kota </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nama_kota" placeholder="Nama Kota... " id="colFormInput3">
                                        <small style="color: #666"><b id="altFormInput3"></b><b>Max len :</b> 100 , <b>Type : </b> Alphabet </small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Status </label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="status" id="colFormInput4">
                                            <option value="">-- Pilih Status --</option>
                                            <?php $vl = array('1' => 'Aktif', '0' => 'Tidak'); ?>
                                            <?php foreach ($vl as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                        <small style="color: #666"><b id="altFormInput4"></b> <b>Max len :</b> 100 , <b>Type : </b> Alphabet </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <hr style="border: 1px solid #aaa ">
                                <div class="modal-footer" style="border-top-color: #fff">
                                    <button class="btn btn-default btn-flat" onclick="reload()"><i class="glyphicon glyphicon-refresh"></i> </button>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-flat" onclick="kembali()"><i class="fa fa-chevron-left"></i> &nbsp; Kembali </button>
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
var save_method;

function reset(){
    $('#form')[0].reset();
}

function kembali(){
    window.location.href='<?php echo base_url()?>mod_kota';
}

function reload(){
    window.location.href='<?php echo base_url()?>mod_kota/tambah';
}

function save(){
    var url;
    var formData = new FormData($('#form')[0]);
    url = "<?php echo site_url('mod_kota/ajax_add')?>";
    $('#colFormInput1').show().css('border-color', '#d2d6de');
    $('#altFormInput1').hide().html('<small><b style="color: #008d4c"><i class="fa fa-check"></i></b></small>');
    $('#colFormInput2').show().css('border-color', '#d2d6de');
    $('#altFormInput2').hide().html('<small><b style="color: #008d4c"><i class="fa fa-check"></i></b></small>');
    $('#colFormInput3').show().css('border-color', '#d2d6de');
    $('#altFormInput3').hide().html('<small><b style="color: #008d4c"><i class="fa fa-check"></i></b></small>');
    $('#colFormInput4').show().css('border-color', '#d2d6de');
    $('#altFormInput4').hide().html('<small><b style="color: #008d4c"><i class="fa fa-check"></i></b></small>');
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data){
            if(data.status !== true) {
                $('#colFormInput1').show().css('border-color', data.error.colFormInput1);
                $('#altFormInput1').show().html(data.error.altFormInput1);
                $('#colFormInput2').show().css('border-color', data.error.colFormInput2);
                $('#altFormInput2').show().html(data.error.altFormInput2);
                $('#colFormInput3').show().css('border-color', data.error.colFormInput3);
                $('#altFormInput3').show().html(data.error.altFormInput3);
                $('#colFormInput4').show().css('border-color', data.error.colFormInput4);
                $('#altFormInput4').show().html(data.error.altFormInput4);
            }else{
                swal({
                      title: 'Save Data Berhasil!',
                      text : 'Klik tombol ok untuk kembali !',
                      type : 'success',
                      confirmButtonText : 'Ok',
                    }, function(){
                            window.location.href='<?php echo base_url()?>mod_kota';
                }, 1000); 
            }
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error adding / update data');
        }
    });
}
</script>