-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 02:26 PM
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
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cartID` int(3) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(6) NOT NULL,
  `p_quantity` int(2) NOT NULL,
  `p_color` varchar(8) NOT NULL,
  `p_size` int(2) NOT NULL,
  `p_discount` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(2) NOT NULL,
  `Category_name` varchar(30) NOT NULL,
  `Category_desc` text NOT NULL,
  `cat_status` varchar(20) NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `Category_name`, `Category_desc`, `cat_status`) VALUES
(1, 'shoes', 'it comprises of men, woman and kids shoes', 'Disabled'),
(2, 'sandal', 'it comprises of men, woman and kids sandals', 'Enabled'),
(3, 'sliders', 'it comprises of men, woman and kids sliders', 'Enabled'),
(4, 'slippers', 'it comprises of men, woman and kids slippers', 'Disabled'),
(5, 'crocs', 'it comprises of men, woman and kids crocs', 'Enabled'),
(6, 'Insoles', 'shoes Insoles', 'Enabled'),
(7, 'Socks', 'shoes socks', 'Enabled'),
(8, 'Polish', 'shoes polish', 'Enabled'),
(9, 'laces', 'shoes laces', 'Enabled'),
(10, 'stickers', 'awesome stickers for your shoes', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `cid` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `color` varchar(20) NOT NULL,
  `color_status` varchar(20) NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`cid`, `product_id`, `color`, `color_status`) VALUES
(1, 5687, 'brown', 'Enabled'),
(2, 5687, 'black', 'Enabled'),
(3, 8004, 'blue', 'Enabled'),
(4, 5109, 'black', 'Enabled'),
(5, 5109, 'green', 'Enabled'),
(6, 77075, 'maroon', 'Enabled'),
(7, 77075, 'pink', 'Enabled'),
(8, 5100, 'blue', 'Enabled'),
(10, 4866, 'cream brown', 'Enabled'),
(11, 5002, 'blue', 'Enabled'),
(12, 5002, 'brown', 'Enabled'),
(13, 1026, 'blue', 'Enabled'),
(14, 1026, 'white', 'Enabled'),
(15, 1025, 'blue', 'Enabled'),
(16, 1002, 'brown', 'Enabled'),
(17, 2659, 'black', 'Enabled'),
(18, 2, 'blue', 'Enabled'),
(19, 568, 'red', 'Enabled'),
(20, 897, 'white', 'Enabled'),
(21, 457, 'green', 'Enabled'),
(22, 258, 'maroon', 'Enabled'),
(23, 101, 'grey', 'Enabled'),
(24, 102, 'blueyellow', 'Enabled'),
(25, 103, 'grey', 'Enabled'),
(26, 104, 'red', 'Enabled'),
(27, 105, 'grey', 'Enabled'),
(28, 3365, 'pink', 'Enabled'),
(29, 3369, 'pink', 'Enabled'),
(30, 879, 'blue', 'Enabled'),
(31, 3342, 'white', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(3) NOT NULL,
  `feedback_rating` int(1) NOT NULL,
  `feedback_desc` text NOT NULL,
  `feedback_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `product_id`, `feedback_rating`, `feedback_desc`, `feedback_date`) VALUES
