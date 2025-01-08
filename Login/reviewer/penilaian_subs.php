<?php
include 'menuReviewer.php';
include '../link.php';
?>

<!-- Main content starts -->
<div class="container-fluid mb-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">PENILAIAN SUBSTANSI PROPOSAL PENELITIAN</h6>
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
                <td>Mahasiswa <?php echo $totalmhs;   ?> orang </td>
            </tr>
        <tr>
            <td>Tahun Pelaksanaan</td>
            <td>:</td>
            <td><?php echo $hasil['thn_pertama_usulan']; ?></td>
        </tr>
        <tr>
            <td>Lama Penelitian</td>
            <td>:</td>
            <td><?php echo $hasil['lama_kegiatan']; ?></td>
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
                <th>Kriteria Penilaian</th>
                <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan='4'>1</td>
                    <td rowspan='4'>Publikasi Ilmiah
                        <h6 class="mt-3 h6"><small><mark>(Bobot Nilai = 50) ; (Max. Total Nilai = 200) </mark></small></h6>
                    </td>
                    <td>
                    Internasional Reputasi
                    </td>
                    <td>
                    <select name="pub_ir" id='pub_ir' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1) </option>
                            <option value='Submitted (2)'> Submitted (2)</option>
                            <option value='Accepted (3)'> Accepted (3)</option>
                            <option value='Published (4)'> Published (4)</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    
                    <td>
                    Internasional
                    </td>
                    <td>
                    <select name="pub_inter" id='pub_inter' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1) </option>
                            <option value='Submitted (2)'> Submitted (2)</option>
                            <option value='Accepted (3)'> Accepted (3)</option>
                            <option value='Published (4)'> Published (4)</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                    Nasional Terindeks SINTA
                    </td>
                    <td>
                    <select name="pub_ns" id='pub_ns' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1) </option>
                            <option value='Submitted (2)'> Submitted (2)</option>
                            <option value='Accepted (3)'> Accepted (3)</option>
                            <option value='Published (4)'> Published (4)</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                    Nasional
                    </td>
                    <td>
                    <select name="pub_nas" id='pub_nas' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1) </option>
                            <option value='Submitted (2)'> Submitted (2)</option>
                            <option value='Accepted (3)'> Accepted (3)</option>
                            <option value='Published (4)'> Published (4)</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td rowspan='2'>2</td>
                    <td rowspan='2'>Pemakalah Temu Ilmiah
                    <h6 class="mt-3 h6"><small><mark>(Bobot Nilai = 40) ; (Max. Total Nilai = 120)</mark>
                    </small></h6>
                    </td>
                    <td>
                    Internasional
                    </td>
                    <td>
                    <select name="temu_inter" id='temu_inter' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1) </option>
                            <option value='Submitted (2)'> Submitted (2)</option>
                            <option value='Terlaksana(3)'> Terlaksana(3) </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    
                    <td>
                    Nasional
                    </td>
                    <td>
                    <select name="temu_nas" id='temu_nas' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1) </option>
                            <option value='Submitted (2)'> Submitted (2)</option>
                            <option value='Terlaksana(3)'> Terlaksana(3) </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td rowspan='6'>3</td>
                    <td rowspan='6'>Hak Kekayaaan Intelektual
                    <h6 class="mt-3 h6"><small><mark>(Bobot Nilai = 45) ; (Max. Total Nilai = 135) </mark>
                    </small></h6>
                    </td>
                    <td>
                    Merek
                    </td>
                    <td>
                    <select name="haki_merek" id='haki_merek' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1)</option>
                            <option value='Terdaftar (2)'> Terdaftar (2)</option>
                            <option value='Granted (3)'> Granted (3)</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                    Paten
                    </td>
                    <td>
                    <select name="haki_paten" id='haki_paten' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1)</option>
                            <option value='Terdaftar (2)'> Terdaftar (2)</option>
                            <option value='Granted (3)'> Granted (3)</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                    Desain Industri
                    </td>
                    <td>
                    <select name="haki_industri" id='haki_industri' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1)</option>
                            <option value='Terdaftar (2)'> Terdaftar (2)</option>
                            <option value='Granted (3)'> Granted (3)</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                    Hak Cipta
                    </td>
                    <td>
                    <select name="haki_cipta" id='haki_cipta' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1)</option>
                            <option value='Terdaftar (2)'> Terdaftar (2)</option>
                            <option value='Granted (3)'> Granted (3)</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                    Design Geografis
                    </td>
                    <td>
                    <select name="haki_geo" id='haki_geo' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1)</option>
                            <option value='Terdaftar (2)'> Terdaftar (2)</option>
                            <option value='Granted (3)'> Granted (3)</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                    Desain Tata Letak Sirkuit Terpadu
                    </td>
                    <td>
                    <select name="haki_sirkuit" id='haki_sirkuit' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1)</option>
                            <option value='Terdaftar (2)'> Terdaftar (2)</option>
                            <option value='Granted (3)'> Granted (3)</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td rowspan='4'>4</td>
                    <td rowspan='4'>Buku
                    <h6 class="mt-3 h6"><small><mark>(Bobot Nilai = 15) ; (Max. Total Nilai = 45)
                    </mark></small></h6>
                    </td>
                    <td>Buku Monograf</td>
                    <td>
                    <select name="buku_mono" id='buku_mono' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1)</option>
                            <option value='Editing (2)'> Editing (2)</option>
                            <option value='Terbit (3)'> Terbit (3)</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                    Buku Referensi
                    </td>
                    <td>
                    <select name="buku_ref" id='buku_ref' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1)</option>
                            <option value='Editing (2)'> Editing (2)</option>
                            <option value='Terbit (3)'> Terbit (3)</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                    Book Chapter
                    </td>
                    <td>
                    <select name="buku_chap" id='buku_chap' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1)</option>
                            <option value='Editing (2)'> Editing (2)</option>
                            <option value='Terbit (3)'> Terbit (3)</option>
                        </select>
                    </td>
                    
                </tr>

                <tr>
                    <td>
                    Buku Ajar
                    </td>
                    <td>
                    <select name="buku_ajar" id='buku_ajar' class="form-control" required >
                            <!-- <option value=''>-- Pilih nilai --</option> -->
                            <option value='Tidak ada (0)'> Tidak ada (0)</option>
                            <option value='draft (1)'> draft (1)</option>
                            <option value='Editing (2)'> Editing (2)</option>
                            <option value='Terbit (3)'> Terbit (3)</option>
                        </select>
                    </td>
                  
                </tr>
            </tbody>
        </table>


        <div class="card-body" style="color:black">
        <table class="table table-bordered table-sm table-borderless table-hover">

        <tr>
            <td class="font-weight-bold">Komentar Penilaian</td>
        </tr>
        <tr>
            <td>Kesesuaian penelitian dengan usulan: </td>
            <td>
                <textarea class="form-control" rows="2" name="kom_sesuai"></textarea>
            </td>
            
        </tr>
        <tr>
            <td>Ketercapaian luaran: </td>
            <td>
                <textarea class="form-control" rows="2" name='kom_luaran' id=''></textarea>
            </td>
        </tr>
        <tr>
            <td>Potensi Keberlanjutan: </td>
          <td>  <textarea class="form-control" rows="2" name='kom_lanjut' id=''></textarea>
          </td>
        </tr>
        <tr>
            <td>Level TKT saat ini: </td>
            <td>  <textarea class="form-control" rows="2" name='kom_tkt' id=''></textarea>
          </td>
        </tr>
        <tr>
            <td>Relevansi Dengan Bidang Ilmu: </td>
            <td>  <textarea class="form-control" rows="2" name='kom_ilmu' id=''></textarea>
            </td>
        </tr>
        <tr>
            <td width=400>Relevansi Dengan Mata Kuliah Yang Diajarkan (Pendidik/Dosen) atau Tupoksi (Tenaga Kependidikan): </td>
            <td>  <textarea class="form-control" rows="2" name='kom_mk' id=''></textarea>
            </td>
        </tr>
        <tr>
            <td>Keterlibatan Mahasiswa (Pendidik/Dosen): </td>
            <td>  <textarea class="form-control" rows="2" name='kom_mhs' id=''></textarea>
            </td>
        </tr>
        <tr>
            <td>Hambatan / Kendala: </td>
            <td>  <textarea class="form-control" rows="2" name='kom_kendala' id=''></textarea>
          </td>
        </tr>
        <tr>
            <td>Serapan Anggaran: </td>
            <td>  <textarea class="form-control" rows="2" name='kom_anggaran' id=''></textarea>
          </td>
        </tr>
        <tr>
            <td>Lain-lain: </td>
            <td>  <textarea class="form-control" rows="2" name='kom_lain' id=''></textarea>
            </td>
        </tr>

        <tr>
            <td>Tanggal Penilaian </td>
            <!-- <td>:</td> -->
            <td> <input type="date" class="form-control" id="date_substansi" placeholder="" name="date_substansi" required/></td>
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
        $pub_ir=$_POST['pub_ir'];
        $pub_inter=$_POST['pub_inter'];
        $pub_ns=$_POST['pub_ns'];
        $pub_nas=$_POST['pub_nas'];
        $temu_inter=$_POST['temu_inter'];
        $temu_nas=$_POST['temu_nas'];
        $haki_merek=$_POST['haki_merek'];
        $haki_paten=$_POST['haki_paten'];
        $haki_industri=$_POST['haki_industri'];
        $haki_cipta=$_POST['haki_cipta'];
        $haki_geo=$_POST['haki_geo'];
        $haki_sirkuit=$_POST['haki_sirkuit'];
        $buku_mono=$_POST['buku_mono'];
        $buku_ref=$_POST['buku_ref'];
        $buku_chap=$_POST['buku_chap'];
        $buku_ajar=$_POST['buku_ajar'];
        $kom_sesuai=$_POST['kom_sesuai'];
        $kom_luaran=$_POST['kom_luaran'];
        $kom_lanjut=$_POST['kom_lanjut'];
        $kom_tkt=$_POST['kom_tkt'];
        $kom_ilmu=$_POST['kom_ilmu'];
        $kom_mk=$_POST['kom_mk'];
        $kom_mhs=$_POST['kom_mhs'];
        $kom_kendala=$_POST['kom_kendala'];
        $kom_anggaran=$_POST['kom_anggaran'];
        $kom_lain=$_POST['kom_lain'];
        $date_substansi=$_POST['date_substansi'];
        $status=$_POST['status'];

        // sub total nilai publikasi
            if($pub_ir=='Tidak ada (0)' OR $pub_inter=='Tidak ada (0)' OR $pub_ns=='Tidak ada (0)' OR $pub_nas=='Tidak ada (0)'){
                $totalnilai_pub=0;
            }
            if($pub_ir=='draft (1)' OR $pub_inter=='draft (1)' OR $pub_ns=='draft (1)' OR $pub_nas=='draft (1)'){
                $totalnilai_pub=50;
            }
            if($pub_ir=='Submitted (2)' OR $pub_inter=='Submitted (2)' OR $pub_ns=='Submitted (2)' OR $pub_nas=='Submitted (2)'){
                $totalnilai_pub=100;
            }
            if($pub_ir=='Accepted (3)' OR $pub_inter=='Accepted (3)' OR $pub_ns=='Accepted (3)' OR $pub_nas=='Accepted (3)'){
                $totalnilai_pub=150;
            }
            if($pub_ir=='Published (4)' OR $pub_inter=='Published (4)' OR $pub_ns=='Published (4)' OR $pub_nas=='Published (4)'){
                $totalnilai_pub=200;
            }

            // sub total nilai Pemakalah Temu Ilmiah
            if($temu_inter=='Tidak ada (0)' OR $temu_nas=='Tidak ada (0)'){
                $totalnilai_temu=0;
            }
            if($temu_inter=='draft (1)' OR $temu_nas=='draft (1)'){
                $totalnilai_temu=40;
            }
            if($temu_inter=='Submitted (2)' OR $temu_nas=='Submitted (2)'){
                $totalnilai_temu=80;
            }
            if($temu_inter=='Terlaksana(3)' OR $temu_nas=='Terlaksana(3)'){
                $totalnilai_temu=120;
            }

            // sub total nilai Hak Kekayaaan Intelektual
            if($haki_merek=='Tidak ada (0)' OR $haki_paten=='Tidak ada (0)' OR $haki_industri=='Tidak ada (0)' OR $haki_cipta=='Tidak ada (0)' OR $haki_geo=='Tidak ada (0)' OR $haki_sirkuit=='Tidak ada (0)' ){
                $totalnilai_haki=0;
            }
            if($haki_merek=='draft (1)' OR $haki_paten=='draft (1)' OR $haki_industri=='draft (1)' OR $haki_cipta=='draft (1)' OR $haki_geo=='draft (1)' OR $haki_sirkuit=='draft (1)' ){
                $totalnilai_haki=45;
            }
            if($haki_merek=='Terdaftar (2)' OR $haki_paten=='Terdaftar (2)' OR $haki_industri=='Terdaftar (2)' OR $haki_cipta=='Terdaftar (2)' OR $haki_geo=='Terdaftar (2)' OR $haki_sirkuit=='Terdaftar (2)' ){
                $totalnilai_haki=90;
            }
            if($haki_merek=='Granted (3)' OR $haki_paten=='Granted (3)' OR $haki_industri=='Granted (3)' OR $haki_cipta=='Granted (3)' OR $haki_geo=='Granted (3)' OR $haki_sirkuit=='Granted (3)' ){
                $totalnilai_haki=135;
            }

            // sub total nilai Buku
            if($buku_mono=='Tidak ada (0)' OR $buku_ref=='Tidak ada (0)' OR $buku_chap=='Tidak ada (0)' OR $buku_ajar=='Tidak ada (0)'){
                $totalnilai_buku=0;
            }
            if($buku_mono=='draft (1)' OR $buku_ref=='draft (1)' OR $buku_chap=='draft (1)' OR $buku_ajar=='draft (1)'){
                $totalnilai_buku=15;
            }
            if($buku_mono=='Editing (2)' OR $buku_ref=='Editing (2)' OR $buku_chap=='Editing (2)' OR $buku_ajar=='Editing (2)'){
                $totalnilai_buku=30;
            }
            if($buku_mono=='Terbit (3)' OR $buku_ref=='Terbit (3)' OR $buku_chap=='Terbit (3)' OR $buku_ajar=='Terbit (3)'){
                $totalnilai_buku=45;
            }

            //totalnilai akhir
            $nilai_akhir=$totalnilai_pub+$totalnilai_temu+$totalnilai_haki+$totalnilai_buku;


        // End sub total nilai dan nilai akhir

        $queri_sub="INSERT INTO substansi(id_login, id_research, pub_ir, pub_inter, pub_ns, pub_nas, totalnilai_pub, temu_inter, temu_nas, totalnilai_temu, haki_merek, haki_paten, haki_industri, haki_cipta, haki_geo, haki_sirkuit,totalnilai_haki, buku_mono, buku_ref, buku_chap, buku_ajar, totalnilai_buku, nilai_akhir, kom_sesuai, kom_luaran, kom_lanjut, kom_tkt, kom_ilmu, kom_mk, kom_mhs, kom_kendala, kom_anggaran, kom_lain,date_substansi) VALUES ('$id_login','$id_cari','$pub_ir','$pub_inter','$pub_ns','$pub_nas','$totalnilai_pub','$temu_inter','$temu_nas','$totalnilai_temu','$haki_merek','$haki_paten','$haki_industri','$haki_cipta','$haki_geo','$haki_sirkuit','$totalnilai_haki','$buku_mono','$buku_ref','$buku_chap','$buku_ajar','$totalnilai_buku','$nilai_akhir','$kom_sesuai','$kom_luaran','$kom_lanjut','$kom_tkt','$kom_ilmu','$kom_mk','$kom_mhs','$kom_kendala','$kom_anggaran','$kom_lain','$date_substansi')";

        $sql_sub=mysqli_query($conn,$queri_sub);
        if($sql_sub){
            echo "<script> alert ('Berhasil melakukan penilaian substansial');window.location='list_usulan_riset_R.php';</script>"; 
        }else{
            echo "<script> alert ('Ada Kesalahan saat proses penyimpanan');window.location='list_usulan_riset_R.php';</script>";
        }

        // ubah dana_rekomendasi dan status yang direkomendasi
        $sql_dana=mysqli_query($conn,"UPDATE research SET dana_disetujui='$dana_disetujui', status='$status' WHERE id_research=$id_cari");
        // End ubah dana yang direkomendasi

    }
    ?>

    </div>
</div>

</div>

<?php
include '../footer.php';
?>
