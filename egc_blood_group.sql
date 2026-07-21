-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2026 at 03:03 PM
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
-- Table structure for table `egc_blood_group`
--

CREATE TABLE `egc_blood_group` (
  `sno` bigint(20) NOT NULL,
  `blood_group` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `status` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_blood_group`
--

INSERT INTO `egc_blood_group` (`sno`, `blood_group`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 'B+', NULL, '2026-07-21 12:33:45', '2026-07-21 12:33:45', 0, 0, 0),
(2, 'B-', NULL, '2026-07-21 12:33:45', '2026-07-21 12:33:45', 0, 0, 0),
(3, 'A+', NULL, '2026-07-21 12:33:45', '2026-07-21 12:33:45', 0, 0, 0),
(4, 'O+', NULL, '2026-07-21 12:33:45', '2026-07-21 12:33:45', 0, 0, 0),
(5, 'O-', NULL, '2026-07-21 12:33:45', '2026-07-21 12:33:45', 0, 0, 0),
(6, 'A-', NULL, '2026-07-21 12:33:45', '2026-07-21 12:33:45', 0, 0, 0),
(7, 'AB+', NULL, '2026-07-21 12:33:45', '2026-07-21 12:33:45', 0, 0, 0),
(8, 'AB-', NULL, '2026-07-21 12:33:45', '2026-07-21 12:33:45', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_blood_group`
--
ALTER TABLE `egc_blood_group`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_blood_group`
--
ALTER TABLE `egc_blood_group`
  MODIFY `sno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
