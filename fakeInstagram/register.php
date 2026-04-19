<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

include("db.php");
include("generate_uuid.php");

// TODO[☑]: Crear un sistema de uuid para identificadores unicos

// Traer datos
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validación del ususario
// TODO: Mejorar la autenticacion
// TODO: Buscar mejores maneras de autenticar y validar datos
if (empty($username) || empty($email) || empty($password)) {
    die("Campos vacíos");
}

// Hash de contraseña
// NOTE: ❌ No se debe guardar la contraseña en texto plano en la base de datos
// NOTE: ❌ Tampoco el hash debe ser demasiado grande
$hash = password_hash($password, PASSWORD_DEFAULT);

// Generar uuid para un id mas seguro
$id = generateUUID();

$sql = "INSERT INTO users (id, username, email, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $id, $username, $email, $hash);

if ($stmt->execute()) {
    // Crear la sesión
    $_SESSION['user_id'] = $user_id;

    // Redirigir al index
    // TODO[☑]: Hacer un render condicional en el index para 
    // No mostrar nada protejido a un usuario no autenticado
    header("Location: index.php");
    exit;

}
?>