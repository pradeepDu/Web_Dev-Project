-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 12:11 AM
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
  `expertname` varchar(250) NOT NULL,
  `expertfullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`expert_id`, `expertname`, `expertfullname`, `password`, `email`) VALUES
(1, 'rucha', 'Rucha Gavade', '$2y$10$c3TCuRviqkFJ0FOayP0thOlxsGGlZ74GvGiLWdGY06wGbCLTQPp86', 'e@e.com'),
(2, 'yash', 'Yash M', '$2y$10$c3TCuRviqkFJ0FOayP0thOlxsGGlZ74GvGiLWdGY06wGbCLTQPp86', 'yash@gmail.com'),
(3, 'yash2', 'Yash Mahamulkar', '$2y$10$66VIvhdxvqJZHpCoHA2E.eECYwsPJA9hoLiNawIQdNLAD8fJX2Dp2', 'yash@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userfullname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `user_name`, `email`, `password`, `userfullname`) VALUES
(1, 'ymmahamulkar@gmail.com', 'asfd@dg.com', '$2y$10$jS3tttBwX6fMK4TvVksS5eIAJbiJ9IAb53UB6DRkIWvJhjLGJcFqS', 'y'),
(2, 'ab', 'a@b.com', '$2y$10$slrBnZr5vvWgbUc0aKFHW.rpD6X6kj.fYPkDiGHcItsda80.WlhVK', 'abs'),
(3, 'asd', 'asd@gmail.com', '$2y$10$yryodsDBYznv.bxWJTLgNenYGoBL6ovPOvNiX.YfYoG3zDyMXewTq', 'asdn');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `feedback` text NOT NULL,
  `previous_query_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`query_id`, `user_id`, `expert_id`, `type`, `query_text`, `reply_text`, `status`, `created_at`, `updated_at`, `feedback`, `previous_query_id`) VALUES
(3, 1, 1, 'Budgeting Advice', 'as', 'resolved now\r\n', 'resolved', '2024-03-27 21:00:57', '2024-04-02 11:28:20', '', 0),
(4, 1, 1, 'Budgeting Advice', 'as', 'as', 'resolved', '2024-03-27 21:01:16', '2024-04-02 11:28:11', '', 3),
(5, 1, NULL, 'Budgeting Advice', 'as', NULL, 'resolved', '2024-03-27 21:11:35', '2024-04-02 11:28:09', '', 4),
(6, 1, NULL, 'Estate Planning', 'which property to buy', NULL, 'resolved', '2024-03-27 21:54:47', '2024-03-27 21:55:38', '', NULL),
(7, 1, 1, 'Insurance Planning', 'which insurance to buy', 'asasd', 'resolved', '2024-03-28 19:35:20', '2024-03-28 15:08:21', '', NULL),
(8, 2, 1, 'Insurance Planning', 'which insurance to buy', 'buy lic', 'resolved', '2024-03-28 19:36:49', '2024-04-03 18:24:15', 'Not Satisfied', NULL),
(9, 2, 2, 'Estate Planning', 'sfd', 'ASASD', 'resolved', '2024-03-28 19:48:26', '2024-04-03 19:48:01', 'Not Satisfied', NULL),
(10, 2, 2, 'Insurance Planning', 'as', 'HI\r\n', 'resolved', '2024-03-28 19:49:39', '2024-04-02 11:02:29', 'Satisfied', NULL),
(11, 1, NULL, 'Budgeting Advice', 'asd', 'asd', 'resolved', '2024-03-29 07:39:09', '2024-03-29 03:20:16', '', NULL),
(12, 2, NULL, 'Budgeting Advice', '', 'hi i am yash', 'resolved', '2024-03-29 07:41:43', '2024-03-29 03:20:25', '', NULL),
(13, 2, NULL, 'Education Planning', 'sad', 'i this is last one', 'resolved', '2024-03-29 07:41:53', '2024-03-29 03:21:32', '', NULL),
(14, 2, 2, 'Budgeting Advice', 'last one', 'last', 'resolved', '2024-03-29 07:56:55', '2024-03-29 03:27:01', '', NULL),
(15, 2, 2, 'Tax Planning', 'how much tax should i pay', '15%', 'resolved', '2024-04-02 08:20:19', '2024-04-02 11:15:54', 'Satisfied', NULL),
(16, 2, 2, 'Budgeting Advice', 'as', NULL, 'open', '2024-04-02 09:50:01', '2024-04-02 09:50:01', '', NULL),
(17, 2, 1, 'Budgeting Advice', 'sda', NULL, 'open', '2024-04-02 09:50:04', '2024-04-02 09:50:04', '', NULL),
(18, 2, 2, 'Budgeting Advice', 'sda', 'ads', 'resolved', '2024-04-02 09:50:15', '2024-04-03 17:53:58', '', NULL),
(19, 2, 2, 'Budgeting Advice', 'ads', NULL, 'open', '2024-04-02 10:06:49', '2024-04-02 10:06:49', '', NULL),
(27, 2, 2, '', 'as', 'bs', 'resolved', '2024-04-02 12:37:35', '2024-04-03 05:43:32', '', NULL),
(28, 2, 1, 'Insurance Planning', 'ads', NULL, 'open', '2024-04-03 09:02:22', '2024-04-03 09:02:22', '', NULL),
(29, 2, 1, 'Insurance Planning', 'fsd', NULL, 'open', '2024-04-03 09:08:58', '2024-04-03 09:08:58', '', 8),
(30, 2, 2, 'Estate Planning', 'sda', 'asd', 'resolved', '2024-04-03 09:14:15', '2024-04-03 05:44:21', '', 9),
(31, 2, 2, 'Estate Planning', 'asddf', NULL, 'open', '2024-04-03 09:14:36', '2024-04-03 09:14:36', '', 30),
(32, 2, 1, 'Budgeting Advice', 'sdfad', NULL, 'open', '2024-04-03 09:16:34', '2024-04-03 09:16:34', '', NULL),
(33, 2, 1, 'Savings and Emergency Fund', 'give me money', NULL, 'open', '2024-04-03 10:35:27', '2024-04-03 10:35:27', '', NULL),
(34, 2, 2, 'Real Estate Advice', 'hi yash', 'hello', 'resolved', '2024-04-03 10:37:43', '2024-04-03 10:40:12', 'Satisfied', NULL),
(35, 2, 2, 'Real Estate Advice', 'q2', 'q2 reply', 'resolved', '2024-04-03 10:41:29', '2024-04-03 10:42:27', 'Satisfied', 34),
(36, 2, 2, 'Real Estate Advice', 'q3', NULL, 'open', '2024-04-03 10:42:41', '2024-04-03 10:42:41', '', 35),
(37, 2, 1, 'Insurance Planning', 'asd', NULL, 'open', '2024-04-03 20:41:46', '2024-04-03 20:41:46', '', 8),
(38, 2, 3, 'Budgeting Advice', 'asd', NULL, 'open', '2024-04-03 21:43:03', '2024-04-03 21:43:03', '', NULL),
(39, 3, 2, 'Savings and Emergency Fund', 'asd', NULL, 'open', '2024-04-03 22:04:44', '2024-04-03 22:04:44', '', NULL);

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
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `expert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
