-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 04:35 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ultimategym`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `member_id`, `attendance_date`, `attendance_time`) VALUES
(1, 37, '2018-03-13', '16:20:11'),
(2, 35, '2018-03-13', '03:04:41'),
(3, 35, '2018-03-14', '03:06:21'),
(4, 34, '2018-03-13', '03:13:02'),
(5, 38, '2018-03-13', '03:56:07'),
(6, 36, '2018-03-13', '04:18:35'),
(7, 36, '2018-03-14', '03:18:48'),
(8, 31, '2018-03-15', '04:24:03'),
(9, 35, '2018-03-15', '10:16:43'),
(10, 34, '2018-03-16', '09:02:21'),
(12, 39, '2018-03-21', '01:53:51'),
(16, 39, '2018-03-19', '03:17:16'),
(17, 34, '2018-03-19', '03:19:50'),
(18, 37, '2018-03-19', '03:21:07'),
(19, 35, '2018-03-19', '03:21:21'),
(20, 39, '2018-03-20', '03:22:45'),
(21, 35, '2018-03-20', '03:22:52'),
(22, 31, '2018-03-19', '04:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(11) NOT NULL,
  `home_announcement` text NOT NULL,
  `home_announcement_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`home_id`, `home_announcement`, `home_announcement_datetime`) VALUES
(16, 'The bench press area is currently under maintenance. We are sorry for the inconvenience.', '2018-03-05 03:05:15'),
(18, 'Found an iPhone X in the shower room. If this is yours, please contact the staff to guide you.', '2018-03-13 04:01:51'),
(19, 'The gym will be closed tomorrow due to a gas leakage. We are sorry for the inconvenience.', '2018-03-13 11:54:18'),
(20, 'The gym will be closed tomorrow due to a gas leakage. We are sorry for the inconvenience.', '2018-03-21 01:53:18'),
(21, 'Test announcement', '2018-03-21 01:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_fname` varchar(100) NOT NULL,
  `member_lname` varchar(100) NOT NULL,
  `member_password` varchar(100) NOT NULL,
  `member_bdate` date NOT NULL,
  `member_age` int(11) NOT NULL,
  `member_sex` enum('Male','Female') NOT NULL,
  `member_address` varchar(200) NOT NULL,
  `member_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_fname`, `member_lname`, `member_password`, `member_bdate`, `member_age`, `member_sex`, `member_address`, `member_email`) VALUES
(31, 'Justeeen', 'Manigo', '202cb962ac59075b964b07152d234b70', '1998-01-30', 20, 'Male', 'Baybay, Leyte, Visayas Region XIII', 'justin@gmail.com'),
(34, 'Mar', 'Manuel', '202cb962ac59075b964b07152d234b70', '1998-11-13', 19, 'Female', 'Forest Hills, Banawa', 'mar@gmail.com'),
(35, 'Joshua', 'Verano', '202cb962ac59075b964b07152d234b70', '1997-11-27', 20, 'Male', 'Mandaue City', 'joshua@gmail.com'),
(36, 'Christian', 'Vargan', '202cb962ac59075b964b07152d234b70', '1998-05-05', 19, 'Male', 'Talamban', 'chris@gmail.com'),
(37, 'Andrew', 'Edioma', '202cb962ac59075b964b07152d234b70', '1997-11-02', 20, 'Male', 'Gandhi, India', 'andrew@gmail.com'),
(38, 'Joji', 'Shiotsuki', '202cb962ac59075b964b07152d234b70', '1997-05-25', 20, 'Male', 'Pahak, Nagoya, Lapu-Lapu', 'joji@gmail.com'),
(39, 'Don', 'Singh', '202cb962ac59075b964b07152d234b70', '1993-08-07', 24, 'Male', 'Leyte', 'don@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `payment_status` enum('PAID','UNPAID') NOT NULL DEFAULT 'UNPAID',
  `payment_validity` date NOT NULL,
  `payment_days_left` int(11) NOT NULL DEFAULT '0',
  `payment_datetracker` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `member_id`, `payment_status`, `payment_validity`, `payment_days_left`, `payment_datetracker`) VALUES
