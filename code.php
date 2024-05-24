<?php

require 'connection.php';

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/src/Exception.php';
require 'vendor/src/PHPMailer.php';
require 'vendor/src/SMTP.php';

$mail = new PHPMailer(true);

if (isset($_POST['submit_ciptaAkaun'])) {

    $daftarnama = mysqli_real_escape_string($conn, strtoupper($_POST['daftarnama']));
    $daftaric = mysqli_real_escape_string($conn, $_POST['daftaric']);
    $daftarmatrik = mysqli_real_escape_string($conn, $_POST['daftarmatrik']);
    $daftarsemester = mysqli_real_escape_string($conn, $_POST['daftarsemester']);
    $daftarprogram = mysqli_real_escape_string($conn, strtoupper($_POST['daftarprogram']));
    $daftartelefon = mysqli_real_escape_string($conn, $_POST['daftartelefon']);
    $daftaremel = mysqli_real_escape_string($conn, $_POST['daftaremel']);
    $daftaricmd5 = mysqli_real_escape_string($conn, $_POST['daftaric']);

    function checkKewujudanUser($conn, $daftarmatrik)
    {
        $found = false;
        $register = "SELECT * FROM users WHERE userid = '$daftarmatrik'";
        $query = mysqli_query($conn, $register);
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    if (checkKewujudanUser($conn, $daftarmatrik)) {

        
        $query = "UPDATE users SET useric='$daftaric',username='$daftarnama',userpassword='" . md5($daftaricmd5) . "',userphoneno='$daftartelefon',userpart='$daftarsemester',useremail='$daftaremel',userprogramme='$daftarprogram' WHERE userid='$daftarmatrik'";
        $query_run = mysqli_query($conn, $query);

        $res = [
            'status' => 100,
            'message' => 'Akaun Sudah Wujud',
        ];

        echo json_encode($res);
        return;
    } else {

        $query = "INSERT INTO users VALUES('$daftarmatrik','$daftaric','$daftarnama','" . md5($daftaricmd5) . "','$daftartelefon','$daftarsemester','$daftaremel','$daftarprogram',0,0,2)";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {

            $res = [
                'status' => 200,
                'message' => 'Pendaftaran Pelajar Berjaya',
            ];

            echo json_encode($res);
            return;
        } else {

            $res = [
                'status' => 500,
                'message' => 'Pendaftaran Pelajar Gagal',
            ];

            echo json_encode($res);
            return;
        }
    }
}


if (isset($_POST['submit_ajaxLogin'])) {

    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users u JOIN userlevels ul ON u.userlevelid = ul.userlevelid WHERE u.userid='$uname' AND u.userpassword ='" . md5($pass) . "'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        if ($row['userid'] == $uname && $row['userpassword'] == md5($pass) && $row['userlevelid'] == 1 || $row['userlevelid'] == 3 || $row['userlevelid'] == 4 || $row['userlevelid'] == 5) {

            $_SESSION['userlogged'] = 1;
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['useremail'] = $row['useremail'];
            $_SESSION['userprogramme'] = $row['userprogramme'];
            $_SESSION['userphoneno'] = $row['userphoneno'];
            $_SESSION['userpart'] = $row['userpart'];
            $_SESSION['useric'] = $row['useric'];
            $_SESSION['userlevelid'] = $row['userlevelid'];

            $res = [
                'status' => 100,
                'message' => 'Berjaya Log Masuk Sebagai Admin',
            ];

            echo json_encode($res);
            return;
        } else if ($row['userid'] == $uname && $row['userpassword'] == md5($pass) && $row['userlevelid'] == 2) {
            $_SESSION['userlogged'] = 1;
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['useremail'] = $row['useremail'];
            $_SESSION['userprogramme'] = $row['userprogramme'];
            $_SESSION['userphoneno'] = $row['userphoneno'];
            $_SESSION['userpart'] = $row['userpart'];
            $_SESSION['useric'] = $row['useric'];
            $_SESSION['userlevelid'] = $row['userlevelid'];

            $res = [
                'status' => 200,
                'message' => 'Berjaya Log Masuk Sebagai Student',
            ];

            echo json_encode($res);
            return;
        }
    } else {
        $res = [
            'status' => 300,
            'message' => 'Akaun Tidak Wujud',
        ];

        echo json_encode($res);
        return;
    }
}

if (isset($_POST['submit_ajaxTarikhRumah'])) {

    $opendate = mysqli_real_escape_string($conn, $_POST['opendate']);
    $closedate = mysqli_real_escape_string($conn, $_POST['closedate']);

    $query = "UPDATE tarikhdaftar SET dateopen = '$opendate', dateclose = '$closedate' WHERE tarikhdaftarid = 1";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        $res = [
            'status' => 100,
            'message' => 'Penukaran Tarikh Berjaya',
        ];

        echo json_encode($res);
        return;
    } else {

        $res = [
            'status' => 200,
            'message' => 'Penukaran Tarikh Gagal',
        ];

        echo json_encode($res);
        return;
    }
}

