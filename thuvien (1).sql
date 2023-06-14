-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2023 at 03:14 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thuvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `namebook` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `namebook`, `soluong`, `status`) VALUES
(1, 'dac nhan tam', 10, 1),
(2, 'thuc day de thanh cong', 29, 1),
(4, 'lao hac', 10, 1),
(5, 'chị dậu', 15, 1),
(6, 'a', 10, 1),
(7, 'những ngôi sao xa xăm', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `personid` int(11) NOT NULL,
  `sachid` int(11) NOT NULL,
  `soluongmuon` int(11) NOT NULL,
  `ngaymuon` date NOT NULL,
  `ngaytra` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `personid`, `sachid`, `soluongmuon`, `ngaymuon`, `ngaytra`, `status`) VALUES
(67, 3, 1, 1, '2023-05-28', '2023-05-29', 1),
(68, 1, 5, 1, '2023-05-28', '2023-05-29', 1),
(69, 1, 5, 1, '2023-05-28', '2023-05-29', 1),
(70, 1, 5, 1, '2023-05-28', '2023-05-29', 1),
(71, 1, 5, 1, '2023-05-29', '2023-05-30', 1),
(72, 1, 5, 1, '2023-05-29', '2023-05-30', 1),
(73, 1, 5, 1, '2023-05-29', '2023-05-30', 1),
(74, 1, 5, 1, '2023-05-29', '2023-05-30', 1),
(75, 1, 5, 1, '2023-05-29', '2023-05-30', 1),
(76, 3, 7, 1, '2023-05-29', '2023-05-30', 1),
(77, 3, 7, 1, '2023-05-29', '2023-05-30', 1),
(78, 3, 7, 1, '2023-05-29', '2023-05-30', 1),
(79, 3, 5, 1, '2023-05-29', '2023-05-30', 1),
(80, 3, 5, 1, '2023-05-29', '2023-05-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MSV` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `MSV`, `status`) VALUES
(1, 'A', '1', 1),
(2, 'B', '2', 1),
(3, 'C', '3', 1),
(4, 'D', '4', 1),
(6, 'E', '5', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
