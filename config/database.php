<?php

define('serverBD','localhost');
define('usuarioBD','root');
define('claveBD','');
define('nombreBD','DB_Proyecto');
define('charsetBD','utf8');

$conexion = mysqli_connect(serverBD,usuarioBD,claveBD,nombreBD);

?>