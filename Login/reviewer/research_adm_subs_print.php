
<?php 
require ('../link.php');
include '../assets/fungsi.php';
require('../libs/fpdf184/fpdf.php');


$id=$_GET['id'];
$query="SELECT research_nilai_adm.*, research.*, reg.*, mstr_prodi.*, mstr_fakultas.*
        FROM research_nilai_adm 
        INNER JOIN research ON research.id_research=research_nilai_adm.id_research
        LEFT JOIN reg ON reg.nidn=research.nidn_ketua
        LEFT JOIN mstr_prodi ON mstr_prodi.id_prodi=reg.prodi
        LEFT JOIN mstr_fakultas ON mstr_fakultas.id_fakultas=reg.fakultas
        WHERE research.id_research=$id";
$sql=mysqli_query($conn,$query);
$hasil=mysqli_fetch_assoc($sql);

$pdf = new FPDF('L','mm','A4');
// $pdf=new FPDF(); 
$pdf->SetMargins('1','15');

$pdf->AddPage();
// header
$pdf->Image('../assets/img/Logo_unpatti.png',50,13,-250);
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
$pdf->Cell(0,2,'LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT',0,1,'C');
$pdf->Ln();
$pdf->Setfont('Times','','12');
$pdf->Cell(0,2,'Jalan. Ir. M. Putuhena Lt. 2  Ged. Lab. Terpadu Pendukung Blok Masela Kampus Poka',0,1,'C');
$pdf->Ln();
$pdf->Setfont('Times','','11');
$pdf->Cell(0,2,'Telp. (0911)3824911, Fax. (0911)3824992; e-mail: lppm@unpatti.ac.id. Web:lppm.unpatti.ac.id',0,1,'C');
$pdf->SetLineWidth(0.5);
$pdf->line(255,42,45,42);

$pdf->Ln(10);
// endHeader

//body
$pdf->SetMargins('20','8');

$pdf->SetFont('Times','B',14);
$pdf->Cell(0,1,'Penilaian Proposal Penelitian',0,1,'C');
$pdf->Ln(4);

$pdf->SetLineWidth(0.3);
$pdf->line(191,52,125,52);
$pdf->Ln(7);


$pdf->SetMargins('45','0');
$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, 'Judul');
$pdf->Cell(4, 6, ':');
$pdf->MultiCell(160,5, $hasil['judul']);
$pdf->Ln(3);

$pdf->Cell(50, 6, 'Skema Penelitian');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, $hasil['nama_skema']);
$pdf->Ln(6);

$pdf->Cell(50, 6, 'Program Penelitian');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, $hasil['nama_sub_skema']);
$pdf->Ln(6);

$pdf->Cell(50, 6, 'TKT');
$pdf->Cell(4, 6, ':');
$pdf->MultiCell(160,5, $hasil['target_tkt']);
$pdf->Ln(3);

$pdf->Cell(50, 6, 'Ketua Peneliti');
// $pdf->Cell(4, 6, ':');
// $pdf->MultiCell(160,5, $hasil['target_tkt']);
$pdf->Ln(6);

$pdf->Cell(50, 6, 'a. Nama Lengkap');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, $hasil['nama_ketua']);
$pdf->Ln(6);

$pdf->Cell(50, 6, 'b. Fakultas/ Prodi');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, $hasil['fakultas_name'].' / ' .$hasil['prodi']);
$pdf->Ln(6);

$pdf->Cell(50, 6, 'c. NIDN');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, $hasil['nidn_ketua']);
$pdf->Ln(6);

$pdf->Cell(50, 6, 'd. SINTA ID');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, $hasil['sinta_id_ketua']);
$pdf->Ln(6);

$pdf->Cell(50, 6, 'e. Score Sinta dan H-index');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, $hasil['hindex']);
$pdf->Ln(6);

$pdf->Cell(50, 6, 'f. Jabatan Fungsional');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, $hasil['jafung']);
$pdf->Ln(10);


// untuk mengetahui jumlah dosen yang terlibat
$query_jd= "SELECT id_research,
COUNT(id_research) as idPenelitian,
COUNT(IF(nidn_member1!='', nidn_member1, NULL)) as dosen1,
    COUNT(IF(nidn_member2!='', nidn_member2, NULL)) as dosen2,
    COUNT(IF(nidn_member3!='', nidn_member3, NULL)) as dosen3,
    COUNT(IF(nidn_member4!='', nidn_member4, NULL)) as dosen4,
    COUNT(IF(nidn_member5!='', nidn_member5, NULL)) as dosen5
