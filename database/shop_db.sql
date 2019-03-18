-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 09:41 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_table`
--

CREATE TABLE `brand_table` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand_table`
--

INSERT INTO `brand_table` (`brandId`, `brandName`) VALUES
(8, 'ACNE'),
(9, 'ALBIRO'),
(10, 'Ronhill'),
(11, 'RÃ¶sch creative culture');

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `cartId` int(11) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `productCode` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`cartId`, `sessionId`, `productId`, `productName`, `price`, `image`, `productCode`, `quantity`) VALUES
(6, 'jij6rrfo6oas6m1sm765h9uj11', 9, 'Easy Polo Black Edition 2', 56.00, 'uploads/posts/8dcb7ae625.jpg', 'WF-84', 1),
(7, 'jij6rrfo6oas6m1sm765h9uj11', 8, 'Easy Polo Blue Edition', 97.00, 'uploads/posts/06b3df9d68.jpg', 'WD-55', 1),
(8, '5g5au14tcunci3cu2gd781a91k', 8, 'Easy Polo Blue Edition', 97.00, 'uploads/posts/06b3df9d68.jpg', 'WD-55', 2),
(9, '5g5au14tcunci3cu2gd781a91k', 9, 'Easy Polo Black Edition 2', 56.00, 'uploads/posts/8dcb7ae625.jpg', 'WF-84', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `categoryId` int(11) NOT NULL,
  `category` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`categoryId`, `category`) VALUES
(3, 'SHOES'),
(5, 'INTERIORS'),
(7, 'KIDS'),
(8, 'WOMENS'),
(9, 'MENS'),
(10, 'FASHION');

-- --------------------------------------------------------

--
-- Table structure for table `customers_table`
--

CREATE TABLE `customers_table` (
  `customersId` int(11) NOT NULL,
  `customersName` varchar(55) NOT NULL,
  `customersEmail` varchar(55) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phoneNumber` varchar(14) NOT NULL,
  `city` varchar(55) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers_table`
--

INSERT INTO `customers_table` (`customersId`, `customersName`, `customersEmail`, `password`, `phoneNumber`, `city`, `address`) VALUES
(11, 'Kamruzzaman', 'zaman7.info@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '+8801721279241', 'Dhaka', 'Dhaka'),
(12, 'Kamruzzaman', 'zaman.info@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '+8801721279241', 'Dhaka', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--

CREATE TABLE `products_table` (
  `productId` int(11) NOT NULL,
  `productName` varchar(55) NOT NULL,
  `brandId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `price` float(11,2) NOT NULL,
  `products_details` varchar(255) NOT NULL,
  `image` varchar(55) NOT NULL,
  `productCode` varchar(55) NOT NULL,
  `type` int(11) NOT NULL,
  `postTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`productId`, `productName`, `brandId`, `categoryId`, `price`, `products_details`, `image`, `productCode`, `type`, `postTime`, `author`) VALUES
(8, 'Easy Polo Blue Edition', 9, 8, 97.00, 'Bangla E-Commerce Website Development Tutorial with PHP OOP.\r\nBangla E-Commerce Website Development Tutorial with PHP OOP.\r\nBangla E-Commerce Website Development Tutorial with PHP OOP.\r\nBangla E-Commerce Website Development Tutorial with PHP OOP.\r\nBangla ', 'uploads/posts/06b3df9d68.jpg', 'WD-55', 0, '2019-03-04 14:16:30', 'zaman'),
(9, 'Easy Polo Black Edition 2', 8, 5, 56.00, '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure d', 'uploads/posts/8dcb7ae625.jpg', 'WF-84', 0, '2019-03-04 14:16:43', 'zaman');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `userId` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `userName` varchar(55) NOT NULL,
  `userEmail` varchar(55) NOT NULL,
  `userPassword` varchar(55) NOT NULL,
  `userLevel` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`userId`, `name`, `userName`, `userEmail`, `userPassword`, `userLevel`) VALUES
(1, 'Zaman', 'zaman', 'zaman@gmail.com', '202cb962ac59075b964b07152d234b70', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_table`
--
ALTER TABLE `brand_table`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `customers_table`
--
ALTER TABLE `customers_table`
  ADD PRIMARY KEY (`customersId`);

--
-- Indexes for table `products_table`
--
ALTER TABLE `products_table`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand_table`
--
ALTER TABLE `brand_table`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers_table`
--
ALTER TABLE `customers_table`
  MODIFY `customersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products_table`
--
ALTER TABLE `products_table`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