(1, 30, 5109, 4, 'The footwear is stylish and comfortable, providing excellent support throughout the day. The quality of materials used is impressive, and the design reflects both durability and fashion. However, there is room for improvement in the sizing accuracy, as the fit was slightly different than expected. Overall, a great product with potential for even greater customer satisfaction with minor adjustments.', '2024-01-18'),
(2, 27, 8004, 5, 'This kids\' footwear product is fantastic! The vibrant colors and playful designs immediately caught my child\'s attention. The durability and quality of materials used are commendable, ensuring these shoes can withstand the active lifestyle of kids. The Velcro closures make it easy for little ones to put on and take off independently. My only suggestion would be to include additional arch support for enhanced comfort during extended wear. Overall, a delightful and well-crafted product that brings joy to both parents and kids alike', '2023-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `Image_ID` int(3) NOT NULL,
  `cid` int(3) NOT NULL,
  `Image_path1` varchar(50) NOT NULL,
  `Image_path2` varchar(50) NOT NULL,
  `Image_path3` varchar(50) NOT NULL,
  `Image_path4` varchar(50) NOT NULL,
  `Image_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`Image_ID`, `cid`, `Image_path1`, `Image_path2`, `Image_path3`, `Image_path4`, `Image_desc`) VALUES
(1, 13, 'public/img/1026-1-blu.jpeg', 'public/img/1026-2-blu.jpeg', 'public/img/1026-3-blu.jpeg', 'public/img/1026-4-blu.jpeg', 'blue atletic shoes'),
(2, 14, 'public/img/1026-1-wh.jpeg', 'public/img/1026-2-wh.jpeg', 'public/img/1026-3-wh.jpeg', 'public/img/1026-4-wh.jpeg', 'blue atletic shoes'),
(3, 11, 'public/img/5002-1-bl.jpeg', 'public/img/5002-2-bl.jpeg', 'public/img/5002-3-bl.jpeg', 'public/img/5002-4-bl.jpeg', 'blue slipper'),
(4, 12, 'public/img/5002-1-br.jpeg', 'public/img/5002-1-br.jpeg', 'public/img/5002-1-br.jpeg', 'public/img/5002-1-br.jpeg', 'brown slipper'),
(5, 6, 'public/img/77075-1-mar.jpeg', 'public/img/77075-2-mar.jpeg', 'public/img/77075-3-mar.jpeg', 'public/img/77075-4-mar.jpeg', 'maroon sandal'),
(6, 7, 'public/img/77075-1-pi.jpeg', 'public/img/77075-2-pi.jpeg', 'public/img/77075-3-pi.jpeg', 'public/img/77075-4-pi.jpeg', 'pink sandal'),
(7, 4, 'public/img/5109-1-bl.jpeg', 'public/img/5109-2-bl.jpeg', 'public/img/5109-3-bl.jpeg', 'public/img/5109-4-bl.jpeg', 'blue Sport Sandals'),
(8, 5, 'public/img/5109-1-gr.jpeg', 'public/img/5109-2-gr.jpeg', 'public/img/5109-3-gr.jpeg', 'public/img/5109-4-gr.jpeg', 'green Sport Sandals'),
(9, 1, 'public/img/5687-1-bro.jpeg', 'public/img/5687-2-bro.jpeg', 'public/img/5687-3-bro.jpeg', 'public/img/5687-4-bro.jpeg', 'brown slippers'),
(10, 2, 'public/img/5687-1-bla.jpeg', 'public/img/5687-2-bla.jpeg', 'public/img/5687-3-bla.jpeg', 'public/img/5687-4-bla.jpeg', 'black slippers'),
(11, 3, 'public/img/8004-1-blu.jpeg', 'public/img/8004-2-blu.jpeg', 'public/img/8004-3-blu.jpeg', 'public/img/8004-4-blu.jpeg', 'blue Clogs For Kids'),
(12, 8, 'public/img/5100-1-bl.jpeg', 'public/img/5100-2-bl.jpeg', 'public/img/5100-3-bl.jpeg', 'public/img/5100-4-bl.jpeg', ' blue Sport Sandals'),
(13, 10, 'public/img/4866-1-crbr.jpeg', 'public/img/4866-1-crbr.jpeg', 'public/img/4866-1-crbr.jpeg', 'public/img/4866-1-crbr.jpeg', ' cream brown FLIP FLOP'),
(14, 15, 'public/img/1025-1-bl.jpeg', 'public/img/1025-2-bl.jpeg', 'public/img/1025-3-bl.jpeg', 'public/img/1025-4-bl.jpeg', 'blue slippers'),
(15, 16, 'public/img/1002-1-br.jpeg', 'public/img/1002-2-br.jpeg', 'public/img/1002-3-br.jpeg', 'public/img/1002-4-br.jpeg', 'brown slippers'),
(16, 17, 'public/img/2659-1-bla.jpeg', 'public/img/2659-2-bla.jpeg', 'public/img/2659-3-bla.jpeg', 'public/img/2659-4-bla.jpeg', 'black shoes'),
(17, 18, 'public/img/2C-1-bl.jpeg', 'public/img/2C-2-bl.jpeg', 'public/img/2C-3-bl.jpeg', 'public/img/2C-4-bl.jpeg', 'blue sandal'),
(18, 19, 'public/img/568-1-red.jpeg', 'public/img/568-2-red.jpeg', 'public/img/568-3-red.jpeg', 'public/img/568-4-red.jpeg', 'red slippers'),
(19, 20, 'public/img/897-1-wh.jpeg', 'public/img/897-2-wh.jpeg', 'public/img/897-3-wh.jpeg', 'public/img/897-4-wh.jpeg', 'white sneakers'),
(20, 21, 'public/img/7-1-gr.jpeg', 'public/img/7-2-gr.jpeg', 'public/img/7-3-gr.jpeg', 'public/img/7-4-gr.jpeg', 'green slippers'),
(21, 22, 'public/img/258-1-ma.jpeg', 'public/img/258-2-ma.jpeg', 'public/img/258-3-ma.jpeg', 'public/img/258-4-ma.jpeg', 'maroon slipper'),
(22, 25, 'public/img/103-1-gr.jpg', 'public/img/103-2-gr.jpg', 'public/img/103-3-gr.jpg', 'public/img/103-4-gr.jpg', 'grey insoles for men shoes'),
(23, 27, 'public/img/105-1-gr.jpg', 'public/img/105-2-gr.jpg', 'public/img/105-3-gr.jpg', 'public/img/105-4-gr.jpg', 'grey cushion insoles'),
(24, 23, 'public/img/101-1-gr.jpg', 'public/img/101-2-gr.jpg', 'public/img/101-3-gr.jpg', 'public/img/101-4-gr.jpg', 'grey cushion insoles'),
(25, 24, 'public/img/102-1-blye.jpg', 'public/img/102-2-blye.jpg', 'public/img/102-3-blye.jpg', 'public/img/102-4-blye.jpg', 'Insoles blue yellow for men'),
(26, 28, 'public/img/3365-1-pi.jpeg', 'public/img/3365-2-pi.jpeg', 'public/img/3365-3-pi.jpeg', 'public/img/3365-4-pi.jpeg', 'pink shoes'),
(27, 29, 'public/img/3369-1-pi.jpeg', 'public/img/3369-2-pi.jpeg', 'public/img/3369-3-pi.jpeg', 'public/img/3369-4-pi.jpeg', 'pink shoe'),
(28, 30, 'public/img/879-1-blu.jpeg', 'public/img/879-2-blu.jpeg', 'public/img/879-3-blu.jpeg', 'public/img/879-4-blu.jpeg', 'blue sports shoes'),
(29, 31, 'public/img/3342-1-wh.jpeg', 'public/img/3342-2-wh.jpeg', 'public/img/3342-3-wh.jpeg', 'public/img/3342-4-wh.jpeg', 'white shoes ');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(2) NOT NULL,
  `offer_name` varchar(20) NOT NULL,
  `offer_details` text NOT NULL,
  `offer_status` varchar(20) NOT NULL DEFAULT 'Enabled',
  `offer_percent` int(3) NOT NULL,
  `offer_start_date` date NOT NULL,
  `offer_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `offer_name`, `offer_details`, `offer_status`, `offer_percent`, `offer_start_date`, `offer_end_date`) VALUES
