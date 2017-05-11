-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-05-08 15:52:27
-- 伺服器版本: 5.7.9
-- PHP 版本： 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mydb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member_table`
--

-- database
-- CREATE DATABASE IF NOT EXISTS 2910DB;


-- drop tables
DROP TABLE IF EXISTS Account;
DROP TABLE IF EXISTS Details;
DROP TABLE IF EXISTS Pref;


-- create tables
CREATE TABLE IF NOT EXISTS Account(
    accNo       INT(6)          NOT NULL AUTO_INCREMENT,
    username    VARCHAR(30)     NOT NULL,
    accPass     VARCHAR(30)     NOT NULL,
    PRIMARY KEY (accNo),
    CONSTRAINT uq_user UNIQUE (username)
)ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS Details(
    accNo       INT(6)          NOT NULL,
    name        VARCHAR(30)     NOT NULL,
    bio         VARCHAR(100)    DEFAULT NULL,
    portion     VARCHAR(10)     NOT NULL,
    PRIMARY KEY (accNo),
    FOREIGN KEY (accNo) REFERENCES Account(accNo)
);

CREATE TABLE IF NOT EXISTS Preference(
    accNo       INT(6)          NOT NULL,
    food        VARCHAR(20)     NOT NULL,
    foodStatus  VARCHAR(10)     NOT NULL,
    PRIMARY KEY (accNo, food),
    FOREIGN KEY (accNo) REFERENCES Account(accNo)
);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
