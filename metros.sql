-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 02:09 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metros`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'Delhi'),
(2, 'Bengaluru'),
(3, 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `crossings`
--

CREATE TABLE `crossings` (
  `cross_id` int(11) NOT NULL,
  `line_1` int(11) NOT NULL,
  `line_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crossings`
--

INSERT INTO `crossings` (`cross_id`, `line_1`, `line_2`) VALUES
(12, 10, 43);

-- --------------------------------------------------------

--
-- Table structure for table `line1`
--

CREATE TABLE `line1` (
  `station_id` int(11) NOT NULL,
  `seq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `line1`
--

INSERT INTO `line1` (`station_id`, `seq`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(21, 11),
(22, 12),
(23, 13),
(24, 14),
(25, 15),
(26, 16),
(27, 17);

-- --------------------------------------------------------

--
-- Table structure for table `line2`
--

CREATE TABLE `line2` (
  `station_id` int(11) NOT NULL,
  `seq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `line2`
--

INSERT INTO `line2` (`station_id`, `seq`) VALUES
(11, 1),
(12, 2),
(13, 3),
(14, 4),
(15, 5),
(16, 6),
(17, 7),
(18, 8),
(19, 9),
(20, 10),
(28, 11),
(29, 12),
(30, 13);

-- --------------------------------------------------------

--
-- Table structure for table `line3`
--

CREATE TABLE `line3` (
  `station_id` int(11) NOT NULL,
  `seq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `line3`
--

INSERT INTO `line3` (`station_id`, `seq`) VALUES
(31, 1),
(32, 2),
(33, 3),
(34, 4),
(35, 5),
(36, 6),
(37, 7),
(38, 8),
(39, 9),
(40, 10),
(41, 11),
(42, 12);

-- --------------------------------------------------------

--
-- Table structure for table `metrolines`
--

CREATE TABLE `metrolines` (
  `line_id` int(11) NOT NULL,
  `line_name` varchar(20) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metrolines`
--

INSERT INTO `metrolines` (`line_id`, `line_name`, `city_id`) VALUES
(1, 'Purple', 2),
(2, 'Green', 2),
(3, 'blue', 3);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `route_id` int(11) NOT NULL,
  `src_id` int(11) NOT NULL,
  `dest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`route_id`, `src_id`, `dest_id`) VALUES
(1, 1, 40),
(2, 11, 33);

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `station_id` int(11) NOT NULL,
  `station_name` varchar(45) NOT NULL,
  `line_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`station_id`, `station_name`, `line_id`) VALUES
(1, 'Baiyyappanahalli', 1),
(2, 'Swami Vivekananda Road', 1),
(3, 'Indiranagar', 1),
(4, 'Halasuru', 1),
(5, 'Trinity', 1),
(6, 'Mahatma Gandhi Road', 1),
(7, 'Cubbon Park', 1),
(8, 'DR.B.R Ambedkar Vidhana Soudha', 1),
(9, 'Sir M Visveswarava Central College', 1),
(10, 'Nadaprabhu KempeGowda Majestic', 1),
(11, 'Yelachenahalli', 2),
(12, 'Jayaprakash Nagar', 2),
(13, 'Banashankri', 2),
(14, 'Rashtriya Vidhyalaya Road', 2),
(15, 'Jayanagar', 2),
(16, 'South End Circle', 2),
(17, 'Lalbagh', 2),
(18, 'National College', 2),
(19, 'Krishna Rajendra Market', 2),
(20, 'Chickpete', 2),
(21, 'KSR City Railway Station', 1),
(22, 'Magadi Road', 1),
(23, 'BGS Hosahalli', 1),
(24, 'Vijayanagar', 1),
(25, 'Attiguppe', 1),
(26, 'Deepanjali', 1),
(27, 'Mysuru Road', 1),
(28, 'Mantri square Sampige Road', 2),
(29, 'Sriampura', 2),
(30, 'Kuvempu Road', 2),
(31, 'Versova', 3),
(32, 'DN Nagar', 3),
(33, 'Azad Nagar', 3),
(34, 'Andheri', 3),
(35, 'Western Express Highway', 3),
(36, 'Chakala(JB Nagar)', 3),
(37, 'Airport Road', 3),
(38, 'Marol Naka', 3),
(39, 'Saki Naka', 3),
(40, 'Asalpha', 3),
(41, 'Jagruti Nagar', 3),
(42, 'Ghatkopar', 3),
(43, 'Nadaprabhu KempeGowda Majestic', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `crossings`
--
ALTER TABLE `crossings`
  ADD PRIMARY KEY (`cross_id`);

--
-- Indexes for table `line1`
--
ALTER TABLE `line1`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `line2`
--
ALTER TABLE `line2`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `line3`
--
ALTER TABLE `line3`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `metrolines`
--
ALTER TABLE `metrolines`
  ADD PRIMARY KEY (`line_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`station_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
