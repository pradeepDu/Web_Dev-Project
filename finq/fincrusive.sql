-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8111
-- Generation Time: Mar 16, 2024 at 11:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fincrusive`
--

-- --------------------------------------------------------

--
-- Table structure for table `ucontact`
--

CREATE TABLE `ucontact` (
  `uid` int(3) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `phoneno` int(12) NOT NULL,
  `query` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ucontact`
--

INSERT INTO `ucontact` (`uid`, `uname`, `email`, `age`, `phoneno`, `query`) VALUES
(1, 'rucha', 'rucha@gmail.com', 60, 2147483647, 'what is stock market'),
(2, 'yash', 'yash@gmail.com', 60, 1111111111, 'How do I start investment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ucontact`
--
ALTER TABLE `ucontact`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ucontact`
--
ALTER TABLE `ucontact`
  MODIFY `uid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
