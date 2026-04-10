<?php

include("conexion.php");
$id = $_GET['id'];

$sql = "DELETE FROM alumnos WHERE id = $id";

mysqli_query($conexion, $sql);

header("location:lista_alu.php");

?>