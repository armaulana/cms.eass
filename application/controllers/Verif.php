<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verif extends CI_Controller {

	public function index($token = null){

		$cekToken = $this->db->where('token', $token)->get('users')->num_rows();

		if($token == null or $token == ""){
			redirect('auth/login');
		}else{
			if($cekToken > 0 ){
				$data = array(
					'active' => 1
				);
	
				$this->db->where('token', $token);
				$this->db->update('users', $data);
				
				$this->load->view('v_verif_success');
			}else{
				$this->load->view('v_verif_failed');
			}
		}
	}
}