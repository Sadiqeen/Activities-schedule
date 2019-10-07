<?php

    class Event {

        public function add_event($conn, $data) {
            $a = 0;
            $approve = 0;
            if ($_SESSION['position'] == 1) {
                $approve = 1;
            }
            $title = $data['title'];
            $detail = $data['detail'];
            $url = $data['url'];
            $startDate = $data['startDate'];
            $endDate = $data['endDate'];
            $department = $data['department'];
            $place = $data['place'];
            $user_id = $_SESSION["id"];
            $stmt = $conn->prepare("INSERT INTO `activities`(`name`, `start_time`, `end_time`, `detail`, `url`, `is_all_day`, `Department_id`, `Users_id`,`place`,`approve`) 
                            VALUES (?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssiiisi", $title, $startDate, $endDate, $detail, $url,  $a,  $department, $user_id,$place,$approve);
            if ($stmt->execute()) {
                return true;
            } else {
                return  false;
            }
            $conn = null;
        }

        public function delete_event($conn, $id) {
            $stmt = $conn->prepare("DELETE FROM `activities` WHERE `id` = ?");
            $stmt->bind_param('s', $id);
            if ($stmt->execute()) {
            return true;
            } else {
            return  false;
            }
            $conn = null;
        }

        public function get_event($conn, $id) {
            $stmt = $conn->prepare("SELECT * FROM `activities` WHERE `id` = ?");
            $stmt->bind_param('s', $id);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                while($rs=$result->fetch_object()){
                    $data[] = array(
                            'id' => $rs->id,
                            'name' => $rs->name,
                            'start' => date("d/m/Y H:i", strtotime($rs->start_time)),
                            'end' => date("d/m/Y H:i", strtotime($rs->end_time)),
                            'detail' => $rs->detail,
                            'url' => $rs->url,
                            'place' => $rs->place,
                        );
                }
                return $data;
            } else {
                return  false;
            }
            
            $conn = null;
        }

        public function edit_event($conn, $data) {
            $id = $data['id'];
            $title = $data['title'];
            $detail = $data['detail'];
            $url = $data['url'];
            $startDate = $data['startDate'];
            $endDate = $data['endDate'];
            $place = $data['place'];
            $stmt = $conn->prepare("UPDATE `activities` SET `name`=? ,`start_time`=?,`end_time`=?,`detail`=?,`url`=?, `place`=? WHERE `id` = ?");
            $stmt->bind_param("ssssssi", $title, $startDate, $endDate, $detail, $url, $place, $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return  false;
            }
            $conn = null;
        }

        public function approve_event($conn, $id) {
            $stmt = $conn->prepare("UPDATE `activities` SET `approve` = 1 WHERE `id` = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return  false;
            }
            $conn = null;
        }

        public function reject_event($conn, $id) {
            $stmt = $conn->prepare("UPDATE `activities` SET `approve` = 2 WHERE `id` = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return  false;
            }
            $conn = null;
        }
    }