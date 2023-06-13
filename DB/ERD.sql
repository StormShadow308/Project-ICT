CREATE TABLE Person (
  Name           varchar(255) NOT NULL, 
  DOB            date, 
  Email          varchar(110) NOT NULL, 
  Gender         tinyint(1) NOT NULL, 
  Blood_Type     varchar(4) NOT NULL, 
  Phone          int(11) NOT NULL, 
  `Joining Date` date NOT NULL, 
  Nationality    varchar(20), 
  Expertise      varchar(20), 
  Address        varchar(20), 
  Disability     varchar(20), 
  PRIMARY KEY (Email));

CREATE TABLE Player (
  Member_Renewal_Date date, 
  PlayerEmail         varchar(110) NOT NULL, 
  PRIMARY KEY (PlayerEmail));

CREATE TABLE Coach (
  Salary     int(10) NOT NULL, 
  CoachEmail varchar(110) NOT NULL, 
  PRIMARY KEY (CoachEmail));

CREATE TABLE Payment (
  Transaction_ID    int(11) NOT NULL AUTO_INCREMENT, 
  Transaction_Name  varchar(255) NOT NULL, 
  Member_email      varchar(110) NOT NULL, 
  Amount            int(10) NOT NULL, 
  DOP               date NOT NULL, 
  Transaction_Notes varchar(255), 
  Time              time(6), 
  PRIMARY KEY (Transaction_ID));

CREATE TABLE Complain (
  Complain_ID      int(11) NOT NULL AUTO_INCREMENT, 
  complainant      varchar(110) NOT NULL, 
  Complain_Type    varchar(50), 
  Complain_Details varchar(255), 
  PRIMARY KEY (Complain_ID));

CREATE TABLE Referee (
  RefereeEmail varchar(110) NOT NULL, 
  PRIMARY KEY (RefereeEmail));
CREATE TABLE `Event_Place_Sports Type` (
  Event_PlacePlace_id      int(11) NOT NULL, 
  `Sports TypeSports Name` varchar(100) NOT NULL, 
  PRIMARY KEY (Event_PlacePlace_id, 
  `Sports TypeSports Name`));
CREATE TABLE Event_Place (
  Place_id                int(11) NOT NULL AUTO_INCREMENT, 
  Name                    varchar(11), 
  Capacity_for_Spectalors int(11), 
  City                    varchar(11), 
  Location                varchar(11), 
  PRIMARY KEY (Place_id));
CREATE TABLE `Sports Type` (
  `Sports Name` varchar(100) NOT NULL, 
  Min_Players   int(11) NOT NULL, 
  Max_Players   int(11), 
  PRIMARY KEY (`Sports Name`));

CREATE TABLE Result (
  `Event ID`          int(10) NOT NULL AUTO_INCREMENT, 
  Participating_Teams int(10) NOT NULL, 
  Winning_Team        int(10) NOT NULL, 
  Score               int(11), 
  PRIMARY KEY (`Event ID`));
CREATE TABLE Event (
  `Event ID`        int(10) NOT NULL AUTO_INCREMENT, 
  Event_Name        varchar(110), 
  RefereeEmail      varchar(110), 
  Team              int(10) NOT NULL, 
  `Event Date`      date NOT NULL, 
  `Event Time`      time(6) NOT NULL, 
  `Event Locatiion` int(11) NOT NULL, 
  PRIMARY KEY (`Event ID`));
CREATE TABLE Team (
  Team_ID      int(10) NOT NULL AUTO_INCREMENT, 
  Team_Players varchar(110) NOT NULL, 
  Teams_Sports varchar(100) NOT NULL, 
  Coach        varchar(110), 
  PRIMARY KEY (Team_ID));

CREATE TABLE Account_Login (
  Email        varchar(110) NOT NULL, 
  Password     varchar(255) NOT NULL, 
  Account_Type varchar(50) NOT NULL, 
  PRIMARY KEY (Email));
CREATE TABLE Equiment (
  Equiment_Name      varchar(60) NOT NULL, 
  Number_of_Equiment int(10), 
  PRIMARY KEY (Equiment_Name));

ALTER TABLE `Event_Place_Sports Type` ADD CONSTRAINT FOREIGN KEY (Event_PlacePlace_id) REFERENCES Event_Place (Place_id);
ALTER TABLE `Event_Place_Sports Type` ADD CONSTRAINT FOREIGN KEY (`Sports TypeSports Name`) REFERENCES `Sports Type` (`Sports Name`);
ALTER TABLE Result ADD CONSTRAINT has FOREIGN KEY (Participating_Teams) REFERENCES Event (`Event ID`);
ALTER TABLE Event ADD CONSTRAINT Participates FOREIGN KEY (Team) REFERENCES Team (Team_ID);
ALTER TABLE Team ADD CONSTRAINT Trains FOREIGN KEY (Coach) REFERENCES Coach (CoachEmail);
ALTER TABLE Team ADD CONSTRAINT FOREIGN KEY (Teams_Sports) REFERENCES `Sports Type` (`Sports Name`);
ALTER TABLE Event ADD CONSTRAINT takesplacein FOREIGN KEY (`Event Locatiion`) REFERENCES Event_Place (Place_id);
ALTER TABLE Result ADD CONSTRAINT Win FOREIGN KEY (Winning_Team) REFERENCES Event (`Event ID`);
ALTER TABLE Account_Login ADD CONSTRAINT Login FOREIGN KEY (Email) REFERENCES Person (Email);
ALTER TABLE Referee ADD CONSTRAINT `Is (Mandatory)` FOREIGN KEY (RefereeEmail) REFERENCES Person (Email);
ALTER TABLE Coach ADD CONSTRAINT FOREIGN KEY (CoachEmail) REFERENCES Person (Email);
ALTER TABLE Player ADD CONSTRAINT FOREIGN KEY (PlayerEmail) REFERENCES Person (Email);
ALTER TABLE Event ADD CONSTRAINT Supervise FOREIGN KEY (RefereeEmail) REFERENCES Referee (RefereeEmail);
ALTER TABLE Payment ADD CONSTRAINT `Pays/Receives` FOREIGN KEY (Member_email) REFERENCES Person (Email);
ALTER TABLE Complain ADD CONSTRAINT FOREIGN KEY (complainant) REFERENCES Person (Email);
