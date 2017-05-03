DROP TABLE IF EXISTS `t_report`;

CREATE TABLE `t_report` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) unsigned DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `message` text,
  `report_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `vendor_id` (`vendor_id`),
  CONSTRAINT `t_report_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `t_member` (`id`),
  CONSTRAINT `t_report_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `t_vendor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
