<?php
require ('../link.php');
include '../assets/fungsi.php';
// require('../libs/fpdf184/fpdf.php');
require ('../libs/fpdf184/fpdf.php');


$id=$_GET['id'];
$query="SELECT substansi.*, research.*, reg.*, login.id_login, login.nama, login.nip, login.file_ttd, login.file_cap, mstr_prodi.prodi, mstr_fakultas.*    
        FROM substansi
        INNER JOIN research ON research.id_research=substansi.id_research
        INNER JOIN reg ON reg.nidn=research.nidn_ketua
        INNER JOIN login ON login.id_login=substansi.id_login
        INNER JOIN mstr_fakultas ON mstr_fakultas.id_fakultas=reg.fakultas
        INNER JOIN mstr_prodi ON mstr_prodi.id_prodi=reg.prodi
        WHERE substansi.id_research=$id";
$sql=mysqli_query($conn,$query);
$hasil=mysqli_fetch_assoc($sql);

$pdf=new FPDF(); 
$pdf->SetMargins('20','8');

$pdf->AddPage();
// header
$pdf->Image('../assets/img/Logo_unpatti.png',10,7,-250);
$pdf->SetFont('Times','','16');
$pdf->SetLeftMargin('40');
$pdf->cell(0,2,'KEMENTERIAN PENDIDIKAN KEBUDAYAAN',0,1,'C'); 
$pdf->Ln();
$pdf->cell(0,3,'RISET, DAN TEKNOLOGI',0,1,'C');
$pdf->Ln();
$pdf->SetFont('Times','B','14');
$pdf->Cell(0,2,'UNIVERSITAS PATTIMURA',0,1,'C');
$pdf->Ln();
$pdf->SetFont('Times','B','13');
$pdf->Cell(0,2,'LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT',0,1,'c');
$pdf->Ln();
$pdf->Setfont('Times','','12');
$pdf->Cell(0,2,'Jalan. Ir. M. Putuhena Lt. 2  Ged. Lab. Terpadu Pendukung Blok Masela Kampus Poka',0,1,'C');
$pdf->Ln();
$pdf->Setfont('Times','','11');
$pdf->Cell(0,2,'Telp. (0911)3824911, Fax. (0911)3824992; e-mail: lppm@unpatti.ac.id. Web:lppm.unpatti.ac.id',0,1,'C');
$pdf->SetLineWidth(0.5);
$pdf->line(195,38,12,38);

$pdf->Ln(10);
// endHeader

//body
$pdf->SetMargins('20','8');
$pdf->SetLeftMargin('10');

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,1,'PENILAIAN MONITORING DAN EVALUASI PENELITIAN',0,1,'C');
$pdf->Ln(4);
$pdf->SetLineWidth(0.3);
$pdf->line(173,45,57,45);
$pdf->Ln(7);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Judul');
$pdf->Cell(4, 6, ':');
$pdf->SetFont('Times','',12);
$pdf->MultiCell(135,5, $hasil['judul']);
$pdf->Ln(5);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Skema Penelitian');
$pdf->Cell(4, 6, ':');
$pdf->SetFont('Times','',12);
$pdf->Cell(120,5, $hasil['nama_sub_skema']);
$pdf->Ln(6);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Program Penelitian');
$pdf->Cell(4, 6, ':');
$pdf->SetFont('Times','',12);
$pdf->Cell(120,5, $hasil['nama_skema']);
$pdf->Ln(6);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'TKT');
$pdf->Cell(4, 6, ':');
$pdf->SetFont('Times','',12);
$pdf->Multicell(135,5, $hasil['target_tkt']);
$pdf->Ln(3);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Ketua Peneliti');
$pdf->Ln(8);

$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, 'a.   Nama Lengkap');
$pdf->Cell(4, 6, ':');
$pdf->SetFont('Times','',12);
$pdf->Cell(120,5, $hasil['nama_ketua']);
$pdf->Ln(6);

$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, 'b.   Fakultas');
$pdf->Cell(4, 6, ':');
$pdf->SetFont('Times','',12);
$pdf->Cell(120,5, $hasil['fakultas_name']);
$pdf->Ln(6);

