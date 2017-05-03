# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: neeqah
# Generation Time: 2015-07-22 01:51:28 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table t_detail_plan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_detail_plan`;

CREATE TABLE `t_detail_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table t_kategori
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_kategori`;

CREATE TABLE `t_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table t_member
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_member`;

CREATE TABLE `t_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `t_member_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table t_plan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_plan`;

CREATE TABLE `t_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `wedding_date` date NOT NULL,
  `budget` int(11) NOT NULL,
  `jml_undangan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `t_plan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table t_produk
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_produk`;

CREATE TABLE `t_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `harga` int(11) NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `status` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `kategori_id` (`kategori_id`),
  CONSTRAINT `t_produk_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `t_kategori` (`id`),
  CONSTRAINT `t_produk_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `t_vendor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table t_produk_gallery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_produk_gallery`;

CREATE TABLE `t_produk_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produk_id` (`produk_id`),
  CONSTRAINT `t_produk_gallery_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `t_produk` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table t_produk_kategori
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_produk_kategori`;

CREATE TABLE `t_produk_kategori` (
  `produk_id` varchar(8) NOT NULL,
  `kategori_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table t_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table t_vendor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_vendor`;

CREATE TABLE `t_vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `responsible_name` varchar(255) DEFAULT NULL,
  `reponsible_telp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `t_vendor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table t_verification
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_verification`;

CREATE TABLE `t_verification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `hash_key` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
