-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 02:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `username`, `product_id`, `quantity`) VALUES
(31, 'mehedi', 5, 1),
(36, 'mhasan', 105, 2),
(37, 'mhasan', 5, 1),
(38, 'mhasan', 202, 1),
(39, 'mhasan', 306, 1),
(40, 'mhasan', 404, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(3, 'GPU'),
(0, 'Laptop'),
(4, 'Monitor'),
(1, 'Processor'),
(2, 'RAM'),
(5, 'Storage');

-- --------------------------------------------------------

--
-- Table structure for table `gpu`
--

CREATE TABLE `gpu` (
  `product_id` int(20) NOT NULL,
  `type` varchar(100) DEFAULT 'GDDR6',
  `size` varchar(100) NOT NULL,
  `clock` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gpu`
--

INSERT INTO `gpu` (`product_id`, `type`, `size`, `clock`) VALUES
(301, 'GDDR6', '8 GB', '1860 MHz'),
(302, 'GDDR6', '8GB', '1890 MHz'),
(303, 'GDDR6', '8GB', '1730 MHz'),
(304, 'GDDR6', '11GB', '1620 MHz'),
(305, 'GDDR6', '8GB', '1710 MHz'),
(306, 'GDDR6', '16GB', '1750 MHz'),
(307, 'GDDR6', '8GB', '1800 MHz'),
(308, 'GDDR6', '8GB', '1680 MHz');

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `product_id` int(20) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `gpu` varchar(100) NOT NULL,
  `storage` varchar(100) NOT NULL,
  `battery` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`product_id`, `cpu`, `ram`, `gpu`, `storage`, `battery`) VALUES
(1, 'Intel Core i7-9750H', '8GB', 'NVIDIA GTX 1660 Ti', '2TB', 'Li Polymer 94.24Wh'),
(2, 'Intel Core i7-9750H', '16GB', 'NVIDIA GTX 1660 Ti', '1TB', 'Li ion 48Wh'),
(3, 'Intel Core i7-8750H', '16GB', 'NVIDIA GTX 1060', '1TB', 'Li ion 66Wh'),
(4, 'AMD Ryzen 5 2500U', '8GB', 'NVIDIA GTX 1050', '1TB', 'Li ion 48Wh'),
(5, 'Intel Core i7-7700HQ', '8GB', 'NVIDIA GTX MX150', '1TB', 'Li Polymer 60Wh'),
(6, 'Intel Core i7-8700H', '16GB', 'NVIDIA GTX 1070', '1TB', 'Li Polymer 47Wh');

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `product_id` int(20) NOT NULL,
  `panel` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `resolution` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`product_id`, `panel`, `size`, `resolution`) VALUES
(401, 'VA', '27 Inch', '1920 x 1080'),
(402, 'IPS', '27 Inch', '2560 x 1440'),
(403, 'IPS', '24 Inch', '1920 x 1080'),
(404, 'TN', '24.5 Inch', '1920 x 1080'),
(405, 'VA', '27 Inch', '1920 x 1080'),
(406, 'VA', '24 Inch', '1920 x 1080');

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

CREATE TABLE `processor` (
  `product_id` int(20) NOT NULL,
  `frequency` varchar(100) NOT NULL,
  `Cache` varchar(100) NOT NULL,
  `Core` varchar(100) NOT NULL,
  `thread` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `processor`
--

INSERT INTO `processor` (`product_id`, `frequency`, `Cache`, `Core`, `thread`) VALUES
(101, '3.70 GHz to 4.70 GHz', '12M', '6', '12'),
(102, '3.60 GHz to 5.00 GHz', '16M', '8', '16'),
(103, '3.80 GHz To 4.40 GHz', '16M', '8', '16'),
(104, '3.70 GHz to 4.60 GHz', '9M', '6', '6'),
(105, '4.00 GHz to 4.20 GHz', '6M', '4', '4'),
(106, '3.60 GHz to 4.20 GHz', '6M', '4', '4'),
(107, '3.50 GHz to 4.00 GHz', '32M', '12', '24'),
(108, '3.90 GHz to 4.50 GHz', '32M', '8', '16'),
(109, '3.70 GHz to 4.30 GHz', '16M', '8', '16'),
(110, '3.00 GHz to 4.20 GHz', '64M', '32', '64'),
(111, '3.00 GHz to 4.80 GHz', '24M', '18', '36'),
(112, '3.50 GHz to 4.70 GHz', '64M', '16', '32');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stock_status` tinyint(1) NOT NULL,
  `warranty` int(2) DEFAULT 3,
  `price` int(10) DEFAULT 0,
  `imagepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `company`, `name`, `stock_status`, `warranty`, `price`, `imagepath`) VALUES
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
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `product_id` int(20) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'DDR4',
  `capacity` varchar(100) NOT NULL,
  `frequency` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`product_id`, `type`, `capacity`, `frequency`) VALUES
(201, 'DDR4', '16GB', '3200 MHz'),
(202, 'DDR4', '16GB', '3200 MHz'),
(203, 'DDR4', '8GB', '3200 MHz'),
(204, 'DDR4', '16GB', '3200 MHz'),
(205, 'DDR4', '8GB', '2666 MHz'),
(206, 'DDR4', '4GB', '2666 MHz'),
(207, 'DDR4', '16GB', '3200 MHz'),
(208, 'DDR4', '16GB', '2400 MHz'),
(209, 'DDR4', '16GB', '3200 MHz'),
(210, 'DDR4', '16GB', '2400 MHz');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `product_id` int(20) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'SATA',
  `capacity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`product_id`, `type`, `capacity`) VALUES
(501, 'SATA', '1TB'),
(502, 'SATA', '4TB'),
(503, 'SATA', '12TB'),
(504, 'SATA', '3TB'),
(505, 'SATA', '2TB'),
(506, 'SATA', '6TB');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(11) NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `newsletter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `lname`, `username`, `email`, `password`, `phone`, `street`, `city`, `country`, `newsletter`) VALUES
('Mehedi', 'Hasan', 'Mehedi', 'mhasan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'Singra', 'Natore', 'Bangladesh', 0),
('Mehedi', 'Hasan', 'Mhasan', 'mhasan502@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0123', 'Singra', 'Natore', 'Bangladesh', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `username` (`username`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `processor`
--
ALTER TABLE `processor`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `gpu`
--
ALTER TABLE `gpu`
  ADD CONSTRAINT `gpu_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `laptop`
--
ALTER TABLE `laptop`
  ADD CONSTRAINT `laptop_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `monitor`
--
ALTER TABLE `monitor`
  ADD CONSTRAINT `monitor_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `processor`
--
ALTER TABLE `processor`
  ADD CONSTRAINT `processor_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `ram`
--
ALTER TABLE `ram`
  ADD CONSTRAINT `ram_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
