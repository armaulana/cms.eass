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
                        <a href="javascript:void(0)" onclick="add_posting()" class="btn btn-success btn-flat ">
                            <i class="glyphicon glyphicon-plus"></i> Add </a> 
                        <?php } ?>
                        <button class="btn btn-default btn-flat" onclick="reload_table()">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </button>
                      </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo  base_url()?>assets/admin/list.png" alt="User Avatar">
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
                                <th ><i class="fa fa-info"></i>&nbsp; Kode</th>
                                <th ><i class="fa fa-info"></i>&nbsp; Nama Provinsi</th>
                                <th ><i class="fa fa-info"></i>&nbsp; Nama Kota</th>
                                <th ><i class="fa fa-info"></i>&nbsp; Nama Kecamatan</th>
                                <th >Stat</th>
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
      </div>
    </section>
<div class="modal fade" id="modal_view" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom-style: dashed">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title"></h3>
                <small style="color: #666"><b>Form Data</b></small>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                            <div class="row">
                                <form action="#" id="form" class="form-horizontal">
                                <input type="hidden" name="id"/>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Provinsi </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="id_provinsi_fk">
                                                <option value="-">-- Pilih Provinsi --</option>
                                                <?php foreach ($provinsi as $key) { ?>
                                                            <option value="<?php echo $key->id_provinsi; ?>">
                                                                <?php echo $key->nama_provinsi; ?>        
                                                            </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kota </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="id_kota_fk">
                                                <option value="-">-- Pilih Kota --</option>
                                                <?php foreach ($kota as $key) { ?>
                                                            <option value="<?php echo $key->id_kota; ?>"><?php echo $key->nama_kota; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nomor</label>
                                        <div class="col-md-9">
                                            <input type="text" name="nomor" placeholder="Nomor ..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nama Kecamatan</label>
                                        <div class="col-md-9">
                                            <input type="text" name="nama_kecamatan" placeholder="Nama Kota ..." class="form-control" id="redcolor">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Status </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="status" style="width: 100%">
                                                <?php $wn = array('1' => 'Aktip', '0' => 'Tidak'); ?>
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
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/components/tinymce/tinymce.min.js'); ?>"></script>
<script type="text/javascript">
var table, save_method;
var base_url = '<?php echo base_url();?>';
$(document).ready(function(){
    table = $('#table').DataTable({ 
        "language": {
            searchPlaceholder: "Nama Kecamatan "
        },
        "processing": true,
        "serverSide": true, 
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('mod_kecamatan/ajax_list')?>",
            "type": "POST"
        },
        "columnDefs": [{ 
            "targets": [ 0,1,2,3,4,5,6 ], 
            "orderable": false, 
        },
        ],
    });
});

function reload_table(){
    table.ajax.reload(null,false);
}

function add_posting(){
    window.location.href='<?php echo base_url()?>mod_kecamatan/tambah';
}

function edit_posting(id){
    window.location.href='<?php echo base_url()?>mod_kecamatan/rubah/'+id;
}

function detail_posting(id){
    save_method = 'update';
    $('#form')[0].reset();
    $.ajax({
        url : "<?php echo site_url('mod_kecamatan/ajax_edit/')?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id_kota"]').val(data.id_kota);
            $('[name="id_provinsi_fk"]').val(data.id_provinsi_fk).attr('disabled', true);
            $('[name="id_kota_fk"]').val(data.id_kota_fk).attr('disabled', true);
            $('[name="nomor"]').val(data.id_kecamatan).attr('disabled', true);
            $('[name="nama_kecamatan"]').val(data.nama_kecamatan).attr('disabled', true);
            $('[name="status"]').val(data.status).attr('disabled', true);
            $('#modal_view').modal('show').attr('disabled', true); 
            $('.modal-title').text('View Data').attr('disabled', true); 
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function delete_posting(id){
    if(confirm('Are you sure delete this data?')){
        $.ajax({
            url : "<?php echo site_url('mod_kecamatan/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                swal({
                  title: 'Save Data Berhasil!',
                  text : 'Klik tombol ok untuk kembali !',
                  type : 'success',
                  confirmButtonText : 'Ok',
                }, function(){
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