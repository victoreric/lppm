<?php
require ('../link.php');
include '../assets/fungsi.php';
require('../libs/fpdf184/fpdf.php');

$id=$_GET['id'];
$query="SELECT surat.*, prodi.* 
    FROM surat
    INNER JOIN prodi ON prodi.id_prodi=surat.prodi 
    WHERE id_surat=$id";
$sql=mysqli_query($conn,$query);
$hasil=mysqli_fetch_assoc($sql);

$pdf = new FPDF();
$pdf->SetMargins('20','8');

$pdf->AddPage();
// header
$pdf->Image('../assets/img/Logo_unpatti.png',17,7,-250);
$pdf->SetFont('Times','','16');
$pdf->cell(0,2,'KEMENTERIAN PENDIDIKAN KEBUDAYAAN',0,1,'C'); 
$pdf->Ln();
$pdf->cell(0,3,'RISET, DAN TEKNOLOGI',0,1,'C');
$pdf->Ln();
$pdf->SetFont('Times','B','14');
$pdf->Cell(0,2,'UNIVERSITAS PATTIMURA',0,1,'C');
$pdf->Ln();
$pdf->Cell(0,2,'FAKULTAS TEKNIK',0,1,'C');
$pdf->Ln();
$pdf->Setfont('Times','','12');
$pdf->Cell(0,2,'Jalan. Ir. M. Putuhena, Kampus Unpatti Ambon, Kode Pos 97233',0,1,'C');
$pdf->Ln();
$pdf->Cell(0,2,'Telepon/Faximili: (0911) 3684030',0,1,'C');
$pdf->Ln();
$pdf->Cell(0,2,'Laman  : http://fatek.unpatti.ac.id',0,1,'C');
$pdf->Ln(8);

$pdf->SetLineWidth(0.5);
$pdf->line(190,38,20,38);

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,2,'SURAT KETERANGAN',0,1,'C');
$pdf->Ln();
$pdf->Cell(0,2,'KARTU TANDA MAHASISWA SEMENTARA',0,1,'C');
$pdf->Ln();
$pdf->SetLineWidth(0.3);
$pdf->line(150,51,60,51);
$pdf->SetFont('Times','',12);
$pdf->Cell(0,4,'No. : '.$hasil['nomor_surat'],0,1,'C');
$pdf->Ln();
$pdf->Cell(0, 6,'Yang bertanda tangan di bawah ini  :');
$pdf->Ln();
$pdf->Cell(50, 6, 'N a m a');
$pdf->Cell(4, 6, ':');
$pdf->Cell(45, 6, 'J. M. Tupan, ST., MT');
$pdf->Ln();
$pdf->Cell(50, 6, 'NIP');
$pdf->Cell(4, 6, ':');
$pdf->Cell(45, 6, '197807272002121001');
$pdf->Ln();
$pdf->Cell(50, 6, 'Pangkat/ Golongan ruang');
$pdf->Cell(4, 6, ':');
$pdf->Cell(45, 6, 'Penata Tk.I /III.d');
$pdf->Ln();
$pdf->Cell(50, 6, 'J a b a t a n');
$pdf->Cell(4,6, ':');
$pdf->Cell(45, 6, 'Wakil Dekan Bidang Kemahasiswaan & Alumni');
$pdf->Ln();
$pdf->Cell(50, 6, 'Unit kerja');
$pdf->Cell(4,6, ':');
$pdf->Cell(45, 6, 'Fakultas Teknik Unpatti');
$pdf->Ln();

$pdf->Cell(0, 10,'Dengan ini menyatakan bahwa :');
$pdf->Ln();
$pdf->Cell(50, 6, 'N a m a');
$pdf->Cell(4, 6, ':');
$pdf->Cell(45, 6, $hasil['nama']);
$pdf->Ln();
$pdf->Cell(50, 6, 'NIM	');
$pdf->Cell(4, 6, ':');
$pdf->Cell(45, 6, $hasil['nim']);
$pdf->Ln(8);

$pdf->MultiCell(0, 6,'Adalah benar-benar, mahasiswa pada Progam Studi '.$hasil['prodi'].'  Fakultas Teknik Universitas Pattimura Ambon. Surat Keterangan ini dapat digunakan sebagai  bukti visual untuk berbagai kepentingan dan kebutuhan mahasiswa yang bersangkutan, sambil  menunggu diterbitkannnya Kartu Tanda Mahasiswa (KTM) resmi dari Pihak Universitas Pattimura.
Surat Keterangan ini berlaku selama enam (6) bulan, terhitung sejak surat ini dibuat.

Demikian  Surat Keterangan  ini  dibuat  untuk  dipergunakan  sebagaimana mestinya.
');
$pdf->Ln(8);

$tgl=$hasil['date_signature'];
$date_signature=tanggal_indo($tgl);

$pdf->Ln();
$pdf->SetLeftMargin(120);
$pdf->Cell(50,6,'Ambon, '.$date_signature);
$pdf->Ln();
$pdf->Cell(50,6,'a.n. Dekan,');
$pdf->Ln();
$pdf->Cell(50,6,'Wakil Dekan Bidang Kemahasiswaan  ');
$pdf->Ln();
$pdf->Cell(50,6,'& Alumni');
$pdf->Ln();
$pdf->Cell(50,10,'');
$pdf->Ln();
$ttd=$hasil['ttd'];
$cap=$hasil['cap'];
if(!$ttd){
    echo "";
}else{

$pdf->Image("../assets/img/".$cap. "",109,190,35);
$pdf->Image("../assets/img/".$ttd. "",130,200,35);
}
$pdf->Ln();

$pdf->SetFont('Times','B','12');
$pdf->Cell(50,6,' J. M. Tupan,ST., MT. ');
$pdf->Ln();
$pdf->Cell(50,6,'NIP: 197807272002121001');
$pdf->Image('../assets/img/blu.png',180,260,15);
$pdf->Output();

