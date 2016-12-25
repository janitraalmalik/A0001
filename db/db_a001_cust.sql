-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2016 at 05:43 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a001`
--

-- --------------------------------------------------------

--
-- Table structure for table `hr_m_agama`
--

CREATE TABLE IF NOT EXISTS `hr_m_agama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_agama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hr_m_agama`
--

INSERT INTO `hr_m_agama` (`id`, `nm_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Hindu'),
(4, 'Budha');

-- --------------------------------------------------------

--
-- Table structure for table `hr_m_bagian`
--

CREATE TABLE IF NOT EXISTS `hr_m_bagian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_bagian` varchar(20) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hr_m_bagian`
--

INSERT INTO `hr_m_bagian` (`id`, `nm_bagian`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Sales', 'JU001', '2016-11-27 21:06:51', NULL, '2016-11-27 21:08:40', NULL, NULL, NULL),
(2, 'HRD', 'JU001', '2016-11-27 21:09:16', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_m_gaji`
--

CREATE TABLE IF NOT EXISTS `hr_m_gaji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) DEFAULT NULL,
  `gaji_kary` decimal(18,2) DEFAULT NULL,
  `naik_gaji_kary` decimal(18,2) DEFAULT NULL,
  `tunjangan_kary` decimal(18,2) DEFAULT NULL,
  `pph_kary` decimal(18,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hr_m_gaji`
--

