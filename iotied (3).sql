-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 05:49 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iotied`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator_super_user`
--

CREATE TABLE `administrator_super_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tx_address` text NOT NULL,
  `tokens` varchar(20) NOT NULL DEFAULT '0',
  `carbon_credits` varchar(20) NOT NULL DEFAULT '0',
  `energy_units` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator_super_user`
--

INSERT INTO `administrator_super_user` (`id`, `name`, `email`, `password`, `tx_address`, `tokens`, `carbon_credits`, `energy_units`) VALUES
(1, 'Amits', 'admin@iotied.io', 'Iostream', '0xAf55F3B7DC65c8f8577cf00C8C5CA7b6E8Cc4433', '1200000', '122000', '1002002');

-- --------------------------------------------------------

--
-- Table structure for table `buy_token`
--

CREATE TABLE `buy_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tx_address` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `no_of_tokens` float NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Approved',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `buy_tx_id` varchar(100) NOT NULL,
  `currency` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_name` varchar(50) NOT NULL,
  `file` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `user_id`, `document_name`, `file`, `status`, `date`, `username`, `email`) VALUES
(142, 75, 'KYC Document', '1578317124drake.jpg', 'Approved', '2020-01-06 16:40:32', 'NMS Lab', 'nms.lab@gmail.com'),
(143, 76, 'KYC Document', '1578328959download.png', 'Approved', '2020-01-06 16:44:31', 'Ramkrishna Hospitals', 'ramkrishna@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notification` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `for` varchar(100) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `status` varchar(20) NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `notification`, `date`, `for`, `user_id`, `status`) VALUES
(1, 'A New User Created', '2019-11-01 15:41:11', 'admin', 0, 'Unread'),
(2, 'A New User Created', '2019-11-01 15:41:14', 'admin', 0, 'Unread'),
(3, 'A New User Created', '2019-11-01 15:41:16', 'admin', 0, 'Unread'),
(4, 'A New User Created', '2019-11-02 06:20:35', 'admin', 0, 'Unread'),
(5, 'A New Asset has been added by Kishan  Sharma', '2019-11-02 06:22:03', 'admin', 0, 'Unread'),
(6, 'A New User Created', '2019-12-27 12:31:15', 'admin', 0, 'Unread'),
(7, 'A New User Created', '2019-12-27 12:32:42', 'admin', 0, 'Unread'),
(8, 'A New User Created', '2019-12-27 12:33:25', 'admin', 0, 'Unread'),
(9, 'A New User Created', '2019-12-27 12:35:45', 'admin', 0, 'Unread'),
(10, 'A New User Created', '2019-12-27 12:49:24', 'admin', 0, 'Unread'),
(11, 'A New User Created', '2020-01-05 11:13:29', 'admin', 0, 'Unread'),
(12, 'A New User Created', '2020-01-05 11:14:13', 'admin', 0, 'Unread'),
(13, 'A New User Created', '2020-01-05 11:14:26', 'admin', 0, 'Unread'),
(14, 'A New User Created', '2020-01-05 11:14:56', 'admin', 0, 'Unread'),
(15, 'A New User Created', '2020-01-05 11:29:31', 'admin', 0, 'Unread'),
(16, ' Tokens Added to ', '2020-01-05 12:07:38', 'admin', 0, 'Unread'),
(17, ' Tokens Added to ', '2020-01-05 12:07:41', 'admin', 0, 'Unread'),
(18, 'A kyc is Requested from User', '2020-01-05 13:26:25', 'admin', 0, 'Unread'),
(19, ' Tokens Added to ', '2020-01-05 14:28:13', 'admin', 0, 'Unread'),
(20, 'A New User Created', '2020-01-05 17:18:39', 'admin', 0, 'Unread'),
(21, 'A Buy Request has been Initiated', '2020-01-06 13:15:07', 'admin', 0, 'Unread'),
(22, 'A Buy Request has been Initiated', '2020-01-06 13:19:53', 'admin', 0, 'Unread'),
(23, 'A kyc is Requested from User', '2020-01-06 13:25:24', 'admin', 0, 'Unread'),
(24, 'A kyc is Requested from User', '2020-01-06 16:42:39', 'admin', 0, 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `tx` varchar(100) NOT NULL,
  `disease` varchar(70) NOT NULL,
  `reward` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `query` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tx_address` varchar(60) NOT NULL,
  `file` varchar(150) NOT NULL DEFAULT 'default.jpg',
  `gender` varchar(10) NOT NULL DEFAULT 'Male',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verified` varchar(20) NOT NULL DEFAULT 'True',
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL DEFAULT '1234567890',
  `balance` varchar(10) NOT NULL DEFAULT '500',
  `kyc_approved` varchar(20) NOT NULL DEFAULT 'Pending',
  `country` varchar(100) NOT NULL DEFAULT 'India',
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator_super_user`
--
ALTER TABLE `administrator_super_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_token`
--
ALTER TABLE `buy_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
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
-- AUTO_INCREMENT for table `administrator_super_user`
--
ALTER TABLE `administrator_super_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buy_token`
--
ALTER TABLE `buy_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
