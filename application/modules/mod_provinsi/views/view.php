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
                      <div class="row pull-right" style="margin-top: 12px">
                        <?php if($CheckAllowAccess[0]['access_add'] == 0){ ?> 
                        <?php }else{ ?> 
                        <a  href="javascript:void(0)" 
                            class="btn btn-success btn-flat"
                            onclick="add_posting()">
                            <i class="glyphicon glyphicon-plus"></i> Add 
                        </a> 
                        <?php } ?>
                        <button class="btn btn-default btn-flat" onclick="reload_table()">
                            <i class="glyphicon glyphicon-refresh"></i> 
                        </button>
                      </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url('assets/admin/list.png')?>" alt="User Avatar">
                     </div>
                     <h3 class="widget-user-username">List</h3>
                     <h5 class="widget-user-desc">All</h5>
                  </div>
                </div>
                <div class="col-sm-12" style="padding-top: 20px; padding-right: 0px; padding-left: 0px">
                    <div class="box-body table-responsive no-padding">
                        <table id="table" class="table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th><i class="fa fa-info"></i>&nbsp; Kode</th>
                                <th><i class="fa fa-info"></i>&nbsp; Nama Provinsi</th>
                                <th><i class="fa fa-info"></i>&nbsp; Status</th>
                                <th><i class="fa fa-edit"></i>&nbsp; Action</th>
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
      </div>
    </section>
<!-- Modal View -->
<div class="modal fade" id="modal_view" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom-style: dashed">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
                <small style="color: #666"><b>Form Data</b></small>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="lib_id"/> 
                    <div class="form-body">
                            <div class="row">
                                <form action="#" id="form" class="form-horizontal">
                                <input type="hidden" name="id"/>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nomor</label>
                                        <div class="col-md-9">
                                            <input type="text" name="nomor" class="form-control" id="redcolor">
                                            <small style="color: #666;"><b id="alert"></b> <b>Max len :</b> 250 , <b>Type : </b> Alfabet </small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nama Provinsi</label>
                                        <div class="col-md-9">
                                            <input type="text" name="nama_provinsi" class="form-control" id="redcolor">
                                            <small style="color: #666;"><b id="alert"></b> <b>Max len :</b> 250 , <b>Type : </b> Alfabet </small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Status </label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="status" style="width: 100%">
                                                    <?php $wn = array('1' => 'Aktip', '0' => 'TIdak'); ?>
                                                    <?php foreach($wn as $key=> $x_value){ ?>
                                                            <option value="<?php echo $key; ?>" ><?php echo $x_value; ?></option>
                                                    <?php } ?> 
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> &nbsp; Save</button>
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- -End Modal -->
<script src="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.min.js')?>"></script>
<script src="<?php echo base_url('assets/admin/components/tinymce/tinymce.min.js'); ?>"></script>
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
$(document).ready(function(){
    table = $('#table').DataTable({ 
        "language": {
            searchPlaceholder : "Nama Provinsi ..."
        },
        "processing": true,
        "serverSide": true, 
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('mod_provinsi/ajax_list')?>",
            "type": "POST"
        },
        "columnDefs": [{ 
            "targets": [ 0,1,2,3,4 ], 
            "orderable": false, 
        },
        ],
    });
});

function reload_table(){
    table.ajax.reload(null,false);
}

function add_posting(){
    window.location.href='<?php echo base_url()?>mod_provinsi/tambah';
}

function detail_posting(id){
    $('#btnSave').hide();
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty(); 
    $.ajax({
        url : "<?php echo site_url('mod_provinsi/ajax_edit/')?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="nomor"]').val(data.id_provinsi).attr('readonly', 'readonly');
            $('[name="nama_provinsi"]').val(data.nama_provinsi).attr('disabled', 'disabled');
            $('[name="status"]').val(data.status).attr('disabled', 'disabled');
            $('#modal_view').modal('show'); 
            $('.modal-title').text('Detail Data'); 
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function edit_posting(id){
    save_method = 'update';
    $('#btnSave').show();
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty(); 
    $.ajax({
        url : "<?php echo site_url('mod_provinsi/ajax_edit/')?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="lib_id"]').val(data.lib_id);
            $('[name="nomor"]').val(data.id_provinsi).removeAttr('readonly', 'readonly');
            //tinymce.activeEditor.setContent(data.isi_artikel);
            $('[name="nama_provinsi"]').val(data.nama_provinsi).removeAttr('disabled', 'disabled');
            $('[name="status"]').val(data.status).removeAttr('disabled', 'disabled');
            $('#modal_view').modal('show'); 
            $('.modal-title').text('View Data'); 
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function save(){
    var url;
        if(save_method == 'add') {
            url = "<?php echo site_url('mod_provinsi/ajax_add')?>";
        } else {
            url = "<?php echo site_url('mod_provinsi/ajax_update')?>";
        }
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data){
            swal({
                  title: 'Save Data Berhasil!',
                  text : 'Klik tombol ok untuk kembali !',
                  type : 'success',
                  confirmButtonText : 'Ok',
                }, function(){
                        //window.location.href='<?php echo base_url()?>mod_';
                        $('#modal_view').modal('hide'); 
                        reload_table();
                }, 1000);
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
            url : "<?php echo site_url('mod_provinsi/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                swal({
                  title: 'Save Data Berhasil!',
                  text : 'Klik tombol ok untuk kembali !',
                  type : 'success',
                  confirmButtonText : 'Ok',
                }, function(){
                        //window.location.href='<?php echo base_url()?>mod_';
                        reload_table();
                }, 1000);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error deleting data');
            }
        });
    }
}
</script>