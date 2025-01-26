
<?php
include 'menu.php';
include '../link.php';


// Program Utama
if (isset($_GET['aksi'])){
    switch($_GET['aksi']){
        case "tambah":
            tambah($conn);
            break;
        case "ubah":
            ubah($conn);
            break;
        // case "lihat":
        //     lihat($conn);
        //     break;
        default:
            view($conn);
        }
} else {
    view($conn);
}


// fungsiView
function view($conn){ 
?>
<!-- Main content starts -->
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="cspen.php">Proposal</a></li>
    <li class="breadcrumb-item"><a href="#.php">Laporan Kemajuan</a></li>
  </ul>
</div>

<div class="container-fluid mb-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Laporan Kemajuan</h6>
        </div>
        <div class="card-body" style="color:black">
        <div class="panel-body">
            <table class="table table-bordered table-hover table-responsive">
                <thead>
                <tr>
                <th>No.</th>
                <th>Tahun Pengusulan</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Dana Diusulkan</th>
                <th>Dana Disetujui</th>
                <th>File Laporan Kemajuan</th>
                <th>Aksi</th>
                <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php    
                    $nidn=$_SESSION['nidn_login'];                     
                    $no=0;
                    $query="SELECT research.*, status.id_status, status.status_name
                    FROM research
                    INNER JOIN status ON status.id_status=research.status
                    WHERE nidn_ketua=$nidn AND status>3 AND status!=5
                    ORDER BY id_research DESC";

                    $sql=mysqli_query($conn,$query);
                    $cek=mysqli_num_rows($sql);
                    if(!$cek){
                        echo "tidak ada data";
                    }
                    while($hasil=mysqli_fetch_array($sql)){
                        $id_research=$hasil['id_research'];
                    // echo $hasil['status_name'];
                $no++;
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $hasil['thn_usulan_kegiatan']; ?></td>
                    <td><?php echo $hasil['nidn_ketua']; ?></td>
                    <td><?php echo $hasil['nama_ketua']; ?></td>
                    <td><?php echo $hasil['judul']; ?></td>
                    <td><?php echo $hasil['dana_usulan']; ?></td>
                    <td><?php echo $hasil['dana_disetujui']; ?></td>
                    <td> 
                        <?php
                       $fileLapMaju=$hasil['file_lap_maju'];
                        
                        if($fileLapMaju==""){
                                echo "-";
                        }
                        else {
                        ?>
                        <a href="luk.php?f=<?php echo $hasil['file_lap_maju']; ?>" target='blank'><?php echo $hasil['file_lap_maju']?>  

                        <?php
                        }
                        ?>             
                    </td>

                    <td> 
                        <?php 
                        $status=$hasil['status'];
                        if($fileLapMaju==""){ 
                        ?>
                            <!-- <a href='csPen.php?aksi=update&id=<?php echo $id_research; ?>'>Ubah </a> -->
                            <a href="progress_rep.php?aksi=tambah&id=<?php echo $id_research; ?>" class="btn btn-danger" role="button">Tambahkan file Laporan</a>
                        <?php
                        }
                        elseif($status>7){
                        ?>  
                         <a href='../reviewer/print_nilai_subs.php?id=<?php echo $id_research; ?>' class="btn btn-success btn-sm font-weight-bolder" role="button" role="button" target="_blank">Lihat Nilai </a>

                        <?php
                        }
                        else {
                        ?>
                            <!-- <a href='csPen.php?aksi=lihat&id_cari=<?php echo $id_research; ?>'>Lihat </a>  -->
                            <a href="progress_rep.php?aksi=ubah&id_cari=<?php echo $id_research; ?>" class="btn btn-info" role="button">ubah</a> 
                           
                        <?php
                        }
                        ?>            
                </td>
                <td>
                        <?php echo $hasil['status_name']; ?>
                    </td>
                </tr>
                <?php }?>
                </tbody>
            </table>

        </div>
        </div>
    </div>

</div>
<?php 
}
// End fungsiView
?>

