<link rel="stylesheet" href="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.css')?>">
<section class="content-header">
    <h1>
        <?php echo $title;?>
        <small>Datas</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#"><i class="fa fa-dashboard"></i>Home</a>
        </li>
        <li class="active">
            <?php echo $title; ?>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box" style="border-top: 3px solid #605ca8">
                <div class="box-header">
                    <form id="from-filter" style="padding-top: 0px; padding-right: 0px; padding-left: 0px">
                        <table class="table table-hover table-bordered" style="margin: 0px">
                        <thead>
                                <tr>
                                    <th width="5%">
                                        <div class="btn-group">
                                          <button   type="button" 
                                                    class="btn btn-default btn-flat dropdown-toggle" 
                                                    data-toggle="dropdown">
                                            <span class="fa fa-th"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="javascript:void(0)" onclick="bulk_delete()">
                                                    <i class="glyphicon glyphicon-trash"></i> Bulk Delete
                                                </a>
                                            </li>
                                          </ul>
                                        </div>
                                    </th>
                                    <th width="55%">
                                        <input  type="text" 
                                                name="filter2" 
                                                class="form-control" 
                                                id="filter1" 
                                                placeholder="Title ... ">
                                    </th>
                                    <th width="40%">
                                        <button type="button" 
                                                id="btn-filter" 
                                                class="btn btn-primary btn-flat">
                                                <i class="fa fa-search"></i>
                                        </button>
                                        &nbsp; | &nbsp; 
                                         <?php if($CheckAllowAccess[0]['access_add'] == 0 ){ ?> 
                                         <?php }else{ ?>  
                                         <a href="javascript:void(0)" onclick="add_kategori()" 
                                            class="btn btn-success btn-flat">
                                            <i class="glyphicon glyphicon-plus"></i> Add 
                                        </a> 
                                        <?php }?> 
                                        <button class="btn btn-default btn-flat" 
                                                id="btn-reset">
                                                <i class="glyphicon glyphicon-refresh"></i>
                                        </button>
                                    </th>
                                </tr>
                        </thead>
                        </table>
                    </form>
                </div>
                <hr/ style="margin-top: 0px; margin-bottom: 0px; border: 1px solid #dedede; border-style: dashed;">
                <div class="box-body">
                    <div class="col-sm-12" style="padding-top: 0px; padding-right: 0px; padding-left: 0px">
                        <table id="table" class="table table-hover table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th ><center><input type="checkbox" id="check-all"></center></th>
                                    <th ><i class="fa fa-pencil-square-o"></i>&nbsp; Informations</th>
                                    <th ><i class="fa fa-clock-o"></i>&nbsp; Date Time</th>
                                    <th ><center><i class="fa fa-external-link"></i></center></th>
                                    <th ><i class="fa fa-edit"></i>&nbsp; Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <div class="modal fade bd-example-modal-lg" id="modal_form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid #d2d6de ;border-bottom-style: dashed">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title"></h3>
                    <small class="title-small"><b style="color: #666">Form Add</b></small>
                </div>
                <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value="" name="id"/> 
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Category</label>
                                <div class="col-md-9">
                                    <select name="id_kategori" class="form-control" id="colFormInput1">
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($kategori as $key) { ?>
                                                <option value="<?php echo $key->id; ?>"><?php echo $key->nm_kat; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small style="color: #666">
                                        <b id="altFormInput1"></b>
                                        <b>Type : </b> Select 
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Judul </label>
                                <div class="col-md-9">
                                    <input  type="text" 
                                            name="judul" 
                                            class="form-control" 
                                            placeholder="Judul  ... " 
                                            id="colFormInput2" >
                                    <small style="color: #666">
                                        <b id="altFormInput2"> </b> 
                                        <b>Type : </b> Alfabeth 
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Deskripsi</label>
                                <div class="col-md-9">
                                    <input  type="text" 
                                            name="deskripsi" 
                                            class="form-control"  
                                            id="colFormInput3" 
                                            placeholder="Deskripsi ... ">
                                    <small style="color: #666">
                                        <b id="altFormInput3"> </b> 
                                        <b>Type : </b> Alfabeth 
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal Posting</label>
                                <div class="col-md-9">
                                    <input  type="text" 
                                            name="tanggal_posting" 
                                            class="form-control"  
                                            id="datepicker2"
                                            placeholder="Tanggal Posting ... ">
                                    <small style="color: #666">
                                        <b id="altFormInput4"> </b> 
                                        <b>Type : </b> Date 
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Jam</label>
                                <div class="col-md-9">
                                    <div class="bootstrap-timepicker">
                                        <div class="input-group">
                                            <input  type="text" 
                                                    name="jam" 
                                                    class="form-control timepicker"
                                                    id="colFormInput5"
                                                    placeholder="Jam ... ">
                                            <small style="color: #666">
                                                <b id="altFormInput5"></b> 
                                                <b>Type : </b> Number 
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-9">
                                    <select name="status" class="form-control" id="colFormInput6">
                                    <?php $value = array('1' => 'Aktif', '0' => 'Tidak'); ?>
                                    <?php foreach($value as $key => $x_val){ ?>
                                                <option value="<?php echo $key; ?>">
                                                    <?php echo $x_val?>        
                                                </option>
                                    <?php } ?>
                                    </select>
                                    <small style="color: #666">
                                        <b id="altFormInput6"></b>
                                        <b>Type : </b> Select 
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Kontent</label>
                                <div class="col-md-9">
                                    <textarea   class="form-control" 
                                                name="kontent" 
                                                id="content"
                                                placeholder="Kontent">
                                    </textarea>
                                    <small style="color: #666">
                                        <b id="altFormInput7"> </b> 
                                        <b>Type : </b> Alfabet 
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tampilkan Slider</label>
                                <div class="col-md-9">
                                    <select name="slider" class="form-control" id="colFormInput8">
                                    <?php $value = array('1' => 'Ya', '0' => 'Tidak'); ?>
                                    <?php foreach($value as $key => $x_val){ ?>
                                                <option value="<?php echo $key; ?>"><?php echo $x_val?></option>
                                    <?php } ?>
                                    </select>
                                    <small style="color: #666">
                                        <b id="altFormInput8"></b>
                                        <b>Type : </b> Select 
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">File</label>
                                <div class="col-md-9">
                                    <div id="foto"></div>
                                    <br/>
                                    <input type="file" name="poto">
                                    <small style="color: #666"> 
                                        <b>Type : </b> .jpg | .png  &nbsp; 
                                        <b id="alert-foto"> </b>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary btn-flat">
                        <i class="fa fa-save"></i> &nbsp; Save
                    </button>
                    <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">
                        <i class="fa fa-times"></i> &nbsp; Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal detail-->
    <div class="modal fade bd-example-modal-lg" id="modal_form_detail" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom: 1px solid #d2d6de ;border-bottom-style: dashed">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title"></h3>
                        <small class="title-small"><b style="color: #666"></b></small>
                    </div>
                    <div class="modal-body form">
                        <form action="#" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="id" value=""/> 
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Kategori</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="id_kategori">
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($kategori as $key) { ?>
                                                    <option value="<?php echo $key->id; ?>">
                                                        <?php echo $key->nm_kat; ?>        
                                                    </option>
                                            <?php } ?>
                                        </select>
                                        <small style="color: #666">
                                            <b>Type : </b> Select 
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Judul </label>
                                    <div class="col-md-9">
                                        <input  type="text" 
                                                name="judul" 
                                                class="form-control" 
                                                placeholder="Judul  ... ">
                                        <small style="color: #666">
                                            <b>Type : </b> Alfabeth 
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Deskripsi</label>
                                    <div class="col-md-9">
                                        <input  type="text"
                                                name="deskripsi" 
                                                class="form-control" 
                                                placeholder="Deskripsi ... ">
                                        <small style="color: #666">
                                            <b>Type : </b> Alfabeth 
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Posting</label>
                                    <div class="col-md-9">
                                        <input  type="text" 
                                                name="tanggal_posting" 
                                                class="form-control" 
                                                placeholder="Tanggal Posting ... ">
                                        <small style="color: #666">
                                            <b>Type : </b> Date 
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jam</label>
                                    <div class="col-md-9">
                                        <div class="bootstrap-timepicker">
                                            <div class="input-group">
                                                <input  type="text" 
                                                        name="jam" 
                                                        class="form-control timepicker" 
                                                        placeholder="Jam ... ">
                                                <small style="color: #666">
                                                    <b>Type : </b> Time
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <select name="status" class="form-control" >
                                        <?php $value = array('1' => 'Aktif', '0' => 'Tidak'); ?>
                                        <?php foreach($value as $key => $x_val){ ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $x_val?>        
                                                    </option>
                                        <?php } ?>
                                        </select>
                                        <small style="color: #666">
                                            <b>Type : </b> Select 
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">File</label>
                                    <div class="col-md-9">
                                        <div id="foto_detail"></div>
                                        <small style="color: #666">
                                            <b>Type : </b> .jpg | .png  
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">
                            <i class="fa fa-times"></i> &nbsp; Cancel
                        </button>
                    </div>
                </div>
            </div>
    </div>

<script src="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/components/tinymce/tinymce.min.js');?>"></script>
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
        convert_urls: false,  
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: '| responsivefilemanager | print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        external_filemanager_path:"<?php echo base_url()?>assets/admin/components/responsive_filemanager/filemanager/",
        filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : "<?php echo base_url()?>assets/admin/components/responsive_filemanager/filemanager/plugin.min.js"}
    });
