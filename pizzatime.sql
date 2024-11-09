-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 09:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzatime`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(32) NOT NULL,
  `cart` int(32) NOT NULL,
  `user` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `cart`, `user`) VALUES
(116, 3, 9),
(121, 4, 14),
(124, 1, 15),
(125, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `addr` varchar(32) NOT NULL,
  `payment` varchar(32) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `pass`, `email`, `addr`, `payment`, `phone`) VALUES
(1, 'Sudipto', '123456', 'sudipto@gmail.com', 'Khulna', '', '01902028904'),
(2, 'Siddik', '123456', 'siddik@gmail.com', 'Jahangirnagar University', '', '01734565676'),
(3, 'Elma', '123456', 'elma@gmail.com', 'Jahangirnagar University', '', '01454565977'),
(4, 'Naiar', '12345', 'naiar@gmail.com', 'Dhaka', '', '01555555555'),
(5, 'Customer', '1234', 'customer@gmail.com', 'Dhaka', '', '01584102020'),
(7, 'Sudipto1', '123456', 'shanto@gmail.com', 'Savar', '', '01548787878'),
(8, 'haha', '0987', 'siddik.shakil@gmail.com', 'Jahangirnagar Univer', '', '01706934791'),
(9, 'trtr', '6666', 'ghorardim247@gmail.com', 'JU', '', '01706934791'),
(14, 'John', 'jjjj', 'siddik.stu2017@juniv.edu', 'JU', '', '01706934791'),
(15, 'Thom', '1234', 'thomyorke99@gmail.com', 'JU', '', '01648924412');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(32) NOT NULL,
  `bkash` int(32) NOT NULL,
  `bpin` varchar(32) NOT NULL,
  `rocket` int(32) NOT NULL,
  `rpin` varchar(32) NOT NULL,
  `nagad` int(32) NOT NULL,
  `npin` varchar(32) NOT NULL,
  `c_name` varchar(32) NOT NULL,
  `c_addr` varchar(32) NOT NULL,
  `c_num` int(32) NOT NULL,
  `user` int(11) NOT NULL,
  `uname` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `bkash`, `bpin`, `rocket`, `rpin`, `nagad`, `npin`, `c_name`, `c_addr`, `c_num`, `user`, `uname`) VALUES
(1, 0, '0', 0, '0', 176543219, '459872', '', '', 0, 2, 'Siddik'),
(2, 0, '0', 1658963852, '258147', 0, '0', '', '', 0, 4, 'Naiar'),
(8, 1111111111, '14515151', 0, '0', 0, '0', '', '', 0, 5, 'Customer'),
(9, 0, '0', 0, '0', 1555555555, '1581651651', '', '', 0, 5, 'Customer'),
(10, 0, '0', 1658487878, '1564984615', 0, '0', '', '', 0, 5, 'Customer'),
(11, 0, '0', 0, '0', 0, '0', '1234', 'Savar', 1457568989, 4, 'Naiar'),
(12, 1111111111, '1515163', 0, '0', 0, '0', '', '', 0, 4, 'Naiar'),
(13, 1454878787, 'ASD11D48DSSSUT', 0, '', 0, '', '', '', 0, 4, 'Naiar'),
(14, 1521240405, 'TXGDFRT1651', 0, '', 0, '', '', '', 0, 7, 'Sudipto1'),
(15, 1706934791, '56756767', 0, '', 0, '', '', '', 0, 9, 'trtr'),
(16, 1648924412, '56756767', 0, '', 0, '', '', '', 0, 9, 'trtr');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `rating` double NOT NULL,
  `review` varchar(1000) NOT NULL,
  `price` int(10) NOT NULL DEFAULT 200,
  `img` varchar(10) NOT NULL,
  `ingredients` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `genre`, `rating`, `review`, `price`, `img`, `ingredients`) VALUES
(1, 'CHEESY CHICKEN', '', 5, 'Cheesy chicken pizza is a delicious and satisfying meal that combines the flavors of juicy chicken, gooey cheese, and savory tomato sauce on a crispy crust. This pizza is a popular choice among pizza lovers, and can be customized with a variety of toppings to suit individual tastes', 750, '', 'Chicken Fillet, Onions, Cheese'),
(2, 'MARGARITA', '', 4.5, 'The margarita pizza is often considered the classic Italian pizza and is a popular choice among pizza lovers.', 800, '', 'Tomato, Mozzerella Cheese, Basil'),
(3, 'PEPPERONI', '', 4.6, 'Pepperoni is a type of pizza that is typically made with a tomato sauce, mozzarella cheese, and slices of pepperoni.', 700, '', 'Tomato, Cheese, Pepperoni'),
(4, 'FOUR CHEEESE', '', 4.9, 'Four cheese pizza is a popular choice among pizza lovers who enjoy the taste of cheese.', 999, '', 'Cheese, Garlic, Basil'),
(5, 'Coca Cola', '', 5, 'Coca-Cola is the most popular and biggest-selling soft drink in history, as well as one of the world\'s most valuable and recognized brands.', 25, '', 'Carbonated beverage'),
(6, 'Sprite', '', 5, 'Sprite is often consumed as a refreshment on its own, but it can also be mixed with other ingredients to create unique cocktails. ', 25, '', 'Carbonated beverage'),
(7, 'Pepsi', '', 5, 'Pepsi is produced and marketed by PepsiCo, a global food and beverage company that also produces a wide range of other popular snacks and beverages.', 25, '', 'Carbonated beverage'),
(8, 'Organic Juice', '', 4.8, 'Organic juice is often considered to be more healthful and environmentally friendly than conventional juice.', 100, '', 'Fruits and Vegetables');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user`) REFERENCES `customer` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
