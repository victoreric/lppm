<?php
require ('../link.php');
include '../assets/fungsi.php';
require ('../../libs/fpdf184/fpdf.php');

$id=$_GET['id'];
$queri="SELECT *, sah_usulan.id_research, reg.*, mstr_prodi.*, login.*
FROM research
LEFT JOIN sah_usulan ON sah_usulan.id_research=research.id_research
LEFT JOIN reg ON reg.nidn=research.nidn_ketua
LEFT JOIN mstr_prodi ON mstr_prodi.id_prodi=reg.prodi
LEFT JOIN login ON login.id_login=sah_usulan.id_login
WHERE research.id_research=$id";

$sql=mysqli_query($conn,$queri);
$hasil=mysqli_fetch_assoc($sql);

$pdf = new FPDF();
$pdf->AddPage();

$pdf->Ln(12);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,1,'HALAMAN PENGESAHAN PROPOSAL PENELITIAN',0,0,'C');
$pdf->SetLineWidth(0.5);
$pdf->line(160,25,50,25);
$pdf->Ln(10);
$pdf->SetLeftMargin('15');

$pdf->SetFont('Times','B',12);
$pdf->Cell(70, 6, 'Judul');
$pdf->Cell(4, 6, ':');
$pdf->MultiCell(110,5, $hasil['judul']);

$pdf->Ln(2);
$pdf->Cell(70, 6, 'Ketua Pengusul');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(70, 6, 'Nama Lengkap');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, $hasil['nama_ketua']);
$pdf->Ln();
$pdf->Cell(70, 6, 'NIDN/NIDK');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, $hasil['nidn_ketua']);
$pdf->Ln();
$pdf->Cell(70, 6, 'Jabatan Fungsional');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi Jabatan Fungsional');
$pdf->Ln();
$pdf->Cell(70, 6, 'Program Studi');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, $hasil['prodi']);
$pdf->Ln();
$pdf->Cell(70, 6, 'Nomor HP');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, $hasil['hp']);
$pdf->Ln();
$pdf->Cell(70, 6, 'Alamat surel (e-mail)');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,6, $hasil['email']);
$pdf->Ln();
$pdf->Cell(70, 6, 'Overall SINTA Score/H-index Scopus');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi sinta');

$pdf->Ln(8);

$pdf->SetFont('Times','B',12);
$pdf->Cell(70, 6, 'Anggota 1');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(70, 6, 'Nama Lengkap');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, $hasil['nama_member1']);
$pdf->Ln();
$pdf->Cell(70, 6, 'NIDN/NIDK');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, $hasil['nidn_member1']);
$pdf->Ln();
$pdf->Cell(70, 6, 'Jabatan Fungsional');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi Jabatan Fungsional');
$pdf->Ln();
$pdf->Cell(70, 6, 'Program Studi');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi prodi');
$pdf->Ln();
$pdf->Cell(70, 6, 'Nomor HP');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi HP');
$pdf->Ln();
$pdf->Cell(70, 6, 'Alamat surel (e-mail)');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,6, 'isi email');
$pdf->Ln();
$pdf->Cell(70, 6, 'Overall SINTA Score/H-index Scopus');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi sinta');
$pdf->Ln(8);


$pdf->SetFont('Times','B',12);
$pdf->Cell(70, 6, 'Anggota 2');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(70, 6, 'Nama Lengkap');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'nama lengkap');
$pdf->Ln();
$pdf->Cell(70, 6, 'NIDN/NIDK');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi nidk');
$pdf->Ln();
$pdf->Cell(70, 6, 'Jabatan Fungsional');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi Jabatan Fungsional');
$pdf->Ln();
$pdf->Cell(70, 6, 'Program Studi');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi prodi');
$pdf->Ln();
$pdf->Cell(70, 6, 'Nomor HP');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi HP');
$pdf->Ln();
$pdf->Cell(70, 6, 'Alamat surel (e-mail)');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,6, 'isi email');
$pdf->Ln();
$pdf->Cell(70, 6, 'Overall SINTA Score/H-index Scopus');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi sinta');
$pdf->Ln(8);


