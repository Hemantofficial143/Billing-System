-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 24, 2020 at 06:07 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jangid`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_code`) VALUES
(1, 'Kitchen', 'KI'),
(2, 'Master Room', 'MR'),
(3, 'Children Room', 'CR'),
(4, 'Parents Room', 'PR'),
(5, 'Leaving Room', 'LR');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_mobile` varchar(50) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `customer_name`, `customer_mobile`, `customer_address`, `created_at`) VALUES
(22, 1, 'vcvvcvxcv', 'cxvxcvcx', 'vxcvxcvcv', '2020-06-21 22:45:00'),
(16, 1, 'nvhv', 'jhvhvbjh', 'bjhjb', '2020-06-21 20:36:55'),
(25, 1, 'Hemant', '9099580645', 'Chandkheda', '2020-06-22 01:00:40'),
(24, 1, 'aaaaaaaa', 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaa', '2020-06-21 23:54:25'),
(23, 1, 'hjbguyjn', '5', '5', '2020-06-21 23:54:17'),
(21, 1, 'sdsdsdsds', 'sdsdsd', 'sddsd', '2020-06-21 22:44:53'),
(19, 2, 'gvhg', 'vyhvjhbj', 'bjbjb', '2020-06-21 20:37:27'),
(20, 3, 'Naresh Bhai', '8401455553', 'Hemant', '2020-06-21 20:40:00'),
(26, 1, 'sdsdsdsds', 'sdsdsd', 'sdsdsd', '2020-06-22 01:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_height` float NOT NULL,
  `item_width` float NOT NULL,
  `item_inch` float NOT NULL,
  `item_sqft` float NOT NULL,
  `item_rate` float NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_total` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `customer_id`, `user_id`, `item_name`, `item_height`, `item_width`, `item_inch`, `item_sqft`, `item_rate`, `item_qty`, `item_total`) VALUES
(1, 22, 1, 'KI - hguyjhj', 7, 7, 0, 0.340278, 7, 7, 49);

-- --------------------------------------------------------

--
-- Table structure for table `link_table`
--

DROP TABLE IF EXISTS `link_table`;
CREATE TABLE IF NOT EXISTS `link_table` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `pdf_link` varchar(255) NOT NULL,
  `delete_link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_table`
--

INSERT INTO `link_table` (`id`, `customer_id`, `user_id`, `pdf_link`, `delete_link`) VALUES
(1, 2, 1, '\'<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=2\">PDF</a></div>\'', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=2\">DELETE</a></div>'),
(2, 3, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=3\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=3\">DELETE</a></div>'),
(3, 4, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=4\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=4\">DELETE</a></div>'),
(4, 5, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=5\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=5\">DELETE</a></div>'),
(5, 6, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=6\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=6\">DELETE</a></div>'),
(6, 7, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=7\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=7\">DELETE</a></div>'),
(7, 8, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=8\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=8\">DELETE</a></div>'),
(8, 9, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=9\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=9\">DELETE</a></div>'),
(9, 10, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=10\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=10\">DELETE</a></div>'),
(10, 11, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=11\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=11\">DELETE</a></div>'),
(11, 12, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=12\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=12\">DELETE</a></div>'),
(12, 13, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=13\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=13\">DELETE</a></div>'),
(13, 14, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=14\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=14\">DELETE</a></div>'),
(14, 15, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=15\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=15\">DELETE</a></div>'),
(15, 16, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=16\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=16\">DELETE</a></div>'),
(16, 17, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=17\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=17\">DELETE</a></div>'),
(17, 1, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=1\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=1\">DELETE</a></div>'),
(18, 2, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=2\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=2\">DELETE</a></div>'),
(19, 3, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=3\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=3\">DELETE</a></div>'),
(20, 4, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=4\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=4\">DELETE</a></div>'),
(21, 5, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=5\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=5\">DELETE</a></div>'),
(22, 6, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=6\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=6\">DELETE</a></div>'),
(23, 7, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=7\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=7\">DELETE</a></div>'),
(24, 8, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=8\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=8\">DELETE</a></div>'),
(25, 9, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=9\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=9\">DELETE</a></div>'),
(26, 10, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=10\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=10\">DELETE</a></div>'),
(27, 11, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=11\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=11\">DELETE</a></div>'),
(28, 12, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=12\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=12\">DELETE</a></div>'),
(29, 13, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=13\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=13\">DELETE</a></div>'),
(30, 14, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=14\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=14\">DELETE</a></div>'),
(31, 15, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=15\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=15\">DELETE</a></div>'),
(32, 16, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=16\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=16\">DELETE</a></div>'),
(33, 17, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=17\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=17\">DELETE</a></div>'),
(34, 18, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=18\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=18\">DELETE</a></div>'),
(35, 19, 2, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=19\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=19\">DELETE</a></div>'),
(36, 20, 3, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=20\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=20\">DELETE</a></div>'),
(37, 21, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=21\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=21\">DELETE</a></div>'),
(38, 22, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=22\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=22\">DELETE</a></div>'),
(39, 23, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=23\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=23\">DELETE</a></div>'),
(40, 24, 1, '<div class=\"btn btn-success\"><a href=\"pdf.php?customer_id=24\">PDF</a></div>', '<div class=\"btn btn-danger\"><a href=\"delete.php?customer_id=24\">DELETE</a></div>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `pdf_link` varchar(255) DEFAULT NULL,
  `delete_link` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `mobile`, `password`, `created_on`, `status`, `token`, `pdf_link`, `delete_link`, `role`) VALUES
(1, 'Hemant', 'hemant_official_143', 'rj.hemantjangid@gmail.com', '+919099580645', 'h', '2020-05-31 00:29:10', 0, NULL, NULL, NULL, 0),
(2, 'srererer', 'eresrsrr', 'esresrseres@srsr.com', '+919999999999', 'hgdsh', '2020-05-31 15:03:28', 0, NULL, NULL, NULL, 1),
(3, 'Rajkumar Jangid', 'raju1979', 'sutharraju33@gmail.com', '+919904380717', 'Raju', '2020-06-21 20:38:31', 0, NULL, NULL, NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
