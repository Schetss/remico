CREATE TABLE IF NOT EXISTS `vastgoedzoeker` (
 `id` int(11) NOT NULL auto_increment,
 `meta_id` int(11) NOT NULL,
 `language` varchar(5) NOT NULL,
 `titel` varchar(255) NOT NULL,
 `taal` ENUM('nl','fr','en') NOT NULL,
 `parameter` varchar(255),
 `created_on` datetime NOT NULL,
 `edited_on` datetime NOT NULL,
 `sequence` int(11) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;