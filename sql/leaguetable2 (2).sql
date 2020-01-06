-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 08:41 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmnctsql`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaguetable2`
--

CREATE TABLE `leaguetable2` (
  `id` int(2) NOT NULL,
  `name` varchar(60) NOT NULL,
  `matches_played` int(2) NOT NULL DEFAULT '0',
  `win` int(2) NOT NULL DEFAULT '0',
  `loss` int(2) NOT NULL DEFAULT '0',
  `draw` int(2) NOT NULL DEFAULT '0',
  `points` int(2) NOT NULL DEFAULT '0',
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaguetable2`
--

INSERT INTO `leaguetable2` (`id`, `name`, `matches_played`, `win`, `loss`, `draw`, `points`, `team_id`) VALUES
(5, 'Samurai', 2, 1, 1, 0, 3, 5),
(6, 'Spartans', 2, 1, 0, 1, 4, 6),
(7, 'Herculeans', 2, 0, 1, 1, 1, 7),
(8, 'Ninjas', 2, 1, 1, 0, 3, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaguetable2`
--
ALTER TABLE `leaguetable2`
  ADD PRIMARY KEY (`team_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leaguetable2`
--
ALTER TABLE `leaguetable2`
  ADD CONSTRAINT `leaguetable2_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`pid_teams`),
  ADD CONSTRAINT `leaguetable2_ibfk_2` FOREIGN KEY (`name`) REFERENCES `teams` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
