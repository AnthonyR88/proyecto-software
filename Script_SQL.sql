--DROP DATABASE IF EXISTS DB_Proyecto;
--CREATE DATABASE DB_Proyecto;
--USE DB_Proyecto;

/* Scripts Historia De Usuario HU03 */
CREATE TABLE roles
(
	ROL_Cod INT PRIMARY KEY AUTO_INCREMENT,
	ROL_Nombre VARCHAR(20),
	ROL_Descripcion VARCHAR(200),
	ROL_Estado VARCHAR(1)
);

/* Roles */
INSERT INTO roles() VALUES(null,'Capitan','Persona Que Puede Realizar Inscripciones De jugadores De Su Equipo','A');
INSERT INTO roles() VALUES(null,'Administrador','Persona Que Tiene Control y Acceso Total A la Base De Datos','A');

CREATE TABLE usuarios
(
	USU_Cod VARCHAR(10) PRIMARY KEY,
	USU_Contrasena VARCHAR(16) NOT NULL,
	USU_Nombres VARCHAR(30) NOT NULL,
	USU_Apellidos VARCHAR(30),
	ROL_CodFK INT NOT NULL,
	USU_Ident VARCHAR(10) NOT NULL,
	USU_Estado VARCHAR(1) NOT NULL
);

/* LLave Foranea Para Usuarios-Roles */
ALTER TABLE usuarios
ADD CONSTRAINT FK_Usuario_Rol
FOREIGN KEY (ROL_CodFK) REFERENCES roles (ROL_Cod);

/* Usuario Administrador Por Defecto */
INSERT INTO usuarios() VALUES('ANTONIO8','antonio8','Anthony Nelson','Ruiz Chaparro',2,'1005038384','A');
INSERT INTO usuarios() VALUES('VANEGAS7','vanegas7','Andres Felipe','Vanegas Ávila',2,'1048532137','A');

/* Consulta si existe el usuario y contraseña en la BD para ingresar al sistema */
DELIMITER $$
CREATE PROCEDURE SP_Ingreso_Usuario(IN $Usuario VARCHAR(10), IN $Contra VARCHAR(16))
BEGIN 
SELECT USU_cod, USU_Nombres, USU_Apellidos, ROL_Nombre, USU_Ident FROM usuarios 
INNER JOIN roles ON ROL_CodFK = ROL_Cod
WHERE  USU_Estado = 'A' AND ROL_Estado = 'A' 
AND USU_Cod = $Usuario AND USU_Contrasena = $Contra;
END $$
DELIMITER ;

/* Scripts Historia De Usuario HU13 */
CREATE TABLE Estadios (
    EST_ID INT AUTO_INCREMENT PRIMARY KEY,
    EST_Nombre VARCHAR(50) NOT NULL,
    EST_Ciudad VARCHAR(50) NOT NULL,
    EST_Direccion VARCHAR(40) NOT NULL,
	EST_Capacidad NUMERIC(6,0) NOT NULL,
	EST_Estado CHAR(1) NOT NULL
);

/* Ingresa un Registro en la tabla Estadios */
DELIMITER $$
CREATE PROCEDURE SP_Insert_Estadio(IN Nombre VARCHAR(50), IN Ciudad VARCHAR(50), IN Direccion VARCHAR(40), IN Capacidad NUMERIC(6,0))
BEGIN
INSERT INTO Estadios() VALUES(null,Nombre,Ciudad,Direccion,Capacidad,'A');
END $$
DELIMITER ;

/* Modifica un Registro en la tabla Estadios */
DELIMITER $$
CREATE PROCEDURE SP_Update_Estadio(IN Nombre VARCHAR(50), IN Ciudad VARCHAR(50), IN Direccion VARCHAR(40), IN Capacidad NUMERIC(6,0), IN Cod INT)
BEGIN 
UPDATE Estadios SET EST_Nombre = Nombre, EST_Ciudad = Ciudad, EST_Direccion = Direccion, EST_Capacidad = Capacidad WHERE EST_ID = Cod;
END $$
DELIMITER ;

/* Consulta un único registro de la tabla Estadios */
DELIMITER $$
CREATE PROCEDURE SP_Select_Estadio(IN Cod INT)
BEGIN
SELECT * FROM Estadios WHERE EST_ID = Cod AND EST_Estado = 'A';
END $$
DELIMITER ;

/* Consulta todos los registros de la tabla Estadios */
CREATE VIEW VIEW_Select_Estadios AS
SELECT EST_ID, EST_Nombre, EST_Ciudad, EST_Direccion, EST_Capacidad FROM Estadios
WHERE EST_Estado = 'A';