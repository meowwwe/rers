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
  <meta name="viewport" content="width=device-width, initial-scale=0.5">
  <title>e-ReRs | Akses </title>

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

  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  .swal-wide {
    display: flex !important;
  }
</style>

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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><b>Akses Rumah/Bilik</b></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Akses</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        <div class="col-sm-12">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalTarikh"><i class="far fa-calendar-alt"></i> Tetapkan Tarikh Permohonan</button>

          <?php
          include 'connection.php';
          $sql = "SELECT * FROM tarikhdaftar";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // OUTPUT DATA OF EACH ROW
            while ($row = $result->fetch_assoc()) {

              $openphp = $row['dateopen'];
              $newopenDate = date("d M Y", strtotime($openphp));

              $closephp = $row['dateclose'];
              $newcloseDate = date("d M Y", strtotime($closephp));
            }
          }
          ?>
          <div class="bg-secondary shadow" style="padding:7px;border-radius:5px; float:right">
            <div id="displayTarikh">
              <?php echo "<b>Tarikh Permohonan :</b>" ?>
              <?php echo $newopenDate ?>
              <?php echo "hingga" ?>
              <?php echo $newcloseDate ?>
            </div>
          </div>
        </div>
      </section>

      <form id="ajaxTarikhRumah">
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalTarikh">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header text-center bg-primary">
                <h4 class="modal-title w-100"><b>TARIKH PERMOHONAN BILIK/RUMAH</b></h4>
                <button type="button" class="close" data-dismiss="modal" id="tutupModal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>TARIKH PERMOHONAN DIBUKA :</label>
                  <input type="date" class="form-control" name="opendate" required>
                </div>
                <div class="form-group">
                  <label>TARIKH PERMOHONAN TUTUP :</label>
                  <input type="date" class="form-control" name="closedate" required>
                </div>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>

                <button type="submit" class="btn btn-primary">Teruskan</button>
              </div>
            </div>
          </div>
        </div>
      </form>

      <!-- Main content -->
      <section class="content" style="padding-bottom:5px">
        <div class="col-12 col-sm">
          <div class="card card-purple card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">MAT KILAU <small>04A</small></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">TUN TEJA 1 <small>08A</small></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">TUN TEJA 2 <small>09A</small></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-admin-tab" data-toggle="pill" href="#custom-tabs-one-admin" role="tab" aria-controls="custom-tabs-one-admin" aria-selected="false">RUANGAN <small>ADMIN</small></a>
                </li>
              </ul>
            </div>

            <div class="card-body" style="overflow-x:auto">
              <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-matkilau-tab">
                  <div class="card-body">
                    <h4><b>04A - MAT KILAU</b></h4>
                    <div class="row">
                      <div class="col-7 col-sm-2">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                          <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#mk1" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Aras 1</a>
                          <a class="nav-link" id="vert-tabs-mk2-tab" data-toggle="pill" href="#mk2" role="tab" aria-controls="vert-tabs-mk2" aria-selected="false">Aras 2</a>
                          <a class="nav-link" id="vert-tabs-mk3-tab" data-toggle="pill" href="#mk3" role="tab" aria-controls="vert-tabs-mk3" aria-selected="false">Aras 3</a>
                          <a class="nav-link" id="vert-tabs-mk4-tab" data-toggle="pill" href="#mk4" role="tab" aria-controls="vert-tabs-mk4" aria-selected="false">Aras 4</a>
                          <a class="nav-link" id="vert-tabs-mk5-tab" data-toggle="pill" href="#mk5" role="tab" aria-controls="vert-tabs-mk5" aria-selected="false">Aras 5</a>
                          <a class="nav-link" id="vert-tabs-mk6-tab" data-toggle="pill" href="#mk6" role="tab" aria-controls="vert-tabs-mk6" aria-selected="false">Aras 6</a>
                          <a class="nav-link" id="vert-tabs-mk7-tab" data-toggle="pill" href="#mk7" role="tab" aria-controls="vert-tabs-mk7" aria-selected="false">Aras 7</a>
                          <a class="nav-link" id="vert-tabs-mk8-tab" data-toggle="pill" href="#mk8" role="tab" aria-controls="vert-tabs-mk8" aria-selected="false">Aras 8</a>
                          <a class="nav-link" id="vert-tabs-mk9-tab" data-toggle="pill" href="#mk9" role="tab" aria-controls="vert-tabs-mk9" aria-selected="false">Aras 9</a>
                          <a class="nav-link" id="vert-tabs-mk10-tab" data-toggle="pill" href="#mk10" role="tab" aria-controls="vert-tabs-mk10" aria-selected="false">Aras 10</a>
                        </div>
                      </div>

                      <div class="col-7 col-sm-10">
                        <div class="tab-content" id="vert-tabs-tabContent">
                          <div class="tab-pane text-left fade show active" id="mk1" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                            <table id="ajaxmk1" style="width:100%" class="table table-bordered table-striped table-hover text-center">
                              <thead style="background-color:#a29bfe">
                                <tr>
                                  <th>BLOK</th>
                                  <th>TINGKAT</th>
                                  <th>NOMBOR RUMAH</th>
                                  <th>BILIK</th>
                                  <th>JUMLAH PELAJAR DALAM BILIK (MAX 2 ORANG)</th>
                                  <th>STATUS</th>
                                </tr>
                              </thead>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-tunteja1-tab">
                  <div class="card-body">
                    <h4><b>08A - TUN TEJA 1</b></h4>
                    <div class="row">
                      <div class="col-7 col-sm-2">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                          <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#tt11" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Aras 1</a>
                          <a class="nav-link" id="vert-tabs-tt12-tab" data-toggle="pill" href="#tt12" role="tab" aria-controls="vert-tabs-tt12" aria-selected="false">Aras 2</a>
                          <a class="nav-link" id="vert-tabs-tt13-tab" data-toggle="pill" href="#tt13" role="tab" aria-controls="vert-tabs-tt13" aria-selected="false">Aras 3</a>
                          <a class="nav-link" id="vert-tabs-tt14-tab" data-toggle="pill" href="#tt14" role="tab" aria-controls="vert-tabs-tt14" aria-selected="false">Aras 4</a>
                          <a class="nav-link" id="vert-tabs-tt15-tab" data-toggle="pill" href="#tt15" role="tab" aria-controls="vert-tabs-tt15" aria-selected="false">Aras 5</a>
                          <a class="nav-link" id="vert-tabs-tt16-tab" data-toggle="pill" href="#tt16" role="tab" aria-controls="vert-tabs-tt16" aria-selected="false">Aras 6</a>
                          <a class="nav-link" id="vert-tabs-tt17-tab" data-toggle="pill" href="#tt17" role="tab" aria-controls="vert-tabs-tt17" aria-selected="false">Aras 7</a>
                          <a class="nav-link" id="vert-tabs-tt18-tab" data-toggle="pill" href="#tt18" role="tab" aria-controls="vert-tabs-tt18" aria-selected="false">Aras 8</a>
                        </div>
                      </div>

                      <div class="col-7 col-sm-10">
                        <div class="tab-content" id="vert-tabs-tabContent">
                          <div class="tab-pane text-left fade show active" id="tt11" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                            <table id="ajaxteja1" style="width:100%" class="table table-bordered table-striped table-hover text-center">
                              <thead style="background-color:#a29bfe">
                                <tr>
                                  <th>BLOCK</th>
                                  <th>TINGKAT</th>
                                  <th>NOMBOR RUMAH</th>
                                  <th>BILIK</th>
                                  <th>JUMLAH PELAJAR DALAM BILIK (MAX 2 ORANG)</th>
                                  <th>STATUS</th>
                                </tr>
                              </thead>
                            </table>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-tunteja2-tab">
                  <div class="card-body">
                    <h4><b>09A - TUN TEJA 2</b></h4>
                    <div class="row">
                      <div class="col-7 col-sm-2">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                          <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#tt21" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Aras 1</a>
                          <a class="nav-link" id="vert-tabs-tt22-tab" data-toggle="pill" href="#tt22" role="tab" aria-controls="vert-tabs-tt22" aria-selected="false">Aras 2</a>
                          <a class="nav-link" id="vert-tabs-tt23-tab" data-toggle="pill" href="#tt23" role="tab" aria-controls="vert-tabs-tt23" aria-selected="false">Aras 3</a>
                          <a class="nav-link" id="vert-tabs-tt24-tab" data-toggle="pill" href="#tt24" role="tab" aria-controls="vert-tabs-tt24" aria-selected="false">Aras 4</a>
                          <a class="nav-link" id="vert-tabs-tt25-tab" data-toggle="pill" href="#tt25" role="tab" aria-controls="vert-tabs-tt25" aria-selected="false">Aras 5</a>
                          <a class="nav-link" id="vert-tabs-tt26-tab" data-toggle="pill" href="#tt26" role="tab" aria-controls="vert-tabs-tt26" aria-selected="false">Aras 6</a>
                          <a class="nav-link" id="vert-tabs-tt27-tab" data-toggle="pill" href="#tt27" role="tab" aria-controls="vert-tabs-tt27" aria-selected="false">Aras 7</a>
                          <a class="nav-link" id="vert-tabs-tt28-tab" data-toggle="pill" href="#tt28" role="tab" aria-controls="vert-tabs-tt28" aria-selected="false">Aras 8</a>
                          <a class="nav-link" id="vert-tabs-tt29-tab" data-toggle="pill" href="#tt29" role="tab" aria-controls="vert-tabs-tt29" aria-selected="false">Aras 9</a>
                        </div>
                      </div>

                      <div class="col-7 col-sm-10">
                        <div class="tab-content" id="vert-tabs-tabContent">
                          <div class="tab-pane text-left fade show active" id="tt21" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                            <table id="ajaxteja2" style="width:100%" class="table table-bordered table-striped table-hover text-center">
                              <thead style="background-color:#a29bfe">
                                <tr>
                                  <th>BLOCK</th>
                                  <th>TINGKAT</th>
                                  <th>NOMBOR RUMAH</th>
                                  <th>BILIK</th>
                                  <th>JUMLAH PELAJAR DALAM BILIK (MAX 2 ORANG)</th>
                                  <th>STATUS</th>
                                </tr>
                              </thead>
                            </table>
                          </div>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="custom-tabs-one-admin" role="tabpanel" aria-labelledby="custom-tabs-one-admin-tab">
                  <div class="row mb-2">

                    <div class="swiper">
                      <!-- Additional required wrapper -->
                      <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                          <div class="col-md-12">
                            <!-- general form elements -->
                            <center>
                              <h4 style="margin-top:15px"><b>SILA PILIH RUANGAN YANG INGIN DISEKAT</b></h4>
                            </center>
                            <form id="ajaxSekat">
                              <div class="card-body">
                                <div class="row" style="justify-content:center">
                                  <div class="form-group col-md-2">
                                    <center><label>BLOK</label></center>
                                    <center><img style="width:80%" src="dist/img/building.gif"></center>
                                    <select class="form-control" name="blockname" id="blok">
                                      <option value="" hidden selected="selected">-</option>
                                    </select>
                                  </div>

                                  <div class="form-group col-md-2">
                                    <center><label>TINGKAT</label></center>
                                    <center><img style="width:80%" src="dist/img/stairs.gif"></center>
                                    <select class="form-control" name="floornum" id="tingkat">
                                      <option value="" hidden selected="selected">-</option>
                                    </select>
                                  </div>

                                  <div class="form-group col-md-2">
                                    <center><label>RUMAH</label></center>
                                    <center><img style="width:80%" src="dist/img/home.gif"></center>
                                    <select class="form-control" name="housenum" id="rumah">
                                      <option value="" hidden selected="selected">-</option>
                                    </select>
                                  </div>

                                  <div class="form-group col-md-2">
                                    <center><label>BILIK</label></center>
                                    <center><img style="width:80%" src="dist/img/sleep.gif"></center>
                                    <select class="form-control" name="roomname">

                                      <option value="" hidden selected="selected">-</option>

                                      <?php

                                      include "connection.php";

                                      $room = "SELECT * FROM rooms";

                                      $result = $conn->query($room);

                                      ?>

                                      <?php

                                      if ($result->num_rows > 0) {

                                        while ($row = $result->fetch_assoc()) {

                                      ?>


                                          <option value="<?php echo $row['roomname'] ?>"><?php echo $row['roomname'] ?></option>

                                      <?php       }
                                      }

                                      ?>
                                    </select>
                                  </div>

                                  <div class="form-group col-md-2">
                                    <center><label>TUJUAN</label></center>
                                    <center><img style="width:80%" src="dist/img/speech-bubble.gif"></center>
                                    <select class="form-control" name="tujuan" required>
                                      <option value="" hidden selected="selected">-</option>
                                      <option value="3">SEKAT</option>
                                      <option value="4">KUARANTIN</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <center><button type="submit" class="btn btn-danger">Teruskan</button></center>
                              <br>


                            </form>
                          </div>

                        </div>

                        <div class="swiper-slide">
                          <div class="col-md-12">
                            <center>
                              <h4 style="margin-top:15px"><b>SILA PILIH RUANGAN YANG INGIN DINYAHSEKAT</b></h4>
                            </center>
                            <form id="ajaxNyahsekat">
                              <div class="card-body">
                                <div class="row" style="justify-content:center">
                                  <div class="form-group col-md-2">
                                    <center><label>BLOK</label></center>
                                    <center><img style="width:80%" src="dist/img/building.gif"></center>
                                    <select class="form-control" name="blockname" id="blok1">
                                      <option value="" hidden selected="selected">-</option>
                                    </select>
                                  </div>

                                  <div class="form-group col-md-2">
                                    <center><label>TINGKAT</label></center>
                                    <center><img style="width:80%" src="dist/img/stairs.gif"></center>
                                    <select class="form-control" name="floornum" id="tingkat1">

                                      <option value="" hidden selected="selected">-</option>

                                    </select>
                                  </div>

                                  <div class="form-group col-md-2">
                                    <center><label>RUMAH</label></center>
                                    <center><img style="width:80%" src="dist/img/home.gif"></center>
                                    <select class="form-control" name="housenum" id="rumah1">

                                      <option value="" hidden selected="selected">-</option>


                                    </select>
                                  </div>

                                  <div class="form-group col-md-2">
                                    <center><label>BILIK</label></center>
                                    <center><img style="width:80%" src="dist/img/sleep.gif"></center>
                                    <select class="form-control" name="roomname">

                                      <option value="" hidden selected="selected">-</option>

                                      <?php

                                      include "connection.php";

                                      $room = "SELECT * FROM rooms";

                                      $result = $conn->query($room);

                                      ?>

                                      <?php

                                      if ($result->num_rows > 0) {

                                        while ($row = $result->fetch_assoc()) {

                                      ?>


                                          <option value="<?php echo $row['roomname']; ?>"><?php echo $row['roomname']; ?></option>

                                      <?php       }
                                      }

                                      ?>
                                    </select>
                                  </div>
                                </div>

                              </div>
                              <center><button type="submit" name="submit" id="submit" class="btn btn-success">Teruskan</button></center>
                              <br>

                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-pagination"></div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include 'footer.php' ?>
    <!-- wrapper -->
  </div>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="plugins/toastr/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>

  <script type="module">
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js'
  </script>

  <script>
    const swiper = new Swiper('.swiper', {
      // Optional parameters
      direction: 'horizontal',
      loop: false,

      // If we need pagination
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      // And if we need scrollbar
      scrollbar: {
        el: '.swiper-scrollbar',
      },
    });
  </script>

  <script>
    var maleObject = {
      "04A": {
        "01": ["04", "10", "11", "13", "14"],
        "02": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
        "03": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
        "04": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
        "05": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
        "06": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
        "07": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "07", "22", "23", "24", "25"],
        "08": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "09", "22", "23", "24", "25"],
        "09": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
        "10": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
      },
      "08A": {
        "01": ["02", "03", "07", "08", "09", "11", "12", "14", "15", "16"],
        "02": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
        "03": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
        "04": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
        "05": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
        "06": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
        "07": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
        "08": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
      },
      "09A": {
        "01": ["01", "03", "04", "05", "09", "10", "11", "13", "29", "32"],
        "02": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "03": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "04": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "05": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "06": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "07": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "08": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "09": ["01", "03", "04", "05", "09", "10", "11", "13"],
      }
    }

    var femaleObject = {
      "04A": {
        "01": ["04", "10", "11", "13", "14"],
        "02": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
        "03": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
        "04": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
        "05": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
        "06": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
        "07": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "07", "22", "23", "24", "25"],
        "08": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "09", "22", "23", "24", "25"],
        "09": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
        "10": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "15", "17", "18", "22", "23", "24", "25"],
      },
      "08A": {
        "01": ["02", "03", "07", "08", "09", "11", "12", "14", "15", "16"],
        "02": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
        "03": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
        "04": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
        "05": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
        "06": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
        "07": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
        "08": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18"],
      },
      "09A": {
        "01": ["01", "03", "04", "05", "09", "10", "11", "13", "29", "32"],
        "02": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "03": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "04": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "05": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "06": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "07": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "08": ["01", "03", "04", "05", "09", "10", "11", "13", "14", "16", "17", "18", "22", "23", "24", "26"],
        "09": ["01", "03", "04", "05", "09", "10", "11", "13"],
      }
    }

    window.onload = function() {

      var blockmale = document.getElementById("blok"),
        floormale = document.getElementById("tingkat"),
        housemale = document.getElementById("rumah");

      for (var state in maleObject) {
        blockmale.options[blockmale.options.length] = new Option(state, state);
      }
      blockmale.onchange = function() {
        floormale.length = 1; // remove all options bar first
        housemale.length = 1; // remove all options bar first

        if (this.selectedIndex < 1) {
          floormale.options[0].text = "-"
          housemale.options[0].text = "-"
          return; // done   
        }
        floormale.options[0].text = "-"
        for (var county in maleObject[this.value]) {
          floormale.options[floormale.options.length] = new Option(county, county);
        }
        if (floormale.options.length == 2) {
          floormale.selectedIndex = 1;
          floormale.onchange();
        }

      }
      blockmale.onchange(); // reset in case page is reloaded
      floormale.onchange = function() {
        housemale.length = 1; // remove all options bar first
        if (this.selectedIndex < 1) {
          housemale.options[0].text = "-"
          return; // done   
        }
        housemale.options[0].text = "-"

        var cities = maleObject[blockmale.value][this.value];
        for (var i = 0; i < cities.length; i++) {
          housemale.options[housemale.options.length] = new Option(cities[i], cities[i]);
        }
        if (housemale.options.length == 2) {
          housemale.selectedIndex = 1;
          housemale.onchange();
        }
      }

      var blockfemale = document.getElementById("blok1"),
        floorfemale = document.getElementById("tingkat1"),
        housefemale = document.getElementById("rumah1");

      for (var state in femaleObject) {
        blockfemale.options[blockfemale.options.length] = new Option(state, state);
      }
      blockfemale.onchange = function() {
        floorfemale.length = 1; // remove all options bar first
        housefemale.length = 1; // remove all options bar first

        if (this.selectedIndex < 1) {
          floorfemale.options[0].text = "-"
          housefemale.options[0].text = "-"
          return; // done   
        }
        floorfemale.options[0].text = "-"
        for (var county in femaleObject[this.value]) {
          floorfemale.options[floorfemale.options.length] = new Option(county, county);
        }
        if (floorfemale.options.length == 2) {
          floorfemale.selectedIndex = 1;
          floorfemale.onchange();
        }

      }
      blockfemale.onchange(); // reset in case page is reloaded
      floorfemale.onchange = function() {
        housefemale.length = 1; // remove all options bar first
        if (this.selectedIndex < 1) {
          housefemale.options[0].text = "-"
          return; // done   
        }
        housefemale.options[0].text = "-"

        var cities = femaleObject[blockfemale.value][this.value];
        for (var i = 0; i < cities.length; i++) {
          housefemale.options[housefemale.options.length] = new Option(cities[i], cities[i]);
        }
        if (housefemale.options.length == 2) {
          housefemale.selectedIndex = 1;
          housefemale.onchange();
        }
      }
    }
  </script>

  <script>
    $(document).on('submit', '#ajaxTarikhRumah', function(e) {
      e.preventDefault();

      var formData = new FormData(this);
      formData.append("submit_ajaxTarikhRumah", true);

      $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {

          var res = jQuery.parseJSON(response);
          if (res.status == 100) {

            $('#modalTarikh').modal('hide');
            $('#displayTarikh').load(location.href + " #displayTarikh");


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
            alert(res.message);
          }
        }
      });

    });
  </script>

  <script>
    var table;
    var valueTable = 'Aras 1';
    var subValueTable;

    $(document).ready(function () {
      $('#custom-tabs-one-home-tab').click()
    });


    $('#custom-tabs-one-home-tab').on('click', function() {
      $('#custom-tabs-one-home a').on('click', function() {
        valueTable = $(this).text();
        subValueTable = valueTable.substr(5);
        $(document).ready(function() {
          table = $('#ajaxmk1').DataTable({
            "pageLength": 4,
            "destroy": true,
            "ajax": {
              'type': 'POST',
              'url': 'dataTable04A.php',
              'data': {
                mk1: String(subValueTable),
              },
            },
            "columns": [{
                data: 'blockname'
              },
              {
                data: 'floornum'
              },
              {
                data: 'housenum'
              },
              {
                data: 'roomname'
              },
              {
                data: 'slotnum'
              },
              {
                data: 'rstatusid',
                render: function(data, type, row) {
                  if (data == 1) {
                    result = "<button style='cursor:default' class='btn btn-success btn-sm'>Available</button>";
                  } else if (data == 3) {
                    result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Blocked</button>";
                  } else if (data == 4) {
                    result = "<button style='cursor:default' class='btn btn-warning btn-sm'>Kuarantin</button>";
                  } else {
                    result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Occupied</button>";
                  }
                  return result;
                }
              }
            ]
          })
        });
      });

      $(document).ready(function() {
        table = $('#ajaxmk1').DataTable({
          "pageLength": 4,
          "destroy": true,
          "ajax": {
            'type': 'POST',
            'url': 'dataTable04A.php'
          },
          "columns": [{
              data: 'blockname'
            },
            {
              data: 'floornum'
            }, {
              data: 'housenum'
            },
            {
              data: 'roomname'
            },
            {
              data: 'slotnum'
            },
            {
              data: 'rstatusid',
              render: function(data, type, row) {
                if (data == 1) {
                  result = "<button style='cursor:default' class='btn btn-success btn-sm'>Available</button>";
                } else if (data == 3) {
                  result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Blocked</button>";
                } else if (data == 4) {
                  result = "<button style='cursor:default' class='btn btn-warning btn-sm'>Kuarantin</button>";
                } else {
                  result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Occupied</button>";
                }
                return result;
              }
            }
          ]
        })
      });
    });

    $('#custom-tabs-one-profile-tab').on('click', function() {
      $('#custom-tabs-one-profile a').on('click', function() {
        valueTable = $(this).text();
        subValueTable = valueTable.substr(5);
        $(document).ready(function() {
          table = $('#ajaxteja1').DataTable({
            "pageLength": 4,
            "destroy": true,
            "ajax": {
              'type': 'POST',
              'url': 'dataTable08A.php',
              'data': {
                tt1: String(subValueTable),
              },
            },
            "columns": [{
                data: 'blockname'
              },
              {
                data: 'floornum'
              },
              {
                data: 'housenum'
              },
              {
                data: 'roomname'
              },
              {
                data: 'slotnum'
              },
              {
                data: 'rstatusid',
                render: function(data, type, row) {
                  if (data == 1) {
                    result = "<button style='cursor:default' class='btn btn-success btn-sm'>Available</button>";
                  } else if (data == 3) {
                    result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Blocked</button>";
                  } else if (data == 4) {
                    result = "<button style='cursor:default' class='btn btn-warning btn-sm'>Kuarantin</button>";
                  } else {
                    result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Occupied</button>";
                  }
                  return result;
                }
              }
            ]
          })
        });
      });

      table = $('#ajaxteja1').DataTable({
        "pageLength": 4,
        "destroy": true,
        "ajax": {
          'type': 'POST',
          'url': 'dataTable08A.php'
        },
        "columns": [{
            data: 'blockname'
          },
          {
            data: 'floornum'
          },
          {
            data: 'housenum'
          },
          {
            data: 'roomname'
          },
          {
            data: 'slotnum'
          },
          {
            data: 'rstatusid',
            render: function(data, type, row) {
              if (data == 1) {
                result = "<button style='cursor:default' class='btn btn-success btn-sm'>Available</button>";
              } else if (data == 3) {
                result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Blocked</button>";
              } else if (data == 4) {
                result = "<button style='cursor:default' class='btn btn-warning btn-sm'>Kuarantin</button>";
              } else {
                result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Occupied</button>";
              }
              return result;
            }
          }
        ]

      });
    });

    $('#custom-tabs-one-messages-tab').on('click', function() {
      $('#custom-tabs-one-messages a').on('click', function() {
        valueTable = $(this).text();
        subValueTable = valueTable.substr(5);
        $(document).ready(function() {
          table = $('#ajaxteja2').DataTable({
            "pageLength": 4,
            "destroy": true,
            "ajax": {
              'type': 'POST',
              'url': 'dataTable09A.php',
              'data': {
                tt2: String(subValueTable),
              },
            },
            "columns": [{
                data: 'blockname'
              },
              {
                data: 'floornum'
              },
              {
                data: 'housenum'
              },
              {
                data: 'roomname'
              },
              {
                data: 'slotnum'
              },
              {
                data: 'rstatusid',
                render: function(data, type, row) {
                  if (data == 1) {
                    result = "<button style='cursor:default' class='btn btn-success btn-sm'>Available</button>";
                  } else if (data == 3) {
                    result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Blocked</button>";
                  } else if (data == 4) {
                    result = "<button style='cursor:default' class='btn btn-warning btn-sm'>Kuarantin</button>";
                  } else {
                    result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Occupied</button>";
                  }
                  return result;
                }
              }
            ]
          })
        });
      });
      table = $('#ajaxteja2').DataTable({
        "pageLength": 4,
        "destroy": true,
        "ajax": {
          'type': 'POST',
          'url': 'dataTable09A.php'
        },
        "columns": [{
            data: 'blockname'
          },
          {
            data: 'floornum'
          },
          {
            data: 'housenum'
          },
          {
            data: 'roomname'
          },
          {
            data: 'slotnum'
          },
          {
            data: 'rstatusid',
            render: function(data, type, row) {
              if (data == 1) {
                result = "<button style='cursor:default' class='btn btn-success btn-sm'>Available</button>";
              } else if (data == 3) {
                result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Blocked</button>";
              } else if (data == 4) {
                result = "<button style='cursor:default' class='btn btn-warning btn-sm'>Kuarantin</button>";
              } else {
                result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Occupied</button>";
              }
              return result;
            }
          }
        ]
      })
    });

    $(document).on('submit', '#ajaxSekat', function(e) {
      e.preventDefault();

      var formData = new FormData(this);
      formData.append("submit_ajaxSekat", true);

      $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {

          var res = jQuery.parseJSON(response);

          table.ajax.reload(null, false);

          if (res.status == 100) {

            Swal.fire({
              title: "Terdapat Pelajar di Blok Tersebut",
              html: "Blok Gagal Disekat !",
              icon: "error",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })

          } else if (res.status == 200) {

            Swal.fire({
              title: "Blok Berjaya Disekat",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          } else if (res.status == 300) {

            Swal.fire({
              title: "Terdapat Pelajar di Tingkat Tersebut",
              html: "Tingkat Gagal Disekat !",
              icon: "error",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          } else if (res.status == 400) {

            Swal.fire({
              title: "Tingkat Berjaya Disekat",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          } else if (res.status == 500) {

            Swal.fire({
              title: "Terdapat Pelajar di Rumah Tersebut",
              html: "Rumah Gagal Disekat !",
              icon: "error",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          } else if (res.status == 600) {
            Swal.fire({
              title: "Rumah Berjaya Disekat",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          } else if (res.status == 700) {

            Swal.fire({
              title: "Terdapat Pelajar di Bilik Tersebut",
              html: "Bilik Gagal Disekat !",
              icon: "error",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          } else if (res.status == 800) {

            Swal.fire({
              title: "Bilik Berjaya Disekat",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          }



        }
      });

    });

    $(document).on("submit", "#ajaxNyahsekat", function(e) {
      e.preventDefault()

      var formData = new FormData(this)
      formData.append("submit_ajaxNyahsekat", true)

      $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {

          var res = jQuery.parseJSON(response)

          table.ajax.reload(null, false)

          if (res.status == 100) {

            Swal.fire({
              title: "Terdapat Pelajar di Blok Tersebut",
              html: "Blok Gagal Dinyahsekat !",
              icon: "error",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })

          } else if (res.status == 200) {

            Swal.fire({
              title: "Blok Berjaya Dinyahsekat",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          } else if (res.status == 300) {

            Swal.fire({
              title: "Terdapat Pelajar di Tingkat Tersebut",
              html: "Tingkat Gagal Dinyahsekat !",
              icon: "error",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          } else if (res.status == 400) {

            Swal.fire({
              title: "Tingkat Berjaya Dinyahsekat",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          } else if (res.status == 500) {

            Swal.fire({
              title: "Terdapat Pelajar di Rumah Tersebut",
              html: "Rumah Gagal Dinyahsekat !",
              icon: "error",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          } else if (res.status == 600) {
            Swal.fire({
              title: "Rumah Berjaya Dinyahsekat",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          } else if (res.status == 700) {

            Swal.fire({
              title: "Terdapat Pelajar di Bilik Tersebut",
              html: "Bilik Gagal Dinyahsekat !",
              icon: "error",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          } else if (res.status == 800) {

            Swal.fire({
              title: "Bilik Berjaya Dinyahsekat !",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            })
          }

        }
      })

    })
  </script>
</body>

</html>