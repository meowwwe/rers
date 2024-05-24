<?php
    require 'connection.php';

    $array = array();

    $checkPart = "SELECT *,u.userid FROM users u RIGHT JOIN registercovid r ON u.userid = r.userid";
    $result = $conn->query($checkPart);
    
        while($row = mysqli_fetch_assoc($result)){
            $array[] = $row;
        }
    
        $dataset = array(
            "echo" => 1,
            "totalrecords" => count($array),
            "totaldisplayrecords" => count($array),
            "data" => $array
        );
        
        echo json_encode($dataset);
