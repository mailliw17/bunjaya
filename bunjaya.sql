-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `confidence`;
CREATE TABLE `confidence` (
  `kombinasi1` varchar(255) DEFAULT NULL,
  `kombinasi2` varchar(255) DEFAULT NULL,
  `support_xUy` double DEFAULT NULL,
  `support_x` double DEFAULT NULL,
  `confidence` double DEFAULT NULL,
  `lolos` tinyint(4) DEFAULT NULL,
  `min_support` double DEFAULT NULL,
  `min_confidence` double DEFAULT NULL,
  `nilai_uji_lift` double DEFAULT NULL,
  `korelasi_rule` varchar(100) DEFAULT NULL,
  `id_process` int(5) NOT NULL DEFAULT '0',
  `jumlah_a` int(5) DEFAULT NULL,
  `jumlah_b` int(5) DEFAULT NULL,
  `jumlah_ab` int(5) DEFAULT NULL,
  `px` double DEFAULT NULL,
  `py` double DEFAULT NULL,
  `pxuy` double DEFAULT NULL,
  `from_itemset` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `itemset1`;
CREATE TABLE `itemset1` (
  `atribut` varchar(256) DEFAULT NULL,
  `jumlah` int(5) DEFAULT NULL,
  `support` double DEFAULT NULL,
  `lolos` tinyint(4) DEFAULT NULL,
  `id_process` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `itemset2`;
CREATE TABLE `itemset2` (
  `atribut1` varchar(256) DEFAULT NULL,
  `atribut2` varchar(256) DEFAULT NULL,
  `jumlah` int(5) DEFAULT NULL,
  `support` double DEFAULT NULL,
  `lolos` tinyint(4) DEFAULT NULL,
  `id_process` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `itemset3`;
CREATE TABLE `itemset3` (
  `atribut1` varchar(256) DEFAULT NULL,
  `atribut2` varchar(256) DEFAULT NULL,
  `atribut3` varchar(256) DEFAULT NULL,
  `jumlah` int(5) DEFAULT NULL,
  `support` double DEFAULT NULL,
  `lolos` tinyint(4) DEFAULT NULL,
  `id_process` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `process_log`;
CREATE TABLE `process_log` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `min_support` double NOT NULL,
  `min_confidence` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `transaction_date` date DEFAULT NULL,
  `produk` text NOT NULL,
  `qty` text NOT NULL,
  `harga_satuan` text NOT NULL,
  `total` int(11) NOT NULL,
  `pelanggan` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('Master','Owner','Kasir') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2021-04-19 02:45:55
