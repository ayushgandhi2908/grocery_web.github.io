-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 05:37 AM
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
-- Database: `grocery_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cat`
--

CREATE TABLE `admin_cat` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_cat`
--

INSERT INTO `admin_cat` (`id`, `name`, `date`) VALUES
(6, 'product 1', '2023-01-18 10:45:47'),
(8, 'Prodcut 2', '2023-02-11 12:26:17'),
(9, 'Product 3', '2023-02-11 12:26:21'),
(10, 'Vegitables', '2023-02-11 12:26:38'),
(11, 'product 1', '2023-02-15 12:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `date`) VALUES
(1, 'admin', 'admin', '2023-01-18 10:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `list_price` int(255) NOT NULL,
  `disc_price` int(255) NOT NULL,
  `disc_per` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `list_price`, `disc_price`, `disc_per`, `quantity`, `total_price`, `mobile`, `image`, `date`) VALUES
(47, 'Cabage', 60, 55, 8, 1, 55, '9637184176', 'cabbage.jpeg', '2023-02-15 13:28:56'),
(48, 'Lemon', 40, 35, 13, 1, 35, '9637184176', 'lemon.jpeg', '2023-02-15 18:39:48'),
(51, '1', 1, 1, 11, 11, 1, '11', '1', '2023-02-15 19:13:27'),
(56, 'Carrot', 50, 40, 20, 1, 40, '1234', 'carrat.jpg', '2023-02-15 19:33:00'),
(57, 'Lady Finger', 50, 49, 2, 1, 49, '1234', 'lady finger.png', '2023-02-15 19:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `disc` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `cust_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` text NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `fname`, `lname`, `cust_id`, `email`, `mobile`, `address`, `password`, `date`) VALUES
(11, 'vivel', 'shi', '#9606835799170', 'shibevivek@gmail.com', '9637184176', 'ththththht', '$2y$10$HZTri8MsIy44e0baZh4Pye4oPTulxnoum2gz1qx.koySElVD7nvTK', '2023-02-14 20:19:37'),
(12, 'dsln', 'sdkjf', '#7941673259852', '1234@gmail.com', '1234', 'khed', '$2y$10$g/f2Q/t7fLOzR2rTO/YDKu1xWyq7bNRwXiueNUltjqSan/OxXS9na', '2023-02-15 18:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `order_id` text NOT NULL,
  `prod_name` text NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_mobile` int(255) NOT NULL,
  `cust_address` text NOT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL,
  `bank_name` text NOT NULL,
  `gateway` text NOT NULL,
  `txn_amt` int(255) NOT NULL,
  `txn_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `prod_name`, `price`, `quantity`, `cust_name`, `cust_mobile`, `cust_address`, `order_time`, `status`, `bank_name`, `gateway`, `txn_amt`, `txn_status`) VALUES
(47, 'ORD435018225', 'Carrot', 400, 10, 'dsln sdkjf', 1234, 'khed', '2023-02-15 19:21:51', 'pending', 'State Bank of India', 'SBI', 400, 'TXN_SUCCESS'),
(48, 'ORD435018225', 'Carrot', 400, 10, 'dsln sdkjf', 1234, 'khed', '2023-02-15 19:22:25', 'pending', 'State Bank of India', 'SBI', 400, 'TXN_SUCCESS'),
(49, 'ORD435018225', 'Carrot', 400, 10, 'dsln sdkjf', 1234, 'khed', '2023-02-15 19:24:19', 'pending', 'State Bank of India', 'SBI', 400, 'TXN_SUCCESS'),
(50, 'ORD379355957', 'Carrot', 400, 10, 'dsln sdkjf', 1234, 'khed', '2023-02-15 19:26:52', 'pending', 'Kotak Bank', 'NKMB', 80, 'TXN_SUCCESS'),
(51, 'ORD360396394', 'Cabage', 55, 1, 'dsln sdkjf', 1234, 'khed', '2023-02-15 19:28:20', 'pending', 'ICICI Bank', 'ICICI', 49, 'TXN_SUCCESS'),
(52, 'ORD440264105', 'Carrot', 40, 1, 'dsln sdkjf', 1234, 'khed', '2023-02-15 19:33:17', 'pending', 'State Bank of India', 'SBI', 49, 'TXN_SUCCESS'),
(53, 'ORD868624740', 'Carrot', 40, 1, 'dsln sdkjf', 1234, 'khed', '2023-02-15 19:35:18', 'pending', 'State Bank of India', 'SBI', 49, 'TXN_SUCCESS'),
(54, 'ORD868624740', 'Carrot', 40, 1, 'dsln sdkjf', 1234, 'khed', '2023-02-15 19:36:10', 'pending', 'State Bank of India', 'SBI', 49, 'TXN_SUCCESS');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `list_price` int(255) NOT NULL,
  `disc_price` int(255) NOT NULL,
  `disc_percentage` int(255) NOT NULL,
  `image` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `cat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `list_price`, `disc_price`, `disc_percentage`, `image`, `date`, `cat`) VALUES
(10, 'Cabage', 60, 55, 8, 'cabbage.jpeg', '2023-01-19 10:35:43', ''),
(11, 'Carrot', 50, 40, 20, 'carrat.jpg', '2023-01-19 10:36:25', ''),
(12, 'Lady Finger', 50, 49, 2, 'lady finger.png', '2023-01-19 10:37:21', ''),
(14, 'Lemon', 40, 35, 13, 'lemon.jpeg', '2023-01-19 10:37:56', ''),
(16, 'Apple', 100, 90, 10, 'product-7.png', '2023-01-19 10:38:42', ''),
(17, 'Sweet Potato', 85, 80, 6, 'sweet potato.jpg', '2023-01-19 10:39:06', ''),
(18, 'asudh', 12, 12, 0, 'carrat.jpg', '2023-02-11 12:28:53', ''),
(19, 'ayush', 1212, 12, 99, 'carrat.jpg', '2023-02-11 12:29:31', ''),
(20, 'ayush', 1212, 12, 99, 'carrat.jpg', '2023-02-11 12:30:55', ''),
(21, 'ahdsk', 24234, 234, 99, 'category-1.png', '2023-02-11 12:31:09', 'product 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cat`
--
ALTER TABLE `admin_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cat`
--
ALTER TABLE `admin_cat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
