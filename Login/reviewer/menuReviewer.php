<?php
include '../assets/fungsi.php';
include '../assets/indohari.php';

$id_login=$_SESSION['id_login'];

session_start();
if(!isset($_SESSION['nama_admin'])){
   echo "<script> alert('Anda Belum Login'); window.location='../index.php'; </script>";
   session_destroy();
} 

$level=$_SESSION['level_admin'];
if($level=='103'){
    ?>
    <!-- MenuForAdmin -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Aplikasi LPPM">
        <meta name="author" content="Victor Pattiradjawane">
        <title>Sistem Informasi LPPM</title>

        <!-- Custom fonts for this template-->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


        <!-- Custom styles for this template-->
        <link href="../vendor/css/sb-admin-2.css" rel="stylesheet">

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="../vendor/jquery/jquery.min.js"></script>

         <!-- untuk memberi titik sebagai pemisah pada input harga -->
         <script type="text/javascript" src="../vendor/js/tandapisah.js"></script>
        <!-- endScript -->

        <!-- datePicker -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <!-- scriptJamDigital -->
        <script type="text/javascript">
            // 1 detik = 1000
            window.setTimeout("waktu()",1000);
            function waktu() {
            var tanggal = new Date();
            setTimeout("waktu()",1000);
            document.getElementById("tanggalku").innerHTML
            = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
            }
        </script>

        <!-- forDataTable -->
        <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            .table{
                color:black;
            }
        </style>
    
    </head>
    <body id="page-top" onload="waktu()">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-icon">
                        <!-- <i class="fas fa-laugh-wink"></i> -->
                        <img src="../assets/img/unpattilogo.png" width="50px" alt="">
                    </div>
                    <div class="sidebar-brand-text mx-3">REVIEWER LPPM<sup></sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard Reviewer</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                   Proposal Penelitian
                </div>
                <!-- Nav Item - statistik Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsulan"
                        aria-expanded="true" aria-controls="collapseUsulan">
                        <i class="fa fa-th-list fa-chart-area"></i>
                        <span>Penilaian Proposal</span>
                    </a>
                    <div id="collapseUsulan" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="list_usulan_riset_R.php">Adm. & Substansi</a>
                            <a class="collapse-item" href="lap_kemajuan.php">Laporan Kemajuan</a>
                            <a class="collapse-item" href="lap_akhir.php">Laporan Akhir</a>
                        </div>
                    </div>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">


                <li class="nav-item">
                    <span class="nav-link collapsed" aria-expanded="true" aria-controls="collapseThree">
                        <span>
                        <?php 
                            date_default_timezone_set('Asia/Jayapura');
                            $hari=date('D');
                            echo hari_ini($hari).',';
                            echo '<br>';
                            $tgl=date('Y-m-d');
                            echo tanggal_indo($tgl);
                            echo '<br>';
                            echo "<div id='tanggalku'></div>";
                        ?>
                        </span>
                    </span>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>
                <!-- endMyMenu -->
            </ul>
            <!-- End of Sidebar -->


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

            <!-- Top NavBar -->
                <div id="topNavBar">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-dark bg-primary topbar mb-1 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-warning btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    <h6 class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 text-white">LPPM Information System </h6>
                    
                        <!-- Topbar Navbar -->
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <ul class='navbar-nav text-white'>
                            <li class="nav-item no-arrow d-sm-none"> LPPM Information system <sup></sup></li>
                        </ul>

                        <ul class="navbar-nav ml-auto">
                            <div class="topbar-divider d-none d-sm-block"></div>
                        
                            <?php
                            // include '../link.php';
                            // $nama=$_SESSION['nama'];
                            // $queriU="SELECT foto FROM dtawal WHERE nama='$nama'";
                            // $sqlU=mysqli_query($conn,$queriU);
                            // $hasilU=mysqli_fetch_assoc($sqlU);
                            // $cek=mysqli_num_rows($sqlU);
                            ?>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-white-500 small"><?php echo $_SESSION['nama_admin'];  ?></span>
                                   
                                    <img class='img-profile rounded-circle' src='../vendor/img/undraw_profile.svg'>
                                    
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                            
                                    <a class="dropdown-item" href="">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Ganti Password
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Keluar
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
    <!-- end  Topbar Navbar-->

    <?php } 
    else {
        echo "<script> alert('Anda Tidak punya akses ke Halaman ini.'); window.location='../index.php'; </script>";
        session_destroy();
        exit;
    }
    ?>