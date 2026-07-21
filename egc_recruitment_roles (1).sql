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
-- Table structure for table `egc_recruitment_roles`
--

CREATE TABLE `egc_recruitment_roles` (
  `sno` int(11) NOT NULL,
  `jobrole_name` tinytext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `egc_recruitment_roles`
--

INSERT INTO `egc_recruitment_roles` (`sno`, `jobrole_name`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Business Development Executive', 0, 1, '2024-07-20 06:58:33', 0, '2026-06-18 16:10:46'),
(2, 'Senior Business Development  Executive', 0, 1, '2024-07-20 06:58:39', 0, '2026-06-18 16:10:46'),
(3, 'Tele caller', 0, 1, '2024-07-20 06:58:45', 0, '2026-06-18 16:10:46'),
(4, 'Marketing Executive', 0, 1, '2024-07-20 06:58:51', 0, '2026-06-18 16:10:46'),
(5, 'Marketing Manager', 0, 1, '2024-07-20 06:58:57', 0, '2026-06-18 16:10:46'),
(6, 'Business Development Manager', 0, 1, '2024-07-20 06:59:04', 0, '2026-06-18 16:10:46'),
(7, 'HR Senior Executive', 0, 1, '2024-07-20 06:59:10', 0, '2026-06-18 16:10:46'),
(8, 'HR Executive', 0, 1, '2024-07-20 06:59:18', 0, '2026-06-18 16:10:46'),
(9, 'HR Manager', 0, 1, '2024-07-20 06:59:32', 0, '2026-06-18 16:10:46'),
(10, 'HR Recruiter', 0, 1, '2024-07-20 06:59:40', 0, '2026-06-18 16:10:46'),
(11, 'Accounts Executive', 0, 1, '2024-07-20 06:59:46', 0, '2026-06-18 16:10:46'),
(12, 'Account Senior Executive', 0, 1, '2024-07-20 06:59:53', 0, '2026-06-18 16:10:46'),
(13, 'Account Manager', 0, 1, '2024-07-20 07:00:01', 0, '2026-06-18 16:10:46'),
(14, 'IT Executive', 0, 1, '2024-07-20 07:00:07', 0, '2026-06-18 16:10:46'),
(15, 'IT Senior Executive', 0, 1, '2024-07-20 07:00:15', 0, '2026-06-18 16:10:46'),
(16, 'Admin Executive', 0, 1, '2024-07-20 07:00:24', 0, '2026-06-18 16:10:46'),
(17, 'Java Developer', 0, 1, '2024-07-20 07:00:29', 0, '2026-06-18 16:10:46'),
(18, 'Senior Java Developer', 0, 1, '2024-07-20 07:00:35', 0, '2026-06-18 16:10:46'),
(19, 'MATLAB Developer', 0, 1, '2024-07-20 07:00:42', 0, '2026-06-18 16:10:46'),
(20, 'Senior MATLAB Developer', 0, 1, '2024-07-20 07:00:48', 0, '2026-06-18 16:10:46'),
(21, 'Python Developer', 0, 1, '2024-07-20 07:00:54', 0, '2026-06-18 16:10:46'),
(22, 'Senior Python Developer', 0, 1, '2024-07-20 07:01:00', 0, '2026-06-18 16:10:46'),
(23, '.Net Developer', 0, 1, '2024-07-20 07:01:07', 0, '2026-06-18 16:10:46'),
(24, 'Senior .Net Developer', 0, 1, '2024-07-20 07:01:13', 0, '2026-06-18 16:10:46'),
(25, 'PHP Developer', 0, 1, '2024-07-20 07:01:19', 0, '2026-06-18 16:10:46'),
(26, 'Senior PHP Developer', 0, 1, '2024-07-20 07:01:25', 0, '2026-06-18 16:10:46'),
(27, 'Reactjs Developer', 0, 1, '2024-07-20 07:01:48', 0, '2026-06-18 16:10:46'),
(28, 'Senior Reactjs Developer', 0, 1, '2024-07-20 07:01:54', 0, '2026-06-18 16:10:46'),
(29, 'Android Developer', 0, 1, '2024-07-20 07:01:59', 0, '2026-06-18 16:10:46'),
(30, 'Senior Android Developer', 0, 1, '2024-07-20 07:02:04', 0, '2026-06-18 16:10:46'),
(31, 'Flutter Developer', 0, 1, '2024-07-20 07:02:11', 0, '2026-06-18 16:10:46'),
(32, 'Senior Flutter Developer', 0, 1, '2024-07-20 07:02:16', 0, '2026-06-18 16:10:46'),
(33, 'Customer Care Executive', 0, 1, '2024-07-20 07:02:22', 0, '2026-06-18 16:10:46'),
(34, 'Process Coordinator', 0, 1, '2024-07-20 07:02:28', 0, '2026-06-18 16:10:46'),
(35, 'Content Writer', 0, 1, '2024-07-20 07:02:33', 0, '2026-06-18 16:10:46'),
(36, 'Senior Content Writer', 0, 1, '2024-07-20 07:02:40', 0, '2026-06-18 16:10:46'),
(37, 'Journal Coordinator', 0, 1, '2024-07-20 07:02:46', 0, '2026-06-18 16:10:46'),
(38, 'Coordinator', 0, 1, '2024-07-20 07:02:54', 0, '2026-06-18 16:10:46'),
(39, 'SEO Executive', 0, 1, '2024-07-20 07:03:01', 0, '2026-06-18 16:10:46'),
(40, 'Senior SEO Executive', 0, 1, '2024-07-20 07:03:08', 0, '2026-06-18 16:10:46'),
(41, 'Project Manager', 0, 1, '2024-07-20 07:03:13', 0, '2026-06-18 16:10:46'),
(42, 'Software Tester', 0, 1, '2024-07-20 07:03:18', 0, '2026-06-18 16:10:46'),
(43, 'Senior Software Tester', 0, 1, '2024-07-20 07:03:24', 0, '2026-06-18 16:10:46'),
(44, 'Software Faculty', 0, 1, '2024-07-20 07:03:30', 0, '2026-06-18 16:10:46'),
(45, 'Senior Software Faculty', 0, 1, '2024-07-20 07:03:35', 0, '2026-06-18 16:10:46'),
(46, 'Networking Faculty', 0, 1, '2024-07-20 07:03:40', 0, '2026-06-18 16:10:46'),
(47, 'Senior Networking Faculty', 0, 1, '2024-07-20 07:03:45', 0, '2026-06-18 16:10:46'),
(48, 'Embedded Engineer', 0, 1, '2024-07-20 07:03:51', 0, '2026-06-18 16:10:46'),
(49, 'Senior Embedded Engineer', 0, 1, '2024-07-20 07:03:56', 0, '2026-06-18 16:10:46'),
(50, 'Embedded Faculty', 0, 1, '2024-07-20 07:04:01', 0, '2026-06-18 16:10:46'),
(51, 'Senior Embedded Faculty', 0, 1, '2024-07-20 07:04:06', 0, '2026-06-18 16:10:46'),
(52, 'Freelancer Faculty', 0, 1, '2024-07-20 07:04:13', 0, '2026-06-18 16:10:46'),
(53, 'Freelancer Developer', 0, 1, '2024-07-20 07:04:18', 0, '2026-06-18 16:10:46'),
(54, 'UI Designer', 0, 1, '2024-07-20 07:04:24', 0, '2026-06-18 16:10:46'),
(55, 'Senior UI Designer', 0, 1, '2024-07-20 07:04:30', 0, '2026-06-18 16:10:46'),
(56, 'Graphic Designer', 0, 1, '2024-07-20 07:04:40', 0, '2026-06-18 16:10:46'),
(57, 'Senior Graphic Designer', 0, 1, '2024-07-20 07:04:48', 0, '2026-06-18 16:10:46'),
(58, 'WordPress Developer', 0, 1, '2024-07-20 07:04:52', 0, '2026-06-18 16:10:46'),
(59, 'Management Support', 0, 1, '2024-07-20 07:04:57', 0, '2026-06-18 16:10:46'),
(60, 'Driver', 0, 1, '2024-07-20 07:05:01', 0, '2026-06-18 16:10:46'),
(61, 'Electrician', 0, 1, '2024-07-20 07:05:07', 0, '2026-06-18 16:10:46'),
(62, 'Others', 0, 1, '2024-07-20 07:05:11', 0, '2026-06-18 16:10:46'),
(63, 'Front Office Executive', 0, 3, '2024-07-30 08:34:21', 0, '2026-06-18 16:10:46'),
(64, 'Software Developer', 0, 1, '2024-08-01 06:00:03', 0, '2026-06-18 16:10:46'),
(65, 'Full Stack Developer', 0, 3, '2024-08-08 10:49:06', 0, '2026-06-18 16:10:46'),
(66, 'Business Analyst ', 0, 3, '2024-08-13 11:01:00', 0, '2026-06-18 16:10:46'),
(67, 'DEVOPS Engineer', 0, 3, '2024-08-14 05:09:31', 0, '2026-06-18 16:10:46'),
(68, 'Mobile App & IOS Developer', 0, 3, '2024-12-09 05:01:14', 0, '2026-06-18 16:10:46'),
(69, 'Data Analyst', 0, 3, '2025-01-08 20:53:13', 0, '2026-06-18 16:10:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_recruitment_roles`
--
ALTER TABLE `egc_recruitment_roles`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_recruitment_roles`
--
ALTER TABLE `egc_recruitment_roles`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
