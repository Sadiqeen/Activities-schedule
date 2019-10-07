<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    require '../php/user.class.php';
    
    $ps = isset($_POST['ps']) ? $_POST['ps'] : "";
    $u_id = isset($_POST['u_id']) ? $_POST['u_id'] : "";

    if (User::change_pass_user($conn, $ps, $u_id)) {
        echo json_encode('1', JSON_UNESCAPED_UNICODE ); //add success
    } else {
        echo json_encode('Error occor', JSON_UNESCAPED_UNICODE );
    }