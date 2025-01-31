-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2025 at 04:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lppm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `kerjasama`
--

CREATE TABLE `kerjasama` (
  `id_kerjasama` int(11) NOT NULL,
  `tahun_pengajuan` varchar(4) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `nama_ketua` varchar(50) NOT NULL,
  `nip_ketua` varchar(18) NOT NULL,
  `nama_pj` varchar(50) NOT NULL,
  `nip_pj` varchar(19) NOT NULL,
  `golongan_pj` varchar(15) NOT NULL,
  `jafung_pj` varchar(20) NOT NULL,
  `prodi_pj` varchar(20) NOT NULL,
  `fakultas_pj` varchar(20) NOT NULL,
  `hp_pj` varchar(20) NOT NULL,
  `email_pj` varchar(30) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `nip_anggota` varchar(19) NOT NULL,
  `golongan_anggota` varchar(20) NOT NULL,
  `jafung_anggota` varchar(20) NOT NULL,
  `prodi_anggota` varchar(20) NOT NULL,
  `fakultas_anggota` varchar(20) NOT NULL,
  `hp_anggota` varchar(20) NOT NULL,
  `email_anggota` varchar(50) NOT NULL,
  `file_permohonan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kerjasama`
--

INSERT INTO `kerjasama` (`id_kerjasama`, `tahun_pengajuan`, `judul`, `nama_ketua`, `nip_ketua`, `nama_pj`, `nip_pj`, `golongan_pj`, `jafung_pj`, `prodi_pj`, `fakultas_pj`, `hp_pj`, `email_pj`, `nama_anggota`, `nip_anggota`, `golongan_anggota`, `jafung_anggota`, `prodi_anggota`, `fakultas_anggota`, `hp_anggota`, `email_anggota`, `file_permohonan`) VALUES
(21, '2024', 'lplpl', 'Dosen Baru', '123456', 'wewew', '3232', 'Pembina/IV.a', 'Lektor', '3', '5', '121', 'adas@gmail.com', 'frfrfrf', '213', 'Penata/ III.c', 'Lektor', '9', '2', '3232', 'sd@gmail.com', '23456Ubuntu Server CLI cheat sheet 2024 v6.pdf'),
(22, '2024', 'posdkfmsdfs', 'Victor Pattiradjawane', '198209292010121003', 'jrdnvd', '23411', 'Penata/ III.c', 'Lektor Kepala', '8', '3', '3431242', 'sdfs@gmail.com', 'klfsgmfdmg', '123123', 'Penata/ III.c', 'Asisten Ahli', '14', '4', '324', 'sdf@gmail.com', 'RIP-Lemlit-Unpatti.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `kerjasama_old`
--

CREATE TABLE `kerjasama_old` (
  `id_kerjasama` int(11) NOT NULL,
  `tahun_pengajuan` varchar(4) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `nama_ketua` varchar(50) NOT NULL,
  `nip_ketua` varchar(18) NOT NULL,
  `nama_pj` varchar(50) NOT NULL,
  `nip_pj` varchar(19) NOT NULL,
  `golongan_pj` varchar(15) NOT NULL,
  `jafung_pj` varchar(20) NOT NULL,
  `prodi_pj` varchar(2) NOT NULL,
  `fakultas_pj` varchar(2) NOT NULL,
  `hp_pj` varchar(20) NOT NULL,
  `email_pj` varchar(30) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `nip_anggota` varchar(19) NOT NULL,
  `golongan_anggota` varchar(20) NOT NULL,
  `jafung_anggota` varchar(20) NOT NULL,
  `prodi_anggota` varchar(2) NOT NULL,
  `fakultas_anggota` varchar(2) NOT NULL,
  `hp_anggota` varchar(20) NOT NULL,
  `email_anggota` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kerjasama_old`
--

INSERT INTO `kerjasama_old` (`id_kerjasama`, `tahun_pengajuan`, `judul`, `nama_ketua`, `nip_ketua`, `nama_pj`, `nip_pj`, `golongan_pj`, `jafung_pj`, `prodi_pj`, `fakultas_pj`, `hp_pj`, `email_pj`, `nama_anggota`, `nip_anggota`, `golongan_anggota`, `jafung_anggota`, `prodi_anggota`, `fakultas_anggota`, `hp_anggota`, `email_anggota`, `status`) VALUES
(5, '2024', 'fsdf', 'vic', '23', 'dsfsdf', '234', 'IIa', 'lektor', '3', '8', '003432', 'dsf@gmail.com', 'erw', '23423', 'IIa', 'lekfs', '1', '7', '0988', 'dfs@gamil.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `fakultas` varchar(50) DEFAULT NULL,
  `file_ttd` varchar(50) DEFAULT NULL,
  `file_cap` varchar(50) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 101,
  `active` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `nama`, `username`, `password`, `nip`, `fakultas`, `file_ttd`, `file_cap`, `level`, `active`) VALUES
(6, 'victor', 'victor', 'ffc150a160d37e92012c196b6af4160d', '198209292010121003', NULL, NULL, NULL, 100, 'Y'),
(8, 'Dekan Teknik', 'dekanteknik', '55470274233d7026f2882d3470bc208c', '196009181990051005', '2', 'ttd_dteknik.png', 'cap_dteknik.png', 102, 'Y'),
(9, 'Prof. Dr. Melianus Salakory, M.Kes', 'ketualppm', 'be0857ee6df9b851383b6ecd4006379d', '196112061988031002', NULL, NULL, NULL, 102, 'Y'),
(10, 'Dekan FST Unpatti', 'dekanfst', '712f5895eb423bf2b4b850b22a1fe595', '197012061987051004', '6', 'ttd_dfst.png', 'cap_dfst.png', 102, 'Y'),
(11, 'Dr. Hendrik Salmon, SH., M.Hum', 'dekanhukum', 'ee718ef663ad3bb32291605a02dac6e3', '196910061987081003', '1', 'ttd_dhukum.png', 'cap_dhukum.png', 102, 'Y'),
(12, 'admin_lppm', 'adminlppm', '2e3e6e77a33c22f493039d68998be0ee', '', NULL, NULL, NULL, 104, 'Y'),
(13, 'reviewer_1', 'reviewer', '7ba917e4e5158c8a9ed6eda08a6ec572', '199909091990092001', '2', 'ttd_reviewer1.png', NULL, 103, 'Y'),
(14, 'Reviewer_2', 'reviewer2', '2693b57f0f59df94caacefb811e99851', '196809111990101005', '2', 'ttd_reviewer2.png', NULL, 103, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mstr_dosen`
--

CREATE TABLE `mstr_dosen` (
  `nidn` varchar(10) NOT NULL,
  `sinta_id` varchar(7) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mstr_fakultas`
--

CREATE TABLE `mstr_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `fakultas_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mstr_fakultas`
--

INSERT INTO `mstr_fakultas` (`id_fakultas`, `fakultas_name`) VALUES
(1, 'Fakutas Hukum'),
(2, 'Fakultas Teknik'),
(3, 'Fakultas Ekonomi dan Bisnis'),
(4, 'Fakultas Pertanian'),
(5, 'Fakultas Ilmu Sosial dan Ilmu Politik'),
(6, 'Fakultas Sains dan Teknologi'),
(7, 'Fakultas Perikanan dan Ilmu Kelautan'),
(8, 'Fakultas Keguruan dan Ilmu Pendidikan'),
(9, 'Fakultas Kedokteran');

-- --------------------------------------------------------

--
-- Table structure for table `mstr_prodi`
--

CREATE TABLE `mstr_prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mstr_prodi`
--

INSERT INTO `mstr_prodi` (`id_prodi`, `id_fakultas`, `prodi`) VALUES
(1, 1, 'Ilmu hukum'),
(2, 2, 'Teknik Mesin'),
(3, 2, 'Teknik Industri'),
(4, 2, 'Teknik Perkapalan'),
(5, 2, 'Teknik Sistem Perkapalan'),
(6, 2, 'Teknik Sipil'),
(7, 2, 'Perencanaan Wilayah dan Kota'),
(8, 2, 'Teknik GeoFisika'),
(9, 2, 'Teknik Perminyakan'),
(10, 2, 'Teknik Kimia'),
(11, 3, 'Ekonomi Pembangunan'),
(12, 3, 'Manajeman'),
(13, 3, 'Akuntansi'),
(14, 4, 'Agroteknologi'),
(15, 4, 'Ilmu Tanah'),
(16, 4, 'Pemuliaan Tanaman'),
(17, 4, 'Kehutanan'),
(18, 4, 'Peternakan'),
(19, 4, 'Agribisnis'),
(20, 4, 'Penyuluhan Pertanian'),
(21, 4, 'Teknologi Hasil Pertanian'),
(22, 5, 'Ilmu Administrasi Negara'),
(23, 5, 'Ilmu Pemerintahan'),
(24, 5, 'Ilmu Komunikasi'),
(25, 5, 'Sosiologi'),
(26, 6, 'Matematika'),
(27, 6, 'Statistika'),
(28, 6, 'Ilmu Komputer'),
(29, 6, 'Fisika'),
(30, 6, 'Biologi'),
(31, 6, 'Bioteknologi'),
(32, 6, 'Sains Biomedis'),
(33, 6, 'Kimia'),
(34, 6, 'Farmasi'),
(35, 7, 'Agrobisnis Perikanan'),
(36, 7, 'Budidaya Perairan'),
(37, 7, 'Ilmu Kelautan'),
(38, 7, 'Manajeman Budidaya Perairan'),
(39, 7, 'Pemanfaatan Sumberdaya Perikanan'),
(40, 7, 'Teknologi Hasil Perikanan'),
(41, 8, 'Pendidikan Matematika'),
(42, 8, 'Pendidikan Biologi'),
(43, 8, 'Pendidikan Fisika'),
(44, 8, 'Pendidikan Kimia'),
(45, 8, 'Pendidikan Pancasila & Kewarganegaraan'),
(46, 8, 'Pendidikan Geografi'),
(47, 8, 'Pendidikan Ekonomi'),
(48, 8, 'Pendidikan Sejarah'),
(49, 8, 'Pendidikan Akuntansi'),
(50, 8, 'Bimbingan & Konseling'),
(51, 8, 'Pendidikan Luar Sekolah'),
(52, 8, 'Pendidikan Guru Sekolah Dasar'),
(53, 8, 'Pendidikan Jasmani Kesehatan & Rekreasi'),
(54, 8, 'Administrasi Pendidikan'),
(55, 8, 'Pendidikan Bahasa & Sastra Indonesia'),
(56, 8, 'Pendidikan Bahasa Inggris'),
(57, 8, 'Pendidikan Bahasa Jerman'),
(58, 9, 'Kedokteran'),
(59, 9, 'Profesi Dokter');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_pen`
--

CREATE TABLE `proposal_pen` (
  `id_proposal_pen` int(11) NOT NULL,
  `id_research` int(11) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `pengesahan` varchar(50) NOT NULL,
  `lain` varchar(50) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `time_input` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proposal_pen`
--

INSERT INTO `proposal_pen` (`id_proposal_pen`, `id_research`, `cover`, `pengesahan`, `lain`, `komentar`, `time_input`) VALUES
(2, 26, 'Lengkap', 'Lengkap', 'Lengkap', 'suds diperbaiki.\r\nlengkap', '2025-01-01 12:33:46'),
(4, 27, 'Lengkap', 'Lengkap', 'Lengkap', 'Lengkap', '2025-01-04 11:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `nidn` varchar(11) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `fakultas` int(11) NOT NULL,
  `prodi` int(11) NOT NULL,
  `golongan` varchar(30) NOT NULL,
  `jafung` varchar(30) NOT NULL,
  `sinta_id` varchar(7) NOT NULL,
  `hindex` varchar(30) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tmplahir` varchar(50) NOT NULL,
  `tglahir` date NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(11) DEFAULT 101,
  `active` char(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`nidn`, `pass`, `nama`, `nip`, `fakultas`, `prodi`, `golongan`, `jafung`, `sinta_id`, `hindex`, `jk`, `tmplahir`, `tglahir`, `hp`, `email`, `level`, `active`) VALUES
('0029098206', '708e042f53d637ca2f41be3bef1f834e', 'Victor Pattiradjawane', '198209292010121003', 6, 28, 'Penata Muda TK.I / III.b', 'Asisten Ahli', '6862060', '2', 'Laki-Laki', 'Ambon', '2024-09-29', '081343199719', 'victo@gmail.com', 101, 'Y'),
('123456', 'e10adc3949ba59abbe56e057f20f883e', 'Dosen Baru', '123456', 7, 36, 'Penata TK.I / III.d', 'Lektor', '12345', '3', 'Laki-Laki', 'Ambon', '1969-03-02', '0813444', 'dosen@gmail.com', 101, 'Y'),
('1234567890', 'e807f1fcf82d132f9bb018ca6738a19f', 'Jenne Pieter', '123456789012345678', 8, 45, 'Penata/ III.c', 'Asisten Ahli', '1234567', '2', 'Perempuan', 'Ambon', '2024-01-14', '081343199719', 'jenne@gmail.com', 101, 'Y'),
('909090', 'df780a97b7d6a8f779f14728bccd3c4c', 'Emiel ', '199009092009121003', 4, 16, 'Penata/ III.c', 'Asisten Ahli', '1213231', '2', 'Laki-Laki', 'Ambon', '1990-06-12', '234242', 'asda@gmail.com', 101, 'Y'),
('989898', '90bed51510b09ad5d325d8d174fa616c', 'Eric Victor', '19820929989898', 6, 28, 'Penata Muda TK.I / III.b', 'Asisten Ahli', '989098', '1', 'Laki-Laki', 'Ambon', '1982-09-29', '0813434329', 'pattiradjawanevictor@gmail.com', 101, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id_research` int(11) NOT NULL,
  `sinta_id_ketua` varchar(11) NOT NULL,
  `nama_ketua` varchar(100) NOT NULL,
  `nidn_ketua` varchar(11) NOT NULL,
  `afiliasi_ketua` varchar(22) NOT NULL DEFAULT 'UNIVERSITAS PATTIMURA',
  `kd_pt_ketua` varchar(6) NOT NULL DEFAULT '001021',
  `judul` varchar(500) NOT NULL,
  `thn_pertama_usulan` varchar(4) NOT NULL,
  `thn_usulan_kegiatan` varchar(4) NOT NULL,
  `thn_pelaksanaan_kegiatan` varchar(4) NOT NULL,
  `lama_kegiatan` varchar(2) NOT NULL,
  `bidang_fokus` varchar(100) NOT NULL,
  `nama_skema` varchar(100) NOT NULL,
  `dana_usulan` varchar(50) NOT NULL DEFAULT '',
  `status_usulan` varchar(7) NOT NULL DEFAULT 'Didanai',
  `dana_disetujui` varchar(15) NOT NULL DEFAULT '0',
  `afiliasi_sinta_id` varchar(3) NOT NULL DEFAULT '492',
  `nama_institusi_penerima_dana` varchar(21) NOT NULL DEFAULT 'UNIVERSITAS PATTIMURA',
  `target_tkt` varchar(200) NOT NULL,
  `nama_sub_skema` varchar(100) NOT NULL,
  `kategori_sumber_dana` varchar(50) NOT NULL,
  `negara_sumber_dana` varchar(2) NOT NULL DEFAULT 'ID',
  `sinta_id_member1` varchar(7) NOT NULL,
  `nidn_member1` varchar(10) NOT NULL,
  `nama_member1` varchar(50) NOT NULL,
  `sinta_id_member2` varchar(7) NOT NULL,
  `nidn_member2` varchar(10) NOT NULL,
  `nama_member2` varchar(50) NOT NULL,
  `sinta_id_member3` varchar(7) NOT NULL,
  `nidn_member3` varchar(10) NOT NULL,
  `nama_member3` varchar(100) NOT NULL,
  `sinta_id_member4` varchar(7) NOT NULL,
  `nidn_member4` varchar(10) NOT NULL,
  `nama_member4` varchar(50) NOT NULL,
  `sinta_id_member5` varchar(7) NOT NULL,
  `nidn_member5` varchar(10) NOT NULL,
  `nama_member5` varchar(50) NOT NULL,
  `mhs_1` varchar(50) NOT NULL,
  `nim_mhs_1` varchar(12) NOT NULL,
  `mhs_2` varchar(50) NOT NULL,
  `nim_mhs_2` varchar(12) NOT NULL,
  `mhs_3` varchar(50) NOT NULL,
  `nim_mhs_3` varchar(12) NOT NULL,
  `file_penelitian` varchar(300) NOT NULL,
  `file_lap_maju` varchar(50) NOT NULL,
  `file_lap_akhir` varchar(50) NOT NULL,
  `file_keuangan` varchar(50) NOT NULL,
  `time_input` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'Pengajuan Proposal (menunggu pengesahan)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`id_research`, `sinta_id_ketua`, `nama_ketua`, `nidn_ketua`, `afiliasi_ketua`, `kd_pt_ketua`, `judul`, `thn_pertama_usulan`, `thn_usulan_kegiatan`, `thn_pelaksanaan_kegiatan`, `lama_kegiatan`, `bidang_fokus`, `nama_skema`, `dana_usulan`, `status_usulan`, `dana_disetujui`, `afiliasi_sinta_id`, `nama_institusi_penerima_dana`, `target_tkt`, `nama_sub_skema`, `kategori_sumber_dana`, `negara_sumber_dana`, `sinta_id_member1`, `nidn_member1`, `nama_member1`, `sinta_id_member2`, `nidn_member2`, `nama_member2`, `sinta_id_member3`, `nidn_member3`, `nama_member3`, `sinta_id_member4`, `nidn_member4`, `nama_member4`, `sinta_id_member5`, `nidn_member5`, `nama_member5`, `mhs_1`, `nim_mhs_1`, `mhs_2`, `nim_mhs_2`, `mhs_3`, `nim_mhs_3`, `file_penelitian`, `file_lap_maju`, `file_lap_akhir`, `file_keuangan`, `time_input`, `status`) VALUES
(26, '6862060', 'Victor Pattiradjawane', '0029098206', 'UNIVERSITAS PATTIMURA', '001021', 'PENGEMBANGAN SISTEM INFORMASI GEOGRAFIS UNTUK MEMUDAHKAN PENCARIAN INFORMASI FASILITAS SOSIAL DAN LOKASINYA', '2024', '2024', '2024', '1', 'Pengembangan Teknologi Pertahanan Dan Keamanan', 'Penelitian Dasar Unggulan UNPATTI (PDUU)', '25.000.000', 'Didanai', '20.000.000', '492', 'UNIVERSITAS PATTIMURA', 'TKT 5 - Validasi komponen/subsistem dalam lingkungan yang relevan', 'Penelitian Unggulan Fakultas (PUF)', 'Institusi Internal', 'ID', '323232', '213212', 'Dr. Terbaik di Kampus', '', '', '', '', '', '', '', '', '', '', '', '', 'mahasiswa muda', '334422', '', '', '', '', '0029098206235-File Utama Naskah-381-2-10-20191216.pdf', '', '', '', '2024-12-30 19:12:00', '5'),
(27, '6862060', 'Victor Pattiradjawane', '0029098206', 'UNIVERSITAS PATTIMURA', '001021', 'Pengaruh Hukum Adat terhadap Pemilihan Raja di Negeri Ouw 2025-2026', '2025', '2025', '2025', '1', 'Pengembangan Teknologi Pertahanan Dan Keamanan', 'Penelitian Dasar Unggulan UNPATTI (PDUU)', '40.000.000', 'Didanai', '3.000.000', '492', 'UNIVERSITAS PATTIMURA', 'TKT 8 - Sistem telah lengkap dan memenuhi syarat (qualified) melalui pengujian dan demonstrasi dalam lingkungan/ aplikasi sebenarnya', 'Penelitian Unggulan Fakultas (PUF)', 'Institusi Internal', 'ID', '3143', '93843', 'dosen muda berprestasi', '3242', '  223344  ', 'dosen baru', '', '      ', '', '', '      ', '', '', '      ', '', 'mahasiswa muda', '838434', '', '', '', '', '27Ubuntu Server CLI cheat sheet 2024 v6.pdf', '0029098206Image to PDF 20250115 12.42.22.pdf', '', '', '2025-01-02 01:03:03', '8');

-- --------------------------------------------------------

--
-- Table structure for table `research_nilai_adm`
--

CREATE TABLE `research_nilai_adm` (
  `id_nilai_adm` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_research` int(11) NOT NULL,
  `urgensi` varchar(2) NOT NULL,
  `novelty` varchar(2) NOT NULL,
  `kaitan` varchar(2) NOT NULL,
  `peta` varchar(2) NOT NULL,
  `jejak` varchar(2) NOT NULL,
  `mutu` varchar(2) NOT NULL,
  `dana` varchar(2) NOT NULL,
  `luaran` varchar(2) NOT NULL,
  `total_nilai` int(100) NOT NULL,
  `date_signature` datetime NOT NULL DEFAULT current_timestamp(),
  `komentar` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_nilai_adm`
--

INSERT INTO `research_nilai_adm` (`id_nilai_adm`, `id_login`, `id_research`, `urgensi`, `novelty`, `kaitan`, `peta`, `jejak`, `mutu`, `dana`, `luaran`, `total_nilai`, `date_signature`, `komentar`) VALUES
(27, 13, 27, '3', '2', '2', '3', '2', '2', '4', '4', 170, '2025-01-12 22:03:46', 'Baik'),
(28, 13, 26, '3', '3', '3', '2', '4', '3', '2', '2', 355, '2025-01-12 22:07:46', 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `research_substansi`
--

CREATE TABLE `research_substansi` (
  `id_substansi` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_research` int(1) NOT NULL,
  `pub_ir` varchar(20) NOT NULL,
  `pub_inter` varchar(20) NOT NULL,
  `pub_ns` varchar(20) NOT NULL,
  `pub_nas` varchar(20) NOT NULL,
  `totalnilai_pub` int(11) NOT NULL,
  `temu_inter` varchar(20) NOT NULL,
  `temu_nas` varchar(20) NOT NULL,
  `totalnilai_temu` int(11) NOT NULL,
  `haki_merek` varchar(20) NOT NULL,
  `haki_paten` varchar(20) NOT NULL,
  `haki_industri` varchar(20) NOT NULL,
  `haki_cipta` varchar(20) NOT NULL,
  `haki_geo` varchar(20) NOT NULL,
  `haki_sirkuit` varchar(20) NOT NULL,
  `totalnilai_haki` int(11) NOT NULL,
  `buku_mono` varchar(20) NOT NULL,
  `buku_ref` varchar(20) NOT NULL,
  `buku_chap` varchar(20) NOT NULL,
  `buku_ajar` varchar(20) NOT NULL,
  `totalnilai_buku` int(11) NOT NULL,
  `nilai_akhir` int(11) NOT NULL,
  `kom_sesuai` varchar(200) NOT NULL,
  `kom_luaran` varchar(200) NOT NULL,
  `kom_lanjut` varchar(200) NOT NULL,
  `kom_tkt` varchar(200) NOT NULL,
  `kom_ilmu` varchar(200) NOT NULL,
  `kom_mk` varchar(200) NOT NULL,
  `kom_mhs` varchar(200) NOT NULL,
  `kom_kendala` varchar(200) NOT NULL,
  `kom_anggaran` varchar(200) NOT NULL,
  `kom_lain` varchar(200) NOT NULL,
  `date_substansi` date DEFAULT '2024-03-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_substansi`
--

INSERT INTO `research_substansi` (`id_substansi`, `id_login`, `id_research`, `pub_ir`, `pub_inter`, `pub_ns`, `pub_nas`, `totalnilai_pub`, `temu_inter`, `temu_nas`, `totalnilai_temu`, `haki_merek`, `haki_paten`, `haki_industri`, `haki_cipta`, `haki_geo`, `haki_sirkuit`, `totalnilai_haki`, `buku_mono`, `buku_ref`, `buku_chap`, `buku_ajar`, `totalnilai_buku`, `nilai_akhir`, `kom_sesuai`, `kom_luaran`, `kom_lanjut`, `kom_tkt`, `kom_ilmu`, `kom_mk`, `kom_mhs`, `kom_kendala`, `kom_anggaran`, `kom_lain`, `date_substansi`) VALUES
(23, 13, 27, 'Tidak ada (0)', 'Submitted (2)', 'Tidak ada (0)', 'Tidak ada (0)', 100, 'Tidak ada (0)', 'Terlaksana(3)', 120, 'Tidak ada (0)', 'Tidak ada (0)', 'Tidak ada (0)', 'Granted (3)', 'Tidak ada (0)', 'Tidak ada (0)', 135, 'Tidak ada (0)', 'Tidak ada (0)', 'Tidak ada (0)', 'Terbit (3)', 45, 400, 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '2025-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `sah_usulan`
--

CREATE TABLE `sah_usulan` (
  `id_sah_usulan` int(11) NOT NULL,
  `id_research` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `ttd_dekan` varchar(50) NOT NULL,
  `ttd_ketua` varchar(50) NOT NULL,
  `cap_dekan` varchar(50) NOT NULL,
  `cap_ketua` varchar(50) NOT NULL,
  `file_sah_usulan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sah_usulan`
--

INSERT INTO `sah_usulan` (`id_sah_usulan`, `id_research`, `id_login`, `ttd_dekan`, `ttd_ketua`, `cap_dekan`, `cap_ketua`, `file_sah_usulan`) VALUES
(4, 16, 8, 'ttd_dteknik.png', 'ok', 'cap_dteknik.png', '', ''),
(5, 19, 11, 'ttd_dhukum.png', '', 'cap_dhukum.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id_services` int(11) NOT NULL,
  `sinta_id_ketua` varchar(11) NOT NULL,
  `nama_ketua` varchar(100) NOT NULL,
  `nidn_ketua` varchar(11) NOT NULL,
  `afiliasi_ketua` varchar(22) NOT NULL DEFAULT 'UNIVERSITAS PATTIMURA',
  `kd_pt_ketua` varchar(6) NOT NULL DEFAULT '001021',
  `judul` varchar(500) NOT NULL,
  `thn_pertama_usulan` varchar(4) NOT NULL,
  `thn_usulan_kegiatan` varchar(4) NOT NULL,
  `thn_pelaksanaan_kegiatan` varchar(4) NOT NULL,
  `lama_kegiatan` varchar(2) NOT NULL,
  `bidang_fokus` varchar(100) NOT NULL,
  `nama_skema` varchar(100) NOT NULL,
  `dana_usulan` varchar(50) NOT NULL DEFAULT '',
  `status_usulan` varchar(7) NOT NULL DEFAULT 'Didanai',
  `dana_disetujui` varchar(15) NOT NULL DEFAULT '0',
  `afiliasi_sinta_id` varchar(3) NOT NULL DEFAULT '492',
  `nama_institusi_penerima_dana` varchar(21) NOT NULL DEFAULT 'UNIVERSITAS PATTIMURA',
  `target_tkt` varchar(200) NOT NULL,
  `nama_sub_skema` varchar(100) NOT NULL,
  `kategori_sumber_dana` varchar(50) NOT NULL,
  `negara_sumber_dana` varchar(2) NOT NULL DEFAULT 'ID',
  `sinta_id_member1` varchar(7) NOT NULL,
  `nidn_member1` varchar(10) NOT NULL,
  `nama_member1` varchar(50) NOT NULL,
  `sinta_id_member2` varchar(7) NOT NULL,
  `nidn_member2` varchar(10) NOT NULL,
  `nama_member2` varchar(50) NOT NULL,
  `sinta_id_member3` varchar(7) NOT NULL,
  `nidn_member3` varchar(10) NOT NULL,
  `nama_member3` varchar(100) NOT NULL,
  `sinta_id_member4` varchar(7) NOT NULL,
  `nidn_member4` varchar(10) NOT NULL,
  `nama_member4` varchar(50) NOT NULL,
  `sinta_id_member5` varchar(7) NOT NULL,
  `nidn_member5` varchar(10) NOT NULL,
  `nama_member5` varchar(50) NOT NULL,
  `mhs_1` varchar(50) NOT NULL,
  `nim_mhs_1` varchar(12) NOT NULL,
  `mhs_2` varchar(50) NOT NULL,
  `nim_mhs_2` varchar(12) NOT NULL,
  `mhs_3` varchar(50) NOT NULL,
  `nim_mhs_3` varchar(12) NOT NULL,
  `file_pengabdian` varchar(300) NOT NULL,
  `time_input` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'Menunggu verifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id_services`, `sinta_id_ketua`, `nama_ketua`, `nidn_ketua`, `afiliasi_ketua`, `kd_pt_ketua`, `judul`, `thn_pertama_usulan`, `thn_usulan_kegiatan`, `thn_pelaksanaan_kegiatan`, `lama_kegiatan`, `bidang_fokus`, `nama_skema`, `dana_usulan`, `status_usulan`, `dana_disetujui`, `afiliasi_sinta_id`, `nama_institusi_penerima_dana`, `target_tkt`, `nama_sub_skema`, `kategori_sumber_dana`, `negara_sumber_dana`, `sinta_id_member1`, `nidn_member1`, `nama_member1`, `sinta_id_member2`, `nidn_member2`, `nama_member2`, `sinta_id_member3`, `nidn_member3`, `nama_member3`, `sinta_id_member4`, `nidn_member4`, `nama_member4`, `sinta_id_member5`, `nidn_member5`, `nama_member5`, `mhs_1`, `nim_mhs_1`, `mhs_2`, `nim_mhs_2`, `mhs_3`, `nim_mhs_3`, `file_pengabdian`, `time_input`, `status`) VALUES
(11, '6862060', 'Victor Pattiradjawane', '0029098206', 'UNIVERSITAS PATTIMURA', '001021', 'Analisa Permukaan air laut terhadap hasil produksi garam di kaibobu', '2024', '2024', '2024', '1', 'Kemaritiman', 'Penelitian Terapan Unggulan UNPATTI (PTUU)', '19.000.000', 'Didanai', '0', '492', 'UNIVERSITAS PATTIMURA', 'TKT 2 - Formulasi Konsep teknologi dan aplikasinya', 'Penelitian Peningkatan Kapasitas Tenaga Kependidikan (PKTK)', 'Luar Negeri', 'ID', 'aku34', 'aku11', 'aku', '', '          ', '', 'bh3555', 'bw773  ', 'beliau', '', '          ', '', 'dia343', 'dia88   ', 'dia', 'mhs akrtif', '343535', '', '', '', '', '11Surat Undangan Teknik Komputer..pdf', '2024-11-23 17:56:43', 'Menunggu verifikasi'),
(15, '6862060', 'Victor Pattiradjawane', '0029098206', 'UNIVERSITAS PATTIMURA', '001021', 'terlambat proposal coba kirim lagi lagi', '2024', '2024', '2024', '2', 'Pengembangan Teknologi Pertahanan Dan Keamanan', 'Penelitian Terapan Unggulan UNPATTI (PTUU)', '15.000.000', 'Didanai', '0', '492', 'UNIVERSITAS PATTIMURA', 'TKT 3 - Pembuktian konsep (proof-of-concept) fungsi dan/atau karakteristik penting secara analitis dan eksperimental', 'Penelitian Mandiri (PM)', 'Pemerintah', 'ID', '242', '2342', 'dosne3', '', '       ', '', '', '       ', '', '', '       ', '', '', '       ', '', 'mahassiwa claon 1', '3434', '', '', '', '', '15Scan 3.pdf', '2024-11-23 17:56:43', 'Menunggu verifikasi'),
(16, '321321', 'Malaikat', '0014018301', 'UNIVERSITAS PATTIMURA', '001021', 'Pembuatan website allang asaude', '2024', '2024', '2024', '1', 'Teknologi Informasi Dan Komunikasi', 'Pengabdian Berbasis Masyarakat (PBM)', '20.000.000', 'Didanai', '0', '492', 'UNIVERSITAS PATTIMURA', 'TKT 6 - Demonstrasi Model atau Prototipe Sistem/ Subsistem dalam lingkungan yang relevan', 'Program Pengabdian Mandiri (PMD)', 'Mandiri', 'ID', '21', '323', 'dosen 1', '', '', '', '', '', '', '', '', '', '23423', '23423', 'dosen lainnya', 'mhs cerdas', '3434', '', '', '', '', '0014018301Surat Undangan Teknik Komputer..pdf', '2024-11-23 17:56:43', 'Menunggu verifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status_name`) VALUES
(1, 'Pengusulan Proposal'),
(2, 'Persyaratan Proposal Sudah Lengkap'),
(3, 'Persyaratan Proposal Belum Lengkap'),
(4, 'Lolos Penilaian Administrasi & Substansi'),
(5, 'Belum Lolos Penilaian Administrasi & Substansi'),
(6, 'Pencairan Dana'),
(7, 'Laporan Kemajuan'),
(8, 'Monev Laporan Kemajuan '),
(9, 'Laporan Akhir'),
(10, 'Selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD PRIMARY KEY (`id_kerjasama`);

--
-- Indexes for table `kerjasama_old`
--
ALTER TABLE `kerjasama_old`
  ADD PRIMARY KEY (`id_kerjasama`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `mstr_dosen`
--
ALTER TABLE `mstr_dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `mstr_fakultas`
--
ALTER TABLE `mstr_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `mstr_prodi`
--
ALTER TABLE `mstr_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `proposal_pen`
--
ALTER TABLE `proposal_pen`
  ADD PRIMARY KEY (`id_proposal_pen`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id_research`);

--
-- Indexes for table `research_nilai_adm`
--
ALTER TABLE `research_nilai_adm`
  ADD PRIMARY KEY (`id_nilai_adm`);

--
-- Indexes for table `research_substansi`
--
ALTER TABLE `research_substansi`
  ADD PRIMARY KEY (`id_substansi`);

--
-- Indexes for table `sah_usulan`
--
ALTER TABLE `sah_usulan`
  ADD PRIMARY KEY (`id_sah_usulan`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kerjasama`
--
ALTER TABLE `kerjasama`
  MODIFY `id_kerjasama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kerjasama_old`
--
ALTER TABLE `kerjasama_old`
  MODIFY `id_kerjasama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mstr_fakultas`
--
ALTER TABLE `mstr_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mstr_prodi`
--
ALTER TABLE `mstr_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `proposal_pen`
--
ALTER TABLE `proposal_pen`
  MODIFY `id_proposal_pen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id_research` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `research_nilai_adm`
--
ALTER TABLE `research_nilai_adm`
  MODIFY `id_nilai_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `research_substansi`
--
ALTER TABLE `research_substansi`
  MODIFY `id_substansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sah_usulan`
--
ALTER TABLE `sah_usulan`
  MODIFY `id_sah_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id_services` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
