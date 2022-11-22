-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 01:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportradar`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` date NOT NULL,
  `title` varchar(200) NOT NULL,
  `_sport_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `start`, `end`, `title`, `_sport_type`) VALUES
(1, '2022-11-18 19:15:00', '2022-11-18', 'USA-FR', 1),
(2, '2022-11-19 19:15:00', '2022-11-19', 'FR-USA', 1),
(3, '2022-11-25 19:15:00', '2022-11-25', 'AUT-FR', 1),
(4, '2022-11-26 19:15:00', '2022-11-26', 'FR-AUT', 1),
(5, '2022-11-04 20:00:00', '2022-11-04', 'ESP-IT', 2),
(6, '2022-11-05 08:00:00', '2022-11-05', 'IT-ESP', 2),
(7, '2022-11-11 20:00:00', '2022-11-11', 'LUT-ESP', 2),
(8, '2022-11-12 13:12:00', '2022-11-12', 'ESP-LUT', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sport_teams`
--

CREATE TABLE `sport_teams` (
  `id` int(11) NOT NULL,
  `_sport_type_id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sport_teams`
--

INSERT INTO `sport_teams` (`id`, `_sport_type_id`, `Name`) VALUES
(1, 1, 'USA'),
(2, 1, 'FR'),
(3, 1, 'AUT'),
(4, 2, 'ESP'),
(5, 2, 'LUT'),
(6, 2, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `sport_type`
--

CREATE TABLE `sport_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sport_type`
--

INSERT INTO `sport_type` (`id`, `name`) VALUES
(1, 'Football'),
(2, 'Basketball');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sport_type` (`_sport_type`);

--
-- Indexes for table `sport_teams`
--
ALTER TABLE `sport_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `_sport_type_id` (`_sport_type_id`);

--
-- Indexes for table `sport_type`
--
ALTER TABLE `sport_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sport_teams`
--
ALTER TABLE `sport_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sport_type`
--
ALTER TABLE `sport_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`_sport_type`) REFERENCES `sport_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sport_teams`
--
ALTER TABLE `sport_teams`
  ADD CONSTRAINT `sport_teams_ibfk_1` FOREIGN KEY (`_sport_type_id`) REFERENCES `sport_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
