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
                                                placeholder="Album Name ... ">
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
                                    <th ><i class="fa fa-image"></i>&nbsp; Nama Album</th>
                                    <th ><i class="fa fa-plus-square"></i>&nbsp; Total</th>
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
    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid #d2d6de ;border-bottom-style: dashed">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title">Menu Kategori</h3>
                    <small class="title-small"><b style="color: #666">Form Tambah</b></small>
                </div>
                <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value="" name="id"/> 
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama Album </label>
                                <div class="col-md-9">
                                    <select name="id_album" class="form-control" id="colId_album">
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($album as $key) { ?>
                                                <option value="<?php echo $key->id; ?>">
                                                    <?php echo $key->nama_album; ?>        
                                                </option>
                                        <?php } ?>
                                    </select>
                                    <small style="color: #666">
                                        <b id="id_album"></b>  
                                        <b>Type : </b> Select 
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">File</label>
                                <div class="col-md-9">
                                    <input type="file" name="berkas[]">
                                    <small style="color: #666"> 
                                        <b>Type : </b> .jpg | .png  &nbsp; 
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="file" name="berkas[]">
                                    <small style="color: #666"> 
                                        <b>Type : </b> .jpg | .png  &nbsp; 
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
                        <h3 class="modal-title">Menu Kategori</h3>
                        <small class="title-small"><b style="color: #666">Form Tambah</b></small>
                    </div>
                    <div class="modal-body form">
                        <ul class="mailbox-attachments clearfix">
                            <div id="detail_foto"></div>
                        <ul>
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
<script type="text/javascript">
var table, save_method;
$(document).ready(function(){
    table = $('#table').DataTable({ 
        "language": {
            searchPlaceholder: "Album Name ... "
        },
        "processing": true,
        "serverSide": true, 
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('mod_album/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.nama_album = $('#filter1').val();
            }
        },
        "columnDefs": [
            { 
                "width": "5%",
                "targets": 0, 
                "orderable": false, 
            },
            { 
                "width": "40%",
                "targets": 1, 
                "orderable": false, 
            },
            { 
                "width": "15%",
                "targets": 2, 
                "orderable": false, 
            },
            { 
                "width": "40%",
                "targets": 3, 
                "orderable": false, 
            }
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
    $('.modal-title').text('Add Foto'); 
    $('.title-small').html('<b style="color: #666">File</b>');
    $('[name="id_album"]').removeAttr('readonly','readonly');
    $('#btnSave').show();
}

function detail_posting(id){
    $('#modal_form_detail').modal('show'); 
    $('#form')[0].reset();
    $('.modal-title').text('Detail');
    $('.title-small').html('<b style="color: #666">Informasi</b>');
    $('#btnSave').hide();
    $.ajax({
        url : "<?php echo site_url('mod_album/ajax_detail')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id"]').val(data.id);
            $('#detail_foto').html(data.detail_foto);
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function edit_posting(id){
    save_method = 'update';
    $('#modal_form').modal('show');
    $('.modal-title').text('Edit');
    $('.title-small').html('<b style="color: #666">Informasi</b>');
    $('#colId_album').css('border-color', '#d2d6de');
    $('#id_album').hide();
    $('#btnSave').show();
    $.ajax({
        url : "<?php echo site_url('mod_album/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){ 
            $('[name="id_album"]').val(data.id_album).removeAttr('readonly', 'readonly');
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function save(){
    var url;
        url = "<?php echo site_url('mod_album/ajax_add')?>";
    $("#colId_album").css('border-color', '#d2d6de');
    $("#id_album").html('<small><b style="color: #008d4c"><i class="fa fa-check"></i>Terisi</b></small>');
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
                $("#colId_album").show().css('border-color', data.error.colId_album); 
                $("#id_album").show().html(data.error.id_album);
            }else {
                swal({
                    title: 'Berhasil',
                    text : 'Klik Tombol OK Untuk Kembali!',
                    type : 'success',
                    confirmButtonText    : 'Ok',
                }, function(){   
                        window.location.href='<?php echo base_url('mod_album');?>';
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

function delete_foto(id){
    if(confirm('Are you sure delete this data ?')){
        $.ajax({
            url : "<?php echo site_url('mod_album/ajax_delete_foto')?>/"+id,
            type : "POST",
            dataType : "JSON",
            success: function(data){
                if(data.status == true){
                    swal({
                        title: 'Berhasil',
                        text : 'Klik Tombol OK Untuk Kembali!',
                        type : 'success',
                        confirmButtonText    : 'Ok',
                    }, function(){   
                            window.location.href='<?php echo base_url('mod_album');?>';
                    }, 1000);
                }else{
                    alert('Failed');
                }
            },
            error : function (jsXHR, textStatus, errorThrown){
                alert('Error deleting data');
            } 
        });
    }
}

function delete_posting(id){
    if(confirm('Are you sure delete this data?')){
        $.ajax({
            url : "<?php echo site_url('mod_album/ajax_delete')?>/"+id,
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
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    if(list_id.length > 0){
        if(confirm('Are you sure delete this '+list_id.length+' data ?')){
            $.ajax({
                type: "POST",
                data: {id:list_id},
                url: "<?php echo site_url('mod_album/ajax_bulk_delete')?>",
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