-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 03:50 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sps16`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`id_jenis`, `jenis`) VALUES
(1, 'surat jenis 1'),
(2, 'surat jenis khusus');

-- --------------------------------------------------------

--
-- Table structure for table `lap_pemalsuan`
--

CREATE TABLE `lap_pemalsuan` (
  `id_lp` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_kontak` varchar(255) NOT NULL,
  `foto_dokumen` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE `rt` (
  `id_rt` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `pas_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rt`
--

INSERT INTO `rt` (`id_rt`, `id_user`, `nama`, `nik`, `no_kk`, `pas_foto`) VALUES
(50, 100, 'ketua rt 50', '1', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `status_verifikasi` int(11) NOT NULL,
  `status_pemalsuan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `noreg_rt` varchar(255) DEFAULT NULL,
  `noreg_rw` varchar(255) DEFAULT NULL,
  `tanggal_diajukan` datetime DEFAULT NULL,
  `tanggal_ttd_rt` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `id_warga`, `id_jenis`, `status_verifikasi`, `status_pemalsuan`, `nama`, `qrcode`, `pdf`, `noreg_rt`, `noreg_rw`, `tanggal_diajukan`, `tanggal_ttd_rt`, `tanggal_selesai`) VALUES
(1, 318, 2, 0, 0, '0', NULL, NULL, NULL, NULL, '2021-02-04 21:48:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(99, 'sarah_warga', 's', 3),
(100, 'sarah_rt', 's', 2);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id_warga` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_rt` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `pas_foto` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `status_verifikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id_warga`, `id_user`, `id_rt`, `nama`, `nik`, `no_kk`, `pas_foto`, `jenis`, `status_verifikasi`) VALUES
(318, 99, 50, 'warga rt 50', '0', '0', '0', 'tetap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warga_musiman`
--

CREATE TABLE `warga_musiman` (
  `id_wm` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `sk_pindah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `lap_pemalsuan`
--
ALTER TABLE `lap_pemalsuan`
  ADD PRIMARY KEY (`id_lp`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id_rt`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_warga` (`id_warga`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_rt` (`id_rt`);

--
-- Indexes for table `warga_musiman`
--
ALTER TABLE `warga_musiman`
  ADD PRIMARY KEY (`id_wm`),
  ADD KEY `id_warga` (`id_warga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lap_pemalsuan`
--
ALTER TABLE `lap_pemalsuan`
  MODIFY `id_lp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `warga_musiman`
--
ALTER TABLE `warga_musiman`
  MODIFY `id_wm` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lap_pemalsuan`
--
ALTER TABLE `lap_pemalsuan`
  ADD CONSTRAINT `lap_pemalsuan_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`);

--
-- Constraints for table `rt`
--
ALTER TABLE `rt`
  ADD CONSTRAINT `rt_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`),
  ADD CONSTRAINT `surat_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_surat` (`id_jenis`);

--
-- Constraints for table `warga`
--
ALTER TABLE `warga`
  ADD CONSTRAINT `warga_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `warga_ibfk_2` FOREIGN KEY (`id_rt`) REFERENCES `rt` (`id_rt`);

--
-- Constraints for table `warga_musiman`
--
ALTER TABLE `warga_musiman`
  ADD CONSTRAINT `warga_musiman_ibfk_1` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
