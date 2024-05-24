<?php
include 'connection.php';

$array = array();

if (isset($_POST['hantarppk'])) {

    $hantarppk = mysqli_real_escape_string($conn, $_POST['hantarppk']);

    $fami = "SELECT * FROM ppk p JOIN family f ON p.ppkid = f.ppkid WHERE p.ppkid = '" . $_POST['hantarppk'] . "'";
    $result = mysqli_query($conn, $fami);

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
} else {

    if(isset($_POST['hantarppk'])){
        $fami = "SELECT * FROM ppk p JOIN family f ON p.ppkid = f.ppkid WHERE f.ppkid = '" . $_POST['hantarppk'] . "'";
        $result = mysqli_query($conn, $fami);
    
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
    } else {
        echo "";
    }
}

if (isset($_POST['ppkid'])) {
    $tokenppk = mysqli_real_escape_string($conn, $_POST['ppkid']);

    $query = "SELECT * FROM ppk WHERE ppkid = '$tokenppk'";
    $result = $conn->query($query);

    if (mysqli_num_rows($result) == 1) {

        $ppkdata = mysqli_fetch_array($result);

        $res = [
            'status' => 100,
            'message' => 'Rekod Wujud !',
            'data' => $ppkdata,
        ];

        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 200,
            'message' => 'Rekod Tidak Wujud !',
        ];

        echo json_encode($res);
        return;
    }
}