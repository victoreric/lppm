<?php  include 'menuA.php'; 
include '../link.php';
$id=$_GET['id'];
?>

<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="spak.php">Lihat Data</a></li>
    <li class="breadcrumb-item"><a href="spak.php">Surat Permohonan</a></li>
    <li class="breadcrumb-item"><a href="#">Edit Permohonan</a></li>
  </ul>
</div>


<div class="container">
<div class="card">
  <div class="card-header text-center bg-primary text-white">EDIT Permohonan Surat Keterangan</div>
  <div class="card-body">
  <?php                          
      $no=0;
      $query="SELECT surat.*, prodi.prodi, jenis_suket.*
      FROM surat 
      INNER JOIN prodi ON prodi.id_prodi=surat.prodi
      INNER JOIN jenis_suket ON jenis_suket.id_jenis=surat.jenis
      WHERE id_surat='$id'";
      $sql=mysqli_query($conn,$query);
      while ($hasil=mysqli_fetch_array($sql)){
    ?>
    <form method="POST" action="" enctype="multipart/form-data">

    <div class="panel-body">
        <div class="form-group">
            <label for="nim" class="form-control-label">NIM:</label>
            <input type="number" class="form-control" id="nim" name="nim" value='<?php echo $hasil['nim']; ?>' disabled>
        </div>
        <div class="form-group">
            <label for="nama" class="form-control-label">Nama Mahasiswa:</label>
            <input type="text" class="form-control" id="nama" value="<?php echo $hasil['nama']; ?>" name="nama" disabled>
        </div>
        <div class="form-group">
            <label for="prodi" class="form-control-label">Program Studi:</label>
            <input type="text" class="form-control" id="prodi" value="<?php echo $hasil['prodi']; ?>" name="prodi" disabled>
        </div>

        <div class="form-group">
            <label for="thnakd" class="form-control-label">Tahun Akademik edit:</label>
            <input type="text" class="form-control" id="thnakd" name="thnakd"  value="<?php echo $hasil['thnakd']; ?>" >
        </div>

        <!-- <div class="form-group">
            <label for="thnakd" class="form-control-label">Tahun Akademik:</label>
            <input type="text" class="form-control" id="thnakd" name="thnakd"  value="
            <?php
            // date_default_timezone_set('Asia/Jayapura');
            // $now = date("Y-m-d");
            // $bulan= date('m', strtotime($now));
            // $thn=date('Y',strtotime($now));
            // if($bulan>='08'){
            //     echo $thn. " - Ganjil";
            // }
            // elseif($bulan==01){
            //     echo $thn-1; 
            //     echo " - Ganjil";
            // }
            // else{
            //     echo $thn-1;
            //     echo " - Genap";
            // }?>" 
            readonly> 
        </div> -->

        <div class="form-group">
            <label for="semester" class="form-control-label">Semester:</label>
            <select name="semester" class="form-control" id='semester'>
            <option value=''> --Pilih semester-- </option>
            <?php
            if($hasil['semester']=="I (Satu)"){
                echo "<option selected> I (Satu) </option> "; 
            }
            if($hasil['semester']=="II (Dua)"){
                echo "<option selected> II (Dua) </option> "; 
            }
            if($hasil['semester']=="III (Tiga)"){
                echo "<option selected> III (Tiga) </option> "; 
            }
            if($hasil['semester']=="IV (Empat)"){
                echo "<option selected> IV (Empat) </option> "; 
            }

            if($hasil['semester']=="V (Lima)"){
                echo "<option selected> V (Lima) </option> "; 
            }
            if($hasil['semester']=="VI (Enam)"){
                echo "<option selected> VI (Enam) </option> "; 
            }
            if($hasil['semester']=="VII (Tujuh)"){
                 echo "<option selected> VII (Tujuh) </option> "; 
            }
            if($hasil['semester']=="VIII (Delapan)"){
                echo "<option selected> VIII(Delapan) </option> "; 
            }
            if($hasil['semester']=="IX (Sembilan)"){
                echo "<option selected> IX (Sembilan) </option> "; 
            }

            if($hasil['semester']=="X (Sepuluh)"){
                echo "<option selected> X (Sepuluh) </option> "; 
            }
            if($hasil['semester']=="XI (Sebelas)"){
                echo "<option selected> XI (Sebelas) </option> "; 
            }
            if($hasil['semester']=="XII (DuaBelas)"){
                echo "<option selected>XII (Dua Belas) </option> "; 
            }
            if($hasil['semester']=="XIII (TigaBelas)"){
                echo "<option selected> XIII (Tiga Belas) </option> "; 
            }
            if($hasil['semester']=="XIV (EmpatBelas)"){
                echo "<option selected> XIv (Empat Belas) </option> "; 
            }
            if($hasil['semester']=="XV (LimaBelas)"){
                echo "<option selected> XV (Lima Belas) </option> "; 
            } ?>
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
                <option> XV (Limabelas) </option>
            </select>
        </div>

        <div class="form-group">
            <label for="ortu" class="form-control-label">Nama Orang Tua:</label>
            <input type="text" class="form-control" id="ortu" placeholder="Nama orang tua sesuai dengan SK yang dilampirkan" name="ortu" value="<?php echo $hasil['ortu'] ?>">
        </div>

        <div class="form-group">
            <label for="alamat" class="form-control-label">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $hasil['alamat'] ?>">
        </div>

        <div class="form-group">
            <label for="pekerjaan" class="form-control-label">Pekerjaan:</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $hasil['pekerjaan'] ?>">
        </div>
        <div class="form-group">
            <label for="nip" class="form-control-label">NIP:</label>
            <input type="number" class="form-control" id="nip" placeholder="NIP orang tua sesuai dengan SK yang dilampirkan" name="nip" min="1" value="<?php echo $hasil['nip'] ?>"> 
            <small id="niphelp" class="form-text text-muted">Diisi jika Pekerjaan orang tua adalah Pegawai Negeri Sipil/ ABRI/ Polri</small>
        </div>

        <div class="form-group">
            <label for="pangkat" class="form-control-label">Pangkat:</label>
            <input type="text" class="form-control" id="pangkat" placeholder="Pangkat/ Golongan orang tua sesuai dengan SK yang dilampirkan" name="pangkat" value="<?php echo $hasil['pangkat'] ?>">
            <small id="pangkathelp" class="form-text text-muted">Diisi jika Pekerjaan orang tua adalah Pegawai Negeri Sipil/ ABRI/ Polri</small>
        </div>

        <div class="form-group">
            <label for="jenis" class="form-control-label">Jenis Surat Keterangan</label> <br>
            <input type="text" class="form-control" id="jenis"  name="jenis" value="<?php echo $hasil['jenis'] ?>" disabled>    
        </div>

        <div class="form-group">
            <label for="tujuan" class="form-control-label">Tujuan permohonan surat keterangan :</label>
            <input type="text" class="form-control" id="tujuan" placeholder="pengurusan BPJS atau tunjangan gaji orang tua atau tujuan lainnya" name="tujuan" value='<?php echo $hasil['tujuan'] ?>'>
        </div>

        <div class="form-group">
            <label for="ukt" class="form-control-label">Fotocopy Pembayaran UKT:</label>
            <a href="luk.php?f=<?php echo $hasil['ukt']; ?>" target='blank'><?php echo $hasil['ukt']?></a><br>
           
            <input type="checkbox" size="30px" name="ubahfileukt" value="true"> Centang jika ingin mengubah file<br>
            <input type="file" class="form-control" id="ukt" accept=".pdf" placeholder="" name="ukt">
        </div>

        <div class="form-group">
            <label for="krs" class="form-control-label">Fotocopy KRS</label>
            <a href="luk.php?f=<?php echo $hasil['krs']; ?>" target='blank'><?php echo $hasil['krs']?></a><br>
           
            <input type="checkbox" size="30px" name="ubahfilekrs" value="true"> Centang jika ingin mengubah file<br>
            <input type="file" class="form-control" id="krs" accept=".pdf" placeholder="" name="krs">
        </div>

        <div class="form-group">
            <label for="dns" class="form-control-label">Fotocopy DNS</label>
            <a href="luk.php?f=<?php echo $hasil['dns']; ?>" target='blank'><?php echo $hasil['dns']?></a><br>
           
            <input type="checkbox" size="30px" name="ubahfiledns" value="true"> Centang jika ingin mengubah file<br>
            <input type="file" class="form-control" id="dns" accept=".pdf" placeholder="" name="dns">
        </div>

        <div class="form-group">
            <label for="kk" class="form-control-label">Fotocopy Kartu Keluarga</label>
            <a href="luk.php?f=<?php echo $hasil['kk']; ?>" target='blank'><?php echo $hasil['kk']?></a><br>
           
            <input type="checkbox" size="30px" name="ubahfilekk" value="true"> Centang jika ingin mengubah file<br>
            <input type="file" class="form-control" id="kk" accept=".pdf" placeholder="" name="kk">
        </div>

        <div class="form-group">
            <label for="skortu" class="form-control-label">Fotocopy SK Pangkat Orang Tua </label>
            <a href="luk.php?f=<?php echo $hasil['skortu']; ?>" target='blank'><?php echo $hasil['skortu']?></a><br>
           
            <input type="checkbox" size="30px" name="ubahfileskortu" value="true"> Centang jika ingin mengubah file<br>
            <input type="file" class="form-control" id="srtpangkat" accept=".pdf" placeholder="" name="srtpangkat">
        </div>

        <div class="form-group">
            <label for="nosurat" class="form-control-label">Nomor Surat:</label>
            <input type="text" class="form-control" id="nosurat" name="nosurat" value="<?php echo $hasil['nomor_surat']?>">
        </div>

        <div class="form-group">
            <label for="ttd" class="form-control-label">Tanda Tangan Pejabat:</label>
            <input type="text" class="form-control" id="ttd" name="ttd" value="<?php echo $hasil['ttd']?>">
            <span>ketik : ttd.png untuk surat yang sudah diberi nomor atau kosongkan jika belum diberi nomor.</span>
        </div>

        <div class="form-group">
            <label for="cap" class="form-control-label">Cap Fakultas:</label>
            <input type="text" class="form-control" id="cap" name="cap" value="<?php echo $hasil['cap']?>">
            <span>ketik : cap.png untuk surat yang sudah diberi nomor atau kosongkan jika belum diberi nomor.</span>
        </div>
    </div>
    <hr>  
        <div class="panel-footer mt-5 text-center">
            <button type="submit" name='simpan' class="btn btn-success  mr-5">Simpan</button>

            <a href="spak_d.php?id=<?php echo $hasil['id_surat'];?>" class="btn btn-danger">Batal</a>
            </div>
    </form> 
    <?php
        }
    ?>
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

