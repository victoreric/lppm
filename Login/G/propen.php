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
    <li class="breadcrumb-item"><a href="propen.php">Penelitian</a></li>
  </ul>
</div>

<div class="container">
<div class="card">
  <div class="card-header text-center">Proposal Penelitian</div>
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
                    <label for="judul" class="form-control-label">Judul Penelitian</label>
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
                    <label for="bidang_fokus" class="form-control-label">Bidang Fokus</label>
                    <select name="bidang_fokus" id='bidang_fokus' class="form-control" required >
                        <option value=''>-- Pilih bidang fokus --</option>
                        <option>Kemandirian Pangan</option>
                        <option>Penciptaan Dan Pemanfaatan Energi Baru Dan Terbarukan </option>
                        <option>Pengembangan Teknologi Kesehatan Dan Obat </option>
                        <option>Pengembangan Teknologi Dan Manajemen Transportasi </option>
                        <option>Teknologi Informasi Dan Komunikasi </option>
                        <option>Pengembangan Teknologi Pertahanan Dan Keamanan</option>
                        <option>Material Maju </option>
                        <option>Kemaritiman </option>
                        <option>Teknologi Manajemen Penanggulangan Kebencanaan </option>
                        <option> Sosial Humaniora- Seni Budaya-Pendidikan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_skema" class="form-control-label">Skema</label>
                    <select name="nama_skema" id='nama_skema' class="form-control" required >
                        <option value=''>-- Pilih nama skema --</option>
                        <option>Penelitian Dasar Unggulan UNPATTI (PDUU)</option>
                        <option>Penelitian Terapan Unggulan UNPATTI (PTUU)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sub_skema" class="form-control-label">Sub Skema</label>
                    <select name="sub_skema" id='sub_skema' class="form-control" required >
                        <option value=''>-- Pilih sub skema --</option>
                        <option>Penelitian Mandiri (PM)</option>
                        <option>Penelitian Peningkatan Kapasitas Dosen Pemula (PKDP)</option>
                        <option>Penelitian Peningkatan Kapasitas Tenaga Kependidikan (PKTK)</option>
                        <option>Penelitian Unggulan Fakultas (PUF) </option>
                        <option>Penelitian Unggulan UNPATTI (PUU)</option>
                        <option>Penelitian Doktor Unggulan (PDU)</option>
                        <option>Penelitian Percepatan Guru Besar (PGB)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dana_usulan" class="form-control-label">Dana yang diusulkan (Rp.)</label>
                    <input type="text" class="form-control" id="dana_usulan" placeholder="" name="dana_usulan" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                </div>

                <div class="form-group">
                    <label for="target_tkt" class="form-control-label">Target Kesiapan Teknologi (TKT)</label>
                    <select name="target_tkt" id='target_tkt' class="form-control" required >
                        <option value=''>-- Pilih Target TKT --</option>
                        <option>TKT 1 - Prinsip dasar dari teknologi telah diteliti dan dilaporkan</option>
                        <option>TKT 2 - Formulasi Konsep teknologi dan aplikasinya</option>
                        <option>TKT 3 - Pembuktian konsep (proof-of-concept) fungsi dan/atau karakteristik penting secara analitis dan eksperimental</option>
                        <option>TKT 4 - Validasi komponen/subsistem dalam lingkungan laboratorium </option>
                        <option>TKT 5 - Validasi komponen/subsistem dalam lingkungan yang relevan</option>
                        <option>TKT 6 - Demonstrasi Model atau Prototipe Sistem/ Subsistem dalam lingkungan yang relevan</option>
                        <option>TKT 7 - Demonstrasi prototipe sistem dalam lingkungan/aplikasi sebenarnya</option>
                        <option>TKT 8 - Sistem telah lengkap dan memenuhi syarat (qualified) melalui pengujian dan demonstrasi dalam lingkungan/ aplikasi sebenarnya</option>
                        <option>TKT 9 - Sistem benar-benar teruji/terbukti melalui keberhasilan pengoperasian</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kategori_sumber_dana" class="form-control-label">Kategori Sumber Dana</label>
                    <select name="kategori_sumber_dana" id='kategori_sumber_dana' class="form-control" required >
                        <option value=''>-- Pilih sumber dana --</option>
                        <option>Luar Negeri</option>
                        <option>Pemerintah</option>
                        <option>Perusahaan/ Organisasi Swasta</option>
                        <option>Institusi Internal </option>
                        <option>Mandiri</option>
                    </select>
                </div>

                <!-- add new member as lecturer -->
                <div class="form-group">
                    <label for="accordion" class="form-control-label">Tambahkan Anggota </label>

                <div id="accordion">
                    <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                        Tambahkan nama-nama Dosen sebagai anggota
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <div class="card-body">
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
                        </div>
                    </div>
                    </div>

                    <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                        Tambahkan nama-nama Mahasiswa sebagai anggota
                    </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                             <label for="nama_mhs1" class="form-control-label">Nama Mahasiswa Ke-1</label>
                             <input type="text" class="form-control" id="nama_mhs1" placeholder="" name="nama_mhs1">
                             <label for="nim_mhs1" class="form-control-label">NIM Mahasiswa Ke-1</label>
                                <input type="text" class="form-control" id="nim_mhs1" placeholder="" name="nim_mhs1">

                            <label for="nama_mhs2" class="form-control-label">Nama Mahasiswa Ke-2</label>
                             <input type="text" class="form-control" id="nama_mhs2" placeholder="" name="nama_mhs2">
                             <label for="nim_mhs2" class="form-control-label">NIM Mahasiswa Ke-2</label>
                            <input type="text" class="form-control" id="nim_mhs2" placeholder="" name="nim_mhs2">

                            <label for="nama_mhs3" class="form-control-label">Nama Mahasiswa Ke-3</label>
                             <input type="text" class="form-control" id="nama_mhs3" placeholder="" name="nama_mhs3">
                             <label for="nim_mhs3" class="form-control-label">NIM Mahasiswa Ke-2</label>
                            <input type="text" class="form-control" id="nim_mhs3" placeholder="" name="nim_mhs3">
                       
                        </div>
                    </div>
                    </div>

                </div>
               
                </div>
                <!-- End add new member as lecturer -->

                <div class="card mb-3">
                    <div class="card-header bg-warning p-2"><h6>Upload Proposal Penelitian</h6>
                        Petunjuk upload file:
                        <ul>
                            <li>hanya menerima type file pdf</li>
                            <li>besar file pdf <= 3 MB</li>
                            <li>nama file tidak lebih dari 30 karakter</li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="filepenelitian" class="form-control-label">Proposal Penelitian:</label>
                            <input type="file" class="form-control" id="filepenelitian" accept=".pdf" placeholder="" name="filepenelitian" required>
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
var uploadField = document.getElementById("filepenelitian");
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
     $bidang_fokus = $_POST['bidang_fokus'];
     $nama_skema = $_POST['nama_skema'];
     $sub_skema= $_POST['sub_skema'];

     $dana_usulan=$_POST['dana_usulan'];
     $target_tkt=$_POST['target_tkt'];
     $kategori_sumber_dana=$_POST['kategori_sumber_dana'];

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

     $nama_mhs1=$_POST['nama_mhs1'];
     $nim_mhs1=$_POST['nim_mhs1'];
     $nama_mhs2=$_POST['nama_mhs2'];
     $nim_mhs2=$_POST['nim_mhs2'];
     $nama_mhs3=$_POST['nama_mhs3'];
     $nim_mhs3=$_POST['nim_mhs3'];

    $filepenelitian=$_FILES['filepenelitian']['name'];
    $tmp=$_FILES['filepenelitian']['tmp_name'];
    $unik=$_SESSION['nidn_login'];
      $filepenelitian_name = $unik.$filepenelitian ;
    $path='files/penelitian/'.$filepenelitian_name;
 
    if(move_uploaded_file($tmp, $path))
    {
        $query = "INSERT INTO research (sinta_id_ketua, nama_ketua, nidn_ketua, afiliasi_ketua, kd_pt_ketua, judul, thn_pertama_usulan, thn_usulan_kegiatan, thn_pelaksanaan_kegiatan, lama_kegiatan, bidang_fokus, nama_skema, dana_usulan, status_usulan, dana_disetujui, afiliasi_sinta_id, nama_institusi_penerima_dana, target_tkt, nama_sub_skema, kategori_sumber_dana, negara_sumber_dana, sinta_id_member1, nidn_member1, nama_member1, sinta_id_member2, nidn_member2, nama_member2, sinta_id_member3, nidn_member3, nama_member3, sinta_id_member4, nidn_member4, nama_member4, sinta_id_member5, nidn_member5, nama_member5, mhs_1, nim_mhs_1, mhs_2, nim_mhs_2, mhs_3, nim_mhs_3, file_penelitian) VALUES ('$sinta_id_ketua', '$nama_ketua', '$nidn_ketua', 'UNIVERSITAS PATTIMURA', '001021', '$judul', '$tahun_pertama_usulan', '$tahun_usulan_kegiatan', '$thn_pelaksanaan_kegiatan', '$lama_kegiatan', '$bidang_fokus', '$nama_skema', '$dana_usulan', 'Didanai', '0', '492', 'UNIVERSITAS PATTIMURA', '$target_tkt', '$sub_skema', '$kategori_sumber_dana', 'ID', '$sinta_id_member1','$nidn_member1','$nama_member1','$sinta_id_member2','$nidn_member2','$nama_member2','$sinta_id_member3','$nidn_member3','$nama_member3','$sinta_id_member4','$nidn_member4','$nama_member4','$sinta_id_member5','$nidn_member5','$nama_member5','$nama_mhs1','$nim_mhs1','$nama_mhs2','$nim_mhs2','$nama_mhs3','$nim_mhs3','$filepenelitian_name')";
      
        $sql=mysqli_query($conn,$query);

        if($sql){
            echo "<script> alert ('Pengajuan Proposal telah diterima. Silahkan menunggu hasil verifikasi '); window.location='csPen.php'; </script>" ;
        }else{
            echo "<script> alert ('Terjadi kesalahan penyimpanan data '); window.location='propen.php'; </script>" ;
        }
    }
    else {
        echo "<script> alert ('tidak dapat menyimpan file proposal '); window.location='propen.php'; </script>" ;
    }
}
?>