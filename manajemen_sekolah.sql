-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2018 at 05:02 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_guru`
--

CREATE TABLE `t_guru` (
  `kode_guru` int(3) NOT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `jumlah_jam` int(2) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_guru`
--

INSERT INTO `t_guru` (`kode_guru`, `nama_guru`, `jumlah_jam`, `alamat`, `telp`, `email`) VALUES
(11, 'Fuad Choliq', 3, 'Jalan Mawar No. 23, Malang', '08565523286', 'rko@gmail.com'),
(13, 'Felly Fitriani', 6, 'Jalan Ranau No. 28, Malang', '08578212483', 'felly@gmail.com'),
(14, 'Hadi Teguh', 3, 'Jalan Hatiku No. 78, Malang', '08124231728', 'hadi@gmail.com'),
(17, 'Rakha Sehat', 3, 'Jalan Eyek No. 25, Malang', '08512344555', 'deas@gmail.com'),
(18, 'Alif Babrizq', 2, 'Jalan Ukiran No. 5, Malang', '08572345981', 'alif@gmail.com'),
(19, 'Nando Dwiki', 3, 'Jalan Utem No. 1, Malang', '08572134531', 'ejsu@gmail.com'),
(22, 'Yusuf Wibisono', 2, 'Jalan Kos No. 23, Malang', '08561275761', 'scas@gmail.com'),
(30, 'Retri Ebri', 6, 'Jalan Premium No. 69, Malang', '08571237621', 'ebri@gmail.com'),
(31, 'Aghna Zalilla', 2, 'Jalan Ijo No. 45, Malang', '08564432817', 'aghnaca@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `t_mapel`
--

CREATE TABLE `t_mapel` (
  `kode_mapel` char(3) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `alokasi_waktu` int(2) NOT NULL,
  `semester` int(2) NOT NULL,
  `kode_guru` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_mapel`
--

INSERT INTO `t_mapel` (`kode_mapel`, `mapel`, `alokasi_waktu`, `semester`, `kode_guru`) VALUES
('A09', 'Matematika', 2, 2, 22),
('A42', 'Crimping', 4, 2, 30),
('B07', 'Bahasa Indonesia', 3, 5, 13),
('B87', 'Fokus UKL', 6, 2, 17),
('C23', 'Sistem Algoritma', 1, 4, 17),
('E31', 'Sistem Komputer', 4, 2, 22),
('T12', 'Teknik Program', 4, 2, 14),
('Y54', 'Seni Budaya', 3, 3, 19);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `userid` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`userid`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(3, 'rakha', 'sehat'),
(5, 'root', 'root');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_guru`
--
ALTER TABLE `t_guru`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indexes for table `t_mapel`
--
ALTER TABLE `t_mapel`
  ADD PRIMARY KEY (`kode_mapel`),
  ADD KEY `kode_guru` (`kode_guru`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_guru`
--
ALTER TABLE `t_guru`
  MODIFY `kode_guru` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `userid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_mapel`
--
ALTER TABLE `t_mapel`
  ADD CONSTRAINT `t_mapel_ibfk_1` FOREIGN KEY (`kode_guru`) REFERENCES `t_guru` (`kode_guru`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
