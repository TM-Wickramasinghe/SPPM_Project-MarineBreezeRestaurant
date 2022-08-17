-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 17, 2022 at 06:56 PM
-- Server version: 5.7.31
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aID` int(11) NOT NULL AUTO_INCREMENT,
  `aName` varchar(200) NOT NULL,
  `aEmail` varchar(200) NOT NULL,
  `aPwd` varchar(8) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  PRIMARY KEY (`aID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aID`, `aName`, `aEmail`, `aPwd`, `Designation`) VALUES
(1, 'Anura Fernando', 'anurafernando@gmail.com', 'anura11*', 'Admin'),
(3, 'Thulani Wickramasinghe', 'thulani98.tw@gmail.com', 'Thul222*', 'Manager'),
(4, 'Nimsara Fernado', 'Nimsara3@gmail.com', 'Nim123**', 'Manager'),
(5, 'testName', 'test@gmail.com', 'Test123@', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `fID` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(70) NOT NULL,
  `fComment` varchar(600) NOT NULL,
  PRIMARY KEY (`fID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fID`, `fName`, `fComment`) VALUES
(1, 'Dinura Asanka', 'I experienced caring staff, but pity about the French fries.'),
(2, 'Manushi Perera', 'Amazing wines, food and service.');

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
  `Availability` varchar(15) NOT NULL,
  PRIMARY KEY (`ItemNo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

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
  `rID` int(11) NOT NULL AUTO_INCREMENT,
  `rName` varchar(200) NOT NULL,
  `rEmail` varchar(200) NOT NULL,
  `rContactNumber` varchar(10) NOT NULL,
  `rDate` date NOT NULL,
  `rTime` time NOT NULL,
  `rNoOfPeople` int(3) NOT NULL,
  `rMessage` varchar(500) NOT NULL,
  PRIMARY KEY (`rID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`rID`, `rName`, `rEmail`, `rContactNumber`, `rDate`, `rTime`, `rNoOfPeople`, `rMessage`) VALUES
(1, 'Dilakshi Fernando', 'manushi.fdo23@gmail.com', '0719985554', '2022-08-01', '11:30:00', 10, 'test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
