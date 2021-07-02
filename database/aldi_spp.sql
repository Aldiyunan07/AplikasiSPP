-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2021 pada 14.34
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `namalengkap` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
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
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nis`, `namasiswa`, `kelas`, `jk`, `tahunajaran`, `biaya`) VALUES
(41, '181910039', 'Ahmad Fadillah', 'X RPL', 'Laki Laki', '2021/2022', 200000),
(42, '181910040', 'Aldi Yunan Anwari', 'XI OTKP', 'Laki Laki', '2021/2022', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
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
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`idspp`, `idsiswa`, `jatuhtempo`, `no_urut`, `bulan`, `nobayar`, `tglbayar`, `wkt_bayar`, `jumlah`, `ket`, `idadmin`) VALUES
(481, 41, '2021-04-03', 1, 'April  2021', '2104030001', '2021-04-03', '10:35:41', 200000, 'LUNAS', 1),
(482, 41, '2021-05-03', 2, 'Mei  2021', '2104030003', '2021-04-03', '10:47:41', 200000, 'LUNAS', 1),
(483, 41, '2021-06-03', 3, 'Juni  2021', '2104030009', '2021-04-03', '10:55:30', 200000, 'LUNAS', 1),
(484, 41, '2021-07-03', 4, 'Juli  2021', '2104030010', '2021-04-03', '10:55:40', 200000, 'LUNAS', 1),
(485, 41, '2021-08-03', 5, 'Agustus  2021', '2104030012', '2021-04-03', '20:25:23', 200000, 'LUNAS', 1),
(486, 41, '2021-09-03', 6, 'September  2021', '2104030013', '2021-04-03', '20:25:30', 200000, 'LUNAS', 1),
(487, 41, '2021-10-03', 7, 'Oktober  2021', NULL, NULL, '', 200000, 'BELUM', NULL),
(488, 41, '2021-11-03', 8, 'November  2021', NULL, NULL, '', 200000, 'BELUM', NULL),
(489, 41, '2021-12-03', 9, 'Desember  2021', NULL, NULL, '', 200000, 'BELUM', NULL),
(490, 41, '2022-01-03', 10, 'januari  2022', NULL, NULL, '', 200000, 'BELUM', NULL),
(491, 41, '2022-02-03', 11, 'Februari  2022', NULL, NULL, '', 200000, 'BELUM', NULL),
(492, 41, '2022-03-03', 12, 'Maret  2022', NULL, NULL, '', 200000, 'BELUM', NULL),
(493, 42, '2021-04-03', 1, 'April  2021', '2106130001', '2021-06-13', '20:39:00', 200000, 'LUNAS', 1),
(494, 42, '2021-05-03', 2, 'Mei  2021', NULL, NULL, '', 200000, 'BELUM', NULL),
(495, 42, '2021-06-03', 3, 'Juni  2021', NULL, NULL, '', 200000, 'BELUM', NULL),
(496, 42, '2021-07-03', 4, 'Juli  2021', NULL, NULL, '', 200000, 'BELUM', NULL),
(497, 42, '2021-08-03', 5, 'Agustus  2021', NULL, NULL, '', 200000, 'BELUM', NULL),
(498, 42, '2021-09-03', 6, 'September  2021', NULL, NULL, '', 200000, 'BELUM', NULL),
(499, 42, '2021-10-03', 7, 'Oktober  2021', NULL, NULL, '', 200000, 'BELUM', NULL),
(500, 42, '2021-11-03', 8, 'November  2021', NULL, NULL, '', 200000, 'BELUM', NULL),
(501, 42, '2021-12-03', 9, 'Desember  2021', NULL, NULL, '', 200000, 'BELUM', NULL),
(502, 42, '2022-01-03', 10, 'januari  2022', NULL, NULL, '', 200000, 'BELUM', NULL),
(503, 42, '2022-02-03', 11, 'Februari  2022', NULL, NULL, '', 200000, 'BELUM', NULL),
(504, 42, '2022-03-03', 12, 'Maret  2022', NULL, NULL, '', 200000, 'BELUM', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galat`
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
-- Dumping data untuk tabel `tb_galat`
--

