<?php
include("conexion.php");
$sql = "SELECT * FROM alumnos";
$resultado = mysqli_query($conexion, $sql);
?>
<!doctype html>
<html lang="es">
    

<head>
    <meta charset="UTF-8">
    <title>Listado de alumnos</title>
</head>

<body>
    <table border="1" cellpadding="5">
        <h2>¡Registro Exitoso!</h2>
        <a href="indexx.html">Agregar alumno</a>
        <tr>
            <th>Id</th>
            <th>Nombre y Apellido</th>
            <th>D.N.I</th>
            <th>Celular</th>
            <th>Fecha Ne Nacimiento</th>
            <th>Correo</th>
            <th>Domicilio</th>
        </tr>
        <?php
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
        ?>
                <tr>
                    <td><?php echo $fila['id'] ?></td>
                    <td><?php echo $fila['nombre_apellido'] ?></td>
                    <td><?php echo $fila['dni'] ?></td>
                    <td><?php echo $fila['direccion'] ?></td>
                    <td><?php echo $fila['fecha_de_nacimiento'] ?></td>
                    <td><?php echo $fila['celular'] ?></td>
                    <td><?php echo $fila['correo'] ?></td>
                    <td>
                        <a href="eliminar.php?id=<?php echo $fila['id']; ?>">eliminar</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="7">no hay alumnos cargados</td></tr>';
        }
        ?>
    </table>
</body>

</html>

<?php mysqli_close($conexion); ?>