FROM research
Where id_research=$id"; 

$sql_jd=mysqli_query($conn,$query_jd);
$hasil_jd=mysqli_fetch_assoc($sql_jd);
$totaldosen=$hasil_jd['dosen1']+$hasil_jd['dosen2']+$hasil_jd['dosen3']+$hasil_jd['dosen4']+$hasil_jd['dosen5'];
// End untuk mengetahui jumlah dosen yang terlibat

$pdf->Cell(50, 6, 'Anggota Peneliti');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, 'Dosen '.$totaldosen .' Orang');
$pdf->Ln(6);

// untuk mengetahui jumlah mahasiswa yang terlibat
$query_jm= "SELECT id_research,
COUNT(id_research) as idPenelitian,
COUNT(IF(nim_mhs_1!='', nim_mhs_1, NULL)) as mhs1,
COUNT(IF(nim_mhs_2!='', nim_mhs_2, NULL)) as mhs2,
COUNT(IF(nim_mhs_3!='', nim_mhs_3, NULL)) as mhs3
FROM research
Where id_research=$id"; 

$sql_jm=mysqli_query($conn,$query_jm);
$hasil_jm=mysqli_fetch_assoc($sql_jm);
$totalmhs=$hasil_jm['mhs1']+$hasil_jm['mhs2']+$hasil_jm['mhs3'];

// End untuk mengetahui jumlah mahasiswa yang terlibat
$pdf->Cell(50, 6, '  ');
$pdf->Cell(4, 6, '');
$pdf->Cell(120,5, 'Mahasiswa '.$totalmhs .' Orang');
$pdf->Ln(8);

$pdf->Cell(50, 6, 'Lama Penelitian ');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, $hasil['lama_kegiatan'].' Tahun');
$pdf->Ln(8);

$pdf->Cell(50, 6, 'Biaya Penelitian ');
$pdf->Ln(6);

$pdf->Cell(50, 6, 'a. Dana Usulan ');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, 'Rp. '. $hasil['dana_usulan']);
$pdf->Ln(6);

$pdf->Cell(50, 6, 'b. Direkomendasikan ');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, 'Rp. '. $hasil['dana_disetujui']);
$pdf->Ln(10);


// table
// Simple table
//header table
$pdf->SetMargins('10','15');
$pdf->Ln(0);
$pdf->SetFont('Times','B','10');
$pdf->Cell(6,7,'No',1);
$pdf->SetFont('Times','B','12');
$pdf->Cell(80,7,'Aspek Penilaian',1,0,'C');
$pdf->Cell(160,7,'Kriteria',1,0,'C');
$pdf->Cell(11,7,'Point',1,0,'C');
$pdf->Cell(12,7,'Bobot',1,0,'C');
$pdf->Cell(11,7,'Nilai',1,0,'C');
$pdf->Ln();


//isi table
$pdf->SetFont('Times','',12);
$pdf->Cell(6,7,'1',1);
$pdf->Cell(80,7,'Urgensi Penelitian',1);
$pdf->SetFont('Times','',11);
if($hasil['urgensi']==4){
        $ur='Penelitian yang diusulkan memiliki nilai urgensi';
}elseif($hasil['urgensi']==3){$ur='Penelitian yang diusulkan cukup memiliki nilai urgensi';}elseif($hasil['urgensi']==2){$ur='Penelitian yang diusulkan kurang memiliki nilai urgensi';}
else {$ur='Penelitian yang diusulkan tidak memiliki nilai urgensi';}

$pdf->Cell(160,7,$ur,1);

$pdf->SetFont('Times','',12);
$pdf->Cell(11,7,$hasil['urgensi'],1,0,'C');
$pdf->Cell(12,7,'20',1,0,'C');
$nilaiUr=$hasil['urgensi']*20;
$pdf->Cell(11,7,$nilaiUr,1,1,'C');
// $pdf->Ln();

$pdf->SetFont('Times','',12);
$pdf->Cell(6,7,'2',1);
$pdf->Cell(80,7,'Orisinalitas dan Novelty Penelitian',1);
$pdf->SetFont('Times','',11);
if($hasil['novelty']==4){
        $nov='Proposal memiliki nilai orisinal dan kebaruan (novelty)';
}elseif($hasil['novelty']==3){$nov='Proposal memiliki nilai orisinal dan cukup kebaruan (modifikasi)';}elseif($hasil['novelty']==2){$nov='Penelitian serupa pernah dilakukan sebelumnya, namun hanya variasi minor (replikasi)';}
else {$nov='Penelitian yang sama pernah dilakukan sebelumnya';}

