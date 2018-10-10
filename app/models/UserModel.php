<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");
	
	/**
	 * 
	 */
	class UserModel extends Database{
		
		protected $koneksi;

		/**
		 * 
		 */
		public function __construct(){
			$this->koneksi = $this->openConnection();
			$this->dataTable = new Datatable();
		}

		/**
		 * 
		 */
		public function getUser($username){
			$query = "SELECT * FROM user WHERE BINARY username = :username;";

			$statement = $this->koneksi->prepare($query);
			$statement->bindParam(':username', $username);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);

			return $result;
		}

		/**
		 * 
		 */
		public function __destruct(){
			$this->closeConnection($this->koneksi);
		}

	}