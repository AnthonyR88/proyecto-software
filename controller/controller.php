<?php

/* Incluye la BD */
include('../config/database.php');

/* Funcion que hace una consulta de una sola linea */
function sql_consulta1($sql)
{
    $conexion = mysqli_connect(serverBD,usuarioBD,claveBD,nombreBD);
    if ($resul = mysqli_query($conexion,$sql))
    {
        $fila = mysqli_fetch_array($resul,MYSQLI_BOTH);
        return($fila);
    }
    else
    {
        return(false);
    }
}

/* Funcion que ejecuta una consulta SQL con varias Líneas */
function sql_consulta2($sql)
{
    $conexion = mysqli_connect(serverBD,usuarioBD,claveBD,nombreBD);
    if ($res = mysqli_query($conexion,$sql))
    {
        return($res);
    }
    else
    {
        return(false);
    }
}

/* Funcion que hace consultas de multiples filas */
function sql_accion($sql)
{
    $conexion = mysqli_connect(serverBD,usuarioBD,claveBD,nombreBD);
    if ($resul = mysqli_query($conexion,$sql))
    {
        return(true);
    }
    else
    {
        return(false);
    }
}

/* Funcion para consultar y mostrar informacion de los usuarios */
class Validate_User
{
    function Check_User_Insert($user)
    {
        $sql = " SELECT COUNT(*) FROM usuarios WHERE USU_Cod = '$user' ";
        if ($fila = sql_consulta1($sql)) 
        {
            return($fila);
        }    
        else
        {
            return(false);
        }
    }

    function Check_Client($id)
    {
        $sql = " SELECT COUNT(*) FROM clientes WHERE CLI_Ident = '$id' ";
        if ($fila = sql_consulta1($sql)) 
        {
            return($fila);
        }    
        else
        {
            return(false);
        }
    }

    function Check_User_Update($user)
    {
        $sql = " SELECT COUNT(*) FROM usuarios WHERE USU_Cod = '$user' ";
        if ($fila = sql_consulta1($sql)) 
        {
            return($fila);
        }    
        else
        {
            return(false);
        }
    }
}

/* Funcion que consulta todos los cargos para ponerlos en una lista */ 
function Roles()
{
    $sql = " SELECT * FROM VIEW_Select_Roles ";
    $res = sql_consulta2($sql);
    return($res);
}

/* Funcion que consulta todos los tipos de identificaciones para ponerlos en una lista */ 
function Identificaciones()
{
    $sql = " SELECT * FROM VIEW_Select_Identificaciones ";
    $res = sql_consulta2($sql);
    return($res);
}

function Especies()
{      
    $sql = " SELECT * FROM VIEW_Select_Especies ";
    $res = sql_consulta2($sql);
    return($res);
}

function Planes()
{      
    $sql = " SELECT * FROM VIEW_Select_Planes ";
    $res = sql_consulta2($sql);
    return($res);
}

function Servicios()
{      
    $sql = " SELECT * FROM VIEW_Select_ServicioPlan ";
    $res = sql_consulta2($sql);
    return($res);
}

function Mascotas_Cli($id)
{
    $sql = " CALL SP_Select_Mascotas2($id) ";
    if ($fila = sql_consulta2($sql)) 
    {
        return($fila);
    }    
    else
    {
        return(false);
    }
}

/* Clase para conectarse a la base de datos y realizar querys */
class Conectar
{
    public $id_conexion;
    public $id_resultado;

    /* Funcion constructora que crea la conexion a la base de datos */
    function __construct($serverBD=serverBD, $usuarioBD=usuarioBD, $claveBD=claveBD, $nombreBD=nombreBD)
    {
        $this->id_conexion = null;
        $this->id_resultado = null;
        return($this->conectar($serverBD, $usuarioBD, $claveBD, $nombreBD));
    }

    public function conectar($serverBD=serverBD, $usuarioBD=usuarioBD, $claveBD=claveBD, $nombreBD=nombreBD)
    {
        $this->id_conexion = mysqli_connect($serverBD, $usuarioBD, $claveBD, $nombreBD);
        return($this->id_conexion);
    }

    /* Funcion que ejecuta querys de SQL */
    public function consultar($sql)
    {
        return($this->id_resultado = mysqli_query($this->id_conexion,$sql));
    }

    /* Funcion que devuelve una consulta SQL en una matriz */
    public function traer_fila($tipo_indice = "A")
    {
        /*switch ($tipo_indice) 
        {
            case "A":
                $fila = mysqli_fetch_array($this->id_resultado,MYSQLI_ASSOC);
                break;

            case 'B':
                $fila = mysqli_fetch_array($this->id_resultado,MYSQLI_NUM);
                break;

            case 'C':
                $fila = mysqli_fetch_array($this->id_resultado,MYSQLI_BOTH);
                break;
            
            default:
                $fila = mysqli_fetch_array($this->id_resultado,MYSQLI_ASSOC);
                break;               
        }*/
        $fila = mysqli_fetch_array($this->id_resultado,MYSQLI_BOTH);
        return($fila);
    }

    public function cerrar_conexion()
    {
        return(mysqli_close($this->id_conexion));
    }
}

?>