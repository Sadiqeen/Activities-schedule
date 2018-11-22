<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    require '../php/user.class.php';
    require '../php/auth.class.php';
    
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $dp = isset($_POST['dp']) ? $_POST['dp'] : "";

    if (User::update_user($conn, $name, $email, $dp)) {
        Auth::create_session($conn, $email);
        echo json_encode(1, JSON_UNESCAPED_UNICODE );
    } else {
        echo json_encode(0, JSON_UNESCAPED_UNICODE );
    }