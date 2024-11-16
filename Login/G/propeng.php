<?php
// surat akti kuliah
    include 'menu.php';
    include '../link.php';
?>
 
<!-- Main content starts -->
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Pengajuan Proposal</a></li>
    <li class="breadcrumb-item"><a href="propen.php">Pengabdian Masyarakat</a></li>
  </ul>
</div>

<div class="container">
<div class="card">
  <div class="card-header text-center">Proposal Pengabdian</div>
  <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="panel-body">
                <div class="form-group">
                    <label for="sinta_id_ketua" class="form-control-label">Sinta_ID Ketua:</label>
                    <input type="number" class="form-control" id="sinta_id_ketua" name="sinta_id_ketua" value='<?php echo $_SESSION['sinta_id_login']; ?>' disabled>
                </div>
                <div class="form-group">
                    <label for="nama_ketua" class="form-control-label">Nama Ketua:</label>
                    <input type="text" class="form-control" id="nama_ketua" value="<?php echo $_SESSION['nama_login']; ?>" name="nama_ketua" disabled>
                </div>

                <div class="form-group">
                    <label for="nidn_ketua" class="form-control-label">NIDN Ketua:</label>
                    <input type="text" class="form-control" id="nidn_ketua" value="<?php echo $_SESSION['nidn_login']; ?>" name="nidn_ketua" disabled>
                </div>

                <div class="form-group">
                    <label for="judul" class="form-control-label">Judul Pengabdian </label>
                    <input type="text" class="form-control" id="judul" placeholder="" name="judul" required>
                </div>

                <div class="form-group">
                    <label for="tahun_pertama_usulan" class="form-control-label">Tahun pertama usulan</label>
                    <input type="number" class="form-control" id="tahun_pertama_usulan" placeholder="" name="tahun_pertama_usulan" value="<?php
                    date_default_timezone_set('Asia/Jayapura');
                    $now = date("Y-m-d");
                    $thn=date('Y',strtotime($now));
                        echo $thn
                    ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="tahun_usulan_kegiatan" class="form-control-label">Tahun usulan kegiatan</label>
                    <input type="number" class="form-control" id="tahun_usulan_kegiatan" placeholder="" name="tahun_usulan_kegiatan" value="<?php
                    date_default_timezone_set('Asia/Jayapura');
                    $now = date("Y-m-d");
                    $thn=date('Y',strtotime($now));
                        echo $thn
                    ?>" readonly> 
                </div>

                <div class="form-group">
                    <label for="thn_pelaksanaan_kegiatan " class="form-control-label">Tahun Pelaksanaan Kegiatan </label>
                    <input type="number" class="form-control" id="thn_pelaksanaan_kegiatan" placeholder="" name="thn_pelaksanaan_kegiatan" value="<?php
                    date_default_timezone_set('Asia/Jayapura');
                    $now = date("Y-m-d");
                    $thn=date('Y',strtotime($now));
                        echo $thn
                    ?>" readonly> 
                </div>

                <div class="form-group">
                    <label for="lama_kegiatan" class="form-control-label">Lama Kegiatan (tahun)</label>
                    <select name="lama_kegiatan" id='lama_kegiatan' class="form-control" required >
                        <option value=''>-- Pilih lama tahun --</option>
                        <option> 1 </option>
                        <option> 2 </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dana_disetujui" class="form-control-label">Dana Disetujui (Rp.)</label>
                    <input type="text" class="form-control" id="dana_disetujui" placeholder="" name="dana_disetujui" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                </div>

                <div class="form-group">
                    <label for="nama_member1" class="form-control-label">Nama Anggota Ke-1</label>
                    <input type="text" class="form-control" id="nama_member1" placeholder="" name="nama_member1">
                </div>

                <div class="form-group">
                    <label for="nidn_member1" class="form-control-label">NIDN Anggota Ke-1</label>
                    <input type="text" class="form-control" id="nidn_member1" placeholder="" name="nidn_member1">
                </div>

                <div class="form-group">
                    <label for="sinta_id_member1" class="form-control-label">Sinta_ID Anggota Ke-1</label>
                    <input type="text" class="form-control" id="sinta_id_member1" placeholder="" name="sinta_id_member1">
                </div>

                <div class="form-group">
                    <label for="nama_member2" class="form-control-label">Nama Anggota Ke-2</label>
                    <input type="text" class="form-control" id="nama_member2" placeholder="" name="nama_member2">
                </div>

                <div class="form-group">
                    <label for="nidn_member2" class="form-control-label">NIDN Anggota Ke-2</label>
                    <input type="text" class="form-control" id="nidn_member2" placeholder="" name="nidn_member2">
                </div>

                <div class="form-group">
                    <label for="sinta_id_member2" class="form-control-label">Sinta_ID Anggota Ke-2</label>
                    <input type="text" class="form-control" id="sinta_id_member2" placeholder="" name="sinta_id_member2">
                </div>

                <div class="form-group">
                    <label for="nama_member3" class="form-control-label">Nama Anggota Ke-3</label>
                    <input type="text" class="form-control" id="nama_member3" placeholder="" name="nama_member3">
                </div>

                <div class="form-group">
                    <label for="nidn_member3" class="form-control-label">NIDN Anggota Ke-3</label>
                    <input type="text" class="form-control" id="nidn_member3" placeholder="" name="nidn_member3">
                </div>

                <div class="form-group">
                    <label for="sinta_id_member3" class="form-control-label">Sinta_ID Anggota Ke-3</label>
                    <input type="text" class="form-control" id="sinta_id_member3" placeholder="" name="sinta_id_member3">
                </div>

                <div class="form-group">
                    <label for="nama_member4" class="form-control-label">Nama Anggota Ke-4</label>
                    <input type="text" class="form-control" id="nama_member4" placeholder="" name="nama_member4">
                </div>

                <div class="form-group">
                    <label for="nidn_member4" class="form-control-label">NIDN Anggota Ke-4</label>
                    <input type="text" class="form-control" id="nidn_member4" placeholder="" name="nidn_member4">
                </div>

                <div class="form-group">
                    <label for="sinta_id_member4" class="form-control-label">Sinta_ID Anggota Ke-4</label>
                    <input type="text" class="form-control" id="sinta_id_member4" placeholder="" name="sinta_id_member4">
                </div>

                <div class="form-group">
                    <label for="nama_member5" class="form-control-label">Nama Anggota Ke-5</label>
                    <input type="text" class="form-control" id="nama_member5" placeholder="" name="nama_member5">
                </div>

                <div class="form-group">
                    <label for="nidn_member5" class="form-control-label">NIDN Anggota Ke-5</label>
                    <input type="text" class="form-control" id="nidn_member5" placeholder="" name="nidn_member5">
                </div>

                <div class="form-group">
                    <label for="sinta_id_member5" class="form-control-label">Sinta_ID Anggota Ke-5</label>
                    <input type="text" class="form-control" id="sinta_id_member5" placeholder="" name="sinta_id_member5">
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-warning p-2"><h6>Upload Proposal Pengabdian</h6>
                        Petunjuk upload file:
                        <ul>
                            <li>hanya menerima type file pdf</li>
                            <li>besar file pdf <= 3 MB</li>
                            <li>nama file tidak lebih dari 30 karakter</li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="filepengabdian" class="form-control-label">Proposal Pengabdian:</label>
                            <input type="file" class="form-control" id="filepengabdian" accept=".pdf" placeholder="" name="filepengabdian" required>
                        </div>
                      
                    </div>
                </div> 

                <div class="form-check">
                    <label for="chkme" class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="chkme" required>
                        Dengan ini, saya menyatakan bahwa data-data yang diberikan adalah benar. Jika saya melakukan kebohongan yang mengakibatkan kerugian bagi institusi maupun negara, maka saya siap bertanggung jawab dan menanggung segala akibat dari perbuatan saya.
                    </label>
                </div>
            </div>  
            <hr>  
                <div class="panel-footer mt-5 text-center">
                    <button type="submit" name='simpan' class="btn btn-success  mr-5">Simpan</button>
                    <a href="propeng.php" class="btn btn-danger">Batal</a>
                 </div>
        </form>
    </div>
