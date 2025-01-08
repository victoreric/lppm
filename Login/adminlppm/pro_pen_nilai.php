
<?php
include 'menuALppm.php';
include '../link.php';

// Program Utama
if (isset($_GET['aksi'])){
    switch($_GET['aksi']){
        case "penilaian":
          penilaian($conn);
          break;
        default:
            view($conn);
        }
  } else {
    view($conn);
  }
  

// function penilaian
function penilaian($conn){
?>
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Proposal Penelitian</a></li>
    <li class="breadcrumb-item"><a href="#">Kelengkapan Proposal</a></li>
  </ul>
</div>
<!-- Main content starts -->
<div class="container-fluid mb-5">
  
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Penilaian Kelengkapan Proposal Penelitian</h6>
        </div>
        <div class="card-body" style="color:black">
            <?php 
                $id_cari=$_GET['id'];
                $query="SELECT id_research, judul, nama_ketua FROM research WHERE id_research=$id_cari";
                $sql=mysqli_query($conn,$query);
                $res=mysqli_fetch_assoc($sql);
            ?>
            Judul : <?php echo $res['judul'] ; ?>
            <br>
            Ketua : <?php echo $res['nama_ketua'] ; ?>
            <br>
            <br>

        <form method="POST" class="form-inline" action="" enctype="multipart/form-data">
            <div class="panel-body table-responsive">
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th>ASPEK PENILAIAN </th>
                    <th>KELENGKAPAN </th>
                </tr>
                </thead>
                <tbody>
               
                <tr>
                    <td>Cover Proposal </td>
                    <td>
                        <select name="cover" id='cover' class="form-control" required >
                            <option value=''>-- Pilih nilai --</option>
                            <option> Lengkap </option>
                            <option> Belum Lengkap</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Lembaran Pengesahan  </td>
                    <td>
                        <select name="pengesahan" id='pengesahan' class="form-control" required >
                            <option value=''>-- Pilih nilai --</option>
                            <option> Lengkap </option>
                            <option> Belum Lengkap</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Penyusunan Proposal sesuai aturan</td>
                    <td>
                        <select name="susunan" id='susunan' class="form-control" required >
                            <option value=''>-- Pilih nilai --</option>
                            <option> Lengkap </option>
                            <option> Belum Lengkap</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kelengkapan lainnya </td>
                    <td>
                        <select name="lain" id='lain' class="form-control" required >
                            <option value=''>-- Pilih nilai --</option>
                            <option> Lengkap </option>
                            <option> Belum Lengkap</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Komentar</td>
                    <td>
                        <textarea name='komentar' id='komentar' class="form-control" rows="5" cols='30' required></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td>Status Proposal Penelitian</td>
                    <td>
                        <select name="status" id='status' class="form-control" required >
                            <option value=''>-- Pilih Status --</option>
                            <?php 
                                    $querySta="SELECT * From status WHERE id_status=2 OR id_status=3";
                                    $sqlSta= mysqli_query($conn,$querySta);
                                    while ($hasilSta = mysqli_fetch_array($sqlSta))
                                    {
                                    echo "<option value='".$hasilSta['id_status']."' >" .$hasilSta['status_name']. "</option>";
                                    }
                                ?>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
          
            <div class="panel-footer text-center">
                <hr>
                <button type="submit" name='simpan' class="btn btn-success mr-5">Simpan</button>
                <a href="pro_pen_nilai.php" class="btn btn-danger">Batal</a>
            </div>
        </form>

        </div>
    </div>

    <?php
    if(isset($_POST['simpan'])){
        $id_research=$id_cari;
        $cover=$_POST['cover'];
        $pengesahan=$_POST['pengesahan'];
        $lain=$_POST['lain'];
        $komentar=$_POST['komentar'];
        $status=$_POST['status'];


    //    kondisi untuk insert atau update
            $queryNilailook="SELECT * FROM proposal_pen WHERE id_research=$id_research";
            $sqlNilailook=mysqli_query($conn,$queryNilailook);
            $resNilailook=mysqli_fetch_assoc($sqlNilailook);
            $cekNilailook=mysqli_num_rows($sqlNilailook);

        if(!$cekNilailook){
        $query_lngp="INSERT INTO proposal_pen(id_research, cover, pengesahan, lain, komentar) VALUES ('$id_research','$cover','$pengesahan','$lain','$komentar')";
        $sql_lngp=mysqli_query($conn,$query_lngp);
        }
        else {
            $query_lngp="UPDATE proposal_pen SET cover='$cover',pengesahan='$pengesahan',lain='$lain',komentar='$komentar' WHERE id_research=$id_research";
            $sql_lngp=mysqli_query($conn,$query_lngp);
        }

        if($sql_lngp){
            // triger untuk mengubah status pada table research
            mysqli_query($conn,"UPDATE research SET status=$status WHERE id_research=$id_cari");
            // End triger untuk mengubah status pada table research
            echo "<script> alert ('Berhasil melakukan penilaian'); window.location='pro_pen_nilai.php'; </script>";
        }else{
            echo "<script> alert ('Terjadi kesalahan penyimpanan data'); window.location='pro_pen_nilai.php'; </script>" ;
        }
    }
  
    ?>
<!-- endContainerFluid -->
</div>
<?php 
}
?>

<?php
// function view
function view($conn){
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
      <th>Komentar</th>
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
           <?php
            $id_N_pro=$hasil['id_research'];

            $queryNilaipro="SELECT * FROM proposal_pen WHERE id_research=$id_N_pro";
            $sqlNilaipro=mysqli_query($conn,$queryNilaipro);
            $resNilaipro=mysqli_fetch_assoc($sqlNilaipro);
            $cekNilaipro=mysqli_num_rows($sqlNilaipro);

            echo $resNilaipro['komentar'];
           ?>
        </td>


        <td>
        <!-- <a href="#" class="btn btn-outline-info btn-sm" role="button">Detail</a> <br> <br> -->
         <?php 
            if(!$cekNilaipro OR $hasil['status']==3 ){
            ?>
                <a href='pro_pen_nilai.php?aksi=penilaian&id=<?php echo $hasil['id_research']; ?>' class="btn btn-outline-danger btn-sm" role="button" >Beri Penilaian </a> 
            <?php
            } else {
                ?>
                <a href="pro_pen_nilai_print.php?id=<?php echo $hasil['id_research']; ?>" class="btn btn-outline-info btn-sm" role="button">Lihat</a> 

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
<!-- endFunctionView -->

<?php
include '../footer.php';
?>
