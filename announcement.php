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
  <title>e-ReRs | Pemberitahuan</title>
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
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link rel="icon" type="image/x-icon" href="dist/img/2.ico"/>

  <!-- include libraries(jQuery, bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>

<style>
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

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
              <h1><b>Pemberitahuan</b></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pemberitahuan</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Paparan Pengumuman</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">

              <div id="displayPenguguman">

                <?php
                include('connection.php');

                $query = "SELECT * FROM notify";
                // FETCHING DATA FROM DATABASE
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                  // OUTPUT DATA OF EACH ROW
                  while ($row = $result->fetch_assoc()) {
                    echo $row['text'];
                  }
                } else {
                  echo "TIADA PEMBERITAHUAN BARU SETAKAT INI";
                }
                ?>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
        </div>


        <div class="container-fluid">
          <form id="ajax_sendAnnouncement" enctype="multipart/form-data">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Buat Pengumuman</h3>
              </div>
              <div class="card-body">
                  <textarea id="summernote" name="notify" class="form-control" style="height: 140px;"></textarea>
                  <br>
                <div class="text-center">
                  <button type="submit" class="btn btn-danger deleteAnnouncementBtn">Buang</button>
                  <button type="submit" class="btn btn-primary submitAnnouncementBtn">Paparkan</button>
                </div>
              </div>

            </div>
          </form>

          <script>
            $('#summernote').summernote({
              placeholder: 'Buat Pengumuman Disini !',
              tabsize: 2,
              height: 250,
              spellCheck: false,
              toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['undo', 'redo', 'help']]
              ]
            });
          </script>

        </div>


    </div>

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
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js'></script>
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="plugins/toastr/toastr.min.js"></script>

  <script>
    $(document).on('submit', '#ajax_sendAnnouncement', function(e) {
      e.preventDefault()

      var formData = new FormData(this)
      formData.append("submit_ajaxSendAnnouncement", true)

      $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {

          var res = jQuery.parseJSON(response)

          if (res.status == 100) {

            $('#displayPenguguman').load(location.href + " #displayPenguguman");

            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              customClass: 'swal-wide',
            })

            Toast.fire({
              icon: 'success',
              html: '<b>Penguguman Berjaya Dipaparkan !</b>'
            })

          } else {
            
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              customClass: 'swal-wide',
            })

            Toast.fire({
              icon: 'error',
              html: '<b>Penguguman Gagal Dipaparkan !</b>'
            })

          }
        }
      });

    });

    $(document).on('click', '.deleteAnnouncementBtn', function(e) {
      e.preventDefault()

      $.ajax({
        type: "POST",
        url: "code.php",
        data: {
          'submit_deleteAnnouncement': true,
        },
        success: function(response) {

          var res = jQuery.parseJSON(response)

          if (res.status == 100) {
            $('#displayPenguguman').load(location.href + " #displayPenguguman");
            
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              customClass: 'swal-wide',
            })

            Toast.fire({
              icon: 'success',
              html: '<b>Penguguman Berjaya Dipadamkan !</b>'
            })

          }
        }
      });

    });
  </script>


</body>

</html>