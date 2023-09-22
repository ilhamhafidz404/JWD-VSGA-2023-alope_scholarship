-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2023 at 10:03 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alope_scholarship`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'ilham admin', 'admin', 'password'),
(2, 'YUSUF ADMIN', 'yusuf', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `scholar`
--

CREATE TABLE `scholar` (
  `id` int(11) NOT NULL,
  `register_date` date NOT NULL,
  `nim` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(15) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `ipk` float NOT NULL,
  `scholar` enum('A','NA') NOT NULL,
  `file` text NOT NULL,
  `status` enum('accepted','rejected','pending','') NOT NULL,
  `by` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholar`
--

INSERT INTO `scholar` (`id`, `register_date`, `nim`, `email`, `number`, `semester`, `ipk`, `scholar`, `file`, `status`, `by`, `name`) VALUES
(1, '2023-09-20', '20220810052', 'ilhammhafidzz@gmail.com', '083871352030', '3', 3.5, 'NA', '59da747f480503ee114757ce528a2e57.png', 'rejected', 'ilham admin', 'Ilham Hafidz');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ipk` float NOT NULL DEFAULT '3.5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nim`, `password`, `nama`, `ipk`) VALUES
(13, '20220810052', '$2y$10$nj2XOGahxW/aX14KchxWc.rzWFVnRhjPdZJLN4MJb0ICSv82Lp1v2', 'Ilham Hafidz', 3.5),
(14, '20220810070', '$2y$10$zhD.aFPhUsiD4SKMnJafz.JU5JDB0hshtAxjLAdVfrVVG9C958Cji', 'Faizal Yusuf', 3.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholar`
--
ALTER TABLE `scholar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scholar`
--
ALTER TABLE `scholar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
