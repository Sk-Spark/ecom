-- Database for ecom
-- create database ecom;

create table customer (
    id      int not null auto_increment,
    Fname   varchar(100) not null,
    Lname   varchar(100) not null,
    Email   varchar(100) not null,
    Pass    varchar(100) not null,
    Country varchar(100),
    Sate    varchar(100),
    City    varchar(100),
    Pincode int not null,
    HouseNo int,
    LandMark varchar(100),
    Gender  varchar(1),
    Valid varchar(50) not null,

    primary key(id)  
);