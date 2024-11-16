<?php
// rekomendasi beasiswa
    include 'menu.php';
    include '../link.php';
    // include '../assets/fungsi.php';
?>
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Surat Permohonan</a></li>
    <li class="breadcrumb-item"><a href="ktm.php">Rekomendasi Beasiswa</a></li>
  </ul>
</div>

<div class="container">
<div class="card">
  <div class="card-header text-center">Permohonan Surat Rekomendasi Beasiswa</div>
  <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="panel-body">
                <div class="form-group">
                    <label for="nim" class="form-control-label">NIM:</label>
                    <input type="number" class="form-control" id="nim" name="nim" value='<?php echo $_SESSION['nim_suket']; ?>' disabled>
                </div>
                <div class="form-group">
                    <label for="nama" class="form-control-label">Nama Mahasiswa:</label>
                    <input type="text" class="form-control" id="nama" value="<?php echo $_SESSION['nama_suket']; ?>" name="nama" disabled>
                </div>

                <div class="form-group">
                    <label for="prodi" class="form-control-label">Program Studi:</label>
                     <select name="prodi" id='prodi' class="form-control" disabled>
                        <?php      
                            $var=$_SESSION['prodi_suket'];
                            echo $var;
                            $queri="SELECT * FROM prodi WHERE id_prodi=$var";
                            $sql=mysqli_query($conn,$queri);
                            $res=mysqli_fetch_array($sql);
                            echo " <option value='".$res['id_prodi'].  "' selected>".$res['prodi']. "</option>";
                        ?>     
                    </select>
                </div>

                <div class="form-group">
                    <label for="semester" class="form-control-label">Semester:</label>
                    <select name="semester" class="form-control" id='semester' required>
                        <option value=''> --Pilih semester-- </option>
                        <option> I (Satu) </option>
                        <option> II (Dua) </option>
                        <option> III (Tiga) </option>
                        <option> IV (Empat) </option>
                        <option> V (Lima) </option>
                        <option> VI (Enam) </option>
                        <option> VII (Tujuh) </option>
                        <option> VIII (Delapan) </option>
                        <option> IX (Sembilan) </option>
                        <option> X (Sepuluh) </option>
                        <option> XI (Sebelas) </option>
                        <option> XII (Duabelas) </option>
                        <option> XIII (Tigabelas) </option>
                        <option> XIV (Empatbelas) </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="thnakd" class="form-control-label">Tahun Akademik:</label>
                    <input type="text" class="form-control" id="thnakd" name="thnakd"  value="<?php
                    date_default_timezone_set('Asia/Jayapura');
                    $now = date("Y-m-d");
                    $bulan= date('m', strtotime($now));
                    $thn=date('Y',strtotime($now));
                    if($bulan>='08'){
                        echo $thn. " - Ganjil";
                    }
                    elseif($bulan==01){
                        echo $thn-1; 
                        echo " - Ganjil";
                    }
                    else{
                        echo $thn-1;
                        echo " - Genap";
                    }?>" readonly> 
                </div>

                <div class="form-group">
                    <label for="ttl" class="form-control-label">Tempat, Tanggal Lahir:</label>
                    <?php 
                        // $tglhr=$_SESSION['tglahir_suket'];
                        $tglhr=tanggal_indo($_SESSION['tglahir_suket']);
                     ?>
                    <input type="text" class="form-control" id="ttl" value="<?php echo $_SESSION['tmplahir_suket'].', '.$tglhr?>" name="ttl" disabled>
                </div>

                <div class="form-group">
                    <label for="ortu" class="form-control-label">Nama Orang Tua:</label>
                    <input type="text" class="form-control" id="ortu" placeholder="" name="ortu" required>
                </div>
                <div class="form-group">
                    <label for="pekerjaan" class="form-control-label">Pekerjaan:</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                </div>

                <div class="form-group">
                    <label for="alamat" class="form-control-label">Alamat Rumah:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <!-- <div class="form-group">
                    <label for="nip" class="form-control-label">NIP:</label>
                    <input type="number" class="form-control" id="nip" placeholder="NIP orang tua sesuai dengan SK yang dilampirkan" name="nip" min="1">
                    <small id="niphelp" class="form-text text-muted">Diisi jika Pekerjaan orang tua adalah Pegawai Negeri Sipil/ ABRI/ Polri</small>
                </div> -->
                <!-- <div class="form-group">
                    <label for="pangkat" class="form-control-label">Pangkat:</label>
                    <input type="text" class="form-control" id="pangkat" placeholder="Pangkat/ Golongan orang tua sesuai dengan SK yang dilampirkan" name="pangkat">
                    <small id="pangkathelp" class="form-text text-muted">Diisi jika Pekerjaan orang tua adalah Pegawai Negeri Sipil/ ABRI/ Polri</small>
                </div> -->

                <div class="form-group">
                    <label for="jenis" class="form-control-label">Jenis Surat Keterangan:</label>
                    <select name="jenis" id="jenis" class="form-control">
                        <?php
                        $jenisqueri="SELECT * FROM jenis_suket WHERE id_jenis='3'";
                        $sql=mysqli_query($conn,$jenisqueri);
                        $hasil3=mysqli_fetch_array($sql);
                        $id=$hasil3['id_jenis'];
                        $jenis=$hasil3['jenis'];
                        echo "<option value='".$id."' selected>".$jenis. "</option>";
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tujuan" class="form-control-label">Tujuan permohonan rekomendasi, untuk:</label>
                    <input type="text" class="form-control" id="tujuan" placeholder="Beasiswa Pertamina atau Beasiswa Kementerian atau yang lainnya" name="tujuan" required>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-warning p-2"><h6>Dokumen pelengkap</h6>
                        Petunjuk upload file:
                        <ul>
                            <li>hanya menerima type file pdf</li>
                            <li>besar file pdf <=500KB</li>
                            <li>nama file tidak lebih dari 20 karakter</li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="ukt" class="form-control-label">Fotocopy Pembayaran UKT:</label>
                            <input type="file" class="form-control" id="ukt" accept=".pdf" placeholder="" name="ukt" required>
                        </div>
                        <div class="form-group">
                            <label for="krs" class="form-control-label">Fotocopy KRS Semester terakhir:</label>
                            <input type="file" class="form-control" id="krs" accept=".pdf" placeholder="" name="krs" required>
                        </div>
                        <div class="form-group">
                            <label for="dns" class="form-control-label">Fotocopy DNS Semester terakhir:</label>
                            <input type="file" class="form-control" id="dns" accept=".pdf" placeholder="" name="dns" required>
                        </div>
                        <div class="form-group">
                            <label for="kk" class="form-control-label">Fotocopy Kartu Keluarga:</label>
                            <input type="file" class="form-control" id="kk" accept=".pdf"  placeholder="" name="kk" required>
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
                    <a href="cs.php" class="btn btn-danger">Batal</a>
                 </div>
        </form>
    </div>
