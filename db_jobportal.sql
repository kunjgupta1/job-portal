-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2020 at 09:46 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `get_job`
--

CREATE TABLE `get_job` (
  `job_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_job`
--

CREATE TABLE `post_job` (
  `post_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `job_description` varchar(300) NOT NULL,
  `post_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_job`
--

INSERT INTO `post_job` (`post_id`, `login_id`, `job_title`, `company_name`, `experience`, `salary`, `location`, `job_description`, `post_date`) VALUES
(1, 1, 'web developer', 'kunj & hemant ', '2-3 Years', '$2000', 'Ajmer,Rajasthan', 'php', 'Sunday 20th of December 2020');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `login_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `skill` varchar(100) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `project` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`login_id`, `name`, `username`, `email`, `password`, `phone_number`, `skill`, `experience`, `project`) VALUES
(1, 'kunj', 'kunj1', 'kunj1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '8005541317', 'full stack developer,machine learning,IOT', '2-3 Years', 'php'),
(2, 'hemant', 'hemant123', 'hemant1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567891', 'full stack developer,machine learning,IOT', '2-3 Years', 'bhaut sare '),
(3, 'kunj', 'kunj1234', 'kunj@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '8005541312', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `get_job`
--
ALTER TABLE `get_job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_job`
--
ALTER TABLE `post_job`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `get_job`
--
ALTER TABLE `get_job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_job`
--
ALTER TABLE `post_job`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `get_job`
--
ALTER TABLE `get_job`
  ADD CONSTRAINT `get_job_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post_job` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
