    <link href="<?php echo base_url()?>themes/bower_components/sweetalert/sweetalert.css" rel="stylesheet" />
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
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2" style="margin-bottom: 0px">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                      <div class="row pull-right" style="margin-top: 12px">
                        <button class="btn btn-sm btn-success btn-flat" onclick="kembali()"><i class="fa fa-chevron-left"></i> &nbsp; Kembali </button>
                      </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo  base_url()?>themes/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Data <?php echo $title; ?></h3>
                     <h5 class="widget-user-desc">List All Data <?php echo $title; ?></h5>
                  </div>
                </div>
                <div class="col-sm-12" style="padding-top: 20px; padding-right: 0px; padding-left: 0px">
                        <div class="form-body">
                            <form action="#" id="form" class="form-horizontal">
                                <input type="hidden" name="id_provinsi" value="<?php echo $get_data->id_provinsi; ?>" />
                                <div class="col-md-12"> 
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Nama Provinsi </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="nama_provinsi" value="<?php echo $get_data->nama_provinsi; ?>" placeholder="Nama Provinsi ... ">
                                            <small style="color: #666"><b>Max len :</b> 100 , <b>Type : </b> Alphabet </small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Status </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="status">
                                                <option value="-">-- Pilih Status --</option>
                                                <?php $vl = array('1' => 'Aktif', '0' => 'Tidak'); ?>
                                                <?php foreach ($vl as $key => $value) { ?>
                                                            <option <?php if($key == $get_data->status ){ echo "selected=''";}else{ echo "";} ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small style="color: #666"><b>Max len :</b> 100 , <b>Type : </b> Alphabet </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                        <hr style="border: 1px solid #aaa ">
                                        <div class="modal-footer" style="border-top-color: #fff">
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

<script src="<?php echo base_url()?>themes/bower_components/sweetalert/sweetalert.min.js"></script>
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
var table, save_method;
var base_url = '<?php echo base_url();?>';

function add(){
    save_method = 'add';
    $('#form')[0].reset(); 
    $('#modal_form').modal('show');
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty(); 
    $('.modal-title').text('Form Edit');
}

function kembali(){
    window.location.href='<?php echo base_url()?>mod_provinsi';
}

function save(){
    $('#btnSave').text('saving...'); 
    $('#btnSave').attr('disabled',true); 
    
    url = "<?php echo site_url('mod_provinsi/ajax_update')?>";
    
    tinyMCE.triggerSave();

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
				  text : 'Klik tombol ok untuk kembali !',
				  type : 'success',
				  confirmButtonText : 'Ok',
				}, function(){
						window.location.href='<?php echo base_url()?>mod_provinsi';
				}, 1000);
            }else{

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