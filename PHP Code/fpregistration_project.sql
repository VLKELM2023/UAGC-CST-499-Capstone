-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 12:46 AM
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
-- Database: `registration_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` int(11) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `enrolledStudents` text DEFAULT NULL,
  `maxEnrollment` int(11) NOT NULL,
  `numEnrolled` int(11) NOT NULL,
  `waitingList` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `semester`, `enrolledStudents`, `maxEnrollment`, `numEnrolled`, `waitingList`) VALUES
(1, 'CST 499 Capstone CST', 'Winter', NULL, 5, 0, 0),
(2, 'CST 310 Software Development', 'Fall', NULL, 5, 1, 0),
(3, 'CST 304 Software Requirements', 'Summer', NULL, 5, 0, 0),
(4, 'CST 313 Software Testing', 'Fall', NULL, 5, 1, 0),
(5, 'CST 316 Information Security Management', 'Spring', NULL, 5, 0, 0),
(6, 'CST 307 Software Architecture & Design', 'Spring', NULL, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userType` enum('Student','Administrator') NOT NULL,
  `enrolledCourses` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `email`, `password`, `firstName`, `lastName`, `userType`, `enrolledCourses`) VALUES
(1, 'vicki.kelm@admin.edu', 'Admin1', 'Vicki', 'Kelm', 'Administrator', NULL),
(2, 'vicki.kelm@student.uagc.edu', 'Password1', 'Vicki', 'Kelm', 'Student', NULL),
(3, 'dad@home.com', 'Password1', 'Richard', 'Kelm', 'Student', 'CST 310 Software Development,CST 313 Software Testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
