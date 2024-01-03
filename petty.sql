-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 02:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petty`
--

-- --------------------------------------------------------

--
-- Table structure for table `mybag`
--

CREATE TABLE `mybag` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mybag`
--

INSERT INTO `mybag` (`id`, `user_id`, `product_id`, `qty`, `total`) VALUES
(186, 1, 36, 1, 65),
(187, 1, 37, 1, 80),
(188, 1, 35, 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `ProdName` varchar(100) NOT NULL,
  `ProdCategory` varchar(100) NOT NULL,
  `ProdPrice` int(11) NOT NULL,
  `ProdCounts` int(11) NOT NULL,
  `ProdImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ProdName`, `ProdCategory`, `ProdPrice`, `ProdCounts`, `ProdImage`) VALUES
(35, 'Beef', 'dogs', 50, 100, 'image/prod/product_04.jpg'),
(36, 'Lamp', 'dogs', 65, 100, 'image/prod/product_03.jpg'),
(37, 'Salmon', 'cats', 80, 100, 'image/prod/product_05.jpg'),
(38, 'Venison', 'dogs', 55, 100, 'image/prod/product_06.jpg'),
(39, 'Chicken', 'dogs', 30, 100, 'image/prod/product_01.jpg'),
(40, 'Beef', 'dogs', 65, 100, 'image/prod/product_02.jpg'),
(41, 'Salmon', 'dogs', 80, 20, 'image/prod/beaf steak.png'),
(43, 'Product', 'cats', 1000, 20, 'image/prod/salmon fish.png');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `product_id`, `qty`, `total`, `time`) VALUES
(1, 1, 37, 5, '400', '2022-10-30 22:46:27'),
(2, 1, 38, 5, '275', '2022-10-30 22:46:27'),
(3, 1, 35, 2, '100', '2022-10-30 22:46:27'),
(4, 1, 37, 5, '400', '2022-10-30 22:47:44'),
(5, 1, 38, 5, '275', '2022-10-30 22:47:44'),
(6, 1, 35, 2, '100', '2022-10-30 22:47:44'),
(7, 1, 37, 5, '400', '2022-10-30 22:47:49'),
(8, 1, 38, 5, '275', '2022-10-30 22:47:49'),
(9, 1, 35, 2, '100', '2022-10-30 22:47:49'),
(10, 1, 37, 5, '400', '2022-10-30 22:48:27'),
(11, 1, 38, 5, '275', '2022-10-30 22:48:27'),
(12, 1, 35, 2, '100', '2022-10-30 22:48:27'),
(13, 1, 36, 1, '65', '2022-10-30 22:51:58'),
(14, 1, 37, 1, '80', '2022-10-30 22:51:58'),
(15, 1, 38, 1, '55', '2022-10-30 22:51:58'),
(16, 1, 37, 1, '80', '2022-10-30 22:56:18'),
(17, 1, 37, 1, '80', '2022-10-30 22:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`) VALUES
(1, 'abdo goda', 'abdogoda0a@gmail.com', '01019135059', '8ش القدس، الترولي ،مدينه السلام ،القاهره', 'Abdogoda0a'),
(2, 'user2', 'user2@gmail.com', '0222222222222222', 'user2 address', 'user2'),
(3, 'user3', 'user3@gmail.com', '03333333333333', 'user3 address', 'user3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mybag`
--
ALTER TABLE `mybag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mybag`
--
ALTER TABLE `mybag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
