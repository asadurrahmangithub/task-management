-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 22, 2023 at 12:05 PM
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
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `elm1` longtext NOT NULL,
  `date` datetime DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `process` tinyint(4) NOT NULL DEFAULT 0,
  `other` tinyint(4) NOT NULL DEFAULT 0,
  `publication_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `category_id`, `elm1`, `date`, `image`, `author`, `process`, `other`, `publication_status`, `created_at`, `updated_at`) VALUES
(2, 'Other', 6, 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-08-17 16:55:06', 'admin/assets/blog-image/blog-image-973413903.jpg', 'admin', 1, 0, 1, '2023-07-08 04:18:41', '2023-08-17 04:55:06'),
(4, 'Blog', 6, '<p>sdfgf</p>', '2023-08-17 10:34:43', 'admin/assets/blog-image/blog-image-1607609187.png', 'Asadur', 1, 12, 1, '2023-07-08 04:18:45', '2023-08-16 22:34:43'),
(5, 'Blog', 4, '<p>fsdfsdf</p>', NULL, 'admin/assets/blog-image/blog-image-734745566.jpg', 'Asadur', 0, 0, 1, '2023-07-08 04:22:26', '2023-07-17 03:25:33'),
(6, 'Blog', 9, '<p>sdfgf</p>', '2023-08-17 15:21:28', 'admin/assets/blog-image/blog-image-1920113885.jpg', 'Asadur', 0, 12, 0, '2023-07-10 01:21:59', '2023-08-17 03:21:28'),
(7, 'Other', 7, '<p>sdfgf</p>', '2023-07-08 00:00:00', 'admin/assets/blog-image/blog-image-1461709993.jpg', 'Asadur', 1, 0, 1, '2023-07-10 01:24:56', '2023-07-20 21:58:13'),
(8, 'Other', 9, '<p>Other Title</p>', '2023-07-06 00:00:00', 'admin/assets/blog-image/blog-image-2077426804.jpg', 'Asadur', 0, 12, 1, '2023-07-10 02:45:53', '2023-08-16 05:48:50'),
(9, 'bgdfgrtgh', 9, '<p>fghfrtgh</p>', '2023-07-29 00:00:00', 'admin/assets/blog-image/blog-image-611432395.jpg', 'Asadur', 0, 0, 1, '2023-07-10 23:34:21', '2023-07-13 00:05:56'),
(10, 'Blog Dhaka', 7, '<p>Hello Dhaka</p>', '2023-07-11 00:00:00', 'admin/assets/blog-image/blog-image-143090020.png', 'Asadur', 1, 12, 1, '2023-07-17 03:24:29', '2023-08-16 04:27:10'),
(11, 'New Blog', 9, '<p>sdfsdf</p>', '2023-08-05 00:00:00', 'admin/assets/blog-image/blog-image-1470779834.jpg', 'Asadur', 0, 1, 0, '2023-08-15 22:55:59', '2023-08-15 22:55:59'),
(12, 'New Blog', 4, '<p>uijkjhk</p>', '2023-08-19 00:00:00', 'admin/assets/blog-image/blog-image-318190356.jpg', 'Asadur', 0, 12, 0, '2023-08-16 04:26:39', '2023-08-16 04:26:39'),
(13, 'Laravel 10', 2, '<p>Laravel 10</p>', '2023-08-17 10:35:31', 'admin/assets/blog-image/blog-image-1905241277.png', 'user', 0, 12, 1, '2023-08-16 06:10:33', '2023-08-16 22:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `publication_status`, `created_at`, `updated_at`) VALUES
(2, 'Web Development', 'Web Development Description .', 1, '2023-06-09 23:31:16', '2023-07-29 01:20:31'),
(3, 'PHP', 'PHP Description All.', 1, '2023-06-10 02:20:16', '2023-07-20 06:01:06'),
(4, 'JavaScript', 'JavaScript Description All.', 1, '2023-06-10 02:20:41', '2023-07-20 21:53:44'),
(6, 'JavaScript', 'The JavaScript......', 1, '2023-06-20 00:08:38', '2023-07-17 05:40:39'),
(7, 'WordPress', 'This is Description jghjghj', 1, '2023-06-20 23:28:42', '2023-07-19 06:01:43'),
(9, 'Web Development', 'Development', 1, '2023-06-20 23:40:36', '2023-07-17 05:54:31'),
(11, 'JavaScript', 'The JavaScript.', 1, '2023-06-20 00:08:38', '2023-07-20 02:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_09_033951_create_categories_table', 1),
(6, '2023_06_09_062924_create_projects_table', 1),
(7, '2023_06_10_053815_create_task_projects_table', 2),
(8, '2023_07_05_075452_create_profiles_table', 3),
(9, '2023_07_08_042429_create_blogs_table', 4),
(10, '2023_07_11_034529_create_permission_tables', 5),
(11, '2023_08_22_053441_create_blogs_table', 0),
(12, '2023_08_22_053441_create_categories_table', 0),
(13, '2023_08_22_053441_create_failed_jobs_table', 0),
(14, '2023_08_22_053441_create_model_has_permissions_table', 0),
(15, '2023_08_22_053441_create_model_has_roles_table', 0),
(16, '2023_08_22_053441_create_password_reset_tokens_table', 0),
(17, '2023_08_22_053441_create_permissions_table', 0),
(18, '2023_08_22_053441_create_personal_access_tokens_table', 0),
(19, '2023_08_22_053441_create_profiles_table', 0),
(20, '2023_08_22_053441_create_projects_table', 0),
(21, '2023_08_22_053441_create_role_has_permissions_table', 0),
(22, '2023_08_22_053441_create_roles_table', 0),
(23, '2023_08_22_053441_create_task_projects_table', 0),
(24, '2023_08_22_053441_create_users_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'to.do.list', 'web', 'dashboard', '2023-07-10 23:14:20', '2023-07-10 23:14:20'),
(2, 'pending.list', 'web', 'dashboard', '2023-07-10 23:19:15', '2023-07-10 23:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Asadur Rahman 422', 'admin/assets/profile-image/profile-image-1318568373.jpg', '2023-07-05 04:34:30', '2023-07-07 04:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` text NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `submit_date` varchar(255) NOT NULL,
  `process` tinyint(4) NOT NULL DEFAULT 0,
  `publication_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `project_name`, `project_description`, `start_date`, `submit_date`, `process`, `publication_status`, `created_at`, `updated_at`) VALUES
(4, 2, 'Project 1', 'Web Development Description', '2023-06-01', '2023-06-29', 0, 1, '2023-06-20 00:09:00', '2023-06-23 01:07:16'),
(5, 7, 'Project 3', 'WordPress Project 3 Description', '2023-06-16', '2023-06-30', 1, 0, '2023-06-22 22:28:26', '2023-07-07 04:46:21'),
(6, 7, 'Project 2', 'WordPress Project Description', '2023-07-12', '2023-07-21', 0, 1, '2023-07-20 03:38:15', '2023-07-20 03:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_projects`
--

