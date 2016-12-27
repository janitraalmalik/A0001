-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2016 at 12:44 AM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_a001`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_generatenumber`
--

CREATE TABLE `m_generatenumber` (
  `id` int(11) NOT NULL,
  `type_nomor` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_generatenumber`
--

INSERT INTO `m_generatenumber` (`id`, `type_nomor`, `kode`, `count`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'vendor', '00000', 0, 'JU001', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'purchaseorder', '00003', 3, 'JU001', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'payorder', '00006', 6, 'JU001', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'inbound', '00052', 52, 'JU001', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'outbound', '00005', 5, 'JU001', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_generatenumber`
--
ALTER TABLE `m_generatenumber`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_generatenumber`
--
ALTER TABLE `m_generatenumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
