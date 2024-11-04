-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2024 at 08:07 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Mouse', '2024-10-21', '2024-10-21'),
(2, 'Keyboard', '2024-10-21', '2024-10-21'),
(3, 'Monitor', '2024-11-04', '2024-11-04'),
(4, 'Hard Disk', '2024-11-04', '2024-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `unit_price` float NOT NULL,
  `sell_price` float NOT NULL,
  `quantity` int NOT NULL,
  `warranty` date NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventories`
--
INSERT INTO `inventories` (`id`, `name`, `category`, `unit_price`, `sell_price`, `quantity`, `warranty`, `created_at`, `updated_at`) VALUES
(11166, 'Logitech K120 Keyboard', 'Keyboard', 350, 450, 200, '2025-10-15', '2024-11-03', '2024-11-03'),
(11167, 'HP Pavilion Wireless Keyboard', 'Keyboard', 800, 950, 150, '2025-11-30', '2024-11-03', '2024-11-03'),
(11168, 'Razer BlackWidow Elite Gaming Keyboard', 'Keyboard', 1200, 1450, 75, '2026-03-25', '2024-11-03', '2024-11-03'),
(11169, 'Dell KM117 Wireless Keyboard and Mouse Combo', 'Keyboard', 900, 1100, 90, '2025-12-05', '2024-11-03', '2024-11-03'),

(11170, 'Logitech G502 Gaming Mouse', 'Mouse', 650, 800, 100, '2025-10-10', '2024-11-03', '2024-11-03'),
(11171, 'HP X200 Wireless Mouse', 'Mouse', 450, 550, 300, '2025-11-02', '2024-11-03', '2024-11-03'),
(11172, 'Razer DeathAdder Essential', 'Mouse', 700, 850, 120, '2026-01-15', '2024-11-03', '2024-11-03'),
(11173, 'Apple Magic Mouse 2', 'Mouse', 2000, 2400, 60, '2026-05-20', '2024-11-03', '2024-11-03'),

(11174, 'Samsung 24-inch Curved Monitor', 'Monitor', 12000, 14000, 50, '2026-08-01', '2024-11-03', '2024-11-03'),
(11175, 'Dell UltraSharp 27-inch Monitor', 'Monitor', 18000, 21000, 30, '2027-01-01', '2024-11-03', '2024-11-03'),
(11176, 'LG 29-inch UltraWide Monitor', 'Monitor', 15000, 17000, 45, '2026-10-15', '2024-11-03', '2024-11-03'),
(11177, 'ASUS TUF Gaming 32-inch Monitor', 'Monitor', 22000, 25000, 25, '2026-12-25', '2024-11-03', '2024-11-03'),

(11178, 'Seagate Barracuda 1TB HDD', 'Hard Disk', 2500, 3000, 200, '2025-12-31', '2024-11-03', '2024-11-03'),
(11179, 'WD Blue 500GB HDD', 'Hard Disk', 1500, 1800, 150, '2025-10-20', '2024-11-03', '2024-11-03'),
(11180, 'Toshiba Canvio Basics 2TB Portable HDD', 'Hard Disk', 4000, 4500, 100, '2026-03-15', '2024-11-03', '2024-11-03'),
(11181, 'Hitachi Ultrastar 4TB Enterprise HDD', 'Hard Disk', 7500, 8500, 80, '2026-08-30', '2024-11-03', '2024-11-03');


-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `pname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cname` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `unit_sell` float NOT NULL,
  `quantity` float NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int NOT NULL,
  `supplier` varchar(200) NOT NULL,
  `unit_buy` float NOT NULL,
  `quantity` int NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `pname` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier`, `unit_buy`, `quantity`, `added_by`, `created_at`, `updated_at`, `pname`, `category`) VALUES
(18, 'fgjhn', 67, 687, 'admin', '2024-11-03', '2024-11-03', 'hfgjh', 'Mouse');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int NOT NULL,
  `buy` float NOT NULL,
  `sell` float NOT NULL,
  `buyq` int NOT NULL,
  `sellq` int NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int NOT NULL,
  `product` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phone`, `role`, `created_at`, `updated_at`) VALUES
(6, 'Sadnur Islam', 'admin', '$2y$12$F2IHby4VISslQal97SkWZO1zSteB891WTvVQsi.HG1zBQO9OEGpBm', 'admin@gmail.com', '01317845817', 'admin', '2024-10-25', '2024-10-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11136;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
