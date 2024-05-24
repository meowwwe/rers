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
    <title>e-ReRs | Serahan Kunci</title>

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

        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalReview">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>MAKLUMAT LENGKAP PELAJAR</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-dark card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                    <li class="pt-2 px-3">
                                        <h3 class="card-title"><b><i class="fa fa-user"></i></b></h3>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">MAKLUMAT PELAJAR</a>
                                    </li>
                                </ul>
                            </div>
                            <form id="ajaxBelum">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title"></h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>NAMA</label>
                                                        <input class="form-control" readonly id="username">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NO MATRIK</label>
                                                        <input class="form-control" readonly id="userid" name="userid">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>PROGRAM</label>
                                                        <input class="form-control" readonly id="userprogramme">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>BAHAGIAN</label>
                                                        <input class="form-control" readonly id="userpart">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title"></h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>NAMA BLOK</label>
                                                        <input class="form-control" readonly id="userblockname">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NO. BILIK</label>
                                                        <div class="form-control" readonly><span id="usercombineb"></span> <span id="usercombinef"></span> <span id="usercombiner"></span><span id="usercombineh"></span> </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NO. TEL</label>
                                                        <input class="form-control" readonly id="userphoneno">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>ALAMAT E-MEL</label>
                                                        <input class="form-control" readonly id="useremail">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary col-md-6 btn-flat studentTerimaKunci" style="float:right">Kunci Diterima</button>
                            </form>
                            <button type="submit" class="btn btn-success col-md-6 btn-flat studentBelumEmail"><i class="fa fa-envelope"></i> Maklumkan Pelajar</button>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Tutup</button>
                    <!-- <button type="button" class="btn btn-success">Teruskan</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalPending">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>MAKLUMAT LENGKAP PELAJAR</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-dark card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                <li class="pt-2 px-3">
                                    <h3 class="card-title"><b><i class="fa fa-user"></i></b></h3>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">MAKLUMAT PELAJAR</a>
                                </li>
                            </ul>
                        </div>
                        <form id="ajaxBelumPending">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title"></h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>NAMA</label>
                                                    <input class="form-control" readonly id="usernamep">
                                                </div>
                                                <div class="form-group">
                                                    <label>NO MATRIK</label>
                                                    <input class="form-control" readonly id="useridp" name="userid">
                                                </div>
                                                <div class="form-group">
                                                    <label>PROGRAM</label>
                                                    <input class="form-control" readonly id="userprogrammep">
                                                </div>
                                                <div class="form-group">
                                                    <label>BAHAGIAN</label>
                                                    <input class="form-control" readonly id="userpartp">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title"></h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>NO. BILIK</label>
                                                    <div class="form-control" readonly><span id="usercombinebp"></span> <span id="usercombinefp"></span> <span id="usercombinerp"></span><span id="usercombinehp"></span> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>NO. TEL</label>
                                                    <input class="form-control" readonly id="userphonenop">
                                                </div>
                                                <div class="form-group">
                                                    <label>TARIKH PEPERIKSAAN AKHIR</label>
                                                    <input class="form-control" readonly id="userfinaldate">
                                                </div>
                                                <div class="form-group">
                                                    <label>TARIKH/MASA KUNCI DIHANTAR</label>
                                                    <input class="form-control" readonly id="sentdatetime">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary col-md-6 btn-flat studentTerimaKunci" style="float:right">Kunci Diterima</button>

                        </form>
                        <button type="submit" class="btn btn-success col-md-6 btn-flat studentEmail"><i class="fa fa-envelope"></i> Maklumkan Pelajar</button>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Tutup</button>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalTerima">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>MAKLUMAT LENGKAP PELAJAR</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-dark card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                <li class="pt-2 px-3">
                                    <h3 class="card-title"><b><i class="fa fa-user"></i></b></h3>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">MAKLUMAT PELAJAR</a>
                                </li>
                            </ul>
                        </div>
                        <form id="ajaxTerima">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title"></h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>NAMA</label>
                                                    <input class="form-control" readonly id="usernamet">
                                                </div>
                                                <div class="form-group">
                                                    <label>NO MATRIK</label>
                                                    <input class="form-control" readonly id="useridt" name="userid">
                                                </div>
                                                <div class="form-group">
                                                    <label>PROGRAM</label>
                                                    <input class="form-control" readonly id="userprogrammet">
                                                </div>
                                                <div class="form-group">
                                                    <label>BAHAGIAN</label>
                                                    <input class="form-control" readonly id="userpartt">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title"></h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>NO. BILIK</label>
                                                    <div class="form-control" readonly><span id="usercombinebt"></span> <span id="usercombineft"></span> <span id="usercombinert"></span><span id="usercombineht"></span> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>NO. TEL</label>
                                                    <input class="form-control" readonly id="userphonenot">
                                                </div>
                                                <div class="form-group">
                                                    <label>TARIKH PEPERIKSAAN AKHIR</label>
                                                    <input class="form-control" readonly id="userfinaldatet">
                                                </div>
                                                <div class="form-group">
                                                    <label>TARIKH/MASA KUNCI DIHANTAR</label>
                                                    <input class="form-control" readonly id="sentdatetimet">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Tutup</button>
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
                        <h1><b>Serahan Kunci</b></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Serahan Kunci</li>
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
                                    <h3 class="card-title"><b><i class="fa fa-key"></i></b></h3>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-belum-mengambil-tindakan-tab" data-toggle="pill" href="#tab-belum-mengambil-tindakan" role="tab" aria-controls="tab-belum-mengambil-tindakan" aria-selected="true">BELUM MENGAMBIL TINDAKAN</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-pending-tab" data-toggle="pill" href="#tab-pending" role="tab" aria-controls="tab-pending" aria-selected="false">PENDING</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-diterima-tab" data-toggle="pill" href="#tab-diterima" role="tab" aria-controls="tab-diterima" aria-selected="false">DITERIMA</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-two-tabContent">
                                <div class="tab-pane fade show active" id="tab-belum-mengambil-tindakan" role="tabpanel" aria-labelledby="tab-belum-mengambil-tindakan-tab">

                                    <!-- /.card-header -->
                                    <div style="overflow-x:auto" class="card-body">
                                        <table id="tablebelum" style="width:100%" class="table table-bordered">
                                            <thead style="background-color:#a29bfe">
                                                <tr>
                                                    <th class="text-center width10">Matric</th>
                                                    <th class="width30">Nama Penuh</th>
                                                    <th class="text-center width15">No. Kunci</th>
                                                    <th class="text-center width15">Action</th>
                                                    <th class="text-center width15">Status Serahan</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-pending" role="tabpanel" aria-labelledby="tab-pending-tab">

                                    <!-- /.card-header -->
                                    <div style="overflow-x:auto" class="card-body">
                                        <table id="tablepending" style="width:100%" class="table table-bordered">
                                            <thead style="background-color:#a29bfe">
                                                <tr>
                                                    <th class="text-center width10">Matric</th>
                                                    <th class="width30">Nama Penuh</th>
                                                    <th class="text-center width15">No. Kunci</th>
                                                    <th class="text-center width15">Action</th>
                                                    <th class="text-center width15">Status Serahan</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-diterima" role="tabpanel" aria-labelledby="tab-diterima-tab">
                                    <!-- /.card-header -->
                                    <div style="overflow-x:auto" class="card-body">
                                        <table id="tableterima" style="width:100%" class="table table-bordered">
                                            <thead style="background-color:#a29bfe">
                                                <tr>
                                                    <th class="text-center width10">Matric</th>
                                                    <th class="width30">Nama Penuh</th>
                                                    <th class="text-center width15">No. Kunci</th>
                                                    <th class="text-center width15">Action</th>
                                                    <th class="text-center width15">Status Serahan</th>
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
        var pic = '<?php echo $_SESSION['username'] ?>'
        $(document).ready(function() {
            tableBelum = $('#tablebelum').DataTable({
                "pageLength": 10,
                "destroy": true,
                "ajax": 'dataTableBelum.php',
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
                        data: 'blockname,',
                        render: function(data, type, row) {

                            result = '<div class="text-center"> ' + row.blockname + ' ' + row.floornum + ' ' + row.roomname + row.housenum + ' </div>'

                            return result
                        }
                    },
                    {
                        data: 'action',
                        render: function(data, type, row) {

                            result = '<div class="text-center"><button type="button" value="' + row.userid + '" class="reviewBtn btn btn-info btn-sm" data-toggle="modal" data-target="#modalReview"><i class="fas fa-eye"></i> VIEW</button> </div>'

                            return result
                        }
                    },
                    {
                        data: 'statusReturn',
                        render: function(data, type, row) {

                            if (data == "BELUM") {
                                result = '<div class="text-center">BELUM</div>'
                            } else if (data == "PENDING") {
                                result = '<div class="text-center">PENDING</div>'
                            } else if (data == "ACCEPT") {
                                result = '<div class="text-center">ACCEPT</div>'
                            } else {
                                result = '<div class="text-center">REJECT</div>'
                            }


                            return result
                        }
                    }
                ]

            })

            tablePending = $('#tablepending').DataTable({
                "pageLength": 10,
                "destroy": true,
                "ajax": 'dataTablePending.php',
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
                        data: 'blockname,',
                        render: function(data, type, row) {

                            result = '<div class="text-center"> ' + row.blockname + ' ' + row.floornum + ' ' + row.roomname + row.housenum + ' </div>'

                            return result
                        }
                    },
                    {
                        data: 'action',
                        render: function(data, type, row) {

                            result = '<div class="text-center"><button type="button" value="' + row.userid + '" class="pendingBtn btn btn-info btn-sm" data-toggle="modal" data-target="#modalPending"><i class="fas fa-eye"></i> VIEW</button> </div>'

                            return result
                        }
                    },
                    {
                        data: 'statusReturn',
                        render: function(data, type, row) {

                            if (data == "BELUM") {
                                result = '<div class="text-center">BELUM</div>'
                            } else if (data == "PENDING") {
                                result = '<div class="text-center">PENDING</div>'
                            } else if (data == "ACCEPT") {
                                result = '<div class="text-center">ACCEPT</div>'
                            } else {
                                result = '<div class="text-center">REJECT</div>'
                            }

                            return result
                        }
                    }
                ]
            })

            tableTolak = $('#tabletolak').DataTable({
                "pageLength": 10,
                "destroy": true,
                "ajax": 'dataTableTolak.php',
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
                        data: 'blockname,',
                        render: function(data, type, row) {

                            result = '<div class="text-center"> ' + row.blockname + ' ' + row.floornum + ' ' + row.roomname + row.housenum + ' </div>'

                            return result
                        }
                    },
                    {
                        data: 'action',
                        render: function(data, type, row) {

                            result = '<div class="text-center"><button type="button" value="' + row.userid + '" class="reviewBtn btn btn-info btn-sm" data-toggle="modal" data-target="#modalReview"><i class="fas fa-eye"></i> VIEW</button> </div>'

                            return result
                        }
                    },
                    {
                        data: 'statusReturn',
                        render: function(data, type, row) {

                            if (data == "BELUM") {
                                result = '<div class="text-center">BELUM</div>'
                            } else if (data == "PENDING") {
                                result = '<div class="text-center">PENDING</div>'
                            } else if (data == "DITERIMA") {
                                result = '<div class="text-center">DITERIMA</div>'
                            } else {
                                result = '<div class="text-center">DITOLAK</div>'
                            }

                            return result
                        }
                    }
                ]
            })

            tableTerima = $('#tableterima').DataTable({
                "pageLength": 10,
                "destroy": true,
                "ajax": 'datatableTerima.php',
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
                        data: 'blockname,',
                        render: function(data, type, row) {

                            result = '<div class="text-center"> ' + row.blockname + ' ' + row.floornum + ' ' + row.roomname + row.housenum + ' </div>'

                            return result
                        }
                    },
                    {
                        data: 'action',
                        render: function(data, type, row) {

                            result = '<div class="text-center"><button type="button" value="' + row.userid + '" class="reviewBtn btn btn-info btn-sm" data-toggle="modal" data-target="#modalTerima"><i class="fas fa-eye"></i> LIHAT</button> </div>'

                            return result
                        }
                    },
                    {
                        data: 'statusReturn',
                        render: function(data, type, row) {

                            if (data == "BELUM") {
                                result = '<div class="text-center">BELUM</div>'
                            } else if (data == "PENDING") {
                                result = '<div class="text-center">PENDING</div>'
                            } else if (data == "DITERIMA") {
                                result = '<div class="text-center">DITERIMA</div>'
                            } else {
                                result = '<div class="text-center">DITOLAK</div>'
                            }

                            return result
                        }
                    }
                ]
            })

            var userid

            $(document).on('click', '.reviewBtn', function(e) {
                e.preventDefault()

                userid = $(this).val()

                $.ajax({
                    type: "POST",
                    url: 'code.php',
                    data: 'displayReview=' + userid,
                    success: function(response) {

                        var res = jQuery.parseJSON(response)

                        tableBelum.ajax.reload(null, false)
                        tablePending.ajax.reload(null, false)
                        tableTolak.ajax.reload(null, false)
                        tableTerima.ajax.reload(null, false)

                        if (res.status == 100) {

                            $('#username').val(res.data.username);
                            $('#userid').val(res.data.userid);
                            $('#userprogramme').val(res.data.userprogramme);
                            $('#useremail').val(res.data.useremail);
                            $('#userphoneno').val(res.data.userphoneno);
                            $('#userpart').val(res.data.userpart);
                            $('#usercombineb').text(res.data.blockname);
                            $('#usercombinef').text(res.data.floornum);
                            $('#usercombineh').text(res.data.housenum);
                            $('#usercombiner').text(res.data.roomname);
                            $('.studentBelumEmail').attr('value', res.data.useremail);
                            $('.studentBelumEmail').attr('id', res.data.username);
                            $('.studentTerimaKunci').attr('value', res.data.useremail);
                            $('.studentTerimaKunci').attr('id', res.data.username);
                            $('.studentTerimaKunci').attr('name', pic);

                            
                            $('#usernamet').val(res.data.username);
                            $('#useridt').val(res.data.userid);
                            $('#userpartt').val(res.data.userpart);
                            $('#userprogrammet').val(res.data.userprogramme);
                            $('#usercombineht').text(res.data.housenum);
                            $('#usercombinebt').text(res.data.blockname);
                            $('#usercombineft').text(res.data.floornum);
                            $('#usercombinert').text(res.data.roomname);
                            $('#userphonenot').val(res.data.userphoneno);
                            $('#userfinaldatet').val(res.data.finaldate);
                            $('#sentdatetimet').val(res.data.sentdatetime);



                            if ((res.data.blockname) == '04A') {
                                $('#userblockname').val("MAT KILAU");
                            } else if ((res.data.blockname) == '08A') {
                                $('#userblockname').val("TUN TEJA 1");
                            } else {
                                $('#userblockname').val("TUN TEJA 2");
                            }
                        }
                    }
                })

            });

            $(document).on('click', '.pendingBtn', function(e) {
                e.preventDefault()
                userid = $(this).val()

                $.ajax({
                    type: "POST",
                    url: 'code.php',
                    data: 'displayPending=' + userid,
                    success: function(response) {

                        var res = jQuery.parseJSON(response)

                        tableBelum.ajax.reload(null, false)
                        tablePending.ajax.reload(null, false)
                        tableTolak.ajax.reload(null, false)
                        tableTerima.ajax.reload(null, false)

                        if (res.status == 100) {

                            $('#usernamep').val(res.data.username);
                            $('.studentEmail').attr('value', res.data.useremail);
                            $('.studentEmail').attr('id', res.data.username);
                            $('#useridp').val(res.data.userid);
                            $('#userprogrammep').val(res.data.userprogramme);
                            $('#userfinaldate').val(res.data.finaldate);
                            $('#userphonenop').val(res.data.userphoneno);
                            $('#userpartp').val(res.data.userpart);
                            $('#usercombinebp').text(res.data.blockname);
                            $('#usercombinefp').text(res.data.floornum);
                            $('#usercombinehp').text(res.data.housenum);
                            $('#usercombinerp').text(res.data.roomname);
                            $('#sentdatetime').val(res.data.sentdatetime);
                            $('.studentTerimaKunci').attr('value', res.data.useremail);
                            $('.studentTerimaKunci').attr('id', res.data.username);
                            $('.studentTerimaKunci').attr('name', pic);
                        }
                    }
                })

            });

            $(document).on('submit', '#ajaxBelum', function(e) {
                e.preventDefault()

                var formData = new FormData(this)
                formData.append("submit_ajaxBelumBelum", true)

                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        var res = jQuery.parseJSON(response)

                        tableBelum.ajax.reload(null, false)
                        tablePending.ajax.reload(null, false)
                        tableTolak.ajax.reload(null, false)
                        tableTerima.ajax.reload(null, false)
                    }
                });

                Swal.fire({
                    title: "Email Pemakluman Pelajar Sedang Dihantar !",
                    icon: "warning",
                    timer: 2000,
                    timerProgressBar: false,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                })

                $.ajax({
                    type: "POST",
                    url: 'code.php',
                    data: 'umbterimakunci=' + $('.studentTerimaKunci').attr('value') + '&&unbterimakunci=' + $('.studentTerimaKunci').attr('id') + '&&picterimakunci=' + $('.studentTerimaKunci').attr('name') + '',
                    success: function(response) {
                        var res = jQuery.parseJSON(response)

                        Swal.fire({
                            title: "Pelajar Berjaya Dimaklumkan !",
                            icon: "success",
                            showDenyButton: false,
                            confirmButtonText: "Okay",
                        })
                    }
                })

            });

            $(document).on('submit', '#ajaxBelumPending', function(e) {
                e.preventDefault()

                var formData = new FormData(this)
                formData.append("submit_ajaxPending", true)

                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        var res = jQuery.parseJSON(response)

                        tableBelum.ajax.reload(null, false)
                        tablePending.ajax.reload(null, false)
                        tableTolak.ajax.reload(null, false)
                        tableTerima.ajax.reload(null, false)
                    }
                });

                Swal.fire({
                    title: "Email Pemakluman Pelajar Sedang Dihantar !",
                    icon: "warning",
                    timer: 2000,
                    timerProgressBar: false,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                })

                $.ajax({
                    type: "POST",
                    url: 'code.php',
                    data: 'umbterimakunci=' + $('.studentTerimaKunci').attr('value') + '&&unbterimakunci=' + $('.studentTerimaKunci').attr('id') + '&&picterimakunci=' + $('.studentTerimaKunci').attr('name') + '',
                    success: function(response) {
                        var res = jQuery.parseJSON(response)

                        Swal.fire({
                            title: "Pelajar Berjaya Dimaklumkan !",
                            icon: "success",
                            showDenyButton: false,
                            confirmButtonText: "Okay",
                        })
                    }
                })


            });


            $(document).on('click', '.studentEmail', function(e) {

                Swal.fire({
                    title: "Email Sedang Dihantar !",
                    icon: "warning",
                    timer: 2000,
                    timerProgressBar: false,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                })
                e.preventDefault()

                $.ajax({
                    type: "POST",
                    url: 'code.php',
                    data: 'useremailPHPM=' + $('.studentEmail').attr('value') + '&&usernamePHPM=' + $('.studentEmail').attr('id') + '&&picPHPM=' + $('.studentEmail').attr('name') + '',
                    success: function(response) {
                        var res = jQuery.parseJSON(response)

                        Swal.fire({
                            title: "Pelajar Berjaya Dimaklumkan !",
                            icon: "success",
                            showDenyButton: false,
                            confirmButtonText: "Okay",
                        })
                    }
                })
            })

            $(document).on('click', '.studentBelumEmail', function(e) {

                Swal.fire({
                    title: "Email Pemakluman Pelajar Sedang Dihantar !",
                    icon: "warning",
                    timer: 2000,
                    timerProgressBar: false,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                })
                e.preventDefault()

                $.ajax({
                    type: "POST",
                    url: 'code.php',
                    data: 'useremailbelum=' + $('.studentBelumEmail').attr('value') + '&&usernamebelum=' + $('.studentBelumEmail').attr('id') + '',
                    success: function(response) {
                        var res = jQuery.parseJSON(response)

                        Swal.fire({
                            title: "Pelajar Berjaya Dimaklumkan !",
                            icon: "success",
                            showDenyButton: false,
                            confirmButtonText: "Okay",
                        })
                    }
                })
            })
        })
    </script>



</body>

</html>