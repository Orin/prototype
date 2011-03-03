DROP TABLE Bookings;
DROP TABLE customer;
DROP TABLE flightSchedule;
DROP TABLE flight_discounts;
DROP TABLE schedule_discounts;
DROP TABLE flight;
DROP TABLE users;
DROP TABLE airports;
DROP TABLE agents;


CREATE TABLE airports(
name VARCHAR (3) PRIMARY KEY
)ENGINE=InnoDB;


CREATE TABLE flight(
flightNo VARCHAR(14) PRIMARY KEY,
destination VARCHAR(100) NOT NULL,
departure VARCHAR(100) NOT NULL,
capacity INT NOT NULL,
econemyseats INT NOT NULL,
businessseats INT NOT NULL,
groupseats INT NOT NULL,
econPrice INT NOT NULL,
busPrice INT NOT NULL,
groupPrice INT NOT NULL,
Foreign Key (destination) references airports(name),
Foreign Key (departure) references airports(name)
)ENGINE=InnoDB; 

CREATE TABLE flight_discounts(
discountID INT auto_increment PRIMARY KEY,
refID VARCHAR(14),
percentageGlobal INT,
valueGlobal INT,
percentageEcon INT,
valueEcon INT,
percentageBusiness INT,
valueBusiness INT,
percentageGroup INT,
valueGroup INT,
startDate DATE NOT NULL,
endDate DATE NOT NULL,
Foreign Key (refID) references flight(flightNo)
)ENGINE=InnoDB;


CREATE TABLE flightSchedule(
ScheduleID INT PRIMARY KEY,
FlightNo VARCHAR(14),
departuredate DATE NOT NULL,
departureTime TIME NOT NULL,
arrivalTime TIME NOT NULL,
availableEconomySeats INT NOT NULL,
availableBusinessSeats INT NOT NULL,
availableGroupSeats INT NOT NULL,
availableSeats INT NOT NULL,
Foreign Key (FlightNo) references flight(flightNo)
)ENGINE=InnoDB; 


CREATE TABLE schedule_discounts(
discountID INT auto_increment PRIMARY KEY,
refID INT,
percentageGlobal INT,
valueGlobal INT,
percentageEcon INT,
valueEcon INT,
percentageBusiness INT,
valueBusiness INT,
percentageGroup INT,
valueGroup INT,
startDate DATE NOT NULL,
endDate DATE NOT NULL,
Foreign Key (refID) references flightSchedule(ScheduleID)
)ENGINE=InnoDB;


CREATE TABLE customer(
customerID INT PRIMARY KEY,
Firstname VARCHAR(100) NOT NULL,
LastName VARCHAR(100) NOT NULL,
DOB DATE NOT NULL,
Sex VARCHAR(1) NOT NULL,
EmailAddress VARCHAR(100)
)ENGINE=InnoDB; 

CREATE TABLE agents(
name VARCHAR(100) PRIMARY KEY
)ENGINE=InnoDB;

CREATE TABLE Bookings(
bookingID INT PRIMARY KEY,
FlightScheduleID INT,
customerID INT,
travleAgent VARCHAR(100),
Foreign Key (FlightScheduleID) references flightSchedule(ScheduleID),
Foreign Key (customerID) references customer(customerID)
)ENGINE=InnoDB; 

CREATE TABLE users(
username VARCHAR(10) PRIMARY KEY,
password VARCHAR(10),
accessLevel INT,
displayName VARCHAR(40)
)ENGINE=InnoDB; 


INSERT INTO airports(name) VALUES ('EDI');
INSERT INTO airports(name) VALUES ('GLA');
INSERT INTO airports(name) VALUES ('ABZ');

INSERT INTO agents(name) VALUES ('Thompson Holidays');
INSERT INTO agents(name) VALUES ('Thomas Cook');
INSERT INTO agents(name) VALUES ('First Choice');
INSERT INTO agents(name) VALUES ('Travel Supermarket');

INSERT INTO flight(flightNo, destination, departure, capacity, econemyseats,businessseats,groupseats,econPrice,busPrice,groupPrice) VALUES('EDI-GLA-101','GLA','EDI',100,20,30,50,20,30,40);
INSERT INTO flight(flightNo, destination, departure, capacity, econemyseats,businessseats,groupseats,econPrice,busPrice,groupPrice) VALUES('EDI-ABZ-101','EDI','ABZ',100,20,30,50,20,30,40);
INSERT INTO flight(flightNo, destination, departure, capacity, econemyseats,businessseats,groupseats,econPrice,busPrice,groupPrice) VALUES('GLA-EDI-102','GLA','EDI',100,20,30,50,20,30,40);

INSERT INTO flight_discounts(refID, percentageGlobal,valueGlobal, percentageEcon, valueEcon, percentageBusiness, valueBusiness, percentageGroup, valueGroup, startDate, endDate) VALUES ('EDI-GLA-101',0,0,0,0,0,0,0,0,'0000-00-00','0000-00-00');


INSERT INTO customer(customerID,FirstName, LastName, DOB,Sex,EmailAddress) VALUES (123, 'Bob','Marly', '2010-12-21', 'M', 'boby@RastasAreUs.com');
INSERT INTO customer(customerID,FirstName, LastName, DOB,Sex,EmailAddress) VALUES (124, 'Chary','Mgee', '2010-12-21', 'M', 'boby@RastasAreUs.com');
INSERT INTO customer(customerID,FirstName, LastName, DOB,Sex,EmailAddress) VALUES (125, 'Harry','Ramsden', '2010-12-21', 'M', 'boby@RastasAreUs.com');

INSERT INTO users(username, password, accessLevel, displayName) VALUES ('craig', '1', 1, 'Craig');
INSERT INTO users(username, password, accessLevel, displayName) VALUES ('Michael', 'thistleSQL', 1, 'Michael');

INSERT INTO flightSchedule(ScheduleID,FlightNo,departuredate,departureTime,arrivalTime,availableEconomySeats,availableBusinessSeats,availableGroupSeats,availableSeats) VALUES (1, 'EDI-GLA-101', '2010-06-14', '08:00', '09:00', 20,30,50,100);
INSERT INTO flightSchedule(ScheduleID,FlightNo,departuredate,departureTime,arrivalTime,availableEconomySeats,availableBusinessSeats,availableGroupSeats,availableSeats) VALUES (2, 'EDI-ABZ-101', '2010-06-14', '08:00', '09:00', 20,30,50,100);
INSERT INTO flightSchedule(ScheduleID,FlightNo,departuredate,departureTime,arrivalTime,availableEconomySeats,availableBusinessSeats,availableGroupSeats,availableSeats) VALUES (3, 'GLA-EDI-102', '2010-06-14', '08:00', '09:00', 20,30,50,100);


INSERT INTO Bookings(bookingID, FlightScheduleID, customerID) VALUES (1233423,1,123);
INSERT INTO Bookings(bookingID, FlightScheduleID, customerID) VALUES (1233424,2,124);
INSERT INTO Bookings(bookingID, FlightScheduleID, customerID) VALUES (1233425,3,125);


