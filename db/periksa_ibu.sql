-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 11:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `periksa_ibu`
--

CREATE TABLE `periksa_ibu` (
  `id_periksa_ibu` int(11) NOT NULL,
  `id_pemeriksa` int(11) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  `tanggal_periksa_ibu` date NOT NULL,
  `uk_periksa_ibu` varchar(128) NOT NULL,
  `id_imunisasi` int(11) NOT NULL,
  `bb_periksa_ibu` float NOT NULL,
  `lila_periksa_ibu` float NOT NULL,
  `tfundus_periksa_ibu` float NOT NULL,
  `id_vitamin` int(11) NOT NULL,
  `konseling_periksa_ibu` text NOT NULL,
  `keluhan_periksa_ibu` text NOT NULL,
  `keterangan_periksa_ibu` text NOT NULL,
  `date_created_periksa_ibu` datetime NOT NULL,
  `date_updated_periksa_ibu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `periksa_ibu`
--
ALTER TABLE `periksa_ibu`
  ADD PRIMARY KEY (`id_periksa_ibu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `periksa_ibu`
--
ALTER TABLE `periksa_ibu`
  MODIFY `id_periksa_ibu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
