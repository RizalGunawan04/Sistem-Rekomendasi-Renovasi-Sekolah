-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 07:00 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renovasi-sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `kode_sekolah` varchar(16) NOT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `ket_sekolah` varchar(255) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `penilaian_total` double DEFAULT NULL,
  `tingkat_kerusakan` varchar(255) DEFAULT NULL,
  `ket_hasil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`kode_sekolah`, `nama_sekolah`, `ket_sekolah`, `bukti`, `user`, `pass`, `total`, `rank`, `penilaian_total`, `tingkat_kerusakan`, `ket_hasil`) VALUES
('A001', 'SD NEGERI LAHENDONG', 'Bangunan Kelas 6, Kantor, UKS, Drainase WC', '5596SD NEGERI LAHENDONG.jpg', 'A001', '$2y$10$Devj5y66ci1PUd79zlF9QeBijSi41oIeT6qIi0MSObte8nE5KcM3q', 0.15614285714286, 6, 45.4, 'Rusak Berat', 'Dibiayai DAK'),
('A002', 'SD INPRES WAILAN', 'Ruang Guru', '7698SD INPRES WAILAN.jpg', 'A002', '$2y$10$KbYW1Gji4.fosUtqgIDG4eBOFU.VmeFU3f5gijJ5CfSLJ2SSXLtrG', 0.11087619047619, 9, 44.88, 'Rusak Sedang', 'Dibiayai DAK'),
('A003', 'SD INPRES LAHENDONG', 'Bangunan Kelas 1,2,3, UKS, Perpustakaan', '3629SD INPRES LAHENDONG.jpg', 'A003', '$2y$10$9dHauyKe7DgMEJtV1HBuLOkMocffCmx2AeoKx1siK/lSMpRy6kSY.', 0.23248657407407, 2, 77.24, 'Rusak Berat', 'Dibiayai DAK'),
('A004', 'SD GMIM 2 TINOOR', 'Bangunan Utama (Perpustakaan, UKS, Ruang Kelas 1-6), Kamar Mandi/Wc', '8196SD GMIM 2 TINOOR.jpg', 'A004', '$2y$10$Y/TtX.VwB1beLzNisnG9bu4k8wIfAS3aDO/L5IePouPXIWm56VK6q', 0.18342476851852, 5, 50.11, 'Rusak Berat', 'Dibiayai DAK'),
('A005', 'SD INPRES TARATARA I', 'SD Inpres Taratara I', '3974SD INPRES TARATARA 1.jpg', 'A005', '$2y$10$CmNxqUjjAfssEe5krj6QCOjiONeOVUBbZyGmU2RsovO9XlbpAsUM.', 0.22742407407407, 3, 75.82, 'Rusak Berat', 'Dibiayai DAK'),
('A006', 'SD INPRES LANSOT', 'Bangunan SD Inpres Lansot', '6416SD INPRES LANSOT.jpg', 'A006', '$2y$10$xkiEWx2T.rH6S6uqabw5SeM2joq4dGV0gBaRJxGZ2wW.5/GX8NxLy', 0.099712003968254, 10, 40.5, 'Rusak Sedang', 'Dibiayai DAK'),
('A007', 'SD KATOLIK I ST.YOHANES TOMOHON', 'Bangunan SD Katolik I St.Yohanes Tomohon', '1670SD KATOLIK I ST.YOHANES TOMOHON.jpg', 'A007', '$2y$10$IVVfaJCF4fiBO9hbuPQlbOI/DKdANsaGISyadB2n62vUg2liWFS1K', 0.073665873015873, 13, 31.16, 'Rusak Sedang', 'Dibiayai DAK'),
('A008', 'SD NEGERI SARONSONG', 'Bangunan Kelas 6,4,3,1,5 Perpustakaan, Wc', '1266SD NEGERI SARONSONG.jpg', 'A008', '$2y$10$gCo7ITl0bKM1LJOn5rEpg.08RPbWWUnb71uQdZDuSVEX50uUlJfg2', 0.087073908730159, 12, 34.97, 'Rusak Sedang', 'Dibiayai DAK'),
('A009', 'SMP KRISTEN TOMOHON', 'Bangunan Kelas, UKS', '2972SMP KRISTEN TOMOHON.jpg', 'A009', '$2y$10$jpIb60SlleOv6QuVWdCAHu6Q3M9boSTq88ttQEvCRXNy0OEHW9AWC', 0.095779265873016, 11, 37.42, 'Rusak Sedang', 'Dibiayai DAK'),
('A010', 'SMP KATOLIK GONZAGA TOMOHON', 'Bangunan Kelas, Guru, UKS, Perpustakaan', '8163SMP KATOLIK GONZAGA TOMOHON.jpg', 'A010', '$2y$10$DKMTlkPEhfz6etOwWayXjOpczrjtS1yIG6wpB2ryWJ3zZ3XUQ/P/i', 0.13646428571429, 7, 56.87, 'Rusak Berat', 'Dibiayai DAK'),
('A011', 'SMP NEGERI 2 TOMOHON', 'Bangunan SMP Negeri 2 Tomohon (Ruang Kelas dan Lab TIK) dan Bangunan Laboratorium IPA', '6304SMP NEGERI 2 TOMOHON.jpg', 'A011', '$2y$10$MfA/dXzG8Whhm3DQXoxTJutl6fdSEPmggkE8afsTWJDpmNuw0Heva', 0.22514596560847, 4, 55.19, 'Rusak Berat', 'Dibiayai DAK'),
('A012', 'SMP KRISTEN TARATARA', 'Gedung C (Ruang Aula), Ruang Kelas', '1064SMP KRISTEN TARATARA.jpg', 'A012', '$2y$10$sgnp0DQq9WDQTZ15Cw7tGeqCPgRRBSjboylYTSPzszpRFRrT1lO/e', 0.12154761904762, 8, 48.54, 'Rusak Berat', 'Dibiayai DAK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(255) DEFAULT NULL,
  `bobot` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`, `bobot`) VALUES
