-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2016 at 08:45 AM
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
-- Table structure for table `acms_categories`
--

CREATE TABLE `acms_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_desc` mediumtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acms_categories`
--

INSERT INTO `acms_categories` (`category_id`, `category_name`, `category_desc`) VALUES
(1, 'Pagine del Sito', 'Articoli generici del sito'),
(2, 'Articoli Specialistici', 'Articoli Specialistici approfinditi su temi di interesse specifico.');

-- --------------------------------------------------------

--
-- Table structure for table `acms_comments`
--

CREATE TABLE `acms_comments` (
  `comment_id` int(11) NOT NULL,
  `comment_text` text,
  `fk_page_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_shop_item_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Table structure for table `acms_items_has_categories`
--

CREATE TABLE `acms_items_has_categories` (
  `fk_item_id` int(11) NOT NULL,
  `fk_shop_category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acms_items_has_coupons`
--

CREATE TABLE `acms_items_has_coupons` (
  `fk_item_id` int(11) NOT NULL,
  `fk_coupon_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acms_items_has_payments`
--

CREATE TABLE `acms_items_has_payments` (
  `fk_item_id` int(11) NOT NULL,
  `fk_payment_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acms_items_has_shippings`
--

CREATE TABLE `acms_items_has_shippings` (
  `fk_item_id` int(11) NOT NULL,
  `fk_shipping_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `menu_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `menu_fk_lang_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acms_menus`
--

INSERT INTO `acms_menus` (`menu_id`, `menu_title`, `menu_name`, `menu_fk_lang_id`) VALUES
(1, 'Menu Principale', 'main_menu', 1),
(2, 'Menu Shop', 'shop_menu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `acms_menu_items`
--

CREATE TABLE `acms_menu_items` (
  `link_id` int(11) NOT NULL,
  `fk_menu_id` int(11) NOT NULL,
  `link_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link_rel_uri` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `link_ext_uri` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acms_pages`
--

CREATE TABLE `acms_pages` (
  `page_id` int(11) NOT NULL,
  `page_slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `page_view` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_module` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'false',
  `page_css_class` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `page_title_hidden` tinyint(1) DEFAULT NULL,
  `page_content` text CHARACTER SET utf8,
  `page_meta_description` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `page_meta_keywords` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `fk_page_category_id` int(11) NOT NULL,
  `fk_author_user_id` int(11) NOT NULL,
  `fk_page_lang_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acms_pages`
--

INSERT INTO `acms_pages` (`page_id`, `page_slug`, `page_view`, `page_module`, `page_css_class`, `page_title`, `page_title_hidden`, `page_content`, `page_meta_description`, `page_meta_keywords`, `fk_page_category_id`, `fk_author_user_id`, `fk_page_lang_id`) VALUES
(1, 'home', '', 'false', 'home', 'Home Page', 1, '', '', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `acms_pages_has_menus`
--

CREATE TABLE `acms_pages_has_menus` (
  `fk_page_id` int(11) NOT NULL,
  `fk_menu_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acms_pages_views`
--

CREATE TABLE `acms_pages_views` (
  `view_id` int(11) NOT NULL,
  `view_slug` varchar(100) DEFAULT NULL,
  `view_position` varchar(100) DEFAULT NULL,
  `fk_page_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acms_pages_views`
--

INSERT INTO `acms_pages_views` (`view_id`, `view_slug`, `view_position`, `fk_page_id`) VALUES
(2, 'custom/home', 'footer-right', 1),
(4, 'custom/top', 'top', 1);

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
(1, 'PayPal', 'paypal', 3, '', 1),
(2, 'PostePay', 'postepay', 1, 'Nessuno Dettaglio', 1),
(3, 'Bonifico', 'bank', 0, 'Nessuno Dettaglio', 1);

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
  `shipping_province` varchar(300) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(1, 'Posta Ordinaria', 3, 'Nessun Dettaglio', 1),
(2, 'Posta Prioritaria', 5, 'Nessun Dettaglio', 1),
(3, 'Corriere Espresso', 7, 'Nessun Dettaglio', 1),
(4, 'Spedizione USA', 17, 'Nessun Dettaglio', 1);

-- --------------------------------------------------------

--
-- Table structure for table `acms_shop_categories`
--

CREATE TABLE `acms_shop_categories` (
  `shop_category_id` int(11) NOT NULL,
  `shop_category_name` varchar(80) DEFAULT NULL,
  `shop_category_parent_name` varchar(45) DEFAULT NULL,
  `shop_category_slug` varchar(80) DEFAULT NULL,
  `shop_category_status` tinyint(1) DEFAULT '1',
  `shop_category_image_src` varchar(256) DEFAULT NULL,
  `fk_lang_id` int(11) NOT NULL,
  `fk_parent_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acms_shop_items`
--

CREATE TABLE `acms_shop_items` (
  `item_id` int(11) NOT NULL,
  `item_code` varchar(45) DEFAULT NULL,
  `item_status` tinyint(1) DEFAULT '0',
  `item_stock` int(11) DEFAULT NULL,
  `item_price` float DEFAULT NULL,
  `item_title` varchar(100) DEFAULT NULL,
  `item_weight` varchar(45) DEFAULT NULL,
  `item_colors` varchar(45) DEFAULT NULL,
  `item_short_desc` varchar(100) DEFAULT NULL,
  `item_long_desc` text,
  `item_meta_keywords` varchar(150) DEFAULT NULL,
  `item_meta_description` varchar(150) DEFAULT NULL,
  `fk_lang_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `fk_user_lang_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acms_users`
--

INSERT INTO `acms_users` (`user_id`, `user_reg_date`, `user_activation`, `hash_user_activation`, `user_type`, `user_name`, `user_surname`, `user_email`, `user_phone`, `user_mobile_phone`, `user_password`, `fk_user_lang_id`) VALUES
(1, '2016-04-20 17:04:46', 1, '36660e59856b4de58a219bcf4e27eba3', 'admin', 'Luca', 'Cilfone', 'info@fareilweb.com', '3270158630', '3270158630', '$1$rasmusle$C9Hxb8sS4oYt1e5VbQc0I.', 0),
(2, '2016-10-28 07:19:11', 1, '8d317bdcf4aafcfc22149d77babee96d', 'admin', 'Alfredo', 'Galdi', 'info@alfredogaldi.it', '000999888', '333444555', '$1$rasmusle$C9Hxb8sS4oYt1e5VbQc0I.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mod_showcase_category`
--

CREATE TABLE `mod_showcase_category` (
  `sc_category_id` int(11) NOT NULL,
  `sc_category_name` varchar(100) DEFAULT NULL,
  `sc_category_desc` text,
  `sc_category_status` tinyint(1) DEFAULT NULL,
  `sc_category_image_src` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mod_showcase_images`
--

CREATE TABLE `mod_showcase_images` (
  `sc_image_id` int(11) NOT NULL,
  `sc_image_src` varchar(200) DEFAULT NULL,
  `sc_image_title` varchar(100) DEFAULT NULL,
  `sc_image_alt` varchar(100) DEFAULT NULL,
  `sc_image_width` varchar(4) DEFAULT NULL,
  `sc_image_height` varchar(4) DEFAULT NULL,
  `sc_is_main` tinyint(1) DEFAULT '0',
  `fk_sc_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mod_showcase_item`
--

CREATE TABLE `mod_showcase_item` (
  `sc_item_id` int(11) NOT NULL,
  `sc_item_slug` varchar(80) DEFAULT NULL,
  `sc_item_name` varchar(100) DEFAULT NULL,
  `sc_item_short_desc` text,
  `sc_item_long_desc` text,
  `sc_item_date` date DEFAULT NULL,
  `sc_item_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mod_showcase_item_has_category`
--

CREATE TABLE `mod_showcase_item_has_category` (
  `fk_sc_item_id` int(11) NOT NULL,
  `fk_sc_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acms_categories`
--
ALTER TABLE `acms_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `acms_comments`
--
ALTER TABLE `acms_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_acms_comments_acms_pages1_idx` (`fk_page_id`),
  ADD KEY `fk_acms_comments_acms_users1_idx` (`fk_user_id`),
  ADD KEY `fk_acms_comments_acms_shop_items1_idx` (`fk_shop_item_id`);

--
-- Indexes for table `acms_coupons`
--
ALTER TABLE `acms_coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `acms_items_has_categories`
--
ALTER TABLE `acms_items_has_categories`
  ADD PRIMARY KEY (`fk_item_id`,`fk_shop_category_id`),
  ADD KEY `fk_acms_shop_items_has_acms_shop_categories_acms_shop_categ_idx` (`fk_shop_category_id`),
  ADD KEY `fk_acms_shop_items_has_acms_shop_categories_acms_shop_items_idx` (`fk_item_id`);

--
-- Indexes for table `acms_items_has_coupons`
--
ALTER TABLE `acms_items_has_coupons`
  ADD PRIMARY KEY (`fk_item_id`,`fk_coupon_id`),
  ADD KEY `fk_acms_shop_items_has_acms_coupons_acms_coupons1_idx` (`fk_coupon_id`),
  ADD KEY `fk_acms_shop_items_has_acms_coupons_acms_shop_items1_idx` (`fk_item_id`);

--
-- Indexes for table `acms_items_has_payments`
--
ALTER TABLE `acms_items_has_payments`
  ADD PRIMARY KEY (`fk_item_id`,`fk_payment_id`),
  ADD KEY `fk_acms_shop_items_has_acms_payments_acms_payments1_idx` (`fk_payment_id`),
  ADD KEY `fk_acms_shop_items_has_acms_payments_acms_shop_items1_idx` (`fk_item_id`);

--
-- Indexes for table `acms_items_has_shippings`
--
ALTER TABLE `acms_items_has_shippings`
  ADD PRIMARY KEY (`fk_item_id`,`fk_shipping_id`),
  ADD KEY `fk_acms_shop_items_has_acms_shippings_acms_shippings1_idx` (`fk_shipping_id`),
  ADD KEY `fk_acms_shop_items_has_acms_shippings_acms_shop_items1_idx` (`fk_item_id`);

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
  ADD KEY `fk_acms_menus_acms_languages1_idx` (`menu_fk_lang_id`);

--
-- Indexes for table `acms_menu_items`
--
ALTER TABLE `acms_menu_items`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `fk_acms_menus_links_acms_menus1_idx` (`fk_menu_id`);

--
-- Indexes for table `acms_pages`
--
ALTER TABLE `acms_pages`
  ADD PRIMARY KEY (`page_id`,`page_slug`),
  ADD UNIQUE KEY `page_id_UNIQUE` (`page_id`),
  ADD UNIQUE KEY `page_slug_UNIQUE` (`page_slug`),
  ADD KEY `fk_acms_pages_acms_categories_idx` (`fk_page_category_id`),
  ADD KEY `fk_acms_pages_acms_languages1_idx` (`fk_page_lang_id`),
  ADD KEY `fk_acms_pages_acms_users1_idx` (`fk_author_user_id`);

--
-- Indexes for table `acms_pages_has_menus`
--
ALTER TABLE `acms_pages_has_menus`
  ADD PRIMARY KEY (`fk_page_id`,`fk_menu_id`),
  ADD KEY `fk_acms_pages_has_acms_menus_acms_menus1_idx` (`fk_menu_id`),
  ADD KEY `fk_acms_pages_has_acms_menus_acms_pages1_idx` (`fk_page_id`);

--
-- Indexes for table `acms_pages_views`
--
ALTER TABLE `acms_pages_views`
  ADD PRIMARY KEY (`view_id`),
  ADD KEY `fk_acms_pages_views_acms_pages1_idx` (`fk_page_id`);

--
-- Indexes for table `acms_payments`
--
ALTER TABLE `acms_payments`
  ADD PRIMARY KEY (`payment_id`);

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
-- Indexes for table `acms_shop_categories`
--
ALTER TABLE `acms_shop_categories`
  ADD PRIMARY KEY (`shop_category_id`),
  ADD KEY `fk_acms_shop_categories_acms_languages1_idx` (`fk_lang_id`),
  ADD KEY `fk_acms_shop_categories_acms_shop_categories1_idx` (`fk_parent_id`);

--
-- Indexes for table `acms_shop_items`
--
ALTER TABLE `acms_shop_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_acms_shop_items_acms_languages1_idx` (`fk_lang_id`);

--
-- Indexes for table `acms_shop_items_images`
--
ALTER TABLE `acms_shop_items_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_acms_shop_items_images_acms_shop_items1_idx` (`fk_item_id`);

--
-- Indexes for table `acms_users`
--
ALTER TABLE `acms_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_acms_users_acms_languages1_idx` (`fk_user_lang_id`);

--
-- Indexes for table `mod_showcase_category`
--
ALTER TABLE `mod_showcase_category`
  ADD PRIMARY KEY (`sc_category_id`);

--
-- Indexes for table `mod_showcase_images`
--
ALTER TABLE `mod_showcase_images`
  ADD PRIMARY KEY (`sc_image_id`),
  ADD KEY `fk_mod_showcase_images_mod_showcase_item1_idx` (`fk_sc_item_id`);

--
-- Indexes for table `mod_showcase_item`
--
ALTER TABLE `mod_showcase_item`
  ADD PRIMARY KEY (`sc_item_id`);

--
-- Indexes for table `mod_showcase_item_has_category`
--
ALTER TABLE `mod_showcase_item_has_category`
  ADD PRIMARY KEY (`fk_sc_item_id`,`fk_sc_category_id`),
  ADD KEY `fk_mod_showcase_item_has_mod_showcase_category_mod_showcase_idx` (`fk_sc_category_id`),
  ADD KEY `fk_mod_showcase_item_has_mod_showcase_category_mod_showcase_idx1` (`fk_sc_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acms_comments`
--
ALTER TABLE `acms_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acms_languages`
--
ALTER TABLE `acms_languages`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `acms_menus`
--
ALTER TABLE `acms_menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `acms_menu_items`
--
ALTER TABLE `acms_menu_items`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `acms_pages`
--
ALTER TABLE `acms_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `acms_pages_views`
--
ALTER TABLE `acms_pages_views`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `acms_payments`
--
ALTER TABLE `acms_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `acms_sales`
--
ALTER TABLE `acms_sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `acms_shippings`
--
ALTER TABLE `acms_shippings`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `acms_shop_categories`
--
ALTER TABLE `acms_shop_categories`
  MODIFY `shop_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `acms_shop_items`
--
ALTER TABLE `acms_shop_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `acms_shop_items_images`
--
ALTER TABLE `acms_shop_items_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `acms_users`
--
ALTER TABLE `acms_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `mod_showcase_category`
--
ALTER TABLE `mod_showcase_category`
  MODIFY `sc_category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mod_showcase_images`
--
ALTER TABLE `mod_showcase_images`
  MODIFY `sc_image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mod_showcase_item`
--
ALTER TABLE `mod_showcase_item`
  MODIFY `sc_item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mod_showcase_images`
--
ALTER TABLE `mod_showcase_images`
  ADD CONSTRAINT `fk_mod_showcase_images_mod_showcase_item1` FOREIGN KEY (`fk_sc_item_id`) REFERENCES `mod_showcase_item` (`sc_item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mod_showcase_item_has_category`
--
ALTER TABLE `mod_showcase_item_has_category`
  ADD CONSTRAINT `fk_mod_showcase_item_has_mod_showcase_category_mod_showcase_c1` FOREIGN KEY (`fk_sc_category_id`) REFERENCES `mod_showcase_category` (`sc_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mod_showcase_item_has_mod_showcase_category_mod_showcase_i` FOREIGN KEY (`fk_sc_item_id`) REFERENCES `mod_showcase_item` (`sc_item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
