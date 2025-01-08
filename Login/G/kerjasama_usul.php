<?php
    include 'menu.php';
    include '../link.php';
    $currentYear = date('Y');
?>
 
<!-- Main content starts -->
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Pengajuan Proposal</a></li>
    <li class="breadcrumb-item"><a href="kerjasama_usul.php">Kerjasama</a></li>
  </ul>
</div>

<!-- Main content starts -->
<div class="container">
<div class="card">
  <div class="card-header font-weight-bold text-center text-primary">Proposal Kerjasama NEW</div>
  <div class="card-body">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="panel-body">
            <div class="form-group">
                <label for="tahun_pengajuan" class="form-control-label">Tahun Pengajuan:</label>
                <input type="number" class="form-control" id="tahun_pengajuan" name="tahun_pengajuan" value='<?php echo $currentYear ?>' disabled>
            </div>
            <div class="form-group">
                <label for="judul" class="form-control-label">Judul Kerjasama:</label>
                <input type="text" class="form-control" id="judul" value="" name="judul" required/>
            </div>

            <?php
            $nidn_cari= $_SESSION['nidn_login'];
                $query_reg="SELECT *, mstr_fakultas.fakultas_name, mstr_prodi.prodi
                FROM reg 
                INNER JOIN mstr_fakultas ON mstr_fakultas.id_fakultas=reg.fakultas
                INNER JOIN mstr_prodi ON mstr_prodi.id_prodi=reg.prodi
                WHERE nidn= $nidn_cari";

                $sql_reg=mysqli_query($conn,$query_reg);
                $res_reg=mysqli_fetch_assoc($sql_reg);
            ?>

            <div class="form-group">
                <label for="nama_ketua" class="form-control-label">Nama Ketua:</label>
                <input type="text" class="form-control" id="nama_ketua" value="<?php echo $_SESSION['nama_login']; ?>" name="nama_ketua" disabled>
            </div>

            <div class="form-group">
                <label for="nip_ketua" class="form-control-label">NIP Ketua:</label>
                <input type="text" class="form-control" id="nip_ketua" value="<?php echo $_SESSION['nip_login']; ?>" name="nip_ketua" disabled>
            </div>                       

        <!-- add new member as Responsible preson -->
                <div class="form-group">
                    <label for="accordion" class="form-control-label">Tambahkan Identitas Penanggung Jawab dan Anggota </label>

                <div id="accordion">
                    <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                        Tambahkan Penanggung Jawab
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_pj" class="form-control-label">Nama Penanggung Jawab</label>
                                <input type="text" class="form-control" id="nama_pj" placeholder="" name="nama_pj" required>
                            </div>

                            <div class="form-group">
                                <label for="nip_pj" class="form-control-label">NIP</label>
                                <input type="text" class="form-control" id="nip_pj" placeholder="" name="nip_pj" required>
                            </div>

                            <div class="form-group">
                                <label for="golongan_pj" class="form-control-label">Pangkat / Golongan</label>
                                <select name="golongan_pj" id='golongan_pj' class="form-control" required >
                                <option value=''>-- Pilih Pangkat / Golongan --</option>
                                <option> Penata Muda TK.I / III.b </option>
                                <option> Penata/ III.c </option>
                                <option> Penata TK.I / III.d </option>
                                <option> Pembina/ IV.a </option>
                                <option> Pembina TK.I/ IV.b </option>
                                <option> Pembina Utama Muda/ IV.c </option>
                                <option> Pembina Utama Madya/ IV.d </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jafung_pj" class="form-control-label">Jabatan Fungsional</label>
                                <select name="jafung_pj" id='jafung_pj' class="form-control" required >
                                <option value=''>-- Pilih Jabatan Fungsional --</option>
                                <option> Tenaga Pengajar </option>
                                <option> Asisten Ahli</option>
                                <option> Lektor </option>
                                <option> Lektor Kepala</option>
                                <option> Guru Besar</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="prodi_pj" class="form-control-label">Program Studi</label>
                                <select name="prodi_pj" class="form-control" id='prodi_pj' required>
                                <option value=''> --Pilih Program Studi-- </option>
                                <?php 
                                    $queryProdi="SELECT * From mstr_prodi";
                                    $sqlProdi= mysqli_query($conn,$queryProdi);
                                    while ($hasilProdi = mysqli_fetch_array($sqlProdi))
                                    {
                                    echo "<option value='".$hasilProdi['id_prodi']."' >" .$hasilProdi['prodi']. "</option>";
                                    }
                                ?>
                            </select> 
                            </div>

                            <div class="form-group">
                                <label for="fakultas_pj" class="form-control-label">Fakultas</label>
                                <select name="fakultas_pj" class="form-control" id='fakultas_pj' required>
                                <option value=''> --Pilih Fakultas-- </option>
                                <?php 
                                    $queryFak="SELECT * From mstr_fakultas";
                                    $sqlFak= mysqli_query($conn,$queryFak);
                                    while ($hasilFak = mysqli_fetch_array($sqlFak))
                                    {
                                    echo "<option value='".$hasilFak['id_fakultas']."' >" .$hasilFak['fakultas_name']. "</option>";
                                    }
                                ?>
                            </select> 
                            </div>

                            <div class="form-group">
                                <label for="hp_pj" class="form-control-label">Nomor Handphone</label>
                                <input type="text" class="form-control" id="hp_pj" placeholder="" name="hp_pj">
                            </div>

                            <div class="form-group">
                                <label for="email_pj" class="form-control-label">e-Mail</label>
                                <input type="email" class="form-control" id="email_pj" placeholder="" name="email_pj">
                            </div>
                        </div>
                    </div>
                    </div>

                <!-- tambahkan anggota -->
                    <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                        Tambahkan Anggota
                    </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">

                        <div class="form-group">     
                        <label for="nama_anggota" class="form-control-label">Nama Anggota</label>
                             <input type="text" class="form-control" id="nama_anggota" placeholder="" name="nama_anggota" required>
                        </div>

                             <div class="form-group">
                             <label for="nip_anggota" class="form-control-label">NIP Anggota</label>
                                <input type="text" class="form-control" id="nip_anggota" placeholder="" name="nip_anggota" required>
                             </div>

                            <div class="form-group">
                            <label for="golongan_anggota" class="form-control-label">Pangkat/ golongan</label>
                            <select name="golongan_anggota" id='golongan_anggota' class="form-control" required >
                                <option value=''>-- Pilih Pangkat / Golongan --</option>
                                <option> Penata Muda TK.I / III.b </option>
                                <option> Penata/ III.c </option>
                                <option> Penata TK.I / III.d </option>
                                <option> Pembina/ IV.a </option>
                                <option> Pembina TK.I/ IV.b </option>
                                <option> Pembina Utama Muda/ IV.c </option>
                                <option> Pembina Utama Madya/ IV.d </option>
                                </select>
                            </div>

                             <div class="form-group">
                             <label for="jafung_anggota" class="form-control-label">Jabatan fungsional</label>
                             <select name="jafung_anggota" id='jafung_anggota' class="form-control" required >
                                <option value=''>-- Pilih Jabatan Fungsional --</option>
                                <option> Tenaga Pengajar </option>
                                <option> Asisten Ahli</option>
                                <option> Lektor </option>
                                <option> Lektor Kepala</option>
                                <option> Guru Besar</option>
                                </select>
                            </div>


                            <div class="form-group">
                            <label for="prodi_anggota" class="form-control-label">Program Studi</label>
                            <select name="prodi_anggota" class="form-control" id='prodi_anggota' required>
                                <option value=''> --Pilih Program Studi-- </option>
                                <?php 
                                    $queryProdi="SELECT * From mstr_prodi";
                                    $sqlProdi= mysqli_query($conn,$queryProdi);
                                    while ($hasilProdi = mysqli_fetch_array($sqlProdi))
                                    {
                                    echo "<option value='".$hasilProdi['id_prodi']."' >" .$hasilProdi['prodi']. "</option>";
                                    }
                                ?>
                            </select> 
                            </div>


                            <div class="form-group">
                             <label for="fakultas_anggota" class="form-control-label">Fakultas</label>
                             <select name="fakultas_anggota" class="form-control" id='fakultas_anggota' required>
                                <option value=''> --Pilih Fakultas-- </option>
                                <?php 
                                    $queryFak="SELECT * From mstr_fakultas";
                                    $sqlFak= mysqli_query($conn,$queryFak);
                                    while ($hasilFak = mysqli_fetch_array($sqlFak))
                                    {
                                    echo "<option value='".$hasilFak['id_fakultas']."' >" .$hasilFak['fakultas_name']. "</option>";
                                    }
                                ?>
                            </select> 
                            </div>

                            <div class="form-group">
                            <label for="hp_anggota" class="form-control-label">Nomor Handphone Studi</label>
                             <input type="text" class="form-control" id="hp_anggota" placeholder="" name="hp_anggota">
                             </div>

                             <div class="form-group">
                             <label for="email_anggota" class="form-control-label">e-Mail</label>
                            <input type="text" class="form-control" id="email_anggota" placeholder="" name="email_anggota">
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-warning p-2"><h6>Upload File Pendukung Kerjasama</h6>
                        Petunjuk upload file:
                        <ul>
                            <li>hanya menerima type file pdf</li>
                            <li>besar file pdf <= 3 MB</li>
                            <li>nama file tidak lebih dari 30 karakter</li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="file_permohonan" class="form-control-label">Surat Permohonan Kerjasama:</label>
                            <input type="file" class="form-control" id="file_permohonan" accept=".pdf" placeholder="" name="file_permohonan" >
                        </div>

                         <!-- <div class="form-group">
                            <label for="file_pks" class="form-control-label">Perjanjian Kerjasama (PKS):</label>
                            <input type="file" class="form-control" id="file_pks" accept=".pdf" placeholder="" name="file_pks" >
                        </div>  -->

                         <!-- <div class="form-group">
                            <label for="file_kontrak" class="form-control-label">Kontrak :</label>
                            <input type="file" class="form-control" id="file_kontrak" accept=".pdf" placeholder="" name="file_kontrak" >
                        </div> -->
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
                    <a href="kerjasama_usul.php" class="btn btn-danger">Batal</a>
                 </div>
    </form>
  </div>
