-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2022 at 08:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `brand`, `linkedIn`, `contact`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Tveloper', 'https://linkedIn.id', '085775088586', 'https://tveloper.id/we', '2022-09-03 22:06:35', '2022-09-03 22:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `bookcategory`
--

CREATE TABLE `bookcategory` (
  `doc_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `cat_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Details of categories that books are categorized in.';

--
-- Dumping data for table `bookcategory`
--

INSERT INTO `bookcategory` (`doc_id`, `cat_id`) VALUES
(1000002, 103),
(1000003, 104),
(1000004, 101),
(1000005, 102),
(1000006, 105),
(1000007, 105);

-- --------------------------------------------------------

--
-- Table structure for table `bookformat`
--

CREATE TABLE `bookformat` (
  `format_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `doc_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Details of formats that books are available in.';

--
-- Dumping data for table `bookformat`
--

INSERT INTO `bookformat` (`format_id`, `doc_id`) VALUES
(11, 1000001),
(11, 1000002),
(11, 1000003),
(11, 1000004),
(11, 1000005),
(11, 1000006),
(11, 1000007),
(11, 1000008),
(12, 1000001),
(12, 1000002),
(12, 1000003),
(12, 1000004),
(12, 1000005),
(12, 1000006),
(12, 1000007),
(12, 1000008),
(13, 1000001),
(13, 1000002),
(13, 1000003),
(13, 1000004),
(13, 1000005),
(13, 1000006),
(13, 1000007),
(13, 1000008),
(14, 1000001);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` enum('verified','rejected','verification') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `image`, `title`, `author`, `publisher`, `description`, `price`, `stock`, `status`, `user_id`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2022080001', 'book1.jpeg', 'Java Developer', 'Eko', 'Programmer zaman now', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, beatae.', 100000, 10, 'verified', '2', 1, NULL, '2022-09-03 22:06:35', '2022-09-03 22:06:35'),
(2, '2022080002', 'book2.jpg', 'Web Developer', 'Eko', 'Programmer zaman now', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, beatae.', 100000, 10, 'verified', '2', 2, NULL, '2022-09-03 22:06:35', '2022-09-03 22:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lent_at` datetime NOT NULL,
  `due_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Java programming', 'java-programming', '2022-09-03 22:06:35', '2022-09-03 22:06:35'),
(2, 'Web programming', 'web-programming', '2022-09-03 22:06:35', '2022-09-03 22:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `categoryrelation`
--

CREATE TABLE `categoryrelation` (
  `from` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `to` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Listing of relations between categories.';

--
-- Dumping data for table `categoryrelation`
--

INSERT INTO `categoryrelation` (`from`, `to`) VALUES
(102, 105),
(103, 102);

-- --------------------------------------------------------

--
-- Table structure for table `lents`
--

CREATE TABLE `lents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lent_at` datetime NOT NULL,
  `due_at` datetime NOT NULL,
  `return_at` datetime DEFAULT NULL,
  `price` int(11) NOT NULL,
  `status_returned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amercement` int(11) NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `snap_token` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donatur_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_08_10_043834_create_users_table', 1),
(3, '2022_08_10_043903_create_roles_table', 1),
(4, '2022_08_13_143502_create_books_table', 1),
(5, '2022_08_14_010637_create_categories_table', 1),
(6, '2022_08_14_043632_create_lents_table', 1),
(7, '2022_08_16_123435_create_blogs_table', 1),
(8, '2022_08_23_002102_create_carts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-09-03 22:06:35', '2022-09-03 22:06:35'),
(2, 'donatur', '2022-09-03 22:06:35', '2022-09-03 22:06:35'),
(3, 'user', '2022-09-03 22:06:35', '2022-09-03 22:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `stat`
--

CREATE TABLE `stat` (
  `item` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `stat` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Stats of various items in the database';

--
-- Dumping data for table `stat`
--

INSERT INTO `stat` (`item`, `stat`) VALUES
(1000001, 0),
(1000002, 0),
(1000003, 0),
(1000004, 0),
(100001, 0),
(100002, 0),
(100003, 0),
(100004, 0),
(100005, 0),
(100006, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','verification') COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `status`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '0898989898', 'admin@gmail.com', '$2y$10$GyEbI9mZOYW6V8Og8Qf8HeCHt1GaSJapXECtu.Jo4weyjBTOf6awS', 'active', 1, '2022-09-03 22:06:35', '2022-09-03 22:06:35'),
(2, 'Agus Salim', '0898939339', 'donatur@gmail.com', '$2y$10$H5WgBHGAbhPDjudoqYUPrOnqzppT0NQcyXlHHd88VvUaVOIcBKdRu', 'active', 2, '2022-09-03 22:06:35', '2022-09-03 22:06:35'),
(3, 'Ambar', '0888889292', 'member1@gmail.com', '$2y$10$6DTZWrSpmSNr85sTYoHaoOXecyZ8AEDhXPO6d2EKcc43xCFWHL0GS', 'active', 3, '2022-09-03 22:06:35', '2022-09-03 22:06:35'),
(4, 'Bonita', '0899991010', 'member2@gmail.com', '$2y$10$ki4T16N5/Ja.nNkPRYf20.e4Bpc2OotveldLhAsFtxG6ZR6VohaiG', 'active', 3, '2022-09-03 22:06:35', '2022-09-03 22:06:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD PRIMARY KEY (`doc_id`,`cat_id`);

--
-- Indexes for table `bookformat`
--
ALTER TABLE `bookformat`
  ADD PRIMARY KEY (`format_id`,`doc_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `categoryrelation`
--
ALTER TABLE `categoryrelation`
  ADD PRIMARY KEY (`from`,`to`);

--
-- Indexes for table `lents`
--
ALTER TABLE `lents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stat`
--
ALTER TABLE `stat`
  ADD PRIMARY KEY (`item`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lents`
--
ALTER TABLE `lents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
