-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 06:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Adminid` varchar(20) DEFAULT NULL,
  `adminname` varchar(20) DEFAULT NULL,
  `adminemail` varchar(50) NOT NULL,
  `adminpassword` varchar(200) DEFAULT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `otp` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Adminid`, `adminname`, `adminemail`, `adminpassword`, `role`, `otp`) VALUES
('Admin', 'Admin', 'ny393261@gmail.com', '$2y$10$jlz7xEl7RFKxjibNedtUlOIhhWCtDDGV7iDbcvjcnOWBD1b6IWvcq', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `booktitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookauthor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookcategory` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookadddate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(20) NOT NULL DEFAULT 1,
  `bookimage` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `booktitle`, `bookauthor`, `bookcategory`, `bookadddate`, `status`, `bookimage`) VALUES
('1', 'Chemistry', 'Richard', 'Science', '2023-01-27 04:15:37', 0, 'pexels-element-digital-13702982.jpg'),
('2', 'Basic Physics', 'Richard Feynman', 'science', '2023-02-01 06:58:12', 1, 'pexels-element-digital-13702985.jpg'),
('3', 'Fundamentals of Physics', 'Richard Feynman', 'science', '2023-01-30 08:11:52', 0, 'pexels-element-digital-13702983.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bookstatus`
--

CREATE TABLE `bookstatus` (
  `userid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `returndate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookstatus`
--

INSERT INTO `bookstatus` (`userid`, `bookid`, `status`, `issuedate`, `returndate`) VALUES
('345', '1', '1', '2023-02-01 00:45:04', '2023-02-01 01:31:31'),
('345', '3', '0', '2023-02-01 01:31:46', NULL),
('345', '2', '1', '2023-02-01 03:12:01', '2023-02-01 12:36:31'),
('345', '1', '1', '2023-02-01 12:34:05', '2023-02-01 12:34:23'),
('345', '1', '0', '2023-02-01 12:35:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `useremail` varchar(50) NOT NULL,
  `userpassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usermobnumber` varchar(10) DEFAULT NULL,
  `useraddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `useremail`, `userpassword`, `usermobnumber`, `useraddress`, `otp`) VALUES
('1', 'Adam', 'Adam@gmail.com', NULL, '1111111111', NULL, NULL),
('fgg', 'fgr', 'ny39321@gmail.com', '$2y$10$yiAkSP/rFfkktq8POKkOTeYJnoJTmEpEM90hmKQKnnpIhB2BmQFlO', '1234567890', NULL, 0),
('345', 'vn', 'sripiyushlko@gmail.com', NULL, '578967455', NULL, 594231);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminemail`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`useremail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
