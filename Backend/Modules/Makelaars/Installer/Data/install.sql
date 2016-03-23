CREATE TABLE IF NOT EXISTS `makelaars` (
 `id` int(11) NOT NULL auto_increment,
 `meta_id` int(11) NOT NULL,
 `language` varchar(5) NOT NULL,
 `naam` varchar(255) NOT NULL,
 `telefoon` varchar(255),
 `email` varchar(255),
 `image` varchar(255),
 `omschrijving` text,
 `created_on` datetime NOT NULL,
 `edited_on` datetime NOT NULL,
 `sequence` int(11) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;