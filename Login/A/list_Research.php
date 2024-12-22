<?php
session_start();
if(!isset($_SESSION['nama_admin'])){
   echo "<script> alert('Anda Belum Login'); window.location='../index.php'; </script>";
} 
?>

<?php  include 'menuA.php'; 
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
      case "penilaian":
        penilaian($conn);
        break;
      default:
          view($conn);
      }
} else {
  view($conn);
}

// function view
function view($conn){
?>

<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Lihat Data</a></li>
    <li class="breadcrumb-item"><a href="list_Research.php">Proposal Penelitian</a></li>
  </ul>
</div>


<div class="container-fluid">
<div class="card">
  <div class="card-header text-center">Daftar Pengajuan Proposal Penelitian</div>
  <div class="card-body table-responsive">        
  <table id="example1" class="table table-bordered table-hover">
    <thead class="bg-dark text-white">
      <tr>
      <th>No.</th>
      <th>NIDN</th>
      <th>Nama</th>
      <th>Prodi</th>
      <th>Judul</th>
      <th>Tahun</th>
      <th>Status</th>
      <th>Aksi</th>
      
      </tr>
    </thead>
    <tbody>
    <?php                          
      $no=0;
      $query="SELECT research.*, reg.nip, mstr_prodi.prodi, mstr_fakultas.fakultas, status.id_status, status.status_name
      FROM research
      INNER JOIN reg ON reg.nidn=research.nidn_ketua
      INNER JOIN mstr_prodi ON mstr_prodi.id_prodi=reg.prodi
      INNER JOIN mstr_fakultas ON mstr_fakultas.id_fakultas=reg.fakultas
      INNER JOIN status ON status.id_status=research.status
      ORDER BY id_research DESC ";
      $sql=mysqli_query($conn,$query);
      $cek=mysqli_num_rows($sql);
      if(!$cek){
        echo "tidak ada data";
      }
      while($hasil=mysqli_fetch_array($sql)){
      $no++;
    ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $hasil['nidn_ketua']; ?></td>
        <td><?php echo $hasil['nama_ketua']; ?></td>
        <td><?php echo $hasil['prodi']; ?></td>
        <td><?php echo $hasil['judul']; ?></td>
        <td><?php echo $hasil['thn_pertama_usulan']; ?></td>
        <td>
         <?php echo $hasil['status_name']; ?></td>
         </td>
        <td>
        <a href="#" class="btn btn-outline-info btn-sm" role="button">Detail</a> <br> <br>
        <a href='list_Research.php?aksi=penilaian&id=<?php echo $hasil['id_research']; ?>' class="btn btn-outline-info btn-sm text-justify" role="button" >Beri Penilaian </a> 
        </td>

        </tr>                                       
      <?php 
      }
      ?>
    </tbody>
  </table>
  </div>
</div>
</div>
<?php } ?>
<!-- endFunctionView -->


<!-- function penilaian -->
<?php 
function penilaian($conn){
  // echo $_GET['id'];
  $id_research=$_GET['id'];
  $queri="SELECT * FROM research WHERE id_research=$id_research";
  $sql=mysqli_query($conn,$queri);
  while($hasil=mysqli_fetch_array($sql)){
?>

<div>
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="list_Research.php">Proposal Penelitian</a></li>
    <li class="breadcrumb-item"><a href="#">Penilaian Proposal Penelitian</a></li>
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
                    <input type="number" class="form-control" id="sinta_id_ketua" name="sinta_id_ketua" value='<?php echo $hasil['sinta_id_ketua']; ?>' disabled>
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
                    <!-- <input type="text" class="form-control" id="judul" placeholder="" name="judul" value="<?php echo $hasil['judul']; ?>" disabled> -->
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
                    <input type="number" class="form-control" id="thn_pelaksanaan_kegiatan" placeholder="" name="thn_pelaksanaan_kegiatan" value="<?php echo $hasil['thn_pelaksanaan_kegiatan']?>" readonly> 
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
                    <input type="text" value="<?php echo $hasil['dana_disetujui'] ?>" class="form-control" id="dana_disetujui" name="dana_disetujui" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
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
                    <select name="status" id='status' class="form-control" required >
                        <option value=''>-- Pilih status --</option>
                        <option value="Menunggu verifikasi" <?php if ($hasil['status']=='Menunggu verifikasi') {echo 'selected';} ?>>Menunggu verifikasi</option>

                        <option value="Telah Diperiksa" <?php if($hasil['status']=='Telah Diperiksa') {echo 'selected';}?> >Telah Diperiksa</option>

                        <option value="Lolos Verifikasi" <?php if($hasil['status']=='Lolos Verifikasi') {echo 'selected';}?> >Lolos Verifikasi</option>

                        <option value="Tidak Lolos Verifikasi" <?php if($hasil['status']=='Tidak Lolos Verifikasi') {echo 'selected';}?> >Tidak Lolos Verifikasi</option>
                    </select>
                </div>

            </div>  
            <hr>  
                <div class="panel-footer mt-5 text-center">
                    <button type="submit" name='simpan' class="btn btn-success  mr-5">Simpan</button>
                    <a href="list_Research.php" class="btn btn-danger">Batal</a>
                 </div>
        </form>
    </div>
</div>
</div>
<?php 
} // end Query

if(isset($_POST['simpan'])){
  $dana_disetujui=$_POST['dana_disetujui'];
  $status=$_POST['status'];

  $query_penilaian="UPDATE research SET dana_disetujui='$dana_disetujui',status='$status' WHERE id_research=$id_research";
  $sql_penilaian =mysqli_query($conn,$query_penilaian);
  if($sql_penilaian){
      echo "<script> alert ('Data berhasil diubah');window.location='list_Research.php';</script>"; 
      }
      else 
      {
          echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database";
          echo "<br><a href='list_Research.php'>Kembali Ke Form</a>";
      }
}
?>

<?php
}  //end Function penilaian
?>
<!-- endFucntinPenilaian -->

<script type="text/javascript">  
    $(function () {  
     $("#example1").dataTable();  
     $('#example2').dataTable({  
      "bPaginate": true,  
      "bLengthChange": false,  
      "bFilter": false,  
      "bSort": true,  
      "bInfo": true,  
      "bAutoWidth": false  
     });  
    });  
   </script> 

<?php include '../footer.php'; ?>