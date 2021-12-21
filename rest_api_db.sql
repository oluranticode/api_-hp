-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 09:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest_api_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('pending','ongoing','hold','completed') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`id`, `user_id`, `name`, `description`, `status`, `created_at`) VALUES
(1, 5, 'temitope', 'my project', 'pending', '2021-12-19 14:13:08'),
(2, 5, 'temitope', 'my project', 'pending', '2021-12-19 14:16:36'),
(3, 5, 'project 1', 'my project', 'hold', '2021-12-19 14:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `name`, `email`, `mobile`, `status`, `created_at`) VALUES
(1, 'Temitope', 'alukotemitope34@gmail.com', '09887653789', 1, '2021-12-13 19:35:10'),
(2, 'oluranti', 'alukotemitope34@gmail.com', '09887653789', 1, '2021-12-13 19:41:17'),
(3, 'temitope', 'damilotunaluko@gmail.com', '867898973853', 1, '2021-12-13 21:32:52'),
(5, 'tope', 'damilotunaluko@gmail.com', '867898973853', 1, '2021-12-14 11:14:42'),
(6, 'Temitope', 'alukotemitope34@gmail.com', '09887653789', 1, '2021-12-15 11:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'dammi', 'damitemi700@gmail.com', '$2y$10$ppsmo.dd2KxaZEfFEsc5IeDaDg5TSWXJVPoAwmufk.2', '2021-12-17 20:49:37'),
(2, 'tope', 'tope@gmail.com', '$2y$10$zqWD1kavvxD5u6WFNaOLN.nKUd9X9sUylFsIR3opYnC', '2021-12-17 21:26:14'),
(3, 'topilo', 'topilo@gmail.com', '$2y$10$/ijll/RofVV6mSdwmK5T6exyRmfrOLElirRaL9pIhCH', '2021-12-17 21:34:34'),
(4, 'test', 'test@gmail.com', '$2y$10$ZZDKn9fgt9/7Ba2/NgcMfeQOCqPbD9/Vr21zgKwFZh6', '2021-12-18 08:58:20'),
(5, 'test1', 'test1@gmail.com', '$2y$10$df0fz.Yt.LPgQgG71/LSDehi4H0RKy6ZhX6QCdgHUCd', '2021-12-18 12:01:34'),
(6, 'test12', 'test12@gmail.com', '123456782', '2021-12-18 12:54:49'),
(7, 'test123', 'test123@gmail.com', '5fa3efef8e662269245e95fe1886d0f2', '2021-12-18 13:01:03'),
(8, 'olu', 'olu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2021-12-18 13:37:38'),
(11, 'topealuko', 'topealuko@gmail.com', '$2y$10$b9ReufiQbAs3.jYZ1GajUuBrGaXAiGlvXt.nPE7qnpC', '2021-12-20 15:34:47'),
(12, 'sam', 'sam@gmail.com', '$2y$10$n9aNLOZkHwV44EmBVDwVJ.R1DoFKsef/anszSCJ/HHQ', '2021-12-20 22:32:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
