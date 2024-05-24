<?php

include 'connection.php';

$query = "SELECT * FROM users WHERE userid = '" . $_SESSION['userid'] . "'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $userlevelid = $row['userlevelid'];
    $userpart = $row['userpart'];
  }
}

if ($userpart == 1 && $userlevelid == 2) {
  echo '<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

      <li class="nav-item">
        <a href="index3.php" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Halaman Utama
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="studentupdate.php" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
            Kemaskini Maklumat
          </p>
        </a>
      </li>

        <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-credit-card"></i>
          <p>
            Mohon Yuran Kolej
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pengecualian.php" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p>Pengecualian Bayaran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pengurangan.php" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p>Pengurangan Bayaran</p>
            </a>
          </li>
        </ul>

        <li class="nav-item">
          <a href="semakstatus.php" class="nav-link">
            <i class="nav-icon fa fa-spinner"></i>
            <p>Status Permohonan</p>
          </a>
        </li>

        <li class="nav-item">
        <a href="pemulangan.php" class="nav-link">
          <i class="nav-icon fas fa-key"></i>
          <p>Pemulangan Kunci</p>
        </a>
        </li>

        <li class="nav-item">
        <a target="_blank" data-title="MANUAL_PENGGUNAAN_PELAJAR" href="./file/MANUAL_PENGGUNAAN_USERS.pdf" class="nav-link">
          <i class="nav-icon fa fa-question-circle"></i>
          <p>
            Panduan
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="logout.php" class="nav-link">
          <i class="nav-icon fa fa-sign"></i>
          <p>
            Log Keluar
          </p>
        </a>
      </li>
    </ul>

  </nav>';
} else if ($userpart > 1 && $userlevelid == 2) {
  echo '<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

    <li class="nav-item">
      <a href="index3.php" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Halaman Utama
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="studentupdate.php" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Kemaskini Maklumat
        </p>
      </a>
    </li>

      <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-credit-card"></i>
        <p>
          Mohon Yuran Kolej
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="pengecualian.php" class="nav-link">
            <i class="nav-icon far fa-circle"></i>
            <p>Pengecualian Bayaran</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pengurangan.php" class="nav-link">
            <i class="nav-icon far fa-circle"></i>
            <p>Pengurangan Bayaran</p>
          </a>
        </li>
      </ul>

      <li class="nav-item">
        <a href="semakstatus.php" class="nav-link">
          <i class="nav-icon fa fa-spinner"></i>
          <p>Status Permohonan</p>
        </a>
      </li>
      
      <li class="nav-item">
      <a href="pemulangan.php" class="nav-link">
        <i class="nav-icon fas fa-key"></i>
        <p>Pemulangan Kunci</p>
      </a>
      </li>
      
      <li class="nav-item">
      <a target="_blank" href="./file/MANUAL_PENGGUNAAN_USERS.pdf" class="nav-link">
        <i class="nav-icon fa fa-question-circle"></i>
        <p>
          Panduan
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="logout.php" class="nav-link">
        <i class="nav-icon fa fa-sign"></i>
        <p>
          Log Keluar
        </p>
      </a>
    </li>
  </ul>

  </nav>';
} else if ($userlevelid == 1) {
  echo '<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

      <li class="nav-item">
        <a href="index.php" class="nav-link">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Halaman Utama
          </p>
        </a>
      </li>
      
      <li class="nav-item">
      <a href="access.php" class="nav-link">
        <i class="nav-icon fa fa-unlock-alt"></i>
        <p>
          Akses Rumah/Bilik
        </p>
      </a>
      </li>
      <li class="nav-item">
        <a href="announcement.php" class="nav-link">
          <i class="nav-icon fas fa-bell"></i>
          <p>Pemberitahuan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="daftarpemohon.php" class="nav-link">
          <i class="nav-icon fa fa-user-plus"></i>
          <p>
            Daftar Pemohon
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="senarai.php" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Senarai Pemohon
          </p>
        </a>
      </li>


      <li class="nav-item">
      <a href="adminpemulangan.php" class="nav-link">
        <i class="nav-icon fas fa-key"></i>
        <p>
          Serahan Kunci
        </p>
      </a>
      </li>

      <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
          Laporan
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="reportm.php" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>04A</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="reportf.php" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>08A</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="reportf2.php" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>09A</p>
        </a>
      </li>
    </ul>
    
    <li class="nav-item">
    <a href="rekodterkini.php" class="nav-link">
      <i class="nav-icon fa fa-database"></i>
      <p>Rekod Semester Terkini</p>
    </a>
    </li>
  
    <li class="nav-item">
    <a target="_blank" href="./file/MANUAL_PENGGUNAAN_ADMIN.pdf" class="nav-link">
      <i class="nav-icon fa fa-question-circle"></i>
      <p>
        Panduan
      </p>
    </a>
  </li>

      <li class="nav-item">
        <a href="logout.php" class="nav-link">
          <i class="nav-icon fa fa-sign"></i>
          <p>
            Logout
          </p>
        </a>
      </li>
    </ul>
  </nav>';
} else if ($userlevelid == 3) {
  echo '<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

    <li class="nav-item">
      <a href="index.php" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          Halaman Utama
        </p>
      </a>
    </li>
    <li class="nav-item">
    <a href="tambahadmin.php" class="nav-link">
      <i class="nav-icon fa fa-plus-square"></i>
      <p>
         Tambah Admin
      </p>
    </a>
    </li>
    <li class="nav-item">
    <a href="access.php" class="nav-link">
      <i class="nav-icon fa fa-unlock-alt"></i>
      <p>
        Akses Rumah/Bilik
      </p>
    </a>
    </li>
    <li class="nav-item">
      <a href="announcement.php" class="nav-link">
        <i class="nav-icon fas fa-bell"></i>
        <p>Pemberitahuan</p>
      </a>
    </li>
    <li class="nav-item">
    <a href="daftarpemohon.php" class="nav-link">
      <i class="nav-icon fa fa-user-plus"></i>
      <p>
        Daftar Pemohon
      </p>
    </a>
    </li>
    <li class="nav-item">
      <a href="senarai.php" class="nav-link">
        <i class="nav-icon fas fa-list"></i>
        <p>
          Senarai Pemohon
        </p>
      </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fa fa-credit-card"></i>
      <p>
        Utiliti
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="adminpengecualian.php" class="nav-link">
      <i class="nav-icon fa fa-circle"></i>
      <p>Pengecualian Bayaran</p>
    </a>
    </li>
    </ul>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="adminpengurangan.php" class="nav-link">
      <i class="nav-icon fa fa-circle"></i>
      <p>Pengurangan Bayaran</p>
    </a>
    </li>
    </ul>

    <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-table"></i>
      <p>
        Laporan
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="reportm.php" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>04A</p>
        </a>
      </li>
    </ul>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="reportf.php" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>08A</p>
        </a>
      </li>
    </ul>
    <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="reportf2.php" class="nav-link">
        <i class="nav-icon fas fa-building"></i>
        <p>09A</p>
      </a>
    </li>
  </ul>

  <li class="nav-item">
  <a href="adminpemulangan.php" class="nav-link">
    <i class="nav-icon fas fa-key"></i>
    <p>
      Serahan Kunci
    </p>
  </a>
  </li>

  <li class="nav-item">
  <a href="rekodterkini.php" class="nav-link">
    <i class="nav-icon fa fa-database"></i>
    <p>Rekod Semester Terkini</p>
  </a>
  </li>

      <li class="nav-item">
      <a target="_blank" href="./file/MANUAL_PENGGUNAAN_ADMIN.pdf" class="nav-link">
        <i class="nav-icon fa fa-question-circle"></i>
        <p>
          Panduan
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="logout.php" class="nav-link">
        <i class="nav-icon fa fa-sign"></i>
        <p>
          Logout
        </p>
      </a>
    </li>
  </ul>
  </nav>';
} else if ($userlevelid == 4) {
  echo '<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

    <li class="nav-item">
      <a href="index.php" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          Halaman Utama
        </p>
      </a>
    </li>

    <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fa fa-credit-card"></i>
      <p>
        Utiliti
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="adminpengecualian.php" class="nav-link">
      <i class="nav-icon fa fa-circle"></i>
      <p>Pengecualian Bayaran</p>
    </a>
    </li>
    </ul>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="adminpengurangan.php" class="nav-link">
      <i class="nav-icon fa fa-circle"></i>
      <p>Pengurangan Bayaran</p>
    </a>
    </li>
    </ul>

    <li class="nav-item">
      <a href="logout.php" class="nav-link">
        <i class="nav-icon fa fa-sign"></i>
        <p>
          Logout
        </p>
      </a>
    </li>
  </ul>
  </nav>';
} else if ($userpart == 0 && $userlevelid == 2) {
  echo '<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

    <li class="nav-item">
      <a href="index3.php" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Halaman Utama
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="studentupdate.php" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Kemaskini Maklumat
        </p>
      </a>
    </li>
    
      <li class="nav-item">
      <a target="_blank" href="./file/MANUAL_PENGGUNAAN_USERS.pdf" class="nav-link">
        <i class="nav-icon fa fa-question-circle"></i>
        <p>
          Panduan
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="logout.php" class="nav-link">
        <i class="nav-icon fa fa-sign"></i>
        <p>
          Log Keluar
        </p>
      </a>
    </li>
  </ul>

  </nav>';
} else if ($userlevelid == 5) {
  echo '<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

      <li class="nav-item">
        <a href="index.php" class="nav-link">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Halaman Utama
          </p>
        </a>
      </li>
      
      <li class="nav-item">
        <a href="announcement.php" class="nav-link">
          <i class="nav-icon fas fa-bell"></i>
          <p>Pemberitahuan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="daftarpemohon.php" class="nav-link">
          <i class="nav-icon fa fa-user-plus"></i>
          <p>
            Daftar Pemohon
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="senarai.php" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Senarai Pemohon
          </p>
        </a>
      </li>


      <li class="nav-item">
      <a href="adminpemulangan.php" class="nav-link">
        <i class="nav-icon fas fa-key"></i>
        <p>
          Serahan Kunci
        </p>
      </a>
      </li>

      <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
          Laporan
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="reportm.php" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>04A</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="reportf.php" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>08A</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="reportf2.php" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>09A</p>
        </a>
      </li>
    </ul>

    
    <li class="nav-item">
    <a target="_blank" href="./file/MANUAL_PENGGUNAAN_ADMIN.pdf" class="nav-link">
      <i class="nav-icon fa fa-question-circle"></i>
      <p>
        Panduan
      </p>
    </a>
    </li>

      <li class="nav-item">
        <a href="logout.php" class="nav-link">
          <i class="nav-icon fa fa-sign"></i>
          <p>
            Logout
          </p>
        </a>
      </li>
    </ul>
  </nav>';
}
