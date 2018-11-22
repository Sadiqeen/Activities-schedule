<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    require '../php/user.class.php';
    
    $ps = isset($_POST['ps']) ? $_POST['ps'] : "";

    if (User::change_pass($conn, $ps)) {
        echo json_encode('1', JSON_UNESCAPED_UNICODE ); //add success
    } else {
        echo json_encode('Error occor', JSON_UNESCAPED_UNICODE );
    }