if (isset($_POST['submit_ajaxSekat'])) {

    $blockname = mysqli_real_escape_string($conn, $_POST['blockname']);
    $floornum = mysqli_real_escape_string($conn, $_POST['floornum']);
    $housenum = mysqli_real_escape_string($conn, $_POST['housenum']);
    $roomname = mysqli_real_escape_string($conn, $_POST['roomname']);
    $tujuan = mysqli_real_escape_string($conn, $_POST['tujuan']);


    function checkUserID($conn, $userid)
    {
        $found = false;
        $register = "SELECT * FROM register WHERE userid = '" . $userid . "'";
        $qry = mysqli_query($conn, $register);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkBlock($conn, $blockname)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$blockname' AND  slotnum > 0 ";
        $query = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }
    function checkFloor($conn, $blockname, $floornum)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$blockname' AND floornum = '$floornum' AND slotnum > 0 ";
        $query = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }
    function checkHouse($conn, $blockname, $floornum, $housenum)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$blockname' AND floornum = '$floornum' AND housenum = '$housenum' AND slotnum > 0 ";
        $query = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }
    function checkRoom($conn, $blockname, $floornum, $housenum, $roomname)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$blockname' AND floornum = '$floornum' AND housenum = '$housenum' AND roomname = '$roomname' AND slotnum > 0 ";
        $query = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkSlot($conn)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE slotnum = 2 ";
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }



    if ($blockname != null && $floornum == null && $housenum == null && $roomname == null) {
        if (checkBlock($conn, $blockname)) {
            $res = [
                'status' => 100,
                'message' => 'Ada Block Lah',
            ];

            echo json_encode($res);
            return;
        } else {
            $sekatblock = "UPDATE composite SET rstatusid = '$tujuan' WHERE blockname = '$blockname'";
            $result = $conn->query($sekatblock);

            $res = [
                'status' => 200,
                'message' => 'Berjaya di Blok',
            ];

            echo json_encode($res);
            return;
        }
    } else if ($blockname != null && $floornum != null && $housenum == null && $roomname == null) {
        if (checkFloor($conn, $blockname, $floornum)) {
            $res = [
                'status' => 300,
                'message' => 'Ada Tingkat Lah',
            ];

            echo json_encode($res);
            return;
        } else {
            $sekatblock = "UPDATE composite SET rstatusid = '$tujuan' WHERE blockname = '$blockname' AND floornum = '$floornum'";
            $result = $conn->query($sekatblock);

            $res = [
                'status' => 400,
                'message' => 'Berjaya di Tingkat',
            ];

            echo json_encode($res);
            return;
        }
    } else if ($blockname != null && $floornum != null && $housenum != null && $roomname == null) {
        if (checkHouse($conn, $blockname, $floornum, $housenum)) {
            $res = [
                'status' => 500,
                'message' => 'Ada Rumah Lah',
            ];

            echo json_encode($res);
            return;
        } else {
            $sekatblock = "UPDATE composite SET rstatusid = '$tujuan' WHERE blockname = '$blockname' AND floornum = '$floornum' AND housenum = '$housenum'";
            $result = $conn->query($sekatblock);

            $res = [
                'status' => 600,
                'message' => 'Berjaya di Rumah',
            ];

            echo json_encode($res);
            return;
        }
    } else {
        if (checkRoom($conn, $blockname, $floornum, $housenum, $roomname)) {
            $res = [
                'status' => 700,
                'message' => 'Ada Bilik Lah',
            ];

            echo json_encode($res);
            return;
        } else {
            $sekatblock = "UPDATE composite SET rstatusid = '$tujuan' WHERE blockname = '$blockname' AND floornum = '$floornum' AND housenum = '$housenum' AND roomname = '$roomname'";
            $result = $conn->query($sekatblock);

            $res = [
                'status' => 800,
                'message' => 'Berjaya di Bilik',
            ];

            echo json_encode($res);
            return;
        }
    }
}

if (isset($_POST['submit_ajaxNyahsekat'])) {

    $blockname = mysqli_real_escape_string($conn, $_POST['blockname']);
    $floornum = mysqli_real_escape_string($conn, $_POST['floornum']);
    $housenum = mysqli_real_escape_string($conn, $_POST['housenum']);
    $roomname = mysqli_real_escape_string($conn, $_POST['roomname']);


    function checkUserID($conn, $userid)
    {
        $found = false;
        $register = "SELECT * FROM register WHERE userid = '" . $userid . "'";
        $qry = mysqli_query($conn, $register);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkBlock($conn, $blockname)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$blockname' AND  slotnum > 0 ";
        $query = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }
    function checkFloor($conn, $blockname, $floornum)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$blockname' AND floornum = '$floornum' AND slotnum > 0 ";
        $query = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }
    function checkHouse($conn, $blockname, $floornum, $housenum)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$blockname' AND floornum = '$floornum' AND housenum = '$housenum' AND slotnum > 0 ";
        $query = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }
    function checkRoom($conn, $blockname, $floornum, $housenum, $roomname)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$blockname' AND floornum = '$floornum' AND housenum = '$housenum' AND roomname = '$roomname' AND slotnum > 0 ";
        $query = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkSlot($conn)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE slotnum = 2 ";
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    if ($blockname != null && $floornum == null && $housenum == null && $roomname == null) {
        if (checkBlock($conn, $blockname)) {
            $res = [
                'status' => 100,
                'message' => 'Ada Block Lah',
            ];

            echo json_encode($res);
            return;
        } else {
            $sekatblock = "UPDATE composite SET rstatusid = 1 WHERE blockname = '$blockname'";
            $result = $conn->query($sekatblock);

            $res = [
                'status' => 200,
                'message' => 'Berjaya di Blok',
            ];

            echo json_encode($res);
            return;
        }
    } else if ($blockname != null && $floornum != null && $housenum == null && $roomname == null) {
        if (checkFloor($conn, $blockname, $floornum)) {
            $res = [
                'status' => 300,
                'message' => 'Ada Tingkat Lah',
            ];

            echo json_encode($res);
            return;
        } else {
            $sekatblock = "UPDATE composite SET rstatusid = 1 WHERE blockname = '$blockname' AND floornum = '$floornum'";
            $result = $conn->query($sekatblock);

            $res = [
                'status' => 400,
                'message' => 'Berjaya di Tingkat',
            ];

            echo json_encode($res);
            return;
        }
    } else if ($blockname != null && $floornum != null && $housenum != null && $roomname == null) {
        if (checkHouse($conn, $blockname, $floornum, $housenum)) {

            $res = [
                'status' => 500,
                'message' => 'Ada Rumah Lah',
            ];

            echo json_encode($res);
            return;
        } else {

            $sekatblock = "UPDATE composite SET rstatusid = 1 WHERE blockname = '$blockname' AND floornum = '$floornum' AND housenum = '$housenum'";
            $result = $conn->query($sekatblock);


            $res = [
                'status' => 600,
                'message' => 'Berjaya di Rumah',
            ];

            echo json_encode($res);
            return;
        }
    } else {
        if (checkRoom($conn, $blockname, $floornum, $housenum, $roomname)) {
            $res = [
                'status' => 700,
                'message' => 'Ada Bilik Lah',
            ];

            echo json_encode($res);
            return;
        } else {
            $sekatblock = "UPDATE composite SET rstatusid = 1 WHERE blockname = '$blockname' AND floornum = '$floornum' AND housenum = '$housenum' AND roomname = '$roomname'";
            $result = $conn->query($sekatblock);

            $res = [
                'status' => 800,
                'message' => 'Berjaya di Bilik',
            ];

            echo json_encode($res);
            return;
        }
    }
}

if (isset($_POST['submit_ajaxStudentUpdate'])) {

    $userid = mysqli_real_escape_string($conn, $_SESSION['userid']);
    $userpart = mysqli_real_escape_string($conn, $_POST['userpart']);
    $userphoneno = mysqli_real_escape_string($conn, $_POST['userphoneno']);
    $useremail = mysqli_real_escape_string($conn, $_POST['useremail']);

    $query = "UPDATE users SET useremail = '$useremail', userphoneno = '$userphoneno', userpart = '$userpart' WHERE userid = '$userid'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 100,
            'message' => 'Maklumat Pelajar Berjaya Dikemaskini',
        ];

        echo json_encode($res);
        return;
    } else {

        $res = [
            'status' => 200,
            'message' => 'Maklumat Pelajar Gagal Dikemaskini',
        ];

        echo json_encode($res);
        return;
    }
}

