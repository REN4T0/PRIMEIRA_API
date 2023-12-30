CREATE DATABASE newJourneys;
USE newJourneys;

CREATE TABLE characters(
	id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(250) NOT NULL,
    age INT(10) NOT NULL,
    gender ENUM("M", "F"),
    powers VARCHAR(500) NOT NULL,
    `profile` VARCHAR(2000) NOT NULL,
    imgPath VARCHAR(500)
);