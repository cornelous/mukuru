CREATE DATABASE mukuru;
USE mukuru;

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

INSERT INTO `users` (`id`, `username`, `password`, `namesurname`, `address`, `city`, `country`, `email`, `phonenumber`, `image`, `verified`, `active`) VALUES
  ('','mukuru', 'mukuru', 'Clive C. Banditi', '70 Gordon Villas, Gordons Bay', 'Capetown', 2, 'kreativeq@gmail.com', '073 334 3765', '', '1', '1'),
  ('','varaidzo', 'varaidzo', 'Varaidzo P. Chiro', '5 Dunbar Road, Southdowns', 'Gweru', 1, 'varaidzochiro@gmail.com', '0777222006', '', '1', '1'),
  ('','tawanda', 'tawanda', 'Tawanda Banditi', '5 Dunbar Road, Southdowns', 'Gweru', 1, 'tawagunnaz@gmail.com', '0777222004', '', '1', '1'),
  ('','kudzai', 'kudzai', 'Kudzai E.Mpofu', 'Morningside Suburbs', 'Masvingo', 1, 'kudzai@cornelo.us', '0777222007', '', '0', '0'),
  ('','walter', 'walter', 'Walter Chimuka', 'Northend Suburbs', 'Bulawayo', 1, 'walter@cornelo.us', '0777222008', '', '0', '0'),
  ('','brighton', 'brighton', 'Brighton V. Chizhande', 'Mupandawana', 'Gutu', 1, 'brighton@cornelo.us', '0777222009', '', '0', '0'),
  ('','tatenda', 'tatenda', 'Tatenda Mutasa', 'Mt Pleasant', 'Harare', 1, 'tatenda@cornelo.us', '0777222005', '', '0', '0'),
  ('','albert', 'albert', 'Albert Mulingwa', 'Mt Pleasant', 'Harare', 1, 'albert@cornelo.us', '0777222003', '', '0', '0'),
  ('','tafadzwa', 'tafadzwa', 'Tafadzwa Magodora', 'Mt Pleasant', 'Harare', 1, 'tafadzwa@cornelo.us', '0777222002', '', '0', '0'),
  ('','trevor', 'trevor', 'Trevor Muchedzi', 'Mt Pleasant', 'Harare', 1, 'trevor@cornelo.us', '0777222001', '', '0', '0'),
  ('','memory', 'memory', 'Memory Nhimura', 'Mt Pleasant', 'Harare', 1, 'memory@cornelo.us', '0777222000', '', '0', '0'),
  ('','priscilla', 'priscilla', 'Priscilla Chibaro', 'Mt Pleasant', 'Harare', 1, 'priscilla@cornelo.us', '0777222010', '', '0', '0'),
  ('','ambrose', 'ambrose', 'Ambrose Navaya', 'Mt Pleasant', 'Harare', 1, 'ambrose@cornelo.us', '0777222011', '', '0', '0'),
  ('','calistotc', 'calistotc', 'Calistot Chipfumbu', '17b Fountaine Bluea Regent Road Parklands', 'Capetown', 1, 'cchipfumbu@gmail.com', '', '0614820403', '1', '1'),
  ('','lestermadondo', 'icon2802', 'Lester Madondo', '512 Milpark Mews Milpark', 'Johannesburg', 1, 'lestermunyaradzi@gmail.com', '0725608666', '', '1', '1'),
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





