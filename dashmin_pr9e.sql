-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 12:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashmin_pr9e`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(2, 'laptop', 'banner-07.jpg'),
(4, 'watch', '362671246_667034875462798_3485439598001361988_n.jpg'),
(5, 'mobilessss', 'banner-07.jpg'),
(6, 'bags', 'user.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `total_products_count` int(11) NOT NULL,
  `sum_of_total_products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `user_id`, `user_name`, `total_products_count`, `sum_of_total_products`) VALUES
(1, 3, 'aqsa', 2, 102490),
(2, 1, 'fariha', 3, 228470);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(200) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `pro_name` varchar(200) DEFAULT NULL,
  `pro_qty` int(11) DEFAULT NULL,
  `pro_price` int(11) DEFAULT NULL,
  `dateoforderplace` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(200) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `user_name`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `dateoforderplace`, `status`) VALUES
(1, 1, 'fariha', 1, 'infinix hot 10', 2, 54500, '2023-09-14 05:00:53', 'pending'),
(2, 1, 'fariha', 2, 'rolex ', 2, 50000, '2023-12-15 04:07:20', 'pending'),
(3, 1, 'fariha', 3, 'purse', 1, 2490, '2023-12-15 04:07:20', 'pending'),
(4, 1, 'fariha', 2, 'rolex ', 2, 50000, '2023-12-15 04:11:38', 'pending'),
(5, 1, 'fariha', 4, 'JUICCE', 1, 3000, '2023-12-15 04:11:38', 'pending'),
(6, 1, 'fariha', 2, 'rolex ', 2, 50000, '2023-12-15 04:12:10', 'pending'),
(7, 1, 'fariha', 4, 'JUICCE', 1, 3000, '2023-12-15 04:12:10', 'pending'),
(8, 1, 'fariha', 2, 'rolex ', 2, 50000, '2023-12-15 04:18:26', 'pending'),
(9, 1, 'fariha', 4, 'JUICCE', 2, 3000, '2023-12-15 04:18:26', 'pending'),
(10, 1, 'fariha', 2, 'rolex ', 2, 50000, '2023-12-15 04:18:44', 'pending'),
(11, 1, 'fariha', 4, 'JUICCE', 2, 3000, '2023-12-15 04:18:44', 'pending'),
(12, 3, 'aqsa', 2, 'rolex ', 2, 50000, '2023-12-15 04:20:31', 'pending'),
(13, 3, 'aqsa', 3, 'purse', 1, 2490, '2023-12-15 04:20:31', 'pending'),
(14, 3, 'aqsa', 2, 'rolex ', 2, 50000, '2023-12-15 04:21:15', 'pending'),
(15, 3, 'aqsa', 3, 'purse', 1, 2490, '2023-12-15 04:21:15', 'pending'),
(16, 3, 'aqsa', 2, 'rolex ', 2, 50000, '2023-12-15 04:21:58', 'pending'),
(17, 3, 'aqsa', 3, 'purse', 1, 2490, '2023-12-15 04:21:58', 'pending'),
(18, 3, 'aqsa', 2, 'rolex ', 2, 50000, '2023-12-15 04:22:01', 'pending'),
(19, 3, 'aqsa', 3, 'purse', 1, 2490, '2023-12-15 04:22:01', 'pending'),
(20, 3, 'aqsa', 2, 'rolex ', 2, 50000, '2023-12-15 04:22:36', 'pending'),
(21, 3, 'aqsa', 3, 'purse', 1, 2490, '2023-12-15 04:22:36', 'pending'),
(22, 3, 'aqsa', 2, 'rolex ', 2, 50000, '2023-12-15 04:22:41', 'pending'),
(23, 3, 'aqsa', 3, 'purse', 1, 2490, '2023-12-15 04:22:41', 'pending'),
(24, 3, 'aqsa', 2, 'rolex ', 2, 50000, '2023-12-15 04:22:43', 'pending'),
(25, 3, 'aqsa', 3, 'purse', 1, 2490, '2023-12-15 04:22:43', 'pending'),
(26, 3, 'aqsa', 2, 'rolex ', 2, 50000, '2023-12-15 04:23:32', 'pending'),
(27, 3, 'aqsa', 3, 'purse', 1, 2490, '2023-12-15 04:23:32', 'pending'),
(28, 1, 'fariha', 3, 'purse', 3, 2490, '2023-12-15 04:27:20', 'pending'),
(29, 1, 'fariha', 1, 'infinix hot 10', 4, 54500, '2023-12-15 04:27:20', 'pending'),
(30, 1, 'fariha', 4, 'JUICCE', 1, 3000, '2023-12-15 04:27:20', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `category_type_id` int(11) DEFAULT NULL,
  `product_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_qty`, `product_price`, `category_type_id`, `product_image`) VALUES
(1, 'infinix hot 10', 2, 54500, 5, 'abc.jpg'),
(2, 'rolex ', 4, 50000, 4, '186-removebg-preview.png'),
(3, 'purse', 4, 2490, 6, 'digital-tablet-placed-near-rounded-icons-social-media-printed-paper-cut-out.jpg'),
(4, 'JUICCE', 23, 3000, 6, 'digital-tablet-placed-near-rounded-icons-social-media-printed-paper-cut-out.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'fariha', 'fari@gmail.com', '123', 'user'),
(2, 'admin', 'admin@gmail.com', 'admin123', 'admin'),
(3, 'aqsa', 'a@gmail.com', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_type_id` (`category_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_type_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
