/*
SQLyog Professional v12.09 (64 bit)
MySQL - 8.0.17 : Database - hldx
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hldx` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `hldx`;

/*Table structure for table `manager` */

DROP TABLE IF EXISTS `manager`;

CREATE TABLE `manager` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id序列号',
  `name` varchar(20) NOT NULL COMMENT '名字',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `status` varchar(20) NOT NULL COMMENT '职位',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `manager` */

INSERT INTO `manager`(`uid`,`name`,`password`,`status`) values (1,'王佐','123456','all'),(2,'伟霆','123456','all'),(4,'广州','123456','all'),(5,'用户名','123456','repair'),(6,'root','111111','reviewer'),(8,'admin','123456','repair');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `name` varchar(20) NOT NULL COMMENT '名字',
  `ss` varchar(20) NOT NULL COMMENT '宿舍号',
  `wx` varchar(30) DEFAULT NULL COMMENT '微信',
  `phone` varchar(20) DEFAULT NULL COMMENT '手机',
  `pro` varchar(100) NOT NULL COMMENT '问题描述',
  `time` timestamp NOT NULL COMMENT '报修时间',
  `num` int(10) NOT NULL AUTO_INCREMENT COMMENT '单号',
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '状态',
  `repair` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '维修人员',
  `reviewer` varchar(20) DEFAULT NULL COMMENT '审核人员',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `message` */

insert  into `message`(`name`,`ss`,`wx`,`phone`,`pro`,`time`,`num`,`status`,`repair`,`reviewer`) values ('wz','a','dsad','144','第五14','2020-09-09 22:23:16',3,'已完成','admin','root'),('csd','cc','cc','123','cc','2020-09-13 09:09:23',4,'无效','王佐','root'),('cc','xx','xxx','233','xx','2020-09-13 09:17:30',5,'维修中','admin','root'),('卧槽','xx','zz','123','asd','2020-09-13 10:14:48',6,'待维修','root','root'),('微信','zz','zz','4123','cc','2020-09-13 10:15:18',7,'无效','王佐','王佐'),('广州','asd','dsad','1444','敖德萨','2020-09-13 10:59:52',8,'待审核','root','root'),('admin','asd','wx','1444','dasd','2020-09-15 11:09:46',9,'待审核','王佐','王佐'),('final','wx','wx','134','微信','2020-09-18 15:17:45',10,'无效','','王佐'),('用户名','a','wx','dasd','啊多少','2020-09-27 09:34:51',11,'待维修','','root'),('前打完群二切尔奇二','企鹅','奥术大师','15813754249','sad','2020-10-19 17:35:10',14,'无效','','王佐'),('城市','差','安稳','15813754249','asd','2020-10-28 23:03:31',15,'待审核','','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
