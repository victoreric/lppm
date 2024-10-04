<?php
include 'menuA.php';
include '../link.php';
?>

<!-- Main content starts -->
<div class="container-fluid mb-5">
    <div class="row">
        <div class="main-header">
            <h4>Dashboard</h4>
        </div>
    </div>

    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Umum</h6>
        </div>
        <div class="card-body" style="color:black">
            <p><b>Selamat datang</b> di Sistem Informasi Surat Keterangan Fakultas Teknik Universitas Pattimura.</p>
            <p class="text-justify">Aplikasi Permohonan surat keterangan mahasiswa secara elektronik merupakan aplikasi yang dikembangkan oleh Sub Bagian Kemahasiswaan dan Alumni Fakultas Teknik.
            </p>
            <p class="mb-0 text-justify">Aplikasi ini membantu mahasiswa yang ingin mengajukan surat keterangan kepada pihak Fakultas Teknik. Surat keterangan yang dimaksud antara lain : Surat Keterangan Aktif Kuliah, Surat Keterangan Kartu Tanda Mahasiswa Sementara dan Surat Keterangan Rekomendasi.</p>
        </div>
    </div>

    <!-- Statistik  -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Permohonan</div>
                        <?php
                        $query="SELECT * From surat";
                        $sql=mysqli_query($conn,$query);
                        $total=mysqli_num_rows($sql);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?>
                        <small>Surat</small>
                        <p class="text-xs bg-secondary text-white"></p>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-envelope-open-o fa-2x text-gray-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Surat Aktif Kuliah</div>
                        <?php
                        $query="SELECT * From surat WHERE jenis='1'";
                        $sql=mysqli_query($conn,$query);
                        $total=mysqli_num_rows($sql);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?>
                        <small>Surat</small>
                        <p class="text-xs bg-danger text-white"></p>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-envelope-open fa-2x text-gray-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Surat KTM Sementara</div>
                            <?php
                        $query="SELECT * From surat WHERE jenis='2'";
                        $sql=mysqli_query($conn,$query);
                        $total=mysqli_num_rows($sql);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?>
                        <small>Surat</small>
                        <p class="text-xs bg-danger text-white"></p>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-envelope-o fa-2x text-gray-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Surat Rekomendasi</div>
                        <?php 
                            $query="SELECT * From surat WHERE jenis='3'";
                        $sql=mysqli_query($conn,$query);
                        $total=mysqli_num_rows($sql);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?>
                        <small>Surat</small>
                        <p class="text-xs bg-danger text-white"></p>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-envelope fa-2x text-gray-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Permohonan yang telah diproses</div>
                        <?php
                        $query="SELECT * From surat WHERE ttd='ttd.png'";
                        $sql=mysqli_query($conn,$query);
                        $total=mysqli_num_rows($sql);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?>
                        <small>Surat</small>
                        <p class="text-xs bg-success text-white"></p>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-envelope-open-o fa-2x text-gray-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Surat Aktif Kuliah</div>
                        <?php
                        $query="SELECT * From surat WHERE ttd='ttd.png' && jenis='1' ";
                        $sql=mysqli_query($conn,$query);
                        $total=mysqli_num_rows($sql);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?>
                        <small>Surat</small>
                        <p class="text-xs bg-success text-white">Telah diproses</p>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-envelope-open fa-2x text-gray-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Surat KTM Sementara</div>
                            <?php
                        $query="SELECT * From surat WHERE ttd='ttd.png' && jenis='2'";
                        $sql=mysqli_query($conn,$query);
                        $total=mysqli_num_rows($sql);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?>
                        <small>Surat</small>
                        <p class="text-xs bg-success text-white">Telah diproses</p>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-envelope-o fa-2x text-gray-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Surat Rekomendasi</div>
                        <?php 
                            $query="SELECT * From surat WHERE  ttd='ttd.png' && jenis='3'";
                        $sql=mysqli_query($conn,$query);
                        $total=mysqli_num_rows($sql);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?>
                        <small>Surat</small>
                        <p class="text-xs bg-success text-white">Telah diproses</p>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-envelope fa-2x text-gray-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Permohonan yang belum diproses</div>
                        <?php
                        $query="SELECT * From surat WHERE ttd=''";
                        $sql=mysqli_query($conn,$query);
                        $total=mysqli_num_rows($sql);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?>
                        <small>Surat</small>
                        <p class="text-xs bg-danger text-white"></p>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-envelope-open-o fa-2x text-gray-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Surat Aktif Kuliah</div>
                        <?php
                        $query="SELECT * From surat WHERE ttd='' && jenis='1' ";
                        $sql=mysqli_query($conn,$query);
                        $total=mysqli_num_rows($sql);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?>
                        <small>Surat</small>
                        <p class="text-xs bg-danger text-white">Belum diproses</p>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-envelope-open fa-2x text-gray-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Surat KTM Sementara</div>
                            <?php
                        $query="SELECT * From surat WHERE ttd='' && jenis='2'";
                        $sql=mysqli_query($conn,$query);
                        $total=mysqli_num_rows($sql);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?>
                        <small>Surat</small>
                        <p class="text-xs bg-danger text-white">Belum diproses</p>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-envelope-o fa-2x text-gray-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Surat Rekomendasi</div>
                        <?php 
                            $query="SELECT * From surat WHERE  ttd='' && jenis='3'";
                        $sql=mysqli_query($conn,$query);
                        $total=mysqli_num_rows($sql);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?>
                        <small>Surat</small>
                        <p class="text-xs bg-danger text-white">Belum diproses</p>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-envelope fa-2x text-gray-30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- endStatistik  -->


<!-- endContainerFluid -->
</div>


<?php
include '../footer.php';
?>
