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
  <meta name="viewport" content="width=device-width, initial-scale=0.5">
  <title>e-ReRs | Pengecualian Bayaran Kolej</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <link rel="icon" type="image/x-icon" href="dist/img/2.ico" />


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</head>

<style>
  .swal-wide {
    display: flex !important;
  }
</style>

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

    <div class="modal fade" data-backdrop="static" data-keyboard="false" role='document' id="modalSemak">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><b>MAKLUMAT LENGKAP PERMOHONAN</b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times</span>
            </button>
          </div>
          <div class="modal-body">


            <div class="col-12 col-lg-12">
              <div class="card card-purple card-tabs">
                <div class="card-header p-0 pt-1">
                  <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                    <li class="pt-2 px-3">
                      <h3 class="card-title"><b>MAKLUMAT PEMOHON</b></h3>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" id="senarai-permohonan-tab" data-toggle="pill" href="#maklumat" role="tab" aria-controls="maklumat" aria-selected="true">MAKLUMAT LENGKAP</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-two-tabContent">
                    <div class="tab-pane fade show active" id="maklumat" role="tabpanel" aria-labelledby="maklumat-tab">
                      <div class="card-body">

                        <table class="table table-bordered table-sm">
                          <tr>
                            <th colspan=6 style="background-color:#a29bfe">A. BUTIRAN PEMOHON</th>
                          </tr>
                          <tr>
                            <td colspan=1>
                              <b>NAMA PENUH</b>
                            </td>
                            <td colspan=3>
                              <p id="username"></p>
                            </td>
                            <td colspan=1><b>NO. PELAJAR</b></td>
                            <td colspan=1>
                              <p id="userid"></p>
                            </td>
                          </tr>
                          </tr>
                          <tr>
                            <td colspan=3 rowspan=3>
                              <b><br>GPA/CGPA SEMESTER TERKINI</b>
                            </td>
                            <td colspan=1 rowspan=3>
                              <li>CGPA : <span style="width:50%" id="usergpa"></span></li>
                              <li>CGPA : <span style="width:50%" id="usercgpa"></span></li>
                            </td>
                            <td colspan=1><b>NO. TELEFON</b></td>
                            <td colspan=1>
                              <p id="userphoneno"></p>
                            </td>
                          </tr>
                          <tr>
                            <td colspan=1>
                              <b>NOMBOR IC</b>
                            </td>
                            <td colspan=1>
                              <p id="useric"></p>
                            </td>
                          </tr>
                          <tr>
                            <td colspan=1>
                              <b>KOD PROGRAM</b>
                            </td>
                            <td colspan=1>
                              <p id="userprogramme"></p>
                            </td>
                          </tr>

                        </table>
                        <table class=" table table-bordered table-sm">
                          <tr>
                            <th colspan=6 style="padding:20px"></th>
                          </tr>
                        </table>

                        <table class="table table-bordered table-sm">
                          <tr>
                            <th colspan=2 style="background-color:#a29bfe">B. STATUS PENGAJIAN</th>
                            <th colspan=4 style=" background-color:#a29bfe">C. KATEGORI</th>
                          </tr>
                          <tr>
                            <td colspan=2 style='text-transform:uppercase'>
                              <li><span style="width:50%" id="userstatusedu"></span></li>
                            </td>
                            <td colspan=2 style='text-transform:uppercase;'>
                              <li><span style="width:50%" id="usercategory"></span> : <span style="width:50%" id="usercategoryelse"></span></li>
                            </td>

                          </tr>
                          <tr>
                            <th colspan=4 style="padding:20px"></th>
                          </tr>
                        </table>

                        <table class="table table-bordered table-sm">
                          <tr>
                            <th colspan=4 style="background-color:#a29bfe">D. BUTIRAN IBU BAPA/PENJAGA</th>
                          </tr>
                          <tr>
                            <td colspan=><b>NO TELEFON IBU BAPA/PENJAGA</b></td>
                            <td colspan=>
                              <li><span id="familyphoneno"></span></li>
                            </td>
                          </tr>
                          <tr>
                            <td colspan=><b>ALAMAT RUMAH/KAMPUNG</b></td>
                            <td style='text-transform:uppercase'>
                              <li><span id="houseaddress"></span></li>
                            </td>
                          </tr>
                          <tr>
                            <td colspan=4 style=" padding:20px">
                            </td>
                          </tr>
                        </table>
                        <table class="table table-bordered table-sm text-center">
                          <tr>
                            <th>IBU/BAPA</th>
                            <th>NAMA</th>
                            <th>PEKERJAAN</th>
                            <th>PENDAPATAN SEBULAN(RM)</th>
                          </tr>
                          <tr>
                            <th>IBU</th>
                            <td style='text-transform:uppercase'>
                              <p id="mothername"></p>
                            </td>
                            <td style='text-transform:uppercase'>
                              <p id="motherwork"></p>
                            </td>
                            <td>
                              <p id="motherincome"></p>
                            </td>
                          </tr>
                          <tr>
                            <th>BAPA</th>
                            <td style='text-transform:uppercase'>
                              <p id="fathername"></p>
                            </td>
                            <td style='text-transform:uppercase'>
                              <p id="fatherwork"></p>
                            </td>
                            <td>
                              <p id="fatherincome"></p>
                            </td>
                          </tr>
                          <tr>
                            <th colspan=3 style="text-align:right">JUMLAH PENDAPATAN KELUARGA</th>
                            <td>
                              <p id="totalincome"></p>
                            </td>
                          </tr>
                        </table>

                        <table id="tablepenyata" class="table table-bordered table-sm">
                          <tr>
                            <th id="penyatapendapatanibu" style='width:20%'>PENYATA PENDAPATAN IBU</th>
                            <td>
                              <li id="motherincomefile"><span></span></li>
                            </td>
                            <th id="penyatapendapatanbapa" style='width:20%'>PENYATA PENDAPATAN BAPA</th>
                            <td>
                              <li id="fatherincomefile"><span></span></li>
                            </td>
                          </tr>
                          <tr>
                            <th colspan=4 style="padding:20px"></th>
                          </tr>
                        </table>

                        <table class="table table-bordered table-sm">
                          <tr>
                            <th colspan=4 style="padding:20px"></th>
                          </tr>
                        </table>

                        <table class="table table-bordered table-sm">
                          <tr>
                            <th colspan=4 style="background-color:#a29bfe">E. KEDUDUKAN & TANGGUNGAN KELUARGA</th>
                          </tr>
                          <tr>
                            <td style=" width:25%"><b>BILANGAN ADIK BERADIK</b></td>
                            <td style="width:25%">
                              <li><span id="totalsiblings"></span></li>
                            </td>
                            <td style="width:25%"><b>ANAK KE BERAPA</b></td>
                            <td style="width:25%">
                              <li><span id="siblingsnumber"></span></li>
                            </td>
                          </tr>
                        </table>

                        <table id="tableFamily" style="width:100%" class="table table-bordered table-sm text-center selected">
                          <tr>
                            <th colspan=6 style="padding:20px"></th>
                          </tr>
                          <tr>
                            <thead>
                              <th>#</th>
                              <th>NAMA ANAK YANG MASIH DITANGGUNG TERMASUK PEMOHON</th>
                              <th>NAMA SEK/IPTA/IPTS</th>
                              <th>TAHUN/SEM</th>
                              <th>PINJAMAN/BIASISWA/BANTUAN</th>
                              <th>STATUS<br><small>A - TELAH DAPAT<br>B - DALAM PROSES<br>C- TIDAK MOHON<br>D - DITOLAK/GAGAL</small></th>
                              <th>NILAI SETAHUN(RM)</th>
                          </tr>
                          </thead>

                        </table>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <br>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Tutup</button>
            <!-- <button type="button" class="btn btn-success">Teruskan</button> -->
          </div>
        </div>
      </div>
    </div>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><b>Pengecualian Bayaran Kolej</b></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pengecualian Bayaran</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->

        <div class="col-sm-12">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modaltarikhPermohonan"><i class="far fa-calendar-alt"></i> Tetapkan Tarikh Permohonan</button>

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
          <div class="bg-secondary shadow" style="padding:7px;border-radius:5px; float:right;">
            <div id="displaytarikhPermohonan">
              <?php echo "<b>Tarikh Permohonan :</b>" ?>
              <?php echo $newopenDate ?>
              <?php echo "hingga" ?>
              <?php echo $newcloseDate ?>
              <?php echo "<i>($sessionphp)</i>" ?>
            </div>
          </div>
        </div>
      </section>

      <form id="ajaxtarikhPermohonan">
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modaltarikhPermohonan">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header text-center bg-primary">
                <h4 class="modal-title w-100"><b>TARIKH PENGECUALIAN/PENGURANGAN</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>TARIKH PERMOHONAN DIBUKA :</label>
                  <input type="date" class="form-control" name="opendate" placeholder="Enter inbound date" required>
                </div>
                <div class="form-group">
                  <label>TARIKH PERMOHONAN TUTUP :</label>
                  <input type="date" class="form-control" name="closedate" placeholder="Enter inbound date" required>
                </div>
                <div class="form-group">
                  <label>SESI : </label>
                  <input type="text" class="form-control" name="session" placeholder="eg. MAC - OGOS 2022" required>
                </div>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="tutupModal">Tutup</button>

                <button type="submit" class="btn btn-success">Teruskan</button>
              </div>
            </div>
          </div>
        </div>
      </form>


      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card card-purple card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                <li class="pt-2 px-3">
                  <h3 class="card-title"><b><i class="fa fa-credit-card"></i></b></h3>
                </li>

                <li class="nav-item">
                  <a class="nav-link active" id="senarai-lainlain-tab" data-toggle="pill" href="#senarai-lainlain" role="tab" aria-controls="senarai-pendek" aria-selected="true">Lain - Lain</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="senarai-mpp-tab" data-toggle="pill" href="#senarai-mpp" role="tab" aria-controls="senarai-pendek" aria-selected="true">MPP</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="senarai-jpk-tab" data-toggle="pill" href="#senarai-jpk" role="tab" aria-controls="senarai-pendek" aria-selected="true">JPK</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="senarai-pasukanberuniform-tab" data-toggle="pill" href="#senarai-pasukanberuniform" role="tab" aria-controls="senarai-pendek" aria-selected="true">Pasukan Beruniform</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="senarai-oku-tab" data-toggle="pill" href="#senarai-oku" role="tab" aria-controls="senarai-pendek" aria-selected="true">Pelajar Kurang Upaya</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="senarai-atlit-tab" data-toggle="pill" href="#senarai-atlit" role="tab" aria-controls="senarai-pendek" aria-selected="true">Atlit (Wakil Negara / Uitm)</a>
                </li>
              </ul>
            </div>

            <div class="tab-content" id="custom-tabs-two-tabContent">

              <div class="tab-pane fade" id="senarai-mpp" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                <div class="card-body" style="overflow-x:auto">

                  <div style="overflow-x:auto;" class="card-body">
                    <table id="tablempp" style="width:100%" class="table table-bordered table-sm">
                      <thead style="background-color:#a29bfe">
                        <tr>
                          <th class="text-center" style="width:5%">BIL.</th>
                          <th style="width:20%">NAMA PELAJAR</th>
                          <th class="text-center" style="width:10%">NO. PELAJAR</th>
                          <th class="text-center" style="width:10%">BHG</th>
                          <th class="text-center" style="width:10%">PEMBIAYAAN</th>
                          <th class="text-center" style="width:10%">PENDAPATAN KELUARGA</th>
                          <th class="text-center" style="width:20%;">KEPUTUSAN</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="senarai-jpk" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                <div class="card-body" style="overflow-x:auto">

                  <div style="overflow-x:auto;" class="card-body">
                    <table id="tablejpk" style="width:100%" class="table table-bordered table-sm">
                      <thead style="background-color:#a29bfe">
                        <tr>
                          <th class="text-center" style="width:5%">BIL.</th>
                          <th style="width:20%">NAMA PELAJAR</th>
                          <th class="text-center" style="width:10%">NO. PELAJAR</th>
                          <th class="text-center" style="width:10%">BHG</th>
                          <th class="text-center" style="width:10%">PEMBIAYAAN</th>
                          <th class="text-center" style="width:10%">PENDAPATAN KELUARGA</th>
                          <th class="text-center" style="width:20%;">KEPUTUSAN</th>
                        </tr>
                      </thead>
                    </table>
                  </div>


                </div>
              </div>

              <div class="tab-pane fade" id="senarai-pasukanberuniform" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                <div class="card-body" style="overflow-x:auto">

                  <div style="overflow-x:auto;" class="card-body">
                    <table id="tablepasukanberuniform" style="width:100%" class="table table-bordered table-sm">
                      <thead style="background-color:#a29bfe">
                        <tr>
                          <th class="text-center" style="width:5%">BIL.</th>
                          <th style="width:20%">NAMA PELAJAR</th>
                          <th class="text-center" style="width:10%">NO. PELAJAR</th>
                          <th class="text-center" style="width:10%">BHG</th>
                          <th class="text-center" style="width:10%">PEMBIAYAAN</th>
                          <th class="text-center" style="width:10%">PENDAPATAN KELUARGA</th>
                          <th class="text-center" style="width:20%;">KEPUTUSAN</th>
                        </tr>
                      </thead>
                    </table>
                  </div>


                </div>
              </div>

              <div class="tab-pane fade" id="senarai-oku" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                <div class="card-body" style="overflow-x:auto">

                  <div style="overflow-x:auto;" class="card-body">
                    <table id="tableoku" style="width:100%" class="table table-bordered table-sm">
                      <thead style="background-color:#a29bfe">
                        <tr>
                          <th class="text-center" style="width:5%">BIL.</th>
                          <th style="width:20%">NAMA PELAJAR</th>
                          <th class="text-center" style="width:10%">NO. PELAJAR</th>
                          <th class="text-center" style="width:10%">BHG</th>
                          <th class="text-center" style="width:10%">PEMBIAYAAN</th>
                          <th class="text-center" style="width:10%">PENDAPATAN KELUARGA</th>
                          <th class="text-center" style="width:20%;">KEPUTUSAN</th>
                        </tr>
                      </thead>
                    </table>
                  </div>


                </div>
              </div>

              <div class="tab-pane fade" id="senarai-atlit" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                <div class="card-body" style="overflow-x:auto">

                  <div style="overflow-x:auto;" class="card-body">
                    <table id="tableatlit" style="width:100%" class="table table-bordered table-sm">
                      <thead style="background-color:#a29bfe">
                        <tr>
                          <th class="text-center" style="width:5%">BIL.</th>
                          <th style="width:20%">NAMA PELAJAR</th>
                          <th class="text-center" style="width:10%">NO. PELAJAR</th>
                          <th class="text-center" style="width:10%">BHG</th>
                          <th class="text-center" style="width:10%">PEMBIAYAAN</th>
                          <th class="text-center" style="width:10%">PENDAPATAN KELUARGA</th>
                          <th class="text-center" style="width:20%;">KEPUTUSAN</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>


              <div class="tab-pane fade show active" id="senarai-lainlain" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                <div class="card-body" style="overflow-x:auto">
                  <!-- <button class="btn btn-primary" onclick="myPrint()"><i class="fas fa-print"></i> CETAK</button> -->
                  <a class="btn btn-primary" target="_blank" href="pengecualianPrinte.php"><i class="fas fa-print"></i> CETAK</a>
                  <div style="overflow-x:auto;" class="card-body">
                    <table id="tablelainlain" style="width:100%" class="table table-bordered table-sm">
                      <thead style="background-color:#a29bfe">
                        <tr>
                          <th class="text-center" style="width:5%">BIL.</th>
                          <th style="width:20%">NAMA PELAJAR</th>
                          <th class="text-center" style="width:10%">NO. PELAJAR</th>
                          <th class="text-center" style="width:10%">BHG</th>
                          <th class="text-center" style="width:10%">PEMBIAYAAN</th>
                          <th class="text-center" style="width:10%">PENDAPATAN KELUARGA</th>
                          <th class="text-center" style="width:20%;">KEPUTUSAN</th>
                        </tr>
                      </thead>
                    </table>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
        <br>

    </div>
    </section>
    <!-- /.content-wrapper -->
    <?php include 'footer.php' ?>

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
  <script src="plugins/toastr/toastr.min.js"></script>

  <script>

    $(document).ready(function () {
      $('#senarai-lainlain-tab').click()
    });
    var ppkid
    var items = 1
    var namapemohon

    $(document).on('submit', '#ajaxtarikhPermohonan', function(e) {
      e.preventDefault();

      var formData = new FormData(this);
      formData.append("submit_ajaxtarikhPermohonan", true);

      $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {

          var res = jQuery.parseJSON(response);

          if (res.status == 100) {
            $('#modaltarikhPermohonan').modal('hide');
            $('#displaytarikhPermohonan').load(location.href + " #displaytarikhPermohonan");

            $('#tutupModal').trigger('click')

            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              customClass: 'swal-wide',
              timer: 3000,
            })

            Toast.fire({
              icon: 'success',
              html: '<b>TARIKH BERJAYA DITETAPKAN !</b>'
            })
          } else if (res.status == 200) {
            Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
            })

            Toast.fire({

              icon: 'success',
              title: '<b>Gagal !</b> ',
            })
          }

        }
      });

    });

    var split

    var countlain = 1

    $('#senarai-lainlain-tab').on('click', function() {
      tablelainlain = $('#tablelainlain').DataTable({
        "pageLength": 4,
        "destroy": true,
        "ajax": {
          'url': 'dataTableLainLain.php',
        },
        "columns": [{
            data: 'count',
            render: function(data, type, row) {
              result = '<div class="text-center">' + countlain++ + '</div>'
              return result
            }
          },
          {
            data: 'ppkid',
            render: function(data, type, row) {
              result = "<div class='text-center'><button style='background-color:white;border:none;color:blue' data-toggle='modal' data-target='#modalSemak' value='" + row.ppkid + "' class='semakBtn'>" + row.username + "</button></div>";
              return result;
            }
          },
          {
            data: 'userprogramme',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'userpart',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'fee',
            render: function(data, type, row) {
              var split = data.split(',')
              var splitted = split[0]
              result = '<div class="text-center" style="text-transform:uppercase">' + splitted + '</span></div>'
              return result
            }
          },
          {
            data: 'null',
            render: function(data, type, row) {
              var split = row.belajarmana.split(',')

              result = '<div class="text-center"> RM ' + row.totalincome + ' <br> ' + row.totalsiblings + ' BERADIK <br><span style="text-transform:uppercase">(' + row.belajarmana + ')</span></div>'
              return result
            }
          },
          {
            data: 'null',
            render: function(data, type, row) {
              result = "<form id='submitKeputusan'><input hidden name='inputppk' value=" + row.ppkid + " ><textarea name='inputKeputusan' class='form-control displayva' rows ='5'>" + row.keputusan + "</textarea> <br> <button type='submit' style='float:right' class='btn btn-success btn-sm'>Simpan</button></form>";
              return result;
            }
          },
        ]
      })
    });

    var countmpp = 1

    $('#senarai-mpp-tab').on('click', function() {
      tableMPP = $('#tablempp').DataTable({
        "pageLength": 4,
        "destroy": true,
        "ajax": {
          'url': 'dataTableMPP.php',
        },
        "columns": [{
            data: 'count',
            render: function(data, type, row) {
              result = '<div class="text-center">' + countmpp++ + '</div>'
              return result
            }
          },
          {
            data: 'ppkid',
            render: function(data, type, row) {
              result = "<div class='text-center'><button style='background-color:white;border:none;color:blue' data-toggle='modal' data-target='#modalSemak' value='" + row.ppkid + "' class='semakBtn'>" + row.username + "</button></div>";
              return result;
            }
          },
          {
            data: 'userprogramme',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'userpart',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'fee',
            render: function(data, type, row) {
              var split = data.split(',')
              var splitted = split[0]
              result = '<div class="text-center" style="text-transform:uppercase">' + splitted + '</span></div>'
              return result
            }
          },
          {
            data: 'null',
            render: function(data, type, row) {
              var split = row.belajarmana.split(',')

              result = '<div class="text-center"> RM ' + row.totalincome + ' <br> ' + row.totalsiblings + ' BERADIK <br><span style="text-transform:uppercase">(' + row.belajarmana + ')</span></div>'
              return result
            }
          },
          {
            data: 'ppkid',
            render: function(data, type, row) {
              result = "<form id='submitKeputusan'><input hidden name='inputppk' value=" + row.ppkid + " ><textarea name='inputKeputusan' class='form-control displayva' rows ='5'>" + row.keputusan + "</textarea> <br> <button type='submit' style='float:right' class='btn btn-success btn-sm'>Simpan</button></form>";
              return result;
            }
          },
        ]
      })
    });

    var countjpk = 1

    $('#senarai-jpk-tab').on('click', function() {
      tableJPK = $('#tablejpk').DataTable({
        "pageLength": 4,
        "destroy": true,
        "ajax": {
          'url': 'dataTableJPK.php',
        },
        "columns": [{
            data: 'count',
            render: function(data, type, row) {
              result = '<div class="text-center">' + countjpk++ + '</div>'
              return result
            }
          },
          {
            data: 'ppkid',
            render: function(data, type, row) {
              result = "<div class='text-center'><button style='background-color:white;border:none;color:blue' data-toggle='modal' data-target='#modalSemak' value='" + row.ppkid + "' class='semakBtn'>" + row.username + "</button></div>";
              return result;
            }
          },
          {
            data: 'userprogramme',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'userpart',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'fee',
            render: function(data, type, row) {
              var split = data.split(',')
              var splitted = split[0]
              result = '<div class="text-center" style="text-transform:uppercase">' + splitted + '</span></div>'
              return result
            }
          },
          {
            data: 'null',
            render: function(data, type, row) {
              var split = row.belajarmana.split(',')

              result = '<div class="text-center"> RM ' + row.totalincome + ' <br> ' + row.totalsiblings + ' BERADIK <br><span style="text-transform:uppercase">(' + row.belajarmana + ')</span></div>'
              return result
            }
          },
          {
            data: 'ppkid',
            render: function(data, type, row) {
              result = "<form id='submitKeputusan'><input hidden name='inputppk' value=" + row.ppkid + " ><textarea name='inputKeputusan' class='form-control displayva' rows ='5'>" + row.keputusan + "</textarea> <br> <button type='submit' style='float:right' class='btn btn-success btn-sm'>Simpan</button></form>";
              return result;
            }
          },
        ]
      })
    });

    var countuniform = 1

    $('#senarai-pasukanberuniform-tab').on('click', function() {
      tablePasukanBeruniform = $('#tablepasukanberuniform').DataTable({
        "pageLength": 4,
        "destroy": true,
        "ajax": {
          'url': 'dataTablePasukanBeruniform.php',
        },
        "columns": [{
            data: 'count',
            render: function(data, type, row) {
              result = '<div class="text-center">' + countuniform++ + '</div>'
              return result
            }
          },
          {
            data: 'ppkid',
            render: function(data, type, row) {
              result = "<div class='text-center'><button style='background-color:white;border:none;color:blue' data-toggle='modal' data-target='#modalSemak' value='" + row.ppkid + "' class='semakBtn'>" + row.username + "</button></div>";
              return result;
            }
          },
          {
            data: 'userprogramme',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'userpart',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'fee',
            render: function(data, type, row) {
              var split = data.split(',')
              var splitted = split[0]
              result = '<div class="text-center" style="text-transform:uppercase">' + splitted + '</span></div>'
              return result
            }
          },
          {
            data: 'null',
            render: function(data, type, row) {
              var split = row.belajarmana.split(',')

              result = '<div class="text-center"> RM ' + row.totalincome + ' <br> ' + row.totalsiblings + ' BERADIK <br><span style="text-transform:uppercase">(' + row.belajarmana + ')</span></div>'
              return result
            }
          },
          {
            data: 'ppkid',
            render: function(data, type, row) {
              result = "<form id='submitKeputusan'><input hidden name='inputppk' value=" + row.ppkid + " ><textarea name='inputKeputusan' class='form-control displayva' rows ='5'>" + row.keputusan + "</textarea> <br> <button type='submit' style='float:right' class='btn btn-success btn-sm'>Simpan</button></form>";
              return result;
            }
          },
        ]
      })
    });

    var countoku = 1

    $('#senarai-oku-tab').on('click', function() {
      tableoku = $('#tableoku').DataTable({
        "pageLength": 4,
        "destroy": true,
        "ajax": {
          'url': 'dataTableOku.php',
        },
        "columns": [{
            data: 'count',
            render: function(data, type, row) {
              result = '<div class="text-center">' + countoku++ + '</div>'
              return result
            }
          },
          {
            data: 'ppkid',
            render: function(data, type, row) {
              result = "<div class='text-center'><button style='background-color:white;border:none;color:blue' data-toggle='modal' data-target='#modalSemak' value='" + row.ppkid + "' class='semakBtn'>" + row.username + "</button></div>";
              return result;
            }
          },
          {
            data: 'userprogramme',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'userpart',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'fee',
            render: function(data, type, row) {
              var split = data.split(',')
              var splitted = split[0]
              result = '<div class="text-center" style="text-transform:uppercase">' + splitted + '</span></div>'
              return result
            }
          },
          {
            data: 'null',
            render: function(data, type, row) {
              var split = row.belajarmana.split(',')

              result = '<div class="text-center"> RM ' + row.totalincome + ' <br> ' + row.totalsiblings + ' BERADIK <br><span style="text-transform:uppercase">(' + row.belajarmana + ')</span></div>'
              return result
            }
          },
          {
            data: 'ppkid',
            render: function(data, type, row) {
              result = "<form id='submitKeputusan'><input hidden name='inputppk' value=" + row.ppkid + " ><textarea name='inputKeputusan' class='form-control displayva' rows ='5'>" + row.keputusan + "</textarea> <br> <button type='submit' style='float:right' class='btn btn-success btn-sm'>Simpan</button></form>";
              return result;
            }
          },
        ]
      })
    });

    var countatlit = 1

    $('#senarai-atlit-tab').on('click', function() {
      tableatlit = $('#tableatlit').DataTable({
        "pageLength": 4,
        "destroy": true,
        "ajax": {
          'url': 'dataTableAtlit.php',
        },
        "columns": [{
            data: 'count',
            render: function(data, type, row) {
              result = '<div class="text-center">' + countatlit++ + '</div>'
              return result
            }
          },
          {
            data: 'ppkid',
            render: function(data, type, row) {
              result = "<div class='text-center'><button style='background-color:white;border:none;color:blue' data-toggle='modal' data-target='#modalSemak' value='" + row.ppkid + "' class='semakBtn'>" + row.username + "</button></div>";
              return result;
            }
          },
          {
            data: 'userprogramme',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'userpart',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'fee',
            render: function(data, type, row) {
              var split = data.split(',')
              var splitted = split[0]
              result = '<div class="text-center" style="text-transform:uppercase">' + splitted + '</span></div>'
              return result
            }
          },
          {
            data: 'null',
            render: function(data, type, row) {
              var split = row.belajarmana.split(',')

              result = '<div class="text-center"> RM ' + row.totalincome + ' <br> ' + row.totalsiblings + ' BERADIK <br><span style="text-transform:uppercase">(' + row.belajarmana + ')</span></div>'
              return result
            }
          },
          {
            data: 'ppkid',
            render: function(data, type, row) {
              result = "<form id='submitKeputusan'><input hidden name='inputppk' value=" + row.ppkid + " ><textarea name='inputKeputusan' class='form-control displayva' rows ='5'>" + row.keputusan + "</textarea> <br> <button type='submit' style='float:right' class='btn btn-success btn-sm'>Simpan</button></form>";
              return result;
            }
          },
        ]
      })
    });



    $(document).on('click', '.semakBtn', function(e) {
      e.preventDefault()

      ppkid = $(this).val()

      $.ajax({
        type: "POST",
        url: 'fetchFamily.php',
        data: 'ppkid=' + ppkid,
        success: function(response) {

          var res = jQuery.parseJSON(response)

          if (res.status == 100) {

            $('#username').text(res.data.username);
            $('#userid').text(res.data.userid);
            $('#userphoneno').text(res.data.userphoneno);
            $('#useric').text(res.data.useric);
            $('#userprogramme').text(res.data.userprogramme);
            $('#usercgpa').text(res.data.usercgpa);
            $('#usergpa').text(res.data.usergpa);
            $('#userstatusedu').text(res.data.userstatusedu);
            $('#usercategory').text(res.data.usercategory);
            $('#usercategoryelse').text(res.data.usercategoryelse);
            $('#familyphoneno').text(res.data.familyphoneno);
            $('#houseaddress').text(res.data.houseaddress);
            $('#mothername').text(res.data.mothername);
            $('#motherwork').text(res.data.motherwork);
            $('#motherincome').text(res.data.motherincome);
            $('#fathername').text(res.data.fathername);
            $('#fatherwork').text(res.data.fatherwork);
            $('#fatherincome').text(res.data.fatherincome);
            $('#totalincome').text(res.data.totalincome);

            $('#usergpapenilai').text(res.data.usergpa);
            $('#usercgpapenilai').text(res.data.usercgpa);
            $('#totalincomepenilai').text(res.data.totalincome);
            $('#jumlahpenilai').text(res.data.totalincome);
            $('#bantuanpenilai').text(res.data.totalincome);
            $('#kategoripenilai').text(res.data.usercategory);
            $('#kategorielsepenilai').text(res.data.usercategoryelse);


            if ((res.data.motherincomefile) == null && (res.data.fatherincomefile) == null) {
              $(document).ready(function() {
                $('#tablepenyata').hide();

              });
            } else {
              $('#tablepenyata').show();

            }

            if ((res.data.motherincomefile) == null) {
              $(document).ready(function() {
                $('#motherincomefile').hide();
                $('#penyatapendapatanibu').hide();

              });
            } else {
              $('#motherincomefile').show();
              $('#penyatapendapatanibu').show();
              $('#motherincomefile').html('<a href="uploads/' + res.data.motherincomefile + '" target="_blank">Penyata Pendapatan Ibu</a>');

            }

            if ((res.data.fatherincomefile) == null) {
              $(document).ready(function() {
                $('#fatherincomefile').hide();
                $('#penyatapendapatanbapa').hide();
              });
            } else {
              $('#fatherincomefile').show();
              $('#penyatapendapatanbapa').show();
              $('#fatherincomefile').html('<a href="uploads/' + res.data.fatherincomefile + '" target="_blank">Penyata Pendapatan Bapa</a>');

            }

            $('#totalsiblings').text(res.data.totalsiblings);
            $('#siblingsnumber').text(res.data.siblingsnumber);


          } else {

          }


        }
      })


      //Table Family
      $(document).ready(function() {
        $('#tableFamily').dataTable({
          "processing": true,
          "ordering": false,
          "info": false,
          "paging": false,
          "searching": false,
          'destroy': true,
          "ajax": {
            'dataSrc': function(res) {
              var count = res.data.length;
              $('#tanggunganpenilai').text(count);
              return res.data
            },
            'type': 'POST',
            'url': 'fetchFamily.php',
            'data': {
              hantarppk: ppkid,
            },
          },
          "columns": [{
              data: 'userid',
              render: function(data, type, row) {
                result = '<div class="text-center">' + items++ + '</div>'
                return result
              }
            },
            {
              data: 'familymembersname',
              render: function(data, type, row, i) {
                result = '<div>' + data + '</div>'
                return result
              }

            },
            {
              data: 'institutename'
            },
            {
              data: 'yearstudy'
            },
            {
              data: 'fee'
            },
            {
              data: 'feestatus'
            },
            {
              data: 'totalscholarship'
            }
          ]
        });

      });


    });

    $(document).on('submit', '#submitKeputusan', function(e) {
      e.preventDefault()

      formData = new FormData(this)
      formData.append("submit_submitKeputusan", true)

      $.ajax({
        type: "POST",
        url: 'code.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {

          var res = jQuery.parseJSON(response)

          if (res.status == 100) {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              customClass: 'swal-wide',
              timer: 3000,
            })

            Toast.fire({
              icon: 'success',
              html: '<b>KEPUTUSAN BERJAYA DISIMPAN !</b>'
            })

          }
        }
      })
    });
  </script>

</body>

</html>