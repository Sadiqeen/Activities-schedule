<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    require '../php/ogn.class.php';
    
    if ($data = DBrender::get_faculties_user($conn)) {
        echo json_encode($data, JSON_UNESCAPED_UNICODE );
    } else {
        echo json_encode(0, JSON_UNESCAPED_UNICODE );
    }

    