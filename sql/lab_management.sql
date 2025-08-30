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
-- Database: `lab_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `computers`
--

CREATE TABLE `computers` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `laboratory_id` int(6) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lab_id` int(6) UNSIGNED NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `serial` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `serial_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `computers`
--

INSERT INTO `computers` (`id`, `name`, `laboratory_id`, `status`, `created_at`, `updated_at`, `lab_id`, `label`, `model`, `serial`, `description`, `logo`, `image`, `serial_number`) VALUES
(131, '', 93, 'available', '2025-08-30 07:24:15', '2025-08-30 07:24:15', 0, 'PC#1', NULL, NULL, 'computer no1 at CSS Lab', '68b2a71fbddfa.jpg', NULL, 'DESKTOP-TORLD5D');

--
-- Triggers `computers`
--
DELIMITER $$
CREATE TRIGGER `insert_default_lab_id` BEFORE INSERT ON `computers` FOR EACH ROW BEGIN
    IF NEW.laboratory_id IS NULL THEN
        SET NEW.laboratory_id = (SELECT id FROM laboratories LIMIT 1);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `laboratories`
--

CREATE TABLE `laboratories` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `db_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laboratories`
--

INSERT INTO `laboratories` (`id`, `name`, `location`, `description`, `logo`, `created_at`, `updated_at`, `db_name`) VALUES
(93, 'CSS Computer Laboratory', '2nd Floor Building', 'comlab', 'Students-using-computers.jpg', '2025-08-30 07:22:23', '2025-08-30 07:22:23', 'laboratory_css_computer_laboratory');

-- --------------------------------------------------------

--
-- Table structure for table `peripherals`
--

CREATE TABLE `peripherals` (
  `id` int(11) UNSIGNED NOT NULL,
  `computer_id` int(11) UNSIGNED NOT NULL,
  `peripheral_type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peripherals`
--

INSERT INTO `peripherals` (`id`, `computer_id`, `peripheral_type`, `brand`, `model`, `serial_number`, `logo`, `created_at`, `updated_at`) VALUES
(116, 131, 'MOUSE', 'Logitech', 'Logitech G304 Lightspeed ', 'INZ1234323', NULL, '2025-08-30 07:26:41', '2025-08-30 07:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `peripheral_reports`
--

CREATE TABLE `peripheral_reports` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `peripheral_type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `specify` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `action` varchar(255) NOT NULL,
  `disabled` tinyint(1) DEFAULT NULL,
  `user_action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peripheral_reports`
--

