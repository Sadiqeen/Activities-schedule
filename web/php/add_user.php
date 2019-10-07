<?php
       session_start();
       require '../db-config.php'; //$conn pdo connect
       require '../php/user.class.php';
       
       $name = isset($_POST['name']) ? $_POST['name'] : "";
       $email = isset($_POST['email']) ? $_POST['email'] : "";
       $pass = isset($_POST['pass']) ? $_POST['pass'] : "";
       $position = isset($_POST['position']) ? $_POST['position'] : "";
       $dp = isset($_POST['dp']) ? $_POST['dp'] : "";
       
       $password = password_hash($pass,PASSWORD_DEFAULT);
       
       $data = array (
           'name' => $name,
           'email' => $email,
           'pass' => $password,
           'position' => $position,
           'dp' => $dp,
       );
   
       // echo json_encode($data, JSON_UNESCAPED_UNICODE ); //add success
   
       if (User::add_user($conn, $data)) {
           echo json_encode('1', JSON_UNESCAPED_UNICODE ); //add success
       } else {
           echo json_encode('Error occor', JSON_UNESCAPED_UNICODE );
       }