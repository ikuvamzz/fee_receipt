-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 05:48 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fee_receipt`
--

-- --------------------------------------------------------

--
-- Table structure for table `fee_deposit`
--

CREATE TABLE `fee_deposit` (
  `id` int(11) NOT NULL,
  `session` varchar(10) NOT NULL,
  `month` int(11) NOT NULL,
  `admission` int(11) NOT NULL,
  `bill_num` int(11) NOT NULL,
  `bill_date` varchar(10) NOT NULL,
  `class` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `admission_fee` int(11) NOT NULL,
  `monthly_fee` int(11) NOT NULL,
  `sports_fee` int(11) NOT NULL,
  `building_fee` int(11) NOT NULL,
  `generator_fee` int(11) NOT NULL,
  `computer_fee` int(11) NOT NULL,
  `other_fee` int(11) NOT NULL,
  `total_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_deposit`
--

INSERT INTO `fee_deposit` (`id`, `session`, `month`, `admission`, `bill_num`, `bill_date`, `class`, `name`, `fname`, `admission_fee`, `monthly_fee`, `sports_fee`, `building_fee`, `generator_fee`, `computer_fee`, `other_fee`, `total_fee`) VALUES
(1, '2019-20', 4, 1, 1, '19/09/2019', 1, 'sourav dutt', 'rajiv dutt', 5000, 1000, 0, 750, 750, 750, 750, 4000),
(2, '2019-20', 0, 2, 2, '2019-12-31', 0, 'mansi dutt', 'rajiv dutt', 0, 1000, 250, 500, 200, 0, 0, 1950),
(4, '2019-20', 0, 3, 3, '2019-12-31', 0, 'shiva dutt', 'rajiv dutt', 2000, 1000, 250, 500, 200, 0, 0, 3950),
(5, '2019-20', 5, 1, 4, '2019-12-31', 0, 'sourav dutt', 'rajiv dutt', 0, 2000, 250, 500, 200, 0, 0, 2950),
(6, '2019-20', 6, 1, 5, '2019-12-31', 0, 'sourav dutt', 'rajiv dutt', 0, 1000, 250, 500, 200, 0, 0, 1950),
(7, '2019-20', 4, 6, 6, '2019-12-31', 1, 'sahil', 'sourav', 0, 500, 0, 250, 250, 250, 250, 1500),
(8, '2019-20', 4, 1001, 7, '2019-12-31', 1, 'tahir ali', 'asghar ali khan', 0, 1000, 0, 250, 250, 250, 250, 2000),
(9, '2019-20', 4, 1002, 8, '2019-12-31', 0, 'shiva', 'rajiv dutt', 0, 1000, 250, 500, 200, 0, 0, 1950),
(10, '2019-20', 6, 1002, 9, '2019-12-31', 0, 'shiva', 'rajiv dutt', 0, 1000, 250, 500, 200, 0, 0, 1950),
(11, '2019-20', 0, 1003, 10, '2019-12-31', 0, 'tarun dutt', 'anil dutt', 2000, 0, 0, 0, 0, 0, 0, 2000),
(12, '2019-20', 0, 1003, 11, '2019-12-31', 0, 'tarun dutt', 'anil dutt', 2000, 0, 0, 0, 0, 0, 0, 2000),
(13, '2019-20', 4, 1003, 12, '2019-12-31', 0, 'tarun dutt', 'anil dutt', 0, 1000, 250, 500, 200, 0, 0, 1950),
(14, '2019-20', 0, 1005, 13, '17/08/2019', 0, 'KRISH', 'MANI RAM', 2000, 0, 0, 0, 0, 0, 1000, 3000),
(15, '2019-20', 0, 1, 14, '21-08-2019', 0, 'sourav dutt', 'rajiv dutt', 7000, 0, 0, 0, 0, 0, 0, 7000),
(16, '2019-20', 0, 1, 15, '21-08-2019', 0, 'sourav dutt', 'rajiv dutt', 7000, 0, 0, 0, 0, 0, 0, 7000),
(17, '2019-20', 0, 1007, 16, '21-08-2019', 0, 'rajveer', 'maniram', 2000, 0, 0, 0, 0, 0, 0, 2000),
(18, '2019-20', 4, 1007, 17, '21-08-2019', 0, 'rajveer', 'maniram', 0, 1000, 250, 500, 200, 0, 0, 1950),
(20, '2019-20', 4, 1008, 18, '23-08-2019', 0, 'amarjeet kumar', 'ram bharos paswan', 0, 1000, 250, 500, 200, 0, 0, 1950),
(21, '2019-20', 5, 1008, 19, '23-08-2019', 0, 'amarjeet kumar', 'ram bharos paswan', 0, 1000, 250, 500, 200, 0, 0, 1950),
(22, '2019-20', 6, 1008, 20, '23-08-2019', 0, 'amarjeet kumar', 'ram bharos paswan', 0, 1000, 250, 500, 200, 0, 0, 1950),
(23, '2019-20', 0, 1009, 21, '23-08-2019', 0, 'rahul kumar', 'rajesh kumar', 2000, 0, 0, 0, 0, 0, 0, 2000),
(24, '2019-20', 4, 1009, 22, '23-08-2019', 0, 'rahul kumar', 'rajesh kumar', 0, 1000, 250, 500, 200, 0, 0, 1950),
(25, '2019-20', 5, 1009, 23, '23-08-2019', 0, 'rahul kumar', 'rajesh kumar', 0, 1000, 250, 500, 200, 0, 0, 1950),
(26, '2019-20', 7, 1008, 24, '23-08-2019', 0, 'amarjeet kumar', 'ram bharos paswan', 0, 1000, 250, 500, 200, 0, 0, 1950),
(27, '2019-20', 6, 1009, 25, '23-08-2019', 0, 'rahul kumar', 'rajesh kumar', 0, 1000, 250, 500, 200, 0, 0, 1950),
(28, '2019-20', 8, 1008, 26, '23-08-2019', 0, 'amarjeet kumar', 'ram bharos paswan', 0, 1000, 250, 500, 200, 0, 0, 1950),
(29, '2019-20', 9, 1008, 27, '23-08-2019', 0, 'amarjeet kumar', 'ram bharos paswan', 0, 1000, 250, 500, 200, 0, 0, 1950),
(30, '2019-20', 10, 1008, 28, '23-08-2019', 0, 'amarjeet kumar', 'ram bharos paswan', 0, 1000, 250, 500, 200, 0, 0, 1950),
(31, '2019-20', 11, 1008, 29, '23-08-2019', 0, 'amarjeet kumar', 'ram bharos paswan', 0, 1000, 250, 500, 200, 0, 0, 1950),
(32, '2019-20', 12, 1008, 30, '23-08-2019', 0, 'amarjeet kumar', 'ram bharos paswan', 0, 1000, 250, 500, 200, 0, 0, 1950),
(33, '2019-20', 1, 1008, 31, '23-08-2019', 0, 'amarjeet kumar', 'ram bharos paswan', 0, 1000, 250, 500, 200, 0, 0, 1950),
(34, '2019-20', 7, 1, 32, '23-08-2019', 0, 'sourav dutt', 'rajiv dutt', 0, 1000, 250, 500, 200, 0, 0, 1950),
(35, '2019-20', 8, 1, 33, '23-08-2019', 0, 'sourav dutt', 'rajiv dutt', 0, 1000, 250, 500, 200, 0, 0, 1950),
(36, '2019-20', 0, 1010, 34, '24-08-2019', 0, 'happy raikoti', 'hans raj hans', 2000, 0, 0, 0, 0, 0, 100, 2100),
(37, '2019-20', 4, 1010, 35, '24-08-2019', 0, 'happy raikoti', 'hans raj hans', 0, 1000, 250, 500, 200, 0, 0, 1950),
(38, '2019-20', 5, 1010, 36, '24-08-2019', 0, 'happy raikoti', 'hans raj hans', 0, 1000, 250, 500, 200, 0, 0, 1950),
(39, '2019-20', 6, 1010, 37, '24-08-2019', 0, 'happy raikoti', 'hans raj hans', 0, 1000, 250, 500, 200, 0, 0, 1950),
(40, '2019-20', 7, 1010, 38, '24-08-2019', 0, 'happy raikoti', 'hans raj hans', 0, 1000, 250, 500, 200, 0, 0, 1950),
(41, '2019-20', 8, 1010, 39, '24-08-2019', 0, 'happy raikoti', 'hans raj hans', 0, 1000, 250, 500, 200, 0, 0, 1950),
(42, '2019-20', 9, 1010, 40, '24-08-2019', 0, 'happy raikoti', 'hans raj hans', 0, 1000, 250, 500, 200, 0, 0, 1950),
(43, '2019-20', 11, 1010, 41, '24-08-2019', 0, 'happy raikoti', 'hans raj hans', 0, 1000, 250, 500, 200, 0, 0, 1950),
(44, '2019-20', 10, 1010, 42, '24-08-2019', 0, 'happy raikoti', 'hans raj hans', 0, 1000, 250, 500, 200, 0, 0, 1950),
(45, '2019-20', 12, 1010, 43, '24-08-2019', 0, 'happy raikoti', 'hans raj hans', 0, 1000, 250, 500, 200, 0, 0, 1950),
(46, '2019-20', 1, 1010, 44, '24-08-2019', 0, 'happy raikoti', 'hans raj hans', 0, 1000, 250, 500, 200, 0, 0, 1950),
(47, '2019-20', 2, 1010, 45, '24-08-2019', 0, 'happy raikoti', 'hans raj hans', 0, 1000, 250, 500, 200, 0, 0, 1950),
(48, '2019-20', 3, 1010, 46, '24-08-2019', 0, 'happy raikoti', 'hans raj hans', 0, 1000, 250, 500, 200, 0, 0, 1950),
(49, '2019-20', 4, 1011, 47, '24-08-2019', 0, 'babbu mann', 'happy raikoti', 0, 1000, 250, 500, 200, 0, 0, 1950),
(50, '2019-20', 5, 1011, 48, '24-08-2019', 0, 'babbu mann', 'happy raikoti', 0, 1000, 250, 500, 200, 0, 0, 1950),
(51, '2019-20', 6, 1011, 49, '24-08-2019', 0, 'babbu mann', 'happy raikoti', 0, 1000, 250, 500, 200, 0, 0, 1950),
(52, '2019-20', 7, 1011, 50, '24-08-2019', 0, 'babbu mann', 'happy raikoti', 0, 1000, 250, 500, 200, 0, 0, 1950),
(53, '2019-20', 8, 1011, 51, '24-08-2019', 0, 'babbu mann', 'happy raikoti', 0, 1000, 250, 500, 200, 0, 0, 1950),
(54, '2019-20', 9, 1011, 52, '24-08-2019', 0, 'babbu mann', 'happy raikoti', 0, 1000, 250, 500, 200, 0, 0, 1950),
(55, '2019-20', 10, 1011, 53, '24-08-2019', 0, 'babbu mann', 'happy raikoti', 0, 1000, 250, 500, 200, 0, 0, 1950),
(56, '2019-20', 11, 1011, 54, '24-08-2019', 0, 'babbu mann', 'happy raikoti', 0, 1000, 250, 500, 200, 0, 0, 1950),
(57, '2019-20', 4, 1012, 55, '24-08-2019', 0, 'arijit singh', 'himesh reshamia', 0, 1000, 250, 500, 200, 0, 0, 1950),
(58, '2019-20', 5, 1012, 56, '24-08-2019', 0, 'arijit singh', 'himesh reshamia', 0, 1000, 250, 500, 200, 0, 0, 1950),
(59, '2019-20', 6, 1012, 57, '24-08-2019', 0, 'arijit singh', 'himesh reshamia', 0, 1000, 250, 500, 200, 0, 0, 1950),
(60, '2019-20', 7, 1012, 58, '24-08-2019', 0, 'arijit singh', 'himesh reshamia', 0, 1000, 250, 500, 200, 0, 0, 1950),
(61, '2019-20', 8, 1012, 59, '24-08-2019', 0, 'arijit singh', 'himesh reshamia', 0, 1000, 250, 500, 200, 0, 0, 1950),
(62, '2019-20', 4, 1013, 60, '24-08-2019', 0, 'salman khan', 'saleem khan', 0, 1000, 250, 500, 200, 0, 0, 1950),
(63, '2019-20', 0, 1014, 61, '24-08-2019', 0, 'sonu nigam', 'anu malik', 2000, 0, 0, 0, 0, 0, 500, 2500),
(64, '2019-20', 4, 1014, 62, '24-08-2019', 0, 'sonu nigam', 'anu malik', 0, 1000, 250, 500, 200, 0, 0, 1950),
(65, '2019-20', 5, 1014, 63, '24-08-2019', 0, 'sonu nigam', 'anu malik', 0, 1000, 250, 500, 200, 0, 0, 1950),
(66, '2019-20', 0, 1015, 64, '24-08-2019', 10, 'gippy garewal', 'jazy b', 10000, 0, 0, 0, 0, 0, 2000, 12000),
(67, '2019-20', 4, 1015, 65, '24-08-2019', 10, 'gippy garewal', 'jazy b', 0, 5000, 500, 500, 500, 500, 2000, 9000),
(68, '2019-20', 5, 1015, 66, '25-08-2019', 10, 'gippy garewal', 'jazy b', 0, 5000, 500, 500, 500, 500, 2000, 9000),
(69, '2019-20', 6, 1015, 67, '25-08-2019', 10, 'gippy garewal', 'jazy b', 0, 5000, 500, 500, 500, 500, 2000, 9000),
(70, '2019-20', 7, 1015, 68, '25-08-2019', 10, 'gippy garewal', 'jazy b', 0, 5000, 500, 500, 500, 500, 2000, 9000),
(71, '2019-20', 0, 901, 69, '31-08-2019', 9, 'mani ram', 'gajodhar prasad', 9000, 0, 0, 0, 0, 0, 1000, 10000),
(72, '2019-20', 0, 401, 70, '03-04-2019', 4, 'john cena', 'undertaker', 4000, 0, 0, 0, 0, 0, 1000, 5000),
(73, '2019-20', 4, 401, 71, '03-04-2019', 4, 'john cena', 'undertaker', 0, 2000, 500, 500, 500, 500, 0, 4000),
(74, '2019-20', 0, 402, 72, '04-09-2019', 4, 'salman khan', 'shahrukh khan', 4000, 0, 0, 0, 0, 0, 1000, 5000),
(75, '2019-20', 9, 125, 73, '08-09-2019', 2, 'sahil', 'sahil', 0, 500, 0, 0, 0, 0, 0, 500),
(76, '2020-21', 5, 1120, 74, '13/09/2019', 12, 'sahil', 'Sourav', 0, 28, 42, 4, 25, 52, 23, 174),
(77, '2020-21', 0, 1525, 75, '13/09/2019', 10, 'amit', 'Sourav dutt', 95, 0, 0, 0, 0, 0, 46, 141),
(78, '2019-20', 10, 2500, 76, '13/09/2019', 1, 'amit 45', 'aditya kumar', 0, 555, 555, 555, 555, 555, 555, 3330),
(79, '2019-20', 5, 2, 77, '18/09/2019', 0, 'mansi dutt', 'rajiv dutt', 0, 1000, 1000, 1000, 1000, 0, 0, 4000),
(80, '2019-20', 6, 2, 78, '18/09/2019', 0, 'mansi dutt', 'rajiv dutt', 0, 1000, 1000, 1000, 1000, 0, 0, 4000),
(81, '2019-20', 4, 3, 79, '18/09/2019', 0, 'shiva dutt', 'rajiv dutt', 0, 1000, 1000, 1000, 1000, 0, 0, 4000),
(82, '2020-21', 0, 8001, 80, '03/11/2019', 8, 'sourav', 'dutt', 8000, 0, 0, 0, 0, 0, 0, 8000),
(83, '2020-21', 4, 8001, 81, '03/11/2019', 8, 'sourav', 'dutt', 0, 4000, 1000, 500, 500, 500, 500, 7000),
(84, '2020-21', 4, 8002, 82, '03/11/2019', 8, 'sameer', 'suresh', 0, 4000, 1000, 500, 500, 500, 500, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure`
--

