
CREATE DATABASE IF NOT EXISTS `beadando` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `beadando`;

CREATE TABLE `felhasznalok` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` VARCHAR(50) NOT NULL default '',
  `csaladi_nev` varchar(45) NOT NULL default '',
  `uto_nev` varchar(45) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `jelszo` varchar(50) NOT NULL default '',
  `bejelentkezes` varchar(12) NOT NULL default '',
    PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

CREATE TABLE IF NOT EXISTS `uzenet` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) UNSIGNED DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(50) NOT NULL default '',
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `uzenet`
  ADD KEY `fk_uzenet_felhasznalok` (`userid`);

ALTER TABLE `uzenet`
  ADD CONSTRAINT `fk_uzenet_felhasznalok` FOREIGN KEY (`userid`) REFERENCES `felhasznalok` (`id`) ON DELETE CASCADE;

