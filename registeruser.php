<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ReRs | Daftar Pengguna</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <link rel="icon" type="image/x-icon" href="dist/img/2.ico"/>
</head>


<body style="background-image: url('dist/img/raubmaghribi.jpg');background-size: cover;
	background-position: bottom;
	background-repeat: repeat-y;
  background-attachment: fixed;
	position: relative;
	overflow: hidden; " class="hold-transition login-page">


  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-danger shadow">
      <div class="text-center">
        <a href="#" draggable="false" class="h1"><b>ReRs</b></a>
      </div>
      <img src="dist/img/2.png" class="brand-image img-circle elevation-3 shadow" draggable="false" style="opacity:1; width:40%; display:block;margin-left:auto;margin-right:auto">
      <div class="card-body">
        <p class="login-box-msg"><b>Residential Registration System</b></p>
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" name="uname" class="form-control" placeholder="User ID" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4-xs">
            <button type="submit" name="login" id="login" class="btn btn-primary btn-block" style="background-color:grey">Sign In</button>
          </div>
          <!-- /.col -->
        </form>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js'></script>
  <script src="https://cdn.lordicon.com/qjzruarw.js"></script>

  <?php

  session_start();

  include "connection.php";

  if (isset($_POST['uname']) && isset($_POST['password'])) {

    $uname = ($_POST['uname']);

    $pass = ($_POST['password']);

    if (empty($uname)) {
    } else if (empty($pass)) {
    } else {

      $sql = "SELECT * FROM users u JOIN userlevels ul ON u.userlevelid = ul.userlevelid WHERE u.userid='$uname' AND u.userpassword ='" . md5($pass) . "'";

      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        if ($row['userid'] == $uname && $row['userpassword'] == md5($pass) && $row['userlevelid'] == 1) {

          $_SESSION['userlogged'] = 1;
          $_SESSION['userid'] = $row['userid'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['useremail'] = $row['useremail'];
          $_SESSION['userprogramme'] = $row['userprogramme'];
          $_SESSION['userphoneno'] = $row['userphoneno'];
          $_SESSION['userpart'] = $row['userpart'];
          $_SESSION['useric'] = $row['useric'];
          $_SESSION['usergender'] = $row['usergender'];
          $_SESSION['userlevelid'] = $row['userlevelid'];
          header("Location: index.php");
        } else if ($row['userid'] == $uname && $row['userpassword'] == md5($pass) && $row['userlevelid'] == 2) {
          $_SESSION['userlogged'] = 1;
          $_SESSION['userid'] = $row['userid'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['useremail'] = $row['useremail'];
          $_SESSION['userprogramme'] = $row['userprogramme'];
          $_SESSION['userphoneno'] = $row['userphoneno'];
          $_SESSION['userpart'] = $row['userpart'];
          $_SESSION['useric'] = $row['useric'];
          $_SESSION['usergender'] = $row['usergender'];
          $_SESSION['userlevelid'] = $row['userlevelid'];

          header("Location: index3.php");
        }
      } else {
  ?>

        <script>
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            iconColor: 'red',
          })

          Toast.fire({
            //iconHtml: '<img src="dist/img/error.png" style="width:40px;">',
            
            icon: 'error',
            title: '<b>Maklumat Tidak Sah !</b> ',
            html: '<small>PASTIKAN MAKLUMAT YANG DIMASUKKAN ADALAH TEPAT DAN BENAR  </small>'
          })
        </script>

  <?php
      }
    }
  }

  ?>

</body>

</html>