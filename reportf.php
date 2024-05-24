<!DOCTYPE html>
<html lang="en">

<head>

  <?php
  session_start();
  if (!isset($_SESSION['userlogged'])) {
    header('location: login.php');
  }
  if ($_SESSION['userlevelid'] == 2) {
    header("Location: login.php");
  }
  ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Senarai Rakan Serumah 08A</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <link rel="icon" type="image/x-icon" href="dist/img/2.ico"/>
</head>
<!-- <style>
  * {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
  }

  .page {
    width: 21cm;
    min-height: 29.7cm;
    padding: 2cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  }

  .subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 256mm;
    outline: 2cm #FFEAEA solid;
  }

  @page {
    size: A4;
    margin: 1;
  }

  @media print {
    .page {
      margin: 1;
      border: initial;
      border-radius: initial;
      width: initial;
      min-height: initial;
      box-shadow: initial;
      background: initial;
      page-break-after: always;
    }
  }
</style> -->

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
      <a href="index.php" class="brand-link">
        <img src="dist/img/2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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

      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><b>Senarai Pendaftaran Kolej Siswi - 08A</b></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Laporan - Siswi</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <table style="table-layout:fixed; overflow-x:auto; width: 90%; border: 1px solid #ccc; width: 100%">
            <tr>
              <td id="left"><img style="width: 80%; padding:5px; margin-left:3%;" draggable="false" src="logouitm.svg"></td>
              <td id="center">

                <?php
                include 'connection.php';
                $sql = "SELECT * FROM tarikhppk";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // OUTPUT DATA OF EACH ROW
                  while ($row = $result->fetch_assoc()) {

                    $openphp = $row['dateopen'];
                    $newopenDate = date("d M Y", strtotime($openphp));

                    $closephp = $row['dateclose'];
                    $newcloseDate = date("d M Y", strtotime($closephp));

                    $sessionphp = $row['sesi'];
                  }
                }
                ?>

                <center>
                  <h1 style="font-size:large"><b>SENARAI RAKAN SERUMAH KOLEJ TUN TEJA 1</b></h1>
                  <br>
                  <h1 style="font-size:large">SESI: <?php echo $sessionphp ?></h1>
                  <br>
              </td>
              </center>

              <td id="right">
                <center>
                  <img style="width: 40%; padding:5px; margin-left:3%;" draggable="false" src="dist/img/logojpk.png">
                </center>
              </td>

            </tr>
          </table>
          <div class="card">
            <!-- /.card-header -->
            <div id="hidebook" class="book hidebook">
              <div id="hidepage" class="page hidepage">
                <div class="card-body" style="overflow-x:auto;">
                  <button id="ciwi" class="btn btn-primary" style="float:right" onclick="display()">Cetak</button>
                  <h2><small><b>08A - TUN TEJA</b></small></h2>

                  <?php

                  include('connection.php');

                  $register = "SELECT *,GROUP_CONCAT(u.userid) as 'useridcombine', GROUP_CONCAT(u.username) as 'usernamecombine', GROUP_CONCAT(u.userprogramme) as 'userprogrammecombine', GROUP_CONCAT(u.userpart) as 'userpartcombine', GROUP_CONCAT(u.userphoneno) as 'userphonenocombine',GROUP_CONCAT(r.blockname) as 'rblockname', GROUP_CONCAT(r.floornum) as 'rfloornum', GROUP_CONCAT(r.housenum) as 'rhousenum', GROUP_CONCAT(r.roomname) as 'rroomname' FROM register r INNER JOIN users u ON r.userid = u.userid WHERE blockname = '08A' GROUP BY r.floornum,r.housenum  ORDER BY r.floornum ,r.housenum ,r.roomname ";

                  $result = $conn->query($register);

                  if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                      $combineid = explode(",", $row["useridcombine"]);
                      $combinename = explode(",", $row["usernamecombine"]);
                      $combineprogramme = explode(",", $row["userprogrammecombine"]);
                      $combinepart = explode(",", $row["userpartcombine"]);
                      $combinephoneno = explode(",", $row["userphonenocombine"]);

                      $blockname = explode(",", $row['rblockname']);
                      $floornum = explode(",", $row['rfloornum']);
                      $housenum = explode(",", $row['rhousenum']);
                      $roomname = explode(",", $row['rroomname']);

                      //sort($roomname);
                      $bilangan = 1;

                      echo "<table id='example1' class='table table-condensed table-bordered table-hover'>
                        <tr>
                        <thead style='background-color:#a29bfe'>
                        <td>NO</td>
                        <td>NO RUMAH/BILIK</td>
                        <td >NAMA PELAJAR</td>
                        <td>NO PELAJAR</td>
                        <td>PROG</td>
                        <td>BHG</td>
                        <td>NO TELEFON</td>
                        </thead>
                        </tr>";


                      $studentArray = array();

                      for ($i = 0; $i < count($combineid); $i++) {
                        $studentArray[$i] = new studentInfo();
                        $studentArray[$i]->setStudentInfo($combinename[$i], $combinephoneno[$i], $combinepart[$i], $combineprogramme[$i], $combineid[$i], $floornum[$i], $housenum[$i], $roomname[$i]);

                        sort($studentArray);
                      }

                      for ($x = 0; $x < count($studentArray); $x++) {
                        echo "<tr>
                    <td style='width:5%'>" . $bilangan++ . "</td>
                    <td style='width:5%'>" . $blockname[$x] . " " . $studentArray[$x]->getFloor() . " " . $studentArray[$x]->getRoom() . "" . $studentArray[$x]->getHouse() . " </td>
                    <td style='width:25%'>" . $studentArray[$x]->getName() . "</td>
                    <td style='width:5%'>" . $studentArray[$x]->getStudentID() . "</td>
                    <td style='width:5%'>" . $studentArray[$x]->getProgramme() . "</td>
                    <td style='width:5%'>" . $studentArray[$x]->getPart() . "</td>
                    <td style='width:5%'>" . $studentArray[$x]->getPhone() . "</td>
                    </tr>";
                      }
                      echo "</table><br>";
                    }
                  }

                  class studentInfo
                  {
                    public $f;
                    public $r;
                    public $h;
                    public $m;
                    public $n;
                    public $pa;
                    public $pr;
                    public $si;

                    function setStudentInfo($name, $phone, $part, $programme, $studentID, $floor, $house, $room)
                    {
                      $this->m = $phone;
                      $this->n = $name;
                      $this->pa = $part;
                      $this->si = $studentID;
                      $this->pr = $programme;
                      $this->f = $floor;
                      $this->h = $house;
                      $this->r = $room;
                    }

                    function getFloor()
                    {
                      return $this->f;
                    }

                    function getRoom()
                    {
                      return $this->r;
                    }

                    function getHouse()
                    {
                      return $this->h;
                    }

                    function getPhone()
                    {
                      return $this->m;
                    }

                    function getName()
                    {
                      return $this->n;
                    }

                    function getPart()
                    {
                      return $this->pa;
                    }

                    function getProgramme()
                    {
                      return $this->pr;
                    }

                    function getStudentID()
                    {
                      return $this->si;
                    }
                  }
                  ?>

                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <div id="ciwa"><?php include 'footer.php' ?></div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Add Content Here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script>
    $(document).ready(function() {
      $(".hidebook").removeClass("book");
      $(".hidepage").removeClass("page");

    });

    function display() {
      $("#hidebook").addClass("book");
      $("#hidepage").addClass("page");
      $("#ciwa").hide()
      $("#ciwi").hide()
      window.print();
      $(".hidebook").removeClass("book");
      $(".hidepage").removeClass("page");
      $("#ciwa").show()
      $("#ciwi").show()
    }
  </script>

</body>

</html>