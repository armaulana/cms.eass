<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_posting extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('Model','model');
		$this->load->model('ModelMenu');
		$this->load->model('ModelWaktuLalu');
	}

	private function template($content,$data=null){ 
		$data['content'] = $this->load->view($content,$data,true);
		$this->load->view('1_front/2-content',$data);
	}

	public function category($category = null){
		echo $category;
		echo "string-sd-";
	}

	function index($id_kat = null, $slug = null){ 
		$search = $this->db->select('count(*) as count')->where('id_kat', $id_kat)->where('slug', $slug)->get('bucket_posting')->row();
		if($slug == null or $slug == '' or $search->count == 0){
			/*
			$this->load->library('pagination');
			$this->db->select('*');
			$this->db->where('id_kat', $id_kat);
			$this->db->where('is_trash', 1);
			$kueri = $this->db->get('bucket_posting');
			$config['base_url']        = base_url().'posting/pg/0';
			$config['total_rows']      = $kueri->num_rows();
			$config['per_page']        = '3';
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
			$this->data['posting'] 	   		= $this->model->blog($config['per_page'],$this->uri->segment(4),$id_kat);
			$this->data['popular_page']		= $this->db->where('is_trash', 1)->order_by('read', 'DESC')->get('bucket_page')->result();
			$this->data['popular_posting']	= $this->db->where('is_trash', 1)->order_by('read', 'DESC')->limit(4)->get('bucket_posting')->result();
			$this->data['profile']	   = $this->db->get('setting_profile')->row();
			$this->data['menu']		   = $this->ModelMenu->MenuFront(0,$h=""); 
			$arr = array('title'=>'Posting');
			$this->data['title'] 	   = (object) $arr;
			$this->template('main-all', $this->data);
			*/
			$this->load->library('pagination');
			//konfigurasi pagination
	        $config['base_url'] = site_url('posting/index'); //site url
	        $config['total_rows'] = $this->db->count_all('bucket_posting'); //total row
	        $config['per_page'] = 3;  //show record per halaman
	        $config["uri_segment"] = 3;  // uri parameter
	        $choice = $config["total_rows"] / $config["per_page"];
	        $config["num_links"] = floor($choice);
	        // Membuat Style pagination untuk BootStrap v4
	     	$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';
	        $this->pagination->initialize($config);
	        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
	        $this->data['posting'] = $this->model->blog($config["per_page"], $data['page'], $id_kat);   
	        $this->data['pagination'] = $this->pagination->create_links();
	        $this->data['popular_page']		= $this->db->where('is_trash', 1)->order_by('read', 'DESC')->get('bucket_page')->result();
			$this->data['popular_posting']	= $this->db->where('is_trash', 1)->order_by('read', 'DESC')->limit(4)->get('bucket_posting')->result();
			$this->data['profile']	   = $this->db->get('setting_profile')->row();
			$this->data['menu']		   = $this->ModelMenu->MenuFront(0,$h=""); 
			$arr = array('title'=>'Posting');
			$this->data['title'] 	   = (object) $arr;


	        //load view mahasiswa view
	        $this->template('main-all', $this->data);
		}else{
			$this->db->where('slug', $slug);
			$ambil  = $this->db->get('bucket_posting')->row();
			$update = $ambil->read + 1;
			$count  = $this->db->query("UPDATE bucket_posting SET `read`='".$update."' WHERE `slug`='".$slug."';");
			$this->db->where('is_trash', 1);
			$this->db->where('slug', $slug);
			$this->data['data']				= $this->db->get('bucket_posting')->row();
			$this->data['popular_page']		= $this->db->where('is_trash', 1)->order_by('read', 'DESC')->get('bucket_page')->result();
			$this->data['popular_posting']	= $this->db->where('is_trash', 1)->order_by('read', 'DESC')->get('bucket_posting')->result();
			$this->data['profile']			= $this->db->get('setting_profile')->row();
			$this->data['menu']				= $this->ModelMenu->MenuFront(0,$h="");
			$arr = array('title'=>'Posting');
			$this->data['title'] 			= (object) $arr;
			$this->template('main', $this->data);
		}
	}  

	function pg($null = null){
		echo "string";
		exit();
		if($null == '' or $null == null){
			redirect('berita/');
		}else{ 
			$this->load->library('pagination');
			$this->db->select('*');
			$this->db->where('is_trash', 1);
			$this->db->get('bucket_posting');
			$kueri = $this->db->get('bucket_posting');
			$config['base_url']        = base_url().'blog/pg/0';
			$config['total_rows']      = $kueri->num_rows();
			$config['per_page']        = '3';
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
			$this->data['blog']         		= $this->model->blog($config['per_page'],$this->uri->segment(4));
			$this->db->order_by('insert_date', 'ASC');
			$this->db->where('slider', 1);
			$this->db->where('is_trash', 1);
			$this->db->limit(4);
			$this->data['slider']   			= $this->db->get('bucket_posting')->result();
			$this->db->order_by('insert_date', 'ASC');
			$this->db->where('is_trash', 1);
			$this->db->limit(1);
			$this->data['blog_new'] 			= $this->db->get('bucket_posting')->row();
			$this->db->order_by('read', 'DESC');
			$this->db->where('is_trash', 1);
			$this->db->limit(3);
			$this->data['berita_popular'] 		= $this->db->get('bucket_posting')->result();
			$this->data['profile']				= $this->db->get('setting_profile')->row();
			$this->db->order_by('page_order');
			$this->data['block'] 				= $this->db->get('statis_home')->result();
			$this->data['menu']					= $this->menu(0,$h=""); 
			$arr = array('title'=>'Berita');
			$this->data['title'] 				= (object) $arr;
			$this->template('main-all', $this->data);
		}
	}
}