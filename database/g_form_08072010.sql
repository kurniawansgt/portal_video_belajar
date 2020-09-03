/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.1.36-community-log : Database - g_form
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `dashboard_user` */

CREATE TABLE `dashboard_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `graph_query_id` varchar(5) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `dashboard_user` */

/*Table structure for table `graph_model` */

CREATE TABLE `graph_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `xaxiscategories` text,
  `xaxistitle` varchar(255) DEFAULT NULL,
  `yaxistitle` varchar(255) DEFAULT NULL,
  `tooltips` varchar(255) DEFAULT NULL,
  `series` text,
  `entrytime` timestamp NULL DEFAULT NULL,
  `entryuser` varchar(255) DEFAULT NULL,
  `entryip` varchar(255) DEFAULT NULL,
  `updatetime` timestamp NULL DEFAULT NULL,
  `updateuser` varchar(255) DEFAULT NULL,
  `updateip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `graph_model` */

insert  into `graph_model`(`id`,`type`,`name`,`filename`,`description`,`title`,`subtitle`,`xaxiscategories`,`xaxistitle`,`yaxistitle`,`tooltips`,`series`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (1,'area','areabasic','areabasic','Area','Historic and Estimated Worldwide Population Growth by Region','Source: Wikipedia.org','\'1750\', \'1800\', \'1850\', \'1900\', \'1950\', \'1999\', \'2050\'','Test','Billions',' millions','\r\n[{\r\n                name: \'Asia\',\r\n                data: [502, 635, 809, 947, 1402, 3634, 5268]\r\n            }, {\r\n                name: \'Africa\',\r\n                data: [106, 107, 111, 133, 221, 767, 1766]\r\n            }, {\r\n                name: \'Europe\',\r\n                data: [163, 203, 276, 408, 547, 729, 628]\r\n            }, {\r\n                name: \'America\',\r\n                data: [18, 31, 54, 156, 339, 818, 1201]\r\n            }, {\r\n                name: \'Oceania\',\r\n                data: [2, 2, 2, 6, 13, 30, 46]\r\n            }]\r\n            ',NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `graph_model`(`id`,`type`,`name`,`filename`,`description`,`title`,`subtitle`,`xaxiscategories`,`xaxistitle`,`yaxistitle`,`tooltips`,`series`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (2,'area','areastacked','areastacked','Stacked Area','Historic and Estimated Worldwide Population Growth by Region','Source: Wikipedia.org','\'1750\', \'1800\', \'1850\', \'1900\', \'1950\', \'1999\', \'2050\'','Test','Billions',' millions','\r\n[{\r\n                name: \'Asia\',\r\n                data: [502, 635, 809, 947, 1402, 3634, 5268]\r\n            }, {\r\n                name: \'Africa\',\r\n                data: [106, 107, 111, 133, 221, 767, 1766]\r\n            }, {\r\n                name: \'Europe\',\r\n                data: [163, 203, 276, 408, 547, 729, 628]\r\n            }, {\r\n                name: \'America\',\r\n                data: [18, 31, 54, 156, 339, 818, 1201]\r\n            }, {\r\n                name: \'Oceania\',\r\n                data: [2, 2, 2, 6, 13, 30, 46]\r\n            }]\r\n            ',NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `graph_model`(`id`,`type`,`name`,`filename`,`description`,`title`,`subtitle`,`xaxiscategories`,`xaxistitle`,`yaxistitle`,`tooltips`,`series`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (3,'bar','barbasic','barbasic','Bar','Historic and Estimated Worldwide Population Growth by Region','Source: Wikipedia.org','\'1750\', \'1800\', \'1850\', \'1900\', \'1950\', \'1999\', \'2050\'','Test','Billions',' millions','\r\n[{\r\n                name: \'Asia\',\r\n                data: [502, 635, 809, 947, 1402, 3634, 5268]\r\n            }, {\r\n                name: \'Africa\',\r\n                data: [106, 107, 111, 133, 221, 767, 1766]\r\n            }, {\r\n                name: \'Europe\',\r\n                data: [163, 203, 276, 408, 547, 729, 628]\r\n            }, {\r\n                name: \'America\',\r\n                data: [18, 31, 54, 156, 339, 818, 1201]\r\n            }, {\r\n                name: \'Oceania\',\r\n                data: [2, 2, 2, 6, 13, 30, 46]\r\n            }]\r\n            ',NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `graph_model`(`id`,`type`,`name`,`filename`,`description`,`title`,`subtitle`,`xaxiscategories`,`xaxistitle`,`yaxistitle`,`tooltips`,`series`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (4,'bar','barstacked','barstacked','Bar Stacked','Historic and Estimated Worldwide Population Growth by Region','Source: Wikipedia.org','\'1750\', \'1800\', \'1850\', \'1900\', \'1950\', \'1999\', \'2050\'','Test','Billions',' millions','\r\n[{\r\n                name: \'Asia\',\r\n                data: [502, 635, 809, 947, 1402, 3634, 5268]\r\n            }, {\r\n                name: \'Africa\',\r\n                data: [106, 107, 111, 133, 221, 767, 1766]\r\n            }, {\r\n                name: \'Europe\',\r\n                data: [163, 203, 276, 408, 547, 729, 628]\r\n            }, {\r\n                name: \'America\',\r\n                data: [18, 31, 54, 156, 339, 818, 1201]\r\n            }, {\r\n                name: \'Oceania\',\r\n                data: [2, 2, 2, 6, 13, 30, 46]\r\n            }]\r\n            ',NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `graph_model`(`id`,`type`,`name`,`filename`,`description`,`title`,`subtitle`,`xaxiscategories`,`xaxistitle`,`yaxistitle`,`tooltips`,`series`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (5,'column','columnbasic','columnbasic','Bar Column','Historic and Estimated Worldwide Population Growth by Region','Source: Wikipedia.org','\'1750\', \'1800\', \'1850\', \'1900\', \'1950\', \'1999\', \'2050\'','Test','Billions',' millions','\r\n[{\r\n                name: \'Asia\',\r\n                data: [502, 635, 809, 947, 1402, 3634, 5268]\r\n            }, {\r\n                name: \'Africa\',\r\n                data: [106, 107, 111, 133, 221, 767, 1766]\r\n            }, {\r\n                name: \'Europe\',\r\n                data: [163, 203, 276, 408, 547, 729, 628]\r\n            }, {\r\n                name: \'America\',\r\n                data: [18, 31, 54, 156, 339, 818, 1201]\r\n            }, {\r\n                name: \'Oceania\',\r\n                data: [2, 2, 2, 6, 13, 30, 46]\r\n            }]\r\n            ',NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `graph_model`(`id`,`type`,`name`,`filename`,`description`,`title`,`subtitle`,`xaxiscategories`,`xaxistitle`,`yaxistitle`,`tooltips`,`series`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (6,'column','columnstacked','columnstacked','Column Staced','Historic and Estimated Worldwide Population Growth by Region','Source: Wikipedia.org','\'1750\', \'1800\', \'1850\', \'1900\', \'1950\', \'1999\', \'2050\'','Test','Billions',' millions','\r\n[{\r\n                name: \'Asia\',\r\n                data: [502, 635, 809, 947, 1402, 3634, 5268]\r\n            }, {\r\n                name: \'Africa\',\r\n                data: [106, 107, 111, 133, 221, 767, 1766]\r\n            }, {\r\n                name: \'Europe\',\r\n                data: [163, 203, 276, 408, 547, 729, 628]\r\n            }, {\r\n                name: \'America\',\r\n                data: [18, 31, 54, 156, 339, 818, 1201]\r\n            }, {\r\n                name: \'Oceania\',\r\n                data: [2, 2, 2, 6, 13, 30, 46]\r\n            }]\r\n            ',NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `graph_model`(`id`,`type`,`name`,`filename`,`description`,`title`,`subtitle`,`xaxiscategories`,`xaxistitle`,`yaxistitle`,`tooltips`,`series`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (7,'line','linebasic','linebasic','Line','Browser market shares at a specific website, 2010','Source: Wikipedia.org','\'1750\', \'1800\', \'1850\', \'1900\', \'1950\', \'1999\', \'2050\'','Test','Percentage',' millions','\r\n[{\r\n                name: \'Asia\',\r\n                data: [502, 635, 809, 947, 1402, 3634, 5268]\r\n            }, {\r\n                name: \'Africa\',\r\n                data: [106, 107, 111, 133, 221, 767, 1766]\r\n            }, {\r\n                name: \'Europe\',\r\n                data: [163, 203, 276, 408, 547, 729, 628]\r\n            }, {\r\n                name: \'America\',\r\n                data: [18, 31, 54, 156, 339, 818, 1201]\r\n            }, {\r\n                name: \'Oceania\',\r\n                data: [2, 2, 2, 6, 13, 30, 46]\r\n            }]\r\n            ',NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `graph_model`(`id`,`type`,`name`,`filename`,`description`,`title`,`subtitle`,`xaxiscategories`,`xaxistitle`,`yaxistitle`,`tooltips`,`series`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (8,'pie','piebasic','piebasic','Pie','Browser market shares at a specific website, 2010','Source: Wikipedia.org',NULL,'Test','Percentage','{series.name}: <b>{point.percentage}%</b>','[{\r\ntype: \'pie\',\r\nname: \'Delapan\',\r\ndata : [\r\n[\'area\', 33 ],\r\n[\'bar\', 52 ],\r\n[\'column\', 63 ],\r\n[\'line\', 55 ],\r\n[\'pie\', 88 ]\r\n]\r\n\r\n}]\r\n',NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `graph_model`(`id`,`type`,`name`,`filename`,`description`,`title`,`subtitle`,`xaxiscategories`,`xaxistitle`,`yaxistitle`,`tooltips`,`series`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (9,'table','table','table','Table Model','Browser market shares at a specific website, 2010','Source: Wikipedia.org','SELECT c.prod_name,(SUM(a.prod_quantity)) AS quantity\r\nFROM product_transaction a\r\nINNER JOIN transaction_log b ON a.trans_number = b.trans_number \r\nINNER JOIN master_product c ON a.prod_number = c.prod_number\r\nWHERE b.trans_type_id IN (1,6) \r\nAND (YEAR(b.trans_date) =  \'2015\') \r\nGROUP BY a.prod_number\r\nORDER BY SUM(a.prod_quantity) DESC\r\nLIMIT 10','Test','Percentage',' millions',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `graph_query` */

CREATE TABLE `graph_query` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_graph_model` int(11) DEFAULT NULL,
  `group_code` varchar(200) DEFAULT NULL,
  `query` text,
  `crosstab` int(11) DEFAULT '0',
  `tabletemp` varchar(200) DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL,
  `timing` int(11) DEFAULT '0',
  `month` int(11) DEFAULT '0',
  `year` int(11) DEFAULT '0',
  `Title` varchar(255) DEFAULT NULL,
  `SubTitle` varchar(255) DEFAULT NULL,
  `xaxistitle` varchar(255) DEFAULT NULL,
  `yaxistitle` varchar(255) DEFAULT NULL,
  `tooltips` varchar(255) DEFAULT NULL,
  `querytable` text,
  `querytable2` text,
  `entrytime` timestamp NULL DEFAULT NULL,
  `entryuser` varchar(255) DEFAULT NULL,
  `entryip` varchar(255) DEFAULT NULL,
  `updatetime` timestamp NULL DEFAULT NULL,
  `updateuser` varchar(255) DEFAULT NULL,
  `updateip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `graph_query` */

insert  into `graph_query`(`id`,`id_graph_model`,`group_code`,`query`,`crosstab`,`tabletemp`,`lastupdate`,`timing`,`month`,`year`,`Title`,`SubTitle`,`xaxistitle`,`yaxistitle`,`tooltips`,`querytable`,`querytable2`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (1,7,NULL,'SELECT \'customer\', 10 a,20 b',0,'temp_customer_growth','2016-03-07 08:00:04',43200,0,0,'Customer Growth','Per Year','posisi','Jumlah Dalam Ribuan','',NULL,NULL,NULL,'','','2015-10-20 07:59:13','windu','::1');

/*Table structure for table `initial_company` */

CREATE TABLE `initial_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `database_name` varchar(200) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `bgfile` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `initial_company` */

