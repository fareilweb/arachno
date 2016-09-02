-- phpMyAdmin SQL Dump
-- version 2.8.0.2
-- http://www.phpmyadmin.net
-- 
-- Host: sql.dia-techshop.it
-- Generato il: 02 Set, 2016 at 08:05 PM
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

UPDATE `acms_items_has_categories` SET `item_id` = 3, `category_id` = 4 WHERE  `item_id` = 3 AND `category_id` = 4,
UPDATE `acms_items_has_categories` SET `item_id` = 49, `category_id` = 8 WHERE  `item_id` = 49 AND `category_id` = 8,
UPDATE `acms_items_has_categories` SET `item_id` = 49, `category_id` = 9 WHERE  `item_id` = 49 AND `category_id` = 9,
UPDATE `acms_items_has_categories` SET `item_id` = 49, `category_id` = 10 WHERE  `item_id` = 49 AND `category_id` = 10,
UPDATE `acms_items_has_categories` SET `item_id` = 49, `category_id` = 11 WHERE  `item_id` = 49 AND `category_id` = 11,
UPDATE `acms_items_has_categories` SET `item_id` = 49, `category_id` = 12 WHERE  `item_id` = 49 AND `category_id` = 12,
UPDATE `acms_items_has_categories` SET `item_id` = 49, `category_id` = 13 WHERE  `item_id` = 49 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 49, `category_id` = 14 WHERE  `item_id` = 49 AND `category_id` = 14,
UPDATE `acms_items_has_categories` SET `item_id` = 49, `category_id` = 15 WHERE  `item_id` = 49 AND `category_id` = 15,
UPDATE `acms_items_has_categories` SET `item_id` = 50, `category_id` = 10 WHERE  `item_id` = 50 AND `category_id` = 10,
UPDATE `acms_items_has_categories` SET `item_id` = 50, `category_id` = 24 WHERE  `item_id` = 50 AND `category_id` = 24,
UPDATE `acms_items_has_categories` SET `item_id` = 51, `category_id` = 10 WHERE  `item_id` = 51 AND `category_id` = 10,
UPDATE `acms_items_has_categories` SET `item_id` = 51, `category_id` = 24 WHERE  `item_id` = 51 AND `category_id` = 24,
UPDATE `acms_items_has_categories` SET `item_id` = 52, `category_id` = 10 WHERE  `item_id` = 52 AND `category_id` = 10,
UPDATE `acms_items_has_categories` SET `item_id` = 52, `category_id` = 24 WHERE  `item_id` = 52 AND `category_id` = 24,
UPDATE `acms_items_has_categories` SET `item_id` = 53, `category_id` = 10 WHERE  `item_id` = 53 AND `category_id` = 10,
UPDATE `acms_items_has_categories` SET `item_id` = 53, `category_id` = 24 WHERE  `item_id` = 53 AND `category_id` = 24,
UPDATE `acms_items_has_categories` SET `item_id` = 54, `category_id` = 10 WHERE  `item_id` = 54 AND `category_id` = 10,
UPDATE `acms_items_has_categories` SET `item_id` = 54, `category_id` = 24 WHERE  `item_id` = 54 AND `category_id` = 24,
UPDATE `acms_items_has_categories` SET `item_id` = 55, `category_id` = 10 WHERE  `item_id` = 55 AND `category_id` = 10,
UPDATE `acms_items_has_categories` SET `item_id` = 55, `category_id` = 24 WHERE  `item_id` = 55 AND `category_id` = 24,
UPDATE `acms_items_has_categories` SET `item_id` = 56, `category_id` = 10 WHERE  `item_id` = 56 AND `category_id` = 10,
UPDATE `acms_items_has_categories` SET `item_id` = 56, `category_id` = 24 WHERE  `item_id` = 56 AND `category_id` = 24,
UPDATE `acms_items_has_categories` SET `item_id` = 57, `category_id` = 11 WHERE  `item_id` = 57 AND `category_id` = 11,
UPDATE `acms_items_has_categories` SET `item_id` = 57, `category_id` = 18 WHERE  `item_id` = 57 AND `category_id` = 18,
UPDATE `acms_items_has_categories` SET `item_id` = 58, `category_id` = 11 WHERE  `item_id` = 58 AND `category_id` = 11,
UPDATE `acms_items_has_categories` SET `item_id` = 58, `category_id` = 18 WHERE  `item_id` = 58 AND `category_id` = 18,
UPDATE `acms_items_has_categories` SET `item_id` = 59, `category_id` = 11 WHERE  `item_id` = 59 AND `category_id` = 11,
UPDATE `acms_items_has_categories` SET `item_id` = 59, `category_id` = 18 WHERE  `item_id` = 59 AND `category_id` = 18,
UPDATE `acms_items_has_categories` SET `item_id` = 60, `category_id` = 13 WHERE  `item_id` = 60 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 60, `category_id` = 25 WHERE  `item_id` = 60 AND `category_id` = 25,
UPDATE `acms_items_has_categories` SET `item_id` = 61, `category_id` = 13 WHERE  `item_id` = 61 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 61, `category_id` = 25 WHERE  `item_id` = 61 AND `category_id` = 25,
UPDATE `acms_items_has_categories` SET `item_id` = 62, `category_id` = 13 WHERE  `item_id` = 62 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 62, `category_id` = 25 WHERE  `item_id` = 62 AND `category_id` = 25,
UPDATE `acms_items_has_categories` SET `item_id` = 63, `category_id` = 13 WHERE  `item_id` = 63 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 63, `category_id` = 25 WHERE  `item_id` = 63 AND `category_id` = 25,
UPDATE `acms_items_has_categories` SET `item_id` = 64, `category_id` = 13 WHERE  `item_id` = 64 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 64, `category_id` = 25 WHERE  `item_id` = 64 AND `category_id` = 25,
UPDATE `acms_items_has_categories` SET `item_id` = 65, `category_id` = 13 WHERE  `item_id` = 65 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 65, `category_id` = 25 WHERE  `item_id` = 65 AND `category_id` = 25,
UPDATE `acms_items_has_categories` SET `item_id` = 66, `category_id` = 13 WHERE  `item_id` = 66 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 66, `category_id` = 25 WHERE  `item_id` = 66 AND `category_id` = 25,
UPDATE `acms_items_has_categories` SET `item_id` = 67, `category_id` = 13 WHERE  `item_id` = 67 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 67, `category_id` = 25 WHERE  `item_id` = 67 AND `category_id` = 25,
UPDATE `acms_items_has_categories` SET `item_id` = 68, `category_id` = 13 WHERE  `item_id` = 68 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 68, `category_id` = 25 WHERE  `item_id` = 68 AND `category_id` = 25,
UPDATE `acms_items_has_categories` SET `item_id` = 69, `category_id` = 13 WHERE  `item_id` = 69 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 69, `category_id` = 25 WHERE  `item_id` = 69 AND `category_id` = 25,
UPDATE `acms_items_has_categories` SET `item_id` = 70, `category_id` = 13 WHERE  `item_id` = 70 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 70, `category_id` = 25 WHERE  `item_id` = 70 AND `category_id` = 25,
UPDATE `acms_items_has_categories` SET `item_id` = 71, `category_id` = 12 WHERE  `item_id` = 71 AND `category_id` = 12,
UPDATE `acms_items_has_categories` SET `item_id` = 71, `category_id` = 19 WHERE  `item_id` = 71 AND `category_id` = 19,
UPDATE `acms_items_has_categories` SET `item_id` = 72, `category_id` = 12 WHERE  `item_id` = 72 AND `category_id` = 12,
UPDATE `acms_items_has_categories` SET `item_id` = 72, `category_id` = 19 WHERE  `item_id` = 72 AND `category_id` = 19,
UPDATE `acms_items_has_categories` SET `item_id` = 73, `category_id` = 12 WHERE  `item_id` = 73 AND `category_id` = 12,
UPDATE `acms_items_has_categories` SET `item_id` = 73, `category_id` = 19 WHERE  `item_id` = 73 AND `category_id` = 19,
UPDATE `acms_items_has_categories` SET `item_id` = 74, `category_id` = 12 WHERE  `item_id` = 74 AND `category_id` = 12,
UPDATE `acms_items_has_categories` SET `item_id` = 74, `category_id` = 19 WHERE  `item_id` = 74 AND `category_id` = 19,
UPDATE `acms_items_has_categories` SET `item_id` = 75, `category_id` = 13 WHERE  `item_id` = 75 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 75, `category_id` = 25 WHERE  `item_id` = 75 AND `category_id` = 25,
UPDATE `acms_items_has_categories` SET `item_id` = 76, `category_id` = 13 WHERE  `item_id` = 76 AND `category_id` = 13,
UPDATE `acms_items_has_categories` SET `item_id` = 76, `category_id` = 25 WHERE  `item_id` = 76 AND `category_id` = 25,
UPDATE `acms_items_has_categories` SET `item_id` = 77, `category_id` = 11 WHERE  `item_id` = 77 AND `category_id` = 11,
UPDATE `acms_items_has_categories` SET `item_id` = 77, `category_id` = 18 WHERE  `item_id` = 77 AND `category_id` = 18,
UPDATE `acms_items_has_categories` SET `item_id` = 78, `category_id` = 11 WHERE  `item_id` = 78 AND `category_id` = 11,
UPDATE `acms_items_has_categories` SET `item_id` = 78, `category_id` = 18 WHERE  `item_id` = 78 AND `category_id` = 18,
UPDATE `acms_items_has_categories` SET `item_id` = 79, `category_id` = 11 WHERE  `item_id` = 79 AND `category_id` = 11,
UPDATE `acms_items_has_categories` SET `item_id` = 79, `category_id` = 18 WHERE  `item_id` = 79 AND `category_id` = 18,
UPDATE `acms_items_has_categories` SET `item_id` = 80, `category_id` = 11 WHERE  `item_id` = 80 AND `category_id` = 11,
UPDATE `acms_items_has_categories` SET `item_id` = 80, `category_id` = 18 WHERE  `item_id` = 80 AND `category_id` = 18,
UPDATE `acms_items_has_categories` SET `item_id` = 81, `category_id` = 11 WHERE  `item_id` = 81 AND `category_id` = 11,
UPDATE `acms_items_has_categories` SET `item_id` = 81, `category_id` = 18 WHERE  `item_id` = 81 AND `category_id` = 18,
UPDATE `acms_items_has_categories` SET `item_id` = 82, `category_id` = 11 WHERE  `item_id` = 82 AND `category_id` = 11,
UPDATE `acms_items_has_categories` SET `item_id` = 82, `category_id` = 18 WHERE  `item_id` = 82 AND `category_id` = 18,
UPDATE `acms_items_has_categories` SET `item_id` = 83, `category_id` = 12 WHERE  `item_id` = 83 AND `category_id` = 12,
UPDATE `acms_items_has_categories` SET `item_id` = 83, `category_id` = 19 WHERE  `item_id` = 83 AND `category_id` = 19;

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

