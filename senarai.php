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
  <title>e-ReRs | Senarai Pemohon </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <link rel="icon" type="image/x-icon" href="dist/img/2.ico" />

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</head>

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
      <a href="index.php" class="brand-link">
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
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalUpdateStudent">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><b>PINDAHKAN RUMAH/BILIK PELAJAR</b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="tutupmodalRumah">
              <span aria-hidden="true">&times</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card card-purple card-tabs" id=cardmale>
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">MAT KILAU <small>04A</small></a>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">TUN TEJA 1 <small>08A</small></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">TUN TEJA 2 <small>09A</small></a>
                  </li>
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
                            <a class="nav-link active" id="vert-tabs-mk1-tab" data-toggle="pill" href="#mk1" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Aras 1</a>
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
                            <div class="tab-pane text-left fade show active" id="mk1" role="tabpanel" aria-labelledby="vert-tabs-mk1-tab">
                              <table id="ajaxTableMK" style="width:100%" class="table table-bordered table-striped table-hover text-center">
                                <thead style="background-color:#a29bfe">
                                  <tr>
                                    <th>BLOK</th>
                                    <th>TINGKAT</th>
                                    <th>NOMBOR RUMAH</th>
                                    <th>BILIK</th>
                                    <th>JUMLAH PELAJAR</th>
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
                            <a class="nav-link active" id="vert-tabs-tt1-tab" data-toggle="pill" href="#tt11" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Aras 1</a>
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
                            <div class="tab-pane text-left fade show active" id="tt11" role="tabpanel" aria-labelledby="vert-tabs-tt1-tab">
                              <table id="ajaxTableTT1" style="width:100%" class="table table-bordered table-striped table-hover text-center">
                                <thead style="background-color:#a29bfe">
                                  <tr>
                                    <th>BLOK</th>
                                    <th>TINGKAT</th>
                                    <th>NOMBOR RUMAH</th>
                                    <th>BILIK</th>
                                    <th>JUMLAH PELAJAR</th>
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
                            <a class="nav-link active" id="vert-tabs-tt2-tab" data-toggle="pill" href="#tt21" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Aras 1</a>
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
                            <div class="tab-pane text-left fade show active" id="tt21" role="tabpanel" aria-labelledby="vert-tabs-tt2-tab">
                              <table id="ajaxTableTT2" style="width:100%" class="table table-bordered table-striped table-hover text-center">
                                <thead style="background-color:#a29bfe">
                                  <tr>
                                    <th>BLOK</th>
                                    <th>TINGKAT</th>
                                    <th>NOMBOR RUMAH</th>
                                    <th>BILIK</th>
                                    <th>JUMLAH PELAJAR</th>
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
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
              <h1><b>Senarai Pemohon</b></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Senarai Pemohon</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="col-12 col-lg-12">
            <div class="card card-purple card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3">
                    <h3 class="card-title"><b><i class="fa fa-user"></i></b></h3>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-MK1-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">MAT KILAU</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-TT1-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">TUN TEJA 1</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-TT2-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">TUN TEJA 2</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-C19-tab" data-toggle="pill" href="#custom-tabs-two-c19" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">KUARANTIN <small> C19</small></a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">

                    <!-- /.card-header -->
                    <div style="overflow-x:auto" class="card-body">
                      <table id="tablemk1" style="width:100%" class="table table-bordered">
                        <thead style="background-color:#a29bfe">
                          <tr>
                            <th class="text-center width10">Matric</th>
                            <th class="width30">Nama Penuh</th>
                            <th class="text-center width10">Blok</th>
                            <th class="text-center width10">Tingkat</th>
                            <th class="text-center width10">Rumah</th>
                            <th class="text-center width10">Bilik</th>
                            <th class="text-center width30">Action</th>
                            <th class="text-center width30">Kunci</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-TT1-tab">

                    <!-- /.card-header -->
                    <div style="overflow-x:auto" class="card-body">
                      <table id="tablett1" style="width:100%" class="table table-bordered">
                        <thead style="background-color:#a29bfe">
                          <tr>
                            <th class="text-center width10">Matric</th>
                            <th class="width30">Nama Penuh</th>
                            <th class="text-center width10">Blok</th>
                            <th class="text-center width10">Tingkat</th>
                            <th class="text-center width10">Rumah</th>
                            <th class="text-center width10">Bilik</th>
                            <th class="text-center width15">Action</th>
                            <th class="text-center width10">Kunci</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-TT2-tab">
                    <!-- /.card-header -->
                    <div style="overflow-x:auto" class="card-body">
                      <table id="tablett2" style="width:100%" class="table table-bordered">
                        <thead style="background-color:#a29bfe">
                          <tr>
                            <th class="text-center width10">Matric</th>
                            <th class="width30">Nama Penuh</th>
                            <th class="text-center width10">Blok</th>
                            <th class="text-center width10">Tingkat</th>
                            <th class="text-center width10">Rumah</th>
                            <th class="text-center width10">Bilik</th>
                            <th class="text-center width15">Action</th>
                            <th class="text-center width10">Kunci</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="custom-tabs-two-c19" role="tabpanel" aria-labelledby="custom-tabs-two-C19-tab">
                    <!-- /.card-header -->
                    <div style="overflow-x:auto" class="card-body">
                      <table id="tablec19" style="width:100%" class="table table-bordered">
                        <thead style="background-color:#a29bfe">
                          <tr>
                            <th class="text-center width10">Matric</th>
                            <th class="width25">Nama Penuh</th>
                            <th class="text-center width10">Program</th>
                            <th class="text-center width10">Blok</th>
                            <th class="text-center width10">Tingkat</th>
                            <th class="text-center width10">Rumah</th>
                            <th class="text-center width10">Bilik</th>
                            <th class="text-center width15">Action</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <br>
          </div>
        </div>
      </section>
    </div>
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
    var variablejs = "<?php echo $_SESSION['useric'] ?>"
    var variableUserid = "<?php echo $_SESSION['userid'] ?>"
    var valueTable = 'Aras 1'
    var subValueTable
    var table
    var tableMATKILAU
    var tableTUNTEJA1
    var tableTUNTEJA2
    var tablec19
    var userid
    var compositeid


    $(document).ready(function() {

      $('#custom-tabs-two-MK1-tab').click()

      $('#custom-tabs-one-home-tab').click(function() {
        $('#vert-tabs-mk1-tab').trigger('click')
      })

      $('#custom-tabs-one-profile-tab').click(function() {
        $('#vert-tabs-tt1-tab').trigger('click')
      })

      $('#custom-tabs-one-messages-tab').click(function() {
        $('#vert-tabs-tt2-tab').trigger('click')
      })
    });

    $('#custom-tabs-two-MK1-tab').on('click', function() {
      tableMATKILAU = $('#tablemk1').DataTable({
        "pageLength": 10,
        "destroy": true,
        "ajax": 'dataTableSenaraiMK.php',
        "columns": [{
            data: 'userid',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'username'
          },
          {
            data: 'blockname',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'floornum',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'housenum',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'roomname',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'action',
            render: function(data, type, row) {

              result = '<div class="text-center"><button type="button" value="' + row.userid + '" class="updateStudentBtn btn btn-success btn-sm" data-toggle="modal" data-target="#modalUpdateStudent"><i class="fas fa-edit"></i></button> <button type="button" value="' + row.userid + '" class="deleteStudentBtn btn btn-danger btn-sm"><i class="fas fa-trash"></i></button> <button type="button" value="' + row.userid + '" class="keyBtn btn btn-info btn-sm"><i class="fas fa-key"></i></button></div>'

              return result
            }
          },
          {
            data: 'statusGive',
            render: function(data, type, row) {

              if (data == "BELUM") {
                result = '<div class="text-center"> <i class="fas fa-times" style="color:red"></i></div>'
              } else {
                result = '<div class="text-center"><i class="fas fa-check" style="color:green"></i></div>'
              }


              return result
            }
          }
        ]
      })
    });

    $('#custom-tabs-two-TT1-tab').on('click', function() {
      tableTUNTEJA1 = $('#tablett1').DataTable({
        "pageLength": 10,
        "destroy": true,
        "ajax": 'dataTableSenaraiTT1.php',
        "columns": [{
            data: 'userid',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'username'
          },
          {
            data: 'blockname',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'floornum',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'housenum',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'roomname',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'action',
            render: function(data, type, row) {

              result = '<div class="text-center"><button type="button" value="' + row.userid + '" class="updateStudentBtn btn btn-success btn-sm" data-toggle="modal" data-target="#modalUpdateStudent"><i class="fas fa-edit"></i></button> <button type="button" value="' + row.userid + '" class="deleteStudentBtn btn btn-danger btn-sm"><i class="fas fa-trash"></i></button> <button type="button" value="' + row.userid + '" class="keyBtn btn btn-info btn-sm"><i class="fas fa-key"></i></button></div>'

              return result
            }
          },
          {
            data: 'statusGive',
            render: function(data, type, row) {

              if (data == "BELUM") {
                result = '<div class="text-center"> <i class="fas fa-times" style="color:red"></i></div>'
              } else {
                result = '<div class="text-center"><i class="fas fa-check" style="color:green"></i></div>'
              }


              return result
            }
          }
        ]
      })
    });

    $('#custom-tabs-two-TT2-tab').on('click', function() {
      tableTUNTEJA2 = $('#tablett2').DataTable({
        "pageLength": 10,
        "destroy": true,
        "ajax": 'dataTableSenaraiTT2.php',
        "columns": [{
            data: 'userid',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'username'
          },
          {
            data: 'blockname',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'floornum',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'housenum',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'roomname',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'action',
            render: function(data, type, row) {

              result = '<div class="text-center"><button type="button" value="' + row.userid + '" class="updateStudentBtn btn btn-success btn-sm" data-toggle="modal" data-target="#modalUpdateStudent"><i class="fas fa-edit"></i></button> <button type="button" value="' + row.userid + '" class="deleteStudentBtn btn btn-danger btn-sm"><i class="fas fa-trash"></i></button> <button type="button" value="' + row.userid + '" class="keyBtn btn btn-info btn-sm"><i class="fas fa-key"></i></button></div>'

              return result
            }
          },
          {
            data: 'statusGive',
            render: function(data, type, row) {

              if (data == "BELUM") {
                result = '<div class="text-center"> <i class="fas fa-times" style="color:red"></i></div>'
              } else {
                result = '<div class="text-center"><i class="fas fa-check" style="color:green"></i></div>'
              }
              return result
            }
          }
        ]
      })
    });

    $('#custom-tabs-two-C19-tab').on('click', function() {
      tablec19 = $('#tablec19').DataTable({
        "pageLength": 10,
        "destroy": true,
        "ajax": 'dataTableSenaraiPelajarCovid.php',
        "columns": [{
            data: 'userid',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'username'
          },
          {
            data: 'userprogramme',
            render: function(data, type, row) {
              result = '<div class="text-center">' + data + '</div>'
              return result
            }
          },
          {
            data: 'blockname',
            render: function(data, type, row) {
              if (data == null) {
                result = '<div class="text-center"><b>-</b></div>'
              } else {
                result = '<div class="text-center">' + data + '</div>'
              }
              return result
            }
          },
          {
            data: 'floornum',
            render: function(data, type, row) {
              if (data == null) {
                result = '<div class="text-center"><b>-</b></div>'
              } else {
                result = '<div class="text-center">' + data + '</div>'
              }
              return result
            }
          },
          {
            data: 'housenum',
            render: function(data, type, row) {
              if (data == null) {
                result = '<div class="text-center"><b>-</b></div>'
              } else {
                result = '<div class="text-center">' + data + '</div>'
              }
              return result
            }
          },
          {
            data: 'roomname',
            render: function(data, type, row) {
              if (data == null) {
                result = '<div class="text-center"><b>-</b></div>'
              } else {
                result = '<div class="text-center">' + data + '</div>'
              }
              return result
            }
          },
          {
            data: 'action',
            render: function(data, type, row) {

              result = '<div class="text-center"><button type="button" value="' + row.userid + '" class="deleteCovidBtn btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></div>'

              return result
            }
          }
        ]
      })
    });

    $('#custom-tabs-one-home a').on('click', function() {
      valueTable = $(this).text()
      subValueTable = valueTable.substr(5)
      $(document).ready(function() {
        table = $('#ajaxTableMK').DataTable({
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
                  result = '<button type="button" value="' + row.compositeid + '" class="btn btn-success btn-sm availableBtn">Available</button>'
                } else if (data == 3) {
                  result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Blocked</button>"
                } else if (data == 4) {
                  result = '<button type="button" value="' + row.compositeid + '" class="btn btn-warning btn-sm covidBtn">Kuarantin</button>'
                } else {
                  result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Occupied</button>"
                }
                return result
              }
            }
          ]
        })
      })
    })

    $('#custom-tabs-one-profile a').on('click', function() {
      valueTable = $(this).text()
      subValueTable = valueTable.substr(5)
      $(document).ready(function() {
        table = $('#ajaxTableTT1').DataTable({
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
                  result = '<button type="button" value="' + row.compositeid + '" class="btn btn-success btn-sm availableBtn">Available</button>'
                } else if (data == 3) {
                  result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Blocked</button>"
                } else if (data == 4) {
                  result = '<button type="button" value="' + row.compositeid + '" class="btn btn-warning btn-sm covidBtn">Kuarantin</button>'
                } else {
                  result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Occupied</button>"
                }
                return result
              }
            }
          ]
        })
        table = $('#ajaxTableTT1').DataTable({
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
                  result = '<button type="button" value="' + row.compositeid + '" class="btn btn-success btn-sm availableBtn">Available</button>'
                } else if (data == 3) {
                  result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Blocked</button>"
                } else if (data == 4) {
                  result = '<button type="button" style="cursor:default" class="btn btn-warning btn-sm ">Kuarantin</button>'
                } else {
                  result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Occupied</button>"
                }
                return result
              }
            }
          ]
        })
      })
    })

    $('#custom-tabs-one-messages a').on('click', function() {
      valueTable = $(this).text()
      subValueTable = valueTable.substr(5)
      $(document).ready(function() {
        table = $('#ajaxTableTT2').DataTable({
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
                  result = '<button type="button" value="' + row.compositeid + '" class="btn btn-success btn-sm availableBtn">Available</button>'
                } else if (data == 3) {
                  result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Blocked</button>"
                } else if (data == 4) {
                  result = '<button type="button" value="' + row.compositeid + '" class="btn btn-warning btn-sm covidBtn">Kuarantin</button>'
                } else {
                  result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Occupied</button>"
                }
                return result
              }
            }
          ]
        })
        table = $('#ajaxTableTT2').DataTable({
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
                  result = '<button type="button" value="' + row.compositeid + '" class="btn btn-success btn-sm availableBtn">Available</button>'
                } else if (data == 3) {
                  result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Blocked</button>"
                } else if (data == 4) {
                  result = '<button type="button" style="cursor:default" class="btn btn-warning btn-sm ">Kuarantin</button>'
                } else {
                  result = "<button style='cursor:default' class='btn btn-danger btn-sm'>Occupied</button>"
                }
                return result
              }
            }
          ]
        })
      })
    })

    $(document).on('click', '.updateStudentBtn', function() {

      $('#custom-tabs-one-home-tab').trigger('click')

      userid = $(this).val()
    })

    $(document).on('click', '.deleteStudentBtn', function(e) {
      e.preventDefault();

      var userid = $(this).val();

      var text = '<b>Rekod Pendaftaran Rumah/Bilik Pelajar Akan <span style="color:red">Dibuang</span></b>'
      var texty = '<b>Rekod Pendaftaran Rumah/Bilik Pelajar Berjaya <span style="color:red">Dibuang</span></b>'

      Swal.fire({
        title: 'Adakah Anda Yakin ?',
        html: "" + text + "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Tidak / Batal',
        confirmButtonText: 'Teruskan'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Berjaya!',
            '' + texty + '',
            'success'
          )

          $.ajax({
            type: "POST",
            url: "code.php",
            data: {
              'submit_deleteStudent': true,
              'userid': userid
            },
            success: function(response) {

              if (table != null) {
                table.ajax.reload(null, false)
              }
              if (tableMATKILAU != null) {
                tableMATKILAU.ajax.reload(null, false)
              }
              if (tableTUNTEJA1 != null) {
                tableTUNTEJA1.ajax.reload(null, false)
              }
              if (tableTUNTEJA2 != null) {
                tableTUNTEJA2.ajax.reload(null, false)
              }

              var res = jQuery.parseJSON(response);

            }
          });
        }
      })
    });

    $(document).on('click', '.availableBtn', function(e) {
      e.preventDefault()

      compositeid = $(this).val()

      $.ajax({
        type: "POST",
        url: "code.php",
        data: 'compositeidAdmin=' + compositeid + '&userid=' + userid,
        success: function(response) {

          var res = jQuery.parseJSON(response);

          if (table != null) {
            table.ajax.reload(null, false)
          }
          if (tableMATKILAU != null) {
            tableMATKILAU.ajax.reload(null, false)
          }
          if (tableTUNTEJA1 != null) {
            tableTUNTEJA1.ajax.reload(null, false)
          }
          if (tableTUNTEJA2 != null) {
            tableTUNTEJA2.ajax.reload(null, false)
          }

          if (res.status == 100) {
            Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              iconColor: 'yellow',
            })

            Toast.fire({

              icon: 'warning',
              title: '<b>Ruangan Ini Telah Penuh !</b> ',
              html: '<small>Sila Pilih Ruangan Lain</small>'
            })
          } else if (res.status == 200) {
            $('#tutupmodalRumah').trigger('click')
            Swal.fire({
              title: "Penukaran Berjaya !",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
            })

          } else if (res.status == 300) {
            $('#tutupmodalRumah').trigger('click')
            Swal.fire({
              title: "Penukaran Berjaya !",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
            })

          } else if (res.status == 500) {
            $('#tutupmodalRumah').trigger('click')
            Swal.fire({
              title: "Pendaftaran Berjaya !",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
            })
          }

        }
      })

    })

    $(document).on('click', '.covidBtn', function(e) {
      e.preventDefault()

      compositeid = $(this).val()

      $.ajax({
        type: "POST",
        url: "code.php",
        data: 'compositeCovid=' + compositeid + '&userid=' + userid,
        success: function(response) {

          var res = jQuery.parseJSON(response);
          if (table != null) {
            if (table != null) {
              table.ajax.reload(null, false)
            }
          }
          if (tableMATKILAU != null) {
            tableMATKILAU.ajax.reload(null, false)
          }
          if (tableTUNTEJA1 != null) {
            tableTUNTEJA1.ajax.reload(null, false)
          }
          if (tableTUNTEJA2 != null) {
            tableTUNTEJA2.ajax.reload(null, false)
          }
          if (tablec19 != null) {
            tablec19.ajax.reload(null, false)
          }

          if (res.status == 100) {
            Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              iconColor: 'yellow',
            })

            Toast.fire({

              icon: 'warning',
              title: '<b>Ruangan Ini Telah Penuh !</b> ',
              html: '<small>Jangan Cuba Security Flaw Cibai <a </small>'
            })
          } else if (res.status == 200) {
            $('')
            Swal.fire({
              title: "Penukaran Berjaya !",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
            })

          } else if (res.status == 300) {
            Swal.fire({
              title: "Penukaran Berjaya !",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
            })

          } else if (res.status == 500) {
            Swal.fire({
              title: "Pendaftaran Berjaya !",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
            })
          } else if (res.status == 900) {
            Swal.fire({
              title: "Ruangan Ini Sudah Penuh !",
              icon: "error",
              showDenyButton: false,
              confirmButtonText: "Okay",
            })
          } else if (res.status == 901) {
            Swal.fire({
              title: "Sila Daftarkan Pelajar Di Ruangan Kuarantin Sahaja !",
              icon: "error",
              showDenyButton: false,
              confirmButtonText: "Okay",
            })
          } else if (res.status == 902) {
            Swal.fire({
              title: "Sila Daftarkan Pelajar Di Ruangan Kuarantin Sahaja !",
              icon: "error",
              showDenyButton: false,
              confirmButtonText: "Okay",
            })
          }

        }
      })




    });

    $(document).on('click', '.deleteCovidBtn', function(e) {
      e.preventDefault();

      var userid = $(this).val();

      Swal.fire({
        title: 'Adakah Anda Pasti ?',
        text: "Pendaftaran Rumah/Bilik Pelajar Kuarantin Akan Dibuang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Tidak / Batal',
        confirmButtonText: 'Teruskan'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Berjaya!',
            'Pendaftaran Rumah/Bilik Pelajar Kuarantin Berjaya Dibuang',
            'success'
          )

          $.ajax({
            type: "POST",
            url: "code.php",
            data: {
              'submit_deleteCovid': true,
              'userid': userid
            },
            success: function(response) {

              if (table != null) {
                table.ajax.reload(null, false)
              }
              if (tableMATKILAU != null) {
                tableMATKILAU.ajax.reload(null, false)
              }
              if (tableTUNTEJA1 != null) {
                tableTUNTEJA1.ajax.reload(null, false)
              }
              if (tableTUNTEJA2 != null) {
                tableTUNTEJA2.ajax.reload(null, false)
              }

              if (tablec19 != null) {
                tablec19.ajax.reload(null, false)
              }

              var res = jQuery.parseJSON(response);

            }
          });
        }
      })


    });

    $(document).on('click', '.keyBtn', function(e) {
      e.preventDefault();

      var userid = $(this).val();

      var text = '<b>Rekod Pelajar <span style="color:red">Sudah Menerima</span> Kunci Rumah/Bilik</b>'
      var menerima = '<b>Pelajar Direkod <span style="color:red">Sudah Menerima</span> Kunci Rumah/Bilik</b>'
      var tidakmenerima = '<b>Pelajar Direkod <span style="color:red">Tidak Menerima</span> Kunci Rumah/Bilik</b>'

      Swal.fire({
        title: 'Adakah Anda Pasti ?',
        html: "" + text + "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Tidak / Batal',
        confirmButtonText: 'Teruskan'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Berjaya!',
            '' + menerima + '',
            'success'
          )

          $.ajax({
            type: "POST",
            url: "code.php",
            data: {
              'submit_keymark': true,
              'userid': userid
            },
            success: function(response) {

              if (table != null) {
                table.ajax.reload(null, false)
              }
              if (tableMATKILAU != null) {
                tableMATKILAU.ajax.reload(null, false)
              }
              if (tableTUNTEJA1 != null) {
                tableTUNTEJA1.ajax.reload(null, false)
              }
              if (tableTUNTEJA2 != null) {
                tableTUNTEJA2.ajax.reload(null, false)
              }

              var res = jQuery.parseJSON(response);

            }
          });
        } else {
          Swal.fire(
            'Berjaya!',
            '' + tidakmenerima + '',
            'error'
          )

          $.ajax({
            type: "POST",
            url: "code.php",
            data: {
              'submit_keymarkBatal': true,
              'userid': userid
            },
            success: function(response) {

              if (table != null) {
                table.ajax.reload(null, false)
              }
              if (tableMATKILAU != null) {
                tableMATKILAU.ajax.reload(null, false)
              }
              if (tableTUNTEJA1 != null) {
                tableTUNTEJA1.ajax.reload(null, false)
              }
              if (tableTUNTEJA2 != null) {
                tableTUNTEJA2.ajax.reload(null, false)
              }
              var res = jQuery.parseJSON(response);

            }
          });

        }
      })


    });
  </script>

</body>

</html>