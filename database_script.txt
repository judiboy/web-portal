CREATE DATABASE cmsc_team_alpha;

USE cmsc_team_alpha;

-- Table structure for table `tbl_driver`
CREATE TABLE IF NOT EXISTS `tbl_driver` (
  `driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_firstname` varchar(50) NOT NULL,
  `driver_lastname` varchar(50) NOT NULL,
  `driver_email` varchar(250) NOT NULL,
  `driver_password` varchar(250) NOT NULL,
  `driver_address` varchar(50) NOT NULL,
  `driver_mobile` varchar(12) NOT NULL,
  `driver_status` varchar(10) DEFAULT 'inactive',
  `driver_verified` varchar(12) DEFAULT 'notverified',
  `driver_token` varchar(250) NOT NULL,
  `driver_thumbnail` varchar(250) NOT NULL,
  `driver_image` varchar(250) NOT NULL,  
  PRIMARY KEY (`driver_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

-- Table structure for table `tbl_rider`
CREATE TABLE IF NOT EXISTS `tbl_rider` (
  `rider_id` int(11) NOT NULL AUTO_INCREMENT,
  `rider_firstname` varchar(50) NOT NULL,
  `rider_lastname` varchar(50) NOT NULL,
  `rider_email` varchar(250) NOT NULL,
  `rider_password` varchar(250) NOT NULL,
  `rider_address` varchar(50) NOT NULL,
  `rider_mobile` varchar(12) NOT NULL,
  `rider_status` varchar(10) DEFAULT 'inactiver',
  `rider_verified` varchar(12) DEFAULT 'notverified',
  `rider_token` varchar(250) NOT NULL,
  `rider_thumbnail` varchar(250) NOT NULL,
  `rider_image` varchar(250) NOT NULL,  
  PRIMARY KEY (`rider_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

-- Table structure for table `tbl_vehicle`
CREATE TABLE IF NOT EXISTS `tbl_vehicle` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_driver_id` int(11) NOT NULL,
  `vehicle_plate_no` varchar(10) NOT NULL,
  `vehicle_type` varchar(10) NOT NULL,
  `vehicle_make` varchar(10) NOT NULL,
  `vehicle_model` varchar(10) NOT NULL,
  `vehicle_color` varchar(10) NOT NULL,
  `vehicle_fare_id` int(11) NOT NULL,
  `vehicle_thumbnail` varchar(250) NOT NULL,
  `vehicle_image` varchar(250) NOT NULL,  
  PRIMARY KEY (`vehicle_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

-- Table structure for table `tbl_trip`
CREATE TABLE IF NOT EXISTS `tbl_trip` (
  `trip_id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_date` date NOT NULL,
  `trip_vehicle_id` int(11) NOT NULL,
  `trip_rider_id` int(11) NOT NULL,
  `trip_location` varchar(250) NOT NULL,
  `trip_destination` varchar(250) NOT NULL,
  `trip_latitude` varchar(250) NOT NULL,
  `trip_longiture` varchar(250) NOT NULL,
  `trip_start` datetime NOT NULL,
  `trip_end` datetime NOT NULL, 
  PRIMARY KEY (`trip_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

-- Table structure for table `tbl_payment`
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_date` date NOT NULL,
  `payment_vehicle_id` int(11) NOT NULL,
  `payment_rider_id` int(11) NOT NULL,
  `payment_amount` decimal (6,2),
  `payment_mode` varchar(50) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

-- Table structure for table `tbl_user`
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_status` varchar(10) DEFAULT 'inactive',
  `user_verified` varchar(12) DEFAULT 'notverified',
  `user_token` varchar(250) NOT NULL,
  `user_thumbnail` varchar(250) NOT NULL,
  `user_image` varchar(250) NOT NULL,  
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

-- Table structure for table `tbl_fare`
CREATE TABLE IF NOT EXISTS `tbl_fare` (
  `fare_id` int(11) NOT NULL AUTO_INCREMENT,
  `fare_amount` decimal (6,2),
  `fare_surge_amount` decimal (6,2),
  PRIMARY KEY (`fare_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;
