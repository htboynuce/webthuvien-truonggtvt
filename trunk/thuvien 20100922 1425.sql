-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.27-community-nt-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema thuvien
--

CREATE DATABASE IF NOT EXISTS thuvien;
USE thuvien;

--
-- Definition of table `chitietphieumuon`
--

DROP TABLE IF EXISTS `chitietphieumuon`;
CREATE TABLE `chitietphieumuon` (
  `MaChiTietPhieuMuon` int(10) unsigned NOT NULL auto_increment,
  `MaPhieuMuon` int(10) unsigned default NULL,
  `MaSach` int(10) unsigned default NULL,
  `NgayTra` varchar(100) default NULL,
  `TienPhat` varchar(45) default NULL,
  `LyDoPhat` text,
  `TinhTrang` tinyint(10) unsigned default NULL,
  `MaCuonSach` int(10) unsigned default NULL,
  `NgayMuon` datetime default NULL,
  `NgayHetHan` varchar(100) default NULL,
  `MaLinhVuc` int(10) unsigned default NULL,
  `MaNhom` int(10) unsigned default NULL,
  PRIMARY KEY  (`MaChiTietPhieuMuon`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietphieumuon`
--

/*!40000 ALTER TABLE `chitietphieumuon` DISABLE KEYS */;
INSERT INTO `chitietphieumuon` (`MaChiTietPhieuMuon`,`MaPhieuMuon`,`MaSach`,`NgayTra`,`TienPhat`,`LyDoPhat`,`TinhTrang`,`MaCuonSach`,`NgayMuon`,`NgayHetHan`,`MaLinhVuc`,`MaNhom`) VALUES 
 (1,3,1,NULL,NULL,NULL,0,1,'2010-09-23 11:48:46','2010-10-23',NULL,NULL),
 (2,3,4,NULL,NULL,NULL,0,8,'2010-09-23 11:48:46','2010-10-23',NULL,NULL),
 (3,3,11,NULL,NULL,NULL,0,20,'2010-09-23 11:48:46','2010-10-23',NULL,NULL),
 (4,3,8,NULL,NULL,NULL,0,14,'2010-09-23 11:48:46','2010-10-23',NULL,NULL),
 (5,4,8,NULL,NULL,NULL,0,14,'2010-09-24 17:23:34','2010-10-24',11,14),
 (6,4,4,NULL,NULL,NULL,0,8,'2010-09-24 17:23:34','2010-10-24',11,13),
 (7,4,76,NULL,NULL,NULL,0,38,'2010-09-24 17:23:34','2010-10-24',3,24),
 (8,4,1,NULL,NULL,NULL,0,1,'2010-09-24 17:23:34','2010-10-24',11,23),
 (9,4,3,NULL,NULL,NULL,0,3,'2010-09-24 17:23:34','2010-10-24',11,23),
 (10,5,35,NULL,NULL,NULL,0,65,'2010-09-24 21:40:28','2010-10-24',3,24),
 (11,5,4,NULL,NULL,NULL,0,8,'2010-09-24 21:40:28','2010-10-24',11,13),
 (12,5,2,NULL,NULL,NULL,0,50,'2010-09-24 21:40:28','2010-10-24',11,14),
 (13,5,2,NULL,NULL,NULL,0,51,'2010-09-24 21:40:28','2010-10-24',11,14),
 (14,6,10,NULL,NULL,NULL,0,26,'2010-09-24 21:43:08','2010-10-24',11,15),
 (15,6,1,NULL,NULL,NULL,0,1,'2010-09-24 21:43:09','2010-10-24',11,23),
 (16,6,2,NULL,NULL,NULL,0,51,'2010-09-24 21:43:09','2010-10-24',11,14),
 (17,6,76,NULL,NULL,NULL,0,38,'2010-09-24 21:43:09','2010-10-24',3,24),
 (18,6,65,NULL,NULL,NULL,0,62,'2010-09-24 21:43:09','2010-10-24',4,31),
 (19,7,4,NULL,NULL,NULL,0,11,'2010-09-25 00:50:03','2010-10-25',11,13),
 (20,7,2,NULL,NULL,NULL,0,51,'2010-09-25 00:50:03','2010-10-25',11,14),
 (21,7,35,NULL,NULL,NULL,0,65,'2010-09-25 00:50:03','2010-10-25',3,24),
 (22,7,69,NULL,NULL,NULL,0,67,'2010-09-25 00:50:03','2010-10-25',4,31),
 (23,7,5,NULL,NULL,NULL,0,52,'2010-09-25 00:50:04','2010-10-25',11,13),
 (24,8,10,NULL,NULL,NULL,0,26,'2010-09-25 00:51:34','2010-10-25',11,15),
 (25,8,1,NULL,NULL,NULL,0,1,'2010-09-25 00:51:34','2010-10-25',11,23),
 (26,9,4,NULL,NULL,NULL,0,12,'2010-09-25 00:52:45','2010-10-25',11,13),
 (27,9,26,NULL,NULL,NULL,0,58,'2010-09-25 00:52:45','2010-10-25',3,27),
 (28,9,3,NULL,NULL,NULL,0,6,'2010-09-25 00:52:45','2010-10-25',11,23),
 (29,10,26,NULL,NULL,NULL,0,61,'2010-09-25 00:53:38','2010-10-25',3,27);
/*!40000 ALTER TABLE `chitietphieumuon` ENABLE KEYS */;


--
-- Definition of table `cuonsach`
--

DROP TABLE IF EXISTS `cuonsach`;
CREATE TABLE `cuonsach` (
  `Ma` int(10) unsigned NOT NULL auto_increment,
  `MaCuonSach` varchar(120) default NULL,
  `MaSach` int(10) unsigned default NULL,
  PRIMARY KEY  USING BTREE (`Ma`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuonsach`
--

/*!40000 ALTER TABLE `cuonsach` DISABLE KEYS */;
INSERT INTO `cuonsach` (`Ma`,`MaCuonSach`,`MaSach`) VALUES 
 (1,'T01',1),
 (2,'H01',3),
 (3,'H02',3),
 (4,'H03',3),
 (5,'H04',3),
 (6,'H05',3),
 (7,'H06',3),
 (8,'KTCC01',4),
 (9,'KTCC02',4),
 (10,'KTCC03',4),
 (11,'KTCC04',4),
 (12,'KTCC05',4),
 (13,'KTCC06',4),
 (14,'C#01',8),
 (15,'C#02',8),
 (16,'C#03',8),
 (17,'C#04',8),
 (18,'C#05',8),
 (19,'C#06',8),
 (20,'ÄCB01',11),
 (21,'ÄCB02',11),
 (22,'ÄCB03',11),
 (23,'ÄCB04',11),
 (24,'ÄCB05',11),
 (25,'ÄCB06',11),
 (26,'HH01',10),
 (27,'HH02',10),
 (28,'HH03',10),
 (29,'HH04',10),
 (30,'HH05',10),
 (31,'HH06',10),
 (32,'Ck01',18),
 (33,'Ck02',18),
 (34,'Ck03',18),
 (35,'Ck04',18),
 (36,'Ck05',18),
 (37,'Ck06',18),
 (38,'TCKH01',76),
 (39,'TCKH02',37),
 (40,'TCKH03',37),
 (41,'TCKH04',37),
 (42,'TCKH05',37),
 (43,'TCKH06',37),
 (44,'TVN01',43),
 (45,'TVN02',43),
 (46,'TVN03',43),
 (47,'TVN04',43),
 (48,'TVN05',43),
 (49,'TVN06',43),
 (50,'CBUML1',2),
 (51,'CBUML2',2),
 (52,'KTVM01',5),
 (53,'KTVM02',5),
 (54,'DSKT01',17),
 (55,'DSKT02',17),
 (56,'TCNCDT01',29),
 (57,'TCNCDT02',29),
 (58,'TCOTO01',26),
 (59,'KTMT01',56),
 (60,'KTMT02',56),
 (61,'TCOTO02',26),
 (62,'WSBH01',65),
 (63,'WSBH0',65),
 (64,'LRTH01',62),
 (65,'ECHIP01',35),
 (66,'PPXDCD01',58),
 (67,'WSNS01',69);
/*!40000 ALTER TABLE `cuonsach` ENABLE KEYS */;


--
-- Definition of table `khoa`
--

DROP TABLE IF EXISTS `khoa`;
CREATE TABLE `khoa` (
  `MaKhoa` int(10) unsigned NOT NULL auto_increment,
  `TenKhoa` varchar(45) default NULL,
  PRIMARY KEY  (`MaKhoa`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khoa`
--

/*!40000 ALTER TABLE `khoa` DISABLE KEYS */;
INSERT INTO `khoa` (`MaKhoa`,`TenKhoa`) VALUES 
 (1,'Khoa Kinh Táº¿'),
 (2,'Khoa HÃ ng Háº£i'),
 (3,'Khoa CNTT'),
 (4,'Khoa ÄÃ³ng TÃ u'),
 (5,'Khoa CÃ´ng TrÃ¬nh'),
 (6,'Khoa MÃ¡y TÃ u Thá»§y'),
 (7,'Khoa Äiá»‡n - ÄTVT'),
 (8,'Khoa CÆ¡ KhÃ­');
/*!40000 ALTER TABLE `khoa` ENABLE KEYS */;


--
-- Definition of table `lienhewebsite`
--

DROP TABLE IF EXISTS `lienhewebsite`;
CREATE TABLE `lienhewebsite` (
  `MaLienhe` int(10) unsigned NOT NULL auto_increment,
  `TenWebsite` varchar(200) default NULL,
  `Link` varchar(200) default NULL,
  `Visible` tinyint(3) unsigned default NULL,
  `KieuMo` varchar(45) default NULL,
  PRIMARY KEY  (`MaLienhe`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lienhewebsite`
--

/*!40000 ALTER TABLE `lienhewebsite` DISABLE KEYS */;
INSERT INTO `lienhewebsite` (`MaLienhe`,`TenWebsite`,`Link`,`Visible`,`KieuMo`) VALUES 
 (1,'TV KH Tá»•ng Há»£p TP HCM','http://www.gslhcm.org.vn/',1,'_blank'),
 (2,'TV ÄH NÃ´ng LÃ¢m','http://elib.hcmuaf.edu.vn/',1,'_blank'),
 (3,'TV ÄH BÃ¡ch Khoa TP HCM','http://www.lib.hcmut.edu.vn/?PageID=PublicPage',1,'_blank'),
 (4,'TV  Äáº¡i Há»c Kinh Táº¿','http://www.lib.ueh.edu.vn/',1,'_blank'),
 (5,'TV ÄH SÆ° Pháº¡m KÃ½ Thuáº­t','http://www.thuvienspkt.edu.vn/',1,'_blank'),
 (6,'TV  Online','http://thuvienonline.sachhay.com/',1,'_blank'),
 (7,'TV Quá»‘c Gia Viá»‡t Nam','http://www.nlv.gov.vn/nlv/',1,'_blank'),
 (8,'TV ÄH Ngoáº¡i ThÆ°Æ¡ng','http://www1.ftu.edu.vn/',1,'_blank'),
 (9,'TV ÄH NgÃ¢n HÃ ng','http://www.buh.edu.vn/',1,'_blank'),
 (10,'TV ÄH Ká»¹ Thuáº­t CÃ´ng Nghá»‡','http://www.vinatop.com/detail/link-423.html',1,'_blank'),
 (11,'---Chá»n liÃªn káº¿t ---',NULL,1,'_blank');
/*!40000 ALTER TABLE `lienhewebsite` ENABLE KEYS */;


--
-- Definition of table `linhvuc`
--

DROP TABLE IF EXISTS `linhvuc`;
CREATE TABLE `linhvuc` (
  `MaLinhVuc` int(10) unsigned NOT NULL auto_increment,
  `TenLinhVuc` varchar(45) default NULL,
  `HienLinhVuc` tinyint(10) unsigned default NULL,
  `HienMenu` tinyint(10) unsigned default NULL,
  PRIMARY KEY  (`MaLinhVuc`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `linhvuc`
--

/*!40000 ALTER TABLE `linhvuc` DISABLE KEYS */;
INSERT INTO `linhvuc` (`MaLinhVuc`,`TenLinhVuc`,`HienLinhVuc`,`HienMenu`) VALUES 
 (3,'Táº¡p ChÃ­',1,1),
 (4,'Luáº­n VÄƒn Tá»‘t Nghiá»‡p',1,1),
 (11,'SÃ¡ch',1,1);
/*!40000 ALTER TABLE `linhvuc` ENABLE KEYS */;


--
-- Definition of table `loguser`
--

DROP TABLE IF EXISTS `loguser`;
CREATE TABLE `loguser` (
  `MaLoguser` int(10) unsigned NOT NULL auto_increment,
  `MaThanhVien` int(10) unsigned default NULL,
  `IpUser` varchar(70) default NULL,
  `DataTimeOut` datetime default NULL,
  `DataTimeIn` datetime default NULL,
  `SessionLogUser` varchar(200) default NULL,
  PRIMARY KEY  (`MaLoguser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loguser`
--

/*!40000 ALTER TABLE `loguser` DISABLE KEYS */;
/*!40000 ALTER TABLE `loguser` ENABLE KEYS */;


--
-- Definition of table `lop`
--

DROP TABLE IF EXISTS `lop`;
CREATE TABLE `lop` (
  `MaLop` int(10) unsigned NOT NULL auto_increment,
  `TenLop` varchar(45) default NULL,
  `MaKhoa` int(10) unsigned default NULL,
  PRIMARY KEY  (`MaLop`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lop`
--

/*!40000 ALTER TABLE `lop` DISABLE KEYS */;
INSERT INTO `lop` (`MaLop`,`TenLop`,`MaKhoa`) VALUES 
 (1,'CN07A',3),
 (2,'CN07B',3),
 (3,'CN06A',3),
 (4,'CN06B',3),
 (5,'CN07C',3),
 (6,'CN08A',3),
 (7,'KT07A',1),
 (8,'KT07B',1),
 (9,'KT07C',1),
 (10,'KT08A',1),
 (11,'KT08B',1),
 (12,'KT08C',1),
 (13,'HH07A',2),
 (14,'HH07B',2),
 (15,'HH08A',2),
 (16,'HH08B',2),
 (17,'HH09A',2),
 (18,'HH09B',2),
 (19,'QG07',5),
 (20,'QG08',5),
 (21,'QG09',5),
 (22,'DT07A',7),
 (23,'DT07B',7),
 (24,'DT08A',7),
 (25,'MT07A',6),
 (26,'MT07B',6),
 (27,'MT08A',6),
 (28,'MT08B',6),
 (29,'CO07A',8),
 (30,'CO07B',8);
/*!40000 ALTER TABLE `lop` ENABLE KEYS */;


--
-- Definition of table `ngonngusach`
--

DROP TABLE IF EXISTS `ngonngusach`;
CREATE TABLE `ngonngusach` (
  `MaNgonNguSach` int(10) unsigned NOT NULL auto_increment,
  `TenNgonNguSach` varchar(50) default NULL,
  PRIMARY KEY  USING BTREE (`MaNgonNguSach`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ngonngusach`
--

/*!40000 ALTER TABLE `ngonngusach` DISABLE KEYS */;
INSERT INTO `ngonngusach` (`MaNgonNguSach`,`TenNgonNguSach`) VALUES 
 (1,'Tiáº¿ng Anh'),
 (2,'Tiáº¿ng Hoa'),
 (3,'Tiáº¿ng HÃ n '),
 (4,'Tiáº¿ng Nháº­t'),
 (5,'Tiáº¿ng Viá»‡t'),
 (6,'Tiáº¿ng Má»¹'),
 (7,'Tiáº¿ng Äá»©c');
/*!40000 ALTER TABLE `ngonngusach` ENABLE KEYS */;


--
-- Definition of table `nhaxuatban`
--

DROP TABLE IF EXISTS `nhaxuatban`;
CREATE TABLE `nhaxuatban` (
  `MaNhaXuatBan` int(10) unsigned NOT NULL auto_increment,
  `TenNhaXuatBan` varchar(100) default NULL,
  PRIMARY KEY  (`MaNhaXuatBan`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhaxuatban`
--

/*!40000 ALTER TABLE `nhaxuatban` DISABLE KEYS */;
INSERT INTO `nhaxuatban` (`MaNhaXuatBan`,`TenNhaXuatBan`) VALUES 
 (1,'NXB TRáºº'),
 (2,'NXB VÄ‚N HÃ“A'),
 (3,'NXB THANH NIÃŠN'),
 (4,'NXB ÄÃ€ Náº´NG'),
 (5,'NXB QUá»C GIA'),
 (6,'NXB GIÃO Dá»¤C');
/*!40000 ALTER TABLE `nhaxuatban` ENABLE KEYS */;


--
-- Definition of table `nhomsach`
--

DROP TABLE IF EXISTS `nhomsach`;
CREATE TABLE `nhomsach` (
  `MaNhomSach` int(10) unsigned NOT NULL auto_increment,
  `TenNhomSach` varchar(150) default NULL,
  `MaLinhVuc` int(10) unsigned default NULL,
  `MaViTri` int(10) unsigned default NULL,
  `HienMenu1` tinyint(10) unsigned default NULL,
  PRIMARY KEY  (`MaNhomSach`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nhomsach`
--

/*!40000 ALTER TABLE `nhomsach` DISABLE KEYS */;
INSERT INTO `nhomsach` (`MaNhomSach`,`TenNhomSach`,`MaLinhVuc`,`MaViTri`,`HienMenu1`) VALUES 
 (13,'ChuyÃªn NgÃ nh Kinh Táº¿ ',11,1,1),
 (14,'ChuyÃªn NgÃ nh CNTT',11,2,1),
 (15,'ChuyÃªn NgÃ nh HÃ ng Háº£i',11,8,1),
 (17,'ChuyÃªn NgÃ nh CÃ´ng TrÃ¬nh',11,4,1),
 (19,'ChuyÃªn NgÃ nh MT  Thá»§y',11,6,1),
 (20,'ChuyÃªn NgÃ nh CÆ¡ KhÃ­',11,7,1),
 (21,'ChuyÃªn NgÃ nh ÄTá»­ - ÄTVT',11,5,1),
 (22,'ChuyÃªn NgÃ nh ÄÃ³ng TÃ u',11,3,1),
 (23,'Äáº¡i CÆ°Æ¡ng',11,9,1),
 (24,'Vi TÃ­nh',3,11,1),
 (25,'Biá»ƒn',3,12,1),
 (26,'Kinh Táº¿',3,13,1),
 (27,'CÆ¡ KhÃ­ -Ã” TÃ´',3,14,1),
 (28,'HÃ ng Háº£i',3,15,1),
 (29,'Cáº§u ÄÆ°á»ng',3,16,1),
 (30,'CÃ´ng TrÃ¬nh',4,10,1),
 (31,'CNTT',4,10,1),
 (32,'An ToÃ n HÃ ng Háº£i',4,18,1),
 (33,'Äiá»u Khiá»ƒn TÃ u Biá»ƒn',4,20,1),
 (34,'CÃ´ng TrÃ¬nh Thá»§y',4,21,1),
 (35,'Khai ThÃ¡c VHMT Thá»§y',4,17,1),
 (36,'CÆ¡ Giá»›i HÃ³a Xáº¿p Dá»¡',4,19,1);
/*!40000 ALTER TABLE `nhomsach` ENABLE KEYS */;


--
-- Definition of table `phanloaisach`
--

DROP TABLE IF EXISTS `phanloaisach`;
CREATE TABLE `phanloaisach` (
  `MaPhanLoaiSach` int(10) unsigned NOT NULL auto_increment,
  `TenPhanLoaiSach` varchar(45) default NULL,
  `Visible` tinyint(5) unsigned default NULL,
  PRIMARY KEY  (`MaPhanLoaiSach`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phanloaisach`
--

/*!40000 ALTER TABLE `phanloaisach` DISABLE KEYS */;
INSERT INTO `phanloaisach` (`MaPhanLoaiSach`,`TenPhanLoaiSach`,`Visible`) VALUES 
 (1,'SÃ¡ch Má»›i',1),
 (2,'SÃ¡ch CÅ©',1);
/*!40000 ALTER TABLE `phanloaisach` ENABLE KEYS */;


--
-- Definition of table `phieumuon`
--

DROP TABLE IF EXISTS `phieumuon`;
CREATE TABLE `phieumuon` (
  `MaPhieuMuon` int(10) unsigned NOT NULL auto_increment,
  `MaThanhVien` int(10) unsigned default NULL,
  `NgayHetHanThe` datetime default NULL,
  `NgayLapThe` datetime default NULL,
  `TenThanhVien` varchar(100) default NULL,
  `TenPhieuMuon` varchar(50) default NULL,
  PRIMARY KEY  (`MaPhieuMuon`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieumuon`
--

/*!40000 ALTER TABLE `phieumuon` DISABLE KEYS */;
INSERT INTO `phieumuon` (`MaPhieuMuon`,`MaThanhVien`,`NgayHetHanThe`,`NgayLapThe`,`TenThanhVien`,`TenPhieuMuon`) VALUES 
 (3,14,'2010-09-08 00:00:00','2010-09-23 07:20:52','250728860','PM01'),
 (4,2,'2010-09-07 00:00:00','2010-09-23 07:21:07','123','PM02'),
 (5,3,'2011-09-24 00:00:00','2010-09-23 07:24:43','1234','PM03'),
 (6,4,'2011-09-24 00:00:00','2010-09-23 07:24:43','12345','PM04'),
 (7,5,'2011-09-24 00:00:00','2010-09-23 07:43:48','123456','PM05'),
 (8,6,'2011-09-24 00:00:00','2010-09-23 08:28:57','1234567','PM06'),
 (9,8,'2011-09-24 00:00:00','2010-09-23 08:28:57','12345678','PM07'),
 (10,9,'2011-09-24 00:00:00','2010-09-23 08:28:57','123456789','PM08');
/*!40000 ALTER TABLE `phieumuon` ENABLE KEYS */;


--
-- Definition of table `qub3_queries_que`
--

DROP TABLE IF EXISTS `qub3_queries_que`;
CREATE TABLE `qub3_queries_que` (
  `name_que` varchar(50) NOT NULL,
  `query_que` longtext NOT NULL,
  `desc_que` longtext NOT NULL,
  `tables_que` longtext NOT NULL,
  `version_que` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qub3_queries_que`
--

/*!40000 ALTER TABLE `qub3_queries_que` DISABLE KEYS */;
INSERT INTO `qub3_queries_que` (`name_que`,`query_que`,`desc_que`,`tables_que`,`version_que`) VALUES 
 ('q_sach','SELECT%20linhvuc.MaLinhVuc%2C%20linhvuc.TenLinhVuc%2C%20tacgia.TenTacGia%2C%20tacgia.MaTacGia%2C%20nhaxuatban.MaNhaXuatBan%2C%20nhaxuatban.TenNhaXuatBan%2C%20sach.MasSach%2C%20sach.TenSach%2C%20sach.cosachmoi%2C%20sach.GhiChu%0AFROM%20%28%28%28sach%0ALEFT%20JOIN%20linhvuc%20ON%20linhvuc.MaLinhVuc%3Dsach.MaLinhVuc%29%0ALEFT%20JOIN%20nhaxuatban%20ON%20nhaxuatban.MaNhaXuatBan%3Dsach.MaNhaXuatBan%29%0ALEFT%20JOIN%20tacgia%20ON%20tacgia.MaTacGia%3Dsach.MaTacGia%29%0AWHERE%20linhvuc.MaLinhVuc%3D%22.%24_GET%5B%22cat%22%5D.%22%0D%0A%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_sach%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100805232626%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100805232626%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22linhvuc%22%2C%20%22linhvuc%22%29%3Btmp.table_name%20%3D%20%22linhvuc%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22linhvuc%22%2C89%2C85%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_0798_6_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22cat%22%3Btmp3.test_value%20%3D%20%2211%22%3Btmp3.string%20%3D%20%22%3D%24_GET%5B%5C%22cat%5C%22%5D%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22TenLinhVuc%22%2C%20%22TenLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienLinhVuc%22%2C%20%22HienLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu%22%2C%20%22HienMenu%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22tacgia%22%2C%20%22tacgia%22%29%3Btmp.table_name%20%3D%20%22tacgia%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22tacgia%22%2C87%2C232%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenTacGia%22%2C%20%22TenTacGia%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp%20%3D%20z.new_table%28%22nhaxuatban%22%2C%20%22nhaxuatban%22%29%3Btmp.table_name%20%3D%20%22nhaxuatban%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22nhaxuatban%22%2C641%2C57%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenNhaXuatBan%22%2C%20%22TenNhaXuatBan%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%205%3Bvar%20tmp%20%3D%20z.new_table%28%22sach%22%2C%20%22sach%22%29%3Btmp.table_name%20%3D%20%22sach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22sach%22%2C369%2C14%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MasSach%22%2C%20%22MasSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%206%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoTrang%22%2C%20%22SoTrang%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GiaTien%22%2C%20%22GiaTien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NamXuatBan%22%2C%20%22NamXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GhiChu%22%2C%20%22GhiChu%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%209%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNgonNgu%22%2C%20%22MaNgonNgu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenSach%22%2C%20%22TenSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%207%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Visible%22%2C%20%22Visible%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaPhanLoaiSach%22%2C%20%22MaPhanLoaiSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanMuon%22%2C%20%22SoLanMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LanXuatBan%22%2C%20%22LanXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Hinh%22%2C%20%22Hinh%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLuongNap%22%2C%20%22SoLuongNap%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachSuDungDuoc%22%2C%20%22SoSachSuDungDuoc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachConTrongKHo%22%2C%20%22SoSachConTrongKHo%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22cosachmoi%22%2C%20%22cosachmoi%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%208%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_7654_9_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22tacgia%22%3Btmp.field1%20%3D%20%22MaTacGia%22%3Btmp.field2%20%3D%20%22MaTacGia%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A308%2C%20relTop1%3A157%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_7654_10_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22nhaxuatban%22%3Btmp.field1%20%3D%20%22MaNhaXuatBan%22%3Btmp.field2%20%3D%20%22MaNhaXuatBan%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A611%2C%20relTop1%3A141%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_7654_11_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22linhvuc%22%3Btmp.field1%20%3D%20%22MaLinhVuc%22%3Btmp.field2%20%3D%20%22MaLinhVuc%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A310%2C%20relTop1%3A253%2C%20relTop2%3A45%7D%3B',' ','1.0'),
 ('q_chitietsach','SELECT%20linhvuc.MaLinhVuc%2C%20linhvuc.TenLinhVuc%2C%20nhaxuatban.MaNhaXuatBan%2C%20nhaxuatban.TenNhaXuatBan%2C%20sach.SoTrang%2C%20sach.GiaTien%2C%20sach.NamXuatBan%2C%20sach.GhiChu%2C%20sach.TenSach%2C%20sach.LanXuatBan%2C%20tacgia.MaTacGia%2C%20tacgia.TenTacGia%2C%20ngonngusach.MaNgonNguSach%2C%20ngonngusach.TenNgonNguSach%2C%20sach.MasSach%2C%20nhomsach.MaNhomSach%2C%20nhomsach.TenNhomSach%2C%20vitri.TenViTri%2C%20vitri.MaViTri%0AFROM%20%28%28%28%28%28%28sach%0ALEFT%20JOIN%20linhvuc%20ON%20linhvuc.MaLinhVuc%3Dsach.MaLinhVuc%29%0ALEFT%20JOIN%20nhaxuatban%20ON%20nhaxuatban.MaNhaXuatBan%3Dsach.MaNhaXuatBan%29%0ALEFT%20JOIN%20tacgia%20ON%20tacgia.MaTacGia%3Dsach.MaTacGia%29%0ALEFT%20JOIN%20ngonngusach%20ON%20ngonngusach.MaNgonNguSach%3Dsach.MaNgonNgu%29%0ALEFT%20JOIN%20nhomsach%20ON%20nhomsach.MaNhomSach%3Dsach.MaNhom%29%0ALEFT%20JOIN%20vitri%20ON%20vitri.MaViTri%3Dnhomsach.MaViTri%29%0AWHERE%20sach.MasSach%3D%22.%24_GET%5B%22masach%22%5D.%22%0D%0A%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_chitietsach%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100808222108%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100808222108%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22sach%22%2C%20%22sach%22%29%3Btmp.table_name%20%3D%20%22sach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22sach%22%2C260%2C7%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MasSach%22%2C%20%22MasSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2014%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_3519_18_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22masach%22%3Btmp3.test_value%20%3D%20%221%22%3Btmp3.string%20%3D%20%22%3D%24_GET%5B%5C%22masach%5C%22%5D%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22SoTrang%22%2C%20%22SoTrang%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GiaTien%22%2C%20%22GiaTien%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%205%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NamXuatBan%22%2C%20%22NamXuatBan%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%206%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GhiChu%22%2C%20%22GhiChu%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%207%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNgonNgu%22%2C%20%22MaNgonNgu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenSach%22%2C%20%22TenSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%208%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Visible%22%2C%20%22Visible%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaPhanLoaiSach%22%2C%20%22MaPhanLoaiSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanMuon%22%2C%20%22SoLanMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LanXuatBan%22%2C%20%22LanXuatBan%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%209%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Hinh%22%2C%20%22Hinh%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLuongNap%22%2C%20%22SoLuongNap%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachSuDungDuoc%22%2C%20%22SoSachSuDungDuoc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachConTrongKHo%22%2C%20%22SoSachConTrongKHo%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22linhvuc%22%2C%20%22linhvuc%22%29%3Btmp.table_name%20%3D%20%22linhvuc%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22linhvuc%22%2C46%2C3%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenLinhVuc%22%2C%20%22TenLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienLinhVuc%22%2C%20%22HienLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu%22%2C%20%22HienMenu%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22nhaxuatban%22%2C%20%22nhaxuatban%22%29%3Btmp.table_name%20%3D%20%22nhaxuatban%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22nhaxuatban%22%2C18%2C213%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenNhaXuatBan%22%2C%20%22TenNhaXuatBan%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp%20%3D%20z.new_table%28%22tacgia%22%2C%20%22tacgia%22%29%3Btmp.table_name%20%3D%20%22tacgia%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22tacgia%22%2C520%2C5%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2010%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenTacGia%22%2C%20%22TenTacGia%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2011%3Bvar%20tmp%20%3D%20z.new_table%28%22ngonngusach%22%2C%20%22ngonngusach%22%29%3Btmp.table_name%20%3D%20%22ngonngusach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22ngonngusach%22%2C14%2C122%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaNgonNguSach%22%2C%20%22MaNgonNguSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2012%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenNgonNguSach%22%2C%20%22TenNgonNguSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2013%3Bvar%20tmp%20%3D%20z.new_table%28%22nhomsach%22%2C%20%22nhomsach%22%29%3Btmp.table_name%20%3D%20%22nhomsach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22nhomsach%22%2C527%2C127%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaNhomSach%22%2C%20%22MaNhomSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2015%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenNhomSach%22%2C%20%22TenNhomSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2016%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaViTri%22%2C%20%22MaViTri%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu1%22%2C%20%22HienMenu1%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22vitri%22%2C%20%22vitri%22%29%3Btmp.table_name%20%3D%20%22vitri%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22vitri%22%2C750%2C126%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaViTri%22%2C%20%22MaViTri%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2018%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenViTri%22%2C%20%22TenViTri%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2017%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Khu%22%2C%20%22Khu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Ke%22%2C%20%22Ke%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Ngan%22%2C%20%22Ngan%22%29%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_4390_7_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22ngonngusach%22%3Btmp.field1%20%3D%20%22MaNgonNgu%22%3Btmp.field2%20%3D%20%22MaNgonNguSach%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A230%2C%20relTop1%3A173%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_4390_8_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22tacgia%22%3Btmp.field1%20%3D%20%22MaTacGia%22%3Btmp.field2%20%3D%20%22MaTacGia%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A494%2C%20relTop1%3A157%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_4390_9_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22nhomsach%22%3Btmp.field1%20%3D%20%22MaNhom%22%3Btmp.field2%20%3D%20%22MaNhomSach%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A497%2C%20relTop1%3A125%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_4390_10_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22nhaxuatban%22%3Btmp.field1%20%3D%20%22MaNhaXuatBan%22%3Btmp.field2%20%3D%20%22MaNhaXuatBan%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A231%2C%20relTop1%3A141%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_4390_11_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22linhvuc%22%3Btmp.field1%20%3D%20%22MaLinhVuc%22%3Btmp.field2%20%3D%20%22MaLinhVuc%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A232%2C%20relTop1%3A253%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_4390_16_%22%29%3Btmp.table1%20%3D%20%22nhomsach%22%3Btmp.table2%20%3D%20%22vitri%22%3Btmp.field1%20%3D%20%22MaViTri%22%3Btmp.field2%20%3D%20%22MaViTri%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A726%2C%20relTop1%3A93%2C%20relTop2%3A45%7D%3B',' ','1.0'),
 ('q_kquatimkiem1','SELECT%20linhvuc.MaLinhVuc%2C%20linhvuc.TenLinhVuc%2C%20tacgia.MaTacGia%2C%20tacgia.TenTacGia%2C%20sach.MasSach%2C%20sach.GhiChu%2C%20sach.TenSach%2C%20sach.Visible%0AFROM%20%28%28sach%0ALEFT%20JOIN%20linhvuc%20ON%20linhvuc.MaLinhVuc%3Dsach.MaLinhVuc%29%0ALEFT%20JOIN%20tacgia%20ON%20tacgia.MaTacGia%3Dsach.MaTacGia%29%0AWHERE%20linhvuc.MaLinhVuc%3D%22.%24_POST%5B%22key2%22%5D.%22%0D%0A%20AND%20sach.TenSach%20LIKE%20%27%25%22.%24_POST%5B%22key1%22%5D.%22%25%27%0D%0A%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_kquatimkiem1%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100810184135%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100810184135%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22sach%22%2C%20%22sach%22%29%3Btmp.table_name%20%3D%20%22sach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22sach%22%2C320%2C9%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MasSach%22%2C%20%22MasSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoTrang%22%2C%20%22SoTrang%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GiaTien%22%2C%20%22GiaTien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NamXuatBan%22%2C%20%22NamXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GhiChu%22%2C%20%22GhiChu%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%205%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNgonNgu%22%2C%20%22MaNgonNgu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenSach%22%2C%20%22TenSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%206%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_2926_12_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22contains%22%3Btmp3.var_type%20%3D%20%22Form%20Variable%22%3Btmp3.param_name%20%3D%20%22key1%22%3Btmp3.test_value%20%3D%20%22kinh%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22Visible%22%2C%20%22Visible%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%207%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaPhanLoaiSach%22%2C%20%22MaPhanLoaiSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanMuon%22%2C%20%22SoLanMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LanXuatBan%22%2C%20%22LanXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Hinh%22%2C%20%22Hinh%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLuongNap%22%2C%20%22SoLuongNap%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachSuDungDuoc%22%2C%20%22SoSachSuDungDuoc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachConTrongKHo%22%2C%20%22SoSachConTrongKHo%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22linhvuc%22%2C%20%22linhvuc%22%29%3Btmp.table_name%20%3D%20%22linhvuc%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22linhvuc%22%2C79%2C107%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_2926_11_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22Form%20Variable%22%3Btmp3.param_name%20%3D%20%22key2%22%3Btmp3.test_value%20%3D%20%2211%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22TenLinhVuc%22%2C%20%22TenLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienLinhVuc%22%2C%20%22HienLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu%22%2C%20%22HienMenu%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22tacgia%22%2C%20%22tacgia%22%29%3Btmp.table_name%20%3D%20%22tacgia%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22tacgia%22%2C659%2C31%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenTacGia%22%2C%20%22TenTacGia%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_2926_9_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22tacgia%22%3Btmp.field1%20%3D%20%22MaTacGia%22%3Btmp.field2%20%3D%20%22MaTacGia%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A595%2C%20relTop1%3A157%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_2926_10_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22linhvuc%22%3Btmp.field1%20%3D%20%22MaLinhVuc%22%3Btmp.field2%20%3D%20%22MaLinhVuc%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A280%2C%20relTop1%3A253%2C%20relTop2%3A45%7D%3B',' ','1.0'),
 ('q_thongke','SELECT%20linhvuc.MaLinhVuc%2C%20linhvuc.TenLinhVuc%2C%20nhomsach.MaNhomSach%2C%20nhomsach.TenNhomSach%2C%20sach.MasSach%2C%20sach.SoLuongNap%2C%20sach.SoSachSuDungDuoc%2C%20sach.TenSach%0AFROM%20%28%28sach%0ALEFT%20JOIN%20linhvuc%20ON%20linhvuc.MaLinhVuc%3Dsach.MaLinhVuc%29%0ALEFT%20JOIN%20nhomsach%20ON%20nhomsach.MaNhomSach%3Dsach.MaNhom%29%0AWHERE%20linhvuc.MaLinhVuc%3D%22.%24_GET%5B%22key2%22%5D.%22%0D%0A%20AND%20nhomsach.MaNhomSach%3D%22.%24_GET%5B%22key3%22%5D.%22%0D%0A%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_thongke%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100811085524%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100811085524%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22linhvuc%22%2C%20%22linhvuc%22%29%3Btmp.table_name%20%3D%20%22linhvuc%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22linhvuc%22%2C30%2C30%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_1021_4_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22key2%22%3Btmp3.test_value%20%3D%20%2211%22%3Btmp3.string%20%3D%20%22%3D%24_GET%5B%5C%22linhvuc%5C%22%5D%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22TenLinhVuc%22%2C%20%22TenLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienLinhVuc%22%2C%20%22HienLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu%22%2C%20%22HienMenu%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22sach%22%2C%20%22sach%22%29%3Btmp.table_name%20%3D%20%22sach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22sach%22%2C313%2C13%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MasSach%22%2C%20%22MasSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoTrang%22%2C%20%22SoTrang%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GiaTien%22%2C%20%22GiaTien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NamXuatBan%22%2C%20%22NamXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GhiChu%22%2C%20%22GhiChu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNgonNgu%22%2C%20%22MaNgonNgu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenSach%22%2C%20%22TenSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%207%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Visible%22%2C%20%22Visible%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaPhanLoaiSach%22%2C%20%22MaPhanLoaiSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanMuon%22%2C%20%22SoLanMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LanXuatBan%22%2C%20%22LanXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Hinh%22%2C%20%22Hinh%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLuongNap%22%2C%20%22SoLuongNap%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%205%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachSuDungDuoc%22%2C%20%22SoSachSuDungDuoc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%206%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachConTrongKHo%22%2C%20%22SoSachConTrongKHo%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22cosachmoi%22%2C%20%22cosachmoi%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22nhomsach%22%2C%20%22nhomsach%22%29%3Btmp.table_name%20%3D%20%22nhomsach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22nhomsach%22%2C633%2C27%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaNhomSach%22%2C%20%22MaNhomSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_7296_4_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22key3%22%3Btmp3.test_value%20%3D%20%2214%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22TenNhomSach%22%2C%20%22TenNhomSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaViTri%22%2C%20%22MaViTri%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu1%22%2C%20%22HienMenu1%22%29%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_5604_9_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22nhomsach%22%3Btmp.field1%20%3D%20%22MaNhom%22%3Btmp.field2%20%3D%20%22MaNhomSach%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A573%2C%20relTop1%3A125%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_5604_13_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22linhvuc%22%3Btmp.field1%20%3D%20%22MaLinhVuc%22%3Btmp.field2%20%3D%20%22MaLinhVuc%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A246%2C%20relTop1%3A253%2C%20relTop2%3A45%7D%3B',' ','1.0'),
 ('q_ketquatimkiem1khoa','SELECT%20linhvuc.MaLinhVuc%2C%20linhvuc.TenLinhVuc%2C%20sach.MasSach%2C%20tacgia.MaTacGia%2C%20tacgia.TenTacGia%2C%20sach.GhiChu%2C%20sach.TenSach%2C%20sach.cosachmoi%0AFROM%20%28%28sach%0ALEFT%20JOIN%20linhvuc%20ON%20linhvuc.MaLinhVuc%3Dsach.MaLinhVuc%29%0ALEFT%20JOIN%20tacgia%20ON%20tacgia.MaTacGia%3Dsach.MaTacGia%29%0AWHERE%20linhvuc.MaLinhVuc%3D%22.%24_GET%5B%22key2%22%5D.%22%0D%0A%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_ketquatimkiem1khoa%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100814222723%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100814222723%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22sach%22%2C%20%22sach%22%29%3Btmp.table_name%20%3D%20%22sach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22sach%22%2C340%2C0%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MasSach%22%2C%20%22MasSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoTrang%22%2C%20%22SoTrang%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GiaTien%22%2C%20%22GiaTien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NamXuatBan%22%2C%20%22NamXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GhiChu%22%2C%20%22GhiChu%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%205%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNgonNgu%22%2C%20%22MaNgonNgu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenSach%22%2C%20%22TenSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%206%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Visible%22%2C%20%22Visible%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaPhanLoaiSach%22%2C%20%22MaPhanLoaiSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanMuon%22%2C%20%22SoLanMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LanXuatBan%22%2C%20%22LanXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLuongNap%22%2C%20%22SoLuongNap%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachSuDungDuoc%22%2C%20%22SoSachSuDungDuoc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachConTrongKHo%22%2C%20%22SoSachConTrongKHo%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22cosachmoi%22%2C%20%22cosachmoi%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%207%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayCapNhat%22%2C%20%22NgayCapNhat%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22linhvuc%22%2C%20%22linhvuc%22%29%3Btmp.table_name%20%3D%20%22linhvuc%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22linhvuc%22%2C126%2C133%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_3478_11_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22key2%22%3Btmp3.test_value%20%3D%20%2211%22%3Btmp3.string%20%3D%20%22%3D%24_GET%5B%5C%22key2%5C%22%5D%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22TenLinhVuc%22%2C%20%22TenLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienLinhVuc%22%2C%20%22HienLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu%22%2C%20%22HienMenu%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22tacgia%22%2C%20%22tacgia%22%29%3Btmp.table_name%20%3D%20%22tacgia%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22tacgia%22%2C605%2C33%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenTacGia%22%2C%20%22TenTacGia%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_3478_9_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22tacgia%22%3Btmp.field1%20%3D%20%22MaTacGia%22%3Btmp.field2%20%3D%20%22MaTacGia%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A575%2C%20relTop1%3A157%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_3478_10_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22linhvuc%22%3Btmp.field1%20%3D%20%22MaLinhVuc%22%3Btmp.field2%20%3D%20%22MaLinhVuc%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A314%2C%20relTop1%3A253%2C%20relTop2%3A45%7D%3B',' ','1.0'),
 ('q_ketquatimkiem2khoa','SELECT%20linhvuc.MaLinhVuc%2C%20linhvuc.TenLinhVuc%2C%20sach.MasSach%2C%20tacgia.MaTacGia%2C%20tacgia.TenTacGia%2C%20sach.GhiChu%2C%20sach.TenSach%2C%20sach.cosachmoi%2C%20nhomsach.MaNhomSach%2C%20nhomsach.TenNhomSach%0AFROM%20%28%28%28sach%0ALEFT%20JOIN%20linhvuc%20ON%20linhvuc.MaLinhVuc%3Dsach.MaLinhVuc%29%0ALEFT%20JOIN%20tacgia%20ON%20tacgia.MaTacGia%3Dsach.MaTacGia%29%0ALEFT%20JOIN%20nhomsach%20ON%20nhomsach.MaNhomSach%3Dsach.MaNhom%29%0AWHERE%20linhvuc.MaLinhVuc%3D%22.%24_GET%5B%22key2%22%5D.%22%0D%0A%20AND%20nhomsach.MaNhomSach%3D%22.%24_GET%5B%22key3%22%5D.%22%0D%0A%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_ketquatimkiem1khoa%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100814222723%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100814222723%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22sach%22%2C%20%22sach%22%29%3Btmp.table_name%20%3D%20%22sach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22sach%22%2C340%2C0%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MasSach%22%2C%20%22MasSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoTrang%22%2C%20%22SoTrang%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GiaTien%22%2C%20%22GiaTien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NamXuatBan%22%2C%20%22NamXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GhiChu%22%2C%20%22GhiChu%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%205%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNgonNgu%22%2C%20%22MaNgonNgu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenSach%22%2C%20%22TenSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%206%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Visible%22%2C%20%22Visible%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaPhanLoaiSach%22%2C%20%22MaPhanLoaiSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanMuon%22%2C%20%22SoLanMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LanXuatBan%22%2C%20%22LanXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLuongNap%22%2C%20%22SoLuongNap%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachSuDungDuoc%22%2C%20%22SoSachSuDungDuoc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachConTrongKHo%22%2C%20%22SoSachConTrongKHo%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22cosachmoi%22%2C%20%22cosachmoi%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%207%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayCapNhat%22%2C%20%22NgayCapNhat%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22linhvuc%22%2C%20%22linhvuc%22%29%3Btmp.table_name%20%3D%20%22linhvuc%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22linhvuc%22%2C78%2C4%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_3478_11_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22key2%22%3Btmp3.test_value%20%3D%20%2211%22%3Btmp3.string%20%3D%20%22%3D%24_GET%5B%5C%22key2%5C%22%5D%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22TenLinhVuc%22%2C%20%22TenLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienLinhVuc%22%2C%20%22HienLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu%22%2C%20%22HienMenu%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22tacgia%22%2C%20%22tacgia%22%29%3Btmp.table_name%20%3D%20%22tacgia%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22tacgia%22%2C605%2C33%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenTacGia%22%2C%20%22TenTacGia%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp%20%3D%20z.new_table%28%22nhomsach%22%2C%20%22nhomsach%22%29%3Btmp.table_name%20%3D%20%22nhomsach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22nhomsach%22%2C70%2C148%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhomSach%22%2C%20%22MaNhomSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%208%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_6443_7_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22key3%22%3Btmp3.test_value%20%3D%20%2214%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22TenNhomSach%22%2C%20%22TenNhomSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%209%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaViTri%22%2C%20%22MaViTri%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu1%22%2C%20%22HienMenu1%22%29%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_3478_9_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22tacgia%22%3Btmp.field1%20%3D%20%22MaTacGia%22%3Btmp.field2%20%3D%20%22MaTacGia%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A571%2C%20relTop1%3A157%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_3478_10_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22linhvuc%22%3Btmp.field1%20%3D%20%22MaLinhVuc%22%3Btmp.field2%20%3D%20%22MaLinhVuc%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A310%2C%20relTop1%3A253%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_6443_6_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22nhomsach%22%3Btmp.field1%20%3D%20%22MaNhom%22%3Btmp.field2%20%3D%20%22MaNhomSach%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A294%2C%20relTop1%3A125%2C%20relTop2%3A45%7D%3B',' ','1.0'),
 ('q_ketquatimkiem3khoa','SELECT%20linhvuc.MaLinhVuc%2C%20linhvuc.TenLinhVuc%2C%20sach.MasSach%2C%20tacgia.MaTacGia%2C%20tacgia.TenTacGia%2C%20sach.GhiChu%2C%20sach.TenSach%2C%20sach.cosachmoi%2C%20nhomsach.MaNhomSach%2C%20nhomsach.TenNhomSach%0AFROM%20%28%28%28sach%0ALEFT%20JOIN%20linhvuc%20ON%20linhvuc.MaLinhVuc%3Dsach.MaLinhVuc%29%0ALEFT%20JOIN%20tacgia%20ON%20tacgia.MaTacGia%3Dsach.MaTacGia%29%0ALEFT%20JOIN%20nhomsach%20ON%20nhomsach.MaNhomSach%3Dsach.MaNhom%29%0AWHERE%20linhvuc.MaLinhVuc%3D%22.%24_GET%5B%22key2%22%5D.%22%0D%0A%20AND%20sach.TenSach%20LIKE%20%27%25%22.%24_GET%5B%22key1%22%5D.%22%25%27%0D%0A%20AND%20nhomsach.MaNhomSach%3D%22.%24_GET%5B%22key3%22%5D.%22%0D%0A%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_ketquatimkiem1khoa%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100814222723%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100814222723%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22sach%22%2C%20%22sach%22%29%3Btmp.table_name%20%3D%20%22sach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22sach%22%2C340%2C0%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MasSach%22%2C%20%22MasSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoTrang%22%2C%20%22SoTrang%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GiaTien%22%2C%20%22GiaTien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NamXuatBan%22%2C%20%22NamXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GhiChu%22%2C%20%22GhiChu%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%205%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNgonNgu%22%2C%20%22MaNgonNgu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenSach%22%2C%20%22TenSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%206%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_5714_4_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22contains%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22key1%22%3Btmp3.test_value%20%3D%20%22kinh%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22Visible%22%2C%20%22Visible%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaPhanLoaiSach%22%2C%20%22MaPhanLoaiSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanMuon%22%2C%20%22SoLanMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LanXuatBan%22%2C%20%22LanXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLuongNap%22%2C%20%22SoLuongNap%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachSuDungDuoc%22%2C%20%22SoSachSuDungDuoc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachConTrongKHo%22%2C%20%22SoSachConTrongKHo%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22cosachmoi%22%2C%20%22cosachmoi%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%207%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayCapNhat%22%2C%20%22NgayCapNhat%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22linhvuc%22%2C%20%22linhvuc%22%29%3Btmp.table_name%20%3D%20%22linhvuc%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22linhvuc%22%2C78%2C4%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_3478_11_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22key2%22%3Btmp3.test_value%20%3D%20%2211%22%3Btmp3.string%20%3D%20%22%3D%24_GET%5B%5C%22key2%5C%22%5D%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22TenLinhVuc%22%2C%20%22TenLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienLinhVuc%22%2C%20%22HienLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu%22%2C%20%22HienMenu%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22tacgia%22%2C%20%22tacgia%22%29%3Btmp.table_name%20%3D%20%22tacgia%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22tacgia%22%2C605%2C33%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenTacGia%22%2C%20%22TenTacGia%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp%20%3D%20z.new_table%28%22nhomsach%22%2C%20%22nhomsach%22%29%3Btmp.table_name%20%3D%20%22nhomsach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22nhomsach%22%2C70%2C148%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaNhomSach%22%2C%20%22MaNhomSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%208%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_6443_7_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22key3%22%3Btmp3.test_value%20%3D%20%2213%22%3Btmp3.string%20%3D%20%22%3D%24_GET%5B%5C%22key3%5C%22%5D%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22TenNhomSach%22%2C%20%22TenNhomSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%209%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaViTri%22%2C%20%22MaViTri%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu1%22%2C%20%22HienMenu1%22%29%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_3478_9_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22tacgia%22%3Btmp.field1%20%3D%20%22MaTacGia%22%3Btmp.field2%20%3D%20%22MaTacGia%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A567%2C%20relTop1%3A157%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_3478_10_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22linhvuc%22%3Btmp.field1%20%3D%20%22MaLinhVuc%22%3Btmp.field2%20%3D%20%22MaLinhVuc%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A306%2C%20relTop1%3A253%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_6443_6_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22nhomsach%22%3Btmp.field1%20%3D%20%22MaNhom%22%3Btmp.field2%20%3D%20%22MaNhomSach%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A290%2C%20relTop1%3A125%2C%20relTop2%3A45%7D%3B',' ','1.0'),
 ('q_ketquathongke1','SELECT%20linhvuc.MaLinhVuc%2C%20linhvuc.TenLinhVuc%2C%20sach.MasSach%2C%20sach.TenSach%2C%20sach.cosachmoi%2C%20sach.SoSachConTrongKHo%2C%20sach.SoSachSuDungDuoc%2C%20sach.SoLuongNap%2C%20sach.NgayCapNhat%0AFROM%20%28sach%0ALEFT%20JOIN%20linhvuc%20ON%20linhvuc.MaLinhVuc%3Dsach.MaLinhVuc%29%0AWHERE%20linhvuc.MaLinhVuc%3D%22.%24_GET%5B%22key2%22%5D.%22%0D%0A%20AND%20sach.NgayCapNhat%20LIKE%20%27%22.%24_GET%5B%22key4%22%5D.%22%25%27%0D%0A%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_ketquathongke1%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100816163117%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100816163117%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22sach%22%2C%20%22sach%22%29%3Btmp.table_name%20%3D%20%22sach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22sach%22%2C219%2C13%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MasSach%22%2C%20%22MasSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoTrang%22%2C%20%22SoTrang%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GiaTien%22%2C%20%22GiaTien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NamXuatBan%22%2C%20%22NamXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GhiChu%22%2C%20%22GhiChu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNgonNgu%22%2C%20%22MaNgonNgu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenSach%22%2C%20%22TenSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Visible%22%2C%20%22Visible%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaPhanLoaiSach%22%2C%20%22MaPhanLoaiSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanMuon%22%2C%20%22SoLanMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LanXuatBan%22%2C%20%22LanXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLuongNap%22%2C%20%22SoLuongNap%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%207%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachSuDungDuoc%22%2C%20%22SoSachSuDungDuoc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%206%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachConTrongKHo%22%2C%20%22SoSachConTrongKHo%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%205%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22cosachmoi%22%2C%20%22cosachmoi%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayCapNhat%22%2C%20%22NgayCapNhat%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%208%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_3449_9_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22begins%20with%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22key4%22%3Btmp3.test_value%20%3D%20%22%20%0910/08/2010%2016%3A16%3A08%22%3Btmp3.string%20%3D%20%22LIKE%20%27%24_GET%5B%5C%22key4%5C%22%5D%25%27%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp%20%3D%20z.new_table%28%22linhvuc%22%2C%20%22linhvuc%22%29%3Btmp.table_name%20%3D%20%22linhvuc%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22linhvuc%22%2C532%2C165%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_3449_7_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22key2%22%3Btmp3.test_value%20%3D%20%2211%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22TenLinhVuc%22%2C%20%22TenLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienLinhVuc%22%2C%20%22HienLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu%22%2C%20%22HienMenu%22%29%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_3449_8_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22linhvuc%22%3Btmp.field1%20%3D%20%22MaLinhVuc%22%3Btmp.field2%20%3D%20%22MaLinhVuc%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A478%2C%20relTop1%3A253%2C%20relTop2%3A45%7D%3B',' ','1.0'),
 ('q_ketquathongkedocgia','SELECT%20thanhvien.MaThanhVien%2C%20thanhvien.TenThanhVien%2C%20thanhvien.Username%2C%20thanhvien.Level%0AFROM%20thanhvien%0AWHERE%20thanhvien.Level%3D4%0D%0A%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_ketquathongkedocgia%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100818162944%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100818162944%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22thanhvien%22%2C%20%22thanhvien%22%29%3Btmp.table_name%20%3D%20%22thanhvien%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22thanhvien%22%2C256%2C5%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaThanhVien%22%2C%20%22MaThanhVien%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenThanhVien%22%2C%20%22TenThanhVien%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GioiTinh%22%2C%20%22GioiTinh%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgaySinh%22%2C%20%22NgaySinh%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLop%22%2C%20%22MaLop%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaKhoa%22%2C%20%22MaKhoa%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaQueQuan%22%2C%20%22MaQueQuan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Username%22%2C%20%22Username%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Pass%22%2C%20%22Pass%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Level%22%2C%20%22Level%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_7322_6_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22Entered%20Value%22%3Btmp3.param_name%20%3D%20%224%22%3Btmp3.test_value%20%3D%20%224%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22NgayLapThe%22%2C%20%22NgayLapThe%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoDienThoai%22%2C%20%22SoDienThoai%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoCMND%22%2C%20%22SoCMND%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Email%22%2C%20%22Email%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanLogin%22%2C%20%22SoLanLogin%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22DisableDateUser%22%2C%20%22DisableDateUser%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Active%22%2C%20%22Active%22%29%3B',' ','1.0'),
 ('q_ketquathongke3','SELECT%20linhvuc.MaLinhVuc%2C%20linhvuc.TenLinhVuc%2C%20sach.MasSach%2C%20sach.TenSach%2C%20sach.cosachmoi%2C%20sach.SoSachConTrongKHo%2C%20sach.SoSachSuDungDuoc%2C%20sach.SoLuongNap%2C%20sach.NgayCapNhat%0AFROM%20%28sach%0ALEFT%20JOIN%20linhvuc%20ON%20linhvuc.MaLinhVuc%3Dsach.MaLinhVuc%29%0AWHERE%20linhvuc.MaLinhVuc%3D%22.%24_GET%5B%22key2%22%5D.%22%0D%0A%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_ketquathongke1%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100816163117%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100816163117%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22sach%22%2C%20%22sach%22%29%3Btmp.table_name%20%3D%20%22sach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22sach%22%2C219%2C13%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MasSach%22%2C%20%22MasSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoTrang%22%2C%20%22SoTrang%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GiaTien%22%2C%20%22GiaTien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NamXuatBan%22%2C%20%22NamXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GhiChu%22%2C%20%22GhiChu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNgonNgu%22%2C%20%22MaNgonNgu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenSach%22%2C%20%22TenSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Visible%22%2C%20%22Visible%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaPhanLoaiSach%22%2C%20%22MaPhanLoaiSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanMuon%22%2C%20%22SoLanMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LanXuatBan%22%2C%20%22LanXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLuongNap%22%2C%20%22SoLuongNap%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%207%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachSuDungDuoc%22%2C%20%22SoSachSuDungDuoc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%206%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachConTrongKHo%22%2C%20%22SoSachConTrongKHo%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%205%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22cosachmoi%22%2C%20%22cosachmoi%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayCapNhat%22%2C%20%22NgayCapNhat%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%208%3Bvar%20tmp%20%3D%20z.new_table%28%22linhvuc%22%2C%20%22linhvuc%22%29%3Btmp.table_name%20%3D%20%22linhvuc%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22linhvuc%22%2C532%2C165%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_3449_7_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22key2%22%3Btmp3.test_value%20%3D%20%2211%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22TenLinhVuc%22%2C%20%22TenLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienLinhVuc%22%2C%20%22HienLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu%22%2C%20%22HienMenu%22%29%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_3449_8_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22linhvuc%22%3Btmp.field1%20%3D%20%22MaLinhVuc%22%3Btmp.field2%20%3D%20%22MaLinhVuc%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A474%2C%20relTop1%3A253%2C%20relTop2%3A45%7D%3B',' ','1.0'),
 ('q_ketquathongke4','SELECT%20linhvuc.MaLinhVuc%2C%20linhvuc.TenLinhVuc%2C%20sach.TenSach%2C%20sach.cosachmoi%2C%20sach.SoSachConTrongKHo%2C%20sach.SoSachSuDungDuoc%2C%20sach.SoLuongNap%2C%20sach.NgayCapNhat%2C%20nhomsach.MaNhomSach%2C%20nhomsach.TenNhomSach%2C%20sach.MasSach%0AFROM%20%28%28sach%0ALEFT%20JOIN%20linhvuc%20ON%20linhvuc.MaLinhVuc%3Dsach.MaLinhVuc%29%0ALEFT%20JOIN%20nhomsach%20ON%20nhomsach.MaNhomSach%3Dsach.MaNhom%29%0AWHERE%20linhvuc.MaLinhVuc%3D%22.%24_GET%5B%22key2%22%5D.%22%0D%0A%20AND%20nhomsach.MaNhomSach%3D%22.%24_GET%5B%22key3%22%5D.%22%0D%0A%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_ketquathongke1%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100816163117%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100816163117%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22sach%22%2C%20%22sach%22%29%3Btmp.table_name%20%3D%20%22sach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22sach%22%2C340%2C22%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MasSach%22%2C%20%22MasSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2010%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoTrang%22%2C%20%22SoTrang%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GiaTien%22%2C%20%22GiaTien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NamXuatBan%22%2C%20%22NamXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GhiChu%22%2C%20%22GhiChu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNgonNgu%22%2C%20%22MaNgonNgu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenSach%22%2C%20%22TenSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Visible%22%2C%20%22Visible%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaPhanLoaiSach%22%2C%20%22MaPhanLoaiSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanMuon%22%2C%20%22SoLanMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LanXuatBan%22%2C%20%22LanXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLuongNap%22%2C%20%22SoLuongNap%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%206%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachSuDungDuoc%22%2C%20%22SoSachSuDungDuoc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%205%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachConTrongKHo%22%2C%20%22SoSachConTrongKHo%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22cosachmoi%22%2C%20%22cosachmoi%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayCapNhat%22%2C%20%22NgayCapNhat%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%207%3Bvar%20tmp%20%3D%20z.new_table%28%22linhvuc%22%2C%20%22linhvuc%22%29%3Btmp.table_name%20%3D%20%22linhvuc%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22linhvuc%22%2C635%2C114%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_3449_7_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22key2%22%3Btmp3.test_value%20%3D%20%2211%22%3Btmp3.string%20%3D%20%22%3D%24_GET%5B%5C%22key2%5C%22%5D%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22TenLinhVuc%22%2C%20%22TenLinhVuc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienLinhVuc%22%2C%20%22HienLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu%22%2C%20%22HienMenu%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22nhomsach%22%2C%20%22nhomsach%22%29%3Btmp.table_name%20%3D%20%22nhomsach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22nhomsach%22%2C71%2C21%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhomSach%22%2C%20%22MaNhomSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%208%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_1841_6_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22URL%20Variable%22%3Btmp3.param_name%20%3D%20%22key3%22%3Btmp3.test_value%20%3D%20%2223%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22TenNhomSach%22%2C%20%22TenNhomSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%209%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaViTri%22%2C%20%22MaViTri%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22HienMenu1%22%2C%20%22HienMenu1%22%29%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_1841_7_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22nhomsach%22%3Btmp.field1%20%3D%20%22MaNhom%22%3Btmp.field2%20%3D%20%22MaNhomSach%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A295%2C%20relTop1%3A125%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_1841_8_%22%29%3Btmp.table1%20%3D%20%22sach%22%3Btmp.table2%20%3D%20%22linhvuc%22%3Btmp.field1%20%3D%20%22MaLinhVuc%22%3Btmp.field2%20%3D%20%22MaLinhVuc%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A590%2C%20relTop1%3A253%2C%20relTop2%3A45%7D%3B',' ','1.0'),
 ('q_ketquathongke5','SELECT%20sach.MasSach%2C%20sach.TenSach%2C%20sach.SoLuongNap%2C%20sach.SoSachSuDungDuoc%2C%20sach.SoSachConTrongKHo%0AFROM%20sach%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_ketquathongke5%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100824075239%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100824075239%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22sach%22%2C%20%22sach%22%29%3Btmp.table_name%20%3D%20%22sach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22sach%22%2C245%2C11%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MasSach%22%2C%20%22MasSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoTrang%22%2C%20%22SoTrang%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GiaTien%22%2C%20%22GiaTien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NamXuatBan%22%2C%20%22NamXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GhiChu%22%2C%20%22GhiChu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNgonNgu%22%2C%20%22MaNgonNgu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenSach%22%2C%20%22TenSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Visible%22%2C%20%22Visible%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaPhanLoaiSach%22%2C%20%22MaPhanLoaiSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanMuon%22%2C%20%22SoLanMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LanXuatBan%22%2C%20%22LanXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLuongNap%22%2C%20%22SoLuongNap%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachSuDungDuoc%22%2C%20%22SoSachSuDungDuoc%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachConTrongKHo%22%2C%20%22SoSachConTrongKHo%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22cosachmoi%22%2C%20%22cosachmoi%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayCapNhat%22%2C%20%22NgayCapNhat%22%29%3B',' ','1.0');
INSERT INTO `qub3_queries_que` (`name_que`,`query_que`,`desc_que`,`tables_que`,`version_que`) VALUES 
 ('q_thongtinmuontrasach','SELECT%20thanhvien.MaThanhVien%2C%20thanhvien.TenThanhVien%2C%20phieumuon.MaPhieuMuon%2C%20chitietphieumuon.MaChiTietPhieuMuon%2C%20phieumuon.NgayHetHanThe%2C%20thanhvien.TongSoSachMuon%2C%20sach.MasSach%2C%20sach.TenSach%2C%20chitietphieumuon.NgayHetHan%2C%20chitietphieumuon.NgayMuon%2C%20cuonsach.MaCuonSach%2C%20cuonsach.Ma%2C%20chitietphieumuon.TinhTrang%2C%20thanhvien.Username%0AFROM%20%28%28%28%28chitietphieumuon%0ALEFT%20JOIN%20phieumuon%20ON%20phieumuon.MaPhieuMuon%3Dchitietphieumuon.MaPhieuMuon%29%0ALEFT%20JOIN%20thanhvien%20ON%20thanhvien.MaThanhVien%3Dphieumuon.MaThanhVien%29%0ALEFT%20JOIN%20sach%20ON%20sach.MasSach%3Dchitietphieumuon.MaSach%29%0ALEFT%20JOIN%20cuonsach%20ON%20cuonsach.Ma%3Dchitietphieumuon.MaCuonSach%29%0AWHERE%20chitietphieumuon.TinhTrang%3D0%0D%0A%20AND%20thanhvien.Username%3D%27%22.%24_SESSION%5B%22kt_login_user%22%5D.%22%27%0D%0A%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_thongtinmuontrasach%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100824114521%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100824114521%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22chitietphieumuon%22%2C%20%22chitietphieumuon%22%29%3Btmp.table_name%20%3D%20%22chitietphieumuon%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22chitietphieumuon%22%2C487%2C1%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaChiTietPhieuMuon%22%2C%20%22MaChiTietPhieuMuon%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaPhieuMuon%22%2C%20%22MaPhieuMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaSach%22%2C%20%22MaSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayTra%22%2C%20%22NgayTra%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TienPhat%22%2C%20%22TienPhat%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LyDoPhat%22%2C%20%22LyDoPhat%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TinhTrang%22%2C%20%22TinhTrang%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2012%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_0997_4_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22Entered%20Value%22%3Btmp3.param_name%20%3D%20%220%22%3Btmp3.test_value%20%3D%20%220%22%3Btmp3.string%20%3D%20%22%3D0%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaCuonSach%22%2C%20%22MaCuonSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayMuon%22%2C%20%22NgayMuon%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%209%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayHetHan%22%2C%20%22NgayHetHan%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%208%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22thanhvien%22%2C%20%22thanhvien%22%29%3Btmp.table_name%20%3D%20%22thanhvien%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22thanhvien%22%2C15%2C5%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaThanhVien%22%2C%20%22MaThanhVien%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenThanhVien%22%2C%20%22TenThanhVien%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GioiTinh%22%2C%20%22GioiTinh%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgaySinh%22%2C%20%22NgaySinh%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLop%22%2C%20%22MaLop%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaKhoa%22%2C%20%22MaKhoa%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22QueQuan%22%2C%20%22QueQuan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Pass%22%2C%20%22Pass%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Level%22%2C%20%22Level%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayLapThe%22%2C%20%22NgayLapThe%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoDienThoai%22%2C%20%22SoDienThoai%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Username%22%2C%20%22Username%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2013%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_4787_4_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22Session%20Variable%22%3Btmp3.param_name%20%3D%20%22kt_login_user%22%3Btmp3.test_value%20%3D%20%2212%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22Email%22%2C%20%22Email%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanLogin%22%2C%20%22SoLanLogin%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22DisableDateUser%22%2C%20%22DisableDateUser%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Active%22%2C%20%22Active%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TongSoSachMuon%22%2C%20%22TongSoSachMuon%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%205%3Bvar%20tmp%20%3D%20z.new_table%28%22phieumuon%22%2C%20%22phieumuon%22%29%3Btmp.table_name%20%3D%20%22phieumuon%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22phieumuon%22%2C244%2C2%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaPhieuMuon%22%2C%20%22MaPhieuMuon%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaThanhVien%22%2C%20%22MaThanhVien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayHetHanThe%22%2C%20%22NgayHetHanThe%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayLapThe%22%2C%20%22NgayLapThe%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenThanhVien%22%2C%20%22TenThanhVien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenPhieuMuon%22%2C%20%22TenPhieuMuon%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22sach%22%2C%20%22sach%22%29%3Btmp.table_name%20%3D%20%22sach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22sach%22%2C235%2C164%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MasSach%22%2C%20%22MasSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%206%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoTrang%22%2C%20%22SoTrang%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GiaTien%22%2C%20%22GiaTien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NamXuatBan%22%2C%20%22NamXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GhiChu%22%2C%20%22GhiChu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhaXuatBan%22%2C%20%22MaNhaXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaTacGia%22%2C%20%22MaTacGia%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNgonNgu%22%2C%20%22MaNgonNgu%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenSach%22%2C%20%22TenSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%207%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Visible%22%2C%20%22Visible%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaPhanLoaiSach%22%2C%20%22MaPhanLoaiSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanMuon%22%2C%20%22SoLanMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LanXuatBan%22%2C%20%22LanXuatBan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLuongNap%22%2C%20%22SoLuongNap%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachSuDungDuoc%22%2C%20%22SoSachSuDungDuoc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoSachConTrongKHo%22%2C%20%22SoSachConTrongKHo%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22cosachmoi%22%2C%20%22cosachmoi%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayCapNhat%22%2C%20%22NgayCapNhat%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22cuonsach%22%2C%20%22cuonsach%22%29%3Btmp.table_name%20%3D%20%22cuonsach%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22cuonsach%22%2C718%2C106%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22Ma%22%2C%20%22Ma%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2011%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaCuonSach%22%2C%20%22MaCuonSach%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2010%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaSach%22%2C%20%22MaSach%22%29%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_0065_6_%22%29%3Btmp.table1%20%3D%20%22phieumuon%22%3Btmp.table2%20%3D%20%22thanhvien%22%3Btmp.field1%20%3D%20%22MaThanhVien%22%3Btmp.field2%20%3D%20%22MaThanhVien%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A217%2C%20relTop1%3A61%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_0065_7_%22%29%3Btmp.table1%20%3D%20%22chitietphieumuon%22%3Btmp.table2%20%3D%20%22phieumuon%22%3Btmp.field1%20%3D%20%22MaPhieuMuon%22%3Btmp.field2%20%3D%20%22MaPhieuMuon%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A450%2C%20relTop1%3A61%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_0065_9_%22%29%3Btmp.table1%20%3D%20%22chitietphieumuon%22%3Btmp.table2%20%3D%20%22sach%22%3Btmp.field1%20%3D%20%22MaSach%22%3Btmp.field2%20%3D%20%22MasSach%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A454%2C%20relTop1%3A77%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_0065_11_%22%29%3Btmp.table1%20%3D%20%22chitietphieumuon%22%3Btmp.table2%20%3D%20%22cuonsach%22%3Btmp.field1%20%3D%20%22MaCuonSach%22%3Btmp.field2%20%3D%20%22Ma%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A697%2C%20relTop1%3A157%2C%20relTop2%3A45%7D%3B',' ','1.0'),
 ('q_tongsosachmuonthanhvien','SELECT%20lop.MaLop%2C%20lop.TenLop%2C%20khoa.MaKhoa%2C%20khoa.TenKhoa%2C%20phieumuon.MaPhieuMuon%2C%20chitietphieumuon.TinhTrang%2C%20thanhvien.TenThanhVien%2C%20thanhvien.GioiTinh%2C%20thanhvien.Username%2C%20thanhvien.Email%2C%20thanhvien.SoLanLogin%2C%20thanhvien.DisableDateUser%2C%20thanhvien.Active%2C%20count%28chitietphieumuon.MaChiTietPhieuMuon%29%20%20AS%20count_MaChiTietPhieuMuon_1%0AFROM%20%28%28%28%28chitietphieumuon%0ALEFT%20JOIN%20phieumuon%20ON%20phieumuon.MaPhieuMuon%3Dchitietphieumuon.MaPhieuMuon%29%0ALEFT%20JOIN%20thanhvien%20ON%20thanhvien.MaThanhVien%3Dphieumuon.MaThanhVien%29%0ALEFT%20JOIN%20khoa%20ON%20khoa.MaKhoa%3Dthanhvien.MaKhoa%29%0ALEFT%20JOIN%20lop%20ON%20lop.MaLop%3Dthanhvien.MaLop%29%0AWHERE%20chitietphieumuon.TinhTrang%3D0%0D%0A%0AGROUP%20BY%20lop.MaLop%2C%20lop.TenLop%2C%20khoa.MaKhoa%2C%20khoa.TenKhoa%2C%20phieumuon.MaPhieuMuon%2C%20chitietphieumuon.TinhTrang%2C%20thanhvien.TenThanhVien%2C%20thanhvien.GioiTinh%2C%20thanhvien.Username%2C%20thanhvien.Email%2C%20thanhvien.SoLanLogin%2C%20thanhvien.DisableDateUser%2C%20thanhvien.Active%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_tongsosachmuonthanhvien%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100824164444%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100824164444%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22thanhvien%22%2C%20%22thanhvien%22%29%3Btmp.table_name%20%3D%20%22thanhvien%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22thanhvien%22%2C398%2C5%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaThanhVien%22%2C%20%22MaThanhVien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenThanhVien%22%2C%20%22TenThanhVien%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%206%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GioiTinh%22%2C%20%22GioiTinh%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%207%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgaySinh%22%2C%20%22NgaySinh%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLop%22%2C%20%22MaLop%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaKhoa%22%2C%20%22MaKhoa%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22QueQuan%22%2C%20%22QueQuan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Pass%22%2C%20%22Pass%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Level%22%2C%20%22Level%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayLapThe%22%2C%20%22NgayLapThe%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoDienThoai%22%2C%20%22SoDienThoai%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Username%22%2C%20%22Username%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%208%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Email%22%2C%20%22Email%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%209%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanLogin%22%2C%20%22SoLanLogin%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2010%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22DisableDateUser%22%2C%20%22DisableDateUser%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2011%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Active%22%2C%20%22Active%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2012%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TongSoSachMuon%22%2C%20%22TongSoSachMuon%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp%20%3D%20z.new_table%28%22lop%22%2C%20%22lop%22%29%3Btmp.table_name%20%3D%20%22lop%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22lop%22%2C637%2C15%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaLop%22%2C%20%22MaLop%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenLop%22%2C%20%22TenLop%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaKhoa%22%2C%20%22MaKhoa%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22khoa%22%2C%20%22khoa%22%29%3Btmp.table_name%20%3D%20%22khoa%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22khoa%22%2C649%2C142%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaKhoa%22%2C%20%22MaKhoa%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenKhoa%22%2C%20%22TenKhoa%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp%20%3D%20z.new_table%28%22phieumuon%22%2C%20%22phieumuon%22%29%3Btmp.table_name%20%3D%20%22phieumuon%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22phieumuon%22%2C143%2C7%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaPhieuMuon%22%2C%20%22MaPhieuMuon%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaThanhVien%22%2C%20%22MaThanhVien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayHetHanThe%22%2C%20%22NgayHetHanThe%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayLapThe%22%2C%20%22NgayLapThe%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenThanhVien%22%2C%20%22TenThanhVien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenPhieuMuon%22%2C%20%22TenPhieuMuon%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22chitietphieumuon%22%2C%20%22chitietphieumuon%22%29%3Btmp.table_name%20%3D%20%22chitietphieumuon%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22chitietphieumuon%22%2C138%2C167%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaChiTietPhieuMuon%22%2C%20%22MaChiTietPhieuMuon%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaPhieuMuon%22%2C%20%22MaPhieuMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaSach%22%2C%20%22MaSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayTra%22%2C%20%22NgayTra%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TienPhat%22%2C%20%22TienPhat%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LyDoPhat%22%2C%20%22LyDoPhat%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TinhTrang%22%2C%20%22TinhTrang%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%205%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_6732_12_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22Entered%20Value%22%3Btmp3.param_name%20%3D%20%220%22%3Btmp3.test_value%20%3D%20%220%22%3Btmp3.string%20%3D%20%22%3D0%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaCuonSach%22%2C%20%22MaCuonSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayMuon%22%2C%20%22NgayMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayHetHan%22%2C%20%22NgayHetHan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22count_MaChiTietPhieuMuon_1%22%2C%20%22MaChiTietPhieuMuon%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.aggFunc%20%3D%20%22count%22%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2013%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_6732_4_%22%29%3Btmp.table1%20%3D%20%22thanhvien%22%3Btmp.table2%20%3D%20%22lop%22%3Btmp.field1%20%3D%20%22MaLop%22%3Btmp.field2%20%3D%20%22MaLop%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A612%2C%20relTop1%3A109%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_6732_5_%22%29%3Btmp.table1%20%3D%20%22thanhvien%22%3Btmp.table2%20%3D%20%22khoa%22%3Btmp.field1%20%3D%20%22MaKhoa%22%3Btmp.field2%20%3D%20%22MaKhoa%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A618%2C%20relTop1%3A125%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_6732_8_%22%29%3Btmp.table1%20%3D%20%22phieumuon%22%3Btmp.table2%20%3D%20%22thanhvien%22%3Btmp.field1%20%3D%20%22MaThanhVien%22%3Btmp.field2%20%3D%20%22MaThanhVien%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A362%2C%20relTop1%3A61%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_6732_11_%22%29%3Btmp.table1%20%3D%20%22chitietphieumuon%22%3Btmp.table2%20%3D%20%22phieumuon%22%3Btmp.field1%20%3D%20%22MaPhieuMuon%22%3Btmp.field2%20%3D%20%22MaPhieuMuon%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A119%2C%20relTop1%3A61%2C%20relTop2%3A45%7D%3B',' ','1.0'),
 ('q_tongsosachmuonthanhvien2','SELECT%20lop.MaLop%2C%20lop.TenLop%2C%20khoa.MaKhoa%2C%20khoa.TenKhoa%2C%20phieumuon.MaPhieuMuon%2C%20chitietphieumuon.TinhTrang%2C%20thanhvien.TenThanhVien%2C%20thanhvien.GioiTinh%2C%20thanhvien.Username%2C%20thanhvien.Email%2C%20thanhvien.SoLanLogin%2C%20thanhvien.DisableDateUser%2C%20thanhvien.Active%2C%20count%28chitietphieumuon.MaChiTietPhieuMuon%29%20%20AS%20count_MaChiTietPhieuMuon_1%0AFROM%20%28%28%28%28chitietphieumuon%0ALEFT%20JOIN%20phieumuon%20ON%20phieumuon.MaPhieuMuon%3Dchitietphieumuon.MaPhieuMuon%29%0ALEFT%20JOIN%20thanhvien%20ON%20thanhvien.MaThanhVien%3Dphieumuon.MaThanhVien%29%0ALEFT%20JOIN%20khoa%20ON%20khoa.MaKhoa%3Dthanhvien.MaKhoa%29%0ALEFT%20JOIN%20lop%20ON%20lop.MaLop%3Dthanhvien.MaLop%29%0AWHERE%20chitietphieumuon.TinhTrang%3D0%0D%0A%0AGROUP%20BY%20lop.MaLop%2C%20lop.TenLop%2C%20khoa.MaKhoa%2C%20khoa.TenKhoa%2C%20phieumuon.MaPhieuMuon%2C%20chitietphieumuon.TinhTrang%2C%20thanhvien.TenThanhVien%2C%20thanhvien.GioiTinh%2C%20thanhvien.Username%2C%20thanhvien.Email%2C%20thanhvien.SoLanLogin%2C%20thanhvien.DisableDateUser%2C%20thanhvien.Active%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_tongsosachmuonthanhvien%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100824164444%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100824164444%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22thanhvien%22%2C%20%22thanhvien%22%29%3Btmp.table_name%20%3D%20%22thanhvien%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22thanhvien%22%2C398%2C5%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaThanhVien%22%2C%20%22MaThanhVien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenThanhVien%22%2C%20%22TenThanhVien%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%206%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GioiTinh%22%2C%20%22GioiTinh%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%207%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgaySinh%22%2C%20%22NgaySinh%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLop%22%2C%20%22MaLop%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaKhoa%22%2C%20%22MaKhoa%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22QueQuan%22%2C%20%22QueQuan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Pass%22%2C%20%22Pass%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Level%22%2C%20%22Level%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayLapThe%22%2C%20%22NgayLapThe%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoDienThoai%22%2C%20%22SoDienThoai%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Username%22%2C%20%22Username%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%208%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Email%22%2C%20%22Email%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%209%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanLogin%22%2C%20%22SoLanLogin%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2010%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22DisableDateUser%22%2C%20%22DisableDateUser%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2011%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Active%22%2C%20%22Active%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2012%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TongSoSachMuon%22%2C%20%22TongSoSachMuon%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp%20%3D%20z.new_table%28%22lop%22%2C%20%22lop%22%29%3Btmp.table_name%20%3D%20%22lop%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22lop%22%2C637%2C15%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaLop%22%2C%20%22MaLop%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenLop%22%2C%20%22TenLop%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaKhoa%22%2C%20%22MaKhoa%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22khoa%22%2C%20%22khoa%22%29%3Btmp.table_name%20%3D%20%22khoa%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22khoa%22%2C649%2C142%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaKhoa%22%2C%20%22MaKhoa%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenKhoa%22%2C%20%22TenKhoa%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp%20%3D%20z.new_table%28%22phieumuon%22%2C%20%22phieumuon%22%29%3Btmp.table_name%20%3D%20%22phieumuon%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22phieumuon%22%2C143%2C7%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaPhieuMuon%22%2C%20%22MaPhieuMuon%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%204%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaThanhVien%22%2C%20%22MaThanhVien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayHetHanThe%22%2C%20%22NgayHetHanThe%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayLapThe%22%2C%20%22NgayLapThe%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenThanhVien%22%2C%20%22TenThanhVien%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenPhieuMuon%22%2C%20%22TenPhieuMuon%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22chitietphieumuon%22%2C%20%22chitietphieumuon%22%29%3Btmp.table_name%20%3D%20%22chitietphieumuon%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22chitietphieumuon%22%2C138%2C167%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaChiTietPhieuMuon%22%2C%20%22MaChiTietPhieuMuon%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaPhieuMuon%22%2C%20%22MaPhieuMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaSach%22%2C%20%22MaSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayTra%22%2C%20%22NgayTra%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TienPhat%22%2C%20%22TienPhat%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22LyDoPhat%22%2C%20%22LyDoPhat%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TinhTrang%22%2C%20%22TinhTrang%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%205%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_6732_12_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22Entered%20Value%22%3Btmp3.param_name%20%3D%20%220%22%3Btmp3.test_value%20%3D%20%220%22%3Btmp3.string%20%3D%20%22%3D0%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaCuonSach%22%2C%20%22MaCuonSach%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayMuon%22%2C%20%22NgayMuon%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgayHetHan%22%2C%20%22NgayHetHan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLinhVuc%22%2C%20%22MaLinhVuc%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaNhom%22%2C%20%22MaNhom%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22count_MaChiTietPhieuMuon_1%22%2C%20%22MaChiTietPhieuMuon%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.aggFunc%20%3D%20%22count%22%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%2013%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_6732_4_%22%29%3Btmp.table1%20%3D%20%22thanhvien%22%3Btmp.table2%20%3D%20%22lop%22%3Btmp.field1%20%3D%20%22MaLop%22%3Btmp.field2%20%3D%20%22MaLop%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A610%2C%20relTop1%3A109%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_6732_5_%22%29%3Btmp.table1%20%3D%20%22thanhvien%22%3Btmp.table2%20%3D%20%22khoa%22%3Btmp.field1%20%3D%20%22MaKhoa%22%3Btmp.field2%20%3D%20%22MaKhoa%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A616%2C%20relTop1%3A125%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_6732_8_%22%29%3Btmp.table1%20%3D%20%22phieumuon%22%3Btmp.table2%20%3D%20%22thanhvien%22%3Btmp.field1%20%3D%20%22MaThanhVien%22%3Btmp.field2%20%3D%20%22MaThanhVien%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A360%2C%20relTop1%3A61%2C%20relTop2%3A45%7D%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_6732_11_%22%29%3Btmp.table1%20%3D%20%22chitietphieumuon%22%3Btmp.table2%20%3D%20%22phieumuon%22%3Btmp.field1%20%3D%20%22MaPhieuMuon%22%3Btmp.field2%20%3D%20%22MaPhieuMuon%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A117%2C%20relTop1%3A61%2C%20relTop2%3A45%7D%3B',' ','1.2'),
 ('q_ketquathongkedocgia_all','SELECT%20thanhvien.MaThanhVien%2C%20thanhvien.TenThanhVien%2C%20thanhvien.Username%2C%20thanhvien.Level%0AFROM%20thanhvien%0AWHERE%20thanhvien.Level%3D4%0D%0A%0A','/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.0%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22q_ketquathongkedocgia%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.0%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220100818162944%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220100818162944%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22thanhvien%22%2C%20%22thanhvien%22%29%3Btmp.table_name%20%3D%20%22thanhvien%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22thanhvien%22%2C256%2C5%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Btmp2.output%20%3D%20true%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22MaThanhVien%22%2C%20%22MaThanhVien%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22TenThanhVien%22%2C%20%22TenThanhVien%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22GioiTinh%22%2C%20%22GioiTinh%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22NgaySinh%22%2C%20%22NgaySinh%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaLop%22%2C%20%22MaLop%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaKhoa%22%2C%20%22MaKhoa%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22MaQueQuan%22%2C%20%22MaQueQuan%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Username%22%2C%20%22Username%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Pass%22%2C%20%22Pass%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Level%22%2C%20%22Level%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Btmp3%20%3D%20new%20SQLCondition%28%29%3B%0D%0Atmp3.name%20%3D%20%22iaktuid_7322_6_%22%3Btmp3.column%20%3D%20tmp2%3B%0D%0Atmp3.cond_type%20%3D%20%22%3D%22%3Btmp3.var_type%20%3D%20%22Entered%20Value%22%3Btmp3.param_name%20%3D%20%224%22%3Btmp3.test_value%20%3D%20%224%22%3Btmp2.condition%20%3D%20tmp3%3B%0D%0Avar%20tmp2%20%3D%20tmp.new_column%28%22NgayLapThe%22%2C%20%22NgayLapThe%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoDienThoai%22%2C%20%22SoDienThoai%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoCMND%22%2C%20%22SoCMND%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Email%22%2C%20%22Email%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22SoLanLogin%22%2C%20%22SoLanLogin%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22DisableDateUser%22%2C%20%22DisableDateUser%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22Active%22%2C%20%22Active%22%29%3B',' ','1.0');
/*!40000 ALTER TABLE `qub3_queries_que` ENABLE KEYS */;


--
-- Definition of table `qub3_relations_rel`
--

DROP TABLE IF EXISTS `qub3_relations_rel`;
CREATE TABLE `qub3_relations_rel` (
  `table1_rel` varchar(100) NOT NULL,
  `table2_rel` varchar(100) NOT NULL,
  `t1id_rel` varchar(100) NOT NULL,
  `t2id_rel` varchar(100) NOT NULL,
  `type_rel` varchar(10) NOT NULL,
  `restrict_rel` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qub3_relations_rel`
--

/*!40000 ALTER TABLE `qub3_relations_rel` DISABLE KEYS */;
INSERT INTO `qub3_relations_rel` (`table1_rel`,`table2_rel`,`t1id_rel`,`t2id_rel`,`type_rel`,`restrict_rel`) VALUES 
 ('nhomsach','vitri','MaViTri','MaViTri','1-n',0),
 ('sach','nhaxuatban','MaNhaXuatBan','MaNhaXuatBan','1-n',0),
 ('sach','linhvuc','MaLinhVuc','MaLinhVuc','1-n',0),
 ('sach','ngonngusach','MaNgonNgu','MaNgonNguSach','1-n',0),
 ('sach','nhomsach','MaNhom','MaNhomSach','1-n',0),
 ('sach','tacgia','MaTacGia','MaTacGia','1-n',0),
 ('chitietphieumuon','sach','MaSach','MasSach','1-n',0),
 ('chitietphieumuon','cuonsach','MaCuonSach','Ma','1-n',0),
 ('chitietphieumuon','phieumuon','MaPhieuMuon','MaPhieuMuon','1-n',0),
 ('phieumuon','thanhvien','MaThanhVien','MaThanhVien','1-n',0),
 ('thanhvien','khoa','MaKhoa','MaKhoa','1-n',0),
 ('thanhvien','lop','MaLop','MaLop','1-n',0);
/*!40000 ALTER TABLE `qub3_relations_rel` ENABLE KEYS */;


--
-- Definition of table `qub3_settings_set`
--

DROP TABLE IF EXISTS `qub3_settings_set`;
CREATE TABLE `qub3_settings_set` (
  `setting_name_set` varchar(32) NOT NULL,
  `setting_value_set` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qub3_settings_set`
--

/*!40000 ALTER TABLE `qub3_settings_set` DISABLE KEYS */;
INSERT INTO `qub3_settings_set` (`setting_name_set`,`setting_value_set`) VALUES 
 ('dateseparator','\''),
 ('notequals','!='),
 ('use_asname','true');
/*!40000 ALTER TABLE `qub3_settings_set` ENABLE KEYS */;


--
-- Definition of table `quequan`
--

DROP TABLE IF EXISTS `quequan`;
CREATE TABLE `quequan` (
  `ID_quequan` int(10) unsigned NOT NULL auto_increment,
  `TenQueQuan` varchar(100) default NULL,
  PRIMARY KEY  (`ID_quequan`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quequan`
--

/*!40000 ALTER TABLE `quequan` DISABLE KEYS */;
INSERT INTO `quequan` (`ID_quequan`,`TenQueQuan`) VALUES 
 (1,'LÃ¢m Äá»“ng'),
 (2,'TP HCM'),
 (3,'Báº¿n Tre'),
 (4,'Cáº§n ThÆ¡'),
 (5,'Nha Trang'),
 (6,'KhÃ¡nh HÃ²a'),
 (7,'Nam Äá»‹nh'),
 (8,'BÃ¬nh Äinh'),
 (9,'Quáº£ng NgÃ£i'),
 (10,'Nghá»‡ An'),
 (11,'Tiá»n Giang'),
 (12,'Äáº¯c NÃ´ng'),
 (13,'CÃ  Mau'),
 (14,'Long An'),
 (15,'Quáº£ng Nam'),
 (16,'Thanh HÃ³a'),
 (17,'Huáº¿ '),
 (18,'ÄÃ  Náºµng'),
 (19,'PhÃº Thá»'),
 (20,'HÃ  Ná»™i'),
 (21,'ThÃ¡i BÃ¬nh');
/*!40000 ALTER TABLE `quequan` ENABLE KEYS */;


--
-- Definition of table `sach`
--

DROP TABLE IF EXISTS `sach`;
CREATE TABLE `sach` (
  `MasSach` int(10) unsigned NOT NULL auto_increment,
  `SoTrang` varchar(45) default NULL,
  `GiaTien` varchar(45) default NULL,
  `NamXuatBan` varchar(45) default NULL,
  `GhiChu` text,
  `MaNhom` int(10) unsigned default NULL,
  `MaNhaXuatBan` int(10) unsigned default NULL,
  `MaTacGia` int(10) unsigned default NULL,
  `MaNgonNgu` int(10) unsigned default NULL,
  `TenSach` varchar(45) default NULL,
  `Visible` tinyint(10) unsigned default NULL,
  `MaPhanLoaiSach` int(10) unsigned default NULL,
  `SoLanMuon` varchar(20) default NULL,
  `MaLinhVuc` int(10) unsigned default NULL,
  `LanXuatBan` varchar(45) default NULL,
  `SoLuongNap` varchar(45) default NULL,
  `SoSachSuDungDuoc` varchar(45) default NULL,
  `SoSachConTrongKHo` varchar(45) default NULL,
  `cosachmoi` tinyint(3) unsigned default NULL,
  `NgayCapNhat` datetime default NULL,
  PRIMARY KEY  (`MasSach`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sach`
--

/*!40000 ALTER TABLE `sach` DISABLE KEYS */;
INSERT INTO `sach` (`MasSach`,`SoTrang`,`GiaTien`,`NamXuatBan`,`GhiChu`,`MaNhom`,`MaNhaXuatBan`,`MaTacGia`,`MaNgonNgu`,`TenSach`,`Visible`,`MaPhanLoaiSach`,`SoLanMuon`,`MaLinhVuc`,`LanXuatBan`,`SoLuongNap`,`SoSachSuDungDuoc`,`SoSachConTrongKHo`,`cosachmoi`,`NgayCapNhat`) VALUES 
 (1,'150','25.000 VND','2001','SÃ¡ch gá»“m 3 chÆ°Æ¡ng :\r\n     ChÆ°Æ¡ng 1: TÃ­ch PhÃ¢n\r\n     ChÆ°Æ¡ng 2: Äáº¡o HÃ m\r\n     ChÆ°Æ¡ng 3: HÃ m Sá»‘',23,3,1,5,'TOÃN CAO CÃ‚P Táº¬P 1',1,1,NULL,11,'10','20','20',NULL,1,'2010-08-23 00:00:00'),
 (2,'200','50.000 VND','2000','SÃ¡ch gá»“m 3 chÆ°Æ¡ng:\r\n     ChÆ°Æ¡ng 1: UML lÃ  gÃ¬\r\n     ChÆ°Æ¡ng 2: CÆ¡ Báº£n vá» UML\r\n     ChÆ°Æ¡ng 3: UML nÃ¢ng cao',14,3,4,5,'CÆ  Báº¢N Vá»€ UML',1,2,NULL,11,'12','29','20',NULL,0,'2010-08-23 00:00:00'),
 (3,'200','100.000 VND','2007','- SÃ¡ch trÃ¬nh bÃ y rÃµ rÃ ng ,dá»… hiá»ƒu.\r\n- SÃ¡ch gá»“m cÃ³ 3 chÆ°Æ¡ng:\r\n     + ChÆ°Æ¡ng 1: Äáº¡i cÆ°Æ¡ng vá» hÃ³a há»¯u cÆ¡\r\n     + ChÆ°Æ¡ng 2: HÃ³a VÃ´ CÆ¡\r\n     + ChÆ°Æ¡ng 3:PhÃ¢n tá»­',23,3,2,5,'HÃ“A Äáº I CÆ¯Æ NG',1,1,NULL,11,'10','20','10',NULL,1,'2010-08-23 00:00:00'),
 (4,'130','150.000 VND','2008','-Cuá»‘n sÃ¡ch gá»“m 3 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',13,1,3,5,'KINH Táº¾ CHÃNH TRá»Š',1,2,NULL,11,'5','49','49',NULL,0,'2010-08-23 00:00:00'),
 (5,'100','209.000 VND','2006','-Cuá»‘n sÃ¡ch gá»“m 3 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',13,5,4,5,'KINH Táº¾ VÄ¨ MÃ”',1,2,NULL,11,'20','50','50',NULL,0,'2010-08-23 00:00:00'),
 (6,'350','120.000 VND','2003','-Cuá»‘n sÃ¡ch gá»“m 3 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',23,3,19,5,'LÃ Äáº I CÆ¯Æ NG',1,1,NULL,11,'11','12','11',NULL,1,'2010-09-13 00:00:00'),
 (7,'456','60.000 VND','2000','-Cuá»‘n sÃ¡ch gá»“m 3 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',14,5,4,5,'Máº NG MÃY TÃNH CÆ  Báº¢N',1,2,NULL,11,'13','30','20',NULL,0,'2010-09-13 00:00:00'),
 (8,'654','34.000 VND','2001','SÃ¡ch gá»“m cÃ³ 4 pháº§n :\r\n     + HÃ m\r\n     + Biáº¿n\r\n     + Máº£ng\r\n     + Form',14,6,6,5,'C# NÃ‚NG CAO',1,2,NULL,11,'26','50','49','',0,'2010-09-13 00:00:00'),
 (9,'25','52.000 VND','2010','Cuá»‘n sÃ¡ch cÃ³ 3 chÆ°Æ¡ng:\r\n    ChÆ°Æ¡ng 1: TÃ¬nh hÃ¬nh Ä‘Ã´ thá»‹ hiá»‡n nay\r\n    ChÆ°Æ¡ng 2: CÃ¡c yáº¿u tá»‘ cáº§n thiáº¿t Ä‘á»ƒ quy hoáº¡ch Ä‘Ã´ thá»‹\r\n    ChÆ°Æ¡ng 3: CÃ¡c bÆ°á»›c quy hoáº¡ch Ä‘Ã´ thá»‹',17,5,12,5,'QUY HOáº CH ÄÃ” THá»Š',1,1,NULL,11,'19','20','20',NULL,1,'2010-09-13 00:00:00'),
 (10,'500','201.000 VND','2004','SÃ¡ch gá»“m 3 chÆ°Æ¡ng:\r\n  ChÆ°Æ¡ng 1: HÃ ng háº£i Viá»‡t Nam ngÃ y nay\r\n  ChÆ°Æ¡ng 2: Táº¡i sao hÃ ng háº£i ngÃ y cÃ ng phÃ¡t triá»ƒn\r\n  ChÆ°Æ¡ng 3:CÃ¡c yáº¿u tá»‘ Ä‘áº©y máº¡nh hÃ ng háº£i Viá»‡t Nam',15,6,15,1,'HÃ€NG Háº¢I VIá»†T NAM',1,1,NULL,11,'20','20','15',NULL,1,'2010-09-13 00:00:00'),
 (11,'200','130.000 VND','2009','- Cuá»‘n sÃ¡ch giá»›i thiá»‡u cÃ¡c khÃ¡i niá»‡m vá» Ä‘iá»‡n nháº±m giÃºp báº¡n cÃ³ nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n vá» Ä‘iá»‡n.\r\n- SÃ¡ch gá»“m cÃ³ 4 chÆ°Æ¡ng:\r\n      + ChÆ°Æ¡ng 1:CÃ¡c khÃ¡i niá»‡m vá» Ä‘iá»‡n\r\n      + ChÆ°Æ¡ng 2:Äiá»‡n gia Ä‘Ã¬nh\r\n      +ChÆ°Æ¡ng 3: CÃ¡ch sá»­ dá»¥ng Ä‘iá»‡n an toÃ n',21,4,18,5,'ÄIá»†N CÃ“ Báº¢N PHáº¦N 1',1,1,NULL,11,'12','20','20',NULL,1,'2010-07-23 11:45:20'),
 (12,'175','250.000 VND','2006','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ biá»ƒn lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ biá»ƒn\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ biá»ƒn Ä‘á»‘i vá»›i má»—i quá»‘c gia.',13,3,14,1,'KINH Táº¾ BIá»‚N',1,2,NULL,11,'13','18','18',NULL,1,'2010-07-23 11:45:20'),
 (13,'125','199.000 VND','1999','-Cuá»‘n sÃ¡ch gá»“m 3 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',13,2,17,1,'KINH Táº¾ XÃ‚Y Dá»°NG',1,2,NULL,11,'11','10','8',NULL,0,'2010-07-23 11:45:20'),
 (14,'300','152.000 VND','2003','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: CSDL SQL lÃ  gÃ¬\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ CSDL\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a CSDL  Ä‘á»‘i vá»›i má»—i chÆ°Æ¡ng trÃ¬nh trÃªn mÃ¡y tÃ­nh,',14,1,10,1,'CSDL SQL SERVER 2005',1,2,NULL,11,'15','50','39',NULL,0,'2010-07-23 11:45:20'),
 (15,'350','252.000 VND','2002','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: CÃ¡c khÃ¡i niá»m vá» láº­p trÃ¬nh C.\r\n  + ChÆ°Æ¡ng 2: CÃ¡ch sá»­ dá»¥ng hÃ m\r\n  +ChÆ°Æ¡ng 3: CÃ¡ch sá»­ dá»¥ng biáº¿n, máº£ng, cÃ¡c vÃ²ng láº·p.\r\n  + ChÆ°Æ¡ng 4:Tháº¿ máº¡nh cá»§a ngÃ´n ngá»¯ láº­p trÃ¬nh C',14,2,4,5,'Láº¬P TRÃŒNH C',1,1,NULL,11,'9','18','17',NULL,1,'2010-07-23 11:45:20'),
 (16,'250','230.000 VND','2000','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: CÃ¡c khÃ¡i niá»m vá» láº­p trÃ¬nh C++.\r\n  + ChÆ°Æ¡ng 2: CÃ¡ch sá»­ dá»¥ng hÃ m\r\n  +ChÆ°Æ¡ng 3: CÃ¡ch sá»­ dá»¥ng biáº¿n, máº£ng, cÃ¡c vÃ²ng láº·p.\r\n  + ChÆ°Æ¡ng 4:Tháº¿ máº¡nh cá»§a ngÃ´n ngá»¯ láº­p trÃ¬nh C++',14,3,16,5,'Láº¬P TRÃŒNH C++',1,1,NULL,11,'30','19','18',NULL,1,'2010-07-23 11:45:20'),
 (17,'120','213.000 VND','1999','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: CÃ¡c khÃ¡i niá»m vá» dung sai ká»¹ thuáº­t.\r\n  + ChÆ°Æ¡ng 2: á»¨ng dá»¥ng dung sai ká»¹ thuáº­t trong cÃ´ng nghiá»‡p \r\n  +ChÆ°Æ¡ng 3: CÃ¡ch sá»­ dá»¥ng cÃ¡c Ä‘áº¡i lÆ°á»£ng trong ká»¹ thuáº­t..\r\n  + ChÆ°Æ¡ng 4:Tháº¿ máº¡nh cá»§a cá»§a cÃ¡c Ä‘áº¡i lÆ°á»£ng trÃªn',20,2,8,1,'DUNG SAI KÃ THUáº¬T',1,1,NULL,11,'21','100','99',NULL,1,'2010-07-23 11:45:20'),
 (18,'320','132.000 VND','2000','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: CÃ¡c khÃ¡i niá»m vá» cÆ¡ khÃ­ Ã´ tÃ´.\r\n  + ChÆ°Æ¡ng 2: á»¨ng dá»¥ng dung sai ká»¹ thuáº­t trong cÃ´ng nghiá»‡p \r\n  +ChÆ°Æ¡ng 3: CÃ¡ch sá»­ dá»¥ng cÃ¡c Ä‘áº¡i lÆ°á»£ng trong ká»¹ thuáº­t..\r\n  + ChÆ°Æ¡ng 4:Tháº¿ máº¡nh cá»§a cá»§a cÃ¡c Ä‘áº¡i lÆ°á»£ng trÃªn',20,3,3,1,'CÆ  KHÃ Ã” TÃ”',1,1,NULL,11,'15','89','87',NULL,1,'2010-10-23 11:45:20'),
 (19,'115','236.000 VND','2008','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: CÃ¡c khÃ¡i niá»m vá» dung sai ká»¹ thuáº­t.\r\n  + ChÆ°Æ¡ng 2: á»¨ng dá»¥ng dung sai ká»¹ thuáº­t trong cÃ´ng nghiá»‡p \r\n  +ChÆ°Æ¡ng 3: CÃ¡ch sá»­ dá»¥ng cÃ¡c Ä‘áº¡i lÆ°á»£ng trong ká»¹ thuáº­t..\r\n  + ChÆ°Æ¡ng 4:Tháº¿ máº¡nh cá»§a cá»§a cÃ¡c Ä‘áº¡i lÆ°á»£ng trÃªn',20,4,6,5,'CÆ  KHÃ',1,1,NULL,11,'14','30','19',NULL,1,'2010-10-23 11:45:20'),
 (20,'116','123.000 VND','2009','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: CÃ¡c khÃ¡i niá»m vá» dung sai ká»¹ thuáº­t.\r\n  + ChÆ°Æ¡ng 2: á»¨ng dá»¥ng dung sai ká»¹ thuáº­t trong cÃ´ng nghiá»‡p \r\n  +ChÆ°Æ¡ng 3: CÃ¡ch sá»­ dá»¥ng cÃ¡c Ä‘áº¡i lÆ°á»£ng trong ká»¹ thuáº­t..\r\n  + ChÆ°Æ¡ng 4:Tháº¿ máº¡nh cá»§a cá»§a cÃ¡c Ä‘áº¡i lÆ°á»£ng trÃªn',22,4,7,5,'CÆ  Báº¢N Vá»€ MÃY TÃ€U',1,2,NULL,11,'10','50','48',NULL,0,'2010-10-23 11:45:20'),
 (21,'112','245 .000 VND','2008','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: CÃ¡c khÃ¡i niá»m vá» dung sai ká»¹ thuáº­t.\r\n  + ChÆ°Æ¡ng 2: á»¨ng dá»¥ng dung sai ká»¹ thuáº­t trong cÃ´ng nghiá»‡p \r\n  +ChÆ°Æ¡ng 3: CÃ¡ch sá»­ dá»¥ng cÃ¡c Ä‘áº¡i lÆ°á»£ng trong ká»¹ thuáº­t..\r\n  + ChÆ°Æ¡ng 4:Tháº¿ máº¡nh cá»§a cá»§a cÃ¡c Ä‘áº¡i lÆ°á»£ng trÃªn',22,1,2,5,'MÃY TÃ€U Táº¬P 1',1,2,NULL,11,'9','20','20',NULL,0,'2010-10-23 11:45:20'),
 (22,'158','321.000 VND','2005','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: CÃ¡c khÃ¡i niá»m vá» dung sai ká»¹ thuáº­t.\r\n  + ChÆ°Æ¡ng 2: á»¨ng dá»¥ng dung sai ká»¹ thuáº­t trong cÃ´ng nghiá»‡p \r\n  +ChÆ°Æ¡ng 3: CÃ¡ch sá»­ dá»¥ng cÃ¡c Ä‘áº¡i lÆ°á»£ng trong ká»¹ thuáº­t..\r\n  + ChÆ°Æ¡ng 4:Tháº¿ máº¡nh cá»§a cá»§a cÃ¡c Ä‘áº¡i lÆ°á»£ng trÃªn',22,2,14,5,'MÃY TÃ€U NÃ‚NG CAO',1,2,NULL,11,'8','20','19',NULL,0,'2010-10-23 11:45:20'),
 (23,'20','10.000 VND','2008','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.\r\n',25,2,4,5,'Táº P CHÃ BIá»‚N VIá»†T NAM',1,2,NULL,3,'20','100','100',NULL,0,'2010-10-23 11:45:20'),
 (24,'13','15 .000 VND','2009','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',29,3,2,5,'Táº P CHÃ Cáº¦U ÄÆ¯á»œNG VIá»†T NAM',1,1,NULL,3,'15','100','100',NULL,1,'2010-10-23 11:45:20'),
 (25,'30','8.000 VND','2010','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',27,4,17,5,'Táº P CHÃ CÃ”NG NGHIá»†P Ã” TÃ”',1,1,NULL,3,'19','100','100',NULL,1,'2010-10-23 11:45:20'),
 (26,'25','10.000 VND','1999','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',27,3,3,5,'Táº P CHÃ Ã” TÃ” -  XE MÃY',1,2,NULL,3,'25','100','100',NULL,0,'2010-10-23 11:45:20'),
 (27,'19','15 .000 VND','2000','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',27,3,2,5,'Táº P CHÃ ÄIá»†N Tá»¬ NGÃ€Y NAY',1,2,NULL,3,'13','100','100',NULL,0,'2010-10-23 11:45:20'),
 (28,'18','9.000 VND','7.000 VND','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',24,2,16,5,'Táº P CHÃ GIAO THÃ”NG NGÃ€Y NAY',1,2,NULL,3,'10','20','20',NULL,0,'2010-10-23 11:45:20'),
 (29,'31','10.000 VND','2010','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',26,3,3,1,'Táº P CHÃ NHá»ŠP Cáº¦U Äáº¦U TÆ¯',1,2,NULL,3,'13','40','26',NULL,0,'2010-10-23 11:45:20'),
 (30,'6','15 .000 VND','2009','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',26,3,3,1,'Táº P CHÃ NGHIÃŠN CÆ¯U KINH Táº¾',1,2,NULL,3,'18','50','20',NULL,0,'2010-10-23 11:45:20'),
 (31,'9','9.000 VND','2007','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',29,3,18,1,'Táº P CHÃ QUY HOáº CH XÃ‚Y Dá»°NG',1,2,NULL,3,'22','40','15',NULL,0,'2010-09-12 11:45:20'),
 (32,'15','10.000 VND','2010','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',29,3,2,5,'Báº¢N TIN THIáº¾T Káº¾ VÃ€ CHáº¾ Táº O',1,1,NULL,3,'12','14','13',NULL,0,'2010-09-12 11:45:20'),
 (33,'10','15 .000 VND','2009','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',26,1,2,2,'BÃO VIá»†T NAM NEWS',1,2,NULL,3,'14','20','20',NULL,0,'2010-09-12 11:45:20'),
 (34,'45','12.000 VND','2003','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',26,3,19,5,'Táº P CHÃ ÄÄ‚NG KIá»‚M',1,2,NULL,3,'15','23','23',NULL,0,'2010-09-12 11:45:20'),
 (35,'12','14. 000 VND','2002','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',24,2,15,1,'Táº P CHÃ ECHIP',1,1,NULL,3,'16','25','25',NULL,1,'2010-09-12 11:45:20'),
 (36,'62',NULL,'1999','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',24,5,11,5,'Táº P CHÃ THáº¾ GIá»šI VI TÃNH',1,2,NULL,3,'17','26','26',NULL,0,'2010-09-12 11:45:20'),
 (37,'56','169.00 VND','2009','-Táº¡p chÃ­ giá»›i thiá»‡u vá» biá»ƒn Ä‘áº£o Viá»‡t Nam vá»›i nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n, ngáº¯n gá»n.\r\n-Nhá»¯ng váº¥n Ä‘á» xoay quanh biá»ƒn Viá»‡t Nam\r\n-Nhá»¯ng tÃ i nguyÃªn cá»§a biá»ƒn \r\n-TrÃ¡ch nhiá»‡m báº£o vá»‡ biá»ƒn cá»§a nguwoif dÃ¢n.',26,4,3,5,'Táº P CHÃ KHOA Há»ŒC',1,2,NULL,3,'20','29','29',NULL,0,'2010-09-12 11:45:20'),
 (38,'120','120.000 VND','2010','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',14,3,1,1,'GIAO THá»¨C TCP/IP',1,1,NULL,11,'16','20','20',NULL,1,'2010-09-12 11:45:20'),
 (39,'115','115.000 VND','2006','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',13,3,2,5,'KINH Táº¾ Äá»I NGOáº I',1,2,NULL,11,'10','12','10',NULL,1,'2010-09-12 11:45:20'),
 (40,'121','112.000 VND','2005','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',23,3,3,5,'TÃCH PHÃ‚N',1,2,NULL,11,'11','11','13',NULL,0,'2010-09-12 11:45:20'),
 (41,'120','113.000 VND','2010','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',15,1,3,1,'Lá»¢I THáº¾ BIá»‚N VIá»†T NAM',1,1,NULL,11,'12','14','15',NULL,1,'2010-09-12 11:45:20'),
 (42,'119','98.000 VND','2008','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',21,4,2,5,'ÄIá»†N GIA ÄÃŒNH',1,1,NULL,11,'13','19','11',NULL,1,'2010-09-12 11:45:20'),
 (43,'156','87.000 VND','2009','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',22,5,15,1,'TÃ€U VIá»†T NAM',1,2,NULL,11,'16','15','14',NULL,0,'2010-09-12 11:45:20'),
 (44,'120','97.000 VND','1996','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',15,3,10,1,'ÄIá»€U KHIá»‚N TÃ€U BIá»‚N',1,1,NULL,11,'19','65','65',NULL,1,'2010-09-12 11:45:20'),
 (45,'130','99.000 VND','1998','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',14,1,5,5,'NGÃ”N NGá»® Láº¬P TRÃŒNH PASCAL',1,2,NULL,11,'20','23','23',NULL,0,'2010-09-12 11:45:20'),
 (46,'110','100.000 VND','1997','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',23,2,3,1,'CHá»¦ NGHÃA MÃC LENIN',1,2,NULL,11,'22','24','24',NULL,0,'2010-09-12 11:45:20'),
 (47,'105','112.000 VND','2010','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',22,3,4,6,'Sá»¦A CHá»®A ÄÃ“NG TÃ€U',1,2,NULL,11,'23','19','19',NULL,0,'2010-09-12 11:45:20'),
 (48,'99','120.000 VND','1999','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',20,2,2,7,'Sá»¦A CHá»®A & Láº®P RÃP Ã” TÃ”',1,1,NULL,11,'24','16','15',NULL,1,'2010-09-12 11:45:20'),
 (49,'500','198.000 VND','2005','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',19,2,4,2,'CÃC PHÆ¯Æ NG PHÃP Láº®P RÃP TÃ€U',1,2,NULL,11,'25','23','22',NULL,0,'2010-09-12 11:45:20'),
 (50,'103','198.000 VND','2001','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',14,5,2,6,'CÃ”NG NGHá»† PHáº¦N Má»€M NÃ‚NG CAO',1,1,NULL,11,'36','23','23',NULL,0,'2010-09-12 11:45:20'),
 (51,'101','201.000 VND','1999','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',23,4,3,2,'XÃC SUáº¤T THÃ“NG KÃŠ',1,1,NULL,11,'12','23','23',NULL,1,'2010-09-12 11:45:20'),
 (52,'100','123.000 VND','2002','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',17,2,18,7,'QUY HOáº C CÃ”NG TRÃŒNH',1,1,NULL,11,'12','23','23',NULL,1,'2010-09-12 11:45:20'),
 (53,'99','65.000 VND','200','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',15,2,17,1,'QUáº¦N ÄÃ‚á»Ž & Háº¢I Äáº¢O',1,1,NULL,11,'13','22','21',NULL,1,'2010-08-02 11:45:20'),
 (54,'203','236.000 VND','2006','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',13,3,8,3,'KINH Táº¾ LÆ¯á»¢NG',1,2,NULL,11,'23','23','22',NULL,0,'2010-08-02 11:45:20'),
 (55,'102','789.000 VND','2006','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',19,4,5,1,'CÃC NGUYÃŠN Táº®C TRONG XÃ‚Y Dá»°NG',1,2,NULL,11,'23','26','26',NULL,0,'2010-08-02 11:45:20'),
 (56,'102','200.000 VND','2010','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',14,3,3,1,'KIáº¾N TRÃšC MÃY TÃNH',1,1,NULL,11,'32','20','20',NULL,1,'2010-08-02 11:45:20'),
 (57,'103','169.000 VND','1999','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',13,5,19,1,'KINH Táº¾ Cáº¢NG',1,2,NULL,11,'26','22','21',NULL,1,'2010-08-02 11:45:20'),
 (58,'32','67.000 VND','2006','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',17,4,17,5,'PHÆ¯Æ NG PHÃP XÃ‚Y Dá»°NG Cáº¦U ÄÆ¯á»œNG',1,2,NULL,11,'24','23','23',NULL,0,'2010-08-02 11:45:20'),
 (59,'23','25.000 VND','2009','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',15,2,12,1,'BIá»‚N & VAI TRÃ’ Cá»¦A BIá»‚N',1,2,NULL,11,'25','21','21',NULL,0,'2010-08-02 11:45:20'),
 (60,'36','13.000 VND','2002','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',22,1,13,1,'CÃC NGUYÃŠN Táº®C KHI ÄÃ“NG TÃ€U',1,2,NULL,11,'26','22','25',NULL,0,'2010-08-02 11:45:20'),
 (61,'24','130.000 VND','1995','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',21,3,4,5,'ÄIá»†N CÃ”NG NGHIá»†P',1,1,NULL,11,'32','28','28',NULL,1,'2010-11-02 11:45:20'),
 (62,'120',NULL,'2005','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',35,NULL,8,5,'Láº®P RÃP TÃ€U THá»¦Y',1,1,NULL,4,NULL,'5','5',NULL,1,'2010-11-02 11:45:20'),
 (63,'120',NULL,'2005','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',30,NULL,16,5,'QUY HOáº CH CÃ”NG VIÃŠN',1,2,NULL,4,NULL,'5','5',NULL,0,'2010-11-02 11:45:20'),
 (64,'120',NULL,'2005','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',30,NULL,7,5,'THIáº¾T Káº¾ Máº CH ÄIá»†N CHO CÃ”NG TY',1,2,NULL,4,NULL,'5','5',NULL,0,'2010-11-02 11:45:20'),
 (65,'120',NULL,'2005','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',31,NULL,17,5,'WEBSITE BÃN HÃ€NG ONLINE',1,2,NULL,4,NULL,'5','5',NULL,1,'2010-11-02 11:45:20'),
 (66,'120',NULL,'2005','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',36,NULL,7,5,'Ã” TÃ”',1,2,NULL,4,NULL,'5','5',NULL,0,'2010-11-02 11:45:20'),
 (67,'120',NULL,'2005','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',33,NULL,16,5,'Láº®P RÃP MÃY TÃ€U',1,2,NULL,4,NULL,'5','5',NULL,0,'2010-11-02 11:45:20'),
 (68,'120',NULL,'2005','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',31,NULL,3,5,'QUáº¢N LÃ NHÃ‚N Sá»° TIá»€N LÆ¯Æ NG',1,1,NULL,4,NULL,'5','5',NULL,1,'2010-11-02 11:45:20'),
 (69,'120',NULL,'2005','-Cuá»‘n sÃ¡ch gá»“m 4 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',31,NULL,6,5,'WEBSITEQUáº¢N LÃ NHÃ‚N Sá»°',1,1,NULL,4,NULL,'5','5',NULL,1,'2010-11-02 11:45:20'),
 (70,'150','25.000 VND','2001','SÃ¡ch gá»“m 3 chÆ°Æ¡ng :\r\n     ChÆ°Æ¡ng 1: TÃ­ch PhÃ¢n\r\n     ChÆ°Æ¡ng 2: Äáº¡o HÃ m\r\n     ChÆ°Æ¡ng 3: HÃ m Sá»‘',23,3,1,5,'TOÃN CAO CÃ‚P Táº¬P 2',1,NULL,NULL,11,'10','20','20',NULL,1,'2010-11-02 11:45:20'),
 (71,'200','50.000 VND','2000','SÃ¡ch gá»“m 3 chÆ°Æ¡ng:\r\n     ChÆ°Æ¡ng 1: UML lÃ  gÃ¬\r\n     ChÆ°Æ¡ng 2: CÆ¡ Báº£n vá» UML\r\n     ChÆ°Æ¡ng 3: UML nÃ¢ng cao',29,3,4,5,'Táº P CHÃ XÃ‚Y Dá»°NG',1,NULL,NULL,3,'12','29','20',NULL,0,'2010-11-02 11:45:20'),
 (72,'200','100.000 VND','2007','- SÃ¡ch trÃ¬nh bÃ y rÃµ rÃ ng ,dá»… hiá»ƒu.\r\n- SÃ¡ch gá»“m cÃ³ 3 chÆ°Æ¡ng:\r\n     + ChÆ°Æ¡ng 1: Äáº¡i cÆ°Æ¡ng vá» hÃ³a há»¯u cÆ¡\r\n     + ChÆ°Æ¡ng 2: HÃ³a VÃ´ CÆ¡\r\n     + ChÆ°Æ¡ng 3:PhÃ¢n tá»­',26,3,2,5,'Táº P CHÃ KINH Táº¾ Váº¬N Táº¢I',1,NULL,NULL,3,'10','20','10',NULL,1,'2010-11-02 11:45:20'),
 (73,'130','150.000 VND','2008','-Cuá»‘n sÃ¡ch gá»“m 3 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',29,1,3,5,'Táº P CHÃ THIáº¾T Káº¾ CÃ€U ÄÆ¯á»œNG',1,NULL,NULL,3,'5','49','49',NULL,0,'2010-11-02 11:45:20'),
 (74,'100','209.000 VND','2006','-Cuá»‘n sÃ¡ch gá»“m 3 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',25,5,4,5,'Táº P CHÃ BIá»‚N VIá»†T NAM',1,NULL,NULL,3,'20','50','50',NULL,0,'2010-11-02 11:45:20'),
 (75,'350','120.000 VND','2003','-Cuá»‘n sÃ¡ch gá»“m 3 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',27,3,19,5,'Táº P CHÃ CÆ  KHÃ Ã” TÃ”',1,NULL,NULL,3,'11','12','11',NULL,1,'2010-11-02 11:45:20'),
 (76,'456','60.000 VND','2000','-Cuá»‘n sÃ¡ch gá»“m 3 chÆ°Æ¡ng:\r\n  + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬.\r\n  + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng\r\n  +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n\r\n  + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',24,5,4,5,'Táº P CHÃ Máº NG CÆ  Báº¢N',1,NULL,NULL,3,'13','30','20',NULL,0,'2010-11-02 11:45:20'),
 (77,'654','34.000 VND','2001','SÃ¡ch gá»“m cÃ³ 4 pháº§n :\r\n     + HÃ m\r\n     + Biáº¿n\r\n     + Máº£ng\r\n     + Form',24,6,6,5,'Táº P CHÃ Há»† THá»NG THÃ”NG TIN',1,NULL,NULL,3,'26','50','49',NULL,0,'2010-11-02 11:45:20'),
 (78,'25','52.000 VND','2010','Cuá»‘n sÃ¡ch cÃ³ 3 chÆ°Æ¡ng:\r\n    ChÆ°Æ¡ng 1: TÃ¬nh hÃ¬nh Ä‘Ã´ thá»‹ hiá»‡n nay\r\n    ChÆ°Æ¡ng 2: CÃ¡c yáº¿u tá»‘ cáº§n thiáº¿t Ä‘á»ƒ quy hoáº¡ch Ä‘Ã´ thá»‹\r\n    ChÆ°Æ¡ng 3: CÃ¡c bÆ°á»›c quy hoáº¡ch Ä‘Ã´ thá»‹',28,5,12,5,'Táº P CHÃ QUÃ€N Äáº¢O VIá»†T NAM',1,NULL,NULL,3,'19','20','20',NULL,1,'2010-11-02 11:45:20'),
 (79,'500','201.000 VND','2004','SÃ¡ch gá»“m 3 chÆ°Æ¡ng:\r\n  ChÆ°Æ¡ng 1: HÃ ng háº£i Viá»‡t Nam ngÃ y nay\r\n  ChÆ°Æ¡ng 2: Táº¡i sao hÃ ng háº£i ngÃ y cÃ ng phÃ¡t triá»ƒn\r\n  ChÆ°Æ¡ng 3:CÃ¡c yáº¿u tá»‘ Ä‘áº©y máº¡nh hÃ ng háº£i Viá»‡t Nam',25,6,15,1,'Táº P CHÃ ÄÆ¯á»œNG BIá»‚N ',1,NULL,NULL,3,'20','20','15',NULL,1,'2010-11-02 11:45:20'),
 (80,'120','120.000 VND','2010','-Cuá»‘n sÃ¡ch gá»“m 3 chÆ°Æ¡ng: + ChÆ°Æ¡ng 1: Kinh táº¿ xÃ¢y dá»±ng lÃ  gÃ¬. + ChÆ°Æ¡ng 2: Táº¡i sao cáº§n cÃ³ kinh táº¿ xÃ¢y dá»±ng +ChÆ°Æ¡ng 3: CÃ¡c khÃ¡i niá»‡m cÆ¡ báº£n + ChÆ°Æ¡ng 4:Vai trÃ² cá»§a kinh táº¿ xÃ¢y dá»±ng Ä‘á»‘i vá»›i ngÃ nh xÃ¢y dá»±ng.',14,3,16,1,'CÃ”NG Cá»¤ VÃ€ MÃ”I TRÆ¯á»œNG PTPM',0,NULL,NULL,11,'15','20','20',NULL,1,'2010-11-02 11:45:20'),
 (81,'125','112.00.VND','1996','SÃ¡ch gá»“m 3 chÆ°Æ¡ng :\r\n     ChÆ°Æ¡ng 1: TÃ­ch PhÃ¢n\r\n     ChÆ°Æ¡ng 2: Äáº¡o HÃ m\r\n     ChÆ°Æ¡ng 3: HÃ m Sá»‘',14,2,3,1,'C# PHáº¦N WINDOW FORM',0,NULL,NULL,11,'12','50','50',NULL,1,'2010-11-02 11:45:20'),
 (82,'130','132.000 VND','2010','SÃ¡ch gá»“m 3 chÆ°Æ¡ng :\r\n     ChÆ°Æ¡ng 1: TÃ­ch PhÃ¢n\r\n     ChÆ°Æ¡ng 2: Äáº¡o HÃ m\r\n     ChÆ°Æ¡ng 3: HÃ m Sá»‘',14,1,17,5,'Láº¬P TRÃŒNH Máº NG',0,NULL,NULL,11,'16','23','23',NULL,1,'2010-09-18 10:38:19');
/*!40000 ALTER TABLE `sach` ENABLE KEYS */;


--
-- Definition of table `tacgia`
--

DROP TABLE IF EXISTS `tacgia`;
CREATE TABLE `tacgia` (
  `MaTacGia` int(10) unsigned NOT NULL auto_increment,
  `TenTacGia` varchar(100) default NULL,
  PRIMARY KEY  (`MaTacGia`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tacgia`
--

/*!40000 ALTER TABLE `tacgia` DISABLE KEYS */;
INSERT INTO `tacgia` (`MaTacGia`,`TenTacGia`) VALUES 
 (1,'NGUYá»„N MINH NGHÄ¨A'),
 (2,'TRáº¦N VÄ‚N NAM'),
 (3,'ÄÃ€O THá»Š MAI'),
 (4,'NGUYá»„N MINH Háº¢I'),
 (5,'ÄÃ€O THANH LAM'),
 (6,'VÃ• THá»Š KIá»€U'),
 (7,'CHU Táº¤N MINH'),
 (8,'TRáº¦N THá»Š Cáº¨M VÃ‚N'),
 (9,'MAI THá»Š Háº NH'),
 (10,'NGUYá»„N Háº¢I Yáº¾N'),
 (11,'CHU Táº¤N AN'),
 (12,'TRáº¦N BÃCH NGá»ŒC'),
 (13,'LÃŠ VÄ‚N KHÃNH'),
 (14,'Äá»– THÃšY MAI'),
 (15,'CAO THáº¾ VINH'),
 (16,'ÄÃ€O THá»Š Háº NH'),
 (17,'Äáº¶NG THÃ™Y TRANG'),
 (18,'VÃ• THÃšY MI'),
 (19,'TRáº¦N VÃ• AN'),
 (20,'MAI Há»’NG HUáº¾'),
 (21,'LÆ¯U THá»Š DIá»„M HÆ¯Æ NG');
/*!40000 ALTER TABLE `tacgia` ENABLE KEYS */;


--
-- Definition of table `thanhvien`
--

DROP TABLE IF EXISTS `thanhvien`;
CREATE TABLE `thanhvien` (
  `MaThanhVien` int(10) unsigned NOT NULL auto_increment,
  `TenThanhVien` varchar(70) default NULL,
  `GioiTinh` varchar(10) default NULL,
  `NgaySinh` datetime default NULL,
  `MaLop` int(10) unsigned default NULL,
  `MaKhoa` int(10) unsigned default NULL,
  `QueQuan` varchar(250) default NULL,
  `Pass` varchar(45) default NULL,
  `Level` tinyint(10) unsigned default '4',
  `NgayLapThe` datetime default NULL,
  `SoDienThoai` varchar(45) default NULL,
  `Username` varchar(100) default NULL,
  `Email` varchar(100) default NULL,
  `SoLanLogin` int(10) unsigned default NULL,
  `DisableDateUser` datetime default NULL,
  `Active` tinyint(10) unsigned default NULL,
  `TongSoSachMuon` tinyint(10) unsigned default NULL,
  PRIMARY KEY  (`MaThanhVien`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `thanhvien`
--

/*!40000 ALTER TABLE `thanhvien` DISABLE KEYS */;
INSERT INTO `thanhvien` (`MaThanhVien`,`TenThanhVien`,`GioiTinh`,`NgaySinh`,`MaLop`,`MaKhoa`,`QueQuan`,`Pass`,`Level`,`NgayLapThe`,`SoDienThoai`,`Username`,`Email`,`SoLanLogin`,`DisableDateUser`,`Active`,`TongSoSachMuon`) VALUES 
 (2,'Pháº¡m Thá»‹ Ngá»c Yáº¿n','Ná»¯ ','2010-08-13 00:00:00',8,1,'Sá»‘ 10-Quá»‘c lá»™ 13-PhÆ°á»ng 26-quáº­n BÃ¬nh Tháº¡nh -TP HCM','e10adc3949ba59abbe56e057f20f883e',2,'2010-08-31 18:00:09','01682015962','12','ngocyen@gmail.com',0,'2010-08-31 18:00:09',1,NULL),
 (3,'Äinh Thá»‹ Ngá»c','Ná»¯ ','2010-08-18 00:00:00',7,1,'Sá»‘ 10-Quá»‘c lá»™ 13-PhÆ°á»ng 26-quáº­n BÃ¬nh Tháº¡nh -TP HCM','e10adc3949ba59abbe56e057f20f883e',3,'2010-08-31 18:00:09','01222023202','123','ngoc@gmail.com',0,'2010-08-31 18:00:09',1,NULL),
 (4,'Nguyá»…n Thanh','Nam','2010-09-06 00:00:00',13,2,'Sá»‘ 10-Quá»‘c lá»™ 13-PhÆ°á»ng 26-quáº­n BÃ¬nh Tháº¡nh -TP HCM','e10adc3949ba59abbe56e057f20f883e',4,'2010-09-03 22:09:53','01682015963','1234','nguyenthanh@gmail.com',0,'2010-09-03 22:09:53',1,NULL),
 (5,'Tráº§n Thá»‹ Thu','Ná»¯ ','2010-09-01 00:00:00',19,5,'Sá»‘ 10-Quá»‘c lá»™ 13-PhÆ°á»ng 26-quáº­n BÃ¬nh Tháº¡nh -TP HCM','e10adc3949ba59abbe56e057f20f883e',4,'2010-09-03 22:09:54','01682547894','12345','thu@yahoo.com',0,'2010-09-03 22:09:54',1,NULL),
 (6,'Nguyá»…n Táº¥n Äá»©c','Nam','2010-09-21 00:00:00',22,7,'Sá»‘ 10-Quá»‘c lá»™ 13-PhÆ°á»ng 26-quáº­n BÃ¬nh Tháº¡nh -TP HCM','e10adc3949ba59abbe56e057f20f883e',4,'2010-09-03 22:09:54','07895461230','123456','tanduc@yahoo.com',0,'2010-09-03 22:09:54',1,NULL),
 (7,'ÄÃ o Duy TÃ¹ng','Nam','2010-09-07 00:00:00',25,6,'Sá»‘ 10-Quá»‘c lá»™ 13-PhÆ°á»ng 26-quáº­n BÃ¬nh Tháº¡nh -TP HCM','e10adc3949ba59abbe56e057f20f883e',4,'2010-09-03 22:20:06','0123456789','1234567','duytung@gmail.com',0,'2010-09-03 22:20:06',1,NULL),
 (8,'Tráº§n ÄÃ¬nh Thoáº£ng','Nam','2010-09-09 00:00:00',26,6,'Sá»‘ 10-Quá»‘c lá»™ 13-PhÆ°á»ng 26-quáº­n BÃ¬nh Tháº¡nh -TP HCM','e10adc3949ba59abbe56e057f20f883e',4,'2010-09-03 22:20:06','1235896203','12345678','huunhan@yahoo.com',0,'2010-09-03 22:20:06',1,NULL),
 (9,'LÃª Thanh LiÃªm','Nam','2010-09-27 00:00:00',29,8,'Sá»‘ 10-Quá»‘c lá»™ 13-PhÆ°á»ng 26-quáº­n BÃ¬nh Tháº¡nh -TP HCM','e10adc3949ba59abbe56e057f20f883e',4,'2010-09-03 22:20:06','0122257896','123456789','thanhliem@yahoo.com',0,'2010-09-03 22:20:06',1,NULL),
 (10,'Nguyá»…n Há»¯u Nháº«n','Nam','2010-09-30 00:00:00',29,8,'Sá»‘ 10-Quá»‘c lá»™ 13-PhÆ°á»ng 26-quáº­n BÃ¬nh Tháº¡nh -TP HCM','e10adc3949ba59abbe56e057f20f883e',4,'2010-09-03 22:20:06','0128456798','45689787266','dinhthoang@gmail.com',0,'2010-09-03 22:20:06',1,NULL),
 (11,'Tráº§n HoÃ ng Huy','Nam','2010-09-24 00:00:00',30,8,'Sá»‘ 10-Quá»‘c lá»™ 13-PhÆ°á»ng 26-quáº­n BÃ¬nh Tháº¡nh -TP HCM','e10adc3949ba59abbe56e057f20f883e',4,'2010-09-03 22:20:06','0125789623','45689956663','thom@gmail.com',0,'2010-09-03 22:20:06',1,NULL),
 (12,'Nguyá»…n VÄƒn ThÆ¡m','Nam','2010-09-11 00:00:00',30,8,'Sá»‘ 10-Quá»‘c lá»™ 13-PhÆ°á»ng 26-quáº­n BÃ¬nh Tháº¡nh -TP HCM','e10adc3949ba59abbe56e057f20f883e',4,'2010-09-03 22:20:06','0987456213','45566788991','hoanghuy@yahoo.com',0,'2010-09-03 22:20:06',1,NULL),
 (14,'Äá»— Thá»‹ Thanh XuÃ¢n','Ná»¯ ','2010-09-14 00:00:00',2,3,'Sá»‘ 10-Quá»‘c lá»™ 13-PhÆ°á»ng 26-quáº­n BÃ¬nh Tháº¡nh -TP HCM','25f9e794323b453885f5181f1b624d0b',1,'2010-09-22 07:48:43','01682016073','250728860','phuongnho.thanh@gmail.com',0,'2010-09-22 07:48:43',1,NULL),
 (15,'Nguyá»…n Ngá»c PhÆ°á»›c','Nam','2010-09-14 00:00:00',8,1,'Sá»‘ 10-Quá»‘c lá»™ 13-PhÆ°á»ng 26-quáº­n BÃ¬nh Tháº¡nh -TP HCM','e10adc3949ba59abbe56e057f20f883e',4,'2010-09-24 21:36:53','0987456123','25','ngocphuoc@gmail.com',0,'2010-09-24 21:36:54',1,NULL);
/*!40000 ALTER TABLE `thanhvien` ENABLE KEYS */;


--
-- Definition of table `vitri`
--

DROP TABLE IF EXISTS `vitri`;
CREATE TABLE `vitri` (
  `MaViTri` int(10) unsigned NOT NULL auto_increment,
  `TenViTri` varchar(45) default NULL,
  `Khu` varchar(45) default NULL,
  `Ke` varchar(45) default NULL,
  `Ngan` varchar(45) default NULL,
  PRIMARY KEY  (`MaViTri`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vitri`
--

/*!40000 ALTER TABLE `vitri` DISABLE KEYS */;
INSERT INTO `vitri` (`MaViTri`,`TenViTri`,`Khu`,`Ke`,`Ngan`) VALUES 
 (1,'Vá»‹ TrÃ­ 1','Khu A','Ká»‡ 1-------> 5','NgÄƒn 1---------> 10'),
 (2,'Vá»‹ TrÃ­ 2','Khu A','Ká»‡ 5 ---------> 6','NgÄƒn 11------------>20'),
 (3,'Vá»‹ TrÃ­ 4','Khu B','Ká»‡ 6 ------>10','NgÄƒn 11 ------> 20'),
 (4,'Vá»‹ TrÃ­ 5','Khu C','Ká»‡ 1 ------->5','NgÄƒn 1 --------->10'),
 (5,'Vá»‹ TrÃ­ 6','Khu C','Ká»‡ 6 -------> 10','NgÄƒn  11 ----------> 20'),
 (6,'Vá»‹ TrÃ­ 7','Khu D','Ká»‡ 1-------->5','NgÄƒn 1----------> 10'),
 (7,'Vá»‹ TrÃ­ 8','Khu D','Ká»‡ 6 -------->10','NgÄƒn 11 -------------> 20'),
 (8,'Vá»‹ TrÃ­ 3','Khu B','Ká»‡ 1-----------> 5','NgÄƒn 1------------>10'),
 (9,'Vá»‹ TrÃ­ 9','Khu E','Ká»‡ 1---------> 5','NgÄƒn 1------->10'),
 (10,'Vá»‹ TrÃ­ 10','Khu E','Ká»‡ 6--------->10','NgÄƒn 11--------->20'),
 (11,'Vá»‹ TrÃ­ 11','Khu F','Ká»‡ 1------>5','NgÄƒn 1 ----->10'),
 (12,'Vá»‹ TrÃ­ 12','Khu F','Ká»‡ 5 ---------> 6','NgÄƒn 11 ------> 20'),
 (13,'Vá»‹ TrÃ­ 13','Khu H','Ká»‡ 1 ------->5','NgÄƒn 1 --------->10'),
 (14,'Vá»‹ TrÃ­ 14','Khu H','Ká»‡ 6 -------> 10','NgÄƒn  11 ----------> 20'),
 (15,'Vá»‹ TrÃ­ 15','Khu G','Ká»‡ 1-------->5','NgÄƒn 1----------> 10'),
 (16,'Vá»‹ TrÃ­ 16','Khu G','Ká»‡ 6 -------->10','NgÄƒn 11 -------------> 20'),
 (17,'Vá»‹ TrÃ­ 17','Khu P','Ká»‡ 1 ------>5','NgÄƒn 1 ----->10'),
 (18,'Vá»‹ TrÃ­ 18','Khu P','Ká»‡ 6 ------>10','NgÄƒn 11 ------> 20'),
 (19,'Vá»‹ TrÃ­ 19','Khu X','Ká»‡ 1 ------->5','NgÄƒn 1 --------->10'),
 (20,'Vá»‹ TrÃ­ 20','Khu X','Ká»‡ 6 -------> 10','NgÄƒn  11 ----------> 20'),
 (21,'Vá»‹ TrÃ­ 21','Khu U','Ká»‡ 1-------->5','NgÄƒn 1----------> 10');
/*!40000 ALTER TABLE `vitri` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
