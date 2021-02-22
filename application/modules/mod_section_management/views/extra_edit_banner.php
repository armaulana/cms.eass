<link href="<?php echo base_url()?>themes/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
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
                                        <li><a href="javascript:void(0)" onclick="bulk_delete()"><i class="glyphicon glyphicon-trash"></i> Bulk Delete</a></li>
                                        <li class="divider"></li>
                                        <li><a href=""><i class="fa fa-database"></i> Export All Data</a></li>
                                      </ul>
                                    </div>
                                </th>
                                <th width="25%">
                                    <input type="text" name="filter1" class="form-control" id="filter1" placeholder="Kategori ... ">
                                </th>
                                <th >
                                    <input type="text" name="filter2" class="form-control" id="filter2" placeholder="Judul ... ">
                                </th>
                                <th width="40%">
                                    <button type="button" id="btn-filter" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
                                    &nbsp; | &nbsp; 
                                     <?php if($check_allow_access[0]->access_add == 0 ){ ?> <?php }else{ ?>  <a href="javascript:void(0)" onclick="add_kategori()" class="btn btn-success btn-flat"> <i class="glyphicon glyphicon-plus"></i> Tambah </a> <?php }?> 
                                    <button class="btn btn-default btn-flat" id="btn-reset"><i class="glyphicon glyphicon-refresh"></i> </button>
                                </th>
                            </tr>
                    </thead>
                    </table>
                </form>
            </div>
            <hr/ style="margin-top: 0px; margin-bottom: 0px; border: 1px solid #dedede; border-style: dashed;">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-sm-12" style="padding-top: 0px; padding-right: 0px; padding-left: 0px">
                    <table id="table" class="table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th ><center><input type="checkbox" id="check-all"></center></th>
                                <th >Foto</th>
                                <th >Judul Berita</th>
                                <th >Stat</th>
                                <th ><a href="" class="btn btn-default btn-flat btn-sm"> <i class="fa fa-external-link"></i></a> </th>
                                <th >Action</th>
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
    <!-- Modal tambah & edit-->
    <div class="modal fade bd-example-modal-lg" id="modal_form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid #d2d6de ;border-bottom-style: dashed">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Menu Kategori</h3>
                    <small class="title-small"><b style="color: #666">Form Tambah</b></small>
                </div>
                <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value="" name="id"/> 
                        <div class="form-body">
                            <!--
                            <div class="form-group">
                                <label class="control-label col-md-3">Kategori Berita</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="id_kategori" id="redcolor">
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($kategori as $key) { ?>
                                                <option value="<?php echo $key->id; ?>"><?php echo $key->nm_kat; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small style="color: #666"><b id="alert"> </b>  <b>Type : </b> Select </small>
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                <label class="control-label col-md-3">Judul Berita</label>
                                <div class="col-md-9">
                                    <input name="judul_berita" placeholder="Judul Berita ... " class="form-control" type="text" id="redcolor1" >
                                    <small style="color: #666"><b id="alert1"> </b> <b>Type : </b> Alfabeth </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Deskripsi</label>
                                <div class="col-md-9">
                                    <input name="deskripsi" placeholder="Deskripsi ... " class="form-control" type="text" id="redcolor2" >
                                    <small style="color: #666"><b id="alert2"> </b> <b>Type : </b> Alfabeth </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal Posting</label>
                                <div class="col-md-9">
                                    <input name="tanggal_posting" placeholder="Tanggal Posting ... " class="form-control" type="text" id="datepicker2">
                                    <small style="color: #666"><b id="alert3"> </b> <b> Max len : </b> 100 , <b>Type : </b> Date </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="status">
                                    <?php $value = array('1' => 'Aktif', '0' => 'Tidak'); ?>
                                    <?php foreach($value as $key => $x_val){ ?>
                                                <option value="<?php echo $key; ?>"><?php echo $x_val?></option>
                                    <?php } ?>
                                    </select>
                                    <small style="color: #666"><b>Type : </b> Select </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Kontent</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="kontent" placeholder="Kontent" id="content"></textarea>
                                    <small style="color: #666"><b id="alert2"> </b> <b> Max len : </b> 100 , <b>Type : </b> Alfabet </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tampilkan Berita Slider</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="slider">
                                    <?php $value = array('1' => 'Ya', '0' => 'Tidak'); ?>
                                    <?php foreach($value as $key => $x_val){ ?>
                                                <option value="<?php echo $key; ?>"><?php echo $x_val?></option>
                                    <?php } ?>
                                    </select>
                                    <small style="color: #666"><b>Type : </b> Select </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">File</label>
                                <div class="col-md-9">
                                    <div id="foto"></div>
                                    <br/>
                                    <input type="file" name="poto">
                                    <small style="color: #666"><b id="alert2"> </b> <b>Type : </b> .jpg | .png  </small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> &nbsp; Save</button>
                    <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> &nbsp; Cancel</button>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal detail-->
        <div class="modal fade bd-example-modal-lg" id="modal_form_detail" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid #d2d6de ;border-bottom-style: dashed">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Menu Kategori</h3>
                    <small class="title-small"><b style="color: #666">Form Tambah</b></small>
                </div>
                <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value="" name="id"/> 
                        <div class="form-body">
                            <!--
                            <div class="form-group">
                                <label class="control-label col-md-3">Kategori Berita</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="id_kategori" id="redcolor">
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($kategori as $key) { ?>
                                                <option value="<?php echo $key->id; ?>"><?php echo $key->nm_kat; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small style="color: #666"><b id="alert"> </b>  <b>Type : </b> Select </small>
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                <label class="control-label col-md-3">Judul Berita</label>
                                <div class="col-md-9">
                                    <input name="judul_berita" placeholder="Judul Berita ... " class="form-control" type="text" id="redcolor1" >
                                    <small style="color: #666"><b id="alert1"> </b> <b>Type : </b> Alfabeth </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Deskripsi</label>
                                <div class="col-md-9">
                                    <input name="deskripsi" placeholder="Deskripsi ... " class="form-control" type="text" id="redcolor2" >
                                    <small style="color: #666"><b id="alert2"> </b> <b>Type : </b> Alfabeth </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal Posting</label>
                                <div class="col-md-9">
                                    <input name="tanggal_posting" placeholder="Tanggal Posting ... " class="form-control" type="text" id="datepicker2">
                                    <small style="color: #666"><b id="alert3"> </b> <b> Max len : </b> 100 , <b>Type : </b> Date </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="status">
                                    <?php $value = array('1' => 'Aktif', '0' => 'Tidak'); ?>
                                    <?php foreach($value as $key => $x_val){ ?>
                                                <option value="<?php echo $key; ?>"><?php echo $x_val?></option>
                                    <?php } ?>
                                    </select>
                                    <small style="color: #666"><b>Type : </b> Select </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">File</label>
                                <div class="col-md-9">
                                    <div id="foto_detail"></div>
                                    <small style="color: #666"><b id="alert2"> </b> <b>Type : </b> .jpg | .png  </small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> &nbsp; Cancel</button>
                </div>
            </div>
        </div>
    </div>