if (isset($_GET['compositeid'])) {

    $token = $_GET['compositeid'];
    $sql = "SELECT * FROM composite  WHERE compositeid = '$token'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $blockname = $row['blockname'];
            $floornum = $row['floornum'];
            $housenum = $row['housenum'];
            $roomname = $row['roomname'];
        }
    }

    function checkUserID($conn, $userid)
    {
        $found = false;
        $register = "SELECT * FROM register WHERE userid = '" . $userid . "'";
        $qry = mysqli_query($conn, $register);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkAvailability($conn, $housenum, $blockname, $floornum, $roomname)
    {
        $found = false;
        $availability = "SELECT * FROM register WHERE housenum = '" . $housenum . "' AND blockname = '" . $blockname . "' AND floornum = '" . $floornum . "' AND roomname = '" . $roomname . "'";
        $slots = "SELECT * FROM composite WHERE slotnum = 2 AND housenum = '" . $housenum . "' AND blockname = '" . $blockname . "' AND floornum = '" . $floornum . "' AND roomname = '" . $roomname . "'";

        $qry = mysqli_query($conn, $availability);
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkPart($conn, $userid)
    {
        $found = false;
        $checksem = "SELECT * FROM users WHERE useremail = null OR userphoneno = null AND userid = '$userid' ";

        $qry = mysqli_query($conn, $checksem);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkSlot($conn, $b, $f, $h, $r)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE slotnum = 2 AND blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r'";
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }


    function checkAvailabilityOld($conn, $currentb, $currentf, $currenth, $currentr)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$currentb' AND floornum = '$currentf' AND housenum = '$currenth' AND roomname = '$currentr' AND slotnum < 2";
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }


    function checkAvailabilityNew($conn, $b, $f, $h, $r)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r' AND slotnum = 2";
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }


    function checkSick($conn, $userid)
    {
        $found = false;
        $slots = "SELECT * FROM users WHERE userid = '$userid' AND usersick = 'WELL'";
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }


    function checkKuarantin($conn, $token)
    {
        $found = false;
        $composite = "SELECT * FROM composite WHERE compositeid = '$token' AND rstatusid = 4";
        $qry = mysqli_query($conn, $composite);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkPenuh($conn, $token)
    {
        $found = false;
        $composite = "SELECT * FROM composite WHERE compositeid = '$token' AND rstatusid = 2 AND slotnum = 2";
        $qry = mysqli_query($conn, $composite);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }


    function checkDateReg($conn)
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $todayDate = date('Y-m-d');
        $todayDate = date('Y-m-d', strtotime($todayDate));

        $checkDate = "SELECT * FROM tarikhdaftar";
        $resultDate = $conn->query($checkDate);
        if ($resultDate->num_rows > 0) {

            while ($row = $resultDate->fetch_assoc()) {
                $dateopen = date('Y-m-d', strtotime($row['dateopen']));
                $dateclose = date('Y-m-d', strtotime($row['dateclose']));
            }
        }

        $found = false;
        $register = "SELECT * FROM tarikhdaftar WHERE '$todayDate' BETWEEN '" . $dateopen . "' AND '" . $dateclose . "'";
        $qry = mysqli_query($conn, $register);
        $rowe = mysqli_num_rows($qry);

        if ($rowe > 0) {
            $found = true;
        }
        return $found;
    }

    $userid = $_SESSION['userid'];
    $userpart = $_SESSION['userpart'];


    if (checkUserID($conn, $userid)) {

        if (!checkDateReg($conn)) {
            $res = [
                'status' => 100,
                'message' => 'Permohonan Tidak Dibuka',
            ];

            echo json_encode($res);
            return;
        } else if (checkPenuh($conn, $token)) {
            $res = [
                'status' => 101,
                'message' => 'Ruangan Ini Telah Penuh',
            ];

            echo json_encode($res);
            return;
        } else {

            $checkUser = "SELECT * FROM register WHERE userid = '$userid'";
            $resultUser = $conn->query($checkUser);

            if ($resultUser->num_rows > 0) {
                while ($row = $resultUser->fetch_assoc()) {
                    $currentb = $row['blockname'];
                    $currentf = $row['floornum'];
                    $currenth = $row['housenum'];
                    $currentr = $row['roomname'];
                }
            }

            $checkBlock = "SELECT * FROM composite WHERE compositeid = '" . $_GET['compositeid'] . "'";
            $resultBlock = $conn->query($checkBlock);

            if ($resultBlock->num_rows > 0) {
                while ($row = $resultBlock->fetch_assoc()) {
                    $b = $row['blockname'];
                    $f = $row['floornum'];
                    $h = $row['housenum'];
                    $r = $row['roomname'];
                }
            }

            $updatelama = "UPDATE composite SET slotnum = slotnum - 1 WHERE blockname = '$currentb' AND floornum = '$currentf' AND housenum = '$currenth' AND roomname = '$currentr'";
            $result = $conn->query($updatelama);

            $updatebaru = "UPDATE composite SET slotnum = slotnum + 1 WHERE blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r'";
            $result = $conn->query($updatebaru);

            $updateRegister = "UPDATE register SET blockname = '$b', floornum = '$f', housenum = '$h', roomname = '$r' WHERE userid = $userid";
            $result = $conn->query($updateRegister);

            if (checkAvailabilityOld($conn, $currentb, $currentf, $currenth, $currentr)) {

                $updateComposite = "UPDATE composite SET rstatusid = 1 WHERE blockname = '$currentb' AND floornum = '$currentf' AND housenum = '$currenth' AND roomname = '$currentr' ";
                $result = $conn->query($updateComposite);
            }


            if (checkAvailabilityNew($conn, $b, $f, $h, $r)) {

                $updateComposite = "UPDATE composite SET rstatusid = 2 WHERE blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r' ";
                $result = $conn->query($updateComposite);

                $res = [
                    'status' => 300,
                    'message' => 'Penukaran Occupied',
                ];

                echo json_encode($res);
                return;
            } else {
                $updateComposite = "UPDATE composite SET rstatusid = 1 WHERE blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r' ";
                $result = $conn->query($updateComposite);
            }

            $res = [
                'status' => 400,
                'message' => 'Penukaran Berjaya',
            ];

            echo json_encode($res);
            return;
        }
    } else if (checkPart($conn, $userid)) {

        $res = [
            'status' => 800,
            'message' => 'Maklumat Tidak Lengkap, Sila Kemaskini Maklumat Anda',
        ];

        echo json_encode($res);
        return;
    } else {

        if (!checkDateReg($conn)) {
            $res = [
                'status' => 100,
                'message' => 'Permohonan Tidak Dibuka',
            ];

            echo json_encode($res);
            return;
        } else {

            $sql = "INSERT INTO register VALUES ('','" . $userid . "','" . $blockname . "','" . $floornum . "','" . $roomname . "','" . $housenum . "', null, null, 'BELUM', 'BELUM')";

            $slots = "UPDATE composite SET slotnum = slotnum + 1 WHERE housenum = '$housenum' AND blockname = '$blockname' AND floornum = '$floornum' AND roomname = '$roomname'";

            $result = $conn->query($sql);
            $result = $conn->query($slots);

            if (checkAvailability($conn, $housenum, $blockname, $floornum, $roomname)) {
                $composite = "UPDATE composite SET rstatusid = '2'  WHERE housenum = '$housenum' AND blockname = '$blockname' AND floornum = '$floornum' AND roomname = '$roomname'";

                $result = $conn->query($composite);
            }
            $res = [
                'status' => 900,
                'message' => 'Pendaftaran Berjaya',
            ];

            echo json_encode($res);
            return;
        }
    }
}

