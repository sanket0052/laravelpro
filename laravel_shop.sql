-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2016 at 12:35 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.6.16-2+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `category_list` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `status`, `category_list`, `logo`, `thumb`, `created_at`, `updated_at`) VALUES
(2, 'Cannon', 'Canon Inc. is a Japanese multinational corporation specialized in the manufacture of imaging and optical products, including cameras, camcorders, photocopiers, steppers, computer printers and medical equipment. Its headquarters are located in ?ta, Tokyo, Japan.\r\n\r\nCanon has a primary listing on the Tokyo Stock Exchange and is a constituent of the TOPIX index. It has a secondary listing on the New York Stock Exchange. At the beginning of 2015, Canon was the tenth largest public company in Japan when measured by market capitalization.', 1, '1', 'Cannon.jpg', 'Cannon_thumb.jpg', '2016-03-04 07:50:20', '2016-03-04 07:50:20'),
(3, 'Dell', 'Dell Inc. is an American privately owned multinational computer technology company based in Round Rock, Texas, United States, that develops, sells, repairs, and supports computers and related products and services.', 1, '2', 'Dell.png', 'Dell_thumb.png', '2016-03-04 23:22:25', '2016-03-05 00:59:22'),
(4, 'HTC', 'HTC Corporation, Full name:. It is a Taiwanese multinational manufacturer of smartphones and tablets headquartered in New Taipei City, Taiwan', 1, '4,6,7', 'HTC.png', 'HTC_thumb.png', '2016-03-04 23:23:13', '2016-03-04 23:23:13'),
(6, 'Apple', 'Apple Inc. is an American multinational technology company headquartered in Cupertino, California, that designs, develops, and sells consumer electronics, computer software, and online services.', 1, '2,4,6,7', 'Apple.png', 'Apple_thumb.png', '2016-03-05 00:35:21', '2016-03-05 00:35:21'),
(10, 'Motorola', 'Motorola, Inc. was a multinational telecommunications company based in Schaumburg, Illinois, United States.', 1, '4,6,7', 'Motorola.png', 'Motorola_thumb.png', '2016-03-05 00:52:18', '2016-03-05 00:52:18'),
(11, 'Lenovo', 'Lenovo Group Ltd. Lenovo is a Chinese multinational computer technology company with headquarters in Beijing, China, and Morrisville, North Carolina, United States.', 1, '2,4,6,7', 'Lenovo.png', 'Lenovo_thumb.png', '2016-03-05 01:01:03', '2016-03-05 01:01:03'),
(12, 'Timex', 'Timex Group USA, Inc. is a subsidiary of the Dutch company Timex Group B.V., and its US headquarters, is based in Middlebury, Connecticut.', 1, '9', 'Timex.png', 'Timex_thumb.png', '2016-03-05 01:10:08', '2016-03-05 01:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `urlname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`, `status`, `urlname`, `created_at`, `updated_at`) VALUES
(1, 'Cameras', 'Demo', 0, 1, 'camera', '2016-03-03 06:51:36', '2016-03-03 23:59:31'),
(2, 'Computers & Peripherals', 'Laptop computers, also known as notebooks, are portable computers that you can take with you and use in different environments. They include a screen, keyboard, and a trackpad or trackball, which serves as the mouse. Because laptops are meant to be used on the go, they have a battery which allows them to operate without being plugged into a power outlet. Laptops also include a power adapter that allows them to use power from an outlet and recharges the battery.\r\n\r\nWhile portable computers used to be significantly slower and less capable than desktop computers, advances in manufacturing technology have enabled laptops to perform nearly as well as their desktop counterparts. In fact, high-end laptops often perform better than low or even mid-range desktop systems. Most laptops also include several I/O ports, such as USB ports, that allow standard keyboards and mice to be used with the laptop. Modern laptops often include a wireless networking adapter as well, allowing users to access the Internet without requiring any wires.\r\n\r\nWhile laptops can be powerful and convenient, the convenience often comes at a price. Most laptops cost several hundred dollars more than a similarly equipped desktop model with a monitor, keyboard, and mouse. Furthermore, working long hours on a laptop with a small screen and keyboard may be more fatiguing than working on a desktop system. Therefore, if portability is not a requirement for your computer, you may find better value in a desktop model.', 0, 1, 'computer-laptop', '2016-03-03 06:54:01', '2016-03-03 06:54:01'),
(3, 'Fashion And Beauty', 'Fashion accessories are decorative items that supplement one''s garment, such as jewelry, gloves, handbags, hats, belts, scarves, watches, sunglasses, pins, stockings, bow ties, leg warmers, leggings, neckties, suspenders, and tights.\r\n\r\nFashion accessories add color, style and class to an outfit, and create a certain look, but they may also have practical functions. Handbags are for carrying small necessary items, hats protect the face from weather elements, Laptops provide mobile connectivity and are used to increase work power and gloves keep the hands warm.\r\n\r\nMany fashion accessories are produced by clothing design companies. However, there has been an increase in individuals creating their own brand name by designing and making their own label of accessories.\r\n\r\nFashion accessories can be visual symbols of religious affiliation: Crucifixes, Jewish stars, Islamic headscarves, skullcaps and turbans are common examples. Designer labels on accessories are perceived as an indicator of social status.\r\n\r\nFashion accessories are also available in the form of bracelets, necklaces, earrings, and shoelace accessories.', 0, 1, 'fashion-beauty', '2016-03-03 06:55:10', '2016-03-03 06:55:10'),
(4, 'Mobiles & Accessories', 'Demo 2', 0, 1, 'mobile-and-accessories', '2016-03-03 06:58:03', '2016-03-03 06:58:03'),
(5, 'Movies, Music & Games', 'Shop for gaming, movies and music at Best Buy. Choose from a selection of games, gaming consoles, CDs, DVDs, Blu-ray Discs, and musical instruments at Best Buy.', 0, 1, 'entertainment', '2016-03-03 06:58:31', '2016-03-03 06:58:31'),
(6, 'Mobile', 'A mobile phone is a telephone that can make and receive calls over a radio frequency carrier while the user is moving within a telephone service area.', 4, 1, 'mobiles', '2016-03-03 07:45:30', '2016-03-03 07:45:30'),
(7, 'Mobile Accessories', 'Demo', 4, 1, 'mobile-accessory', '2016-03-03 22:55:35', '2016-03-04 00:00:16'),
(8, 'Movies & TV', 'Online shopping from a great selection at Movies & TV Store.', 5, 1, 'movies-tv', '2016-03-03 22:57:09', '2016-03-03 23:59:53'),
(9, 'Watches', 'A watch is a small timepiece intended to be carried or worn by a person. It is designed to keep working despite the motions caused by the person''s activities.', 0, 1, 'watches', '2016-03-05 01:09:45', '2016-03-05 01:09:45'),
(10, 'Scanners', 'Scanners: Buy Scanners Online at Best Prices in India', 0, 1, 'scanner', '2016-03-05 01:13:44', '2016-03-05 01:13:44'),
(12, 'Printers', 'Printers: Buy Printers Online at Best Prices in India', 0, 1, 'printer', '2016-03-05 01:26:39', '2016-03-05 01:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'assa', 'sanketjadav@fmaila.com', 'sasasasa', '2016-02-29 02:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_02_29_074403_create_contacts_table', 1),
('2016_02_29_074601_create_users_table', 2),
('2014_10_12_100000_create_password_resets_table', 3),
('2016_02_29_094129_create_users_table', 4),
('2016_02_29_074403_create_contacts_table', 1),
('2016_02_29_074601_create_users_table', 2),
('2014_10_12_100000_create_password_resets_table', 3),
('2016_02_29_094129_create_users_table', 4),
('2016_03_02_123026_create_categories_table', 5),
('2016_03_04_054359_create_brands_table', 6),
('2016_03_04_060556_create_brands_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `access` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `access`) VALUES
(1, '', 'sanket', 'sanket.jadav@hmail.com', '$2y$10$oga5dYQ13qhtgzdZ9dbptuww6XkE4Sc9lK3yM712OD5sYdcyRp/vy', 1, 'l1CXp20HlP9ZL8fP7vqC1h08taq3bGZLAhGufYdc2ViOrDnB28jr6YKyVNPx', '2016-03-01 07:02:24', '2016-03-03 22:49:50', 1),
(3, '', 'admin', 'admin@yahoo.com', '$2y$10$Qbvlv8/m35l./OJAa8rbLe4Vm2260xQh5E1eOCZuodaCnKL1OjRhi', 1, 'svZncO479DkgNHzp2tKyHRwO7GzVlccNzRBgq4SG9YMr7uPP9n77WD12pVI7', '2016-03-01 07:33:30', '2016-03-03 06:50:59', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
