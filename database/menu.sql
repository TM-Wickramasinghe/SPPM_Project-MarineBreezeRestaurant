-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 04, 2022 at 06:08 AM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marinebreeze`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `ItemNo` int(11) NOT NULL AUTO_INCREMENT,
  `Category` varchar(150) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Picture` varchar(500) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `PriceSmall` varchar(10) NOT NULL,
  `PriceMedium` varchar(10) NOT NULL,
  `PriceLarge` varchar(10) NOT NULL,
  `Availability` varchar(100) NOT NULL,
  PRIMARY KEY (`ItemNo`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ItemNo`, `Category`, `Name`, `Picture`, `Description`, `PriceSmall`, `PriceMedium`, `PriceLarge`, `Availability`) VALUES
(13, 'Main_Course', 'Egg Noodles', '5.jpg', '', '750', '980', '1500', 'Available'),
(12, 'Main_Course', 'VEG Biriyani', '4.jpg', ' dhal fry, Papadam, Pickle', '800', 'N/A', 'N/A', 'Available'),
(11, 'Side_Dish', 'Devilled Chicken', '3.jpg', '', '400', '560', '1000', 'Available'),
(10, 'Side_Dish', 'Hot Butter Cuttlefish', '2.jpg', '', '400', '560', '1000', 'Available'),
(9, 'Appetizers', ' Seafood Classic ', '1.jpg', 'food', '450', '700', '1100', 'Available'),
(14, 'Dessert', 'Watalappan', '6.jpg', '', '220', 'N/A', 'N/A', 'Available'),
(15, 'Dessert', 'ice Cream', '7.jpg', 'choclate/vanilla/strawberry', '200', 'N/A', 'N/A', 'Available');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
