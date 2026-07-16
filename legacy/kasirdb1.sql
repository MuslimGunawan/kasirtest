-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2026 at 03:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasirdb1`
--

CREATE DATABASE IF NOT EXISTS `kasirdb1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kasirdb1`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`) VALUES
(6, 'BR001', 14, 'Tanggo Wafer 100gr', 'arta boga', '4000', '5000', 'PCS', '118', '28 January 2024, 12:45', '5 January 2026, 9:34'),
(7, 'BR002', 14, 'Serena Monde', 'arta boga', '2000', '2500', 'PCS', '82', '28 January 2024, 12:46', '5 January 2026, 9:35'),
(8, 'BR003', 15, 'Teh Pucuk 350ml', 'Mayora', '2500', '3000', 'PCS', '66', '28 January 2024, 12:47', '5 January 2026, 9:35'),
(9, 'BR004', 15, 'Javana 350ML', 'Mayora', '2600', '3000', 'PCS', '47', '28 January 2024, 12:48', '5 January 2026, 9:35'),
(10, 'BR005', 14, 'Oreo', 'arta boga', '7000', '10000', 'PCS', '101', '10 December 2025, 20:23', '12 December 2025, 15:42'),
(11, 'BR006', 16, 'Beras Ramos 5kg', 'Ramos', '60000', '65000', 'PCS', '50', '05 January 2026, 10:15', NULL),
(12, 'BR007', 16, 'Minyak Goreng Bimoli 2L', 'Bimoli', '35000', '38000', 'PCS', '40', '05 January 2026, 10:16', NULL),
(13, 'BR008', 16, 'Gula Pasir Gulaku 1kg', 'Gulaku', '14000', '16000', 'PCS', '100', '05 January 2026, 10:17', NULL),
(14, 'BR009', 17, 'Buku Tulis Sidu 38 Lembar', 'Sidu', '3000', '4000', 'PCS', '200', '05 January 2026, 10:18', NULL),
(15, 'BR010', 17, 'Pulpen Standard AE7', 'Standard', '2000', '2500', 'PCS', '150', '05 January 2026, 10:19', NULL),
(16, 'BR011', 18, 'Sabun Lifebuoy Cair 450ml', 'Lifebuoy', '20000', '23000', 'PCS', '60', '05 January 2026, 10:20', NULL),
(17, 'BR012', 18, 'Sampo Sunsilk 170ml', 'Sunsilk', '22000', '25000', 'PCS', '55', '05 January 2026, 10:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(14, 'Makanan', '28 January 2024, 12:44'),
(15, 'Minuman', '28 January 2024, 12:44'),
(16, 'Sembako', '05 January 2026, 10:00'),
(17, 'Alat Tulis', '05 January 2026, 10:05'),
(18, 'Perlengkapan Mandi', '05 January 2026, 10:10');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `id_member`) VALUES
(1, 'randy', 'e10adc3949ba59abbe56e057f20f883e', 1),
(8, 'MusGun', 'e10adc3949ba59abbe56e057f20f883e', 9),
(10, 'afkar', 'e10adc3949ba59abbe56e057f20f883e', 11),
(11, 'farid', 'e10adc3949ba59abbe56e057f20f883e', 12);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `NIK` text NOT NULL,
  `role` enum('manajer','kasir') NOT NULL DEFAULT 'kasir',
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `telepon`, `email`, `gambar`, `NIK`, `role`, `status`) VALUES
(1, 'Syahrandy Fazra', 'Banten', '082360535593', 'syahrandy.240170031@mhs.unimal.ac.id', '1765428148WhatsApp Image 2025-12-11 at 11.39.54_34935989.jpg', '32000000000000', 'manajer', 1),
(9, 'Muslim Gunawan', 'ACEH, KAB. ACEH TENGGARA, Terutung Megahke Mbakhu', '081361482424', 'muslim.240170036@mhs.unimal.ac.id', '1767409252337301656_5825095547559664_6315376970967815678_n.jpg', '240170036', 'manajer', 1),
(11, 'Afkar Aulia (Tester)', 'Pasaribu', '081262306239', 'afkar.240170191@mhs.unimal.ac.id', '17674074861765428664WhatsApp Image 2025-12-11 at 11.41.26_beabf62a.jpg', '240170191', 'kasir', 0),
(12, 'Farid Deza Amin Nur Rasyid', 'tidak tauu', '081378656886', 'farid.240170231@mhs.unimal.ac.id', '1767604398WhatsApp Image 2026-01-05 at 10.38.48.jpeg', '240170231', 'kasir', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`, `periode`) VALUES
(1, 'BR001', 1, '2', '10000', '5 January 2026, 10:30', '01-2026'),
(2, 'BR003', 1, '1', '3000', '5 January 2026, 10:30', '01-2026'),
(3, 'BR006', 1, '1', '65000', '5 January 2026, 11:15', '01-2026'),
(4, 'BR007', 1, '2', '76000', '5 January 2026, 11:15', '01-2026'),
(5, 'BR010', 9, '5', '12500', '5 January 2026, 13:45', '01-2026'),
(6, 'BR009', 9, '3', '12000', '5 January 2026, 13:45', '01-2026');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesan_kontak`
--

CREATE TABLE `pesan_kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan_kontak`
--

INSERT INTO `pesan_kontak` (`id`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(1, 'Suspect 1', 'suspect@gmail.com', 'test', 'asd', '2026-01-05 13:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'PT SanSin', 'Lhokseumawe', '0813XX48XX42', 'Salman Khan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `pesan_kontak`
--
ALTER TABLE `pesan_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pesan_kontak`
--
ALTER TABLE `pesan_kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
