# REST_WebAPI
PHP

Data for init DB:

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 1;
SET time_zone = "+00:00";

CREATE DATABASE phptest;
CREATE USER 'phptest'@'%';
GRANT ALL PRIVILEGES ON phptest.* To 'phptest'@'%' IDENTIFIED BY 'phppassword';

USE phptest;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(60) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `street` varchar(255) NOT NULL,
  `number` varchar(100) DEFAULT NULL,
  `postcode` varchar(30) DEFAULT NULL,
  `coordinates` varchar(33) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO address (country,city,street,number,postcode,coordinates) VALUES ('Poland','Gdańsk','Słowackiego', '50','80-257','54.379774, 18.584442');
INSERT INTO address (country,city,street,number,postcode,coordinates) VALUES ('Poland','Gdańsk','Słowackiego','200','80-298','54.381365, 18.476111');
INSERT INTO address (country,city,street,number,postcode,coordinates) VALUES ('Poland','Gdańsk','Słowackiego','150','80-281','54.371012, 18.555952');
INSERT INTO address (country,city,street,number,postcode,coordinates) VALUES ('Poland','Warszawa','ks. Józefa Poniatowskiego','1','03-901','52.239548, 21.045801');
INSERT INTO address (country,city,street,number,postcode,coordinates) VALUES ('Switzerland','Bern','Maiglöggliweg','2-30','3027','46.950532, 7.388333');
