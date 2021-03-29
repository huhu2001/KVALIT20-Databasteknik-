-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2021 at 01:03 PM
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
-- Database: `webshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `tel`, `email`, `address`) VALUES
(1, 'Hui Huang', '0733974601', 'huihuang@nackademin.com', 'ribbingsväg'),
(2, 'Aixia Zhong', '0733966660', 'aixiangzhong@nackademin.com', 'zettlensväg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `product_id`, `order_date`) VALUES
(1, 1, 5, '2021-02-19 13:47:18'),
(2, 1, 3, '2021-02-19 13:47:18'),
(3, 2, 1, '2021-02-19 13:47:47'),
(4, 2, 6, '2021-02-19 13:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(500) COLLATE utf8_swedish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_swedish_ci DEFAULT 'no-poster.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `price`, `description`, `image`) VALUES
(1, 'Matcha red bean cake roll', 198, 'The fluffiest matcha swiss cake roll paired with a semi-sweet azuki bean cream. Heavenly Japanese style green tea dessert just like the ones at the shops.', 'bullar.jpg'),
(2, 'Vanilla cake roll', 198, 'A deliciously soft, moist, and light vanilla cake roll', 'vanillaroll.jpg'),
(3, 'Taro cake roll', 208, 'The smooth taro mash is added with the delicate cake body, and there is only one feeling in the mouth, soft and delicious.', 'Taroroll.jpg'),
(4, 'Tiramisu', 399, 'This tiramisu is made in Japanese style. The whole cake has only 60ml of cream and 30g of sugar.', 'Tiramisu.jpg'),
(5, 'hokkaido cake', 599, 'A classic that can never be surpassed.It is troublesome to make, but the taste is absolutely pleasant.', 'hokkaido.jpg'),
(6, 'Sweet taro milk cake', 599, 'This taro cake is mixed with the cream of the mashed taro', 'Tarakaka.jpg'),
(7, 'Mango cake', 599, 'Mango-flavored cheesecake, with multiple layers and different tastes, the fresh fruity aroma is particularly delicious.', 'mangocake.jpg'),
(8, 'Strawberry cake', 566, 'Strawberry and cream are closely integrated and penetrate each other.', 'fruitcake.jpg'),
(9, 'Dödslängtan', 30, '', 'no-poster.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
