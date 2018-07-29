-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 06:02 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(50) NOT NULL,
  `admin_name` varchar(25) NOT NULL,
  `admin_psswd` varchar(50) NOT NULL,
  `master_yes_or_no` char(4) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `pic_status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `admin_name`, `admin_psswd`, `master_yes_or_no`, `email`, `contact`, `pic_status`) VALUES
(1, 'admin', 'Mohit Chandra Joshi', 'admin', 'Y', '', '', 1),
(3, 'mansi123', 'Mansi Dogra', 'mansi123', '', 'mansidogra@gmail.com', '9639452443', 0);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ans_id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `test_id` varchar(20) DEFAULT NULL,
  `que_id` varchar(30) DEFAULT NULL,
  `correct_ans` char(30) DEFAULT NULL,
  `user_ans` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ans_id`, `user_id`, `test_id`, `que_id`, `correct_ans`, `user_ans`) VALUES
(1, 'mj74518', 'Quiz20180405', '6', 'horizontal partition', 'horizontal partition'),
(2, 'mj74518', 'Quiz20180405', '7', 'all of above', 'constant value'),
(3, 'mansirawat', 'Quiz20180405', '6', 'horizontal partition', 'insert partition'),
(4, 'mansirawat', 'Quiz12320180418', '8', 'Both of above', 'Both of above'),
(5, 'mansirawat', 'Quiz12320180418', '9', 'modulus', 'bitwise or'),
(6, 'mansirawat', 'Quiz12320180418', '11', 'require()', 'None of above'),
(7, 'mansirawat', 'Quiz12320180418', '12', 'Using strcmp()', 'Using strcasecmp()'),
(8, 'mansirawat', 'Quiz12320180418', '13', 'include()', 'include[]'),
(9, 'mansirawat', 'Quiz12320180418', '14', '23', '320dollars'),
(10, 'mansirawat', 'Quiz12320180418', '15', '$number-in-class', '$nic');

-- --------------------------------------------------------

--
-- Table structure for table `at_unat_ques`
--

CREATE TABLE `at_unat_ques` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `test_id` varchar(30) NOT NULL,
  `attempted` int(11) NOT NULL,
  `unattempted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `at_unat_ques`
--

INSERT INTO `at_unat_ques` (`id`, `user_id`, `test_id`, `attempted`, `unattempted`) VALUES
(1, 'mj74518', 'Quiz20180405', 2, 0),
(2, 'mansirawat', 'Quiz20180405', 1, 1),
(3, 'mansirawat', 'Quiz12320180418', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(4) NOT NULL,
  `course_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
('B.Co', 'B.Com'),
('B.Ed', 'B.Ed'),
('B.Sc', 'B.Sc'),
('B.Te', 'B.Tech'),
('BBA2', 'BBA'),
('BCA2', 'BCA'),
('H.M2', 'H.M'),
('MCA2', 'MCA'),
('Poly', 'Polytechnic');

-- --------------------------------------------------------

--
-- Table structure for table `education_qualification`
--

CREATE TABLE `education_qualification` (
  `edu_id` int(11) NOT NULL,
  `edu_name` varchar(30) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `year_of_passing` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education_qualification`
--

INSERT INTO `education_qualification` (`edu_id`, `edu_name`, `user_id`, `year_of_passing`) VALUES
(1, 'Graduate', 'mj74518', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `que_id` int(5) NOT NULL,
  `s_no` int(11) NOT NULL,
  `test_id` varchar(20) DEFAULT NULL,
  `quiz_ques` varchar(150) DEFAULT NULL,
  `ans1` varchar(75) DEFAULT NULL,
  `ans2` varchar(75) DEFAULT NULL,
  `ans3` varchar(75) DEFAULT NULL,
  `ans4` varchar(75) DEFAULT NULL,
  `correct_ans` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`que_id`, `s_no`, `test_id`, `quiz_ques`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_ans`) VALUES