$pdf->Cell(160,7,$nov,1);

$pdf->SetFont('Times','',12);
$pdf->Cell(11,7,$hasil['novelty'],1,0,'C');
$pdf->Cell(12,7,'20',1,0,'C');
$nilaiNo=$hasil['novelty']*20;
$pdf->Cell(11,7,$nilaiNo,1,1,'C');

$pdf->SetFont('Times','',12);
$pdf->Cell(6,7,'3',1);

$pdf->SetFont('Times','',10);
$pdf->Cell(80,7,'Kaitan Penelitian dengan PIP & RIP Penelitian Unpatti',1);

$pdf->SetFont('Times','',11);
if($hasil['kaitan']==4){
        $ka='Proposal memiliki kaitan dengan PIP dan RIP Penelitian Unpatti';
}elseif($hasil['kaitan']==3){$ka='Proposal cukup memiliki kaitan dengan PIP dan RIP Penelitian Unpatti';}elseif($hasil['kaitan']==2){$ka='Proposal kurang memiliki kaitan dengan PIP dan RIP Penelitian Unpatti';}
else {$ka='Proposal tidak memiliki kaitan dengan PIP dan RIP Penelitian Unpatti';}

$pdf->Cell(160,7,$ka,1);

$pdf->SetFont('Times','',12);
$pdf->Cell(11,7,$hasil['kaitan'],1,0,'C');
$pdf->Cell(12,7,'15',1,0,'C');
$nilaiKa=$hasil['kaitan']*15;
$pdf->Cell(11,7,$nilaiKa,1,1,'C');

$pdf->SetFont('Times','',12);
$pdf->Cell(6,7,'4',1);
$pdf->Cell(80,7,'Peta Jalan Penelitian',1);

$pdf->SetFont('Times','',10);
if($hasil['peta']==4){
        $pe='Peneliti memiliki peta jalan penelitian yang terkait dengan  penelitian yang diusulkan';
}elseif($hasil['peta']==3){$pe='Peneliti memiliki peta jalan penelitian yang cukup terkait dengan penelitian yang diusulkan';}elseif($hasil['peta']==2){$pe='Peneliti memiliki peta jalan penelitian yang kurang terkait dengan penelitian yang diusulkan';}
else {$pe='Peneliti tidak memiliki peta jalan penelitian';}

$pdf->Cell(160,7,$pe,1);

$pdf->SetFont('Times','',12);
$pdf->Cell(11,7,$hasil['peta'],1,0,'C');
$pdf->Cell(12,7,'15',1,0,'C');
$nilaiPe=$hasil['peta']*15;
$pdf->Cell(11,7,$nilaiPe,1,1,'C');

$pdf->SetFont('Times','',12);
$pdf->Cell(6,7,'5',1);
$pdf->Cell(80,7,'Rekam Jejak Tim Peneliti',1);
$pdf->SetFont('Times','',8.5);
if($hasil['jejak']==4){
        $Je='Peneliti memiliki rekam jejak penelitian & terkait penelitian yang diusulkan (memiliki karya internasional bereputasi yang relevan)';
}elseif($hasil['jejak']==3){$Je='Peneliti memiliki rekam jejak penelitian, namun  cukup terkait dengan penelitian yang diusulkan';}elseif($hasil['jejak']==2){$Je='Peneliti memiliki rekam jejak penelitian, namun  kurang terkait dengan penelitian yang diusulkan';}
else {$Je='Peneliti memiliki rekam jejak penelitian, namun tidak terkait dengan penelitian yang diusulkan';}

$pdf->Cell(160,7,$Je,1);

// $pdf->Cell(150,7,'Memiliki rekam jejak penelitian & terkait dengan penelitian yang diusulkan (memiliki karya internasional bereputasi yang relevan)',1);

$pdf->SetFont('Times','',12);
$pdf->Cell(11,7,$hasil['jejak'],1,0,'C');
$pdf->Cell(12,7,'20',1,0,'C');
$nilaiJe=$hasil['jejak']*20;
$pdf->Cell(11,7,$nilaiJe,1,1,'C');

$pdf->Cell(6,7,'6',1);
$pdf->Cell(80,7,'Mutu Proposal',1);

