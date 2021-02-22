<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_page extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(['url','tgl_indo']);
		$this->load->database();
		$this->load->model('ModelWaktuLalu');
		$this->load->model('ModelMenu');
	}

	private function template($content,$data=null){ 
		$data['content'] = $this->load->view($content,$data,true);
		$this->load->view('1_front/2-content',$data);
	}

	function index($slug = null){ 
		$this->db->select('count(*) as total');
		$this->db->where('slug', $slug);
		$this->db->from('bucket_page');
		$cek_slug = $this->db->get()->row();
		if($cek_slug->total > 0){
			if($slug == null or $slug == ''){
				redirect('/');
			}else{
				$this->db->where('slug', $slug);
				$ambil  = $this->db->get('bucket_page')->row();
				$update = $ambil->read+1;
				$count  = $this->db->query("UPDATE bucket_page SET `read`='".$update."' WHERE `slug`='".$slug."';");
				$this->data['menu']			= $this->ModelMenu->MenuFront(0, $h = '');
				$this->data['profile']		= $this->db->get('setting_profile')->row();
				$this->data['data']			= $this->db->where('slug', $slug)->get('bucket_page')->row();
				$this->data['popular_page'] = $this->db->where('is_trash', 1)->limit(4)->order_by('read', 'DESC')->get('bucket_page')->result();
				$this->data['popular_posting'] = $this->db->where('is_trash', 1)->limit(4)->order_by('read', 'DESC')->get('bucket_posting')->result();
 				$this->template('main', $this->data);
			}
		}else{
			redirect('/');
		}
	}
}
?>