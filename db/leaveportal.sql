-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 12:48 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leaveportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `start_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_days` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `status_changed_by` int(11) NOT NULL DEFAULT 0,
  `team_lead` int(11) NOT NULL DEFAULT 0,
  `late_apply` tinyint(1) NOT NULL DEFAULT 0,
  `half` int(11) NOT NULL DEFAULT 0,
  `short_leave` tinyint(1) NOT NULL DEFAULT 0,
  `datetime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unpaid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `leave_type_id`, `start_from`, `end_to`, `no_of_days`, `subject`, `description`, `created_at`, `updated_at`, `status`, `status_changed_by`, `team_lead`, `late_apply`, `half`, `short_leave`, `datetime`, `unpaid`) VALUES
(261, 31, 6, '07/07/2021', '07/07/2021', '1', 'Sick Leave', 'Sick Leave Reason', '2021-07-06 07:40:35', '2021-07-06 07:41:20', '1', 30, 30, 0, 0, 0, '06-07-2021 12:40:35 PM', '1'),
(263, 31, 8, '07/08/2021', '07/08/2021', '0.5', 'Annual Leave', 'test', '2021-07-06 10:04:13', '2021-07-07 12:49:20', '0', 10, 30, 0, 2, 1, '06-07-2021 03:04:13 PM', '1'),
(264, 32, 7, '07/09/2021', '07/12/2021', '2', 'Cadual Leave', 'Cadual Leave Reason', '2021-07-07 09:14:49', '2021-07-07 09:19:15', '1', 30, 30, 1, 0, 0, '07-07-2021 02:14:49 PM', '1'),
(265, 32, 7, '07/15/2021', '07/15/2021', '1', 'Cadual Leave', 'cadual leave', '2021-07-07 09:19:58', '2021-07-07 12:23:52', '0', 10, 29, 0, 0, 0, '07-07-2021 02:19:58 PM', '1'),
(266, 31, 7, '07/06/2021', '07/07/2021', '1', 'Cadual Leave', 'cadual leave', '2021-07-07 12:51:34', '2021-07-07 12:51:34', '2', 0, 30, 1, 0, 0, '07-07-2021 05:51:34 PM', '1');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `created_at`, `updated_at`, `active_status`) VALUES
(8, 'Web Development', 'Website Development', '2021-07-06 07:13:45', '2021-07-06 07:13:45', '1'),
(9, 'Mobile Development', 'Mobile Development', '2021-07-06 07:14:04', '2021-07-06 07:14:04', '1'),
(10, 'Blockchain Development', 'Blockchain Development', '2021-07-06 07:14:26', '2021-07-07 06:55:12', '0'),
(11, 'Quality Assurance', 'Quality Assurance', '2021-07-06 07:14:44', '2021-07-06 07:14:44', '1'),
(12, 'Digital Marketing', 'Digital Marketingg', '2021-07-06 07:15:02', '2021-07-06 11:05:19', '1'),
(13, 'Graphics Designing', 'Graphics Designing', '2021-07-06 07:15:27', '2021-07-06 07:15:27', '1');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `type`, `description`, `created_at`, `updated_at`, `active_status`) VALUES
(6, 'Laravel Developer', 'Laravel Developer', '2021-07-06 07:16:07', '2021-07-06 07:16:07', '1'),
(7, '.Net Developer', '.Net Developer', '2021-07-06 07:16:25', '2021-07-07 10:18:29', '1'),
(8, 'Android Developer', 'Android Developer', '2021-07-06 07:16:51', '2021-07-06 07:16:51', '1'),
(9, 'IOS Developer', 'IOS Developer', '2021-07-06 07:17:11', '2021-07-06 07:17:11', '1'),
(10, 'PHP Developer', 'PHp developer', '2021-07-06 11:07:01', '2021-07-06 11:36:57', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_categories`
--

CREATE TABLE `emp_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_categories`
--

INSERT INTO `emp_categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 'Internee', 'Internship', '2021-05-19 07:17:46', '2021-07-05 07:49:23', '1'),
(2, 'Probation', 'Probation', '2021-05-19 07:18:31', '2021-06-25 07:17:23', '1'),
(3, 'Permanent', 'Permanent', '2021-05-19 07:18:43', '2021-07-01 00:02:33', '1'),
(4, 'Traineeee', 'Traineeees', '2021-06-25 07:09:18', '2021-07-07 06:56:14', '0');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

CREATE TABLE `leave_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `leaves_used` int(11) NOT NULL,
  `leaves_balance` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leaves_allow` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`, `description`, `leaves_allow`, `created_at`, `updated_at`, `active_status`) VALUES