if (isset($_POST['compositeidAdmin']) && isset($_POST['userid'])) {

    $tokenCompositeID = $_POST['compositeidAdmin'];
    $tokenUserID = $_POST['userid'];

    $sql = "SELECT * FROM composite  WHERE compositeid = '$tokenCompositeID'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $blockname = $row['blockname'];
            $floornum = $row['floornum'];
            $housenum = $row['housenum'];
            $roomname = $row['roomname'];
        }
    }

    function checkUserID($conn, $tokenUserID)
    {
        $found = false;
        $register = "SELECT * FROM register WHERE userid = '$tokenUserID'";
        $qry = mysqli_query($conn, $register);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkAvailability($conn, $housenum, $blockname, $floornum, $roomname)
    {
        $found = false;
        $availability = "SELECT * FROM register WHERE housenum = '" . $housenum . "' AND blockname = '" . $blockname . "' AND floornum = '" . $floornum . "' AND roomname = '" . $roomname . "'";
        $slots = "SELECT * FROM composite WHERE slotnum = 2 AND housenum = '" . $housenum . "' AND blockname = '" . $blockname . "' AND floornum = '" . $floornum . "' AND roomname = '" . $roomname . "'";

        $qry = mysqli_query($conn, $availability);
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkPart($conn, $tokenUserID)
    {
        $found = false;
        $checksem = "SELECT * FROM users WHERE useremail = null OR userphoneno = null AND userid = '$tokenUserID' ";

        $qry = mysqli_query($conn, $checksem);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkSlot($conn, $b, $f, $h, $r)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE slotnum = 2 AND blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r'";
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }


    function checkAvailabilityOld($conn, $currentb, $currentf, $currenth, $currentr)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$currentb' AND floornum = '$currentf' AND housenum = '$currenth' AND roomname = '$currentr' AND slotnum < 2";
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }


    function checkAvailabilityNew($conn, $b, $f, $h, $r)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r' AND slotnum = 2";
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkPenuh($conn, $tokenCompositeID)
    {
        $found = false;
        $composite = "SELECT * FROM composite WHERE compositeid = '$tokenCompositeID' AND rstatusid = 2 AND slotnum = 2";
        $qry = mysqli_query($conn, $composite);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }


    function checkDateReg($conn)
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $todayDate = date('Y-m-d');
        $todayDate = date('Y-m-d', strtotime($todayDate));

        $checkDate = "SELECT * FROM tarikhdaftar";
        $resultDate = $conn->query($checkDate);
        if ($resultDate->num_rows > 0) {

            while ($row = $resultDate->fetch_assoc()) {
                $dateopen = date('Y-m-d', strtotime($row['dateopen']));
                $dateclose = date('Y-m-d', strtotime($row['dateclose']));
            }
        }

        $found = false;
        $register = "SELECT * FROM tarikhdaftar WHERE '$todayDate' BETWEEN '" . $dateopen . "' AND '" . $dateclose . "'";
        $qry = mysqli_query($conn, $register);
        $rowe = mysqli_num_rows($qry);

        if ($rowe > 0) {
            $found = true;
        }
        return $found;
    }

    $userpart = $_SESSION['userpart'];


    if (checkUserID($conn, $tokenUserID)) {
        if (checkPenuh($conn, $tokenCompositeID)) {
            $res = [
                'status' => 100,
                'message' => 'Ruangan Ini Telah Penuh',
            ];

            echo json_encode($res);
            return;
        } else {

            $checkUser = "SELECT * FROM register WHERE userid = '$tokenUserID'";
            $resultUser = $conn->query($checkUser);

            if ($resultUser->num_rows > 0) {
                while ($row = $resultUser->fetch_assoc()) {
                    $currentb = $row['blockname'];
                    $currentf = $row['floornum'];
                    $currenth = $row['housenum'];
                    $currentr = $row['roomname'];
                }
            }

            $checkBlock = "SELECT * FROM composite WHERE compositeid = '$tokenCompositeID'";
            $resultBlock = $conn->query($checkBlock);

            if ($resultBlock->num_rows > 0) {
                while ($row = $resultBlock->fetch_assoc()) {
                    $b = $row['blockname'];
                    $f = $row['floornum'];
                    $h = $row['housenum'];
                    $r = $row['roomname'];
                }
            }

            $updatelama = "UPDATE composite SET slotnum = slotnum - 1 WHERE blockname = '$currentb' AND floornum = '$currentf' AND housenum = '$currenth' AND roomname = '$currentr'";
            $result = $conn->query($updatelama);

            $updatebaru = "UPDATE composite SET slotnum = slotnum + 1 WHERE blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r'";
            $result = $conn->query($updatebaru);

            $updateRegister = "UPDATE register SET blockname = '$b', floornum = '$f', housenum = '$h', roomname = '$r' WHERE userid = $tokenUserID";
            $result = $conn->query($updateRegister);

            if (checkAvailabilityOld($conn, $currentb, $currentf, $currenth, $currentr)) {

                $updateComposite = "UPDATE composite SET rstatusid = 1 WHERE blockname = '$currentb' AND floornum = '$currentf' AND housenum = '$currenth' AND roomname = '$currentr' ";
                $result = $conn->query($updateComposite);
            }


            if (checkAvailabilityNew($conn, $b, $f, $h, $r)) {

                $updateComposite = "UPDATE composite SET rstatusid = 2 WHERE blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r' ";
                $result = $conn->query($updateComposite);

                $res = [
                    'status' => 200,
                    'message' => 'Penukaran Occupied',
                ];

                echo json_encode($res);
                return;
            } else {
                $updateComposite = "UPDATE composite SET rstatusid = 1 WHERE blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r' ";
                $result = $conn->query($updateComposite);
            }

            $res = [
                'status' => 300,
                'message' => 'Penukaran Berjaya',
            ];

            echo json_encode($res);
            return;
        }
    } else {

        $sql = "INSERT INTO register VALUES (null,'$tokenUserID','$blockname','$floornum','$roomname','$housenum',null,null, 'BELUM', 'BELUM')";
        $result = $conn->query($sql);

        $slots = "UPDATE composite SET slotnum = slotnum + 1 WHERE compositeid = '$tokenCompositeID'";
        $result = $conn->query($slots);

        $query = "UPDATE users SET edaftar = 1 WHERE userid = '$tokenUserID'";
        $result = $conn->query($query);

        if (checkAvailability($conn, $housenum, $blockname, $floornum, $roomname)) {
            $composite = "UPDATE composite SET rstatusid = '2'  WHERE housenum = '" . $housenum . "' AND blockname = '" . $blockname . "' AND floornum = '" . $floornum . "' AND roomname = '" . $roomname . "'";

            $result = $conn->query($composite);
        }
        $res = [
            'status' => 500,
            'message' => 'Pendaftaran Berjaya',
        ];

        echo json_encode($res);
        return;
    }
}

