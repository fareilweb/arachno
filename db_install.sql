-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2016 at 06:59 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acms_coupons_has_items`
--

CREATE TABLE `acms_coupons_has_items` (
  `fk_coupon_id` int(11) NOT NULL,
  `fk_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `acms_menu_links`
--

CREATE TABLE `acms_menu_links` (
  `link_id` int(11) NOT NULL,
  `fk_menu_id` int(11) NOT NULL,
  `link_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link_rel_uri` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `link_abs_uri` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fk_lang_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acms_menu_links`
--

INSERT INTO `acms_menu_links` (`link_id`, `fk_menu_id`, `link_title`, `link_rel_uri`, `link_abs_uri`, `fk_lang_id`) VALUES
(1, 1, 'Home', '/', 'NULL', 1),
(2, 1, 'Test Page', '/test-page', '', 1),
(3, 1, 'Shop', '/Shop/showCategories', '', 1),
(5, 1, 'Accesso', '/User/login/redirect/User/login', '', 1),
(6, 1, 'Registrati', '/User/register', '', 1),
(7, 1, 'Amministrazione', '/Admin', '', 1);

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
  `payment_name` varchar(80) DEFAULT NULL,
  `payment_cost` float DEFAULT NULL,
  `payment_details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acms_payments_has_items`
--

CREATE TABLE `acms_payments_has_items` (
  `fk_payment_id` int(11) NOT NULL,
  `fk_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acms_shippings_has_items`
--

CREATE TABLE `acms_shippings_has_items` (
  `fk_shipping_id` int(11) NOT NULL,
  `fk_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(14, 'Strumenti', 1, NULL, 1, 8, 'Pediatria'),
(13, 'Test su feci', 1, NULL, 1, 9, 'Test Medici Rapidi'),
(12, 'Test su urine', 1, NULL, 1, 9, 'Test Medici Rapidi'),
(11, 'Test su tampone', 1, NULL, 1, 9, 'Test Medici Rapidi'),
(8, 'Pediatria', 1, NULL, 1, 0, ''),
(9, 'Test Medici Rapidi', 1, NULL, 1, 8, 'Pediatria'),
(10, 'Test su Sangue', 1, NULL, 1, 9, 'Test Medici Rapidi'),
(15, 'Monouso', 1, NULL, 1, 8, 'Pediatria');

-- --------------------------------------------------------

--
-- Table structure for table `acms_shop_items`
--

CREATE TABLE `acms_shop_items` (
  `item_id` int(11) NOT NULL,
  `item_code` varchar(45) DEFAULT NULL,
  `fk_category_id` int(11) DEFAULT NULL,
  `item_categories_json` varchar(256) DEFAULT NULL,
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

INSERT INTO `acms_shop_items` (`item_id`, `item_code`, `fk_category_id`, `item_categories_json`, `fk_lang_id`, `item_status`, `item_stock`, `item_price`, `item_title`, `item_weight`, `item_colors`, `item_short_desc`, `item_long_desc`, `item_meta_keywords`, `item_meta_description`) VALUES
(49, '051212001', 0, '{"8":"on"}', 0, 1, 5, 95, 'NADALÂ® - Calprotectina - 10 test', '', '', 'Test qualitativo in cassetta per la determinazione della calprotectina nelle feci', '', '', '');

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
(21, '2016-07-02 22:00:00', 1, '36660e59856b4de58a219bcf4e27eba3', 'admin', 'Admin', 'DiaTech', 'info@dia-tech.it', '000999888', '3334445556', '$1$rasmusle$C9Hxb8sS4oYt1e5VbQc0I.', 1);

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
-- Indexes for table `acms_menu_links`
--
ALTER TABLE `acms_menu_links`
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
  ADD KEY `fk_shop_items_shop_categories_idx` (`fk_category_id`),
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
-- AUTO_INCREMENT for table `acms_menu_links`
--
ALTER TABLE `acms_menu_links`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `acms_pages`
--
ALTER TABLE `acms_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `acms_shop_categories`
--
ALTER TABLE `acms_shop_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `acms_shop_items`
--
ALTER TABLE `acms_shop_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `acms_shop_items_images`
--
ALTER TABLE `acms_shop_items_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `acms_users`
--
ALTER TABLE `acms_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `acms_coupons_has_items`
--
ALTER TABLE `acms_coupons_has_items`
  ADD CONSTRAINT `fk_acms_coupons_has_acms_shop_items_acms_coupons1` FOREIGN KEY (`fk_coupon_id`) REFERENCES `acms_coupons` (`coupon_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_acms_coupons_has_acms_shop_items_acms_shop_items1` FOREIGN KEY (`fk_item_id`) REFERENCES `acms_shop_items` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `acms_payments_has_items`
--
ALTER TABLE `acms_payments_has_items`
  ADD CONSTRAINT `fk_acms_payments_has_acms_shop_items_acms_payments1` FOREIGN KEY (`fk_payment_id`) REFERENCES `acms_payments` (`payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_acms_payments_has_acms_shop_items_acms_shop_items1` FOREIGN KEY (`fk_item_id`) REFERENCES `acms_shop_items` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `acms_shippings_has_items`
--
ALTER TABLE `acms_shippings_has_items`
  ADD CONSTRAINT `fk_acms_shippings_has_acms_shop_items_acms_shippings1` FOREIGN KEY (`fk_shipping_id`) REFERENCES `acms_shippings` (`shipping_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_acms_shippings_has_acms_shop_items_acms_shop_items1` FOREIGN KEY (`fk_item_id`) REFERENCES `acms_shop_items` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
