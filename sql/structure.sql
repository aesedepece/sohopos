-- phpMyAdmin SQL Dump
-- version 3.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2012 at 12:49 AM
-- Server version: 5.5.22
-- PHP Version: 5.3.10-1ubuntu3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sohopos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashposts`
--

DROP TABLE IF EXISTS `cashposts`;
CREATE TABLE IF NOT EXISTS `cashposts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` double(4,2) NOT NULL,
  `caption` varchar(30) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `parent` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(12) NOT NULL,
  `surname` varchar(24) NOT NULL,
  `defaultdiscount_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `default-discount_id` (`defaultdiscount_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `compositions`
--

DROP TABLE IF EXISTS `compositions`;
CREATE TABLE IF NOT EXISTS `compositions` (
  `product_id_` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
CREATE TABLE IF NOT EXISTS `discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(24) NOT NULL,
  `value` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

DROP TABLE IF EXISTS `distributors`;
CREATE TABLE IF NOT EXISTS `distributors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `tin` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `distributors_products`
--

DROP TABLE IF EXISTS `distributors_products`;
CREATE TABLE IF NOT EXISTS `distributors_products` (
  `distributor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pricebuy` double NOT NULL,
  PRIMARY KEY (`distributor_id`,`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `makes`
--

DROP TABLE IF EXISTS `makes`;
CREATE TABLE IF NOT EXISTS `makes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=271 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `name` tinytext NOT NULL,
  `make_id` int(11) DEFAULT NULL,
  `pricebuy` double NOT NULL,
  `pricesell` double NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `description` text,
  `scales` tinyint(1) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `make` (`make_id`),
  KEY `category` (`category_id`),
  KEY `tax` (`tax_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1958 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_tags`
--

DROP TABLE IF EXISTS `products_tags`;
CREATE TABLE IF NOT EXISTS `products_tags` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`tag_id`),
  KEY `product` (`product_id`),
  KEY `tag` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `enddate` timestamp NULL DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seller_id` (`seller_id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_discounts`
--

DROP TABLE IF EXISTS `sales_discounts`;
CREATE TABLE IF NOT EXISTS `sales_discounts` (
  `sale_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  PRIMARY KEY (`sale_id`,`discount_id`),
  KEY `discount_id` (`discount_id`),
  KEY `sale_id` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE IF NOT EXISTS `sellers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(32) NOT NULL,
  `surname` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `key` varchar(24) NOT NULL,
  `value` text,
  `comment` text,
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
CREATE TABLE IF NOT EXISTS `taxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rate` double NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `pricebuy` double NOT NULL,
  `indate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expiry` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `distributor_id` (`distributor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `units_sales`
--

DROP TABLE IF EXISTS `units_sales`;
CREATE TABLE IF NOT EXISTS `units_sales` (
  `unit_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `returned` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`unit_id`),
  KEY `sale_id` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_curUnits`
--
DROP VIEW IF EXISTS `v_curUnits`;
CREATE TABLE IF NOT EXISTS `v_curUnits` (
`id` int(11)
,`product_id` int(11)
,`distributor_id` int(11)
,`pricebuy` double
,`indate` timestamp
,`expiry` date
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_soldByDay`
--
DROP VIEW IF EXISTS `v_soldByDay`;
CREATE TABLE IF NOT EXISTS `v_soldByDay` (
`day` date
,`sold` double(19,2)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_soldByMonth`
--
DROP VIEW IF EXISTS `v_soldByMonth`;
CREATE TABLE IF NOT EXISTS `v_soldByMonth` (
`year` int(4)
,`month` int(2)
,`sold` double(19,2)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stock`
--
DROP VIEW IF EXISTS `v_stock`;
CREATE TABLE IF NOT EXISTS `v_stock` (
`product_id` int(11)
,`reference` varchar(32)
,`code` varchar(32)
,`name` tinytext
,`amount` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_topClients`
--
DROP VIEW IF EXISTS `v_topClients`;
CREATE TABLE IF NOT EXISTS `v_topClients` (
`numsales` bigint(21)
,`id` int(11)
,`name` varchar(12)
,`surname` varchar(24)
);
-- --------------------------------------------------------

--
-- Structure for view `v_curUnits`
--
DROP TABLE IF EXISTS `v_curUnits`;

CREATE ALGORITHM=UNDEFINED DEFINER=`sohopos`@`localhost` SQL SECURITY DEFINER VIEW `v_curUnits` AS select `units`.`id` AS `id`,`units`.`product_id` AS `product_id`,`units`.`distributor_id` AS `distributor_id`,`units`.`pricebuy` AS `pricebuy`,`units`.`indate` AS `indate`,`units`.`expiry` AS `expiry` from (`units` left join `units_sales` on((`units`.`id` = `units_sales`.`unit_id`))) where isnull(`units_sales`.`unit_id`);

-- --------------------------------------------------------

--
-- Structure for view `v_soldByDay`
--
DROP TABLE IF EXISTS `v_soldByDay`;

CREATE ALGORITHM=UNDEFINED DEFINER=`sohopos`@`localhost` SQL SECURITY DEFINER VIEW `v_soldByDay` AS select cast(`cashposts`.`date` as date) AS `day`,sum(`cashposts`.`value`) AS `sold` from `cashposts` group by cast(`cashposts`.`date` as date);

-- --------------------------------------------------------

--
-- Structure for view `v_soldByMonth`
--
DROP TABLE IF EXISTS `v_soldByMonth`;

CREATE ALGORITHM=UNDEFINED DEFINER=`sohopos`@`localhost` SQL SECURITY DEFINER VIEW `v_soldByMonth` AS select year(`cashposts`.`date`) AS `year`,month(`cashposts`.`date`) AS `month`,sum(`cashposts`.`value`) AS `sold` from `cashposts` group by year(`cashposts`.`date`),month(`cashposts`.`date`);

-- --------------------------------------------------------

--
-- Structure for view `v_stock`
--
DROP TABLE IF EXISTS `v_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`sohopos`@`localhost` SQL SECURITY DEFINER VIEW `v_stock` AS select `units`.`product_id` AS `product_id`,`products`.`reference` AS `reference`,`products`.`code` AS `code`,`products`.`name` AS `name`,count(0) AS `amount` from (`products` join `v_curUnits` `units`) group by `products`.`id` having (`products`.`id` = `units`.`product_id`);

-- --------------------------------------------------------

--
-- Structure for view `v_topClients`
--
DROP TABLE IF EXISTS `v_topClients`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_topClients` AS select count(0) AS `numsales`,`sales`.`client_id` AS `id`,`clients`.`name` AS `name`,`clients`.`surname` AS `surname` from (`clients` join `sales`) group by `clients`.`id` having (`clients`.`id` = `sales`.`client_id`) order by count(0) desc;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`defaultdiscount_id`) REFERENCES `discounts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_2` FOREIGN KEY (`distributor_id`) REFERENCES `distributors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
