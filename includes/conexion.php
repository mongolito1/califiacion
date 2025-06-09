<?php
$servidor = "localhost:3306";
$usuario = "root";
$contraseña ="";
$base_de_datos = "formulario";

$conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_de_datos);

if(!$conexion){
    die("Error de conexion: " . mysqli_connect_error());
}
else{
   echo ".";
}
?>