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
$pdf->Cell(0,2,'SURAT REKOMENDASI BEASISWA',0,1,'C');
$pdf->Ln();
$pdf->SetLineWidth(0.3);
$pdf->line(142,47,68,47);
$pdf->SetFont('Times','',12);
$pdf->Cell(0,4,'No. : '.$hasil['nomor_surat'],0,1,'C');
$pdf->Ln();
$pdf->Cell(0, 6,'Yang bertanda tangan di bawah ini:');
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

$pdf->Cell(0, 10,'Dengan ini memberikan  rekomendasi  kepada  mahasiswa:');
$pdf->Ln();
$pdf->Cell(50, 6, 'N a m a');
$pdf->Cell(4, 6, ':');
$pdf->Cell(45, 6, $hasil['nama']);
$pdf->Ln();
$pdf->Cell(50, 6, 'NIM	');
$pdf->Cell(4, 6, ':');
$pdf->Cell(45, 6, $hasil['nim']);
$pdf->Ln();
$pdf->Cell(50, 6, 'Semester / Tahun Akademik');
$pdf->Cell(4, 6, ':');
$pdf->Cell(45, 6, $hasil['semester'].' / '. $hasil['thnakd']);
$pdf->Ln();
$pdf->Cell(50, 6, 'Program Studi');
$pdf->Cell(4,6, ':');
$pdf->Cell(50, 6, $hasil['prodi']);
$pdf->Ln();

$pdf->Cell(50, 6, 'Tempat, Tanggal Lahir');
    $nim=$hasil['nim'];
    $q="SELECT surat.nim, reg.*
    FROM surat 
    INNER JOIN reg ON reg.nim=surat.nim
    WHERE surat.nim='$nim'";
    $sql2=mysqli_query($conn,$q);
    $result=mysqli_fetch_assoc($sql2);
    $lahir=$result['tglahir'];
    $tglhr=tanggal_indo($lahir);
$pdf->Cell(4,6, ':');
$pdf->Cell(50, 6, $result['tmplahir'].', '.$tglhr);

$pdf->Ln();
$pdf->Cell(50, 6, 'Alamat rumah');
$pdf->Cell(4,6, ':');
$pdf->MultiCell(0, 6, $hasil['alamat']);
$pdf->Ln();
$pdf->Cell(50, 6, 'Untuk pengurusan');
$pdf->Cell(4,6, ':');
$pdf->Cell(50, 6, $hasil['tujuan']);
$pdf->Ln(15);

$pdf->MultiCell(0, 6,'Yang bersangkutan benar aktif sebagai mahasiswa Fakutas Teknik Universitas Pattimura dan memiliki catatan akademik yang baik serta belum pernah menerima beasiswa dari jalur lain, sehingga dipandang  layak untuk menerima beasiswa.

Demikian  Surat Keterangan  ini  dibuat  untuk  dipergunakan  sebagaimana mestinya.
');
$pdf->Ln(8);

$tgl=$hasil['date_signature'];
$date_signature=tanggal_indo($tgl);

$pdf->Ln();
$pdf->SetLeftMargin(120);
$pdf->Cell(50,5,'Ambon, '.$date_signature);
$pdf->Ln();
$pdf->Cell(50,4,'a.n. Dekan,');
$pdf->Ln();
$pdf->Cell(50,4,'Wakil Dekan Bidang Kemahasiswaan');
$pdf->Ln();
$pdf->Cell(50,4,'& Alumni');
$pdf->Ln();
$pdf->Cell(50,10,'');
$pdf->Ln();
$ttd=$hasil['ttd'];
$cap=$hasil['cap'];
if(!$ttd){
    echo "";
}else{

$pdf->Image("../assets/img/".$cap. "",109,208,35);
$pdf->Image("../assets/img/".$ttd. "",130,220,35);
}
$pdf->Ln();

$pdf->SetFont('Times','B','12');
$pdf->Cell(50,4,' J. M. Tupan, ST., MT. ');
$pdf->Ln();
$pdf->Cell(50,4,'NIP: 197807272002121001');
$pdf->Image('../assets/img/blu.png',180,260,15);
$pdf->Output();

