-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2014 at 05:31 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `assid` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `tid` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `text` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `fileid` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `deadline` datetime NOT NULL,
  PRIMARY KEY (`assid`),
  UNIQUE KEY `assid` (`assid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `backpack`
--

CREATE TABLE IF NOT EXISTS `backpack` (
  `bpid` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `user` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `cgid` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`bpid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentid` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `postid` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `text` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `user` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`commentid`),
  UNIQUE KEY `commentid` (`commentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coursegroup`
--

CREATE TABLE IF NOT EXISTS `coursegroup` (
  `id` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `cgname` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `rating` float NOT NULL,
  `user` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'Untitled.txt',
  `mime` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'text/plain',
  `size` bigint(20) unsigned NOT NULL DEFAULT '0',
  `data` mediumblob NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `friendlist`
--

CREATE TABLE IF NOT EXISTS `friendlist` (
  `user1` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `user2` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user1`,`user2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberlist`
--

CREATE TABLE IF NOT EXISTS `memberlist` (
  `cgid` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `user` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `type` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `joindate` datetime NOT NULL,
  PRIMARY KEY (`cgid`,`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `messid` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `time` datetime NOT NULL,
  `sender` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `receiver` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `content` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`messid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `tid` int(255) NOT NULL,
  `pid` int(255) NOT NULL AUTO_INCREMENT,
  `text` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `fileid` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `user` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `cg` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  PRIMARY KEY (`pid`),
  KEY `fk_post_timeline` (`tid`),
  KEY `fk_post_user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `cgid` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `score` int(11) DEFAULT NULL,
  PRIMARY KEY (`cgid`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE IF NOT EXISTS `timeline` (
  `tid` int(255) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `cgid` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `type` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'member',
  `DOB` date NOT NULL,
  `interest` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `waitlist`
--

CREATE TABLE IF NOT EXISTS `waitlist` (
  `cgid` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`cgid`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
