-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2021 at 02:29 PM
-- Server version: 10.3.31-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elnanrdl_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `configrations`
--

CREATE TABLE `configrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_conditions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configrations`
--

INSERT INTO `configrations` (`id`, `website_name`, `email`, `address`, `phone`, `about`, `en_about`, `terms_conditions`, `privacy_policy`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ekhsemly', 'ekhsemly@gmail.com', 'El-Gomhoreya', '01010079798', 'شركة خاصه بالخوصمات والعروض', 'good company', 'terms and conditions', 'privacy and policy', NULL, '2021-10-07 04:55:32', '2021-10-07 04:55:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spiecalization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_name`, `name`, `password`, `spiecalization`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'doctor', 'احمد', '$2y$10$rROSDwcXIz1HXU.OrLckx.BFj227m/NeHPFpO16TQ8cscfru9cEl.', 'رمد', '2021-10-07 04:55:32', '2021-10-27 02:13:37', NULL),
(2, 'doctor2', 'محمد', '$2y$10$kHGyVm7RGRSrdedMCumPUesBc7spyoNgD.46GL5.B9K6TrR7iEHf6', 'اسنان', '2021-10-07 04:55:32', '2021-10-07 04:55:32', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_08_19_000001_create_configrations_table', 1),
(10, '2021_09_14_115755_create_doctors_table', 1),
(11, '2021_09_14_120650_create_nurses_table', 1),
(12, '2021_09_15_114922_create_patients_table', 1),
(13, '2021_09_15_125124_create_visits_table', 1),
(14, '2021_09_18_110152_create_teeths_table', 1),
(15, '2021_09_18_111829_create_operations_table', 1),
(16, '2021_09_18_111830_create_teeth_operations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `user_name`, `name`, `password`, `doctor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'nurse', 'احمد سيد', '$2y$10$lfF34pOmMRdl7c0wk14jLerTgBKEGhC9fCikERtnT8/5SmQyO4nKe', 1, '2021-10-07 04:55:32', '2021-10-27 02:12:59', NULL),
(2, 'nurse2', 'محمود', '$2y$10$VlWjo5fGu6XSI8pKBgDDOODRHLeLVkOpKHdUqhNSfnaN4d1OqHdz6', 2, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL);

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
('da65b043a55c49b46336ca57110e56169f4aacb8ddf5bcf3b19ac82c9505b68be3b14b7a875433ba', 1, 1, 'token', '[]', 0, '2021-10-07 19:33:22', '2021-10-07 19:33:22', '2022-10-07 15:33:22'),
('1ee06703f85ef7d48b0c3d6ca53c9a1caf02e6af43a5e60ab3757497048125ea1ec423846a98642b', 1, 1, 'token', '[]', 0, '2021-10-07 22:03:48', '2021-10-07 22:03:48', '2022-10-07 18:03:48'),
('3c7fb2f4ac4110e1c93940b8f7293a0deddade9ef89c00b9a38501d1972ba6450878b9e78702a5ef', 1, 1, 'token', '[]', 0, '2021-10-07 22:22:19', '2021-10-07 22:22:19', '2022-10-07 18:22:19'),
('9a284a6590d650888e4896fbcdbfd56012b2bd0c1d21b91a67fab187881b1cb381a3302e9c4a0177', 1, 1, 'token', '[]', 0, '2021-10-07 22:23:05', '2021-10-07 22:23:05', '2022-10-07 18:23:05'),
('858cd06db01c6151b509c5cf07c8f5613c793246cac0191cbf321f3e9e5661dad1a44415b4ef18e2', 1, 1, 'token', '[]', 0, '2021-10-08 22:49:57', '2021-10-08 22:49:57', '2022-10-08 18:49:57'),
('63d1972c1583947eb6d1781bca843765a7ef6cee43498e12aee5cc3f2a899811fce21f8c2958936f', 1, 1, 'token', '[]', 0, '2021-10-08 22:51:25', '2021-10-08 22:51:25', '2022-10-08 18:51:25'),
('ca097c0cfb32be981356dcc99bcf2a7ff5b7ef9f4cbee1f5e1f0efc4f15a01ca49aeca7b58dffd92', 1, 1, 'token', '[]', 0, '2021-10-08 23:14:45', '2021-10-08 23:14:45', '2022-10-08 19:14:45'),
('7f3ad452bce18bfb8df086358e78b82087119b77a5262b3a875fc47e11fd1ab827a202f70342d4e5', 1, 1, 'token', '[]', 0, '2021-10-08 23:16:48', '2021-10-08 23:16:48', '2022-10-08 19:16:48'),
('23990ccf2e759815752f98533fbbd4c1ab9a1de23de096bea6033c47521e7b4230737faa5149a620', 1, 1, 'token', '[]', 0, '2021-10-09 04:06:43', '2021-10-09 04:06:43', '2022-10-09 00:06:43'),
('2b84dc9a7e5c1b53c5b46c4c570d6354b16218f101e4ce76c59f1536bd1b30c0031fec466d817c13', 1, 1, 'token', '[]', 0, '2021-10-09 20:57:44', '2021-10-09 20:57:44', '2022-10-09 16:57:44'),
('6efab738f645d3e2224fbb21605cd728b3ca229295e7b03930a2c86c9319a6da9efb1247d8b86aec', 1, 1, 'token', '[]', 0, '2021-10-09 21:00:33', '2021-10-09 21:00:33', '2022-10-09 17:00:33'),
('078c109df6dada6c4158b9a536198f2b47dd033944ec5ef2723fa36439e5b8372dca76a67a281b9b', 1, 1, 'token', '[]', 0, '2021-10-09 22:31:58', '2021-10-09 22:31:58', '2022-10-09 18:31:58'),
('91e083e074c70eaba617b35ea5727b4e0f62ec800e8d970b799912c3f028fcfef851533323f48270', 1, 1, 'token', '[]', 0, '2021-10-09 22:35:17', '2021-10-09 22:35:17', '2022-10-09 18:35:17'),
('7a1eaf839c084e4ffcab58a8afb33bc804bc88f994e8740a16df9a92f6c6c19c27165a896c3aada8', 1, 1, 'token', '[]', 0, '2021-10-09 22:38:45', '2021-10-09 22:38:45', '2022-10-09 18:38:45'),
('2fcda989431ad81522e2f0a9a6cd52765575f64fef21189d09f9ea13a09fb151b5993ae03163a94a', 1, 1, 'token', '[]', 0, '2021-10-09 22:40:26', '2021-10-09 22:40:26', '2022-10-09 18:40:26'),
('64ae176d0be13bb3ef46a5cea1846d1e5c46196efde71fd67874d9648aa02d10d2b68950102796bd', 1, 1, 'token', '[]', 0, '2021-10-09 22:53:36', '2021-10-09 22:53:36', '2022-10-09 18:53:36'),
('ad604862969526dee7e86ae03694ac2cfde3880dc148da2b75bce9325b83486a3e90a4d654d7b3e0', 1, 1, 'token', '[]', 0, '2021-10-09 22:55:22', '2021-10-09 22:55:22', '2022-10-09 18:55:22'),
('c503a4834c6670f10c42922e6b66ad52445dc214f6fe9f32b0aa978365a325b876032e61bf6a3079', 1, 1, 'token', '[]', 0, '2021-10-09 22:57:23', '2021-10-09 22:57:23', '2022-10-09 18:57:23'),
('601b395f04b4518c5527171d0bfd35f8d2856f67db28b2c5921437d8d5d77d579a68170f8e44aa08', 1, 1, 'token', '[]', 0, '2021-10-09 22:57:32', '2021-10-09 22:57:32', '2022-10-09 18:57:32'),
('470e630c44aaa6b0c56d754ebbf1e8e1aef8288b162ce1d96ec699890fd2b144e2f4e063723b7fd5', 1, 1, 'token', '[]', 0, '2021-10-09 22:57:55', '2021-10-09 22:57:55', '2022-10-09 18:57:55'),
('712bf29f34b673bdc783d0d3c232b6e54a4b770119d30feb8dfb45f6456eaa110e660438dd711b69', 1, 1, 'token', '[]', 0, '2021-10-09 23:09:22', '2021-10-09 23:09:22', '2022-10-09 19:09:22'),
('39d8fd76abcfd277b777e0df420964e114152615b5939bcc90a7b0a727b069fa9d82c5e8a8f2a8d1', 1, 1, 'token', '[]', 0, '2021-10-10 03:53:13', '2021-10-10 03:53:13', '2022-10-09 23:53:13'),
('c0bd473efdf5d17fef01c3f525ccc0be19d1e8eaf1c1c3af425ab88ff46e86b28ac0205898ff9d99', 1, 1, 'token', '[]', 0, '2021-10-24 00:34:52', '2021-10-24 00:34:52', '2022-10-23 20:34:52'),
('9dc6b0686e8ac60fc9310681e956d191b93b39554729d6163908d8a9140002bd37e7a91278a24fc5', 1, 1, 'token', '[]', 0, '2021-10-27 01:43:49', '2021-10-27 01:43:49', '2022-10-26 21:43:49'),
('4b5e5c8667c4e7520fed7335ef9deeecae68f628fba25e139c0c720dc4ced6f23c87e8a444ae7490', 1, 1, 'token', '[]', 0, '2021-10-27 01:52:20', '2021-10-27 01:52:20', '2022-10-26 21:52:20'),
('57f37663f1ee0c27a1e6cca46cd2821aed0fa0709e40073f4051f148680c51485a3d0475e8064b62', 1, 1, 'token', '[]', 0, '2021-10-27 01:54:54', '2021-10-27 01:54:54', '2022-10-26 21:54:54'),
('8c0c521e21d79641fe198b93ad3445f8f7e2e04669af1da3595a76553bce51ae9c7aaecf98094780', 1, 1, 'token', '[]', 0, '2021-10-27 01:55:47', '2021-10-27 01:55:47', '2022-10-26 21:55:47'),
('546bb455ad841287d84e5be3ce9c87cba70d1531aa2cdbb9ff14f787b6fcc0af0f943d85e56847c8', 1, 1, 'token', '[]', 0, '2021-10-27 02:05:29', '2021-10-27 02:05:29', '2022-10-26 22:05:29'),
('09a85bbd434543b8c39a458b46fc696177311cb139deeef9cb2dd479d372d1bf233c8660aa9dcbf4', 1, 1, 'token', '[]', 0, '2021-10-27 02:09:31', '2021-10-27 02:09:31', '2022-10-26 22:09:31'),
('3fe9323ae60599d634e074dd4fc05acd957acfaac7bf5ea72c830e42840c8afb9f90f947262fc11d', 1, 1, 'token', '[]', 0, '2021-10-27 02:12:45', '2021-10-27 02:12:45', '2022-10-26 22:12:45'),
('31b96b0f9f843b9fd6ba10a869d01b0b940b77c840203191afb94e245d498fd1cec46b8c13da3a61', 1, 1, 'token', '[]', 0, '2021-10-27 02:13:19', '2021-10-27 02:13:19', '2022-10-26 22:13:19'),
('36bbf6c6bda597aad271bd2346d0bc94f7e0f00a5ef9dab21a4c10e39d6d1dc89fadd60b21db7891', 1, 1, 'token', '[]', 0, '2021-10-27 02:15:15', '2021-10-27 02:15:15', '2022-10-26 22:15:15'),
('f18e8b2555ce95dc579e888e9918ae028eaf7edfdc772b032cfbc27d5c30c87616f6d8dcaceb5285', 1, 1, 'token', '[]', 0, '2021-10-27 02:17:44', '2021-10-27 02:17:44', '2022-10-26 22:17:44'),
('dd015d960931fef3cfa3f63ae30c0ced8d078fa4b5fea72681f3c04e7215e4e16f9d3259c3ade924', 1, 1, 'token', '[]', 0, '2021-10-27 02:17:59', '2021-10-27 02:17:59', '2022-10-26 22:17:59'),
('bf7978a83aab0afe9be3bc1590b9b877a918963a31a486c2b7afc953e25d586237641cba204b1664', 1, 1, 'token', '[]', 0, '2021-10-27 02:18:44', '2021-10-27 02:18:44', '2022-10-26 22:18:44'),
('af6c10359f1aa5c127536ca84bef94edf7b1e053b0a28828a85367cbe79c9c71fbb451d1d4435fdf', 1, 1, 'token', '[]', 0, '2021-10-27 22:22:02', '2021-10-27 22:22:02', '2022-10-27 18:22:02'),
('3769c174122b1db919128e34f4f36551a7bf2519f381abfac59ab710b2f14e2d24c54cd6b5f4fbb1', 1, 1, 'token', '[]', 0, '2021-10-27 22:22:16', '2021-10-27 22:22:16', '2022-10-27 18:22:16'),
('e11bbb8a4157b3307834b53f04c338006d5f167c21e5decd77422e788d2c32d05754b76e95054f6d', 1, 1, 'token', '[]', 0, '2021-10-27 23:52:16', '2021-10-27 23:52:16', '2022-10-27 19:52:16'),
('fab54a67b11ac06bf6a4840b075cdd48cb959eec98c60b131ce6140119769cc3d8c52c33142e9878', 1, 1, 'token', '[]', 0, '2021-10-27 23:53:26', '2021-10-27 23:53:26', '2022-10-27 19:53:26'),
('3e2f4a660d77c620dbe3ef3d3c268ec1dc07d8ce79639e9ffbd746311fdd795d1a69ee0247fd736e', 1, 1, 'token', '[]', 0, '2021-10-27 23:55:14', '2021-10-27 23:55:14', '2022-10-27 19:55:14'),
('136b4ba1380bef899604e4574d90db31430a6106ffa20967729e98e7e194426942955c773f0fb221', 1, 1, 'token', '[]', 0, '2021-10-28 05:23:03', '2021-10-28 05:23:03', '2022-10-28 01:23:03'),
('1dbb3398674a75a4f3f362670616c0594dff85f9ec94e54376392031bffcf738e5a243d8dc5345a5', 1, 1, 'token', '[]', 0, '2021-10-28 05:24:57', '2021-10-28 05:24:57', '2022-10-28 01:24:57'),
('25f61f604916ec7d1611cd6bc6a2ab1f9629a44049880805a1fa672c51fa127ee29381738ec69169', 1, 1, 'token', '[]', 0, '2021-10-29 02:35:33', '2021-10-29 02:35:33', '2022-10-28 22:35:33'),
('40b62322d6e1d0206d0e60a6b834c24acba572ad64a05e1710b4f393bdc51be8dab402efe001908f', 1, 1, 'token', '[]', 0, '2021-10-29 02:39:08', '2021-10-29 02:39:08', '2022-10-28 22:39:08'),
('6bdc6e3c4852d795f327d554caf4ef70d9e54bebf0e3f91f809380ff39f744b0038849d1bb8d22f9', 1, 1, 'token', '[]', 0, '2021-11-04 22:22:12', '2021-11-04 22:22:12', '2022-11-04 18:22:12'),
('54ef01909903312ddd426f60382257cbf639d68b8046f22b4468f074c79fa782d9fa3bfdacf125b1', 1, 1, 'token', '[]', 0, '2021-11-04 22:36:08', '2021-11-04 22:36:08', '2022-11-04 18:36:08'),
('582986deabc9005c02a7c5bcea8020cc4a8a9dc39c0bfb9b8e68ecb72600eebd5fee5f790c7408e7', 1, 1, 'token', '[]', 0, '2021-11-05 21:57:04', '2021-11-05 21:57:04', '2022-11-05 17:57:04'),
('ddc0028104bca554f4f2770f4c2626e747cad87ec6ff61ebfbee8db823477a39c90dbf035d4fa9e9', 1, 1, 'token', '[]', 0, '2021-11-05 21:57:49', '2021-11-05 21:57:49', '2022-11-05 17:57:49'),
('540e91f040556ad5b9af53d782002d2718115037aafdc1b7b26b553b75956a43cf8e725c565e5467', 1, 1, 'token', '[]', 0, '2021-11-05 22:06:03', '2021-11-05 22:06:03', '2022-11-05 18:06:03'),
('70bebe4bc2750d1035a38aa7e267e728e85a65ebd13cb1b5a4a2f6c0c9b5050606d99ec338ea7ff6', 1, 1, 'token', '[]', 0, '2021-11-05 22:08:02', '2021-11-05 22:08:02', '2022-11-05 18:08:02'),
('ee6bb784cc07cb3a40579e510b14a75dcad602a913a7dfef9c0d132dc4b966121b51e35998e9f634', 1, 1, 'token', '[]', 0, '2021-11-05 22:09:03', '2021-11-05 22:09:03', '2022-11-05 18:09:03'),
('6a2a3755727e6263908e0bb4069c9fd88b12abea3b7738e75cfd75a7ab08ce91a4c5453ad61a1405', 1, 1, 'token', '[]', 0, '2021-11-07 19:00:15', '2021-11-07 19:00:15', '2022-11-07 14:00:15'),
('a41ad8a544eea78c55ac7d4249e408b5f48cd0c8fe0fe811cdad589b032fb46629eef4327046063c', 1, 1, 'token', '[]', 0, '2021-11-07 19:01:27', '2021-11-07 19:01:27', '2022-11-07 14:01:27'),
('b5adf4aecc3afaebcc850e3e4eb211631b8de655d54075e92f816ecef9436e3140d0e47abb75035f', 1, 1, 'token', '[]', 0, '2021-11-07 19:02:22', '2021-11-07 19:02:22', '2022-11-07 14:02:22'),
('0ef77b55f9a7e671a511f168db6a725035ae9cd9e6b47daa1b4a37ebd23c5d39f9e12d14aec6798e', 1, 1, 'token', '[]', 0, '2021-11-11 03:10:13', '2021-11-11 03:10:13', '2022-11-10 22:10:13'),
('f4a39c02ac4ec4c67d6bb5ad362d151a8c667416752efc886a0ae114e0da83b64a1645a133e3397a', 1, 1, 'token', '[]', 0, '2021-11-11 17:05:44', '2021-11-11 17:05:44', '2022-11-11 12:05:44'),
('410895f0cb974bebbafbeb2fa7d37f2f45903d78bfbf055c0eeb09b7f96ff0a3ac7901696749aea1', 1, 1, 'token', '[]', 0, '2021-11-11 17:07:28', '2021-11-11 17:07:28', '2022-11-11 12:07:28'),
('f51f33f4ac2eb5d9c439e9c3359cb7d5a9781bc1cb72fe12914d9025487c805756204a23626c619b', 1, 1, 'token', '[]', 0, '2021-11-11 17:08:33', '2021-11-11 17:08:33', '2022-11-11 12:08:33'),
('f0728d800dd5613cc6028b45aa859eda26ccb1cae9d47118fa0a5bfe2f83728fd9e068ef9b7468f5', 1, 1, 'token', '[]', 0, '2021-11-11 17:09:00', '2021-11-11 17:09:00', '2022-11-11 12:09:00'),
('f12e0f4b4e4893a9004d4fc23de225d7d9f07aab2cf9b84d759dd4a90885690cbfc5d3ea3994e4a2', 1, 1, 'token', '[]', 0, '2021-11-11 17:09:20', '2021-11-11 17:09:20', '2022-11-11 12:09:20'),
('f49c08cacf47fc9ea6af21841f704d75246a41b30fd0f82cf628d3f5e9fcd4fb81f34dc76dc98117', 1, 1, 'token', '[]', 0, '2021-11-11 17:09:51', '2021-11-11 17:09:51', '2022-11-11 12:09:51'),
('5ecc074312bfab5e5beb4f9809091a8a03c634577641a8aa5bf1def17687d9920be22e1beebbd827', 1, 1, 'token', '[]', 0, '2021-11-11 17:10:12', '2021-11-11 17:10:12', '2022-11-11 12:10:12'),
('53dcc88fd4169383d7f222766bc8c32e40239e25bf0b0a8adea0c5235099a557699e386e30401e4e', 1, 1, 'token', '[]', 0, '2021-11-11 20:17:12', '2021-11-11 20:17:12', '2022-11-11 15:17:12'),
('ea49af21de3c386ffe8687d9abd2d2d88b403ba06920378bda0a1f195c6372680e784e5b8e0ea070', 1, 1, 'token', '[]', 0, '2021-11-11 20:18:23', '2021-11-11 20:18:23', '2022-11-11 15:18:23'),
('7efbc02a8d727f6c11bd2144dba60863904b72fc1a0918c11dbfaba6ae4b05c703c674e776b01e89', 1, 1, 'token', '[]', 0, '2021-11-12 18:26:06', '2021-11-12 18:26:06', '2022-11-12 13:26:06'),
('5664bab9f74b7ae829967c8ca4a84a40e98a9d9e7febbecdc4251a01db64ac2ce8ba45c7fa0dd398', 1, 1, 'token', '[]', 0, '2021-11-13 05:18:48', '2021-11-13 05:18:48', '2022-11-13 00:18:48'),
('30da1fd1f1cce761035b5a0016e952cba92e42363a874ae3876c95db180be04bb850a8427b0f319e', 1, 1, 'token', '[]', 0, '2021-11-13 05:23:17', '2021-11-13 05:23:17', '2022-11-13 00:23:17'),
('d47488727ad61655fbd671d910591ea2900e0f6cae45bf01cf61eed423f59a1e3244b9a953bd2679', 1, 1, 'token', '[]', 0, '2021-11-13 23:21:35', '2021-11-13 23:21:35', '2022-11-13 18:21:35'),
('d9f04635955867c5065d3922e3a84a9ac0442f8ad9f9e9c42617543957e5d8e446084cc6e3f8d247', 1, 1, 'token', '[]', 0, '2021-11-13 23:21:51', '2021-11-13 23:21:51', '2022-11-13 18:21:51'),
('dec80b04cd2fe9eaa7c4398926ef7cad13b3de4355a691eeee8579aa9dc1cfc245beaf165175fbfd', 1, 1, 'token', '[]', 0, '2021-11-13 23:24:27', '2021-11-13 23:24:27', '2022-11-13 18:24:27'),
('baec95c6fa2c02886ea2053ca946392d01266648b6817f8af876249647d465c23fc5fed630d71490', 1, 1, 'token', '[]', 0, '2021-11-13 23:25:41', '2021-11-13 23:25:41', '2022-11-13 18:25:41'),
('045e60a976d6f25df58b9dcc933f59f04684a13bf5bfcb88ce08980cf0646873fc772dbf1a23a2cf', 1, 1, 'token', '[]', 0, '2021-11-13 23:27:26', '2021-11-13 23:27:26', '2022-11-13 18:27:26'),
('aea117d3218fc8e6dafc8a71a54aff2f77084c0ae80c3de4ec21ad30d6b74f9422ea3391dc955245', 1, 1, 'token', '[]', 0, '2021-11-15 16:56:52', '2021-11-15 16:56:52', '2022-11-15 11:56:52'),
('037cbda87dbb080d392d7c5d0ddafc4f20cd5763c2ffc7fbcb17df044e7f8cf3b7bcd7ceb74cba0c', 1, 1, 'token', '[]', 0, '2021-11-15 18:11:04', '2021-11-15 18:11:04', '2022-11-15 13:11:04'),
('da8101928786bcb7721b6afd3cf5304d1af179b6d3e6031fdcd40ebc77fd56a8c995b704b232cf9f', 1, 1, 'token', '[]', 0, '2021-11-15 22:39:39', '2021-11-15 22:39:39', '2022-11-15 17:39:39'),
('7a084159bf4bbeea5075b4f1a8155bec8e7f40bc50f2243de868f501fc46338a3055a56c801881ba', 1, 1, 'token', '[]', 0, '2021-11-15 22:45:46', '2021-11-15 22:45:46', '2022-11-15 17:45:46'),
('758e019e98ffd0f61250aeef8d775b42c00a9df142e253c113261e2ad8e442fe0ee3f09533cfa429', 1, 1, 'token', '[]', 0, '2021-11-15 22:46:16', '2021-11-15 22:46:16', '2022-11-15 17:46:16'),
('380b451c931a31e380820811a37c0a9d5c4b6f758d9ff8ad3591f5701e03c0fbbdb5fddbb6104004', 1, 1, 'token', '[]', 0, '2021-11-15 22:46:56', '2021-11-15 22:46:56', '2022-11-15 17:46:56'),
('fd7f6eb48cc2c44258a750c13692ceb75ee7095f57dff3c240f73dbeaf9cf5217ae18f16d3e3b8e5', 1, 1, 'token', '[]', 0, '2021-11-15 23:44:40', '2021-11-15 23:44:40', '2022-11-15 18:44:40'),
('3aeb71777d377e9a399aa2202db7711667a227570a570892c3842809736ccec9423db8b52170e910', 1, 1, 'token', '[]', 0, '2021-11-16 02:03:40', '2021-11-16 02:03:40', '2022-11-15 21:03:40'),
('289b2fa9b3638c12a836ea7c9d469968212d9bf2d35d14d4d3a72fb421c1511bc9635bd79f6ec87d', 1, 1, 'token', '[]', 0, '2021-11-16 02:04:39', '2021-11-16 02:04:39', '2022-11-15 21:04:39'),
('4fc18416432de064fa8dc088d5c594cebfc695baa6d5074e9034f2de8f6cc4a4d3e5f2b3454f788f', 1, 1, 'token', '[]', 0, '2021-11-16 02:07:14', '2021-11-16 02:07:14', '2022-11-15 21:07:14'),
('1b308f52cf14df347be482e9126249008ba6a929f0536be27067166b943f7c26726775bed8667b1e', 1, 1, 'token', '[]', 0, '2021-11-16 02:08:34', '2021-11-16 02:08:34', '2022-11-15 21:08:34'),
('7cc4dd5bb54460950abc655a513ed9c6ea154b34453b63fee6d58ad1556af8dc8b3cd5a18f7d61ff', 1, 1, 'token', '[]', 0, '2021-11-16 02:11:31', '2021-11-16 02:11:31', '2022-11-15 21:11:31'),
('94a08dff187731f3d6fee060806be625ac22d549ead852f68fe976eaf4f1dfe8a08228b3f76181df', 1, 1, 'token', '[]', 0, '2021-11-16 14:10:03', '2021-11-16 14:10:03', '2022-11-16 09:10:03'),
('0c91b6fcd0ce8fa76481156297212dd45c57d9bf5deba46ef55160fb7957eb14661890d1803ceaa5', 1, 1, 'token', '[]', 0, '2021-11-16 14:23:12', '2021-11-16 14:23:12', '2022-11-16 09:23:12'),
('fb3c99442ad533735eda44919a2032536a48256919889d0fef6eab55f5e8954a0fe405bad3a3148d', 1, 1, 'token', '[]', 0, '2021-11-16 19:46:16', '2021-11-16 19:46:16', '2022-11-16 14:46:16'),
('26baba4e8d270019710306fe197be85aa6d2e98da3afe1bbf9104d28345bafbe59901cd7513dee76', 1, 1, 'token', '[]', 0, '2021-11-16 19:50:45', '2021-11-16 19:50:45', '2022-11-16 14:50:45'),
('56ac50a657d3cdc0247af0fa32f64ca00eb3ed7ccd7571f31fe0c200860974b05089826ae5531bbd', 1, 1, 'token', '[]', 0, '2021-11-16 19:51:35', '2021-11-16 19:51:35', '2022-11-16 14:51:35'),
('7bb245cac709f3394fe533595c360029c5859b4ea5d3057cc040273446e4ae24a5916f588ed1d180', 1, 1, 'token', '[]', 0, '2021-11-18 04:19:27', '2021-11-18 04:19:27', '2022-11-17 23:19:27'),
('9c0565498a44fcfcb89d374fb6fa11dd6e967e9a12bf42d7675b12a4740bb852b7e191bec450b7e0', 1, 1, 'token', '[]', 0, '2021-11-18 04:20:38', '2021-11-18 04:20:38', '2022-11-17 23:20:38'),
('90e306da632be58258d07d84ae35ca1778375c01124bcfcc3e97c1fbc05c1c4cec2a87a9ecc158c9', 1, 1, 'token', '[]', 0, '2021-11-18 04:22:42', '2021-11-18 04:22:42', '2022-11-17 23:22:42'),
('a654fa36983bbad94e3c02ec356b00c833e6cb0060af1a03b48905c373054e09e4e96a968b5cd678', 1, 1, 'token', '[]', 0, '2021-11-18 04:24:56', '2021-11-18 04:24:56', '2022-11-17 23:24:56'),
('de7944b3326ceb32ee4b43b4a34c1ba83ef8589588b0d1fab1aafbab303436a560619fab00401139', 1, 1, 'token', '[]', 0, '2021-11-18 04:26:34', '2021-11-18 04:26:34', '2022-11-17 23:26:34');

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
(1, NULL, 'Laravel Personal Access Client', 'RSvd2I8SaQcas9Bh570brIXuWy1rsxeUGxy6AZHd', NULL, 'http://localhost', 1, 0, 0, '2021-10-07 04:55:41', '2021-10-07 04:55:41'),
(2, NULL, 'Laravel Password Grant Client', '2fmjgXahF2lStZd0pm8WRm6lBEnzdstYBp2RT6AQ', 'users', 'http://localhost', 0, 1, 0, '2021-10-07 04:55:41', '2021-10-07 04:55:41');

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
(1, 1, '2021-10-07 04:55:41', '2021-10-07 04:55:41');

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
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `operation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`id`, `name`, `cost`, `color`, `doctor_id`, `operation_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'operative\r\n', NULL, '#C4AEAD', NULL, NULL, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(2, 'Endo\r\n', NULL, '#FFA07A', NULL, NULL, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(3, 'Extraction\r\n', NULL, '#667C26', NULL, NULL, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(4, 'Crown\r\n', NULL, '#E2A76F', NULL, NULL, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(5, 'Scaling\r\n', NULL, NULL, NULL, NULL, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(6, 'Post & Core\r\n', 150, '#C4AEAD', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(7, 'Filling\r\n', 100, '#C4AEAD', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(8, 'Normal\r\n', 300, '#FFA07A', NULL, 2, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(9, 'Retreatment\r\n', 65, '#FFA07A', 1, 2, NULL, NULL, NULL),
(10, 'Simple\r\n', 120, '#667C26', NULL, 3, NULL, NULL, NULL),
(11, 'Impaction\r\n', 110, '#667C26', 1, 3, NULL, NULL, NULL),
(12, 'PFM', 120, '#E2A76F', NULL, 4, NULL, NULL, NULL),
(13, 'Zirconia \r\n', 85, '#E2A76F', NULL, 4, NULL, NULL, NULL),
(14, 'Scaling', 200, '#00B0F0', NULL, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_history` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` double NOT NULL DEFAULT 0,
  `nurse_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `phone`, `age`, `address`, `national_id`, `medical_history`, `wallet`, `nurse_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hossam', '01010079798', 5, 'assuit', NULL, NULL, 0, 1, '2021-10-07 04:55:33', '2021-10-09 03:51:53', '2021-10-09 03:51:53'),
(2, 'Prof. Micheal Reichert', '+7125774058641', 31, 'Ivy Jast', '123456789', NULL, 0, 2, '2021-10-07 04:55:33', '2021-10-09 03:51:58', '2021-10-09 03:51:58'),
(3, 'Andrew Moen I', '+9954569494299', 29, 'Adele Ebert', '123456789', NULL, 0, 1, '2021-10-07 04:55:33', '2021-10-09 03:52:05', '2021-10-09 03:52:05'),
(4, 'Camron Aufderhar', '+4985113593477', 16, 'Thomas Stiedemann DDS', '123456789', NULL, 0, 1, '2021-10-07 04:55:33', '2021-10-09 03:52:08', '2021-10-09 03:52:08'),
(5, 'Prof. Hester O\'Reilly', '+3160995018568', 23, 'Amya Schmeler', '123456789', NULL, 0, 2, '2021-10-07 04:55:33', '2021-10-09 03:52:10', '2021-10-09 03:52:10'),
(6, 'Miss Kyla Becker', '+4029026221078', 28, 'Friedrich Lakin', '123456789', NULL, 0, 2, '2021-10-07 04:55:33', '2021-10-09 03:52:14', '2021-10-09 03:52:14'),
(7, 'Miss Martina Jacobson Jr.', '+6861848756609', 64, 'Bonita Greenfelder', '123456789', NULL, 0, 1, '2021-10-07 04:55:33', '2021-10-09 03:52:18', '2021-10-09 03:52:18'),
(8, 'Prof. Caesar Kunze II', '+9996127979760', 56, 'Natasha Brekke DDS', '123456789', NULL, 0, 2, '2021-10-07 04:55:33', '2021-10-09 03:52:20', '2021-10-09 03:52:20'),
(9, 'Wilburn Balistreri', '+2974869064835', 79, 'Terrence Ferry', '123456789', NULL, 0, 2, '2021-10-07 04:55:33', '2021-10-09 03:52:23', '2021-10-09 03:52:23'),
(10, 'Bailee Wisoky', '+6888730704601', 29, 'Manley Dooley', '123456789', NULL, 0, 1, '2021-10-07 04:55:33', '2021-10-09 03:52:25', '2021-10-09 03:52:25'),
(11, 'Jimmy Kuhlman', '+7924541645106', 71, 'Wiley Connelly', '123456789', NULL, 0, 2, '2021-10-07 04:55:33', '2021-10-09 03:52:28', '2021-10-09 03:52:28'),
(12, 'اسلام', '01000347725', 25, 'قاهرة', '01234567898765', '-,-,-,-,-,-,-,-,-,-,-,-,chemotherapy,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-', 0, 1, '2021-10-07 19:34:23', '2021-10-27 01:56:19', '2021-10-27 01:56:19'),
(13, 'محمد', '01000347725', 25, 'اسيوط', '12345646546545', '-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,useAnyMedications,شسي,-,-,-,-,-,-,-,id', 0, 1, '2021-10-27 01:53:34', '2021-10-27 01:56:15', '2021-10-27 01:56:15'),
(14, 'mohamed saad saad saad', '01024491615', 20, 'ff', '01024491661120', '-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-', 0, 1, '2021-10-27 23:54:33', '2021-11-11 17:07:49', '2021-11-11 17:07:49'),
(15, 'hossam patient', '01010079798', 21, 'asuit', '12345678912345', 'heartDisease,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,underMedicalCare,-,-,-,-,dentalAnesthetic,-,-,smoking,-,-', 0, 1, '2021-11-04 22:33:47', '2021-11-15 23:42:36', '2021-11-15 23:42:36'),
(16, 'Islam', '01000347725', 24, 'asd', '01234567898765', '-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-', 0, 1, '2021-11-11 17:08:08', '2021-11-15 23:42:32', '2021-11-15 23:42:32'),
(17, 'mohamed saad saad saad', '01024491615', 29, 'ff', '11111111111111', 'heartDisease,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,underMedicalCare,useAsprin,-,-,-,-,-,-,smoking,-,-', -70, 1, '2021-11-16 02:01:54', '2021-11-16 19:49:47', '2021-11-16 19:49:47'),
(18, 'Islam', '01000347725', 27, 'cairo', '01234567898765', '-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-', 65, 1, '2021-11-16 19:50:11', '2021-11-17 14:10:11', NULL),
(19, 'ahmed saad', '01022222222', 50, 'f', '33333333333333', '-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-', 90, 1, '2021-11-18 04:22:11', '2021-11-18 04:25:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teeths`
--

CREATE TABLE `teeths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `initial_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teeths`
--

INSERT INTO `teeths` (`id`, `initial_status`, `status`, `patient_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(2, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(3, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(4, 'good', 'simple', 1, '2021-10-07 04:55:33', '2021-10-23 21:41:53', NULL),
(5, 'good', 'impaction', 1, '2021-10-07 04:55:33', '2021-10-23 21:39:12', NULL),
(6, 'good', 'Post & Core', 1, '2021-10-07 04:55:33', '2021-11-04 22:37:24', NULL),
(7, 'good', 'Filling', 1, '2021-10-07 04:55:33', '2021-11-05 22:05:02', NULL),
(8, 'good', 'Ziscer', 1, '2021-10-07 04:55:33', '2021-10-23 21:41:22', NULL),
(9, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(10, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(11, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(12, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(13, 'good', 'Zirconia', 1, '2021-10-07 04:55:33', '2021-11-05 21:58:52', NULL),
(14, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(15, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(16, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(17, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(18, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(19, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(20, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(21, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(22, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(23, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(24, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(25, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(26, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(27, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(28, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(29, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(30, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(31, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(32, 'good', NULL, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(33, 'Good', 'Cares', 12, '2021-10-07 19:34:23', '2021-10-09 22:36:32', NULL),
(34, 'good', 'Fixed prosthetics', 12, '2021-10-07 19:34:23', '2021-10-09 22:22:57', NULL),
(35, 'good', 'Good', 12, '2021-10-07 19:34:23', '2021-10-08 22:23:14', NULL),
(36, 'good', 'Good', 12, '2021-10-07 19:34:23', '2021-10-08 22:23:06', NULL),
(37, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(38, 'Calculs', 'Calculs', 12, '2021-10-07 19:34:23', '2021-10-27 01:44:43', NULL),
(39, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(40, 'Implant', 'Good', 12, '2021-10-07 19:34:23', '2021-10-08 22:13:59', NULL),
(41, 'Missing', 'Missing', 12, '2021-10-07 19:34:23', '2021-10-09 22:32:50', NULL),
(42, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(43, 'good', 'simple - 100 egp', 12, '2021-10-07 19:34:23', '2021-10-23 21:30:43', NULL),
(44, 'Good', 'خلع', 12, '2021-10-07 19:34:23', '2021-10-22 23:02:33', NULL),
(45, 'Missing', 'Good', 12, '2021-10-07 19:34:23', '2021-10-08 22:49:31', NULL),
(46, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(47, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(48, 'Calculs', 'Cares', 12, '2021-10-07 19:34:23', '2021-10-09 22:36:44', NULL),
(49, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(50, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(51, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(52, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(53, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(54, 'good', 'Cares', 12, '2021-10-07 19:34:23', '2021-10-09 23:00:13', NULL),
(55, 'Cares', 'Good', 12, '2021-10-07 19:34:23', '2021-10-08 22:23:19', NULL),
(56, 'Good', 'Good', 12, '2021-10-07 19:34:23', '2021-10-07 20:17:39', NULL),
(57, 'Implant', 'Implant', 12, '2021-10-07 19:34:23', '2021-10-09 22:32:57', NULL),
(58, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(59, 'Fixed prosthetics', 'Fixed prosthetics', 12, '2021-10-07 19:34:23', '2021-10-09 22:59:41', NULL),
(60, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(61, 'Missing', 'Missing', 12, '2021-10-07 19:34:23', '2021-10-09 22:58:16', NULL),
(62, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(63, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(64, 'good', 'good', 12, '2021-10-07 19:34:23', '2021-10-07 19:34:23', NULL),
(65, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(66, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(67, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(68, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(69, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(70, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(71, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(72, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(73, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(74, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(75, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(76, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(77, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(78, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(79, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(80, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(81, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(82, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(83, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(84, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(85, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(86, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(87, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(88, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(89, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(90, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(91, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(92, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(93, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(94, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(95, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(96, 'good', 'good', 13, '2021-10-27 01:53:34', '2021-10-27 01:53:34', NULL),
(97, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(98, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(99, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(100, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(101, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(102, 'Implant', 'Implant', 14, '2021-10-27 23:54:33', '2021-10-28 04:29:58', NULL),
(103, 'Fixed prosthetics', 'Fixed prosthetics', 14, '2021-10-27 23:54:33', '2021-10-28 04:30:15', NULL),
(104, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(105, 'Fixed prosthetics', 'Fixed prosthetics', 14, '2021-10-27 23:54:33', '2021-10-28 04:27:05', NULL),
(106, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(107, 'Cares', 'Cares', 14, '2021-10-27 23:54:33', '2021-10-28 04:29:50', NULL),
(108, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(109, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(110, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(111, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(112, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(113, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(114, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(115, 'Removable prosthetics', 'Removable prosthetics', 14, '2021-10-27 23:54:33', '2021-10-27 23:56:03', NULL),
(116, 'Removable prosthetics', 'Removable prosthetics', 14, '2021-10-27 23:54:33', '2021-10-28 04:27:28', NULL),
(117, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(118, 'Implant', 'Implant', 14, '2021-10-27 23:54:33', '2021-10-28 04:27:54', NULL),
(119, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(120, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(121, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(122, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(123, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(124, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(125, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(126, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(127, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(128, 'good', 'good', 14, '2021-10-27 23:54:33', '2021-10-27 23:54:33', NULL),
(129, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(130, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(131, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(132, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(133, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(134, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(135, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(136, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(137, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(138, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(139, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(140, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(141, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(142, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(143, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(144, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(145, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(146, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(147, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(148, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(149, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(150, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(151, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(152, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(153, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(154, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(155, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(156, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(157, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(158, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(159, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(160, 'good', 'good', 15, '2021-11-04 22:33:47', '2021-11-04 22:33:47', NULL),
(161, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(162, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(163, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(164, 'Removable prosthetics', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(165, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(166, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(167, 'Fixed prosthetics', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(168, 'Good', 'Retreatment', 16, '2021-11-11 17:08:08', '2021-11-15 17:15:51', NULL),
(169, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(170, 'Cares', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(171, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(172, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(173, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(174, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(175, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(176, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(177, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(178, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(179, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(180, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(181, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(182, 'Good', 'Post & Core', 16, '2021-11-11 17:08:08', '2021-11-15 22:46:36', NULL),
(183, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(184, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(185, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(186, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(187, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(188, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(189, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(190, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(191, 'Good', 'Good', 16, '2021-11-11 17:08:08', '2021-11-15 16:58:52', NULL),
(192, 'Good', 'Scaling', 16, '2021-11-11 17:08:08', '2021-11-15 17:05:07', NULL),
(193, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(194, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(195, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(196, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(197, 'Fixed prosthetics', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(198, 'Cares', 'Cares', 17, '2021-11-16 02:01:54', '2021-11-16 02:09:34', NULL),
(199, 'Missing', 'Filling', 17, '2021-11-16 02:01:54', '2021-11-16 02:06:29', NULL),
(200, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(201, 'Cares', 'Impaction', 17, '2021-11-16 02:01:54', '2021-11-16 02:10:33', NULL),
(202, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(203, 'Fixed prosthetics', 'Simple', 17, '2021-11-16 02:01:54', '2021-11-16 02:06:42', NULL),
(204, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(205, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(206, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(207, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(208, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(209, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(210, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(211, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(212, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(213, 'Missing', 'Zirconia', 17, '2021-11-16 02:01:54', '2021-11-16 02:06:48', NULL),
(214, 'Implant', 'Implant', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:37', NULL),
(215, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(216, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(217, 'Fixed prosthetics', 'Fixed prosthetics', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:55', NULL),
(218, 'good', 'Retreatment', 17, '2021-11-16 02:01:54', '2021-11-16 02:06:35', NULL),
(219, 'Removable prosthetics', 'Removable prosthetics', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:47', NULL),
(220, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(221, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(222, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(223, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(224, 'good', 'Calculs', 17, '2021-11-16 02:01:54', '2021-11-16 02:05:23', NULL),
(225, 'good', 'Retreatment', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:10', NULL),
(226, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(227, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(228, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(229, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(230, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(231, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(232, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(233, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(234, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(235, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(236, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(237, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(238, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(239, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(240, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(241, 'good', 'Scaling', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:17', NULL),
(242, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(243, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(244, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(245, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(246, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(247, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(248, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(249, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(250, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(251, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(252, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(253, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(254, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(255, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(256, 'good', 'Good', 18, '2021-11-16 19:50:11', '2021-11-16 19:51:01', NULL),
(264, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(263, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(262, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(261, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(260, 'good', 'Simple', 19, '2021-11-18 04:22:11', '2021-11-18 04:23:59', NULL),
(259, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(258, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(257, 'Missing', 'Normal', 19, '2021-11-18 04:22:11', '2021-11-18 04:23:51', NULL),
(265, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(266, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(267, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(268, 'Implant', 'Implant', 19, '2021-11-18 04:22:11', '2021-11-18 04:23:11', NULL),
(269, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(270, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(271, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(272, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(273, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(274, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(275, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(276, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(277, 'Fixed prosthetics', 'Fixed prosthetics', 19, '2021-11-18 04:22:11', '2021-11-18 04:23:19', NULL),
(278, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(279, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(280, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(281, 'Removable prosthetics', 'Removable prosthetics', 19, '2021-11-18 04:22:11', '2021-11-18 04:23:24', NULL),
(282, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(283, 'Cares', 'Cares', 19, '2021-11-18 04:22:11', '2021-11-18 04:23:37', NULL),
(284, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(285, 'good', 'PFM', 19, '2021-11-18 04:22:11', '2021-11-18 04:24:07', NULL),
(286, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(287, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL),
(288, 'good', 'Calculs', 19, '2021-11-18 04:22:11', '2021-11-18 04:22:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teeth_operations`
--

CREATE TABLE `teeth_operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `operation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `visit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teeth_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teeth_operations`
--

INSERT INTO `teeth_operations` (`id`, `operation`, `cost`, `patient_id`, `doctor_id`, `visit_id`, `teeth_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'repair', 50, 1, NULL, 1, 1, '2021-10-07 04:55:33', '2021-10-07 04:55:33', NULL),
(2, '1', NULL, 12, NULL, 53, 33, '2021-10-08 18:58:26', '2021-10-08 19:47:12', '2021-10-08 19:47:12'),
(3, 'Implant', NULL, 12, NULL, 53, 33, '2021-10-08 19:50:29', '2021-10-08 19:50:40', '2021-10-08 19:50:40'),
(4, 'Calculs', NULL, 12, NULL, 53, 33, '2021-10-08 19:52:54', '2021-10-08 19:56:28', '2021-10-08 19:56:28'),
(5, 'Calculs', NULL, 12, NULL, 53, 33, '2021-10-08 19:57:34', '2021-10-08 19:57:47', '2021-10-08 19:57:47'),
(6, 'Calculs', NULL, 12, NULL, 53, 33, '2021-10-08 19:58:11', '2021-10-08 19:58:53', '2021-10-08 19:58:53'),
(7, 'Cares', NULL, 12, NULL, 53, 33, '2021-10-08 20:03:08', '2021-10-08 20:03:14', '2021-10-08 20:03:14'),
(8, 'Missing', NULL, 12, NULL, 53, 34, '2021-10-08 20:09:06', '2021-10-08 20:09:17', '2021-10-08 20:09:17'),
(9, 'Calculs', NULL, 12, NULL, 53, 36, '2021-10-08 22:03:48', '2021-10-08 22:08:35', '2021-10-08 22:08:35'),
(10, 'Cares', NULL, 12, NULL, 53, 36, '2021-10-08 22:10:36', '2021-10-08 22:11:25', '2021-10-08 22:11:25'),
(11, 'Good', NULL, 12, NULL, 53, 35, '2021-10-08 22:11:18', '2021-10-08 22:11:22', '2021-10-08 22:11:22'),
(12, 'Implant', NULL, 12, NULL, 53, 35, '2021-10-08 22:12:23', '2021-10-08 22:14:09', '2021-10-08 22:14:09'),
(13, 'Good', NULL, 12, NULL, 53, 33, '2021-10-08 22:13:11', '2021-10-08 22:14:10', '2021-10-08 22:14:10'),
(14, 'Good', NULL, 12, NULL, 53, 40, '2021-10-08 22:13:59', '2021-10-08 22:14:13', '2021-10-08 22:14:13'),
(15, 'Removable prosthetics', NULL, 12, NULL, 53, 38, '2021-10-08 22:14:05', '2021-10-08 22:14:15', '2021-10-08 22:14:15'),
(16, 'Good', NULL, 12, NULL, 53, 45, '2021-10-08 22:14:36', '2021-10-08 22:22:52', '2021-10-08 22:22:52'),
(17, 'Good', NULL, 12, NULL, 53, 38, '2021-10-08 22:23:01', '2021-10-08 22:23:29', '2021-10-08 22:23:29'),
(18, 'Good', NULL, 12, NULL, 53, 36, '2021-10-08 22:23:06', '2021-10-08 22:23:31', '2021-10-08 22:23:31'),
(19, 'Good', NULL, 12, NULL, 53, 34, '2021-10-08 22:23:10', '2021-10-08 22:23:33', '2021-10-08 22:23:33'),
(20, 'Good', NULL, 12, NULL, 53, 35, '2021-10-08 22:23:14', '2021-10-08 22:23:34', '2021-10-08 22:23:34'),
(21, 'Good', NULL, 12, NULL, 53, 55, '2021-10-08 22:23:19', '2021-10-08 22:23:36', '2021-10-08 22:23:36'),
(22, 'Good', NULL, 12, NULL, 53, 48, '2021-10-08 22:23:26', '2021-10-08 22:23:38', '2021-10-08 22:23:38'),
(23, 'Calculs', NULL, 12, NULL, 53, 45, '2021-10-08 22:34:05', '2021-10-08 22:44:16', '2021-10-08 22:44:16'),
(24, 'Good', NULL, 12, NULL, 53, 45, '2021-10-08 22:49:31', '2021-10-08 22:49:36', '2021-10-08 22:49:36'),
(25, 'Implant', NULL, 12, NULL, 54, 61, '2021-10-08 23:28:42', '2021-10-08 23:29:31', '2021-10-08 23:29:31'),
(26, 'Good', NULL, 12, NULL, 54, 61, '2021-10-08 23:29:37', '2021-10-08 23:29:52', '2021-10-08 23:29:52'),
(27, 'Calculs', NULL, 12, NULL, 53, 33, '2021-10-09 03:21:57', '2021-10-09 04:06:58', '2021-10-09 04:06:58'),
(28, 'Cares', NULL, 12, NULL, 53, 33, '2021-10-09 04:07:05', '2021-10-09 04:07:08', '2021-10-09 04:07:08'),
(29, 'Good', NULL, 12, NULL, 53, 33, '2021-10-09 04:07:33', '2021-10-09 04:07:38', '2021-10-09 04:07:38'),
(30, 'Cares', NULL, 12, NULL, 53, 33, '2021-10-09 20:57:24', '2021-10-09 20:57:26', '2021-10-09 20:57:26'),
(31, 'Missing', NULL, 12, NULL, 53, 33, '2021-10-09 20:57:52', '2021-10-09 20:57:54', '2021-10-09 20:57:54'),
(32, 'Implant', NULL, 12, NULL, 53, 33, '2021-10-09 21:53:31', '2021-10-09 21:53:45', '2021-10-09 21:53:45'),
(33, 'Implant', NULL, 12, NULL, 53, 33, '2021-10-09 21:55:15', '2021-10-09 21:55:20', '2021-10-09 21:55:20'),
(34, 'Implant', NULL, 12, NULL, 53, 33, '2021-10-09 22:11:08', '2021-10-09 22:11:10', '2021-10-09 22:11:10'),
(35, 'Cares', NULL, 12, NULL, 53, 33, '2021-10-09 22:14:19', '2021-10-09 22:36:32', '2021-10-09 22:36:32'),
(36, 'Implant', NULL, 12, NULL, 53, 33, '2021-10-09 22:22:04', '2021-10-09 22:31:21', '2021-10-09 22:31:21'),
(37, 'Fixed prosthetics', NULL, 12, NULL, 53, 34, '2021-10-09 22:22:57', '2021-10-09 22:23:03', '2021-10-09 22:23:03'),
(38, 'Fixed prosthetics', NULL, 12, NULL, 53, 33, '2021-10-09 22:26:46', '2021-10-09 22:29:11', '2021-10-09 22:29:11'),
(39, 'Cares', NULL, 12, NULL, 53, 48, '2021-10-09 22:36:44', '2021-10-24 00:34:15', '2021-10-24 00:34:15'),
(40, 'Cares', NULL, 12, NULL, 55, 54, '2021-10-09 23:00:13', '2021-10-23 21:39:38', '2021-10-23 21:39:38'),
(41, 'خلع', NULL, 12, NULL, 55, 44, '2021-10-22 23:02:33', '2021-10-22 23:02:42', '2021-10-22 23:02:42'),
(42, 'خلع', NULL, 12, NULL, 55, 44, '2021-10-23 20:47:44', '2021-10-23 21:39:39', '2021-10-23 21:39:39'),
(43, 'Good', NULL, 12, NULL, 55, 38, '2021-10-23 20:50:05', '2021-10-23 21:39:41', '2021-10-23 21:39:41'),
(44, 'good', NULL, 12, NULL, 55, 37, '2021-10-23 20:50:33', '2021-10-23 21:39:44', '2021-10-23 21:39:44'),
(45, 'Good', NULL, 12, NULL, 55, 45, '2021-10-23 21:28:18', '2021-10-23 21:40:47', '2021-10-23 21:40:47'),
(46, 'simple - 100 egp', NULL, 12, NULL, 55, 43, '2021-10-23 21:30:43', '2021-10-23 21:39:35', '2021-10-23 21:39:35'),
(47, 'Good', NULL, 12, NULL, 55, 38, '2021-10-23 21:34:26', '2021-10-23 21:40:50', '2021-10-23 21:40:50'),
(48, NULL, 100, 12, NULL, 55, 7, '2021-10-23 21:38:32', '2021-10-23 21:40:56', '2021-10-23 21:40:56'),
(49, 'impaction', 100, 12, NULL, 55, 5, '2021-10-23 21:39:12', '2021-10-23 21:41:01', '2021-10-23 21:41:01'),
(50, 'طربوش', 150, 12, NULL, 55, 6, '2021-10-23 21:39:26', '2021-10-23 21:41:03', '2021-10-23 21:41:03'),
(51, 'طربوش', 520, 12, NULL, 55, 6, '2021-10-23 21:41:13', '2021-10-24 00:32:54', NULL),
(52, 'Ziscer', 300, 12, NULL, 55, 8, '2021-10-23 21:41:22', '2021-10-23 21:41:22', NULL),
(53, 'simple', 100, 12, NULL, 55, 4, '2021-10-23 21:41:53', '2021-10-24 00:29:52', '2021-10-24 00:29:52'),
(54, 'PFM', 100, 12, NULL, 55, 7, '2021-10-23 21:42:16', '2021-10-24 00:29:54', '2021-10-24 00:29:54'),
(55, 'طربوش', 150, 12, NULL, 55, 6, '2021-10-23 21:57:40', '2021-10-24 00:29:49', '2021-10-24 00:29:49'),
(56, 'طربوش', 200, 12, NULL, 53, 6, '2021-10-24 00:34:21', '2021-10-24 00:34:27', NULL),
(57, 'Ziscer', 3000, 12, NULL, 57, 8, '2021-10-27 01:46:07', '2021-10-27 01:46:19', NULL),
(58, 'simple', 1000, 13, NULL, 58, 4, '2021-10-27 01:55:16', '2021-10-27 01:55:28', NULL),
(59, 'Ziscer', 3000, 13, NULL, 58, 8, '2021-10-27 01:55:23', '2021-10-27 01:55:28', NULL),
(60, 'simple', 100, 14, NULL, 59, 4, '2021-10-27 23:56:19', '2021-10-27 23:56:19', NULL),
(61, 'impaction', 100, 14, NULL, 59, 5, '2021-10-28 04:28:20', '2021-10-28 04:28:20', NULL),
(62, 'Post & Core', 150, 15, NULL, 60, 6, '2021-11-04 22:37:24', '2021-11-04 22:37:24', NULL),
(63, 'Zirconia', 85, 14, NULL, 61, 13, '2021-11-05 21:58:52', '2021-11-05 21:59:00', '2021-11-05 21:59:00'),
(64, 'Filling', 50, 14, NULL, 61, 7, '2021-11-05 22:05:02', '2021-11-05 22:05:17', NULL),
(65, 'Filling', 50, 15, NULL, 62, 7, '2021-11-07 19:02:00', '2021-11-07 19:02:06', NULL),
(66, NULL, NULL, 16, NULL, 63, 171, '2021-11-11 19:19:16', '2021-11-11 19:20:33', '2021-11-11 19:20:33'),
(67, NULL, NULL, 16, NULL, 63, 171, '2021-11-11 19:20:43', '2021-11-11 20:06:57', '2021-11-11 20:06:57'),
(68, NULL, NULL, 16, NULL, 63, 171, '2021-11-11 20:05:55', '2021-11-11 20:06:54', '2021-11-11 20:06:54'),
(69, 'Normal', 300, 16, NULL, 63, 171, '2021-11-11 20:07:06', '2021-11-11 20:14:50', '2021-11-11 20:14:50'),
(70, 'Normal', 1, 16, NULL, 63, 187, '2021-11-11 20:14:44', '2021-11-11 20:16:24', NULL),
(71, 'Impaction', 2, 16, NULL, 63, 171, '2021-11-11 20:16:01', '2021-11-11 20:16:24', NULL),
(72, 'Impaction', 50, 16, NULL, 65, 167, '2021-11-13 23:23:46', '2021-11-13 23:24:07', NULL),
(73, 'Impaction', 100, 16, NULL, 65, 170, '2021-11-13 23:23:54', '2021-11-13 23:24:07', NULL),
(74, 'Normal', 300, 16, NULL, 66, 167, '2021-11-13 23:27:05', '2021-11-13 23:27:05', NULL),
(75, 'Scaling', 200, 16, NULL, 67, 168, '2021-11-15 16:58:25', '2021-11-15 16:58:38', '2021-11-15 16:58:38'),
(76, 'Post & Core', 150, 16, NULL, 67, 192, '2021-11-15 17:04:20', '2021-11-15 17:14:29', '2021-11-15 17:14:29'),
(77, 'Normal', 300, 16, NULL, 67, 192, '2021-11-15 17:04:34', '2021-11-15 17:14:32', '2021-11-15 17:14:32'),
(78, 'Simple', 120, 16, NULL, 67, 192, '2021-11-15 17:04:40', '2021-11-15 17:14:34', '2021-11-15 17:14:34'),
(79, 'PFM', 120, 16, NULL, 67, 192, '2021-11-15 17:04:58', '2021-11-15 17:14:36', '2021-11-15 17:14:36'),
(80, 'Scaling', 200, 16, NULL, 67, 192, '2021-11-15 17:05:07', '2021-11-15 17:14:38', '2021-11-15 17:14:38'),
(81, 'Retreatment', 65, 16, NULL, 67, 168, '2021-11-15 17:15:51', '2021-11-15 17:15:51', NULL),
(82, 'Post & Core', 150, 16, NULL, 64, 182, '2021-11-15 22:46:36', '2021-11-15 22:46:36', NULL),
(83, 'Filling', 100, 17, NULL, 68, 199, '2021-11-16 02:06:29', '2021-11-16 02:06:29', NULL),
(84, 'Retreatment', 65, 17, NULL, 68, 218, '2021-11-16 02:06:35', '2021-11-16 02:06:35', NULL),
(85, 'Simple', 120, 17, NULL, 68, 203, '2021-11-16 02:06:42', '2021-11-16 02:06:42', NULL),
(86, 'Zirconia', 85, 17, NULL, 68, 213, '2021-11-16 02:06:48', '2021-11-16 02:06:48', NULL),
(87, 'Impaction', 110, 17, NULL, 69, 201, '2021-11-16 02:10:33', '2021-11-16 02:10:33', NULL),
(88, 'Retreatment', 65, 18, NULL, 72, 225, '2021-11-16 19:51:10', '2021-11-16 19:51:10', NULL),
(89, 'Scaling', 200, 18, NULL, 72, 241, '2021-11-16 19:51:17', '2021-11-16 19:51:17', NULL),
(90, 'Normal', 300, 19, NULL, 73, 257, '2021-11-18 04:23:51', '2021-11-18 04:23:51', NULL),
(91, 'Simple', 120, 19, NULL, 73, 260, '2021-11-18 04:23:59', '2021-11-18 04:23:59', NULL),
(92, 'PFM', 120, 19, NULL, 73, 285, '2021-11-18 04:24:07', '2021-11-18 04:24:07', NULL);

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
(1, 'master_admin', 'master admin', '$2y$10$.1sECkNROR7QZi1BHohe0.UVbpWeCHopLanMD2ctpxf2GRc6billC', '01010079798', 'masteradmin@asd.asd', 10, NULL, 1, NULL, NULL, '2021-10-07 04:55:32', '2021-10-07 04:55:32'),
(2, 'super_admin', 'super admin', '$2y$10$W/9QoGD41U64vyo116Vws.AIVA3xnMwUSiVE/xm1oO.ntm.t.FQZ6', '01010079798', 'superadmin@asd.asd', 9, NULL, 1, NULL, NULL, '2021-10-07 04:55:32', '2021-10-07 04:55:32'),
(3, 'admin', 'admin', '$2y$10$nT1j9iN.0UUDSdFMaacN3.eBrKSXMcxu6ZA8YOyQR/esvfP/Yj6xK', '01010079798', 'admin@asd.asd', 1, NULL, 1, NULL, NULL, '2021-10-07 04:55:32', '2021-10-07 04:55:32'),
(4, 'Gayle Jaskolski_user', 'Harry Doyle I', '$2y$10$7J6OFeli5Q9Sh9Em6xIdmOpG8d.N4CrVrdhxfTXZJjKAAXG8Le9I6', '+8498083808562', 'brain39@emmerich.info', 1, NULL, 1, NULL, NULL, '2021-10-07 04:55:32', '2021-10-07 04:55:32'),
(5, 'Ms. Cristal Cummings II_user', 'Christine Wilkinson', '$2y$10$zhXkC.3P3/vNpRMTZ.7kj.4qSPCQrBYhKfMLDa9pFV4byd0nLoYXq', '+4637019512661', 'trantow.heaven@hotmail.com', 1, NULL, 1, NULL, NULL, '2021-10-07 04:55:32', '2021-10-07 04:55:32'),
(6, 'Noel Mertz_user', 'Loraine Hudson', '$2y$10$zSIHCJySPGUk9eLaTdXsfujzHbA3QLuie/9WHxpthL1kkQC7jmGoe', '+7455941306479', 'alene.leuschke@yahoo.com', 1, NULL, 1, NULL, NULL, '2021-10-07 04:55:32', '2021-10-07 04:55:32'),
(7, 'Myrtle Hermiston_user', 'Arvel Brakus', '$2y$10$SNDZ4sz45EQxM81CCUW/S.HU3M1i03wLOyvp1zWORQe/XeCxDsAMq', '+1880412852294', 'fruecker@gmail.com', 1, NULL, 1, NULL, NULL, '2021-10-07 04:55:32', '2021-10-07 04:55:32'),
(8, 'Landen Grady_user', 'Dr. Alec Wunsch', '$2y$10$dhARoZpyge7eiCwgYbIdHuv5XD364nHzFzeaAhMtGDp/.K5chig5G', '+7297608172180', 'percy.crist@fahey.biz', 1, NULL, 1, NULL, NULL, '2021-10-07 04:55:32', '2021-10-07 04:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `paid` double NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'منتظر',
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nurse_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `date`, `time`, `paid`, `status`, `doctor_id`, `nurse_id`, `patient_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 1, 1, 1, '2021-10-07 04:55:33', '2021-10-09 03:56:39', '2021-10-09 03:56:39'),
(2, '2021-10-07', '12:55:00', 0, 'مع الطبيب', 1, 1, 1, '2021-10-07 04:55:33', '2021-10-09 03:56:34', '2021-10-09 03:56:34'),
(3, '2021-10-07', '12:55:00', 0, 'مع الطبيب', 2, 2, 6, '2021-10-07 04:55:33', '2021-10-09 03:56:32', '2021-10-09 03:56:32'),
(4, '2021-10-07', '12:55:00', 0, 'مع الطبيب', 1, 2, 6, '2021-10-07 04:55:33', '2021-10-09 03:56:29', '2021-10-09 03:56:29'),
(5, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 1, 2, 8, '2021-10-07 04:55:33', '2021-10-09 03:56:26', '2021-10-09 03:56:26'),
(6, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 1, 2, 7, '2021-10-07 04:55:33', '2021-10-09 03:56:23', '2021-10-09 03:56:23'),
(7, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 1, 2, 8, '2021-10-07 04:55:33', '2021-10-09 03:56:21', '2021-10-09 03:56:21'),
(8, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 1, 2, 4, '2021-10-07 04:55:33', '2021-10-09 03:56:18', '2021-10-09 03:56:18'),
(9, '2021-10-07', '12:55:00', 0, 'منتظر', 1, 1, 1, '2021-10-07 04:55:33', '2021-10-09 03:53:43', '2021-10-09 03:53:43'),
(10, '2021-10-07', '12:55:00', 0, 'منتظر', 2, 1, 4, '2021-10-07 04:55:33', '2021-10-09 03:53:48', '2021-10-09 03:53:48'),
(11, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 2, 1, 2, '2021-10-07 04:55:33', '2021-10-09 03:53:51', '2021-10-09 03:53:51'),
(12, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 1, 2, 3, '2021-10-07 04:55:33', '2021-10-09 03:53:57', '2021-10-09 03:53:57'),
(13, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 2, 2, 8, '2021-10-07 04:55:33', '2021-10-09 03:54:02', '2021-10-09 03:54:02'),
(14, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 2, 2, 7, '2021-10-07 04:55:33', '2021-10-09 03:54:39', '2021-10-09 03:54:39'),
(15, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 2, 2, 4, '2021-10-07 04:55:33', '2021-10-09 03:54:42', '2021-10-09 03:54:42'),
(16, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 2, 2, 8, '2021-10-07 04:55:33', '2021-10-09 03:54:47', '2021-10-09 03:54:47'),
(17, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 2, 1, 7, '2021-10-07 04:55:33', '2021-10-09 03:54:49', '2021-10-09 03:54:49'),
(18, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 2, 1, 5, '2021-10-07 04:55:33', '2021-10-09 03:54:52', '2021-10-09 03:54:52'),
(19, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 2, 2, 4, '2021-10-07 04:55:33', '2021-10-09 03:54:54', '2021-10-09 03:54:54'),
(20, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 1, 2, 7, '2021-10-07 04:55:33', '2021-10-09 03:55:00', '2021-10-09 03:55:00'),
(21, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 1, 1, 7, '2021-10-07 04:55:33', '2021-10-09 03:55:03', '2021-10-09 03:55:03'),
(22, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 2, 2, 3, '2021-10-07 04:55:33', '2021-10-09 03:55:05', '2021-10-09 03:55:05'),
(23, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 1, 2, 3, '2021-10-07 04:55:33', '2021-10-09 03:55:09', '2021-10-09 03:55:09'),
(24, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 2, 1, 1, '2021-10-07 04:55:33', '2021-10-09 03:55:12', '2021-10-09 03:55:12'),
(25, '2021-10-07', '12:55:00', 0, 'مع الطبيب', 2, 2, 7, '2021-10-07 04:55:33', '2021-10-09 03:55:14', '2021-10-09 03:55:14'),
(26, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 1, 2, 1, '2021-10-07 04:55:33', '2021-10-09 03:55:17', '2021-10-09 03:55:17'),
(27, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 1, 2, 4, '2021-10-07 04:55:33', '2021-10-09 03:55:20', '2021-10-09 03:55:20'),
(28, '2021-10-07', '12:55:00', 0, 'منتظر', 1, 1, 1, '2021-10-07 04:55:33', '2021-10-09 03:55:23', '2021-10-09 03:55:23'),
(29, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 1, 2, 4, '2021-10-07 04:55:33', '2021-10-09 03:55:28', '2021-10-09 03:55:28'),
(30, '2021-10-07', '12:55:00', 0, 'مع الطبيب', 1, 1, 5, '2021-10-07 04:55:33', '2021-10-09 03:55:31', '2021-10-09 03:55:31'),
(31, '2021-10-07', '12:55:00', 0, 'مع الطبيب', 1, 2, 7, '2021-10-07 04:55:33', '2021-10-09 03:55:35', '2021-10-09 03:55:35'),
(32, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 1, 1, 4, '2021-10-07 04:55:33', '2021-10-09 03:55:37', '2021-10-09 03:55:37'),
(33, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 1, 2, 2, '2021-10-07 04:55:33', '2021-10-09 03:55:40', '2021-10-09 03:55:40'),
(34, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 2, 1, 2, '2021-10-07 04:55:33', '2021-10-09 03:55:43', '2021-10-09 03:55:43'),
(35, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 1, 2, 7, '2021-10-07 04:55:33', '2021-10-09 03:55:46', '2021-10-09 03:55:46'),
(36, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 2, 1, 3, '2021-10-07 04:55:33', '2021-10-09 03:55:48', '2021-10-09 03:55:48'),
(37, '2021-10-07', '12:55:00', 0, 'مع الطبيب', 2, 1, 2, '2021-10-07 04:55:33', '2021-10-09 03:55:51', '2021-10-09 03:55:51'),
(38, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 1, 2, 1, '2021-10-07 04:55:33', '2021-10-09 03:55:55', '2021-10-09 03:55:55'),
(39, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 1, 2, 9, '2021-10-07 04:55:33', '2021-10-09 03:55:58', '2021-10-09 03:55:58'),
(40, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 2, 2, 9, '2021-10-07 04:55:33', '2021-10-09 03:56:04', '2021-10-09 03:56:04'),
(41, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 2, 1, 9, '2021-10-07 04:55:33', '2021-10-09 03:56:07', '2021-10-09 03:56:07'),
(42, '2021-10-07', '12:55:00', 0, 'منتظر', 1, 2, 8, '2021-10-07 04:55:33', '2021-10-09 03:56:12', '2021-10-09 03:56:12'),
(43, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 1, 2, 2, '2021-10-07 04:55:33', '2021-10-09 03:56:15', '2021-10-09 03:56:15'),
(44, '2021-10-07', '12:55:00', 0, 'منتظر', 2, 2, 3, '2021-10-07 04:55:33', '2021-10-09 03:53:38', '2021-10-09 03:53:38'),
(45, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 2, 2, 4, '2021-10-07 04:55:33', '2021-10-09 03:53:35', '2021-10-09 03:53:35'),
(46, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 1, 2, 2, '2021-10-07 04:55:33', '2021-10-09 03:53:30', '2021-10-09 03:53:30'),
(47, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 2, 2, 5, '2021-10-07 04:55:33', '2021-10-09 03:53:27', '2021-10-09 03:53:27'),
(48, '2021-10-07', '12:55:00', 0, 'انتهت الزياره', 1, 2, 2, '2021-10-07 04:55:33', '2021-10-09 03:53:24', '2021-10-09 03:53:24'),
(49, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 2, 1, 8, '2021-10-07 04:55:33', '2021-10-09 03:53:21', '2021-10-09 03:53:21'),
(50, '2021-10-07', '12:55:00', 0, 'مع الطبيب', 1, 2, 5, '2021-10-07 04:55:33', '2021-10-09 03:53:09', '2021-10-09 03:53:09'),
(51, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 2, 1, 8, '2021-10-07 04:55:33', '2021-10-09 03:53:06', '2021-10-09 03:53:06'),
(52, '2021-10-07', '12:55:00', 0, 'جاهز للدفع', 1, 2, 8, '2021-10-07 04:55:33', '2021-10-09 03:53:03', '2021-10-09 03:53:03'),
(53, '2021-10-12', '22:59:00', 0, 'جاهز للدفع', 1, 1, 12, '2021-10-07 19:35:08', '2021-10-27 01:56:19', '2021-10-27 01:56:19'),
(54, '2021-10-27', '22:58:00', 0, 'مع الطبيب', 1, 1, 12, '2021-10-08 23:17:13', '2021-10-09 03:53:16', '2021-10-09 03:53:16'),
(55, '2021-10-09', '23:58:00', 0, 'انتهت الزيارة', 2, 1, 12, '2021-10-09 22:55:08', '2021-10-27 01:56:19', '2021-10-27 01:56:19'),
(56, '2021-10-27', '22:58:00', 0, 'منتظر', 1, 1, 12, '2021-10-24 00:38:19', '2021-10-27 01:56:10', '2021-10-27 01:56:10'),
(57, '2021-10-26', '21:42:50', 0, 'انتهت الزيارة', 1, 1, 12, '2021-10-27 01:42:55', '2021-10-27 01:56:19', '2021-10-27 01:56:19'),
(58, '2021-10-27', '21:53:57', 0, 'انتهت الزيارة', 1, 1, 13, '2021-10-27 01:54:04', '2021-10-27 01:56:15', '2021-10-27 01:56:15'),
(59, '2021-10-27', '19:54:45', 0, 'مع الطبيب', 1, 1, 14, '2021-10-27 23:54:51', '2021-11-11 17:07:49', '2021-11-11 17:07:49'),
(60, '2021-11-04', '22:37:00', 0, 'انتهت الزيارة', 1, 1, 15, '2021-11-04 22:35:42', '2021-11-15 23:42:36', '2021-11-15 23:42:36'),
(61, '2021-11-05', '17:57:19', 0, 'انتهت الزيارة', 1, 1, 14, '2021-11-05 21:57:23', '2021-11-11 17:07:49', '2021-11-11 17:07:49'),
(62, '2021-11-07', '19:00:00', 0, 'انتهت الزيارة', 1, 1, 15, '2021-11-07 19:00:49', '2021-11-15 23:42:36', '2021-11-15 23:42:36'),
(63, '2021-11-11', '12:08:17', 0, 'انتهت الزيارة', 1, 1, 16, '2021-11-11 17:08:21', '2021-11-15 23:42:32', '2021-11-15 23:42:32'),
(64, '2021-11-12', '13:26:26', 150, 'انتهت الزيارة', 2, 1, 16, '2021-11-12 18:26:31', '2021-11-15 23:42:32', '2021-11-15 23:42:32'),
(65, '2021-11-13', '18:20:57', 150, 'انتهت الزيارة', 1, 1, 16, '2021-11-13 23:20:59', '2021-11-15 23:42:32', '2021-11-15 23:42:32'),
(66, '2021-11-14', '18:25:03', 200, 'انتهت الزيارة', 2, 1, 16, '2021-11-13 23:25:06', '2021-11-15 23:42:32', '2021-11-15 23:42:32'),
(67, '2021-11-15', '11:56:31', 65, 'انتهت الزيارة', 2, 1, 16, '2021-11-15 16:56:33', '2021-11-15 23:42:32', '2021-11-15 23:42:32'),
(68, '2021-11-15', '21:03:53', 370, 'انتهت الزيارة', 2, 1, 17, '2021-11-16 02:03:52', '2021-11-16 19:49:47', '2021-11-16 19:49:47'),
(69, '2021-11-17', '21:04:18', 0, 'جاهز للدفع', 2, 1, 17, '2021-11-16 02:04:19', '2021-11-16 19:49:47', '2021-11-16 19:49:47'),
(70, '2021-11-15', '21:07:54', 0, 'مع الطبيب', 1, 1, 17, '2021-11-16 02:07:55', '2021-11-16 19:49:47', '2021-11-16 19:49:47'),
(71, '2021-11-16', '21:12:22', 0, 'منتظر', 2, 1, 17, '2021-11-16 02:12:24', '2021-11-16 19:49:47', '2021-11-16 19:49:47'),
(72, '2021-11-16', '14:50:19', 200, 'انتهت الزيارة', 2, 1, 18, '2021-11-16 19:50:23', '2021-11-17 14:10:11', NULL),
(73, '2021-11-17', '23:22:24', 450, 'انتهت الزيارة', 2, 1, 19, '2021-11-18 04:22:23', '2021-11-18 04:25:08', NULL),
(74, '2021-11-18', '23:25:37', 0, 'مع الطبيب', 1, 1, 19, '2021-11-18 04:25:47', '2021-11-18 04:26:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configrations`
--
ALTER TABLE `configrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `configrations_user_id_foreign` (`user_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nurses_doctor_id_foreign` (`doctor_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operations_doctor_id_foreign` (`doctor_id`),
  ADD KEY `operations_operation_id_foreign` (`operation_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_nurse_id_foreign` (`nurse_id`);

--
-- Indexes for table `teeths`
--
ALTER TABLE `teeths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teeths_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `teeth_operations`
--
ALTER TABLE `teeth_operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teeth_operations_patient_id_foreign` (`patient_id`),
  ADD KEY `teeth_operations_doctor_id_foreign` (`doctor_id`),
  ADD KEY `teeth_operations_visit_id_foreign` (`visit_id`),
  ADD KEY `teeth_operations_teeth_id_foreign` (`teeth_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_user_id_foreign` (`user_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_doctor_id_foreign` (`doctor_id`),
  ADD KEY `visits_nurse_id_foreign` (`nurse_id`),
  ADD KEY `visits_patient_id_foreign` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configrations`
--
ALTER TABLE `configrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `teeths`
--
ALTER TABLE `teeths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `teeth_operations`
--
ALTER TABLE `teeth_operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
