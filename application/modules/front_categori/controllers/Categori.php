<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categori extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(['url','tgl_indo']);
		$this->load->model('Model','model');
		$this->load->database();
	}

	private function template($content,$data=null){ 
		$data['content'] = $this->load->view($content,$data,true);
		$this->load->view('front/content_categori',$data);
	}

	function pg($null = null){
		if($null == '' or $null == null){
			redirect('categori/');
		}else{ 
			//redirect('/');
			$this->load->library('pagination');

			$kueri = $this->db->query("select * from bucket_blog where is_trash = 1");
						 
			$config['base_url']        = base_url().'categori/pg/0';
			$config['total_rows']      = $kueri->num_rows();
			$config['per_page']        = '5';
			$config['first_link']      = '<i class="fa fa-angle-left"></i>';
			$config['first_tag_open']  = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';
			$config['last_link']       = '<i class="fa fa-angle-double-right"></i>';
			$config['last_tag_open']   = '<li class="page-item">';
			$config['last_tag_close']  = '</li>';
			$config['full_tag_open']   = '<nav aria-label="Page navigation example"><ul class="pagination">';
			$config['full_tag_close']  = '</ul></nav>';
			$config['num_tag_open']    = '<li class="page-item">';
			$config['num_tag_close']   = '</li>';
			$config['cur_tag_open']    = '<li class="page-item active"><a href="#" class="page-link">';
			$config['cur_tag_close']   = '</a></li>';
			$config['next_link']       = '<i class="fa fa-angle-right"></i>';
			$config['next_tag_open']   = '<li class="page-item">';
			$config['next_tag_close']  = '</li>';
			$config['prev_link']       = '<i class="fa fa-angle-double-left"></i>';
			$config['prev_tag_open']   = '<li class="page-item">';
			$config['prev_tag_close']  = '</li>';
			$config['attributes']      = array('class' => 'page-link');
			$config['uri_segment']     = 4;
						 
			$this->pagination->initialize($config); 
						 
			$this->data['page']         = $this->model->berita($config['per_page'],$this->uri->segment(4));
			
			$this->data['profile']				= $this->db->get('setting_profile')->row();
			$this->data['sosial_media']			= $this->db->where('is_trash', 1)->get('bucket_sosial_media')->result();
			$this->data['block'] 		= $this->db->order_by('page_order')->get('statis_home')->result();
			$this->data['menu']					= $this->menu(0,$h="");
			
			$this->template('main-list', $this->data);
		}
	}

	function index($slug = null){ 
		$this->load->model('Model','model');
		if($slug == null or $slug == ''){
			//redirect('/');
			$this->load->library('pagination');

			$kueri = $this->db->query("select * from bucket_blog where is_trash = 1");
	 
			$config['base_url']        = base_url().'categori/pg/0';
			$config['total_rows']      = $kueri->num_rows();
			$config['per_page']        = '5';
			$config['first_link']      = '<i class="fa fa-angle-left"></i>';
			$config['first_tag_open']  = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';
			$config['last_link']       = '<i class="fa fa-angle-double-right"></i>';
			$config['last_tag_open']   = '<li class="page-item">';
			$config['last_tag_close']  = '</li>';
			$config['full_tag_open']   = '<nav aria-label="Page navigation example"><ul class="pagination">';
			$config['full_tag_close']  = '</ul></nav>';
			$config['num_tag_open']    = '<li class="page-item">';
			$config['num_tag_close']   = '</li>';
			$config['cur_tag_open']    = '<li class="page-item active"><a href="#" class="page-link">';
			$config['cur_tag_close']   = '</a></li>';
			$config['next_link']       = '<i class="fa fa-angle-right"></i>';
			$config['next_tag_open']   = '<li class="page-item">';
			$config['next_tag_close']  = '</li>';
			$config['prev_link']       = '<i class="fa fa-angle-double-left"></i>';
			$config['prev_tag_open']   = '<li class="page-item">';
			$config['prev_tag_close']  = '</li>';
			$config['attributes']      = array('class' => 'page-link');
			$config['uri_segment']     = 3;
	 
			$this->pagination->initialize($config); 
	 
			$this->data['page']         = $this->model->berita($config['per_page'],$this->uri->segment(3));

			$this->data['profile']				= $this->db->get('setting_profile')->row();
			$this->data['sosial_media']			= $this->db->where('is_trash', 1)->get('bucket_sosial_media')->result();
			$this->data['block'] 				= $this->db->order_by('page_order')->get('statis_home')->result();
			$this->data['menu']					= $this->menu(0,$h="");

			$this->template('main-list', $this->data);
		}else{

			$this->db->where('slug', $slug);
			$ambil = $this->db->get('bucket_blog')->row();
			
			$update = $ambil->read+1;
			
			$count = $this->db->query("UPDATE bucket_blog SET `read`='".$update."' WHERE `slug`='".$slug."';");

			$this->data['block'] 	= $this->db->order_by('page_order')->get('statis_home')->result();
			$this->data['profile']				= $this->db->get('setting_profile')->row();
			$this->data['sosial_media']			= $this->db->where('is_trash', 1)->get('bucket_sosial_media')->result();
			$this->data['menu']					= $this->menu(0,$h="");

			$this->template('main', $this->data);
		}
	}

	public function menu($parent = null,$hasil){

		$w 			= $this->db->query("SELECT a.custome_link,a.label,a.id,b.judul,b.slug,a.page_type from master_menu a left join bucket_page b on b.id=a.link where a.parent='".$parent."' order by sort");
		
		$no = 1; 
		foreach($w->result() as $h){

				$cek_anak = $this->db->query("SELECT * from master_menu a left join bucket_page b on b.id = a.link where a.parent='".$h->id."'");

				// -- Jika hasilnya nya 0 dan tidak ada anak 
				if($parent == 0 and $cek_anak->num_rows() > 1){
					$hasil .= '<li class="nav-item dropdown" ><a class="nav-link dropdown-toggle" href="#"  id="navbarDropdown" role="button" data-toggle="dropdown" >'.$h->label.'</a><ul class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown" >';
				}elseif($cek_anak->num_rows() > 0){
					$hasil .= '<li class="dropdown-submenu"><a class="nav-link dropdown-toggle" href="#"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$h->label.'</a><ul class="dropdown-menu">';
				// -- Jika hasilnya nya tidak kosong
				}else{

					$check 		= $this->db->select('count(*) as total')->where('id', $h->page_type)->where('is_trash', 1)->get('bucket_kategori')->row();
					
					if($check->total == '' or $check->total == null or $check->total < 1 and $h->page_type == 5){
						$hasil .= '<li  class="nav-item ">es<a class="nav-link" href="'.base_url('page/').''.$h->slug.'" >'.$h->label.'</a>';
					}elseif($h->page_type == 6){
						$hasil .= '<li  class="nav-item "><a class="nav-link" href="'.$h->custome_link.'" >'.$h->label.'</a>';
					}else{
						$kategori 	= $this->db->where('is_trash', 1)->get('bucket_kategori')->result();

						foreach($kategori as $k){
							if($k->id == $h->page_type){
								$hasil .= '<li class="nav-item"> <a class="nav-link" href="'.base_url('blog/categori/').''.$k->id.'">'.$h->label.'</a> </li> ';
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
}