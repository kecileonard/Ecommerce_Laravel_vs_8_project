-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 04:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_laravel8`
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
(60, '3', '11', '4', '2022-12-16 14:12:35', '2022-12-25 12:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descrip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_descrip`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'SmartPhones', 'smartphones', 'smartphones', 0, 1, '1668382592.png', 'smartphones', 'smartphones', 'smartphones', '2022-10-08 22:49:19', '2022-11-13 22:36:32'),
(4, 'Laptops Pc', 'laptop', 'laptops', 0, 1, '1668382765.png', 'laptops', 'laptops', 'laptops', '2022-10-10 13:22:53', '2022-11-13 22:39:25'),
(6, 'HeadPhones', 'Headphones', 'Headphones', 0, 1, '1668383011.png', 'headphones', 'headphones', 'headphones', '2022-10-11 19:45:11', '2022-11-13 22:43:31');

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
(5, '2022_10_08_224035_create_categories_table', 2),
(6, '2022_10_10_164711_create_products_table', 3),
(7, '2022_10_15_100338_create_carts_table', 4),
(8, '2022_10_16_202529_create_orders_table', 5),
(9, '2022_10_16_203137_create_order_items_table', 5),
(10, '2022_10_19_114153_create_wishlists_table', 6),
(11, '2022_12_13_144021_create_ratings_table', 7),
(12, '2022_12_14_162041_create_reviews_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `phone`, `email`, `address1`, `address2`, `city`, `country`, `state`, `pincode`, `total_price`, `status`, `message`, `tracking_no`, `created_at`, `updated_at`) VALUES
(1, '3', 'Leonard', 'Keci', '00355674796775', 'userleonard@gmail.com', 'Lagjia popullore Shijak , Albania Rruga Latif Keci nr  42', 'Lagjia popullore Shijak .', 'Shijak', 'Albania', 'Albania', '2013', '109', 0, NULL, 'leo8507', '2022-12-13 16:26:09', '2022-12-13 16:26:09'),
(2, '3', 'Leonard', 'Keci', '00355674796775', 'userleonard@gmail.com', 'Lagjia popullore Shijak , Albania Rruga Latif Keci nr  42', 'Lagjia popullore Shijak .', 'Shijak', 'Albania', 'Albania', '2013', '108', 0, NULL, 'leo7159', '2022-12-14 23:27:37', '2022-12-14 23:27:37'),
(3, '4', 'Leonard', 'Keci', '00355674796775', 'user2leonard@gmail.com', 'Lagjia popullore Shijak , Albania Rruga Latif Keci nr  42', 'Lagjia popullore Shijak .', 'Shijak', 'Albania', 'Albania', '2013', '108', 0, NULL, 'leo6153', '2022-12-14 23:30:46', '2022-12-14 23:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, '1', '3', '1', '109', '2022-12-13 16:26:09', '2022-12-13 16:26:09'),
(2, '2', '4', '1', '108', '2022-12-14 23:27:37', '2022-12-14 23:27:37'),
(3, '3', '4', '1', '108', '2022-12-14 23:30:46', '2022-12-14 23:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `category_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `tax`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Galaxy S8', 'GalaxyS8', 'The Hewlett-Packard Company, commonly shortened to Hewlett-Packard (/ˈhjuːlɪt ˈpækərd/ HYEW-lit PAK-ərd) or HP, was an American multinational information technology company headquartered in Palo Alto, California.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed malesuada velit. Maecenas scelerisque eu diam quis sollicitudin. Fusce libero arcu, aliquam eget tristique sit amet, dapibus ac nisl. Ut dignissim lacinia tristique. Fusce sodales ligula sit amet mauris placerat imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur molestie ac neque et viverra. In consequat enim mauris, non venenatis metus pellentesque eu. Nullam tincidunt, erat nec scelerisque congue, est nisi ultrices est, non ullamcorper lorem ex vel eros. Mauris cursus blandit turpis, sed molestie dui sagittis ac. Nam id mi vitae neque placerat cursus ut et urna.', '120', '119', '1668383960.png', '10', '12', 0, 1, 'galaxy', 'galaxy', 'galaxy', '2022-10-10 16:13:59', '2022-12-08 22:14:35'),
(2, 1, 'Huawei P30', 'Huawei P30', 'Huawei P30', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed malesuada velit. Maecenas scelerisque eu diam quis sollicitudin. Fusce libero arcu, aliquam eget tristique sit amet, dapibus ac nisl. Ut dignissim lacinia tristique. Fusce sodales ligula sit amet mauris placerat imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur molestie ac neque et viverra. In consequat enim mauris, non venenatis metus pellentesque eu. Nullam tincidunt, erat nec scelerisque congue, est nisi ultrices est, non ullamcorper lorem ex vel eros. Mauris cursus blandit turpis, sed molestie dui sagittis ac. Nam id mi vitae neque placerat cursus ut et urna.', '120', '118', '1668384182.jpg', '10', '12', 0, 1, 'Huawei P30', 'Huawei P30', 'Huawei P30', '2022-10-11 12:20:38', '2022-11-16 14:41:03'),
(3, 4, 'Laptop Lenovo', 'Laptop Lenovo', 'A crankshaft is a mechanical component used by in a piston engine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed malesuada velit. Maecenas scelerisque eu diam quis sollicitudin. Fusce libero arcu, aliquam eget tristique sit amet, dapibus ac nisl. Ut dignissim lacinia tristique. Fusce sodales ligula sit amet mauris placerat imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur molestie ac neque et viverra. In consequat enim mauris, non venenatis metus pellentesque eu. Nullam tincidunt, erat nec scelerisque congue, est nisi ultrices est, non ullamcorper lorem ex vel eros. Mauris cursus blandit turpis, sed molestie dui sagittis ac. Nam id mi vitae neque placerat cursus ut et urna.', '120', '109', '1668385313.jpg', '1', '13', 0, 1, 'Laptop Lenovo', 'Laptop Lenovo', 'Laptop Lenovo', '2022-10-11 19:41:57', '2022-12-13 16:26:09'),
(4, 6, 'Jabra', 'jabra', 'jabra', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed malesuada velit. Maecenas scelerisque eu diam quis sollicitudin. Fusce libero arcu, aliquam eget tristique sit amet, dapibus ac nisl. Ut dignissim lacinia tristique. Fusce sodales ligula sit amet mauris placerat imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur molestie ac neque et viverra. In consequat enim mauris, non venenatis metus pellentesque eu. Nullam tincidunt, erat nec scelerisque congue, est nisi ultrices est, non ullamcorper lorem ex vel eros. Mauris cursus blandit turpis, sed molestie dui sagittis ac. Nam id mi vitae neque placerat cursus ut et urna.', '120', '108', '1668385036.jpg', '6', '13', 0, 1, 'jabra', 'jabra', 'jabra', '2022-10-11 19:41:57', '2022-12-14 23:30:46'),
(5, 1, 'IPhone 9', 'IPhone 9', 'IPhone 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed malesuada velit. Maecenas scelerisque eu diam quis sollicitudin. Fusce libero arcu, aliquam eget tristique sit amet, dapibus ac nisl. Ut dignissim lacinia tristique. Fusce sodales ligula sit amet mauris placerat imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur molestie ac neque et viverra. In consequat enim mauris, non venenatis metus pellentesque eu. Nullam tincidunt, erat nec scelerisque congue, est nisi ultrices est, non ullamcorper lorem ex vel eros. Mauris cursus blandit turpis, sed molestie dui sagittis ac. Nam id mi vitae neque placerat cursus ut et urna.', '12.00', '10.00', '1668384302.png', '4', '1', 0, 0, 'IPhone 9', 'IPhone 9', 'IPhone 9', '2022-11-13 23:05:02', '2022-11-16 14:48:57'),
(6, 1, 'IPhone X', 'IPhone X', 'IPhone X', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed malesuada velit. Maecenas scelerisque eu diam quis sollicitudin. Fusce libero arcu, aliquam eget tristique sit amet, dapibus ac nisl. Ut dignissim lacinia tristique. Fusce sodales ligula sit amet mauris placerat imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur molestie ac neque et viverra. In consequat enim mauris, non venenatis metus pellentesque eu. Nullam tincidunt, erat nec scelerisque congue, est nisi ultrices est, non ullamcorper lorem ex vel eros. Mauris cursus blandit turpis, sed molestie dui sagittis ac. Nam id mi vitae neque placerat cursus ut et urna.', '130', '120', '1668384463.png', '6', '12', 0, 0, 'IPhone X', 'IPhone X', 'IPhone X', '2022-11-13 23:07:43', '2022-11-13 23:08:15'),
(7, 1, 'Lg V30', 'Lg V30', 'Lg V30', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed malesuada velit. Maecenas scelerisque eu diam quis sollicitudin. Fusce libero arcu, aliquam eget tristique sit amet, dapibus ac nisl. Ut dignissim lacinia tristique. Fusce sodales ligula sit amet mauris placerat imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur molestie ac neque et viverra. In consequat enim mauris, non venenatis metus pellentesque eu. Nullam tincidunt, erat nec scelerisque congue, est nisi ultrices est, non ullamcorper lorem ex vel eros. Mauris cursus blandit turpis, sed molestie dui sagittis ac. Nam id mi vitae neque placerat cursus ut et urna.', '130', '120', '1668384559.jpg', '7', '12', 0, 0, 'Lg V30', 'Lg V30', 'Lg V30', '2022-11-13 23:09:19', '2022-11-13 23:09:55'),
(8, 1, 'Samsung Galaxy A35', 'Samsung Galaxy A35', 'Samsung Galaxy A35', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed malesuada velit. Maecenas scelerisque eu diam quis sollicitudin. Fusce libero arcu, aliquam eget tristique sit amet, dapibus ac nisl. Ut dignissim lacinia tristique. Fusce sodales ligula sit amet mauris placerat imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur molestie ac neque et viverra. In consequat enim mauris, non venenatis metus pellentesque eu. Nullam tincidunt, erat nec scelerisque congue, est nisi ultrices est, non ullamcorper lorem ex vel eros. Mauris cursus blandit turpis, sed molestie dui sagittis ac. Nam id mi vitae neque placerat cursus ut et urna.', '140', '120', '1668384676.jpg', '5', '12', 0, 0, 'Samsung Galaxy A35', 'Samsung Galaxy A35', 'Samsung Galaxy A35', '2022-11-13 23:11:16', '2022-11-13 23:11:16'),
(9, 1, 'Samsung Universe 9', 'Samsung Universe 9', 'Samsung Universe 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed malesuada velit. Maecenas scelerisque eu diam quis sollicitudin. Fusce libero arcu, aliquam eget tristique sit amet, dapibus ac nisl. Ut dignissim lacinia tristique. Fusce sodales ligula sit amet mauris placerat imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur molestie ac neque et viverra. In consequat enim mauris, non venenatis metus pellentesque eu. Nullam tincidunt, erat nec scelerisque congue, est nisi ultrices est, non ullamcorper lorem ex vel eros. Mauris cursus blandit turpis, sed molestie dui sagittis ac. Nam id mi vitae neque placerat cursus ut et urna.', '140', '120', '1668384757.png', '7', '12', 0, 0, 'Samsung Universe 9', 'Samsung Universe 9', 'Samsung Universe 9', '2022-11-13 23:12:37', '2022-11-13 23:12:37'),
(10, 6, 'Sony', 'sony', 'sony', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed malesuada velit. Maecenas scelerisque eu diam quis sollicitudin. Fusce libero arcu, aliquam eget tristique sit amet, dapibus ac nisl. Ut dignissim lacinia tristique. Fusce sodales ligula sit amet mauris placerat imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur molestie ac neque et viverra. In consequat enim mauris, non venenatis metus pellentesque eu. Nullam tincidunt, erat nec scelerisque congue, est nisi ultrices est, non ullamcorper lorem ex vel eros. Mauris cursus blandit turpis, sed molestie dui sagittis ac. Nam id mi vitae neque placerat cursus ut et urna.', '120', '90', '1668385088.png', '7', '12', 0, 0, 'sony', 'sony', 'sony', '2022-11-13 23:18:08', '2022-12-08 22:14:35'),
(11, 4, 'Laptop Hp', 'Laptop Hp', 'Laptop Hp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed malesuada velit. Maecenas scelerisque eu diam quis sollicitudin. Fusce libero arcu, aliquam eget tristique sit amet, dapibus ac nisl. Ut dignissim lacinia tristique. Fusce sodales ligula sit amet mauris placerat imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur molestie ac neque et viverra. In consequat enim mauris, non venenatis metus pellentesque eu. Nullam tincidunt, erat nec scelerisque congue, est nisi ultrices est, non ullamcorper lorem ex vel eros. Mauris cursus blandit turpis, sed molestie dui sagittis ac. Nam id mi vitae neque placerat cursus ut et urna.', '120', '110', '1668385361.png', '6', '12', 0, 0, 'Laptop Hp', 'Laptop Hp', 'Laptop Hp', '2022-11-13 23:22:41', '2022-12-08 23:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars_rated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `prod_id`, `stars_rated`, `created_at`, `updated_at`) VALUES
(1, '3', '3', '3', '2022-12-13 16:26:32', '2022-12-14 15:11:27'),
(3, '4', '4', '3', '2022-12-14 23:31:53', '2022-12-14 23:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_review` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `prod_id`, `user_review`, `created_at`, `updated_at`) VALUES
(1, '3', '3', 'My review\r\nThis product was easy to use and eccellent', '2022-12-14 21:01:32', '2022-12-14 23:22:54'),
(3, '3', '4', 'This is Leonard and the product is very good', '2022-12-14 23:28:38', '2022-12-14 23:28:38'),
(4, '4', '4', 'This is Leonard2 user and the product is  perfect', '2022-12-14 23:31:27', '2022-12-14 23:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `lname`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Leonard Keci', 'adminleonard@gmail.com', NULL, '$2y$10$921T7OyA.M/sA621KlsQFu9ODN8bjpGC.OLMIwNhaj2ZF1bZASgIW', '', '', '', '', '', '', '', '', 1, NULL, '2022-10-02 15:14:51', '2022-10-02 15:14:51'),
(3, 'Leonard', 'userleonard@gmail.com', NULL, '$2y$10$921T7OyA.M/sA621KlsQFu9ODN8bjpGC.OLMIwNhaj2ZF1bZASgIW', 'Keci', '00355674796775', 'Lagjia popullore Shijak , Albania Rruga Latif Keci nr  42', 'Lagjia popullore Shijak .', 'Shijak', 'Albania', 'Albania', '2013', 0, NULL, '2022-10-02 15:14:51', '2022-10-16 21:05:58'),
(4, 'Leonard2', 'user2leonard@gmail.com', NULL, '$2y$10$921T7OyA.M/sA621KlsQFu9ODN8bjpGC.OLMIwNhaj2ZF1bZASgIW', 'Keci', '00355674796775', 'Lagjia popullore Shijak , Albania Rruga Latif Keci nr  42', 'Lagjia popullore Shijak .', 'Shijak', 'Albania', 'Albania', '2013', 0, NULL, '2022-10-02 15:14:51', '2022-10-16 21:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `prod_id`, `created_at`, `updated_at`) VALUES
(18, '4', '4', '2022-12-14 23:30:35', '2022-12-14 23:30:35');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
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
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
