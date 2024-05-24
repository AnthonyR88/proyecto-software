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

/* Tabla Campeonatos - Equipos */
CREATE TABLE Rel_Camp_Equi (
	RCE_ID INT AUTO_INCREMENT PRIMARY KEY,
	RCE_Campeonato INTEGER NOT NULL,
	RCE_Equipo INTEGER NOT NULL
);

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