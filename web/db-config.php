<?php

    $dbInfo['host']= getenv('HOST');
    $dbInfo['user'] = getenv('USER');
    $dbInfo['pass'] = getenv('PASS');
    $dbInfo['db'] = getenv('DB');

	$conn = new mysqli($dbInfo['host'], $dbInfo['user'], $dbInfo['pass'], $dbInfo['db']);

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	mysqli_set_charset($conn,"utf8");