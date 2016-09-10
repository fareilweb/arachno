-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2016 at 07:40 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arachno`
--

-- --------------------------------------------------------

--
-- Table structure for table `acms_coupons`
--

CREATE TABLE `acms_coupons` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(80) DEFAULT NULL,
  `coupon_start_date` date DEFAULT NULL,
  `coupon_end_date` date DEFAULT NULL,
  `coupon_value_type` varchar(10) DEFAULT NULL,
  `coupon_value_amount` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acms_coupons_has_items`
--

CREATE TABLE `acms_coupons_has_items` (
  `fk_coupon_id` int(11) NOT NULL,
  `fk_item_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acms_items_has_categories`
--

CREATE TABLE `acms_items_has_categories` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acms_items_has_categories`
--

INSERT INTO `acms_items_has_categories` (`item_id`, `category_id`) VALUES
(3, 4),
(49, 8),
(49, 9),
(49, 10),
(49, 11),
(49, 12),
(49, 13),
(49, 14),
(49, 15),
(50, 10),
(50, 24),
(51, 10),
(51, 24),
(52, 10),
(52, 24),
(53, 10),
(53, 24),
(54, 10),
(54, 24),
(55, 10),
(55, 24),
(56, 10),
(56, 24),
(57, 11),
(57, 18),
(58, 11),
(58, 18),
(59, 11),
(59, 18),
(60, 13),
(60, 25),
(61, 13),
(61, 25),
(62, 13),
(62, 25),
(63, 13),
(63, 25),
(64, 13),
(64, 25),
(65, 13),
(65, 25),
(66, 13),
(66, 25),
(67, 13),
(67, 25),
(68, 13),
(68, 25),
(69, 13),
(69, 25),
(70, 13),
(70, 25),
(71, 12),
(71, 19),
(72, 12),
(72, 19),
(73, 12),
(73, 19),
(74, 12),
(74, 19),
(75, 13),
(75, 25),
(76, 13),
(76, 25),
(77, 11),
(77, 18),
(78, 11),
(78, 18),
(79, 11),
(79, 18),
(80, 11),
(80, 18),
(81, 11),
(81, 18),
(82, 11),
(82, 18),
(83, 12),
(83, 19);

-- --------------------------------------------------------

--
-- Table structure for table `acms_languages`
--

CREATE TABLE `acms_languages` (
  `lang_id` int(11) NOT NULL,
  `lang_iso_code` varchar(4) DEFAULT NULL,
  `lang_internal_code` varchar(8) DEFAULT NULL,
  `lang_name` varchar(80) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acms_languages`
--

INSERT INTO `acms_languages` (`lang_id`, `lang_iso_code`, `lang_internal_code`, `lang_name`) VALUES
(1, 'it', 'it-IT', 'Italiano'),
(2, 'en', 'en-GB', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `acms_menus`
--

CREATE TABLE `acms_menus` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fk_lang_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acms_menus`
--

INSERT INTO `acms_menus` (`menu_id`, `menu_title`, `fk_lang_id`) VALUES
(1, 'Menu Principale', 1);

-- --------------------------------------------------------

--
-- Table structure for table `acms_menus_links`
--

CREATE TABLE `acms_menus_links` (
  `link_id` int(11) NOT NULL,
  `fk_menu_id` int(11) NOT NULL,
  `link_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link_rel_uri` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `link_abs_uri` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fk_lang_id` int(11) NOT NULL,
  `ordering` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acms_menus_links`
--

INSERT INTO `acms_menus_links` (`link_id`, `fk_menu_id`, `link_title`, `link_rel_uri`, `link_abs_uri`, `fk_lang_id`, `ordering`) VALUES
(1, 1, 'Home', '/', 'NULL', 1, 1),
(2, 1, 'Test Page', '/test-page', 'NULL', 1, 2),
(3, 1, 'Shop', '/Shop/home', 'NULL', 1, 3),
(7, 1, 'Carrello', '/Shop/cart', 'NULL', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `acms_pages`
--

CREATE TABLE `acms_pages` (
  `page_id` int(11) NOT NULL,
  `page_slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fk_author_user_id` int(11) NOT NULL,
  `page_title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `page_content` text CHARACTER SET utf8,
  `page_meta_description` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `page_meta_keywords` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `fk_lang_id(11)` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acms_pages`
--

INSERT INTO `acms_pages` (`page_id`, `page_slug`, `fk_author_user_id`, `page_title`, `page_content`, `page_meta_description`, `page_meta_keywords`, `fk_lang_id(11)`) VALUES
(1, 'home', 1, 'Home Page', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget ipsum sit amet mauris fringilla hendrerit. Mauris convallis luctus convallis. Nam convallis felis in arcu porta rutrum. Maecenas consequat elementum tellus, eu volutpat ante elementum ac. Integer vestibulum justo a quam fermentum, id maximus erat lacinia. Morbi convallis, nisi id vehicula faucibus, diam lorem commodo elit, vel feugiat tellus urna in est. Sed sit amet euismod felis, a lobortis sem. Curabitur vel erat velit. Ut dolor nisi, dapibus nec massa eget, pulvinar aliquet mi.  Aliquam tincidunt id dolor in tristique. Sed posuere et mauris in auctor. Pellentesque nulla est, bibendum egestas mauris egestas, aliquam hendrerit felis. Etiam maximus porttitor neque, eu cursus velit tempus fringilla. Morbi ultricies enim non ipsum cursus, et mattis diam suscipit. Aenean in auctor leo. Nulla gravida tempor dolor ac condimentum. Aliquam erat volutpat. Mauris odio augue, fringilla sit amet aliquet sed, rutrum non mauris.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum, dolor sit amet, consectetur, adipiscing', 1),
(2, 'test-page', 1, 'Test Page Title', 'Test Page - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget ipsum sit amet mauris fringilla hendrerit. Mauris convallis luctus convallis. Nam convallis felis in arcu porta rutrum. Maecenas consequat elementum tellus, eu volutpat ante elementum ac. Integer vestibulum justo a quam fermentum, id maximus erat lacinia. Morbi convallis, nisi id vehicula faucibus, diam lorem commodo elit, vel feugiat tellus urna in est. Sed sit amet euismod felis, a lobortis sem. Curabitur vel erat velit. Ut dolor nisi, dapibus nec massa eget, pulvinar aliquet mi. Aliquam tincidunt id dolor in tristique. Sed posuere et mauris in auctor. Pellentesque nulla est, bibendum egestas mauris egestas, aliquam hendrerit felis. Etiam maximus porttitor neque, eu cursus velit tempus fringilla. Morbi ultricies enim non ipsum cursus, et mattis diam suscipit. Aenean in auctor leo. Nulla gravida tempor dolor ac condimentum. Aliquam erat volutpat. Mauris odio augue, fringilla sit amet aliquet sed, rutrum non mauris.', 'Test Page - Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 'Test Page, Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `acms_payments`
--

CREATE TABLE `acms_payments` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(80) NOT NULL,
  `payment_slug` varchar(80) DEFAULT NULL,
  `payment_cost` float DEFAULT NULL,
  `payment_details` text,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acms_payments`
--

INSERT INTO `acms_payments` (`payment_id`, `payment_name`, `payment_slug`, `payment_cost`, `payment_details`, `payment_status`) VALUES
(1, 'PayPal', 'paypal', 3, 'Nessuno Dettaglio', 1),
(2, 'PostePay', 'postepay', 1, 'Nessuno Dettaglio', 1),
(3, 'Bonifico', 'bank', 0, 'Nessuno Dettaglio', 1);

-- --------------------------------------------------------

--
-- Table structure for table `acms_payments_has_items`
--

CREATE TABLE `acms_payments_has_items` (
  `fk_payment_id` int(11) NOT NULL,
  `fk_item_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acms_sales`
--

CREATE TABLE `acms_sales` (
  `sale_id` int(11) NOT NULL,
  `sale_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sale_cart_json` text NOT NULL,
  `sale_total` decimal(10,0) NOT NULL DEFAULT '0',
  `payment_status` tinyint(1) DEFAULT '0',
  `shipping_status` tinyint(1) DEFAULT '0',
  `fk_user_id` int(11) NOT NULL,
  `fk_payment_id` int(11) NOT NULL,
  `fk_shipping_id` int(11) NOT NULL,
  `shipping_address` varchar(500) DEFAULT NULL,
  `shipping_zip` varchar(12) DEFAULT NULL,
  `shipping_city` varchar(300) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acms_sales`
--

INSERT INTO `acms_sales` (`sale_id`, `sale_timestamp`, `sale_cart_json`, `sale_total`, `payment_status`, `shipping_status`, `fk_user_id`, `fk_payment_id`, `fk_shipping_id`, `shipping_address`, `shipping_zip`, `shipping_city`, `shipping_state`) VALUES
(32, '2016-09-07 18:47:27', '{"items":[{"item_id":"49","item_code":"051212001","item_categories":{"8":"on","9":"on","10":"on","11":"on","12":"on","13":"on","14":"on","15":"on"},"item_status":"1","item_stock":"5","item_price":"95","item_title":"NADALu00ae - Calprotectina - 10 test","item_weight":"","item_colors":"","item_short_desc":"Test qualitativo in cassetta per la determinazione della calprotectina nelle feci","item_long_desc":"","item_meta_keywords":"","item_meta_description":"","fk_lang_id":"1","item_images":[{"image_id":"81","image_src":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_24_Sunday_11_29_27___heart-4.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"86","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"89","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-2.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-2.png","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"90","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-3.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-3.png","image_title":"","image_alt":"","is_main":"1","fk_item_id":"49"}],"quantity":"2"}],"shipping_id":"4","payment_id":"1"}', '190', 0, 0, 43, 1, 4, NULL, NULL, NULL, NULL),
(33, '2016-09-07 18:48:17', '{"items":[{"item_id":"49","item_code":"051212001","item_categories":{"8":"on","9":"on","10":"on","11":"on","12":"on","13":"on","14":"on","15":"on"},"item_status":"1","item_stock":"5","item_price":"95","item_title":"NADALu00ae - Calprotectina - 10 test","item_weight":"","item_colors":"","item_short_desc":"Test qualitativo in cassetta per la determinazione della calprotectina nelle feci","item_long_desc":"","item_meta_keywords":"","item_meta_description":"","fk_lang_id":"1","item_images":[{"image_id":"81","image_src":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_24_Sunday_11_29_27___heart-4.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"86","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"89","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-2.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-2.png","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"90","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-3.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-3.png","image_title":"","image_alt":"","is_main":"1","fk_item_id":"49"}],"quantity":"2"}],"shipping_id":"4","payment_id":"1"}', '190', 0, 0, 43, 1, 4, NULL, NULL, NULL, NULL),
(34, '2016-09-07 18:48:29', '{"items":[{"item_id":"49","item_code":"051212001","item_categories":{"8":"on","9":"on","10":"on","11":"on","12":"on","13":"on","14":"on","15":"on"},"item_status":"1","item_stock":"5","item_price":"95","item_title":"NADALu00ae - Calprotectina - 10 test","item_weight":"","item_colors":"","item_short_desc":"Test qualitativo in cassetta per la determinazione della calprotectina nelle feci","item_long_desc":"","item_meta_keywords":"","item_meta_description":"","fk_lang_id":"1","item_images":[{"image_id":"81","image_src":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_24_Sunday_11_29_27___heart-4.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"86","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"89","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-2.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-2.png","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"90","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-3.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-3.png","image_title":"","image_alt":"","is_main":"1","fk_item_id":"49"}],"quantity":"2"}],"shipping_id":"4","payment_id":"1"}', '190', 0, 0, 43, 1, 4, NULL, NULL, NULL, NULL),
(35, '2016-09-07 18:48:59', '{"items":[{"item_id":"49","item_code":"051212001","item_categories":{"8":"on","9":"on","10":"on","11":"on","12":"on","13":"on","14":"on","15":"on"},"item_status":"1","item_stock":"5","item_price":"95","item_title":"NADALu00ae - Calprotectina - 10 test","item_weight":"","item_colors":"","item_short_desc":"Test qualitativo in cassetta per la determinazione della calprotectina nelle feci","item_long_desc":"","item_meta_keywords":"","item_meta_description":"","fk_lang_id":"1","item_images":[{"image_id":"81","image_src":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_24_Sunday_11_29_27___heart-4.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"86","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"89","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-2.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-2.png","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"90","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-3.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-3.png","image_title":"","image_alt":"","is_main":"1","fk_item_id":"49"}],"quantity":"2"}],"shipping_id":"4","payment_id":"1"}', '190', 0, 0, 43, 1, 4, NULL, NULL, NULL, NULL),
(36, '2016-09-07 18:49:23', '{"items":[{"item_id":"49","item_code":"051212001","item_categories":{"8":"on","9":"on","10":"on","11":"on","12":"on","13":"on","14":"on","15":"on"},"item_status":"1","item_stock":"5","item_price":"95","item_title":"NADALu00ae - Calprotectina - 10 test","item_weight":"","item_colors":"","item_short_desc":"Test qualitativo in cassetta per la determinazione della calprotectina nelle feci","item_long_desc":"","item_meta_keywords":"","item_meta_description":"","fk_lang_id":"1","item_images":[{"image_id":"81","image_src":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_24_Sunday_11_29_27___heart-4.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"86","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"89","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-2.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-2.png","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"90","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-3.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-3.png","image_title":"","image_alt":"","is_main":"1","fk_item_id":"49"}],"quantity":"2"}],"shipping_id":"4","payment_id":"1"}', '190', 0, 0, 43, 1, 4, NULL, NULL, NULL, NULL),
(37, '2016-09-08 19:55:01', '{"items":[{"item_id":"49","item_code":"051212001","item_categories":{"8":"on","9":"on","10":"on","11":"on","12":"on","13":"on","14":"on","15":"on"},"item_status":"1","item_stock":"5","item_price":"95","item_title":"NADALu00ae - Calprotectina - 10 test","item_weight":"","item_colors":"","item_short_desc":"Test qualitativo in cassetta per la determinazione della calprotectina nelle feci","item_long_desc":"","item_meta_keywords":"","item_meta_description":"","fk_lang_id":"1","item_images":[{"image_id":"81","image_src":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_24_Sunday_11_29_27___heart-4.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"86","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"89","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-2.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-2.png","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"90","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-3.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-3.png","image_title":"","image_alt":"","is_main":"1","fk_item_id":"49"}],"quantity":1}],"shipping_id":"4","payment_id":"1"}', '95', 0, 0, 44, 1, 4, NULL, NULL, NULL, NULL),
(38, '2016-09-08 19:57:31', '{"items":[{"item_id":"49","item_code":"051212001","item_categories":{"8":"on","9":"on","10":"on","11":"on","12":"on","13":"on","14":"on","15":"on"},"item_status":"1","item_stock":"5","item_price":"95","item_title":"NADALu00ae - Calprotectina - 10 test","item_weight":"","item_colors":"","item_short_desc":"Test qualitativo in cassetta per la determinazione della calprotectina nelle feci","item_long_desc":"","item_meta_keywords":"","item_meta_description":"","fk_lang_id":"1","item_images":[{"image_id":"81","image_src":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_24_Sunday_11_29_27___heart-4.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"86","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"89","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-2.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-2.png","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"90","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-3.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-3.png","image_title":"","image_alt":"","is_main":"1","fk_item_id":"49"}],"quantity":1}],"shipping_id":"4","payment_id":"1"}', '95', 0, 0, 44, 1, 4, NULL, NULL, NULL, NULL),
(39, '2016-09-10 16:20:22', '{"items":[{"item_id":"49","item_code":"051212001","item_categories":{"8":"on","9":"on","10":"on","11":"on","12":"on","13":"on","14":"on","15":"on"},"item_status":"1","item_stock":"5","item_price":"95","item_title":"NADALu00ae - Calprotectina - 10 test","item_weight":"","item_colors":"","item_short_desc":"Test qualitativo in cassetta per la determinazione della calprotectina nelle feci","item_long_desc":"","item_meta_keywords":"","item_meta_description":"","fk_lang_id":"1","item_images":[{"image_id":"81","image_src":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_24_Sunday_11_29_27___heart-4.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"86","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"89","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-2.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-2.png","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"90","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-3.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-3.png","image_title":"","image_alt":"","is_main":"1","fk_item_id":"49"}],"quantity":1}],"shipping_id":"4","payment_id":"1"}', '95', 0, 0, 45, 1, 4, NULL, NULL, NULL, NULL),
(40, '2016-09-10 16:35:40', '{"items":[{"item_id":"49","item_code":"051212001","item_categories":{"8":"on","9":"on","10":"on","11":"on","12":"on","13":"on","14":"on","15":"on"},"item_status":"1","item_stock":"5","item_price":"95","item_title":"NADALu00ae - Calprotectina - 10 test","item_weight":"","item_colors":"","item_short_desc":"Test qualitativo in cassetta per la determinazione della calprotectina nelle feci","item_long_desc":"","item_meta_keywords":"","item_meta_description":"","fk_lang_id":"1","item_images":[{"image_id":"81","image_src":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_24_Sunday_11_29_27___heart-4.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"86","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_11___butterfly-1.jpg","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"89","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-2.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-2.png","image_title":"","image_alt":"","is_main":"0","fk_item_id":"49"},{"image_id":"90","image_src":"/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-3.png","image_path":"/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg","image_name":"2016_July_31_Sunday_20_11_12___heart-3.png","image_title":"","image_alt":"","is_main":"1","fk_item_id":"49"}],"quantity":1}],"shipping_id":"4","payment_id":"1"}', '95', 0, 0, 46, 1, 4, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `acms_shippings`
--

CREATE TABLE `acms_shippings` (
  `shipping_id` int(11) NOT NULL,
  `shipping_name` varchar(45) DEFAULT NULL,
  `shipping_cost` float DEFAULT NULL,
  `shipping_details` text,
  `shipping_status` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acms_shippings`
--

INSERT INTO `acms_shippings` (`shipping_id`, `shipping_name`, `shipping_cost`, `shipping_details`, `shipping_status`) VALUES
(3, 'Posta Ordinaria', 3, 'Nessun Dettaglio', 0),
(4, 'Posta Prioritaria', 5, 'Nessun Dettaglio', 1),
(5, 'Corriere Espresso', 7, 'Nessun Dettaglio', 1),
(6, 'Spedizione USA', 17, 'Nessun Dettaglio', 1);

-- --------------------------------------------------------

--
-- Table structure for table `acms_shippings_has_items`
--

CREATE TABLE `acms_shippings_has_items` (
  `fk_shipping_id` int(11) NOT NULL,
  `fk_item_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acms_shop_categories`
--

CREATE TABLE `acms_shop_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(80) DEFAULT NULL,
  `category_status` tinyint(1) DEFAULT '1',
  `category_image_src` varchar(256) DEFAULT NULL,
  `fk_lang_id` int(11) NOT NULL,
  `fk_parent_id` int(11) NOT NULL DEFAULT '0',
  `category_parent_name` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acms_shop_categories`
--

INSERT INTO `acms_shop_categories` (`category_id`, `category_name`, `category_status`, `category_image_src`, `fk_lang_id`, `fk_parent_id`, `category_parent_name`) VALUES
(14, 'Strumenti', 1, 'http://localhost/arachno/views/images/shop/categories/category_14.png', 1, 8, 'Pediatria'),
(13, 'Test su feci', 1, 'http://localhost/arachno/views/images/shop/categories/category_13.png', 1, 9, 'Test Medici Rapidi'),
(12, 'Test su urine', 1, 'http://localhost/arachno/views/images/shop/categories/category_12.png', 1, 9, 'Test Medici Rapidi'),
(11, 'Test su tampone', 1, 'http://localhost/arachno/views/images/shop/categories/category_11.png', 1, 9, 'Test Medici Rapidi'),
(8, 'Pediatria', 1, 'http://localhost/arachno/views/images/shop/categories/category_8.png', 1, 0, ''),
(9, 'Test Medici Rapidi', 1, 'http://localhost/arachno/views/images/shop/categories/category_9.png', 1, 8, 'Pediatria'),
(10, 'Test su Sangue', 1, 'http://localhost/arachno/views/images/shop/categories/category_10.png', 1, 9, 'Test Medici Rapidi'),
(15, 'Monouso', 1, 'http://localhost/arachno/views/images/shop/categories/category_15.png', 1, 8, 'Pediatria'),
(16, 'Ginecologia', 1, '', 1, 0, ''),
(17, 'Test rapidi', 1, '', 1, 16, 'Ginecologia'),
(18, 'Test su tampone', 1, '', 1, 17, 'Test rapidi'),
(19, 'Test su urine', 1, '', 1, 17, 'Test rapidi'),
(20, 'Strumentazione', 1, '', 1, 16, 'Ginecologia'),
(21, 'Monouso', 1, '', 1, 16, 'Ginecologia'),
(22, 'Gastroenterologia', 1, '', 1, 0, ''),
(23, 'Test rapidi', 1, '', 1, 22, 'Gastroenterologia'),
(24, 'Test su sangue', 1, '', 0, 23, 'Test rapidi'),
(25, 'Test su feci', 1, '', 1, 23, 'Test rapidi'),
(26, 'Test su respiro', 1, '', 1, 22, 'Gastroenterologia'),
(27, 'Strumentazione', 1, '', 1, 22, 'Gastroenterologia'),
(28, 'Monouso', 1, '', 1, 22, 'Gastroenterologia'),
(29, 'Laboratorio', 1, '', 1, 0, ''),
(30, 'Test rapidi', 1, '', 1, 29, 'Laboratorio'),
(31, 'Test su respiro', 1, '', 1, 29, 'Laboratorio'),
(32, 'Microbiologia', 1, '', 1, 29, 'Laboratorio'),
(33, 'Terreni di coltura', 1, '', 1, 32, 'Microbiologia'),
(34, 'Antibiotici', 1, '', 1, 32, 'Microbiologia'),
(35, 'Altri reagenti', 1, '', 1, 32, 'Microbiologia'),
(36, 'Chimica clinica', 1, '', 1, 29, 'Laboratorio'),
(37, 'Consumabili', 1, '', 1, 29, 'Laboratorio'),
(38, 'Allergologia', 1, '', 1, 0, ''),
(39, 'Prick test', 1, '', 1, 38, 'Allergologia'),
(40, 'Monouso', 1, '', 1, 38, 'Allergologia'),
(41, 'Patch test', 1, '', 1, 38, 'Allergologia');

-- --------------------------------------------------------

--
-- Table structure for table `acms_shop_items`
--

CREATE TABLE `acms_shop_items` (
  `item_id` int(11) NOT NULL,
  `item_code` varchar(45) DEFAULT NULL,
  `fk_lang_id` int(11) NOT NULL,
  `item_status` tinyint(1) DEFAULT '0',
  `item_stock` int(11) DEFAULT NULL,
  `item_price` float DEFAULT NULL,
  `item_title` varchar(100) DEFAULT NULL,
  `item_weight` varchar(45) DEFAULT NULL,
  `item_colors` varchar(45) DEFAULT NULL,
  `item_short_desc` varchar(100) DEFAULT NULL,
  `item_long_desc` text,
  `item_meta_keywords` varchar(150) DEFAULT NULL,
  `item_meta_description` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acms_shop_items`
--

INSERT INTO `acms_shop_items` (`item_id`, `item_code`, `fk_lang_id`, `item_status`, `item_stock`, `item_price`, `item_title`, `item_weight`, `item_colors`, `item_short_desc`, `item_long_desc`, `item_meta_keywords`, `item_meta_description`) VALUES
(49, '051212001', 1, 1, 5, 95, 'NADALÂ® - Calprotectina - 10 test', '', '', 'Test qualitativo in cassetta per la determinazione della calprotectina nelle feci', '', '', ''),
(50, '05252001', 1, 1, 5, 40.98, 'NADALÂ® - Mononucleosi Card - 20 Test', '', '', 'Il test Mononucleosi Ã¨ un test rapido per la ricerca degli anticorpi contro il virus Epstein-Barr (', '', '', ''),
(51, '05312001', 1, 1, 5, 45.08, 'NADALÂ® - PCR Card - 20 Test', '', '', 'Test semiquantitativo per la determinazione della Proteina C Reattiva (PCR)', '', '', ''),
(52, '050234', 1, 1, 5, 65.57, 'FOOD DETECTIVE - 59 Alimenti - 1 Test', '', '', 'Test rapido (40â€™) qualitativo per 59 intolleranze alimentari IgG con metodo elisa indiretto', '', '', ''),
(53, '050236', 1, 1, 5, 14.75, 'Celiac Test - 1 Test', '', '', 'Test rapido per la determinazione qualitativa degli anticorpi anti transglutaminasi IgA ', '', '', ''),
(54, '05790002', 1, 1, 5, 94.27, 'Celiac Disease tTG & Gliadine Test - 10 Test', '', '', 'Test rapido per la determinazione qualitativa simultanea degli anticorpi anti transglutaminasi IgA e', '', '', ''),
(55, '05790001', 1, 1, 5, 94.27, 'NADAL - Celiachia tTg - 10 Test', '', '', 'Test rapido per la determinazione qualitativa simultanea degli anticorpi anti transglutaminasi IgA, ', '', '', ''),
(56, '05542001N', 1, 1, 5, 81.96, 'NADALÂ® - Tetano - 10 Test', '', '', 'Test rapido per la rilevazione dello stato immunitario contro il tetano (rilevazione degli anticorpi', '', '', ''),
(57, '05222001A', 1, 1, 5, 24.59, 'NADAL - Strep A Card - 20 Test', '', '', 'Diagnosi rapida in caso di sospetto di scarlattina / streptococco A. Test per la ricerca dell&#39;an', '', '', ''),
(58, '05242001', 1, 1, 5, 40.98, 'NADALÂ® - Influenza A + B - 10 Test ', '', '', 'Diagnosi rapida in caso di sospetto di influenza A (H1N1 e H5N1) e influenza B', '', '', ''),
(59, '051120001', 1, 1, 5, 131.1, 'NADALÂ® - Candida Albicans - 20 Test', '', '', 'Test rapido per la ricerca dell&#39;antigene Candida Albicans nel secreto vaginale', '', '', ''),
(60, '050111', 1, 1, 5, 147.5, 'Calprotectina - 10 Test', '', '', 'Test immunocromatografico per la determinazione semiquantitativa della calprotectina fecale. La dete', '', '', ''),
(61, '051200001', 1, 1, 5, 147.5, 'NADALÂ® - Lactoferrina - 20 Test', '', '', 'Test immunocromatografico per la determinazione qualitativa della Lactoferrina fecale.\r\nLa presenza ', '', '', ''),
(62, '05272001', 1, 1, 5, 20.49, 'NADALÂ® - FOB - 40ng/mL - 20 Test', '', '', 'Test immunocromatografico per la determinazione qualitativa del sangue occulto nelle feci', '', '', ''),
(63, '05262002', 1, 1, 5, 94.27, 'NADALÂ® - H. Pylori Antigene Card - 20 Test', '', '', 'Test immunocromatografico per la determinazione qualitativa della presenza dellâ€™Helicobacter pylor', '', '', ''),
(64, '05481015', 1, 1, 5, 40.98, 'NADALÂ® - Rota-Adenovirus Card - 10 test', '', '', 'Test immunocromatografico rapido per la determinazione simultanea dell&#39;antigene del Rotavirus e ', '', '', ''),
(65, '05481016', 1, 1, 5, 24.59, 'NADALÂ® - Adenovirus Card - 10 Test', '', '', 'Test immunocromatografico rapido per la determinazione simultanea dell&#39;antigene del Rotavirus e ', '', '', ''),
(66, '05481017', 1, 1, 5, 24.59, 'NADALÂ® - Rotavirus Card - 10 Test', '', '', 'Test immunocromatografico rapido per la determinazione simultanea dell&#39;antigene del Rotavirus e ', '', '', ''),
(67, '051232001', 1, 1, 5, 24.59, 'NADALÂ® - Campylobacter Card - 10 Test', '', '', 'Test immunocromatografico rapidoper la determinazione dell&#39;antigene del Campylobacter', '', '', ''),
(68, '05582008', 1, 1, 5, 122.95, 'NADALÂ® - Clostridium Difficile (Tossina A+B) - 10 Test', '', '', 'Test rapido per la determinazione dell&#39;antigene Clostridium Difficile con la differenziazione si', '', '', ''),
(69, '051242002', 1, 1, 5, 61.47, 'NADALÂ® - Salmonella Typhi Card - 10 Test', '', '', 'Test immunocromatografico rapido per la determinazione dell&#39;antigene della Salmonella Typhi', '', '', ''),
(70, '051262002', 1, 1, 5, 61.47, 'NADALÂ® - Shigella Dysenteriae - 10 Test', '', '', 'Test immunocromatografico rapido per la determinazione dei batteri della Shigella Dysenteriae tipo 1', '', '', ''),
(71, '06137', 1, 1, 5, 20.49, 'NADALÂ® - Urine Strips 10 Parametri - 100 Test', '', '', 'Strisce reattive colorimetriche per la determinazione semiquantitativa dei seguenti asnaliti urinari', '', '', ''),
(72, '0642000', 1, 1, 5, 450, 'NADALÂ® - Urine Strip Reader U-100 - 1 Pz', '', '', 'Lettore semi automatico di strisce per urine. Dotato di stampante, tempo di lettura 30sec/test. 1000', '', '', ''),
(73, '0642100A', 1, 1, 5, 24.59, 'NADALÂ® - Strip Urine (dedicate a Reader U-100) - 100 Test', '', '', 'Strisce reattive colorimetriche per la determinazione semiquantitativa dei seguenti asnaliti urinari', '', '', ''),
(74, '05572004N', 1, 1, 5, 131.1, 'NADALÂ® - Streptococcus Pneumoniae - 10 Test', '', '', 'Test rapido per la rilevazione degli antigeni dello Streptococcus Pneumoniae nelle urine', '', '', ''),
(75, '05272015', 1, 1, 5, 100, 'NADALÂ® - Hb/Hp Complex - 25 Test', '', '', 'Test immunocromatografico per la determinazione simultanea e qualitativa dellâ€™emoglobina e del com', '', '', ''),
(76, '05272011', 1, 1, 5, 175, 'NADALÂ® - Hb/Hp Complex + Pazient set - 25 Test', '', '', 'Test immunocromatografico per la determinazione simultanea e qualitativa dellâ€™emoglobina e del com', '', '', ''),
(77, '05431001', 1, 1, 5, 300, 'NADALÂ® - PROM Test - 20 Test', '', '', 'Test rapido immunocromatografico, a forma di penna, per uso diagnostico in vitro, per la diagnosi di', '', '', ''),
(78, 'ICH-502', 1, 1, 5, 80, 'Chlamydia T.Card - 20 Test', '', '', 'Test rapido immunocromatografico per la ricerca della Chlamydia Trachomatis nel tampone cervicale, t', '', '', ''),
(79, '05232001', 1, 1, 5, 100, 'NADALÂ® - Strep B card - 20 Test', '', '', 'Test immunocromatografico su membrana per la determinazione dello Streptococco B su tampone vaginale', '', '', ''),
(80, '05840003', 1, 1, 5, 180, 'NADALÂ® - Trichomonas Vaginalis Card - 10 Test', '', '', 'Trichmonas Card Ã¨ test immunocromatografico per una rapida determinazione qualitativa della presenz', '', '', ''),
(81, '050137', 1, 1, 5, 50, 'NADALÂ® - Gonorrea Strips - 10 Test', '', '', 'Test rapido immunocromatografico, in strip, per la ricerca della gonorrea su secreto vaginale.', '', '', ''),
(82, '05194001', 1, 1, 5, 100, 'NADALÂ® - pH Vaginale - 50 test', '', '', 'Test rapido in strip per la determinazione del pH vaginale.', '', '', ''),
(83, '05142002', 1, 1, 5, 30, 'NADALÂ® - HCG 25mlU/mL - 30 Test', '', '', 'Test di gravidanza rapido', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `acms_shop_items_images`
--

CREATE TABLE `acms_shop_items_images` (
  `image_id` int(11) NOT NULL,
  `image_src` varchar(256) DEFAULT NULL,
  `image_path` varchar(256) DEFAULT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `image_title` varchar(100) DEFAULT NULL,
  `image_alt` varchar(100) DEFAULT NULL,
  `is_main` tinyint(1) DEFAULT '0',
  `fk_item_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acms_shop_items_images`
--

INSERT INTO `acms_shop_items_images` (`image_id`, `image_src`, `image_path`, `image_name`, `image_title`, `image_alt`, `is_main`, `fk_item_id`) VALUES
(81, '/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg', '/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg', '2016_July_24_Sunday_11_29_27___heart-4.jpg', '', '', 0, 49),
(86, '/views/images/shop/items/2016_July_31_Sunday_20_11_11___butterfly-1.jpg', '/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg', '2016_July_31_Sunday_20_11_11___butterfly-1.jpg', '', '', 0, 49),
(89, '/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-2.png', '/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg', '2016_July_31_Sunday_20_11_12___heart-2.png', '', '', 0, 49),
(90, '/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-3.png', '/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg', '2016_July_31_Sunday_20_11_12___heart-3.png', '', '', 1, 49);

-- --------------------------------------------------------

--
-- Table structure for table `acms_users`
--

CREATE TABLE `acms_users` (
  `user_id` int(11) NOT NULL,
  `user_reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_activation` tinyint(1) DEFAULT '0',
  `hash_user_activation` varchar(32) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `user_name` varchar(24) DEFAULT NULL,
  `user_surname` varchar(24) DEFAULT NULL,
  `user_email` varchar(32) DEFAULT NULL,
  `user_phone` varchar(16) DEFAULT NULL,
  `user_mobile_phone` varchar(16) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `fk_lang_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acms_users`
--

INSERT INTO `acms_users` (`user_id`, `user_reg_date`, `user_activation`, `hash_user_activation`, `user_type`, `user_name`, `user_surname`, `user_email`, `user_phone`, `user_mobile_phone`, `user_password`, `fk_lang_id`) VALUES
(1, '2016-04-20 17:04:46', 1, '36660e59856b4de58a219bcf4e27eba3', 'admin', 'Luca', 'Cilfone', 'info@fareilweb.com', '3270158630', '3270158630', '$1$rasmusle$C9Hxb8sS4oYt1e5VbQc0I.', 1),
(21, '2016-07-02 22:00:00', 1, '36660e59856b4de58a219bcf4e27eba3', 'admin', 'Admin', 'DiaTech', 'info@dia-tech.it', '000999888', '3334445556', '$1$rasmusle$C9Hxb8sS4oYt1e5VbQc0I.', 1),
(48, '2016-09-10 16:44:49', 0, 'a733fa9b25f33689e2adbe72199f0e62', 'registered', 'Pinco', 'Pallino', 'pinco@pallino.it', '000999888', NULL, '$1$rasmusle$C9Hxb8sS4oYt1e5VbQc0I.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acms_coupons`
--
ALTER TABLE `acms_coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `acms_coupons_has_items`
--
ALTER TABLE `acms_coupons_has_items`
  ADD PRIMARY KEY (`fk_coupon_id`,`fk_item_id`),
  ADD KEY `fk_acms_coupons_has_acms_shop_items_acms_shop_items1_idx` (`fk_item_id`),
  ADD KEY `fk_acms_coupons_has_acms_shop_items_acms_coupons1_idx` (`fk_coupon_id`);

--
-- Indexes for table `acms_items_has_categories`
--
ALTER TABLE `acms_items_has_categories`
  ADD PRIMARY KEY (`item_id`,`category_id`),
  ADD KEY `fk_acms_shop_items_has_acms_shop_categories_acms_shop_categ_idx` (`category_id`),
  ADD KEY `fk_acms_shop_items_has_acms_shop_categories_acms_shop_items_idx` (`item_id`);

--
-- Indexes for table `acms_languages`
--
ALTER TABLE `acms_languages`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `acms_menus`
--
ALTER TABLE `acms_menus`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `fk_acms_menu_list_acsm_languages1_idx` (`fk_lang_id`);

--
-- Indexes for table `acms_menus_links`
--
ALTER TABLE `acms_menus_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `fk_acms_menu_items_acsm_languages1_idx` (`fk_lang_id`);

--
-- Indexes for table `acms_pages`
--
ALTER TABLE `acms_pages`
  ADD PRIMARY KEY (`page_id`,`page_slug`),
  ADD KEY `fk_acms_pages_acsm_languages1_idx` (`fk_lang_id(11)`);

--
-- Indexes for table `acms_payments`
--
ALTER TABLE `acms_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `acms_payments_has_items`
--
ALTER TABLE `acms_payments_has_items`
  ADD PRIMARY KEY (`fk_payment_id`,`fk_item_id`),
  ADD KEY `fk_acms_payments_has_acms_shop_items_acms_shop_items1_idx` (`fk_item_id`),
  ADD KEY `fk_acms_payments_has_acms_shop_items_acms_payments1_idx` (`fk_payment_id`);

--
-- Indexes for table `acms_sales`
--
ALTER TABLE `acms_sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `acms_shippings`
--
ALTER TABLE `acms_shippings`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `acms_shippings_has_items`
--
ALTER TABLE `acms_shippings_has_items`
  ADD PRIMARY KEY (`fk_shipping_id`,`fk_item_id`),
  ADD KEY `fk_acms_shippings_has_acms_shop_items_acms_shop_items1_idx` (`fk_item_id`),
  ADD KEY `fk_acms_shippings_has_acms_shop_items_acms_shippings1_idx` (`fk_shipping_id`);

--
-- Indexes for table `acms_shop_categories`
--
ALTER TABLE `acms_shop_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `fk_acms_shop_categories_acsm_languages1_idx` (`fk_lang_id`),
  ADD KEY `fk_acms_shop_categories_acms_shop_categories_idx` (`fk_parent_id`);

--
-- Indexes for table `acms_shop_items`
--
ALTER TABLE `acms_shop_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_acms_shop_items_acsm_languages1_idx` (`fk_lang_id`);

--
-- Indexes for table `acms_shop_items_images`
--
ALTER TABLE `acms_shop_items_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_acms_shop_images_acms_shop_items1_idx` (`fk_item_id`);

--
-- Indexes for table `acms_users`
--
ALTER TABLE `acms_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_acms_users_acsm_languages1_idx` (`fk_lang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acms_languages`
--
ALTER TABLE `acms_languages`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `acms_menus`
--
ALTER TABLE `acms_menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `acms_menus_links`
--
ALTER TABLE `acms_menus_links`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `acms_pages`
--
ALTER TABLE `acms_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `acms_payments`
--
ALTER TABLE `acms_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `acms_sales`
--
ALTER TABLE `acms_sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `acms_shippings`
--
ALTER TABLE `acms_shippings`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `acms_shop_categories`
--
ALTER TABLE `acms_shop_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `acms_shop_items`
--
ALTER TABLE `acms_shop_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `acms_shop_items_images`
--
ALTER TABLE `acms_shop_items_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `acms_users`
--
ALTER TABLE `acms_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
