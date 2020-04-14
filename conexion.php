<?php
$servidor = "localhost";
$usuario = 'root';
$contrasena = '';
$bd = 'dell';

$conexion = mysqli_connect($servidor,$usuario,$contrasena);

if(!$conexion)
{
	echo "No se pudo conectar al servidor".mysql_error();
}
else
{
	//echo "Conexión exitosa";
}

$basededatos = mysqli_select_db($conexion,$bd);

if(!$basededatos)
{
	echo "No se pudo encontrar la base de datos";
}
else
{
	//echo "Base de datos seleccionada";
}
?>