<?php

    class DBrender {

        public function get_faculties($conn) {
            $stmt = $conn->prepare("SELECT * FROM Faculties");
            $stmt->execute();
            $result = $stmt->get_result();
            while($rs=$result->fetch_object()){
               echo "<option value='".$rs->id."'>".$rs->fname."</option>";
            }
        }

        public function get_departments($conn) {
            $stmt = $conn->prepare("SELECT * FROM Departments");
            $stmt->execute();
            $result = $stmt->get_result();
            while($rs=$result->fetch_object()){
               echo "<option value='".$rs->id."'>".$rs->dname."</option>";
            }
        }

        public function get_locations($conn) {
            $stmt = $conn->prepare("SELECT * FROM Locations");
            $stmt->execute();
            $result = $stmt->get_result();
            while($rs=$result->fetch_object()){
               echo "<option value='".$rs->id."'>".$rs->lname."</option>";
            }
        }

        public function get_faculties_setting($conn) {
            $stmt = $conn->prepare("SELECT * FROM Faculties");
            $stmt->execute();
            $result = $stmt->get_result();
            $i = 0;
            while($rs=$result->fetch_object()){
                if ($i == 0) {
                    echo '<li class="active bg-primary" data-id="'.$rs->id.'" onclick="change_department(this,'.$rs->id.')"><a href="#">'.$rs->fname.'</a></li>';
                } else {
                    echo '<li data-id="'.$rs->id.'"  onclick="change_department(this,'.$rs->id.')"><a href="#">'.$rs->fname.'</a></li>';
                }
                $i++;
            }
        }

        public function get_departments_setting($conn, $id) {
            $stmt = $conn->prepare("SELECT d.id, d.dname, f.color FROM departments d, Faculties f WHERE d.Faculties_id = ? AND d.Faculties_id = f.id");
            $stmt->bind_param('s', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = array();
            while($rs=$result->fetch_object()){
                $data[] = array(
                    'id' => $rs->id,
                    'dname' => $rs->dname,
                    'color' => $rs->color,
                );

            }
            return $data;
        }

        public function add_departments($conn, $dp_name, $fc_id) {
            $stmt = $conn->prepare("INSERT INTO `departments`(`dname`, `Faculties_id`) VALUES (?,?)");
            $stmt->bind_param('si', $dp_name, $fc_id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete_departments($conn, $dp_id) {
            $stmt = $conn->prepare("DELETE FROM `departments` WHERE id = ?");
            $stmt->bind_param('i', $dp_id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function get_faculties_user($conn) {
            $stmt = $conn->prepare("SELECT * FROM Faculties");
            $stmt->execute();
            $result = $stmt->get_result();
            $data = array();
            while($rs=$result->fetch_object()){
                $data[] = array(
                    'id' => $rs->id,
                    'fname' => $rs->fname,
                );
            }
            return $data;
        }

        public function get_departments_users($conn) {
            $stmt = $conn->prepare("SELECT * FROM Departments");
            $stmt->execute();
            $result = $stmt->get_result();
            $data = array();
            while($rs=$result->fetch_object()){
                $data[] = array(
                    'id' => $rs->id,
                    'dname' => $rs->dname,
                );
            }
            return $data;
        }

        public function fc_color($conn) {
            $stmt = $conn->prepare("SELECT * FROM Faculties");
            $stmt->execute();
            $result = $stmt->get_result();
            while($rs=$result->fetch_object()){
                echo "<div class='col-md-2'>";
                echo "<button class='btn btn-block' style='background-color:".$rs->color."'>".$rs->fname."</button>";
                echo "</div>";
            }
        }
    }