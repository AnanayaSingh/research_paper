-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 03:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ics`
--

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `paper_id` int(11) NOT NULL,
  `paper_title` varchar(256) NOT NULL,
  `paper_topic` varchar(256) NOT NULL,
  `abstract` text NOT NULL,
  `keywords` varchar(256) NOT NULL,
  `paper_file` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`paper_id`, `paper_title`, `paper_topic`, `abstract`, `keywords`, `paper_file`) VALUES
(1, 'MyConfree: a web-based conference management system', 'Conference Management System', 'Most research results are published in a conference as a scientific paper. Paper management in a conference comprises of a long and complicated process starting from call for paper until the publication of the conference proceeding. ', 'conference, paper management, web-based, authors, reviewers, committees', 'uploads/1668070877MyConfree System (1).pdf'),
(2, 'A View of Artificial Neural Network', 'Neural Network', ' In this paper, An Artificial Neural Network or ANN, its various characteristics and business applications.', 'Artificial Neural Network, ANN, Feedback Network, Feed Forward Network', 'uploads/1668071212mishra2014.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `recommendation` varchar(256) NOT NULL,
  `review_result` varchar(256) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `status` enum('Review Pending','Rejected','Accepted','Published') NOT NULL,
  `user_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `recommendation`, `review_result`, `comment`, `status`, `user_id`, `paper_id`) VALUES
(1, 'Add future scope', 'Passed', 'Paper satisfies all requirements', 'Published', 2, 1),
(2, 'Please add results', 'Rejected', 'Missing Results', 'Rejected', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `instution` varchar(256) NOT NULL,
  `research_area` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `user_type` enum('reviewer','author','commitee','') NOT NULL DEFAULT 'author'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `instution`, `research_area`, `email`, `address`, `phone_number`, `user_type`) VALUES
(1, 'admin', 'admin', 'pass123', 'MIT WPU', '', 'admin@gmail.com', 'Pune', 7894561230, 'commitee'),
(2, 'reviewer', 'reviewer', 'pass123', 'MIT WPU', 'ML, NN, DBMS', 'reviewer@gmail.com', 'Pune', 7894561230, 'reviewer'),
(3, 'Karan Borkar', 'karan', 'pass123', 'MIT WPU', 'DBMS', 'karan@gmail.com', 'Pune', 8527410963, 'author'),
(4, 'Metta Santiputri', 'metta_santiputri', 'pass123', 'MIT WPU', 'DBMS', 'metta_santiputri@gmail.com', 'Pune', 9632145870, 'author'),
(5, 'Nindy Surya Agustin', 'nindy_agustin', 'pass123', 'MIT WPU', 'DBMS', 'nindy_agustin@gmail.com', 'Pune', 7539514268, 'author'),
(6, 'Mera kartika delimayanti', 'mera_delimayanti', 'pass123', 'MIT WPU', 'DBMS', 'mera_delimayanti@gmail.com', 'Pune', 8855331122, 'author');
(7, 'Delimayanti', '_delimayanti', 'pass123', 'MIT WPU', 'DBMS', 'delimayanti@gmail.com', 'Pune', 8890331188, 'author');
-- --------------------------------------------------------

--
-- Table structure for table `writes`
--

CREATE TABLE `writes` (
  `author_user_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `writes`
--

INSERT INTO `writes` (`author_user_id`, `paper_id`) VALUES
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(4, 2),
(5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
