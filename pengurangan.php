<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'connection.php';
    session_start();
    if (!isset($_SESSION['userlogged'])) {
        header('location: login.php');
    }

    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-ReRs | Pengurangan Bayaran </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="dist/img/2.ico" />

    <!-- PopUp Data JS -->

    <style>
        th.width5 {
            width: 5% !important;
        }

        th.width10 {
            width: 10% !important;
        }

        th.width15 {
            width: 15% !important;
        }

        th.width20 {
            width: 20% !important;
        }

        th.width25 {
            width: 25% !important;
        }
    </style>
    <style>
        dfn {
            cursor: help;
            font-style: normal;
            position: relative;

        }

        dfn::after {
            content: attr(data-info);
            display: inline;
            position: absolute;
            top: 22px;
            left: 0;
            opacity: 0;
            width: 230px;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.5em;
            padding: 0.5em 0.8em;
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            pointer-events: none;
            /* This prevents the box from apearing when hovered. */
            transition: opacity 250ms, top 250ms;
        }

        dfn::before {
            content: '';
            display: block;
            position: absolute;
            top: 12px;
            left: 20px;
            opacity: 0;
            width: 0;
            height: 0;
            border: solid transparent 5px;
            border-bottom-color: rgba(0, 0, 0, 0.8);
            transition: opacity 250ms, top 250ms;
        }

        dfn:hover {
            z-index: 2;
        }

        /* Keeps the info boxes on top of other elements */
        dfn:hover::after,
        dfn:hover::before {
            opacity: 1;
        }

        dfn:hover::after {
            top: 30px;
        }

        dfn:hover::before {
            top: 20px;
        }
    </style>
    <style>
        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        select.invalid {
            background-color: #ffdddd;
        }

        /* Mark input boxes that gets no error on validation: */
        input.valid {
            background-color: white;
        }

        select.valid {
            background-color: white;
        }
    </style>
    <style>
        .double {
            zoom: 2;
            transform: scale(2);
            -ms-transform: scale(2);
            -webkit-transform: scale(2);
            -o-transform: scale(2);
            -moz-transform: scale(2);
            transform-origin: 0 0;
            -ms-transform-origin: 0 0;
            -webkit-transform-origin: 0 0;
            -o-transform-origin: 0 0;
            -moz-transform-origin: 0 0;
        }
    </style>
