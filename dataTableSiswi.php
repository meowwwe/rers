<?php
    require 'connection.php';

    $array = array();

    $checkPart = "SELECT *,u.userid FROM users u LEFT JOIN register r ON u.userid = r.userid  WHERE useric % 2 = 0 AND userpart != 1 AND userlevelid = 2 AND edaftar = 0 AND userpart > 0";
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
