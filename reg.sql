-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 01:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guvi`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `smail` varchar(100) DEFAULT 'Not updated',
  `pwrd` varchar(255) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `code` varchar(5) NOT NULL,
  `num` bigint(11) NOT NULL,
  `dob` date NOT NULL,
  `pic` varchar(100) NOT NULL DEFAULT 'img/Profile_Picture.svg',
  `address` text NOT NULL DEFAULT 'Not updated',
  `ad2` varchar(100) NOT NULL DEFAULT 'Not updated',
  `summary` text NOT NULL DEFAULT 'Add a summary' COMMENT 'Add a summary',
  `pin` varchar(11) NOT NULL DEFAULT 'Not updated',
  `city` varchar(50) NOT NULL DEFAULT 'Not updated',
  `lang` varchar(20) NOT NULL DEFAULT 'Not updated',
  `nation` varchar(20) NOT NULL DEFAULT 'Not updated',
  `deg` varchar(255) DEFAULT 'Add your Degree',
  `uni` varchar(255) DEFAULT 'Add your University Name',
  `str` varchar(20) DEFAULT 'Add your Stream',
  `end` int(11) DEFAULT NULL,
  `start` int(11) DEFAULT NULL,
  `cgpa` float DEFAULT NULL,
  `comp` varchar(100) NOT NULL,
  `rolex` varchar(100) NOT NULL,
  `s1` int(11) NOT NULL,
  `e1` int(11) NOT NULL,
  `month1` varchar(10) NOT NULL DEFAULT 'month',
  `month2` varchar(10) NOT NULL DEFAULT 'month',
  `descx` text NOT NULL DEFAULT '\'Add a description\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `name`, `email`, `smail`, `pwrd`, `gender`, `code`, `num`, `dob`, `pic`, `address`, `ad2`, `summary`, `pin`, `city`, `lang`, `nation`, `deg`, `uni`, `str`, `end`, `start`, `cgpa`, `comp`, `rolex`, `s1`, `e1`, `month1`, `month2`, `descx`) VALUES
(84, 'Albin', '927622mca003@mkce.ac.in', '927622mca003@mkce.ac.in', 'Albin@123', 'Male', '91', 9747161424, '2000-04-17', 'images/profile/Albin09747161424.jpeg', 'm. kumarasamy college', 'thalavapalayam', '                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui voluptate non aut dolorum nemo incidunt delectus, nulla quaerat ipsum error animi neque, assumenda dicta laboriosam quidem numquam laudantium, ullam quam.', '680503', 'THrissur', 'Malayalam', 'india', 'bca', 'Christ university', 'sda', 2017, 2015, 4.5, 'TCS', 'Software Developer', 2017, 2018, 'January', 'January', 'india is my country');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
