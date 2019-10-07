<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    require '../php/ogn.class.php';
    
    $dp_id = isset($_POST['dp_id']) ? $_POST['dp_id'] : "";

    if ($data = DBrender::delete_departments($conn, $dp_id)) {
        echo json_encode(1, JSON_UNESCAPED_UNICODE );
    } else {
        echo json_encode(0, JSON_UNESCAPED_UNICODE );
    }

    