UPDATE `acms_languages` SET `lang_id` = 1, `lang_iso_code` = 'it', `lang_internal_code` = 'it-IT', `lang_name` = 'Italiano' WHERE  `lang_id` = 1,
UPDATE `acms_languages` SET `lang_id` = 2, `lang_iso_code` = 'en', `lang_internal_code` = 'en-GB', `lang_name` = 'English' WHERE  `lang_id` = 2;

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

UPDATE `acms_menus` SET `menu_id` = 1, `menu_title` = 'Menu Principale', `fk_lang_id` = 1 WHERE  `menu_id` = 1;

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
  `ordering` int(11) DEFAULT NULL,
  PRIMARY KEY (`link_id`),
  KEY `fk_acms_menu_items_acsm_languages1_idx` (`fk_lang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

-- 
-- Dump dei dati per la tabella `acms_menus_links`
-- 

UPDATE `acms_menus_links` SET `link_id` = 1, `fk_menu_id` = 1, `link_title` = 'Home', `link_rel_uri` = '/', `link_abs_uri` = 'NULL', `fk_lang_id` = 1, `ordering` = 1 WHERE  `link_id` = 1,
UPDATE `acms_menus_links` SET `link_id` = 2, `fk_menu_id` = 1, `link_title` = 'Test Page', `link_rel_uri` = '/test-page', `link_abs_uri` = 'NULL', `fk_lang_id` = 1, `ordering` = 2 WHERE  `link_id` = 2,
UPDATE `acms_menus_links` SET `link_id` = 3, `fk_menu_id` = 1, `link_title` = 'Shop', `link_rel_uri` = '/Shop/home', `link_abs_uri` = 'NULL', `fk_lang_id` = 1, `ordering` = 3 WHERE  `link_id` = 3,
UPDATE `acms_menus_links` SET `link_id` = 7, `fk_menu_id` = 1, `link_title` = 'Carrello', `link_rel_uri` = '/Shop/cart', `link_abs_uri` = 'NULL', `fk_lang_id` = 1, `ordering` = 4 WHERE  `link_id` = 7;

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

UPDATE `acms_pages` SET `page_id` = 1, `page_slug` = 'home', `fk_author_user_id` = 1, `page_title` = 'Home Page', `page_content` = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget ipsum sit amet mauris fringilla hendrerit. Mauris convallis luctus convallis. Nam convallis felis in arcu porta rutrum. Maecenas consequat elementum tellus, eu volutpat ante elementum ac. Integer vestibulum justo a quam fermentum, id maximus erat lacinia. Morbi convallis, nisi id vehicula faucibus, diam lorem commodo elit, vel feugiat tellus urna in est. Sed sit amet euismod felis, a lobortis sem. Curabitur vel erat velit. Ut dolor nisi, dapibus nec massa eget, pulvinar aliquet mi.  Aliquam tincidunt id dolor in tristique. Sed posuere et mauris in auctor. Pellentesque nulla est, bibendum egestas mauris egestas, aliquam hendrerit felis. Etiam maximus porttitor neque, eu cursus velit tempus fringilla. Morbi ultricies enim non ipsum cursus, et mattis diam suscipit. Aenean in auctor leo. Nulla gravida tempor dolor ac condimentum. Aliquam erat volutpat. Mauris odio augue, fringilla sit amet aliquet sed, rutrum non mauris.', `page_meta_description` = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', `page_meta_keywords` = 'Lorem ipsum, dolor sit amet, consectetur, adipiscing', `fk_lang_id(11)` = 1 WHERE  `page_id` = 1 AND CONVERT(`page_slug` USING utf8) = 'home',
UPDATE `acms_pages` SET `page_id` = 2, `page_slug` = 'test-page', `fk_author_user_id` = 1, `page_title` = 'Test Page Title', `page_content` = 'Test Page - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget ipsum sit amet mauris fringilla hendrerit. Mauris convallis luctus convallis. Nam convallis felis in arcu porta rutrum. Maecenas consequat elementum tellus, eu volutpat ante elementum ac. Integer vestibulum justo a quam fermentum, id maximus erat lacinia. Morbi convallis, nisi id vehicula faucibus, diam lorem commodo elit, vel feugiat tellus urna in est. Sed sit amet euismod felis, a lobortis sem. Curabitur vel erat velit. Ut dolor nisi, dapibus nec massa eget, pulvinar aliquet mi. Aliquam tincidunt id dolor in tristique. Sed posuere et mauris in auctor. Pellentesque nulla est, bibendum egestas mauris egestas, aliquam hendrerit felis. Etiam maximus porttitor neque, eu cursus velit tempus fringilla. Morbi ultricies enim non ipsum cursus, et mattis diam suscipit. Aenean in auctor leo. Nulla gravida tempor dolor ac condimentum. Aliquam erat volutpat. Mauris odio augue, fringilla sit amet aliquet sed, rutrum non mauris.', `page_meta_description` = 'Test Page - Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', `page_meta_keywords` = 'Test Page, Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', `fk_lang_id(11)` = 1 WHERE  `page_id` = 2 AND CONVERT(`page_slug` USING utf8) = 'test-page';

-- --------------------------------------------------------

-- 
-- Struttura della tabella `acms_payments`
-- 

CREATE TABLE `acms_payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_name` varchar(80) DEFAULT NULL,
  `payment_cost` float DEFAULT NULL,
  `payment_details` text,
  `payment_status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dump dei dati per la tabella `acms_payments`
-- 

UPDATE `acms_payments` SET `payment_id` = 1, `payment_name` = 'PayPal', `payment_cost` = 3, `payment_details` = 'Nessuno Dettaglio', `payment_status` = 1 WHERE  `payment_id` = 1,
UPDATE `acms_payments` SET `payment_id` = 2, `payment_name` = 'PostePay', `payment_cost` = 1, `payment_details` = 'Nessuno Dettaglio', `payment_status` = 1 WHERE  `payment_id` = 2,
UPDATE `acms_payments` SET `payment_id` = 3, `payment_name` = 'Bonifico', `payment_cost` = 0, `payment_details` = 'Nessuno Dettaglio', `payment_status` = 1 WHERE  `payment_id` = 3;

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
  `shipping_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_name` varchar(45) DEFAULT NULL,
  `shipping_cost` float DEFAULT NULL,
  `shipping_details` text,
  `shipping_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dump dei dati per la tabella `acms_shippings`
-- 

UPDATE `acms_shippings` SET `shipping_id` = 3, `shipping_name` = 'Posta Ordinaria', `shipping_cost` = 3, `shipping_details` = 'Nessun Dettaglio', `shipping_status` = 0 WHERE  `shipping_id` = 3,
UPDATE `acms_shippings` SET `shipping_id` = 4, `shipping_name` = 'Posta Prioritaria', `shipping_cost` = 5, `shipping_details` = 'Nessun Dettaglio', `shipping_status` = 1 WHERE  `shipping_id` = 4,
UPDATE `acms_shippings` SET `shipping_id` = 5, `shipping_name` = 'Corriere Espresso', `shipping_cost` = 7, `shipping_details` = 'Nessun Dettaglio', `shipping_status` = 1 WHERE  `shipping_id` = 5,
UPDATE `acms_shippings` SET `shipping_id` = 6, `shipping_name` = 'Spedizione USA', `shipping_cost` = 17, `shipping_details` = 'Nessun Dettaglio', `shipping_status` = 1 WHERE  `shipping_id` = 6;

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
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

-- 
-- Dump dei dati per la tabella `acms_shop_categories`
-- 

UPDATE `acms_shop_categories` SET `category_id` = 14, `category_name` = 'Strumenti', `category_status` = 1, `category_image_src` = 'http://localhost/arachno/views/images/shop/categories/category_14.png', `fk_lang_id` = 1, `fk_parent_id` = 8, `category_parent_name` = 'Pediatria' WHERE  `category_id` = 14,
UPDATE `acms_shop_categories` SET `category_id` = 13, `category_name` = 'Test su feci', `category_status` = 1, `category_image_src` = 'http://localhost/arachno/views/images/shop/categories/category_13.png', `fk_lang_id` = 1, `fk_parent_id` = 9, `category_parent_name` = 'Test Medici Rapidi' WHERE  `category_id` = 13,
UPDATE `acms_shop_categories` SET `category_id` = 12, `category_name` = 'Test su urine', `category_status` = 1, `category_image_src` = 'http://localhost/arachno/views/images/shop/categories/category_12.png', `fk_lang_id` = 1, `fk_parent_id` = 9, `category_parent_name` = 'Test Medici Rapidi' WHERE  `category_id` = 12,
UPDATE `acms_shop_categories` SET `category_id` = 11, `category_name` = 'Test su tampone', `category_status` = 1, `category_image_src` = 'http://localhost/arachno/views/images/shop/categories/category_11.png', `fk_lang_id` = 1, `fk_parent_id` = 9, `category_parent_name` = 'Test Medici Rapidi' WHERE  `category_id` = 11,
UPDATE `acms_shop_categories` SET `category_id` = 8, `category_name` = 'Pediatria', `category_status` = 1, `category_image_src` = 'http://localhost/arachno/views/images/shop/categories/category_8.png', `fk_lang_id` = 1, `fk_parent_id` = 0, `category_parent_name` = '' WHERE  `category_id` = 8,
UPDATE `acms_shop_categories` SET `category_id` = 9, `category_name` = 'Test Medici Rapidi', `category_status` = 1, `category_image_src` = 'http://localhost/arachno/views/images/shop/categories/category_9.png', `fk_lang_id` = 1, `fk_parent_id` = 8, `category_parent_name` = 'Pediatria' WHERE  `category_id` = 9,
UPDATE `acms_shop_categories` SET `category_id` = 10, `category_name` = 'Test su Sangue', `category_status` = 1, `category_image_src` = 'http://localhost/arachno/views/images/shop/categories/category_10.png', `fk_lang_id` = 1, `fk_parent_id` = 9, `category_parent_name` = 'Test Medici Rapidi' WHERE  `category_id` = 10,
UPDATE `acms_shop_categories` SET `category_id` = 15, `category_name` = 'Monouso', `category_status` = 1, `category_image_src` = 'http://localhost/arachno/views/images/shop/categories/category_15.png', `fk_lang_id` = 1, `fk_parent_id` = 8, `category_parent_name` = 'Pediatria' WHERE  `category_id` = 15,
UPDATE `acms_shop_categories` SET `category_id` = 16, `category_name` = 'Ginecologia', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 0, `category_parent_name` = '' WHERE  `category_id` = 16,
UPDATE `acms_shop_categories` SET `category_id` = 17, `category_name` = 'Test rapidi', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 16, `category_parent_name` = 'Ginecologia' WHERE  `category_id` = 17,
UPDATE `acms_shop_categories` SET `category_id` = 18, `category_name` = 'Test su tampone', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 17, `category_parent_name` = 'Test rapidi' WHERE  `category_id` = 18,
UPDATE `acms_shop_categories` SET `category_id` = 19, `category_name` = 'Test su urine', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 17, `category_parent_name` = 'Test rapidi' WHERE  `category_id` = 19,
UPDATE `acms_shop_categories` SET `category_id` = 20, `category_name` = 'Strumentazione', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 16, `category_parent_name` = 'Ginecologia' WHERE  `category_id` = 20,
UPDATE `acms_shop_categories` SET `category_id` = 21, `category_name` = 'Monouso', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 16, `category_parent_name` = 'Ginecologia' WHERE  `category_id` = 21,
UPDATE `acms_shop_categories` SET `category_id` = 22, `category_name` = 'Gastroenterologia', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 0, `category_parent_name` = '' WHERE  `category_id` = 22,
UPDATE `acms_shop_categories` SET `category_id` = 23, `category_name` = 'Test rapidi', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 22, `category_parent_name` = 'Gastroenterologia' WHERE  `category_id` = 23,
UPDATE `acms_shop_categories` SET `category_id` = 24, `category_name` = 'Test su sangue', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 0, `fk_parent_id` = 23, `category_parent_name` = 'Test rapidi' WHERE  `category_id` = 24,
UPDATE `acms_shop_categories` SET `category_id` = 25, `category_name` = 'Test su feci', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 23, `category_parent_name` = 'Test rapidi' WHERE  `category_id` = 25,
UPDATE `acms_shop_categories` SET `category_id` = 26, `category_name` = 'Test su respiro', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 22, `category_parent_name` = 'Gastroenterologia' WHERE  `category_id` = 26,
UPDATE `acms_shop_categories` SET `category_id` = 27, `category_name` = 'Strumentazione', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 22, `category_parent_name` = 'Gastroenterologia' WHERE  `category_id` = 27,
UPDATE `acms_shop_categories` SET `category_id` = 28, `category_name` = 'Monouso', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 22, `category_parent_name` = 'Gastroenterologia' WHERE  `category_id` = 28,
UPDATE `acms_shop_categories` SET `category_id` = 29, `category_name` = 'Laboratorio', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 0, `category_parent_name` = '' WHERE  `category_id` = 29,
UPDATE `acms_shop_categories` SET `category_id` = 30, `category_name` = 'Test rapidi', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 29, `category_parent_name` = 'Laboratorio' WHERE  `category_id` = 30,
UPDATE `acms_shop_categories` SET `category_id` = 31, `category_name` = 'Test su respiro', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 29, `category_parent_name` = 'Laboratorio' WHERE  `category_id` = 31,
UPDATE `acms_shop_categories` SET `category_id` = 32, `category_name` = 'Microbiologia', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 29, `category_parent_name` = 'Laboratorio' WHERE  `category_id` = 32,
UPDATE `acms_shop_categories` SET `category_id` = 33, `category_name` = 'Terreni di coltura', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 32, `category_parent_name` = 'Microbiologia' WHERE  `category_id` = 33,
UPDATE `acms_shop_categories` SET `category_id` = 34, `category_name` = 'Antibiotici', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 32, `category_parent_name` = 'Microbiologia' WHERE  `category_id` = 34,
UPDATE `acms_shop_categories` SET `category_id` = 35, `category_name` = 'Altri reagenti', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 32, `category_parent_name` = 'Microbiologia' WHERE  `category_id` = 35,
UPDATE `acms_shop_categories` SET `category_id` = 36, `category_name` = 'Chimica clinica', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 29, `category_parent_name` = 'Laboratorio' WHERE  `category_id` = 36,
UPDATE `acms_shop_categories` SET `category_id` = 37, `category_name` = 'Consumabili', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 29, `category_parent_name` = 'Laboratorio' WHERE  `category_id` = 37,
UPDATE `acms_shop_categories` SET `category_id` = 38, `category_name` = 'Allergologia', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 0, `category_parent_name` = '' WHERE  `category_id` = 38,
UPDATE `acms_shop_categories` SET `category_id` = 39, `category_name` = 'Prick test', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 38, `category_parent_name` = 'Allergologia' WHERE  `category_id` = 39,
UPDATE `acms_shop_categories` SET `category_id` = 40, `category_name` = 'Monouso', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 38, `category_parent_name` = 'Allergologia' WHERE  `category_id` = 40,
UPDATE `acms_shop_categories` SET `category_id` = 41, `category_name` = 'Patch test', `category_status` = 1, `category_image_src` = '', `fk_lang_id` = 1, `fk_parent_id` = 38, `category_parent_name` = 'Allergologia' WHERE  `category_id` = 41;

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
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

-- 
-- Dump dei dati per la tabella `acms_shop_items`
-- 

UPDATE `acms_shop_items` SET `item_id` = 49, `item_code` = '051212001', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 95, `item_title` = 'NADALÂ® - Calprotectina - 10 test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test qualitativo in cassetta per la determinazione della calprotectina nelle feci', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 49,
UPDATE `acms_shop_items` SET `item_id` = 50, `item_code` = '05252001', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 40.98, `item_title` = 'NADALÂ® - Mononucleosi Card - 20 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Il test Mononucleosi Ã¨ un test rapido per la ricerca degli anticorpi contro il virus Epstein-Barr (', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 50,
UPDATE `acms_shop_items` SET `item_id` = 51, `item_code` = '05312001', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 45.08, `item_title` = 'NADALÂ® - PCR Card - 20 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test semiquantitativo per la determinazione della Proteina C Reattiva (PCR)', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 51,
UPDATE `acms_shop_items` SET `item_id` = 52, `item_code` = '050234', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 65.57, `item_title` = 'FOOD DETECTIVE - 59 Alimenti - 1 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test rapido (40â€™) qualitativo per 59 intolleranze alimentari IgG con metodo elisa indiretto', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 52,
UPDATE `acms_shop_items` SET `item_id` = 53, `item_code` = '050236', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 14.75, `item_title` = 'Celiac Test - 1 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test rapido per la determinazione qualitativa degli anticorpi anti transglutaminasi IgA ', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 53,
UPDATE `acms_shop_items` SET `item_id` = 54, `item_code` = '05790002', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 94.27, `item_title` = 'Celiac Disease tTG & Gliadine Test - 10 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test rapido per la determinazione qualitativa simultanea degli anticorpi anti transglutaminasi IgA e', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 54,
UPDATE `acms_shop_items` SET `item_id` = 55, `item_code` = '05790001', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 94.27, `item_title` = 'NADAL - Celiachia tTg - 10 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test rapido per la determinazione qualitativa simultanea degli anticorpi anti transglutaminasi IgA, ', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 55,
UPDATE `acms_shop_items` SET `item_id` = 56, `item_code` = '05542001N', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 81.96, `item_title` = 'NADALÂ® - Tetano - 10 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test rapido per la rilevazione dello stato immunitario contro il tetano (rilevazione degli anticorpi', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 56,
UPDATE `acms_shop_items` SET `item_id` = 57, `item_code` = '05222001A', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 24.59, `item_title` = 'NADAL - Strep A Card - 20 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Diagnosi rapida in caso di sospetto di scarlattina / streptococco A. Test per la ricerca dell&#39;an', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 57,
UPDATE `acms_shop_items` SET `item_id` = 58, `item_code` = '05242001', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 40.98, `item_title` = 'NADALÂ® - Influenza A + B - 10 Test ', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Diagnosi rapida in caso di sospetto di influenza A (H1N1 e H5N1) e influenza B', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 58,
UPDATE `acms_shop_items` SET `item_id` = 59, `item_code` = '051120001', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 131.1, `item_title` = 'NADALÂ® - Candida Albicans - 20 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test rapido per la ricerca dell&#39;antigene Candida Albicans nel secreto vaginale', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 59,
UPDATE `acms_shop_items` SET `item_id` = 60, `item_code` = '050111', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 147.5, `item_title` = 'Calprotectina - 10 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test immunocromatografico per la determinazione semiquantitativa della calprotectina fecale. La dete', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 60,
UPDATE `acms_shop_items` SET `item_id` = 61, `item_code` = '051200001', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 147.5, `item_title` = 'NADALÂ® - Lactoferrina - 20 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test immunocromatografico per la determinazione qualitativa della Lactoferrina fecale.\r\nLa presenza ', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 61,
UPDATE `acms_shop_items` SET `item_id` = 62, `item_code` = '05272001', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 20.49, `item_title` = 'NADALÂ® - FOB - 40ng/mL - 20 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test immunocromatografico per la determinazione qualitativa del sangue occulto nelle feci', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 62,
UPDATE `acms_shop_items` SET `item_id` = 63, `item_code` = '05262002', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 94.27, `item_title` = 'NADALÂ® - H. Pylori Antigene Card - 20 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test immunocromatografico per la determinazione qualitativa della presenza dellâ€™Helicobacter pylor', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 63,
UPDATE `acms_shop_items` SET `item_id` = 64, `item_code` = '05481015', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 40.98, `item_title` = 'NADALÂ® - Rota-Adenovirus Card - 10 test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test immunocromatografico rapido per la determinazione simultanea dell&#39;antigene del Rotavirus e ', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 64,
UPDATE `acms_shop_items` SET `item_id` = 65, `item_code` = '05481016', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 24.59, `item_title` = 'NADALÂ® - Adenovirus Card - 10 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test immunocromatografico rapido per la determinazione simultanea dell&#39;antigene del Rotavirus e ', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 65,
UPDATE `acms_shop_items` SET `item_id` = 66, `item_code` = '05481017', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 24.59, `item_title` = 'NADALÂ® - Rotavirus Card - 10 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test immunocromatografico rapido per la determinazione simultanea dell&#39;antigene del Rotavirus e ', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 66,
UPDATE `acms_shop_items` SET `item_id` = 67, `item_code` = '051232001', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 24.59, `item_title` = 'NADALÂ® - Campylobacter Card - 10 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test immunocromatografico rapidoper la determinazione dell&#39;antigene del Campylobacter', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 67,
UPDATE `acms_shop_items` SET `item_id` = 68, `item_code` = '05582008', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 122.95, `item_title` = 'NADALÂ® - Clostridium Difficile (Tossina A+B) - 10 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test rapido per la determinazione dell&#39;antigene Clostridium Difficile con la differenziazione si', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 68,
UPDATE `acms_shop_items` SET `item_id` = 69, `item_code` = '051242002', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 61.47, `item_title` = 'NADALÂ® - Salmonella Typhi Card - 10 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test immunocromatografico rapido per la determinazione dell&#39;antigene della Salmonella Typhi', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 69,
UPDATE `acms_shop_items` SET `item_id` = 70, `item_code` = '051262002', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 61.47, `item_title` = 'NADALÂ® - Shigella Dysenteriae - 10 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test immunocromatografico rapido per la determinazione dei batteri della Shigella Dysenteriae tipo 1', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 70,
UPDATE `acms_shop_items` SET `item_id` = 71, `item_code` = '06137', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 20.49, `item_title` = 'NADALÂ® - Urine Strips 10 Parametri - 100 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Strisce reattive colorimetriche per la determinazione semiquantitativa dei seguenti asnaliti urinari', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 71,
UPDATE `acms_shop_items` SET `item_id` = 72, `item_code` = '0642000', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 450, `item_title` = 'NADALÂ® - Urine Strip Reader U-100 - 1 Pz', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Lettore semi automatico di strisce per urine. Dotato di stampante, tempo di lettura 30sec/test. 1000', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 72,
UPDATE `acms_shop_items` SET `item_id` = 73, `item_code` = '0642100A', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 24.59, `item_title` = 'NADALÂ® - Strip Urine (dedicate a Reader U-100) - 100 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Strisce reattive colorimetriche per la determinazione semiquantitativa dei seguenti asnaliti urinari', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 73,
UPDATE `acms_shop_items` SET `item_id` = 74, `item_code` = '05572004N', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 131.1, `item_title` = 'NADALÂ® - Streptococcus Pneumoniae - 10 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test rapido per la rilevazione degli antigeni dello Streptococcus Pneumoniae nelle urine', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 74,
UPDATE `acms_shop_items` SET `item_id` = 75, `item_code` = '05272015', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 100, `item_title` = 'NADALÂ® - Hb/Hp Complex - 25 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test immunocromatografico per la determinazione simultanea e qualitativa dellâ€™emoglobina e del com', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 75,
UPDATE `acms_shop_items` SET `item_id` = 76, `item_code` = '05272011', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 175, `item_title` = 'NADALÂ® - Hb/Hp Complex + Pazient set - 25 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test immunocromatografico per la determinazione simultanea e qualitativa dellâ€™emoglobina e del com', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 76,
UPDATE `acms_shop_items` SET `item_id` = 77, `item_code` = '05431001', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 300, `item_title` = 'NADALÂ® - PROM Test - 20 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test rapido immunocromatografico, a forma di penna, per uso diagnostico in vitro, per la diagnosi di', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 77,
UPDATE `acms_shop_items` SET `item_id` = 78, `item_code` = 'ICH-502', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 80, `item_title` = 'Chlamydia T.Card - 20 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test rapido immunocromatografico per la ricerca della Chlamydia Trachomatis nel tampone cervicale, t', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 78,
UPDATE `acms_shop_items` SET `item_id` = 79, `item_code` = '05232001', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 100, `item_title` = 'NADALÂ® - Strep B card - 20 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test immunocromatografico su membrana per la determinazione dello Streptococco B su tampone vaginale', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 79,
UPDATE `acms_shop_items` SET `item_id` = 80, `item_code` = '05840003', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 180, `item_title` = 'NADALÂ® - Trichomonas Vaginalis Card - 10 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Trichmonas Card Ã¨ test immunocromatografico per una rapida determinazione qualitativa della presenz', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 80,
UPDATE `acms_shop_items` SET `item_id` = 81, `item_code` = '050137', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 50, `item_title` = 'NADALÂ® - Gonorrea Strips - 10 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test rapido immunocromatografico, in strip, per la ricerca della gonorrea su secreto vaginale.', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 81,
UPDATE `acms_shop_items` SET `item_id` = 82, `item_code` = '05194001', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 100, `item_title` = 'NADALÂ® - pH Vaginale - 50 test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test rapido in strip per la determinazione del pH vaginale.', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 82,
UPDATE `acms_shop_items` SET `item_id` = 83, `item_code` = '05142002', `fk_lang_id` = 1, `item_status` = 1, `item_stock` = 5, `item_price` = 30, `item_title` = 'NADALÂ® - HCG 25mlU/mL - 30 Test', `item_weight` = '', `item_colors` = '', `item_short_desc` = 'Test di gravidanza rapido', `item_long_desc` = '', `item_meta_keywords` = '', `item_meta_description` = '' WHERE  `item_id` = 83;

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
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

-- 
-- Dump dei dati per la tabella `acms_shop_items_images`
-- 

UPDATE `acms_shop_items_images` SET `image_id` = 81, `image_src` = '/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg', `image_path` = '/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg', `image_name` = '2016_July_24_Sunday_11_29_27___heart-4.jpg', `image_title` = '', `image_alt` = '', `is_main` = 0, `fk_item_id` = 49 WHERE  `image_id` = 81,
UPDATE `acms_shop_items_images` SET `image_id` = 86, `image_src` = '/views/images/shop/items/2016_July_31_Sunday_20_11_11___butterfly-1.jpg', `image_path` = '/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg', `image_name` = '2016_July_31_Sunday_20_11_11___butterfly-1.jpg', `image_title` = '', `image_alt` = '', `is_main` = 0, `fk_item_id` = 49 WHERE  `image_id` = 86,
UPDATE `acms_shop_items_images` SET `image_id` = 89, `image_src` = '/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-2.png', `image_path` = '/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg', `image_name` = '2016_July_31_Sunday_20_11_12___heart-2.png', `image_title` = '', `image_alt` = '', `is_main` = 0, `fk_item_id` = 49 WHERE  `image_id` = 89,
UPDATE `acms_shop_items_images` SET `image_id` = 90, `image_src` = '/views/images/shop/items/2016_July_31_Sunday_20_11_12___heart-3.png', `image_path` = '/views/images/shop/items/2016_July_24_Sunday_11_29_27___heart-4.jpg', `image_name` = '2016_July_31_Sunday_20_11_12___heart-3.png', `image_title` = '', `image_alt` = '', `is_main` = 1, `fk_item_id` = 49 WHERE  `image_id` = 90;

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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

-- 
-- Dump dei dati per la tabella `acms_users`
-- 

UPDATE `acms_users` SET `user_id` = 1, `user_reg_date` = '2016-04-20 19:04:46', `user_activation` = 1, `hash_user_activation` = '36660e59856b4de58a219bcf4e27eba3', `user_type` = 'admin', `user_name` = 'Luca', `user_surname` = 'Cilfone', `user_email` = 'info@fareilweb.com', `user_phone` = '3270158630', `user_mobile_phone` = '3270158630', `user_password` = '$1$rasmusle$C9Hxb8sS4oYt1e5VbQc0I.', `fk_lang_id` = 1 WHERE  `user_id` = 1,
UPDATE `acms_users` SET `user_id` = 21, `user_reg_date` = '2016-07-03 00:00:00', `user_activation` = 1, `hash_user_activation` = '36660e59856b4de58a219bcf4e27eba3', `user_type` = 'admin', `user_name` = 'Admin', `user_surname` = 'DiaTech', `user_email` = 'info@dia-tech.it', `user_phone` = '000999888', `user_mobile_phone` = '3334445556', `user_password` = '$1$rasmusle$C9Hxb8sS4oYt1e5VbQc0I.', `fk_lang_id` = 1 WHERE  `user_id` = 21;
