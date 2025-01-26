<?php
include 'menuReviewer.php';
include '../link.php';
?>

<!-- Main content starts -->

<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Penilaian Laporan Kemajuan</a></li>
  </ul>
</div>
<div class="container-fluid mb-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Daftar Proposal Penelitian + Laporan Kemajuan</h5>
        </div>
        <div class="card-body table-responsive" style="color:black">
        <table id="example1" class="table table-bordered table-hover">
            <thead class="bg-dark text-white">
            <tr>
            <th>No.</th>
            <th>NIDN</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Judul</th>
            <th>File Proposal</th>
            <th>File Laporan Kemajuan</th>
            <th>Tahun</th>
            <th>Status</th>
            <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php  
            // mengambil session nama reviewer
            $reviewer=$_SESSION['nama_admin'];
             // End mengambil session nama reviewer

            $no=0;
            $query="SELECT research.*, reg.nip, mstr_prodi.*, mstr_fakultas.*, status.id_status, status.status_name
            FROM research
            INNER JOIN reg ON reg.nidn=research.nidn_ketua
            INNER JOIN mstr_prodi ON mstr_prodi.id_prodi=reg.prodi
            INNER JOIN mstr_fakultas ON mstr_fakultas.id_fakultas=reg.fakultas
            INNER JOIN status ON status.id_status=research.status
            WHERE status!=1 AND status!=3 AND status!=5
            ORDER BY thn_usulan_kegiatan DESC";
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
                    <a href="../adminlppm/luk.php?f=<?php echo $hasil['file_penelitian']; ?>" target='blank'><?php echo $hasil['file_penelitian']; ?> </a>   
                </td>
                <td>
                    <?php
                        $fileLapMaju=$hasil['file_lap_maju'];
                        
                        if($fileLapMaju==""){
                                echo "-";
                        }
                        else {
                        ?>
                        <a href="../adminlppm/luk.php?f=<?php echo $hasil['file_lap_maju']; ?>" target='blank'><?php echo $hasil['file_lap_maju']?>  

                        <?php
                        }
                    ?>  
                </td>
                <td>
                    <?php echo $hasil['thn_pertama_usulan']; ?>
                </td>
                <td>
                    <?php echo $hasil['status_name']; ?>
                </td>
                
                <?php 
                $id_research=$hasil['id_research'];
                // echo $id_research;

                $queri_aksi="SELECT * FROM research_substansi WHERE id_research=$id_research";
                $sql_aksi=mysqli_query($conn,$queri_aksi);
                $res_aksi=mysqli_fetch_assoc($sql_aksi);
                if($res_aksi!=0){ 
                ?>
                    <td>
                     <a href='print_nilai_subs.php?id=<?php echo $hasil['id_research']; ?>' class="btn btn-success btn-sm font-weight-bolder" role="button" role="button" target="_blank">Lihat Nilai </a>
                </td>
                <?php
                } else {
                ?>
                   <td>  
                    <a href='penilaian_subs.php?id=<?php echo $hasil['id_research']; ?>' class="btn btn-warning btn-sm font-weight-bolder" role="button" role="button">Beri penilaian monitoring & evaluasi penelitian </a>
                   </td>
                <?php    
                }
                ?>
                
                <?php
                }
                ?>
                </tr>                                       
            </tbody>
        </table>
        </div>
    </div>

</div>

<?php
include '../footer.php';
?>
