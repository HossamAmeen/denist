-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2020 at 07:48 AM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makhjaib_discounts_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'deals', '2020-08-18 04:45:44', '2020-08-18 04:45:44', NULL),
(2, 'Prof. Rey Kohler V', '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(3, 'Lionel Cronin', '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(4, 'Dudley Senger', '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(5, 'Wilson Sipes', '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(6, 'Dr. Kathlyn Deckow V', '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(7, 'Dr. Eudora Wyman', '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(8, 'Gisselle Farrell', '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(9, 'Soledad Schimmel', '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(10, 'Prof. Jacey Luettgen MD', '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'assuit', '2020-08-18 04:45:44', '2020-08-18 04:45:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','accept','blocked') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `block_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `phone`, `status`, `block_reason`, `google_id`, `facebook_id`, `rating`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hossam client', 'ameen', 'male', 'hosamameen948@gmail.com', '$2y$10$gedXb7G9yKAq0y8oOIzsYuWiYdV0AsuJMl59ugryHrbFROXwzSObO', '01010079798', 'pending', NULL, NULL, NULL, NULL, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `configrations`
--

CREATE TABLE `configrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_08_19_000001_create_configrations_table', 1),
(9, '2019_08_19_000002_create_categories_table', 1),
(10, '2020_08_04_000004_create_cities_table', 1),
(11, '2020_08_04_201054_create_vendors_table', 1),
(12, '2020_08_04_201255_create_clients_table', 1),
(13, '2020_08_04_201653_create_product_categories_table', 1),
(14, '2020_08_04_201654_create_products_table', 1),
(15, '2020_08_06_094135_create_carts_table', 1),
(16, '2020_08_06_094136_create_orders_table', 1),
(17, '2020_08_10_122052_create_product_choices_table', 1),
(18, '2020_08_10_122107_create_order_choices_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('c5ff5dcef30a2d925ee4f89c1dd206c508b109f00633d7e1aa78710fb223b5b917a54235d740a9be', 3, 1, 'token', '[]', 0, '2020-08-18 05:57:20', '2020-08-18 05:57:20', '2021-08-18 01:57:20'),
('098abc75249f97f98297fc6669c061af0cba13f828d5a217abb5cfada831cb0b44c623dd26ad6b81', 1, 1, 'token', '[]', 0, '2020-08-18 06:04:06', '2020-08-18 06:04:06', '2021-08-18 02:04:06'),
('8258973f8cab65c0807914eaec671fa6c326dabbb0b66e401cc313bebc199ea81fd22910cb9d2c58', 4, 1, 'token', '[]', 0, '2020-08-18 06:05:45', '2020-08-18 06:05:45', '2021-08-18 02:05:45'),
('059acca466fb621766f78aa002dd22189d6844cd751741c1706fbb97f67e4fd74316a9c743533cac', 1, 1, 'token', '[]', 0, '2020-08-18 09:17:51', '2020-08-18 09:17:51', '2021-08-18 05:17:51'),
('a77048ee60ef730592535cffbe1a8f83e420e7ea7b4b2a1948703ce709224d3c30e4af9864eacd0f', 5, 1, 'token', '[]', 0, '2020-08-18 09:19:00', '2020-08-18 09:19:00', '2021-08-18 05:19:00'),
('ccc79ced237d0be457c8e1d6f1cdb602f399682c9f5eec4e57eec8580a286ca396d8efce45fd1d9a', 6, 1, 'token', '[]', 0, '2020-08-18 09:37:35', '2020-08-18 09:37:35', '2021-08-18 05:37:35'),
('89be69dc889d72d40f7aeb237e74e44396849e532816dba4df4222998f1b363e645d77bc06d0bc25', 6, 1, 'token', '[]', 0, '2020-08-18 09:37:51', '2020-08-18 09:37:51', '2021-08-18 05:37:51'),
('73003934f4c7390b02fee940c58d654b7d67f3800be2e63f62edd0773755aaa0df069bb3e1d07919', 6, 1, 'token', '[]', 0, '2020-08-18 09:39:24', '2020-08-18 09:39:24', '2021-08-18 05:39:24'),
('68449a50b7a12f10d9165b33ab8ef6e4fefc91a407ed394336858c53ec8e34cc6996db21b7f117c4', 1, 1, 'token', '[]', 0, '2020-08-18 09:39:55', '2020-08-18 09:39:55', '2021-08-18 05:39:55'),
('a8330f6fececdcec653250961b88ff8d64d14192c2d0d2a050bc978895a6f2a3247484c8e90f2779', 6, 1, 'token', '[]', 0, '2020-08-18 09:42:03', '2020-08-18 09:42:03', '2021-08-18 05:42:03'),
('eb4958a8638ab91f64f1d2ea4a1a60c833d2f641c6c50c0dd7ddb847ec50a9ee5a3e607da20ed03b', 6, 1, 'token', '[]', 0, '2020-08-18 10:12:08', '2020-08-18 10:12:08', '2021-08-18 06:12:08'),
('8f8933277d211b31283bf47d770b2ee6ebffb329f90b279054a1de9293e5b58229df2a4a769b73aa', 6, 1, 'token', '[]', 0, '2020-08-18 10:14:58', '2020-08-18 10:14:58', '2021-08-18 06:14:58'),
('41bda165266c3df6e0683fda159b9a63bf4d2dee8e9d9329f7a8d6bdf8bbaf65e5e72a86d0c60423', 6, 1, 'token', '[]', 0, '2020-08-18 10:15:16', '2020-08-18 10:15:16', '2021-08-18 06:15:16'),
('4d4209d3d99d96fdda888480f5d06767b3cbd4750eb30b061e688de18fee1c81d62bb0c57cf42be8', 6, 1, 'token', '[]', 0, '2020-08-18 10:16:04', '2020-08-18 10:16:04', '2021-08-18 06:16:04'),
('d98d9694fae40ccddfde45537562f958e912118c95bbd2834bae2dcdde7e03920aaceb0d3de09f96', 6, 1, 'token', '[]', 0, '2020-08-18 10:17:18', '2020-08-18 10:17:18', '2021-08-18 06:17:18'),
('b1b36a031d022a0629aeef02a6d58e51310cb4abb9d0753b44438f2c7929f1c819925990cb6b244c', 6, 1, 'token', '[]', 0, '2020-08-18 10:19:51', '2020-08-18 10:19:51', '2021-08-18 06:19:51'),
('1d4bfa9ac7d6fc920c109aaa1db789ee56d34dc5eaa900e54765ffb9eaa8a2c2291bf99acc550bf4', 6, 1, 'token', '[]', 0, '2020-08-18 10:25:15', '2020-08-18 10:25:15', '2021-08-18 06:25:15'),
('4311b5af593d9b409cc338b2528586733629a2abeea112d64ce92717fa025ee52d0de40c779d562a', 6, 1, 'token', '[]', 0, '2020-08-18 10:29:06', '2020-08-18 10:29:06', '2021-08-18 06:29:06'),
('0fd3bc6a15c057aedcbbdb7c96d20bd31dd98b2da89556b476dd85971d8a3a73fbf2d7f2fb08c211', 6, 1, 'token', '[]', 0, '2020-08-18 10:32:45', '2020-08-18 10:32:45', '2021-08-18 06:32:45'),
('98c543d54d1629911d06264a11c3450ef0127e549f024ae3712e6df6b80bda35fad564200de72651', 6, 1, 'token', '[]', 0, '2020-08-18 10:34:36', '2020-08-18 10:34:36', '2021-08-18 06:34:36'),
('0a124e57341bf8923f20fbde9c0380a0d9fae21700266538401077f942c1924dec776c3be44a9695', 6, 1, 'token', '[]', 0, '2020-08-18 10:37:06', '2020-08-18 10:37:06', '2021-08-18 06:37:06'),
('3e96fea73b7a3275363272c95f46a01c919c59c773bf702992f654a55c5550e57cc059766a898dd0', 6, 1, 'token', '[]', 0, '2020-08-18 10:43:28', '2020-08-18 10:43:28', '2021-08-18 06:43:28'),
('5ba5fce20e09969c55eb4bd96d0eb7a4b0d4efd98df2a469faf987d1eaa416415bd2c0ea71e666e0', 6, 1, 'token', '[]', 0, '2020-08-18 10:44:33', '2020-08-18 10:44:33', '2021-08-18 06:44:33'),
('97d749c0932b3d806ff4e287ae7f8a98d9b0defe0206b5ae8821cf128a7c408e2847c28440d42ac9', 7, 1, 'token', '[]', 0, '2020-08-18 10:48:08', '2020-08-18 10:48:08', '2021-08-18 06:48:08'),
('0c881f197dd7b13e28395ca833298447afb1b387d1c2e93a56621afefc4d4ed6b56db908f34e7d04', 7, 1, 'token', '[]', 0, '2020-08-18 11:06:49', '2020-08-18 11:06:49', '2021-08-18 07:06:49'),
('1d6e166683b161324d0cef098d79f3319ff5d7cfef18668675e2063a102afb7b88c626fabccd4375', 6, 1, 'token', '[]', 0, '2020-08-18 11:12:02', '2020-08-18 11:12:02', '2021-08-18 07:12:02'),
('d72e59839234116e4dd1f84f9b4a16c7360e22b94fdf8bf5fffb663e46264fb4c1236ac88069452e', 6, 1, 'token', '[]', 0, '2020-08-18 11:12:26', '2020-08-18 11:12:26', '2021-08-18 07:12:26'),
('bd197100c6ae0e42ebf1ceee20456d38256db902287800901440c1326cd93ee20b0971cc0bd20540', 6, 1, 'token', '[]', 0, '2020-08-18 11:12:41', '2020-08-18 11:12:41', '2021-08-18 07:12:41'),
('e9a784306c0481d6cd055a455739280f99dd32d9bb1d3f6867ea4ffe792b110fd0c5dd4c112e01c1', 6, 1, 'token', '[]', 0, '2020-08-18 11:13:23', '2020-08-18 11:13:23', '2021-08-18 07:13:23'),
('ed26aefe6d5e773dbe7a34dfabf11134cfdf1026a08dae39ccdcf72db52618c641bd9af06d205278', 7, 1, 'token', '[]', 0, '2020-08-18 11:14:14', '2020-08-18 11:14:14', '2021-08-18 07:14:14'),
('47d3ebafb260bd4a209d63725b9ac0f5ad0957c2052e1ad05237974f2518a564f4f7df4e47ec1e94', 7, 1, 'token', '[]', 0, '2020-08-18 11:21:40', '2020-08-18 11:21:40', '2021-08-18 07:21:40'),
('7a332bc09a07f94a0f58b97c6422d7032577092ec8c70469229cb08c7dd2b2f780122253f50f6f2f', 7, 1, 'token', '[]', 0, '2020-08-18 11:22:54', '2020-08-18 11:22:54', '2021-08-18 07:22:54'),
('f54957cba11f1b347542aedf61ee89ad9ab889954dd28ea89bd8e58ec7739788b01ebcb2df800cbf', 7, 1, 'token', '[]', 0, '2020-08-18 11:28:22', '2020-08-18 11:28:22', '2021-08-18 07:28:22'),
('f83c6b086386ccb4aed9a02c7f50638622b8737fa1730d1135875a2ee59c4d2f291decf3cf778abe', 7, 1, 'token', '[]', 0, '2020-08-18 11:30:39', '2020-08-18 11:30:39', '2021-08-18 07:30:39'),
('f68a1f4424408742225d71516f3627264c64dfb46c89fd19b9b7137f120fa96f551a9b81e567142d', 7, 1, 'token', '[]', 0, '2020-08-18 11:31:44', '2020-08-18 11:31:44', '2021-08-18 07:31:44'),
('fc160130977be31e6c0026935d3395be9a61227d736446c4f45643aa998c657f74b7bc71a8107191', 7, 1, 'token', '[]', 0, '2020-08-18 11:32:51', '2020-08-18 11:32:51', '2021-08-18 07:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '6NN1KyeUXtR8CJTBH6G8zNKFPtot0monfHBfv3C8', NULL, 'http://localhost', 1, 0, 0, '2020-08-18 04:45:45', '2020-08-18 04:45:45'),
(2, NULL, 'Laravel Password Grant Client', 'ZVZjOFYRYxl0sWuwLKsNb5KWAtdtpk9a6jVBuudy', 'users', 'http://localhost', 0, 1, 0, '2020-08-18 04:45:45', '2020-08-18 04:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `status` enum('pending from client','edit from vendor','accept from client','accept from vendor','cancelled from vendor','working','delivering','done') COLLATE utf8mb4_unicode_ci DEFAULT 'pending from client',
  `time` time NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `price`, `status`, `time`, `date`, `quantity`, `address`, `phone`, `city`, `product_id`, `client_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 266, 'pending from client', '07:21:13', '2014-01-14', 12, '34232 Cole Valley\nEmiliamouth, UT 64187', '01010079798', 'Roobmouth', 10, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(2, 253, 'accept from vendor', '02:29:36', '2010-12-15', 12, '910 Williamson Ramp\nSouth Alainabury, DC 89845-0241', '01010079798', 'Libbyburgh', 6, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(3, 237, 'edit from vendor', '18:22:00', '2006-07-04', 13, '303 Eva Crossing Apt. 110\nFerryfort, CT 47373', '01010079798', 'East Agustin', 5, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(4, 85, 'working', '18:25:05', '2017-02-12', 9, '2006 Haag Land\nAuermouth, AL 95836', '01010079798', 'South Sonya', 4, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(5, 295, 'pending from client', '05:47:58', '2019-05-15', 14, '664 Lavada Summit Apt. 554\nStiedemannmouth, AR 94617-8448', '01010079798', 'Port Ofelia', 1, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(6, 213, 'edit from vendor', '14:30:50', '1990-08-03', 15, '616 Tatum Squares Suite 003\nMarlinton, MN 60948', '01010079798', 'New Rodolfoton', 19, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(7, 57, 'accept from vendor', '00:38:00', '1998-07-10', 15, '31164 Mattie Gateway\nNew Mozell, VA 87607', '01010079798', 'Port Angelicaton', 12, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(8, 148, 'cancelled from vendor', '14:16:01', '1990-09-15', 9, '13551 Osinski Loaf\nHeidenreichview, VT 31518-1194', '01010079798', 'Port Tomasaview', 4, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(9, 55, 'delivering', '11:14:02', '2000-01-04', 4, '11319 Eloisa Pines\nAlvenashire, CA 59255', '01010079798', 'North Christineside', 15, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(10, 245, 'pending from client', '00:11:08', '1996-11-11', 3, '542 Ervin Shoals Apt. 452\nNew Gabe, DC 58883', '01010079798', 'Huelsport', 12, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_choices`
--

CREATE TABLE `order_choices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_choices`
--

INSERT INTO `order_choices` (`id`, `type`, `name`, `price`, `order_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'larage', 56, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(2, '1', 'meduim', 44, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(3, '2', 'small', 42, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(4, '1', 'in', 33, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(5, '1', 'out', 46, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `rating` double DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `rating`, `image`, `vendor_id`, `category_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ms. Heaven Yundt', 'Qui eligendi modi numquam deserunt iste reiciendis aliquid odio. Qui aut velit repudiandae. Dignissimos architecto sunt quo amet praesentium.', 527, 578, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 3, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(2, 'Darien Kub V', 'Eos vero rerum nihil delectus. Suscipit asperiores voluptatibus eum molestiae. Numquam consequuntur quis nostrum error fugit officia quibusdam.', 174, 81, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 5, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(3, 'Prof. Michael Waters', 'Debitis ut illo id consectetur fugit impedit recusandae. Odio quasi optio vero.', 255, 335, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 7, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(4, 'Trinity Goldner', 'Hic ratione aperiam illum aut sequi expedita. Quibusdam aut nemo ducimus consequuntur tempore sunt aut.', 110, 230, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 5, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(5, 'Florencio Kling IV', 'Voluptatum illum omnis magni rem maiores eaque. Voluptate officiis quaerat non fuga culpa eos consequatur. Ea aut dolorum quod nam sed.', 225, 483, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 1, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(6, 'Dr. Esmeralda Schiller', 'Quia porro minus autem autem molestiae reiciendis. Quo ullam et consectetur velit. Velit consequatur occaecati amet et. Earum quis quo voluptates consequatur debitis commodi.', 571, 481, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 6, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(7, 'King Lemke', 'Ut magnam quaerat voluptas labore. Voluptas a nisi et iure labore earum. Ut maiores et quaerat facilis recusandae debitis. Dolore ipsam facilis quos placeat.', 571, 227, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 4, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(8, 'Prof. Jamar Marquardt', 'Ipsam consequatur necessitatibus aut totam omnis. Est quia vero dignissimos perspiciatis. Enim quis rerum incidunt in sint voluptatem. Voluptas culpa quam vel eos quae.', 567, 338, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 5, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(9, 'Zetta Okuneva', 'Voluptatem maiores et ullam ipsa et. Et ea maiores dolores voluptas doloremque illum. Eaque temporibus aut optio sint repellat.', 107, 39, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 7, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(10, 'Darlene Wehner', 'At eius et fugiat. Et ducimus vel fugit vero quia laboriosam enim. Et eligendi et odit ipsum. Impedit dolorum quis animi tempora. Aut voluptas libero et enim eveniet.', 452, 12, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 4, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(11, 'Aubree Rodriguez', 'Esse tenetur omnis repellendus suscipit aut odit. Reprehenderit magnam iusto alias nemo voluptas odio tenetur. Quasi sed quia odio aspernatur eos.', 377, 489, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 4, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(12, 'Hillard Douglas', 'Eveniet architecto optio fugiat facere nisi qui et. Et et fugit unde doloremque eum qui vero accusamus. Illo id amet sint. Minima adipisci iste animi minus asperiores amet libero voluptatem.', 443, 468, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 3, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(13, 'Darian Rice', 'Sed voluptas rerum aut accusamus animi enim. Iusto molestiae dolores odio praesentium optio aspernatur temporibus. Eum ab eum sed vel deleniti est. Non quod et voluptatem rerum.', 405, 389, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 3, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(14, 'Miss Madge Dach', 'Occaecati minus et ab sed excepturi ipsam. A temporibus vel asperiores est. Sint iusto nihil necessitatibus sit et. Occaecati eius sit soluta ut quidem aut repudiandae. Deserunt dolorem unde aut.', 271, 585, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 4, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(15, 'Kelsie Schowalter', 'Eligendi ut fugiat cumque quae explicabo. Sapiente molestiae nemo nihil excepturi repudiandae voluptas. Sunt blanditiis nisi reprehenderit molestias.', 298, 525, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 9, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(16, 'Dr. Ryley Quitzon', 'Enim dolores non ratione non provident accusamus. Aut explicabo tempore excepturi reprehenderit.', 359, 326, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 5, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(17, 'Amir Marquardt Sr.', 'Numquam corrupti itaque inventore laborum. Sapiente voluptas facilis voluptatum amet. Minima eius et cum nemo temporibus quia quisquam accusamus. Necessitatibus autem rerum et cumque quam.', 78, 332, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 1, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(18, 'Esta McKenzie', 'Est aut recusandae iste maiores exercitationem. Voluptate ea aut repellat vel. Officiis repellendus distinctio aliquid saepe. Dignissimos officia voluptatem rem rem doloribus.', 396, 52, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 5, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(19, 'Prof. Donnell Macejkovic', 'Temporibus rerum adipisci aut totam. Quo doloremque nobis nam dolorem voluptate qui mollitia unde. A officiis reprehenderit voluptatum facere occaecati.', 129, 308, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 6, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(20, 'Dr. Gerardo Stracke', 'Dolores provident ad qui quisquam doloremque. Dolore quis perferendis iusto qui fugiat corporis. Labore quo impedit vel optio.', 567, 493, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 4, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(21, 'Cheyanne Murphy', 'Ipsum eos nemo cumque et repellat reiciendis numquam. Voluptatem quae quia nam odit culpa voluptas. Voluptates iure sequi sequi.', 464, 426, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 6, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(22, 'Miss Beverly Stamm III', 'Minus cumque similique excepturi occaecati excepturi. Nihil magnam est libero repudiandae numquam vel.', 227, 161, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 9, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(23, 'Prof. Rigoberto Goodwin', 'Non hic dignissimos nihil voluptas. Deleniti quisquam non excepturi veniam sit. Eum dolor rerum perspiciatis eveniet adipisci quia consequuntur.', 360, 596, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 1, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(24, 'Alex Conn', 'Dignissimos dolores quia ducimus veniam et non. In in velit minima beatae eveniet. Pariatur iste velit non laborum est et. Ratione praesentium et velit quod ut cumque.', 252, 457, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 8, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(25, 'Dr. Laila Pouros', 'Commodi alias labore hic magni omnis qui. Officiis cum aspernatur quidem quia. Molestiae esse in non officia quo architecto.', 557, 275, 0, '/home/makhjaib/sites/discounts.makhtoof.com/public/sandwitch.jpeg', 1, 6, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(26, 'sandwatch big testy', 'description', 30, 10, 0, 'https://discounts.makhtoof.com/products/2020-08-18/5237395811597729351.jpg', 6, 1, NULL, '2020-08-18 09:42:31', '2020-08-18 09:42:31', NULL),
(27, 'sandwatch big testy', 'description', 30, 10, 0, 'https://discounts.makhtoof.com/products/2020-08-18/7688909291597729427.jpg', 6, 10, NULL, '2020-08-18 09:43:47', '2020-08-18 09:43:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `vendor_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ismael Larkin', 1, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(2, 'Clinton Durgan PhD', 1, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(3, 'Tess Schiller', 1, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(4, 'Mya Tillman', 1, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(5, 'Dr. Fatima Bartell I', 1, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(6, 'Miss Eda Harvey', 1, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(7, 'Jasen Lesch', 1, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(8, 'Jackson Pagac II', 1, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(9, 'Patience Aufderhar', 1, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(10, 'test', NULL, NULL, '2020-08-18 09:43:47', '2020-08-18 09:43:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_choices`
--

CREATE TABLE `product_choices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_choices`
--

INSERT INTO `product_choices` (`id`, `type`, `group_name`, `name`, `price`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'size', 'larage', 39, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(2, '2', 'size', 'meduim', 42, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(3, '2', 'size', 'small', 56, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(4, '2', 'place', 'in', 60, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(5, '2', 'place', 'out', 31, 1, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(6, '1', 'size', 'small', 12, 26, '2020-08-18 09:42:31', '2020-08-18 09:42:31', NULL),
(7, '1', 'size', 'med', 15, 26, '2020-08-18 09:42:31', '2020-08-18 09:42:31', NULL),
(8, '1', 'size', 'large', 20, 26, '2020-08-18 09:42:31', '2020-08-18 09:42:31', NULL),
(9, '2', 'second choice ', 'small', 12, 26, '2020-08-18 09:42:31', '2020-08-18 09:42:31', NULL),
(10, '2', 'second choice ', 'med', 15, 26, '2020-08-18 09:42:31', '2020-08-18 09:42:31', NULL),
(11, '2', 'second choice ', 'large', 20, 26, '2020-08-18 09:42:31', '2020-08-18 09:42:31', NULL),
(12, '1', 'size', 'small', 12, 27, '2020-08-18 09:43:47', '2020-08-18 09:43:47', NULL),
(13, '1', 'size', 'med', 15, 27, '2020-08-18 09:43:47', '2020-08-18 09:43:47', NULL),
(14, '1', 'size', 'large', 20, 27, '2020-08-18 09:43:47', '2020-08-18 09:43:47', NULL),
(15, '2', 'second choice ', 'small', 12, 27, '2020-08-18 09:43:47', '2020-08-18 09:43:47', NULL),
(16, '2', 'second choice ', 'med', 15, 27, '2020-08-18 09:43:47', '2020-08-18 09:43:47', NULL),
(17, '2', 'second choice ', 'large', 20, 27, '2020-08-18 09:43:47', '2020-08-18 09:43:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `name`, `password`, `phone`, `email`, `role`, `image`, `user_id`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$RuFGlkR9/5F4bWQZ00bjpeg00uswt27VGtxNfb9XBOMIlSGVw00Rm', '01010079798', 'asd@asd.asd', 1, NULL, 1, NULL, NULL, '2020-08-18 04:45:43', '2020-08-18 04:45:43'),
(2, 'Delbert Morissette_user', 'Monserrat Bins', '$2y$10$E3nOJ0cLREjXM8ZOLqpFtOE0njMRfDkJoNxO8Ea3bu.goaqabWy7u', '+9521462649982', 'ewillms@yahoo.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(3, 'Ms. Joanny Kshlerin II_user', 'Kurtis Bogan', '$2y$10$5DWiuwPMf7Vpal6.s9R4puzxNyCLnJ2Cum3Sdc/8oz.8n9/xdPxhK', '+1846791285949', 'bayer.fay@hotmail.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(4, 'Troy Hane_user', 'Krystel Jaskolski I', '$2y$10$d1czGTdplDU7CjGCpW8R8uCyN7Rx/Yz/4UEcR6hIy2g7oBf7rIcK6', '+1340226054951', 'elton.gaylord@koepp.biz', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(5, 'Jamil Sanford Jr._user', 'Dr. Kattie Hickle', '$2y$10$HKEJIKqz8VIVajmryySY8eNCfpTRKSvDiogpLz5PMon2MhjYybqEC', '+9021676236842', 'heaney.fae@gmail.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(6, 'Kacie Mohr_user', 'Ms. Audie Littel IV', '$2y$10$iYRAlOjD0gUOTkgG5k1pKOgtixHWhEQExUygglP4yEaeZjV5rVbb6', '+6721844983954', 'ikutch@schumm.org', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(7, 'Magnolia Koepp IV_user', 'Santina Ziemann', '$2y$10$nkvFm/NvTpSNgprAGIJb3ufnL8Duxmlx.XMi1GuFhwXYGbk1xMtJe', '+5770518649668', 'wullrich@stark.biz', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(8, 'Angel Jacobs DDS_user', 'Mr. Baron Blanda', '$2y$10$PS4NMR6GTl72OG1Tsv3n0ON3emPnfv7.RAxKB8T7cgWoGZ8mOKOqu', '+8828801547315', 'javier21@gmail.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(9, 'Mrs. Annie Ward II_user', 'Maida Schumm', '$2y$10$Zc2ppUP1vdl9bW20rVtHueUvvB7c3lHuPw.r2hGMq3sdb5C0caJGG', '+1350509391827', 'keeling.alexa@yahoo.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(10, 'Abigayle Langworth_user', 'Aaliyah Carter', '$2y$10$Kuh3Bhn4HnOvi4OjdER4XetXqK5O40dAriV6v.Sa4m/PECU8W0gWi', '+5120330603667', 'kunde.angelina@schuster.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(11, 'Cassidy Gerlach_user', 'Cassandra VonRueden', '$2y$10$n2O8JrVMQ1fm1I7UWl1Bhu4NbCtnR51cpIzECuIgDN02IHDHHYv6u', '+1779209151268', 'sleuschke@yahoo.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(12, 'Gianni Jerde V_user', 'Kiel Rempel', '$2y$10$hzNqtgkbx6idnj0b1ZBkOO6gMONhQgPv3KbojsG2YZbjaefFOYOwS', '+6295657452379', 'myrtis49@gmail.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(13, 'Gregoria Sporer_user', 'Ms. Sunny Friesen II', '$2y$10$pFb2tfBDm06wlqGCdXaxbONBlR5QbKmrC4QmcpU8GzGNU1aCqRT2C', '+8675258401280', 'dasia15@hotmail.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(14, 'Prof. Florine Pfannerstill_user', 'Kamille Labadie', '$2y$10$K6dSGhs8Wlj2su1QQW1K/.7aooVpmWytusp7jgDdAsMBYFzCMdDSW', '+5301064949732', 'graciela.aufderhar@yahoo.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(15, 'Estella Yost V_user', 'Robbie Witting', '$2y$10$iBX8ZMT80HHWcrAMJgPrf.FUN8/ItBVwctMxLbc3rCYExYAyOzBpS', '+4217925592871', 'dax.kemmer@predovic.info', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(16, 'Miss Felicity Armstrong Sr._user', 'Dr. Devon Donnelly', '$2y$10$4ZgTQlHmAZGhOL5554kCEefgoTr/ipmR6oUG947RcOIkCJDMRLvsm', '+3035965588121', 'elsie.batz@witting.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(17, 'Austyn Kuhn_user', 'Lupe Turner DDS', '$2y$10$rTN3IZvQaTuhEFP/HK6POOaVkwWYD5u069vmJEnnLnpo.WGg4Z9Ti', '+4197562495897', 'geo17@hotmail.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(18, 'Vernie Welch Jr._user', 'Miss Margot Kutch', '$2y$10$fHrSHWnO0792wQ9..ftdWeSuXt.AqbNx9VwU2izTK/eIQRyHx951m', '+1055297771197', 'kiana.upton@anderson.org', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(19, 'Nona Kihn MD_user', 'Dr. Leopoldo Schiller DVM', '$2y$10$9Soe/OhTEaf7lZC0VYZQ3uMeL75WRw3THOqbnpDFG7MImFd/05jjy', '+5961000428016', 'wstiedemann@beer.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(20, 'Michaela Schmidt_user', 'Liza Aufderhar', '$2y$10$FsczwkrV40Tg5.TDc62Ds.MSz/BGGz.Niba7/wVm7dz1NmWvkyBVO', '+8116470751302', 'cicero08@kshlerin.info', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(21, 'Aylin Wiegand_user', 'Cordell Gaylord', '$2y$10$ql8yziWj8o1z/u8uVS/kGe050zqNzcyPP50Kn//L7Ju5xaKD22B8.', '+4428924414823', 'bernhard.leanne@lockman.org', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(22, 'Fatima Towne I_user', 'Mia Bailey', '$2y$10$TYlnH/iv0ntcxwppsMYo/OiaEKyw4lV4aqxlJUfjJOCHsXu.M9xtG', '+9405603283074', 'florencio.bartoletti@yahoo.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(23, 'Mariana Hoeger_user', 'Mr. Earnest Brakus', '$2y$10$VvqZ3ASN0U5qAkclXJYBM.AT0z5VnemIA2a.QkeoWKSsitQuzZuLe', '+5232926409057', 'lydia77@gmail.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(24, 'Clifford Spencer_user', 'Dr. Demario Rodriguez Sr.', '$2y$10$cpzBaJFqRvgteAdA5psJIe46zTork/Vod75Au1n18NXVnCqprbE4S', '+4820178219362', 'orodriguez@renner.info', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(25, 'Maxine Paucek_user', 'Marguerite Hand', '$2y$10$yYW61h7bbS1l/MT3cZ0mSu3/9LNAYk6ZKBu4s.51cpyJMZlMZJE0S', '+4917169760177', 'christy.cormier@yahoo.com', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44'),
(26, 'Ivory Crist_user', 'Coralie Sawayn', '$2y$10$ItEUGMJcAZaE7ne356cp9O/FGKVZ/oyS11H7I7wuN05efUgQvLCLe', '+2091253830697', 'josefa74@cole.org', 2, NULL, 1, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_registration_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id_front_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id_back_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `delivery` double DEFAULT NULL,
  `status` enum('pending','accept','blocked') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `block_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double DEFAULT 0,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `store_name`, `store_description`, `store_logo`, `store_background_image`, `company_registration_image`, `national_id_front_image`, `national_id_back_image`, `expiration_date`, `delivery`, `status`, `block_reason`, `google_id`, `facebook_id`, `rating`, `category_id`, `city_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hossam', 'ameen', 'hosamameen948@gmail.com', '$2y$10$uiYOyYkwONiE3XZzboHteek6qSHHo4l1ZLw8JJ2s1xyOaYp7JApkK', '01010079798', 'mac', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, 0, NULL, NULL, NULL, '2020-08-18 04:45:44', '2020-08-18 04:45:44', NULL),
(2, 'hossam', 'ameen', 'hosamameen948s@gmail.com', '$2y$10$9JKUdLttSxn4Gzrqm7Ptlev2XqHmSSsUVhlpTNzysPFTNBezAN5L2', '01010079798', 'mac', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, 0, NULL, NULL, NULL, '2020-08-18 04:45:45', '2020-08-18 04:45:45', NULL),
(3, 'hossam', 'ameen', 'sss@gmail.com', '$2y$10$DIieXKfoVj3.qVxYKnyMduV9xDSchSr1xr7amqCGJgEU5RkQ82aja', '01012005977', 'mac', 'mac is good fast food', NULL, NULL, NULL, NULL, NULL, '2020-08-05', NULL, 'pending', NULL, NULL, NULL, 0, 1, 1, NULL, '2020-08-18 05:57:20', '2020-08-18 05:57:20', NULL),
(4, 'hossam', 'ameen', 'ssss@gmail.com', '$2y$10$VdRU6mXHVrnMdhGjI2H8xuRDqUjRfta0LEkpoeCp7SdoyxHlogMWG', '01012005973', 'mac', 'mac is good fast food', NULL, NULL, NULL, NULL, NULL, '2020-08-05', NULL, 'pending', NULL, NULL, NULL, 0, 1, 1, NULL, '2020-08-18 06:05:45', '2020-08-18 06:05:45', NULL),
(5, 'hossam', 'ameen', 'sssvs@gmail.com', '$2y$10$Ii7C.vMJHpPd/xNxwQHPv.RZX34DY29J5Ng5nlRc1JNgEZWgjHYJ2', '01012003573', 'mac', 'mac is good fast food', NULL, NULL, NULL, NULL, NULL, '2020-08-05', NULL, 'pending', NULL, NULL, NULL, 0, 1, 1, NULL, '2020-08-18 09:19:00', '2020-08-18 09:19:00', NULL),
(6, 'hossam', 'ameen', 'test@mail.com', '$2y$10$D5aMPGNOSX.3PacigSsp/eAY.hMYu8K2o.LUyRuJwFmJmkSaoUuJe', '01145858641', 'mac', 'mac is good fast food', NULL, NULL, NULL, NULL, NULL, '2020-08-05', NULL, 'pending', NULL, NULL, NULL, 0, 1, 1, NULL, '2020-08-18 09:37:35', '2020-08-18 09:37:35', NULL),
(7, 'alfarouk', 'omar', 'test@test.com', '$2y$10$l4KigirncBx6Nccp48vgDOCca9tIWsZTHa6nkrUu1WjQ5loyf6Y8u', '01030116113', 'mac', 'mac is good fast food', 'https://discounts.makhtoof.com/vendors/2020-08-18/14730604441597733288.png', 'https://discounts.makhtoof.com/vendors/2020-08-18/9455968121597733288.png', 'https://discounts.makhtoof.com/vendors/2020-08-18/15265076511597733288.png', 'https://discounts.makhtoof.com/vendors/2020-08-18/3489795591597733288.png', 'https://discounts.makhtoof.com/vendors/2020-08-18/8023375391597733288.png', '2020-08-05', NULL, 'pending', NULL, NULL, NULL, 0, 1, 1, NULL, '2020-08-18 10:48:08', '2020-08-18 10:48:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_client_id_foreign` (`client_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`);

--
-- Indexes for table `configrations`
--
ALTER TABLE `configrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `configrations_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_client_id_foreign` (`client_id`);

--
-- Indexes for table `order_choices`
--
ALTER TABLE `order_choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_choices_order_id_foreign` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_vendor_id_foreign` (`vendor_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_vendor_id_foreign` (`vendor_id`),
  ADD KEY `product_categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_choices`
--
ALTER TABLE `product_choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_choices_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_user_id_foreign` (`user_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_category_id_foreign` (`category_id`),
  ADD KEY `vendors_city_id_foreign` (`city_id`),
  ADD KEY `vendors_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `configrations`
--
ALTER TABLE `configrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_choices`
--
ALTER TABLE `order_choices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_choices`
--
ALTER TABLE `product_choices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
