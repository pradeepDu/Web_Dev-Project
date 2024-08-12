-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 11:02 PM
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
-- Table structure for table `experts`
--

CREATE TABLE `experts` (
  `expert_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_name`, `email`, `password`) VALUES
(1, 'ymmahamulkar@gmail.com', 'asfd@dg.com', '$2y$10$jS3tttBwX6fMK4TvVksS5eIAJbiJ9IAb53UB6DRkIWvJhjLGJcFqS'),
(2, 'ab', 'a@b.com', '$2y$10$slrBnZr5vvWgbUc0aKFHW.rpD6X6kj.fYPkDiGHcItsda80.WlhVK');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `query_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expert_id` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `query_text` text NOT NULL,
  `reply_text` text DEFAULT NULL,
  `status` enum('open','resolved') DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`query_id`, `user_id`, `expert_id`, `type`, `query_text`, `reply_text`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, NULL, 'Budgeting Advice', 'as', NULL, 'open', '2024-03-27 21:00:57', '2024-03-27 21:00:57'),
(4, 1, NULL, 'Budgeting Advice', 'as', NULL, 'open', '2024-03-27 21:01:16', '2024-03-27 21:01:16'),
(5, 1, NULL, 'Budgeting Advice', 'as', NULL, 'resolved', '2024-03-27 21:11:35', '2024-03-27 21:26:44'),
(6, 1, NULL, 'Estate Planning', 'which property to buy', NULL, 'resolved', '2024-03-27 21:54:47', '2024-03-27 21:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ucontact`
--

CREATE TABLE `ucontact` (
  `uid` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `query` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ucontact`
--

INSERT INTO `ucontact` (`uid`, `name`, `email`, `age`, `phone`, `query`) VALUES
(1, 'rucha', 'rucha@gmail.com', 60, '2147483647', 'what is stock market'),
(2, 'yash', 'yash@gmail.com', 60, '1111111111', 'How do I start investment'),
(3, 'Yash Maruti Mahamulkar', 'ymmahamulkar@gmail.com', 15, '0', 'asd'),
(4, 'Yash Maruti Mahamulkar', 'ymmahamulkar@gmail.com', 15, 'f8HQ8dFrVW81dZo8i99LXg==', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experts`
--
ALTER TABLE `experts`
  ADD PRIMARY KEY (`expert_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ucontact`
--
ALTER TABLE `ucontact`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experts`
--
ALTER TABLE `experts`
  MODIFY `expert_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ucontact`
--
ALTER TABLE `ucontact`
  MODIFY `uid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
