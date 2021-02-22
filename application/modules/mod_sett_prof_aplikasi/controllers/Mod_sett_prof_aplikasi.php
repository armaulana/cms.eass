<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_sett_prof_aplikasi extends CI_Controller {

	var $order = array('id' => 'desc'); 
    var $table = 'setting_profile';
    var $idq = 'id';
    var $column_order = array(); 
    var $column_search = array();

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('myModel');
		$this->load->model('ModelMenu');
		$this->load->helper('judul_seo_helper');
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

	public function index() {
		$check_allow_access = $this->myModel->check_allow_access(get_class($this));
		if($check_allow_access[0]['access_show'] == null){
			redirect('mod_dashboard');
		}
		if($check_allow_access[0]['access_show'] == 0 or $check_allow_access[0]['access_show'] == ''){ redirect('mod_dashboard', 'refresh'); }
		
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}

		$this->load->helper('url');

		$data = array(
           	'get_data' => $this->myModel->get_by_id($id = 1),
        );
		$data['provinsi']				= $this->db->get('bucket_ref_provinsi')->result(); 
		$data['kota']					= $this->db->get('bucket_ref_kota')->result(); 
		$data['kecamatan']				= $this->db->get('bucket_ref_kecamatan')->result(); 
		$data['last_login']				= $this->myModel->last_login($this->session->userdata('user_id'));
		$data['title'] 					= 'Setting Profile Aplikasi';
		$data['menu_active_parent'] 	= 'Setting Profile Aplikasi';
		$data['menu_active_sub'] 		= 'Setting';
		$data['menu_active_sub1'] 		= 'Setting Profile Aplikasi';

		$this->template('view', $data);
	}

	function ajax_add(){
		$this->load->library('form_validation');
 		$this->form_validation->set_rules('nama','nama','required|max_length[200]');

  		if($this->form_validation->run()){
  			$data = array(
					'nama' => $this->input->post('nama'),
					'visi_misi' => $this->input->post('visi_misi'),
					'alamat' => $this->input->post('alamat'),
					'provinsi' => $this->input->post('provinsi'),
					'kota' => $this->input->post('kota'),
					'kecamatan' => $this->input->post('kecamatan'),
					'no_telepon' => $this->input->post('no_telepon'),
					'email' => $this->input->post('email'),
					'fax' => $this->input->post('fax'),
					'insert_date' => date('d-m-y h:i:s'),
					'insert_by' => $this->session->userdata('username'),
					'is_trash' => 1,
			);
			if(!empty($_FILES['photo']['name'])){
				$upload = $this->_do_upload(); 
				$data['photo'] = $upload;
			}
			$insert = $this->myModel->update(array('id' => $this->input->post('id')), $data);
			echo json_encode(array("hasil" => true));
		}
	}

	private function _do_upload(){
		//$nmfile = judul_seo($this->input->post('photo'));
		$code = round(microtime(true) * 1000); 

		$config['upload_path']          = 'uploads/profile_aplikasi';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = '';
        $config['max_width']            = '';
        $config['max_height']           = '';
        $config['file_name']            = $code; 

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')){
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); 
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
}