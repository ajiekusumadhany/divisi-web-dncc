-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 02:59 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdivisiweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `jtfederation`
--

CREATE TABLE `jtfederation` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ras` varchar(50) NOT NULL,
  `karakter` varchar(120) NOT NULL,
  `hobi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jtfederation`
--

INSERT INTO `jtfederation` (`id_anggota`, `nama`, `ras`, `karakter`, `hobi`) VALUES
(1, 'Ajie ikrus kusumadhany', 'Demon', 'Rimuru', 'Tidur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jtfederation`
--
ALTER TABLE `jtfederation`
  ADD PRIMARY KEY (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jtfederation`
--
ALTER TABLE `jtfederation`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
