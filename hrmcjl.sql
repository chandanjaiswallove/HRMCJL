-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2026 at 08:59 AM
-- Server version: 8.0.45-0ubuntu0.22.04.1
-- PHP Version: 8.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `card_directory`
--

CREATE TABLE `card_directory` (
  `id` int NOT NULL,
  `aadhar_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
`card_updated_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `person_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `profile_photo` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `facebook` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `instagram` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `internet_search` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `github` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `linkedin` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `whatsapp_contact` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company_logo` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company_dark_logo` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `whatsapp_message` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `web_icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `web_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card_directory`
--

INSERT INTO `card_directory` (`id`, `aadhar_number`, `card_updated_date`, `person_name`, `profile_photo`, `email`, `address`, `company_name`, `facebook`, `instagram`, `internet_search`, `github`, `linkedin`, `whatsapp_contact`, `company_logo`, `company_dark_logo`, `whatsapp_message`, `web_icon`, `web_title`) VALUES
(1, '655938224955', '2026-05-11 17:41:13', 'Chandan Jaiswal', 'uploads/profile/profile_photo_69fb298c2b2c45.99372128', '', 'Victoria IT Park Bettiah - 845306', 'Aidcom', 'https://www.facebook.com/chandanjaiswalloves', 'https://www.instagram.com/chandanjaiswallove', 'https://www.google.com/search?q=chandanjaiswallove&oq=chandanjaiswallove&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIGCAEQRRg8MgYIAhBFGDwyBggDEEUYPNIBCDMzMjdqMGoxqAIAsAIA&sourceid=chrome&ie=UTF-8', 'https://github.com/chandanjaiswallove', 'https://www.linkedin.com/chandanjaiswallove', '7292818092', 'uploads/profile/company_logo_6a01bd821b8506.89393671', 'uploads/profile/company_dark_logo_6a01c761e35a70.06445562', 'Thank you for your message. We\'re unavailable right now, but will respond as soon as possible.                                                                               ', 'uploads/profile/company_icon_6a01aaf38fe8a0.05965293', 'Chandan');

-- --------------------------------------------------------

--
-- Table structure for table `contact_directory`
--

CREATE TABLE `contact_directory` (
  `id` int NOT NULL,
`contact_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `visitor_fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `visitor_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `visitor_phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `visitor_subject` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `visitor_message` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_directory`
--

INSERT INTO `contact_directory` (`id`, `contact_date`, `visitor_fullname`, `visitor_email`, `visitor_phone`, `visitor_subject`, `visitor_message`, `is_read`) VALUES
(39, '2026-03-22 16:56:39', 'Akash Jaiswal', 'akash@gmail.com', '9546214899', 'Testing Sweet Alert', 'Sweet Alert mesage responsive', 1),
(43, '2026-03-22 16:56:39', 'Chandan Jaiswal 90', 'cjljaiswal@gmail.com', '72932818092 ', 'We need a Professional websites ', '90 width', 1),
(50, '2026-03-23 08:04:25', 'Chandan Jaiswal', 'chandan@gmail.com', '92622756000', 'Testing', 'We are here....', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE `employee_attendance` (
  `id` int NOT NULL,
  `employee_id` int NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_uid` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `attendance_date` date NOT NULL,
  `check_in_time` time DEFAULT NULL,
  `check_out_time` time DEFAULT NULL,
  `attendance_status` enum('Present','Absent','Leave') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Present',
  `remarks` text COLLATE utf8mb4_general_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`id`, `employee_id`, `employee_name`, `employee_uid`, `department`, `designation`, `attendance_date`, `check_in_time`, `check_out_time`, `attendance_status`, `remarks`, `created_at`, `updated_at`) VALUES
(35, 29, 'Vedam Dunnel', 'VED20260507122201', 'Water Service Staff', 'Office Helper', '2026-05-07', '09:06:52', '19:00:00', 'Present', 'Have a Good Day..', '2026-05-07 07:37:36', '2026-05-07 08:33:17'),
(36, 27, 'aanaya jaiswal', 'AAN20260507121542', 'IT Department', 'Web Developer', '2026-05-07', '10:08:46', '17:00:00', 'Present', 'Nice Day..Refer', '2026-05-07 07:39:24', '2026-05-09 10:33:59'),
(37, 26, 'Parmodh jaiswal', 'RAH20260507121500', 'Sales', 'Sales Manager', '2026-05-07', '00:00:00', '00:00:00', 'Absent', 'Absent..', '2026-05-07 07:40:58', '2026-05-07 07:42:45'),
(38, 29, 'Vedam Dunnel', 'VED20260507122201', 'Water Service Staff', 'Office Helper', '2026-05-08', '14:51:11', '16:00:00', 'Present', 'e3', '2026-05-08 09:21:15', '2026-05-09 08:02:30'),
(39, 27, 'aanaya jaiswal', 'AAN20260507121542', 'IT Department', 'Web Developer', '2026-05-09', '09:04:05', '15:00:00', 'Present', 'dsfa', '2026-05-08 09:34:21', '2026-05-08 09:35:21'),
(40, 27, 'aanaya jaiswal', 'AAN20260507121542', 'IT Department', 'Web Developer', '2026-05-08', '00:00:00', '00:00:00', 'Absent', 'Absent', '2026-05-09 07:24:09', '2026-05-09 10:36:26'),
(41, 27, 'aanaya jaiswal', 'AAN20260507121542', 'IT Department', 'Web Developer', '2026-05-06', '00:00:00', '00:00:00', 'Leave', 'Leave', '2026-05-09 07:25:05', '2026-05-09 10:28:31'),
(42, 31, 'Saimullah', 'SAI20260508145320', 'IT Department', 'IT Support', '2026-05-09', '12:56:22', '18:00:00', 'Present', 'present', '2026-05-09 07:26:27', '2026-05-09 07:27:00'),
(43, 29, 'Vedam Dunnel', 'VED20260507122201', 'Water Service Staff', 'Office Helper', '2026-05-06', '00:00:00', '00:00:00', 'Absent', 'Absent', '2026-05-09 07:59:39', '2026-05-09 07:59:39'),
(44, 26, 'Parmodh jaiswal', 'RAH20260507121500', 'Sales', 'Sales Manager', '2026-05-06', '00:00:00', '00:00:00', 'Leave', 'Leave', '2026-05-09 08:00:06', '2026-05-09 08:00:06'),
(45, 26, 'Parmodh jaiswal', 'RAH20260507121500', 'Sales', 'Sales Manager', '2026-05-09', '09:30:26', '00:00:00', 'Present', 'P', '2026-05-09 08:00:35', '2026-05-09 08:00:35'),
(46, 29, 'Vedam Dunnel', 'VED20260507122201', 'Water Service Staff', 'Office Helper', '2026-05-09', '00:00:00', '00:00:00', 'Absent', 'Absent', '2026-05-09 08:01:05', '2026-05-09 08:01:05'),
(47, 31, 'Saimullah', 'SAI20260508145320', 'IT Department', 'IT Support', '2026-05-01', '13:34:47', '00:00:00', 'Present', 'p', '2026-05-09 08:03:58', '2026-05-09 08:03:58'),
(48, 31, 'Saimullah', 'SAI20260508145320', 'IT Department', 'IT Support', '2026-05-04', '09:56:54', '15:57:02', 'Present', 'pintu kumar', '2026-05-09 10:27:08', '2026-05-09 10:27:08'),
(49, 33, 'Galaxy', 'GAL20260509162949', 'Sales', 'Marketing Executive', '2026-05-09', '09:41:42', '16:00:00', 'Present', 'good morning', '2026-05-09 11:12:12', '2026-05-09 11:20:36'),
(50, 26, 'Parmodh jaiswal', 'RAH20260507121500', 'Sales', 'Sales Manager', '2026-04-10', '21:07:59', '00:00:00', 'Present', 'good morning', '2026-05-10 01:38:06', '2026-05-10 01:38:06'),
(52, 26, 'Parmodh jaiswal', 'RAH20260507121500', 'Sales', 'Sales Manager', '2026-04-09', '10:30:46', '00:00:00', 'Present', 'ss', '2026-05-10 05:00:51', '2026-05-10 05:00:51'),
(53, 34, 'Niraj Jaiswal', 'NIR20260510103438', '', '', '2026-05-10', '10:54:18', '17:00:00', 'Present', 'ghij', '2026-05-10 05:24:20', '2026-05-10 05:26:10'),
(54, 29, 'Vedam Dunnel', 'VED20260507122201', 'Water Service Staff', 'Office Helper', '2026-06-02', '08:40:00', '16:40:06', 'Present', 'Hee', '2026-05-10 11:10:11', '2026-05-10 11:10:11'),
(55, 29, 'Vedam Dunnel', 'VED20260507122201', 'Water Service Staff', 'Office Helper', '2026-06-03', '00:00:00', '00:00:00', 'Absent', 'ghij', '2026-05-10 11:10:27', '2026-05-10 11:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `employee_payroll`
--

CREATE TABLE `employee_payroll` (
  `id` int NOT NULL,
  `employee_uid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salary_month` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `salary_year` year NOT NULL,
  `gross_salary` decimal(10,2) DEFAULT '0.00',
  `earned_amount` decimal(10,2) DEFAULT '0.00',
  `present_days` int DEFAULT '0',
  `absent_days` int DEFAULT '0',
  `leave_days` int DEFAULT '0',
  `advance_amount` decimal(10,2) DEFAULT '0.00',
  `deduction_amount` decimal(10,2) DEFAULT '0.00',
  `paid_amount` decimal(10,2) DEFAULT '0.00',
  `due_amount` decimal(10,2) DEFAULT '0.00',
  `payment_mode` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `previous_due` decimal(10,2) DEFAULT '0.00',
  `previous_advance` decimal(10,2) DEFAULT '0.00',
  `final_payable_salary` decimal(10,2) DEFAULT '0.00',
  `payroll_month_key` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_payroll`
--

INSERT INTO `employee_payroll` (`id`, `employee_uid`, `employee_name`, `department`, `designation`, `salary_month`, `salary_year`, `gross_salary`, `earned_amount`, `present_days`, `absent_days`, `leave_days`, `advance_amount`, `deduction_amount`, `paid_amount`, `due_amount`, `payment_mode`, `payment_date`, `remarks`, `created_at`, `updated_at`, `status`, `previous_due`, `previous_advance`, `final_payable_salary`, `payroll_month_key`) VALUES
(9, 'AAN20260507121542', 'aanaya jaiswal', 'IT Department', 'Web Developer', 'May', '2026', 3000.00, 290.00, 2, 1, 1, 361.00, 97.00, 651.00, 0.00, 'Cash', '2026-05-10', 'May Month Payemnt', '2026-05-10 05:01:51', '2026-05-11 13:01:47', 'Pending', 0.00, 0.00, 290.00, NULL),
(10, 'VED20260507122201', 'Vedam Dunnel', 'Water Service Staff', 'Office Helper', 'May', '2026', 13996.00, 903.00, 2, 2, 0, 0.00, 903.00, 903.00, 0.00, 'Cash', '2026-05-10', 'Payment Done', '2026-05-10 05:13:56', '2026-05-10 11:13:25', 'Pending', 0.00, 0.00, 903.00, NULL),
(11, 'RAH20260507121500', 'Parmodh jaiswal', 'Sales', 'Sales Manager', 'May', '2026', 4522.00, 292.00, 1, 1, 1, 0.00, 146.00, 292.00, 0.00, 'Cash', '2026-05-10', 'First Payemnt', '2026-05-10 05:15:29', NULL, 'Pending', 0.00, 0.00, 292.00, NULL),
(12, 'VED20260507122201', 'Vedam Dunnel', 'Water Service Staff', 'Office Helper', 'June', '2026', 13996.00, 467.00, 1, 1, 0, 0.00, 467.00, 370.00, 0.00, 'Cash', '2026-05-10', 'Payment Done', '2026-05-10 05:43:02', NULL, 'Pending', 0.00, 97.00, 370.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_task_checklist`
--

CREATE TABLE `employee_task_checklist` (
  `id` int NOT NULL,
  `employee_id` int NOT NULL,
  `employee_uid` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `checklist_date` date NOT NULL,
  `shift` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `area_section` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `task_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `task_status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `task_remark` text COLLATE utf8mb4_general_ci,
  `cleaner_remark` text COLLATE utf8mb4_general_ci,
  `supervisor_remark` text COLLATE utf8mb4_general_ci,
  `final_status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_task_checklist`
--

INSERT INTO `employee_task_checklist` (`id`, `employee_id`, `employee_uid`, `employee_name`, `department`, `designation`, `checklist_date`, `shift`, `area_section`, `task_name`, `task_status`, `task_remark`, `cleaner_remark`, `supervisor_remark`, `final_status`, `created_at`, `updated_at`) VALUES
(73, 29, 'VED20260507122201', 'Vedam Dunnel', 'Water Service Staff', 'Office Helper', '2026-05-07', 'All Day', 'Victoria IT Park Bettiah 845438', 'Daily Water Supply', 'Done', 'good', 'Vedam_Dunnel', 'Admin..', 'Completed', '2026-05-07 07:46:04', '2026-05-07 08:36:55'),
(74, 29, 'VED20260507122201', 'Vedam Dunnel', 'Water Service Staff', 'Office Helper', '2026-05-07', 'All Day', 'Victoria IT Park Bettiah 845438', 'Checking Not Empty Jar', 'Done', 'done', 'Vedam_Dunnel', 'Admin..', 'Pending', '2026-05-07 07:46:04', '2026-05-07 08:36:55'),
(75, 27, 'AAN20260507121542', 'aanaya jaiswal', 'IT Department', 'Web Developer', '2026-05-07', 'Morning', 'Victoria IT Park Bettiah 845438', 'Basic HR Modules', 'Done', 'best', 'aanaya_jaiswal', 'admin_..', 'Completed', '2026-05-07 08:08:21', '2026-05-09 10:36:54'),
(76, 27, 'AAN20260507121542', 'aanaya jaiswal', 'IT Department', 'Web Developer', '2026-05-07', 'Morning', 'Victoria IT Park Bettiah 845438', 'Checking Modules', 'Done', 'good', 'aanaya_jaiswal', 'admin_..', 'Completed', '2026-05-07 08:08:21', '2026-05-09 10:36:54'),
(77, 26, 'RAH20260507121500', 'Parmodh jaiswal', 'Sales', 'Sales Manager', '2026-05-07', 'All Day', 'Victoria IT Park Bettiah 845438', 'Daily Cash Collect', 'Done', ' Done', 'emp', 'adm', 'Pending', '2026-05-07 08:08:50', '2026-05-09 07:27:27'),
(78, 29, 'VED20260507122201', 'Vedam Dunnel', 'Water Service Staff', 'Office Helper', '2026-05-08', 'Evening', 'Victoria IT Park Bettiah 845438', 'Daily Water Supply', 'Done', '', '', 'sdf', 'Completed', '2026-05-08 09:26:39', '2026-05-08 09:33:28'),
(79, 29, 'VED20260507122201', 'Vedam Dunnel', 'Water Service Staff', 'Office Helper', '2026-05-08', 'Evening', 'Victoria IT Park Bettiah 845438', 'Checking Not Empty Jar', 'Done', 'naikhe', '', 'sdf', 'Pending', '2026-05-08 09:26:39', '2026-05-08 09:33:28'),
(80, 33, 'GAL20260509162949', 'Galaxy', 'Sales', 'Marketing Executive', '2026-05-09', 'Morning', 'Victoria IT Park Bettiah 845438', 'work one', 'Done', 'process', 'asdf', 'asdfsd', 'Pending', '2026-05-09 11:13:11', '2026-05-09 11:18:30'),
(81, 33, 'GAL20260509162949', 'Galaxy', 'Sales', 'Marketing Executive', '2026-05-09', 'Morning', 'Victoria IT Park Bettiah 845438', 'work two', 'Done', 'done', 'asdf', 'asdfsd', 'Completed', '2026-05-09 11:13:11', '2026-05-09 11:18:30'),
(82, 29, 'VED20260507122201', 'Vedam Dunnel', 'Water Service Staff', 'Office Helper', '2026-05-19', 'All Day', '', 'Daily Water Supply', 'Done', '', '', '', 'Completed', '2026-05-10 02:07:26', '2026-05-10 02:07:26'),
(83, 29, 'VED20260507122201', 'Vedam Dunnel', 'Water Service Staff', 'Office Helper', '2026-05-19', 'All Day', '', 'Checking Not Empty Jar', 'Done', '', '', '', 'Completed', '2026-05-10 02:07:26', '2026-05-10 02:07:26'),
(84, 29, 'VED20260507122201', 'Vedam Dunnel', 'Water Service Staff', 'Office Helper', '2026-05-10', 'All Day', '', 'Daily Water Supply', 'Done', '', '', '', 'Completed', '2026-05-10 02:08:04', '2026-05-10 02:08:04'),
(85, 29, 'VED20260507122201', 'Vedam Dunnel', 'Water Service Staff', 'Office Helper', '2026-05-10', 'All Day', '', 'Checking Not Empty Jar', 'Done', '', '', '', 'Completed', '2026-05-10 02:08:04', '2026-05-10 02:08:04'),
(86, 34, 'NIR20260510103438', 'Niraj Jaiswal', '', '', '2026-05-10', 'Morning', 'IIT Park', 'Date work 1', 'Pending', 'Pending', 'Date Checking', 'Supervisor', 'Pending', '2026-05-10 05:31:19', '2026-05-10 05:31:19'),
(87, 34, 'NIR20260510103438', 'Niraj Jaiswal', '', '', '2026-05-10', 'Morning', 'IIT Park', 'Validation  date 2', 'Done', 'Done', 'Date Checking', 'Supervisor', 'Completed', '2026-05-10 05:31:19', '2026-05-10 05:31:19'),
(88, 34, 'NIR20260510103438', 'Niraj Jaiswal', '', '', '2026-05-09', 'All Day', '', 'Date work 1', 'Done', '', '', '', 'Completed', '2026-05-10 05:31:47', '2026-05-10 05:31:47'),
(89, 34, 'NIR20260510103438', 'Niraj Jaiswal', '', '', '2026-05-09', 'All Day', '', 'Validation  date 2', 'Done', '', '', '', 'Completed', '2026-05-10 05:31:47', '2026-05-10 05:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `employee_task_master`
--

CREATE TABLE `employee_task_master` (
  `id` int NOT NULL,
  `employee_id` int NOT NULL,
  `employee_uid` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `designation` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `task_status` enum('Active','Inactive') COLLATE utf8mb4_general_ci DEFAULT 'Active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_task_master`
--

INSERT INTO `employee_task_master` (`id`, `employee_id`, `employee_uid`, `employee_name`, `department`, `designation`, `task_name`, `task_status`, `created_at`, `updated_at`) VALUES
(72, 29, 'VED20260507122201', 'Vedam Dunnel', 'Water Service Staff', 'Office Helper', 'Daily Water Supply', 'Active', '2026-05-07 07:33:23', '2026-05-07 07:33:23'),
(73, 29, 'VED20260507122201', 'Vedam Dunnel', 'Water Service Staff', 'Office Helper', 'Checking Not Empty Jar', 'Active', '2026-05-07 07:33:23', '2026-05-07 07:33:23'),
(74, 27, 'AAN20260507121542', 'aanaya jaiswal', 'IT Department', 'Web Developer', 'Basic HR Modules', 'Active', '2026-05-07 07:35:27', '2026-05-07 07:35:27'),
(75, 27, 'AAN20260507121542', 'aanaya jaiswal', 'IT Department', 'Web Developer', 'Checking Modules', 'Active', '2026-05-07 07:35:27', '2026-05-07 07:35:27'),
(76, 26, 'RAH20260507121500', 'Parmodh jaiswal', 'Sales', 'Sales Manager', 'Daily Cash Collect', 'Active', '2026-05-07 07:36:25', '2026-05-07 07:36:25'),
(81, 33, 'GAL20260509162949', 'Galaxy', 'Sales', 'Marketing Executive', 'work one', 'Active', '2026-05-09 11:11:28', '2026-05-09 11:11:28'),
(82, 33, 'GAL20260509162949', 'Galaxy', 'Sales', 'Marketing Executive', 'work two', 'Active', '2026-05-09 11:11:28', '2026-05-09 11:11:28'),
(83, 34, 'NIR20260510103438', 'Niraj Jaiswal', '', '', 'Date work 1', 'Active', '2026-05-10 05:27:45', '2026-05-10 05:27:45'),
(84, 34, 'NIR20260510103438', 'Niraj Jaiswal', '', '', 'Validation  date 2', 'Active', '2026-05-10 05:27:45', '2026-05-10 05:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `register_directory`
--

CREATE TABLE `register_directory` (
  `id` int NOT NULL,
  `user_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `reset_otp` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_directory`
--

INSERT INTO `register_directory` (`id`, `user_id`, `email`, `password`, `status`, `created_at`, `updated_at`, `reset_otp`) VALUES
(7, 'J1ULXIIB', 'cjlrjl@gmail.com', '$2y$12$Vl6iniLnRDXP9dMHzezuuutq9puJ2k77fBbGOsadR5qvHlsIpnn0C', 1, '2026-03-22 05:56:23', '2026-03-22 05:56:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_directory`
--

CREATE TABLE `student_directory` (
  `id` int NOT NULL,
  `student_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `student_email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `student_contact` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `student_uid` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `student_avatar` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `student_aadhar` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `student_aapaar` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `student_blood_group` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `student_gender` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `student_dob` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `student_father_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `permanent_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `correspondance_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `enrolled_class_section` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_contact_no` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `joining_date` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `enrollment_year` varchar(360) COLLATE utf8mb4_general_ci NOT NULL,
  `student_profile_status` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `db_enrollment_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `monthly_salary` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_directory`
--

INSERT INTO `student_directory` (`id`, `student_name`, `student_email`, `student_contact`, `student_uid`, `student_avatar`, `student_aadhar`, `student_aapaar`, `student_blood_group`, `student_gender`, `student_dob`, `student_father_name`, `permanent_address`, `correspondance_address`, `enrolled_class_section`, `father_contact_no`, `joining_date`, `enrollment_year`, `student_profile_status`, `db_enrollment_update`, `monthly_salary`) VALUES
(26, 'Parmodh jaiswal', 'rahuljaiswal@gmail.com', '+919262275400', 'RAH20260507121500', 'cf984ecfd84fbe8b9b9cf6417efcdc0c.jpg', '633582337654', '4522', 'O+', 'male', '2000-01-01', 'Mahesh Jaiswal', 'MS , mothihari, bihar - 845765542', ' Metro City , Patna , Bihar - 84575541     ', 'Sales', '9798564795', '2026-05-07', 'Sales Manager', 'Active', '2026-05-10 05:12:52', 4522.00),
(27, 'aanaya jaiswal', 'aanayajaiswal@gmail.com', '9472428947', 'AAN20260507121542', '79e4f7cc165d85d76b4b912d1dec1561.jpg', '366589223752', '5001', 'AB+', 'female', '2004-02-10', 'Saurav Jaiswal', 'Pari Chowk, Greater Noida , uP - 7641525', '              LTT, Kurlem, Maharastha - 1104582          ', 'IT Department', '9821878761', '2026-05-06', 'Web Developer', 'Active', '2026-05-11 07:08:30', 5001.00),
(28, 'Saanvi Jaiswal', 'saanvijaiswal@gmail.com', '+917292818362', 'SAA20260507121648', 'bd07ac8a9c5ce05d95796858f038c997.jpeg', '679935622495', '25599', 'AB+', 'female', '2005-01-01', 'Satya Prakash', 'BullBall Park , KhadakNagar, LP - 468653', '   Palam Lake , Rudelm , sP - 32146332 ', 'Sales', '+917292818362', '2026-05-05', 'Sales Executive', 'Inactive', '2026-05-10 05:13:02', 25599.00),
(29, 'Vedam Dunnel', 'vedamdunnel@gmail.com', '+919262275448', 'VED20260507122201', '5823f912289ffeb4156a97fd279d8737.png', '699583226644', '13996', 'Ab+', 'male', '2001-01-01', 'Mukesh Jain', 'Lafarde, Staniel Road , UK - 135465412', ' Amer, Z Road , OFC - 135465412     ', 'Water Service Staff', '+919262275448', '2026-05-07', 'Office Helper', 'Active', '2026-05-10 05:13:21', 13996.00),
(30, 'Maniem xem', 'maniemxem@gmail.com', '+917292818045', 'MAN20260507122445', '19a3833b5a47cb7e72b124fb361476fe.png', '366589223752', '12500', 'AB-', 'male', '2007-01-01', 'Jack Mile', 'Couple Garden, meetBridge, London - 413652332', '      senion Place, Valueim , UK - 3954612    ', 'Cleaning', '+919262275605', '2026-05-03', 'Cleaner', 'Inactive', '2026-05-09 20:01:53', 12500.00),
(31, 'Saimullah', 'saimullah@gmail.com', '', 'SAI20260508145320', 'b2f73592acdf8be939cf491621f0d10b.jpeg', '633582337654', '45600', '', 'male', '1970-01-01', '', '', '      ', 'IT Department', '', '2026-05-08', 'IT Support', 'Inactive', '2026-05-10 05:13:11', 45600.00),
(33, 'Galaxy', 'galaxy@gmail.com', '+919262275603', 'GAL20260509162949', '887c06eebdee9d281dd0c386820baa33.jpg', '366589223752', '6000', 'AB+', 'male', '2004-01-01', 'Vinod Bansal', 'pmch', '  gmch    ', 'Sales', '+919262275600', '2026-05-09', 'Marketing Executive', 'Active', '2026-05-10 05:12:26', 6000.00),
(34, 'Niraj Jaiswal', 'niraj@gmail.com', '', 'NIR20260510103438', '', '', '5797', '', '', '1970-01-01', '', '', '    ', '', '', '2026-05-10', '', 'Active', '2026-05-10 05:12:42', 5797.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `attendance_date` (`attendance_date`),
  ADD KEY `attendance_status` (`attendance_status`);

--
-- Indexes for table `employee_payroll`
--
ALTER TABLE `employee_payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_task_checklist`
--
ALTER TABLE `employee_task_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_task_master`
--
ALTER TABLE `employee_task_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `employee_uid` (`employee_uid`);

--
-- Indexes for table `student_directory`
--
ALTER TABLE `student_directory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `employee_payroll`
--
ALTER TABLE `employee_payroll`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_task_checklist`
--
ALTER TABLE `employee_task_checklist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `employee_task_master`
--
ALTER TABLE `employee_task_master`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `student_directory`
--
ALTER TABLE `student_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
