-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2017 at 10:55 AM
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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `admin`
--

TRUNCATE TABLE `admin`;
--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`) VALUES
(6);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
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

--
-- Truncate table before insert `assignment`
--

TRUNCATE TABLE `assignment`;
-- --------------------------------------------------------

--
-- Table structure for table `attendingstudent`
--

DROP TABLE IF EXISTS `attendingstudent`;
CREATE TABLE IF NOT EXISTS `attendingstudent` (
  `studentID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `localPoints` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `attendingstudent`
--

TRUNCATE TABLE `attendingstudent`;
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

DROP TABLE IF EXISTS `badge`;
CREATE TABLE IF NOT EXISTS `badge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `studentID` int(11) NOT NULL,
  `iconID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `badge`
--

TRUNCATE TABLE `badge`;
-- --------------------------------------------------------

--
-- Table structure for table `course`
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
-- Truncate table before insert `course`
--

TRUNCATE TABLE `course`;
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

DROP TABLE IF EXISTS `courseassignment`;
CREATE TABLE IF NOT EXISTS `courseassignment` (
  `courseID` int(11) NOT NULL,
  `assignmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `courseassignment`
--

TRUNCATE TABLE `courseassignment`;
-- --------------------------------------------------------

--
-- Table structure for table `currentgroups`
--

DROP TABLE IF EXISTS `currentgroups`;
CREATE TABLE IF NOT EXISTS `currentgroups` (
  `instructorID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `assistant` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `currentgroups`
--

TRUNCATE TABLE `currentgroups`;
-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `studentID` int(11) NOT NULL,
  `parentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `customer`
--

TRUNCATE TABLE `customer`;
--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`studentID`, `parentID`) VALUES
(3, 1),
(8, 7),
(12, 7);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` blob NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `file`
--

TRUNCATE TABLE `file`;
-- --------------------------------------------------------

--
-- Table structure for table `group`
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
-- Truncate table before insert `group`
--

TRUNCATE TABLE `group`;
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

DROP TABLE IF EXISTS `groupassignment`;
CREATE TABLE IF NOT EXISTS `groupassignment` (
  `groupID` int(11) NOT NULL,
  `assignmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `groupassignment`
--

TRUNCATE TABLE `groupassignment`;
-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

DROP TABLE IF EXISTS `instructor`;
CREATE TABLE IF NOT EXISTS `instructor` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `instructor`
--

TRUNCATE TABLE `instructor`;
-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `parent`
--

TRUNCATE TABLE `parent`;
--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`) VALUES
(1),
(2),
(7),
(13);

-- --------------------------------------------------------

--
-- Table structure for table `passport`
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

--
-- Truncate table before insert `passport`
--

TRUNCATE TABLE `passport`;
-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL,
  `totalPoints` float NOT NULL DEFAULT '0',
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `student`
--

TRUNCATE TABLE `student`;
--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `totalPoints`, `birthdate`) VALUES
(3, 0, '2017-05-01'),
(10, 0, '0001-12-12'),
(11, 0, '2012-12-14'),
(12, 0, '1111-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `studentbadge`
--

DROP TABLE IF EXISTS `studentbadge`;
CREATE TABLE IF NOT EXISTS `studentbadge` (
  `studentID` int(11) NOT NULL,
  `badgeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `studentbadge`
--

TRUNCATE TABLE `studentbadge`;
-- --------------------------------------------------------

--
-- Table structure for table `subittedassignment`
--

DROP TABLE IF EXISTS `subittedassignment`;
CREATE TABLE IF NOT EXISTS `subittedassignment` (
  `assignmentID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `fileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `subittedassignment`
--

TRUNCATE TABLE `subittedassignment`;
-- --------------------------------------------------------

--
-- Table structure for table `user`
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `name`, `surname`, `phoneNumber`, `position`, `photoFieldId`) VALUES
(1, 'asdasd', 'madina121393@mail.ru', 'Madina', 'Saidova', '+998909110044', 'p', 0),
(3, 'child_password', 'child_email', 'child_name', 'child_surname', 'child_phoneNumber', 's', 0),
(4, 'asdasd', 'madina121393@mail.ru', 'Madina', 'Saidova', '+998909110044', 'p', 0),
(5, 'asdasd', 'madina121393@mail.ru', 'Madina', 'Saidova', '+998909110044', 'p', 0),
(6, 'asdasd', 'abdulbosid.kh@gmail.com', 'Abdulbosid', 'Khamidov', '+998909110044', 'a', 0),
(7, 'asd', 'abdulbosid.kh@gmail.com', 'Abdulbosid', 'Khamidov', '+998909110044', 'p', NULL),
(8, '2015-12-15', 'abdulbosid.kh@gmail.com', 'Cool', 'boy', '+998909110044', 's', NULL),
(9, '0001-12-12', 'abdulbosid.kh@gmail.com', 'asd', 'asd', '+998909110044', 's', NULL),
(10, '0001-12-12', 'abdulbosid.kh@gmail.com', 'asd', 'asd', '+998909110044', 's', NULL),
(11, '2012-12-14', 'abdulbosid.kh@gmail.com', 'Some', 'Other', '+998909110044', 's', NULL),
(12, '1111-11-11', 'abdulbosid.kh@gmail.com', 'asd', 'sd', '+998909110044', 's', NULL),
(13, 'asdasd', 'mu_slim@gmail.com', 'Muslimbek', 'Abduganiyev', '+998909110044', 'p', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `waitlist`
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `waitlist`
--

TRUNCATE TABLE `waitlist`;
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
(8, 1, 1, 3, 'Monday/Wednesday/Friday', '2017-05-09 08:51:25', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
