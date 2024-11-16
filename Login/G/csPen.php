<?php
// cek status
include 'menu.php'; 
include '../link.php';


// Program Utama
if (isset($_GET['aksi'])){
    switch($_GET['aksi']){
        case "add":
            add($conn);
            break;
        case "update":
            update($conn);
            break;
        case "delete":
            delete($conn);
            break;
        default:
            view($conn);
        }
} else {
    view($conn);
}

// function view
function view($conn){
  $nidn=$_SESSION['nidn_login'];
?>

<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Status Pengajuan</a></li>
    <li class="breadcrumb-item"><a href="cs.php">Proposal Penelitian</a></li>
  </ul>
</div>



<div class="container table-responsive">
  <h4 class='text-center'>Daftar Pengajuan Proposal Penelitian</h4>           
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
      <th>No.</th>
      <th>Tahun Pengusulan</th>
      <th>NIDN</th>
      <th>Nama</th>
      <th>Judul</th>
      <th>Dana Diusulkan</th>
      <th>File Proposal</th>
      <th>Aksi</th>
      <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php                          
      $no=0;
      $query="SELECT * FROM research
       WHERE nidn_ketua=$nidn
       ORDER BY id_research DESC";

      

      $sql=mysqli_query($conn,$query);
      $cek=mysqli_num_rows($sql);
      if(!$cek){
        echo "tidak ada data";
      }
      while($hasil=mysqli_fetch_array($sql)){
        $id_research=$hasil['id_research'];
      $no++;
    ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $hasil['thn_usulan_kegiatan']; ?></td>
        <td><?php echo $hasil['nidn_ketua']; ?></td>
        <td><?php echo $hasil['nama_ketua']; ?></td>
        <td><?php echo $hasil['judul']; ?></td>
        <td><?php echo $hasil['dana_usulan']; ?></td>
        <td> <a href="luk.php?f=<?php echo $hasil['file_penelitian']; ?>" target='blank'><?php echo $hasil['file_penelitian']?>  </td>
        <td>delete | 
        <a href='csPen.php?aksi=update&id=<?php echo $id_research; ?>' >edit </a> 
      </td>


           <?php 
            // $ttd=$hasil['ttd'];
            // if($ttd!='ttd.png'){ 
            ?>
              <td class='bg-danger'>
                Sedang diproses
              </td>
            <?php  
            // } 
            //   else { 
            ?>
            <!-- <td class='bg-success'> -->
              <?php 
              // $id=$hasil['id_surat'];
              // if($hasil['id_jenis']=='1'){ 
              //           echo "<a href='../A/c.php?id=$id' class='btn btn-success' name='' target='blank'>Cetak Surat</a> ";
              //       }  
              //       elseif($hasil['id_jenis']=='2'){
              //           echo "<a href='../A/c2.php?id=$id' class='btn btn-success' name='' target='blank'>Cetak Surat</a> ";
              //       }
              //       else{
              //           echo "<a href='../A/c3.php?id=$id' class='btn btn-success mr-5' name='' target='blank'>Cetak Surat</a> ";
              //       }
                ?>
              <!-- <a href="../A/c.php?id=<?php echo $hasil['id_surat'];?>" target="blank">Cetak Surat </a> -->
            </td>
            <?php 
            // }
            ?>
        
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>

<?php 
} 
?>
<!-- End Function View -->


<?php
// function update
function update($conn){
  $nidn=$_SESSION['nidn_login'];
?>
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Status Pengajuan</a></li>
    <li class="breadcrumb-item"><a href="cs.php">Edit Proposal Penelitian</a></li>
  </ul>
</div>
<?php
$id_research=$_GET['id'];
echo $id_research;

    $queri="SELECT * FROM research WHERE id_research=$id_research";
    $sql=mysqli_query($conn,$queri);
    while($hasil=mysqli_fetch_array($sql)){

?>

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
                    <input type="text" class="form-control" id="judul" placeholder="" name="judul" value="<?php echo $hasil['judul']; ?>" required>
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
                        <option value="1" <?php if ($hasil['lama_kegiatan']=='1') { echo 'selected'; }?> >1 </option>
                          <option value="2" <?php if ($hasil['lama_kegiatan']=='2') { echo 'selected'; }?> >2 </option>
                       
                    </select>
                </div>

                <div class="form-group">
                    <label for="bidang_fokus" class="form-control-label">Bidang Fokus</label>
                    <select name="bidang_fokus" id='bidang_fokus' class="form-control" required >
                        <option value=''>-- Pilih bidang fokus --</option>
                        <option value="Kemandirian Pangan"<?php if ($hasil['bidang_fokus']=='Kemandirian Pangan'){echo 'selected';}?>>Kemandirian Pangan</option>

                        <option value="Penciptaan Dan Pemanfaatan Energi Baru Dan Terbarukan" <?php if ($hasil['bidang_fokus']=="Penciptaan Dan Pemanfaatan Energi Baru Dan Terbarukan") {echo 'selected';} ?>>Penciptaan Dan Pemanfaatan Energi Baru Dan Terbarukan </option>

                        <option value="Pengembangan Teknologi Kesehatan Dan Obat" <?php if($hasil['bidang_fokus']=='Pengembangan Teknologi Kesehatan Dan Obat') {echo 'selected';} ?>>Pengembangan Teknologi Kesehatan Dan Obat </option>

                        <option value="Pengembangan Teknologi Dan Manajemen Transportasi " <?php if($hasil['bidang_fokus']=='Pengembangan Teknologi Dan Manajemen Transportasi') {echo 'selected';} ?> >Pengembangan Teknologi Dan Manajemen Transportasi </option>

                        <option value="Teknologi Informasi Dan Komunikasi" <?php if($hasil['bidang_fokus']=='Teknologi Informasi Dan Komunikasi') {echo 'selected';} ?> >Teknologi Informasi Dan Komunikasi </option>

                        <option>Pengembangan Teknologi Pertahanan Dan Keamanan</option>

                        <option value="Material Maju" <?php if($hasil['bidang_fokus']=='Material Maju') {echo 'selected';} ?>>Material Maju </option>

                        <option value="Kemaritiman" <?php if($hasil['bidang_fokus']=='Kemaritiman') {echo 'selected';} ?> >Kemaritiman </option>

                        <option value="Teknologi Manajemen Penanggulangan Kebencanaan" <?php if($hasil['bidang_fokus']=='Teknologi Manajemen Penanggulangan Kebencanaan') {echo 'selected';} ?> >Teknologi Manajemen Penanggulangan Kebencanaan </option>

                        <option value="Sosial Humaniora- Seni Budaya-Pendidikan" <?php if($hasil['bidang_fokus']=='Sosial Humaniora- Seni Budaya-Pendidikan') {echo 'selected';} ?> > Sosial Humaniora- Seni Budaya-Pendidikan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_skema" class="form-control-label">Skema</label>
                    <select name="nama_skema" id='nama_skema' class="form-control" required >
                        <option value=''>-- Pilih nama skema --</option>
                        <option value="Penelitian Dasar Unggulan UNPATTI (PDUU)" <?php if ($hasil['nama_skema']=='Penelitian Dasar Unggulan UNPATTI (PDUU)') {echo 'selected';} ?>>Penelitian Dasar Unggulan UNPATTI (PDUU)</option>
                        <option value="Penelitian Terapan Unggulan UNPATTI (PTUU)" <?php if($hasil['nama_skema']=='Penelitian Terapan Unggulan UNPATTI (PTUU)') {echo 'selected';}?> >Penelitian Terapan Unggulan UNPATTI (PTUU)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sub_skema" class="form-control-label">Sub Skema</label>
                    <select name="sub_skema" id='sub_skema' class="form-control" required >
                        <option value=''>-- Pilih sub skema --</option>
                        <option value='Penelitian Mandiri (PM)' <?php if($hasil['nama_sub_skema']=='Penelitian Mandiri (PM)') {echo 'selected';} ?> >Penelitian Mandiri (PM)</option>

                        <option value='Penelitian Peningkatan Kapasitas Dosen Pemula (PKDP)' <?php if($hasil['nama_sub_skema']=='Penelitian Peningkatan Kapasitas Dosen Pemula (PKDP)') {echo 'selected';}  ?> >Penelitian Peningkatan Kapasitas Dosen Pemula (PKDP)</option>

                        <option value="Penelitian Peningkatan Kapasitas Tenaga Kependidikan (PKTK)" <?php if($hasil['nama_sub_skema']=='Penelitian Peningkatan Kapasitas Tenaga Kependidikan (PKTK)') {echo 'selected';} ?> >Penelitian Peningkatan Kapasitas Tenaga Kependidikan (PKTK)</option>

                        <option value="Penelitian Unggulan Fakultas (PUF)" <?php if($hasil['nama_sub_skema']=='Penelitian Unggulan Fakultas (PUF)') {echo 'selected';} ?> >Penelitian Unggulan Fakultas (PUF) </option>

                        <option value="Penelitian Unggulan UNPATTI (PUU)" <?php if($hasil['nama_sub_skema']=='Penelitian Unggulan UNPATTI (PUU)') {echo 'selected';} ?> >Penelitian Unggulan UNPATTI (PUU)</option>

                        <option value="Penelitian Doktor Unggulan (PDU)" <?php if($hasil['nama_sub_skema']=='Penelitian Doktor Unggulan (PDU)') {echo 'selected';} ?> >Penelitian Doktor Unggulan (PDU)</option>

                        <option value="Penelitian Percepatan Guru Besar (PGB)" <?php if($hasil['nama_sub_skema']=='Penelitian Percepatan Guru Besar (PGB)') {echo 'selected';} ?> >Penelitian Percepatan Guru Besar (PGB)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dana_usulan" class="form-control-label">Dana yang diusulkan (Rp.)</label>
                    <input type="text" class="form-control" id="dana_usulan" placeholder="" value='<?php echo $hasil['dana_usulan']  ?>' name="dana_usulan" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
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

<?php
}
}
?>
<!-- End function update -->

<?php include '../footer.php'; ?>