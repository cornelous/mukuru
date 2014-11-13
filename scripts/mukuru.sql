CREATE TABLE IF NOT EXISTS `countries` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`country` varchar(127) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `countries` (`id`,`country`) VALUES ('', 'ZIMBABWE'),('', 'ANGOLA'), ('','MALAWI'), ('', 'SOUTH AFRICA') ;

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`username` varchar(32) NOT NULL DEFAULT '',
`password` char(50) NOT NULL,
`namesurname` char(120) NOT NULL,
`address` char(120) NOT NULL,
`city` char(32) NOT NULL,
`country` int(11) UNSIGNED NOT NULL,
`email` varchar(127) NOT NULL,
`phonenumber` char(50) NOT NULL,
`image` char(120),
`verified` varchar(255) NOT NULL,
`active` int(11) UNSIGNED NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`country`) REFERENCES countries(`id`),
UNIQUE KEY `uniq_username` (`username`),
UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `password`, `namesurname`, `address`, `city`, `country`, `email`, `phonenumber`, `image`, `verified`, `active`) VALUES ('','mukuru', 'mukuru', 'Clive C. Banditi', '70 Gordon Villas, Gordons Bay', 'Capetown', 2, 'kreativeq@gmail.com', '073 334 3765', '', '1', '1');


INSERT INTO `users` (`id`, `username`, `password`, `namesurname`, `address`, `city`, `country`, `email`, `phonenumber`, `image`, `verified`, `active`) VALUES 
('','varaidzo', 'varaidzo', 'Varaidzo P. Chiro', '5 Dunbar Road, Southdowns', 'Gweru', 1, 'varaidzochiro@gmail.com', '0777222006', '', '1', '1'),
('','tawanda', 'tawanda', 'Tawanda Banditi', '5 Dunbar Road, Southdowns', 'Gweru', 1, 'tawagunnaz@gmail.com', '0777222007', '', '1', '1'),
('','tumai', 'tumai', 'Tumai Mafunga', '11 Lundi Road, Southdowns', 'Masvingo', 3, 'tumai@gmail.com', '002677122797238', '', '1', '1'),
('','gracious', 'gracious', 'Gracious Mashasha', '33 Jameson Road, Lundi Park', 'Gweru', 4, 'graccasoft@gmail.com', '002677122797238', '', '1', '1');

CREATE TABLE IF NOT EXISTS `administrators` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`user_id` int(11) UNSIGNED NOT NULL,
`username` varchar(32) NOT NULL DEFAULT '',
`password` char(50) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`user_id`) REFERENCES users(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `administrators` (`id`,`user_id`,`username`, `password`) VALUES ('', 1, 'mukuru', 'admin');





