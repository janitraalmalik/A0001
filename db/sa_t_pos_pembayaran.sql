/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.1.33-community : Database - a001
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`a001` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `a001`;

/*Table structure for table `sa_t_pos_h_pembayaran` */

DROP TABLE IF EXISTS `sa_t_pos_h_pembayaran`;

CREATE TABLE `sa_t_pos_h_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_no` varchar(20) DEFAULT NULL,
  `nilai_bayar` decimal(16,0) DEFAULT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `sa_t_pos_h_pembayaran` */

insert  into `sa_t_pos_h_pembayaran`(`id`,`sale_no`,`nilai_bayar`,`tgl_bayar`,`created_at`,`created_by`,`deleted_at`,`deleted_by`) values (2,'G00002',1000000,'2016-12-30 00:00:00','2016-12-28 14:21:09','1','2016-12-28 14:28:15','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
