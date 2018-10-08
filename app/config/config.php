<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");

	// config base url
	define('BASE_URL', 'http://localhost/rezza/'); // isi path dari web app
	define('SITE_URL', 'https://bprbmu.co.id/'); // path utama web app
	define('DEFAULT_CONTROLLER', 'permohonan-kredit-admin'); // default controller yg diakses pertama kali
	define('VERSION', '');

	// config database
	define('DB_HOST', 'localhost'); // host db
	define('DB_USERNAME', 'root'); // username db
	define('DB_PASSWORD', ''); // password db
	define('DB_NAME', 'permohonan-kredit'); // db yang digunakan
