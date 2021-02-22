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
                                                <i class="glyphicon glyphicon-trash"></i> Bulk Delete</a>
                                            </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-database"></i> Export Data
                                            </a>
                                        </li>
                                      </ul>
                                    </div>
                                </th>
                                <th >
                                    <input  type="text" 
                                            name="filter1" 
                                            class="form-control" 
                                            id="filter1" 
                                            placeholder="User Name ... ">
                                </th>
                                <th >
                                    <input  type="text" 
                                            name="filter2" 
                                            class="form-control" 
                                            id="filter2" 
                                            placeholder="Email ... ">
                                </th>
                                <th width="30%">
                                    <button type="button" id="btn-filter" class="btn btn-primary btn-flat">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    &nbsp; | &nbsp; 
                                    <?php if($check_allow_access[0]['access_add'] == 0){ ?> 
                                    <?php }else{ ?> 
                                            <a  href="javascript:void(0)" 
                                                onclick="add_posting()" 
                                                class="btn btn-success btn-flat ">
                                                <i class="glyphicon glyphicon-plus"></i> Add 
                                            </a> 
                                    <?php } ?>
                                    <button class="btn btn-default btn-flat" id="btn-reset">
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
                                <th width="39px"><center><input type="checkbox" id="check-all"></center></th>
                                <th><i class="fa fa-info"></i>&nbsp; User Name</th>
                                <th><i class="fa fa-envelope"></i>&nbsp; Email</th>
                                <th>Active</th>
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
    </section>

<script type="text/javascript">
var table, save_method;
$(document).ready(function(){
    table = $('#table').DataTable({ 
        "language": {
            searchPlaceholder : "Nama User & email "
        }, 
        "processing": true,
        "serverSide": true, 
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('mod_users/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.username = $('#filter1').val();
                data.email = $('#filter2').val();
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
                "width": "20%",
                "targets": 2, 
                "orderable": false, 
            },
            { 
                "width": "5%",
                "targets": 3, 
                "orderable": false, 
            },
            { 
                "width": "30%",
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
    //check all
    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
    });
});

function reload_table(){
    table.ajax.reload(null,false);
}

function add_posting(){
    window.location.href='<?php echo base_url()?>mod_users/create_user/';
}

function edit_posting(id){
    window.location.href='<?php echo base_url()?>mod_users/rubah/'+id;
}

function save(){
    $('#btnSave').text('saving...'); 
    $('#btnSave').attr('disabled',true); 
    var url;
    if(save_method == 'add') {
        url = "<?php echo site_url('mod_users/ajax_add')?>";
    } else {
        url = "<?php echo site_url('mod_users/ajax_update')?>";
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
            url : "<?php echo site_url('mod_users/ajax_delete')?>/"+id,
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
                url: "<?php echo site_url('mod_users/ajax_bulk_delete')?>",
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