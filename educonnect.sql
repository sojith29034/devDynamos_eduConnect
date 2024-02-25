-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 07:29 PM
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
-- Database: `educonnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `classschedule`
--

CREATE TABLE `classschedule` (
  `sr` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `meetDate` varchar(255) NOT NULL,
  `meetTime` varchar(255) NOT NULL,
  `meetDuration` varchar(10) NOT NULL,
  `meetTopic` varchar(5000) NOT NULL,
  `meetLink` varchar(5000) NOT NULL,
  `meetDetails` mediumtext NOT NULL,
  `userLink` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classschedule`
--

INSERT INTO `classschedule` (`sr`, `name`, `meetDate`, `meetTime`, `meetDuration`, `meetTopic`, `meetLink`, `meetDetails`, `userLink`) VALUES
(1, 'Prakash Sir', '10th February, 2024', '4:30 PM ', '60 mins', 'English', 'https://meet.google.com/yyy-woxx-wit', 'Clauses', 'https://classroom.google.com/c/NjI4OTQxMDYyMjM2?cjc=kettupi'),
(2, 'Prakash Sir', '12 February, 2024', '6:00 PM', '120 mins', 'English and Vocab', 'https://meet.google.com/abc-def-ghi', 'Verbs, adverbs, nouns and its types, tenses and its types.', 'https://classroom.google.com/c/NjI4OTQxMDYyMjM2?cjc=kettupi'),
(3, 'Ancy Maam', '19th February, 2024', '3:00 PM', '2 hrs', 'Science', 'https://meet.google.com/abc-def-ghi', 'Light and reflection, mirror and lenses and a lot more, some pre-requisites include knowledge of some basic concepts.', ''),
(8, 'Prakash Sir', '', '', '', '', 'meet.google.com/cch-dums-nvb', '', 'https://classroom.google.com/c/NjI4OTQxMDYyMjM2?cjc=kettupi');

-- --------------------------------------------------------

--
-- Table structure for table `huntstatus`
--

CREATE TABLE `huntstatus` (
  `sr` int(11) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `actID` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `comments` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `huntstatus`
--

INSERT INTO `huntstatus` (`sr`, `tname`, `actID`, `status`, `comments`) VALUES
(15, 'Vidya Prakash', 'MH/99/999', 'online', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `sr` int(5) NOT NULL,
  `uid` varchar(15) NOT NULL,
  `uname` varchar(300) NOT NULL,
  `pw` varchar(15) NOT NULL,
  `rpw` varchar(15) NOT NULL,
  `role` varchar(20) NOT NULL,
  `userLink` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`sr`, `uid`, `uname`, `pw`, `rpw`, `role`, `userLink`) VALUES
(1, 'teacher1', 'Prakash Sir', 'teacher1', 'teacher1', 'Teacher', NULL),
(2, 'teacher2', 'Ancy Maam', 'teacher2', 'teacher2', 'Teacher', 'https://classroom.google.com/c/NjYzMDM2MDI5NDY3?cjc=tjdchom'),
(3, 'student1', 'Rohan Patil', 'student1', 'student1', 'Student', ''),
(4, 'student2', 'Anjali Shukla', 'student2', 'student2', 'Student', ''),
(5, 'ngo1', 'Vidya Prakash', 'ngo1', 'ngo1', 'NGO', ''),
(6, 'ngo2', 'Pratham', 'ngo2', 'ngo2', 'NGO', ''),
(7, 'admin', 'Administrator', 'admin', '', 'Administrator', ''),
(20, 'sojith', 'Sojith Sunny', 'sojith', 'sojith', 'Teacher', NULL),
(21, 'harsh', 'Harsh', 'harsh', 'harsh', 'Teacher', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ngos`
--

CREATE TABLE `ngos` (
  `uid` varchar(50) NOT NULL,
  `uname` varchar(500) NOT NULL,
  `loc` varchar(500) NOT NULL,
  `mem_count` varchar(50) NOT NULL,
  `mission` mediumtext NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ngos`
--

INSERT INTO `ngos` (`uid`, `uname`, `loc`, `mem_count`, `mission`, `status`) VALUES
('ngo1', 'Vidya Prakash', 'ujtyrgewq', '25', 'ik6ujyr4e\\\\wqdq', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `teacherhunt`
--

CREATE TABLE `teacherhunt` (
  `sr` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `actName` varchar(255) NOT NULL,
  `actID` varchar(255) NOT NULL,
  `actDate` varchar(255) NOT NULL,
  `actLoc` varchar(5000) NOT NULL,
  `ageGroup` varchar(100) NOT NULL,
  `capacity` varchar(100) NOT NULL,
  `responsibilities` text NOT NULL,
  `exp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacherhunt`
--

INSERT INTO `teacherhunt` (`sr`, `name`, `actName`, `actID`, `actDate`, `actLoc`, `ageGroup`, `capacity`, `responsibilities`, `exp`) VALUES
(1, 'Vidya Prakash', 'Edu for All', 'MH\\23\\4567\\89', '29th Fubruary, 2024', 'Sundrabai School, Wadgaonsheri, Pune-411007', 'High School', '28 students', 'Teach math and english', 'Scholar'),
(2, 'Vidya Prakash', 'Math Classes', 'MH/99/999', '11th feb 2024', 'Panvel', '15 yrs', '20 students', 'xyz', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `uid` varchar(20) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `sex` set('Male','Female') NOT NULL,
  `qualifications` mediumtext NOT NULL,
  `qualFile` varchar(500) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `past` mediumtext NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`uid`, `uname`, `sex`, `qualifications`, `qualFile`, `subject`, `past`, `status`) VALUES
('sojith', 'Sojith Sunny', 'Male', 'B.E in Computer Science', '../assets/qualifications/pdf.pdf', 'Mathematics', 'Statistics and Mathematics', 'Rejected'),
('teacher1', 'Prakash Sir', 'Male', 'M. Tech', '../assets/qualifications/download (1).pdf', 'Mathematics, Physics', 'Automated C Code Parallelizer, Parallelizing PARM', 'Approved'),
('teacher2', 'Ancy Maam', 'Female', 'Ph.D', '../assets/qualifications/certi.pdf', 'Quantum Mechanics', 'A new approach to Video Compression', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classschedule`
--
ALTER TABLE `classschedule`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `huntstatus`
--
ALTER TABLE `huntstatus`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `ngos`
--
ALTER TABLE `ngos`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `teacherhunt`
--
ALTER TABLE `teacherhunt`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classschedule`
--
ALTER TABLE `classschedule`
  MODIFY `sr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `huntstatus`
--
ALTER TABLE `huntstatus`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `sr` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teacherhunt`
--
ALTER TABLE `teacherhunt`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
