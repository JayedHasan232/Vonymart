-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 08:25 AM
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
-- Database: `vonymart`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_04_15_122524_create_products_table', 2),
(10, '2021_04_15_122602_create_product_categories_table', 2),
(11, '2021_04_15_122638_create_product_sub_categories_table', 2),
(12, '2021_04_16_153205_create_product_brands_table', 2),
(13, '2021_04_22_132153_create_wishlists_table', 2);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `privacy` tinyint(1) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_medium` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_small` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `privacy`, `title`, `url`, `price`, `brand_id`, `category_id`, `sub_category_id`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `image`, `image_medium`, `image_small`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Testo TiS20+ MAX Thermal Scanner', 'testo-tis20-max-thermal-scanner', NULL, 1, 4, 10, NULL, 'Testo TiS20+ MAX Thermal Scanner', NULL, NULL, 'images/products/binary-fountain-telemedicine-patient-experience-1621575280.jpg', 'images/products/medium/binary-fountain-telemedicine-patient-experience-1621575280.jpg', 'images/products/small/binary-fountain-telemedicine-patient-experience-1621575280.jpg', 51, 51, '2021-05-21 05:34:40', '2021-05-21 06:08:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `privacy` tinyint(1) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_medium` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_small` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`id`, `privacy`, `title`, `url`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `image`, `image_medium`, `image_small`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Testo', 'testo', 'Testo', 'Testo', 'Testo', 'Testo', 'images/products/brands/binary-fountain-telemedicine-patient-experience-1621567114.jpg', 'images/products/brands/medium/binary-fountain-telemedicine-patient-experience-1621567114.jpg', 'images/products/brands/small/binary-fountain-telemedicine-patient-experience-1621567114.jpg', 51, 51, '2021-05-21 03:18:34', '2021-05-21 03:18:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `privacy` tinyint(1) NOT NULL DEFAULT 1,
  `isFeatured` smallint(6) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_medium` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_small` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `privacy`, `isFeatured`, `title`, `url`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `image`, `image_medium`, `image_small`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 'Beauty', 'beauty', 'Beauty', NULL, 'Beauty', 'Beauty', NULL, NULL, NULL, 51, 51, '2021-05-21 01:46:35', '2021-05-21 02:08:16', NULL),
(2, 1, 0, 'Men\'s fashion', 'mens-fashion', 'Men\'s fashion', 'Men\'s fashion', 'Men\'s fashion', 'Men\'s fashion', NULL, NULL, NULL, 51, NULL, '2021-05-21 02:47:22', '2021-05-21 02:47:22', NULL),
(3, 1, 0, 'Women\'s fashion', 'womens-fashion', 'Women\'s fashion', 'Women\'s fashion', 'Women\'s fashion', 'Women\'s fashion', NULL, NULL, NULL, 51, NULL, '2021-05-21 02:48:51', '2021-05-21 02:48:51', NULL),
(4, 1, 0, 'Electrical', 'electrical', 'Electrical', 'Electrical', 'Electrical', 'Electrical', NULL, NULL, NULL, 51, NULL, '2021-05-21 02:49:13', '2021-05-21 02:49:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_categories`
--

CREATE TABLE `product_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `privacy` tinyint(1) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_medium` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_small` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_categories`
--

INSERT INTO `product_sub_categories` (`id`, `privacy`, `title`, `url`, `category_id`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `image`, `image_medium`, `image_small`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Makeup', 'makeup', 1, 'Makeup', 'Makeup', 'Makeup', 'Makeup', NULL, NULL, NULL, 51, 51, '2021-05-21 02:00:57', '2021-05-21 02:07:44', NULL),
(2, 1, 'Skin Care', 'skin-care', 1, 'Skin Care', 'Skin Care', 'Skin Care', 'Skin Care', NULL, NULL, NULL, 51, NULL, '2021-05-21 02:01:20', '2021-05-21 02:01:20', NULL),
(3, 1, 'Hair Care', 'hair-care', 1, 'Hair Care', 'Hair Care', 'Hair Care', 'Hair Care', NULL, NULL, NULL, 51, NULL, '2021-05-21 02:03:00', '2021-05-21 02:03:00', NULL),
(4, 1, 'Tair Dryers', 'tair-dryers', 1, 'Tair Dryers', 'Tair Dryers', 'Tair Dryers', 'Tair Dryers', NULL, NULL, NULL, 51, NULL, '2021-05-21 02:03:36', '2021-05-21 02:03:36', NULL),
(5, 1, 'Shirt', 'shirt', 2, 'Shirt', 'Shirt', 'Shirt', 'Shirt', NULL, NULL, NULL, 51, NULL, '2021-05-21 02:47:51', '2021-05-21 02:47:51', NULL),
(6, 1, 'Pant', 'pant', 2, 'Pant', 'Pant', 'Pant', 'Pant', NULL, NULL, NULL, 51, NULL, '2021-05-21 02:48:09', '2021-05-21 02:48:09', NULL),
(7, 1, 'Shoes', 'shoes', 2, 'Shoes', 'Shoes', 'Shoes', 'Shoes', NULL, NULL, NULL, 51, NULL, '2021-05-21 02:48:23', '2021-05-21 02:48:23', NULL),
(8, 1, 'Three-piece', 'three-piece', 3, 'Three-piece', 'Three-piece', 'Three-piece', 'Three-piece', NULL, NULL, NULL, 51, NULL, '2021-05-21 02:49:33', '2021-05-21 02:49:33', NULL),
(9, 1, 'Vanity bag', 'vanity-bag', 3, 'Vanity bag', 'Vanity bag', 'Vanity bag', 'Vanity bag', NULL, NULL, NULL, 51, NULL, '2021-05-21 02:49:49', '2021-05-21 02:49:49', NULL),
(10, 1, 'Digital multimeter', 'digital-multimeter', 4, '', 'Digital multimeter', '', 'Digital multimeter', NULL, NULL, NULL, 51, NULL, '2021-05-21 02:50:02', '2021-05-21 02:50:02', NULL),
(11, 1, 'Infrared thermometer', 'infrared-thermometer', 4, 'Infrared thermometer', 'Infrared thermometer', 'Infrared thermometer', 'Infrared thermometer', NULL, NULL, NULL, 51, NULL, '2021-05-21 02:50:20', '2021-05-21 02:50:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jayed Hasan', 'jayedhasan232@gmail.com', NULL, '$2y$10$kYTkVBkEKSNrlgi1TEheK.BLJTWWiuzxnv8NZiGfsBMikZk1qO5tW', NULL, '2021-05-21 06:22:24', '2021-05-21 06:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
