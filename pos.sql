-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2018 at 01:19 AM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `pos_categories`
--

DROP TABLE IF EXISTS `pos_categories`;
CREATE TABLE IF NOT EXISTS `pos_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_ids` varchar(255) NOT NULL DEFAULT '',
  `category_name` varchar(255) NOT NULL DEFAULT '',
  `category_description` varchar(255) NOT NULL DEFAULT '',
  `category_image` varchar(255) NOT NULL DEFAULT '',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `category_timer` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_categories`
--

INSERT INTO `pos_categories` (`id`, `category_ids`, `category_name`, `category_description`, `category_image`, `user_id`, `category_timer`) VALUES
(1, '1', 'sushikaart', '', '', 1, 0),
(2, '2', 'tafelkaart', '', '', 1, 0),
(3, '3', 'drankenkaart', '', '', 1, 0),
(4, '4', 'wijnkaart', '', '', 1, 0),
(5, '5', 'ijs & koffie', '', '', 1, 0),
(7, '6', 'sterke dranken', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pos_config`
--

DROP TABLE IF EXISTS `pos_config`;
CREATE TABLE IF NOT EXISTS `pos_config` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=184 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pos_config`
--

INSERT INTO `pos_config` (`id`, `user_id`, `name`, `value`) VALUES
(93, '1', 'max_printer_width', '42'),
(41, 'css', '*', 'margin:0;border:none;text-decoration:none;'),
(42, 'css', '.floater', 'font-size:8;'),
(43, 'css', 'body', 'background:#000000;color:#FFFFFF;'),
(44, 'css', 'a', 'color:#FFFFFF;display:block;'),
(45, 'css', 'th', 'background:#123456;'),
(46, 'css', '.clock2', 'background:none;color:white;'),
(47, 'css', '.whity', 'background:white;color:black;'),
(48, 'css', '.ticket', 'border:2px #0000FF solid;background:#0000FF;width:100%;height:100%;vertical-align: middle;text-align:center;'),
(49, 'css', '.iticket', 'border:2px #FFFFFF solid;background:#FFF888;width:100%;height:100%;vertical-align: middle;text-align:center;color:black;'),
(50, 'css', '.rticket', 'border:2px #cccccc solid;background:#00FF00;width:100%;height:100%;vertical-align: middle;text-align:center;'),
(51, 'css', '.aticket', 'border:2px #FF0000 solid;background:#123456;width:100%;height:100%;vertical-align: middle;text-align:center;'),
(52, 'css', '.clock', 'background:#000000;font-weight:bold;color:white;width:100%;text-align: center;color:white;'),
(53, 'css', '.categoriez', 'border:2px #FF0000 solid;width:100%;height:100%;font-weight:bold;color:white;background:black;text-align:center;text-shadow;1px 1px 1px #000;vertical-align: top;'),
(54, 'css', '.red', 'border:2px #FF0000 solid;background:#000000;width:100%;height:100%;font-weight:bold;color:white;vertical-align: middle;text-align:center;'),
(55, 'css', '.total_red', 'border:2px #FF0000 solid;background:#880000;width:100%;height:100%;font-weight:bold;color:white;vertical-align: middle;text-align:center;font-size:16px;'),
(56, 'css', '.blue', 'border:2px #0000FF solid;background:#0000CC;width:100%;height:100%;font-weight:bold;color:white;vertical-align: middle;text-align:center;'),
(57, 'css', '.navy', 'border:2px #FF0000 solid;background:#383838;'),
(58, 'css', '.eee', 'background:#121212;'),
(59, 'css', '.borderz', 'border:1px #456789 solid;'),
(61, 'css', '.active', 'width:100%;height:100%;'),
(62, 'css', '.top5', 'border:2px #FFF888 solid;background:#000000;width:100%;height:100%;font-weight:bold;color:black;vertical-align: middle;text-align:center;'),
(63, 'css', '.subtotaal', 'font-size:18;font-weight:bold;color:red;'),
(64, 'css', '.opmerking', 'font-size:12;width:100%;text-align:left;color:yellow;'),
(65, 'css', '.alert', 'border:2px #FF0000 solid;background:#000000;width:100%;height:100%;font-weight:bold;color:#FFF888;vertical-align: middle;text-align:center;'),
(78, '1', 'illuminate', '0'),
(79, 'css', '.rticketnota', 'border:2px red solid;background:#FF0000;width:100%;height:100%;vertical-align: middle;text-align:center;color:black;'),
(80, 'css', '.rticketconfirm', 'border:2px green solid;background:#00FFFF;width:100%;height:100%;vertical-align: middle;text-align:center;color:black;'),
(81, '1', 'legenda', '1'),
(92, '1', 'inet_user_id', '2'),
(91, '1', 'priceab', '0'),
(86, '1', 'restaurant_user_id', '3'),
(94, '1', 'redirect_time', '15'),
(88, '1', 'opmerking_append', ''),
(99, '1', 'txt_footer', ''),
(100, '1', 'merge_same', '1'),
(101, '1', 'display_price', '1'),
(102, '1', 'restaurant_num', '1'),
(108, '1', 'debug', '0'),
(109, '1', 'floormap', '1'),
(110, '1', 'restaurant', '1'),
(112, 'css', '.attach', 'font-size:12;width:100%;text-align:left;color:red;'),
(113, '1', 'orders_options', '1'),
(114, '1', 'font_size_kitchen', '50'),
(115, '1', 'font_type_kitchen', 'Arial'),
(116, '1', 'max_printer_width_k', '38'),
(117, '1', 'kassa_title', 'iSushi.nl'),
(118, '1', 'font_size_kitchenw', '19'),
(119, '1', 'font_type_kitchenb', 'Arial'),
(120, '1', 'font_type_kitchenc', 'Arial'),
(121, '1', 'font_type_kitchend', 'Arial'),
(123, '1', 'bonnummer', '1'),
(124, 'css', '.borderzred', 'border:1px red solid;'),
(126, 'css', '.s1000', 'border:2px #123333 solid; background:#000000;width:100%; height:100%; font-weight:bold; color:#FFFFF3; vertical-align: middle; text-align:center;'),
(127, '1', 'workticket', ''),
(130, '1', 'attach', '0'),
(129, 'css', '.change', 'border:2px #FF0033 solid;background:#000000;width:100%;height:100%;font-weight:bold;color:white;vertical-align: middle;text-align:center;'),
(132, 'qm', '1', 'coca cola'),
(134, 'css', '.crticket', 'border:2px #cccccc solid;background:#9b9b9b;vertical-align: middle;text-align:center;width:100%;height:100%;'),
(137, 'work', 'tonijn fileren', ''),
(138, 'work', 'zalm fileren', ''),
(139, 'work', 'garnalen blancheren', ''),
(140, 'work', 'omelet bakken', ''),
(141, 'work', 'ama ebi uit', ''),
(142, 'work', 'paling uit', ''),
(143, 'work', 'krabstick uit', ''),
(144, 'work', 'temperatuur leverancier ebo vd bor', ''),
(145, 'work', 'temperatuur leverancier sligro', ''),
(146, 'work', 'temperatuur leverancier jan vas as', ''),
(147, 'work', 'ikura uit', ''),
(148, 'work', 'masago uit', ''),
(149, 'work', 'tobiko uit', ''),
(150, 'work', 'schoonmaak toonbank keuken 1 ', ''),
(151, 'work', 'schoonmaak toonbank keuken 2', ''),
(152, 'work', 'temperatuur toonbank keuken 1', ''),
(153, 'work', 'temperatuur toonbank keuken 2', ''),
(154, 'work', 'schoonmaak koeling keuken 1', ''),
(155, 'work', 'schoonmaak koeling keuken 2', ''),
(156, 'work', 'temperatuur koeling keuken 1', ''),
(157, 'work', 'temperatuur koeling keuken 2', ''),
(158, 'work', 'schoonmaak vriezer keuken 1', ''),
(159, 'work', 'temperatuur vriezer keuken 1', ''),
(160, 'work', 'schoonmaak frisdrank koeling achter bar', ''),
(161, 'work', 'temperatuur frisdrank koeling achter bar', ''),
(162, 'work', 'schoonmaak frisdrank koeling spoelkeuken', ''),
(163, 'work', 'temperatuur frisdrank koeling spoelkeuken', ''),
(164, 'work', 'schoonmaak vriezer spoelkeuken', ''),
(165, 'work', 'temperatuur vriezer spoelkeuken', ''),
(166, 'work', 'schoonmaak koel en vriezer spoelkeuken', ''),
(167, 'work', 'temperatuur koel en vriezer spoelkeuken', ''),
(168, 'work', 'onderhoud koffiezet aparaat', ''),
(169, 'work', 'onderhoud biertap installatie', ''),
(170, 'work', 'onderhoud luchtreiniger', ''),
(171, '1', 'alert', '504'),
(172, '1', 'alert', '503'),
(173, '1', 'alert', '502'),
(174, '1', 'alert', '501'),
(175, '1', 'alert', '500'),
(176, '1', 'alert', '253'),
(177, '1', 'alert', '252'),
(178, '1', 'alert', '251'),
(179, '1', 'alert', '250'),
(180, '1', 'alert', '210'),
(181, '1', 'alert', '206'),
(182, '1', 'alert', '205'),
(183, '1', 'counter', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pos_employees`
--

