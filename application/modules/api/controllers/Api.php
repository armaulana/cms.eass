<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {


	function index(){
		redirect('token');
		// echo "?";
	}

	function token(){
		$inputJSON = file_get_contents('php://input');
		$headers = apache_request_headers();
		$tempvalues = explode('&',$inputJSON);
		foreach($tempvalues as $value)
		{
			$value = explode('=',$value);
			$values[$value[0]] = $value[1];
		}
		$username = $values["username"];
		$password = $values["password"];
		$dataGet = $this->model->GetSelect("*", "user_api", "username = '".$username."' and password ='".$password."'");
		if ($dataGet->num_rows() > 0) {
			$result['message'] = "success";
			$token = $this->generateRandomString(100);
			$result['token'] = $token;
			$expireddb = date("Y-m-d H:i:s",strtotime("+24 hours"));
			$result['expire']= $expireddb;
			$this->db->insert('token',array('token' => "Bearer ".$token,'expire'=>$expireddb));
			$this->db->delete('token',array('expire <'=>date('Y-m-d H:i:s')));
		}else{
			$result['message'] = "failed";
			$result['data'] = "null";
		}
		echo json_encode($result);
	}

	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	function getpengajuan()
	{
		$headers = apache_request_headers();
		$token = $headers['Authorization'];
		$sekarang = date('Y-m-d');
		$periode = date('2017-03-24');
		$cektoken = $this->model->GetSelect("*", "token", "token = '".$token."' and expire >='".$sekarang."'");
		if($cektoken->num_rows() > 0) {
			$result['message'] ="success";
			$this->db->select('*');
			$this->db->from('pengajuanwna');
			$this->db->where('workflow >=', 80);
			// $this->db->where('tanggal_sk >=', $periode);
            $this->db->where("tanggal_sk BETWEEN DATE('2019-01-01') and DATE('$sekarang')");
			$data = $this->db->get();
			$fields = $this->db->field_data("pengajuanwna");
			foreach ($data->result_array() as $key => $value) {
				foreach ($fields as $d) {
					if ($d->name != "status_pengajuan" and $d->name != "ubah" and $d->name != "workflow" and $d->name != "flag_proses" and $d->name != "kembali_user" and $d->name != "fc_passport" and $d->name != "fc_rapor" and $d->name != "surat_pernyataan" and $d->name != "jaminan_biaya" and $d->name != "surat_keterangan_dari_sekolah" and $d->name != "fc_identitas" and $d->name != "kitas" and $d->name != "skldstm" and $d->name != "sk_upload") {
						$result['data'][$key][$d->name] = $value[$d->name];
					}
				}
				$path = site_url('uploads/gabungan/');
				$kondisi_path = $this->model->CheckAppDate($value['tanggal_pengajuan']);
				if ($kondisi_path) {
					$path = site_url('uploads/iba/sk-upload/'.$value['sk_upload']);
				}
				$result['data'][$key]['sk_upload'] = ($value['sk_upload'] != "") ? $path."," : ",";

				$fc_passport_string = explode(',', substr($value['fc_passport'], 0, -1));
				$fc_passport_array = array();
				$potong = substr($value['fc_passport'], 0, -1);
				if ($potong != null and $potong != "") {
					foreach ($fc_passport_string as $k => $v) {
						$path = site_url('uploads/gabungan/');
						if ($kondisi_path) {
							$path = site_url('uploads/iba/scan-passport/');
						}
						$fc_passport_array[$k] = $path.$v;
					}
				}
				$result['data'][$key]["fc_passport"] = $fc_passport_array;

				$fc_rapor_string = explode(',', substr($value['fc_rapor'], 0, -1));
				$fc_rapor_array = array();
				$potong = substr($value['fc_rapor'], 0, -1);
				if ($potong != null and $potong != "") {
					foreach ($fc_rapor_string as $k => $v) {
						$path = site_url('uploads/gabungan/');
						if ($kondisi_path) {
							$path = site_url('uploads/iba/scan-rapor/');
						}
						$fc_rapor_array[$k] = $path.$v;
					}
				}
				$result['data'][$key]["fc_rapor"] = $fc_rapor_array;

				$fc_surat_pernyataan_string = explode(',', substr($value['surat_pernyataan'], 0, -1));
				$fc_surat_pernyataan_array = array();
				$potong = substr($value['surat_pernyataan'], 0, -1);
				if ($potong != null and $potong != "") {
					foreach ($fc_surat_pernyataan_string as $k => $v) {
						$path = site_url('uploads/gabungan/');
						if ($kondisi_path) {
							$path = site_url('uploads/iba/scan-surat-pernyataan/');
						}
						$fc_surat_pernyataan_array[$k] = $path.$v;
					}
				}
				$result['data'][$key]["fc_surat_pernyataan"] = $fc_surat_pernyataan_array;

				$fc_jaminan_biaya_string = explode(',', substr($value['jaminan_biaya'], 0, -1));
				$fc_jaminan_biaya_array = array();
				$potong = substr($value['jaminan_biaya'], 0, -1);
				if ($potong != null and $potong != "") {
					foreach ($fc_jaminan_biaya_string as $k => $v) {
						$path = site_url('uploads/gabungan/');
						if ($kondisi_path) {
							$path = site_url('uploads/iba/scan-jaminan-biaya/');
						}
						$fc_jaminan_biaya_array[$k] = $path.$v;
					}
				}
				$result['data'][$key]["fc_jaminan_biaya"] = $fc_jaminan_biaya_array;

				$fc_surat_keterangan_dari_sekolah_string = explode(',', substr($value['surat_keterangan_dari_sekolah'], 0, -1));
				$fc_surat_keterangan_dari_sekolah_array = array();
				$potong = substr($value['surat_keterangan_dari_sekolah'], 0, -1);
				if ($potong != null and $potong != "") {
					foreach ($fc_surat_keterangan_dari_sekolah_string as $k => $v) {
						$path = site_url('uploads/gabungan/');
						if ($kondisi_path) {
							$path = site_url('uploads/iba/scan-surat-keterangan-dari-sekolah/');
						}
						$fc_surat_keterangan_dari_sekolah_array[$k] = $path.$v;
					}
				}
				$result['data'][$key]["fc_surat_keterangan_dari_sekolah"] = $fc_surat_keterangan_dari_sekolah_array;

				$fc_identitas_string = explode(',', substr($value['fc_identitas'], 0, -1));
				$fc_identitas_array = array();
				$potong = substr($value['fc_identitas'], 0, -1);
				if ($potong != null and $potong != "") {
					foreach ($fc_identitas_string as $k => $v) {
						$path = site_url('uploads/gabungan/');
						if ($kondisi_path) {
							$path = site_url('uploads/iba/scan-identitas/');
						}
						$fc_identitas_array[$k] = $path.$v;
					}
				}
				$result['data'][$key]["fc_identitas"] = $fc_identitas_array;

				$fc_kitas_string = explode(',', substr($value['kitas'], 0, -1));
				$fc_kitas_array = array();
				$potong = substr($value['kitas'], 0, -1);
				if ($potong != null and $potong != "") {
					foreach ($fc_kitas_string as $k => $v) {
						$path = site_url('uploads/gabungan/');
						if ($kondisi_path) {
							$path = site_url('uploads/iba/scan-kitas/');
						}
						$fc_kitas_array[$k] = $path.$v;
					}
				}
				$result['data'][$key]["fc_kitas"] = $fc_kitas_array;

				$fc_skldstm_string = explode(',', substr($value['skldstm'], 0, -1));
				$fc_skldstm_array = array();
				$potong = substr($value['skldstm'], 0, -1);
				if ($potong != null and $potong != "") {
					foreach ($fc_skldstm_string as $k => $v) {
						$path = site_url('uploads/gabungan/');
						if ($kondisi_path) {
							$path = site_url('uploads/iba/scan-skldstm/');
						}
						$fc_skldstm_array[$k] = $path.$v;
					}
				}
				$result['data'][$key]["fc_skldstm"] = $fc_skldstm_array;
			}
			$result['total_data'] = $data->num_rows();
			if ($data->num_rows() == 0) {
				$result['message'] = "success";
				$result['status_code'] = 200;
				$result['data'] = 'null';
			}else{
				$result['message'] = "success";
				$result['status_code'] = 200;
				$result['data'] = $result['data'];
			}
			// $dataGet = $this->model->GetSelect("*", "pengajuanwna", "tanggal_pengajuan = '".$periode."' and workflow >=70");
			// if ($dataGet->num_rows() > 0) {
			// 	$result['message'] = "success";
			// 	$result['data'] = $dataGet->result();
			// }else{
			// 	$result['message'] = "success";
			// 	$result['data'] = 'null';
			// }
		}else{
			$result['message'] ="failed";
			$result['data'] = 'null';
		}
		// $nik = $_GET['nik'];
		echo json_encode($result);
	}

	function PostSelesaiPengajuan()
	{
		$inputJSON = file_get_contents('php://input');
		$headers = apache_request_headers();
		$token = $headers['Authorization'];
		$sekarang = date('Y-m-d');
		$cektoken = $this->model->GetSelect("*", "token", "token = '".$token."' and expire >='".$sekarang."'");
		$result = array();
		if($cektoken->num_rows() > 0) {
			$tempvalues = explode('&',$inputJSON);
			$inputJSON = json_decode($inputJSON);
			// foreach($tempvalues as $value)
			// {
			// 	$value = explode('=',$value);
			// 	$values[$value[0]] = $value[1];
			// }
			if ($inputJSON != null) {
				$idpengajuan = $inputJSON->idpengajuan;
				$url = $inputJSON->url;
				$getPengajuan = $this->model->GetSelect("id", "pengajuanwna", "idpengajuan = '$idpengajuan'");
				if ($getPengajuan->num_rows() > 0) {
					if($this->db->update('pengajuanwna', array("surat_bpkln" => $url, 'tgl_update_surat_bpkln' => DATE('Y-m-d'), 'status_surat_bpkln' => 1), "idpengajuan = '$idpengajuan'")){
						$result['error'] = 0;
						$result['message'] = "Successfully";
					}
				}else{
					$result['error'] = 2;
					$result['message'] = "No data";
				}
			}else{
				$result['error'] = 2;
				$resutt['message'] = "No atribut";
			}
		}else{
			$result['error'] = 1;
			$result['message'] = 'No Authentication';
		}
		// $nik = $_GET['nik'];
		echo json_encode($result);
	}

	function PostRevisiDikdasmen()
	{
		$inputJSON = file_get_contents('php://input');
		$headers = apache_request_headers();
		$token = $headers['Authorization'];
		$sekarang = date('Y-m-d');
		$cektoken = $this->model->GetSelect("*", "token", "token = '".$token."' and expire >='".$sekarang."'");
		$result = array();
		if($cektoken->num_rows() > 0) {
			$tempvalues = explode('&',$inputJSON);
			$inputJSON = json_decode($inputJSON);
			// foreach($tempvalues as $value)
			// {
			// 	$value = explode('=',$value);
			// 	$values[$value[0]] = $value[1];
			// }
			if ($inputJSON != null) {
				$idpengajuan = $inputJSON->idpengajuan;
				$catatan = $inputJSON->catatan;
				$getPengajuan = $this->model->GetSelect("id", "pengajuanwna", "idpengajuan = '$idpengajuan'");
				if ($getPengajuan->num_rows() > 0) {
					if($this->db->update('pengajuanwna', array('revisi_dikdasmen' => 1, 'workflow' => 11), "idpengajuan = '$idpengajuan'")){
						$data_insert = array(
							'idpengajuan' => $idpengajuan,
							'catatan' => $catatan,
							'created_date' => date('Y-m-d h:i:s'),
						);
						if ($this->db->insert("revisi_dikdasmen", $data_insert)) {
							$result['error'] = 0;
							$result['message'] = "Successfully";
						}
					}
				}else{
					$result['error'] = 2;
					$result['message'] = "No data";
				}
			}else{
				$result['error'] = 2;
				$resutt['message'] = "No atribut";
			}
		}else{
			$result['error'] = 1;
			$result['message'] = 'No Authentication';
		}
		// $nik = $_GET['nik'];
		echo json_encode($result);
	}
		
	function Login()
	{
		$inputJSON = file_get_contents('php://input');
		$username = $_POST['email'];
		$password = $_POST['password'];
		$token = $this->input->get_request_header('auth_key', TRUE);
		// $cektoken = $this->model->GetSelect("*", "token", "token = '".$token."' and expire >='".$sekarang."'");
		$result = array();
		if ($this->input->server('REQUEST_METHOD') == "POST") {
			if ($token != '') {
				if($token == "elayanandroid") {
					$tempvalues = explode('&',$inputJSON);
					$inputJSON = json_decode($inputJSON);
					// foreach($tempvalues as $value)
					// {
					// 	$value = explode('=',$value);
					// 	$values[$value[0]] = $value[1];
					// }
					//if ($inputJSON != null) {
					if ($username != '' && $password !='') {
						// $username = $inputJSON->username;
						// $password = $inputJSON->password;
						$password = md5($this->model->anti_injection($password));
						$CekLogin = $this->model->GetSelect("id, nama, active, email, foto, last_login,level", "users", "email = '$username' and password = '$password' and level IN ('2','5','6')");
						if ($CekLogin->num_rows() > 0) {
							if ($CekLogin->row()->active == 1) {
								// $result['result']['success'] = 1;
								// $result['result']['user_id'] = $CekLogin->row()->id;
								// $result['result']['name'] = $CekLogin->row()->nama;
								// $result['result']['email'] = $CekLogin->row()->email;
								// $result['result']['foto'] = ($CekLogin->row()->foto != "") ? site_url('uploads/users/foto/').$CekLogin->row()->foto : null;
								// $result['result']['last_login'] = ($CekLogin->row()->last_login != '') ? date('Y-m-d H:i:s', $CekLogin->row()->last_login) : "";
								//echo "success";
								$result['data'][] = array(
															'user_id' => $CekLogin->row()->id,
															'name' => $CekLogin->row()->nama,
															'email' => $CekLogin->row()->email,
															'foto' => ($CekLogin->row()->foto != "") ? site_url('uploads/users/foto/').$CekLogin->row()->foto : "http://e-layanan.dikdasmen.kemdikbud.go.id/elayanan2019/uploads/users/foto/none.jpg",
															'last_login' => ($CekLogin->row()->last_login != '') ? date('Y-m-d H:i:s', $CekLogin->row()->last_login) : "",
															'level' => $CekLogin->row()->level);
								//Update Token User
								$this->db->where('id',$CekLogin->row()->id);
								$this->db->update('users', array('token'=>$_POST['token']));
								$result['result'][] = array('msg' => 'Login Sukses',
															'success' => '1');

							}else{
								// $result['result']['msg'] = 'Account Disabled';
								// $result['result']['success'] = '2';
								//echo "Account Disabled";
								$result['result'][] = array('msg' => 'Account Disabled',
															'success' => '2');
							}
						}else{
							// $result['result']['msg'] = 'Login Failed';
							// $result['result']['success'] = '0';
							//echo "Login Failed";
							$result['result'][] = array('msg' => 'Login Failed',
															'success' => '0');
						}
					}else{
						// $result['result']['msg'] = 'No Atribut';
						// $result['result']['success'] = '0';
						//echo "No Atribut";
						$result['result'][] = array('msg' => 'No Atribut',
															'success' => '0');
					}
				}else{
					// $result['result']['msg'] = 'Authentication In Valid';
					// $result['result']['success'] = '0';
					//echo "Authentication In Valid";
					$result['result'][] = array('msg' => 'Authentication In Valid',
															'success' => '0');
				}
			}else{
				// $result['result']['msg'] = 'No Authentication';
				// $result['result']['success'] = '0';
				//echo "No Authentication";
				$result['result'][] = array('msg' => 'No Authentication',
															'success' => '0');
			}
		}else{
			// $result['result']['msg'] = 'Method is not valid';
			// $result['result']['success'] = '0';
			//echo "Method is not valid";
			$result['result'][] = array('msg' => 'Method is not valid',
															'success' => '0');
		}
		echo json_encode($result);
	}

	function Dashboard()
	{
		$result = array();
		//$token = $this->input->get_request_header('auth_key', TRUE);
		$token = 'elayanandroid';
		if ($token != '') {
			if ($token == 'elayanandroid') {
				$tahun = date('Y');
				$h['title'] = 'Ijin Belajar Asing';
				$h['image'] = "https://api.androidhive.info/json/movies/starwars.jpg";
				$h['disetujui'] = $this->model->GetSelect('count(idpengajuan) as x','pengajuanwna',"year(tanggal_pengajuan) = '$tahun' and workflow >= 70")->row()->x;
			    $h['proses'] = $this->model->GetSelect('count(idpengajuan) as x','pengajuanwna',"year(tanggal_pengajuan) = '$tahun' and workflow < 70 and workflow not in(15,25,0)")->row()->x;
			    $h['ditolak'] = $this->model->GetSelect('count(idpengajuan) as x','pengajuanwna',"year(tanggal_pengajuan) = '$tahun' and workflow in(15,25)")->row()->x;	

				$i['title'] = 'Penyetaraan Ijazah';
				$i['image'] = "https://api.androidhive.info/json/movies/starwars.jpg";
				$i['disetujui'] = $this->model->GetSelect('count(idpengajuan) as x','pengajuanpi',"year(tanggal_pengajuan) = '$tahun' and workflow >= 70")->row()->x;
			    $i['proses'] = $this->model->GetSelect('count(idpengajuan) as x','pengajuanpi',"year(tanggal_pengajuan) = '$tahun' and workflow < 70 and workflow not in(15,25,0)")->row()->x;
			    $i['ditolak'] = $this->model->GetSelect('count(idpengajuan) as x','pengajuanpi',"year(tanggal_pengajuan) = '$tahun' and workflow in(15,25)")->row()->x;	

			    $j['title'] = 'Penyaluran Siswa';
			    $j['image'] = "https://api.androidhive.info/json/movies/starwars.jpg";
				$j['disetujui'] = $this->model->GetSelect('count(idpengajuan) as x','pengajuanps',"year(tanggal_pengajuan) = '$tahun' and workflow >= 70")->row()->x;
			    $j['proses'] = $this->model->GetSelect('count(idpengajuan) as x','pengajuanps',"year(tanggal_pengajuan) = '$tahun' and workflow < 70 and workflow not in(15,25,0)")->row()->x;
			    $j['ditolak'] = $this->model->GetSelect('count(idpengajuan) as x','pengajuanps',"year(tanggal_pengajuan) = '$tahun' and workflow in(15,25)")->row()->x;	
			    
			    array_push($result,$h,$i,$j);
			}else{
				$result['result']['msg'] = 'Authentication In Valid';
				$result['result']['success'] = '0';
			}
			
		}else{
			$result['result']['msg'] = 'No Authentication';
			$result['result']['success'] = '0';
		}
		header('Content-Type: application/json');
      	echo json_encode($result);
	}

	function all()
	{
		$result = array();
		//$token = $this->input->get_request_header('auth_key', TRUE);
		$token = 'elayanandroid';
		if ($token != '') {
			if ($token == 'elayanandroid') {
				$tahun = date('Y');				
				$result['disetujui'] = ($this->model->GetSelect('count(idpengajuan) as x','pengajuanwna',"year(tanggal_pengajuan) = '$tahun' and workflow >= 70")->row()->x + $this->model->GetSelect('count(idpengajuan) as x','pengajuanpi',"year(tanggal_pengajuan) = '$tahun' and workflow >= 70")->row()->x + $this->model->GetSelect('count(idpengajuan) as x','pengajuanps',"year(tanggal_pengajuan) = '$tahun' and workflow >= 70")->row()->x);

			    $result['proses'] = ($this->model->GetSelect('count(idpengajuan) as x','pengajuanwna',"year(tanggal_pengajuan) = '$tahun' and workflow < 70 and workflow not in(15,25,0)")->row()->x + $this->model->GetSelect('count(idpengajuan) as x','pengajuanpi',"year(tanggal_pengajuan) = '$tahun' and workflow < 70 and workflow not in(15,25,0)")->row()->x + $this->model->GetSelect('count(idpengajuan) as x','pengajuanps',"year(tanggal_pengajuan) = '$tahun' and workflow < 70 and workflow not in(15,25,0)")->row()->x);
			    $result['ditolak'] = ($this->model->GetSelect('count(idpengajuan) as x','pengajuanwna',"year(tanggal_pengajuan) = '$tahun' and workflow in(15,25)")->row()->x + $this->model->GetSelect('count(idpengajuan) as x','pengajuanpi',"year(tanggal_pengajuan) = '$tahun' and workflow in(15,25)")->row()->x + $this->model->GetSelect('count(idpengajuan) as x','pengajuanps',"year(tanggal_pengajuan) = '$tahun' and workflow in(15,25)")->row()->x);	
			    //array_push($result);
			}else{
				$result['result']['msg'] = 'Authentication In Valid';
				$result['result']['success'] = '0';
			}
			
		}else{
			$result['result']['msg'] = 'No Authentication';
			$result['result']['success'] = '0';
		}
		header('Content-Type: application/json');
      	echo json_encode($result);
	}

	function get_user($seg=""){
		if($seg) {
			$row = $this->db->select('id,nama,email,foto,password')->from('users')->where('id',$seg)->get()->row();
			// foreach ($result->result() as $row) {
			// 	$output[] = $row;
			// }
			$result = array();
			$result[]= array('id'=>$row->id,
							 'nama' => $row->nama,
							 'email' => $row->email,
							 'password' =>'',
							 'foto' => ($row->foto != "") ? $row->foto : "none.jpg");
			print(json_encode($result));
		} else {
		   $output = "not found";
		   print(json_encode($output));
			    
		}
	}

	function updateUserPhoto() {
		if(isset($_POST["image"]) && isset($_POST["user_id"])) {
			$data = $_POST["image"];
			$time = time();

			$user_id = $_POST["user_id"];
			$ImageName = $user_id.'_'.$time.".jpg";
			// $ImageName = $_POST["image"]["name"];
		    $filePath = './uploads/users/foto/'.$ImageName; // path of the file to store
		    echo "file : ".$filePath;
		    if (file_exists($filePath)) {
		    	unlink($filePath); // delete the old file
		    } 
		    $myfile = fopen($filePath, "w") or die("Unable to open file!");
		    file_put_contents($filePath, base64_decode($data));

		    $this->db->where('id',$user_id)	;
		    $this->db->update('users',array('foto' =>$ImageName));
		} else {
			echo 'not set';
		}
	}

	function updateUserProfile() {
	 	if($_GET['password']!="") {
			$data = array(
			'nama'  =>  $_GET['name'],
			'email'  =>  $_GET['email'],
			'password'  =>  md5($this->model->anti_injection($_GET['password']))
			);
		} else {
			$data = array(
			'nama'  =>  $_GET['name'],
			'email'  =>  $_GET['email']
			);
		}
		$this->db->where('id',$_GET['user_id'])	;
		if($this->db->update('users',$data)){
			$set['result'][] = array('msg'=>'Updated', 'success'=>'1');
		}else{
			$set['result'][] = array('msg'=>'Error', 'success'=>'0');
		}
				 
		header( 'Content-Type: application/json; charset=utf-8' );
		$json = json_encode($set);

		echo $json;
		exit;

	}



}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */

/*
$token = "Diambil dari Tabel User sesuaikan dengan Level nya"
$message = "No Pengajuan sn Hendi Ahmad Sudah siap untuk di Approve Kasubag";
            
$res = array();
$res['body'] = $message;
            
$fields = array(
	'to' => $token,
    'notification' => $res,
);

$url = 'https://fcm.googleapis.com/fcm/send';
$server_key = "AAAAUgeW8RI:APA91bG9YudpwkUjhiTHNzMgpp6Nyv-WSAzi9DpH0BdQJh7z4xnCRri5w2wj3CIoTmmDpd2uJvQlF9qDXLK2QGJN-gOVEQSXZxTgWdONGIno9mT-_eZHtodZwBo3Mbpdd3osdZFG07-O";
        
$headers = array(
	'Authorization: key=' . $server_key,
    'Content-Type: application/json'
);

$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, $url);
 
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
$result = curl_exec($ch);

if ($result === FALSE) {
    echo 'Curl failed: ' . curl_error($ch);
}

curl_close($ch);
echo $result; 
*/