<?php
// fungsiTambah
function tambah($conn){ 
    // $id=$_GET['id'];
    // echo $id;
?>
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="csPen.php">Upload Laporan Kemajuan</a></li>
    <!-- <li class="breadcrumb-item"><a href="#">Edit Proposal Penelitian</a></li> -->
  </ul>
</div>
<?php
$id_research=$_GET['id'];
// echo $id_research;
    $queri_add="SELECT * FROM research WHERE id_research=$id_research";
    $sql_add=mysqli_query($conn,$queri_add);
    $hasil_add=mysqli_fetch_assoc($sql_add);
?>

<div class="container">
<div class="card">
  <div class="card-header text-center">Proposal Penelitian</div>
  <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="panel-body">
                <div class="form-group">
                    <label for="judul" class="form-control-label">Judul Proposal Penelitian:</label>
                    
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $hasil_add['judul']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="nama_ketua" class="form-control-label">Nama Ketua:</label>
                    <input type="text" class="form-control" id="nama_ketua" value="<?php echo $_SESSION['nama_login']; ?>" name="nama_ketua" disabled>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-warning p-2"><h6>Upload Laporan Kemajuan Penelitian</h6>
                        Petunjuk upload file:
                        <ul>
                            <li>File berisi Laporan Kemajuan penelitian, dilengkapi halaman pengesahan oleh Dekan dan Ketua LPPM Unpatti</li>
                            <li>hanya menerima type file pdf</li>
                            <li>besar file pdf <= 3 MB</li>
                            <li>nama file tidak lebih dari 30 karakter</li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="file_lap_maju" class="form-control-label">Laporan Kemajuan Penelitian:</label>
                            <input type="file" class="form-control" id="file_lap_maju" accept=".pdf" placeholder="" name="file_lap_maju" required>
                        </div>
                      
                    </div>
                </div> 

                <div class="form-check">
                    <label for="chkme" class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="chkme" required>
                        Dengan ini, saya menyatakan bahwa data-data yang diberikan adalah benar. Jika saya melakukan kebohongan yang mengakibatkan kerugian bagi institusi maupun negara, maka saya siap bertanggung jawab dan menanggung segala akibat dari perbuatan saya.
                    </label>
                </div>
                <hr>  
                <div class="panel-footer mt-5 text-center">
                    <button type="submit" name='simpan' class="btn btn-success  mr-5">Simpan</button>
                    <a href="csPen.php" class="btn btn-danger">Batal</a>
                 </div>
            </div>
        </form>
  </div>
</div>
</div>

<?php
include '../link.php';

if(isset($_POST['simpan'])){
     $file_lap_maju=$_FILES['file_lap_maju']['name'];
     $tmp=$_FILES['file_lap_maju']['tmp_name'];
     $unik=$_SESSION['nidn_login'];
     $file_lap_maju_name = $unik.$file_lap_maju ;
     $path='files/penelitian/'.$file_lap_maju_name;

     if(move_uploaded_file($tmp, $path))
    {
        $query_lap="UPDATE research SET file_lap_maju='$file_lap_maju_name' WHERE id_research=$id_research";
        $sql_lap=mysqli_query($conn,$query_lap);
        if($sql_lap){
            echo "<script> alert ('Laporan Kemajuan telah diterima. Silahkan menunggu hasil verifikasi '); window.location='csPen.php'; </script>" ;
        }else{
            echo "<script> alert ('Terjadi kesalahan penyimpanan data '); window.location='propen.php'; </script>" ;
        }

    }
}
?>
<?php
}
// end fungsiTambah
?>



<?php
// fungsiubah
function ubah($conn){ 
    echo "ubah";
?>


<?php
}
// End Fungsi Ubah
?>


<!-- scriptValidasiFileSize -->
<script type="text/javascript">
var uploadField = document.getElementById("file_lap_maju");
uploadField.onchange = function() {
    if(this.files[0].size > 3000000){ // ini untuk ukuran 500KB, 1000000 untuk 1 MB.
       alert("Maaf. File Terlalu Besar ! Maksimal Upload 3 MB");
       this.value = "";
    };
};
</script> 

<?php
include '../footer.php';
?>
