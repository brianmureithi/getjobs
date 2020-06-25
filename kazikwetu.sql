-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 10:11 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kazikwetu`
--

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` int(11) NOT NULL,
  `county` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `county`) VALUES
(1, 'Mombasa'),
(2, 'Kwale'),
(3, 'Kilifi'),
(4, 'Tana River'),
(5, 'Lamu'),
(6, 'Taita-taveta'),
(7, 'Garissa'),
(8, 'Wajir'),
(9, 'Mandera'),
(10, 'Marsabit'),
(11, 'Isiolo'),
(12, 'Meru'),
(13, 'Tharaka-Nithi'),
(14, 'Embu'),
(15, 'Kitui'),
(16, 'Machakos'),
(17, 'Makueni'),
(18, 'Nyandarua'),
(19, 'Nyeri'),
(20, 'Kirinyaga'),
(21, 'Muranga'),
(22, 'Kiambu'),
(23, 'Turkana'),
(24, 'West-Pokot'),
(25, 'Samburu'),
(26, 'Trans-nzoia'),
(27, 'Uasin-Gishu'),
(28, 'Elgeyo-Marakwet'),
(29, 'Nandi'),
(30, 'Baringo'),
(31, 'Laikipia'),
(32, 'Nakuru'),
(33, 'Laikipia'),
(34, 'Nakuru'),
(35, 'Narok'),
(36, 'Kajiado'),
(37, 'Kericho'),
(38, 'Bomet'),
(39, 'Kakamega'),
(40, 'Vihiga'),
(41, 'Bungoma'),
(42, 'Busia'),
(43, 'Siaya'),
(44, 'Kisumu'),
(45, 'Homa Bay'),
(46, 'Migori'),
(47, 'Kisii'),
(48, 'Nyamira'),
(49, 'Nairobi');

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
  `id` int(11) NOT NULL,
  `expertise` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`id`, `expertise`) VALUES
(1, 'Software developer'),
(2, 'Graphics designer'),
(3, 'Network designer'),
(4, 'Artist'),
(5, 'Writer'),
(6, 'Autocad Designer'),
(7, 'Animator'),
(8, 'Math Geek'),
(9, 'Medicine Geek'),
(10, 'Pharmacy Geek'),
(11, 'Android app Developer'),
(12, 'Web Designer');

-- --------------------------------------------------------

--
-- Table structure for table `expert_tbl`
--

