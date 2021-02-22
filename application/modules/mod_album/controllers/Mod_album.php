<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_album extends CI_Controller {

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
		$data['CheckAllowAccess'] 		= $this->MyModel->CheckAllowAccess(get_class($this));
		$data['last_login']				= $this->MyModel->last_login($this->session->userdata('user_id'));
		$data['title'] 					= 'Entries Foto';
		$data['menu_active_parent'] 	= 'Albums';
		$data['menu_active_sub'] 		= 'Entries Foto';
		$data['menu_active_sub1'] 		= '';
		$data['album']	 				= $this->db->where('is_trash', 1)->get('bucket_album_name')->result();
		$this->template('view', $data);
	}

	function ajax_list(){
		$CheckAllowAccess = $this->MyModel->CheckAllowAccess(get_class($this));
		if($CheckAllowAccess[0]['access_detail'] == 0){ $allow_detail = 0; }else{ $allow_detail = 1; 	}
		if($CheckAllowAccess[0]['access_edit'] 	== 0){ $allow_edit = 0; }else{ $allow_edit = 1; 	}
		if($CheckAllowAccess[0]['access_delete'] == 0){ $allow_delete = 0; }else{ $allow_delete = 1; 	}
		$this->load->model('MyModel');
		$list 	= $this->MyModel->get_datatables();
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list as $li) {
			$no++;
			$row = array();
			//-- Col 1
			$row[] = '<center><input type="checkbox" class="data-check" value="'.$li->id.'"></center>';
			$row[] = $li->nama_album;
			$row[] = '<b>'.$li->total.' File Photo</b>';
			//-----Btn Detail 
			if($allow_detail == 0){
				$btn_detail = '';
			}else{
				$btn_detail = '
						<a class="btn btn-flat btn-primary btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="detail_posting('."'".$li->id."'".')">
						<i class="fa fa-eye"></i> Albums Detail </a>';
			}	
			//------Btn Edit
			if($allow_edit == 0){
				$btn_edit = '';
			}else{
				$btn_edit = '
						<a class="btn btn-flat btn-success btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="edit_posting('."'".$li->id."'".')">
						<i class="fa fa-image"></i> Add Foto </a>';
			}
			//------ Btn Delete 
			if($allow_delete == 0){
				$btn_delete = '';
			}else{
				$btn_delete = '
						<a class="btn btn-flat btn-danger btn-sm " 
						href="javascript:void(0)" 
						title="Edit" onclick="delete_posting('."'".$li->id_album."'".')">
						<i class="fa fa-eye"></i> Delete Albums</a>';
			}
			//-- Col 4
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
		$id_album 	= $this->input->post('id_album');
		//-- Color
		if($id_album == '') {
			$data['error']['colId_album'] = 'red';
		}
		//-- Notif 
		if($id_album == ''){
			$data['error']['id_album'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';
		}
		//-- Insert
		if (empty($data['error'])) {
			$config['upload_path']          = 'uploads/album/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$config['encrypt_name'] 		= true;
			$this->load->library('upload',$config);
			$jumlah_berkas = count($_FILES['berkas']['name']);
			for($i = 0; $i < $jumlah_berkas;$i++){
	            if(!empty($_FILES['berkas']['name'][$i])){
					$_FILES['file']['name'] = $_FILES['berkas']['name'][$i];
					$_FILES['file']['type'] = $_FILES['berkas']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['berkas']['error'][$i];
					$_FILES['file']['size'] = $_FILES['berkas']['size'][$i];
					if($this->upload->do_upload('file')){
						$uploadData = $this->upload->data();
						$file_name = $uploadData['file_name'];
						$data = array(
									'id_album' => $this->input->post('id_album'),
									'foto' => $file_name,
									'insert_date' => date('Y-d-m h:i:s'),
									'insert_by' => $this->session->userdata('user_id'),
									'is_trash' => 1,
						);
						$this->db->insert('bucket_album_foto',$data);
					}
				}
			}
			$data['status'] = TRUE;
		}else{
			$data['status'] = FALSE;
		}
		echo json_encode($data);
	}

	function ajax_detail($id){
		$this->db->where('id_album', $id);
		$this->db->where('is_trash', 1);
		$file_foto = $this->db->get('bucket_album_foto')->result();
		foreach ($file_foto as $key) {
			$file_data[] = 	'
            <li>
                <span class="mailbox-attachment-icon has-img">
                    <img src="'.base_url().'uploads/album/'.$key->foto.'" alt="Attachment">
                </span>
                <div class="mailbox-attachment-info">
                   	<a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo</a>
                        <span class="mailbox-attachment-size">
                            Image File
                        <a 	href="javascript:void(0)" 
                        	class="btn btn-danger btn-xs pull-right" 
                        	onclick="delete_foto('."'".$key->id."'".')">
                        	<i class="fa fa-trash"></i>
                        </a>
                        </span>
                </div>
            </li>
			';
		}
		$data['detail_foto'] = $file_data;
		echo json_encode($data);
	}

	function ajax_edit($id){
		$data = $this->MyModel->get_by_id($id);
		echo json_encode($data);
	}

	function ajax_delete_foto($id){
		date_default_timezone_set('Asia/Jakarta');
		$data = array(
				'is_trash_date' => date('Y-m-d h:i:s'), 
				'is_trash_by' => $this->session->userdata('user_id'),
				'is_trash' => 0
		);
		$this->db->where('id', $id);
		$this->db->update('bucket_album_foto', $data);
		$this->db->affected_rows();
		echo json_encode(array('status' => TRUE));
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
	
	function _do_upload(){
    	date_default_timezone_set('Asia/Jakarta');
		$code = round(microtime(true) * 1000); 
		$config['upload_path']          = 'uploads/entries/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000;
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

?>