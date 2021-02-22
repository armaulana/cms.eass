<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iba extends CI_Controller {

	function index()
	{
		redirect('token');
	}

	function GetDataKasubag()
	{
		$result = array();
		$auth_key = $this->input->get_request_header('auth_key', TRUE);
		if ($this->input->server('REQUEST_METHOD') == "GET") {
			if ($auth_key != '') {
				if ($auth_key == 'elayanandroid') {
					$this->db->select('idpengajuan, fullname');
					$this->db->from('pengajuanwna');
					$this->db->where('workflow', 50);
					$this->db->where('ubah', 1);
					$this->db->order_by('idpengajuan', 'asc');
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
				}else{
					$result['result']['msg'] = 'Authentication In Valid';
					$result['result']['success'] = '0';
				}
			}else{
				$result['result']['msg'] = 'No Authentication';
				$result['result']['success'] = '0';
			}
		} else {
			$result['result']['msg'] = 'Method is not valid';
			$result['result']['success'] = '0';
		}
		echo json_encode($result);
	}

	function ApproveKasubag()
	{
		$result = array();
		$auth_key = $this->input->get_request_header('auth_key', TRUE);
		if ($this->input->server('REQUEST_METHOD') == "POST") {
			if ($auth_key != '') {
				if ($auth_key == 'elayanandroid') {
					$inputJSON = file_get_contents('php://input');
					$inputJSON = json_decode($inputJSON);
					//$idpengajuan = $inputJSON->idpengajuan;
					$idpengajuan = $_POST['idpengajuan'];
					//$catatan = $inputJSON->catatan;
					//$user_id = $inputJSON->user_id;
					$user_id = $_POST['user_id'];
					$GetPengajuan = $this->model->GetSelect("id, workflow", "pengajuanwna", "idpengajuan = '$idpengajuan'");
					if ($GetPengajuan->num_rows() > 0) {
						if ($GetPengajuan->row()->workflow == "50") {
							$data_insert = array(
								"idpengajuan" => $idpengajuan,
								"catatan" => "Approve Kasubag",
								"id_jenis_user" => 5,
								"id_user" => $user_id,
								'tanggal' => date('Y-m-d'),
								'step' => 60,
							);
							if ($this->db->update('pengajuanwna', array('workflow' => 60), "idpengajuan = '$idpengajuan'")) {
								if ($this->db->insert('verifikasi', $data_insert) ) {
									// $result['result']['msg'] = 'Successfully';
									// $result['result']['success'] = '1';
									$result['result'][] = array('msg' => 'Successfully',
															  'success' => '1');
								}else{
									// $result['result']['msg'] = 'Error Insert Step';
									// $result['result']['success'] = '0';
									$result['result'][] = array('msg' => 'Error Insert Step',
															  		   'success' => '0');
								}
							}else{
								// $result['result']['msg'] = 'Error Apporve';
								// $result['result']['success'] = '0';		
								$result['result'][] = array('msg' => 'Error Apporve',
															       'success' => '0');
							}
						}else{
							// $result['result']['msg'] = 'Data Is Not Valid';
							// $result['result']['success'] = '2';
							$result['result'][] = array('msg' => 'Data Is Not Valid',
															   'success' => '2');
						}
					}else{
						// $result['result']['msg'] = 'No Data';
						// $result['result']['success'] = '2';	
						$result['result'][] = array('msg' => 'No Data',
														   'success' => '2');
					}
				}else{
					// $result['result']['msg'] = 'Authentication In Valid';
					// $result['result']['success'] = '0';
					$result['result'][] = array('msg' => 'Authentication In Valid',
													   'success' => '0');
				}
			}else{
				// $result['result']['msg'] = 'No Authentication';
				// $result['result']['success'] = '0';
				$result['result'][] = array('msg' => 'No Authentication',
										  'success' => '0');
			}
		} else {
			// $result['result']['msg'] = 'Method is not valid';
			// $result['result']['success'] = '0';
			$result['result'][] = array('msg' => 'Method is not valid',
									  'success' => '0');
		}
		echo json_encode($result);
	}

	function total()
	{
		$result = array();
		$token = $this->input->get_request_header('auth_key', TRUE);
		if ($this->input->server('REQUEST_METHOD') == "GET") {
			if ($token != '') {
				if ($token == 'elayanandroid') {
					$tahun = date('Y');				
					$result['disetujui'] = $this->model->GetSelect('count(idpengajuan) as x','pengajuanwna',"year(tanggal_pengajuan) = '$tahun' and workflow >= 70")->row()->x;
				    $result['proses'] = $this->model->GetSelect('count(idpengajuan) as x','pengajuanwna',"year(tanggal_pengajuan) = '$tahun' and workflow < 70 and workflow not in(15,25,0)")->row()->x;
				    $result['ditolak'] = $this->model->GetSelect('count(idpengajuan) as x','pengajuanwna',"year(tanggal_pengajuan) = '$tahun' and workflow in(15,25)")->row()->x;	
				    array_push($result);
				}else{
					$result['result']['msg'] = 'Authentication In Valid';
					$result['result']['success'] = '0';
				}
			}else{
				$result['result']['msg'] = 'No Authentication';
				$result['result']['success'] = '0';
			}
		} else {
			$result['result']['msg'] = 'Method is not valid';
			$result['result']['success'] = '0';
		}

		header('Content-Type: application/json');
      	echo json_encode($result);
	}

}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */
