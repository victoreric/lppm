<?php
// cek status
include 'menu.php'; 
include '../link.php';


// Program Utama
if (isset($_GET['aksi'])){
    switch($_GET['aksi']){
        case "detail":
            detail($conn);
            break;
        case "update":
            update($conn);
            break;
        case "lihat":
            lihat($conn);
            break;
        default:
            view($conn);
        }
} else {
    view($conn);
}




// fungsilihat
function lihat($conn){ 
?>
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="csPen.php">Status Pengajuan</a></li>
    <li class="breadcrumb-item"><a href="#">Lihat Proposal Pengajuan</a></li>
  </ul>
</div>
<?php
// echo $id_research;
    $id_research_dapat=$_GET['id_cari'];
//   echo $id_research_dapat;
$queri="SELECT research.*, status.id_status, status.status_name
      FROM research
      INNER JOIN status ON status.id_status=research.status
       WHERE id_research=$id_research_dapat
       ORDER BY id_research DESC";

    // $queri="SELECT * FROM research WHERE id_research=$id_research_dapat";
    $sql=mysqli_query($conn,$queri);
    while($hasil=mysqli_fetch_array($sql)){
?>
<div class="container">
<div class="card">
  <div class="card-header text-center">Proposal Penelitian</div>
  <div class="card-body">
  <div class="panel-body">
    <div class="form-group">
        <label for="sinta_id_ketua" class="form-control-label">Sinta_ID Ketua:</label>
        <input type="text" class="form-control" id="sinta_id_ketua" name="sinta_id_ketua" value='<?php echo $hasil['sinta_id_ketua']; ?>' disabled>
    </div>
    <div class="form-group">
        <label for="nama_ketua" class="form-control-label">Nama Ketua:</label>
        <input type="text" class="form-control" id="nama_ketua" value="<?php echo $hasil['nama_ketua']; ?>" name="nama_ketua" disabled>
    </div>

    <div class="form-group">
        <label for="nidn_ketua" class="form-control-label">NIDN Ketua:</label>
        <input type="text" class="form-control" id="nidn_ketua" value="<?php echo $hasil['nidn_ketua']; ?>" name="nidn_ketua" disabled>
    </div>

    <div class="form-group">
        <label for="judul" class="form-control-label">Judul Penelitian</label>
        <textarea class="form-control" id="judul" name="judul" rows="4" cols="50"readonly> <?php echo $hasil['judul']; ?> </textarea>
    </div>
    <div class="form-group">
        <label for="tahun_pertama_usulan" class="form-control-label">Tahun pertama usulan</label>
        <input type="number" class="form-control" id="tahun_pertama_usulan" placeholder="" name="tahun_pertama_usulan" value="<?php echo $hasil['thn_pertama_usulan']?>" readonly>
    </div>

    <div class="form-group">
        <label for="tahun_usulan_kegiatan" class="form-control-label">Tahun usulan kegiatan</label>
        <input type="number" class="form-control" id="tahun_usulan_kegiatan" placeholder="" name="tahun_usulan_kegiatan" value="<?php echo $hasil['thn_usulan_kegiatan']?>" readonly> 
    </div>

    <div class="form-group">
        <label for="thn_pelaksanaan_kegiatan " class="form-control-label">Tahun Pelaksanaan Kegiatan </label>
        <input type="number" class="form-control" id="thn_pelaksanaan_kegiatan" name="thn_pelaksanaan_kegiatan" value="<?php echo $hasil['thn_pelaksanaan_kegiatan']?>" readonly> 
    </div>

    <div class="form-group">
        <label for="lama_kegiatan" class="form-control-label">Lama Kegiatan (tahun)</label>
        <input type="text" class="form-control" value="<?php echo $hasil['lama_kegiatan']?>" readonly>
    </div>

    <div class="form-group">
        <label for="bidang_fokus" class="form-control-label">Bidang Fokus</label>
        <input type="text" class="form-control" value="<?php echo $hasil['bidang_fokus']?>" readonly>
    </div>

    <div class="form-group">
        <label for="nama_skema" class="form-control-label">Skema</label>
        <input type="text" class="form-control" value="<?php echo $hasil['nama_skema'] ?>" readonly>
        </div>

    <div class="form-group">
        <label for="sub_skema" class="form-control-label">Sub Skema</label>
        <input type="text" class="form-control" value="<?php echo $hasil['nama_sub_skema'] ?>" readonly>
        </div>

    <div class="form-group">
        <label for="dana_usulan" class="form-control-label">Dana yang diusulkan (Rp.)</label>
        <input type="text" class="form-control" value="<?php echo $hasil['dana_usulan'] ?>" readonly>
    </div>

    <div class="form-group">
        <label for="dana_disetujui" class="form-control-label">Dana yang direkomendasikan (Rp.)</label>
        <input type="text" class="form-control" value="<?php echo $hasil['dana_disetujui'] ?>" readonly>
    </div>

    <div class="form-group">
        <label for="target_tkt" class="form-control-label">Target Kesiapan Teknologi (TKT)</label>
        <input type="text" class="form-control" value="<?php echo $hasil['target_tkt'] ?>" readonly>
    </div>

    <div class="form-group">
        <label for="kategori_sumber_dana" class="form-control-label">Kategori Sumber Dana</label>
        <input type="text" class="form-control" value="<?php echo $hasil['kategori_sumber_dana'] ?>" readonly>
        </div>

    <!-- add new member as lecturer and students-->
    <div class="form-group">
        <label for="accordion" class="form-control-label">Anggota </label>

    <div id="accordion">
        <div class="card">
        <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
            Nama-nama Dosen sebagai anggota
            </a>
        </div>
        <div id="collapseOne" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_member1" class="form-control-label">Nama Anggota Ke-1</label>
                    <input type="text" class="form-control" id="nama_member1" name="nama_member1" value="<?php echo $hasil['nama_member1']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="nidn_member1" class="form-control-label">NIDN Anggota Ke-1</label>
                    <input type="text" class="form-control" id="nidn_member1" name="nidn_member1" value="<?php echo $hasil['nidn_member1'];?>" readonly>
                </div>

                <div class="form-group">
                    <label for="sinta_id_member1" class="form-control-label">Sinta_ID Anggota Ke-1</label>
                    <input type="text" class="form-control" id="sinta_id_member1" name="sinta_id_member1" value="<?php echo $hasil['sinta_id_member1']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="nama_member2" class="form-control-label">Nama Anggota Ke-2</label>
                    <input type="text" class="form-control" id="nama_member2" name="nama_member2" value="<?php echo $hasil['nama_member2']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="nidn_member2" class="form-control-label">NIDN Anggota Ke-2</label>
                    <input type="text" class="form-control" id="nidn_member2" name="nidn_member2" value="<?php echo $hasil['nidn_member2'];?> " readonly>
                </div>

                <div class="form-group">
                    <label for="sinta_id_member2" class="form-control-label">Sinta_ID Anggota Ke-2</label>
                    <input type="text" class="form-control" id="sinta_id_member2" name="sinta_id_member2" value="<?php echo $hasil['sinta_id_member2']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="nama_member3" class="form-control-label">Nama Anggota Ke-3</label>
                    <input type="text" class="form-control" id="nama_member3" name="nama_member3" value="<?php echo $hasil['nama_member3']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="nidn_member3" class="form-control-label">NIDN Anggota Ke-3</label>
                    <input type="text" class="form-control" id="nidn_member3" name="nidn_member3" value="<?php echo $hasil['nidn_member3'];?> " readonly>
                </div>

                <div class="form-group">
                    <label for="sinta_id_member3" class="form-control-label">Sinta_ID Anggota Ke-3</label>
                    <input type="text" class="form-control" id="sinta_id_member3" name="sinta_id_member3" value="<?php echo $hasil['sinta_id_member3'];  ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="nama_member4" class="form-control-label">Nama Anggota Ke-4</label>
                    <input type="text" class="form-control" id="nama_member4" name="nama_member4" value="<?php echo $hasil['nama_member4']; ?>"readonly>
                </div>

                <div class="form-group">
                    <label for="nidn_member4" class="form-control-label">NIDN Anggota Ke-4</label>
                    <input type="text" class="form-control" id="nidn_member4" name="nidn_member4" value="<?php echo $hasil['nidn_member4'];?> "readonly>
                </div>

                <div class="form-group">
                    <label for="sinta_id_member4" class="form-control-label">Sinta_ID Anggota Ke-4</label>
                    <input type="text" class="form-control" id="sinta_id_member4" name="sinta_id_member4" value="<?php echo $hasil['sinta_id_member4']; ?>"readonly>
                </div>

                <div class="form-group">
                    <label for="nama_member5" class="form-control-label">Nama Anggota Ke-5</label>
                    <input type="text" class="form-control" id="nama_member5" name="nama_member5" value="<?php echo $hasil['nama_member5']; ?>"readonly>
                </div>

                <div class="form-group">
                    <label for="nidn_member5" class="form-control-label">NIDN Anggota Ke-5</label>
                    <input type="text" class="form-control" id="nidn_member5" name="nidn_member5" value="<?php echo $hasil['nidn_member5'];?> "readonly>
                </div>

                <div class="form-group">
                    <label for="sinta_id_member5" class="form-control-label">Sinta_ID Anggota Ke-5</label>
                    <input type="text" class="form-control" id="sinta_id_member5" name="sinta_id_member5" value="<?php echo $hasil['sinta_id_member5']; ?>"readonly>
                </div>
            </div>
        </div>
        </div>

        <div class="card">
        <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
            Nama-nama Mahasiswa sebagai anggota
        </a>
        </div>
        <div id="collapseTwo" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <label for="nama_mhs1" class="form-control-label">Nama Mahasiswa Ke-1</label>
                <input type="text" class="form-control" id="nama_mhs1" name="nama_mhs1" value="<?php echo $hasil['mhs_1']; ?>" readonly>

                <label for="nim_mhs1" class="form-control-label">NIM Mahasiswa Ke-1</label>
                    <input type="text" class="form-control" id="nim_mhs1" name="nim_mhs1" value="<?php echo $hasil['nim_mhs_1']; ?>"readonly>

                <label for="nama_mhs2" class="form-control-label">Nama Mahasiswa Ke-2</label>
                <input type="text" class="form-control" id="nama_mhs2" name="nama_mhs2" value="<?php echo $hasil['mhs_2']; ?>"readonly>

                <label for="nim_mhs2" class="form-control-label">NIM Mahasiswa Ke-2</label>
                <input type="text" class="form-control" id="nim_mhs2" name="nim_mhs2" value="<?php echo $hasil['nim_mhs_2']; ?>"readonly>

                <label for="nama_mhs3" class="form-control-label">Nama Mahasiswa Ke-3</label>
                <input type="text" class="form-control" id="nama_mhs3" name="nama_mhs3" value="<?php echo $hasil['mhs_3']; ?>"readonly>

                <label for="nim_mhs3" class="form-control-label">NIM Mahasiswa Ke-3</label>
                <input type="text" class="form-control" id="nim_mhs3" name="nim_mhs3" value="<?php echo $hasil['nim_mhs_3']; ?>"readonly>
            </div>
        </div>
        </div>

    </div>

    </div>
    <!-- End add new member as lecturer and students -->

    <div class="form-group">
        <label for="file_penelitian" class="form-control-label">File Proposal Penelitian :</label>
        <div class="card-header">
        <a href="luk.php?f=<?php echo $hasil['file_penelitian']; ?>" target='blank'><?php echo $hasil['file_penelitian']; ?> </a>
        </div>
    </div>

    <div class="form-group">
        <label for="status" class="form-control-label">Status Penerimaan Proposal</label>
        <input type="text" class="form-control" id="status" name="status" value="<?php echo $hasil['status_name']; ?>"readonly>
    </div>
  </div>
</div>
</div>

<?php
}
?>
<a href="csPen.php" class="btn btn-info btn-block" role="button">Kembali</a>
<?php
}
?>
<!--endFungsiLihat -->


<!--FungsiView -->
<?php
// function view
function view($conn){
  $nidn=$_SESSION['nidn_login'];
?>
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Status Pengajuan</a></li>
    <li class="breadcrumb-item"><a href="csPen.php">Proposal Penelitian</a></li>
  </ul>
</div>

<!-- <div class="container table-responsive">
  <h4 class='text-center'>Daftar Pengajuan Proposal Pengabdian</h4>     -->
<div class="container-fluid"> 
<div class="card">
  <div class="card-header text-center">Daftar Pengajuan Proposal Penelitian</div>
  <div class="card-body table-responsive">       
  <table id="example1" class="table table-bordered table-hover">
    <thead class="bg-dark text-white text-center">
      <tr>
      <th>No.</th>
      <th>Tahun Pengusulan</th>
      <th>NIDN</th>
      <th>Nama</th>
      <th>Judul</th>
      <th>Dana Diusulkan</th>
      <th>File Proposal</th>
      <th>Aksi</th>
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
        <td> 
            <!-- <a href="luk.php?f=<?php echo $hasil['file_penelitian']; ?>" target='blank'><?php echo $hasil['file_penelitian']?>   -->
            <a href="luk.php?f=<?php echo $hasil['file_penelitian']; ?>" target='blank'>Lihat file 
        </td>

        <td>
          <a href='csPen.php?aksi=detail&id=<?php echo $id_research; ?>' >Detail </a> 
         </td>

      </tr>
      <?php }?>
    </tbody>
  </table>
</div>
</div>
</div>

<?php } ?>
<!--endFungsiView -->



<?php
// function detail
function detail($conn){
//   $nidn=$_SESSION['nidn_login'];
  $id_res=$_GET['id'];
?>

<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="csPen.php">Status Pengajuan</a></li>
    <li class="breadcrumb-item"><a href="#">Proposal Penelitian</a></li>
  </ul>
</div>

<div class="container table-responsive">
  <h4 class='text-center'>Proposal Penelitian</h4>  
  <?php                          
      $no=0;
      $query="SELECT research.*, status.id_status, status.status_name
      FROM research
      INNER JOIN status ON status.id_status=research.status
       WHERE id_research=$id_res
       ORDER BY id_research DESC";

      $sql=mysqli_query($conn,$query);
      $cek=mysqli_num_rows($sql);
      if(!$cek){
        echo "tidak ada data";
      }
      else {
      $hasil=mysqli_fetch_array($sql);
        $id_research=$hasil['id_research'];
        // echo $hasil['status_name'];
      $no++;
    ?>
    <table class="table table-striped">
        <tbody>
        <tr>
            <td>Tahun Usulan</td>
            <td>:</td>
            <td><?php echo $hasil['thn_usulan_kegiatan'] ?></td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>:</td>
            <td><?php echo $hasil['judul']; ?></td>
        </tr>
        <tr>
            <td>Ketua</td>
            <td>:</td>
            <td><?php echo $hasil['nama_ketua']; ?></td>
        </tr>
        <tr>
            <td>Dana yang diusulkan</td>
            <td>:</td>
            <td><?php echo $hasil['dana_usulan']; ?></td>
        </tr>
        
        <?php
            if($hasil['dana_disetujui']!="0"){
                ?>
                 <tr>
                    <td>Dana yang Direkomendasikan</td>
                    <td>:</td>
                    <td><?php echo $hasil['dana_disetujui']; ?></td>
                </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
                <div>
                <a href="csPen.php?aksi=lihat&id_cari=<?php echo $id_research ;?>" class="btn btn-info btn-block">Lihat detail</a>
                </div>
<br>
  <table class="table table-bordered table-hover table-responsive-lg">
    <thead class="bg-secondary text-center">
      <tr>
        <th>No.</th>
      <th>Status Proposal Penelitian</th>
      <th>Komentar</th>
      <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        
      <tr>
        <td>1</td>
        <td>Pengajuan Proposal</td>
        <td> 
            <?php 
            $id_riset_pro_pen= $hasil['id_research'];

            $query_kom="SELECT komentar FROM proposal_pen WHERE `id_research`=$id_riset_pro_pen";
            $sql_kom=mysqli_query($conn,$query_kom);
            $res_kom=mysqli_fetch_assoc($sql_kom);

            echo $res_kom['komentar'];
            ?> 
        
        </td>
        <td> 
             <?php 
            $status=$hasil['status'];
            if($status=='1' OR $status=='3' ){ 
            ?>
                <a href="csPen.php?aksi=update&id=<?php echo $id_research; ?>" class="btn btn-warning btn-sm text-reset" role="button">Ubah</a>
            <?php
            }
            else {
            ?>
                <a href="csPen.php?aksi=lihat&id_cari=<?php echo $id_research; ?>" class="btn btn-success btn-sm text-reset" role="button">Lihat</a>
            <?php
            }
            ?>            
      </td>
      </tr>
      
    <tr>
        <td>2</td>
        <td> Penilaian Administrasi & Substansi</td>
        <td>
            <?php 
               $query_adm="SELECT * FROM research_nilai_adm WHERE id_research=$id_research";
               $sql_adm=mysqli_query($conn,$query_adm);
               $hasil_adm=mysqli_fetch_assoc($sql_adm);

               echo $hasil_adm['komentar'];
            ?>
        </td>

        <td>
            <?php 
            $cek_adm=mysqli_num_rows($sql_adm);
            if(!$cek_adm){
            // echo "... Menunggu ...";
            
            }
            else {
            ?>
                <a href="../adminlppm/printNilaiAdm.php?id=<?php echo $id_research; ?>" class="btn btn-success btn-sm text-reset" role="button" target="_blank">Lihat</a>
            <?php
            }
            ?> 
        </td>

    </tr>
   
    <!-- <tr>
        <td>3</td>
        <td>Penilaian Substansi</td>
        <td>
        <?php 
               $query_subs="SELECT * FROM substansi WHERE id_research=$id_research";
               $sql_subs=mysqli_query($conn,$query_subs);
               $hasil_subs=mysqli_fetch_assoc($sql_subs);

               echo $hasil_subs['kom_sesuai'];
            ?>
        </td>

        <td>
        <?php 
            $query_sub="SELECT * FROM substansi WHERE id_research=$id_research";
            $sql_sub=mysqli_query($conn,$query_sub);
            $hasil_sub=mysqli_fetch_assoc($sql_sub);
            $cek_sub=mysqli_num_rows($sql_sub);
            if(!$cek_sub){
            echo "... Menunggu ...";
            }
            else {
            ?>
                <a href="../reviewer/print_nilai_subs.php?id=<?php echo $id_research; ?>" class="btn btn-success btn-sm text-reset" role="button" target="_blank">Lihat</a>
            <?php
            }
            ?> 
        </td>
    </tr> -->
   
    <tr>
        <td>4</td>
        <td>Pencairan Dana</td>
        <td> - </td>
        <td>
           -
        </td>
    </tr>
    <tr>
        <td>5</td>
        <td>Laporan Kemajuan</td>
        <td> - </td>
        <td>
            -
        </td>
    </tr>
    <tr>
        <td>6</td>
        <td>Monev Laporan Kemajuan </td>
        <td> - </td>
        <td>
            -
        </td>
    </tr>
    <tr>
        <td>7</td>
        <td>Laporan Akhir</td>
        <td> - </td>
        <td>
            -
        </td>
    </tr>
    <tr>
        <td>8</td>
        <td>Monev Laporan Akhir</td>
        <td> - </td>
        <td>
            -
        </td>
    </tr>
    <tr>
        <td>9</td>
        <td>Selesai</td>
        <td> - </td>
        <td>
            -
        </td>
    </tr>

     
    </tbody>
  </table>
</div>

<?php 
      }
} 
?>
<!-- End Function Detail -->


<?php
// function update
function update($conn){
//   $nidn=$_SESSION['nidn_login'];
?>
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="csPen.php">Status Pengajuan</a></li>
    <li class="breadcrumb-item"><a href="#">Edit Proposal Penelitian</a></li>
  </ul>
</div>
<?php
$id_research=$_GET['id'];
// echo $id_research;

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

                        <option value="Pengembangan Teknologi Pertahanan Dan Keamanan" <?php if($hasil['bidang_fokus']=='Pengembangan Teknologi Pertahanan Dan Keamanan') {echo 'selected';} ?>>Pengembangan Teknologi Pertahanan Dan Keamanan</option>

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
                        <option value='' disabled>-- Pilih sub skema --</option>
                        <option value='Penelitian Mandiri (PM)' <?php if($hasil['nama_sub_skema']=='Penelitian Mandiri (PM)') {echo 'selected';} ?> >Penelitian Mandiri (PM)</option>

                        <option value='Penelitian Peningkatan Kapasitas Dosen Pemula (PKDP)' <?php if($hasil['nama_sub_skema']=='Penelitian Peningkatan Kapasitas Dosen Pemula (PKDP)') {echo 'selected';}  ?> >Penelitian Peningkatan Kapasitas Dosen Pemula (PKDP)</option>

                        <option value="Penelitian Peningkatan Kapasitas Tenaga Kependidikan (PKTK)" <?php if($hasil['nama_sub_skema']=='Penelitian Peningkatan Kapasitas Tenaga Kependidikan (PKTK)') {echo 'selected';} ?> >Penelitian Peningkatan Kapasitas Tenaga Kependidikan (PKTK)</option>

                        <option value="Penelitian Unggulan Fakultas (PUF)" <?php if($hasil['nama_sub_skema']=='Penelitian Unggulan Fakultas (PUF)') {echo 'selected';} ?> >Penelitian Unggulan Fakultas (PUF) </option>

                        <option value=''disabled>-----------------</option>

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
                        <option value='TKT 1 - Prinsip dasar dari teknologi telah diteliti dan dilaporkan' <?php  if ($hasil['target_tkt']=='TKT 1 - Prinsip dasar dari teknologi telah diteliti dan dilaporkan') {echo 'selected';}  ?>>TKT 1 - Prinsip dasar dari teknologi telah diteliti dan dilaporkan</option>

                        <option value='TKT 2 - Formulasi Konsep teknologi dan aplikasinya' <?php  if ($hasil['target_tkt']=='TKT 2 - Formulasi Konsep teknologi dan aplikasinya') {echo 'selected';}  ?>>TKT 2 - Formulasi Konsep teknologi dan aplikasinya</option>

                        <option value='TKT 3 - Pembuktian konsep (proof-of-concept) fungsi dan/atau karakteristik penting secara analitis dan eksperimental' <?php  if ($hasil['target_tkt']=='TKT 3 - Pembuktian konsep (proof-of-concept) fungsi dan/atau karakteristik penting secara analitis dan eksperimental') {echo 'selected';}  ?>>TKT 3 - Pembuktian konsep (proof-of-concept) fungsi dan/atau karakteristik penting secara analitis dan eksperimental</option>

                        <option value='TKT 4 - Validasi komponen/subsistem dalam lingkungan laboratorium' <?php  if ($hasil['target_tkt']=='TKT 4 - Validasi komponen/subsistem dalam lingkungan laboratorium') {echo 'selected';}  ?>>TKT 4 - Validasi komponen/subsistem dalam lingkungan laboratorium </option>

                        <option value='TKT 5 - Validasi komponen/subsistem dalam lingkungan yang relevan' <?php  if ($hasil['target_tkt']=='TKT 5 - Validasi komponen/subsistem dalam lingkungan yang relevan') {echo 'selected';}  ?>>TKT 5 - Validasi komponen/subsistem dalam lingkungan yang relevan</option>

                        <option value='TKT 6 - Demonstrasi Model atau Prototipe Sistem/ Subsistem dalam lingkungan yang relevan' <?php  if ($hasil['target_tkt']=='TKT 6 - Demonstrasi Model atau Prototipe Sistem/ Subsistem dalam lingkungan yang relevan') {echo 'selected';}  ?>>TKT 6 - Demonstrasi Model atau Prototipe Sistem/ Subsistem dalam lingkungan yang relevan</option>

                        <option value='TKT 7 - Demonstrasi prototipe sistem dalam lingkungan/aplikasi sebenarnya' <?php  if ($hasil['target_tkt']=='TKT 7 - Demonstrasi prototipe sistem dalam lingkungan/aplikasi sebenarnya') {echo 'selected';}  ?>>TKT 7 - Demonstrasi prototipe sistem dalam lingkungan/aplikasi sebenarnya</option>

                        <option value='TKT 8 - Sistem telah lengkap dan memenuhi syarat (qualified) melalui pengujian dan demonstrasi dalam lingkungan/ aplikasi sebenarnya' <?php  if ($hasil['target_tkt']=='TKT 8 - Sistem telah lengkap dan memenuhi syarat (qualified) melalui pengujian dan demonstrasi dalam lingkungan/ aplikasi sebenarnya') {echo 'selected';}  ?>>TKT 8 - Sistem telah lengkap dan memenuhi syarat (qualified) melalui pengujian dan demonstrasi dalam lingkungan/ aplikasi sebenarnya</option>

                        <option value='TKT 9 - Sistem benar-benar teruji/terbukti melalui keberhasilan pengoperasian' <?php  if ($hasil['target_tkt']=='TKT 9 - Sistem benar-benar teruji/terbukti melalui keberhasilan pengoperasian') {echo 'selected';}  ?>>TKT 9 - Sistem benar-benar teruji/terbukti melalui keberhasilan pengoperasian</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kategori_sumber_dana" class="form-control-label">Kategori Sumber Dana</label>
                    <select name="kategori_sumber_dana" id='kategori_sumber_dana' class="form-control" required >
                        <option value=''>-- Pilih sumber dana --</option>

                        <option value= 'Luar Negeri' <?php if($hasil['kategori_sumber_dana']=='Luar Negeri') {echo 'selected';}  ?>>Luar Negeri</option>

                        <option value= 'Pemerintah' <?php if($hasil['kategori_sumber_dana']=='Pemerintah') {echo 'selected';}  ?>>Pemerintah</option>

                        <option value= 'Perusahaan/ Organisasi Swasta' <?php if($hasil['kategori_sumber_dana']=='Perusahaan/ Organisasi Swasta') {echo 'selected';}  ?>>Perusahaan/ Organisasi Swasta</option>

                        <option value= 'Institusi Internal' <?php if($hasil['kategori_sumber_dana']=='Institusi Internal') {echo 'selected';}  ?>>Institusi Internal </option>

                        <option value= 'Mandiri' <?php if($hasil['kategori_sumber_dana']=='Mandiri') {echo 'selected';}  ?>>Mandiri</option>
                    </select>
                </div>

                <!-- add new member as lecturer and students-->
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
                                <input type="text" class="form-control" id="nama_member1" name="nama_member1" value="<?php echo $hasil['nama_member1']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="nidn_member1" class="form-control-label">NIDN Anggota Ke-1</label>
                                <input type="text" class="form-control" id="nidn_member1" name="nidn_member1" value="<?php echo $hasil['nidn_member1'];?>">
                            </div>

                            <div class="form-group">
                                <label for="sinta_id_member1" class="form-control-label">Sinta_ID Anggota Ke-1</label>
                                <input type="text" class="form-control" id="sinta_id_member1" name="sinta_id_member1" value="<?php echo $hasil['sinta_id_member1']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="nama_member2" class="form-control-label">Nama Anggota Ke-2</label>
                                <input type="text" class="form-control" id="nama_member2" name="nama_member2" value="<?php echo $hasil['nama_member2']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="nidn_member2" class="form-control-label">NIDN Anggota Ke-2</label>
                                <input type="text" class="form-control" id="nidn_member2" name="nidn_member2" value="<?php echo $hasil['nidn_member2'];?> ">
                            </div>

                            <div class="form-group">
                                <label for="sinta_id_member2" class="form-control-label">Sinta_ID Anggota Ke-2</label>
                                <input type="text" class="form-control" id="sinta_id_member2" name="sinta_id_member2" value="<?php echo $hasil['sinta_id_member2']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="nama_member3" class="form-control-label">Nama Anggota Ke-3</label>
                                <input type="text" class="form-control" id="nama_member3" name="nama_member3" value="<?php echo $hasil['nama_member3']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="nidn_member3" class="form-control-label">NIDN Anggota Ke-3</label>
                                <input type="text" class="form-control" id="nidn_member3" name="nidn_member3" value="<?php echo $hasil['nidn_member3'];?> ">
                            </div>

                            <div class="form-group">
                                <label for="sinta_id_member3" class="form-control-label">Sinta_ID Anggota Ke-3</label>
                                <input type="text" class="form-control" id="sinta_id_member3" name="sinta_id_member3" value="<?php echo $hasil['sinta_id_member3'];  ?>">
                            </div>

                            <div class="form-group">
                                <label for="nama_member4" class="form-control-label">Nama Anggota Ke-4</label>
                                <input type="text" class="form-control" id="nama_member4" name="nama_member4" value="<?php echo $hasil['nama_member4']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="nidn_member4" class="form-control-label">NIDN Anggota Ke-4</label>
                                <input type="text" class="form-control" id="nidn_member4" name="nidn_member4" value="<?php echo $hasil['nidn_member4'];?> ">
                            </div>

                            <div class="form-group">
                                <label for="sinta_id_member4" class="form-control-label">Sinta_ID Anggota Ke-4</label>
                                <input type="text" class="form-control" id="sinta_id_member4" name="sinta_id_member4" value="<?php echo $hasil['sinta_id_member4']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="nama_member5" class="form-control-label">Nama Anggota Ke-5</label>
                                <input type="text" class="form-control" id="nama_member5" name="nama_member5" value="<?php echo $hasil['nama_member5']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="nidn_member5" class="form-control-label">NIDN Anggota Ke-5</label>
                                <input type="text" class="form-control" id="nidn_member5" name="nidn_member5" value="<?php echo $hasil['nidn_member5'];?> ">
                            </div>

                            <div class="form-group">
                                <label for="sinta_id_member5" class="form-control-label">Sinta_ID Anggota Ke-5</label>
                                <input type="text" class="form-control" id="sinta_id_member5" name="sinta_id_member5" value="<?php echo $hasil['sinta_id_member5']; ?>">
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
                             <input type="text" class="form-control" id="nama_mhs1" name="nama_mhs1" value="<?php echo $hasil['mhs_1']; ?>" required>

                             <label for="nim_mhs1" class="form-control-label">NIM Mahasiswa Ke-1</label>
                                <input type="text" class="form-control" id="nim_mhs1" name="nim_mhs1" value="<?php echo $hasil['nim_mhs_1']; ?>">

                            <label for="nama_mhs2" class="form-control-label">Nama Mahasiswa Ke-2</label>
                             <input type="text" class="form-control" id="nama_mhs2" name="nama_mhs2" value="<?php echo $hasil['mhs_2']; ?>">

                             <label for="nim_mhs2" class="form-control-label">NIM Mahasiswa Ke-2</label>
                            <input type="text" class="form-control" id="nim_mhs2" name="nim_mhs2" value="<?php echo $hasil['nim_mhs_2']; ?>">

                            <label for="nama_mhs3" class="form-control-label">Nama Mahasiswa Ke-3</label>
                             <input type="text" class="form-control" id="nama_mhs3" name="nama_mhs3" value="<?php echo $hasil['mhs_3']; ?>">

                             <label for="nim_mhs3" class="form-control-label">NIM Mahasiswa Ke-3</label>
                            <input type="text" class="form-control" id="nim_mhs3" name="nim_mhs3" value="<?php echo $hasil['nim_mhs_3']; ?>">
                        </div>
                    </div>
                    </div>

                </div>
               
                </div>
                <!-- End add new member as lecturer and students -->

                <div class="form-group">
                    <label for="file_penelitian" class="form-control-label">Proposal Penelitian :</label><br>
                    <a href="luk.php?f=<?php echo $hasil['file_penelitian']; ?>" target='blank'><?php echo $hasil['file_penelitian']; ?> </a>
                </div>

                <input type="checkbox" size="50px" name="ubahfile_penelitian" value="true"> Centang jika ingin mengubah File <br><br>
                <input type="file" id='filepenelitian' name="filepenelitian" accept=".pdf"> 
                <br>

                <div class="card mb-3">
                    <div class="card-header bg-warning p-2"><h6>Upload Proposal Penelitian</h6>
                        Petunjuk upload file:
                        <ul>
                            <li>hanya menerima type file pdf</li>
                            <li>besar file pdf <= 3 MB</li>
                            <li>nama file tidak lebih dari 30 karakter</li>
                        </ul>
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
                    <button type="submit" name='ubah' class="btn btn-success  mr-5">Ubah</button>
                    <a href="csPen.php" class="btn btn-danger">Batal</a>
                 </div>
        </form>
    </div>
</div>
</div>
<?php
}

if(isset($_POST['ubah'])){
    $judul=$_POST['judul'];
    $lama_kegiatan=$_POST['lama_kegiatan'];
    $bidang_fokus=$_POST['bidang_fokus'];
    $nama_skema=$_POST['nama_skema'];
    $sub_skema=$_POST['sub_skema'];
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
    // $filepenelitian=$_POST['filepenelitian '];

    // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
    // Proses ubah data ke Database
    if(!isset($_POST['ubahfile_penelitian'])){
        $query_update="UPDATE research SET judul='$judul',lama_kegiatan='$lama_kegiatan',bidang_fokus='$bidang_fokus',nama_skema='$nama_skema',dana_usulan='$dana_usulan', target_tkt='$target_tkt',nama_sub_skema='$sub_skema',kategori_sumber_dana='$kategori_sumber_dana',sinta_id_member1='$sinta_id_member1',nidn_member1='$nidn_member1',nama_member1='$nama_member1',sinta_id_member2='$sinta_id_member2',nidn_member2='$nidn_member2',nama_member2='$nama_member2',sinta_id_member3='$sinta_id_member3',nidn_member3='$nidn_member3',nama_member3='$nama_member3',sinta_id_member4='$sinta_id_member4',nidn_member4='$nidn_member4',nama_member4='$nama_member4',sinta_id_member5='$sinta_id_member5',nidn_member5='$nidn_member5',nama_member5='$nama_member5',mhs_1='$nama_mhs1',nim_mhs_1='$nim_mhs1',mhs_2='$nama_mhs2',nim_mhs_2='$nim_mhs2',mhs_3='$nama_mhs3',nim_mhs_3='$nim_mhs3' WHERE id_research=$id_research";

        $sql_update =mysqli_query($conn,$query_update);
            if($sql_update){
                echo "<script> alert ('Data berhasil diubah');window.location='csPen.php';</script>"; 
                }
                else 
                {
                    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database";
                    echo "<br><a href='csPen.php'>Kembali Ke Form</a>";
                }
        }
    // jika user mau ubah file proposal, mencentang checkbox yagn adai form ubah, lakukan
    else {
            $file_penelitian=$_FILES['filepenelitian']['name'];
            $tempfile=$_FILES['filepenelitian']['tmp_name'];
            $filenew=$id_research.$file_penelitian;
            $path = 'files/penelitian/'.$filenew;

            if(move_uploaded_file($tempfile, $path)){
                $query_update="UPDATE research SET judul='$judul',lama_kegiatan='$lama_kegiatan',bidang_fokus='$bidang_fokus',nama_skema='$nama_skema',dana_usulan='$dana_usulan', target_tkt='$target_tkt',nama_sub_skema='$sub_skema',kategori_sumber_dana='$kategori_sumber_dana',sinta_id_member1='$sinta_id_member1',nidn_member1='$nidn_member1',nama_member1='$nama_member1',sinta_id_member2='$sinta_id_member2',nidn_member2='$nidn_member2',nama_member2='$nama_member2',sinta_id_member3='$sinta_id_member3',nidn_member3='$nidn_member3',nama_member3='$nama_member3',sinta_id_member4='$sinta_id_member4',nidn_member4='$nidn_member4',nama_member4='$nama_member4',sinta_id_member5='$sinta_id_member5',nidn_member5='$nidn_member5',nama_member5='$nama_member5',mhs_1='$nama_mhs1',nim_mhs_1='$nim_mhs1',mhs_2='$nama_mhs2',nim_mhs_2='$nim_mhs2',mhs_3='$nama_mhs3',nim_mhs_3='$nim_mhs3', file_penelitian='$filenew' WHERE id_research=$id_research";

                $sql_update =mysqli_query($conn,$query_update);
                if($sql_update){
                echo "<script> alert ('Data berhasil diubah');window.location='csPen.php';</script>"; 
                }
                else 
                {
                    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database";
                    echo "<br><a href='csPen.php'>Kembali Ke Form</a>";
                }

            }
        }
    }

}
?>
<!-- End function update -->

<?php include '../footer.php'; ?>