-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 08:33 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
-- Table structure for table `addcomsub`
--

CREATE TABLE `addcomsub` (
  `cs` varchar(155) NOT NULL,
  `ssub` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addcomsub`
--

INSERT INTO `addcomsub` (`cs`, `ssub`) VALUES
('Class:four Sec:A', 'English'),
('Class:Three Sec:A', 'Bangla first');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Password`) VALUES
('admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `createclass`
--

CREATE TABLE `createclass` (
  `class_name` varchar(30) NOT NULL,
  `cnumeric` varchar(30) NOT NULL,
  `sec` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `createclass`
--

INSERT INTO `createclass` (`class_name`, `cnumeric`, `sec`) VALUES
('Two', '2', 'C'),
('Five', '5', 'B'),
('Three', '3', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `createexam`
--

CREATE TABLE `createexam` (
  `cs` varchar(155) NOT NULL,
  `ename` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `createexam`
--

INSERT INTO `createexam` (`cs`, `ename`) VALUES
('Class:Three Sec:A', 'Mid Term'),
('Class:Two Sec:C', 'Final');

-- --------------------------------------------------------

--
-- Table structure for table `createsub`
--

CREATE TABLE `createsub` (
  `sname` varchar(50) NOT NULL,
  `scode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `createsub`
--

INSERT INTO `createsub` (`sname`, `scode`) VALUES
('Bangla first', 'BAN-100'),
('English first', 'eng_22');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `S_ID` varchar(30) DEFAULT NULL,
  `Fname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `DOB` varchar(10) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `permanent_address` varchar(50) DEFAULT NULL,
  `Present_address` varchar(40) DEFAULT NULL,
  `Password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`S_ID`, `Fname`, `Lname`, `DOB`, `Gender`, `Phone`, `Email`, `permanent_address`, `Present_address`, `Password`) VALUES
('1803410201557', 'Ahasan', 'Ahasan', '1998-08-29', 'on', '01842701022', 'ahasanhossen57@gmail.com', 'Noapara', 'Nasirabad', '1557');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `sid` varchar(30) NOT NULL,
  `class` varchar(155) NOT NULL,
  `subject_name` varchar(30) NOT NULL,
  `exam` varchar(30) NOT NULL,
  `mark` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`sid`, `class`, `subject_name`, `exam`, `mark`) VALUES
('1803410201557', 'Array', 'Array', 'Array', ''),
('1803410201557', '	 Class:Three Sec:A', 'Bangla First Paper', 'First term', '22'),
('1803410201557', 'Class:four Sec:A', 'English', 'First term', '80'),
('1803410201558', '	 Class:Three Sec:A', 'Bangla First Paper', 'First term', '54');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `class` varchar(30) NOT NULL,
  `sid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`class`, `sid`) VALUES
('Class:Three Sec:A', '1803410201557');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Class` varchar(30) NOT NULL,
  `subject_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Class`, `subject_name`) VALUES
('Four', 'Bangla First Paper'),
('Four', 'English First Paper'),
('Select Class', 'English First Paper'),
('Three', 'English First Paper'),
('Two', 'Bangla First Paper');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `T_name` varchar(30) NOT NULL,
  `T_ID` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`T_name`, `T_ID`, `password`) VALUES
('Ahasan Hossen', 'T_12345', '123456'),
('Anam', 'T_12346', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_course`
--

CREATE TABLE `teacher_course` (
  `T_ID` varchar(30) NOT NULL,
  `T_name` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `subject_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_course`
--

INSERT INTO `teacher_course` (`T_ID`, `T_name`, `class`, `subject_name`) VALUES
(' T_12346', 'Anam', 'Class:Three Sec:A', 'English'),
('T_12345', 'Anam', 'Class:four Sec:A', 'English First ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcomsub`
--
ALTER TABLE `addcomsub`
  ADD UNIQUE KEY `cs` (`cs`,`ssub`);

--
-- Indexes for table `createexam`
--
ALTER TABLE `createexam`
  ADD UNIQUE KEY `cs` (`cs`,`ename`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD UNIQUE KEY `sid` (`sid`,`subject_name`,`exam`),
  ADD UNIQUE KEY `sid_2` (`sid`,`class`,`subject_name`,`exam`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`class`,`sid`),
  ADD UNIQUE KEY `class` (`class`,`sid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD UNIQUE KEY `Class` (`Class`,`subject_name`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`T_ID`);

--
-- Indexes for table `teacher_course`
--
ALTER TABLE `teacher_course`
  ADD UNIQUE KEY `T_ID` (`T_ID`,`class`,`subject_name`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
