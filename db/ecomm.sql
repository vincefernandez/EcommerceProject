-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2022 at 09:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Sizes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `Sizes`) VALUES
(1, 9, 1, 4, ''),
(3, 9, 4, 6, ''),
(4, 9, 12, 2, ''),
(24, 27, 75, 1, 'No Sizes'),
(39, 14, 87, 1, 'Medium ');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(4, 'Tshirts', ''),
(5, 'Mug', ''),
(6, 'Heater', ''),
(7, 'Bath Towel', ''),
(8, 'Teddy Bear', ''),
(9, 'Flower', ''),
(10, 'Tumblir Mug', ''),
(11, 'Jacket', ''),
(12, 'Duster', ''),
(13, 'Dress', ''),
(14, 'Shorts', ''),
(15, 'Pants', ''),
(16, 'Jogging Pants', ''),
(17, 'Laptop', '');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Sizes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`, `Sizes`) VALUES
(14, 9, 11, 2, ''),
(15, 9, 13, 5, ''),
(16, 9, 3, 2, ''),
(17, 9, 1, 3, ''),
(18, 10, 13, 3, ''),
(19, 10, 2, 4, ''),
(20, 10, 19, 5, ''),
(21, 11, 2, 1, ''),
(22, 12, 9, 1, ''),
(23, 13, 27, 1, ''),
(24, 14, 27, 1, ''),
(25, 15, 71, 4, ''),
(26, 16, 45, 1, ''),
(27, 17, 41, 1, ''),
(28, 18, 61, 1, ''),
(29, 18, 65, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_quantity` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Sizes` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `product_image`, `product_name`, `product_price`, `product_size`, `product_quantity`, `Name`, `Sizes`, `contact_number`, `address`) VALUES
(13, 14, 0, 'hhhh.PNG', 'hhhh', '14652', 'Small', 11, 'vincent fernandez', '', '09301798988', 'bagong silang caloocan'),
(14, 14, 0, 'hhhh.PNG', 'hhhh', '2664', 'Small', 2, 'vincent fernandez', '', '09301798988', 'bagong silang caloocan'),
(15, 14, 0, 'hhhh.PNG', 'hhhh', '2664', 'Small', 4, 'vincent fernandez', '', '09301798988', 'bagong silang caloocan'),
(17, 14, 0, 'lion-tshirt-small.jpg', 'LION TSHIRT SMALL', '999', 'Small ', 1, 'vincent fernandez', '', '09301798988', 'bagong silang caloocan'),
(18, 14, 0, 'lion-tshirt-small.jpg', 'LION TSHIRT SMALL', '999', 'Small ', 1, 'vincent fernandez', '', '09301798988', 'bagong silang caloocan');

-- --------------------------------------------------------

--
-- Table structure for table `paymentgcash`
--

CREATE TABLE `paymentgcash` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ReferenceNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentgcash`
--

INSERT INTO `paymentgcash` (`id`, `user_id`, `name`, `product_id`, `product_image`, `product_name`, `product_price`, `product_size`, `product_quantity`, `contact_number`, `address`, `ReferenceNumber`) VALUES
(1, 14, 'vincent fernandez', 0, 'lion-tshirt-small.jpg', 'LION TSHIRT SMALL', '999', 'Small ', '1', '09301798988', 'bagong silang caloocan', ''),
(7, 14, '1', 0, 'lion-tshirt-small.jpg', 'vincent fernandez', 'LION TSHIRT SMALL', '999', 'Small ', '09301798988', 'bagong silang caloocan', 'asdasd'),
(8, 14, 'vincent fernandez', 0, 'anime-tshirt.jpg', 'ANIME TSHIRT', '198', 'Small ', '2', '09301798988', 'bagong silang caloocan', 'SAMPLEREFERENCENUMBER'),
(9, 14, 'vincent fernandez', 0, 'lion-tshirt-small.jpg', 'LION TSHIRT SMALL', '9990', 'Small ', '10', '09301798988', 'bagong silang caloocan', '1001 543 610110'),
(10, 14, 'vincent fernandez', 0, 'lion-tshirt-small.jpg', 'LION TSHIRT SMALL', '1998', 'Small ', '2', '09301798988', 'bagong silang caloocan', '1001 543 610110'),
(11, 14, 'vincent fernandez', 0, 'pants-men.jpg', 'Pants For Men', '999', 'Medium ', '1', '09301798988', 'bagong silang caloocan', '1001 543 610110');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `size` varchar(30) NOT NULL,
  `prodquantity` int(255) NOT NULL,
  `Small` varchar(30) NOT NULL,
  `Medium` varchar(30) NOT NULL,
  `Large` varchar(30) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `size`, `prodquantity`, `Small`, `Medium`, `Large`, `date_view`, `counter`) VALUES
