-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 11:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(2) NOT NULL,
  `admin_username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_email`) VALUES
(1, 'admin', '04e79', 'Mohammedhamada879@gmail.com'),
(2, 'Khaled', '04e79', 'Khaled@gmail.com'),
(3, 'Mahmoud', '15f0a', 'Mahmoud@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'computers'),
(2, 'Perfumes'),
(3, 'printers'),
(4, 'Toys'),
(5, 'Mobile'),
(6, 'Make-up');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(5) NOT NULL,
  `product_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_category_id` int(2) NOT NULL,
  `product_price` int(5) NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_category_id`, `product_price`, `product_desc`, `product_image`) VALUES
(1, 'hp', 3, 180, 'consectetur adipiscing elit. Fusce iaculis enim id nibh blandit viverra. Maecenas a tincidunt est, sit amet dapibus ligula. Phasellus bibendum magna quis erat fringilla, nec pellentesque eros mattis', '1609281935160218407822.jpg'),
(2, 'hp laser printer', 3, 2500, 'consectetur adipiscing elit. Fusce iaculis enim id nibh blandit viverra. Maecenas a tincidunt est, sit amet dapibus ligula. Phasellus bibendum magna quis erat fringilla, nec pellentesque eros mattis', '16093459393.jpg'),
(3, 'lenovo', 1, 4000, 'consectetur adipiscing elit. Fusce iaculis enim id nibh blandit viverra. Maecenas a tincidunt est, sit amet dapibus ligula. Phasellus bibendum magna quis erat fringilla, nec pellentesque eros mattis', '16093460001602184444111.jpg'),
(4, 'Iphone', 5, 6000, 'consectetur adipiscing elit. Fusce iaculis enim id nibh blandit viverra. Maecenas a tincidunt est, sit amet dapibus ligula. Phasellus bibendum magna quis erat fringilla, nec pellentesque eros mattis', '160934607716021846934.jpg'),
(5, 'samsung', 5, 5000, 'consectetur adipiscing elit. Fusce iaculis enim id nibh blandit viverra. Maecenas a tincidunt est, sit amet dapibus ligula. Phasellus bibendum magna quis erat fringilla, nec pellentesque eros mattis', '16093461101.jpg'),
(6, 'Oppo', 5, 3500, 'consectetur adipiscing elit. Fusce iaculis enim id nibh blandit viverra. Maecenas a tincidunt est, sit amet dapibus ligula. Phasellus bibendum magna quis erat fringilla, nec pellentesque eros mattis', '160934614316021846692.jpg'),
(7, 'hp laptop', 1, 8000, 'consectetur adipiscing elit. Fusce iaculis enim id nibh blandit viverra. Maecenas a tincidunt est, sit amet dapibus ligula. Phasellus bibendum magna quis erat fringilla, nec pellentesque eros mattis', '16093461911602184473222.jpg'),
(8, 'apple', 1, 10000, 'consectetur adipiscing elit. Fusce iaculis enim id nibh blandit viverra. Maecenas a tincidunt est, sit amet dapibus ligula. Phasellus bibendum magna quis erat fringilla, nec pellentesque eros mattis', '160934622016021829291533659437Apple.jpg'),
(9, 'Tom Ford', 2, 800, 'consectetur adipiscing elit. Fusce iaculis enim id nibh blandit viverra. Maecenas a tincidunt est, sit amet dapibus ligula. Phasellus bibendum magna quis erat fringilla, nec pellentesque eros mattis', '1609346356160218475515336574551510672269.jpg'),
(12, 'MANHATTAN Cosmetics', 6, 100, 'consectetur adipiscing elit. Fusce iaculis enim id nibh blandit viverra. Maecenas a tincidunt est, sit amet dapibus ligula. Phasellus bibendum magna quis erat fringilla, nec pellentesque eros mattis', '16093470611608718834800897836245-1481572_org.png'),
(13, 'lashcocaine', 6, 40, 'consectetur adipiscing elit. Fusce iaculis enim id nibh blandit viverra. Maecenas a tincidunt est, sit amet dapibus ligula. Phasellus bibendum magna quis erat fringilla, nec pellentesque eros mattis', '16093469124260544086663-2223397_org.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_name` (`product_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
