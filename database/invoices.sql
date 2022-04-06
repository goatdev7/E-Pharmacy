-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 03:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `medname` varchar(50) NOT NULL,
  `medtype` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `quantity` int(200) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `medname`, `medtype`, `price`, `quantity`, `companyname`, `date`) VALUES
(1, 'Panadol', 'paracetamol ', 15, 10, 'P&amp;G', '2022-02-14 07:45:33'),
(2, 'Flagyl', 'antimyrol ', 50, 10, 'pfizer', '2022-02-14 12:04:33'),
(3, 'Panadol', 'paracetamol ', 15, 10, 'P&amp;G', '2022-02-14 12:05:25'),
(4, 'Panadol', 'paracetamol ', 15, 2, 'P&amp;G', '2022-02-14 12:21:53'),
(5, 'Flagyl', 'antimyrol ', 50, 2, 'pfizer', '2022-02-14 12:22:57'),
(6, 'Panadol', 'paracetamol ', 15, 3, 'P&amp;G', '2022-02-14 12:26:10'),
(7, 'Flagyl', 'Antimyrol ', 35, 10, 'pfizer', '2022-02-14 14:33:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
