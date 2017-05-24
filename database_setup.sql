SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- database
-- CREATE DATABASE IF NOT EXISTS 2910DB;


-- drop tables
DROP TABLE IF EXISTS Account;
DROP TABLE IF EXISTS Details;
DROP TABLE IF EXISTS Preference;
DROP TABLE IF EXISTS Friends;


-- create tables
CREATE TABLE IF NOT EXISTS Account(
    accNo       INT(6)          NOT NULL AUTO_INCREMENT,
    username    VARCHAR(30)     NOT NULL,
    accPass     VARCHAR(30)     NOT NULL,
    PRIMARY KEY (accNo),
    CONSTRAINT uq_user UNIQUE (username)
)AUTO_INCREMENT=11;

CREATE TABLE IF NOT EXISTS Details(
    accNo       INT(6)          NOT NULL,
    name        VARCHAR(30)     NOT NULL,
    bio         VARCHAR(100)    DEFAULT NULL,
    portion     VARCHAR(10)     NOT NULL,
    image       VARCHAR(255)    DEFAULT NULL,
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

CREATE TABLE IF NOT EXISTS Friends(
    accNo1      INT(6)        	NOT NULL,
    accNo2      INT(6)     		NOT NULL,
    status  	INT(1)    		DEFAULT 0,
    PRIMARY KEY (accNo1, accNo2),
    FOREIGN KEY (accNo1) REFERENCES Account(accNo),
	FOREIGN KEY (accNo2) REFERENCES Account(accNo)
);