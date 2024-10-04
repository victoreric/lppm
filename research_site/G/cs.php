<?php
// cek status
include 'menu.php'; 
include '../link.php';
$nim=$_SESSION['nim_suket'];
?>

<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Status Permohonan</a></li>
    <li class="breadcrumb-item"><a href="cs.php">Cek Status</a></li>
  </ul>
</div>

<div class="container table-responsive">
  <h4 class='text-center'>Daftar Permohonan Surat Keterangan</h4>           
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
      <th>No.</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Jenis Surat</th>
      <th>Tujuan</th>
      <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php                          
      $no=0;
      $query="SELECT surat.*, jenis_suket.*
       FROM surat
       INNER JOIN jenis_suket ON jenis_suket.id_jenis=surat.jenis 
       WHERE nim=$nim
       ORDER BY id_surat DESC";

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
        <td><?php echo $hasil['nim']; ?></td>
        <td><?php echo $hasil['nama']; ?></td>
        <td><?php echo $hasil['jenis']; ?></td>
        <td><?php echo $hasil['tujuan']; ?></td>
        
          <?php 
            $ttd=$hasil['ttd'];
            if($ttd!='ttd.png'){ ?>
              <td class='bg-danger'>
                Sedang diproses
              </td>
            <?php  } 
              else { 
            ?>
            <td class='bg-success'>
              <?php 
              $id=$hasil['id_surat'];
              if($hasil['id_jenis']=='1'){ 
                        echo "<a href='../A/c.php?id=$id' class='btn btn-success' name='' target='blank'>Cetak Surat</a> ";
                    }  
                    elseif($hasil['id_jenis']=='2'){
                        echo "<a href='../A/c2.php?id=$id' class='btn btn-success' name='' target='blank'>Cetak Surat</a> ";
                    }
                    else{
                        echo "<a href='../A/c3.php?id=$id' class='btn btn-success mr-5' name='' target='blank'>Cetak Surat</a> ";
                    }
                ?>
              <!-- <a href="../A/c.php?id=<?php echo $hasil['id_surat'];?>" target="blank">Cetak Surat </a> -->
            </td>
            <?php }?>
        
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>

<?php include '../footer.php'; ?>