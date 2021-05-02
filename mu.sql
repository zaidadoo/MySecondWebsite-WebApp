-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 09:59 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mu`
--

-- --------------------------------------------------------

--
-- Table structure for table `cw`
--

CREATE TABLE `cw` (
  `id` int(16) NOT NULL,
  `question` varchar(256) NOT NULL,
  `a` varchar(256) NOT NULL,
  `correct` varchar(256) NOT NULL,
  `incorrect` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cw`
--

INSERT INTO `cw` (`id`, `question`, `a`, `correct`, `incorrect`) VALUES
(5, 'What is the square root of 169?', '13', '', ''),
(6, 'How many countries border with Egypt?', '4', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hw`
--

CREATE TABLE `hw` (
  `id` int(16) NOT NULL,
  `question` varchar(256) NOT NULL,
  `a_1` varchar(256) NOT NULL,
  `a_2` varchar(256) NOT NULL,
  `a_3` varchar(256) NOT NULL,
  `a_a` varchar(256) NOT NULL,
  `correct` varchar(256) NOT NULL,
  `incorrect` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hw`
--

INSERT INTO `hw` (`id`, `question`, `a_1`, `a_2`, `a_3`, `a_a`, `correct`, `incorrect`) VALUES
(7, 'What is the square root of 169?', '12', '31', '13', '13', '', ''),
(8, 'How many countries border with Egypt?', '4', '3', '2', '4', '', ''),
(9, 'test', 'test', 'test', 'test', 'test', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `practice`
--

CREATE TABLE `practice` (
  `id` int(16) NOT NULL,
  `cat` varchar(256) NOT NULL,
  `question` varchar(256) NOT NULL,
  `a1` varchar(256) NOT NULL,
  `a2` varchar(256) NOT NULL,
  `a3` varchar(256) NOT NULL,
  `aa` varchar(256) NOT NULL,
  `correct` varchar(256) NOT NULL,
  `incorrect` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practice`
--

INSERT INTO `practice` (`id`, `cat`, `question`, `a1`, `a2`, `a3`, `aa`, `correct`, `incorrect`) VALUES
(1, 'open-minded', 'What monarch is the main character in the TV series THE TUDORS?', 'Henry VIII', 'Henry VX', 'Henry VII', 'Henry VIII', '', 'student1<br>'),
(2, 'reflective', 'What Olympic medal does not exist?', 'Copper medal', 'Gold medal', 'Bronze medal', 'Copper medal', 'student1<br>', ''),
(3, 'knowledgeable', 'How many players per team are there in court in handball?', '7', '4', '6', '7', 'student1<br>', ''),
(4, 'knowledgeable', 'In racewalking, athletesâ€™', 'walk', 'run', 'jog', 'walk', 'student1<br>', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(16) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `score` int(16) NOT NULL DEFAULT '0',
  `hw` varchar(3) NOT NULL DEFAULT 'no',
  `cw` int(3) NOT NULL DEFAULT '0',
  `class` varchar(256) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `mistake` int(16) NOT NULL,
  `thinker` int(16) NOT NULL,
  `knowledgeable` int(16) NOT NULL,
  `inquirer` int(16) NOT NULL,
  `open-minded` int(16) NOT NULL,
  `reflective` int(16) NOT NULL,
  `communicator` int(16) NOT NULL,
  `caring` int(16) NOT NULL,
  `principled` int(16) NOT NULL,
  `balanced` int(16) NOT NULL,
  `risk-taker` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `score`, `hw`, `cw`, `class`, `admin`, `mistake`, `thinker`, `knowledgeable`, `inquirer`, `open-minded`, `reflective`, `communicator`, `caring`, `principled`, `balanced`, `risk-taker`) VALUES
(4, 'musbah', '$2y$10$I9NTzbHTnRoEWpPH7keQ4uJRaYKAFSHxDn4HFr4/2HvOKbSwOlliy', 'musbah', 'example@gmail.com', 10, 'no', 0, 'none', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 'student1', '$2y$10$2skJcAgynnAfdLDZpTfiWuToV0BieBKAf/K4BlBYb/vyTw6UMEXrO', 'student1', 'student1@gmail.com', 37, 'yes', 0, '1F', 0, 1, 0, 4, 0, 0, 2, 0, 0, 0, 0, 0),
(32, 'student2', '$2y$10$zLyz9yAo5paGIOFNVhyWGOv5OPaG08xJG5XIrwMr4GKP8m9POUH6W', 'student2', 'student2@student2.com', 31, 'no', 0, '2C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 'student3', '$2y$10$dT2V6XcZtmTd/2OAij0t9.VljSXET5S7UKgVlk1tRY9bG1lljyxzW', 'student3', 'student3@gmail.com', 54, 'no', 0, '1D', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 'student4', '$2y$10$1EdCnp2N2smU9s7zdHz5ze3Iwznkhy./hDI0E3Z1A/ZDhglA.vtmO', 'student4', 'student4@gmail.com', 13, 'no', 0, '2A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 'student5', '$2y$10$C10NjCYfOIj2XJcgDGbgsO0gwC1AlHZZQI51QNr9l2MBzFha30zJm', 'student5', 'student5@gmail.com', 0, 'no', 0, '1F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 'student', '$2y$10$tIljxSDl9aalrapulwLXYeETRP69A8iUtGl2dSF1XVvX6yzyeQz5m', 'student', 'student@gmail.com', 0, 'no', 0, '1E', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cw`
--
ALTER TABLE `cw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hw`
--
ALTER TABLE `hw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practice`
--
ALTER TABLE `practice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cw`
--
ALTER TABLE `cw`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hw`
--
ALTER TABLE `hw`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `practice`
--
ALTER TABLE `practice`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