$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, 'c.   Program Studi');
$pdf->Cell(4, 6, ':');
$pdf->SetFont('Times','',12);
$pdf->Cell(120,5, $hasil['prodi']);
$pdf->Ln(6);

$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, 'd.   NIDN');
$pdf->Cell(4, 6, ':');
$pdf->SetFont('Times','',12);
$pdf->Cell(120,5, $hasil['nidn']);
$pdf->Ln(6);

$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, 'e.   SINTA ID');
$pdf->Cell(4, 6, ':');
$pdf->SetFont('Times','',12);
$pdf->Cell(120,5, $hasil['prodi']);
$pdf->Ln(6);


$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, 'f.   Overall Score Sinta dan ');
// $pdf->Cell('50, 6,H-index Scopus')
$pdf->Cell(4, 6, ':');
$pdf->SetFont('Times','',12);
$pdf->Cell(120,5, $hasil['hindex']);
$pdf->Ln(5);
$pdf->SetFont('Times','',12);
$pdf->Cell(90, 6, '      H-index Scopus');
$pdf->Ln(7);

$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, 'g.   Jabatan Fungsional');
$pdf->Cell(4, 6, ':');
$pdf->SetFont('Times','',12);
$pdf->Cell(120,5, $hasil['jafung']);
$pdf->Ln(7);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Anggota Peneliti');
$pdf->Cell(4, 6, ':');
$pdf->SetFont('Times','',12);
$pdf->Cell(120,5, 'Dosen  ..... Orang');
$pdf->Ln(6);
$pdf->Cell(120,5, '                                                   Mahasiswa  ..... Orang');

$pdf->Ln(7);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Lama Penelitian');
$pdf->Cell(4, 6, ':');
$pdf->SetFont('Times','',12);
$pdf->Cell(120,5, $hasil['lama_kegiatan']. '  Tahun');

$pdf->Ln(7);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Biaya Penelitian');
$pdf->Ln(6);
$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, 'a.  Dana Usulan ');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, 'Rp. '. $hasil['dana_usulan']);
$pdf->Ln(6);

$pdf->Cell(50, 6, 'b.  Direkomendasikan ');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, 'Rp. '. $hasil['dana_disetujui']);
$pdf->Ln(10);

// table
// Simple table
//header table
$pdf->SetFont('Times','B','11');
$pdf->Cell(7,7,'No',1);
$pdf->Cell(43,7,'Aspek Penilaian',1,0,'C');
$pdf->Cell(56,7,'Kriteria Penilaian',1,0,'C');
$pdf->Cell(30,7,'Nilai',1,0,'C');
$pdf->Cell(15,7,'Bobot',1,0,'C');
$pdf->Cell(22,7,'Total Nilai',1,0,'C');
$pdf->Cell(10,7,'',0,0,'C'); //kolom bantu

// $pdf->SetDrawColor(0,80,180);
// $pdf->SetFillColor(230,230,0);
$pdf->Ln();

//isi table
$pdf->SetFont('Times','',11);
$pdf->Cell(7,28,'1',1);
$pdf->Cell(43,28,'Publikasi Ilmiah',1);
$pdf->Cell(56,7,'Internasional Bereputasi',1);
$pub_ir=$hasil['pub_ir'];
$pdf->Cell(30,7, $pub_ir,1,0,'C');
$pdf->Cell(15,28,'50',1,0,'C');
$totalnilai_pub=$hasil['totalnilai_pub'];
$pdf->Cell(22,28,$totalnilai_pub,1,0,'C');
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();

$pdf->Cell(7,0);
$pdf->Cell(43,0);
$pdf->Cell(56,7,'Internasional',1);
$pub_inter=$hasil['pub_inter'];
$pdf->Cell(30,7, $pub_inter,1,0,
'C');
$pdf->Cell(15,0);
$pdf->Cell(22,0);
$pdf->Cell(10,7 ); //kolom bantu
$pdf->Ln();

$pdf->Cell(7,0);
$pdf->Cell(43,0);
$pdf->Cell(56,7,'Nasional Terindeks SINTA',1);
$pub_ns=$hasil['pub_ns'];
$pdf->Cell(30,7, $pub_ns,1,0,'C');
$pdf->Cell(15,0);
$pdf->Cell(22,0);
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();

