-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2015 at 03:57 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'oto');

-- --------------------------------------------------------

--
-- Table structure for table `tweetcoments`
--

CREATE TABLE IF NOT EXISTS `tweetcoments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text CHARACTER SET utf8 NOT NULL,
  `tweet_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweetcoments`
--

INSERT INTO `tweetcoments` (`id`, `user_id`, `add_date`, `content`, `tweet_id`) VALUES
(1, 17, '2015-12-24 05:21:07', 'test coment', 37),
(2, 14, '2015-12-24 05:21:07', 'test comentdsadsadsad', 37),
(3, 17, '2015-12-24 05:21:07', 'test coment', 36),
(5, 17, '2015-12-15 00:50:30', 'test', 34),
(6, 17, '2015-12-15 00:51:21', 'test', 34),
(8, 17, '2015-12-15 00:59:55', 'bla bla bla', 43),
(9, 17, '2015-12-15 02:14:09', ':P', 35);

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `id` bigint(20) unsigned NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tweet_image_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `content`, `user_id`, `add_date`, `tweet_image_name`) VALUES
(34, 'minda programisti gavxde :D ', 17, '2015-12-12 20:17:11', 'Fotolia_51875542_Subscription_Monthly_M.jpg'),
(35, 'mec minda programistoba :( ', 14, '2015-12-12 20:20:07', 'hire-a-wordpress-designer-1024x768_jpg.jpg'),
(45, 'test', 17, '2015-12-17 11:44:02', 'Untitled.png'),
(50, 'test', 17, '2015-12-17 11:47:38', '3_code-matrix-944969.jpg'),
(51, 'test', 17, '2015-12-17 11:47:42', '5K0XYs6k.jpg'),
(56, 'test', 17, '2015-12-17 14:52:32', 'Untitled2.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gender` enum('male','female') DEFAULT 'male',
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `hiddenEmail` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `image_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `reg_date`, `gender`, `lname`, `fname`, `hiddenEmail`, `phone`, `image_name`) VALUES
(14, 'fe2f83cb32f86faec6c7e3265a962af820d0ecae', 'tsankashvili@test.com', '2015-12-06 23:40:55', 'male', 'tsankashivli', 'mish', ' 566c813462e5d962078234 ', '599999999', ''),
(15, 'fe2f83cb32f86faec6c7e3265a962af820d0ecae', 'levani@gmail.com', '2015-12-10 15:25:46', 'female', 'gongadze', 'levani', ' 5672bf324c076564843911 ', '', ''),
(17, 'fe2f83cb32f86faec6c7e3265a962af820d0ecae', 'pkhaladze133@gmail.com', '2015-12-10 22:30:53', 'male', 'pkhaladze', 'temuri', ' 5672bf4845b731156839531 ', '599449558', ''),
(18, 'fe2f83cb32f86faec6c7e3265a962af820d0ecae', 'gela@gmail.com', '2015-12-12 22:08:51', 'male', 'bendeliani', 'gela', ' 566ce43d5b3e11057269876 ', '557270777', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_images`
--

CREATE TABLE IF NOT EXISTS `users_images` (
  `id` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `images_id` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_images`
--

INSERT INTO `users_images` (`id`, `image_name`, `images_id`) VALUES
(2, '1417278342_sgphoto_2014_11_29-20_22_32.png', '17'),
(3, 'news_37083.jpg', ''),
(4, '', ''),
(5, '', ''),
(6, '', ''),
(7, '', ''),
(8, '', ''),
(9, '', ''),
(10, '2.PNG', ''),
(11, '11.PNG', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweetcoments`
--
ALTER TABLE `tweetcoments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_images`
--
ALTER TABLE `users_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tweetcoments`
--
ALTER TABLE `tweetcoments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users_images`
--
ALTER TABLE `users_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