INSERT INTO `tb_galat` (`id`, `idsiswa`, `idspp`, `tanggal`, `nominal`, `gambar`, `proses`, `tgl_selesai`, `wkt_galat`) VALUES
(31, 41, 482, '2021-04-03', 200000, '1186231599_53626260_12.png', 'selesai', '2021-04-03', '10:45:54'),
(32, 41, 485, '2021-04-03', 200000, '568216857_53626260_12.png', 'selesai', '2021-04-03', '20:24:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `namajurusan` varchar(50) NOT NULL,
  `singkatan` varchar(50) NOT NULL,
  `tanggal di buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `namajurusan`, `singkatan`, `tanggal di buat`) VALUES
(11, 'Rekayasa Perangkat Lunak', 'RPL', '2021-04-03'),
(12, 'Rekayasa Perangkat Lunak', 'RPL', '2021-04-03'),
(13, 'Otomatisasi Tata Kelola Perkantoran', 'OTKP', '2021-04-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `kelas`, `jurusan`, `tgl_dibuat`, `jumlah`) VALUES
(40, 'X RPL', 'Rekayasa Perangkat Lunak', '2021-04-03', 2),
(42, 'XI OTKP', 'Otomatisasi Tata Kelola Perkantoran', '2021-04-03', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tgl_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kontak`
--

INSERT INTO `tb_kontak` (`id`, `nama`, `email`, `pesan`, `tgl_pesan`) VALUES
(8, 'Aldi', 'Aldiyunan07@gmail.com', 'Min tambahin fitur lagi dong', '2021-04-03'),
(9, 'Aldi Yunan Anwari', 'Aldiyunan07@gmail.com', 'Min tambahin fitur nya lagi dong ', '2021-04-03'),
(10, 'Jang Aduy', 'JangAduy08@gmail.com', 'Min Aplikasi nya bagus min', '2021-04-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nominal`
--

CREATE TABLE `tb_nominal` (
  `id` int(11) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_peresmian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nominal`
--

INSERT INTO `tb_nominal` (`id`, `tahun`, `nominal`, `tgl_peresmian`) VALUES
(8, '2021/2022', 200000, '2021-04-03'),
(9, '2022/2023', 100000, '2021-04-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tabungan`
--

CREATE TABLE `tb_tabungan` (
  `id` int(25) NOT NULL,
  `idsiswa` int(20) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tabungan`
--

INSERT INTO `tb_tabungan` (`id`, `idsiswa`, `jumlah`, `tgl_dibuat`, `tgl_update`) VALUES
(6, 41, 1600000, '2021-04-03', '2021-04-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id` bigint(20) NOT NULL,
  `idsiswa` bigint(20) NOT NULL,
  `jumlah` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id`, `idsiswa`, `jumlah`) VALUES
(41, 41, 1200000),
(42, 42, 2200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tu`
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
-- Dumping data untuk tabel `tb_tu`
--

INSERT INTO `tb_tu` (`id`, `nip`, `foto`, `username`, `password`, `nama`, `posisi`, `bio`) VALUES
(41, 181910001, '145906173_tu-2.jpg', 'agus123', '984229b1e57c13b95a3e493be2442c26', 'Herman Hermansyah', 'Administrasi SPP', ''),
(45, 181910034, '572473993_2139136711_avatar-7.jpg', 'dedi123', '21232f297a57a5a743894a0e4a801fc3', 'Dedi Hermansyah', 'Administrasi Kegiatan Sekolah', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tabungan`
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
-- Dumping data untuk tabel `t_tabungan`
--

INSERT INTO `t_tabungan` (`id`, `nobayar`, `idsiswa`, `jumlah`, `tgl_bayar`, `wkt_bayar`) VALUES
(22, '151045162490960', 41, 200000, '2021-04-03', '10:45:15'),
(23, '2110461906074592', 41, -200000, '2021-04-03', '10:46:21'),
(24, '021050755985228', 41, 400000, '2021-04-03', '10:50:02'),
(25, '4110541123413206', 41, -200000, '2021-04-03', '10:54:40'),
(26, '59105463119040', 41, -200000, '2021-04-03', '10:54:59'),
(27, '1710551692825620', 41, -200000, '2021-04-03', '10:55:17'),
(28, '20105555469464', 41, -200000, '2021-04-03', '10:55:20'),
(29, '2110551952568068', 41, -200000, '2021-04-03', '10:55:21'),
(30, '3010551178521786', 41, -200000, '2021-04-03', '10:55:30'),
(31, '4110551379002407', 41, -200000, '2021-04-03', '10:55:40'),
(32, '412022851361226', 41, 2000000, '2021-04-03', '20:22:41'),
(33, '082025271809786', 41, -200000, '2021-04-03', '20:25:07'),
(34, '302025301152405', 41, -200000, '2021-04-03', '20:25:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`),
  ADD KEY `fk_admin` (`idadmin`),
  ADD KEY `fk_siswa` (`idsiswa`);

--
-- Indeks untuk tabel `tb_galat`
--
ALTER TABLE `tb_galat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_nominal`
--
ALTER TABLE `tb_nominal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tu`
--
ALTER TABLE `tb_tu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_tabungan`
--
ALTER TABLE `t_tabungan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT untuk tabel `tb_galat`
--
ALTER TABLE `tb_galat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_nominal`
--
ALTER TABLE `tb_nominal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tb_tu`
--
ALTER TABLE `tb_tu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `t_tabungan`
--
ALTER TABLE `t_tabungan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
