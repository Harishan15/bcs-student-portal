-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2019 at 01:27 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcs_student_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_id` int(20) NOT NULL,
  `s_id` int(20) NOT NULL,
  `a_id` int(20) NOT NULL,
  `app_date` varchar(20) DEFAULT NULL,
  `app_time` varchar(20) DEFAULT NULL,
  `app_venue` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `authenticator`
--

CREATE TABLE `authenticator` (
  `a_id` int(20) NOT NULL,
  `a_nic` varchar(20) DEFAULT NULL,
  `a_sname` varchar(50) DEFAULT NULL,
  `a_fname` varchar(50) DEFAULT NULL,
  `a_phone` varchar(20) DEFAULT NULL,
  `a_email` varchar(50) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `employer` varchar(20) DEFAULT NULL,
  `h_qual` varchar(20) DEFAULT NULL,
  `experience` varchar(500) DEFAULT NULL,
  `a_password` varchar(20) NOT NULL,
  `a_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authenticator`
--

INSERT INTO `authenticator` (`a_id`, `a_nic`, `a_sname`, `a_fname`, `a_phone`, `a_email`, `title`, `designation`, `employer`, `h_qual`, `experience`, `a_password`, `a_status`) VALUES
(28, '1111111', 'Prabath', 'Chamika', '', 'chamika@gmail.com', 'Mr.', 'Software Developer', 'Casterly Crown', 'BCS PGD', 'Highly skilled in designing, testing, and developing software\r\nThorough understanding of data structures and algorithms\r\nKnowledgeable of back-end development best practices\r\nHands-on software troubleshooting experience\r\nProven track record of proper documentation for future maintenance and upgrades', 'test123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `d_id` int(20) NOT NULL,
  `docnm` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`d_id`, `docnm`) VALUES
(1, 'proposal'),
(2, 'initial'),
(3, 'intro-1'),
(4, 'analyze-2'),
(5, 'design-3'),
(6, 'implement-4'),
(7, 'testing-5'),
(8, 'critical-6'),
(9, 'final-section'),
(10, 'final-report');

-- --------------------------------------------------------

--
-- Table structure for table `document_sub`
--

CREATE TABLE `document_sub` (
  `d_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `p_id` int(10) NOT NULL,
  `subyear` varchar(10) DEFAULT NULL,
  `submonth` varchar(10) DEFAULT NULL,
  `p_title` varchar(50) DEFAULT NULL,
  `p_level` varchar(10) DEFAULT NULL,
  `attempt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(20) NOT NULL,
  `s_nic` varchar(20) DEFAULT NULL,
  `s_sname` varchar(50) DEFAULT NULL,
  `s_fname` varchar(50) DEFAULT NULL,
  `s_phone` varchar(20) DEFAULT NULL,
  `s_email` varchar(50) DEFAULT NULL,
  `matrix_no` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `s_password` varchar(20) NOT NULL,
  `s_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_nic`, `s_sname`, `s_fname`, `s_phone`, `s_email`, `matrix_no`, `gender`, `s_password`, `s_status`) VALUES
(76, '001', '', 'Basith', '', 'basith@gmail.com', '001', 'male', 'test123', 1),
(77, '002', '', 'Harishan', '', 'harishan@gmail.com', '002', 'male', 'test123', 1),
(78, '003', '', 'Nethuni', '', 'nethuni@gmail.com', '003', 'female', 'test123', 1),
(79, '004', '', 'Andrew', '', 'andrew@gmail.com', '004', 'female', 'test123', 1),
(80, '005', '', 'Lakdhi', '', 'lakdhi@gmail.com', '', 'female', 'test123', 1),
(81, '006', '', 'Devaka', '', 'devaka@gmail.com', '', 'female', 'test123', 1),
(82, '007', '', 'Nafan', '', 'nafan@gmail.com', '', 'female', 'test123', 1),
(83, '008', '', 'Thiru', '', 'thiru@gmail.com', '', 'female', 'test123', 1),
(84, '009', '', 'Prabasha', '', 'prabasha@gmail.com', '', 'female', 'test123', 1),
(85, '010', '', 'piusha', '', 'piusha@gmail.com', '', 'female', 'test123', 1),
(86, '011', 'Ahamed', 'Jahzan', '', 'jahzan@gmail.com', '', 'female', 'test123', 1),
(87, '012', '', 'Thevin', '', 'thevin@gmail.com', '', 'female', 'test123', 1),
(88, '013', '', 'Himansa', '', 'himansa@gmail.com', '', 'female', 'test123', 1),
(89, '014', '', 'Vidu', '', 'vidu@gmail.com', '', 'female', 'test123', 1),
(90, '015', '', 'Sanjula', '', 'sanjula@gmail.com', '', 'female', 'test123', 1),
(91, '016', '', 'Stefan', '', 'stefan@gmail.com', '', 'female', 'test123', 1),
(92, '00000000000', 'Rajapaksha', 'Mahinda', '0766289350', 'mahinda@gmail.com', '34567', 'male', 'test123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_authenticator`
--

CREATE TABLE `student_authenticator` (
  `d_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `s_id` int(10) NOT NULL,
  `a_id` int(10) NOT NULL,
  `approval` tinyint(1) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `stud_reply` varchar(500) NOT NULL,
  `auth_approval` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_document`
--

CREATE TABLE `student_document` (
  `d_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `s_id` int(10) NOT NULL,
  `sub_date` date DEFAULT NULL,
  `doc_path` varchar(100) DEFAULT NULL,
  `bcs_approval` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_id`,`s_id`,`a_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `authenticator`
--
ALTER TABLE `authenticator`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `document_sub`
--
ALTER TABLE `document_sub`
  ADD PRIMARY KEY (`d_id`,`p_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_authenticator`
--
ALTER TABLE `student_authenticator`
  ADD PRIMARY KEY (`d_id`,`p_id`,`s_id`,`a_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `student_document`
--
ALTER TABLE `student_document`
  ADD PRIMARY KEY (`d_id`,`p_id`,`s_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `s_id` (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `authenticator`
--
ALTER TABLE `authenticator`
  MODIFY `a_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `d_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `authenticator` (`a_id`);

--
-- Constraints for table `document_sub`
--
ALTER TABLE `document_sub`
  ADD CONSTRAINT `document_sub_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `document` (`d_id`),
  ADD CONSTRAINT `document_sub_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `project` (`p_id`);

--
-- Constraints for table `student_authenticator`
--
ALTER TABLE `student_authenticator`
  ADD CONSTRAINT `student_authenticator_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `document` (`d_id`),
  ADD CONSTRAINT `student_authenticator_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `project` (`p_id`),
  ADD CONSTRAINT `student_authenticator_ibfk_3` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `student_authenticator_ibfk_4` FOREIGN KEY (`a_id`) REFERENCES `authenticator` (`a_id`);

--
-- Constraints for table `student_document`
--
ALTER TABLE `student_document`
  ADD CONSTRAINT `student_document_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `document` (`d_id`),
  ADD CONSTRAINT `student_document_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `project` (`p_id`),
  ADD CONSTRAINT `student_document_ibfk_3` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
