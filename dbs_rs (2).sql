-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 09:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_rs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_antrian`
--

CREATE TABLE `tbl_antrian` (
  `id` int(11) NOT NULL,
  `kode_antrian` varchar(15) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `poli` varchar(20) NOT NULL,
  `jam_antrian` varchar(50) NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `tgl_antrian` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_antrian`
--

INSERT INTO `tbl_antrian` (`id`, `kode_antrian`, `nama_pasien`, `poli`, `jam_antrian`, `no_antrian`, `tgl_antrian`, `status`, `date`) VALUES
(2, 'kode-5984', 'Aldi', 'Poli Gigi', '14:50', 1, '2023-09-13', 1, '2023-09-13 03:16:14'),
(3, 'kode-3176', ' Saja', 'Poli Gigi', '15:54', 2, '2023-09-13', 1, '2023-09-13 03:16:26'),
(5, 'kode-1882', 'Silvi', 'Poli Gigi', '', 3, '2023-09-13', 0, '2023-09-13 03:25:27'),
(6, 'kode-188', 'Silvi', 'Poli Gigi', '', 1, '2023-09-14', 0, '2023-09-13 03:31:42'),
(7, 'kode-6403', 'Silvi', 'Poli Gigi', '', 1, '2023-09-15', 0, '2023-09-13 03:32:36'),
(8, 'kode-8521', 'Silvi', 'Poli Umum', '', 1, '2023-09-21', 0, '2023-09-13 03:40:45'),
(9, 'kode-2532', 'Silvi', 'Poli Gigi', '', 1, '2023-09-23', 0, '2023-09-13 08:19:55'),
(10, 'kode-1276', 'aldi', 'Poli Gigi', '', 1, '2023-09-22', 0, '2023-09-22 07:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cek_kesehatan`
--

CREATE TABLE `tbl_cek_kesehatan` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `penyakit` varchar(50) NOT NULL,
  `keluhan` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cek_kesehatan`
--

INSERT INTO `tbl_cek_kesehatan` (`id`, `kode`, `nama_pasien`, `penyakit`, `keluhan`, `keterangan`, `tgl`, `date`, `status`) VALUES
(1, 'kode-608', 'Silvi', 'Demam', 'ererer', 'ererererererere', '2023-09-13', '2023-09-13 07:22:20', 1),
(2, 'kode-7702', 'Silvi', 'Demam', 'ererer', 'ererererererere', '2023-09-13', '2023-09-13 07:22:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doktor`
--

CREATE TABLE `tbl_doktor` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `no_induk_doktor` varchar(30) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `poli` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(2) NOT NULL,
  `level` varchar(30) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `level`, `id_menu`) VALUES
