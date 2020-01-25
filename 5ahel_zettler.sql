-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2020 at 11:52 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `5ahel_zettler`
--

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE IF NOT EXISTS `collection` (
`collectionID` int(11) NOT NULL,
  `yearREF` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`collectionID`, `yearREF`, `title`) VALUES
(38, 35, 'School(HTL)'),
(39, 35, 'Summer'),
(40, 36, 'Etwas'),
(41, 34, 'Forest'),
(42, 34, 'HTL'),
(43, 34, 'Winter'),
(44, 35, 'Future Stuff'),
(45, 34, 'Phone'),
(46, 40, 'Bilder1'),
(47, 41, 'Cats');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
`pictureID` int(11) NOT NULL,
  `collectionREF` int(11) NOT NULL,
  `yearREF` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`pictureID`, `collectionREF`, `yearREF`, `title`, `path`) VALUES
(70, 41, 34, 'forest (1)', 'upload/forest (1).jfif'),
(71, 41, 34, 'forest (2)', 'upload/forest (2).jfif'),
(72, 41, 34, 'forest (3)', 'upload/forest (3).jfif'),
(73, 41, 34, 'forest (4)', 'upload/forest (4).jfif'),
(74, 41, 34, 'forest (5)', 'upload/forest (5).jfif'),
(75, 41, 34, 'forest (6)', 'upload/forest (6).jfif'),
(76, 41, 34, 'forest (7)', 'upload/forest (7).jfif'),
(77, 41, 34, 'forest (8)', 'upload/forest (8).jfif'),
(78, 41, 34, 'forest (9)', 'upload/forest (9).jfif'),
(79, 41, 34, 'forest (10)', 'upload/forest (10).jfif'),
(80, 41, 34, 'forest (11)', 'upload/forest (11).jfif'),
(81, 41, 34, 'forest (12)', 'upload/forest (12).jfif'),
(82, 41, 34, 'forest (13)', 'upload/forest (13).jfif'),
(83, 41, 34, 'forest (14)', 'upload/forest (14).jfif'),
(84, 44, 35, 'future (1)', 'upload/future (1).jfif'),
(85, 44, 35, 'future (1)', 'upload/future (1).jpeg'),
(86, 44, 35, 'future (1)', 'upload/future (1).jpg'),
(87, 44, 35, 'future (1)', 'upload/future (1).png'),
(88, 44, 35, 'future (1)', 'upload/future (1).webp'),
(89, 44, 35, 'future (2)', 'upload/future (2).jfif'),
(90, 44, 35, 'future (2)', 'upload/future (2).jpg'),
(91, 44, 35, 'future (2)', 'upload/future (2).png'),
(92, 44, 35, 'future (3)', 'upload/future (3).jfif'),
(93, 44, 35, 'future (3)', 'upload/future (3).jpg'),
(94, 44, 35, 'future (3)', 'upload/future (3).png'),
(95, 44, 35, 'future (4)', 'upload/future (4).jfif'),
(96, 44, 35, 'future (4)', 'upload/future (4).jpg'),
(97, 44, 35, 'future (5)', 'upload/future (5).jfif'),
(98, 44, 35, 'future (5)', 'upload/future (5).jpg'),
(99, 44, 35, 'future (6)', 'upload/future (6).jfif'),
(100, 44, 35, 'future (6)', 'upload/future (6).jpg'),
(101, 44, 35, 'future (7)', 'upload/future (7).jfif'),
(102, 44, 35, 'future (7)', 'upload/future (7).jpg'),
(103, 44, 35, 'future (8)', 'upload/future (8).jfif'),
(104, 44, 35, 'future (8)', 'upload/future (8).jpg'),
(105, 44, 35, 'future (9)', 'upload/future (9).jfif'),
(106, 44, 35, 'future (9)', 'upload/future (9).jpg'),
(107, 44, 35, 'future (10)', 'upload/future (10).jfif'),
(108, 44, 35, 'future (10)', 'upload/future (10).jpg'),
(109, 44, 35, 'future (11)', 'upload/future (11).jpg'),
(110, 42, 34, '3dscann', 'upload/3dscann.png'),
(111, 42, 34, '220px-Bessel_3rd-order_delay', 'upload/220px-Bessel_3rd-order_delay.svg.png'),
(112, 42, 34, 'advertising', 'upload/advertising.png'),
(113, 42, 34, 'DroidScan', 'upload/DroidScan.png'),
(114, 42, 34, 'DroidScanBase', 'upload/DroidScanBase.png'),
(115, 42, 34, 'scann_filterd', 'upload/scann_filterd.png'),
(116, 46, 40, 'solved', 'upload/solved.png'),
(117, 47, 41, 'scann_filterd_i', 'upload/scann_filterd_i.png'),
(118, 47, 41, 'scann_filterd_i', 'upload/scann_filterd_i.png');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
`yearID` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`yearID`, `date`) VALUES
(34, '2020-01-01'),
(35, '2021-01-01'),
(36, '2022-01-01'),
(37, '2023-01-01'),
(38, '2024-01-01'),
(39, '2025-01-01'),
(40, '2026-01-01'),
(41, '2027-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
 ADD PRIMARY KEY (`collectionID`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
 ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
 ADD PRIMARY KEY (`yearID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
MODIFY `collectionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
MODIFY `yearID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
