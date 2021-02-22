<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_users extends CI_Controller {

	var $order = array('id' => 'desc'); 
    var $table = 'users';
    var $idq = 'id';
    var $column_order = array('username', 'email'); 
    var $column_search = array('username', 'email');

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

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
		$user_data['check_allow_access']	= $this->MyModel->check_allow_access(get_class($this));
		$user_data['last_login']			= $this->MyModel->last_login($this->session->userdata('user_id'));
		$user_data['menu_active_parent'] 	= 'Configurasi';
		$user_data['menu_active_sub'] 		= 'Users';
		$user_data['menu_active_sub1'] 		= 'Users';
		$user_data['title'] 				= 'Users';		
		$this->load->helper('url');
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
			$row[] = $li->username;
			$row[] = $li->email;
			if($li->active == 1){
				$status = "<i style='color: green' class='fa fa-check'></i>";
			}else{
				$status = "<i style='color: red' class='fa fa-times'></i>";
			}
			$row[] = $status;
			//-----Btn Detail 
			if($allow_detail == 0){
				$btn_detail = '';
			}else{
				$btn_detail = '
						<a class="btn btn-flat btn-primary btn-sm " 
						href="'.base_url().'mod_users/detail_user/'.$li->id.'" 
						title="Edit" >
						<i class="fa fa-eye"></i> Detail</a>';
			}	
			//------Btn Edit
			if($allow_edit == 0){
				$btn_edit = '';
			}else{
				$btn_edit = '
						<a class="btn btn-flat btn-warning btn-sm " 
						href="'.base_url().'mod_users/edit_user/'.$li->id.'" 
						title="Edit">
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

	public function create_user(){
		$this->data['last_login']			= $this->MyModel->last_login($this->session->userdata('user_id'));
		$this->data['title'] 				= 'Form';
		$this->data['menu_active_parent'] 	= 'Configurasi';
		$this->data['menu_active_sub'] 		= 'Users';
		$this->data['menu_active_sub1'] 	= 'Users';
		$this->data['users_level']			= $this->db->get('groups')->result();
		$this->data['provinsi']				= $this->db->where('is_trash', 1)->get('bucket_ref_provinsi')->result();
		$this->data['kota']					= $this->db->where('is_trash', 1)->get('bucket_ref_kota')->result();
		$this->data['kecamatan']			= $this->db->where('is_trash', 1)->get('bucket_ref_kecamatan')->result();
		$this->template('v_tambah2', $this->data);
	}

	public function ajax_add(){
		$user_level 		= $this->input->post('user_level');
		$user_name 			= $this->input->post('user_name');
		$first_name 		= $this->input->post('first_name');
		$last_name 			= $this->input->post('last_name');
		$jenis_kelamin 		= $this->input->post('jenis_kelamin');
		$company 			= $this->input->post('company');
		$phone				= $this->input->post('phone');
		$email 				= $this->input->post('email');
		$password 			= $this->input->post('password');
		$password_confirm 	= $this->input->post('password_confirm');
		$alamat 			= $this->input->post('alamat');
		$prov 				= $this->input->post('prov');
		$kota 				= $this->input->post('kota');
		$kec 				= $this->input->post('kec');
		$kode_pos 			= $this->input->post('kode_pos');
		$no_telp 			= $this->input->post('no_telp');
		$status 			= $this->input->post('active');
		$cekEmail = $this->db->where('is_trash', 1)->where('email', $email)->get('users')->num_rows();
			
		if ($email == '') { 
			$data['error']['tidakditemukan'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Email belum di isi ! </b><small><br/>';
		}elseif($cekEmail > 0){
			$data['error']['tidakditemukan'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Email sudah di gunakan ! </b></small><br/>';
		}

		if ($user_level == '') { $data['error']['user_level'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi  !</b></small>';}
		if ($user_level == '') { $data['error']['color'] = 'red';}
		if ($user_name == '') { $data['error']['user_name'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi  !</b></small>';}
		if ($user_name == '') { $data['error']['color1'] = 'red';}
		if ($first_name == '') { $data['error']['first_name'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi ! </b></small>'; }
		if ($first_name == '') { $data['error']['color2'] = 'red';}
		if ($last_name == '') { $data['error']['last_name'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi ! </b></small>';}
		if ($last_name == '') { $data['error']['color3'] = 'red';}
		if ($jenis_kelamin == '') { $data['error']['jenis_kelamin'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi ! </b></small>';}
		if ($jenis_kelamin == '') { $data['error']['color4'] = 'red';}
		if ($company == '') { $data['error']['company'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi !</b></small><br/>'; }
		if ($company == '') { $data['error']['color5'] = 'red';}
		if ($email == '') { $data['error']['email'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi !</b></small><br/>'; }
		if ($email == '') { $data['error']['color6'] = 'red';}
		if ($phone == '') { $data['error']['phone'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi !</b></small><br/>'; }
		if ($phone == '') { $data['error']['color7'] = 'red';}
		if ($password == '') { $data['error']['password'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi ! </b></small>';}
		if ($password == '') { $data['error']['color8'] = 'red';}
		if ($password_confirm == '') { $data['error']['password_confirm'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi ! </b></small>';}
		if ($password_confirm == '') { $data['error']['color9'] = 'red';}
		if ($alamat == '') { $data['error']['alamat'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi ! </b></small>';}
		if ($alamat == '') { $data['error']['color10'] = 'red';}
		if ($prov == '') { $data['error']['prov'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi ! </b></small>';}
		if ($prov == '') { $data['error']['color11'] = 'red';}
		if ($kota == '') { $data['error']['kota'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi ! </b></small>';}
		if ($kota == '') { $data['error']['color12'] = 'red';}
		if ($kec == '') { $data['error']['kec'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi ! </b></small>';}
		if ($kec == '') { $data['error']['color13'] = 'red';}
		if ($kode_pos == '') { $data['error']['kode_pos'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi ! </b></small>';}
		if ($kode_pos == '') { $data['error']['color14'] = 'red';}
		if ($status == '') { $data['error']['status'] = '<small><b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi ! </b></small>';}
		if ($status == '') { $data['error']['color15'] = 'red';}

		if (empty($data['error'])) {
				$pass 	= $this->ion_auth_model->hash_password($this->input->post('password'),FALSE,FALSE);
				$data = array(
						'token' => '0',
						'ip_address' => '::1',
						'users_level_id' => $this->input->post('user_level'), 
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'id_kelamin' => $this->input->post('jenis_kelamin'),
						'company' => $this->input->post('company'),
						'email' => $this->input->post('email'),
						'username' => $this->input->post('user_name'),
						'password' => $pass,
						'active' => $this->input->post('active'),
						'phone' => $this->input->post('phone'),
						'alamat' => $this->input->post('alamat'),
						'prov' => $this->input->post('prov'),
						'kot' => $this->input->post('kot'),
						'kec' => $this->input->post('kec'),
						'kode_pos' => $this->input->post('kode_pos'),
						'no_telp' => $this->input->post('no_telp'),
						'is_trash' => 1,
				);
				$insert = $this->MyModel->save($data);
				$id 	= $this->db->insert_id();				
				$data2 = array(
						'user_id' => $id,
						'group_id' => $this->input->post('user_level')	
				);
				$insert2 = $this->db->insert('users_groups',$data2);
				$data['status'] = TRUE;
		}else{
				$data['status'] = FALSE;
		}
		echo json_encode($data);
	}

	public function edit_user($id){
			$this->data['title'] = $this->lang->line('edit_user_heading');
			if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id))){
				redirect('auth/login', 'refresh');
			}

			$user = $this->ion_auth->user($id)->row();
			if($user == FALSE){
				redirect('auth/login', 'refresh');
			}
	
			$groups=$this->ion_auth->groups()->result_array();
			$currentGroups = $this->ion_auth->get_users_groups($id)->result();
	
			if (!empty($_POST)){
	
				if ($this->input->post('password')){
					$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
					$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
				}
	
				if ($this->form_validation->run() === TRUE){
					$data = array(
						'users_level_id' => $this->input->post('user_level'),
						'username' => $this->input->post('user_name'),
						'first_name' => $this->input->post('first_name'),
						'last_name'  => $this->input->post('last_name'),
						'email'    => $this->input->post('email'),
						'company'    => $this->input->post('company'),
						'phone'      => $this->input->post('phone'),
						'id_kelamin'      => $this->input->post('jenis_kelamin'),
						'alamat'      => $this->input->post('alamat'),
						'prov'      => $this->input->post('prov'),
						'kot'      => $this->input->post('kota'),
						'kec'      => $this->input->post('kec'),
						'kode_pos'      => $this->input->post('kode_pos'),
						'active'      => $this->input->post('active'),
					);
	
					// update the password if it was posted
					if ($this->input->post('password')){
						$data['password'] = $this->input->post('password');
					}
	
					// Only allow updating groups if user is admin
					if ($this->ion_auth->is_admin()){
						//Update the groups user belongs to
						$groupData = $this->input->post('groups');
	
						if (isset($groupData) && !empty($groupData)) {
							$this->ion_auth->remove_from_group('', $id);
	
							foreach ($groupData as $grp) {
								$this->ion_auth->add_to_group($grp, $id);
							}
						}
					}

					// cek user exist
					$cekUser = $this->db->select('COUNT(*) as total')->where('user_id', $id)->get('users_groups')->row();
					if($cekUser->total > 0 ){
						// Jika ada update saja yg ada
						$data2 = array(
							'user_id' => $this->input->post('id'),
							'group_id' => $this->input->post('user_level')	
						);
						$insert2 = $this->db->update('users_groups', $data2, array('user_id' => $this->input->post('id')));
					}else{
						// Jika tidak insert 
						$dt = array(
							'user_id' => $id,
							'group_id' => $this->input->post('user_level')	
						);
						$insert2 = $this->db->insert('users_groups',$dt);
					}

					// check to see if we are updating the user
				   	if($this->ion_auth->update($user->id, $data)){
						// redirect them back to the admin page if admin, or to the base url if non admin
						$this->session->set_flashdata('message', $this->ion_auth->messages() );
						if ($this->ion_auth->is_admin()){
							//redirect('auth/login', 'refresh');
						}else{
							//redirect('auth/login', 'refresh');
						}
	
					}else{
						// redirect them back to the admin page if admin, or to the base url if non admin
						$this->session->set_flashdata('message', $this->ion_auth->errors() );
						if ($this->ion_auth->is_admin()){
							redirect('mod_users', 'refresh');
						}else{
							redirect('mod_users', 'refresh');
						}
					}
				}
			}else{
				
			}
	
			// display the edit user form
			$this->data['csrf'] = $this->_get_csrf_nonce();
	
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
	
			// pass the user to the view
			$this->data['user'] = $user;
			$this->data['groups'] = $groups;
			$this->data['currentGroups'] = $currentGroups;
	
			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name', $user->first_name),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name', $user->last_name),
			);
			$this->data['company'] = array(
				'name'  => 'company',
				'id'    => 'company',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('company', $user->company),
			);
			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phone', $user->phone),
			);
			$this->data['password'] = array(
				'name' => 'password',
				'id'   => 'password',
				'type' => 'password'
			);
			$this->data['password_confirm'] = array(
				'name' => 'password_confirm',
				'id'   => 'password_confirm',
				'type' => 'password'
			);

			$this->db->where('id', $this->session->userdata('user_id'));
			$this->data['last_login']			= $this->db->get('users')->result();
			$this->data['title'] 				= 'Form';
			$this->data['menu_active_parent'] 	= 'Configurasi';
			$this->data['menu_active_sub'] 		= 'Users';
			$this->data['menu_active_sub1'] 	= 'Users';
			$this->data['get_data'] 			= $this->MyModel->get_by_id($id);
			$this->data['groups']				= $this->db->get('groups')->result();
			$this->data['provinsi']				= $this->db->where('is_trash', 1)->get('bucket_ref_provinsi')->result();
			$this->data['kota']					= $this->db->where('is_trash', 1)->get('bucket_ref_kota')->result();
			$this->data['kecamatan']			= $this->db->where('is_trash', 1)->get('bucket_ref_kecamatan')->result();

			$this->template('v_rubah', $this->data);
	}

	public function detail_user($id){
		$this->data['last_login']			= $this->MyModel->last_login($this->session->userdata('user_id'));
		$this->data['title'] 				= 'Detail';
		$this->data['menu_active_parent'] 	= 'Configurasi';
		$this->data['menu_active_sub'] 		= 'Users';
		$this->data['menu_active_sub1'] 	= 'Users';
		$this->data['groups']				= $this->db->get('groups')->result();
		$this->data['provinsi']				= $this->db->where('is_trash', 1)->get('bucket_ref_provinsi')->result();
		$this->data['kota']					= $this->db->where('is_trash', 1)->get('bucket_ref_kota')->result();
		$this->data['kecamatan']			= $this->db->where('is_trash', 1)->get('bucket_ref_kecamatan')->result();
		$this->data['get_data']				= $this->db->where('is_trash', 1)->get('users')->row();
		$this->template('v_detail', $this->data);
	}

	function forgot_password(){
		header('X-Frame-Options: DENY');
		date_default_timezone_set('Asia/Jakarta');
		$email 	  = $this->input->post('email');
		$cekEmail = $this->db->where('email', $email)->get('users')->num_rows();
		if ($cekEmail < 1) { 
			$data['error']['tidakditemukan'] = '
				<b style="color: red"><i class="fa fa-times"> </i> Email tidak di Temukan  !</b>';
		}
		if ($email == '') { 
			$data['error']['email'] = '
				<b style="color: red"><i class="fa fa-times"> </i> Tolong email di Isi  !</b>';
		}			
		if (empty($data['error'])) {
			date_default_timezone_set('Etc/UTC');
			$pass 	= $this->ion_auth_model->hash_password('password',FALSE,FALSE);
			
			$data = array(
						'password' => $pass,
			);
			$insert = $this->db->update('users', $data, array('email' => $this->input->post('email')));
			$id 	= $this->db->insert_id();
			$data['status'] = true; // jika validasi berhasil
		}else{
			$data['status'] = false; // jika validasi gagal
		}
		// ------ End ---- //
		echo json_encode($data);
	}

	function registrasi(){
		header('X-Frame-Options: DENY');
		date_default_timezone_set('Asia/Jakarta');
		$nama 				= $this->input->post('nama');
		$email 				= $this->input->post('email');
		$password 			= $this->input->post('password');
		$password_confirm 	= $this->input->post('password_confirm');
		$cekEmail = $this->db->where('is_trash', 1)->where('email', $email)->get('users')->num_rows();
			if ($email == '') { 
				$data['error']['altFormInput21'] = '
					<small>
						<b style="color: red"><i class="fa fa-times"> </i> Email belum di isi ! </b>
					<small><br/>';
			}elseif($cekEmail > 0){
				$data['error']['altFormInput21'] = '
					<small>
						<b style="color: red"><i class="fa fa-times"> </i> Email sudah di gunakan ! </b>
					</small><br/>';
			}
	
			if ($nama == '') { 
				$data['error']['altFormInput1'] = '
					<small>
						<b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi  !</b>
					</small>';
			}
			if ($nama == '') { 
				$data['error']['colFormInput1'] = 'red';
			}
	
			if ($email == '') { 
				$data['error']['altFormInput2'] = '
					<small>
						<b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi !</b>
					</small><br/>'; }
			if ($email == '') { 
				$data['error']['colFormInput2'] = 'red';
			}
	
			if ($password == '') { 
				$data['error']['altFormInput3'] = '
					<small>
						<b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi !</b>
					</small><br/>'; 
			}
			if ($password == '') { 
				$data['error']['colFormInput3'] = 'red';
			}
			if ($password_confirm == '') { 
				$data['error']['altFormInput4'] = '
					<small>
						<b style="color: red"><i class="fa fa-times"> </i> Tolong di Isi !</b>
					</small><br/>'; 
			}
			if ($password_confirm == '') { 
				$data['error']['colFormInput4'] = 'red';
			}
			if (empty($data['error'])) {
				$token  = md5(uniqid(rand()));
				$pass 	= $this->ion_auth_model->hash_password($this->input->post('password'),FALSE,FALSE);
				$data = array(
						'token' => $token,
						'ip_address' => '::1',
						'users_level_id' => 10, // Di set 9 /10 menu untuk perusahaan
						'username' => strtolower($this->input->post('nama')),
						'email' => $this->input->post('email'),
						'password' => $pass,
						'active' => 1, // 0 belum verifikasi email, 1 sudah verifikasi email
						'is_trash' => 1,
				);
				// Insert tabel users 
				$insert = $this->MyModel->save($data);
				$id 	= $this->db->insert_id();
						
				$data2 = array(
							'user_id' => $id,
							'group_id' => 10	
				);
				//Insert tabel users groups
				$insert2 = $this->db->insert('users_groups',$data2);
				$data['status'] = true;
			}else{
				$data['status'] = false; // jika validasi gagal
			}
			echo json_encode($data);
	}


	function ajax_delete($id){
		$this->MyModel->delete_by_id($id);
		$this->db->delete('users_groups', array('user_id' => $id));  
		echo json_encode(array("status" => TRUE));
	}

	function ajax_bulk_delete(){
        $list_id = $this->input->post('id');
        foreach ($list_id as $id) {
			$this->MyModel->delete_by_id($id);
			$this->db->delete('users_groups', array('user_id' => $id));  
        }
        echo json_encode(array("status" => TRUE));
	}
	
	public function _get_csrf_nonce(){
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue')){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}