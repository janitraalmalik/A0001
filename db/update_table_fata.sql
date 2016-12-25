/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.1.33-community : Database - db_a001
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_a001` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_a001`;

/*Table structure for table `hr_t_bayar` */

DROP TABLE IF EXISTS `hr_t_bayar`;

CREATE TABLE `hr_t_bayar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `hr_t_bayar` */

insert  into `hr_t_bayar`(`id`,`no_bayar`,`nilai_bayar`,`tgl_bayar`,`id_pinjam`,`keterangan_bayar`,`status`,`kd_jns_usaha`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (1,'20165408061206',1000000.00,'0000-00-00 00:00:00',1,'qwe',1,'JU001','2016-12-08 18:06:54',1,NULL,NULL,NULL,NULL);

/*Table structure for table `hr_t_gaji` */

DROP TABLE IF EXISTS `hr_t_gaji`;

CREATE TABLE `hr_t_gaji` (
  `id` int(11) NOT NULL,
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

/*Data for the table `hr_t_gaji` */

insert  into `hr_t_gaji`(`id`,`nik_kary`,`tgl_gaji`,`nilai_gaji`,`nilai_tunjangan`,`nilai_lembur`,`nilai_pph`,`keterangan_gaji`,`status`,`kd_jns_usaha`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (0,'1','2016-12-30 00:00:00',5.00,60.00,10.00,100.00,'tes',1,'JU001','2016-12-08 17:08:55',1,NULL,NULL,NULL,NULL);

/*Table structure for table `hr_t_pinjam` */

DROP TABLE IF EXISTS `hr_t_pinjam`;

CREATE TABLE `hr_t_pinjam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `hr_t_pinjam` */

insert  into `hr_t_pinjam`(`id`,`nik_kary`,`tgl_pinjam`,`nilai_pinjam`,`frequensi`,`keterangan_pinjam`,`status`,`kd_jns_usaha`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (1,'1','2016-12-30 00:00:00',1000000.00,12,'Test',1,'JU001','2016-12-08 17:36:16',1,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
