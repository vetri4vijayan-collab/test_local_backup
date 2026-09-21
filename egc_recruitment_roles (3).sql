-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2026 at 02:59 PM
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
-- Table structure for table `egc_recruitment_roles`
--

CREATE TABLE `egc_recruitment_roles` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `role_code` varchar(80) NOT NULL,
  `role_name` varchar(150) NOT NULL,
  `normalized_role_name` varchar(150) GENERATED ALWAYS AS (lcase(trim(`role_name`))) STORED,
  `role_family` varchar(100) DEFAULT NULL,
  `seniority_level` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=Entry, 2=Senior, 3=Team Lead, 4=Manager, 5=Head',
  `description` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=Active, 1=Inactive, 2=Deleted',
  `match_enabled` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=Use for ATS matching, 0=Exclude from matching'
) ;

--
-- Dumping data for table `egc_recruitment_roles`
--

INSERT INTO `egc_recruitment_roles` (`sno`, `role_code`, `role_name`, `role_family`, `seniority_level`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`, `match_enabled`) VALUES
(1, 'SALES_EXECUTIVE', 'Sales Executive', 'Sales', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(2, 'SALES_TEAM_LEAD', 'Sales Team Lead', 'Sales', 3, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(3, 'SALES_MANAGER', 'Sales Manager', 'Sales', 4, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(4, 'BUSINESS_DEVELOPMENT_EXECUTIVE', 'Business Development Executive', 'Business Development', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(5, 'BUSINESS_DEVELOPMENT_TEAM_LEAD', 'Business Development Team Lead', 'Business Development', 3, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(6, 'BUSINESS_DEVELOPMENT_MANAGER', 'Business Development Manager', 'Business Development', 4, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(7, 'MARKETING_EXECUTIVE', 'Marketing Executive', 'Marketing', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(8, 'MARKETING_EXECUTIVE_TEAM_LEAD', 'Marketing Executive Team Lead', 'Marketing', 3, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(9, 'MARKETING_EXECUTIVE_MANAGER', 'Marketing Executive Manager', 'Marketing', 4, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(10, 'PRODUCTION_EXECUTIVE', 'Production Executive', 'Production', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(11, 'PRODUCTION_TEAM_LEAD', 'Production Team Lead', 'Production', 3, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(12, 'PRODUCTION_MANAGER', 'Production Manager', 'Production', 4, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(13, 'PROCESS_EXECUTIVE', 'Process Executive', 'Process Operations', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(14, 'PROCESS_TEAM_LEAD', 'Process Team Lead', 'Process Operations', 3, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(15, 'PROCESS_MANAGER', 'Process Manager', 'Process Operations', 4, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(16, 'PROCESS_COORDINATOR', 'Process Coordinator', 'Process Operations', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(17, 'CUSTOMER_RELATIONSHIP_EXECUTIVE', 'Customer Relationship Executive', 'Customer Relationship', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(18, 'CUSTOMER_RELATIONSHIP_TEAM_LEAD', 'Customer Relationship Team Lead', 'Customer Relationship', 3, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(19, 'CUSTOMER_RELATIONSHIP_MANAGER', 'Customer Relationship Manager', 'Customer Relationship', 4, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(20, 'FRONT_END_DEVELOPER', 'Front End Developer', 'Software Engineering', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(21, 'BACK_END_DEVELOPER', 'Back End Developer', 'Software Engineering', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(22, 'FULL_STACK_DEVELOPER', 'Full Stack Developer', 'Software Engineering', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(23, 'UI_UX_DESIGNER', 'UI/UX Designer', 'UI/UX & Design', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(24, 'WEB_DESIGNER', 'Web Designer', 'UI/UX & Design', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(25, 'WEBSITE_DEVELOPER', 'Website Developer', 'Software Engineering', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(26, 'SENIOR_FRONT_END_DEVELOPER', 'Senior Front End Developer', 'Software Engineering', 2, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(27, 'SENIOR_BACK_END_DEVELOPER', 'Senior Back End Developer', 'Software Engineering', 2, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(28, 'SENIOR_FULL_STACK_DEVELOPER', 'Senior Full Stack Developer', 'Software Engineering', 2, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(29, 'SENIOR_UI_UX_DESIGNER', 'Senior UI/UX Designer', 'UI/UX & Design', 2, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(30, 'SENIOR_WEB_DESIGNER', 'Senior Web Designer', 'UI/UX & Design', 2, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(31, 'SENIOR_WEBSITE_DEVELOPER', 'Senior Website Developer', 'Software Engineering', 2, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(32, 'PROJECT_TEAM_LEAD', 'Project Team Lead', 'Project Management', 3, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(33, 'PROJECT_MANAGER', 'Project Manager', 'Project Management', 4, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(34, 'SOFTWARE_TESTER', 'Software Tester', 'Quality Assurance', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(35, 'DEVOPS_ENGINEER', 'DevOps Engineer', 'DevOps & Infrastructure', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(36, 'NETWORK_ENGINEER', 'Network Engineer', 'DevOps & Infrastructure', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(37, 'DIGITAL_MARKETING_EXECUTIVE', 'Digital Marketing Executive', 'Digital Marketing', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(38, 'DIGITAL_MARKETING_TEAM_LEAD', 'Digital Marketing Team Lead', 'Digital Marketing', 3, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(39, 'DIGITAL_MARKETING_MANAGER', 'Digital Marketing Manager', 'Digital Marketing', 4, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(40, 'SOFTWARE_TRAINER', 'Software Trainer', 'Training', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(41, 'NETWORKING_TRAINER', 'Networking Trainer', 'Training', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(42, 'DIGITAL_MARKETING_TRAINER', 'Digital Marketing Trainer', 'Training', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(43, 'EMBEDDED_TRAINER', 'Embedded Trainer', 'Training', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(44, 'EMBEDDED_DEVELOPER', 'Embedded Developer', 'Embedded Systems', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(45, 'PLACEMENT_EXECUTIVE', 'Placement Executive', 'Placement', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(46, 'PLACEMENT_TEAM_LEAD', 'Placement Team Lead', 'Placement', 3, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(47, 'PLACEMENT_MANAGER', 'Placement Manager', 'Placement', 4, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(48, 'HR_EXECUTIVE', 'HR Executive', 'Human Resources', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(49, 'HR_MANAGER', 'HR Manager', 'Human Resources', 4, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(50, 'RECRUITMENT_EXECUTIVE', 'Recruitment Executive', 'Recruitment', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(51, 'RECRUITMENT_MANAGER', 'Recruitment Manager', 'Recruitment', 4, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(52, 'ACCOUNT_EXECUTIVE', 'Account Executive', 'Finance & Accounts', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(53, 'ACCOUNT_MANAGER', 'Account Manager', 'Finance & Accounts', 4, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(54, 'RECEPTIONIST', 'Receptionist', 'Front Office', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(55, 'ACADEMY_COUNSELOR', 'Academy Counselor', 'Academic Counseling', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(56, 'SENIOR_ACADEMY_COUNSELOR', 'Senior Academy Counselor', 'Academic Counseling', 2, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(57, 'BRANCH_HEAD', 'Branch Head', 'Center Operations Management', 5, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(58, 'CENTER_HEAD', 'Center Head', 'Center Operations Management', 5, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(59, 'BUSINESS_ANALYST', 'Business Analyst', 'Business Analysis', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(60, 'SENIOR_BUSINESS_ANALYST', 'Senior Business Analyst', 'Business Analysis', 2, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(61, 'MOBILE_APP_DEVELOPER', 'Mobile App Developer', 'Mobile Development', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(62, 'SENIOR_MOBILE_APP_DEVELOPER', 'Senior Mobile App Developer', 'Mobile Development', 2, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(63, 'CONTENT_WRITER', 'Content Writer', 'Content', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(64, 'SENIOR_CONTENT_WRITER', 'Senior Content Writer', 'Content', 2, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(65, 'ADMIN_EXECUTIVE', 'Admin Executive', 'Administration', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(66, 'ADMIN_MANAGER', 'Admin Manager', 'Administration', 4, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(67, 'DRIVER', 'Driver', 'Transportation', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1),
(68, 'FIELD_EXECUTIVE', 'Field Executive', 'Field Operations', 1, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_recruitment_roles`
--
ALTER TABLE `egc_recruitment_roles`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uq_egc_roles_role_code` (`role_code`),
  ADD UNIQUE KEY `uq_egc_roles_role_name` (`role_name`),
  ADD KEY `idx_egc_roles_normalized_name` (`normalized_role_name`),
  ADD KEY `idx_egc_roles_family_level` (`role_family`,`seniority_level`),
  ADD KEY `idx_egc_roles_matching` (`status`,`match_enabled`,`seniority_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_recruitment_roles`
--
ALTER TABLE `egc_recruitment_roles`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