$pdf->SetFont('Times','',9);
if($hasil['mutu']==4){
        $Mu='Proposal disusun sesuai panduan dan pustaka primer lebih dari 80% artikel internasional 10 tahun terakhir';
}elseif($hasil['mutu']==3){$Mu='Proposal disusun kurang sesuai panduan, namun  pustaka primer lebih dari 80%  artikel internasional 10 tahun terakhir';}elseif($hasil['mutu']==2){$Mu='Proposal disusun sesuai panduan, namun pustaka kurang dari 80% artikel internasional 10 tahun terakhir';}
else {$Mu='Proposal disusun tidak sesuai panduan dan pustaka kurang dari 80% artikel internasional 10 tahun terakhir';}

$pdf->Cell(160,7,$Mu,1);

$pdf->SetFont('Times','',12);
$pdf->Cell(11,7,$hasil['mutu'],1,0,'C');
$pdf->Cell(12,7,'10',1,0,'C');
$nilaiMu=$hasil['mutu']*10;
$pdf->Cell(11,7,$nilaiMu,1,1,'C');

$pdf->Cell(6,7,'7',1);
$pdf->Cell(80,7,'Rasionalitas Alokasi Dana',1);
$pdf->SetFont('Times','',11);

if($hasil['dana']==4){
        $Da='Proposal memiliki alokasi rencana anggaran biaya penelitian rasional';
}elseif($hasil['dana']==3){$Da='Proposal memiliki alokasi rencana anggaran biaya penelitian cukup rasional';}elseif($hasil['dana']==2){$Da='Proposal memiliki alokasi rencana anggaran biaya penelitian kurang rasional';}
else {$Da='Proposal memiliki alokasi rencana anggaran biaya penelitian tidak rasional';}

$pdf->Cell(160,7,$Da,1);

// $pdf->Cell(160,7,'Memiliki rekam jejak penelitian & terkait dengan penelitian yang diusulkan (memiliki karya internasional bereputasi yang relevan)',1);
$pdf->SetFont('Times','',12);
$pdf->Cell(11,7,$hasil['dana'],1,0,'C');
$pdf->Cell(12,7,'10',1,0,'C');
$nilaiDa=$hasil['dana']*10;
$pdf->Cell(11,7,$nilaiDa,1,1,'C');


$pdf->SetFont('Times','',12);
$pdf->Cell(6,7,'8',1);
$pdf->Cell(80,7,'Potensi Target Luaran',1);
$pdf->SetFont('Times','',11);

if($hasil['luaran']==4){
        $Lu='Proposal memiliki target luaran penelitian yang berpotensi untuk dicapai';
}elseif($hasil['luaran']==3){$Lu='Proposal memiliki target luaran penelitian yang cukup berpotensi untuk dicapai';}elseif($hasil['luaran']==2){$Lu='Proposal memiliki target luaran penelitian yang kurang berpotensi untuk dicapai';}
else {$Lu='Proposal tidak memiliki target luaran penelitian';}

$pdf->Cell(160,7,$Lu,1);

// $pdf->Cell(160,7,'Memiliki rekam jejak penelitian & terkait dengan penelitian yang diusulkan (memiliki karya internasional bereputasi yang relevan)',1);
$pdf->SetFont('Times','',12);
$pdf->Cell(11,7,$hasil['luaran'],1,0,'C');
$pdf->Cell(12,7,'15',1,0,'C');
$nilaiLu=$hasil['luaran']*15;
$pdf->Cell(11,7,$nilaiLu,1,1,'C');

$pdf->SetFont('Times','B',12);
$pdf->Cell(269,7,'Total Nilai',1,0,'C');
$pdf->Cell(11,7,$hasil['total_nilai'],1);
$pdf->Ln();
//endSimpleTable

// komentar
$pdf->SetFont('Times','',12);
$pdf->Cell(50,6,'Komentar dari Reviewer :');
$pdf->MultiCell(180,6,$hasil['komentar']);
// $pdf->MultiCell(160,5, $hasil['target_tkt']);


$pdf->SetFont('Times','',12);
$tgl=$hasil['date_signature'];
$date_signature=tanggal_indo($tgl);

$pdf->Ln(10);
$pdf->SetLeftMargin(180);

$pdf->Cell(50,6,'Ambon, '.$date_signature);
$pdf->Ln();

$pdf->Cell(50,6,'Ketua');
$pdf->Ln(30);

$ttd=$hasil['ttd'];
$cap=$hasil['cap'];
$pdf->Image("../assets/img/ttdVictor.png",190,120,35);


$pdf->Ln();

$pdf->SetFont('Times','B','12');
$pdf->Cell(50,6,'Dr. E. K. Huliselan, M.Si');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(50,6,'NIP: 19760804 200112 1 002');

$pdf->Image('../assets/img/blu.png',180,260,15);

//endBody

$pdf->Output(); 
?>