CREATE TABLE `task_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `process` tinyint(4) NOT NULL DEFAULT 0,
  `publication_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_projects`
--

INSERT INTO `task_projects` (`id`, `category_id`, `task_name`, `task_description`, `date`, `start_time`, `end_time`, `process`, `publication_status`, `created_at`, `updated_at`) VALUES
(2, 2, 'Task Project 10', 'JavaScript One Task Project.', '2023-06-23', '08:20', '17:20', 1, 1, '2023-06-10 02:22:48', '2023-06-23 03:58:38'),
(3, 3, 'Task Project 2', 'JavaScript Task Project', '2023-06-08', '16:59', '16:59', 2, 0, '2023-06-10 04:57:54', '2023-08-21 22:51:10'),
(4, 40, 'Task Project 1', 'JavaScript Task Project 1 Description', '2023-06-09', '00:16', '03:16', 1, 1, '2023-06-12 22:16:22', '2023-06-23 05:05:30'),
(5, 2, 'Task Project 1', 'PHP Task Description.', '2023-06-17', '15:52', '18:00', 0, 1, '2023-06-15 02:52:41', '2023-07-07 04:47:28'),
(6, 2, 'Task Project 1', 'Web Development', '2023-06-13', '14:09', '15:09', 1, 1, '2023-06-20 00:09:25', '2023-06-23 03:58:04'),
(7, 3, 'Task Project 10', 'PHP Description', '2023-06-14', '14:11', '12:13', 0, 1, '2023-06-23 00:11:26', '2023-07-07 04:46:33'),
(9, 7, 'Task Project 5', 'WordPress Description', '2023-06-01', '05:21', '19:21', 1, 1, '2023-06-23 04:21:53', '2023-07-20 04:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('admin','member','manager') NOT NULL DEFAULT 'member',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `facebook`, `linkedin`, `instagram`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Asadur Rahman', 'admin', 'admin@gmail.com', NULL, '$2y$10$VipNYGltkHHBHqWLmZtCPOM0md7IJUkE6JOFv/5RsnEFYT8SpKC62', NULL, NULL, NULL, 'admin', 'active', NULL, NULL, NULL, 'jF2SQLejtHsto8ijlT3wLteQo9ZGnhJpLiddFd5jMQxHp5JDZNR9XdNCcwno', NULL, NULL),
(2, 'Manager', 'manager', 'manager@gmail.com', NULL, '$2y$10$RzwAnPy3N1FqIs3z7nlLEOV3QscAz8cmpJhzaaPGpPoZPhsoGaVW6', NULL, NULL, NULL, 'manager', 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Member', 'member', 'member@gmail.com', NULL, '$2y$10$Armm6JRjxI/RbAfaG64bleWyep3rl.b6b2vPSu/Xoff3l8NXs45Aa', NULL, NULL, NULL, 'member', 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Tina Halvorson', NULL, 'nkovacek@example.net', '2023-06-09 22:56:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/005511?text=eaque', '+1-401-333-9881', '24114 Zieme Fork\nSchusterbury, MD 17366-0564', 'member', 'active', NULL, NULL, NULL, 'ZIsXuWtOkV', '2023-06-09 22:56:11', '2023-06-09 22:56:11'),
(5, 'Teagan McGlynn I', NULL, 'kirlin.elfrieda@example.org', '2023-06-09 22:56:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00cc22?text=inventore', '+1.689.359.2009', '79602 Mayer Rue Suite 604\nNormaborough, HI 53062-4049', 'manager', 'inactive', NULL, NULL, NULL, 'SFVEhBQP0Y', '2023-06-09 22:56:11', '2023-06-09 22:56:11'),
(6, 'Dr. Nathanael Baumbach II', NULL, 'abraham23@example.org', '2023-06-09 22:56:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00ee22?text=cupiditate', '+1-858-769-5125', '5290 Kaylie Field\nKeventon, DE 62253', 'member', 'active', NULL, NULL, NULL, 'IEmcUTPpnk', '2023-06-09 22:56:11', '2023-06-09 22:56:11'),
(7, 'Bennie Pouros', NULL, 'kennith.mohr@example.net', '2023-06-09 22:56:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00cc22?text=id', '731.408.9211', '68993 Lakin Ramp Suite 095\nAudreanneberg, UT 50784-2396', 'member', 'active', NULL, NULL, NULL, 'oDpLZs5V68', '2023-06-09 22:56:11', '2023-06-09 22:56:11'),
(8, 'Aryanna Klein', NULL, 'monty.hodkiewicz@example.com', '2023-06-09 22:56:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00eeaa?text=dicta', '682-865-6034', '92808 Albert Throughway Suite 894\nBrendantown, OH 54089-5165', 'member', 'active', NULL, NULL, NULL, 'ybCSqnNPBQ', '2023-06-09 22:56:11', '2023-06-09 22:56:11'),
(9, 'Asadur Rahman', NULL, 'user1@user.com', NULL, '$2y$10$15UwiUR1zOxq9Pq6.pyNfO4wbS/X.eLnzZ05RCt.p0eeAQpRzDTXO', NULL, NULL, NULL, 'member', 'active', NULL, NULL, NULL, NULL, '2023-06-09 22:57:45', '2023-06-09 22:57:45'),
(10, 'Asadur Rahman 422 t', 'developer', 'developer@gmail.com', NULL, '$2y$10$GNNylvonl6xCTI9j7zm5g.ELYBxGz07UIyc7E2iuQdIr/WPH4YlhK', NULL, NULL, NULL, 'admin', 'active', NULL, NULL, NULL, NULL, '2023-07-11 02:50:47', '2023-07-11 02:50:47'),
(12, 'User', 'user', 'admin@user.com', NULL, '$2y$10$l14zhjm.sPNgRsos8jp3POW58E5R3n480qWRhx6husZsQO5PZSRsW', NULL, NULL, NULL, 'admin', 'active', NULL, NULL, NULL, 'ive5iY7Riovy8DrvoT0laoj7BePg0dGXSCZyqXbLV1rHAU29jBoWUln67TpP', '2023-07-11 03:58:04', '2023-07-11 03:58:04'),
(13, 'Rahman', 'user', 'test@gmail.com', NULL, '$2y$10$q0seIQtnydMuuMQCb4Do4.1dWuPF9Bi7LNgIiYYJesYpXKEsZX5iO', NULL, NULL, NULL, 'admin', 'active', NULL, NULL, NULL, NULL, '2023-08-15 22:35:59', '2023-08-15 22:35:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `task_projects`
--
ALTER TABLE `task_projects`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_projects`
--
ALTER TABLE `task_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
