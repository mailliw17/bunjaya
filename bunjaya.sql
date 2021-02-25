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

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_satuan`) VALUES
(25,	'Filter Pajero Sport Denso',	175000),
(26,	'Dinamofen Grand Vitara Asli',	375000),
(27,	'Cond Escudo 1,6 Pokka',	500000),
(28,	'M.C Avanza Lama',	350000),
(29,	'Comp 507 Fujicool',	875000),
(30,	'Drier h,f',	45000),
(31,	'Blower Tanam f',	500000),
(32,	'Selang Allu f',	25000),
(33,	'Comp All New Avanza Denso Asli Only',	1175000),
(34,	'Silica Drier',	20000),
(35,	'Relay 4k Biru Denso',	25000),
(36,	'Pentil R134',	6000),
(37,	'Comp All New Avanza Coolgear Asli',	1300000),
(38,	'HPS',	25000),
(39,	'Alat Tes Bocor',	1250000),
(40,	'Freon Bailian',	41000),
(41,	'Freon Klea',	38000),
(42,	'Thermostat Sinhan',	37500),
(43,	'Drier R134',	60000),
(44,	'Drier Kijang Panjang',	85000),
(45,	'Dinamo Blower Kijang A3 Imi',	200000),
(46,	'M.C Datsun Go Valeo',	400000),
(47,	'Angker Besar',	120000),
(48,	'Cond Grand Vitara Yaruki',	775000),
(49,	'M.C All New Avanza 4pk',	350000),
(50,	'Dinamo Blower SD 24V + Daun',	250000),
(51,	'Comp Spin Diesel Second',	1000000),
(52,	'Poly PK 507 SD',	150000),
(53,	'Cond Ceria Asli',	975000),
(54,	'Dinamo Blower X-Over Asli',	450000),
(55,	'M.C Avanza Asli 1.3 4PK',	550000),
(56,	'Filter All New Avanza Denso',	80000),
(57,	'Comp Xenia / Avanza Lama Coolgear Asli',	1350000),
(58,	'Dinamo Radiator Avanza',	450000),
(59,	'Selang 5/8 + Fitting',	175000),
(60,	'Ongkos Kerja + Oli + Freon',	500000),
(61,	'Spool Avanza',	250000),
(62,	'Casing Avanza Kyoto',	275000),
(63,	'Presesswitch Nissan Xtrail Asli',	450000),
(64,	'Drier Nissan X-Trail',	110000),
(65,	'Evap Baleno Lama Pokka',	450000),
(66,	'Dinamofen Grand Corolla Imi',	275000),
(67,	'Selang 1/2 + Fitting',	75000),
(68,	'Idle Polly Leher Besar / Kecil',	40000),
(69,	'Dinamo Blower SD 12V Pokka',	150000),
(70,	'Selang 5/8 + Mangkok',	75000),
(71,	'Evap Innova Depan KW',	550000),
(72,	'Cond Avanza Lama 1.3 KW',	650000),
(73,	'Oli Refoil',	150000),
(74,	'Comp Forsa Coolgear Asli',	1900000),
(75,	'Drat 3/8 KU',	20000),
(76,	'Nut 3/8 - 5/16',	15000),
(77,	'Fitting 3/8',	15000),
(78,	'Corong Hawa',	45000),
(79,	'Karet Oring 5/16 1/2 R12',	600),
(80,	'Evap Nissan March Valeo',	650000),
(81,	'Elemen Kijang Sisir',	40000),
(82,	'Comp 508 Fujicool',	900000),
(83,	'Breket Hino 260 ti SD',	600000),
(84,	'Cond 14x23x20',	475000),
(85,	'Drier Allu O R12',	100000),
(86,	'Presesswitch R12',	40000),
(87,	'Fitting Press',	15000),
(88,	'Dinamo Blower SD 24V',	175000),
(89,	'Spool 508 24V',	175000),
(90,	'Blower Tanam R134',	500000),
(91,	'Spool Innova S/B',	125000),
(92,	'Exp KU R134 Coolgear Asli',	180000),
(93,	'Exp Avanza Asli',	175000),
(94,	'Selang 3/8 5/8',	65000),
(95,	'Plat Cond',	5000),
(96,	'Casing Avanza Lama Kyoto',	175000),
(97,	'Filter Innova Denso',	60000),
(98,	'Kunci Pentil',	35000),
(99,	'Selang 1/2 + Mangkok',	75000),
(100,	'Cond Avanza Lama Pokka',	450000),
(101,	'Evap Splash Yaruki',	600000),
(102,	'Comp TC Coolgear Asli Only',	1400000),
(103,	'Cond Kijang Diesel Yaruki',	550000),
(104,	'M.C Triton 2.5 Valeo',	450000),
(105,	'Comp Nissan Xtrail Ex',	800000),
(106,	'M.C Nissan Juke Valeo',	750000),
(107,	'Dinamo Blower Nissan Xtrail Asli',	800000),
(108,	'Drier Nissan X-Trail 1 Baut',	120000),
(109,	'Evap Avanza SWJ',	250000),
(110,	'Evap Innova Depan Yaruki',	425000),
(111,	'Evap Vios Pokka',	425000),
(112,	'Evap Honda CRV Pokka',	450000),
(113,	'Evap New CRV Kehin',	450000),
(114,	'Evap All New CRV Pokka',	500000),
(115,	'Evap Datsun Go + Exp Nissan',	675000),
(116,	'Drier R12',	65000),
(117,	'Freon Big Bainian',	30000);

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


DROP TABLE IF EXISTS `hasil_mining`;
CREATE TABLE `hasil_mining` (
  `id_hasil_mining` int(11) NOT NULL AUTO_INCREMENT,
  `hasil` varchar(256) NOT NULL,
  `support` float NOT NULL,
  `confidence` float NOT NULL,
  `lift_ratio` float NOT NULL,
  PRIMARY KEY (`id_hasil_mining`)
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

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`) VALUES
(13,	'Slamat ac'),
(14,	'Wahab ac'),
(15,	'Amin ys'),
(16,	'Purba ac'),
(17,	'Syaiful Langsa'),
(18,	'Kok hua/prima audio'),
(19,	'Kok hua/mitra audio'),
(20,	'Kok hua'),
(21,	'Kusnan ac'),
(22,	'dummy'),
(23,	'Medan Motor'),
(24,	'Ones Service'),
(25,	'Mam Sari Kurnia'),
(26,	'Rudi Meluaboh'),
(27,	'Angga AC'),
(28,	'Anto Jo'),
(29,	'Customer Service'),
(30,	'Iyan AC'),
(31,	'Indra AC'),
(32,	'Adi Langsa'),
(33,	'Anang AC'),
(34,	'Timbul AC'),
(35,	'Cash'),
(36,	'Agil Jaya Service'),
(37,	'Bintang Audio / Apeng'),
(38,	'Adi Rondang'),
(39,	'Adi Menteng'),
(40,	'Ucok AC'),
(41,	'Wagirin AC'),
(42,	'Gapa AC'),
(43,	'Kok Hua / Dunia Audio'),
(44,	'Kok Hua / Sarana Audio Mobil'),
(45,	'Heri AC'),
(46,	'Parlin AC');

