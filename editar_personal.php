<?php
include 'conexion.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tecnico WHERE id_tecnico = $id";
    $resultado = mysqli_query($conexion, $query);
    $tecnico = mysqli_fetch_assoc($resultado);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_tecnico = $_POST['id_tecnico'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];

    // Estructura del UPDATE en SQL
    $sql_update = "UPDATE tecnico SET nombre = '$nombre',apellido = '$apellido', correo = '$correo' WHERE id_tecnico = $id_tecnico";

    if (mysqli_query($conexion, $sql_update)) {
        // Redirigir de vuelta a la lista de técnicos si sale bien
        header("Location: ver_personal.php");
        exit();
    } else {
        $error = "Error al actualizar: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Personal</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
<nav class="menu">
    <a href="admin_inicio.php">Inicio</a>
    <a href="admin_equipos.php" >Administrar equipos</a>
    <a href="admin_tecnico.php" class="activo">Administrar Personal</a>
    <a href="solicitudes.php">Solicitudes</a>
    <a href="index.php">Cerrar Sesion</a>
</nav>

<main class="dos-columnas">

    <form class="formulario" action="editar_personal.php" method="post">
        <h1>Administrar Personal</h1>
        <input type="hidden" name="id_tecnico" value="<?php echo $tecnico['id_tecnico'];?>">
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($tecnico['nombre'])?>" aria-label="Nombre" required>
        <input type="text" name="apellido" value="<?php echo htmlspecialchars($tecnico['apellido'])?>" aria-label="Apellido" required>
        <input type="email" name="correo" value="<?php echo htmlspecialchars($tecnico['correo'])?>" aria-label="Correo" required>
        <button class="botones" type="submit">Actualizar Técnico</button>
    </form>

    <div class="imagen2">  <img src="Assets/cardenalDer.jpg" alt="Imagen 2" width="500" height="580"></div>
</main>


</body>
</html>