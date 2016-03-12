-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2016 at 09:51 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `status`, `category_list`, `logo`, `thumb`, `created_at`, `updated_at`) VALUES
(15, 'Cannon', 'Canon Inc. is a Japanese multinational corporation specialized in the manufacture of imaging and optical products, including cameras, camcorders, photocopiers, steppers, computer printers and medical equipment. Its headquarters are located in ?ta, Tokyo, Japan.\r\n\r\nCanon has a primary listing on the Tokyo Stock Exchange and is a constituent of the TOPIX index. It has a secondary listing on the New York Stock Exchange. At the beginning of 2015, Canon was the tenth largest public company in Japan when measured by market capitalization.', 1, '', 'Cannon.jpg', 'Cannon_thumb.jpg', '2016-03-08 23:11:17', '2016-03-08 23:11:17'),
(16, 'Lenovo', 'Lenovo Group Ltd. /l?n?o?vo?/ is a Chinese multinational computer technology company with headquarters in Beijing, China, and Morrisville, North Carolina, United States.', 1, '', 'Lenovo.png', 'Lenovo_thumb.png', '2016-03-08 23:14:14', '2016-03-08 23:14:14'),
(17, 'Dell', 'Dell Inc. is an American privately owned multinational computer technology company based in Round Rock, Texas, United States, that develops, sells, repairs, and supports computers and related products and services.', 1, '', 'Dell.png', 'Dell_thumb.png', '2016-03-08 23:16:01', '2016-03-08 23:16:01'),
(18, 'HTC', 'HTC Corporation, Full name:. It is a Taiwanese multinational manufacturer of smartphones and tablets headquartered in New Taipei City, Taiwan', 1, '', 'HTC.png', 'HTC_thumb.png', '2016-03-08 23:17:15', '2016-03-08 23:17:15'),
(19, 'Apple', 'Apple Inc. is an American multinational technology company headquartered in Cupertino, California, that designs, develops, and sells consumer electronics, computer software, and online services.', 1, '', 'Apple.png', 'Apple_thumb.png', '2016-03-08 23:18:01', '2016-03-08 23:18:01'),
(20, 'Motorola', 'Motorola, Inc. was a multinational telecommunications company based in Schaumburg, Illinois, United States.', 1, '', 'Motorola.png', 'Motorola_thumb.png', '2016-03-08 23:20:07', '2016-03-08 23:20:07'),
(21, 'Timex', 'Timex Group USA, Inc. is a subsidiary of the Dutch company Timex Group B.V., and its US headquarters, is based in Middlebury, Connecticut.', 1, '', 'Timex.png', 'Timex_thumb.png', '2016-03-08 23:20:52', '2016-03-08 23:20:52'),
(22, 'Samsung', 'Samsung (Hangul: 삼성; hanja: 三星; Korean pronunciation: [sʰamsʰʌŋ]) is a South Korean multinational conglomerate company[citation needed] headquartered in Samsung Town, Seoul. It comprises numerous subsidiaries[citation needed] and affiliated businesses, most of them united under the Samsung brand, and is the largest South Korean chaebol (business conglomerate).\r\n\r\nSamsung was founded by Lee Byung-chul in 1938 as a trading company. Over the next three decades, the group diversified into areas including food processing, textiles, insurance, securities and retail. Samsung entered the electronics industry in the late 1960s and the construction and shipbuilding industries in the mid-1970s; these areas would drive its subsequent growth. Following Lee''s death in 1987, Samsung was separated into four business groups – Samsung Group, Shinsegae Group, CJ Group and Hansol Group. Since 1990s, Samsung has increasingly globalized its activities and electronics, particularly mobile phones and semiconductors, have become its most important source of income.\r\n\r\nNotable Samsung industrial subsidiaries[citation needed] include Samsung Electronics (the world''s largest information technology company measured by 2012 revenues, and 4th in market value),[2] Samsung Heavy Industries (the world''s 2nd-largest shipbuilder measured by 2010 revenues),[3] and Samsung Engineering and Samsung C&T (respectively the world''s 13th and 36th-largest construction companies).[4] Other notable subsidiaries include Samsung Life Insurance (the world''s 14th-largest life insurance company),[5] Samsung Everland (operator of Everland Resort, the oldest theme park in South Korea)[6] and Cheil Worldwide (the world''s 15th-largest advertising agency measured by 2012 revenues).[7][8]\r\n\r\nSamsung has a powerful influence on South Korea''s economic development, politics, media and culture and has been a major driving force behind the "Miracle on the Han River".[9][10] Its affiliate companies produce around a fifth of South Korea''s total exports.[11] Samsung''s revenue was equal to 17% of South Korea''s $1,082 billion GDP.[12]', 1, '', 'Samsung.png', 'Samsung_thumb.png', '2016-03-08 23:22:37', '2016-03-08 23:22:37'),
(23, 'Nikon', 'Nikon Corporation (株式会社ニコン Kabushiki-gaisha Nikon?) (UK /ˈnɪkɒn/ or US /ˈnaɪkɒn/; About this sound listen (help·info)[nikoɴ]), also known just as Nikon, is a Japanese multinational corporation headquartered in Tokyo, Japan, specializing in optics and imaging products.\r\n\r\nIts products include cameras, camera lenses, binoculars, microscopes, ophthalmic lenses, measurement instruments, and the steppers used in the photolithography steps of semiconductor fabrication, of which it is the world''s second largest manufacturer.[2] The companies held by Nikon form the Nikon Group.[3] Among its products are Nikkor imaging lenses (for F-mount cameras, large format photography, photographic enlargers, and other applications), the Nikon F-series of 35 mm film SLR cameras, the Nikon D-series of digital SLR cameras, the Coolpix series of compact digital cameras, and the Nikonos series of underwater film cameras. Nikon''s main competitors in camera and lens manufacturing include Canon, Sony, Fujifilm, Lumix, Pentax, and Olympus.\r\n\r\nFounded on July 25, 1917 as Nippon Kōgaku Kōgyō Kabushikigaisha (日本光学工業株式会社 "Japan Optical Industries Co., Ltd."), the company was renamed Nikon Corporation, after its cameras, in 1988. Nikon is one of the subsidiaries of Mitsubishi.[4]', 1, '', 'Nikon.png', 'Nikon_thumb.png', '2016-03-09 07:02:29', '2016-03-09 07:02:29'),
(24, 'Hewlett-Packard (HP)', 'The Hewlett-Packard Company (commonly referred to as HP) was an American global information technology company headquartered in Palo Alto, California. It developed and provided a wide variety of hardware components as well as software and related services to consumers, small- and medium-sized businesses (SMBs) and large enterprises, including customers in the government, health and education sectors.\r\n\r\nThe company was founded in a one-car garage in Palo Alto by William "Bill" Redington Hewlett and David "Dave" Packard starting with a line of electronic test equipment. HP was the world''s leading PC manufacturer from 2007 to Q2 2013, after which Lenovo remained ranked ahead of HP.[2][3][4] It specialized in developing and manufacturing computing, data storage, and networking hardware, designing software and delivering services. Major product lines included personal computing devices, enterprise and industry standard servers, related storage devices, networking products, software and a diverse range of printers and other imaging products. HP marketed its products to households, small- to medium-sized businesses and enterprises directly as well as via online distribution, consumer-electronics and office-supply retailers, software partners and major technology vendors. HP also had services and consulting business around its products and partner products.\r\n\r\nHewlett-Packard company events included the spin-off of its electronic and bio-analytical measurement instruments part of its business as Agilent Technologies in 1999, its merger with Compaq in 2002, and the acquisition of EDS in 2008, which led to combined revenues of $118.4 billion in 2008 and a Fortune 500 ranking of 9 in 2009. In November 2009, HP announced the acquisition of 3Com,[5] with the deal closing on April 12, 2010.[6] On April 28, 2010, HP announced the buyout of Palm, Inc. for $1.2 billion.[7] On September 2, 2010, HP won its bidding war for 3PAR with a $33 a share offer ($2.07 billion), which Dell declined to match.[8]\r\n\r\nOn October 6, 2014, Hewlett-Packard announced plans to split the PC and printers business from its enterprise products and services business. The split closed on November 1, 2015 and resulted in two publicly traded companies: HP Inc. and Hewlett Packard Enterprise.[9]', 1, '', 'Hewlett-Packard (HP).png', 'Hewlett-Packard (HP)_thumb.png', '2016-03-09 07:09:20', '2016-03-09 07:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `brand_category`
--

CREATE TABLE IF NOT EXISTS `brand_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_category_brand_id_foreign` (`brand_id`),
  KEY `brand_category_category_id_foreign` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `brand_category`
--

INSERT INTO `brand_category` (`id`, `brand_id`, `category_id`) VALUES
(1, 15, 1),
(2, 15, 10),
(3, 15, 12),
(4, 16, 2),
(5, 16, 4),
(6, 16, 7),
(7, 16, 13),
(8, 16, 15),
(9, 17, 2),
(10, 17, 4),
(11, 17, 6),
(12, 17, 7),
(13, 17, 13),
(14, 17, 15),
(15, 18, 4),
(16, 18, 6),
(17, 18, 7),
(18, 18, 13),
(19, 19, 2),
(20, 19, 4),
(21, 19, 6),
(22, 19, 7),
(23, 19, 15),
(24, 20, 4),
(25, 20, 6),
(26, 20, 7),
(27, 20, 13),
(28, 21, 9),
(29, 22, 1),
(30, 22, 4),
(31, 22, 6),
(32, 22, 7),
(33, 22, 15),
(34, 23, 1),
(35, 24, 2),
(36, 24, 4),
(37, 24, 10),
(38, 24, 12),
(39, 24, 15);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`, `status`, `urlname`, `created_at`, `updated_at`) VALUES
(1, 'Cameras', 'Demo', 0, 1, 'camera', '2016-03-03 06:51:36', '2016-03-09 23:44:49'),
(2, 'Computers & Peripherals', 'Laptop computers, also known as notebooks, are portable computers that you can take with you and use in different environments. They include a screen, keyboard, and a trackpad or trackball, which serves as the mouse. Because laptops are meant to be used on the go, they have a battery which allows them to operate without being plugged into a power outlet. Laptops also include a power adapter that allows them to use power from an outlet and recharges the battery.\r\n\r\nWhile portable computers used to be significantly slower and less capable than desktop computers, advances in manufacturing technology have enabled laptops to perform nearly as well as their desktop counterparts. In fact, high-end laptops often perform better than low or even mid-range desktop systems. Most laptops also include several I/O ports, such as USB ports, that allow standard keyboards and mice to be used with the laptop. Modern laptops often include a wireless networking adapter as well, allowing users to access the Internet without requiring any wires.\r\n\r\nWhile laptops can be powerful and convenient, the convenience often comes at a price. Most laptops cost several hundred dollars more than a similarly equipped desktop model with a monitor, keyboard, and mouse. Furthermore, working long hours on a laptop with a small screen and keyboard may be more fatiguing than working on a desktop system. Therefore, if portability is not a requirement for your computer, you may find better value in a desktop model.', 0, 1, 'computer-peripheral', '2016-03-03 06:54:01', '2016-03-10 00:00:57'),
(3, 'Fashion And Beauty', 'Fashion accessories are decorative items that supplement one''s garment, such as jewelry, gloves, handbags, hats, belts, scarves, watches, sunglasses, pins, stockings, bow ties, leg warmers, leggings, neckties, suspenders, and tights.\r\n\r\nFashion accessories add color, style and class to an outfit, and create a certain look, but they may also have practical functions. Handbags are for carrying small necessary items, hats protect the face from weather elements, Laptops provide mobile connectivity and are used to increase work power and gloves keep the hands warm.\r\n\r\nMany fashion accessories are produced by clothing design companies. However, there has been an increase in individuals creating their own brand name by designing and making their own label of accessories.\r\n\r\nFashion accessories can be visual symbols of religious affiliation: Crucifixes, Jewish stars, Islamic headscarves, skullcaps and turbans are common examples. Designer labels on accessories are perceived as an indicator of social status.\r\n\r\nFashion accessories are also available in the form of bracelets, necklaces, earrings, and shoelace accessories.', 0, 1, 'fashion-beauty', '2016-03-03 06:55:10', '2016-03-03 06:55:10'),
(4, 'Mobiles & Accessories', 'Demo 2', 0, 1, 'mobile-and-accessories', '2016-03-03 06:58:03', '2016-03-10 00:01:04'),
(5, 'Movies, Music & Games', 'Shop for gaming, movies and music at Best Buy. Choose from a selection of games, gaming consoles, CDs, DVDs, Blu-ray Discs, and musical instruments at Best Buy.', 0, 1, 'entertainment', '2016-03-03 06:58:31', '2016-03-03 06:58:31'),
(6, 'Mobile', 'A mobile phone is a telephone that can make and receive calls over a radio frequency carrier while the user is moving within a telephone service area.', 4, 1, 'mobiles', '2016-03-03 07:45:30', '2016-03-03 07:45:30'),
(7, 'Mobile Accessories', 'Demo', 4, 1, 'mobile-accessory', '2016-03-03 22:55:35', '2016-03-04 00:00:16'),
(8, 'Movies & TV', 'Online shopping from a great selection at Movies & TV Store.', 5, 1, 'movies-tv', '2016-03-03 22:57:09', '2016-03-03 23:59:53'),
(9, 'Watches', 'A watch is a small timepiece intended to be carried or worn by a person. It is designed to keep working despite the motions caused by the person''s activities.', 3, 1, 'watches', '2016-03-05 01:09:45', '2016-03-07 01:06:44'),
(10, 'Scanners', 'Scanners: Buy Scanners Online at Best Prices in India', 2, 1, 'scanner', '2016-03-05 01:13:44', '2016-03-07 01:05:56'),
(12, 'Printers', 'Printers: Buy Printers Online at Best Prices in India', 2, 1, 'printer', '2016-03-05 01:26:39', '2016-03-07 01:06:08'),
(13, 'Cases & Covers', 'Buy Cases and Covers for Mobile phones online at Line.com. Select from the wide range of Mobile Cases and Covers for Any Mobile.', 4, 1, 'mobile-cases-covers', '2016-03-07 00:42:33', '2016-03-07 01:06:17'),
(14, 'Clothes', 'Clothing (also called clothes) is fiber and textile material worn on the body. The wearing of clothing is mostly restricted to human beings and is a feature of nearly all human societies. The amount and type of clothing worn depends on physical, social and geographic considerations. Some clothing types can be gender specific.\r\n\r\nPhysically, clothing serves many purposes: it can serve as protection from the elements, and can enhance safety during hazardous activities such as hiking and cooking. It protects the wearer from rough surfaces, rash-causing plants, insect bites, splinters, thorns and prickles by providing a barrier between the skin and the environment. Clothes can insulate against cold or hot conditions. Further, they can provide a hygienic barrier, keeping infectious and toxic materials away from the body. Clothing also provides protection from harmful UV radiation.', 3, 1, 'clothes', '2016-03-07 00:43:02', '2016-03-10 00:00:52'),
(15, 'Laptop', 'A laptop, often called a notebook, is a portable personal computer with a clamshell form factor, suitable for mobile use.[1] Although originally there was a distinction between laptops and notebooks, the former being bigger and heavier than the latter, as of 2014, there is often no longer any difference.[2] Laptops are commonly used in a variety of settings, such as at work, in education, and for personal multimedia.\r\n\r\nA laptop combines the components, inputs, outputs and capabilities of a desktop computer, including the display screen, speakers, a keyboard, and pointing devices (such as a touchpad or trackpad) into a single unit. Most 2016-era laptops also have integrated webcams and built-in microphones. The device can be powered either from a rechargeable battery or by mains electricity from an AC adapter. Laptops are diverse devices and specialised kinds, such as rugged notebooks for use in construction or convertible computers, have been optimized for specific uses. The hardware specifications, such as the processor speed and memory capacity significantly vary between different types, makes, and models.\r\n\r\nPortable computers, which later developed into modern laptops, were originally considered to be a small niche market, mostly for specialized field applications, such as in the military, for accountancy, or for sales representatives. As portable computers became closer to the modern laptop, they became widely used for a variety of purposes.', 2, 1, 'laptops', '2016-03-07 00:45:42', '2016-03-07 01:05:37');

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
('2016_03_04_060556_create_brands_table', 7),
('2016_03_05_072023_create_products_table', 8),
('2016_03_05_100955_create_products_table', 9),
('2016_03_08_125233_create_brand_category_table', 10),
('2016_03_09_061251_create_brand_category_table', 11);

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
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `brand_id`, `image`, `thumb`, `model`, `stock`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'iPhone 6', 'iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a name or number in your address book, a favorites list, or a call log. It also automatically syncs all your contacts from a PC, Mac, or Internet service. And it lets you select and listen to voicemail messages in whatever order you want just like email.', 6, 19, '1457179308.jpg', '1457179308_thumb.jpg', 'iPhone 6', 25, 35000, 1, '2016-03-05 06:31:48', '2016-03-09 23:59:28'),
(2, 'The Martian', 'After an exploratory mission goes awry, lone astronaut Mark Watney (Matt Damon) is left for dead on the hostile surface of Mars and must use his scientific ingenuity to homestead an enclosed habitat where he can survive. Meanwhile, the astronauts he left behind realize the severity of his plight and join forces with an international coalition of scientists to launch a rescue mission in defiance of NASA protocol.', 8, 0, '1457330583.jpeg', '1457330583_thumb.jpeg', 'The Martian', 50, 600, 1, '2016-03-07 00:33:03', '2016-03-07 00:33:03'),
(3, 'HTC Desire 626G Plus', 'Android v4.4.4 (KitKat) OS\r\n    13 MP Primary Camera\r\n    5 MP Secondary Camera\r\n    Dual Sim (GSM + UMTS)\r\n    5 inch Capacitive Touchscreen\r\n    1.7 GHz Cortex-A53 Octa Core Processor\r\n    Wi-Fi Enabled\r\n    FM Radio\r\n    Expandable Storage Capacity of 32 GB', 6, 18, '1457330822.jpeg', '1457330822_thumb.jpeg', 'HTC Desire 626G Plus', 12, 12450, 1, '2016-03-07 00:37:02', '2016-03-09 23:58:22'),
(4, 'MF13 Expedition Watch', 'Round Dial\r\n    Chronograph Function\r\n    Water Resistant\r\n    Brown Strap\r\n    Fiber Case\r\n    Buckle Clasp', 9, 21, '1457331082.jpeg', '1457331082_thumb.jpeg', 'MF13', 25, 2499, 1, '2016-03-07 00:41:22', '2016-03-09 06:28:19'),
(5, 'Lenovo G50-80', '1.9 GHz Intel Core i3-4005U 4th Gen Processor\r\n    4GB RAM\r\n    1TB Hard Drive\r\n    15.6-inch Display\r\n    Windows 8.1 Operating System (Free Upgrade to Windows 10)\r\n    Intel HD Graphcis 4400', 15, 16, '1457334224.jpg', '1457334224_thumb.jpg', '80L000HSIN', 10, 32999, 1, '2016-03-07 01:33:44', '2016-03-09 23:59:41'),
(6, 'Nikon D3200 24.2 MP Digital SLR Camera ', 'Nikon D3200 24.2 MP Digital SLR Camera (Black) with AF-S 18-55mm VR II Kit Lens, 8GB Memory Card, DSLR Camera Bag\r\n24.2 effective megapixels Nikon-developed DX-format CMOS image sensor\r\nImage-processing engine EXPEED 3\r\nWide ISO sensitivity range at standard setting\r\nScreen size of 3-inch eye-level pentamirror single-lens reflex viewfinder\r\nHigh-performance noise-reduction function\r\nEN-EL14 rechargeable Li-ion battery (with terminal cover)\r\nComes with MH-24 battery charger, AN-DC3 strap, EG-CP14 audio/video cable, UC-E17 USB cable, DK-5 eyepiece cap, BS-1 accessory shoe cover, DK-20 rubber eyecup and BF-1B body cap', 1, 23, '1457526848.jpg', '1457526848_thumb.jpg', 'Nikon D3200', 20, 19490, 1, '2016-03-09 07:04:08', '2016-03-09 07:04:08'),
(7, 'Canon EOS 1200D 18MP Digital SLR Camera ', 'Canon EOS 1200D 18MP Digital SLR Camera (Black) with 18-55mm and 55-250mm IS II Lens,8GB card and Carry Bag\r\n18 megapixel CMOS (APS-C) image sensor\r\nHigh-performance DIGIC 4 image processor\r\nISO 100-6400 (expandable to H: 12800) to shoot from bright to dim light\r\nEOS full HD movie mode to capture brilliant results\r\nScene intelligent auto mode to deliver expertly optimized photos\r\n9-point AF system (including one center cross-type AF point) and AI servo\r\nEOS 1200D digital SLR body\r\n1 rechargeable lithium-ion LP-E10 battery\r\nBattery charger LP-E10\r\n18-55mm and 55-250mm IS lens\r\nAccessories include 8GB card and camera bag\r\nInterface cable, EOS digital solution disk\r\nCamera instruction manual CD and booklet, software instruction manual CD\r\n2 years Canon India warranty', 1, 15, '1457526975.jpg', '1457526975_thumb.jpg', 'EOS 1200D', 15, 23990, 1, '2016-03-09 07:06:15', '2016-03-09 07:06:15'),
(8, 'HP Notebook 15-ac118tu 15.6 inch Laptop', 'HP Notebook 15-ac118tu 15.6 inch Laptop (Intel Pentium N3825U/4GB/500GB/Intel HD Graphics/DOS)\r\nBrand	HP\r\nSeries	15-ac118tu\r\nColour	Silver\r\nScreen Size	15.6 Inches\r\nItem Weight	3 Kg\r\nProduct Dimensions	50.8 x 30.6 x 7.4 cm\r\nItem model number	15-ac118tu\r\nProcessor Brand	Intel\r\nProcessor Type	Pentium\r\nProcessor Speed	1.9 GHz\r\nRAM Size	4 GB\r\nMemory Technology	DDR3L\r\nHard Drive Size	500 GB\r\nHard Disk Technology	Mechanical Hard Drive\r\nSpeaker Description	DTS Studio Sound with 2 speakers\r\nGraphics Coprocessor	Intel Integrated Graphics\r\nConnectivity Type	Wifi\r\nNumber of USB 2.0 Ports	2\r\nNumber of USB 3.0 Ports	1\r\nNumber of HDMI Ports	1\r\nOperating System	DOS\r\nBattery Description	4 Cell, 41WHr\r\nAverage Battery Life (in hours)	5', 15, 16, '1457527250.jpg', '1457527250_thumb.jpg', 'Notebook 15-ac118tu', 15, 18999, 1, '2016-03-09 07:10:50', '2016-03-09 07:10:50'),
(9, 'Samsung Galaxy On7', 'Android v5.1 (Lollipop) OS\r\n13 MP Primary Camera\r\n5 MP Secondary Camera\r\nDual Sim (LTE + LTE)\r\n5.5 inch Capacitive Touchscreen\r\n1.2 GHz Qualcomm Snapdragon 410 Quad Core Processor\r\nWi-Fi Enabled\r\nExpandable Storage Capacity of 128 GB', 6, 22, '1457527544.jpeg', '1457527544_thumb.jpeg', 'Galaxy On7', 15, 10190, 1, '2016-03-09 07:15:44', '2016-03-09 07:15:44'),
(10, 'Compact flatbed scanner', 'Flatbed scanner\r\nScan resolution: 2400 x 4800dpi\r\nScan speed (A4, 300dpi): approx. \r\n16secs.\r\nSEND to cloud* function\r\nScanner Type  Flatbed\r\nScanning Method  CIS (Contact Image Sensor)\r\nLight Source  3-colour (RGB) LED\r\nOptical Resolution*1  2400 x 4800dpi\r\nSelectable Resolution*2  25 - 19200dpi\r\nScanning Bit Depth   \r\nGrayscale  16-bit input\r\n8-bit output\r\nColour  48-bit input (16-bit for each color)\r\n48 or 24-bit output (16-bit or 8-bit for each color)\r\nPreview Speed*3  Approx. 14secs.\r\nScanning Speed*4  Colour A4 300dpi  Approx. 16secs.', 10, 15, '1457528093.png', '1457528093_thumb.png', 'LiDE 120', 25, 4500, 1, '2016-03-09 07:24:53', '2016-03-09 07:24:53'),
(11, 'Motorola Flip Cover for Moto G (3rd Gen)', 'Plastic Material\r\n    360 Degree Protection\r\n    Protects from Scratches and Cracks\r\n    Magnetic Clasp\r\n    Access to all Controls and Buttons\r\n    Cutout Window', 13, 20, '1457528153.jpeg', '1457528153_thumb.jpeg', 'Moto G 3', 20, 999, 1, '2016-03-09 07:25:53', '2016-03-09 07:25:53');

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
(1, '', 'sanket', 'sanket.jadav@hmail.com', '$2y$10$oga5dYQ13qhtgzdZ9dbptuww6XkE4Sc9lK3yM712OD5sYdcyRp/vy', 1, 'bvGcXhijS110dPbQRXVSNsLjTvbJnNl8BDD1v2ekez3lsyEf5f0zXsuMvHva', '2016-03-01 07:02:24', '2016-03-11 03:57:50', 1),
(3, '', 'admin', 'admin@yahoo.com', '$2y$10$Qbvlv8/m35l./OJAa8rbLe4Vm2260xQh5E1eOCZuodaCnKL1OjRhi', 1, 'FfXss9shgdH0qN4gMCoOLXAk72q8QJtY1ObMwOGVbKF15iWoFDhYUYkXr4EC', '2016-03-01 07:33:30', '2016-03-11 03:48:54', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand_category`
--
ALTER TABLE `brand_category`
  ADD CONSTRAINT `brand_category_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `brand_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
