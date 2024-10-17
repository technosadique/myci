-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 07:02 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `in_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `phone`, `in_deleted`) VALUES
(1, 'rani', 'rani', '111111111', 1),
(2, 'MARY', 'SMITH', '222222', 1),
(3, 'JACOB', 'JAMES', '444444', 0),
(4, 'STEVE', 'JACKES', '888888', 0),
(6, 'RIAN', 'WHITE', '101010', 0),
(7, 'sadiq', 'mohd', '877777', 0),
(8, 'yash', 'yash', '999999', 0),
(9, 'sasas', 'asas', 'asas', 1),
(10, 'zzz', 'zzzz', '453454354', 1),
(11, 'sss', 'sss', '4343', 1),
(13, 'ddd', 'ddd', '34234', 1),
(14, 'asa', 'asas', '23232', 1),
(15, 'nilesh', 'thakoor', '55555', 1),
(16, 'raj', 'rajj', '555555', 0),
(17, 'babu', 'rao', '777777', 0),
(18, '', '', '', 1),
(20, 'sss', 'ssss', '3423423', 1),
(27, 'ddd', 'ddd', '1111111', 1),
(28, 'sssppp', 'ssss', '22323', 1),
(29, 'goldiii', 'goldi', '9999999', 0),
(30, 'monti', 'monti', '898989898989', 0),
(31, 'tiger', 'tiger', '888888888', 0),
(32, 'watson', 'watson', '7777774444', 0),
(33, 'watson', 'watson', '7777774444', 1),
(34, 'watson', 'watson', '7777774444', 1),
(35, 'tiger', 'tiger', '3333333333', 1),
(36, 'anu', 'anu', '4444444444', 1),
(37, 'anu', 'anu', '4444444444', 1),
(38, 'anu', 'anu', '4444444444', 1),
(39, 'anu', 'anu', '4444444444', 1),
(40, 'anu', 'anu', '4444444444', 1),
(41, 'anu', 'anu', '4444444444', 1),
(42, 'anu', 'anu', '4444444444', 1),
(43, 'anu', 'anu', '4444444444', 1),
(44, 'anu', 'anu', '4444444444', 1),
(45, 'anu', 'anu', '4444444444', 1),
(46, 'anu', 'anu', '4444444444', 1),
(47, 'karan', 'karan', '8585858585', 0),
(48, '', 'karan', '8585858585', 0),
(49, 'rahul', 'rahul', '7777777777', 1),
(50, 'amir', 'khan', '562326', 0),
(51, 'salman', 'khan', '4500000', 0),
(52, 'juhi', 'chawala', '505223625', 0),
(53, 'juli', 'juli', '9666666666', 0),
(54, 'juli', 'juli', '9666666666', 0),
(55, 'maria', 'maria', '699999999', 0),
(57, 'junaid', 'junaid', '77788888', 0),
(58, 'junaid', 'junaid', '77788888', 0),
(59, 'nimmi', 'nimmi', '434343434', 0),
(60, '', '', '', 0);

--
-- Triggers `customers`
--
DELIMITER $$
CREATE TRIGGER `t1` BEFORE DELETE ON `customers` FOR EACH ROW insert into customer_backup values (old.id, old.first_name,old.last_name,old.phone)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
