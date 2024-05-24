<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['userlogged'])) {
    header('location:login.php');
}

if ($_SESSION['userlevelid'] == 2) {
    header("Location: login.php");
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-ReRs | Halaman Utama </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="icon" type="image/x-icon" href="dist/img/2.ico" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<?php
//Jumlah Pendaftaran Pelajar Mengikut Program
$query = $conn->query("SELECT COUNT(registerid) as CS110 from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.userprogramme ='CS110' ");
$query1 = $conn->query("SELECT COUNT(registerid) as CS111 from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.userprogramme ='CS111' ");
$query2 = $conn->query("SELECT COUNT(registerid) as BA119 from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.userprogramme ='BA119' ");
$query3 = $conn->query("SELECT COUNT(registerid) as AM110 from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.userprogramme ='AM110' ");
$query4 = $conn->query("SELECT COUNT(registerid) as BA111 from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.userprogramme ='BA111' ");

foreach ($query as $data) {
    $labels[] = 'CS110';
    $counts[] = $data['CS110'];
}
foreach ($query1 as $data) {
    $labels[] = 'CS111';
    $counts[] = $data['CS111'];
}
foreach ($query2 as $data) {
    $labels[] = 'BA119';
    $counts[] = $data['BA119'];
}
foreach ($query3 as $data) {
    $labels[] = 'AM110';
    $counts[] = $data['AM110'];
}
foreach ($query4 as $data) {
    $labels[] = 'BA111';
    $counts[] = $data['BA111'];
}

//Jumlah Pendaftaran Pelajar Mengikut Semester
$upart1 = $conn->query("SELECT COUNT(registerid) as PART from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.userpart = 1");
$upart2 = $conn->query("SELECT COUNT(registerid) as PART from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.userpart = 2");
$upart3 = $conn->query("SELECT COUNT(registerid) as PART from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.userpart = 3");
$upart4 = $conn->query("SELECT COUNT(registerid) as PART from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.userpart = 4");
$upart5 = $conn->query("SELECT COUNT(registerid) as PART from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.userpart = 5");
$upart6 = $conn->query("SELECT COUNT(registerid) as PART from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.userpart = 6");
$upart7 = $conn->query("SELECT COUNT(registerid) as PART from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.userpart = 7");
$upart8 = $conn->query("SELECT COUNT(registerid) as PART from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.userpart = 8");

foreach ($upart1 as $pdata) {
    $plabels[] = 'Semester 1';
    $pcounts[] = $pdata['PART'];
}
foreach ($upart2 as $pdata) {
    $plabels[] = 'Semester 2';
    $pcounts[] = $pdata['PART'];
}
foreach ($upart3 as $pdata) {
    $plabels[] = 'Semester 3';
    $pcounts[] = $pdata['PART'];
}
foreach ($upart4 as $pdata) {
    $plabels[] = 'Semester 4';
    $pcounts[] = $pdata['PART'];
}
foreach ($upart5 as $pdata) {
    $plabels[] = 'Semester 5';
    $pcounts[] = $pdata['PART'];
}
foreach ($upart6 as $pdata) {
    $plabels[] = 'Semester 6';
    $pcounts[] = $pdata['PART'];
}
foreach ($upart7 as $pdata) {
    $plabels[] = 'Semester 7';
    $pcounts[] = $pdata['PART'];
}
foreach ($upart8 as $pdata) {
    $plabels[] = 'Semester 8';
    $pcounts[] = $pdata['PART'];
}

//Jumlah Pendaftaran Pelajar Mengikut Jantina
$regisgirl = $conn->query("SELECT COUNT(registerid) as FEMALE from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.useric%2 = 0;");
$regismale = $conn->query("SELECT COUNT(registerid) as MALE from register r LEFT JOIN users u ON r.userid = u.userid WHERE u.useric%2 != 0;");

foreach ($regisgirl as $data1) {
    $female[] = $data1['FEMALE'];
}
foreach ($regismale as $data1) {
    $male[] = $data1['MALE'];
}

//Jumlah Pendaftaran Pelajar Mengikut Blok
$mkquery = $conn->query("SELECT SUM(slotnum) as vacant, floornum as floor FROM composite WHERE blockname = '04A' AND rstatusid = 2 AND floornum = 1 ");
$mkquery2 = $conn->query("SELECT SUM(slotnum) as vacant, floornum as floor FROM composite WHERE blockname = '04A' AND rstatusid = 2 AND floornum = 2 ");
$mkquery3 = $conn->query("SELECT SUM(slotnum) as vacant, floornum as floor FROM composite WHERE blockname = '04A' AND rstatusid = 2 AND floornum = 3 ");
$mkquery4 = $conn->query("SELECT SUM(slotnum) as vacant, floornum as floor FROM composite WHERE blockname = '04A' AND rstatusid = 2 AND floornum = 4 ");
$mkquery5 = $conn->query("SELECT SUM(slotnum) as vacant, floornum as floor FROM composite WHERE blockname = '04A' AND rstatusid = 2 AND floornum = 5 ");
$mkquery6 = $conn->query("SELECT SUM(slotnum) as vacant, floornum as floor FROM composite WHERE blockname = '04A' AND rstatusid = 2 AND floornum = 6 ");
$mkquery7 = $conn->query("SELECT SUM(slotnum) as vacant, floornum as floor FROM composite WHERE blockname = '04A' AND rstatusid = 2 AND floornum = 7 ");
$mkquery8 = $conn->query("SELECT SUM(slotnum) as vacant, floornum as floor FROM composite WHERE blockname = '04A' AND rstatusid = 2 AND floornum = 8 ");
$mkquery9 = $conn->query("SELECT SUM(slotnum) as vacant, floornum as floor FROM composite WHERE blockname = '04A' AND rstatusid = 2 AND floornum = 9 ");
$mkquery10 = $conn->query("SELECT SUM(slotnum) as vacant, floornum as floor FROM composite WHERE blockname = '04A' AND rstatusid = 2 AND floornum = 10 ");
foreach ($mkquery as $data2) {
    $mklabel[] = " Aras 1";
    $mkcount[] = $data2['vacant'];
}
foreach ($mkquery2 as $data2) {
    $mklabel[] = " Aras 2";
    $mkcount[] = $data2['vacant'];
}
foreach ($mkquery3 as $data2) {
    $mklabel[] = " Aras 3";
    $mkcount[] = $data2['vacant'];
}
foreach ($mkquery4 as $data2) {
    $mklabel[] = " Aras 4";
    $mkcount[] = $data2['vacant'];
}
foreach ($mkquery5 as $data2) {
    $mklabel[] = " Aras 5";
    $mkcount[] = $data2['vacant'];
}
foreach ($mkquery6 as $data2) {
    $mklabel[] = " Aras 6";
    $mkcount[] = $data2['vacant'];
}
foreach ($mkquery7 as $data2) {
    $mklabel[] = " Aras 7";
    $mkcount[] = $data2['vacant'];
}
foreach ($mkquery8 as $data2) {
    $mklabel[] = " Aras 8";
    $mkcount[] = $data2['vacant'];
}
foreach ($mkquery9 as $data2) {
    $mklabel[] = " Aras 9";
    $mkcount[] = $data2['vacant'];
}
foreach ($mkquery10 as $data2) {
    $mklabel[] = " Aras 10";
    $mkcount[] = $data2['vacant'];
}

$tt1query  = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '08A' AND floornum = 1 AND rstatusid = 2 ");
$tt1query1 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '08A' AND floornum = 2 AND rstatusid = 2 ");
$tt1query2 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '08A' AND floornum = 3 AND rstatusid = 2 ");
$tt1query3 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '08A' AND floornum = 4 AND rstatusid = 2 ");
$tt1query4 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '08A' AND floornum = 5 AND rstatusid = 2 ");
$tt1query5 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '08A' AND floornum = 6 AND rstatusid = 2 ");
$tt1query6 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '08A' AND floornum = 7 AND rstatusid = 2 ");
$tt1query7 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '08A' AND floornum = 8 AND rstatusid = 2 ");

foreach ($tt1query as $data3) {
    $tt1label[] = "Aras 1";
    $tt1count[] = $data3['vacantx'];
}
foreach ($tt1query1 as $data3) {
    $tt1label[] = "Aras 2";
    $tt1count[] = $data3['vacantx'];
}
foreach ($tt1query2 as $data3) {
    $tt1label[] = "Aras 3";
    $tt1count[] = $data3['vacantx'];
}
foreach ($tt1query3 as $data3) {
    $tt1label[] = "Aras 4";
    $tt1count[] = $data3['vacantx'];
}
foreach ($tt1query4 as $data3) {
    $tt1label[] = "Aras 5";
    $tt1count[] = $data3['vacantx'];
}
foreach ($tt1query5 as $data3) {
    $tt1label[] = "Aras 6";
    $tt1count[] = $data3['vacantx'];
}
foreach ($tt1query6 as $data3) {
    $tt1label[] = "Aras 7";
    $tt1count[] = $data3['vacantx'];
}
foreach ($tt1query7 as $data3) {
    $tt1label[] = "Aras 8";
    $tt1count[] = $data3['vacantx'];
}

$tt2query = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '09A' AND floornum = 1 AND rstatusid = 2 ");
$tt2query1 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '09A' AND floornum = 2 AND rstatusid = 2 ");
$tt2query2 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '09A' AND floornum = 3 AND rstatusid = 2 ");
$tt2query3 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '09A' AND floornum = 4 AND rstatusid = 2 ");
$tt2query4 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '09A' AND floornum = 5 AND rstatusid = 2 ");
$tt2query5 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '09A' AND floornum = 6 AND rstatusid = 2 ");
$tt2query6 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '09A' AND floornum = 7 AND rstatusid = 2 ");
$tt2query7 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '09A' AND floornum = 8 AND rstatusid = 2 ");
$tt2query8 = $conn->query("SELECT COUNT(compositeid) as vacantx, floornum as floorx FROM composite WHERE blockname = '09A' AND floornum = 9 AND rstatusid = 2 ");

foreach ($tt2query as $data4) {
    $tt2label[] = "Aras 1";
    $tt2count[] = $data4['vacantx'];
}
foreach ($tt2query1 as $data4) {
    $tt2label[] = "Aras 2";
    $tt2count[] = $data4['vacantx'];
}
foreach ($tt2query2 as $data4) {
    $tt2label[] = "Aras 3";
    $tt2count[] = $data4['vacantx'];
}
foreach ($tt2query3 as $data4) {
    $tt2label[] = "Aras 4";
    $tt2count[] = $data4['vacantx'];
}
foreach ($tt2query4 as $data4) {
    $tt2label[] = "Aras 5";
    $tt2count[] = $data4['vacantx'];
}
foreach ($tt2query5 as $data4) {
    $tt2label[] = "Aras 6";
    $tt2count[] = $data4['vacantx'];
}
foreach ($tt2query6 as $data4) {
    $tt2label[] = "Aras 7";
    $tt2count[] = $data4['vacantx'];
}
foreach ($tt2query7 as $data4) {
    $tt2label[] = "Aras 8";
    $tt2count[] = $data4['vacantx'];
}
foreach ($tt2query8 as $data4) {
    $tt2label[] = "Aras 9";
    $tt2count[] = $data4['vacantx'];
}
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="dist/img/2.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">e-ReRs</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/admin.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin [<?php echo $_SESSION['userid'] ?>]</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <?php include 'side.php' ?>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><b>Halaman Utama</b></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Halaman Utama </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Program -->
                        <div class="card" style="padding:20px">
                            <div class="container">
                                <h5>
                                    <center><small><b>BILANGAN PELAJAR MENDAFTAR MENGIKUT PROGRAM PENGAJIAN</b></small></center>
                                </h5>
                            </div>
                            <canvas id="Dchart" width="200"></canvas>
                            <script>
                                const ctx = document.getElementById('Dchart');
                                const labels = <?php echo json_encode($labels) ?>;
                                const myChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            label: "Jumlah Pelajar",
                                            data: <?php echo json_encode($counts) ?>,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(245, 40, 145, 0.8)',
                                                'rgba(245, 213, 145, 0.8)',
                                                'rgba(56, 90, 79, 0.8)',
                                                'rgba(56, 133, 79, 0.8)',
                                                'rgba(56, 133, 162, 0.8)',
                                                'rgba(56, 55, 162, 0.8)',
                                                'rgba(126, 211, 14, 0.81)',
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(245, 40, 145, 0.8)',
                                                'rgba(245, 213, 145, 0.8)',
                                                'rgba(56, 90, 79, 0.8)',
                                                'rgba(56, 133, 79, 0.8)',
                                                'rgba(56, 133, 162, 0.8)',
                                                'rgba(56, 55, 162, 0.8)',
                                                'rgba(126, 211, 14, 0.81)'
                                            ],
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: false
                                            },
                                        },
                                    }
                                });
                            </script>
                        </div>
                        <!-- Mat Kilau -->
                        <div class="card" style="padding:20px">
                            <h5>
                                <center><small><b>STATISTIK BILANGAN PELAJAR MENGIKUT ARAS KOLEJ MAT KILAU</b></small></center>
                            </h5>
                            <canvas id="Bchart" width="200" height="200"></canvas>
                            <script>
                                const ctx2 = document.getElementById('Bchart');
                                const myChart2 = new Chart(ctx2, {
                                    type: 'bar',
                                    data: {
                                        labels: <?php echo json_encode($mklabel) ?>,
                                        datasets: [{
                                            label: "Jumlah Pelajar",
                                            data: <?php echo json_encode($mkcount) ?>,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(245, 40, 145, 0.8)',
                                                'rgba(245, 213, 145, 0.8)',
                                                'rgba(56, 90, 79, 0.8)',
                                                'rgba(56, 133, 79, 0.8)',
                                                'rgba(56, 133, 162, 0.8)',
                                                'rgba(56, 55, 162, 0.8)',
                                                'rgba(126, 211, 14, 0.81)',
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(245, 40, 145, 0.8)',
                                                'rgba(245, 213, 145, 0.8)',
                                                'rgba(56, 90, 79, 0.8)',
                                                'rgba(56, 133, 79, 0.8)',
                                                'rgba(56, 133, 162, 0.8)',
                                                'rgba(56, 55, 162, 0.8)',
                                                'rgba(126, 211, 14, 0.81)'
                                            ],
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: false
                                            },
                                        },
                                        indexAxis: 'x'
                                    }
                                });
                            </script>
                        </div>
                        <!-- Semester -->
                        <div class="card" style="padding:20px">
                            <h5>
                                <center><small><b>BILANGAN PELAJAR MENDAFTAR MENGIKUT SEMESTER</b></small></center>
                            </h5>
                            <canvas id="Bchartx" width="200" height="200"></canvas>
                            <script>
                                const ctx2x = document.getElementById('Bchartx');
                                const a = new Chart(ctx2x, {
                                    type: 'polarArea',
                                    data: {
                                        labels: <?php echo json_encode($plabels) ?>,
                                        datasets: [{
                                            label: 'Jumlah Pelajar',
                                            data: <?php echo json_encode($pcounts) ?>,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(245, 40, 145, 0.8)',
                                                'rgba(245, 213, 145, 0.8)',
                                                'rgba(56, 90, 79, 0.8)',
                                                'rgba(56, 133, 79, 0.8)',
                                                'rgba(56, 133, 162, 0.8)',
                                                'rgba(56, 55, 162, 0.8)',
                                                'rgba(126, 211, 14, 0.81)',
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(245, 40, 145, 0.8)',
                                                'rgba(245, 213, 145, 0.8)',
                                                'rgba(56, 90, 79, 0.8)',
                                                'rgba(56, 133, 79, 0.8)',
                                                'rgba(56, 133, 162, 0.8)',
                                                'rgba(56, 55, 162, 0.8)',
                                                'rgba(126, 211, 14, 0.81)'
                                            ],
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: false
                                            },
                                        },
                                        indexAxis: 'x'
                                    }
                                });
                            </script>
                            <!-- /.card -->
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Jantina -->
                        <div class="card" style="padding:20px">
                            <div class="container">
                                <h5>
                                    <center><small><b>BILANGAN PELAJAR MENDAFTAR MENGIKUT JANTINA</b></small></center>
                                </h5>
                            </div>
                            <canvas id="piechart" width="200"></canvas>
                            <script>
                                const ctx1 = document.getElementById('piechart');
                                const myChart1 = new Chart(ctx1, {
                                    type: 'pie',
                                    data: {
                                        labels: ['LELAKI', 'PEREMPUAN'],
                                        datasets: [{
                                            label: 'Jumlah Pelajar',
                                            data: [<?php echo json_encode($male) ?>, <?php echo json_encode($female) ?>],
                                            backgroundColor: [
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                            ],
                                            borderColor: [
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 99, 132, 1)',
                                            ],
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: false
                                            },
                                        },
                                    }
                                });
                            </script>

                        </div>
                        <!-- Tun Teja I -->
                        <div class="card" style="padding:20px">
                            <h5>
                                <center><small><b>STATISTIK BILANGAN PELAJAR MENGIKUT ARAS KOLEJ TUN TEJA I</b></small></center>
                            </h5>
                            <canvas id="Cchart" width="200" height="200"></canvas>
                            <script>
                                const ctx3 = document.getElementById('Cchart');
                                const myChart3 = new Chart(ctx3, {
                                    type: 'bar',
                                    data: {
                                        labels: <?php echo json_encode($tt1label) ?>,
                                        datasets: [{
                                            label: 'Jumlah Pelajar',
                                            data: <?php echo json_encode($tt1count) ?>,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(245, 40, 145, 0.8)',
                                                'rgba(245, 213, 145, 0.8)',
                                                'rgba(56, 90, 79, 0.8)',
                                                'rgba(56, 133, 79, 0.8)',
                                                'rgba(56, 133, 162, 0.8)',
                                                'rgba(56, 55, 162, 0.8)',
                                                'rgba(126, 211, 14, 0.81)',
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(245, 40, 145, 0.8)',
                                                'rgba(245, 213, 145, 0.8)',
                                                'rgba(56, 90, 79, 0.8)',
                                                'rgba(56, 133, 79, 0.8)',
                                                'rgba(56, 133, 162, 0.8)',
                                                'rgba(56, 55, 162, 0.8)',
                                                'rgba(126, 211, 14, 0.81)'
                                            ],
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: false
                                            },
                                        },
                                        indexAxis: 'x'
                                    }
                                });
                            </script>
                            <!-- /.card -->


                        </div>
                        <!-- Tun Teja II -->
                        <div class="card" style="padding:20px">
                            <h5>
                                <center><small><b>STATISTIK BILANGAN PELAJAR MENGIKUT ARAS KOLEJ TUN TEJA II</b></small></center>
                            </h5>
                            <canvas id="Ccehart" width="200" height="200"></canvas>
                            <script>
                                const ctxe = document.getElementById('Ccehart');
                                const myCharte = new Chart(ctxe, {
                                    type: 'bar',
                                    data: {
                                        labels: <?php echo json_encode($tt2label) ?>,
                                        datasets: [{
                                            label: 'Jumlah Pelajar',
                                            data: <?php echo json_encode($tt2count) ?>,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(245, 40, 145, 0.8)',
                                                'rgba(245, 213, 145, 0.8)',
                                                'rgba(56, 90, 79, 0.8)',
                                                'rgba(56, 133, 79, 0.8)',
                                                'rgba(56, 133, 162, 0.8)',
                                                'rgba(56, 55, 162, 0.8)',
                                                'rgba(126, 211, 14, 0.81)',
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(245, 40, 145, 0.8)',
                                                'rgba(245, 213, 145, 0.8)',
                                                'rgba(56, 90, 79, 0.8)',
                                                'rgba(56, 133, 79, 0.8)',
                                                'rgba(56, 133, 162, 0.8)',
                                                'rgba(56, 55, 162, 0.8)',
                                                'rgba(126, 211, 14, 0.81)'
                                            ],
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: false
                                            },
                                        },
                                        indexAxis: 'x'
                                    }
                                });
                            </script>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php include 'footer.php' ?>
    </div>
    <!-- wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
</body>
</html>