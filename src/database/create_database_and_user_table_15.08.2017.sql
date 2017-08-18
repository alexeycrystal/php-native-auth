CREATE DATABASE `php_auth_task`;
USE `php_auth_task`;

CREATE TABLE IF NOT EXISTS `user` (
  `id`       INT(11)      NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `email`    VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `active`   TINYINT(1)   NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