</div>
</div>

<!-- scriptValidasiFileSize -->
<script type="text/javascript">
var uploadField = document.getElementById("ukt");
uploadField.onchange = function() {
    if(this.files[0].size > 500000){ // ini untuk ukuran 500KB, 1000000 untuk 1 MB.
       alert("Maaf. File Terlalu Besar ! Maksimal Upload 500 KB");
       this.value = "";
    };
};
</script> 

<script type="text/javascript">
var uploadField = document.getElementById("krs");
uploadField.onchange = function() {
    if(this.files[0].size > 500000){ // ini untuk ukuran 500KB, 1000000 untuk 1 MB.
       alert("Maaf. File Terlalu Besar ! Maksimal Upload 500 KB");
       this.value = "";
    };
};
</script> 

<script type="text/javascript">
var uploadField = document.getElementById("dns");
uploadField.onchange = function() {
    if(this.files[0].size > 500000){ // ini untuk ukuran 500KB, 1000000 untuk 1 MB.
       alert("Maaf. File Terlalu Besar ! Maksimal Upload 500 KB");
       this.value = "";
    };
};
</script> 

<script type="text/javascript">
var uploadField = document.getElementById("kk");
uploadField.onchange = function() {
    if(this.files[0].size > 500000){ // ini untuk ukuran 500KB, 1000000 untuk 1 MB.
       alert("Maaf. File Terlalu Besar ! Maksimal Upload 500 KB");
       this.value = "";
    };
};
</script> 