insert  into `initial_company`(`id`,`company_name`,`username`,`database_name`,`logo`,`bgfile`) values (1,'Data Integration','admin','g_form','','');

/*Table structure for table `m_url_gform` */

CREATE TABLE `m_url_gform` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(200) DEFAULT NULL,
  `url_gform_response` text,
  `user_id` varchar(200) DEFAULT NULL,
  `active` enum('0','1') DEFAULT '1',
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `m_url_gform` */

insert  into `m_url_gform`(`id`,`nama_dokumen`,`url_gform_response`,`user_id`,`active`,`created_date`,`updated_date`,`ip_address`) values (1,'Registrasi Santri Baru Griya Ceria','https://docs.google.com/spreadsheets/d/e/2PACX-1vRrZ2-7qBuSHLq0AfyRxLvv1n_goDK-y6FA_OR_b0EKFi3X4n0R1BlyKqCOU_27zmxHyMRtU5CsHzbf/pub?output=csv','skurniawan','1','2020-07-09 06:38:32','2020-07-09 06:38:32','127.0.0.1');
insert  into `m_url_gform`(`id`,`nama_dokumen`,`url_gform_response`,`user_id`,`active`,`created_date`,`updated_date`,`ip_address`) values (2,'Registrasi Peserta Seminar Teknologi','https://docs.google.com/spreadsheets/d/e/2PACX-1vQmJMQDfjU6znOs0TBjw1bH-RwHeSjM3m7Qf_5jaff7Xvc6Dauy9ZbxTwIqO1491HsrFEFCUuvuT-VJ/pub?output=csv','spratiwi','1','2020-07-09 06:51:36','2020-07-09 06:51:36','127.0.0.1');

