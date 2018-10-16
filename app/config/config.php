<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");

	if(TYPE === "DEVELOPMENT_LOCAL"){
		// config base url
		define('BASE_URL', 'http://localhost/permohonan-kredit-bprbmu/'); // isi path dari web app
		define('SITE_URL', 'https://bprbmu.co.id/'); // path utama web app
		define('DEFAULT_CONTROLLER', 'permohonan-kredit'); // default controller yg diakses pertama kali
		define('VERSION', '');

		// config database
		define('DB_HOST', 'localhost'); // host db
		define('DB_USERNAME', 'root'); // username db
		define('DB_PASSWORD', ''); // password db
		define('DB_NAME', 'permohonan-kredit'); // db yang digunakan
	}
	else if(TYPE === "DEVELOPMENT_LIVE"){
		// config base url
		define('BASE_URL', 'http://localhost/permohonan-kredit-bprbmu/'); // isi path dari web app
		define('SITE_URL', 'https://bprbmu.co.id/'); // path utama web app
		define('DEFAULT_CONTROLLER', 'permohonan-kredit'); // default controller yg diakses pertama kali
		define('VERSION', '');

		// config database
		define('DB_HOST', 'localhost'); // host db
		define('DB_USERNAME', 'root'); // username db
		define('DB_PASSWORD', ''); // password db
		define('DB_NAME', 'permohonan-kredit'); // db yang digunakan
	}
	else if(TYPE === "PRODUCTION"){
		// config base url
		define('BASE_URL', 'https://bprbmu.co.id/pages/permohonan-kredit-bprbmu/'); // isi path dari web app
		define('SITE_URL', 'https://bprbmu.co.id/'); // path utama web app
		define('DEFAULT_CONTROLLER', 'permohonan-kredit'); // default controller yg diakses pertama kali
		define('VERSION', '');

		// config database
		define('DB_HOST', 'localhost'); // host db
		define('DB_USERNAME', 'root'); // username db
		define('DB_PASSWORD', ''); // password db
		define('DB_NAME', 'permohonan-kredit'); // db yang digunakan
	}
	else{
		die(json_encode(array(
			'success' => false,
			'message' => 'Access Denied',
			'error' => '403'
		)));
	}
