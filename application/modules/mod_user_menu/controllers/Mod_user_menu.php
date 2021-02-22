<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_user_menu extends CI_Controller {

	var $order = array('id_main' => 'desc'); 
    var $table = 'mainmenu';
    var $idq = 'id_main';
    var $column_order = array(null,null,'nama_menu'); 
    var $column_search = array('nama_menu');

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('myModel');
		$this->load->model('menuModel');
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
		$this->load->view('template',$data);
		}
	}

	public function index(){
		$check_allow_access = $this->myModel->check_allow_access(get_class($this));
		if($check_allow_access[0]['access_show'] == null){
			redirect('mod_dashboard');
		}
		if($check_allow_access[0]['access_show'] == 0 or $check_allow_access[0]['access_show'] == ''){ redirect('mod_dashboard', 'refresh'); }

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}

		$user_data['last_login']			= $this->myModel->last_login($this->session->userdata('user_id'));
		$user_data['menu_active_parent'] 	= 'Configurasi';
		$user_data['menu_active_sub'] 		= 'User Menu';
		$user_data['title'] 				= 'User Menu';
		$user_data['check_allow_access']	= $this->myModel->check_allow_access(get_class($this)); 

		$this->load->helper('url');

		$this->template('view', $user_data);
	}

	function ajax_list(){
		$check_allow_access = $this->myModel->check_allow_access(get_class($this));

		if($check_allow_access[0]['access_detail'] == 0){ $allow_detail = 0; }else { $allow_detail = 1; }
		if($check_allow_access[0]['access_edit'] == 0){ $allow_edit = 0; }else { $allow_edit = 1; }
		if($check_allow_access[0]['access_delete'] == 0){ $allow_delete = 0; }else { $allow_delete = 1; }

		$this->load->model('myModel','menu');
		$list = $this->myModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $li) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = '<i class="fa '.$li->icon.'"></i>';
			$row[] = $li->nama_menu;
			$row[] = $li->link;
			$row[] = $li->urutan;
			//-----Btn Detail 
			if($allow_detail == 0){
				$btn_detail = '';
			}else{
				$btn_detail = '
						<a class="btn btn-flat btn-primary btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="detail_posting('."'".$li->id_main."'".')">
						<i class="fa fa-eye"></i> Detail</a>';
			}	
			//------Btn Edit
			if($allow_edit == 0){
				$btn_edit = '';
			}else{
				$btn_edit = '
						<a class="btn btn-flat btn-warning btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="edit_posting('."'".$li->id_main."'".')">
						<i class="fa fa-eye"></i> Edit </a>';
			}
			//------ Btn Delete 
			if($allow_delete == 0){
				$btn_delete = '';
			}else{
				$btn_delete = '
						<a class="btn btn-flat btn-danger btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="delete_posting('."'".$li->id_main."'".')">
						<i class="fa fa-eye"></i> Delete </a>';
			}
																		
			$row[] = $btn_detail . $btn_edit . $btn_delete;
		
			$data[] = $row;
		}
		$output = array("draw" 				=> $_POST['draw'],
						"recordsTotal" 		=> $this->myModel->count_all(),
						"recordsFiltered" 	=> $this->myModel->count_filtered(),
						"data" 				=> $data,
				);
		echo json_encode($output);
	}

	function ajax_add(){
		$this->load->library('form_validation');
 		$this->form_validation->set_rules('nama_menu','Nama Menu','required|max_length[50]');

  		if($this->form_validation->run()){
		$data = array(
				'nama_menu' => $this->input->post('nama_menu'),
				'urutan' 	=> $this->input->post('urutan'),
				'link' 		=> $this->input->post('link'),
				'aktif' 	=> $this->input->post('aktif'),
				'adminmenu' => $this->input->post('adminmenu'),
				'icon' 		=> $this->input->post('icon'),
				'is_trash'	=> 1
			);
		$insert = $this->myModel->save($data);
		echo json_encode(array("status" => TRUE));
	}}

	 function ajax_edit($id){
		$data = $this->myModel->get_by_id($id);
		echo json_encode($data);
	}

	function ajax_update(){
		$data = array(
				'nama_menu' => $this->input->post('nama_menu'),
				'urutan' 	=> $this->input->post('urutan'),
				'link' 		=> $this->input->post('link'),
				'aktif' 	=> $this->input->post('aktif'),
				'adminmenu' => $this->input->post('adminmenu'),
				'icon' 		=> $this->input->post('icon'),
				'is_trash'	=> 1
			);
		$this->myModel->update(array('id_main' => $this->input->post('id_main')), $data);
		echo json_encode(array("status" => TRUE));
	}

	function ajax_delete($id){
		$this->myModel->delete_by_id($id);
		$this->myModel->delete_by_id_user_access($id);
		echo json_encode(array("status" => TRUE));
	}
}