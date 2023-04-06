-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 02:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `askdoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cardiology`
--

CREATE TABLE `cardiology` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `reason` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `USER` varchar(100) NOT NULL,
  `PASS` varchar(200) NOT NULL,
  `doctor_id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `reviews` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`USER`, `PASS`, `doctor_id`, `name`, `specialization`, `experience`, `contact`, `reviews`, `address`) VALUES
('doc1', 'doc1', 1, 'Dr. Priya Sharma', 'Cardiology', '10 years', '978676577', '4.5', 'Sanjivani Hospital, Virar'),
('doc2', 'doc2', 2, 'Dr. Rajesh Singh', 'Oncology', '8 years', '9868978877', '4.2', 'Shree Siddhivinayak Hospital, Virar'),
('doc3', 'doc3', 3, 'Dr. Anjali Patel', 'Pediatrics', '15 years', '9988787667', '4.8', 'Manav Kalyan Hospital, Virar'),
('doc4', 'doc4', 4, 'Dr. Suresh Gupta', 'Dermatology', '12 years', '9766565433', '4.3', 'Sanjeevani Multispeciality Hospital, Virar'),
('doc5', 'doc5', 5, 'Dr. Rakesh Kumar', 'Neurology', '6 years', '988877655', '4.1', 'Dr. Sushila Hospital, Virar'),
('doc6', 'doc6', 6, 'Dr. Nisha Verma', 'Psychiatry', '9 years', '9987653372', '4.6', 'Mangalmurti Hospital, Virar'),
('doc7', 'doc7', 7, 'Dr. Vikram Sharma', 'Internal Medicine', '11 years', '887678997', '4.4', 'Sai Sparsh Hospital, Virar'),
('doc8', 'doc8', 8, 'Dr. Meena Reddy', 'Gynecology', '7 years', '990098976', '4.0', 'Dhanvantari Multispeciality Hospital, Virar'),
('doc9', 'doc9', 9, 'Dr. Arjun Desai', 'Orthopedics', '13 years', '9987544333', '4.7', 'Viva Hospital, Virar'),
('doc10', 'doc10', 10, 'Dr. Divya Choudhary', 'Ophthalmology', '5 years', '9822237818', '4.2', 'Shree Ramkrishna Netralaya Hospital, Virar');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `email`, `phone`, `date`, `time`, `reason`) VALUES
(1, 'Darshan', 'darshandhamode@gmail.com', '7894561234', '2023-04-27', '', 'Medical advice'),
(2, 'Darshan', 'darshandhamode@gmail.com', '7894561234', '2023-04-27', '', 'Medical advice'),
(3, 'P1', 'p1@gmail.com', '90088467', '2023-04-06', '23:03', 'Follow-up visit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cardiology`
--
ALTER TABLE `cardiology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cardiology`
--
ALTER TABLE `cardiology`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
