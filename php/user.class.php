<?php

    class User {
        public function get_user_detail($conn,$id) {
                            $stmt = $conn->prepare("SELECT 
                            users.id as id,
                            users.name as name, 
                            users.email as email, 
                            departments.id as d_id, 
                            faculties.id as f_id, 
                            users.position
                            FROM users
                            INNER JOIN departments ON users.departments_id = departments.id 
                            INNER JOIN faculties ON faculties.id = departments.faculties_id 
                            WHERE users.id = ?");
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = array();
            while($rs=$result->fetch_object()){
                $data[] = array(
                    'id' => $rs->id,
                    'name' => $rs->name,
                    'email' => $rs->email,
                    'faculty' => $rs->f_id,
                    'department' => $rs->d_id,
                );
            }
            return $data;
        }

        public function update_user($conn, $name, $email, $dp) {
            $id = $_SESSION['id'];
            $stmt = $conn->prepare("UPDATE `users` SET `name`=?,`email`=?,`departments_id`=? WHERE id = ?");
            $stmt->bind_param("ssii", $name, $email, $dp ,$id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function change_pass($conn, $ps) {
            $id = $_SESSION['id'];
            $ps_hash = password_hash($ps,PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE `users` SET `password`=? WHERE id = ?");
            $stmt->bind_param("si", $ps_hash ,$id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function add_user($conn, $data) {
            $name = $data['name'];
            $email = $data['email'];
            $pass = $data['pass'];
            $position = $data['position'];
            $dp = $data['dp'];

            $stmt = $conn->prepare("INSERT INTO `users`(`name`, `email`, `password`, `position`, `departments_id`) 
                                        VALUES (?,?,?,?,?)");
            $stmt->bind_param("sssii", $name, $email, $pass, $position, $dp);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function change_pass_user($conn, $ps, $u_id) {
            $ps_hash = password_hash($ps,PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE `users` SET `password`=? WHERE id = ?");
            $stmt->bind_param("si", $ps_hash ,$u_id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete_user($conn, $u_id) {
            $stmt = $conn->prepare("DELETE FROM `users` WHERE id = ?");
            $stmt->bind_param("i", $u_id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }