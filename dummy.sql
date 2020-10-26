-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2020 at 09:19 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dummy`
--

-- --------------------------------------------------------

--
-- Table structure for table `marks_`
--

CREATE TABLE `marks_` (
  `stud_id` int(10) NOT NULL,
  `sub_id` int(6) NOT NULL,
  `ay` varchar(7) NOT NULL,
  `ia1` float NOT NULL,
  `ia2` float NOT NULL,
  `q1` int(1) NOT NULL,
  `q2` int(1) NOT NULL,
  `q3` int(1) NOT NULL,
  `q4` int(1) NOT NULL,
  `a1` int(1) NOT NULL,
  `a2` int(1) NOT NULL,
  `a3` int(1) NOT NULL,
  `a4` int(1) NOT NULL,
  `e1` float NOT NULL,
  `e2` float NOT NULL,
  `e3` float NOT NULL,
  `e4` float NOT NULL,
  `e5` float NOT NULL,
  `e6` float NOT NULL,
  `e7` float NOT NULL,
  `e8` float NOT NULL,
  `e9` float NOT NULL,
  `e10` float NOT NULL,
  `mp` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks_`
--

INSERT INTO `marks_` (`stud_id`, `sub_id`, `ay`, `ia1`, `ia2`, `q1`, `q2`, `q3`, `q4`, `a1`, `a2`, `a3`, `a4`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `e7`, `e8`, `e9`, `e10`, `mp`) VALUES
(182124101, 3, '2018-19', 10, 20, 4, 4, 5, 5, 5, 4, 3, 5, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(10) NOT NULL,
  `stud_nm` varchar(40) NOT NULL,
  `stud_rollno` int(2) NOT NULL,
  `e_year` text NOT NULL,
  `department` varchar(50) NOT NULL,
  `sem` varchar(13) NOT NULL,
  `ay` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_nm`, `stud_rollno`, `e_year`, `department`, `sem`, `ay`) VALUES
(180000000, 'Menon Shikamaru c', 38, 'TE', 'Istrumentation Engineering', 'Semester V', '2019-20'),
(180000001, 'Memon Temari S', 37, 'TE', 'Istrumentation Engineering', 'Semester V', '2019-20'),
(182104102, 'Mohite Aakanksha Ramesh', 36, 'SE', 'Information Technology', 'Semester IV', '2019-20'),
(182124100, 'Menon Abhineet Chandramohan', 35, 'FE', 'Information Technology', 'Semester II', '2019-20'),
(182124101, 'Khator Dhruv Ramakant', 26, 'SE', 'Information Technology', 'Semester III', '2018-19'),
(182124102, 'Prajapati Dhru Narendra', 43, 'SE', 'Information Technology', 'Semester III', '2019-20'),
(182134859, 'Uchiha Sasuke Fugaku', 70, 'BE', 'Mechanical Engineering', 'Semester VII', '2018-19'),
(182135890, 'Uzumaki Naruto Minato', 72, 'TE', 'Computer Engineering', 'Semester VI', '2018-19'),
(182343342, 'Uzumaki Boruto Naruto', 72, 'FE', 'Electronics and Telecommunications Engineering', 'Semester I', '2019-20'),
(182434343, 'Uchiha Sarada Sasuke', 71, 'FE', 'Civil Engineering', 'Semester I', '2019-20'),
(182458392, 'Odinson Thor Odin', 39, 'BE', 'Instrumentation Engineering', 'Semester VIII', '2019-20');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(6) NOT NULL,
  `sub_code` int(6) NOT NULL,
  `sub_nm` varchar(40) NOT NULL,
  `sem` varchar(13) NOT NULL,
  `e_year` varchar(2) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `ay` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_code`, `sub_nm`, `sem`, `e_year`, `dept`, `ay`) VALUES
(1, 52346, 'Applied Mathematics I(INFT)', 'Semester I', 'FE', 'Information Technology', '2018-19'),
(2, 13254, 'Applied Mathematics II', 'Semester II', 'FE', 'Information Technology', '2018-19'),
(3, 12553, 'Applied Mathematics III', 'Semester III', 'SE', 'Information Technology', '2018-19'),
(4, 15656, 'Applied Mathematics IV', 'Semester IV', 'SE', 'Information Technology', '2018-19'),
(5, 56523, 'Internet Programming', 'Semester V', 'TE', 'Information Technology', '2018-19'),
(6, 75984, 'Data Mining and Business Intelligence', 'Semester VI', 'TE', 'Information Technology', '2018-19'),
(7, 65497, 'Artificial Intelligence', 'Semester VII', 'BE', 'Information Technology', '2018-19'),
(8, 65595, 'Big Data Analysis', 'Semester VIII', 'BE', 'Information Technology', '2018-19'),
(9, 52346, 'Applied Mathematics I', 'Semester I', 'FE', 'Computer Engineering', '2018-19'),
(10, 13254, 'Applied Mathematics II (CS)', 'Semester II', 'FE', 'Computer Engineering', '2018-19'),
(11, 65428, 'Data Structures ', 'Semester III', 'SE', 'Computer Engineering', '2018-19'),
(12, 89759, 'Analysis of Algorithm', 'Semester IV', 'SE', 'Computer Engineering', '2018-19'),
(13, 78948, 'Database Management System (CS) ', 'Semester V', 'TE', 'Computer Engineering', '2018-19'),
(14, 42378, 'Software Engineering', 'Semester VI', 'TE', 'Computer Engineering', '2018-19'),
(15, 97487, 'Digital Signal and Image Processing', 'Semester VII', 'BE', 'Computer Engineering', '2018-19'),
(16, 79825, 'Data Warehouse and Mining)', 'Semester VIII', 'BE', 'Computer Engineering', '2018-19'),
(17, 52346, 'Applied Mathematics I', 'Semester I', 'FE', 'Electronics And Telecommunications Engineering', '2018-19'),
(18, 13254, 'Applied Mathematics II (EXTC)', 'Semester II', 'FE', 'Electronics And Telecommunications Engineering', '2018-19'),
(19, 65484, 'Applied Mathematics III (EXTC)', 'Semester III', 'SE', 'Electronics And Telecommunications Engineering', '2018-19'),
(20, 79283, 'Applied Mathematics IV (EXTC)', 'Semester IV', 'SE', 'Electronics And Telecommunications Engineering', '2018-19'),
(21, 49782, 'Digital Communication', 'Semester V', 'TE', 'Electronics And Telecommunications Engineering', '2018-19'),
(22, 73216, 'Microcontrollers and Applications', 'Semester VI', 'TE', 'Electronics And Telecommunications Engineering', '2018-19'),
(23, 78948, 'Microwave Engineering', 'Semester VII', 'BE', 'Electronics And Telecommunications Engineering', '2018-19'),
(24, 22123, 'Wireless Networks', 'Semester VIII', 'BE', 'Electronics And Telecommunications Engineering', '2018-19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `teacher_id` varchar(10) NOT NULL,
  `honorifics` varchar(6) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `login_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`teacher_id`, `honorifics`, `u_name`, `username`, `password`, `login_status`) VALUES
('IT11111', 'Prof.', 'Yogesh Pingle', 'yogesh.pingle', '25d55ad283aa400af464c76d713c07ad', 'Logged In');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks_`
--
ALTER TABLE `marks_`
  ADD UNIQUE KEY `stud_id` (`stud_id`,`sub_id`) USING BTREE,
  ADD KEY `fk_sub_id` (`sub_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks_`
--
ALTER TABLE `marks_`
  ADD CONSTRAINT `fk_stud_id` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`),
  ADD CONSTRAINT `fk_sub_id` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
