/* Inactiva un registro en la tabla Estadios */
DELIMITER $$
CREATE PROCEDURE SP_Inactivate_Estadios(IN Cod INT)
BEGIN 
UPDATE Estadios SET EST_Estado = 'I' WHERE EST_ID = Cod;
END $$
DELIMITER ;