$pdf->SetFont('Times','B',12);
$pdf->Cell(70, 6, 'Anggota 3');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(70, 6, 'Nama Lengkap');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'nama lengkap');
$pdf->Ln();
$pdf->Cell(70, 6, 'NIDN/NIDK');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi nidk');
$pdf->Ln();
$pdf->Cell(70, 6, 'Jabatan Fungsional');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi Jabatan Fungsional');
$pdf->Ln();
$pdf->Cell(70, 6, 'Program Studi');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi prodi');
$pdf->Ln();
$pdf->Cell(70, 6, 'Nomor HP');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi HP');
$pdf->Ln();
$pdf->Cell(70, 6, 'Alamat surel (e-mail)');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,6, 'isi email');
$pdf->Ln();
$pdf->Cell(70, 6, 'Overall SINTA Score/H-index Scopus');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi sinta');
$pdf->Ln(8);


$pdf->SetFont('Times','B',12);
$pdf->Cell(70, 6, 'Anggota 4');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(70, 6, 'Nama Lengkap');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'nama lengkap');
$pdf->Ln();
$pdf->Cell(70, 6, 'NIDN/NIDK');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi nidk');
$pdf->Ln();
$pdf->Cell(70, 6, 'Jabatan Fungsional');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi Jabatan Fungsional');
$pdf->Ln();
$pdf->Cell(70, 6, 'Program Studi');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi prodi');
$pdf->Ln();
$pdf->Cell(70, 6, 'Nomor HP');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi HP');
$pdf->Ln();
$pdf->Cell(70, 6, 'Alamat surel (e-mail)');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,6, 'isi email');
$pdf->Ln();
$pdf->Cell(70, 6, 'Overall SINTA Score/H-index Scopus');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi sinta');
$pdf->Ln(8);


$pdf->SetFont('Times','B',12);
$pdf->Cell(70, 6, 'Anggota 5');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(70, 6, 'Nama Lengkap');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'nama lengkap');
$pdf->Ln();
$pdf->Cell(70, 6, 'NIDN/NIDK');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi nidk');
$pdf->Ln();
$pdf->Cell(70, 6, 'Jabatan Fungsional');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi Jabatan Fungsional');
$pdf->Ln();
$pdf->Cell(70, 6, 'Program Studi');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi prodi');
$pdf->Ln();
$pdf->Cell(70, 6, 'Nomor HP');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi HP');
$pdf->Ln();
$pdf->Cell(70, 6, 'Alamat surel (e-mail)');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,6, 'isi email');
$pdf->Ln();
$pdf->Cell(70, 6, 'Overall SINTA Score/H-index Scopus');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'isi sinta');
$pdf->Ln(8);

$pdf->SetFont('Times','B',12);
$pdf->Cell(70, 6, 'Tingkat Kesiapan Teknologi (TKT)');

$pdf->SetFont('Times','',12);
$pdf->Cell(4, 6, ':');
// $pdf->Cell(70,5, $hasil['target_tkt']);
$pdf->MultiCell(110,4, $hasil['target_tkt']);
$pdf->Ln(8);

$pdf->SetFont('Times','B',12);
$pdf->Cell(70, 6, 'Jumlah mahasiswa yang terlibat');
$pdf->SetFont('Times','',12);
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'mhs');
$pdf->Ln(8);

$mhs1=$hasil['mhs_1'];
if($mhs1==''){
    $pdf->Cell(70, 6,'');
    $pdf->Ln();
}else {
$pdf->Ln(8);
$pdf->SetFont('Times','B',12);
$pdf->Cell(70, 6, 'Nama Mahasiswa (1)');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(70, 6, 'Nama Lengkap');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, $hasil['mhs_1']);
$pdf->Ln();
$pdf->Cell(70, 6, 'NIM ');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, $hasil['nim_mhs_1']);
$pdf->Ln();
$pdf->Cell(70, 6, 'Program Studi');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'prodi');
$pdf->Ln(8);
}

