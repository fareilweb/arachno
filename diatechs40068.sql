-- phpMyAdmin SQL Dump
-- version 2.8.0.2
-- http://www.phpmyadmin.net
-- 
-- Host: sql.dia-techshop.it
-- Generato il: 24 Lug, 2016 at 05:23 PM
-- Versione MySQL: 5.1.49
-- Versione PHP: 4.3.10-22
-- 
-- Database: `diatechs40068`
-- 

-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_coupons`
-- 

CREATE TABLE `acms_coupons` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(80) DEFAULT NULL,
  `coupon_start_date` date DEFAULT NULL,
  `coupon_end_date` date DEFAULT NULL,
  `coupon_value_type` varchar(10) DEFAULT NULL,
  `coupon_value_amount` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `acms_coupons`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_coupons_has_items`
-- 

CREATE TABLE `acms_coupons_has_items` (
  `fk_coupon_id` int(11) NOT NULL,
  `fk_item_id` int(11) NOT NULL,
  PRIMARY KEY (`fk_coupon_id`,`fk_item_id`),
  KEY `fk_acms_coupons_has_acms_shop_items_acms_shop_items1_idx` (`fk_item_id`),
  KEY `fk_acms_coupons_has_acms_shop_items_acms_coupons1_idx` (`fk_coupon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `acms_coupons_has_items`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_items_has_categories`
-- 

CREATE TABLE `acms_items_has_categories` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`,`category_id`),
  KEY `fk_acms_shop_items_has_acms_shop_categories_acms_shop_categ_idx` (`category_id`),
  KEY `fk_acms_shop_items_has_acms_shop_categories_acms_shop_items_idx` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `acms_items_has_categories`
-- 

INSERT INTO `acms_items_has_categories` (`item_id`, `category_id`) VALUES (3, 4),
(49, 0),
(49, 8),
(49, 14);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_languages`
-- 

CREATE TABLE `acms_languages` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_iso_code` varchar(4) DEFAULT NULL,
  `lang_internal_code` varchar(8) DEFAULT NULL,
  `lang_name` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dump dei dati per la tabella `acms_languages`
-- 

INSERT INTO `acms_languages` (`lang_id`, `lang_iso_code`, `lang_internal_code`, `lang_name`) VALUES (1, 'it', 'it-IT', 'Italiano'),
(2, 'en', 'en-GB', 'English');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_menus`
-- 

CREATE TABLE `acms_menus` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fk_lang_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `fk_acms_menu_list_acsm_languages1_idx` (`fk_lang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Dump dei dati per la tabella `acms_menus`
-- 

INSERT INTO `acms_menus` (`menu_id`, `menu_title`, `fk_lang_id`) VALUES (1, 'Menu Principale', 1);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_menus_links`
-- 

CREATE TABLE `acms_menus_links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_menu_id` int(11) NOT NULL,
  `link_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link_rel_uri` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `link_abs_uri` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fk_lang_id` int(11) NOT NULL,
  PRIMARY KEY (`link_id`),
  KEY `fk_acms_menu_items_acsm_languages1_idx` (`fk_lang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- 
-- Dump dei dati per la tabella `acms_menus_links`
-- 

INSERT INTO `acms_menus_links` (`link_id`, `fk_menu_id`, `link_title`, `link_rel_uri`, `link_abs_uri`, `fk_lang_id`) VALUES (1, 1, 'Home', '/', 'NULL', 1),
(2, 1, 'Test Page', '/test-page', '', 1),
(3, 1, 'Shop', '/Shop/home', '', 1),
(5, 1, 'Accesso', '/User/login/redirect/User/login', '', 1),
(6, 1, 'Registrati', '/User/register', '', 1),
(7, 1, 'Amministrazione', '/Admin', '', 1);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_pages`
-- 

CREATE TABLE `acms_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fk_author_user_id` int(11) NOT NULL,
  `page_title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `page_content` text CHARACTER SET utf8,
  `page_meta_description` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `page_meta_keywords` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `fk_lang_id(11)` int(11) DEFAULT NULL,
  PRIMARY KEY (`page_id`,`page_slug`),
  KEY `fk_acms_pages_acsm_languages1_idx` (`fk_lang_id(11)`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Dump dei dati per la tabella `acms_pages`
-- 

INSERT INTO `acms_pages` (`page_id`, `page_slug`, `fk_author_user_id`, `page_title`, `page_content`, `page_meta_description`, `page_meta_keywords`, `fk_lang_id(11)`) VALUES (1, 'home', 1, 'Home Page', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget ipsum sit amet mauris fringilla hendrerit. Mauris convallis luctus convallis. Nam convallis felis in arcu porta rutrum. Maecenas consequat elementum tellus, eu volutpat ante elementum ac. Integer vestibulum justo a quam fermentum, id maximus erat lacinia. Morbi convallis, nisi id vehicula faucibus, diam lorem commodo elit, vel feugiat tellus urna in est. Sed sit amet euismod felis, a lobortis sem. Curabitur vel erat velit. Ut dolor nisi, dapibus nec massa eget, pulvinar aliquet mi.  Aliquam tincidunt id dolor in tristique. Sed posuere et mauris in auctor. Pellentesque nulla est, bibendum egestas mauris egestas, aliquam hendrerit felis. Etiam maximus porttitor neque, eu cursus velit tempus fringilla. Morbi ultricies enim non ipsum cursus, et mattis diam suscipit. Aenean in auctor leo. Nulla gravida tempor dolor ac condimentum. Aliquam erat volutpat. Mauris odio augue, fringilla sit amet aliquet sed, rutrum non mauris.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum, dolor sit amet, consectetur, adipiscing', 1),
(2, 'test-page', 1, 'Test Page Title', 'Test Page - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget ipsum sit amet mauris fringilla hendrerit. Mauris convallis luctus convallis. Nam convallis felis in arcu porta rutrum. Maecenas consequat elementum tellus, eu volutpat ante elementum ac. Integer vestibulum justo a quam fermentum, id maximus erat lacinia. Morbi convallis, nisi id vehicula faucibus, diam lorem commodo elit, vel feugiat tellus urna in est. Sed sit amet euismod felis, a lobortis sem. Curabitur vel erat velit. Ut dolor nisi, dapibus nec massa eget, pulvinar aliquet mi. Aliquam tincidunt id dolor in tristique. Sed posuere et mauris in auctor. Pellentesque nulla est, bibendum egestas mauris egestas, aliquam hendrerit felis. Etiam maximus porttitor neque, eu cursus velit tempus fringilla. Morbi ultricies enim non ipsum cursus, et mattis diam suscipit. Aenean in auctor leo. Nulla gravida tempor dolor ac condimentum. Aliquam erat volutpat. Mauris odio augue, fringilla sit amet aliquet sed, rutrum non mauris.', 'Test Page - Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 'Test Page, Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 1);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_payments`
-- 

CREATE TABLE `acms_payments` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(80) DEFAULT NULL,
  `payment_cost` float DEFAULT NULL,
  `payment_details` text,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `acms_payments`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_payments_has_items`
-- 

CREATE TABLE `acms_payments_has_items` (
  `fk_payment_id` int(11) NOT NULL,
  `fk_item_id` int(11) NOT NULL,
  PRIMARY KEY (`fk_payment_id`,`fk_item_id`),
  KEY `fk_acms_payments_has_acms_shop_items_acms_shop_items1_idx` (`fk_item_id`),
  KEY `fk_acms_payments_has_acms_shop_items_acms_payments1_idx` (`fk_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `acms_payments_has_items`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_shippings`
-- 

CREATE TABLE `acms_shippings` (
  `shipping_id` int(11) NOT NULL,
  `shipping_name` varchar(45) DEFAULT NULL,
  `shipping_cost` float DEFAULT NULL,
  `shipping_details` text,
  `shipping_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `acms_shippings`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_shippings_has_items`
-- 

CREATE TABLE `acms_shippings_has_items` (
  `fk_shipping_id` int(11) NOT NULL,
  `fk_item_id` int(11) NOT NULL,
  PRIMARY KEY (`fk_shipping_id`,`fk_item_id`),
  KEY `fk_acms_shippings_has_acms_shop_items_acms_shop_items1_idx` (`fk_item_id`),
  KEY `fk_acms_shippings_has_acms_shop_items_acms_shippings1_idx` (`fk_shipping_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `acms_shippings_has_items`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_shop_categories`
-- 

CREATE TABLE `acms_shop_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(80) DEFAULT NULL,
  `category_status` tinyint(1) DEFAULT '1',
  `category_image_src` varchar(256) DEFAULT NULL,
  `fk_lang_id` int(11) NOT NULL,
  `fk_parent_id` int(11) NOT NULL DEFAULT '0',
  `category_parent_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  KEY `fk_acms_shop_categories_acsm_languages1_idx` (`fk_lang_id`),
  KEY `fk_acms_shop_categories_acms_shop_categories_idx` (`fk_parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- Dump dei dati per la tabella `acms_shop_categories`
-- 

INSERT INTO `acms_shop_categories` (`category_id`, `category_name`, `category_status`, `category_image_src`, `fk_lang_id`, `fk_parent_id`, `category_parent_name`) VALUES (14, 'Strumenti', 1, 'http://localhost/arachno/views/images/shop/categories/category_14.png', 1, 8, 'Pediatria'),
(13, 'Test su feci', 1, 'http://localhost/arachno/views/images/shop/categories/category_13.png', 1, 9, 'Test Medici Rapidi'),
(12, 'Test su urine', 1, 'http://localhost/arachno/views/images/shop/categories/category_12.png', 1, 9, 'Test Medici Rapidi'),
(11, 'Test su tampone', 1, 'http://localhost/arachno/views/images/shop/categories/category_11.png', 1, 9, 'Test Medici Rapidi'),
(8, 'Pediatria', 1, 'http://localhost/arachno/views/images/shop/categories/category_8.png', 1, 0, ''),
(9, 'Test Medici Rapidi', 1, 'http://localhost/arachno/views/images/shop/categories/category_9.png', 1, 8, 'Pediatria'),
(10, 'Test su Sangue', 1, 'http://localhost/arachno/views/images/shop/categories/category_10.png', 1, 9, 'Test Medici Rapidi'),
(15, 'Monouso', 1, 'http://localhost/arachno/views/images/shop/categories/category_15.png', 1, 8, 'Pediatria');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_shop_items`
-- 

CREATE TABLE `acms_shop_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `item_meta_description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `fk_acms_shop_items_acsm_languages1_idx` (`fk_lang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

-- 
-- Dump dei dati per la tabella `acms_shop_items`
-- 

INSERT INTO `acms_shop_items` (`item_id`, `item_code`, `fk_lang_id`, `item_status`, `item_stock`, `item_price`, `item_title`, `item_weight`, `item_colors`, `item_short_desc`, `item_long_desc`, `item_meta_keywords`, `item_meta_description`) VALUES (49, '051212001', 0, 1, 5, 95, 'NADALÂ® - Calprotectina - 10 test', '', '', 'Test qualitativo in cassetta per la determinazione della calprotectina nelle feci', '', '', '');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_shop_items_images`
-- 

CREATE TABLE `acms_shop_items_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_src` varchar(256) DEFAULT NULL,
  `image_path` varchar(256) DEFAULT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `image_title` varchar(100) DEFAULT NULL,
  `image_alt` varchar(100) DEFAULT NULL,
  `is_main` tinyint(1) DEFAULT '0',
  `fk_item_id` int(11) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `fk_acms_shop_images_acms_shop_items1_idx` (`fk_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

-- 
-- Dump dei dati per la tabella `acms_shop_items_images`
-- 

INSERT INTO `acms_shop_items_images` (`image_id`, `image_src`, `image_path`, `image_name`, `image_title`, `image_alt`, `is_main`, `fk_item_id`) VALUES (81, 'http://www.dia-techshop.it/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg', '/home/mhd-01/www.dia-techshop.it/htdocs/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg', '2016_July_24_Sunday_11_29_27___heart-4.jpg', '', '', 0, 49);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_users`
-- 

CREATE TABLE `acms_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `fk_lang_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_acms_users_acsm_languages1_idx` (`fk_lang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- 
-- Dump dei dati per la tabella `acms_users`
-- 

INSERT INTO `acms_users` (`user_id`, `user_reg_date`, `user_activation`, `hash_user_activation`, `user_type`, `user_name`, `user_surname`, `user_email`, `user_phone`, `user_mobile_phone`, `user_password`, `fk_lang_id`) VALUES (1, '2016-04-20 19:04:46', 1, '36660e59856b4de58a219bcf4e27eba3', 'admin', 'Luca', 'Cilfone', 'info@fareilweb.com', '3270158630', '3270158630', '$1$rasmusle$C9Hxb8sS4oYt1e5VbQc0I.', 1),
(21, '2016-07-03 00:00:00', 1, '36660e59856b4de58a219bcf4e27eba3', 'admin', 'Admin', 'DiaTech', 'info@dia-tech.it', '000999888', '3334445556', '$1$rasmusle$C9Hxb8sS4oYt1e5VbQc0I.', 1);