DROP TABLE IF EXISTS `pos_employees`;
CREATE TABLE IF NOT EXISTS `pos_employees` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(64) NOT NULL,
  `employee_pin` int(11) NOT NULL,
  `month` tinyint(3) UNSIGNED NOT NULL,
  `year` smallint(6) NOT NULL,
  `check_in` int(11) NOT NULL,
  `check_indate` varchar(32) NOT NULL,
  `check_out` int(11) NOT NULL,
  `check_outdate` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos_input`
--

DROP TABLE IF EXISTS `pos_input`;
CREATE TABLE IF NOT EXISTS `pos_input` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `attach_id` int(10) UNSIGNED NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `positioning` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `price` float(20,2) NOT NULL DEFAULT '0.00',
  `priceab` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `timer` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos_inputa`
--

DROP TABLE IF EXISTS `pos_inputa`;
CREATE TABLE IF NOT EXISTS `pos_inputa` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `attach_id` int(10) UNSIGNED NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `positioning` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `price` float(20,2) NOT NULL DEFAULT '0.00',
  `priceab` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `timer` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos_internet`
--

DROP TABLE IF EXISTS `pos_internet`;
CREATE TABLE IF NOT EXISTS `pos_internet` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `internet_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pos_internet_members`
--

DROP TABLE IF EXISTS `pos_internet_members`;
CREATE TABLE IF NOT EXISTS `pos_internet_members` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL,
  `bedrijf` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefoon` varchar(255) NOT NULL,
  `doe` varchar(255) NOT NULL,
  `datum` varchar(255) NOT NULL,
  `bonus` decimal(20,2) NOT NULL,
  `content` mediumtext NOT NULL,
  `uitvoer_datum` varchar(255) NOT NULL,
  `uitvoer_tijd` varchar(255) NOT NULL,
  `timer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6006 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory`
--

DROP TABLE IF EXISTS `pos_inventory`;
CREATE TABLE IF NOT EXISTS `pos_inventory` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_number` varchar(255) NOT NULL,
  `in` int(10) UNSIGNED NOT NULL,
  `out` int(10) UNSIGNED NOT NULL,
  `timer` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos_opmerking`
--

DROP TABLE IF EXISTS `pos_opmerking`;
CREATE TABLE IF NOT EXISTS `pos_opmerking` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `iputa_id` int(11) NOT NULL,
  `opmerking` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pos_orders`
--

DROP TABLE IF EXISTS `pos_orders`;
CREATE TABLE IF NOT EXISTS `pos_orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_ids` varchar(255) NOT NULL DEFAULT '',
  `order_name` varchar(255) NOT NULL DEFAULT '',
  `order_description` text NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT '',
  `order_amount` float(20,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `order_price` float(20,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `positioning` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `order_dater` varchar(255) NOT NULL DEFAULT '',
  `order_timer` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos_products`