(1, 1, 'QuizMania20180415', 'Which command is used to close the vi editor?', 'q', 'wq', 'both (a) and (b)', 'None of these mentioned.', 'c'),
(2, 2, 'QuizMania20180415', 'The shell used for Single user mode shell is:', 'bash', 'Csh', 'ksh', 'sh', 'd'),
(3, 3, 'QuizMania20180415', 'what is permission for view only for other ?', '751', '752', '754', '755', 'd'),
(4, 4, 'QuizMania20180415', 'One that is not a type of user interface of operating system is ', 'command line interface', 'graphical user interface', 'batch interface', 'device interface', 'd'),
(5, 5, 'QuizMania20180415', 'For web based computing system, computer used are normally', 'personal computers', 'servers', 'network computers', 'tablets', 'c'),
(6, 1, 'Quiz20180405', 'In unary relational operations, SELECT operation is partition of relation usually classified as', 'horizontal partition', 'vertical partition', 'insert partition', 'delete partition', 'a'),
(7, 2, 'Quiz20180405', 'Boolean expression used in SELECT operation consists of clauses such as', 'attribute name', 'constant value', 'comparison operators', 'all of above', 'd'),
(8, 1, 'Quiz12320180418', 'When defining identifier in PHP you should remember that', 'Identifier are case sensitive. So $result is different than $ result', 'Identifiers can be any length', 'Both of above', 'None of above', 'c'),
(9, 2, 'Quiz12320180418', 'The left association operator % is used in PHP for', 'percentage', 'bitwise or', 'division', 'modulus', 'd'),
(10, 3, 'Quiz12320180418', 'The left associative dot operator (.) is used in PHP for', 'multiplication', 'concatenation', 'separate object and its member', 'delimeter', 'b'),
(11, 4, 'Quiz12320180418', 'Which function includes the specified file even the statement evaluates to false in which block the function is placed.', 'include()', 'require()', 'both of above', 'None of above', 'b'),
(12, 5, 'Quiz12320180418', 'What is the best all-purpose way of comparing two strings?', 'Using the strpos function', 'Using the == operator', 'Using strcasecmp()', 'Using strcmp()', 'd'),
(13, 6, 'Quiz12320180418', 'n PHP, which of the following function is used to insert content of one php file into another php file before server executes', 'include[]', '#include()', 'include()', '#include{}', 'c'),
(14, 7, 'Quiz12320180418', '$str=”3dollars”; $a=20; $a+=$str; print($a); ?> Output ?', '23dollars', '203dollars', '320dollars', '23', 'd'),
(15, 8, 'Quiz12320180418', 'Which of the following is not a valid variable name?', '$number-in-class', '$nic', '$NumberInClass', '$number_in_class', 'a'),
(16, 1, 'ewr20180522', 'sdszdzs', 'zdzsd', 'zsdzsd', 'dszd', 'zsdzd', 'b'),
(17, 2, 'ewr20180522', 'zsdzd', 'zdszsd', 'zdzs', 'zsdzd', 'zdzsd', 'a'),
(18, 3, 'ewr20180522', 'zsdzd', 'z', 'zsdfdf', 'tytfyf', 'cghgh', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `user_id` varchar(20) DEFAULT NULL,
  `test_id` varchar(20) DEFAULT NULL,
  `test_date` varchar(11) DEFAULT NULL,
  `correct` int(11) NOT NULL,
  `incorrect` int(11) NOT NULL,
  `user_score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`user_id`, `test_id`, `test_date`, `correct`, `incorrect`, `user_score`) VALUES
('mj74518', 'Quiz20180405', '18/04/22', 1, 1, 3),
('mansirawat', 'Quiz12320180418', '18/05/22', 1, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(5) NOT NULL,
  `sub_name` varchar(25) DEFAULT NULL,
  `course_id` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `course_id`) VALUES
(201, 'Software', 'B.Te'),
(601, 'MULTIMEDIA & APPLICATION', 'BCA2'),
(602, 'ARTIFICIAL INTELLIGENCE', 'BCA2'),
(603, 'NETWORK OPERATING SYSTEM', 'BCA2'),
(1001, 'Agriculture', 'B.Sc');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` varchar(20) NOT NULL,
  `sub_id` int(5) DEFAULT NULL,
  `test_name` varchar(30) DEFAULT NULL,
  `total_ques` varchar(15) DEFAULT NULL,
  `total_time` varchar(10) NOT NULL,
  `marks_per_ques` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `sub_id`, `test_name`, `total_ques`, `total_time`, `marks_per_ques`) VALUES
('ewr20180522', 201, 'ewr', '3', '5', 3),
('Quiz12320180418', 602, 'Quiz123', '8', '10', 3),
('Quiz20180405', 601, 'Quiz', '2', '3', 3),
('QuizMania20180415', 603, 'Quiz Mania', '5', '14', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(10) NOT NULL,
  `full_name` varchar(20) DEFAULT NULL,
  `user_psswd` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `contact` bigint(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pic_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `user_psswd`, `address`, `city_name`, `contact`, `email`, `pic_status`) VALUES
('dheeraj12', NULL, 'admin', NULL, NULL, NULL, 'mdasda@gmail.com', 0),
('mansirawat', NULL, 'mansirawat@gmail.com', NULL, NULL, NULL, 'mansirawat@gmail.com', 0),
('mj74518', 'Mohit Chandra Joshi', '1234', 'Vindhyachal Colony, Nandpur', 'Haldwani, Uttarakhand', 9639172018, 'mj74518@gmail.com', 1),
('qwerty12', 'qwerty', 'qwerty12', 'haldwani', 'haldwani', 9989384756, 'akdans@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ans_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `que_id` (`que_id`);

--
-- Indexes for table `at_unat_ques`
--
ALTER TABLE `at_unat_ques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_name` (`course_name`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `education_qualification`
--
ALTER TABLE `education_qualification`
  ADD PRIMARY KEY (`edu_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`que_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `que_id` (`que_id`),
  ADD KEY `test_id_2` (`test_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD UNIQUE KEY `test_id` (`test_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test_id_2` (`test_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`),
  ADD UNIQUE KEY `sub_id` (`sub_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `sub_id_2` (`sub_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `at_unat_ques`
--
ALTER TABLE `at_unat_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `education_qualification`
--
ALTER TABLE `education_qualification`
  MODIFY `edu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `que_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `question` (`test_id`);

--
-- Constraints for table `at_unat_ques`
--
ALTER TABLE `at_unat_ques`
  ADD CONSTRAINT `at_unat_ques_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `at_unat_ques_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `answer` (`test_id`);

--
-- Constraints for table `education_qualification`
--
ALTER TABLE `education_qualification`
  ADD CONSTRAINT `education_qualification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `at_unat_ques` (`test_id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
