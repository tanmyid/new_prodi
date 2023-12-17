-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 08:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_in`
--

INSERT INTO `barang_in` (`id_barang_in`, `nama_suplier`, `kategori`, `nama_barang`, `tgl_masuk`, `qty`) VALUES
(5, 'Bridgestone', 1, 1, '2023-12-01', 140),
(6, 'Bridgestone', 4, 3, '2023-12-15', 150);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_out`
--

INSERT INTO `barang_out` (`id_barang_out`, `nama_barang`, `jumlah`, `pelanggan`, `tanggal_out`) VALUES
(1, 1, 20, 1, '2023-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Bias 750-16 GT'),
(2, 'Radial 185/70 R14'),
(3, 'Light Truck 185 R14'),
(4, 'bridgestone 750-16 mrn');

-- --------------------------------------------------------

--
-- Table structure for table `nama_barang`
--

CREATE TABLE `nama_barang` (
  `id_nama_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nama_barang`
--

INSERT INTO `nama_barang` (`id_nama_barang`, `nama_barang`) VALUES
(1, 'Gajah Tunggal 88 Super'),
(3, 'bridgestone mrn');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_tlp` varchar(14) NOT NULL,
  `plat_no` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_tlp`, `plat_no`) VALUES
(1, 'Yanto', '089990009998', 'K 1890 AA'),
(2, 'Udin', '087778887734', 'K 1890 BB');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'ipin', '123', 'Selamet Muarifin', 'admin'),
(2, 'tanio', '123', 'Mohammad Tanio', 'staf'),
(3, 'alip', '123', 'Alif Adji Setiawan', 'pimpinan'),
(4, 'fata', '123', 'Fatahurrohman Mubarok', 'admin');

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
  MODIFY `id_barang_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barang_out`
--
ALTER TABLE `barang_out`
  MODIFY `id_barang_out` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nama_barang`
--
ALTER TABLE `nama_barang`
  MODIFY `id_nama_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
