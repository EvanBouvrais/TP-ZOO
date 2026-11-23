-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20261014.d250d31a41
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2026 at 11:31 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--
CREATE TABLE `animals` (
  `id` int UNSIGNED NOT NULL,
  `habitat_id` int UNSIGNED NOT NULL,
  `type` enum('bear','tiger','fish','eagle') NOT NULL,
  `age` int NOT NULL,
  `weight` decimal(8,2) NOT NULL,
  `height` decimal(8,2) NOT NULL,
  `is_hungry` tinyint(1) NOT NULL,
  `is_asleep` tinyint(1) NOT NULL,
  `is_sick` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aquariums`
--
CREATE TABLE `aquariums` (
  `habitat_id` int NOT NULL,
  `salinity` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aviaries`
--
CREATE TABLE `aviaries` (
  `habitat_id` int NOT NULL,
  `height` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--
CREATE TABLE `employees` (
  `id` int UNSIGNED NOT NULL,
  `zoo_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `sex` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `habitats`
--
CREATE TABLE `habitats` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `zoo_id` int NOT NULL,
  `type` enum('bear','tiger','fish','eagle') NOT NULL,
  `sanity` enum('good','okay','bad') NOT NULL DEFAULT 'okay'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `habitats`
--

INSERT INTO `habitats` (`id`, `name`, `zoo_id`, `type`, `sanity`) VALUES
(1, 'Enclos des ours', 1, 'bear', 'okay'),
(2, 'Enclos des tigres', 1, 'tiger', 'okay'),
(3, 'Aquarium des poissons', 1, 'fish', 'okay'),
(4, 'Volière des aigles', 1, 'eagle', 'okay');

-- --------------------------------------------------------

--
-- Table structure for table `zoos`
--
CREATE TABLE `zoos` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `max_habitats` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `zoos`
--

INSERT INTO `zoos` (`id`, `name`, `max_habitats`) VALUES
(1, 'Mon Zoo', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_animals_habitats` (`habitat_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `habitats`
--
ALTER TABLE `habitats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zoos`
--
ALTER TABLE `zoos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `habitats`
--
ALTER TABLE `habitats`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zoos`
--
ALTER TABLE `zoos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `fk_animals_habitats` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
