-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2024 at 08:40 AM
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
-- Database: `shitsaver_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `image_id` bigint NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `user_url` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `views` int NOT NULL,
  `url_address` varchar(60) NOT NULL,
  `likes` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `description`, `user_url`, `date`, `image`, `views`, `url_address`, `likes`) VALUES
(3, 'KYS', 'KIIL YOURSELF NOW!!!', 'yZTaTEO8wMweQPwHNFo00fV7BCxMUkw8xUJ8iPY357eULdQ42Bn', '2024-03-07 04:27:00', 'uploads/17.jpg', 96, 'ErA1YYmwFGYimo8BpQODz4PGCL5vw6ElltpSiqp', 9),
(4, 'Sparkle', 'Elation', 'yZTaTEO8wMweQPwHNFo00fV7BCxMUkw8xUJ8iPY357eULdQ42Bn', '2024-03-07 05:50:52', 'uploads/221.jpg', 0, 'itYYTFeoKIBQv033TlPcd7wopdBw2QKTMS4xqY', 0),
(5, 'Sparkle', 'Aha', 'yZTaTEO8wMweQPwHNFo00fV7BCxMUkw8xUJ8iPY357eULdQ42Bn', '2024-03-07 05:51:17', 'uploads/22.jpg', 4, 'Mo1e0m', 0),
(6, 'W', 'bom', 'yZTaTEO8wMweQPwHNFo00fV7BCxMUkw8xUJ8iPY357eULdQ42Bn', '2024-03-07 05:52:18', 'uploads/10.jpg', 9, 'ZwVMIcKNG9i8Rto', 0),
(7, 'W', 'Bang', 'yZTaTEO8wMweQPwHNFo00fV7BCxMUkw8xUJ8iPY357eULdQ42Bn', '2024-03-07 05:52:50', 'uploads/12.jpg', 28, '389vijQE5MgkMf2XgLzwP1Q4sENAs', 4),
(8, 'W', 'ahhahha', 'yZTaTEO8wMweQPwHNFo00fV7BCxMUkw8xUJ8iPY357eULdQ42Bn', '2024-03-07 08:39:20', 'uploads/16.jpg', 0, 'WoGBfSPy0vi0wFViCr', 0),
(9, 'Sparkle', 'hiahiahaiiha', 'yZTaTEO8wMweQPwHNFo00fV7BCxMUkw8xUJ8iPY357eULdQ42Bn', '2024-03-07 08:39:46', 'uploads/221.jpg', 0, 'UCspb7j9KobujQE7Jhxc7vWgfdBs4MPnE2QMbxlVMeUTSsqWApBZXfqY3H', 0),
(10, 'Chisato', 'yuri', 'yZTaTEO8wMweQPwHNFo00fV7BCxMUkw8xUJ8iPY357eULdQ42Bn', '2024-03-07 08:40:08', 'uploads/02.jpg', 0, 'ou7dYHiryu7Ik3oLa3SRRicTjnQdQZA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `image_id` bigint NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `url_address` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `url_address`, `date`) VALUES
(1, 'test', 'test@gmail.com', 'test1234', 'yZTaTEO8wMweQPwHNFo00fV7BCxMUkw8xUJ8iPY357eULdQ42Bn', '2024-03-07 03:09:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `user_url` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
