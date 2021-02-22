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
                <div class="col-sm-12" style="padding-top: 20px; padding-right: 0px; padding-left: 0px">
                    <div class="form-body">
                        <div class="row">
                            <form action="<?php echo base_url()?>mod_users/edit_user/<?php echo $get_data->id; ?>" method="post" id="form" class="form-horizontal">
                            <div class="col-sm-12">
                                    <div class="box-body box-profile" style="padding-top: 25px">
                                          <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()?>assets/admin/man-user.png" alt="User profile picture">
                                          <h3 class="profile-username text-center"><?php echo $get_data->username; ?></h3>
                                          <p class="text-muted text-center">Web Developer</p>
                                          <div style="margin-right: 45%; margin-left: 44%">
                                            <div class="btn btn-default btn-file" >
                                                <i class="fa fa-paperclip"></i> Upload Foto
                                                <input name="photo" type="file" class="text-muted text-center" alt="">
                                            </div>
                                          </div>
                                    </div>
                                    <br/>
                                    <hr />
                                    <br/>
                                    <div class="callout callout-info" >
                                        <h4>Perhatian</h4>
                                        <p>Untuk mengupdate profile , isian password dan password confirm wajib di isi </p>
                                    </div>
                                    <div id="infoMessage"><?php echo $message;?></div>
                                    <br/>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $get_data->id; ?>"/>
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">User Level</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="user_level" require>
                                                <option value="">-- Pilih --</option>
                                                <?php foreach($groups as $key){ ?>
                                                            <option <?php if($key->id == $get_data->users_level_id){ echo "selected";}else{} ?> value="<?php echo $key->id;?>"><?php echo $key->name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small style="color: #666;"><b>Type : </b> Select </small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">User Name</label>
                                        <div class="col-md-6">
                                            <input type="text" name="user_name" value="<?php echo $get_data->username; ?>" class="form-control" placeholder="User Name"/>
                                            <small style="color: #666;"> <b>Type : </b> Alfabet </small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email</label>
                                        <div class="col-md-6">
                                            <input type="text" name="email" value="<?php echo $get_data->email; ?>" class="form-control" placeholder="Email"/>
                                            <small style="color: #666;"> <b>Type : </b> Email </small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Password</label>
                                        <div class="col-md-6">
                                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                                            <small style="color: #666;"> <b>Type : </b> Password </small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Password Confirm</label>
                                        <div class="col-md-6">
                                            <input type="password" name="password_confirm" class="form-control" placeholder="Password Confirm"/>
                                            <small style="color: #666;"> <b>Type : </b> Password </small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Active</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="active" >
                                            <?php $wn = array('1' => 'Aktif', '0' => 'TIdak'); ?>
                                            <?php foreach($wn as $key=> $x_value){ ?>
                                                    <option <?php if($get_data->active == $key){ echo "selected";}else{} ?> value="<?php echo $key; ?>" ><?php echo $x_value; ?></option>
                                            <?php } ?> 
                                            </select>
                                            <small style="color: #666"> <b>Type : </b> Select </small>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-12">
                                        <hr style="border: 0px solid #aaa ">
                                        <div class="modal-footer" style="border-top-color: #fff">
                                            <a class="btn btn-primary btn-flat" href="javascript:void(0)" title="View" onclick="kembali() "><i class="fa fa-chevron-left"></i> Kembali</a>
                                            <input class="btn btn-primary btn-flat" type="submit" name="submit" value="Edit User"  />
                                            <!-- <a class="btn btn-primary btn-flat" href="javascript:void(0)" title="View" onclick="save() "><i class="fa fa-sign-in fa-fw"></i> Save</a> -->
                                        </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<script src="<?php echo base_url()?>themes/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>themes/tinymce/tinymce.min.js"></script>

<script type="text/javascript">

function reset(){
    $('#form')[0].reset();
}

function kembali(){
    window.location.href='<?php echo base_url()?>mod_users/';
}

</script>