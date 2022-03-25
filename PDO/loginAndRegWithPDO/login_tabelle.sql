-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2021 at 04:11 PM
-- Server version: 5.7.23
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `kungfu`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(3) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `pw` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `pw`) VALUES
(1, 'heiri89', '$2y$10$PZHGAXcxUdAH4Wq/z63m1.FMOSia0ZcaMQf1VYwBfIEIbTYTWwKiC'),
(2, 'carla34', '$2y$10$3.L5.e4HTDR.8hbsIgrx1eDd6.XQpjmj45sgzkARiymo4omKO5qgq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
