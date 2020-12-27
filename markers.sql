-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 09:25 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  `authors` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `authors`) VALUES
(14, 'Rio de Janeiro - State of Rio de Janeiro, Brazil', '', -22.906847, -43.172897, 'w', ''),
(25, 'Beijing, China', '', 39.904209, 116.407394, 'v', ''),
(12, 'Delhi, India', '', 28.704060, 77.102493, 'w', ''),
(10, 'Paris, France', '', 48.856613, 2.352222, 'w', ''),
(9, 'Dubai - United Arab Emirates', '', 25.204849, 55.270782, 't', ''),
(15, 'Lyon, France', '', 45.764042, 4.835659, 'w', ''),
(16, 'Bucharest, Romania', '', 44.426765, 26.102537, 'v', ''),
(19, 'Cape Town, Western Cape, South Africa', '', -33.924870, 18.424055, 'w', ''),
(20, 'Nairobi, Nairobi County, Kenya', '', -1.292066, 36.821945, 'v', ''),
(22, 'Addis Ababa, Ethiopia', '', 8.980603, 38.757759, 'w', ''),
(23, 'San Francisco, CA, United States', '', 37.774929, -122.419418, 'w', ''),
(26, 'Shanghai, China', '', 31.230415, 121.473701, 'v', ''),
(28, 'Xi\'an, Shaanxi, China', '', 34.341576, 108.939774, 'w', ''),
(29, 'Moscow, Russia', '', 55.755825, 37.617298, 'w', ''),
(30, 'Sibiu, Romania', '', 45.798328, 24.125584, 'v', ''),
(33, 'Munich, Germany', '', 48.135124, 11.581981, 't', ''),
(37, 'Fort Worth, TX, United States', '<a href="dsdfsdf">sfddfsf</a>', 32.755489, -97.330765, 'w', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
