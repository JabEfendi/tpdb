-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 11:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_laporankeuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$zUEgYeC84YpVQp73ULwFc.g.tVlt0ppfwlvGIHjqkRQeTBIrVC/3u');

-- --------------------------------------------------------

--
-- Table structure for table `bem_senat`
--

CREATE TABLE `bem_senat` (
  `ID_BS` int(11) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `BAGIAN` varchar(32) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASS` varchar(255) NOT NULL,
  `DESKRIPSI` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bem_senat`
--

INSERT INTO `bem_senat` (`ID_BS`, `NAMA`, `BAGIAN`, `USERNAME`, `PASS`, `DESKRIPSI`) VALUES
(1, 'BEM', 'Keuangan', 'bem', '$2y$10$ip.P5gpkShYS5bQ2FnFNY.S80VBKhojeQ7pjU1VbK/Y6Mpc.3vn.2', 'Ini Bem');

-- --------------------------------------------------------

--
-- Table structure for table `bkm`
--

CREATE TABLE `bkm` (
  `ID_BKM` int(11) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASS` varchar(255) NOT NULL,
  `TELP` varchar(14) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bkm`
--

INSERT INTO `bkm` (`ID_BKM`, `NAMA`, `USERNAME`, `PASS`, `TELP`, `EMAIL`) VALUES
(2, 'BKM', 'bkm', '$2y$10$htfza/5DG5yRTcP0P9ArK.AX96q4BXfPNAzJBQSsVK3epaiBdEkLS', '08223848347', 'bkm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kegiatan`
--

CREATE TABLE `jadwal_kegiatan` (
  `ID_JK` int(11) NOT NULL,
  `JUDUL` varchar(100) NOT NULL,
  `STAT` varchar(12) NOT NULL CHECK (`STAT` = 'COMING SOON' or `STAT` = 'ON GOING' or `STAT` = 'FINISHED'),
  `TANGGAL_PENGESAHAN` datetime NOT NULL,
  `TANGGAL_PELAKSANAAN` date NOT NULL,
  `ID_BS` int(11) NOT NULL,
  `ID_PKP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_kegiatan`
--

INSERT INTO `jadwal_kegiatan` (`ID_JK`, `JUDUL`, `STAT`, `TANGGAL_PENGESAHAN`, `TANGGAL_PELAKSANAAN`, `ID_BS`, `ID_PKP`) VALUES
(1, 'Tes', 'ON GOING', '2023-12-02 11:27:00', '2023-12-02', 1, 5),
(2, 'Pely', 'ON GOING', '2023-12-09 00:00:00', '2023-12-02', 1, 6),
(3, 'Proposal', 'ON GOING', '2023-12-15 00:00:00', '2023-11-29', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `ID_LK` int(11) NOT NULL,
  `JUDUL` varchar(100) NOT NULL,
  `LAPORAN` varchar(100) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `ID_UKM` int(11) NOT NULL,
  `ID_PKP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemberian_dana`
--

CREATE TABLE `pemberian_dana` (
  `ID_PD` int(11) NOT NULL,
  `JUDUL` varchar(100) NOT NULL,
  `JUMLAH_DANA` int(11) NOT NULL,
  `NAMA_UKM` varchar(50) NOT NULL,
  `DESKRIPSI` varchar(100) NOT NULL,
  `TANGGAL_PENCAIRAN` date NOT NULL,
  `ID_BKM` int(11) NOT NULL,
  `ID_PKP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_kegiatan_dan_pendanaan`
--

CREATE TABLE `proposal_kegiatan_dan_pendanaan` (
  `ID_PKP` int(11) NOT NULL,
  `JUDUL` varchar(100) NOT NULL,
  `PROPOSAL` varchar(100) NOT NULL,
  `STAT` varchar(32) DEFAULT NULL,
  `TANGGAL` date NOT NULL,
  `ID_UKM` int(11) NOT NULL,
  `ID_BS` int(11) DEFAULT NULL,
  `ID_BKM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proposal_kegiatan_dan_pendanaan`
--

INSERT INTO `proposal_kegiatan_dan_pendanaan` (`ID_PKP`, `JUDUL`, `PROPOSAL`, `STAT`, `TANGGAL`, `ID_UKM`, `ID_BS`, `ID_BKM`) VALUES
(4, 'Proposal', 'Profile4.pdf', 'Z', '2023-11-29', 2, NULL, NULL),
(5, 'Tes', 'PUBLIKASI_08_12_2982.pdf', 'Y', '2023-11-29', 2, NULL, NULL),
(6, 'Pely', 'Dokumen_tanpa_judul.pdf', 'Y', '2023-12-02', 2, NULL, NULL),
(9, 'Pepepepe', 'PUBLIKASI_08_12_29821.pdf', 'X', '2023-12-04', 2, NULL, NULL),
(10, 'Pepepepe', 'PUBLIKASI_08_12_29822.pdf', 'X', '2023-12-04', 2, NULL, NULL),
(11, 'Ini proposal', 'Profile5.pdf', 'X', '2023-12-04', 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rekaman`
--

CREATE TABLE `rekaman` (
  `ID_REK` int(11) NOT NULL,
  `JUDUL` varchar(100) NOT NULL,
  `REKAMAN` varchar(100) NOT NULL,
  `AKUN` varchar(20) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `ID_LK` int(11) NOT NULL,
  `ID_UKM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `ID_UKM` int(11) NOT NULL,
  `NAMA_UKM` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASS` varchar(255) NOT NULL,
  `DESKRIPSI` varchar(100) NOT NULL,
  `TANGGAL_PEMBUATAN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`ID_UKM`, `NAMA_UKM`, `USERNAME`, `PASS`, `DESKRIPSI`, `TANGGAL_PEMBUATAN`) VALUES
(2, 'KOMA', 'koma', '$2y$10$SpCUK7HLa564lkJwc1rGKuxCH0d40CgQ.bQytY/7yStThBTzSLGES', 'Ini Koma', '2023-11-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bem_senat`
--
ALTER TABLE `bem_senat`
  ADD PRIMARY KEY (`ID_BS`);

--
-- Indexes for table `bkm`
--
ALTER TABLE `bkm`
  ADD PRIMARY KEY (`ID_BKM`);

--
-- Indexes for table `jadwal_kegiatan`
--
ALTER TABLE `jadwal_kegiatan`
  ADD PRIMARY KEY (`ID_JK`),
  ADD KEY `ID_BS` (`ID_BS`),
  ADD KEY `ID_PKP` (`ID_PKP`);

--
-- Indexes for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`ID_LK`),
  ADD KEY `ID_UKM` (`ID_UKM`),
  ADD KEY `ID_PKP` (`ID_PKP`);

--
-- Indexes for table `pemberian_dana`
--
ALTER TABLE `pemberian_dana`
  ADD PRIMARY KEY (`ID_PD`),
  ADD KEY `ID_BKM` (`ID_BKM`),
  ADD KEY `ID_PKP` (`ID_PKP`);

--
-- Indexes for table `proposal_kegiatan_dan_pendanaan`
--
ALTER TABLE `proposal_kegiatan_dan_pendanaan`
  ADD PRIMARY KEY (`ID_PKP`),
  ADD KEY `ID_UKM` (`ID_UKM`),
  ADD KEY `ID_BS` (`ID_BS`),
  ADD KEY `ID_BKM` (`ID_BKM`);

--
-- Indexes for table `rekaman`
--
ALTER TABLE `rekaman`
  ADD PRIMARY KEY (`ID_REK`),
  ADD KEY `ID_LK` (`ID_LK`),
  ADD KEY `ID_UKM` (`ID_UKM`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`ID_UKM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bem_senat`
--
ALTER TABLE `bem_senat`
  MODIFY `ID_BS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bkm`
--
ALTER TABLE `bkm`
  MODIFY `ID_BKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_kegiatan`
--
ALTER TABLE `jadwal_kegiatan`
  MODIFY `ID_JK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `ID_LK` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemberian_dana`
--
ALTER TABLE `pemberian_dana`
  MODIFY `ID_PD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposal_kegiatan_dan_pendanaan`
--
ALTER TABLE `proposal_kegiatan_dan_pendanaan`
  MODIFY `ID_PKP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rekaman`
--
ALTER TABLE `rekaman`
  MODIFY `ID_REK` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ukm`
--
ALTER TABLE `ukm`
  MODIFY `ID_UKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_kegiatan`
--
ALTER TABLE `jadwal_kegiatan`
  ADD CONSTRAINT `jadwal_kegiatan_ibfk_2` FOREIGN KEY (`ID_BS`) REFERENCES `bem_senat` (`ID_BS`),
  ADD CONSTRAINT `jadwal_kegiatan_ibfk_3` FOREIGN KEY (`ID_PKP`) REFERENCES `proposal_kegiatan_dan_pendanaan` (`ID_PKP`);

--
-- Constraints for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD CONSTRAINT `laporan_keuangan_ibfk_3` FOREIGN KEY (`ID_UKM`) REFERENCES `ukm` (`ID_UKM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_keuangan_ibfk_4` FOREIGN KEY (`ID_PKP`) REFERENCES `proposal_kegiatan_dan_pendanaan` (`ID_PKP`);

--
-- Constraints for table `pemberian_dana`
--
ALTER TABLE `pemberian_dana`
  ADD CONSTRAINT `pemberian_dana_ibfk_2` FOREIGN KEY (`ID_BKM`) REFERENCES `bkm` (`ID_BKM`),
  ADD CONSTRAINT `pemberian_dana_ibfk_3` FOREIGN KEY (`ID_PKP`) REFERENCES `proposal_kegiatan_dan_pendanaan` (`ID_PKP`);

--
-- Constraints for table `proposal_kegiatan_dan_pendanaan`
--
ALTER TABLE `proposal_kegiatan_dan_pendanaan`
  ADD CONSTRAINT `proposal_kegiatan_dan_pendanaan_ibfk_1` FOREIGN KEY (`ID_UKM`) REFERENCES `ukm` (`ID_UKM`),
  ADD CONSTRAINT `proposal_kegiatan_dan_pendanaan_ibfk_2` FOREIGN KEY (`ID_BS`) REFERENCES `bem_senat` (`ID_BS`),
  ADD CONSTRAINT `proposal_kegiatan_dan_pendanaan_ibfk_3` FOREIGN KEY (`ID_BKM`) REFERENCES `bkm` (`ID_BKM`);

--
-- Constraints for table `rekaman`
--
ALTER TABLE `rekaman`
  ADD CONSTRAINT `rekaman_ibfk_3` FOREIGN KEY (`ID_LK`) REFERENCES `laporan_keuangan` (`ID_LK`),
  ADD CONSTRAINT `rekaman_ibfk_4` FOREIGN KEY (`ID_UKM`) REFERENCES `ukm` (`ID_UKM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
