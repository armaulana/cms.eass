    <link href="<?php echo base_url()?>assets/admin/components/sweetalert/sweetalert.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <style>
        #page_list li{
            padding:16px;
            background-color:#f9f9f9;
            border:1px dotted #ccc;
            cursor:move;
            margin-top:12px;
        }
        #page_list li.ui-state-highlight{
            padding:24px;
            background-color:#ffffcc;
            border:1px dotted #ccc;
            cursor:move;
            margin-top:12px;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title;?>
        <small>List</small>
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
            <div class="box-header">
                <h3 class="box-title">Drag and Drop</h3>
            </div>
            <hr/ style="margin-top: 0px; margin-bottom: 0px; border: 1px solid #dedede; border-style: dashed;">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-sm-12" style="padding-top: 0px; padding-right: 0px; padding-left: 0px">
                <ul class="list-unstyled" id="page_list">
                <?php   $no = 0;
                        $query = $this->db->order_by('page_order', 'asc')->where('status', 1)->get('page_builder')->result();
                        foreach($query as $key){
                        // -- Crud kontent
                        if($key->crud_aktif == 1){
                            $button = '<a href="javascript:void(0)" class="btn btn-xs btn-warning" style="margin-top: 5px;" onclick="edit('.$key->id.')"><i class="fa fa-pencil"></i> Kontent</a> ';
                        }else{
                            $button = '';
                        }
                        // -- Extra Edit
                        if($key->extra_crud_aktif == 1){
                            $extra_button = '<a href="javascript:void(0)" class="btn btn-xs btn-warning" style="margin-top: 5px;" onclick="extra_edit('.$key->id.')"><i class="fa  fa-star"></i> Extra Edit</a> ';
                        }else{
                            $extra_button = '';
                        }
                        // -- Crud titel
                        if($key->crud_title == 1){
                            $titel_button = '<a href="javascript:void(0)" class="btn btn-xs btn-warning" style="margin-top: 5px;" onclick="title_edit('.$key->id.')"><i class="fa fa-pencil"></i> Isi Title Judul </a>';
                        }else{
                            $titel_button = '';
                        }
                            echo '
                                  <li id="'.$key->id.'">
                                    <h4 style="margin:0px;"> <i class="fa fa-ellipsis-v"> </i> <i class="fa fa-ellipsis-v"> </i> &nbsp;  <b>'.$key->page_title.'</b> </h4>'.$button.' '.$extra_button.' '.$titel_button.'
                                  </li>';
                        $no++;
                        }
                ?>
                </ul>
                <input type="hidden" name="page_order_list" id="page_order_list" />
                </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal tambah & edit-->
      <div class="modal fade bd-example-modal-lg" id="modal_form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid #d2d6de ;border-bottom-style: dashed">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Menu Kategori</h3>
                    <small class="title-small"><b style="color: #666">Form Tambah</b></small>
                </div>
                <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value="" name="id"/> 
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">File</label>
                                <div class="col-md-9">
                                    <div id="foto"></div>
                                    <br/>
                                    <input type="file" name="poto">
                                    <small style="color: #666"><b id="alert2"> </b> <b>Type : </b> .jpg | .png  </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Deskripsi</label>
                                <div class="col-md-9">
                                    <input name="deskripsi" placeholder="Deskripsi ... " class="form-control" type="text" id="redcolor2" >
                                    <small style="color: #666"><b id="alert2"> </b> <b>Type : </b> Alfabeth </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Kontent Video</label>
                                <div class="col-md-9">
                                    <select id="pilih" onclick="show_option()" class="form-control" name="status_video">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                    <small style="color: #666"><b>Type : </b> Select </small>
                                </div>
                            </div>
                            <div class="form-group" id="show" style="display: none">
                                <label class="control-label col-md-3">Url Video</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="url_video" placeholder="url video ...">
                                    <small style="color: #666"><b>Type : </b> Select </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Kontent</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="kontent" placeholder="Kontent" id="content"></textarea>
                                    <small style="color: #666"><b id="alert2"> </b> <b> Max len : </b> 100 , <b>Type : </b> Alfabet </small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> &nbsp; Save</button>
                    <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> &nbsp; Cancel</button>
                </div>
            </div>
        </div>
      </div>

      <!-- Modal extra-->
      <div class="modal fade bd-example-modal-lg" id="modal_form_extra" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid #d2d6de ;border-bottom-style: dashed">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Menu Kategori</h3>
                    <small class="title-small"><b style="color: #666">Form Tambah</b></small>
                </div>
                <div class="modal-body form">
                    <form action="#" id="form_extra" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value="" name="id"/> 
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Deskripsi</label>
                                <div class="col-md-9">
                                    <input name="deskripsi1" placeholder="Deskripsi Jurusan Pertanian... " class="form-control" type="text" id="redcolor2" >
                                    <small style="color: #666"><b id="alert2"> </b> <b>Type : </b> Alfabeth </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Kontent</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="kontent2" placeholder="Kontent" id="content2"></textarea>
                                    <small style="color: #666"><b id="alert2"> </b> <b> Max len : </b> 100 , <b>Type : </b> Alfabet </small>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Deskripsi</label>
                                <div class="col-md-9">
                                    <input name="deskripsi2" placeholder="Deskripsi Jurusan Peternakan... " class="form-control" type="text" id="redcolor2" >
                                    <small style="color: #666"><b id="alert2"> </b> <b>Type : </b> Alfabeth </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Kontent</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="kontent3" placeholder="Kontent" id="content3"></textarea>
                                    <small style="color: #666"><b id="alert2"> </b> <b> Max len : </b> 100 , <b>Type : </b> Alfabet </small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="extra_save()" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> &nbsp; Save</button>
                    <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> &nbsp; Cancel</button>
                </div>
            </div>
        </div>
      </div>

      <!-- Isi Title Judul -->
      <div class="modal fade bd-example-modal-lg" id="modal_form_title" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid #d2d6de ;border-bottom-style: dashed">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Menu Kategori</h3>
                    <small class="title-small"><b style="color: #666">Form Tambah</b></small>
                </div>
                <div class="modal-body form">
                    <form action="#" id="form_title" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value="" name="id"/> 
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Title Judul</label>
                                <div class="col-md-9">
                                    <input name="title" placeholder="Title Judul ... " class="form-control" type="text" id="redcolor2" >
                                    <small style="color: #666"><b id="alert2"> </b> <b>Type : </b> Alfabeth </small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="title_save()" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> &nbsp; Save</button>
                    <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> &nbsp; Cancel</button>
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

    tinymce.init({
        selector: '#content2',
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

    tinymce.init({
        selector: '#content3',
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
$(document).ready(function(){
    $( "#page_list" ).sortable({
            placeholder : "ui-state-highlight",
            update  : function(event, ui){
                var id = new Array();
                $('#page_list li').each(function(){
                    id.push($(this).attr("id"));
                });
                $.ajax({
                    url:"<?php echo base_url()?>mod_section_management/ajax_update",
                    method:"POST",
                    data:{id:id},
                        success:function(data){
                          swal({
                            title: 'Save Data Berhasil!',
                            text : 'Klik tombol ok untuk kembali !',
                            type : 'success',
                            confirmButtonText : 'Ok',
                          }, function(){
                                  window.location.href='<?php echo base_url()?>mod_section_management';
                          }, 1000); 
                            //alert(data);
                            //window.location.href="<?php echo base_url()?>mod_section_management"
                        }
                });
            }
    });
});

function show_option() {
    $("#pilih").change(function() {
        if ($(this).val() === '1'){ 
            $('#show').show();   
        } else {
            $('#show').hide(); 
        }
    });
};

function edit(id){
    save_method = 'update';
    $('#form')[0].reset();
    $('#alert').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Pilih !!! ,</b>');
    $('#redcolor').show().css('border-color', '#d2d6de');
    $('#alert1').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
    $('#redcolor1').show().css('border-color', '#d2d6de');
    $('#alert2').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
    $('#redcolor2').show().css('border-color', '#d2d6de');
    $('.modal-title').text('Edit ');
    $('.title-small').html('<b style="color: #666">Form Edit</b>');
    $('.form-group').removeClass('has-error'); 
    $.ajax({
        url : "<?php echo site_url('mod_section_management/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id"]').val(data.page_id);
            $('[name="deskripsi"]').val(data.deskripsi).removeAttr('disabled');
            //tinyMCE.activeEditor.setContent(data.kontent);
            tinyMCE.get('content').setContent(data.kontent);
            //$('[name="deskripsi"]').val(data.deskripsi).removeAttr('disabled');
            $('[name="status_video"]').val(data.status_video);
            if(data.status_video == 1){
                $('#show').show();
                $('[name="url_video"]').val(data.video)
            }else{
                $('#show').hide();
            }
            $('[name="status_video"]').val(data.status_video);
            $('#foto').html('<img src="<?php echo base_url()?>uploads/home/'+data.foto+'" class="img-responsive" style="width: 100px">');
            $('#modal_form').modal('show'); 
            $('.modal-title').text('Edit '); 
            $('#btnSave').show();
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function extra_edit(id){
    save_method = 'update';
    $('#form')[0].reset();
    $('#alert').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Pilih !!! ,</b>');
    $('#redcolor').show().css('border-color', '#d2d6de');
    $('#alert1').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
    $('#redcolor1').show().css('border-color', '#d2d6de');
    $('#alert2').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
    $('#redcolor2').show().css('border-color', '#d2d6de');
    $('.modal-title').text('Extra Edit ');
    $('.title-small').html('<b style="color: #666">Form Edit</b>');
    $('.form-group').removeClass('has-error'); 
    $.ajax({
        url : "<?php echo site_url('mod_section_management/ajax_edit_extra')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id"]').val(data.page_id);
            $('[name="deskripsi1"]').val(data.deskripsi1).removeAttr('disabled');
            $('[name="deskripsi2"]').val(data.deskripsi2).removeAttr('disabled');
            tinyMCE.get('content2').setContent(data.kontent1);
            tinyMCE.get('content3').setContent(data.kontent2);
            //$('[name="deskripsi"]').val(data.deskripsi).removeAttr('disabled');
            //$('[name="status_video"]').val(data.status_video);
            //if(data.status_video == 1){
            //    $('#show').show();
            //    $('[name="url_video"]').val(data.video)
            //}else{
            //    $('#show').hide();
            //}
            //$('[name="status_video"]').val(data.status_video);
            //$('#foto').html('<img src="<?php echo base_url()?>uploads/home/'+data.foto+'" class="img-responsive" style="width: 100px">');
            $('#modal_form_extra').modal('show'); 
            $('.modal-title').text('Extra Edit '); 
            $('#btnSave').show();
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function title_edit(id){
    save_method = 'update';
    $('#form')[0].reset();
    $('#alert').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Pilih !!! ,</b>');
    $('#redcolor').show().css('border-color', '#d2d6de');
    $('#alert1').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
    $('#redcolor1').show().css('border-color', '#d2d6de');
    $('#alert2').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
    $('#redcolor2').show().css('border-color', '#d2d6de');
    $('.modal-title').text('Title Judul Edit ');
    $('.title-small').html('<b style="color: #666">Form Edit</b>');
    $('.form-group').removeClass('has-error'); 
    $.ajax({
        url : "<?php echo site_url('mod_section_management/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id"]').val(data.page_id);
            $('[name="title"]').val(data.page_judul_title).removeAttr('disabled');
            $('#modal_form_title').modal('show'); 
            $('.modal-title').text('Title Judul Edit '); 
            $('#btnSave').show();
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function title_save(){
    $('#btnSave').text('saving...'); 
    $('#btnSave').attr('disabled',true); 
    var url;
        url = "<?php echo site_url('mod_section_management/ajax_add_title')?>";
    
    tinyMCE.triggerSave();
    var formData = new FormData($('#form_title')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data){
            if(data.status == true) {
                $('#modal_form').modal('hide');
                    swal({
                      title: 'Save Data Berhasil!',
                      text : 'Klik tombol ok untuk kembali !',
                      type : 'success',
                      confirmButtonText : 'Ok',
                    }, function(){
                            window.location.href='<?php echo base_url()?>mod_section_management';
                    }, 1000); 
            }else{
                $('#alert').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
                $('#redcolor').show().css('border-color', '#d2d6de');
                $('#alert1').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
                $('#redcolor1').show().css('border-color', '#d2d6de');
                swal({
                  title: 'Save Data Gagal!',
                  text : 'Kode Sudah Digunakan !!',
                  type : 'error',
                  confirmButtonText : 'Ok',
                }); 
                $('#btnSave').html('<i class="fa fa-save"> </i> &nbsp; Save'); 
                $('#btnSave').attr('disabled',false);
            }
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error adding / update data');
            $('#btnSave').html('<i class="fa fa-save"> </i> &nbsp; Save'); 
            $('#btnSave').attr('disabled',false); 
        }
    });
}

function extra_save(){
    $('#btnSave').text('saving...'); 
    $('#btnSave').attr('disabled',true); 
    var url;
        url = "<?php echo site_url('mod_section_management/ajax_add_extra')?>";
    
    tinyMCE.triggerSave();
    var formData = new FormData($('#form_extra')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data){
            if(data.status == true) {
                $('#modal_form').modal('hide');
                    swal({
                      title: 'Save Data Berhasil!',
                      text : 'Klik tombol ok untuk kembali !',
                      type : 'success',
                      confirmButtonText : 'Ok',
                    }, function(){
                            window.location.href='<?php echo base_url()?>mod_section_management';
                    }, 1000); 
            }else{
                $('#alert').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
                $('#redcolor').show().css('border-color', '#d2d6de');
                $('#alert1').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
                $('#redcolor1').show().css('border-color', '#d2d6de');
                swal({
                  title: 'Save Data Gagal!',
                  text : 'Kode Sudah Digunakan !!',
                  type : 'error',
                  confirmButtonText : 'Ok',
                }); 
                $('#btnSave').html('<i class="fa fa-save"> </i> &nbsp; Save'); 
                $('#btnSave').attr('disabled',false);
            }
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error adding / update data');
            $('#btnSave').html('<i class="fa fa-save"> </i> &nbsp; Save'); 
            $('#btnSave').attr('disabled',false); 
        }
    });
}


function save(){
    $('#btnSave').text('saving...'); 
    $('#btnSave').attr('disabled',true); 
    var url;
    //if(save_method == 'add') {
    //    url = "<?php echo site_url('mod_section_management/ajax_add')?>";
    //} else {
        url = "<?php echo site_url('mod_section_management/ajax_add')?>";
    //}
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
            if(data.status == true) {
                $('#modal_form').modal('hide');
                    swal({
                      title: 'Save Data Berhasil!',
                      text : 'Klik tombol ok untuk kembali !',
                      type : 'success',
                      confirmButtonText : 'Ok',
                    }, function(){
                            window.location.href='<?php echo base_url()?>mod_section_management';
                    }, 1000); 
            }else if(data.status == 'a'){
                $('#alert').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Pilih !!! ,</b>');
                $('#redcolor').show().css('border-color', '#d2d6de');

                $('#alert1').show().html('<b style="color: red"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
                $('#redcolor1').show().css('border-color', 'red');
                
                $('#btnSave').html('<i class="fa fa-save"> </i> &nbsp; Save'); 
                $('#btnSave').attr('disabled',false); 
            }else if(data.status == 'b'){
                $('#alert').show().html('<b style="color: red"><i class="fa fa-times"> </i> Belum Ter Pilih !!! ,</b>');
                $('#redcolor').show().css('border-color', 'red');
                
                $('#alert1').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
                $('#redcolor1').show().css('border-color', '#d2d6de');
                
                $('#btnSave').html('<i class="fa fa-save"> </i> &nbsp; Save'); 
                $('#btnSave').attr('disabled',false); 
            }else if(data.status == 'n'){
                $('#alert').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
                $('#redcolor').show().css('border-color', '#d2d6de');
                $('#alert1').hide().html('<b style="color: #d2d6de"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
                $('#redcolor1').show().css('border-color', '#d2d6de');
                swal({
                  title: 'Save Data Gagal!',
                  text : 'Kode Sudah Digunakan !!',
                  type : 'error',
                  confirmButtonText : 'Ok',
                }); 
                $('#btnSave').html('<i class="fa fa-save"> </i> &nbsp; Save'); 
                $('#btnSave').attr('disabled',false);
            }else {
                $('#alert').show().html('<b style="color: red"><i class="fa fa-times"> </i> Belum Ter Pilih !!! ,</b>');
                $('#redcolor').show().css('border-color', 'red');
                
                $('#alert2').show().html('<b style="color: red"><i class="fa fa-times"> </i> Belum Ter Isi !!! ,</b>');
                $('#redcolor2').show().css('border-color', 'red');

                $('#btnSave').html('<i class="fa fa-save"> </i> &nbsp; Save'); 
                $('#btnSave').attr('disabled',false);
            }
            //$('#btnSave').text('save'); 
            //$('#btnSave').attr('disabled',false);
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error adding / update data');
            $('#btnSave').html('<i class="fa fa-save"> </i> &nbsp; Save'); 
            $('#btnSave').attr('disabled',false); 
        }
    });
}

</script>