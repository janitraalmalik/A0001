-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2016 at 12:26 AM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hr_t_pettyclaim`
--

INSERT INTO `hr_t_pettyclaim` (`pettycash_id`, `Type`, `claim_no`, `acc_no`, `acc_curr`, `acc_name`, `claim_date`, `saldo`, `rate`, `debet`, `credit`, `petty_desc`, `status`, `user_`, `datetime`, `status_reimburse`, `sub_claim_no`, `period_s`, `period_e`, `created_at`, `created_by`, `update_at`, `update_by`, `delete_at`, `delete_by`) VALUES
(4, 'OPENING', '', '', NULL, NULL, '2016-12-01', 0.00, NULL, NULL, 10000000.00, 'test', NULL, NULL, NULL, NULL, NULL, '2016-12-01', '2016-12-30', '2016-12-08', 1, NULL, NULL, NULL, NULL),
(5, 'REIMBURSH', '', '', NULL, 'Biaya Operasional', '2016-12-01', NULL, NULL, 2000000.00, NULL, 'ok', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-12-08', 1, NULL, NULL, NULL, NULL);

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
('127.0.0.1', NULL, 'guest', 'hr_m_bagian', 1, 'INSERT INTO `hr_m_bagian` (`nm_bagian`, `kd_jns_usaha`, `created_at`) VALUES (''HRD'', ''JU001'', ''2016-11-27 21:06:51'')', 'update', '{"nm_bagian":"HRD","kd_jns_usaha":"JU001"}', 'guest update hr_m_bagian', '2016-11-27 21:06:51'),
('127.0.0.1', NULL, 'guest', 'hr_m_bagian', 1, 'UPDATE `hr_m_bagian` SET `nm_bagian` = ''Sales'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-11-27 21:08:40''\nWHERE `id` = ''1''', 'update', '{"nm_bagian":"Sales","kd_jns_usaha":"JU001"}', 'guest update hr_m_bagian', '2016-11-27 21:08:40'),
('127.0.0.1', NULL, 'guest', 'hr_m_bagian', 2, 'INSERT INTO `hr_m_bagian` (`nm_bagian`, `kd_jns_usaha`, `created_at`) VALUES (''HRD'', ''JU001'', ''2016-11-27 21:09:16'')', 'update', '{"nm_bagian":"HRD","kd_jns_usaha":"JU001"}', 'guest update hr_m_bagian', '2016-11-27 21:09:16'),
('127.0.0.1', NULL, 'admin', 'p_t_po', 1, 'INSERT INTO `p_t_po` (`kd_jns_usaha`, `created_at`, `created_by`) VALUES (''JU001'', ''2016-12-03 09:55:56'', ''1'')', 'update', '{"vend_kd":"00001","vend_name":"PT.A","vend_alamat":"K","vend_tlp":"094585867845","vend_pic":"Test","kd_jns_usaha":"JU001"}', 'admin update p_t_po', '2016-12-03 09:55:56'),
('127.0.0.1', 1, 'admin', 'hr_m_karyawan', 1, 'INSERT INTO `hr_m_karyawan` (`nik_kary`, `nama_kary`, `alamat_kary`, `sex_kary`, `ktp_kary`, `tgl_lahir_kary`, `tgl_masuk_kary`, `tgl_akhir_kary`, `bagian_kary`, `telp_kary`, `agama_kary`, `status_kerja_kary`, `kd_jns_usaha`, `created_at`, `created_by`) VALUES (''002'', ''Gun'', ''dfdfsf'', ''1'', ''345345435345'', ''2016-12-13'', ''2016-12-28'', ''2016-12-30'', ''1'', ''324234234'', ''1'', ''1'', ''JU001'', ''2016-12-06 23:00:04'', ''1'')', 'update', '{"nik_kary":"002","nama_kary":"Gun","alamat_kary":"dfdfsf","sex_kary":"1","ktp_kary":"345345435345","tgl_lahir_kary":"2016-12-13","tgl_masuk_kary":"2016-12-28","tgl_akhir_kary":"2016-12-30","bagian_kary":"1","telp_kary":"324234234","agama_kary":"1","status_kerja_kary":"1","kd_jns_usaha":"JU001"}', 'admin update hr_m_karyawan', '2016-12-06 23:00:04'),
('127.0.0.1', 1, 'admin', 'hr_m_gaji', 1, 'INSERT INTO `hr_m_gaji` (`id_kary`, `gaji_kary`, `naik_gaji_kary`, `tunjangan_kary`, `pph_kary`, `status`, `created_at`, `kd_jns_usaha`, `created_by`) VALUES (''1'', ''5000000'', ''10000000'', ''60000'', ''100000'', 0, ''2016-12-06 23:28:06'', ''JU001'', ''1'')', 'update', '{"id_kary":"1","gaji_kary":"5000000","naik_gaji_kary":"10000000","tunjangan_kary":"60000","pph_kary":"100000","status":0,"created_at":"2016-12-06 11:28:06","kd_jns_usaha":"JU001"}', 'admin update hr_m_gaji', '2016-12-06 23:28:06'),
('127.0.0.1', 1, 'admin', 'hr_m_gaji', 1, 'UPDATE `hr_m_gaji` SET `id_kary` = ''1'', `gaji_kary` = ''5.000.000'', `naik_gaji_kary` = ''10'', `tunjangan_kary` = ''60'', `pph_kary` = ''100.000'', `status` = 0, `created_at` = ''2016-12-06 11:32:06'', `kd_jns_usaha` = ''JU001'', `updated_at` = ''2016-12-06 23:32:06'', `updated_by` = ''1''\nWHERE `id` = ''1''', 'update', '{"id_kary":"1","gaji_kary":"5.000.000","naik_gaji_kary":"10","tunjangan_kary":"60","pph_kary":"100.000","status":0,"created_at":"2016-12-06 11:32:06","kd_jns_usaha":"JU001"}', 'admin update hr_m_gaji', '2016-12-06 23:32:06'),
('127.0.0.1', 1, 'admin', 'hr_t_pettyclaim', 4, 'INSERT INTO `hr_t_pettyclaim` (`claim_date`, `Type`, `period_s`, `period_e`, `credit`, `saldo`, `petty_desc`, `created_at`, `created_by`) VALUES (''2016-12-01'', ''OPENING'', ''2016-12-01'', ''2016-12-30'', ''10000000'', ''0'', ''test'', ''2016-12-08 10:48:39'', ''1'')', 'update', '{"claim_date":"2016-12-01","Type":"OPENING","period_s":"2016-12-01","period_e":"2016-12-30","credit":"10000000","saldo":"0","petty_desc":"test"}', 'admin update hr_t_pettyclaim', '2016-12-08 10:48:39'),
('127.0.0.1', 1, 'admin', 'hr_t_pettyclaim', 5, 'INSERT INTO `hr_t_pettyclaim` (`claim_date`, `Type`, `acc_name`, `debet`, `petty_desc`, `created_at`, `created_by`) VALUES (''2016-12-01'', ''REIMBURSH'', ''Biaya Operasional'', ''2000000'', ''ok'', ''2016-12-08 10:49:04'', ''1'')', 'update', '{"claim_date":"2016-12-01","Type":"REIMBURSH","acc_name":"Biaya Operasional","debet":"2000000","petty_desc":"ok"}', 'admin update hr_t_pettyclaim', '2016-12-08 10:49:04');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `p_m_barang`
--

INSERT INTO `p_m_barang` (`id`, `brg_kd`, `brg_nama`, `brg_desc`, `cat_barang_id`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, '0001', 'Product A', 'Product A', 7, 'JU001', '2016-11-25 10:05:11', NULL, NULL, NULL, NULL, NULL),
(2, 'OK', 'kkajjsk Update', 'jsjsjsj', 1, 'JU001', '2016-11-27 12:55:40', NULL, '2016-11-27 12:55:53', NULL, '2016-11-27 12:56:01', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `p_m_satuan`
--

INSERT INTO `p_m_satuan` (`id`, `satuan_kd`, `satuan_name`, `satuan_conv`, `satuan_desc`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'PCS', 'PCS', NULL, 'PCS', 'JU001', '2016-11-23 00:39:46', NULL, NULL, NULL, NULL, NULL),
(2, 'OKK', 'OKK', NULL, 'OKK', 'JU001', '2016-11-23 09:32:46', NULL, '2016-11-23 09:40:05', NULL, '2016-11-23 09:40:43', 0),
(3, 'asdas', 'asdasdasdasd Update', NULL, 'asdads', 'JU001', '2016-11-27 12:19:39', NULL, '2016-11-27 12:19:50', NULL, NULL, NULL);

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
(1, 'Outstanding', 'Outstanding', NULL, '2016-11-20 15:56:36', NULL, NULL, NULL, NULL, NULL),
(2, 'Closed', 'Closed', NULL, '2016-11-20 15:56:52', NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `p_m_vendor_supplier`
--


-- --------------------------------------------------------

--
-- Table structure for table `p_t_po`
--

CREATE TABLE IF NOT EXISTS `p_t_po` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_no` varchar(255) DEFAULT NULL,
  `po_tgl` datetime DEFAULT NULL,
  `po_desc` varchar(255) DEFAULT NULL,
  `vendor_supplier` varchar(255) DEFAULT NULL,
  `status_po_id` int(11) DEFAULT NULL,
  `po_tgl_pengeriman` datetime DEFAULT NULL,
  `kd_skm_pembayaran` varchar(255) DEFAULT NULL,
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
-- Dumping data for table `p_t_po`
--

INSERT INTO `p_t_po` (`id`, `po_no`, `po_tgl`, `po_desc`, `vendor_supplier`, `status_po_id`, `po_tgl_pengeriman`, `kd_skm_pembayaran`, `kd_jns_usaha`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JU001', '2016-12-03 09:55:56', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_t_podetail`
--

CREATE TABLE IF NOT EXISTS `p_t_podetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_id` int(11) DEFAULT NULL,
  `kd_barang` varchar(255) DEFAULT NULL,
  `jml_barang` int(11) DEFAULT NULL,
  `harga_satuan` decimal(18,2) DEFAULT NULL,
  `kd_satuan` varchar(255) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `p_t_podetail`
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