<script type="text/javascript">
var uploadField = document.getElementById("srtpangkat");
uploadField.onchange = function() {
    if(this.files[0].size > 500000){ // ini untuk ukuran 500KB, 1000000 untuk 1 MB.
       alert("Maaf. File Terlalu Besar ! Maksimal Upload 500 KB");
       this.value = "";
    };
};
</script> 



<?php include '../footer.php'; ?>

<!-- fungsi simpan -->
<?php 
// menampilkan nim didepan nama file
$cari="SELECT nim FROM surat WHERE id_surat='$id'";
$quecari=mysqli_query($conn,$cari);
$carinim=mysqli_fetch_assoc($quecari);

$nim=$carinim['nim'];
// end menampilkan nim didepan nama file

if(isset($_POST['simpan'])){
    $semester=$_POST['semester'];
    $ortu=$_POST['ortu'];
    $pekerjaan=$_POST['pekerjaan'];
    $alamat=$_POST['alamat'];
    $nip=$_POST['nip'];
    $pangkat=$_POST['pangkat'];
    $tujuan=$_POST['tujuan'];
    $thnakd=$_POST['thnakd'];

    $nosurat=$_POST['nosurat'];
    $cap=$_POST['cap'];
    $ttd=$_POST['ttd']; 

    if(isset($_POST['ubahfileukt'])){
        $ukt=$_FILES['ukt']['name'];
        $tmp = $_FILES['ukt']['tmp_name'];
        $uktfile = $nim.$ukt ;
        $path = "../files/berkas_ak/".$uktfile;

        move_uploaded_file($tmp,$path);
    
        $queriukt="UPDATE surat SET thnakd='$thnakd',semester='$semester', ortu='$ortu',pekerjaan='$pekerjaan',nip='$nip',pangkat='$pangkat', alamat='$alamat',tujuan='$tujuan',ttd='$ttd',cap='$cap',nomor_surat='$nosurat',ukt='$uktfile' WHERE id_surat='$id'";
        $sqlukt=mysqli_query($conn,$queriukt);
    }
    if(isset($_POST['ubahfilekrs'])){
        $krs=$_FILES['krs']['name'];
        $tmp1 = $_FILES['krs']['tmp_name'];
        $krsfile = $nim.$krs ;
        $path1 = "../files/berkas_ak/".$krsfile;

        move_uploaded_file($tmp1, $path1);

        $querikrs="UPDATE surat SET semester='$semester', thnakd='$thnakd', ortu='$ortu',pekerjaan='$pekerjaan',nip='$nip',pangkat='$pangkat', alamat='$alamat',tujuan='$tujuan',ttd='$ttd',cap='$cap',nomor_surat='$nosurat',krs='$krsfile' WHERE id_surat='$id'";
        $sqlkrs=mysqli_query($conn,$querikrs);

    }
    if(isset($_POST['ubahfiledns'])){
        $dns=$_FILES['dns']['name'];
        $tmp2 = $_FILES['dns']['tmp_name'];
        $dnsfile = $nim.$dns ;
        $path2 = "../files/berkas_ak/".$dnsfile;

        move_uploaded_file($tmp2, $path2);

        $queridns="UPDATE surat SET thnakd='$thnakd', semester='$semester', ortu='$ortu',pekerjaan='$pekerjaan',nip='$nip',pangkat='$pangkat', alamat='$alamat',tujuan='$tujuan',ttd='$ttd',cap='$cap',nomor_surat='$nosurat',dns='$dnsfile' WHERE id_surat='$id'";
        $sqldns=mysqli_query($conn,$queridns);
    }
    if(isset($_POST['ubahfilekk'])){
        $kk=$_FILES['kk']['name'];
        $tmp3 = $_FILES['kk']['tmp_name'];
        $kkfile = $nim.$kk ;
        $path3 = "../files/berkas_ak/".$kkfile;

        move_uploaded_file($tmp3, $path3);

        $querikk="UPDATE surat SET thnakd='$thnakd', semester='$semester', ortu='$ortu',pekerjaan='$pekerjaan',nip='$nip',pangkat='$pangkat', alamat='$alamat',tujuan='$tujuan',ttd='$ttd',cap='$cap',nomor_surat='$nosurat',kk='$kkfile' WHERE id_surat='$id'";
        $sqlkk=mysqli_query($conn,$querikk);
    }
    if(isset($_POST['ubahfileskortu'])){
        $srtpangkat=$_FILES['srtpangkat']['name'];
        $tmp4 = $_FILES['srtpangkat']['tmp_name'];
        $srtpangkatfile = $nim.$srtpangkat ;
        $path4 = "../files/berkas_ak/".$srtpangkatfile;

        move_uploaded_file($tmp4, $path4);

        $querikk="UPDATE surat SET thnakd='$thnakd', semester='$semester', ortu='$ortu',pekerjaan='$pekerjaan',nip='$nip',pangkat='$pangkat', alamat='$alamat', tujuan='$tujuan',ttd='$ttd',cap='$cap',nomor_surat='$nosurat',skortu='$srtpangkatfile' WHERE id_surat='$id'";
        $sqlkk=mysqli_query($conn,$querikk);
    }

    else{
    $queri="UPDATE surat SET thnakd='$thnakd', semester='$semester', ortu='$ortu',pekerjaan='$pekerjaan',nip='$nip',pangkat='$pangkat',alamat='$alamat',tujuan='$tujuan',ttd='$ttd',cap='$cap',nomor_surat='$nosurat' WHERE id_surat='$id'";

    $sql=mysqli_query($conn,$queri);
    }
    if($sql){    
        echo "<script> alert ('Data berhasil diubah');window.location='spak_d.php?id=$id';</script>"; 
      }
        else {
          echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database";
          echo "<br><a href='spak.php'>Kembali Ke Form</a>";
        } 
}
?>