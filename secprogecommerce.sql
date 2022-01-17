-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2022 at 04:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secprogecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`, `updated_at`) VALUES
(13, '4', '11', '1', '2022-01-16 12:24:13', '2022-01-16 12:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descrip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `status`, `popular`, `meta_title`, `meta_descrip`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(2, 'Hoodies', 'Hoodies', 'Hoodie with great design and comfort', '1642342365.jpeg', 1, 1, 'Hoodies', 'Hoodies', 'Hoodies', '2022-01-15 20:57:44', '2022-01-16 09:37:55'),
(4, 'Shirts', 'Shirts', 'Casual Shirts and Sweatshirt', '1642340699.jpeg', 1, 1, 'Shirts', 'Shirts', 'Shirts', '2022-01-16 00:33:07', '2022-01-16 07:52:37'),
(5, 'Shoes', 'Shoes', 'Footwear that you can wore everywhere', '1642343812.jpg', 0, 1, 'Shoes', 'Shoes', 'Shoes', '2022-01-16 07:36:52', '2022-01-16 07:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_16_021322_create_categories_table', 2),
(6, '2022_01_16_062752_create_products_table', 3),
(7, '2022_01_16_135828_create_carts_table', 4),
(8, '2022_01_17_011543_create_order_table', 5),
(9, '2022_01_17_011722_create_order_item_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `address`, `track_no`, `total_price`, `created_at`, `updated_at`) VALUES
(18, 2, 'Admin', 'eyJpdiI6IlNydlBtbDlLZDhFeHJxVmh1anlWZ1E9PSIsInZhbHVlIjoiM2NrdlZKeXhFWE1rN0E5djlvNVgyZz09IiwibWFjIjoiZTJkYmMxMjE1MDM3MzgzOWU5ZDVmZmU1NzhjNDhmYjYxNmFjZWNhMjU4ZThmMDhkZWQyMTliMzY4MmVjMGNhYSIsInRhZyI6IiJ9', 'ecom9975', '250000', '2022-01-17 06:42:05', '2022-01-17 06:42:05'),
(19, 2, 'Admin', 'eyJpdiI6IjF0SXVLSVJ6VTd4cHYxc1ZYY293WkE9PSIsInZhbHVlIjoiZWhaKzJyL3ZDbVJYendZVnN0UUFwdz09IiwibWFjIjoiZDFlMWZlZTlkMGU1MWI5ZWIwZWMwZjlkMjA0OWE1ZGVkOWU0ZjUxY2NjNGZkOTFjY2UxNmU2MzE4MWJkY2NiMyIsInRhZyI6IiJ9', 'ecom2449', '2800000', '2022-01-17 07:16:19', '2022-01-17 07:16:19'),
(20, 2, 'Admin', 'eyJpdiI6ImlDbk84b3NETVFKckNkTXVicVJRTlE9PSIsInZhbHVlIjoiQWd1anRSWmlnZW9sSmpBSVRZMVp2UT09IiwibWFjIjoiOWJhOTUwNmFmZmRhZTNhOTBjMjE2YmVkZGY2N2ZkOTlmNzI0YjM3ZWZjYWVhN2Y4YzljOGU3NzIzYTIyZTAzYSIsInRhZyI6IiJ9', 'ecom8652', '1650000', '2022-01-17 07:18:31', '2022-01-17 07:18:31'),
(21, 8, 'test', 'eyJpdiI6IktXclhiWGJ4a2h3REExRUNQR2wzeFE9PSIsInZhbHVlIjoiamw4bEZuMndWY1NjVytvNFpWT2xaSnJyWlBVNDZiL2JUWXVMbnpDV0w0QT0iLCJtYWMiOiI3ZjQ3ZTNkZGIxNGIzNGI5YTM1MDYxNTUyOWEyYjYxY2YwZmJlNDY0NWVjNDk0MjEyNTJjZWJmZjdiMDA5ZDczIiwidGFnIjoiIn0=', 'ecom7937', '400000', '2022-01-17 07:55:46', '2022-01-17 07:55:46'),
(22, 9, 'hai', 'eyJpdiI6IlprYWRkaWJUdzdMVWFLcHVkT3RvNnc9PSIsInZhbHVlIjoiVzYwNlp0dE5MRlRYTVhpU21TbDhNZz09IiwibWFjIjoiOGIzNWU5ZDM4MGU1ODk3MWJkYmY1NjUzZTRkNWU4MWViNmJlYTk0ZDAxYzRhNjhiN2NjNzY1OWRiY2JhOTMwMiIsInRhZyI6IiJ9', 'ecom7477', '250000', '2022-01-17 07:59:46', '2022-01-17 07:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(13, '18', '5', '1', '250000', '2022-01-17 06:42:05', '2022-01-17 06:42:05'),
(14, '19', '4', '2', '1400000', '2022-01-17 07:16:19', '2022-01-17 07:16:19'),
(15, '20', '5', '1', '250000', '2022-01-17 07:18:31', '2022-01-17 07:18:31'),
(16, '20', '4', '1', '1400000', '2022-01-17 07:18:31', '2022-01-17 07:18:31'),
(17, '21', '3', '1', '400000', '2022-01-17 07:55:46', '2022-01-17 07:55:46'),
(18, '22', '5', '1', '250000', '2022-01-17 07:59:46', '2022-01-17 07:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kylie@mail.com', '$2y$10$z4Z2PYJFYW0c0yz0sh5USex9QTM4IbwBEfVWnxosVtNHrYU9zCyX.', '2022-01-16 12:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_descriptions` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descriptions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `name`, `slug`, `small_descriptions`, `descriptions`, `original_price`, `selling_price`, `tax`, `image`, `quantity`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_descriptions`, `created_at`, `updated_at`) VALUES
(1, 2, 'Nike Hoodie', 'NikeHoodie', 'Nike Hoodie', 'Basic Brown Nike Hoodie', '1000000', '800000', '10', '1642340885.jpeg', '59', 0, 1, 'Nike Hoodie', 'Nike Hoodie', 'Nike Hoodie', '2022-01-16 00:38:47', '2022-01-16 07:33:14'),
(3, 4, 'Nike Tee', 'NikeTee', 'Nike Tee', 'Light Brown Nike Tee', '500000', '400000', '5', '1642341036.jpeg', '22', 0, 1, 'Nike Tee', 'Nike Tee', 'Nike Tee', '2022-01-16 03:42:18', '2022-01-17 07:55:46'),
(4, 2, 'Space Jam Nike Hoodie', 'SpaceJamNikeHoodie', 'Space Jam Nike Hoodie', 'Black Space Jam Nike Hoodie', '1500000', '1400000', '2', '1642340940.jpeg', '2', 0, 1, 'Space Jam Nike Hoodie', 'Space Jam Nike Hoodie', 'Space Jam Nike Hoodie', '2022-01-16 03:45:06', '2022-01-17 07:18:31'),
(5, 4, 'Nike Smile Hoodie', 'NikeSmileHoodie', 'Nike Smile Hoodie', 'Nike Smile Hoodie', '300000', '250000', '2', '1642341648.jpg', '14', 0, 1, 'Nike Smile Hoodie', 'Nike Smile Hoodie', 'Nike Smile Hoodie', '2022-01-16 06:34:07', '2022-01-17 07:59:46'),
(6, 2, 'Vlone Hoodie', 'VloneHoodie', 'Vlone Snake Hommes Pullover Hoodie', 'Vlone Snake Hommes Pullover Hoodie', '3000000', '2999999', '2', '1642340058.jpg', '10', 0, 1, 'Vlone Hoodie', 'Vlone Hoodie', 'Vlone Snake Hommes Pullover Hoodie', '2022-01-16 06:34:18', '2022-01-16 07:33:34'),
(7, 4, 'Asos Blue Tee', 'AsosBlueTee', 'Asos Blue Tee', 'Asos Blue Tee', '250000', '250000', '2', '1642341957.jpeg', '20', 0, 1, 'Asos Blue Tee', 'Asos Blue Tee', 'Asos Blue Tee', '2022-01-16 07:05:57', '2022-01-16 07:34:09'),
(8, 4, 'Topshop Long Sleeve Shirt', 'TopshopLongSleeveShirt', 'Topshop Long Sleeve Shirt', 'Topshop Long Sleeve Shirt', '400000', '450000', '5', '1642342313.jpeg', '8', 0, 1, 'Topshop Long Sleeve Shirt', 'Topshop Long Sleeve ShirtTopshop Long Sleeve Shirt', 'Topshop Long Sleeve Shirt', '2022-01-16 07:11:53', '2022-01-16 07:11:53'),
(9, 5, 'Air Force 1 Special Colorway', 'Air Force1SpecialColorway', 'Air Force 1 Special Colorway', 'Air Force 1 Special Colorway', '1800000', '1800000', '5', '1642343914.jpg', '12', 0, 1, 'Air Force 1 Special Colorway', 'Air Force 1 Special Colorway', 'Air Force 1 Special Colorway', '2022-01-16 07:38:34', '2022-01-16 07:38:34'),
(10, 5, 'Nike Dunk Low Off-White Pine Green', 'NikeDunkLowOffWhitePineGreen', 'Nike Dunk Low Off-White Pine Green', 'Nike Dunk Low Off-White Pine Green', '2500000', '7500000', '10', '1642344046.jpg', '14', 0, 1, 'Nike Dunk Low Off-White Pine Green', 'Nike Dunk Low Off-White Pine Green', 'Nike Dunk Low Off-White Pine Green', '2022-01-16 07:40:46', '2022-01-16 07:40:46'),
(11, 5, 'Maison Margiela Black Fusion', 'MaisonMargielaBlackFusion', 'Maison Margiela Black Fusion', 'Maison Margiela Black Fusion', '23700000', '23700000', '5', '1642344337.jpg', '23', 0, 1, 'Maison Margiela Black Fusion', 'Maison Margiela Black Fusion', 'Maison Margiela Black Fusion', '2022-01-16 07:45:37', '2022-01-16 07:45:37'),
(12, 5, 'Adidas Originals Superstar', 'AdidasOriginalsSuperstar', 'Adidas Originals Superstar', 'Adidas Originals Superstar', '1500000', '1500000', '12', '1642344482.jpg', '100', 0, 1, 'Adidas Originals Superstar', 'Adidas Originals Superstar', 'Adidas Originals Superstar', '2022-01-16 07:48:02', '2022-01-16 07:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@mail.com', '', NULL, '$2y$10$nX5J65mx3QsJrNdY.4junuO26U//XWG3o/hw8R0IHFd02kBA9NMHS', 0, 'm7xlAwqTMN158MeTDSwOOMhDU6BatwrlY6vpnmYjubyslV2GoqnDeXkMwr7Z', '2022-01-15 14:10:13', '2022-01-15 14:10:13'),
(2, 'Admin', 'admin@mail.com', 'Jalan', NULL, '$2y$10$478X5zznQ8Z/tY0la2mOFu6vYL1BGRcwU9QmqYN.E0ruiEfStf/Gy', 1, 'lzS7sOvSnijkQNmfklh2waLYWUGbs5Ty3n8DbVFAlhmJoxsf6MdWZCaZ0LnM', '2022-01-15 14:36:29', '2022-01-16 19:02:53'),
(3, 'kid cudi', 'cudi@mail.com', '', NULL, '$2y$10$pNdmPyS2RYwQMxRn6zlObeh4ornuo4qV64yqPKbtV3YgoQvBHYDPS', 0, NULL, '2022-01-16 02:32:40', '2022-01-16 02:32:40'),
(4, 'kylie jenner', 'kylie@mail.com', '', NULL, '$2y$10$iacLCviJsbkDe.Py1gzCVu3kz3rFsU0wbr3532GPng4PjgvxTCYWG', 0, NULL, '2022-01-16 05:27:02', '2022-01-16 05:27:02'),
(5, 'onta', 'onta@gmail.com', '', NULL, '$2y$10$QMEfxg04XkZV51cqI2NznebhwaEe6XVAOEwEfiOVJJdrUuzFzwaf6', 0, NULL, '2022-01-16 09:51:26', '2022-01-16 09:51:26'),
(6, 'Hasj', 'hasj@maisk.com', '', NULL, '$2y$10$Ru68LEiNva76ByPCmERS9.6WEVmfMv7VSqSVs67ldhuH717ohKcWy', 0, NULL, '2022-01-16 10:00:54', '2022-01-16 10:00:54'),
(7, 'mana', 'mana@mail', NULL, NULL, '$2y$10$pYzeU75urbq.B24dt/.lmOaBf17YKFI/aL7F8sBLUgEAHnESdjuS.', 0, NULL, '2022-01-17 07:43:34', '2022-01-17 07:43:34'),
(8, 'test', 'random@gmail.com', 'eyJpdiI6InQ5eUlJek82SFpKR1RMUC9PWnlyRkE9PSIsInZhbHVlIjoiYzNvRSthQnhpM1VaVXVzcXNvdndJS3RBWjhvdFNycGQ5eTVjUGNhZzlaTT0iLCJtYWMiOiJmYmFmOTQ0MDY1ZmNlYjhhZTQxYzFmODkzNjE0M2FjZDhmZGFmNWNjYWRlNDIxZTc3MjNjYzZkMzYwOGZkNTNmIiwidGFnIjoiIn0=', NULL, '$2y$10$JEsLIAGqpjYFRr21TXmRtOZve2mCLiCiwP2gPuFmjpGZudKZ6V9Ue', 0, NULL, '2022-01-17 07:54:54', '2022-01-17 07:55:46'),
(9, 'hai', 'hai@gmail.com', 'eyJpdiI6Ik9WRDdSUW1iOEJubEJ4WWJJNGZlbXc9PSIsInZhbHVlIjoiT2JLZ0hEZHZHVmFsK3hGZFp4OVhUQT09IiwibWFjIjoiZTdlNjRmZDc1MWM3OTExZTljM2RiYzI5OTliNjg1NjA1NDUyMjcwNGNjMDA0YWI5NGNiMTJkOWI2MmVhNzViYyIsInRhZyI6IiJ9', NULL, '$2y$10$8SQj1pBH2sHCqmJmS1gRhuOW70yLwoRtnbN7jY1x4ihPwzJ.3UyDW', 0, NULL, '2022-01-17 07:58:52', '2022-01-17 07:59:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
