-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 08:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `attendence_date` date NOT NULL,
  `attendence_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `class_id`, `teacher_id`, `student_id`, `attendence_date`, `attendence_status`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 1, '2024-04-07', 1, '2024-04-07 00:52:16', '2024-04-07 00:52:16'),
(2, 4, 2, 2, '2024-04-07', 1, '2024-04-07 01:18:06', '2024-04-07 01:18:06'),
(3, 4, 2, 5, '2024-04-07', 0, '2024-04-07 01:18:06', '2024-04-07 01:18:06'),
(4, 4, 2, 14, '2024-04-07', 1, '2024-04-07 01:18:06', '2024-04-07 01:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `class_numeric` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `teacher_id`, `class_numeric`, `class_name`, `class_description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'B.Tech IT Sem-8', 'B.Tech IT', NULL, '2024-04-06 05:08:37'),
(2, 4, 1, 'B.Tech CE Sem 8', 'Class A', '2024-03-30 03:42:35', '2024-04-07 00:47:35'),
(3, 3, 4, 'B.Com Sem 4', 'Class A', '2024-03-30 04:07:47', '2024-04-06 05:01:34'),
(4, 2, 6, 'IMBA Sem 6', 'Class A', '2024-03-30 04:27:08', '2024-04-07 00:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `grade_subject`
--

CREATE TABLE `grade_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_subject`
--

INSERT INTO `grade_subject` (`id`, `grade_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(3, 3, 2, NULL, NULL),
(7, 4, 2, NULL, NULL),
(10, 1, 4, NULL, NULL),
(11, 1, 3, NULL, NULL),
(12, 2, 4, NULL, NULL),
(13, 4, 5, NULL, NULL),
(14, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_14_114748_create_permission_tables', 1),
(4, '2019_05_15_180937_create_students_table', 1),
(5, '2019_05_15_181154_create_parents_table', 1),
(6, '2019_05_15_181254_create_teachers_table', 1),
(7, '2019_05_15_181552_create_grades_table', 1),
(8, '2019_05_16_174745_create_subjects_table', 1),
(9, '2019_05_16_175620_create_grade_subject_table', 1),
(10, '2019_05_17_133226_create_attendances_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 5),
(2, 'App\\User', 8),
(2, 'App\\User', 9),
(2, 'App\\User', 12),
(3, 'App\\User', 3),
(3, 'App\\User', 6),
(3, 'App\\User', 10),
(3, 'App\\User', 14),
(3, 'App\\User', 18),
(3, 'App\\User', 19),
(3, 'App\\User', 21),
(3, 'App\\User', 22),
(3, 'App\\User', 23),
(3, 'App\\User', 24),
(4, 'App\\User', 7),
(4, 'App\\User', 11),
(4, 'App\\User', 13),
(4, 'App\\User', 26),
(4, 'App\\User', 28),
(4, 'App\\User', 29),
(4, 'App\\User', 30),
(4, 'App\\User', 31),
(4, 'App\\User', 35),
(4, 'App\\User', 36);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phone` varchar(255) NOT NULL,
  `current_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `user_id`, `gender`, `phone`, `current_address`, `permanent_address`, `created_at`, `updated_at`) VALUES
(1, 3, 'male', '9123452821', 'Paldi', 'Paldi', '2024-03-29 10:31:06', '2024-04-06 03:00:40'),
(2, 6, 'female', '9408188387', 'valsad', 'valsad', '2024-03-30 03:45:09', '2024-03-30 03:45:09'),
(3, 10, 'male', '9099812121', 'motabazar', 'valsad', '2024-03-30 04:45:50', '2024-03-30 04:45:50'),
(4, 14, 'male', '6389412222', 'Sashtrinagar', 'Sashtrinagar', '2024-04-06 04:09:23', '2024-04-06 04:35:35'),
(8, 18, 'male', '9427861588', 'South Bopal', 'South Bopal', '2024-04-06 04:18:29', '2024-04-06 04:18:29'),
(9, 19, 'male', '9534741258', 'Akhbarnagar', 'Akhbarnagar', '2024-04-06 04:19:29', '2024-04-06 04:19:29'),
(11, 21, 'male', '9814862555', 'Unjha', 'Unjha', '2024-04-06 04:21:54', '2024-04-06 04:21:54'),
(12, 22, 'male', '9658574123', 'Valsad', 'Valsad', '2024-04-06 04:22:52', '2024-04-06 04:22:52'),
(13, 23, 'male', '9874566322', 'Unjha', 'Unjha', '2024-04-06 04:23:42', '2024-04-06 04:23:42'),
(14, 24, 'male', '9844786318', 'Keri Market', 'Keri Market', '2024-04-06 04:29:14', '2024-04-06 04:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Teacher', 'web', '2024-04-06 03:21:40', '2024-04-06 03:21:40'),
(2, 'Student', 'web', '2024-04-06 03:24:52', '2024-04-06 04:02:08'),
(3, 'Parent', 'web', '2024-04-06 04:02:34', '2024-04-06 04:02:34'),
(4, 'Admin', 'web', '2024-04-06 04:04:28', '2024-04-06 04:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-03-29 10:31:05', '2024-03-29 10:31:05'),
(2, 'Teacher', 'web', '2024-03-29 10:31:05', '2024-03-29 10:31:05'),
(3, 'Parent', 'web', '2024-03-29 10:31:05', '2024-03-29 10:31:05'),
(4, 'Student', 'web', '2024-03-29 10:31:05', '2024-03-29 10:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 4),
(3, 3),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `roll_number` bigint(20) UNSIGNED NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dateofbirth` date NOT NULL,
  `current_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `parent_id`, `class_id`, `roll_number`, `gender`, `phone`, `dateofbirth`, `current_address`, `permanent_address`, `created_at`, `updated_at`) VALUES
(2, 7, 9, 4, 27, 'male', '6352702569', '2003-01-27', 'Ahmedabad', 'Ahmedabad', '2024-03-30 03:58:36', '2024-04-06 05:13:27'),
(3, 11, 12, 2, 24, 'male', '7284047216', '2001-11-24', 'Delhi', 'Delhi', '2024-03-30 04:50:48', '2024-04-06 04:44:19'),
(4, 13, 8, 1, 138, 'male', '9099809060', '2002-04-29', 'Saral Residency', 'Saral Residency', '2024-04-06 03:13:19', '2024-04-06 05:13:14'),
(5, 26, 11, 4, 25, 'male', '8401071007', '2002-09-25', 'RC Technical University', 'RC Technical University', '2024-04-06 04:46:33', '2024-04-06 05:12:31'),
(7, 28, 14, 3, 18, 'male', '6359968688', '2002-04-18', 'Keri Market', 'Keri Market', '2024-04-07 00:22:58', '2024-04-07 00:22:58'),
(8, 29, 13, 3, 27, 'male', '8401014489', '2002-01-27', 'Unjha', 'Unjha', '2024-04-07 00:24:19', '2024-04-07 00:25:08'),
(9, 30, 4, 1, 18, 'male', '9412589633', '2002-05-18', 'Shastrinagar', 'Shastrinagar', '2024-04-07 00:30:55', '2024-04-07 00:30:55'),
(10, 31, 1, 1, 3, 'male', '9653265999', '2001-10-03', 'New Gota', 'New Gota', '2024-04-07 00:32:16', '2024-04-07 00:32:16'),
(14, 35, 8, 4, 15, 'male', '9865774412', '2002-10-15', 'Valsad', 'Valsad', '2024-04-07 00:39:11', '2024-04-07 00:39:11'),
(15, 36, 3, 2, 28, 'male', '9099812121', '2001-07-28', 'Ahmedabad', 'Valsad', '2024-04-07 01:04:03', '2024-04-07 01:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subject_code` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `slug`, `subject_code`, `teacher_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Advance Java', 'advance-java', 1, 4, 'Advance Java', '2024-03-30 03:43:17', '2024-04-07 01:13:46'),
(2, 'Accounts', 'accounts', 2, 2, 'Accounts', '2024-03-30 04:09:10', '2024-04-07 01:14:00'),
(3, 'Software Engineering', 'software-engineering', 1, 1, 'Software Engineering', '2024-03-30 04:13:13', '2024-04-06 05:16:05'),
(4, 'Final Year Project', 'final-year-project', 3, 4, 'Final Year Project', '2024-03-30 04:24:21', '2024-04-06 05:15:02'),
(5, 'International Business Management', 'international-business-management', 4, 5, 'International Business Management', '2024-04-06 02:58:53', '2024-04-06 05:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dateofbirth` date NOT NULL,
  `current_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `gender`, `phone`, `dateofbirth`, `current_address`, `permanent_address`, `created_at`, `updated_at`) VALUES
(1, 2, 'male', '9120118832', '1993-04-11', 'Himalayan City', 'Himalayan City', '2024-03-29 10:31:06', '2024-04-06 05:09:54'),
(2, 5, 'male', '9099812121', '2001-07-28', 'ahmd', 'ahmd', '2024-03-30 03:41:53', '2024-04-06 05:07:26'),
(3, 8, 'female', '0909981212', '2001-07-28', 'ahmd', 'ahmd', '2024-03-30 04:04:49', '2024-04-06 05:06:33'),
(4, 9, 'male', '9099812121', '2001-07-28', 'naroda', 'naroda', '2024-03-30 04:23:19', '2024-04-06 05:20:52'),
(5, 12, 'female', '9874566321', '1975-06-20', 'Railway Colony', 'Railway Colony', '2024-04-06 02:54:30', '2024-04-06 05:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile_picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$aMnkY7SrAksMTzpZpn1L8.BxHvRkPwMPl9Oorh4VF2K6JXf7PXEm2', 'admin-1.jpg', NULL, '2024-03-29 10:31:05', '2024-03-29 10:36:48'),
(2, 'Sidhu Moosewala (B.Tech CE Sem-6)', 'sidhu@gmail.com', NULL, '$2y$10$TQCunCvqjZFu6N0amyrEQeoEwb76pBTFujBCZYu3DGe1L7IF1TTki', 'sidhu-moosewala-btech-ce-sem-6-2.jpg', NULL, '2024-03-29 10:31:06', '2024-04-06 05:09:54'),
(3, 'Hilriya', 'hilriya@gmail.com', NULL, '$2y$10$Gv2JZtKJmNhhex98DOHOSOm4W6SYODFM8OERWz5OKJt9UhzfSsPCW', 'avatar.png', NULL, '2024-03-29 10:31:06', '2024-04-06 03:00:40'),
(5, 'Elvish Yadav (Btech IT-8)', 'elvish@gmail.com', NULL, '$2y$10$G8pI2T40km5q58XrpvEjf.jGBVUEsLeBQCjlxljCYnus0zZX1VhTm', 'riyank-science-teacher-5.jpg', NULL, '2024-03-30 03:41:53', '2024-04-06 05:07:26'),
(6, 'Krutiben', 'kruti@gmail.com', NULL, '$2y$10$wEQqeTmV5qUSNJmMDF2uhOEY0KuXusey541Jzrac9p3G64gjuXjvC', 'krutiben-6.jpeg', NULL, '2024-03-30 03:45:09', '2024-03-30 03:45:09'),
(7, 'Ravi Purohit', 'ravi@gmail.com', NULL, '$2y$10$a4z0MdwBdwHdiUQPYzw/nemKVXdwjpTFZTaZHE7eyLvWjBYWBDB9.', 'riyank-10th-7.jpg', NULL, '2024-03-30 03:58:36', '2024-04-06 05:13:27'),
(8, 'Rutu Kothari (Bcom-4)', 'rutu@gmail.com', NULL, '$2y$10$alFqtwFgw0Y7iA40NwjJ2.MvFHiRaI.avZ0r3UAMtr.fQpS0a7QZq', 'riyank-social-science-8.jpg', NULL, '2024-03-30 04:04:49', '2024-04-06 05:06:33'),
(9, 'Ajay Gudiya (B.Tech CE-8)', 'ajay@gmail.com', NULL, '$2y$10$uh6ZKAAs59znzqyKRABE6uWQU9fvqJBg8X9jgzd31M3K0EIg5OE0i', 'arif-pathan-9.jpg', NULL, '2024-03-30 04:23:19', '2024-04-06 05:20:52'),
(10, 'Jineshbhai', 'jinesh@gmail.com', NULL, '$2y$10$0UO1rP51C.mTGFuhRmGgC.VNMPGnHhuAcU2KrqW/RBVrFpPbZkdGq', 'jineshbhai-10.png', NULL, '2024-03-30 04:45:50', '2024-03-30 04:45:50'),
(11, 'Shreyansh Tripathi', 'shreyansh@gmail.com', NULL, '$2y$10$YbYzDSfAoAO3pTkEk9fW6eiE6aMRNkH5JaSGnmY/Xo/vaBU412PGW', 'riya-11.jpg', NULL, '2024-03-30 04:50:47', '2024-04-06 04:44:19'),
(12, 'Sadhna Sharma (IMBA-6)', 'sadhna@gmail.com', NULL, '$2y$10$FfP.rposEhi0.yKCGJMz2uNPBR5vXm8X9F/ORuE15m8mXQTWEK9..', 'sadhna-sharma-12.jpg', NULL, '2024-04-06 02:54:30', '2024-04-06 05:04:13'),
(13, 'Deep Suthar', 'deep.suthar@gmail.com', NULL, '$2y$10$mWOvlK/cxwov/uVJ/l3Xo.vWZNLgnkvcS.DHdge25D3TEbbLxZtz2', 'riyank-shah-13.jpg', NULL, '2024-04-06 03:13:19', '2024-04-06 05:13:14'),
(14, 'Kalpesh Surti', 'kalpesh@gmail.com', NULL, '$2y$10$7XaBQGVNlWspmfvHT5ZH4eFcnEEy9qlfq1DOXuN52nBcphSjsZ.Zu', 'elvishbhai-14.jpg', NULL, '2024-04-06 04:09:23', '2024-04-06 04:35:35'),
(18, 'Kumarpal Shah', 'kumar.shah@gmail.com', NULL, '$2y$10$NMtij.N9gWMPrgba68yUeuCfRMHUzgvz67pS2JG0N.aPBQoIwogJK', 'kumarpal-shah-18.jpg', NULL, '2024-04-06 04:18:29', '2024-04-06 04:18:29'),
(19, 'Jashraj Purohit', 'jashraj@gmail.com', NULL, '$2y$10$YOmjyCAEVsNvSV89Si.7gO8v8VfXDHnoKREzBat3Gq5j14obgNpXq', 'ravi-kumar-19.jpg', NULL, '2024-04-06 04:19:29', '2024-04-06 04:34:44'),
(21, 'Rajubhai Patel', 'raju@gmail.com', NULL, '$2y$10$h.Pbgc/liECInZ87EqmKqOB98IHCmjEXiCoUoLyKej4Nma20Ul/Pq', 'rajubhai-patel-21.jpg', NULL, '2024-04-06 04:21:54', '2024-04-06 04:21:54'),
(22, 'Anilbhai Tripathi', 'anil@gmail.com', NULL, '$2y$10$ZUzyyZWH1IOVqsMvm5Nwaek20BORvNPfrXxgTGf27wDTwVNE96gGm', 'anilbhai-tripathi-22.jpg', NULL, '2024-04-06 04:22:51', '2024-04-06 04:22:51'),
(23, 'Vipul Patel', 'vipul@gmail.com', NULL, '$2y$10$Ow4w6sGqlm0w6MugzX/Ak.FiqgKyYn6PSyFrYxyE1zD8tqsepPO3W', 'vipul-patel-23.jpg', NULL, '2024-04-06 04:23:42', '2024-04-06 04:23:42'),
(24, 'Arun Tripathi', 'arun@gmail.com', NULL, '$2y$10$3pYWUrfYSA8wQFYVRnyYFuoa6F4mjYOWt08qbtcJuJZK.Lalgayhi', 'arun-tripathi-24.jpg', NULL, '2024-04-06 04:29:14', '2024-04-06 04:29:14'),
(26, 'Aerish Patel', 'aerish@gmail.com', NULL, '$2y$10$/y71iMUwRDL0/uuyMd.k2utJbKMmYQZ5zejacU7SzWSYxxc.e3xzi', 'aerish-patel-26.jpg', NULL, '2024-04-06 04:46:33', '2024-04-06 05:12:31'),
(28, 'Pratham Tripathi', 'pratham@gmail.com', NULL, '$2y$10$Zkv5RBiBg3uROTj2pROYBuSJVCaq95nIYvfL5r0R7x4oHF4fUesre', 'pratham-tripathi-28.jpg', NULL, '2024-04-07 00:22:58', '2024-04-07 00:22:58'),
(29, 'Ketul Patel', 'ketul@gmail.com', NULL, '$2y$10$YsAXEURfSs.MXyB.0G26UeiS4.0TI05FYHi0kksWoC9KDbIGCv2FC', 'ketul-patel-29.jpg', NULL, '2024-04-07 00:24:19', '2024-04-07 00:25:08'),
(30, 'Het Surti', 'het@gmail.com', NULL, '$2y$10$1OKDzo56ALLrqFNbUg6mH./AJaQ/oiSUuMhAYQctAsOKJiBFcuUNi', 'het-surti-30.jpg', NULL, '2024-04-07 00:30:55', '2024-04-07 00:30:55'),
(31, 'Divy Patel', 'divy@gmail.com', NULL, '$2y$10$TuNXQ2tyFYFe6mteO/hKTufXSr2nGL/z5vLslwFWLRrh7kkkJhV1G', 'divy-patel-31.jpg', NULL, '2024-04-07 00:32:16', '2024-04-07 00:32:16'),
(35, 'Vaspan Chinoy', 'vaspan@gmail.com', NULL, '$2y$10$o0fVowfOt/UTSgp6JWbjDetOUOgeBK1D6x1C9cfxBb3ZmQQZIap/O', 'vaspan-chinoy-35.jpg', NULL, '2024-04-07 00:39:11', '2024-04-07 01:22:23'),
(36, 'Riyank Shah', 'riyank.shah@gmail.com', NULL, '$2y$10$WAJ4x/VS7IFBFfku.uEl6OXfgfLoQSrznAzTy5SXs.ti0gc/rIcge', 'riyank-shah-36.jpg', NULL, '2024-04-07 01:04:03', '2024-04-07 01:04:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_subject`
--
ALTER TABLE `grade_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grade_subject`
--
ALTER TABLE `grade_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
