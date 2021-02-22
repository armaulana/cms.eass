<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends CI_Controller {
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

			$kueri = $this->db->query("select * from bucket_blog where is_trash = 1");
						 
			$config['base_url']        = base_url().'blog/pg/0';
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
						 
			$this->data['page']         = $this->model->blog($config['per_page'],$this->uri->segment(4));
					
			$this->data['block'] 		= $this->db->order_by('page_order')->get('statis_home')->result();
			$this->data['kategori']				= $this->db->where('is_trash', 1)->limit(5)->get('bucket_kategori')->result();
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
	 
			$config['base_url']        = base_url().'blog/pg/0';
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
	 
			$this->data['page']         = $this->model->blog($config['per_page'],$this->uri->segment(3));

			$this->data['block'] 				= $this->db->order_by('page_order')->get('statis_home')->result();
			$this->data['menu']					= $this->menu(0,$h="");

			$this->template('main-list', $this->data);
		}else{

			$this->db->where('slug', $slug);
			$ambil = $this->db->get('bucket_blog')->row();
			
			$update = $ambil->read+1;
			
			$count = $this->db->query("UPDATE bucket_blog SET `read`='".$update."' WHERE `slug`='".$slug."';");

			$this->data['block'] 	= $this->db->order_by('page_order')->get('statis_home')->result();
			$this->data['data']		= $this->db->where('is_trash', 1)->where('slug', $slug)->get('bucket_blog')->row();
			$this->data['menu']					= $this->menu(0,$h="");

			$this->template('main', $this->data);
		}
	}

	public function categori($id_kat)
    {
        //echo $this->uri->segment(3);
        //exit();
       $this->load->library('pagination');

       $kueri = $this->db->query("select * from bucket_blog where is_trash=1 and id_kat=".$id_kat);

       $config['base_url']        = base_url().'blog/categori/'.$id_kat;
       $config['total_rows']      = $kueri->num_rows();
       $config['per_page']        = '4';
       $config['first_link']      = '<';
       $config['first_tag_open']  = '<li class="page-item">';
       $config['first_tag_close'] = '</li>';
       $config['last_link']       = '>>';
       $config['last_tag_open']   = '<li class="page-item">';
       $config['last_tag_close']  = '</li>';
       $config['full_tag_open']   = '<nav aria-label="Page navigation example"><ul class="pagination">';
       $config['full_tag_close']  = '</ul></nav>';
       $config['num_tag_open']    = '<li class="page-item">';
       $config['num_tag_close']   = '</li>';
       $config['cur_tag_open']    = '<li class="page-item active"><a href="#" class="page-link">';
       $config['cur_tag_close']   = '</a></li>';
       $config['next_link']       = '>';
       $config['next_tag_open']   = '<li class="page-item">';
       $config['next_tag_close']  = '</li>';
       $config['prev_link']       = '<<';
       $config['prev_tag_open']   = '<li class="page-item">';
       $config['prev_tag_close']  = '</li>';
       $config['attributes']      = array('class' => 'page-link');
       $config['uri_segment']     = 4;

       $this->pagination->initialize($config); 

       $this->data['page']         = $this->model->kategori_berita($config['per_page'],$this->uri->segment(4), $id_kat);
	   
	   $this->data['block'] 	= $this->db->order_by('page_order')->get('statis_home')->result();
	   $this->data['kategori']				= $this->db->where('is_trash', 1)->limit(5)->get('bucket_kategori')->result();
	   //$this->data['data']		= $this->db->where('is_trash', 1)->where('slug', $slug)->get('bucket_berita')->row();
	   $this->data['menu']					= $this->menu(0,$h="");

       $this->template('main-list', $this->data);
    }  

	private function menu($parent=null,$hasil){

		$w = $this->db->query("SELECT a.custome_link,a.label,a.id,b.judul,b.slug,a.page_type from master_menu a left join bucket_page b on b.id=a.link where a.parent='".$parent."' order by sort");

		$no =1; 
		foreach($w->result() as $h){

				$cek_anak = $this->db->query("SELECT * from master_menu a left join bucket_page b on b.id=a.link where a.parent='".$h->id."'");

				// -- Jika parent nya 0 dan tidak ada anak li tampilkan dropdown 
				if($cek_anak->num_rows() > 0){
					$hasil .= '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"  id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$h->label.'</a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio" >';
				// -- Jika parent nya 
				}else{
					if($h->page_type == 0){
						$hasil .= '<li  class="nav-item "><a class="dropdown-item" href="'.base_url().'" style="font-family: Campton-bold;font-size: 16px;color: #4f57cd;">'.$h->label.'</a>';
					}elseif($h->page_type == 1){ // jika 1 maka tampilkan semua blog
						$hasil .= '<li  class="nav-item "><a class="dropdown-item" href="'.base_url().'berita" style="font-family: Campton-bold;font-size: 16px;color: #4f57cd;">'.$h->label.'</a>';
					}elseif($h->page_type == 48){ // jika 48 maka kategori blog berita 
						$hasil .= '<li  class="nav-item "><a class="dropdown-item" href="'.base_url().'blog/" style="font-family: Campton-bold;font-size: 16px;color: #4f57cd;">'.$h->label.'</a>';
					}elseif($h->page_type == 49){ //jika 49 maka kategori blog artikel
						$hasil .= '<li  class="nav-item "><a class="dropdown-item" href="'.base_url().'blog/categori/49" style="font-family: Campton-bold;font-size: 16px;color: #4f57cd;">'.$h->label.'</a>';
					}elseif($h->page_type == 50){ //jika 50 maka kategori blog pengumuman
						$hasil .= '<li  class="nav-item "><a class="dropdown-item" href="'.base_url().'blog/categori/50" style="font-family: Campton-bold;font-size: 16px;color: #4f57cd;">'.$h->label.'</a>';
					}elseif($h->page_type == 51){ //jika 51 maka kategori blog kegiatan
						$hasil .= '<li  class="nav-item "><a class="dropdown-item" href="'.base_url().'blog/categori/51" style="font-family: Campton-bold;font-size: 16px;color: #4f57cd;">'.$h->label.'</a>';
					}elseif($h->page_type == 6){ //jika 6 custome link
						$hasil .= '<li  class="nav-item "><a class="dropdown-item" href="'.$h->custome_link.'" target="_BLANk" style="font-family: Campton-bold;font-size: 16px;color: #4f57cd;">'.$h->label.'</a>';
					}else{ // selain semuanya kehalaman page 
						$hasil .= '<li  class="nav-item "><a class="dropdown-item" href="'.base_url('page/').''.$h->slug.'" style="font-family: Campton-bold;font-size: 16px;color: #4f57cd;">'.$h->label.'</a>';
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

		return $hasil;
	}
	/* -- http://gedelumbung.com/ */
}