<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    require '../php/user.class.php';
    
    $u_id = isset($_POST['u_id']) ? $_POST['u_id'] : "";

    if (User::delete_user($conn, $u_id)) {
        echo json_encode('1', JSON_UNESCAPED_UNICODE ); //add success
    } else {
        echo json_encode('Error occor', JSON_UNESCAPED_UNICODE );
    }