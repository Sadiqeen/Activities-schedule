<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    require '../php/event.class.php';
    
    $id = isset($_POST['id']) ? $_POST['id'] : "";
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $detail = isset($_POST['detail']) ? $_POST['detail'] : "";
    $url = isset($_POST['url']) ? $_POST['url'] : "";
    $startDate = isset($_POST['startDate']) ? $_POST['startDate'] : "";
    $endDate = isset($_POST['endDate']) ? $_POST['endDate'] : "";
    $place = isset($_POST['place']) ? $_POST['place'] : "";

    $data = array (
        'id' => $id,
        'title' => $name,
        'detail' => $detail,
        'url' => $url,
        'startDate' => $startDate,
        'endDate' => $endDate,
        'place' => $place,
    );

    if (Event::edit_event($conn, $data)) {
        echo json_encode('1', JSON_UNESCAPED_UNICODE ); //add success
    } else {
        echo json_encode('Error occor', JSON_UNESCAPED_UNICODE );
    }