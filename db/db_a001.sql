/*
Navicat MySQL Data Transfer

Source Server         : Malik Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_a001

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-11-21 23:05:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jns_usaha
-- ----------------------------
DROP TABLE IF EXISTS `jns_usaha`;
CREATE TABLE `jns_usaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jns_usaha_kd` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jns_usaha
-- ----------------------------
INSERT INTO `jns_usaha` VALUES ('1', 'JU001', 'ATK', 'Bidang Usaha ATK', '2016-11-19 23:19:17', null, null, null, null, null);
INSERT INTO `jns_usaha` VALUES ('2', 'JU002', 'Air Minum', 'Bidang Usaha Air Minum', '2016-11-19 23:19:39', null, null, null, null, null);

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
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

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES ('::1', null, 'guest', 'users', '2', 'UPDATE `users` SET `username` = \'janitramalik\', `name_users` = \'Janitra Al Malik\', `password` = \'ea59fa85c6f4f65851700ecb7f7a9616\', `id_users_group_fk` = \'1\', `blockage` = \'N\', `updated_at` = \'2016-11-20 22:27:03\'\nWHERE `id` = \'2\'', 'update', '{\"username\":\"janitramalik\",\"name_users\":\"Janitra Al Malik\",\"password\":\"ea59fa85c6f4f65851700ecb7f7a9616\",\"id_users_group_fk\":\"1\",\"blockage\":\"N\"}', 'guest update users', '2016-11-20 22:27:03');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'users', '2', 'UPDATE `users` SET `username` = \'janitramalik\', `name_users` = \'Janitra Al Malik Update\', `password` = \'ea59fa85c6f4f65851700ecb7f7a9616\', `id_users_group_fk` = \'1\', `blockage` = \'N\', `updated_at` = \'2016-11-20 22:27:20\'\nWHERE `id` = \'2\'', 'update', '{\"username\":\"janitramalik\",\"name_users\":\"Janitra Al Malik Update\",\"password\":\"ea59fa85c6f4f65851700ecb7f7a9616\",\"id_users_group_fk\":\"1\",\"blockage\":\"N\"}', 'guest update users', '2016-11-20 22:27:20');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'users', '2', 'UPDATE `users` SET `username` = \'janitramalik\', `name_users` = \'Janitra Al Malik Update\', `password` = \'ea59fa85c6f4f65851700ecb7f7a9616\', `id_users_group_fk` = \'1\', `blockage` = \'N\', `updated_at` = \'2016-11-20 22:29:54\'\nWHERE `id` = \'2\'', 'update', '{\"username\":\"janitramalik\",\"name_users\":\"Janitra Al Malik Update\",\"password\":\"ea59fa85c6f4f65851700ecb7f7a9616\",\"id_users_group_fk\":\"1\",\"blockage\":\"N\"}', 'guest update users', '2016-11-20 22:29:54');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'users', '2', 'UPDATE `users` SET `username` = \'janitramalik\', `name_users` = \'Janitra Al Malik\', `password` = \'ea59fa85c6f4f65851700ecb7f7a9616\', `id_users_group_fk` = \'1\', `blockage` = \'N\', `updated_at` = \'2016-11-20 22:30:05\'\nWHERE `id` = \'2\'', 'update', '{\"username\":\"janitramalik\",\"name_users\":\"Janitra Al Malik\",\"password\":\"ea59fa85c6f4f65851700ecb7f7a9616\",\"id_users_group_fk\":\"1\",\"blockage\":\"N\"}', 'guest update users', '2016-11-20 22:30:05');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `uri` varchar(200) DEFAULT NULL,
  `id_menu_induk` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `module` varchar(100) DEFAULT NULL,
  `aktif` varchar(50) DEFAULT NULL,
  `postition` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', 'User Management', 'setting/users', '4', null, null, 'Y', 'admin-top-left', '2016-11-21 20:25:52', null, null, null, null, null);
INSERT INTO `menu` VALUES ('2', 'User Group', 'setting/users_group', '4', null, null, 'Y', 'admin-top-left', '2016-11-21 20:26:30', null, null, null, null, null);
INSERT INTO `menu` VALUES ('3', 'Menu Management', 'setting/menu_management', '4', null, null, 'Y', 'admin-top-left', '2016-11-21 20:26:58', null, null, null, null, null);
INSERT INTO `menu` VALUES ('4', 'For Admin', '#', '0', null, null, 'Y', 'admin-top-left', '2016-11-21 20:30:47', null, null, null, null, null);

-- ----------------------------
-- Table structure for menu_akses
-- ----------------------------
DROP TABLE IF EXISTS `menu_akses`;
CREATE TABLE `menu_akses` (
  `id_menu_akses` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_fk` int(11) DEFAULT NULL,
  `id_users_group_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu_akses
-- ----------------------------
INSERT INTO `menu_akses` VALUES ('4', '4', '1');
INSERT INTO `menu_akses` VALUES ('5', '1', '1');
INSERT INTO `menu_akses` VALUES ('6', '2', '1');
INSERT INTO `menu_akses` VALUES ('7', '3', '1');

-- ----------------------------
-- Table structure for p_m_barang
-- ----------------------------
DROP TABLE IF EXISTS `p_m_barang`;
CREATE TABLE `p_m_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brg_kd` varchar(255) DEFAULT NULL,
  `brg_nama` varchar(255) DEFAULT NULL,
  `brg_desc` varchar(255) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_m_barang
-- ----------------------------

-- ----------------------------
-- Table structure for p_m_satuan
-- ----------------------------
DROP TABLE IF EXISTS `p_m_satuan`;
CREATE TABLE `p_m_satuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan_kd` varchar(5) DEFAULT NULL,
  `satuan_name` varchar(255) DEFAULT NULL,
  `satuan_conv` int(11) DEFAULT NULL,
  `satuan_desc` varchar(255) DEFAULT NULL,
  `kd_jns_usaha` varchar(5) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_m_satuan
-- ----------------------------

-- ----------------------------
-- Table structure for p_m_status
-- ----------------------------
DROP TABLE IF EXISTS `p_m_status`;
CREATE TABLE `p_m_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sts_nama` varchar(255) DEFAULT NULL,
  `sts_desc` varchar(255) DEFAULT NULL,
  `kd_jns_usaha` varchar(5) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_m_status
-- ----------------------------
INSERT INTO `p_m_status` VALUES ('1', 'Outstanding', 'Outstanding', null, '2016-11-20 15:56:36', null, null, null, null, null);
INSERT INTO `p_m_status` VALUES ('2', 'Closed', 'Closed', null, '2016-11-20 15:56:52', null, null, null, null, null);

-- ----------------------------
-- Table structure for p_m_vendor_supplier
-- ----------------------------
DROP TABLE IF EXISTS `p_m_vendor_supplier`;
CREATE TABLE `p_m_vendor_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vend_kd` varchar(5) DEFAULT NULL,
  `vend_name` varchar(255) DEFAULT NULL,
  `vend_alamat` varchar(255) DEFAULT NULL,
  `vend_tlp` varchar(255) DEFAULT NULL,
  `vend_pic` varchar(255) DEFAULT '',
  `kd_jns_usaha` varchar(5) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_m_vendor_supplier
-- ----------------------------

-- ----------------------------
-- Table structure for p_t_po
-- ----------------------------
DROP TABLE IF EXISTS `p_t_po`;
CREATE TABLE `p_t_po` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_no` varchar(255) DEFAULT NULL,
  `po_tgl` datetime DEFAULT NULL,
  `po_desc` varchar(255) DEFAULT NULL,
  `vendor_supplier` varchar(255) DEFAULT NULL,
  `status_po_id` int(11) DEFAULT NULL,
  `po_tgl_pengeriman` datetime DEFAULT NULL,
  `kd_skm_pembayaran` varchar(255) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_t_po
-- ----------------------------

-- ----------------------------
-- Table structure for p_t_podetail
-- ----------------------------
DROP TABLE IF EXISTS `p_t_podetail`;
CREATE TABLE `p_t_podetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_id` int(11) DEFAULT NULL,
  `kd_barang` varchar(255) DEFAULT NULL,
  `jml_barang` int(11) DEFAULT NULL,
  `harga_satuan` decimal(18,2) DEFAULT NULL,
  `kd_satuan` varchar(255) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_t_podetail
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users_group_fk` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name_users` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `blockage` varchar(1) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'admin', '69b71a9277a813739104769b50574ad9', 'Administrator', null, 'N', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('2', '1', 'janitramalik', 'ea59fa85c6f4f65851700ecb7f7a9616', 'Janitra Al Malik', '', 'N', '2016-11-20 21:56:18', null, '2016-11-20 22:30:05', null, null, null);

-- ----------------------------
-- Table structure for users_group
-- ----------------------------
DROP TABLE IF EXISTS `users_group`;
CREATE TABLE `users_group` (
  `id_users_group` int(11) NOT NULL AUTO_INCREMENT,
  `name_group` varchar(50) DEFAULT NULL,
  `blockage` varchar(2) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_users_group`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_group
-- ----------------------------
INSERT INTO `users_group` VALUES ('1', 'Root', 'N', null, '2016-11-20 14:48:39', null, null, null, null, null);

-- ----------------------------
-- Table structure for users_jns_usaha
-- ----------------------------
DROP TABLE IF EXISTS `users_jns_usaha`;
CREATE TABLE `users_jns_usaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `jns_usaha_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_jns_usaha
-- ----------------------------
INSERT INTO `users_jns_usaha` VALUES ('1', '1', '1');
INSERT INTO `users_jns_usaha` VALUES ('2', '1', '2');
INSERT INTO `users_jns_usaha` VALUES ('8', '2', '2');
INSERT INTO `users_jns_usaha` VALUES ('9', '2', '1');
