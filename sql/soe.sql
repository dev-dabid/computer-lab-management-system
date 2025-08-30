-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2025 at 09:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soe`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `name` varchar(128) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`name`, `username`, `password`) VALUES
('Joaquin Angelo Lorenzo', 'admin', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `logged_in_users`
--

CREATE TABLE `logged_in_users` (
  `id` bigint(20) NOT NULL,
  `hostname` varchar(255) DEFAULT NULL,
  `login_status` bit(1) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logged_in_users`
--

INSERT INTO `logged_in_users` (`id`, `hostname`, `login_status`, `login_time`, `logout_time`, `username`) VALUES
(1, 'DESKTOP-TORLD5D', b'0', '2025-08-29 00:18:28', '2025-08-29 18:45:33', '202000328'),
(2, 'DESKTOP-TORLD5D', b'0', '2025-08-29 18:10:38', '2025-08-29 18:45:33', '202000328'),
(3, 'DESKTOP-TORLD5D', b'1', '2025-08-29 19:28:33', NULL, '202000328'),
(4, 'DESKTOP-TORLD5D', b'1', '2025-08-30 10:34:09', NULL, '202000328');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) NOT NULL,
  `device` varchar(16) NOT NULL,
  `specify` longtext NOT NULL,
  `hostname` varchar(255) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `device`, `specify`, `hostname`, `timestamp`, `username`) VALUES
(20, 'CPU', 'sira ang cpu   	', 'DESKTOP-TORLD5D', '2025-08-29 20:24:47', '202000328');

-- --------------------------------------------------------

--
-- Table structure for table `studcred`
--

CREATE TABLE `studcred` (
  `name` varchar(128) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `studcred`
--

INSERT INTO `studcred` (`name`, `username`, `password`) VALUES
('Joaquin Angelo Lorenzo', '202000328', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logged_in_users`
--
ALTER TABLE `logged_in_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logged_in_users`
--
ALTER TABLE `logged_in_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
