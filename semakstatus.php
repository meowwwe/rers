<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    session_start();
    if (!isset($_SESSION['userlogged'])) {
        header('location: login.php');
    }
    ?>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-ReRs | Pengecualian Bayaran </title>

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
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-7">
                            <h1><b>Status Pengecualian/Pengurangan Bayaran Kolej</b></h1>
                        </div>
                        <div class="col-sm-5">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Status</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content --> <!-- Main content -->
            <section class="content">
                <div class="col-12 col-sm-12">
                    <div class="card card-purple card-tabs">
                        <div class="card-header">
                            <h3 class="card-title">Status Permohonan Pengecualian Bayaran Kolej</h3>
                        </div>

                        <div class="card-body" style="overflow-x:auto">
                            <table id="ajaxstatusppk" class="table table-bordered table-striped table-hover text-center table-sm">
                                <thead style="background-color:#a29bfe">
                                    <tr>
                                        <th>JENIS PERMOHONAN</th>
                                        <th>TARIKH HANTAR</th>
                                        <th>STATUS PERMOHONAN</th>
                                        <!-- <th>ACTION</th> -->
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                        <!-- <div class="card-footer">
                            <center><small style="color:red">JIKA TERDAPAT SEBARANG PERUBAHAN ATAU PERTUKARAN MAKLUMAT</small><br><small>MAKLUMAT PERMOHONAN BOLEH DIKEMAS KINI SEHINGGA TARIKH TUTUP PERMOHONAN</small></center>
                        </div> -->
                    </div>
                </div>
            </section>

        </div>
        <!-- wrapper -->
        <?php include 'footer.php' ?>
    </div>


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

    <script src="plugins/toastr/toastr.min.js"></script>
    <script>
        var userid = '<?php echo $_SESSION["userid"] ?>';
        var table

        $(document).ready(function() {});

        table = $('#ajaxstatusppk').DataTable({
            "pageLength": 10,
            "searching": false,
            "bLengthChange": false,
            "bPaginate": false,
            "info": false,
            "ajax": {
                'type': 'POST',
                'url': 'dataTableStatus.php',
                'data': {
                    useridStatus: userid,
                },
            },
            "columns": [{
                    data: 'submissiontype',
                    render: function(data, type, row) {
                        if (data == "PENGURANGAN") {
                            result = "<span>PENGURANGAN BAYARAN KOLEJ</span>";
                        } else if (data == "PENGECUALIAN") {
                            result = "<span>PENGECUALIAN BAYARAN KOLEJ</span>";
                        }
                        return result
                    }
                },
                {
                    data: 'datesubmit'
                },
                {
                    data: 'ppkstatus',
                    render: function(data, type, row) {
                        if (data == "APPROVE") {
                            result = "<span class='badge bg-success'>DILULUSKAN</span>";
                        } else if (data == "REJECT") {
                            result = "<span class='badge bg-danger'>DIGAGALKAN</span>";
                        } else {
                            result = "<span class='badge bg-warning'>SEDANG DIPROSES</span>";
                        }
                        return result
                    }
                },
            ]
        })

        // var ppkid

        // $(document).on('click', '.updateppkBtn', function(e) {
        //     e.preventDefault()

        //     ppkid = $(this).val()

        //     $.ajax({
        //         type: "POST",
        //         url: 'code.php',
        //         data: 'ppkid=' + ppkid,
        //         success: function(response) {

        //             var res = jQuery.parseJSON(response)
        //             if (res.status == 100) {

        //                 $('#username').text(res.data.username);
        //                 $('#userid').text(res.data.userid);
        //                 $('#userphoneno').text(res.data.userphoneno);
        //                 $('#useric').text(res.data.useric);
        //                 $('#userprogramme').text(res.data.userprogramme);
        //                 $('#usercgpa').val(res.data.usercgpa);
        //                 $('#usergpa').val(res.data.usergpa);
        //                 $('#userstatusedu').val(res.data.userstatusedu);
        //                 $('#usercategory').val(res.data.usercategory);
        //                 $('#usercategoryelse').val(res.data.usercategoryelse);
        //                 $('#familyphoneno').text(res.data.familyphoneno);
        //                 $('#houseaddress').text(res.data.houseaddress);
        //                 $('#mothername').text(res.data.mothername);
        //                 $('#motherwork').text(res.data.motherwork);
        //                 $('#motherincome').text(res.data.motherincome);
        //                 $('#fathername').text(res.data.fathername);
        //                 $('#fatherwork').text(res.data.fatherwork);
        //                 $('#fatherincome').text(res.data.fatherincome);
        //                 $('#totalincome').text(res.data.totalincome);

        //                 if ((res.data.usercategory) == "Pasukan Beruniform") {
        //                     $('#tunjuklah').show();
        //                 } else {
        //                     $('#tunjuklah').hide();
        //                 }

        //                 if ((res.data.motherincomefile) == null) {
        //                     $(document).ready(function() {
        //                         $('#motherincomefile').hide();
        //                         $('#penyatapendapatanibu').hide();
        //                     });
        //                 } else {
        //                     $('#motherincomefile').show();
        //                     $('#penyatapendapatanibu').show();
        //                     $('#motherincomefile').html('<a href="uploads/' + res.data.motherincomefile + '" target="_blank">Penyata Pendapatan Ibu</a>');

        //                 }

        //                 if ((res.data.fatherincomefile) == null) {
        //                     $(document).ready(function() {
        //                         $('#fatherincomefile').hide();
        //                         $('#penyatapendapatanbapa').hide();
        //                     });
        //                 } else {
        //                     $('#fatherincomefile').show();
        //                     $('#penyatapendapatanbapa').show();
        //                     $('#fatherincomefile').html('<a href="uploads/' + res.data.fatherincomefile + '" target="_blank">Penyata Pendapatan Bapa</a>');

        //                 }

        //                 $('#totalsiblings').text(res.data.totalsiblings);
        //                 $('#siblingsnumber').text(res.data.siblingsnumber);
        //                 $('#familymembersname').text(res.data.familymembersname);
        //                 $('#institutename').text(res.data.institutename);
        //                 $('#yearstudy').text(res.data.yearstudy);
        //                 $('#fee').text(res.data.fee);
        //                 $('#feestatus').text(res.data.feestatus);
        //                 $('#totalscholarship').text(res.data.totalscholarship);

        //             } else {

        //             }


        //         }
        //     })


        // });

        // $(document).ready(function() {
        //     $('#tunjuklah').hide();
        // });

        // function showInput(e) {
        //     if (e.value == "Pasukan Beruniform") {
        //         $(document).ready(function() {
        //             $('#tunjuklah').show();
        //         });
        //     } else {
        //         $('#tunjuklah').hide();
        //     }
        // }
    </script>


</body>

</html>