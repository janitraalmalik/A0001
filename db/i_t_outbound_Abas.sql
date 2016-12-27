-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2016 at 12:47 AM
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
-- Table structure for table `i_t_outbound`
--

CREATE TABLE `i_t_outbound` (
  `id` int(10) NOT NULL,
  `id_outbound` varchar(20) DEFAULT NULL,
  `no_trx_sales` varchar(200) DEFAULT NULL,
  `cust_id` varchar(25) DEFAULT NULL,
  `date_out` datetime DEFAULT NULL,
  `barang_kd` varchar(255) DEFAULT NULL,
  `out_type` varchar(100) DEFAULT NULL,
  `flag_id` int(10) DEFAULT NULL,
  `jml_in` int(10) DEFAULT NULL,
  `refund` int(50) DEFAULT NULL,
  `sisa` int(50) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `i_t_outbound`
--

INSERT INTO `i_t_outbound` (`id`, `id_outbound`, `no_trx_sales`, `cust_id`, `date_out`, `barang_kd`, `out_type`, `flag_id`, `jml_in`, `refund`, `sisa`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(5, '00003', 'G00001', '0001', '2016-12-27 00:00:00', '0001', 'GROSIR', 1, 50, 0, 10, 'JU001', '2016-12-27 23:40:52', 1, NULL, NULL, NULL, NULL),
(6, '00004', 'G00001', '0001', '2016-12-27 00:00:00', '0001', 'GROSIR', 1, 10, 0, 0, 'JU001', '2016-12-27 23:41:07', 1, NULL, NULL, NULL, NULL),
(7, '00005', 'G00001', '0001', '2016-12-27 00:00:00', '0001', 'GROSIR', 1, 10, 0, 0, 'JU001', '2016-12-27 23:41:17', 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `i_t_outbound`
--
ALTER TABLE `i_t_outbound`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `i_t_outbound`
--
ALTER TABLE `i_t_outbound`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