DROP TABLE IF EXISTS `process_log`;
CREATE TABLE `process_log` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `support` double NOT NULL,
  `confidence` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `process_log` (`id`, `start_date`, `end_date`, `support`, `confidence`) VALUES
(3,	'2020-12-14',	'2020-12-14',	13,	4);

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(10) NOT NULL,
  `transaction_date` date DEFAULT NULL,
  `produk` text NOT NULL,
  `qty` text NOT NULL,
  `harga_satuan` text NOT NULL,
  `total` int(11) NOT NULL,
  `pelanggan` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transaksi` (`id`, `id_transaksi`, `transaction_date`, `produk`, `qty`, `harga_satuan`, `total`, `pelanggan`) VALUES
(11,	1614221753,	'2021-02-25',	'Silica Drier,Pentil R134',	'12,1',	'20000,6000',	246000,	'Amin ys'),
(12,	1614221823,	'2021-02-25',	'Filter Pajero Sport Denso,Pentil R134,Selang Allu f',	'1,2,3',	'175000,6000,25000',	262000,	'Wahab ac');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('Master','Owner','Kasir') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(1,	'William',	'wil',	'202cb962ac59075b964b07152d234b70',	'Master'),
(2,	'Abun',	'abun',	'202cb962ac59075b964b07152d234b70',	'Owner'),
(3,	'Sinta',	'sinta',	'202cb962ac59075b964b07152d234b70',	'Kasir'),
(4,	'Sally',	'sally',	'202cb962ac59075b964b07152d234b70',	'Kasir'),
(5,	'Maman abd',	'maman',	'202cb962ac59075b964b07152d234b70',	'Kasir');

-- 2021-02-25 03:31:53
