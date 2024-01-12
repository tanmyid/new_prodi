-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2024 at 01:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_prodi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_in`
--

CREATE TABLE `barang_in` (
  `id_barang_in` int NOT NULL,
  `nama_suplier` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `kategori` int NOT NULL,
  `nama_barang` int NOT NULL,
  `tgl_masuk` date NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_in`
--

INSERT INTO `barang_in` (`id_barang_in`, `nama_suplier`, `kategori`, `nama_barang`, `tgl_masuk`, `qty`) VALUES
(6, 'Bridgestone', 4, 3, '2023-12-15', 169),
(7, 'bridgestone', 3, 1, '2023-12-19', 175),
(8, 'bridgestone', 5, 1, '2023-12-19', 615),
(10, 'dunlop', 3, 11, '2024-01-06', 114),
(11, 'gajah tunggal', 8, 8, '2024-01-06', 185),
(12, 'gajah tunggal', 9, 8, '2024-01-06', 134),
(13, 'gajah tunggal', 10, 8, '2024-01-06', 58),
(14, 'bridgestone', 10, 10, '2024-01-06', 148),
(15, 'bridgestone', 9, 10, '2024-01-06', 120),
(16, 'bridgestone', 8, 9, '2024-01-06', 120),
(17, 'dunlop', 6, 12, '2024-01-06', 55),
(18, 'bridgestone', 11, 7, '2024-01-06', 70),
(19, 'bridgestone', 7, 6, '2024-01-06', 90);

-- --------------------------------------------------------

--
-- Table structure for table `barang_out`
--