</div>
</div>

<!-- scriptValidasiFileSize -->
<script type="text/javascript">
var uploadField = document.getElementById("file_kontrak");
uploadField.onchange = function() {
    if(this.files[0].size > 3000000){ // ini untuk ukuran 500KB, 1000000 untuk 1 MB.
       alert("Maaf. File Terlalu Besar ! Maksimal Upload 3 MB");
       this.value = "";
    };
};
</script> 

<script type="text/javascript">
var uploadField = document.getElementById("file_pks");
uploadField.onchange = function() {
    if(this.files[0].size > 3000000){ // ini untuk ukuran 500KB, 1000000 untuk 1 MB.
       alert("Maaf. File Terlalu Besar ! Maksimal Upload 3 MB");
       this.value = "";
    };
};
</script> 

<script type="text/javascript">
var uploadField = document.getElementById("file_permohonan");
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
      $judul=$_POST['judul'];
      $nama_ketua=$_SESSION['nama_login'];
      $nip_ketua=$_SESSION['nip_login'];

      $nama_pj=$_POST['nama_pj'];
      $nip_pj=$_POST['nip_pj'];
      $golongan_pj=$_POST['golongan_pj'];
      $jafung_pj=$_POST['jafung_pj'];
      $prodi_pj=$_POST['prodi_pj'];
      $fakultas_pj=$_POST['fakultas_pj'];
      $hp_pj=$_POST['hp_pj'];
      $email_pj=$_POST['email_pj'];
      $nama_anggota=$_POST['nama_anggota'];
      $nip_anggota=$_POST['nip_anggota'];
      $golongan_anggota=$_POST['golongan_anggota'];
      $jafung_anggota=$_POST['jafung_anggota'];
      $prodi_anggota=$_POST['prodi_anggota'];
      $fakultas_anggota=$_POST['fakultas_anggota'];
      $hp_anggota=$_POST['hp_anggota'];
      $email_anggota=$_POST['email_anggota'];

    $file_permohonan=$_FILES['file_permohonan']['name'];
    $tmp=$_FILES['file_permohonan']['tmp_name'];
    // $unik=$_SESSION['nidn_login'];
    // $file_permohonan_name = $unik.$file_permohonan ;
    // $path='files/kerjasama/'.$file_permohonan_name;
    $path='files/kerjasama/'.$file_permohonan;
    move_uploaded_file($tmp, $path);
   
    $query_ks = "INSERT INTO kerjasama (tahun_pengajuan, judul, nama_ketua, nip_ketua, nama_pj, nip_pj, golongan_pj, jafung_pj, prodi_pj, fakultas_pj, hp_pj, email_pj, nama_anggota, nip_anggota, golongan_anggota, jafung_anggota, prodi_anggota, fakultas_anggota, hp_anggota, email_anggota, file_permohonan) VALUES ('$currentYear','$judul','$nama_ketua','$nip_ketua','$nama_pj','$nip_pj','$golongan_pj','$jafung_pj','$prodi_pj','$fakultas_pj','$hp_pj','$email_pj','$nama_anggota','$nip_anggota','$golongan_anggota','$jafung_anggota','$prodi_anggota','$fakultas_anggota','$hp_anggota','$email_anggota','$file_permohonan')";     

    $sql_ks=mysqli_query($conn,$query_ks);

    if($sql_ks){
        echo "<script> alert ('Pengajuan Proposal Kerjasama berhasil disimpan. Kami akan segera memproses Pengajuan Anda'); window.location='kerjasama_status.php'; </script>" ;
    }
    else{
        echo "<script> alert ('Terjadi kesalahan penyimpanan data '); window.location='kerjasama_status.php'; </script>" ;
        echo "Error inserting data: " . mysqli_error($conn);
    }
}
    // else {
    //     echo "<script> alert ('tidak dapat menyimpan file proposal '); window.location='kerjasama_status.php'; </script>" ;
    // }
