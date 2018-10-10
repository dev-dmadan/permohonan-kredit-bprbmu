<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");

	/**
	 * Class Permohonan_kredit
	 */
	class Permohonan_kredit extends Controller{

		private $success = false;
		private $checkPost = true;
		private $checkFiles = true;
		private $checkInsertField = true;
		private $checkUploadFiles = true;
		private $message = array();
		private $notif = array();
		private $error = array();

		/**
		 * Method __construct
		 * Load library saat pertama kali di load
		 */
		public function __construct(){
			$this->model('Permohonan_kreditModel');
			$this->helper();
			$this->validation();
		}

		/**
		 * Method index
		 * Default Method setelah __construct
		 * Load page form permohonan kredit
		 */
		public function index(){
			$this->add();
		}
		
		/**
		 * Method form
		 * Load page form permohonan kredit
		 */
		public function form(){
			$this->add();
		}

		/**
		 * Method add
		 * Load page form permohonan kredit
		 * Setiap kali diakses maka generate Id baru
		 */
		private function add(){
			// set default value saat awal
			$data = array(
				'action' => 'action-add',
				'id' => $this->getLastId(),
				'tgl' => date('Y-m-d')
			);
			$insert_id_fpk = $this->Permohonan_kreditModel->insert_id_fpk($data['id']);
			if(!$insert_id_fpk['success']){
				die(json_encode(array(
					'success' => $insert_id_fpk['success'],
					'message' => 'Kegagalan Sistem, Silahkan Coba Kembali',
					'error' => $insert_id_fpk['error']
				)));
			}
			
			$this->view('permohonan_kredit/form', $data);
		}

		/**
		 * Method action_add
		 * Proses penambahan data permohohan kredit ke db
		 * @return result {object} array berupa json untuk dikirim ke client 
		 */
		public function action_add(){
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$data = (isset($_POST)) ? $_POST : false;
				$files = (isset($_FILES)) ? $_FILES : false;
				$valueFiles = array(
					'file_ktp_pemohon' => array('value' => NULL, 'required' => true),
					'file_ktp_suami_istri' => array('value' => NULL, 'required' => true),
					'file_kk' => array('value' => NULL, 'required' => true),
					'file_slip_gaji' => array('value' => NULL, 'required' => true),
					'file_stnk' => array('value' => NULL, 'required' => true),
					'file_nota_pajak' => array('value' => NULL, 'required' => true),
					'file_bpkp' => array('value' => NULL, 'required' => true),
					'file_faktur' => array('value' => NULL, 'required' => true),
					'file_kwintasi_jual_beli' => array('value' => NULL, 'required' => true)
				);

				/** Validasi Inputan */
				if(!$data){
					$this->message['text'] = "Terjadi Kesalahan Teknis, Silahkan Coba Kembali";
					$this->message['error']['field'] = "Data and Files is empty or false";
					$this->notif = array(
						'title' => 'Pesan Error',
						'message' => $this->message['text'],
						'type' => 'error',
						'plugin' => 'swal'
					);
				}
				else{
					// validasi input field
					$validation = $this->set_validation($data);
					$this->error = $validation['error'];
					$this->checkPost = $validation['cek'];

					// validasi input file
					$validation_files = $this->validation_file($files, $valueFiles);
					$this->checkFiles = $validation_files['check'];
					foreach($validation_files['error'] as $key => $value){
						$this->error[$key] = $value['error'];
						$valueFiles[$key]['value'] = ($value['cek']) 
							? md5($data['id']).$value['namaFile'] : NULL;
					}

					// jika validasi input field dan file sukses
					if($this->checkPost && $this->checkFiles){
						$data_insert = array(
							// id dan tgl
							'id' => $this->validation->validInput($this->getLastId(), false),
							'tgl' => $this->validation->validInput($data['tgl'], false),

							// data pinjaman
							'status_nasabah' => $this->validation->validInput($data['status_nasabah'], false),
							'limit_kredit' => $this->validation->validInput($data['limit_kredit'], false),
							'jangka_waktu' => $this->validation->validInput($data['jangka_waktu'], false),
							'tujuan' => $this->validation->validInput($data['tujuan'], false),
							'jelaskan' => $this->validation->validInput($data['jelaskan'], false),

							// data permohonan
							'nama' => $this->validation->validInput($data['nama'], false),
							'nama_panggilan' => $this->validation->validInput($data['nama_panggilan'], false),
							'tmpt_lahir' => $this->validation->validInput($data['tmpt_lahir'], false),
							'tgl_lahir' => $this->validation->validInput($data['tgl_lahir'], false),
							'jk' => $this->validation->validInput($data['jk'], false),
							'no_ktp' => $this->validation->validInput($data['no_ktp'], false),
							'berlaku' => $this->validation->validInput($data['berlaku'], false),
							'seumur_hidup' => $this->validation->validInput($data['seumur_hidup'], false),
							'status_kawin' => $this->validation->validInput($data['status_kawin'], false),
							'jumlah_anak' => $this->validation->validInput($data['jumlah_anak'], false),
							'pendidikan_formal' => $this->validation->validInput($data['pendidikan_formal'], false),
							'nama_ibu' => $this->validation->validInput($data['nama_ibu'], false),
							'alamat' => $this->validation->validInput($data['alamat'], false),
							'status_rumah' => $this->validation->validInput($data['status_rumah'], false),
							'sewa_rumah' => $this->validation->validInput($data['sewa_rumah'], false),
							'no_telp' => $this->validation->validInput($data['no_telp'], false),

							// data suami-istri
							'nama_suami_istri' => $this->validation->validInput($data['nama_suami_istri'], false),
							'tmpt_lahir_suami_istri' => $this->validation->validInput($data['tmpt_lahir_suami_istri'], false),
							'tgl_lahir_suami_istri' => $this->validation->validInput($data['tgl_lahir_suami_istri'], false),
							'pekerjaan_suami_istri' => $this->validation->validInput($data['pekerjaan_suami_istri'], false),

							'pilih_pekerjaan' => $this->validation->validInput($data['pilih_pekerjaan'], false),

							// data pekerjaan
							'pekerjaan' => $this->validation->validInput($data['pekerjaan'], false),
							'bidang_usaha_pekerjaan' => $this->validation->validInput($data['bidang_usaha_pekerjaan'], false),
							'lama_bekerja' => $this->validation->validInput($data['lama_bekerja'], false),
							'nama_perusahaan' => $this->validation->validInput($data['nama_perusahaan'], false),
							'jabatan' => $this->validation->validInput($data['jabatan'], false),
							'alamat_perusahaan' => $this->validation->validInput($data['alamat_perusahaan'], false),
							'no_telp_perusahaan' => $this->validation->validInput($data['no_telp_perusahaan'], false),
							'penghasilan_bersih_pekerjaan' => $this->validation->validInput($data['penghasilan_bersih_pekerjaan'], false),
							'rata2_biaya_hidup' => $this->validation->validInput($data['rata2_biaya_hidup'], false),

							// data pekerjaan - usaha
							'bentuk_usaha' => $this->validation->validInput($data['bentuk_usaha'], false),
							'prosentase_kepemilikan' => $this->validation->validInput($data['prosentase_kepemilikan'], false),
							'usaha_sejak' => $this->validation->validInput($data['usaha_sejak'], false),
							'bidang_usaha' => $this->validation->validInput($data['bidang_usaha'], false),
							'jumlah_karyawan' => $this->validation->validInput($data['jumlah_karyawan'], false),
							'alamat_usaha' => $this->validation->validInput($data['alamat_usaha'], false),
							'no_telp_usaha' => $this->validation->validInput($data['no_telp_usaha'], false),
							'penghasilan_bersih' => $this->validation->validInput($data['penghasilan_bersih'], false),
							
							// data agunan
							'jenis' => $this->validation->validInput($data['jenis'], false),
							'tipe_kendaraan' => $this->validation->validInput($data['tipe_kendaraan'], false),
							'warna' => $this->validation->validInput($data['warna'], false),
							'tahun' => $this->validation->validInput($data['tahun'], false),
							'no_bpkb' => $this->validation->validInput($data['no_bpkb'], false),
							'atas_nama' => $this->validation->validInput($data['atas_nama'], false),
							'status_agunan' => $this->validation->validInput($data['status_agunan'], false),
							'imb' => $this->validation->validInput($data['imb'], false),
							'ada' => $this->validation->validInput($data['ada'], false),
							'alamat_agunan' => $this->validation->validInput($data['alamat_agunan'], false),

							// data keluarga
							'nama_keluarga' => $this->validation->validInput($data['nama_keluarga'], false),
							'alamat_keluarga' => $this->validation->validInput($data['alamat_keluarga'], false),
							'no_telp_keluarga' => $this->validation->validInput($data['no_telp_keluarga'], false),
							'hubungan_keluarga' => $this->validation->validInput($data['hubungan_keluarga'], false),

							// data upload file
							'file_ktp_pemohon' => $this->validation->validInput($valueFiles['file_ktp_pemohon']['value'], false),
							'file_ktp_suami_istri' => $this->validation->validInput($valueFiles['file_ktp_suami_istri']['value'], false),
							'file_kk' => $this->validation->validInput($valueFiles['file_kk']['value'], false),
							'file_slip_gaji' => $this->validation->validInput($valueFiles['file_slip_gaji']['value'], false),
							'file_stnk' => $this->validation->validInput($valueFiles['file_stnk']['value'], false),
							'file_nota_pajak' => $this->validation->validInput($valueFiles['file_nota_pajak']['value'], false),
							'file_bpkp' => $this->validation->validInput($valueFiles['file_bpkp']['value'], false),
							'file_faktur' => $this->validation->validInput($valueFiles['file_faktur']['value'], false),
							'file_kwintasi_jual_beli' => $this->validation->validInput($valueFiles['file_kwintasi_jual_beli']['value'], false)
						);

						// upload foto
						$upload_files = $this->upload_files($files, $valueFiles);
						if(!$upload_files['success']){
							$this->checkUploadFiles = false;
							// $this->message['text']['file'] = "Terjadi Kesalahan Teknis, Silahkan Coba Kembali";
							$this->message['error']['file'] = $upload_files['error'];
						}

						// insert data permohonan kredit
						$insert = $this->Permohonan_kreditModel->insert($data_insert);
						if(!$insert['success']){
							$this->checkInsertField = false;
							// $this->message['text']['field'] = "Terjadi Kesalahan Teknis, Silahkan Coba Kembali";
							$this->message['error']['field'] = $insert['error'];
						}

						// check insert file and field
						if($this->checkInsertField && $this->checkUploadFiles){
							$this->success = true;
							$this->message['text'] = "Pengajuan Permohonan Kredit Berhasil";
							$this->message['error'] = NULL;
							$this->notif = array(
								'title' => 'Pesan Berhasil',
								'message' => $this->message['text'],
								'type' => 'success',
								'plugin' => 'swal'
							);
						}
						else{
							// rollback files
							$this->rollback_files($upload_files['paths']);
							$this->message['text'] = "Terjadi Kesalahan Teknis, Silahkan Coba Kembali";
							$this->notif = array(
								'title' => 'Pesan Error',
								'message' => $this->message['text'],
								'type' => 'error',
								'plugin' => 'swal'
							);
						}

					}
					else{
						$this->message['text'] = "Silahkan cek kembali form isian";
						$this->notif = array(
							'title' => 'Pesan Pemberitahuan',
							'message' => $this->message['text'],
							'type' => 'warning',
							'plugin' => 'toastr'
						);
					}
				}

				$result = array(
					// 'data_post' => $data,
					// 'data_file' => $files,
					// 'value_file' => $valueFiles,
					// 'upload_files' => $upload_files,
					'notif' => $this->notif,
					'message' => $this->message,
					'error' => $this->error,
					'success' => $this->success
				);

				echo json_encode($result);
			}
			else {
				die(json_encode(array(
					'success' => false,
					'message' => 'Access Denied',
					'error' => '403'
				)));
			}
		}
		
		/**
		 * Method getLastId
		 * Proses generate Id FPK terbaru
		 * @return id {string}
		 */
		private function getLastId(){
			$id_temp = 'FPK'.date('Ymd');
			$data = !empty($this->Permohonan_kreditModel->getLastID($id_temp)['id']) ? 
				$this->Permohonan_kreditModel->getLastID($id_temp)['id'] : false;

			if(!$data) $id = $id_temp.'0001';
			else{
				$noUrut = (int)substr($data, 11, 4);
				$noUrut++;
				$id = $id_temp.sprintf("%04s", $noUrut);
			}

			return $id;
		}

		/**
		 * Method validation_files
		 * Proses validasi files yang akan diupload
		 * @param files {array} $_FILES
		 * @param valueFiles {array}
		 * @return result {array}
		 */
		private function validation_file($files, $valueFiles){
			$check = true;
			$validFile = array();
			foreach($valueFiles as $key => $item){
				if(isset($files[$key])){
					$configFile = array(
						'jenis' => 'gambar',
						'error' => $files[$key]['error'],
						'size' => $files[$key]['size'],
						'name' => $files[$key]['name'],
						'tmp_name' => $files[$key]['tmp_name'],
						'max' => 262144, // 250kb
					);
					$validation = $this->validation->validFile($configFile);
					if(!$validation['cek']) $check = false;

					$validFile[$key] = $validation;
				}
				else if(!isset($files[$key]) && $item['required']){
					$validFile[$key] = array(
						'cek' => false,
						'error' => 'Upload File belum diiisi, silahkan masukkan file yang akan diupload'
					);
				}
			}
			
			return array(
				'check' => $check,
				'error' => $validFile,
			);
		}

		/**
		 * Method upload_files
		 * Proses upload files ke server
		 * @param files {array} $_FILES
		 * @param valueFiles {array}
		 * @return result {array}
		 */
		private function upload_files($files, $valueFiles){
			$check = true;
			$error = array();

			foreach($valueFiles as $key => $item){
				if(($item['value'] != NULL || $item['value'] != "") && $item['required']){
					$path = ROOT.DS.'assets'.DS.'images'.DS.'permohonan_kredit'.DS.$item['value'];
					if(!move_uploaded_file($files[$key]['tmp_name'], $path)){
						$check = false;
						$error[$key]['check'] = false;
						$error[$key]['error'] = 'Upload File Gagal';
					}
					else{
						$error[$key]['check'] = true;
						$error[$key]['error'] = 'Upload File Berhasil';
					}
					$paths[$key] = $path;
				}
				else if(($item['value'] == NULL || $item['value'] == "") && $item['required']){
					$check = false;
					$paths[$key] = NULL;
					$error[$key]['check'] = false;
					$error[$key]['error'] = 'Upload File Gagal karena tidak diupload';
				}
				else{
					$paths[$key] = NULL;
					$error[$key]['check'] = false;
					$error[$key]['error'] = 'Upload File Gagal karena tidak diupload';
				}
			}

			return array(
				'success' => $check,
				'error' => $error,
				'paths' => $paths
			);
		}

		/**
		 * Method rollback_files
		 * Proses rollback files / penghapusan file yang sudah diupload di server
		 * @param paths {array}
		 */
		private function rollback_files($paths){
			foreach($paths as $value){
				if(file_exists($value)) unlink($value);
			}
		}

		/**
		 * Method set_validation
		 * Proses validasi field inputan
		 * @param data {array} $_POST
		 * @return result {array}
		 */
		private function set_validation($data){
			// id fpk - text
			$this->validation->set_rules($data['id'], 'ID Form Pengajuan Permohonan Kredit', 'id', 'string | 15 | 15 | required');
			// tgl - date
			$this->validation->set_rules($data['tgl'], 'Tanggal Pengajuan', 'tgl', 'string | 10 | 10 | required');
			
			/** Data Pinjaman */
			
			// status nasabah - radio btn
			$this->validation->set_rules($data['status_nasabah'], 'Status Nasabah', 'status_nasabah', 'string | 4 | 4 | required');
			// limit kredit - text double
			$this->validation->set_rules($data['limit_kredit'], 'Limit Kredit', 'limit_kredit', 'nilai | 1 | 9999999999 | required');
			// jangka waktu - text int
			$this->validation->set_rules($data['jangka_waktu'], 'Jangka Waktu', 'jangka_waktu', 'angka | 1 | 5 | required');
			// tujuan - radio btn
			$this->validation->set_rules($data['tujuan'], 'Tujuan', 'tujuan', 'string | 1 | 20 | required');
			// jelaskan - text area
			$this->validation->set_rules($data['jelaskan'], 'Jelaskan', 'jelaskan', 'string | 1 | 255 | required');

			/** Data permohonan */

			$required_permohonan = array(
				'jumlah_anak' => (strtolower($data['status_kawin']) != "belum kawin") ? 'required' : 'not_required',
				'sewa_rumah' => (strtolower($data['status_rumah']) == 'sewa') ? 'required' : 'not_required',
			);

			// nama - text
			$this->validation->set_rules($data['nama'], 'Nama Pemohon', 'nama', 'string | 1 | 255 | required');
			// nama panggilan - text
			$this->validation->set_rules($data['nama_panggilan'], 'Nama Panggilan', 'nama_panggilan', 'string | 1 | 255 | required');
			// tempat lahir - text
			$this->validation->set_rules($data['tmpt_lahir'], 'Tempat Lahir', 'tmpt_lahir', 'string | 1 | 255 | required');
			// tgl lahir - date
			$this->validation->set_rules($data['tgl_lahir'], 'Tanggal Lahir', 'tgl_lahir', 'string | 10 | 10 | required');
			// jk - radio btn
			$this->validation->set_rules($data['jk'], 'Jenis Kelamin', 'jk', 'string | 1 | 1 | required');
			// no ktp - text
			$this->validation->set_rules($data['no_ktp'], 'No. KTP', 'no_ktp', 'string | 1 | 255 | required');
			// berlaku - date
			$this->validation->set_rules($data['berlaku'], 'Berlaku', 'berlaku', 'string | 10 | 10 | not_required');
			// seumur_hidup - checkbox
			$this->validation->set_rules($data['seumur_hidup'], 'Seumur Hidup', 'seumur_hidup', 'string | 1 | 1 | not_required');
			// Status kawin - radio btn
			$this->validation->set_rules($data['status_kawin'], 'Status Kawin', 'status_kawin', 'string | 1 | 255 | required');
			// Jumlah Anak - text int
			$this->validation->set_rules($data['jumlah_anak'], 'Jumlah Anak', 'jumlah_anak', 'string | 1 | 255 | '.$required_permohonan['jumlah_anak']);
			// Pendidikan formal - radio
			$this->validation->set_rules($data['pendidikan_formal'], 'Pendidikan Formal', 'pendidikan_formal', 'string | 1 | 10 | required');
			// nama ibu - text
			$this->validation->set_rules($data['nama_ibu'], 'Nama Gadis Ibu Kandung', 'nama_ibu', 'string | 1 | 255 | required');
			// alamat - text area
			$this->validation->set_rules($data['alamat'], 'Alamat', 'alamat', 'string | 1 | 255 | required');
			// status rumah - radio
			$this->validation->set_rules($data['status_rumah'], 'Status Kepemilikan Rumah', 'status_rumah', 'string | 1 | 255 | required');
			// sewa rumah - date
			$this->validation->set_rules($data['sewa_rumah'], 'Sewa s/d', 'sewa_rumah', 'string | 1 | 255 | '.$required_permohonan['sewa_rumah']);
			// no telp - text
			$this->validation->set_rules($data['no_telp'], 'No. Telepon', 'no_telp', 'string | 1 | 255 | required');

			/** Data Suami Istri */

			$required_suami_istri = (strtolower($data['status_kawin']) == 'kawin') ? 'required' : 'not_required';

			// nama suami / istri
			$this->validation->set_rules($data['nama_suami_istri'], 'Nama Suami / Istri', 'nama_suami_istri', 'string | 1 | 255 | '.$required_suami_istri);
			// tmpt lahir
			$this->validation->set_rules($data['tmpt_lahir_suami_istri'], 'Tempat Lahir Suami / Istri', 'tmpt_lahir_suami_istri', 'string | 1 | 255 | '.$required_suami_istri);
			// tgl lahir
			$this->validation->set_rules($data['tgl_lahir_suami_istri'], 'Tanggal Lahir Suami / Istri', 'tgl_lahir_suami_istri', 'string | 1 | 255 | '.$required_suami_istri);
			// pekerjaan
			$this->validation->set_rules($data['pekerjaan_suami_istri'], 'Pekerjaan Suami / Istri', 'pekerjaan_suami_istri', 'string | 1 | 255 | '.$required_suami_istri);

			/** Data Pekerjaan */

			$required_pekerjaan = (strtolower($data['pilih_pekerjaan']) == 'karyawan') ? 'required' : 'not_required';

			// pekerjaan
			$this->validation->set_rules($data['pekerjaan'], 'Pekerjaan', 'pekerjaan', 'string | 1 | 255 | '.$required_pekerjaan);
			// bidang usaha
			$this->validation->set_rules($data['bidang_usaha_pekerjaan'], 'Bidang Usaha Pekerjaan', 'bidang_usaha_pekerjaan', 'string | 1 | 255 | '.$required_pekerjaan);
			// lama bekerja
			$this->validation->set_rules($data['lama_bekerja'], 'Lama Bekerja', 'lama_bekerja', 'string | 1 | 255 | '.$required_pekerjaan);
			// nama perusahaan
			$this->validation->set_rules($data['nama_perusahaan'], 'Nama Perusahaan', 'nama_perusahaan', 'string | 1 | 255 | '.$required_pekerjaan);
			// jabatan
			$this->validation->set_rules($data['jabatan'], 'Jabatan', 'jabatan', 'string | 1 | 255 | '.$required_pekerjaan);
			// alamat perusahaan
			$this->validation->set_rules($data['alamat_perusahaan'], 'Alamat Perusahaan', 'alamat_perusahaan', 'string | 1 | 255 | '.$required_pekerjaan);
			// no telp perusahaan
			$this->validation->set_rules($data['no_telp_perusahaan'], 'No. Telepon Perusahaan', 'no_telp_perusahaan', 'string | 1 | 255 | '.$required_pekerjaan);
			// penghasilan
			$this->validation->set_rules($data['penghasilan_bersih_pekerjaan'], 'Penghasilan Bersih per Bulan', 'penghasilan_bersih_pekerjaan', 'string | 1 | 255 | '.$required_pekerjaan);
			// rata2 biaya hidup
			$this->validation->set_rules($data['rata2_biaya_hidup'], 'Rata-rata Biaya Hidup per Bulan', 'rata2_biaya_hidup', 'string | 1 | 255 | '.$required_pekerjaan);

			/** Data Pekerjaan - Usaha */

			$required_usaha = (strtolower($data['pilih_pekerjaan']) == 'usaha') ? 'required' : 'not_required';

			// bentuk usaha
			$this->validation->set_rules($data['bentuk_usaha'], 'Bentuk Usaha', 'bentuk_usaha', 'string | 1 | 255 | '.$required_usaha);
			// prosentase kepemilikan
			$this->validation->set_rules($data['prosentase_kepemilikan'], 'Prosentase Kepemilikan', 'prosentase_kepemilikan', 'string | 1 | 255 | '.$required_usaha);
			// usaha sejak
			$this->validation->set_rules($data['usaha_sejak'], 'usaha_sejak', 'penghasilan', 'string | 1 | 255 | '.$required_usaha);
			// bidang usaha
			$this->validation->set_rules($data['bidang_usaha'], 'Bidang Usaha', 'bidang_usaha', 'string | 1 | 255 | '.$required_usaha);
			// jumlah karyawan
			$this->validation->set_rules($data['jumlah_karyawan'], 'Jumlah Karyawan', 'jumlah_karyawan', 'string | 1 | 255 | '.$required_usaha);
			// alamat usaha
			$this->validation->set_rules($data['alamat_usaha'], 'Alamat Perusahaan', 'alamat_usaha', 'string | 1 | 255 | '.$required_usaha);
			// no telp usaha
			$this->validation->set_rules($data['no_telp_usaha'], 'No. Telepon Perusahaan', 'no_telp_usaha', 'string | 1 | 255 | '.$required_usaha);
			// penghasilan bersih
			$this->validation->set_rules($data['penghasilan_bersih'], 'Penghasilan Bersih per Bulan', 'penghasilan_bersih', 'string | 1 | 255 | '.$required_usaha);

			/** Data Agunan */

			$required_agunan = array(
				'kendaraan' => (strtolower($data['jenis']) == 'mobil' || strtolower($data['jenis']) == 'motor') ? 'required' : 'not_required',
				'rumah' => (strtolower($data['jenis']) == 'rumah' || strtolower($data['jenis']) == 'tanah') ? 'required' : 'not_required',
				'imb' => ($data['imb'] == '1') ? 'required' : 'not_required',
			);

			if(strtolower($data['jenis']) == 'mobil' || strtolower($data['jenis']) == 'motor'){
				$label = 'Kendaraan';
			}
			else{
				$label = strtolower($data['jenis']);
			}

			// jenis
			$this->validation->set_rules($data['jenis'], 'Jenis Agunan', 'jenis', 'string | 1 | 255 | required');
			// tipe kendaraan
			$this->validation->set_rules($data['tipe_kendaraan'], 'Tipe kendaraan', 'tipe_kendaraan', 'string | 1 | 255 | '.$required_agunan['kendaraan']);
			// warna
			$this->validation->set_rules($data['warna'], 'Warna kendaraan', 'warna', 'string | 1 | 255 | '.$required_agunan['kendaraan']);
			// tahun
			$this->validation->set_rules($data['tahun'], 'Tahun Kendaraan', 'tahun', 'string | 1 | 255 | '.$required_agunan['kendaraan']);
			// no bpkb
			$this->validation->set_rules($data['no_bpkb'], 'No. BPKB Kendaraan', 'no_bpkb', 'string | 1 | 255 | '.$required_agunan['kendaraan']);
			// atas nama
			$this->validation->set_rules($data['atas_nama'], 'Atas Nama '.$label, 'atas_nama', 'string | 1 | 255 | required');
			// status
			$this->validation->set_rules($data['status_agunan'], 'Status', 'status_agunan', 'string | 1 | 255 | '.$required_agunan['rumah']);
			// imb
			$this->validation->set_rules($data['imb'], 'IMB', 'imb', 'string | 1 | 255 | '.$required_agunan['rumah']);
			// ada
			$this->validation->set_rules($data['ada'], 'No. IMB', 'ada', 'string | 1 | 255 | '.$required_agunan['imb']);
			// alamat jaminan
			$this->validation->set_rules($data['alamat_agunan'], 'Alamat Jaminan', 'alamat_agunan', 'string | 1 | 255 | required');				

			/** Data Keluarga */

			// nama keluarga
			$this->validation->set_rules($data['nama_keluarga'], 'Nama Keluarga', 'nama_keluarga', 'string | 1 | 255 | required');
			// alamat keluarga
			$this->validation->set_rules($data['alamat_keluarga'], 'Alamat Keluarga', 'alamat_keluarga', 'string | 1 | 255 | required');
			// no_telp keluarga
			$this->validation->set_rules($data['no_telp_keluarga'], 'No. Telepon Keluarga', 'no_telp_keluarga', 'string | 1 | 255 | required');
			// hubungan keluarga
			$this->validation->set_rules($data['hubungan_keluarga'], 'Hubungan Keluarga', 'hubungan_keluarga', 'string | 1 | 255 | required');

			return $this->validation->run();
		}		
	}
