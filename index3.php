<!DOCTYPE html>
<html lang="en">

<head>

  <?php
  session_start();
  include 'connection.php';
  if (!isset($_SESSION['userlogged'])) {
    header('location: login.php');
  }
  ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>e-ReRs | Halaman Utama</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <link rel="icon" type="image/x-icon" href="dist/img/2.ico"/>
</head>
<!--  
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

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
      <a href="#" draggable="false" class="brand-link">
        <img src="dist/img/2.png" draggable="false" class="brand-image img-circle elevation-3" style="opacity:0.8">
        <span class="brand-text font-weight-light">e-ReRs</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">User [<?php echo $_SESSION['userid']; ?>]</a>
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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><b>Halaman Utama</b></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Halaman</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->


        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md">

                <div class="row">
                  <div class="col-md-6" style="margin:auto 0;">
                    <div class="card card-danger" style='padding:0;'>
                      <div class="card-header">
                        <h3 class="card-title">PEMBERITAHUAN</h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">

                        <?php
                        include('connection.php');

                        $query = "SELECT * FROM notify WHERE 'status' = 0";
                        // FETCHING DATA FROM DATABASE
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                          // OUTPUT DATA OF EACH ROW
                          while ($row = $result->fetch_assoc()) {
                            echo $row["text"];
                          }
                        } else {
                          echo "<div style='text-align:center'><img src='https://thumbs.gfycat.com/DelayedAstonishingAnkole-max-1mb.gif' style='border-radius:100px' width=120 height=120/><br/>TIADA PEMBERITAHUAN BARU SETAKAT INI</div>";
                        }
                        ?>

                      </div>
                      <!-- /.card-body -->
                    </div>
                  </div>

                  <div class='col-md-6'>
                    <div class="card card-info" style='padding:0;'>
                      <div class="card-header">
                        <h3 class="card-title">Pendaftaran e-Housemate</h3>
                      </div>
                      <div class="card-body">
                        <div style='text-align:center;margin-bottom:10px'>
                          <a href="file/BORANG_PERMOHONAN_RAKAN_SERUMAH_E_HOUSEMATE.docx"><i class="fas fa-info-circle" style='font-size:15px'></i>&nbsp;<b>LAMPIRAN BORANG PERMOHONAN RAKAN SERUMAH</b></a>
                          <br>
                          <span style='color:red;font-weight:bold'>*</span><small><b>Sila Muat Turun & Lengkapkan Lampiran Borang Permohonan Rakan Serumah</b></small>
                        </div>

                        <div class="custom-file">
                          <input type="file" class="custom-file-input">
                          <label class="custom-file-label">Muat Naik Borang Pendaftaran e-Housemate</label>
                        </div>

                        <div style='margin-top:10px;width:100%'>
                          <button class="btn btn-success submitBorang" style='font-weight:bold;width:50%'>Hantar Borang Permohonan</button>
                          <button class="btn btn-secondary semakBorang" style='font-weight:bold;width:49%'>Semak Borang Permohonan</button>
                        </div>
                      </div>

                      <div class="card-footer" style='text-align:center;font-weight:bold;font-size:15px'>

                        <span style="color:red">*<b>HANYA SEORANG WAKIL DIKEHENDAKI MENGHANTAR BORANG DALAM BENTUK PDF</b></span>
                      </div>
                      <!-- /.card-body -->
                    </div>
                  </div>
                </div>

                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">MAKLUMAT PENDAFTARAN KOLEJ PELAJAR</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div style="overflow-x:auto;" class="card-body">
                    <table id="senaraipendek" class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th>Matrik</th>
                          <th>Nama Penuh</th>
                          <th>Blok</th>
                          <th>Tingkat</th>
                          <th>Rumah</th>
                          <th>Bilik</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        include('connection.php');

                        $register = "SELECT * FROM register WHERE userid = $_SESSION[userid]";
                        $query = mysqli_query($conn, $register);
                        $d = mysqli_fetch_assoc($query);

                        $user = "SELECT * FROM users WHERE userid = $_SESSION[userid]";
                        $query = mysqli_query($conn, $user);
                        $de = mysqli_fetch_assoc($query);

                        ?>

                        <tr>
                          <td><?php echo $_SESSION['userid']; ?></td>
                          <td><?php echo $_SESSION['username']; ?></td>

                          <?php
                          if ($de['userpart'] == 1 && !isset($d['blockname'])) {

                            echo '<td colspan=4><b>Dibuka Pada Kemasukan Pelajar Baru</b></td>';
                          } else {


                            if (!isset($d['blockname'])) {
                              echo '<td colspan=4><b>BELUM DISAHKAN</b></td>';
                            } else
                              echo '<td> ' . $d["blockname"] . '</td>';
                          ?>

                            <?php
                            if (isset($d['floornum'])) {
                              echo '<td> ' . $d["floornum"] . '</td>';
                            }

                            ?>

                            <?php
                            if (isset($d['housenum'])) {
                              echo '<td> ' . $d["housenum"] . '</td>';
                            }

                            ?>

                          <?php
                            if (isset($d['roomname'])) {
                              echo '<td> ' . $d["roomname"] . '</td>';
                            }
                          }
                          ?>

                        </tr>
                      </tbody>
                    </table>

                    <?php
                    if (isset($d["blockname"])) {

                      echo '
                      <div style="display:flex;justify-content:center"><button id="senaraishow" style="margin-top:20px" class="badge badge-warning">Lihat Senarai Ahli Rumah</button></div>';
                    } else {
                      echo "";
                    }
                    ?>

                    <div id='senaraihide'>
                      <?php
                      $userid = $_SESSION['userid'];
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
                      if (isset($d['blockname']) && isset($d['floornum']) && isset($d['housenum'])) {
                        $checkRumah = "SELECT *,GROUP_CONCAT(u.userid) as 'useridcombine', GROUP_CONCAT(u.username) as 'usernamecombine', GROUP_CONCAT(u.userprogramme) as 'userprogrammecombine', GROUP_CONCAT(u.userpart) as 'userpartcombine', GROUP_CONCAT(u.userphoneno) as 'userphonenocombine',GROUP_CONCAT(r.blockname) as 'rblockname', GROUP_CONCAT(r.floornum) as 'rfloornum', GROUP_CONCAT(r.housenum) as 'rhousenum', GROUP_CONCAT(r.roomname) as 'rroomname'
                        FROM register r JOIN users u ON r.userid = u.userid WHERE blockname = '" . $d['blockname'] . "' AND floornum = '" . $d['floornum'] . "' AND housenum = '" . $d['housenum'] . "' AND 
                        EXISTS (SELECT * FROM register WHERE blockname = '" . $d['blockname'] . "' AND floornum = '" . $d['floornum'] . "' AND housenum = '" . $d['housenum'] . "' AND userid = $userid);";
                        $hasilRumah = $conn->query($checkRumah);


                        if ($hasilRumah->num_rows > 0) {

                          while ($row = $hasilRumah->fetch_assoc()) {

                            $combineid = explode(",", $row["useridcombine"]);
                            $combinename = explode(",", $row["usernamecombine"]);
                            $combineprogramme = explode(",", $row["userprogrammecombine"]);
                            $combinepart = explode(",", $row["userpartcombine"]);
                            $combinephoneno = explode(",", $row["userphonenocombine"]);

                            $blockname = explode(",", $row['rblockname']);
                            $floornum = explode(",", $row['rfloornum']);
                            $housenum = explode(",", $row['rhousenum']);
                            $roomname = explode(",", $row['rroomname']);

                            $bilangan = 1;

                            echo "<table class='table table-condensed table-bordered table-hover' style='margin-top:20px'>
                                <tr>
                                <thead>
                                <td style='width:1%'>No</td>
                                <td style='text-align:center'>No Bilik/Rumah</td>
                                <td>Nama Penuh</td>
                                <td style='text-align:center'>Bahagian/Semester</td>
                                <td style='text-align:center'>Program</td>
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
                                        <td>" . $bilangan++ . "</td>
                                        <td style='width:15%;text-align:center'>" . $blockname[$x] . " " . $studentArray[$x]->getFloor() . " " . $studentArray[$x]->getRoom() . "" . $studentArray[$x]->getHouse() . " </td>
                                        <td style='width:45%'>" . $studentArray[$x]->getName() . "</td>
                                        <td style='width:5%;text-align:center'>" . $studentArray[$x]->getPart() . "</td>
                                        <td style='width:5%;text-align:center'>" . $studentArray[$x]->getProgramme() . "</td>
                                    </tr>";
                            }
                            echo "</table>";
                          }
                        }


                      ?>
                        </table>
                        <center><b style="color:red">MAKSIMUM PELAJAR SETIAP RUMAH ADALAH 8 ORANG</b></center>

                      <?php
                      } else {
                        echo "";
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <?php
        include('connection.php');
        $part = "SELECT * FROM users WHERE userid = $_SESSION[userid]";
        $query = mysqli_query($conn, $part);
        $row = mysqli_fetch_assoc($query);
        ?>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6" style="display:grid;">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">MAKLUMAT PELAJAR</h3>
                  </div>
                  <div class="card-body" style="overflow-x:auto;">
                    <table class="table">
                      <tr>
                        <td style="border-top:1px solid #fff; border-left:1px solid #fff; border-right:1px solid #fff;border-bottom:1px solid black; text-align:left; width:50%">NO PELAJAR</td>
                        <th style="border-top:1px solid #fff; border-right:1px solid #fff; text-align:left;border-bottom:1px solid black"><?php echo $row['userid'] ?></th>
                      </tr>
                      <tr>
                        <td style="border-right:1px solid #fff; border-left:1px solid #fff; border-top: 1px solid #fff;text-align:left;border-bottom:1px solid black">NAMA PENUH</td>
                        <th style="border-top:1px solid #fff; border-right:1px solid #fff; text-align:left;border-bottom:1px solid black"><?php echo $row['username'] ?></th>
                      </tr>
                      <tr>
                        <td style="border-right:1px solid #fff; border-left:1px solid #fff; border-top: 1px solid #fff;text-align:left;border-bottom:1px solid gray"> NO KAD PENGENALAN</td>
                        <th style="border-top:1px solid #fff; border-right:1px solid #fff; text-align:left;border-bottom:1px solid gray;"><?php echo $row['useric'] ?></th>
                      </tr>
                      <tr>
                        <td style="border-right:1px solid #fff; border-left:1px solid #fff; border-top: 1px solid #fff;text-align:left;border-bottom:1px solid black">BAHAGIAN/SEMESTER</td>
                        <th style="border-top:1px solid #fff; border-right:1px solid #fff; text-align:left;border-bottom:1px solid black;"><?php echo $row['userpart'] ?></th>
                      </tr>
                      <tr>
                        <td style="border-right:1px solid #fff; border-left:1px solid #fff;text-align:left;border-bottom:1px solid gray">PROGRAM</td>
                        <th style="border-right:1px solid #fff; text-align:left;border-bottom:1px solid gray"><?php echo $row['userprogramme'] ?></th>
                      </tr>
                      <tr>
                        <td style="border-right:1px solid #fff; border-left:1px solid #fff;text-align:left;border-bottom:1px solid black;">NOMBOR TELEFON</td>
                        <th style="border-right:1px solid #fff; text-align:left;border-bottom:1px solid black;"><?php echo $row['userphoneno'] ?></th>
                      </tr>
                      <tr>
                        <td style="border-right:1px solid #fff; border-left:1px solid #fff; border-bottom:1px solid #fff; border-top: 1px solid #fff;text-align:left;">ALAMAT E-MEL</td>
                        <th style="border-top:1px solid #fff; border-bottom:1px solid #fff; border-right:1px solid #fff; text-align:left;"><?php echo $row['useremail'] ?></th>
                      </tr>
                    </table>
                    </center>
                  </div>
                  <div class="card-footer">
                    <center><small style="color:red">SILA PASTIKAN MAKLUMAT PELAJAR ADALAH TERKINI BAGI MEMUDAHKAN PENYAMPAIAN MAKLUMAT</small><br><small>KEMASKINI MAKLUMAT PELAJAR <a href="studentupdate.php">DISINI</a></small></center>
                  </div>
                </div>
              </div>

              <div class="col-md-6" style="display:grid;">
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">MAKLUMAT PENTING !</h3>
                  </div>
                  <div class="card-body" style="overflow-x:auto;">
                    <table>
                      <tr>
                        <td style="width:50%"><img style="vertical-align:middle;width:20%" src="dist/img/user.gif"><span>Kemaskini Maklumat Pelajar</span></td>
                        <th class="text-center">
                          <?php
                          if (isset($de['userpart']) != 0) {
                            echo '<img style="vertical-align:bottom;width:8%;margin-right:5px"src="dist/img/check.png"><span> SUDAH SELESAI</span>';
                          } else if (isset($de['userpart']) == 0) {
                            echo '<img style="vertical-align:middle;width:7%;margin-right:5px"src="dist/img/cancel.png"><a href="studentupdate.php"><span> BELUM SELESAI</span></a>';
                          }
                          ?>
                        </th>
                      </tr>
                      <tr>
                        <td style="width:50%"><img style="vertical-align:middle;width:19%" src="dist/img/university.gif"><span>Permohonan Bilik/Rumah</span></td>
                        <th class="text-center">
                          <?php
                          if (isset($d['blockname'])) {
                            echo '<img style="vertical-align:bottom;width:8%;margin-right:5px"src="dist/img/check.png"><span> SUDAH SELESAI</span>';
                          } else if ($de['userpart'] == 1) {
                            echo '<img style="vertical-align:bottom;width:8%;margin-right:5px"src="dist/img/cancel.png"><span> TIDAK DIBUKA</span>';
                          } else {
                            echo '<img style="vertical-align:middle;width:7%;margin-right:5px"src="dist/img/cancel.png"><span> BELUM SELESAI</span>';
                          }
                          ?>
                        </th>
                      </tr>
                      <tr>
                        <td style="width:50%"><img style="vertical-align:middle;width:20%" src="dist/img/price-tag.gif"><span>Status Pengurangan Bayaran</span></td>
                        <th class="text-center">
                          <?php
                          $checkPengurangan = "SELECT * FROM ppk p JOIN users u ON p.userid = u.userid WHERE p.userid = '$userid' AND submissiontype = 'PENGURANGAN' ORDER BY p.ppkid DESC LIMIT 1 ";
                          $resultPengurangan = $conn->query($checkPengurangan);
                          if ($resultPengurangan->num_rows > 0) {
                            while ($row = $resultPengurangan->fetch_assoc()) {
                              $statusPengurangan = $row['ppkstatus'];
                            }
                          }
                          if (isset($statusPengurangan)) {
                            if ($statusPengurangan == "PENDING") {
                              echo '<img style="vertical-align:middle;width:10%;margin-right:5px"src="dist/img/expired.png"><a href="semakstatus.php"><span> DALAM PROSES</span></a>';
                            } else if ($statusPengurangan == "APPROVE") {
                              echo '<img style="vertical-align:middle;width:8%;margin-right:20px"src="dist/img/check.png"><a href="semakstatus.php"><span> DILULUSKAN</span></a>';
                            } else {
                              echo '<img style="vertical-align:middle;width:7%;margin-right:5px"src="dist/img/cancel.png"><a href="pengurangan.php"><span> TIDAK MOHON</span></a>';
                            }
                          } else {
                            echo '<img style="vertical-align:middle;width:7%;margin-right:5px"src="dist/img/cancel.png"><a href="pengurangan.php"><span> TIDAK MOHON</span></a>';
                          }
                          ?>
                        </th>
                      </tr>
                      <tr>
                        <td style="width:50%"><img style="vertical-align:middle;width:20%" src="dist/img/voucher.gif"><span>Status Pengecualian Bayaran</span></td>
                        <th class="text-center">
                          <?php
                          $checkPengecualian = "SELECT * FROM ppk p JOIN users u ON p.userid = u.userid WHERE p.userid = '$userid' AND submissiontype = 'PENGECUALIAN' ORDER BY p.ppkid DESC LIMIT 1";
                          $resultPengecualian = $conn->query($checkPengecualian);

                          if ($resultPengecualian->num_rows > 0) {
                            while ($row = $resultPengecualian->fetch_assoc()) {
                              $statusPengecualian = $row['ppkstatus'];
                            }
                          }

                          if (isset($statusPengecualian)) {
                            if ($statusPengecualian == "PENDING") {
                              echo '<img style="vertical-align:middle;width:10%;margin-right:5px"src="dist/img/expired.png"><a href="semakstatus.php"><span> DALAM PROSES</span></a>';
                            } else if ($statusPengecualian == "APPROVE") {
                              echo '<img style="vertical-align:middle;width:8%;margin-right:20px"src="dist/img/check.png"><span> DILULUSKAN</span>';
                            } else {
                              echo '<img style="vertical-align:middle;width:7%;margin-right:5px"src="dist/img/cancel.png"><a href="pengecualian.php"><span> TIDAK MOHON</span></a>';
                            }
                          } else {
                            echo '<img style="vertical-align:middle;width:7%;margin-right:5px"src="dist/img/cancel.png"><a href="pengecualian.php"><span> TIDAK MOHON</span></a>';
                          }
                          ?>

                        </th>
                      </tr>
                      <tr>
                        <td style="width:50%"><img style="vertical-align:middle;width:20%" src="dist/img/room-key.gif"><span>Pemulangan Kunci</span></td>
                        <th class="text-center">
                          <?php
                          if (isset($d['statusReturn']) == 'PENDING') {
                            if ($d['statusReturn'] == "PENDING") {
                              echo '<img style="vertical-align:bottom;width:8%;margin-right:5px"src="dist/img/expired.png"><span><a href="pemulangan.php">DALAM PROSES</a></span>';
                            } else if ($d['statusReturn'] == "DITERIMA") {
                              echo '<img style="vertical-align:middle;width:7%;margin-right:5px"src="dist/img/check.png"><span> SUDAH SELESAI</span>';
                            } else {
                              echo '<img style="vertical-align:middle;width:7%;margin-right:5px"src="dist/img/cancel.png"><span> BELUM SELESAI</span>';
                            }
                          } else {
                            echo '<img style="vertical-align:middle;width:7%;margin-right:5px"src="dist/img/cancel.png"><span> BELUM SELESAI</span>';
                          }
                          ?>

                        </th>
                      </tr>
                    </table>
                  </div>
                  <div class="card-footer">
                    <center><small style="color:red">SILA AMBIL MAKLUM TERHADAP MAKLUMAT PENTING YANG DIPAPARKAN DIATAS</small><br><small>PASTIKAN ANDA CAKNA TERHADAP MAKLUMAN BERIKUT</small></center>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <?php include 'footer.php' ?>

    <script>
      $(".custom-file-input").change(function() {
        $(".custom-file-label").text(this.files[0].name);

        if (this.files[0].size >= 200000) {
          var text = '<b>Borang Permohonan Tidak Boleh Melebihi 200 KB</b>';
          Swal.fire({
            html: "" + text + "",
            icon: "info",
            showDenyButton: false,
            confirmButtonText: "Okay",
          })
        }
      });

      $('.submitBorang').click(function() {
        var userid = <?php echo $_SESSION['userid']; ?>;
        var dataPerm = new FormData();
        dataPerm.append('borangPerm', $('.custom-file-input').prop('files')[0])
        dataPerm.append('studID', userid)

        $.ajax({
          type: "POST",
          url: "code.php",
          contentType: false,
          processData: false,
          data: dataPerm,
          success: function(e) {
            var de = JSON.parse(e);
            if (de == 200) {
              var text = '<b>Borang Permohonan Berjaya Dihantar !</b>';
              Swal.fire({
                html: "" + text + "",
                icon: "success",
                showDenyButton: false,
                confirmButtonText: "Okay",
              })
            } else if (de == 420) {
              var text = '<b>Sila Hantar Borang Permohonan Dalam Bentuk PDF</b>';
              Swal.fire({
                html: "" + text + "",
                icon: "info",
                showDenyButton: false,
                confirmButtonText: "Okay",
              })
            } else if (de == 100) {
              var text = '<b>Permohonan Telah Ditutup !</b>';
              Swal.fire({
                html: "" + text + "",
                icon: "info",
                showDenyButton: false,
                confirmButtonText: "Okay",
              })

            }
          }
        })
      })

      $('.semakBorang').click(function() {
        var userid = <?php echo $_SESSION['userid']; ?>;
        var dataus = new FormData();

        dataus.append('useridSemak', userid);

        $.ajax({
          type: "POST",
          url: "code.php",
          data: dataus,
          contentType: false,
          processData: false,
          success: function(e) {
            if (e == 200) {
              window.open('file/upload e-housemate/' + userid + '.pdf')
            } else {
              var text = '<b>Tiada Borang Permohonan Yang Dihantar !</b>';
              Swal.fire({
                html: "" + text + "",
                icon: "info",
                showDenyButton: false,
                confirmButtonText: "Okay",
              })
            }
          }
        })
      })
    </script>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->

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
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js'></script>
  <script src="https://cdn.lordicon.com/qjzruarw.js"></script>

  <script>
    $(document).ready(function() {
      var userpart = '<?php
                      $query = "SELECT * FROM users WHERE userid = '" . $_SESSION['userid'] . "'";
                      $result = $conn->query($query);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          $userpart = $row['userpart'];
                        }
                      }
                      echo $userpart ?>'
      if (userpart == 0) {
        var text = '<b>Sila Kemaskini Maklumat Pelajar Terlebih Dahulu !</b>';
        Swal.fire({
          html: "" + text + "",
          icon: "info",
          showDenyButton: false,
          confirmButtonText: "Okay",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "studentupdate.php"
          } else {
            window.location.href = "studentupdate.php"
          }
        })
      }
    });

    $(document).ready(function() {
      $('#senaraihide').hide();
      var hasclick = false
      $('#senaraishow').click(function() {
        if (!hasclick) {
          $('#senaraihide').fadeIn(1000);
          $('#senaraipendek').hide();
          $("#senaraishow").html("Tutup Senarai Ahli Rumah");
          hasclick = true
        } else {
          $('#senaraihide').hide();
          $('#senaraipendek').fadeIn(750);
          $("#senaraishow").html("Lihat Senarai Ahli Rumah");
          hasclick = false
        }
      })
    });
  </script>

</body>

</html>