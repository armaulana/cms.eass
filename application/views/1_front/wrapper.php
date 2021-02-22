<?php $this->load->view('1_front/1-header'); ?>

    <?php foreach($block as $key){ 
              $dt['id'] = $key->page_id;
              $dt['deskripsi'] = $key->deskripsi;
              $dt['kontent'] = $key->kontent;
              $dt['foto'] = $key->foto;
              $dt['status_video'] = $key->status_video;
              $dt['slug'] = $key->slug;
              $dt['page_title'] = $key->page_title;
              $dt['page_judul_title'] = $key->page_judul_title;
              $dt['videos'] = $key->video;
              $this->load->view(trim($key->page_url), $dt);
    } ?>

<?php $this->load->view('1_front/3-footer'); ?>