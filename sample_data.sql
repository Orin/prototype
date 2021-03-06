SET foreign_key_checks = 0;
DELETE FROM bookings;
DELETE FROM customers;
DELETE FROM passengers;
DELETE FROM `schedule_discounts`;
DELETE FROM flightSchedule;
DELETE FROM bookings_passengers;
DELETE FROM flights;

ALTER TABLE `customers` AUTO_INCREMENT = 1;
ALTER TABLE `passengers` AUTO_INCREMENT = 1;
ALTER TABLE `flightSchedule` AUTO_INCREMENT = 1;

INSERT INTO customers SET bill_fName = 'Mark', bill_lName = 'Tackett';
INSERT INTO customers SET bill_fName = 'Albert', bill_lName = 'Rupp';
INSERT INTO customers SET bill_fName = 'Leonard', bill_lName = 'Lacour';
INSERT INTO customers SET bill_fName = 'Eric', bill_lName = 'Mardis';
INSERT INTO customers SET bill_fName = 'Paul', bill_lName = 'Raymer';
INSERT INTO customers SET bill_fName = 'Claire', bill_lName = 'Phillips';
INSERT INTO customers SET bill_fName = 'John', bill_lName = 'Smith';
INSERT INTO customers SET bill_fName = 'Luke', bill_lName = 'Pash';

INSERT INTO passengers SET fName = 'Kara', lName = 'Randall';
INSERT INTO passengers SET fName = 'Roxanne', lName = 'Shipley';
INSERT INTO passengers SET fName = 'Jane', lName = 'Napper';
INSERT INTO passengers SET fName = 'Edward', lName = 'Costello';
INSERT INTO passengers SET fName = 'Jeffery', lName = 'Ranson';
INSERT INTO passengers SET fName = 'James', lName = 'Sealy';
INSERT INTO passengers SET fName = 'Yvette', lName = 'Barner';
INSERT INTO passengers SET fName = 'Pearl', lName = 'Everette';
INSERT INTO passengers SET fName = 'James', lName = 'Coulson';
INSERT INTO passengers SET fName = 'Craig', lName = 'Diggs';
INSERT INTO passengers SET fName = 'John', lName = 'Smith';
INSERT INTO passengers SET fName = 'Luke', lName = 'Pash';
INSERT INTO passengers SET fName = 'Joanne', lName = 'Livingston';
INSERT INTO passengers SET fName = 'Marlene', lName = 'Yates';
INSERT INTO passengers SET fName = 'Jacob', lName = 'Westover';
INSERT INTO passengers SET fName = 'Doris', lName = 'Leavitt';
INSERT INTO passengers SET fName = 'Thomas', lName = 'Fancher';
INSERT INTO passengers SET fName = 'Clara', lName = 'Macdougall';
INSERT INTO passengers SET fName = 'Marsha', lName = 'Tolman';

INSERT INTO flights SET flightNo = 'TA445', departure = 'EDI', destination = 'GLA', capacity = '50', econSeats = '30', busSeats = '20', groupSeats = 50, econPrice = 20, busPrice = 50, groupPrice = 40;
INSERT INTO flights SET flightNo = 'TA446', departure = 'GLA', destination = 'EDI', capacity = '50', econSeats = '30', busSeats = '20', groupSeats = 50, econPrice = 20, busPrice = 50, groupPrice = 40;
INSERT INTO flights SET flightNo = 'TA447', departure = 'EDI', destination = 'GLA', capacity = '50', econSeats = '30', busSeats = '20', groupSeats = 50, econPrice = 20, busPrice = 50, groupPrice = 40;
INSERT INTO flights SET flightNo = 'TA448', departure = 'GLA', destination = 'EDI', capacity = '50', econSeats = '30', busSeats = '20', groupSeats = 50, econPrice = 20, busPrice = 50, groupPrice = 40;

INSERT INTO flightSchedule SET FlightNo = 'TA445', departuredate = '2011-04-20', departureTime = '10:30:00', arrivalDate = '2011-04-20', arrivalTime = '11:35:00';
INSERT INTO flightSchedule SET FlightNo = 'TA447', departuredate = '2011-04-20', departureTime = '15:00:00', arrivalDate = '2011-04-20', arrivalTime = '16:10:00';
INSERT INTO flightSchedule SET FlightNo = 'TA445', departuredate = '2011-04-21', departureTime = '10:30:00', arrivalDate = '2011-04-21', arrivalTime = '11:35:00';
INSERT INTO flightSchedule SET FlightNo = 'TA447', departuredate = '2011-04-21', departureTime = '15:00:00', arrivalDate = '2011-04-21', arrivalTime = '16:10:00';
INSERT INTO flightSchedule SET FlightNo = 'TA446', departuredate = '2011-04-20', departureTime = '12:45:00', arrivalDate = '2011-04-20', arrivalTime = '14:00:00';
INSERT INTO flightSchedule SET FlightNo = 'TA448', departuredate = '2011-04-20', departureTime = '17:25:00', arrivalDate = '2011-04-20', arrivalTime = '18:40:00';
INSERT INTO flightSchedule SET FlightNo = 'TA446', departuredate = '2011-04-21', departureTime = '12:45:00', arrivalDate = '2011-04-21', arrivalTime = '14:00:00';
INSERT INTO flightSchedule SET FlightNo = 'TA448', departuredate = '2011-04-21', departureTime = '17:25:00', arrivalDate = '2011-04-21', arrivalTime = '18:40:00';

