/*Custom SQL script
CREATE DATABASE IF NOT EXISTS joshua_gatto_syscbook;

CREATE TABLE IF NOT EXISTS users_info (
    student_ID INT(10) PRIMARY KEY AUTO_INCREMENT=100100,
    student_email VARCHAR(150),
    first_name VARCHAR(150),
    last_name VARCHAR(150),
    DOB DATE
);

CREATE TABLE IF NOT EXISTS users_program (
    student_ID INT(10) PRIMARY KEY,
    Program VARCHAR(50),
    FOREIGN KEY (student_ID) REFERENCES users_info(student_ID)
);

CREATE TABLE IF NOT EXISTS users_avatar (
    student_ID INT PRIMARY KEY,
    avatar CHAR(1),
    FOREIGN KEY (student_ID) REFERENCES users_info(student_ID)
);

CREATE TABLE IF NOT EXISTS users_address (
    student_ID INT(10) PRIMARY KEY,
    street_number INT(5),
    street_name VARCHAR(150),
    city VARCHAR(30),
    provence CHAR(2),
    postal_code CHAR(7),
    FOREIGN KEY (student_ID) REFERENCES users_info(student_ID)
);

CREATE TABLE IF NOT EXISTS users_posts (
    post_ID INT(10) AUTO_INCREMENT PRIMARY KEY,
    student_ID INT(10),
    new_post TEXT(1000),
    post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_ID) REFERENCES users_info(student_ID)
);

CREATE TABLE IF NOT EXISTS users_session (
    student_ID INT(10) PRIMARY KEY,
    session_ID INT,
    FOREIGN KEY (student_ID) REFERENCES users_info(student_ID)
);

--delete all script
USE joshua_gatto_syscbook
SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE TABLE users_program;
TRUNCATE TABLE users_avatar;
TRUNCATE TABLE users_address;
TRUNCATE TABLE users_posts;
TRUNCATE TABLE users_info;

SET FOREIGN_KEY_CHECKS = 1;
ALTER TABLE users_info AUTO_INCREMENT=100100;
*/
/*phpMyAdmin SQL script*/
=======
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 12:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

CREATE DATABASE IF NOT EXISTS firstname_lastname_syscbook;

USE firstname_lastname_syscbook;

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
-- Table structure for table `users_posts`
--

CREATE TABLE `users_posts` (
  `post_ID` int(10) NOT NULL,
  `student_ID` int(10) DEFAULT NULL,
  `new_post` text DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_posts`
--
ALTER TABLE `users_posts`
  ADD PRIMARY KEY (`post_ID`),
  ADD KEY `student_ID` (`student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_posts`
--
ALTER TABLE `users_posts`
  MODIFY `post_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_posts`
--
ALTER TABLE `users_posts`
  ADD CONSTRAINT `users_posts_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `users_info` (`student_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
