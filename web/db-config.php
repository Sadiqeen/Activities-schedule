<?php
	// if (!defined('__ROOT__')) {
	// 	define('__ROOT__', $_SERVER['DOCUMENT_ROOT']); 
	// }
	// require_once __ROOT__.'/vendor/autoload.php';
	// use Dotenv\Dotenv;

	// $dotenv = Dotenv::create(__ROOT__);
	// $dotenv->load();

    $dbInfo['host']= getenv('HOST');
    $dbInfo['user'] = getenv('USER');
    $dbInfo['pass'] = getenv('PASS');
    $dbInfo['db'] = getenv('DB');
	print_r($dbInfo);
	$conn = new mysqli($dbInfo['host'], $dbInfo['user'], $dbInfo['pass'], $dbInfo['db']);

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	mysqli_set_charset($conn,"utf8");