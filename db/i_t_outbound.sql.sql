-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2016 at 03:13 PM
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
-- Structure for view `v_i_outbound_grid`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_i_outbound_grid`  AS  select `a`.`id_outbound` AS `id_outbound`,`a`.`date_out` AS `date_out`,`a`.`no_trx_sales` AS `no_trx_sales`,`b`.`brg_nama` AS `brg_nama`,`a`.`jml_in` AS `jml_in`,`a`.`kd_jns_usaha` AS `kd_jns_usaha`,`a`.`deleted_by` AS `deleted_by`,`a`.`deleted_at` AS `deleted_at`,`c`.`qty` AS `qty`,`a`.`out_type` AS `out_type` from ((`i_t_outbound` `a` left join `p_m_barang` `b` on((`a`.`barang_kd` = `b`.`brg_kd`))) left join `sa_t_posdetail` `c` on(((`c`.`sale_no` = `a`.`no_trx_sales`) and (`c`.`brg_kd` = `a`.`barang_kd`)))) order by `a`.`date_out` ;

--
-- VIEW  `v_i_outbound_grid`
-- Data: None
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
