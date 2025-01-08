
<?php 
require ('../link.php');
include '../assets/fungsi.php';
require('../libs/fpdf184/fpdf.php');


$id=$_GET['id'];
$query="SELECT research_nilai_adm.*, research.judul, research.nama_ketua
        FROM research_nilai_adm 
        INNER JOIN research ON research.id_research=research_nilai_adm.id_research
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

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,1,'Penilaian Proposal Penelitian',0,1,'C');
$pdf->Ln(4);

$pdf->SetLineWidth(0.3);
$pdf->line(187,52,130,52);
$pdf->Ln(2);


$pdf->SetMargins('45','0');
$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->Cell(50, 6, 'Judul');
$pdf->Cell(4, 6, ':');
$pdf->MultiCell(160,5, $hasil['judul']);
$pdf->Ln(3);
$pdf->Cell(50, 6, 'Ketua');
$pdf->Cell(4, 6, ':');
$pdf->Cell(120,5, $hasil['nama_ketua']);
$pdf->Ln(10);


// table
// Simple table
//header table
$pdf->SetMargins('10','0');
$pdf->Ln(0);
$pdf->SetFont('Times','B','10');
$pdf->Cell(6,7,'No',1);
$pdf->Cell(80,7,'Aspek Penilaian',1,0,'C');
$pdf->Cell(150,7,'Kriteria',1,0,'C');
$pdf->Cell(10,7,'Point',1);
$pdf->Cell(11,7,'Bobot',1);
$pdf->Cell(11,7,'Nilai',1);
$pdf->Ln();


//isi table
$pdf->SetFont('Times','',10);
$pdf->Cell(6,7,'1',1);
$pdf->Cell(80,7,'Urgensi Penelitian',1);
$pdf->SetFont('Times','',10);
if($hasil['urgensi']=4){
        $ur='Penelitian yang diusulkan memiliki nilai urgensi';
}elseif($hasil['urgensi']=3){$ur='Penelitian yang diusulkan cukup memiliki nilai urgensi';}elseif($hasil['urgensi']=2){$ur='Penelitian yang diusulkan kurang memiliki nilai urgensi';}
else {$ur='Penelitian yang diusulkan tidak memiliki nilai urgensi';}


$pdf->Cell(150,7,$ur,1);

$pdf->SetFont('Times','',10);
$pdf->Cell(10,7,$hasil['urgensi'],1,0,'C');
$pdf->Cell(11,7,'20',1,0,'C');
$nilaiUr=$hasil['urgensi']*20;
$pdf->Cell(11,7,$nilaiUr,1,1,'C');
// $pdf->Ln();

$pdf->Cell(6,7,'2',1);
$pdf->Cell(80,7,'Orisinalitas dan Novelty Penelitian',1);
$pdf->SetFont('Times','',8);
$pdf->Cell(150,7,'Memiliki rekam jejak penelitian & terkait dengan penelitian yang diusulkan (memiliki karya internasional bereputasi yang relevan)',1);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,7,$hasil['novelty'],1,0,'C');
$pdf->Cell(11,7,'20',1,0,'C');
$nilaiNo=$hasil['novelty']*20;
$pdf->Cell(11,7,$nilaiNo,1,1,'C');

$pdf->Cell(6,7,'3',1);
$pdf->Cell(80,7,'Kaitan Penelitian dengan PIP & RIP Penelitian Unpatti',1);
$pdf->SetFont('Times','',8);
$pdf->Cell(150,7,'Memiliki rekam jejak penelitian & terkait dengan penelitian yang diusulkan (memiliki karya internasional bereputasi yang relevan)',1);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,7,$hasil['kaitan'],1,0,'C');
$pdf->Cell(11,7,'15',1,0,'C');
$nilaiKa=$hasil['kaitan']*15;
$pdf->Cell(11,7,$nilaiKa,1,1,'C');

