-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2021 at 10:54 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodgross`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `number`, `type`, `verification_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'P-20210518-100000', 'Personal', NULL, 'Verified', '2021-05-18 14:15:59', '2021-05-18 14:20:23'),
(2, 3, 'R-20210604-100000', 'Business', NULL, 'Verified', '2021-06-04 14:22:07', '2021-06-04 14:23:26'),
(3, 4, 'W-20210615-100000', 'Business', NULL, 'Verified', '2021-06-15 15:24:00', '2021-06-15 15:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `account_billings`
--

CREATE TABLE `account_billings` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_1` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_2` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_primary` tinyint(1) DEFAULT NULL,
  `is_selected` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_billings`
--

INSERT INTO `account_billings` (`id`, `account_id`, `first_name`, `last_name`, `email`, `phone`, `address_line_1`, `address_line_2`, `country`, `city`, `state`, `postal_code`, `is_primary`, `is_selected`, `created_at`, `updated_at`) VALUES
(1, 1, 'Umid', 'Tadjitdin', 'abc@gmail.com', '123456', 'Homme House', 'Darker Lane', 'United States', 'Arizona', 'Arizona', '123456', 1, 1, '2021-10-08 12:37:15', '2021-10-12 21:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `account_cards`
--

CREATE TABLE `account_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `card_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `security_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiry_month` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiry_year` year(4) DEFAULT NULL,
  `is_selected` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_cards`
--

INSERT INTO `account_cards` (`id`, `account_id`, `card_number`, `card_brand`, `security_code`, `expiry_month`, `expiry_year`, `is_selected`, `created_at`, `updated_at`) VALUES
(10, 1, '4242424242424242', 'Visa', '121', 'October', 2027, 1, '2021-10-24 13:09:23', '2021-10-24 13:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `account_payment_methods`
--

CREATE TABLE `account_payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_method_id` int(10) UNSIGNED DEFAULT NULL,
  `authorization_values` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_payment_methods`
--

INSERT INTO `account_payment_methods` (`id`, `account_id`, `payment_method_id`, `authorization_values`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '{\"client_id\":\"AaBY170KNAtOgmKNCRIfmFeWTvUt_aNRsiqs4j8_vEF9z3JUpvwvuNhXkbbUb7woMrcxokmAWsMNsO2j\",\"secret\":\"ENGrKblRXBbBdz1g4YiR8zYLzfCkXxxdPH1I1OrwS-Xdgq4PjxcgTZtoMwtvEq6Ls1qBz0KdwKjyiahl\",\"mode\":\"sandbox\"}', NULL, NULL, '2020-09-01 15:27:41', '2020-09-01 15:27:41'),
(2, 2, 2, '{\"client_id\":\"GG20\",\"secret\":\"UmidGG\",\"mode\":\"sandbox\"}', NULL, NULL, '2020-09-27 19:14:59', '2020-09-27 19:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `account_shippings`
--

CREATE TABLE `account_shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_1` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_2` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_primary` tinyint(1) DEFAULT NULL,
  `is_selected` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_shippings`
--

INSERT INTO `account_shippings` (`id`, `account_id`, `first_name`, `last_name`, `email`, `phone`, `address_line_1`, `address_line_2`, `country`, `city`, `state`, `postal_code`, `is_primary`, `is_selected`, `created_at`, `updated_at`) VALUES
(1, 1, 'Asraf', 'Duha', 'abc@gmail.com', '123456', 'Homme House', 'Darker Lane', 'United States', 'Arizona', 'Arizona', '123456', 1, 0, '2021-10-08 12:37:15', '2021-10-24 13:42:50'),
(5, 1, 'Umid', 'Tadjitdin', 'root@archiverz.com', '123456789', 'Metal Home', 'Marker Lane', 'United States', 'California', 'California', '123456', 0, 1, '2021-10-12 21:46:10', '2021-10-24 13:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `business_accounts`
--

CREATE TABLE `business_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_accounts`
--

INSERT INTO `business_accounts` (`id`, `account_id`, `type`, `name`, `address`, `email`, `phone`, `country`, `state`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'Retail', 'Arizona Traders', NULL, 'tasmiatashahud@gmail.com', '+1234567890', 'United States', 'Arizona', NULL, '2021-06-04 14:22:07', '2021-06-04 14:22:07'),
(2, 3, 'Wholesale', 'Olsen Agro Industries', NULL, 'mrtest714@gmail.com', '+1963852741', 'United States', 'California', NULL, '2021-06-15 15:24:00', '2021-06-15 15:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `root_id` int(10) UNSIGNED DEFAULT NULL,
  `category_type_id` int(10) UNSIGNED DEFAULT NULL,
  `level` int(10) UNSIGNED DEFAULT NULL,
  `property_ids` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sequence` double UNSIGNED DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `root_id`, `category_type_id`, `level`, `property_ids`, `image`, `icon`, `sequence`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Motors', 0, 1, 1, '---', NULL, 'img/category/motors.png', 1, 'Active', '---', NULL, NULL, '2020-03-13 12:56:33', '2020-03-29 10:16:39'),
(2, 'Cars & Trucks', 1, 1, 2, '---', NULL, NULL, 1, 'Active', '---', NULL, NULL, '2020-03-13 12:57:00', '2020-03-29 10:16:47'),
(3, 'Convertible', 2, 1, 3, '1,2,3,4,5,6,21,23,25,9,10,11,12,13,14,15,16,17,18,19,20', NULL, NULL, 3, 'Active', '---', NULL, NULL, '2020-03-13 13:28:46', '2021-06-10 13:51:30'),
(4, 'Pickup', 2, 1, 3, '1,2,3,4,5,6,41,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40', NULL, NULL, 2, 'Active', '---', NULL, NULL, '2020-03-29 10:18:47', '2020-03-31 14:48:11'),
(5, 'Van', 2, 1, 3, '---', NULL, NULL, 1, 'Active', '---', NULL, NULL, '2020-03-31 14:48:39', '2020-03-31 15:21:43'),
(6, 'Animals & Fishes (Live)', 0, 2, 1, '---', NULL, NULL, 1, 'Active', '---', NULL, NULL, '2020-05-06 01:36:13', '2020-05-06 01:36:13'),
(7, 'Bovine Animals', 6, 2, 2, '35,36,37,42,43,44,47,48,49,50,51,52,53,54,55,45,46', NULL, NULL, 1, 'Active', '---', NULL, NULL, '2020-05-06 01:38:31', '2020-07-14 12:27:38'),
(8, 'Motorcycles', 1, 1, 2, '---', NULL, NULL, 2, 'Active', '---', NULL, NULL, '2020-06-01 02:07:37', '2020-06-01 02:07:37'),
(9, 'Cruiser', 8, 1, 3, '1,2,3,4,5,6,7,8,41,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,34,35,36,37,38,39,40', NULL, NULL, 4, 'Active', '---', NULL, NULL, '2020-06-01 02:09:10', '2020-06-01 02:09:10'),
(10, 'Dual Sport', 8, 1, 3, '---', NULL, NULL, 5, 'Active', '---', NULL, NULL, '2020-06-01 02:09:25', '2020-06-01 02:09:25'),
(11, 'Sport', 8, 1, 3, '---', NULL, NULL, 6, 'Active', '---', NULL, NULL, '2020-06-01 02:09:46', '2020-06-01 02:09:46'),
(12, 'Scooter', 8, 1, 3, '---', NULL, NULL, 7, 'Active', '---', NULL, NULL, '2020-06-01 02:10:38', '2020-06-01 02:10:38'),
(13, 'Classic', 8, 1, 3, '---', NULL, NULL, 8, 'Active', '---', NULL, NULL, '2020-06-01 02:11:07', '2020-06-01 02:11:07'),
(14, 'Trailers', 1, 1, 2, '---', NULL, NULL, 3, 'Active', '---', NULL, NULL, '2020-06-01 02:12:11', '2020-06-01 02:12:11'),
(15, 'Busses', 1, 1, 2, '---', NULL, NULL, 4, 'Active', '---', NULL, NULL, '2020-06-01 10:00:56', '2020-06-01 10:00:56'),
(16, 'Farming & Forestry Machinery', 1, 1, 2, '---', NULL, NULL, 5, 'Active', '---', NULL, NULL, '2020-06-01 10:02:03', '2020-06-01 10:02:03'),
(17, 'Boats', 1, 1, 2, '---', NULL, NULL, 6, 'Active', '---', NULL, NULL, '2020-06-01 10:02:34', '2020-06-01 10:02:34'),
(18, 'Commercial Trucks & Trailers', 1, 1, 2, '---', NULL, NULL, 7, 'Active', '---', NULL, NULL, '2020-06-01 10:20:15', '2020-06-01 10:20:15'),
(19, 'Light Duty Trucks', 18, 1, 3, '---', NULL, NULL, 9, 'Active', '---', NULL, NULL, '2020-06-01 13:37:27', '2020-06-01 13:37:27'),
(20, 'Medium Duty Trucks', 18, 1, 3, '---', NULL, NULL, 10, 'Active', '---', NULL, NULL, '2020-06-01 13:37:46', '2020-06-01 13:37:46'),
(21, 'Heavy Duty Trucks', 18, 1, 3, '---', NULL, NULL, 11, 'Active', '---', NULL, NULL, '2020-06-01 13:38:00', '2020-06-01 13:38:00'),
(22, 'Cell phones & Accessories', 0, 1, 1, '---', NULL, 'img/category/cell_phones_and_accessories.png', 2, 'Active', '---', NULL, NULL, '2020-06-01 13:39:58', '2020-06-01 13:39:58'),
(23, 'Electronics & Supplies', 0, 1, 1, '---', NULL, 'img/category/electronics_and_supplies.png', 3, 'Active', '---', NULL, NULL, '2020-06-01 13:40:15', '2020-06-01 13:40:15'),
(24, 'Equipments, Machines & Instruments', 0, 1, 1, '---', NULL, 'img/category/equipments_machines_and_instruments.png', 4, 'Active', '---', NULL, NULL, '2020-06-01 13:40:51', '2020-06-01 13:40:51'),
(25, 'Computers & Tablets', 0, 1, 1, '---', NULL, 'img/category/computers_and_tablets.png', 5, 'Active', '---', NULL, NULL, '2020-06-01 13:41:10', '2020-06-01 13:41:10'),
(26, 'DVDs, Movies & Music', 0, 1, 1, '---', NULL, 'img/category/dvds_movies_and_music.png', 6, 'Active', '---', NULL, NULL, '2020-06-01 13:41:26', '2020-06-01 13:41:26'),
(27, 'Books', 0, 1, 1, '---', NULL, 'img/category/books.png', 7, 'Active', '---', NULL, NULL, '2020-06-01 13:41:44', '2020-06-01 13:41:44'),
(28, 'Sports', 0, 1, 1, '---', NULL, 'img/category/sports.png', 8, 'Active', '---', NULL, NULL, '2020-06-01 13:41:53', '2020-06-01 13:41:53'),
(29, 'Home, Indoor & Outdoor', 0, 1, 1, '---', NULL, 'img/category/home_indoor_and_outdoor.png', 9, 'Active', '---', NULL, NULL, '2020-06-01 13:42:12', '2020-06-01 13:42:12'),
(30, 'Beauty & Body Care', 0, 1, 1, '---', NULL, 'img/category/beauty_and_body_care.png', 10, 'Active', '---', NULL, NULL, '2020-06-01 13:42:36', '2020-06-01 13:42:36'),
(31, 'Clothing, Shoes & Accessories', 0, 1, 1, '---', NULL, 'img/category/clothing_shoes_and_accessories.png', 11, 'Active', '---', NULL, NULL, '2020-06-01 13:42:58', '2020-06-01 13:42:58'),
(32, 'Office Supplies', 0, 1, 1, '---', NULL, 'img/category/office_supplies.png', 12, 'Active', '---', NULL, NULL, '2020-06-01 13:43:21', '2020-06-01 13:43:21'),
(33, 'Furniture & Accessories', 0, 1, 1, '---', NULL, 'img/category/furniture_and_accessories.png', 13, 'Active', '---', NULL, NULL, '2020-06-01 13:43:39', '2020-06-01 13:43:39'),
(34, 'Toys', 0, 1, 1, '---', NULL, 'img/category/toys.png', 14, 'Active', '---', NULL, NULL, '2020-06-01 13:43:59', '2020-06-01 13:43:59'),
(35, 'Tools', 0, 1, 1, '---', NULL, 'img/category/tools.png', 15, 'Active', '---', NULL, NULL, '2020-06-01 13:44:06', '2020-06-01 13:44:06'),
(36, 'Builders Hardware', 0, 1, 1, '---', NULL, 'img/category/builders_hardware.png', 16, 'Active', '---', NULL, NULL, '2020-06-01 13:44:35', '2020-06-01 13:44:35'),
(37, 'Construction, Industrial Materials', 0, 1, 1, '---', NULL, 'img/category/construction_industrial_materials.png', 17, 'Active', '---', NULL, NULL, '2020-06-01 13:44:50', '2020-06-01 13:44:50'),
(38, 'Gift, Decorations, Wrapping & Paper Products', 0, 1, 1, '---', NULL, 'img/category/gift_decorations_wrapping_and_paper_products.png', 18, 'Active', '---', NULL, NULL, '2020-06-01 13:45:06', '2020-06-01 13:45:06'),
(39, 'Kitchen, Kitchenware & Utensils', 0, 1, 1, '---', NULL, 'img/category/kitchen_kitchenware_and_utensils.png', 19, 'Active', '---', NULL, NULL, '2020-06-01 13:45:22', '2020-06-01 13:45:22'),
(40, 'Suitcases & Bags', 0, 1, 1, '---', NULL, 'img/category/suitcases_and_bags.png', 20, 'Active', '---', NULL, NULL, '2020-06-01 13:45:37', '2020-06-01 13:45:37'),
(41, 'For My Pets', 0, 1, 1, '---', NULL, 'img/category/for_my_pets.png', 21, 'Active', '---', NULL, NULL, '2020-06-01 13:45:52', '2020-06-01 13:45:52'),
(42, 'Cereal Grains and Beans', 0, 2, 1, '---', NULL, NULL, 2, 'Active', '---', NULL, NULL, '2020-06-01 13:46:33', '2020-06-01 13:46:33'),
(43, 'Agricultural Products', 0, 2, 1, '---', NULL, NULL, 3, 'Active', '---', NULL, NULL, '2020-06-01 13:48:56', '2020-06-01 13:48:56'),
(44, 'Animal Products and Feed', 0, 2, 1, '---', NULL, NULL, 4, 'Active', '---', NULL, NULL, '2020-06-01 13:49:17', '2020-06-01 13:49:17'),
(45, 'Meat, Poultry, Fish, Seafood, and Their Preparations', 0, 2, 1, '---', NULL, NULL, 5, 'Active', '---', NULL, NULL, '2020-06-01 13:49:39', '2020-06-01 13:49:39'),
(46, 'Milled Grain Products and Preparations, and Bakery Products', 0, 2, 1, '---', NULL, NULL, 6, 'Active', '---', NULL, NULL, '2020-06-01 13:49:55', '2020-06-01 13:49:55'),
(47, 'Processed Foodstuffs, Fats, Oils', 0, 2, 1, '---', NULL, NULL, 7, 'Active', '---', NULL, NULL, '2020-06-01 13:51:29', '2020-06-01 13:51:29'),
(48, 'Alcoholic Beverages, Denatured Alcohol', 0, 2, 1, '---', NULL, NULL, 8, 'Active', '---', NULL, NULL, '2020-06-01 13:51:48', '2020-06-01 13:51:48'),
(49, 'Tobacco Products', 0, 2, 1, '---', NULL, NULL, 9, 'Active', '---', NULL, NULL, '2020-06-01 13:52:03', '2020-06-01 13:52:03'),
(50, 'Natural Stones', 0, 2, 1, '---', NULL, NULL, 10, 'Active', '---', NULL, NULL, '2020-06-01 13:52:17', '2020-06-01 13:52:17'),
(51, 'Natural Sands', 0, 2, 1, '---', NULL, NULL, 11, 'Active', '---', NULL, NULL, '2020-06-01 13:52:31', '2020-06-02 13:12:23'),
(52, 'Gravel and Crushed Stone', 0, 2, 1, '---', NULL, NULL, 12, 'Active', '---', NULL, NULL, '2020-06-01 13:53:24', '2020-06-01 13:53:24'),
(53, 'Non Metallic, Minerals', 0, 2, 1, '---', NULL, NULL, 13, 'Active', '---', NULL, NULL, '2020-06-01 13:53:42', '2020-06-01 13:53:42'),
(54, 'Metals', 0, 2, 1, '---', NULL, NULL, 14, 'Active', '---', NULL, NULL, '2020-06-01 13:54:03', '2020-06-01 13:54:03'),
(55, 'Coal', 0, 2, 1, '---', NULL, NULL, 15, 'Active', '---', NULL, NULL, '2020-06-01 13:54:11', '2020-06-01 13:54:11'),
(56, 'Crude Petroleum', 0, 2, 1, '---', NULL, NULL, 16, 'Active', '---', NULL, NULL, '2020-06-01 13:54:44', '2020-06-01 13:54:44'),
(57, 'Fuel liquids', 0, 2, 1, '---', NULL, NULL, 17, 'Active', '---', NULL, NULL, '2020-06-01 13:54:59', '2020-06-01 13:54:59'),
(58, 'Fuel Oils', 0, 2, 1, '---', NULL, NULL, 18, 'Active', '---', NULL, NULL, '2020-06-01 13:55:21', '2020-06-01 13:55:21'),
(59, 'Plastics and Rubber', 0, 2, 1, '---', NULL, NULL, 19, 'Active', '---', NULL, NULL, '2020-06-01 13:55:44', '2020-06-01 13:55:44'),
(60, 'Logs and Other Wood in the Rough', 0, 2, 1, '---', NULL, NULL, 20, 'Active', '---', NULL, NULL, '2020-06-01 13:56:07', '2020-06-01 13:56:07'),
(61, 'Wood Products', 0, 2, 1, '---', NULL, NULL, 21, 'Active', '---', NULL, NULL, '2020-06-01 13:56:31', '2020-06-01 13:56:31'),
(62, 'Pulp, Newsprint, Paper, Paperboard', 0, 2, 1, '---', NULL, NULL, 22, 'Active', '---', NULL, NULL, '2020-06-01 14:09:39', '2020-06-01 14:09:39'),
(63, 'Paper or Paperboard Articles', 0, 2, 1, '---', NULL, NULL, 23, 'Active', '---', NULL, NULL, '2020-06-01 14:11:21', '2020-06-01 14:11:21'),
(64, 'Printed Products', 0, 2, 1, '---', NULL, NULL, 24, 'Active', '---', NULL, NULL, '2020-06-01 14:12:41', '2020-06-01 14:12:41'),
(65, 'Textiles, Leather, and Articles of Textiles or Leather', 0, 2, 1, '---', NULL, NULL, 25, 'Active', '---', NULL, NULL, '2020-06-01 14:12:58', '2020-06-01 14:12:58'),
(66, 'Non-Metallic Mineral Products', 0, 2, 1, '---', NULL, NULL, 26, 'Active', '---', NULL, NULL, '2020-06-01 14:13:13', '2020-06-01 14:13:13'),
(67, 'Base Metal in Primary or Semi-Finished Forms and in Finished Basic Shapes', 0, 2, 1, '---', NULL, NULL, 27, 'Active', '---', NULL, NULL, '2020-06-01 14:13:24', '2020-06-01 14:13:24'),
(68, 'Articles of Base Metal', 0, 2, 1, '---', NULL, NULL, 28, 'Active', '---', NULL, NULL, '2020-06-01 14:13:35', '2020-06-01 14:13:35'),
(69, 'Machinery', 0, 2, 1, '---', NULL, NULL, 29, 'Active', '---', NULL, NULL, '2020-06-01 14:13:46', '2020-06-01 14:13:46'),
(70, 'Electronic, Domestic Electrical Equipment, Components, Office Equipment', 0, 2, 1, '---', NULL, NULL, 30, 'Active', '---', NULL, NULL, '2020-06-01 14:13:57', '2020-06-01 14:13:57'),
(71, 'Motorized and Other Vehicles, Parts', 0, 2, 1, '---', NULL, NULL, 31, 'Active', '---', NULL, NULL, '2020-06-01 14:14:09', '2020-06-01 14:14:09'),
(72, 'Transportation Equipment, not Elsewhere Classified', 0, 2, 1, '---', NULL, NULL, 32, 'Active', '---', NULL, NULL, '2020-06-01 14:14:32', '2020-06-01 14:14:32'),
(73, 'Precision Instruments & Apparatus', 0, 2, 1, '---', NULL, NULL, 33, 'Active', '---', NULL, NULL, '2020-06-01 14:14:48', '2020-06-01 14:14:48'),
(74, 'Furniture, Mattresses & Mattress Supports, Lamps, Lighting Fittings, Illuminated Signs', 0, 2, 1, '---', NULL, NULL, 34, 'Active', '---', NULL, NULL, '2020-06-01 14:15:11', '2020-06-01 14:15:11'),
(75, 'Miscellaneous Manufactured Products', 0, 2, 1, '---', NULL, NULL, 35, 'Active', '---', NULL, NULL, '2020-06-01 14:15:21', '2020-06-01 14:15:21'),
(76, 'Waste and Scrap', 0, 2, 1, '---', NULL, NULL, 36, 'Active', '---', NULL, NULL, '2020-06-01 14:15:30', '2020-06-01 14:15:30'),
(77, 'Mixed Freight', 0, 2, 1, '---', NULL, NULL, 37, 'Active', '---', NULL, NULL, '2020-06-01 14:15:41', '2020-06-01 14:15:41'),
(78, 'Coal and Petroleum Products', 0, 2, 1, '---', NULL, NULL, 38, 'Active', '---', NULL, NULL, '2020-06-01 15:49:23', '2020-06-01 15:49:23'),
(79, 'Live Swine', 6, 2, 2, '---', NULL, NULL, 2, 'Active', '---', NULL, NULL, '2020-06-02 11:59:31', '2020-06-02 11:59:31'),
(80, 'Live Poultry', 6, 2, 2, '---', NULL, NULL, 3, 'Active', '---', NULL, NULL, '2020-06-02 11:59:38', '2020-06-02 11:59:38'),
(81, 'Live Fish, Bait and Shellfish', 6, 2, 2, '---', NULL, NULL, 4, 'Active', '---', NULL, NULL, '2020-06-02 12:00:00', '2020-06-02 12:00:00'),
(82, 'Grains', 42, 2, 2, '---', NULL, NULL, 5, 'Active', '---', NULL, NULL, '2020-06-02 12:00:28', '2020-06-02 12:00:28'),
(83, 'Beans', 42, 2, 2, '---', NULL, NULL, 6, 'Active', '---', NULL, NULL, '2020-06-02 12:00:32', '2020-06-02 12:00:32'),
(84, 'Fresh Vegetables', 43, 2, 2, '---', NULL, NULL, 7, 'Active', '---', NULL, NULL, '2020-06-02 12:00:56', '2020-06-02 12:00:56'),
(85, 'Chilled or Dried Veggies, Fungus', 43, 2, 2, '---', NULL, NULL, 8, 'Active', '---', NULL, NULL, '2020-06-02 12:01:08', '2020-06-02 12:01:08'),
(86, 'Fresh Fruits', 43, 2, 2, '26,27,28,29,30,34,36,37,38,40,41,49,31,32,42,43,45,35,44,46,47,48', NULL, NULL, 9, 'Active', '---', NULL, NULL, '2020-06-02 12:01:22', '2021-06-15 15:47:59'),
(87, 'Nuts and Dried Fruits', 43, 2, 2, '---', NULL, NULL, 10, 'Active', '---', NULL, NULL, '2020-06-02 12:01:33', '2020-06-02 12:01:33'),
(88, 'Seeds, Bulbs', 43, 2, 2, '---', NULL, NULL, 11, 'Active', '---', NULL, NULL, '2020-06-02 12:01:53', '2020-06-02 12:01:53'),
(89, 'Fresh-Cut Plants and Flowers', 43, 2, 2, '---', NULL, NULL, 12, 'Active', '---', NULL, NULL, '2020-06-02 12:02:11', '2020-06-02 12:02:11'),
(90, 'Coffee Beans, Tea Leafs', 43, 2, 2, '---', NULL, NULL, 13, 'Active', '---', NULL, NULL, '2020-06-02 12:02:21', '2020-06-02 12:02:21'),
(91, 'Agricultural Waste', 43, 2, 2, '---', NULL, NULL, 14, 'Active', '---', NULL, NULL, '2020-06-02 12:03:03', '2020-06-02 12:03:03'),
(92, 'Animal Feeds', 44, 2, 2, '---', NULL, NULL, 15, 'Active', '---', NULL, NULL, '2020-06-02 12:03:25', '2020-06-02 12:03:25'),
(93, 'Animal Products', 44, 2, 2, '---', NULL, NULL, 16, 'Active', '---', NULL, NULL, '2020-06-02 12:03:35', '2020-06-02 12:03:35'),
(94, 'Meat', 45, 2, 2, '---', NULL, NULL, 17, 'Active', '---', NULL, NULL, '2020-06-02 12:04:01', '2020-06-02 12:04:01'),
(95, 'Fish, Seafood', 45, 2, 2, '---', NULL, NULL, 18, 'Active', '---', NULL, NULL, '2020-06-02 12:04:09', '2020-06-02 12:04:09'),
(96, 'Preparations, Extracts, Juices', 45, 2, 2, '---', NULL, NULL, 19, 'Active', '---', NULL, NULL, '2020-06-02 12:04:21', '2020-06-02 12:04:21'),
(97, 'Milled Grain Products', 46, 2, 2, '---', NULL, NULL, 20, 'Active', '---', NULL, NULL, '2020-06-02 13:02:04', '2020-06-02 13:02:04'),
(98, 'Food Preparations', 46, 2, 2, '---', NULL, NULL, 21, 'Active', '---', NULL, NULL, '2020-06-02 13:02:22', '2020-06-02 13:02:22'),
(99, 'Baked Products', 46, 2, 2, '---', NULL, NULL, 22, 'Active', '---', NULL, NULL, '2020-06-02 13:02:34', '2020-06-02 13:02:34'),
(100, 'Dairy Products', 47, 2, 2, '---', NULL, NULL, 23, 'Active', '---', NULL, NULL, '2020-06-02 13:03:00', '2020-06-02 13:03:00'),
(101, 'Processed Vegetables', 47, 2, 2, '---', NULL, NULL, 24, 'Active', '---', NULL, NULL, '2020-06-02 13:03:15', '2020-06-02 13:03:15'),
(102, 'Processed Fruit', 47, 2, 2, '---', NULL, NULL, 25, 'Active', '---', NULL, NULL, '2020-06-02 13:03:32', '2020-06-02 13:03:32'),
(103, 'Processed Nuts', 47, 2, 2, '---', NULL, NULL, 26, 'Active', '---', NULL, NULL, '2020-06-02 13:03:46', '2020-06-02 13:03:46'),
(104, 'Coffee, Tea, Spices', 47, 2, 2, '---', NULL, NULL, 27, 'Active', '---', NULL, NULL, '2020-06-02 13:03:56', '2020-06-02 13:03:56'),
(105, 'Sugars, Cocoa, Confectionery', 47, 2, 2, '---', NULL, NULL, 28, 'Active', '---', NULL, NULL, '2020-06-02 13:04:17', '2020-06-02 13:04:17'),
(106, 'Edible Preparations, Vinegar & Prepared Foods', 47, 2, 2, '---', NULL, NULL, 29, 'Active', '---', NULL, NULL, '2020-06-02 13:04:34', '2020-06-02 13:04:34'),
(107, 'Water, Non-Alcoholic Beverages, Ice', 47, 2, 2, '---', NULL, NULL, 30, 'Active', '---', NULL, NULL, '2020-06-02 13:04:59', '2020-06-02 13:04:59'),
(108, 'Beer, Malt Beer', 48, 2, 2, '---', NULL, NULL, 31, 'Active', '---', NULL, NULL, '2020-06-02 13:05:23', '2020-06-02 13:05:23'),
(109, 'Wine', 48, 2, 2, '---', NULL, NULL, 32, 'Active', '---', NULL, NULL, '2020-06-02 13:06:19', '2020-06-02 13:06:19'),
(110, 'Fermented Beverages', 48, 2, 2, '---', NULL, NULL, 33, 'Active', '---', NULL, NULL, '2020-06-02 13:06:25', '2020-06-02 13:06:25'),
(111, 'Spirituous, Distillate Beverages', 48, 2, 2, '---', NULL, NULL, 34, 'Active', '---', NULL, NULL, '2020-06-02 13:06:41', '2020-06-02 13:06:41'),
(112, 'Ethyl Alcohol', 48, 2, 2, '---', NULL, NULL, 35, 'Active', '---', NULL, NULL, '2020-06-02 13:06:56', '2020-06-02 13:06:56'),
(113, 'Cigarettes', 49, 2, 2, '---', NULL, NULL, 36, 'Active', '---', NULL, NULL, '2020-06-02 13:08:13', '2020-06-02 13:08:13'),
(114, 'Tobacco Products', 49, 2, 2, '---', NULL, NULL, 37, 'Active', '---', NULL, NULL, '2020-06-02 13:08:30', '2020-06-02 13:08:30'),
(115, 'Monumental Stone', 50, 2, 2, '---', NULL, NULL, 38, 'Active', '---', NULL, NULL, '2020-06-02 13:09:15', '2020-06-02 13:09:15'),
(116, 'Building Stone', 50, 2, 2, '---', NULL, NULL, 39, 'Active', '---', NULL, NULL, '2020-06-02 13:09:30', '2020-06-02 13:09:30'),
(117, 'Calcareous Stone', 50, 2, 2, '---', NULL, NULL, 40, 'Active', '---', NULL, NULL, '2020-06-02 13:09:44', '2020-06-02 13:09:44'),
(118, 'Slate Stone', 50, 2, 2, '---', NULL, NULL, 41, 'Active', '---', NULL, NULL, '2020-06-02 13:10:09', '2020-06-02 13:10:09'),
(119, 'Silica Sands', 51, 2, 2, '---', NULL, NULL, 42, 'Active', '---', NULL, NULL, '2020-06-02 13:10:32', '2020-06-02 13:10:32'),
(120, 'Quartz Sands', 51, 2, 2, '---', NULL, NULL, 43, 'Active', '---', NULL, NULL, '2020-06-02 13:10:46', '2020-06-02 13:10:46'),
(121, 'Feldspathic Sands', 51, 2, 2, '---', NULL, NULL, 44, 'Active', '---', NULL, NULL, '2020-06-02 13:11:05', '2020-06-02 13:11:05'),
(122, 'Filter Sands', 51, 2, 2, '---', NULL, NULL, 45, 'Active', '---', NULL, NULL, '2020-06-02 13:11:22', '2020-06-02 13:11:22'),
(123, 'Fire Sands', 51, 2, 2, '---', NULL, NULL, 46, 'Active', '---', NULL, NULL, '2020-06-02 13:11:34', '2020-06-02 13:11:34'),
(124, 'Clayey, Kaolinic Sands', 51, 2, 2, '---', NULL, NULL, 47, 'Active', '---', NULL, NULL, '2020-06-02 13:11:48', '2020-06-02 13:11:48'),
(125, 'Sand/Salt Mix', 51, 2, 2, '---', NULL, NULL, 48, 'Active', '---', NULL, NULL, '2020-06-02 13:12:04', '2020-06-02 13:12:04'),
(126, 'Shoes', 31, 1, 2, '1,2,3,4,5,6,7,8,21,22,23,9,10,11,12,13,14,15,16,17,18,19,20', NULL, NULL, 8, 'Active', '---', NULL, NULL, '2020-12-19 14:26:05', '2020-12-19 14:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `category_types`
--

CREATE TABLE `category_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sequence` double UNSIGNED DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_types`
--

INSERT INTO `category_types` (`id`, `category_type`, `sequence`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Retail', NULL, 'Active', '---', 1, NULL, '2020-02-26 18:00:00', '2020-02-26 18:00:00'),
(2, 'Wholesale', NULL, 'Active', '---', 1, NULL, '2020-02-26 18:00:00', '2020-02-26 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `connected_accounts`
--

CREATE TABLE `connected_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `connected_account_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connected_account_object` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `connected_account_origin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `connected_accounts`
--

INSERT INTO `connected_accounts` (`id`, `account_id`, `connected_account_id`, `connected_account_object`, `connected_account_origin`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'acct_1IsZOtPtQgMLmwUt', 'Stripe\\Account JSON: {\n    \"id\": \"acct_1IsZOtPtQgMLmwUt\",\n    \"object\": \"account\",\n    \"business_profile\": {\n        \"mcc\": null,\n        \"name\": null,\n        \"product_description\": null,\n        \"support_address\": null,\n        \"support_email\": null,\n        \"support_phone\": null,\n        \"support_url\": null,\n        \"url\": null\n    },\n    \"business_type\": null,\n    \"capabilities\": {\n        \"card_payments\": \"inactive\",\n        \"transfers\": \"inactive\"\n    },\n    \"charges_enabled\": false,\n    \"country\": \"US\",\n    \"created\": 1621369224,\n    \"default_currency\": \"usd\",\n    \"details_submitted\": false,\n    \"email\": \"seaudbd@gmail.com\",\n    \"external_accounts\": {\n        \"object\": \"list\",\n        \"data\": [],\n        \"has_more\": false,\n        \"total_count\": 0,\n        \"url\": \"\\/v1\\/accounts\\/acct_1IsZOtPtQgMLmwUt\\/external_accounts\"\n    },\n    \"login_links\": {\n        \"object\": \"list\",\n        \"total_count\": 0,\n        \"has_more\": false,\n        \"url\": \"\\/v1\\/accounts\\/acct_1IsZOtPtQgMLmwUt\\/login_links\",\n        \"data\": []\n    },\n    \"metadata\": [],\n    \"payouts_enabled\": false,\n    \"requirements\": {\n        \"current_deadline\": null,\n        \"currently_due\": [\n            \"business_profile.mcc\",\n            \"business_profile.url\",\n            \"business_type\",\n            \"external_account\",\n            \"representative.first_name\",\n            \"representative.last_name\",\n            \"tos_acceptance.date\",\n            \"tos_acceptance.ip\"\n        ],\n        \"disabled_reason\": \"requirements.past_due\",\n        \"errors\": [],\n        \"eventually_due\": [\n            \"business_profile.mcc\",\n            \"business_profile.url\",\n            \"business_type\",\n            \"external_account\",\n            \"representative.first_name\",\n            \"representative.last_name\",\n            \"tos_acceptance.date\",\n            \"tos_acceptance.ip\"\n        ],\n        \"past_due\": [\n            \"business_profile.mcc\",\n            \"business_profile.url\",\n            \"business_type\",\n            \"external_account\",\n            \"representative.first_name\",\n            \"representative.last_name\",\n            \"tos_acceptance.date\",\n            \"tos_acceptance.ip\"\n        ],\n        \"pending_verification\": []\n    },\n    \"settings\": {\n        \"bacs_debit_payments\": [],\n        \"branding\": {\n            \"icon\": null,\n            \"logo\": null,\n            \"primary_color\": null,\n            \"secondary_color\": null\n        },\n        \"card_issuing\": {\n            \"tos_acceptance\": {\n                \"date\": null,\n                \"ip\": null\n            }\n        },\n        \"card_payments\": {\n            \"decline_on\": {\n                \"avs_failure\": false,\n                \"cvc_failure\": false\n            },\n            \"statement_descriptor_prefix\": null\n        },\n        \"dashboard\": {\n            \"display_name\": null,\n            \"timezone\": \"Etc\\/UTC\"\n        },\n        \"payments\": {\n            \"statement_descriptor\": null,\n            \"statement_descriptor_kana\": null,\n            \"statement_descriptor_kanji\": null\n        },\n        \"payouts\": {\n            \"debit_negative_balances\": true,\n            \"schedule\": {\n                \"delay_days\": 2,\n                \"interval\": \"daily\"\n            },\n            \"statement_descriptor\": null\n        },\n        \"sepa_debit_payments\": []\n    },\n    \"tos_acceptance\": {\n        \"date\": null,\n        \"ip\": null,\n        \"user_agent\": null\n    },\n    \"type\": \"express\"\n}', 'Stripe', 'Pending', '2021-05-18 14:20:33', '2021-05-18 14:20:33'),
(2, 2, 'acct_1IyjYCPxzSZGTLrg', 'Stripe\\Account JSON: {\n    \"id\": \"acct_1IyjYCPxzSZGTLrg\",\n    \"object\": \"account\",\n    \"business_profile\": {\n        \"mcc\": null,\n        \"name\": null,\n        \"product_description\": null,\n        \"support_address\": null,\n        \"support_email\": null,\n        \"support_phone\": null,\n        \"support_url\": null,\n        \"url\": null\n    },\n    \"business_type\": null,\n    \"capabilities\": {\n        \"card_payments\": \"inactive\",\n        \"transfers\": \"inactive\"\n    },\n    \"charges_enabled\": false,\n    \"country\": \"US\",\n    \"created\": 1622838209,\n    \"default_currency\": \"usd\",\n    \"details_submitted\": false,\n    \"email\": \"tasmiatashahud@gmail.com\",\n    \"external_accounts\": {\n        \"object\": \"list\",\n        \"data\": [],\n        \"has_more\": false,\n        \"total_count\": 0,\n        \"url\": \"\\/v1\\/accounts\\/acct_1IyjYCPxzSZGTLrg\\/external_accounts\"\n    },\n    \"login_links\": {\n        \"object\": \"list\",\n        \"total_count\": 0,\n        \"has_more\": false,\n        \"url\": \"\\/v1\\/accounts\\/acct_1IyjYCPxzSZGTLrg\\/login_links\",\n        \"data\": []\n    },\n    \"metadata\": [],\n    \"payouts_enabled\": false,\n    \"requirements\": {\n        \"current_deadline\": null,\n        \"currently_due\": [\n            \"business_profile.mcc\",\n            \"business_profile.url\",\n            \"business_type\",\n            \"external_account\",\n            \"representative.first_name\",\n            \"representative.last_name\",\n            \"tos_acceptance.date\",\n            \"tos_acceptance.ip\"\n        ],\n        \"disabled_reason\": \"requirements.past_due\",\n        \"errors\": [],\n        \"eventually_due\": [\n            \"business_profile.mcc\",\n            \"business_profile.url\",\n            \"business_type\",\n            \"external_account\",\n            \"representative.first_name\",\n            \"representative.last_name\",\n            \"tos_acceptance.date\",\n            \"tos_acceptance.ip\"\n        ],\n        \"past_due\": [\n            \"business_profile.mcc\",\n            \"business_profile.url\",\n            \"business_type\",\n            \"external_account\",\n            \"representative.first_name\",\n            \"representative.last_name\",\n            \"tos_acceptance.date\",\n            \"tos_acceptance.ip\"\n        ],\n        \"pending_verification\": []\n    },\n    \"settings\": {\n        \"bacs_debit_payments\": [],\n        \"branding\": {\n            \"icon\": null,\n            \"logo\": null,\n            \"primary_color\": null,\n            \"secondary_color\": null\n        },\n        \"card_issuing\": {\n            \"tos_acceptance\": {\n                \"date\": null,\n                \"ip\": null\n            }\n        },\n        \"card_payments\": {\n            \"decline_on\": {\n                \"avs_failure\": false,\n                \"cvc_failure\": false\n            },\n            \"statement_descriptor_prefix\": null\n        },\n        \"dashboard\": {\n            \"display_name\": null,\n            \"timezone\": \"Etc\\/UTC\"\n        },\n        \"payments\": {\n            \"statement_descriptor\": null,\n            \"statement_descriptor_kana\": null,\n            \"statement_descriptor_kanji\": null\n        },\n        \"payouts\": {\n            \"debit_negative_balances\": true,\n            \"schedule\": {\n                \"delay_days\": 2,\n                \"interval\": \"daily\"\n            },\n            \"statement_descriptor\": null\n        },\n        \"sepa_debit_payments\": []\n    },\n    \"tos_acceptance\": {\n        \"date\": null,\n        \"ip\": null,\n        \"user_agent\": null\n    },\n    \"type\": \"express\"\n}', 'Stripe', 'Pending', '2021-06-04 14:23:31', '2021-06-04 14:23:31'),
(3, 3, 'acct_1J2joBPxMRzgXwHU', 'Stripe\\Account JSON: {\n    \"id\": \"acct_1J2joBPxMRzgXwHU\",\n    \"object\": \"account\",\n    \"business_profile\": {\n        \"mcc\": null,\n        \"name\": null,\n        \"product_description\": null,\n        \"support_address\": null,\n        \"support_email\": null,\n        \"support_phone\": null,\n        \"support_url\": null,\n        \"url\": null\n    },\n    \"business_type\": null,\n    \"capabilities\": {\n        \"card_payments\": \"inactive\",\n        \"transfers\": \"inactive\"\n    },\n    \"charges_enabled\": false,\n    \"country\": \"US\",\n    \"created\": 1623792511,\n    \"default_currency\": \"usd\",\n    \"details_submitted\": false,\n    \"email\": \"mrtest714@gmail.com\",\n    \"external_accounts\": {\n        \"object\": \"list\",\n        \"data\": [],\n        \"has_more\": false,\n        \"total_count\": 0,\n        \"url\": \"\\/v1\\/accounts\\/acct_1J2joBPxMRzgXwHU\\/external_accounts\"\n    },\n    \"login_links\": {\n        \"object\": \"list\",\n        \"total_count\": 0,\n        \"has_more\": false,\n        \"url\": \"\\/v1\\/accounts\\/acct_1J2joBPxMRzgXwHU\\/login_links\",\n        \"data\": []\n    },\n    \"metadata\": [],\n    \"payouts_enabled\": false,\n    \"requirements\": {\n        \"current_deadline\": null,\n        \"currently_due\": [\n            \"business_profile.mcc\",\n            \"business_profile.url\",\n            \"business_type\",\n            \"external_account\",\n            \"representative.first_name\",\n            \"representative.last_name\",\n            \"tos_acceptance.date\",\n            \"tos_acceptance.ip\"\n        ],\n        \"disabled_reason\": \"requirements.past_due\",\n        \"errors\": [],\n        \"eventually_due\": [\n            \"business_profile.mcc\",\n            \"business_profile.url\",\n            \"business_type\",\n            \"external_account\",\n            \"representative.first_name\",\n            \"representative.last_name\",\n            \"tos_acceptance.date\",\n            \"tos_acceptance.ip\"\n        ],\n        \"past_due\": [\n            \"business_profile.mcc\",\n            \"business_profile.url\",\n            \"business_type\",\n            \"external_account\",\n            \"representative.first_name\",\n            \"representative.last_name\",\n            \"tos_acceptance.date\",\n            \"tos_acceptance.ip\"\n        ],\n        \"pending_verification\": []\n    },\n    \"settings\": {\n        \"bacs_debit_payments\": [],\n        \"branding\": {\n            \"icon\": null,\n            \"logo\": null,\n            \"primary_color\": null,\n            \"secondary_color\": null\n        },\n        \"card_issuing\": {\n            \"tos_acceptance\": {\n                \"date\": null,\n                \"ip\": null\n            }\n        },\n        \"card_payments\": {\n            \"decline_on\": {\n                \"avs_failure\": false,\n                \"cvc_failure\": false\n            },\n            \"statement_descriptor_prefix\": null\n        },\n        \"dashboard\": {\n            \"display_name\": null,\n            \"timezone\": \"Etc\\/UTC\"\n        },\n        \"payments\": {\n            \"statement_descriptor\": null,\n            \"statement_descriptor_kana\": null,\n            \"statement_descriptor_kanji\": null\n        },\n        \"payouts\": {\n            \"debit_negative_balances\": true,\n            \"schedule\": {\n                \"delay_days\": 2,\n                \"interval\": \"daily\"\n            },\n            \"statement_descriptor\": null\n        },\n        \"sepa_debit_payments\": []\n    },\n    \"tos_acceptance\": {\n        \"date\": null,\n        \"ip\": null,\n        \"user_agent\": null\n    },\n    \"type\": \"express\"\n}', 'Stripe', 'Pending', '2021-06-15 15:28:34', '2021-06-15 15:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(2, 'Albania', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(3, 'Algeria', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(4, 'American Samoa', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(5, 'Andorra', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(6, 'Angola', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(7, 'Anguilla', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(8, 'Antarctica', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(9, 'Antigua & Barbuda', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(10, 'Argentina', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(11, 'Armenia', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(12, 'Aruba', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(13, 'Australia', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(14, 'Austria', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(15, 'Azerbaijan', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(16, 'Bahamas', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(17, 'Bahrain', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(18, 'Bangladesh', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(19, 'Barbados', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(20, 'Belarus', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(21, 'Belgium', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(22, 'Belize', 'Active', '2021-02-21 17:04:52', '2021-02-21 17:04:52'),
(23, 'Benin', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(24, 'Bermuda', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(25, 'Bhutan', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(26, 'Bolivia', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(27, 'Bosnia & Herzegovina', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(28, 'Botswana', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(29, 'Bouvet Island', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(30, 'Brazil', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(31, 'British Indian Ocean Territory', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(32, 'British Virgin Islands', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(33, 'Brunei', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(34, 'Bulgaria', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(35, 'Burkina Faso', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(36, 'Burundi', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(37, 'Cambodia', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(38, 'Cameroon', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(39, 'Canada', 'Active', '2021-02-21 17:04:53', '2021-02-21 17:04:53'),
(40, 'Cape Verde', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(41, 'Caribbean Netherlands', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(42, 'Cayman Islands', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(43, 'Central African Republic', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(44, 'Chad', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(45, 'Chile', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(46, 'China', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(47, 'Christmas Island', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(48, 'Cocos (Keeling) Islands', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(49, 'Colombia', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(50, 'Comoros', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(51, 'Congo - Brazzaville', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(52, 'Congo - Kinshasa', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(53, 'Cook Islands', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(54, 'Costa Rica', 'Active', '2021-02-21 17:04:54', '2021-02-21 17:04:54'),
(55, 'Croatia', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(56, 'Cuba', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(57, 'Curaçao', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(58, 'Cyprus', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(59, 'Czechia', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(60, 'Côte d’Ivoire', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(61, 'Denmark', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(62, 'Djibouti', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(63, 'Dominica', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(64, 'Dominican Republic', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(65, 'Ecuador', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(66, 'Egypt', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(67, 'El Salvador', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(68, 'Equatorial Guinea', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(69, 'Eritrea', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(70, 'Estonia', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(71, 'Eswatini', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(72, 'Ethiopia', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(73, 'Falkland Islands', 'Active', '2021-02-21 17:04:55', '2021-02-21 17:04:55'),
(74, 'Faroe Islands', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(75, 'Fiji', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(76, 'Finland', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(77, 'France', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(78, 'French Guiana', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(79, 'French Polynesia', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(80, 'French Southern Territories', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(81, 'Gabon', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(82, 'Gambia', 'Active', '2021-02-21 17:04:56', '2021-02-21 17:04:56'),
(83, 'Georgia', 'Active', '2021-02-21 17:04:57', '2021-02-21 17:04:57'),
(84, 'Germany', 'Active', '2021-02-21 17:04:57', '2021-02-21 17:04:57'),
(85, 'Ghana', 'Active', '2021-02-21 17:04:57', '2021-02-21 17:04:57'),
(86, 'Gibraltar', 'Active', '2021-02-21 17:04:57', '2021-02-21 17:04:57'),
(87, 'Greece', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(88, 'Greenland', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(89, 'Grenada', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(90, 'Guadeloupe', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(91, 'Guam', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(92, 'Guatemala', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(93, 'Guernsey', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(94, 'Guinea', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(95, 'Guinea-Bissau', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(96, 'Guyana', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(97, 'Haiti', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(98, 'Heard & McDonald Islands', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(99, 'Honduras', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(100, 'Hong Kong SAR China', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(101, 'Hungary', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(102, 'Iceland', 'Active', '2021-02-21 17:04:58', '2021-02-21 17:04:58'),
(103, 'India', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(104, 'Indonesia', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(105, 'Iran', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(106, 'Iraq', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(107, 'Ireland', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(108, 'Isle of Man', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(109, 'Israel', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(110, 'Italy', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(111, 'Jamaica', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(112, 'Japan', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(113, 'Jersey', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(114, 'Jordan', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(115, 'Kazakhstan', 'Active', '2021-02-21 17:04:59', '2021-02-21 17:04:59'),
(116, 'Kenya', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(117, 'Kiribati', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(118, 'Kuwait', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(119, 'Kyrgyzstan', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(120, 'Laos', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(121, 'Latvia', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(122, 'Lebanon', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(123, 'Lesotho', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(124, 'Liberia', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(125, 'Libya', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(126, 'Liechtenstein', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(127, 'Lithuania', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(128, 'Luxembourg', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(129, 'Macao SAR China', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(130, 'Madagascar', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(131, 'Malawi', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(132, 'Malaysia', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(133, 'Maldives', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(134, 'Mali', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(135, 'Malta', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(136, 'Marshall Islands', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(137, 'Martinique', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(138, 'Mauritania', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(139, 'Mauritius', 'Active', '2021-02-21 17:05:00', '2021-02-21 17:05:00'),
(140, 'Mayotte', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(141, 'Mexico', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(142, 'Micronesia', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(143, 'Moldova', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(144, 'Monaco', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(145, 'Mongolia', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(146, 'Montenegro', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(147, 'Montserrat', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(148, 'Morocco', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(149, 'Mozambique', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(150, 'Myanmar (Burma)', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(151, 'Namibia', 'Active', '2021-02-21 17:05:01', '2021-02-21 17:05:01'),
(152, 'Nauru', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(153, 'Nepal', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(154, 'Netherlands', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(155, 'New Caledonia', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(156, 'New Zealand', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(157, 'Nicaragua', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(158, 'Niger', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(159, 'Nigeria', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(160, 'Niue', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(161, 'Norfolk Island', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(162, 'North Korea', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(163, 'North Macedonia', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(164, 'Northern Mariana Islands', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(165, 'Norway', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(166, 'Oman', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(167, 'Pakistan', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(168, 'Palau', 'Active', '2021-02-21 17:05:02', '2021-02-21 17:05:02'),
(169, 'Palestinian Territories', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(170, 'Panama', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(171, 'Papua New Guinea', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(172, 'Paraguay', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(173, 'Peru', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(174, 'Philippines', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(175, 'Pitcairn Islands', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(176, 'Poland', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(177, 'Portugal', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(178, 'Puerto Rico', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(179, 'Qatar', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(180, 'Romania', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(181, 'Russia', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(182, 'Rwanda', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(183, 'Réunion', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(184, 'Samoa', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(185, 'San Marino', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(186, 'Saudi Arabia', 'Active', '2021-02-21 17:05:03', '2021-02-21 17:05:03'),
(187, 'Senegal', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(188, 'Serbia', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(189, 'Seychelles', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(190, 'Sierra Leone', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(191, 'Singapore', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(192, 'Sint Maarten', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(193, 'Slovakia', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(194, 'Slovenia', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(195, 'Solomon Islands', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(196, 'Somalia', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(197, 'South Africa', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(198, 'South Georgia & South Sandwich Islands', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(199, 'South Korea', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(200, 'South Sudan', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(201, 'Spain', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(202, 'Sri Lanka', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(203, 'St. Barthélemy', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(204, 'St. Helena', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(205, 'St. Kitts & Nevis', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(206, 'St. Lucia', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(207, 'St. Martin', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(208, 'St. Pierre & Miquelon', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(209, 'St. Vincent & Grenadines', 'Active', '2021-02-21 17:05:04', '2021-02-21 17:05:04'),
(210, 'Sudan', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(211, 'Suriname', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(212, 'Svalbard & Jan Mayen', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(213, 'Sweden', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(214, 'Switzerland', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(215, 'Syria', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(216, 'São Tomé & Príncipe', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(217, 'Taiwan', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(218, 'Tajikistan', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(219, 'Tanzania', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(220, 'Thailand', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(221, 'Timor-Leste', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(222, 'Togo', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(223, 'Tokelau', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(224, 'Tonga', 'Active', '2021-02-21 17:05:05', '2021-02-21 17:05:05'),
(225, 'Trinidad & Tobago', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(226, 'Tunisia', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(227, 'Turkey', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(228, 'Turkmenistan', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(229, 'Turks & Caicos Islands', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(230, 'Tuvalu', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(231, 'U.S. Outlying Islands', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(232, 'U.S. Virgin Islands', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(233, 'Uganda', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(234, 'Ukraine', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(235, 'United Arab Emirates', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(236, 'United Kingdom', 'Active', '2021-02-21 17:05:06', '2021-02-21 17:05:06'),
(237, 'United States', 'Active', '2021-02-21 17:05:07', '2021-02-21 17:05:07'),
(238, 'Uruguay', 'Active', '2021-02-21 17:05:07', '2021-02-21 17:05:07'),
(239, 'Uzbekistan', 'Active', '2021-02-21 17:05:07', '2021-02-21 17:05:07'),
(240, 'Vanuatu', 'Active', '2021-02-21 17:05:07', '2021-02-21 17:05:07'),
(241, 'Vatican City', 'Active', '2021-02-21 17:05:07', '2021-02-21 17:05:07'),
(242, 'Venezuela', 'Active', '2021-02-21 17:05:07', '2021-02-21 17:05:07'),
(243, 'Vietnam', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08'),
(244, 'Wallis & Futuna', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08'),
(245, 'Western Sahara', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08'),
(246, 'Yemen', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08'),
(247, 'Zambia', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08'),
(248, 'Zimbabwe', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08'),
(249, 'Åland Islands', 'Active', '2021-02-21 17:05:08', '2021-02-21 17:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `root_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `menu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route_group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operation_list` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accessibilities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accessibility_count` tinyint(3) UNSIGNED DEFAULT NULL,
  `sequence` double UNSIGNED DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `root_id`, `menu`, `route_group`, `method`, `route`, `controller`, `action`, `operation_list`, `accessibilities`, `accessibility_count`, `sequence`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Dashboard', 'Admin', 'get', 'admin/dashboard/{id}', 'DashboardController', 'index', NULL, NULL, NULL, 1, 'Active', '---', 1, NULL, '2019-04-01 09:13:39', '2019-04-22 07:34:58'),
(2, 0, 'Configuration', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Active', '', 1, NULL, '2019-04-01 09:13:39', '2019-04-22 07:34:58'),
(3, 2, 'Category Type', 'Admin\\Configuration', 'get,get,get,post,post,post', 'admin/configuration/category/type/{id},admin/configuration/category/type/gets/{search_string}/{record_per_page},admin/configuration/category/type/get/{id},admin/configuration/category/type/save,admin/configuration/category/type/apply/bulk/operation,admin/configuration/category/type/delete', 'CategoryTypeController', 'index,gets,get,save,applyBulkOperation,delete', 'activeMenuValue:Configuration,activeSubMenuValue:Category Type,activeMenuId:2,activeSubMenuId:3,recordPerPage:10', NULL, NULL, 4, 'Active', '---', 1, NULL, '2019-03-30 18:00:00', '2019-04-22 01:34:59'),
(4, 2, 'Section', 'Admin\\Configuration', 'get,get,get,post,post,post', 'admin/configuration/section/{id},admin/configuration/section/gets/{search_string}/{record_per_page},admin/configuration/section/get/{id},admin/configuration/section/save,admin/configuration/section/apply/bulk/operation,admin/configuration/section/delete', 'SectionController', 'index,gets,get,save,applyBulkOperation,delete', 'activeMenuValue:Configuration,activeSubMenuValue:Section,activeMenuId:2,activeSubMenuId:4,recordPerPage:10', NULL, NULL, 4, 'Active', '---', 1, NULL, '2019-03-30 18:00:00', '2019-04-22 01:34:59'),
(5, 2, 'Property', 'Admin\\Configuration', 'get,get,get,post,post,post,get', 'admin/configuration/property/{id},admin/configuration/property/gets/{category_type_id}/{search_string}/{record_per_page},admin/configuration/property/get/{id},admin/configuration/property/save,admin/configuration/property/apply/bulk/operation,admin/configuration/property/delete,admin/configuration/property/get/sections/by/category/type/id', 'PropertyController', 'index,gets,get,save,applyBulkOperation,delete,getSectionsByCategoryTypeId', 'activeMenuValue:Configuration,activeSubMenuValue:Property,activeMenuId:2,activeSubMenuId:5,recordPerPage:10', NULL, NULL, 4, 'Active', '---', 1, NULL, '2019-03-30 18:00:00', '2019-04-22 01:34:59'),
(6, 2, 'Category', 'Admin\\Configuration', 'get,get,get,post,post,post,get,get,post', 'admin/configuration/category/{id},admin/configuration/category/gets/{category_type_id}/{level}/{search_string}/{record_per_page},admin/configuration/category/get/{id},admin/configuration/category/save,admin/configuration/category/apply/bulk/operation,admin/configuration/category/delete,admin/configuration/category/get/properties/{made_for},admin/configuration/category/get/roots/{made_for}/{level},admin/configuration/category/update/sequence', 'CategoryController', 'index,gets,get,save,applyBulkOperation,delete,getProperties,getRoots,updateSequence', 'activeMenuValue:Configuration,activeSubMenuValue:Category,activeMenuId:2,activeSubMenuId:6,recordPerPage:10', NULL, NULL, 4, 'Active', '---', 1, NULL, '2019-03-31 00:00:00', '2019-04-22 07:34:59'),
(7, 0, 'Operation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Active', '', 1, NULL, '2019-04-01 09:13:39', '2019-04-22 07:34:58'),
(8, 7, 'Account', 'Admin\\Operation', 'get,get,get,post,post,post', 'admin/operation/account/{id},admin/operation/account/gets/{search_string}/{record_per_page},admin/operation/account/get/{id},admin/operation/account/save,admin/operation/account/apply/bulk/operation,admin/operation/account/delete', 'AccountController', 'index,gets,get,save,applyBulkOperation,delete', 'activeMenuValue:Operation,activeSubMenuValue:Account,activeMenuId:7,activeSubMenuId:8,recordPerPage:10', NULL, NULL, 4, 'Active', '---', 1, NULL, '2019-03-30 18:00:00', '2019-04-22 01:34:59'),
(9, 7, 'Posting', 'Admin\\Operation', 'get,get,post,post', 'admin/operation/posting/{id},admin/operation/posting/gets/{search_string}/{record_per_page},admin/operation/posting/apply/bulk/operation,admin/operation/posting/change/status', 'PostingController', 'index,gets,applyBulkOperation,changeStatus', 'activeMenuValue:Operation,activeSubMenuValue:Posting,activeMenuId:7,activeSubMenuId:9,recordPerPage:10', NULL, NULL, 4, 'Active', '---', 1, NULL, '2019-03-30 18:00:00', '2019-04-22 01:34:59'),
(10, 0, 'Report', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Active', '', 1, NULL, '2019-04-01 09:13:39', '2019-04-22 07:34:58'),
(11, 10, 'Account', 'Admin\\Report', 'get,get,get,post,post,post', 'admin/report/account/{id},admin/report/account/gets/{search_string}/{record_per_page},admin/report/account/get/{id},admin/report/account/save,admin/report/account/apply/bulk/operation,admin/report/account/delete', 'AccountController', 'index,gets,get,save,applyBulkOperation,delete', 'activeMenuValue:Report,activeSubMenuValue:Account,activeMenuId:10,activeSubMenuId:11,recordPerPage:10', NULL, NULL, 4, 'Active', '---', 1, NULL, '2019-03-30 18:00:00', '2019-04-22 01:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `notification` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_dismissed` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `notification`, `is_dismissed`, `created_at`, `updated_at`) VALUES
(1, 3, 'Test Notification', 0, '2021-06-09 20:31:48', '2021-06-09 20:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sequence` double UNSIGNED DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option`, `group`, `value`, `sequence`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Category Level', 'Level', '5', NULL, 'Active', '---', 1, NULL, '2020-02-23 18:00:00', NULL),
(2, 'Payment Option', 'Payment', 'Centralized', NULL, 'Active', '---', 1, 1, '2020-09-20 17:15:20', '2020-09-20 17:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `transaction_object` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `transact_through` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_billings`
--

CREATE TABLE `order_billings` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_1` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_2` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_shippings`
--

CREATE TABLE `order_shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_1` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_2` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_transactions`
--

CREATE TABLE `order_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `price_per_unit` double DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payout_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transfer_object` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `authorization_keys` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `payment_method`, `icon`, `authorization_keys`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'PayPal', '<i class=\"fab fa-cc-paypal fa-2x\" style=\"color: #3b7bbf;\"></i>', 'client_id,secret,mode', 1, 1, '2020-08-29 18:00:00', '2020-08-29 18:00:00'),
(2, 'Stripe', '<i class=\"fab fa-cc-stripe fa-2x\" style=\"color: #008cdd;\"></i>', 'client_id,secret,mode', 1, 1, '2020-08-29 18:00:00', '2020-08-29 18:00:00'),
(3, 'Authorize.Net', NULL, 'login_id,transaction_key,mode', 1, 1, '2020-08-29 18:00:00', '2020-08-29 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_accounts`
--

CREATE TABLE `personal_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personal_accounts`
--

INSERT INTO `personal_accounts` (`id`, `account_id`, `first_name`, `last_name`, `email`, `phone`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Asraf', 'Duha', 'seaudbd@gmail.com', '01776648825', NULL, '2021-05-18 14:15:59', '2021-05-18 14:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `sequence` double UNSIGNED DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `account_id`, `sequence`, `status`, `narrative`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, 'Approved', NULL, '2021-05-20 03:04:43', '2021-05-20 03:48:47'),
(2, 3, 1, NULL, 'Approved', NULL, '2021-05-20 03:06:24', '2021-05-20 03:48:47'),
(3, 3, 1, NULL, 'Approved', NULL, '2021-05-20 03:19:32', '2021-05-20 03:48:47'),
(4, 3, 1, NULL, 'Approved', NULL, '2021-05-20 03:21:27', '2021-05-20 03:48:47'),
(5, 3, 1, NULL, 'Approved', NULL, '2021-05-20 03:22:51', '2021-05-20 03:48:47'),
(6, 3, 1, NULL, 'Approved', NULL, '2021-05-20 03:24:20', '2021-05-20 03:48:47'),
(7, 3, 1, NULL, 'Approved', NULL, '2021-05-20 03:29:14', '2021-05-20 03:48:47'),
(8, 3, 1, NULL, 'Approved', NULL, '2021-05-20 03:31:09', '2021-05-20 03:48:47'),
(9, 3, 1, NULL, 'Approved', NULL, '2021-05-29 12:04:16', '2021-05-29 12:06:45'),
(10, 3, 1, NULL, 'Approved', NULL, '2021-05-29 15:21:11', '2021-05-29 15:22:03'),
(14, 86, 2, NULL, 'Approved', NULL, '2021-06-14 02:08:41', '2021-06-14 14:41:37'),
(15, 86, 3, NULL, 'Approved', NULL, '2021-06-15 15:24:00', '2021-06-15 15:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_properties`
--

CREATE TABLE `product_properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `property_id` int(10) UNSIGNED DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_for_product_listing` tinyint(1) DEFAULT NULL,
  `is_for_search_engine` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_properties`
--

INSERT INTO `product_properties` (`id`, `product_id`, `property_id`, `value`, `is_for_product_listing`, `is_for_search_engine`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Mazda MX-5 Miata', 1, 1, '2021-05-20 03:04:43', '2021-05-20 03:04:43'),
(2, 1, 2, 'Mazda MX-5 Miata', 1, 1, '2021-05-20 03:04:43', '2021-05-20 03:04:43'),
(3, 1, 3, 'Mazda MX-5 Miata', 0, 0, '2021-05-20 03:04:43', '2021-05-20 03:04:43'),
(4, 1, 4, 'MX5M2021', 0, 0, '2021-05-20 03:04:43', '2021-05-20 03:04:43'),
(5, 1, 5, 'img/product/original/2021/May/1-727f39579bf2caf1d184dffd70daae43e26b5bf2.jpg', 1, 0, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(6, 1, 6, 'Brand New', 0, 0, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(7, 1, 9, 'Japan', 0, 0, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(8, 1, 10, NULL, 0, 0, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(9, 1, 11, '5000', 1, 1, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(10, 1, 12, 'Fixed Price', 0, 0, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(11, 1, 13, 'VISA', 0, 0, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(12, 1, 14, NULL, 0, 0, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(13, 1, 15, 'USPS', 0, 0, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(14, 1, 16, '0', 1, 1, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(15, 1, 17, NULL, 0, 0, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(16, 1, 18, '1 Business Days – 10 Business Days', 1, 0, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(17, 1, 19, NULL, 0, 0, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(18, 1, 20, NULL, 0, 0, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(19, 1, 21, '100', 1, 0, '2021-05-20 03:04:44', '2021-05-20 03:04:44'),
(20, 2, 1, 'Porsche 718 Boxster', 1, 1, '2021-05-20 03:06:24', '2021-05-20 03:06:24'),
(21, 2, 2, 'Porsche 718 Boxster', 1, 1, '2021-05-20 03:06:24', '2021-05-20 03:06:24'),
(22, 2, 3, 'Porsche 718 Boxster', 0, 0, '2021-05-20 03:06:24', '2021-05-20 03:06:24'),
(23, 2, 4, 'P718B2021', 0, 0, '2021-05-20 03:06:24', '2021-05-20 03:06:24'),
(24, 2, 5, 'img/product/original/2021/May/1-c684a29aa672000cc9e4f00893a6857c84eecde5.jpg', 1, 0, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(25, 2, 6, 'Used', 0, 0, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(26, 2, 9, 'Germany', 0, 0, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(27, 2, 10, NULL, 0, 0, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(28, 2, 11, '10000', 1, 1, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(29, 2, 12, 'Fixed Price', 0, 0, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(30, 2, 13, 'VISA', 0, 0, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(31, 2, 14, NULL, 0, 0, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(32, 2, 15, 'USPS', 0, 0, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(33, 2, 16, '0', 1, 1, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(34, 2, 17, NULL, 0, 0, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(35, 2, 18, '15 Business Days', 1, 0, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(36, 2, 19, NULL, 0, 0, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(37, 2, 20, NULL, 0, 0, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(38, 2, 21, '75', 1, 0, '2021-05-20 03:06:25', '2021-05-20 03:06:25'),
(39, 3, 1, 'Mercedes-AMG C43', 1, 1, '2021-05-20 03:19:32', '2021-05-20 03:19:32'),
(40, 3, 2, 'Mercedes-AMG C43', 1, 1, '2021-05-20 03:19:32', '2021-05-20 03:19:32'),
(41, 3, 3, 'Mercedes-AMG C43', 0, 0, '2021-05-20 03:19:32', '2021-05-20 03:19:32'),
(42, 3, 4, 'MAMGC43', 0, 0, '2021-05-20 03:19:32', '2021-05-20 03:19:32'),
(43, 3, 5, 'img/product/original/2021/May/1-56b5ec1c86dd836cc06fa2f4890fbfa86c408684.jpg', 1, 0, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(44, 3, 6, 'Brand New', 0, 0, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(45, 3, 9, 'Germany', 0, 0, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(46, 3, 10, NULL, 0, 0, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(47, 3, 11, '15000', 1, 1, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(48, 3, 12, 'Fixed Price', 0, 0, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(49, 3, 13, 'VISA', 0, 0, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(50, 3, 14, NULL, 0, 0, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(51, 3, 15, 'USPS', 0, 0, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(52, 3, 16, '0', 1, 1, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(53, 3, 17, NULL, 0, 0, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(54, 3, 18, '30 Business Days', 1, 0, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(55, 3, 19, NULL, 0, 0, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(56, 3, 20, NULL, 0, 0, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(57, 3, 21, '50', 1, 0, '2021-05-20 03:19:33', '2021-05-20 03:19:33'),
(58, 4, 1, 'Lamborghini X200', 1, 1, '2021-05-20 03:21:27', '2021-05-20 03:21:27'),
(59, 4, 2, 'Lamborghini X200', 1, 1, '2021-05-20 03:21:27', '2021-05-20 03:21:27'),
(60, 4, 3, 'Lamborghini X200', 0, 0, '2021-05-20 03:21:27', '2021-05-20 03:21:27'),
(61, 4, 4, 'LX200', 0, 0, '2021-05-20 03:21:27', '2021-05-20 03:21:27'),
(62, 4, 5, 'img/product/original/2021/May/1-cf67a3ddc6d10bba2a773a01e6eb3618aa33d293.jpg', 1, 0, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(63, 4, 6, 'Used Good Condition', 0, 0, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(64, 4, 9, 'Italy', 0, 0, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(65, 4, 10, NULL, 0, 0, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(66, 4, 11, '15000', 1, 1, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(67, 4, 12, 'Fixed Price', 0, 0, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(68, 4, 13, 'VISA', 0, 0, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(69, 4, 14, NULL, 0, 0, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(70, 4, 15, 'USPS', 0, 0, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(71, 4, 16, '10', 1, 1, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(72, 4, 17, NULL, 0, 0, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(73, 4, 18, 'Same Business Day', 1, 0, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(74, 4, 19, NULL, 0, 0, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(75, 4, 20, NULL, 0, 0, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(76, 4, 21, '100', 1, 0, '2021-05-20 03:21:28', '2021-05-20 03:21:28'),
(77, 5, 1, 'Ferrari FX2021', 1, 1, '2021-05-20 03:22:51', '2021-05-20 03:22:51'),
(78, 5, 2, 'Ferrari FX2021', 1, 1, '2021-05-20 03:22:51', '2021-05-20 03:22:51'),
(79, 5, 3, 'Ferrari FX2021', 0, 0, '2021-05-20 03:22:51', '2021-05-20 03:22:51'),
(80, 5, 4, 'FFX2021', 0, 0, '2021-05-20 03:22:51', '2021-05-20 03:22:51'),
(81, 5, 5, 'img/product/original/2021/May/1-30db23fdc4dd77d436d2c0d7e48aaa65eedaa455.jpg', 1, 0, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(82, 5, 6, 'Brand New', 0, 0, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(83, 5, 9, 'Italy', 0, 0, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(84, 5, 10, NULL, 0, 0, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(85, 5, 11, '9999', 1, 1, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(86, 5, 12, 'Fixed Price', 0, 0, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(87, 5, 13, 'VISA', 0, 0, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(88, 5, 14, NULL, 0, 0, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(89, 5, 15, 'USPS', 0, 0, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(90, 5, 16, '20', 1, 1, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(91, 5, 17, NULL, 0, 0, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(92, 5, 18, 'Same Business Day', 1, 0, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(93, 5, 19, NULL, 0, 0, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(94, 5, 20, NULL, 0, 0, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(95, 5, 21, '75', 1, 0, '2021-05-20 03:22:52', '2021-05-20 03:22:52'),
(96, 6, 1, 'BMW Old Superior Dikuta Manfas 1999', 1, 1, '2021-05-20 03:24:20', '2021-05-20 03:24:20'),
(97, 6, 2, 'BMW Old Superior Dikuta Manfas 1999', 1, 1, '2021-05-20 03:24:20', '2021-05-20 03:24:20'),
(98, 6, 3, 'BMW Old Superior Dikuta Manfas 1999', 0, 0, '2021-05-20 03:24:20', '2021-05-20 03:24:20'),
(99, 6, 4, 'BMWOSDM1999', 0, 0, '2021-05-20 03:24:20', '2021-05-20 03:24:20'),
(100, 6, 5, 'img/product/original/2021/May/1-4c837612dc7243bdbf4d700f5a75df969431da9d.jpg', 1, 0, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(101, 6, 6, 'Brand New', 0, 0, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(102, 6, 9, 'Germany', 0, 0, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(103, 6, 10, NULL, 0, 0, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(104, 6, 11, '5000', 1, 1, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(105, 6, 12, 'Fixed Price', 0, 0, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(106, 6, 13, 'VISA', 0, 0, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(107, 6, 14, NULL, 0, 0, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(108, 6, 15, 'USPS', 0, 0, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(109, 6, 16, '0', 1, 1, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(110, 6, 17, NULL, 0, 0, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(111, 6, 18, '30 Business Days', 1, 0, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(112, 6, 19, NULL, 0, 0, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(113, 6, 20, NULL, 0, 0, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(114, 6, 21, '25', 1, 0, '2021-05-20 03:24:21', '2021-05-20 03:24:21'),
(115, 7, 1, 'Audi Manhattan Bubble Superior Danapo Lexa 2019', 1, 1, '2021-05-20 03:29:14', '2021-05-20 03:29:14'),
(116, 7, 2, 'Audi Manhattan Bubble Superior Danapo Lexa 2019', 1, 1, '2021-05-20 03:29:14', '2021-05-20 03:29:14'),
(117, 7, 3, 'Audi Manhattan Bubble Superior Danapo Lexa 2019', 0, 0, '2021-05-20 03:29:14', '2021-05-20 03:29:14'),
(118, 7, 4, 'AMBSDL2019', 0, 0, '2021-05-20 03:29:14', '2021-05-20 03:29:14'),
(119, 7, 5, 'img/product/original/2021/May/1-4b7f48626a733498b3c1a1fd00378b1eb62b1d31.jpg', 1, 0, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(120, 7, 6, 'Brand New', 0, 0, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(121, 7, 9, 'Germany', 0, 0, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(122, 7, 10, NULL, 0, 0, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(123, 7, 11, '15000', 1, 1, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(124, 7, 12, 'Fixed Price', 0, 0, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(125, 7, 13, 'VISA', 0, 0, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(126, 7, 14, NULL, 0, 0, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(127, 7, 15, 'USPS', 0, 0, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(128, 7, 16, '0', 1, 1, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(129, 7, 17, NULL, 0, 0, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(130, 7, 18, '20 Business Days', 1, 0, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(131, 7, 19, NULL, 0, 0, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(132, 7, 20, NULL, 0, 0, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(133, 7, 21, '10', 1, 0, '2021-05-20 03:29:15', '2021-05-20 03:29:15'),
(134, 8, 1, 'Volkswagen VXL-2019', 1, 1, '2021-05-20 03:31:09', '2021-05-20 03:31:09'),
(135, 8, 2, 'Volkswagen VXL-2019', 1, 1, '2021-05-20 03:31:09', '2021-05-20 03:31:09'),
(136, 8, 3, 'Volkswagen VXL-2019', 0, 0, '2021-05-20 03:31:09', '2021-05-20 03:31:09'),
(137, 8, 4, 'VVXL-2019', 0, 0, '2021-05-20 03:31:09', '2021-05-20 03:31:09'),
(138, 8, 5, 'img/product/original/2021/May/1-7040aaebe2bcb97128aab563601e07d2347dde98.jpg', 1, 0, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(139, 8, 6, 'Brand New', 0, 0, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(140, 8, 9, 'Germany', 0, 0, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(141, 8, 10, NULL, 0, 0, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(142, 8, 11, '10000', 1, 1, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(143, 8, 12, 'Fixed Price', 0, 0, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(144, 8, 13, 'VISA', 0, 0, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(145, 8, 14, NULL, 0, 0, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(146, 8, 15, 'USPS', 0, 0, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(147, 8, 16, '500', 1, 1, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(148, 8, 17, NULL, 0, 0, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(149, 8, 18, '30 Business Days', 1, 0, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(150, 8, 19, NULL, 0, 0, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(151, 8, 20, NULL, 0, 0, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(152, 8, 21, '50', 1, 0, '2021-05-20 03:31:10', '2021-05-20 03:31:10'),
(153, 1, 25, 'Mazda', 0, 1, '2021-05-21 18:34:39', '2021-05-21 18:34:39'),
(154, 2, 25, 'Porsche', 0, 1, '2021-05-21 18:34:39', '2021-05-21 18:34:39'),
(155, 3, 25, 'Mercedes Benz', 0, 1, '2021-05-21 18:34:39', '2021-05-21 18:34:39'),
(156, 4, 25, 'Lamborghini', 0, 1, '2021-05-21 18:34:39', '2021-05-21 18:34:39'),
(157, 5, 25, 'Ferrari', 0, 1, '2021-05-21 18:34:39', '2021-05-21 18:34:39'),
(158, 6, 25, 'BMW', 0, 1, '2021-05-21 18:34:39', '2021-05-21 18:34:39'),
(159, 7, 25, 'Audi', 0, 1, '2021-05-21 18:34:39', '2021-05-21 18:34:39'),
(160, 8, 25, 'Volkswagen', 0, 1, '2021-05-21 18:34:39', '2021-05-21 18:34:39'),
(161, 9, 1, 'Audi A3 2021', 1, 1, '2021-05-29 12:04:16', '2021-05-29 12:04:16'),
(162, 9, 2, 'Audi A3 2021', 1, 1, '2021-05-29 12:04:16', '2021-05-29 12:04:16'),
(163, 9, 3, 'Audi A3 2021', 0, 0, '2021-05-29 12:04:16', '2021-05-29 12:04:16'),
(164, 9, 4, 'AUDIA32021', 0, 0, '2021-05-29 12:04:16', '2021-05-29 12:04:16'),
(165, 9, 5, 'img/product/original/2021/May/1-87b18b29072ecb8b8425b213b41c129a02b71456.png,img/product/original/2021/May/1-6d0ea3f24ea46bde44363a06e374927f24a4e02e.png,img/product/original/2021/May/1-894eb68aa647642be6634e8461a3882c237e77bf.png', 1, 0, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(166, 9, 6, 'Brand New', 0, 1, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(167, 9, 9, 'Germany', 0, 1, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(168, 9, 10, 'No', 0, 0, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(169, 9, 11, '35000', 1, 1, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(170, 9, 12, 'Fixed Price', 0, 0, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(171, 9, 13, 'VISA', 0, 0, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(172, 9, 14, NULL, 0, 0, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(173, 9, 15, 'USPS', 0, 0, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(174, 9, 16, '0', 1, 1, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(175, 9, 17, NULL, 0, 0, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(176, 9, 18, '1 Business Days – 10 Business Days', 1, 0, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(177, 9, 19, NULL, 0, 0, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(178, 9, 20, NULL, 0, 0, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(179, 9, 21, '5', 1, 0, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(180, 9, 25, 'Audi', 0, 1, '2021-05-29 12:04:20', '2021-05-29 12:04:20'),
(181, 10, 1, 'Audi TT 2021', 1, 1, '2021-05-29 15:21:11', '2021-05-29 15:21:11'),
(182, 10, 2, 'Audi TT 2021', 1, 1, '2021-05-29 15:21:11', '2021-05-29 15:21:11'),
(183, 10, 3, 'Audi TT 2021', 0, 0, '2021-05-29 15:21:11', '2021-05-29 15:21:11'),
(184, 10, 4, 'ATT2021', 0, 0, '2021-05-29 15:21:11', '2021-05-29 15:21:11'),
(185, 10, 5, 'img/product/original/2021/May/1-c4ef146fd517e056f4878c570768cdf7364adfbb.png,img/product/original/2021/May/1-0af213ce043b9a11ccb0fbf315af6400a23a3752.png,img/product/original/2021/May/1-2926ebfe77a52f5902469e2bd38d60fa55959fa0.png,img/product/original/2021/May/1-d90a93e0feb73170644bd650ecc567884cc81b6b.png', 1, 0, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(186, 10, 6, 'Brand New', 0, 1, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(187, 10, 9, 'Germany', 0, 1, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(188, 10, 10, 'No', 0, 0, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(189, 10, 11, '35000', 1, 1, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(190, 10, 12, 'Fixed Price', 0, 0, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(191, 10, 13, 'VISA', 0, 0, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(192, 10, 14, NULL, 0, 0, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(193, 10, 15, 'USPS', 0, 0, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(194, 10, 16, '0', 1, 1, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(195, 10, 17, NULL, 0, 0, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(196, 10, 18, '20 Business Days', 1, 0, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(197, 10, 19, NULL, 0, 0, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(198, 10, 20, NULL, 0, 0, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(199, 10, 21, '5', 1, 0, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(200, 10, 25, 'Audi', 0, 1, '2021-05-29 15:21:16', '2021-05-29 15:21:16'),
(295, 14, 26, 'Royal Gala Apples', 1, 1, '2021-06-14 02:08:41', '2021-06-14 02:08:41'),
(296, 14, 27, 'Royal Gala Apples', 0, 1, '2021-06-14 02:08:41', '2021-06-14 02:08:41'),
(297, 14, 28, 'Royal Gala Apples', 0, 1, '2021-06-14 02:08:41', '2021-06-14 02:08:41'),
(298, 14, 29, 'img/product/original/2021/June/2-b2c0c46a3151dae4b173ed31c8bf4eaf58edfbf8.jpg,img/product/original/2021/June/2-ac2d25e9cb88345d0a92ecff54cfdf4c9dc2a261.jpg', 1, 0, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(299, 14, 30, 'Royal Gala Apples', 0, 1, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(300, 14, 31, '{\"Quantity From\":\"10\",\"Quantity To\":\"15\",\"Unit\":\"KG\",\"Currency\":\"$\",\"Price\":\"10\",\"Per Unit\":\"KG\"}', 1, 1, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(301, 14, 32, '{\"Quantity From\":\"100\",\"Quantity To\":\"150\",\"Unit\":\"KG\",\"Currency\":\"$\",\"Price\":\"8\",\"Per Unit\":\"KG\"}', 1, 1, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(302, 14, 34, 'Royal Gala Apples', 0, 0, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(303, 14, 35, 'Royal Gala Apples', 0, 0, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(304, 14, 36, 'Royal Gala Apples', 0, 0, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(305, 14, 37, 'United States', 1, 1, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(306, 14, 38, 'Royal Gala', 1, 1, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(307, 14, 40, 'Sweet and Fresh', 0, 0, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(308, 14, 41, 'Royal Gala Apples', 0, 0, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(309, 14, 42, 'TT', 1, 0, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(310, 14, 43, '{\"Quantity\":\"500\",\"Unit\":\"KG\",\"Time\":\"Day\"}', 1, 0, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(311, 14, 44, 'Royal Gala Apples', 0, 0, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(312, 14, 45, '{\"Quantity\":\"10\",\"Unit\":\"KG\"}', 1, 0, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(313, 14, 46, 'Royal Gala Apples', 0, 0, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(314, 14, 47, 'Royal Gala Apples', 0, 0, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(315, 14, 48, 'Royal Gala Apples', 0, 0, '2021-06-14 02:08:43', '2021-06-14 02:08:43'),
(316, 14, 49, '5000', 0, 0, '2021-06-14 20:26:39', '2021-06-14 20:26:39'),
(317, 15, 26, 'Mixed Barries', 1, 1, '2021-06-15 15:24:00', '2021-06-15 15:24:00'),
(318, 15, 27, 'Barries', 0, 1, '2021-06-15 15:24:00', '2021-06-15 15:24:00'),
(319, 15, 28, 'Mixed Barries', 0, 1, '2021-06-15 15:24:00', '2021-06-15 15:24:00'),
(320, 15, 29, 'img/product/original/2021/June/3-9aa641228f0f45877afed35d314dbe6aa77045b4.png,img/product/original/2021/June/3-c76c98610233c3e76fd9da3f75733cd274f075b8.png,img/product/original/2021/June/3-94a35d146fb30ef2f8b971e1532b666b9ef77dee.png', 1, 0, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(321, 15, 30, 'Barry', 0, 1, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(322, 15, 31, '{\"Quantity From\":\"50\",\"Quantity To\":\"100\",\"Unit\":\"KG\",\"Currency\":\"$\",\"Price\":\"25\",\"Per Unit\":\"KG\"}', 1, 1, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(323, 15, 32, '{\"Quantity From\":\"900\",\"Quantity To\":\"1000\",\"Unit\":\"KG\",\"Currency\":\"$\",\"Price\":\"20\",\"Per Unit\":\"KG\"}', 1, 1, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(324, 15, 34, 'Mixed Barries', 0, 0, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(325, 15, 35, 'Mixed Barries', 0, 0, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(326, 15, 36, 'Home Cultivation', 0, 0, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(327, 15, 37, 'United States', 1, 1, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(328, 15, 38, 'Olsen', 1, 1, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(329, 15, 40, 'QQ', 0, 0, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(330, 15, 41, 'Boxed Packed', 0, 0, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(331, 15, 42, 'PAYPAL', 1, 0, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(332, 15, 43, '{\"Quantity\":\"5000\",\"Unit\":\"KG\",\"Time\":\"Day\"}', 1, 0, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(333, 15, 44, '24 Hours', 0, 0, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(334, 15, 45, '{\"Quantity\":\"50\",\"Unit\":\"KG\"}', 1, 0, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(335, 15, 46, 'Mixed Barries', 0, 0, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(336, 15, 47, 'Mixed Barries', 0, 0, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(337, 15, 48, 'Free Return with Postage', 0, 0, '2021-06-15 15:24:04', '2021-06-15 15:24:04'),
(338, 15, 49, '1000000', 0, 0, '2021-06-15 21:46:35', '2021-06-15 21:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `property` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `options` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_required` tinyint(1) DEFAULT NULL,
  `is_for_search_engine` tinyint(1) DEFAULT NULL,
  `is_for_product_listing` tinyint(1) DEFAULT NULL,
  `is_for_filter` tinyint(1) DEFAULT NULL,
  `sequence` double UNSIGNED DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `property`, `section_id`, `type`, `options`, `is_required`, `is_for_search_engine`, `is_for_product_listing`, `is_for_filter`, `sequence`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Title', 1, 'Input', NULL, 1, 1, 1, 0, NULL, 'Active', 'Title of the product. Title of the product. Title of the product. Title of the product. Title of the product. ', NULL, NULL, '2020-10-17 21:03:11', '2020-11-09 15:35:21'),
(2, 'Descriptive Title', 1, 'Textarea', NULL, 1, 1, 1, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 21:06:35', '2020-11-09 15:36:39'),
(3, 'Keywards and Tags', 1, 'Input', NULL, 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 21:08:16', '2020-10-17 21:08:16'),
(4, 'Custom Label (SKU)', 1, 'Input', NULL, 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 21:09:34', '2020-10-17 21:09:34'),
(5, 'Images', 1, 'Image', NULL, 1, 0, 1, 0, NULL, 'Active', 'Please upload at least 3 and up to 5 images. The images should be the type of JPG or PNG and have the dimension from 800px X 800px to 1600px X 1600px maintaining the aspect ratio 1:1 and each file size should not exceed 1 MB.', NULL, NULL, '2020-10-17 21:10:46', '2021-05-04 12:45:46'),
(6, 'Condition', 2, 'Select Single', '[\"Brand New\",\"Used\",\"Other\",\"Open Box\",\"Refurbished\",\"For Parts Only\",\"Used Good Condition\",\"New without Box\",\"New with Tag\",\"New without Tag\"]', 1, 1, 0, 1, NULL, 'Active', '---', NULL, NULL, '2020-10-17 21:26:25', '2021-06-12 13:20:06'),
(7, 'Condition Description', 2, 'Textarea', NULL, 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 21:36:11', '2020-10-17 21:36:11'),
(8, 'Proposition 65 Warning', 2, 'Input', NULL, 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 21:37:07', '2020-10-17 21:37:07'),
(9, 'Country of Manufacture', 3, 'Input', NULL, 1, 1, 0, 1, NULL, 'Active', '---', NULL, NULL, '2020-10-17 21:42:17', '2021-05-20 11:03:16'),
(10, 'Bundle Items', 3, 'Radio', '[\"Yes\",\"No\"]', 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 21:43:55', '2021-06-12 13:20:41'),
(11, 'Price', 4, 'Input', NULL, 1, 1, 1, 1, NULL, 'Active', '---', NULL, NULL, '2020-10-17 21:46:23', '2021-05-20 11:03:34'),
(12, 'Selling Arrangement', 4, 'Select Single', '[\"Fixed Price\",\"Negotiable\",\"Both\"]', 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 21:49:16', '2021-06-12 13:20:49'),
(13, 'Payment Options', 4, 'Select Single', '[\"VISA\",\"MASTER\",\"PAYPAL\",\"CASH\",\"CHECK\"]', 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 21:51:09', '2021-06-12 13:20:52'),
(14, 'Sales Tax', 4, 'Input', NULL, 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 21:51:44', '2020-10-17 21:51:44'),
(15, 'Service', 5, 'Select Single', '[\"USPS\",\"UPS\",\"FedEx\"]', 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 22:03:07', '2021-06-12 13:20:56'),
(16, 'Shipping Cost', 5, 'Input', NULL, 1, 1, 1, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 22:03:28', '2021-05-07 15:10:07'),
(17, 'Ships From', 5, 'Input', NULL, 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 22:05:20', '2020-10-17 22:05:20'),
(18, 'Shipping Time', 5, 'Select Single', '[\"Same Business Day\",\"1 Business Days \\u2013 10 Business Days\",\"15 Business Days\",\"20 Business Days\",\"30 Business Days\"]', 1, 0, 1, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 22:06:49', '2021-06-12 13:21:00'),
(19, 'Return options', 5, 'Input', NULL, 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 22:07:18', '2020-10-17 22:07:18'),
(20, 'Sell to location', 5, 'Input', NULL, 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2020-10-17 22:11:21', '2020-10-17 22:11:21'),
(21, 'Quantity', 2, 'Input', NULL, 1, 0, 1, 0, NULL, 'Active', '---', NULL, NULL, '2020-11-17 13:35:47', '2020-11-17 13:35:47'),
(22, 'Size', 2, 'User Defined Input', NULL, 1, 1, 0, 1, NULL, 'Active', '---', NULL, NULL, '2020-12-19 14:18:58', '2021-05-20 11:04:22'),
(23, 'Color', 2, 'User Defined Input', NULL, 1, 1, 0, 1, NULL, 'Active', '---', NULL, NULL, '2020-12-19 14:19:32', '2021-05-20 11:04:30'),
(24, 'Minimum Order Quantity', 3, 'From To Input', NULL, 1, 0, 1, 0, NULL, 'Active', '---', NULL, NULL, '2021-01-01 12:53:17', '2021-01-01 12:53:17'),
(25, 'Brand', 2, 'Input', NULL, 1, 1, 0, 1, NULL, 'Active', '---', NULL, NULL, '2021-05-21 09:28:12', '2021-05-21 09:28:12'),
(26, 'Title', 7, 'Input', NULL, 1, 1, 1, 0, NULL, 'Active', 'Please enter product title name', NULL, NULL, '2021-06-10 14:18:53', '2021-06-10 14:18:53'),
(27, 'Keywords', 7, 'Input', NULL, 1, 1, 0, 0, NULL, 'Active', 'Please enter one keyword only', NULL, NULL, '2021-06-10 14:19:56', '2021-06-10 14:19:56'),
(28, 'Tags', 7, 'Textarea', NULL, 1, 1, 0, 0, NULL, 'Active', 'Adding more tags helps to search engine direct traffic to your product. Sample: golden apples, organic apples', NULL, NULL, '2021-06-10 14:21:21', '2021-06-10 14:21:21'),
(29, 'Images', 7, 'Image', NULL, 1, 0, 1, 0, NULL, 'Active', 'Please upload at least 3 and up to 5 images. The images should be the type of JPG or PNG and have the dimension from 800px X 800px to 1600px X 1600px maintaining the aspect ratio 1:1 and each file size should not exceed 1 MB.', NULL, NULL, '2021-06-10 14:22:09', '2021-06-10 14:22:09'),
(30, 'Product Type', 8, 'Input', NULL, 1, 1, 0, 0, NULL, 'Active', '---', NULL, NULL, '2021-06-10 14:31:11', '2021-06-10 14:31:11'),
(31, 'Min Order', 9, 'Input Group', '[\"Quantity From:Input\",\"Quantity To:Input\",{\"Unit:Select\":[\"KG\",\"Litre\",\"LBS\"]},{\"Currency:Select\":[\"$\",\"\\u00a3\",\"\\u20ac\"]},\"Price:Input\",{\"Per Unit:Select\":[\"KG\",\"Litre\",\"LBS\"]}]', 1, 1, 1, 1, NULL, 'Active', '---', NULL, NULL, '2021-06-12 12:36:10', '2021-06-12 12:36:10'),
(32, 'Max Order', 9, 'Input Group', '[\"Quantity From:Input\",\"Quantity To:Input\",{\"Unit:Select\":[\"KG\",\"Litre\",\"LBS\"]},{\"Currency:Select\":[\"$\",\"\\u00a3\",\"\\u20ac\"]},\"Price:Input\",{\"Per Unit:Select\":[\"KG\",\"Litre\",\"LBS\"]}]', 1, 1, 1, 1, NULL, 'Active', '---', NULL, NULL, '2021-06-12 12:38:42', '2021-06-12 12:38:42'),
(33, 'Style', 8, 'Input', NULL, 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2021-06-12 12:41:30', '2021-06-12 12:41:30'),
(34, 'Variety', 8, 'Input', NULL, 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2021-06-12 12:41:46', '2021-06-12 12:41:46'),
(35, 'FOB', 10, 'Input', NULL, 1, 0, 0, 0, NULL, 'Active', 'Free on Board or Freight on Board', NULL, NULL, '2021-06-12 12:43:16', '2021-06-12 12:59:16'),
(36, 'Cultivation Type', 8, 'Input', NULL, 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2021-06-12 12:43:32', '2021-06-12 12:43:32'),
(37, 'Place of Origin', 8, 'Input', NULL, 1, 1, 1, 0, NULL, 'Active', '---', NULL, NULL, '2021-06-12 12:44:51', '2021-06-12 12:44:51'),
(38, 'Brand Name', 8, 'Input', NULL, 1, 1, 1, 1, NULL, 'Active', '---', NULL, NULL, '2021-06-12 12:45:15', '2021-06-12 12:45:15'),
(39, 'Model Number', 8, 'Input', NULL, 1, 1, 1, 0, NULL, 'Active', '---', NULL, NULL, '2021-06-12 12:45:39', '2021-06-12 12:45:39'),
(40, 'Taste', 8, 'Input', NULL, 0, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2021-06-12 12:45:53', '2021-06-12 12:45:53'),
(41, 'Packing Details', 8, 'Textarea', NULL, 1, 0, 0, 0, NULL, 'Active', 'Please enter packaging characteristics, size, type, capacity etc.', NULL, NULL, '2021-06-12 12:47:46', '2021-06-12 12:47:46'),
(42, 'Payment Terms', 9, 'Select Single', '[\"TT\",\"DA\",\"DP\",\"LC\",\"PAYPAL\",\"MoneyGram\",\"Western Union\",\"All\",\"Other\"]', 1, 0, 1, 0, NULL, 'Active', '---', NULL, NULL, '2021-06-12 12:50:13', '2021-06-12 13:28:22'),
(43, 'Supply Ability', 9, 'Input Group', '[\"Quantity:Input\",{\"Unit:Select\":[\"KG\",\"Litre\",\"LBS\"]},{\"Time:Select\":[\"Day\",\"Week\",\"Month\",\"Quarter\",\"Year\"]}]', 1, 0, 1, 0, NULL, 'Active', '---', NULL, NULL, '2021-06-12 12:53:20', '2021-06-12 12:53:20'),
(44, 'Delivery Time', 10, 'Input', NULL, 1, 0, 0, 0, NULL, 'Active', 'Please include estimate delivery time and location', NULL, NULL, '2021-06-12 12:54:31', '2021-06-12 12:54:31'),
(45, 'MOQ', 9, 'Input Group', '[\"Quantity:Input\",{\"Unit:Select\":[\"KG\",\"Litre\",\"LBS\"]}]', 1, 0, 1, 1, NULL, 'Active', '---', NULL, NULL, '2021-06-12 12:56:17', '2021-06-12 12:56:17'),
(46, 'CIF', 10, 'Input', NULL, 1, 0, 0, 0, NULL, 'Active', 'Cost, Insurance and Freight', NULL, NULL, '2021-06-12 12:59:41', '2021-06-12 12:59:41'),
(47, 'CNF', 10, 'Input', NULL, 1, 0, 0, 0, NULL, 'Active', 'Cost Net Freight or Cost, no Insurance, Freight', NULL, NULL, '2021-06-12 12:59:58', '2021-06-12 12:59:58'),
(48, 'Return', 10, 'Textarea', NULL, 1, 0, 0, 0, NULL, 'Active', 'Please indicate whether rejected product acceptable or not, with acceptable days and in what condition', NULL, NULL, '2021-06-12 13:00:28', '2021-06-12 13:00:39'),
(49, 'Quantity', 8, 'Input', NULL, 1, 0, 0, 0, NULL, 'Active', '---', NULL, NULL, '2021-06-14 14:25:00', '2021-06-14 14:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_taxes`
--

CREATE TABLE `sales_taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_rate` double UNSIGNED DEFAULT NULL,
  `estimated_combined_rate` double UNSIGNED DEFAULT NULL,
  `estimated_country_rate` double UNSIGNED DEFAULT NULL,
  `estimated_city_rate` double UNSIGNED DEFAULT NULL,
  `estimated_special_rate` double UNSIGNED DEFAULT NULL,
  `risk_level` double UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_type_id` int(10) UNSIGNED DEFAULT NULL,
  `sequence` double UNSIGNED DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section`, `category_type_id`, `sequence`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Product Information', 1, NULL, 'Active', 'General information of the product.', NULL, NULL, '2020-10-17 20:57:09', '2020-10-17 20:57:09'),
(2, 'Product Details', 1, NULL, 'Active', 'Completing item details help buyers to better understand your listing product and prevents further misconception. Please fill up the appropriate item places for your product.', NULL, NULL, '2020-10-17 20:58:36', '2020-10-17 20:58:36'),
(3, 'Additional Details', 1, NULL, 'Active', '---', NULL, NULL, '2020-10-17 20:58:56', '2020-10-17 20:58:56'),
(4, 'Price Details', 1, NULL, 'Active', '---', NULL, NULL, '2020-10-17 20:59:09', '2020-10-17 20:59:09'),
(5, 'Shipping Details', 1, NULL, 'Active', '---', NULL, NULL, '2020-10-17 20:59:20', '2020-10-17 20:59:20'),
(6, 'Product Description', 1, NULL, 'Active', 'Please complete your item description however you like to be detailed.', NULL, NULL, '2020-10-17 20:59:36', '2020-10-17 20:59:36'),
(7, 'Product Information', 2, NULL, 'Active', 'Helps to identify the content and rank your product in searching result', NULL, NULL, '2021-06-10 13:56:41', '2021-06-10 14:16:14'),
(8, 'Product Details', 2, NULL, 'Active', 'Complete product details help buyers to better understand your listing product and prevents further misconception', NULL, NULL, '2021-06-10 13:56:55', '2021-06-10 14:16:41'),
(9, 'Trade Details', 2, NULL, 'Active', 'Complete trade details help to find potential buyers', NULL, NULL, '2021-06-10 13:57:51', '2021-06-10 14:17:07'),
(10, 'Shipping Details', 2, NULL, 'Active', 'Please complete shipping details it will help potential buyers to make definite decision', NULL, NULL, '2021-06-10 13:58:28', '2021-06-10 14:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `state`, `status`, `created_at`, `updated_at`) VALUES
(1, 237, 'Alabama', 'Active', '2021-02-21 17:27:33', '2021-02-21 17:27:33'),
(2, 237, 'Alaska', 'Active', '2021-02-21 17:27:33', '2021-02-21 17:27:33'),
(3, 237, 'American Samoa', 'Active', '2021-02-21 17:27:33', '2021-02-21 17:27:33'),
(4, 237, 'Arizona', 'Active', '2021-02-21 17:27:34', '2021-02-21 17:27:34'),
(5, 237, 'Arkansas', 'Active', '2021-02-21 17:27:34', '2021-02-21 17:27:34'),
(6, 237, 'California', 'Active', '2021-02-21 17:27:34', '2021-02-21 17:27:34'),
(7, 237, 'Colorado', 'Active', '2021-02-21 17:27:34', '2021-02-21 17:27:34'),
(8, 237, 'Connecticut', 'Active', '2021-02-21 17:27:34', '2021-02-21 17:27:34'),
(9, 237, 'Delaware', 'Active', '2021-02-21 17:27:34', '2021-02-21 17:27:34'),
(10, 237, 'District Of Columbia', 'Active', '2021-02-21 17:27:34', '2021-02-21 17:27:34'),
(11, 237, 'Federated States Of Micronesia', 'Active', '2021-02-21 17:27:34', '2021-02-21 17:27:34'),
(12, 237, 'Florida', 'Active', '2021-02-21 17:27:34', '2021-02-21 17:27:34'),
(13, 237, 'Georgia', 'Active', '2021-02-21 17:27:34', '2021-02-21 17:27:34'),
(14, 237, 'Guam', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(15, 237, 'Hawaii', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(16, 237, 'Idaho', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(17, 237, 'Illinois', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(18, 237, 'Indiana', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(19, 237, 'Iowa', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(20, 237, 'Kansas', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(21, 237, 'Kentucky', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(22, 237, 'Louisiana', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(23, 237, 'Maine', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(24, 237, 'Marshall Islands', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(25, 237, 'Maryland', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(26, 237, 'Massachusetts', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(27, 237, 'Michigan', 'Active', '2021-02-21 17:27:35', '2021-02-21 17:27:35'),
(28, 237, 'Minnesota', 'Active', '2021-02-21 17:27:36', '2021-02-21 17:27:36'),
(29, 237, 'Mississippi', 'Active', '2021-02-21 17:27:36', '2021-02-21 17:27:36'),
(30, 237, 'Missouri', 'Active', '2021-02-21 17:27:36', '2021-02-21 17:27:36'),
(31, 237, 'Montana', 'Active', '2021-02-21 17:27:37', '2021-02-21 17:27:37'),
(32, 237, 'Nebraska', 'Active', '2021-02-21 17:27:37', '2021-02-21 17:27:37'),
(33, 237, 'Nevada', 'Active', '2021-02-21 17:27:37', '2021-02-21 17:27:37'),
(34, 237, 'New Hampshire', 'Active', '2021-02-21 17:27:37', '2021-02-21 17:27:37'),
(35, 237, 'New Jersey', 'Active', '2021-02-21 17:27:37', '2021-02-21 17:27:37'),
(36, 237, 'New Mexico', 'Active', '2021-02-21 17:27:38', '2021-02-21 17:27:38'),
(37, 237, 'New York', 'Active', '2021-02-21 17:27:38', '2021-02-21 17:27:38'),
(38, 237, 'North Carolina', 'Active', '2021-02-21 17:27:38', '2021-02-21 17:27:38'),
(39, 237, 'North Dakota', 'Active', '2021-02-21 17:27:38', '2021-02-21 17:27:38'),
(40, 237, 'Northern Mariana Islands', 'Active', '2021-02-21 17:27:38', '2021-02-21 17:27:38'),
(41, 237, 'Ohio', 'Active', '2021-02-21 17:27:38', '2021-02-21 17:27:38'),
(42, 237, 'Oklahoma', 'Active', '2021-02-21 17:27:38', '2021-02-21 17:27:38'),
(43, 237, 'Oregon', 'Active', '2021-02-21 17:27:38', '2021-02-21 17:27:38'),
(44, 237, 'Palau', 'Active', '2021-02-21 17:27:39', '2021-02-21 17:27:39'),
(45, 237, 'Pennsylvania', 'Active', '2021-02-21 17:27:39', '2021-02-21 17:27:39'),
(46, 237, 'Puerto Rico', 'Active', '2021-02-21 17:27:39', '2021-02-21 17:27:39'),
(47, 237, 'Rhode Island', 'Active', '2021-02-21 17:27:39', '2021-02-21 17:27:39'),
(48, 237, 'South Carolina', 'Active', '2021-02-21 17:27:39', '2021-02-21 17:27:39'),
(49, 237, 'South Dakota', 'Active', '2021-02-21 17:27:39', '2021-02-21 17:27:39'),
(50, 237, 'Tennessee', 'Active', '2021-02-21 17:27:39', '2021-02-21 17:27:39'),
(51, 237, 'Texas', 'Active', '2021-02-21 17:27:39', '2021-02-21 17:27:39'),
(52, 237, 'Utah', 'Active', '2021-02-21 17:27:39', '2021-02-21 17:27:39'),
(53, 237, 'Vermont', 'Active', '2021-02-21 17:27:39', '2021-02-21 17:27:39'),
(54, 237, 'Virgin Islands', 'Active', '2021-02-21 17:27:39', '2021-02-21 17:27:39'),
(55, 237, 'Virginia', 'Active', '2021-02-21 17:27:40', '2021-02-21 17:27:40'),
(56, 237, 'Washington', 'Active', '2021-02-21 17:27:40', '2021-02-21 17:27:40'),
(57, 237, 'West Virginia', 'Active', '2021-02-21 17:27:40', '2021-02-21 17:27:40'),
(58, 237, 'Wisconsin', 'Active', '2021-02-21 17:27:40', '2021-02-21 17:27:40'),
(59, 237, 'Wyoming', 'Active', '2021-02-21 17:27:40', '2021-02-21 17:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `provider_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Root', 'root@goodgross.com', 'img/application/admin_avatar.jpg', '$2y$10$91OSxMlUV/Mh8duqqMoYb.APq47xyruUh4Ff81Ud9zSkYi.MILTqO', NULL, 'Controller', 'Active', '2021-04-11 11:55:46', '2021-04-11 11:55:46'),
(2, 0, NULL, 'Asraf Duha', 'seaudbd@gmail.com', NULL, '$2y$10$6oZ/8rrX1x3jh/lwZnIZk.wO3F4DPfwbBffVYSh4Pn7UVDafCgeWW', NULL, 'Account', 'Active', '2021-05-18 14:15:59', '2021-05-18 14:20:23'),
(3, 0, NULL, 'Arizona Traders', 'tasmiatashahud@gmail.com', NULL, '$2y$10$kZeFdbtkDg7kVE3QLM8vU.bGo8gV5KaX9UgCHH1Cb3V0QPFnKQo0e', NULL, 'Account', 'Active', '2021-06-04 14:22:07', '2021-06-04 14:23:26'),
(4, 0, NULL, 'Olsen Agro Industries', 'mrtest714@gmail.com', NULL, '$2y$10$dAzfI8Mx0xUKunyRnsU3Ge70aEPygZlS3KAfHBURHNCslmWjdZjG6', NULL, 'Account', 'Active', '2021-06-15 15:24:00', '2021-06-15 15:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `watched_products`
--

CREATE TABLE `watched_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `watched_products`
--

INSERT INTO `watched_products` (`id`, `account_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 9, '2021-06-09 16:19:01', '2021-06-09 16:19:01'),
(2, 2, 1, '2021-06-10 13:03:48', '2021-06-10 13:03:48'),
(3, 2, 2, '2021-06-10 13:11:55', '2021-06-10 13:11:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_billings`
--
ALTER TABLE `account_billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_cards`
--
ALTER TABLE `account_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_payment_methods`
--
ALTER TABLE `account_payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_shippings`
--
ALTER TABLE `account_shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_accounts`
--
ALTER TABLE `business_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_types`
--
ALTER TABLE `category_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connected_accounts`
--
ALTER TABLE `connected_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_billings`
--
ALTER TABLE `order_billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_shippings`
--
ALTER TABLE `order_shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_transactions`
--
ALTER TABLE `order_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_accounts`
--
ALTER TABLE `personal_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_properties`
--
ALTER TABLE `product_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_taxes`
--
ALTER TABLE `sales_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watched_products`
--
ALTER TABLE `watched_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `account_billings`
--
ALTER TABLE `account_billings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_cards`
--
ALTER TABLE `account_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `account_payment_methods`
--
ALTER TABLE `account_payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account_shippings`
--
ALTER TABLE `account_shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `business_accounts`
--
ALTER TABLE `business_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `category_types`
--
ALTER TABLE `category_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `connected_accounts`
--
ALTER TABLE `connected_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_billings`
--
ALTER TABLE `order_billings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_shippings`
--
ALTER TABLE `order_shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_transactions`
--
ALTER TABLE `order_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_accounts`
--
ALTER TABLE `personal_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_properties`
--
ALTER TABLE `product_properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sales_taxes`
--
ALTER TABLE `sales_taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `watched_products`
--
ALTER TABLE `watched_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
