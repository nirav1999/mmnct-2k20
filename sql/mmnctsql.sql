-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 02:50 PM
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
-- Table structure for table `leaguetable`
--

CREATE TABLE `leaguetable` (
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
-- Dumping data for table `leaguetable`
--

INSERT INTO `leaguetable` (`id`, `name`, `matches_played`, `win`, `loss`, `draw`, `points`, `team_id`) VALUES
(1, 'Avengers', 3, 1, 2, 0, 3, 1),
(2, 'Shaolin Monks', 3, 3, 0, 0, 9, 2),
(3, 'Scorpions', 3, 2, 1, 0, 6, 3),
(4, 'Immortals', 3, 0, 3, 0, 0, 4);

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
(5, 'Samurai', 3, 2, 1, 0, 6, 5),
(6, 'Spartans', 3, 1, 1, 1, 4, 6),
(7, 'Herculeans', 3, 0, 2, 1, 1, 7),
(8, 'Ninjas', 3, 2, 1, 0, 6, 8);

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
(1, '2020-02-06 17:00:00', 'Avengers', 'Shaolin Monks', 1, '100/5-102/0', 'A', '2'),
(2, '2020-02-06 18:30:00', 'Ninjas', 'Samurai', 1, '78/10-89/2', 'B', '5'),
(3, '2020-02-06 20:00:00', 'Scorpions', 'Immortals', 1, '100/10-98/8', 'A', '3'),
(4, '2020-02-06 21:30:00', 'Spartans', 'Herculeans', 1, '90/6-90/8', 'B', 'draw'),
(5, '2020-02-07 17:30:00', 'Shaolin Monks', 'Immortals', 1, '100/5-80/10', 'A', '2'),
(6, '2020-02-07 18:30:00', 'Herculeans', 'Ninjas', 1, '93/10-96/0', 'B', '8'),
(7, '2020-02-07 20:00:00', 'Avengers', 'Scorpions', 1, '49/10-52/0', 'A', '3'),
(8, '2020-02-07 21:30:00', 'Samurai', 'Spartans', 1, '101/3-104/6', 'B', '6'),
(9, '2020-02-08 17:00:00', 'Avengers', 'Immortals', 1, '100/10-99/1', 'A', '1'),
(10, '2020-02-08 18:30:00', 'Samurai', 'Herculeans', 1, '100/0-99/0', 'B', '5'),
(11, '2020-02-08 20:00:00', 'Shaolin Monks', 'Scorpions', 1, '100/0-99/0', 'A', '2'),
(12, '2020-02-08 21:30:00', 'Spartans', 'Ninjas', 1, '100/0-102/0', 'B', '8'),
(13, '2020-02-09 20:00:00', 'Shaolin Monks', 'Samurai', 1, '100/2-98/0', 'FL', '2');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id_player` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `fid_team` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id_player`, `name`, `fid_team`, `type`) VALUES
(101, 'rohit', 1, 2),
(102, 'meet', 1, 1),
(103, 'aamir', 1, 1),
(104, 'bipin', 1, 2),
(105, 'chetan', 1, 1),
(106, 'dhruv', 1, 1),
(107, 'fenil', 1, 3),
(108, 'het', 1, 3),
(109, 'ishan', 1, 3),
(110, 'jack', 1, 3),
(111, 'kanak', 1, 3),
(201, 'harsh', 2, 1),
(202, 'yash', 2, 1),
(203, 'tanish', 2, 1),
(204, 'viraj', 2, 2),
(205, 'hiren', 2, 2),
(206, 'lalit', 2, 2),
(207, 'raj', 2, 3),
(208, 'gigen', 2, 3),
(209, 'minal', 2, 3),
(210, 'neel', 2, 3),
(211, 'omkar', 2, 3),
(301, 'parth', 3, 1),
(302, 'raman', 3, 1),
(303, 'manan', 3, 1),
(304, 'aaryan', 3, 1),
(305, 'nitik', 3, 1),
(306, 'jatin', 3, 2),
(307, 'yusuf', 3, 2),
(308, 'febin', 3, 3),
(309, 'bakul', 3, 3),
(310, 'suraj', 3, 3),
(311, 'rahul', 3, 3),
(401, 'akash', 4, 2),
(402, 'xan', 4, 1),
(403, 'yatin', 4, 1),
(404, 'shiv', 4, 2),
(405, 'arjun', 4, 1),
(406, 'chhetri', 4, 1),
(407, 'layan', 4, 3),
(408, 'punit', 4, 3),
(409, 'amar', 4, 3),
(410, 'marin', 4, 3),
(411, 'niral', 4, 3),
(501, 'jay', 5, 1),
(502, 'akshay', 5, 1),
(503, 'preet', 5, 2),
(504, 'chirag', 5, 1),
(505, 'raag', 5, 1),
(506, 'akbar', 5, 2),
(507, 'jigen', 5, 2),
(508, 'samson', 5, 3),
(509, 'rahane', 5, 3),
(510, 'tambe', 5, 3),
(511, 'ashwin', 5, 3),
(601, 'viren', 6, 1),
(602, 'raja', 6, 1),
(603, 'drashtant', 6, 1),
(604, 'vraj', 6, 1),
(605, 'jash', 6, 2),
(606, 'nikung', 6, 2),
(607, 'manav', 6, 2),
(608, 'kush', 6, 3),
(609, 'krishna', 6, 3),
(610, 'pranil', 6, 3),
(611, 'kevin', 6, 3),
(701, 'dev', 7, 1),
(702, 'mokshit', 7, 2),
(703, 'harshit', 7, 2),
(704, 'mitesh', 7, 2),
(705, 'krish', 7, 1),
(706, 'raj', 7, 1),
(707, 'shiv', 7, 3),
(708, 'om', 7, 3),
(709, 'rushab', 7, 3),
(710, 'devang', 7, 3),
(711, 'prince', 7, 3),
(801, 'swarag', 8, 1),
(802, 'mukul', 8, 1),
(803, 'vinit', 8, 1),
(804, 'deep', 8, 1),
(805, 'vasu', 8, 1),
(806, 'bhavank', 8, 2),
(807, 'akshar', 8, 2),
(808, 'bakshi', 8, 3),
(809, 'kunal', 8, 3),
(810, 'miraj', 8, 3),
(811, 'khalil', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `pid_teams` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `captain` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`pid_teams`, `name`, `captain`) VALUES
(1, 'Avengers', 'Rohit '),
(2, 'Shaolin Monks', 'harsh'),
(3, 'Scorpions', 'parth'),
(4, 'Immortals', 'akash'),
(5, 'Samurai', 'jay'),
(6, 'Spartans', 'viren'),
(7, 'Herculeans', 'jamie'),
(8, 'Ninjas', 'kartik');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(60) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `name`, `email`) VALUES
('pratik', 'pratik', 'Pratik Prabhu', 'pratikprabhu@gmail.com'),
('jayant', 'jayant', 'Jayant Rane', 'jayantrane@gmail.com'),
('siddhesh', 'siddhesh', 'Siddhesh Patel', 'siddheshpatel@gmail.com'),
('onkar', 'onkar', 'Onkar Bangar', 'onkarbangar@gmail.com'),
('nirav', 'nirav@1908', 'nirav', 'nivchauhan99@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaguetable`
--
ALTER TABLE `leaguetable`
  ADD PRIMARY KEY (`team_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `leaguetable2`
--
ALTER TABLE `leaguetable2`
  ADD PRIMARY KEY (`team_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`pid_matches`),
  ADD KEY `FOREIGN1` (`fid_team1`),
  ADD KEY `FOREIGN2` (`fid_team2`),
  ADD KEY `idx_matchdate` (`matchdate`) USING BTREE;

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id_player`,`name`),
  ADD KEY `fid_team` (`fid_team`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`pid_teams`),
  ADD UNIQUE KEY `uni_name` (`name`) USING BTREE,
  ADD UNIQUE KEY `captain` (`captain`),
  ADD KEY `idx_pid` (`pid_teams`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leaguetable`
--
ALTER TABLE `leaguetable`
  ADD CONSTRAINT `leaguetable_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`pid_teams`),
  ADD CONSTRAINT `leaguetable_ibfk_2` FOREIGN KEY (`name`) REFERENCES `teams` (`name`);

--
-- Constraints for table `leaguetable2`
--
ALTER TABLE `leaguetable2`
  ADD CONSTRAINT `leaguetable2_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`pid_teams`),
  ADD CONSTRAINT `leaguetable2_ibfk_2` FOREIGN KEY (`name`) REFERENCES `teams` (`name`);

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`fid_team1`) REFERENCES `teams` (`name`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`fid_team2`) REFERENCES `teams` (`name`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`fid_team`) REFERENCES `teams` (`pid_teams`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
