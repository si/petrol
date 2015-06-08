CREATE TABLE `parking_ticket_uses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parking_ticket_id` int(11) DEFAULT NULL,
  `starts` datetime NULL,
  `ends` datetime NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;