-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2024 at 05:28 PM
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
(2, 'Keyboard', '2024-10-21', '2024-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `unit_price` float NOT NULL,
  `quantity` int NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `name`, `category`, `unit_price`, `quantity`, `created_at`, `updated_at`) VALUES
(11111, 'rdtyt', 'keyboard', 576547, 56785, '2024-10-19', '2024-10-19'),
(11117, 'fghfgj', 'keyboard', 2839290, 5, '2024-10-19', '2024-10-25'),
(11123, '547547', 'keyboard', 45747, 457457, '2024-10-19', '2024-10-19'),
(11125, 'fghfh', 'keyboard', 7568, 8568, '2024-10-19', '2024-10-19'),
(11127, 'fsdf', 'Mouse', 48.3333, 12, '2024-10-20', '2024-10-25'),
(11128, 'dfhf', 'Mouse', 5, 5, '2024-10-25', '2024-10-25'),
(11129, '5u', 'Mouse', 9, 0, '2024-10-25', '2024-10-25');

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pname`, `cname`, `category`, `unit_sell`, `quantity`, `added_by`, `created_at`, `updated_at`) VALUES
(3, '5u', 't', 'Mouse', 6, 3, 'admin', '2024-10-25', '2024-10-25'),
(4, '5u', '356', 'Mouse', 3463, 1, 'admin', '2024-10-25', '2024-10-25');

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
(2, 'hhjk', 6779, 69769, 'admin', '2024-10-25', '2024-10-25', 'yj', 'Mouse'),
(3, 'gfhg', 5, 5, 'admin', '2024-10-25', '2024-10-25', 'fghfgj', 'Keyboard'),
(4, 'ghh', 55, 6, 'admin', '2024-10-25', '2024-10-25', 'fsdf', 'Mouse'),
(5, 'ryg', 10, 2, 'admin', '2024-10-25', '2024-10-25', '5u', 'Mouse'),
(6, '36f', 8, 2, 'admin', '2024-10-25', '2024-10-25', '5u', 'Mouse'),
(7, '36f', 8, 2, 'admin', '2024-10-25', '2024-10-25', '5u', 'Keyboard'),
(8, '36f', 8, 2, 'admin', '2024-10-25', '2024-10-25', '5u', 'Mouse'),
(9, 'gfhg', 5, 5, 'admin', '2024-10-25', '2024-10-25', 'dfhf', 'Mouse');

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

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `product`, `category`, `phone`, `email`, `created_at`, `updated_at`, `name`) VALUES
(1, 'fsdf', 'Keyboard', '3466', 'fgj@fjk.com', '2024-10-20', '2024-10-20', 'dhh');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11130;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
