-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 03:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

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
  `no_of_days` int(11) NOT NULL DEFAULT 1,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `status_changed_by` int(11) NOT NULL DEFAULT 0,
  `team_lead` int(11) NOT NULL DEFAULT 0,
  `late_apply` tinyint(1) NOT NULL DEFAULT 0,
  `half` int(11) NOT NULL DEFAULT 0,
  `short_leave` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `leave_type_id`, `start_from`, `end_to`, `no_of_days`, `subject`, `description`, `created_at`, `updated_at`, `status`, `status_changed_by`, `team_lead`, `late_apply`, `half`, `short_leave`) VALUES
(1, 1, 1, '05/17/2021', '05/17/2021', 0, 'asdfsadf', 'fdsaafsa', '2021-05-17 02:58:34', '2021-05-19 03:57:46', '1', 0, 10, 0, 0, 0),
(2, 3, 2, '05/22/2021', '05/25/2021', 0, 'cadual subject', 'cadual description', '2021-05-17 04:15:56', '2021-05-17 23:51:55', '0', 0, 6, 0, 0, 0),
(3, 2, 2, '06/08/2021', '06/16/2021', 0, 'cadual subject by demo', 'cadual description by demo', '2021-05-17 04:18:26', '2021-05-17 05:39:12', '1', 0, 6, 0, 0, 0),
(4, 4, 2, '05/21/2021', '05/28/2021', 8, 'Test Subject for Leave by Dummy', 'Test Description for Leave by Dummy', '2021-05-17 08:52:09', '2021-05-17 08:52:09', '2', 0, 6, 0, 0, 0),
(5, 3, 2, '06/08/2021', '06/10/2021', 3, 'cadual subject', 'cadual description', '2021-05-19 04:46:59', '2021-05-21 03:48:24', '1', 0, 9, 0, 0, 0),
(6, 3, 2, '05/27/2021', '05/28/2021', 2, 'test', 'tst', '2021-05-21 01:17:03', '2021-05-21 03:50:50', '0', 0, 9, 0, 0, 0),
(7, 6, 1, '05/22/2021', '05/22/2021', 1, 'Sick Leave', 'Sick Leave Description', '2021-05-21 01:43:16', '2021-05-21 01:43:16', '2', 0, 9, 0, 0, 0),
(12, 7, 2, '05/22/2021', '05/22/2021', 1, 'Cadual Leave for 1 day', 'Its a cadual leave', '2021-05-21 06:00:32', '2021-05-26 07:20:53', '1', 0, 1, 0, 0, 0),
(13, 1, 1, '05/22/2021', '05/23/2021', 2, 'Sick Leave Subject', 'Sick Leave For 2 days', '2021-05-21 06:11:02', '2021-05-21 06:11:02', '2', 0, 10, 0, 0, 0),
(14, 1, 1, '05/22/2021', '05/23/2021', 2, 'Sick Leave Subject', 'Sick Leave For 2 days', '2021-05-21 06:12:22', '2021-05-21 06:12:22', '2', 0, 10, 0, 0, 0),
(15, 7, 1, '05/22/2021', '05/23/2021', 2, 'Sick Leave', 'Sick Leave for 2 days', '2021-05-21 06:13:33', '2021-05-21 06:55:11', '0', 0, 1, 0, 0, 0),
(16, 7, 1, '05/28/2021', '05/29/2021', 2, 'Sick Leave', 'test', '2021-05-21 06:41:04', '2021-05-21 06:55:03', '1', 0, 1, 0, 0, 0),
(17, 7, 2, '05/22/2021', '05/23/2021', 2, 'cadual subject', 'cadual leave description', '2021-05-21 07:56:12', '2021-05-26 07:46:24', '1', 0, 1, 0, 0, 0),
(22, 7, 2, '05/28/2021', '05/29/2021', 2, 'sdfs', 'sdfsdfsdfdsf', '2021-05-27 02:10:05', '2021-05-27 02:10:05', '2', 0, 1, 0, 0, 0),
(23, 7, 1, '06/20/2021', '06/21/2021', 2, 'cadual subject', 'testsdfasdfasdf', '2021-05-27 07:15:11', '2021-05-27 07:15:11', '2', 0, 1, 0, 0, 0),
(24, 7, 1, '05/28/2021', '05/29/2021', 2, 'Sick Leave', 'test description', '2021-05-27 07:21:38', '2021-05-27 07:21:38', '2', 0, 1, 0, 0, 0),
(25, 7, 1, '05/28/2021', '05/28/2021', 0, 'test', 'test decription', '2021-05-28 01:03:46', '2021-05-28 01:03:46', '2', 0, 1, 0, 0, 0),
(26, 7, 1, '05/28/2021', '05/28/2021', 0, 'test', 'test decription', '2021-05-28 01:03:49', '2021-05-28 01:03:49', '2', 0, 1, 0, 0, 0),
(27, 7, 1, '05/28/2021', '05/28/2021', 0, 'test', 'test decription', '2021-05-28 01:03:50', '2021-05-28 01:03:50', '2', 0, 1, 0, 0, 0),
(28, 7, 1, '05/31/2021', '05/31/2021', 1, 'test', 'sdfsdaf', '2021-05-31 04:25:57', '2021-05-31 04:25:57', '2', 0, 1, 0, 0, 0),
(29, 7, 1, '05/31/2021', '05/31/2021', 1, 'cadual subject', 'test', '2021-05-31 06:44:51', '2021-05-31 06:44:51', '2', 0, 1, 0, 0, 0),
(38, 7, 1, '06/01/2021', '06/01/2021', 1, 'Sick Leave', 'sfdsdfsdf', '2021-06-01 05:26:32', '2021-06-01 05:26:32', '2', 0, 1, 1, 1, 0),
(45, 11, 1, '06/16/2021', '06/16/2021', 1, 'test', 'dsfsdfsdfdsf', '2021-06-01 05:46:28', '2021-06-01 05:46:28', '2', 0, 1, 1, 0, 0),
(46, 11, 1, '06/18/2021', '06/18/2021', 1, 'cadual subject', 'sadfasdfasdf', '2021-06-01 05:53:21', '2021-06-01 05:53:21', '2', 0, 1, 0, 0, 0),
(47, 11, 1, '06/02/2021', '06/02/2021', 1, 'test', 'sadfsadf', '2021-06-01 06:15:25', '2021-06-01 06:15:25', '2', 0, 1, 0, 0, 0),
(48, 11, 1, '06/01/2021', '06/01/2021', 1, 'cadual subject', 'sadfsadfdsa', '2021-06-01 06:16:12', '2021-06-01 07:47:38', '1', 10, 1, 1, 0, 0),
(49, 11, 1, '06/11/2021', '06/11/2021', 1, 'Sick Leave', 'tst', '2021-06-01 07:10:41', '2021-06-01 07:10:41', '2', 0, 1, 0, 1, 1),
(50, 11, 1, '06/11/2021', '06/11/2021', 1, 'Sick Leave', 'test description', '2021-06-01 07:53:46', '2021-06-01 07:53:46', '2', 0, 1, 0, 2, 1),
(51, 11, 1, '06/10/2021', '06/10/2021', 1, 'cadual subject', 'xzvczv', '2021-06-01 07:54:53', '2021-06-01 07:54:53', '2', 0, 1, 0, 2, 1),
(52, 7, 2, '07/07/2021', '07/08/2021', 2, 'Cadual Leave Subject', 'Cadual Leave Description', '2021-06-01 08:06:47', '2021-06-01 08:57:09', '0', 1, 1, 0, 0, 0),
(53, 7, 1, '07/07/2021', '07/08/2021', 2, 'Sick Leave Subject', 'Sick Leave Description', '2021-06-01 08:09:30', '2021-06-01 08:55:14', '1', 1, 1, 0, 0, 0),
(54, 7, 1, '07/14/2021', '07/14/2021', 1, 'Sick Leave Subject', 'Sick Leave Description', '2021-06-01 08:11:50', '2021-06-01 08:54:23', '1', 1, 1, 0, 0, 0),
(55, 7, 2, '07/13/2021', '07/13/2021', 1, 'Sick Leave', 'sadfsadf', '2021-06-01 08:13:05', '2021-06-01 08:52:02', '1', 1, 1, 0, 0, 0),
(56, 7, 1, '06/01/2021', '06/01/2021', 1, 'cadual subject', 'asdfasdf', '2021-06-01 08:15:13', '2021-06-01 08:51:33', '1', 1, 1, 1, 0, 0),
(57, 1, 1, '06/03/2021', '06/03/2021', 1, 'test', 'asdfsadf', '2021-06-01 08:39:41', '2021-06-01 08:39:41', '2', 0, 10, 0, 0, 0),
(58, 1, 1, '06/03/2021', '06/03/2021', 1, 'test', 'asdfsadf', '2021-06-01 08:40:45', '2021-06-01 08:48:43', '0', 1, 10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Webiste Development', 'Website Development Description', '2021-05-18 04:26:12', '2021-05-18 05:37:27'),
(2, 'Mobile Development', 'Mobile Development Description', '2021-05-18 04:30:03', '2021-05-18 04:30:03'),
(4, 'Digital Marketing', 'Digital Marketing Description', '2021-05-18 05:19:34', '2021-05-18 05:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `type`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Laravel Developer', 'Laravel Developer Description', '2021-05-18 05:38:59', '2021-05-18 05:38:59');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_categories`
--

INSERT INTO `emp_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Interni', 'Internship', '2021-05-19 07:17:46', '2021-05-19 07:18:10'),
(2, 'Probation', 'Probation', '2021-05-19 07:18:31', '2021-05-19 07:18:31'),
(3, 'Permanent', 'Permanent', '2021-05-19 07:18:43', '2021-05-19 07:18:43');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`, `description`, `leaves_allow`, `created_at`, `updated_at`) VALUES
(1, 'Sick Leave', 'sick leave description', 20, '2021-05-17 05:43:16', '2021-05-19 06:44:58'),
(2, 'Cadual Leave', 'cadual leave description', 20, '2021-05-17 05:41:53', '2021-05-19 06:45:16');

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
(27, '2021_06_01_072114_add_short_leave_to_applications_table', 25);

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
('36181632-20d7-4372-aa1c-3bfa359222ee', 'App\\Notifications\\LeaveApplied', 'App\\Application', 23, '[]', NULL, '2021-05-27 07:15:11', '2021-05-27 07:15:11'),
('87b80ec8-1a34-493e-9f12-0af32b1d50da', 'App\\Notifications\\LeaveApplied', 'App\\Application', 13, '[]', NULL, '2021-05-27 06:51:11', '2021-05-27 06:51:11'),
('fda90a55-ceb8-4f08-8b6f-86416dfb3e04', 'App\\Notifications\\LeaveApplied', 'App\\Application', 24, '[]', NULL, '2021-05-27 07:21:39', '2021-05-27 07:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(32, 'assign_permissions', 'Assign Permissions to Role', 'This allows user to assign permissions to any role.', '2021-05-31 03:06:12', '2021-05-31 03:06:12', 3);

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
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 1),
(9, 3),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(29, 3),
(30, 1),
(30, 3),
(31, 1),
(32, 1);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Administrator', '2021-05-20 01:02:36', '2021-05-20 04:40:17'),
(2, 'employee', 'Employee', 'Regular Employee', '2021-05-20 02:40:40', '2021-05-20 04:40:29'),
(3, 'team_lead', 'Team Lead', 'Regular Employee + Team Lead', '2021-05-20 02:41:03', '2021-05-20 04:40:40');

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
(2, 11, 'App\\User');

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
  `team_lead` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `designation_id`, `department_id`, `emp_category_id`, `team_lead`) VALUES
(1, 'siraj', 'sirajulhaq363@gmail.com', NULL, '$2y$10$pBCSWFGn0fRvYbP8lX9Z7OP3wqEnpX45Ei/VFIK.USruP8N/ahSTK', NULL, '2021-05-07 01:41:55', '2021-05-07 01:41:55', 1, 2, 1, 3, 10),
(2, 'demo', 'demo@gmail.com', NULL, '$2y$10$DxWW/BA4R.z3Vn9ydmV18uotpBmL9fYkEarIKp/GutOgY9RjsNXKG', NULL, '2021-05-17 04:09:48', '2021-05-21 02:41:22', 2, 2, 1, 1, 6),
(3, 'test', 'test@gmail.com', NULL, '$2y$10$c3bSOCGxtiWjSxg/VuE7VOD9tMqS2GbyeAGNeUEM7ZsKH7E9oIUf.', NULL, '2021-05-17 04:12:56', '2021-05-21 02:41:30', 2, 2, 1, 2, 6),
(4, 'dummy', 'dummy@gmail.com', NULL, '$2y$10$GBn4pDJ.NXjyRATjbuG29eyorUhW1nrPWMiwOSkXlXmNnvUqnS8Mi', NULL, '2021-05-17 08:31:05', '2021-05-21 02:41:38', 2, 2, 1, 3, 6),
(5, 'testUser', 'testuser@gmail.com', NULL, '$2y$10$gWjcGqNjrSL9nfhn2C19YODmv4Egj.5YDVFOlU9G82KjyMsXuXTFy', NULL, '2021-05-18 07:28:42', '2021-05-21 02:41:46', 2, 2, 1, 2, 9),
(6, 'user', 'user@gmail.com', NULL, '$2y$10$eD8GLUkHOy/wx6qmdzJIMuBJBeDCGU.1Hygs5yPlrmPQYnzuSwDGm', NULL, '2021-05-19 07:57:44', '2021-05-21 02:41:55', 2, 2, 1, 1, 9),
(7, 'Zoraiz', 'jiranaji384@gmail.com', NULL, '$2y$10$l7McW/uxLDQI/89gtDtTbO7NophaGF60MbLNkh9v9VIiT29sE8sKW', NULL, '2021-05-20 05:49:17', '2021-05-21 05:31:01', 2, 2, 1, 1, 1),
(8, 'Saad', 'saad@gmail.com', NULL, '$2y$10$v3pudCHdPSEA8mmoB1h5rOrkpevrUPZM0lMjPWVGLSPYltw.oqQg.', NULL, '2021-05-20 07:22:29', '2021-05-21 02:42:10', 2, 2, 1, 3, 6),
(9, 'Faisal Ashraf', 'faisal@gmail.com', NULL, '$2y$10$t.SOZU2gsvdxUQBQKR8KIeKEA72Y1qTxpeUqT26KNxiSs7BGdhUOu', NULL, '2021-05-20 07:30:26', '2021-05-21 02:42:19', 2, 2, 1, 3, 6),
(10, 'Admin', 'admin@amcoitsystems.com', NULL, '$2y$10$3sH64Vux2J5ttRh6Z2S21OTohzrONuIpxBaA1y2ZgWiTb8trS.HBa', NULL, '2021-05-21 04:54:21', '2021-05-31 02:41:07', 2, 2, 1, 3, 6),
(11, 'newuser', 'newuser@gmail.com', NULL, '$2y$10$MZXBo3mnQf/igU3RqzwQOOEV6yj8Nt.GSmaWOSLNAHUBUoduPs5j2', NULL, '2021-05-31 06:51:07', '2021-05-31 06:51:07', 2, 2, 1, 3, 1);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_categories`
--
ALTER TABLE `emp_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `permissions_groups`
--
ALTER TABLE `permissions_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
