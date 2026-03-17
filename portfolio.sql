-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 17, 2026 at 11:40 AM
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
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_directory`
--

CREATE TABLE `about_directory` (
  `id` int NOT NULL,
  `about_updated_date` datetime NOT NULL,
  `about_title` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title_highlights` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `about_paragraph` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_directory`
--

INSERT INTO `about_directory` (`id`, `about_updated_date`, `about_title`, `title_highlights`, `about_paragraph`) VALUES
(1, '2026-03-16 14:48:00', 'Great Design and Smart Development Create', 'Powerful Digital Experience', 'Since the beginning of our journey, we have worked with agencies, startups, and businesses to create modern websites and web applications. Currently, we are working at Aidcom IT Service Solutions, Bettiah as Designers and Developers, focusing on clean design, smart development, and solving digital problems one project at a time.');

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
  `whatsapp_support` varchar(360) COLLATE utf8mb4_general_ci NOT NULL,
  `web_icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `web_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card_directory`
--

INSERT INTO `card_directory` (`id`, `card_updated_date`, `person_name`, `profile_photo`, `email`, `address`, `company_name`, `facebook`, `instagram`, `internet_search`, `github`, `linkedin`, `whatsapp_contact`, `company_logo`, `company_dark_logo`, `whatsapp_message`, `whatsapp_support`, `web_icon`, `web_title`) VALUES
(1, '2026-03-17 16:55:23', 'Chandan Jaiswal', 'uploads/profile/profile_photo_69b8363ce72d37.68624467', 'hellodrake@gmail.com', 'Aidcom it Service Bettiah', 'Aidcom', 'https://www.facebook.com/chandanjaiswalloves', 'https://www.instagram.com/chandanjaiswallove', 'https://www.google.com/search?q=chandanjaiswallove&oq=chandanjaiswallove&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIGCAEQRRg8MgYIAhBFGDwyBggDEEUYPNIBCDMzMjdqMGoxqAIAsAIA&sourceid=chrome&ie=UTF-8', 'https://github.com/chandanjaiswallove', 'https://www.linkedin.com/chandanjaiswallove', '919262275600', 'uploads/profile/company_logo_69b825521581c6.64661124', 'uploads/profile/company_dark_logo_69b53b79e6b9d8.99776695', 'Thank you for your message. We\'re unavailable right now, but will respond as soon as possible.                                        ', '+919262275600', 'uploads/profile/company_icon_69b82483877a86.60804246', 'Jaiswal');

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
(36, '2026-03-11 19:02:58', 'Chandan Jaiswal', 'drake@gmail.com', '9472428947', 'We need a Professional websites', 'Write your message ....', 1),
(37, '2026-03-15 14:35:45', 'Chandan Jaiswal', 'saanvi@gmail.com', '9262275600 ', 'ssssssssssssssssssssssssssssssssssssssssssssssssss', 'ffffffffffffffffff sssssssssssssssssss sssssssssssssss f fffffffffffffffffffff ffffffffffffffffffffffffasdfff asdfffffffffffffffffffffffffffffffffffff asdfffffffffffffffff sssssssssssssssssssssssssssssssssssdf', 1),
(38, '2026-03-16 14:56:20', 'Chandan Jaiswal', 'chandan@gmail.com', '72932818092', 'Testing with email user', 'okkk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `education_blocks`
--

CREATE TABLE `education_blocks` (
  `id` int NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_blocks`
--

INSERT INTO `education_blocks` (`id`, `date`, `created_at`) VALUES
(67, '2026 - Present', '2026-03-16 14:46:25'),
(68, '2023 – 2025', '2026-03-16 14:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `education_items`
--

CREATE TABLE `education_items` (
  `id` int NOT NULL,
  `block_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_items`
--

INSERT INTO `education_items` (`id`, `block_id`, `title`, `description`) VALUES
(129, 67, 'Web Designer & Full-Stack Developer', 'Aidcom IT Service & Solutions'),
(130, 67, 'Software Associate & Digital Marketing', 'Aidcom IT Service & Solutions'),
(131, 68, 'Freelance Web Designer & Developer', 'Worked on multiple freelance projects for our own clients, startups, and the education sector. Designed and developed modern, responsive websites including school websites, small business websites, portfolio websites, and digital visiting card websites. Focused on creating user-friendly and performance-optimized digital solutions.'),
(132, 68, 'Web Designer', 'Designed website layouts, UI components, and responsive web pages with a focus on clean design and better user experience.'),
(133, 68, 'Front-End Web Developer', 'Built responsive and interactive user interfaces using HTML, CSS, JavaScript, Tailwind CSS, Bootstrap, and React.js. Focused on clean code, modern UI design, and improving website usability and performance across devices.');

-- --------------------------------------------------------

--
-- Table structure for table `introduce_directory`
--

CREATE TABLE `introduce_directory` (
  `id` int NOT NULL,
  `introduce_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `introduce_title` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `introduce_highlight` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `introduce_paragraph` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `experience` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `project_completed` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `project_download` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `introduce_directory`
--

INSERT INTO `introduce_directory` (`id`, `introduce_date`, `introduce_title`, `introduce_highlight`, `introduce_paragraph`, `experience`, `project_completed`, `project_download`) VALUES
(4, '2026-03-16 21:26:40', 'Web Designer and Developer', 'Jaiswal', 'We design and develop beautifully simple websites that help businesses grow online. Clean design, smart development, and a passion for creating modern digital experiences.', '02+', '07+', 'uploads/projects/1768198188_newProjectCreationCodeigniter.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `myskill_directory`
--

CREATE TABLE `myskill_directory` (
  `id` int NOT NULL,
  `skill_updated_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `skill_logo` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `skill_percentage` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `skill_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myskill_directory`
--

INSERT INTO `myskill_directory` (`id`, `skill_updated_date`, `skill_logo`, `skill_percentage`, `skill_name`) VALUES
(7, '2026-03-15 09:55:36', 'uploads/skill/ba777b59b476f0adcb4ec5daf43e37e7.png', '01', 'HTML'),
(8, '2026-03-15 10:00:49', 'uploads/skill/a5b9d1317264e9cdba05a7d5711ebf56.png', '01', 'CSS'),
(9, '2026-03-15 10:02:40', 'uploads/skill/a6e97cf619f5f8fb69a2895c24ca639e.png', '01', 'JS'),
(10, '2026-03-15 10:03:29', 'uploads/skill/a6f33f775f0760ca48a085b1d8352d47.png', '01', 'BOOTSTRAP'),
(11, '2026-03-15 10:04:13', 'uploads/skill/d001563bcdaab578c6478526172618a1.png', '01', 'TAILWIND'),
(12, '2026-03-15 10:08:27', 'uploads/skill/93a941c89fd0f2ef5f945eae058454f9.png', '01', 'REACT'),
(14, '2026-03-15 11:06:14', 'uploads/skill/e4fc1c940cb118b9713b4d3c58a7ce06.png', '01', 'VITE'),
(15, '2026-03-15 10:46:47', 'uploads/skill/2f959d134b24edc217b45196d4a3fb0d.png', '01', 'LARAVEL'),
(16, '2026-03-15 11:02:16', 'uploads/skill/74e32b6374db8e38d721880079e20258.png', '01', 'PHP'),
(17, '2026-03-15 11:07:50', 'uploads/skill/2d78e33afe3e61222715a43d02c9ff37.png', '01', 'MYSQL'),
(18, '2026-03-15 11:06:47', 'uploads/skill/98513fbbfeaff2eb15e5508dba66a9c0.png', '01', 'CODEIGNITER'),
(19, '2026-03-15 11:21:10', 'uploads/skill/7eca81f9d4df64923735553e424a3f2b.png', '01', 'GIT'),
(20, '2026-03-16 14:47:39', 'uploads/skill/2af93c2c57795e41777c8737337913d8.png', '01', 'GITHUB');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_projects`
--

CREATE TABLE `portfolio_projects` (
  `id` int NOT NULL,
  `project_link` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `full_image` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `project_title` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio_projects`
--

INSERT INTO `portfolio_projects` (`id`, `project_link`, `created_at`, `full_image`, `project_title`) VALUES
(9, 'https://aidcombizcard.in/', '2026-03-15 17:15:08', 'uploads/portproject/a35b202bbee1dce02b84a1ff263885c9.png', 'Get Your Smart Digital Visiting Card Today'),
(10, 'https://www.stmichaelsbth.in/', '2026-03-16 08:50:31', 'uploads/portproject/ac865e21a90bb69c0584383c29bed4dc.png', 'Integrated School ERP & Official Website');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_tags`
--

CREATE TABLE `portfolio_tags` (
  `project_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `project_tags` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio_tags`
--

INSERT INTO `portfolio_tags` (`project_id`, `project_tags`, `created_at`) VALUES
('10', 'School ERP & Website', '2026-03-16 03:20:31'),
('9', 'Digital Visiting Card', '2026-03-16 14:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_card`
--

CREATE TABLE `pricing_card` (
  `id` int NOT NULL,
  `plan_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `small_description` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pricing` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `duration` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sample_url` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pricing_card`
--

INSERT INTO `pricing_card` (`id`, `plan_name`, `small_description`, `pricing`, `duration`, `sample_url`, `created_at`, `updated_at`) VALUES
(25, 'Basic', 'Best for Small </br> Businesses & Startups', '9999', '1 Year', 'https://www.stthomaschuhari.com/', '2026-03-15 08:52:51', '2026-03-14 21:52:51'),
(26, 'Premium', 'Best for Businesses that </br> Need Priority Service', '14999', '1 Year', 'https://www.shivshaktisolarsolution.com/', '2026-03-15 08:53:11', '2026-03-14 21:53:11'),
(27, 'Pro', 'Best for Advanced Businesses </br> & Web Applications', '19999', '1 Year', 'https://aidcombizcard.in/', '2026-03-16 20:16:44', '2026-03-16 09:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_items`
--

CREATE TABLE `pricing_items` (
  `pricing_id` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_text` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pricing_items`
--

INSERT INTO `pricing_items` (`pricing_id`, `item_text`, `created_at`, `updated_at`) VALUES
('25', 'Design with: HTML, CSS, JavaScript, Bootstrap', '2026-03-15 03:22:51', '0000-00-00 00:00:00'),
('25', '100% Responsive Design (Mobile Friendly & All Devices Support)', '2026-03-15 03:22:51', '0000-00-00 00:00:00'),
('25', 'Development with: CodeIgniter, Laravel, PHP', '2026-03-15 03:22:51', '0000-00-00 00:00:00'),
('25', 'Clean & Professional UI', '2026-03-15 03:22:51', '0000-00-00 00:00:00'),
('25', 'Remote / Online / Physical Work Available', '2026-03-15 03:22:51', '0000-00-00 00:00:00'),
('25', 'Work in Business Days (No Weekend Work)', '2026-03-15 03:22:51', '0000-00-00 00:00:00'),
('25', '12 Months Technical Support', '2026-03-15 03:22:51', '0000-00-00 00:00:00'),
('25', 'Project-Based Pricing', '2026-03-15 03:22:51', '0000-00-00 00:00:00'),
('25', 'Affordable for Small Budgets', '2026-03-15 03:22:51', '0000-00-00 00:00:00'),
('25', '<strong>Note: </strong>Final project price will be confirmed after discussion and requirements.', '2026-03-15 03:22:51', '0000-00-00 00:00:00'),
('26', 'High Performance & Secure Development', '2026-03-15 03:23:11', '0000-00-00 00:00:00'),
('26', 'SEO Friendly Website Structure', '2026-03-15 03:23:11', '0000-00-00 00:00:00'),
('26', 'Clean, Modern & Professional UI/UX', '2026-03-15 03:23:11', '0000-00-00 00:00:00'),
('26', '100% Responsive & Mobile Friendly Design', '2026-03-15 03:23:11', '0000-00-00 00:00:00'),
('26', 'Design with: HTML, CSS, JavaScript, Bootstrap, TailwindCSS', '2026-03-15 03:23:11', '0000-00-00 00:00:00'),
('26', 'Development with: CodeIgniter, Laravel, PHP', '2026-03-15 03:23:11', '0000-00-00 00:00:00'),
('26', 'Remote / Online / Physical Work Available', '2026-03-15 03:23:11', '0000-00-00 00:00:00'),
('26', 'Weekend Work Available', '2026-03-15 03:23:11', '0000-00-00 00:00:00'),
('26', 'Your Project Will Always Be Priority', '2026-03-15 03:23:11', '0000-00-00 00:00:00'),
('26', 'Fast Support & Quick Updates', '2026-03-15 03:23:11', '0000-00-00 00:00:00'),
('26', '12 Months Premium Support', '2026-03-15 03:23:11', '0000-00-00 00:00:00'),
('26', '<strong>Note: </strong>Final project price will be confirmed after discussion and requirements.', '2026-03-15 03:23:11', '0000-00-00 00:00:00'),
('27', 'Web Application Development', '2026-03-16 14:46:44', '0000-00-00 00:00:00'),
('27', 'High Performance & Secure Development', '2026-03-16 14:46:44', '0000-00-00 00:00:00'),
('27', 'SEO Friendly Website Structure', '2026-03-16 14:46:44', '0000-00-00 00:00:00'),
('27', '100% Responsive & Mobile Friendly Design', '2026-03-16 14:46:44', '0000-00-00 00:00:00'),
('27', 'Design with: HTML, CSS, JavaScript, Bootstrap, TailwindCSS, React', '2026-03-16 14:46:44', '0000-00-00 00:00:00'),
('27', 'Development with: CodeIgniter, Laravel, PHP', '2026-03-16 14:46:44', '0000-00-00 00:00:00'),
('27', 'Remote / Online / Physical Work Available', '2026-03-16 14:46:44', '0000-00-00 00:00:00'),
('27', 'Weekend Work Available', '2026-03-16 14:46:44', '0000-00-00 00:00:00'),
('27', 'Your Project Will Always Be Priority', '2026-03-16 14:46:44', '0000-00-00 00:00:00'),
('27', 'Fast Support & Quick Updates', '2026-03-16 14:46:44', '0000-00-00 00:00:00'),
('27', '12 Months Pro Support', '2026-03-16 14:46:44', '0000-00-00 00:00:00'),
('27', 'Free Minor Updates & Improvements', '2026-03-16 14:46:44', '0000-00-00 00:00:00'),
('27', '<strong>Note: </strong>Final project price will be confirmed after discussion and requirements.', '2026-03-16 14:46:44', '0000-00-00 00:00:00');

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
(7, 'J1ULXIIB', 'cjlrjl@gmail.com', '$2y$12$Qa/F6lJwmn6xo3uOS6AhoOINk7n4sYvoNPYGXarE6ItpJotSPXZ5u', 1, '2026-03-17 06:47:31', '2026-03-17 06:47:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_directory`
--

CREATE TABLE `services_directory` (
  `id` int NOT NULL,
  `updated_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `heading` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `projects_count` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `service_icon` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_directory`
--

INSERT INTO `services_directory` (`id`, `updated_date`, `heading`, `description`, `projects_count`, `service_icon`) VALUES
(11, '2026-03-15 03:51:52', 'Website Design', 'Modern, responsive, and mobile-friendly websites designed for a smooth, engaging, and seamless user experience.', 'Web Design', 'uploads/services/d7d630901ab85d84d8535201fdc619b5.png'),
(12, '2026-03-15 03:39:29', 'Web Application Development', 'We develop powerful and scalable web applications with modern technologies, ensuring high performance, security, and smooth user experience.', 'Web Apk', 'uploads/services/90d0114d8d0b4a95704b6b696989dfd8.png'),
(13, '2026-03-16 14:47:50', 'Digital Visiting Card', 'We create smart digital visiting card websites that help professionals and businesses share their contact details, services, and portfolio online.', 'Digital Visiting Card', 'uploads/services/f744ea14e1aa4f6b34bcac7ac893c41c.png'),
(14, '2026-03-15 03:54:29', 'E-commerce Development', 'We build professional e-commerce websites that help businesses sell products online with secure payments, product management, and easy navigation.', 'E-commerce Development', 'uploads/services/2faa8b0ff3adc576a759c1fef1186cee.png'),
(15, '2026-03-15 03:56:19', 'SEO & Digital Marketing', 'We help businesses grow online through SEO optimization, digital marketing strategies, and effective online promotion to increase visibility and reach.', 'SEO & Digital Marketing', 'uploads/services/67acd4c6bcc9dd22e07e594311e391f1.png'),
(16, '2026-03-15 03:57:22', 'School ERP & LMS Development', 'We develop complete School ERP and Learning Management System &#40;LMS&#41; solutions to manage students, teachers, attendance, fees, exams, courses, and online learning on one smart platform for schools and educational institutions.', 'School ERP & LMS', 'uploads/services/a14df5c962134541e87a7f1eae879b51.png');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_directory`
--

CREATE TABLE `testimonial_directory` (
  `id` int NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `client_project_name` varchar(255) DEFAULT NULL,
  `client_review` text NOT NULL,
  `status` enum('pending','approved') DEFAULT 'pending',
  `testimonial_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_directory`
--
ALTER TABLE `about_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_directory`
--
ALTER TABLE `card_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_directory`
--
ALTER TABLE `contact_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_blocks`
--
ALTER TABLE `education_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_items`
--
ALTER TABLE `education_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `block_id` (`block_id`);

--
-- Indexes for table `introduce_directory`
--
ALTER TABLE `introduce_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myskill_directory`
--
ALTER TABLE `myskill_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_projects`
--
ALTER TABLE `portfolio_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing_card`
--
ALTER TABLE `pricing_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_directory`
--
ALTER TABLE `register_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_directory`
--
ALTER TABLE `services_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_directory`
--
ALTER TABLE `testimonial_directory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_directory`
--
ALTER TABLE `about_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card_directory`
--
ALTER TABLE `card_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_directory`
--
ALTER TABLE `contact_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `education_blocks`
--
ALTER TABLE `education_blocks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `education_items`
--
ALTER TABLE `education_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `introduce_directory`
--
ALTER TABLE `introduce_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `myskill_directory`
--
ALTER TABLE `myskill_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `portfolio_projects`
--
ALTER TABLE `portfolio_projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pricing_card`
--
ALTER TABLE `pricing_card`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `register_directory`
--
ALTER TABLE `register_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services_directory`
--
ALTER TABLE `services_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `testimonial_directory`
--
ALTER TABLE `testimonial_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `education_items`
--
ALTER TABLE `education_items`
  ADD CONSTRAINT `education_items_ibfk_1` FOREIGN KEY (`block_id`) REFERENCES `education_blocks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
