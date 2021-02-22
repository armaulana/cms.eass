<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_dashboard extends CI_Controller {

	var $order = array('' => ''); 
    var $table = '';
    var $idq = 'id';
    var $column_order = array(); 
    var $column_search = array();

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('judul_seo_helper');
		$this->load->model('MyModel');
		$this->load->model('ModelMenu');
	}

	private function template($content,$data=null){
		if(!$this->ion_auth->logged_in()){
			redirect('auth/login', 'refresh');
		}elseif ($this->ion_auth->is_user()){
			redirect('auth/login', 'refresh');
		}else{
			$data['content'] = $this->load->view($content,$data,true);
			$this->load->view('2_back/template', $data);
		}
	}

	public function index(){
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		$ip = $_SERVER['REMOTE_ADDR'];
		$location = $_SERVER['PHP_SELF'];
		$data = array(
				'ip' => $ip,
				'location' => $location,
				'insert_date' => date('d-m-y h:i:s') 
		);
		$this->db->insert('bucket_counter', $data);
		$data['last_login']			= $this->MyModel->last_login($this->session->userdata('user_id'));
		$data['title'] 				= 'Dashboard';
		$data['menu_active_parent'] = 'Dashboard';
		$data['menu_active_sub'] 	= '';
		$data['menu_active_sub1'] 	= '';
		$data['pengunjung']			= $this->db->select('count(*) as count')->from('bucket_counter')->get()->result();	
		$data['pages']				= $this->db->select('count(*) as count')->where('is_trash', 1)->from('bucket_page')->get()->result();
		$data['posting']			= $this->db->select('count(*) as count')->where('is_trash', 1)->from('bucket_posting')->get()->result();
		$data['album']				= $this->db->select('count(*) as count')->where('is_trash', 1)->from('bucket_album')->get()->result();
		$data['video']				= $this->db->select('count(*) as count')->where('is_trash', 1)->from('bucket_video')->get()->result();
		$this->template('view', $data);
	}
}

?>