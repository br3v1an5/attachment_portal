-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2021 at 10:57 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attachment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form`
--

CREATE TABLE `tbl_form` (
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `class` varchar(150) NOT NULL,
  `alt_phone` varchar(150) NOT NULL,
  `latitude` decimal(65,0) NOT NULL,
  `longitude` decimal(65,0) NOT NULL,
  `attached_dep` varchar(150) NOT NULL,
  `supervisor_no` varchar(150) NOT NULL,
  `org_email` varchar(150) NOT NULL,
  `org_no` varchar(150) NOT NULL,
  `insured` varchar(150) NOT NULL,
  `org_name` varchar(150) NOT NULL,
  `start_date` date NOT NULL,
  `completion_date` date NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `town` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supervisors`
--

CREATE TABLE `tbl_supervisors` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `department` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `alt_phone` varchar(15) NOT NULL,
  `id` int NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `useremail` varchar(128) NOT NULL,
  `username` varchar(32) NOT NULL,
  `userpassword` varchar(128) NOT NULL,
  `termcondition` tinyint(1) NOT NULL DEFAULT '0',
  `userstatus` tinyint NOT NULL DEFAULT '0',
  `token` varchar(128) NOT NULL,
  `dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` int DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `useremail`, `username`, `userpassword`, `termcondition`, `userstatus`, `token`, `dt`, `is_admin`) VALUES
(1, 'kibetbrevin@gmail.com', 'brevin', '$2y$12$cLdXzd6CSvrLSXBv8G0LBuoE9PZuZhHAulgEzmQiYNc3uyoTt./yu', 1, 1, '75037afc91326026796f6e0e98f439bf', '2021-11-12 15:21:00', 1),
(2, 'arnoldwamae2@gmail.com', 'arnoldwamae', '$2y$12$DFvfxxxcFShLwsqkfOKNU.iMPxGo3KsmChDLNwgIlPFRXksTfgzV6', 1, 1, '6380acb639352a4950a08d307afe9950', '2021-12-06 14:09:30', 1),
(3, 'baruser@hotel.com', 'admin@router.com', '$2y$12$kR.k/B/.anDsxHjOLEz16uBqKvGFdGJNjf0f68uW.wOVarBvdC4Ze', 1, 0, '1d832a8dad678fec66f757ad693c57ca', '2021-12-13 19:22:53', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_supervisors`
--
ALTER TABLE `tbl_supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_supervisors`
--
ALTER TABLE `tbl_supervisors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