$mhs2=$hasil['mhs_2'];
if($mhs2==''){
    $pdf->Cell(70, 6,'');
    $pdf->Ln();
}else {
$pdf->SetFont('Times','B',12);
$pdf->Cell(70, 6, 'Nama Mahasiswa (2)');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(70, 6, 'Nama Lengkap ');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'nm');
$pdf->Ln();
$pdf->Cell(70, 6, 'NIM ');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'NIM');
$pdf->Ln();
$pdf->Cell(70, 6, 'Program Studi');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'prodi');
$pdf->Ln(8);
}

$mhs3=$hasil['mhs_3'];
if($mhs3==''){
    $pdf->Cell(70, 6,'');
    $pdf->Ln();
}else {
$pdf->SetFont('Times','B',12);
$pdf->Cell(70, 6, 'Nama Mahasiswa (3)');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(70, 6, 'Nama Lengkap ');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'nm');
$pdf->Ln();
$pdf->Cell(70, 6, 'NIM ');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'NIM');
$pdf->Ln();
$pdf->Cell(70, 6, 'Program Studi');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'prodi');
$pdf->Ln(8);
}

$pdf->Cell(70, 6, 'Tahun Pelaksanaan');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, $hasil['thn_pertama_usulan']);
$pdf->Ln();

$pdf->Cell(70, 6, 'Biaya Keseluruhan ');
$pdf->Cell(4, 6, ':');
$pdf->Cell(70,5, 'Rp. ' .$hasil['dana_usulan']);
$pdf->Ln(15);


// $tgl=$hasil['date_signature'];
// $date_signature=tanggal_indo($tgl);
// $pdf->SetLeftMargin(120);
$pdf->Cell(160,10,'Ambon,'.date('d M Y') ,0,1,'R');
// $pdf->Cell(50,6,'Ambon, '.date('d M Y'));
// $pdf->Cell(50,6,'Ambon, '.$date_signature);


$pdf->Cell(70,6,'Mengetahui',0,1,'C');
// $pdf->Ln(1);


// untuk nama dan nip ketua pengusul
$query_p="SELECT nama_ketua, reg.nip
FROM research 
LEFT JOIN reg ON reg.nidn=research.nidn_ketua
WHERE id_research=$id";
$sql_p=mysqli_query($conn,$query_p);
$hasil_p=mysqli_fetch_assoc($sql_p);


$pdf->SetLeftMargin(40);
$pdf->SetFont('Times','B',12);
$pdf->Cell(100,6,'Dekan');
$pdf->Cell(1,6,'Ketua');
$pdf->Ln(8);
$pdf->SetFont('Times','',12);
$pdf->Cell(100,6,'img ttd dekan');
$pdf->Cell(1,6,'ttd ketua');
$pdf->Ln(5);
$pdf->Cell(100,6,$hasil['nama']);
$pdf->Cell(1,6,$hasil['nama_ketua']);
$pdf->Ln(5);
$pdf->Cell(100,6,'NIP. '.$hasil['nip']);
$pdf->Cell(1,6, 'NIP. '.$hasil_p['nip']);
$pdf->Ln(15);

$pdf->Cell(120,6,'Mengetahui',0,1,'C');
// $pdf->Ln(1);
$pdf->SetFont('Times','B',12);
$pdf->Cell(120,6,'Ketua LPPM Unpatti',0,1,'C');
$pdf->Ln(3);
$pdf->SetFont('Times','',12);
$pdf->Cell(120,6,'img ttd Ketua LPPM',0,1,'C');
$pdf->Ln(1);
$pdf->Cell(100,6,'Nama',0,1,'C');
$pdf->Ln(1);
$pdf->Cell(100,6,'NIP',0,1,'C');


$pdf->Output();

?>


