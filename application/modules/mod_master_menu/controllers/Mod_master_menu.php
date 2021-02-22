<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_master_menu extends CI_Controller {

	var $order = array('id_album' => 'desc'); 
    var $table = 'master_menu';
    var $idq = 'id';
    var $column_order = array(); 
    var $column_search = array();

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('myModel');
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
		$check_allow_access = $this->myModel->check_allow_access(get_class($this));
		if($check_allow_access[0]['access_show'] == null){
			redirect('mod_dashboard');
		}
		if($check_allow_access[0]['access_show'] == 0 or $check_allow_access[0]['access_show'] == ''){ redirect('mod_dashboard', 'refresh'); }
		
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		
		$user_data['last_login']			= $this->myModel->last_login($this->session->userdata('user_id'));
		$user_data['title'] 				= 'Menu Website';
		$user_data['menu_active_parent'] 	= 'Menus';
		$user_data['menu_active_sub'] 		= 'Front End Menus';
		$user_data['menu_active_sub1'] 		= '';
		$user_data['level']					= $this->db->where('is_trash',1 )->get('users_level')->result();
		$this->template('view', $user_data);
	}

	function parseJsonArray($jsonArray, $parentID = 0) {
		$return = array();
		foreach ($jsonArray as $subArray) {
			$returnSubSubArray = array();
			if (isset($subArray->children)) {
				$returnSubSubArray = $this->parseJsonArray($subArray->children, $subArray->id);
			}
			$return[]	= array('id' => $subArray->id, 'parentID' => $parentID);
			$return 	= array_merge($return, $returnSubSubArray);
		}
		return $return;
	}

	function recursiveDelete($id) {
		$query 	= $this->db->select('count(*) as total')->where('parent', $id)->get('master_menu')->row();
		$query2 = $this->db->select('count(*) as total')->where('parent', $id)->get('master_menu')->result();
		if ($query->total > 0) {
			foreach($query2 as $current){
				$this->recursiveDelete($current->id);
			}
		}
		$this->db->delete('master_menu', array('id' => $id)); 
	}

	// --- simpan menu
	function save_menu(){
		if($_POST['id'] != ''){
			$data = array(
				'label' => $_POST['label'],
				'link' => $_POST['link'],
				'custome_link' => $_POST['custome_link'],
				'page_type' => $_POST['pilih'],
			);
			$this->db->where('id', $_POST['id']);
			$this->db->update('master_menu', $data);
			
			$arr['type']  = 'edit';
			$arr['label'] = $_POST['label'];
			$arr['custome_link'] = $_POST['custome_link'];
			$arr['link']  = $_POST['link'];
			$arr['id']    = $_POST['id'];
		}else{
			$data = array(
				'label' => $_POST['label'],
				'link' => $_POST['link'],
				'custome_link' => $_POST['custome_link'],
				'page_type' => $_POST['pilih'],
			);
			
			$this->db->insert('master_menu', $data);
			$id = $this->db->insert_id();

			$arr['menu'] = '<li class="dd-item dd3-item" data-id="'.$id.'" >
							<div class="dd-handle dd3-handle" style="background: #dd4b39;border: 1px solid #605ca8;border-radius: 0px;"></div>
							<div class="dd3-content" style="background: #9575cd4d;border-radius: 1px;border: 1px solid #605ca8;"><span id="label_show'.$id.'">'.$_POST['label'].'</span>
								<span class="span-right">/<span id="link_show'.$id.'">'.$_POST['link'].'</span> &nbsp;&nbsp; 
									<a class="edit-button" id="'.$id.'" label="'.$_POST['label'].'" link="'.$_POST['link'].'" ><i class="fa fa-pencil"></i></a>
									<a class="del-button" id="'.$id.'"><i class="fa fa-trash"></i></a>
								</span> 
							</div>';
			$arr['type'] = 'add';
		}
		print json_encode($arr);		
	}
	// --- Edit simpan menu
	function save(){
		$data = json_decode($this->input->post('data'));

		$readbleArray = $this->parseJsonArray($data);

		$i = 0;
		foreach($readbleArray as $row){
			$data = array(
				'parent' => $row['parentID'],
				'sort' => $i,
			);
			$this->db->where('id', $row['id']);
			$this->db->update('master_menu', $data);
			$i++;
		}
	}
	// --- Hapus menu
	function delete(){
		$this->recursiveDelete($this->input->post('id'));
	}
}
/* -- Referensi  
   https://github.com/moemoe89/simple-management-menu-php-mysql-jquery
*/