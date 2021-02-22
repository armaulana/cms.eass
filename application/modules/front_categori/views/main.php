<div>
    <div class="container">
      <div class="row">
        <div class="col-lg-1 mb-4 d-none d-md-block" style="text-align: center; font-size: 44px; margin-top: 96px;">
            <i class="fa fa-facebook-square" style="color: #29487d"></i>
            <i class="fa fa-twitter-square" style="color: #006dbf"></i>
            <i class="fa fa-whatsapp" style="color: #1ebea5"></i>
        </div>
        <div class="col-lg-8 mb-4">
          <p style="margin-top: 68px; margin-bottom: 12px; font-size: 12px;">Home » Berita » <?php echo $data->judul; ?></p>
          <h1 class="cus-mt"><?php echo $data->judul; ?></h1>
          <p style="margin-top: 12px; margin-bottom: 14px; font-size: 12px; color: #666666a2"><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp; <?php echo $data->insert_date; ?> &nbsp; &nbsp; <i class="fa fa-user" aria-hidden="true"></i> &nbsp; Administrator &nbsp; &nbsp; <i class="fa fa-eye" aria-hidden="true"></i> &nbsp; 0 &nbsp; &nbsp; </p> 
          <img style="margin-bottom: 18px; width: 100%; border-top-left-radius: 8px;  border-top-right-radius: 8px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; -webkit-box-shadow: 0 2px 4px 0px rgba(0, 0, 0, 0.2); -moz-box-shadow: 0 2px 4px 0px rgba(0, 0, 0, 0.2); box-shadow: 0 2px 4px 0px rgba(0, 0, 0, 0.2);" src="<?php echo base_url()?>uploads/berita/<?php echo $data->foto; ?>">
          <div class="text-page">
              <?php echo $data->kontent; ?>
          </div>
          <div style="margin-bottom: 22px">
              <p style="margin-top: 166px; margin-bottom: 18px; font-size: 16px; font-family: montserrat-regular; font-weight: bold">Berita Lainya</p>
              <div style="border: 2px solid #4cbd28; border-radius: 8px; width: 50px;"></div>
              <?php foreach($berita as $key){?>
                    <p style="margin-top: 20px ;margin-bottom: 12px; font-size: 12px; line-height: 24px; color : #666666a2"><?php echo $key->insert_date; ?></p>
                    <a href="<?php echo base_url()?>berita/<?php echo $key->slug; ?>" style="text-decoration: none"><p style="font-size: 24px; line-height: 34px; color : #717072; font-weight: bold"><?php echo $key->judul; ?></p></a>
                    <div style="border: 0.3px solid #4cbd28"></div>
              <?php } ?>
          </div>
        </div>
        <div class="col-md-3 mb-4">
            <p style="margin-top: 174px; margin-bottom: 16px; font-size: 16px; font-family: montserrat-regular; font-weight: bold">Informasi</p>
            <div style="border: 2px solid #4cbd28; border-radius: 8px; width: 50px;"></div>
            <?php foreach($informasi as $key){?>
                  <p style="margin-top: 20px ;margin-bottom: 12px; font-size: 12px; line-height: 24px; color : #666666a2"><?php echo $key->insert_date; ?></p>
                  <a href="<?php echo base_url()?>informasi/<?php echo $key->slug; ?>" style="text-decoration: none"><p style="font-size: 12px; line-height: 24px; color : #717072"><?php echo $key->deskripsi; ?></p></a>
            <?php } ?>
            <p style="margin-top: 22px; margin-bottom: 16px; font-size: 16px; font-family: montserrat-regular; font-weight: bold">Kegiatan</p>
            <div style="border: 2px solid #4cbd28; border-radius: 8px; width: 50px;"></div>
            <?php foreach($kegiatan as $key){?>
                  <p style="margin-top: 20px ;margin-bottom: 12px; font-size: 12px; line-height: 24px; color : #666666a2"><?php echo $key->insert_date; ?></p>
                  <a href="<?php echo base_url()?>kegiatan/<?php echo $key->slug; ?>" style="text-decoration: none"><p style="font-size: 12px; line-height: 24px; color : #717072"><?php echo $key->deskripsi; ?></p></a>
            <?php } ?>
        </div>
      </div>

    </div>
</div>