</head>

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
        </aside>

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!-- Main content -->
                <div class="container-fluid">
                    <div class="card card" style="overflow-x:auto;">
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
                                        <h1 style="font-size:large"><b>PENGURANGAN BAYARAN KOLEJ</b></h1>
                                        <br>
                                        <h1 style="font-size:large">SESI: <?php echo $sessionphp ?></h1>
                                        <br>
                                        <h1 style="font-size:large"><b>TARIKH TUTUP PERMOHONAN:</b> <?php echo $newcloseDate ?></h1>
                                </td>
                                </center>

                                <td id="right">
                                    <center><b> NO BILIK </b></center>
                                    <center>
                                        <br>
                                        <p style="font-size:large">
                                            <?php

                                            include('connection.php');

                                            $userid = $_SESSION['userid'];
                                            $sql = "SELECT * FROM register WHERE userid = $userid";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo $row['blockname'];
                                                    echo " ";
                                                    echo $row['floornum'];
                                                    echo " ";
                                                    echo $row['roomname'];
                                                    echo $row['housenum'];
                                                }
                                            }
                                            ?>
                                            <?php
                                            $userid = $_SESSION['userid'];
                                            $sql = "SELECT * FROM users WHERE userid = $userid";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $username = $row['username'];
                                                    $userid = $row['userid'];
                                                    $userprogramme = $row['userprogramme'];
                                                    $useric = $row['useric'];
                                                    $userphoneno = $row['userphoneno'];
                                                }
                                            }
                                            ?>
                                        </p>
                                    </center>
                                    <p style="position:absolute">
                                        <center>(Semester ini)</center>
                                    </p>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <h style="text-decoration:underline; color:red"><b>PERINGATAN</b></h>
                    <ul style="list-style-type: circle black;">
                        <li>MAKLUMAT YANG <b style="text-decoration:underline; color:red">TIDAK LENGKAP</b> DAN <b style="text-decoration:underline; color:red">KENYATAAN TANPA BUKTI</b> (SALINAN YANG TIDAK DISAHKAN) MENYEBABKAN <b style="color:red">PERMOHONAN ANDA AKAN DITOLAK.</b></li>
                        <li>PERMOHONAN DIBUKA KEPADA PELAJAR KATEGORI <b style="text-decoration:underline; color:red">B40</b> BERPENDAPATAN <b style="text-decoration:underline; color:red">RM2500 - RM4500</b> DAN MEMPUNYAI <b style="color:red">TANGGUNGAN YANG RAMAI</b></li>
                        <li>TIDAK MENERIMA SEBARANG<b style="text-decoration:underline; color:red"> BANTUAN KEWANGAN</b> SEPERTI PTPTN / MARA / ZAKAT DAN LAIN-LAIN BANTUAN</li>
                    </ul>
                </div>
            </section>


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">PENGURANGAN BAYARAN KOLEJ</h3>
                                </div>
                                <div class="card-body" style="overflow-x:auto">
                                    <div class="bs-stepper">
                                        <div style="overflow-x:auto" class="bs-stepper-header" role="tablist">
                                            <!-- your steps here -->
                                            <div class="step" data-target="#butirpemohon">
                                                <button style="cursor:default" type="button" class="step-trigger" role="tab" aria-controls="butirpemohon" id="butirpemohon-trigger">
                                                    <span class="bs-stepper-circle"><i class="fa fa-user"></i></span>
                                                    <span class="bs-stepper-label">Butir Pemohon</span>
                                                </button>
                                            </div>

                                            <div class="line"></div>
                                            <div class="step" data-target="#statuspengajian">
                                                <button style="cursor:default" type="button" class="step-trigger" role="tablist" aria-controls="statuspengajian" id="statuspengajian-trigger">
                                                    <span class="bs-stepper-circle"><i class="fa fa-book"></i></span>
                                                    <span class="bs-stepper-label">Status Pengajian</span>
                                                </button>
                                            </div>

                                            <div class="line"></div>
                                            <div class="step" data-target="#butiranibubapa">
                                                <button type="button" style="cursor:default" class="step-trigger" role="tablist" aria-controls="butiranibubapa" id="butiranibubapa-trigger">
                                                    <span class="bs-stepper-circle"><i class="fa fa-info"></i></span>
                                                    <span class="bs-stepper-label">Butiran Ibu Bapa/Penjaga</span>
                                                </button>
                                            </div>

                                            <div class="line"></div>
                                            <div class="step" data-target="#tanggungankeluarga">
                                                <button type="button" style="cursor:default" class="step-trigger" role="tablist" aria-controls="tanggungankeluarga" id="tanggungankeluarga-trigger">
                                                    <span class="bs-stepper-circle"><i class="fa fa-users"></i></span>
                                                    <span class="bs-stepper-label">Tanggungan Keluarga</span>
                                                </button>
                                            </div>

                                            <div class="line"></div>
                                            <div class="step" data-target="#pengakuan">
                                                <button type="button" style="cursor:default" class="step-trigger" role="tablist" aria-controls="pengakuan" id="pengakuan-trigger">
                                                    <span class="bs-stepper-circle"><i class="fa fa-check"></i></span>
                                                    <span class="bs-stepper-label">Pengakuan</span>
                                                </button>
                                            </div>


                                        </div>
                                        <!-- Form Meow -->
                                        <form id="regForm" action="" method="POST" enctype="multipart/form-data">
                                            <div class="bs-stepper-content">
                                                <div id="butirpemohon" class="content tab" role="tabpanel" aria-labelledby="butirpemohon-trigger">
                                                    <div class="form-group">
                                                        <label>Nama Penuh</label>
                                                        <input style="background-color:white" class="form-control" disabled='disabled' value="<?php echo $username ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Nombor Matriks</label>
                                                        <input style="background-color:white" class="form-control" disabled='disabled' value="<?php echo $userid ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Kod Program</label>
                                                        <input style="background-color:white" class="form-control" disabled='disabled' value="<?php echo $userprogramme ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Kad Pengenalan</label>
                                                        <input style="background-color:white" class="form-control" disabled='disabled' value="<?php echo $useric ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>No Telefon</label>
                                                        <input style="background-color:white" class="form-control" disabled='disabled' value="<?php echo $userphoneno ?>">
                                                    </div>


                                                    <?php

                                                    $query = "SELECT * FROM users WHERE userid = '$userid'";
                                                    $result = $conn->query($query);

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $userpart = $row['userpart'];
                                                        }
                                                    }

                                                    if ($userpart != 1) {
                                                    ?>

                                                        <table>
                                                            <tr>
                                                                <td rowspan=2 span=2>SEMESTER TERKINI</td>
                                                                <td>
                                                                    <center>GPA <span style="color:red">*</span></center>
                                                                </td>
                                                                <td>
                                                                    <center>CGPA <span style="color:red">*</span></center>
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td>
                                                                    <center><input placeholder="GPA TERKINI" name="usergpa" type="number" step="0.01" class="form-control required" oninput="this.className = 'form-control'"></center>
                                                                </td>
                                                                <td>
                                                                    <center><input placeholder="CGPA TERKINI" name="usercgpa" type="number" step="0.01" class="form-control required" oninput="this.className = 'form-control'"></center>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    <?php
                                                    }
                                                    ?>
                                                    <br>

                                                    <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                                </div>

                                                <div id="statuspengajian" class="content tab" role="tabpanel" aria-labelledby="statuspengajian-trigger">
                                                    <div class="form-group">
                                                        <label>Status Pengajian <span style="color:red">*</span></label>
                                                        <select id="validatestatuspengajian" name="userstatusedu" oninput="this.className = 'form-control'" class="form-control required" style="width:100%">
                                                            <option value="" hidden selected="selected">-</option>
                                                            <option value="Pra Pendidikan Tinggi">Pra Pendidikan Tinggi</option>
                                                            <option value="Diploma">Diploma</option>
                                                            <option value="Kursus Profesional (External Course)">Kursus Profesional (External Course)</option>
                                                            <option value="Ijazah Sarjana Muda">Ijazah Sarjana Muda</option>
                                                        </select>
                                                    </div>

                                                    <button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>

                                                    <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>

                                                </div>


                                                <div id="butiranibubapa" class="content tab" role="tabpanel" aria-labelledby="butiranibubapa-trigger">

                                                    <div class="form-group">
                                                        <label>Alamat Rumah/Kampung <span style="color:red">*</span></label>
                                                        <input type="text" name="houseaddress" class="form-control required" oninput="this.className = 'form-control required'" style="text-transform: uppercase">

                                                        <br>

                                                        <label>No Telefon Ibu Bapa/Penjaga <span style="color:red">*</span></label>
                                                        <input type="number" name="familyphoneno" class="form-control required" oninput="this.className = 'form-control required'">

                                                        <br>

                                                        <label>Nama Bapa <span style="color:red">*</span></label>
                                                        <input type="text" name="fathername" class="form-control required" oninput="this.className = 'form-control required'" style="text-transform: uppercase">

                                                        <br>

                                                        <label>Pekerjaan Bapa <span style="color:red">*</span></label>
                                                        <input type="text" name="fatherwork" class="form-control required" oninput="this.className = 'form-control required'" style="text-transform: uppercase">

                                                        <br>

                                                        <div class="form-group">
                                                            <label>Penyata Pendapatan/Pencen Bapa/Sijil Kematian <span style="color:red">*</span></label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" accept=".pdf" name="fatherincomefile" class="custom-file-input" id="exampleInputFile">
                                                                    <input type="hidden" name="MAX_FILE_SIZE" value="67108864" />
                                                                    <label class="custom-file-label">Pilih File</label>
                                                                </div>
                                                            </div>
                                                            <small style="color:red">* Penyata Pendapatan/Pencen Ibu/Bapa/Penjaga hendaklah disahkan oleh Pegawai Kerajaan Kumpulan Professional/Penghulu/Ketua Kampung</small>
                                                            <br>
                                                            <small style="color:red">* Pastikan Fail Yang Dihantar Adalah Dalam Bentuk PDF Sahaja</small>
                                                        </div>

                                                        <label>Pendapatan Sebulan Bapa <span style="color:red">*</span></label>
                                                        <input type="number" step="0.1" name="fatherincome" class="form-control required" oninput="this.className = 'form-control required'">

                                                        <br>

                                                        <label>Nama Ibu <span style="color:red">*</span></label>
                                                        <input type="text" name="mothername" class="form-control required" oninput="this.className = 'form-control required'" style="text-transform: uppercase">

                                                        <br>

                                                        <label>Pekerjaan Ibu <span style="color:red">*</span></label>
                                                        <input type="text" name="motherwork" class="form-control required" oninput="this.className = 'form-control required'" style="text-transform: uppercase">

                                                        <br>

                                                        <div class="form-group">
                                                            <label>Penyata Pendapatan/Pencen Ibu/Sijil Kematian <span style="color:red">*</span></label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" accept=".pdf" name="motherincomefile" class="custom-file-input" id="exampleInputFile">
                                                                    <input type="hidden" name="MAX_FILE_SIZE" value="67108864" />
                                                                    <label class="custom-file-label">Pilih File</label>
                                                                </div>
                                                            </div>
                                                            <small style="color:red">* Penyata Pendapatan/Pencen Ibu/Bapa/Penjaga hendaklah disahkan oleh Pegawai Kerajaan Kumpulan Professional/Penghulu/Ketua Kampung</small>
                                                            <br>
                                                            <small style="color:red">* Pastikan Fail Yang Dihantar Adalah Dalam Bentuk PDF Sahaja</small>
                                                        </div>

                                                        <label>Pendapatan Sebulan Ibu <span style="color:red">*</span></label>
                                                        <input type="number" name="motherincome" class="form-control required" oninput="this.className = 'form-control required'">

                                                        <br>

                                                        <label>Jumlah Pendapatan Keluarga <span style="color:red">*</span></label>
                                                        <input type="number" name="totalincome" class="totIncome form-control required" oninput="this.className = 'form-control required'">

                                                    </div>

                                                    <button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>

                                                    <!-- <button class="btn btn-primary nextsubmit" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
                                                    <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>


                                                </div>

                                                <div id="tanggungankeluarga" class="content tab" role="tabpanel" aria-labelledby="tanggungankeluarga-trigger">
                                                    <div class="form-group">
                                                        <table class="table-sm">
                                                            <tr>
                                                                <td colspan=4><b>E. KEDUDUKAN DAN TANGGUNGAN KELUARGA: </b></td>
                                                                <td colspan=2> BILANGAN ADIK BERADIK <span style="color:red">*</span><input type="number" class="form-control required" oninput="this.className = 'form-control required'" name="totalsiblings"></td>

                                                                <td colspan=2> ANAK KE BERAPA <span style="color:red">*</span><input type="number" name="siblingsnumber" class="form-control required" oninput="this.className = 'form-control required'"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>#</th>
                                                                <td>NAMA ANAK YANG MASIH DITANGGUNG <b>TERMASUK PEMOHON <span style="color:red">*</span></b>
                                                                </td>
                                                                <td>NAMA SEKOLAH/IPTA/IPTS <span style="color:red">*</span></td>
                                                                <td style="width:5%">TAHUN/SEM <span style="color:red">*</span></td>
                                                                <td>AGENSI PINJAMAN/BIASISWA/BANTUAN <span style="color:red">*</span></td>
                                                                <td style="width:10%">STATUS <span style="color:red">*</span><br>
                                                                    <p style="font-size:small">A- Telah Dapat <br> B- Dalam Proses <br> C- Tidak Mohon <br> D- Ditolak/Gagal</p>
                                                                </td>
                                                                <td>NILAI SETAHUN (RM) <span style="color:red">*</span></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <li></li>
                                                                </td>
                                                                <td class="width20"><input type="text" name="familymembersname1" value="<?php echo $_SESSION['username'] ?>" readonly class="form-control required" style="text-transform: uppercase"></td>
                                                                <td><input type='text' name='institutename1' class='form-control required' oninput="this.className = 'form-control required'" style='text-transform: uppercase'></td>
                                                                <td><input type='number' name='yearstudy1' class='form-control required' oninput="this.className = 'form-control required'"></td>
                                                                <td><input type='text' name='fee1' class='form-control required' oninput="this.className = 'form-control required'" style='text-transform:uppercase'></td>
                                                                <td><select type='char' name='feestatus1' class='form-control required' oninput="this.className = 'form-control required'">
                                                                        <option>A</option>
                                                                        <option>B</option>
                                                                        <option>C</option>
                                                                        <option>D</option>
                                                                    </select></td>
                                                                <td><input type='number' step='0.1' name='totalscholarship1' class='form-control required' oninput="this.className = 'form-control required'"></td>
                                                            </tr>
                                                            <tbody id="tbody"></tbody>
                                                        </table>

                                                    </div>

                                                    <button style="float:right" class="btn btn-success" type="button" onclick="addItem();">Tambah</button>

                                                    <button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>

                                                    <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>

                                                </div>

                                                <div id="pengakuan" class="content tab" role="tabpanel" aria-labelledby="pengakuan-trigger">

                                                    <div class="icheck-success d-inline">
                                                        <input required type="checkbox" id="checkboxSuccess3">
                                                        <label for="checkboxSuccess3">
                                                            SAYA DENGAN INI MENGAKU SEGALA MAKLUMAT YANG DIBERI ADALAH BENAR <br> DAN BERSEDIA DIAMBIL TINDAKAN TATATERTIB JIKA TERDAPAT PEMALSUAN DOKUMEN DAN MAKLUMAN.
                                                        </label>

                                                        <br><br>
                                                    </div>


                                                    <button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>

                                                    <input class="btn btn-success" type="submit" id="submit" name="submit" value="Mohon">

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer.php' ?>
    </div>


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
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- BS-Stepper -->
    <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- jquery-validation -->
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


    <!-- ADD ROW IN TABLE -->
    <script>
        $('.totIncome').on('keyup keydown', function() {
            if ($(this).val() > 10000) {
                //alert($(this).val())

            }
        })

        var items = 1;

        var username = "<?php echo $_SESSION['username']; ?>"

        function addItem() {
            items++;
            //value ="'+username +'"

            var html = "<tr>";
            html += "<td>" + items + "</td>";

            html += '<td><input type="text" name="familymembersname[]" class="form-control required" oninput="this.className ="form-control required"" style="text-transform: uppercase"</td>';

            html += "<td><input type='text' name='institutename[]'class='form-control required' oninput='this.className = 'form-control required'' style='text-transform: uppercase'></td>";

            html += "<td><input type='number' name='yearstudy[]' class='form-control required' oninput='this.className = 'form-control required''></td>";

            html += "<td><input type='text' name='fee[]' class='form-control required' oninput='this.className = 'form-control required'' style='text-transform:uppercase'></td>";

            html += "<td><select type='char' name='feestatus[]' class='form-control required' oninput='this.className = 'form-control required''> <option>A</option> <option>B</option> <option>C</option><option>D</option></select></td>";

            html += "<td><input type='number' step='0.1' name='totalscholarship[]' class='form-control required' oninput='this.className = 'form-control required''></td>";

            html += "<td><button type='text' class='btn btn-danger' type='button' onclick='deleteRow(this);'><i class='fas fa-trash'></i></button></td>";

            html += "</tr>";

            var row = document.getElementById("tbody").insertRow();
            row.innerHTML = html;
        }

        function deleteRow(button) {
            items--
            button.parentElement.parentElement.remove();
            // first parentElement will be td and second will be tr.
        }
    </script>

    <script>
        function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2({
                tags: true,
            })


            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script>
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>

    <script>
        //Tutorial Azri
        $(document).ready(function() {
            $('#tunjuklah').hide();
        });

        function showInput(e) {
            if (e.value == "Pasukan Beruniform") {
                $(document).ready(function() {
                    $('#tunjuklah').show();
                });
            } else {
                $('#tunjuklah').hide();
            }
        }
    </script>

    <!-- VALIDATE LU BRO -->
    <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {}
            });
        });
    </script>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByClassName("required");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <script>
        $(".nextsubmit").bind("click", function() {
            addItem()
        });
    </script>



    <?php
    include 'connection.php';

    function checkDateReg($conn)
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $todayDate = date('Y-m-d');
        $todayDate = date('Y-m-d', strtotime($todayDate));

        $checkDate = "SELECT * FROM tarikhppk";
        $resultDate = $conn->query($checkDate);
        if ($resultDate->num_rows > 0) {

            while ($row = $resultDate->fetch_assoc()) {
                $dateopen = date('Y-m-d', strtotime($row['dateopen']));
                $dateclose = date('Y-m-d', strtotime($row['dateclose']));
            }
        }

        $found = false;
        $register = "SELECT * FROM tarikhppk WHERE '$todayDate' BETWEEN '" . $dateopen . "' AND '" . $dateclose . "'";
        $qry = mysqli_query($conn, $register);
        $rowe = mysqli_num_rows($qry);

        if ($rowe > 0) {
            $found = true;
        }
        return $found;
    }

    function checkUserID($conn, $userid)
    {
        $found = false;
        $register = "SELECT * FROM ppk WHERE userid = '" . $userid . "'";
        $qry = mysqli_query($conn, $register);
        $row = mysqli_num_rows($qry);

        if ($row > 0) {
            $found = true;
        }
        return $found;
    }

    if (isset($_POST['submit'])) {

        $username = $_SESSION['username'];
        $userid = $_SESSION['userid'];
        $userpart = $_SESSION['userpart'];
        $userprogramme = $_SESSION['userprogramme'];
        $useric = $_SESSION['useric'];
        $userphoneno = $_SESSION['userphoneno'];
        if (!isset($_POST['usercgpa'])) {
            $usercgpa = null;
        } else {
            $usercgpa = $_POST['usercgpa'];
        }
        if (!isset($_POST['usergpa'])) {
            $usergpa = null;
        } else {
            $usergpa = $_POST['usergpa'];
        }
        $userstatusedu = $_POST['userstatusedu'];
        $houseaddress = strtoupper($_POST['houseaddress']);
        $familyphoneno = $_POST['familyphoneno'];
        $fatherusername = $_POST['fathername'];
        $fatherwork = $_POST['fatherwork'];
        $fatherincome = $_POST['fatherincome'];
        $motherusername = $_POST['mothername'];
        $motherwork = $_POST['motherwork'];
        $motherincome = $_POST['motherincome'];
        $totalincome = $_POST['totalincome'];
        $totalsiblings = $_POST['totalsiblings'];
        $siblingsnumber = $_POST['siblingsnumber'];
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $todayDate = date('Y-m-d');
        $newDate = date('Y-m-d', strtotime($todayDate));
        $fathername = $_FILES['fatherincomefile']['name'];
        $mothername = $_FILES['motherincomefile']['name'];


        if (!checkDateReg($conn)) {
    ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
            <script>
                var text = '<b>Permohonan Sudah Ditutup !</b>';
                Swal.fire({
                    html: "" + text + "",
                    icon: "success",
                    showDenyButton: false,
                    confirmButtonText: "Okay",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "semakstatus.php";
                    } else {
                        window.location.href = "semakstatus.php";
                    }
                })
            </script>
        <?php
        } else if (checkUserID($conn, $userid)) {
        ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
            <script>
                var text = '<b>Anda Sudah Memohon !</b><br> <small>Permohonan Anda Sedang Diproses</small>';
                Swal.fire({
                    html: "" + text + "",
                    icon: "success",
                    showDenyButton: false,
                    confirmButtonText: "Okay",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "semakstatus.php";
                    } else {
                        window.location.href = "semakstatus.php";
                    }
                })
            </script>
            <?php
        } else if (isset($usercgpa) == null && isset($usergpa) == null) { // Pelajar Part 1
            //upload file
            if ($fathername != null || $mothername != null) {
                $ext = pathinfo($fathername, PATHINFO_EXTENSION);
                $ext = pathinfo($mothername, PATHINFO_EXTENSION);
                $allowed = array('pdf');
                //check if file type is valid
                if (in_array($ext, $allowed)) {

                    //Rename the file
                    $tempfather = explode(".", $_FILES["fatherincomefile"]["name"]);
                    $newfathername = $userid . '_' . $userpart . '_PCB' . '.' . end($tempfather);
                    $tempmother = explode(".", $_FILES["fatherincomefile"]["name"]);
                    $newmothername = $userid . '_' . $userpart . '_PCI' . '.' . end($tempmother);

                    $checkfather = strtolower(end($tempfather));
                    $checkfather = strtolower(end($tempfather));


                    //set target directory
                    $path = 'uploads/';
                    move_uploaded_file($_FILES['fatherincomefile']['tmp_name'], ($path . $newfathername));
                    move_uploaded_file($_FILES['motherincomefile']['tmp_name'], ($path . $newmothername));

                    $ppk = "INSERT INTO ppk VALUES (null,'$username','$userid','$userprogramme','$useric','$userphoneno',null,null,'$userstatusedu',null,null,'$houseaddress','$familyphoneno','$fatherusername','$fatherwork','$fatherincome','$newfathername','$motherusername','$motherwork','$motherincome','$newmothername','$totalincome','$totalsiblings','$siblingsnumber','$newDate','PENDING','PENGURANGAN',null)";
                    $result = $conn->query($ppk);

                    $sql2 = "SELECT ppkid FROM ppk ORDER BY ppkid DESC LIMIT 1";
                    $last_id = mysqli_query($conn, $sql2);

                    if (mysqli_num_rows($last_id) == 1) {
                        while ($row = mysqli_fetch_assoc($last_id)) {
                            $ppkid = $row["ppkid"];
                        }
                    }
                    $familymembersname1 = strtoupper($_POST['familymembersname1']);
                    $institutename1 = strtoupper($_POST['institutename1']);
                    $yearstudy1 = $_POST['yearstudy1'];
                    $fee1 = strtoupper($_POST['fee1']);
                    $feestatus1 = $_POST['feestatus1'];
                    $totalscholarship1 = $_POST['totalscholarship1'];

                    $noArray = "INSERT INTO family VALUES(null,'$userid','$familymembersname1', '$institutename1', '$yearstudy1', '$fee1', '$feestatus1', '$totalscholarship1', '$ppkid')";
                    $result = $conn->query($noArray);

                    if (isset($_POST['familymembersname'])) {
                        for ($a = 0; $a < count($_POST["familymembersname"]); $a++) {
                            $sql = "INSERT INTO family VALUES (null, '" . $userid . "', '" . $_POST["familymembersname"][$a] . "', '" . $_POST["institutename"][$a] . "', '" . $_POST["yearstudy"][$a] . "', '" . $_POST["fee"][$a] . "', '" . $_POST["feestatus"][$a] . "', '" . $_POST["totalscholarship"][$a] . "','" . $ppkid . "')";
                            mysqli_query($conn, $sql);
                        }
                    }
            ?>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
                    <script>
                        var text = '<b>Permohonan Berjaya !</b><br> <small>Permohonan Anda Berjaya Dihantar dan Sedang Diproses</small>';
                        Swal.fire({
                            html: "" + text + "",
                            icon: "success",
                            showDenyButton: false,
                            confirmButtonText: "Okay",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "semakstatus.php";
                            } else {
                                window.location.href = "semakstatus.php";
                            }
                        })
                    </script>
                <?php
                } else {

                ?>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
                    <script>
                        var text = '<b>Fail Mestilah Dalam Bentuk PDF Sahaja !</b>';
                        Swal.fire({
                            html: "" + text + "",
                            icon: "success",
                            showDenyButton: false,
                            confirmButtonText: "Okay",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "pengurangan.php";
                            } else {
                                window.location.href = "pengurangan.php";
                            }
                        })
                    </script>
                <?php
                }
            } else {
                $ppk = "INSERT INTO ppk VALUES (null,'$username','$userid','$userprogramme','$useric','$userphoneno',null,null,'$userstatusedu',null,null,'$houseaddress','$familyphoneno','$fatherusername','$fatherwork','$fatherincome',null,'$mothername','$motherwork','$motherincome',null,'$totalincome','$totalsiblings','$siblingsnumber','$newDate','PENDING','PENGURANGAN',null)";
                $result = $conn->query($ppk);


                $sql2 = "SELECT ppkid FROM ppk ORDER BY ppkid DESC LIMIT 1";
                $last_id = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($last_id) == 1) {
                    while ($row = mysqli_fetch_assoc($last_id)) {
                        $ppkid = $row["ppkid"];
                    }
                }
                $familymembersname1 = strtoupper($_POST['familymembersname1']);
                $institutename1 = strtoupper($_POST['institutename1']);
                $yearstudy1 = $_POST['yearstudy1'];
                $fee1 = strtoupper($_POST['fee1']);
                $feestatus1 = $_POST['feestatus1'];
                $totalscholarship1 = $_POST['totalscholarship1'];

                $noArray = "INSERT INTO family VALUES(null,'$userid','$familymembersname1', '$institutename1', '$yearstudy1', '$fee1', '$feestatus1', '$totalscholarship1', '$ppkid')";
                $result = $conn->query($noArray);

                if (isset($_POST['familymembersname'])) {
                    for ($a = 0; $a < count($_POST["familymembersname"]); $a++) {
                        $sql = "INSERT INTO family VALUES (null, '" . $userid . "', '" . $_POST["familymembersname"][$a] . "', '" . $_POST["institutename"][$a] . "', '" . $_POST["yearstudy"][$a] . "', '" . $_POST["fee"][$a] . "', '" . $_POST["feestatus"][$a] . "', '" . $_POST["totalscholarship"][$a] . "','" . $ppkid . "')";
                        mysqli_query($conn, $sql);
                    }
                }

                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
                <script>
                    var text = '<b>Permohonan Berjaya !</b><br> <small>Permohonan Anda Berjaya Dihantar dan Sedang Diproses</small>';
                    Swal.fire({
                        html: "" + text + "",
                        icon: "success",
                        showDenyButton: false,
                        confirmButtonText: "Okay",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "semakstatus.php";
                        } else {
                            window.location.href = "semakstatus.php";
                        }
                    })
                </script>
                <?php
            }
        } else if ($usercgpa != null && $usergpa != null) { // Pelajar Atas Part 1
            //upload file
            if ($fathername != null || $mothername != null) {
                $ext = pathinfo($fathername, PATHINFO_EXTENSION);
                $ext = pathinfo($mothername, PATHINFO_EXTENSION);
                $allowed = array('pdf');
                //check if file type is valid
                if (in_array($ext, $allowed)) {

                    //Rename the file
                    $tempfather = explode(".", $_FILES["fatherincomefile"]["name"]);
                    $newfathername = $userid . '_' . $userpart . '_PCB' . '.' . end($tempfather);
                    $tempmother = explode(".", $_FILES["fatherincomefile"]["name"]);
                    $newmothername = $userid . '_' . $userpart . '_PCI' . '.' . end($tempmother);

                    $checkfather = strtolower(end($tempfather));
                    $checkfather = strtolower(end($tempfather));


                    //set target directory
                    $path = 'uploads/';
                    move_uploaded_file($_FILES['fatherincomefile']['tmp_name'], ($path . $newfathername));
                    move_uploaded_file($_FILES['motherincomefile']['tmp_name'], ($path . $newmothername));

                    $ppk = "INSERT INTO ppk VALUES (null,'$username','$userid','$userprogramme','$useric','$userphoneno','$usergpa','$usercgpa','$userstatusedu',null,null,'$houseaddress','$familyphoneno','$fatherusername','$fatherwork','$fatherincome','$newfathername','$motherusername','$motherwork','$motherincome','$newmothername','$totalincome','$totalsiblings','$siblingsnumber','$newDate','PENDING','PENGURANGAN',null)";
                    $result = $conn->query($ppk);


                    $sql2 = "SELECT ppkid FROM ppk ORDER BY ppkid DESC LIMIT 1";
                    $last_id = mysqli_query($conn, $sql2);

                    if (mysqli_num_rows($last_id) == 1) {
                        while ($row = mysqli_fetch_assoc($last_id)) {
                            $ppkid = $row["ppkid"];
                        }
                    }
                    $familymembersname1 = strtoupper($_POST['familymembersname1']);
                    $institutename1 = strtoupper($_POST['institutename1']);
                    $yearstudy1 = $_POST['yearstudy1'];
                    $fee1 = strtoupper($_POST['fee1']);
                    $feestatus1 = $_POST['feestatus1'];
                    $totalscholarship1 = $_POST['totalscholarship1'];

                    $noArray = "INSERT INTO family VALUES(null,'$userid','$familymembersname1', '$institutename1', '$yearstudy1', '$fee1', '$feestatus1', '$totalscholarship1', '$ppkid')";
                    $result = $conn->query($noArray);

                    if (isset($_POST['familymembersname'])) {
                        for ($a = 0; $a < count($_POST["familymembersname"]); $a++) {
                            $sql = "INSERT INTO family VALUES (null, '" . $userid . "', '" . $_POST["familymembersname"][$a] . "', '" . $_POST["institutename"][$a] . "', '" . $_POST["yearstudy"][$a] . "', '" . $_POST["fee"][$a] . "', '" . $_POST["feestatus"][$a] . "', '" . $_POST["totalscholarship"][$a] . "','" . $ppkid . "')";
                            mysqli_query($conn, $sql);
                        }
                    }

                ?>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
                    <script>
                        var text = '<b>Permohonan Berjaya !</b><br> <small>Permohonan Anda Berjaya Dihantar dan Sedang Diproses</small>';
                        Swal.fire({
                            html: "" + text + "",
                            icon: "success",
                            showDenyButton: false,
                            confirmButtonText: "Okay",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "semakstatus.php";
                            } else {
                                window.location.href = "semakstatus.php";
                            }
                        })
                    </script>
                <?php
                } else {

                ?>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
                    <script>
                        var text = '<b>Fail Mestilah Dalam Bentuk PDF Sahaja !</b>';
                        Swal.fire({
                            html: "" + text + "",
                            icon: "success",
                            showDenyButton: false,
                            confirmButtonText: "Okay",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "pengurangan.php";
                            } else {
                                window.location.href = "pengurangan.php";
                            }
                        })
                    </script>
                <?php
                }
            } else {
                $ppk = "INSERT INTO ppk VALUES (null,'$username','$userid','$userprogramme','$useric','$userphoneno','$usergpa','$usercgpa','$userstatusedu',null,null,'$houseaddress','$familyphoneno','$fatherusername','$fatherwork','$fatherincome',null,'$mothername','$motherwork','$motherincome',null,'$totalincome','$totalsiblings','$siblingsnumber','$newDate','PENDING','PENGURANGAN',null)";
                $result = $conn->query($ppk);


                $sql2 = "SELECT ppkid FROM ppk ORDER BY ppkid DESC LIMIT 1";
                $last_id = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($last_id) == 1) {
                    while ($row = mysqli_fetch_assoc($last_id)) {
                        $ppkid = $row["ppkid"];
                    }
                }
                $familymembersname1 = strtoupper($_POST['familymembersname1']);
                $institutename1 = strtoupper($_POST['institutename1']);
                $yearstudy1 = $_POST['yearstudy1'];
                $fee1 = strtoupper($_POST['fee1']);
                $feestatus1 = $_POST['feestatus1'];
                $totalscholarship1 = $_POST['totalscholarship1'];

                $noArray = "INSERT INTO family VALUES(null,'$userid','$familymembersname1', '$institutename1', '$yearstudy1', '$fee1', '$feestatus1', '$totalscholarship1', '$ppkid')";
                $result = $conn->query($noArray);

                if (isset($_POST['familymembersname'])) {
                    for ($a = 0; $a < count($_POST["familymembersname"]); $a++) {
                        $sql = "INSERT INTO family VALUES (null, '" . $userid . "', '" . $_POST["familymembersname"][$a] . "', '" . $_POST["institutename"][$a] . "', '" . $_POST["yearstudy"][$a] . "', '" . $_POST["fee"][$a] . "', '" . $_POST["feestatus"][$a] . "', '" . $_POST["totalscholarship"][$a] . "','" . $ppkid . "')";
                        mysqli_query($conn, $sql);
                    }
                }

                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
                <script>
                    var text = '<b>Permohonan Berjaya !</b><br> <small>Permohonan Anda Berjaya Dihantar dan Sedang Diproses</small>';
                    Swal.fire({
                        html: "" + text + "",
                        icon: "success",
                        showDenyButton: false,
                        confirmButtonText: "Okay",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "semakstatus.php";
                        } else {
                            window.location.href = "semakstatus.php";
                        }
                    })
                </script>
    <?php
            }
        }
    } else {
        echo "";
    }


    ?>

</body>

</html>