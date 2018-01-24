-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 07:35 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_services`
--

CREATE TABLE `available_services` (
  `service_id` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available_services`
--

INSERT INTO `available_services` (`service_id`, `service_name`) VALUES
('1', 'Venue'),
('2', 'Caterers'),
('3', 'Media'),
('4', 'Travels'),
('5', 'Beautians'),
('6', 'Entertainments'),
('7', 'Decorators');

-- --------------------------------------------------------

--
-- Table structure for table `beauticians`
--

CREATE TABLE `beauticians` (
  `vendor_id` varchar(50) NOT NULL,
  `bridal` varchar(250) DEFAULT NULL,
  `prebridal` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beauticians`
--

INSERT INTO `beauticians` (`vendor_id`, `bridal`, `prebridal`) VALUES
('blue@gmail.com', 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `booking_confirmed`
--

CREATE TABLE `booking_confirmed` (
  `user_id` varchar(50) NOT NULL,
  `service_id` varchar(50) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `vendor_status` int(11) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_confirmed`
--

INSERT INTO `booking_confirmed` (`user_id`, `service_id`, `vendor_id`, `booking_date`, `vendor_status`, `user_status`) VALUES
('navidha@gmail.com', '1', 'nandu@gmail.com', '2017-04-24', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_granted`
--

CREATE TABLE `booking_granted` (
  `user_id` varchar(50) NOT NULL,
  `service_id` varchar(50) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_granted`
--

INSERT INTO `booking_granted` (`user_id`, `service_id`, `vendor_id`, `booking_date`, `status`) VALUES
('user1@gmail.com', '1', 'p@gmail.com', '2017-04-20', 1),
('neenu@gmail.com', '1', 'nandu@gmail.com', '2017-04-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_request`
--

CREATE TABLE `booking_request` (
  `user_id` varchar(50) NOT NULL,
  `service_id` varchar(50) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_request`
--

INSERT INTO `booking_request` (`user_id`, `service_id`, `vendor_id`, `booking_date`, `status`) VALUES
('navidha@gmail.com', '2', 'pp@gmail.com', '2017-04-24', 1),
('navidha@gmail.com', '1', 'ppp@gmail.com', '2017-04-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `catering`
--

CREATE TABLE `catering` (
  `vendor_id` varchar(50) NOT NULL,
  `ctype` varchar(50) DEFAULT NULL,
  `kitchen` varchar(10) DEFAULT NULL,
  `service` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catering`
--

INSERT INTO `catering` (`vendor_id`, `ctype`, `kitchen`, `service`) VALUES
('blue@gmail.com', 'veg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `decoration`
--

CREATE TABLE `decoration` (
  `vendor_id` varchar(50) NOT NULL,
  `patterns` varchar(150) DEFAULT NULL,
  `flowers` varchar(50) DEFAULT NULL,
  `lightandsound` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decoration`
--

INSERT INTO `decoration` (`vendor_id`, `patterns`, `flowers`, `lightandsound`) VALUES
('blue@gmail.com', 'y', 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `entertainment`
--

CREATE TABLE `entertainment` (
  `vendor_id` varchar(50) NOT NULL,
  `requirements` varchar(150) DEFAULT NULL,
  `programs` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entertainment`
--

INSERT INTO `entertainment` (`vendor_id`, `requirements`, `programs`) VALUES
('blue@gmail.com', 'No', 'Songs');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `vendor_id` varchar(50) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `equipment` varchar(50) DEFAULT NULL,
  `album` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`vendor_id`, `type`, `equipment`, `album`) VALUES
('blue@gmail.com', 'Candid', 'DSLR', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `service_id` varchar(50) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `package_desc` varchar(200) NOT NULL,
  `package_rate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `vendor_id`, `service_id`, `package_name`, `package_desc`, `package_rate`) VALUES
(39, 'blue@gmail.com', '1', 'Half Day', 'One Half Day', 2000),
(38, 'blue@gmail.com', '1', 'One Day', 'One Full Day', 5500);

-- --------------------------------------------------------

--
-- Table structure for table `service_details`
--

CREATE TABLE `service_details` (
  `service_id` varchar(50) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `location` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `rate` int(11) NOT NULL,
  `availability` varchar(200) DEFAULT NULL,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_details`
--

INSERT INTO `service_details` (`service_id`, `vendor_id`, `service_name`, `location`, `contact`, `rate`, `availability`, `rating`) VALUES
('1', 'blue1@gmail.com', 'Blue venue', 'Kottayam', '9854785487', 5000, '2017-04-03,2017-04-04,2017-04-05,', 0),
('1', 'blue@gmail.com', 'Blue venue', 'Kottayam', '9854785487', 2000, '2017-04-17,2017-04-18,2017-04-27,2017-04-28,2017-04-25,2017-04-26,2017-04-03,', 0),
('2', 'blue@gmail.com', 'Blue Caterers', 'Kottayam', '9854785458', 0, NULL, 0),
('3', 'blue@gmail.com', 'Blue Media', 'Kottayam', '9854785478', 0, NULL, 0),
('4', 'blue@gmail.com', 'Blue Travel', 'Kottayam', '9852145212', 0, NULL, 0),
('5', 'blue@gmail.com', 'Blue Beauty', 'Kottayam', '9854785478', 0, NULL, 0),
('6', 'blue@gmail.com', 'Blue songs', 'k', '9854785478', 0, NULL, 0),
('7', 'blue@gmail.com', 'Blue designs', 'Kottayam', '9854785478', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `vendor_id` varchar(50) NOT NULL,
  `vehicles` varchar(50) DEFAULT NULL,
  `guest_management` varchar(20) DEFAULT NULL,
  `brideveh` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`vendor_id`, `vehicles`, `guest_management`, `brideveh`) VALUES
('blue@gmail.com', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `contact` bigint(50) NOT NULL,
  `event_name` varchar(50) DEFAULT 'Event',
  `location` varchar(50) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `budget` bigint(11) DEFAULT '100000'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_name`, `user_password`, `contact`, `event_name`, `location`, `event_date`, `budget`) VALUES
('user3@gmail.com', 'Host3', 'host3', 0, 'Wed', 'Kottayam', '2017-04-04', 100),
('user1@gmail.com', 'Host1', 'host1', 0, 'Wed', 'Kottayam', '2017-04-04', 100),
('user2@gmail.com', 'Host2', 'host2', 0, 'Wed', 'Kottayam', '2017-04-04', 100),
('prajith@gmail.com', 'prajith', '*BBAE266E0E1E92B3A857E20260D41B7BC259297F', 9854785487, 'Event', 'Kottayam', '2017-04-04', 100),
('user@gmail.com', 'user', '*D5D9F81F5542DE067FFF5FF7A4CA4BDD322C578F', 9854785458, 'Event', 'Kottayam', '2017-04-26', 90000),
('rohan@gmail.com', 'rohan', '*BBAE266E0E1E92B3A857E20260D41B7BC259297F', 9854785475, 'Event', NULL, NULL, 100),
('neenu@gmail.com', 'neenu', '*9C32708111DD25D7916046C15D28342F3206D1D2', 9545478547, 'Event', 'Kottayam', '2017-04-29', 100),
('navidha@gmail.com', 'navidha', '*3DDDFCCCFBDD9481576BEBD1F20CDB0EE1C4CF00', 8547892017, 'Event', 'Kottayam', '2017-04-29', 100);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_details`
--

CREATE TABLE `vendor_details` (
  `vendor_id` varchar(50) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `vendor_password` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_details`
--

INSERT INTO `vendor_details` (`vendor_id`, `vendor_name`, `vendor_password`) VALUES
('blue@gmail.com', 'Blue', '*F1624510F3A5C73809D0E47DAECAA31C14D04910');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `vendor_id` varchar(20) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `capacity` int(10) DEFAULT NULL,
  `kitchen` varchar(50) DEFAULT NULL,
  `parking` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`vendor_id`, `address`, `type`, `capacity`, `kitchen`, `parking`) VALUES
('blue@gmail.com', 'Kanjirapally', 'AC', 2000, 'No', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_services`
--
ALTER TABLE `available_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `beauticians`
--
ALTER TABLE `beauticians`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `booking_request`
--
ALTER TABLE `booking_request`
  ADD PRIMARY KEY (`user_id`,`service_id`,`vendor_id`);

--
-- Indexes for table `catering`
--
ALTER TABLE `catering`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `decoration`
--
ALTER TABLE `decoration`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `entertainment`
--
ALTER TABLE `entertainment`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `service_details`
--
ALTER TABLE `service_details`
  ADD PRIMARY KEY (`service_id`,`vendor_id`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor_details`
--
ALTER TABLE `vendor_details`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
