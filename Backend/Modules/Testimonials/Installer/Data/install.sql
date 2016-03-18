CREATE TABLE IF NOT EXISTS `testimonials` (
 `id` int(11) NOT NULL auto_increment,
 `meta_id` int(11) NOT NULL,
 `language` varchar(5) NOT NULL,
 `titel` varchar(255) NOT NULL,
 `tekst` text,
 `klant` varchar(255),
 `show` ENUM('Y','N'),
 `datum` datetime,
 `created_on` datetime NOT NULL,
 `edited_on` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;