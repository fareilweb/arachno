-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2016 at 11:55 AM
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
(3, 1, 'Shop', '/Shop/showItems/all', '', 1),
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
-- Table structure for table `acms_shop_categories`
--

CREATE TABLE `acms_shop_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(80) DEFAULT NULL,
  `category_status` tinyint(1) DEFAULT '1',
  `fk_lang_id` int(11) NOT NULL,
  `fk_parent_id` int(11) NOT NULL DEFAULT '0',
  `category_parent_name` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acms_shop_categories`
--

INSERT INTO `acms_shop_categories` (`category_id`, `category_name`, `category_status`, `fk_lang_id`, `fk_parent_id`, `category_parent_name`) VALUES
(2, 'Categoria Oggetti 02', 1, 1, 1, 'Categoria Oggetti 01'),
(3, 'Un altro nome', 1, 2, 2, 'Categoria Oggetti 02'),
(4, 'Ero senza nome', 0, 1, 2, 'Categoria Oggetti 02');

-- --------------------------------------------------------

--
-- Table structure for table `acms_shop_images`
--

CREATE TABLE `acms_shop_images` (
  `image_id` int(11) NOT NULL,
  `image_src` varchar(256) DEFAULT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `image_title` varchar(100) DEFAULT NULL,
  `image_alt` varchar(100) DEFAULT NULL,
  `is_main` tinyint(1) DEFAULT '0',
  `fk_item_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acms_shop_items`
--

CREATE TABLE `acms_shop_items` (
  `item_id` int(11) NOT NULL,
  `item_code` varchar(45) DEFAULT NULL,
  `fk_category_id` int(11) DEFAULT NULL,
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

INSERT INTO `acms_shop_items` (`item_id`, `item_code`, `fk_category_id`, `fk_lang_id`, `item_status`, `item_stock`, `item_price`, `item_title`, `item_weight`, `item_colors`, `item_short_desc`, `item_long_desc`, `item_meta_keywords`, `item_meta_description`) VALUES
(1, 'AAA001', 1, 1, 1, 100, 999.99, 'Titolo Primo Prodotto di Esempio MOD 5', '11', 'Rosso', 'Breve testo descrittivo del primo Prodotto di Esempio. Donec erat elit, pulvinar vel tempus quis, ul', 'Descrizione Testuale Estesa del Primo Prodotto di Esempio. Donec erat elit, pulvinar vel tempus quis, ullamcorper eget mi. Proin sit amet massa odio. Phasellus ligula nisl, gravida vel tortor consequat, ullamcorper porta ligula. Cras viverra ligula ac dolor aliquam, cursus auctor mi venenatis. Sed laoreet vehicula sem, quis ultrices libero rhoncus vitae. Pellentesque porttitor tellus et dui gravida, sollicitudin pretium magna bibendum. Etiam efficitur turpis nulla, auctor sodales nisl viverra eget.', 'primo, prodotto, esempio, parole, chiave, meta tag', 'Descrizione Meta Tag del Primo Prodotto di Esempio.'),
(18, 'AAA002', 1, 1, 1, 100, 199.99, 'Titolo Secondo Prodotto di Esempio', '22', 'Verde', 'Breve testo descrittivo del secondo Prodotto di Esempio. Donec erat elit, pulvinar vel tempus quis, ', 'Descrizione Testuale Estesa del Secondo Prodotto di Esempio. Donec erat elit, pulvinar vel tempus quis, ullamcorper eget mi. Proin sit amet massa odio. Phasellus ligula nisl, gravida vel tortor consequat, ullamcorper porta ligula. Cras viverra ligula ac dolor aliquam, cursus auctor mi venenatis. Sed laoreet vehicula sem, quis ultrices libero rhoncus vitae. Pellentesque porttitor tellus et dui gravida, sollicitudin pretium magna bibendum. Etiam efficitur turpis nulla, auctor sodales nisl viverra eget.', 'secondo, prodotto, esempio, parole, chiave, meta tag', 'Descrizione Meta Tag del Secondo Prodotto di Esempio.'),
(23, '', 1, 0, 0, 0, 0, '', '', '', '', '', '', ''),
(24, '', 1, 0, 0, 0, 0, '', '', '', '', '', '', '');

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
(21, '2016-07-02 22:00:00', 1, '36660e59856b4de58a219bcf4e27eba3', 'admin', 'Admin', 'DiaTech', 'info@diatech.it', '000999888', '3334445556', '$1$rasmusle$C9Hxb8sS4oYt1e5VbQc0I.', 1);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `acms_shop_categories`
--
ALTER TABLE `acms_shop_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `fk_acms_shop_categories_acsm_languages1_idx` (`fk_lang_id`),
  ADD KEY `fk_acms_shop_categories_acms_shop_categories_idx` (`fk_parent_id`);

--
-- Indexes for table `acms_shop_images`
--
ALTER TABLE `acms_shop_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_acms_items_images_acms_shop_items1_idx` (`fk_item_id`);

--
-- Indexes for table `acms_shop_items`
--
ALTER TABLE `acms_shop_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_shop_items_shop_categories_idx` (`fk_category_id`),
  ADD KEY `fk_acms_shop_items_acsm_languages1_idx` (`fk_lang_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `acms_shop_images`
--
ALTER TABLE `acms_shop_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acms_shop_items`
--
ALTER TABLE `acms_shop_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `acms_users`
--
ALTER TABLE `acms_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