('C01', 'Pondasi', 5),
('C02', 'Struktur', 5),
('C03', 'Atap', 5),
('C04', 'Plafond', 5),
('C05', 'Dinding', 5),
('C06', 'Lantai', 5),
('C07', 'Utilitas', 5),
('C08', 'Finishing', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `ID` int(11) NOT NULL,
  `kode_sekolah` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`ID`, `kode_sekolah`, `kode_kriteria`, `nilai`) VALUES
(1, 'A001', 'C01', 40),
(2, 'A002', 'C01', 0),
(3, 'A003', 'C01', 0),
(4, 'A004', 'C01', 20),
(5, 'A005', 'C01', 0),
(6, 'A001', 'C02', 4),
(7, 'A002', 'C02', 0),
(8, 'A003', 'C02', 0),
(9, 'A004', 'C02', 11),
(10, 'A005', 'C02', 0),
(11, 'A001', 'C03', 0),
(12, 'A002', 'C03', 36),
(13, 'A003', 'C03', 32),
(14, 'A004', 'C03', 2.6),
(15, 'A005', 'C03', 32),
(16, 'A001', 'C04', 0.8),
(17, 'A002', 'C04', 1.28),
(18, 'A003', 'C04', 1.92),
(19, 'A004', 'C04', 0),
(20, 'A005', 'C04', 1.92),
(21, 'A001', 'C05', 0.6),
(22, 'A002', 'C05', 2),
(23, 'A003', 'C05', 35),
(24, 'A004', 'C05', 0),
(25, 'A005', 'C05', 35),
(26, 'A001', 'C06', 0),
(27, 'A002', 'C06', 1.6),
(28, 'A003', 'C06', 3.2),
(29, 'A004', 'C06', 2.2),
(30, 'A005', 'C06', 3.6),
(31, 'A001', 'C07', 0),
(32, 'A002', 'C07', 4),
(33, 'A003', 'C07', 0.3),
(34, 'A004', 'C07', 6.5),
(35, 'A005', 'C07', 0.9),
(36, 'A001', 'C08', 0),
(37, 'A002', 'C08', 0),
(38, 'A003', 'C08', 4.82),
(39, 'A004', 'C08', 7.81),
(40, 'A005', 'C08', 2.4),
(160, 'A006', 'C01', 0),
(161, 'A006', 'C02', 0),
(162, 'A006', 'C03', 31.8),
(163, 'A006', 'C04', 0.08),
(164, 'A006', 'C05', 1.85),
(165, 'A006', 'C06', 0),
(166, 'A006', 'C07', 3.3),
(167, 'A006', 'C08', 3.47),
(175, 'A007', 'C01', 0),
(176, 'A007', 'C02', 0),
(177, 'A007', 'C03', 30),
(178, 'A007', 'C04', 0.08),
(179, 'A007', 'C05', 1),
(180, 'A007', 'C06', 0),
(181, 'A007', 'C07', 0),
(182, 'A007', 'C08', 0.08),
(190, 'A008', 'C01', 0),
(191, 'A008', 'C02', 0),
(192, 'A008', 'C03', 30),
(193, 'A008', 'C04', 1.2),
(194, 'A008', 'C05', 0.08),
(195, 'A008', 'C06', 0),
(196, 'A008', 'C07', 0.3),
(197, 'A008', 'C08', 3.39),
(205, 'A009', 'C01', 0),
(206, 'A009', 'C02', 0),
(207, 'A009', 'C03', 30),
(208, 'A009', 'C04', 1.6),
(209, 'A009', 'C05', 0.75),
(210, 'A009', 'C06', 0),
(211, 'A009', 'C07', 0.3),
(212, 'A009', 'C08', 4.77),
(220, 'A010', 'C01', 0),
(221, 'A010', 'C02', 0),
(222, 'A010', 'C03', 54),
(223, 'A010', 'C04', 1.6),
(224, 'A010', 'C05', 0.27),
(225, 'A010', 'C06', 0),
(226, 'A010', 'C07', 1),
(227, 'A010', 'C08', 0),
(235, 'A011', 'C01', 0),
(236, 'A011', 'C02', 18),
(237, 'A011', 'C03', 16),
(238, 'A011', 'C04', 5.12),
(239, 'A011', 'C05', 1.35),
(240, 'A011', 'C06', 0),
(241, 'A011', 'C07', 1.3),
(242, 'A011', 'C08', 13.42),
(250, 'A012', 'C01', 0),
(251, 'A012', 'C02', 0),
(252, 'A012', 'C03', 36),
(253, 'A012', 'C04', 0),
(254, 'A012', 'C05', 0.76),
(255, 'A012', 'C06', 0.6),
(256, 'A012', 'C07', 1.5),
(257, 'A012', 'C08', 9.68);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `kode_user` varchar(16) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  `level` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kode_user`, `nama_user`, `user`, `pass`, `level`) VALUES
('U001', 'JONGKY V. KAPOH, ST', 'Admin', '$2y$10$Y7uBiidYDSjaUtFa6QL7mO2tplPhjq2d8KQdEqP/DHvCuqE5QRkSm', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`kode_sekolah`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
