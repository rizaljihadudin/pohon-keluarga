-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 05:21 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silsilah`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `id_ayah` int(11) DEFAULT NULL,
  `gender` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id`, `nama`, `id_ayah`, `gender`) VALUES
(1, 'Budi', 0, 'L'),
(2, 'Dedi', 1, 'L'),
(3, 'Dodi', 1, 'L'),
(4, 'Dede', 1, 'L'),
(5, 'Dewi', 1, 'P'),
(6, 'Feri', 2, 'L'),
(8, 'Gugus', 3, 'L'),
(9, 'Gandi', 3, 'L'),
(10, 'Hani', 4, 'P'),
(11, 'Hana', 4, 'P'),
(12, 'aceng', 3, 'L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
