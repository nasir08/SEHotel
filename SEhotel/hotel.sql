-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2012 at 08:28 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sehotel`
--
CREATE DATABASE `sehotel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sehotel`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` tinyint(3) unsigned NOT NULL auto_increment,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `admin`
--


-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE IF NOT EXISTS `reserved` (
  `reserved_id` tinyint(3) unsigned NOT NULL auto_increment,
  `roomType_id` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL default '20',
  PRIMARY KEY  (`reserved_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `reserved`
--

INSERT INTO `reserved` (`reserved_id`, `roomType_id`, `qty`) VALUES
(1, '1', 20),
(2, '2', 20),
(3, '3', 20),
(4, '4', 19);

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE IF NOT EXISTS `room_types` (
  `roomType_id` int(10) unsigned NOT NULL auto_increment,
  `roomType` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY  (`roomType_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`roomType_id`, `roomType`, `amount`) VALUES
(1, 'Modern Room', 7000),
(2, 'Garden Room', 9000),
(3, 'Deluxe Beach Room', 12000),
(4, 'Family Room', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `trans_id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `nod` int(11) NOT NULL,
  `roomType_id` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `receipt_num` varchar(10) NOT NULL,
  PRIMARY KEY  (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `user_id`, `startDate`, `endDate`, `nod`, `roomType_id`, `amount`, `receipt_num`) VALUES
(5, 1, '2012-11-30', '2012-12-02', 2, '4', 30000, '1014221012');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNumber` varchar(13) NOT NULL,
  `emailAdd` varchar(255) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `phoneNumber`, `emailAdd`) VALUES
(1, 'darmie', 'ab5508e5492d41764ea0b70c3c320d5c74df4a90', '2348096285005', 'darmieblinks@yahoo.com'),
(2, 'tosin', '80f87c8847da6c872ce2fc9fec0a98a73ebc578d', '2347069459253', 'tosin.abdulahi@yahoo.co.uk');