(120, 'Doktor', 1),
(121, 'Doktor', 2),
(122, 'Doktor', 3),
(123, 'Doktor', 4),
(124, 'Doktor', 5),
(125, 'Doktor', 6),
(126, 'Doktor', 7),
(127, 'Doktor', 8),
(128, 'Doktor', 9),
(129, 'Doktor', 10),
(130, 'Doktor', 11),
(131, 'Doktor', 12),
(132, 'Doktor', 13),
(133, 'Doktor', 14),
(134, 'Admin', 1),
(135, 'Admin', 2),
(136, 'Admin', 3),
(137, 'Admin', 4),
(138, 'Admin', 5),
(139, 'Admin', 6),
(140, 'Admin', 7),
(141, 'Admin', 8),
(142, 'Admin', 9),
(143, 'Admin', 10),
(144, 'Admin', 11),
(145, 'Admin', 12),
(146, 'Admin', 14),
(147, 'Admin', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id`, `kode`, `jabatan`, `date`) VALUES
(1, 'jbt-788', 'Perawat', '2023-08-31 13:38:00'),
(2, 'jbt-1000', 'Bidan', '2023-08-31 13:44:36'),
(3, 'jbt-300', 'Doktor Umum', '2023-08-31 13:44:51'),
(4, 'jbt-780', 'Doktor Spesialis', '2023-08-31 13:45:02'),
(5, 'jbt-141', 'IT', '2023-08-31 13:51:35'),
(6, 'jbt-426', 'Kebersihan', '2023-08-31 13:46:25'),
(7, 'jbt-977', 'Administrasi', '2023-08-31 13:46:49'),
(9, 'jbt-431', 'Seccurity', '2023-08-31 13:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`id`, `level`, `date`) VALUES
(2, 'Doktor', '2023-09-12 05:01:20'),
(3, 'Medis', '2023-09-12 05:01:41'),
(4, 'Admin', '2023-09-12 06:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `title`, `url`, `icon`, `status`, `date`) VALUES
(1, 'Dashboard', 'index', 'fas fa-gauge', 0, '2023-09-22 06:34:55'),
(2, 'Data Obat', 'data_obat', 'fas fa-soap', 0, '2023-09-22 06:36:05'),
(3, 'Data Pengadaan Obat', 'data_pengadaan_obat', 'fas fa-filter', 0, '2023-09-22 06:37:06'),
(4, 'Data Pengeluaran Obat', 'pengeluaran_obat', 'fas fa-clipboard', 0, '2023-09-22 06:37:24'),
(5, 'Data Poli', 'data_poli', 'fas fa-hand-holding-heart', 0, '2023-09-22 06:37:54'),
(6, 'Data Paramedis', 'paramedis', 'fas fa-user', 0, '2023-09-22 06:38:47'),
(7, 'Data Doktor', 'doktor', 'fas fa-user-doctor', 0, '2023-09-22 06:39:05'),
(8, 'Data Pasien', 'pasien', 'fas fa-users', 0, '2023-09-22 06:39:26'),
(9, 'Data Rujukan', 'rujukan', 'fas fa-repeat', 0, '2023-09-22 06:39:48'),
(10, 'Data Cek Kesehatan', 'cek_kesehatan', 'fas fa-mask-face', 0, '2023-09-22 06:40:47'),
(11, 'Data Antrian', 'antrian', 'fas fa-bed-pulse', 0, '2023-09-22 06:41:34'),
(12, 'Data Menu', 'menu', 'fas fa-list', 0, '2023-09-22 06:42:00'),
(14, 'Level', 'level', 'fas fa-user-nurse', 0, '2023-09-22 06:43:36'),
(15, 'Data Pengguna', 'pengguna', 'fas fa-user', 0, '2023-09-22 06:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`id`, `kode`, `nama_obat`, `unit`, `qty`, `date`) VALUES
(3, 'obat-6380', 'Osakdon', 'Botol', 34343, '2023-09-11 14:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paramedis`
--

CREATE TABLE `tbl_paramedis` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_paramedis` varchar(30) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `poli` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id` int(11) NOT NULL,
  `no_rekammedis` varchar(15) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `no_bpjs` varchar(20) NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `status_pasien` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id`, `no_rekammedis`, `no_ktp`, `no_bpjs`, `notelp`, `nama_pasien`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `status_pasien`) VALUES
(11, 'rm-868', '1205092102860001', '343434343', '', 'Aldi', 'Laki - Laki', 'Sei Cabang Kanan Desa Karang A', '2023-09-12', 'ererere', 'BPJS'),
(12, 'rm-2985', '1205092102860001', '1205092102860001', '', 'SIlvi', 'Perempuan', 'Medan', '2023-09-13', 'Medan', 'BPJS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `nip` varchar(13) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengadaan_obat`
--

CREATE TABLE `tbl_pengadaan_obat` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama_obat` varbinary(50) NOT NULL,
  `jenis_obat` text NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga_beli` varchar(30) NOT NULL,
  `jml` varchar(11) NOT NULL,
  `total` varchar(30) NOT NULL,
  `supplier` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengadaan_obat`
--

INSERT INTO `tbl_pengadaan_obat` (`id`, `kode`, `nama_obat`, `jenis_obat`, `satuan`, `harga_beli`, `jml`, `total`, `supplier`, `status`, `date`) VALUES
(2, 'pgd-240', 0x4f736b61646f6e, 'Obat sakit kepala', 'botol', '5000', '3', '15000', 'Aldi', 0, '2023-09-11 14:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran_obat`
--

CREATE TABLE `tbl_pengeluaran_obat` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `jenis_obat` varchar(50) NOT NULL,
  `jml` varchar(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_serah` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengeluaran_obat`
--

INSERT INTO `tbl_pengeluaran_obat` (`id`, `kode`, `nama_obat`, `nama_pasien`, `jenis_obat`, `jml`, `keterangan`, `tgl_serah`, `date`) VALUES
(3, 'p-obat-691', 'Komik', 'Silvi', 'Obat sakit kepala', '2', 'ok', '2023-09-11', '2023-09-11 14:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id`, `kode`, `username`, `password`, `level`, `date`) VALUES
(3, '', 'davin', '$2y$10$WeGtLgley2ERIVtQ6lpRBuM4w1gjusFfiHdpka4qo61IA8jFM0BC6', 'Doktor', '2023-09-12 08:45:38'),
(4, '', 'admin', '$2y$10$Pcb6A7lwvVi42eWt1wPrl.5kqv1tBqoR4Be6AdSbvlLc9c32906Cy', 'Admin', '2023-09-22 07:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(20) NOT NULL,
  `id_cek_kesehatan` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `dokter` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id`, `nama_pasien`, `id_cek_kesehatan`, `pesan`, `dokter`, `date`) VALUES
(5, 'Silvi', '1', '343434343', 'davin', '2023-09-13 06:51:31'),
(6, 'Silvi', '1', 'ererere', 'davin', '2023-09-13 07:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poli`
--

CREATE TABLE `tbl_poli` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama_poli` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_poli`
--

INSERT INTO `tbl_poli` (`id`, `kode`, `nama_poli`, `date`) VALUES
(1, 'poli-939', 'Poli Gigi', '2023-09-11 15:10:24'),
(3, 'poli-221', 'Poli Umum', '2023-09-11 15:14:01'),
(4, 'poli-579', 'Poli Mata', '2023-09-11 15:15:24'),
(5, 'poli-43', 'Poli Bedah', '2023-09-11 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rujukan`
--

CREATE TABLE `tbl_rujukan` (
  `kode_rujukan` varchar(11) NOT NULL,
  `no_rujukan` varchar(18) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `nama_penyakit` varchar(30) NOT NULL,
  `diagnosa` varchar(50) NOT NULL,
  `nama_rumah_sakit` varchar(40) NOT NULL,
  `poli_tujuan` varchar(25) NOT NULL,
  `tgl_rujukan` varchar(10) NOT NULL,
  `no_rawat` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rujukan`
--

INSERT INTO `tbl_rujukan` (`kode_rujukan`, `no_rujukan`, `nama_pasien`, `nama_penyakit`, `diagnosa`, `nama_rumah_sakit`, `poli_tujuan`, `tgl_rujukan`, `no_rawat`) VALUES
('', '343434343', 'Aldi', '343434343', 'aa', 'erer', 'gfgfgfgfg', '2023-09-13', '2023-09-14'),
('0001', 'R-20180621-0001', 'Niko Rahmad', 'Cacar', 'cacar ganas', 'RSUD Palembang', 'Poli Kulit', '2018-06-21', '2018/06/21/0002'),
('0001', 'R-20180623-0001', 'Muhammad Yogi', 'Diabetes', 'Kencing Manis', 'RS.Bayukarta', 'Poli Dalam', '2018-06-23', '2018/06/23/0001'),
('0001', 'R-20180625-0001', 'Oman', 'Diabetes', 'Mengalami Sedikit Penghambatan', 'RSUD Tembilahan ', 'Poli Saraf', '2018-06-25', '2018/06/25/0001'),
('0001', 'R-20180630-0001', 'Oman', 'Cacar', 'Bintik-Bintik Merah', 'RS Bayukarta', 'Poli Kulit', '2018-06-30', '2018/06/30/0001'),
('0001', 'R-20180706-0001', 'Muhammad Yogi', 'Cacar', 'Sakit Berdarah', 'RSUD Karawang', 'Poli Kulit', '2018-07-06', '2018/07/06/0002'),
('0001', 'R-20180714-0001', 'Niko Rahmad', 'Hidung Bengkak', 'Hidung Berdarah', 'RSUD Semarang', 'Poli Saraf', '2018-07-14', '2018-07-14-0001'),
('', 'R-20230912', 'Aldi', 'Demam', 'Tidak Paah', 'RS ASIA MEDIKA', 'Poli Mata', '2023-09-12', '2023-09-12-4131'),
('', 'R-20230922', '3434343', 'Demam', 'Tidak Paah', 'RS ASIA MEDIKA', 'gfgfgfgfg', '2023-09-22', '2023-09-22-9639');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tenagakesehatan`
--

CREATE TABLE `tbl_tenagakesehatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `nip` varchar(13) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_antrian`
--
ALTER TABLE `tbl_antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cek_kesehatan`
--
ALTER TABLE `tbl_cek_kesehatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doktor`
--
ALTER TABLE `tbl_doktor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paramedis`
--
ALTER TABLE `tbl_paramedis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengadaan_obat`
--
ALTER TABLE `tbl_pengadaan_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengeluaran_obat`
--
ALTER TABLE `tbl_pengeluaran_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rujukan`
--
ALTER TABLE `tbl_rujukan`
  ADD PRIMARY KEY (`no_rujukan`);

--
-- Indexes for table `tbl_tenagakesehatan`
--
ALTER TABLE `tbl_tenagakesehatan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_antrian`
--
ALTER TABLE `tbl_antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cek_kesehatan`
--
ALTER TABLE `tbl_cek_kesehatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_doktor`
--
ALTER TABLE `tbl_doktor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_paramedis`
--
ALTER TABLE `tbl_paramedis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pengadaan_obat`
--
ALTER TABLE `tbl_pengadaan_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pengeluaran_obat`
--
ALTER TABLE `tbl_pengeluaran_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_tenagakesehatan`
--
ALTER TABLE `tbl_tenagakesehatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
