<?php
    require 'connection.php';

    $array = array();

    if(isset($_POST['tt2'])){
        $query = "SELECT * FROM composite WHERE blockname = '09A' AND floornum = '".$_POST['tt2']."'";
        $result = mysqli_query($conn, $query);
    
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
        
    }
    else {
        $query = "SELECT * FROM composite WHERE blockname = '09A' AND floornum = 1";
        $result = mysqli_query($conn, $query);
    
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

    }


?>
