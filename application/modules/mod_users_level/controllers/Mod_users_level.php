<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_users_level extends CI_Controller {

	var $order = array('id' => 'desc'); 
    var $table = 'groups';
    var $idq = 'id';
    var $column_order = array('name'); 
    var $column_search = array('name');

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

		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		$user_data['check_allow_access']	= $this->MyModel->check_allow_access(get_class($this));
		$user_data['last_login']			= $this->MyModel->last_login($this->session->userdata('user_id'));
		$user_data['menu_active_parent'] 	= 'Role';
		$user_data['menu_active_sub'] 		= '';
		$user_data['menu_active_sub1'] 		= '';
		$user_data['title'] 				= 'Users';
		$this->template('view', $user_data);
	}

	function ajax_list(){
		$check_allow_access = $this->MyModel->check_allow_access(get_class($this));
		if($check_allow_access[0]['access_detail'] == 0){ $allow_detail = 0; }else { $allow_detail = 1; }
		if($check_allow_access[0]['access_edit'] == 0){ $allow_edit = 0; }else { $allow_edit = 1; }
		if($check_allow_access[0]['access_delete'] == 0){ $allow_delete = 0; }else { $allow_delete = 1; }
		$this->load->model('MyModel');
		$list = $this->MyModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $li) {
			$no++;
			$row = array();
			$row[] = '<center><input type="checkbox" class="data-check" value="'.$li->id.'"></center>';
			$row[] = $li->name;
			$row[] = $li->description;
			//-----Btn Detail 
			if($allow_detail == 0){
				$btn_detail = '';
			}else{
				$btn_detail = '
						<a class="btn btn-flat btn-primary btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="detail_posting('."'".$li->id."'".')">
						<i class="fa fa-eye"></i> Detail</a>';
			}	
			//------Btn Edit
			if($allow_edit == 0){
				$btn_edit = '';
			}else{
				$btn_edit = '
						<a class="btn btn-flat btn-warning btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="edit_posting('."'".$li->id."'".')">
						<i class="fa fa-edit"></i> Edit </a>';
			}
			//------ Btn Delete 
			if($allow_delete == 0){
				$btn_delete = '';
			}else{
				$btn_delete = '
						<a class="btn btn-flat btn-danger btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="delete_posting('."'".$li->id."'".')">
						<i class="fa fa-trash"></i> Delete </a>';
			}
																		
			$row[] = $btn_detail . $btn_edit . $btn_delete;
		
			$data[] = $row;
		}
		$output = array("draw" => $_POST['draw'],
						"recordsTotal" => $this->MyModel->count_all(),
						"recordsFiltered" => $this->MyModel->count_filtered(),
						"data" => $data,
		);
		echo json_encode($output);
	}

	function tambah(){
		$data['last_login']				= $this->MyModel->last_login($this->session->userdata('user_id'));
		$data['title'] 					= 'Form';
		$data['menu_active_parent'] 	= 'Configurasi';
		$data['menu_active_sub'] 		= 'Users';
		$this->template('v_tambah', $data);
	}

	function ajax_add(){
		$nama_level = $this->input->post('nama_level');
		$description = $this->input->post('description');
		if($nama_level == ''){
			$data['error']['colFormInput1'] = 'red';
		}
		if($nama_level == '') {
			$data['error']['altFormInput1'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Harus di Isi ! 
					</b>
				</small>
			';
		}
		if($description == ''){
			$data['error']['colFormInput2'] = 'red';
		}
		if($description == ''){
			$data['error']['altFormInput2'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Harus di Isi !
					</b>
				</small>
			';
		}
		if (empty($data['error'])) {
			date_default_timezone_set('Asia/Jakarta');
			// Insert tabel user level
			$data_user_level = array(
					'name' => $this->input->post('nama_level'),
					'description' => $this->input->post('description'),
			);
			$insert_user_level = $this->MyModel->save($data_user_level);
			// Insert tabel user access
			$select_id = $this->db->select('id')->order_by('id', 'desc')->limit(1)->get('groups')->row(); 
			// Ambil id insert dari tbl groups
			$main_menu = $this->db->get('master_menu_administrator')->result();
			foreach ($main_menu as $key) {
				$data_user_access = array(
					'users_level_id' => $select_id->id,
					'users_menu_id' => $key->id,
					'insert_by' => $this->session->userdata('user_id'),
					'insert_date' => date('Y-d-m h:i:s'),
					'is_trash' => 1,
				);
				$insert_user_access = $this->MyModel->save_user_access($data_user_access);
			}
			$data['status'] = TRUE;
		}else{
			$data['status'] = FALSE;
		}
		echo json_encode($data);
	}

	function rubah($id){
		$data['last_login']				= $this->MyModel->last_login($this->session->userdata('user_id'));
		$data['title'] 					= 'Form Rubah';
		$data['menu_active_parent'] 	= 'Configurasi';
		$data['menu_active_sub'] 		= 'Users';
		$data['get_data'] 				= $this->MyModel->get_by_id($id);

		$this->template('v_rubah', $data);
	}

	function ajax_edit($id){
		$data = $this->MyModel->get_by_id($id);
		echo json_encode($data);
	}

	function ajax_update(){
		date_default_timezone_set('Asia/Jakarta');
		// Insert tabel user level
		$data = array(
				'name' => $this->input->post('nama_level'),
				'description' => $this->input->post('description'),
		);
		
		$this->MyModel->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	function ajax_delete($id){
		$this->MyModel->delete_by_id($id);

		$this->db->where('users_level_id', $id);
		$this->db->delete('users_access2');

		$this->db->where('id',  $id);
		$this->db->delete('groups');

		$this->db->where('group_id', $id);
		$this->db->delete('users_groups');

		echo json_encode(array("status" => TRUE));
	}

	function ajax_bulk_delete()
    {
        $list_id = $this->input->post('id');
        foreach ($list_id as $id) {
            $this->MyModel->delete_by_id($id);
        }
        echo json_encode(array("status" => TRUE));
    }
}