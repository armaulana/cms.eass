    <!-- Page Content -->
    <div class="container">
      <!-- Heading Row -->
      <div class="row" style="margin-top: 64px; margin-bottom: 64px;">
      <div class="col-lg-1 d-none d-sm-block d-md-none d-xl-block" style="text-align: center">
      <!-- AddToAny BEGIN -->
      <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="line-height: 32px;padding-left: 40%;padding-right: 50%;padding-top: 50%;">
      <a class="a2a_button_facebook" style="padding:6px;"></a>
      <a class="a2a_button_twitter" style="padding:6px;"></a>
      <a class="a2a_button_whatsapp" style="padding:6px;"></a>
      </div>
      <script async src="https://static.addtoany.com/menu/page.js"></script>
      <!-- AddToAny END -->
      </div> 
          <div class="col-lg-8">
          <p style="padding-top: 12px; padding-bottom: 12px; font-size: 14px; color: #A7A7A7; margin:0px"> Beranda <i class="fas fa-angle-right"></i> Berita <i class="fas fa-angle-right"></i> <?php echo $data->judul ?> </p>
              <h1 style="margin-top: 0px; color: #343434; font-size: 34px; font-weight: bold; letter-spacing: -.01em; line-height: 1.2; margin-bottom:0px"><?php echo $data->judul;?></h1>
              <p style="padding-top: 12px; padding-bottom: 12px; font-size: 14px; color: #222"><i class="far fa-clock"></i> <?php echo date('l, d F Y', strtotime($data->tanggal_posting)); ?>  &nbsp; <i class="far fa-user"></i> Oleh: Administrator &nbsp; <i class="fas fa-eye"></i> 0 </p>
            <img class="img-fluid " src="<?php echo base_url() ?>uploads/berita/<?php echo $data->foto;?>" alt="" style="object-fit: cover; height: 394px; width: 100%; ">
            <div class="mb-4" style="padding: 46px 0px 46px 0px">
              <div class="card-text" style="font-size: 14px; color: #222; margin-bottom:26px; line-height: 1.71429"><?php echo $data->kontent;?></div>
            </div>
            <!-- /.col-md-4 -->
          </div>
          <!-- /.col-lg-8 -->
          <div class="col-md-3 mb-4">
            <div style="float: left">
            <div style="border-bottom: 1px solid #E6E6E6;margin-bottom: 18px;width: 100%;">
              <h5 style="padding: 36px 0px 17px 0px;display:inline-block;border-bottom: 3px solid #FDCB2C;margin: 0px;"><i class="fas fa-rss-square"></i> Rilis Berita</h5>
            </div>
              <?php foreach($berita as $key){?>
              <div class="col-md-4" style="max-width: 100%; padding: 0px">
                <div class="card ">
                    <!--<img class="card-img-top" src="<?php echo base_url()?>uploads/berita/<?php echo $key->foto; ?>" alt="Card image cap" style="height: 190px; border-top-left-radius: 0px; border-top-right-radius: 0px"> -->
                    <div class="card-body" style="padding: 14px 0px 14px 0px">
                        <a href="<?php echo base_url()?>berita/<?php echo $key->slug; ?>" style="text-decoration: none"><p class="card-title" style="color: #343434; font-size: 14px; letter-spacing: -.01em; line-height: 1.5; margin-bottom:9px"><?php echo $key->judul; ?></p></a>
                        <p class="card-text" style="font-weight: bold; font-size: 14px; color: #838E95; margin-bottom:4px; font-size: 12px"><?php echo date('l, d F Y', strtotime($key->tanggal_posting));  //echo " <br/> ".$this->Model->waktu_lalu($key->tanggal_posting); ?></p>
                    </div>
                </div>
              </div>
              <hr style="margin: 0px"/>
              <?php } ?>
              <h5 style="margin: 36px 0px 16px 0px">Pengumuman</h5>
              <div style="border: 2px solid #FDCB2C;margin-bottom: 18px;width: 100px;"></div>
              <?php foreach($pengumuman as $key){?>
                <div class="col-md-4" style="max-width: 100%; padding: 0px">
                <div class="card ">
                    <div class="card-body" style="padding: 14px 0px 14px 0px">
                        <a href="<?php echo base_url()?>pengumuman/<?php echo $key->slug; ?>" style="text-decoration: none"><p class="card-title" style="color: #343434; font-size: 14px; letter-spacing: -.01em; line-height: 1.5; margin-bottom:9px"><?php echo $key->judul; ?></p></a>
                        <p class="card-text" style="font-weight: bold; font-size: 14px; color: #838E95; margin-bottom:4px; font-size: 12px"><?php echo date('l, d F Y', strtotime($key->tanggal_posting));  //echo " <br/> ".$this->Model->waktu_lalu($key->tanggal_posting); ?></p>
                    </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
      </div>
      <!-- /.row -->
      <br/>
    </div>