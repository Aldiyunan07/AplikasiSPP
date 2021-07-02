-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 09:02 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aldi_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `namalengkap` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `namasiswa` varchar(40) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jk` enum('Laki Laki','Perempuan','','') NOT NULL,
  `tahunajaran` varchar(10) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nis`, `namasiswa`, `kelas`, `jk`, `tahunajaran`, `biaya`) VALUES
(29, '181910040', 'Aldi Yunan Anwari', 'XI RPL', 'Laki Laki', '2020/2021', 100000),
(30, '181910039', 'Ahmad Fadillah', 'XII PH', 'Laki Laki', '2020/2021', 100000),
(31, '181910001', 'Ahmad Maungzy', 'X TKJ', 'Laki Laki', '2020/2021', 100000),
(32, '181910041', 'Anton Santoni', 'XI TKJ', 'Laki Laki', '2020/2021', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `idspp` int(5) NOT NULL,
  `idsiswa` int(10) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `no_urut` int(11) NOT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `nobayar` varchar(10) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `wkt_bayar` varchar(25) NOT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL,
  `idadmin` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`idspp`, `idsiswa`, `jatuhtempo`, `no_urut`, `bulan`, `nobayar`, `tglbayar`, `wkt_bayar`, `jumlah`, `ket`, `idadmin`) VALUES
