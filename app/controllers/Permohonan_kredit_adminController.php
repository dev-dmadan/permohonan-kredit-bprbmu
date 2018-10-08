<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");

	/**
	 * 
	 */
	class Permohonan_kredit_admin extends Controller{

		/**
		 * 
		 */
		public function __construct(){
			$this->auth();
			$this->auth->cekAuth();
			$this->helper();
			$this->validation();
		}

		/**
		 * 
		 */
		public function index(){
			$this->list();
		}

		/**
		 * 
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
         * 
         */
        public function get_list(){
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				// config datatable
				$config_dataTable = array(
					'tabel' => 'v_permohonan_kredit',
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

					// button aksi
					$aksiDetail = '<button onclick="getView('."'".strtolower($row["id"])."'".')" type="button" class="btn btn-sm btn-info btn-flat" title="Lihat Detail"><i class="fa fa-eye"></i></button>';
					$aksiHapus = '<button onclick="getDelete('."'".strtolower($row["id"])."'".')" type="button" class="btn btn-sm btn-danger btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></button>';
					
					$aksi = '<div class="btn-group">'.$aksiDetail.$aksiHapus.'</div>';
					
					$dataRow = array();
					$dataRow[] = $no_urut;
					$dataRow[] = $row['id'];
					$dataRow[] = $row['tgl'];
					$dataRow[] = $row['no_ktp'];
					$dataRow[] = $row['nama'];
					$dataRow[] = $row['tujuan'];
					$dataRow[] = $row['limit_kredit'];
					$dataRow[] = $row['jangka_waktu'];
					$dataRow[] = $row['jenis'];
					$dataRow[] = $row['status_nasabah'];

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
			else $this->redirect();
        }

		/**
		 * 
		 */
        public function detail($id){
			
        }

        /**
         * 
         */
        public function delete($id){
			if($_SERVER['REQUEST_METHOD'] == "POST" && $id != ''){
				$id = strtoupper($id);
				if(empty($id) || $id == "") $this->redirect(BASE_URL."permohonan-kredit/");

				if($this->Permohonan_kreditModel->delete($id)) $this->status = true;

				echo json_encode($this->status);
			}
			else $this->redirect();
		}

		/**
		 * 
		 */
		public function export(){
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				
			}
		}

	}
