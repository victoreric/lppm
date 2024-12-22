<?php
include 'menuDekan.php';
include '../link.php';
?>

<!-- Main content starts -->

<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Usulan Proposal Penelitian</a></li>
  </ul>
</div>
<div class="container-fluid mb-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Daftar Usulan Proposal Penelitian</h5>
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
            <th>Tahun</th>
            <th>Status</th>
            <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php  

            // untuk tampilkan nama fakultas dari dekan
                $fak=$_SESSION['fakultas'];
                // echo $fak;
            // End untuk tampilkan nama fakultas dari dekan
            $no=0;
            $query="SELECT research.*, reg.nip, mstr_prodi.*, mstr_fakultas.*, status.id_status, status.status_name
            FROM research
            INNER JOIN reg ON reg.nidn=research.nidn_ketua
            INNER JOIN mstr_prodi ON mstr_prodi.id_prodi=reg.prodi
            INNER JOIN mstr_fakultas ON mstr_fakultas.id_fakultas=reg.fakultas
            INNER JOIN status ON status.id_status=research.status
            WHERE mstr_fakultas.id_fakultas='$fak' and status=1
            ORDER BY status.id_status ASC ";
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
                    <?php echo $hasil['thn_pertama_usulan']; ?>
                </td>
                <td>
                    <?php echo $hasil['status_name']; ?>
                </td>
                
                <?php 
                $id_research=$hasil['id_research'];
                // echo $id_research;
                $queri_aksi="SELECT * FROM sah_usulan WHERE id_research=$id_research";
                $sql_aksi=mysqli_query($conn,$queri_aksi);
                $res_aksi=mysqli_fetch_assoc($sql_aksi);

                $ttd_dekan=$res_aksi['ttd_dekan'];
                $ttd_ketua=$res_aksi['ttd_ketua'];
                ?>

                <?php
                if($ttd_dekan==""){ ?>
                    <td>
                     <a href='sahPro.php?id=<?php echo $hasil['id_research']; ?>' class="btn btn-danger btn-sm font-weight-bolder" role="button" role="button" >Beri Pengesahan </a> 
                    </td>
                <?php
                }
                elseif($ttd_dekan!="" AND $ttd_ketua==""){ 
                ?>
                    <td>
                    <p class='p-2 bg-light'> Anda telah mengesahkan Usulan Proposal. <br>
                    <p class="text-danger font-weight-bold">Namun, belum ada pengesahan dari Ketua LPPM
                    </p>
                        <a href='hal_sah_usulan.php?id=<?php echo $hasil['id_research']; ?>' class="btn btn-success btn-sm font-weight-bolder" role="button" role="button">Lihat Surat</a>   
                    </td>                 
                <?php
                }
                else{
                    ?>
                    <td>
                     <a href='hal_sah_usulan.php?id=<?php echo $hasil['id_research']; ?>' class="btn btn-success btn-sm font-weight-bolder" role="button" role="button">Lihat Surat </a>
                     </td>
                <?php
                }
                ?>
                
                
                </tr>                                       
            <?php 
            }
            ?>
            </tbody>
        </table>
        </div>
    </div>

</div>

<?php
include '../footer.php';
?>