INSERT INTO `hr_m_gaji` (`id`, `id_kary`, `gaji_kary`, `naik_gaji_kary`, `tunjangan_kary`, `pph_kary`, `status`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 5.00, 10.00, 60.00, 100.00, 0, 'JU001', '2016-12-06 11:32:06', 1, '2016-12-06 23:32:06', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_m_karyawan`
--

CREATE TABLE IF NOT EXISTS `hr_m_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik_kary` varchar(10) DEFAULT NULL,
  `nama_kary` varchar(50) DEFAULT NULL,
  `tgl_lahir_kary` datetime DEFAULT NULL,
  `agama_kary` int(11) DEFAULT NULL,
  `sex_kary` int(11) DEFAULT NULL,
  `status_kary` int(11) DEFAULT NULL,
  `bagian_kary` int(11) DEFAULT NULL,
  `status_kerja_kary` int(11) DEFAULT NULL,
  `tgl_masuk_kary` datetime DEFAULT NULL,
  `tgl_akhir_kary` datetime DEFAULT NULL,
  `telp_kary` varchar(12) DEFAULT NULL,
  `ktp_kary` varchar(30) DEFAULT NULL,
  `alamat_kary` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hr_m_karyawan`
--

INSERT INTO `hr_m_karyawan` (`id`, `nik_kary`, `nama_kary`, `tgl_lahir_kary`, `agama_kary`, `sex_kary`, `status_kary`, `bagian_kary`, `status_kerja_kary`, `tgl_masuk_kary`, `tgl_akhir_kary`, `telp_kary`, `ktp_kary`, `alamat_kary`, `status`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, '002', 'Gun', '2016-12-13 00:00:00', 1, 1, NULL, 1, 1, '2016-12-28 00:00:00', '2016-12-30 00:00:00', '324234234', '345345435345', 'dfdfsf', NULL, 'JU001', '2016-12-06 23:00:04', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_m_sex`
--

CREATE TABLE IF NOT EXISTS `hr_m_sex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_sex` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hr_m_sex`
--

INSERT INTO `hr_m_sex` (`id`, `nm_sex`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `hr_m_statuskary`
--

CREATE TABLE IF NOT EXISTS `hr_m_statuskary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_statuskary` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hr_m_statuskary`
--

INSERT INTO `hr_m_statuskary` (`id`, `nm_statuskary`) VALUES
(1, 'Kontrak'),
(2, 'Tetap'),
(3, 'Freelance');

-- --------------------------------------------------------

--
-- Table structure for table `hr_t_absen`
--

CREATE TABLE IF NOT EXISTS `hr_t_absen` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `nik_kary` varchar(10) DEFAULT NULL,
  `nama_kary` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jam_masuk` datetime DEFAULT NULL,
  `jam_keluar` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hr_t_absen`
--


-- --------------------------------------------------------

--
-- Table structure for table `hr_t_bayar`
--

CREATE TABLE IF NOT EXISTS `hr_t_bayar` (
  `id_bayar` int(11) NOT NULL AUTO_INCREMENT,
  `no_bayar` varchar(22) DEFAULT NULL,
  `nilai_bayar` decimal(18,2) DEFAULT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `id_pinjam` int(11) DEFAULT NULL,
  `keterangan_bayar` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hr_t_bayar`
--


-- --------------------------------------------------------

--
-- Table structure for table `hr_t_gaji`
--

CREATE TABLE IF NOT EXISTS `hr_t_gaji` (
  `id_gaji` int(11) NOT NULL,
  `nik_kary` varchar(10) DEFAULT NULL,
  `tgl_gaji` datetime DEFAULT NULL,
  `nilai_gaji` decimal(18,2) DEFAULT NULL,
  `nilai_tunjangan` decimal(18,2) DEFAULT NULL,
  `nilai_lembur` decimal(18,2) DEFAULT NULL,
  `nilai_pph` decimal(18,2) DEFAULT NULL,
  `keterangan_gaji` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_t_gaji`
--


-- --------------------------------------------------------

--
-- Table structure for table `hr_t_pettyclaim`
--

CREATE TABLE IF NOT EXISTS `hr_t_pettyclaim` (
  `pettycash_id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(15) DEFAULT NULL,
  `claim_no` char(21) NOT NULL,
  `acc_no` char(20) NOT NULL,
  `acc_curr` char(3) DEFAULT NULL,
  `acc_name` char(40) DEFAULT NULL,
  `claim_date` date DEFAULT NULL,
  `saldo` decimal(14,2) DEFAULT NULL,
  `rate` decimal(8,4) DEFAULT NULL,
  `debet` decimal(14,2) DEFAULT NULL,
  `credit` decimal(14,2) DEFAULT NULL,
  `petty_desc` text,
  `status` decimal(1,0) DEFAULT NULL,
  `user_` char(30) DEFAULT NULL,
  `datetime` date DEFAULT NULL,
  `status_reimburse` decimal(1,0) DEFAULT NULL,
  `sub_claim_no` varchar(100) DEFAULT NULL,
  `period_s` date DEFAULT NULL,
  `period_e` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `delete_at` date DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`pettycash_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hr_t_pettyclaim`
--


-- --------------------------------------------------------

--
-- Table structure for table `hr_t_pinjam`
--

CREATE TABLE IF NOT EXISTS `hr_t_pinjam` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `nik_kary` varchar(10) DEFAULT NULL,
  `tgl_pinjam` datetime DEFAULT NULL,
  `nilai_pinjam` decimal(18,2) DEFAULT NULL,
  `frequensi` int(11) DEFAULT NULL,
  `keterangan_pinjam` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hr_t_pinjam`
--


-- --------------------------------------------------------

--
-- Table structure for table `i_t_inbound`
--

CREATE TABLE IF NOT EXISTS `i_t_inbound` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_inbound` varchar(20) DEFAULT NULL,
  `no_ref_vendor` varchar(200) DEFAULT NULL,
  `po_no` varchar(255) DEFAULT NULL,
  `date_in` datetime DEFAULT NULL,
  `barang_kd` varchar(255) DEFAULT NULL,
  `jml_in` int(10) DEFAULT NULL,
  `refund` int(10) DEFAULT NULL,
  `sisa` int(10) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `i_t_inbound`
--

INSERT INTO `i_t_inbound` (`id`, `id_inbound`, `no_ref_vendor`, `po_no`, `date_in`, `barang_kd`, `jml_in`, `refund`, `sisa`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(17, '00001', 'asdda#444', '00001', '2016-12-05 00:00:00', '0001', 25, NULL, NULL, 'JU001', '2016-12-08 03:14:25', 1, NULL, NULL, NULL, NULL),
(18, '00002', 'asdda#444', '00001', '2016-12-05 00:00:00', '0002', 100, NULL, NULL, 'JU001', '2016-12-08 03:14:36', 1, NULL, NULL, NULL, NULL),
(19, '00003', 'asdda#444', '00001', '2016-12-05 00:00:00', 'OK', 500, NULL, NULL, 'JU001', '2016-12-08 03:14:37', 1, NULL, NULL, NULL, NULL),
(20, '00004', '99siiisow', '00012', '2016-12-08 00:00:00', '0002', 12, NULL, NULL, 'JU001', '2016-12-08 11:52:00', 1, NULL, NULL, NULL, NULL),
(21, '00005', '99siiisow', '00012', '2016-12-08 00:00:00', '0001', 22, NULL, NULL, 'JU001', '2016-12-08 11:52:05', 1, NULL, NULL, NULL, NULL),
(22, '00006', 'sdfghjk', '00003', '2016-12-08 00:00:00', '0001', 100, NULL, NULL, 'JU001', '2016-12-08 11:53:10', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jns_usaha`
--

CREATE TABLE IF NOT EXISTS `jns_usaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jns_usaha_kd` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jns_usaha`
--

INSERT INTO `jns_usaha` (`id`, `jns_usaha_kd`, `nama`, `ket`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'JU001', 'ATK', 'Bidang Usaha ATK', '2016-11-19 23:19:17', NULL, NULL, NULL, NULL, NULL),
(2, 'JU002', 'Air Minum', 'Bidang Usaha Air Minum', '2016-11-19 23:19:39', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `ip` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `affected_table` varchar(50) DEFAULT NULL,
  `affected_id` int(11) DEFAULT NULL,
  `query` longtext,
  `action` longtext,
  `data` longtext,
  `wording_log` longtext,
  `created_at` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`ip`, `user_id`, `user_name`, `affected_table`, `affected_id`, `query`, `action`, `data`, `wording_log`, `created_at`) VALUES
('::1', NULL, 'guest', 'users', 2, 'UPDATE `users` SET `username` = ''janitramalik'', `name_users` = ''Janitra Al Malik'', `password` = ''ea59fa85c6f4f65851700ecb7f7a9616'', `id_users_group_fk` = ''1'', `blockage` = ''N'', `updated_at` = ''2016-11-20 22:27:03''\nWHERE `id` = ''2''', 'update', '{"username":"janitramalik","name_users":"Janitra Al Malik","password":"ea59fa85c6f4f65851700ecb7f7a9616","id_users_group_fk":"1","blockage":"N"}', 'guest update users', '2016-11-20 22:27:03'),
('::1', NULL, 'guest', 'users', 2, 'UPDATE `users` SET `username` = ''janitramalik'', `name_users` = ''Janitra Al Malik Update'', `password` = ''ea59fa85c6f4f65851700ecb7f7a9616'', `id_users_group_fk` = ''1'', `blockage` = ''N'', `updated_at` = ''2016-11-20 22:27:20''\nWHERE `id` = ''2''', 'update', '{"username":"janitramalik","name_users":"Janitra Al Malik Update","password":"ea59fa85c6f4f65851700ecb7f7a9616","id_users_group_fk":"1","blockage":"N"}', 'guest update users', '2016-11-20 22:27:20'),
('::1', NULL, 'guest', 'users', 2, 'UPDATE `users` SET `username` = ''janitramalik'', `name_users` = ''Janitra Al Malik Update'', `password` = ''ea59fa85c6f4f65851700ecb7f7a9616'', `id_users_group_fk` = ''1'', `blockage` = ''N'', `updated_at` = ''2016-11-20 22:29:54''\nWHERE `id` = ''2''', 'update', '{"username":"janitramalik","name_users":"Janitra Al Malik Update","password":"ea59fa85c6f4f65851700ecb7f7a9616","id_users_group_fk":"1","blockage":"N"}', 'guest update users', '2016-11-20 22:29:54'),
('::1', NULL, 'guest', 'users', 2, 'UPDATE `users` SET `username` = ''janitramalik'', `name_users` = ''Janitra Al Malik'', `password` = ''ea59fa85c6f4f65851700ecb7f7a9616'', `id_users_group_fk` = ''1'', `blockage` = ''N'', `updated_at` = ''2016-11-20 22:30:05''\nWHERE `id` = ''2''', 'update', '{"username":"janitramalik","name_users":"Janitra Al Malik","password":"ea59fa85c6f4f65851700ecb7f7a9616","id_users_group_fk":"1","blockage":"N"}', 'guest update users', '2016-11-20 22:30:05'),
('127.0.0.1', NULL, 'guest', 'p_m_satuan', 1, 'INSERT INTO `p_m_satuan` (`satuan_kd`, `satuan_name`, `satuan_desc`, `kd_jns_usaha`, `created_at`) VALUES (''001'', ''Pensil'', ''OK'', ''JU001'', ''2016-11-26 18:46:17'')', 'update', '{"satuan_kd":"001","satuan_name":"Pensil","satuan_desc":"OK","kd_jns_usaha":"JU001"}', 'guest update p_m_satuan', '2016-11-26 18:46:17'),
('127.0.0.1', NULL, 'guest', 'p_m_satuan', 1, 'UPDATE `p_m_satuan` SET `satuan_kd` = ''001'', `satuan_name` = ''Pcs'', `satuan_desc` = ''OK'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-11-26 18:46:59''\nWHERE `id` = ''1''', 'update', '{"satuan_kd":"001","satuan_name":"Pcs","satuan_desc":"OK","kd_jns_usaha":"JU001"}', 'guest update p_m_satuan', '2016-11-26 18:46:59'),
('127.0.0.1', NULL, 'guest', 'p_m_satuan', 2, 'INSERT INTO `p_m_satuan` (`satuan_kd`, `satuan_name`, `satuan_desc`, `kd_jns_usaha`, `created_at`) VALUES (''002'', ''Unit'', ''Ok'', ''JU001'', ''2016-11-27 11:57:59'')', 'update', '{"satuan_kd":"002","satuan_name":"Unit","satuan_desc":"Ok","kd_jns_usaha":"JU001"}', 'guest update p_m_satuan', '2016-11-27 11:57:59'),
('127.0.0.1', NULL, 'guest', 'p_m_satuan', 3, 'INSERT INTO `p_m_satuan` (`satuan_kd`, `satuan_name`, `satuan_desc`, `kd_jns_usaha`, `created_at`) VALUES (''003'', ''m2'', ''ok'', ''JU001'', ''2016-11-27 12:00:14'')', 'update', '{"satuan_kd":"003","satuan_name":"m2","satuan_desc":"ok","kd_jns_usaha":"JU001"}', 'guest update p_m_satuan', '2016-11-27 12:00:14'),
('127.0.0.1', NULL, 'guest', 'p_m_satuan', 4, 'INSERT INTO `p_m_satuan` (`satuan_kd`, `satuan_name`, `satuan_desc`, `kd_jns_usaha`, `created_at`) VALUES (''004'', ''biji'', ''oks'', ''JU001'', ''2016-11-27 12:02:40'')', 'update', '{"satuan_kd":"004","satuan_name":"biji","satuan_desc":"oks","kd_jns_usaha":"JU001"}', 'guest update p_m_satuan', '2016-11-27 12:02:40'),
('::1', NULL, 'guest', 'p_m_vendor_supplier', 1, 'INSERT INTO `p_m_vendor_supplier` (`vend_kd`, `vend_name`, `vend_alamat`, `vend_tlp`, `vend_pic`, `kd_jns_usaha`, `created_at`) VALUES (''00001'', ''Test Vendor'', ''Jakarta'', ''085691022895'', ''Janitra Al Malik'', ''JU001'', ''2016-11-27 20:57:48'')', 'update', '{"vend_kd":"00001","vend_name":"Test Vendor","vend_alamat":"Jakarta","vend_tlp":"085691022895","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'guest update p_m_vendor_supplier', '2016-11-27 20:57:48'),
('::1', NULL, 'guest', 'p_m_vendor_supplier', 1, 'UPDATE `p_m_vendor_supplier` SET `vend_name` = ''Test Vendor Update'', `vend_alamat` = ''Jakarta'', `vend_tlp` = ''Test Vendor'', `vend_pic` = ''Janitra Al Malik'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-11-27 20:58:01''\nWHERE `id` = ''1''', 'update', '{"vend_name":"Test Vendor Update","vend_alamat":"Jakarta","vend_tlp":"Test Vendor","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'guest update p_m_vendor_supplier', '2016-11-27 20:58:01'),
('::1', NULL, 'admin', 'p_m_barang', 3, 'INSERT INTO `p_m_barang` (`brg_kd`, `brg_nama`, `brg_desc`, `cat_barang_id`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''0002'', ''Test Gain'', ''Test'', ''0'', ''JU001'', ''2016-11-28 23:14:15'', 0)', 'update', '{"brg_kd":"0002","brg_nama":"Test Gain","brg_desc":"Test","cat_barang_id":"0","kd_jns_usaha":"JU001"}', 'admin update p_m_barang', '2016-11-28 23:14:15'),
('::1', NULL, 'admin', 'p_m_satuan', 4, 'INSERT INTO `p_m_satuan` (`satuan_kd`, `satuan_name`, `satuan_desc`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''0001'', ''test'', ''test\\r\\n'', ''JU001'', ''2016-11-28 23:15:26'', 0)', 'update', '{"satuan_kd":"0001","satuan_name":"test","satuan_desc":"test\\r\\n","kd_jns_usaha":"JU001"}', 'admin update p_m_satuan', '2016-11-28 23:15:26'),
('::1', NULL, 'admin', 'p_m_satuan', 5, 'INSERT INTO `p_m_satuan` (`satuan_kd`, `satuan_name`, `satuan_desc`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''asdasd'', ''asdasd'', ''asdasda'', ''JU001'', ''2016-11-28 23:23:05'', ''1'')', 'update', '{"satuan_kd":"asdasd","satuan_name":"asdasd","satuan_desc":"asdasda","kd_jns_usaha":"JU001"}', 'admin update p_m_satuan', '2016-11-28 23:23:05'),
('::1', NULL, 'admin', 'p_m_satuan', 6, 'INSERT INTO `p_m_satuan` (`satuan_kd`, `satuan_name`, `satuan_desc`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''asdasdasd Test Sekian Kalinya'', ''asdasdas'', ''asdasdasd '', ''JU001'', ''2016-11-28 23:23:34'', ''1'')', 'update', '{"satuan_kd":"asdasdasd Test Sekian Kalinya","satuan_name":"asdasdas","satuan_desc":"asdasdasd ","kd_jns_usaha":"JU001"}', 'admin update p_m_satuan', '2016-11-28 23:23:34'),
('::1', NULL, 'admin', 'p_m_satuan', 7, 'INSERT INTO `p_m_satuan` (`satuan_kd`, `satuan_name`, `satuan_desc`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''Test sekian Kalinya'', ''okokokok'', '''', ''JU001'', ''2016-11-28 23:23:54'', ''1'')', 'update', '{"satuan_kd":"Test sekian Kalinya","satuan_name":"okokokok","satuan_desc":"","kd_jns_usaha":"JU001"}', 'admin update p_m_satuan', '2016-11-28 23:23:54'),
('::1', NULL, 'admin', 'p_m_satuan', 8, 'INSERT INTO `p_m_satuan` (`satuan_kd`, `satuan_name`, `satuan_desc`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''OKKKKK'', ''jjjajajaj'', ''hahahahah'', ''JU001'', ''2016-11-28 23:24:35'', ''1'')', 'update', '{"satuan_kd":"OKKKKK","satuan_name":"jjjajajaj","satuan_desc":"hahahahah","kd_jns_usaha":"JU001"}', 'admin update p_m_satuan', '2016-11-28 23:24:35'),
('::1', NULL, 'admin', 'p_m_satuan', 9, 'INSERT INTO `p_m_satuan` (`satuan_kd`, `satuan_name`, `satuan_desc`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''Test Malik'', ''Test Malik'', ''Test Malik'', ''JU001'', ''2016-11-28 23:29:10'', ''1'')', 'update', '{"satuan_kd":"Test Malik","satuan_name":"Test Malik","satuan_desc":"Test Malik","kd_jns_usaha":"JU001"}', 'admin update p_m_satuan', '2016-11-28 23:29:10'),
('::1', NULL, 'admin', 'p_t_po', 1, 'INSERT INTO `p_t_po` (`kd_jns_usaha`, `created_at`, `created_by`) VALUES (''JU001'', ''2016-12-01 01:00:17'', ''1'')', 'update', '{"vend_kd":"00001","vend_name":"asdasd","vend_alamat":"asdasd","vend_tlp":"asd","vend_pic":"asd","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-01 01:00:17'),
('::1', NULL, 'admin', 'p_t_po', 2, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `po_desc`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''2016-12-05'', ''2016-12-19'', ''Test Vendor'', ''00001'', 1, '''', ''13000000'', ''900000'', ''13900000'', ''JU001'', ''2016-12-03 14:36:15'', ''1'')', 'update', '{"po_no":"00002","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","po_desc":"Test Vendor","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"13000000","po_ppn":"900000","po_total":"13900000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-03 14:36:15'),
('::1', 1, 'admin', 'p_t_po', 3, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `po_desc`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''2016-12-05'', ''2016-12-19'', ''Test Vendor'', ''00001'', 1, '''', ''13000000'', ''900000'', ''13900000'', ''JU001'', ''2016-12-03 14:37:39'', ''1'')', 'update', '{"po_no":"00002","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","po_desc":"Test Vendor","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"13000000","po_ppn":"900000","po_total":"13900000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-03 14:37:40'),
('::1', 1, 'admin', 'p_t_po', 4, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `po_desc`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''2016-12-05'', ''2016-12-19'', ''Test Vendor'', ''00001'', 1, '''', ''13000000'', ''900000'', ''13900000'', ''JU001'', ''2016-12-03 14:37:55'', ''1'')', 'update', '{"po_no":"00002","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","po_desc":"Test Vendor","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"13000000","po_ppn":"900000","po_total":"13900000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-03 14:37:55'),
('::1', 1, 'admin', 'p_t_po', 5, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `po_desc`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00004'', ''2016-12-05'', ''2016-12-19'', ''Test Vendor'', ''00001'', 1, '''', ''13000000'', ''900000'', ''13900000'', ''JU001'', ''2016-12-03 14:51:16'', ''1'')', 'update', '{"po_no":"00004","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","po_desc":"Test Vendor","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"13000000","po_ppn":"900000","po_total":"13900000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-03 14:51:16'),
('::1', 1, 'admin', 'p_t_po', 6, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `po_desc`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00005'', ''2016-12-05'', ''2016-12-19'', ''Test Vendor'', ''00001'', 1, '''', ''4000000'', ''0'', ''4000000'', ''JU001'', ''2016-12-03 15:41:43'', ''1'')', 'update', '{"po_no":"00005","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","po_desc":"Test Vendor","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"4000000","po_ppn":"0","po_total":"4000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-03 15:41:43'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00005'', ''0001'', ''1'', ''20'', ''200000'', ''0'', ''JU001'', ''2016-12-03 15:41:43'', ''1'')', 'update', '{"po_no":"00005","kd_barang":"0001","kd_satuan":"1","jml_barang":"20","harga_satuan":"200000","ppn":"0","index":0,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-03 15:41:43'),
('::1', 1, 'admin', 'p_t_po', 1, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `po_desc`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''2016-12-05'', ''2016-12-19'', ''Test Vendor'', ''00001'', 1, '''', ''4000000'', ''0'', ''4000000'', ''JU001'', ''2016-12-03 15:42:28'', ''1'')', 'update', '{"po_no":"00001","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","po_desc":"Test Vendor","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"4000000","po_ppn":"0","po_total":"4000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-03 15:42:28'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', ''1'', ''20'', ''200000'', ''0'', ''JU001'', ''2016-12-03 15:42:28'', ''1'')', 'update', '{"po_no":"00001","kd_barang":"0001","kd_satuan":"1","jml_barang":"20","harga_satuan":"200000","ppn":"0","index":0,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-03 15:42:28'),
('::1', 1, 'admin', 'p_t_po', 2, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `po_desc`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''2016-12-05'', ''2016-12-19'', ''Test Vendor'', ''00001'', 1, '''', ''4000000'', ''0'', ''4000000'', ''JU001'', ''2016-12-03 15:43:17'', ''1'')', 'update', '{"po_no":"00002","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","po_desc":"Test Vendor","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"4000000","po_ppn":"0","po_total":"4000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-03 15:43:17'),
('::1', 1, 'admin', 'p_t_podetail', 2, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''0001'', ''1'', ''20'', ''200000'', ''0'', ''JU001'', ''2016-12-03 15:43:17'', ''1'')', 'update', '{"po_no":"00002","kd_barang":"0001","kd_satuan":"1","jml_barang":"20","harga_satuan":"200000","ppn":"0","index":0,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-03 15:43:17'),
('::1', 1, 'admin', 'p_t_po', 3, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', ''6000000'', ''600000'', ''6600000'', ''JU001'', ''2016-12-03 23:15:24'', ''1'')', 'update', '{"po_no":"00003","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"6000000","po_ppn":"600000","po_total":"6600000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-03 23:15:24'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''0001'', ''1'', ''200'', ''30000'', ''1'', ''JU001'', ''2016-12-03 23:15:24'', ''1'')', 'update', '{"po_no":"00003","kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"30000","ppn":"1","index":0,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-03 23:15:24'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''6000000.00'', `po_ppn` = '''', `po_total` = '''', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:07:50'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"6000000.00","po_ppn":"","po_total":"","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 00:07:50'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''200'', `harga_satuan` = ''3000000'', `ppn` = ''1'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:07:50'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"3000000","ppn":"1","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:07:50'),
('::1', 1, 'admin', 'p_t_podetail', 4, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''200'', `harga_satuan` = ''3000000'', `ppn` = ''1'', `index` = 2, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:07:50'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"3000000","ppn":"1","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:07:50'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''120000000000'', `po_ppn` = ''12000000000'', `po_total` = ''132000000000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:10:24'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"120000000000","po_ppn":"12000000000","po_total":"132000000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 00:10:24'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''200'', `harga_satuan` = ''300000000'', `ppn` = ''1'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:10:24'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"300000000","ppn":"1","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:10:24'),
('::1', 1, 'admin', 'p_t_podetail', 4, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''200'', `harga_satuan` = ''300000000'', `ppn` = ''1'', `index` = 2, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:10:24'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"300000000","ppn":"1","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:10:24'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''70000000'', `po_ppn` = ''7000000'', `po_total` = ''77000000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:11:00'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"70000000","po_ppn":"7000000","po_total":"77000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 00:11:00'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''200'', `harga_satuan` = ''200000'', `ppn` = ''1'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:11:00'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"200000","ppn":"1","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:11:00'),
('::1', 1, 'admin', 'p_t_podetail', 4, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''200'', `harga_satuan` = ''150000'', `ppn` = ''1'', `index` = 2, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:11:00'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"150000","ppn":"1","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:11:00'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''55000000'', `po_ppn` = ''5500000'', `po_total` = ''60500000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:12:37'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"55000000","po_ppn":"5500000","po_total":"60500000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 00:12:37'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''200'', `harga_satuan` = ''200000'', `ppn` = ''1'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:12:37'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"200000","ppn":"1","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:12:38'),
('::1', 1, 'admin', 'p_t_podetail', 4, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0002'', `kd_satuan` = ''2'', `jml_barang` = ''100'', `harga_satuan` = ''150000'', `ppn` = ''1'', `index` = 2, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:12:38'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"kd_barang":"0002","kd_satuan":"2","jml_barang":"100","harga_satuan":"150000","ppn":"1","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:12:38'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''55000000'', `po_ppn` = ''4000000'', `po_total` = ''59000000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:12:53'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"55000000","po_ppn":"4000000","po_total":"59000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 00:12:54'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''200'', `harga_satuan` = ''200000'', `ppn` = ''1'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:12:54'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"200000","ppn":"1","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:12:54'),
('::1', 1, 'admin', 'p_t_podetail', 4, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0002'', `kd_satuan` = ''2'', `jml_barang` = ''100'', `harga_satuan` = ''150000'', `ppn` = ''0'', `index` = 2, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:12:54'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"kd_barang":"0002","kd_satuan":"2","jml_barang":"100","harga_satuan":"150000","ppn":"0","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:12:54'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''55000000'', `po_ppn` = ''4000000'', `po_total` = ''59000000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:14:51'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"55000000","po_ppn":"4000000","po_total":"59000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 00:14:51'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''200'', `harga_satuan` = ''200000'', `ppn` = ''1'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:14:51'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"200000","ppn":"1","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:14:51'),
('::1', 1, 'admin', 'p_t_podetail', 4, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0002'', `kd_satuan` = ''2'', `jml_barang` = ''100'', `harga_satuan` = ''150000'', `ppn` = ''0'', `index` = 2, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:14:51'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"kd_barang":"0002","kd_satuan":"2","jml_barang":"100","harga_satuan":"150000","ppn":"0","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:14:51'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''55000000'', `po_ppn` = ''0'', `po_total` = ''55000000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:17:37'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"55000000","po_ppn":"0","po_total":"55000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 00:17:37'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''200'', `harga_satuan` = ''200000'', `ppn` = ''0'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:17:37'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"200000","ppn":"0","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:17:37'),
('::1', 1, 'admin', 'p_t_podetail', 4, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0002'', `kd_satuan` = ''2'', `jml_barang` = ''100'', `harga_satuan` = ''150000'', `ppn` = ''0'', `index` = 2, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:17:37'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"kd_barang":"0002","kd_satuan":"2","jml_barang":"100","harga_satuan":"150000","ppn":"0","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:17:37'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''55000000'', `po_ppn` = ''1500000'', `po_total` = ''56500000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:17:47'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"55000000","po_ppn":"1500000","po_total":"56500000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 00:17:47'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''200'', `harga_satuan` = ''200000'', `ppn` = ''0'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:17:47'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"200000","ppn":"0","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:17:47'),
('::1', 1, 'admin', 'p_t_podetail', 4, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0002'', `kd_satuan` = ''2'', `jml_barang` = ''100'', `harga_satuan` = ''150000'', `ppn` = ''1'', `index` = 2, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:17:47'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"kd_barang":"0002","kd_satuan":"2","jml_barang":"100","harga_satuan":"150000","ppn":"1","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:17:47'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''55000000'', `po_ppn` = ''5500000'', `po_total` = ''60500000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:17:58'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"55000000","po_ppn":"5500000","po_total":"60500000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 00:17:58'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''200'', `harga_satuan` = ''200000'', `ppn` = ''1'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:17:58'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"200000","ppn":"1","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:17:58'),
('::1', 1, 'admin', 'p_t_podetail', 4, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0002'', `kd_satuan` = ''2'', `jml_barang` = ''100'', `harga_satuan` = ''150000'', `ppn` = ''1'', `index` = 2, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:17:58'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"kd_barang":"0002","kd_satuan":"2","jml_barang":"100","harga_satuan":"150000","ppn":"1","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:17:58'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''4000000'', `po_ppn` = ''400000'', `po_total` = ''4400000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:18:15'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"4000000","po_ppn":"400000","po_total":"4400000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 00:18:15'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''20'', `harga_satuan` = ''200000'', `ppn` = ''1'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 00:18:15'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"20","harga_satuan":"200000","ppn":"1","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 00:18:15'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `deleted_at` = ''2016-12-04 00:31:04'', `deleted_by` = ''1''\nWHERE `id` = ''1''', 'deactive', '{"id":"1","po_no":"00001","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","po_tgl_pengeriman":null,"po_desc":"Test Vendor","kd_vendor_supplier":"00001","status_po_id":"1","kd_syarat_pembayaran":"","po_subtotal":"4000000.00","po_ppn":"400000.00","po_total":"4400000.00","kd_jns_usaha":"JU001","created_at":"2016-12-03 15:42:28","created_by":"1","updated_at":"2016-12-04 00:18:15","updated_by":"1","deleted_at":"2016-12-04 00:31:04","deleted_by":"1"}', 'admin deactive p_t_po', '2016-12-04 00:31:04'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'UPDATE `p_t_podetail` SET `deleted_at` = ''2016-12-04 00:31:04'', `deleted_by` = ''1''\nWHERE `po_no` = ''00001''', 'deactive', '{"id":"1","po_no":"00001","kd_barang":"0001","kd_satuan":"1","jml_barang":"20","harga_satuan":"200000.00","ppn":"1","index":"1","kd_jns_usaha":"JU001","created_at":"2016-12-03 15:42:28","created_by":"1","updated_at":"2016-12-04 00:18:15","updated_by":"1","deleted_at":"2016-12-04 00:31:04","deleted_by":"1"}', 'admin deactive p_t_podetail', '2016-12-04 00:31:04'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `deleted_at` = ''2016-12-04 00:31:34'', `deleted_by` = ''1''\nWHERE `id` = ''3''', 'deactive', '{"id":"3","po_no":"00003","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","po_tgl_pengeriman":null,"po_desc":null,"kd_vendor_supplier":"00001","status_po_id":"1","kd_syarat_pembayaran":"","po_subtotal":"55000000.00","po_ppn":"5500000.00","po_total":"60500000.00","kd_jns_usaha":"JU001","created_at":"2016-12-03 23:15:24","created_by":"1","updated_at":"2016-12-04 00:17:58","updated_by":"1","deleted_at":"2016-12-04 00:31:34","deleted_by":"1"}', 'admin deactive p_t_po', '2016-12-04 00:31:34'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'UPDATE `p_t_podetail` SET `deleted_at` = ''2016-12-04 00:31:34'', `deleted_by` = ''1''\nWHERE `po_no` = ''00003''', 'deactive', '{"id":"3","po_no":"00003","kd_barang":"0001","kd_satuan":"1","jml_barang":"200","harga_satuan":"200000.00","ppn":"1","index":"1","kd_jns_usaha":"JU001","created_at":"2016-12-03 23:15:24","created_by":"1","updated_at":"2016-12-04 00:17:58","updated_by":"1","deleted_at":"2016-12-04 00:31:34","deleted_by":"1"}', 'admin deactive p_t_podetail', '2016-12-04 00:31:34'),
('::1', 1, 'admin', 'p_t_po', 4, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', ''50000000'', ''5000000'', ''55000000'', ''JU001'', ''2016-12-04 01:21:52'', ''1'')', 'update', '{"po_no":"00002","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"50000000","po_ppn":"5000000","po_total":"55000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 01:21:52'),
('::1', 1, 'admin', 'p_t_podetail', 5, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''0002'', ''2'', ''100'', ''500000'', ''1'', 1, ''JU001'', ''2016-12-04 01:21:53'', ''1'')', 'update', '{"po_no":"00002","kd_barang":"0002","kd_satuan":"2","jml_barang":"100","harga_satuan":"500000","ppn":"1","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 01:21:53'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `po_tgl` = NULL, `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = NULL, `po_ppn` = NULL, `po_total` = ''55000000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 15:04:32'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"po_tgl":null,"po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":null,"po_ppn":null,"po_total":"55000000","vend_pic":null,"kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 15:04:32'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `po_tgl` = NULL, `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = NULL, `po_ppn` = NULL, `po_total` = ''55000000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-04 15:04:58'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"po_tgl":null,"po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":null,"po_ppn":null,"po_total":"55000000","vend_pic":null,"kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 15:04:58'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 1, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''000001'', ''00004'', ''2016-12-19'', ''00001'', ''5000000'', ''JU001'', ''2016-12-04 20:10:33'', ''1'')', 'update', '{"pembayaran_no":"000001","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"5000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 20:10:34'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `po_bayar` = 5000000, `updated_at` = ''2016-12-04 20:10:34'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"po_bayar":5000000}', 'admin update p_t_po', '2016-12-04 20:10:34'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 2, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''000001'', ''00002'', ''2016-12-19'', ''00001'', ''2400000'', ''JU001'', ''2016-12-04 20:10:34'', ''1'')', 'update', '{"pembayaran_no":"000001","po_no":"00002","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"2400000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 20:10:34'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `po_bayar` = 7400000, `updated_at` = ''2016-12-04 20:10:34'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"po_bayar":7400000}', 'admin update p_t_po', '2016-12-04 20:10:34'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 3, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''2'', ''00004'', ''2016-12-19'', ''00001'', ''47600000'', ''JU001'', ''2016-12-04 20:12:57'', ''1'')', 'update', '{"pembayaran_no":"2","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"47600000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 20:12:57'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `po_bayar` = 55000000, `updated_at` = ''2016-12-04 20:12:57'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"po_bayar":55000000}', 'admin update p_t_po', '2016-12-04 20:12:57'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 4, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''2'', ''00002'', ''2016-12-19'', ''00001'', ''-3400000'', ''JU001'', ''2016-12-04 20:12:57'', ''1'')', 'update', '{"pembayaran_no":"2","po_no":"00002","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"-3400000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 20:12:57'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `po_bayar` = 51600000, `updated_at` = ''2016-12-04 20:12:58'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"po_bayar":51600000}', 'admin update p_t_po', '2016-12-04 20:12:58'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 1, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''000001'', ''00004'', ''2016-12-19'', ''00001'', ''55000000'', ''JU001'', ''2016-12-04 20:23:49'', ''1'')', 'update', '{"pembayaran_no":"000001","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"55000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 20:23:49'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 2, `po_bayar` = 55000000, `updated_at` = ''2016-12-04 20:23:49'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":2,"po_bayar":55000000}', 'admin update p_t_po', '2016-12-04 20:23:49'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 2, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''000001'', ''00002'', ''2016-12-19'', ''00001'', ''3000000'', ''JU001'', ''2016-12-04 20:23:49'', ''1'')', 'update', '{"pembayaran_no":"000001","po_no":"00002","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"3000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 20:23:49'),
('::1', 1, 'admin', 'p_t_po', 2, 'UPDATE `p_t_po` SET `status_po_id` = 2, `po_bayar` = 3000000, `updated_at` = ''2016-12-04 20:23:49'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"status_po_id":2,"po_bayar":3000000}', 'admin update p_t_po', '2016-12-04 20:23:49'),
('::1', 1, 'admin', 'p_t_po', 1, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', ''150000'', ''0'', ''150000'', ''JU001'', ''2016-12-04 20:31:52'', ''1'')', 'update', '{"po_no":"00001","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"150000","po_ppn":"0","po_total":"150000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 20:31:52'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', ''1'', ''5'', ''30000'', '''', 1, ''JU001'', ''2016-12-04 20:31:52'', ''1'')', 'update', '{"po_no":"00001","kd_barang":"0001","kd_satuan":"1","jml_barang":"5","harga_satuan":"30000","ppn":"","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 20:31:52'),
('::1', 1, 'admin', 'p_t_po', 2, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', ''1800000'', ''0'', ''1800000'', ''JU001'', ''2016-12-04 20:32:17'', ''1'')', 'update', '{"po_no":"00002","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"1800000","po_ppn":"0","po_total":"1800000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 20:32:17'),
('::1', 1, 'admin', 'p_t_podetail', 2, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''0001'', ''1'', ''30'', ''60000'', '''', 1, ''JU001'', ''2016-12-04 20:32:17'', ''1'')', 'update', '{"po_no":"00002","kd_barang":"0001","kd_satuan":"1","jml_barang":"30","harga_satuan":"60000","ppn":"","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 20:32:17'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 1, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''000001'', ''00002'', ''2016-12-19'', ''00001'', ''1800000'', ''JU001'', ''2016-12-04 20:33:03'', ''1'')', 'update', '{"pembayaran_no":"000001","po_no":"00002","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"1800000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 20:33:03'),
('::1', 1, 'admin', 'p_t_po', 2, 'UPDATE `p_t_po` SET `status_po_id` = 2, `po_bayar` = 1800000, `updated_at` = ''2016-12-04 20:33:03'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"status_po_id":2,"po_bayar":1800000}', 'admin update p_t_po', '2016-12-04 20:33:03'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 2, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''000001'', ''00001'', ''2016-12-19'', ''00001'', ''150000'', ''JU001'', ''2016-12-04 20:33:04'', ''1'')', 'update', '{"pembayaran_no":"000001","po_no":"00001","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"150000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 20:33:04'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `status_po_id` = 2, `po_bayar` = 150000, `updated_at` = ''2016-12-04 20:33:04'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"status_po_id":2,"po_bayar":150000}', 'admin update p_t_po', '2016-12-04 20:33:04'),
('::1', 1, 'admin', 'p_t_po', 3, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', ''480000'', ''48000'', ''528000'', ''JU001'', ''2016-12-04 21:06:21'', ''1'')', 'update', '{"po_no":"00003","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"480000","po_ppn":"48000","po_total":"528000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 21:06:22'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''0001'', ''1'', ''12'', ''40000'', ''1'', 1, ''JU001'', ''2016-12-04 21:06:22'', ''1'')', 'update', '{"po_no":"00003","kd_barang":"0001","kd_satuan":"1","jml_barang":"12","harga_satuan":"40000","ppn":"1","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 21:06:22'),
('::1', 1, 'admin', 'p_t_po', 4, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00004'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', ''14000000'', ''0'', ''14000000'', ''JU001'', ''2016-12-04 21:10:00'', ''1'')', 'update', '{"po_no":"00004","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"14000000","po_ppn":"0","po_total":"14000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-04 21:10:00'),
('::1', 1, 'admin', 'p_t_podetail', 4, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00004'', ''0002'', ''2'', ''100'', ''40000'', '''', 1, ''JU001'', ''2016-12-04 21:10:00'', ''1'')', 'update', '{"po_no":"00004","kd_barang":"0002","kd_satuan":"2","jml_barang":"100","harga_satuan":"40000","ppn":"","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 21:10:00'),
('::1', 1, 'admin', 'p_t_podetail', 5, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00004'', ''0001'', ''1'', ''20'', ''500000'', '''', 2, ''JU001'', ''2016-12-04 21:10:00'', ''1'')', 'update', '{"po_no":"00004","kd_barang":"0001","kd_satuan":"1","jml_barang":"20","harga_satuan":"500000","ppn":"","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-04 21:10:00'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 3, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''2'', ''00003'', ''2016-12-19'', ''00001'', ''200000'', ''JU001'', ''2016-12-04 21:10:57'', ''1'')', 'update', '{"pembayaran_no":"2","po_no":"00003","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"200000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 21:10:57'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 200000, `updated_at` = ''2016-12-04 21:10:57'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"status_po_id":1,"po_bayar":200000}', 'admin update p_t_po', '2016-12-04 21:10:57');
INSERT INTO `log` (`ip`, `user_id`, `user_name`, `affected_table`, `affected_id`, `query`, `action`, `data`, `wording_log`, `created_at`) VALUES
('::1', 1, 'admin', 'p_t_po_pembayaran', 4, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''00003'', ''2016-12-19'', ''00001'', ''28000'', ''JU001'', ''2016-12-04 21:20:32'', ''1'')', 'update', '{"pembayaran_no":"00003","po_no":"00003","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"28000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 21:20:32'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 228000, `updated_at` = ''2016-12-04 21:20:33'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"status_po_id":1,"po_bayar":228000}', 'admin update p_t_po', '2016-12-04 21:20:33'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 5, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''00004'', ''2016-12-19'', ''00001'', ''7000000'', ''JU001'', ''2016-12-04 21:20:33'', ''1'')', 'update', '{"pembayaran_no":"00003","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"7000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 21:20:33'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 7000000, `updated_at` = ''2016-12-04 21:20:33'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":7000000}', 'admin update p_t_po', '2016-12-04 21:20:33'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 6, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''00004'', ''2016-12-19'', ''00001'', ''3500000'', ''JU001'', ''2016-12-04 21:21:35'', ''1'')', 'update', '{"pembayaran_no":"00003","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"3500000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 21:21:36'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 10500000, `updated_at` = ''2016-12-04 21:21:36'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":10500000}', 'admin update p_t_po', '2016-12-04 21:21:36'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 7, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''00003'', ''2016-12-19'', ''00001'', ''150000'', ''JU001'', ''2016-12-04 21:21:36'', ''1'')', 'update', '{"pembayaran_no":"00003","po_no":"00003","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"150000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 21:21:36'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 378000, `updated_at` = ''2016-12-04 21:21:36'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"status_po_id":1,"po_bayar":378000}', 'admin update p_t_po', '2016-12-04 21:21:36'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 8, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''00003'', ''2016-12-19'', ''00001'', ''150000'', ''JU001'', ''2016-12-04 21:21:58'', ''1'')', 'update', '{"pembayaran_no":"00003","po_no":"00003","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"150000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 21:21:58'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `status_po_id` = 2, `po_bayar` = 528000, `updated_at` = ''2016-12-04 21:21:59'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"status_po_id":2,"po_bayar":528000}', 'admin update p_t_po', '2016-12-04 21:21:59'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 9, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''00004'', ''2016-12-19'', ''00001'', ''1500000'', ''JU001'', ''2016-12-04 21:21:59'', ''1'')', 'update', '{"pembayaran_no":"00003","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"1500000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 21:21:59'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 12000000, `updated_at` = ''2016-12-04 21:21:59'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":12000000}', 'admin update p_t_po', '2016-12-04 21:21:59'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 10, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''00004'', ''2016-12-19'', ''00001'', ''2000000'', ''JU001'', ''2016-12-04 21:22:11'', ''1'')', 'update', '{"pembayaran_no":"00003","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"2000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 21:22:11'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 2, `po_bayar` = 14000000, `updated_at` = ''2016-12-04 21:22:11'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":2,"po_bayar":14000000}', 'admin update p_t_po', '2016-12-04 21:22:11'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 1, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''00002'', ''2016-12-19'', ''00001'', ''900000'', ''JU001'', ''2016-12-04 21:23:57'', ''1'')', 'update', '{"pembayaran_no":"00001","po_no":"00002","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"900000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 21:23:57'),
('::1', 1, 'admin', 'p_t_po', 2, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 900000, `updated_at` = ''2016-12-04 21:23:57'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"status_po_id":1,"po_bayar":900000}', 'admin update p_t_po', '2016-12-04 21:23:57'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 2, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00003'', ''2016-12-19'', ''00001'', ''528000'', ''JU001'', ''2016-12-04 21:29:27'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00003","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"528000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 21:29:28'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `status_po_id` = 2, `po_bayar` = 528000, `updated_at` = ''2016-12-04 21:29:28'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"status_po_id":2,"po_bayar":528000}', 'admin update p_t_po', '2016-12-04 21:29:28'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 3, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''00004'', ''2016-12-19'', ''00001'', ''7000000'', ''JU001'', ''2016-12-04 21:30:50'', ''1'')', 'update', '{"pembayaran_no":"00003","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"7000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 21:30:50'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 7000000, `updated_at` = ''2016-12-04 21:30:50'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":7000000}', 'admin update p_t_po', '2016-12-04 21:30:50'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 4, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00004'', ''00004'', ''2016-12-19'', ''00001'', ''2000000'', ''JU001'', ''2016-12-04 22:14:01'', ''1'')', 'update', '{"pembayaran_no":"00004","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"2000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:14:01'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 9000000, `updated_at` = ''2016-12-04 22:14:01'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":9000000}', 'admin update p_t_po', '2016-12-04 22:14:01'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 5, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00004'', ''00002'', ''2016-12-19'', ''00001'', ''500000'', ''JU001'', ''2016-12-04 22:14:01'', ''1'')', 'update', '{"pembayaran_no":"00004","po_no":"00002","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"500000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:14:01'),
('::1', 1, 'admin', 'p_t_po', 2, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 1400000, `updated_at` = ''2016-12-04 22:14:01'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"status_po_id":1,"po_bayar":1400000}', 'admin update p_t_po', '2016-12-04 22:14:01'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 6, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00006'', ''00004'', ''2016-12-19'', ''00001'', ''1000000'', ''JU001'', ''2016-12-04 22:14:45'', ''1'')', 'update', '{"pembayaran_no":"00006","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"1000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:14:45'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 10000000, `updated_at` = ''2016-12-04 22:14:45'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":10000000}', 'admin update p_t_po', '2016-12-04 22:14:45'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 7, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00006'', ''00002'', ''2016-12-19'', ''00001'', ''150000'', ''JU001'', ''2016-12-04 22:14:45'', ''1'')', 'update', '{"pembayaran_no":"00006","po_no":"00002","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"150000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:14:45'),
('::1', 1, 'admin', 'p_t_po', 2, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 1550000, `updated_at` = ''2016-12-04 22:14:45'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"status_po_id":1,"po_bayar":1550000}', 'admin update p_t_po', '2016-12-04 22:14:45'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 8, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00008'', ''00002'', ''2016-12-19'', ''00001'', ''250000'', ''JU001'', ''2016-12-04 22:15:20'', ''1'')', 'update', '{"pembayaran_no":"00008","po_no":"00002","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"250000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:15:20'),
('::1', 1, 'admin', 'p_t_po', 2, 'UPDATE `p_t_po` SET `status_po_id` = 2, `po_bayar` = 1800000, `updated_at` = ''2016-12-04 22:15:20'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"status_po_id":2,"po_bayar":1800000}', 'admin update p_t_po', '2016-12-04 22:15:20'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 9, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00001'', ''2016-12-19'', ''00001'', ''50000'', ''JU001'', ''2016-12-04 22:17:52'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00001","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"50000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:17:52'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 50000, `updated_at` = ''2016-12-04 22:17:52'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"status_po_id":1,"po_bayar":50000}', 'admin update p_t_po', '2016-12-04 22:17:52'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 10, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00004'', ''2016-12-19'', ''00001'', ''15000'', ''JU001'', ''2016-12-04 22:17:52'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"15000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:17:52'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 10015000, `updated_at` = ''2016-12-04 22:17:52'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":10015000}', 'admin update p_t_po', '2016-12-04 22:17:52'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 11, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00004'', ''2016-12-19'', ''00001'', ''35000'', ''JU001'', ''2016-12-04 22:18:34'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"35000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:18:34'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 10050000, `updated_at` = ''2016-12-04 22:18:34'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":10050000}', 'admin update p_t_po', '2016-12-04 22:18:34'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 12, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00001'', ''2016-12-19'', ''00001'', ''30000'', ''JU001'', ''2016-12-04 22:18:34'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00001","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"30000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:18:34'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 80000, `updated_at` = ''2016-12-04 22:18:34'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"status_po_id":1,"po_bayar":80000}', 'admin update p_t_po', '2016-12-04 22:18:35'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 13, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00004'', ''2016-12-19'', ''00001'', ''450000'', ''JU001'', ''2016-12-04 22:19:07'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"450000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:19:07'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 10500000, `updated_at` = ''2016-12-04 22:19:07'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":10500000}', 'admin update p_t_po', '2016-12-04 22:19:07'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 14, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00001'', ''2016-12-19'', ''00001'', ''20000'', ''JU001'', ''2016-12-04 22:19:07'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00001","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"20000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:19:07'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 100000, `updated_at` = ''2016-12-04 22:19:07'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"status_po_id":1,"po_bayar":100000}', 'admin update p_t_po', '2016-12-04 22:19:07'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 15, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00004'', ''2016-12-19'', ''00001'', ''150000'', ''JU001'', ''2016-12-04 22:19:29'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"150000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:19:29'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 10650000, `updated_at` = ''2016-12-04 22:19:29'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":10650000}', 'admin update p_t_po', '2016-12-04 22:19:29'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 16, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00001'', ''2016-12-19'', ''00001'', ''25000'', ''JU001'', ''2016-12-04 22:19:29'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00001","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"25000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:19:29'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 125000, `updated_at` = ''2016-12-04 22:19:29'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"status_po_id":1,"po_bayar":125000}', 'admin update p_t_po', '2016-12-04 22:19:29'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 1, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''00004'', ''2016-12-19'', ''00001'', ''7000000'', ''JU001'', ''2016-12-04 22:42:45'', ''1'')', 'update', '{"pembayaran_no":"00001","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"7000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:42:45'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 7000000, `updated_at` = ''2016-12-04 22:42:45'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":7000000}', 'admin update p_t_po', '2016-12-04 22:42:45'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 2, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''00001'', ''2016-12-19'', ''00001'', ''50000'', ''JU001'', ''2016-12-04 22:42:45'', ''1'')', 'update', '{"pembayaran_no":"00001","po_no":"00001","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"50000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:42:45'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 50000, `updated_at` = ''2016-12-04 22:42:45'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"status_po_id":1,"po_bayar":50000}', 'admin update p_t_po', '2016-12-04 22:42:45'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 3, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00004'', ''2016-12-19'', ''00001'', ''1500000'', ''JU001'', ''2016-12-04 22:43:19'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"1500000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:43:19'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 8500000, `updated_at` = ''2016-12-04 22:43:19'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":8500000}', 'admin update p_t_po', '2016-12-04 22:43:19'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 4, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00003'', ''2016-12-19'', ''00001'', ''28000'', ''JU001'', ''2016-12-04 22:43:19'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00003","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"28000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:43:19'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 28000, `updated_at` = ''2016-12-04 22:43:19'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"status_po_id":1,"po_bayar":28000}', 'admin update p_t_po', '2016-12-04 22:43:19'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 5, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00002'', ''2016-12-19'', ''00001'', ''1800000'', ''JU001'', ''2016-12-04 22:44:35'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00002","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"1800000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:44:35'),
('::1', 1, 'admin', 'p_t_po', 2, 'UPDATE `p_t_po` SET `status_po_id` = 2, `po_bayar` = 1800000, `updated_at` = ''2016-12-04 22:44:35'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"status_po_id":2,"po_bayar":1800000}', 'admin update p_t_po', '2016-12-04 22:44:35'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 1, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00004'', ''2016-12-19'', ''00001'', ''7000000'', ''JU001'', ''2016-12-04 22:48:11'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"7000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:48:11'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 7000000, `updated_at` = ''2016-12-04 22:48:11'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":7000000}', 'admin update p_t_po', '2016-12-04 22:48:11'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 2, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00002'', ''2016-12-19'', ''00001'', ''800000'', ''JU001'', ''2016-12-04 22:48:11'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00002","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"800000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:48:11'),
('::1', 1, 'admin', 'p_t_po', 2, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 800000, `updated_at` = ''2016-12-04 22:48:11'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"status_po_id":1,"po_bayar":800000}', 'admin update p_t_po', '2016-12-04 22:48:11'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 3, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00003'', ''2016-12-19'', ''00001'', ''128000'', ''JU001'', ''2016-12-04 22:48:30'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00003","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"128000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:48:30'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 128000, `updated_at` = ''2016-12-04 22:48:30'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"status_po_id":1,"po_bayar":128000}', 'admin update p_t_po', '2016-12-04 22:48:30'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 4, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00004'', ''2016-12-19'', ''00001'', ''3500000'', ''JU001'', ''2016-12-04 22:48:45'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"3500000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:48:45'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 10500000, `updated_at` = ''2016-12-04 22:48:46'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":10500000}', 'admin update p_t_po', '2016-12-04 22:48:46'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 1, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''000001'', ''00004'', ''2016-12-19'', ''00001'', ''7000000'', ''JU001'', ''2016-12-04 22:50:53'', ''1'')', 'update', '{"pembayaran_no":"000001","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"7000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:50:53'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 7000000, `updated_at` = ''2016-12-04 22:50:53'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":7000000}', 'admin update p_t_po', '2016-12-04 22:50:53'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 2, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00003'', ''2016-12-19'', ''00001'', ''528000'', ''JU001'', ''2016-12-04 22:51:02'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00003","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"528000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:51:02'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `status_po_id` = 2, `po_bayar` = 528000, `updated_at` = ''2016-12-04 22:51:02'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"status_po_id":2,"po_bayar":528000}', 'admin update p_t_po', '2016-12-04 22:51:02'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 3, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''00002'', ''2016-12-19'', ''00001'', ''900000'', ''JU001'', ''2016-12-04 22:51:19'', ''1'')', 'update', '{"pembayaran_no":"00003","po_no":"00002","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"900000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:51:19'),
('::1', 1, 'admin', 'p_t_po', 2, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 900000, `updated_at` = ''2016-12-04 22:51:19'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"status_po_id":1,"po_bayar":900000}', 'admin update p_t_po', '2016-12-04 22:51:19'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 1, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''00004'', ''2016-12-19'', ''00001'', ''7000000'', ''JU001'', ''2016-12-04 22:54:14'', ''1'')', 'update', '{"pembayaran_no":"00001","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"7000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:54:14'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 7000000, `updated_at` = ''2016-12-04 22:54:14'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":7000000}', 'admin update p_t_po', '2016-12-04 22:54:14'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 2, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00004'', ''2016-12-19'', ''00001'', ''2000000'', ''JU001'', ''2016-12-04 22:54:55'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"2000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:54:55'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 9000000, `updated_at` = ''2016-12-04 22:54:55'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":9000000}', 'admin update p_t_po', '2016-12-04 22:54:55'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 3, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00001'', ''2016-12-19'', ''00001'', ''150000'', ''JU001'', ''2016-12-04 22:54:56'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00001","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"150000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:54:56'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `status_po_id` = 2, `po_bayar` = 150000, `updated_at` = ''2016-12-04 22:54:56'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"status_po_id":2,"po_bayar":150000}', 'admin update p_t_po', '2016-12-04 22:54:56'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 4, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''00004'', ''2016-12-19'', ''00001'', ''3000000'', ''JU001'', ''2016-12-04 22:55:09'', ''1'')', 'update', '{"pembayaran_no":"00003","po_no":"00004","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"3000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-04 22:55:09'),
('::1', 1, 'admin', 'p_t_po', 4, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 12000000, `updated_at` = ''2016-12-04 22:55:09'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"status_po_id":1,"po_bayar":12000000}', 'admin update p_t_po', '2016-12-04 22:55:09'),
('::1', 1, 'admin', 'p_t_po', 5, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00005'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', '''', '''', '''', ''JU001'', ''2016-12-05 11:37:32'', ''1'')', 'update', '{"po_no":"00005","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"","po_ppn":"","po_total":"","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 11:37:32'),
('::1', 1, 'admin', 'p_t_po', 5, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''2000000'', `po_ppn` = ''0'', `po_total` = ''2000000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 11:38:04'', `updated_by` = ''1''\nWHERE `id` = ''5''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"2000000","po_ppn":"0","po_total":"2000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 11:38:04'),
('::1', 1, 'admin', 'p_t_podetail', NULL, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''20'', `harga_satuan` = ''100000'', `ppn` = '''', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 11:38:04'', `updated_by` = ''1''\nWHERE `id` IS NULL', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"20","harga_satuan":"100000","ppn":"","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 11:38:04'),
('::1', 1, 'admin', 'p_t_po', 1, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', ''10000000'', ''0'', ''10000000'', ''JU001'', ''2016-12-05 11:47:06'', ''1'')', 'update', '{"po_no":"00001","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"10000000","po_ppn":"0","po_total":"10000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 11:47:06'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', ''1'', ''20'', ''500000'', '''', 1, ''JU001'', ''2016-12-05 11:47:06'', ''1'')', 'update', '{"po_no":"00001","kd_barang":"0001","kd_satuan":"1","jml_barang":"20","harga_satuan":"500000","ppn":"","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 11:47:06'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''10000000'', `po_ppn` = '''', `po_total` = ''10000000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 11:47:58'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"10000000","po_ppn":"","po_total":"10000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 11:47:58'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''20'', `harga_satuan` = ''500000'', `ppn` = ''0'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 11:47:58'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"20","harga_satuan":"500000","ppn":"0","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 11:47:58'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''5000000'', `po_ppn` = ''0'', `po_total` = ''5000000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 11:48:14'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"5000000","po_ppn":"0","po_total":"5000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 11:48:15'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''10'', `harga_satuan` = ''500000'', `ppn` = ''0'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 11:48:15'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"10","harga_satuan":"500000","ppn":"0","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 11:48:15'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''11000000'', `po_ppn` = ''0'', `po_total` = ''11000000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 11:49:49'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"11000000","po_ppn":"0","po_total":"11000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 11:49:49'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''10'', `harga_satuan` = ''500000'', `ppn` = ''0'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 11:49:49'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"10","harga_satuan":"500000","ppn":"0","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 11:49:49'),
('::1', 1, 'admin', 'p_t_podetail', NULL, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''60'', `harga_satuan` = ''100000'', `ppn` = '''', `index` = 2, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 11:49:49'', `updated_by` = ''1''\nWHERE `id` IS NULL', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"60","harga_satuan":"100000","ppn":"","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 11:49:49'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''7000000'', `po_ppn` = ''0'', `po_total` = ''7000000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 11:51:36'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"7000000","po_ppn":"0","po_total":"7000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 11:51:36'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''10'', `harga_satuan` = ''500000'', `ppn` = ''0'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 11:51:36'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"10","harga_satuan":"500000","ppn":"0","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 11:51:36'),
('::1', 1, 'admin', 'p_t_podetail', NULL, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0002'', `kd_satuan` = ''2'', `jml_barang` = ''20'', `harga_satuan` = ''100000'', `ppn` = '''', `index` = 2, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 11:51:36'', `updated_by` = ''1''\nWHERE `id` IS NULL', 'update', '{"kd_barang":"0002","kd_satuan":"2","jml_barang":"20","harga_satuan":"100000","ppn":"","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 11:51:36'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''6800000'', `po_ppn` = ''0'', `po_total` = ''6800000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 12:03:23'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"6800000","po_ppn":"0","po_total":"6800000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 12:03:23'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''10'', `harga_satuan` = ''500000'', `ppn` = ''0'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 12:03:23'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"10","harga_satuan":"500000","ppn":"0","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 12:03:23'),
('::1', 1, 'admin', 'p_t_podetail', 2, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0002'', ''2'', ''18'', ''100000'', '''', 2, ''JU001'', ''2016-12-05 12:03:24'', ''1'')', 'update', '{"po_no":"00001","kd_barang":"0002","kd_satuan":"2","jml_barang":"18","harga_satuan":"100000","ppn":"","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 12:03:24'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''24900000'', `po_ppn` = ''1180000'', `po_total` = ''26080000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 12:04:06'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"24900000","po_ppn":"1180000","po_total":"26080000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 12:04:06'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''10'', `harga_satuan` = ''500000'', `ppn` = ''0'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 12:04:06'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"10","harga_satuan":"500000","ppn":"0","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 12:04:06'),
('::1', 1, 'admin', 'p_t_podetail', 2, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0002'', `kd_satuan` = ''2'', `jml_barang` = ''18'', `harga_satuan` = ''100000'', `ppn` = ''1'', `index` = 2, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 12:04:06'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"kd_barang":"0002","kd_satuan":"2","jml_barang":"18","harga_satuan":"100000","ppn":"1","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 12:04:06'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', ''1'', ''90'', ''90000'', ''0'', 3, ''JU001'', ''2016-12-05 12:04:06'', ''1'')', 'update', '{"po_no":"00001","kd_barang":"0001","kd_satuan":"1","jml_barang":"90","harga_satuan":"90000","ppn":"0","index":3,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 12:04:06'),
('::1', 1, 'admin', 'p_t_podetail', 4, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', ''1'', ''100'', ''100000'', ''1'', 4, ''JU001'', ''2016-12-05 12:04:07'', ''1'')', 'update', '{"po_no":"00001","kd_barang":"0001","kd_satuan":"1","jml_barang":"100","harga_satuan":"100000","ppn":"1","index":4,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 12:04:07'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `po_tgl` = ''2016-12-05'', `po_tgl_tagihan` = ''2016-12-19'', `kd_vendor_supplier` = ''00001'', `status_po_id` = 1, `kd_syarat_pembayaran` = '''', `po_subtotal` = ''24900000'', `po_ppn` = ''1180000'', `po_total` = ''26080000'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 12:09:08'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"24900000","po_ppn":"1180000","po_total":"26080000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 12:09:08'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''10'', `harga_satuan` = ''500000'', `ppn` = ''0'', `index` = 1, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 12:09:08'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"10","harga_satuan":"500000","ppn":"0","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 12:09:08'),
('::1', 1, 'admin', 'p_t_podetail', 2, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0002'', `kd_satuan` = ''2'', `jml_barang` = ''18'', `harga_satuan` = ''100000'', `ppn` = ''1'', `index` = 2, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 12:09:08'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"kd_barang":"0002","kd_satuan":"2","jml_barang":"18","harga_satuan":"100000","ppn":"1","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 12:09:08'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''90'', `harga_satuan` = ''90000'', `ppn` = ''0'', `index` = 3, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 12:09:08'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"90","harga_satuan":"90000","ppn":"0","index":3,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 12:09:08'),
('::1', 1, 'admin', 'p_t_podetail', 4, 'UPDATE `p_t_podetail` SET `kd_barang` = ''0001'', `kd_satuan` = ''1'', `jml_barang` = ''100'', `harga_satuan` = ''100000'', `ppn` = ''1'', `index` = 4, `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-05 12:09:08'', `updated_by` = ''1''\nWHERE `id` = ''4''', 'update', '{"kd_barang":"0001","kd_satuan":"1","jml_barang":"100","harga_satuan":"100000","ppn":"1","index":4,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 12:09:08'),
('::1', 1, 'admin', 'p_t_po', 2, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', ''35000000'', ''1000000'', ''36000000'', ''JU001'', ''2016-12-05 14:50:14'', ''1'')', 'update', '{"po_no":"00001","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"35000000","po_ppn":"1000000","po_total":"36000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 14:50:14'),
('::1', 1, 'admin', 'p_t_podetail', 5, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', ''1'', ''50'', ''200000'', ''1'', 1, ''JU001'', ''2016-12-05 14:50:15'', ''1'')', 'update', '{"po_no":"00001","kd_barang":"0001","kd_satuan":"1","jml_barang":"50","harga_satuan":"200000","ppn":"1","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 14:50:15'),
('::1', 1, 'admin', 'p_t_podetail', 6, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0002'', ''2'', ''100'', ''250000'', ''0'', 2, ''JU001'', ''2016-12-05 14:50:15'', ''1'')', 'update', '{"po_no":"00001","kd_barang":"0002","kd_satuan":"2","jml_barang":"100","harga_satuan":"250000","ppn":"0","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 14:50:15'),
('::1', 1, 'admin', 'p_t_po', 3, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', ''268862'', ''0'', ''268862'', ''JU001'', ''2016-12-05 15:37:44'', ''1'')', 'update', '{"po_no":"00002","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"268862","po_ppn":"0","po_total":"268862","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 15:37:44');
INSERT INTO `log` (`ip`, `user_id`, `user_name`, `affected_table`, `affected_id`, `query`, `action`, `data`, `wording_log`, `created_at`) VALUES
('::1', 1, 'admin', 'p_t_podetail', 7, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''0001'', ''1'', ''121'', ''2222'', '''', 1, ''JU001'', ''2016-12-05 15:37:44'', ''1'')', 'update', '{"po_no":"00002","kd_barang":"0001","kd_satuan":"1","jml_barang":"121","harga_satuan":"2222","ppn":"","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 15:37:44'),
('::1', 1, 'admin', 'p_t_po', 4, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', ''2686684'', ''0'', ''2686684'', ''JU001'', ''2016-12-05 15:38:06'', ''1'')', 'update', '{"po_no":"00003","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"2686684","po_ppn":"0","po_total":"2686684","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 15:38:06'),
('::1', 1, 'admin', 'p_t_podetail', 8, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''0001'', ''1'', ''22'', ''122122'', '''', 1, ''JU001'', ''2016-12-05 15:38:06'', ''1'')', 'update', '{"po_no":"00003","kd_barang":"0001","kd_satuan":"1","jml_barang":"22","harga_satuan":"122122","ppn":"","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 15:38:06'),
('::1', 1, 'admin', 'p_t_po', 1, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', ''195000000'', ''19500000'', ''214500000'', ''JU001'', ''2016-12-05 15:39:49'', ''1'')', 'update', '{"po_no":"00001","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"195000000","po_ppn":"19500000","po_total":"214500000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 15:39:49'),
('::1', 1, 'admin', 'p_t_podetail', 1, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', ''1'', ''25'', ''5000000'', ''1'', 1, ''JU001'', ''2016-12-05 15:39:49'', ''1'')', 'update', '{"po_no":"00001","kd_barang":"0001","kd_satuan":"1","jml_barang":"25","harga_satuan":"5000000","ppn":"1","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 15:39:49'),
('::1', 1, 'admin', 'p_t_podetail', 2, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0002'', ''2'', ''100'', ''600000'', ''1'', 2, ''JU001'', ''2016-12-05 15:39:49'', ''1'')', 'update', '{"po_no":"00001","kd_barang":"0002","kd_satuan":"2","jml_barang":"100","harga_satuan":"600000","ppn":"1","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 15:39:50'),
('::1', 1, 'admin', 'p_t_podetail', 3, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', ''1'', ''500'', ''20000'', ''1'', 3, ''JU001'', ''2016-12-05 15:39:50'', ''1'')', 'update', '{"po_no":"00001","kd_barang":"0001","kd_satuan":"1","jml_barang":"500","harga_satuan":"20000","ppn":"1","index":3,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 15:39:50'),
('::1', 1, 'admin', 'p_t_po', 2, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', ''57200000'', ''5720000'', ''62920000'', ''JU001'', ''2016-12-05 15:40:37'', ''1'')', 'update', '{"po_no":"00002","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"57200000","po_ppn":"5720000","po_total":"62920000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 15:40:37'),
('::1', 1, 'admin', 'p_t_podetail', 4, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''0001'', ''1'', ''50'', ''10000'', ''1'', 1, ''JU001'', ''2016-12-05 15:40:38'', ''1'')', 'update', '{"po_no":"00002","kd_barang":"0001","kd_satuan":"1","jml_barang":"50","harga_satuan":"10000","ppn":"1","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 15:40:38'),
('::1', 1, 'admin', 'p_t_podetail', 5, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''0002'', ''2'', ''100'', ''7000'', ''1'', 2, ''JU001'', ''2016-12-05 15:40:38'', ''1'')', 'update', '{"po_no":"00002","kd_barang":"0002","kd_satuan":"2","jml_barang":"100","harga_satuan":"7000","ppn":"1","index":2,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 15:40:38'),
('::1', 1, 'admin', 'p_t_podetail', 6, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''0001'', ''1'', ''800'', ''70000'', ''1'', 3, ''JU001'', ''2016-12-05 15:40:38'', ''1'')', 'update', '{"po_no":"00002","kd_barang":"0001","kd_satuan":"1","jml_barang":"800","harga_satuan":"70000","ppn":"1","index":3,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 15:40:38'),
('::1', 1, 'admin', 'p_t_po', 3, 'INSERT INTO `p_t_po` (`po_no`, `po_tgl`, `po_tgl_tagihan`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''2016-12-05'', ''2016-12-19'', ''00001'', 1, '''', ''10000000'', ''0'', ''10000000'', ''JU001'', ''2016-12-05 15:41:01'', ''1'')', 'update', '{"po_no":"00003","po_tgl":"2016-12-05","po_tgl_tagihan":"2016-12-19","kd_vendor_supplier":"00001","status_po_id":1,"kd_syarat_pembayaran":"","po_subtotal":"10000000","po_ppn":"0","po_total":"10000000","vend_pic":"Janitra Al Malik","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-05 15:41:01'),
('::1', 1, 'admin', 'p_t_podetail', 7, 'INSERT INTO `p_t_podetail` (`po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `index`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''0001'', ''1'', ''100'', ''100000'', '''', 1, ''JU001'', ''2016-12-05 15:41:01'', ''1'')', 'update', '{"po_no":"00003","kd_barang":"0001","kd_satuan":"1","jml_barang":"100","harga_satuan":"100000","ppn":"","index":1,"kd_jns_usaha":"JU001"}', 'admin update p_t_podetail', '2016-12-05 15:41:02'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 1, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `po_tgl`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''00001'', ''2016-12-19'', ''00001'', ''100000000'', ''JU001'', ''2016-12-05 15:41:29'', ''1'')', 'update', '{"pembayaran_no":"00001","po_no":"00001","po_tgl":"2016-12-19","kd_vendor_supplier":"00001","pembayaran_total":"100000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-05 15:41:29'),
('::1', 1, 'admin', 'p_t_po', 1, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 100000000, `updated_at` = ''2016-12-05 15:41:29'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"status_po_id":1,"po_bayar":100000000}', 'admin update p_t_po', '2016-12-05 15:41:29'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 2, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `tgl_bayar`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00002'', ''00003'', ''2016-12-05'', ''00001'', ''5000000'', ''JU001'', ''2016-12-05 15:51:17'', ''1'')', 'update', '{"pembayaran_no":"00002","po_no":"00003","tgl_bayar":"2016-12-05","kd_vendor_supplier":"00001","pembayaran_total":"5000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-05 15:51:17'),
('::1', 1, 'admin', 'p_t_po', 3, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 5000000, `updated_at` = ''2016-12-05 15:51:17'', `updated_by` = ''1''\nWHERE `id` = ''3''', 'update', '{"status_po_id":1,"po_bayar":5000000}', 'admin update p_t_po', '2016-12-05 15:51:17'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 3, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `tgl_bayar`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00003'', ''00002'', ''2016-12-05'', ''00001'', ''30000000'', ''JU001'', ''2016-12-05 16:10:44'', ''1'')', 'update', '{"pembayaran_no":"00003","po_no":"00002","tgl_bayar":"2016-12-05","kd_vendor_supplier":"00001","pembayaran_total":"30000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-05 16:10:44'),
('::1', 1, 'admin', 'p_t_po', 2, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 30000000, `updated_at` = ''2016-12-05 16:10:44'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"status_po_id":1,"po_bayar":30000000}', 'admin update p_t_po', '2016-12-05 16:10:44'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 4, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `tgl_bayar`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00004'', ''00002'', ''2016-12-05'', ''00001'', ''17000000'', ''JU001'', ''2016-12-05 16:11:20'', ''1'')', 'update', '{"pembayaran_no":"00004","po_no":"00002","tgl_bayar":"2016-12-05","kd_vendor_supplier":"00001","pembayaran_total":"17000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-05 16:11:20'),
('::1', 1, 'admin', 'p_t_po', 2, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 47000000, `updated_at` = ''2016-12-05 16:11:20'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"status_po_id":1,"po_bayar":47000000}', 'admin update p_t_po', '2016-12-05 16:11:20'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 5, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `tgl_bayar`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00005'', ''00002'', ''2016-12-05'', ''00001'', ''5920000'', ''JU001'', ''2016-12-05 16:11:37'', ''1'')', 'update', '{"pembayaran_no":"00005","po_no":"00002","tgl_bayar":"2016-12-05","kd_vendor_supplier":"00001","pembayaran_total":"5920000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-05 16:11:37'),
('::1', 1, 'admin', 'p_t_po', 2, 'UPDATE `p_t_po` SET `status_po_id` = 1, `po_bayar` = 52920000, `updated_at` = ''2016-12-05 16:11:37'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"status_po_id":1,"po_bayar":52920000}', 'admin update p_t_po', '2016-12-05 16:11:37'),
('::1', 1, 'admin', 'p_t_po_pembayaran', 6, 'INSERT INTO `p_t_po_pembayaran` (`pembayaran_no`, `po_no`, `tgl_bayar`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00006'', ''00002'', ''2016-12-05'', ''00001'', ''10000000'', ''JU001'', ''2016-12-05 16:11:46'', ''1'')', 'update', '{"pembayaran_no":"00006","po_no":"00002","tgl_bayar":"2016-12-05","kd_vendor_supplier":"00001","pembayaran_total":"10000000","kd_jns_usaha":"JU001"}', 'admin update p_t_po_pembayaran', '2016-12-05 16:11:46'),
('::1', 1, 'admin', 'p_t_po', 2, 'UPDATE `p_t_po` SET `status_po_id` = 2, `po_bayar` = 62920000, `updated_at` = ''2016-12-05 16:11:46'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"status_po_id":2,"po_bayar":62920000}', 'admin update p_t_po', '2016-12-05 16:11:47'),
('::1', 1, 'admin', 'i_t_inbound', 1, 'INSERT INTO `i_t_inbound` (`po_no`, `barang_kd`, `refund`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', '''', ''JU001'', ''2016-12-06 01:35:54'', ''1'')', 'update', '{"po_no":"00001","barang_kd":"0001","refund":"","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-06 01:35:54'),
('::1', 1, 'admin', 'i_t_inbound', 2, 'INSERT INTO `i_t_inbound` (`po_no`, `barang_kd`, `refund`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0002'', '''', ''JU001'', ''2016-12-06 01:35:55'', ''1'')', 'update', '{"po_no":"00001","barang_kd":"0002","refund":"","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-06 01:35:55'),
('::1', 1, 'admin', 'i_t_inbound', 3, 'INSERT INTO `i_t_inbound` (`po_no`, `barang_kd`, `refund`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', '''', ''JU001'', ''2016-12-06 01:35:55'', ''1'')', 'update', '{"po_no":"00001","barang_kd":"0001","refund":"","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-06 01:35:55'),
('::1', 1, 'admin', 'hr_m_karyawan', 1, 'INSERT INTO `hr_m_karyawan` (`nik_kary`, `nama_kary`, `alamat_kary`, `sex_kary`, `ktp_kary`, `tgl_lahir_kary`, `tgl_masuk_kary`, `tgl_akhir_kary`, `bagian_kary`, `telp_kary`, `agama_kary`, `status_kerja_kary`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00000011'', ''A'', ''Jakarta'', ''1'', ''12345678'', ''2016-12-13'', ''2016-12-13'', ''2016-12-27'', ''1'', ''213456'', ''1'', ''1'', ''JU001'', ''2016-12-06 01:37:08'', ''1'')', 'update', '{"nik_kary":"00000011","nama_kary":"A","alamat_kary":"Jakarta","sex_kary":"1","ktp_kary":"12345678","tgl_lahir_kary":"2016-12-13","tgl_masuk_kary":"2016-12-13","tgl_akhir_kary":"2016-12-27","bagian_kary":"1","telp_kary":"213456","agama_kary":"1","status_kerja_kary":"1","kd_jns_usaha":"JU001"}', 'admin update hr_m_karyawan', '2016-12-06 01:37:09'),
('::1', 1, 'admin', 'hr_m_karyawan', 1, 'UPDATE `hr_m_karyawan` SET `nik_kary` = ''00000011'', `nama_kary` = ''A'', `alamat_kary` = ''Jakarta'', `sex_kary` = ''1'', `ktp_kary` = ''12345678'', `tgl_lahir_kary` = ''2016-12-13'', `tgl_masuk_kary` = ''2016-12-13'', `tgl_akhir_kary` = ''2016-12-27'', `bagian_kary` = ''1'', `telp_kary` = ''213456'', `agama_kary` = ''1'', `status_kerja_kary` = ''2'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-06 01:37:23'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"nik_kary":"00000011","nama_kary":"A","alamat_kary":"Jakarta","sex_kary":"1","ktp_kary":"12345678","tgl_lahir_kary":"2016-12-13","tgl_masuk_kary":"2016-12-13","tgl_akhir_kary":"2016-12-27","bagian_kary":"1","telp_kary":"213456","agama_kary":"1","status_kerja_kary":"2","kd_jns_usaha":"JU001"}', 'admin update hr_m_karyawan', '2016-12-06 01:37:23'),
('::1', 1, 'admin', 'hr_m_bagian', 2, 'UPDATE `hr_m_bagian` SET `nm_bagian` = ''Update'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-06 01:38:21'', `updated_by` = ''1''\nWHERE `id` = ''2''', 'update', '{"nm_bagian":"Update","kd_jns_usaha":"JU001"}', 'admin update hr_m_bagian', '2016-12-06 01:38:21'),
('::1', 1, 'admin', 'hr_m_gaji', 1, 'INSERT INTO `hr_m_gaji` (`id_kary`, `gaji_kary`, `naik_gaji_kary`, `tunjangan_kary`, `pph_kary`, `status`, `created_at`, `kd_jns_usaha`, `created_by`) VALUES (''1'', ''2000000'', ''1000000'', ''1000000'', ''100000'', 0, ''2016-12-06 01:39:10'', ''JU001'', ''1'')', 'update', '{"id_kary":"1","gaji_kary":"2000000","naik_gaji_kary":"1000000","tunjangan_kary":"1000000","pph_kary":"100000","status":0,"created_at":"2016-12-06 01:39:10","kd_jns_usaha":"JU001"}', 'admin update hr_m_gaji', '2016-12-06 01:39:10'),
('::1', 1, 'admin', 'hr_m_gaji', 1, 'UPDATE `hr_m_gaji` SET `id_kary` = ''1'', `gaji_kary` = ''2000000.00'', `naik_gaji_kary` = ''1000000.00'', `tunjangan_kary` = ''1000000.00'', `pph_kary` = ''100000.00'', `status` = 0, `created_at` = ''2016-12-06 01:39:22'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-06 01:39:22'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"id_kary":"1","gaji_kary":"2000000.00","naik_gaji_kary":"1000000.00","tunjangan_kary":"1000000.00","pph_kary":"100000.00","status":0,"created_at":"2016-12-06 01:39:22","kd_jns_usaha":"JU001"}', 'admin update hr_m_gaji', '2016-12-06 01:39:22'),
('::1', 1, 'admin', 'i_t_inbound', 4, 'INSERT INTO `i_t_inbound` (`po_no`, `barang_kd`, `refund`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', '''', ''JU001'', ''2016-12-06 01:40:51'', ''1'')', 'update', '{"po_no":"00001","barang_kd":"0001","refund":"","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-06 01:40:51'),
('::1', 1, 'admin', 'i_t_inbound', 5, 'INSERT INTO `i_t_inbound` (`po_no`, `barang_kd`, `refund`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', '''', ''JU001'', ''2016-12-06 01:40:51'', ''1'')', 'update', '{"po_no":"00001","barang_kd":"0001","refund":"","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-06 01:40:51'),
('::1', 1, 'admin', 'i_t_inbound', 6, 'INSERT INTO `i_t_inbound` (`po_no`, `barang_kd`, `refund`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0002'', '''', ''JU001'', ''2016-12-06 01:40:51'', ''1'')', 'update', '{"po_no":"00001","barang_kd":"0002","refund":"","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-06 01:40:51'),
('::1', 1, 'admin', 'i_t_inbound', 7, 'INSERT INTO `i_t_inbound` (`po_no`, `barang_kd`, `refund`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', '''', ''JU001'', ''2016-12-06 01:40:51'', ''1'')', 'update', '{"po_no":"00001","barang_kd":"0001","refund":"","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-06 01:40:51'),
('::1', 1, 'admin', 'i_t_inbound', 8, 'INSERT INTO `i_t_inbound` (`po_no`, `barang_kd`, `refund`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', '''', ''JU001'', ''2016-12-06 14:07:05'', ''1'')', 'update', '{"po_no":"00001","barang_kd":"0001","refund":"","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-06 14:07:06'),
('::1', 1, 'admin', 'i_t_inbound', 9, 'INSERT INTO `i_t_inbound` (`po_no`, `barang_kd`, `refund`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0002'', '''', ''JU001'', ''2016-12-06 14:07:08'', ''1'')', 'update', '{"po_no":"00001","barang_kd":"0002","refund":"","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-06 14:07:09'),
('::1', 1, 'admin', 'i_t_inbound', 10, 'INSERT INTO `i_t_inbound` (`po_no`, `barang_kd`, `refund`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''0001'', '''', ''JU001'', ''2016-12-06 14:07:11'', ''1'')', 'update', '{"po_no":"00001","barang_kd":"0001","refund":"","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-06 14:07:11'),
('::1', 1, 'admin', 'i_t_inbound', 11, 'INSERT INTO `i_t_inbound` (`po_no`, `date_in`, `barang_kd`, `jml_in`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''2016-12-07'', ''0001'', ''50'', ''JU001'', ''2016-12-07 11:30:09'', ''1'')', 'update', '{"po_no":"00001","date_in":"2016-12-07","barang_kd":"0001","jml_in":"50","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-07 11:30:09'),
('::1', 1, 'admin', 'i_t_inbound', 12, 'INSERT INTO `i_t_inbound` (`po_no`, `date_in`, `barang_kd`, `jml_in`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''2016-12-07'', ''0002'', ''100'', ''JU001'', ''2016-12-07 11:30:09'', ''1'')', 'update', '{"po_no":"00001","date_in":"2016-12-07","barang_kd":"0002","jml_in":"100","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-07 11:30:09'),
('::1', 1, 'admin', 'i_t_inbound', 13, 'INSERT INTO `i_t_inbound` (`po_no`, `date_in`, `barang_kd`, `jml_in`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''2016-12-07'', ''0001'', ''500'', ''JU001'', ''2016-12-07 11:30:09'', ''1'')', 'update', '{"po_no":"00001","date_in":"2016-12-07","barang_kd":"0001","jml_in":"500","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-07 11:30:09'),
('::1', 1, 'admin', 'i_t_inbound', 14, 'INSERT INTO `i_t_inbound` (`po_no`, `date_in`, `barang_kd`, `jml_in`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''2016-12-07'', ''0001'', ''25'', ''JU001'', ''2016-12-07 11:35:30'', ''1'')', 'update', '{"po_no":"00001","date_in":"2016-12-07","barang_kd":"0001","jml_in":"25","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-07 11:35:30'),
('::1', 1, 'admin', 'i_t_inbound', 15, 'INSERT INTO `i_t_inbound` (`po_no`, `date_in`, `barang_kd`, `jml_in`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''2016-12-07'', ''0002'', ''100'', ''JU001'', ''2016-12-07 11:35:31'', ''1'')', 'update', '{"po_no":"00001","date_in":"2016-12-07","barang_kd":"0002","jml_in":"100","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-07 11:35:31'),
('::1', 1, 'admin', 'i_t_inbound', 16, 'INSERT INTO `i_t_inbound` (`po_no`, `date_in`, `barang_kd`, `jml_in`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''00001'', ''2016-12-07'', ''0001'', ''500'', ''JU001'', ''2016-12-07 11:35:31'', ''1'')', 'update', '{"po_no":"00001","date_in":"2016-12-07","barang_kd":"0001","jml_in":"500","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-07 11:35:31'),
('::1', 1, 'admin', 'i_t_inbound', 17, 'INSERT INTO `i_t_inbound` (`id_inbound`, `po_no`, `date_in`, `barang_kd`, `jml_in`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''000001'', ''00003'', ''2016-12-14'', ''0001'', ''100'', ''JU001'', ''2016-12-08 14:02:08'', ''1'')', 'update', '{"id_inbound":"000001","po_no":"00003","no_ref_vendor":"123454","date_in":"2016-12-14","barang_kd":"0001","jml_in":"100","kd_jns_usaha":"JU001"}', 'admin update i_t_inbound', '2016-12-08 14:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `uri` varchar(200) DEFAULT NULL,
  `id_menu_induk` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `module` varchar(100) DEFAULT NULL,
  `aktif` varchar(50) DEFAULT NULL,
  `postition` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `uri`, `id_menu_induk`, `urutan`, `module`, `aktif`, `postition`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'User Management', 'setting/users', 4, NULL, NULL, 'Y', 'admin-top-left', '2016-11-21 20:25:52', NULL, NULL, NULL, NULL, NULL),
(2, 'User Group', 'setting/users_group', 4, NULL, NULL, 'Y', 'admin-top-left', '2016-11-21 20:26:30', NULL, NULL, NULL, NULL, NULL),
(3, 'Menu Management', 'setting/menu_management', 4, NULL, NULL, 'Y', 'admin-top-left', '2016-11-21 20:26:58', NULL, NULL, NULL, NULL, NULL),
(4, 'For Admin', '#', 0, NULL, NULL, 'Y', 'admin-top-left', '2016-11-21 20:30:47', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_akses`
--

CREATE TABLE IF NOT EXISTS `menu_akses` (
  `id_menu_akses` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_fk` int(11) DEFAULT NULL,
  `id_users_group_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu_akses`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `menu_akses`
--

INSERT INTO `menu_akses` (`id_menu_akses`, `id_menu_fk`, `id_users_group_fk`) VALUES
(4, 4, 1),
(5, 1, 1),
(6, 2, 1),
(7, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_generatenumber`
--

CREATE TABLE IF NOT EXISTS `m_generatenumber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_nomor` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `m_generatenumber`
--

INSERT INTO `m_generatenumber` (`id`, `type_nomor`, `kode`, `count`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'vendor', '00000', 0, 'JU001', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'purchaseorder', '00003', 3, 'JU001', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'payorder', '00006', 6, 'JU001', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_hrm_statuskerja`
--

CREATE TABLE IF NOT EXISTS `m_hrm_statuskerja` (
  `id_statuskerja` int(11) NOT NULL AUTO_INCREMENT,
  `nm_statuskerja` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_statuskerja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `m_hrm_statuskerja`
--


-- --------------------------------------------------------

--
-- Table structure for table `p_m_barang`
--

CREATE TABLE IF NOT EXISTS `p_m_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `p_m_barang`
--

INSERT INTO `p_m_barang` (`id`, `brg_kd`, `brg_nama`, `brg_desc`, `cat_barang_id`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, '0001', 'Product A', 'Product A', 7, 'JU001', '2016-11-25 10:05:11', NULL, NULL, NULL, NULL, NULL),
(2, 'OK', 'kkajjsk Update', 'jsjsjsj', 1, 'JU001', '2016-11-27 12:55:40', NULL, '2016-11-27 12:55:53', NULL, '2016-11-27 12:56:01', 0),
(3, '0002', 'Test Gain', 'Test', 1, 'JU001', '2016-11-28 23:14:15', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_m_cat_barang`
--

CREATE TABLE IF NOT EXISTS `p_m_cat_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_brg_nama` varchar(255) DEFAULT NULL,
  `cat_brg_desc` varchar(255) DEFAULT NULL,
  `cat_brg_parent` int(11) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `p_m_cat_barang`
--

INSERT INTO `p_m_cat_barang` (`id`, `cat_brg_nama`, `cat_brg_desc`, `cat_brg_parent`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'A', 'A', 0, 'JU001', '2016-11-24 09:29:50', NULL, NULL, NULL, NULL, NULL),
(2, 'A.1', 'A.1', 1, 'JU001', '2016-11-24 09:30:08', NULL, NULL, NULL, NULL, NULL),
(3, 'A.2', 'A.2', 1, 'JU001', '2016-11-24 09:30:16', NULL, NULL, NULL, NULL, NULL),
(4, 'A.2', 'A.2', 1, 'JU001', '2016-11-24 09:30:31', NULL, NULL, NULL, NULL, NULL),
(5, 'A.1.a', 'A.1.a', 2, 'JU001', '2016-11-24 09:52:29', NULL, NULL, NULL, NULL, NULL),
(6, 'Buku', 'Buku', 5, 'JU001', '2016-11-24 10:38:24', NULL, NULL, NULL, NULL, NULL),
(7, 'Kertas', 'Kertas', 6, 'JU001', '2016-11-24 10:40:56', NULL, '2016-11-25 09:51:09', NULL, NULL, NULL),
(8, 'asdasd', 'asdasd', 0, 'JU001', '2016-11-27 12:20:16', NULL, '2016-11-27 12:20:35', NULL, '2016-11-27 12:53:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `p_m_satuan`
--

CREATE TABLE IF NOT EXISTS `p_m_satuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan_kd` varchar(5) DEFAULT NULL,
  `satuan_name` varchar(255) DEFAULT NULL,
  `satuan_conv` int(11) DEFAULT NULL,
  `satuan_desc` varchar(255) DEFAULT NULL,
  `kd_jns_usaha` varchar(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `p_m_satuan`
--

INSERT INTO `p_m_satuan` (`id`, `satuan_kd`, `satuan_name`, `satuan_conv`, `satuan_desc`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'PCS', 'PCS', NULL, 'PCS', 'JU001', '2016-11-23 00:39:46', NULL, NULL, NULL, NULL, NULL),
(2, 'OKK', 'OKK', NULL, 'OKK', 'JU001', '2016-11-23 09:32:46', NULL, '2016-11-23 09:40:05', NULL, '2016-11-23 09:40:43', 0),
(3, 'asdas', 'asdasdasdasd Update', NULL, 'asdads', 'JU001', '2016-11-27 12:19:39', NULL, '2016-11-27 12:19:50', NULL, NULL, NULL),
(4, '0001', 'test', NULL, 'test\r\n', 'JU001', '2016-11-28 23:15:26', 0, NULL, NULL, NULL, NULL),
(5, 'asdas', 'asdasd', NULL, 'asdasda', 'JU001', '2016-11-28 23:23:05', 1, NULL, NULL, NULL, NULL),
(6, 'asdas', 'asdasdas', NULL, 'asdasdasd ', 'JU001', '2016-11-28 23:23:34', 1, NULL, NULL, NULL, NULL),
(7, 'Test ', 'okokokok', NULL, '', 'JU001', '2016-11-28 23:23:54', 1, NULL, NULL, NULL, NULL),
(8, 'OKKKK', 'jjjajajaj', NULL, 'hahahahah', 'JU001', '2016-11-28 23:24:35', 1, NULL, NULL, NULL, NULL),
(9, 'Test ', 'Test Malik', NULL, 'Test Malik', 'JU001', '2016-11-28 23:29:10', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_m_status`
--

CREATE TABLE IF NOT EXISTS `p_m_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sts_nama` varchar(255) DEFAULT NULL,
  `sts_desc` varchar(255) DEFAULT NULL,
  `kd_jns_usaha` varchar(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `p_m_status`
--

INSERT INTO `p_m_status` (`id`, `sts_nama`, `sts_desc`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Outstanding', 'Outstanding', 'JU001', '2016-11-20 15:56:36', NULL, NULL, NULL, NULL, NULL),
(2, 'Closed', 'Closed', 'JU001', '2016-11-20 15:56:52', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_m_vendor_supplier`
--

CREATE TABLE IF NOT EXISTS `p_m_vendor_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vend_kd` varchar(5) DEFAULT NULL,
  `vend_name` varchar(255) DEFAULT NULL,
  `vend_alamat` varchar(255) DEFAULT NULL,
  `vend_tlp` varchar(255) DEFAULT NULL,
  `vend_pic` varchar(255) DEFAULT '',
  `kd_jns_usaha` varchar(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `p_m_vendor_supplier`
--

INSERT INTO `p_m_vendor_supplier` (`id`, `vend_kd`, `vend_name`, `vend_alamat`, `vend_tlp`, `vend_pic`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, '00001', 'Test Vendor Update', 'Jakarta', 'Test Vendor', 'Janitra Al Malik', 'JU001', '2016-11-27 20:57:48', NULL, '2016-11-27 20:58:01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_t_po`
--

CREATE TABLE IF NOT EXISTS `p_t_po` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_no` varchar(255) DEFAULT NULL,
  `po_tgl` date DEFAULT NULL,
  `po_tgl_tagihan` date DEFAULT NULL,
  `po_desc` varchar(255) DEFAULT NULL,
  `kd_vendor_supplier` varchar(255) DEFAULT NULL,
  `status_po_id` int(11) DEFAULT NULL,
  `kd_syarat_pembayaran` varchar(255) DEFAULT NULL,
  `po_subtotal` float(18,2) DEFAULT NULL,
  `po_ppn` float(18,2) DEFAULT NULL,
  `po_total` float(18,2) DEFAULT NULL,
  `po_bayar` float(18,2) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `p_t_po`
--

INSERT INTO `p_t_po` (`id`, `po_no`, `po_tgl`, `po_tgl_tagihan`, `po_desc`, `kd_vendor_supplier`, `status_po_id`, `kd_syarat_pembayaran`, `po_subtotal`, `po_ppn`, `po_total`, `po_bayar`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, '00001', '2016-12-05', '2016-12-19', NULL, '00001', 1, '', 195000000.00, 19500000.00, 214500000.00, 100000000.00, 'JU001', '2016-12-05 15:39:49', 1, '2016-12-05 15:41:29', 1, NULL, NULL),
(2, '00002', '2016-12-05', '2016-12-19', NULL, '00001', 2, '', 57200000.00, 5720000.00, 62920000.00, 62920000.00, 'JU001', '2016-12-05 15:40:37', 1, '2016-12-05 16:11:46', 1, NULL, NULL),
(3, '00003', '2016-12-05', '2016-12-19', NULL, '00001', 1, '', 10000000.00, 0.00, 10000000.00, 5000000.00, 'JU001', '2016-12-05 15:41:01', 1, '2016-12-05 15:51:17', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_t_podetail`
--

CREATE TABLE IF NOT EXISTS `p_t_podetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_no` varchar(255) DEFAULT NULL,
  `kd_barang` varchar(255) DEFAULT NULL,
  `kd_satuan` varchar(255) DEFAULT NULL,
  `jml_barang` int(11) DEFAULT NULL,
  `harga_satuan` decimal(18,2) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `status_received` int(11) DEFAULT '1',
  `index` int(255) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `p_t_podetail`
--

INSERT INTO `p_t_podetail` (`id`, `po_no`, `kd_barang`, `kd_satuan`, `jml_barang`, `harga_satuan`, `ppn`, `status_received`, `index`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, '00001', '0001', '1', 25, 5000000.00, 1, 1, 1, 'JU001', '2016-12-05 15:39:49', 1, NULL, NULL, NULL, NULL),
(2, '00001', '0002', '2', 100, 600000.00, 1, 1, 2, 'JU001', '2016-12-05 15:39:49', 1, NULL, NULL, NULL, NULL),
(3, '00001', '0001', '1', 500, 20000.00, 1, 1, 3, 'JU001', '2016-12-05 15:39:50', 1, NULL, NULL, NULL, NULL),
(4, '00002', '0001', '1', 50, 10000.00, 1, 1, 1, 'JU001', '2016-12-05 15:40:38', 1, NULL, NULL, NULL, NULL),
(5, '00002', '0002', '2', 100, 7000.00, 1, 1, 2, 'JU001', '2016-12-05 15:40:38', 1, NULL, NULL, NULL, NULL),
(6, '00002', '0001', '1', 800, 70000.00, 1, 1, 3, 'JU001', '2016-12-05 15:40:38', 1, NULL, NULL, NULL, NULL),
(7, '00003', '0001', '1', 100, 100000.00, 0, 1, 1, 'JU001', '2016-12-05 15:41:01', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_t_po_pembayaran`
--

CREATE TABLE IF NOT EXISTS `p_t_po_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pembayaran_no` varchar(255) DEFAULT NULL,
  `po_no` varchar(255) DEFAULT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `kd_vendor_supplier` varchar(255) DEFAULT NULL,
  `pembayaran_total` float(18,2) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `p_t_po_pembayaran`
--

INSERT INTO `p_t_po_pembayaran` (`id`, `pembayaran_no`, `po_no`, `tgl_bayar`, `kd_vendor_supplier`, `pembayaran_total`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, '00001', '00001', '2016-12-19 00:00:00', '00001', 100000000.00, 'JU001', '2016-12-05 15:41:29', 1, NULL, NULL, NULL, NULL),
(2, '00002', '00003', '2016-12-05 00:00:00', '00001', 5000000.00, 'JU001', '2016-12-05 15:51:17', 1, NULL, NULL, NULL, NULL),
(3, '00003', '00002', '2016-12-05 00:00:00', '00001', 30000000.00, 'JU001', '2016-12-05 16:10:44', 1, NULL, NULL, NULL, NULL),
(4, '00004', '00002', '2016-12-05 00:00:00', '00001', 17000000.00, 'JU001', '2016-12-05 16:11:20', 1, NULL, NULL, NULL, NULL),
(5, '00005', '00002', '2016-12-05 00:00:00', '00001', 5920000.00, 'JU001', '2016-12-05 16:11:37', 1, NULL, NULL, NULL, NULL),
(6, '00006', '00002', '2016-12-05 00:00:00', '00001', 10000000.00, 'JU001', '2016-12-05 16:11:46', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sa_m_customer`
--

CREATE TABLE IF NOT EXISTS `sa_m_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` varchar(20) DEFAULT NULL,
  `cust_nama` varchar(50) DEFAULT NULL,
  `cust_alamat` varchar(250) DEFAULT NULL,
  `cust_hp` varchar(50) DEFAULT NULL,
  `cust_status` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sa_m_customer`
--


-- --------------------------------------------------------

--
-- Table structure for table `sa_t_posdetail`
--

CREATE TABLE IF NOT EXISTS `sa_t_posdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_no` varchar(20) DEFAULT NULL,
  `brg_kd` varchar(20) DEFAULT NULL,
  `qty` double(12,2) DEFAULT NULL,
  `diskon` double(12,2) DEFAULT NULL,
  `total` double(12,2) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sa_t_posdetail`
--


-- --------------------------------------------------------

--
-- Table structure for table `sa_t_posheader`
--

CREATE TABLE IF NOT EXISTS `sa_t_posheader` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_no` varchar(20) DEFAULT NULL,
  `sale_tgl` date DEFAULT NULL,
  `cust_id` varchar(20) DEFAULT NULL,
  `sale_type` varchar(20) DEFAULT NULL,
  `sale_total` double(12,2) DEFAULT NULL,
  `sale_bayar` double(12,2) DEFAULT NULL,
  `kd_jns_usaha` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sa_t_posheader`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users_group_fk` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name_users` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `blockage` varchar(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_users_group_fk`, `username`, `password`, `name_users`, `photo`, `blockage`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'admin', '69b71a9277a813739104769b50574ad9', 'Administrator', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'janitramalik', 'ea59fa85c6f4f65851700ecb7f7a9616', 'Janitra Al Malik', '', 'N', '2016-11-20 21:56:18', NULL, '2016-11-20 22:30:05', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_group`
--

CREATE TABLE IF NOT EXISTS `users_group` (
  `id_users_group` int(11) NOT NULL AUTO_INCREMENT,
  `name_group` varchar(50) DEFAULT NULL,
  `blockage` varchar(2) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_users_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users_group`
--

INSERT INTO `users_group` (`id_users_group`, `name_group`, `blockage`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Root', 'N', NULL, '2016-11-20 14:48:39', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_jns_usaha`
--

CREATE TABLE IF NOT EXISTS `users_jns_usaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `jns_usaha_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users_jns_usaha`
--

INSERT INTO `users_jns_usaha` (`id`, `user_id`, `jns_usaha_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(8, 2, 2),
(9, 2, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_i_inbound_grid`
--
CREATE TABLE IF NOT EXISTS `v_i_inbound_grid` (
`id_inbound` varchar(20)
,`date_in` datetime
,`po_no` varchar(255)
,`brg_nama` varchar(255)
,`jml_in` int(10)
,`refund` int(10)
,`sisa` int(10)
,`kd_jns_usaha` varchar(255)
,`deleted_by` int(11)
,`deleted_at` datetime
,`jml_brg_po` int(11)
);
-- --------------------------------------------------------

--
-- Structure for view `v_i_inbound_grid`
--
DROP TABLE IF EXISTS `v_i_inbound_grid`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_i_inbound_grid` AS select `a`.`id_inbound` AS `id_inbound`,`a`.`date_in` AS `date_in`,`a`.`po_no` AS `po_no`,`b`.`brg_nama` AS `brg_nama`,`a`.`jml_in` AS `jml_in`,`a`.`refund` AS `refund`,`a`.`sisa` AS `sisa`,`a`.`kd_jns_usaha` AS `kd_jns_usaha`,`a`.`deleted_by` AS `deleted_by`,`a`.`deleted_at` AS `deleted_at`,`c`.`jml_barang` AS `jml_brg_po` from ((`i_t_inbound` `a` left join `p_m_barang` `b` on((`a`.`barang_kd` = `b`.`brg_kd`))) left join `p_t_podetail` `c` on(((`c`.`po_no` = `a`.`po_no`) and (`c`.`kd_barang` = `a`.`barang_kd`)))) order by `a`.`date_in`;
