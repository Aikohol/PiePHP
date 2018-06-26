DROP DATABASE IF EXISTS PiePHP;
CREATE DATABASE PiePHP;

USE PiePHP;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `movies`;

CREATE TABLE `movies` (
  `id` int(11) NOT NULL auto_increment,
  `titre` varchar(60) NOT NULL,
  `realisateur` varchar(60) NOT NULL,
  `image` varchar(128) NOT NULL,
  `genre` varchar(20) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `genres`;

CREATE TABLE `genres` (
  `id` int(11) NOT NULL auto_increment,
  `id_movie` varchar(60) NOT NULL,
  `nom` varchar(255) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `historiques` (
  `id` int(11) NOT NULL auto_increment,
  `id_user` varchar(60) NOT NULL,
  `id_movie` varchar(255) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
