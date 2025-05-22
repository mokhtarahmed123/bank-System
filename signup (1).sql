-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 03:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `ID` int(11) NOT NULL,
  `balance` double(10,2) DEFAULT NULL,
  `account_type` varchar(15) NOT NULL,
  `visa_number` varchar(16) NOT NULL,
  `visa_pin` varchar(6) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `user_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`ID`, `balance`, `account_type`, `visa_number`, `visa_pin`, `owner_name`, `user_id`) VALUES
(1, 30000.00, 'Admin', '1239151818879300', '123456', 'Ali Mohamed', '3050620010575'),
(2, 34000.00, 'Client', '1239100123879300', '001235', 'Amr  Mohamed', '123456789235'),
(3, 50000.00, 'Admin', '1119151818879300', '318925', 'omar yousef', '1234567891011'),
(4, 15000.00, 'Client', '1664151818879300', '001238', 'yousef Mohamed', '123456789101'),
(5, 10000.00, 'Client', '1230051818879140', '120656', 'Ali Roshdy', '30506200105759');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `source_account_id` int(11) DEFAULT NULL,
  `destination_account_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `contact_number` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `source_account_id`, `destination_account_id`, `amount`, `transaction_date`, `contact_number`) VALUES
(1, 1, 2, 2000, '2025-03-02', '01147884541'),
(2, 3, 5, 1000, '2025-01-05', '01147886410');

-- --------------------------------------------------------

--
-- Table structure for table `usser`
--

CREATE TABLE `usser` (
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `National_id` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_number` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `PASWORD` varchar(50) NOT NULL,
  `account_locked` tinyint(1) DEFAULT 0,
  `created_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usser`
--

INSERT INTO `usser` (`name`, `phone_number`, `National_id`, `bank_name`, `bank_number`, `username`, `PASWORD`, `account_locked`, `created_time`) VALUES
('AMr salah', '01157926406', '1234447891234', 'National Bank of Egypt', '1236996321100000', 'mokhtarahmed3108@gmail.com', '1234567', 0, '2025-05-12 22:48:59'),
('youseef sayed', '01063078652', '123456789101', 'Alexandria', '1234123412341234', 'youseefs272@gmail.com', '1234567', 0, '2025-05-10 16:15:56'),
('youseef sayed', '01063078652', '1234567891011', 'Alexandria', '1234123412341234', 'youseefs272@gmail.com', '1234567', 0, '2025-05-10 16:16:39'),
('Mokhtar Ahmed', '01140778192', '1234567891234', 'masr', '1236996321000000', 'ma3724649@gmail.com', '0123456789', 0, '2025-05-12 22:42:50'),
('youseef sayed', '01063078652', '123456789235', 'Alexandria', '1234123412341234', 'youseefs272@gmail.com', '1234567', 0, '2025-05-10 16:10:00'),
('youseef sayed', '01063078652', '3050620010575', 'masr', '1234123412341234', 'youseefs272@gmail.com', '23704654', 0, '2025-05-10 16:05:58'),
('youseef sayed', '01063078652', '30506200105759', 'masr', '1234123412341234', 'youseefs272@gmail.com', '33051551', 0, '2025-05-10 16:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `ID` int(11) NOT NULL,
  `type_of_wallet` varchar(30) DEFAULT NULL,
  `receiver_phone` varchar(11) DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`ID`, `type_of_wallet`, `receiver_phone`, `balance`, `user_id`) VALUES
(1, 'Vodafone', '01036579001', 30000, '123456789101'),
(2, 'Orange', '01234449001', 10000, '1234567891011');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `source_account_id` (`source_account_id`),
  ADD KEY `destination_account_id` (`destination_account_id`);

--
-- Indexes for table `usser`
--
ALTER TABLE `usser`
  ADD PRIMARY KEY (`National_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD CONSTRAINT `bank_account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usser` (`National_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`source_account_id`) REFERENCES `bank_account` (`ID`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`destination_account_id`) REFERENCES `bank_account` (`ID`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usser` (`National_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
