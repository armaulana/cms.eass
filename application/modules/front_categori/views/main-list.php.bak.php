    <!-- Page Content -->
    <div class="container">

      <div class="row" style="margin-top: 64px; margin-bottom: 64px;">
        <div class="col-md-8" style="margin-top: 36px">
            <?php foreach($page as $key){?>
            <div class="media" style="padding-top: 12px; padding-bottom: 12px">
                <a class="media-left" href="#">
                  <img class="media-object" src="<?php echo base_url()?>uploads/berita/<?php echo $key->foto;?>" style="height: 200px; width: 200px; object-fit: cover; ">
                </a>
                <div class="media-body" style="padding-left: 16px; padding-right: 16px">
                    <p class="card-text" style="font-size: 14px; color: #838E95; margin-bottom:4px; font-size: 12px"><?php echo date('l, d F Y', strtotime($key->tanggal_posting));  //echo " <br/> ".$this->Model->waktu_lalu($key->tanggal_posting); ?></p>
                    <p class="card-title" style="color: #343434; font-size: 18px; font-weight: bold; letter-spacing: -.01em; line-height: 1.5; margin-bottom:9px"><?php echo $key->judul;?></p>
                    <p class="card-text" style="font-size: 14px; color: #838E95"><?php echo $key->deskripsi;?> </p>
                    <a href="<?php echo base_url()?>berita/<?php echo $key->slug;?>" class="btn btn-primary" style="color: #1bb155; font-size: 12px; font-weight: bold; letter-spacing: -.01em; line-height: 1.5; margin-bottom:9px">Selengkapnya</a>
                </div>
            </div>
            <?php } ?> 

          <center><div style="border-radius: 0px;margin-top: 40px"><?php echo $this->pagination->create_links(); ?></div></center>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-md-4 mb-4">
            <div style="float: left">
              <h5 style="margin: 36px 0px 16px 0px">Artikel</h5>
              <div style="border: 2px solid #FDCB2C;margin-bottom: 18px;width: 100px;"></div>
              <?php foreach($artikel as $key){?>
              <div class="col-md-4" style="max-width: 100%; margin-bottom: 0px">
                <div class="card ">
                    <div class="card-body" style="padding: 14px 0px 14px 0px;border-bottom: 1px solid #66666638;border-bottom-style: dashed;">
                        <p class="card-text" style="font-size: 14px; color: #838E95; margin-bottom:4px; font-size: 12px"><?php echo date('l, d F Y', strtotime($key->tanggal_posting));  //echo " <br/> ".$this->Model->waktu_lalu($key->tanggal_posting); ?></p>
                        <a href="<?php echo base_url()?>artikel/<?php echo $key->slug;?>" style="text-decoration: none"><p class="card-title" style="color: #343434; font-size: 14px; font-weight: bold; letter-spacing: -.01em; line-height: 1.5; margin-bottom:9px"><?php echo $key->judul;?></p></a>
                    </div>
                </div>
              </div>
              <?php } ?>
            </div>
        </div>
      </div>

    </div>