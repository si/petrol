-- Create syntax for '(null)'

-- Create syntax for TABLE 'vehicle_event_types'
CREATE TABLE `vehicle_event_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert syntax for TABLE 'vehicle_event_types'
INSERT INTO `vehicle_event_types` (`id`, `name`)
VALUES
  (1, 'Insurance Renewal'),
  (2, 'Breakdown Renewal'),
  (3, 'Vehicle Tax'),
  (4, 'Service'),
  (5, 'MOT');

-- Create syntax for TABLE 'vehicle_events'
CREATE TABLE `vehicle_events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) DEFAULT NULL,
  `vehicle_event_type_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `provider` varchar(30) DEFAULT NULL,
  `provider_reference` varchar(30) DEFAULT NULL,
  `provider_telephone` varchar(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Create syntax for TABLE 'vehicle_statuses'
CREATE TABLE `vehicle_statuses` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert syntax for TABLE 'vehicle_statuses'
INSERT INTO `vehicle_statuses` (`id`, `name`)
VALUES
  (1, 'On the road'),
  (2, 'Off road'),
  (3, 'Rented'),
  (4, 'Sold');


-- Alter syntax for TABLE 'vehicles'
ALTER TABLE vehicles ADD nickname varchar(15);
ALTER TABLE vehicles ADD vehicle_status_id int(11);