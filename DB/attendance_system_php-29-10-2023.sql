-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2023 at 12:45 AM
-- Server version: 10.6.15-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softkitx_attendance_system_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `attendance_date`, `attendance_time`) VALUES
(1, '5', '2023-09-03', '09:30:05'),
(2, '6', '2023-09-03', '09:25:08'),
(3, '7', '2023-09-03', '11:02:44'),
(4, '4', '2023-09-03', '11:33:39'),
(5, '4', '2023-09-04', '11:35:22'),
(6, '7', '2023-09-04', '11:09:18'),
(7, '6', '2023-09-04', '09:35:13'),
(8, '5', '2023-09-04', '12:00:30'),
(9, '3', '2023-09-04', '09:41:14'),
(10, '5', '2023-09-05', '09:55:55'),
(11, '6', '2023-09-05', '09:58:35'),
(12, '3', '2023-09-05', '10:12:59'),
(13, '7', '2023-09-05', '11:21:44'),
(14, '4', '2023-09-05', '11:29:03'),
(15, '5', '2023-09-06', '09:53:40'),
(16, '6', '2023-09-06', '09:56:33'),
(17, '3', '2023-09-06', '09:57:12'),
(18, '7', '2023-09-06', '11:08:42'),
(19, '4', '2023-09-06', '11:33:07'),
(20, '3', '2023-09-07', '10:26:15'),
(21, '7', '2023-09-07', '11:19:24'),
(22, '6', '2023-09-07', '11:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `secret_code` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `username`, `password`, `full_name`, `secret_code`) VALUES
(1, 'super_admin', '$2a$12$/PLrmZYuQa/gsrtQFJFT6.fwfBtcHGOlncPN4bUgImAhnd7DODl/O', 'Super Admin', '8669'),
(2, 'ananya', '$2y$10$googggN81VS4agYK5OkNPeZO90eyCH.yp6sk1AHCpOw7M3.mJaO8q', 'Raihana Islam', '262824'),
(3, 'dina', '$2a$12$KqCZ4vBmLW/xtO6MQ18LPO0DbJxwKc51PoYWV0YJXz/Jc.PTSL9qe', 'Dina Mrong', '1516'),
(4, 'jemi', '$2a$12$V5.K41vqhAnJME4Lf3MJIO70zyuEg8wr6ku4d8fDI6zyDKERtK9S2', 'Jemi Jambil', '8463'),
(5, 'khaleda', '$2a$12$QWZ7gZzEki65Ud7JzgqcG.reEAlf2BpyIgfRekzp870m8flqaEZFS', 'Khaleda Tasnim', '7428'),
(6, 'trisha', '$2a$12$.t3lfZNYnH6mpmHugrLM7.at9rMF/6G3J4OQxVCbiF3n.Od9L4GSO', 'Trisha Begum', '2143'),
(7, 'ava', '$2a$12$2zqLCjuV2vFMuiO7t7v1GO3Lr8vE23Nq6qDVOyNUzDnozjMdldwVe', 'Ava Sarker', '5812');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