$pdf->Cell(6,7,'4',1);
$pdf->Cell(80,7,'Peta Jalan Penelitian',1);
$pdf->SetFont('Times','',8);
$pdf->Cell(150,7,'Memiliki rekam jejak penelitian & terkait dengan penelitian yang diusulkan (memiliki karya internasional bereputasi yang relevan)',1);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,7,$hasil['peta'],1,0,'C');
$pdf->Cell(11,7,'15',1,0,'C');
$nilaiPe=$hasil['peta']*15;
$pdf->Cell(11,7,$nilaiPe,1,1,'C');

$pdf->Cell(6,7,'5',1);
$pdf->Cell(80,7,'Rekam Jejak Tim Peneliti',1);
$pdf->SetFont('Times','',8);
$pdf->Cell(150,7,'Memiliki rekam jejak penelitian & terkait dengan penelitian yang diusulkan (memiliki karya internasional bereputasi yang relevan)',1);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,7,$hasil['jejak'],1,0,'C');
$pdf->Cell(11,7,'20',1,0,'C');
$nilaiJe=$hasil['jejak']*20;
$pdf->Cell(11,7,$nilaiJe,1,1,'C');

$pdf->Cell(6,7,'6',1);
$pdf->Cell(80,7,'Mutu Proposal',1);
$pdf->SetFont('Times','',8);
$pdf->Cell(150,7,'Memiliki rekam jejak penelitian & terkait dengan penelitian yang diusulkan (memiliki karya internasional bereputasi yang relevan)',1);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,7,$hasil['mutu'],1,0,'C');
$pdf->Cell(11,7,'10',1,0,'C');
$nilaiMu=$hasil['mutu']*10;
$pdf->Cell(11,7,$nilaiMu,1,1,'C');

$pdf->Cell(6,7,'7',1);
$pdf->Cell(80,7,'Rasionalitas Alokasi Dana',1);
$pdf->SetFont('Times','',8);
$pdf->Cell(150,7,'Memiliki rekam jejak penelitian & terkait dengan penelitian yang diusulkan (memiliki karya internasional bereputasi yang relevan)',1);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,7,$hasil['dana'],1,0,'C');
$pdf->Cell(11,7,'10',1,0,'C');
$nilaiDa=$hasil['dana']*10;
$pdf->Cell(11,7,$nilaiDa,1,1,'C');

$pdf->Cell(6,7,'8',1);
$pdf->Cell(80,7,'Potensi Target Luaran',1);
$pdf->SetFont('Times','',8);
$pdf->Cell(150,7,'Memiliki rekam jejak penelitian & terkait dengan penelitian yang diusulkan (memiliki karya internasional bereputasi yang relevan)',1);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,7,$hasil['luaran'],1,0,'C');
$pdf->Cell(11,7,'15',1,0,'C');
$nilaiLu=$hasil['luaran']*15;
$pdf->Cell(11,7,$nilaiLu,1,1,'C');


$pdf->SetFont('Times','B',12);
$pdf->Cell(257,7,'Total Nilai',1,0,'C');
$pdf->Cell(11,7,$hasil['total_nilai'],1);
$pdf->Ln();
//endSimpleTable


$pdf->SetFont('Times','',12);
$tgl=$hasil['date_signature'];
$date_signature=tanggal_indo($tgl);

$pdf->Ln(10);
$pdf->SetLeftMargin(120);
// $pdf->Cell(50,6,'Ambon, '.date('d M Y'));
$date_ttd=date('d M Y');
$pdf->Cell(50,6,'Ambon, '.$date_ttd);
$pdf->Ln();

$pdf->Cell(50,6,'Ketua');

$pdf->Cell(50,10,'');
$pdf->Ln(30);
$ttd=$hasil['ttd'];
$cap=$hasil['cap'];
$pdf->Image("../assets/img/ttdVictor.png",135,178,35);
// if(!$ttd){
//     echo "";
// }else{

// $pdf->Image('../assets/img/ttd.jpeg',132,232,35);
// $pdf->Image("../assets/img/".$cap. "",109,222,35);
// }

$pdf->Ln();

$pdf->SetFont('Times','B','12');
$pdf->Cell(50,6,'Prof. Dr. Melianus Salakory, M.Kes');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(50,6,'NIP: 196112061988031002');

$pdf->Image('../assets/img/blu.png',180,260,15);

//endBody

$pdf->Output(); 
?>