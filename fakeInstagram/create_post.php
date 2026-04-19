<?php
session_start();
include("db.php");
include("generate_uuid.php");

// 🔒 proteger ruta
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// obtener datos
$content = $_POST['content'] ?? '';

// validar
if (empty($content)) {
    die("Post vacío");
}

// obtener usuario desde sesión
$user_id = $_SESSION['user_id'];

$id = generateUUID();

// insertar
$sql = "INSERT INTO posts (id, user_id, content) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $id, $user_id, $content);
$stmt->execute();

// redirigir
header("Location: index.php");
exit;
?>