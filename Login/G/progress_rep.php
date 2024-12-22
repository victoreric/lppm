
<?php
include 'menu.php';
include '../link.php';
?>

<!-- Main content starts -->
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="cspen.php">Proposal</a></li>
    <li class="breadcrumb-item"><a href="#.php">Laporan Kemajuan</a></li>
  </ul>
</div>

<div class="container-fluid mb-5">
   
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Laporan Kemajuan</h6>
        </div>
        <div class="card-body" style="color:black">
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>No.</th>
                <th>Tahun Pengusulan</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Dana Diusulkan</th>
                <th>Dana Disetujui</th>
                <th>File Laporan Kemajuan</th>
                <th>Aksi</th>
                <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php    
                    $nidn=$_SESSION['nidn_login'];                     
                    $no=0;
                    $query="SELECT research.*, status.id_status, status.status_name
                    FROM research
                    INNER JOIN status ON status.id_status=research.status
                    WHERE nidn_ketua=$nidn AND status=8
                    ORDER BY id_research DESC";

                    $sql=mysqli_query($conn,$query);
                    $cek=mysqli_num_rows($sql);
                    if(!$cek){
                        echo "tidak ada data";
                    }
                    while($hasil=mysqli_fetch_array($sql)){
                        $id_research=$hasil['id_research'];
                    // echo $hasil['status_name'];
                $no++;
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $hasil['thn_usulan_kegiatan']; ?></td>
                    <td><?php echo $hasil['nidn_ketua']; ?></td>
                    <td><?php echo $hasil['nama_ketua']; ?></td>
                    <td><?php echo $hasil['judul']; ?></td>
                    <td><?php echo $hasil['dana_usulan']; ?></td>
                    <td><?php echo $hasil['dana_disetujui']; ?></td>
                    <td> 
                        <?php
                       $fileLapMaju=$hasil['file_lap_maju'];
                        
                        if($fileLapMaju==""){
                                echo "tambah";
                        }
                        else {
                        ?>
                        <a href="luk.php?f=<?php echo $hasil['file_lap_maju']; ?>" target='blank'><?php echo $hasil['file_lap_maju']?>  

                        <?php
                        }
                        ?>             
                    </td>

                    <td> 
                        <?php 
                        $status=$hasil['status'];
                        if($status=='8'){ 
                        ?>
                            <!-- <a href='csPen.php?aksi=update&id=<?php echo $id_research; ?>'>Ubah </a> -->
                            <a href="csPen.php?aksi=update&id=<?php echo $id_research; ?>" class="btn btn-warning" role="button">Ubah</a>
                        <?php
                        }
                        else {
                        ?>
                            <!-- <a href='csPen.php?aksi=lihat&id_cari=<?php echo $id_research; ?>'>Lihat </a>  -->
                            <a href="csPen.php?aksi=lihat&id_cari=<?php echo $id_research; ?>" class="btn btn-info" role="button">Lihat</a>
                        <?php
                        }
                        ?>            
                </td>
                <td>
                        <?php echo $hasil['status_name']; ?>
                    </td>
                </tr>
                <?php }?>
                </tbody>
            </table>

        </div>
        </div>
    </div>

</div>


<?php
include '../footer.php';
?>
