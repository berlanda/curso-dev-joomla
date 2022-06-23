CREATE TABLE IF NOT EXISTS `#__biblioteca_livro` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`titulo` varchar(250) NOT NULL DEFAULT '',
	`alias` varchar(255) NOT NULL DEFAULT '',
	`catid` int(11) NOT NULL DEFAULT '0',
	`autorid` int(11) NOT NULL DEFAULT '0',
	`state` tinyint(1) NOT NULL default '0',
	`imagem` varchar(255) NOT NULL,
	`editora` varchar(250) NOT NULL DEFAULT '',
	`ano_publicacao` varchar(12) NOT NULL DEFAULT '',
	`url` varchar(255) NOT NULL,
	`descricao` TEXT,
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`ordering` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__biblioteca_autor` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`nome` varchar(250) NOT NULL DEFAULT '',
	`alias` varchar(255) NOT NULL DEFAULT '',
	`state` tinyint(1) NOT NULL default '0',
	`imagem` varchar(255) NOT NULL,
	`url` varchar(255) NOT NULL,
	`descricao` TEXT,
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`ordering` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

	ALTER TABLE `jos_livro`
	ADD  `catid` int(11) NOT NULL DEFAULT '0',
	ADD  `state` tinyint(1) NOT NULL default '0',
	ADD  `image` varchar(255) NOT NULL,
	ADD  `company` varchar(250) NOT NULL DEFAULT '',
	ADD  `phone` varchar(12) NOT NULL DEFAULT '',
	ADD  `url` varchar(255) NOT NULL,
	ADD  `description` TEXT;

	ALTER TABLE `jos_livro`
	ADD	 `titulo` varchar(250) NOT NULL DEFAULT '',
	ADD  `autorid` int(11) NOT NULL DEFAULT '0',
	ADD  `imagem` varchar(255) NOT NULL,
	ADD  `editora` varchar(250) NOT NULL DEFAULT '',
	ADD  `ano_publicacao` varchar(12) NOT NULL DEFAULT '',
	ADD  `descricao` TEXT; 
*/

/*
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; #PERMITE INSERIR VALOR DEFAULT '0000-00-00 00:00:00'
SET time_zone = "+00:00";

	ALTER TABLE `jos_livro`
   ADD `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
   ADD `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00';

*/

/*
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; #PERMITE INSERIR VALOR DEFAULT '0000-00-00 00:00:00'

ALTER TABLE `jos_livro`
   ADD `ordering` int(11) NOT NULL DEFAULT '0';
*/