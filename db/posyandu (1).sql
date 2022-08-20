-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 01:11 PM
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
-- Table structure for table `balita`
--

CREATE TABLE `balita` (
  `id_balita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  `nik_balita` varchar(20) NOT NULL,
  `nama_balita` varchar(128) NOT NULL,
  `tanggal_lahir_balita` date NOT NULL,
  `jk_balita` varchar(20) NOT NULL,
  `panjang_badan` int(11) NOT NULL,
  `berat_lahir` float NOT NULL,
  `lingkar_kepala` int(11) NOT NULL,
  `date_created_balita` datetime DEFAULT NULL,
  `date_updated_balita` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balita`
--

INSERT INTO `balita` (`id_balita`, `id_user`, `id_ibu`, `nik_balita`, `nama_balita`, `tanggal_lahir_balita`, `jk_balita`, `panjang_badan`, `berat_lahir`, `lingkar_kepala`, `date_created_balita`, `date_updated_balita`) VALUES
(1, 1, 1, '3525013006740032', 'Adiarja Firgantoro', '2020-01-01', 'Laki-laki', 35, 3.3, 13, '2022-07-05 00:08:18', '2022-08-17 08:08:35'),
(2, 1, 4, '3525016801790002', 'Shakila Aryani', '2020-10-07', 'Perempuan', 34, 3.1, 13, '2022-07-05 12:07:55', '2022-08-17 08:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `ibu`
--

CREATE TABLE `ibu` (
  `id_ibu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik_ibu` varchar(20) NOT NULL,
  `nama_ibu` varchar(128) NOT NULL,
  `suami_ibu` varchar(128) NOT NULL,
  `tanggal_lahir_ibu` date NOT NULL,
  `alamat_ibu` text NOT NULL,
  `date_created_ibu` datetime NOT NULL,
  `date_updated_ibu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ibu`
--

INSERT INTO `ibu` (`id_ibu`, `id_user`, `nik_ibu`, `nama_ibu`, `suami_ibu`, `tanggal_lahir_ibu`, `alamat_ibu`, `date_created_ibu`, `date_updated_ibu`) VALUES
(1, 1, '3525016005650004', 'Tantri Mandasari', 'Lanjar Gunarto', '1993-05-03', 'Kpg. Panjaitan No. 316, Depok 94555, SulUt', '2022-08-18 01:37:37', NULL),
(4, 3, '3525011506830001', 'Salimah', 'Panji Saragih', '2014-02-04', 'Ki. Honggowongso No. 97, Bima 35465, KalBar', '2022-08-01 08:08:08', '2022-08-17 08:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id_imunisasi` int(11) NOT NULL,
  `nama_imunisasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imunisasi`
--

INSERT INTO `imunisasi` (`id_imunisasi`, `nama_imunisasi`) VALUES
(4, 'Polio 1'),
(5, 'Polio 2'),
(6, 'Polio 3');

-- --------------------------------------------------------

--
-- Table structure for table `imunisasi_balita`
--

CREATE TABLE `imunisasi_balita` (
  `id_imunisasi_balita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_balita` int(11) NOT NULL,
  `id_imunisasi` int(11) NOT NULL,
  `keterangan_imunisasi` text NOT NULL,
  `tanggal_imunisasi` date NOT NULL,
  `date_created_imunisasi` datetime DEFAULT NULL,
  `date_updated_imunisasi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imunisasi_balita`
--

INSERT INTO `imunisasi_balita` (`id_imunisasi_balita`, `id_user`, `id_balita`, `id_imunisasi`, `keterangan_imunisasi`, `tanggal_imunisasi`, `date_created_imunisasi`, `date_updated_imunisasi`) VALUES
(1, 3, 2, 4, 'imunisasi', '2022-08-18', '2022-08-10 06:19:55', NULL),
(3, 3, 1, 4, '-', '2022-08-19', '2022-08-07 06:20:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `periksa_balita`
--

CREATE TABLE `periksa_balita` (
  `id_periksa_balita` int(11) NOT NULL,
  `id_pemeriksa` int(11) NOT NULL,
  `id_balita` int(11) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `tb_periksa` float NOT NULL,
  `bb_periksa` float NOT NULL,
  `lk_periksa` float NOT NULL,
  `id_vitamin` int(11) NOT NULL,
  `keterangan_periksa` text NOT NULL,
  `date_created_periksa` datetime NOT NULL,
  `date_updated_periksa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periksa_balita`
--

INSERT INTO `periksa_balita` (`id_periksa_balita`, `id_pemeriksa`, `id_balita`, `tanggal_periksa`, `tb_periksa`, `bb_periksa`, `lk_periksa`, `id_vitamin`, `keterangan_periksa`, `date_created_periksa`, `date_updated_periksa`) VALUES
(1, 3, 2, '2022-08-20', 60, 37, 20, 1, 'tidak ada keterangan', '2022-08-20 01:28:05', NULL),
(3, 1, 1, '2022-08-20', 45, 37, 15, 1, '-', '2022-08-20 05:08:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `periksa_ibu`
--

CREATE TABLE `periksa_ibu` (
  `id_periksa_ibu` int(11) NOT NULL,
  `id_pemeriksa` int(11) NOT NULL,
  `tanggal_periksa_ibu` date NOT NULL,
  `uk_periksa_ibu` varchar(128) NOT NULL,
  `td_periksa_ibu` varchar(128) NOT NULL,
  `bb_periksa_ibu` float NOT NULL,
  `lila_periksa_ibu` float NOT NULL,
  `tfundus_periksa_ibu` float NOT NULL,
  `tablet` varchar(128) NOT NULL,
  `konseling_periksa_ibu` text NOT NULL,
  `keluhan_periksa_ibu` text NOT NULL,
  `keterangan_periksa_ibu` text NOT NULL,
  `date_created_periksa_ibu` datetime NOT NULL,
  `date_updated_periksa_ibu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periksa_ibu`
--

INSERT INTO `periksa_ibu` (`id_periksa_ibu`, `id_pemeriksa`, `tanggal_periksa_ibu`, `uk_periksa_ibu`, `td_periksa_ibu`, `bb_periksa_ibu`, `lila_periksa_ibu`, `tfundus_periksa_ibu`, `tablet`, `konseling_periksa_ibu`, `keluhan_periksa_ibu`, `keterangan_periksa_ibu`, `date_created_periksa_ibu`, `date_updated_periksa_ibu`) VALUES
(1, 3, '2022-08-20', '4 minggu', '-', 60, 13, 2, '-', '-', '-', '-', '2022-08-20 13:02:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(20) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `jenis_kelamin`, `no_hp`, `alamat`, `email`, `password`, `role`, `date_created`, `date_updated`) VALUES
(1, 'Dimas Cahyo', 'Laki-laki', '081903304446', 'Pliken, Kembaran', 'dimaschronicles@gmail.com', '$2y$10$OLZyoSr5VsOXtftwLT732u4c9m2/UYL09Gop0HeDsdb24DjwkZSAW', 'admin', '2022-07-04 13:32:04', NULL),
(3, 'Usyi Mardhiyah', 'Perempuan', '085431221323', 'Jr. Nakula No. 601, Tual 51873, SulBar', 'usyi@gmail.com', '$2y$10$ZdMjdPVccR9PB6sIuboKBOoQvNa53dsUYnKKBQhns3EvXhoeKDQ6C', 'kader', '2022-08-11 07:43:33', NULL),
(4, 'Endah Kuswandari', 'Perempuan', '085431221323', 'Ki. Jend. Sudirman No. 462, Pematangsiantar 44464, NTB', 'endah@gmail.com', '$2y$10$uSwfnsnkCCqyLzA53iEXOeK1b21mAFCQqdCkofBGEqXxhiHrNoEtG', 'bidan', '2022-08-19 06:56:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vitamin`
--

CREATE TABLE `vitamin` (
  `id_vitamin` int(11) NOT NULL,
  `nama_vitamin` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vitamin`
--

INSERT INTO `vitamin` (`id_vitamin`, `nama_vitamin`) VALUES
(1, 'Vitamin A Merah'),
(2, 'Vitamin A Biru'),
(4, 'Vitamin B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balita`
--
ALTER TABLE `balita`
  ADD PRIMARY KEY (`id_balita`);

--
-- Indexes for table `ibu`
--
ALTER TABLE `ibu`
  ADD PRIMARY KEY (`id_ibu`);

--
-- Indexes for table `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`id_imunisasi`);

--
-- Indexes for table `imunisasi_balita`
--
ALTER TABLE `imunisasi_balita`
  ADD PRIMARY KEY (`id_imunisasi_balita`);

--
-- Indexes for table `periksa_balita`
--
ALTER TABLE `periksa_balita`
  ADD PRIMARY KEY (`id_periksa_balita`);

--
-- Indexes for table `periksa_ibu`
--
ALTER TABLE `periksa_ibu`
  ADD PRIMARY KEY (`id_periksa_ibu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vitamin`
--
ALTER TABLE `vitamin`
  ADD PRIMARY KEY (`id_vitamin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balita`
--
ALTER TABLE `balita`
  MODIFY `id_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ibu`
--
ALTER TABLE `ibu`
  MODIFY `id_ibu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `imunisasi_balita`
--
ALTER TABLE `imunisasi_balita`
  MODIFY `id_imunisasi_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `periksa_balita`
--
ALTER TABLE `periksa_balita`
  MODIFY `id_periksa_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `periksa_ibu`
--
ALTER TABLE `periksa_ibu`
  MODIFY `id_periksa_ibu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vitamin`
--
ALTER TABLE `vitamin`
  MODIFY `id_vitamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
