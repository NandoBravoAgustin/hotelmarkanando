CREATE DATABASE hotel;/*Crear una database*/

USE hotel;/*Usa una sentencia estructural*/



CREATE TABLE rooms(
nombre VARCHAR(20)NOT NULL,
description VARCHAR(1000) NOT NULL,
bathroom VARCHAR(2) NOT NULL,
room VARCHAR(2) NOT NULL,
person VARCHAR(2) NOT NULL,
price VARCHAR(3) NOT NULL,
image VARCHAR(100) NOT NULL,
star VARCHAR(3) NOT NULL,
PRIMARY KEY(nombre)

);
CREATE TABLE reservation(
	habitacion VARCHAR(20)NOT NULL,
	fecha_entrada VARCHAR(12)NOT NULL,
	fecha_salida VARCHAR(12)NOT NULL,
	cantidad_personas VARCHAR(2)NOT NULL,
	id int NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id)
);
CREATE TABLE admin(
	nombre VARCHAR(10) NOT NULL,
	password VARCHAR(10) NOT NULL,
	PRIMARY KEY(nombre)
);
INSERT INTO admin(nombre,password) VALUES
("jefazo","jef4so");
INSERT INTO rooms(nombre,description,bathroom,room,person,price,image,star) VALUES ("Room cool","esto es una descripcion echa desde sql",2,3,7,240,"dafadfsa.png",3)