<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_submenu extends CI_Controller {

	var $order = array('id_sub' => 'desc'); 
    var $table = 'submenu';
    var $idq = 'id_sub';
    var $column_order = array('id_sub','nama_sub','link_sub','a.id_main','a.urutan as ','a.aktif','a.adminsubmenu',null);
    var $column_search = array('nama_sub');

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
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
		$user_data['menu_active_sub'] 		= 'User Sub Menu';
		$user_data['title'] 				= 'User Sub Menu';
		$user_data['check_allow_access']	= $this->myModel->check_allow_access(get_class($this));

		$user_data['menu_utama']	= $this->myModel->menu_utama();

		$this->load->helper('url');

		$this->template('view', $user_data);
	}

	function ajax_list(){
		$check_allow_access = $this->myModel->check_allow_access(get_class($this));

		if($check_allow_access[0]['access_detail'] == 0){ $allow_detail = 0; }else { $allow_detail = 1; }
		if($check_allow_access[0]['access_edit'] == 0){ $allow_edit = 0; }else { $allow_edit = 1; }
		if($check_allow_access[0]['access_delete'] == 0){ $allow_delete = 0; }else { $allow_delete = 1; }
		
		$list = $this->myModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $li) {
			$warna=($li->urutan_main % 2 == 0) ? "bg-purple" : "btn-danger";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = "<i class='fa ".$li->icon."'> </i> &nbsp; ".$li->nama_menu;
			$row[] = $li->nama_sub;
			$row[] = $li->link_sub;
			$row[] = $li->urutan_main;
			$row[] = $li->urutan_sub;
			$row[] = "<a href='".base_url()."".$li->link_sub."'><button class='btn ".$warna." btn-xs'><i class='fa fa-external-link'> </i> </button></a>";
			//-----Btn Detail 
			if($allow_detail == 0){
				$btn_detail = '';
			}else{
				$btn_detail = '
						<a class="btn btn-flat btn-primary btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="detail_posting('."'".$li->id_sub."'".')">
						<i class="fa fa-eye"></i> Detail</a>';
			}	
			//------Btn Edit
			if($allow_edit == 0){
				$btn_edit = '';
			}else{
				$btn_edit = '
						<a class="btn btn-flat btn-warning btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="edit_posting('."'".$li->id_sub."'".')">
						<i class="fa fa-eye"></i> Edit </a>';
			}
			//------ Btn Delete 
			if($allow_delete == 0){
				$btn_delete = '';
			}else{
				$btn_delete = '
						<a class="btn btn-flat btn-danger btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="delete_posting('."'".$li->id_sub."'".')">
						<i class="fa fa-eye"></i> Delete </a>';
			}
																		
			$row[] = $btn_detail . $btn_edit . $btn_delete;
		
			$data[] = $row;
		}
		$output = array("draw" => $_POST['draw'],
						"recordsTotal" => $this->myModel->count_all(),
						"recordsFiltered" => $this->myModel->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}

	function ajax_add(){
		$this->load->library('form_validation');
 		$this->form_validation->set_rules('nama_sub','Nama Sub Menu','required|max_length[50]');
 		$this->form_validation->set_rules('link_sub','Link','required');

  		if($this->form_validation->run()){
		$data = array(
				'nama_sub' => $this->input->post('nama_sub'),
				'urutan' => $this->input->post('urutan'),
				'link_sub' => $this->input->post('link_sub'),
				'id_main' => $this->input->post('id_main'),
				'aktif' => $this->input->post('aktif'),
				'adminsubmenu' => $this->input->post('adminmenu'),
				'urutan' => 1
			);

		$insert = $this->myModel->save($data);
		echo json_encode(array("status" => TRUE));
		}
	}

	 function ajax_edit($id){
		$data = $this->myModel->get_by_id($id);
		echo json_encode($data);
	}

	function ajax_update(){
		$data = array(
				'nama_sub' => $this->input->post('nama_sub'),
				'link_sub' => $this->input->post('link_sub'),
				'id_main' => $this->input->post('id_main'),
				'urutan' => $this->input->post('urutan'),
			);
		//print_r($data);
		$this->myModel->update(array('id_sub' => $this->input->post('id_sub')), $data);
		echo json_encode(array("status" => TRUE));
	}

	function ajax_delete($id){
		$this->myModel->delete_by_id($id);
		$this->myModel->delete_by_id_user_access($id);
		echo json_encode(array("status" => TRUE));
	}

}