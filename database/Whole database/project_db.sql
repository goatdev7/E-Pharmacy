-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 03:44 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `medname` varchar(50) NOT NULL,
  `medtype` varchar(50) NOT NULL,
  `meddescription` varchar(200) NOT NULL,
  `price` int(50) NOT NULL,
  `quantity` int(200) NOT NULL,
  `useability` varchar(200) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `dose` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `medname`, `medtype`, `meddescription`, `price`, `quantity`, `useability`, `companyname`, `dose`) VALUES
(1, 'Panadol', 'paracetamol ', 'For headache and fever', 15, 75, 'headache ', 'P&amp;G', 10),
(3, 'Listerine Mouthwash', 'Miswak extract. ', 'Mouthwash with a powerful combination of science and natural Miswak to fight millions of germs, reduce plaque and tartar, and strengthen the teeth for a pure, clean, and fresh mouth.', 600, 100, 'Oral Hygiene ', 'Listerine', 10),
(4, 'CaC-1000 Plus Orange', 'Calcium Supplement Product ', 'CaC-1000 plus are calcium supplements with a unique formula containing double calcium in the form of Calcium carbonate and Calcium lactate gluconate along with essential vitamins. Low levels of calciu', 317, 150, 'CAC-1000 plus helps to meet the daily or increased calcium requirements of the body in conditions such as pregnancy, lactation, young and old age, and infections. ', 'GSK', 1000),
(5, 'Johar Joshanda', 'Organic Health ', 'Qarshi Joshanda is an herbal remedy made with liquoric extract, Vasaka Khashkhash, starch, maiden hair fern and hyssop ephedra. It acts as an expectorant (promotes secretion of sputum by air passages)', 10, 150, 'For cough, flu, cold, throat irritation and fever ', 'Qarshi', 2),
(6, 'Flagyl', 'Antimyrol ', 'Flagyl contains a medicine called metronidazole.', 35, 90, 'For Stomach ', 'pfizer', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `medname` varchar(50) NOT NULL,
  `medtype` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `quantity` int(200) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(10) DEFAULT NULL,
  `phoneno` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `username`, `pass`, `phoneno`, `email`) VALUES
(2, 'user', '12345', 12344, 'user@g.com'),
(3, 'user2', 'sample123', 223344, 'user2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(10) DEFAULT NULL,
  `phoneno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `phoneno`) VALUES
(1, 'admin', '54321', 11223344);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
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
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