// }
?>


<?php
  //   echo $currentYear. "<br>";
    //   echo $judul. "<br>";
    //   echo $nama_ketua. "<br>";
    //   echo $nip_ketua. "<br>";  
    //   echo $nama_pj. "<br>";    
    //   echo $nip_pj. "<br>"; 
    //   echo $golongan_pj. "<br>";
    //   echo $jafung_pj. "<br>";
    //   echo $prodi_pj. "<br>";   
    //   echo  $fakultas_pj. "<br>";   
    //   echo $hp_pj. "<br>";
    //   echo $email_pj. "<br>";
    //   echo $nama_anggota. "<br>";
    //   echo $nip_anggota. "<br>";
    //   echo $golongan_anggota. "<br>";
    //   echo $jafung_anggota. "<br>";
    //   echo $prodi_anggota. "<br>";
    //   echo $fakultas_anggota. "<br>";
    //   echo  $hp_anggota. "<br>";
    //   echo  $email_anggota. "<br>";
    // echo $file_permohonan_name. "<br>";

    // $query_ks = "INSERT INTO kerjasama(tahun_pengajuan, judul, nama_ketua, nip_ketua, nama_pj, nip_pj, golongan_pj, jafung_pj, prodi_pj, fakultas_pj, hp_pj, email_pj, nama_anggota, nip_anggota, golongan_anggota, jafung_anggota, prodi_anggota, fakultas_anggota, hp_anggota, email_anggota, file_permohonan) VALUES ('2024','lplpl','Dosen Baru','123456','wewew','3232','Pembina/IV.a','Lektor','3','5','121','adas@gmail.com','frfrfrf','213','Penata/ III.c','Lektor','9','2','3232','sd@gmail.com','23456Ubuntu Server CLI cheat sheet 2024 v6.pdf')"; 
?>