</div>
</div>

<!-- scriptValidasiFileSize -->
<script type="text/javascript">
var uploadField = document.getElementById("filepengabdian");
uploadField.onchange = function() {
    if(this.files[0].size > 3000000){ // ini untuk ukuran 500KB, 1000000 untuk 1 MB.
       alert("Maaf. File Terlalu Besar ! Maksimal Upload 3 MB");
       this.value = "";
    };
};
</script> 

<?php include '../footer.php'; ?>

<?php
include '../link.php';

if(isset($_POST['simpan'])){
    $sinta_id_ketua=$_SESSION['sinta_id_login'];
    $nama_ketua=$_SESSION['nama_login'];
    $nidn_ketua=$_SESSION['nidn_login'];

    $judul=$_POST['judul'];
    $tahun_pertama_usulan=$_POST['tahun_pertama_usulan'];
    $tahun_usulan_kegiatan=$_POST['tahun_usulan_kegiatan'];
    $thn_pelaksanaan_kegiatan=$_POST['thn_pelaksanaan_kegiatan'];
    $lama_kegiatan=$_POST['lama_kegiatan'];
    $dana_disetujui=$_POST['dana_disetujui'];

    $nama_member1=$_POST['nama_member1'];
    $nidn_member1=$_POST['nidn_member1'];
    $sinta_id_member1=$_POST['sinta_id_member1'];

    $nama_member2=$_POST['nama_member2'];
    $nidn_member2=$_POST['nidn_member2'];
    $sinta_id_member2=$_POST['sinta_id_member2'];

    $nama_member3=$_POST['nama_member3'];
    $nidn_member3=$_POST['nidn_member3'];
    $sinta_id_member3=$_POST['sinta_id_member3'];

    $nama_member4=$_POST['nama_member4'];
    $nidn_member4=$_POST['nidn_member4'];
    $sinta_id_member4=$_POST['sinta_id_member4'];

    $nama_member5=$_POST['nama_member5'];
    $nidn_member5=$_POST['nidn_member5'];
    $sinta_id_member5=$_POST['sinta_id_member5'];

     
    $filepengabdian=$_FILES['filepengabdian']['name'];
    $tmp=$_FILES['filepengabdian']['tmp_name'];
    $unik=$_SESSION['nidn_login'];
    $filepengabdian_name = $unik.$filepengabdian ;
    $path='files/pengabdian/'.$filepengabdian_name;

 
    if(move_uploaded_file($tmp, $path))
    {
        $query = "INSERT INTO services(sinta_id_ketua, nama_ketua, nidn_ketua,judul,thn_pertama_usulan, thn_usulan_kegiatan, thn_pelaksanaan_kegiatan, lama_kegiatan,dana_disetujui,sinta_id_member1, nidn_member1, nama_member1, sinta_id_member2, nidn_member2, nama_member2, sinta_id_member3, nidn_member3, nama_member3, sinta_id_member4, nidn_member4, nama_member4, sinta_id_member5, nidn_member5, nama_member5, file_pengabdian) VALUES ('$sinta_id_ketua','$nama_ketua',' $nidn_ketua','$judul','$tahun_pertama_usulan','$tahun_usulan_kegiatan','$thn_pelaksanaan_kegiatan','$lama_kegiatan','$dana_disetujui','$nama_member1','$nidn_member1','$sinta_id_member1','$nama_member2','$nidn_member2','$sinta_id_member2','$nama_member3','$nidn_member3','$sinta_id_member3','$nama_member4','$nidn_member4','$sinta_id_member4','$nama_member5','$nidn_member5','$sinta_id_member5','$filepengabdian_name')";
      
        $sql=mysqli_query($conn,$query);

        if($sql){
            echo "<script> alert ('Pengajuan Proposal telah diterima. Silahkan menunggu hasil verifikasi '); window.location='csPeng.php'; </script>" ;
        }else{
            echo "<script> alert ('Terjadi kesalahan penyimpanan data '); window.location='propeng.php'; </script>" ;
        }
    }
    else {
        echo "<script> alert ('tidak dapat menyimpan file proposal '); window.location='propeng.php'; </script>" ;
    }
}
?>