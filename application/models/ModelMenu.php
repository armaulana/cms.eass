<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMenu extends CI_Model{

    public $table = 'mainmenu';
    public $id    = 'id_banner';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function MenuAdmin($parent=null,$hasil=null,$MenuActiveParent,$MenuActiveSub,$MenuActiveSub1){
        $this->db->select(' a.id,a.link,a.label,
                            a.id,a.sort,a.icon, 
                            a.parent,a.tipe,a.newtab,b.access_show,
                            b.access_add, b.access_detail,
                            b.access_edit,b.access_delete'
        );
        $this->db->from('master_menu_administrator a');
        $this->db->join('users_access2 b', 'b.users_menu_id = a.id', 'left');
        $this->db->join('users c', 'c.users_level_id = b.users_level_id', 'left');
        $this->db->where('a.parent', $parent);
        $this->db->where('c.id', $this->session->userdata('user_id'));
        $this->db->order_by('sort');
        $w = $this->db->get();
        $no = 0;
        // -- Mulai perulangan  
		foreach($w->result() as $h){
            
            if($MenuActiveParent == $h->label){  
                $active = 'active';
            }elseif($MenuActiveSub == $h->label) {
                $active = 'active';
            }elseif($MenuActiveSub1 == $h->label) {
                $active = 'active';
            }else{
                $active = '';
            }

            if($h->newtab == 1){
                $newtab = "_BLANK";
            }else{
                $newtab = "";
            }

            $this->db->select('*');
            $this->db->from('master_menu_administrator a');
            $this->db->join('users_access2 b', 'b.users_menu_id = a.id', 'left');
            $this->db->join('users c', 'c.users_level_id = b.users_level_id');
            $this->db->where('c.id', $this->session->userdata('user_id'));
            $this->db->where('a.parent', $h->id);
            $cek_anak = $this->db->get();
            // -- Jika parent nya 0 dan punya anak li tampilkan dropdown 
            if($cek_anak->num_rows() > 0){
                if($h->access_show == 0 || $h->access_show == null || $h->access_show == ''){}else{
                   $hasil .= '  <li class="treeview '.$active.'">
                                <a  class="" href="#" >
                                <i class="fa '.$h->icon.'">
                                </i>'
                                .$h->label.'
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                <small class="label pull-right" style="background-color: #605ca8 !important;">&nbsp;</small></span>
                                </a>
                                <ul class="treeview-menu" >';
                }
            // -- Jika parent nya tidak kosong
			}else{
                if($h->access_show == 0 || $h->access_show == null || $h->access_show == ''){}else{
                    // Tipe Label
                    if($h->tipe == 0){
                        $hasil .= '<li class="header">'.$h->label.'</li>';
                    // Tipe Menu
                    }elseif($h->tipe == 1 && $h->parent == 0){
                        $hasil .= ' <li class="'.$active.'">
                                    <a class="" href="'.base_url('').''.$h->link.'" target="'.$newtab.'"">
                                    <i class="fa '.$h->icon.'"></i>'
                                    .$h->label.
                                    '</a>';
                    }else{
                        $hasil .= ' <li class="'.$active.'">
                                    <a class="" href="'.base_url('').''.$h->link.'">
                                    <i class="fa '.$h->icon.'"></i>'
                                    .$h->label.
                                    '</a>';
                    }
                }
            }
            $hasil = $this->MenuAdmin($h->id,$hasil,$MenuActiveParent,$MenuActiveSub,$MenuActiveSub1);                    
			if($cek_anak->num_rows() > 0){
				$hasil .= '</ul></li>';
			}else{
				$hasil .= '</li>';
			}
			$no++; 
		}
        // -- Selesai Perulangan
		return $hasil;
	}

    function MenuFront($parent = null, $hasil = null){
        $this->db->select('a.custome_link,a.label,a.id,a.page_type,a.sort,b.judul,b.slug');
        $this->db->from('master_menu a');
        $this->db->join('bucket_page b', 'b.id = a.link', 'left');
        $this->db->where('a.parent', $parent);
        $this->db->order_by('sort');
        $w = $this->db->get();
        $result = $w->result();
        $no = 1;
        // -- Mulai Perulangan
        foreach($result as $h){
            $this->db->select('*');
            $this->db->from('master_menu a');
            $this->db->join('bucket_page b', 'b.id = a.link', 'left');
            $this->db->where('a.parent', $h->id);
            $cek_anak = $this->db->get();
            // -- Jika hasilnya nya 0 dan tidak ada anak 
            if($parent == 0 and $cek_anak->num_rows() > 1){
               $hasil .= '  <li class="nav-item dropdown" >
                            <a  class="nav-link dropdown-toggle" 
                                href="#"  id="navbarDropdown" 
                                role="button" data-toggle="dropdown" >'
                                .$h->label.'
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown" >';
            }elseif($cek_anak->num_rows() > 0){
                $hasil .= ' <li class="dropdown-submenu">
                            <a  class="nav-link dropdown-toggle" 
                                href="#"  id="navbarDropdown" 
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                                .$h->label.'
                            </a>
                            <ul class="dropdown-menu">';
            // -- Jika hasilnya nya tidak kosong
            }else{
                $this->db->select('COUNT(*) as total');
                $this->db->where('id', $h->page_type);
                $this->db->where('is_trash', 1);
                $check  =  $this->db->get('bucket_posting_category')->row();
                if($check->total == '' OR $check->total == null OR $check->total < 1 AND $h->page_type == 5){
                   $hasil .= '  <li class="nav-item ">
                                <a  class="nav-link" 
                                    href="'.base_url('page/').''
                                    .$h->slug.
                                '" >'
                                .$h->label.'
                                </a>';
                }elseif($h->page_type == 6){
                    $hasil .= ' <li class="nav-item ">
                                <a  class="nav-link" 
                                    href="'
                                    .$h->custome_link.
                                '" >'
                                .$h->label.'
                                </a>';
                }else{
                    $this->db->where('is_trash', 1);
                    $kategori = $this->db->get('bucket_posting_category')->result();
                    foreach($kategori as $k){
                                if($k->id == $h->page_type){
                                    $hasil .= ' <li class="nav-item"> 
                                                <a  class="nav-link" 
                                                    href="'.base_url('posting/').''
                                                    .$k->id.'
                                                ">'
                                                .$h->label.'
                                                </a>
                                                </li> ';
                                }else{
                                }
                            }
                    }
            }
            $hasil = $this->MenuFront($h->id,$hasil);
            if($parent  == 0 and $cek_anak->num_rows() > 1){
                $hasil .= '</ul></li>';
            }elseif($cek_anak->num_rows() > 0){
                $hasil .= '</ul></li>';
            }else{
                $hasil .= '</li>';
            }
            $no++; 
        }
        // -- Selesai Perulangan 
        return $hasil;
    }
}

?>