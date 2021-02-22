<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_provinsi extends CI_Controller {

	var $order = array('id_provinsi' => 'desc'); 
    var $table = 'bucket_ref_provinsi';
    var $idq = 'lib_id';
    var $column_order = array(); 
    var $column_search = array('nama_provinsi');

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MyModel');
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

	public function index(){
		$CheckAllowAccess = $this->MyModel->CheckAllowAccess(get_class($this));
		if($CheckAllowAccess[0]['access_show'] == null){
			redirect('mod_dashboard');
		}
		if($CheckAllowAccess[0]['access_show'] == 0 or $CheckAllowAccess[0]['access_show'] == ''){ 
			redirect('mod_dashboard', 'refresh'); 
		}
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		$user_data['last_login']			= $this->MyModel->last_login($this->session->userdata('user_id'));
		$user_data['title'] 				= 'Provinsi';
		$user_data['menu_active_parent'] 	= 'Master';
		$user_data['menu_active_sub'] 		= 'Provinsi';
		$user_data['menu_active_sub1'] 		= '';
		$user_data['CheckAllowAccess']	= $this->MyModel->CheckAllowAccess(get_class($this)); 
		$this->template('view', $user_data);
	}

	function ajax_list(){
		$CheckAllowAccess = $this->MyModel->CheckAllowAccess(get_class($this));
		if($CheckAllowAccess[0]['access_detail'] == 0){ $allow_detail = 0; }else { $allow_detail = 1; }
		if($CheckAllowAccess[0]['access_edit'] == 0){ $allow_edit = 0; }else { $allow_edit = 1; }
		if($CheckAllowAccess[0]['access_delete'] == 0){ $allow_delete = 0; }else { $allow_delete = 1; }
		$this->load->model('MyModel','posting');
		$list = $this->MyModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $li) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $li->id_provinsi;
			$row[] = $li->nama_provinsi;
			if($li->status == 1){
				$row[] = "<i class='fa fa-check' style='font-weight : bold; color: #00a65a'></i>";
			}else{
				$row[] = "<i class='fa fa-remove' style='font-weight : bold; color: #dd4b39'></i>";
			}
			//-----Btn Detail 
			if($allow_detail == 0){
				$btn_detail = '';
			}else{
				$btn_detail = '
						<a class="btn btn-flat btn-primary btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="detail_posting('."'".$li->lib_id."'".')">
						<i class="fa fa-eye"></i> Detail</a>';
			}	
			//------Btn Edit
			if($allow_edit == 0){
				$btn_edit = '';
			}else{
				$btn_edit = '
						<a class="btn btn-flat btn-warning btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="edit_posting('."'".$li->lib_id."'".')">
						<i class="fa fa-edit"></i> Edit </a>';
			}
			//------ Btn Delete 
			if($allow_delete == 0){
				$btn_delete = '';
			}else{
				$btn_delete = '
						<a class="btn btn-flat btn-danger btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="delete_posting('."'".$li->lib_id."'".')">
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
		$CheckAllowAccess = $this->MyModel->CheckAllowAccess(get_class($this));
		if($CheckAllowAccess[0]['access_show'] == null){
			redirect('mod_dashboard');
		}
		if($CheckAllowAccess[0]['access_show'] == 0 or $CheckAllowAccess[0]['access_show'] == ''){ 
			redirect('mod_dashboard', 'refresh'); 
		}
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		$data['last_login']				= $this->MyModel->last_login($this->session->userdata('user_id'));
		$data['title'] 					= 'Provinsi';
		$data['menu_active_parent'] 	= 'Master';
		$data['menu_active_sub'] 		= 'Provinsi';
		$this->template('v_tambah', $data);
	}

	function ajax_add(){
		$nomor = $this->input->post('nomor');
		$nama_provinsi = $this->input->post('nama_provinsi');
		$status = $this->input->post('status');
		if($nomor == ''){
			$data['error']['colFormInput1'] = 'red';
		}
		if($nomor == '') {
			$data['error']['altFormInput1'] = '
			<small>
				<b style="color: red>
					Tolong di Isi !
				</b>
			</small>
			';
		}
		if($nama_provinsi == '') {
			$data['error']['colFormInput2'] = 'red';
		}
		if($nama_provinsi == ''){
			$data['error']['altFormInput2'] = '
			<small>
				<b style="color: red">
					Tolong di Isi !
				</b>
			</small>
			';
		}
		if($status == '') {
			$data['error']['colFormInput3'] = 'red';
		}
		if($status == ''){
			$data['error']['altFormInput3'] = '
			<small>
				<b style="color: red">
					Tolong di Isi !
				</b>
			</small>
			';
		}
		if(empty($data['error'])){
			$data = array(
				'id_provinsi'	=> $this->input->post('nomor'),
				'nama_provinsi'	=> strtoupper($this->input->post('nama_provinsi')),
				'status' => $this->input->post('status'),
				'insert_date' => date('d-m-y h:i:s'),
				'insert_by' => $this->session->userdata('username'),
				'is_trash' => 1,
			);
			$insert = $this->MyModel->save($data);
			$data['status'] = TRUE;
		}else{
			$data['status'] = FALSE;
		}
		echo json_encode($data);
	}

	function edit($id){
		$data = array(
			'get_data' => $this->MyModel->get_by_id($id),
        );
		$data['last_login']				= $this->MyModel->last_login($this->session->userdata('user_id'));
		$data['title'] 					= 'Form Provinsi';
		$data['menu_active_parent'] 	= 'Referensi';
		$data['menu_active_sub'] 		= 'Provinsi';
		$data['id']						= $id;
		$this->template('v_edit', $data);
	}

	function ajax_edit($id){
		$data = $this->MyModel->get_by_id($id);
		echo json_encode($data);
	}

	function ajax_update(){
		$data = array(
				'id_provinsi'	=> $this->input->post('nomor'),
				'nama_provinsi'	=> strtoupper($this->input->post('nama_provinsi')),
				'status' => $this->input->post('status'),
				'update_date' => date('d-m-y h:i:s'),
				'update_by' => $this->session->userdata('username'),
				'is_trash' => 1,
		);
		$this->MyModel->update(array('lib_id' => $this->input->post('lib_id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	function ajax_delete($id){
		$this->MyModel->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
}

?>