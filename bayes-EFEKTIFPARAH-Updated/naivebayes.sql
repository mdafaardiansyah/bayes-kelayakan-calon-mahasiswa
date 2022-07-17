-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 07:43 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naivebayes`
--

-- --------------------------------------------------------

--
-- Table structure for table `atribut`
--

CREATE TABLE `atribut` (
  `nomor` int NOT NULL,
  `jsekolah` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pil1` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pil2` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nrata` decimal(10,2) NOT NULL,
  `pilus` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atribut`
--

INSERT INTO `atribut` (`nomor`, `jsekolah`, `pil1`, `pil2`, `nrata`, `pilus`) VALUES
(1, 'IPA (Ilmu Pengetahuan Alam)', 'Sistem Informasi', 'Ilmu Pemerintahan', '55.83', 'Pilihan Pertama'),
(2, 'Bahasa', 'Sistem Informasi', 'Ilmu Pemerintahan', '42.78', 'Pilihan Kedua'),
(3, 'IPS (Ilmu Pengetahuan Sosial)', 'Sistem Informasi', 'Ilmu Pemerintahan', '50.28', 'Pilihan Pertama'),
(4, 'TKJ (Teknik Komputer Jaringan)', 'Sistem Informasi', 'Teknik Informatika', '52.50', 'Pilihan Pertama'),
(5, 'IPS (Ilmu Pengetahuan Sosial)', 'Ilmu Pemerintahan', 'Sistem Informasi', '42.78', 'Pilihan Pertama'),
(6, 'Kesehatan', 'Kesehatan Masyarakat', 'Peternakan', '47.22', 'Pilihan Pertama'),
(7, 'Bahasa', 'Ilmu Pemerintahan', 'Matematika', '44.72', 'Pilihan Pertama'),
(8, 'Perkantoran', 'Ilmu Pemerintahan', 'Ekonomi Islam', '47.50', 'Pilihan Pertama'),
(9, 'IPS (Ilmu Pengetahuan Sosial)', 'PPKn', 'Ilmu Pemerintahan', '43.61', 'Pilihan Kedua'),
(10, 'IPS (Ilmu Pengetahuan Sosial)', 'Bahasa Indonesia', 'Ilmu Pemerintahan', '44.44', 'Pilihan Kedua'),
(11, 'IPA (Ilmu Pengetahuan Alam)', 'Matematika', 'Sistem Informasi', '50.11', 'Pilihan Pertama'),
(12, 'Kesehatan', 'Kesehatan Masyarakat', 'Sistem Informasi', '52.22', 'Pilihan Pertama'),
(13, 'IPS (Ilmu Pengetahuan Sosial)', 'Sistem Informasi', 'Ilmu Pemerintahan', '50.28', 'Pilihan Pertama'),
(18, 'IPA (Ilmu pengetahuan Alam)', 'Sistem Informasi', 'Ilmu Pemerintahan', '55.83', 'Pilihan Pertama'),
(19, 'IPA (Ilmu pengetahuan Alam)', 'Sistem Informasi', 'Ekonomi Islam', '50.11', 'Pilihan Pertama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atribut`
--
ALTER TABLE `atribut`
  ADD PRIMARY KEY (`nomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atribut`
--
ALTER TABLE `atribut`
  MODIFY `nomor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
