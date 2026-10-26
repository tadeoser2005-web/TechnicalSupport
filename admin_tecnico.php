<?php
include "conexion.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $sql = "INSERT INTO tecnico(nombre,apellido,correo) VALUES ('$nombre','$apellido','$correo')";
    if (mysqli_query($conexion,$sql)) {
        echo "Se ha registrado correctamnete el tecnico";
    } else {
        echo "Hubo un error al realizar el registro";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Registrar técnico</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
<nav class="menu">
    <a href="admin_inicio.php">Inicio</a>
    <a href="admin_equipos.php">Administrar equipos</a>
    <a href="admin_tecnico.php" class="activo">Administrar Personal</a>
    <a href="solicitudes.php">Solicitudes</a>
    <a href="index.php">Cerrar sesión</a>
</nav>
<main class="dos-columnas">
    <div class="imagen">  <img src="Assets/cardenalIzq.png" alt="Imagen 2" width="500" height="580"></div>
    <form class="formulario" action="admin_tecnico.php" method="post">
        <h1>Registrar Técnico</h1>
        <input type="text" name="nombre" placeholder="Nombre" aria-label="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" aria-label="Apellido" required>
        <input type="email" name="correo" placeholder="Correo electrónico" aria-label="Correo electrónico" required>
        <button type="submit">Registrar</button>
        <button type="button" onclick="window.location.href='ver_personal.php'">Ver Personal</button>
    </form>
</main>
</body>
</html>