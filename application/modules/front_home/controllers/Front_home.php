<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front_home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Model');
		$this->load->model('ModelProductFilter');
		$this->load->model('ModelWaktuLalu');
		$this->load->model('ModelMenu');
	}

	private function template($content,$data=null){
		$data['content'] = $this->load->view($content, $data, true);
		$this->load->view('1_front/wrapper',$data);
	}

	function index(){
		$ip 		= $_SERVER['REMOTE_ADDR']; // ip pengunjung
		$location 	= $_SERVER['PHP_SELF']; // server path
		$data_insert = array(
		   'ip' 	=> $ip,
		   'date'	=> date('d-m-Y')
		);
		$data['block'] 		= $this->Model->Block();
		$data['slider']		= $this->Model->Slider();
		$data['posting']	= $this->Model->Posting();
		$data['profile']	= $this->Model->Profile();
		$data['menu']		= $this->ModelMenu->MenuFront(0, $h = '');
		$this->template('home', $data);
	}

}

?>