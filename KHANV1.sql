CREATE DATABASE khandatabase;
USE khandatabase;




CREATE TABLE `employee` (
  `employeeID` 	int(50) 		NOT NULL AUTO_INCREMENT,
  `email`      	VARCHAR(255)   NOT NULL,
  `firstName`   VARCHAR(60)    NOT NULL,
  `lastName`    VARCHAR(60)    NOT NULL,
  `Address`     VARCHAR(255)   NOT NULL,
  `ssn`     	VARCHAR(9)   NOT NULL,
  `position`    VARCHAR(60)    NOT NULL,
  `salary`    DECIMAL(15,2)  NOT NULL,
  
  PRIMARY KEY (`employeeID`)
);



CREATE TABLE customers (
  customerID        INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(60)    NOT NULL,
  firstName         VARCHAR(60)    NOT NULL,
  lastName          VARCHAR(60)    NOT NULL,
  shipAddressID     INT                       DEFAULT NULL,
  billingAddressID  INT                       DEFAULT NULL,  
  PRIMARY KEY (customerID),
  UNIQUE INDEX emailAddress (emailAddress)
  
);

CREATE TABLE addresses (
  addressID         INT            NOT NULL   AUTO_INCREMENT,
  customerID        INT            NOT NULL,
  line1             VARCHAR(60)    NOT NULL,
  line2             VARCHAR(60)    DEFAULT NULL,
  city              VARCHAR(40)    NOT NULL,
  state             VARCHAR(2)     NOT NULL,
  zipCode           VARCHAR(10)    NOT NULL,
  phone             VARCHAR(12)    NOT NULL,
  PRIMARY KEY (addressID),
  INDEX customerID (customerID)
  
);

CREATE TABLE patients (
  patientID        INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(60)    NOT NULL,
  firstName         VARCHAR(60)    NOT NULL,
  lastName          VARCHAR(60)    NOT NULL,
  shipAddressID     INT                       DEFAULT NULL,
  billingAddressID  INT                       DEFAULT NULL,
  patientStaticID   INT                       DEFAULT NULL,
  PRIMARY KEY (patientID),
  UNIQUE INDEX emailAddress (emailAddress)
  
);

CREATE TABLE patientAddresses (
  addressID         INT            NOT NULL   AUTO_INCREMENT,
  patientID         INT            NOT NULL,
  line1             VARCHAR(60)    NOT NULL,
  line2             VARCHAR(60)    DEFAULT NULL,
  city              VARCHAR(40)    NOT NULL,
  state             VARCHAR(2)     NOT NULL,
  zipCode           VARCHAR(10)    NOT NULL,
  phone             VARCHAR(12)    NOT NULL,
  PRIMARY KEY (addressID),
  INDEX patientID (patientID)
  
);

CREATE TABLE patientStatic (
  staticID          INT            NOT NULL   AUTO_INCREMENT,
  patientID         INT            NOT NULL,
  patientStrDate    DATETIME       NOT NULL,
  age               INT            NOT NULL,
  gender            TINYINT(1)     NOT NULL,
  race              VARCHAR(60)    NOT NULL,
  occupation        VARCHAR(60)    NOT NULL,
  height            INT            NOT NULL,
  weight            INT            NOT NULL,
  diabetic          VARCHAR(12)    NOT NULL,
  aicLevel          INT            NOT NULL,
  cholesterol       INT            NOT NULL,
  strBloodPre       INT            NOT NULL,
  smokerHis         VARCHAR(12)    NOT NULL,
  strBmi            INT            NOT NULL,
  preExistCon1      VARCHAR(60)    DEFAULT NULL,
  preExistCon2      VARCHAR(60)    DEFAULT NULL,
  preExistCon3      VARCHAR(60)    DEFAULT NULL,
  strCalInt         INT            NOT NULL,
  strCalBurn        INT            DEFAULT NULL,
  PRIMARY KEY (staticID),
  INDEX patientID (patientID)
  
);

CREATE TABLE patientDaily (
  dailyID           INT            NOT NULL   AUTO_INCREMENT,
  patientID         INT            NOT NULL,
  patientDate       DATETIME       NOT NULL,
  distance          INT            NOT NULL,
  sleep             INT            NOT NULL,
  calBurn           INT            NOT NULL,
  active            INT            NOT NULL,
  calIntake         INT            NOT NULL,
  bloodPre          INT            NOT NULL,
  actSmoker         INT            NOT NULL,
  bmi               INT            DEFAULT NULL,
  PRIMARY KEY (dailyID),
  INDEX patientID (patientID)
  
);

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON khandatabase.*
TO master_user@localhost
IDENTIFIED BY 'pa55word';



