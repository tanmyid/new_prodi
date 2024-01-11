-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 07:48 PM
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
-- Database: `new_prodi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_in`
--

CREATE TABLE `barang_in` (
  `id_barang_in` int(11) NOT NULL,
  `nama_suplier` varchar(30) NOT NULL,
  `kategori` int(11) NOT NULL,
  `nama_barang` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_in`
--

INSERT INTO `barang_in` (`id_barang_in`, `nama_suplier`, `kategori`, `nama_barang`, `tgl_masuk`, `qty`) VALUES
(6, 'Bridgestone', 4, 3, '2023-12-15', 138),
(7, 'bridgestone', 3, 1, '2023-12-19', 50),
(8, 'bridgestone', 5, 1, '2023-12-19', 70),
(10, 'dunlop', 3, 11, '2024-01-06', 25),
(11, 'gajah tunggal', 8, 8, '2024-01-06', 35),
(12, 'gajah tunggal', 9, 8, '2024-01-06', 50),
(13, 'gajah tunggal', 10, 8, '2024-01-06', 45),
(14, 'bridgestone', 10, 10, '2024-01-06', 80),
(15, 'bridgestone', 9, 10, '2024-01-06', 70),
(16, 'bridgestone', 8, 9, '2024-01-06', 55),
(17, 'dunlop', 6, 12, '2024-01-06', 55),
(18, 'bridgestone', 11, 7, '2024-01-06', 70),
(19, 'bridgestone', 7, 6, '2024-01-06', 90);

-- --------------------------------------------------------

--
-- Table structure for table `barang_out`
--

CREATE TABLE `barang_out` (
  `id_barang_out` int(11) NOT NULL,
  `nama_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pelanggan` int(11) NOT NULL,
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
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
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
  `id_nama_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL
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
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_tlp` varchar(14) NOT NULL,
  `plat_no` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_tlp`, `plat_no`) VALUES
(1, 'Yanto', '089990009998', 'K 1890 AA'),
(2, 'Udin', '087778887734', 'K 1890 BB'),
(4, 'mia ', '1894671', 'K 6886 HU'),
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` enum('admin','staf','pimpinan') NOT NULL
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
  MODIFY `id_barang_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `barang_out`
--
ALTER TABLE `barang_out`
  MODIFY `id_barang_out` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nama_barang`
--
ALTER TABLE `nama_barang`
  MODIFY `id_nama_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
