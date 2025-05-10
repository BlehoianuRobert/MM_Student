create database students_db;

use students_db;

create table students (
id int auto_increment primary key,
name varchar(255),
age int,
gender varchar(10),
major varchar(100),
UNIQUE	(name, age, gender, major)
);
ALTER TABLE students AUTO_INCREMENT = 1;