if (isset($_POST['submit_deleteStudent'])) {

    $token = mysqli_real_escape_string($conn, $_POST['userid']);

    $query = "SELECT *,u.userid,u.username,u.userprogramme,r.blockname,r.floornum,r.housenum,r.roomname FROM users u LEFT JOIN register r ON u.userid = r.userid WHERE u.userid = '$token'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $userid = $row['userid'];
        $useremail = $row['useremail'];
        $blockname = $row['blockname'];
        $floornum = $row['floornum'];
        $housenum = $row['housenum'];
        $roomname = $row['roomname'];
    }

    $query = "DELETE FROM register WHERE userid = '$userid'";
    $result = mysqli_query($conn, $query);

    $query = "UPDATE users SET edaftar = 0 WHERE userid = '$userid'";
    $result = mysqli_query($conn, $query);

    $query = "UPDATE composite SET slotnum = slotnum - 1 WHERE housenum = '$housenum' AND blockname = '$blockname' AND floornum = '$floornum' AND roomname = '$roomname'";
    $result = $conn->query($query);

    $query = "UPDATE composite SET rstatusid = '1' WHERE housenum = '$housenum' AND blockname = '$blockname' AND floornum = '$floornum' AND roomname = '$roomname'";
    $result = mysqli_query($conn, $query);

    $res = [
        'status' => 100,
        'message' => 'Pembuangan Berjaya',
    ];

    echo json_encode($res);
    return;
}


if (isset($_POST['submit_keymarkBatal'])) {

    $token = mysqli_real_escape_string($conn, $_POST['userid']);

    $query = "UPDATE register SET statusGive = 'BELUM' WHERE userid = '$token'";
    $result = mysqli_query($conn, $query);

    $res = [
        'status' => 100,
        'message' => 'Pemberian Kunci Gagal',
    ];

    echo json_encode($res);
    return;
}

if (isset($_POST['submit_keymark'])) {

    $token = mysqli_real_escape_string($conn, $_POST['userid']);

    $query = "UPDATE register SET statusGive = 'SUDAH' WHERE userid = '$token'";
    $result = mysqli_query($conn, $query);

    $res = [
        'status' => 100,
        'message' => 'Pemberian Kunci Berjaya',
    ];

    echo json_encode($res);
    return;
}

