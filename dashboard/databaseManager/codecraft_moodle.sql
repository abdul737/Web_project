-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2017 at 10:05 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codecraft_moodle`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `attachementID` int(11) NOT NULL,
  `solutionID` int(11) NOT NULL,
  `startingTime` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `maxPoint` float NOT NULL,
  `bonusPoint` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendingstudent`
--

CREATE TABLE `attendingstudent` (
  `studentID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `localPoints` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendingstudent`
--

INSERT INTO `attendingstudent` (`studentID`, `groupID`, `localPoints`) VALUES
(3, 2, 0),
(3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `badge`
--

CREATE TABLE `badge` (
  `id` int(11) NOT NULL,
  `info` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `studentID` int(11) NOT NULL,
  `iconID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `length` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `length`) VALUES
(1, 'Scratch - Basic', 12),
(2, 'Scratch - Advanced', 12);

-- --------------------------------------------------------

--
-- Table structure for table `courseassignment`
--

CREATE TABLE `courseassignment` (
  `courseID` int(11) NOT NULL,
  `assignmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `currentgroups`
--

CREATE TABLE `currentgroups` (
  `instructorID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `assistant` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `studentID` int(11) NOT NULL,
  `parentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`studentID`, `parentID`) VALUES
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `file` blob NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `venue` int(11) NOT NULL,
  `startingTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `courseID`, `venue`, `startingTime`) VALUES
(2, 1, 101, '2017-05-06 00:00:00'),
(3, 2, 101, '2017-05-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `groupassignment`
--

CREATE TABLE `groupassignment` (
  `groupID` int(11) NOT NULL,
  `assignmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `passport`
--

CREATE TABLE `passport` (
  `fileID` int(11) NOT NULL,
  `parentID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `familyName` varchar(255) NOT NULL,
  `passportSerial` varchar(255) NOT NULL,
  `expiryDate` date NOT NULL,
  `issueDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `totalPoints` float NOT NULL DEFAULT '0',
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `totalPoints`, `birthdate`) VALUES
(3, 0, '2017-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `studentbadge`
--

CREATE TABLE `studentbadge` (
  `studentID` int(11) NOT NULL,
  `badgeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subittedassignment`
--

CREATE TABLE `subittedassignment` (
  `assignmentID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `fileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` char(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `position` varchar(1) NOT NULL,
  `photoFieldId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `name`, `surname`, `phoneNumber`, `position`, `photoFieldId`) VALUES
(1, 'asdasd', 'madina121393@mail.ru', 'Madina', 'Saidova', 'my_number', 'p', 0),
(3, 'child_password', 'child_email', 'child_name', 'child_surname', 'child_phoneNumber', 's', 0);

-- --------------------------------------------------------

--
-- Table structure for table `waitlist`
--

CREATE TABLE `waitlist` (
  `parentID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `days` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badge`
--
ALTER TABLE `badge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`parentID`),
  ADD UNIQUE KEY `parentID` (`parentID`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
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
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `badge`
--
ALTER TABLE `badge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
