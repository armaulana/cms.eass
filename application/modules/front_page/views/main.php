    <div class="site-section" style="padding-top: 64px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 single-content">
            <p class="mb-5">
              <img src="<?php echo base_url('uploads/page/');?><?php echo $data->foto;?>" alt="Image" class="img-fluid" style="width: 100%; height: 380px">
            </p>  
            <h1 class="mb-4">
              <?php echo $data->judul; ?>
            </h1>
            <div class="post-meta d-flex mb-3">
              <div class="vcard">
                <span class="date-read"><?php $create_by =  $this->db->where('id', $data->insert_by)->get('users')->result(); print_r($create_by[0]->username); ?> <span class="mx-1">•</span> <?php echo $data->read; ?> Read </span>
              </div>
            </div>
            <?php echo $data->kontent;?>
          </div>
          <div class="col-lg-4 ml-auto">
            <div class="section-title">
              <h2>Popular Page</h2>
            </div>
            <?php $no = 1; foreach($popular_page as $key){  ?>
            <div class="trend-entry d-flex">
              <div class="number align-self-start"><?php echo $no; ?></div>
              <div class="trend-contents">
                <h2><a href="<?php echo base_url('page/');?><?php echo $key->slug; ?>"><?php echo $key->judul; ?></a></h2>
                <div class="post-meta">
                  <span class="d-block"><a href="#"><?php $create_by = $this->db->where('id', $key->insert_by)->get('users')->result(); print_r($create_by[0]->username);?></a> in <a href="#">Page</a></span>
                  <span class="date-read"><span class="mx-1"><span class="icon-star2"></span></span> <?php echo $key->read; ?> read </span>
                </div>
              </div>
            </div>
            <?php $no++; } ?>
            <br/>
            <br/>
            <div class="section-title">
              <h2>Popular Posts</h2>
            </div>
            <?php foreach($popular_posting as $key){ ?>
            <div class="post-entry-2 d-flex bg-light">
              <div class="thumbnail" style="background-image: url('<?php echo base_url('uploads/entries/');?><?php echo $key->foto;?>');"></div>
              <div class="contents">
                <h2><a href="<?php echo base_url('posting/');?><?php echo $key->slug; ?>"><?php echo $key->judul; ?></a></h2>
                <div class="post-meta">
                  <span class="d-block"><a href="#"><?php $create_by = $this->db->where('id', $key->insert_by)->get('users')->result(); print_r($create_by[0]->username);?></a></span>
                  <span class="date-read"><?php echo $this->ModelWaktuLalu->WaktuLalu($key->tanggal_posting); ?><span class="mx-1">•</span> <?php echo $key->read; ?> read </span>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>