LOCK TABLES `schedule_discounts` WRITE;
ALTER TABLE `schedule_discounts` DISABLE KEYS;
INSERT INTO `schedule_discounts` VALUES 
(4,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1111-02-01','1111-01-01'),
(5,2,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1111-02-01','1111-01-01'),
(6,3,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1111-02-01','1111-01-01'),
(7,4,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1111-02-01','1111-01-01'),
(8,5,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1111-02-01','1111-01-01'),
(10,7,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1111-02-01','1111-01-01'),
(11,8,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1111-02-01','1111-01-01'),
(12,6,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1111-02-01','1111-01-01');
ALTER TABLE `schedule_discounts` ENABLE KEYS;
UNLOCK TABLES;

INSERT INTO bookings SET bookingID = 'SAP5E', flightScheduleID = '1', returnFlightScheduleID = '7', customerID = '1', travelAgent = '', classID = '1', totalCost = '20';
INSERT INTO bookings SET bookingID = 'WAG2Q', flightScheduleID = '3', returnflightScheduleID = '8', customerID = '2', travelAgent = '', classID = '1', totalCost = '20';
INSERT INTO bookings SET bookingID = 'NRG4S', flightScheduleID = '5', returnFlightScheduleID = '3', customerID = '3', travelAgent = '', classID = '1', totalCost = '80';
INSERT INTO bookings SET bookingID = 'PGK7P', flightScheduleID = '1', returnFlightScheduleID = '7', customerID = '4', travelAgent = '', classID = '2', totalCost = '100';
INSERT INTO bookings SET bookingID = 'VKC6M', flightScheduleID = '2', returnFlightScheduleID = '8', customerID = '5', travelAgent = '', classID = '1', totalCost = '20';
INSERT INTO bookings SET bookingID = 'VZJ3S', flightScheduleID = '5', returnFlightScheduleID = '4', customerID = '6', travelAgent = '', classID = '1', totalCost = '60';
INSERT INTO bookings SET bookingID = 'ULK8Z', flightScheduleID = '3', returnFlightScheduleID = '8', customerID = '7', travelAgent = '', classID = '2', totalCost = '50';
INSERT INTO bookings SET bookingID = 'SSD6U', flightScheduleID = '3', returnFlightScheduleID = '8', customerID = '8', travelAgent = '', classID = '1', totalCost = '120';

INSERT INTO bookings_passengers SET bookingID = 'SAP5E', passengerID = '1';
INSERT INTO bookings_passengers SET bookingID = 'WAG2Q', passengerID = '2';
INSERT INTO bookings_passengers SET bookingID = 'NRG4S', passengerID = '3';
INSERT INTO bookings_passengers SET bookingID = 'NRG4S', passengerID = '4';
INSERT INTO bookings_passengers SET bookingID = 'NRG4S', passengerID = '5';
INSERT INTO bookings_passengers SET bookingID = 'NRG4S', passengerID = '6';
INSERT INTO bookings_passengers SET bookingID = 'PGK7P', passengerID = '7';
INSERT INTO bookings_passengers SET bookingID = 'PGK7P', passengerID = '8';
INSERT INTO bookings_passengers SET bookingID = 'VKC6M', passengerID = '9';
INSERT INTO bookings_passengers SET bookingID = 'VZJ3S', passengerID = '10';
INSERT INTO bookings_passengers SET bookingID = 'VZJ3S', passengerID = '11';
INSERT INTO bookings_passengers SET bookingID = 'VZJ3S', passengerID = '12';
INSERT INTO bookings_passengers SET bookingID = 'ULK8Z', passengerID = '13';
INSERT INTO bookings_passengers SET bookingID = 'SSD6U', passengerID = '14';
INSERT INTO bookings_passengers SET bookingID = 'SSD6U', passengerID = '15';
INSERT INTO bookings_passengers SET bookingID = 'SSD6U', passengerID = '16';
INSERT INTO bookings_passengers SET bookingID = 'SSD6U', passengerID = '17';
INSERT INTO bookings_passengers SET bookingID = 'SSD6U', passengerID = '18';
INSERT INTO bookings_passengers SET bookingID = 'SSD6U', passengerID = '19';
SET foreign_key_checks = 1;