-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 11, 2023 at 11:06 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblpin`
--

CREATE TABLE `tblpin` (
  `id` int(11) NOT NULL,
  `pin` longtext NOT NULL,
  `keytext` longtext,
  `leftcount` int(255) DEFAULT '5',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpin`
--

INSERT INTO `tblpin` (`id`, `pin`, `keytext`, `leftcount`, `timestamp`) VALUES
(9, 'aaa492f6c59dca9e1aedff5c39fc29a288d05046', '2022398166791782552', 0, '2022-11-08 14:30:25'),
(10, '8c42969f0022a8e5d1582a9f5bec3032ad880b01', '2022427166791875315', 2, '2022-11-08 14:45:53'),
(11, '808239b5cad7ab5d1fe3586845161f91ec9c1a4e', '202201667998488155', 3, '2022-11-09 12:54:48'),
(12, 'e66ca11f0da7f2b2533c55c69a2034109dc75d48', '20232771672820784419', 8, '2023-01-04 08:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(10000) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `timestamp`) VALUES
(1, 'admin@admin.com', '64e1b8d34f425d19e1ee2ea7236d3028', '2022-11-08 11:51:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblpin`
--
ALTER TABLE `tblpin`
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
-- AUTO_INCREMENT for table `tblpin`
--
ALTER TABLE `tblpin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