CREATE TABLE `expert_tbl` (
  `expert_id` int(255) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `idnumber` int(100) NOT NULL,
  `county` varchar(100) NOT NULL,
  `expertise` varchar(256) NOT NULL,
  `prof_pic` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `time_of_signup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expert_tbl`
--

INSERT INTO `expert_tbl` (`expert_id`, `firstname`, `lastname`, `email`, `phonenumber`, `idnumber`, `county`, `expertise`, `prof_pic`, `password`, `time_of_signup`) VALUES
(1, 'Brian', 'Murithi', 'brianmurithi66@gmail.com', '768938573', 36617316, 'Nairobi', 'Software developer', 'assets/profile/', 'cbd44f8b5b48a51f7dab98abcdf45d4e', '2020-04-08 08:51:38'),
(2, 'Lanoi', 'Tikani', 'tikani69@gmail.com', '768938573', 36617316, 'Nairobi', 'Software developer', 'assets/profile/', '8757d7a2e63830d3614bb1cfbffaa0a6', '2020-04-08 08:54:01'),
(3, 'Doreen', 'Muthoni', 'doreenmuth65@gmail.com', '79562323', 62656563, 'Kwale', 'Pharmacy Geek', 'assets/profile/Snapchat-279022124.jpg', '13094f21a1806cd72e812c8d93b64a52', '2020-04-08 08:57:08'),
(4, 'Brian', 'Murithi', 'brianmurithi65@gmail.com', '798647856', 365525585, 'Mombasa', 'Software developer', 'assets/profile/Snapchat-716025830.jpg', 'cbd44f8b5b48a51f7dab98abcdf45d4e', '2020-04-10 13:13:55'),
(5, 'kamp', 'meni', 'kampmeni@gmail.com', '765632338', 1231621, 'Mombasa', 'Software developer', 'assets/profile/Snapchat-136747082.jpg', 'de1f28d2e47e4902be1ca732be8dcd39', '2020-04-10 15:47:56'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', '762556222', 25156665, 'Nairobi', '', 'assets/profile/IMG_20190831_185756.jpg', 'e7d057c46086d92c9f33b6b83848e62a', '2020-05-05 06:36:20'),
(7, 'John', 'kennedy', 'john@gmail.com', '0762266233', 36555595, 'Kwale', 'Artist', 'assets/profile/IMG_20190218_085753.jpg', '527bd5b5d689e2c32ae974c6229ff785', '2020-05-09 10:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` int(255) NOT NULL,
  `downloads` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `size`, `downloads`) VALUES
(1, 'MIS Assignment 1.docx.docx', 18817, '4');

-- --------------------------------------------------------

--
-- Table structure for table `jobsdone`
--

CREATE TABLE `jobsdone` (
  `work_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `users_id` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobsdone`
--

INSERT INTO `jobsdone` (`work_id`, `name`, `lname`, `status`, `users_id`) VALUES
(1, 'Brian', '', '', 0),
(2, 'Murithi', '', '', 0),
(3, 'Brian', '', '', 0),
(4, 'Murithi', '', '', 0),
(5, 'dddd', 'dcsdc', 'done', 1),
(6, 'dddd', 'dcsdc', 'done', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loggedin_experts`
--

CREATE TABLE `loggedin_experts` (
  `expert_id` int(255) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `county` varchar(255) NOT NULL,
  `expertise` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `prof_pic` varchar(100) NOT NULL,
  `loggedin_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loggedin_experts`
--

INSERT INTO `loggedin_experts` (`expert_id`, `firstname`, `lastname`, `email`, `county`, `expertise`, `password`, `prof_pic`, `loggedin_date`) VALUES
(2, 'Lanoi', 'Tikani', 'tikani69@gmail.com', '', '', '8757d7a2e63830d3614bb1cfbffaa0a6', 'assets/profile/', '2020-04-28 09:49:42'),
(3, 'Doreen', 'Muthoni', 'doreenmuth65@gmail.com', '', '', '13094f21a1806cd72e812c8d93b64a52', 'assets/profile/Snapchat-279022124.jpg', '2020-04-10 15:42:44'),
(4, 'Brian', 'Murithi', 'brianmurithi65@gmail.com', 'Mombasa', 'Software developer', 'cbd44f8b5b48a51f7dab98abcdf45d4e', 'assets/profile/Snapchat-716025830.jpg', '2020-04-10 13:16:28'),
(5, 'kamp', 'meni', 'kampmeni@gmail.com', 'Mombasa', 'Software developer', 'de1f28d2e47e4902be1ca732be8dcd39', 'assets/profile/Snapchat-136747082.jpg', '2020-04-10 15:49:17'),
(2, 'Lanoi', 'Tikani', 'tikani69@gmail.com', 'Nairobi', 'Software developer', '8757d7a2e63830d3614bb1cfbffaa0a6', 'assets/profile/', '2020-05-05 05:53:45'),
(2, 'Lanoi', 'Tikani', 'tikani69@gmail.com', 'Nairobi', 'Software developer', '8757d7a2e63830d3614bb1cfbffaa0a6', 'assets/profile/', '2020-05-05 05:53:45'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-05 06:50:02'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-05 06:50:18'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-05 06:50:32'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-05 06:52:13'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-05 08:12:30'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-05 08:12:33'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-05 12:15:40'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-07 10:20:31'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-08 13:01:10'),
(7, 'John', 'kennedy', 'john@gmail.com', 'Kwale', 'Artist', '527bd5b5d689e2c32ae974c6229ff785', 'assets/profile/IMG_20190218_085753.jpg', '2020-05-09 10:13:50'),
(7, 'John', 'kennedy', 'john@gmail.com', 'Kwale', 'Artist', '527bd5b5d689e2c32ae974c6229ff785', 'assets/profile/IMG_20190218_085753.jpg', '2020-05-09 10:16:00'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-09 10:38:43'),
(7, 'John', 'kennedy', 'john@gmail.com', 'Kwale', 'Artist', '527bd5b5d689e2c32ae974c6229ff785', 'assets/profile/IMG_20190218_085753.jpg', '2020-05-09 11:40:02'),
(7, 'John', 'kennedy', 'john@gmail.com', 'Kwale', 'Artist', '527bd5b5d689e2c32ae974c6229ff785', 'assets/profile/IMG_20190218_085753.jpg', '2020-05-09 12:09:42'),
(7, 'John', 'kennedy', 'john@gmail.com', 'Kwale', 'Artist', '527bd5b5d689e2c32ae974c6229ff785', 'assets/profile/IMG_20190218_085753.jpg', '2020-05-09 12:21:59'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-09 16:49:30'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-09 16:59:56'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-09 17:01:25'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-10 07:32:37'),
(7, 'John', 'kennedy', 'john@gmail.com', 'Kwale', 'Artist', '527bd5b5d689e2c32ae974c6229ff785', 'assets/profile/IMG_20190218_085753.jpg', '2020-05-10 07:32:47'),
(7, 'John', 'kennedy', 'john@gmail.com', 'Kwale', 'Artist', '527bd5b5d689e2c32ae974c6229ff785', 'assets/profile/IMG_20190218_085753.jpg', '2020-05-10 07:32:55'),
(7, 'John', 'kennedy', 'john@gmail.com', 'Kwale', 'Artist', '527bd5b5d689e2c32ae974c6229ff785', 'assets/profile/IMG_20190218_085753.jpg', '2020-05-10 07:33:00'),
(7, 'John', 'kennedy', 'john@gmail.com', 'Kwale', 'Artist', '527bd5b5d689e2c32ae974c6229ff785', 'assets/profile/IMG_20190218_085753.jpg', '2020-05-10 07:33:05'),
(7, 'John', 'kennedy', 'john@gmail.com', 'Kwale', 'Artist', '527bd5b5d689e2c32ae974c6229ff785', 'assets/profile/IMG_20190218_085753.jpg', '2020-05-11 06:35:53'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-11 06:36:15'),
(6, 'Brian', 'blurry', 'blurry@gmail.com', 'Nairobi', '', 'e7d057c46086d92c9f33b6b83848e62a', 'assets/profile/IMG_20190831_185756.jpg', '2020-05-11 06:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `county` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `idnumber` int(100) NOT NULL,
  `prof_pic` varchar(150) NOT NULL,
  `time_of_signup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`user_id`, `firstname`, `lastname`, `phonenumber`, `email`, `county`, `password`, `idnumber`, `prof_pic`, `time_of_signup`) VALUES
(1, 'Brian', 'Murithi', '795655652', 'blurry@gmail.com', 'Mombasa', 'e7d057c46086d92c9f33b6b83848e62a', 12365874, 'assets/profile/IMG_20190831_185756.jpg', '2020-05-05 06:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `works_tbl`
--

CREATE TABLE `works_tbl` (
  `work_id` int(11) NOT NULL,
  `expert_id` int(255) NOT NULL,
  `users_id` int(255) NOT NULL,
  `user_fname` varchar(40) NOT NULL,
  `user_lname` varchar(40) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `expert_region` varchar(30) NOT NULL,
  `expertise` varchar(30) NOT NULL,
  `messages` varchar(255) NOT NULL,
  `files_name` varchar(255) NOT NULL,
  `file_size` int(255) NOT NULL,
  `time_of_submission` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `works_tbl`
--

INSERT INTO `works_tbl` (`work_id`, `expert_id`, `users_id`, `user_fname`, `user_lname`, `user_email`, `user_phone`, `expert_region`, `expertise`, `messages`, `files_name`, `file_size`, `time_of_submission`, `status`) VALUES
(1, 4, 1, 'Brian', 'Murithi', 'blurry@gmail.com', '795655652', 'Mombasa', '            Software developer', 'Read this book for me', 'sta-2200-Notes.pdf', 1945845, '2020-05-07 16:39:57', ''),
(2, 4, 1, 'Brian', 'Murithi', 'blurry@gmail.com', '795655652', 'Mombasa', '            Software developer', 'Read this book for me', 'sta-2200-Notes.pdf', 1945845, '2020-05-07 18:47:22', ''),
(3, 4, 1, 'Brian', 'Murithi', 'blurry@gmail.com', '795655652', 'Mombasa', '            Software developer', 'Read this book for me', 'sta-2200-Notes.pdf', 1945845, '2020-05-08 10:24:49', ''),
(4, 2, 1, 'Brian', 'Murithi', 'blurry@gmail.com', '795655652', 'Mombasa', '            Software developer', 'Calculate this for me', 'Chapter1-ProgramStructure.pdf', 836507, '2020-05-08 12:58:48', ''),
(10, 7, 1, 'Brian', 'blurry', 'blurry@gmail.com', '762556222', 'Mombasa', '            Artist', 'Calculate these sums', 'MIS Assignment 1.docx.docx', 18817, '2020-05-09 10:55:23', ''),
(11, 7, 1, 'Brian', 'Murithi', 'blurry@gmail.com', '795655652', 'Mombasa', '            Artist', 'read this for me', 'Mis assignment.docx', 23031, '2020-05-09 11:38:38', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expert_tbl`
--
ALTER TABLE `expert_tbl`
  ADD PRIMARY KEY (`expert_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobsdone`
--
ALTER TABLE `jobsdone`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `works_tbl`
--
ALTER TABLE `works_tbl`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `expert_tbl`
--
ALTER TABLE `expert_tbl`
  MODIFY `expert_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jobsdone`
--
ALTER TABLE `jobsdone`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `works_tbl`
--
ALTER TABLE `works_tbl`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
