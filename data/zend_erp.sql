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


/*Table structure for table `tblcustomer` */

DROP TABLE IF EXISTS `tblcustomer`;

CREATE TABLE `tblcustomer` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`category_id` int(10) NOT NULL,
	`type_id` int(10) NOT NULL,
	`owner_name` varchar(50) NOT NULL,
	`company_name` varchar(50) NOT NULL,
	`consignee` varchar(20) NOT NULL,
	`branch` varchar(50) NOT NULL,
	`franchise` varchar(50) NOT NULL,
	`phone` varchar(15) NOT NULL,
	`trade_name` varchar(50) NOT NULL,
	`tin` int(11) NOT NULL,  
  	`website` varchar(50) NOT NULL,
	`email` varchar(50) NOT NULL,
	`credit_allow_id` int(11) NOT NULL,
	`payment_term_id` int(11) NOT NULL,
	`price_type_id` int(11) NOT NULL,
	`se_id` int(11) NOT NULL,
	`status` varchar(50) NOT NULL,
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblproduct` */


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
  `mname` varbinary(50) NOT NULL,
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