/*Table structure for table `master_department` */

CREATE TABLE `master_department` (
  `departmentid` varchar(2) NOT NULL,
  `description` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`departmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `master_department` */

/*Table structure for table `master_group` */

CREATE TABLE `master_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupcode` varchar(20) NOT NULL DEFAULT '',
  `description` varchar(20) DEFAULT NULL,
  `entrytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entryuser` varchar(255) DEFAULT NULL,
  `entryip` varchar(255) DEFAULT NULL,
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateuser` varchar(255) DEFAULT NULL,
  `updateip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`groupcode`),
  UNIQUE KEY `idxMasterGroup` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `master_group` */

insert  into `master_group`(`id`,`groupcode`,`description`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (1,'Admin','Ini Admin','2015-06-20 01:10:06','','','2015-06-20 00:10:30','windu','::1');
insert  into `master_group`(`id`,`groupcode`,`description`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (2,'Pengajar','Pengajar Sekolah','2020-07-08 15:16:20','admin','127.0.0.1','2020-07-08 15:16:20','admin','127.0.0.1');

/*Table structure for table `master_group_detail` */

CREATE TABLE `master_group_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupcode` varchar(20) DEFAULT NULL,
  `module` varchar(50) DEFAULT NULL,
  `read` int(1) DEFAULT '0',
  `confirm` int(1) DEFAULT '0',
  `entry` int(1) DEFAULT '0',
  `update` int(1) DEFAULT '0',
  `delete` int(1) DEFAULT '0',
  `print` int(1) DEFAULT '0',
  `export` int(1) DEFAULT '0',
  `import` int(1) DEFAULT '0',
  `entrytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entryuser` varchar(255) DEFAULT NULL,
  `entryip` varchar(255) DEFAULT NULL,
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateuser` varchar(255) DEFAULT NULL,
  `updateip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `idxGroupModule` (`groupcode`,`module`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `master_group_detail` */

insert  into `master_group_detail`(`id`,`groupcode`,`module`,`read`,`confirm`,`entry`,`update`,`delete`,`print`,`export`,`import`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (24,'Pengajar','GRAB_DATA_GFORM',1,1,1,1,1,1,1,1,'2020-07-08 15:22:57','admin','127.0.0.1','2020-07-08 15:22:57','admin','127.0.0.1');
insert  into `master_group_detail`(`id`,`groupcode`,`module`,`read`,`confirm`,`entry`,`update`,`delete`,`print`,`export`,`import`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (22,'Pengajar','MASTER_MODULE',0,0,0,0,0,0,0,0,'2020-07-08 15:22:57','admin','127.0.0.1','2020-07-08 15:22:57','admin','127.0.0.1');
insert  into `master_group_detail`(`id`,`groupcode`,`module`,`read`,`confirm`,`entry`,`update`,`delete`,`print`,`export`,`import`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (23,'Pengajar','GRAPH_QUERY',0,0,0,0,0,0,0,0,'2020-07-08 15:22:57','admin','127.0.0.1','2020-07-08 15:22:57','admin','127.0.0.1');
insert  into `master_group_detail`(`id`,`groupcode`,`module`,`read`,`confirm`,`entry`,`update`,`delete`,`print`,`export`,`import`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (21,'Pengajar','MASTER_GROUP',0,0,0,0,0,0,0,0,'2020-07-08 15:22:57','admin','127.0.0.1','2020-07-08 15:22:57','admin','127.0.0.1');
insert  into `master_group_detail`(`id`,`groupcode`,`module`,`read`,`confirm`,`entry`,`update`,`delete`,`print`,`export`,`import`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (20,'Pengajar','MASTER_USER',0,0,0,0,0,0,0,0,'2020-07-08 15:22:57','admin','127.0.0.1','2020-07-08 15:22:57','admin','127.0.0.1');
insert  into `master_group_detail`(`id`,`groupcode`,`module`,`read`,`confirm`,`entry`,`update`,`delete`,`print`,`export`,`import`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (19,'Pengajar','REPORT',1,0,0,0,0,0,0,0,'2020-07-08 15:22:57','admin','127.0.0.1','2020-07-08 15:22:57','admin','127.0.0.1');
insert  into `master_group_detail`(`id`,`groupcode`,`module`,`read`,`confirm`,`entry`,`update`,`delete`,`print`,`export`,`import`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (18,'Pengajar','ADMIN',0,0,0,0,0,0,0,0,'2020-07-08 15:22:57','admin','127.0.0.1','2020-07-08 15:22:57','admin','127.0.0.1');
insert  into `master_group_detail`(`id`,`groupcode`,`module`,`read`,`confirm`,`entry`,`update`,`delete`,`print`,`export`,`import`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (17,'Pengajar','DASHBOARD',0,0,0,0,0,0,0,0,'2020-07-08 15:22:57','admin','127.0.0.1','2020-07-08 15:22:57','admin','127.0.0.1');

/*Table structure for table `master_module` */

CREATE TABLE `master_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL,
  `descriptionhead` varchar(800) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `classcolour` varchar(255) DEFAULT NULL,
  `onclick` text,
  `onclicksubmenu` text,
  `parentid` int(11) DEFAULT NULL,
  `public` int(11) DEFAULT '0',
  `entrytime` timestamp NULL DEFAULT NULL,
  `entryuser` varchar(255) DEFAULT NULL,
  `entryip` varchar(255) DEFAULT NULL,
  `updatetime` timestamp NULL DEFAULT NULL,
  `updateuser` varchar(255) DEFAULT NULL,
  `updateip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `master_module` */

insert  into `master_module`(`id`,`module`,`descriptionhead`,`description`,`picture`,`classcolour`,`onclick`,`onclicksubmenu`,`parentid`,`public`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (1,'DASHBOARD','<a href=\"#\" onclick=\"showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=1\')\">DASHBOARD </a> ','DASHBOARD','img/icon/icon-home.png','bg-aqua','showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=1\')','showMenu(\'content\', \'index.php?model=graph_query&action=showGraphAll\')',0,0,'2015-05-19 15:19:47','','','2020-07-08 15:14:03','admin','127.0.0.1');
insert  into `master_module`(`id`,`module`,`descriptionhead`,`description`,`picture`,`classcolour`,`onclick`,`onclicksubmenu`,`parentid`,`public`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (2,'ADMIN','<a href=\"#\" onclick=\"showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=3\')\">ADMIN </a> ','ADMIN','img/icon/icon-admin.png','bg-yellow','showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=2\')','showMenu(\'content\', \'index.php?model=master_module&action=showMenUBox&id=2\')',0,0,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `master_module`(`id`,`module`,`descriptionhead`,`description`,`picture`,`classcolour`,`onclick`,`onclicksubmenu`,`parentid`,`public`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (3,'REPORT','<a href=\"#\" onclick=\"showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=4\')\">REPORT</a> ','REPORT','img/icon/icon-report.png','bg-green','showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=3\')','showMenu(\'content\', \'index.php?model=master_module&action=showMenuBox&id=3\')',0,0,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `master_module`(`id`,`module`,`descriptionhead`,`description`,`picture`,`classcolour`,`onclick`,`onclicksubmenu`,`parentid`,`public`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (4,'MASTER_USER','<a href=\"#\" onclick=\"showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=3\')\">ADMIN </a> / USER ','USER','img/icon/icon-create-user.png','bg-orange','showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=4\')','showMenu(\'content\', \'index.php?model=master_user&action=showAllJQuery\')',2,0,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `master_module`(`id`,`module`,`descriptionhead`,`description`,`picture`,`classcolour`,`onclick`,`onclicksubmenu`,`parentid`,`public`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (5,'MASTER_GROUP','<a href=\"#\" onclick=\"showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=3\')\">ADMIN </a> / GROUP','GROUP','img/icon/icon-group.png','bg-red','showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=5\')','showMenu(\'content\', \'index.php?model=master_group&action=showAllJQuery\')',2,0,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `master_module`(`id`,`module`,`descriptionhead`,`description`,`picture`,`classcolour`,`onclick`,`onclicksubmenu`,`parentid`,`public`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (6,'MASTER_MODULE','<a href=\"#\" onclick=\"showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=3\')\">ADMIN </a> / MODULE','MODULE','img/icon/icon-module.png','bg-blue1','showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=6\')','showMenu(\'content\', \'index.php?model=master_module&action=showAllJQuery\')',2,0,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `master_module`(`id`,`module`,`descriptionhead`,`description`,`picture`,`classcolour`,`onclick`,`onclicksubmenu`,`parentid`,`public`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (7,'GRAPH_QUERY','<a href=\"#\" onclick=\"showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=3\')\">ADMIN </a> / GRAPH QUERY','GRAPH QUERY','img/icon/icon-graph-query.png','bg-orange2','showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=7\')','showMenu(\'content\', \'index.php?model=graph_query&action=showAllJQuery\')',2,0,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `master_module`(`id`,`module`,`descriptionhead`,`description`,`picture`,`classcolour`,`onclick`,`onclicksubmenu`,`parentid`,`public`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (11,'VIDEO_PEMBELAJARAN','<a href=\"#\" onclick=\"showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=11\')\">VIDEO PEMBELAJARAN</a> ','VIDEO PEMBELAJARAN','img/icon/icon-pengguna.png','bg-teal','showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=11\')','showMenu(\'content\', \'index.php?model=video_pembelajaran_siswa&action=showListJQuery\')',0,0,'2020-07-09 14:30:10','','','2020-07-09 15:02:02','admin','127.0.0.1');
insert  into `master_module`(`id`,`module`,`descriptionhead`,`description`,`picture`,`classcolour`,`onclick`,`onclicksubmenu`,`parentid`,`public`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (10,'GRAB_DATA_GFORM','<a href=\"#\" onclick=\"showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=10\')\">DATA INTEGRATION</a> ','GRAB DATA','img/icon/icon-graph-query.png','bg-lime','showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=10\')','showMenu(\'content\', \'index.php?model=m_url_gform&action=showAllJQuery\')',0,0,'2020-07-07 12:50:00','','','2020-07-08 15:13:48','admin','127.0.0.1');
insert  into `master_module`(`id`,`module`,`descriptionhead`,`description`,`picture`,`classcolour`,`onclick`,`onclicksubmenu`,`parentid`,`public`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (12,'PENGATURAN_VIDEO_PEMBELAJARAN','<a href=\"#\" onclick=\"showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=2\')\">ADMIN</a>  / <a href=\"#\" onclick=\"showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=12\')\">PENGATURAN VIDEO PEMBELAJARAN</a> ','PENGATURAN VIDEO PEMBELAJARAN','img/icon/icon-analisa-transaksi.png','bg-aqua','showMenu(\'contentmenu\', \'index.php?model=master_module&action=showMenu&id=12\')','showMenu(\'content\', \'index.php?model=video_pembelajaran&action=showAllJQuery\')',2,0,'2020-07-09 14:42:58','','','2020-07-09 14:43:24','admin','127.0.0.1');

/*Table structure for table `master_profil` */

CREATE TABLE `master_profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(30) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  `avatar` mediumblob,
  `departmentid` varchar(2) DEFAULT NULL,
  `unitid` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `master_profil` */

/*Table structure for table `master_unit` */

CREATE TABLE `master_unit` (
  `unitid` varchar(2) NOT NULL,
  `unitname` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`unitid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `master_unit` */

/*Table structure for table `master_user` */

CREATE TABLE `master_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `departmentid` int(11) DEFAULT NULL,
  `unitid` int(11) DEFAULT NULL,
  `entrytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entryuser` varchar(255) DEFAULT NULL,
  `entryip` varchar(255) DEFAULT NULL,
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateuser` varchar(255) DEFAULT NULL,
  `updateip` varchar(255) DEFAULT NULL,
  `avatar` text,
  PRIMARY KEY (`user`),
  UNIQUE KEY `iduser` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `master_user` */

insert  into `master_user`(`id`,`user`,`description`,`password`,`username`,`nik`,`departmentid`,`unitid`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`,`avatar`) values (1,'admin','Administrator','21232f297a57a5a743894a0e4a801fc3','admin',NULL,NULL,NULL,'2019-12-30 18:12:02','','','2019-12-30 18:12:02','system','','templatemo-topbar-bg.png');
insert  into `master_user`(`id`,`user`,`description`,`password`,`username`,`nik`,`departmentid`,`unitid`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`,`avatar`) values (2,'skurniawan','Pengajar Kelas V','25d55ad283aa400af464c76d713c07ad','Sigit Kurniawan','123456',0,0,'2020-07-08 15:17:20','admin','127.0.0.1','2020-07-08 15:17:20','admin','127.0.0.1','');
insert  into `master_user`(`id`,`user`,`description`,`password`,`username`,`nik`,`departmentid`,`unitid`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`,`avatar`) values (3,'spratiwi','Pengajar Kelas IV','e10adc3949ba59abbe56e057f20f883e','Santi Pratiwi','1122231',0,0,'2020-07-09 06:49:08','admin','127.0.0.1','2020-07-09 06:49:08','admin','127.0.0.1','');

/*Table structure for table `master_user_detail` */

CREATE TABLE `master_user_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) DEFAULT NULL,
  `groupcode` varchar(20) DEFAULT NULL,
  `entrytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entryuser` varchar(255) DEFAULT NULL,
  `entryip` varchar(255) DEFAULT NULL,
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateuser` varchar(255) DEFAULT NULL,
  `updateip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usergroup` (`user`,`groupcode`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `master_user_detail` */

insert  into `master_user_detail`(`id`,`user`,`groupcode`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (1,'admin','Admin','2019-12-30 18:12:03','','','2019-12-30 18:12:03','','');
insert  into `master_user_detail`(`id`,`user`,`groupcode`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (2,'skurniawan','Pengajar','2020-07-08 15:17:20','admin','127.0.0.1','2020-07-08 15:17:20','admin','127.0.0.1');
insert  into `master_user_detail`(`id`,`user`,`groupcode`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (3,'spratiwi','Pengajar','2020-07-09 06:49:09','admin','127.0.0.1','2020-07-09 06:49:09','admin','127.0.0.1');

/*Table structure for table `registrasi_peserta_seminar_teknologi` */

CREATE TABLE `registrasi_peserta_seminar_teknologi` (
  `Institusi` varchar(255) DEFAULT NULL,
  `Nama_Lengkap` varchar(255) DEFAULT NULL,
  `No_Handphone` varchar(255) DEFAULT NULL,
  `Surel` varchar(255) DEFAULT NULL,
  `Timestamp` varchar(255) DEFAULT NULL,
  `id` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `registrasi_peserta_seminar_teknologi` */

insert  into `registrasi_peserta_seminar_teknologi`(`Institusi`,`Nama_Lengkap`,`No_Handphone`,`Surel`,`Timestamp`,`id`) values ('PT. Martina Berto, Tbk','Sigit Kurniawan','085695392176','kurniawan.sgt@gmail.com','08/07/2020 21:44:54',1);
insert  into `registrasi_peserta_seminar_teknologi`(`Institusi`,`Nama_Lengkap`,`No_Handphone`,`Surel`,`Timestamp`,`id`) values ('Cordova Media Tech','Jundullah Al Hakim','08999931414','hakim.jundullah@gmail.com','08/07/2020 21:45:36',2);
insert  into `registrasi_peserta_seminar_teknologi`(`Institusi`,`Nama_Lengkap`,`No_Handphone`,`Surel`,`Timestamp`,`id`) values ('Bunga Bangsa Islamic School','Santi Pratiwi','08999726044','snt.mutz@gmail.com','08/07/2020 21:48:13',3);
insert  into `registrasi_peserta_seminar_teknologi`(`Institusi`,`Nama_Lengkap`,`No_Handphone`,`Surel`,`Timestamp`,`id`) values ('BSI Bekasi','Santi Imut','07897987979','snt86@yahoo.co.id','08/07/2020 22:09:41',4);
insert  into `registrasi_peserta_seminar_teknologi`(`Institusi`,`Nama_Lengkap`,`No_Handphone`,`Surel`,`Timestamp`,`id`) values ('PT. Marthana','amir70@gmail.com','08992131432','Amir Hamsjah','09/07/2020 4:39:14',5);
insert  into `registrasi_peserta_seminar_teknologi`(`Institusi`,`Nama_Lengkap`,`No_Handphone`,`Surel`,`Timestamp`,`id`) values ('PT. Cantika Puspa Pesona','Harry Setiawan','08422524355','hsetiawan@marthana.co.id','09/07/2020 5:04:52',6);

/*Table structure for table `registrasi_santri_baru_griya_ceria` */

CREATE TABLE `registrasi_santri_baru_griya_ceria` (
  `Alamat_Rumah` varchar(255) DEFAULT NULL,
  `Jenis_Kelamin_Calon_Siswa` varchar(255) DEFAULT NULL,
  `Nama_Calon_Santri` varchar(255) DEFAULT NULL,
  `Nama_Wali_Santri` varchar(255) DEFAULT NULL,
  `No_Handphone` varchar(255) DEFAULT NULL,
  `Timestamp` varchar(255) DEFAULT NULL,
  `id` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `registrasi_santri_baru_griya_ceria` */

insert  into `registrasi_santri_baru_griya_ceria`(`Alamat_Rumah`,`Jenis_Kelamin_Calon_Siswa`,`Nama_Calon_Santri`,`Nama_Wali_Santri`,`No_Handphone`,`Timestamp`,`id`) values ('Vila Indah Permai 1 - Tambun \nBekasi','Laki-laki','Khoirul Akbar','Mardiyono','08999313131','07/07/2020 16:14:19',1);
insert  into `registrasi_santri_baru_griya_ceria`(`Alamat_Rumah`,`Jenis_Kelamin_Calon_Siswa`,`Nama_Calon_Santri`,`Nama_Wali_Santri`,`No_Handphone`,`Timestamp`,`id`) values ('Perum Vila Bekasi Indah 2 - Tambun\nBekasi','Laki-laki','Akbar Jundullah','Kurnianto','085699989313','07/07/2020 16:17:34',2);
insert  into `registrasi_santri_baru_griya_ceria`(`Alamat_Rumah`,`Jenis_Kelamin_Calon_Siswa`,`Nama_Calon_Santri`,`Nama_Wali_Santri`,`No_Handphone`,`Timestamp`,`id`) values ('Cibitung - Bekasi','Laki-laki','Ferry Indrawan Susanto','Susanto','08783141341','07/07/2020 16:19:48',3);
insert  into `registrasi_santri_baru_griya_ceria`(`Alamat_Rumah`,`Jenis_Kelamin_Calon_Siswa`,`Nama_Calon_Santri`,`Nama_Wali_Santri`,`No_Handphone`,`Timestamp`,`id`) values ('Tambun','Laki-laki','Rendi Akbar','Feriyanto','08786876868','07/07/2020 16:25:10',4);
insert  into `registrasi_santri_baru_griya_ceria`(`Alamat_Rumah`,`Jenis_Kelamin_Calon_Siswa`,`Nama_Calon_Santri`,`Nama_Wali_Santri`,`No_Handphone`,`Timestamp`,`id`) values ('Bekasi Timur','Laki-laki','Donny Sumargo','Hendy Akbar','08966969869','08/07/2020 20:20:30',5);
insert  into `registrasi_santri_baru_griya_ceria`(`Alamat_Rumah`,`Jenis_Kelamin_Calon_Siswa`,`Nama_Calon_Santri`,`Nama_Wali_Santri`,`No_Handphone`,`Timestamp`,`id`) values ('Cikarang - Kabupaten Bekasi','Laki-laki','Tri Hamdani','Herianto','089696969869','08/07/2020 20:21:08',6);
insert  into `registrasi_santri_baru_griya_ceria`(`Alamat_Rumah`,`Jenis_Kelamin_Calon_Siswa`,`Nama_Calon_Santri`,`Nama_Wali_Santri`,`No_Handphone`,`Timestamp`,`id`) values ('Griya Asri 2 - Tambun','Laki-laki','Susanto','Mujiman','087868769696','08/07/2020 20:34:23',7);
insert  into `registrasi_santri_baru_griya_ceria`(`Alamat_Rumah`,`Jenis_Kelamin_Calon_Siswa`,`Nama_Calon_Santri`,`Nama_Wali_Santri`,`No_Handphone`,`Timestamp`,`id`) values ('Narogong Indah - Bekasi Timur','Perempuan','Siti Khumairah','Joko Akbar','08564675765757','08/07/2020 20:35:04',8);
insert  into `registrasi_santri_baru_griya_ceria`(`Alamat_Rumah`,`Jenis_Kelamin_Calon_Siswa`,`Nama_Calon_Santri`,`Nama_Wali_Santri`,`No_Handphone`,`Timestamp`,`id`) values ('Bekasi Utara','Perempuan','Nisa Khoiriyah','Furqon Akbar','08769696969','08/07/2020 20:46:45',9);
insert  into `registrasi_santri_baru_griya_ceria`(`Alamat_Rumah`,`Jenis_Kelamin_Calon_Siswa`,`Nama_Calon_Santri`,`Nama_Wali_Santri`,`No_Handphone`,`Timestamp`,`id`) values ('Jakarta Timur','Perempuan','Ferawati Sugandi','Susilo','085875875858','08/07/2020 20:47:24',10);

/*Table structure for table `replace_character` */

CREATE TABLE `replace_character` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sourcetext` varchar(255) DEFAULT NULL,
  `replacetext` varchar(255) DEFAULT NULL,
  `find` int(1) DEFAULT '1',
  `save` int(1) DEFAULT '1',
  `entrytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entryuser` varchar(255) DEFAULT NULL,
  `entryip` varchar(255) DEFAULT NULL,
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateuser` varchar(255) DEFAULT NULL,
  `updateip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `replace_character` */

insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (1,'\'','\\\'',1,1,'2015-06-17 16:20:52',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);
insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (2,'javascript','',1,1,'2015-06-17 16:21:05',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);
insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (3,'script','',1,1,'2015-06-17 16:21:12',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);
insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (4,'union',' ',1,0,'2015-10-20 18:58:03',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);
insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (5,' or ',' ',1,0,'2015-10-20 18:58:06',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);
insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (6,'--',' ',1,1,'2015-09-28 10:35:11',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);
insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (7,'JAVASCRIPT',' ',1,1,'2015-09-28 10:46:19',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);
insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (8,'SCRIPT',' ',1,1,'2015-09-28 10:46:21',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);
insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (9,'UNION',' ',1,0,'2015-10-20 18:58:13',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);
insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (10,' OR ',' ',1,0,'2015-10-20 18:58:16',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);
insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (11,'Javascript',' ',1,1,'2015-09-28 10:46:23',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);
insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (12,'Script',' ',1,1,'2015-09-28 10:46:24',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);
insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (13,'Union',' ',1,0,'2015-10-20 18:58:20',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);
insert  into `replace_character`(`id`,`sourcetext`,`replacetext`,`find`,`save`,`entrytime`,`entryuser`,`entryip`,`updatetime`,`updateuser`,`updateip`) values (14,' Or ',' ',1,0,'2015-10-20 18:58:22',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL);

/*Table structure for table `report_query` */

CREATE TABLE `report_query` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reportname` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `query` mediumtext,
  `crosstab` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0',
  `subtotal` int(11) DEFAULT '0',
  `entrytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entryuser` varchar(255) DEFAULT NULL,
  `entryip` varchar(255) DEFAULT NULL,
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateuser` varchar(255) DEFAULT NULL,
  `updateip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `report_query` */

/*Table structure for table `video_pembelajaran` */

CREATE TABLE `video_pembelajaran` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `judul_video` varchar(255) DEFAULT NULL,
  `deskripsi_video` text,
  `thumbnail_video` varchar(255) DEFAULT NULL,
  `url_video` varchar(255) DEFAULT NULL,
  `url_form` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `video_pembelajaran` */

insert  into `video_pembelajaran`(`id`,`judul_video`,`deskripsi_video`,`thumbnail_video`,`url_video`,`url_form`) values (1,'Video Tutorial Instalasi MyMutabaah','Video ini berisi cara melakukan instalasi aplikasi MyMutabaah di perangkat Android.','video_tutorial_1.png','https://youtu.be/z_pgTktnV94','https://forms.gle/NExFr1Q8Ybr5rJPAA');
insert  into `video_pembelajaran`(`id`,`judul_video`,`deskripsi_video`,`thumbnail_video`,`url_video`,`url_form`) values (2,'Video Tutorial Penggunaan MyMutabaah','Video ini berisi cara-cara penggunaan aplikasi MyMutabaah di perangkat Android.','video_tutorial_2.png','https://youtu.be/F4gMnghtzGg','https://forms.gle/GXREWkoLFsBxxxAD8');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
