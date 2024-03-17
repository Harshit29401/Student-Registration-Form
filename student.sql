-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 01:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `contact_number` bigint(20) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `firstname`, `lastname`, `email`, `password`, `gender`, `department`, `address_line1`, `address_line2`, `city`, `state`, `country`, `zip_code`, `contact_number`, `profile_pic`, `resume`, `reg_date`) VALUES
(39, 'Harshit', 'Patel', 'harshit.patel@gmail.com', 'hArshit@123', 'Male', 'M.Tech', '123, Akshar Pole', 'Gana', 'Anand', 'Gujarat', 'India', '388356', 9865747589, 'proflie pic.jpg', 'Resume.pdf', '2024-03-14 11:08:50'),
(40, 'Pruvin', 'Patel', 'purvin@gmail.com', 'Pruvin@123', 'Male', 'MBA', 'Abc Society', 'Bakrol', 'Anand', 'Gujarat', 'India', '388321', 9784653120, 'proflie pic1.jpg', 'Resume.pdf', '2024-03-14 09:58:50'),
(41, 'Roshni', 'Vasava', 'roshni@gmail.com', 'Roshni@123', 'Female', 'B.Tech', 'XYZ Society', 'ABC Road', 'Vadodara', 'Gujarat', 'India', '123456', 6589741320, 'proflie pic6.jpg', 'Resume.pdf', '2024-03-14 09:58:50'),
(42, 'Shreya', 'Dalwadi', 'shreya@gmail.com', 'Shreya@123', 'Female', 'B.Tech', 'Shanti Knuj', 'Near SP Highway', 'Anand', 'Gujarat', 'India', '366356', 6321457890, 'proflie pic5.jpg', 'Resume.pdf', '2024-03-14 09:58:50'),
(44, 'Shreya', 'Dalwadi', 'shreya@gmail.com', 'Shreya@1223', 'Female', 'B.Tech', 'Gandhi Pole', 'Dakor', 'Anand', 'Gujarat', 'India', '388756', 7894561230, 'proflie pic5.jpg', 'Resume.pdf', '2024-03-14 10:22:42'),
(48, 'Raj', 'Sharma', 'raj@gmail.com', 'Raj@1234', 'Male', 'MBA', 'Darshan Society', 'Bakrol', 'Anand', 'Gujarat', 'India', '366355', 1234567890, 'proflie pic1.jpg', 'Resume.pdf', '2024-03-14 11:45:15'),
(49, 'Parul', 'Patel', 'parul@gmail.com', 'Parul@123', 'Female', 'M.Tech', 'Shree Colony', 'VVN', 'Anand', 'Gujarat', 'India', '355755', 7845968622, 'proflie pic6.jpg', 'Resume.pdf', '2024-03-14 12:02:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
