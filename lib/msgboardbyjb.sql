-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2022 at 04:01 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msgboardbyjb`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `message_details` longtext DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_user_id`, `to_user_id`, `message_details`, `date_created`) VALUES
(127, 90, 82, 'ghgfhfghg', '2022-12-01 04:45:39'),
(141, 90, 69, 'sdasdasd', '2022-12-01 09:28:28'),
(142, 69, 69, 'dsadsadfdf', '2022-12-05 02:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `reply_details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `message_id`, `date_created`, `reply_details`) VALUES
(1, 69, 109, '2022-12-01 03:54:46', 'sdasdsadas'),
(2, 69, 109, '2022-12-01 03:56:06', 'sdasdasdfdsfdsf'),
(3, 69, 109, '2022-12-01 03:56:37', 'dasdsadsasds'),
(4, 69, 109, '2022-12-01 03:57:17', 'ghjghjghj'),
(5, 69, 114, '2022-12-01 04:00:00', 'hjkhjkhjkjhkj'),
(6, 69, 112, '2022-12-01 04:16:07', 'uh\r\n'),
(7, 69, 123, '2022-12-01 04:40:56', 'sdasdasds'),
(8, 90, 123, '2022-12-01 04:41:41', 'sadsadsadfdfdsfsdfsdf'),
(9, 69, 123, '2022-12-01 04:42:07', 'hgfhgfhgfhgfhgfhfg'),
(10, 90, 134, '2022-12-01 05:17:14', 'dasdasdasdasd'),
(14, 90, 137, '2022-12-01 08:12:13', 'bnbvnbvnvbnvbnb'),
(18, 90, 137, '2022-12-01 08:26:44', ',.,.,m.hjghjh'),
(43, 69, 141, '2022-12-02 00:28:36', 'the ready set '),
(44, 69, 141, '2022-12-02 00:36:56', 'dsdsads HI'),
(45, 69, 141, '2022-12-02 00:37:51', 'vcbvcb fgdf cvbvb ghdgf fg'),
(46, 69, 141, '2022-12-05 02:36:42', 'sasasa'),
(47, 69, 141, '2022-12-05 02:36:48', 'ddsdasdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `hobby` text DEFAULT NULL,
  `profilepic` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_lastlog_in` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `age`, `gender`, `birthday`, `hobby`, `profilepic`, `date_created`, `date_lastlog_in`, `date_modified`) VALUES
(69, '123', 'kikaha@mailinator.com', '$2a$10$TCIEHKQIXYe.jnT10lgEeu5R1g/t5Z90Wc5KSqKSd7epQnK66isG2', 'Gabriel', 'Rice', 23, 'Female', '1999-10-19', 'Reprehenderit quo pasadasdasdas', '2022113044878665-st,small,507x507-pad,600x600,f8f8f8.u1.jpg', '2022-11-28 08:29:02', '2022-11-27 16:00:00', '2022-11-28 08:29:02'),
(81, 'manin', 'cusehe@mailinator.com', '$2a$10$ZZyuz34rQS9Mr2s3WoLxI.4/z8e0bEv6W.fUxEL1s.QkIyCkpPxd.', 'Mannix', 'Ortiz', 13, 'Female', '2009-11-19', 'Ut ad soluta et volus sdffdsfdsf', '202211291353727108-bleach-hollow-ichigo-ichigo-kurosaki-wallpaper-preview.jpeg', '2022-11-29 02:55:30', '2022-11-28 16:00:00', '2022-11-29 02:55:30'),
(82, 'hapiv', 'kyxuka@mailinator.com', '$2a$10$M1DdNwTTbMQCwPTLEB7DlutSIzO17vUDQzqEAoCRXxVgLDVg3p06m', 'Jasmine', 'Larson', 23, 'Male', '1999-02-11', 'Id dolor irure quia ', '202211292097573574-download (1).jpeg', '2022-11-29 07:57:10', '2022-11-29 00:57:09', '2022-11-29 07:57:10'),
(84, 'lolozeb', 'zygaxo@mailinator.com', '$2a$10$Vj.HWoEVX11UjxAd6DEi.OTY0Tj9GppwCNq90KibAa.16p1.l9Wai', 'Reagan', 'Fox', 29, 'Male', '1993-10-12', 'Esse omnis consequat', 'NoPic.png', '2022-11-29 09:33:15', '2022-11-29 02:33:15', '2022-11-29 09:33:15'),
(89, 'covapexu', 'volopuwage@mailinator.com', '$2a$10$bkXUJdqFaOlxn4CbDpr7M.3OoUl3xVIOMLWqIqNtX745633Z3bRke', NULL, NULL, NULL, NULL, NULL, NULL, 'NoPic.png', '2022-11-30 09:02:06', '2022-11-30 02:02:06', '2022-11-30 09:02:06'),
(90, 'xadiholid', 'lunatu@mailinator.com', '$2a$10$VxZQiIOrfjDBfCkmXDar6.rD22yRxxtujljTGM7eEFcHUjoBL2/xW', 'Basil', 'Hickman', 23, 'Male', '1999-02-11', 'Ipsa suscipit quod asas', '20221201653076171-bleach-hollow-ichigo-ichigo-kurosaki-wallpaper-preview.jpeg', '2022-12-01 03:58:13', '2022-11-30 20:58:13', '2022-12-01 03:58:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
