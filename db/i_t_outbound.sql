-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2016 at 11:03 PM
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
  `cust_id` int(11) DEFAULT NULL,
  `date_out` datetime DEFAULT NULL,
  `barang_kd` varchar(255) DEFAULT NULL,
  `out_type` int(10) DEFAULT NULL,
  `flag_id` int(10) DEFAULT NULL,
  `jml_in` int(10) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `i_t_outbound`
--
ALTER TABLE `i_t_outbound`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
