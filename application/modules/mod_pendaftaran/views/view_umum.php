      <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><b>• Form Kunjungan</b></a></li>
              <li class=""><a href="#tab_2" data-toggle="tab"><b>• Pilih Jadwal Kunjungan</b></a></li>
              <li class=""><a href="#tab_3" data-toggle="tab"><b>• Cetak Kode Booking</b></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nomor Rekamedik <b style="color: red">*</b></label>
                            <div class="col-md-6">
                                <input type="text" name="no_rm" class="form-control" placeholder="Digit Nomor RM ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Pasien <b style="color: red">*</b></label>
                            <div class="col-md-6">
                                <input type="text" name="nama" class="form-control" placeholder="Isi Nama Dengan Lengkap ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kelamin <b style="color: red">*</b></label>
                            <div class="col-md-6">
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <option value="1">Laki -Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">NIK <b style="color: red">*</b></label>
                            <div class="col-md-6">
                                <input type="text" name="nik" class="form-control" placeholder="13 digit NIK ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir <b style="color: red">*</b></label>
                            <div class="col-md-6">
                                <input type="text" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir Anda ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nomor Handphone <b style="color: red">*</b></label>
                            <div class="col-md-6">
                                <input type="text" name="no_handphone" class="form-control" placeholder="Digit Nomor Handphone Aktip ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat <b style="color: red">*</b></label>
                            <div class="col-md-6">
                                <textarea name="alamat" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-6">
                                <a href="javascript:avoid(0)" class="btn btn-primary btn-flat" onclick="save()"><i class="fa fa-save"></i> &nbsp; Lanjutkan</a>
                            </div>
                        </div>
                    </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
      </section>