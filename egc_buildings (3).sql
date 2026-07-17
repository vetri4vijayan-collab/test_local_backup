-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2026 at 03:40 PM
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
-- Table structure for table `egc_buildings`
--

CREATE TABLE `egc_buildings` (
  `sno` int(11) NOT NULL,
  `building_code` varchar(50) DEFAULT NULL,
  `building_name` varchar(200) NOT NULL,
  `location_id` int(11) NOT NULL,
  `lessor_id` int(11) DEFAULT NULL,
  `ownership_type` tinyint(1) NOT NULL COMMENT '1-Owned,2-Rented',
  `door_no` text DEFAULT NULL,
  `street` text DEFAULT NULL,
  `landmark` text DEFAULT NULL,
  `google_map_link` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `total_floors` int(11) DEFAULT 0,
  `builtup_area` decimal(12,2) DEFAULT NULL,
  `builtup_area_unit` varchar(20) DEFAULT 'Sq.Ft',
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 Active,1 Inactive,2 Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_buildings`
--

INSERT INTO `egc_buildings` (`sno`, `building_code`, `building_name`, `location_id`, `lessor_id`, `ownership_type`, `door_no`, `street`, `landmark`, `google_map_link`, `address`, `total_floors`, `builtup_area`, `builtup_area_unit`, `latitude`, `longitude`, `remarks`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'BLD-LOC-IN-TN-MAI-0001-0001', 'fgfddf', 1, NULL, 1, '21213', 'ffscddfs dgdbhg', 'nhbgggh', NULL, '21213, ffscddfs dgdbhg, nhbgggh', 4, 3444.00, 'Sq.Ft', NULL, NULL, NULL, '2026-07-17 07:42:22', 0, '2026-07-17 07:42:22', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_buildings`
--
ALTER TABLE `egc_buildings`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_buildings`
--
ALTER TABLE `egc_buildings`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
