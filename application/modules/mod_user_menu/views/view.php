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
                <div class="box-header">
                  <form id="from-filter" style="padding-top: 0px; padding-right: 0px; padding-left: 0px">
                        <table class="table table-hover table-bordered" style="margin: 0px">
                        <thead>
                                <tr>
                                    <th width="5%">
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                            <span class="fa fa-th"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <!--<li><a href="javascript:void(0)" onclick="bulk_delete()"><i class="glyphicon glyphicon-trash"></i> Bulk Delete</a></li>
                                            <li class="divider"></li> -->
                                            <li><a href=""><i class="fa fa-database"></i> Export Data</a></li>
                                        </ul>
                                        </div>
                                    </th>
                                    <th width="337px">
                                        <input type="text" name="filter1" class="form-control" id="filter1" placeholder="Nama Menu ... ">
                                    </th>
                                    <th width="351px">
                                        <input type="text" name="filter2" class="form-control" id="filter2" placeholder="Link ... ">
                                    </th>
                                    <th width="240px">
                                        <button type="button" id="btn-filter" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
                                        &nbsp; | &nbsp; 
                                        <?php if($check_allow_access[0]['access_add'] == 0){ ?> <?php }else{ ?> <a href="javascript:void(0)" onclick="add_posting()" class="btn btn-success btn-flat "><i class="glyphicon glyphicon-plus"></i> Add Menu</a> <?php } ?>
                                        <button class="btn btn-default btn-flat" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> </button>
                                    </th>
                                </tr>
                        </thead>
                        </table>
                  </form>
                </div>
            <hr style="margin-top: 0px; margin-bottom: 0px; border: 1px solid #dedede; border-style: dashed;">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-sm-12" style="padding-top: 0px; padding-right: 0px; padding-left: 0px">
                    <table id="table" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="5%">Icon</th>
                                <th>Nama Menu</th>
                                <th>Link</th>
                                <th width="90px">Urutan</th>
                                <th width="220px">Action</th>
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
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Menu Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_main"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Menu</label>
                            <div class="col-md-9">
                                <input name="nama_menu" placeholder="Nama Menu" class="form-control" type="text">
                                <small style="color: #737373"><b>Type : </b> Alfabeth</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Urutan</label>
                            <div class="col-md-9">
                                <input name="urutan" placeholder="Urutan" class="form-control" type="text">
                                <small style="color: #737373"><b>Type : </b> Number</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Link</label>
                            <div class="col-md-9">
                                <input name="link" placeholder="Link" class="form-control" type="text">
                                <small style="color: #737373"><b>Contoh : </b> <?php echo base_url()?>mod_... , <b>Type : </b> Alfabeth</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Icon </label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-clone" value="fa-clone" >
                                            <i class="fa fa-clone"></i>&nbsp; fa-clone
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-genderless" value="fa-genderless" >
                                            <i class="fa fa-genderless"></i>&nbsp; fa-genderless
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-sticky-note" value="fa-sticky-note" >
                                            <i class="fa  fa-sticky-note"></i>&nbsp; fa-sticky-note
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-bars" value="fa-bars" >
                                            <i class="fa fa-bars"></i>&nbsp; fa-bars
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-bars" value="fa-bookmark" >
                                            <i class="fa fa-bookmark"></i>&nbsp; fa-bookmark
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-calendar" value="fa-calendar" >
                                            <i class="fa fa-calendar"></i>&nbsp; fa-calendar
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-cogs" value="fa-cogs" >
                                            <i class="fa fa-cogs"></i>&nbsp; fa-cogs
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-file-image-o" value="fa-file-image-o" >
                                            <i class="fa fa-file-image-o"></i>&nbsp; fa-file-image-o
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-newspaper-o" value="fa-newspaper-o" >
                                            <i class="fa fa-newspaper-o"></i>&nbsp; fa-newspaper
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-user" value="fa-user" >
                                            <i class="fa fa-user"></i>&nbsp; fa-user
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-sticky-note-o" value="fa-sticky-note-o" >
                                            <i class="fa fa-sticky-note-o"></i>&nbsp; fa-sticky-note-o
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-area-chart" value="fa-area-chart" >
                                            <i class="fa fa-area-chart"></i>&nbsp; fa-area-chart
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-refresh" value="fa-refresh" >
                                            <i class="fa fa-refresh"></i>&nbsp;  fa-refresh
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-book" value="fa-book" >
                                            <i class="fa fa-book"></i>&nbsp;  fa-book
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-bookmark-o" value="fa-bookmark-o" >
                                            <i class="fa fa-bookmark-o"></i>&nbsp;  fa-bookmark-o
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-cloud-download" value="fa-cloud-download" >
                                            <i class="fa fa-cloud-download"></i>&nbsp;  fa-cloud-download
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-envelope" value="fa-envelope" >
                                            <i class="fa fa-envelope"></i>&nbsp;  fa-envelope
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-group" value="fa-group" >
                                            <i class="fa fa-group"></i>&nbsp;  fa-group
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-search" value="fa-search" >
                                            <i class="fa fa-search"></i>&nbsp;  fa-search
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="icon" id="fa-exchange" value="fa-exchange" >
                                            <i class="fa fa-exchange"></i>&nbsp;  fa-exchange
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-flat btn-primary">Save</button>
                <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url()?>themes/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>themes/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