if (isset($_POST['compositeCovid']) && isset($_POST['userid'])) {

    $compositeCovid = mysqli_real_escape_string($conn, $_POST['compositeCovid']);
    $tokenUserID = mysqli_real_escape_string($conn, $_POST['userid']);

    $sql = "SELECT * FROM composite  WHERE compositeid = '$compositeCovid'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $blockname = $row['blockname'];
            $floornum = $row['floornum'];
            $housenum = $row['housenum'];
            $roomname = $row['roomname'];
        }
    }

    function checkAvailabilityOld($conn, $currentb, $currentf, $currenth, $currentr)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$currentb' AND floornum = '$currentf' AND housenum = '$currenth' AND roomname = '$currentr' AND slotnum < 2";
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkAvailabilityNew($conn, $b, $f, $h, $r)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r' AND slotnum = 2";
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkPenuh($conn, $compositeCovid)
    {
        $found = false;
        $composite = "SELECT * FROM composite WHERE compositeid = '$compositeCovid' AND rstatusid = 2 AND slotnum = 2";
        $qry = mysqli_query($conn, $composite);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkAvailability($conn, $housenum, $blockname, $floornum, $roomname)
    {
        $found = false;
        $availability = "SELECT * FROM registercovid WHERE housenum = '" . $housenum . "' AND blockname = '" . $blockname . "' AND floornum = '" . $floornum . "' AND roomname = '" . $roomname . "'";
        $slots = "SELECT * FROM composite WHERE slotnum = 2 AND housenum = '" . $housenum . "' AND blockname = '" . $blockname . "' AND floornum = '" . $floornum . "' AND roomname = '" . $roomname . "'";

        $qry = mysqli_query($conn, $availability);
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }


    function checkUserID($conn, $tokenUserID)
    {
        $found = false;
        $register = "SELECT * FROM registercovid WHERE userid = '" . $tokenUserID . "'";
        $qry = mysqli_query($conn, $register);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkSlot($conn, $compositeCovid)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE compositeid = '$compositeCovid' AND slotnum = 2 ";
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    function checkRuanganKuarantin($conn, $compositeCovid)
    {
        $found = false;
        $slots = "SELECT * FROM composite WHERE compositeid = '$compositeCovid' AND rstatusid = 1";
        $qry = mysqli_query($conn, $slots);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }



    if (checkUserID($conn, $tokenUserID)) {
        if (checkPenuh($conn, $compositeCovid)) {
            $res = [
                'status' => 100,
                'message' => 'Ruangan Ini Telah Penuh',
            ];

            echo json_encode($res);
            return;
        } else if (checkSlot($conn, $compositeCovid)) {
            $res = [
                'status' => 900,
                'message' => 'Ruangan Penuh Max 2 Orang',
            ];

            echo json_encode($res);
            return;
        } else if (checkRuanganKuarantin($conn, $compositeCovid)) {
            $res = [
                'status' => 902,
                'message' => 'Ini Bukan Ruangan Kuarantin',
            ];

            echo json_encode($res);
            return;
        } else {

            $checkUser = "SELECT * FROM registercovid WHERE userid = '$tokenUserID'";
            $resultUser = $conn->query($checkUser);

            if ($resultUser->num_rows > 0) {
                while ($row = $resultUser->fetch_assoc()) {
                    $currentb = $row['blockname'];
                    $currentf = $row['floornum'];
                    $currenth = $row['housenum'];
                    $currentr = $row['roomname'];
                }
            }

            $checkBlock = "SELECT * FROM composite WHERE compositeid = '$compositeCovid'";
            $resultBlock = $conn->query($checkBlock);

            if ($resultBlock->num_rows > 0) {
                while ($row = $resultBlock->fetch_assoc()) {
                    $b = $row['blockname'];
                    $f = $row['floornum'];
                    $h = $row['housenum'];
                    $r = $row['roomname'];
                }
            }

            $updatelama = "UPDATE composite SET slotnum = slotnum - 1 WHERE blockname = '$currentb' AND floornum = '$currentf' AND housenum = '$currenth' AND roomname = '$currentr'";
            $result = $conn->query($updatelama);

            $updatebaru = "UPDATE composite SET slotnum = slotnum + 1 WHERE blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r'";
            $result = $conn->query($updatebaru);

            $updateRegister = "UPDATE registercovid SET blockname = '$b', floornum = '$f', housenum = '$h', roomname = '$r' WHERE userid = $tokenUserID";
            $result = $conn->query($updateRegister);

            if (checkAvailabilityOld($conn, $currentb, $currentf, $currenth, $currentr)) {

                $updateComposite = "UPDATE composite SET rstatusid = 4 WHERE blockname = '$currentb' AND floornum = '$currentf' AND housenum = '$currenth' AND roomname = '$currentr' ";
                $result = $conn->query($updateComposite);
            }


            if (checkAvailabilityNew($conn, $b, $f, $h, $r)) {

                $updateComposite = "UPDATE composite SET rstatusid = 4 WHERE blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r' ";
                $result = $conn->query($updateComposite);

                $res = [
                    'status' => 200,
                    'message' => 'Penukaran Occupied',
                ];

                echo json_encode($res);
                return;
            } else {
                $updateComposite = "UPDATE composite SET rstatusid = 4 WHERE blockname = '$b' AND floornum = '$f' AND housenum = '$h' AND roomname = '$r' ";
                $result = $conn->query($updateComposite);
            }

            $res = [
                'status' => 300,
                'message' => 'Penukaran Berjaya',
            ];

            echo json_encode($res);
            return;
        }
    } else {

        if (checkSlot($conn, $compositeCovid)) {
            $res = [
                'status' => 900,
                'message' => 'Ruangan Penuh Max 2 Orang',
            ];

            echo json_encode($res);
            return;
        } else if (checkRuanganKuarantin($conn, $compositeCovid)) {
            $res = [
                'status' => 901,
                'message' => 'Ini Bukan Ruangan Kuarantin',
            ];

            echo json_encode($res);
            return;
        } else {
            $sql = "INSERT INTO registercovid VALUES (null,'$tokenUserID','$blockname','$floornum','$roomname','$housenum')";
            $result = $conn->query($sql);

            $slots = "UPDATE composite SET slotnum = slotnum + 1 WHERE compositeid = '$compositeCovid'";
            $result = $conn->query($slots);

            if (checkAvailability($conn, $housenum, $blockname, $floornum, $roomname)) {
                $composite = "UPDATE composite SET rstatusid = '4'  WHERE housenum = '" . $housenum . "' AND blockname = '" . $blockname . "' AND floornum = '" . $floornum . "' AND roomname = '" . $roomname . "'";

                $result = $conn->query($composite);
            }
            $res = [
                'status' => 500,
                'message' => 'Pendaftaran Berjaya',
            ];
        }

        echo json_encode($res);
        return;
    }
}

if (isset($_POST['submit_deleteCovid'])) {

    $token = mysqli_real_escape_string($conn, $_POST['userid']);

    $query = "SELECT *,u.userid,u.username,u.userprogramme,r.blockname,r.floornum,r.housenum,r.roomname FROM users u JOIN registercovid r ON u.userid = r.userid WHERE u.userid = '$token'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $userid = $row['userid'];
        $blockname = $row['blockname'];
        $floornum = $row['floornum'];
        $housenum = $row['housenum'];
        $roomname = $row['roomname'];
    }

    $query = "DELETE FROM registercovid WHERE userid = '$token'";
    $result = mysqli_query($conn, $query);

    $query = "UPDATE composite SET slotnum = slotnum - 1 WHERE housenum = '$housenum' AND blockname = '$blockname' AND floornum = '$floornum' AND roomname = '$roomname'";
    $result = $conn->query($query);

    $query = "UPDATE composite SET rstatusid = '4' WHERE housenum = '$housenum' AND blockname = '$blockname' AND floornum = '$floornum' AND roomname = '$roomname'";
    $result = mysqli_query($conn, $query);

    $res = [
        'status' => 100,
        'message' => 'Pembuangan Pelajar Kuarantin Berjaya',
    ];

    echo json_encode($res);
    return;
}

if (isset($_POST['submit_ajaxSendAnnouncement'])) {
    $notify = mysqli_real_escape_string($conn, $_POST['notify']);

    $query = "INSERT INTO notify VALUES (null,'$notify',1)";
    $query_run = $conn->query($query);

    if ($query_run) {
        $res = [
            'status' => 100,
            'message' => 'Pengumuman Berjaya Dipaparkan !',
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 200,
            'message' => 'Pengumuman Gagal Dipaparkan !',
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['submit_deleteAnnouncement'])) {

    $query = "DELETE FROM notify WHERE status = 1";
    $result = $conn->query($query);

    $res = [
        'status' => 100,
        'message' => 'Pengumuman Berjaya Dipadam !',
    ];

    echo json_encode($res);
    return;
}

if (isset($_POST['submit_deleteAdmin'])) {
    $userid = mysqli_real_escape_string($conn, $_POST['userid']);

    $query = "DELETE FROM users WHERE userid = '$userid'";
    $result = $conn->query($query);

    $res = [
        'status' => 100,
        'message' => 'Admin Berjaya Dipadam !',
    ];

    echo json_encode($res);
    return;
}

if (isset($_POST['submit_ajaxtambahAdmin'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $userid = mysqli_real_escape_string($conn, $_POST['userid']);
    $userpassword = mysqli_real_escape_string($conn, $_POST['userpassword']);
    $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);

    function checkKewujudanAdmin($conn, $userid)
    {
        $found = false;
        $register = "SELECT * FROM users WHERE userid = '$userid'";
        $query = mysqli_query($conn, $register);
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }


    if (!checkKewujudanAdmin($conn, $userid)) {
        $query = "INSERT INTO users VALUES ('$userid','000000000000','$username','" . md5($userpassword) . "','0000000000','0','xxxxx@gmail.com','XXXXX','0','0','" . $usertype . "')";
        $result = $conn->query($query);

        $res = [
            'status' => 100,
            'message' => 'Akaun Admin Berjaya Dicipta !',
        ];
    } else {
        $res = [
            'status' => 200,
            'message' => 'Akaun Sudah Wujud!',
        ];
    }

    echo json_encode($res);
    return;
}

if (isset($_POST['submit_updateAdmin'])) {


    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $userid = mysqli_real_escape_string($conn, $_POST['userid']);
    $userpassword = mysqli_real_escape_string($conn, $_POST['userpassword']);

    $query = "UPDATE users SET username = '$username', userid = '$userid', userpassword = '" . md5($userpassword) . "' WHERE userid = '" . $_SESSION['userid'] . "'";
    $result = $conn->query($query);

    $res = [
        'status' => 100,
        'message' => 'Akaun Super Admin Berjaya Diubah !',
    ];

    echo json_encode($res);
    return;
}

if (isset($_POST['useridStatus'])) {
    $query = "SELECT * FROM ppk WHERE userid = '" . $_POST['userid'] . "'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        }
    }

    $res = [
        'status' => 100,
        'message' => 'Table !',
    ];

    echo json_encode($res);
    return;
}

if (isset($_POST['submit_ajaxtarikhPermohonan'])) {

    $opendate = mysqli_real_escape_string($conn, $_POST['opendate']);
    $closedate = mysqli_real_escape_string($conn, $_POST['closedate']);
    $session = mysqli_real_escape_string($conn, $_POST['session']);

    $query = "UPDATE tarikhppk SET dateopen = '$opendate', dateclose = '$closedate', sesi = '$session' WHERE tarikhppkid = 1";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        $res = [
            'status' => 100,
            'message' => 'Penukaran Tarikh Berjaya',
        ];

        echo json_encode($res);
        return;
    } else {

        $res = [
            'status' => 200,
            'message' => 'Penukaran Tarikh Gagal',
        ];

        echo json_encode($res);
        return;
    }
}

