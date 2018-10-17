<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");

	/**
	 * Class Permohonan_kredit_admin
	 */
	class Permohonan_kredit_admin extends Controller{
		
		private $success = false;
		private $message = NULL;
		private $notif = array();
		private $error = array();

		/**
		 * Method __construct
		 * Load library saat pertama kali di load
		 */
		public function __construct(){
			$this->auth();
			$this->auth->cekAuth();
			$this->helper();
			$this->validation();
			$this->excel();
			$this->model('Permohonan_kreditModel');
		}

		/**
		 * Method index
		 * Default Method setelah __construct
		 * Load page list permohonan kredit admin
		 */
		public function index(){
			$this->list();
		}

		/**
		 * Method list
		 * Load page list permohonan kredit admin
		 */
		private function list(){
			$css = array('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');
			$js = array(
                'assets/bower_components/datatables.net/js/jquery.dataTables.min.js', 
				'assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
				'app/views/permohonan_kredit/js/initList.js',
			);

			$config = array(
				'title' => array(
					'main' => 'Data Permohonan Kredit',
					'sub' => 'List Semua Data Permohonan Kredit',
				),
				'css' => $css,
				'js' => $js,
			);

			$this->layout('permohonan_kredit/list', $config, $data = null);
        }
        
        /**
         * Method get_list
		 * Proses get data permohonan kredit untuk dirender di dataTable
		 * @return output {object} array json
         */
        public function get_list(){
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				// config datatable
				$config_dataTable = array(
					'tabel' => 'permohonan_kredit',
					'kolomOrder' => array(
						null, 'id', 'tgl', 'no_ktp', 'nama', 'tujuan', 'limit_kredit', 
						'jangka_waktu', 'jenis', 'status_nasabah', null
					),
					'kolomCari' => array(
						'id', 'tgl', 'no_ktp', 'nama', 'tujuan', 'limit_kredit', 
						'jangka_waktu', 'jenis', 'status_nasabah'
					),
					'orderBy' => array('id' => 'desc'),
					'kondisi' => false,
				);

				$dataPermohonan = $this->Permohonan_kreditModel->getAllDataTable($config_dataTable);

				$data = array();
				$no_urut = $_POST['start'];
				foreach($dataPermohonan as $row){
					$no_urut++;
					
					// status nasabah
					$status = ($row['status_nasabah'] == 'Baru') ? '<span class="label label-primary">'.$row['status_nasabah'].'</span>' : 
						'<span class="label label-success">'.$row['status_nasabah'].'</span>';

					// button aksi
					$aksiDetail = '<button onclick="getView('."'".strtolower($row["id"])."'".')" type="button" class="btn btn-sm btn-info btn-flat" title="Lihat Detail"><i class="fa fa-eye"></i></button>';
					$aksiHapus = '<button onclick="getDelete('."'".strtolower($row["id"])."'".')" type="button" class="btn btn-sm btn-danger btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></button>';
					$aksi = '<div class="btn-group">'.$aksiDetail.$aksiHapus.'</div>';
					
					$dataRow = array();
					$dataRow[] = $no_urut;
					$dataRow[] = $row['id'];
					$dataRow[] = $this->helper->cetakTgl($row['tgl'], 'full');
					$dataRow[] = $row['no_ktp'];
					$dataRow[] = $row['nama'];
					$dataRow[] = $row['tujuan'];
					$dataRow[] = $this->helper->cetakRupiah($row['limit_kredit']);
					$dataRow[] = $row['jangka_waktu'].' Bulan';
					$dataRow[] = $row['jenis'];
					$dataRow[] = $status;
					$dataRow[] = $aksi;

					$data[] = $dataRow;
				}

				$output = array(
					'draw' => $_POST['draw'],
					'recordsTotal' => $this->Permohonan_kreditModel->recordTotal(),
					'recordsFiltered' => $this->Permohonan_kreditModel->recordFilter(),
					'data' => $data,
				);

				echo json_encode($output);
			}
			else{
				die(json_encode(array(
					'success' => false,
					'message' => 'Access Denied',
					'error' => '403'
				)));
			}
        }

		/**
		 * Method detail
		 * Proses get data dan render data ke detail permohonan kredit
		 * @param id {string}
		 */
        public function detail($id){
			$id = strtoupper($id);
			$detail = !empty($this->Permohonan_kreditModel->getById($id)) ? 
				$this->Permohonan_kreditModel->getById($id) : false;
			
			if((empty($id) || $id == "") || !$detail) $this->redirect(BASE_URL."permohonan-kredit-admin/");

			$js = array('app/views/permohonan_kredit/js/initView.js');
			$config = array(
				'title' => array(
					'main' => 'Data Permohonan Kredit',
					'sub' => 'Detail Data Permohonan Kredit',
				),
				'css' => array(),
				'js' => $js,
			);

			$file = $this->validation_file(array(
				'file_ktp_pemohon' => array(
					'text' => 'File KTP Pemohon',
					'value' => $detail['file_ktp_pemohon']
				),
				'file_ktp_suami_istri' => array(
					'text' => 'File KTP Suami Istri',
					'value' => $detail['file_ktp_suami_istri']
				),
				'file_kk' => array(
					'text' => 'File KK',
					'value' => $detail['file_kk']
				),
				'file_slip_gaji' => array(
					'text' => 'File Slip Gaji',
					'value' => $detail['file_slip_gaji']
				),
				'file_stnk' => array(
					'text' => 'File STNK',
					'value' => $detail['file_stnk'],
				),
				'file_nota_pajak' => array(
					'text' => 'File Nota Pajak',
					'value' => $detail['file_nota_pajak']
				),
				'file_bpkb' => array(
					'text' => 'File BPKB',
					'value' => $detail['file_bpkb']
				),
				'file_faktur' => array(
					'text' => 'File Faktur',
					'value' => $detail['file_faktur']
				),
				'file_kwintasi_jual_beli' => array(
					'text' => 'File Kwintasi Jual Beli',
					'value' => $detail['file_kwintasi_jual_beli']
				)
			));

			$data_suami_istri = array();
			$data_pekerjaan = array();
			$data_usaha = array();

			// jika status kawin menikah
			if($detail['status_kawin'] == 'Kawin' || $detail['status_kawin'] == 'Duda/Janda'){
				$data_suami_istri = array(
					'nama_suami_istri' => $detail['nama_suami_istri'],
					'tmpt_lahir_suami_istri' => $detail['tmpt_lahir_suami_istri'],
					'tgl_lahir_suami_istri' => $this->helper->cetakTgl($detail['tgl_lahir_suami_istri'], 'full'),
					'pekerjaan_suami_istri' => $detail['pekerjaan_suami_istri'],
					'jenis' => ($detail['jk'] == 'Pria') ? 'Istri' : 'Suami'
				);
			}

			// jika pilih pekerjaan karyawan
			if($detail['pilih_pekerjaan'] == 'Karyawan'){
				$data_pekerjaan = array(
					'pekerjaan' => $detail['pekerjaan'],
					'bidang_usaha_pekerjaan' => $detail['bidang_usaha_pekerjaan'],
					'lama_bekerja' => $detail['lama_bekerja'].' Tahun',
					'nama_perusahaan' => $detail['nama_perusahaan'],
					'jabatan' => $detail['jabatan'],
					'alamat_perusahaan' => $detail['alamat_perusahaan'],
					'no_telp_perusahaan' => $detail['no_telp_perusahaan'],
					'penghasilan_bersih_pekerjaan' => $this->helper->cetakRupiah($detail['penghasilan_bersih_pekerjaan']),
					'rata2_biaya_hidup' => $this->helper->cetakRupiah($detail['rata2_biaya_hidup']),
				);
			}
			else{
				$data_usaha = array(
					'bentuk_usaha' => $detail['bentuk_usaha'],
					'prosentase_kepemilikan' => $detail['prosentase_kepemilikan'].' %',
					'usaha_sejak' => 'Tahun '.$detail['usaha_sejak'],
					'bidang_usaha' => $detail['bidang_usaha'],
					'jumlah_karyawan' => $detail['jumlah_karyawan'].' Orang',
					'alamat_usaha' => $detail['alamat_usaha'],
					'no_telp_usaha' => $detail['no_telp_usaha'],
					'penghasilan_bersih' => $this->helper->cetakRupiah($detail['penghasilan_bersih']),
				);
			}

			$data_detail = array(
				'id' => $detail['id'],
				'tgl' => $this->helper->cetakTgl($detail['tgl'], 'full'),

				// data pinjaman
				'status_nasabah' => ($detail['status_nasabah'] == 'Baru') ? 
					// use style span
					'<span class="label label-success">'.$detail['status_nasabah'].'</span>' : 
					'<span class="label label-primary">'.$detail['status_nasabah'].'</span>',
				'limit_kredit' => $this->helper->cetakRupiah($detail['limit_kredit']),
				'jangka_waktu' => $detail['jangka_waktu'].' Bulan',
				'tujuan' => $detail['tujuan'],
				'jelaskan' => $detail['jelaskan'],

				// data permohonan
				'nama' => $detail['nama'],
				'nama_panggilan' => $detail['nama_panggilan'],
				'tmpt_lahir' => $detail['tmpt_lahir'],
				'tgl_lahir' => $this->helper->cetakTgl($detail['tgl_lahir'], 'full'),
				'jk' => $detail['jk'],
				'no_ktp' => $detail['no_ktp'],
				'berlaku' => ($detail['berlaku'] == '' || empty($detail['berlaku'])) ? 
					'-' : $this->helper->cetakTgl($detail['berlaku'], 'full'),
				'seumur_hidup' => ($detail['seumur_hidup'] == '1') ? 'Ya' : 'Tidak',
				'status_kawin' => $detail['status_kawin'],
				'jumlah_anak' => ($detail['seumur_hidup'] == 'Belum Kawin') ? '-' : $detail['jumlah_anak'].' Orang',
				'pendidikan_formal' => $detail['pendidikan_formal'],
				'nama_ibu' => $detail['nama_ibu'],
				'alamat' => $detail['alamat'],
				'status_rumah' => $detail['status_rumah'],
				'sewa_rumah' => ($detail['sewa_rumah'] == '' || empty($detail['sewa_rumah'])) ? 
					'-' : $this->helper->cetakTgl($detail['sewa_rumah'], 'full'),
				'no_telp' => $detail['no_telp'],
				
				// data suami istri
				'data_suami_istri' => $data_suami_istri,

				'pilih_pekerjaan' => $detail['pilih_pekerjaan'],
				
				// data pekerjaan
				'data_pekerjaan' => $data_pekerjaan,
				
				// data usaha
				'data_usaha' => $data_usaha,

				// data agunan
				'jenis' => $detail['jenis'],
				'tipe_kendaraan' => $this->helper->checkEmpty($detail['tipe_kendaraan']) ? '-' : $detail['tipe_kendaraan'],
				'warna' => $this->helper->checkEmpty($detail['warna']) ? '-' : $detail['warna'],
				'tahun' => $this->helper->checkEmpty($detail['tahun']) ? '-' : $detail['tahun'],
				'no_bpkb' => $this->helper->checkEmpty($detail['no_bpkb']) ? '-' : $detail['no_bpkb'],
				'atas_nama' => $detail['atas_nama'],
				'status_agunan' => $this->helper->checkEmpty($detail['status_agunan']) ? '-' : $detail['status_agunan'],
				'imb' => $this->helper->checkEmpty($detail['imb']) ? '-' : $detail['imb'],
				'ada' => ($detail['imb'] == 'Ada') ? $detail['ada'] : '-',
				'alamat_agunan' => $detail['alamat_agunan'],

				// data keluarga
				'nama_keluarga' => $detail['nama_keluarga'],
				'alamat_keluarga' => $detail['alamat_keluarga'],
				'no_telp_keluarga' => $detail['no_telp_keluarga'],
				'hubungan_keluarga' => $detail['hubungan_keluarga'],

				// data upload
				'file_ktp_pemohon' => $file['file_ktp_pemohon'],
				'file_ktp_suami_istri' => $file['file_ktp_suami_istri'],
				'file_kk' => $file['file_kk'],
				'file_slip_gaji' => $file['file_slip_gaji'],
				'file_stnk' => $file['file_stnk'],
				'file_nota_pajak' => $file['file_nota_pajak'],
				'file_bpkb' => $file['file_bpkb'],
				'file_faktur' => $file['file_faktur'],
				'file_kwintasi_jual_beli' => $file['file_kwintasi_jual_beli']
			);
			$this->layout('permohonan_kredit/view', $config, $data_detail);
        }

        /**
         * Method delete
		 * Proses hapus data permohonan kredit
		 * @param id {string}
		 * @return result {object} array berupa json
         */
        public function delete($id){
			if($_SERVER['REQUEST_METHOD'] == "POST" && $id != ''){
				$id = strtoupper($id);
				if(empty($id) || $id == ""){
					die(json_encode(array(
						'success' => false,
						'message' => 'Access Denied',
						'error' => '403'
					)));
				}

				$get_delete_files = $this->Permohonan_kreditModel->get_filesById($id);
				$delete = $this->Permohonan_kreditModel->delete($id);

				if($delete['success']) {
					// hapus file di server
					$this->delete_files($get_delete_files);

					$this->success = true;
					$this->message = "Hapus Data Berhasil";
					$this->error = $delete['error'];
					$this->notif = array(
						'title' => 'Pesan Berhasil',
						'message' => $this->message,
						'type' => 'success',
						'plugin' => 'toastr'
					);
				}
				else{
					$this->message = "Hapus Data Gagal. Terjadi Kesalahan Teknis, Silahkan Coba Kembali";
					$this->error = $delete['error'];
					$this->notif = array(
						'title' => 'Pesan Gagal',
						'message' => $this->message,
						'type' => 'error',
						'plugin' => 'swal'
					);
				}

				$result = array(
					'success' => $this->success,
					'message' => $this->message,
					'notif' => $this->notif,
					'error' => $this->error
				);

				echo json_encode($result);
			}
			else{
				die(json_encode(array(
					'success' => false,
					'message' => 'Access Denied',
					'error' => '403'
				)));
			}
		}

		/**
		 * 
		 */
		private function delete_files($files){
			foreach($files as $value){
				if(file_exists($value)) unlink($value);
			}
		}

		/**
		 * Method validation_file
		 * Proses pengecekan file di server sebelum dikirim ke client
		 * Pengecekan ketersediaan file, dan handling error jika file tidak ada / rusak
		 * @param file {array}
		 * @return result {array}
		 */
		private function validation_file($file){
			$result = array();
			foreach($file as $key => $value){
				if(!empty($value['value'])){
					$filename = ROOT.DS.'assets'.DS.'images'.DS.'permohonan_kredit'.DS.$value['value'];
					if(!file_exists($filename)) { $result[$key] = '-'; }
					else { $result[$key] = '<a href="'.BASE_URL.'assets/images/permohonan_kredit/'.$value['value'].'" target="_blank">'.$value['text'].'</a>'; }
				}
				else { $result[$key] = '-'; }
			}

			return $result;
		}

		/**
		 * Method export
		 * Proses Export data detail menjadi excel
		 */
		public function export($id){
			if($_SERVER['REQUEST_METHOD'] == "GET" && $id != ''){
				$id = strtoupper($id);
				$export = isset($_GET['export']) ? $this->validation->validInput($_GET['export'], false) : false;
				if(empty($id) || $id == "" || !$export){
					die(json_encode(array(
						'success' => false,
						'message' => 'Access Denied',
						'error' => '403'
					)));
				}
				
				$row = $this->Permohonan_kreditModel->export($id, $export);
				$header = array_keys($row[0]); 

				// $this->excel->setProperty('Permohonan Kredit','Permohonan Kredit','Permohonan Kredit');
				$this->excel->setData($header, $row);
				$this->excel->getData('Permohonan Kredit', 'Permohonan Kredit', 2, 3);

				$this->excel->getExcel('Permohonan Kredit');
			}
			else{
				die(json_encode(array(
					'success' => false,
					'message' => 'Access Denied',
					'error' => '403'
				)));
			}
		}
	}
