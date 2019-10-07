<?php

    $dbInfo['host']= getenv('REMOTE_ADDR');
    $dbInfo['user'] = getenv('REMOTE_ADDR');
    $dbInfo['pass'] = getenv('REMOTE_ADDR');
    $dbInfo['db'] = getenv('REMOTE_ADDR');

	$conn = new mysqli($dbInfo['host'], $dbInfo['user'], $dbInfo['pass'], $dbInfo['db']);

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	mysqli_set_charset($conn,"utf8");