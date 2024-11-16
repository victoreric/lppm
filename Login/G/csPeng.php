<?php
// cek status
include 'menu.php'; 
include '../link.php';
$nidn=$_SESSION['nidn_login'];
?>

<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Status Pengajuan</a></li>
    <li class="breadcrumb-item"><a href="csPeng.php">Proposal Pengabdian</a></li>
  </ul>
</div>

<div class="container table-responsive">
  <h4 class='text-center'>Daftar Pengajuan Proposal Pengabdian</h4>           
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
      <th>No.</th>
      <th>Tahun Pengusulan</th>
      <th>NIDN</th>
      <th>Nama</th>
      <th>Judul</th>
      <th>Dana Disetujui</th>
      <th>File Proposal</th>
      <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php                          
      $no=0;
      $query="SELECT * FROM services
       WHERE nidn_ketua=$nidn
       ORDER BY id_services DESC";

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
        <td><?php echo $hasil['thn_usulan_kegiatan']; ?></td>
        <td><?php echo $hasil['nidn_ketua']; ?></td>
        <td><?php echo $hasil['nama_ketua']; ?></td>
        <td><?php echo $hasil['judul']; ?></td>
        <td><?php echo $hasil['dana_disetujui']; ?></td>
        <td> <a href="sh_filePeng.php?f=<?php echo $hasil['file_pengabdian']; ?>" target='blank'><?php echo $hasil['file_pengabdian']?>  </td>
        
        
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

<?php include '../footer.php'; ?>