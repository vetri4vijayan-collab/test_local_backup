-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2026 at 02:16 PM
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
-- Table structure for table `egc_recruitment_ai_runs`
--

CREATE TABLE `egc_recruitment_ai_runs` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `run_uuid` char(36) NOT NULL,
  `active_lock_key` varchar(40) DEFAULT NULL,
  `requested_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'running',
  `mode` varchar(40) NOT NULL DEFAULT 'pending_only',
  `target_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `claimed_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `processed_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `matched_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `unmatched_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `failed_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `batch_size` tinyint(3) UNSIGNED NOT NULL DEFAULT 2,
  `worker_count` tinyint(3) UNSIGNED NOT NULL DEFAULT 3,
  `active_workers` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `cursor_sno` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `force_reprocess` tinyint(1) NOT NULL DEFAULT 0,
  `started_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `last_heartbeat_at` timestamp NULL DEFAULT NULL,
  `last_error` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `egc_recruitment_ai_runs`
--

INSERT INTO `egc_recruitment_ai_runs` (`sno`, `run_uuid`, `active_lock_key`, `requested_by`, `status`, `mode`, `target_count`, `claimed_count`, `processed_count`, `matched_count`, `unmatched_count`, `failed_count`, `batch_size`, `worker_count`, `active_workers`, `cursor_sno`, `force_reprocess`, `started_at`, `completed_at`, `last_heartbeat_at`, `last_error`, `created_at`, `updated_at`) VALUES
(1, '3ced0cd3-b561-46cc-8a3d-dabb7aaaa439', NULL, 0, 'cancelled', 'pending_only', 100, 0, 0, 0, 0, 0, 2, 3, 3, 0, 0, '2026-09-22 04:11:24', '2026-09-22 04:11:24', '2026-09-22 04:11:24', NULL, '2026-09-22 04:11:24', '2026-09-22 04:11:24'),
(2, 'bbc8f88a-1eb0-4332-bf9c-da34c0a9a43a', NULL, 0, 'cancelled', 'pending_only', 100, 0, 0, 0, 0, 0, 2, 3, 3, 0, 0, '2026-09-22 04:13:20', '2026-09-22 04:14:40', '2026-09-22 04:14:40', NULL, '2026-09-22 04:13:20', '2026-09-22 04:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `egc_recruitment_ai_run_items`
--

CREATE TABLE `egc_recruitment_ai_run_items` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `run_sno` bigint(20) UNSIGNED NOT NULL,
  `applicant_sno` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'processing',
  `match_count` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `best_match_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `error_message` text DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `finished_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `egc_recruitment_major_aliases`
--

CREATE TABLE `egc_recruitment_major_aliases` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `major_sno` int(11) NOT NULL,
  `qualification_id` int(11) NOT NULL DEFAULT 0,
  `alias_name` varchar(250) NOT NULL,
  `alias_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=Synonym,1=Abbreviation,2=Full degree wording,3=Legacy/Misspelling',
  `match_enabled` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=Active,1=Inactive,2=Deleted',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `egc_recruitment_major_aliases`
--

INSERT INTO `egc_recruitment_major_aliases` (`sno`, `major_sno`, `qualification_id`, `alias_name`, `alias_type`, `match_enabled`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'B.Com Computer Applications', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(2, 3, 2, 'Master of Computer Applications', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(3, 3, 2, 'MCA', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(4, 4, 2, 'Master of Science', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(5, 5, 1, 'Bachelor of Science', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(6, 5, 1, 'BSc', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(7, 6, 1, 'Bachelor of Computer Applications', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(8, 7, 2, 'Master of Commerce', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(9, 9, 1, 'Bachelor of Technology', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(10, 10, 2, 'Master of Business Administration', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(11, 11, 1, 'Bachelor of Commerce', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(12, 12, 1, 'Bachelor of Arts', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(13, 13, 1, 'Bachelor of Business Administration', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(14, 15, 3, 'Doctor of Philosophy', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(15, 21, 2, 'Master of Technology', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(16, 26, 2, 'MSc IT', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(17, 26, 2, 'M.Sc IT', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(18, 26, 2, 'Master of Science in Information Technology', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(19, 27, 2, 'MSc CS', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(20, 27, 2, 'M.Sc CS', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(21, 27, 2, 'Master of Science in Computer Science', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(22, 33, 2, 'M.Com Computer Applications', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(23, 40, 1, 'BSc Computer Science', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(24, 40, 1, 'B.Sc CS', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(25, 40, 1, 'BSc CS', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(26, 40, 1, 'Bachelor of Science in Computer Science', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(27, 40, 1, 'Bachelor of Science Computer Science', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(28, 41, 1, 'BSc IT', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(29, 41, 1, 'B.Sc IT', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(30, 41, 1, 'Bachelor of Science in Information Technology', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(31, 56, 2, 'ME Software Engineering', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(32, 56, 2, 'M.E Software Engineering', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(33, 57, 2, 'MTech IT', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(34, 57, 2, 'M.Tech IT', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(35, 57, 2, 'Master of Technology in Information Technology', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(36, 58, 2, 'ME CSE', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(37, 58, 2, 'M.E CSE', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(38, 58, 2, 'Master of Engineering in Computer Science and Engineering', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(39, 62, 1, 'BE EEE', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(40, 67, 1, 'BE Artificial Intelligence and Data Science', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(41, 68, 1, 'BE Artificial Intelligence and Machine Learning', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(42, 69, 1, 'BTech IT', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(43, 69, 1, 'B.Tech IT', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(44, 69, 1, 'Bachelor of Technology in Information Technology', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(45, 76, 1, 'BE CSE', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(46, 76, 1, 'B.E CSE', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(47, 76, 1, 'B.E. Computer Science and Engineering', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(48, 76, 1, 'Bachelor of Engineering in Computer Science and Engineering', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(49, 78, 1, 'BE ECE', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(50, 78, 1, 'Bachelor of Engineering in Electronics and Communication Engineering', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(51, 80, 1, 'BE IT', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(52, 80, 1, 'B.E IT', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(53, 80, 1, 'Bachelor of Engineering in Information Technology', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(54, 83, 2, 'MBA HR and Marketing', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(55, 86, 1, 'Bachelor of Science in Information Technology', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(56, 88, 2, 'Master of Computer Applications', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(57, 88, 2, 'MCA', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(58, 89, 1, 'Bachelor of Commerce', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(59, 89, 1, 'B.Com', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(60, 90, 1, 'Bachelor of Commerce from Madras University', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(61, 94, 2, 'Master of Business Management', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(62, 95, 1, 'Bachelor of Commerce (B.Com)', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(63, 100, 1, 'BTech Information and Communication Technology', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `egc_recruitment_qualification_aliases`
--

CREATE TABLE `egc_recruitment_qualification_aliases` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `qualification_sno` int(11) NOT NULL,
  `alias_name` varchar(150) NOT NULL,
  `alias_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=Synonym,1=Abbreviation,2=Common wording,3=Legacy wording',
  `match_enabled` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=Active,1=Inactive,2=Deleted',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `egc_recruitment_qualification_aliases`
--

INSERT INTO `egc_recruitment_qualification_aliases` (`sno`, `qualification_sno`, `alias_name`, `alias_type`, `match_enabled`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bachelor', 0, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(2, 1, 'Bachelor\'s', 0, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(3, 1, 'Undergraduate', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(4, 1, 'UG', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(5, 2, 'Master', 0, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(6, 2, 'Master\'s', 0, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(7, 2, 'Postgraduate', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(8, 2, 'PG', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(9, 3, 'PhD', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(10, 3, 'Ph.D', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(11, 3, 'Doctor of Philosophy', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(12, 4, '12th', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(13, 4, '12th Standard', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(14, 4, 'Plus Two', 0, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(15, 5, '10th', 1, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(16, 5, '10th Standard', 2, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(17, 5, 'Secondary School', 0, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51'),
(18, 7, 'Diploma', 0, 1, 0, 0, 0, '2026-09-29 11:06:51', '2026-09-29 11:06:51');

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
  `role_description` text DEFAULT NULL,
  `mandatory_skills` longtext DEFAULT NULL,
  `preferred_skills` longtext DEFAULT NULL,
  `responsibilities` longtext DEFAULT NULL,
  `minimum_experience` varchar(100) DEFAULT NULL,
  `education_requirements` text DEFAULT NULL,
  `seniority` varchar(100) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=Active, 1=Inactive, 2=Deleted',
  `match_enabled` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=Use for ATS matching, 0=Exclude from matching',
  `ai_matching_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `ai_profile_version` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `ai_profile_hash` char(64) DEFAULT NULL,
  `ai_profile_updated_at` timestamp NULL DEFAULT NULL,
  `ai_profile_updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `ai_profile_source` varchar(120) DEFAULT NULL
) ;

--
-- Dumping data for table `egc_recruitment_roles`
--

INSERT INTO `egc_recruitment_roles` (`sno`, `role_code`, `role_name`, `role_family`, `seniority_level`, `description`, `role_description`, `mandatory_skills`, `preferred_skills`, `responsibilities`, `minimum_experience`, `education_requirements`, `seniority`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`, `match_enabled`, `ai_matching_enabled`, `ai_profile_version`, `ai_profile_hash`, `ai_profile_updated_at`, `ai_profile_updated_by`, `ai_profile_source`) VALUES
(1, 'SALES_EXECUTIVE', 'Sales Executive', 'Sales', 1, NULL, 'Sales Executive', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(2, 'SALES_TEAM_LEAD', 'Sales Team Lead', 'Sales', 3, NULL, 'Sales Team Lead', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(3, 'SALES_MANAGER', 'Sales Manager', 'Sales', 4, NULL, 'Sales Manager', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(4, 'BUSINESS_DEVELOPMENT_EXECUTIVE', 'Business Development Executive', 'Business Development', 1, NULL, 'Business Development Executive', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(5, 'BUSINESS_DEVELOPMENT_TEAM_LEAD', 'Business Development Team Lead', 'Business Development', 3, NULL, 'Business Development Team Lead', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(6, 'BUSINESS_DEVELOPMENT_MANAGER', 'Business Development Manager', 'Business Development', 4, NULL, 'Business Development Manager', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(7, 'MARKETING_EXECUTIVE', 'Marketing Executive', 'Marketing', 1, NULL, 'Marketing Executive', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(8, 'MARKETING_EXECUTIVE_TEAM_LEAD', 'Marketing Executive Team Lead', 'Marketing', 3, NULL, 'Marketing Executive Team Lead', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(9, 'MARKETING_EXECUTIVE_MANAGER', 'Marketing Executive Manager', 'Marketing', 4, NULL, 'Marketing Executive Manager', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(10, 'PRODUCTION_EXECUTIVE', 'Production Executive', 'Production', 1, NULL, 'Production Executive', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(11, 'PRODUCTION_TEAM_LEAD', 'Production Team Lead', 'Production', 3, NULL, 'Production Team Lead', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(12, 'PRODUCTION_MANAGER', 'Production Manager', 'Production', 4, NULL, 'Production Manager', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(13, 'PROCESS_EXECUTIVE', 'Process Executive', 'Process Operations', 1, NULL, 'Process Executive', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(14, 'PROCESS_TEAM_LEAD', 'Process Team Lead', 'Process Operations', 3, NULL, 'Process Team Lead', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(15, 'PROCESS_MANAGER', 'Process Manager', 'Process Operations', 4, NULL, 'Process Manager', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(16, 'PROCESS_COORDINATOR', 'Process Coordinator', 'Process Operations', 1, NULL, 'Process Coordinator', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(17, 'CUSTOMER_RELATIONSHIP_EXECUTIVE', 'Customer Relationship Executive', 'Customer Relationship', 1, NULL, 'Customer Relationship Executive', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(18, 'CUSTOMER_RELATIONSHIP_TEAM_LEAD', 'Customer Relationship Team Lead', 'Customer Relationship', 3, NULL, 'Customer Relationship Team Lead', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(19, 'CUSTOMER_RELATIONSHIP_MANAGER', 'Customer Relationship Manager', 'Customer Relationship', 4, NULL, 'Customer Relationship Manager', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(20, 'FRONT_END_DEVELOPER', 'Front End Developer', 'Software Engineering', 1, NULL, 'Front End Developer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(21, 'BACK_END_DEVELOPER', 'Back End Developer', 'Software Engineering', 1, NULL, 'Back End Developer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(22, 'FULL_STACK_DEVELOPER', 'Full Stack Developer', 'Software Engineering', 1, NULL, 'Full Stack Developer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(23, 'UI_UX_DESIGNER', 'UI/UX Designer', 'UI/UX & Design', 1, NULL, 'UI/UX Designer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(24, 'WEB_DESIGNER', 'Web Designer', 'UI/UX & Design', 1, NULL, 'Web Designer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(25, 'WEBSITE_DEVELOPER', 'Website Developer', 'Software Engineering', 1, NULL, 'Website Developer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(26, 'SENIOR_FRONT_END_DEVELOPER', 'Senior Front End Developer', 'Software Engineering', 2, NULL, 'Senior Front End Developer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(27, 'SENIOR_BACK_END_DEVELOPER', 'Senior Back End Developer', 'Software Engineering', 2, NULL, 'Senior Back End Developer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(28, 'SENIOR_FULL_STACK_DEVELOPER', 'Senior Full Stack Developer', 'Software Engineering', 2, NULL, 'Senior Full Stack Developer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(29, 'SENIOR_UI_UX_DESIGNER', 'Senior UI/UX Designer', 'UI/UX & Design', 2, NULL, 'Senior UI/UX Designer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(30, 'SENIOR_WEB_DESIGNER', 'Senior Web Designer', 'UI/UX & Design', 2, NULL, 'Senior Web Designer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(31, 'SENIOR_WEBSITE_DEVELOPER', 'Senior Website Developer', 'Software Engineering', 2, NULL, 'Senior Website Developer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(32, 'PROJECT_TEAM_LEAD', 'Project Team Lead', 'Project Management', 3, NULL, 'Project Team Lead', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(33, 'PROJECT_MANAGER', 'Project Manager', 'Project Management', 4, NULL, 'Project Manager', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(34, 'SOFTWARE_TESTER', 'Software Tester', 'Quality Assurance', 1, NULL, 'Software Tester', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(35, 'DEVOPS_ENGINEER', 'DevOps Engineer', 'DevOps & Infrastructure', 1, NULL, 'DevOps Engineer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(36, 'NETWORK_ENGINEER', 'Network Engineer', 'DevOps & Infrastructure', 1, NULL, 'Network Engineer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(37, 'DIGITAL_MARKETING_EXECUTIVE', 'Digital Marketing Executive', 'Digital Marketing', 1, NULL, 'Digital Marketing Executive', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(38, 'DIGITAL_MARKETING_TEAM_LEAD', 'Digital Marketing Team Lead', 'Digital Marketing', 3, NULL, 'Digital Marketing Team Lead', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(39, 'DIGITAL_MARKETING_MANAGER', 'Digital Marketing Manager', 'Digital Marketing', 4, NULL, 'Digital Marketing Manager', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(40, 'SOFTWARE_TRAINER', 'Software Trainer', 'Training', 1, NULL, 'Software Trainer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(41, 'NETWORKING_TRAINER', 'Networking Trainer', 'Training', 1, NULL, 'Networking Trainer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(42, 'DIGITAL_MARKETING_TRAINER', 'Digital Marketing Trainer', 'Training', 1, NULL, 'Digital Marketing Trainer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(43, 'EMBEDDED_TRAINER', 'Embedded Trainer', 'Training', 1, NULL, 'Embedded Trainer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(44, 'EMBEDDED_DEVELOPER', 'Embedded Developer', 'Embedded Systems', 1, NULL, 'Embedded Developer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(45, 'PLACEMENT_EXECUTIVE', 'Placement Executive', 'Placement', 1, NULL, 'Placement Executive', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(46, 'PLACEMENT_TEAM_LEAD', 'Placement Team Lead', 'Placement', 3, NULL, 'Placement Team Lead', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(47, 'PLACEMENT_MANAGER', 'Placement Manager', 'Placement', 4, NULL, 'Placement Manager', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(48, 'HR_EXECUTIVE', 'HR Executive', 'Human Resources', 1, NULL, 'HR Executive', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(49, 'HR_MANAGER', 'HR Manager', 'Human Resources', 4, NULL, 'HR Manager', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(50, 'RECRUITMENT_EXECUTIVE', 'Recruitment Executive', 'Recruitment', 1, NULL, 'Recruitment Executive', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(51, 'RECRUITMENT_MANAGER', 'Recruitment Manager', 'Recruitment', 4, NULL, 'Recruitment Manager', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(52, 'ACCOUNT_EXECUTIVE', 'Account Executive', 'Finance & Accounts', 1, NULL, 'Account Executive', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(53, 'ACCOUNT_MANAGER', 'Account Manager', 'Finance & Accounts', 4, NULL, 'Account Manager', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(54, 'RECEPTIONIST', 'Receptionist', 'Front Office', 1, NULL, 'Receptionist', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(55, 'ACADEMY_COUNSELOR', 'Academy Counselor', 'Academic Counseling', 1, NULL, 'Academy Counselor', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(56, 'SENIOR_ACADEMY_COUNSELOR', 'Senior Academy Counselor', 'Academic Counseling', 2, NULL, 'Senior Academy Counselor', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(57, 'BRANCH_HEAD', 'Branch Head', 'Center Operations Management', 5, NULL, 'Branch Head', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(58, 'CENTER_HEAD', 'Center Head', 'Center Operations Management', 5, NULL, 'Center Head', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(59, 'BUSINESS_ANALYST', 'Business Analyst', 'Business Analysis', 1, NULL, 'Business Analyst', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(60, 'SENIOR_BUSINESS_ANALYST', 'Senior Business Analyst', 'Business Analysis', 2, NULL, 'Senior Business Analyst', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(61, 'MOBILE_APP_DEVELOPER', 'Mobile App Developer', 'Mobile Development', 1, NULL, 'Mobile App Developer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(62, 'SENIOR_MOBILE_APP_DEVELOPER', 'Senior Mobile App Developer', 'Mobile Development', 2, NULL, 'Senior Mobile App Developer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(63, 'CONTENT_WRITER', 'Content Writer', 'Content', 1, NULL, 'Content Writer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(64, 'SENIOR_CONTENT_WRITER', 'Senior Content Writer', 'Content', 2, NULL, 'Senior Content Writer', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(65, 'ADMIN_EXECUTIVE', 'Admin Executive', 'Administration', 1, NULL, 'Admin Executive', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(66, 'ADMIN_MANAGER', 'Admin Manager', 'Administration', 4, NULL, 'Admin Manager', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(67, 'DRIVER', 'Driver', 'Transportation', 1, NULL, 'Driver', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL),
(68, 'FIELD_EXECUTIVE', 'Field Executive', 'Field Operations', 1, NULL, 'Field Executive', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2026-09-21 08:35:10', '2026-09-28 09:30:16', 0, 1, 1, 1, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `egc_recruitment_roles_old`
--

CREATE TABLE `egc_recruitment_roles_old` (
  `sno` int(11) NOT NULL,
  `jobrole_name` tinytext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `role_description` text DEFAULT NULL,
  `mandatory_skills` text DEFAULT NULL,
  `preferred_skills` text DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `minimum_experience` decimal(5,2) DEFAULT NULL,
  `education_requirements` text DEFAULT NULL,
  `seniority` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `egc_recruitment_roles_old`
--

INSERT INTO `egc_recruitment_roles_old` (`sno`, `jobrole_name`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`, `role_description`, `mandatory_skills`, `preferred_skills`, `responsibilities`, `minimum_experience`, `education_requirements`, `seniority`) VALUES
(1, 'Business Development Executive', 0, 1, '2024-07-20 06:58:33', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Senior Business Development  Executive', 0, 1, '2024-07-20 06:58:39', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Tele caller', 0, 1, '2024-07-20 06:58:45', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Marketing Executive', 0, 1, '2024-07-20 06:58:51', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Marketing Manager', 0, 1, '2024-07-20 06:58:57', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Business Development Manager', 0, 1, '2024-07-20 06:59:04', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'HR Senior Executive', 0, 1, '2024-07-20 06:59:10', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'HR Executive', 0, 1, '2024-07-20 06:59:18', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'HR Manager', 0, 1, '2024-07-20 06:59:32', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'HR Recruiter', 0, 1, '2024-07-20 06:59:40', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Accounts Executive', 0, 1, '2024-07-20 06:59:46', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Account Senior Executive', 0, 1, '2024-07-20 06:59:53', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Account Manager', 0, 1, '2024-07-20 07:00:01', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'IT Executive', 0, 1, '2024-07-20 07:00:07', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'IT Senior Executive', 0, 1, '2024-07-20 07:00:15', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Admin Executive', 0, 1, '2024-07-20 07:00:24', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Java Developer', 0, 1, '2024-07-20 07:00:29', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Senior Java Developer', 0, 1, '2024-07-20 07:00:35', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'MATLAB Developer', 0, 1, '2024-07-20 07:00:42', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Senior MATLAB Developer', 0, 1, '2024-07-20 07:00:48', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Python Developer', 0, 1, '2024-07-20 07:00:54', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Senior Python Developer', 0, 1, '2024-07-20 07:01:00', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '.Net Developer', 0, 1, '2024-07-20 07:01:07', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Senior .Net Developer', 0, 1, '2024-07-20 07:01:13', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'PHP Developer', 0, 1, '2024-07-20 07:01:19', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Senior PHP Developer', 0, 1, '2024-07-20 07:01:25', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Reactjs Developer', 0, 1, '2024-07-20 07:01:48', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Senior Reactjs Developer', 0, 1, '2024-07-20 07:01:54', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Android Developer', 0, 1, '2024-07-20 07:01:59', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Senior Android Developer', 0, 1, '2024-07-20 07:02:04', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Flutter Developer', 0, 1, '2024-07-20 07:02:11', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Senior Flutter Developer', 0, 1, '2024-07-20 07:02:16', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Customer Care Executive', 0, 1, '2024-07-20 07:02:22', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Process Coordinator', 0, 1, '2024-07-20 07:02:28', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Content Writer', 0, 1, '2024-07-20 07:02:33', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Senior Content Writer', 0, 1, '2024-07-20 07:02:40', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Journal Coordinator', 0, 1, '2024-07-20 07:02:46', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Coordinator', 0, 1, '2024-07-20 07:02:54', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'SEO Executive', 0, 1, '2024-07-20 07:03:01', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Senior SEO Executive', 0, 1, '2024-07-20 07:03:08', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Project Manager', 0, 1, '2024-07-20 07:03:13', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Software Tester', 0, 1, '2024-07-20 07:03:18', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Senior Software Tester', 0, 1, '2024-07-20 07:03:24', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Software Faculty', 0, 1, '2024-07-20 07:03:30', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Senior Software Faculty', 0, 1, '2024-07-20 07:03:35', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Networking Faculty', 0, 1, '2024-07-20 07:03:40', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Senior Networking Faculty', 0, 1, '2024-07-20 07:03:45', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Embedded Engineer', 0, 1, '2024-07-20 07:03:51', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'Senior Embedded Engineer', 0, 1, '2024-07-20 07:03:56', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Embedded Faculty', 0, 1, '2024-07-20 07:04:01', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Senior Embedded Faculty', 0, 1, '2024-07-20 07:04:06', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Freelancer Faculty', 0, 1, '2024-07-20 07:04:13', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'Freelancer Developer', 0, 1, '2024-07-20 07:04:18', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'UI Designer', 0, 1, '2024-07-20 07:04:24', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Senior UI Designer', 0, 1, '2024-07-20 07:04:30', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Graphic Designer', 0, 1, '2024-07-20 07:04:40', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Senior Graphic Designer', 0, 1, '2024-07-20 07:04:48', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'WordPress Developer', 0, 1, '2024-07-20 07:04:52', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Management Support', 0, 1, '2024-07-20 07:04:57', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Driver', 0, 1, '2024-07-20 07:05:01', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Electrician', 0, 1, '2024-07-20 07:05:07', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Others', 0, 1, '2024-07-20 07:05:11', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Front Office Executive', 0, 3, '2024-07-30 08:34:21', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'Software Developer', 0, 1, '2024-08-01 06:00:03', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Full Stack Developer', 0, 3, '2024-08-08 10:49:06', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Business Analyst ', 0, 3, '2024-08-13 11:01:00', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'DEVOPS Engineer', 0, 3, '2024-08-14 05:09:31', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'Mobile App & IOS Developer', 0, 3, '2024-12-09 05:01:14', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'Data Analyst', 0, 3, '2025-01-08 20:53:13', 0, '2026-06-18 16:10:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `egc_recruitment_role_aliases`
--

CREATE TABLE `egc_recruitment_role_aliases` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `role_sno` bigint(20) UNSIGNED NOT NULL,
  `alias_name` varchar(150) NOT NULL,
  `normalized_alias_name` varchar(150) GENERATED ALWAYS AS (lcase(trim(`alias_name`))) STORED,
  `alias_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=Synonym, 1=Abbreviation, 2=Common Title, 3=Legacy/Misspelling',
  `match_enabled` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=Active, 1=Inactive, 2=Deleted'
) ;

--
-- Dumping data for table `egc_recruitment_role_aliases`
--

INSERT INTO `egc_recruitment_role_aliases` (`sno`, `role_sno`, `alias_name`, `alias_type`, `match_enabled`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'Sales Exec', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(2, 1, 'Sales Representative', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(3, 1, 'Sales Rep', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(4, 2, 'Sales Lead', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(5, 2, 'Sales Team Leader', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(6, 2, 'Sales TL', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(7, 3, 'Sales Mgmt', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(8, 3, 'Sales Mgr', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(9, 4, 'Business Development Exec', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(10, 4, 'BDE', 1, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(11, 4, 'BD Executive', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(12, 5, 'Business Development Lead', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(13, 5, 'BD Team Lead', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(14, 5, 'BD TL', 1, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(15, 6, 'BD Manager', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(16, 6, 'BDM', 1, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(17, 6, 'Business Development Mgr', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(18, 7, 'Marketing Exec', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(19, 7, 'Marketing Officer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(20, 8, 'Marketing Team Lead', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(21, 8, 'Marketing Lead', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(22, 8, 'Marketing TL', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(23, 9, 'Marketing Manager', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(24, 9, 'Marketing Mgr', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(25, 10, 'Production Exec', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(26, 10, 'Production Officer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(27, 11, 'Production Lead', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(28, 11, 'Production Team Leader', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(29, 11, 'Production TL', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(30, 12, 'Production Mgr', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(31, 13, 'Process Exec', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(32, 13, 'Process Associate', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(33, 14, 'Process Lead', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(34, 14, 'Process Team Leader', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(35, 14, 'Process TL', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(36, 15, 'Process Mgr', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(37, 16, 'Process Co-ordinator', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(38, 17, 'Customer Relationship Exec', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(39, 17, 'Customer Relations Executive', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(40, 17, 'CRE', 1, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(41, 18, 'Customer Relationship Lead', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(42, 18, 'Customer Relations Team Lead', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(43, 18, 'CR Team Lead', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(44, 19, 'CRM Manager', 1, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(45, 19, 'Customer Relations Manager', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(46, 20, 'Frontend Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(47, 20, 'Front-End Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(48, 20, 'UI Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(49, 21, 'Backend Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(50, 21, 'Back-End Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(51, 21, 'Server Side Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(52, 22, 'Fullstack Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(53, 22, 'Full-Stack Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(54, 22, 'Full Stack Engineer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(55, 23, 'UI UX Designer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(56, 23, 'UI Designer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(57, 23, 'UX Designer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(58, 24, 'Web Design Specialist', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(59, 24, 'Website Designer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(60, 25, 'Web Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(61, 25, 'Website Development Specialist', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(62, 26, 'Senior Frontend Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(63, 26, 'Senior Front-End Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(64, 26, 'Sr Frontend Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(65, 27, 'Senior Backend Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(66, 27, 'Senior Back-End Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(67, 27, 'Sr Backend Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(68, 28, 'Senior Fullstack Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(69, 28, 'Senior Full-Stack Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(70, 28, 'Sr Full Stack Developer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(71, 29, 'Senior UI UX Designer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(72, 29, 'Senior UI Designer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(73, 29, 'Sr UI UX Designer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(74, 30, 'Senior Website Designer', 0, 1, 0, 0, '2026-09-21 08:35:10', '2026-09-21 08:35:10', 0),
(75, 30, 'Sr Web Designer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(76, 31, 'Senior Web Developer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(77, 31, 'Senior Website Development Specialist', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(78, 31, 'Sr Web Developer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(79, 32, 'Project Lead', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(80, 32, 'Project Team Leader', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(81, 32, 'Project TL', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(82, 33, 'Project Mgr', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(83, 33, 'PM', 1, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(84, 34, 'Software Test Engineer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(85, 34, 'QA Tester', 1, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(86, 34, 'Quality Analyst', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(87, 35, 'DevOps Specialist', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(88, 35, 'DevOps Developer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(89, 36, 'Network Specialist', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(90, 36, 'Network Administrator', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(91, 37, 'Digital Marketing Exec', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(92, 37, 'Digital Marketing Specialist', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(93, 37, 'Digital Marketing Associate', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(94, 38, 'Digital Marketing Lead', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(95, 38, 'Digital Marketing Team Leader', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(96, 38, 'Digital Marketing TL', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(97, 39, 'Digital Marketing Mgr', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(98, 40, 'IT Trainer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(99, 40, 'Software Instructor', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(100, 40, 'Technical Trainer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(101, 41, 'Network Trainer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(102, 41, 'Networking Instructor', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(103, 41, 'Network Training Instructor', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(104, 42, 'Digital Marketing Instructor', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(105, 42, 'Digital Marketing Coach', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(106, 43, 'Embedded Systems Trainer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(107, 43, 'Embedded Systems Instructor', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(108, 44, 'Embedded Software Developer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(109, 44, 'Embedded Systems Developer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(110, 44, 'Embedded Engineer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(111, 45, 'Placement Exec', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(112, 45, 'Placement Officer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(113, 45, 'Placement Coordinator', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(114, 46, 'Placement Lead', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(115, 46, 'Placement Team Leader', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(116, 46, 'Placement TL', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(117, 47, 'Placement Mgr', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(118, 48, 'HR Exec', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(119, 48, 'Human Resources Executive', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(120, 48, 'HR Officer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(121, 49, 'Human Resources Manager', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(122, 49, 'HR Mgr', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(123, 50, 'Recruitment Exec', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(124, 50, 'Talent Acquisition Executive', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(125, 50, 'TA Executive', 1, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(126, 51, 'Talent Acquisition Manager', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(127, 51, 'Recruitment Mgr', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(128, 51, 'TA Manager', 1, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(129, 52, 'Accounts Executive', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(130, 52, 'Accounting Executive', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(131, 52, 'Accounts Exec', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(132, 53, 'Accounts Manager', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(133, 53, 'Accounting Manager', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(134, 53, 'Account Mgr', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(135, 54, 'Front Desk Executive', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(136, 54, 'Front Office Executive', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(137, 54, 'Reception Executive', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(138, 55, 'Academy Counsellor', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(139, 55, 'Academic Counselor', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(140, 55, 'Education Counselor', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(141, 56, 'Senior Academy Counsellor', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(142, 56, 'Senior Academic Counselor', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(143, 56, 'Sr Academy Counselor', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(144, 57, 'Branch Manager', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(145, 57, 'Branch Head', 2, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(146, 58, 'Centre Head', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(147, 58, 'Center Manager', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(148, 58, 'Centre Manager', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(149, 59, 'Business Analysist', 3, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(150, 59, 'Business Analyst', 2, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(151, 59, 'BA', 1, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(152, 60, 'Senior Business Analysist', 3, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(153, 60, 'Senior Business Analyst', 2, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(154, 60, 'Sr Business Analyst', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(155, 61, 'Mobile Application Developer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(156, 61, 'Mobile Developer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(157, 61, 'App Developer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(158, 62, 'Senior Mobile Application Developer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(159, 62, 'Senior Mobile Developer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(160, 62, 'Sr Mobile App Developer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(161, 63, 'Content Writer Executive', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(162, 63, 'Content Specialist', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(163, 63, 'Copywriter', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(164, 64, 'Senior Content Specialist', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(165, 64, 'Senior Copywriter', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(166, 64, 'Sr Content Writer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(167, 65, 'Administration Executive', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(168, 65, 'Admin Exec', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(169, 65, 'Administrative Executive', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(170, 66, 'Administration Manager', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(171, 66, 'Admin Mgr', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(172, 66, 'Administrative Manager', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(173, 67, 'Company Driver', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(174, 67, 'Chauffeur', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(175, 68, 'Field Officer', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(176, 68, 'Field Sales Executive', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0),
(177, 68, 'Field Operations Executive', 0, 1, 0, 0, '2026-09-21 08:35:11', '2026-09-21 08:35:11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_recruitment_ai_runs`
--
ALTER TABLE `egc_recruitment_ai_runs`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `egc_recruitment_ai_runs_run_uuid_unique` (`run_uuid`),
  ADD UNIQUE KEY `egc_recruitment_ai_runs_active_lock_key_unique` (`active_lock_key`),
  ADD KEY `egc_recruitment_ai_runs_requested_by_index` (`requested_by`),
  ADD KEY `egc_recruitment_ai_runs_status_index` (`status`),
  ADD KEY `egc_recruitment_ai_runs_cursor_sno_index` (`cursor_sno`),
  ADD KEY `egc_recruitment_ai_runs_force_reprocess_index` (`force_reprocess`),
  ADD KEY `egc_recruitment_ai_runs_last_heartbeat_at_index` (`last_heartbeat_at`),
  ADD KEY `egc_recruitment_ai_runs_status_force_reprocess_index` (`status`,`force_reprocess`);

--
-- Indexes for table `egc_recruitment_ai_run_items`
--
ALTER TABLE `egc_recruitment_ai_run_items`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uq_ats_run_applicant` (`run_sno`,`applicant_sno`),
  ADD KEY `egc_recruitment_ai_run_items_run_sno_index` (`run_sno`),
  ADD KEY `egc_recruitment_ai_run_items_applicant_sno_index` (`applicant_sno`),
  ADD KEY `egc_recruitment_ai_run_items_status_index` (`status`),
  ADD KEY `egc_recruitment_ai_run_items_run_sno_status_index` (`run_sno`,`status`);

--
-- Indexes for table `egc_recruitment_major_aliases`
--
ALTER TABLE `egc_recruitment_major_aliases`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uq_recruitment_major_alias` (`major_sno`,`alias_name`),
  ADD KEY `idx_recruitment_major_alias_lookup` (`qualification_id`,`major_sno`,`match_enabled`,`status`);

--
-- Indexes for table `egc_recruitment_qualification_aliases`
--
ALTER TABLE `egc_recruitment_qualification_aliases`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uq_recruitment_qualification_alias` (`qualification_sno`,`alias_name`),
  ADD KEY `idx_recruitment_qualification_alias_lookup` (`qualification_sno`,`match_enabled`,`status`);

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
-- Indexes for table `egc_recruitment_roles_old`
--
ALTER TABLE `egc_recruitment_roles_old`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `egc_recruitment_role_aliases`
--
ALTER TABLE `egc_recruitment_role_aliases`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uq_egc_role_alias` (`role_sno`,`normalized_alias_name`),
  ADD KEY `idx_egc_role_alias_lookup` (`normalized_alias_name`,`status`,`match_enabled`),
  ADD KEY `idx_egc_role_alias_role` (`role_sno`,`status`,`match_enabled`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_recruitment_ai_runs`
--
ALTER TABLE `egc_recruitment_ai_runs`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `egc_recruitment_ai_run_items`
--
ALTER TABLE `egc_recruitment_ai_run_items`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `egc_recruitment_major_aliases`
--
ALTER TABLE `egc_recruitment_major_aliases`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `egc_recruitment_qualification_aliases`
--
ALTER TABLE `egc_recruitment_qualification_aliases`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `egc_recruitment_roles`
--
ALTER TABLE `egc_recruitment_roles`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `egc_recruitment_roles_old`
--
ALTER TABLE `egc_recruitment_roles_old`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `egc_recruitment_role_aliases`
--
ALTER TABLE `egc_recruitment_role_aliases`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `egc_recruitment_role_aliases`
--
ALTER TABLE `egc_recruitment_role_aliases`
  ADD CONSTRAINT `fk_egc_role_alias_role` FOREIGN KEY (`role_sno`) REFERENCES `egc_recruitment_roles` (`sno`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
