-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 01:20 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `created_at`, `updated_at`) VALUES
(1, '2017-06-22 05:31:03', '2017-06-22 05:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `about_description`
--

CREATE TABLE `about_description` (
  `id` int(10) UNSIGNED NOT NULL,
  `about_id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `meta_title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about_description`
--

INSERT INTO `about_description` (`id`, `about_id`, `lang_id`, `title`, `description`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'uigiujjunjiomkokp', '<p><img src=\"/photos/1/img2.jpg\" alt=\"\" width=\"701\" height=\"467\" /></p>\r\n<p>&nbsp;</p>\r\n<ul style=\"list-style-type: circle;\">\r\n<li>yugyuj</li>\r\n<li>khoiikjm</li>\r\n<li>khujuuj</li>\r\n</ul>', '0pn989nuyp89u', 'oihoijpokpo', '2017-06-22 05:34:17', '2017-06-28 16:26:15'),
(3, 1, 4, '4fergr', '<p>gregewgwe</p>', 'rgewgewgg', 'ewrgweg', '2017-06-22 06:15:16', '2017-06-22 06:21:22');

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
(1, 'Anemam', 'anemam@anemam.com', '$2y$10$DeedAiVct24iMxNvxTxb0.eqKOE8T4IxUekeP3ArLFWqZh0Lb80WS', '98e33BhPJ2HbwRBPjvCBRk4kvlmkqHnXLkK7BQfEkFOVvson3Uu5EV820T7q', '2017-05-19 23:20:03', '2017-07-16 08:04:52'),
(2, 'admin', 'admin@admin.com', '$1$acVy99aa$uCRIgiGD4NkzX..uXmFjD/', 'PSnHcK2PSKxMqJBxBR4Hla7SnKMg5X4bxbnRM1rc4eNQXzrd1WijRgRPqk6Z', '2017-05-30 22:04:51', '2017-07-24 10:52:40');

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
-- Table structure for table `advertisments`
--

CREATE TABLE `advertisments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` enum('first','second','third','fourth') COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `advertisments`
--

INSERT INTO `advertisments` (`id`, `title`, `gallery_id`, `url`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', 1, 'https://www.google.com.eg/', 'first', 1, '2017-07-13 10:58:49', '2017-07-13 10:58:49'),
(2, 'Home', 2, 'https://www.google.com.eg/', 'second', 1, '2017-07-13 10:59:14', '2017-07-13 10:59:14'),
(3, 'List', 3, 'https://www.google.com.eg/', 'third', 1, '2017-07-13 10:59:37', '2017-07-13 10:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `blog-description`
--

CREATE TABLE `blog-description` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog-description`
--

INSERT INTO `blog-description` (`id`, `title`, `description`, `author`, `slug`, `meta_title`, `meta_description`, `lang_id`, `blog_id`, `created_at`, `updated_at`) VALUES
(3, 'blog English 2', '<article class=\"post-content\">\r\n<p>Augue sed platea sed non porta tincidunt augue? Odio platea, pulvinar habitasse vut! Pulvinar, integer odio. Ac pid! Habitasse montes elementum, et sagittis tincidunt magnis? Sociis! Elementum quis, integer natoque sed auctor nascetur enim parturient ridiculus ut amet porttitor dapibus phasellus tempor, natoque adipiscing aliquam. Amet. Dapibus proin, elit ut!</p>\r\n<p>Nec? Mid lundium, turpis sit sagittis, in porttitor augue, magna dis, ultrices vel porttitor dapibus tincidunt, elementum lorem, massa odio porta. Sit ac proin odio, platea adipiscing, tempor sagittis enim a, eros proin.</p>\r\n<p><img class=\"alignleft\" src=\"/admin/blog/2/img/in-post-image.jpg\" alt=\"Image in Post\" /> In! Vel magna nisi aliquam, magnis tempor, nunc dapibus sed porta vut porttitor tristique! Lectus turpis massa ridiculus sagittis tincidunt eros lundium etiam nisi non natoque ac arcu auctor elementum vel nunc sociis! Nunc lacus! Dictumst facilisis turpis, integer? Nec nec. Nunc scelerisque diam! Cum sit arcu, mus in, nisi non etiam arcu a magna etiam nisi porttitor turpis! Natoque ac porta pellentesque nunc placerat porttitor sed porta urna, est ut ut adipiscing, tortor montes, massa urna dictumst ac, pellentesque facilisis nisi arcu! Tortor lacus elementum eros, placerat arcu. Adipiscing platea purus sagittis ridiculus turpis, nunc dictumst ac?</p>\r\n<!-- BLOCKQUOTE -->\r\n<blockquote>\r\n<p><strong>BLOCK QUOTE</strong></p>\r\n<p>In! Vel magna nisi aliquam, magnis tempor, nunc dapibus sed porta vut porttitor tristique! Lectus turpis massa ridiculus sagittis tincidunt eros lundium etiam nisi non natoque ac arcu auctor elementum vel nunc sociis!</p>\r\n</blockquote>\r\n<p>Augue sed platea sed non porta tincidunt augue? Odio platea, pulvinar habitasse vut! Pulvinar, integer odio. Ac pid! Habitasse montes elementum, et sagittis tincidunt magnis? Sociis! Elementum quis, integer natoque sed auctor nascetur enim parturient ridiculus ut amet porttitor dapibus phasellus tempor, natoque adipiscing aliquam.</p>\r\n</article>', 'blog English 2', 'blog English 2', 'blog English 2', 'blog English 2', 2, 2, '2017-06-09 11:50:15', '2017-06-29 02:52:33'),
(4, 'blog Arabic 2', '<article class=\"post-content\">\r\n<p>Augue sed platea sed non porta tincidunt augue? Odio platea, pulvinar habitasse vut! Pulvinar, integer odio. Ac pid! Habitasse montes elementum, et sagittis tincidunt magnis? Sociis! Elementum quis, integer natoque sed auctor nascetur enim parturient ridiculus ut amet porttitor dapibus phasellus tempor, natoque adipiscing aliquam. Amet. Dapibus proin, elit ut!</p>\r\n<p>Nec? Mid lundium, turpis sit sagittis, in porttitor augue, magna dis, ultrices vel porttitor dapibus tincidunt, elementum lorem, massa odio porta. Sit ac proin odio, platea adipiscing, tempor sagittis enim a, eros proin.</p>\r\n<p><img class=\"alignleft\" src=\"/admin/blog/2/img/in-post-image.jpg\" alt=\"Image in Post\" /> In! Vel magna nisi aliquam, magnis tempor, nunc dapibus sed porta vut porttitor tristique! Lectus turpis massa ridiculus sagittis tincidunt eros lundium etiam nisi non natoque ac arcu auctor elementum vel nunc sociis! Nunc lacus! Dictumst facilisis turpis, integer? Nec nec. Nunc scelerisque diam! Cum sit arcu, mus in, nisi non etiam arcu a magna etiam nisi porttitor turpis! Natoque ac porta pellentesque nunc placerat porttitor sed porta urna, est ut ut adipiscing, tortor montes, massa urna dictumst ac, pellentesque facilisis nisi arcu! Tortor lacus elementum eros, placerat arcu. Adipiscing platea purus sagittis ridiculus turpis, nunc dictumst ac?</p>\r\n<!-- BLOCKQUOTE -->\r\n<blockquote>\r\n<p><strong>BLOCK QUOTE</strong></p>\r\n<p>In! Vel magna nisi aliquam, magnis tempor, nunc dapibus sed porta vut porttitor tristique! Lectus turpis massa ridiculus sagittis tincidunt eros lundium etiam nisi non natoque ac arcu auctor elementum vel nunc sociis!</p>\r\n</blockquote>\r\n<p>Augue sed platea sed non porta tincidunt augue? Odio platea, pulvinar habitasse vut! Pulvinar, integer odio. Ac pid! Habitasse montes elementum, et sagittis tincidunt magnis? Sociis! Elementum quis, integer natoque sed auctor nascetur enim parturient ridiculus ut amet porttitor dapibus phasellus tempor, natoque adipiscing aliquam.</p>\r\n</article>', 'blog Arabic 2', 'blog Arabic 2', 'blog Arabic 2', 'blog Arabic 2', 4, 2, '2017-06-09 11:50:15', '2017-06-29 02:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `status`, `image_url`, `created_at`, `updated_at`) VALUES
(2, '1', 'uDmoIX.jpg', '2017-06-09 11:50:14', '2017-06-28 17:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `career-description`
--

CREATE TABLE `career-description` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `career_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `career-description`
--

INSERT INTO `career-description` (`id`, `title`, `description`, `slug`, `meta_title`, `meta_description`, `lang_id`, `career_id`, `created_at`, `updated_at`) VALUES
(1, 'career Englishfsdafafds', 'career English', 'career English', 'career English', 'career English', 2, 1, '2017-06-22 06:46:57', '2017-06-22 07:03:54'),
(2, 'career Arabic', 'career Arabic', 'career Arabic', 'career Arabic', 'career Arabic', 4, 1, '2017-06-22 06:46:57', '2017-06-22 06:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `status`, `image_url`, `created_at`, `updated_at`) VALUES
(1, '1', 'HmNg5l.jpg', '2017-06-22 06:46:57', '2017-06-22 06:46:57');

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
(2, '1', '2tFYIs.PNG', '2017-06-07 06:59:19', '2017-06-07 06:59:19'),
(3, '1', 'PEExLF.jpg', '2017-07-24 11:36:46', '2017-07-24 11:36:46');

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
(4, 'تعليمي', 'تعليمي', 'تعليمي', 'تعليمي', 'تعليمي', 4, 2, '2017-06-07 06:59:19', '2017-06-07 06:59:19'),
(5, 'Touristic', 'Touristic', 'Touristic', 'Tourist', 'Tourist', 2, 3, '2017-07-24 11:36:46', '2017-07-24 11:36:46'),
(6, 'السياحية', 'السياحية', 'السياحية', 'السياحية', 'السياحية', 4, 3, '2017-07-24 11:36:46', '2017-07-24 11:36:46');

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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `email`, `name`, `message`, `blog_id`, `created_at`, `updated_at`) VALUES
(1, 'test@test.com', 'test', 'fasfdasf', 2, '2017-07-05 09:59:46', '2017-07-05 09:59:46'),
(2, 'test@test.com', 'test', 'fasfdasf', 2, '2017-07-05 10:01:17', '2017-07-05 10:01:17');

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
(15, 3, 7, '2017-06-08 07:11:06', '2017-06-08 07:11:06'),
(20, 1, 16, '2017-07-25 11:18:17', '2017-07-25 11:18:17'),
(21, 2, 16, '2017-07-25 11:18:17', '2017-07-25 11:18:17');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'advertisement 1', 1, '2017-07-09 20:17:12', '2017-07-13 10:56:42'),
(2, 'advertisement 2', 1, '2017-07-13 10:57:29', '2017-07-13 10:57:29'),
(3, 'advertisement 3', 1, '2017-07-13 10:57:59', '2017-07-13 10:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `gallery_id` int(10) UNSIGNED DEFAULT NULL,
  `image_url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `image_url`, `created_at`, `updated_at`) VALUES
(4, 2, 'Iji2Ok.jpg', '2017-07-13 11:23:42', '2017-07-13 11:23:42'),
(5, 3, 'vXBdpq.jpg', '2017-07-13 11:23:51', '2017-07-13 11:23:51'),
(6, 1, 'BzpjPK.jpg', '2017-07-13 11:39:47', '2017-07-13 11:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_arabic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_english` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_description` text COLLATE utf8_unicode_ci,
  `site_keywords` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_google_analytics_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_javascript_code` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `points` double(8,2) NOT NULL,
  `review_points` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_url`, `site_email`, `address_arabic`, `address_english`, `phone`, `site_description`, `site_keywords`, `site_google_analytics_id`, `google_javascript_code`, `created_at`, `updated_at`, `points`, `review_points`) VALUES
(1, 'taibaflocks.com', 'info@taibaflocks.com', 'عنوان', 'address English', '553423542354', '  description  ', 'description', '', '      ', '2017-07-09 19:49:07', '2017-07-09 19:49:07', 0.50, 43);

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
(1, 'Vip', '2017-07-29 08:29:01', '2017-07-29 08:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(38, '2017_06_05_113822_add_price_column_packages_table', 13),
(39, '2017_05_31_224803_create_countries_table', 14),
(40, '2017_06_07_084628_add_slug_column_category_description', 14),
(41, '2017_06_09_123626_create_reviews_table', 15),
(42, '2017_06_09_124119_create_blogs_table', 15),
(43, '2017_06_09_124217_create_blog_description_table', 15),
(44, '2017_06_09_124420_create_travellers_history_table', 15),
(45, '2017_06_09_124605_create_traveller_description_table', 15),
(50, '2014_10_12_000000_create_users_table', 16),
(51, '2017_06_01_022214_create_groups_table', 16),
(52, '2017_06_01_022614_create_group_user_table', 16),
(53, '2017_06_10_000720_create_package_user_table', 16),
(55, '2017_06_11_120320_create_package_user_option_table', 18),
(60, '2017_06_21_034127_add_timestamp_in_package_user_table', 20),
(61, '2017_06_11_105151_add_payment_method_column_to_package_user_table', 21),
(64, '2017_06_22_065022_create_rating_table', 23),
(65, '2017_06_22_071400_create_about_us_table', 23),
(66, '2017_06_22_071438_create_about_description_table', 23),
(67, '2017_06_22_082354_create_career_table', 24),
(68, '2017_06_22_082419_create_career_description_table', 24),
(69, '2017_06_22_042840_create_sliders_table', 25),
(70, '2017_06_22_043155_create_slider_description_table', 25),
(71, '2017_07_03_135444_create_notifications_table', 26),
(72, '2017_07_04_125324_create_comments_table', 27),
(73, '2017_07_06_092046_create_ask_question_table', 28),
(74, '2017_07_06_143532_create_social_media_table', 29),
(75, '2017_07_06_143613_create_advertisments_table', 29),
(76, '2017_07_06_143650_create_general_settings_table', 29),
(77, '2017_07_07_074607_create_galleries_table', 29),
(78, '2017_07_07_074643_create_gallery_images_table', 29),
(80, '2017_06_19_001558_create_tickets_table', 30),
(81, '2017_07_08_155834_add_column_uid_to_tickets_table', 30),
(82, '2017_07_08_160210_create_ticket_details_table', 30),
(83, '2017_07_11_091410_add_message_column_to_package_user_table', 31),
(84, '2017_07_13_090952_add_column_points_to_general_setting_table', 32),
(85, '2017_07_13_101807_add_review_points__to_general_setting_table', 33),
(86, '2017_07_13_144653_add_address_phone_address', 34),
(87, '2017_07_16_104938_create_offer_table', 35),
(88, '2017_07_24_073650_creat_payfort_table', 36);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1dd42601-0799-4deb-af9e-fd809c4c657d', 'App\\Notifications\\TicketCreated', 31, 'App\\User', '{\"id\":7,\"name\":\"test ticket\",\"email\":null,\"message\":\"svegarag\",\"department\":\"sales\",\"user_id\":31,\"status\":0,\"uid\":\"TF-385119\",\"created_at\":\"2017-07-09 21:04:28\",\"updated_at\":\"2017-07-09 21:04:28\"}', NULL, '2017-07-09 19:04:28', '2017-07-09 19:04:28'),
('1fc8e7bf-60db-4ae7-8698-6c4cac78f622', 'App\\Notifications\\TicketCreated', 31, 'App\\User', '{\"id\":8,\"name\":\"test ticket\",\"email\":null,\"message\":\"svegarag\",\"department\":\"sales\",\"user_id\":31,\"status\":0,\"uid\":\"TF-385120\",\"created_at\":\"2017-07-09 21:05:30\",\"updated_at\":\"2017-07-09 21:05:30\"}', NULL, '2017-07-09 19:05:30', '2017-07-09 19:05:30'),
('857a4705-b0ff-4e45-ac1b-591533dcc1b0', 'App\\Notifications\\TicketCreated', 31, 'App\\User', '{\"id\":6,\"name\":\"test ticket\",\"email\":null,\"message\":\"svegarag\",\"department\":\"sales\",\"user_id\":31,\"status\":0,\"uid\":\"TF-385118\",\"created_at\":\"2017-07-09 21:03:49\",\"updated_at\":\"2017-07-09 21:03:49\"}', NULL, '2017-07-09 19:03:51', '2017-07-09 19:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `offer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `percent` double(8,2) NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `offer_name`, `percent`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'test offer', 210.30, 1, '2017-07-29 08:47:10', '2017-07-29 08:47:10');

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
(17, 3, 7, '2017-06-08 07:11:06', '2017-06-08 07:11:06'),
(22, 1, 16, '2017-07-25 11:18:17', '2017-07-25 11:18:17'),
(23, 2, 16, '2017-07-25 11:18:17', '2017-07-25 11:18:17');

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
(13, 'Sharm Elshiekh', 'Package Contains:\r\n1- international flights\r\n2- 4 stars hotel accommodation (Sea View)\r\n3- Breakfast\r\n4- all tax\r\n ', 'Sharm Elshiekh', 'Sharm Elshiekh', 'Sharm Elshiekh', 'Sharm Elshiekh', 2, 7, '2017-06-08 07:11:06', '2017-07-25 05:32:14'),
(14, 'شرم الشيخ', 'العرض يشمل:\r\n1- تذاكر الطيران الدولية \r\n2- الأقامة في فندق 4 نجوم مع إطلالة علي البحر\r\n3- الإفطار\r\n4- الضرائب', 'شرم الشيخ', 'شرم الشيخ', 'شرم الشيخ', 'شرم الشيخ', 4, 7, '2017-06-08 07:11:06', '2017-07-24 11:48:58'),
(19, 'Dubai', '<p>The Package includes:</p>\r\n<p>1- 4 &amp; 5 starts Hotels and resorts</p>\r\n<p>2- Sea View rooms</p>\r\n<p>3- Breakfast</p>', 'Dubai', 'Dubai', 'Dubai', 'Dubai', 2, 10, '2017-07-25 05:46:52', '2017-07-25 05:46:52'),
(20, 'دبي', '<p>الأقامة تشمل:</p>\r\n<p>1- فنادق ومنتجعات 4 و5 نجوم</p>\r\n<p>2- إطلالة علي البحر</p>\r\n<p>3- الأفطار</p>', 'دبي', 'دبي', 'دبي', 'دبي', 4, 10, '2017-07-25 05:46:52', '2017-07-25 05:46:52'),
(21, 'Gorgia', '<p>Package includes:</p>\r\n<p>1- accomondation in 4/5 starts hotels</p>\r\n<p>2- Breakfast</p>\r\n<p>3- All tax</p>', 'Gorgia', 'Gorgia', 'Gorgia', 'Gorgia', 2, 11, '2017-07-25 05:52:31', '2017-07-25 05:52:31'),
(22, 'جورجيا', '<p>العرض يشمل:</p>\r\n<p>1- الأقامة في فنادق 4\\5 نجوم</p>\r\n<p>2- الافطار</p>\r\n<p>3- الضرائب</p>', 'جورجيا', 'جورجيا', 'جورجيا', 'جورجيا', 4, 11, '2017-07-25 05:52:31', '2017-07-25 05:52:31'),
(23, 'Malyisia', '<p>The package includes:</p>\r\n<p>1- Accomondation within 4/5 starts hotels with breakfast</p>\r\n<p>2- internal flights with reception</p>\r\n<p>3- All tax</p>', 'Malyisia', 'Malyisia', 'Malyisia', 'Malyisia', 2, 12, '2017-07-25 05:55:38', '2017-07-25 05:55:38'),
(24, 'ماليزيا', '<p>العرض يشمل:</p>\r\n<p>1- الاقامة في فنادق 4\\5 نجوم مع الافطار</p>\r\n<p>2- الاستقبال والتوديع والطيران الداخلي</p>\r\n<p>3- الضرائب</p>', 'ماليزيا', 'ماليزيا', 'ماليزيا', 'ماليزيا', 4, 12, '2017-07-25 05:55:39', '2017-07-25 05:55:39'),
(25, 'solovinia', '<p>The package includes:</p>\r\n<p>1- 4 starts hotels</p>\r\n<p>2- Lake view</p>\r\n<p>3- Breakfast</p>', 'solovinia', 'solovinia', 'solovinia', 'solovinia', 2, 13, '2017-07-25 05:59:16', '2017-07-25 05:59:16'),
(26, 'سلوفينيا', '<p>العرض يشمل:</p>\r\n<p>1- فنادق 4 نجوم</p>\r\n<p>2- إطلالة علي بحيرة بيلد</p>\r\n<p>3- الافطار</p>\r\n<p>&nbsp;</p>', 'سلوفينيا', 'سلوفينيا', 'سلوفينيا', 'سلوفينيا', 4, 13, '2017-07-25 05:59:16', '2017-07-25 05:59:16'),
(27, 'Indonsia', '<p>Package includes:</p>\r\n<p>1- 4 stars hotels accomondation</p>\r\n<p>2- breakfast</p>\r\n<p>3- Reception</p>', 'Indonsia', 'Indonsia', 'Indonsia', 'Indonsia', 2, 14, '2017-07-25 06:51:50', '2017-07-25 06:51:50'),
(28, 'اندونيسيا', '<p>العرض يشمل:</p>\r\n<p>1- الاقامة في فنادق 4 نجوم</p>\r\n<p>2- الافطار</p>\r\n<p>3- الالستقبال والتوديع</p>\r\n<p>&nbsp;</p>', 'اندونيسيا', 'اندونيسيا', 'اندونيسيا', 'اندونيسيا', 4, 14, '2017-07-25 06:51:50', '2017-07-25 06:51:50'),
(29, 'Azərbaycan', '<p>Package includes:</p>\r\n<p>1- accomondation in 5 stars hotel with sea view</p>\r\n<p>2- reception</p>\r\n<p>3- touristic tour with a guide</p>\r\n<p>4- all tax</p>', 'Azərbaycan', 'Azərbaycan', 'Azərbaycan', 'Azərbaycan', 2, 15, '2017-07-25 07:09:24', '2017-07-25 07:09:24'),
(30, 'أذربيجان', '<p>العرض يشمل:</p>\r\n<p>1- الاقامة في فنادق 5 نجوم مع اصلالة ع البحر</p>\r\n<p>2- الاستقبال والتوديع</p>\r\n<p>3- الجولات السياحية والمرشد السياحي</p>\r\n<p>4- الضرائب</p>\r\n<p>&nbsp;</p>', 'أذربيجان', 'أذربيجان', 'أذربيجان', 'أذربيجان', 4, 15, '2017-07-25 07:09:24', '2017-07-25 07:09:24'),
(31, 'Free tech', '<p>Free tech</p>', 'Free tech', 'Free tech', 'Free tech', 'Free tech', 2, 16, '2017-07-25 07:12:15', '2017-07-25 07:12:15'),
(32, 'التقنية الحرة', '<p>التقنية الحرة</p>', 'التقنية الحرة', 'التقنية الحرة', 'التقنية الحرة', 'التقنية الحرة', 4, 16, '2017-07-25 07:12:15', '2017-07-25 07:12:15');

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
(7, '1', 'iRNbGN.jpg', '2017-06-20 00:00:00', '2017-06-25 00:00:00', '2017-07-25 00:00:00', '2017-07-31 00:00:00', '2017-06-23 00:00:00', 50, 20, 2345.00, NULL, 100, 3, 3, '2017-06-08 07:11:03', '2017-07-25 05:28:52'),
(10, '1', 'x41IrY.jpg', '2017-06-12 00:00:00', '2017-06-25 00:00:00', '2017-07-30 00:00:00', '2017-08-07 00:00:00', '2017-06-25 00:00:00', 55, 35, 1999.00, NULL, 50, 3, 3, '2017-07-25 05:46:51', '2017-07-25 05:46:51'),
(11, '1', 'ASYa71.jpg', '2017-06-13 00:00:00', '2017-06-25 00:00:00', '2017-06-30 00:00:00', '2017-07-07 00:00:00', '2017-06-25 00:00:00', 55, 50, 1999.00, NULL, 50, 3, 3, '2017-07-25 05:52:30', '2017-07-25 05:52:30'),
(12, '1', 'M66KzA.jpg', '2017-06-13 00:00:00', '2017-06-25 00:00:00', '2017-06-30 00:00:00', '2017-07-07 00:00:00', '2017-06-25 00:00:00', 55, 50, 1999.00, NULL, 50, 3, 3, '2017-07-25 05:55:38', '2017-07-25 05:55:38'),
(13, '1', 'Vyfmt6.jpg', '2017-06-20 00:00:00', '2017-06-30 00:00:00', '2017-08-07 00:00:00', '2017-08-14 00:00:00', '2017-06-30 00:00:00', 55, 50, 1999.00, NULL, 50, 3, 3, '2017-07-25 05:59:16', '2017-07-25 05:59:16'),
(14, '1', 'n1misj.jpg', '2017-06-20 00:00:00', '2017-07-07 00:00:00', '2017-07-14 00:00:00', '2017-07-21 00:00:00', '2017-07-07 00:00:00', 55, 50, 1555.00, NULL, 40, 3, 3, '2017-07-25 06:51:49', '2017-07-25 06:51:49'),
(15, '1', 'HNaife.jpg', '2017-06-20 00:00:00', '2017-06-30 00:00:00', '2017-07-07 00:00:00', '2017-07-14 00:00:00', '2017-06-30 00:00:00', 55, 50, 2345.00, NULL, 100, 3, 3, '2017-07-25 07:09:24', '2017-07-25 07:09:24'),
(16, '1', '3ErDq1.PNG', '2017-07-25 00:00:00', '2017-08-05 00:00:00', '2017-08-13 00:00:00', '2017-08-20 00:00:00', '2017-08-05 00:00:00', 55, 50, 5000.00, NULL, 100, 3, 2, '2017-07-25 07:12:14', '2017-07-25 07:12:14');

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
(22, 'PeVcag.jpg', 7, '2017-06-08 07:42:07', '2017-06-08 07:42:07'),
(27, 'B7Hqok.jpg', 7, '2017-06-28 05:50:18', '2017-06-28 05:50:18'),
(28, 'K7ZRrm.jpg', 7, '2017-06-28 05:50:18', '2017-06-28 05:50:18'),
(29, 'QmFjx3.jpg', 7, '2017-06-28 05:50:19', '2017-06-28 05:50:19'),
(30, '3EHwqj.jpg', 7, '2017-06-28 05:50:19', '2017-06-28 05:50:19'),
(31, 'Repr3R.jpg', 7, '2017-06-28 05:50:20', '2017-06-28 05:50:20'),
(37, 'SlIoJM.jpg', 10, '2017-07-25 06:03:48', '2017-07-25 06:03:48'),
(38, 'EZ2UrQ.jpg', 10, '2017-07-25 06:07:43', '2017-07-25 06:07:43'),
(39, '8ZWetX.jpg', 11, '2017-07-25 06:16:38', '2017-07-25 06:16:38'),
(40, 'xDxV2u.jpg', 11, '2017-07-25 06:16:38', '2017-07-25 06:16:38'),
(41, 'vWJtjM.jpg', 12, '2017-07-25 06:17:32', '2017-07-25 06:17:32'),
(42, 'oPT2Li.jpg', 12, '2017-07-25 06:17:32', '2017-07-25 06:17:32'),
(43, 'Jk33r5.jpg', 13, '2017-07-25 06:18:22', '2017-07-25 06:18:22'),
(44, 'IYagWa.jpg', 13, '2017-07-25 06:18:22', '2017-07-25 06:18:22'),
(45, 'lFUo3N.jpg', 14, '2017-07-25 06:52:42', '2017-07-25 06:52:42'),
(46, 'QOqFP6.jpg', 14, '2017-07-25 06:52:43', '2017-07-25 06:52:43'),
(48, 'Y4Lz3v.jpg', 15, '2017-07-25 07:13:36', '2017-07-25 07:13:36'),
(49, 'zycXZH.jpg', 15, '2017-07-25 07:13:36', '2017-07-25 07:13:36'),
(51, '2189Tz.PNG', 16, '2017-07-25 07:16:21', '2017-07-25 07:16:21'),
(52, '2jxAXG.png', 16, '2017-07-25 07:17:19', '2017-07-25 07:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `package_user`
--

CREATE TABLE `package_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `booking_date` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `payment_method` tinyint(4) DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package_user`
--

INSERT INTO `package_user` (`id`, `package_id`, `user_id`, `booking_date`, `status`, `message`, `payment_method`, `amount`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '2017-06-17 00:00:00', 1, NULL, NULL, '300', NULL, NULL),
(2, 7, 8, '2017-06-21 03:45:51', 2, NULL, NULL, '5004.00', '2017-06-21 01:45:51', '2017-06-21 01:45:51'),
(4, 7, 10, '2017-06-21 03:55:22', 1, '234523', 0, '5800.00', '2017-06-21 01:55:22', '2017-07-11 10:20:34'),
(5, 7, 11, '2017-06-21 05:17:59', 2, NULL, 1, '5800.00', '2017-06-21 03:17:59', '2017-06-21 03:17:59'),
(6, 7, 12, '2017-06-21 05:18:56', 2, NULL, 1, '5800.00', '2017-06-21 03:18:56', '2017-06-21 03:18:56'),
(7, 7, 31, '2017-07-11 09:20:05', 2, ' vzxcvzxcvewsd', 0, '3300.00', '2017-07-11 07:20:05', '2017-07-11 07:20:05'),
(8, 7, 31, '2017-07-11 09:23:21', 1, 'fwadfsd', 0, '3300.00', '2017-07-11 07:23:21', '2017-07-11 10:23:02'),
(9, 7, 31, '2017-07-11 09:23:52', 2, ' vzxcvzxcvewsd', 0, '3300.00', '2017-07-11 07:23:52', '2017-07-11 07:23:52'),
(10, 7, 31, '2017-07-11 09:26:30', 2, ' vzxcvzxcvewsd', 0, '3300.00', '2017-07-11 07:26:30', '2017-07-11 07:26:30'),
(11, 7, 32, '2017-07-11 10:01:47', 1, 'fasdfas', 0, '3800.00', '2017-07-11 08:01:47', '2017-07-11 10:23:08'),
(12, 7, 31, '2017-07-13 09:45:33', 1, ' yrtyeryt', 0, '3773.5', '2017-07-13 07:45:33', '2017-07-25 08:59:16'),
(13, 7, 31, '2017-07-13 11:42:02', 2, ' e5ytwer', 0, '3800', '2017-07-13 09:42:02', '2017-07-13 09:42:02'),
(14, 7, 31, '2017-07-18 14:08:06', 2, '  rgsdgdsfg', 0, '3775', '2017-07-18 12:08:06', '2017-07-18 12:08:06'),
(15, 7, 31, '2017-07-24 07:20:16', 2, ' grtgrw', 1, '3800.00', '2017-07-24 05:20:16', '2017-07-24 05:20:16'),
(16, 7, 31, '2017-07-24 07:29:36', 2, ' htrthehtreh', 1, '3800.00', '2017-07-24 05:29:36', '2017-07-24 05:29:36'),
(17, 7, 31, '2017-07-24 07:56:29', 2, ' shterht', 1, '3800.00', '2017-07-24 05:56:29', '2017-07-24 05:56:29'),
(18, 7, 31, '2017-07-24 07:57:54', 2, ' shterht', 1, '3800.00', '2017-07-24 05:57:54', '2017-07-24 05:57:54'),
(19, 7, 31, '2017-07-24 07:58:19', 2, ' shterht', 1, '3800.00', '2017-07-24 05:58:19', '2017-07-24 05:58:19'),
(20, 7, 31, '2017-07-24 07:59:08', 2, ' shterht', 1, '3800.00', '2017-07-24 05:59:08', '2017-07-24 05:59:08'),
(21, 7, 37, '2017-07-24 08:34:33', 2, ' fgsdgds', 1, '3800.00', '2017-07-24 06:34:33', '2017-07-24 06:34:33'),
(22, 7, 37, '2017-07-24 08:40:16', 2, ' sdfvdsgf', 1, '3800.00', '2017-07-24 06:40:16', '2017-07-24 06:40:16'),
(23, 7, 37, '2017-07-24 08:42:46', 2, ' gsdgfds', 1, '3800.00', '2017-07-24 06:42:46', '2017-07-24 06:42:46'),
(24, 7, 37, '2017-07-24 08:44:25', 2, 'dfgsdfg', 1, '3800.00', '2017-07-24 06:44:25', '2017-07-24 06:44:25'),
(25, 7, 37, '2017-07-24 08:45:00', 2, 'dfgsdfg', 1, '3800.00', '2017-07-24 06:45:00', '2017-07-24 06:45:00'),
(26, 7, 37, '2017-07-24 08:45:07', 2, 'dfgsdfg', 1, '3800.00', '2017-07-24 06:45:07', '2017-07-24 06:45:07'),
(27, 7, 37, '2017-07-24 08:46:46', 2, 'dfgsdfg', 1, '3800.00', '2017-07-24 06:46:46', '2017-07-24 06:46:46'),
(28, 7, 37, '2017-07-24 08:56:48', 2, ' rewgwert', 1, '3800.00', '2017-07-24 06:56:48', '2017-07-24 06:56:48'),
(29, 7, 37, '2017-07-24 09:08:27', 2, ' 41234rqwreq', 1, '3800.00', '2017-07-24 07:08:27', '2017-07-24 07:08:27'),
(30, 7, 37, '2017-07-24 09:11:46', 2, ' uopup', 1, '3800.00', '2017-07-24 07:11:46', '2017-07-24 07:11:46'),
(31, 7, 37, '2017-07-24 09:13:30', 2, ' uopup', 1, '3800.00', '2017-07-24 07:13:30', '2017-07-24 07:13:30'),
(32, 7, 37, '2017-07-24 09:13:44', 2, ' uopup', 1, '3800.00', '2017-07-24 07:13:44', '2017-07-24 07:13:44'),
(33, 7, 37, '2017-07-24 09:13:59', 2, ' uopup', 1, '3800.00', '2017-07-24 07:13:59', '2017-07-24 07:13:59'),
(34, 7, 37, '2017-07-24 09:14:15', 2, ' uopup', 1, '3800.00', '2017-07-24 07:14:15', '2017-07-24 07:14:15'),
(35, 7, 37, '2017-07-24 09:14:37', 2, ' uopup', 1, '3800.00', '2017-07-24 07:14:37', '2017-07-24 07:14:37'),
(36, 7, 37, '2017-07-24 09:16:06', 2, ' uopup', 1, '3800.00', '2017-07-24 07:16:06', '2017-07-24 07:16:06'),
(37, 7, 37, '2017-07-24 09:22:21', 2, ' qegerge', 1, '3800.00', '2017-07-24 07:22:21', '2017-07-24 07:22:21'),
(38, 7, 37, '2017-07-24 09:22:36', 2, ' qegerge', 1, '3800.00', '2017-07-24 07:22:36', '2017-07-24 07:22:36'),
(39, 7, 37, '2017-07-24 09:23:03', 2, ' qegerge', 1, '3800.00', '2017-07-24 07:23:03', '2017-07-24 07:23:03'),
(40, 7, 37, '2017-07-24 09:23:24', 2, ' qegerge', 1, '3800.00', '2017-07-24 07:23:24', '2017-07-24 07:23:24'),
(41, 7, 37, '2017-07-24 09:25:04', 2, ' qegerge', 1, '3800.00', '2017-07-24 07:25:04', '2017-07-24 07:25:04'),
(42, 7, 37, '2017-07-24 09:27:17', 2, ' qegerge', 1, '3800.00', '2017-07-24 07:27:17', '2017-07-24 07:27:17'),
(43, 7, 37, '2017-07-24 09:27:41', 2, ' fadfafsd', 1, '3800.00', '2017-07-24 07:27:41', '2017-07-24 07:27:41'),
(44, 7, 37, '2017-07-24 09:27:59', 2, ' fadfafsd', 1, '3800.00', '2017-07-24 07:27:59', '2017-07-24 07:27:59'),
(45, 7, 37, '2017-07-24 09:29:54', 2, ' fadfafsd', 1, '3800.00', '2017-07-24 07:29:54', '2017-07-24 07:29:54'),
(46, 7, 37, '2017-07-24 09:37:19', 2, ' asdfgsdf', 1, '3800.00', '2017-07-24 07:37:19', '2017-07-24 07:37:19'),
(47, 7, 37, '2017-07-24 09:39:28', 2, ' retrew', 1, '3800.00', '2017-07-24 07:39:28', '2017-07-24 07:39:28'),
(48, 7, 37, '2017-07-24 09:41:13', 2, ' yerytery', 1, '3800', '2017-07-24 07:41:13', '2017-07-24 07:41:13'),
(49, 12, 38, '2017-07-25 09:21:33', 2, ' Very Good', 0, '', '2017-07-25 06:21:33', '2017-07-25 06:21:33'),
(50, 10, 38, '2017-07-25 09:30:08', 2, ' very very', 0, '0', '2017-07-25 06:30:08', '2017-07-25 06:30:08'),
(51, 16, 38, '2017-07-25 10:18:00', 2, 'رائع', 1, '0', '2017-07-25 07:18:00', '2017-07-25 07:18:00'),
(52, 16, 38, '2017-07-25 10:20:06', 2, 'رائع', 1, '0', '2017-07-25 07:20:06', '2017-07-25 07:20:06'),
(53, 16, 38, '2017-07-25 10:21:44', 2, 'great', 1, '0', '2017-07-25 07:21:44', '2017-07-25 07:21:44'),
(54, 10, 31, '2017-07-25 10:25:45', 2, ' gwrge', 1, '', '2017-07-25 07:25:45', '2017-07-25 07:25:45'),
(55, 10, 31, '2017-07-25 10:28:38', 2, ' fweffewfwefwfwfwef', 1, '', '2017-07-25 07:28:38', '2017-07-25 07:28:38'),
(56, 10, 31, '2017-07-25 10:32:23', 2, ' fweffewfwefwfwfwef', 1, '', '2017-07-25 07:32:23', '2017-07-25 07:32:23'),
(57, 10, 31, '2017-07-25 10:37:42', 2, ' iugiuhuo', 1, '1999', '2017-07-25 07:37:42', '2017-07-25 07:37:42'),
(58, 10, 31, '2017-07-25 10:38:09', 2, ' iugiuhuo', 1, '1999', '2017-07-25 07:38:09', '2017-07-25 07:38:09'),
(59, 14, 31, '2017-07-25 11:12:18', 2, ' gsdfgds', 1, '1555', '2017-07-25 08:12:18', '2017-07-25 08:12:18'),
(60, 16, 38, '2017-07-25 11:22:25', 2, ' لقثشف', 1, '5000', '2017-07-25 08:22:25', '2017-07-25 08:22:25'),
(61, 16, 38, '2017-07-25 11:24:04', 2, ' great', 1, '5000', '2017-07-25 08:24:04', '2017-07-25 08:24:04'),
(62, 15, 38, '2017-07-25 11:26:50', 1, '123456789', 0, '2345', '2017-07-25 08:26:50', '2017-07-25 08:28:11'),
(63, 10, 31, '2017-07-25 11:43:54', 2, ' gdfgs', 1, '1999', '2017-07-25 08:43:54', '2017-07-25 08:43:54'),
(64, 13, 38, '2017-07-25 11:44:11', 2, ' great', 1, '1999', '2017-07-25 08:44:11', '2017-07-25 08:44:11'),
(65, 10, 31, '2017-07-25 11:47:15', 2, ' wetwe', 1, '1999', '2017-07-25 08:47:15', '2017-07-25 08:47:15'),
(66, 10, 31, '2017-07-25 11:48:56', 2, ' wetwe', 1, '1999', '2017-07-25 08:48:56', '2017-07-25 08:48:56'),
(67, 7, 31, '2017-07-25 11:52:24', 2, ' ffwegerg', 1, '3145.00', '2017-07-25 08:52:24', '2017-07-25 08:52:24'),
(68, 12, 31, '2017-07-25 11:55:06', 2, ' hfghdf', 1, '1999', '2017-07-25 08:55:06', '2017-07-25 08:55:06'),
(69, 12, 31, '2017-07-25 11:58:22', 2, ' fasdfas', 1, '1999', '2017-07-25 08:58:22', '2017-07-25 08:58:22'),
(70, 13, 38, '2017-07-25 12:04:06', 2, ' great', 1, '1999', '2017-07-25 09:04:06', '2017-07-25 09:04:06'),
(71, 13, 38, '2017-07-25 12:06:44', 2, ' great', 1, '1999', '2017-07-25 09:06:44', '2017-07-25 09:06:44'),
(72, 13, 38, '2017-07-25 12:06:59', 2, ' great', 1, '1999', '2017-07-25 09:06:59', '2017-07-25 09:06:59'),
(73, 7, 31, '2017-07-25 12:07:04', 2, ' dfgsdgf', 1, '3145.00', '2017-07-25 09:07:04', '2017-07-25 09:07:04'),
(74, 11, 31, '2017-07-25 12:09:46', 2, ' fsdafd', 1, '1999', '2017-07-25 09:09:46', '2017-07-25 09:09:46'),
(75, 10, 31, '2017-07-25 12:12:18', 2, ' fsdgfgs', 1, '1999', '2017-07-25 09:12:18', '2017-07-25 09:12:18'),
(76, 10, 31, '2017-07-25 12:12:36', 2, ' fsdgfgs', 1, '1999', '2017-07-25 09:12:36', '2017-07-25 09:12:36'),
(77, 10, 31, '2017-07-25 12:13:05', 1, ' fsdgfgs', 1, '1999', '2017-07-25 09:13:05', '2017-07-25 09:13:28'),
(78, 13, 38, '2017-07-25 12:20:35', 1, ' لقثشف', 1, '1999', '2017-07-25 09:20:35', '2017-07-25 09:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `package_user_option`
--

CREATE TABLE `package_user_option` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_user_id` int(10) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package_user_option`
--

INSERT INTO `package_user_option` (`id`, `package_user_id`, `option_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2017-06-21 01:45:51', '2017-06-21 01:45:51'),
(2, 2, 3, '2017-06-21 01:45:51', '2017-06-21 01:45:51'),
(3, 4, 1, '2017-06-21 01:55:22', '2017-06-21 01:55:22'),
(4, 4, 3, '2017-06-21 01:55:22', '2017-06-21 01:55:22'),
(5, 5, 1, '2017-06-21 03:17:59', '2017-06-21 03:17:59'),
(6, 5, 3, '2017-06-21 03:17:59', '2017-06-21 03:17:59'),
(7, 6, 1, '2017-06-21 03:18:56', '2017-06-21 03:18:56'),
(8, 6, 3, '2017-06-21 03:18:56', '2017-06-21 03:18:56'),
(9, 7, 1, '2017-07-11 07:20:05', '2017-07-11 07:20:05'),
(10, 8, 1, '2017-07-11 07:23:21', '2017-07-11 07:23:21'),
(11, 9, 1, '2017-07-11 07:23:53', '2017-07-11 07:23:53'),
(12, 10, 1, '2017-07-11 07:26:30', '2017-07-11 07:26:30'),
(13, 11, 1, '2017-07-11 08:01:47', '2017-07-11 08:01:47'),
(14, 11, 3, '2017-07-11 08:01:47', '2017-07-11 08:01:47'),
(15, 12, 1, '2017-07-13 07:45:33', '2017-07-13 07:45:33'),
(16, 12, 3, '2017-07-13 07:45:33', '2017-07-13 07:45:33'),
(17, 13, 1, '2017-07-13 09:42:02', '2017-07-13 09:42:02'),
(18, 13, 3, '2017-07-13 09:42:02', '2017-07-13 09:42:02'),
(19, 14, 1, '2017-07-18 12:08:06', '2017-07-18 12:08:06'),
(20, 14, 3, '2017-07-18 12:08:06', '2017-07-18 12:08:06'),
(21, 15, 1, '2017-07-24 05:20:16', '2017-07-24 05:20:16'),
(22, 15, 3, '2017-07-24 05:20:16', '2017-07-24 05:20:16'),
(23, 16, 1, '2017-07-24 05:29:36', '2017-07-24 05:29:36'),
(24, 16, 3, '2017-07-24 05:29:36', '2017-07-24 05:29:36'),
(25, 17, 1, '2017-07-24 05:56:29', '2017-07-24 05:56:29'),
(26, 17, 3, '2017-07-24 05:56:29', '2017-07-24 05:56:29'),
(27, 18, 1, '2017-07-24 05:57:54', '2017-07-24 05:57:54'),
(28, 18, 3, '2017-07-24 05:57:54', '2017-07-24 05:57:54'),
(29, 19, 1, '2017-07-24 05:58:19', '2017-07-24 05:58:19'),
(30, 19, 3, '2017-07-24 05:58:19', '2017-07-24 05:58:19'),
(31, 20, 1, '2017-07-24 05:59:09', '2017-07-24 05:59:09'),
(32, 20, 3, '2017-07-24 05:59:09', '2017-07-24 05:59:09'),
(33, 21, 1, '2017-07-24 06:34:34', '2017-07-24 06:34:34'),
(34, 21, 3, '2017-07-24 06:34:34', '2017-07-24 06:34:34'),
(35, 22, 1, '2017-07-24 06:40:16', '2017-07-24 06:40:16'),
(36, 22, 3, '2017-07-24 06:40:16', '2017-07-24 06:40:16'),
(37, 23, 1, '2017-07-24 06:42:46', '2017-07-24 06:42:46'),
(38, 23, 3, '2017-07-24 06:42:46', '2017-07-24 06:42:46'),
(39, 24, 1, '2017-07-24 06:44:26', '2017-07-24 06:44:26'),
(40, 24, 3, '2017-07-24 06:44:26', '2017-07-24 06:44:26'),
(41, 25, 1, '2017-07-24 06:45:00', '2017-07-24 06:45:00'),
(42, 25, 3, '2017-07-24 06:45:00', '2017-07-24 06:45:00'),
(43, 26, 1, '2017-07-24 06:45:07', '2017-07-24 06:45:07'),
(44, 26, 3, '2017-07-24 06:45:07', '2017-07-24 06:45:07'),
(45, 27, 1, '2017-07-24 06:46:46', '2017-07-24 06:46:46'),
(46, 27, 3, '2017-07-24 06:46:46', '2017-07-24 06:46:46'),
(47, 28, 1, '2017-07-24 06:56:48', '2017-07-24 06:56:48'),
(48, 28, 3, '2017-07-24 06:56:48', '2017-07-24 06:56:48'),
(49, 29, 1, '2017-07-24 07:08:27', '2017-07-24 07:08:27'),
(50, 29, 3, '2017-07-24 07:08:27', '2017-07-24 07:08:27'),
(51, 30, 1, '2017-07-24 07:11:47', '2017-07-24 07:11:47'),
(52, 30, 3, '2017-07-24 07:11:47', '2017-07-24 07:11:47'),
(53, 31, 1, '2017-07-24 07:13:30', '2017-07-24 07:13:30'),
(54, 31, 3, '2017-07-24 07:13:30', '2017-07-24 07:13:30'),
(55, 32, 1, '2017-07-24 07:13:44', '2017-07-24 07:13:44'),
(56, 32, 3, '2017-07-24 07:13:44', '2017-07-24 07:13:44'),
(57, 33, 1, '2017-07-24 07:13:59', '2017-07-24 07:13:59'),
(58, 33, 3, '2017-07-24 07:13:59', '2017-07-24 07:13:59'),
(59, 34, 1, '2017-07-24 07:14:15', '2017-07-24 07:14:15'),
(60, 34, 3, '2017-07-24 07:14:15', '2017-07-24 07:14:15'),
(61, 35, 1, '2017-07-24 07:14:37', '2017-07-24 07:14:37'),
(62, 35, 3, '2017-07-24 07:14:37', '2017-07-24 07:14:37'),
(63, 36, 1, '2017-07-24 07:16:07', '2017-07-24 07:16:07'),
(64, 36, 3, '2017-07-24 07:16:07', '2017-07-24 07:16:07'),
(65, 37, 1, '2017-07-24 07:22:21', '2017-07-24 07:22:21'),
(66, 37, 3, '2017-07-24 07:22:21', '2017-07-24 07:22:21'),
(67, 38, 1, '2017-07-24 07:22:37', '2017-07-24 07:22:37'),
(68, 38, 3, '2017-07-24 07:22:37', '2017-07-24 07:22:37'),
(69, 39, 1, '2017-07-24 07:23:03', '2017-07-24 07:23:03'),
(70, 39, 3, '2017-07-24 07:23:03', '2017-07-24 07:23:03'),
(71, 40, 1, '2017-07-24 07:23:24', '2017-07-24 07:23:24'),
(72, 40, 3, '2017-07-24 07:23:24', '2017-07-24 07:23:24'),
(73, 41, 1, '2017-07-24 07:25:04', '2017-07-24 07:25:04'),
(74, 41, 3, '2017-07-24 07:25:04', '2017-07-24 07:25:04'),
(75, 42, 1, '2017-07-24 07:27:17', '2017-07-24 07:27:17'),
(76, 42, 3, '2017-07-24 07:27:17', '2017-07-24 07:27:17'),
(77, 43, 1, '2017-07-24 07:27:41', '2017-07-24 07:27:41'),
(78, 43, 3, '2017-07-24 07:27:41', '2017-07-24 07:27:41'),
(79, 44, 1, '2017-07-24 07:27:59', '2017-07-24 07:27:59'),
(80, 44, 3, '2017-07-24 07:27:59', '2017-07-24 07:27:59'),
(81, 45, 1, '2017-07-24 07:29:54', '2017-07-24 07:29:54'),
(82, 45, 3, '2017-07-24 07:29:54', '2017-07-24 07:29:54'),
(83, 46, 1, '2017-07-24 07:37:19', '2017-07-24 07:37:19'),
(84, 46, 3, '2017-07-24 07:37:19', '2017-07-24 07:37:19'),
(85, 47, 1, '2017-07-24 07:39:28', '2017-07-24 07:39:28'),
(86, 47, 3, '2017-07-24 07:39:28', '2017-07-24 07:39:28'),
(87, 48, 1, '2017-07-24 07:41:13', '2017-07-24 07:41:13'),
(88, 48, 3, '2017-07-24 07:41:13', '2017-07-24 07:41:13'),
(89, 67, 1, '2017-07-25 08:52:24', '2017-07-25 08:52:24'),
(90, 67, 3, '2017-07-25 08:52:24', '2017-07-25 08:52:24'),
(91, 73, 1, '2017-07-25 09:07:04', '2017-07-25 09:07:04'),
(92, 73, 3, '2017-07-25 09:07:04', '2017-07-25 09:07:04');

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
-- Table structure for table `payfort`
--

CREATE TABLE `payfort` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `card_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `holder_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_option` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fort_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `response_message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payfort`
--

INSERT INTO `payfort` (`id`, `amount`, `card_number`, `holder_name`, `payment_option`, `customer_ip`, `fort_id`, `response_message`, `customer_email`, `customer_name`, `created_at`, `updated_at`) VALUES
(1, 100000.00, '400555******0001', 'eslam', 'VISA', '127.0.0.1', '150088286600021429', 'Success', 'smehdarai@tfcs.com.sa', 'John Doe', '2017-07-24 05:59:56', '2017-07-24 05:59:56'),
(2, 3800.00, '400555******0001', 'eslam', 'VISA', '127.0.0.1', '150088888200021815', 'Success', 'test@testtest.com', 'hamada', '2017-07-24 07:39:51', '2017-07-24 07:39:51'),
(3, 5000.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098155600024711', 'Success', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 08:24:31', '2017-07-25 08:24:31'),
(4, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098276500024808', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 08:44:38', '2017-07-25 08:44:38'),
(5, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098276500024808', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 08:45:18', '2017-07-25 08:45:18'),
(6, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098276500024808', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 08:45:26', '2017-07-25 08:45:26'),
(7, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098276500024808', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 08:45:48', '2017-07-25 08:45:48'),
(8, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098276500024808', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 08:46:06', '2017-07-25 08:46:06'),
(9, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098276500024808', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 08:47:20', '2017-07-25 08:47:20'),
(10, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098276500024808', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 08:48:01', '2017-07-25 08:48:01'),
(11, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098276500024808', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 08:48:06', '2017-07-25 08:48:06'),
(12, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098276500024808', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 08:49:22', '2017-07-25 08:49:22'),
(13, 1999.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098305800024820', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:49:31', '2017-07-25 08:49:31'),
(14, 1999.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098305800024820', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:51:51', '2017-07-25 08:51:51'),
(15, 3145.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098325600024833', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:52:48', '2017-07-25 08:52:48'),
(16, 3145.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098325600024833', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:53:35', '2017-07-25 08:53:35'),
(17, 3145.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098325600024833', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:54:37', '2017-07-25 08:54:37'),
(18, 3145.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098325600024833', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:54:39', '2017-07-25 08:54:39'),
(19, 1999.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098342200024848', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:55:35', '2017-07-25 08:55:35'),
(20, 1999.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098342200024848', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:56:32', '2017-07-25 08:56:32'),
(21, 1999.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098342200024848', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:56:52', '2017-07-25 08:56:52'),
(22, 1999.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098342200024848', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:57:23', '2017-07-25 08:57:23'),
(23, 1999.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098342200024848', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:57:53', '2017-07-25 08:57:53'),
(24, 1999.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098342200024848', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:57:56', '2017-07-25 08:57:56'),
(25, 1999.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098361200024858', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:58:45', '2017-07-25 08:58:45'),
(26, 1999.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098361200024858', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 08:59:16', '2017-07-25 08:59:16'),
(27, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098276500024808', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 09:00:08', '2017-07-25 09:00:08'),
(28, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098276500024808', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 09:03:25', '2017-07-25 09:03:25'),
(29, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098276500024808', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 09:03:26', '2017-07-25 09:03:26'),
(30, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098400000024893', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 09:05:14', '2017-07-25 09:05:14'),
(31, 3145.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098413400024912', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 09:07:27', '2017-07-25 09:07:27'),
(32, 1999.00, '400555******0001', 'bahy', 'VISA', '156.194.92.253', '150098413700024914', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 09:07:31', '2017-07-25 09:07:31'),
(33, 3145.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098413400024912', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 09:09:09', '2017-07-25 09:09:09'),
(34, 1999.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098429800024931', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 09:10:10', '2017-07-25 09:10:10'),
(35, 1999.00, '400555******0001', 'eslam', 'VISA', '156.194.92.253', '150098449600024948', 'Transaction declined', 'eng.es.kalash@gmail.com', 'eslam', '2017-07-25 09:13:28', '2017-07-25 09:13:28'),
(36, 1999.00, '400555******0001', 'لاشاغ', 'VISA', '156.194.92.253', '150098494800025008', 'Transaction declined', 'eng.bahyelkashef@gmail.com', 'Bahy', '2017-07-25 09:21:02', '2017-07-25 09:21:02');

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `rate` double(8,2) UNSIGNED DEFAULT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `rate`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 4.00, 7, '2017-07-04 07:58:49', '2017-07-04 07:58:49'),
(2, 4.00, 7, '2017-07-04 08:16:49', '2017-07-04 08:16:49'),
(3, 4.00, 7, '2017-07-04 08:17:25', '2017-07-04 08:17:25'),
(5, 3.00, 7, '2017-07-13 08:12:37', '2017-07-13 08:12:37'),
(6, 4.00, 7, '2017-07-18 12:07:02', '2017-07-18 12:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `email`, `message`, `status`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 'eng.es.kalash@gmail.com', 'hreterhtr', '1', 7, '2017-07-04 07:51:34', '2017-07-04 09:36:33'),
(2, 'eng.es.kalash@gmail.com', 'gsdfgsdgfsdg', '0', 7, '2017-07-04 07:53:12', '2017-07-04 07:53:12'),
(3, 'eng.es.kalash@gmail.com', 'rthrwgergvewgervw', '0', 7, '2017-07-04 07:58:49', '2017-07-04 07:58:49'),
(4, 'eng.es.kalash@gmail.com', 'rthrwgergvewgervw', '0', 7, '2017-07-04 08:16:49', '2017-07-04 08:16:49'),
(5, 'eng.es.kalash@gmail.com', 'rthrwgergvewgervw', '0', 7, '2017-07-04 08:17:25', '2017-07-04 08:17:25'),
(7, 'eng.es.kalash@gmail.com', 'oityjoiehmiotemoihtoe', '1', 7, '2017-07-13 08:12:37', '2017-07-13 08:58:48'),
(8, 'eng.es.kalash@gmail.com', 'hghfdghdfhgdfh', '0', 7, '2017-07-18 12:07:02', '2017-07-18 12:07:02');

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
-- Table structure for table `slider-description`
--

CREATE TABLE `slider-description` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `second_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `third_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slider_id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider-description`
--

INSERT INTO `slider-description` (`id`, `first_text`, `second_text`, `third_text`, `slider_id`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 'slider huhuihiioEnglish', 'slider English', 'slider English', 1, 2, '2017-06-22 07:55:38', '2017-06-29 17:35:37'),
(2, 'slider Arabic', 'slider Arabic', 'slider Arabic', 1, 4, '2017-06-22 07:55:38', '2017-06-22 07:55:38'),
(3, 'test text2 English', 'test text2 English', 'test text2 English', 2, 2, '2017-06-27 08:46:07', '2017-06-27 08:46:07'),
(4, 'test text2 Arabic', 'test text2 Arabic', 'test text2 Arabic', 2, 4, '2017-06-27 08:46:07', '2017-06-27 08:46:07'),
(5, 'test English', 'test English', 'test English', 3, 2, '2017-06-27 09:08:16', '2017-06-27 09:08:16'),
(6, 'test Arabic', 'test Arabic', 'test Arabic', 3, 4, '2017-06-27 09:08:16', '2017-06-27 09:08:16'),
(7, 'test2 English', 'test2 afsdfasfdasfdEnglish', 'test2 English', 4, 2, '2017-06-27 09:09:02', '2017-06-27 09:41:24'),
(8, 'test2 Arabic', 'test2 Arabic', 'test2 Arabic', 4, 4, '2017-06-27 09:09:02', '2017-06-27 09:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'WHqzij.jpg', '2017-06-22 07:55:38', '2017-06-29 09:46:08'),
(2, 'KIBTop.jpg', '2017-06-27 08:46:07', '2017-06-29 09:46:25'),
(3, 'sFCtC9.jpg', '2017-06-27 09:08:16', '2017-06-29 09:46:39'),
(4, 'JYDLRO.jpg', '2017-06-27 09:09:02', '2017-06-27 09:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `url`, `icon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'https://www.google.com.eg', 'fa fa-facebook', 1, '2017-07-13 12:34:21', '2017-07-13 12:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `ticket-details`
--

CREATE TABLE `ticket-details` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ticket-details`
--

INSERT INTO `ticket-details` (`id`, `description`, `admin_id`, `ticket_id`, `created_at`, `updated_at`) VALUES
(1, 'fgfdsgsdfgsdfgdfs', 1, 2, '2017-07-08 14:59:38', '2017-07-08 14:59:38'),
(2, 'gsdfgsdgsdf', 1, 3, '2017-07-08 15:00:37', '2017-07-08 15:00:37'),
(3, 'fasgsdgfsgd', 1, 4, '2017-07-08 15:01:52', '2017-07-08 15:01:52'),
(4, 'sgdfgsdgfsdg', 1, 5, '2017-07-08 15:06:15', '2017-07-08 15:06:15'),
(5, 'eiojhithioerjhitojheoi', 1, 5, '2017-07-09 06:07:47', '2017-07-09 06:07:47'),
(6, 'cvnbcvnbnfhtyrtn', 1, 5, '2017-07-09 06:08:24', '2017-07-09 06:08:24'),
(7, 'ntntynrtntry', 1, 5, '2017-07-09 06:08:43', '2017-07-09 06:08:43'),
(8, 'svegarag', 1, 8, '2017-07-09 19:05:38', '2017-07-09 19:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `department` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `email`, `message`, `department`, `user_id`, `status`, `uid`, `created_at`, `updated_at`) VALUES
(1, 'testl;dkhsopdf', 'eng.es.kalash@gmail.com', 'fgfdsgsdfgsdfgdfs', 'accountant', NULL, 0, 'TF-385116', '2017-07-08 14:59:24', '2017-07-08 14:59:24'),
(2, 'testl;dkhsopdf', 'eng.es.kalash@gmail.com', 'fgfdsgsdfgsdfgdfs', 'accountant', NULL, 0, 'TF-385116', '2017-07-08 14:59:38', '2017-07-08 14:59:38'),
(3, 'tagufusdfiausfd', 'eng.es.kalash@gmail.com', 'gsdfgsdgsdf', 'accountant', NULL, 0, 'TF-385116', '2017-07-08 15:00:36', '2017-07-08 15:00:36'),
(4, 'test', 'fidsuaghasiu@byufagsydf.com', 'fasgsdgfsgd', 'customer service', NULL, 0, 'TF-385116', '2017-07-08 15:01:52', '2017-07-08 15:01:52'),
(5, 'gsdfgsdg', 'gfsdfgs@gsdfgsd.com', 'sgdfgsdgfsdg', 'customer service', NULL, 0, 'TF-385117', '2017-07-08 15:06:15', '2017-07-08 15:06:15'),
(6, 'test ticket', NULL, 'svegarag', 'sales', 31, 0, 'TF-385118', '2017-07-09 19:03:49', '2017-07-09 19:03:49'),
(7, 'test ticket', NULL, 'svegarag', 'sales', 31, 0, 'TF-385119', '2017-07-09 19:04:28', '2017-07-09 19:04:28'),
(8, 'test ticket', NULL, 'svegarag', 'sales', 31, 0, 'TF-385120', '2017-07-09 19:05:30', '2017-07-09 19:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `traveller-description`
--

CREATE TABLE `traveller-description` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `traveller_history_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traveller-description`
--

INSERT INTO `traveller-description` (`id`, `title`, `description`, `author`, `slug`, `meta_title`, `meta_description`, `lang_id`, `traveller_history_id`, `created_at`, `updated_at`) VALUES
(1, 'traveller English', '<article class=\"post-content\">\r\n<p>Augue sed platea sed non porta tincidunt augue? Odio platea, pulvinar habitasse vut! Pulvinar, integer odio. Ac pid! Habitasse montes elementum, et sagittis tincidunt magnis? Sociis! Elementum quis, integer natoque sed auctor nascetur enim parturient ridiculus ut amet porttitor dapibus phasellus tempor, natoque adipiscing aliquam. Amet. Dapibus proin, elit ut!</p>\r\n<p>Nec? Mid lundium, turpis sit sagittis, in porttitor augue, magna dis, ultrices vel porttitor dapibus tincidunt, elementum lorem, massa odio porta. Sit ac proin odio, platea adipiscing, tempor sagittis enim a, eros proin.</p>\r\n<p><img class=\"alignleft\" src=\"/admin/blog/2/img/in-post-image.jpg\" alt=\"Image in Post\" /> In! Vel magna nisi aliquam, magnis tempor, nunc dapibus sed porta vut porttitor tristique! Lectus turpis massa ridiculus sagittis tincidunt eros lundium etiam nisi non natoque ac arcu auctor elementum vel nunc sociis! Nunc lacus! Dictumst facilisis turpis, integer? Nec nec. Nunc scelerisque diam! Cum sit arcu, mus in, nisi non etiam arcu a magna etiam nisi porttitor turpis! Natoque ac porta pellentesque nunc placerat porttitor sed porta urna, est ut ut adipiscing, tortor montes, massa urna dictumst ac, pellentesque facilisis nisi arcu! Tortor lacus elementum eros, placerat arcu. Adipiscing platea purus sagittis ridiculus turpis, nunc dictumst ac?</p>\r\n<!-- BLOCKQUOTE -->\r\n<blockquote>\r\n<p><strong>BLOCK QUOTE</strong></p>\r\n<p>In! Vel magna nisi aliquam, magnis tempor, nunc dapibus sed porta vut porttitor tristique! Lectus turpis massa ridiculus sagittis tincidunt eros lundium etiam nisi non natoque ac arcu auctor elementum vel nunc sociis!</p>\r\n</blockquote>\r\n<p>Augue sed platea sed non porta tincidunt augue? Odio platea, pulvinar habitasse vut! Pulvinar, integer odio. Ac pid! Habitasse montes elementum, et sagittis tincidunt magnis? Sociis! Elementum quis, integer natoque sed auctor nascetur enim parturient ridiculus ut amet porttitor dapibus phasellus tempor, natoque adipiscing aliquam.</p>\r\n</article>', 'traveller English', 'traveller English', 'traveller English', 'traveller English', 2, 1, '2017-06-22 06:39:28', '2017-06-29 03:17:21'),
(2, 'traveller Arabic', '<article class=\"post-content\">\r\n<p>Augue sed platea sed non porta tincidunt augue? Odio platea, pulvinar habitasse vut! Pulvinar, integer odio. Ac pid! Habitasse montes elementum, et sagittis tincidunt magnis? Sociis! Elementum quis, integer natoque sed auctor nascetur enim parturient ridiculus ut amet porttitor dapibus phasellus tempor, natoque adipiscing aliquam. Amet. Dapibus proin, elit ut!</p>\r\n<p>Nec? Mid lundium, turpis sit sagittis, in porttitor augue, magna dis, ultrices vel porttitor dapibus tincidunt, elementum lorem, massa odio porta. Sit ac proin odio, platea adipiscing, tempor sagittis enim a, eros proin.</p>\r\n<p><img class=\"alignleft\" src=\"/admin/blog/2/img/in-post-image.jpg\" alt=\"Image in Post\" /> In! Vel magna nisi aliquam, magnis tempor, nunc dapibus sed porta vut porttitor tristique! Lectus turpis massa ridiculus sagittis tincidunt eros lundium etiam nisi non natoque ac arcu auctor elementum vel nunc sociis! Nunc lacus! Dictumst facilisis turpis, integer? Nec nec. Nunc scelerisque diam! Cum sit arcu, mus in, nisi non etiam arcu a magna etiam nisi porttitor turpis! Natoque ac porta pellentesque nunc placerat porttitor sed porta urna, est ut ut adipiscing, tortor montes, massa urna dictumst ac, pellentesque facilisis nisi arcu! Tortor lacus elementum eros, placerat arcu. Adipiscing platea purus sagittis ridiculus turpis, nunc dictumst ac?</p>\r\n<!-- BLOCKQUOTE -->\r\n<blockquote>\r\n<p><strong>BLOCK QUOTE</strong></p>\r\n<p>In! Vel magna nisi aliquam, magnis tempor, nunc dapibus sed porta vut porttitor tristique! Lectus turpis massa ridiculus sagittis tincidunt eros lundium etiam nisi non natoque ac arcu auctor elementum vel nunc sociis!</p>\r\n</blockquote>\r\n<p>Augue sed platea sed non porta tincidunt augue? Odio platea, pulvinar habitasse vut! Pulvinar, integer odio. Ac pid! Habitasse montes elementum, et sagittis tincidunt magnis? Sociis! Elementum quis, integer natoque sed auctor nascetur enim parturient ridiculus ut amet porttitor dapibus phasellus tempor, natoque adipiscing aliquam.</p>\r\n</article>', 'traveller Arabic', 'traveller Arabic', 'traveller Arabic', 'traveller Arabic', 4, 1, '2017-06-22 06:39:28', '2017-06-29 03:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `travellers-history`
--

CREATE TABLE `travellers-history` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `travellers-history`
--

INSERT INTO `travellers-history` (`id`, `status`, `image_url`, `created_at`, `updated_at`) VALUES
(1, '1', 'SvTy9k.jpg', '2017-06-22 06:39:27', '2017-06-29 04:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `points` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `remember_token`, `city`, `country`, `street`, `mobile_number`, `points`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'user', 'emad', 'rashad', 'user@user.com', '$1$vxrzNrQv$uBU7QWh8y79IUL8zgw6pd1', 'RgDfbDdDwPg1', NULL, NULL, NULL, NULL, NULL, 1, '2017-06-11 05:45:12', '2017-06-11 05:45:12'),
(2, 'anemam@anemam.com', 'eslam', 'Ahmed', 'anemam@anemam.com', '$1$CRR5J9h0$pFBVHgHe4EcKON7.vrfCY1', NULL, 'Cairo', 'Egypt', 'fkmeoirmo', '01248785488', NULL, 1, '2017-06-21 00:21:57', '2017-06-21 00:21:57'),
(3, 'sgsdfd@gsdgf', 'sgfgsd', 'fsgfg', 'sgsdfd@gsdgf', '$1$1O420wsK$MgyMKN.dbm91jsJniuLSB.', NULL, 'sdgfsdg', 'gfgsdfg', 'sgdfgsdgf', '42354235', NULL, 1, '2017-06-21 01:16:19', '2017-06-21 01:16:19'),
(4, 'sgsdfd@jyrjyrtjtjyrtjytr', 'sgfgsd', 'fsgfg', 'sgsdfd@jyrjyrtjtjyrtjytr', '$1$3MbjxJu7$Zm1HhEhBublu68LwIhFR4/', NULL, 'sdgfsdg', 'gfgsdfg', 'sgdfgsdgf', '42354235', NULL, 1, '2017-06-21 01:17:24', '2017-06-21 01:17:24'),
(5, 'sgsdfd@5464ppo', 'sgfgsd', 'fsgfg', 'sgsdfd@5464ppo', '$1$KkKdhbxg$kN4tmz9b3enYcfdqo/ZCj/', NULL, 'sdgfsdg', 'gfgsdfg', 'sgdfgsdgf', '42354235', NULL, 1, '2017-06-21 01:22:10', '2017-06-21 01:22:10'),
(6, 'sgsdfd@fsgdfgsg', 'sgfgsd', 'fsgfg', 'sgsdfd@fsgdfgsg', '$1$VE7vVZNa$1GpCHrq8c4arw.kUqYvIW1', NULL, 'sdgfsdg', 'gfgsdfg', 'sgdfgsdgf', '42354235', NULL, 1, '2017-06-21 01:22:53', '2017-06-21 01:22:53'),
(7, 'sgsdfd@fsgdfgdsgfsdgsg', 'sgfgsd', 'fsgfg', 'sgsdfd@fsgdfgdsgfsdgsg', '$1$eBawauHI$KgJR0Ai/mz4.THKF6wL5f.', NULL, 'sdgfsdg', 'gfgsdfg', 'sgdfgsdgf', '42354235', NULL, 1, '2017-06-21 01:23:34', '2017-06-21 01:23:34'),
(8, 'sgsdfd@hgdhgd', 'sgfgsd', 'fsgfg', 'sgsdfd@hgdhgd', '$1$6YJMaiC6$oxnostt97tkag8QCHmQpI/', NULL, 'sdgfsdg', 'gfgsdfg', 'sgdfgsdgf', '42354235', NULL, 1, '2017-06-21 01:45:51', '2017-06-21 01:45:51'),
(9, 'gsdfgsgdf@sfdagsdfgdsgfs', 'gsdgdfgsd', 'sdfgdsgfsd', 'gsdfgsgdf@sfdagsdfgdsgfs', '$1$vcSxQ.CU$O17x5YVIqJwGjRtlgyCNd/', NULL, 'wetwetr', 'tetwetrwet', 'wertwe', '4235423534523', NULL, 1, '2017-06-21 01:53:12', '2017-06-21 01:53:12'),
(10, 'gsdfgsgdf@sfdagsdfgertyeryrtyetydsgfs', 'gsdgdfgsd', 'sdfgdsgfsd', 'gsdfgsgdf@sfdagsdfgertyeryrtyetydsgfs', '$1$Dgjo4HQ6$t02uU.KS6KvV7OHrWMYgZ/', NULL, 'wetwetr', 'tetwetrwet', 'wertwe', '4235423534523', NULL, 1, '2017-06-21 01:55:22', '2017-06-21 01:55:22'),
(11, 'hrtherht@fgbdfbgdntry', 'thetherh', 'hetrherh', 'hrtherht@fgbdfbgdntry', '$1$G8ZEwesi$qR9jAs6iHnixlIzH1fCj2/', NULL, 'fdhfhd', 'dhfghdfh', 'dfhdfh', '3653465346', NULL, 1, '2017-06-21 03:17:58', '2017-06-21 03:17:58'),
(12, 'hterhte@gfhrjtyjt', 'hrethre', 'htretherht', 'hterhte@gfhrjtyjt', '$1$MV2.WnaQ$VxPzz/FlwYiALaAHNXVtF1', 'C2RAEK99f9Uvz1xAC5fA90Mk677FyJIG0u800Vac6kKentJuEgFkgqK1e9AJ', 'werg', 'gwergew', 'gwegrwe', '4325423', NULL, 1, '2017-06-21 03:18:55', '2017-06-21 03:21:41'),
(31, 'Anemam_eslam', 'eslam', 'eslamgusgh8au', 'eng.es.kalash@gmail.com', '$1$tPvceNUi$FWfrrmW068KcBXAoyg/v8.', 'o9c9sbaQ7LZyBPI8czCIkC2EaY9Bg4d03rRhnp1Ty0U6eE7ClC1ztBjQhR2M', NULL, NULL, 'faskgnaogjoifadgjdisojgf', '01008822347', '0', 0, '2017-07-03 09:10:53', '2017-07-26 03:55:33'),
(32, 'etest@yuzgfyds.com', 'eslam', 'Hamada', 'etest@yuzgfyds.com', '$1$2xA5WdR9$ofQjO2Ql6MfaXr68XdkUe.', NULL, 'Al Jizah', 'Egypt', 'gowijg9werigiewjgre', '01008822347', NULL, 1, '2017-07-11 08:01:46', '2017-07-11 08:01:46'),
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-07-13 08:49:02', '2017-07-13 08:49:02'),
(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-07-13 08:50:23', '2017-07-13 08:50:23'),
(37, 'test@testtest.com', 'hamada', 'tasnem', 'test@testtest.com', '$1$91liQIop$L5.SweSB98u9PgzDwrBYj0', NULL, 'Aswan', 'Egypt', 'refdsadg', '01008822347', '0', 1, '2017-07-24 06:34:33', '2017-07-24 06:40:16'),
(38, 'eng.bahyelkashef@gmail.com', 'Bahy', 'Hossam', 'eng.bahyelkashef@gmail.com', '$1$65u4xzQw$bNM8xbAdI2U2EbLnjkoUF0', NULL, NULL, NULL, 'Building #9, El Mostasmer Buildings, Elshiekh Zayed, Giza', '1100713000', '0', 0, '2017-07-25 06:21:33', '2017-07-25 06:30:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_description`
--
ALTER TABLE `about_description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_description_about_id_foreign` (`about_id`);

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
-- Indexes for table `advertisments`
--
ALTER TABLE `advertisments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog-description`
--
ALTER TABLE `blog-description`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_description_slug_unique` (`slug`),
  ADD KEY `blog_description_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career-description`
--
ALTER TABLE `career-description`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `career_description_slug_unique` (`slug`),
  ADD KEY `career_description_career_id_foreign` (`career_id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_blog_id_foreign` (`blog_id`);

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
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_group_id_foreign` (`group_id`);

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
-- Indexes for table `package_user`
--
ALTER TABLE `package_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_user_package_id_foreign` (`package_id`),
  ADD KEY `package_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `package_user_option`
--
ALTER TABLE `package_user_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_user_option_option_id_foreign` (`option_id`),
  ADD KEY `package_user_option_package_user_id_foreign` (`package_user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payfort`
--
ALTER TABLE `payfort`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_package_id_foreign` (`package_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_package_id_foreign` (`package_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `slider-description`
--
ALTER TABLE `slider-description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_description_slider_id_foreign` (`slider_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket-details`
--
ALTER TABLE `ticket-details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_details_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_details_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traveller-description`
--
ALTER TABLE `traveller-description`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `traveller_description_slug_unique` (`slug`),
  ADD KEY `traveller_description_traveller_history_id_foreign` (`traveller_history_id`);

--
-- Indexes for table `travellers-history`
--
ALTER TABLE `travellers-history`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `about_description`
--
ALTER TABLE `about_description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `advertisments`
--
ALTER TABLE `advertisments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blog-description`
--
ALTER TABLE `blog-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `career-description`
--
ALTER TABLE `career-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category-description`
--
ALTER TABLE `category-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `option-description`
--
ALTER TABLE `option-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `option-package`
--
ALTER TABLE `option-package`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `package-description`
--
ALTER TABLE `package-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `packages-gallery`
--
ALTER TABLE `packages-gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `package_user`
--
ALTER TABLE `package_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `package_user_option`
--
ALTER TABLE `package_user_option`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `payfort`
--
ALTER TABLE `payfort`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider-description`
--
ALTER TABLE `slider-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ticket-details`
--
ALTER TABLE `ticket-details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `traveller-description`
--
ALTER TABLE `traveller-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `travellers-history`
--
ALTER TABLE `travellers-history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_description`
--
ALTER TABLE `about_description`
  ADD CONSTRAINT `about_description_about_id_foreign` FOREIGN KEY (`about_id`) REFERENCES `abouts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog-description`
--
ALTER TABLE `blog-description`
  ADD CONSTRAINT `blog_description_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `career-description`
--
ALTER TABLE `career-description`
  ADD CONSTRAINT `career_description_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category-description`
--
ALTER TABLE `category-description`
  ADD CONSTRAINT `category_description_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `package_user`
--
ALTER TABLE `package_user`
  ADD CONSTRAINT `package_user_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_user_option`
--
ALTER TABLE `package_user_option`
  ADD CONSTRAINT `package_user_option_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `package_user_option_package_user_id_foreign` FOREIGN KEY (`package_user_id`) REFERENCES `package_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slider-description`
--
ALTER TABLE `slider-description`
  ADD CONSTRAINT `slider_description_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket-details`
--
ALTER TABLE `ticket-details`
  ADD CONSTRAINT `ticket_details_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_details_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `traveller-description`
--
ALTER TABLE `traveller-description`
  ADD CONSTRAINT `traveller_description_traveller_history_id_foreign` FOREIGN KEY (`traveller_history_id`) REFERENCES `travellers-history` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
