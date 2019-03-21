# Host: localhost  (Version 5.5.5-10.1.35-MariaDB)
# Date: 2019-01-17 13:22:47
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "mst_barang"
#

DROP TABLE IF EXISTS `mst_barang`;
CREATE TABLE `mst_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `nama_barang` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `tgl_create` datetime DEFAULT '0000-00-00 00:00:00',
  `user_create` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_edit` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `flag_hapus` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

#
# Data for table "mst_barang"
#

INSERT INTO `mst_barang` VALUES (47,'1000','Printer laser jet','2018-11-21 11:36:32','','2018-12-13 14:06:20',1),(48,'2000','Vga Nvidia GTX','2018-11-21 11:36:46','','2018-12-13 14:06:22',1),(49,'3000','Tablet PC','2018-11-21 11:36:55','','2018-12-13 14:06:23',1),(50,'100','Printer IP 2770','2019-01-17 09:48:13','',NULL,0),(51,'101','Laptop Lenovo 43SJ','2019-01-17 09:48:22','',NULL,0),(52,'102','Flashdisk Sandisk 16Gb','2019-01-17 09:48:33','',NULL,0);

#
# Structure for table "mst_mg"
#

DROP TABLE IF EXISTS `mst_mg`;
CREATE TABLE `mst_mg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `lokasi` text COLLATE latin1_general_ci NOT NULL,
  `no_tlp` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `tgl_create` datetime DEFAULT '0000-00-00 00:00:00',
  `user_create` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_edit` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `flag_hapus` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;

#
# Data for table "mst_mg"
#

INSERT INTO `mst_mg` VALUES (1,'A1f','Jl. tanjung duren raya no 4f','53020224','0000-00-00 00:00:00',NULL,'2018-11-19 21:30:37',1),(2,'Hieronimus Rendi malseleno','JL. mangga 2 B 39 Greenville - jakarta barat','082311458012','2018-11-16 09:12:31','','2018-11-19 21:30:39',1),(3,'MG Barat','Jl. tanjung duren raya no 4','02144560','2019-01-17 09:49:38','',NULL,0);

#
# Structure for table "mst_setting"
#

DROP TABLE IF EXISTS `mst_setting`;
CREATE TABLE `mst_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kabag` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `catatan` text COLLATE latin1_general_ci NOT NULL,
  `tgl_create` datetime DEFAULT '0000-00-00 00:00:00',
  `user_create` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_edit` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `flag_hapus` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;

#
# Data for table "mst_setting"
#

INSERT INTO `mst_setting` VALUES (29,'Malseleno','d','2019-01-17 10:03:39','','2019-01-17 10:03:43',1),(30,'Rendi','Catatan 1d','2019-01-17 10:04:56','','2019-01-17 10:05:09',1),(31,'Agung  Sucipto','Hello world...','2019-01-17 10:05:26','',NULL,0);

#
# Structure for table "mst_supplier"
#

DROP TABLE IF EXISTS `mst_supplier`;
CREATE TABLE `mst_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_s` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `perusahaan_s` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `no_tlp_s` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `alamat_s` text COLLATE latin1_general_ci NOT NULL,
  `tgl_create` datetime DEFAULT '0000-00-00 00:00:00',
  `user_create` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_edit` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `flag_hapus` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;

#
# Data for table "mst_supplier"
#

INSERT INTO `mst_supplier` VALUES (1,'Susan','Pt misi sehat imani','66044444','Jl. muara karang raya no. 12E','0000-00-00 00:00:00',NULL,NULL,NULL),(3,'Hendri gunawan','PT. sumber mandiri','02144560','Jl. mangga 2 B 39 Greenville - jakarta barat','2019-01-17 09:49:21','',NULL,0);

#
# Structure for table "mst_unit"
#

DROP TABLE IF EXISTS `mst_unit`;
CREATE TABLE `mst_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `nama_unit` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `tgl_create` datetime DEFAULT '0000-00-00 00:00:00',
  `user_create` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_edit` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `flag_hapus` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;

