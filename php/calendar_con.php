<?php
    session_start();
    require '../db-config.php'; //$conn pdo connect
    
    $start = isset($_GET['start']) ? $_GET['start'] : "";
    $end = isset($_GET['end']) ? $_GET['end'] : "";
    $fc = isset($_GET['fc']) ? $_GET['fc'] : "";
    $dp = isset($_GET['dp']) ? $_GET['dp'] : "";

    if ($fc == 1 && $dp == 1) {
        $stmt = $conn->prepare("SELECT  activities.id,
                                    activities.name,
                                    activities.detail,
                                    activities.start_time,
                                    activities.end_time,
                                    activities.url,
                                    activities.is_all_day,
                                    faculties.fname,
                                    departments.dname,
                                    faculties.color
                             FROM activities
                            left join departments on (activities.Department_id = departments.id)
                            left join faculties on (departments.Faculties_id = faculties.id)
                            WHERE activities.start_time >= ? AND activities.end_time <= ? AND activities.approve = 1   ORDER by id");
        $stmt->bind_param("ss", $start, $end);
    } else if ($dp == 1 || $dp == 2 || $dp == 3 || $dp == 4 || $dp == 5 || $dp == 6) {
        $stmt = $conn->prepare("SELECT  activities.id,
                                    activities.name,
                                    activities.detail,
                                    activities.start_time,
                                    activities.end_time,
                                    activities.url,
                                    activities.is_all_day,
                                    faculties.fname,
                                    departments.dname,
                                    faculties.color
                             FROM activities
                            left join departments on (activities.Department_id = departments.id)
                            left join faculties on (departments.Faculties_id = faculties.id)
                            WHERE activities.start_time >= ? AND activities.end_time <= ? AND faculties.id = ? AND activities.approve = 1  ORDER by id");
        $stmt->bind_param("ssi", $start, $end, $fc);
    } else {
        $stmt = $conn->prepare("SELECT  activities.id,
                                    activities.name,
                                    activities.detail,
                                    activities.start_time,
                                    activities.end_time,
                                    activities.url,
                                    activities.is_all_day,
                                    faculties.fname,
                                    departments.dname,
                                    faculties.color
                             FROM activities
                            left join departments on (activities.Department_id = departments.id)
                            left join faculties on (departments.Faculties_id = faculties.id)
                            WHERE activities.start_time >= ? AND activities.end_time <= ? AND departments.id = ? AND activities.approve = 1 ORDER by id");
        $stmt->bind_param("ssi", $start, $end, $dp);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    // $result=mysqli_fetch_array($result);
    $json_data = array();
    while($rs=$result->fetch_object()){
        $json_data[]=array(  
            "id"=>$rs->id,
            "title"=>$rs->name,
            "detail" => $rs->detail,
            "start"=>$rs->start_time,
            "end"=>$rs->end_time,
            "url"=>$rs->url,
            "fname"=>$rs->fname,
            "dname"=>$rs->dname,
            "backgroundColor"=>$rs->color,
            "borderColor"=>$rs->color,
            "allDay"=>($rs->is_all_day==1)?true:false      
        );    
    }
    
    echo json_encode( $json_data, JSON_UNESCAPED_UNICODE );