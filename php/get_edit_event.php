<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    require '../php/event.class.php';
    
    $id = isset($_POST['id']) ? $_POST['id'] : "";

    if ($data = Event::get_event($conn, $id)) {
        echo json_encode($data, JSON_UNESCAPED_UNICODE );
    } else {
        echo json_encode('Error occor', JSON_UNESCAPED_UNICODE );
    }