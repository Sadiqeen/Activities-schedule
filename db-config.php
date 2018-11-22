<?php

    $dbInfo['host']= "localhost";
    $dbInfo['user'] = "root";
    $dbInfo['pass'] = "";
    $dbInfo['db'] = "activities";

	$conn = new mysqli($dbInfo['host'], $dbInfo['user'], $dbInfo['pass'], $dbInfo['db']);

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	mysqli_set_charset($conn,"utf8");