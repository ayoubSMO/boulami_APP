-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 04:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cliniquelaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `cin_doc` varchar(8) NOT NULL,
  `cin_pat` varchar(8) NOT NULL,
  `date` date NOT NULL,
  `ord` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `cin` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`cin`, `fname`, `lname`, `email`, `phone`, `fonction`, `login`, `password`, `speciality`, `city`, `quote`, `created_at`, `updated_at`) VALUES
('hjhjh', 'hjhjh', 'jhjhj', 'jhjhjh', 'jhjhj', 'hjhjh', 'jhjhjh', 'jhjhjhj', 'hjhjhj', '200', 200.00, '2021-05-15 16:53:41', '2021-05-15 16:53:41'),
('iuiu', 'hjhjh', 'jhjhj', 'jhjhjh', 'jhjhj', 'hjhjh', 'jhjhjh', 'jhjhjhj', 'hjhjhj', '200', 200.00, '2021-05-15 16:55:38', '2021-05-15 16:55:38'),
('ooiii', 'uhuh', 'uhuh', 'uhuh', 'uhuh', 'uhuh', 'uhuhuh', 'uhuhuh', 'uhuhuh', '33', 33.00, '2021-05-15 16:58:20', '2021-05-15 16:58:20'),
('ttt7766', 'hjhjh', 'jhjhj', 'jhjhjh', 'jhjhj', 'hjhjh', 'jhjhjh', 'jhjhjhj', 'hjhjhj', '200', 200.00, '2021-05-15 16:56:34', '2021-05-15 16:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(120, '2014_10_12_000000_create_users_table', 1),
(121, '2014_10_12_100000_create_password_resets_table', 1),
(122, '2019_08_19_000000_create_failed_jobs_table', 1),
(123, '2021_05_09_124018_create_timeslots_table', 1),
(124, '2021_05_09_125420_create_doctors_table', 1),
(125, '2021_05_09_132609_create_patients_table', 1),
(126, '2021_05_09_212014_create_r_d_v_s_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ords`
--

CREATE TABLE `ords` (
  `num` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `cin` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `r_d_v_s`
--

CREATE TABLE `r_d_v_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timeslot` int(11) NOT NULL,
  `isAbort` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` date NOT NULL,
  `startHour` time NOT NULL,
  `endHour` time NOT NULL,
  `isDisponible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`id`, `day`, `startHour`, `endHour`, `isDisponible`, `created_at`, `updated_at`) VALUES
(1, '2021-05-15', '12:00:00', '12:30:00', 0, NULL, NULL),
(2, '2021-05-15', '18:31:40', '18:50:42', 0, NULL, NULL),
(3, '2021-05-15', '08:00:00', '08:30:00', 1, '2021-05-15 18:58:31', '2021-05-15 18:58:31'),
(4, '2021-05-15', '08:30:00', '09:00:00', 1, '2021-05-15 18:58:31', '2021-05-15 18:58:31'),
(5, '2021-05-15', '09:00:00', '09:30:00', 1, '2021-05-15 18:58:31', '2021-05-15 18:58:31'),
(6, '2021-05-15', '09:30:00', '10:00:00', 1, '2021-05-15 18:58:31', '2021-05-15 18:58:31'),
(7, '2021-05-15', '10:00:00', '10:30:00', 1, '2021-05-15 18:58:31', '2021-05-15 18:58:31'),
(8, '2021-05-15', '10:30:00', '11:00:00', 1, '2021-05-15 18:58:31', '2021-05-15 18:58:31'),
(9, '2021-05-15', '11:00:00', '11:30:00', 1, '2021-05-15 18:58:31', '2021-05-15 18:58:31'),
(10, '2021-05-15', '11:30:00', '12:00:00', 1, '2021-05-15 18:58:31', '2021-05-15 18:58:31'),
(11, '2021-05-15', '12:00:00', '12:30:00', 1, '2021-05-15 18:58:31', '2021-05-15 18:58:31'),
(12, '2021-05-16', '08:00:00', '08:30:00', 1, '2021-05-16 11:46:57', '2021-05-16 12:54:12'),
(13, '2021-05-16', '08:30:00', '09:00:00', 0, '2021-05-16 11:46:57', '2021-05-16 12:54:36'),
(14, '2021-05-16', '09:00:00', '09:30:00', 0, '2021-05-16 11:46:57', '2021-05-16 12:54:38'),
(15, '2021-05-16', '09:30:00', '10:00:00', 0, '2021-05-16 11:46:57', '2021-05-16 12:54:40'),
(16, '2021-05-16', '10:00:00', '10:30:00', 1, '2021-05-16 11:46:57', '2021-05-16 11:46:57'),
(17, '2021-05-16', '10:30:00', '11:00:00', 1, '2021-05-16 11:46:57', '2021-05-16 11:46:57'),
(18, '2021-05-16', '11:00:00', '11:30:00', 1, '2021-05-16 11:46:57', '2021-05-16 11:46:57'),
(19, '2021-05-16', '11:30:00', '12:00:00', 1, '2021-05-16 11:46:57', '2021-05-16 11:46:57'),
(20, '2021-05-16', '12:00:00', '12:30:00', 1, '2021-05-16 11:46:57', '2021-05-16 11:46:57'),
(21, '2021-05-17', '08:00:00', '08:30:00', 1, '2021-05-16 12:52:19', '2021-05-16 12:52:19'),
(22, '2021-05-17', '08:30:00', '09:00:00', 1, '2021-05-16 12:52:19', '2021-05-16 12:52:19'),
(23, '2021-05-17', '09:00:00', '09:30:00', 1, '2021-05-16 12:52:19', '2021-05-16 12:52:19'),
(24, '2021-05-17', '09:30:00', '10:00:00', 1, '2021-05-16 12:52:19', '2021-05-16 12:52:19'),
(25, '2021-05-17', '10:00:00', '10:30:00', 1, '2021-05-16 12:52:19', '2021-05-16 12:52:19'),
(26, '2021-05-17', '10:30:00', '11:00:00', 1, '2021-05-16 12:52:19', '2021-05-16 12:52:19'),
(27, '2021-05-17', '11:00:00', '11:30:00', 1, '2021-05-16 12:52:19', '2021-05-16 12:52:19'),
(28, '2021-05-17', '11:30:00', '12:00:00', 1, '2021-05-16 12:52:19', '2021-05-16 12:52:19'),
(29, '2021-05-17', '12:00:00', '12:30:00', 1, '2021-05-16 12:52:19', '2021-05-16 12:52:19'),
(30, '2021-05-18', '08:00:00', '08:30:00', 0, '2021-05-16 12:54:30', '2021-05-16 12:54:35'),
(31, '2021-05-18', '08:30:00', '09:00:00', 1, '2021-05-16 12:54:30', '2021-05-16 12:54:30'),
(32, '2021-05-18', '09:00:00', '09:30:00', 1, '2021-05-16 12:54:30', '2021-05-16 12:54:30'),
(33, '2021-05-18', '09:30:00', '10:00:00', 1, '2021-05-16 12:54:30', '2021-05-16 12:54:30'),
(34, '2021-05-18', '10:00:00', '10:30:00', 1, '2021-05-16 12:54:30', '2021-05-16 12:54:30'),
(35, '2021-05-18', '10:30:00', '11:00:00', 1, '2021-05-16 12:54:30', '2021-05-16 12:54:30'),
(36, '2021-05-18', '11:00:00', '11:30:00', 1, '2021-05-16 12:54:30', '2021-05-16 12:54:30'),
(37, '2021-05-18', '11:30:00', '12:00:00', 1, '2021-05-16 12:54:30', '2021-05-16 12:54:30'),
(38, '2021-05-18', '12:00:00', '12:30:00', 1, '2021-05-16 12:54:30', '2021-05-16 12:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`cin_doc`,`cin_pat`),
  ADD KEY `ord` (`ord`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`cin`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ords`
--
ALTER TABLE `ords`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`cin`);

--
-- Indexes for table `r_d_v_s`
--
ALTER TABLE `r_d_v_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `r_d_v_s`
--
ALTER TABLE `r_d_v_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `ord` FOREIGN KEY (`ord`) REFERENCES `ords` (`num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