var table, save_method;
$(document).ready(function(){
    table = $('#table').DataTable({ 
        "processing": true,
        "serverSide": true, 
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('mod_user_menu/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.nama_menu = $('#filter1').val();
                data.link = $('#filter2').val();
            }
        },

        "columnDefs": [{ 
            "targets": [ 0,1,2,3,4,5 ], 
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
    //check all
    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
    });
});

function reload_table(){
    table.ajax.reload(null,false);
}

function add_posting(){
    save_method = 'add';
    $('#form')[0].reset(); 
    $('#modal_form').modal('show');
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty(); 
    $('.modal-title').text('Add Menu'); 
}

function detail_posting(id){

    $.ajax({
        url : "<?php echo site_url('mod_user_menu/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id_main"]').val(data.id_main).attr('disabled', 'disabled');
            $('[name="nama_menu"]').val(data.nama_menu).attr('disabled', 'disabled');
            $('[name="urutan"]').val(data.urutan).attr('disabled', 'disabled');
            $('[name="link"]').val(data.link).attr('disabled', 'disabled');
            $( '#'+data.icon+'').prop( "checked", true );
            $('#modal_form').modal('show'); 
            $('.modal-title').text('Detail Menu'); 
            $('#btnSave').hide();
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function edit_posting(id){
    save_method = 'update';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty(); 
    $.ajax({
        url : "<?php echo site_url('mod_user_menu/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id_main"]').val(data.id_main);
            $('[name="nama_menu"]').val(data.nama_menu);
            $('[name="urutan"]').val(data.urutan);
            $('[name="link"]').val(data.link);
            $( '#'+data.icon+'').prop( "checked", true );
            $('#modal_form').modal('show'); 
            $('.modal-title').text('Edit Menu'); 
            $('#btnSave').show();
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function save(){
    $('#btnSave').text('saving...'); 
    $('#btnSave').attr('disabled',true); 
    var url;
    if(save_method == 'add') {
        url = "<?php echo site_url('mod_user_menu/ajax_add')?>";
    } else {
        url = "<?php echo site_url('mod_user_menu/ajax_update')?>";
    }
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status) {
                $('#modal_form').modal('hide');
                //reload_table();
                swal({
                      title: 'Save Data Berhasil!',
                      text : 'Klik tombol kembali ke halaman menu !',
                      type : 'success',
                      confirmButtonText : 'Ok',
                    }, function(){
                            window.location.href='<?php echo base_url()?>mod_user_menu';
                }, 1000); 
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

function delete_posting(id){
    if(confirm('Are you sure delete this data?')){
        $.ajax({
            url : "<?php echo site_url('mod_user_menu/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                $('#modal_form').modal('hide');
                //reload_table();
                swal({
                      title: 'Save Data Berhasil!',
                      text : 'Klik tombol kembali ke halaman menu !',
                      type : 'success',
                      confirmButtonText : 'Ok',
                    }, function(){
                            window.location.href='<?php echo base_url()?>mod_user_menu';
                }, 1000); 
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error deleting data');
            }
        });
    }
}
</script>
