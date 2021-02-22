<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kp extends CI_Controller {

	function index()
	{
		//echo "Kp";
		redirect('GetKategoriBerita');
	}

	function GetKatBrt(){
		$result = array();
		//$auth_key = $this->input->get_request_header('auth_key', TRUE);
		if ($this->input->server('REQUEST_METHOD') == "GET") {
			//if ($auth_key != '') {
				//if ($auth_key == 'kpbudaya') {
					$this->db->select('id, nm_kat');
					$this->db->from('bucket_kategori');
					$this->db->where('is_trash', 1);
					$this->db->order_by('id', 'asc');
					$GetData = $this->db->get();
					if ($GetData->num_rows() > 0) {
						$result['success'] = 0;
						$result['msg'] = 'Successfully Get Data';
						$result['total'] = $GetData->num_rows();
						$result['data'] = $GetData->result_array();
					}else{
						$result['success'] = 2;
						$result['msg'] = "No Data";
						$result['total'] = 0;
						$result['data'] = array();
					}
				//}else{
				//	$result['result']['msg'] = 'Authentication In Valid';
				//	$result['result']['success'] = '0';
				//}
			//}else{
			//	$result['result']['msg'] = 'No Authentication';
			//	$result['result']['success'] = '0';
			//}
		} else {
			$result['result']['msg'] = 'Method is not valid';
			$result['result']['success'] = '0';
		}
		echo json_encode($result);
	}

	function GetBrt(){
		$result = array();
		//$auth_key = $this->input->get_request_header('auth_key', TRUE);
		if ($this->input->server('REQUEST_METHOD') == "GET") {
			//if ($auth_key != '') {
				//if ($auth_key == 'kpbudaya') {
					$this->db->select("id, deskripsi, CONCAT('".base_url()."uploads/berita/', foto) AS foto, kontent");
					$this->db->from('bucket_berita');
					$this->db->where('is_trash', 1);
					$this->db->order_by('tanggal_posting', 'DESC');
					$GetData = $this->db->get();
					if ($GetData->num_rows() > 0) {
						$result['success'] = 0;
						$result['msg'] = 'Successfully Get Data';
						$result['total'] = $GetData->num_rows();
						$result['data'] = $GetData->result_array();
					}else{
						$result['success'] = 2;
						$result['msg'] = "No Data";
						$result['total'] = 0;
						$result['data'] = array();
					}
				//}else{
				//	$result['result']['msg'] = 'Authentication In Valid';
				//	$result['result']['success'] = '0';
				//}
			//}else{
			//	$result['result']['msg'] = 'No Authentication';
			//	$result['result']['success'] = '0';
			//}
		} else {
			$result['result']['msg'] = 'Method is not valid';
			$result['result']['success'] = '0';
		}
		echo json_encode($result);
	}

	function GetBrtKat(){
		$result = array();
		//$auth_key = $this->input->get_request_header('auth_key', TRUE);
		if ($this->input->server('REQUEST_METHOD') == "GET") {
			$param = $_GET['id'];
			if($param !== null && $param !== ''){
			//if ($auth_key != '') {
				//if ($auth_key == 'kpbudaya') {
					$this->db->select("a.id, b.nm_kat, a.judul, CONCAT('".base_url()."uploads/berita/', a.foto) as foto, a.kontent");
					$this->db->join('bucket_kategori b','a.id_kat=b.id','left');
					$this->db->from('bucket_berita a');
					$this->db->where('a.id_kat', $param);
					$this->db->where('b.is_trash', 1);
					$this->db->where('a.is_trash', 1);
					$this->db->order_by('a.id', 'asc');
					$GetData = $this->db->get();
					if ($GetData->num_rows() > 0) {
						$result['success'] = 0;
						$result['msg'] = 'Successfully Get Data';
						$result['total'] = $GetData->num_rows();
						$result['data'] = $GetData->result_array();
					}else{
						$result['success'] = 2;
						$result['msg'] = "No Data";
						$result['total'] = 0;
						$result['data'] = array();
					}
				//}else{
				//	$result['result']['msg'] = 'Authentication In Valid';
				//	$result['result']['success'] = '0';
				//}
			}else{
			//}else{
			//	$result['result']['msg'] = 'No Authentication';
			//	$result['result']['success'] = '0';
			//}
			$result['result']['msg'] = 'Null Param';
			$result['result']['success'] = '0';
			}
		} else {
			$result['result']['msg'] = 'Method is not valid';
			$result['result']['success'] = '0';
		}
		echo json_encode($result);
	}

	function GetBrtDtl(){
		$result = array();
		//$auth_key = $this->input->get_request_header('auth_key', TRUE);
		if ($this->input->server('REQUEST_METHOD') == "GET") {
			$param = $_GET['id'];
			if($param !== '' && $param !== null){
			//if ($auth_key != '') {
				//if ($auth_key == 'kpbudaya') {
					$this->db->select("id, tanggal_posting, judul, CONCAT('".base_url()."uploads/berita/', foto) AS foto, kontent");
					$this->db->from('bucket_berita');
					$this->db->where('id', $param);
					$this->db->where('is_trash', 1);
					$this->db->order_by('tanggal_posting', 'DESC');
					$GetData = $this->db->get();
					if ($GetData->num_rows() > 0) {
						$result['success'] = 0;
						$result['msg'] = 'Successfully Get Data';
						$result['total'] = $GetData->num_rows();
						$result['data'] = $GetData->result_array();
					}else{
						$result['success'] = 2;
						$result['msg'] = "No Data";
						$result['total'] = 0;
						$result['data'] = array();
					}
				//}else{
				//	$result['result']['msg'] = 'Authentication In Valid';
				//	$result['result']['success'] = '0';
				//}
			}else{
			//}else{
			//	$result['result']['msg'] = 'No Authentication';
			//	$result['result']['success'] = '0';
			//}
			$result['result']['msg'] = 'Null Param';
			$result['result']['success'] = '0';
			}
		} else {
			$result['result']['msg'] = 'Method is not valid';
			$result['result']['success'] = '0';
		}
		echo json_encode($result);
	}

	function GetPkt(){
		$result = array();
		//$auth_key = $this->input->get_request_header('auth_key', TRUE);
		if ($this->input->server('REQUEST_METHOD') == "GET") {
			//if ($auth_key != '') {
				//if ($auth_key == 'kpbudaya') {
					$this->db->select('a.id, a.nama_paket, a.harga, a.kontent');
					$this->db->from('bucket_paket a');
					$this->db->where('a.is_trash', 1);
					$this->db->order_by('a.id', 'asc');
					$GetData = $this->db->get();
					if ($GetData->num_rows() > 0) {
						$result['success'] = 0;
						$result['msg'] = 'Successfully Get Data';
						$result['total'] = $GetData->num_rows();
						$result['data'] = $GetData->result_array();
					}else{
						$result['success'] = 2;
						$result['msg'] = "No Data";
						$result['total'] = 0;
						$result['data'] = array();
					}
				//}else{
				//	$result['result']['msg'] = 'Authentication In Valid';
				//	$result['result']['success'] = '0';
				//}
			//}else{
			//	$result['result']['msg'] = 'No Authentication';
			//	$result['result']['success'] = '0';
			//}
		} else {
			$result['result']['msg'] = 'Method is not valid';
			$result['result']['success'] = '0';
		}
		echo json_encode($result);
	}

	function GetPktDtl($param = null){
		$result = array();
		//$auth_key = $this->input->get_request_header('auth_key', TRUE);
		if ($this->input->server('REQUEST_METHOD') == "GET") {
			$param = $_GET['id'];
			if($param !== '' && $param !== null){
			//if ($auth_key != '') {
				//if ($auth_key == 'kpbudaya') {
					$this->db->select('a.id, a.nama_paket, a.harga, a.kontent');
					$this->db->from('bucket_paket a');
					$this->db->where('a.id', $param);
					$this->db->where('a.is_trash', 1);
					$this->db->order_by('a.id', 'asc');
					$GetData = $this->db->get();
					if ($GetData->num_rows() > 0) {
						$result['success'] = 0;
						$result['msg'] = 'Successfully Get Data';
						$result['total'] = $GetData->num_rows();
						$result['data'] = $GetData->result_array();
					}else{
						$result['success'] = 2;
						$result['msg'] = "No Data";
						$result['total'] = 0;
						$result['data'] = array();
					}
				//}else{
				//	$result['result']['msg'] = 'Authentication In Valid';
				//	$result['result']['success'] = '0';
				//}
			}else{
			//}else{
			//	$result['result']['msg'] = 'No Authentication';
			//	$result['result']['success'] = '0';
			$result['result']['msg'] = 'Null Param';
			$result['result']['success'] = '0';
			//}
			}
		} else {
			$result['result']['msg'] = 'Method is not valid';
			$result['result']['success'] = '0';
		}
		echo json_encode($result);
	}

	function PostBooking(){
		$result = array();
		//$auth_key = $this->input->get_request_header('auth_key', TRUE);
		if ($this->input->server('REQUEST_METHOD') == "POST") {
			//if ($auth_key != '') {
				//if ($auth_key == 'kpbudaya') {
					$title = $_POST['title'];
					$nama_depan = $_POST['nama_depan'];
					$nama_belakang = $_POST['nama_belakang'];
					$email = $_POST['email'];

					$data_insert = array(
						"title" => $title,
						"nama_depan" => $nama_depan,
						"nama_belakang" => $nama_belakang,
						"email" => $email,
						'insert_date' => date('Y-m-d h:i:s'),
					);

					$PostData = $this->db->insert('bucket_booking', $data_insert);

					if ($PostData) {
						$result['success'] = 0;
						$result['msg'] = 'Successfully Get Data';
						$result['total'] = $GetData->num_rows();
						$result['data'] = $GetData->result_array();
					}else{
						$result['success'] = 2;
						$result['msg'] = "No Data";
						$result['total'] = 0;
						$result['data'] = array();
					}
				//}else{
				//	$result['result']['msg'] = 'Authentication In Valid';
				//	$result['result']['success'] = '0';
				//}
			//}else{
			//	$result['result']['msg'] = 'No Authentication';
			//	$result['result']['success'] = '0';
			//}
		} else {
			$result['result']['msg'] = 'Method is not valid';
			$result['result']['success'] = '0';
		}
		echo json_encode($result);
	}
}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */
