<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Detail extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(['url','tgl_indo']);
		$this->load->database();
	}

	private function template($content,$data=null){ 
		$data['content'] = $this->load->view($content,$data,true);
		$this->load->view('front/2-content',$data);
	}

	function index($id = null){ 
		$cekId = $this->db->select('count(*) as total')->where('id', $id)->get('bucket_book_about')->row();
		if($cekId->total > 0){
			if($id == null or $id == ''){
				redirect('/');
			}else{
				$this->data['block'] 				= $this->db->order_by('page_order')->get('statis_home')->result();
				$this->data['profile']				= $this->db->get('setting_profile')->row();
				$this->data['data']					= $this->db->where('id', $id)->get('bucket_book_about')->row();
				$this->data['menu']					= $this->menu(0,$h="");
				$this->data['menu_side']			= $this->menu_side(0,$h="");
				
				$this->template('main', $this->data);
			}
		}else{
			redirect('/');
		}
	}

	public function menu($parent = null,$hasil){

		$w 			= $this->db->query("SELECT a.custome_link,a.label,a.id,b.judul,b.slug,a.page_type from master_menu a left join bucket_page b on b.id=a.link where a.parent='".$parent."' order by sort");
		
		$no = 1; 
		foreach($w->result() as $h){

				$cek_anak = $this->db->query("SELECT * from master_menu a left join bucket_page b on b.id = a.link where a.parent='".$h->id."'");

				// -- Jika hasilnya nya 0 dan tidak ada anak 
				if($parent == 0 and $cek_anak->num_rows() > 1){
					$hasil .= '<li class="nav-item dropdown" ><a class="nav-link dropdown-toggle" href="#"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$h->label.'</a><ul class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown" >';
				}elseif($cek_anak->num_rows() > 0){
					$hasil .= '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$h->label.'</a><ul class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">';
				// -- Jika hasilnya nya tidak kosong
				}else{

					$check 		= $this->db->select('count(*) as total')->where('id', $h->page_type)->where('is_trash', 1)->get('bucket_kategori')->row();
					
					if($check->total == '' or $check->total == null or $check->total < 1 and $h->page_type == 5){
						$hasil .= '<li  class="nav-item "><a class="dropdown-item" href="'.base_url('page/').''.$h->slug.'" >'.$h->label.'</a>';
					}elseif($h->page_type == 6){
						$hasil .= '<li  class="nav-item "><a class="dropdown-item" href="'.$h->custome_link.'" >'.$h->label.'</a>';
					}else{
						$kategori 	= $this->db->where('is_trash', 1)->get('bucket_kategori')->result();

						foreach($kategori as $k){
							if($k->id == $h->page_type){
								$hasil .= '<li  class="nav-item "><a class="dropdown-item" href="'.base_url('blog/categori/').''.$k->id.'" >'.$h->label.'</a>';
							}else{

							}
						}
					}
				}

				$hasil = $this->menu($h->id,$hasil);
				if($parent  == 0 and $cek_anak->num_rows() > 1){
					$hasil .= '</ul></li>';
				}elseif($cek_anak->num_rows() > 0){
					$hasil .= '</ul></li>';
				}else{
					$hasil .= '</li>';
				}
		
				$no++; 
		}

		return $hasil;
	}
	/* -- http://gedelumbung.com/ */

	private function menu_side($parent=null,$hasil){
 
		$w = $this->db->query("SELECT a.label,a.id,b.judul,b.slug,a.page_type from master_menu a left join bucket_page b on b.id=a.link where a.parent='".$parent."' ");
		
		// -- master 
		//if(($w->num_rows()) > 0){
		//	$hasil .= '<ul class="navbar-nav">';
		//}

		$no =1;
		foreach($w->result() as $h){

			//$link = $slug->slug;
				$cek_anak = $this->db->query("SELECT * from master_menu a left join bucket_page b on b.id=a.link where a.parent='".$h->id."' ");

				// -- Jika parent nya 0 dan tidak ada anak li tampilkan dropdown 
				if($cek_anak->num_rows() > 0){
					$hasil .= '<li style="list-style-type: none;" ><a href="" ><i style="color: #FDCB2C" class="fas fa-angle-right"></i> &nbsp;'.$h->label.'</a><ul style="padding-left: 20px;">';
				// -- Jika parent nya 
				}else{
					if($h->page_type == 0){
						//$hasil .= '<li  style="list-style-type: none;"><a href="'.base_url().'" ><i class="fas fa-angle-right"></i> &nbsp;'.$h->label.'</a><hr style="margin: 5px"/>';
					}elseif($h->page_type == 1){
						//$hasil .= '<li  style="list-style-type: none;"><a href="'.base_url().'berita" ><i class="fas fa-angle-right"></i> &nbsp;'.$h->label.'</a> <hr style="margin: 5px"/>';
					}elseif($h->page_type == 2){
						//$hasil .= '<li style="list-style-type: none;"><a href="'.base_url().'agenda" ><i class="fas fa-angle-right"></i> &nbsp; '.$h->label.'</a> <hr style="margin: 5px"/>';
					}elseif($h->page_type == 3){
						//$hasil .= '<li  style="list-style-type: none;"><a href="'.base_url().'artikel" ><i class="fas fa-angle-right"></i> &nbsp;'.$h->label.'</a> <hr style="margin: 5px"/>';
					}elseif($h->page_type == 4){
						//$hasil .= '<li  style="list-style-type: none;"><a href="'.base_url().'pengumuman" ><i class="fas fa-angle-right"></i> &nbsp;'.$h->label.'</a> <hr style="margin: 5px"/>';
					}else{
						$hasil .= '<li  style="list-style-type: none;"><a href="'.base_url('page/').''.$h->slug.'" ><i style="color: #FDCB2C" class="fas fa-angle-right"></i> &nbsp;'.$h->label.'</a> ';
					}
				}

					$hasil = $this->menu_side($h->id,$hasil);

				if($cek_anak->num_rows() > 0){
					$hasil .= '</ul></li>';
				}else{
					$hasil .= '</li>';
				}
		
				$no++; 

		}

		//if(($w->num_rows)>0){
		//	$hasil .= "</ul>";
		//}

		return $hasil;
	}
	/* -- http://gedelumbung.com/ */
}