</script>

<script type="text/javascript">
var table, save_method;
$(document).ready(function(){
    table = $('#table').DataTable({ 
        "language": {
            searchPlaceholder: "Title ... "
        },
        "processing": true,
        "serverSide": true, 
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('mod_posting/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.judul = $('#filter1').val();
            }
        },
        "columnDefs": [
            { 
                "width": "5%",
                "targets": 0, 
                "orderable": false, 
            },
            { 
                "width": "45%",
                "targets": 1, 
                "orderable": false, 
            },
            { 
                "width": "10%",
                "targets": 2, 
                "orderable": false, 
            },
            { 
                "width": "5%",
                "targets": 3, 
                "orderable": false, 
            },
            { 
                "width": "35%",
                "targets": 4, 
                "orderable": false, 
            },
        ],
    });
    $('#btn-filter').click(function(){ 
        table.ajax.reload();
    });
    $('#btn-reset').click(function(){ 
        $('#form-filter')[0].reset();
        table.ajax.reload(); 
    });
    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
    });
});

function reload_table(){
    table.ajax.reload(null,false);
}

function add_kategori(){
    save_method = 'add';
    $('#form')[0].reset(); 
    $('#modal_form').modal('show');
    $('.modal-title').text('Add Entries'); 
    $('.title-small').html('<b style="color: #666">Informations</b>');
    $('[name="id_kategori"]').removeAttr('readonly','readonly');
    $('[name="judul"]').removeAttr('readonly','readonly');
    $('[name="deskripsi"]').removeAttr('readonly','readonly');
    $('[name="tanggal_posting"]').removeAttr('readonly','readonly');
    $('[name="jam"]').removeAttr('readonly', 'readonly');
    $('[name="status"]').removeAttr('readonly','readonly');
    $('#btnSave').show();
}

