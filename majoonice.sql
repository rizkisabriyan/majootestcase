-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2022 at 08:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majoonice`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `ivc_id` int(11) NOT NULL,
  `ivc_nm` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `order_dt` datetime NOT NULL,
  `lmt_tm_pay` datetime NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`ivc_id`, `ivc_nm`, `address`, `order_dt`, `lmt_tm_pay`, `reg_date`) VALUES
(1, 'RIZKI SABRIYAN', 'jauh deh', '2022-08-14 00:46:18', '2022-08-15 00:46:18', '2022-08-13 17:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `ivc_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `prd_nm` varchar(50) NOT NULL,
  `qty` int(3) NOT NULL,
  `price` int(10) NOT NULL,
  `option` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `ivc_id`, `prd_id`, `prd_nm`, `qty`, `price`, `option`, `reg_date`) VALUES
(1, 1, 3, 'Majoo Desktop', 1, 10000000, '', '2022-08-13 17:46:18');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `order_sales` AFTER INSERT ON `orders` FOR EACH ROW BEGIN
    UPDATE product SET stock = stock-NEW.qty
    WHERE prd_id = NEW.prd_id; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prd_id` int(11) NOT NULL,
  `prd_nm` varchar(100) NOT NULL,
  `descriptions` varchar(200) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(4) DEFAULT NULL,
  `picture` text,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `prd_nm`, `descriptions`, `category`, `price`, `stock`, `picture`, `reg_date`) VALUES
(1, 'Majoo Standart', 'Paket standart', 'standart', 5000000, 96, 'standard_repo2.png', '2022-08-13 11:13:06'),
(2, 'Majoo Lifestyle', 'Paket Lifestyle', 'lifestyle', 12000000, 147, 'paket-lifestyle2.png', '2022-08-13 11:13:25'),
(3, 'Majoo Desktop', 'Paket Desktop', 'desktop', 10000000, 95, 'paket-desktop1.png', '2022-08-13 11:14:09'),
(4, 'Majoo Advance', 'Paket Advance untuk para Expert', 'advance', 35000000, 120, 'paket-advance1.png', '2022-08-13 11:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role_id` tinyint(3) NOT NULL,
  `is_active` tinyint(3) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `role_id`, `is_active`, `reg_date`) VALUES
(1, 'Eric', 'admin', 'eric@gmail.com', 'gatau123', 1, 1, '2022-08-13 14:35:27'),
(2, 'Maman', 'user', 'maman@gmail.com', 'gatau321', 2, 1, '2022-08-13 15:34:42'),
(3, 'Rizki', 'Eric', 'rizkytakgentar@yahoo.com', 'gini123', 2, 1, '2022-08-13 16:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `reg_date`) VALUES
(1, 'Administrator', '2022-08-11 10:47:15'),
(2, 'Member', '2022-08-11 10:47:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`ivc_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `ivc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
