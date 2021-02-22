<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_user_access extends CI_Controller {

	var $order = array('id' => 'desc'); 
    var $table = 'mainmenu';
    var $idq = 'id';
    var $column_order = array(); 
    var $column_search = array('nama_menu');

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('myModel');
		$this->load->model('ModelMenu');
	}

	private function template($content,$data=null){ 
		$data['akses'] = $this->db->where('id', $this->session->userdata('user_id'))->get('users')->result();

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
		$check_allow_access = $this->myModel->check_allow_access(get_class($this));
		if($check_allow_access[0]['access_show'] == null){
			redirect('mod_dashboard');
		}
		if($check_allow_access[0]['access_show'] == 0 or $check_allow_access[0]['access_show'] == ''){ 
			redirect('mod_dashboard', 'refresh'); 
		}
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		$user_data['last_login']			= $this->myModel->last_login($this->session->userdata('user_id'));
		$user_data['menu_active_parent'] 	= 'Users';
		$user_data['menu_active_sub'] 		= 'User Access';
		$user_data['menu_active_sub1'] 		= '';
		$user_data['title'] 				= 'User Access';
		$user_data['level_list']			= $this->db->get('groups')->result();
		$this->template('view', $user_data);
	}

	function ajax_list(){
		$this->load->model('myModel','menu');
		$session = $this->session->userdata('user_id');
		$users_level_id = $this->db->where('id', $session)->get('users')->row();
		$list = $this->myModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $li) {
			if($this->input->post('users_level_id')){
				$this->db->where('users_level_id', $this->input->post('users_level_id'));
			}elseif($this->input->post('users_level_id') == ''){
				$this->db->where('users_level_id', 0);
			}else{
				$this->db->where('users_level_id', 0);
			}
			$users_access = $this->db->where('users_menu_id', $li->id)->get('users_access2')->result();
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = "<i class='fa ".$li->icon."'> </i>";
				$row[] = "<b>".$li->label."</b>";
				$row[] = "<b>".$li->link."</b>";
				if ($li->tipe == 0) {
					$link = '';
				}else{
					$link = "<center><a href='".base_url()."".$li->link."' class='btn btn-xs btn-primary'><i class='fa fa-link'></i></a></center>";
				}
				$row[] = $link;
				foreach ($users_access as $key_accss) {
					if($li->exclusivepage == 1) {
						$row[] = "<center style='visibility: hidden;'><input type='checkbox' class='data-check' name='show[".$no."]' value='1' checked></center>";
						$row[] = "<center style='visibility: hidden;'><input type='checkbox' class='data-check1' name='add[".$no."]' value='1' checked></center>";
						$row[] = "<center style='visibility: hidden;'><input type='checkbox' class='data-check2' name='detail[".$no."]' value='1' checked></center>";
						$row[] = "<center style='visibility: hidden;'><input type='checkbox' class='data-check3' name='edit[".$no."]' value='1' checked></center>";
						$row[] = "<center style='visibility: hidden;'><input type='checkbox' class='data-check4' name='delete[".$no."]' value='1' checked></center>";
					}else{
						if($li->id == $key_accss->users_menu_id && $key_accss->access_show == 0 ){
							$row[] = "<center><input type='checkbox' class='data-check' name='show[".$no."]' value='1' ></center>";
						}else{
							$row[] = "<center><input type='checkbox' class='data-check' name='show[".$no."]' value='1' checked ></center>";
						}
						if($li->id == $key_accss->users_menu_id && $key_accss->access_add == 0 ){
							$row[] = "<center><input type='checkbox' class='data-check1' name='add[".$no."]' value='1' ></center>";
						}else{
							$row[] = "<center><input type='checkbox' class='data-check1' name='add[".$no."]' value='1' checked></center>";
						}
						if($li->id == $key_accss->users_menu_id && $key_accss->access_detail == 0 ){
							$row[] = "<center><input type='checkbox' class='data-check2' name='detail[".$no."]' value='1'></center>";
						}else{
							$row[] = "<center><input type='checkbox' class='data-check2' name='detail[".$no."]' value='1' checked></center>";
						}					
						if($li->id == $key_accss->users_menu_id && $key_accss->access_edit == 0 ){
							$row[] = "<center><input type='checkbox' class='data-check3' name='edit[".$no."]' value='1'></center>";
						}else{
							$row[] = "<center><input type='checkbox' class='data-check3' name='edit[".$no."]' value='1' checked></center>";
						}
						if($li->id == $key_accss->users_menu_id && $key_accss->access_delete == 0 ){
							$row[] = "<center><input type='checkbox' class='data-check4' name='delete[".$no."]' value='1'></center>";
						}else{
							$row[] = "<center><input type='checkbox' class='data-check4' name='delete[".$no."]' value='1' checked></center>";
						}
					}
				}

				if($li->exclusivepage == 1) {
					$row[] = '';
					$row[] = '';
					$row[] = '';
					$row[] = '';
					$row[] = '';
				}else{
					$row[] = "<center><input type='checkbox' class='data-check' name='show[".$no."]' value='1'></center>";
					$row[] = "<center><input type='checkbox' class='data-check1' name='add[".$no."]' value='1'></center>";
					$row[] = "<center><input type='checkbox' class='data-check2' name='detail[".$no."]' value='1'></center>";
					$row[] = "<center><input type='checkbox' class='data-check3' name='edit[".$no."]' value='1'></center>";
					$row[] = "<center><input type='checkbox' class='data-check4' name='delete[".$no."]' value='1'></center>";
				}
				$data[] = $row;
		}
		$output = array("draw" 				=> $_POST['draw'],
						"recordsTotal" 		=> $this->myModel->count_all(),
						"recordsFiltered" 	=> $this->myModel->count_filtered(),
						"data" 				=> $data,
		);
		echo json_encode($output);
	}
	
	function ajax_bulk_update(){
		// -- harus pilih user 
		if($users_level_id = $_POST['user_level_id'] == ''){
			echo json_encode(array("status" => FALSE));
		}else{
			$user_level_id = $_POST['user_level_id'];

			$list = $this->db->order_by('sort', 'asc')->get('master_menu_administrator')->result();
			$no = 0; 
			foreach ($list as $li) {
				$this->db->where('users_level_id', $user_level_id);
				
				$users_access = $this->db->where('users_menu_id', $li->id)->get('users_access2')->result();
					$no++;

					//echo "<b>".$li->id."</b> | ";
					//echo "0 </b> | ";
					//echo $li->nama_menu;
					//echo $show_1 = isset($_POST['show'][$no]) ? '1' : '0'; 
					//echo $add_1 = isset($_POST['add'][$no]) ? '1' : '0'; 
					//echo $detail_1 = isset($_POST['detail'][$no]) ? '1' : '0'; 
					//echo $edit_1 = isset($_POST['edit'][$no]) ? '1' : '0'; 
					//echo $delete_1 = isset($_POST['delete'][$no]) ? '1' : '0<br/>'; 

					//Delete
					$this->db->where('users_level_id', $user_level_id);
					$this->db->where('users_menu_id', $li->id);
					$this->db->delete('users_access2');

					//Insert
					$data = array(
						'users_level_id' => $user_level_id,
						'users_menu_id' => $li->id,
						'access_show' => $show_1 = isset($_POST['show'][$no]) ? '1' : '0',
						'access_add' => $show_1 = isset($_POST['add'][$no]) ? '1' : '0',
						'access_detail' => $show_1 = isset($_POST['detail'][$no]) ? '1' : '0',
						'access_edit' => $show_1 = isset($_POST['edit'][$no]) ? '1' : '0',
						'access_delete' => $show_1 = isset($_POST['delete'][$no]) ? '1' : '0',
					);
				
					$this->db->insert('users_access2', $data);

			}
			echo json_encode(array("status" => TRUE));
		}
    }
}