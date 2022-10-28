-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 07:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `photo`, `created_at`) VALUES
(1, 'aye khat', 'ayekhat3344@gmail.com', '$2y$10$gDYwKSJBOpjbl0Mvy4/eD.EhyJAUbli2EWSDZtma5NsU88GzOMSz.', '2', 'default.png', '2022-08-20 16:54:33'),
(2, 'admin', 'admin@gmail.com', '$2y$10$54QgjF8GxQLv9QpbGSQSju5ot6WLnQ5bM9s734PNQogPwrgz7z0Ru', '2', 'default.png', '2022-08-20 16:54:49'),
(3, 'admin1', 'admin1@gmail.com', '$2y$10$yn5YPCTgp8h7g/ihCh74IOKozaFJ/9nfdGaFW/xy5rtaFm5OVNrt6', '2', 'default.png', '2022-08-20 16:56:55'),
(4, 'sfsafa', 'three@gmail.com', '$2y$10$Q0JVSQ68USxEnuh29jnCZelQbOavCs/wF82Tw2a7gcjHfehCI/dm2', '2', 'default.png', '2022-08-20 16:58:54'),
(5, 'khaing', 'khaing@gmail.com', '$2y$10$wHEzvvs6FS8L5hZ2w3JNPu/fdOETPnlTQ7uPN4QsDezi6/cO55Rfe', '2', 'default.png', '2022-08-20 16:59:38'),
(6, 'akkk', 'akkk@gmail.com', '$2y$10$88Jy.KbG0k.JzOXNKwf1LeB2kFP.p2NCJjcs1zZQc4jF5lOjyBBKO', '2', 'default.png', '2022-08-20 17:00:09'),
(7, 'mg', 'mg@gmail.com', '$2y$10$oUOz4m1HG64ccy/jWK3C8.8275mt4UwXeCLAYi9JjzkbEDJs1zlki', '2', 'default.png', '2022-08-20 17:00:44');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
