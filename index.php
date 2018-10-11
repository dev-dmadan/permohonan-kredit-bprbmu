<?php
	date_default_timezone_set('Asia/Jakarta');
	session_start();

	define("BASE_PATH", true);
	define('ROOT', dirname(__FILE__)); // root file web
	define('DS', DIRECTORY_SEPARATOR); // pemisah direktori '\'

	/**
	 * DEFINE TYPE
	 * Harap diganti menyesuaikan kondisi aplikasi
	 * 
	 * DEVELOPMENT_LOCAL - untuk development local
	 * DELEVOPMET_LIVE - untuk development live/online
	 * PRODUCTION - untuk go live
	 */
	define("TYPE", "DEVELOPMENT_LOCAL");

	// load config
	require_once "app/config/config.php";
	require_once "app/config/route.php";
	require_once "app/library/Database.class.php"; 
	require_once "app/library/Controller.class.php";
	require_once "app/library/Page.class.php";
	require_once "app/library/Auth.class.php";
	require_once "app/library/Datatable.class.php";
	require_once "app/library/Helper.class.php";
	require_once "app/library/Validation.class.php";

	// load abstracts
	
	// load interfaces

	$request = isset($_SERVER['PATH_INFO']) ? preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']) : DEFAULT_CONTROLLER;

	$route = new Route();
	$route->setUri($request)->getController();

