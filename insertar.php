<?php
include("conexion.php");

$post = $_POST;

$nombre_apellido = $post["Nombre_y_Apellido"];
$dni = $post["dni"];
$fecha_nac = $post["Fecha_De_Nacimiento"];
$direccion = $post["Direccion"];
$celular = $post["Celular"];
$email = $post["Email"];

$sql = "INSERT INTO alumnos (nombre_apellido, dni, fecha_nac, direccion, celular. correo) 
    VALUES ('$nombre_apellido', '$dni', '$fecha_nac', '$direccion', '$celular'. '$email')";

if (mysqli_query($conexion, $sql)){
    echo '<h2>¡Registro Exitoso</h2>';
    echo '<a href="index.html">Volver Al Formulario</a>';
}else{
    echo 'Error Al Insertar Datos' . mysqli_error($conexion);
}

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';