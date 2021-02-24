-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 24, 2021 at 09:59 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `email` varchar(120) COLLATE utf8_swedish_ci DEFAULT NULL,
  `message` varchar(500) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `description` varchar(500) COLLATE utf8_swedish_ci DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `image` varchar(500) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Matcha red bean cake roll', 'The fluffiest matcha swiss cake roll paired with a semi-sweet azuki bean cream. Heavenly Japanese style green tea dessert just like the ones at the shops.', 198, 'http://localhost/newshop/images/bullar.jpg'),
(2, 'Vanilla cake roll', 'A deliciously soft, moist, and light vanilla cake roll', 198, 'http://localhost/newshop/images/vanillaroll.jpg'),
(3, 'Taro cake roll', 'The smooth taro mash is added with the delicate cake body, and there is only one feeling in the mouth, soft and delicious.', 208, 'http://localhost/newshop/images/Taroroll.jpg'),
(4, 'Tiramisu', 'This tiramisu is made in Japanese style. The whole cake has only 60ml of cream and 30g of sugar.', 399, 'http://localhost/newshop/images/Tiramisu.jpg'),
(5, 'hokkaido cake', 'A classic that can never be surpassed.It is troublesome to make, but the taste is absolutely pleasant.', 599, 'http://localhost/newshop/images/hokkaido.jpg'),
(6, 'Sweet taro milk cake', 'This taro cake is mixed with the cream of the mashed taro', 599, 'http://localhost/newshop/images/Tarakaka.jpg'),
(7, 'Mango cake', 'Mango-flavored cheesecake, with multiple layers and different tastes, the fresh fruity aroma is particularly delicious.', 599, 'http://localhost/newshop/images/mangocake.jpg'),
(8, 'Strawberry cake', 'Strawberry and cream are closely integrated and penetrate each other.', 566, 'http://localhost/newshop/images/fruitcake.jpg'),
(9, 'Fruit cake', 'Full of fruity taste, fragrant and sweet, the cream is smooth and refreshing, not sweet or greasy.', 399, 'http://localhost/newshop/images/birthdaycake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `username` varchar(40) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `phone` varchar(40) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `email` varchar(120) COLLATE utf8_swedish_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`id`, `productid`, `username`, `phone`, `email`, `address`) VALUES
(5, 1, 'Hui Huang', '0733974601', 'hh81@163.com', 'Ribbingsväg12A Lgh1301'),
(6, 1, 'Hui Huang', '0733974601', 'hh81@163.com', 'Ribbingsväg12A Lgh1301'),
(7, 1, 'Hui Huang', '0733974601', 'hh81@163.com', 'Ribbingsväg12A Lgh1301'),
(8, 1, 'Hui Huang', '0733974601', 'hh81@163.com', 'Ribbingsväg12A Lgh1301'),
(9, 1, 'Hui Huang', '0733974601', 'Hui.Huang@yh.nackademin.se', 'Ribbingsväg12A Lgh1301');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `productorder`
--
ALTER TABLE `productorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productorder`
--
ALTER TABLE `productorder`
  ADD CONSTRAINT `productorder_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
