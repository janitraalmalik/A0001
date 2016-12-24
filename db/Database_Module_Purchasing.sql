/*
Navicat MySQL Data Transfer

Source Server         : Malik Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_a001

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-12-16 11:34:45
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_m_barang
-- ----------------------------
INSERT INTO `p_m_barang` VALUES ('1', '0001', 'Product A', 'Product A', '7', 'JU001', '2016-11-25 10:05:11', null, null, null, null, null);
INSERT INTO `p_m_barang` VALUES ('2', 'OK', 'kkajjsk Update', 'jsjsjsj', '1', 'JU001', '2016-11-27 12:55:40', null, '2016-11-27 12:55:53', null, '2016-11-27 12:56:01', '0');
INSERT INTO `p_m_barang` VALUES ('3', '0002', 'Test Gain', 'Test', '1', 'JU001', '2016-11-28 23:14:15', '0', null, null, null, null);

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
  `created_at` datetime DEFAULT NULL,
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
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_m_satuan
-- ----------------------------
INSERT INTO `p_m_satuan` VALUES ('1', 'PCS', 'PCS', null, 'PCS', 'JU001', '2016-11-23 00:39:46', null, null, null, null, null);
INSERT INTO `p_m_satuan` VALUES ('2', 'OKK', 'OKK', null, 'OKK', 'JU001', '2016-11-23 09:32:46', null, '2016-11-23 09:40:05', null, '2016-11-23 09:40:43', '0');
INSERT INTO `p_m_satuan` VALUES ('3', 'asdas', 'asdasdasdasd Update', null, 'asdads', 'JU001', '2016-11-27 12:19:39', null, '2016-11-27 12:19:50', null, null, null);
INSERT INTO `p_m_satuan` VALUES ('4', '0001', 'test', null, 'test\r\n', 'JU001', '2016-11-28 23:15:26', '0', null, null, null, null);
INSERT INTO `p_m_satuan` VALUES ('5', 'asdas', 'asdasd', null, 'asdasda', 'JU001', '2016-11-28 23:23:05', '1', null, null, null, null);
INSERT INTO `p_m_satuan` VALUES ('6', 'asdas', 'asdasdas', null, 'asdasdasd ', 'JU001', '2016-11-28 23:23:34', '1', null, null, null, null);
INSERT INTO `p_m_satuan` VALUES ('7', 'Test ', 'okokokok', null, '', 'JU001', '2016-11-28 23:23:54', '1', null, null, null, null);
INSERT INTO `p_m_satuan` VALUES ('8', 'OKKKK', 'jjjajajaj', null, 'hahahahah', 'JU001', '2016-11-28 23:24:35', '1', null, null, null, null);
INSERT INTO `p_m_satuan` VALUES ('9', 'Test ', 'Test Malik', null, 'Test Malik', 'JU001', '2016-11-28 23:29:10', '1', null, null, null, null);

-- ----------------------------
-- Table structure for p_m_status
-- ----------------------------
DROP TABLE IF EXISTS `p_m_status`;
CREATE TABLE `p_m_status` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_m_status
-- ----------------------------
INSERT INTO `p_m_status` VALUES ('1', 'Outstanding', 'Outstanding', 'JU001', '2016-11-20 15:56:36', null, null, null, null, null);
INSERT INTO `p_m_status` VALUES ('2', 'Closed', 'Closed', 'JU001', '2016-11-20 15:56:52', null, null, null, null, null);

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
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_m_vendor_supplier
-- ----------------------------
INSERT INTO `p_m_vendor_supplier` VALUES ('1', '00001', 'Test Vendor Update', 'Jakarta', 'Test Vendor', 'Janitra Al Malik', 'JU001', '2016-11-27 20:57:48', null, '2016-11-27 20:58:01', null, null, null);

-- ----------------------------
-- Table structure for p_t_po
-- ----------------------------
DROP TABLE IF EXISTS `p_t_po`;
CREATE TABLE `p_t_po` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_t_po
-- ----------------------------
INSERT INTO `p_t_po` VALUES ('1', '00001', '2016-12-05', '2016-12-19', null, '00001', '1', '', '195000000.00', '19500000.00', '214500000.00', '100000000.00', 'JU001', '2016-12-05 15:39:49', '1', '2016-12-05 15:41:29', '1', null, null);
INSERT INTO `p_t_po` VALUES ('2', '00002', '2016-12-05', '2016-12-19', null, '00001', '2', '', '57200000.00', '5720000.00', '62920000.00', '62920000.00', 'JU001', '2016-12-05 15:40:37', '1', '2016-12-05 16:11:46', '1', null, null);
INSERT INTO `p_t_po` VALUES ('3', '00003', '2016-12-05', '2016-12-19', null, '00001', '1', '', '10000000.00', '0.00', '10000000.00', '5000000.00', 'JU001', '2016-12-05 15:41:01', '1', '2016-12-05 15:51:17', '1', null, null);

-- ----------------------------
-- Table structure for p_t_po_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `p_t_po_pembayaran`;
CREATE TABLE `p_t_po_pembayaran` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_t_po_pembayaran
-- ----------------------------
INSERT INTO `p_t_po_pembayaran` VALUES ('1', '00001', '00001', '2016-12-19 00:00:00', '00001', '100000000.00', 'JU001', '2016-12-05 15:41:29', '1', null, null, null, null);
INSERT INTO `p_t_po_pembayaran` VALUES ('2', '00002', '00003', '2016-12-05 00:00:00', '00001', '5000000.00', 'JU001', '2016-12-05 15:51:17', '1', null, null, null, null);
INSERT INTO `p_t_po_pembayaran` VALUES ('3', '00003', '00002', '2016-12-05 00:00:00', '00001', '30000000.00', 'JU001', '2016-12-05 16:10:44', '1', null, null, null, null);
INSERT INTO `p_t_po_pembayaran` VALUES ('4', '00004', '00002', '2016-12-05 00:00:00', '00001', '17000000.00', 'JU001', '2016-12-05 16:11:20', '1', null, null, null, null);
INSERT INTO `p_t_po_pembayaran` VALUES ('5', '00005', '00002', '2016-12-05 00:00:00', '00001', '5920000.00', 'JU001', '2016-12-05 16:11:37', '1', null, null, null, null);
INSERT INTO `p_t_po_pembayaran` VALUES ('6', '00006', '00002', '2016-12-05 00:00:00', '00001', '10000000.00', 'JU001', '2016-12-05 16:11:46', '1', null, null, null, null);

-- ----------------------------
-- Table structure for p_t_podetail
-- ----------------------------
DROP TABLE IF EXISTS `p_t_podetail`;
CREATE TABLE `p_t_podetail` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p_t_podetail
-- ----------------------------
INSERT INTO `p_t_podetail` VALUES ('1', '00001', '0001', '1', '25', '5000000.00', '1', '1', '1', 'JU001', '2016-12-05 15:39:49', '1', null, null, null, null);
INSERT INTO `p_t_podetail` VALUES ('2', '00001', '0002', '2', '100', '600000.00', '1', '1', '2', 'JU001', '2016-12-05 15:39:49', '1', null, null, null, null);
INSERT INTO `p_t_podetail` VALUES ('3', '00001', '0001', '1', '500', '20000.00', '1', '1', '3', 'JU001', '2016-12-05 15:39:50', '1', null, null, null, null);
INSERT INTO `p_t_podetail` VALUES ('4', '00002', '0001', '1', '50', '10000.00', '1', '1', '1', 'JU001', '2016-12-05 15:40:38', '1', null, null, null, null);
INSERT INTO `p_t_podetail` VALUES ('5', '00002', '0002', '2', '100', '7000.00', '1', '1', '2', 'JU001', '2016-12-05 15:40:38', '1', null, null, null, null);
INSERT INTO `p_t_podetail` VALUES ('6', '00002', '0001', '1', '800', '70000.00', '1', '1', '3', 'JU001', '2016-12-05 15:40:38', '1', null, null, null, null);
INSERT INTO `p_t_podetail` VALUES ('7', '00003', '0001', '1', '100', '100000.00', '0', '1', '1', 'JU001', '2016-12-05 15:41:01', '1', null, null, null, null);
