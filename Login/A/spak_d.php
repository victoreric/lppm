<?php  include 'menuA.php'; 
include '../link.php';
$id=$_GET['id'];
?>

<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Lihat Data</a></li>
    <li class="breadcrumb-item"><a href="spak.php">Surat Permohonan</a></li>
    <li class="breadcrumb-item"><a href="#">Detail Permohonan</a></li>
  </ul>
</div>


<div class="container">
<div class="card">
  <div class="card-header text-center bg-primary text-white">Permohonan Surat Keterangan</div>
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

<p align="right"> <a href="spak_edit.php?id=<?php echo $hasil['id_surat'];?>">Edit Surat </a> </p>
    
    <form method="POST" action="" enctype="multipart/form-data">
     <table class="table table-bordered table-hover">
         <tr>
             <td>NIM</td>
             <td><?php echo $hasil['nim']?></td>
         </tr>
         <tr>
             <td>Nama</td>
             <td><?php echo $hasil['nama']?></td>
         </tr>
         <tr>
             <td>Program Studi</td>
             <td><?php echo $hasil['prodi']?></td>
         </tr>
         <tr>
             <td>Semester</td>
             <td><?php echo $hasil['semester']?></td>
         </tr>
         <tr>
             <td>Tahun Akademik</td>
             <td><?php echo $hasil['thnakd']?></td>
         </tr>

         <tr>
             <td>Tempat, Tanggal Lahir</td>
                <?php
                    $nim=$hasil['nim'];
                    $q="SELECT surat.nim, reg.*
                    FROM surat 
                    INNER JOIN reg ON reg.nim=surat.nim
                    WHERE surat.nim='$nim'";
                    $sql2=mysqli_query($conn,$q);
                    $result=mysqli_fetch_assoc($sql2);
                    
                    $lahir=$result['tglahir'];
                    $tglhr=tanggal_indo($lahir);
                ?>
             <td><?php echo $result['tmplahir'].', '.$tglhr?></td>
         </tr>

         <tr>
             <td>Nama Orang Tua</td>
             <td><?php echo $hasil['ortu']?></td>
         </tr>
         <tr>
             <td>Pekerjaan Orang Tua</td>
             <td><?php echo $hasil['pekerjaan']?></td>
         </tr>
         <tr>
             <td>NIP Orang Tua</td>
             <td><?php echo $hasil['nip']?></td>
         </tr>
         <tr>
             <td>Pangkat Orang Tua</td>
             <td><?php echo $hasil['pangkat']?></td>
         </tr>
         <tr>
             <td>Jenis Surat</td>
             <td><?php echo $hasil['jenis']?></td>
         </tr>
         <tr>
             <td>Tujuan Surat</td>
             <td><?php echo $hasil['tujuan']?></td>
         </tr>
         <tr>
             <td>Fotocopy UKT</td>
             <td><a href="luk.php?f=<?php echo $hasil['ukt']; ?>" target='blank'><?php echo $hasil['ukt']?> </td>
         </tr>
         <tr>
             <td>Fotocopy KRS</td>
             <td><a href="luk.php?f=<?php echo $hasil['krs']; ?>" target='blank'><?php echo $hasil['krs']?> </td>
         </tr>
         <tr>
             <td>Fotocopy DNS</td>
             <td><a href="luk.php?f=<?php echo $hasil['dns']; ?>" target='blank'><?php echo $hasil['dns']?> </td>
         </tr>
         <tr>
             <td>Fotocopy Kartu Keluarga</td>
             <td><a href="luk.php?f=<?php echo $hasil['kk']; ?>" target='blank'><?php echo $hasil['kk']?> </td>
         </tr>
         <tr>
             <td>Fotocopy SK Pangkat Orang Tua</td>
             <td><a href="luk.php?f=<?php echo $hasil['skortu']; ?>" target='blank'><?php echo $hasil['skortu']?> </td>
         </tr>
     </table>
     <div class='p-2 bg-warning'>   
        
        <?php   
        if($hasil['ttd']!='ttd.png'){ 
        ?>
        <div class="form-group">
            <label for="nosurat" class="form-control-label">Nomor Surat:</label>
            <input type="text" class="form-control" id="nosurat" name="nosurat" required>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="ttd.png" name="ttd" required>Tanda tangan Pejabat Fakultas 
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="cap.png" name="cap" required>Cap Fakultas
            </label>
        </div>
        <div class="form-check-inline">
            <button type="submit" name='simpan' class="btn btn-success ml-5 mr-5 mt-3">Simpan</button>  

            <a href="spak.php" class="btn btn-danger mt-3">Batal</a> 

            
        </div>
    </div> 
        <?php } 
            else { 
            ?>        
                <div class='p-2 bg-warning'> Surat keterangan telah diberi nomor, ditandatangani dan diberi cap fakultas. 
                </div>                
                <div class="panel-footer mt-2 text-center">
                    <?php if($hasil['id_jenis']=='1'){ 
                        echo "<a href='c.php?id=$id' class='btn btn-success mr-3' name='' target='blank'>Cetak Surat Keterangan</a> ";
                    }  
                    elseif($hasil['id_jenis']=='2'){
                        echo "<a href='c2.php?id=$id' class='btn btn-success mr-3' name='' target='blank'>Cetak Surat Keterangan</a> ";
                    }
                    else{
                        echo "<a href='c3.php?id=$id' class='btn btn-success mr-3' name='' target='blank'>Cetak Surat Keterangan</a> ";
                    }
                    ?>
                    <a href="spak.php" class="mt-1 btn btn-danger">Kembali</a>

                </div>
            <?php }}?> 
    </form>

    <?php     
    if(isset($_POST['simpan'])){
        $ttd=$_POST['ttd'];
        $cap=$_POST['cap'];
        $nosurat=$_POST['nosurat'];
        $tanggal=date('Y-m-d H:i:s');
    echo $cap;
        $queri="UPDATE surat SET ttd='$ttd',cap='$cap', date_signature='$tanggal', nomor_surat='$nosurat' WHERE id_surat='$id' ";
        $sql=mysqli_query($conn,$queri);

        if($sql){
            echo "<script> alert ('Berhasil menambahkan Nomor surat,  Tanda tangan dan Cap pada Surat Keterangan');window.location='spak_d.php?id=$id';</script>"; 
        }else{
            echo "<script> alert ('Ada Kesalahan saat proses penyimpanan');window.location='spak.php';</script>";
        }
    }
    ?>   
    </div>
</div>
</div>




<?php include '../footer.php'; ?>