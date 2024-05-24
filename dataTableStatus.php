<?php
require 'connection.php';

$array = array();
function utf8ize($d)
{
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string($d)) {
        return utf8_encode($d);
    }
    return $d;
}

if (isset($_POST['useridStatus'])) {
    $useridStatus = $_POST['useridStatus'];
    $checkPart = "SELECT * FROM ppk WHERE userid = '$useridStatus' ORDER BY datesubmit ASC";
    $result = $conn->query($checkPart);

    while ($row = mysqli_fetch_assoc($result)) {
        $array[] = $row;
    }

    $dataset = array(
        "echo" => 1,
        "totalrecords" => count($array),
        "totaldisplayrecords" => count($array),
        "data" => $array
    );

    echo json_encode(utf8ize($dataset));
}