(337, 29, '2021-03-25', 1, 'Maret  2021', '2103250002', '2021-03-25', '11:36:24', 100000, 'LUNAS', 1),
(338, 29, '2021-04-25', 2, 'April  2021', '2103270004', '2021-03-27', '11:54:49', 100000, 'LUNAS', 1),
(339, 29, '2021-05-25', 3, 'Mei  2021', '2103270005', '2021-03-27', '11:58:46', 100000, 'LUNAS', 1),
(340, 29, '2021-06-25', 4, 'Juni  2021', '2103300002', '2021-03-30', '11:25:36', 100000, 'LUNAS', 1),
(341, 29, '2021-07-25', 5, 'Juli  2021', '2103300004', '2021-03-30', '11:27:34', 100000, 'LUNAS', 1),
(342, 29, '2021-08-25', 6, 'Agustus  2021', '2103300005', '2021-03-30', '11:29:03', 100000, 'LUNAS', 1),
(343, 29, '2021-09-25', 7, 'September  2021', '2103310002', '2021-03-31', '11:13:24', 100000, 'LUNAS', 1),
(344, 29, '2021-10-25', 8, 'Oktober  2021', '2103300006', '2021-03-30', '11:30:24', 100000, 'LUNAS', 1),
(345, 29, '2021-11-25', 9, 'November  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(346, 29, '2021-12-25', 10, 'Desember  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(347, 29, '2022-01-25', 11, 'januari  2022', NULL, NULL, '', 100000, 'BELUM', NULL),
(348, 29, '2022-02-25', 12, 'Februari  2022', NULL, NULL, '', 100000, 'BELUM', NULL),
(349, 30, '2021-03-27', 1, 'Maret  2021', '2103270001', '2021-03-27', '10:36:07', 100000, 'LUNAS', 1),
(350, 30, '2021-04-27', 2, 'April  2021', '2103270002', '2021-03-27', '11:40:05', 100000, 'LUNAS', 1),
(351, 30, '2021-05-27', 3, 'Mei  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(352, 30, '2021-06-27', 4, 'Juni  2021', '2103300003', '2021-03-30', '11:26:12', 100000, 'LUNAS', 1),
(353, 30, '2021-07-27', 5, 'Juli  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(354, 30, '2021-08-27', 6, 'Agustus  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(355, 30, '2021-09-27', 7, 'September  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(356, 30, '2021-10-27', 8, 'Oktober  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(357, 30, '2021-11-27', 9, 'November  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(358, 30, '2021-12-27', 10, 'Desember  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(359, 30, '2022-01-27', 11, 'januari  2022', NULL, NULL, '', 100000, 'BELUM', NULL),
(360, 30, '2022-02-27', 12, 'Februari  2022', NULL, NULL, '', 100000, 'BELUM', NULL),
(361, 31, '2021-03-27', 1, 'Maret  2021', '2103270003', '2021-03-27', '11:48:39', 100000, 'LUNAS', 1),
(362, 31, '2021-04-27', 2, 'April  2021', '2103290001', '2021-03-29', '19:36:13', 100000, 'LUNAS', 1),
(363, 31, '2021-05-27', 3, 'Mei  2021', '2103290002', '2021-03-29', '19:49:26', 100000, 'LUNAS', 1),
(364, 31, '2021-06-27', 4, 'Juni  2021', '2103290003', '2021-03-29', '19:49:38', 100000, 'LUNAS', 1),
(365, 31, '2021-07-27', 5, 'Juli  2021', '2103300001', '2021-03-30', '11:01:01', 100000, 'LUNAS', 1),
(366, 31, '2021-08-27', 6, 'Agustus  2021', '2103310001', '2021-03-31', '11:10:21', 100000, 'LUNAS', 1),
(367, 31, '2021-09-27', 7, 'September  2021', '2103310003', '2021-03-31', '13:33:49', 100000, 'LUNAS', 1),
(368, 31, '2021-10-27', 8, 'Oktober  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(369, 31, '2021-11-27', 9, 'November  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(370, 31, '2021-12-27', 10, 'Desember  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(371, 31, '2022-01-27', 11, 'januari  2022', NULL, NULL, '', 100000, 'BELUM', NULL),
(372, 31, '2022-02-27', 12, 'Februari  2022', NULL, NULL, '', 100000, 'BELUM', NULL),
(373, 32, '2021-03-27', 1, 'Maret  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(374, 32, '2021-04-27', 2, 'April  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(375, 32, '2021-05-27', 3, 'Mei  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(376, 32, '2021-06-27', 4, 'Juni  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(377, 32, '2021-07-27', 5, 'Juli  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(378, 32, '2021-08-27', 6, 'Agustus  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(379, 32, '2021-09-27', 7, 'September  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(380, 32, '2021-10-27', 8, 'Oktober  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(381, 32, '2021-11-27', 9, 'November  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(382, 32, '2021-12-27', 10, 'Desember  2021', NULL, NULL, '', 100000, 'BELUM', NULL),
(383, 32, '2022-01-27', 11, 'januari  2022', NULL, NULL, '', 100000, 'BELUM', NULL),
(384, 32, '2022-02-27', 12, 'Februari  2022', NULL, NULL, '', 100000, 'BELUM', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_galat`
--

CREATE TABLE `tb_galat` (
  `id` bigint(20) NOT NULL,
  `idsiswa` bigint(20) NOT NULL,
  `idspp` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `proses` enum('belum','selesai') NOT NULL,
  `tgl_selesai` date NOT NULL,
  `wkt_galat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_galat`
--

INSERT INTO `tb_galat` (`id`, `idsiswa`, `idspp`, `tanggal`, `nominal`, `gambar`, `proses`, `tgl_selesai`, `wkt_galat`) VALUES
(16, 29, 338, '2021-03-27', 100000, '1411659672_IMG-20190928-WA0075.jpg', 'selesai', '0000-00-00', '10:52:26'),
(17, 29, 339, '2021-03-27', 100000, '1249716384_IMG-20191008-WA0008.jpg', 'selesai', '0000-00-00', '11:58:17'),
(18, 30, 352, '2021-03-30', 100000, '1980166530_IMG-20191008-WA0008.jpg', 'selesai', '0000-00-00', '11:04:25'),
(19, 29, 340, '2021-03-30', 100000, '887622011_IMG-20190928-WA0075.jpg', 'selesai', '0000-00-00', '11:22:13'),
(20, 29, 341, '2021-03-30', 100000, '1237476683_38AxdT.jpg', 'selesai', '0000-00-00', '11:27:05'),
(21, 29, 342, '2021-03-30', 100000, '450126679_13461.jpg', 'selesai', '0000-00-00', '11:28:30'),
(22, 29, 344, '2021-03-30', 100000, '2117087035_2245fd95bc1f9078b1a0f967a54812e6.jpg', 'selesai', '2021-03-30', '11:29:58'),
(23, 31, 367, '2021-03-31', 100000, '1958560924_6.jpg', 'belum', '0000-00-00', '11:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `namajurusan` varchar(50) NOT NULL,
  `singkatan` varchar(50) NOT NULL,
  `tanggal di buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `namajurusan`, `singkatan`, `tanggal di buat`) VALUES
(1, 'Rekayasa Perangkat Lunak', 'RPL', '2021-03-25'),
(2, 'Otomatisasi Tata Kelola Perkantoran', 'OTKP', '2021-03-25'),
(4, 'Perhotelan', 'PH', '2021-03-25'),
(5, 'Multimedia', 'MM', '2021-03-25'),
(7, 'Teknik Jaringan Komputer', 'TKJ', '2021-03-25'),
(8, 'Teknik Sepeda Motor', 'TSM', '2021-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `kelas`, `jurusan`, `tgl_dibuat`, `jumlah`) VALUES
(20, 'X RPL', 'Rekayasa Perangkat Lunak', '2021-03-25', 2),
(21, 'XI RPL', 'Rekayasa Perangkat Lunak', '2021-03-25', 1),
(22, 'XII RPL', 'Rekayasa Perangkat Lunak', '2021-03-25', 1),
(23, 'X OTKP', 'Otomatisasi Tata Kelola Perkantoran', '2021-03-25', 0),
(24, 'XI OTKP', 'Otomatisasi Tata Kelola Perkantoran', '2021-03-25', 0),
(25, 'XII OTKP', 'Otomatisasi Tata Kelola Perkantoran', '2021-03-25', 0),
(30, 'X TKJ', 'Teknik Jaringan Komputer', '2021-03-27', 1),
(31, 'XI TKJ', 'Teknik Jaringan Komputer', '2021-03-27', 1),
(32, 'XII TKJ', 'Teknik Jaringan Komputer', '2021-03-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nominal`
--

CREATE TABLE `tb_nominal` (
  `id` int(11) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_peresmian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nominal`
--

INSERT INTO `tb_nominal` (`id`, `tahun`, `nominal`, `tgl_peresmian`) VALUES
(2, '2021/2022', 100000, '2021-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tabungan`
--

CREATE TABLE `tb_tabungan` (
  `id` int(25) NOT NULL,
  `idsiswa` int(20) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tabungan`
--

INSERT INTO `tb_tabungan` (`id`, `idsiswa`, `jumlah`, `tgl_dibuat`, `tgl_update`) VALUES
(1, 30, 400000, '2021-03-30', '2021-03-31'),
(2, 29, 500000, '2021-03-30', '2021-03-30'),
(3, 31, 745000, '2021-03-30', '2021-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id` bigint(20) NOT NULL,
  `idsiswa` bigint(20) NOT NULL,
  `jumlah` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id`, `idsiswa`, `jumlah`) VALUES
(29, 29, 400000),
(30, 30, 900000),
(31, 31, 500000),
(32, 32, 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tu`
--

CREATE TABLE `tb_tu` (
  `id` int(11) NOT NULL,
  `nip` int(15) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tu`
--

INSERT INTO `tb_tu` (`id`, `nip`, `foto`, `username`, `password`, `nama`, `posisi`, `bio`) VALUES
(32, 181910060, '641385587_IMG-20190910-WA0036.jpg', 'ironman', '827ccb0eea8a706c4c34a16891f84e7b', 'RIfky Nurjaman S.kom', 'Anggota TU', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_tabungan`
--

CREATE TABLE `t_tabungan` (
  `id` int(50) NOT NULL,
  `nobayar` varchar(50) NOT NULL,
  `idsiswa` int(30) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `wkt_bayar` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_tabungan`
--

INSERT INTO `t_tabungan` (`id`, `nobayar`, `idsiswa`, `jumlah`, `tgl_bayar`, `wkt_bayar`) VALUES
(3, '1611221426797549', 31, 20000, '2021-03-31', '11:22:16'),
(4, '0113271121998957', 31, 75000, '2021-03-31', '13:27:01'),
(5, '091349337590439', 30, 65000, '2021-03-31', '13:49:09'),
(6, '2513572014566184', 30, 40000, '2021-03-31', '13:57:25'),
(7, '421357239564599', 30, -5000, '2021-03-31', '13:57:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`),
  ADD KEY `fk_admin` (`idadmin`),
  ADD KEY `fk_siswa` (`idsiswa`);

--
-- Indexes for table `tb_galat`
--
ALTER TABLE `tb_galat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_nominal`
--
ALTER TABLE `tb_nominal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tu`
--
ALTER TABLE `tb_tu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_tabungan`
--
ALTER TABLE `t_tabungan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `tb_galat`
--
ALTER TABLE `tb_galat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_nominal`
--
ALTER TABLE `tb_nominal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_tu`
--
ALTER TABLE `tb_tu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `t_tabungan`
--
ALTER TABLE `t_tabungan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
