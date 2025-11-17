-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 08:45 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_2021`
--

CREATE TABLE `jadwal_2021` (
  `id` int(11) NOT NULL,
  `triwulan` varchar(155) NOT NULL,
  `awal` date DEFAULT NULL,
  `akhir` date DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_2021`
--

INSERT INTO `jadwal_2021` (`id`, `triwulan`, `awal`, `akhir`, `status`) VALUES
(1, 'Evaluasi Triwulan I', '2021-04-01', '2021-05-04', 'active'),
(2, 'Evaluasi Triwulan II', '2021-07-01', '2021-07-17', 'not active'),
(3, 'Evaluasi Triwulan III', '2021-10-01', '2021-10-17', 'not active'),
(4, 'Evaluasi Triwulan IV', '2022-01-01', '2022-01-16', 'not active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_2021`
--
ALTER TABLE `jadwal_2021`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_2021`
--
ALTER TABLE `jadwal_2021`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
