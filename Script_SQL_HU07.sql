/* Scripts Historia De Usuario HU07 */
/* Tabla Equipos */
CREATE TABLE Equipos (
    EQU_ID INT AUTO_INCREMENT PRIMARY KEY,
    EQU_Nombre VARCHAR(50) NOT NULL,
    EQU_Ciudad VARCHAR(50) NOT NULL,
    EQU_Fundacion NUMERIC(4,0) NOT NULL,
	EQU_Colores VARCHAR(40) NOT NULL,
	EQU_Capitan INTEGER NOT NULl,	
	EST_IDFK INTEGER NOT NULL,
	EQU_Estado CHAR(1) NOT NULL
);

INSERT INTO Equipos() VALUES(null, 'Millonarios', 'Bogotá', 2000, 'Azul y Blanco', 1, 1, 'A');
INSERT INTO Equipos() VALUES(null, 'Santa Fe', 'Bogotá', 2000, 'Rojo y Blanco', 1, 1, 'A');
INSERT INTO Equipos() VALUES(null, 'La Equidad', 'Bogotá', 2000, 'Verde y Blanco', 1, 2, 'A');
INSERT INTO Equipos() VALUES(null, 'Atletico Nacional', 'Medellín', 2000, 'Verde y Blanco', 1, 3, 'A');
INSERT INTO Equipos() VALUES(null, 'Independiente Medellín', 'Medellín', 2000, 'Rojo y Azul', 1, 3, 'A');
INSERT INTO Equipos() VALUES(null, 'América De Cali', 'Cali', 2000, 'Rojo y Blanco', 1, 4, 'A');
INSERT INTO Equipos() VALUES(null, 'Deportivo Cali', 'Cali', 2000, 'Verde y Blanco', 1, 5, 'A');
INSERT INTO Equipos() VALUES(null, 'Junior', 'Barranquilla', 2000, 'Rojo, Azul y Blanco', 1, 6, 'A');
INSERT INTO Equipos() VALUES(null, 'Deportivo Pereira', 'Pereira', 2000, 'Naranja y Amarillo', 1, 7, 'A');
INSERT INTO Equipos() VALUES(null, 'Once Caldas', 'Manizales', 2000, 'Verde, Blanco y Rojo', 1, 8, 'A');
INSERT INTO Equipos() VALUES(null, 'Tolima', 'Ibagué', 2000, 'Vinotinto y Beish', 1, 9, 'A');
INSERT INTO Equipos() VALUES(null, 'Cúcuta Deportivo', 'Cúcuta', 2000, 'Rojo y Negro', 1, 10, 'A');

/* Tabla Campeonatos */
CREATE TABLE Campeonatos (
    CAM_ID INT AUTO_INCREMENT PRIMARY KEY,
    CAM_Nombre VARCHAR(50) NOT NULL,
    CAM_Ciudad VARCHAR(50) NOT NULL,
    CAM_Anio NUMERIC(4,0) NOT NULL,
	CAM_Campeon INTEGER NOT NULL,
	CAM_SubCampeon INTEGER NOT NULL,
	CAM_Proceso CHAR(2) NOT NULL,
	CAM_Estado CHAR(1) NOT NULL
);

/* Consulta todos los registros de la tabla Estadios */
CREATE VIEW VIEW_Select_Campeonatos AS
SELECT T1.CAM_ID, T1.CAM_Nombre, T1.CAM_Ciudad, T1.CAM_Anio, IFNULL(T2.EQU_Nombre, '-'), IFNULL(T3.EQU_Nombre, '-'), T1.CAM_Proceso FROM Campeonatos T1
LEFT JOIN Equipos T2 ON
T1.CAM_Campeon = T2.EQU_ID
LEFT JOIN Equipos T3 ON
T1.CAM_SubCampeon = T3.EQU_ID
WHERE CAM_Estado = 'A';

/* Consulta un único registro de la tabla Estadios */
DELIMITER $$
CREATE PROCEDURE SP_Select_Campeonato(IN Cod INT)
BEGIN
SELECT * FROM Campeonatos WHERE CAM_ID = Cod AND CAM_Estado = 'A';
END $$
DELIMITER ;

/* Ingresa un Registro en la tabla Campeonatos */
DELIMITER $$
CREATE PROCEDURE SP_Insert_Campeonato(IN Nombre VARCHAR(50), IN Ciudad VARCHAR(50), IN Anio NUMERIC(4,0))
BEGIN
INSERT INTO Campeonatos() VALUES(null, Nombre, Ciudad, Anio, 0, 0, 'PP', 'A');
END $$
DELIMITER ;

/* Modifica un Registro en la tabla Campeonatos */
DELIMITER $$
CREATE PROCEDURE SP_Update_Campeonato(IN Nombre VARCHAR(50), IN Ciudad VARCHAR(50), IN Anio NUMERIC(4,0), IN Campeon INTEGER, IN SubCampeon INTEGER, IN Cod INT)
BEGIN 
UPDATE Campeonatos SET CAM_Nombre = Nombre, CAM_Ciudad = Ciudad, CAM_Anio = Anio, CAM_Campeon = Campeon, CAM_SubCampeon = SubCampeon WHERE CAM_ID = Cod;
END $$
DELIMITER ;

/* Inactiva un registro en la tabla Campeonatos */
DELIMITER $$
CREATE PROCEDURE SP_Inactivate_Campeonatos(IN Cod INT)
BEGIN 
UPDATE Campeonatos SET CAM_Estado = 'I' WHERE CAM_ID = Cod;
END $$
DELIMITER ;

/* Tabla Campeonatos - Equipos */
CREATE TABLE Rel_Camp_Equi (
	RCE_ID INT AUTO_INCREMENT PRIMARY KEY,
	RCE_Campeonato INTEGER NOT NULL,
	RCE_Equipo INTEGER NOT NULL
);

/* Consulta todos los registros de la tabla Estadios */
CREATE VIEW VIEW_Select_Equipos AS
SELECT EQU_ID, EQU_Nombre FROM Equipos WHERE EQU_Estado = 'A' ORDER BY EQU_Nombre;

/* Tabla Partidos */
CREATE TABLE Partidos (
    PAR_ID INT AUTO_INCREMENT PRIMARY KEY,
	CAM_ID INTEGER NOT NULL,
	PAR_FecCam NUMERIC(4,0) NOT NULL,
    PAR_Equipo1 INTEGER NOT NULL,
	PAR_Goles1 NUMERIC(2,0) NOT NULL,
    PAR_Equipo2 INTEGER NOT NULL,
	PAR_Goles2 NUMERIC(2,0) NOT NULL,
    PAR_Fecha DATE NOT NULL,
	PAR_Hora TIME NOT NULL,
	EST_IDFK INTEGER NOT NULL,
	PAR_Estado CHAR(1) NULL,
);