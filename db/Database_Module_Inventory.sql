/*
Navicat MySQL Data Transfer

Source Server         : Malik Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_a001

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-12-08 14:51:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for i_t_inbound
-- ----------------------------
DROP TABLE IF EXISTS `i_t_inbound`;
CREATE TABLE `i_t_inbound` (
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of i_t_inbound
-- ----------------------------
INSERT INTO `i_t_inbound` VALUES ('17', '00001', 'asdda#444', '00001', '2016-12-05 00:00:00', '0001', '25', null, null, 'JU001', '2016-12-08 03:14:25', '1', null, null, null, null);
INSERT INTO `i_t_inbound` VALUES ('18', '00002', 'asdda#444', '00001', '2016-12-05 00:00:00', '0002', '100', null, null, 'JU001', '2016-12-08 03:14:36', '1', null, null, null, null);
INSERT INTO `i_t_inbound` VALUES ('19', '00003', 'asdda#444', '00001', '2016-12-05 00:00:00', 'OK', '500', null, null, 'JU001', '2016-12-08 03:14:37', '1', null, null, null, null);
INSERT INTO `i_t_inbound` VALUES ('20', '00004', '99siiisow', '00012', '2016-12-08 00:00:00', '0002', '12', null, null, 'JU001', '2016-12-08 11:52:00', '1', null, null, null, null);
INSERT INTO `i_t_inbound` VALUES ('21', '00005', '99siiisow', '00012', '2016-12-08 00:00:00', '0001', '22', null, null, 'JU001', '2016-12-08 11:52:05', '1', null, null, null, null);
INSERT INTO `i_t_inbound` VALUES ('22', '00006', 'sdfghjk', '00003', '2016-12-08 00:00:00', '0001', '100', null, null, 'JU001', '2016-12-08 11:53:10', '1', null, null, null, null);
