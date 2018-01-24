-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2017 at 02:35 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anemam', 'anemam@anemam.com', '$2y$10$DeedAiVct24iMxNvxTxb0.eqKOE8T4IxUekeP3ArLFWqZh0Lb80WS', 'R01PDo50ru88COZpyuYCxTh6u0Yn9g8IlFRLpiRUnuCGwLbDrUZIvpwF19QN', '2017-05-19 23:20:03', '2017-05-31 14:04:54'),
(2, 'admin', 'admin@admin.com', '$1$acVy99aa$uCRIgiGD4NkzX..uXmFjD/', NULL, '2017-05-30 22:04:51', '2017-05-30 22:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`admin_id`, `role_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `status`, `image_url`, `created_at`, `updated_at`) VALUES
(1, '1', 'bUCO14.jpg', '2017-05-30 08:27:59', '2017-05-30 08:27:59'),
(2, '1', '2tFYIs.PNG', '2017-06-07 06:59:19', '2017-06-07 06:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `category-description`
--

CREATE TABLE `category-description` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category-description`
--

INSERT INTO `category-description` (`id`, `name`, `description`, `slug`, `meta_title`, `meta_description`, `lang_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Category English', 'Category English', 'Category English', 'Category English', 'Category English', 2, 1, '2017-05-30 08:27:59', '2017-06-07 07:02:04'),
(2, 'Category Arabic', 'Category Arabic', 'Category Arabic', 'Category Arabic', 'Category Arabic', 4, 1, '2017-05-30 08:27:59', '2017-06-07 07:02:04'),
(3, 'educational', 'educational', 'educational', 'educational', 'educational', 2, 2, '2017-06-07 06:59:19', '2017-06-07 06:59:19'),
(4, 'تعليمي', 'تعليمي', 'تعليمي', 'تعليمي', 'تعليمي', 4, 2, '2017-06-07 06:59:19', '2017-06-07 06:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contries`
--

CREATE TABLE `contries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED DEFAULT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feature-description`
--

CREATE TABLE `feature-description` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `feature_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feature-description`
--

INSERT INTO `feature-description` (`id`, `name`, `description`, `lang_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(1, 'feature1 English', 'feature1English', 2, 1, '2017-06-01 05:12:50', '2017-06-01 05:12:50'),
(2, 'feature1 Arabic', 'feature1 Arabic', 4, 1, '2017-06-01 05:12:50', '2017-06-01 05:12:50'),
(3, 'feature2 English', 'feature2 English', 2, 2, '2017-06-01 05:29:58', '2017-06-01 05:29:58'),
(4, 'feature2 Arabic', 'feature2 Arabic', 4, 2, '2017-06-01 05:29:58', '2017-06-01 05:29:58'),
(5, 'features3', 'features3', 2, 3, '2017-06-01 06:03:04', '2017-06-01 06:03:04'),
(6, 'features4', 'features4', 4, 3, '2017-06-01 06:03:04', '2017-06-01 06:03:04'),
(7, 'feature5', 'feature5', 2, 4, '2017-06-01 06:03:23', '2017-06-01 06:03:23'),
(8, 'feature6', 'feature6', 4, 4, '2017-06-01 06:03:23', '2017-06-01 06:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `feature-package`
--

CREATE TABLE `feature-package` (
  `id` int(10) UNSIGNED NOT NULL,
  `feature_id` int(10) UNSIGNED DEFAULT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feature-package`
--

INSERT INTO `feature-package` (`id`, `feature_id`, `package_id`, `created_at`, `updated_at`) VALUES
(14, 2, 7, '2017-06-08 07:11:06', '2017-06-08 07:11:06'),
(15, 3, 7, '2017-06-08 07:11:06', '2017-06-08 07:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '2017-06-01 05:12:50', '2017-06-01 05:12:50'),
(2, '1', '2017-06-01 05:29:58', '2017-06-01 05:29:58'),
(3, '1', '2017-06-01 06:03:03', '2017-06-01 06:03:03'),
(4, '1', '2017-06-01 06:03:23', '2017-06-01 06:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'test', '2017-06-04 09:22:04', '2017-06-04 09:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`id`, `group_id`, `user_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `label`, `status`, `name`, `created_at`, `updated_at`) VALUES
(2, 'en', '1', 'English', '2017-05-28 07:17:10', '2017-05-28 08:00:16'),
(4, 'ar', '1', 'Arabic', '2017-05-28 08:18:50', '2017-05-28 08:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_19_063106_create_admins_table', 1),
(5, '2017_05_28_082005_create_languages_table', 3),
(6, '2017_05_28_103141_create_categories_table', 4),
(9, '2017_05_28_105731_create_category_description_table', 5),
(13, '2017_05_20_014356_entrust_setup_tables', 8),
(17, '2017_05_31_093439_create_features_table', 11),
(18, '2017_05_31_093641_create_options_table', 11),
(19, '2017_05_31_093726_create_feature_description_table', 11),
(20, '2017_05_31_093809_create_option_description_table', 11),
(28, '2017_05_29_103803_create_packages_table', 12),
(29, '2017_05_29_104003_create_package_description_table', 12),
(30, '2017_05_30_075816_create_packages_gallery_table', 12),
(31, '2017_05_31_100431_create_feature_package_table', 12),
(32, '2017_05_31_100459_create_option_package_table', 12),
(33, '2017_05_31_225008_create_contries_table', 12),
(34, '2017_05_31_230616_create_cities_table', 12),
(35, '2017_06_01_022214_create_groups_table', 12),
(36, '2017_06_01_022614_create_group_user_table', 12),
(38, '2017_06_05_113822_add_price_column_packages_table', 13),
(39, '2017_05_31_224803_create_countries_table', 14),
(40, '2017_06_07_084628_add_slug_column_category_description', 14);

-- --------------------------------------------------------

--
-- Table structure for table `option-description`
--

CREATE TABLE `option-description` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `option-description`
--

INSERT INTO `option-description` (`id`, `name`, `description`, `lang_id`, `option_id`, `created_at`, `updated_at`) VALUES
(1, 'option1 English', 'option1 English', 2, 1, '2017-06-01 05:13:33', '2017-06-01 05:13:33'),
(2, 'option1 Arabic', 'option1 Arabic', 4, 1, '2017-06-01 05:13:33', '2017-06-01 05:13:33'),
(3, 'option2 English', 'option2 English', 2, 2, '2017-06-01 05:30:30', '2017-06-01 05:30:30'),
(4, 'option2 Arabic', 'option2 Arabic', 4, 2, '2017-06-01 05:30:30', '2017-06-01 05:30:30'),
(5, 'option3', 'option3', 2, 3, '2017-06-01 06:03:54', '2017-06-01 06:03:54'),
(6, 'option6', 'option6', 4, 3, '2017-06-01 06:03:54', '2017-06-01 06:03:54'),
(7, 'option7', 'option7', 2, 4, '2017-06-01 06:04:28', '2017-06-01 06:04:28'),
(8, 'option8', 'option8', 4, 4, '2017-06-01 06:04:28', '2017-06-01 06:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `option-package`
--

CREATE TABLE `option-package` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED DEFAULT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `option-package`
--

INSERT INTO `option-package` (`id`, `option_id`, `package_id`, `created_at`, `updated_at`) VALUES
(16, 1, 7, '2017-06-08 07:11:06', '2017-06-08 07:11:06'),
(17, 3, 7, '2017-06-08 07:11:06', '2017-06-08 07:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` bigint(20) NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 300, '1', '2017-06-01 05:13:33', '2017-06-01 05:13:33'),
(2, 500, '1', '2017-06-01 05:30:30', '2017-06-01 05:30:30'),
(3, 500, '1', '2017-06-01 06:03:54', '2017-06-01 06:03:54'),
(4, 800, '1', '2017-06-01 06:04:28', '2017-06-01 06:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `package-description`
--

CREATE TABLE `package-description` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package-description`
--

INSERT INTO `package-description` (`id`, `name`, `description`, `meta_title`, `meta_description`, `slug`, `destination`, `lang_id`, `package_id`, `created_at`, `updated_at`) VALUES
(13, 'package1 English', 'package1 English', 'package1 English', 'package1 English', 'package1 English', 'package1 English', 2, 7, '2017-06-08 07:11:06', '2017-06-08 07:11:06'),
(14, 'package1 Arabic', 'package1 Arabic', 'package1 Arabic', 'package1 Arabic', 'package1 Arabic', 'package1 Arabic', 4, 7, '2017-06-08 07:11:06', '2017-06-08 07:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reservation_start_date` datetime DEFAULT NULL,
  `reservation_end_date` datetime DEFAULT NULL,
  `journey_start_date` datetime DEFAULT NULL,
  `journey_end_date` datetime DEFAULT NULL,
  `cancellation_date` datetime DEFAULT NULL,
  `max_number` bigint(20) DEFAULT NULL,
  `min_number` bigint(20) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `over_all_rating` int(11) DEFAULT NULL,
  `points` bigint(20) DEFAULT NULL,
  `user_group_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `status`, `image_url`, `reservation_start_date`, `reservation_end_date`, `journey_start_date`, `journey_end_date`, `cancellation_date`, `max_number`, `min_number`, `price`, `over_all_rating`, `points`, `user_group_id`, `category_id`, `created_at`, `updated_at`) VALUES
(7, '1', 'd3paOa.PNG', '2017-06-08 00:00:00', '2017-06-09 00:00:00', '2017-06-08 00:00:00', '2017-06-09 00:00:00', '2017-06-21 00:00:00', 61, 55, 3000.00, NULL, 50, 3, 1, '2017-06-08 07:11:03', '2017-06-08 07:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `packages-gallery`
--

CREATE TABLE `packages-gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `packages-gallery`
--

INSERT INTO `packages-gallery` (`id`, `image_url`, `package_id`, `created_at`, `updated_at`) VALUES
(14, '2sWcKI.jpg', 7, '2017-06-08 07:11:42', '2017-06-08 07:11:42'),
(15, 'lyTuM4.jpg', 7, '2017-06-08 07:11:42', '2017-06-08 07:11:42'),
(16, 'wneKpg.jpg', 7, '2017-06-08 07:11:43', '2017-06-08 07:11:43'),
(17, 'Su1OCs.jpg', 7, '2017-06-08 07:11:43', '2017-06-08 07:11:43'),
(18, '36n6u4.jpg', 7, '2017-06-08 07:11:43', '2017-06-08 07:11:43'),
(20, 'dPdekc.png', 7, '2017-06-08 07:42:05', '2017-06-08 07:42:05'),
(21, 'MFut6h.jpg', 7, '2017-06-08 07:42:06', '2017-06-08 07:42:06'),
(22, 'PeVcag.jpg', 7, '2017-06-08 07:42:07', '2017-06-08 07:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin.dashboard', '', '', '2017-06-05 19:34:34', '2017-06-05 19:34:34'),
(2, 'admin.login', '', '', '2017-06-05 19:34:34', '2017-06-05 19:34:34'),
(3, 'admin.login.submit', '', '', '2017-06-05 19:34:34', '2017-06-05 19:34:34'),
(4, 'admin-users.index', '', '', '2017-06-05 19:34:34', '2017-06-05 19:34:34'),
(5, 'admin-users.create', '', '', '2017-06-05 19:34:34', '2017-06-05 19:34:34'),
(6, 'admin-users.store', '', '', '2017-06-05 19:34:34', '2017-06-05 19:34:34'),
(7, 'admin-users.show', '', '', '2017-06-05 19:34:34', '2017-06-05 19:34:34'),
(8, 'admin-users.edit', '', '', '2017-06-05 19:34:34', '2017-06-05 19:34:34'),
(9, 'admin-users.update', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(10, 'admin-users.destroy', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(11, 'role.permissions', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(12, 'role.permission.add', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(13, 'role.permission.edit', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(14, 'roles.index', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(15, 'roles.create', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(16, 'roles.store', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(17, 'roles.show', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(18, 'roles.edit', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(19, 'roles.update', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(20, 'roles.destroy', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(21, 'permissions.index', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(22, 'permissions.create', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(23, 'permissions.store', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(24, 'permissions.show', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(25, 'permissions.edit', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(26, 'permissions.update', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(27, 'permissions.destroy', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(28, 'languages.index', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(29, 'languages.create', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(30, 'languages.store', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(31, 'languages.show', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(32, 'languages.edit', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(33, 'languages.update', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(34, 'languages.destroy', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(35, 'categories.index', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(36, 'categories.create', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(37, 'categories.store', '', '', '2017-06-05 19:34:35', '2017-06-05 19:34:35'),
(38, 'categories.show', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(39, 'categories.edit', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(40, 'categories.update', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(41, 'categories.destroy', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(42, 'packages.index', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(43, 'packages.create', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(44, 'packages.store', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(45, 'packages.show', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(46, 'packages.edit', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(47, 'packages.update', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(48, 'packages.destroy', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(49, 'features.index', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(50, 'features.create', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(51, 'features.store', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(52, 'features.show', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(53, 'features.edit', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(54, 'features.update', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(55, 'features.destroy', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(56, 'options.index', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(57, 'options.create', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(58, 'options.store', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(59, 'options.show', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(60, 'options.edit', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(61, 'options.update', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(62, 'options.destroy', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(63, 'post.package.images', '', '', '2017-06-05 19:34:36', '2017-06-05 19:34:36'),
(64, 'create.package.images', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(65, 'package.images', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(66, 'delete.package.images', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(67, 'list.groups', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(68, 'attach.group', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(69, 'users.index', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(70, 'users.create', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(71, 'users.store', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(72, 'users.show', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(73, 'users.edit', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(74, 'users.update', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(75, 'users.destroy', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(76, 'list.group.users', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(77, 'groups.index', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(78, 'groups.create', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(79, 'groups.store', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(80, 'groups.show', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(81, 'groups.edit', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(82, 'groups.update', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(83, 'groups.destroy', '', '', '2017-06-05 19:34:37', '2017-06-05 19:34:37'),
(84, 'login', '', '', '2017-06-05 19:34:38', '2017-06-05 19:34:38'),
(85, 'logout', '', '', '2017-06-05 19:34:38', '2017-06-05 19:34:38'),
(86, 'register', '', '', '2017-06-05 19:34:38', '2017-06-05 19:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
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
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'mini admin', 'sea food', '', '2017-05-30 22:02:57', '2017-05-30 22:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@front.com', '$2y$10$VTWzK0vmwEXBefC58woccerhnqqM5BPks4/yw4u4SBhiLzWmFzf0u', NULL, '2017-05-19 16:06:35', '2017-05-19 16:06:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`admin_id`,`role_id`),
  ADD KEY `admin_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category-description`
--
ALTER TABLE `category-description`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_description_slug_unique` (`slug`),
  ADD KEY `category_description_category_id_foreign` (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contries`
--
ALTER TABLE `contries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_option_id_foreign` (`option_id`),
  ADD KEY `countries_package_id_foreign` (`package_id`);

--
-- Indexes for table `feature-description`
--
ALTER TABLE `feature-description`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `feature_description_name_unique` (`name`),
  ADD KEY `feature_description_feature_id_foreign` (`feature_id`);

--
-- Indexes for table `feature-package`
--
ALTER TABLE `feature-package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_package_feature_id_foreign` (`feature_id`),
  ADD KEY `feature_package_package_id_foreign` (`package_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_user_group_id_foreign` (`group_id`),
  ADD KEY `group_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option-description`
--
ALTER TABLE `option-description`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `option_description_name_unique` (`name`),
  ADD KEY `option_description_option_id_foreign` (`option_id`);

--
-- Indexes for table `option-package`
--
ALTER TABLE `option-package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_package_option_id_foreign` (`option_id`),
  ADD KEY `option_package_package_id_foreign` (`package_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package-description`
--
ALTER TABLE `package-description`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `package_description_slug_unique` (`slug`),
  ADD KEY `package_description_package_id_foreign` (`package_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_category_id_foreign` (`category_id`);

--
-- Indexes for table `packages-gallery`
--
ALTER TABLE `packages-gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_gallery_package_id_foreign` (`package_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category-description`
--
ALTER TABLE `category-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contries`
--
ALTER TABLE `contries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feature-description`
--
ALTER TABLE `feature-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `feature-package`
--
ALTER TABLE `feature-package`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `option-description`
--
ALTER TABLE `option-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `option-package`
--
ALTER TABLE `option-package`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `package-description`
--
ALTER TABLE `package-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `packages-gallery`
--
ALTER TABLE `packages-gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category-description`
--
ALTER TABLE `category-description`
  ADD CONSTRAINT `category_description_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `countries_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feature-description`
--
ALTER TABLE `feature-description`
  ADD CONSTRAINT `feature_description_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feature-package`
--
ALTER TABLE `feature-package`
  ADD CONSTRAINT `feature_package_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feature_package_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_user_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `option-description`
--
ALTER TABLE `option-description`
  ADD CONSTRAINT `option_description_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `option-package`
--
ALTER TABLE `option-package`
  ADD CONSTRAINT `option_package_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `option_package_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package-description`
--
ALTER TABLE `package-description`
  ADD CONSTRAINT `package_description_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `packages-gallery`
--
ALTER TABLE `packages-gallery`
  ADD CONSTRAINT `packages_gallery_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
