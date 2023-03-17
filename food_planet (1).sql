-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 03:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_planet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(30) NOT NULL,
  `admin_pass` varchar(30) NOT NULL,
  `admin_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_user`, `admin_pass`, `admin_date`) VALUES
(1, 'admin', 'admin', '2022-06-11 15:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `admin_orders`
--

CREATE TABLE `admin_orders` (
  `sno` int(100) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `txn_amt` int(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `gateway` varchar(255) NOT NULL,
  `txn_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` int(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_cust_id` varchar(255) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_no_of_plates` int(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `food_id` int(255) NOT NULL,
  `food_image` varchar(255) NOT NULL,
  `dboy` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_orders`
--

INSERT INTO `admin_orders` (`sno`, `order_id`, `txn_amt`, `bank_name`, `Status`, `gateway`, `txn_date`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_cust_id`, `food_name`, `food_no_of_plates`, `payment_type`, `order_status`, `food_id`, `food_image`, `dboy`) VALUES
(94, 'ORDS390356449', 499, 'Null', 'pending', '', '2023-02-05 18:16:01', 'ayush gandhi', 'qwer@gmail.com', 1234, 'asd', '#739948509927604101', 'Makhni Paneer Biryani. ', 1, 'Cash On Delivery', 'pending', 13, 'download (7).jpg', ''),
(95, 'ORDS359491991', 499, 'Null', 'TxnSuccess', '', '2023-02-06 13:03:23', 'ashwini2', 'ashwini@gmail.com', 2147483647, 'khed', '#121637427134944392', 'Makhni Paneer Biryani. ', 1, 'Cash On Delivery', 'Completed', 13, 'download (7).jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `date`) VALUES
(1, 'Drink', '2022-08-24 20:14:56'),
(2, 'Non-Veg', '2022-08-24 20:21:57'),
(3, 'Veg', '2022-08-24 20:22:05'),
(5, 'Biryani', '2022-08-24 20:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `discription`, `date`) VALUES
(30, '', '', '', '2023-02-05 16:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `id` int(50) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_email` varchar(50) NOT NULL,
  `d_mobile` int(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`id`, `d_name`, `d_email`, `d_mobile`, `date`) VALUES
(1, 'Delivery Boy 1', 'dboy1@gmail.com', 9509090, '2022-08-25 19:50:03'),
(2, 'test', 'tester@gmail.com', 333333, '2022-08-26 11:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `food_comment`
--

CREATE TABLE `food_comment` (
  `comment_id` int(255) NOT NULL,
  `food_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_comment`
--

INSERT INTO `food_comment` (`comment_id`, `food_id`, `user_name`, `user_email`, `comment`, `date`) VALUES
(1, 6, 'ayush gandhi', 'ayushgandhi1818@gmail.com', 'I loved this food :)))))\r\n', '2022-08-25 18:53:29'),
(2, 13, 'ayush gandhi', 'qwer@gmail.com', 'helllo its very nice products\r\n', '2023-01-26 12:51:30'),
(3, 13, 'ayush gandhi', 'qwer@gmail.com', 'helllo its very nice products\r\n', '2023-01-26 12:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `food_details`
--

CREATE TABLE `food_details` (
  `food_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `discription` text NOT NULL,
  `amount` int(10) NOT NULL,
  `delivery_charge` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_details`
--

INSERT INTO `food_details` (`food_id`, `name`, `discription`, `amount`, `delivery_charge`, `image`, `category`, `date`) VALUES
(1, ' Grilled Chicken Escalope with Fresh Salsa', 'An escalope is traditionally a piece of boneless meat that has been thinned out using a mallet or rolling pin or beaten with the handle of a knife, or merely butterflied. The mallet breaks down the fibres in the meat, making it more tender. The meat is then coated and fried.', 300, 50, 'grilled-chicken-escalope.jpg', 'Non-Veg', '2022-08-24 20:26:29'),
(3, 'Pina Colada Pork Ribs', 'Pina Colada Pork Ribs', 400, 50, 'dow.jpg', 'Non-Veg', '2022-08-24 20:30:50'),
(4, 'Tandoori Lamb Chops', '4. Tandoori Lamb Chops', 500, 40, 'photo.jpg', 'Non-Veg', '2022-08-24 20:33:41'),
(5, 'Keema Samosa with Yoghurt Dip', 'Keema Samosa with Yoghurt Dip', 500, 50, 'download.jpg', 'Non-Veg', '2022-08-24 20:37:49'),
(6, 'Mutton Korma', 'Mutton Korma', 400, 30, 'download (1).jpg', 'Non-Veg', '2022-08-24 20:40:07'),
(7, 'Batar Paneer Masala', 'batar paneer masala', 149, 49, 'download (2).jpg', 'Veg', '2022-08-25 18:56:26'),
(8, 'matar paneer masala', 'matar paneer masala', 129, 49, 'download (3).jpg', 'Veg', '2022-08-25 18:57:55'),
(9, 'panner tikka', 'panner tikka', 99, 39, 'download (4).jpg', 'Veg', '2022-08-25 18:59:33'),
(10, 'Shahi Paneer', 'Shahi Paneer', 299, 50, 'download (5).jpg', 'Veg', '2022-08-25 19:01:11'),
(11, 'Chicken Reshmi Biryani', 'Chicken Reshmi Biryani', 499, 3, 'download (6).jpg', 'Biryani', '2022-08-25 19:03:20'),
(12, 'Makhni Paneer Biryani. ', 'Makhni Paneer Biryani. ', 499, 49, 'download (7).jpg', 'Biryani', '2022-08-25 19:04:16'),
(13, 'Makhni Paneer Biryani. ', 'Makhni Paneer Biryani. ', 499, 49, 'download (7).jpg', 'Biryani', '2022-08-25 19:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(225) NOT NULL,
  `cust_id` varchar(225) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` text NOT NULL,
  `address` text NOT NULL,
  `password` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `cust_id`, `name`, `email`, `mobile`, `address`, `password`, `date`) VALUES
(1, '#679880455258675080', 'ayush gandhi', 'ayushgandhi1818@gmail.com', '7397807795', 'shivtar road ', '$2y$10$OVsYl5TdYnQxVncGoAMY3uXd4mFNp6Nk/eXae9f.vYErE9Jtpuhya', '2022-08-24 20:10:44'),
(2, '#595350182585888873', 'tester', 'tester@gmail.com', '123456789', 'testing', '$2y$10$uAf.vyqeZXddYb4x08AieOlHxC1/d6lXoGqYqL8eAgXts3k9H6qDu', '2022-08-25 19:07:47'),
(3, '#778658488744047159', 'amit', 'a@a.com', '909009090909', 'khed', '$2y$10$mPlHga7lhpKMtNWEbVzr1OklI68z9L5jFjJS0.3Tiwv0h7xoKPmxO', '2022-08-26 11:30:30'),
(4, '#525312541661161379', 'amit', 'a@a1.com', '1234567890', 'khed', '$2y$10$ZGu8R6YAmEtC92Xcs0HR1.HkfsUUITDw20aiqtbtX5/An3HpJLNLa', '2022-08-26 11:32:04'),
(5, '#739948509927604101', 'ayush gandhi', 'qwer@gmail.com', '1234', 'asd', '$2y$10$n5K7B0lDpL/BCmwebnR6DOssAW0ZFs30GIj3PwkdWNxZwncSeaBLS', '2023-01-26 12:48:43'),
(6, '#121637427134944392', 'ashwini2', 'ashwini@gmail.com', '8308270612', 'khed', '$2y$10$qgJPGYJOmagiMYbTgP2Nu.aPJ4rsfx3j2LFy8zrMB9Je9e5K19IMK', '2023-02-06 13:01:18'),
(11, '#43834197320461179', 'Ayush Gandhi', 'fs@gmail.com', '0987654321', 'khed', '$2y$10$yB9gsVB25.SuVHRwyiQghOF2pjy8mDvj7mKLdjwWKGj0Z7Qdn5BbO', '2023-02-11 20:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_carts`
--

CREATE TABLE `user_carts` (
  `cart_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` text NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_quantity` int(255) NOT NULL,
  `delivery_charge` int(255) NOT NULL,
  `food_price` int(255) NOT NULL,
  `food_category` varchar(255) NOT NULL,
  `food_img` varchar(10000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `food_id` int(255) NOT NULL,
  `address` text NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_carts`
--

INSERT INTO `user_carts` (`cart_id`, `user_name`, `user_email`, `user_mobile`, `food_name`, `food_quantity`, `delivery_charge`, `food_price`, `food_category`, `food_img`, `date`, `food_id`, `address`, `total`) VALUES
(96, 'ayush gandhi', 'qwer@gmail.com', '1234', 'Makhni Paneer Biryani. ', 1, 49, 499, 'Biryani', 'download (7).jpg', '2023-02-05 18:16:35', 13, 'asd', 499),
(98, 'ashwini2', 'ashwini@gmail.com', '8308270612', 'Makhni Paneer Biryani. ', 9, 49, 499, 'Biryani', 'download (7).jpg', '2023-02-06 13:10:05', 13, 'khed', 4491);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_orders`
--
ALTER TABLE `admin_orders`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_comment`
--
ALTER TABLE `food_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `food_details`
--
ALTER TABLE `food_details`
  ADD PRIMARY KEY (`food_id`);
ALTER TABLE `food_details` ADD FULLTEXT KEY `name` (`name`,`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`) USING HASH;

--
-- Indexes for table `user_carts`
--
ALTER TABLE `user_carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_orders`
--
ALTER TABLE `admin_orders`
  MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_comment`
--
ALTER TABLE `food_comment`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food_details`
--
ALTER TABLE `food_details`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_carts`
--
ALTER TABLE `user_carts`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
