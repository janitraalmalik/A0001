/*
Navicat MySQL Data Transfer

Source Server         : Malik Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_a001

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-12-08 14:11:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hr_m_agama
-- ----------------------------
DROP TABLE IF EXISTS `hr_m_agama`;
CREATE TABLE `hr_m_agama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_agama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hr_m_agama
-- ----------------------------
INSERT INTO `hr_m_agama` VALUES ('1', 'Islam');
INSERT INTO `hr_m_agama` VALUES ('2', 'Kristen');
INSERT INTO `hr_m_agama` VALUES ('3', 'Hindu');
INSERT INTO `hr_m_agama` VALUES ('4', 'Budha');

-- ----------------------------
-- Table structure for hr_m_bagian
-- ----------------------------
DROP TABLE IF EXISTS `hr_m_bagian`;
CREATE TABLE `hr_m_bagian` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hr_m_bagian
-- ----------------------------
INSERT INTO `hr_m_bagian` VALUES ('1', 'Sales', 'JU001', '2016-11-27 21:06:51', null, '2016-11-27 21:08:40', null, null, null);
INSERT INTO `hr_m_bagian` VALUES ('2', 'HRD', 'JU001', '2016-11-27 21:09:16', null, null, null, null, null);

-- ----------------------------
-- Table structure for hr_m_gaji
-- ----------------------------
DROP TABLE IF EXISTS `hr_m_gaji`;
CREATE TABLE `hr_m_gaji` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hr_m_gaji
-- ----------------------------
INSERT INTO `hr_m_gaji` VALUES ('1', '1', '5.00', '10.00', '60.00', '100.00', '0', 'JU001', '2016-12-06 11:32:06', '1', '2016-12-06 23:32:06', '1', null, null);

-- ----------------------------
-- Table structure for hr_m_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `hr_m_karyawan`;
CREATE TABLE `hr_m_karyawan` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hr_m_karyawan
-- ----------------------------
INSERT INTO `hr_m_karyawan` VALUES ('1', '002', 'Gun', '2016-12-13 00:00:00', '1', '1', null, '1', '1', '2016-12-28 00:00:00', '2016-12-30 00:00:00', '324234234', '345345435345', 'dfdfsf', null, 'JU001', '2016-12-06 23:00:04', '1', null, null, null, null);

-- ----------------------------
-- Table structure for hr_m_sex
-- ----------------------------
DROP TABLE IF EXISTS `hr_m_sex`;
CREATE TABLE `hr_m_sex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_sex` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hr_m_sex
-- ----------------------------
INSERT INTO `hr_m_sex` VALUES ('1', 'Laki-laki');
INSERT INTO `hr_m_sex` VALUES ('2', 'Perempuan');

-- ----------------------------
-- Table structure for hr_m_statuskary
-- ----------------------------
DROP TABLE IF EXISTS `hr_m_statuskary`;
CREATE TABLE `hr_m_statuskary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_statuskary` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hr_m_statuskary
-- ----------------------------
INSERT INTO `hr_m_statuskary` VALUES ('1', 'Kontrak');
INSERT INTO `hr_m_statuskary` VALUES ('2', 'Tetap');
INSERT INTO `hr_m_statuskary` VALUES ('3', 'Freelance');

-- ----------------------------
-- Table structure for hr_t_absen
-- ----------------------------
DROP TABLE IF EXISTS `hr_t_absen`;
CREATE TABLE `hr_t_absen` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hr_t_absen
-- ----------------------------

-- ----------------------------
-- Table structure for hr_t_bayar
-- ----------------------------
DROP TABLE IF EXISTS `hr_t_bayar`;
CREATE TABLE `hr_t_bayar` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hr_t_bayar
-- ----------------------------

-- ----------------------------
-- Table structure for hr_t_gaji
-- ----------------------------
DROP TABLE IF EXISTS `hr_t_gaji`;
CREATE TABLE `hr_t_gaji` (
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

-- ----------------------------
-- Records of hr_t_gaji
-- ----------------------------

-- ----------------------------
-- Table structure for hr_t_pettyclaim
-- ----------------------------
DROP TABLE IF EXISTS `hr_t_pettyclaim`;
CREATE TABLE `hr_t_pettyclaim` (
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hr_t_pettyclaim
-- ----------------------------

-- ----------------------------
-- Table structure for hr_t_pinjam
-- ----------------------------
DROP TABLE IF EXISTS `hr_t_pinjam`;
CREATE TABLE `hr_t_pinjam` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hr_t_pinjam
-- ----------------------------
