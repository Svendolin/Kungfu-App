-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2020 at 04:46 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `classicmodels`
--

-- --------------------------------------------------------

--
-- Table structure for table `booliTabelle`
--

CREATE TABLE `booliTabelle` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `body` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booliTabelle`
--

INSERT INTO `booliTabelle` (`id`, `title`, `body`) VALUES
(1, 'MySQL Tutorial', 'DBMS stands for DataBase ...'),
(2, 'How To Use MySQL Well', 'After you went through a ...'),
(3, 'Optimizing MySQL', 'In this tutorial we will show ...'),
(4, '1001 MySQL Tricks', '1. Never run mysqld as root. 2. ...'),
(5, 'MySQL vs. YourSQL', 'In the following database comparison ...'),
(6, 'MySQL Security', 'When configured properly, MySQL ...');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booliTabelle`
--
ALTER TABLE `booliTabelle`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `booliTabelle` ADD FULLTEXT KEY `title` (`title`,`body`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booliTabelle`
--
ALTER TABLE `booliTabelle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