$pdf->Cell(7,0);
$pdf->Cell(43,0);
$pdf->Cell(56,7,'Nasional',1);
$pub_nas=$hasil['pub_nas'];
$pdf->Cell(30,7, $pub_nas,1,0,'C');
$pdf->Cell(15,0);
$pdf->Cell(22,0);
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();

$pdf->Cell(7,14,'2',1);
$pdf->Cell(43,14,'Pemakalah Temu Ilmiah',1);
$pdf->Cell(56,7,'Internasional',1);
$temu_inter=$hasil['temu_inter'];
$pdf->Cell(30,7, $temu_inter,1,0,'C');
$pdf->Cell(15,14,'40',1,0,'C');
$totalnilai_temu=$hasil['totalnilai_temu'];
$pdf->Cell(22,14,$totalnilai_temu,1,0,'C');
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();

$pdf->Cell(7,0);
$pdf->Cell(43,0);
$pdf->Cell(56,7,'Nasional',1);
$temu_nas=$hasil['temu_nas'];
$pdf->Cell(30,7, $temu_nas,1,0,'C');
$pdf->Cell(15,0);
$pdf->Cell(22,0);
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();


$pdf->Cell(7,42,'3',1);
$pdf->Cell(43,42,'Hak Kekayaan Intelektual',1);
$pdf->Cell(56,7,'Merek',1);
$haki_merek=$hasil['haki_merek'];
$pdf->Cell(30,7, $haki_merek,1,0,'C',0,'C');
$pdf->Cell(15,42,'45',1,0,'C');
$totalnilai_haki=$hasil['totalnilai_haki'];
$pdf->Cell(22,42,$totalnilai_haki,1,0,'C');
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();

$pdf->Cell(7,0);
$pdf->Cell(43,0);
$pdf->Cell(56,7,'Paten',1);
$haki_paten=$hasil['haki_paten'];
$pdf->Cell(30,7, $haki_paten,1,0,'C');
$pdf->Cell(15,0);
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();

$pdf->Cell(7,0);
$pdf->Cell(43,0);
$pdf->Cell(56,7,'Design Industri',1);
$haki_industri=$hasil['haki_industri'];
$pdf->Cell(30,7, $haki_industri,1,0,'C');
$pdf->Cell(15,0);
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();

$pdf->Cell(7,0);
$pdf->Cell(43,0);
$pdf->Cell(56,7,'Hak Cipta',1);
$haki_cipta=$hasil['haki_cipta'];
$pdf->Cell(30,7, $haki_cipta,1,0,'C');
$pdf->Cell(15,0);
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();

$pdf->Cell(7,0);
$pdf->Cell(43,0);
$pdf->Cell(56,7,'Desain Geografis',1);
$haki_geo=$hasil['haki_geo'];
$pdf->Cell(30,7, $haki_geo,1,0,'C');
$pdf->Cell(15,0);
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();


$pdf->Cell(7,0);
$pdf->Cell(43,0);
$pdf->Cell(56,7,'Desain Tata Letak Sirkuit Terpadu',1);
$haki_sirkuit=$hasil['haki_sirkuit'];
$pdf->Cell(30,7, $haki_sirkuit,1,0,'C');
$pdf->Cell(15,0);
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();

$pdf->SetFont('Times','',11);
$pdf->Cell(7,28,'4',1);
$pdf->Cell(43,28,'Buku',1);
$pdf->Cell(56,7,'Buku Monograf',1);
$buku_mono=$hasil['buku_mono'];
$pdf->Cell(30,7, $buku_mono,1,0,'C');
$pdf->Cell(15,28,'15',1,0,'C');
$totalnilai_buku=$hasil['totalnilai_buku'];
$pdf->Cell(22,28,$totalnilai_buku,1,0,'C');
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();


$pdf->Cell(7,0);
$pdf->Cell(43,0);
$pdf->Cell(56,7,'Buku Referensi',1);
$buku_ref=$hasil['buku_ref'];
$pdf->Cell(30,7, $buku_ref,1,0,'C');
$pdf->Cell(15,0);
$pdf->Cell(22,0);
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();