(9, 'walkaro783', 'Get Upto 35% Off on any Walkaro Products.', 'Enabled', 20, '2024-01-17', '2024-03-31'),
(10, 'foot15', 'Get Flat 15% off on your first Order. Enjoy Free Shipping ', 'Enabled', 15, '2024-01-31', '2024-03-31'),
(11, 'fest10', 'Ram Navmi offer. 10 % off on selected products', 'Enabled', 10, '2024-04-01', '2024-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderdetail_id` int(5) NOT NULL,
  `order_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `quantity` int(3) NOT NULL,
  `rate` int(5) NOT NULL,
  `size` int(3) NOT NULL,
  `color` varchar(8) NOT NULL,
  `discount` int(2) NOT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderdetail_id`, `order_id`, `product_id`, `quantity`, `rate`, `size`, `color`, `discount`, `amount`) VALUES
(66, 118, 5002, 1, 227, 7, 'blue', 0, 227),
(67, 118, 1026, 1, 999, 7, 'blue', 0, 999),
(68, 119, 1026, 1, 999, 6, 'blue', 0, 999),
(69, 119, 5002, 2, 227, 6, 'blue', 0, 454),
(70, 120, 5002, 6, 227, 8, 'blue', 272, 1090),
(71, 120, 5002, 1, 227, 9, 'blue', 0, 227),
(72, 121, 5002, 3, 227, 9, 'blue', 0, 681);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(3) NOT NULL,
  `user_id` int(5) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(15) NOT NULL,
  `order_amount` int(6) NOT NULL,
  `discount` int(4) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `shipping_address` text NOT NULL,
  `shipping_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `user_id`, `order_date`, `order_status`, `order_amount`, `discount`, `fname`, `lname`, `mobile`, `email`, `shipping_address`, `shipping_status`) VALUES
(118, 27, '2024-03-22', 'replace', 1261, 15, 'om', 'kumar', 9693808798, 'omkumar1870@gmail.com', '2nd floor, sharad apartment, behind pratistha 20 near mocha cafe c.a. circle , navrangpura, ahmedabad', 'processing'),
(119, 27, '2024-03-22', 'complete', 1488, 15, 'om', 'kumar', 9693808798, 'omkumar1870@gmail.com', '2nd floor, sharad apartment, behind pratistha 20 near mocha cafe c.a. circle , navrangpura, ahmedabad', 'processing'),
(120, 27, '2024-03-22', 'cancel', 1352, 287, 'om', 'kumar', 9693808798, 'omkumar1870@gmail.com', '2nd floor, sharad apartment, behind pratistha 20 near mocha cafe c.a. circle , navrangpura, ahmedabad', 'processing'),
(121, 27, '2024-04-01', 'packed', 731, 0, 'om', 'kumar', 9693808798, 'omk738774@gmail.com', '2nd floor, sharad apartment, behind pratistha 20 near mocha cafe c.a. circle , navrangpura, ahmedabad', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `transaction_id` bigint(25) NOT NULL,
  `order_id` int(3) NOT NULL,
  `payment_mode` varchar(7) NOT NULL,
  `payment_date` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`transaction_id`, `order_id`, `payment_mode`, `payment_date`, `payment_status`) VALUES
(1711096343152966687, 118, 'c', '2024-03-22', 'pending'),
(1711096343935681203, 118, 'c', '2024-03-22', 'pending'),
(1711096518845719576, 119, 'c', '2024-03-22', 'paid'),
(1711096607534504250, 120, 'o', '2024-03-22', 'paid'),
(1711912348818817053, 121, 'o', '2024-04-01', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_id` int(6) NOT NULL,
  `Category_ID` int(2) NOT NULL,
  `offer_id` int(2) DEFAULT NULL,
  `grp` varchar(20) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_details` text NOT NULL,
  `price` int(4) NOT NULL,
  `actual_price` int(4) NOT NULL,
  `pro_status` varchar(10) NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Category_ID`, `offer_id`, `grp`, `product_name`, `product_details`, `price`, `actual_price`, `pro_status`) VALUES
