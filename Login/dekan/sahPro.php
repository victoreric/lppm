<?php
include 'menuDekan.php';
include '../link.php';
?>

<!-- Main content starts -->
<div class="container-fluid mb-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Halaman Pengesahan Proposal Penelitian</h6>
        </div>
        <div class="card-body" style="color:black">
        <table class="table table-bordered table-sm table-borderless">
            <?php
                $id_cari=$_GET['id'];
                // echo $id_cari;
                
                $query="SELECT research.*, reg.nip, mstr_prodi.prodi, mstr_fakultas.fakultas, status.id_status, status.status_name
                FROM research
                INNER JOIN reg ON reg.nidn=research.nidn_ketua
                INNER JOIN mstr_prodi ON mstr_prodi.id_prodi=reg.prodi
                INNER JOIN mstr_fakultas ON mstr_fakultas.id_fakultas=reg.fakultas
                INNER JOIN status ON status.id_status=research.status
                WHERE id_research=$id_cari
                ORDER BY status.id_status ASC ";
                $sql=mysqli_query($conn,$query);
                // $cek=mysqli_num_rows($sql);
                $hasil=mysqli_fetch_array($sql);
           ?>
            <tbody>
            <tr>
                <td class="font-weight-bold">Judul</td>
                <td>:</td>
                <td class="font-weight-bold"><?php echo $hasil['judul']; ?></td>
            </tr>
            <tr>
                <td class="font-weight-bold">Ketua Pengusul</td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><?php echo $hasil['nama_ketua']; ?></td>
            </tr>
            <tr>
                <td>NIDN/ NIDK</td>
                <td>:</td>
                <td><?php echo $hasil['nidn_ketua']; ?></td>
            </tr>
            <?php
            if($hasil['nama_member1']!=""){
                ?>
                <tr>
                    <td class="font-weight-bold">Anggota (1)</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?php echo $hasil['nama_member1']; ?></td>
                </tr>
                <tr>
                    <td>NIDN/ NIDK</td>
                    <td>:</td>
                    <td><?php echo $hasil['nidn_member1']; ?></td>
                </tr>
            <?php 
            }
            if($hasil['nama_member2']!=""){
            ?>  
             <tr>
                    <td class="font-weight-bold">Anngota (2)</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?php echo $hasil['nama_member2']; ?></td>
                </tr>
                <tr>
                    <td>NIDN/ NIDK</td>
                    <td>:</td>
                    <td><?php echo $hasil['nidn_member2']; ?></td>
                </tr>
            <?php
            }
            if($hasil['nama_member3']!=""){
                ?>  
                 <tr>
                    <td class="font-weight-bold">Anngota (3)</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?php echo $hasil['nama_member3']; ?></td>
                </tr>
                <tr>
                    <td>NIDN/ NIDK</td>
                    <td>:</td>
                    <td><?php echo $hasil['nidn_member3']; ?></td>
                </tr>
            <?php
            }
            if($hasil['nama_member4']!=""){
                ?>
                <tr>
                    <td class="font-weight-bold">Anngota (4)</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?php echo $hasil['nama_member4']; ?></td>
                </tr>
                <tr>
                    <td>NIDN/ NIDK</td>
                    <td>:</td>
                    <td><?php echo $hasil['nidn_member4']; ?></td>
                </tr>
            <?php 
            }
            if($hasil['nama_member5']!=""){
            ?>  
            <tr>
                    <td class="font-weight-bold">Anngota (5)</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?php echo $hasil['nama_member5']; ?></td>
                </tr>
                <tr>
                    <td>NIDN/ NIDK</td>
                    <td>:</td>
                    <td><?php echo $hasil['nidn_member5']; ?></td>
                </tr>
            <?php
            }
            ?>

        <tr>
            <td class="font-weight-bold">Tingkat Kesiapan Teknologi (TKT) </td>
            <td>:</td>
            <td><?php echo $hasil['target_tkt']; ?></td>
        </tr>

        <?php
        if($hasil['mhs_1']!=""){
        ?>  
            <tr>
                <td class="font-weight-bold">Nama Mahasiswa (1)</td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><?php echo $hasil['mhs_1']; ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><?php echo $hasil['nim_mhs_1']; ?></td>
            </tr>
        <?php
        }
        if($hasil['mhs_2']!=""){
            ?>  
                <tr>
                    <td class="font-weight-bold">Nama Mahasiswa (2)</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?php echo $hasil['mhs_2']; ?></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><?php echo $hasil['nim_mhs_2']; ?></td>
                </tr>
            <?php
            }
        if($hasil['mhs_3']!=""){
            ?>  
                <tr>
                    <td class="font-weight-bold">Nama Mahasiswa (3)</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?php echo $hasil['mhs_3']; ?></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><?php echo $hasil['nim_mhs_3']; ?></td>
                </tr>
            <?php
            }
            ?>
        <tr>
            <td>Tahun Pelaksanaan</td>
            <td>:</td>
            <td><?php echo $hasil['thn_pertama_usulan']; ?></td>
        </tr>

        <tr>
            <td>Biaya Keseluruhan</td>
            <td>:</td>
            <td> Rp. <?php echo $hasil['dana_usulan']; ?></td>
        </tr>
        </tbody>
        </table>

        <form method="POST" action="" enctype="multipart/form-data">
            Pengesahan Proposal Oleh Dekan :
        <div class='p-2 bg-warning'>   
        <div class="form-group">
            <label for="nosurat" class="form-control-label">Silahkan dicentang untuk lakukan pengesahan proposal penelitian</label>
        </div>
        <?php   
        // $nama=$_SESSION['nama_admin'];
        $username=$_SESSION['username_admin'];
        $query_ttd="SELECT * FROM login WHERE username='$username'";
        $sql_ttd=mysqli_query($conn,$query_ttd);
        $hasil=mysqli_fetch_array($sql_ttd);

        $id_login=$hasil['id_login'];
        $ttd_dekan=$hasil['file_ttd'];
        $cap_dekan=$hasil['file_cap'];
       
        ?>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="<?php echo $ttd_dekan; ?>" name="ttd_dekan" required>Tanda tangan Dekan  
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="<?php echo $cap_dekan; ?>" name="cap_dekan" required>Cap Fakultas
            </label>
        </div>
        <div class="form-check-inline">
            <button type="submit" name='simpan' class="btn btn-success ml-5 mr-5 mt-3">Simpan</button>  
            <a href="list_usulan_riset.php" class="btn btn-danger mt-3">Batal</a> 
        </div>
    </div> 
    </form>

    <?php
    if(isset($_POST['simpan'])){
        // echo $ttd_dekan=$_POST['ttd_dekan'];
        // echo $cap_dekan=$_POST['cap_dekan'];
        // echo "<br>";
        // echo $id_login;
        // echo "<br>";
        // echo $id_cari;

        $queri_sah="INSERT INTO sah_usulan(id_research, id_login, ttd_dekan, ttd_ketua, cap_dekan, cap_ketua, file_sah_usulan) VALUES ('$id_cari','$id_login','$ttd_dekan','','$cap_dekan','','')";

        $sql_sah=mysqli_query($conn,$queri_sah);
        if($sql_sah){
            echo "<script> alert ('Berhasil menambahkan Tanda tangan dan Cap pada Proposal');window.location='list_usulan_riset.php';</script>"; 
        }else{
            echo "<script> alert ('Ada Kesalahan saat proses penyimpanan');window.location='list_usulan_riset.php';</script>";
        }
    }
    ?>

    </div>
</div>

</div>

<?php
include '../footer.php';
?>
