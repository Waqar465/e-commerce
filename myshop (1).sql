-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 02:23 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(10) NOT NULL,
  `a_email` varchar(100) NOT NULL,
  `a_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_email`, `a_pass`) VALUES
(1, 'wks465@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Dell'),
(3, 'Samsung'),
(4, 'Sony'),
(5, 'Infinix'),
(6, 'Redmi'),
(7, 'Calculators');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(50) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(3, 'Cameras'),
(4, 'Tablets'),
(5, 'E-Books'),
(8, 'Websites Layouts');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(20) NOT NULL,
  `customer_address` text NOT NULL,
  `cutomer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `cutomer_image`, `customer_ip`) VALUES
(4, 'Waqar Khaliq Sial', 'ali@gmail.com', '1234', 'Pakistan', 'Lahore', 31805207, 'lahore Pakistan', 'images.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(15, 1, 3000, 46314127, 1, '2019-04-06 06:23:46', 'pending'),
(25, 1, 12000, 869721256, 1, '2019-04-06 06:36:36', 'pending'),
(26, 1, 3000, 1588337715, 1, '2019-04-06 06:37:54', 'pending'),
(27, 1, 1210, 1763876801, 2, '2019-04-06 15:49:41', 'pending'),
(28, 2, 3000, 1948177994, 1, '2019-04-10 03:54:50', 'pending'),
(29, 2, 3000, 216176679, 1, '2019-04-10 03:55:22', 'pending'),
(30, 2, 3000, 469613151, 1, '2019-04-10 03:56:17', 'pending'),
(31, 2, 0, 814714680, 0, '2019-04-10 04:00:04', 'pending'),
(32, 2, 10, 1251780524, 1, '2019-04-10 04:01:18', 'pending'),
(33, 2, 300, 240982504, 1, '2019-04-10 04:04:37', 'pending'),
(34, 2, 3000, 794044937, 1, '2019-04-10 04:10:46', 'pending'),
(35, 4, 1200, 134916359, 1, '2019-04-11 17:11:09', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref`, `code`, `payment_date`) VALUES
(1, 758123127, 700, 'Easypaisa', 123456, 123456, '1-4-2019'),
(2, 758123127, 700, 'Western Union', 123456, 21345, '12-02-2014'),
(3, 758123127, 12313, 'Western Union', 2131, 1231, '2132'),
(4, 758123127, 700, 'Easypaisa', 21345, 12, '21-2-2019'),
(5, 758123127, 123, 'Bank Transfer', 123, 12, '12'),
(6, 21, 123, 'Bank Transfer', 213, 1231, '213'),
(7, 580506088, 10, 'Easypaisa', 2312321, 1212, '10'),
(8, 1582268901, 213, 'Easypaisa', 232132, 1212, '212'),
(9, 1582268901, 1231, 'Easypaisa', 2121, 2131, '21'),
(10, 1582268901, 232, 'Easypaisa', 12132, 212, ''),
(11, 46314127, 3000, 'Western Union', 13212, 211, '21'),
(12, 1582268901, 700, 'Bank Transfer', 123456, 1231, '12-02-2014');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(1, 2, 1948177994, 11, 1, 'pending'),
(2, 2, 216176679, 11, 1, 'pending'),
(3, 2, 469613151, 11, 1, 'pending'),
(4, 2, 814714680, 0, 1, 'pending'),
(5, 2, 1251780524, 13, 1, 'pending'),
(6, 2, 240982504, 14, 1, 'pending'),
(7, 2, 794044937, 11, 1, 'pending'),
(8, 4, 134916359, 9, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `p_keywords` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `p_keywords`, `status`) VALUES
(8, 3, 4, '2019-02-07 13:00:10', 'camera for sale', 'images (5).jpg', '', '', 1200, 'good camera', 'Camera,Good', 'on'),
(9, 5, 4, '2019-02-07 13:00:15', 'ebooks', 'download (3).jpg', '', '', 1200, 'ebooks available', 'Ebooks', 'on'),
(10, 6, 5, '2019-02-07 13:00:32', 'Infinix Mobiles', '5104c0ca93d711d648eec1b6e264a0b8.jpg', 'ts_18166.png', 'images (7).jpg', 12000, 'This is a jumbo Mobile', 'Jumbo, Mobile,Infinix', 'on'),
(11, 6, 6, '2019-02-07 13:00:44', 'Redmi Mobile', '2222.jpg', '11111.jpg', '3333.jpg', 3000, 'Redmi Note7', 'Note7, Redmi', 'on'),
(13, 3, 4, '2019-02-11 16:04:58', 'Video Camera Sony', 'images (9).jpg', '', '', 10, 'this is an excellent video camera', 'Video Camera ,Sony, Brand nnew', 'on'),
(14, 2, 4, '2019-02-11 17:11:37', 'gaming Joypad', '31qwualUaLL._AC_SY200_.jpg', '', '', 300, 'this is very good joypad', 'joypad,amazing,best', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
