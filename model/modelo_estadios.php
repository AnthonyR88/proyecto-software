<?php

/* Clase Estadio */
class Estadio
{
    private $idEstadio;
    private $nombreEstadio;
    private $ciudadEstadio;
    private $direccionEstadio;

    /* Función que permite crear un estadio */
    public function Crear_Estadio($nombre, $ciudad, $direccion)
    {
        $sql = "CALL SP_Insert_Estadio('$nombre', '$ciudad', '$direccion')";
        if (sql_accion($sql)) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /* Función que permite consultar todos los estadios */
    public function Consultar_Estadios()
    {
        $sql = "SELECT * FROM VIEW_Select_Estadios";
        $res = sql_consulta($sql);
        return $res;
    }

    /* Función que permite consultar un único estadio */
    public function Consultar_Estadio($nombre)
    {
        $sql = "CALL SP_Select_Estadio('$nombre')";
        if ($fila = sql_consulta($sql)) 
        {
            return $fila;
        }    
        else
        {
            return false;
        }
    }

    /* Función que permite modificar un estadio */
    public function Modificar_Estadio($nombre, $ciudad, $direccion)
    {
        $sql = "CALL SP_Update_Estadio('$nombre', '$ciudad', '$direccion')";
        if (sql_accion($sql)) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /* Función que permite inactivar un estadio */
    public function Inactivar_Estadio($nombre)
    {      
        $sql = "CALL SP_Inactivate_Estadio('$nombre')";
        if (sql_accion($sql)) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /* Función que verifica la existencia de un estadio */
    public function Check_Estadio($nombre)
    {
        $sql = "SELECT COUNT(*) FROM estadios WHERE Estadio_Nombre = '$nombre'";
        if ($fila = sql_consulta($sql)) 
        {
            return $fila;
        }    
        else
        {
            return false;
        }
    }
}

?>
