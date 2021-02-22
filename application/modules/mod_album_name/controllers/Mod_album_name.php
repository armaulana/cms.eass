<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_album_name extends CI_Controller {

	var $order = array('id' => 'desc'); 
    var $table = 'bucket_album_name';
    var $idq = 'id';
    var $column_order = array(); 
    var $column_search = array('nama_album');

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MyModel');
		$this->load->model('ModelMenu');
		date_default_timezone_set('Asia/Jakarta');
	}

	private function template($content,$data=null){ 
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login', 'refresh');
		}elseif($this->ion_auth->is_user()){
			redirect('auth/login', 'refresh');
		}else{
			$data['content'] = $this->load->view($content,$data,true);
			$this->load->view('2_back/template',$data);
		}
	}

	public function index(){
		$CheckAllowAccess = $this->MyModel->CheckAllowAccess(get_class($this));
		if($CheckAllowAccess[0]['access_show'] == null){
			redirect('mod_dashboard');
		}
		if($CheckAllowAccess[0]['access_show'] == 0 or $CheckAllowAccess[0]['access_show'] == '' ){ 
			redirect('mod_page', 'refresh'); 
		}
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		$data['CheckAllowAccess']		= $this->MyModel->CheckAllowAccess(get_class($this));
		$data['last_login']				= $this->MyModel->last_login($this->session->userdata('user_id'));
		$data['menu_active_parent'] 	= 'Albums';
		$data['menu_active_sub'] 		= 'Albums Name';
		$data['menu_active_sub1'] 		= '';
		$data['title'] 					= 'Albums Name';
		$this->template('view', $data);
	}

	function ajax_list(){
		$CheckAllowAccess = $this->MyModel->CheckAllowAccess(get_class($this));
		if($CheckAllowAccess[0]['access_detail'] == 0){ $allow_detail = 0; }else{ $allow_detail = 1; }
		if($CheckAllowAccess[0]['access_edit'] == 0){ $allow_edit = 0; }else{ $allow_edit = 1; }
		if($CheckAllowAccess[0]['access_delete'] == 0){ $allow_delete = 0; }else{ $allow_delete = 1; }
		$this->load->model('MyModel','kategori');
		$list = $this->MyModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $li) {
			$no++;
			$row = array();
			// -- Col 1
			$row[] = '<center><input type="checkbox" class="data-check" value="'.$li->id.'"></center>';
			// -- Col 2
			$row[] = $li->nama_album;
			// -- Btn Detail 
			if($allow_detail == 0){
				$btn_detail = '';
			}else{
				$btn_detail = '
						<a class="btn btn-flat btn-primary btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="detail_posting('."'".$li->id."'".')">
						<i class="fa fa-eye"></i> Detail</a>';
			}	
			// -- Btn Edit
			if($allow_edit == 0){
				$btn_edit = '';
			}else{
				$btn_edit = '
						<a class="btn btn-flat btn-warning btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="edit_posting('."'".$li->id."'".')">
						<i class="fa fa-edit"></i> Edit </a>';
			}
			// -- Btn Delete 
			if($allow_delete == 0){
				$btn_delete = '';
			}else{
				$btn_delete = '
						<a class="btn btn-flat btn-danger btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="delete_posting('."'".$li->id."'".')">
						<i class="fa fa-trash"></i> Delete </a>';
			}
			// -- Col 3
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

	function ajax_add(){
		$nama_album 	= $this->input->post('nama_album');
		$deskripsi		= $this->input->post('deskripsi');
		$status			= $this->input->post('status');
		//-- Col
		if($nama_album == ''){ 
			$data['error']['colNamaAlbum'] = 'red';
		}
		//-- Alert
		if ($nama_album == '') { 
			$data['error']['nama_album'] = '
			<small>
				<b style="color: red">
					<i class="fa fa-times"></i> Tolong di Isi  !
				</b>
			</small>';
		}
		//-- Col
		if($deskripsi == ''){
			$data['error']['colDeskripsi'] = 'red';
		}
		//-- Alert
		if($deskripsi == ''){
			$data['error']['deskripsi'] = '
			<small>
				<b style="color: red">
					<i class="fa fa-times"></i> Tolong di Isi !
				</b>
			</small>';
		}
		//-- Col
		if($status == ''){
			$data['error']['colStatus'] = 'red';
		}
		//-- Alert
		if($status == ''){
			$data['error']['status'] = '
			<small>
				<b style="color: red">
					<i class="fa fa-times"></i> Tolong di Isi !
				</b>
			</small>';
		}
		if (empty($data['error'])) {
			date_default_timezone_set('Asia/Jakarta');
			$data = array(
					'nama_album' => $this->input->post('nama_album'),
					'deskripsi' => $this->input->post('deskripsi'),
					'status' => $this->input->post('status'),
					'insert_date' => date('Y-d-m h:i:s'),
					'insert_by' => $this->session->userdata('user_id'),
					'is_trash' => 1,
			);
			$insert = $this->MyModel->save($data);
			$data['status'] = TRUE;
		}else{
			$data['status'] = FALSE;
		}
		echo json_encode($data);
	}

	function ajax_edit($id){
		$data = $this->MyModel->get_by_id($id);
		echo json_encode($data);
	}

	function ajax_update(){
		$data = array(
					'nama_album' => $this->input->post('nama_album'),
					'deskripsi' => $this->input->post('deskripsi'),
					'status' => $this->input->post('status'),
					'update_date' => date('Y-d-m h:i:s'),
					'update_by' => $this->session->userdata('user_id'),
					'is_trash' => 1,
		);
		$this->MyModel->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	function ajax_delete($id){
		$this->MyModel->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	function ajax_bulk_delete(){
        $list_id = $this->input->post('id');
        foreach ($list_id as $id) {
            $this->MyModel->delete_by_id($id);
        }
        echo json_encode(array("status" => TRUE));
    }
}

?>