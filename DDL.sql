CREATE DATABASE CarRentalCompany;
  Use CarRentalCompany;


  CREATE TABLE Car (
  plateID varchar(15) NOT NULL,
  brand varchar(25) NOT NULL,
  Model varchar(50) NOT NULL,
  year int NOT NULL,
  type varchar(50) NOT NULL,
  mileage float NOT NULL,
  isAvailable boolean NOT null,
  pricePerday float NOT null,
  location varchar(100) NOT NULL,
  image longblob NOT NULL,
  PRIMARY KEY (plateID)
);  


  CREATE TABLE Customer (
  customerID int NOT NULL auto_increment,
  firstName char(50) NOT null,
  lastName char(50) NOT null,
  email varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  dateOfBirth date NOT NULL,
  street char(60) NOT NULL,
  country varchar(20) NOT null,
  city varchar(25) NOT null,
  zipCode int NOT null,
  licenseNumber varchar(50) NOT null,
  phoneNumber int NOT null,
  PRIMARY KEY (customerID)
);


CREATE TABLE Admin (
  firstName char(225) NOT null,
  lastName char(225) NOT null,
  email varchar(225) NOT NULL,
  password varchar(50) NOT NULL
);

CREATE TABLE Reservation (
  customerID int NOT NULL,
  plateID varchar(15) NOT NULL,
  reservationID int NOT NULL,
  reservationDate timestamp NOT NULL,
  pickupDate date NOT NULL,
  returnDate date NOT NULL,
  totalPrice float NOT NULL,
  isPickedup boolean not null,
  isReturned boolean not null,
  isPaid boolean not null,   
  PRIMARY KEY (reservationID, customerID, plateID),
  FOREIGN KEY (customerID) REFERENCES Customer (customerID) on delete cascade on update cascade,
  FOREIGN KEY (plateID) REFERENCES Car (plateID) on delete cascade on update cascade
);

CREATE TABLE messages(
  messageID int(20) NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  message varchar(255) NOT NULL,
  PRIMARY KEY(messageID)
);


CREATE TABLE payment (
  pID int(11) NOT NULL AUTO_INCREMENT,
  paymentDate date NOT NULL,
  reservationID int(11) NOT NULL,
  totalPrice float NOT NULL,
  cardNumber varchar(100) NOT NULL,
  CVV int(100) NOT NULL,
  PRIMARY KEY(pID),
  FOREIGN KEY (reservationID) REFERENCES reservation (reservationID) ON DELETE CASCADE ON UPDATE CASCADE
);