CREATE TABLE `barang_out` (
  `id_barang_out` int NOT NULL,
  `nama_barang` int NOT NULL,
  `jumlah` int NOT NULL,
  `pelanggan` int NOT NULL,
  `tanggal_out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_out`
--

INSERT INTO `barang_out` (`id_barang_out`, `nama_barang`, `jumlah`, `pelanggan`, `tanggal_out`) VALUES
(1, 1, 20, 1, '2023-12-14'),
(3, 3, 12, 4, '2023-12-18'),
(4, 10, 30, 5, '2024-01-06'),
(5, 9, 20, 2, '2024-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `kategori` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(3, '185/70 r14'),
(4, '175/65 r 14'),
(5, '185/65 r15'),
(6, '205/65 r15'),
(7, '205/65 r16'),
(8, '750-16'),
(9, '750-15'),
(10, '700-14'),
(11, '215/55 r17'),
(12, '235/50 r18');

-- --------------------------------------------------------

--
-- Table structure for table `nama_barang`
--

CREATE TABLE `nama_barang` (
  `id_nama_barang` int NOT NULL,
  `nama_barang` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nama_barang`
--

INSERT INTO `nama_barang` (`id_nama_barang`, `nama_barang`) VALUES
(1, 'bridgestone techno'),
(3, 'bridgestone ecopia EP150'),
(4, 'bridgestone techno sport'),
(5, 'bridgestone ecopia EP300'),
(6, 'bridgestone turanza too5a'),
(7, 'bridgestone turanza ER33'),
(8, 'Gaja tunggal super 88'),
(9, 'bridgestone MRN'),
(10, 'bridgestone MRD'),
(11, 'dunlop enasave ec300+'),
(12, 'dunlop sp touring r1');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama_pelanggan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `no_tlp` varchar(14) COLLATE utf8mb4_general_ci NOT NULL,
  `plat_no` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_tlp`, `plat_no`) VALUES
(1, 'Yanto', '089990009998', 'K 1890 AA'),
(2, 'Udin', '087778887734', 'K 1890 BB'),
(4, 'mia ', '087778887734', 'K 6886 HU'),
(5, 'aditya', '081553723577', 'K 5435 ADB'),
(6, 'rizal', '08177245667', 'B 1221 UK'),
(7, 'niko', '089772201983', 'K 3400 JK'),
(8, 'ardiansyah', '08741233212', 'H 6782 BH'),
(9, 'AGUNG', '08834512322', 'S 8656 IK'),
(10, 'RIDHO', '081297423144', 'K 5041 JB'),
(11, 'ANDRE', '08987855451', 'R 2341 DO'),
(12, 'KUKUH IMAN', '0858155555', 'AD  1902 VA');

-- --------------------------------------------------------

--
-- Table structure for table `stock_barang_in`
--

CREATE TABLE `stock_barang_in` (
  `id_stok_barang_in` int NOT NULL,
  `id_barang_in` int NOT NULL,
  `nama_barang` int NOT NULL,
  `kategori` int NOT NULL,
  `tgl_masuk` date NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock_barang_in`
--

INSERT INTO `stock_barang_in` (`id_stok_barang_in`, `id_barang_in`, `nama_barang`, `kategori`, `tgl_masuk`, `qty`) VALUES
(1, 6, 3, 4, '2024-01-11', 50),
(2, 6, 3, 4, '2024-01-11', 30),
(3, 7, 1, 3, '2024-01-11', 100),
(4, 7, 1, 3, '2024-01-11', 75),
(5, 8, 1, 5, '2024-01-11', 89),
(6, 8, 1, 5, '2024-01-11', 526),
(7, 10, 11, 3, '2024-01-11', 56),
(8, 10, 11, 3, '2024-01-11', 58),
(9, 11, 8, 8, '2024-01-11', 98),
(10, 11, 8, 8, '2024-01-11', 87),
(11, 12, 8, 9, '2024-01-11', 78),
(12, 12, 8, 9, '2024-01-11', 56),
(13, 13, 8, 10, '2024-01-11', 12),
(14, 13, 8, 10, '2024-01-11', 46),
(15, 14, 10, 10, '2024-01-11', 85),
(16, 14, 10, 10, '2024-01-11', 63),
(17, 15, 10, 9, '2024-01-11', 75),
(18, 15, 10, 9, '2024-01-11', 45),
(19, 16, 9, 8, '2024-01-11', 57),
(20, 16, 9, 8, '2024-01-11', 63),
(21, 6, 3, 4, '2024-01-11', 89);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('admin','staf','pimpinan') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', '123', 'TEDDY ARYA NUGRAHA', 'admin'),
(2, 'staf', '123', 'SELAMET MUARIFIN ', 'staf'),
(3, 'pimpinan', '123', 'AKHMAD FURQON', 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_in`
--
ALTER TABLE `barang_in`
  ADD PRIMARY KEY (`id_barang_in`),
  ADD KEY `kategori` (`kategori`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `barang_out`
--
ALTER TABLE `barang_out`
  ADD PRIMARY KEY (`id_barang_out`),
  ADD KEY `nama_barang` (`nama_barang`,`pelanggan`),
  ADD KEY `pelanggan` (`pelanggan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `nama_barang`
--
ALTER TABLE `nama_barang`
  ADD PRIMARY KEY (`id_nama_barang`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `stock_barang_in`
--
ALTER TABLE `stock_barang_in`
  ADD PRIMARY KEY (`id_stok_barang_in`),
  ADD KEY `barang_in` (`id_barang_in`,`kategori`),
  ADD KEY `kategori` (`kategori`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_in`
--
ALTER TABLE `barang_in`
  MODIFY `id_barang_in` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `barang_out`
--
ALTER TABLE `barang_out`
  MODIFY `id_barang_out` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nama_barang`
--
ALTER TABLE `nama_barang`
  MODIFY `id_nama_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stock_barang_in`
--
ALTER TABLE `stock_barang_in`
  MODIFY `id_stok_barang_in` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_in`
--
ALTER TABLE `barang_in`
  ADD CONSTRAINT `barang_in_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_in_ibfk_2` FOREIGN KEY (`nama_barang`) REFERENCES `nama_barang` (`id_nama_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_out`
--
ALTER TABLE `barang_out`
  ADD CONSTRAINT `barang_out_ibfk_2` FOREIGN KEY (`pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_out_ibfk_3` FOREIGN KEY (`nama_barang`) REFERENCES `nama_barang` (`id_nama_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_barang_in`
--
ALTER TABLE `stock_barang_in`
  ADD CONSTRAINT `stock_barang_in_ibfk_1` FOREIGN KEY (`id_barang_in`) REFERENCES `barang_in` (`id_barang_in`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_barang_in_ibfk_2` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_barang_in_ibfk_3` FOREIGN KEY (`nama_barang`) REFERENCES `nama_barang` (`id_nama_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
