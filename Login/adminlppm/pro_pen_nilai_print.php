<?php 
include 'menuALppm.php';
include '../link.php';
// include '../assets/fungsi.php';
?>

<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Status Proposal Penelitian</a></li>
    <li class="breadcrumb-item"><a href="#">Lihat Proposal Pengajuan</a></li>
  </ul>
</div>

<?php
// echo $id_research;
    $id=$_GET['id'];
//   echo $id;
    $queri="SELECT research.*, status.id_status, status.status_name
      FROM research
      INNER JOIN status ON status.id_status=research.status
       WHERE id_research=$id
       ORDER BY id_research DESC";

    // $queri="SELECT * FROM research WHERE id_research=$id_research_dapat";
    $sql=mysqli_query($conn,$queri);
    $hasil=mysqli_fetch_array($sql);
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


<a href="pro_pen_nilai.php" class="btn btn-info btn-block" role="button">Kembali</a>
</div>
<?php
include '../footer.php';
?>
