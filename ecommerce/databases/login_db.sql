-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 11:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'nhorneth1@gmail.com', '$2y$10$6DfHhdv3yIRXZ.PmpgcLqueMQ7I/.KVnjf8AnC2Q0F8FFz6lTXdpy'),
(2, 'yyou19492@gmail.com', '$2y$10$03RDoY4pHozM5bnKQ88GheS34fKmB62od.GFFGYC8.8aAj/QA1F8.'),
(3, 'aicheat184@gmail.com', '$2y$10$njm0CQKwahl8iGXe4uYWQ.Hhs9Z/rtsBmuNoMGwvIX.SROCcJootS'),
(4, 'phaklovgaming@gmail.com', '$2y$10$ih7.vXLO3cfH9bOF3GgZ6ua8kVq2pa9r3Dy6aWQNXWxpLjlYcoCYi'),
(5, 'nethnhor1@gmail.com', '$2y$10$zKde3eEpMuPpwJ2L6ELFc.2nPCWoKL6MBTC8TEA9JABFF/K7PMa2O'),
(6, 'netsmos100', '$2y$10$.nIOKRxLoo5ZnslrlwIFH.YLo5nJsTGMGHhEzkI.MKziIorHpCvIi'),
(7, 'net', '$2y$10$EqQnn.Cx.msTVQvLdJ2/Zup5a6/P1n0ZsPJoAOzZe8/KZ0XYrSNfa'),
(8, 'plo', '$2y$10$ATi3OvtcvDw2t4yeg1u3iuK299VyFkuNyp2Szu19KaeKhCFmC4zhy'),
(9, 'plobplub@gmail.com', '$2y$10$uBG4f5VMByUvZGUD9Vi9gOVJZM197ndGa9QDl.WLqmRnIMKixBpEC'),
(10, 'plobplub11@gmail.com', '$2y$10$9D72cEGC7mx3QSVFlL/e1.VScrg5r9jh.rfUMVmKIFb02A3UHbCQe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
