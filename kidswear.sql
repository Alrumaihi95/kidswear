-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 08:36 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kidswear`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Coats & Jackets'),
(2, 'Dresses & Skirts'),
(3, 'Tops & T-Shirts'),
(4, 'Shorts'),
(5, 'Pyjamas');

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `size` varchar(25) NOT NULL,
  `color` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `cat_id` int(10) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`id`, `name`, `image`, `price`, `size`, `color`, `description`, `cat_id`, `created_date`) VALUES
(2, 'Rabbit Cardigan', 'jacket2.jpg', 40, 'M', 'Red', 'Kids will be hopping all over the place in this sweet little cardigan! Made from our scrumptiously soft 100% GOTS certified organic cotton, so it great for tots with sensitive skin. It’s reversible, meaning you get two fab outfits for the price of one! Looks great when worn with a pair of our cosy leggings or over one of our cool dresses, and the little applique bunny adds a cheeky touch.', 1, '2017-11-19 11:56:09'),
(3, 'Blue Dot Dungaree Dress', '1511083713dress1.png', 28, 'L', 'Blue', 'A great choice for a winterâ€™s day! Add a pop of colour to a rainy day with this bright and cheery kids dungaree dress. This dress is a lovely bold blue with a scattering of polka dots and finished with some cheeky pink buttons! The height adjustable straps ensure your tot can enjoy scampering around the park in these for as long as possible .', 2, '2017-11-19 14:52:07'),
(4, 'Red Dino Pyjamas', '1511084394pyjamas_pjtrdino.png', 35, 'S', 'Red', 'Test description.', 5, '2017-11-19 15:09:54'),
(5, 'Orange Girly Stripe Reversible Trousers', '1511084495girly-stripe-reversible-trousers_trrpkgir_group_2.png', 20, 'M', 'Orange', 'Machine washable at 30 degrees', 4, '2017-11-19 15:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'somthing@mail.com'),
(2, 'test', 'test', 'somthing@mail.com'),
(3, 'john', '123123', 'john@john.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
