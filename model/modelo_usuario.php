<?php 

/* Clase Usuario */
class Usuario
{
	Private $id_usuario;
	Private $user;
	Private $password;

    /* Funcion que permite crear Usuarios */
    Public function Crear_Usuario($user,$pass,$tipo_user,$doc)
    {
        $sql = " CALL SP_Insert_Usuario('$user','$pass','$tipo_user','$doc') ";
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
    Public function Modificar_Usuario($user,$pass,$tipo_user)
    {
        $sql = " CALL SP_Update_Usuario('$user','$pass','$tipo_user') ";
        if (sql_accion($sql)) 
        {
            return(true);
        }
        else
        {
            return(false);
        }
    }

    /* Función Para Validar Acceso A La Aplicación*/
    Public function Consultar_Acceso($user,$pass)
    {
        $sql = " CALL SP_Ingreso_Usuario('$user','$pass') ";
        if ($fila = sql_consulta1($sql)) 
        {
            return($fila);
        }    
        else
        {
            return(false);
        }
    }

    /* Funcion que permite Consultar un unico Usuario */
    Public function Consultar_Usuario($id)
    {      
        $sql = " CALL SP_Select_Usuario($id) ";
        if ($fila = sql_consulta1($sql)) 
        {
            return($fila);
        }    
        else
        {
            return(false);
        }
    }

    /* Funcion que permite Consultar un unico Usuario */
    Public function Consultar_Usuario2($id)
    {      
        $sql = " CALL SP_Select_Usuario('$id') ";
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
    Public function Inactivar_Usuario($id)
    {      
        $sql = " CALL SP_Inactivate_Usuario($id) ";
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

/* Subclase AdminAcademico - Usuario */
class AdminAcademico extends Usuario
{
    /* Funcion que permite consultar los usuarios */
    Public function Consultar_Usuarios()
    {
        $sql = " SELECT * FROM VIEW_Select_Usuarios ";
        
        $res = sql_consulta2($sql);
        
        return($res);
    }
}

/* Subclase Profesor - Usuario */
class Profesor extends Usuario
{

}

/* Subclase Estudiante - Usuario */
class Estudiante extends Usuario
{

}

?>