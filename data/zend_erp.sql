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
  `street` varchar(250) NOT NULL,
  `city_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `zipcode` int(11) NOT NULL,
  PRIMARY KEY (`id`,`city_id`,`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbladdress` */

/*Table structure for table `tblbrand` */

DROP TABLE IF EXISTS `tblbrand`;

CREATE TABLE `tblbrand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblbrand` */

/*Table structure for table `tblcity` */

DROP TABLE IF EXISTS `tblcity`;

CREATE TABLE `tblcity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `province` int(11) NOT NULL,
  PRIMARY KEY (`id`,`name`,`province`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblcity` */

/*Table structure for table `tblcurrency` */

DROP TABLE IF EXISTS `tblcurrency`;

CREATE TABLE `tblcurrency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblcurrency` */

/*Table structure for table `tblcustomer` */

DROP TABLE IF EXISTS `tblcustomer`;

CREATE TABLE `tblcustomer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `trade_name` varchar(50) DEFAULT NULL,
  `consignee` tinyint(1) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `owner` varchar(150) DEFAULT NULL,
  `contact_person` varchar(150) DEFAULT NULL,
  `tin` int(11) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `shipping_mode` int(11) NOT NULL,
  `payment_terms` int(11) NOT NULL,
  `unpaid_invoice` int(11) NOT NULL,
  `credit_limit` float NOT NULL,
  `billing_address_id` int(11) DEFAULT NULL,
  `shipping_address_id` int(11) DEFAULT NULL,
  `sales_executive` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tblcustomer` */

insert  into `tblcustomer`(`id`,`category`,`type`,`name`,`trade_name`,`consignee`,`phone`,`email`,`owner`,`contact_person`,`tin`,`website`,`shipping_mode`,`payment_terms`,`unpaid_invoice`,`credit_limit`,`billing_address_id`,`shipping_address_id`,`sales_executive`,`status`) values (1,1,1,'chito',NULL,0,'',NULL,NULL,NULL,NULL,NULL,0,0,0,0,NULL,NULL,NULL,0);

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

/*Table structure for table `tblerpstatus` */

DROP TABLE IF EXISTS `tblerpstatus`;

CREATE TABLE `tblerpstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`name`,`category`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tblerpstatus` */

insert  into `tblerpstatus`(`id`,`name`,`category`) values (1,'Active','User'),(2,'Inactive','User'),(3,'Suspend','User'),(4,'Delete','User');

/*Table structure for table `tblpaymenttems` */

DROP TABLE IF EXISTS `tblpaymenttems`;

CREATE TABLE `tblpaymenttems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblpaymenttems` */

/*Table structure for table `tblproduct` */

DROP TABLE IF EXISTS `tblproduct`;

CREATE TABLE `tblproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(11) NOT NULL,
  `supplier_code` varchar(100) DEFAULT NULL,
  `bl_code` varchar(100) DEFAULT NULL,
  `print_code` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `brand` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `uom` int(11) NOT NULL,
  `color` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `weight` varchar(100) DEFAULT NULL,
  `supplier` int(11) NOT NULL,
  `international_cost` float DEFAULT NULL,
  `purchase_cost` float DEFAULT NULL,
  `currency` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblproduct` */

/*Table structure for table `tblproductcategory` */

DROP TABLE IF EXISTS `tblproductcategory`;

CREATE TABLE `tblproductcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblproductcategory` */

/*Table structure for table `tblproductsubcategory` */

DROP TABLE IF EXISTS `tblproductsubcategory`;

CREATE TABLE `tblproductsubcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblproductsubcategory` */

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tblrole` */

insert  into `tblrole`(`id`,`name`) values (1,'Developer'),(2,'Administrator'),(3,'Accountant');

/*Table structure for table `tblsales` */

DROP TABLE IF EXISTS `tblsales`;

CREATE TABLE `tblsales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sono` varchar(50) DEFAULT NULL,
  `customer` int(11) NOT NULL,
  `transtype` int(11) NOT NULL,
  `shipto` int(11) NOT NULL,
  `billto` int(11) NOT NULL,
  `ordersrc` int(11) DEFAULT NULL,
  `se` int(11) DEFAULT NULL,
  `sm` varchar(100) DEFAULT NULL,
  `terms` int(11) DEFAULT NULL,
  `pono` varchar(100) DEFAULT NULL,
  `prefdeldate` varchar(100) DEFAULT NULL,
  `orderedby` varchar(100) DEFAULT NULL,
  `actdeldate` varchar(100) DEFAULT NULL,
  `notes` text,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tblsales` */

insert  into `tblsales`(`id`,`sono`,`customer`,`transtype`,`shipto`,`billto`,`ordersrc`,`se`,`sm`,`terms`,`pono`,`prefdeldate`,`orderedby`,`actdeldate`,`notes`,`status`) values (1,'1233',1,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tblsupplier` */

DROP TABLE IF EXISTS `tblsupplier`;

CREATE TABLE `tblsupplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblsupplier` */

/*Table structure for table `tbltransactiontype` */

DROP TABLE IF EXISTS `tbltransactiontype`;

CREATE TABLE `tbltransactiontype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbltransactiontype` */

/*Table structure for table `tbluom` */

DROP TABLE IF EXISTS `tbluom`;

CREATE TABLE `tbluom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbluom` */

/*Table structure for table `tbluser` */

DROP TABLE IF EXISTS `tbluser`;

CREATE TABLE `tbluser` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `secret` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbluser` */

insert  into `tbluser`(`id`,`fname`,`mname`,`lname`,`email`,`role`,`username`,`secret`,`status`) values (1,'Chito','Alzona','Cascante','chito.cascante@gmail.com',1,'chito','chito123',NULL),(2,'ace','baliw','tanga','ace@tanga.com',1,'tanga','12345678',NULL),(3,'aces','baliw','tanga','ace@tanga.com',1,'tanga','12345678',NULL),(4,'ac1212212','baliw','tanga','ace@tanga.com',1,'tanga','',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
