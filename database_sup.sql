-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 04:37 PM
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
-- Database: `database_sup`
--

-- --------------------------------------------------------

--
-- Table structure for table `dapeg`
--

CREATE TABLE `dapeg` (
  `id_dapeg` int(11) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL DEFAULT current_timestamp(),
  `nama_skpd` varchar(255) NOT NULL,
  `nm_pegawai` varchar(255) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `panggol` varchar(50) NOT NULL,
  `tanggol` date NOT NULL DEFAULT current_timestamp(),
  `jbtlm` text NOT NULL,
  `jbtbr` text NOT NULL,
  `usulan` text NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dapeg`
--

INSERT INTO `dapeg` (`id_dapeg`, `no_surat`, `tanggal_surat`, `nama_skpd`, `nm_pegawai`, `nip`, `panggol`, `tanggol`, `jbtlm`, `jbtbr`, `usulan`, `file`) VALUES
(12, 'tesa', '2022-09-27', 'Dinas Perdagangan Dan Perindustrian', 'tes', '214748364712345322', 'Juru Muda, I/a', '2022-09-14', 'hhhhjahjahjhajhjhjsja ahsjahsjahjs', 'hhhhjahjahjhajhjhjsja ahsjahsjahjs', 'hhhhjahjahjhajhjhjsja ahsjahsjahjs\r\n', '2022-09-27-tes.pdf'),
(13, '800/736-tes', '2022-09-02', 'Dinas Perdagangan Dan Perindustrian', 'Maman', '214748364712345311', 'Penata Muda Tingkat I, III/b', '2022-09-08', 'Jabatan Lama', 'Jabatan Baru', 'Usulan', '2022-09-02-Maman.pdf'),
(14, '800/736-tes', '2022-10-13', 'Dinas Perdagangan Dan Perindustrian', 'tes', '214748364712345322', 'Penata, III/c', '2022-10-06', 'Jabatan Lama', 'Jabatan Baru', 'Usulan', '2022-10-13-tes.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(3, 'BKD Garut', 'bkd_garut', '$2y$10$iSvnxhsujSc64ZGk99WKcOZZJBxefGYwvd.FtFhtu5E/vSALy2Xfq', 'admin'),
(5, 'Dinas Perdagangan Dan Perindustrian', 'disperindag_garut', '$2y$10$MWbzViW9KJWMA3a9qxtTwOXOu/7W8Bi2XxpvWa7/iFjL7yA/Q6viO', 'pengguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dapeg`
--
ALTER TABLE `dapeg`
  ADD PRIMARY KEY (`id_dapeg`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dapeg`
--
ALTER TABLE `dapeg`
  MODIFY `id_dapeg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
