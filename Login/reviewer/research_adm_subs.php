
<?php
include 'menuReviewer.php';
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
    <li class="breadcrumb-item"><a href="#">Proposal Penelitian</a></li>
    <li class="breadcrumb-item"><a href="#">Penilaian Administrasi & Substansi</a></li>
  </ul>
</div>
<!-- Main content starts -->
<div class="container-fluid mb-5">
  
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Penilaian Administrasi & Substansi Proposal Penelitian</h6>
        </div>


        <div class="card-body" style="color:black">
        <table class="table table-bordered table-sm table-borderless">
            <?php
                $id_cari=$_GET['id'];
                // echo $id_cari;
                
                $query="SELECT research.*, reg.nip, reg.jafung, reg.hindex, mstr_prodi.prodi, mstr_fakultas.fakultas_name, status.id_status, status.status_name
                FROM research
                INNER JOIN reg ON reg.nidn=research.nidn_ketua
                INNER JOIN status ON status.id_status=research.status
                INNER JOIN mstr_fakultas ON mstr_fakultas.id_fakultas=reg.fakultas
                INNER JOIN mstr_prodi ON mstr_prodi.id_prodi=reg.prodi
                WHERE id_research=$id_cari                                                                                          
                ORDER BY status.id_status ASC";
                $sql=mysqli_query($conn,$query);
                // $cek=mysqli_num_rows($sql);
                $hasil=mysqli_fetch_array($sql);
           ?>
            <tbody>
            <tr>
                <td class="font-weight-bold">Judul</td>
                <td>: </td>
                <td class="font-weight-bold"><?php echo $hasil['judul']; ?></td>
            </tr>
          
            <tr>
                <td class="font-weight-bold">Skema Penelitian</td>
                <td>:</td>
                <td><?php echo $hasil['nama_sub_skema']; ?></td>
            </tr>
            <tr>
                <td class="font-weight-bold">Program Penelitian</td>
                <td>:</td>
                <td><?php echo $hasil['nama_skema']; ?></td>
            </tr>
            <tr>
            <td class="font-weight-bold">Tingkat Kesiapan Teknologi (TKT) </td>
            <td>:</td>
            <td><?php echo $hasil['target_tkt']; ?></td>
        </tr>
            <tr>
                <td class="font-weight-bold">Ketua Peneliti</td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><?php echo $hasil['nama_ketua']; ?></td>
            </tr>
            <tr>
                <td>Fakultas</td>
                <td>:</td>
                <td><?php echo $hasil['fakultas_name']; ?></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td><?php echo $hasil['prodi']; ?></td>
            </tr>
            <tr>
                <td>NIDN/ NIDK</td>
                <td>:</td>
                <td><?php echo $hasil['nidn_ketua']; ?></td>
            </tr>
            <tr>
                <td>Sinta-id</td>
                <td>:</td>
                <td><?php echo $hasil['sinta_id_ketua']; ?></td>
            </tr>
            <tr>
                <td>Overall Score Sinta dan H-index Scopus</td>
                <td>:</td>
                <td><?php echo $hasil['hindex']; ?></td>
            </tr>
            <tr>
                <td>Jabatan Fungsional</td>
                <td>:</td>
                <td><?php echo $hasil['jafung']; ?></td>
            </tr>

            <?php
            // untuk mengetahui jumlah dosen yang terlibat
        $query_jd= "SELECT id_research,
        COUNT(id_research) as idPenelitian,
        COUNT(IF(nidn_member1!='', nidn_member1, NULL)) as dosen1,
                COUNT(IF(nidn_member2!='', nidn_member2, NULL)) as dosen2,
                COUNT(IF(nidn_member3!='', nidn_member3, NULL)) as dosen3,
                COUNT(IF(nidn_member4!='', nidn_member4, NULL)) as dosen4,
                COUNT(IF(nidn_member5!='', nidn_member5, NULL)) as dosen5
        FROM research
        Where id_research=$id_cari"; 

        $sql_jd=mysqli_query($conn,$query_jd);
        $hasil_jd=mysqli_fetch_assoc($sql_jd);
        $totaldosen=$hasil_jd['dosen1']+$hasil_jd['dosen2']+$hasil_jd['dosen3']+$hasil_jd['dosen4']+$hasil_jd['dosen5'];
        ?>
            <tr>
                <td class="font-weight-bold">Anggota Peneliti</td>
                <td>:</td>
                <td>Dosen  <?php echo $totaldosen   ?> orang </td>
            </tr>
            <?php 
            // untuk mengetahui jumlah mahasiswa yang terlibat
                $query_jm= "SELECT id_research,
                COUNT(id_research) as idPenelitian,
                COUNT(IF(nim_mhs_1!='', nim_mhs_1, NULL)) as mhs1,
                COUNT(IF(nim_mhs_2!='', nim_mhs_2, NULL)) as mhs2,
                COUNT(IF(nim_mhs_3!='', nim_mhs_3, NULL)) as mhs3
                FROM research
                Where id_research=$id_cari"; 

                $sql_jm=mysqli_query($conn,$query_jm);
                $hasil_jm=mysqli_fetch_assoc($sql_jm);
                $totalmhs=$hasil_jm['mhs1']+$hasil_jm['mhs2']+$hasil_jm['mhs3'];
            ?>
            <tr>
                <td></td>
                <td></td>
                <td>Mahasiswa <?php echo $totalmhs; ?> orang </td>
            </tr>
        <tr>
            <td>Tahun Pelaksanaan</td>
            <td>:</td>
            <td><?php echo $hasil['thn_pertama_usulan']; ?></td>
        </tr>
        <tr>
            <td>Lama Penelitian</td>
            <td>:</td>
            <td><?php echo $hasil['lama_kegiatan']; ?>  Tahun</td>
        </tr>

        <tr>
                <td class="font-weight-bold">Biaya Penelitian</td>
            </tr>
            <tr>
                <td>Dana Usulan</td>
                <td>:</td>
                <td>Rp. <?php echo $hasil['dana_usulan']; ?></td>
            </tr>
     <form method="POST" action="" enctype="multipart/form-data">
            <tr>
                <td>Direkomendasikan</td>
                <td>:</td>
                <td> <input type="text" class="form-control" id="dana_disetujui" placeholder="" name="dana_disetujui" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                </td>
            </tr>
        </tbody>
        </table>

        <table class="table table-bordered table-hover table-sm">
            <thead class="text-center">
                <tr>
                <th>No</th>
                <th>Aspek Penilaian</th>
                <th> Kriteria Penilaian & Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Urgensi Penelitian
                        <h6 class="mt-3 h6"><small><mark>(Bobot Nilai = 20) ; (Max. Total Nilai = 80) </mark></small></h6>
                    </td>
                   
                    <td>
                    <select name="urgensi" id='urgensi' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='4'> Penelitian yang diusulkan memiliki nilai urgensi (4)</option>
                            <option value='3'>Penelitian yang diusulkan cukup memiliki nilai urgensi (3) </option>
                            <option value='2'> Penelitian yang diusulkan kurang memiliki nilai urgensi (2)</option>
                            <option value='1'> Penelitian yang diusulkan tidak memiliki nilai urgensi (1)</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    
                </tr>
                <tr>
                    <td>2</td>
                    <td>Orisinalitas dan Novelty Penelitian
                    <h6 class="mt-3 h6"><small><mark>(Bobot Nilai = 20) ; (Max. Total Nilai = 80)</mark>
                    </small></h6>
                    </td>
                   
                    <td>
                    <select name="novelty" id='novelty' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='4'> Proposal memiliki nilai orisinal dan kebaruan (novelty)  (4)</option>
                            <option value='3'> Proposal memiliki nilai orisinal dan cukup kebaruan (modifikasi) (3) </option>
                            <option value='2'> Penelitian serupa pernah dilakukan sebelumnya, namun hanya variasi minor (replikasi) (2)</option>
                            <option value='1'> Penelitian yang sama pernah dilakukan sebelumnya (1) </option>
                        </select>
                    </td>
                </tr>
                

                <tr>
                    <td>3</td>
                    <td>Kaitan Penelitian dengan PIP dan RIP Penelitian Unpatti
                    <h6 class="mt-3 h6"><small><mark>(Bobot Nilai = 15) ; (Max. Total Nilai = 60)</mark>
                    </small></h6>
                    </td>
                   
                    <td>
                    <select name="kaitan" id='kaitan' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='4'> Proposal memiliki kaitan dengan PIP dan RIP Penelitian Unpatti (4)</option>
                            <option value='3'> Proposal cukup memiliki kaitan dengan PIP dan RIP Penelitian Unpatti (3) </option>
                            <option value='2'> Proposal kurang memiliki kaitan dengan PIP dan RIP Penelitian Unpatti (2)</option>
                            <option value='1'> Proposal tidak memiliki kaitan dengan PIP dan RIP Penelitian Unpatti(1) </option>
                        </select>
                    </td>
                </tr>

                
                <tr>
                    <td>4</td>
                    <td>Peta Jalan Penelitian
                    <h6 class="mt-3 h6"><small><mark>(Bobot Nilai = 15) ; (Max. Total Nilai = 60)</mark>
                    </small></h6>
                    </td>
                   
                    <td>
                    <select name="peta" id='peta' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='4'> Peneliti memiliki peta jalan penelitian yang terkait dengan  penelitian yang diusulkan (4)</option>
                            <option value='3'> Peneliti memiliki peta jalan penelitian yang cukup terkait dengan penelitian yang diusulkan (3) </option>
                            <option value='2'> Peneliti memiliki peta jalan penelitian yang kurang terkait dengan penelitian yang diusulkan (2)</option>
                            <option value='1'> Peneliti tidak memiliki peta jalan penelitian (1) </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>5</td>
                    <td>Rekam Jejak Tim Peneliti
                    <h6 class="mt-3 h6"><small><mark>(Bobot Nilai = 20) ; (Max. Total Nilai = 80)</mark>
                    </small></h6>
                    </td>
                   
                    <td>
                    <select name="jejak" id='jejak' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='4'> Peneliti memiliki rekam jejak penelitian dan terkait dengan penelitian yang diusulkan (memiliki karya internasional bereputasi yang relevan) (4)</option>
                            <option value='3'> Peneliti memiliki rekam jejak penelitian, namun  cukup terkait dengan penelitian yang diusulkan (3) </option>
                            <option value='2'> Peneliti memiliki rekam jejak penelitian, namun  kurang terkait dengan penelitian yang diusulkan  (2)</option>
                            <option value='1'> Peneliti memiliki rekam jejak penelitian, namun   tidak terkait dengan penelitian yang diusulkan (1) </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>6</td>
                    <td>Mutu proposal
                    <h6 class="mt-3 h6"><small><mark>(Bobot Nilai = 10) ; (Max. Total Nilai = 40)</mark>
                    </small></h6>
                    </td>
                   
                    <td>
                    <select name="mutu" id='mutu' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='4'>Proposal disusun sesuai panduan dan pustaka primer lebih dari 80%  artikel internasional 10 tahun terakhir (4)</option>
                            <option value='3'> Proposal disusun kurang sesuai panduan, namun  pustaka primer lebih dari 80%  artikel internasional 10 tahun terakhir (3) </option>
                            <option value='2'> Proposal disusun sesuai panduan, namun pustaka kurang dari 80% artikel internasional 10 tahun terakhir (2)</option>
                            <option value='1'> Proposal disusun tidak sesuai panduan dan pustaka kurang dari 80% artikel internasional 10 tahun terakhir (1) </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>7</td>
                    <td>Rasionalitas Alokasi Dana
                    <h6 class="mt-3 h6"><small><mark>(Bobot Nilai = 10) ; (Max. Total Nilai = 40)</mark>
                    </small></h6>
                    </td>
                   
                    <td>
                    <select name="dana" id='dana' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='4'> Proposal memiliki alokasi rencana anggaran biaya penelitian rasional  (4)</option>
                            <option value='3'> Proposal memiliki alokasi rencana anggaran biaya penelitian cukup rasional (3) </option>
                            <option value='2'> Proposal memiliki alokasi rencana anggaran biaya penelitian kurang rasional (2)</option>
                            <option value='1'> Proposal memiliki alokasi rencana anggaran biaya penelitian tidak rasional (1) </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>8</td>
                    <td>Potensi Target Luaran
                    <h6 class="mt-3 h6"><small><mark>(Bobot Nilai = 15) ; (Max. Total Nilai = 60)</mark>
                    </small></h6>
                    </td>
                   
                    <td>
                    <select name="luaran" id='luaran' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='4'> Proposal memiliki target luaran penelitian yang berpotensi untuk dicapai  (4)</option>
                            <option value='3'> Proposal memiliki target luaran penelitian yang cukup berpotensi untuk dicapai (3) </option>
                            <option value='2'> Proposal memiliki target luaran penelitian yang kurang berpotensi untuk dicapai (2)</option>
                            <option value='1'> Proposal tidak memiliki target luaran penelitian (1) </option>
                        </select>
                    </td>
                </tr>

                
            </tbody>
        </table>


        <div class="card-body" style="color:black">
        <table class="table table-bordered table-sm table-borderless table-hover">
        <tr>
            <td class="font-weight-bold">Komentar Penilaian</td>
            <td>
                <textarea class="form-control" name="komentar"></textarea>
            </td>
        </tr>

        <tr>
        <td>Status Proposal Penelitian</td>
            <td>
                <select name="status" id='status' class="form-control" required >
                    <option value=''>-- Pilih Status --</option>
                    <?php 
                $querySta="SELECT * From status WHERE id_status=4 OR id_status=5";
                $sqlSta= mysqli_query($conn,$querySta);
                while ($hasilSta = mysqli_fetch_array($sqlSta))
                {
                echo "<option value='".$hasilSta['id_status']."' >" .$hasilSta['status_name']. "</option>";
                }
                ?>
                </select>
            </td>
            </tr>

        </table>
        </div>

             <div class="panel-footer mt-1 text-center">
             <button type="submit" name='simpan' class="btn btn-success ml-5 mr-5 mt-3 btn-center">Simpan</button>  
            <a href="list_usulan_riset_R.php" class="btn btn-danger mt-3">Batal</a> 
        </div>

    </form>

    <?php
    if(isset($_POST['simpan'])){
        $dana_disetujui=$_POST['dana_disetujui'];
        $id_login=$_SESSION['id_login'];
        $username=$_SESSION['username_admin'];
        $id_cari=$_GET['id'];
        $urgensi=$_POST['urgensi'];
        $novelty=$_POST['novelty'];
        $kaitan=$_POST['kaitan'];
        $peta=$_POST['peta'];
        $jejak=$_POST['jejak'];
        $mutu=$_POST['mutu'];
        $dana=$_POST['dana'];
        $luaran=$_POST['luaran'];
        $komentar=$_POST['komentar'];
        $status=$_POST['status'];

        //  total subnilai
            $totalUrgensi=$urgensi*20;
            $totalNovelty=$novelty*20;
            $totalKaitan=$kaitan*15;
            $totalPeta=$peta*15;
            $totalJejak=$jejak*20;
            $totalMutu=$mutu*10;
            $totalDana=$dana*10;
            $totalLuaran=$luaran*15;

        //totalnilai akhir
            $total_nilai=$totalUrgensi+$totalNovelty+$totalKaitan+$totalPeta+$totalJejak+$totalMutu+$totalDana+$totalLuaran;


        // End sub total nilai dan nilai akhir

        $queri_adm="INSERT INTO research_nilai_adm(id_login,id_research, urgensi, novelty, kaitan, peta, jejak, mutu, dana, luaran, total_nilai, komentar) VALUES ('$id_login','$id_cari','$urgensi','$novelty','$kaitan','$peta','$jejak','$mutu','$dana','$luaran','$total_nilai','$komentar')";

        $sql_adm=mysqli_query($conn,$queri_adm);
        if($sql_adm){
            echo "<script> alert ('Berhasil melakukan penilaian administrasi dan substansi');window.location='list_usulan_riset_R.php';</script>"; 
        }else{
            echo "<script> alert ('Ada Kesalahan saat proses penyimpanan');window.location='list_usulan_riset_R.php';</script>";
        }

        // ubah dana_rekomendasi dan status yang direkomendasi
        $ubah=mysqli_query($conn,"UPDATE research SET dana_disetujui='$dana_disetujui', status='$status' WHERE id_research=$id_cari");
        // End ubah dana yang direkomendasi

    }
    ?>
    </div>
    </div>
    </div>

