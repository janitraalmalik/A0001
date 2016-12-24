-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2016 at 03:11 AM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_a001`
--

-- --------------------------------------------------------

--
-- Structure for view `v_i_inbound_grid`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_i_inbound_grid` AS select `a`.`id_inbound` AS `id_inbound`,`a`.`date_in` AS `date_in`,`a`.`po_no` AS `po_no`,`b`.`brg_nama` AS `brg_nama`,`a`.`jml_in` AS `jml_in`,`a`.`refund` AS `refund`,`a`.`sisa` AS `sisa`,`a`.`kd_jns_usaha` AS `kd_jns_usaha`,`a`.`deleted_by` AS `deleted_by`,`a`.`deleted_at` AS `deleted_at`,`c`.`jml_barang` AS `jml_brg_po` from ((`i_t_inbound` `a` left join `p_m_barang` `b` on((`a`.`barang_kd` = `b`.`brg_kd`))) left join `p_t_podetail` `c` on(((`c`.`po_no` = `a`.`po_no`) and (`c`.`kd_barang` = `a`.`barang_kd`)))) order by `a`.`date_in`;

--
-- VIEW  `v_i_inbound_grid`
-- Data: None
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
