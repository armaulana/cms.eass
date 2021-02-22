<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_pendaftaran extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MyModel');
	}

	private function template($content  , $data = null){
		$data['content'] = $this->load->view($content, $data, true);
		$this->load->view('1_front_pendaftaran/template', $data);
	}

	public function index(){
		$ip = $_SERVER['REMOTE_ADDR'];
		$location = $_SERVER['PHP_SELF'];
		$data = array(
				'ip' => $ip,
				'location' => $location,
				'insert_date' => date('d-m-y h:i:s') 
		);
		$data['title'] 	= 'Jenis';
		$data['menu_active_parent'] = 'Pendaftaran';
		$this->template('view', $data);
	}

	public function jkn(){
		echo "form jkn";
	}

	public function umum(){
		echo "form umum";
	}

	public function umum_asuransi(){
		echo "form umum asuransi";
	}

}

?>