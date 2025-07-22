-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2025 at 06:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datn-hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_services`
--

CREATE TABLE `booking_services` (
  `booking_service_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `room_type_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` bigint(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(3, 'Tai', 'admin@gmail.com', '123', '123', '2025-07-13 09:18:36', '2025-07-13 09:18:36'),
(4, 'Tai', 'admin@gmail.com', '123', '123', '2025-07-13 09:18:37', '2025-07-13 09:18:37'),
(5, 'bc', 'tai@gmail.com', 'qaa', 'aaa', NULL, NULL);

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_06_23_044949_create_sessions_table', 2),
(4, '2025_06_27_080043_create_demo_table', 3),
(10, '2025_06_30_044023_create_users_table', 4),
(11, '2014_10_12_100000_create_password_resets_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `title`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(4, 15, '123123', '1231', 1, '2025-07-21 04:58:05', '2025-07-21 09:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_gateway_id` int(11) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `checkin_date` date DEFAULT NULL,
  `checkout_date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `booking_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `payments_gateways`
--

CREATE TABLE `payments_gateways` (
  `payment_gateway_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'mobile', '72589f5086b8ced458a1bfaafc5825f6ea7bfaea81d012b6cc9e4ed183be6abc', '[\"*\"]', NULL, NULL, '2025-07-03 09:21:28', '2025-07-03 09:21:28'),
(2, 'App\\Models\\User', 3, 'mobile', '38e352822a464a20c84ce2fbb88cf94c15001982149016047d4639ab1bfcee35', '[\"*\"]', NULL, NULL, '2025-07-03 09:24:54', '2025-07-03 09:24:54'),
(3, 'App\\Models\\User', 4, 'mobile', 'dc7130448f127230a17c9496b976a274e22abcc58ad17b10a596abed0b47b36e', '[\"*\"]', NULL, NULL, '2025-07-03 09:26:03', '2025-07-03 09:26:03'),
(4, 'App\\Models\\User', 2, 'mobile', 'ff1ab7e64a73ccc0004b43c71e5e87997439480c6ba9cdf6ba6dcbbf3119c0da', '[\"*\"]', NULL, NULL, '2025-07-03 09:28:46', '2025-07-03 09:28:46'),
(5, 'App\\Models\\User', 6, 'mobile', '859d3fed534fe2b424f471517887d539ac38fb02436ff60c8ef955904c872bc7', '[\"*\"]', NULL, NULL, '2025-07-05 06:04:55', '2025-07-05 06:04:55'),
(6, 'App\\Models\\User', 6, 'mobile', '8579414a5306ce70ceee3736f85454c9d26bc18e4cad0775f8f9e11ca1112c5f', '[\"*\"]', '2025-07-05 06:11:34', NULL, '2025-07-05 06:07:07', '2025-07-05 06:11:34'),
(7, 'App\\Models\\User', 7, 'mobile', '3adad96e5b485a700f40ae0166dd1807141afdb44507659eaa55abdfa238306b', '[\"*\"]', NULL, NULL, '2025-07-12 12:52:03', '2025-07-12 12:52:03'),
(8, 'App\\Models\\User', 7, 'mobile', '8d3ee0808d31e7b4645f24997015a7dd570ba3ae99ba857916098c80b4b48c4e', '[\"*\"]', NULL, NULL, '2025-07-12 13:17:17', '2025-07-12 13:17:17'),
(9, 'App\\Models\\User', 7, 'mobile', '2f2aaf7387bcb8e1c59e02fe3d29a162af9548d2e88206f86023365ad602b158', '[\"*\"]', NULL, NULL, '2025-07-13 05:55:26', '2025-07-13 05:55:26'),
(10, 'App\\Models\\User', 9, 'mobile', '8d504f8735eaebf5273c7540d4f82d8219a9cd4b97e3348e30eba0b0cc6cb7ed', '[\"*\"]', NULL, NULL, '2025-07-13 05:56:24', '2025-07-13 05:56:24'),
(11, 'App\\Models\\User', 10, 'mobile', 'ae639767f169f825246ef51915b2d8743c44d123438a776abeeec82ad4a01c31', '[\"*\"]', NULL, NULL, '2025-07-13 05:56:35', '2025-07-13 05:56:35'),
(12, 'App\\Models\\User', 11, 'mobile', '7822f3877c1222aa1c47a4a5955ecf58c3f0b9da922c9f52548ffcdc8da00155', '[\"*\"]', NULL, NULL, '2025-07-13 05:56:52', '2025-07-13 05:56:52'),
(13, 'App\\Models\\User', 12, 'mobile', '8722ecbfbe2e51553a3d5025d91902a6af08a425276a2d3680970f10c471b185', '[\"*\"]', NULL, NULL, '2025-07-13 05:58:33', '2025-07-13 05:58:33'),
(14, 'App\\Models\\User', 12, 'mobile', '8247733c4f0f62f47811c5e905475f4dd981fd6c265d256cc874bf975c910092', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:09', '2025-07-13 06:11:09'),
(15, 'App\\Models\\User', 12, 'mobile', 'ea4dc592435f71a4edcfd4067a55d5adc8d0244b5d4b6ae8da7e1601a9e778a0', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:16', '2025-07-13 06:11:16'),
(16, 'App\\Models\\User', 12, 'mobile', '5ba353e87c473faae93ae98c7fb96ddda7d6b11ecf2127f0b05e902392176b2d', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:16', '2025-07-13 06:11:16'),
(17, 'App\\Models\\User', 12, 'mobile', '993e12749c78853a9b53dd7851d98090bd6a2c7a1608d31bf28dd9ee6f55bbe6', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:17', '2025-07-13 06:11:17'),
(18, 'App\\Models\\User', 12, 'mobile', 'faa8a2903a57ca896c3a31aaf011a69bc85d015eeb57d65a8a0ae3122e35eaab', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:17', '2025-07-13 06:11:17'),
(19, 'App\\Models\\User', 12, 'mobile', 'b427341b563f040b216c6e4bce83497fde8dba480536d87d4b4bf84e6bbccf21', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:18', '2025-07-13 06:11:18'),
(20, 'App\\Models\\User', 12, 'mobile', 'f820a6d66aff34d2a9cdc5265ff67cd947b3abc60838019f4c9fe0e1c39d5e57', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:49', '2025-07-13 06:11:49'),
(21, 'App\\Models\\User', 12, 'mobile', 'fcd1fc103c37b5a934df4cda6981f2b615fe59eb83388b490924bda48489a602', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:50', '2025-07-13 06:11:50'),
(22, 'App\\Models\\User', 12, 'mobile', 'd0642571092b62aae965c530244d6f70eb0835e2ebf766532504d37dc9cf43b9', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:50', '2025-07-13 06:11:50'),
(23, 'App\\Models\\User', 12, 'mobile', 'bfec2109360b68d6f169850cd8a50e750679407d698ec5b2bb7a7951ea500cc3', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:50', '2025-07-13 06:11:50'),
(24, 'App\\Models\\User', 12, 'mobile', '8df85d1aefc8fe01815fde04ba8b300c61095c357b089f23c2220911f9d1af21', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:52', '2025-07-13 06:11:52'),
(25, 'App\\Models\\User', 12, 'mobile', '18f22e9480a1a399403f60d95a2736a44c1ec1676cadddefe97ad4aa77de1398', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:52', '2025-07-13 06:11:52'),
(26, 'App\\Models\\User', 12, 'mobile', 'b344add033edd9df071102324a7c5b32a543bfd48e5e17f4c229380819ea0c8a', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:53', '2025-07-13 06:11:53'),
(27, 'App\\Models\\User', 12, 'mobile', '3490f1686956d2c61ed8b4956ea7c5f4105bf7f4cdcd5c3fd20416b08642639f', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:53', '2025-07-13 06:11:53'),
(28, 'App\\Models\\User', 12, 'mobile', 'df92e6a0c8c3f28a5cbec07fafcce4c1cd758740ebe3925748c74cebb5af10de', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:54', '2025-07-13 06:11:54'),
(29, 'App\\Models\\User', 12, 'mobile', '597e54402477cd131928c7d27599dd043151836c8e2f1c4de10ac85ab64fdc64', '[\"*\"]', NULL, NULL, '2025-07-13 06:11:54', '2025-07-13 06:11:54'),
(30, 'App\\Models\\User', 13, 'mobile', '21bf17473d7581ec6bc6cef40f238e8116220e6cc77fdf84f912cdf842dcf627', '[\"*\"]', NULL, NULL, '2025-07-13 06:27:36', '2025-07-13 06:27:36'),
(31, 'App\\Models\\User', 13, 'mobile', '5928aebf5b73a46e8aaec2f0eb5e393aa6eb298b4b7cc14806b6a882d5e4f109', '[\"*\"]', NULL, NULL, '2025-07-13 06:27:48', '2025-07-13 06:27:48'),
(32, 'App\\Models\\User', 13, 'mobile', '2ea72249f3ef06237045c725cf2f6fabe2dc070221a5131cfee837176722c098', '[\"*\"]', NULL, NULL, '2025-07-13 06:27:53', '2025-07-13 06:27:53'),
(33, 'App\\Models\\User', 13, 'mobile', '2d24483ed5d04fc1c22e5a5566aa705ff813790c3d26ce9ed22483a3b40f6ecf', '[\"*\"]', NULL, NULL, '2025-07-13 06:27:54', '2025-07-13 06:27:54'),
(34, 'App\\Models\\User', 13, 'mobile', '5575f7925776508426b7155863dc57592de04007052c4713852f65c03f422868', '[\"*\"]', NULL, NULL, '2025-07-13 06:27:56', '2025-07-13 06:27:56'),
(35, 'App\\Models\\User', 13, 'mobile', '24c9de686baa30cb1a366494daef0934788dde55fa818d7c73e831cc3cad67c7', '[\"*\"]', NULL, NULL, '2025-07-13 06:27:57', '2025-07-13 06:27:57'),
(36, 'App\\Models\\User', 13, 'mobile', '082391bcda2be58d9d8fc9fc840597aa757a0e17223ed309f30c9d8907ca476d', '[\"*\"]', NULL, NULL, '2025-07-13 06:27:57', '2025-07-13 06:27:57'),
(37, 'App\\Models\\User', 13, 'mobile', '3e4fbfafc111fbd514cd36b06d3ad97c39eb022c4be63fcf46f4c0adeae468c7', '[\"*\"]', NULL, NULL, '2025-07-13 06:27:58', '2025-07-13 06:27:58'),
(38, 'App\\Models\\User', 13, 'mobile', 'e2ebb44217173d634e1b19f75fd25f9c9a82eb8bde83eb8e2867c3377ddc7ad2', '[\"*\"]', NULL, NULL, '2025-07-13 06:27:58', '2025-07-13 06:27:58'),
(39, 'App\\Models\\User', 13, 'mobile', '0b54f9814b377dccea9d54a83f5220f6bd6f9a36d15bc98969f93be5581e95f6', '[\"*\"]', NULL, NULL, '2025-07-13 06:29:27', '2025-07-13 06:29:27'),
(40, 'App\\Models\\User', 13, 'mobile', '76c68334aa137b579d1f3c5ddc30efb8ad0a700330699c7c35f2bd029dfe7292', '[\"*\"]', NULL, NULL, '2025-07-13 06:35:34', '2025-07-13 06:35:34'),
(41, 'App\\Models\\User', 13, 'mobile', 'd3af11ec3b8b3b03e36f5a9f4eb1c6980d5c090ea060463cff9570e57ce2349f', '[\"*\"]', NULL, NULL, '2025-07-13 06:35:35', '2025-07-13 06:35:35'),
(42, 'App\\Models\\User', 13, 'mobile', '3d99440275ebf86ef94f80df767b04d8ba69388a72175201dbfcdba20098ef73', '[\"*\"]', NULL, NULL, '2025-07-13 06:35:57', '2025-07-13 06:35:57'),
(43, 'App\\Models\\User', 13, 'mobile', 'c506a4ff7fd09c85a50baab6d43d3fe088a1505dc0a240bbce17a682466d1a2f', '[\"*\"]', NULL, NULL, '2025-07-13 06:37:15', '2025-07-13 06:37:15'),
(44, 'App\\Models\\User', 13, 'mobile', 'd3ee6ce9d22dfa0fee37813ce948a5c46abbc811acb9ed8c5bf333d01e910fe6', '[\"*\"]', NULL, NULL, '2025-07-13 06:39:28', '2025-07-13 06:39:28'),
(45, 'App\\Models\\User', 13, 'mobile', '522cd868d827c3fb1a1498743c11e079cfd7cc1530c6ff378e1d10de063de4f8', '[\"*\"]', NULL, NULL, '2025-07-13 06:41:17', '2025-07-13 06:41:17'),
(46, 'App\\Models\\User', 13, 'mobile', 'd0e8f9d486f8d9ebb214182c2bc6b81b42f3a7f707cea3187003c85b874a7076', '[\"*\"]', NULL, NULL, '2025-07-13 06:43:11', '2025-07-13 06:43:11'),
(47, 'App\\Models\\User', 13, 'mobile', '5faa2a6682b60d21192734045d9ed53eb9bc3c797f85e2edda8d756dfbf6c290', '[\"*\"]', NULL, NULL, '2025-07-13 06:46:18', '2025-07-13 06:46:18'),
(48, 'App\\Models\\User', 13, 'mobile', '10ba9dd15e213169f529707f17f391283435a2c5d6747245f9bbaf959b279ed6', '[\"*\"]', NULL, NULL, '2025-07-13 06:58:41', '2025-07-13 06:58:41'),
(49, 'App\\Models\\User', 13, 'mobile', 'cdefbc8137cc52aa62b63620792e135cd984cb0ab139f76bd784d7873f553286', '[\"*\"]', NULL, NULL, '2025-07-13 07:00:33', '2025-07-13 07:00:33'),
(50, 'App\\Models\\User', 13, 'mobile', '2ce489e09d97aab20324d37b3d4708b5c54fce12d58b0fa9e59e506b6da4203b', '[\"*\"]', NULL, NULL, '2025-07-13 07:02:45', '2025-07-13 07:02:45'),
(51, 'App\\Models\\User', 14, 'mobile', '0b1115f23eab39914d68d6f47adf6987c93029a8923663e8b6f049f25077f4d5', '[\"*\"]', NULL, NULL, '2025-07-13 08:15:29', '2025-07-13 08:15:29'),
(52, 'App\\Models\\User', 14, 'mobile', '65d24ca241ed444c6fb011a1b0fb5a53bd56e7d077072c44f677be10f05cc5d2', '[\"*\"]', NULL, NULL, '2025-07-13 08:15:57', '2025-07-13 08:15:57'),
(53, 'App\\Models\\User', 15, 'mobile', '6bd26921a85ac0740659039782b699815200935321435da2881283af1af2b460', '[\"*\"]', NULL, NULL, '2025-07-17 20:02:17', '2025-07-17 20:02:17'),
(54, 'App\\Models\\User', 15, 'mobile', 'be65f2452840dbe56d31b6cbc77a57abb1dfdf8699b962446a74867d6396031f', '[\"*\"]', NULL, NULL, '2025-07-17 21:43:59', '2025-07-17 21:43:59'),
(55, 'App\\Models\\User', 14, 'mobile', '6986b08c4b2303e40b2792cf09aa85f565bafa40523ad962206fc3bed5c63913', '[\"*\"]', NULL, NULL, '2025-07-17 21:44:28', '2025-07-17 21:44:28'),
(56, 'App\\Models\\User', 15, 'mobile', 'e5602334fa98c30194b799ac08b43d0f3f302af057a69f6ac76200ec1596ee5d', '[\"*\"]', NULL, NULL, '2025-07-17 21:47:59', '2025-07-17 21:47:59'),
(57, 'App\\Models\\User', 16, 'mobile', '58d7eab4f1c963073251f99e5674826de57a55897df4aa17f92d8dfd81af8a1b', '[\"*\"]', NULL, NULL, '2025-07-20 19:28:54', '2025-07-20 19:28:54'),
(58, 'App\\Models\\User', 16, 'mobile', '3142eedd5091ece91c8a7d1ba3e2747ade97a3c8846b917023267ac37ce8b536', '[\"*\"]', NULL, NULL, '2025-07-20 19:29:13', '2025-07-20 19:29:13'),
(59, 'App\\Models\\User', 16, 'mobile', '58fcf2e6e6e6ad1508734507629e79c5507e3be2de7eef26435b30b9dc4e29bd', '[\"*\"]', NULL, NULL, '2025-07-20 19:38:46', '2025-07-20 19:38:46'),
(60, 'App\\Models\\User', 17, 'mobile', '2b0386bb2f8d6b948e4945a3daee7738585c31ab96d44f9aca5bc712d17d935a', '[\"*\"]', NULL, NULL, '2025-07-20 19:50:36', '2025-07-20 19:50:36'),
(61, 'App\\Models\\User', 17, 'mobile', 'ec92e378966628192ad9fab3f20f83be941d1861afb7a71caf0d4a578786d48c', '[\"*\"]', NULL, NULL, '2025-07-20 19:50:43', '2025-07-20 19:50:43'),
(62, 'App\\Models\\User', 17, 'mobile', '9b25d346556d266f3f4ffa157fbc9e0862c9022632a93efd41af53ef1c73e195', '[\"*\"]', NULL, NULL, '2025-07-20 19:51:07', '2025-07-20 19:51:07'),
(63, 'App\\Models\\User', 17, 'mobile', 'eaa77b52cc7568b10c410eb50f47bea74f4da179c300263b62a67d42bb6ff870', '[\"*\"]', NULL, NULL, '2025-07-20 19:52:20', '2025-07-20 19:52:20'),
(64, 'App\\Models\\User', 17, 'mobile', 'bc3a70615baa0f21ed6149c165b7d4305744ef175a416e6e20cb13ca72c169a4', '[\"*\"]', NULL, NULL, '2025-07-20 19:53:42', '2025-07-20 19:53:42'),
(65, 'App\\Models\\User', 17, 'mobile', '25b5d3ee5acdf71b18c8a4bcb09fe5844767ebe1b865a56bd3f85c2c949c8e19', '[\"*\"]', NULL, NULL, '2025-07-20 19:53:42', '2025-07-20 19:53:42'),
(66, 'App\\Models\\User', 17, 'mobile', 'b0aff958cfeebcbb7623428221cdfc19ad41bf87bb716610f52655939fb50fb5', '[\"*\"]', NULL, NULL, '2025-07-20 19:53:44', '2025-07-20 19:53:44'),
(67, 'App\\Models\\User', 17, 'mobile', 'c015f7980114338c68ddf834268646d5da6c065fabcd1d0787c6d4cd7d9bafd2', '[\"*\"]', NULL, NULL, '2025-07-20 21:27:22', '2025-07-20 21:27:22'),
(68, 'App\\Models\\User', 17, 'mobile', '7968f8457aa6294c34c05efa99ef67e6f0b11a8afeb30299465a804f72a1f768', '[\"*\"]', NULL, NULL, '2025-07-20 21:32:36', '2025-07-20 21:32:36'),
(69, 'App\\Models\\User', 17, 'mobile', '9b9f40066dd47d2eddc1570c6d76167514d0eb4c39c1090de38c675fa294726e', '[\"*\"]', NULL, NULL, '2025-07-20 21:32:42', '2025-07-20 21:32:42'),
(70, 'App\\Models\\User', 17, 'mobile', 'ea3710da9d82fe83d85bdaaeefddc48f3fc75772678020157631d2f80b2ea76f', '[\"*\"]', NULL, NULL, '2025-07-20 21:45:02', '2025-07-20 21:45:02'),
(71, 'App\\Models\\User', 17, 'mobile', 'cd3da81832062b82f618c5eb039149754f2669aa092d684a298894a94b4414d7', '[\"*\"]', NULL, NULL, '2025-07-20 21:45:50', '2025-07-20 21:45:50'),
(72, 'App\\Models\\User', 17, 'mobile', '68f173f36f4752768be2bc2abf295bf3453472c9135ffc3a4cb80bca97a44d4e', '[\"*\"]', NULL, NULL, '2025-07-20 21:46:21', '2025-07-20 21:46:21'),
(73, 'App\\Models\\User', 16, 'mobile', '733585d525a393ab13f5b7ad28a79bfd408e996c1bf323895275b612bb60a077', '[\"*\"]', NULL, NULL, '2025-07-21 18:14:11', '2025-07-21 18:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `title`, `content`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 13, '123213', '<p>123sadaa</p><p>ádasdsa</p><h1><br></h1><h2><br></h2><h2>áda<img src=\"data:image/jpeg;base64,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\"></h2>', 'posts/OV7RHEPr5wJAfj5TDOCMM8e4WKGSRv5m74F5Bm7g.jpg', '2025-07-09 16:18:25', '2025-07-22 01:15:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `room_id`, `order_id`, `rating`, `content`, `deleted_at`, `updated_at`, `created_at`) VALUES
(5, 11, NULL, NULL, 5, '1231', NULL, '2025-07-17 09:25:34', '2025-07-17 08:19:15'),
(6, 11, NULL, NULL, 1, 'a', NULL, '2025-07-17 09:43:50', '2025-07-17 09:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_type_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `max_guests` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_type_id`, `name`, `description`, `price`, `max_guests`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Phòng 101', 'Phòng đơn tầng 1', 300000.00, 1, '', 'available', NULL, '2025-07-22 02:22:57', NULL),
(2, 2, 'Phòng 202', 'Phòng đôi tầng 2', 500000.00, 2, '', 'available', '2025-07-10 09:43:24', NULL, NULL),
(5, 2, 'Phòng 20231', 'qưe', 2.00, 3, NULL, 'available', '2025-07-22 02:44:17', '2025-07-22 02:44:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_discounts`
--

CREATE TABLE `room_discounts` (
  `room_discount_id` int(11) NOT NULL,
  `room_type_id` int(11) DEFAULT NULL,
  `discount_percent` decimal(5,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `room_image_id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `uploaded_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `room_type_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price_base` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`room_type_id`, `name`, `description`, `price_base`, `created_at`, `update_at`) VALUES
(1, 'Phòng Đơn', 'Dành cho 1 người', 300000.00, '2025-07-11 23:14:26', '2025-07-11 23:14:26'),
(2, 'Phòng Đôi', 'Dành cho 2 người', 500000.00, '2025-07-11 23:14:26', '2025-07-11 23:14:26'),
(3, 'Phòng Gia Đình', 'Dành cho 4 người', 800000.00, '2025-07-11 23:14:26', '2025-07-11 23:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(12,0) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `name`, `price`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '111', 11111, '1111', 'inactive', '2025-07-13 09:56:58', '2025-07-22 03:18:17', '2025-07-13 16:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0ONmOtWvUsqQcoYrsad2dcqzQEyEqpUHpugDTTIi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoidnFXdmpzNUZuNm51VEN6UWxhNTAzeW1DNlV6NDhCR012NFZKUmRwTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344583),
('20Yy12nq1IIPcfapQLxrVwsHqPs9a6C9rVs709YJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoia2ZDNlFUMVQ3djdLVm5VU1l2eEtQR1M0UjdGbndFc3NWOTQzcDBRMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345419),
('23hhNgPi9XsJQchqdlophydGPpohFZlWgYybUAw4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMm05MHVIeG1nZnBYV2owcDkxVHJBd0JneWJRc3lMMW1lOTJHVWU4UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344583),
('28JoQ5Qj9WvDowHzFVHXbaPs73ynCYzuWPfhleJ0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiS2pPa3lIclNuWGtYQVhhTFFCb3VHWkkwNHNqOFFsT2hqRHVsWWhwVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345782),
('3jwwqaZocNqv7tgII7oqJK21neo9CgHqk9mGdZLQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2JCQlZqY01uTGZpRXI0eDhqUmp6SThXSExZNGZUZER0QnpCa0tJOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344921),
('43JmzXCHidMPOyvjUSwAPK6wCLB6CsUGxUo62WSr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibzVLNHkya2Z3MHhxSWhBczg5V05rUkgzbXhsRE9UWDc0RUlsTWJaMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344582),
('45aaEkLlHP4Omgm4FHWpOGerDD4Yb0EbkIwDEKxb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVY3ZWs2Rnl5MkJqcWZQSzV0YW4zemVkTzZNWHpkWE1sbFVIVXhUWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751343228),
('5ispEh3Ym6gwIcJ122Ut5ZZV6TrwlQdpBrBkcgXL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQnRTUzhDcEFvbGdGSHJRc3RGSHZIUURXWmRVeUZPVEZoeWlNUThreiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344594),
('6s2SOZwjuJIGywiATgWqhEDpRoNzP9z9aNWwOatP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieFFWbE0wNHdVYmpkbW95V2VCVFNoaFhjM1M3SWYyRUNoQjUxbnhLRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvYWRtaW4vdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751530652),
('7TQjoIzL3E876Nct0SdcIMAcNTo1m0xAEBTm1Gn8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWJidFp4TFNjajIyaU9lSmR4V015QXFNNjFFVnA0UW9iT1dOUjd5UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751341378),
('8xEMtVXLsnYCopodPAIS9pWb03c1sUMODRBWkD1T', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibzRmdm0xNHBsS0JNYVU0VWdKSXlaeElFMlJFajBqYUdTQllXZDJwUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751341390),
('9HKp9m4BzHhLq4UXTVq70jmeNRzoCvLUSgGi1j1P', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFBJOERCdGpIcmU1Q1VVMWxuWHJ2cWhVdVJPVkl6QWNDVEZ5VkRkMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751341360),
('9Js8x0x1SczOTWSVwZJ94lFHFXaJf4ZJwMDKPUI5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSDBaelFKTUJJUmlwWjBkcGo2cXlqOWxMUUpwSDV2NmN5TmtWOGhqYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345379),
('9SWZB7uanHqhgkwnAam6WgIWOW5w60SkgUfgjn5x', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMzgxUkRiRDF4cjVDd0RyNXJhZUtjWTJBNGZmYkNPZnBBUWlVN004NyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345417),
('BzU7VfaFbYJpH1jyjO93btzbdFkQFMKlYfKUMVQ5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiUWtsSEdlZmZQWmV1MTNRbmtTOXlHYXlmd2FRU3hQRGFMbW5kT1JoZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345373),
('CAN9ueRL2AeUccI1WDeWC3l5gOxn86gGogJkbw2A', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0d3ZHJrQ0J5dEh6eVpLVUV2cm1ZNmhkbE1VOE4waUt2RXIzQzRwOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344567),
('d3iVVHl7LK5LsKWUGqviYF9yQtSh0IIv8IQ5CM0h', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoienZHSVJaYkcxdGwzOGJCNTJuV0g0NFdMN2hTRmp2SnpSaVJsb2NseCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345367),
('DDHfkjjyoI9RJCIDRwlgTyBKKRTsgnsqhvbhWUaS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlFtRzFEc1ZLcDdkamlDc291cWdKWFpJczZuekFtNnpnUUtSdUNBcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345417),
('Di1ZLlks7gL0WJaoY3mArW9mmedXo5kzMVTVcjRU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicHZsME9NbzR2ODhHeHl0YmMyS0hjc0d1a2Y5anBzVVpWSVBaZWozVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751341397),
('dLDjhWZEpY4Er7Xst56i6GMWPnMwGb1DlNT73T7B', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoicWtwWUpFeWFzSXA0MU9xQ0pwQ2kxZ0tRbGdKMm1IbzJuUjI1ZENJaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751358790),
('dUMyXgymYkdAAZaZEHkbCNxqi5SP74S3nX8Vkrqk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT1pRRWdueTBXM0FVOTYyZzV3QU5IR2FSZFdRcmdNbVNDQnJWcWY4TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345373),
('e8Mpt7G4l8LTba0QUujvyOnmGcTv6PvozhSTCitZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWFhMbGhNYTZWeFdxOG01bTEzWkxUdEg0Y0FvQm5YUTVCSmROUlNIUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345146),
('EHZSoaWRkQ7kTLoeZ43iCUJKjSwFEsDZjAQZNEiw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQUxZc2dXZGJrcm8yWm5IU2FBNzY3djZHV0J4RW9NVmVEQ1FXa2RZaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751360086),
('EouQmioExXI1lWtCquDiIPoIbiChI8uFB7hVttUj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiUUhtU1V2Slk1cDhkMWdXZHhLVEpJSVA0YUlxVks4WVB2Z1M5SDc4WCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344923),
('F6dFkhgqfGxA06rEpkSg1QaYQvtPZfS5bssScVFK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVjd3TnJhdDZ5V0Q4NVc3eTVBalo3OXdQbzNzcFBKUmVOajd1WEtNQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751358546),
('FPzMy4lpMbzQCf75RrhMmPQSG8f9fGcXFKltLpPr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUw5Q05hMllRSFhHYkFOaTA1SzJMa3JNalRMSG9JdjdnUTB2MFBYQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344656),
('GuL8tanv9Ra8UhAFxwoV15fHjJLcHkzELgntWXsn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEJ0dm02bnFzNk5sRE00bTRQY2ZhYlk1QnROR3ZKMldiM1dpeU1KWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345419),
('GwWD4KymVWiKEZWOocFuxN3RSyfhon1Os4s3CHi1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSEdQTFJMQ0IxSkxIV1c5Sm9IelNNVzhDcjQxOHMxanJheU1mdmRBQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751342899),
('H8tuPjIvEVFVtjBypNbBK8VSXUMUb1vIVhgF1ygs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWp6Q2RMMUZvcGlaQ3lzUVh4UDFVSGxUZUlKN0NDU2haU1JtZnRlRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvYWRtaW4vdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751530785),
('HALwHaGF4mZ85lfojTjtmtjl7y2JE1fWz4ttWKLr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGN5MlZ2R21HZkt5SVVQSVlpZVFKOFRRa05KVGExT2o0cTltU3ZjOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344923),
('hYOxSJd3azWkJWcSD6TJabwAnWcQxIB0eEB3azhr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTUxyT3RuZzhJNWtCa3lOOUlxUGJpRVRXbkg1QWlYcW15UG9OWU5kRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344583),
('Iae41ee3h3GeZ0Vvj0JcKrSqY0T4b9Xm8mFj8I9D', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiejY0dW5pdFQxZkdLenRLMlQ1Ym02WjB5SkkwdmlkMERRa1JDZ2RyViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345421),
('irGqZVHnJpT5MiTmB74ySFw3Y7aXJ2Ew5iOMxGFE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0Zabk1YTU1PZmdQdVdYVmdsak1MME9Qc2YzdGJlR0F5cjZRSVdpeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvYWRtaW4vdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751530909),
('isfdo2MOrOMJCeSoHaVZP2y3kL2CrkAK3lDlv6MI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSW5vUGxJMmp3U0YwUzJ5b0E0eEttcHI2YVlTTHhoZklYT1lpRGJlWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344594),
('jC7svi4wV5W4ZMJbTkbInyNVvXU2KBi7d6qtDHSt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0ZHbzhsS3kxbTNscDBTNGpYclVQWE9XbE94dVBwVnFjb1c0cXVOciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751341401),
('kGeSFr86B2VRDnKJaprTvKQMQC6fEN9PNUSbUrAK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiajMxRXpiWkNLYU1HeGVOUThiUzN5TW5vc1QzeWRwYXQ5bHVhWlk3NyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751359958),
('Kj3ggClrn4Qyqc232w1JxYLb3EZj5T5wM2uaGweb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVTJJY2xNUzdDZGppTEQyOGdnU05xOG5MU0U5SDlCMXpxYmN4ekszdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751359957),
('Kyr00XYRydm0sFlxLt3lU6NscCC60Ul4LMy5EW3B', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNU5ycEdJdFE5MjBrUVloc2JVaXh0anZoVzJ0VTBxWkhYcVdWeUlvSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751343220),
('l8i0aRS7GKiUkeVSUOdz5sx7UNXAk1ZVkcBsjf3L', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZnkwVUpWNWZ1RkJBcm1sYUZOWEpxc0xLTnlyTHEzZG41c1dXMEx0RSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344567),
('LaXTRs5zEaTOlHP7RxWmhDVn48oUIsSgOpnRMSql', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQkx6S0ZaSG5mbGtBa2M3SHRyTGJZa0d1VkxXMGpvTDRkSXR2WnVsNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751358526),
('lbX1SVhc2d1RKZu6n2malNCHZDL5bcNtC1x1zNqj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclQySE1xSldrQURaYlRPTTN2UHdyNXFTQlBlNElZMzVyOEE4NTRPVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345420),
('LgeZ6caB98dbNvIj7bJozdeOaPufx472ocschQmS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiN1lDa0pNZUFFSVZxc0Q1T0RRd2dNWEpDTVA1aEd0TXNZNnZ6d0V4RSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751359681),
('loNaJEuykrjwnBiOFoQ1YuyAj1fbltiEHbXysCuW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiOGI2TGVqZWR1bzZjdzFEQmIyb2hpU29ZWHFFYUpESEd1aFFYRUpIQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344656),
('MqM6kRCOwTxYHoyqYth4xfytNW8cW1lu2BmtvX2v', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibndkVHFuRW5JZk8wcjdDUW9LcTUwUzJFV3NCMHJDV0hUemRHdm9uZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751342994),
('NePgRzz7gG5FtTfb5UhjFmGSGbmblrSIiukUl6eV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlFqODBkNmtpN1ByN1poZlhDWG44Qm1HZTBEZW93T1AzN3FQZzlvTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344466),
('QQ5gX4IGFgXa6uulPDwJeQKbtBsiVeV9DqOQvrRE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoieFVpSEdVTnhaMVpCOEN6Sm9PSDVPdFFhd0FkbUtiZEtQbmZmcHdaOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345147),
('RbSVz2sY7mgyUnswxEDET11pxpaAGOMeGmL2busc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoialhHYnNsc0pCQVpad3hKN3k4d3BmOXFUUzFhOFc1dXJjcW5oRXpCdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvYWRtaW4vdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751530890),
('RCiG1XYUNHwjZ4unFap8A1lpA02ZiIMwg3fE9WVs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieWgxN3JaNklONW1DNkdMVzAwTU5YYnBNZTNwcGVucHg5QmYzMzRrOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvYWRtaW4vdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751535705),
('RCxqMfRIWASBocZ4HW3XfOZu7olqSeDdUmGcrijJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiT0dMaDBPQlJKa1dyOXZjRFpvTmdXbG9mMU1MMU5jSTFXc1lqM1NuQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751359916),
('rKskIRAKiidimJITBvKe0C8jp6PU7thwWKug9LE3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiemRvVHlGNERNVVA5OUNOeWlUZTNUbmRYQVVEalhDSEVYUlp5YUkyNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvYWRtaW4vdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751530801),
('RrBiyL8uM1mRsqC9vHnw0laW6paP1MkzbTqhIzKC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidjc5dkVIb0pBV29Id3A2Nkg2dTZVZ1FaMFVxZlRYMWliVDJDZ2dMayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345364),
('sbs44G4W7WILVAraXDNJl6LS8SQecclci4PzeD9F', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0VsZlVkY0tKR3FOc2JnUlJYRVExZWtEbFJod2xDRmQ1a1lxdjNHWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751342996),
('sNFRfDNC3jA0nddYFlVPputETjYjPvbthgNtT7d6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZHNESWVmbDVYUXk1VzF3WXh4UWRZaURlU1JSNUN3aEpmaGxFY2hiZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345405),
('T5MV5lyyROYrysk3aSUEIf39R92NSE6G2ZFmyyUE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMFZXaW9WMlpVRDY3ZDZzYjU4ZWJ4TTdYVlNSTnFWUGNWOVdtRU1IbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751358547),
('t8ohE8oOaRsDX7nmSnpmujUpQ6m6xOHaazFjb4cE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVTh0MzRXQnAydUdVN1J3cFZ0Z1dkamR2VTBZZW85SXhxOXg3T0JhSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751344921),
('Txpg2aRNk1q6RoNPlkZa79HAgRn2u3QxLj3M4V6n', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmlsaUZNNDVYcTQybDZNS3U0aDJadzZ2ZVJCZDRSTWJpTXBaUVplNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751341373),
('tzo8gL1XmNlobpaXjc49olFeFuzcSK8ry02Dpc7W', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnF0RnlIYmxPcTUzTkZ5YVZQTlZmWlNIUWpWamtZVUVtVHdKMHhDRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751342405),
('v0KG1P4sYtXNKao9AmppphZFtfRZnA8TU68y3t21', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiS0dwWkVMUmxzanpmM1hGU3FmcnVCbE9Wb01hM0J3V1J2TnhnRU96TSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751359680),
('v0lWAjcB1fraOiEz2vFI0IgwvDOMkT6KYy7NisDi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiaWpuWTdHb1pDNVlGV1JyTVhXaDFGQ2FhaFZnV0lBWGNIcWRZbnFSVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751358348),
('V1vsmIOIM6N0VTSf26EAzTJ2UazIsbgFH7DwKTWf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQjlvSzVvM3N0OGFIcXM3V0lrZXFlQU84blozU1U5NnZid2swcGVubCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345367),
('vjC0YO6PzHyF58rQ8WrH6uo8kxphEnJ0s20S0VpP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2ZSNFQyc05tMVc3eW15U1ljREVqM0pNN3BDTzBYVGlnbjZUbktWWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvYWRtaW4vdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751530786),
('Vk4nc7GLtP5uOzFpfRYAq3ORUu3N2WXwXjedWopG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWlVhRlo0S0hYWjZqaTBYRWgwVXpQdVJDTlB6REFhRlZzOVM4WldJVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345365),
('VLqQi4fq5p1bUaBm4lQa4LHBicfqOsmxXX7wPT1U', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoibnp6cXd6d29NZlR1QlBZSURTcTJwdzB5MDJEa3NEcGlNTGs5aHBHOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345797),
('WnJTEnNtGwKrW0LpKWtOV7korMGgcCSljbb2lBiZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVU0yb0NuUDg0a205Wk13dkp3VWVpbmFVTzNidzRQdUhPYkpLNWlkTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvYWRtaW4vdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751530808),
('wnovx9i2rIrH3yNcX83U6OkMp4rNda3zLqW4lj8N', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoieGtEVWdXT0RTRHFGU1cwcWFzZ2diak04Y3NGSUpIMHFNMGhESjFpZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751358525),
('WOxCy2zqbyx92OIQxEBMe8P9KtwKOgMHoEWdKyqL', NULL, '127.0.0.1', 'PostmanRuntime/7.39.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibEVxQldHVXFVOXhtSDJUc3JvU3Z6clVSdlhQanJ2WGluMWo1WmNXYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751344119),
('wtu1ZgyD4yVcWKhBwNt6QRxsRNiYAcy58ZUx7EUd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMWcxNFpqM21RazA2cUhiU1JtRWVNdG9lSFJOZXNCalVlbGQxem1VVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345379),
('wvzr9LQ4BgCcuirZdwsDXyMcJkVmyNvkvmvrlHxS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNUZPRnNrakY2OVl3S3JLbXJmSkFMZVJ4ckdoQmc4Rnh6OEdDVGJNNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751343220),
('Xln4ZX9jpWl2MvSsoWQuXf6eqCU69WPhAqOvBPcY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiR3lzN3BaQnhkaHFxeHVQNnZiSjI3cUU5b1RNNGNPalF6cXY3eTliQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751359917),
('Xx76UgjtEk6iutm8TKdtz79afIrFFCuyHLapyvbg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoicGh4YXBuN2N5b0cwb0pBMGMwZ0owMkFtUDYza2lEZ3ltMnVmaks5TyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751343228),
('XYDyWHixv5MfvbJvoieplKG3alj8yjWWstxQFYRZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGVyZkMyaFk2Ym9OaXBhaUl5ZVRWcGVZWWwyWUkzZ0xPcU0xTndPUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvYWRtaW4vdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751530801),
('ycpRnh70TZlqXR3cecYqHOo0XC4uWE3b6K10CsQE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWFl1SFFIU0p4MFEzaXVSZVVsOEdjOG1yQXdLT2l5MDlNcG9kcjNkayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345418),
('yIq87MdzcBlXEHT2I4E46xoRB346rjMtBcEg3HQG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicmMyQ0FmYUIxNWFpa3gwaGJTbG5UQmFOaUNPUlU3RVJLWVhTS0hzVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345404),
('ZaAwfp05JXejXtv3RN4Hib5eAqaHTxmYXqEPK1sY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2hOZVREWjhLeHRXNHlLNHNTTVBseXE1QndxUlFVZ1FGeGFIbGtrZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW5jdHVtL2NzcmYtY29va2llIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751345418),
('zBkoc50pMEgW4SRigfxSAq2XAJK6YF9dtxRnGep1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiblZTZVNoVXNHdTBicEVidlBwQ3Nya3BIcFM4WkRYUVNid0s4bXU5dCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751359959),
('zP4jTwhc17ctZRiPxeu0M1Wz337mlplWZpIdjZrx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNnBhamhTNXhJQUIzd2V2eVI3TjZCaWg3ckhLTzhlQ0xiS2dISmFPQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751358548);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone`, `avatar`, `address`, `role`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'áda', 'tai@gmail.com', '$2y$10$SsDcY5tTgfQFhTnlacW6gOoRMvzu6JaBMrItxfidlTSOzN5D/pb9m', '0987654321', NULL, '123', 'user', 'active', '2025-07-17 07:46:08', '2025-07-17 07:46:08', NULL),
(12, 'tuâng', 'Tuangautada@gmail.com', '$2y$10$R3h8boDD0fnQTR9k7boeyeK2vrV/0WcBmnfpz0gFr7KAaXl7px3.q', '123445678', NULL, '123', 'user', 'active', '2025-07-17 07:50:36', '2025-07-17 07:50:36', NULL),
(13, 'abc', 'assa@gmail.com', '$2y$10$YrmMJK8F0zyZ/wgXNYGP4uUmjJfrlEChYP5Gw7BQm46amxbcBjrUG', '0987654321', NULL, '123', 'user', 'active', '2025-07-18 04:39:43', '2025-07-18 04:39:43', NULL),
(14, 'Tài', 'asd@gmail.com', '$2y$10$IvsCln4gbnyBbo7Xc1dt2OVdhL3MACQPLE5CrFLSIFuH98Z8ZR9CG', NULL, NULL, NULL, 'user', 'active', '2025-07-18 04:40:34', '2025-07-18 04:40:34', NULL),
(15, 'Taiss', 'as1d@gmail.com', '$2y$10$INZ2zoYzSh9e5LYKS57Z9.4AonCa7HnB8y/2YPrA3HbiRE6vW4rUm', NULL, NULL, NULL, 'user', 'active', '2025-07-18 04:43:59', '2025-07-18 04:43:59', NULL),
(16, 'User123', 'User123@gmail.com', '$2y$10$nDtyn0YjEPVhn6IcRqpM1uHTnnSLMvtxb4/luHAmmv1X8NsHsHZay', NULL, NULL, NULL, 'user', 'active', '2025-07-21 02:28:54', '2025-07-21 02:28:54', NULL),
(17, 'Admin123', 'Admin123@gmail.com', '$2y$10$dRxFfS4lE3Ecdc1kIjZlded77rc6m2DTiUiUCVsNIFT8o0HmJpl/C', '0987654321', NULL, '123', 'admin', 'active', '2025-07-21 02:50:01', '2025-07-21 02:50:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_services`
--
ALTER TABLE `booking_services`
  ADD PRIMARY KEY (`booking_service_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `notification_ibfk_1` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `payment_gateway_id` (`payment_gateway_id`),
  ADD KEY `order_ibfk_1` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments_gateways`
--
ALTER TABLE `payments_gateways`
  ADD PRIMARY KEY (`payment_gateway_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_ibfk_1` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `reviews_ibfk_1` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `room_discounts`
--
ALTER TABLE `room_discounts`
  ADD PRIMARY KEY (`room_discount_id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`room_image_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_services`
--
ALTER TABLE `booking_services`
  MODIFY `booking_service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments_gateways`
--
ALTER TABLE `payments_gateways`
  MODIFY `payment_gateway_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_discounts`
--
ALTER TABLE `room_discounts`
  MODIFY `room_discount_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `room_image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_services`
--
ALTER TABLE `booking_services`
  ADD CONSTRAINT `booking_services_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `booking_services_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`),
  ADD CONSTRAINT `booking_services_ibfk_3` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`room_type_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`payment_gateway_id`) REFERENCES `payments_gateways` (`payment_gateway_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`room_type_id`);

--
-- Constraints for table `room_discounts`
--
ALTER TABLE `room_discounts`
  ADD CONSTRAINT `room_discounts_ibfk_1` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`room_type_id`);

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