$pdf->Cell(7,0);
$pdf->Cell(43,0);
$pdf->Cell(56,7,'Buku Chapter',1);
$buku_chap=$hasil['buku_chap'];
$pdf->Cell(30,7, $buku_chap,1,0,'C');
$pdf->Cell(15,0);
$pdf->Cell(22,0);
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();

$pdf->Cell(7,0);
$pdf->Cell(43,0);
$pdf->Cell(56,7,'Buku Ajar',1);
$buku_ajar=$hasil['buku_ajar'];
$pdf->Cell(30,7, $buku_ajar,1,0,'C');
$pdf->Cell(15,0);
$pdf->Cell(22,0);
$pdf->Cell(10,7); //kolom bantu
$pdf->Ln();

$pdf->SetFont('Times','B',12);
$pdf->Cell(151,7,'T O T A L',1,0,'C');
$nilai_akhir=$hasil['nilai_akhir'];
$pdf->Cell(22,7,$nilai_akhir,1,0,'C');
$pdf->Cell(10,7); //kolom bantu

$pdf->Ln(8);

// komenter penilai

$pdf->SetFont('Times','B',13);
$pdf->Cell(50, 6, 'Komentar Penilai');
$pdf->Ln(8);
$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Kesesuaian penelitian dengan usulan:');
$pdf->Ln(5);
$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, $hasil['kom_sesuai']);
$pdf->Ln(7);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Ketercapaian luaran:');
$pdf->Ln(5);
$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, $hasil['kom_luaran']);
$pdf->Ln(8);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Potensi Keberlanjutan:');
$pdf->Ln(4);
$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, $hasil['kom_lanjut']);
$pdf->Ln(8);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Level TKT saat ini:');
$pdf->Ln(4);
$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, $hasil['kom_tkt']);
$pdf->Ln(8);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Relevansi Dengan Bidang Ilmu:');
$pdf->Ln(4);
$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, $hasil['kom_ilmu']);
$pdf->Ln(8);

$pdf->SetFont('Times','B',11);
$pdf->Cell(50, 6, 'Relevansi Dengan Mata Kuliah Yang Diajarkan (Pendidik/Dosen) atau Tupoksi (Tenaga Kependidikan):');
$pdf->Ln(4);
$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, $hasil['kom_mk']);
$pdf->Ln(8);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Keterlibatan Mahasiswa (Pendidik/Dosen):');
$pdf->Ln(4);
$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, $hasil['kom_mhs']);
$pdf->Ln(8);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Hambatan / Kendala:');
$pdf->Ln(4);
$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, $hasil['kom_kendala']);
$pdf->Ln(8);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Serapan Anggaran:');
$pdf->Ln(4);
$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, $hasil['kom_anggaran']);
$pdf->Ln(8);

$pdf->SetFont('Times','B',12);
$pdf->Cell(50, 6, 'Lain-Lain:');
$pdf->Ln(4);
$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, $hasil['kom_lain']);
$pdf->Ln(8);


$pdf->SetFont('Times','',12);
$tgl=$hasil['date_substansi'];
$date_substansi1=tanggal_indo($tgl);

$pdf->Ln(2);
$pdf->SetLeftMargin(120);
// $pdf->Cell(50,6,'Ambon, '.date('d M Y'));
$pdf->Cell(50,6,'Ambon, '.$date_substansi1);
$pdf->Ln();

$pdf->SetFont('Times','B',12);
$pdf->Cell(50,6,'Penilai');

$pdf->SetFont('Times','',12);
$pdf->Cell(50,10,'');
$pdf->Ln(30);
$ttd=$hasil['file_ttd'];
$cap=$hasil['file_cap'];
$pdf->Image("../assets/img/$ttd",125,237,35);
$pdf->Ln();

// $nama_penilai=$_SESSION['nama_admin'];
// $id_login=$_SESSION['id_login'];
$pdf->SetFont('Times','B','12');
$pdf->Cell(50,6, $hasil['nama']);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(50,6,'NIP: ' . $hasil['nip']);


// $pdf->Cell(50,6, $id_login);
$pdf->Output(); 
?>