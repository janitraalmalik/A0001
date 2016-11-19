/*
Navicat MySQL Data Transfer

Source Server         : Malik Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_a001

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-11-19 23:25:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jns_usaha
-- ----------------------------
DROP TABLE IF EXISTS `jns_usaha`;
CREATE TABLE `jns_usaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
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
INSERT INTO `jns_usaha` VALUES ('1', 'ATK', 'Bidang Usaha ATK', '2016-11-19 23:19:17', null, null, null, null, null);
INSERT INTO `jns_usaha` VALUES ('2', 'Air Minum', 'Bidang Usaha Air Minum', '2016-11-19 23:19:39', null, null, null, null, null);

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
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------

-- ----------------------------
-- Table structure for menu_akses
-- ----------------------------
DROP TABLE IF EXISTS `menu_akses`;
CREATE TABLE `menu_akses` (
  `id_menu_akses` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_fk` int(11) DEFAULT NULL,
  `id_users_group_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu_akses
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
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'admin', '69b71a9277a813739104769b50574ad9', 'Administrator', null, 'N', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for users_group
-- ----------------------------
DROP TABLE IF EXISTS `users_group`;
CREATE TABLE `users_group` (
  `id_users_group` int(11) NOT NULL AUTO_INCREMENT,
  `name_group` varchar(50) DEFAULT NULL,
  `blockage` varchar(2) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_users_group`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_group
-- ----------------------------
INSERT INTO `users_group` VALUES ('1', 'Root', 'N', null, null, null, null);

-- ----------------------------
-- Table structure for users_jns_usaha
-- ----------------------------
DROP TABLE IF EXISTS `users_jns_usaha`;
CREATE TABLE `users_jns_usaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `jns_usaha_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_jns_usaha
-- ----------------------------
INSERT INTO `users_jns_usaha` VALUES ('1', '1', '1');
INSERT INTO `users_jns_usaha` VALUES ('2', '1', '2');
