-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 01:47 PM
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
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notification` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `for` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
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
(17, ' Tokens Added to ', '2020-01-05 12:07:41', 'admin', 0, 'Unread');

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

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `username`, `subject`, `query`, `status`, `date`) VALUES
(1, 'st Thomas Hospital', 'My Username   is lost please Do Help?', 'My bUsername has  been lost and now i dont know what it is can your please Help me with This??', 'Pending', '2020-01-05 10:34:10'),
(2, 'st Thomas Hospital', 'Password Might Not be Working : Can You Help', 'Since past Few Days my password is Not Working if any one can help that would be Appreciated', 'Resolved', '2020-01-05 10:49:21');

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
  `gender` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verified` varchar(20) NOT NULL DEFAULT 'True',
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `balance` varchar(10) NOT NULL DEFAULT '500',
  `kyc_approved` varchar(20) NOT NULL DEFAULT 'Pending',
  `country` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tx_address`, `file`, `gender`, `date`, `verified`, `password`, `phone`, `balance`, `kyc_approved`, `country`, `type`) VALUES
(67, 'Kishan  Sharma', 'crazykane2000@gmail.com', '0xc8a2b8886475e14cd918865c176d3fc55af443c1', 'default.jpg', '', '2019-12-27 12:36:03', 'Yes', 'password', '', '500', 'Pending', 'United States', 'Patient'),
(69, 'Demo', 'demo@iotioed.com', '0x5e05f9931a8405e05f9931a842', 'default.jpg', '', '2019-12-27 12:36:01', 'Yes', 'pass', '', '500', 'Pending', 'India', 'Patient'),
(70, 'rajesh ', 'rajesh@iotied.com', '0x5e05f9ea4e73f5e05f9ea4e743', 'default.jpg', '', '2019-12-27 12:35:58', 'Yes', 'pass', '', '500', 'Pending', 'India', 'Patient'),
(71, 'Polo', 'polo@iotied.com', '0x5e05fa15aff355e05fa15aff37', 'default.jpg', '', '2019-12-27 12:35:55', 'Yes', 'pass', '', '500', 'Pending', 'India', 'Patient'),
(72, 'kela', 'kela@iotied.com', '0x5e05faa11afde5e05faa11afe2', 'default.jpg', '', '2019-12-27 12:35:45', 'Yes', 'pass', '', '500', 'Pending', 'India', 'Patient'),
(73, 'st Thomas Hospital', 'stthomas@gmail.com', '0x5e05fdd3e68735e05fdd3e6875', 'default.jpg', '', '2019-12-27 12:49:23', 'Yes', 'pass', '', '500', 'Pending', 'India', 'Hospital'),
(74, 'Devanda Hospitals', 'devanda@gmail.com', '0x3cc41183ec98c057d53f496acafadf94aa028f4e', 'default.jpg', '', '2020-01-05 11:14:56', 'Yes', 'pass', '', '500', 'Pending', 'India', 'Hospital'),
(75, 'NMS Lab', 'nms.lab@gmail.com', '0xe923fa40de171f0482aee056b7f44d8b9da374ef', 'default.jpg', '', '2020-01-05 11:29:31', 'Yes', 'pass', '', '500', 'Pending', 'India', 'Laboratory');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
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
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
