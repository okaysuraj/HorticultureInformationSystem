-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 09:17 PM
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
-- Database: `horticulture`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `name`, `email`, `phone`, `password`) VALUES
(1, 'sk', 'Suraj Kumar', 'sk@mail', '1234', 'sk');

-- --------------------------------------------------------

--
-- Table structure for table `newtask`
--

CREATE TABLE `newtask` (
  `id` int(11) NOT NULL,
  `task` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `place` varchar(40) NOT NULL,
  `volunteer` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newtask`
--

INSERT INTO `newtask` (`id`, `task`, `date`, `place`, `volunteer`, `status`) VALUES
(1, 'Awareness of Earth Day', '2024-12-12', 'Seminar Hall', '', 0),
(2, 'Awareness of Earth Day', '2024-12-12', 'Seminar Hall', '', 0),
(3, 'Awareness of Earth Day', '2024-12-12', 'Seminar Hall', '', 0),
(4, 'Awareness of Earth Day', '2024-12-12', 'Seminar Hall', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_volunteer`
--

CREATE TABLE `task_volunteer` (
  `id` int(11) NOT NULL,
  `taskId` int(11) NOT NULL,
  `volunteerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_volunteer`
--

INSERT INTO `task_volunteer` (`id`, `taskId`, `volunteerId`) VALUES
(1, 4, 1),
(2, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `department` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`id`, `name`, `email`, `phone`, `password`, `department`) VALUES
(1, 'Rahul', 'rahul@mail', '123`', 'rahul', 'CSE'),
(2, 'Sahil', 'sahil@mail', '789', 'sahil', 'ECE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newtask`
--
ALTER TABLE `newtask`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_volunteer`
--
ALTER TABLE `task_volunteer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newtask`
--
ALTER TABLE `newtask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task_volunteer`
--
ALTER TABLE `task_volunteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
