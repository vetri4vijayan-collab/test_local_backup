-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2026 at 03:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egc`
--

-- --------------------------------------------------------

--
-- Table structure for table `egc_electricity_meters`
--

CREATE TABLE `egc_electricity_meters` (
  `sno` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `meter_no` varchar(100) NOT NULL,
  `meter_name` varchar(200) NOT NULL,
  `meter_type_id` int(11) DEFAULT NULL,
  `meter_make` varchar(100) DEFAULT NULL,
  `meter_model` varchar(100) DEFAULT NULL,
  `serial_no` varchar(100) DEFAULT NULL,
  `phase_type_id` int(11) DEFAULT NULL,
  `multiplier_factor` decimal(10,2) DEFAULT 1.00,
  `initial_reading` decimal(15,2) DEFAULT 0.00,
  `current_reading` decimal(15,2) DEFAULT 0.00,
  `reading_unit` enum('KWH','MWH') DEFAULT 'KWH',
  `installation_date` date DEFAULT NULL,
  `warranty_expiry` date DEFAULT NULL,
  `meter_location` varchar(255) DEFAULT NULL,
  `max_load` decimal(10,2) DEFAULT 0.00,
  `load_unit` enum('KW','KVA') DEFAULT 'KW',
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0-Active,1-Inactive,2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_electricity_meters`
--

INSERT INTO `egc_electricity_meters` (`sno`, `account_id`, `meter_no`, `meter_name`, `meter_type_id`, `meter_make`, `meter_model`, `serial_no`, `phase_type_id`, `multiplier_factor`, `initial_reading`, `current_reading`, `reading_unit`, `installation_date`, `warranty_expiry`, `meter_location`, `max_load`, `load_unit`, `remarks`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 1, 'MTR000001', 'Main Incoming Meter', 1, 'Schneider', 'PM5300', 'SCH2300101', 2, 1.00, 1000.00, 12856.00, 'KWH', '2024-01-01', '2029-01-01', 'Electrical Room', 65.00, 'KW', 'Corporate Main Supply', '2026-08-11 09:23:06', 1, '2026-08-11 09:23:06', 1, 0),
(2, 1, 'MTR000002', 'Lift Meter', 5, 'L&T', 'LT450', 'LT2300201', 2, 1.00, 500.00, 6840.00, 'KWH', '2024-01-01', '2029-01-01', 'Lift Control Room', 20.00, 'KW', NULL, '2026-08-11 09:23:06', 1, '2026-08-11 09:23:06', 1, 0),
(3, 1, 'MTR000003', 'Common Area', 7, 'ABB', 'ABB800', 'ABB88001', 2, 1.00, 200.00, 4520.00, 'KWH', '2024-01-01', '2029-01-01', 'Ground Floor Panel', 30.00, 'KW', NULL, '2026-08-11 09:23:06', 1, '2026-08-11 09:23:06', 1, 0),
(4, 2, 'MTR000004', 'Training Center Main', 1, 'Schneider', 'PM5300', 'SCH340011', 2, 1.00, 850.00, 9560.00, 'KWH', '2024-03-01', '2029-03-01', 'Training Building', 40.00, 'KW', NULL, '2026-08-11 09:23:06', 1, '2026-08-11 09:23:06', 1, 0),
(5, 3, 'MTR000005', 'Solar Export Meter', 4, 'Secure', 'Elite440', 'SEC123455', 2, 1.00, 0.00, 3625.00, 'KWH', '2025-02-01', '2030-02-01', 'Solar Control Panel', 80.00, 'KW', 'Solar Generation Meter', '2026-08-11 09:23:06', 1, '2026-08-11 09:23:06', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_electricity_meters`
--
ALTER TABLE `egc_electricity_meters`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `meter_no` (`meter_no`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `meter_type` (`meter_type_id`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_electricity_meters`
--
ALTER TABLE `egc_electricity_meters`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
