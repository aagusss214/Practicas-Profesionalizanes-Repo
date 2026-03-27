<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_de_datos = "sistema_alumnos";

$conexion = mysqli_connect(
    $servidor,
    $usuario,
    $password,
    $base_de_datos
);

if (!$conexion){
    die("Error en la base de datos: " . mysqli_connect_error());
}
?>