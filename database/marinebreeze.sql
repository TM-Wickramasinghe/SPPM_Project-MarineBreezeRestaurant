-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2022 at 06:17 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `fID` int NOT NULL AUTO_INCREMENT,
  `fName` varchar(70) NOT NULL,
  `fComment` varchar(600) NOT NULL,
  PRIMARY KEY (`fID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fID`, `fName`, `fComment`) VALUES
(1, 'din', 'test 1'),
(2, 'dila', 'test2'),
(3, 'manu', 'test3'),
(4, 'df', 'fdf'),
(5, '', ''),
(6, '', ''),
(7, '', ''),
(8, '', ''),
(9, '', ''),
(10, '', ''),
(11, '', ''),
(12, '', ''),
(13, '', ''),
(14, '', ''),
(15, '', ''),
(16, '', ''),
(17, '', 'dssdsd'),
(18, '', ''),
(19, '', ''),
(20, '', ''),
(21, '', ''),
(22, '', ''),
(23, '', ''),
(24, '', 'bgn'),
(25, '', ''),
(26, '', ''),
(27, '', ''),
(28, '', ''),
(29, '', ''),
(30, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `ItemNo` int NOT NULL AUTO_INCREMENT,
  `Category` varchar(150) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Picture` varchar(500) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `PriceSmall` varchar(10) NOT NULL,
  `PriceMedium` varchar(10) NOT NULL,
  `PriceLarge` varchar(10) NOT NULL,
  `Availability` varchar(15) NOT NULL,
  PRIMARY KEY (`ItemNo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ItemNo`, `Category`, `Name`, `Picture`, `Description`, `PriceSmall`, `PriceMedium`, `PriceLarge`, `Availability`) VALUES
(1, 'Appetizers', 'Chilled Seafood Classic With Cocktail Sauce', '.\\assets\\img\\menu\\1.jpg', 'food', '450', '700', '1100', 'Available'),
(2, 'Side_Dish', 'Hot Butter Cuttlefish', '.\\assets\\img\\menu\\2.jpg', '', '400', '560', '1000', 'Available'),
(3, 'Side_Dish', 'Devilled Chicken', '.\\assets\\img\\menu\\3.jpg', '', '400', '560', '1000', 'Available'),
(4, 'Main_Course', 'Vegetable Biriyani', '.\\assets\\img\\menu\\4.jpg', 'Served dhal fry, Papadam, Pickle, raita', '800', 'N/A', 'N/A', 'Not Available'),
(5, 'Main_Course', 'Egg Noodles', '.\\assets\\img\\menu\\5.jpg', '', '750', '980', '1500', 'Available'),
(6, 'Dessert', 'Watalappan', '.\\assets\\img\\menu\\6.jpg', '', '220', 'N/A', 'N/A', 'Available'),
(7, 'Dessert', 'Ice Cream', '.\\assets\\img\\menu\\7.jpg', 'Chocolate/Vanilla/Stawberry', '200', 'N/A', 'N/A', 'Available'),
(8, 'Drinks', 'Milkshake', '.\\assets\\img\\menu\\8.jpg', 'Chocolate/Vanilla/Strawberry', '350', 'N/A', '450', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `rID` int NOT NULL AUTO_INCREMENT,
  `rName` varchar(200) NOT NULL,
  `rEmail` varchar(200) NOT NULL,
  `rContactNumber` varchar(10) NOT NULL,
  `rDate` date NOT NULL,
  `rTime` time NOT NULL,
  `rNoOfPeople` int NOT NULL,
  `rMessage` varchar(500) NOT NULL,
  PRIMARY KEY (`rID`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`rID`, `rName`, `rEmail`, `rContactNumber`, `rDate`, `rTime`, `rNoOfPeople`, `rMessage`) VALUES
(1, 'Dilakshi Fernando', 'manushi.fdo23@gmail.com', '0719985554', '2022-08-01', '11:30:00', 10, 'testd'),
(2, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(3, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(4, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(5, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(6, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(7, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(8, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(9, 'f', '', '', '0000-00-00', '00:00:00', 0, ''),
(10, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(11, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(12, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(13, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(14, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(15, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(16, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(17, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(18, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(19, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(20, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(21, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(22, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(23, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(24, 's', '', '', '0000-00-00', '00:00:00', 0, ''),
(25, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(26, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(27, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(28, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(29, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(30, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(31, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(32, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(33, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(34, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(35, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(36, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(37, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(38, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(39, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(40, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(41, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(42, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(43, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(44, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(45, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(46, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(47, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(48, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(49, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(50, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(51, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(52, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(53, '', '', '', '0000-00-00', '00:00:00', 0, ''),
(54, '', '', '', '0000-00-00', '00:00:00', 0, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
