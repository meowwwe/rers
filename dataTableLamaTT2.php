<?php

require 'connection.php';

$array = array();

$register = "SELECT * FROM register r JOIN users u ON r.userid = u.userid WHERE blockname = '09A' ORDER BY blockname, floornum, housenum, roomname ASC";
$result = $conn->query($register);

while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

$dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
);

echo json_encode($dataset);
