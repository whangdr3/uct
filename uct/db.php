

create database uct if not exist

use database uct

CREATE TABLE employee (
  id int not null identity primary key,
  fullname varchar(100)  NOT NULL,
  email varchar(100),
  post varchar(255)
);