(2, 2, NULL, 'Kids', 'campus', 'XPERIA-2C Navy Kids Sandals', 429, 550, 'Enabled'),
(101, 6, NULL, 'Accessories', 'footvital', 'Footvital Memory Foam Shoe Insoles Comfortable Insoles Supports Heel & Arch Absorbs Foot Sweat & Moisture Ultra Soft Cushioned Lightweight Durable Washable Pads for Men & Women Blue ', 299, 599, 'Enabled'),
(102, 6, NULL, 'Accessories', 'boldfit', 'Boldfit Insole For Shoes Men Shoe Insoles For Men Sole For Shoe Shoe Sole For Men Insoles For Women Flat Foot Insoles For Men Shoes Sole For Men Gel Insoles For Men And Women Trim To Fit  ', 749, 999, 'Enabled'),
(103, 6, NULL, 'Accessories', 'fovera', 'FOVERA Gel Insoles Pair for Walking, Running, Sports, Formal & Safety Shoes-All Day Comfort Shoe Inserts with Dual Gel Technology-Made In India -Full Sole for Every Shoe ', 360, 459, 'Enabled'),
(104, 6, NULL, 'Accessories', 'boldfit', 'Boldfit Insole For Shoes Men Shoe Insoles For Men Sole For Shoe Shoe Sole For Men Insoles For Women Flat Foot Insoles For Men Shoes Sole For Men Gel Insoles For Men And Women Trim To Fit ', 749, 1299, 'Enabled'),
(105, 6, NULL, 'Accessories', 'frido', 'Frido Dual Gel Heavy Duty Trimmable Insoles, For Loose Shoes or Replacing Existing Insoles, Thick Shoe Inserts, Extra Comfort and Support, Proudly Made in India  ', 769, 999, 'Enabled'),
(258, 4, NULL, 'Womans', 'lehar', 'Women Maroon Wedges Sandal', 499, 699, 'Enabled'),
(457, 4, NULL, 'Womans', 'lehar', 'Women Flip Flops', 499, 899, 'Enabled'),
(568, 4, NULL, 'Kids', 'venus', 'Men Flip Flops', 199, 499, 'Enabled'),
(879, 1, NULL, 'Womans', 'campus', 'JESSICA Blue Women Running Shoes', 789, 1299, 'Enabled'),
(897, 1, NULL, 'Kids', 'venus', 'Sneakers For Women', 349, 599, 'Enabled'),
(1002, 4, NULL, 'Mens', 'campus', 'GC-1002C Brown Mens slippers', 351, 499, 'Enabled'),
(1025, 4, NULL, 'Mens', 'campus', 'GC-1025A Blue Mens Slippers', 499, 599, 'Enabled'),
(1026, 1, NULL, 'Mens', 'paragon', 'Paragon K1026G Men Walking Shoes | Athletic Shoes with Comfortable Cushioned Sole for Daily Outdoor Use', 999, 1599, 'Enabled'),
(2659, 1, NULL, 'Womans', 'campus', 'CRISTY Black Womens Running Shoes', 689, 899, 'Enabled'),
(3342, 1, 9, 'Womans', 'walkaro', 'WALKAROO BOYS CASUAL SHOES - WY3342', 584, 899, 'Enabled'),
(3365, 1, 9, 'Womans', 'walkaro', 'WALKAROO WOMEN CASUAL SHOES - WY3365', 519, 799, 'Enabled'),
(3369, 1, 9, 'Womans', 'walkaro', 'WALKAROO WOMEN CASUAL SHOE - WY3369', 649, 999, 'Enabled'),
(4866, 4, 9, 'Womans', 'Walkaro', 'WALKAROO WOMEN FLIP FLOP WC4866', 194, 299, 'Enabled'),
(5002, 4, 9, 'Mens', 'Walkaro', 'WALKAROO MEN SOLID THONG SANDALS ART WG5002', 227, 349, 'Enabled'),
(5100, 2, NULL, 'Mens', 'Lee cooper', 'Polyurethane Slipon Men\'s Sport Sandals', 1499, 1999, 'Enabled'),
(5109, 2, NULL, 'Mens', 'Lee cooper', 'Polyurethane Slipon Men\'s Sport Sandals', 1699, 2199, 'Enabled'),
(5687, 4, 9, 'Mens', 'Walkaro', 'Walkaroo Men Cross strap Slide Sandals - W5687', 227, 349, 'Enabled'),
(8004, 5, NULL, 'Kids', 'paragon', 'Paragon EVK8004C Unisex Clogs For Kids | Outdoor and Indoor Casual, Durable Clogs', 749, 999, 'Enabled'),
(77075, 2, NULL, 'Womans', 'paragon', 'Women\'s Solea Maroon Sandal', 349, 499, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `product_desc`
--

CREATE TABLE `product_desc` (
  `prodesc_ID` int(3) NOT NULL,
  `cid` int(3) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `size` int(2) NOT NULL,
  `quantity` int(3) NOT NULL,
  `prodesc_status` varchar(20) NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_desc`
--

INSERT INTO `product_desc` (`prodesc_ID`, `cid`, `product_type`, `size`, `quantity`, `prodesc_status`) VALUES
(1, 1, 'Daily casual', 6, 30, 'Enabled'),
(2, 1, 'Daily casual', 7, 30, 'Enabled'),
(3, 1, 'Daily casual', 8, 30, 'Enabled'),
(4, 1, 'Daily casual', 9, 30, 'Enabled'),
(5, 1, 'Daily casual', 10, 30, 'Enabled'),
(6, 2, 'Daily casual', 6, 30, 'Enabled'),
(7, 2, 'Daily casual', 7, 30, 'Enabled'),
(8, 2, 'Daily casual', 8, 30, 'Enabled'),
(9, 2, 'Daily casual', 9, 30, 'Enabled'),
(10, 2, 'Daily casual', 10, 30, 'Enabled'),
(11, 3, 'Clogs', 6, 30, 'Enabled'),
(12, 3, 'Clogs', 7, 30, 'Enabled'),
(13, 3, 'Clogs', 8, 30, 'Enabled'),
(14, 4, 'Sports Sandals', 40, 30, 'Enabled'),
(15, 4, 'Sports Sandals', 41, 30, 'Enabled'),
(16, 4, 'Sports Sandals', 42, 30, 'Enabled'),
(17, 4, 'Sports Sandals', 43, 30, 'Enabled'),
(18, 4, 'Sports Sandals', 44, 30, 'Enabled'),
(19, 4, 'Sports Sandals', 45, 30, 'Enabled'),
(20, 5, 'Sports Sandals', 40, 30, 'Enabled'),
(21, 5, 'Sports Sandals', 41, 30, 'Enabled'),
(22, 5, 'Sports Sandals', 42, 30, 'Enabled'),
(23, 5, 'Sports Sandals', 43, 30, 'Enabled'),
(24, 5, 'Sports Sandals', 44, 30, 'Enabled'),
(25, 6, 'PU Sandals', 4, 30, 'Enabled'),
(26, 6, 'PU Sandals', 5, 30, 'Enabled'),
(27, 6, 'PU Sandals', 6, 30, 'Enabled'),
(28, 6, 'PU Sandals', 7, 30, 'Enabled'),
(29, 6, 'PU Sandals', 8, 30, 'Enabled'),
(30, 7, 'PU Sandals', 4, 30, 'Enabled'),
(31, 7, 'PU Sandals', 5, 30, 'Enabled'),
(32, 7, 'PU Sandals', 6, 30, 'Enabled'),
(33, 7, 'PU Sandals', 7, 30, 'Enabled'),
(34, 7, 'PU Sandals', 8, 30, 'Enabled'),
(35, 8, 'Sports Sandals', 40, 30, 'Enabled'),
(36, 8, 'Sports Sandals', 41, 30, 'Enabled'),
(37, 8, 'Sports Sandals', 42, 30, 'Enabled'),
(38, 8, 'Sports Sandals', 43, 30, 'Enabled'),
(39, 8, 'Sports Sandals', 44, 30, 'Enabled'),
(40, 8, 'Sports Sandals', 45, 30, 'Enabled'),
(41, 10, 'rubber slipper', 5, 30, 'Enabled'),
(42, 10, 'rubber slipper', 6, 30, 'Enabled'),
(43, 10, 'rubber slipper', 7, 30, 'Enabled'),
(44, 10, 'rubber slipper', 8, 30, 'Enabled'),
(45, 11, 'solid slipper', 6, 18, 'Enabled'),
(46, 11, 'solid slipper', 7, 27, 'Enabled'),
(47, 11, 'solid slipper', 8, 18, 'Enabled'),
(48, 11, 'solid slipper', 9, 25, 'Enabled'),
(49, 11, 'solid slipper', 10, 30, 'Enabled'),
(50, 11, 'solid slipper', 11, 30, 'Enabled'),
(51, 11, 'solid slipper', 12, 30, 'Enabled'),
(52, 12, 'solid slipper', 6, 30, 'Enabled'),
(53, 12, 'solid slipper', 7, 30, 'Enabled'),
(54, 12, 'solid slipper', 8, 30, 'Enabled'),
(55, 12, 'solid slipper', 9, 30, 'Enabled'),
(56, 12, 'solid slipper', 10, 30, 'Enabled'),
(57, 12, 'solid slipper', 11, 30, 'Enabled'),
(58, 12, 'solid slipper', 12, 30, 'Enabled'),
(59, 13, 'sneakers', 6, 19, 'Enabled'),
(60, 13, 'sneakers', 7, 26, 'Enabled'),
(61, 13, 'sneakers', 8, 28, 'Enabled'),
(62, 13, 'sneakers', 9, 28, 'Enabled'),
(63, 13, 'sneakers', 10, 30, 'Enabled'),
(64, 14, 'sneakers', 6, 30, 'Enabled'),
(65, 14, 'sneakers', 7, 30, 'Enabled'),
(66, 14, 'sneakers', 8, 30, 'Enabled'),
(67, 14, 'sneakers', 9, 30, 'Enabled'),
(68, 14, 'sneakers', 10, 30, 'Enabled'),
(69, 15, 'Fancy slipper', 6, 30, 'Enabled'),
(70, 15, 'Fancy slipper', 7, 30, 'Enabled'),
(71, 15, 'Fancy slipper', 8, 30, 'Enabled'),
(72, 15, 'Fancy slipper', 9, 30, 'Enabled'),
(73, 15, 'Fancy slipper', 10, 30, 'Enabled'),
(74, 16, 'Normal slipper', 6, 30, 'Enabled'),
(75, 16, 'Normal slipper', 7, 30, 'Enabled'),
(76, 16, 'Normal slipper', 8, 30, 'Enabled'),
(77, 16, 'Normal slipper', 9, 30, 'Enabled'),
(78, 16, 'Normal slipper', 10, 30, 'Enabled'),
(79, 17, 'Running Shoes', 6, 30, 'Enabled'),
(80, 17, 'Running Shoes', 7, 30, 'Enabled'),
(81, 17, 'Running Shoes', 8, 30, 'Enabled'),
(82, 17, 'Running Shoes', 9, 30, 'Enabled'),
(83, 17, 'Running Shoes', 10, 30, 'Enabled'),
(84, 18, 'Sports sandals', 2, 30, 'Enabled'),
(85, 18, 'Sports sandals', 3, 30, 'Enabled'),
(86, 18, 'Sports sandals', 4, 30, 'Enabled'),
(87, 18, 'Sports sandals', 5, 30, 'Enabled'),
(88, 19, 'Running Slipper', 2, 30, 'Enabled'),
(89, 19, 'Running Slipper', 3, 30, 'Enabled'),
(90, 19, 'Running Slipper', 4, 30, 'Enabled'),
(91, 19, 'Running Slipper', 5, 30, 'Enabled'),
(92, 20, 'sneakers', 3, 30, 'Enabled'),
(93, 20, 'sneakers', 4, 30, 'Enabled'),
(94, 20, 'sneakers', 5, 30, 'Enabled'),
(95, 20, 'sneakers', 6, 30, 'Enabled'),
(96, 21, 'slipper', 5, 30, 'Enabled'),
(97, 21, 'slipper', 6, 30, 'Enabled'),
(98, 21, 'slipper', 7, 30, 'Enabled'),
(99, 21, 'slipper', 8, 30, 'Enabled'),
(100, 22, 'casual Slipper', 5, 30, 'Enabled'),
(101, 22, 'casual Slipper', 6, 30, 'Enabled'),
(102, 22, 'casual Slipper', 7, 30, 'Enabled'),
(103, 22, 'casual Slipper', 8, 30, 'Enabled'),
(104, 25, 'Insoles', 6, 30, 'Enabled'),
(105, 25, 'Insoles', 7, 30, 'Enabled'),
(106, 25, 'Insoles', 8, 30, 'Enabled'),
(107, 25, 'Insoles', 9, 30, 'Enabled'),
(108, 27, 'cushion', 6, 30, 'Enabled'),
(109, 27, 'cushion', 7, 30, 'Enabled'),
(110, 27, 'cushion', 8, 30, 'Enabled'),
(111, 27, 'cushion', 9, 30, 'Enabled'),
(112, 23, 'cushion', 6, 30, 'Enabled'),
(113, 23, 'cushion', 7, 30, 'Enabled'),
(114, 23, 'cushion', 8, 30, 'Enabled'),
(115, 23, 'cushion', 9, 30, 'Enabled'),
(116, 24, 'Insoles', 6, 30, 'Enabled'),
(117, 24, 'Insoles', 7, 30, 'Enabled'),
(118, 24, 'Insoles', 8, 30, 'Enabled'),
(119, 24, 'Insoles', 9, 30, 'Enabled'),
(120, 28, 'casual', 6, 30, 'Enabled'),
(121, 28, 'casual', 7, 30, 'Enabled'),
(122, 28, 'casual', 8, 30, 'Enabled'),
(123, 28, 'casual', 9, 30, 'Enabled'),
(124, 29, 'casual', 6, 30, 'Enabled'),
(125, 29, 'casual', 7, 30, 'Enabled'),
(126, 29, 'casual', 8, 30, 'Enabled'),
(127, 29, 'casual', 9, 30, 'Enabled'),
(128, 30, 'Sports Shoes', 6, 30, 'Enabled'),
(129, 30, 'Sports Shoes', 7, 30, 'Enabled'),
(130, 30, 'Sports Shoes', 8, 30, 'Enabled'),
(131, 30, 'Sports Shoes', 9, 30, 'Enabled'),
(132, 31, 'sneakers', 6, 30, 'Enabled'),
(133, 31, 'sneakers', 7, 30, 'Enabled'),
(134, 31, 'sneakers', 8, 30, 'Enabled'),
(135, 31, 'sneakers', 9, 30, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `refund_id` int(5) NOT NULL,
  `order_id` int(3) NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp(),
  `refund_date` date NOT NULL,
  `refund_reason` text NOT NULL,
  `refund_amt` int(5) NOT NULL,
  `refund_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`refund_id`, `order_id`, `request_date`, `refund_date`, `refund_reason`, `refund_amt`, `refund_status`) VALUES
(6, 120, '2024-04-01', '2024-04-02', 'Dont want product', 1352, 'done');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(5) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `PAN` varchar(10) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `pin` int(7) NOT NULL,
  `city` varchar(20) NOT NULL,
  `registration_date` date NOT NULL DEFAULT current_timestamp(),
  `usr_status` varchar(8) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fname`, `lname`, `email`, `phone`, `PAN`, `gender`, `pass`, `address`, `pin`, `city`, `registration_date`, `usr_status`) VALUES
(1, 'Admin', 'admin', 'admin890@gmail.com', 8799553322, NULL, 'm', '$2y$10$yzXoNvFu8nO6Rac7EotuUebOpSAFyQ2aouH3ejGPy7Y5q6A4H7.Iy', '18,Parth Society,Bapunagar,Baroda', 385960, 'Ahmedabad', '2024-01-26', 'Active'),
(27, 'Harsh', 'wadhwani', 'harshwadhwani268@gmail.com', 8799553324, '', 'm', '$2y$10$P1Mw2q5LkisxRtGrDf/OA.YxeJrbWgOc13aw5E3gIPd1suiObyAOC', '18,Parth Society,Bapunagar,Baroda', 382350, 'Ahmedabad', '2024-01-26', 'Active'),
(30, 'bhavesh', 'parwani', 'bhaveshparwani1373@gmail.com', 7405567768, NULL, 'm', '$2y$10$LOEr6WmNfWG/Te1l3sB4TeteDpKd6a4E.FEekq//egDatO2Gl1khS', '18,Parth Society,Bapunagar,Baroda', 382350, 'Ahmedabad', '2024-01-26', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `cart_forei` (`user_id`),
  ADD KEY `pro_forei` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `prod_for` (`product_id`),
  ADD KEY `forei_user` (`user_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`Image_ID`),
  ADD KEY `img_forei` (`cid`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderdetail_id`),
  ADD KEY `prodID_for` (`product_id`),
  ADD KEY `orderid_forei` (`order_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_fore` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `pay_fore` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `fore_category` (`Category_ID`),
  ADD KEY `offf_forei` (`offer_id`);

--
-- Indexes for table `product_desc`
--
ALTER TABLE `product_desc`
  ADD PRIMARY KEY (`prodesc_ID`),
  ADD KEY `prodesc_fore` (`cid`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`refund_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cartID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `cid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `Image_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderdetail_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `product_desc`
--
ALTER TABLE `product_desc`
  MODIFY `prodesc_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `refund_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD CONSTRAINT `cart_forei` FOREIGN KEY (`user_id`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `pro_forei` FOREIGN KEY (`product_id`) REFERENCES `product` (`Product_id`);

--
-- Constraints for table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `color_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`Product_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `forei_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `prod_for` FOREIGN KEY (`product_id`) REFERENCES `product` (`Product_id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `img_forei` FOREIGN KEY (`cid`) REFERENCES `color` (`cid`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `orderid_forei` FOREIGN KEY (`order_id`) REFERENCES `order_tbl` (`order_id`),
  ADD CONSTRAINT `prodID_for` FOREIGN KEY (`product_id`) REFERENCES `product` (`Product_id`);

--
-- Constraints for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD CONSTRAINT `user_fore` FOREIGN KEY (`user_id`) REFERENCES `user` (`userID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `pay_fore` FOREIGN KEY (`order_id`) REFERENCES `order_tbl` (`order_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fore_category` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `offf_forei` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`offer_id`);

--
-- Constraints for table `product_desc`
--
ALTER TABLE `product_desc`
  ADD CONSTRAINT `prodesc_fore` FOREIGN KEY (`cid`) REFERENCES `color` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
