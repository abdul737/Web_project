-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2017 at 11:26 AM
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
CREATE DATABASE IF NOT EXISTS `codecraft_moodle` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `codecraft_moodle`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`) VALUES
(6);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `assignment`;
CREATE TABLE IF NOT EXISTS `assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `attachementID` int(11) NOT NULL,
  `solutionID` int(11) NOT NULL,
  `startingTime` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `maxPoint` float NOT NULL,
  `bonusPoint` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendingstudent`
--
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `attendingstudent`;
CREATE TABLE IF NOT EXISTS `attendingstudent` (
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
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `badge`;
CREATE TABLE IF NOT EXISTS `badge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `studentID` int(11) NOT NULL,
  `iconID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--
-- Creation: May 08, 2017 at 08:01 PM
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `length` int(11) NOT NULL,
  `ageLimit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `length`, `ageLimit`) VALUES
(1, 'Scratch - Basic', 12, NULL),
(2, 'Scratch - Advanced', 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courseassignment`
--
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `courseassignment`;
CREATE TABLE IF NOT EXISTS `courseassignment` (
  `courseID` int(11) NOT NULL,
  `assignmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `currentgroups`
--
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `currentgroups`;
CREATE TABLE IF NOT EXISTS `currentgroups` (
  `instructorID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `assistant` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `studentID` int(11) NOT NULL,
  `parentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`studentID`, `parentID`) VALUES
(3, 1),
(8, 7),
(12, 7),
(14, 7),
(15, 7),
(16, 7),
(18, 17),
(19, 1),
(20, 7),
(21, 7),
(22, 7),
(23, 7),
(24, 7),
(25, 7),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` blob NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseID` int(11) NOT NULL,
  `venue` int(11) NOT NULL,
  `startingTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `groupassignment`;
CREATE TABLE IF NOT EXISTS `groupassignment` (
  `groupID` int(11) NOT NULL,
  `assignmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `instructor`;
CREATE TABLE IF NOT EXISTS `instructor` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`) VALUES
(1),
(2),
(7),
(13),
(17);

-- --------------------------------------------------------

--
-- Table structure for table `passport`
--
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `passport`;
CREATE TABLE IF NOT EXISTS `passport` (
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
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL,
  `totalPoints` float NOT NULL DEFAULT '0',
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `totalPoints`, `birthdate`) VALUES
(3, 0, '2017-05-01'),
(10, 0, '0001-12-12'),
(11, 0, '2012-12-14'),
(12, 0, '1111-11-11'),
(14, 0, '2009-12-01'),
(15, 0, '2011-02-04'),
(16, 0, '2000-12-01'),
(18, 0, '1996-06-18'),
(19, 0, '0000-00-00'),
(20, 0, '0000-00-00'),
(21, 0, '1998-08-23'),
(22, 0, '1996-08-14'),
(23, 0, '1996-08-14'),
(24, 0, '1996-08-14'),
(25, 0, '1996-08-14'),
(26, 0, '1996-08-14'),
(27, 0, '1996-12-14'),
(28, 0, '0014-12-14'),
(29, 0, '0014-12-14'),
(30, 0, '0012-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `studentbadge`
--
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `studentbadge`;
CREATE TABLE IF NOT EXISTS `studentbadge` (
  `studentID` int(11) NOT NULL,
  `badgeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subittedassignment`
--
-- Creation: May 08, 2017 at 07:52 AM
--

DROP TABLE IF EXISTS `subittedassignment`;
CREATE TABLE IF NOT EXISTS `subittedassignment` (
  `assignmentID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `fileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: May 08, 2017 at 08:05 PM
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` char(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `position` varchar(1) NOT NULL,
  `photoFieldId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `name`, `surname`, `phoneNumber`, `position`, `photoFieldId`) VALUES
(1, 'asdasd', 'madina121393@mail.ru', 'Madina', 'Saidova', '+998909110044', 'p', 0),
(3, 'child_password', 'child_email', 'child_name', 'child_surname', 'child_phoneNumber', 's', 0),
(4, 'asdasd', 'madina121393@mail.ru', 'Madina', 'Saidova', '+998909110044', 'p', 0),
(5, 'asdasd', 'madina121393@mail.ru', 'Madina', 'Saidova', '+998909110044', 'p', 0),
(6, 'asdasd', 'abdulbosid.kh@gmail.com', 'Abdulbosid', 'Khamidov', '+998909110044', 'a', 0),
(7, 'asd', 'abdul6180155@gmail.com', 'Abdulbosid', 'Khamidov', '+998909110044', 'p', NULL),
(8, '2015-12-15', 'abdulbosid.kh@gmail.com', 'Cool', 'boy', '+998909110044', 's', NULL),
(9, '0001-12-12', 'abdulbosid.kh@gmail.com', 'asd', 'asd', '+998909110044', 's', NULL),
(10, '0001-12-12', 'abdulbosid.kh@gmail.com', 'asd', 'asd', '+998909110044', 's', NULL),
(11, '2012-12-14', 'abdulbosid.kh@gmail.com', 'Some', 'Other', '+998909110044', 's', NULL),
(12, '1111-11-11', 'abdulbosid.kh@gmail.com', 'asd', 'sd', '+998909110044', 's', NULL),
(13, 'asdasd', 'mu_slim@gmail.com', 'Muslimbek', 'Abduganiyev', '+998909110044', 'p', NULL),
(14, '2009-12-01', 'abdulbosid.kh@gmail.com', 'Salokhiddin', 'Khamidov', '+998909110044', 's', NULL),
(15, '2011-02-04', 'abdulbosid.kh@gmail.com', 'Mukhammadsodiq', 'Khamidov', '+998909110044', 's', NULL),
(16, '2000-12-01', 'abdulbosid.kh@gmail.com', 'Abdulbois', 'Husanov', '+998909110044', 's', NULL),
(17, '1317777', 'darhon@gmail.com', 'Darkhonbek', 'Mamataliev', '+998971317777', 'p', NULL),
(18, '1996-06-18', 'darhon@gmail.com', 'Muslimbek', 'Abduganiyev', '+998971317777', 's', NULL),
(19, '', 'madina121393@mail.ru', '', '', '+998909110044', 's', NULL),
(20, '', 'abdul6180155@gmail.com', 'Abduvohid', 'Khamidov', '+998909110044', 's', NULL),
(21, '1998-08-23', 'abdul6180155@gmail.com', 'Madina', 'Khamidova', '+998909110044', 's', NULL),
(22, '1996-08-14', 'abdul6180155@gmail.com', 'Abdulbosid', 'Khamidov', '+998909110044', 's', NULL),
(23, '1996-08-14', 'abdul6180155@gmail.com', 'Abdulbosid', 'Khamidov', '+998909110044', 's', NULL),
(24, '1996-08-14', 'abdul6180155@gmail.com', 'Abdulbosid', 'Khamidov', '+998909110044', 's', NULL),
(25, '1996-08-14', 'abdul6180155@gmail.com', 'Abdulbosid', 'Khamidov', '+998909110044', 's', NULL),
(26, '1996-08-14', 'madina121393@mail.ru', 'Abdulbosid', 'Khamidov', '+998909110044', 's', NULL),
(27, '1996-12-14', 'madina121393@mail.ru', 'Abduvohid', 'Abduganiyev', '+998909110044', 's', NULL),
(28, '0014-12-14', 'madina121393@mail.ru', 'ads', 'asd', '+998909110044', 's', NULL),
(29, '0014-12-14', 'madina121393@mail.ru', 'ads', 'asd', '+998909110044', 's', NULL),
(30, '0012-12-12', 'madina121393@mail.ru', 'asd', 'asd', '+998909110044', 's', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `waitlist`
--
-- Creation: May 08, 2017 at 08:07 PM
--

DROP TABLE IF EXISTS `waitlist`;
CREATE TABLE IF NOT EXISTS `waitlist` (
  `waitlistId` int(11) NOT NULL AUTO_INCREMENT,
  `parentID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `days` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`waitlistId`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `waitlist`
--

INSERT INTO `waitlist` (`waitlistId`, `parentID`, `courseID`, `studentID`, `days`, `create_time`, `confirmed`) VALUES
(1, 1, 1, 3, 'Doesn\'t matter', '2017-05-08 20:06:11', 0),
(3, 1, 1, 3, 'Doesn\'t matter', '2017-05-08 20:06:11', 0),
(4, 1, 2, 3, 'Doesn\'t matter', '2017-05-08 20:06:11', 0),
(5, 1, 2, 3, 'Doesn\'t matter', '2017-05-08 20:06:11', 0),
(6, 1, 1, 3, 'Monday/Wednesday/Friday', '2017-05-08 20:06:11', 0),
(7, 7, 1, 12, 'Monday/Wednesday/Friday', '2017-05-09 08:24:18', 0),
(8, 1, 1, 3, 'Monday/Wednesday/Friday', '2017-05-09 08:51:25', 0),
(9, 7, 1, 14, 'Monday/Wednesday/Friday', '2017-05-09 12:22:37', 0),
(10, 7, 1, 15, 'Tuesday/Thursday/Saturday', '2017-05-09 12:24:09', 0),
(11, 7, 2, 16, 'Tuesday/Thursday/Saturday', '2017-05-09 12:26:16', 0),
(12, 7, 2, 12, 'Monday/Wednesday/Friday', '2017-05-09 13:41:42', 0),
(13, 17, 1, 18, 'Monday/Wednesday/Friday', '2017-05-09 15:48:58', 0),
(14, 1, 1, 3, 'Monday/Wednesday/Friday', '2017-05-27 17:46:07', 0),
(15, 1, 1, 19, 'Tuesday/Thursday/Saturday', '2017-05-27 17:46:18', 0),
(16, 1, 1, 3, 'Doesn\'t matter', '2017-05-27 17:57:58', 0),
(17, 1, 1, 3, 'Doesn\'t matter', '2017-05-27 18:01:39', 0),
(18, 7, 2, 20, 'Monday/Wednesday/Friday', '2017-05-28 07:13:50', 0),
(19, 7, 2, 21, 'Monday/Wednesday/Friday', '2017-05-28 07:45:14', 0),
(20, 7, 2, 14, 'Monday/Wednesday/Friday', '2017-06-09 18:16:21', 0),
(21, 7, 2, 24, 'Doesn\'t matter', '2017-06-09 18:16:48', 0),
(22, 7, 1, 15, 'Doesn\'t matter', '2017-06-10 07:12:26', 0),
(23, 1, 1, 26, 'Monday/Wednesday/Friday', '2017-06-11 09:11:38', 0),
(24, 1, 1, 26, 'Monday/Wednesday/Friday', '2017-06-11 09:14:52', 0),
(25, 1, 1, 26, 'Tuesday/Thursday/Saturday', '2017-06-13 12:54:21', 0),
(26, 1, 1, 26, 'Tuesday/Thursday/Saturday', '2017-06-13 13:00:42', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
