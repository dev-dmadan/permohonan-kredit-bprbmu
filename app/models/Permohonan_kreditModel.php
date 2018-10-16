<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");
	
	/**
	 * 
	 */
	class Permohonan_kreditModel extends Database{
		
		protected $koneksi;
		protected $dataTable;

		/**
		 * 
		 */
		public function __construct(){
			$this->koneksi = $this->openConnection();
			$this->dataTable = new Datatable();
		}

		/** ============== Method DataTable ============== */

			/**
			 * 
			 */
			public function getAllDataTable($config){
				$this->dataTable->set_config($config);
				$statement = $this->koneksi->prepare($this->dataTable->getDataTable());
				$statement->execute();
				$result = $statement->fetchAll();

				return $result;
			}

			/**
			 * 
			 */
			public function recordFilter(){
				return $this->dataTable->recordFilter();

			}

			/**
			 * 
			 */
			public function recordTotal(){
				return $this->dataTable->recordTotal();
			}
		
		/** ============ End Method DataTable ============ */

		/**
		 * 
		 */
		public function getAll(){
			$query = "SELECT * FROM permohonan_kredit";

			$statement = $this->koneksi->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();

			return $result;
		}

		/**
		 * 
		 */
		public function getById($id){
			$query = "SELECT * FROM permohonan_kredit WHERE id = :id;";

			$statement = $this->koneksi->prepare($query);
			$statement->bindParam(':id', $id);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);

			return $result;
		}

		public function get_filesById($id){
			$query = "SELECT file_ktp_pemohon, file_ktp_suami_istri, file_kk, file_slip_gaji, ";
			$query .= "file_stnk, file_nota_pajak, file_bpkb, file_faktur, file_kwintasi_jual_beli ";
			$query .= "FROM permohonan_kredit WHERE id = :id;";

			$statement = $this->koneksi->prepare($query);
			$statement->bindParam(':id', $id);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);

			return $result;
		}

		/**
		 * 
		 */
		public function getLastID($id){
			$id .= "%";
			$query = "SELECT MAX(id_fpk) AS id FROM id_fpk WHERE id_fpk LIKE :id";

			$statement = $this->koneksi->prepare($query);
			$statement->bindParam(':id', $id);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);

			return $result;
		}

		/**
		 * 
		 */
		public function insert($data){
			try{
				$this->koneksi->beginTransaction();
				$this->insert_permohonan_kredit($data);
				$this->koneksi->commit();

				return array(
					'success' => true,
					'error' => NULL
				);
			}
			catch(PDOException $e){
				$this->koneksi->rollback();
				return array(
					'success' => false,
					'error' => $e->getMessage()
				);
			}
		}

		/**
		 * 
		 */
		private function insert_permohonan_kredit($data){
			$query = "INSERT INTO permohonan_kredit ";
			$query .= "(id, tgl, status_nasabah, limit_kredit, jangka_waktu, tujuan, jelaskan, ";
			$query .= "nama, nama_panggilan, tmpt_lahir, tgl_lahir, jk, no_ktp, berlaku, seumur_hidup, status_kawin, jumlah_anak, ";
			$query .= "pendidikan_formal, nama_ibu, alamat, status_rumah, sewa_rumah, no_telp, ";
			$query .= "nama_suami_istri, tmpt_lahir_suami_istri, tgl_lahir_suami_istri, pekerjaan_suami_istri, pilih_pekerjaan, ";
			$query .= "pekerjaan, bidang_usaha_pekerjaan, lama_bekerja, nama_perusahaan, jabatan, alamat_perusahaan, ";
			$query .= "no_telp_perusahaan, penghasilan_bersih_pekerjaan, rata2_biaya_hidup, bentuk_usaha, prosentase_kepemilikan, ";
			$query .= "usaha_sejak, bidang_usaha, jumlah_karyawan, alamat_usaha, no_telp_usaha, penghasilan_bersih, ";
			$query .= "jenis, tipe_kendaraan, warna, tahun, no_bpkb, atas_nama, status_agunan, imb, ada, alamat_agunan, ";
			$query .= "nama_keluarga, alamat_keluarga, no_telp_keluarga, hubungan_keluarga, ";
			$query .= "file_ktp_pemohon, file_ktp_suami_istri, file_kk, file_slip_gaji, file_stnk, file_nota_pajak, file_bpkb, ";
			$query .= "file_faktur, file_kwintasi_jual_beli)";

			$query .= "VALUES ";
			
			$query .= "(:id, :tgl, :status_nasabah, :limit_kredit, :jangka_waktu, :tujuan, :jelaskan, ";
			$query .= ":nama, :nama_panggilan, :tmpt_lahir, :tgl_lahir, :jk, :no_ktp, :berlaku, :seumur_hidup, :status_kawin, :jumlah_anak, ";
			$query .= ":pendidikan_formal, :nama_ibu, :alamat, :status_rumah, :sewa_rumah, :no_telp, ";
			$query .= ":nama_suami_istri, :tmpt_lahir_suami_istri, :tgl_lahir_suami_istri, :pekerjaan_suami_istri, :pilih_pekerjaan, ";
			$query .= ":pekerjaan, :bidang_usaha_pekerjaan, :lama_bekerja, :nama_perusahaan, :jabatan, :alamat_perusahaan, ";
			$query .= ":no_telp_perusahaan, :penghasilan_bersih_pekerjaan, :rata2_biaya_hidup, :bentuk_usaha, :prosentase_kepemilikan, ";
			$query .= ":usaha_sejak, :bidang_usaha, :jumlah_karyawan, :alamat_usaha, :no_telp_usaha, :penghasilan_bersih, ";
			$query .= ":jenis, :tipe_kendaraan, :warna, :tahun, :no_bpkb, :atas_nama, :status_agunan, :imb, :ada, :alamat_agunan, ";
			$query .= ":nama_keluarga, :alamat_keluarga, :no_telp_keluarga, :hubungan_keluarga, ";
			$query .= ":file_ktp_pemohon, :file_ktp_suami_istri, :file_kk, :file_slip_gaji, :file_stnk, :file_nota_pajak, :file_bpkb, ";
			$query .= ":file_faktur, :file_kwintasi_jual_beli)";

			$statement = $this->koneksi->prepare($query);
			$statement->execute(
				array(
					// id dan tgl
					':id' => $data['id'],
					':tgl' => $data['tgl'],

					// data pinjaman
					':status_nasabah' => $data['status_nasabah'],
					':limit_kredit' => $data['limit_kredit'],
					':jangka_waktu' => $data['jangka_waktu'],
					':tujuan' => $data['tujuan'],
					':jelaskan' => $data['jelaskan'],

					// data permohonan
					':nama' => $data['nama'],
					':nama_panggilan' => $data['nama_panggilan'],
					':tmpt_lahir' => $data['tmpt_lahir'],
					':tgl_lahir' => $data['tgl_lahir'],
					':jk' => $data['jk'],
					':no_ktp' => $data['no_ktp'],
					':berlaku' => $data['berlaku'],
					':seumur_hidup' => $data['seumur_hidup'],
					':status_kawin' => $data['status_kawin'],
					':jumlah_anak' => $data['jumlah_anak'],
					':pendidikan_formal' => $data['pendidikan_formal'],
					':nama_ibu' => $data['nama_ibu'],
					':alamat' => $data['alamat'],
					':status_rumah' => $data['status_rumah'],
					':sewa_rumah' => $data['sewa_rumah'],
					':no_telp' => $data['no_telp'],

					// data suami-istri
					':nama_suami_istri' => $data['nama_suami_istri'],
					':tmpt_lahir_suami_istri' => $data['tmpt_lahir_suami_istri'],
					':tgl_lahir_suami_istri' => $data['tgl_lahir_suami_istri'],
					':pekerjaan_suami_istri' => $data['pekerjaan_suami_istri'],

					':pilih_pekerjaan' => $data['pilih_pekerjaan'],

					// data pekerjaan
					':pekerjaan' => $data['pekerjaan'],
					':bidang_usaha_pekerjaan' => $data['bidang_usaha_pekerjaan'],
					':lama_bekerja' => $data['lama_bekerja'],
					':nama_perusahaan' => $data['nama_perusahaan'],
					':jabatan' => $data['jabatan'],
					':alamat_perusahaan' => $data['alamat_perusahaan'],
					':no_telp_perusahaan' => $data['no_telp_perusahaan'],
					':penghasilan_bersih_pekerjaan' => $data['penghasilan_bersih_pekerjaan'],
					':rata2_biaya_hidup' => $data['rata2_biaya_hidup'],

					// data pekerjaan - usaha
					':bentuk_usaha' => $data['bentuk_usaha'],
					':prosentase_kepemilikan' => $data['prosentase_kepemilikan'],
					':usaha_sejak' => $data['usaha_sejak'],
					':bidang_usaha' => $data['bidang_usaha'],
					':jumlah_karyawan' => $data['jumlah_karyawan'],
					':alamat_usaha' => $data['alamat_usaha'],
					':no_telp_usaha' => $data['no_telp_usaha'],
					':penghasilan_bersih' => $data['penghasilan_bersih'],
					
					// data agunan
					':jenis' => $data['jenis'],
					':tipe_kendaraan' => $data['tipe_kendaraan'],
					':warna' => $data['warna'],
					':tahun' => $data['tahun'],
					':no_bpkb' => $data['no_bpkb'],
					':atas_nama' => $data['atas_nama'],
					':status_agunan' => $data['status_agunan'],
					':imb' => $data['imb'],
					':ada' => $data['ada'],
					':alamat_agunan' => $data['alamat_agunan'],

					// data keluarga
					':nama_keluarga' => $data['nama_keluarga'],
					':alamat_keluarga' => $data['alamat_keluarga'],
					':no_telp_keluarga' => $data['no_telp_keluarga'],
					':hubungan_keluarga' => $data['hubungan_keluarga'],
					
					// data upload
					':file_ktp_pemohon' => $data['file_ktp_pemohon'],
					':file_ktp_suami_istri' => $data['file_ktp_suami_istri'],
					':file_kk' => $data['file_kk'],
					':file_slip_gaji' => $data['file_slip_gaji'],
					':file_stnk' => $data['file_stnk'],
					':file_nota_pajak' => $data['file_nota_pajak'],
					':file_bpkb' => $data['file_bpkb'],
					':file_faktur' => $data['file_faktur'],
					':file_kwintasi_jual_beli' => $data['file_kwintasi_jual_beli']
				)
			);
			$statement->closeCursor();
		}

		/**
		 * 
		 */
		public function insert_id_fpk($id){
			try{
				$this->koneksi->beginTransaction();
				$query = "INSERT INTO id_fpk (id_fpk) VALUES (:id_fpk)";
				$statement = $this->koneksi->prepare($query);
				$statement->execute(
					array(
						':id_fpk' => $id,
					)
				);
				$statement->closeCursor();
				$this->koneksi->commit();

				return array(
					'success' => true,
					'error' => NULL
				);
			}
			catch(PDOException $e){
				$this->koneksi->rollback();
				return array(
					'success' => false,
					'error' => $e->getMessage()
				);
			}
		}

		/**
		 * 
		 */
		public function delete($id){
			try{
				$this->koneksi->beginTransaction();
				
				$query = "DELETE FROM permohonan_kredit WHERE id = :id";
				$statement = $this->koneksi->prepare($query);
				$statement->execute(
					array(
						':id' => $id,
					)
				);
				$statement->closeCursor();

				$this->koneksi->commit();

				return array(
					'success' => true,
					'error' => NULL
				);
			}
			catch(PDOException $e){
				$this->koneksi->rollback();
				return array(
					'success' => false,
					'error' => $e->getMessage()
				);
			}
		}

		/**
		 * 
		 */
		public function __destruct(){
			$this->closeConnection($this->koneksi);
		}

	}