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
  <title>e-ReRs | Senarai Admin </title>

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
  <link rel="icon" type="image/x-icon" href="dist/img/2.ico"/>
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
              <h1><b>Maklumat Admin</b></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Admin</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        <div class="col-sm-12">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modaltambahAdmin"><i class="fa fa-user-plus"></i> Tambah Admin</button>
          <button class="btn btn-success" data-toggle="modal" data-target="#modalupdateAdmin"><i class="fa fa-edit"></i> Kemaskini Admin</button>
        </div>
      </section>

      <form id="ajaxtambahAdmin">
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modaltambahAdmin">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header text-center bg-primary">
                <h4 class="modal-title w-100"><b>TAMBAH ADMIN</b></h4>
                <button type="button" class="close" data-dismiss="modal" id="tutupmodalAdmin" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Penuh</label>
                  <input type="text" class="form-control" name="username" placeholder="Nama Penuh" required>
                </div>
                <div class="form-group">
                  <label>Staff ID</label>
                  <input type="number" class="form-control" name="userid" placeholder="Staff / Unik ID" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="userpassword" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label>JENIS AKAUN</label>
                  <select name="usertype" class="form-control">
                    <option value="" selected hidden>-</option>
                    <option value="4">PANEL PENILAI</option>
                    <option value="5">AHLI JPK</option>
                    <option value="1">STAFF UPK</option>
                    <option value="3">MODERATOR</option>
                  </select>
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

      <form id="ajaxupdateAdmin">
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalupdateAdmin">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header text-center bg-success">
                <h4 class="modal-title w-100"><b>KEMAS KINI MAKLUMAT ADMIN</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Penuh</label>
                  <input type="text" class="form-control" name="username" placeholder="Nama Penuh Admin" required>
                </div>
                <div class="form-group">
                  <label>Staff ID</label>
                  <input type="number" class="form-control" name="userid" placeholder="Staff ID Admin" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="userpassword" placeholder="Password" required>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>

                <button type="submit" class="btn btn-success">Teruskan</button>
              </div>
            </div>
          </div>
        </div>
      </form>

      <!-- Main content -->
      <section class="content">
        <div class="col-12 col-sm-12">
          <div class="card card-purple card-tabs">
            <div class="card-header">
              <h3 class="card-title">Senarai Admin</h3>
            </div>
            <div class="card-body" style="overflow-x:auto">

              <table id="ajaxsenaraiAdmin" style="width:100%" class="table table-bordered table-striped table-hover text-center table-sm">
                <thead style="background-color:#a29bfe">
                  <tr>
                    <th>STAFF ID</th>
                    <th>NAMA</th>
                    <th>ACCESS</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
              </table>


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
    var i = 1

    $(document).ready(function() {
      table = $('#ajaxsenaraiAdmin').DataTable({
        "pageLength": 4,
        "destroy": true,
        "ajax": {
          'type': 'POST',
          'url': 'dataTableSenaraiAdmin.php'
        },
        "columns": [{
            data: 'userid'
          },
          {
            data: 'username'
          }, {
            data: 'userlevelid',
            render: function(data, type, row) {

              if (data == 1) {
                result = "<b>Staff UPK</b>";
              } else if (data == 4) {
                result = "<b>Panel Penilai</b>"
              } else if (data == 5) {
                result = "<b>JPK</b>"
              } else if (data == 3) {
                result = "<b>Moderator</b>"
              } else {
                result = "<b>SuperAdmin</b>"
              }
              return result;

            }
          },
          {
            data: 'userid',
            render: function(data, type, row) {
              result = '<button type="button" value="' + row.userid + '" class="deleteAdminBtn btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>'
              return result;
            }
          }
        ]
      })
    });

    $(document).on('click', '.deleteAdminBtn', function(e) {
      e.preventDefault()

      var userid = $(this).val();

      Swal.fire({
        title: 'Adakah Anda Pasti ?',
        text: "Admin Tersebut Akan Dibuang",
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
            'Admin Berjaya Dibuang !',
            'success'
          )

          $.ajax({
            type: "POST",
            url: "code.php",
            data: {
              'submit_deleteAdmin': true,
              'userid': userid
            },
            success: function(response) {

              table.ajax.reload(null, false)

              var res = jQuery.parseJSON(response);
            }
          });
        }
      })

    });

    $(document).on('submit', '#ajaxtambahAdmin', function(e) {
      e.preventDefault()

      formData = new FormData(this)
      formData.append("submit_ajaxtambahAdmin", true)

      $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {

          var res = jQuery.parseJSON(response)

          table.ajax.reload(null, false)

          if (res.status == 100) {
            $('#tutupmodalAdmin').trigger('click')
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              iconColor: 'green',
              customClass: 'swal-wide',
            })

            Toast.fire({
              icon: 'success',
              html: '<b>AKAUN BERJAYA DIDAFTARKAN !</b>'
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
              html: '<b>AKAUN SUDAH WUJUD !</b>'
            })

          }

        }
      });


    });

    $(document).on('submit', '#ajaxupdateAdmin', function(e) {
      e.preventDefault()

      var formData = new FormData(this)
      formData.append("submit_updateAdmin", true)

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
              title: 'Akaun Berjaya Diubah',
              text: "Sila Log Masuk Menggunakan ID/Password Yang Telah Diubah",
              icon: 'success',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Okay '
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "logout.php"
              } else {
                window.location.href = "logout.php"
              }
            })

          }

        }
      });

    });
  </script>

</body>

</html>