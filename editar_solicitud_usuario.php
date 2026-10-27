<?php
include 'conexion.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT s.*, u.nombre, u.correo, e.marca, e.modelo 
              FROM solicitud s 
              LEFT JOIN usuario u ON s.id_usuario = u.id_usuario 
              LEFT JOIN equipo e ON s.id_equipo = e.id_equipo 
              WHERE s.id_solicitud = $id";

    $resultado = mysqli_query($conexion, $query);
    $solicitud = mysqli_fetch_assoc($resultado);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_solicitud = $_POST['id_solicitud'];
    $descripcion = $_POST['descripcion'];
    $observacion = $_POST['comentario'];


    $sql_update = "UPDATE solicitud SET descripcion = '$descripcion', observacion = '$observacion' WHERE id_solicitud = $id_solicitud";

    if (mysqli_query($conexion, $sql_update)) {
        header("Location: historial_usuario.php");
        exit();
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Solicitud - Usuario</title>
    <link rel="stylesheet" href="./CSS/Styles.css">
</head>
<body>

<nav class="menu">
    <a href="usuario_inicio.php">Inicio</a>
    <a href="solicitud_usuario.php" class="activo">Realizar solicitud</a>
    <a href="ver_equipos_usuario.php">Ver equipos disponibles</a>
    <a href="historial_usuario.php">Historial de reportes</a>
    <a href="index.php">Cerrar Sesion</a>
</nav>

<main class="dos-columnas">
    <form class="formulario" id="formSolicitud" action="" method="POST">
        <h1>Detalle de Mi Solicitud</h1>

        <input type="hidden" name="id_solicitud" value="<?php echo $solicitud['id_solicitud']; ?>">


        <input type="text" name="nombre" aria-label="nombre" value="<?php echo htmlspecialchars($solicitud['nombre'] ?? ''); ?>" readonly style="background-color: #f0f0f0;">
        <input type="email" name="correo" aria-label="correo" value="<?php echo htmlspecialchars($solicitud['correo'] ?? ''); ?>" readonly style="background-color: #f0f0f0;">
        <input type="text" name="equipo" aria-label="equipo" value="<?php echo htmlspecialchars(($solicitud['marca'] ?? '') . ' ' . ($solicitud['modelo'] ?? '')); ?>" readonly style="background-color: #f0f0f0;">


        <input type="text" name="descripcion" placeholder="Descripcion" aria-label="descripcion" value="<?php echo htmlspecialchars($solicitud['descripcion']); ?>" required>
        <input type="text" name="comentario" placeholder="Agregar comentario" aria-label="comentario" value="<?php echo htmlspecialchars($solicitud['observacion']); ?>">

        <label for="estado">Estado (No editable):</label>
        <select id="estado" disabled>
            <option><?php echo htmlspecialchars($solicitud['estado']); ?></option>
        </select>

        <button type="submit">Actualizar solicitud</button>
    </form>
</main>

</body>
</html>
