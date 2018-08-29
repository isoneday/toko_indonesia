-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 12:53 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barangId` varchar(40) NOT NULL,
  `barangKategori` varchar(60) DEFAULT NULL,
  `barangNama` varchar(80) DEFAULT NULL,
  `barangHarga` varchar(20) DEFAULT NULL,
  `barangStok` varchar(20) DEFAULT NULL,
  `barangSuplier` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barangId`, `barangKategori`, `barangNama`, `barangHarga`, `barangStok`, `barangSuplier`) VALUES
('BR1001', 'Makanan', 'Kerupuk Ikan Tengiri', '25.000', '40', 'SP01'),
('BR1002', 'Makanan', 'Keripik Singkong', '10.000', '10', 'SP01'),
('BR1003', 'Makanan', 'Keripik Singkong', '10.000', '10', 'SP01');

-- --------------------------------------------------------

--
-- Table structure for table `supllier`
--

CREATE TABLE `supllier` (
  `suplierId` varchar(40) NOT NULL,
  `suplierNama` varchar(120) DEFAULT NULL,
  `suplierAlamat` varchar(250) DEFAULT NULL,
  `suplierKota` varchar(60) DEFAULT NULL,
  `suplierTelepon` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supllier`
--

INSERT INTO `supllier` (`suplierId`, `suplierNama`, `suplierAlamat`, `suplierKota`, `suplierTelepon`) VALUES
('SP01', 'PD Idola Snack', 'Jl. KUD SUKA DAMAI XX', 'BEKASI', '021 333 666 098'),
('SPO2', 'Herborist', 'Jl. Daan Mogot KM 11', 'JAKARTA', '021 456 445 686');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barangId`),
  ADD KEY `barangSuplier` (`barangSuplier`);

--
-- Indexes for table `supllier`
--
ALTER TABLE `supllier`
  ADD PRIMARY KEY (`suplierId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`barangSuplier`) REFERENCES `supllier` (`suplierId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
