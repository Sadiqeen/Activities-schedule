<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    require '../php/user.class.php';

    if ($data = User::get_user_detail($conn, $_SESSION['id'])) {
        echo json_encode($data, JSON_UNESCAPED_UNICODE );
    } else {
        echo json_encode(0, JSON_UNESCAPED_UNICODE );
    }