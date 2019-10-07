<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    require '../php/ogn.class.php';
    
    $dp_name = isset($_POST['dp_name']) ? $_POST['dp_name'] : "";
    $fc_id = isset($_POST['fc_id']) ? $_POST['fc_id'] : "";

    if ($data = DBrender::add_departments($conn, $dp_name, $fc_id)) {
        echo json_encode(1, JSON_UNESCAPED_UNICODE );
    } else {
        echo json_encode(0, JSON_UNESCAPED_UNICODE );
    }

    