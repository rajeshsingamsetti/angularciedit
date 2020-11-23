-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2020 at 09:34 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `userservice`
--

CREATE TABLE `userservice` (
  `user_service_id` int(63) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `add_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userservice`
--

INSERT INTO `userservice` (`user_service_id`, `service_name`, `status`, `add_date`) VALUES
(1, 'Rajsingamseetytesting', '1', '2020-11-20'),
(2, 'under dev', '1', '2020-11-20'),
(3, 'devunder', '1', '2020-11-23'),
(5, 'rajdev', '1', '2020-11-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userservice`
--
ALTER TABLE `userservice`
  ADD PRIMARY KEY (`user_service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userservice`
--
ALTER TABLE `userservice`
  MODIFY `user_service_id` int(63) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
