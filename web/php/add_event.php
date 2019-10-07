<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    require '../php/event.class.php';
    
    $title = isset($_POST['title']) ? $_POST['title'] : "";
    $detail = isset($_POST['detail']) ? $_POST['detail'] : "";
    $url = isset($_POST['url']) ? $_POST['url'] : "";
    $startDate = isset($_POST['startDate']) ? $_POST['startDate'] : "";
    $endDate = isset($_POST['endDate']) ? $_POST['endDate'] : "";
    $faculty = isset($_POST['faculty']) ? $_POST['faculty'] : "";
    $department = isset($_POST['department']) ? $_POST['department'] : "";
    $place = isset($_POST['place']) ? $_POST['place'] : "";
    
    $data = array (
        'title' => $title,
        'detail' => $detail,
        'url' => $url,
        'startDate' => $startDate,
        'endDate' => $endDate,
        'faculty' => $faculty,
        'department' => $department,
        'place' => $place,
    );

    // echo json_encode($data, JSON_UNESCAPED_UNICODE ); //add success

    if (Event::add_event($conn, $data)) {
        echo json_encode('1', JSON_UNESCAPED_UNICODE ); //add success
    } else {
        echo json_encode('Error occor', JSON_UNESCAPED_UNICODE );
    }