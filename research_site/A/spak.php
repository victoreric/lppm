<?php  include 'menuA.php'; 
include '../link.php'?>
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Lihat Data</a></li>
    <li class="breadcrumb-item"><a href="spak.php">Surat Permohonan</a></li>
  </ul>
</div>

<div class="container-fluid">
<div class="card">
  <div class="card-header text-center">Daftar Permintaan Surat Keterangan</div>
  <div class="card-body table-responsive">        
  <table id="example1" class="table table-bordered table-hover">
    <thead class="bg-dark text-white">
      <tr>
      <th>No.</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Prodi</th>
      <th>Jenis Surat Keterangan</th>
      <th>Keperluan</th>
      <th>Aksi</th>
      <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php                          
      $no=0;
      $query="SELECT surat.*, prodi.prodi, jenis_suket.jenis
      FROM surat 
      INNER JOIN prodi ON prodi.id_prodi=surat.prodi
      INNER JOIN jenis_suket ON jenis_suket.id_jenis=surat.jenis 
      ORDER BY id_surat DESC ";
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
        <td><?php echo $hasil['prodi']; ?></td>
        <td><?php echo $hasil['jenis']; ?></td>
        <td><?php echo $hasil['tujuan']; ?></td>
        <td><a href="spak_d.php?id=<?php echo $hasil['id_surat'];?>">Lihat Surat </a> </td>
            <?php 
              $ttd=$hasil['ttd'];
              if($ttd!='ttd.png'){ ?>
                <td class='bg-danger text-white'>Belum ditandatangani</td>

              <?php
              }else{?>
                <td class='bg-success'><h6>Sudah ditandatangani</h6></td>
              <?php } ?>
      </tr>
      <?php }?>
    </tbody>
  </table>
  </div>
</div>
</div>

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