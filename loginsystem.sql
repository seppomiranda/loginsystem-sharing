-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19.12.2019 klo 12:23
-- Palvelimen versio: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `files`
--

CREATE TABLE `files` (
  `fileId` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `filesName` varchar(255) NOT NULL,
  `filesComment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `files`
--

INSERT INTO `files` (`fileId`, `user`, `files`, `filesName`, `filesComment`) VALUES
(22, 'niilo123', 'Theia.jpg', 'Purjehdus kuvani', 'TÄMÄ SE ON'),
(24, 'niilo123', 'wallapper4k.jpg', 'Taustakuva', 'Minun tämän hetkinen taustakuvani.'),
(25, 'tapsa', 'wallpaper.jpg', 'Tapion ensimmäinen kuva', ''),
(26, 'niilo123', 'Näyttökuva (1).png', 'HÄHÄÄ', '');

-- --------------------------------------------------------

--
-- Rakenne taululle `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstName` tinytext NOT NULL,
  `lastName` tinytext NOT NULL,
  `username` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `pw` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `email`, `pw`) VALUES
(13, 'Niilo', 'Korhonen', 'niilo123', 'test1@email.com', '$2y$10$JE2wdDJjDgxrvlUDAu.Y7e.97MwRdiu582bxiryKXL/ALETNmllBi'),
(15, 'Tapio', 'Rajala', 'tapsa', 'tapza@asd.com', '$2y$10$o8Xk6XK0pQgpQzkjcLsxK.FJO2K32jtChbmgbLME3TYR0F9BaYbPO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fileId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
