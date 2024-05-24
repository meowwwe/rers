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
    <title>Rekod Pelajar Semester Terkini</title>

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="dist/img/2.ico" />
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
                            <h1><b>Muat Turun Rekod Semester Terkini</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Rekod Lama</li>
                            </ol>
                        </div>
                    </div>
                    <button class="btn btn-danger mulakanBtn"><i class="fa fa-fast-forward"></i> Mulakan Semester Baharu</button>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-purple card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                <li class="pt-2 px-3">
                                    <h3 class="card-title"><b><i class="fa fa-download"></i></b></h3>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="senarai-mk1-tab" data-toggle="pill" href="#senarai-mk1" role="tab" aria-controls="senarai-mk1" aria-selected="true">MAT KILAU</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="senarai-tt1-tab" data-toggle="pill" href="#senarai-tt1" role="tab" aria-controls="senarai-tt1" aria-selected="true">TUN TEJA 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="senarai-tt2-tab" data-toggle="pill" href="#senarai-tt2" role="tab" aria-controls="senarai-pendek" aria-selected="true">TUN TEJA 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="senarai-belum-tab" data-toggle="pill" href="#senarai-belum" role="tab" aria-controls="senarai-belum" aria-selected="true">BELUM MENGHANTAR KUNCI</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="senarai-pending-tab" data-toggle="pill" href="#senarai-pending" role="tab" aria-controls="senarai-pending" aria-selected="true">KUNCI PENDING</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="senarai-terima-tab" data-toggle="pill" href="#senarai-terima" role="tab" aria-controls="senarai-pending" aria-selected="true">KUNCI DITERIMA</a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-two-tabContent">
                                <div class="tab-pane fade show active" id="senarai-mk1" role="tabpanel" aria-labelledby="senarai-mk1-tab">
                                    <div style="overflow-x:auto;" class="card-body">
                                        <table id="tableLamaMK" style="width:100%" class="table table-bordered table-sm">
                                            <thead style="background-color:#a29bfe">
                                                <tr>
                                                    <th class="text-center width10">NO. BILIK</th>
                                                    <th>NAMA PELAJAR</th>
                                                    <th class="text-center width10">MATRIK</th>
                                                    <th class="text-center width10">PROGRAM</th>
                                                    <th class="text-center width10">BAHAGIAN</th>
                                                    <th class="text-center width10">NO. TEL</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="senarai-tt1" role="tabpanel" aria-labelledby="senarai-tt1-tab">
                                    <div style="overflow-x:auto;" class="card-body">
                                        <table id="tableLamaTT1" style="width:100%" class="table table-bordered table-sm">
                                            <thead style="background-color:#a29bfe">
                                                <tr>
                                                    <th class="text-center width10">NO. BILIK</th>
                                                    <th>NAMA PELAJAR</th>
                                                    <th class="text-center width10">MATRIK</th>
                                                    <th class="text-center width10">PROGRAM</th>
                                                    <th class="text-center width10">BAHAGIAN</th>
                                                    <th class="text-center width10">NO. TEL</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="senarai-tt2" role="tabpanel" aria-labelledby="senarai-tt2-tab">
                                    <div style="overflow-x:auto;" class="card-body">
                                        <table id="tableLamaTT2" style="width:100%" class="table table-bordered table-sm">
                                            <thead style="background-color:#a29bfe">
                                                <tr>
                                                    <th class="text-center width10">NO. BILIK</th>
                                                    <th>NAMA PELAJAR</th>
                                                    <th class="text-center width10">MATRIK</th>
                                                    <th class="text-center width10">PROGRAM</th>
                                                    <th class="text-center width10">BAHAGIAN</th>
                                                    <th class="text-center width10">NO. TEL</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="senarai-belum" role="tabpanel" aria-labelledby="senarai-belum-tab">
                                    <div style="overflow-x:auto;" class="card-body">
                                        <table id="tableLamaBelum" style="width:100%" class="table table-bordered table-sm">
                                            <thead style="background-color:#a29bfe">
                                                <tr>
                                                    <th class="text-center width10">NO. BILIK</th>
                                                    <th>NAMA PELAJAR</th>
                                                    <th class="text-center width10">MATRIK</th>
                                                    <th class="text-center width10">PROGRAM</th>
                                                    <th class="text-center width10">BAHAGIAN</th>
                                                    <th class="text-center width10">NO. TEL</th>
                                                    <th class="text-center width10">STATUS KUNCI</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="senarai-pending" role="tabpanel" aria-labelledby="senarai-pending-tab">
                                    <div style="overflow-x:auto;" class="card-body">
                                        <table id="tableLamaPending" style="width:100%" class="table table-bordered table-sm">
                                            <thead style="background-color:#a29bfe">
                                                <tr>
                                                    <th class="text-center width10">NO. BILIK</th>
                                                    <th>NAMA PELAJAR</th>
                                                    <th class="text-center width10">MATRIK</th>
                                                    <th class="text-center width10">PROGRAM</th>
                                                    <th class="text-center width10">BAHAGIAN</th>
                                                    <th class="text-center width10">NO. TEL</th>
                                                    <th class="text-center width10">STATUS KUNCI</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="senarai-terima" role="tabpanel" aria-labelledby="senarai-terima-tab">
                                    <div style="overflow-x:auto;" class="card-body">
                                        <table id="tableLamaTerima" style="width:100%" class="table table-bordered table-sm">
                                            <thead style="background-color:#a29bfe">
                                                <tr>
                                                    <th class="text-center width10">NO. BILIK</th>
                                                    <th>NAMA PELAJAR</th>
                                                    <th class="text-center width10">MATRIK</th>
                                                    <th class="text-center width10">PROGRAM</th>
                                                    <th class="text-center width10">BAHAGIAN</th>
                                                    <th class="text-center width10">NO. TEL</th>
                                                    <th class="text-center width10">STATUS KUNCI</th>
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
        var tableLamaMK
        var tableLamaTT1
        var tableLamaTT2
        var tableLamaBelum
        var tableLamaPending
        var tableLamaTerima
        $(document).ready(function() {
            $('#senarai-mk1-tab').click()
        });

        $('#senarai-mk1-tab').on('click', function() {
            tableLamaMK = $('#tableLamaMK').DataTable({
                "pageLength": 16,
                "dom": 'Bfrtip',
                "destroy": true,
                "buttons": ['excel', 'pdf'],
                "searching": false,
                "bInfo": false,
                "ajax": {
                    'url': 'dataTableLamaMK.php',
                },
                "columns": [{
                        data: 'null',
                        render: function(data, type, row, all) {
                            result = '<div class="text-center">' + row.blockname + ' ' + row.floornum + ' ' + row.roomname + row.housenum + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'username',
                        render: function(data, type, row) {
                            result = '<div>' + data + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'userid',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
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
                        data: 'userphoneno',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
                        }
                    },
                ]
            })
        });

        $('#senarai-tt1-tab').on('click', function() {
            tableLamaTT1 = $('#tableLamaTT1').DataTable({
                "pageLength": 16,
                "dom": 'Bfrtip',
                "destroy": true,
                "buttons": ['excel', 'pdf'],
                "searching": false,
                "bInfo": false,
                "ajax": {
                    'url': 'dataTableLamaTT1.php',
                },
                "columns": [{
                        data: 'null',
                        render: function(data, type, row, all) {
                            result = '<div class="text-center">' + row.blockname + ' ' + row.floornum + ' ' + row.roomname + row.housenum + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'username',
                        render: function(data, type, row) {
                            result = '<div>' + data + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'userid',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
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
                        data: 'userphoneno',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
                        }
                    },
                ]
            })
        });

        $('#senarai-tt2-tab').on('click', function() {
            tableLamaTT2 = $('#tableLamaTT2').DataTable({
                "pageLength": 16,
                "dom": 'Bfrtip',
                "destroy": true,
                "buttons": ['excel', 'pdf'],
                "searching": false,
                "bInfo": false,
                "ajax": {
                    'url': 'dataTableLamaTT2.php',
                },
                "columns": [{
                        data: 'null',
                        render: function(data, type, row, all) {
                            result = '<div class="text-center">' + row.blockname + ' ' + row.floornum + ' ' + row.roomname + row.housenum + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'username',
                        render: function(data, type, row) {
                            result = '<div>' + data + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'userid',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
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
                        data: 'userphoneno',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
                        }
                    },
                ]
            })
        });

        $('#senarai-belum-tab').on('click', function() {
            tableLamaBelum = $('#tableLamaBelum').DataTable({
                "pageLength": 16,
                "dom": 'Bfrtip',
                "destroy": true,
                "buttons": ['excel', 'pdf'],
                "searching": false,
                "bInfo": false,
                "ajax": {
                    'url': 'dataTableBelum.php',
                },
                "columns": [{
                        data: 'null',
                        render: function(data, type, row, all) {
                            result = '<div class="text-center">' + row.blockname + ' ' + row.floornum + ' ' + row.roomname + row.housenum + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'username',
                        render: function(data, type, row) {
                            result = '<div>' + data + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'userid',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
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
                        data: 'userphoneno',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'statusReturn',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
                        }
                    },
                ]
            })
        });

        $('#senarai-pending-tab').on('click', function() {
            tableLamaPending = $('#tableLamaPending').DataTable({
                "pageLength": 16,
                "dom": 'Bfrtip',
                "destroy": true,
                "buttons": ['excel', 'pdf'],
                "searching": false,
                "bInfo": false,
                "ajax": {
                    'url': 'dataTablePending.php',
                },
                "columns": [{
                        data: 'null',
                        render: function(data, type, row, all) {
                            result = '<div class="text-center">' + row.blockname + ' ' + row.floornum + ' ' + row.roomname + row.housenum + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'username',
                        render: function(data, type, row) {
                            result = '<div>' + data + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'userid',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
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
                        data: 'userphoneno',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'statusReturn',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
                        }
                    },
                ]
            })
        });

        $('#senarai-terima-tab').on('click', function() {
            tableLamaTerima = $('#tableLamaTerima').DataTable({
                "pageLength": 16,
                "dom": 'Bfrtip',
                "destroy": true,
                "buttons": ['excel', 'pdf'],
                "searching": false,
                "bInfo": false,
                "ajax": {
                    'url': 'dataTableTerima.php',
                },
                "columns": [{
                        data: 'null',
                        render: function(data, type, row, all) {
                            result = '<div class="text-center">' + row.blockname + ' ' + row.floornum + ' ' + row.roomname + row.housenum + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'username',
                        render: function(data, type, row) {
                            result = '<div>' + data + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'userid',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
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
                        data: 'userphoneno',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
                        }
                    },
                    {
                        data: 'statusReturn',
                        render: function(data, type, row) {
                            result = '<div class="text-center">' + data + '</div>'
                            return result
                        }
                    },
                ]
            })
        });

        $(document).on('click', '.mulakanBtn', function(e) {
            e.preventDefault()

            var content = "<small><b>PASTIKAN SETIAP REKOD DI MUAT TURUN TERLEBIH DAHULU</b><br>JIKA DITERUSKAN<li>SETIAP REKOD SEMESTER KINI AKAN DI <span style='color:red'>HAPUSKAN</span></li><li>AKSES BILIK/RUMAH AKAN DI <span style='color:red'>RESET</span> KEMBALI</li></small>";

            Swal.fire({
                title: 'Adakah Anda Yakin ?',
                html: "" + content + "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Kembali',
                confirmButtonText: 'Teruskan'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Berjaya!',
                        'Persediaan Pendaftaran Pelajar Sesi Baharu Selesai',
                        'success',
                    )

                    $.ajax({
                        type: "POST",
                        url: "code.php",
                        data: {
                            'submit_mulakan': true,
                        },
                        success: function(response) {



                            if (tableLamaMK != null) {
                                tableLamaMK.ajax.reload(null, false)
                            }
                            if (tableLamaTT1 != null) {
                                tableLamaTT1.ajax.reload(null, false)
                            }
                            if (tableLamaTT2 != null) {
                                tableLamaTT2.ajax.reload(null, false)
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