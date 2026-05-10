-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2026 at 02:26 AM
-- Server version: 8.0.45-0ubuntu0.22.04.1
-- PHP Version: 8.4.18

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
  `card_updated_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
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
  `company_dark_logo` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `whatsapp_message` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `web_icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `web_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card_directory`
--

INSERT INTO `card_directory` (`id`, `card_updated_date`, `person_name`, `profile_photo`, `email`, `address`, `company_name`, `facebook`, `instagram`, `internet_search`, `github`, `linkedin`, `whatsapp_contact`, `company_logo`, `company_dark_logo`, `whatsapp_message`, `web_icon`, `web_title`) VALUES
(1, '2026-04-28 07:31:40', 'Chandan Jaiswal', 'uploads/profile/profile_photo_69b8363ce72d37.68624467', 'hellodrake@gmail.com', 'Aidcom it Service Bettiah', 'Aidcom', 'https://www.facebook.com/chandanjaiswalloves', 'https://www.instagram.com/chandanjaiswallove', 'https://www.google.com/search?q=chandanjaiswallove&oq=chandanjaiswallove&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIGCAEQRRg8MgYIAhBFGDwyBggDEEUYPNIBCDMzMjdqMGoxqAIAsAIA&sourceid=chrome&ie=UTF-8', 'https://github.com/chandanjaiswallove', 'https://www.linkedin.com/chandanjaiswallove', '7292818092', 'uploads/profile/company_logo_69b825521581c6.64661124', 'uploads/profile/company_dark_logo_69b53b79e6b9d8.99776695', 'Thank you for your message. We\'re unavailable right now, but will respond as soon as possible.                                                  ', 'uploads/profile/company_icon_69b82483877a86.60804246', 'Aadamya');

-- --------------------------------------------------------

--
-- Table structure for table `contact_directory`
--

CREATE TABLE `contact_directory` (
  `id` int NOT NULL,
  `contact_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
