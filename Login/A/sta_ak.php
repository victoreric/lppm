<?php  include 'menuA.php';
include '../link.php'?>
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Statistik</a></li>
    <li class="breadcrumb-item"><a href="sta_ak.php">Surat Aktif Kuliah</a></li>
  </ul>
</div>

<div class="container-fluid">
<div class="card">
  <div class="card-header text-center">Statistik Permintaan Surat Aktif Kuliah</div>
  <div class="card-body">

    <div class="row">
        <?php 
            $sql="SELECT * FROM surat WHERE jenis='1'";
            $queri=mysqli_query($conn,$sql);
            $cek=mysqli_num_rows($queri);
        ?>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Permintaan Surat Aktif Kuliah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cek ?>
                            <small>Surat</small>
                            <!-- <p class="text-xs bg-primary text-white">Sudah diproses</p> -->
                        </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-envelope-open-o fa-2x text-gray-30"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            $sqlp="SELECT * FROM surat WHERE jenis='1' AND ttd='ttd.png'";
            $querip=mysqli_query($conn,$sqlp);
            $cekp=mysqli_num_rows($querip);
        ?>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Permohonan yang telah diproses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cekp ?>
                            <small>Surat</small>
                            <p class="text-xs bg-success text-white">Sudah diproses</p>
                        </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-envelope-open-o fa-2x text-gray-30"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            $sqlb="SELECT * FROM surat WHERE jenis='1' AND ttd=''";
            $querib=mysqli_query($conn,$sqlb);
            $cekb=mysqli_num_rows($querib);
        ?>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Permohonan yang belum diproses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cekb ?>
                            <small>Surat</small>
                            <p class="text-xs bg-danger text-white">Belum diproses</p>
                        </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-envelope-open-o fa-2x text-gray-30"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

</div>
</div>
</div>

<?php include '../footer.php'; ?>