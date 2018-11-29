-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 06:39 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `po_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `cart_total` varchar(100) NOT NULL,
  `bill_fname` varchar(100) NOT NULL,
  `bill_lname` varchar(100) NOT NULL,
  `bill_add` varchar(100) NOT NULL,
  `bill_city` varchar(100) NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_phone` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`po_id`, `u_id`, `cart_total`, `bill_fname`, `bill_lname`, `bill_add`, `bill_city`, `bill_email`, `bill_phone`, `status`, `date`) VALUES
(1, 3, '13000', 'Jake', 'Bornilla', '123 abcd st ', 'khi', 'bornillajerichojake@ymail.com', '09159514787', 'delivered', '2018-11-06 05:17:16'),
(2, 4, '31000', 'Jake', 'Bornilla', '123 abcd st ', 'khi', 'bornillajerichojake@ymail.com', '09159514787', 'delivered', '2018-11-06 05:17:21'),
(3, 3, '49000', 'Jake', 'Bornilla', '123 abcd st ', 'khi', 'jakebornilla29@gmail.com', '09159514787', 'delivered', '2018-11-08 07:55:15'),
(4, 3, '45', 'as', 's', 's', 'khi', 'bornillajerichojake@ymail.com', '09159514787', '', '2018-11-28 11:21:12'),
(5, 3, '45', 'Jake', 'Bornilla', '123 abcd st ', 'Pasay City', 'jakebornilla29@gmail.com', '09159514787', '', '2018-11-28 11:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_des` varchar(1000) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `file_ext` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `product_name`, `product_category`, `product_price`, `product_des`, `file_name`, `file_path`, `file_ext`) VALUES
(2, 'Apple', 'Fruits ', '25', 'This is a fresh fruit from province.', 'apple.jpg', 'C:/xampp/htdocs/grocery_shopping/uploads/', '.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `ph_id` int(11) NOT NULL,
  `oh` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_price` varchar(100) NOT NULL,
  `p_qty` varchar(100) NOT NULL,
  `u_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_history`
--

INSERT INTO `purchase_history` (`ph_id`, `oh`, `p_name`, `p_price`, `p_qty`, `u_id`, `date`) VALUES
(1, 1, 'naysu', '12000', '1', 3, '2018-11-05 07:23:48'),
(2, 2, 'wew', '15000', '2', 4, '2018-11-06 05:13:10'),
(3, 3, 'wew', '12000', '4', 3, '2018-11-08 07:54:33'),
(4, 4, 'Apple', '25', '1', 3, '2018-11-28 11:21:12'),
(5, 5, 'Apple', '25', '1', 3, '2018-11-28 11:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `fname`, `lname`, `username`, `email`, `password`, `status`) VALUES
(3, 'Jake', 'Bornilla', 'jake123', 'bornillajerichojake@ymail.com', '09159514787', ''),
(4, 'Jericho', 'Bornilla', 'jericho123', 'jgbornilla@ymail.com', '09569064136', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`ph_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
