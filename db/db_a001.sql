/*
Navicat MySQL Data Transfer

Source Server         : Malik Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_a001

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-11-27 19:44:34
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
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_satuan', '2', 'INSERT INTO `p_m_satuan` (`satuan_kd`, `satuan_name`, `kd_jns_usaha`, `created_at`) VALUES (\'OKK\', \'OKK\', \'JU001\', \'2016-11-23 09:32:46\')', 'update', '{\"satuan_kd\":\"OKK\",\"satuan_name\":\"OKK\",\"satuan_decs\":\"OKK\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_satuan', '2016-11-23 09:32:46');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_satuan', '2', 'UPDATE `p_m_satuan` SET `satuan_kd` = \'OKK\', `satuan_name` = \'OKK Update\', `satuan_desc` = \'OKK\', `kd_jns_usaha` = \'JU001\', `updated_at` = \'2016-11-23 09:39:56\'\nWHERE `id` = \'2\'', 'update', '{\"satuan_kd\":\"OKK\",\"satuan_name\":\"OKK Update\",\"satuan_desc\":\"OKK\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_satuan', '2016-11-23 09:39:56');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_satuan', '2', 'UPDATE `p_m_satuan` SET `satuan_kd` = \'OKK\', `satuan_name` = \'OKK\', `satuan_desc` = \'OKK\', `kd_jns_usaha` = \'JU001\', `updated_at` = \'2016-11-23 09:40:05\'\nWHERE `id` = \'2\'', 'update', '{\"satuan_kd\":\"OKK\",\"satuan_name\":\"OKK\",\"satuan_desc\":\"OKK\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_satuan', '2016-11-23 09:40:05');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_satuan', '2', 'UPDATE `p_m_satuan` SET `deleted_at` = \'2016-11-23 09:40:13\', `deleted_by` = 0\nWHERE `id` = \'2\'', 'deactive', '{\"id\":\"2\",\"satuan_kd\":\"OKK\",\"satuan_name\":\"OKK\",\"satuan_conv\":null,\"satuan_desc\":\"OKK\",\"kd_jns_usaha\":\"JU001\",\"created_at\":\"2016-11-23 09:32:46\",\"created_by\":null,\"updated_at\":\"2016-11-23 09:40:05\",\"updated_by\":null,\"deleted_at\":\"2016-11-23 09:40:13\",\"deleted_by\":\"0\"}', 'guest deactive p_m_satuan', '2016-11-23 09:40:13');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_satuan', '2', 'UPDATE `p_m_satuan` SET `deleted_at` = \'2016-11-23 09:40:43\', `deleted_by` = 0\nWHERE `id` = \'2\'', 'deactive', '{\"id\":\"2\",\"satuan_kd\":\"OKK\",\"satuan_name\":\"OKK\",\"satuan_conv\":null,\"satuan_desc\":\"OKK\",\"kd_jns_usaha\":\"JU001\",\"created_at\":\"2016-11-23 09:32:46\",\"created_by\":null,\"updated_at\":\"2016-11-23 09:40:05\",\"updated_by\":null,\"deleted_at\":\"2016-11-23 09:40:43\",\"deleted_by\":\"0\"}', 'guest deactive p_m_satuan', '2016-11-23 09:40:43');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_cat_barang', '6', 'INSERT INTO `p_m_cat_barang` (`cat_brg_nama`, `cat_brg_desc`, `cat_brg_parent`, `kd_jns_usaha`, `created_at`) VALUES (\'Buku\', \'Buku\', NULL, \'JU001\', \'2016-11-24 10:38:24\')', 'update', '{\"cat_brg_nama\":\"Buku\",\"cat_brg_desc\":\"Buku\",\"cat_brg_parent\":null,\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_cat_barang', '2016-11-24 10:38:25');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_cat_barang', '7', 'INSERT INTO `p_m_cat_barang` (`cat_brg_nama`, `cat_brg_desc`, `cat_brg_parent`, `kd_jns_usaha`, `created_at`) VALUES (\'Kertas\', \'Kertas\', \'6\', \'JU001\', \'2016-11-24 10:40:56\')', 'update', '{\"cat_brg_nama\":\"Kertas\",\"cat_brg_desc\":\"Kertas\",\"cat_brg_parent\":\"6\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_cat_barang', '2016-11-24 10:40:56');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_cat_barang', '7', 'UPDATE `p_m_cat_barang` SET `cat_brg_nama` = \'Kertas\', `cat_brg_desc` = \'Kertas\', `cat_brg_parent` = \'6\', `kd_jns_usaha` = \'JU001\', `updated_at` = \'2016-11-25 09:50:34\'\nWHERE `id` = \'7\'', 'update', '{\"cat_brg_nama\":\"Kertas\",\"cat_brg_desc\":\"Kertas\",\"cat_brg_parent\":\"6\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_cat_barang', '2016-11-25 09:50:34');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_cat_barang', '7', 'UPDATE `p_m_cat_barang` SET `cat_brg_nama` = \'Kertas Update\', `cat_brg_desc` = \'Kertas\', `cat_brg_parent` = \'6\', `kd_jns_usaha` = \'JU001\', `updated_at` = \'2016-11-25 09:50:47\'\nWHERE `id` = \'7\'', 'update', '{\"cat_brg_nama\":\"Kertas Update\",\"cat_brg_desc\":\"Kertas\",\"cat_brg_parent\":\"6\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_cat_barang', '2016-11-25 09:50:48');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_cat_barang', '7', 'UPDATE `p_m_cat_barang` SET `cat_brg_nama` = \'asdas\', `cat_brg_desc` = \'Kertas\', `cat_brg_parent` = \'6\', `kd_jns_usaha` = \'JU001\', `updated_at` = \'2016-11-25 09:51:02\'\nWHERE `id` = \'7\'', 'update', '{\"cat_brg_nama\":\"asdas\",\"cat_brg_desc\":\"Kertas\",\"cat_brg_parent\":\"6\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_cat_barang', '2016-11-25 09:51:02');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_cat_barang', '7', 'UPDATE `p_m_cat_barang` SET `cat_brg_nama` = \'Kertas\', `cat_brg_desc` = \'Kertas\', `cat_brg_parent` = \'6\', `kd_jns_usaha` = \'JU001\', `updated_at` = \'2016-11-25 09:51:09\'\nWHERE `id` = \'7\'', 'update', '{\"cat_brg_nama\":\"Kertas\",\"cat_brg_desc\":\"Kertas\",\"cat_brg_parent\":\"6\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_cat_barang', '2016-11-25 09:51:09');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_barang', '1', 'INSERT INTO `p_m_barang` (`brg_kd`, `brg_nama`, `brg_desc`, `cat_barang_id`, `kd_jns_usaha`, `created_at`) VALUES (\'0001\', \'Product A\', \'Product A\', \'7\', \'JU001\', \'2016-11-25 10:05:11\')', 'update', '{\"brg_kd\":\"0001\",\"brg_nama\":\"Product A\",\"brg_desc\":\"Product A\",\"cat_barang_id\":\"7\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_barang', '2016-11-25 10:05:11');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_satuan', '3', 'INSERT INTO `p_m_satuan` (`satuan_kd`, `satuan_name`, `satuan_desc`, `kd_jns_usaha`, `created_at`) VALUES (\'asdasd\', \'asdasdasdasd\', \'asdads\', \'JU001\', \'2016-11-27 12:19:39\')', 'update', '{\"satuan_kd\":\"asdasd\",\"satuan_name\":\"asdasdasdasd\",\"satuan_desc\":\"asdads\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_satuan', '2016-11-27 12:19:39');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_satuan', '3', 'UPDATE `p_m_satuan` SET `satuan_kd` = \'asdas\', `satuan_name` = \'asdasdasdasd Update\', `satuan_desc` = \'asdads\', `kd_jns_usaha` = \'JU001\', `updated_at` = \'2016-11-27 12:19:50\'\nWHERE `id` = \'3\'', 'update', '{\"satuan_kd\":\"asdas\",\"satuan_name\":\"asdasdasdasd Update\",\"satuan_desc\":\"asdads\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_satuan', '2016-11-27 12:19:50');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_cat_barang', '8', 'INSERT INTO `p_m_cat_barang` (`cat_brg_nama`, `cat_brg_desc`, `cat_brg_parent`, `kd_jns_usaha`, `created_at`) VALUES (\'asdasd\', \'asdasd\', \'6\', \'JU001\', \'2016-11-27 12:20:16\')', 'update', '{\"cat_brg_nama\":\"asdasd\",\"cat_brg_desc\":\"asdasd\",\"cat_brg_parent\":\"6\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_cat_barang', '2016-11-27 12:20:16');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_cat_barang', '8', 'UPDATE `p_m_cat_barang` SET `cat_brg_nama` = \'asdasd\', `cat_brg_desc` = \'asdasd\', `cat_brg_parent` = \'1\', `kd_jns_usaha` = \'JU001\', `updated_at` = \'2016-11-27 12:20:27\'\nWHERE `id` = \'8\'', 'update', '{\"cat_brg_nama\":\"asdasd\",\"cat_brg_desc\":\"asdasd\",\"cat_brg_parent\":\"1\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_cat_barang', '2016-11-27 12:20:27');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_cat_barang', '8', 'UPDATE `p_m_cat_barang` SET `cat_brg_nama` = \'asdasd\', `cat_brg_desc` = \'asdasd\', `cat_brg_parent` = \'0\', `kd_jns_usaha` = \'JU001\', `updated_at` = \'2016-11-27 12:20:35\'\nWHERE `id` = \'8\'', 'update', '{\"cat_brg_nama\":\"asdasd\",\"cat_brg_desc\":\"asdasd\",\"cat_brg_parent\":\"0\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_cat_barang', '2016-11-27 12:20:35');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_cat_barang', '8', 'UPDATE `p_m_cat_barang` SET `deleted_at` = \'2016-11-27 12:53:47\', `deleted_by` = 0\nWHERE `id` = \'8\'', 'deactive', '{\"id\":\"8\",\"cat_brg_nama\":\"asdasd\",\"cat_brg_desc\":\"asdasd\",\"cat_brg_parent\":\"0\",\"kd_jns_usaha\":\"JU001\",\"created_at\":\"2016-11-27 12:20:16\",\"created_by\":null,\"updated_at\":\"2016-11-27 12:20:35\",\"updated_by\":null,\"deleted_at\":\"2016-11-27 12:53:47\",\"deleted_by\":\"0\"}', 'guest deactive p_m_cat_barang', '2016-11-27 12:53:47');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_barang', '2', 'INSERT INTO `p_m_barang` (`brg_kd`, `brg_nama`, `brg_desc`, `cat_barang_id`, `kd_jns_usaha`, `created_at`) VALUES (\'OK\', \'kkajjsk\', \'jsjsjsj\', \'1\', \'JU001\', \'2016-11-27 12:55:40\')', 'update', '{\"brg_kd\":\"OK\",\"brg_nama\":\"kkajjsk\",\"brg_desc\":\"jsjsjsj\",\"cat_barang_id\":\"1\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_barang', '2016-11-27 12:55:40');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_barang', '2', 'UPDATE `p_m_barang` SET `brg_kd` = \'OK\', `brg_nama` = \'kkajjsk Update\', `brg_desc` = \'jsjsjsj\', `cat_barang_id` = \'1\', `kd_jns_usaha` = \'JU001\', `updated_at` = \'2016-11-27 12:55:53\'\nWHERE `id` = \'2\'', 'update', '{\"brg_kd\":\"OK\",\"brg_nama\":\"kkajjsk Update\",\"brg_desc\":\"jsjsjsj\",\"cat_barang_id\":\"1\",\"kd_jns_usaha\":\"JU001\"}', 'guest update p_m_barang', '2016-11-27 12:55:53');
INSERT INTO `log` VALUES ('::1', null, 'guest', 'p_m_barang', '2', 'UPDATE `p_m_barang` SET `deleted_at` = \'2016-11-27 12:56:01\', `deleted_by` = 0\nWHERE `id` = \'2\'', 'deactive', '{\"id\":\"2\",\"brg_kd\":\"OK\",\"brg_nama\":\"kkajjsk Update\",\"brg_desc\":\"jsjsjsj\",\"cat_barang_id\":\"1\",\"kd_jns_usaha\":\"JU001\",\"created_at\":\"2016-11-27 12:55:40\",\"created_by\":null,\"updated_at\":\"2016-11-27 12:55:53\",\"updated_by\":null,\"deleted_at\":\"2016-11-27 12:56:01\",\"deleted_by\":\"0\"}', 'guest deactive p_m_barang', '2016-11-27 12:56:01');

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
  `cat_barang_id` int(11) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_m_barang
-- ----------------------------
INSERT INTO `p_m_barang` VALUES ('1', '0001', 'Product A', 'Product A', '7', 'JU001', '2016-11-25 10:05:11', null, null, null, null, null);
INSERT INTO `p_m_barang` VALUES ('2', 'OK', 'kkajjsk Update', 'jsjsjsj', '1', 'JU001', '2016-11-27 12:55:40', null, '2016-11-27 12:55:53', null, '2016-11-27 12:56:01', '0');

-- ----------------------------
-- Table structure for p_m_cat_barang
-- ----------------------------
DROP TABLE IF EXISTS `p_m_cat_barang`;
CREATE TABLE `p_m_cat_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_brg_nama` varchar(255) DEFAULT NULL,
  `cat_brg_desc` varchar(255) DEFAULT NULL,
  `cat_brg_parent` int(11) DEFAULT NULL,
  `kd_jns_usaha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_m_cat_barang
-- ----------------------------
INSERT INTO `p_m_cat_barang` VALUES ('1', 'A', 'A', '0', 'JU001', '2016-11-24 09:29:50', null, null, null, null, null);
INSERT INTO `p_m_cat_barang` VALUES ('2', 'A.1', 'A.1', '1', 'JU001', '2016-11-24 09:30:08', null, null, null, null, null);
INSERT INTO `p_m_cat_barang` VALUES ('3', 'A.2', 'A.2', '1', 'JU001', '2016-11-24 09:30:16', null, null, null, null, null);
INSERT INTO `p_m_cat_barang` VALUES ('4', 'A.2', 'A.2', '1', 'JU001', '2016-11-24 09:30:31', null, null, null, null, null);
INSERT INTO `p_m_cat_barang` VALUES ('5', 'A.1.a', 'A.1.a', '2', 'JU001', '2016-11-24 09:52:29', null, null, null, null, null);
INSERT INTO `p_m_cat_barang` VALUES ('6', 'Buku', 'Buku', '5', 'JU001', '2016-11-24 10:38:24', null, null, null, null, null);
INSERT INTO `p_m_cat_barang` VALUES ('7', 'Kertas', 'Kertas', '6', 'JU001', '2016-11-24 10:40:56', null, '2016-11-25 09:51:09', null, null, null);
INSERT INTO `p_m_cat_barang` VALUES ('8', 'asdasd', 'asdasd', '0', 'JU001', '2016-11-27 12:20:16', null, '2016-11-27 12:20:35', null, '2016-11-27 12:53:47', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_m_satuan
-- ----------------------------
INSERT INTO `p_m_satuan` VALUES ('1', 'PCS', 'PCS', null, 'PCS', 'JU001', '2016-11-23 00:39:46', null, null, null, null, null);
INSERT INTO `p_m_satuan` VALUES ('2', 'OKK', 'OKK', null, 'OKK', 'JU001', '2016-11-23 09:32:46', null, '2016-11-23 09:40:05', null, '2016-11-23 09:40:43', '0');
INSERT INTO `p_m_satuan` VALUES ('3', 'asdas', 'asdasdasdasd Update', null, 'asdads', 'JU001', '2016-11-27 12:19:39', null, '2016-11-27 12:19:50', null, null, null);

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
