-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 11:06 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agunfon`
--

-- --------------------------------------------------------

--
-- Table structure for table `mentee_tbl`
--

CREATE TABLE `mentee_tbl` (
  `mentee_id` int(200) NOT NULL,
  `mentor_kind` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `date_added` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mentor_tbl`
--

CREATE TABLE `mentor_tbl` (
  `mentor_id` int(200) NOT NULL,
  `mentor_kind` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `date_added` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mentee_tbl`
--
ALTER TABLE `mentee_tbl`
  ADD PRIMARY KEY (`mentee_id`);

--
-- Indexes for table `mentor_tbl`
--
ALTER TABLE `mentor_tbl`
  ADD PRIMARY KEY (`mentor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mentee_tbl`
--
ALTER TABLE `mentee_tbl`
  MODIFY `mentee_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mentor_tbl`
--
ALTER TABLE `mentor_tbl`
  MODIFY `mentor_id` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
