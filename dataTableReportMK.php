<?php

require 'connection.php';

$array = array();

$register = "SELECT *,GROUP_CONCAT(u.userid) as 'useridcombine', GROUP_CONCAT(u.username) as 'usernamecombine', GROUP_CONCAT(u.userprogramme) as 'userprogrammecombine', GROUP_CONCAT(u.userpart) as 'userpartcombine', GROUP_CONCAT(u.userphoneno) as 'userphonenocombine',GROUP_CONCAT(r.blockname) as 'rblockname', GROUP_CONCAT(r.floornum) as 'rfloornum', GROUP_CONCAT(r.housenum) as 'rhousenum', GROUP_CONCAT(r.roomname) as 'rroomname' FROM register r INNER JOIN users u ON r.userid = u.userid WHERE blockname = '04A' GROUP BY r.floornum,r.housenum  ORDER BY r.floornum ,r.housenum ,r.roomname";
$result = $conn->query($register);


while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
    $combineid = explode(",", $row["useridcombine"]);
    $combinename = explode(",", $row["usernamecombine"]);
    $combineprogramme = explode(",", $row["userprogrammecombine"]);
    $combinepart = explode(",", $row["userpartcombine"]);
    $combinephoneno = explode(",", $row["userphonenocombine"]);

    $blockname = explode(",", $row['rblockname']);
    $floornum = explode(",", $row['rfloornum']);
    $housenum = explode(",", $row['rhousenum']);
    $roomname = explode(",", $row['rroomname']);

    $studentArray = array();
}

$dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
);

echo json_encode($dataset);
