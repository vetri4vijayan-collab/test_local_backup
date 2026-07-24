-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2026 at 01:10 PM
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
-- Database: `egc_may`
--

-- --------------------------------------------------------

--
-- Table structure for table `egc_support_ticket_messages`
--

CREATE TABLE `egc_support_ticket_messages` (
  `sno` bigint(20) NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `message_type` enum('Staff','Support','System') DEFAULT 'Staff',
  `message` longtext DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_support_ticket_messages`
--

INSERT INTO `egc_support_ticket_messages` (`sno`, `ticket_id`, `message_type`, `message`, `attachment`, `created_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, 'Staff', 'I wnat Leave For Tommorrow description', 'support_ticket/Vk22lHwd2PxrvVYpAs8FIkpwhpIY9HHARTpXSipW.png', 0, '2026-07-24 16:37:59', '2026-07-24 16:37:59', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_support_ticket_messages`
--
ALTER TABLE `egc_support_ticket_messages`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_support_ticket_messages`
--
ALTER TABLE `egc_support_ticket_messages`
  MODIFY `sno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `egc_support_ticket_messages`
--
ALTER TABLE `egc_support_ticket_messages`
  ADD CONSTRAINT `fk_message_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `egc_support_ticket` (`sno`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