function detail_posting(id){
    $('#modal_form_detail').modal('show'); 
    $('#form')[0].reset();
    $('.modal-title').text('Detail Entries');
    $('.title-small').html('<b style="color: #666">Informations</b>');
    $('#btnSave').hide();
    $.ajax({
        url : "<?php echo site_url('mod_posting/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id"]').val(data.id);
            $('[name="id_kategori"]').val(data.id_kat).attr('readonly', 'readonly');
            $('[name="judul"]').val(data.judul).attr('readonly', 'readonly');
            $('[name="deskripsi"]').val(data.deskripsi).attr('readonly', 'readonly');
            $('[name="kontent"]').hide();
            $('[name="status"]').val(data.status).attr('readonly', 'readonly');
            $('[name="slider"]').val(data.slider).attr('readonly', 'readonly');
            $('[name="tanggal_posting"]').val(data.tanggal_posting).attr('readonly', 'readonly');
            $('[name="jam"]').val(data.jam).attr('readonly', 'readonly');
            if(data.foto == '' || data.foto == null){
                $('#foto_detail').html('<img src="<?php echo base_url()?>themes/no-image.png" class="img-responsive" style="width: 100px">');
            }else{
                $('#foto_detail').html('<img src="<?php echo base_url()?>uploads/entries/'+data.foto+'" class="img-responsive" style="width: 100px">');
            }
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function edit_posting(id){
    save_method = 'update';
    $('#modal_form').modal('show');
    $('.modal-title').text('Edit Entries');
    $('.title-small').html('<b style="color: #666">Informations</b>');
    $('#colFormInput1').css('border-color', '#d2d6de');
    $('#altFormInput1').hide();
    $('#colFormInput2').css('border-color', '#d2d6de');
    $('#altFormInput2').hide();
    $('#colFormInput3').css('border-color', '#d2d6de');
    $('#altFormInput3').hide();
    $('#datepicker2').css('border-color', '#d2d6de');
    $('#altFormInput4').hide();
    $('#colFormInput5').css('border-color', '#d2d6de');
    $('#altFormInput5').hide();
    $('#colFormInput6').css('border-color', '#d2d6de');
    $('#altFormInput6').hide();
    $('#altFormInput7').hide();
    $('#colFormInput8').css('border-color', '#d2d6de');
    $('#altFormInput8').hide();
    $('#btnSave').show();
    $.ajax({
        url : "<?php echo site_url('mod_posting/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){ 
            $('[name="id"]').val(data.id);
            $('[name="id_kategori"]').val(data.id_kat).removeAttr('readonly', 'readonly');
            $('[name="judul"]').val(data.judul).removeAttr('readonly', 'readonly');
            $('[name="deskripsi"]').val(data.deskripsi).removeAttr('readonly', 'readonly');
            $('[name="tanggal_posting"]').val(data.tanggal_posting).removeAttr('readonly', 'readonly');
            $('[name="jam"]').val(data.jam).removeAttr('readonly', 'readonly');
            $('[name="status"]').val(data.status).removeAttr('readonly', 'readonly');
            $('[name="deskripsi"]').val(data.deskripsi).removeAttr('readonly', 'readonly');
            $('[name="slider"]').val(data.slider).removeAttr('readonly', 'readonly');
            tinyMCE.activeEditor.setContent(data.kontent);
            if(data.foto == '' || data.foto == null){
                $('#foto').html('<img src="<?php echo base_url()?>themes/no-image.png" class="img-responsive" style="width: 100px">');
            }else{
                $('#foto').html('<img src="<?php echo base_url()?>uploads/entries/'+data.foto+'" class="img-responsive" style="width: 100px">');
            }
            $('[name="status"]').val(data.status).removeAttr('readonly', 'readonly');
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function save(){
    var url;
    if(save_method == 'add') {
        url = "<?php echo site_url('mod_posting/ajax_add')?>";
    } else {
        url = "<?php echo site_url('mod_posting/ajax_update')?>";
    }
    $("#colFormInput1").css('border-color', '#d2d6de');
    $("#altFormInput1").html('<small><b style="color: #008d4c"><i class="fa fa-check"></i>Terisi</b></small>');
    $("#colFormInput2").css('border-color', '#d2d6de');
    $("#altFormInput2").html('<small><b style="color: #008d4c"><i class="fa fa-check"></i>Terisi</b></small>');
    $("#colFormInput3").css('border-color', '#d2d6de');
    $("#altFormInput3").html('<small><b style="color: #008d4c"><i class="fa fa-check"></i>Terisi</b></small>');
    $("#datepicker2").css('border-color', '#d2d6de');
    $("#altFormInput4").html('<small><b style="color: #008d4c"><i class="fa fa-check"></i>Terisi</b></small>');
    $("#colFormInput5").css('border-color', '#d2d6de');
    $("#altFormInput5").html('<small><b style="color: #008d4c"><i class="fa fa-check"></i>Terisi</b></small>');
    $("#colFormInput6").css('border-color', '#d2d6de');
    $("#altFormInput6").html('<small><b style="color: #008d4c"><i class="fa fa-check"></i>Terisi </b></small>');
    $("#altFormInput7").html('<small><b style="color: #008d4c"><i class="fa fa-check"></i>Terisi </b></small>');
    $("#colFormInput8").css('border-color', '#d2d6de');
    $("#altFormInput8").html('<small><b style="color: #008d4c"><i class="fa fa-check"></i>Terisi</b></small>');
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
            if (data.status !== true) {
                $("#colFormInput1").show().css('border-color', data.error.colId_kategori); 
                $("#altFormInput1").show().html(data.error.id_kategori);
                $("#colFormInput2").show().css('border-color', data.error.colJudul); 
                $("#altFormInput2").show().html(data.error.judul);
                $("#colFormInput3").show().css('border-color', data.error.colDeskripsi);
                $("#altFormInput3").show().html(data.error.deskripsi);
                $("#datepicker2").show().css('border-color', data.error.datepicker2);
                $("#altFormInput4").show().html(data.error.tanggal_posting);
                $("#colFormInput5").show().css('border-color', data.error.colJam);
                $("#altFormInput5").show().html(data.error.jam);
                $("#colFormInput6").show().css('border-color', data.error.colStatus);
                $("#altFormInput6").show().html(data.error.status);
                $("#altFormInput7").show().html(data.error.kontent);
                $("#colFormInput8").show().css('border-color', data.error.colSlider);
                $("#altFormInput8").show().html(data.error.slider);
            }else {
                swal({
                    title: 'Berhasil',
                    text : 'Klik Tombol OK Untuk Kembali!',
                    type : 'success',
                    confirmButtonText    : 'Ok',
                }, function(){   
                        window.location.href='<?php echo base_url('mod_posting');?>';
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

function delete_posting(id){
    if(confirm('Are you sure delete this data?')){
        $.ajax({
            url : "<?php echo site_url('mod_posting/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error deleting data');
            }
        });
    }
}

function bulk_delete(){
    var list_id = [];
    $(".data-check:checked").each(function(){
            list_id.push(this.value);
    });
    if(list_id.length > 0){
        if(confirm('Are you sure delete this '+list_id.length+' data ? ')){
            $.ajax({
                type: "POST",
                data: {id:list_id},
                url: "<?php echo site_url('mod_posting/ajax_bulk_delete')?>",
                dataType: "JSON",
                success: function(data){
                    if(data.status){
                        reload_table();
                    }else{
                        alert('Failed.');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }else{
        alert('no data selected');
    }
}
</script>