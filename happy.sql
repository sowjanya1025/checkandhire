-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2021 at 07:20 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `happy`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `social_id` text NOT NULL,
  `login_type` varchar(100) NOT NULL,
  `device_token` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL COMMENT '1=login and 0=logout',
  `is_active` varchar(100) NOT NULL COMMENT '1=active and 0=block',
  `verification` varchar(100) NOT NULL COMMENT '0=not verified, 1=verified',
  `otp` text NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `gender`, `phone_number`, `location`, `social_id`, `login_type`, `device_token`, `password`, `profile`, `status`, `is_active`, `verification`, `otp`, `date_time`, `created_at`, `updated_at`) VALUES
(5, 'Bilal', 'Malik', 'bilalmalik1561@gmail.com', 'Male', '8477908696', 'Najibabad', '0', 'mobile', '0', '$2y$10$gnAEF8rcXpfnGXYtYtt52On7WGOYoMOHyBe81YY3rE46Vd7UIIaPO', '0', '1', '1', '1', '59643', '06-02-2021 : 11:02:00 am', '2021-02-06 11:38:00', '2021-02-06 06:20:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
