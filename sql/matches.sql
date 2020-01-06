-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 05:41 PM
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
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `pid_matches` int(11) NOT NULL,
  `matchdate` datetime NOT NULL DEFAULT '2018-04-07 20:00:00',
  `fid_team1` varchar(60) DEFAULT NULL,
  `fid_team2` varchar(60) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `result` varchar(60) NOT NULL DEFAULT 'not yet played',
  `group_stage` varchar(2) DEFAULT NULL,
  `winner` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`pid_matches`, `matchdate`, `fid_team1`, `fid_team2`, `status`, `result`, `group_stage`, `winner`) VALUES
(1, '2020-02-06 17:00:00', 'Avengers', 'Shaolin Monks', 0, 'not yet played', 'A', ''),
(2, '2020-02-06 18:30:00', 'Ninjas', 'Samurai', 0, 'not yet played', 'B', ''),
(3, '2020-02-06 20:00:00', 'Scorpions', 'Immortals', 0, 'not yet played', 'A', ''),
(4, '2020-02-06 21:30:00', 'Spartans', 'Herculeans', 0, 'not yet played', 'B', ''),
(5, '2020-02-07 17:30:00', 'Shaolin Monks', 'Immortals', 0, 'not yet played', 'A', ''),
(6, '2020-02-07 18:30:00', 'Herculeans', 'Ninjas', 0, 'not yet played', 'B', ''),
(7, '2020-02-07 20:00:00', 'Avengers', 'Scorpions', 0, 'not yet played', 'A', ''),
(8, '2020-02-07 21:30:00', 'Samurai', 'Spartans', 0, 'not yet played', 'B', ''),
(9, '2020-02-08 17:00:00', 'Avengers', 'Immortals', 0, 'not yet played', 'A', ''),
(10, '2020-02-08 18:30:00', 'Samurai', 'Herculeans', 0, 'not yet played', 'B', ''),
(11, '2020-02-08 20:00:00', 'Shaolin Monks', 'Scorpions', 0, 'not yet played', 'A', ''),
(12, '2020-02-08 21:30:00', 'Spartans', 'Ninjas', 0, 'not yet played', 'B', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`pid_matches`),
  ADD KEY `FOREIGN1` (`fid_team1`),
  ADD KEY `FOREIGN2` (`fid_team2`),
  ADD KEY `idx_matchdate` (`matchdate`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
