-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2020 at 10:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcart`
--

CREATE TABLE `addcart` (
  `id` int(10) NOT NULL,
  `addedprod` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addcart`
--

INSERT INTO `addcart` (`id`, `addedprod`, `price`) VALUES
(6, '1', '408');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL DEFAULT '0',
  `price` float NOT NULL,
  `mrf` int(10) NOT NULL,
  `imageurl` text NOT NULL,
  `offertext` varchar(255) NOT NULL,
  `totalcarts` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `bname`, `pname`, `quantity`, `price`, `mrf`, `imageurl`, `offertext`, `totalcarts`) VALUES
(1, 'MilkFood', 'MilkFood Rich Desi Calender Ghee', '1', 408, 498, 'https://i.picsum.photos/id/0/5616/3744.jpg', '18%', 1),
(2, 'Grofers\'s Mothers Choice', 'Grofers\'s Mothers Choice Desi Ghee', '0', 450, 414, 'https://i.picsum.photos/id/10/2500/1667.jpg', '8%', 0),
(3, 'Amul ', 'Amul Pure Ghee', '1', 460, 439, 'https://i.picsum.photos/id/1003/1181/1772.jpg', '18%', 0),
(4, 'Patanjali', 'Patanjali cow\'s whole milk powder', '1', 409, 498, 'https://i.picsum.photos/id/1002/4312/2868.jpg', '18%', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcart`
--
ALTER TABLE `addcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcart`
--
ALTER TABLE `addcart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
