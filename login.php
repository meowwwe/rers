<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include "connection.php";
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>e-ReRs | Log Masuk</title>
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
  <link rel="icon" href="dist/img/2.ico">
</head>

<style>
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* input[type=number] {
    -moz-appearance: textfield;
  } */

  .swal-wide {
    display: flex !important;
  }
</style>



<body class="hold-transition login-page" style="background-color:black">
  <div style="background-image: url('dist/img/raubmaghribi.jpg');
  height:100vh;
  width:100%;
  position:absolute;
  filter:blur(0 .8px);
  background-size:cover;
  background-position: bottom;
  background-attachment: fixed;
	overflow: hidden; ">
  </div>

  <div class="modal fade" id="modalciptaAkaun" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="modal-header text-center bg-primary">
          <h4 class="modal-title w-100" style="font-weight:bold">CIPTA AKAUN BARU</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="ajaxCiptaAkaun">
          <div class="modal-body" style="display:flex;justify-content:center;align-items:center;">
            <div style="display:block;width:100%">
              <div style="padding:10px">
                <small><span style="color:red">*</span><b style="color:red">SILA PASTIKAN SEGALA MAKLUMAT YANG DIBERIKAN ADALAH TEPAT</b></small>
              </div>
              <div class="input-group col-12 form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text form-control"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="daftarnama" placeholder="Nama Penuh" required>
              </div>

              <div class="input-group col-6 form-group" style="float:right">
                <div class="input-group-prepend">
                  <span class="input-group-text form-control"><i class="fa fa-id-card"></i></span>
                </div>
                <input type="number" class="form-control" name="daftaric" placeholder="Kad Pengenalan" required>
              </div>

              <div class="input-group col-6 form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text form-control"><i class="fa fa-id-badge"></i></span>
                </div>
                <input type="number" class="form-control" name="daftarmatrik" placeholder="Nombor Matrik" required>
              </div>

              <div class="input-group col-6 form-group" style="float:right">
                <div class="input-group-prepend">
                  <span class="input-group-text form-control"><i class="fa fa-list-ol"></i></span>
                </div>
                <input type="number" class="form-control" name="daftarsemester" placeholder="Bahagian/Semester" required>
              </div>

              <div class="input-group col-6 form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text form-control"><i class="fa fa-building"></i></span>
                </div>
                <input type="text" class="form-control" name="daftarprogram" placeholder="Program" required>
              </div>

              <div class="input-group col-12 form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text form-control"><i class="fa fa-phone"></i></span>
                </div>
                <input type="number" class="form-control" name="daftartelefon" placeholder="Nombor Telefon" required>
              </div>

              <div class="input-group col-12 form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text form-control"><i class="fa fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" name="daftaremel" placeholder="Alamat E-mel" required>
              </div>
              <br>
              <center><button style="width:97%" type="submit" class="btn btn-success col-12">Cipta Akaun</button></center>
            </div>
        </form>
      </div>

      <div class="modal-footer justify-content-center bg-secondary">
        <strong>Copyright &copy; 2022 UiTM Cawangan Pahang Kampus Raub</strong>
      </div>
    </div>
  </div>
  </div>


  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-danger shadow">
      <div class="text-center">
        <a href="#" draggable="false" class="h1"><b>e-ReRs</b></a>
      </div>
      <img src="dist/img/2.png" class="brand-image img-circle elevation-3 shadow" draggable="false" style="opacity:1; width:40%; display:block;margin-left:auto;margin-right:auto">
      <div class="card-body">
        <p class="login-box-msg"><b>e-Residential Registration System</b></p>
        <form id="ajaxLogin">
          <div class="input-group mb-3">
            <input type="text" name="uname" class="form-control" placeholder="Nombor Matriks" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Kad Pengenalan" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4-xs">
            <button type="submit" name="login" class="btn btn-primary btn-block" style="background-color:grey">Sign In</button>
          </div>
          <!-- /.col -->
        </form>

        <br>

        <center><button class="btn btn-success" data-toggle="modal" data-target="#modalciptaAkaun"><i class="fa fa-user-plus"></i> Cipta Akaun</button></center>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

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


  <script>
    $(document).ready(function() {

      $(document).on('submit', '#ajaxCiptaAkaun', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("submit_ciptaAkaun", true);

        $.ajax({
          type: "POST",
          url: "code.php",
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {

            var res = jQuery.parseJSON(response);

            if (res.status == 100) {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                iconColor: 'green',
                customClass: 'swal-wide',
              })

              Toast.fire({
                icon: 'success',
                html: '<b>AKAUN BERJAYA DIDAFTARKAN !</b><br> SILA LOG MASUK MENGGUNAKAN NOMBOR MATRIKS DAN NOMBOR KAD PENGENALAN YANG DIDAFTARKAN'
              })
            } else if (res.status == 200) {

              $('#modalciptaAkaun').modal('hide');
              $('#ajaxCiptaAkaun')[0].reset();

              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                iconColor: 'green',
                customClass: 'swal-wide',
              })

              Toast.fire({
                icon: 'success',
                html: '<b>AKAUN BERJAYA DIDAFTARKAN !</b><br> SILA LOG MASUK MENGGUNAKAN NOMBOR MATRIKS DAN NOMBOR KAD PENGENALAN YANG DIDAFTARKAN'
              })

            } else if (res.status == 500) {
              alert(res.message);
            }
          }
        });

      });

      $(document).on('submit', '#ajaxLogin', function(e) {
        e.preventDefault()

        var formData = new FormData(this);
        formData.append("submit_ajaxLogin", true);

        $.ajax({
          type: "POST",
          url: "code.php",
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 100) {

              window.location.href = 'index.php';

            } else if (res.status == 200) {

              window.location.href = 'index3.php';

            } else {

              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                iconColor: 'red',
                customClass: 'swal-wide',
              })

              Toast.fire({
                icon: 'error',
                html: '<b>AKAUN TIDAK WUJUD !</b><br> SILA LOG MASUK MENGGUNAKAN NOMBOR MATRIKS DAN NOMBOR KAD PENGENALAN YANG DIDAFTARKAN'
              })
            }

          }
        });

      });
    });
  </script>

</body>

</html>