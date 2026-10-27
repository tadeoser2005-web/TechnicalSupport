<?php
include 'conexion.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de solicitudes</title>
      <link rel="stylesheet" href="CSS/Styles.css">
</head>
<body>


<nav class="menu">
    <a href="usuario_inicio.php">Inicio</a>
    <a href="solicitud_usuario.php">Realizar solicitud</a>
    <a href="ver_equipos_usuario.php">Ver equipos disponibles</a>
    <a href="historial_usuario.php" class="activo"  >Historial de reportes</a>
    <a href="index.php">Cerrar Sesion</a>
</nav>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Equipo</th>
        <th>Descripción</th>
        <th>Comentario</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $sql = "SELECT s.id_solicitud, 
        u.nombre AS nombre, 
        u.correo AS correo, 
        e.marca, 
        e.modelo, 
        s.descripcion, 
         s.observacion, 
         s.estado 
        FROM solicitud s
        LEFT JOIN usuario u ON s.id_usuario = u.id_usuario
        LEFT JOIN equipo e ON s.id_equipo = e.id_equipo";

    $resultado = mysqli_query($conexion, $sql);


    if ($resultado && mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $row['id_solicitud'] . "</td>";
            echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
            echo "<td>" . htmlspecialchars($row['marca'] . " " . $row['modelo']) . "</td>";
            echo "<td>" . htmlspecialchars($row['descripcion']) . "</td>";
            echo "<td>" . htmlspecialchars($row['observacion']) . "</td>"; // Este es tu campo de comentario/observación
            echo "<td>" . htmlspecialchars($row['estado']) . "</td>";
            echo "<td class='opciones'>";
            echo "<a href='editar_solicitud_usuario.php?id=" . $row['id_solicitud'] . "' title='Editar'>✏️</a> ";
            echo "</tr>";

        }
    } else {
        echo "<tr><td colspan='7'>No hay solicitudes registradas.</td></tr>";
    }
    ?>
    </tbody>
</table>
</div>
</body>
</html>