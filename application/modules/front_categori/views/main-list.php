    <!-- Page Content -->
    <div class="container">
      <div class="row" >
          <div class="col-lg-1 mb-4" style="text-align: center; font-size: 44px; margin-top: 96px;">
            <i class="fa fa-facebook-square" style="color: #29487d"></i>
            <i class="fa fa-twitter-square" style="color: #006dbf"></i>
            <i class="fa fa-whatsapp" style="color: #1ebea5"></i>
          </div>

        <!-- /.col-lg-8 -->
        <div class="col-md-8 mb-4">
          <p style="margin-top: 68px; margin-bottom: 12px; font-size: 12px;">Home » Berita</p>
          <h1 class="cus-mt">Berita</h1>
          <?php //$no = 1; foreach($page as $key ){ ?>
            <div class="row" style="margin-top: 16px; margin-bottom: <?php //if($no == 1){ echo "24px"; }else{ echo "20xp";} ?>">
                <div class="col-sm-6">
                    <img src="<?php echo base_url()?>/uploads/berita/<?php //echo $key->foto?>" style="width: 100%; object-fit: cover; height: 264px; border-top-left-radius: 8px; border-top-right-radius: 8px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; -webkit-box-shadow: 0 2px 4px 0px rgba(0, 0, 0, 0.2); -moz-box-shadow: 0 2px 4px 0px rgba(0, 0, 0, 0.2); box-shadow: 0 2px 4px 0px rgba(0, 0, 0, 0.2);">
                    <div class="" style="top: 0;position: absolute;/* left: 0; */text-align: center;"><a href="" class="btn btn-read-more" style="padding: 4px 50px 4px 50px;border-top-left-radius: 8px;border-top-right-radius: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 8px;"><?php //echo $key->nm_kat; ?></a></div>
                </div>
                <div class="col-sm-6" style="padding-top: 6px;">
                    <p style="font-weight: bold; margin-bottom: 14px; font-size: 16px; line-height: 24px; font-family: montserrat-regular; "><?php //echo $key->judul; ?></p>
                    <p style="margin-bottom: 12px; font-size: 12px; line-height: 24px; color : #666666a2"><?php //echo $key->insert_date; ?></p>
                    <p style="font-size: 12px; line-height: 24px; color : #717072"><?php //echo $key->deskripsi; ?></p>
                    <a href="<?php echo base_url()?>blog/<?php //echo $key->slug; ?>" class="btn btn-read-more">Read More</a>
                </div>
            </div>
          <?php //} ?>
          <center><div style="border-radius: 0px;margin-top: 45px;text-align: center;margin-left: 50%;margin-right: 50%;margin-bottom: 45px;"><?php echo $this->pagination->create_links(); ?></div></center>
        </div>
        <div class="col-md-3 mb-4">
          <p style="margin-top: 174px; margin-bottom: 16px; font-size: 16px; font-family: montserrat-regular; font-weight: bold">Kategori</p>
          <div style="border: 2px solid #4cbd28; border-radius: 8px; width: 50px;"></div>
          <?php //$no == 1; foreach($kategori as $key){?>
                <a href="<?php //echo base_url()?>berita/kat/<?php //echo $key->id; ?>" style="text-decoration: none; font-weight: bold"><p style="font-size: 12px;line-height: 24px;color : #717072;padding-top: <?php //if($no == 2 ){ echo "12px";}else{ echo "18px"; } ?>;padding-bottom: 0px; margin: 0px"><i class="fa fa-angle-right"> </i> <i class="fa fa-angle-right"> </i>  <?php //echo $key->nm_kat; ?></p></a>
          <?php //$no++; } ?>
          <p style="margin-top: 22px; margin-bottom: 16px; font-size: 16px; font-family: montserrat-regular; font-weight: bold">Informasi</p>
          <div style="border: 2px solid #4cbd28; border-radius: 8px; width: 50px;"></div>
          <?php //foreach($informasi as $key){?>
                <p style="margin-top: 20px ;margin-bottom: 12px; font-size: 12px; line-height: 24px; color : #666666a2"><?php //echo $key->insert_date; ?></p>
                <a href="<?php echo base_url()?>informasi/<?php //echo $key->slug; ?>" style="text-decoration: none"><p style="font-size: 12px; line-height: 24px; color : #717072"><?php //echo $key->deskripsi; ?></p></a>
          <?php// } ?>
          <p style="margin-top: 22px; margin-bottom: 16px; font-size: 16px; font-family: montserrat-regular; font-weight: bold">Kegiatan</p>
          <div style="border: 2px solid #4cbd28; border-radius: 8px; width: 50px;"></div>
          <?php //foreach($kegiatan as $key){?>
                <p style="margin-top: 20px ;margin-bottom: 12px; font-size: 12px; line-height: 24px; color : #666666a2"><?php //echo $key->insert_date; ?></p>
                <a href="<?php echo base_url()?>kegiatan/<?php //echo $key->slug; ?>" style="text-decoration: none"><p style="font-size: 12px; line-height: 24px; color : #717072"><?php //echo $key->deskripsi; ?></p></a>
          <?php //} ?>
        </div>
      </div>
    </div>