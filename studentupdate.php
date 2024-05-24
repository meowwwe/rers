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
  <title>e-ReRs | Kemas Kini </title>

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
      <a href="#" class="brand-link">
        <img src="dist/img/2.png" draggable="false" class="brand-image img-circle elevation-3" style="opacity: .8">
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
            <a href="#" class="d-block">User [<?php echo $_SESSION['userid'] ?>]</a>
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
              <h1><b>Kemaskini Maklumat Pelajar</b></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Kemaskini</li>
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
                <!-- general form elements -->
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">MAKLUMAT PELAJAR</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <?php
                  include('connection.php');

                  $part = "SELECT * FROM users WHERE userid = '" . $_SESSION['userid'] . "'";
                  $query = mysqli_query($conn, $part);
                  $d = mysqli_fetch_assoc($query);

                  ?>

                  <form id="ajaxStudentUpdate">
                    <div class="card-body">
                      <div class="form-group">

                        <label>NOMBOR MATRIK:</label>
                        <input class="form-control" disabled="enabled" style="width: 100%" name="userid" value=<?php echo $_SESSION['userid'] ?>>
                      </div>

                      <div class="form-group">
                        <label>NAMA PENUH:</label>
                        <input class="form-control" disabled='enabled' name="username" value="<?php echo $d['username'] ?>">
                      </div>

                      <div class="form-group">
                        <label>PROGRAM:</label>
                        <input class="form-control" disabled='enabled' name="userprogramme" value="<?php echo $d['userprogramme'] ?>">
                      </div>

                      <div class="form-group">
                        <?php if($userpart == 0){
                          echo '<label>PART/BAHAGIAN : <span style="color:red">*</span> </label>';
                        } else {
                          echo '<label">PART/BAHAGIAN :</label>';
                        } 
                        ?>
                        <input name="userpart" type="number" class="form-control" name="userpart" required value="<?php echo $d['userpart'] ?>">
                      </div>

                      <div class="form-group">
                        <label>NO PHONE:</label>
                        <input name="userphoneno" class="form-control" name="userphoneno" value="<?php echo $d['userphoneno'] ?>">
                      </div>

                      <div class="form-group">
                        <label>ALAMAT EMEL:</label>
                        <input name="useremail" class="form-control" name="useremail" value="<?php echo $d['useremail'] ?>">
                      </div>

                      <center><button type="submit" class="btn btn-success">Kemas Kini Maklumat</button></center>
                    </div>
                  </form>

                </div>
                <!-- /.card -->
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </section>
      
    </div>
    <!-- /.content-wrapper -->

    <?php include 'footer.php' ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- wrapper -->

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- Page specific script -->
  <script>
    $(document).on('submit', '#ajaxStudentUpdate', function(e) {
      e.preventDefault()

      var formData = new FormData(this)
      formData.append("submit_ajaxStudentUpdate", true)

      $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {

          var res = jQuery.parseJSON(response)

          if (res.status == 100) {
            Swal.fire({
              title: "Maklumat Anda Berjaya Dikemaskini !",
              icon: "success",
              showDenyButton: false,
              confirmButtonText: "Okay",
              denyButtonText: "Dismiss"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "index3.php"
              } else {
                window.location.href = "index3.php"
              }
            })
          } else {
            Swal.fire({
              title: "Maklumat Anda Gagal Dikemaskini !",
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