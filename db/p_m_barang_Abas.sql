-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2016 at 12:45 AM
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
-- Table structure for table `p_m_barang`
--

CREATE TABLE `p_m_barang` (
  `id` int(11) NOT NULL,
  `brg_kd` varchar(255) DEFAULT NULL,
  `brg_nama` varchar(255) DEFAULT NULL,
  `brg_desc` varchar(255) DEFAULT NULL,
  `cat_barang_id` int(11) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `stok` int(10) DEFAULT '0',
  `harga_jual` double(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_m_barang`
--

INSERT INTO `p_m_barang` (`id`, `brg_kd`, `brg_nama`, `brg_desc`, `cat_barang_id`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `stok`, `harga_jual`) VALUES
(1, '0001', 'Product A', 'Product A', 7, 'JU001', '2016-11-25 10:05:11', NULL, NULL, NULL, NULL, NULL, 1050, NULL),
(2, 'OK', 'kkajjsk Update', 'jsjsjsj', 1, 'JU001', '2016-11-27 12:55:40', NULL, '2016-11-27 12:55:53', NULL, '2016-11-27 12:56:01', 0, 125, NULL),
(3, '0002', 'Test Gain', 'Test', 1, 'JU001', '2016-11-28 23:14:15', 0, NULL, NULL, NULL, NULL, 100, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p_m_barang`
--
ALTER TABLE `p_m_barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p_m_barang`
--
ALTER TABLE `p_m_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
