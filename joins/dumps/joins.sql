-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2020 at 04:15 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `joins`
--
CREATE DATABASE IF NOT EXISTS `joins` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `joins`;

-- --------------------------------------------------------

--
-- Table structure for table `autoren`
--

CREATE TABLE `autoren` (
  `autor_id` int(3) NOT NULL,
  `vorname` varchar(40) NOT NULL,
  `nachname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autoren`
--

INSERT INTO `autoren` (`autor_id`, `vorname`, `nachname`) VALUES
(1, 'Peter', ' Muster'),
(2, 'Gabriela', 'Frei'),
(3, 'Johann', ' Bach'),
(4, 'Fritz', 'Gebhard'),
(5, 'John', 'Baker'),
(6, 'Elvis', 'Costello');

-- --------------------------------------------------------

--
-- Table structure for table `autoren2`
--

CREATE TABLE `autoren2` (
  `id` int(3) NOT NULL,
  `vorname` varchar(40) NOT NULL,
  `nachname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autoren2`
--

INSERT INTO `autoren2` (`id`, `vorname`, `nachname`) VALUES
(1, 'Peter', ' Muster'),
(2, 'Gabriela', 'Frei'),
(3, 'Johann', ' Bach'),
(4, 'Fritz', 'Gebhard'),
(5, 'John', 'Baker'),
(6, 'Elvis', 'Costello');

-- --------------------------------------------------------

--
-- Table structure for table `beitraege`
--

CREATE TABLE `beitraege` (
  `beitrag_id` int(3) NOT NULL,
  `thema` int(3) NOT NULL,
  `titel` varchar(50) NOT NULL,
  `autor_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beitraege`
--

INSERT INTO `beitraege` (`beitrag_id`, `thema`, `titel`, `autor_id`) VALUES
(1, 2, 'Der Preis ist heiss', 1),
(2, 2, 'Der Zebra und das Tiger', 2),
(3, 3, 'Die Antarktis im Sommer', 2),
(4, 2, 'Mein Grossvater beim Bergsteigen', 2),
(5, 3, 'Surfen im Atlantik: Beste Spots in Frankreich', 2),
(6, 23, 'The Unknown Author', 222),
(7, 33, 'Aktenzeichen XY ungelöst', 333);

-- --------------------------------------------------------

--
-- Table structure for table `beitraege2`
--

CREATE TABLE `beitraege2` (
  `id` int(3) NOT NULL,
  `thema` int(3) NOT NULL,
  `titel` varchar(50) NOT NULL,
  `autor_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beitraege2`
--

INSERT INTO `beitraege2` (`id`, `thema`, `titel`, `autor_id`) VALUES
(1, 2, 'Der Preis ist heiss', 1),
(2, 2, 'Der Zebra und das Tiger', 2),
(3, 3, 'Die Antarktis im Sommer', 2),
(4, 2, 'Mein Grossvater beim Bergsteigen', 2),
(5, 3, 'Surfen im Atlantik: Beste Spots in Frankreich', 2),
(6, 23, 'The Unknown Author', 222),
(7, 33, 'Aktenzeichen XY ungelöst', 333);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(3) NOT NULL,
  `book_tit` varchar(50) NOT NULL,
  `isbn_no` varchar(50) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `pub_lang` varchar(20) NOT NULL,
  `book_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_tit`, `isbn_no`, `cat_id`, `pub_lang`, `book_price`) VALUES
(1, 'Introduction to Electrodynamics', '979001', 1, 'English', '85'),
(2, 'Understanding of Steel Construction', '979002', 2, 'English', '105.5'),
(3, 'Guide to Networking', '979003', 3, 'Hindi', '200'),
(4, 'Transfer of Heat and Mass', '979004', 2, 'English', '250'),
(5, 'Conceptual Physics', '979005', 1, 'Italian', '145'),
(6, 'Fundamentals of Heat', '979006', 1, 'German', '112'),
(7, 'Advanced 3d Graphics', '979007', 3, 'Hindi', '56'),
(8, 'Human Anatomy', '979008', 5, 'German', '50.5'),
(9, 'Mental Health Nursing', '979009', 5, 'English', '145'),
(10, 'Fundamentals of Thermodynamics', '979010', 2, 'English', '225'),
(11, 'The Experimental Analysis of Cat', '979011', 4, 'French', '95'),
(12, 'The Nature of World', '979012', 4, 'English', '88'),
(13, 'Environment a Sustainable Future', '979013', 4, 'German', '100'),
(14, 'Concepts in Health', '979014', 5, 'Italian', '180'),
(15, 'Anatomy & Physiology', '979015', 5, 'Hindi', '135'),
(16, 'The Nirvans is invisible', '00009790_16', 3, 'English', '45');

-- --------------------------------------------------------

--
-- Table structure for table `book_cat`
--

CREATE TABLE `book_cat` (
  `cat_id` int(3) NOT NULL,
  `cat_descr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_cat`
--

INSERT INTO `book_cat` (`cat_id`, `cat_descr`) VALUES
(1, 'Science'),
(2, 'Technology'),
(3, 'Computers'),
(4, 'Nature'),
(5, 'Medical');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autoren`
--
ALTER TABLE `autoren`
  ADD PRIMARY KEY (`autor_id`);

--
-- Indexes for table `autoren2`
--
ALTER TABLE `autoren2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beitraege`
--
ALTER TABLE `beitraege`
  ADD PRIMARY KEY (`beitrag_id`);

--
-- Indexes for table `beitraege2`
--
ALTER TABLE `beitraege2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `book_cat`
--
ALTER TABLE `book_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autoren`
--
ALTER TABLE `autoren`
  MODIFY `autor_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `autoren2`
--
ALTER TABLE `autoren2`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `beitraege`
--
ALTER TABLE `beitraege`
  MODIFY `beitrag_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `beitraege2`
--
ALTER TABLE `beitraege2`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `book_cat`
--
ALTER TABLE `book_cat`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `book_cat` (`cat_id`);
