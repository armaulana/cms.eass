<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_posting extends CI_Controller {

	var $order = array('id' => 'desc'); 
    var $table = 'bucket_posting';
    var $idq = 'id';
    var $column_order = array(); 
    var $column_search = array('a.judul');

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
		$data['menu_active_parent'] 	= 'Posting';
		$data['menu_active_sub'] 		= 'Entries';
		$data['menu_active_sub1'] 		= '';
		$data['title'] 					= 'Entries';
		$data['kategori'] 				= $this->db->where('is_trash', 1)->get('bucket_posting_category')->result();
		$this->template('view', $data);
	}

	function ajax_list(){
		$CheckAllowAccess = $this->MyModel->CheckAllowAccess(get_class($this));
		if($CheckAllowAccess[0]['access_detail'] == 0){ $allow_detail = 0; }else{ $allow_detail = 1; 	}
		if($CheckAllowAccess[0]['access_edit'] 	== 0){ $allow_edit = 0; }else{ $allow_edit = 1; 	}
		if($CheckAllowAccess[0]['access_delete'] == 0){ $allow_delete = 0; }else{ $allow_delete = 1; 	}
		$this->load->model('MyModel','kategori');
		$list 	= $this->MyModel->get_datatables();
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list as $li) {
			$no++;
			$row = array();
			//-- Col 1
			$row[] = '<center><input type="checkbox" class="data-check" value="'.$li->id.'"></center>';
			if($li->slider == null or $li->slider == '' or $li->slider == 0){
				$icon = '<i style="color: red" class="fa fa-times"></i>';
			}else{
				$icon = '<i style="color: green" class="fa fa-check"></i>';
			}
			if($li->status == 1){
				$status = '<span style="color: #367fa9;"><b> • Publish</b>';
			}else{
				$status = '<span style="color: #dd4b39;"><b> • Unpublish</b>';
			}
			//-- Col 2
			$row[] = ' 	<img src="'.base_url('uploads/entries/'.$li->foto.'').'" 
							class="img-responsive" 
							style="width: 60px; float: left; margin-right: 10px; margin-bottom: 10px;">
						<b>'.$li->judul.'</b><br/>
						<span class="mx-1" style="color: #70707070">•</span>
						<small style="color: #70707070">
							<b >Kategori '.strtolower($li->nm_kat).'</b> &nbsp; &nbsp;
							<span class="mx-1">•</span> 
							<b style="color: #70707070"> Slider </b> '.$icon.' &nbsp; &nbsp; 
							'.$status.' &nbsp; &nbsp; 
							<span style="color: #70707070">•</span>
							<b style="color: #70707070">'.$li->read.' Read</b>
						</small>';
			//-- Col 3
			$row[] = '	<span class="mx-1">•</span>
						<b>'.date('d M Y', strtotime($li->tanggal_posting)).'</b>
						<br/>
						<span class="mx-1" style="color: #70707070">•</span>
						<small style="color: #70707070">
						<b> 
						'.$li->jam.'
						</b>
						</small>';
			//-- Col 3
			$row[] = '	<a 	href="'.base_url().'posting/'.$li->slug.'" 
							class="btn btn-primary btn-sm btn-flat" 
							target="BLANK">
							<i class="fa fa-external-link"></i> 
						</a>';
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
		$id_kategori 	= $this->input->post('id_kategori');
		$judul 			= $this->input->post('judul');
		$deskripsi		= $this->input->post('deskripsi');
		$tanggal_posting	= $this->input->post('tanggal_posting');
		$jam				= $this->input->post('jam');
		$kontent			= $this->input->post('kontent');
		$status				= $this->input->post('status');
		$slider 			= $this->input->post('slider');
		//-- Color
		if($id_kategori == '') {
			$data['error']['colId_kategori'] = 'red';
		}
		//-- Notif 
		if($id_kategori == ''){
			$data['error']['id_kategori'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';
		}
		//-- Color
		if($judul == '') {
			$data['error']['colJudul'] = 'red';
		}
		//-- Notif
		if($judul == '') {
			$data['error']['judul'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';
		}
		//-- Color
		if($deskripsi == '') {
			$data['error']['colDeskripsi'] = 'red';
		}
		//-- Notif
		if($deskripsi == ''){
			$data['error']['deskripsi'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';
		}
		//-- Color
		if($tanggal_posting == '') {
			$data['error']['datepicker2'] = 'red';
		}
		//-- Notif
		if($tanggal_posting == '') {
			$data['error']['tanggal_posting'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';
		}
		//-- Color
		if($jam == '') {
			$data['error']['colJam'] = 'red';
		}
		//-- Notif
		if($jam == ''){
			$data['error']['jam'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';

		}
		//-- Color 
		if ($status == '') {
			$data['error']['colStatus'] = 'red';
		}
		//-- Notif
		if ($status == '') {
			$data['error']['status'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';
		}
		//-- Notif
		if($kontent == '') {
			$data['error']['kontent'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small
			';
		}
		//-- Color
		if ($slider == '') {
			$data['error']['colSlider'] = 'red';
		}
		//-- Notif
		if ($slider == '') {
			$data['error']['slider'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';
		}
		//-- Insert
		if (empty($data['error'])) {
			$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($this->input->post('judul')));
			$data = array(
						'id_kat' => $this->input->post('id_kategori'),
						'slug' => $slug,
						'judul' => $this->input->post('judul'),
						'deskripsi' => $this->input->post('deskripsi'),
						'tanggal_posting' => $this->input->post('tanggal_posting'),
						'jam' => $this->input->post('jam'),
						'status' => $this->input->post('status'),
						'kontent' => $this->input->post('kontent'),
						'slider' => $this->input->post('slider'),
						'insert_date' => date('Y-d-m h:i:s'),
						'insert_by' => $this->session->userdata('user_id'),
						'is_trash' => 1,
			);
			if(!empty($_FILES['poto']['name'])){
				$upload = $this->_do_upload(); 
				$data['foto'] = $upload;
			}
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
		$id_kategori 	= $this->input->post('id_kategori');
		$judul 			= $this->input->post('judul');
		$deskripsi		= $this->input->post('deskripsi');
		$tanggal_posting	= $this->input->post('tanggal_posting');
		$jam				= $this->input->post('jam');
		$kontent			= $this->input->post('kontent');
		$status				= $this->input->post('status');
		$slider 			= $this->input->post('slider');
		//-- Color
		if($id_kategori == '') {
			$data['error']['colId_kategori'] = 'red';
		}
		//-- Notif 
		if($id_kategori == ''){
			$data['error']['id_kategori'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';
		}
		//-- Color
		if($judul == '') {
			$data['error']['colJudul'] = 'red';
		}
		//-- Notif
		if($judul == '') {
			$data['error']['judul'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';
		}
		//-- Color
		if($deskripsi == '') {
			$data['error']['colDeskripsi'] = 'red';
		}
		//-- Notif
		if($deskripsi == ''){
			$data['error']['deskripsi'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';
		}
		//-- Color
		if($tanggal_posting == '') {
			$data['error']['datepicker2'] = 'red';
		}
		//-- Notif
		if($tanggal_posting == '') {
			$data['error']['tanggal_posting'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';
		}
		//-- Color
		if($jam == '') {
			$data['error']['colJam'] = 'red';
		}
		//-- Notif
		if($jam == ''){
			$data['error']['jam'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';

		}
		//-- Color 
		if ($status == '') {
			$data['error']['colStatus'] = 'red';
		}
		//-- Notif
		if ($status == '') {
			$data['error']['status'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';
		}
		//-- Notif
		if($kontent == '') {
			$data['error']['kontent'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small
			';
		}
		//-- Color
		if ($slider == '') {
			$data['error']['colSlider'] = 'red';
		}
		//-- Notif
		if ($slider == '') {
			$data['error']['slider'] = '
				<small>
					<b style="color: red">
						<i class="fa fa-times"></i> Tolong di Isi !
					</b>
				</small>
			';
		}
		if(empty($data['error'])){
			$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($this->input->post('judul')));
			$datas = array(
					'id_kat' => $this->input->post('id_kategori'),
					'slug' => $slug,
					'judul' => $this->input->post('judul'),
					'deskripsi' => $this->input->post('deskripsi'),
					'tanggal_posting' => $this->input->post('tanggal_posting'),
					'jam' => $this->input->post('jam'),
					'status' => $this->input->post('status'),
					'kontent' => $this->input->post('kontent'),
					'slider' => $this->input->post('slider'),
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