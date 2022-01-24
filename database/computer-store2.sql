-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 15, 2021 at 03:36 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `username` (`username`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `username`, `product_id`, `quantity`) VALUES
(55, 'ajay', 102, 1),
(56, 'ajay', 103, 1),
(57, 'ajay', 105, 1),
(65, 'amantej', 104, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(3, 'Hybrid'),
(1, 'Laptop'),
(2, 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `category1`
--

DROP TABLE IF EXISTS `category1`;
CREATE TABLE IF NOT EXISTS `category1` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category1`
--

INSERT INTO `category1` (`category_id`, `category_name`) VALUES
(3, 'GPU'),
(0, 'Laptop'),
(4, 'Monitor'),
(1, 'Processor'),
(2, 'RAM'),
(5, 'Storage');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `payment_details` varchar(225) NOT NULL,
  `billing_address` varchar(225) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `username`, `product_id`, `quantity`, `payment_details`, `billing_address`, `status`, `date`) VALUES
(1, 'amantej', 102, 1, 'efwas', '', 1, '2021-11-14 19:48:24'),
(2, 'amantej', 105, 3, 'efwas', '', 0, '2021-11-14 19:48:24'),
(3, 'amantej', 105, 1, '', '', 0, '2021-11-15 03:17:13'),
(4, 'amantej', 105, 1, '', '', 0, '2021-11-15 03:19:20'),
(5, 'amantej', 201, 1, '', '', 0, '2021-11-15 03:24:03'),
(6, 'amantej', 201, 1, '', '', 0, '2021-11-15 03:27:39'),
(7, 'amantej', 104, 1, '', '', 0, '2021-11-15 03:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stock_status` tinyint(2) NOT NULL,
  `warranty` int(20) NOT NULL,
  `price` int(10) NOT NULL,
  `imagepath` varchar(225) NOT NULL,
  `cpu` varchar(225) NOT NULL,
  `ram` varchar(225) NOT NULL,
  `gpu` varchar(225) NOT NULL,
  `battery` varchar(225) NOT NULL,
  `storage` varchar(225) NOT NULL,
  `size` int(40) NOT NULL,
  `weight` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `company`, `name`, `stock_status`, `warranty`, `price`, `imagepath`, `cpu`, `ram`, `gpu`, `battery`, `storage`, `size`, `weight`) VALUES
(101, 1, 'Asus', 'Asus ROG Strix G531GU FHD', 1, 3, 899, '955075181_g531gu-1-500x500.jpg', 'Intel Core i7-9750H', '8 Gb', 'NVIDIA GTX 1660 Ti', 'Li Polymer 94.24Wh', '1TB', 13, 2),
(102, 1, 'Dell', 'Dell Xps', 1, 2, 1000, 'img/gl504gm-scare-1-', 'Intel Core i7-9750H', '16GB', 'NVIDIA GTX 1660 Ti', 'Li-Polymer 94.24Wh', '2TB', 13, 2),
(103, 1, 'MSI', 'MSI 1017', 1, 1, 799, 'img/ge63-raider-', 'Intel Core i7-7700HQ', '16GB', 'NVIDIA GTX 1660 ', 'Li Polymer 47Wh', '1TB', 15, 2.5),
(104, 1, 'Dell', 'Dell G3', 1, 2, 999, 'img/ps42-', 'Intel Core i7-7700HQ', '8GB', 'NVIDIA GTX 1050 Ti', 'Li ion 48Wh', '1TB', 16, 3),
(105, 1, 'Apple', 'Apple mac book  ', 1, 3, 1200, 'img/8700k-', 'M1 Chip', '8GB', 'N/A', 'Li Polymer 94.24Wh', '512GB', 13, 1.5),
(201, 2, 'Samsung', 'Samsung Galaxy Tab A ', 1, 1, 399, 'img/x570zd-01-', '1.2GHz quad-core', '2GB', 'N/A', '4200mAh', '16GB', 8, 0.4),
(202, 2, 'Apple', 'iPad Pro', 1, 1, 999, 'img/x570zd-01-', '2.2 GHz Snapdragon\r\n', '4 GB', 'Apple A12Z Bionic graphics card', '7600 mAh', '32GB', 6, 0.3),
(203, 2, 'Samsung ', 'Samsung Galaxy Tab S7', 1, 1, 249, 'img/x570zd-01-', '1.8 GHz Quad-Core', '2GB', 'N/A', '3000mAh', '16GB', 7, 1.5),
(204, 2, 'Samsung', 'Samsung Galaxy Tab S6', 1, 2, 199, 'img/x570zd-01-', '1.5GHz Quad-Core\r\n', '1GB', 'N/A', '2500mAh', '12GB', 6, 2),
(106, 1, 'MSI', 'MSI PS42', 1, 2, 899, 'img/x570zd-01-', 'Intel Core i7-7700HQ\r\n', '8GB', 'NVIDIA GTX 1050 Ti\r\n', 'Li-ion 48Wh\r\n', '1TB', 15, 2),
(107, 1, 'Asus', 'ASUS X4607D ', 1, 3, 699, 'img/x570zd-01-', 'Intel Core i7-7700HQ\r\n', '8GB', 'NVIDIA GTX 1660 Ti\r\n', 'Li-Polymer 94.24Wh\r\n', '2TB', 14, 3),
(108, 1, 'Asus', 'ASUS Zenbook', 1, 2, 899, 'iimg/x570zd-01-', 'Intel Core i5-9750H\r\n', '8GB', 'NVIDIA GTX 1650 ', 'Li-Polymer 40Wh\r\n', '2TB', 14, 2.2),
(109, 1, 'Apple', 'Mac book Air', 1, 2, 1499, 'img/x570zd-01-', 'Intel Core i7-7700HQ\r\n', '8GB', 'N/A', 'Li-Polymer 90.24Wh\r\n', '512GB', 15, 1.99),
(110, 1, 'Asus', 'ASUS YX5691', 1, 2, 749, 'img/x570zd-01-', 'Intel Core i5-7700HQ\r\n', '16GB', 'NVIDIA GTX 1050 \r\n', 'Li-ion 48Wh\r\n', '2TB', 14, 2.5),
(111, 1, 'Dell', 'Dell G5', 1, 2, 799, 'img/x570zd-01-', 'Intel Core i5\r\n', '8GB', 'NVIDIA GTX 1050 ', 'Li-Polymer 91Wh\r\n', '1TB', 15, 2.7),
(205, 2, 'Apple', 'Ipad Mini 11', 1, 2, 499, 'img/x570zd-01-', '1.5GHz Quad-Core', '2GB', 'Apple A11Z Bionic graphics card', '7000 mAh', '32GB', 6, 0.6),
(206, 2, 'Lenovo', 'Lenovo Tab P11', 1, 1, 149, 'img/x570zd-01-', '1.5GHz Quad-Core', '2GB', 'N/A', '1500mAh', '16GB', 11, 1),
(207, 2, 'Lenovo', 'Lenovo Tab Z1', 1, 1, 159, 'img/x570zd-01-', '2GHz Quad-Core\r\n', '4GB', 'N/A', '3000mAh', '32GB', 12, 0.7),
(208, 2, 'Apple', 'Ipad Pro', 1, 2, 699, 'img/x570zd-01-', '1.5GHz', '2GB', 'A9 Bionic Chip', '5000mAh', '16GB', 10, 2),
(209, 2, 'Apple', 'Apple ipad pro 2 ', 1, 1, 699, 'img/x570zd-01-', '3GHz Quadcore', '4GB', 'A08 Bionic Chip', '8600 mAh', '32GB', 10, 2),
(210, 2, 'Samsung', 'Samsung Galaxy Tab S6', 1, 2, 599, 'img/x570zd-01-', '2.2 GHz Snapdragon', '4GB', 'A11 Bionic Chip', '7500mAh', '32GB', 11, 2),
(211, 2, 'Apple', 'Apple ipad', 1, 1, 499, 'img/x570zd-01-', '1.8 GHz Quad-Core', '2GB', 'A07 Bionic Chip', '5000mAh', '32GB', 9, 2),
(301, 3, 'Dell', 'Dell Latitude 7220', 1, 2, 1499, '829399996_corsair-8gb-500x500.jpg', 'Intelï¿½ Coreï¿½ i3-8145U, 8 GB', '16GB', 'M.2 128GB PCIe NVMe Class 35 Solid State Drive', '32 WHr 2-cell lithium-polymer', '512GB', 15, 3),
(302, 3, 'Microsoft', 'Surface Laptop Go - Platinum', 1, 2, 1499, '940337223_vulcan-z-01-500x500.jpg', 'Intel Core i5', '8GB', 'N/A', 'up to 13hours', '64 GB', 14, 2),
(303, 3, 'Lenovo', 'ThinkPad X1 Carbon ', 1, 2, 1499, 'img/x570zd-01-', 'intel i5 ', '8GB', 'Integrated Intel® Iris® Xe Graphics', '50 Whr ( 3.29 Ah )\r\n8 Cell Li-ion', '1TB', 12, 3),
(304, 3, 'Asus', 'Asus VivoBook 14 F415EA-UB34 ', 1, 2, 1439, 'img/x570zd-01-', 'Intel Core i5- 7200u', '4 GB ', 'N/A', '2800mAh / 32Wh', '1TB', 15, 2),
(305, 3, 'Lenovo', 'Lenovo IdeaPad 1 81VU00D6US ', 1, 2, 1279, 'img/x570zd-01-', '	\r\nIntel Pentium Silver N5030 1.10 up to 3.10 GHz', '8GB', 'N/A', '32 WHr 2-cell lithium-polymer', '1.5TB', 14, 2),
(86, 2, 'sony', 'scr', 1, 2, 2354, '209598705_2990wx-2-500x500.jpg', 'w22', '2gb', 'er4', 'geg', '34gb', 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product1`
--

DROP TABLE IF EXISTS `product1`;
CREATE TABLE IF NOT EXISTS `product1` (
  `product_id` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stock_status` tinyint(1) NOT NULL,
  `warranty` int(2) DEFAULT '3',
  `price` int(10) DEFAULT '0',
  `imagepath` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product1`
--

INSERT INTO `product1` (`product_id`, `category_id`, `company`, `name`, `stock_status`, `warranty`, `price`, `imagepath`) VALUES
(1, 0, 'Gigabyte', 'Gigabyte AERO 15-SA UHD AMOLED Laptop', 1, 3, 170000, 'img/15-sa-1-'),
(2, 0, 'Asus', 'Asus ROG Strix G531GU FHD Gaming Laptop', 1, 3, 175000, 'img/g531gu-1-'),
(3, 0, 'Asus', 'Asus GL504GM Narrow Bezel Gaming Laptop', 0, 3, 144000, 'img/gl504gm-scare-1-'),
(4, 0, 'Asus', 'ASUS X570ZD FHD Gaming Laptop', 0, 3, 60500, 'img/x570zd-01-'),
(5, 0, 'MSI', 'MSI PS42 8M FHD Gaming Laptop', 0, 3, 88000, 'img/ps42-'),
(6, 0, 'MSI', 'MSI GE63 Raider RGB 8RF FHD Gaming Laptop', 1, 3, 90500, 'img/ge63-raider-'),
(101, 1, 'Intel', 'Intel 8th Generation Core i7-8700K Processor', 1, 3, 33000, 'img/8700k-'),
(102, 1, 'Intel', 'Intel Core i9-9900K 9th generation Processor', 1, 3, 48000, 'img/intel-core-i9-9900k-'),
(103, 1, 'Intel', 'Intel Core i7 9800x X-series Skylake Processor', 1, 3, 80000, 'img/9800x-'),
(104, 1, 'Intel', 'Intel 9th Generation Core i5-9600K Processor', 1, 3, 22000, 'img/9600k-3-'),
(105, 1, 'Intel', 'Intel Core i5-7640X  Kaby Lake Processor', 1, 3, 22000, 'img/7640X-'),
(106, 1, 'Intel', 'Intel 9th Gen Core i3 9100 Processor', 1, 3, 12000, 'img/i3-9100-'),
(107, 1, 'AMD', 'AMD Ryzen Threadripper 2970X Processor', 1, 3, 45000, 'img/2970wx-'),
(108, 1, 'AMD', 'AMD Ryzen 7 3800X Processor', 1, 3, 37000, 'img/3700x-'),
(109, 1, 'AMD', 'AMD Ryzen 7 2700X Processor', 1, 3, 24000, 'img/2700x-0-'),
(110, 1, 'AMD', 'AMD Ryzen Threadripper 2990WX', 1, 3, 120000, 'img/2990wx-2-'),
(111, 1, 'Intel', 'Intel 10th Gen Core i9 10980XE Processor', 0, 3, 0, 'img/core-i9-10900x-'),
(112, 1, 'AMD', 'AMD Ryzen 9 3950X Processor', 0, 3, 0, 'img/ryzen-9-3950-'),
(201, 2, 'Corsair', 'Corsair Vengeance RGB Pro 16GB RAM', 1, 3, 7800, 'img/Vengeance-Pro-'),
(202, 2, 'Corsair', 'Corsair Dominator Platinum 16GB RAM', 0, 3, 11700, 'img/16gb-ddr4-'),
(203, 2, 'Corsair', 'Corsair Vengeance RGB 8GB RAM', 1, 3, 5600, 'img/corsair-8gb-'),
(204, 2, 'Team', 'TEAM DARK PRO UD 8GBx2 RAM', 1, 3, 9000, 'img/dark-pro-x2-'),
(205, 2, 'Team', 'TEAM DELTA UD 8GB RGB RAM', 1, 3, 3900, 'img/dealta-ud-'),
(206, 2, 'Team', 'Team Vulcan Z 4GB Gaming RAM', 0, 3, 2600, 'img/vulcan-z-01-'),
(207, 2, 'Corsair', 'Corsair Dominator RGB 16GB RAM', 0, 3, 11000, 'img/16gb-ddr4-rgb-1-'),
(208, 2, 'Team', 'Team Elite Plus 16GB DIMM RAM', 1, 3, 6000, 'img/elite-plus-1-'),
(209, 2, 'Team', 'TEAM NIGHT HAWK 16GB UD RGB RAM', 1, 5, 12000, 'img/night-hawk-ud-'),
(210, 2, 'Corsair', 'Corsair Vengeance LPX 16GB RAM', 1, 5, 7000, 'img/16gb-v-'),
(301, 3, 'Gigabyte', 'Gigabyte Aorus RTX 2080 Super Graphics', 1, 2, 83500, 'img/rtx-2080-1-'),
(302, 3, 'Asus', 'Asus ROG Strix GeForce RTX 2080 OC edition', 1, 2, 91500, 'img/asus-rtx-2080-1-'),
(303, 3, 'Asus', 'ASUS TUF Gaming X3 Radeon RX 5700 OC', 1, 3, 48500, 'img/rx-5700-xt-1-'),
(304, 3, 'MSI', 'MSI GeForce RTX 2080 Ti OC Graphics Card', 1, 3, 138500, 'img/rtx-2080-ti-gaming-x-'),
(305, 3, 'MSI', 'MSI GeForce RTX 2080 VENTUS Graphics Card', 1, 3, 77000, 'img/rtx-2080-'),
(306, 3, 'Asus', 'Asus Radeon VII DP Graphics Card', 1, 3, 71000, 'img/radeon-vii-01-'),
(307, 3, 'Asus', 'Asus ROG Strix RTX 2070 Super Graphics Card', 1, 2, 65000, 'img/geforce-rtx-2070-super-'),
(308, 3, 'Gigabyte', 'Gigabyte RTX 2060 SUPER WINDFORCE GPU', 0, 3, 42000, 'img/rtx-2060-'),
(401, 4, 'Gigabyte', 'Gigabyte Aorus CV27F 165Hz Curved Monitor', 1, 3, 40500, 'img/cv27f-'),
(402, 4, 'Gigabyte', 'Gigabyte Aorus AD27QD 144Hz Gaming Monitor', 1, 3, 54500, 'img/aorus-ad27qd-1-'),
(403, 4, 'Asus', 'ASUS TUF VG249Q 144Hz Gaming Monitor', 0, 3, 26500, 'img/vg249q-1-'),
(404, 4, 'Asus', 'Asus VG258Q 144Hz Gaming Monitor', 1, 3, 27500, 'img/vg258q-1-'),
(405, 4, 'Asus', 'Asus ROG Strix XG27VQ 144Hz Curved Monitor', 1, 3, 45500, 'img/xg27vq-'),
(406, 4, 'MSI', 'MSI Optix G241VC Curved Monitor', 1, 3, 16500, 'img/g241vc-1-'),
(501, 5, 'Seagate', 'Seagate SkyHawk 1TB Surveillance HDD', 1, 3, 4000, 'img/1tb-'),
(502, 5, 'Seagate', 'Seagate IronWolf 4TB SATA NAS HDD', 0, 3, 12800, 'img/ironwolf-4tb-1-'),
(503, 5, 'Seagate', 'Seagate Skyhawk 12TB SATA Surveillance HDD', 1, 3, 43500, 'img/barracuda-8tb-001-'),
(504, 5, 'Seagate', 'Seagate SkyHawk 3TB Surveillance HDD', 0, 3, 7500, 'img/3tb-'),
(505, 5, 'Seagate', 'Seagate Barracuda 2TB Surveillance HDD', 1, 3, 5700, 'img/2tb-hdd-1-'),
(506, 5, 'Seagate', 'Seagate SkyHawk 6TB Surveillance HDD', 1, 3, 18000, 'img/skyhawk-6tb-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(11) NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `lname`, `username`, `email`, `password`, `phone`, `street`, `city`, `country`, `newsletter`) VALUES
('aja', 'y', 'ajay', 'ajay@gm.com', '123', '000', 'jims', 'jims', 'usa', 0),
('aman', 'tej', 'amantej', 'aman@gmail.com', '12345', '123456', 'greens', 'greens', 'usa', 1),
('Mehedi', 'Hasan', 'Mehedi', 'mhasan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'Singra', 'Natore', 'Bangladesh', 0),
('Mehedi', 'Hasan', 'Mhasan', 'mhasan502@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0123', 'Singra', 'Natore', 'Bangladesh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `wishlist_id` int(225) NOT NULL AUTO_INCREMENT,
  `product_id` int(225) NOT NULL,
  `username` varchar(200) NOT NULL,
  `quantity` int(100) NOT NULL,
  PRIMARY KEY (`wishlist_id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `product_id`, `username`, `quantity`) VALUES
(51, 105, 'amantej', 1),
(53, 102, 'amantej', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product1` (`product_id`);

--
-- Constraints for table `product1`
--
ALTER TABLE `product1`
  ADD CONSTRAINT `product1_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category1` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
