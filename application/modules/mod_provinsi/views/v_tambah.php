    <link href="<?php echo base_url()?>assets/admin/components/sweetalert/sweetalert.css" rel="stylesheet" />
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
                                <form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
                                <input type="hidden" name="id"/>
                                <div class="col-md-12"> 
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Nomor</label>
                                        <div class="col-md-9">
                                            <input type="text" name="nomor" class="form-control" placeholder="Nomor Provinsi ... " id="colFormInput1">
                                            <small style="color: #666"><b id="altFormInput1"></b> <b>Max len :</b> 100 , <b>Type : </b> Number </small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Nama Provinsi </label>
                                        <div class="col-md-9">
                                            <input type="text" name="nama_provinsi" class="form-control" placeholder="Nama Provinsi ... " id="colFormInput2">
                                            <small style="color: #666"><b id="altFormInput2"></b> <b>Max len :</b> 100 , <b>Type : </b> Alphabet </small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Status </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="status" id="colFormInput3">
                                                <option value="">-- Pilih Status --</option>
                                                <?php $vl = array('1' => 'Aktif', '0' => 'Tidak'); ?>
                                                <?php foreach ($vl as $key => $value) { ?>
                                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small style="color: #666"><b id="altFormInput3"></b> <b>Max len :</b> 100 , <b>Type : </b> Alphabet </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                        <hr style="border: 1px solid #fff">
                                        <div class="modal-footer" style="border-top-color: #fff">
                                            <a class="btn btn-default btn-flat" href="javascript:void(0)" onclick="reload()"><i class="glyphicon glyphicon-refresh"></i> </a>
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

function kembali(){
    window.location.href='<?php echo base_url()?>mod_provinsi';
}

function reload(){
    window.location.href='<?php echo base_url()?>mod_provinsi/tambah';
}

function save(){
    var url;
    url = "<?php echo site_url('mod_provinsi/ajax_add')?>";
    formData = new FormData($('#form')[0]);
    $('#colFormInput1').show().css('border-color', '#d2d6de');
    $('#altFormInput1').hide().html('<small><b style="color: #008d4c"><i class="fa fa-check"></i>Terisi</b></small>');
    $('#colFormInput2').show().css('border-color', '#d2d6de');
    $('#altFormInput2').hide().html('<small><b style="color: #008d4c"><i class="fa fa-check"></i>Terisi</b></small>');
    $('#colFormInput3').show().css('border-color', '#d2d6de');
    $('#altFormInput3').hide().html('<small><b style="color: #008d4c"><i class="fa fa-check"></i>Terisi</b></small>');
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data){
            if(data.status !== true){
                $('#colFormInput1').show().css('border-color', data.error.colFormInput1);
                $('#altFormInput1').show().html(data.error.altFormInput1);
                $('#colFormInput2').show().css('border-color', data.error.colFormInput2);
                $('#altFormInput2').show().html(data.error.altFormInput2);
                $('#colFormInput3').show().css('border-color', data.error.colFormInput3);
                $('#altFormInput3').show().html(data.error.altFormInput3);
            }else{
                swal({
                      title: 'Save Data Berhasil!',
                      text : 'Klik tombol ok untuk kembali !',
                      type : 'success',
                      confirmButtonText : 'Ok',
                    }, function(){
                            window.location.href='<?php echo base_url()?>mod_provinsi';
                }, 1000); 
            }
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error adding / update data');
        }
    });
}
</script>