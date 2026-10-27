-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Oct 27, 2026 at 10:25 AM
-- Server version: 10.11.16-MariaDB-ubu2204
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectweek5B`
--

-- --------------------------------------------------------

--
-- Table structure for table `autos`
--

CREATE TABLE `autos` (
  `auto_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kenteken` varchar(10) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `bouwjaar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `autos`
--

INSERT INTO `autos` (`auto_id`, `user_id`, `kenteken`, `merk`, `model`, `bouwjaar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, '12-ABC-3', 'Volkswagen', 'Golf', 2015, '2026-10-27 09:18:54', NULL, NULL),
(2, 4, 'K-456-DF', 'Volkswagen', 'Polo', 2019, '2026-10-27 09:18:54', NULL, NULL),
(3, 5, '45-GH-JK', 'Toyota', 'Yaris', 2012, '2026-10-27 09:18:54', NULL, NULL),
(4, 5, '78-LM-NP', 'Volkswagen', 'Passat', 2008, '2026-10-27 09:18:54', NULL, NULL),
(5, 6, 'R-789-ST', 'Opel', 'Corsa', 2017, '2026-10-27 09:18:54', NULL, NULL),
(6, 6, 'X-321-VZ', 'Toyota', 'Corolla', 2021, '2026-10-27 09:18:54', NULL, NULL),
(7, 7, '91-BD-FG', 'Toyota', 'Aygo', 2010, '2026-10-27 09:18:54', NULL, NULL),
(8, 7, '34-HJ-KL', 'Ford', 'Focus', 2005, '2026-10-27 09:18:54', NULL, NULL),
(9, 8, 'Z-654-NR', 'Peugeot', '208', 2023, '2026-10-27 09:18:54', NULL, NULL),
(10, 8, '6-TVX-21', 'Renault', 'Clio', 2014, '2026-10-27 09:18:54', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`auto_id`),
  ADD UNIQUE KEY `kenteken` (`kenteken`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autos`
--
ALTER TABLE `autos`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
