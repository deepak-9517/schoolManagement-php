-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 01:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(20) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_fess` varchar(255) NOT NULL,
  `class_status` int(20) NOT NULL,
  `class_admin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_fess`, `class_status`, `class_admin`) VALUES
(1, 'Nursery', '500', 0, '10000'),
(2, 'L.K.G', '600', 0, '10000'),
(3, 'U.K.G', '700', 1, '10000'),
(4, '1st', '800', 1, '10000'),
(5, '2nd', '900', 1, '10000'),
(6, '3rd', '1000', 1, '10000'),
(7, '4th', '1000', 1, '10000'),
(8, '5th', '1100', 1, '10000'),
(9, '6th', '1200', 1, '10000'),
(10, '7th', '1300', 1, '10000'),
(11, '8th', '1400', 1, '13000'),
(12, '9th', '1500', 1, '10000'),
(13, '10th', '1600', 1, '10000'),
(14, '11th', '1800', 1, '10000'),
(15, '12th', '2000', 1, '10000'),
(18, 'PHP Trining', '12000', 1, '10000'),
(19, 'java Training', '20000', 1, '15000'),
(20, 'MERN Stack', '8000', 0, '10000');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(20) NOT NULL,
  `gallery_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_name`) VALUES
(1, '1706016232d.jpg,1706016232e.jpeg,1706016232f5.jpg,1706016232f6.jpg,'),
(2, '17060162441010057.jpg,1706016244a.jpg,1706016244b.jpg,');

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `labs_id` int(20) NOT NULL,
  `labs_name` varchar(255) NOT NULL,
  `labs_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`labs_id`, `labs_name`, `labs_image`) VALUES
(1, 'Computer Labs', '1706016379f4.jpg'),
(2, 'Science Lab', '1706016390science.jpg'),
(3, 'Book Library', '1706016402lab.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `user_name`, `user_pwd`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'deepu', 'ee49d65319f42e5e594c24832d81961b');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(20) NOT NULL,
  `notice_date` varchar(50) NOT NULL,
  `notice_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_date`, `notice_name`) VALUES
(1, '2024-01-06', 'Admissions for the new session 2024-25 will commence from 10th Jan 2024.'),
(2, '2024-01-13', 'Winter Vacations are from 22nd Dec 2023 to 3rd Jan 2024'),
(3, '2024-01-11', 'Pre-board practical for Class XII will start from 18-12-2023'),
(2024, '2024-01-06', 'PT-II will start from 08-12-2023 (All Classes)');

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `poster_id` int(20) NOT NULL,
  `poster_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`poster_id`, `poster_name`) VALUES
(1, '1706016191a.jpg'),
(2, '1706016205b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `query_id` int(20) NOT NULL,
  `query_name` varchar(255) NOT NULL,
  `query_email` varchar(50) NOT NULL,
  `query_subject` varchar(255) NOT NULL,
  `query_message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`query_id`, `query_name`, `query_email`, `query_subject`, `query_message`) VALUES
(3, 'deepak', 'amit@gmail.com', 'fees', 'how much php training fess');

-- --------------------------------------------------------

--
-- Table structure for table `specialclass`
--

CREATE TABLE `specialclass` (
  `special_id` int(20) NOT NULL,
  `special_name` varchar(255) NOT NULL,
  `special_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialclass`
--

INSERT INTO `specialclass` (`special_id`, `special_name`, `special_image`) VALUES
(1, 'Yoga', '1706016323yoga.jpg'),
(2, 'Happiness Class', '1706016344h.jpg'),
(3, 'Career counseling', '1706016358career.jpg'),
(4, 'Enterpreneurship class', '1706016365e.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `sports_id` int(20) NOT NULL,
  `sports_name` varchar(255) NOT NULL,
  `sports_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`sports_id`, `sports_name`, `sports_image`) VALUES
(1, 'Cricket', '1706016263cricket.jpg'),
(2, 'Volly Ball', '1706016275vollyball.jpg'),
(3, 'Batminton', '1706016292batminton.jpg'),
(4, 'Basket ball', '1706016306f5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tclass`
--

CREATE TABLE `tclass` (
  `tclass_id` int(5) NOT NULL,
  `tclass_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tclass`
--

INSERT INTO `tclass` (`tclass_id`, `tclass_name`) VALUES
(1, '10th'),
(2, '12th');

-- --------------------------------------------------------

--
-- Table structure for table `topper10`
--

CREATE TABLE `topper10` (
  `topper_id` int(20) NOT NULL,
  `topper_name` varchar(50) NOT NULL,
  `topper_class` int(20) NOT NULL,
  `topper_percentage` varchar(20) NOT NULL,
  `topper_stream` varchar(50) NOT NULL,
  `topper_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topper10`
--

INSERT INTO `topper10` (`topper_id`, `topper_name`, `topper_class`, `topper_percentage`, `topper_stream`, `topper_image`) VALUES
(1, 'ram', 1, '80', 'Maths', '1706087550gandhiji.png'),
(2, 'saksham', 1, '73', 'Science', '1706087620b.jpg'),
(4, 'jack', 2, '89', 'Science', '1706093496science.jpg'),
(5, 'Deep', 2, '97', 'Maths', '1706093522wal.jpg'),
(7, 'pooja', 1, '97', 'Science', '1706093908f2.jpg'),
(8, 'Priya', 2, '99', 'Commerce', '1706095069career.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`labs_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`poster_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `specialclass`
--
ALTER TABLE `specialclass`
  ADD PRIMARY KEY (`special_id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`sports_id`);

--
-- Indexes for table `tclass`
--
ALTER TABLE `tclass`
  ADD PRIMARY KEY (`tclass_id`);

--
-- Indexes for table `topper10`
--
ALTER TABLE `topper10`
  ADD PRIMARY KEY (`topper_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `labs_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2026;

--
-- AUTO_INCREMENT for table `poster`
--
ALTER TABLE `poster`
  MODIFY `poster_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `query_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `specialclass`
--
ALTER TABLE `specialclass`
  MODIFY `special_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `sports_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tclass`
--
ALTER TABLE `tclass`
  MODIFY `tclass_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topper10`
--
ALTER TABLE `topper10`
  MODIFY `topper_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