if (isset($_POST['submit_ajaxPemulangan'])) {

    $userid = mysqli_real_escape_string($conn, $_POST['userid']);
    $userblok = mysqli_real_escape_string($conn, $_POST['userblok']);
    $usertingkat = mysqli_real_escape_string($conn, $_POST['usertingkat']);
    $userrumah = mysqli_real_escape_string($conn, $_POST['userrumah']);
    $userbilik = mysqli_real_escape_string($conn, $_POST['userbilik']);
    $userexam = mysqli_real_escape_string($conn, $_POST['userexam']);
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $todayDate = date('Y-m-d h:i:s');
    $newDate = date('Y-m-d h:i:s', strtotime($todayDate));

    $query = "UPDATE register SET finaldate = '$userexam', sentdatetime = '$newDate', statusGive = 'SUDAH', statusReturn = 'PENDING' WHERE userid = '$userid'";
    $result = $conn->query($query);

    $res = [
        'status' => 100,
        'message' => 'Pemulangan Kunci Berjaya',
    ];

    echo json_encode($res);
    return;
}

if (isset($_POST['submit_ajaxBelumBelum'])) {

    $userid = mysqli_real_escape_string($conn, $_POST['userid']);

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $todayDate = date('Y-m-d h:i:s');
    $newDate = date('Y-m-d h:i:s', strtotime($todayDate));

    $query = "UPDATE register SET statusReturn = 'DITERIMA', sentdatetime = '$newDate' WHERE userid = '$userid'";
    $result = $conn->query($query);

    if ($result) {
        $res = [
            'status' => 100,
            'message' => 'Update Kunci Berjaya',
        ];

        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 200,
            'message' => 'Update Kunci Gagal',
        ];

        echo json_encode($res);
        return;
    }
}


if (isset($_POST['submit_ajaxPending'])) {

    $userid = mysqli_real_escape_string($conn, $_POST['userid']);
    
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $todayDate = date('Y-m-d h:i:s');
    $newDate = date('Y-m-d h:i:s', strtotime($todayDate));

    $query = "UPDATE register SET statusReturn = 'DITERIMA', sentdatetime = '$newDate' WHERE userid = '$userid'";
    $result = $conn->query($query);

    if ($result) {
        $res = [
            'status' => 100,
            'message' => 'Update Kunci Berjaya',
        ];

        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 200,
            'message' => 'Update Kunci Gagal',
        ];

        echo json_encode($res);
        return;
    }
}

