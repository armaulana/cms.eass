    <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/nestable/css/style.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/font-awesome/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.css')?>">
    <section class="content-header">
      <h1>
        <?php echo $title;?>
        <small>Data</small>
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
            <div class="row">
              <div class="col-sm-4">
                  <div class="form-group">
                      <div class="col-md-12" style="padding-bottom: 10px">
                          <label class="control-label">Menu Name</label>
                          <input  type="text" 
                                  class="form-control" 
                                  placeholder="Nama Menu ..."
                                  id="label"  
                                  required>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12" style="padding-bottom: 10px">
                      <label class="control-label">Pilih Kontent</label>
                        <select name="type_page" class="form-control" id="pilih" onclick="show_option()">
                          <option value="">-- Pilih --</option>
                          <?php $kategori = $this->db->where('is_trash', 1)->get('bucket_posting_category')->result(); ?>
                          <?php foreach($kategori as $dt){ ?>
                                <option value="<?php echo $dt->id; ?>"><?php echo $dt->nm_kat; ?></option>
                          <?php }?>
                          <!--<option value="0">Home</option>
                              <option value="1">Berita</option>
                              <option value="2">Paket </option>
                              <option value="-">Agenda</option>
                              <option value="3">Artikel</option>
                              <option value="4">Pengumuman</option>-->
                              <option value="5">Page</option>
                              <option value="6">Custome Link</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group" id="custome-link" style="display: none">
                      <div class="col-md-12" style="padding-bottom: 10px">
                          <label class="control-label">Custome Link</label>
                          <input  type="text" 
                                  class="form-control" 
                                  id="custome" 
                                  placeholder="Ketik Url ..." required>
                      </div>
                  </div>
                  <div class="form-group" id="show" style="display: none">
                      <div class="col-md-12" style="padding-bottom: 10px">
                          <label class="control-label">Kontent</label>  
                          <select class="form-control" id="link">
                            <option value="">-- Pilih --</option>
                            <?php $page = $this->db->where('is_trash', 1)->get('bucket_page')->result();
                                  foreach($page as $key){
                            ?>
                            <option value="<?php echo $key->id;?>"><?php echo $key->judul;?></option>
                            <?php } ?>
                          </select>
                          <!--<input type="text" class="form-control" id="link" placeholder="Link ..." required> -->
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12" style="padding-bottom: 10px">
                        <button class="btn btn-flat btn-primary" id="submit">Add Save / Edit Save</button> 
                        <button class="btn btn-flat btn-default"  id="reset">Reset</button>
                    </div>
                  </div>
                  <input type="hidden" id="id">
                  <input type="hidden" id="nestable-output">
                  <div class="form-group">
                      <div class="col-md-12" style="padding-bottom: 10px">
                      <menu id="nestable-menu" style="margin: 0px">
                        <button type="button" 
                                class="btn btn-flat btn-primary" 
                                data-action="expand-all">Expand All
                        </button>
                        <button type="button" 
                                class="btn btn-flat btn-primary" 
                                data-action="collapse-all">Collapse All
                        </button>
                      </menu>
                      </div>
                  </div>
            </div>
            <div class="col-sm-8">
              <div class="dd" id="nestable" style="width: 100%;padding-top: 20px;">
                        <?php
                        $query = $this->db->order_by('sort')->get('master_menu')->result();
                        
                        $ref   = [];
                        $items = [];

                        foreach($query as $data) {

                            $thisRef = &$ref[$data->id];

                            $thisRef['access_show']     = $data->access_show;
                            $thisRef['access_add']      = $data->access_add;    
                            $thisRef['access_detail']   = $data->access_detail;
                            $thisRef['access_edit']     = $data->access_edit;
                            $thisRef['access_delete']   = $data->access_delete;
                            $thisRef['page_type']       = $data->page_type;
                            $thisRef['parent']          = $data->parent;
                            $thisRef['label']           = $data->label;
                            $thisRef['link']            = $data->link;
                            $thisRef['custome_link']    = $data->custome_link;
                            $thisRef['id']              = $data->id;
                            $thisRef['sort']            = $data->sort;

                            if($data->parent == 0) {
                                    $items[$data->id] = &$thisRef;
                            }else{
                                    $ref[$data->parent]['child'][$data->id] = &$thisRef;
                            }
                        }
                        
                        function get_menu($items, $class = 'dd-list') {
                            $html = "<ol class=\"".$class."\" id=\"menu-id\">";
                            $no = 0;
                            foreach($items as $key=>$value) {
                                $html.= '<li class="dd-item dd3-item" data-id="'.$value['id'].'" >
                                            <div class="dd-handle dd3-handle" style="background: #dd4b39;border: 1px solid #605ca8;border-radius: 0px;"></div>
                                            <div class="dd3-content" style="background: #fff;border-radius: 1px;border: 1px solid #605ca8;"><span id="label_show'.$value['id'].'">'.$value['label'].'</span> 
                                                <span class="span-right"><span id="link_show'.$value['id'].'"> <a style="font-weight: bold" href="'.$value['link'].'"> 
                                                    Action : &nbsp; <a style="color: #f39c12" class="edit-button" id="'.$value['id'].'" label="'.$value['label'].'" custome_link="'.$value['custome_link'].'" link="'.$value['link'].'" page_type="'.$value['page_type'].'" ><i class="fa fa-pencil"></i></a> &nbsp; &nbsp; 
                                                    <a style="color: red" class=" del-button" id="'.$value['id'].'"><i class="fa fa-trash"></i></a>
                                                </span> 
                                            </div>';
                                if(array_key_exists('child', $value)) {
                                    $html .= get_menu($value['child'],'child');
                                }
                                    $html .= "</li>";
                            $no++;
                            }
                            $html .= "</ol>";
                            return $html;
                        }
                        print get_menu($items);
                        ?>
                        <button class="btn btn-primary btn-flat pull-right" id="save"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
          </div>
            <script src="<?php echo base_url()?>assets/admin/components/sweetalert/sweetalert.min.js"></script>
            <script src="<?php echo base_url()?>assets/admin/components/nestable/js/jquery.min.js"></script>
            <script src="<?php echo base_url()?>assets/admin/components/nestable/js/jquery.nestable.js"></script>
            <script>
            
            function izitoast_berhasil(){
                iziToast.success({
                    title: 'OK', 
                    message: 'Berhasil menambah menu !!! '
                });
            }

            $(document).ready(function(){
                var updateOutput = function(e){
                    var list   = e.length ? e : $(e.target),
                        output = list.data('output');
                    if (window.JSON) {
                        output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                    } else {
                        output.val('JSON browser support required for this demo.');
                    }
                };
                // activate Nestable for list 1
                $('#nestable').nestable({
                    group: 1
                })
                .on('change', updateOutput);
                // output initial serialised data
                updateOutput($('#nestable').data('output', $('#nestable-output')));

                $('#nestable-menu').on('click', function(e){
                    var target = $(e.target),
                        action = target.data('action');
                    if (action === 'expand-all') {
                        $('.dd').nestable('expandAll');
                    }
                    if (action === 'collapse-all') {
                        $('.dd').nestable('collapseAll');
                    }
                });
            });
            </script>

            <script>
              $(document).ready(function(){
                $("#load").hide();
                    $("#submit").click(function(){
                        $("#load").show();
                        var dataString = { 
                                label : $("#label").val(),
                                link : $("#link").val(),
                                id : $("#id").val(),
                                custome_link : $("#custome").val(),
                                pilih : $("#pilih").val(),
                        };
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url()?>mod_master_menu/save_menu",
                            data: dataString,
                            dataType: "json",
                            cache : false,
                            success: function(data){
                                if(data.type == 'add'){
                                    izitoast_berhasil();
                                    $("#menu-id").append(data.menu);
                                }else if(data.type == 'edit'){
                                    swal({
                                    title: 'Data berhasil di rubah !',
                                    text : 'Klik tombol ok untuk kembali !',
                                    type : 'success',
                                    confirmButtonText : 'Ok',
                                    }, function(){
                                            //window.location.href='<?php echo base_url()?>mod_master_menu';
                                    }, 1000);
                                    $('#label_show'+data.id).html(data.label);
                                    $('#link_show'+data.id).html(data.link);
                                    $('[name="show"]').attr('checked', 'checked');
                                }
                                    $('#label').val('');
                                    $('#link').val('');
                                    $('#pilih').val('');
                                    $('#id').val('');
                                    $("#load").hide();
                                },error: function(xhr, status, error) {
                                    alert(error);
                                },
                        });
                    });

                    $('.dd').on('change', function() {
                        $("#load").show();
                            var dataString = { 
                              data : $("#nestable-output").val(),
                            };
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url()?>mod_master_menu/save",
                                data: dataString,
                                cache : false,
                                success: function(data){
                                    izitoast_berhasil();
                                    $("#load").hide();
                                } ,error: function(xhr, status, error) {
                                    alert(error);
                                },
                            });
                    });

                    $("#save").click(function(){
                        $("#load").show();
                        var dataString = { 
                          data : $("#nestable-output").val(),
                        };
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url()?>mod_master_menu/save",
                            data: dataString,
                            cache : false,
                            success: function(data){
                            $("#load").hide();
                                swal({
                                    title: 'Data berhasil di rubah !',
                                    text : 'Klik tombol ok untuk kembali !',
                                    type : 'success',
                                    confirmButtonText : 'Ok',
                                    }, function(){
                                            window.location.href='<?php echo base_url()?>mod_master_menu';
                                    }, 1000);
                            },error: function(xhr, status, error) {
                                alert(error);
                            },
                        });
                    });

                    $(document).on("click",".del-button",function() {
                        var x = confirm('Delete this menu?');
                        var id = $(this).attr('id');
                        if(x){
                            $("#load").show();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url()?>mod_master_menu/delete",
                                data: { id : id },
                                cache : false,
                                success: function(data){
                                  $("#load").hide();
                                  $("li[data-id='" + id +"']").remove();
                                } ,error: function(xhr, status, error) {
                                  alert(error);
                                },
                            });
                        }
                    });

                    $(document).on("click",".edit-button",function() {
                        var id              = $(this).attr('id');
                        var label           = $(this).attr('label');
                        var link            = $(this).attr('link');
                        var custome_link    = $(this).attr('custome_link');
                        var page_type       = $(this).attr('page_type');
                            $("#id").val(id);
                            $("#label").val(label);
                            $("#link").val(link);
                            $("#custome").val(custome_link);
                            $("#pilih").val(page_type);
                            if(page_type == 5){
                                $('#show').show();   
                                $('#custome-link').hide();
                            }else if(page_type == 6){
                                $('#show').hide();
                                $('#custome-link').show();
                            } else{
                                $('#show').hide();   
                            }
                    });

                    $(document).on("click","#reset",function() {
                        $('#label').val('');
                        $('#link').val('');
                        $('#id').val('');
                    });
              });
            </script>
            <script>
                function show_option() {
                    $("#pilih").change(function() {
                        if ($(this).val() === '0'){ 
                            $('#show').show();   
                            $('#custome-link').hide();
                        } else if($(this).val() === '1'){
                            $('#show').hide();  
                            $('#custome-link').hide();
                        } else if($(this).val() === '2'){
                            $('#show').hide();  
                            $('#custome-link').hide();
                        } else if($(this).val() === '3'){
                            $('#show').hide();  
                            $('#custome-link').hide();
                        } else if($(this).val() === '4'){
                            $('#show').hide();  
                            $('#custome-link').hide();
                        } else if($(this).val() === '5'){ //jika pilih page 
                            $('#show').show();  // show pemilihan
                            $('#custome-link').hide();
                        } else if($(this).val() === '6'){ //jika pilih custome link
                            $('#show').hide();   
                            $('#custome-link').show(); //show input text 
                        }else {
                            $('#show').hide(); 
                            $('#custome-link').hide();
                        }
                    });
                };
            </script>
            </div>
          </div>
        </div>
      </div>
  </section>

