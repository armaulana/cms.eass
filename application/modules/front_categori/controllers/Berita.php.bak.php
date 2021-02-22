<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Berita extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(['url','tgl_indo']);
		$this->load->model('Model','model');
		$this->load->database();
	}

	private function template($content,$data=null){ 
		$data['content'] = $this->load->view($content,$data,true);
		$this->load->view('front/content_berita',$data);
	}

	function pg($null = null){
		if($null == '' or $null == null){
			redirect('berita/');
		}else{ 
			//redirect('/');
			$this->load->library('pagination');

			$kueri = $this->db->query("select * from bucket_berita where is_trash = 1");
						 
			$config['base_url']        = base_url().'berita/pg/0';
			$config['total_rows']      = $kueri->num_rows();
			$config['per_page']        = '5';
			$config['first_link']      = '<i class="fas fa-angle-left"></i>';
			$config['first_tag_open']  = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';
			$config['last_link']       = '<i class="fas fa-angle-double-right"></i>';
			$config['last_tag_open']   = '<li class="page-item">';
			$config['last_tag_close']  = '</li>';
			$config['full_tag_open']   = '<nav aria-label="Page navigation example"><ul class="pagination">';
			$config['full_tag_close']  = '</ul></nav>';
			$config['num_tag_open']    = '<li class="page-item">';
			$config['num_tag_close']   = '</li>';
			$config['cur_tag_open']    = '<li class="page-item active"><a href="#" class="page-link">';
			$config['cur_tag_close']   = '</a></li>';
			$config['next_link']       = '<i class="fas fa-angle-right"></i>';
			$config['next_tag_open']   = '<li class="page-item">';
			$config['next_tag_close']  = '</li>';
			$config['prev_link']       = '<i class="fas fa-angle-double-left"></i>';
			$config['prev_tag_open']   = '<li class="page-item">';
			$config['prev_tag_close']  = '</li>';
			$config['attributes']      = array('class' => 'page-link');
			$config['uri_segment']     = 4;
						 
			$this->pagination->initialize($config); 
						 
			$this->data['page']         = $this->model->berita($config['per_page'],$this->uri->segment(4));
					
			$this->data['block'] 		= $this->db->order_by('page_order')->get('statis_home')->result();
			$this->data['polbangtan_indonesia']	= $this->db->where('is_trash', 1)->get('bucket_polbangtan_indonesia')->result();
			$this->data['sosial_media']	= $this->db->where('is_trash', 1)->get('bucket_sosial_media')->result();
			$this->data['link_terkait']	= $this->db->where('is_trash', 1)->get('bucket_link_terkait')->result();
			$this->data['berita']	= $this->db->where('is_trash', 1)->limit(3)->get('bucket_berita')->result();
			$this->data['pengumuman']	= $this->db->where('is_trash', 1)->limit(3)->get('bucket_pengumuman')->result();
			$this->data['artikel']	= $this->db->where('is_trash', 1)->get('bucket_artikel')->result();
			$this->data['menu']					= $this->menu(0,$h="");
			
			$this->template('main-list', $this->data);
		}
	}

	function index($slug = null){ 
		$this->load->model('Model','model');
		if($slug == null or $slug == ''){
			//redirect('/');
			$this->load->library('pagination');

			$kueri = $this->db->query("select * from bucket_berita where is_trash = 1");
	 
			$config['base_url']        = base_url().'berita/pg/0';
			$config['total_rows']      = $kueri->num_rows();
			$config['per_page']        = '5';
			$config['first_link']      = '<i class="fas fa-angle-left"></i>';
			$config['first_tag_open']  = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';
			$config['last_link']       = '<i class="fas fa-angle-double-right"></i>';
			$config['last_tag_open']   = '<li class="page-item">';
			$config['last_tag_close']  = '</li>';
			$config['full_tag_open']   = '<nav aria-label="Page navigation example"><ul class="pagination">';
			$config['full_tag_close']  = '</ul></nav>';
			$config['num_tag_open']    = '<li class="page-item">';
			$config['num_tag_close']   = '</li>';
			$config['cur_tag_open']    = '<li class="page-item active"><a href="#" class="page-link">';
			$config['cur_tag_close']   = '</a></li>';
			$config['next_link']       = '<i class="fas fa-angle-right"></i>';
			$config['next_tag_open']   = '<li class="page-item">';
			$config['next_tag_close']  = '</li>';
			$config['prev_link']       = '<i class="fas fa-angle-double-left"></i>';
			$config['prev_tag_open']   = '<li class="page-item">';
			$config['prev_tag_close']  = '</li>';
			$config['attributes']      = array('class' => 'page-link');
			$config['uri_segment']     = 3;
	 
			$this->pagination->initialize($config); 
	 
			$this->data['page']         = $this->model->berita($config['per_page'],$this->uri->segment(3));

			$this->data['block'] 		= $this->db->order_by('page_order')->get('statis_home')->result();
			$this->data['polbangtan_indonesia']	= $this->db->where('is_trash', 1)->get('bucket_polbangtan_indonesia')->result();
			$this->data['sosial_media']	= $this->db->where('is_trash', 1)->get('bucket_sosial_media')->result();
			$this->data['link_terkait']	= $this->db->where('is_trash', 1)->get('bucket_link_terkait')->result();
			$this->data['berita']	= $this->db->where('is_trash', 1)->limit(5)->get('bucket_berita')->result();
			$this->data['pengumuman']	= $this->db->where('is_trash', 1)->limit(3)->get('bucket_pengumuman')->result();
			$this->data['artikel']	= $this->db->where('is_trash', 1)->get('bucket_artikel')->result();
			$this->data['menu']					= $this->menu(0,$h="");

			$this->template('main-list', $this->data);
		}else{
			$this->data['block'] 	= $this->db->order_by('page_order')->get('statis_home')->result();
			$this->data['link_terkait']	= $this->db->where('is_trash', 1)->get('bucket_link_terkait')->result();
			$this->data['polbangtan_indonesia']	= $this->db->where('is_trash', 1)->get('bucket_polbangtan_indonesia')->result();
			$this->data['sosial_media']	= $this->db->where('is_trash', 1)->get('bucket_sosial_media')->result();
			$this->data['berita']	= $this->db->where('is_trash', 1)->limit(5)->get('bucket_berita')->result();
			$this->data['pengumuman']	= $this->db->where('is_trash', 1)->limit(3)->get('bucket_pengumuman')->result();
			$this->data['data']		= $this->db->where('is_trash', 1)->where('slug', $slug)->get('bucket_berita')->row();
			$this->data['menu']					= $this->menu(0,$h="");

			$this->template('main', $this->data);
		}
	}

	private function menu($parent=null,$hasil){

		$w = $this->db->query("SELECT a.label,a.id,b.judul,b.slug,a.page_type from master_menu a left join bucket_page b on b.id=a.link where a.parent='".$parent."'");
		
		// -- master 
		//if(($w->num_rows()) > 0){
		//	$hasil .= '<ul class="navbar-nav">';
		//}

		$no =1;
		foreach($w->result() as $h){

			//$link = $slug->slug;
				$cek_anak = $this->db->query("SELECT * from master_menu a left join bucket_page b on b.id=a.link where a.parent='".$h->id."'");

				// -- Jika parent nya 0 dan tidak ada anak li tampilkan dropdown 
				if($cek_anak->num_rows() > 0){
					$hasil .= '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: .5rem 1rem; font-size: 14px; color: #fff; ">'.$h->label.'</a><ul class="dropdown-menu" style="border: 0.5px solid rgba(0,0,0,.15); background: #22ad58; width: max-content; right:auto; left: auto">';
				// -- Jika parent nya 
				}else{
					if($h->page_type == 0){
						$hasil .= '<li class="nav-item" ><a href="'.base_url().'" class="dropdown-item" style="padding: .5rem 1rem; font-size: 14px; color: #fff; ">'.$h->label.'</a>';
					}elseif($h->page_type == 1){
						$hasil .= '<li class="nav-item" ><a href="'.base_url().'berita" class="dropdown-item" style="padding: .5rem 1rem; font-size: 14px; color: #fff; ">'.$h->label.'</a>';
					}elseif($h->page_type == 2){
						$hasil .= '<li class="nav-item" ><a href="'.base_url().'agenda" class="dropdown-item" style="padding: .5rem 1rem; font-size: 14px; color: #fff; ">'.$h->label.'</a>';
					}elseif($h->page_type == 3){
						$hasil .= '<li class="nav-item" ><a href="'.base_url().'artikel" class="dropdown-item" style="padding: .5rem 1rem; font-size: 14px; color: #fff; ">'.$h->label.'</a>';
					}elseif($h->page_type == 4){
						$hasil .= '<li class="nav-item" ><a href="'.base_url().'pengumuman" class="dropdown-item" style="padding: .5rem 1rem; font-size: 14px; color: #fff; ">'.$h->label.'</a>';
					}else{
						$hasil .= '<li class="nav-item" ><a href="'.base_url('page/').''.$h->slug.'" class="dropdown-item" style="padding: .5rem 1rem; font-size: 14px; color: #fff; ">'.$h->label.'</a>';
					}
				}

					$hasil = $this->menu($h->id,$hasil);

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