if (isset($_POST['displayReview'])) {
    $tokenuserid = mysqli_real_escape_string($conn, $_POST['displayReview']);

    $query = "SELECT * FROM register r JOIN users u ON r.userid = u.userid WHERE r.userid = '$tokenuserid'";
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

if (isset($_POST['displayPending'])) {
    $tokenuserid = mysqli_real_escape_string($conn, $_POST['displayPending']);

    $query = "SELECT * FROM register r JOIN users u ON r.userid = u.userid WHERE r.userid = '$tokenuserid'";
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

if (isset($_POST['submit_mulakan'])) {

    foreach (glob("file/upload e-housemate/*.pdf") as $filename) {
        unlink($_SERVER['DOCUMENT_ROOT'] . "/rers/file/upload e-housemate/" . explode('.', explode('/', $filename)[2])[0] . ".pdf");
    }

    foreach (glob("uploads/*.pdf") as $filer) {
        unlink($_SERVER['DOCUMENT_ROOT'] . "/rers/" . explode('.', $filer)[0] . ".pdf");
    }

    $query = "DELETE FROM register";
    $result = mysqli_query($conn, $query);

    $query = "DELETE FROM registercovid";
    $result = $conn->query($query);

    $query = "UPDATE composite SET slotnum = 0, rstatusid = 1";
    $result = $conn->query($query);

    $query = "UPDATE users SET userpart = 0, ehousemate = 0, edaftar = 0";
    $result = $conn->query($query);

    $query = "DELETE FROM family";
    $result = $conn->query($query);

    $query = "DELETE FROM ppk";
    $result = $conn->query($query);

    $res = [
        'status' => 100,
        'message' => 'Delete/Update Database Berjaya',
    ];

    echo json_encode($res);
}

if (isset($_POST['submit_submitKeputusan'])) {

    $inputKeputusan = mysqli_real_escape_string($conn, $_POST['inputKeputusan']);
    $inputppk = mysqli_real_escape_string($conn, $_POST['inputppk']);

    $query = "UPDATE ppk SET keputusan = '$inputKeputusan' WHERE ppkid = '$inputppk'";
    $result = $conn->query($query);

    if ($query) {
        $res = [
            'status' => 100,
            'message' => 'Update Keputusan Berjaya',
        ];

        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 200,
            'message' => 'Update Keputusan Gagal',
        ];

        echo json_encode($res);
        return;
    }
}

if (isset($_POST['useremailPHPM']) && isset($_POST['usernamePHPM'])) {
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'noreplyupkraub@gmail.com';                     //SMTP username
        $mail->Password   = 'kpwzntnvraytahvt';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('noreplyupkraub@gmail.com', 'ReRs');
        $mail->addAddress($_POST['useremailPHPM']);     //Add a recipient

        $message = '<table style="width:100%;text-align:center" bgcolor="white">
        <tbody>
        <tr>
        <td style="text-align:left" bgcolor="#002554"><img src="https://ci6.googleusercontent.com/proxy/hrw2csSOrPrS7Tsi47VYLDmtu03k69wG-QBn6n0WJBWMVsf-iOWa4iIzL7DpILEz38B46XqQowbOGMNENAkzW9ZfqA=s0-d-e1-ft#https://sso.uitm.edu.my/nidp/images/LogoUiTM.png" alt="" class="CToWUd">
        </td>
        </tr>
        <tr>
        <td style="text-align:left"><p>Kepada <b>' . $_POST['usernamePHPM'] . '</b></p></td></tr>
    
        <tr style="text-align:justify"><td style="text-align:left">
        <p>
        <b>Pemulangan Kunci Anda <span style="color:red">TIDAK BERJAYA</span>,<br> Sila Rujuk Pihak UPK Bagi Tindakan Susulan Sebelum Tarikh Pemulangan Kunci (Clearance) Tamat.</b><br><br>
        </p>
        </td>
        </tr>
        <tr style="text-align:left"><td style="background-color:#002554;height:50px">
        <p style="color:white">Copyright © 2023 <span class="il">UiTM</span> Cawangan Pahang Kampus Raub</p></td></tr>
        </tbody>
        </table>';

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "e-Residental Registration System";
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        $res = [
            'status' => 100,
            'message' => 'Email Berjaya Dihantar',
        ];

        echo json_encode($res);
        return;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['useremailbelum']) && isset($_POST['usernamebelum'])) {
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'noreplyupkraub@gmail.com';                     //SMTP username
        $mail->Password   = 'kpwzntnvraytahvt';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('noreplyupkraub@gmail.com', 'ReRs');
        $mail->addAddress($_POST['useremailbelum']);     //Add a recipient

        $message = '<table style="width:100%;text-align:center" bgcolor="white">
        <tbody>
        <tr>
        <td style="text-align:left" bgcolor="#002554"><img src="https://ci6.googleusercontent.com/proxy/hrw2csSOrPrS7Tsi47VYLDmtu03k69wG-QBn6n0WJBWMVsf-iOWa4iIzL7DpILEz38B46XqQowbOGMNENAkzW9ZfqA=s0-d-e1-ft#https://sso.uitm.edu.my/nidp/images/LogoUiTM.png" alt="" class="CToWUd">
        </td>
        </tr>
        <tr>
        <td style="text-align:left"><p>Kepada <b>' . $_POST['usernamebelum'] . '</b></p></td></tr>
    
        <tr style="text-align:justify"><td style="text-align:left">
        <p>
        <b>Anda Masih Belum Menyerahkan Kunci,<br> Sila Berbuat Demikian Bagi Mengelakkan Sebarang Tindakan Tatatertib.</b><br><br> 
        </p>
        </td>
        </tr>
        <tr style="text-align:left"><td style="background-color:#002554;height:50px">
        <p style="color:white">Copyright © 2023 <span class="il">UiTM</span> Cawangan Pahang Kampus Raub</p></td></tr>
        </tbody>
        </table>';

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "e-Residental Registration System";
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        $res = [
            'status' => 100,
            'message' => 'Email Berjaya Dihantar',
        ];

        echo json_encode($res);
        return;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['umbterimakunci']) && isset($_POST['unbterimakunci']) && isset($_POST['picterimakunci'])) {
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'noreplyupkraub@gmail.com';                     //SMTP username
        $mail->Password   = 'kpwzntnvraytahvt';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('noreplyupkraub@gmail.com', 'ReRs');
        $mail->addAddress($_POST['umbterimakunci']);     //Add a recipient

        $message = '<table style="width:100%;text-align:center" bgcolor="white">
        <tbody>
        <tr>
        <td style="text-align:left" bgcolor="#002554"><img src="https://ci6.googleusercontent.com/proxy/hrw2csSOrPrS7Tsi47VYLDmtu03k69wG-QBn6n0WJBWMVsf-iOWa4iIzL7DpILEz38B46XqQowbOGMNENAkzW9ZfqA=s0-d-e1-ft#https://sso.uitm.edu.my/nidp/images/LogoUiTM.png" alt="" class="CToWUd">
        </td>
        </tr>
        <tr>
        <td style="text-align:left"><p>Kepada <b>' . $_POST['unbterimakunci'] . '</b></p></td></tr>
    
        <tr style="text-align:justify"><td style="text-align:left">
        <p>
        <b>Pemulangan Kunci Anda Berjaya !,<br> 
        Terima Kasih Kerana Memberi Kerjasama Yang Baik.</b>
        <br><br><small>Kunci Diterima Oleh</small>: ' . $_POST['picterimakunci'] . '
        </p>
        </td>
        </tr>
        <tr style="text-align:left"><td style="background-color:#002554;height:50px">
        <p style="color:white">Copyright © 2023 <span class="il">UiTM</span> Cawangan Pahang Kampus Raub</p></td></tr>
        </tbody>
        </table>';

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "e-Residental Registration System";
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        $res = [
            'status' => 100,
            'message' => 'Email Berjaya Dihantar',
        ];

        echo json_encode($res);
        return;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_FILES['borangPerm']) && isset($_POST['studID'])) {

    function checkDateReg($conn)
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $todayDate = date('Y-m-d');
        $todayDate = date('Y-m-d', strtotime($todayDate));

        $checkDate = "SELECT * FROM tarikhdaftar";
        $resultDate = $conn->query($checkDate);
        if ($resultDate->num_rows > 0) {

            while ($row = $resultDate->fetch_assoc()) {
                $dateopen = date('Y-m-d', strtotime($row['dateopen']));
                $dateclose = date('Y-m-d', strtotime($row['dateclose']));
            }
        }

        $found = false;
        $register = "SELECT * FROM tarikhdaftar WHERE '$todayDate' BETWEEN '" . $dateopen . "' AND '" . $dateclose . "'";
        $qry = mysqli_query($conn, $register);
        $rowe = mysqli_num_rows($qry);

        if ($rowe > 0) {
            $found = true;
        }
        return $found;
    }

    if (!checkDateReg($conn)) {
        echo json_encode('100');
    } else {

        $query = "UPDATE users SET ehousemate = 1 WHERE userid = '" . $_POST['studID'] . "'";
        $result = $conn->query($query);
        $ext = pathinfo($_FILES['borangPerm']['name'], PATHINFO_EXTENSION);
        $name = explode(".", $_FILES["borangPerm"]["name"]);
        $borangPerm = $_POST['studID'] . '.' . end($name);

        if ($ext == 'pdf') {
            $path = 'file/upload e-housemate/';
            move_uploaded_file($_FILES['borangPerm']['tmp_name'], ($path . $borangPerm));
            echo json_encode('200');
        } else {
            echo json_encode('420');
        }
    }
}

if (isset($_POST['useridSemak'])) {
    if (@file_get_contents('file/upload e-housemate/' . $_POST['useridSemak'] . '.pdf') != '') {
        echo '200';
    } else {
        echo '400';
    }
}
