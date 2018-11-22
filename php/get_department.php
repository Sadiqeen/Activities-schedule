<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    require '../php/ogn.class.php';
    
    $id = isset($_POST['id']) ? $_POST['id'] : "";

    if ($data = DBrender::get_departments_setting($conn, $id)) {
        echo json_encode($data, JSON_UNESCAPED_UNICODE );
    } else {
        echo json_encode(0, JSON_UNESCAPED_UNICODE );
    }

    