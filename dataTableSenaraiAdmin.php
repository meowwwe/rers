<?php
    require 'connection.php';

    session_start();

    $array = array();

        $register = "SELECT * FROM users WHERE userlevelid = 1 OR userlevelid = 4 OR userlevelid = 5 OR userlevelid = 3 AND userid != '".$_SESSION['userid']."'";
        $result = $conn->query($register);
    
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
