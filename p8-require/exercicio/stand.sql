/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.32-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `cars` (
	`Plate` varchar (765),
	`Brand` varchar (765),
	`Model` varchar (765),
	`Year` year (4),
	`Color` varchar (765),
	`Price` Decimal (12),
	`Image` varchar (765)
); 
insert into `cars` (`Plate`, `Brand`, `Model`, `Year`, `Color`, `Price`, `Image`) values('22-AA-22','Fiat','500','1971','','11','https://erclassics.b-cdn.net/media/catalog/product/cache/2/image/700x/17f82f742ffe127f42dca9de82fb58b1/f/i/fiat-500-l-1971-f0660-002.jpg');
insert into `cars` (`Plate`, `Brand`, `Model`, `Year`, `Color`, `Price`, `Image`) values('33-AA-33','BMW','M3',NULL,NULL,NULL,'https://file.kelleybluebookimages.com/kbb/base/evox/CP/53301/2024-BMW-M3-front_53301_032_1851x743_C3G_cropped.png');
insert into `cars` (`Plate`, `Brand`, `Model`, `Year`, `Color`, `Price`, `Image`) values('w112','321321','e21312','0000','321','12312','312321');
