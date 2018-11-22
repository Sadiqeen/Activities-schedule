<?php

    class Auth {

        public function check_email($conn, $email) {

            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
              echo json_encode($stmt->execute() , JSON_UNESCAPED_UNICODE );
            }
            $conn = null;
        }

        public function check_password($conn, $email, $pass) {

            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $result=mysqli_fetch_array($result);
            if (password_verify ($pass, $result['password'] )) {
                return true;
            } else {
                return false;
            }
            $conn = null;
        }

        public function create_session($conn, $email) {

            $stmt = $conn->prepare("SELECT 
                                    users.id as id,
                                    users.name as name, 
                                    users.email as email, 
                                    departments.dname as department, 
                                    faculties.fname as faculty, 
                                    departments.id as d_id, 
                                    faculties.id as f_id, 
                                    users.position
                                    FROM users
                                    INNER JOIN departments ON users.departments_id = departments.id 
                                    INNER JOIN faculties ON faculties.id = departments.faculties_id 
                                    WHERE users.email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $result=mysqli_fetch_array($result);
            $_SESSION["id"] = $result['id'];
            $_SESSION["name"] = $result['name'];
            $_SESSION["email"] = $result['email'];
            $_SESSION["position"] = $result['position'];
            $_SESSION["department"] = $result['department'];
            $_SESSION["faculty"] = $result['faculty'];
            $_SESSION["d_id"] = $result['d_id'];
            $_SESSION["f_id"] = $result['f_id'];
            $conn = null;
        }

    }