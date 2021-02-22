<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_page extends CI_Controller {

	var $order = array('id' => 'desc'); 
    var $table = 'bucket_page';
    var $idq = 'id';
    var $column_order = array(); 
    var $column_search = array('judul');

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MyModel');
		$this->load->model('ModelMenu');
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
		$data['CheckAllowAccess'] 	= $this->MyModel->CheckAllowAccess(get_class($this));
		$data['last_login']			= $this->MyModel->last_login($this->session->userdata('user_id'));
		$data['title'] 				= 'Pages';
		$data['menu_active_parent'] = 'Pages';
		$data['menu_active_sub'] 	= '';
		$data['menu_active_sub1'] 	= '';
		$this->template('view', $data);
	}

	function ajax_list(){
		$CheckAllowAccess = $this->MyModel->CheckAllowAccess(get_class($this));
		if($CheckAllowAccess[0]['access_detail'] == 0){ $allow_detail = 0; }else{ $allow_detail = 1; }
		if($CheckAllowAccess[0]['access_edit'] == 0){ $allow_edit = 0; }else{ $allow_edit = 1; }
		if($CheckAllowAccess[0]['access_delete'] == 0){ $allow_delete = 0; }else{ $allow_delete = 1; }
		$list 	= $this->MyModel->get_datatables();
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list as $li){
			$no++;
			$row = array();
			//-- Col 1
			$row[] = '	<center>
						<input 	type="checkbox" 
								class="data-check" 
								value="'.$li->id.'">
						</center>';
			// -- Col 2
			if($li->foto == '' or $li->foto == null){
				$row[] = '<img  src="'.base_url().'themes/no-image.png" 
								class="img-responsive" 
								style="width: 60px">';
			}else{
				$row[] = '<img 	src="'.base_url().'uploads/page/'.$li->foto.'" 
								class="img-responsive" 
								style="width: 60px">';
			}
			// -- Col 3
			$row[] = $li->judul;
			// -- Col 4
			if($li->status == 1){
				$row[] = '<center><i class="fa fa-check"></i></center>';
			}else{
				$row[] = '<center><i class="fa fa-times"></i></center>';
			}
			// -- Col 5
			$row[] = '	<a 	href="'.base_url().'page/'.$li->slug.'" 
							class="btn btn-primary btn-sm btn-flat" 
							target="BLANK">
							<i class="fa fa-external-link"></i> 
						</a>';
			// -- Btn Detail 
			if($allow_detail == 0){
				$btn_detail = '';
			}else{
				$btn_detail = '	<a 	class="btn btn-flat btn-primary btn-sm " 
									href="javascript:void(0)" 
									title="Edit" onclick="detail_posting('."'".$li->id."'".')">
								<i 	class="fa fa-eye"></i> Detail</a>';
			}	
			// -- Btn Edit
			if($allow_edit == 0){
				$btn_edit = '';
			}else{
				$btn_edit = '	<a 	class="btn btn-flat btn-warning btn-sm " 
									href="javascript:void(0)" 
									title="Edit" onclick="edit_posting('."'".$li->id."'".')">
								<i class="fa fa-edit"></i> Edit </a>';
			}
			// -- Btn Delete 
			if($allow_delete == 0){
				$btn_delete = '';
			}else{
				$btn_delete = ' <a 	class="btn btn-flat btn-danger btn-sm " 
									href="javascript:void(0)" 
									title="Edit" onclick="delete_posting('."'".$li->id."'".')">
								<i 	class="fa fa-trash"></i> Delete </a>';
			}
			// -- Col 6
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

	public function ajax_add(){
		$judul 				= $this->input->post('judul');
		$deskripsi 			= $this->input->post('deskripsi');
		$tanggal_posting 	= $this->input->post('tanggal_posting');
		$status 			= $this->input->post('status');
		$kontent 			= $this->input->post('kontent');
		if($judul == ''){ 
			$data['error']['judul'] = '
			<small>
				<b style="color: red">
					<i class="fa fa-times"> </i> Tolong di Isi  !
				</b>
			</small>';
		}
		if($judul == ''){ 
			$data['error']['colJudul'] = 'red';
		}
		if($deskripsi == ''){ 
			$data['error']['deskripsi'] = '
			<small>
				<b style="color: red">
					<i class="fa fa-times"></i> Tolong di Isi  !
				</b>
			</small>';
		}
		if($deskripsi == ''){ 
			$data['error']['colDeskripsi'] = 'red';
		}
		if($tanggal_posting == ''){ 
			$data['error']['tanggal_posting'] = '
			<small>
				<b style="color: red">
					<i class="fa fa-times"></i> Tolong di Isi  !
				</b>
			</small>';
		}
		if($tanggal_posting == ''){ 
			$data['error']['colTglPosting'] = 'red';
		}	
		if($status == ''){ 
			$data['error']['status'] = '
			<small>
				<b style="color: red">
					<i class="fa fa-times"></i> Tolong di Isi  !
				</b>
			</small>';
		}
		if($status == ''){ 
			$data['error']['colStatus'] = 'red';
		}
		if($kontent == ''){
			$data['error']['kontent'] = '
			<small>
				<b style="color: red">
					<i class="fa fa-check"></i> Tolong di Isi !
				</b>
			</small>
			';
		}	
		if (empty($data['error'])) {
				$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($this->input->post('judul')));
				$datas = array(
						'slug' => $slug,
						'judul' => $this->input->post('judul'),
						'deskripsi' => $this->input->post('deskripsi'),
						'tanggal_posting' => $this->input->post('tanggal_posting'),
						'status' => $this->input->post('status'),
						'kontent' => $this->input->post('kontent'),
						'insert_date' => date('Y-d-m h:i:s'),
						'insert_by' => $this->session->userdata('user_id'),
						'is_trash' => 1,
				);
				if(!empty($_FILES['poto']['name'])){
					$upload = $this->_do_upload(); 
					$datas['foto'] = $upload;
				}
				$insert = $this->MyModel->save($datas);
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
		$judul 				= $this->input->post('judul');
		$deskripsi 			= $this->input->post('deskripsi');
		$tanggal_posting 	= $this->input->post('tanggal_posting');
		$status 			= $this->input->post('status');
		$kontent 			= $this->input->post('kontent');
		if($judul == ''){ 
			$data['error']['judul'] = '
			<small>
				<b style="color: red">
					<i class="fa fa-times"> </i> Tolong di Isi  !
				</b>
			</small>';
		}
		if($judul == ''){ 
			$data['error']['colJudul'] = 'red';
		}
		if($deskripsi == ''){ 
			$data['error']['deskripsi'] = '
			<small>
				<b style="color: red">
					<i class="fa fa-times"></i> Tolong di Isi  !
				</b>
			</small>';
		}
		if($deskripsi == ''){ 
			$data['error']['colDeskripsi'] = 'red';
		}
		if($tanggal_posting == ''){ 
			$data['error']['tanggal_posting'] = '
			<small>
				<b style="color: red">
					<i class="fa fa-times"></i> Tolong di Isi  !
				</b>
			</small>';
		}
		if($tanggal_posting == ''){ 
			$data['error']['colTglPosting'] = 'red';
		}	
		if($status == ''){ 
			$data['error']['status'] = '
			<small>
				<b style="color: red">
					<i class="fa fa-times"></i> Tolong di Isi  !
				</b>
			</small>';
		}
		if($status == ''){ 
			$data['error']['colStatus'] = 'red';
		}
		if($kontent == ''){
			$data['error']['kontent'] = '
			<small>
				<b style="color: red">
					<i class="fa fa-check"></i> Tolong di Isi !
				</b>
			</small>
			';
		}	
		if (empty($data['error'])) {
				$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($this->input->post('judul')));
				$datas = array(
						'slug' => $slug,
						'judul' => $this->input->post('judul'),
						'deskripsi' => $this->input->post('deskripsi'),
						'tanggal_posting' => $this->input->post('tanggal_posting'),
						'status' => $this->input->post('status'),
						'kontent' => $this->input->post('kontent'),
						'update_date' => date('Y-d-m h:i:s'),
						'update_by' => $this->session->userdata('user_id'),
						'is_trash' => 1,
				);
				if(!empty($_FILES['poto']['name'])){
					$upload = $this->_do_upload(); 
					$datas['foto'] = $upload;
				}
				$this->MyModel->update(array('id' => $this->input->post('id')), $datas);
				$data['status'] = TRUE;
		}else{
				$data['status'] = FALSE;
		}
		echo json_encode($data);
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
		$config['upload_path']		= 'uploads/page/';
        $config['allowed_types']  	= 'gif|jpg|png|jpeg';
        $config['max_size']        	= 1000;
        $config['max_width']       	= 0;
        $config['max_height']      	= 0;
        $config['file_name']       	= date('dmYhis'); 
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