INSERT INTO `peripheral_reports` (`id`, `location`, `peripheral_type`, `brand`, `model`, `serial_number`, `specify`, `user`, `date`, `action`, `disabled`, `user_action`) VALUES
(128, 'CSS Computer Laboratory/PC#1', 'MOUSE', 'Logitech', 'Logitech G304 Lightspeed ', 'INZ1234323', 'Left Click broken', '202000328', '2025-08-30 15:10:20', 'Repaired', NULL, 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `technician_id` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`, `technician_id`, `status`) VALUES
(10, 'techdavid', '$2y$10$fjy199Qd.iIzLOuQkn6EfuMVjJHXk3aooaIKrFTJdGiOl3O5CDHsW', 'David Chu', 'user', '2020-1818', 'offline'),
(12, 'admin1', '$2y$10$jIINY6aM5se7G4R0VH8Ti.WENP2a8zcekUtZBUqnUGh8.PjefvkKC', 'admin', 'admin', '12345', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_type` varchar(50) NOT NULL,
  `activity_details` varchar(255) NOT NULL,
  `activity_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `user_id`, `activity_type`, `activity_details`, `activity_time`) VALUES
(60, 10, 'create_computer', 'User techdavid created a computer with label PC no# 1', '2023-05-05 04:12:59'),
(61, 10, 'add_peripheral', 'User techdavid added a Mouse peripheral to computer with id 126', '2023-05-05 04:13:08'),
(62, 4, 'delete_peripheral', 'User admin deleted a peripheral with ID 94 from computer with ID 103', '2023-05-05 15:54:01'),
(63, 12, 'delete_computer', 'User admin1 deleted a computer with id 103', '2025-08-28 14:25:51'),
(64, 12, 'add_peripheral', 'User admin1 added a Mouse peripheral to computer with id 125', '2025-08-29 10:42:38'),
(65, 12, 'create_computer', 'User admin1 created a computer with label PC#1', '2025-08-29 10:44:31'),
(66, 12, 'add_peripheral', 'User admin1 added a Mouse peripheral to computer with id 127', '2025-08-29 11:28:10'),
(67, 12, 'create_computer', 'User admin1 created a computer with label PC#2', '2025-08-30 01:48:56'),
(68, 12, 'delete_computer', 'User admin1 deleted a computer with id 125', '2025-08-30 02:29:30'),
(69, 12, 'delete_computer', 'User admin1 deleted a computer with id 128', '2025-08-30 02:31:41'),
(70, 12, 'delete_peripheral', 'User admin1 deleted a peripheral with ID 114 from computer with ID 127', '2025-08-30 02:34:39'),
(71, 12, 'add_peripheral', 'User admin1 added a MOUSE peripheral to computer with id 127', '2025-08-30 02:34:47'),
(72, 12, 'delete_lab', 'User admin1 deleted laboratory with ID 84', '2025-08-30 06:08:38'),
(73, 12, 'delete_lab', 'User admin1 deleted laboratory with ID 87', '2025-08-30 06:12:23'),
(74, 12, 'delete_lab', 'User admin1 deleted laboratory with ID 86', '2025-08-30 06:12:35'),
(75, 12, 'delete_lab', 'User admin1 deleted laboratory with ID 85', '2025-08-30 06:12:38'),
(76, 12, 'delete_lab', 'User admin1 deleted laboratory with ID 83', '2025-08-30 06:12:50'),
(77, 12, 'create_laboratory', 'User admin1 created a laboratory with ID 91', '2025-08-30 06:24:10'),
(78, 12, 'create_laboratory', 'User admin1 created a laboratory with ID 92', '2025-08-30 06:27:28'),
(79, 12, 'create_computer', 'User admin1 created a computer with label dasd', '2025-08-30 06:28:31'),
(80, 12, 'create_computer', 'User admin1 created a computer with label dasd', '2025-08-30 06:44:27'),
(81, 12, 'delete_computer', 'User admin1 deleted computer ID 129 in lab 65', '2025-08-30 06:47:30'),
(82, 12, 'delete_lab', 'Admin admin1 deleted laboratory with ID 82', '2025-08-30 06:56:22'),
(83, 12, 'delete_lab', 'Admin admin1 deleted laboratory with ID 88', '2025-08-30 06:56:30'),
(84, 12, 'delete_lab', 'Admin admin1 deleted laboratory with ID 92', '2025-08-30 07:08:06'),
(85, 12, 'delete_lab', 'Admin admin1 deleted laboratory with ID 65', '2025-08-30 07:19:57'),
(86, 12, 'delete_lab', 'Admin admin1 deleted laboratory with ID 89', '2025-08-30 07:20:00'),
(87, 12, 'delete_lab', 'Admin admin1 deleted laboratory with ID 90', '2025-08-30 07:20:03'),
(88, 12, 'create_computer', 'User admin1 created a computer with label PC#1', '2025-08-30 07:24:15'),
(89, 12, 'add_peripheral', 'User admin1 added a MOUSE peripheral to computer with id 131', '2025-08-30 07:26:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computers`
--
ALTER TABLE `computers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `computers_fk_lab_id` (`laboratory_id`);

--
-- Indexes for table `laboratories`
--
ALTER TABLE `laboratories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peripherals`
--
ALTER TABLE `peripherals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `computer_id` (`computer_id`);

--
-- Indexes for table `peripheral_reports`
--
ALTER TABLE `peripheral_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `computers`
--
ALTER TABLE `computers`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `laboratories`
--
ALTER TABLE `laboratories`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `peripherals`
--
ALTER TABLE `peripherals`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `peripheral_reports`
--
ALTER TABLE `peripheral_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `computers`
--
ALTER TABLE `computers`
  ADD CONSTRAINT `computers_fk_lab_id` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `computers_ibfk_1` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peripherals`
--
ALTER TABLE `peripherals`
  ADD CONSTRAINT `peripherals_ibfk_1` FOREIGN KEY (`computer_id`) REFERENCES `computers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