<!-- endContainerFluid -->
<!-- </div> -->
<?php 
}
?>
<!-- end Function View -->

<?php
// function view_old
function view_old($conn){
?>

<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Lihat Data</a></li>
    <li class="breadcrumb-item"><a href="research_adm_nilai.php">Proposal Penelitian</a></li>
  </ul>
</div>

<div class="container-fluid">
<div class="card">
  <div class="card-header text-center">Daftar Pengajuan Proposal Penelitian</div>
  <div class="card-body table-responsive">        
  <table id="example1" class="table table-bordered table-hover">
    <thead class="bg-dark text-white text-center">
      <tr>
      <th>No.</th>
      <th>NIDN</th>
      <th>Nama</th>
      <th>Prodi</th>
      <th>Judul</th>
      <th>File Proposal</th>
      <th>Tahun</th>
      <th>Status</th>
      <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php                          
      $no=0;
      $query="SELECT research.*, reg.nip, mstr_prodi.prodi, mstr_fakultas.fakultas_name, status.id_status, status.status_name
      FROM research
      INNER JOIN reg ON reg.nidn=research.nidn_ketua
      INNER JOIN mstr_prodi ON mstr_prodi.id_prodi=reg.prodi
      INNER JOIN mstr_fakultas ON mstr_fakultas.id_fakultas=reg.fakultas
      INNER JOIN status ON status.id_status=research.status
      ORDER BY id_research DESC";

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
        <td>
        <a href="luk.php?f=<?php echo $hasil['file_penelitian']; ?>" target='blank'><?php echo $hasil['file_penelitian']; ?> </a>   
    
        </td>
        <td><?php echo $hasil['thn_pertama_usulan']; ?></td>
        <td>
         <?php echo $hasil['status_name']; ?></td>
         </td>
        <td>

        <!-- <a href="#" class="btn btn-outline-info btn-sm" role="button">Detail</a> <br> <br> -->
         <?php 
            $id_N=$hasil['id_research'];

            $queryNilaiAdm="SELECT * FROM research_nilai_adm WHERE id_research=$id_N";
            $sqlNilaiAdm=mysqli_query($conn,$queryNilaiAdm);
            $cekNilaiAdm=mysqli_num_rows($sqlNilaiAdm);

            if(!$cekNilaiAdm ){
               ?>
                <a href='research_adm_nilai.php?aksi=penilaian&id=<?php echo $hasil['id_research']; ?>' class="btn btn-outline-danger btn-sm" role="button" >Beri Penilaian </a> 
            <?php
            } else {
                ?>
                <a href="printNilaiAdm.php?id=<?php echo $hasil['id_research']; ?>" class="btn btn-outline-info btn-sm" role="button" target="_blank">Lihat Nilai</a> 

            <?php    
            }
            ?>
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
<!-- endFunctionView_old -->

<?php
include '../footer.php';
?>