--

DROP TABLE IF EXISTS `pos_products`;
CREATE TABLE IF NOT EXISTS `pos_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` varchar(255) NOT NULL DEFAULT '',
  `sub_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `product_number` varchar(255) NOT NULL DEFAULT '',
  `product_name` varchar(255) NOT NULL DEFAULT '',
  `product_description` varchar(255) NOT NULL DEFAULT '',
  `product_price` float(20,2) NOT NULL,
  `product_priceb` float(20,2) NOT NULL,
  `attach_price` float(20,2) NOT NULL,
  `product_tax` enum('0','1','2') NOT NULL DEFAULT '0',
  `product_image` varchar(255) NOT NULL DEFAULT '',
  `product_define` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `product_hits` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `product_timer` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=314 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_products`
--

INSERT INTO `pos_products` (`id`, `category_id`, `sub_id`, `product_number`, `product_name`, `product_description`, `product_price`, `product_priceb`, `attach_price`, `product_tax`, `product_image`, `product_define`, `product_hits`, `user_id`, `product_timer`) VALUES
(1, '1', 0, '', 'DIVERSEN LAAG', '', 0.00, 0.00, 0.00, '1', '', 1, 0, 1, 1460670317),
(2, '1', 0, '', 'DIVERSEN HOOG', '', 0.00, 0.00, 0.00, '2', '', 1, 0, 1, 1460670319),
(3, '1', 0, '', 'DIVERSEN NULL', '', 0.00, 0.00, 0.00, '0', '', 1, 0, 1, 1460670325),
(4, '1', 0, '', 'SUSHI', '', 0.00, 0.00, 0.00, '1', '', 1, 0, 1, 1460670329),
(5, '1', 0, '', 'CADEAU BON', '', 0.00, 0.00, 0.00, '1', '', 1, 0, 1, 1459434808),
(6, '1', 1, '1', 'nigiri spicy tonijn', 'nigiri ingekerfd tonijn met een druppeltje spicy saus, 2 stuks', 5.00, 0.00, 0.00, '1', '1', 0, 3, 1, 1460670835),
(7, '1', 1, '2', 'nigiri zalm komkommer ikura', 'nigiri van zalm met flinterdunne komkommer plakje en een mespuntje zalmeitje erop, 2 stuks ', 5.50, 0.00, 0.00, '1', '1', 0, 3, 1, 1460670493),
(8, '1', 1, '3', 'nigiri zalm avocado ikura', 'nigiri van zalm met avocado, toefje mayonaise en een mespuntje zalmeitje erop, 2 stuks', 5.50, 0.00, 0.00, '1', '1', 0, 2, 1, 1460670493),
(9, '1', 1, '4', 'rainbow californian', 'krabstick, komkommer, advocado en mayonaise met zalm, tonijn en mayonaise topping, 4 stuks', 8.00, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670470),
(10, '1', 1, '4a', 'rainbow californian negi', 'krabstick, komkommer, advocado en mayonaise met zalm, tonijn met lenteuitje en spicy mayonaise topping, 4 stuks', 8.00, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670470),
(11, '1', 1, '5', 'rainbow californian caterpillar', 'krabstick, komkommer, advocado en mayonaise met zalm, tonijn, avocado en mayonaise topping, 4 stuks', 9.00, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670834),
(12, '1', 1, '5A', 'zalm tonijn caterpillar ikura', 'krabstick, komkommer, advocado en mayonaise met zalm, tonijn, avocado en mayonaise topping, 4 stuks', 11.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460304232),
(13, '1', 1, '6', 'zalm dragon roll', 'krabstick, komkommer, advocado en mayonaise met zalm en mayonaise topping, 4 stuks', 6.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460217779),
(14, '1', 1, '6a', 'zalm dragon roll negi', 'krabstick, komkommer, advocado en mayonaise met zalm en mayonaise topping, 4 stuks', 6.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460207508),
(15, '1', 1, '7', 'tonijn dragon roll', 'krabstick, komkommer, advocado en mayonaise met tonijn en mayonaise topping, 4 stuks', 7.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1459703452),
(16, '1', 1, '7a', 'tonijn dragon roll negi', 'krabstick, komkommer, advocado en mayonaise met tonijn en mayonaise topping, 4 stuks', 7.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460207519),
(17, '1', 1, '8', 'californian paling', 'krabstick, komkommer, avocado en mayonnaise met gegrilde paling en kabayaki saus topping, 4 stuks', 7.50, 0.00, 0.00, '1', '1', 0, 2, 1, 1460670832),
(18, '1', 1, '9a', 'uramaki maguro', 'uramaki sushi zonder nori, gevuld met tonijn en tonijn sashimi topping', 8.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1380885676),
(19, '1', 1, '9', 'uramaki sake', 'uramaki sushi zonder nori, gevuld met zalm en zalm sashimi topping', 7.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1409421703),
(20, '1', 1, '9B', 'nigiri surfmossel', 'nigiri surfmossel', 7.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1449693225),
(21, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(22, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(23, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(24, '1', 10, '11', 'tonijn schotel', 'tonijnschotel van 3 plakjes sashimi van tonijn, 2 nigiri van tonijn en 4 maki van tonijn', 11.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460570292),
(25, '1', 10, '11A', '10 tonijn nigiri', '10 tonijn nigiri', 17.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1450274611),
(26, '1', 10, '12', 'zalm schotel ', 'zalmschotel van 3 plakjes sashimi van zalm, 2 nigiri van zalm en 4 maki van zalm', 8.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459453486),
(27, '1', 10, '12A', '10 zalm nigiri', '10 zalm nigiri', 15.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1451403780),
(28, '1', 10, '13', 'sushi mix', 'mixschotel van 8 california uramaki sushi in meerdere variaties, 2 nigiri sushi van tonijn, 2 nigiri sushi van zalm', 15.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460574575),
(29, '1', 10, '13a', 'vegetarische schotel', '', 15.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460469252),
(30, '1', 10, '14', 'californian uramaki', 'mixschotel van 12 californian uramaki sushi in meerdere variaties, voornamelijk krabstick, zalm en tonijn als ingredienten', 15.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460564505),
(31, '1', 10, '14A', 'crunchy uramaki mix', '12 crunchy uramaki mix', 16.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460564504),
(32, '1', 10, '15', 'sushi sashimi', 'mixschotel van 4 california uramaki sushi, 2 nigiri sushi van tonijn, 2 nigiri sushi van zalm, 3 plakjes sashimi van tonijn en 3 plakjes sashimi van zalm', 15.00, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670834),
(33, '1', 10, '16', 'tonijn zalm schotel', 'zalm en tonijn schotel van 4 maki sushi van tonijn, 4 maki sushi van zalm, 2 nigiri sushi van tonijn en 2 nigiri sushi van zalm', 15.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459441304),
(34, '1', 10, '16a', 'patience roll', 'zalm tonijn roll met veel lenteuitje ', 16.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460231496),
(35, '1', 10, '17', 'giant uramaki', '8 stuks gigantische uramaki sushi met 10 soorten ingrediënten verspreid in de sushi met zalm, tonijn, avocado, japanse mayonaise en rode vliegende viskuit topping ', 18.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460574700),
(36, '1', 10, '18', 'giant maki combo', '8 stuks gigantische maki sushi met 10 soorten ingrediënten verspreid in de sushi', 13.00, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670714),
(37, '1', 10, '18A', '16 stuks futomaki mix', '16 stuks futomaki mix', 20.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459523043),
(38, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(39, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(40, '1', 20, '21', 'sushi mix ninja', 'hetzelfde als 4 x 13 alleen meer gevarieerd', 60.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460301746),
(41, '1', 20, '22', 'sushi mix samoerai', 'hetzelfde als 6 x 13 alleen meer gevarieerd', 90.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460475698),
(42, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(43, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(44, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(45, '1', 30, '30', 'maki avocado', 'avocado', 3.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460210148),
(46, '1', 30, '30a', 'maki takuan', 'ingelegde witte raap', 3.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1445102857),
(47, '1', 30, '31', 'maki tonijn', 'verse rauwe tonijn filet', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460570321),
(48, '1', 30, '32', 'maki sake', 'verse rauwe zalm filet', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460207530),
(49, '1', 30, '32A', 'maki sake negi', 'verse rauwe zalm filet met mayonaise en bosuitjes', 5.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1459703454),
(50, '1', 30, '33', 'maki paling', 'gegrilde paling', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1457464692),
(51, '1', 30, '34a', 'maki ebi fry', 'maki ebi fry', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459698836),
(52, '1', 30, '34b', 'maki dubbel ebi fry', 'maki dubbel ebi fry', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460301255),
(53, '1', 30, '35', 'maki spicy tonijn', 'verse rauwe tonijn filet met spicy saus', 5.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1459693153),
(54, '1', 30, '36', 'maki spicy zalm', 'verse rauwe zalm filet met spicy mayo', 5.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1456670473),
(55, '1', 30, '37', 'maki krab', 'surimi krabstick', 4.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460298053),
(56, '1', 30, '37a', 'maki california', 'krabstick, advocado, komkommer en mayonaise ', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460212757),
(57, '1', 30, '38', 'maki omelet', 'gebakken zoete omelet', 4.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459086694),
(58, '1', 30, '39', 'maki komkommer', 'komkommer', 3.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460211174),
(59, '1', 30, '39a', 'maki asperge', 'maki asperge', 3.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1454521757),
(60, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(61, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(62, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(63, '1', 40, '41', 'nigiri tonijn', 'verse rauwe tonijn filet', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460570335),
(64, '1', 40, '42', 'nigiri zalm', 'verse rauwe zalm filet', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460475836),
(65, '1', 40, '43', 'nigiri paling', 'gegrilde paling', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460128480),
(66, '1', 40, '44A', 'nigiri surimi', 'surimi krabstick', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1458487073),
(67, '1', 40, '45', 'nigiri avocado', 'avocado.', 4.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1458420039),
(68, '1', 40, '46', 'nigiri tonijn abocado', 'tonijn filet, plakje avocado en een toefje mayonaise', 7.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460298059),
(69, '1', 40, '46A', 'nigiri tonijn negi', 'tonijn filet, plukje lenteuitjes en een spicy mayonaise', 7.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460207533),
(70, '1', 40, '46B', 'nigiri tonijn gari', 'tonijn filet, plukje lenteuitjes met gember vruchtendressing', 7.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1452445323),
(71, '1', 40, '47', 'nigiri zalm abocado', 'zalm filet, plakje avocado en een toefje mayonaise', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460475903),
(72, '1', 40, '47A', 'nigiri zalm negi', 'zalm filet, plukje lenteuitjes en een spicy mayonaise', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460207535),
(73, '1', 40, '47B', 'nigiri zalm gari', 'zalm filet, plukje lenteuitjes met gember vruchtendressing', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1455213758),
(74, '1', 40, '48', 'nigiri omelet', 'gebakken zoete omelet.', 4.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460221946),
(75, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(76, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(77, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(78, '1', 50, '51', 'temaki tonijn ', '2 plakjes tonijn, avocado, komkommer en mayonaise', 4.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460574588),
(79, '1', 50, '52', 'temaki zalm ', '2 plakjes zalm, avocado, komkommer en mayonaise', 3.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460574588),
(80, '1', 50, '53', 'temaki paling', '2 plakjes paling, advocado, komkommer en mayonaise', 5.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460301763),
(81, '1', 50, '54A', 'temaki crunchy ebi', 'tempura garnaal, avocado, komkommer en mayonaise', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460307479),
(82, '1', 50, '55', 'california temaki', 'krabstick, advocado, komkommer en mayonaise ', 3.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459869395),
(83, '1', 50, '56', 'kamikaze temaki', '2 plakjes tonijn filet, 2 plakjes paling, advocado en shichimi aioli', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1458753454),
(84, '1', 50, '57', 'butterfly temaki', '2 plakjes zalm, krabstick, advocado, komkommer en mayonaise', 4.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1459175539),
(85, '1', 50, '58', 'yasai temaki', 'omelet, avocado, komkommer, sesam en mayonaise', 4.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460294679),
(86, '1', 50, '59', 'crazy tonijn temaki', '3 plakjes tonijn, avocado, masago en mayonaise', 5.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1459520506),
(87, '1', 50, '60', 'temaki spicy tuna', '3 plakjes tonijn en spicy saus', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459442172),
(88, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(89, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(90, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(91, '1', 60, '61', 'gunkan ikura', 'zalm kuit', 7.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459102006),
(92, '1', 60, '62', 'gunkan masago', 'oranje smelt viseitjes', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460210157),
(93, '1', 60, '63', 'gunkan tobiko', 'rode vliegende viskuit', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459872882),
(94, '1', 60, '65', 'gunkan avocado crunchy', 'maki avocado met een lepeltje crunchy toping', 4.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460294681),
(95, '1', 60, '66', 'gunkan maguro negi', 'tonijn', 7.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1427911659),
(96, '1', 60, '66a', 'hotate gunkan californian', 'hotate gunkan californian', 8.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1453650271),
(97, '1', 60, '66b', 'hotate gunkan ikura', 'hotate gunkan ikura', 9.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1444144045),
(98, '1', 60, '67', 'gunkan sake negi', 'zalm', 6.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1446652965),
(99, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(100, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(101, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(102, '1', 70, '71', 'sashimi tonijn', '5 plakjes verse rauwe tonijn filet', 5.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460301425),
(103, '1', 70, '71b', 'maki sashimi tonijn', '4 stuks maki tonijn sushi zonder rijst', 7.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1457883282),
(104, '1', 70, '72', 'sashimi zalm', '5 plakjes verse rauwe zalm filet', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460484662),
(105, '1', 70, '72b', 'maki sashimi zalm', '4 stuks maki zalm sushi zonder rijst', 6.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460210082),
(106, '1', 70, '73', 'paling kabayaki', '5 plakjes gegrilde paling met kabayaki saus', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459875628),
(107, '1', 70, '75', 'sashimi avocado', '10 dunne plakjes avocado', 3.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460298070),
(108, '1', 70, '76', 'sashimi spicy tonijn', '5 plakjes verse rauwe tonijn filet met spicy saus', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459693161),
(109, '1', 70, '77', 'sashimi spicy zalm', '5 plakjes verse rauwe zalm filet met spicy saus', 5.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1451410152),
(110, '1', 70, '78', 'sashimi tonijn en zalm', '5 plakjes tonijn en 5 plakjes zalm', 9.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460560376),
(111, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(112, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(113, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(114, '1', 80, '80', 'uramaki masago krab', 'krabstick, advocado, , komkommer en mayonaise met masago topping', 6.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1459872451),
(115, '1', 80, '80A', 'uramaki masago tonijn', 'tonijn, avocado, komkommer en mayonaise met masago topping', 7.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460558542),
(116, '1', 80, '80B', 'uramaki masago zalm', 'zalm, avocado, komkommer en mayonaise met masago topping', 6.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460041917),
(117, '1', 80, '81', 'uramaki california krab', 'krabstick, advocado, komkommer en mayonaise met sesam topping', 6.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1459019284),
(118, '1', 80, '81A', 'uramaki california tonijn', 'tonijn, advocado, komkommer en mayonaise met sesam topping', 6.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1459538011),
(119, '1', 80, '81B', 'uramaki california zalm', 'zalm, advocado, komkommer en mayonaise met sesam topping', 6.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1459703473),
(120, '1', 80, '82', 'uramaki california tobiko', 'krabstick, advocado, komkommer en mayonaise met tobiko topping', 7.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1459101989),
(121, '1', 80, '82a', 'uramaki tonijn tobiko', 'tonijn, advocado, komkommer en mayonaise met tobiko topping', 7.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1445613509),
(122, '1', 80, '82b', 'uramaki zalm tobiko', 'zalm, advocado, komkommer en mayonaise met tobiko topping', 7.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1445613509),
(123, '1', 80, '83', 'uramaki caterpillar paling', 'paling, avocado, komkommer en mayonaise met avocado en mayonaise topping', 8.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1457633146),
(124, '1', 80, '83A', 'uramaki caterpillar krab', 'krabstick , avocado, komkommer en mayonaise met avocado en mayonaise topping', 8.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459618656),
(125, '1', 80, '83B', 'uramaki caterpillar tonijn', 'tonijn, avocado, komkommer en mayonaise met avocado en mayonaise topping', 8.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460558519),
(126, '1', 80, '83C', 'uramaki caterpillar zalm', 'zalm, avocado, komkommer en mayonaise met avocado en mayonaise topping', 8.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460558520),
(127, '1', 80, '84', 'volcano caterpillar', 'krabstick , avocado, komkommer en mayonaise met avocado en spicy mayonaise topping', 8.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459872455),
(128, '1', 80, '85', 'spicy crunchy ebi', 'tempura garnaal, avocado, komkommer en mayonnaise met shichimi aioli topping', 8.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460473850),
(129, '1', 80, '85a', 'spicy crunchy tonijn', 'tonijn, avocado, komkommer en mayonnaise met shichimi aioli topping', 7.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460558508),
(130, '1', 80, '85b', 'spicy crunchy zalm', 'zalm, avocado, komkommer en mayonnaise met shichimi aioli topping', 6.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460558503),
(131, '1', 80, '86', 'crunchy ebi', 'tempura garnaal, avocado, komkommer en mayonnaise met avocado en mayonaise topping', 8.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460298202),
(132, '1', 80, '86a', 'crunchy tonijn', 'tonijn, avocado, komkommer en mayonnaise met shichimi aioli topping', 7.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459703486),
(133, '1', 80, '86b', 'crunchy zalm', 'zalm, avocado, komkommer en mayonnaise met shichimi aioli topping', 6.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460294687),
(134, '1', 80, '87', 'california crunchy krab', 'tempura vlokken, krabstick, avocado, komkommer en mayonnaise met sesam topping', 8.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460298079),
(135, '1', 80, '88', 'caterpillar dream', 'krabstick, avocado, komkommer en mayonnaise met avocado en masago topping', 8.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460298082),
(136, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(137, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(138, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(139, '1', 90, '91', 'crazy tonijn', 'tonijn filet, avocado, masago en mayonnaise', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460574733),
(140, '1', 90, '92', 'alaska roll', 'zalm filet, avocado, komkommer en mayonaise', 5.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460298196),
(141, '1', 90, '93', 'rock & roll', 'tempura garnaal, krabstick, komkommer en mayonaise', 7.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460298198),
(142, '1', 90, '95', 'butterfly', 'zalm filet, krabstick, advocado, komkommer en mayonaise', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459872489),
(143, '1', 90, '95A', 'butterfly masago', 'zalm filet, krabstick, masago, advocado, komkommer en mayonaise', 7.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459607795),
(144, '1', 90, '96', 'red snow', 'krabstick, tempura vlokken, avocado en spicy mayonaise', 7.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1458317197),
(145, '1', 90, '97', 'new york', 'gegrilde paling, gekookte garnaal, krabstick, avocado en japanse mayonnaise', 8.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1458060943),
(146, '1', 90, '98', 'futo yasai', 'omelet, avocado, komkommer, sesam en mayonaise', 4.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460309964),
(147, '1', 90, '99', 'kamikaze roll', 'tonijn, gegrilde paling, advocado en shichimi aioli', 8.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459178900),
(148, '1', 90, '99a', 'yuki roll', 'paling', 8.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1441892832),
(149, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(150, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(151, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(152, '1', 100, '100', 'hosomaki avocado', 'avocado', 3.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460475840),
(153, '1', 100, '100a', 'hosomaki takuan', 'witte raap', 3.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1454685246),
(154, '1', 100, '101', 'hosomaki tonijn', 'verse rauwe tonijn filet', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460556671),
(155, '1', 100, '102', 'hosomaki zalm ', 'verse rauwe zalm filet', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460475841),
(156, '1', 100, '103', 'hosomaki paling', 'gegrilde paling', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1455305673),
(157, '1', 100, '104a', 'hosomaki ebi fry', ' ebi fry', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1457455007),
(158, '1', 100, '105', 'hosomaki spicy tonijn ', 'verse rauwe tonijn filet met spicy saus', 5.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460475842),
(159, '1', 100, '106', 'hosomaki spicy zalm ', 'verse rauwe zalm filet met spicy mayo', 5.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460475844),
(160, '1', 100, '107', 'hosomaki krab', 'surimi krabstick', 4.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460042671),
(161, '1', 100, '108', 'hosomaki omelet', 'gebakken zoete omelet', 4.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1456670498),
(162, '1', 100, '109', 'hosomaki komkommer', 'komkommer', 3.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460475853),
(163, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(164, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(165, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(166, '2', 110, '119', 'Fles kewpie mayonaise', 'mayonaise', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1457296038),
(167, '2', 110, '111', 'zeewier', 'gekruide zeewier salade van de hoogste kwaliteit', 3.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460561489),
(168, '2', 110, '112', 'gember', 'gember gari', 1.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1459710850),
(169, '2', 110, '113', 'wasabi', 'mierikswortel', 1.50, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670625),
(170, '2', 110, '114', 'soja', 'kikkoman zoute soja saus', 2.00, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670626),
(171, '2', 110, '115', 'spicy sauce', 'pittige saus voor bij de tonijn', 2.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460475864),
(172, '2', 110, '116', 'spicy mayonaise', 'zeer pittige mayonaise', 2.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460307491),
(173, '2', 110, '117', 'wasabinaise', 'wasabi mayonaise', 2.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460311853),
(174, '2', 110, '118', 'kewpie mayonaise', 'japanse mayonaise', 2.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459099850),
(175, '2', 110, '888', 'plastic draagtas', '', 0.01, 0.00, 0.00, '2', '1', 0, 0, 1, 1454433687),
(176, '2', 110, '887', 'chopsticks', '', 2.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1454433687),
(177, '2', 110, '889', 'sake karaf met cupjes', '', 6.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1454433687),
(178, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(179, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(180, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(181, '2', 2, '205', 'Sojabonen', 'Gekookte sojabonen', 3.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1460669385),
(182, '2', 2, '206', 'Yakitori 3 stokjes', 'Gegrilde kipspies in zoete sojasaus, 2 spiezen', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460300968),
(183, '2', 3, '210', 'Ebi Fry 3 stuks', 'Gefrituurde garnalen in broodkruimels, 3 stuks', 5.00, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670614),
(184, '2', 5, '251', 'frietje', 'friet frietjes patat', 3.00, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670851),
(185, '2', 5, '252', 'chicken wings 6 stuks', 'kip vleugel', 3.50, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670851),
(186, '2', 5, '253', 'mini loempia 8 stuks', 'mini loempia 8 stuks', 3.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460307123),
(187, '2', 5, '254', 'frikandel', 'frikandel', 2.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1458757876),
(188, '2', 5, '255', 'kip nuggets', 'kip nuggets', 2.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459615202),
(189, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(190, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(191, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(192, '3', 2, '310', 'Coca cola', '', 2.20, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670833),
(193, '3', 2, '311', 'Coca cola light', '', 2.20, 0.00, 0.00, '1', '1', 0, 0, 1, 1460669811),
(194, '3', 2, '312', 'Fanta orange', '', 2.20, 0.00, 0.00, '1', '1', 0, 0, 1, 1460669765),
(195, '3', 2, '313', 'Fanta cassis', '', 2.30, 0.00, 0.00, '1', '1', 0, 0, 1, 1460669752),
(196, '3', 2, '314', 'Sprite', '', 2.20, 0.00, 0.00, '1', '1', 0, 0, 1, 1460670000),
(197, '3', 2, '315', 'Tonic', '', 2.30, 0.00, 0.00, '1', '1', 0, 0, 1, 1460670104),
(198, '3', 2, '316', 'Bitter lemon', '', 2.30, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670853),
(199, '3', 2, '317', 'Lipton ice tea', '', 2.30, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670853),
(200, '3', 2, '318', 'spa blauw', '', 2.20, 0.00, 0.00, '1', '1', 0, 0, 1, 1460486636),
(201, '3', 2, '319', 'spa rood', '', 2.20, 0.00, 0.00, '1', '1', 0, 0, 1, 1460486637),
(202, '3', 2, '319f', 'grote fles water', '', 6.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459961579),
(203, '3', 2, '320', 'Appelsap', '', 2.30, 0.00, 0.00, '1', '1', 0, 0, 1, 1460046227),
(204, '3', 2, '321', 'Jus d’orange', '', 2.30, 0.00, 0.00, '1', '1', 0, 0, 1, 1460306015),
(205, '3', 2, '322', 'Chocomel', '', 2.30, 0.00, 0.00, '1', '1', 0, 0, 1, 1458931008),
(206, '3', 2, '323', 'Fristi', '', 2.30, 0.00, 0.00, '1', '1', 0, 0, 1, 1459966398),
(207, '3', 2, '325', 'Melk', '', 2.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1446292290),
(208, '3', 3, '330', 'Heineken bier', '', 2.30, 0.00, 0.00, '2', '1', 0, 0, 1, 1460670001),
(209, '3', 3, '331', 'Iki japans bier', '', 3.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1459099588),
(210, '3', 3, '332', 'Asahi japans bier', '', 3.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1460307365),
(211, '3', 3, '333', 'Sapporo japans bier', '', 3.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1460484310),
(212, '4', 10, '335', 'sherry medium', '', 3.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1385315167),
(213, '4', 10, '336', 'Sherry dry', '', 3.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1393000940),
(214, '4', 10, '337', 'Port wit', '', 3.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1448129575),
(215, '4', 10, '338', 'Port rood', '', 3.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1448129668),
(216, '7', 3, '339', 'Martini wit', '', 3.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1435425759),
(217, '7', 3, '340', 'Martini rood', '', 3.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1385756128),
(218, '7', 3, '341', 'Campari', '', 3.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1385149386),
(219, '7', 3, '342', 'Hartevelt jonge jenever', '', 2.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1446301229),
(220, '7', 3, '343', 'Bokma oude jenever', '', 2.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1394818665),
(221, '7', 3, '344', 'Coebergh bessenjenever', '', 2.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1433444525),
(222, '7', 3, '345', 'Bols Corenwijn', '', 2.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1423857880),
(223, '7', 3, '346', 'Sonnema berenburg', '', 2.50, 0.00, 0.00, '2', '1', 0, 1, 1, 1460670859),
(224, '7', 3, '347', 'Jagermeister', '', 2.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1336246243),
(225, '7', 3, '348', 'Bacardi', '', 3.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1453489533),
(226, '7', 3, '349', 'Johnnie Walker Red', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1391198642),
(227, '7', 3, '350', 'Johnnie Walker Black', '', 5.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1334425645),
(228, '7', 3, '351', 'Jack Daniels', '', 5.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1429288348),
(229, '7', 3, '352', 'Dimple', '', 5.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1395774177),
(230, '7', 3, '353', 'Jameson', '', 3.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1433610693),
(231, '7', 3, '354', 'Glenfiddich', '', 5.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1421344283),
(232, '7', 3, '355', 'Four roses', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1362507852),
(233, '7', 3, '356', 'Famous grouse', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1328834833),
(234, '7', 3, '357', 'Ballantines', '', 4.50, 0.00, 0.00, '2', '1', 0, 1, 1, 1460670859),
(235, '7', 3, '358', 'Remy Martin XO', '', 7.50, 0.00, 0.00, '2', '1', 0, 0, 1, 0),
(236, '7', 3, '359', 'Remy Martin VSOP', '', 5.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1426793485),
(237, '7', 3, '360', 'Courvoisier VSOP', '', 5.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1445789548),
(238, '7', 3, '361', 'Hennessy', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1385149859),
(239, '7', 3, '362', 'Gordon’s dry gin', '', 3.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1449076065),
(240, '7', 3, '363', 'Smirnoff vodka', '', 3.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1458323449),
(241, '7', 3, '365', 'Baileys', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1457808406),
(242, '7', 3, '366', 'Tia Maria', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1399226391),
(243, '7', 3, '367', 'Malibu', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1409932319),
(244, '7', 3, '368', 'Sambuca', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1430156177),
(245, '7', 3, '369', 'Safari', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1395605238),
(246, '7', 3, '370', 'Cointreau', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1454787022),
(247, '7', 3, '371', 'Grand marnier rouge', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1460053335),
(248, '7', 3, '372', 'Passoa', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1385922507),
(249, '7', 3, '373', 'Pisang ambon', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1340479630),
(250, '7', 3, '374', 'Amaretto di saronno', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1430580576),
(251, '7', 3, '375', 'Drambuie', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1414792068),
(252, '7', 3, '376', 'Vieux', '', 2.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1419527949),
(253, '7', 3, '377', 'Courvoisier VS', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1338750711),
(254, '7', 3, '378', 'Martell VSOP', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1356025080),
(255, '7', 3, '379', 'DOM Benedictine', '', 4.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1447526159),
(256, '7', 3, '380', 'cuarenta y tres', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1454097149),
(257, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(258, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(259, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(260, '4', 1, '400', 'Huiswijn wit', '', 4.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1460486714),
(261, '4', 1, '401', 'Huiswijn rood', '', 4.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1460302317),
(262, '4', 1, '402', 'Huiswijn rose', '', 4.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1459185144),
(263, '', 0, '', '', '', 0.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1360259535),
(264, '4', 1, '400F', 'Huiswijn wit fles', '', 19.95, 0.00, 0.00, '2', '1', 0, 0, 1, 1459272892),
(265, '4', 1, '401F', 'Huiswijn rood fles', '', 19.95, 0.00, 0.00, '2', '1', 0, 0, 1, 1459275973),
(266, '4', 1, '402F', 'Huiswijn rose fles', '', 19.95, 0.00, 0.00, '2', '1', 0, 0, 1, 1453574940),
(267, '4', 2, '410F', 'Prosecco', '', 20.00, 0.00, 0.00, '2', '1', 0, 1, 1, 1460670854),
(268, '4', 8, '450', 'Sake warm', '', 4.50, 0.00, 0.00, '2', '1', 0, 1, 1, 1460670855),
(269, '4', 8, '451', 'Sake heet', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1460486631),
(270, '4', 8, '452', 'Sake koud', '', 4.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1460486629),
(271, '4', 8, '450F', 'Sake Fles', '', 20.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1445776941),
(272, '4', 1, '400K', 'Huiswijn wit karaf', '', 11.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1411751762),
(273, '4', 1, '401K', 'Huiswijn rood karaf', '', 11.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1445776882),
(274, '4', 1, '402K', 'Huiswijn rose karaf', '', 11.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1330200846),
(275, '4', 8, '453', 'Pruimen wijn', '', 4.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1457278708),
(276, '4', 9, '500', 'meeneem fles wit ', '', 15.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1448645653),
(277, '4', 9, '501', 'meeneem fles rood ', '', 15.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1441887930),
(278, '4', 9, '502', 'meeneem fles rose ', '', 15.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1425232781),
(279, '4', 9, '503', 'meeneem fles pruimen wijn', '', 20.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1383524507),
(280, '4', 9, '504', 'meeneem fles sake', '', 20.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1459355262),
(281, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(282, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(283, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(284, '5', 1, '300', 'Koffie', '', 2.20, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670833),
(285, '5', 1, '302', 'Cappuccino', '', 2.30, 0.00, 0.00, '1', '1', 0, 0, 1, 1460306484),
(286, '5', 1, '303', 'Koffie verkeerd', '', 2.30, 0.00, 0.00, '1', '1', 0, 0, 1, 1458335855),
(287, '5', 1, '304', 'Espresso', '', 2.30, 0.00, 0.00, '1', '1', 0, 0, 1, 1460224131),
(288, '5', 1, '305', 'Dubbel espresso', '', 3.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460224132),
(289, '5', 1, '306', 'Thee', '', 2.20, 0.00, 0.00, '1', '1', 0, 0, 1, 1459183231),
(290, '5', 1, '307', 'Japans thee', '', 3.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459965246),
(291, '5', 1, '308', 'Warme chocomel', '', 2.20, 0.00, 0.00, '1', '1', 0, 0, 1, 1434215638),
(292, '5', 1, '309', 'Latte macchiato', '', 3.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459966405),
(293, '5', 1, '326', 'french coffee', '', 6.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1455997815),
(294, '5', 1, '327', 'irish coffee', '', 6.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1459443838),
(295, '5', 1, '328', 'spanish coffee', '', 6.00, 0.00, 0.00, '2', '1', 0, 0, 1, 1456342308),
(296, '5', 5, '390', 'Witte Sesam ijs', '', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459443854),
(297, '5', 5, '391', 'Zwarte Sesam ijs', '', 5.00, 0.00, 0.00, '1', '1', 0, 5, 1, 1460670864),
(298, '5', 5, '390b', 'Witte Sesam ijs per bol', '', 2.50, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670857),
(299, '5', 5, '391b', 'Zwarte Sesam ijs per bol', '', 2.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1459533156),
(300, '5', 5, '393b', 'Vanille roomijs per bol', '', 2.00, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670857),
(301, '5', 5, '393', 'Vanille roomijs met slagroom', '', 4.00, 0.00, 0.00, '1', '1', 0, 1, 1, 1460670857),
(302, '5', 5, '395', 'Dame blanche', '', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460310194),
(303, '5', 5, '396', 'Banana Royal', '', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1460310195),
(304, '5', 5, '398', 'Kinderijs met slagroom', '', 3.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1456683896),
(305, '5', 5, '399', 'Slagroom', '', 0.50, 0.00, 0.00, '1', '1', 0, 0, 1, 1457208673),
(306, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(307, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(308, '', 0, '', '', '', 0.00, 0.00, 0.00, '0', '', 0, 0, 0, 0),
(309, '1', 50, '60a', 'dynamite temaki', '2 plakjes tonijn , 2 plakjes zalm en spicy saus', 5.00, 0.00, 0.00, '1', '1', 0, 0, 1, 1459442172),
(310, '5', 1, '329', 'italian coffee', '', 6.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1456342308),
(311, '5', 1, '329a', 'DOM coffee', '', 6.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1456342308),
(312, '5', 1, '329b', 'Grand marnier coffee', '', 6.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1456342308),
(313, '5', 1, '329c', 'Baileys coffee', '', 6.50, 0.00, 0.00, '2', '1', 0, 0, 1, 1456342308);

-- --------------------------------------------------------

--
-- Table structure for table `pos_usage`
--

DROP TABLE IF EXISTS `pos_usage`;
CREATE TABLE IF NOT EXISTS `pos_usage` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos_users`
--

DROP TABLE IF EXISTS `pos_users`;
CREATE TABLE IF NOT EXISTS `pos_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos_work`
--

DROP TABLE IF EXISTS `pos_work`;
CREATE TABLE IF NOT EXISTS `pos_work` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `task` varchar(128) NOT NULL,
  `outcome` varchar(128) NOT NULL,
  `clock` varchar(32) NOT NULL,
  `day` tinyint(4) NOT NULL DEFAULT '0',
  `month` tinyint(4) NOT NULL DEFAULT '0',
  `year` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1183 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
