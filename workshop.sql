-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 11:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `CourseCode` varchar(50) NOT NULL,
  `CourseName` varchar(200) NOT NULL,
  `CourseImg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseCode`, `CourseName`, `CourseImg`) VALUES
(1, '060223110', 'Basic Computer Skill', 'img/default.png'),
(2, '040203123', 'Discrete Mathematics App', 'img/default.png'),
(3, '060223123', 'Database System', 'img/default.png'),
(4, '080103061', 'Practical English I', 'img/default.png'),
(5, '060223113', 'Structural Programming', 'img/default.png'),
(11, '060222311', 'Code Programming', 'img/20230323051314.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `EnrollID` int(11) NOT NULL,
  `EnrollUserID` int(11) NOT NULL,
  `EnrollCourseID` int(11) NOT NULL,
  `EnrollTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`EnrollID`, `EnrollUserID`, `EnrollCourseID`, `EnrollTime`) VALUES
(34, 1044, 2, '2023-03-22 19:18:04'),
(35, 1044, 1, '2023-03-22 19:18:05'),
(36, 1044, 5, '2023-03-22 19:18:06'),
(37, 1045, 11, '2023-03-22 19:18:15'),
(38, 1045, 4, '2023-03-22 19:18:16'),
(39, 1045, 1, '2023-03-22 19:18:16'),
(40, 1045, 5, '2023-03-22 19:18:17'),
(42, 1046, 1, '2023-03-22 19:18:28'),
(43, 1046, 11, '2023-03-22 19:18:29'),
(44, 1046, 5, '2023-03-22 19:18:30'),
(46, 1047, 2, '2023-03-22 19:20:08'),
(47, 1047, 1, '2023-03-22 19:40:18'),
(48, 1047, 3, '2023-03-22 19:40:19'),
(49, 1047, 4, '2023-03-22 19:40:19'),
(50, 1047, 5, '2023-03-22 19:40:20'),
(51, 1047, 11, '2023-03-22 19:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserFname` varchar(50) NOT NULL,
  `UserLname` varchar(50) NOT NULL,
  `UUsername` varchar(50) NOT NULL,
  `UPassword` varchar(50) NOT NULL,
  `Ustatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserFname`, `UserLname`, `UUsername`, `UPassword`, `Ustatus`) VALUES
(1006, 'Theerapat', 'Katearoonrote', 'theera', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(1044, 'patsawut', 'jamjang', 'patsawut', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(1045, 'napat', 'juthairat', 'napat', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(1046, 'thanakrit', 'pramotami', 'thanakrit', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(1047, 'patchara', 'lalee', 'patchara', '827ccb0eea8a706c4c34a16891f84e7b', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`EnrollID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `EnrollID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1048;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
