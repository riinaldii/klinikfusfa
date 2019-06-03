/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.37-MariaDB : Database - klinik-fusfa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`klinik-fusfa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `klinik-fusfa`;

/*Table structure for table `bio_pasien` */

DROP TABLE IF EXISTS `bio_pasien`;

CREATE TABLE `bio_pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `usia` int(3) DEFAULT NULL,
  `riwayat_pendidikan` varchar(128) DEFAULT NULL,
  `pekerjaan` varchar(128) DEFAULT NULL,
  `perkawinan` varchar(128) DEFAULT NULL,
  `anak_ke` int(3) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `bio_pasien_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bio_pasien` */

insert  into `bio_pasien`(`id_pasien`,`name`,`tgl_lahir`,`tempat_lahir`,`image`,`alamat`,`usia`,`riwayat_pendidikan`,`pekerjaan`,`perkawinan`,`anak_ke`,`id_user`) values 
(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),
(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3);

/*Table structure for table `bio_terapis` */

DROP TABLE IF EXISTS `bio_terapis`;

CREATE TABLE `bio_terapis` (
  `id_terapis` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `riwayat_pendidikan` varchar(128) DEFAULT NULL,
  `usia` varchar(3) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_terapis`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `bio_terapis_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `bio_terapis` */

insert  into `bio_terapis`(`id_terapis`,`name`,`tgl_lahir`,`tempat_lahir`,`image`,`alamat`,`no_telp`,`riwayat_pendidikan`,`usia`,`id_user`) values 
(1,'Jamilah','0000-00-00','Banjarmasin',NULL,NULL,NULL,NULL,NULL,6);

/*Table structure for table `janji_temu` */

DROP TABLE IF EXISTS `janji_temu`;

CREATE TABLE `janji_temu` (
  `id_jt` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) DEFAULT NULL,
  `id_terapis` int(11) DEFAULT NULL,
  `id_layanan` int(11) DEFAULT NULL,
  `tgl_temu` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `keluhan` varchar(128) DEFAULT NULL,
  `tempat` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_jt`),
  KEY `id_pasien` (`id_pasien`),
  KEY `id_terapis` (`id_terapis`),
  KEY `id_layanan` (`id_layanan`),
  CONSTRAINT `janji_temu_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `user` (`id`),
  CONSTRAINT `janji_temu_ibfk_2` FOREIGN KEY (`id_terapis`) REFERENCES `user` (`id`),
  CONSTRAINT `janji_temu_ibfk_3` FOREIGN KEY (`id_layanan`) REFERENCES `list_layanan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `janji_temu` */

insert  into `janji_temu`(`id_jt`,`id_pasien`,`id_terapis`,`id_layanan`,`tgl_temu`,`waktu`,`keluhan`,`tempat`,`status`) values 
(1,2,6,1,'2019-06-03','00:00:12','Bipolar','Kantor','Menunggu Konfirmasi');

/*Table structure for table `list_layanan` */

DROP TABLE IF EXISTS `list_layanan`;

CREATE TABLE `list_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(128) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `list_layanan` */

insert  into `list_layanan`(`id`,`nama_layanan`,`keterangan`) values 
(1,'Konsultasi','1 Pertemuan'),
(2,'Terapi','10 Kali Pertemuan'),
(3,'Psikoterapi','1 Bulan'),
(4,'CTScan','3 Kali Pertemuan');

/*Table structure for table `list_penyakit` */

DROP TABLE IF EXISTS `list_penyakit`;

CREATE TABLE `list_penyakit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penyakit` varchar(128) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `list_penyakit` */

insert  into `list_penyakit`(`id`,`nama_penyakit`,`keterangan`) values 
(1,'ADHD','Gangguan Jiwa'),
(2,'Bipolar','Gangguan Emosi'),
(3,'Psycho','Gangguan Mental'),
(4,'Stress','Kebanyakan Pikiran');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`email`,`image`,`password`,`role_id`,`is_active`,`date_created`) values 
(2,'Rinrin','rinrirn@gmail.com','default.jpg','$2y$10$FPp42vYbBOOzUklPPz9r1O6cSbrNheHtKW.EJAagg4T039E197Vpy',4,1,1554858711),
(3,'Meimei','emeimei@gmail.com','default.jpg','$2y$10$6l7gDNOglWGXKJmnl4HHiuAluSVY9sjz5vfdI2ldBygfrLlvfaaFe',4,1,1555198058),
(4,'Rinaldi Anwar','riinaaldii@gmail.com','pp3.jpg','$2y$10$OcU9VvuVrBYXUFnmQpp9O.KgLediNqZwngzAssmM.nO72lTtxmsRm',1,1,1555198209),
(6,'Jamilah','jamjam@gmail.com','default.jpg','$2y$10$pjXmGZG52u4Qm8dgWlN7jOLIR9520JgoNKBo5qg.3Q336G4nBwlCS',3,1,1555286810),
(9,'Jamilah Jamil','jamilahjam744@gmail.com','Logo-Unlam.png','$2y$10$okAigCeHJuQKx2YB4QGAa.VOkELPLl3nvfnACkr2rBdaGIGtK/eNe',2,1,1556752525);