#
# Data for table "mst_unit"
#

INSERT INTO `mst_unit` VALUES (1,'KJ180111','AS','2018-11-19 09:13:22','','2018-11-19 21:30:27',1),(2,'LKd','ssss','2018-11-19 09:13:29','','2018-11-19 21:30:29',1),(3,'s','dddss','2018-11-19 09:14:30','','2018-11-19 21:30:30',1),(4,'1100','SMAK 1 JAKARTA BARAT','2019-01-17 09:48:48','',NULL,0);

#
# Structure for table "transaksi_detail"
#

DROP TABLE IF EXISTS `transaksi_detail`;
CREATE TABLE `transaksi_detail` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `sekolah` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `tipe_barang` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `jumlah_barang` int(11) NOT NULL DEFAULT '0',
  `harga_satuan` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `total_harga` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `tgl_input` date DEFAULT NULL,
  `tgl_create` datetime DEFAULT '0000-00-00 00:00:00',
  `user_create` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_edit` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `flag_hapus` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;

#
# Data for table "transaksi_detail"
#

INSERT INTO `transaksi_detail` VALUES (71,'19010001','SMAK 1 JAKARTA BARAT','Printer',1,'340000','340000','kirim','2019-01-17','2019-01-17 10:44:41',NULL,NULL,0),(72,'19010001','AS','Laptop',4,'50000','200000','Process','2019-01-17','2019-01-17 10:45:00',NULL,NULL,0),(73,'19010002','SMAK 1 JAKARTA BARAT','laptop assus',1,'340000','340000','Seafood','2019-01-17','2019-01-17 10:47:29',NULL,'2019-01-17 10:48:20',1),(74,'19010002','SMAK 1 JAKARTA BARAT','Laptop Lenovo 43SJ',1,'50000','50000','OKe','2019-01-17','2019-01-17 11:10:37',NULL,NULL,0);

#
# Structure for table "transaksi_header"
#

DROP TABLE IF EXISTS `transaksi_header`;
CREATE TABLE `transaksi_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `nama_penerima` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `lokasi` text COLLATE latin1_general_ci NOT NULL,
  `no_tlp` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `nama_supplier` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `perusahaan` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_kirim` date DEFAULT '0000-00-00',
  `alamat_supplier` text COLLATE latin1_general_ci NOT NULL,
  `no_tlp_supplier` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `nama_kabag` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `catatan` text COLLATE latin1_general_ci NOT NULL,
  `tgl_create` datetime DEFAULT '0000-00-00 00:00:00',
  `user_create` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_edit` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `flag_hapus` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;

#
# Data for table "transaksi_header"
#

INSERT INTO `transaksi_header` VALUES (35,'19010001','Hieronimus Rendi malseleno','JL. mangga 2 B 39 Greenville - jakarta barat','082311458012',NULL,'Pt misi sehat imani','2019-01-18','Jl. muara karang raya no. 12E','66044444','Malseleno','d','2019-01-17 10:38:13',NULL,NULL,0),(37,'19010002','Hieronimus Rendi malseleno','JL. mangga 2 B 39 Greenville - jakarta barat','082311458012',NULL,'PT. sumber mandiri','2019-01-18','Jl. mangga 2 B 39 Greenville - jakarta barat','02144560','Malseleno','d','2019-01-17 10:47:05',NULL,'2019-01-17 10:48:20',1),(39,'19010002','Hieronimus Rendi malseleno','JL. mangga 2 B 39 Greenville - jakarta barat','082311458012',NULL,'PT. sumber mandiri','2019-01-10','Jl. mangga 2 B 39 Greenville - jakarta barat','02144560','Malseleno','d','2019-01-17 11:10:18',NULL,NULL,0);

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "users"
#

INSERT INTO `users` VALUES ('admin','21232f297a57a5a743894a0e4a801fc3','admin');
