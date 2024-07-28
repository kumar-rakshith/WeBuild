-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 04:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_beer`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `role`, `image`, `description`) VALUES
(10, 'Aniruddha Singh', 'The Head of Construction Execution', 'image/aboutus-page/our-team/member-2(Aniruddha_Singh).jpg', 'The Head of Construction Execution Department in a construction company is a key leadership position responsible for overseeing and managing all aspects of the construction execution process.'),
(13, 'Supriya Kamath', 'Senior Designer & Design Head', 'image/aboutus-page/our-team/member-5(Supriya Kamath).jpg', 'Qualification: B. Des-ID, MSAP Manipal. As a designer, she is a team player with valuable insights and ideas leading to better projects for the company.'),
(14, 'John Rayan Vaz', 'Civil Engineering Head', 'image/aboutus-page/our-team/member-6(John Rayan Vaz).jpg', 'Qualification: B.E civil engineer from MIT manipal with 10 years of work experience. Does his job with a drive and passion, perfecting his skills each time. Executes every project with precision. He is an asset to the company.'),
(15, 'Akhil Kumar', 'Structural Engineering Head', 'image/aboutus-page/our-team/member-7(Akhil_kumar).jpg', 'Qualification: M.Tech in Structural Engineering - IIT Mumbai. As a Structural design head his primary role is to oversee the structural design of various structures. His ken in dynamic analysis is remarkable.'),
(19, 'Rahul Ragvendra', 'Company Secretary & Compliance Officer', 'image/aboutus-page/our-team/member-4(Rahul_Rao).jpg', 'The Company Secretary & Compliance Officer is a multifaceted role responsible for ensuring that the company operates in compliance with all applicable laws, regulations, and internal policies.'),
(20, 'Santosh Rai', 'Head of Construction Quality Control department', 'image/aboutus-page/our-team/member-3(Santosh_Rai).jpg', 'The Head of Construction Quality Control Department holds a critical role in ensuring that construction projects meet stringent quality standards and regulatory requirements.'),
(22, 'Aniruddha Singh', 'The Head of Construction Execution', 'image/aboutus-page/our-team/member-2(Aniruddha_Singh).jpg', 'The Head of Construction Execution Department in a construction company is a key leadership position responsible for overseeing and managing all aspects of the construction execution process.'),
(23, 'Supriya Kamath', 'Senior Designer & Design Head', 'image/aboutus-page/our-team/member-5(Supriya Kamath).jpg', 'Qualification: B. Des-ID, MSAP Manipal. As a designer, she is a team player with valuable insights and ideas leading to better projects for the company.'),
(24, 'John Rayan Vaz', 'Civil Engineering Head', 'image/aboutus-page/our-team/member-6(John Rayan Vaz).jpg', 'Qualification: B.E civil engineer from MIT manipal with 10 years of work experience. Does his job with a drive and passion, perfecting his skills each time. Executes every project with precision. He is an asset to the company.');

-- --------------------------------------------------------

--
-- Table structure for table `submit`
--

CREATE TABLE `submit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `location` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `services` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submit`
--

INSERT INTO `submit` (`id`, `name`, `email`, `number`, `location`, `message`, `services`, `created_at`) VALUES
(14, 'Rakshith kumar ', 'rakshith90@gmail.com', '7319456142', 'mangalore', 'House rnovation', 'renovate_building', '2024-04-25 16:57:38'),
(17, 'virat', 'virat@gmail.com', '7895461322', 'dehil', 'hello', 'construction_build, construction_consultancy', '2024-04-26 11:35:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_beer`
--
ALTER TABLE `admin_beer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit`
--
ALTER TABLE `submit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_beer`
--
ALTER TABLE `admin_beer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `submit`
--
ALTER TABLE `submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
