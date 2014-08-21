/*
SQLyog Trial v12.0 (64 bit)
MySQL - 5.6.16 : Database - zend_erp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`zend_erp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `zend_erp`;

/*Table structure for table `tbladdress` */

DROP TABLE IF EXISTS `tbladdress`;

CREATE TABLE `tbladdress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(150) NOT NULL,
  `city_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `zipcode` int(11) NOT NULL,
  PRIMARY KEY (`id`,`city_id`,`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbladdress` */

/*Table structure for table `tblcity` */

DROP TABLE IF EXISTS `tblcity`;

CREATE TABLE `tblcity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `province_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`name`,`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblcity` */

/*Table structure for table `tblcustomer` */

DROP TABLE IF EXISTS `tblcustomer`;

CREATE TABLE `tblcustomer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `trade_name` varchar(50) NOT NULL,
  `consignee` tinyint(1) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tin` int(11) NOT NULL,
  `shipping_mode` int(11) NOT NULL,
  `payment_terms` int(11) NOT NULL,
  `unpaid_invoice` int(11) NOT NULL,
  `credit_limit` float NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblcustomer` */

/*Table structure for table `tblcustomercategory` */

DROP TABLE IF EXISTS `tblcustomercategory`;

CREATE TABLE `tblcustomercategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblcustomercategory` */

/*Table structure for table `tblcustomertype` */

DROP TABLE IF EXISTS `tblcustomertype`;

CREATE TABLE `tblcustomertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblcustomertype` */

/*Table structure for table `tblproduct` */

DROP TABLE IF EXISTS `tblproduct`;

CREATE TABLE `tblproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `description` text,
  `uom` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblproduct` */

/*Table structure for table `tblproducts` */

DROP TABLE IF EXISTS `tblproducts`;

CREATE TABLE `tblproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `description` text,
  `uom` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblproducts` */

/*Table structure for table `tblprovince` */

DROP TABLE IF EXISTS `tblprovince`;

CREATE TABLE `tblprovince` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblprovince` */

/*Table structure for table `tblrole` */

DROP TABLE IF EXISTS `tblrole`;

CREATE TABLE `tblrole` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tblrole` */

insert  into `tblrole`(`id`,`name`) values (1,'Developer'),(2,'Administrator');

/*Table structure for table `tbluser` */

DROP TABLE IF EXISTS `tbluser`;

CREATE TABLE `tbluser` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `key` varchar(25) NOT NULL,
  `secret` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbluser` */

insert  into `tbluser`(`id`,`fname`,`mname`,`lname`,`email`,`role_id`,`key`,`secret`) values (1,'Chito','Alzona','Cascante','chito.cascante@gmail.com',1,'chito','chito123');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