(34, 35, 'PAID', '2021-03-08', 829, '2018-03-19'),
(36, 31, 'PAID', '2019-03-13', 150, '2018-03-15'),
(38, 34, 'PAID', '2019-03-14', 115, '2018-03-18'),
(39, 36, 'PAID', '2019-03-14', 30, '2018-03-14'),
(40, 37, 'PAID', '2020-03-08', 210, '2018-03-14'),
(41, 38, 'PAID', '2020-03-13', 120, '2018-03-21'),
(42, 39, 'PAID', '2019-03-19', 86, '2018-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `profit`
--

CREATE TABLE `profit` (
  `profit_id` int(11) NOT NULL,
  `profit_date` date NOT NULL,
  `profit_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profit`
--

INSERT INTO `profit` (`profit_id`, `profit_date`, `profit_amount`) VALUES
(2, '2018-03-11', 800),
(3, '2018-03-12', 1000),
(4, '2018-03-13', 3800),
(5, '2018-03-14', 6400),
(6, '2018-03-15', 1600),
(7, '2018-03-16', 3200),
(8, '2018-03-18', 1600),
(9, '2018-03-19', 2400),
(10, '2018-03-21', 1600);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_name` text NOT NULL,
  `program_number` int(11) NOT NULL,
  `program_day1` text NOT NULL,
  `program_day2` text NOT NULL,
  `program_day3` text NOT NULL,
  `program_day4` text NOT NULL,
  `program_day5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_name`, `program_number`, `program_day1`, `program_day2`, `program_day3`, `program_day4`, `program_day5`) VALUES
('bulking', 1, 'Dumbbell Press', 'Dumbbell Curls', 'Pull-ups', 'Pull-ups', 'Squats'),
('bulking', 2, 'Dips', 'Barbell Curls', 'One Arm Pull-ups', 'One Arm Pull-ups', 'Lunges'),
('bulking', 3, 'Inclined Bench Press', 'One-arm Tricep Lift', 'Deadlift', 'Deadlift', 'Leg Press Machine'),
('bulking', 4, 'Push-ups', 'Rope Pull', 'Dumbbell Pull-ups', 'Dumbbell Pull-ups', 'Sit ups'),
('bulking', 5, 'Declined Bench Press', 'Lateral Push Down', 'Jumping Jacks', 'Jumping Jacks', 'Crunches'),
('cutting', 6, 'Dumbbell Press', 'Normal Exercise', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press'),
('cutting', 7, 'Dips', 'Hard Exercise', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press'),
('cutting', 8, 'Inclined Bench Press', 'Cardio Exercise', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press'),
('cutting', 9, 'Push-ups', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press'),
('cutting', 10, 'Declined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press'),
('cardio', 11, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Squats'),
('cardio', 12, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Lunges'),
('cardio', 13, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Leg Press Machine'),
('cardio', 14, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Sit ups'),
('cardio', 15, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Crunches'),
('closecombat', 16, 'voyak', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Squats'),
('closecombat', 17, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Lunges'),
('closecombat', 18, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Leg Press Machine'),
('closecombat', 19, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Sit ups'),
('closecombat', 20, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Crunches');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `progress_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `progress_1` int(11) NOT NULL,
  `progress_2` int(11) NOT NULL,
  `progress_3` int(11) NOT NULL,
  `progress_4` int(11) NOT NULL,
  `progress_5` int(11) NOT NULL,
  `progress_6` int(11) NOT NULL,
  `progress_7` int(11) NOT NULL,
  `progress_8` int(11) NOT NULL,
  `progress_9` int(11) NOT NULL,
  `progress_10` int(11) NOT NULL,
  `progress_11` int(11) NOT NULL,
  `progress_12` int(11) NOT NULL,
  `progress_1month` date NOT NULL,
  `progress_2month` date NOT NULL,
  `progress_3month` date NOT NULL,
  `progress_4month` date NOT NULL,
  `progress_5month` date NOT NULL,
  `progress_6month` date NOT NULL,
  `progress_7month` date NOT NULL,
  `progress_8month` date NOT NULL,
  `progress_9month` date NOT NULL,
  `progress_10month` date NOT NULL,
  `progress_11month` date NOT NULL,
  `progress_12month` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`progress_id`, `member_id`, `progress_1`, `progress_2`, `progress_3`, `progress_4`, `progress_5`, `progress_6`, `progress_7`, `progress_8`, `progress_9`, `progress_10`, `progress_11`, `progress_12`, `progress_1month`, `progress_2month`, `progress_3month`, `progress_4month`, `progress_5month`, `progress_6month`, `progress_7month`, `progress_8month`, `progress_9month`, `progress_10month`, `progress_11month`, `progress_12month`) VALUES
(10, 35, 32, 150, 123, 165, 140, 100, 65, 0, 0, 0, 0, 0, '2018-03-08', '2018-03-08', '2018-03-08', '2018-03-08', '2018-03-12', '2018-03-13', '2018-03-14', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(11, 37, 100, 120, 120, 100, 300, 250, 999, 0, 0, 0, 0, 0, '0000-00-00', '2018-03-08', '2018-03-08', '2018-03-08', '2018-03-08', '2018-03-08', '2018-03-13', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(12, 38, 92, 93, 95, 90, 91, 97, 0, 0, 0, 0, 0, 0, '2018-03-13', '2018-03-13', '2018-03-13', '2018-03-13', '2018-03-13', '2018-03-13', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(13, 36, 90, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-03-14', '2018-03-14', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(14, 31, 80, 100, 120, 80, 0, 0, 0, 0, 0, 0, 0, 0, '2018-03-15', '2018-03-15', '2018-03-15', '2018-03-15', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(15, 34, 19, 55, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-03-18', '2018-03-18', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(16, 39, 85, 82, 80, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-03-20', '2018-03-21', '2018-03-21', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `attendance_member` (`member_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_member_payment` (`member_id`);

--
-- Indexes for table `profit`
--
ALTER TABLE `profit`
  ADD PRIMARY KEY (`profit_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_number`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progress_id`),
  ADD KEY `progress_member` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `profit`
--
ALTER TABLE `profit`
  MODIFY `profit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_member_payment` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
