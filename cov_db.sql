-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 09:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cov_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `idride` int(11) NOT NULL,
  `pickup` varchar(225) COLLATE utf8_bin NOT NULL,
  `dropoff` varchar(225) COLLATE utf8_bin NOT NULL,
  `travelDate` datetime NOT NULL,
  `returnDate` datetime NOT NULL,
  `typeCar` varchar(225) COLLATE utf8_bin NOT NULL,
  `seats` int(11) NOT NULL,
  `luggage` varchar(225) COLLATE utf8_bin NOT NULL,
  `music` varchar(225) COLLATE utf8_bin NOT NULL,
  `cigarette` varchar(225) COLLATE utf8_bin NOT NULL,
  `animals` varchar(225) COLLATE utf8_bin NOT NULL,
  `children` varchar(225) COLLATE utf8_bin NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(225) COLLATE utf8_bin NOT NULL,
  `email` varchar(225) COLLATE utf8_bin NOT NULL,
  `phone` varchar(225) COLLATE utf8_bin NOT NULL,
  `username` varchar(225) COLLATE utf8_bin NOT NULL,
  `password` varchar(225) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `phone`, `username`, `password`) VALUES
(16, 'marwa', 'hens3159@gmail.com', '0611200612', 'moboukili', '$2y$10$rhwh4l8GSaK8MAO/y3EHs.CFe5e/j7xPhX0hogaPlyg.7872/Z/je'),
(15, 'boukili', 'mohamedboukili1998@gmail.com', '335367575', 'momo', 'aqwxsz'),
(17, 'nabil boukil', 'nabilboukili1994@gmail.com', '0611200621', 'boukili', '$2y$10$WmC1beJm6vZTdQijEvry4eABhsPqK1btJ0uVePQFNeRRbXQlC5K/e'),
(18, 'marwa boukili', 'boukili@gmail.com', '0611200614', 'mboukili', '$2y$10$A7hPktAwWdQdDAuOIuY8OezsnatpVowtLwfGqoj8ZI.Au.f/4sfTi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`idride`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `idride` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
