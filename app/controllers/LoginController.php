<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");

	/**
	 * Class login.
	 * Proses melakukan login ke sistem, lockscreen dan logout 
	 */
	class Login extends Controller {

		private $success = false;
		private $username;
		private $password;
		private $message = NULL;
		private $notif = array();
		private $error = array();

		/**
		 * Method __construct.
		 * Load class Auth
		 */
		public function __construct() {
			$this->validation();
			$this->auth();
			$this->model('UserModel');
		}

		/**
		 * Method index
		 * Akses utama controller login
		 */
		public function index() {
			if($this->auth->isLogin()) $this->redirect(BASE_URL.'permohonan-kredit-admin');
			else {
				$_SESSION['sess_lockscreen'] = false;
				
				if($_SERVER['REQUEST_METHOD'] == "POST") $this->doLogin(); // jika request post login
				// jika bukan, atau hanya menampilkan halaman login
				else {
					$this->view('login');
					die();
				} 
			}
		}

		/**
		 * Method doLogin
		 * fungsi login untuk sistem
		 * pengecekan user dan password berdasarkan jenis user
		 * pemberian hak akses berdasarkan level
		 * set session default
		 * @param callback {boll}
		 * @return result {object} array berupa json
		 */
		private function doLogin($callback = false) {
			$this->username = isset($_POST['username']) ? $this->validation->validInput($_POST['username'], false) : false;
			$this->password = isset($_POST['password']) ? $this->validation->validInput($_POST['password'], false) : false;

			// get data user
			$dataUser = $this->UserModel->getUser($this->username);

			if(!$dataUser){
				$this->error = array(
					'username' => 'Username atau Password Anda Salah',
					'password' => 'Username atau Password Anda Salah'
				);
				$this->message = 'Login Gagal, Username atau Password Anda Salah';
				$this->notif = array(
					'title' => 'Pesan Error',
					'message' => $this->message,
					'type' => 'error',
					'plugin' => 'toastr'
				);
			}
			else{
				if(password_verify($this->password, $dataUser['password'])){
					$this->setSession();
					$this->success = true;
				}
				else{
					$this->error = array(
						'username' => 'Username atau Password Anda Salah',
						'password' => 'Username atau Password Anda Salah'
					);
					$this->message = 'Login Gagal, Username atau Password Anda Salah';
					$this->notif = array(
						'title' => 'Pesan Error',
						'message' => $this->message,
						'type' => 'error',
						'plugin' => 'toastr'
					);
				}
			}

			$result = array(
				'success' => $this->success,
				'error' => $this->error,
				'notif' => $this->notif,
				'message' => $this->message,
				'callback' => $callback
			);

			echo json_encode($result);
		}

		/**
		 * Method setSession
		 * Proses set session login
		 */
		private function setSession(){
			$foto = BASE_URL.'assets/images/user/default.jpg';
			
			$_SESSION['sess_login'] = true;
			$_SESSION['sess_lockscreen'] = false;
			$_SESSION['sess_username'] = $this->username;
			$_SESSION['sess_foto'] = $foto;
			$_SESSION['sess_welcome'] = true;
			$_SESSION['sess_timeout'] = date('Y-m-d H:i:s', time()+(60*60)); // 1 jam idle
		}

		/**
		 * Method lockscreen
		 * Proses lockscreen
		 * set ulang session login dan session lockscreen
		 */
		public function lockscreen() {
			$lockscreen = isset($_SESSION['sess_lockscreen']) ? $_SESSION['sess_lockscreen'] : false;
			$callback = isset($_GET['callback']) ? $_GET['callback'] : false;

			if(!$lockscreen) $this->redirect(BASE_URL.'permohonan-kredit-admin');
			else{
				if($_SERVER['REQUEST_METHOD'] == "POST") $this->doLogin($callback); // jika request post login
				// jika bukan, atau hanya menampilkan halaman login
				else {
					$this->view('lockscreen');
					die();
				}
			}
		}

		/**
		 * Method logout
		 * Proses logout dan menghapus semua session yang ada
		 */
		public function logout() {
			session_unset();
			session_destroy();

			$this->redirect(BASE_URL.'permohonan-kredit-admin');
		}
	}
