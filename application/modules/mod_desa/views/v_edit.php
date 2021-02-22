    <link rel="stylesheet" href="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.css')?>"/>
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
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo  base_url('assets/admin/list.png')?>" alt="User Avatar">
                     </div>
                     <h3 class="widget-user-username">Form</h3>
                     <h5 class="widget-user-desc">Informations</h5>
                  </div>
                </div>
                <div class="col-sm-12" style="padding-top: 20px; padding-right: 0px; padding-left: 0px">
                        <div class="form-body">
                            <form action="#" id="form" class="form-horizontal">
                                <input type="hidden" name="lib_id" value="<?php echo $get_data->lib_id ; ?>" />
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Provinsi</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="id_provinsi_fk" id="provinsi">
                                                <option value="-">-- Pilih Provinsi --</option>
                                                <?php foreach ($provinsi as $key) { ?>
                                                            <option  
                                                            <?php if($key->id_provinsi == $provinsi_selected ){ 
                                                                        echo "selected=''";
                                                                    }else{ echo "";} ?> 
                                                                    value="<?php echo $key->id_provinsi; ?>">
                                                                    <?php echo $key->nama_provinsi; ?>            
                                                            </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Kota</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="id_kota_fk" id="kota">
                                                <option value="">-- Pilih Kota --</option>
                                                <?php foreach ($kota as $kot) { ?>
                                                    <option class="<?php echo $kot->id_provinsi_fk ?>" 
                                                            <?php   if($kot->id_kota == $kota_selected ){ 
                                                                        echo "selected=''";
                                                                    }else{ echo "";} ?> 
                                                                    value="<?php echo $kot->id_kota ?>">
                                                                    <?php echo $kot->nama_kota ?>                    
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Kecamatan</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="id_kecamatan_fk" id="kota">
                                                <option value="">-- Pilih Kecamatan --</option>
                                                <?php foreach ($kecamatan as $kec) { ?>
                                                    <option class="<?php echo $kec->id_kota_fk ?>" 
                                                            <?php   if($kec->id_kecamatan == $kecamatan_selected ){ 
                                                                        echo "selected=''";
                                                                    }else{ 
                                                                        echo "";
                                                                    } ?> 
                                                                    value="<?php echo $kec->id_kecamatan ?>">
                                                                    <?php echo $kec->nama_kecamatan ?>                    
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Kode </label>
                                        <div class="col-md-9">
                                            <input  type="text" 
                                                    name="nomor" 
                                                    value="<?php echo substr($get_data->id_desa, 7, 6); ?>" 
                                                    class="form-control">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Nama Kota </label>
                                        <div class="col-md-9">
                                            <input  type="text" 
                                                    name="nama_desa" 
                                                    value="<?php echo $get_data->nama_desa; ?>" 
                                                    class="form-control"
                                                    placeholder="Nama Kota ... ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Status </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="status">
                                                <option value="-">-- Pilih Status --</option>
                                                <?php $vl = array('1' => 'Aktif', '0' => 'Tidak'); ?>
                                                <?php foreach ($vl as $key => $value) { ?>
                                                        <option <?php   if($key == $get_data->status){ 
                                                                            echo "selected=''";
                                                                        }else{ 
                                                                            echo "";
                                                                        } ?> 
                                                                        value="<?php echo $key; ?>">
                                                                        <?php echo $value; ?>
                                                        </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <hr style="border: 1px solid #fff ">
                                    <div class="modal-footer" style="border-top-color: #fff">
                                        <a  href="javascript:void(0)" 
                                            class="btn btn-primary btn-flat" 
                                            onclick="kembali()">
                                            <i class="fa fa-chevron-left"></i> &nbsp; Kembali 
                                        </a>
                                        <a  href="javascript:void(0)" 
                                            class="btn btn-primary btn-flat" 
                                            title="View" 
                                            onclick="save()">
                                            <i class="fa fa-sign-in fa-fw"></i>Save
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<script src="<?php echo base_url('assets/admin/components/sweetalert/sweetalert.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/components/tinymce/tinymce.min.js');?>"></script>
<script type="text/javascript">
var table, save_method;

function kembali(){
    window.location.href='<?php echo base_url('mod_desa')?>';
}

function save(){
    url = "<?php echo site_url('mod_desa/ajax_update')?>";
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
            if(data.status) {
                swal({
				  title: 'Save Data Berhasil!',
				  text : 'Klik tombol ok untuk kembali !',
				  type : 'success',
				  confirmButtonText : 'Ok',
				}, function(){
						window.location.href='<?php echo base_url('mod_desa')?>';
				}, 1000);
            }else{
                alert('failed');
            }
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error adding / update data');
        }
    });
}
</script>