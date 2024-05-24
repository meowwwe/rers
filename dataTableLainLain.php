<?php

require 'connection.php';

$array = array();

$register = "SELECT *, GROUP_CONCAT(p.ppkid), GROUP_CONCAT(f.familymembersname), GROUP_CONCAT(f.fee), GROUP_CONCAT(f.institutename) as belajarmana
FROM ppk p
JOIN family f
ON p.ppkid = f.ppkid
JOIN users u 
ON u.userid = f.userid
WHERE p.ppkstatus = 'PENDING' AND p.submissiontype = 'PENGECUALIAN' AND p.usercategory = 'Lain - Lain' GROUP BY f.ppkid,f.ppkid";
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
