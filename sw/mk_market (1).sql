-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 07:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mk_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Name` varchar(255) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Name`, `ID`) VALUES
('Vegetables', 1),
('proteins', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fooditems`
--

CREATE TABLE `fooditems` (
  `Name` varchar(255) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `CATID` int(11) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `ExpireDate` date DEFAULT NULL,
  `ProductDate` date DEFAULT NULL,
  `Description` text,
  `Visibility` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fooditems`
--

INSERT INTO `fooditems` (`Name`, `ID`, `Amount`, `CATID`, `Price`, `Image`, `ExpireDate`, `ProductDate`, `Description`, `Visibility`) VALUES
('meal1', 14, '500', 1, '120', NULL, '2050-01-01', '2019-01-01', 'hello ', 1),
('meal2', 15, '500', 1, '500', NULL, '2050-01-01', '2019-01-01', 'This luscious side dish can be prepared up to three days ahead. The duo of sweet parsnip and creamy spinach is unbeatable.', 1),
('meal3', 16, '500', 2, '150', '', '2050-01-01', '2019-01-01', 'Shrimp is a type of seafood.  It is low in calories, but incredibly high in various nutrients, including selenium and vitamin B12.  Like fish, shrimp also contains plenty of omega-3 fatty acids.  Protein content: 90% of calories. A 3 ounce (85 g) serving contains 18 grams, with only 84 calories.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderfooditem`
--

CREATE TABLE `orderfooditem` (
  `foodItemNumber` int(11) NOT NULL,
  `foodItemID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `TotalPrice` float NOT NULL,
  `date` date NOT NULL,
  `statues` varchar(20) NOT NULL,
  `VISITORID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Fullname` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Address` text NOT NULL,
  `Phone` int(13) NOT NULL,
  `ActiveState` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Fullname`, `Email`, `Address`, `Phone`, `ActiveState`) VALUES
(1, 'admin', '123', 'admin', 'admin@admin.com', '6 octoper', 1124889690, 1),
(2, 'karim', '12345', 'mahmoud amin', 'karimz19299@gmail.com\r\n', 'asdfasdf', 1124889690, 1),
(3, 'menna', '12345', 'menna ahmed', 'mennanosha189@gmail.com\r\n', 'asdfasdf', 1124889690, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fooditems`
--
ALTER TABLE `fooditems`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Catig_ID` (`CATID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VISITORID` (`VISITORID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fooditems`
--
ALTER TABLE `fooditems`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fooditems`
--
ALTER TABLE `fooditems`
  ADD CONSTRAINT `Products_ibfk_1` FOREIGN KEY (`CATID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`VISITORID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
