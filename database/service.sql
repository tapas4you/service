/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.17 : Database - service
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`service` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `service`;

/*Table structure for table `animal_type` */

DROP TABLE IF EXISTS `animal_type`;

CREATE TABLE `animal_type` (
  `animal_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `date_added` datetime DEFAULT NULL,
  PRIMARY KEY (`animal_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `animal_type` */

insert  into `animal_type`(`animal_type_id`,`animal_name`,`status`,`date_added`) values (1,'cats','Active',NULL),(2,'Dogs','Active',NULL),(3,'Rabbits','Active',NULL),(4,'Tortoises','Active',NULL),(5,' pet snakes ','Active',NULL);

/*Table structure for table `service` */

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `date_added` datetime DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `service` */

insert  into `service`(`service_id`,`service_name`,`status`,`date_added`) values (1,'Washing','Active','2015-08-18 12:59:38'),(2,'Shampooing','Active','2015-08-19 02:59:50'),(3,'Pedicure','Active','2015-08-19 12:59:58'),(4,'Manicure','Active','2015-08-19 12:00:03'),(5,'Polishing','Active','2015-08-19 12:08:14');

/*Table structure for table `service_type` */

DROP TABLE IF EXISTS `service_type`;

CREATE TABLE `service_type` (
  `animal_service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `animal_type_id` int(11) NOT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `status` enum('Active','Delete') NOT NULL DEFAULT 'Delete',
  PRIMARY KEY (`animal_service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `service_type` */

insert  into `service_type`(`animal_service_id`,`service_id`,`animal_type_id`,`date_added`,`status`) values (1,11,2,'2015-08-19 20:59:43','Delete'),(2,11,3,'2015-08-19 20:56:37','Delete'),(3,11,4,'2015-08-19 20:59:43','Delete'),(4,11,5,'2015-08-19 20:56:37','Delete'),(5,11,9,'2015-08-19 20:56:37','Delete');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `status` enum('Active','Pending') DEFAULT 'Active',
  `date_added` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`user_id`,`first_name`,`last_name`,`email`,`password`,`phone`,`address`,`status`,`date_added`,`date_updated`) values (2,'Tapas','Sahu','tapasranjansahu2011@gmail.com','$2y$10$af59BnTl2zns7d4oNFKI/.qA4asb3.8wrs6MNn7Xep3nuucXOYmr2','9890169081','Dadar','Active','2015-03-26 10:07:25','2015-04-22 09:22:45');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
