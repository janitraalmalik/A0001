-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2016 at 12:46 AM
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
-- Table structure for table `sa_t_pos`
--

CREATE TABLE `sa_t_pos` (
  `id` int(11) NOT NULL,
  `sale_no` varchar(20) DEFAULT NULL,
  `sale_tgl` date DEFAULT NULL,
  `cust_id` varchar(20) DEFAULT NULL,
  `sale_type` varchar(20) DEFAULT NULL,
  `sale_subtotal` double(12,2) DEFAULT NULL,
  `sale_ppn` double(12,2) DEFAULT NULL,
  `sale_total` double(12,2) DEFAULT NULL,
  `sale_bayar` double(12,2) DEFAULT NULL,
  `status_receive` int(1) DEFAULT NULL,
  `kd_jns_usaha` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_t_pos`
--

INSERT INTO `sa_t_pos` (`id`, `sale_no`, `sale_tgl`, `cust_id`, `sale_type`, `sale_subtotal`, `sale_ppn`, `sale_total`, `sale_bayar`, `status_receive`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'R00001', '2016-12-19', NULL, 'RETAIL', 90000.00, 5000.00, 95000.00, 100000.00, NULL, 'JU001', '2016-12-19', 1, NULL, NULL, NULL, NULL),
(2, 'G00001', '2016-12-19', '0001', 'GROSIR', 30000.00, 3000.00, 33000.00, 40000.00, 1, 'JU001', '2016-12-19', 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sa_t_pos`
--
ALTER TABLE `sa_t_pos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sa_t_pos`
--
ALTER TABLE `sa_t_pos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
