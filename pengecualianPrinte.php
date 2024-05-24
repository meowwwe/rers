<?php include('connection.php'); ?>



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
<link rel="icon" type="image/x-icon" href="dist/img/2.ico" />
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

<html>
<style>
    body {
        background-color: white;
    }

    page[size="A4"] {
        background: white;
        width: 29.7cm;
        height: 20cm;
        display: block;
        margin: 0 auto;
        margin-bottom: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        border: 1.25cm solid transparent;
    }

    table {
        page-break-inside: auto;
    }

    tr {
        page-break-inside: avoid;
        page-break-after: auto;
    }

    thead {
        display: table-header-group;
    }

    tfoot {
        display: table-footer-group;
    }

    @media print {
        @page {
            size: "A4 landscape";
            margin: 0;
            box-shadow: 0;
        }
    }
</style>


<body>
    <?php
    $query = "WITH data_groups AS 
        (SELECT FLOOR((ROW_NUMBER() OVER (ORDER BY ppkid)) / 5) AS group_num, u.username,u.userid,p.ppkid, u.userprogramme, u.userpart, f.fee, p.totalincome, p.totalsiblings,f.institutename, p.keputusan
        FROM ppk p
        JOIN family f ON p.ppkid = f.ppkid
        JOIN users u ON u.userid = p.userid 
        WHERE submissiontype = 'PENGECUALIAN' AND usercategory = 'Lain - Lain' GROUP BY f.ppkid,f.ppkid)
        SELECT 
        GROUP_CONCAT(group_num) as group_num,GROUP_CONCAT(ppkid) as ppkid, GROUP_CONCAT(username) as username, GROUP_CONCAT(userid) as userid, GROUP_CONCAT(userprogramme) as userprogramme, GROUP_CONCAT(userpart) as userpart, GROUP_CONCAT(fee) as fee, GROUP_CONCAT(totalincome) as totalincome, GROUP_CONCAT(totalsiblings) as totalsiblings, GROUP_CONCAT(institutename) as institutename, GROUP_CONCAT(keputusan) as keputusan
        FROM data_groups
        GROUP BY group_num";
    $res = mysqli_query($conn, $query);
    $count = mysqli_num_rows($res);
    $data = array();

    $l = 1;

    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }

        for ($a = 0; $a < count($data); $a++) {
            $exp = explode(',', $data[$a]['username']);
    ?>
            <page size='A4'>
                <table class="table">

                    <?php
                    $query = "SELECT * FROM tarikhppk";
                    $result = $conn->query($query);
                    $row = mysqli_fetch_assoc($result);
                    ?>

                    <tr>
                        <td style="width: 100%">
                            <h5 style="text-align: center;">
                                PERMOHONAN PENGECUALIAN BAYARAN KOLEJ KEDIAMAN
                                <br>
                                UITM CAWANGAN PAHANG KAMPUS RAUB
                                <br>
                                SESI <?php echo $row['sesi'] ?>
                            </h5>
                        </td>
                    </tr>
                </table>

                <table style="width: 100%; border-collapse: collapse;">
                    <thead style="font-size: 14px;">
                        <tr>
                            <th class="text-center" style="width: 2%;">BIL.</th>
                            <th class="text-center" style="width: 20%;">NAMA PELAJAR</th>
                            <th class="text-center" style="width: 2%;">NO. PELAJAR</th>
                            <th class="text-center" style="width: 4%;">PROG</th>
                            <th class="text-center" style="width: 4%;">BHG</th>
                            <th class="text-center" style="width: 4%;">PEMBIAYAAN</th>
                            <th class="text-center" style="width: 15%;">PENDAPATAN KELUARGA</th>
                            <th class="text-center" style="width: 10%;">KEPUTUSAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        for ($x = 0; $x < count($exp); $x++) {

                        ?>

                            <tr>
                                <td class="text-center"><?php echo $l++; ?>.</td>
                                <td><?php echo explode(',', $data[$a]['username'])[$x]; ?></td>
                                <td class="text-center"><?php echo explode(',', $data[$a]['userid'])[$x]; ?></td>
                                <td class="text-center"><?php echo explode(',', $data[$a]['userprogramme'])[$x]; ?></td>
                                <td class="text-center"><?php echo explode(',', $data[$a]['userpart'])[$x]; ?></td>
                                <td class="text-center"><?php echo explode(',', $data[$a]['fee'])[$x]; ?></td>
                                <td class="text-center"><?php echo "RM" . " " . explode(',', $data[$a]['totalincome'])[$x] . "<br>" . explode(',', $data[$a]['totalsiblings'])[$x] . " BERADIK<br>(" . explode(',', $data[$a]['institutename'])[$x] . ")" ?></td>
                                <td class="text-center"><?php echo explode(',', $data[$a]['keputusan'])[$x]; ?></td>
                            </tr>

                        <?php
                        }
                        ?>


                    </tbody>
                </table>
            </page>
    <?php
        }
    }
    ?>



</body>

</html>