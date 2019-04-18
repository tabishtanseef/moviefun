-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 02:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviefun`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `link`) VALUES
(1, 'Bollywood', 'bw'),
(2, 'Hollywood', 'hw'),
(3, 'Hollywood Dual Audio', 'hda'),
(4, 'Animated (English and Dubbed)', 'am'),
(5, 'English TV Shows', 'etv'),
(6, 'Hindi TV Shows', 'htv'),
(7, 'South Indian Dubbed', 'sid'),
(8, 'Pakistan TV Shows', 'ptv');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `gen_id` int(11) NOT NULL,
  `gen_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`gen_id`, `gen_title`) VALUES
(1, 'Horror'),
(2, 'Romance'),
(3, 'Comedy'),
(4, 'Drama'),
(5, 'Sci-fi'),
(6, 'Thriller'),
(7, 'Adventurous'),
(8, 'Action'),
(9, 'Crime'),
(10, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `cat` varchar(100) NOT NULL,
  `gen` varchar(100) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `movie_desc` text NOT NULL,
  `link` varchar(200) NOT NULL,
  `movie_keywords` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`cat`, `gen`, `movie_id`, `movie_title`, `image`, `movie_desc`, `link`, `movie_keywords`, `date`) VALUES
('English TV Shows', 'Thriller', 8, 'Game of Thrones Season 8 Episode 1', 'earver89i6.jpg', '<p>csfds</p>', 'https://drive.google.com/open?id=1cQNKkWr_ah4TSiZwRSvLjnPAnLBbyLB3', 'svsdg', '2019-04-18 10:55:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`gen_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
