-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2016 at 05:02 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blackboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(3) NOT NULL,
  `adminname` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `adminmail` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `password`, `adminmail`) VALUES
(1, 'admin', 'black', 'yash@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class` int(5) NOT NULL,
  `courseid` varchar(5) NOT NULL,
  `coursename` varchar(20) DEFAULT NULL,
  `courseschedule` varchar(20) DEFAULT NULL,
  `teacherid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class`, `courseid`, `coursename`, `courseschedule`, `teacherid`) VALUES
(1, 'M1', 'Mathematics', '10-12a.m', 'T0006'),
(2, 'ENG', 'English', '9-10.30a.m', 'T0008'),
(3, 'M1', 'Mathematics', '9-10.30a.m', 'T0008'),
(4, 'ENG', 'English', '3-4pm', 'T0001'),
(5, 'ENG', 'English', '10.-11am', 'T0002'),
(5, 'M1', 'Maths', '1-2.30pm', 'T0008'),
(6, 'ENG', 'English', '7-8am', 'T0002'),
(7, 'M1', 'Mathematics', '1-2.30p.m', 'T0001'),
(9, 'M1', 'Mathematics', '9- 10.30a.m', 'T0001'),
(9, 'Sc', 'Science', '3-4pm', 'T0004'),
(10, 'PHY', 'Physics', '3-4pm', 'T0002'),
(11, 'BIO', 'Biology', '12-1.30pm', 'T0003'),
(12, 'M1', 'Mathematics', '1-2pm', 'T0001');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parentid` varchar(5) NOT NULL,
  `studentid` varchar(5) NOT NULL,
  `mailid` varchar(30) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `phone` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentid`, `studentid`, `mailid`, `password`, `phone`) VALUES
('P0001', 'S0001', 'srinu@gmail.com', 'bsrinu', 966332255);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` varchar(5) NOT NULL,
  `sname` varchar(40) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `sex` char(2) DEFAULT NULL,
  `bloodgroup` char(3) DEFAULT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `fathername` varchar(40) DEFAULT NULL,
  `mothername` varchar(40) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `class` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `sname`, `dateofbirth`, `sex`, `bloodgroup`, `phone`, `email`, `password`, `fathername`, `mothername`, `address`, `class`) VALUES
('S0001', 'Manju', '1993-02-23', 'F', 'O+', 8374650355, 'manju@gmail.com', 'bmanju', 'srinu', 'rani', 'D.no 42/8, Indianapolis', 9),
('S0002', 'Paul John', '2010-06-08', 'M', 'AB-', 3179093643, 'john@gmail.com', 'bjohn', 'Jack john', 'Jannie John', '729 W, 10 st, IN', 5),
('S0003', 'James Bolen', '1993-10-10', 'M', 'O+', 3175454867, 'james@stu.edu', 'bjames', 'Gary Bolen', 'Misty Bolen', '5465 Modesto Lane, In', 12);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherid` varchar(5) NOT NULL,
  `teachername` varchar(40) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `bloodgroup` char(3) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` bigint(15) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherid`, `teachername`, `dateofbirth`, `sex`, `bloodgroup`, `address`, `phone`, `email`, `password`) VALUES
('T0001', 'Mary', '1990-12-09', 'F', 'A+', 'Ln St, IN', 44444444, 'mary@gmail.com', 'bmary'),
('T0002', 'James', '1990-02-02', 'M', 'A+', '35 W st, IN', 8595857999, 'james@sch.edu', 'bjames'),
('T0003', 'Marie', '1985-12-12', 'F', 'B-', '3374 Modesto lane', 9874563212, 'marie@gmail.com', 'bmarie'),
('T0004', 'sample', '2016-07-07', 'F', 'B1', 'asfhdjbfasdjhk', 123231232, 'asdjfb@kj.com', 'bsample'),
('T0005', 'Alexa', '1990-02-02', 'F', 'O+', 'Modesto Lane, IN', 3176589586, 'alexa@stu.edu', 'balexa'),
('T0006', 'Alex', '1990-01-01', 'M', 'B+', 'New York St, 425, IN', 5684758956, 'alex@stu.edu', 'balex'),
('T0007', 'Brad', '0000-00-00', 'M', 'AB+', '56 W Denver St, IN', 3175897569, 'brad@stu.edu', 'bbrad'),
('T0008', 'West', '1974-02-13', 'M', 'AB-', '89 N Washington St, IN', 3175895445, 'west@stu.edu', 'bwest');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `documentid` int(10) NOT NULL,
  `class` int(5) DEFAULT NULL,
  `courseid` varchar(5) DEFAULT NULL,
  `teacherid` varchar(5) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`documentid`, `class`, `courseid`, `teacherid`, `category`, `location`) VALUES
(1, 9, 'M1', 'T0001', 'Materials', '../uploads/Maths Syllabus.doc'),
(2, 5, 'M1', 'T0001', 'Materials', '../uploads/Maths1.txt.txt');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(5) NOT NULL,
  `password` varchar(15) DEFAULT NULL,
  `accounttype` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `password`, `accounttype`) VALUES
('P0001', 'bsrinu', 'parent'),
('S0001', 'bmanju', 'student'),
('S0003', 'bjames', 'student'),
('T0001', 'bmary', 'teacher'),
('T0003', 'bmarie', 'teacher'),
('T0004', 'bsurendra', 'teacher'),
('T0005', 'balexa', 'teacher'),
('T0006', 'balex', 'teacher'),
('T0007', 'bbrad', 'teacher'),
('T0008', 'bwest', 'teacher'),
('T0009', 'bkelly', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class`,`courseid`),
  ADD KEY `teacherid` (`teacherid`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentid`,`studentid`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherid`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`documentid`),
  ADD KEY `class` (`class`,`courseid`),
  ADD KEY `teacherid` (`teacherid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `documentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`teacherid`) ON DELETE SET NULL;

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`class`) REFERENCES `classes` (`class`) ON DELETE SET NULL;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`class`,`courseid`) REFERENCES `classes` (`class`, `courseid`) ON DELETE SET NULL,
  ADD CONSTRAINT `uploads_ibfk_2` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`teacherid`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