/*Table structure for table `user_access_menu` */

DROP TABLE IF EXISTS `user_access_menu`;

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `user_access_menu` */

insert  into `user_access_menu`(`id`,`role_id`,`menu_id`) values 
(1,1,1),
(2,1,2),
(8,1,3),
(18,2,2),
(21,2,5),
(22,3,2),
(23,3,4),
(25,4,2),
(26,4,6),
(28,1,5),
(31,1,4),
(33,1,6);

/*Table structure for table `user_menu` */

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(123) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `user_menu` */

insert  into `user_menu`(`id`,`menu`) values 
(1,'Admin'),
(2,'User'),
(3,'Menu'),
(4,'Terapis'),
(5,'Owner'),
(6,'Pasien'),
(7,'Preview'),
(8,'Review'),
(9,'Report');

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user_role` */

insert  into `user_role`(`id`,`role`) values 
(1,'Superadmin'),
(2,'Owner'),
(3,'Terapis'),
(4,'Pasien');

/*Table structure for table `user_sub_menu` */

DROP TABLE IF EXISTS `user_sub_menu`;

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `user_sub_menu` */

insert  into `user_sub_menu`(`id`,`menu_id`,`title`,`url`,`icon`,`is_active`) values 
(1,1,'Dashboard','admin','fas fa-fw fa-tachometer-alt',1),
(2,2,'My Profile','user','fas fa-fw fa-user',1),
(3,2,'Edit Profile','user/edit','fas fa-fw fa-user-edit',1),
(4,3,'Menu Management','menu','fas fa-fw fa-folder',1),
(5,3,'Submenu Management','menu/submenu','fas fa-fw fa-folder-open',1),
(7,1,'Role','admin/role','fas fa-fw fa-user-tie',1),
(8,2,'Change Password','user/changepassword','fas fa-fw fa-key',1),
(9,5,'Dashboard','owner/index','fas fa-fw fa-tachometer-alt',1),
(10,5,'Janji Temu','owner/janjitemu','fas fa-fw fa-address-book',1),
(11,5,'Terapis','owner/terapis','fas fa-fw fa-user-md',1),
(12,5,'Pasien','owner/pasien','fas fa-fw fa-user-friends',1),
(13,5,'Layanan','owner/layanan','fas fa-fw fa-caret-square-down',1),
(14,5,'Penyakit','owner/penyakit','fas fa-fw fa-brain',1),
(15,5,'Grafik','owner/grafik','fas fa-fw fa-chart-line',1),
(16,4,'Janji Temu','terapis/janjitemu','fas fa-fw fa-address-book',1),
(17,4,'Data Pasien','terapis/pasien','fas fa-fw fa-user-friends',1),
(18,6,'Janji Temu','pasien/janjitemu','fas fa-fw fa-address-book',1),
(19,6,'Keluhan','pasien/keluhan','fas fa-fw fa-brain',1);

/*Table structure for table `user_token` */

DROP TABLE IF EXISTS `user_token`;

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) DEFAULT NULL,
  `token` varchar(128) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_token` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
