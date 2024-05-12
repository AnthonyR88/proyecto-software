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