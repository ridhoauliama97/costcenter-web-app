-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2022 at 08:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `costcenter_pks`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_akun`
--

CREATE TABLE `t_akun` (
  `id_akun` int(1) NOT NULL,
  `nama_akun` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_akun`
--

INSERT INTO `t_akun` (`id_akun`, `nama_akun`) VALUES
(1, 'Pendapatan'),
(2, 'Beban/Biaya'),
(3, 'Tertunda');

-- --------------------------------------------------------

--
-- Table structure for table `t_cc`
--

CREATE TABLE `t_cc` (
  `kode_cc` varchar(16) NOT NULL,
  `nama_cc` varchar(64) NOT NULL,
  `mulai_cc` date NOT NULL,
  `akhir_cc` date NOT NULL,
  `progres_cc` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_cc`
--

INSERT INTO `t_cc` (`kode_cc`, `nama_cc`, `mulai_cc`, `akhir_cc`, `progres_cc`) VALUES
('005 BP', 'Tangki 2000 MT', '2022-06-01', '2022-06-01', 12);

-- --------------------------------------------------------

--
-- Table structure for table `t_cc_progress`
--

CREATE TABLE `t_cc_progress` (
  `no` int(32) NOT NULL,
  `costcenter` varchar(16) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(512) NOT NULL,
  `progres` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_cc_progress`
--

INSERT INTO `t_cc_progress` (`no`, `costcenter`, `tanggal`, `keterangan`, `progres`) VALUES
(1, '005 BP', '2022-06-07', 'Penimbunan tanah', 8),
(2, '005 BP', '2022-06-07', 'Penimbunan tanah', 12);

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id_kategori` int(2) NOT NULL,
  `id_akun` int(1) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kategori`
--

INSERT INTO `t_kategori` (`id_kategori`, `id_akun`, `nama_kategori`) VALUES
(1, 1, 'Pembayaran Dana Proyek'),
(2, 1, 'Bonus'),
(3, 1, 'Retur'),
(4, 1, 'Lainnya'),
(5, 2, 'Pembelian Bahan'),
(6, 2, 'Gaji dan Upah'),
(7, 2, 'Kesekretariatan'),
(8, 2, 'Komunikasi dan Transportasi'),
(9, 2, 'Legalitas'),
(10, 2, 'Lainnya'),
(11, 3, 'Hutang'),
(12, 3, 'Piutang');

-- --------------------------------------------------------

--
-- Table structure for table `t_kode`
--

CREATE TABLE `t_kode` (
  `kode_daftar` varchar(64) NOT NULL,
  `string` varchar(8) NOT NULL,
  `username` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kode`
--

INSERT INTO `t_kode` (`kode_daftar`, `string`, `username`) VALUES
('0c875bea5fe57c7bd2f10aa8bfeaf1490355bfd40149b9d35bdbd17fdc839d96', 'HD743U4U', 'kora'),
('1b8faa875aa1b4e3ecd3182c7e263e83ef448844b5a131d905a62ba7d0da731d', '4769T4GI', ''),
('1db3983edd1e52b925360637c9842a3c78a689d2770c420fb25ef901ed7d7144', 'KODE1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_kontak`
--

CREATE TABLE `t_kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kontak`
--

INSERT INTO `t_kontak` (`id`, `nama`, `alamat`, `telp`, `keterangan`) VALUES
(5, 'PT Nindya Karya', 'Jl. S.M. Raja km 8,5 Medan Amplas', '082300000000', '-'),
(6, 'Ridho Aulia M A', 'Desa Tanjung Morawa B Tj. Morawa', '081200000000', '-'),
(7, 'Ghozali Ritonga', 'Pancing', '085200000000', 'Panglong Ghozali');

-- --------------------------------------------------------

--
-- Table structure for table `t_notifikasi`
--

CREATE TABLE `t_notifikasi` (
  `id_notif` int(64) NOT NULL,
  `tanggal_notif` date NOT NULL DEFAULT current_timestamp(),
  `waktu_notif` varchar(16) NOT NULL DEFAULT current_timestamp(),
  `string_notif` varchar(128) NOT NULL,
  `baca_notif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_pertanyaan`
--

CREATE TABLE `t_pertanyaan` (
  `id` int(2) NOT NULL,
  `string` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pertanyaan`
--

INSERT INTO `t_pertanyaan` (`id`, `string`) VALUES
(1, 'Nama panggilan ayah Anda'),
(2, 'Nama gadis ibu Anda'),
(3, 'Kota kelahiran ibu Anda'),
(4, 'Nama sekolah pertama Anda');

-- --------------------------------------------------------

--
-- Table structure for table `t_preferensi`
--

CREATE TABLE `t_preferensi` (
  `kode_preferensi` int(8) NOT NULL,
  `uraian_preferensi` varchar(64) NOT NULL,
  `satuan_preferensi` varchar(8) NOT NULL,
  `harga_preferensi` int(12) NOT NULL,
  `kategori_preferensi` varchar(32) DEFAULT NULL,
  `costcenter` varchar(16) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_preferensi`
--

INSERT INTO `t_preferensi` (`kode_preferensi`, `uraian_preferensi`, `satuan_preferensi`, `harga_preferensi`, `kategori_preferensi`, `costcenter`) VALUES
(1, 'Pembayaran dana proyek', '-', 1, NULL, '0'),
(2, 'Bonus proyek', '-', 1, NULL, '0'),
(3, 'Retur barang', '-', 1, NULL, '0'),
(4, 'Pendapatan lainnya', '-', 1, NULL, '0'),
(5, 'Gaji dan upah', '-', 1, NULL, '0'),
(6, 'Kesekretariatan', '-', 1, NULL, '0'),
(7, 'Komunikasi dan transportasi', '-', 1, NULL, '0'),
(8, 'Legalitas', '-', 1, NULL, '0'),
(9, 'Beban / biaya lainnya', '-', 1, NULL, '0'),
(10, 'Pembayaran Tagihan (Hutang/Piutang)', '-', 1, NULL, '0'),
(17, 'semen tiga roda', 'sak', 75000, 'Civil Work', '005 BP'),
(18, 'pipa rucika', 'batang', 64000, 'Mechanical Work', '005 BP');

-- --------------------------------------------------------

--
-- Table structure for table `t_tertunda`
--

CREATE TABLE `t_tertunda` (
  `no` int(16) NOT NULL,
  `id_tagihan` int(16) NOT NULL,
  `id_bayar` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id_transaksi` int(16) NOT NULL,
  `kode_cc` varchar(16) NOT NULL,
  `kode_preferensi` int(8) NOT NULL,
  `no_faktur` varchar(32) NOT NULL,
  `tanggal_faktur` date NOT NULL,
  `total_satuan_transaksi` int(16) NOT NULL,
  `total_biaya_transaksi` int(16) NOT NULL,
  `akun_transaksi` int(2) NOT NULL,
  `kategori_transaksi` int(2) NOT NULL,
  `status_transaksi` int(1) NOT NULL DEFAULT 1,
  `keterangan` varchar(128) NOT NULL,
  `username` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`id_transaksi`, `kode_cc`, `kode_preferensi`, `no_faktur`, `tanggal_faktur`, `total_satuan_transaksi`, `total_biaya_transaksi`, `akun_transaksi`, `kategori_transaksi`, `status_transaksi`, `keterangan`, `username`) VALUES
(49, '005 BP', 18, '1', '2022-06-01', 64, 4096000, 2, 5, 1, 'Pembelian pipa rucika 64 batang', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama_pengguna` varchar(64) NOT NULL,
  `role` int(2) NOT NULL,
  `keamanan_1` int(2) NOT NULL,
  `keamanan_2` int(2) NOT NULL,
  `jawaban_1` varchar(64) NOT NULL,
  `jawaban_2` varchar(64) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `foto` varchar(64) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`username`, `password`, `nama_pengguna`, `role`, `keamanan_1`, `keamanan_2`, `jawaban_1`, `jawaban_2`, `alamat`, `no_hp`, `foto`) VALUES
('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Ridho Aulia M A', 1, 1, 2, 'admin', 'admin', 'Tanjung Morawa', '081200000000', 'default.png'),
('kora', '0078be9d3eb30dd9cdf1d9a032101cf2aeac6751ce0b9b48b473bde3b096e468', 'Avatar Korra', 2, 1, 2, 'kora', 'kora', NULL, NULL, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_akun`
--
ALTER TABLE `t_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `t_cc`
--
ALTER TABLE `t_cc`
  ADD PRIMARY KEY (`kode_cc`);

--
-- Indexes for table `t_cc_progress`
--
ALTER TABLE `t_cc_progress`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `t_kode`
--
ALTER TABLE `t_kode`
  ADD PRIMARY KEY (`kode_daftar`);

--
-- Indexes for table `t_kontak`
--
ALTER TABLE `t_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_notifikasi`
--
ALTER TABLE `t_notifikasi`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `t_pertanyaan`
--
ALTER TABLE `t_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_preferensi`
--
ALTER TABLE `t_preferensi`
  ADD PRIMARY KEY (`kode_preferensi`);

--
-- Indexes for table `t_tertunda`
--
ALTER TABLE `t_tertunda`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_akun`
--
ALTER TABLE `t_akun`
  MODIFY `id_akun` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_cc_progress`
--
ALTER TABLE `t_cc_progress`
  MODIFY `no` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_kontak`
--
ALTER TABLE `t_kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_notifikasi`
--
ALTER TABLE `t_notifikasi`
  MODIFY `id_notif` int(64) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pertanyaan`
--
ALTER TABLE `t_pertanyaan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_preferensi`
--
ALTER TABLE `t_preferensi`
  MODIFY `kode_preferensi` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_tertunda`
--
ALTER TABLE `t_tertunda`
  MODIFY `no` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id_transaksi` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
