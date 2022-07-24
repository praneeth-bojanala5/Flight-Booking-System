-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 
--

-- --------------------------------------------------------

--
-- 
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `cities` text NOT NULL,
  `date` text NOT NULL,
  `price` text NOT NULL,
  `owner` text NOT NULL,
  `pnr` text NOT NULL,
  `flightid` text NOT NULL,
  `purchaserid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
--
--

INSERT INTO `details` (`id`, `cities`, `date`, `price`, `owner`, `pnr`, `flightid`, `purchaserid`) VALUES
(17, 'Lucknow-Panaji', '15.07.2021', '3500', 'praneeth', '3yjoROpSq3', '10', '39');

-- --------------------------------------------------------

--
-- 
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `cities` text NOT NULL,
  `capacity` text NOT NULL,
  `price` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 
--

INSERT INTO `flights` (`id`, `cities`, `capacity`, `price`, `date`) VALUES
(1, 'Bangalore-Pune', '0', '4000', '11.04.2021'),
(3, 'Amaravati-Kolkata', '85', '7000', '12.04.2021'),
(9, 'Mangalore-Jaipur', '496', '3500', '13.04.2021'),
(10, 'Lucknow-Panaji', '89', '3500', '15.07.2021'),
(11, 'Delhi-Mumbai', '75', '1200', '14.04.2021'),
(14, 'Srinagar-Dehradun', '0', '4000', '16.04.2021'),
(15, 'Hyderabad-Chennai', '1', '1000', '12.06.2021');

-- --------------------------------------------------------

--
-- 
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `cellno` text NOT NULL,
  `password` text NOT NULL,
  `creditcard` text NOT NULL,
  `cvv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 
--

INSERT INTO `user` (`id`, `fullname`, `email`, `cellno`, `password`, `creditcard`, `cvv`) VALUES
(2, 'praneeth', 'praneeth@gmail.com', '9515625825', 'Praneeth5', '4444333322221111', '123'),
(4, 'admin', 'admin@admin.com', '00000000001', '123', '12345678', '155');

-- --------------------------------------------------------

--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- 
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--

--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 
--

--
-- 
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
