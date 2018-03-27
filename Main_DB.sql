*CREATE TABLE Complex(
	name varchar(50) not null, 
	streetNum integer, 
	streetName varchar(50),
	city varchar(50),
	province varchar(50),
	postalCode char(6),
	numTheatres integer,
	primary key(name)
);

*CREATE TABLE Theatre(
	complexName varchar(50) not null,
	theatreNum integer not null,
	maxSeats integer,
	screenSize varchar(6),
	foreign key (complexName) references Complex(name),
	primary key (complexName, theatreNum)
);

*CREATE TABLE Movie(
	title varchar(100) not null,
	runningTime integer,
	rating varchar(4),
	synopsis varchar(500),
	director varchar(100),
	prodComp varchar(100),
	supplierName varchar(100),
	startDate date,
	endDate date,
	foreign key (supplierName) references Supplier(compName),
	primary key (title)
);

*CREATE TABLE Supplier(
	compName varchar(50) not null,
	streetName varchar(50),
	streetNum varchar(50),
	city varchar(50),
	province varchar(50),
	postalCode char(6),
	phone char(10),
	contactFName varchar(10),
	contactLName varchar(10),
	primary key (compName)
);

*Create Table Actor(
	fName varchar(50) not null,
	lName varchar(50) not null,
	primary key (fName,lName)
);

*create table Stars
(
    fName varchar(100) not null references Actor(fName),
	lName varchar(100) not null references Actor(lName),
    title varchar(100) not null references Movie(title)
);

*CREATE TABLE Account(
	accountNum integer not null AUTO_INCREMENT,
	password varchar(50) not null,
	fName varchar(50),
	lName varchar(50),
	phone char(10),
	email varchar(50),
	creditCard varchar(15),
	cardExpiry char(4),
	primary key (accountNum)
);

CREATE TABLE Showing(
	complexName varchar(50) not null,
	title varchar(100) not null,
	theatreNum integer not null,
	startTime time not null,
	seatsAvailable integer,
	foreign key (complexName) references Theatre(complexName),
	foreign key (title) references Movie(title),
	foreign key (theatreNum) references Theatre(theatreNum),
	primary key (complexName, theatreNum, title, startTime)
);

*CREATE TABLE Review(
	title varchar(100) not null,
	ID integer not null,
	score integer,
	primary key (ID),
	foreign key (title) references Movie(title)
);

CREATE TABLE Reserved(
	accountNum integer not null,
	complexName varchar(50) not null,
	theatreNum integer not null,
	movieTitle varchar(50) not null,
	startTime time not null,
	ticketsNum integer,
	foreign key (accountNum) references Account(accountNum),
	foreign key (complexName) references Showing(compName),
	foreign key (theatreNum) references Showing(theatreNum),
	foreign key (movieTitle) references Showing(movieTitle),
	foreign key (startTime) references Showing(startTime),
	primary key (accountNum, complexName, theatreNum, movieTitle, startTime)
);