<?php include '../footer.php'; ?>

<?php
include '../link.php';

if(isset($_POST['simpan'])){
    $nim=$_SESSION['nim_suket'];
    $nama=$_SESSION['nama_suket'];
    $prodi=$_SESSION['prodi_suket'];
    $semester=$_POST['semester'];
    $thnakd=$_POST['thnakd'];
    $ortu=$_POST['ortu'];
    $pekerjaan=$_POST['pekerjaan'];
    $alamat=$_POST['alamat'];
    $jenis=$_POST['jenis'];
    $tujuan=$_POST['tujuan'];   

    $ukt=$_FILES['ukt']['name'];
    $tmp = $_FILES['ukt']['tmp_name'];
    // $nipfoto=substr($nip,0,10);
    $unik=$_SESSION['nim_suket'];
    $uktfile = $unik.$ukt ;
    $path = "../files/berkas_ak/".$uktfile;

    $krs=$_FILES['krs']['name'];
    $tmp1 = $_FILES['krs']['tmp_name'];
    $unik=$_SESSION['nim_suket'];
    $krsfile = $unik.$krs ;
    $path1 = "../files/berkas_ak/".$krsfile;

    $dns=$_FILES['dns']['name'];
    $tmp2 = $_FILES['dns']['tmp_name'];
    $unik=$_SESSION['nim'];
    $dnsfile = $unik.$dns ;
    $path2 = "../files/berkas_ak/".$dnsfile;

    $kk=$_FILES['kk']['name'];
    $tmp3 = $_FILES['kk']['tmp_name'];
    $unik=$_SESSION['nim_suket'];
    $kkfile = $unik.$kk ;
    $path3 = "../files/berkas_ak/".$kkfile;

    // $srtpangkat=$_FILES['srtpangkat']['name'];
    // $tmp4 = $_FILES['srtpangkat']['tmp_name'];
    // $unik=$_SESSION['nim_suket'];
    // $srtpangkatfile = $unik.$srtpangkat ;
    // $path4 = "../files/berkas_ak/".$srtpangkatfile;

    if(move_uploaded_file($tmp, $path))
    if(move_uploaded_file($tmp1, $path1))  
    if(move_uploaded_file($tmp2, $path2)) 
    if(move_uploaded_file($tmp3, $path3))
    // if(move_uploaded_file($tmp4, $path4))
    {
        $query="INSERT INTO surat (nim, nama, prodi, semester, thnakd,ortu, pekerjaan, nip, pangkat,alamat, jenis, tujuan, ukt, krs, dns, kk, skortu,ttd,cap) VALUES ('$nim','$nama','$prodi','$semester','$thnakd','$ortu','$pekerjaan','','','$alamat','$jenis','$tujuan','$uktfile','$krsfile','$dnsfile','$kkfile','','','')";
      
        $sql=mysqli_query($conn,$query);

        if($sql){
            echo "<script> alert ('Surat Permohonan berhasil disimpan. Kami akan segera memproses Permohonan Anda '); window.location='cs.php'; </script>" ;
        }else{
            echo "<script> alert ('Terjadi kesalahan penyimpanan data '); window.location='ak.php'; </script>" ;
        }
    }
}
?>