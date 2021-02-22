    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title;?>
        <small>List Data</small>
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
                                <input type="text" name="filter1" class="form-control" id="filter1" placeholder="Nama Sub Menu ... ">
                            </th>
                            <th width="351px">
                                <input type="text" name="filter2" class="form-control" id="filter2" placeholder="Link ... ">
                            </th>
                            <th width="">
                                <button type="button" id="btn-filter" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
                                &nbsp; | &nbsp; 
                                <?php if($check_allow_access[0]['access_add'] == 0){ ?> <?php }else{ ?> <a href="javascript:void(0)" onclick="add_posting()" class="btn btn-success btn-flat "><i class="glyphicon glyphicon-plus"></i> Tambah </a> <?php } ?>
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
                                <th>Main Menu</th>
                                <th>Sub Menu</th>
                                <th>Link</th>
                                <th width="20px">Main</th>
                                <th width="20px">Sub</th>
                                <th width="5%"><button class="btn btn-default btn-xs"><i class='fa fa-external-link'> </i></button></th>
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
                <small style="color: #737373"><b>Form Input</b></small>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_sub"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Menu</label>
                            <div class="col-md-9">
                                <input name="nama_sub" placeholder="Nama Menu" class="form-control" type="text" required="">
                                <small style="color: #737373"><b >Input Nama Menu Max Length : </b> 100.</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Link Sub</label>
                            <div class="col-md-9">
                                <input name="link_sub" placeholder="Link Submenu" class="form-control" type="text">
                                <small style="color: #737373"><b >Input Link Sub Max Length : </b> 100.</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Urutan</label>
                            <div class="col-md-9">
                                <input name="urutan" placeholder="Urutan" class="form-control" type="text">
                                <small style="color: #737373"><b >Input urutan max Length : </b> 100. | catatan : Urutan dalam menu </small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Main Menu</label>
                            <div class="col-md-9">
                                <select name="id_main" class="form-control" style="width: 100%;">
                                  <?php foreach ($menu_utama as $key) { ?>
                                            <option value="<?php echo $key->id_main ?>"><?php echo $key->nama_menu; ?></option>
                                  <?php } ?>
                                </select>
                                <small style="color: #737373"><b >Catatan : </b> Pilih main menu yang akan di isi sub menu</small>
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

<script type="text/javascript">
var table, save_method;
$(document).ready(function(){
    table = $('#table').DataTable({ 
        "processing": true,
        "serverSide": true, 
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('mod_submenu/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.nama_sub = $('#filter1').val();
                data.link_sub = $('#filter2').val();
            }
        },

        "columnDefs": [{ 
            "targets": [ 0,1,2,3,4,5,6,7 ], 
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

function edit_posting(id){
    save_method = 'update';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty(); 
    $.ajax({
        url : "<?php echo site_url('mod_submenu/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id_sub"]').val(data.id_sub);
            $('[name="id_main"]').val(data.id_main);
            $('[name="nama_sub"]').val(data.nama_sub);
            $('[name="link_sub"]').val(data.link_sub);
            $('[name="urutan"]').val(data.urutan);
            $('[name="aktif"]').val(data.aktif);
            $('[name="adminmenu"]').val(data.adminsubmenu);
            $('#modal_form').modal('show'); 
            $('.modal-title').text('Edit Menu'); 
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
        url = "<?php echo site_url('mod_submenu/ajax_add')?>";
    } else {
        url = "<?php echo site_url('mod_submenu/ajax_update')?>";
    }
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status) {
                $('#modal_form').modal('hide');
                reload_table();
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
            url : "<?php echo site_url('mod_submenu/ajax_delete')?>/"+id,
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
</script>