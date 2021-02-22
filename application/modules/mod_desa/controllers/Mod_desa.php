<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_desa extends CI_Controller {

	var $order = array('id_desa' => 'desc'); 
    var $table = 'bucket_ref_desa';
    var $idq = 'lib_id';
    var $column_order = array(); 
    var $column_search = array('a.nama_desa');

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
		if($CheckAllowAccess[0]['access_show'] == 0 or $CheckAllowAccess[0]['access_show'] == ''){ 
			redirect('mod_dashboard', 'refresh'); 
		}
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		$data['CheckAllowAccess']		= $this->MyModel->CheckAllowAccess(get_class($this)); 
		$data['last_login']				= $this->MyModel->last_login($this->session->userdata('user_id'));
		$data['title'] 					= 'Desa';
		$data['menu_active_parent'] 	= 'Master';
		$data['menu_active_sub'] 		= 'Desa';
		$data['menu_active_sub1'] 		= '';
		$data['provinsi'] 				= $this->db->get('bucket_ref_provinsi')->result();
		$data['kota'] 					= $this->db->get('bucket_ref_kota')->result();
		$data['kecamatan'] 				= $this->db->get('bucket_ref_kecamatan')->result();
		$this->template('view', $data);
	}

	function ajax_list(){
		$CheckAllowAccess = $this->MyModel->CheckAllowAccess(get_class($this));
		if($CheckAllowAccess[0]['access_detail'] == 0){ $allow_detail = 0; }else { $allow_detail = 1; }
		if($CheckAllowAccess[0]['access_edit'] == 0){ $allow_edit = 0; }else { $allow_edit = 1; }
		if($CheckAllowAccess[0]['access_delete'] == 0){ $allow_delete = 0; }else { $allow_delete = 1; }
		$this->load->model('MyModel');
		$list = $this->MyModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $li) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $li->id_desa;
			$row[] = $li->nama_provinsi;
			$row[] = $li->nama_kota;
			$row[] = $li->nama_kecamatan;
			$row[] = $li->nama_desa;
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
		$data = array(
		    'ref_agama' => $this->db->get('bucket_ref_agama')->result(),
		    'provinsi' => $this->MyModel->get_provinsi(),
		    'kota' => $this->MyModel->get_kota(),
			'kecamatan' => $this->MyModel->get_kecamatan(),
		    'provinsi_selected' => '',
		    'kota_selected' => '',
		    'kecamatan_selected' => '',
		);
		$data['last_login']				= $this->MyModel->last_login($this->session->userdata('user_id'));
		$data['title'] 					= 'Desa';
		$data['menu_active_parent'] 	= 'Master';
		$data['menu_active_sub'] 		= 'Desa';
		$this->template('v_tambah', $data);
	}

	function ajax_add(){
		$id_provinsi_fk = $this->input->post('id_provinsi_fk');
		$id_kota_fk = $this->input->post('id_kota_fk');
		$id_kecamatan_fk = $this->input->post('id_kecamatan_fk');
		$nomor = $this->input->post('nomor');
		$nama_desa = $this->input->post('nama_desa');
		$status = $this->input->post('status');
		if($id_provinsi_fk == '') {
			$data['error']['colFormInput1'] = 'red';
		}
		if($id_provinsi_fk == ''){
			$data['error']['altFormInput1'] = '
			<small>
				<b style="color: red">
					Harus di Isi !
				</b>
			</small>
			';
		}
		if($id_kota_fk == ''){
			$data['error']['colFormInput2'] = 'red';
		}
		if($id_kota_fk == ''){
			$data['error']['altFormInput2'] = '
			<small>
				<b style="color: red">
					Harus di Isi !
				</b>
			</small>
			';
		}
		if($id_kecamatan_fk == ''){
			$data['error']['colFormInput3'] = 'red';
		}
		if($id_kecamatan_fk == ''){
			$data['error']['altFormInput3'] = '
			<small>
				<b style="color: red">
					Harus di Isi !
				</b>
			</small>
			';
		}
		if($nomor == ''){
			$data['error']['colFormInput4'] = 'red';
		}
		if($nomor == ''){
			$data['error']['altFormInput4'] = '
			<small>
				<b style="color: red">
					Harus di Isi !
				</b>
			</small>
			';
		}
		if($nama_desa == ''){
			$data['error']['colFormInput5'] = 'red';
		}
		if($nama_desa == ''){
			$data['error']['altFormInput5'] = '
			<small>
				<b style="color: red">
					Harus di Isi !
				</b>
			</small>
			';
		}
		if($status == ''){
			$data['error']['colFormInput6'] = 'red';
		}
		if($status == ''){
			$data['error']['altFormInput6'] = '
			<small>
				<b style="color: red">
					Harus di Isi !
				</b>
			</small>
			';
		}
		if(empty($data['error'])){
			$insert_by = $this->MyModel->last_login($this->session->userdata('user_id'));
			$data = array(
					'id_desa'	=> $this->input->post('id_kecamatan_fk').''.$this->input->post('nomor'),
					'nama_desa'	=> strtoupper($this->input->post('nama_desa')),
					'id_provinsi_fk' => $this->input->post('id_provinsi_fk'),
					'id_kota_fk' => $this->input->post('id_kota_fk'),
					'id_kecamatan_fk' => $this->input->post('id_kecamatan_fk'),
					'status' => $this->input->post('status'),
					'insert_date' => date('d-m-y h:i:s'),
					'insert_by' => $insert_by[0]->username,
					'is_trash' => 1,
			);
			$insert = $this->MyModel->save($data);
			$data['status'] = TRUE;
		}else{
			$data['status'] = FALSE;
		}
		echo json_encode($data);
	}

	function rubah($id){
		$cek = $this->MyModel->cek_id($id);
		if($cek->total >= 1 ){
			$dt = $this->MyModel->get_by_id($id);
		    if($dt->id_kota_fk == '' or $dt->id_kota_fk == null or $dt->id_kota_fk == 0){
		        $select_id_provinsi = '-';
		        $select_id_kota = '';
		        $select_id_kecamatan = '';
		    }else{
		        $selected = $this->MyModel->get_selected_by_id_kecamatan($dt->id_kecamatan_fk);
		        $select_id_provinsi = $selected->id_provinsi_fk;
		        $select_id_kota = $selected->id_kota;
		        $select_id_kecamatan = $selected->id_kecamatan;
		    }
		    $data = array(
		        'title' => 'Edit Data Desa',
		        'title2' => 'Form Data Desa',
		        'id' => $id,
		        'get_data' => $this->MyModel->get_by_id($id),
		        'provinsi' => $this->MyModel->get_provinsi(),
		        'kota' => $this->MyModel->get_kota(),
		        'kecamatan' => $this->MyModel->get_kecamatan(),
		        'provinsi_selected' => $select_id_provinsi,
		        'kota_selected' => $select_id_kota,
		        'kecamatan_selected' => $select_id_kecamatan,
		    );
		    $data['last_login']				= $this->MyModel->last_login($this->session->userdata('user_id'));
			$data['title'] 					= 'Desa';
			$data['menu_active_parent'] 	= 'Master';
			$data['menu_active_sub'] 		= 'Desa';
		    $this->template('v_edit', $data);	
		}else{
			redirect('mod_desa');
		}
	}

	function ajax_edit($id){
		$data = $this->MyModel->get_by_id($id);
		echo json_encode($data);
	}

	function ajax_update(){
		$data = array(
			'id_desa' => $this->input->post('id_kecamatan_fk').''.$this->input->post('nomor'),
			'nama_desa'	=> strtoupper($this->input->post('nama_desa')),
			'id_provinsi_fk' => $this->input->post('id_provinsi_fk'),
			'id_kota_fk' => $this->input->post('id_kota_fk'),
			'id_kecamatan_fk' => $this->input->post('id_kecamatan_fk'),
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