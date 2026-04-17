<?php 
include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM alumnos WHERE id = $id";
$resultado = mysqli_query($conexion, $sql);

$fila = mysqli_fetch_assoc($resultado);
?>

<h2>Editar Alumno</h2>

<form action="actualizar.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
    <label for="">Nombre y apellido</label>
    <input type="text" name="nombre_apellido" value="<?php echo $fila['nombre_apellido']; ?>">
    <br><br>
    <input type="text" name="dni" value="<?php echo $fila['dni']; ?>">
    <br><br>
    <input type="text" name="celular" value="<?php echo $fila['celular']; ?>">
    <br><br>
    <input type="date" name="fecha_de_nacimiento" value="<?php echo $fila['fecha_de_nacimiento']; ?>">
    <br><br>
    <input type="email" name="correo" value="<?php echo $fila['correo']; ?>">
    <br><br>
    <input type="text" name="direccion" value="<?php echo $fila['direccion']; ?>">
    <br><br>
    <input type="submit" value="Actualizar">
</form>