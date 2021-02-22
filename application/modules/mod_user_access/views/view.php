    <link href="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.css')?>" rel="stylesheet" />
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
                                        <li><a href="javascript:void(0)" id="check_bulk"><i class="fa fa-pencil"></i> Bulk Update</a></li>
                                      </ul>
                                    </div>
                                </th>
                                <th width="337px">
                                    <select class="form-control" name="filter1" id="filter1" style="width: 100%" >
                                        <option value="">-- Pilih Group Level --</option>
                                        <?php foreach($level_list as $key) {?>
                                                    <option value="<?php echo $key->id; ?>"><?php echo $key->name;?></option>
                                        <?php } ?>
                                    </select>
                                </th>
                                <th width="351px" colspan="1">
                                    <button type="button" id="btn-filter" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
                                    &nbsp;
                                    <a href="javascript:void(0)" onclick="bulk_update()" class="btn btn-flat btn-primary" style="display:none" id="bulk_update"><i class="fa fa-database"></i> Update</a>
                                    <a href="" class="btn btn-flat btn-default" ><i class="fa fa-refresh"></i></a>
                                </th>
                            </tr>
                    </thead>
                    </table>
                </form>
            </div>
            <hr/ style="margin-top: 0px; margin-bottom: 0px; border: 1px solid #dedede; border-style: dashed;">
            <!-- /.box-header -->
            <!-- /.box-header -->
            <form id="form" style="padding-top: 0px; padding-right: 0px; padding-left: 0px"> 
            <!--<form method="post" action="<?php echo base_url()?>mod_user_access/ajax_bulk_update"> -->
            <input type="hidden" name="user_level_id" value="30">
            <div class="box-body">
                <div class="col-sm-12" style="padding-top: 0px; padding-right: 0px; padding-left: 0px">
                    <table id="table" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="40px" style="border-bottom: 0px">No</th>
                                <th width="5%" style="border-bottom: 0px">Icon</th>
                                <th style="border-bottom: 0px">Menu Name</th>
                                <th width="10%" style="border-bottom: 0px">Modul Name</th>
                                <th width="5%" style="border-bottom: 0px"><center><i class="fa fa-external-link"></i></center></th>
                                <th width="5%" style="border-bottom: 0px">Show</th>
                                <th width="5%" style="border-bottom: 0px">add</th>
                                <th width="5%" style="border-bottom: 0px">Detail</th>
                                <th width="5%" style="border-bottom: 0px">Edit</th>
                                <th width="5%" style="border-bottom: 0px">Delete</th>
                            </tr>
                            <tr>
                                <th width="40px">#</th>
                                <th width="5%">#</th>
                                <th>#</th>
                                <th width="10%">#</th>
                                <th width="5%"><center>#</center></th>
                                <th width="5%"><center><input type="checkbox" id="check-all"></center></th>
                                <th width="5%"><center><input type="checkbox" id="check-all1"></center></th>
                                <th width="5%"><center><input type="checkbox" id="check-all2"></center></th>
                                <th width="5%"><center><input type="checkbox" id="check-all3"></center></th>
                                <th width="5%"><center><input type="checkbox" id="check-all4"></center></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--<input type="submit" value="Update" /> -->
            </form>
          </div>
        </div>
      </div>
    </section>
<script src="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.min.js')?>"></script>
<script type="text/javascript">
var table, save_method;
$(document).ready(function(){
    table = $('#table').DataTable({ 
        "language": {
            searchPlaceholder: "Main menu"
        },
        "processing": true,
        "serverSide": true, 
        "stateSave": true,
        "paging": true,
        "lengthMenu": [ [100], ["All"] ],
        "pagingType": "full_numbers",
        "pageLength": 100,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('mod_user_access/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.users_level_id = $('#filter1').val();
                //data.nm_gedung = $('#filter2').val();
                $('[name="user_level_id"]').val(data.users_level_id);
            }
        },
        "columnDefs": [{ 
            "targets": [ 0,1,2,3,4,5,6,7,8,9 ], 
            "orderable": false, 
        },
        ],
    },);
    $('#check_bulk').click(function(){
        //table.ajax.reload();
        $(".data-check2").prop('checked', $(this).prop('checked'));                
    });
    //-- onclick select option
    $('#filter1').click(function(){
        table.ajax.reload();        
    });
    //-- click button search 
    $('#btn-filter').click(function(){ 
        table.ajax.reload();
    });
    //-- click button reset 
    $('#btn-reset').click(function(){ 
        $('#form-filter')[0].reset();
        table.ajax.reload(); 
    });

    //check all
    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
    });
    $("#check-all1").click(function () {
        $(".data-check1").prop('checked', $(this).prop('checked'));
    });
    $("#check-all2").click(function () {
        $(".data-check2").prop('checked', $(this).prop('checked'));
    });
    $("#check-all3").click(function () {
        $(".data-check3").prop('checked', $(this).prop('checked'));
    });
    $("#check-all4").click(function () {
        $(".data-check4").prop('checked', $(this).prop('checked'));
    });
});

//-- show button update
$('#bulk_update').show();

//-- hide button filter
$('#btn-filter').hide();

function reload_table(){
    table.ajax.reload(null,false);
}

function bulk_update(){

    url = "<?php echo site_url('mod_user_access/ajax_bulk_update')?>";
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status == true) {
                swal({
                      title: 'Save Data Berhasil!',
                      text : 'Klik tombol ok untuk kembali !',
                      type : 'success',
                      confirmButtonText : 'Ok',
                    }, function(){
                            window.location.href='<?php echo base_url()?>mod_user_access';
                }, 1000); 
            }else{
                swal({
                      title: 'Pilih Users Level!',
                      text : 'Klik Users Level !',
                      type : 'warning',
                      confirmButtonText : 'Ok',
                    }, function(){
                            //window.location.href='<?php echo base_url()?>mod_user_access';
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
</script>
