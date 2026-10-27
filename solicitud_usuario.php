<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de solicitudes</title>
    <link rel="stylesheet" href="./CSS/Styles.css">
</head>

<body>

<nav class="menu">
    <a href="usuario_inicio.php" >Inicio</a>
    <a href="solicitud_usuario.php" class="activo">Realizar solicitud</a>
    <a href="ver_equipos_usuario.php">Ver equipos disponibles</a>
    <a href="historial_usuario.php" >Historial de reportes</a>
    <a href="index.php">Cerrar Sesion</a>
</nav>

<main class="dos-columnas">
    <form class="formulario" id="formSolicitud" action="guardar_solicitud.php" method="POST">
        <h1>Detalle de Solicitud</h1>

        <input type="text" name="nombre" placeholder="Nombre" aria-label="nombre" required>
        <input type="email" name="correo" placeholder="Correo" aria-label="correo" required>


        <input type="text" name="equipo" placeholder="Equipo (Ej. HP, Dell, Macbook)" aria-label="equipo" required>

        <input type="text" name="descripcion" placeholder="Descripcion" aria-label="descripcion" required>
        <input type="text" name="comentario" placeholder="Agregar comentario" aria-label="comentario">

        <label for="estado">Estado:</label>
        <select id="estado" disabled>
            <option>Pendiente</option>
        </select>

        <button type="submit">Registrar solicitud</button>
    </form>
</main>
</body>
</html>

