<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    require '../php/auth.class.php';
    
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $pass = isset($_POST['pass']) ? $_POST['pass'] : "";

    if (Auth::check_email($conn, $email)) {
        if (Auth::check_password($conn, $email, $pass)) {
            Auth::create_session($conn, $email);
            echo json_encode('1', JSON_UNESCAPED_UNICODE ); //Login correct
        } else {
            echo json_encode('2', JSON_UNESCAPED_UNICODE ); //Password incorrect
        }
    } else {
        echo json_encode('3', JSON_UNESCAPED_UNICODE ); //Email doesn't exist
    }