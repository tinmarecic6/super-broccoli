-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql206.infinityfree.com
-- Generation Time: Jun 06, 2023 at 11:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_26370711_app_vlasta`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `guest_name` varchar(40) NOT NULL,
  `has_pet` tinyint(1) NOT NULL DEFAULT 0,
  `pet_price` int(11) NOT NULL,
  `accontation` float NOT NULL,
  `unit_price` float NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `date_of_bill` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `guest_name`, `has_pet`, `pet_price`, `accontation`, `unit_price`, `date_from`, `date_to`, `date_of_bill`) VALUES
(34, 'Berislav Dželalija', 0, 7, 300, 300, '2020-07-17', '2020-07-19', '2020-07-16 12:33:31'),
(35, 'Kristina Kovačević', 0, 7, 200, 300, '2020-07-17', '2020-07-22', '2020-07-16 12:37:40'),
(36, 'Domagoj Gombović', 0, 7, 300, 300, '2020-07-08', '2020-07-12', '2020-07-16 12:41:24'),
(37, 'Danijela Petrović', 0, 7, 300, 300, '2020-07-22', '2020-07-26', '2020-07-21 10:57:08'),
(38, 'Asja Frank Perčić', 0, 7, 300, 300, '2020-07-27', '2020-08-03', '2020-07-27 14:18:27'),
(39, 'Marinela Alduk', 0, 7, 300, 300, '2020-07-29', '2020-08-03', '2020-07-28 09:41:04'),
(40, 'Tomislav Prosinečki', 0, 7, 300, 300, '2020-08-03', '2020-08-09', '2020-08-02 12:07:47'),
(41, 'Katarina Bekčić Tikvić', 0, 7, 300, 300, '2020-08-03', '2020-08-10', '2020-08-02 12:08:48'),
(42, 'Karolina Vrabec', 0, 7, 300, 300, '2020-08-10', '2020-08-14', '2020-08-02 12:09:51'),
(43, 'Tomasz Iwan', 0, 7, 300, 225, '2020-08-12', '2020-08-20', '2020-08-13 20:25:22'),
(44, 'Mate Vokić', 0, 7, 300, 340, '2020-08-15', '2020-08-18', '2020-08-13 20:26:08'),
(45, 'Tomasz Iwan', 0, 7, 300, 225, '2020-08-12', '2020-08-20', '2020-08-13 20:35:54'),
(46, 'Mate Vokić', 0, 7, 300, 340, '2020-08-15', '2020-08-18', '2020-08-13 20:37:43'),
(47, 'Ana Galović', 0, 7, 300, 376, '2020-08-18', '2020-08-25', '2020-08-17 07:28:47'),
(48, 'Dominik Widacha', 0, 7, 375, 316, '2020-08-22', '2020-08-28', '2020-08-22 10:21:09'),
(49, 'Prosinečki', 0, 7, 0, 300, '2020-08-25', '2020-08-30', '2020-08-24 16:27:52'),
(50, 'Mark Kruse', 1, 0, 375, 450, '2021-07-18', '2021-08-01', '2021-07-19 10:49:55'),
(51, 'Igor Dulabić', 0, 7, 375, 412, '2021-07-19', '2021-07-29', '2021-07-19 10:52:14'),
(52, 'Josip Bedeković', 0, 7, 300, 600, '2021-07-30', '2021-08-01', '2021-07-29 18:31:43'),
(53, 'Snježana Blažević', 0, 7, 500, 487, '2021-08-01', '2021-08-07', '2021-08-01 18:52:41'),
(54, 'Tomislav Prosinečki', 0, 7, 0, 370, '2021-08-02', '2021-08-02', '2021-08-01 18:53:58'),
(55, 'Tomislav Prosinečki', 0, 7, 0, 370, '2021-08-02', '2021-08-12', '2021-08-01 18:55:37'),
(56, 'Marina Svetić', 1, 0, 300, 487, '2021-08-09', '2021-08-15', '2021-08-10 12:50:16'),
(57, 'Zlatko Celiković', 0, 7, 375, 487, '2021-08-14', '2021-08-21', '2021-08-14 13:25:35'),
(58, 'Andromeda Bahat Strmečki', 0, 7, 300, 475, '2021-08-15', '2021-08-20', '2021-08-14 13:27:22'),
(59, 'Sanja Kmet', 0, 7, 0, 412, '2021-08-21', '2021-08-25', '2021-08-24 12:15:14'),
(60, 'Wolfgang Klein', 0, 7, 750, 412, '2021-08-21', '2021-09-12', '2021-08-24 12:16:43'),
(61, 'Sanja Kmet', 0, 7, 0, 412, '2021-08-22', '2021-08-25', '2021-08-24 12:19:35'),
(62, 'Tomislav Prosinečki', 0, 7, 0, 300, '2022-06-14', '2022-06-24', '2022-06-14 19:35:01'),
(63, 'Anita Paranos ', 0, 7, 0, 375, '2022-06-15', '2022-06-19', '2022-06-17 19:20:25'),
(64, 'Prosinečki Krešimir', 0, 7, 0, 200, '2022-06-14', '2022-06-24', '2022-06-17 19:26:38'),
(65, 'Wolfgang Klein', 0, 7, 350, 456, '2022-07-01', '2022-07-22', '2022-07-04 15:21:19'),
(66, 'Samir Čaušević', 0, 7, 350, 487, '2022-07-04', '2022-07-09', '2022-07-04 15:23:34'),
(67, 'Radmila Pašić', 0, 7, 350, 487, '2022-07-09', '2022-07-16', '2022-07-12 16:07:11'),
(68, 'Darja Ramot', 1, 0, 350, 487, '2022-07-17', '2022-07-27', '2022-07-18 20:28:07'),
(69, 'Mark Kruse', 1, 0, 375, 450, '2022-07-22', '2022-08-01', '2022-07-27 17:03:45'),
(70, 'Marina Svetić', 1, 0, 400, 487, '2022-07-31', '2022-08-05', '2022-08-01 20:11:00'),
(71, 'Tomislav Prosinečki', 0, 7, 0, 300, '2022-08-01', '2022-08-10', '2022-08-01 20:12:30'),
(72, 'Krešimir Prosinečki', 0, 7, 0, 300, '2022-08-05', '2022-08-15', '2022-08-09 19:15:15'),
(73, 'Štefan Žebovec', 0, 7, 375, 488, '2022-08-10', '2022-08-18', '2022-08-10 20:18:57'),
(74, 'Margit Royer', 0, 7, 375, 487, '2022-08-27', '2022-09-01', '2022-08-21 14:57:38'),
(75, 'Margit Royer', 0, 7, 0, 412, '2022-08-21', '2022-08-22', '2022-08-21 14:59:35'),
(76, 'Margit Royer', 0, 7, 0, 412, '2022-09-01', '2022-09-05', '2022-08-21 15:00:13'),
(77, 'Kata Adamiš', 0, 7, 375, 487, '2022-08-30', '2022-09-01', '2022-08-21 15:02:07'),
(78, 'Kata Adamiš', 0, 7, 0, 412, '2022-09-01', '2022-09-03', '2022-08-21 15:03:02'),
(79, 'Kata Adamiš', 0, 7, 375, 478, '2022-08-30', '2022-08-31', '2022-08-21 15:11:51'),
(80, 'Margit Royer', 0, 7, 0, 412, '2022-08-27', '2022-08-31', '2022-08-21 15:15:15'),
(81, 'Margit Royer', 0, 7, 375, 487, '2022-08-27', '2022-08-31', '2022-08-21 15:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `bill_test`
--

CREATE TABLE `bill_test` (
  `id` int(11) NOT NULL,
  `guest_name` varchar(40) NOT NULL,
  `has_pet` tinyint(1) NOT NULL DEFAULT 0,
  `pet_price` int(11) NOT NULL,
  `accontation` float NOT NULL,
  `unit_price` float NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `date_of_bill` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill_test`
--

INSERT INTO `bill_test` (`id`, `guest_name`, `has_pet`, `pet_price`, `accontation`, `unit_price`, `date_from`, `date_to`, `date_of_bill`) VALUES
(55, 'čć', 0, 7, 50, 50, '2020-07-17', '2020-07-18', '2020-07-17 14:22:45'),
(56, 'Marečić', 0, 7, 50, 50, '2020-07-20', '2020-07-21', '2020-07-17 14:28:28'),
(57, 'Berislav Dželalija', 0, 7, 300, 300, '2020-07-17', '2020-07-19', '2020-07-21 09:46:11'),
(58, 'Tin', 1, 10, 300, 300, '2020-07-28', '2020-08-02', '2020-07-28 09:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'ostefani', 'orjena01@gmail.com', 'b4f1adb6edc4725faf51f97befc15b6a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_test`
--
ALTER TABLE `bill_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `bill_test`
--
ALTER TABLE `bill_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
