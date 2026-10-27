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
    $estado = $_POST['estado'];

    $sql_update = "UPDATE solicitud SET descripcion = '$descripcion', observacion = '$observacion', estado = '$estado' WHERE id_solicitud = $id_solicitud";

    if (mysqli_query($conexion, $sql_update)) {
        header("Location: solicitudes.php");
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
    <title>Editar Solicitud - Admin</title>
    <link rel="stylesheet" href="./CSS/Styles.css">
</head>
<body>

<nav class="menu">
    <a href="admin_inicio.php">Inicio</a>
    <a href="admin_equipos.php">Administrar equipos</a>
    <a href="admin_tecnico.php">Administrar Personal</a>
    <a href="solicitudes.php" class="activo">Solicitudes</a>
    <a href="index.php">Cerrar Sesion</a>
</nav>

<main class="dos-columnas">
    <form class="formulario" id="formSolicitud" action="" method="POST">
        <h1>Detalle de Solicitud (Admin)</h1>

        <input type="hidden" name="id_solicitud" value="<?php echo $solicitud['id_solicitud']; ?>">


        <input type="text" name="nombre" placeholder="Nombre" aria-label="nombre" value="<?php echo htmlspecialchars($solicitud['nombre'] ?? ''); ?>" readonly style="background-color: #f0f0f0;">
        <input type="email" name="correo" placeholder="Correo" aria-label="correo" value="<?php echo htmlspecialchars($solicitud['correo'] ?? ''); ?>" readonly style="background-color: #f0f0f0;">
        <input type="text" name="equipo" placeholder="Equipo" aria-label="equipo" value="<?php echo htmlspecialchars(($solicitud['marca'] ?? '') . ' ' . ($solicitud['modelo'] ?? '')); ?>" readonly style="background-color: #f0f0f0;">


        <input type="text" name="descripcion" placeholder="Descripcion" aria-label="descripcion" value="<?php echo htmlspecialchars($solicitud['descripcion']); ?>" required>
        <input type="text" name="comentario" placeholder="Agregar comentario" aria-label="comentario" value="<?php echo htmlspecialchars($solicitud['observacion']); ?>">

        <label for="estado">Estado:</label>
        <select name="estado" id="estado" required>

            <option value="Pendiente" <?php if($solicitud['estado'] == 'Pendiente') echo 'selected'; ?>>Pendiente</option>
            <option value="En proceso" <?php if($solicitud['estado'] == 'En proceso') echo 'selected'; ?>>En proceso</option>
            <option value="Resuelta" <?php if($solicitud['estado'] == 'Resuelta') echo 'selected'; ?>>Resuelta</option>
        </select>

        <button type="submit">Actualizar solicitud</button>
    </form>
</main>

</body>
</html>