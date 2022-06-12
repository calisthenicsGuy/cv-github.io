-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2022 at 05:58 PM
-- Server version: 10.3.35-MariaDB-log
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svetso519_exampledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `user` int(11) NOT NULL,
  `skill` varchar(50) COLLATE cp1251_bulgarian_ci NOT NULL,
  `percent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE=cp1251_bulgarian_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`user`, `skill`, `percent`) VALUES
(1, 'JavaScript', 80),
(1, 'C#', 30),
(1, 'Java', 45),
(2, 'C#', 80),
(2, 'JavaScript', 50),
(2, 'HTML', 65),
(2, 'CSS', 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE cp1251_bulgarian_ci NOT NULL,
  `about` varchar(1000) COLLATE cp1251_bulgarian_ci NOT NULL,
  `email` varchar(50) COLLATE cp1251_bulgarian_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `github` varchar(25) COLLATE cp1251_bulgarian_ci NOT NULL,
  `other` varchar(1000) COLLATE cp1251_bulgarian_ci NOT NULL,
  `birthdate` varchar(15) COLLATE cp1251_bulgarian_ci NOT NULL,
  `website` varchar(100) COLLATE cp1251_bulgarian_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE=cp1251_bulgarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `about`, `email`, `phone`, `github`, `other`, `birthdate`, `website`) VALUES
(1, 'Bozhidar Ivanov', 'My name is Bozho. I\'m a self-taught developer that currently lives and studies in Varna, Bulgaria.', 'bozhoivanow@gmail.com', 894470222, 'notbozho', 'Currently exploring Minecraft Modding with Java. Outside of programming I love skateboarding.', '25/05/2005', 'www.bozho.codes'),
(2, 'Radoslav Radev\r\n', 'My name is Rado. I currently live and study in Varna, Bulgaria.', 'radevradoslav12@gmail.com', 877475376, 'calisthenicsGuy', 'I am really into self development. Outside of programming I like to listen to podcasts and do sports such as calisthenics and football.', '13/12/2005', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
