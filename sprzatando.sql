-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2017 at 08:07 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1-log
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sprzatando`
--

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `rooms` int(50) NOT NULL,
  `todos` int(50) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `datetime`, `phone`, `email`, `place`, `price`, `rooms`, `todos`, `user`) VALUES
(4, '2017-01-16 21:37:00', '123456789', 'f@email.com', 'ul. Testowa', 343, 1, 1, 'tojatos'),
(5, '2017-01-16 12:34:00', '2353', 'f@email.com', 'ul. Testowa', 343, 2, 2, 'tojatos'),
(6, '2017-01-16 12:34:00', '2353', 'f@email.com', 'ul. Testowa', 343, 3, 3, 'tojatos'),
(7, '2017-01-17 13:00:00', '2145', 'tojatos@interia.pl', 'twitch chat', 0, 4, 4, 'tojatos'),
(8, '2017-01-17 13:00:00', '2145', 'tojatos@interia.pl', 'twitch chat', 0, 5, 5, 'tojatos'),
(9, '2017-01-17 13:00:00', '2145', 'tojatos@interia.pl', 'twitch chat', 0, 6, 6, 'tojatos');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(50) NOT NULL,
  `bathroom` tinyint(1) NOT NULL DEFAULT '0',
  `kitchen` tinyint(1) NOT NULL DEFAULT '0',
  `living_room` tinyint(1) NOT NULL DEFAULT '0',
  `bedroom` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `bathroom`, `kitchen`, `living_room`, `bedroom`) VALUES
(1, 1, 1, 0, 0),
(2, 0, 0, 0, 0),
(3, 0, 0, 0, 0),
(4, 1, 1, 1, 1),
(5, 0, 0, 0, 0),
(6, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(50) NOT NULL,
  `clean_car` tinyint(1) NOT NULL DEFAULT '0',
  `clean_windows` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `clean_car`, `clean_windows`) VALUES
(1, 1, 0),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `blocked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `e-mail`, `type`, `verified`, `blocked`) VALUES
(7, 'tojatos', '655faa8ba799a3a1ae309c2b40d142fc', 'tojatos@gmail.com', 'standard', 1, 0),
(8, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'standard', 0, 0),
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', 'administrator', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
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
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
