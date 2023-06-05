-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 11:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monorail_passenger`
--

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `passenger_id` char(12) NOT NULL,
  `passenger_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `passenger_name`) VALUES
('010101020344', 'Hakimi'),
('010403020101', 'zus'),
('060504030202', 'moana'),
('090807060504', 'melo'),
('090808090807', 'MUN'),
('090909080707', 'JONY'),
('121213141414', 'gabriel'),
('971219065765', 'gui'),
('971219065768', 'athira'),
('971219065769', 'amy');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `passenger_id` char(12) DEFAULT NULL,
  `passenger_name` varchar(50) DEFAULT NULL,
  `from_station` varchar(50) DEFAULT NULL,
  `to_station` varchar(50) DEFAULT NULL,
  `num_tokens` int(11) DEFAULT NULL,
  `tix_type` varchar(20) DEFAULT NULL,
  `discount_cat` varchar(50) DEFAULT NULL,
  `total_fare` decimal(10,2) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `passenger_id`, `passenger_name`, `from_station`, `to_station`, `num_tokens`, `tix_type`, `discount_cat`, `total_fare`, `datetime`) VALUES
(1, '090909080707', 'JONY', 'Tun Sambanthan', 'Raja Chulan', 3, 'Return', 'Student (30% discount)', 8.82, '2023-05-29 04:21:38'),
(2, '010101020344', 'Hakimi', 'KL Sentral', 'Medan Tuanku', 2, 'Return', 'Adult (Normal fare)', 10.00, '2023-05-29 04:24:45'),
(3, '010101020344', 'Hakimi', 'KL Sentral', 'Maharajalela', 3, 'One-way', 'Disabled (40% discount)', 2.88, '2023-05-29 04:25:08'),
(4, '010101020344', 'Hakimi', 'Bukit Bintang', 'Titiwangsa', 3, 'Return', 'Disabled (40% discount)', 7.56, '2023-05-29 04:25:52'),
(5, '010101020344', 'Hakimi', 'Titiwangsa', 'Bukit Bintang', 1, 'Return', 'Adult (Normal fare)', 4.20, '2023-05-29 04:26:07'),
(6, '010403020101', 'zus', 'Tun Sambanthan', 'Hang Tuah', 2, 'Return', 'Senior Citizen (25% discount)', 4.80, '2023-05-29 04:56:28'),
(7, '010403020101', 'zus', 'Bukit Bintang', 'Raja Chulan', 2, 'One-way', 'Disabled (40% discount)', 1.44, '2023-05-29 04:56:39'),
(8, '010403020101', 'zus', 'Raja Chulan', 'Titiwangsa', 1, 'Return', 'Adult (Normal fare)', 3.20, '2023-05-29 04:56:51'),
(9, '010403020101', 'zus', 'Titiwangsa', 'KL Sentral', 1, 'Return', 'Adult (Normal fare)', 5.00, '2023-05-29 04:57:12'),
(10, '060504030202', 'moana', 'KL Sentral', 'Imbi', 3, 'One-way', 'Senior Citizen (25% discount)', 3.60, '2023-05-29 04:57:37'),
(11, '060504030202', 'moana', 'Maharajalela', 'Medan Tuanku', 12, 'One-way', 'Student (30% discount)', 17.64, '2023-05-29 04:57:50'),
(12, '060504030202', 'moana', 'Hang Tuah', 'Bukit Nanas', 3, 'Return', 'Senior Citizen (25% discount)', 7.20, '2023-05-29 04:58:08'),
(14, '060504030202', 'moana', 'Tun Sambanthan', 'Imbi', 1, 'Return', 'Adult (Normal fare)', 3.20, '2023-05-29 05:11:17'),
(15, '971219065769', 'amy', 'KL Sentral', 'Bukit Bintang', 3, 'One-way', 'Adult (Normal fare)', 6.30, '2023-05-29 12:23:25'),
(16, '971219065769', 'amy', 'Imbi', 'Chow Kit', 2, 'Return', 'Disabled (40% discount)', 3.84, '2023-05-29 12:26:29'),
(17, '971219065769', 'amy', 'Hang Tuah', 'Chow Kit', 4, 'One-way', 'Adult (Normal fare)', 8.40, '2023-05-29 12:34:39'),
(18, '971219065769', 'amy', 'Titiwangsa', 'Maharajalela', 1, 'Return', 'Disabled (40% discount)', 3.00, '2023-05-29 12:37:39'),
(19, '971219065769', 'amy', 'Tun Sambanthan', 'Chow Kit', 1, 'Return', 'Senior Citizen (25% discount)', 3.75, '2023-05-29 20:28:47'),
(20, '971219065769', 'amy', 'KL Sentral', 'Titiwangsa', 1, 'One-way', 'Adult (Normal fare)', 2.50, '2023-05-30 12:38:58'),
(21, '971219065769', 'amy', 'KL Sentral', 'Imbi', 2, 'One-way', 'Adult (Normal fare)', 3.20, '2023-05-30 12:39:38'),
(22, '971219065769', 'amy', 'KL Sentral', 'Imbi', 1, 'Return', 'Adult (Normal fare)', 3.20, '2023-05-30 12:40:15'),
(23, '971219065769', 'amy', 'KL Sentral', 'Imbi', 1, 'One-way', 'Senior Citizen (25% discount)', 1.20, '2023-05-30 12:40:43'),
(24, '971219065769', 'amy', 'KL Sentral', 'Imbi', 1, 'One-way', 'Disabled (40% discount)', 0.96, '2023-05-30 12:41:06'),
(25, '971219065769', 'amy', 'KL Sentral', 'Titiwangsa', 1, 'One-way', 'Student (30% discount)', 1.75, '2023-05-30 12:41:31'),
(26, '971219065769', 'amy', 'KL Sentral', 'Titiwangsa', 2, 'Return', 'Adult (Normal fare)', 10.00, '2023-05-30 12:41:55'),
(27, '971219065769', 'amy', 'KL Sentral', 'Titiwangsa', 1, '0', 'Adult (Normal fare)', 2.50, '2023-05-31 04:35:14'),
(28, '971219065769', 'amy', 'KL Sentral', 'Titiwangsa', 1, 'One-way', 'Adult (Normal fare)', 2.50, '2023-05-31 04:42:47'),
(29, '121213141414', 'gabriel', 'Hang Tuah', 'Medan Tuanku', 1, 'Return', 'Student (30% discount)', 2.24, '2023-06-05 16:39:52'),
(31, '121213141414', 'gabriel', 'Raja Chulan', 'Imbi', 1, 'One-way', 'Adult (Normal fare)', 1.20, '2023-06-05 16:42:47'),
(37, '121213141414', 'gabriel', 'Hang Tuah', 'Medan Tuanku', 1, 'Return', 'Adult (Normal fare)', 3.20, '2023-06-05 16:47:29'),
(44, '121213141414', 'gabriel', 'Maharajalela', 'Titiwangsa', 3, 'Return', 'Adult (Normal fare)', 15.00, '2023-06-05 17:26:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