CREATE TABLE `fee_structure` (
  `id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `admission` int(11) NOT NULL,
  `monthly` int(11) NOT NULL,
  `sports` int(11) NOT NULL,
  `building` int(11) NOT NULL,
  `generator` int(11) NOT NULL,
  `computer` int(11) NOT NULL,
  `other` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_structure`
--

INSERT INTO `fee_structure` (`id`, `class`, `admission`, `monthly`, `sports`, `building`, `generator`, `computer`, `other`, `total`) VALUES
(1, 1, 5000, 2000, 0, 250, 250, 250, 250, 3000),
(2, 0, 2000, 0, 1000, 1000, 1000, 0, 0, 3000),
(3, 3, 5000, 2000, 500, 500, 250, 250, 0, 3500),
(4, 2, 3000, 1000, 500, 500, 250, 250, 500, 3000),
(5, 6, 6000, 1500, 1000, 500, 500, 500, 1000, 27500),
(6, 7, 7000, 2000, 1500, 500, 500, 500, 500, 172500),
(7, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 10, 10000, 5000, 500, 500, 500, 500, 2000, 74000),
(9, 9, 9000, 1000, 500, 500, 500, 500, 1000, 24000),
(10, 4, 4000, 2000, 500, 500, 500, 500, 1000, 31000),
(11, 12, 1255, 8800, 452, 1000, 1040, 2500, 450, 14242),
(12, 8, 8000, 4000, 1000, 500, 500, 500, 500, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `id` int(11) NOT NULL,
  `inst_name` varchar(50) NOT NULL,
  `inst_add1` varchar(30) NOT NULL,
  `inst_add2` varchar(30) NOT NULL,
  `inst_city` varchar(10) NOT NULL,
  `inst_pin` int(6) NOT NULL,
  `inst_dist` varchar(10) NOT NULL,
  `inst_state` varchar(10) NOT NULL,
  `inst_mob1` varchar(10) NOT NULL,
  `inst_mob2` varchar(10) NOT NULL,
  `inst_head_name` varchar(30) NOT NULL,
  `inst_head_desig` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`id`, `inst_name`, `inst_add1`, `inst_add2`, `inst_city`, `inst_pin`, `inst_dist`, `inst_state`, `inst_mob1`, `inst_mob2`, `inst_head_name`, `inst_head_desig`) VALUES
(1, 'S.D.P.P. High School', 'Old Lohtia Bazar', 'Near Jama Masjid', 'Malerkotla', 148023, 'Sangrur', 'Punjab', '9876543210', '0123456789', 'Anil Kumar', 'Headmaster/Principal');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` int(11) NOT NULL,
  `admission` int(11) NOT NULL,
  `session` varchar(9) NOT NULL,
  `months` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `admission`, `session`, `months`) VALUES
(9, 1008, '2019-20', '4,5,6,7,8,\'11,'),
(13, 1, '2019-20', '4,5,6,7,8,\'11,'),
(14, 1010, '2019-20', 'Array\'Array'),
(15, 1011, '2019-20', 'Array,11,'),
(16, 1012, '2019-20', '4,5,6,,August,'),
(17, 1013, '2019-20', 'April,'),
(18, 1014, '2019-20', 'Adms,Apr,May,'),
(19, 1015, '2019-20', 'Adms,Apr,May,Jun, Jul, '),
(20, 901, '2019-20', 'Adms,'),
(21, 401, '2019-20', 'Adms,Apr, '),
(22, 402, '2019-20', 'Adms,'),
(23, 125, '2019-20', 'Sep,'),
(24, 1120, '2020-21', 'May,'),
(25, 1525, '2020-21', 'Adms,'),
(26, 2500, '2019-20', 'Oct,'),
(27, 2, '2019-20', 'May,Jun, '),
(28, 3, '2019-20', 'Apr,'),
(29, 8001, '2020-21', 'Adms,Apr, '),
(30, 8002, '2020-21', 'Apr,');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'sdpp', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fee_deposit`
--
ALTER TABLE `fee_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_structure`
--
ALTER TABLE `fee_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fee_deposit`
--
ALTER TABLE `fee_deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `fee_structure`
--
ALTER TABLE `fee_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
