CREATE TABLE Estadios (
    EST_ID INT AUTO_INCREMENT PRIMARY KEY,
    EST_Nombre VARCHAR(50) NOT NULL,
    EST_Ciudad VARCHAR(50) NOT NULL,
    EST_Direccion VARCHAR(40) NOT NULL,
	EST_Capacidad NUMERIC(6,0) NOT NULL,
	EST_Estado CHAR(1) NOT NULL
);

INSERT INTO Estadios() VALUES(null, 'El Campin', 'Bogotá', 'Calle 1', 35000, 'A');
INSERT INTO Estadios() VALUES(null, 'Techo', 'Bogotá', 'Calle 10', 10000, 'A');
INSERT INTO Estadios() VALUES(null, 'Atanasio Girardot', 'Medellín', 'Calle 3', 32000, 'A');
INSERT INTO Estadios() VALUES(null, 'Pascual Guerrero', 'Cali', 'Calle 30', 28000, 'A');
INSERT INTO Estadios() VALUES(null, 'Palmaseca', 'Cali', 'Calle 40', 23000, 'A');
INSERT INTO Estadios() VALUES(null, 'Metropolitano', 'Barranquilla', 'Calle 15', 45000, 'A');
INSERT INTO Estadios() VALUES(null, 'Hernán Ramirez', 'Pereira', 'Calle 34', 27000, 'A');
INSERT INTO Estadios() VALUES(null, 'Palo Negro', 'Manizales', 'Calle 25', 30000, 'A');
INSERT INTO Estadios() VALUES(null, 'Manuel Murillo', 'Ibagué', 'Calle 55', 21000, 'A');
INSERT INTO Estadios() VALUES(null, 'General Santander', 'Cúcuta', 'Calle 0', 33000, 'A');

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