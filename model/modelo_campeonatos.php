<?php 

/* Clase Campeonato */
class Campeonato
{
	Private $nombre;
	Private $ciudad;
	Private $anio;
	Private $campeon;
	Private $subcampeon;
	Private $proceso;
	Private $estado;

    /* Funcion que permite crear Usuarios */
    Public function Crear_Campeonato($nombre, $ciudad, $anio)
    {
        $sql = " CALL SP_Insert_Campeonato('$nombre', '$ciudad', $anio) ";
        if (sql_accion($sql)) 
        {
            return(true);
        }
        else
        {
            return(false);
        }
    }

    /* Funcion que permite modificar Usuarios */
    Public function Modificar_Campeonato($nombre,$ciudad,$anio,$campeon,$subcampeon,$id)
    {
        $sql = " CALL SP_Update_Campeonato('$nombre','$ciudad',$anio,$campeon,$subcampeon,$id) ";
        if (sql_accion($sql)) 
        {
            return(true);
        }
        else
        {
            return(false);
        }
    }

    /* Función que permite consultar todos los estadios */
    public function Consultar_Campeonatos()
    {
        $sql = "SELECT * FROM VIEW_Select_Campeonatos";
        $res = sql_consulta2($sql);
        return $res;
    }

    /* Funcion que permite Consultar un unico Usuario */
    Public function Consultar_Campeonato($id)
    {      
        $sql = " CALL SP_Select_Campeonato($id) ";
        if ($fila = sql_consulta1($sql)) 
        {
            return($fila);
        }    
        else
        {
            return(false);
        }
    }

    /* Funcion que permite Inactivar Usuarios */
    Public function Inactivar_Campeonato($id)
    {      
        $sql = " CALL SP_Inactivate_Campeonatos($id) ";
        if (sql_accion($sql)) 
        {
            return(true);
        }
        else
        {
            return(false);
        }
    }
}

?>