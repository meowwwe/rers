<?php

require 'connection.php';

$array = array();

$register = "SELECT * FROM users WHERE ehousemate = 1 AND useric % 2 = 0 AND userlevelid = 2";
$result = $conn->query($register);


while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;

    $studentArray = array();
}

$dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
);

echo json_encode($dataset);
