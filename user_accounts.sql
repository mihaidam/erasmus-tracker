-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2017 at 10:42 AM
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
  `authors` varchar(100) DEFAULT NULL,
  `fav` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `authors`, `fav`) VALUES
(1, 'Rome, Metropolitan City of Rome, Italy', '<a href="dsdfsdf">sfddfsf</a>', 41.902782, 12.496366, 'v', 'ala@bala', NULL),
(2, 'Opelika, AL, United States', '<a href="dsdfsdf">sfddfsf</a>', 32.645412, -85.378281, 't', 'ala@bala', NULL),
(3, 'Beijing, China', '<a href="dsdfsdf">sfddfsf</a>', 39.904209, 116.407394, 'v', 'ala@bala', NULL),
(5, 'SÃ£o Paulo - State of SÃ£o Paulo, Brazil', '<a href="dsdfsdf">sfddfsf</a>', -23.550520, -46.633308, 'w', 'ala@bala', NULL),
(44, 'Beijing, China', '<a href="dsdfsdf">sfddfsf</a>', 39.904202, 116.407394, 'v', '123@456', 0),
(29, 'Dallas, TX, United States', '<a href="dsdfsdf">sfddfsf</a>', 32.776665, -96.796989, 'w', '123@123', NULL),
(45, 'Beijing, China', '<a href="dsdfsdf">sfddfsf</a>', 39.904202, 116.407394, 'v', '123@456', 1),
(41, 'London, United Kingdom', '<a href="dsdfsdf">sfddfsf</a>', 51.507351, -0.127758, 'w', '123@456', NULL),
(39, 'Dubai - United Arab Emirates', '<a href="dsdfsdf">sfddfsf</a>', 25.204849, 55.270782, 't', '123@456', NULL),
(27, 'Dubai - United Arab Emirates', '<a href="dsdfsdf">sfddfsf</a>', 25.204849, 55.270782, 't', '123@123', NULL),
(28, 'Beijing, China', '<a href="dsdfsdf">sfddfsf</a>', 39.904202, 116.407394, 'v', '123@123', NULL),
(32, 'Paris, France', '<a href="dsdfsdf">sfddfsf</a>', 48.856613, 2.352222, 'w', '123@123', NULL),
(38, 'Paris, France', '<a href="dsdfsdf">sfddfsf</a>', 48.856613, 2.352222, 'w', '123@456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `logged_in` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `hash`, `active`, `logged_in`) VALUES
(1, 'ala', 'bala', 'ala@bala', '$2y$10$Uei9KvG0d8.qjQTTMV449O.Gm53/C4FDF2NAF4ErOE5Jw4qfFV3DW', '091d584fced301b442654dd8c23b3fc9', 1, 0),
(2, '123', '456', '123@456', '$2y$10$hF49jSJVWhXTrcg1qaqYZup2BVV06wjnRyWTtFEi6r8nlZBlZZSXm', 'a1d0c6e83f027327d8461063f4ac58a6', 1, 0),
(7, '123', '132', '123@123', '$2y$10$f.cXwjnEl2xS9FdmEhZ/dOwTcQre0Lrwwr77HS4YGBOZOp.5EvGrW', 'c361bc7b2c033a83d663b8d9fb4be56e', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
