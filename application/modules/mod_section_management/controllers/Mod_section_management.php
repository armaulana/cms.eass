<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_section_management extends CI_Controller {

	var $order = array('id' => 'desc'); 
    var $table = 'statis_home';
    var $idq = 'id';
    var $column_order = array(); 
    var $column_search = array();

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MyModel');
		$this->load->model('ModelMenu');
	}

	private function template($content,$data=null){ 
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login', 'refresh');
		}
		elseif($this->ion_auth->is_user()){
			redirect('auth/login', 'refresh');
		}
		else{
		$data['content'] = $this->load->view($content,$data,true);
		$this->load->view('2_back/template',$data);
		}
	}

	public function index(){
		$check_allow_access = $this->MyModel->check_allow_access(get_class($this));
		if($check_allow_access[0]['access_show'] == null){
			redirect('mod_dashboard');
		}
		if($check_allow_access[0]['access_show'] == 0 or $check_allow_access[0]['access_show'] == ''){ redirect('mod_dashboard', 'refresh'); }

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
		$user_data['last_login']			= $this->MyModel->last_login($this->session->userdata('user_id'));
		$user_data['menu_active_parent'] 	= 'Section Management';
		$user_data['menu_active_sub'] 		= '';
		$user_data['menu_active_sub1'] 		= '';
		$user_data['title'] 				= 'Section Management';
		$user_data['check_allow_access'] 	= $this->MyModel->check_allow_access(get_class($this));

		$this->load->helper('url');

		$this->template('view', $user_data);
	}

	function ajax_update(){
		for($i=0; $i<count($_POST["id"]); $i++){
			$data = array(
				'page_order' => $i
			);
			$this->db->where('id', $_POST["id"][$i]);
			$this->db->update('page_builder', $data);
		}
		echo json_encode(array("status" => TRUE));
	}

	function ajax_edit($id){
		$data = $this->MyModel->get_by_id($id);
		echo json_encode($data);
	}

	function ajax_edit_extra($id){
		$data = $this->MyModel->get_by_id_extra($id);
		echo json_encode($data);
	}

	function ajax_add(){
		
		if($this->input->post('deskripsi') == ''){
			echo json_encode(array("status" => FALSE));			
		}else{

			date_default_timezone_set('Asia/Jakarta');
			
			$this->load->library('form_validation');
	 		$this->form_validation->set_rules('deskripsi','Deskripsi','required|max_length[50]');

	  		//if($this->form_validation->run()){
			$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(substr($this->input->post('deskripsi'),0,25)));

			$data = array(
					'deskripsi' => $this->input->post('deskripsi'),
					'kontent' => $this->input->post('kontent'),
					'status_video' => $this->input->post('status_video'),
					'video' => $this->input->post('url_video'),
			);

			if(!empty($_FILES['poto']['name'])){
				$upload = $this->_do_upload(); 
				$data['foto'] = $upload;
			}
			//print_r($data);
			$this->db->where('page_id', $this->input->post('id'));
			$this->db->update('statis_home', $data);

			echo json_encode(array("status" => TRUE));
			
		//}

		}
	}

	function ajax_add_title(){
		
		if($this->input->post('title') == ''){
			echo json_encode(array("status" => FALSE));			
		}else{

			date_default_timezone_set('Asia/Jakarta');
			
			$this->load->library('form_validation');
	 		$this->form_validation->set_rules('deskripsi','Deskripsi','required|max_length[50]');

	  		//if($this->form_validation->run()){
			$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(substr($this->input->post('deskripsi'),0,25)));

			$data = array(
					'page_judul_title' => $this->input->post('title'),
			);

			//print_r($data);
			$this->db->where('page_id', $this->input->post('id'));
			$this->db->update('statis_home', $data);

			echo json_encode(array("status" => TRUE));
			
		//}

		}
	}

	function ajax_add_extra(){
		
		if($this->input->post('deskripsi1') == ''){
			echo json_encode(array("status" => FALSE));			
		}else{

			date_default_timezone_set('Asia/Jakarta');
			
			$this->load->library('form_validation');
	 		$this->form_validation->set_rules('deskripsi1','Deskripsi','required|max_length[250]');

	  		//if($this->form_validation->run()){
			$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(substr($this->input->post('deskripsi2'),0,25)));

			$data = array(
					'deskripsi1' => $this->input->post('deskripsi1'),
					'deskripsi2' => $this->input->post('deskripsi2'),
					'kontent1' => $this->input->post('kontent2'),
					'kontent2' => $this->input->post('kontent3'),
					'is_trash' => 1
			);

			//if(!empty($_FILES['poto']['name'])){
			//	$upload = $this->_do_upload(); 
			//	$data['foto'] = $upload;
			//}
			//print_r($data);
			$this->db->where('page_id', $this->input->post('id'));
			$this->db->update('statis_home_extra', $data);

			echo json_encode(array("status" => TRUE));
			
		//}

		}
	}

	private function _do_upload(){
    	date_default_timezone_set('Asia/Jakarta');
		$code = round(microtime(true) * 1000); 

		$config['upload_path']          = 'uploads/home/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['file_name']            = date('dmYhis'); 

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('poto')){
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); 
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
}