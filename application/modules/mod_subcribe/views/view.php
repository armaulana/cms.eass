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
            <div class="box" style="border-top: 3px solid #605ca8;">
                <div class="box-header">
                    <form id="from-filter" style="padding-top: 0px; padding-right: 0px; padding-left: 0px">
                        <table class="table table-hover table-bordered" style="margin: 0px">
                            <thead>
                                <tr>
                                    <th width="5%">
                                        <div class="btn-group">
                                            <button type="button" 
                                                    class="btn btn-default btn-flat dropdown-toggle" 
                                                    data-toggle="dropdown">
                                                    <span class="fa fa-th"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a  href="javascript:void(0)" 
                                                        onclick="bulk_delete()">
                                                        <i class="glyphicon glyphicon-trash"></i> Bulk Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </th>
                                    <th width="55%">
                                        <input  type="text" 
                                                name="filter1" 
                                                class="form-control" 
                                                id="filter1" 
                                                placeholder="Cari Email ... ">
                                    </th>
                                    <th width="40%">
                                        <button type="button" 
                                                class="btn btn-primary btn-flat" 
                                                id="btn-filter">
                                                <i class="fa fa-search"></i>
                                        </button>
                                        &nbsp; | &nbsp; 
                                        <?php if($CheckAllowAccess[0]['access_add'] == 0 ){ ?> 
                                        <?php }else{ ?> 
                                        <a  href="javascript:void(0)" 
                                            onclick="add_posting()" 
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
                        <table id="table" class="table table-hover table-bordered" cellspacing="0" style="width: 100%">
                            <thead>
                                <tr>
                                    <th><center><input type="checkbox" id="check-all"></center></th>
                                    <th><i class="fa fa-envelope"></i> Email</th>
                                    <th><i class="fa fa-edit"></i> Action</th>
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
            <div class="modal-header" style="border-bottom: 1px solid #d2d6de; border-bottom-style: dashed">
                <button type="button" 
                        class="close" 
                        data-dismiss="modal" 
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">Menu Subcribe</h3>
                <small class="modal-small" style="color: #666; font-weight: bold"></small>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input  type="text" 
                                        class="form-control" 
                                        name="email" 
                                        id="colEmail" 
                                        placeholder="Email ... ">
                                        <small style="color: #666">
                                            <b id="altEmail"> </b> &nbsp; 
                                            <b> Max len : </b> 100 , 
                                            <b>Type : </b> Alfabet
                                        </small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" 
                        id="btnSave" 
                        onclick="save()" 
                        class="btn btn-primary btn-flat">
                        <i class="fa fa-save"></i> &nbsp; Save
                </button>
                <button type="button" 
                        class="btn btn-danger btn-flat" 
                        data-dismiss="modal">
                        <i class="fa fa-times"></i> &nbsp; Cancel
                </button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.min.js')?>"></script>
<script src="<?php echo base_url('assets/admin/components/tinymce/tinymce.min.js');?>"></script>
<script type="text/javascript">
var table, save_method;
$(document).ready(function(){
    table = $('#table').DataTable({ 
        "language": {
            searchPlaceholder: "Email ... "
        },
        "processing": true,
        "serverSide": true, 
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('mod_subcribe/ajax_list')?>",
            "type": "POST",
            "data": function (data) {
                data.email = $('#filter1').val();
            }
        },
        "columnDefs": [
            { 
                "width": "5%",
                "targets": 0, 
                "orderable": false, 
            },
            { 
                "width": "55%",
                "targets": 1, 
                "orderable": false, 
            },
            { 
                "width": "40%",
                "targets": 2, 
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

function add_posting(){
    save_method = 'add';
    $('#modal_form').modal('show');
    $('.modal-title').text('Add Subcribe'); 
    $('.modal-small').text('Informations'); 
    $('#btnSave').show(); 
}

function detail_posting(id){
    $('#modal_form').modal('show'); 
    $('.modal-title').text('Detail Subcribe'); 
    $('.modal-small').text('Informations'); 
    $('#btnSave').hide();
    $('#colEmail').show().css('border-color', '#d2d6de');
    $('#altEmail').hide();
    $.ajax({
        url : "<?php echo site_url('mod_subcribe/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id"]').val(data.id);
            $('[name="email"]').val(data.email).attr('disabled', 'disabled');
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function edit_posting(id){
    save_method = 'update';
    $('#modal_form').modal('show'); 
    $('.modal-title').text('Edit Subcribe'); 
    $('.modal-small').text('Informations'); 
    $('#btnSave').show();
    $('#colSubcribe').show().css('border-color', '#d2d6de');
    $('#altSubcribe').hide();
    $.ajax({
        url : "<?php echo site_url('mod_subcribe/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id"]').val(data.id);
            $('[name="email"]').val(data.email).removeAttr('disabled', 'disabled'); 
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function save(){
    var url;
    if(save_method == 'add') {
        url = "<?php echo site_url('mod_subcribe/ajax_add')?>";
    }else {
        url = "<?php echo site_url('mod_subcribe/ajax_update')?>";
    }
    $("#colEmail").css('border-color', '#d2d6de');
    $("#altEmail").html('<small><b style="color: #008d4c"><i class="fa fa-check"> </i> Terisi </b></small>');
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
                $("#colEmail").show().css('border-color', data.error.colEmail); 
                $("#altEmail").show().html(data.error.email);
            }else{
                swal({
                        title: 'Berhasil',
                        text : 'Klik Tombol OK Untuk Kembali!',
                        type : 'success',
                        confirmButtonText : 'Ok',
                    }, function(){
                            window.location.href='<?php echo base_url('mod_subcribe')?>';
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
            url : "<?php echo site_url('mod_subcribe/ajax_delete')?>/"+id,
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
        if(confirm('Are you sure delete this '+list_id.length+' data?')){
            $.ajax({
                type: "POST",
                data: {id:list_id},
                url: "<?php echo site_url('mod_subcribe/ajax_bulk_delete')?>",
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