(6, 'Sick Leave', 'Sick Leave', 20, '2021-07-06 07:18:08', '2021-07-06 07:18:08', '1'),
(7, 'Cadual Leave', 'Cadual Leave', 20, '2021-07-06 07:18:22', '2021-07-06 07:18:22', '1'),
(8, 'Annual Leave', 'Annual Leave', 20, '2021-07-06 07:19:01', '2021-07-07 05:49:18', '1'),
(9, 'COVID', 'COVID', 20, '2021-07-07 05:50:18', '2021-07-07 11:01:54', '0');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_06_044545_create_departments_table', 2),
(5, '2021_05_06_044702_create_designations_table', 3),
(6, '2021_05_06_044823_create_admins_table', 4),
(7, '2021_05_06_044923_create_leave_types_table', 5),
(8, '2021_05_06_045003_create_applications_table', 6),
(9, '2021_05_06_045048_create_leave_details_table', 7),
(10, '2021_05_06_045139_create_employee_details_table', 8),
(11, '2021_05_10_080036_add_role_to_users_table', 9),
(12, '2021_05_17_080605_add_status_to_applications_table', 10),
(13, '2021_05_17_100220_add_status_changed_by_to_applications_table', 11),
(14, '2021_05_17_133523_change_status_changed_by_column_default_value', 12),
(15, '2021_05_18_111907_add_designation_id_to_users_table', 13),
(16, '2021_05_18_112246_add_department_id_to_users_table', 14),
(17, '2021_05_19_073237_laratrust_setup_tables', 15),
(18, '2021_05_19_115847_create_emp_categories_table', 16),
(19, '2021_05_19_124502_add_emp_category_id_to_users_table', 17),
(20, '2021_05_20_115152_add_team_lead_to_users_table', 18),
(21, '2021_05_21_063800_add_tem_lead_to_applications_table', 19),
(22, '2021_05_27_105516_create_notifications_table', 20),
(23, '2021_05_28_062304_create_permissions_groups_table', 21),
(24, '2021_05_28_063018_add_permissions_group_id_to_permissions_table', 22),
(25, '2021_06_01_060455_add_late_apply_to_applications_table', 23),
(26, '2021_06_01_071744_add_half_to_applications_table', 24),
(27, '2021_06_01_072114_add_short_leave_to_applications_table', 25),
(28, '2021_06_15_102013_add_datetime_to_applications_table', 26),
(29, '2021_06_16_082934_create_userdetail_table', 27),
(30, '2021_06_18_051343_regdate_to_users_table', 28),
(31, '2021_06_18_052656_add_regdate_to_users_table', 29),
(32, '2021_06_18_053739_add_reggdate_to_users_table', 30),
(33, '2021_06_18_054542_add_regdate_to_users_table', 31),
(34, '2021_06_18_062040_add_regdate_to_users_table', 32),
(35, '2021_06_18_070713_add_allowed_leave_to_users_table', 33),
(36, '2021_06_18_070922_add_balance_leave_to_users_table', 34),
(37, '2021_06_18_071059_add_used_leave_to_users_table', 35),
(38, '2021_06_18_071257_add_lq_exp_to_users_table', 36),
(39, '2021_06_18_071421_add_start_lq_to_users_table', 37),
(40, '2021_06_18_071734_add_balance_leave_to_users_table', 38),
(41, '2021_06_18_071857_add_used_leave_to_users_table', 39),
(42, '2021_06_18_075029_add_allowed_leave_to_users_table', 40),
(43, '2021_06_22_093228_add_active_status_to_departments_table', 41),
(44, '2021_06_22_220445_add_active_status_to_designations_table', 42),
(45, '2021_06_24_122806_add_active_status_to_leave_types', 43),
(46, '2021_06_24_130103_add_active_status_to_emp_categories_table', 44),
(47, '2021_06_25_123646_add_active_status_to_users_table', 45),
(48, '2021_07_01_101605_add_unpaid_to_applications_table', 46),
(49, '2021_07_01_110423_add_unpaid_to_applications_table', 47);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0023bd21-1822-493d-af9f-6cc6b83dafc4', 'App\\Notifications\\LeaveApplied', 'App\\Application', 190, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/190\",\"name\":\"demo\",\"useremail\":\"demo@gmail.com\",\"team_lead\":\"user\"}', NULL, '2021-06-18 09:30:13', '2021-06-18 09:30:13'),
('07eb1e65-1c37-4865-a9e3-d2e4f3d70096', 'App\\Notifications\\LeaveApplied', 'App\\Application', 236, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/236\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 09:08:24', '2021-07-01 09:08:24'),
('0a4a1533-43f6-410b-ade9-3c1120742e86', 'App\\Notifications\\LeaveApplied', 'App\\Application', 227, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/227\",\"name\":\"demo\",\"useremail\":\"demo@gmail.com\",\"team_lead\":\"user\"}', NULL, '2021-06-22 12:51:12', '2021-06-22 12:51:12'),
('0c97b208-f3e1-47d1-8b0a-32bece77fd02', 'App\\Notifications\\LeaveApplied', 'App\\Application', 246, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/246\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 10:51:14', '2021-07-01 10:51:14'),
('169f68f9-9687-40c3-8e43-ebad36d2f563', 'App\\Notifications\\LeaveApplied', 'App\\Application', 181, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/181\",\"name\":\"user\",\"useremail\":\"user@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-18 06:39:45', '2021-06-18 06:39:45'),
('23886cbf-ea07-46e2-82c7-2c6ed967f57b', 'App\\Notifications\\LeaveApplied', 'App\\Application', 241, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/241\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 09:35:45', '2021-07-01 09:35:45'),
('23e79684-2bf9-4192-a5e9-1df2e3533b37', 'App\\Notifications\\LeaveApplied', 'App\\Application', 240, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/240\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 09:33:58', '2021-07-01 09:33:58'),
('283b8051-0a99-4e72-9f0a-5b8a893bb5e0', 'App\\Notifications\\LeaveApplied', 'App\\Application', 185, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/185\",\"name\":\"Zoraiz Mudassar\",\"useremail\":\"zoraiz15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-18 06:53:44', '2021-06-18 06:53:44'),
('28d262ad-ad39-4c15-ba1b-a17772d7f00a', 'App\\Notifications\\LeaveApplied', 'App\\Application', 179, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/179\",\"name\":\"demo\",\"useremail\":\"demo@gmail.com\",\"team_lead\":\"user\"}', NULL, '2021-06-17 22:20:19', '2021-06-17 22:20:19'),
('29bf586c-be44-4e2c-867d-a6c24faa4fed', 'App\\Notifications\\LeaveApplied', 'App\\Application', 235, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/235\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 09:01:14', '2021-07-01 09:01:14'),
('2b206422-82b2-4c8b-ad9f-6f58972af65d', 'App\\Notifications\\LeaveApplied', 'App\\Application', 247, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/247\",\"name\":\"Usama\",\"useremail\":\"usama@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-01 11:57:12', '2021-07-01 11:57:12'),
('2f04e871-593c-46f4-9614-d761df8e853a', 'App\\Notifications\\LeaveApplied', 'App\\Application', 233, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/233\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 08:53:55', '2021-07-01 08:53:55'),
('2f2aa2cd-15df-43a0-bd5f-739e2b89500a', 'App\\Notifications\\LeaveApplied', 'App\\Application', 230, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/230\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 06:02:33', '2021-07-01 06:02:33'),
('359d372a-003e-488f-bf89-4fc0930cb205', 'App\\Notifications\\LeaveApplied', 'App\\Application', 254, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/254\",\"name\":\"Usama\",\"useremail\":\"usama@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-05 05:47:26', '2021-07-05 05:47:26'),
('377eafbb-259e-4b54-b6ef-e28ee0024bb7', 'App\\Notifications\\LeaveApplied', 'App\\Application', 244, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/244\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 09:46:50', '2021-07-01 09:46:50'),
('3bc94f00-4d7b-4d52-a012-62de13d73add', 'App\\Notifications\\LeaveApplied', 'App\\Application', 237, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/237\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 09:13:49', '2021-07-01 09:13:49'),
('3ce5adf9-fcb6-4722-bf6e-9f1a7f6aaecd', 'App\\Notifications\\LeaveApplied', 'App\\Application', 231, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/231\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 06:10:16', '2021-07-01 06:10:16'),
('3d67e95a-bdff-400b-9729-af177fb4bd93', 'App\\Notifications\\LeaveApplied', 'App\\Application', 220, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/220\",\"name\":\"TESTER\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-20 19:42:46', '2021-06-20 19:42:46'),
('4b3469d5-5f9e-45af-a16e-573b0b59ad21', 'App\\Notifications\\LeaveApplied', 'App\\Application', 182, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/182\",\"name\":\"user\",\"useremail\":\"user@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-18 06:40:41', '2021-06-18 06:40:41'),
('4c8da1b0-2250-4fe9-8396-8babc1896882', 'App\\Notifications\\LeaveApplied', 'App\\Application', 183, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/183\",\"name\":\"Zoraiz Mudassar\",\"useremail\":\"zoraiz15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-18 06:44:15', '2021-06-18 06:44:15'),
('4cd1fd93-11cc-4365-a227-95f72871a284', 'App\\Notifications\\LeaveApplied', 'App\\Application', 252, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/252\",\"name\":\"Usama\",\"useremail\":\"usama@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-05 05:42:15', '2021-07-05 05:42:15'),
('5ca4a551-2a20-4287-bc32-3e2b8f9f6494', 'App\\Notifications\\LeaveApplied', 'App\\Application', 186, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/186\",\"name\":\"Zoraiz Mudassar\",\"useremail\":\"zoraiz15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-18 06:53:56', '2021-06-18 06:53:56'),
('604b6aca-c524-4448-b96f-4985bf40fc9b', 'App\\Notifications\\LeaveApplied', 'App\\Application', 239, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/239\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 09:30:48', '2021-07-01 09:30:48'),
('6ae3ab1a-37b8-4a93-bc83-5f66567e7aa6', 'App\\Notifications\\LeaveApplied', 'App\\Application', 226, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/226\",\"name\":\"TESTER\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-22 12:44:17', '2021-06-22 12:44:17'),
('6c08e64e-8184-46b5-95c4-c782e3466958', 'App\\Notifications\\LeaveApplied', 'App\\Application', 265, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/265\",\"name\":\"Zoraiz Mudassar\",\"useremail\":\"zoraiz@gmail.com\",\"team_lead\":\"Atif Iqbal\"}', NULL, '2021-07-07 09:19:58', '2021-07-07 09:19:58'),
('710e241a-1292-454d-b4ae-fccd17213468', 'App\\Notifications\\LeaveApplied', 'App\\Application', 222, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/222\",\"name\":\"TESTER\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-21 07:31:18', '2021-06-21 07:31:18'),
('7167b76c-5511-4ef2-81e6-e49437e1a142', 'App\\Notifications\\LeaveApplied', 'App\\Application', 262, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/262\",\"name\":\"Siraj Ul Haq\",\"useremail\":\"sirajulhaq363@gmail.com\",\"team_lead\":\"Maham Zubair\"}', NULL, '2021-07-06 09:33:11', '2021-07-06 09:33:11'),
('71fdf0c2-48a4-432f-92b7-fc64c7dadc9a', 'App\\Notifications\\LeaveApplied', 'App\\Application', 258, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/258\",\"name\":\"Usama\",\"useremail\":\"usama@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-05 06:15:24', '2021-07-05 06:15:24'),
('73f6afbf-41e1-4cc4-be69-69a52b182069', 'App\\Notifications\\LeaveApplied', 'App\\Application', 232, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/232\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 08:42:05', '2021-07-01 08:42:05'),
('7d053d89-0c35-4f17-b6ef-439f8082add2', 'App\\Notifications\\LeaveApplied', 'App\\Application', 238, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/238\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 09:27:20', '2021-07-01 09:27:20'),
('898342a0-a098-4b81-9192-534a146610a9', 'App\\Notifications\\LeaveApplied', 'App\\Application', 180, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/180\",\"name\":\"demo\",\"useremail\":\"demo@gmail.com\",\"team_lead\":\"user\"}', NULL, '2021-06-18 06:38:40', '2021-06-18 06:38:40'),
('9569486d-a3a5-4312-a41c-c2f3b7152eee', 'App\\Notifications\\LeaveApplied', 'App\\Application', 229, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/229\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-25 13:05:14', '2021-06-25 13:05:14'),
('96d53210-4b85-4026-83f2-fd8188865b72', 'App\\Notifications\\LeaveApplied', 'App\\Application', 253, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/253\",\"name\":\"Usama\",\"useremail\":\"usama@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-05 05:46:15', '2021-07-05 05:46:15'),
('98409358-5349-480f-8dc0-9ee0cc40939a', 'App\\Notifications\\LeaveApplied', 'App\\Application', 255, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/255\",\"name\":\"Usama\",\"useremail\":\"usama@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-05 05:48:40', '2021-07-05 05:48:40'),
('9a9a0828-7510-4c5e-830b-7a29853c2e92', 'App\\Notifications\\LeaveApplied', 'App\\Application', 248, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/248\",\"name\":\"Usama\",\"useremail\":\"usama@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-02 12:41:11', '2021-07-02 12:41:11'),
('9c423673-d84d-4f49-afc9-d5b17e5818f3', 'App\\Notifications\\LeaveApplied', 'App\\Application', 251, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/251\",\"name\":\"Usama\",\"useremail\":\"usama@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-05 05:37:39', '2021-07-05 05:37:39'),
('9d478c40-7712-4352-a450-8617e2942d44', 'App\\Notifications\\LeaveApplied', 'App\\Application', 188, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/188\",\"name\":\"Zoraiz Mudassar\",\"useremail\":\"zoraiz15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-18 06:54:17', '2021-06-18 06:54:17'),
('9ea46966-ee1e-4d77-bdfa-057aeb5dde8c', 'App\\Notifications\\LeaveApplied', 'App\\Application', 250, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/250\",\"name\":\"Usama\",\"useremail\":\"usama@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-05 05:34:26', '2021-07-05 05:34:26'),
('a0258b6e-3adb-4aa4-a7d8-03d3f55c12e6', 'App\\Notifications\\LeaveApplied', 'App\\Application', 242, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/242\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 09:37:44', '2021-07-01 09:37:44'),
('a7302106-d3bf-4339-9eae-aa6c64b26773', 'App\\Notifications\\LeaveApplied', 'App\\Application', 261, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/261\",\"name\":\"Siraj Ul Haq\",\"useremail\":\"sirajulhaq363@gmail.com\",\"team_lead\":\"Maham Zubair\"}', NULL, '2021-07-06 07:40:35', '2021-07-06 07:40:35'),
('a919ab39-317b-4bc6-bae8-e9993369b7a8', 'App\\Notifications\\LeaveApplied', 'App\\Application', 249, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/249\",\"name\":\"Usama\",\"useremail\":\"usama@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-05 05:06:05', '2021-07-05 05:06:05'),
('accb3d07-f002-40ce-84cb-e851b5b61eff', 'App\\Notifications\\LeaveApplied', 'App\\Application', 259, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/259\",\"name\":\"Siraj Ul Haq\",\"useremail\":\"sirajulhaq363@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-05 11:53:19', '2021-07-05 11:53:19'),
('afc2f2a9-d135-4dcd-85e1-f614728838d8', 'App\\Notifications\\LeaveApplied', 'App\\Application', 264, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/264\",\"name\":\"Zoraiz Mudassar\",\"useremail\":\"zoraiz@gmail.com\",\"team_lead\":\"Maham Zubair\"}', NULL, '2021-07-07 09:14:50', '2021-07-07 09:14:50'),
('aff844c3-df60-467d-9ecb-712550a7b35b', 'App\\Notifications\\LeaveApplied', 'App\\Application', 256, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/256\",\"name\":\"Usama\",\"useremail\":\"usama@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-05 05:51:38', '2021-07-05 05:51:38'),
('bf0e33a2-4c81-45ee-9aaf-4aa228d8db56', 'App\\Notifications\\LeaveApplied', 'App\\Application', 225, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/225\",\"name\":\"TESTER\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-21 09:53:48', '2021-06-21 09:53:48'),
('c200b284-27ee-428d-8436-90d0d20e5bde', 'App\\Notifications\\LeaveApplied', 'App\\Application', 184, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/184\",\"name\":\"Zoraiz Mudassar\",\"useremail\":\"zoraiz15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-18 06:44:45', '2021-06-18 06:44:45'),
('c38c7847-365e-4cc6-befe-c53af79d8a1b', 'App\\Notifications\\LeaveApplied', 'App\\Application', 187, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/187\",\"name\":\"Zoraiz Mudassar\",\"useremail\":\"zoraiz15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-18 06:54:07', '2021-06-18 06:54:07'),
('c6b54e5a-6adc-4974-904f-ff3882314f7e', 'App\\Notifications\\LeaveApplied', 'App\\Application', 263, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/263\",\"name\":\"Siraj Ul Haq\",\"useremail\":\"sirajulhaq363@gmail.com\",\"team_lead\":\"Maham Zubair\"}', NULL, '2021-07-06 10:04:13', '2021-07-06 10:04:13'),
('c8197f2b-3c93-4c60-8e3f-433221119584', 'App\\Notifications\\LeaveApplied', 'App\\Application', 266, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/266\",\"name\":\"Siraj Ul Haq\",\"useremail\":\"sirajulhaq363@gmail.com\",\"team_lead\":\"Maham Zubair\"}', NULL, '2021-07-07 12:51:35', '2021-07-07 12:51:35'),
('c88c5878-b84e-4cee-a883-dee766d13322', 'App\\Notifications\\LeaveApplied', 'App\\Application', 221, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/221\",\"name\":\"TESTER\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-21 01:46:29', '2021-06-21 01:46:29'),
('e43f951b-ec74-40d5-b305-13ca7cb949d9', 'App\\Notifications\\LeaveApplied', 'App\\Application', 260, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/260\",\"name\":\"M. Ahmed\",\"useremail\":\"ahmed@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-05 12:21:40', '2021-07-05 12:21:40'),
('ebe9848f-14db-4084-8b18-698e2cb9ae8b', 'App\\Notifications\\LeaveApplied', 'App\\Application', 243, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/243\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 09:41:09', '2021-07-01 09:41:09'),
('ee81e409-4ad5-45e2-9e2c-f38e211a0023', 'App\\Notifications\\LeaveApplied', 'App\\Application', 245, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/245\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 10:31:07', '2021-07-01 10:31:07'),
('efb11aa6-9d6f-4306-a7ca-47098a8b45c9', 'App\\Notifications\\LeaveApplied', 'App\\Application', 228, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/228\",\"name\":\"TESTER\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-23 10:21:35', '2021-06-23 10:21:35'),
('f18a9b43-177b-40c6-bcd1-eb877d09a9f6', 'App\\Notifications\\LeaveApplied', 'App\\Application', 234, '{\"url\":\"http:\\/\\/localhost\\/Leave-Portal\\/public\\/applications\\/view\\/234\",\"name\":\"TEST\",\"useremail\":\"tester15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-07-01 08:57:17', '2021-07-01 08:57:17'),
('ff025f23-1707-48ab-a25c-ea9909b4e717', 'App\\Notifications\\LeaveApplied', 'App\\Application', 257, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/257\",\"name\":\"Usama\",\"useremail\":\"usama@gmail.com\",\"team_lead\":\"Admin\"}', NULL, '2021-07-05 06:14:03', '2021-07-05 06:14:03'),
('ffc518d0-89f2-4e19-b0e9-778049868c1c', 'App\\Notifications\\LeaveApplied', 'App\\Application', 189, '{\"url\":\"http:\\/\\/localhost\\/leaveportal\\/public\\/applications\\/view\\/189\",\"name\":\"Zoraiz Mudassar\",\"useremail\":\"zoraiz15@gmail.com\",\"team_lead\":\"Faisal Ashraf\"}', NULL, '2021-06-18 06:54:29', '2021-06-18 06:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user@gmail.com', '$2y$10$SzC2mhVrLhRttjbwVRbtHeuSXBcPr803A4atHG.HImWc18XPKydAu', '2021-06-04 05:13:25'),
('admin@amcoitsystems.com', '$2y$10$lqciuMxBUFAsmuJ3jFLOGu5X8raVZHJaATx2e09gsQvHeQOT2VUjC', '2021-06-10 07:53:09'),
('demo@gmail.com', '$2y$10$sP.rGIU74EvcSkjF5ph/veFj0LxntBArAQijV3QQDw6LulDtEI066', '2021-06-15 07:42:58'),
('Siraaj@gmail.com', '$2y$10$w.KJXW8mPDIzb61NBif/Qej7Uh1V5QMi3KfO/L6a7Uev8vuuIMlXa', '2021-06-15 07:44:06'),
('sirajulhaq363@gmail.com', '$2y$10$LhcZ9.igVIRMvVquDUuyFuwfq6doCSsek0i9hogKVw6dwthx1RS8a', '2021-07-07 03:00:17'),
('zoraiz@gmail.com', '$2y$10$bbv6GyaPqrABYimSFQlERee1efRvHSvCUEwjgN890AgYib7HF.zgO', '2021-07-12 02:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permissions_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`, `permissions_group_id`) VALUES
(1, 'accept_application', 'Accept Application', 'This allows user to accept any Application', '2021-05-20 00:43:53', '2021-05-28 05:58:04', 9),
(2, 'add_employee', 'Add Employee', 'This allows user to add a new Employee', '2021-05-20 02:44:17', '2021-05-28 05:56:20', 8),
(3, 'add_leave_type', 'Add Leave Type', 'This allows user to add a new Leave Type', '2021-05-20 02:45:36', '2021-05-28 05:55:30', 6),
(5, 'add_department', 'Add Department', 'This allows user to add a new Department', '2021-05-20 05:03:49', '2021-05-28 08:01:44', 1),
(6, 'add_designation', 'Add Designation', 'This permission allows user to add New Designation', '2021-05-20 05:04:06', '2021-05-28 05:42:40', 2),
(7, 'apply_application', 'Apply Application', 'Apply Applications', '2021-05-20 05:07:20', '2021-05-28 07:59:08', 9),
(8, 'reject_application', 'Reject Application', 'This permission is to reject any application', '2021-05-28 07:57:48', '2021-05-28 07:57:48', 9),
(9, 'update_application', 'Update Application', 'This permission is to update any application.', '2021-05-28 07:59:32', '2021-05-28 07:59:32', 9),
(10, 'active_inactive_department', 'Active/Inactive Department', 'This permission is to active/inactive any Department.', '2021-05-28 08:01:03', '2021-05-31 00:30:28', 1),
(11, 'update_department', 'Update Department', 'This permission allows user to update any department.', '2021-05-28 08:02:40', '2021-05-31 00:30:11', 1),
(12, 'view_department', 'View Department', 'This allows user to view any department.', '2021-05-28 08:04:15', '2021-05-31 00:29:57', 1),
(13, 'update_designation', 'Update Designation', 'This allows user to update any designation.', '2021-05-28 08:05:04', '2021-05-28 08:05:04', 2),
(14, 'active_inactive_designation', 'Active/Inactive Designation', 'This allows user to active/inactive any designation.', '2021-05-28 08:11:57', '2021-05-28 08:11:57', 2),
(15, 'view_designation', 'View Designation', 'This allows user to view any designation.', '2021-05-28 08:12:41', '2021-05-28 08:12:41', 2),
(16, 'add_role', 'Add Role', 'This allows user to add new role.', '2021-05-28 08:18:16', '2021-05-28 08:18:16', 3),
(17, 'update_role', 'Update Role', 'This allows to update any role.', '2021-05-28 08:18:40', '2021-05-28 08:18:40', 3),
(18, 'active_inactive_role', 'Active/Inactive Role', 'This allows user to active/inactive any role.', '2021-05-28 08:19:11', '2021-05-28 08:19:11', 3),
(19, 'view_role', 'View Role', 'This allows user to view any role.', '2021-05-28 08:19:38', '2021-05-28 08:19:38', 3),
(20, 'update_leave_type', 'Update Leave Type', 'This allows user to update any leave type.', '2021-05-28 08:20:49', '2021-05-28 08:20:49', 6),
(21, 'active_inactive_leave_type', 'Active/Inactive Leave Type', 'This allows user to active/inactive any leave type.', '2021-05-28 08:21:20', '2021-05-28 08:21:20', 6),
(22, 'view_leave_type', 'View Leave Type', 'This allows user to view any leave type.', '2021-05-28 08:21:46', '2021-05-28 08:21:46', 6),
(23, 'add_employee_category', 'Add Employee Category', 'This allows user to add new Category.', '2021-05-28 08:22:28', '2021-05-28 08:22:28', 7),
(24, 'update_category', 'Update Category', 'This allows user to update any category.', '2021-05-28 08:22:53', '2021-05-28 08:22:53', 7),
(25, 'active_inactive_employee_category', 'Active/Inactive Employee Category', 'This allows user to active/inactive any employee category.', '2021-05-28 08:23:32', '2021-05-28 08:23:32', 7),
(26, 'view_employee_category', 'View Employee Category', 'This allows user to view any employee category.', '2021-05-28 08:24:12', '2021-05-28 08:24:12', 7),
(27, 'update_employee', 'Update Employee', 'This allows user to update any employee.', '2021-05-28 08:25:03', '2021-05-28 08:25:03', 8),
(28, 'active_inactive_employee', 'Active/Inactive Employee', 'This allows user to active/inactive employee.', '2021-05-28 08:25:33', '2021-05-28 08:25:33', 8),
(29, 'view_employee', 'View Employee', 'This allows user to view any employee.', '2021-05-28 08:26:03', '2021-05-28 08:26:03', 8),
(30, 'view_application', 'View Application', 'This allows user to view all applications applied by employee', '2021-05-31 00:55:03', '2021-05-31 00:55:03', 9),
(31, 'assign_roles', 'Assign Roles to Employee', 'This allows user to assign roles to employee.', '2021-05-31 02:36:41', '2021-05-31 02:36:41', 8),
(32, 'assign_permissions', 'Assign Permissions to Role', 'This allows user to assign permissions to any role.', '2021-05-31 03:06:12', '2021-05-31 03:06:12', 3),
(33, 'update_password', 'Update Password', 'Change Password', '2021-06-11 01:56:41', '2021-06-11 01:56:41', 8),
(34, 'update_leave_quota', 'Update Leave Quota', 'This allows user to update leave quota against permanent Employee', '2021-07-06 05:49:46', '2021-07-06 05:49:46', 8);

-- --------------------------------------------------------

--
-- Table structure for table `permissions_groups`
--

CREATE TABLE `permissions_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions_groups`
--

INSERT INTO `permissions_groups` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'Departments', 'Departments', '2021-05-28 02:07:02', '2021-05-28 07:55:17'),
(2, 'Designations', 'Designations', '2021-05-28 02:07:45', '2021-05-28 07:55:07'),
(3, 'Roles', 'Roles', '2021-05-28 02:08:01', '2021-05-28 07:54:58'),
(6, 'Leave Types', 'Leave Types', '2021-05-28 02:08:54', '2021-05-28 07:54:22'),
(7, 'Employee Categories', 'Employee Categories', '2021-05-28 02:09:23', '2021-05-28 07:54:09'),
(8, 'Employee', 'Employee', '2021-05-28 02:09:37', '2021-05-28 07:53:53'),
(9, 'Applications', 'Applications', '2021-05-28 02:10:02', '2021-05-28 07:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 3),
(9, 1),
(9, 3),
(10, 1),
(11, 1),
(12, 1),
(12, 7),
(13, 1),
(14, 1),
(15, 1),
(15, 7),
(16, 1),
(17, 1),
(18, 1),
(18, 7),
(19, 1),
(19, 7),
(20, 1),
(21, 1),
(22, 1),
(22, 7),
(23, 1),
(24, 1),
(25, 1),
(25, 7),
(26, 1),
(26, 7),
(27, 1),
(28, 1),
(29, 1),
(29, 3),
(30, 1),
(30, 3),
(31, 1),
(32, 1),
(33, 1),
(34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 'admin', 'admin', 'Administrator', '2021-05-20 01:02:36', '2021-06-02 06:49:27', 1),
(2, 'employee', 'Employee', 'Regular Employee', '2021-05-20 02:40:40', '2021-05-20 04:40:29', 1),
(3, 'team_lead', 'Team Lead', 'Regular Employee + Team Lead', '2021-05-20 02:41:03', '2021-05-20 04:40:40', 1),
(7, 'Departments Play', 'Departments Play', 'This role allows user to access all permissions regarding to departments module!', '2021-07-08 10:19:19', '2021-07-09 07:56:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(2, 1, 'App\\User'),
(3, 1, 'App\\User'),
(2, 2, 'App\\User'),
(2, 3, 'App\\User'),
(2, 4, 'App\\User'),
(2, 5, 'App\\User'),
(2, 6, 'App\\User'),
(3, 6, 'App\\User'),
(2, 7, 'App\\User'),
(2, 8, 'App\\User'),
(2, 9, 'App\\User'),
(3, 9, 'App\\User'),
(1, 10, 'App\\User'),
(2, 10, 'App\\User'),
(3, 10, 'App\\User'),
(2, 11, 'App\\User'),
(2, 12, 'App\\User'),
(2, 13, 'App\\User'),
(2, 14, 'App\\User'),
(2, 15, 'App\\User'),
(2, 16, 'App\\User'),
(2, 17, 'App\\User'),
(2, 18, 'App\\User'),
(2, 19, 'App\\User'),
(2, 20, 'App\\User'),
(2, 21, 'App\\User'),
(2, 22, 'App\\User'),
(2, 23, 'App\\User'),
(2, 24, 'App\\User'),
(2, 25, 'App\\User'),
(2, 26, 'App\\User'),
(2, 27, 'App\\User'),
(2, 28, 'App\\User'),
(2, 29, 'App\\User'),
(3, 29, 'App\\User'),
(2, 30, 'App\\User'),
(3, 30, 'App\\User'),
(2, 31, 'App\\User'),
(2, 32, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `notify_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`id`, `user_id`, `notify_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2021-06-16 09:54:20', '2021-06-16 09:54:20'),
(2, 2, 2, '2021-06-16 09:55:11', '2021-06-16 09:55:11'),
(3, 2, 2, '2021-06-16 09:56:01', '2021-06-16 09:56:01'),
(4, 2, 2, '2021-06-16 10:54:38', '2021-06-16 10:54:38'),
(5, 2, 2, '2021-06-16 18:31:44', '2021-06-16 18:31:44'),
(6, 2, 2, '2021-06-16 18:51:47', '2021-06-16 18:51:47'),
(7, 2, 2, '2021-06-16 19:00:55', '2021-06-16 19:00:55'),
(8, 2, 2, '2021-06-16 19:01:51', '2021-06-16 19:01:51'),
(9, 2, 2, '2021-06-16 19:02:32', '2021-06-16 19:02:32'),
(10, 2, 2, '2021-06-17 04:38:47', '2021-06-17 04:38:47'),
(11, 2, 2, '2021-06-17 04:57:28', '2021-06-17 04:57:28'),
(12, 2, 2, '2021-06-17 05:20:22', '2021-06-17 05:20:22'),
(13, 2, 2, '2021-06-17 06:48:06', '2021-06-17 06:48:06'),
(14, 2, 2, '2021-06-17 06:49:01', '2021-06-17 06:49:01'),
(15, 2, 2, '2021-06-17 08:07:56', '2021-06-17 08:07:56'),
(16, 2, 2, '2021-06-17 10:17:03', '2021-06-17 10:17:03'),
(17, 2, 2, '2021-06-17 22:12:08', '2021-06-17 22:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `emp_category_id` int(11) NOT NULL,
  `team_lead` int(11) NOT NULL DEFAULT 0,
  `lq_exp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_lq` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_leave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `used_leave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `allowed_leave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '20',
  `active_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `designation_id`, `department_id`, `emp_category_id`, `team_lead`, `lq_exp`, `start_lq`, `balance_leave`, `used_leave`, `allowed_leave`, `active_status`) VALUES
(10, 'Admin', 'admin@amcoitsystems.com', NULL, '$2y$10$3sH64Vux2J5ttRh6Z2S21OTohzrONuIpxBaA1y2ZgWiTb8trS.HBa', NULL, '2021-05-21 04:54:21', '2021-07-12 07:57:06', 2, 2, 1, 3, 6, '31-12-2021', '01-01-2021', '20', '0', '20', '1'),
(29, 'Atif Iqbal', 'atif@gmail.com', NULL, '$2y$10$RJve9Vvjqjkxa9sWB.CdY.9Pi0PYXopSFzAsPJnokUDbLXwgDyVqW', NULL, '2018-07-19 19:00:00', '2021-07-12 07:57:06', 2, 6, 8, 3, 10, '31-12-2021', '01-01-2021', '20', '0', '20', '1'),
(30, 'Maham Zubair', 'maham@gmail.com', NULL, '$2y$10$nbfZsXKOczuZUv7KKXTrKOXYF4a4RlgJkNp.pW/UQ9ML1Za3flXJm', NULL, '2020-06-10 19:00:00', '2021-07-12 07:57:06', 2, 6, 8, 3, 29, '31-12-2021', '01-01-2021', '20', '0', '20', '1'),
(31, 'Siraj Ul Haq', 'sirajulhaq363@gmail.com', NULL, '$2y$10$emthyu2LYUvwR2SVX4bqueAYip73OY9zrqu91GBApVwB/VHzH4Sty', NULL, '2021-04-11 19:00:00', '2021-07-12 07:57:06', 2, 6, 8, 3, 30, '31-12-2021', '01-01-2021', '20', '0', '20', '1'),
(32, 'Zoraiz Mudassar', 'zoraiz@gmail.com', NULL, '$2y$10$VCEv2fy9.s3zFwWVuzYiOen3gd9TibRCjfPecjwtuvH/u5BJPkgj2', 'EzdsoQGBBS8jH3WDConckS2zcFpEi2dmUR8ZO7YDlIZ3QpaJvJLWkQfroGxa', '2021-04-05 19:00:00', '2021-07-12 09:46:07', 2, 6, 8, 2, 29, '31-12-2021', '06-04-2021', '0', '0', '0', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_categories`
--
ALTER TABLE `emp_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_details`
--
ALTER TABLE `leave_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permissions_groups`
--
ALTER TABLE `permissions_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_categories`
--
ALTER TABLE `emp_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_details`
--
ALTER TABLE `leave_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `permissions_groups`
--
ALTER TABLE `permissions_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userdetail`
--
ALTER TABLE `userdetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