(27, 4, 'Terno Tshirts for Kids MALE', '<p>Suitable for Male Kids age 2-3</p>\r\n', 'terno-tshirts-kids-male', 100, 'terno-tshirts-kids-male.jpg', '', 0, '', '', '', '2022-04-23', 3),
(28, 5, 'Mug with Utensils', '<p>Mug</p>\r\n', 'mug-utensils', 100, 'mug-utensils.jpg', '', 0, '', '', '', '2022-04-23', 7),
(29, 6, 'Heater with Mug SET', '<p>Heater with MUG set</p>\r\n', 'heater-mug-set', 500, 'heater-mug-set.jpg', '', 0, '', '', '', '2022-04-23', 2),
(30, 4, 'Tshirt for MEN', '<p>Tshirts for MEN XL MEDIUM SMALL</p>\r\n', 'tshirt-men', 250, 'tshirt-men.jpg', '', 0, '', '', '', '2022-04-23', 6),
(32, 8, 'Teddy Bear', '<p>Teddy Bear Small</p>\r\n', 'teddy-bear', 500, 'teddy-bear.jpg', '', 0, '', '', '', '2022-04-23', 1),
(33, 9, 'Flower', '<p>Flower</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'flower', 250, 'flower.jpg', '', 0, '', '', '', '2022-04-23', 2),
(34, 10, 'tumbler Mug', '<p>Tumbler Mug</p>\r\n', 'tumbler-mug', 999, 'tumbler-mug.jpg', '', 0, '', '', '', '0000-00-00', 0),
(35, 11, 'Jacket for Men', '<p>Jacket for Men Cotton</p>\r\n', 'jacket-men', 999, 'jacket-men.jpg', '', 0, '', '', '', '0000-00-00', 0),
(36, 12, 'Duster', '<p>Duster</p>\r\n', 'duster', 500, 'duster.jpg', '', 0, '', '', '', '2022-04-23', 2),
(37, 13, 'Green Dress', '<p>Women Dress</p>\r\n', 'green-dress', 250, 'green-dress.jpg', '', 0, '', '', '', '2022-04-23', 1),
(38, 4, 'Women Tshirts', '<p>Tshirts for Women</p>\r\n', 'women-tshirts', 250, 'women-tshirts.jpg', '', 0, '', '', '', '2022-04-20', 1),
(39, 14, 'Shorts for Men', '<p>Shorts for Men</p>\r\n', 'shorts-men', 250, 'shorts-men.jpg', '', 0, '', '', '', '2022-04-23', 2),
(40, 15, 'pajama for Women', '<p>Pajama for Women</p>\r\n', 'pajama-women', 999, 'pajama-women.jpg', '', 0, '', '', '', '2022-04-23', 1),
(41, 16, 'Jogging Pants for Men', '<p>Jogging Pants for Men</p>\r\n', 'jogging-pants-men', 999, 'jogging-pants-men.jpg', '', 0, '', '', '', '2022-04-23', 11),
(43, 4, 'pogi', '<p>POGI</p>\r\n', 'pogi', 1000, 'pogi.jpg', '', 0, '', '', '', '2022-04-23', 1),
(44, 4, 'pogi1', '<p>sad</p>\r\n', 'pogi1', 1000, 'pogi1.jpg', '', 0, '', '', '', '2022-04-23', 1),
(45, 4, 'test', '<p>asd</p>\r\n', 'test', 1000, 'test.jpg', '', 0, '', '', '', '2022-04-23', 1),
(46, 4, 'test', '<p>asd</p>\r\n', 'test', 1000, 'test.jpg', '', 0, '', '', '', '0000-00-00', 0),
(47, 4, 'test', '<p>asd</p>\r\n', 'test', 1000, 'test.jpg', '', 0, '', '', '', '0000-00-00', 0),
(48, 4, 'QCUportal', '<p>asdsad</p>\r\n', 'qcuportal', 1000, 'qcuportal.jpg', '', 0, '', '', '', '2022-04-23', 1),
(49, 4, 'vincent fernandez', '<p>asdasd</p>\r\n', 'vincent-fernandez', 1000, 'vincent-fernandez.jpg', '', 0, '', '', '', '0000-00-00', 0),
(50, 4, 'asd', '<p>asdsa</p>\r\n', 'asd', 1000, 'asd.jpg', '', 0, '', '', '', '2022-04-23', 4),
(51, 4, 'asasd', '', 'asasd', 1000, 'asasd.png', '', 0, '', '', '', '2022-04-23', 6),
(52, 4, 'asasd', '', 'asasd', 1000, 'asasd.png', '', 0, '', '', '', '0000-00-00', 0),
(53, 4, 'test1', '<p>asd</p>\r\n', 'test1', 1000, 'test1.jpg', '', 0, 'Small', 'Medium', 'Large', '2022-04-23', 7),
(54, 4, 'test1', '<p>asd</p>\r\n', 'test1', 1000, 'test1.jpg', '', 0, '', '', '', '0000-00-00', 0),
(55, 4, 'test1', '<p>asd</p>\r\n', 'test1', 1000, 'test1.jpg', '', 0, '', '', '', '0000-00-00', 0),
(56, 5, 'QCUportal123', '', 'qcuportal123', 1000, 'qcuportal123.png', '', 0, '', '', '', '2022-04-23', 1),
(57, 4, 'final', '<p>FINAL</p>\r\n', 'final', 123, 'final.png', '', 0, '', '', '', '2022-04-23', 24),
(58, 4, 'final1', '<p>asd</p>\r\n', 'final1', 1000, 'final1.png', '', 0, '', '', '', '2022-04-23', 2),
(60, 4, 'final2', '<p>asd</p>\r\n', 'final2', 1000, 'final2.png', '', 0, '', '', '', '2022-04-20', 1),
(61, 4, 'vincent', '<p>asdsa</p>\r\n', 'vincent', 1000, 'vincent.jpg', '', 0, '', '', '', '2022-04-23', 3),
(62, 5, 'vincent1', '<p>asd</p>\r\n', 'vincent1', 1000, 'vincent1.png', '', 0, '', '', '', '2022-04-23', 2),
(63, 4, 'sample7', '<p>asd</p>\r\n', 'sample7', 1000, 'sample7.jpg', '', 0, '', '', '', '0000-00-00', 0),
(64, 4, 'sample15', '<p>hh</p>\r\n', 'sample15', 2222, 'sample15.PNG', '', 0, '', '', '', '0000-00-00', 0),
(65, 4, 'sample22', '<p>ggg</p>\r\n', 'sample22', 1000, 'sample22.PNG', 'Small ', 0, '', '', '', '2022-04-26', 5),
(66, 4, 'sample22', '<p>ggg</p>\r\n', 'sample22', 1000, 'sample22.PNG', 'Small on ', 0, '', '', '', '0000-00-00', 0),
(67, 4, 'sample22', '<p>ggg</p>\r\n', 'sample22', 1000, 'sample22.PNG', 'Small on on ', 0, '', '', '', '0000-00-00', 0),
(68, 5, 'sample23', '<p>hh</p>\r\n', 'sample23', 2222, 'sample23.PNG', 'Small ', 0, '', '', '', '2022-04-23', 18),
(69, 5, 'sample23', '<p>hh</p>\r\n', 'sample23', 2222, 'sample23.PNG', 'Small Medium ', 0, '', '', '', '0000-00-00', 0),
(70, 5, 'sample23', '<p>hh</p>\r\n', 'sample23', 2222, 'sample23.PNG', 'Small Medium Large ', 0, '', '', '', '0000-00-00', 0),
(71, 4, 'sample24', '<p>asd</p>\r\n', 'sample24', 1000, 'sample24.PNG', 'Small', 0, 'Small', 'Medium', 'Large', '2022-04-26', 1),
(72, 4, 'sample24', '<p>asd</p>\r\n', 'sample24', 1000, 'sample24.PNG', 'Medium', 0, '', '', '', '0000-00-00', 0),
(73, 4, 'sample24', '<p>asd</p>\r\n', 'sample24', 1000, 'sample24.PNG', 'Large', 0, '', '', '', '0000-00-00', 0),
(74, 4, 'TTTTEST1', '<p>TESSS</p>\r\n', 'ttttest1', 22, 'ttttest1.jpg', 'Small', 0, '', '', '', '0000-00-00', 0),
(75, 4, '74TEST1', '<p>asdasd</p>\r\n', '74test1', 200, '74test1.jpg', 'Small', 0, '', '', '', '2022-05-03', 1),
(76, 4, '74TEST1', '<p>asdasd</p>\r\n', '74test1', 200, '74test1.jpg', 'Medium', 0, '', '', '', '0000-00-00', 0),
(77, 4, '74TEST1', '<p>asdasd</p>\r\n', '74test1', 200, '74test1.jpg', 'Large', 0, '', '', '', '0000-00-00', 0),
(78, 4, 'LAST', '<blockquote>\r\n<p>222</p>\r\n</blockquote>\r\n', 'last', 1111, 'last.PNG', 'Medium', 0, '', '', '', '2022-04-26', 8),
(79, 4, 'hhhh', '<p>asdasd</p>\r\n', 'hhhh', 666, 'hhhh.PNG', 'Small', 0, '', '', '', '2022-05-03', 6),
(80, 4, 'hhhh', '<p>asdasd</p>\r\n', 'hhhh', 666, 'hhhh.PNG', 'Large', 0, '', '', '', '0000-00-00', 0),
(81, 4, 'ANIME TSHIRT', '<p>ANIME TSHIRT SMALL</p>\r\n', 'anime-tshirt', 99, 'anime-tshirt.jpg', 'Small', 100, '', '', '', '2022-05-10', 19),
(82, 4, 'ANIME TSHIRT', '<p>LARGE SIZE</p>\r\n', 'anime-tshirt', 999, 'anime-tshirt.jpg', 'Large', 1010, '', '', '', '0000-00-00', 0),
(83, 4, 'Lion Tshirt', '<p>LION TSHIRT LARGE</p>\r\n', 'lion-tshirt', 1000, 'lion-tshirt.jpg', 'Large', 999, '', '', '', '0000-00-00', 0),
(84, 4, 'LION TSHIRT SMALL', '<p>LION TSHIRT SMALL</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'lion-tshirt-small', 999, 'lion-tshirt-small.jpg', 'Small', 999, '', '', '', '2022-05-10', 6),
(85, 4, 'LION TSHIRT MEDIUM', '<p>LION TSHIRT MEDIUM</p>\r\n', 'lion-tshirt-medium', 999, 'lion-tshirt-medium.jpg', 'Medium', 999, '', '', '', '2022-05-10', 16),
(86, 9, 'OTHER PRODUCTS', '<p>FLOWER</p>\r\n', 'other-products', 1999, 'other-products.jpg', 'No Sizes', 6, '', '', '', '2022-05-10', 10),
(87, 15, 'Pants For Men', '<p>Pants Plain for MEN MEDIUM SIZES</p>\r\n', 'pants-men', 999, 'pants-men.jpg', 'Medium', 1000, '', '', '', '2022-05-10', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(11, 22, 'PAYID-MJKQ37I9292238288183983F', '2022-04-12'),
(12, 23, 'PAYID-MJKSALY5UA77902GB454664A', '2022-04-12'),
(13, 14, 'PAYID-MJKXZII9RA4700965155425S', '2022-04-12'),
(14, 14, 'PAYID-MJLCOII7GP777823L5166341', '2022-04-13'),
(15, 14, 'PAYID-MJR3NJQ1HV51448R4057230U', '2022-04-23'),
(16, 14, 'PAYID-MJR3VOI46V95432853289032', '2022-04-23'),
(17, 14, 'PAYID-MJR3XWA0B552782MF147691S', '2022-04-23'),
(18, 14, 'PAYID-MJR4IGA22D845038G130281H', '2022-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$8wY63GX/y9Bq780GBMpxCesV9n1H6WyCqcA2hNy2uhC59hEnOpNaS', 1, 'Vincent', 'Fernandez', '', '', 'formal.png.jpg', 1, '', '', '2022-04-12'),
(14, 'vincent@gmail.com', '$2y$10$smaM99rhhZLOepJntdXmhOV4v1DQJFASL/ooAudecYvG4SrY19NKi', 0, 'vincent', 'fernandez', 'bagong silang caloocan', '09301798988', 'formal.png.jpg', 1, '', '', '2022-04-12'),
(22, 'vincent@gmail.com', '$2y$10$PLDNFgDLzqKaxj4KYfikgeuwmSsHOVceU/F5QLFUl7MwUoppyT66e', 0, 'Vincent', 'Fernandez', 'Bagong Silang Caloocan City', '09301798988', '', 0, 'aqwe7Jjk9Icd', '', '2022-04-12'),
(23, 'delacruzjuan@gmail.com', '$2y$10$FkPbGAM9ir5x4P7E7cIy.upBi4EYen63/R3kdjrUW33zBqmg/hseu', 0, 'Juan', 'Dela Cruz', '', '', '', 0, 'FYzN4SHAOGao', '', '2022-04-12'),
(24, 'delacruzjuan@gmail.com', '$2y$10$54rJeNY2fkLrO/HXV.CIROAnT0jk7isUD7G1kOt3s1eOVrjetEISy', 0, 'Juan', 'Dela Cruz', '', '', '', 0, 'iHn6wjSfm2Vq', '', '2022-04-12'),
(25, 'juanpedro@gmail.com', '$2y$10$9vyVblhttDstVHjFlO37iOXHbSHRgcFWvdWRSDj0dcNzapF2ZF6J.', 0, 'Juan', 'Pedro', '', '', '', 0, '7xmtnqpFWKl9', '', '2022-04-12'),
(26, 'vincent@gmail.com', '$2y$10$e1ob6LEuA8pa.wiaakZEUekk18PvtnklGS9XHKWOQKqtgRIKQlXeC', 0, 'vincent', 'fernandez', '', '', '', 0, 'CWPnOXS6lRVD', '', '2022-04-12'),
(27, 'juan@gmail.com', '$2y$10$vJpbTbPaTl.PYDk3KZV58ui8tLt5s/jbHpl20lH844GVBZ.Hmg6u2', 0, 'juan', 'dela cruz', 'quezon city', '09230498263', '', 0, 'm3iH6bhZyugp', '', '2022-05-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentgcash`
--
ALTER TABLE `paymentgcash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `paymentgcash`
--
ALTER TABLE `paymentgcash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
