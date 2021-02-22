<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="section-title" style="padding-left: 16px">
              <h2 >Recent Posting</h2>
            </div>
            <?php foreach($posting as $key){ ?>
            <div class="post-entry-2 d-flex">
              <div class="thumbnail order-md-2" style="object-fit: cover; width: 247px; height: 152px; background-image: url('<?php echo base_url('uploads/entries/');?><?php echo $key->foto; ?>')"></div>
              <div class="contents">
                <h2><a href="<?php echo base_url('posting/');?><?php echo $key->id_kat.'/'.$key->slug; ?>"><?php echo $key->judul; ?></a></h2>
                <p class="mb-3"><?php echo $key->deskripsi; ?></p>
                <div class="post-meta">
                  <span class="d-block"><a href="#"><?php $user = $this->db->where('id', $key->insert_by)->get('users')->result(); print_r($user[0]->username); ?></a> • <?php echo strtolower($key->nm_kat); ?></span>
                  <span class="date-read"><?php echo date('d M Y', strtotime($key->tanggal_posting)); ?><span class="mx-1">•</span> <?php echo $this->ModelWaktuLalu->WaktuLalu($key->tanggal_posting); ?> <span class="mx-1">•</span> <?php echo $key->read; ?> read </span>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="col-lg-4">
            <div class="section-title">
              <h2>Popular Page</h2>
            </div>
            <?php $no = 1; foreach($popular_page as $key){ ?>
            <div class="trend-entry d-flex">
              <div class="number align-self-start"><?php echo $no; ?></div>
              <div class="trend-contents">
                <h2><a href="<?php echo base_url('page/')?><?php echo $key->slug; ?>"><?php echo $key->judul;?></a></h2>
                <div class="post-meta">
                  <span class="d-block"><?php $create_by = $this->db->where('id', $key->insert_by)->get('users')->result(); print_r($create_by[0]->username);?></span>
                  <span class="date-read"><?php echo $this->ModelWaktuLalu->WaktuLalu($key->tanggal_posting); ?> <span class="mx-1">•</span> <?php echo $key->read; ?> Read </span>
                </div>
              </div>
            </div>
            <?php $no++; } ?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <center><div style="padding-left: 16px"><?php echo $pagination; ?></div></center>
          </div>
        </div>
      </div>
    </div>