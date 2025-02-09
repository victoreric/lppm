<?php
include 'menuKeuangan.php';
include '../link.php';
?>

<!-- Main content starts -->
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Upload Bukti Pencairan Dana</a></li>
    <!-- <li class="breadcrumb-item"><a href="#">Edit Proposal Penelitian</a></li> -->
  </ul>
</div>
<?php
$id_research=$_GET['id'];
// echo $id_research;
    $queri_cair="SELECT * FROM research WHERE id_research=$id_research";
    $sql_cair=mysqli_query($conn,$queri_cair);
    $hasil_cair=mysqli_fetch_assoc($sql_cair);
?>

<div class="container">
<div class="card">
  <div class="card-header text-center">Pencairan Dana Penelitian</div>
  <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="panel-body">
                <div class="form-group">
                    <label for="judul" class="form-control-label">Judul Proposal Penelitian:</label>
                    
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $hasil_cair['judul']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="nama_ketua" class="form-control-label">Nama Ketua:</label>
                    <input type="text" class="form-control" id="nama_ketua" value="<?php echo $hasil_cair['nama_ketua']; ?>" name="nama_ketua" disabled>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-warning p-2"><h6>Upload Bukti Pencairan Dana Penelitian</h6>
                        Petunjuk upload file:
                        <ul>
                            <li>File berisi bukti tranfer bank</li>
                            <li>hanya menerima type file pdf</li>
                            <li>besar file pdf <= 3 MB</li>
                            <li>nama file tidak lebih dari 30 karakter</li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="bukti_cair" class="form-control-label">Bukti Pencairan Dana Penelitian:</label>
                            <input type="file" class="form-control" id="bukti_cair" accept=".pdf" placeholder="" name="bukti_cair" required>
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
                    <a href="list_usulan_riset_R.php" class="btn btn-danger">Batal</a>
                 </div>
            </div>
        </form>
  </div>
</div>
</div>

<?php
include '../link.php';

if(isset($_POST['simpan'])){

    $dana_disetujui=$hasil_cair['dana_disetujui'];
    
     $bukti_cair=$_FILES['bukti_cair']['name'];
     $tmp=$_FILES['bukti_cair']['tmp_name'];
     $unik='DanaCair_';
     $file_bukti_cair= $unik.$bukti_cair ;
     $path='FILES_BUKTICAIR/penelitian/'.$file_bukti_cair;
   
    move_uploaded_file($tmp, $path);
    
        $query_cair="INSERT INTO dana_penelitian(id_research, dana_disetujui,bukti_cair,file_tanggungjawab) VALUES ('$id_research','$dana_disetujui','$file_bukti_cair','')";
        $sql_cair=mysqli_query($conn,$query_cair);

        if($sql_cair){
            echo "<script> alert ('Upload Bukti Pencairan telah berhasil dilakukan'); window.location='list_usulan_riset_R.php'; </script>" ;
        }else{
            echo "<script> alert ('Terjadi kesalahan penyimpanan data'); window.location='list_usulan_riset_R.php'; </script>" ;
        }
         // mengubah status menjadi pencairan dana
         $sql_status=mysqli_query($conn,"UPDATE research SET status=6 WHERE id_research=$id_research");
         // end mengubah status menjadi pencairan dana

    
}
?>




<?php
include '../footer.php';
?>