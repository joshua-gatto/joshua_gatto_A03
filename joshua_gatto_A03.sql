-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 09:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

CREATE DATABASE IF NOT EXISTS joshua_gatto_syscbook;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joshua_gatto_syscbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_address`
--

CREATE TABLE `users_address` (
  `student_ID` int(10) NOT NULL,
  `street_number` int(5) DEFAULT NULL,
  `street_name` varchar(150) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `provence` char(2) DEFAULT NULL,
  `postal_code` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_address`
--

INSERT INTO `users_address` (`student_ID`, `street_number`, `street_name`, `city`, `provence`, `postal_code`) VALUES
(1, 0, '', '', '', ''),
(2, 5793, 'Longhearth Way', 'Ottawa', 'ON', 'k4m 1m2'),
(3, 5793, 'Longhearth Way', 'Ottawa', 'ON', 'k4m 1m2'),
(100100, 5793, 'Longhearth Way', 'Ottawa', 'ON', 'k4m 1m2'),
(100101, 5793, 'Longhearth Way', 'Ottawa', 'ON', 'k4m 1m2'),
(100102, 5793, 'Longhearth Way', 'Ottawa', 'ON', 'k4m 1m2'),
(100106, 0, NULL, NULL, NULL, NULL),
(100107, 0, NULL, NULL, NULL, NULL),
(100108, 0, NULL, NULL, NULL, NULL),
(100109, 0, NULL, NULL, NULL, NULL),
(100110, 0, NULL, NULL, NULL, NULL),
(100111, 0, NULL, NULL, NULL, NULL),
(100113, 0, NULL, NULL, NULL, NULL),
(100114, 0, NULL, NULL, NULL, NULL),
(100115, 0, NULL, NULL, NULL, NULL),
(100116, 0, NULL, NULL, NULL, NULL),
(100117, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_avatar`
--

CREATE TABLE `users_avatar` (
  `student_ID` int(11) NOT NULL,
  `avatar` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_avatar`
--

INSERT INTO `users_avatar` (`student_ID`, `avatar`) VALUES
(1, ''),
(2, ''),
(3, 'E'),
(100100, 'E'),
(100101, 'E'),
(100102, 'E'),
(100106, NULL),
(100107, NULL),
(100108, NULL),
(100109, NULL),
(100110, NULL),
(100111, NULL),
(100113, NULL),
(100114, NULL),
(100115, NULL),
(100116, NULL),
(100117, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `student_ID` int(10) NOT NULL,
  `student_email` varchar(150) DEFAULT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `DOB` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`student_ID`, `student_email`, `first_name`, `last_name`, `DOB`) VALUES
(1, 'joshua.gatto@hotmail.com', 'Joshua', 'Gatto', '0000-00-00'),
(2, 'joshua.gatto@hotmail.com', 'Joshua', 'Gatto', '0000-00-00'),
(3, 'joshua.gatto@hotmail.com', 'Joshua', 'Gatto', '0000-00-00'),
(100100, 'joshua.gatto@hotmail.com', 'Joshua', 'Gatto', '0000-00-00'),
(100101, 'joshua.gatto@hotmail.com', 'Joshua', 'Gatto', '0000-00-00'),
(100102, 'joshua.gatto@hotmail.com', 'Gorgon', 'Gatto', '0000-00-00'),
(100103, 'joshua.gatto@hotmail.com', 'Joshua', 'Gatto', '0000-00-00'),
(100104, 'joshua.gatto@hotmail.com', 'Joshua', 'Gatto', '0000-00-00'),
(100105, 'joshua.gatto@hotmail.com', 'Joshua', 'Gatto', '0000-00-00'),
(100106, 'joshua.gatto@hotmail.com', 'Joshua', 'Gatto', '0000-00-00'),
(100107, 'jane.doe@hotmail.com', 'Jane', 'Doe', '2004-01-12'),
(100108, 'joshua.gallo@hotmail.com', 'Joshua', 'Gatto', '0000-00-00'),
(100109, 'joshua.gatto@outlook.com', 'Joshua', 'Gatto', '0000-00-00'),
(100110, 'joshua.gatto@gmail.com', 'Joshua', 'Gatto', '0000-00-00'),
(100111, 'john.smith@outlook.com', 'John', 'Smith', '2001-01-12'),
(100112, 'joshua.gatto@h.com', 'Joshua', 'Gatto', '0000-00-00'),
(100113, 'joshua.gatto@h.com', 'Joshua', 'Gatto', '0000-00-00'),
(100114, 'corry.carson@outlook.com', 'Carson', 'Corry', '2020-01-12'),
(100115, 'jamie@hotmail.com', 'jamie', 'jon', '0000-00-00'),
(100116, 'jonny@jonny.com', 'Jonny', 'Farina', '1010-11-12'),
(100117, 'jonny@jonny.com', 'Jonny', 'Farina', '1010-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `users_passwords`
--

CREATE TABLE `users_passwords` (
  `student_ID` int(10) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_passwords`
--

INSERT INTO `users_passwords` (`student_ID`, `password`) VALUES
(100102, '1'),
(100105, ''),
(100106, ''),
(100107, 'jane'),
(100108, 'xi'),
(100110, '$2y$10$8jUx1QI/Nw18I6EJxV7V9.1Q/gbZpudIK.nt8XZTWEcEXeNAvwXFO'),
(100111, '$2y$10$PiwMuCSqamnvwjphFK85buTtXR7pknDB4i36i/F8TMxgugcSN1NOa'),
(100113, '$2y$10$wP3HTdK9dCsKjfjDO3TJxuq66nWH4mG2EGbsNiyQFtBIPKyWL7RV2'),
(100114, '$2y$10$po/3fKHzoyLPvsobjwro9uCc0Wo9ZTtGOeluFCQcmQdvUUz5ZvMya'),
(100115, '$2y$10$A8HuCh1wV2O5qGX7Ne3wjeY9uork8dDUMvLmZZSHdMhNDZBJhryZC'),
(100116, '$2y$10$hhKLyDkCc5ZDtEtMQeyIGe/71bqYI15AG7QbxU.t12wT8qf1toqve'),
(100117, '$2y$10$ksseXUX0pFwDyFA9tr7VQ.5mflK2UuFTFKimxQ7GOx.h2V0fKXIRe');

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `student_ID` int(10) NOT NULL,
  `account_type` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_permissions`
--

INSERT INTO `users_permissions` (`student_ID`, `account_type`) VALUES
(100110, 1),
(100111, 1),
(100114, 1),
(100115, 0),
(100116, 0),
(100117, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_posts`
--

CREATE TABLE `users_posts` (
  `post_ID` int(10) NOT NULL,
  `student_ID` int(10) DEFAULT NULL,
  `new_post` text DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_posts`
--

INSERT INTO `users_posts` (`post_ID`, `student_ID`, `new_post`, `post_date`) VALUES
(3, 1, 'hello', '2023-04-12 19:23:22'),
(4, 1, 'hello', '2023-04-12 19:26:30'),
(5, 1, '', '2023-04-12 19:26:32'),
(6, 1, '', '2023-04-12 19:26:33'),
(7, 3, 'sda', '2023-04-12 19:38:43'),
(8, 3, 'dasda', '2023-04-12 19:44:38'),
(9, 100101, 'gddgsf', '2023-04-12 19:44:57'),
(10, 100102, 'sdd', '2023-04-12 19:45:10'),
(11, 100102, 'sdd', '2023-04-12 19:50:07'),
(12, 100102, 'fsdfs', '2023-04-12 19:50:14'),
(13, 100102, 'fdsdf', '2023-04-12 19:50:16'),
(14, 100102, 'fdsdf', '2023-04-12 20:19:51'),
(15, 100107, 'sdadsa', '2023-04-13 13:27:00'),
(16, 100107, 'sdadsa', '2023-04-13 13:27:19'),
(17, 100107, 'dsads', '2023-04-13 13:27:22'),
(18, 100107, 'Jane\\\'s the name', '2023-04-13 13:27:48'),
(19, 100107, '', '2023-04-13 13:28:23'),
(20, 100107, '', '2023-04-13 13:28:23'),
(21, 100107, '', '2023-04-13 13:28:24'),
(22, 100107, '', '2023-04-13 13:34:45'),
(23, 100107, '', '2023-04-13 13:37:12'),
(24, 100107, '', '2023-04-13 13:37:25'),
(25, 100107, '', '2023-04-13 13:37:38'),
(26, 100107, 'fsdfs', '2023-04-13 13:38:23'),
(27, 100107, 'dsfsd', '2023-04-13 13:38:24'),
(28, 100107, 'fsdfsd', '2023-04-13 13:38:25'),
(29, 100107, 'sdfsd', '2023-04-13 13:38:26'),
(30, 100107, 'sdfsfs', '2023-04-13 13:38:28'),
(31, 100107, 'fsdfs', '2023-04-13 13:38:29'),
(32, 100107, 'hello world\\r\\n', '2023-04-13 13:38:34'),
(33, 100107, 'whats up?', '2023-04-13 13:38:54'),
(34, 100102, 'the world', '2023-04-13 13:39:52'),
(35, 100102, 'the world', '2023-04-13 13:40:19'),
(36, 100102, 'the world', '2023-04-13 13:40:34'),
(37, 100102, 'sdad', '2023-04-13 13:40:36'),
(38, 100102, 'sdad', '2023-04-13 13:44:36'),
(39, 100102, 'hgffgd', '2023-04-13 13:44:40'),
(40, 100102, 'hgffgd', '2023-04-13 13:44:50'),
(41, 100102, 'dsf', '2023-04-13 13:44:53'),
(42, 100102, 'dsf', '2023-04-13 13:51:05'),
(43, 100102, 'fds', '2023-04-13 14:11:21'),
(44, NULL, 'fdgv', '2023-04-13 17:47:47'),
(45, NULL, 'dfsfds', '2023-04-13 17:47:49'),
(46, NULL, 'wj4trhe', '2023-04-13 17:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `users_program`
--

CREATE TABLE `users_program` (
  `student_ID` int(10) NOT NULL,
  `Program` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_program`
--

INSERT INTO `users_program` (`student_ID`, `Program`) VALUES
(1, 'Choose Program'),
(2, 'Choose Program'),
(3, 'Choose Program'),
(100100, 'Choose Program'),
(100101, 'Choose Program'),
(100102, 'Choose Program'),
(100106, 'Choose Program'),
(100107, 'Biomedical and Electrical Engineering'),
(100108, 'Choose Program'),
(100109, 'Software Engineering'),
(100110, 'Software Engineering'),
(100111, 'Computer Systems Engineering'),
(100113, 'Computer Systems Engineering'),
(100114, 'Computer Systems Engineering'),
(100115, 'Choose Program'),
(100116, 'Software Engineering'),
(100117, 'Software Engineering');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`student_ID`);

--
-- Indexes for table `users_avatar`
--
ALTER TABLE `users_avatar`
  ADD PRIMARY KEY (`student_ID`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`student_ID`);

--
-- Indexes for table `users_passwords`
--
ALTER TABLE `users_passwords`
  ADD PRIMARY KEY (`student_ID`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`student_ID`);

--
-- Indexes for table `users_posts`
--
ALTER TABLE `users_posts`
  ADD PRIMARY KEY (`post_ID`),
  ADD KEY `student_ID` (`student_ID`);

--
-- Indexes for table `users_program`
--
ALTER TABLE `users_program`
  ADD PRIMARY KEY (`student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `student_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100118;

--
-- AUTO_INCREMENT for table `users_posts`
--
ALTER TABLE `users_posts`
  MODIFY `post_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_address`
--
ALTER TABLE `users_address`
  ADD CONSTRAINT `users_address_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `users_info` (`student_ID`);

--
-- Constraints for table `users_avatar`
--
ALTER TABLE `users_avatar`
  ADD CONSTRAINT `users_avatar_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `users_info` (`student_ID`);

--
-- Constraints for table `users_passwords`
--
ALTER TABLE `users_passwords`
  ADD CONSTRAINT `users_passwords_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `users_info` (`student_ID`);

--
-- Constraints for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `users_permissions_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `users_info` (`student_ID`);

--
-- Constraints for table `users_posts`
--
ALTER TABLE `users_posts`
  ADD CONSTRAINT `users_posts_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `users_info` (`student_ID`);

--
-- Constraints for table `users_program`
--
ALTER TABLE `users_program`
  ADD CONSTRAINT `users_program_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `users_info` (`student_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
